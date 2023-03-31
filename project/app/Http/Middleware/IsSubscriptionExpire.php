<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSubscriptionExpire
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        if ( Auth::user()->is_vendor == 2  && Auth::user()->isSubscriptionActive() || Auth::user()->is_vendor == 0 ) {

            return $next($request);

        }
        return redirect()->route('user-dashboard')->with('unsuccess',' Please Subscribe to a Plan');


//        if (Auth::user()->isSubscriptionActive()) {
//            return $next($request);
//        }
//        return redirect()->route('user-dashboard')->with('unsuccess','Not Access This Page Please Upgrade Your Plan ');

    }
}
