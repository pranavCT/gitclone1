<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use \App\Admin\courseMaterial;
use \App\Admin\courseMaterialLogs;
use \App\Admin\Course;

use Session;
use Redirect;
use Validator;

class CourseMaterialController extends Controller
{
    /**
    * Function for get list of courses
    *
    * @return void
    */
	public function listCourseMaterials()
	{
		$allCourseMaterials = courseMaterial::getCourseMaterials();
		return view('admin/course_materials/list')->with('data', array('allCourseMaterials' => $allCourseMaterials));
	}

	/**
	* Function For Display Add Course Materials Page
	*
	* @return void
	*/
	public function addCourseMaterials(Request $request)
	{
	    return view('admin/course_materials/add')->with('data', array('courses' => Course::getCourses()));
	}

	public function saveCourseMaterial(Request $request)
	{
		$validator = Validator::make($request->all(), [
	        'title' => 'required|unique:course_materials,title,NULL,id,deleted_at,NULL',
	        'course_id' => 'required|unique:course_materials,course_id,NULL,id,deleted_at,NULL',
	        'pdf_file' => 'required',
	        'doc_file' => 'required',
	        'zip_file' => 'required',
	    ]);

	    if($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }


	    $params = $request->post();
	    $pdf_file = $request->file('pdf_file');
	    $doc_file = $request->file('doc_file');
	    $zip_file = $request->file('zip_file');

	    $destination_folder = '/public/uploaded_files/course_materials/' . $params['course_id'];

	    $courseMaterial = new courseMaterial;
	    $courseMaterial->title = $params['title'];
	    $courseMaterial->course_id = $params['course_id'];
	    $courseMaterial->pdf_file = courseMaterial::uploadMediaFile($pdf_file, FILE_TYPE_PDF, $destination_folder);
	    $courseMaterial->pdf_file_path = $destination_folder . '/' . $courseMaterial->pdf_file;

	    $courseMaterial->doc_file = courseMaterial::uploadMediaFile($doc_file, FILE_TYPE_DOC, $destination_folder);
	    $courseMaterial->doc_file_path = $destination_folder . '/' . $courseMaterial->doc_file;

	    $courseMaterial->zip_file = courseMaterial::uploadMediaFile($zip_file, FILE_TYPE_ZIP, $destination_folder);
	    $courseMaterial->zip_file_path = $destination_folder . '/' . $courseMaterial->zip_file;

	    $courseMaterial->created_at = CURRENT_DATE_TIME;

        if($courseMaterial->save())
        {
        	$courseMaterialLogs = [
        		[
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_PDF,
        			'file_path' => $courseMaterial->pdf_file_path,
        			'created_at' => CURRENT_DATE_TIME
        		],
        		[
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_DOC,
        			'file_path' => $courseMaterial->doc_file_path,
        			'created_at' => CURRENT_DATE_TIME
        		],
        		[
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_ZIP,
        			'file_path' => $courseMaterial->zip_file_path,
        			'created_at' => CURRENT_DATE_TIME	
        		]
        	];

        	if(courseMaterialLogs::insert($courseMaterialLogs))
        	{
        		Session::flash('message', 'Course Material created successfully.');
	            Session::flash('alert-class', 'alert-success');
	            return redirect()->route('admin-course-materials');
        	}
        	else
        	{
        		$courseMaterial->delete();
        		Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
	        	Session::flash('alert-class', 'alert-danger');
				return Redirect::back()->withInput();
        	}
        }
        else
        {
        	Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
        	Session::flash('alert-class', 'alert-danger');
			return Redirect::back()->withInput();
        }
	}

	public function editCourseMaterial(Request $request)
	{
	    $params = $request->route()->parameters();
	    $data = courseMaterial::find($params['id']);
	    if($data)
	    {
	    	return view('admin/course_materials/edit')->with('data', array('course_material_details' => $data,'courses' => Course::getCourses()));
	    }
	    else
	    {
	    	Session::flash('message', 'No course material found');
        	Session::flash('alert-class', 'alert-danger');
			return redirect()->route('admin-course-materials');
	    }
	}

