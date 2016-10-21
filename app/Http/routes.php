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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'LoginController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

/**--------------------------------------
 |  OPERATOR ROUTES
 ----------------------------------------*/
Route::group(['prefix' => 'operator', 'middleware' => 'is_operator'], function () {
    Route::get('home', function(){
        return view('operator.home');
    });
    Route::resource('patients', 'PatientController');
    Route::resource('reports', 'ReportResourceController');
});

/**--------------------------------------
|  PATIENT ROUTES
----------------------------------------*/
Route::get('/home', 'HomeController@index');
Route::get('/user_names', 'HomeController@getNames');
Route::get('/show_report/{report_id}', 'HomeController@showReport');
Route::post('/email_report/{report_id}', 'HomeController@emailReport');

