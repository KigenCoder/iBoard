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

//Route::get('/', 'AuthController@index');
//Route::resource('lo', "AuthController");
Route::get('/', 'AuthController@showLogin');
Route::resource("meetings", "MeetingsController");
Route::resource("meetings.docs", "DocumentsController");
Route::resource('org', 'OrganizationsController');
Route::resource('org.users', 'UsersController');
Route::resource('user_roles', 'UserRolesController');
Route::resource('meeting_roles', 'MeetingRolesController');
Route::resource('meeting_types', 'MeetingTypesController');
Route::resource('doc_types', 'DocumentTypesController');


/* Authentication routes */
//Route to show the login form
Route::get('login', array('uses' => 'AuthController@showLogin'));

//Route to process the form
Route::post('login', array('uses' => 'AuthController@doLogin'));


Route::post('logout', array('uses' => 'AuthController@logout'));



//Route::group(['middleware' => 'jwt.auth'], function(){
  //  Route::post("app_login", array('uses'=>'AuthController@app_login'));
//});


//API Routes
Route::post('app_login', array('uses' => 'AuthController@app_login'));


//App Token Refresh
Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@app_refresh');

//App API end points
Route::post('org_meetings', array('uses' => 'AppController@organizationMeetings'));

Route::post('meeting_docs', array('uses' => 'AppController@documents'));





