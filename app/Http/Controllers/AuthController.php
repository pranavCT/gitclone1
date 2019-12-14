<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Response\QrCodeResponse;

use Auth;
use Mail;
use Session;
use Socialite;

use \App\User;
use App\Mail\AuthImail;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		if (Auth::check())
		{
			return redirect()->route('user-profile');
		}

		if ($request->isMethod('post'))
		{
			$user = ['email' => $request->post('email'), 'password' => $request->post('password')];
			if (Auth::attempt($user))
			{
				return redirect()->route('user-profile');
			}

			Auth::logout();

			Session::flash('message', 'Incorrect login credentials.'); 
			Session::flash('alert-class', 'danger');
			return redirect()->route('user-login');
		}
		return view('login');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('user-login');
	}
}