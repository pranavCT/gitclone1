<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class verifyUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user())
        {
            if (Auth::user()->user_type == USER_ROLE_USER)
            {
                if (Auth::user()->status == USER_STATUS_ACTIVE)
                {
                    return $next($request);
                }

                Session::flash('message', 'Account verification is pending. Please verify your account first.'); 
                Session::flash('alert-class', 'danger');
            }
            else
            {
                Session::flash('message', 'Unauthorized request.'); 
                Session::flash('alert-class', 'danger');
            }

            Auth::logout();
        }

        return redirect()->route('user-login');
    }
}
