<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class AdminAuth
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
			if (Auth::user()->user_type == USER_ROLE_ADMIN && Auth::user()->status == ADMIN_STATUS_ACTIVE)
			{
				return $next($request);
			}

			Auth::logout();

			Session::flash('message', 'Unauthorized request.'); 
			Session::flash('alert-class', 'danger');
		}

		return redirect()->route('admin-login');
	}
}
