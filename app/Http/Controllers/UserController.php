<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use \App\User;
use Redirect;
use Validator;
use Auth;
use Route;

use App\Admin\courseMaterialLogs;

class UserController extends Controller
{
    public function profile(Request $request)
	{
		$user = Auth::user();
		if($user)
		{
			$details =  $user->load('course.materials.materiallogs');
			// $getCourse = User::with('course.materials')->first();
			return view('profile')->with('data', $details);
		}
		else
		{
			return redirect()->route('user-login');
		}
	}

	public function getCourseMaterialLogs(Request $request)
	{
		$routeParams = Route::getCurrentRoute()->parameters();
		$user = Auth::user();
		if($user)
		{
			$getCourseMaterialLogs = courseMaterialLogs::where(['course_material_id' => $routeParams['id'], 'file_type' => $routeParams['type']])->get();
			return view('material_logs')->with('data', $getCourseMaterialLogs);
		}
		else
		{
			return redirect()->route('user-login');
		}
	}
}
