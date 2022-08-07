<?php
use App\User;
use Illuminate\Support\Facades\Input;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/chooseyourrole', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');		
		Route::get('socialrevolutionaries', 'AdminSRController@index')->name('socialrevolutionaries.index');
		Route::get('socialmembers', 'AdminSMController@index')->name('socialmembers.index');
		Route::get('socialrevolutionaries', 'AdminSRController@index')->name('socialrevolutionaries.index');
		Route::get('socialmembers', 'AdminSMController@index')->name('socialmembers.index');	    
		Route::get('socialrevolutionaries/show/{id}', 'AdminSRController@showsr')->name('socialrevolutionaries.show');
		Route::get('socialmembers/show/{id}', 'AdminSMController@showsm')->name('socialmembers.show');
		Route::get('socialmembers/{id}', 'AdminSMController@destroysm')->name('socialmembers.destroysm');
		Route::get('socialrevolutionaries/{id}', 'AdminSRController@destroysr')->name('socialrevolutionaries.destroysr');	
		// Filter
			
		// Admin Request Controller Starts
		Route::get('request', 'AdminRequestController@index')->name('request.index');
		Route::get('request/show/{id}', 'AdminRequestController@show')->name('request.show');
		Route::get('request/{id}', 'AdminRequestController@destroy')->name('request.destroysm');
		Route::get('request/index/welcome_manualfilter','AdminRequestController@fetch_concern_data')->name('admin.request.index.welcome_manualfilter');

		Route::get('addcategory', 'AdminCategoryController@index')->name('addcategory.index');
		Route::post('addcategory/{id}','AdminCategoryController@store')->name('addcategory.store');

		// admin SM Filter
		

		});

		

	
		Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
		Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
	



// SocialRevolutionaries Route
Route::group(['as'=>'socialrevolutionaries.','prefix' => 'socialrevolutionaries','namespace'=>'SocialRevolutionaries','middleware'=>['auth','socialrevolutionaries']], function () {
		Route::get('', 'SocialRevolutionaryController@index')->name('dashboard');
		Route::get('show/{id}', 'SocialRevolutionaryController@show')->name('socialrevolutionaries.show');
		Route::get('profile/{id}', 'SocialRevolutionaryController@edit')->name('socialrevolutionaries.edit');
		Route::post('dashboard/{id}', 'SocialRevolutionaryController@update')->name('socialrevolutionaries.form');
		Route::post('profileupdate/{id}', 'SocialRevolutionaryController@profileupdate')->name('socialrevolutionaries.update');
		Route::get('addrequest','SocialRevolutionaryController@addrequest')->name('socialrevolutionaries.addrequest');
		Route::post('addrequestupdate','SocialRevolutionaryController@addnewrequest')->name('socialrevolutionaries.addnewrequest');
		Route::get('myrequests', 'SocialRevolutionaryController@myrequest')->name('socialrevolutionaries.myrequests');
		// Route::get('/filter_page','SocialRevolutionaryController@welcome_fetch_data')->name('socialrevolutionaries.filter_page');
		Route::get('welcome_manualfilter1','SocialRevolutionaryController@welcome_fetch_data')->name('socialrevolutionaries.welcome_manualfilter');
		Route::get('/myrequests/welcome_manualfilter','SocialRevolutionaryController@request_fetch_data')->name('socialrevolutionaries.myrequests.request_fetch_data');
		Route::get('welcome_manualfilter','SocialRevolutionaryController@fetch_concern_data')->name('socialrevolutionaries.welcome_manualfilter');
		Route::get('/{id}','SocialRevolutionaryController@destroy')->name('socialrevolutionaries.delete');
    });

		Route::get('selectrole1/{id}', 'SocialRevolutionaries\SocialRevolutionaryController@roleid')->name('socialrevolutionaries.selectrole');
		Route::get('selectrole/{id}', 'SocialMember\SocialMemberController@roleid')->name('socialmember.selectrole');
	



	// SocialMembers Route

	Route::group(['as'=>'socialmember.','prefix' => 'socialmember','namespace'=>'SocialMember','middleware'=>['auth','socialmember']], function () {
		Route::get('/', 'SocialMemberController@index')->name('dashboard');		
		Route::get('show/{id}', 'SocialMemberController@show')->name('socialmember.show');
		Route::get('profile/{id}', 'SocialMemberController@edit')->name('socialmember.edit');
		Route::post('dashboard/{id}', 'SocialMemberController@update')->name('socialmember.form');
		Route::post('profileupdate/{id}', 'SocialMemberController@profileupdate')->name('socialmember.update');
		Route::get('addrequest','SocialMemberController@addrequest')->name('socialmember.addrequest');
		Route::post('addnewrequest','SocialMemberController@addnewrequest')->name('socialmember.addnewrequest');
		Route::get('othersrequest','SocialMemberController@othersrequest')->name('socialmember.othersrequest');
	Route::get('othersrequest/welcome_manualfilter1','SocialMemberController@welcome_fetch_data')->name('socialmember.welcome_manualfilter');
		Route::get('othersrequest/welcome_manualfilter','SocialMemberController@fetch_concern_data')->name('socialmember.welcome_manualfilter');
		Route::get('/{id}','SocialMemberController@destroy')->name('socialmember.delete');
    });

	