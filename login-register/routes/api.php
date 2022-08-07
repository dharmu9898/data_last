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

Route::post("/store","Api\MicroserviceController@store")->name("store");
Route::post("/update","Api\MicroserviceController@update")->name("update");


// Route::post('/edit/{id}', 'HomeController@edit')->name('edit');

// Route::get("/home","Api\MicroserviceController@show")->name("show");
// Route::get('/home', 'Api\MicroserviceController@showdata')->name('home');



Route::group([
    'prefix' => 'v1/lg-rgs'
], function () {
	// Route::post('/login', 'PassportAPI\UserController@login');
	//Route::post('/register', 'PassportAPI\UserController@register');
    
	// Api group that can be accessed by using auth:api and client_credentials
	Route::group(['middleware' => 'auth:api', 'middleware' => 'client_credentials'], function(){

		

	});
});

        