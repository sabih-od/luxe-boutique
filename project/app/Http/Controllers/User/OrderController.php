<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
//use http\Env\Request;
use Carbon\Carbon;
use Session;
use App\{
    Models\Order,
    Models\Product,
    Models\ProductReturnPolicy,
    Models\Cart,
    Models\OrderProduct,

};

class OrderController extends UserBaseController
{

    public function orders()
    {
        $user = $this->user;
        $orders = Order::where('user_id','=',$user->id)->latest('id')->get();
        return view('user.order.index',compact('user','orders'));
    }


    public function orderRefund(Request $request){

        $order_id = $request->order_id;

        $order=Order::where('id',$order_id)->first();

        $OrderProduct=OrderProduct::where('order_id',$order_id)->first();

//        $OderRefund_Alredy_Check=ProductReturnPolicy::where('user_id',\Auth::user()->id)->orWhere('product_id',$OrderProduct->product_id)->first();
//         if($OderRefund_Alredy_Check){
//             return response()->json(['unsuccess'=>'This Order Already Refund']);
//
//         }
        $now =  Carbon::now();

        $created_at = Carbon::parse(date('Y-m-d H:i:s' , strtotime($order->created_at)));
        $lenght_difference = $created_at->diffInDays($now);

        $days =14;

        if($lenght_difference > $days){
            return response()->json(['unsuccess'=>'This Order Refund Not Available']);

        }
        $ProductReturnPolicy = new ProductReturnPolicy();
        $ProductReturnPolicy->order_id = $order->id;
        $ProductReturnPolicy->user_id = $order->user_id;
        $ProductReturnPolicy->product_id = $OrderProduct->product_id;
        $ProductReturnPolicy->return_date = Carbon::now()->format('Y-m-d');
        $ProductReturnPolicy->refund_amount = $order->pay_amount;
        $ProductReturnPolicy->save();
        return response()->json(['success'=>'Refund Order SuccessFully']);


    }

    public function ordertrack()
    {
        $user = $this->user;
        return view('user.order-track',compact('user'));
    }

    public function trackload($id)
    {
        $user = $this->user;
        $order = $user->orders()->where('order_number','=',$id)->first();
        $datas = array('Pending','Processing','On Delivery','Completed');
        return view('load.track-load',compact('order','datas'));

    }


    public function order($id)
    {
        $user = $this->user;
        $order = $user->orders()->whereId($id)->firstOrFail();
        $cart = json_decode($order->cart, true);;
        return view('user.order.details',compact('user','order','cart'));
    }

    public function orderdownload($slug,$id)
    {
        $user = $this->user;
        $order = Order::where('order_number','=',$slug)->first();
        $prod = Product::findOrFail($id);
        if(!isset($order) || $prod->type == 'Physical' || $order->user_id != $user->id)
        {
            return redirect()->back();
        }
        return response()->download(public_path('assets/files/'.$prod->file));
    }

    public function orderprint($id)
    {
        $user = $this->user;
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('user.order.print',compact('user','order','cart'));
    }

    public function trans()
    {
        $id = $_GET['id'];
        $trans = $_GET['tin'];
        $order = Order::findOrFail($id);
        $order->txnid = $trans;
        $order->update();
        $data = $order->txnid;
        return response()->json($data);
    }

}
