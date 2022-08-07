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


Route::get('/', 'GuestController@index');

/*Route::get('/', function () {
  return view('auth.login');
});*/




Route::get('trips/{names}', 'GuestController@showcountry')->name('showcountry');
Route::get('trips/{tour}', 'GuestController@show')->where('tour','.+')->name('show');
Route::get('trip/{state}', 'GuestController@showstate')->where('state','.+')->name('showstate');
Route::get('trips/{states}', 'GuestController@shows')->where('states','.+')->name('shows');
Route::get('tour/{city}', 'GuestController@showcity')->where('city','.+')->name('showcity');
Route::get('Image/{Image}', 'GuestController@gallery')->name('gallery');


Route::post('store', 'GuestController@store')->name('store');
Route::get('welcome/getCities/{id}','GuestController@getCities');
Route::get('welcome_city','GuestController@getRole');
Route::get('showstate/welcome_manualfiltercity','GuestController@welcome_fetch_statecity')->name('showstate.welcome_manualfiltercity');
Route::get('showcountry/welcome_manualfilter','GuestController@welcome_fetch_countries')->name('showcountry.welcome_manualfilter');
Route::get('showcountry/welcome_manualfiltercity','GuestController@welcome_fetch_cities')->name('showcountry.welcome_manualfiltercity');
Route::get('showcountry/welcome_manualfilterall','GuestController@welcome_fetch_all')->name('showcountry.welcome_manualfilterall');
Route::get('showstate/welcome_manualfilterall','GuestController@welcome_fetch_allsearch')->name('showstate.welcome_manualfilterall');
Route::get('showcity/welcome_manualfilterall','GuestController@welcome_fetch_allsearching')->name('showcity.welcome_manualfilterall');

Route::get('tours/{name}', 'CategoryController@showcategory')->name('showcategory');
Route::get('showcategory/welcome_manualfiltercity','CategoryController@welcome_fetch_statecity')->name('showcategory.welcome_manualfiltercity');
Route::get('showcategory/welcome_manualfilterall','CategoryController@welcome_fetch_allsearch')->name('showcategory.welcome_manualfilterall');



Route::get('welcome/welcome_manualfilter','GuestController@welcome_fetch_data')->name('welcome.welcome_manualfilter');

Route::get('welcome_country','GuestController@welcome_country')->name('welcome_country');


