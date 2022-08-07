<?php


Route::get('/', 'GuestController@index');
Route::get('/tripss', 'GuestController@index2');
Route::get('trips/{state}', 'CategoryController@showmycategory')->where('state','.+')->name('showstate');

Route::get('allevents/{city}', 'CategoryController@showmyevents')->where('city','.+')->name('eventsloc');

Route::get('/trips', 'CategoryController@index')->name('trips');
Route::get('/user_active', 'CategoryController@active')->name('user_active');
Route::get('/user_anactive', 'CategoryController@anactive')->name('user_anactive');



Route::get('/{name}', 'GuestController@touropreter')->name('opreterdetail');




Route::get('category/welcome_manualcategorys','CategoryController@welcome_fetch_category')->name('category.welcome_manualcategorys');

Route::post('store', 'GuestController@store')->name('store');
Route::post('/stores', 'GuestController@stores')->name('stores');


Route::get('showcategory/welcome_manualfilterall','CategoryController@welcome_fetch_allsearch')->name('showcategory.welcome_manualfilterall');
Route::get('showcountry/welcome_manualfilterall','GuestController@welcome_fetch_all')->name('showcountry.welcome_manualfilterall');
Route::get('showstate/welcome_manualfilterall','GuestController@welcome_fetch_allsearch')->name('showstate.welcome_manualfilterall');
Route::get('showcity/welcome_manualfilterall','GuestController@welcome_fetch_allsearching')->name('showcity.welcome_manualfilterall');
Route::get('showstate/welcome_manualfiltercity','GuestController@welcome_fetch_statecity')->name('showstate.welcome_manualfiltercity');
Route::get('showcountry/welcome_manualfiltercity','GuestController@welcome_fetch_cities')->name('showcountry.welcome_manualfiltercity');
Route::get('showcategory/welcome_manualfiltercity','CategoryController@welcome_fetch_statecity')->name('showcategory.welcome_manualfiltercity');
Route::get('showcountry/welcome_manualfilter','GuestController@welcome_fetch_countries')->name('showcountry.welcome_manualfilter');

