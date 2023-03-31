<?php

namespace App\Http\Controllers\Payment\Subscription;

use Illuminate\Support\Facades\Http;
use App\{
    Models\Subscription,
    Classes\GeniusMailer,
    Models\PaymentGateway,
    Models\UserSubscription
};

use Carbon\Carbon;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class StripeController extends SubscriptionBaseController
{

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

        $this->validate($request, [
            'shop_name' => 'unique:users',
        ], [
            'shop_name.unique' => __('This shop name has already been taken.')
        ]);

        $subs = Subscription::findOrFail($request->subs_id);
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $user = $this->user;

        $item_amount = $subs->price * $this->curr->value;
        $curr = $this->curr;

        $supported_currency = json_decode($data->currency_id, true);
        if (!in_array($curr->id, $supported_currency)) {
            return redirect()->back()->with('unsuccess', __('Invalid Currency For Stripe Payment.'));
        }


        $package = $user->subscribes()->where('status', 1)->orderBy('id', 'desc')->first();
        $success_url = route('user.payment.return');
        $item_name = $subs->title . " Plan";
        $item_currency = $curr->name;
        $validator = \Validator::make($request->all(), [
            'card' => 'required',
            'cvv' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        if ($validator->passes()) {

            $stripe = Stripe::make(\Config::get('services.stripe.secret'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->card,
                        'exp_month' => $request->month,
                        'exp_year' => $request->year,
                        'cvc' => $request->cvv,
                    ],
                ]);
                if (!isset($token['id'])) {
                    return back()->with('unsuccess', __('Token Problem With Your Token.'));
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $item_currency,
                    'amount' => $item_amount,
                    'description' => $item_name,
                ]);

                if ($charge['status'] == 'succeeded') {

                    $today = Carbon::now()->format('Y-m-d');
                    $input = $request->all();
                    $user->is_vendor = 2;
                    if (!empty($package)) {
                        if ($package->subscription_id == $request->subs_id) {
                            $newday = strtotime($today);
                            $lastday = strtotime($user->date);
                            $secs = $lastday - $newday;
                            $days = $secs / 86400;
                            $total = $days + $subs->days;
                            $user->date = date('Y-m-d', strtotime($today . ' + ' . $total . ' days'));
                        } else {
                            $user->date = date('Y-m-d', strtotime($today . ' + ' . $subs->days . ' days'));
                        }
                    } else {
                        $user->date = date('Y-m-d', strtotime($today . ' + ' . $subs->days . ' days'));
                    }
                    $user->mail_sent = 1;
                    $user->update($input);
                    $sub = new UserSubscription;
                    $sub->user_id = $user->id;
                    $sub->subscription_id = $subs->id;
                    $sub->title = $subs->title;
                    $sub->currency_sign = $this->curr->sign;
                    $sub->currency_code = $this->curr->name;
                    $sub->currency_value = $this->curr->value;
                    $sub->price = $subs->price * $this->curr->value;
                    $sub->price = $sub->price / $this->curr->value;
                    $sub->days = $subs->days;
                    $sub->allowed_products = $subs->allowed_products;
                    $sub->details = $subs->details;
                    $sub->method = 'Stripe';
                    $sub->total_price = $subs->total_price;
                    $sub->payout_time = $subs->payout_time;
                    $sub->txnid = $charge['balance_transaction'];
                    $sub->charge_id = $charge['id'];
                    $sub->status = 1;
                    $sub->save();

                    $subscription_id = $subs->id;
                    $title = $subs->title;
                    $currency_sign = $this->curr->sign;
                    $currency_code = $this->curr->name;
                    $currency_value = $this->curr->value;
                    $price = ($subs->price * $this->curr->value) / $this->curr->value;
                    $days = $subs->days;
                    $allowed_products = $subs->allowed_products;
                    $details = $subs->details;
                    $methods = $request['Stripe'];
                    $total_price = $subs->total_price;
                    $payout_time = $subs->payout_time;
                    $txnid = $charge['balance_transaction'];
                    $charge_id = $charge['id'];
                    $status = 1;

                    $name = $request->input('name');
                    $email = $request->input('email');
                    $password = $request->input('password');
                    $shop_name = $request->input('shop_name');
                    $owner_name = $request->input('owner_name');
                    $shop_number = $request->input('shop_number');
                    $shop_address = $request->input('shop_address');
                    $reg_number = $request->input('reg_number');
                    $shop_message = $request->input('shop_message');

                    $response = Http::post('https://devwebsitelinks.com/ima-usa-crm/api/make-account', [
//                    $response = Http::post('http://crm.imausashop.com/api/make-account', [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'subscription_id' => $subscription_id,
                        'title' => $title,
                        'currency_sign' => $currency_sign,
                        'currency_code' => $currency_code,
                        'currency_value' => $currency_value,
                        'price' => $price,
                        'days' => $days,
                        'allowed_products' => $allowed_products,
                        'details' => $details,
                        'method' => $methods,
                        'total_price' => $total_price,
                        'payout_time' => $payout_time,
                        'txnid' => $txnid,
                        'charge_id' => $charge_id,
                        'status' => $status,
                        'shop_name' => $shop_name,
                        'owner_name' => $owner_name,
                        'shop_number' => $shop_number,
                        'shop_address' => $shop_address,
                        'reg_number' => $reg_number,
                        'shop_message' => $shop_message,
                    ]);

                    if ($response->successful()) {
                        $responseData = $response->json();
                        // Handle the successful response data
                    } else {
                        // Handle the error response
                        $errorMessage = $response->body();
                    }

                    // Sending Email To Vendor
                    $to = $user->email;
                    $subject = 'Welcome Email';
                    $msg = "Dear " . $user->name . "<br><br>" .
                        "Vendor Account Activated Successfully.<br> You Have Subscribed This Package.
                    <br>
                    <br>
                        Here is your CRM Panel Link.
                    <br>
                    <b>
                    <a href=" . url('https://devwebsitelinks.com/ima-usa-crm/login') . " target='_blank'>" . url('https://devwebsitelinks.com/ima-usa-crm/login') . "</a>
                    </b>
                    <br>
                    <br>
                        ThankYou.";
//                    <a href=" . url('https://devwebsitelinks.com/ima-usa-crm/login') . " target='_blank'>" . url('https://devwebsitelinks.com/ima-usa-crm/login') . "</a>

                    $data = [
                        'to' => $to,
                        'subject' => $subject,
                        'body' => $msg,
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendCustomMail($data);

                    return redirect($success_url);

                }

            } catch (Exception $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', __('Please Enter Valid Credit Card Informations.'));
    }

}