<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['prefix' => 'admin'], function()
{

	Route::any('login', 'Admin\AdminController@login')->name('admin-login');

	Route::group(['middleware' => ['admin', 'web']], function() {

		Route::get('logout', 'Admin\AdminController@logout')->name('admin-logout');
		Route::get('', 'Admin\AdminController@index')->name('admin-home');
		
		Route::get('dashboard', 'Admin\AdminController@dashboard')->name('admin-dashboard');
		
		/* User Section */
		Route::get('users/{list_type?}', 'Admin\UsersController@list_users')->name('admin-users');
		Route::get('view-user/{id}', 'Admin\UsersController@viewUser')->name('admin-view-user');
		Route::get('add-user', 'Admin\UsersController@addUser')->name('admin-add-user');
		Route::post('save-user', 'Admin\UsersController@save_user')->name('admin-save-user');
		Route::get('edit-user/{id}', 'Admin\UsersController@edit_user')->name('admin-edit-user');
		Route::post('update-user/{id}', 'Admin\UsersController@update_user')->name('admin-update-user');
		Route::get('delete-user/{uid}', 'Admin\UsersController@deleteUser')->name('admin-delete-user');


		/* Course Section */
		Route::get('courses', 'Admin\CourseController@listCourses')->name('admin-courses');
		Route::get('view-course/{id}', 'Admin\CourseController@viewCourse')->name('admin-view-course');
		Route::get('add-course', 'Admin\CourseController@addCourse')->name('admin-add-course');
		Route::post('save-course', 'Admin\CourseController@saveCourse')->name('admin-save-course');
		Route::get('edit-course/{id}', 'Admin\CourseController@editCourse')->name('admin-edit-course');
		Route::post('update-course/{id}', 'Admin\CourseController@updateCourse')->name('admin-update-course');
		Route::get('delete-course/{uid}', 'Admin\CourseController@deleteCourse')->name('admin-delete-course');

		/* Course Materials Section */
		Route::get('course-materials', 'Admin\CourseMaterialController@listCourseMaterials')->name('admin-course-materials');
		Route::get('view-course-material/{id}', 'Admin\UsersController@viewCourseMaterials')->name('admin-view-course-material');
		Route::get('add-course-material', 'Admin\CourseMaterialController@addCourseMaterials')->name('admin-add-course-material');
		Route::post('save-course-material', 'Admin\CourseMaterialController@saveCourseMaterial')->name('admin-save-course-material');
		Route::get('edit-course-material/{id}', 'Admin\CourseMaterialController@editCourseMaterial')->name('admin-edit-course-material');
		Route::post('update-course-material/{id}', 'Admin\CourseMaterialController@updateCourseMaterial')->name('admin-update-course-material');
		Route::get('delete-course-material/{uid}', 'Admin\CourseMaterialController@deleteCourseMaterial')->name('admin-delete-course-material');
	});
});

Route::any('', 'AuthController@login')->name('user-login');
Route::group(['middleware' => ['verifyUserAuth', 'web']], function() {
	// AUTH CONTROLLER
	Route::any('home', 'UserController@profile')->name('user-profile');
	Route::get('course-materials-logs/{id}/{type}', 'UserController@getCourseMaterialLogs')->name('course-materials-logs');
	Route::any('logout', 'AuthController@logout')->name('logout');
});
