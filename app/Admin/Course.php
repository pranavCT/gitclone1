<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    /**
    * Function To get all courses for listing
    *
    * @return void
    */
    public static function getCourses()
    {
    	return Self::get();
    }

    public function materials()
    {
        return $this->hasOne('App\Admin\courseMaterial');
    }

    public static function getCoursesWithCourseMaterial()
    {
        return Self::whereHas('materials')->get();
    }
}
