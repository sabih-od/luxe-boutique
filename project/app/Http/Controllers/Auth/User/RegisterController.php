<?php

namespace App\Http\Controllers\Auth\User;

use Carbon\Carbon;
use App\{Classes\GeniusMailer,
    Http\Controllers\Controller,
    Models\Generalsetting,
    Models\Notification,
    Models\Subscription,
    Models\User,
    Models\UserSubscription
};
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;

class RegisterController extends Controller
{

    public function register(Request $request)
    {

        $gs = Generalsetting::findOrFail(1);
        if ($gs->is_capcha == 1) {
            $rules = [
                'g-recaptcha-response' => 'required|captcha'
            ];
            $customs = [
                'g-recaptcha-response.required' => "Please verify that you are not a robot.",
                'g-recaptcha-response.captcha' => "Captcha error! try again later or contact site admin..",
            ];
            $validator = Validator::make($request->all(), $rules, $customs);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
        }

        //--- Validation Section
        $rules = [
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $user = new User;
        $input = $request->all();

        $input['password'] = bcrypt($request['password']);
        $verificationCode = Str::random(6); // Generates a 6-character code
        $input['verification_code'] = $verificationCode;
        if ($request->get('is_affiliate', 0) == 1 && $request->get('vendor', 0) != 1) {
            $input['affilate_code'] = md5($request->name . $request->email);
        }

        if ($request->get('is_affiliate', 0) == 1) {
            $input['is_vendor'] = 1;
        }

        if (!empty($request->vendor)) {
            //--- Validation Section
            $rules = [
                'shop_name' => 'unique:users',
            ];
            $customs = [
                'shop_name.unique' => __('This Shop Name has already been taken.'),
            ];

            $validator = Validator::make($request->all(), $rules, $customs);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }

            $prev_user = User::orderBy('id', 'desc')->first();
            $shop_number = (int)$prev_user['shop_number'] + 100;
            $input['shop_number'] = (string)$shop_number;
            $input['is_vendor'] = 2;
            $input['verification_code'] = $verificationCode;
            $user->date = date('Y-m-d', strtotime(Carbon::now()->format('Y-m-d')));
            $user->fill($input)->save();
//            $user_id = $user->id;
//
//            $Subscription = Subscription::where('title', 'IMA Free PLAN')->first();
//            $UserSubscription = new UserSubscription();
//            $UserSubscription->user_id = $user_id;
//            $UserSubscription->subscription_id = $Subscription->id;
//            $UserSubscription->title = $Subscription->title;
//            $UserSubscription->price = $Subscription->price;
//            $UserSubscription->days = $Subscription->days;
//            $UserSubscription->allowed_products = $Subscription->allowed_products;
//            $UserSubscription->details = $Subscription->details;
//            $UserSubscription->total_price = $Subscription->total_price;
//            $UserSubscription->payout_time = $Subscription->payout_time;
//            $UserSubscription->expired_at = Carbon::now()->addDays($Subscription->payout_time)->format('Y-m-d');
//            $UserSubscription->status = 1;
//            $UserSubscription->save();
        }

        else {
            $prev_user = User::orderBy('id', 'desc')->first();
            $shop_number = (int)$prev_user['shop_number'] + 100;
            $input['shop_number'] = (string)$shop_number;
            $input['is_vendor'] = 0;
            $input['verification_code'] = $verificationCode;
            $user->date = date('Y-m-d', strtotime(Carbon::now()->format('Y-m-d')));
            $user->fill($input)->save();
//            $user_id = $user->id;
//
//            $Subscription = Subscription::where('title', 'IMA Flagstar PLAN')->first();
//            $UserSubscription = new UserSubscription();
//            $UserSubscription->user_id = $user_id;
//            $UserSubscription->subscription_id = $Subscription->id;
//            $UserSubscription->title = $Subscription->title;
//            $UserSubscription->price = $Subscription->price;
//            $UserSubscription->days = $Subscription->days;
//            $UserSubscription->allowed_products = $Subscription->allowed_products;
//            $UserSubscription->details = $Subscription->details;
//            $UserSubscription->total_price = $Subscription->total_price;
//            $UserSubscription->payout_time = $Subscription->payout_time;
//            $UserSubscription->expired_at = Carbon::now()->addDays($Subscription->payout_time)->format('Y-m-d');
//            $UserSubscription->status = 1;
//            $UserSubscription->save();
        }

        if ($gs->is_verification_email == 1) {
            $to = $request->email;
            $user_name =$request->name;
            $subject = 'Verification Your Code.';
            $view = view('frontend.mail2.register-email', compact('verificationCode','user_name'))->render();

            // Sending Email To Customer
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $view,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);

//            Mail::send( function($message) use($to, $subject, $view) {
//                $message->to($to)
//                    ->subject($subject)
//                    ->setBody($view);
//            });

            $data['code'] = $verificationCode;
            $data['user_id'] = $user->id;
            return view('frontend.verify', compact('data'));
        } else {
            $user->email_verified = 'Yes';
            $user->update();
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();

            Auth::login($user);

            // Sending Email To User
            $to = $user->email;
            $subject = 'Registration Successfully.';
            $view = view('frontend.mail2.authentication', compact('user'))->render();
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $view,
            ];
            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
            return redirect()->route('user-dashboard')->with('success', "Logged In Successfully");
        }
    }

    public function verification(Request $request)
    {
        if ($request->verification_code === $request->entered_code) {

            if ($request->has('new_email')) {
                $user = User::find($request->user_id);
                $user->email_verified = 'Yes';
                $user->email = $request->new_email;
                $user->update();

                // Sending Email To Customer
                $to = $user->email;
                $subject = 'Email Verification Completed.';
                $msg = "Dear " . $user->name . "<br><br>" . "Email verification is successfully completed.";

                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);

                return redirect()->route('user-dashboard')->with('success', __('Email is successfully updated.'));
            }

            $user = User::find($request->user_id);
            $user->email_verified = 'Yes';
            $user->update();

            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();

            Auth::login($user);

            // Sending Email To Customer
            $to = $user->email;
            $subject = 'Authentication Successfully.';
            $view = view('frontend.mail2.authentication', compact('user'))->render();

            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $view,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);

            return redirect()->route('user-dashboard')->with('success', __('Authentication Successfully'));
        } else {
            return redirect()->back()->with('error', "Verify Code Doesn't Match/");
        }
    }
}
