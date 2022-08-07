<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AddTrip;
use App\City;
use App\Country;
use App\State;
use DB;
use App\User;
use App\Rvsp;
use App\Package;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\OperatorMail;
use App\Mail\OperatorMails;
use Illuminate\Support\Arr;

class mytripsController extends Controller
{

    public function index()
    {
      
     $gallery = DB::table('packages')
    ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
    ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
      ->leftJoin('countries','packages.country', '=', 'countries.country_id')
    ->leftJoin('states','packages.state', '=', 'states.state_id')
 ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                        
 ->select('packages.TripTitle','packages.email','packages.NoOfDays','addimages.image','addimages.trips','packages.Description','packages.Iternary','packages.Destination','packages.datetime','packages.time','trip_categories.id','trip_categories.category','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
       ->where('Permission','yes')                             
                                   
                      ->orderBy('packages.id', 'desc')
                      ->get()
                      ->toArray(); 
                      
                      
                      /*  $gallery = DB::table('addimages')->get()
                           ->toArray(); */
                      
                   $galleries = DB::table('packages')
                  ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
                    ->leftJoin('countries','packages.country', '=', 'countries.country_id')
             ->leftJoin('states','packages.state', '=', 'states.state_id')
               ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                                                              
               ->select('packages.*','trip_categories.id','trip_categories.category','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                                                                                 
                     ->where('Permission','yes')                             
                                                                                     
                           ->orderBy('Subscriber','desc')
                           ->take(9)->get()
                           ->toArray();


//$galls=Package::orderBy('Subscriber','desc')->take(5)->get();
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('Subscriber');
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('TripTitle');
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('Subscriber','id');
                  $countries = DB::table('destinations')
                                             ->leftJoin('countries','destinations.country', '=', 'countries.country_id')
                                                
                                             ->select('destinations.*','countries.country_name','countries.country_id')
                                      
                                        

                                
                                   
                                             ->orderBy('destinations.id', 'desc')
                                             ->get()
                                             ->toArray();
            
                                       $states = DB::table('add_states')
                                    ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
                                    ->leftJoin('states','add_states.state', '=', 'states.state_id')
                                                      
                                    ->select('add_states.*','countries.country_name','countries.country_id','states.state_name','states.state_id')
                                                          
      
                                         
                                            
                ->orderBy('add_states.id', 'desc')
                ->get()
                ->toArray();

                                     $city = DB::table('add_cities')
                                     ->leftJoin('countries','add_cities.country', '=', 'countries.country_id')
                                     ->leftJoin('states','add_cities.state', '=', 'states.state_id')
                                     ->leftJoin('cities','add_cities.city', '=', 'cities.city_id')
                                                  
                                     ->select('add_cities.*','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                                    
                                          
                                             
                        ->orderBy('add_cities.id', 'desc')
                        ->get()
                        ->toArray();
                      
                /*    return response()->json([
                      'gallery' => $gallery,
                      'galleries' => $galleries,
                      'countries' => $countries,
                      'states' => $states,
                      'city' => $city
                     
                  ]); */
                   
                    return response()->json($gallery);


                           //   $state = State::where('states.country_id','101')->get();         

                    
                     
            
                  //   $state= State::where('country_id','101')->pluck('state_name');
                     
                     
              //   $state= State::where('states.country_id','101')->pluck('state_name','id');
               //   $city = DB::table('cities')->whereIn('cities.state_id', $state)->get();
                    
            /*     $gallery = DB::table('trip_titles')
               
                 ->leftJoin('packages','trip_titles.category', '=', 'packages.TripTitle')
                  
                 ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                 ->leftJoin('states','packages.state', '=', 'states.state_id')
                 ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                     ->select('trip_titles.*','states.state_name','countries.country_name','cities.city_name')
                     
                    
                     ->orderBy('trip_titles.id', 'desc')
                              ->paginate(10);*/
               
                          
             
            
}


}