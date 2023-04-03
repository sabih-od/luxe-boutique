<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use phpDocumentor\Descriptor\Interfaces\VisibilityInterface;
use Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function login(Request $request)
    {
        //--- Validation Section
        $rules = [
                  'email'   => 'required|email',
                  'password' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

      // Attempt to log the user in
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location

        // Check If Email is verified or not
          if(Auth::user()->email_verified == 'No')
          {
            Auth::logout();
            return response()->json(array('errors' => [ 0 => __('Your Email is not Verified!') ]));   
          }

          if(Auth::user()->ban == 1)
          {
            Auth::logout();
            return response()->json(array('errors' => [ 0 => __('Your Account Has Been Banned.') ]));   
          }

          // Login Via Modal
          if(empty($request->auth_modal)){
            if(!empty($request->modal))
            {
              // Login as Vendor
              if(!empty($request->vendor))
              {
                if(Auth::user()->is_vendor == 2)
                {
                    return redirect()->route('vendor.dashboard')->with('success','Logged In Successfully');
//                  return response()->json(route('vendor.dashboard'));
                }
                else {
                    return redirect()->route('user-package')->with('success','Logged In Successfully');
//                  return response()->json(route('user-package'));
                  }
              }
            // Login as User
//            return response()->json(1);
            }
          }
          // Login as User
          return redirect()->route('user-dashboard')->with('success','Logged In Successfully');
//          return response()->json(redirect()->intended(route('user-dashboard'))->getTargetUrl());
      }

      // if unsuccessful, then redirect back to the login with the form data
          return response()->json(array('errors' => [ 0 => __('Credentials Doesn\'t Match !') ]));     
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    
}
