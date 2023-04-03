<?php

namespace App\Http\Controllers\User;

use App\{Classes\GeniusMailer,
    Models\FavoriteSeller,
    Models\Generalsetting,
    Models\Mentor,
    Models\MentorSessions,
    Models\Order,
    Models\PaymentGateway
};
use Illuminate\{Http\Request, Support\Facades\Hash, Support\Facades\Validator, Support\Str};
use PHPUnit\Exception;
use Auth;

class UserController extends UserBaseController
{

    public function index()
    {
        $user = $this->user;
        $gs = Generalsetting::findOrFail(1);
        if ($user->email_verified === 'No' && $gs->is_verification_email == 1) {
            $data['code'] = $user->verification_code;
            $data['user_id'] = $user->id;
            return view('frontend.verify', compact('data'));
        } else {
            return view('user.dashboard', compact('user'));
        }
    }

    public function profile()
    {
        $user = $this->user;
        return view('user.profile', compact('user'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section
        $rules =
            [
                'photo' => 'mimes:jpeg,jpg,png,svg',
                'email' => 'unique:users,email,' . $this->user->id
            ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        //--- Validation Section Ends
        $input = $request->all();
        $currentUser = $this->user;
        $data = $currentUser;

        $gs = Generalsetting::findOrFail(1);
        if ($request->has('email') && $request->email !== $currentUser->email && $gs->is_verification_email) {
            unset($input['email']);

            $input['email_verified'] = 'No';
            $verifyCode = Str::random(6); // Generates a 6-character code
            $input['verification_code'] = $verifyCode;
            $data->update($input);

            $subject = 'Verification Your Code.';
            $msg = "Dear Customer,<br><br> We need to be verify you with your email address.<br> Simply enter the code below to verify your new email address.
                    <br><br>
                    $verifyCode";

            // Sending Email To Customer
            $data = [
                'to' => $request->email,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);

            $data['code'] = $verifyCode;
            $data['user_id'] = $currentUser->id;
            $data['new_email'] = $request->email;
            $msg = __('We have sent you an email with verification code. Please verify the email');
            return response()->json([
                'email_verify' => true,
                'msg' => $msg,
                'data' => $data
            ]);
        }

        if ($file = $request->file('photo')) {
            $extensions = ['jpeg', 'jpg', 'png', 'svg'];
            if (!in_array($file->getClientOriginalExtension(), $extensions)) {
                return response()->json(array('errors' => ['Image format not supported']));
            }
            $name = \PriceHelper::ImageCreateName($file);
            $file->move('assets/images/users/', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/users/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/users/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);
        return redirect()->back()->with('success','Successfully updated your profile');
//        $msg = __('Successfully updated your profile');
//        return response()->json($msg);
    }

    public function resetform()
    {
        return view('user.reset');
    }

    public function reset(Request $request)
    {
        try {
            $user = $this->user;
            if ($request->cpass) {
                if (Hash::check($request->cpass, $user->password)) {
                    if ($request->newpass == $request->renewpass) {
                        $input['password'] = Hash::make($request->newpass);
                    } else {
                        return response()->json(array('errors' => [0 => __('Confirm password does not match.')]));
                    }
                } else {
                    return response()->json(array('errors' => [0 => __('Current password Does not match.')]));
                }
            }
            $user->update($input);
            Auth::logout();
            $msg = __('Successfully changed your password');
            return response()->json([
                'msg' => $msg,
                'redirect' => route('user.login')
            ]);
            //return redirect()->route('user.login')->with('success', 'Successfully changed your password');
        } catch (Exception $exception) {
            return $exception;
        }
//        $msg = __('Successfully changed your password');
//        return response()->json($msg);

    }

    public function loadpayment($slug1, $slug2)
    {
        $data['payment'] = $slug1;
        $data['pay_id'] = $slug2;
        $data['gateway'] = '';
        if ($data['pay_id'] != 0) {
            $data['gateway'] = PaymentGateway::findOrFail($data['pay_id']);
        }
        return view('load.payment-user', $data);
    }

    public function favorite($id1, $id2)
    {
        $fav = new FavoriteSeller();
        $fav->user_id = $id1;
        $fav->vendor_id = $id2;
        $fav->save();
        $data['icon'] = '<i class="icofont-check"></i>';
        $data['text'] = __('Favorite');
        return response()->json($data);
    }

    public function favorites()
    {
        $user = $this->user;
        $favorites = FavoriteSeller::where('user_id', '=', $user->id)->get();
        return view('user.favorite', compact('user', 'favorites'));
    }


    public function favdelete($id)
    {
        $wish = FavoriteSeller::findOrFail($id);
        $wish->delete();
        return redirect()->route('user-favorites')->with('success', __('Successfully Removed The Seller.'));
    }

    public function affilate_code()
    {
        $user = $this->user;
        return view('user.affilate.affilate-program', compact('user'));
    }


    public function affilate_history()
    {
        $user = $this->user;
        $affilates = Order::where('status', '=', 'completed')->where('affilate_users', '!=', null)->get();
        $final_affilate_users = array();
        $i = 0;
        foreach ($affilates as $order) {
            $affilate_users = json_decode($order->affilate_users, true);
            foreach ($affilate_users as $key => $auser) {
                if ($auser['user_id'] == $user->id) {
                    $final_affilate_users[$i]['customer_name'] = $order->customer_name;
                    $final_affilate_users[$i]['product_id'] = $auser['product_id'];
                    $final_affilate_users[$i]['charge'] = \PriceHelper::showOrderCurrencyPrice(($auser['charge'] * $order->currency_value), $order->currency_sign);

                    $i++;
                }
            }
        }
        return view('user.affilate.affilate-history', compact('user', 'final_affilate_users'));
    }


    public function becomeAMentor(Request $request)
    {
        $user = $this->user;
        if ($request->isMethod('post')) {
//            dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'about_me' => 'required',
                'documents' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $file) {
                    $name = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/files/mentor/documents', $name);
                    $files[] = $name;
                }
            }

            Mentor::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'about_me' => $request->about_me,
                    'documents' => json_encode($files),
                ]
            );

            return redirect('user/dashboard')->with('success', 'Your have signup as mentor. Please wait until your documents are being reviewed');
        }
        return view('user.mentor.become-a-mentor', compact('user'));
    }

    public function MentorSession()
    {
        return view('user.mentor.mentor-sessions');
    }

    public function MentorSessionDataTable()
    {
        $user = $this->user;
        try {
            if (request()->ajax()) {
                $mentor = Mentor::where('user_id', $user->id)->first();
                return datatables()->of(MentorSessions::where('mentor_id', $mentor->id)->get())
                    ->addIndexColumn()
//                    ->addColumn('action', function ($data) {
//                        return '<a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#book-mentor-modal-' . $data->id . '"><i class="fa fa-calendar"></i> Book Session</a>';
//                    })
                    ->make();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
