<?php

namespace App\Http\Controllers\Vendor;

use App\Models\PaymentGateway;
use App\Models\User;
use App\Models\UserSubscription;
use App\Models\VendorOrder;
use App\Models\Withdraw;
use App\Traits\Payouts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WithdrawController extends VendorBaseController
{

    use Payouts;

    public function index()
    {
        $from = $this->user;
        $stripe = PaymentGateway::whereKeyword('stripe')->first();
        $paydata = $stripe->convertAutoData();
        \Config::set('services.stripe.key', $paydata['key']);
        \Config::set('services.stripe.secret', $paydata['secret']);

        if (is_null($from->stripe_account_id)) {
            $stripeClient = $this->createStripeClient($paydata['secret']);
            $clientId = $stripeClient->id;

            // Add client id to user table
//                        $user = User::find(Auth::user()->id);
//                        $user->stripe_account_id = $clientId;
//                        $user->save();

            Session::put('stripeClientId', $clientId);

            // get url so that user can add details to stripe
            $accountLink = $this->accountLink($paydata['secret'], $clientId);

//            return response()->json(array('message' => 'Redirecting To Stripe', 'url' => $accountLink->url));
//            return redirect()->back()->with('url', $accountLink->url);
            return redirect()->to($accountLink->url);
//            return response()->json(array('message' => 'Redirecting To Stripe', 'url' => $accountLink->url));
        }

        $withdraws = Withdraw::where('user_id', '=', $this->user->id)->where('type', '=', 'vendor')->latest('id')->get();
        $sign = $this->curr;
        return view('vendor.withdraw.index', compact('withdraws', 'sign'));
    }


    public function create()
    {
        $sign = $this->curr;
        $current_date = Carbon::now();

        $user_payout = UserSubscription::where('user_id', Auth::user()->id)->first();
        $startingDate = date('Y-m-d', strtotime('today - '.$user_payout->payout_time.' days'));


//        dd($startingDate);

        $last30DaysEarning = VendorOrder::whereDate('created_at', '>=', $startingDate)
            ->whereDate('created_at', '<=', $current_date)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'completed')
            ->sum('price');

        return view('vendor.withdraw.create', compact('sign', 'last30DaysEarning'));
    }


    public function store(Request $request)
    {
        $from = $this->user;
        $withdrawcharge = $this->gs;
        $charge = $withdrawcharge->withdraw_fee;

        // Stripe Details
        if ($request->methods == 'Stripe') {
            $stripe = PaymentGateway::whereKeyword('stripe')->first();
            $paydata = $stripe->convertAutoData();
            \Config::set('services.stripe.key', $paydata['key']);
            \Config::set('services.stripe.secret', $paydata['secret']);
        }

        // Last 30 days earning
        $current_date = Carbon::now();
        $user_payout = UserSubscription::where('user_id', Auth::user()->id)->first();
        $startingDate = date('Y-m-d', strtotime('today - '.$user_payout->payout_time.' days'));


        $last30DaysEarning = VendorOrder::whereDate('created_at', '>=', $startingDate)
            ->whereDate('created_at', '<=', $current_date)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'completed')
            ->sum('price');

        if ($request->amount > 0) {
            $amount = $request->amount;

            if ($from->current_balance - $last30DaysEarning >= $amount) {
                $fee = (($withdrawcharge->withdraw_charge / 100) * $amount) + $charge;
                $finalamount = $amount - $fee;
                $finalamount = number_format((float)$finalamount, 2, '.', '');

                if ($request->methods == 'Stripe') {
                    if (is_null($from->stripe_account_id)) {
                        $stripeClient = $this->createStripeClient($paydata['secret']);
                        $clientId = $stripeClient->id;

                        // Add client id to user table
//                        $user = User::find(Auth::user()->id);
//                        $user->stripe_account_id = $clientId;
//                        $user->save();

                        Session::put('stripeClientId', $clientId);

                        // get url so that user can add details to stripe
                        $accountLink = $this->accountLink($paydata['secret'], $clientId);

                        return response()->json(array('message' => 'Redirecting To Stripe', 'url' => $accountLink->url));
                    } else {
                        $user = User::find(Auth::user()->id);
                        $transfer = $this->stripeTransfer($paydata['secret'], $user->stripe_account_id, $finalamount);
                        if (isset($transfer->id)) {
                            $from->current_balance = $from->current_balance - $amount;
                            $from->update();

                            $newwithdraw = new Withdraw();
                            $newwithdraw['user_id'] = $this->user->id;
                            $newwithdraw['method'] = $request->methods;
                            $newwithdraw['acc_email'] = $request->acc_email;
                            $newwithdraw['iban'] = $request->iban;
                            $newwithdraw['country'] = $request->acc_country;
                            $newwithdraw['acc_name'] = $request->acc_name;
                            $newwithdraw['address'] = $request->address;
                            $newwithdraw['swift'] = $request->swift;
                            $newwithdraw['reference'] = $request->reference;
                            $newwithdraw['amount'] = $finalamount;
                            $newwithdraw['fee'] = $fee;
                            $newwithdraw['type'] = 'vendor';
                            $newwithdraw['status'] = 'completed';
                            $newwithdraw->save();

                            return response()->json(__('Amount Withdrawn Successfully.'));

                        } else {
                            return response()->json(array('errors' => [0 => __($transfer . ' Please try again.')]));
                        }
                    }
                }

                $from->current_balance = $from->current_balance - $amount;
                $from->update();

                $newwithdraw = new Withdraw();
                $newwithdraw['user_id'] = $this->user->id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $finalamount;
                $newwithdraw['fee'] = $fee;
                $newwithdraw['type'] = 'vendor';
                $newwithdraw->save();

                return response()->json(__('Withdraw Request Sent Successfully.'));

            } else {
                return response()->json(array('errors' => [0 => __('Insufficient Balance.')]));
            }
        }
        return response()->json(array('errors' => [0 => __('Please enter a valid amount.')]));

    }

    public function connectStripe($status)
    {
        if ($status == 'failed') {
            $updateClientId = User::where('id', Auth::user()->id)->update([
                'stripe_account_id' => null,
            ]);

            $message = 'Failed Connecting Stripe Please Try Again';
        } elseif ($status == 'success') {

            // Add client id to user table
            $user = User::find(Auth::user()->id);
            $user->stripe_account_id = Session::get('stripeClientId');
            $user->save();

            $message = 'Stripe Connected Successfully';
        }

        return view('vendor.stripe.connect-status', compact('message'));
    }
}