Route::get('welcome/welcome_manualdashboard','GuestController@welcome_fetch_dashboard')->name('welcome.welcome_manualdashboard');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
		Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
     

        Route::get('/home', 'HomeController@index')->name('home');
        
        Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
                Route::get('dashboard', 'DashboardController@index')->name('dashboard');
                Route::resource('operator','AdminTPController');
                Route::get('create/getStates/{id}','AdminTPController@getStates');
                Route::get('create/getCities/{id}','AdminTPController@getCities');
                Route::get('adminchangepassword/{id}','AdminTPController@changepassword')->name('changepwd');
                Route::post('adminchangepwd/{id}','AdminTPController@changePasswordUpdate')->name('pwd');
                Route::get('operator/index/welcomes_manualfilter','AdminTPController@welcome_fetch_data')->name('operator.index.welcomes_manualfilter');
                Route::get('addtripcategory', 'AdminTPController@Tripcategory')->name('addtripcategory');
                Route::post('uploadcategory', 'AdminTPController@Uploadcategory')->name('uploadcategory');
                Route::get('tourcategory/welcome_category','AdminTPController@welcome_category')->name('tourcategory.welcome_category');
               
               
                Route::get('addinternationaltour', 'AdminTPController@destination')->name('addinternationaltour');
                Route::get('addstate', 'AdminTPController@state')->name('addstate');
                Route::get('addcity', 'AdminTPController@city')->name('addcity');
                Route::get('tourcountry/welcome_country', 'AdminTPController@welcome_country')->name('tourcountry.welcome_country');
                Route::get('tourstate/welcome_state','AdminTPController@welcome_state')->name('tourstate.welcome_state');

                 Route::get('internationaltour', 'AdminTPController@international')->name('internationaltour');
                 Route::get('statestour', 'AdminTPController@states')->name('statestour');
                 Route::get('citiestour', 'AdminTPController@cities')->name('citiestour');
                 Route::get('tourcategory', 'AdminTPController@category')->name('tourcategory');
                 Route::post('uploaddestination', 'AdminTPController@Uploaddestination')->name('uploaddestination');
               
                Route::post('uploadstate', 'AdminTPController@Uploadstate')->name('uploadstate');
                Route::post('uploadcity', 'AdminTPController@Uploadcity')->name('uploadcity');
    

                Route::get('editcategory/{id}', 'AdminTPController@editcategory')->name('editcategory');
                Route::post('updatecategory/{id}', 'AdminTPController@updatecategory')->name('updatecategory');
                Route::get('destroycategory/{id}', 'AdminTPController@destroycategory')->name('destroycategory');
                Route::get('showtourcategory/{id}', 'AdminTPController@showcategory')->name('showtourcategory');
           
           
                  Route::get('editinternational/{id}', 'AdminTPController@editinternational')->name('editinternational');
                  Route::post('updatinternational/{id}', 'AdminTPController@updateinternational')->name('updatinternational');
                  Route::get('destroyinternational/{id}', 'AdminTPController@destroyinternational')->name('destroyinternational');
                  Route::get('showinternationaltour/{id}', 'AdminTPController@showinternational')->name('showinternational');


                    Route::get('editstate/{id}', 'AdminTPController@editstate')->name('editstate');
                    Route::post('updatestate/{id}', 'AdminTPController@updatestate')->name('updatestate');
                    Route::get('destroystate/{id}', 'AdminTPController@destroystate')->name('destroystate');
                    Route::get('showstatetour/{id}', 'AdminTPController@showstate')->name('showstatetour');

                      Route::get('editcity/{id}', 'AdminTPController@editcity')->name('editcity');
                      Route::post('updatecity/{id}', 'AdminTPController@updatecity')->name('updatecity');
                      Route::get('destroycity/{id}', 'AdminTPController@destroycity')->name('destroycity');
                      Route::get('showcitytour/{id}', 'AdminTPController@showcity')->name('showcitytour');
           
                        Route::get('tripdetail', 'AdminTPController@tripdetail')->name('tripdetail');
                        Route::get('tripdetail/welcome_manualfilter','AdminTPController@welcome_fetchs_data')->name('tripdetail.welcome_manualfilter');
                        Route::get('list', 'AdminTPController@list')->name('list');
                        Route::get('updates', 'AdminTPController@updates')->name('updates');
                      
                        
                        Route::get('lists/{TripTitle}', 'AdminTPController@lists')->name('lists');
                        Route::get('updatervsp', 'DashboardController@updatervsp')->name('updatervsp');
                        Route::get('showtrip/{id}', 'AdminTPController@showgallery')->name('showtrip');
                        Route::get('edittrip/{id}', 'AdminTPController@editgallery')->name('edittrip');
                        Route::post('updategallery/{id}', 'AdminTPController@updategallery')->name('updategallery');
                        Route::get('destroygallery/{id}', 'AdminTPController@destroygallery')->name('destroygallery');
        });
        Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('upload/{id}', 'DashboardController@upload')->name('upload');
        Route::get('operatormail/{id}','DashboardController@MailtoOperator')->name('operatormail');
        Route::get('operatorSendMail/send', 'DashboardController@send');
        Route::get('show/{TripTitle}', 'DashboardController@show')->name('show'); 
    });


    
      Route::group(['as'=>'touroperator.','prefix' => 'touroperator','namespace'=>'TourOperator','middleware'=>['auth','touroperator']], function () {
      Route::get('dashboard', 'DashboardController@index')->name('dashboard');
      Route::get('create/getStates/{id}','TripOperatorController@getStates');
      Route::get('create/getCities/{id}','TripOperatorController@getCities');
    
      Route::get('show/{id}', 'TripOperatorController@show')->name('show');
      Route::get('create', 'TripOperatorController@create')->name('create');
      Route::get('rvsplist', 'DashboardController@rvsplist')->name('rvsplist');
      Route::get('confirm/{id}', 'DashboardController@confirm')->name('confirm');
      Route::get('list/{TripTitle}', 'DashboardController@list')->name('list');
      Route::get('updates', 'DashboardController@updates')->name('updates');

      Route::get('state', 'TripOperatorController@state')->name('state');
      Route::get('city', 'TripOperatorController@city')->name('city');
  

      Route::post('additernary', 'TripOperatorController@additernary')->name('additernary');




      Route::post('store', 'TripOperatorController@store')->name('store');
      Route::get('index/welcome_manualfilter','TripOperatorController@welcome_fetch_data')->name('index.welcome_manualfilter');

          
      Route::get('edit/{id}', 'TripOperatorController@edit')->name('edit');
      Route::post('update/{id}', 'TripOperatorController@update')->name('update');
      Route::get('destroy/{id}', 'TripOperatorController@destroy')->name('destroy');

     
   
      
      Route::get('addtrip', 'TripOperatorController@addgallery')->name('addtrip');
      Route::get('index', 'TripOperatorController@list')->name('index');
      Route::get('showtrip/{id}', 'TripOperatorController@showgallery')->name('showtrip');
      Route::post('save', 'TripOperatorController@save')->name('save');

          
      Route::get('edittrip/{id}', 'TripOperatorController@editgallery')->name('edittrip');
      Route::post('updategallery/{id}', 'TripOperatorController@updategallery')->name('updategallery');
      Route::get('destroygallery/{id}', 'TripOperatorController@destroygallery')->name('destroygallery');

      Route::get('profile', 'TripOperatorController@profile')->name('profile');
      Route::get('showprofile/{id}', 'TripOperatorController@showprofile')->name('showprofile');
      Route::get('editprofile/{id}', 'TripOperatorController@editprofile')->name('editprofile');
      Route::post('updateprofile/{id}', 'TripOperatorController@updateprofile')->name('updateprofile');
      Route::get('iternary', 'TripOperatorController@iternary')->name('iternary');
     Route::get('addimage', 'TripOperatorController@addimage')->name('addimage');
     Route::get('addimageview', 'TripOperatorController@addimageview')->name('addimageview');
     Route::get('edittripimage/{id}', 'TripOperatorController@edittripimage')->name('edittripimage');
     Route::post('updatetripimage/{id}', 'TripOperatorController@updatetripimage')->name('updatetripimage');
     Route::get('destroytripimage/{id}', 'TripOperatorController@destroytripimage')->name('destroytripimage');
     Route::get('showtripsimage/{id}', 'TripOperatorController@showtripsimage')->name('showtripsimage');
    Route::post('addsimage', 'TripOperatorController@addsimage')->name('addsimage');
  });