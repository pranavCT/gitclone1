<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courseMaterial extends Model
{
    use SoftDeletes;

    /**
    * Function To get all courses for listing
    *
    * @return void
    */
    public static function getCourseMaterials()
    {
    	return Self::get();
    }

    /**
    * Function To upload media files
    *
    * @return void
    */
    public static function uploadMediaFile($file, $file_type, $destination_folder)
    {
        if (!is_dir(base_path() . $destination_folder))
        {
            mkdir(base_path() . $destination_folder, 0777, true);
        }

        $allowedArr = array();
        if($file_type == FILE_TYPE_DOC)
        {
            $allowedArr = array('doc', 'docx', 'txt');
        }
        else if ($file_type == FILE_TYPE_PDF) 
        {
            $allowedArr = array('pdf');
        }
        else if ($file_type == FILE_TYPE_ZIP) 
        {
            $allowedArr = array('zip', 'rar', '7zip');
        }

        $failed_uploads = array();
        
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $is_allowed = false;

        if (in_array(strtolower($extension), $allowedArr))
        {
            $is_allowed = true;
        }

        if ($is_allowed)
        {
            $mfile = time() . '_' . preg_replace('/[^a-z0-9.]/i', '', $filename);
            $destinationPath = base_path() . $destination_folder;

            if ($file->move($destinationPath, $mfile))
            {
                return $mfile;
            }
            else
            {
                return false;
            }
        }

        return false;
    }

    public function materiallogs()
    {
        return $this->hasMany('App\Admin\courseMaterialLogs');
    }
}
