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


// Auth
Route::get('/auth/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::post('/auth/handleLogin', 'Auth\LoginController@handleLogin');
Route::get('/auth/register', 'Auth\RegisterController@register');
Route::post('/auth/handleRegister', 'Auth\RegisterController@handleRegister');
Route::get('/auth/logout', 'Auth\LoginController@logout');


// LinkedIn
Route::get('linkedin', function () {
    return view('linkedinAuth');
});

Route::get('/auth/linkedin', 'Auth\LoginController@redirectToLinkedin');
Route::get('/auth/linkedin/callback', 'Auth\LoginController@loginLinkedin');

Route::get('/notifications/add', 'Notifications\NotificationsController@addNew');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [ 'as' => 'home', 'uses' => 'Home\HomeController@index' ]);
    Route::get('/home/news', [ 'as' => 'news', 'uses' => 'Home\HomeController@news' ]);

    // Users
    Route::get('/users/index', [ 'as' => 'user_profile', 'uses' =>'Users\UsersController@index']);

    Route::get('/users/edit', ['uses' =>'Users\UsersController@edit']);
    Route::post('/users/editHandle', ['uses' =>'Users\UsersController@editHandle']);

    Route::get('/users/password', ['uses' =>'Users\UsersController@password']);
    Route::post('/users/passwordHandle', ['uses' =>'Users\UsersController@passwordHandle']);

    // Company
    Route::get('/company/index/{id}', ['uses' =>'Company\CompanyController@index']);

    // Jobs
    Route::get('/jobs/job/{id}', ['uses' =>'Jobs\JobsController@job']);

    // Notifications
    Route::get('/notifications/get', ['uses' =>'Notifications\NotificationsController@get']);
});