<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{Classes\GeniusMailer, Models\Cart, Models\Order, Models\PaymentGateway, Models\User, Traits\PHPCustomMail};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OrderHelper;
use Session;

class StripeController extends CheckoutBaseControlller
{
    use PHPCustomMail;

    public function __construct()
    {
        parent::__construct();
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        \Config::set('services.stripe.key', $paydata['key']);
        \Config::set('services.stripe.secret', $paydata['secret']);
    }

    public function store(Request $request)
    {
        $input = $request->all();
//        dd($request->all());
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $total = $request->total;
        $new_total = 0;
        $new_quantity = 0;
        $new_items = [];

        if ($request->pass_check) {
            $auth = OrderHelper::auth_check($input); // For Authentication Checking
            if (!$auth['auth_success']) {
                return redirect()->back()->with('unsuccess', $auth['error_message']);
            }
        }

        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', __("You don't have any product to checkout."));
        }

        $item_name = $this->gs->title . " Order";
        $item_number = Str::random(4) . time();
        $item_amount = $total;
        $success_url = route('front.payment.return');

        try {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            $lineItems = [];
            foreach ($cart->items as $item) {
                $lineItems[] = [
//                    'name' => $item['item']->name,
//                    'amount' => $item['item_price'] * 100,
//                    'currency' => $input['currency_name'],
                    'quantity' => $item['qty'],
                    'price_data' => [
                        'currency' => $input['currency_name'],
                        'unit_amount' => $item['item_price'] * 100,
                        'product_data' => [
                            'name' => $item['item']->name
                        ],
                    ],
                ];
            }

            $displayName = $input['shipping_title'] ?? 'Free Shipping';
            $deliveryEstimate = null;
            if ($input['shipping_title'] == 'ups' || $input['shipping_title'] == 'usps') {
                $displayName = 'USPS shipping';
                $deliveryEstimate = [
                    'minimum' => [
                        'unit' => 'business_day',
                        'value' => 3,
                    ],
                    'maximum' => [
                        'unit' => 'business_day',
                        'value' => 5,
                    ],
                ];
            }
            Session::put('shipping_rate', $input['shipping_rate']);
            Session::put('packing_cost', $input['packing_cost']);

            // $stripe = Stripe::make(\Config::get('services.stripe.secret'));
            \Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => [$lineItems],
                'mode' => 'payment',
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                                'amount' => ($input['shipping_rate'] ? $input['shipping_rate'] * 100 : 0 * 100) +
                                    ($input['packing_cost'] ? $input['packing_cost'] * 100 : 0 * 100),
                                'currency' => $input['currency_name'] ?? 'usd',
                            ],
                            'display_name' => $displayName,
                            'delivery_estimate' => $deliveryEstimate
                        ]
                    ],

                ],
                'success_url' => $success_url,
                'cancel_url' => route('front.payment.cancle'),
            ]);

            //upsSettings();
            //$shipment_track_code = $this->shipmentAccept($request['digest']) ?? null;

            OrderHelper::license_check($cart); // For License Checking
            $t_oldCart = Session::get('cart');
            $t_cart = new Cart($t_oldCart);
            $new_cart = [];
            $new_cart['totalQty'] = $t_cart->totalQty;
            $new_cart['totalPrice'] = $t_cart->totalPrice;
            $new_cart['items'] = $t_cart->items;
            $new_cart = json_encode($new_cart);
            $temp_affilate_users = OrderHelper::product_affilate_check($cart); // For Product Based Affilate Checking
            $affilate_users = $temp_affilate_users == null ? null : json_encode($temp_affilate_users);

            $order = new Order;
            $input['cart'] = $new_cart;
            $input['user_id'] = Auth::check() ? Auth::user()->id : NULL;
            $input['affilate_users'] = $affilate_users;
            $input['pay_amount'] = $item_amount / $this->curr->value;
            $input['order_number'] = $item_number;
            $input['wallet_price'] = $request->wallet_price / $this->curr->value;
            $input['payment_status'] = "Pending";
            $input['txnid'] = $charge['balance_transaction'] ?? '';
            $input['charge_id'] = $charge['id'] ?? '';
            $input['customer_email'] = Auth::check() ? Auth::user()->email : $input['personal_email'];
            $input['customer_name'] = Auth::check() ? Auth::user()->name : $input['personal_name'];
