<?php

namespace App\Http\Controllers\Vendor;

use App\{Models\MerchandiseOrders, Models\Order, Models\VendorOrder};
use Datatables;
use Illuminate\Http\Request;

class OrderController extends VendorBaseController
{

    //*** JSON Request
    public function datatables()
    {
        $user = $this->user;
        $datas = Order::with(array('vendororders' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }))->orderBy('id', 'DESC')->get()->reject(function ($item) use ($user) {
            if ($item->vendororders()->where('user_id', '=', $user->id)->count() == 0) {
                return true;
            }
            return false;
        });


        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('totalQty', function (Order $data) {
                return $data->vendororders()->where('user_id', '=', $this->user->id)->sum('qty');
            })
            ->editColumn('pay_amount', function (Order $data) {
                return \PriceHelper::showOrderCurrencyPrice(($data->vendororders()->where('user_id', '=', $this->user->id)->sum('price') * $data->currency_value), $data->currency_sign);
            })
            ->addColumn('action', function (Order $data) {
                $pending = $data->vendororders()->where('user_id', '=', $this->user->id)->where('status', 'pending')->count() > 0 ? "selected" : "";
                $processing = $data->vendororders()->where('user_id', '=', $this->user->id)->where('status', 'processing')->count() > 0 ? "selected" : "";
                $completed = $data->vendororders()->where('user_id', '=', $this->user->id)->where('status', 'completed')->count() > 0 ? "selected" : "";
                $declined = $data->vendororders()->where('user_id', '=', $this->user->id)->where('status', 'declined')->count() > 0 ? "selected" : "";
                return '
                                <div class="action-list">
                                <a href="' . route("vendor-order-show", $data->order_number) . '" class="btn btn-primary product-btn"><i class="fa fa-eye"></i>  ' . __("Details") . ' </a>
                                    <select class="vendor-btn  ' . $data->vendororders()->where('user_id', '=', $this->user->id)->first()->status . ' ">
                                    <option value=" ' . route("vendor-order-status", ["id1" => $data->order_number, "status" => "pending"]) . ' "   ' . $pending . '  > ' . __("Pending") . ' </option>
                                    <option value=" ' . route("vendor-order-status", ["id1" => $data->order_number, "status" => "processing"]) . ' "  ' . $processing . '   > ' . __("Processing") . ' </option>
                                    <option value=" ' . route("vendor-order-status", ["id1" => $data->order_number, "status" => "completed"]) . ' "  ' . $completed . '   > ' . __("Completed") . ' </option>
                                    <option value=" ' . route("vendor-order-status", ["id1" => $data->order_number, "status" => "declined"]) . ' "  ' . $declined . '   > ' . __("Declined") . ' </option>
                                    </select>
                                </div>';
            })
            ->rawColumns(['id', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side

    }

    public function index()
    {
        return view('vendor.order.index');
    }


    public function show($slug)
    {
        $user = $this->user;
        $order = Order::where('order_number', '=', $slug)->first();
        $cart = json_decode($order->cart, true);
        return view('vendor.order.details', compact('user', 'order', 'cart'));
    }

    public function license(Request $request, $slug)
    {
        $order = Order::where('order_number', '=', $slug)->first();
        $cart = json_decode($order->cart, true);
        $cart['items'][$request->license_key]['license'] = $request->license;
        $new_cart = json_encode($cart);
        $order->cart = $new_cart;
        $order->update();
        $msg = __('Successfully Changed The License Key.');
        return redirect()->back()->with('license', $msg);
    }

    public function invoice($slug)
    {
        $user = $this->user;
        $order = Order::where('order_number', '=', $slug)->first();
        $cart = json_decode($order->cart, true);;
        return view('vendor.order.invoice', compact('user', 'order', 'cart'));
    }

    public function printpage($slug)
    {
        $user = $this->user;
        $order = Order::where('order_number', '=', $slug)->first();
        $cart = json_decode($order->cart, true);;
        return view('vendor.order.print', compact('user', 'order', 'cart'));
    }

    public function status($slug, $status)
    {
        $user = $this->user;
        $mainorder = VendorOrder::where('order_number', '=', $slug)->where('user_id', $user->id)->first();
        if ($mainorder->status == "completed") {
            return redirect()->back()->with('success', __('This Order is Already Completed'));
        } else {
            // Update status
            VendorOrder::where('order_number', '=', $slug)->where('user_id', '=', $user->id)->update(['status' => $status]);

            // Check other vendors item status for the same order
            if (!VendorOrder::where('order_number', $slug)->where('status', '!=', 'completed')->exists()) {
                Order::where('order_number', $slug)->update([
                    'status' => 'completed',
                ]);
            }

            return redirect()->route('vendor-order-index')->with('success', __('Order Status Updated Successfully'));
        }
    }

    /**
     * Show merchandise request to vendor
     */
    public function merchandiseOrderRequest()
    {
        return view('vendor.order.merchandise-request');
    }

    /**
     * Data tables for merchandise order request
     */
    public function merchandiseOrderRequestDatatables()
    {
        $user = $this->user;

        //--- Integrating This Collection Into Datatables
        return Datatables::of(MerchandiseOrders::with(['product'])
            ->whereHas('product', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get())
            ->editColumn('product_name', function ($data) {
                return $data->product->name ?? '';
            })
            ->addColumn('action', function ($data) {
                return '
                        <div class="action-list">
                            <a href="' . route("vendor-merchandise-order-request-show", $data->id) . '" class="btn btn-primary product-btn"><i class="fa fa-eye"></i>  ' . __("Details") . ' </a>
                        </div>';
            })
            ->rawColumns(['id', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function merchandiseOrderRequestShow($slug)
    {
        $user = $this->user;
        $request = MerchandiseOrders::where('id', $slug)->first();
        return view('vendor.order.merchandise-request-details', compact('user', 'request'));
    }

}
