<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use Auth;
use Hash;
use Session;
class AdminController extends Controller
{
    public function __construct()
    {
        #code...
    }
    /**
     * Redirect to login method
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin-login');
    }

    /**
    * Function For login view and authentication for login
    *
    * @return void
    */
    public function login(Request $request)
    {
        if (Auth::check())
        {
            return redirect()->route('admin-dashboard');
        }

        if ($request->isMethod('post'))
        {
            $user = ['email' => $request->input('email'), 'password' => $request->input('password')];
            if (Auth::attempt($user, true))
            {
                return redirect('admin/dashboard');
            }
            else
            {
                Session::flash('message', 'Oops.! Incorrect email or password.'); 
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back()->withInput();
            }
        }

        return view('admin/login');
    }

    /**
    * Function For logout admin
    *
    * @return void
    */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin-login');
    }

    /**
    * Function For display admin dashboard with data
    *
    * @return void
    */
    public function dashboard()
    {
        $data['user_registration_bar_graph'] = User::userRegistrationBarGraph()->toArray();
        return view('admin/dashboard')->with('data', $data);
    }
}
