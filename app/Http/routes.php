<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Application;
use App\Job;
use App\Role;
use App\Specialty;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    $jobs = Job::all();
    return view('welcome', compact('jobs'));
});

Route::get ( '/search', function () {
    $name = Input::get ( 'name' );
    $city = Input::get ( 'city' );
    $schedule = Input::get ( 'schedule' );
    $jobs = Job::query()
        ->where('name', 'LIKE', "%{$name}%")
        ->where('city', 'LIKE', "%{$city}%")
        ->where('schedule', 'LIKE', "%{$schedule}%")
        ->get();

//    $jobs = Job::where ( 'city', 'LIKE', '%' . $city . '%' )->get ();
    if (count ( $jobs ) > 0)
        return view('welcome', compact('jobs'));
    else {
        return view('welcome', compact('jobs'));
    }

});
Route::auth();

Route::get('/home', 'HomeController@index');



Route::group(['middleware'=>'admin'], function (){
    Route::resource('admin/users', 'AdminUsersController');
    Route::get('/admin', function(){
        return view('admin.index');
    });
});

    Route::group(['middleware'=>'apps'], function (){
        Route::resource('user/jobs', 'UserJobsController');
        Route::resource('user/apps', 'ApplicationController');
        Route::get('/profile' , function () {
            $user = Auth::user();
            $roles = Role::lists('name', 'id')->all();
            $specialties = Specialty::lists('name', 'id')->all();
            return view('user/index', compact('user', 'roles', 'specialties'));

        });
    });


//Route::get('/user' , function () {
//    $jobs = Job::all();
//
//    return view('user/index', compact('jobs'));
//
//});
Route::get('/details/{id}' , function ($id) {
    $job = Job::findOrFail($id);
    $appsArray = Application::all();
//    $appUsers =[];
//    $apps =[];
    $apps = null;
    if(Auth::user())
        foreach($appsArray as $app) {
            if($app->job_id==$id && $app->user_id == Auth::user()->id){
//            array_push($appUsers, $app->user_id);
//            array_push($apps, $app);
                $apps = $app;
            }
        }


    return view('details' , compact('job', 'apps'));

});