//                    if($input['tax_type'] == 'state_tax'){
//                        $input['tax_location'] = State::findOrFail($input['tax'])->state;
//                    }else{
//                        $input['tax_location'] = Country::findOrFail($input['tax'])->name;
//                    }
            $input['tax'] = Session::get('current_tax') ?? '0';

            if ($input['dp'] == 1) {
                $input['status'] = 'pending';
            }

            if (Session::has('affilate')) {
                $val = $request->total / $this->curr->value;
                $val = $val / 100;
                $sub = $val * $this->gs->affilate_charge;
                if ($temp_affilate_users != null) {
                    $t_sub = 0;
                    foreach ($temp_affilate_users as $t_cost) {
                        $t_sub += $t_cost['charge'];
                    }
                    $sub = $sub - $t_sub;
                }
                if ($sub > 0) {
                    $user = OrderHelper::affilate_check(Session::get('affilate'), $sub, $input['dp']); // For Affiliate Checking
                    $input['affilate_user'] = Session::get('affilate');
                    $input['affilate_charge'] = $sub;
                }
            }

            $adminCommission = 0;
            $productIds = [];
            foreach ($cart->items as $item) {
                $productIds[] = $item['item']['id'];
                if ($item['item']->type == 'Physical') {
                    $adminCommission += $this->gs->fixed_commission * $item['qty'];
                } elseif ($item['item']->type == 'Digital') {
                    $adminCommission += $item['price'] / 100 * $this->gs->percentage_commission;
                }
            }

            $input['commission'] = $adminCommission;

            $order->fill($input)->save();
            $order->tracks()->create(['title' => 'Pending', 'text' => 'You have successfully placed your order.']);
            $order->notifications()->create();
            $order->products()->attach($productIds);

            if ($input['coupon_id'] != "") {
                OrderHelper::coupon_check($input['coupon_id']); // For Coupon Checking
            }

            OrderHelper::size_qty_check($cart); // For Size Quantiy Checking
            OrderHelper::stock_check($cart); // For Stock Checking
            OrderHelper::vendor_order_check($cart, $order); // For Vendor Order Checking

            Session::put('temporder', $order);
            Session::put('tempcart', $cart);
//            Session::forget('cart');
            Session::forget('already');
            Session::forget('coupon');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('coupon_percentage');

            if ($order->user_id != 0 && $order->wallet_price != 0) {
                OrderHelper::add_to_transaction($order, $order->wallet_price); // Store To Transactions
            }
            $customer_name= $order->customer_name;
            $onumber=$order->order_number;
            $type = "new_order";
            $view = view('frontend.mail2.strip_order_customer_email', compact('customer_name','onumber','type'))->render();
//            //Sending Email To Buyer
            $data_user = [
                'to' => $order->customer_email,
                'subject' => "New Order Received!!",
                'body'=>$view,
//                'body' => "Hello ".$order->customer_name."<br>Thank you for placing an order.<br>Order Number is " . $order->order_number,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data_user);

            foreach ($cart->items as $item) {
                $vendor = User::find(\Auth::user()->id);

//                $vendor = User::find($item['item']->user_id);

                $vendor_name=$vendor->name;
                $order_number=$order->order_number;

//                $Product_name =  $item['name'];
                $Order_quantity = $item['qty'];
                $Order_price = $item['price'];
                $Order_discount = $item['discount'];
                $view = view('frontend.mail2.strip_order_detail_email', compact('vendor_name','order_number','Order_quantity','Order_price','Order_discount'))->render();

                $data_user = [
                    'to' => $vendor->email,
                    'subject' => "New Order Received test!!",
                    'body'=>$view,
//                    'body' => "Hello {$vendor->name},<br>You just received a new order.<br>Order Number is {$order->order_number}<br>Here are the order details:<br>
//                            Product name: {$item['item']}<br>
//                            Order quantity: {$item['qty']}<br>
//                            Order price: {$item['price']}<br>
//                            Order discount: {$item['discount']}<br>",
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data_user);
            }
//
//            //Sending Email To Admin
//            $data = [
//                'to' => $this->ps->contact_email,
//                'subject' => "New Order Received!!",
//                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you.",
//            ];
//            $mailer = new GeniusMailer();
//            $mailer->sendCustomMail($data);

//            return redirect($success_url);
//            dd($checkoutSession->url);
            \Illuminate\Support\Facades\Session::put('stripePaymentIntent', $checkoutSession->payment_intent);
            return back()->with(['success' => 'Please pay the desired amount', 'redirect_url' => $checkoutSession->url]);


        } catch (Exception $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return back()->with('unsuccess', $e->getMessage());
        }

    }

