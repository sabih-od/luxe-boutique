<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Auth;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // CHECKOUT
        'checkout/payment/paytm-notify',
        'checkout/payment/razorpay-notify',
        'cflutter/notify',
        'checkout/payment/ssl-notify',
        // SUBSCRIPTION
        'user/paytm-notify',
        'user/razorpay-notify',
        'uflutter/notify',
        'user/ssl-notify',
        // DEPOSIT
        'user/deposit/paytm-notify',
        'user/deposit/razorpay-notify',
        'dflutter/notify',
        'user/deposit/ssl-notify',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        if (!Auth::check()) {
//            return redirect()->route('user.login');
//        }
//        return $next($request);
//    }

//    public function handle($request, Closure $next, $guard = null)
//    {
//
//        if (!Auth::guard('admin')->check()){
//            return redirect()->route('user.login');
//        }
//
//        return $next($request);
//    }

}
