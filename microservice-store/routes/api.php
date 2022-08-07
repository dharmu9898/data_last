<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1/j', 'middleware' => 'client_credentials'
			], function(){
				Route::get('gettourcategory/{email}', 'Admin\AdminTPController@categories');
				Route::post('/store', 'Api\CrudController@store');
				Route::get('/show/{id}', 'Api\CrudController@index');
				Route::get('/editdata/{id}', 'Api\CrudController@editdata');
				Route::post('/updatedata', 'Api\CrudController@updatedata');
				Route::get('/deletedata/{id}', 'Api\CrudController@deletedata');
				// Route::get('/show/{id}', 'Api\CrudController@index');
			
			});