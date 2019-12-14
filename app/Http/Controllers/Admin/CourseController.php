<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use \App\Admin\Course;

use Session;
use Redirect;
use Validator;

class CourseController extends Controller
{
	/**
    * Function for get list of courses
    *
    * @return void
    */
	public function listCourses()
	{
		$allCourse = Course::getCourses();
		return view('admin/courses/list')->with('data', array('allCourse' => $allCourse));
	}

	/**
	* Function For Display Add Course Page
	*
	* @return void
	*/
	public function addCourse(Request $request)
	{
	    return view('admin/courses/add');
	}

	public function saveCourse(Request $request)
	{
		$validator = Validator::make($request->all(), [
	        'title' => 'required|unique:courses,title,NULL,id,deleted_at,NULL',
	    ]);

	    if($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }

	    $params = $request->post();

	    $course = new Course;
	    $course->title = $params['title'];
	    $course->created_at = CURRENT_DATE_TIME;

        if($course->save())
        {
            Session::flash('message', 'Course created successfully.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin-courses');
        }
        else
        {
        	Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
        	Session::flash('alert-class', 'alert-danger');
			return Redirect::back()->withInput();
        }
	}

	public function editCourse(Request $request)
	{
	    $params = $request->route()->parameters();
	    $data = array('course_details' => Course::find($params['id']));
	    if($data)
	    {
	    	return view('admin/courses/edit')->with('data', $data);
	    }
	    else
	    {
	    	Session::flash('message', 'No course found');
        	Session::flash('alert-class', 'alert-danger');
			return redirect()->route('admin-courses');
	    }
	}

	public function updateCourse(Request $request)
	{
	    $route_params = $request->route()->parameters();
		$validator = Validator::make($request->all(), [
	        'title' => 'required|unique:courses,title,' . $route_params['id'] . ',id,deleted_at,NULL',
	    ]);

	    if($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }
	    
	    $params = $request->all();

	    $course = Course::find($route_params['id']);
	    if($course)
	    {
	    	$course->title = $params['title'];
	    	$course->updated_at = CURRENT_DATE_TIME;
	        if($course->save())
	        {
	            Session::flash('message', 'Course updated successfully.');
	            Session::flash('alert-class', 'alert-success');
	            return redirect()->route('admin-courses');
	        }
	        else
	        {
	        	Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
	        	Session::flash('alert-class', 'alert-danger');
				return Redirect::back()->withInput();
	        }
	    }
	    else
	    {
	    	Session::flash('message', 'No course found');
        	Session::flash('alert-class', 'alert-danger');
			return redirect()->route('admin-courses');
	    }
	}

	/**
	* Function For delete course
	*
	* @return void
	*/
	public function deleteCourse(Request $request)
	{
	    $route_params = $request->route()->parameters();

	    Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
	    Session::flash('alert-class', 'alert-danger');

        $deleteCourse = Course::where('id', $route_params['uid'])->delete();
        if($deleteCourse)
        {
            Session::flash('message', 'Course Deleted Successfully'); 
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', 'Something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }

	    return redirect()->route('admin-courses');
	}
}
