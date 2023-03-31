<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\{Models\Subscription,
    Classes\GeniusMailer,
    Models\User,
    Models\UserSubscription,
    Models\PaymentGateway,
    Models\Coupon};
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends UserBaseController
{

    public function package()
    {

        $data['curr'] = $this->curr;
        $data['user'] = $this->user;
        $data['subs'] = Subscription::orderBy('price', 'asc')->get();
        $data['user_subs'] = UserSubscription::where('user_id', Auth::user()->id)->first();
        $data['package'] = $this->user->subscribes()->where('status', 1)->latest('id')->first();
        return view('user.package.index', $data);
    }


    public function check_coupon_code(Request $request)
    {

        $coupon_code = $request->input('coupon_code');
        $pkg_price = $request->input('pkg_price');
        $sub_id = $request->input('sub_id');

        $coupon_limit_check = Coupon::where('code', $coupon_code)->where('pkg_type', '=', $sub_id)->first();
        $today = Carbon::today()->format('Y-m-d');

        if ($coupon_limit_check->end_date < $today) {
            return response()->json(['status' => 'Coupon Code has been Expired',
                'error_status' => 'error']);
        }

        if($coupon_limit_check->times == !NULL && $coupon_limit_check->used ==$coupon_limit_check->times){
            return response()->json(['status'=>'Coupon Code Already used',
                'error_status'=>'error']);
        }

//        if($coupon_limit_check->used ==$coupon_limit_check->attempt){
//            return response()->json(['status'=>'Coupon Code Already used',
//                'error_status'=>'error']);
//        }

        $check_coupon = Coupon::where('code', $coupon_code)->where('pkg_type', '=', $sub_id)->first();

        if ($check_coupon) {
            $coupon = Coupon::where('code', $coupon_code)->first();

//            if (!$coupon->start_date <= Carbon::today()->format('Y-m-d') && Carbon::today()->format('Y-m-d') <= $coupon->end_date)
//            {
                //    Coupon Type (checking percentage Or Amount)
                if ($coupon->type == '0') //0=percentage
                {
                    $discount_price = ($pkg_price / 100) * $coupon->price;
                } elseif ($coupon->type == '1')//1=Amount
                {
                    $discount_price = $coupon->price;
                }

                $discount_price = $pkg_price - $discount_price;
                $check_coupon->used = $check_coupon->used + 1;
                $check_coupon->update();

                return response()->json(['discount_price' => $discount_price, 'status' => 'Coupon Code Successfully Applied',
                    'success_status' => 'success']);

//            } else {
//                return response()->json(['status' => 'Coupon Code has been Expired',
//                    'error_status' => 'error']);
//            }

        } else {
            return response()->json(['status' => 'Coupon Code does not exists',
                'error_status' => 'error']);
        }
    }


    public function vendorrequest($id)
    {
        $data['curr'] = $this->curr;
        $data['subs'] = Subscription::findOrFail($id);

        $data['user'] = $this->user;
        $data['package'] = $this->user->subscribes()->where('status', 1)->latest('id')->first();

        if ($this->gs->reg_vendor != 1) {
            return redirect()->back();
        }

        $data['gateway'] = PaymentGateway::whereSubscription(1)->where('currency_id', 'like', "%\"{$this->curr->id}\"%")->latest('id')->get();
        $paystackData = PaymentGateway::whereKeyword('paystack')->first();
        $data['paystack'] = $paystackData->convertAutoData();
        $voguepayData = PaymentGateway::whereKeyword('voguepay')->first();
//        if(Coupon::where('code', $coupon_code)->exists())
//        $data['coupon_get'] = Coupon::where('pkg_type',$data['subs']->id)->exists();
//        dd($data);
        return view('user.package.details', $data);
    }

    public function uservendorcurrentpkg($id)
    {
        $data['curr'] = $this->curr;
        $data['subs'] = Subscription::findOrFail($id);
        $data['user'] = $this->user;

        $data['package'] = $this->user->subscribes()->where('status', 1)->latest('id')->first();
        return view('user.package.currentpkg', $data);
    }

//
    public function vendorrequestsub(Request $request)
    {
        $input = $request->all();

        if (isset($input['method'])) {
            return redirect()->back();
        }
        $this->validate($request,
            [
                'shop_name' => 'unique:users',
            ],
            [
                'shop_name.unique' => __('This shop name has already been taken.')
            ]);

        if (\DB::table('pages')->where('slug', $request->shop_name)->exists()) {
            return redirect()->back()->with('unsuccess', __('This shop name has already been taken.'));
        }

        $success_url = route('user.payment.return.get');
        $user = $this->user;
        $subs = Subscription::findOrFail($request->subs_id);
        $user->is_vendor = 2;
        $user->date = date('Y-m-d', strtotime(Carbon::now()->format('Y-m-d') . ' + ' . $subs->days . ' days'));
        $user->mail_sent = 1;
        $user->update($input);

        $sub = new UserSubscription;
        $data = json_decode(json_encode($subs), true);
        $data['user_id'] = $user->id;
        $data['subscription_id'] = $subs->id;
        $data['method'] = 'Free';
        $data['currency_sign'] = $this->curr->sign;
        $data['currency_code'] = $this->curr->name;
        $data['currency_value'] = $this->curr->value;
        $data['status'] = 1;

        if (empty($request->discount_price)) {
            $price = $subs->total_price;
        } else {
            $price = $request->discount_price;
        }

        $data['total_price'] = $price;

//        $data['total_price'] = $subs->total_price;
        $data['payout_time'] = $subs->payout_time;
        $sub->fill($data)->save();

        return redirect($success_url);
    }

    public function paycancle()
    {
        return redirect()->back()->with('unsuccess', __('Payment Cancelled.'));
    }

    public function payreturn()
    {
        return redirect()->route('user-dashboard')->with('success', __('Vendor Account Activated Successfully'));
    }

    public function check(Request $request)
    {

        //--- Validation Section
        $input = $request->all();
        $rules = ['shop_name' => 'unique:users'];
        $customs = ['shop_name.unique' => __('This shop name has already been taken.')];
        $validator = \Validator::make($input, $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        return response()->json('success');
    }
}
