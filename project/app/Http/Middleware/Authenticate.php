<?php

namespace App\Http\Middleware;


use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (session()->has('userBooking')) {
            $login_time = Carbon::parse(session()->get('userBooking'))->addHour();

            if(Carbon::now() <= $login_time) {
                return $next($request);
            } else {
                session()->remove('userBooking');
                return redirect()->route('front.index');
            }
        }

        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        return redirect()->route('user.login');

    }
}