	public function updateCourseMaterial(Request $request)
	{
	    $route_params = $request->route()->parameters();
		$validator = Validator::make($request->all(), [
	        'title' => 'required|unique:course_materials,title,' . $route_params['id'] . ',id,deleted_at,NULL',
	        'course_id' => 'required|unique:course_materials,course_id,' . $route_params['id'] . ',id,deleted_at,NULL'
	    ]);

	    if($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }
	    
	    $params = $request->all();
	    $pdf_file = $request->file('pdf_file');
	    $doc_file = $request->file('doc_file');
	    $zip_file = $request->file('zip_file');

	    $destination_folder = '/public/uploaded_files/course_materials/' . $params['course_id'];

	    $courseMaterial = courseMaterial::find($route_params['id']);
	    if($courseMaterial)
	    {
	    	$courseMaterialLogs = [];
	    	$courseMaterial->title = $params['title'];
	    	$courseMaterial->course_id = $params['course_id'];

	    	if(!empty($params['pdf_file']))
	    	{
		    	$courseMaterial->pdf_file = courseMaterial::uploadMediaFile($pdf_file, FILE_TYPE_PDF, $destination_folder);
		    	$courseMaterial->pdf_file_path = $destination_folder . '/' . $courseMaterial->pdf_file;

		    	$courseMaterialLogsPDF = [
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_PDF,
        			'file_path' => $courseMaterial->pdf_file_path,
        			'created_at' => CURRENT_DATE_TIME	
        		];

        		array_push($courseMaterialLogs, $courseMaterialLogsPDF);
	    	}

	    	if(!empty($params['doc_file']))
	    	{
		    	$courseMaterial->doc_file = courseMaterial::uploadMediaFile($doc_file, FILE_TYPE_DOC, $destination_folder);
		    	$courseMaterial->doc_file_path = $destination_folder . '/' . $courseMaterial->doc_file;

		    	$courseMaterialLogsDOC = [
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_DOC,
        			'file_path' => $courseMaterial->doc_file_path,
        			'created_at' => CURRENT_DATE_TIME	
        		];

        		array_push($courseMaterialLogs, $courseMaterialLogsDOC);
		    }

		    if(!empty($params['zip_file']))
	    	{
		    	$courseMaterial->zip_file = courseMaterial::uploadMediaFile($zip_file, FILE_TYPE_ZIP, $destination_folder);
		    	$courseMaterial->zip_file_path = $destination_folder . '/' . $courseMaterial->zip_file;

		    	$courseMaterialLogsZIP = [
        			'course_material_id' => $courseMaterial->id,
        			'file_type' => FILE_TYPE_ZIP,
        			'file_path' => $courseMaterial->zip_file_path,
        			'created_at' => CURRENT_DATE_TIME	
        		];

        		array_push($courseMaterialLogs, $courseMaterialLogsZIP);
		    }

		    $courseMaterial->updated_at = CURRENT_DATE_TIME;
	        if($courseMaterial->save() && courseMaterialLogs::insert($courseMaterialLogs))
	        {
	            Session::flash('message', 'Course Material updated successfully.');
	            Session::flash('alert-class', 'alert-success');
	            return redirect()->route('admin-course-materials');
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
	    	Session::flash('message', 'No course material found');
        	Session::flash('alert-class', 'alert-danger');
			return redirect()->route('admin-course-materials');
	    }
	}

	/**
	* Function For delete course material
	*
	* @return void
	*/
	public function deleteCourseMaterial(Request $request)
	{
	    $route_params = $request->route()->parameters();

	    Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
	    Session::flash('alert-class', 'alert-danger');

        $deleteCourse = courseMaterial::where('id', $route_params['uid'])->delete();
        if($deleteCourse)
        {
            Session::flash('message', 'Course Material Deleted Successfully'); 
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', FAILURE_TRY_AGAIN_MESSAGE);
            Session::flash('alert-class', 'alert-danger');
        }

	    return redirect()->route('admin-course-materials');
	}
}
