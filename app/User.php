<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Function To check where the user exist or not based on conditions
    *
    * @return void
    */
    public static function is_exist($conditions)
    {
        return Self::where($conditions)->first();
    }

    /**
    * Function To get user registrations according to month
    *
    * @return void
    */
    public static function userRegistrationBarGraph()
    {
        return User::select(DB::raw('COUNT(*) total'), DB::raw('MONTH(created_at) month'))->where(array(
            'user_type' => USER_ROLE_USER
        ))->groupBy('month')->get()->keyBy('month');
    }

    /**
    * Function To get users for admin
    *
    * @return void
    */
    // List the users for admin
    public static function listUsersForAdmin($filters = false)
    {
        $where_arr = array(
            'user_type' => USER_ROLE_USER
        );
        
        return Self::where($where_arr)->get();
    }

    public static function getUserDetails($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    public function course()
    {
        return $this->belongsTo('App\Admin\Course', 'course_id');
    }
}
