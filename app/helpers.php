<?php
//Get Course name using course_id
if (!function_exists('courseDetails')) 
{
    function courseDetails($course_id) 
    {
    	return DB::table('courses')
    							->where(array('id' => $course_id, 'deleted_at' => NULL))
    							->first();
    }
}