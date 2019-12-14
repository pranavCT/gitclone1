<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use \App\Admin\Course;

use Hash;
use Session;
use Redirect;
use Validator;

use Mail;
class UsersController extends Controller
{
    public function __construct()
    {
        #code...
    }

    /**
    * Function For User Listing
    *
    * @return void
    */
    public function list_users(Request $request)
    {
        $list_type = '';
        $route_params = $request->route()->parameters();

        $users = User::listUsersForAdmin();

        return view('admin/users/list')->with('data', array('all_users' => $users));
    }

    /**
    * Function For Display Add user Page
    *
    * @return void
    */
    public function addUser(Request $request)
    {
        return view('admin/users/add')->with('data', array('courses' => Course::getCoursesWithCourseMaterial()));
    }

    public function save_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required',
            'phone_number' => 'required',
            'qualification' => 'required',
            'course_id' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $params = $request->all();

        $user = new User;
        $user->first_name = $params['first_name'];
        $user->last_name = $params['last_name'];
        $user->age = $params['age'];
        $user->gender = $params['gender'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->phone_number = $params['phone_number'];
        $user->qualification = $params['qualification'];
        $user->course_id = $params['course_id'];
        $user->city = $params['city'];
        $user->state = $params['state'];
        $user->country = $params['country'];
        $user->created_at = CURRENT_DATE_TIME;

        try
        {
            $name = $params['first_name'] . ' ' . $params['last_name'];

            $to_emails = array(ADMIN_EMAIL);
            $strFromEmail = $params['email'];
            $strFromName = $name;
            $viewContent = 'Hi, ' . $name . ' Your login credentials are . <br/> Email: ' . $params['email'] . '<br/> password: ' . $params['password'];

            $mail = Mail::send([], [], function ($message) use($to_emails, $strFromEmail, $strFromName, $viewContent)
            {
                $message->from($strFromEmail, $strFromName)
                        ->to($to_emails)
                        ->subject('Login Credentials - gitClone')
                        ->setBody($viewContent, 'text/html');
            });

            if($user->save())
            {
                Session::flash('message', 'User created successfully.');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('admin-users');
            }
            else
            {
                Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back()->withInput();
            }
        }
        catch (Exception $e)
        {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return Redirect::back()->withInput();
        }
    }

    // public function edit_user(Request $request)
    // {
    //     $params = $request->route()->parameters();
    //     $data = array('user_detail' => User::fetch_user($params['id']));
    //     return view('admin/users/edit')->with('data', $data);
    // }

    // public function update_user(Request $request)
    // {
    //     $route_params = $request->route()->parameters();
        
    //     $insert_arr = $request->all();
    //     $insert_arr['id'] = $route_params['id'];
        
    //     $update_res = User::update_user($insert_arr);
    //     Session::flash('message', $update_res['message']); 
    //     Session::flash('alert-class', $update_res['alert_class']);

    //     return redirect('admin/edit-user/' . $route_params['id']);
    // }

    /**
    * Function For delete user
    *
    * @return void
    */
    public function deleteUser(Request $request)
    {
        $route_params = $request->route()->parameters();

        Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
        Session::flash('alert-class', 'alert-danger');
        
        $deleteUser = User::where('id', $route_params['uid'])->delete();
        if($deleteUser)
        {
            Session::flash('message', 'User Deleted Successfully'); 
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', 'Something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('admin-users');
    }

    /**
    * Function For User Details
    *
    * @return void
    */
    public function viewUser(Request $request)
    {
        $route_params = $request->route()->parameters();

        $userDetails = User::getUserDetails($route_params['id']);
        if($userDetails)
        {
            return view('admin/users/view')->with('data', array('userDetails' => $userDetails));
        }
        Session::flash('message', 'User not exist'); 
        Session::flash('alert-class', 'alert-danger');
        return redirect()->route('admin-users');
    }
}