//    public function applePay(Request $request)
//    {
//        parent::__construct();
//        $data = PaymentGateway::whereKeyword('stripe')->first();
//        $paydata = $data->convertAutoData();
//        \Config::set('services.stripe.key', $paydata['key']);
//        \Config::set('services.stripe.secret', $paydata['secret']);
//
//        $input = $request->all();
//
//        $data = PaymentGateway::whereKeyword('stripe')->first();
//        $total = $request->total;
//        $new_total = 0;
//        $new_quantity = 0;
//        $new_items = [];
//
//        if ($request->pass_check) {
//            $auth = OrderHelper::auth_check($input); // For Authentication Checking
//            if (!$auth['auth_success']) {
//                return redirect()->back()->with('unsuccess', $auth['error_message']);
//            }
//        }
//
//        if (!Session::has('cart')) {
//            return redirect()->route('front.cart')->with('success', __("You don't have any product to checkout."));
//        }
//
//
//        $item_name = $this->gs->title . " Order";
//        $item_number = Str::random(4) . time();
//        $item_amount = $total;
//        $success_url = route('front.payment.return');
//
//        try {
//            $oldCart = Session::get('cart');
//            $cart = new Cart($oldCart);
//
//            $lineItems = [];
//            foreach($cart->items as $item){
//                $lineItems[] = [
//                    'name' => $item['item']->name,
//                    'amount' => $item['item_price'] * 100,
//                    'currency' => $input['currency_name'],
//                    'quantity' => $item['qty'],
//                ];
//            }
//
//
//            // $stripe = Stripe::make(\Config::get('services.stripe.secret'));
//            \Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));
//            $checkoutSession = \Stripe\Checkout\Session::create([
//                'line_items' => [$lineItems],
//                'mode' => 'payment',
//                'shipping_options' => [
//                    [
//                        'shipping_rate_data' => [
//                            'type' => 'fixed_amount',
//                            'fixed_amount' => [
//                                'amount' => $input['shipping_cost'] ?? 0 * 100,
//                                'currency' => $input['currency_name'] ?? 'usd',
//                            ],
//                            'display_name' => $input['shipping_title'] ?? 'Free Shipping',
//
//                            // Delivers between 5-7 business days
////                            'delivery_estimate' => [
////                                'minimum' => [
////                                    'unit' => 'business_day',
////                                    'value' => 3,
////                                ],
////                                'maximum' => [
////                                    'unit' => 'business_day',
////                                    'value' => 5,
////                                ],
////                            ]
//                        ]
//                    ],
//                ],
//                'success_url' => $success_url,
//                'cancel_url' => route('front.payment.cancle'),
//            ]);
//
//            OrderHelper::license_check($cart); // For License Checking
//            $t_oldCart = Session::get('cart');
//            $t_cart = new Cart($t_oldCart);
//            $new_cart = [];
//            $new_cart['totalQty'] = $t_cart->totalQty;
//            $new_cart['totalPrice'] = $t_cart->totalPrice;
//            $new_cart['items'] = $t_cart->items;
//            $new_cart = json_encode($new_cart);
//            $temp_affilate_users = OrderHelper::product_affilate_check($cart); // For Product Based Affilate Checking
//            $affilate_users = $temp_affilate_users == null ? null : json_encode($temp_affilate_users);
//
//            $order = new Order;
//            $input['cart'] = $new_cart;
//            $input['user_id'] = Auth::check() ? Auth::user()->id : NULL;
//            $input['affilate_users'] = $affilate_users;
//            $input['pay_amount'] = $item_amount / $this->curr->value;
//            $input['order_number'] = $item_number;
//            $input['wallet_price'] = $request->wallet_price / $this->curr->value;
//            $input['payment_status'] = "Pending";
//            $input['txnid'] = $charge['balance_transaction'] ?? '';
//            $input['charge_id'] = $charge['id'] ?? '';
//            $input['customer_email'] = Auth::check() ? Auth::user()->email : $input['personal_email'];
//            $input['customer_name'] = Auth::check() ? Auth::user()->name : $input['personal_name'];
////                    if($input['tax_type'] == 'state_tax'){
////                        $input['tax_location'] = State::findOrFail($input['tax'])->state;
////                    }else{
////                        $input['tax_location'] = Country::findOrFail($input['tax'])->name;
////                    }
//            $input['tax'] = Session::get('current_tax') ?? '0';
//
//            if ($input['dp'] == 1) {
//                $input['status'] = 'pending';
//            }
//
//            if (Session::has('affilate')) {
//                $val = $request->total / $this->curr->value;
//                $val = $val / 100;
//                $sub = $val * $this->gs->affilate_charge;
//                if ($temp_affilate_users != null) {
//                    $t_sub = 0;
//                    foreach ($temp_affilate_users as $t_cost) {
//                        $t_sub += $t_cost['charge'];
//                    }
//                    $sub = $sub - $t_sub;
//                }
//                if ($sub > 0) {
//                    $user = OrderHelper::affilate_check(Session::get('affilate'), $sub, $input['dp']); // For Affiliate Checking
//                    $input['affilate_user'] = Session::get('affilate');
//                    $input['affilate_charge'] = $sub;
//                }
//            }
//
//            $adminCommission = 0;
//            foreach ($cart->items as $item) {
//                if ($item['item']->type == 'Physical') {
//                    $adminCommission += $this->gs->fixed_commission * $item['qty'];
//                } elseif ($item['item']->type == 'Digital') {
//                    $adminCommission += $item['price'] / 100 * $this->gs->percentage_commission;
//                }
//            }
//
//            $input['commission'] = $adminCommission;
//
//            $order->fill($input)->save();
//            $order->tracks()->create(['title' => 'Pending', 'text' => 'You have successfully placed your order.']);
//            $order->notifications()->create();
//
//            if ($input['coupon_id'] != "") {
//                OrderHelper::coupon_check($input['coupon_id']); // For Coupon Checking
//            }
//
//            OrderHelper::size_qty_check($cart); // For Size Quantiy Checking
//            OrderHelper::stock_check($cart); // For Stock Checking
//            OrderHelper::vendor_order_check($cart, $order); // For Vendor Order Checking
//
//            Session::put('temporder', $order);
//            Session::put('tempcart', $cart);
////            Session::forget('cart');
//            Session::forget('already');
//            Session::forget('coupon');
//            Session::forget('coupon_total');
//            Session::forget('coupon_total1');
//            Session::forget('coupon_percentage');
//
//            if ($order->user_id != 0 && $order->wallet_price != 0) {
//                OrderHelper::add_to_transaction($order, $order->wallet_price); // Store To Transactions
//            }
//
//            //Sending Email To Buyer
//            $data = [
//                'to' => $order->customer_email,
//                'type' => "new_order",
//                'cname' => $order->customer_name,
//                'oamount' => "",
//                'aname' => "",
//                'aemail' => "",
//                'wtitle' => "",
//                'onumber' => $order->order_number,
//            ];
//
//            $mailer = new GeniusMailer();
//            $mailer->sendAutoOrderMail($data, $order->id);
//
//            //Sending Email To Admin
//            $data = [
//                'to' => $this->ps->contact_email,
//                'subject' => "New Order Received!!",
//                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you.",
//            ];
//            $mailer = new GeniusMailer();
//            $mailer->sendCustomMail($data);
//
////            return redirect($success_url);
////            dd($checkoutSession->url);
//            \Illuminate\Support\Facades\Session::put('stripePaymentIntent', $checkoutSession->payment_intent);
//            return back()->with(['success' => 'Please pay the desired amount', 'redirect_url' => $checkoutSession->url]);
//
//
//        } catch (Exception $e) {
//            return back()->with('unsuccess', $e->getMessage());
//        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
//            return back()->with('unsuccess', $e->getMessage());
//        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
//            return back()->with('unsuccess', $e->getMessage());
//        }
//    }
}
