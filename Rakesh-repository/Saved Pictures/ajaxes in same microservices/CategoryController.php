<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddTrip;
use App\Http\Controllers\GuestController;
use App\City;
use App\Country;
use App\State;
use App\Event;
use DB;
use App\Eventcountry;
use App\Category;
use App\Eventstate;
use App\Eventcity;
use App\User;
use App\Rvsp;
use App\Package;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;



class CategoryController extends Controller
{
    public function index(Request $request)
    {
      log::info('inside fetchinghf dashboard');
      if($request->ajax()){
        $manual_filter = $request->get('manual_filter_table');
        log::info($manual_filter);
          $manual_filter_tablesm = $request->get('manual_filter_tablesm');
          log::info($manual_filter_tablesm);
         
        $mfiltersm = str_replace("","%",$manual_filter_tablesm);
        if($manual_filter != null){
          $tour_country_id= Package::where('country',$manual_filter)->pluck('country');
          $tour_state_id= Package::where('state',$manual_filter)->pluck('state');
          $tour_city_id= Package::where('city',$manual_filter)->pluck('city');
          $tour_category_id= Package::where('Category',$manual_filter)->pluck('Category');
                     
            if(!$tour_country_id->isEmpty() )
            {
            $gallery = DB::table('packages')
                 
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
         
                  ->where(function ($query) use ($manual_filter) {
            
                      $query->Where('packages.country', $manual_filter)
                      ->orWhere('packages.state', $manual_filter)
               ->orWhere('packages.city', $manual_filter)
               ->orWhere('packages.Category', $manual_filter); 
                  })
                  ->groupBy('packages.TripTitle')
                  ->where('Permission','Approve')                             
                  ->where('publish',1)
              ->orderBy('packages.id', 'DESC')
              ->paginate(4);
              return view('alltrip', compact('gallery'))->render();
                }

                if(!$tour_state_id->isEmpty() )
                {
                $gallery = DB::table('packages')
                     
              ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
              ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                    
                      ->where(function ($query) use ($manual_filter) {
                
                          $query->Where('packages.country', $manual_filter)
                          ->orWhere('packages.state', $manual_filter)
                   ->orWhere('packages.city', $manual_filter)
                   ->orWhere('packages.Category', $manual_filter); 
                      })
                      ->groupBy('packages.TripTitle')
                      ->where('Permission','Approve')                             
                      ->where('publish',1)
                  ->orderBy('packages.id', 'DESC')
                  ->get();
                  return view('alltrip', compact('gallery'))->render();
                    }
                    if(!$tour_city_id->isEmpty() )
                    {
                    $gallery = DB::table('packages')
                         
                  ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
                  ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                        
                          ->where(function ($query) use ($manual_filter) {
                    
                              $query->Where('packages.country', $manual_filter)
                              ->orWhere('packages.state', $manual_filter)
                       ->orWhere('packages.city', $manual_filter)
                       ->orWhere('packages.Category', $manual_filter); 
                          })
                          ->groupBy('packages.TripTitle')
                          ->where('Permission','Approve')                             
                          ->where('publish',1)
                      ->orderBy('packages.id', 'DESC')
                      ->paginate(4);
                      return view('alltrip', compact('gallery'))->render();
                        }

                        if(!$tour_category_id->isEmpty() )
                        {
                        $gallery = DB::table('packages')
                             
                      ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
                      ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                            
                              ->where(function ($query) use ($manual_filter) {
                        
                                  $query->Where('packages.country', $manual_filter)
                                  ->orWhere('packages.state', $manual_filter)
                           ->orWhere('packages.city', $manual_filter)
                           ->orWhere('packages.Category', $manual_filter); 
                              })
                              ->groupBy('packages.TripTitle')
                              ->where('Permission','Approve')                             
                              ->where('publish',1)
                          ->orderBy('packages.id', 'DESC')
                          ->paginate(4);
                          return view('alltrip', compact('gallery'))->render();
                            }

              } else{
                      $tour_country= Package::where('slug',$mfiltersm)->pluck('slug');
                      $tour_state= Package::where('slug1',$mfiltersm)->pluck('slug1');
                      $tour_city= Package::where('slug2',$mfiltersm)->pluck('slug2');
                      $tour_category= Package::where('Category',$mfiltersm)->pluck('Category');
                     
                      log::info($tour_country);
                     
                      if(!$tour_country->isEmpty() )
                      {
                log::info('inside else part');
          $mygallery = DB::table('packages')
                 
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->where(function ($query) use ($mfiltersm) {
            
               $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug1', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug2', 'like', '%'.$mfiltersm.'%') 
        
          ->orWhere('iternaries.explanation', 'like', '%'.$mfiltersm.'%');  
              })
              ->groupBy('packages.TripTitle')
              ->where('Permission','Approve')                             
              ->where('publish',1)
              ->orderBy('packages.id', 'DESC')
              ->paginate(4);
                  
          return view('home_country', compact('mygallery'))->render();
                  }
                 
                  if(!$tour_state->isEmpty() )
                      {
                log::info('inside else part');
          $gallery = DB::table('packages')
                 
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->where(function ($query) use ($mfiltersm) {
            
               $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug1', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug2', 'like', '%'.$mfiltersm.'%') 
        
          ->orWhere('iternaries.explanation', 'like', '%'.$mfiltersm.'%');  
              })
              ->groupBy('packages.TripTitle') 
              ->where('Permission','Approve')                             
              ->where('publish',1) 
              ->orderBy('packages.id', 'DESC')  
              ->paginate(4); 
             
          return view('home_state', compact('gallery'))->render();
                  }
                
                  if(!$tour_city->isEmpty() )
                      {
                        $mfiltersm = str_replace("","%",$manual_filter_tablesm);
                log::info('inside else part');
          $gallery = DB::table('packages')
                 
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->where(function ($query) use ($mfiltersm) { 
            
               $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug1', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug2', 'like', '%'.$mfiltersm.'%') 
        
          ->orWhere('iternaries.explanation', 'like', '%'.$mfiltersm.'%');  
              })
              ->groupBy('packages.TripTitle')
              ->where('Permission','Approve')                             
              ->where('publish',1)
              ->orderBy('packages.id', 'DESC')
              ->paginate(4);
                  
          return view('home_city', compact('gallery'))->render();
                  }
              
                  if(!$tour_category->isEmpty() )
                  {
                   
            log::info('inside else part');
      $gallery = DB::table('packages')
             
      ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
      ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
     ->where(function ($query) use ($mfiltersm) {
        
           $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
              ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
              ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
      ->orWhere('packages.slug', 'like', '%'.$mfiltersm.'%')
      ->orWhere('packages.slug1', 'like', '%'.$mfiltersm.'%')
      ->orWhere('packages.slug2', 'like', '%'.$mfiltersm.'%') 
    
      ->orWhere('iternaries.explanation', 'like', '%'.$mfiltersm.'%');  
          })
          ->groupBy('packages.TripTitle')
          ->where('Permission','Approve')                             
          ->where('publish',1)
          ->orderBy('packages.id', 'DESC')
          ->paginate(4);
              
      return view('home_category', compact('gallery'))->render();
              }
                }
      }     
      
      else{

       $gallery = DB::table('packages')
       ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
       ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
       ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')                           
     ->select('packages.*','trip_categories.id','trip_categories.category','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
     ->groupBy('packages.TripTitle')                            
     ->where('Permission','Approve')                             
      ->where('publish','1')                             
                                   
                   ->orderBy('packages.id', 'desc')
                   ->paginate(10);
                  log::info($gallery);
                           $countries = DB::table('trip_countries')
                          ->leftJoin('countries','trip_countries.country', '=', 'countries.country_id')
                                
                         ->select('trip_countries.*','countries.country_name','countries.country_id')
                             ->orderBy('trip_countries.id', 'desc')
                                    ->paginate(10);
                                $states = DB::table('trip_states')
                                ->leftJoin('countries','trip_states.country', '=', 'countries.country_id')
                                ->leftJoin('states','trip_states.state', '=', 'states.state_id')
                                                         
                                ->select('trip_states.*','countries.country_name','countries.country_id','states.state_name','states.state_id')
                                 
                   ->orderBy('trip_states.id','desc')
                                    ->paginate(10);
                         $city = DB::table('trip_cities')
                         ->leftJoin('countries','trip_cities.country', '=', 'countries.country_id')
                         ->leftJoin('states','trip_cities.state', '=', 'states.state_id')
                         ->leftJoin('cities','trip_cities.city', '=', 'cities.city_id')
                                
                         ->select('trip_cities.*','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                        
                           ->orderBy('trip_cities.id','desc')
                                         ->paginate(10);
                                         $galleries = DB::table('packages')
                                         ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
                                         ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
                                          ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                                                                                  
                                   ->select('packages.*','trip_categories.id','trip_categories.category','addimages.image_name')                                                      
                                   ->groupBy('packages.TripTitle')       
                                   ->where('Permission','Approve')                             
                                   ->where('publish','1')                                                                                              
                                         ->orderBy('Subscriber','desc') 
                                           
                                         ->paginate(10);       
                       return view('trips',compact('gallery','countries','states','city','galleries'))->render();
                          
                      }
  }

    public function showmycategory(Request $request,$state)
    {
      log::info($state);
      $category = str_replace('-',' ',$state); 
    
      $tripcountry= Package::where('slug',$category)->pluck('slug');
      $triptitle = str_replace('-',' ',$state); 
      $tripmy=explode("/", $category);
      $triplast=Arr::last( $tripmy);
      $tripstate= Package::where('slug1',$triplast)->pluck('slug1');
      $titlecity = str_replace('-',' ',$state); 
      $mycity=explode("/", $category);
      log::info($mycity);
      $lastcity=Arr::last( $mycity);

      $titlecat = str_replace('-',' ',$state); 
        $mycat=explode("/", $titlecat);
        $lastcat=Arr::last( $mycat);
        log::info('lastcat here');
        log::info($lastcat);
        $tripcat= Package::where('TripTitle',$lastcat)->pluck('TripTitle');
        $cat_title = str_replace('-',' ',$state);
        $my_cat=explode("/", $cat_title);
        $last_cat=Arr::last( $my_cat);
        $trip_cat= Package::where('TripTitle',$last_cat)->pluck('TripTitle');
        $trip_tit= Package::where('TripTitle',$last_cat)->first();
        
        $middile= Arr::first($my_cat);
        
        log::info($middile);
       $conts= ucfirst($middile);
        $trip_cities= Package::where('slug',$middile)->pluck('slug');
        $trip_citiss= Package::where('slug',$middile)->first();
        $trip_countriess= Country::where('country_name',$conts)->pluck('country_name');
        log::info($trip_cities);
        
 log::info($last_cat);
    if(!$trip_cat->isEmpty() )
      {
        log::info('inside show');
        $title = str_replace('-',' ',$state);
        $my=explode("/", $title);
        $last=Arr::last( $my);
        
        $publish = DB::table('packages')->where('packages.TripTitle', $last)->first();
$pubs=$publish->publish;
        log::info($pubs);
if($pubs==1)
{
   $gallery = DB::table('packages')
   ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
    
   ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
   ->select('packages.*','addimages.image_name','addimages.video')
      ->where('packages.TripTitle', $last)
      ->first();

      $video = DB::table('addimages')
     
         ->where('trips', $last)
         ->take(8)->get();
   
      $image = DB::table('addimages')
      
     
         ->where('addimages.trips', $last)->skip(1)->take(10)
         ->get();
         $dayss=$gallery->NoOfDays;


            for($i=1; $i <= $dayss; $i++)
          {
            $day=   'day' .$i;
            $days[]=$day;
           
          
          }
          $iternary = DB::table('iternaries')
          ->whereIn('iternaries.Days', $days)
          ->where('iternaries.trips', $last)
          ->select('iternaries.*')
          ->orderBy('iternaries.id', 'asc')
          ->paginate(10);
          log::info('my iternary25');
          log::info($iternary);

          $alluser=   Rvsp::where('TripHeading',$last)->distinct('emailid')->count('emailid');
          log::info('all user ka de');
          log::info($video);
        return view('show', compact('gallery','iternary','pubs','image','alluser','video'));
     
      }

      else{
        $gallery = DB::table('packages')
   ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
    
   ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
   ->select('packages.*','addimages.image_name','addimages.video')
      ->where('packages.TripTitle', $last)
      ->first();
      $video = DB::table('addimages')
     
      ->where('trips', $last)
      ->take(8)->get();
      $image = DB::table('addimages')
      
     
      ->where('addimages.trips', $last)->skip(1)->take(10)
      ->get();
      $iternary = DB::table('iternaries')
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 1')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);
       $iternary1 = DB::table('iternaries')
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 2')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(3);
      $iternary1 = DB::table('iternaries')
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 2')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(3);
      $alluser=   Rvsp::where('TripHeading',$last)->distinct('emailid')->count('emailid');
      log::info('all user ka de');
      log::info($alluser);
      $video=$gallery->video;
    return view('show', compact('gallery','iternary','iternary1','pubs','image','alluser','video')); 


      }

      
    }

    
      $tripcity= Package::where('slug2',$lastcity)->pluck('slug2');
      $tripcategory= Package::where('Category',$category)->pluck('slug2');
    
      log::info('inside tripcat');
     
      if(!$tripcat->isEmpty())
      {
        log::info('inside showstates');
        $title = str_replace('-',' ',$state); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
        $publish = DB::table('packages')->where('packages.TripTitle', $last)->first();
        $pubs=$publish->publish;
        log::info($pubs);
        if($pubs==1)
{
   $gallery = DB::table('packages')
   ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
   ->leftJoin('trip_cities','packages.slug2', '=', 'trip_cities.slug2')  
   ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->select('packages.*','addimages.image_name')
      ->where('packages.TripTitle', $last)
      ->first();
      $iternary = DB::table('iternaries')
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 1')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);
     
     
      $iternary1 = DB::table('iternaries')
  
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 2')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);

     return view('showstates', compact('gallery','iternary','iternary1','pubs')); 
}

else{

  $gallery = DB::table('packages')
   ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
   ->leftJoin('trip_cities','packages.slug2', '=', 'trip_cities.slug2')  
   ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->select('packages.*','addimages.image_name')
      ->where('packages.TripTitle', $last)
      ->first();
      $iternary = DB::table('iternaries')
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 1')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);
     
     
      $iternary1 = DB::table('iternaries')
  
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 2')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);

     return view('showstates', compact('gallery','iternary','iternary1','pubs')); 
}
      }

      if(!$tripstate->isEmpty())
      {
        log::info('inside showstate');
        $title = str_replace('-',' ',$state); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
        $states= State::where('state_name',$last)->pluck('state_id');                  
        $cities = DB::table('cities')->whereIn('cities.city_state_id',$states)->get();
        $gallery = DB::table('packages')
        ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips') 
       ->leftJoin('trip_states','packages.slug1', '=', 'trip_states.slug')   
        ->select('packages.*','trip_states.Explain','addimages.image_name')
        ->groupBy('packages.TripTitle')
      ->where('packages.slug1', $last)
   ->where(function ($query) {
    $query->where('Permission', '=', 'Approve')
                                            
    ->where('publish','1');
           })   
      ->orderBy('packages.id', 'desc')
      ->paginate(3);
      $galleries = DB::table('packages')
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips') 
      ->leftJoin('trip_states','packages.slug1', '=', 'trip_states.slug')   
      ->select('packages.NoOfDays','trip_states.Image','addimages.image_name')
      ->groupBy('packages.TripTitle')
    ->where('packages.slug1', $last)
     ->where(function ($query) {
      $query->where('Permission', '=', 'Approve')
                                            
      ->where('publish','1');
           })  
    ->orderBy('packages.id', 'desc')
    ->paginate(3);
return view('showstate', compact('gallery','galleries','cities')); 
      }
      if(!$tripcity->isEmpty())
      {
        log::info('inside showcity');
        $title = str_replace('-',' ',$state); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
      $gallery = DB::table('packages')
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
              ->leftJoin('trip_cities','packages.slug2', '=', 'trip_cities.slug2')   
             ->select('packages.*','trip_cities.Describes','addimages.image_name')
             ->groupBy('packages.TripTitle')
      ->where('packages.slug2', $last)
       ->where(function ($query) {
        $query->where('Permission', '=', 'Approve')
                                            
        ->where('publish','1');      
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(3);
      $galleries = DB::table('packages')
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
      ->leftJoin('trip_cities','packages.slug2', '=', 'trip_cities.slug2')   
      ->select('packages.NoOfDays','trip_cities.Image','addimages.image_name')
      ->groupBy('packages.TripTitle')
    ->where('packages.slug2', $last)
     ->where(function ($query) {
      $query->where('Permission', '=', 'Approve')
                                            
      ->where('publish','1');
           }) 
    ->orderBy('packages.id', 'desc')
    ->paginate(3);
return view('showcity', compact('gallery','galleries')); 
      }
      if(!$tripcountry->isEmpty())
      {
log::info('inside tripcountry');
       
        log::info('inside showcountry');
        $country = str_replace('-',' ',$state); 
        $countries= Country::where('country_name',$country)->pluck('country_id'); 
        $states = DB::table('states')->whereIn('states.state_country_id',$countries)->get();
        $gallery = DB::table('packages')
        ->leftJoin('trip_countries','packages.slug', '=', 'trip_countries.slug')
        ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')   
        ->select('packages.*','trip_countries.desc','addimages.image_name','trip_countries.Image')
        ->groupBy('packages.TripTitle')
        ->where('packages.slug', $country)
     // ->where('Permission', '=', 'yes')
       ->where(function ($query) {
               $query->where('Permission', '=', 'Approve')
                                            
      ->where('publish','1');
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(3);
      $galleries = DB::table('packages')
      ->leftJoin('trip_countries','packages.slug', '=', 'trip_countries.slug')
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')   
      ->select('packages.NoOfDays','trip_countries.Image')
      ->groupBy('packages.TripTitle')
    ->where('packages.slug', $country)
      ->where(function ($query) {
        $query->where('Permission', '=', 'Approve')
                                            
        ->where('publish','1');     
           })  
    ->orderBy('packages.id', 'desc') 
    ->paginate(3); 
    log::info($gallery);
      $countries = Country::all()->pluck('country_name','id');
 return view('showcountry', compact('gallery','countries','galleries','states')); 
      
      }

      if(!$tripcategory->isEmpty())
      {
        log::info('inside category');
      log::info($category);
      $city= Package::where('Category',$category)->pluck('slug2'); 
      log::info($city); 
        $cit= City::whereIn('city_name',$city)->pluck('city_id');
        $cities= DB::table('cities')->whereIn('cities.city_id',$cit)->get();               
        $gallery = DB::table('packages')
              ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
              ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
              ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')  
      ->select('packages.*','trip_categories.Description','trip_categories.category','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
      ->groupBy('packages.TripTitle')
      ->where('packages.Category', $category)
      ->where(function ($query) {
        $query->where('Permission', '=', 'Approve')
                                            
        ->where('publish','1');
                   
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(3);
      $galliries = DB::table('packages')
      ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
      ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')  
     ->select('packages.NoOfDays','trip_categories.Description','trip_categories.category','trip_categories.Image','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
    
    ->where('packages.Category', $category)
    ->where(function ($query) {
      $query->where('Permission', '=', 'Approve')
                                            
      ->where('publish','1');
                     
           })  
    ->orderBy('packages.id', 'desc')
    ->paginate(3);
    log::info($gallery); 

  return view('showcategory', compact('gallery','galliries','cities')); 
      
      }

      if(!$trip_cities->isEmpty() )
        {
          $trip_citys=$trip_citiss->slug;
          if (empty($trip_tit) && $trip_citys==$middile)
          {
            log::info('inside !$trip_tit ');
            return view('showrelatedtrip'); 
    
          }

        }

        if(!$trip_countriess->isEmpty() )
        {
          
          
            log::info('inside !$trip_tit ');
            return view('showrelatedtrip'); 
    
         

        }
    }
    public function showcategory($name)
    {
          $category = str_replace('-',' ',$name); 
        $city= Package::where('Category',$category)->pluck('slug2');
        $cit= City::whereIn('city_name',$city)->pluck('city_id');
        $cities= DB::table('cities')->whereIn('cities.city_id',$cit)->get();               
        $gallery = DB::table('packages')
              ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
              ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
              ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')  
      ->select('packages.*','trip_categories.Description','trip_categories.category','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
      ->groupBy('packages.TripTitle')
      ->where('packages.Category', $category)
      ->where(function ($query) {
        $query->where('Permission', '=', 'Approve')
                                            
        ->where('publish','1');
                   
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(10);
      $galliries = DB::table('packages')
      ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
      ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
      ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')  
     ->select('packages.NoOfDays','trip_categories.Description','trip_categories.category','trip_categories.Image','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
    
    ->where('packages.Category', $category)
    ->where(function ($query) {
      $query->where('Permission', '=', 'Approve')
                                            
      ->where('publish','1');
                     
           })  
    ->orderBy('packages.id', 'desc')
    ->paginate(10);
    


  return view('showcategory', compact('gallery','galliries','cities')); 
    }
    public function welcome_fetch_category(Request $request){
      log::info('inside categary dashboard');
      if($request->ajax()){
          $manual_filter = $request->get('manual_category_table');
          $manual_category = $request->get('category');
          log::info($manual_category);
            $manual_category_tablesm = $request->get('manual_category_tablesm');
            log::info($manual_category_tablesm);
          $mfiltersm = str_replace("","%",$manual_category_tablesm);
          $search = DB::table('packages')->where('packages.Category',$manual_category)->first();
          $search_category=$search->Category;
          if($manual_filter != null && $search_category == $manual_category){
            log::info($search_category);
          $gallery = DB::table('packages')
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
          ->groupBy('packages.TripTitle')
          ->select('packages.*','addimages.image_name','iternaries.Days','iternaries.location','iternaries.explanation')
    
          ->where('Permission','Approve')                             
                          ->where('publish',1)
                          ->Where('packages.Category',$search_category)    
                           
                  ->where(function ($query) use ($manual_filter) {
                  
                      $query->Where('packages.country', $manual_filter)
                     
                      ->orWhere('packages.state', $manual_filter)
                     
               ->orWhere('packages.city', $manual_filter);
             
               
                  })
              ->orderBy('packages.id', 'DESC')
              ->paginate(9);
            log::info($gallery);

              } else{
                log::info('inside else part');
          $gallery = DB::table('packages')
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
          ->where('Permission','Approve')                             
                          ->where('publish',1)
      ->where(function ($query) use ($mfiltersm) {
               $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
                  ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug1', 'like', '%'.$mfiltersm.'%')
          ->orWhere('packages.slug2', 'like', '%'.$mfiltersm.'%') 
          ->orWhere('iternaries.explanation', 'like', '%'.$mfiltersm.'%');  
              })
              ->orderBy('packages.id', 'DESC')
              ->paginate(9);
                    }
          return view('category', compact('gallery'))->render();
      }
  }

    public function welcome_fetch_allsearching(Request $request){
      log::info('inside allsearching');
        if($request->ajax()){
          $manual_filter = $request->get('manual_filter_tablesm');
          $mfilter = str_replace("","%",$manual_filter);
           
            log::info($mfilter);
            
          $gallery = DB::table('packages')
                 
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
          ->groupBy('packages.TripTitle') 
          ->where(function ($query) use ($mfilter) {
                   
              $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
              ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
              ->orWhere('packages.slug', 'like', '%'.$mfilter.'%')
              ->orWhere('packages.slug1', 'like', '%'.$mfilter.'%')
              ->orWhere('packages.slug2', 'like', '%'.$mfilter.'%')
              ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
             ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
         ->orWhere('addimages.image_name', 'like', '%'.$mfilter.'%') 
      ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
              })
          ->orderBy('packages.id', 'DESC')
          ->paginate(30);
                }
          return view('showcountry', compact('gallery'))->render();
          
  }
  
   
      
    public function welcome_fetch_data(Request $request){
      
           

        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_table');
              $manual_filter_tablesm = $request->get('manual_filter_tablesm');
            $mfiltersm = str_replace("","%",$manual_filter_tablesm);
            if($manual_filter != null){
            $gallery = DB::table('packages')
                   
                    ->join('countries','packages.country', '=', 'countries.country_id')
                    ->join('states','packages.state', '=', 'states.state_id')
                    ->join('cities','packages.city', '=', 'cities.city_id')
                    ->where(function ($query) use ($manual_filter) {
              
                        $query->orWhere('packages.city', $manual_filter);  
                    })
                
                ->orderBy('packages.id', 'DESC')
                ->paginate(10);
                } else{
            $gallery = DB::table('packages')
                   
       ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('states','packages.state', '=', 'states.state_id')
       ->leftJoin('cities','packages.city', '=', 'cities.city_id')
        ->where(function ($query) use ($mfiltersm) {
              
                 $query->where('packages.TripTitle', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('packages.datetime', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('packages.Category', 'like', '%'.$mfiltersm.'%')
            ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
            ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
            ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%');   
                })
                ->orderBy('packages.id', 'DESC')
                ->paginate(30);
                      }
            return view('category', compact('gallery'))->render();


          
        
        }
    }
         
    public function welcome_fetch_allsearch(Request $request){
        log::info('inside allsearch');
          if($request->ajax()){
              $manual_filter = $request->get('manual_filter_tablesm');
              $mfilter = str_replace("","%",$manual_filter);
                $cat_id = $request->get('CatId');
                log::info($mfilter);
                log::info($cat_id);
              $gallery = DB::table('packages')
                           
                ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
                ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                ->groupBy('packages.TripTitle')
               ->where('packages.Category', $cat_id)
                    ->where(function ($query) use ($mfilter) {
                              $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
                  ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
                  ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
          
            ->orWhere('packages.slug2', 'like', '%'.$mfilter.'%')  
          ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
          
          ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%')
          ->orWhere('addimages.image_name', 'like', '%'.$mfilter.'%'); 
                 })
              ->orderBy('packages.id', 'DESC')
              ->paginate(30);
                    }
              return view('category', compact('gallery'))->render();
              log::info($gallery);
      }



      public function welcome_fetch_statecity(Request $request){
      
        log::info('inside  citybsearch');

        if($request->ajax()){
            $filter_country = $request->get('filter_city');
                $cat_id = $request->get('CatId');
                log::info($cat_id);
                log::info($filter_country);
            $gallery =DB::table('packages')
            ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
            ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips')
            ->groupBy('packages.TripTitle')
              ->where('packages.Category', $cat_id)
            ->where(function ($query) use ($filter_country) {
            if($filter_country != "all"){
                $query->where('packages.city',$filter_country);
                }
            })
            ->orderBy('packages.id','desc')->paginate(10);
            return view('category', compact('gallery'))->render();
            log::info($gallery);
        }
    }
    public function showmyevents(Request $request,$city)
    {
      log::info($city);
      $category = str_replace('-',' ',$city); 
      $tripcountry= Event::where('slug3',$category)->pluck('slug3');
      $triptitle = str_replace('-',' ',$city); 
      $tripmy=explode("/", $category);
      $triplast=Arr::last( $tripmy);
      $tripstate= Event::where('slug2',$triplast)->pluck('slug2');
       $cat_title = str_replace('-',' ',$city);
        $my_cat=explode("/", $cat_title);
              $middile= Arr::first($my_cat);
        log::info($middile);
       $conts= ucfirst($middile);
        $trip_cities= Event::where('slug3',$middile)->pluck('slug3');
        $trip_citiss= Event::where('slug3',$middile)->first();
        $trip_countriess= Eventcountry::where('country_name',$conts)->pluck('country_name');
        log::info($trip_cities);
              $mycity=explode("/", $category);
        log::info($mycity);
        $lastcity=Arr::last( $mycity);
         $tripcity= Event::where('slug1',$lastcity)->pluck('slug1');
      $eventcountry=Event::groupby('slug3')->get();
      $eventstate=Event::groupby('slug2')->get();
      $eventcity=Event::groupby('slug1')->get();
      if(!$tripstate->isEmpty())
      {
        log::info('inside showstate');
        $title = str_replace('-',' ',$city); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
        $states= Eventstate::where('state_name',$last)->pluck('state_id');                  
        $cities = Eventcity::whereIn('cities.city_state_id',$states)->get();
        $gallery = Event::where('slug2', $last)
   ->where(function ($query) {
    $query->where('publish', '=', '1')
    ->where('status','1');
           })   
      ->orderBy('id', 'desc')
      ->paginate(3);
return view('Eventstate', compact('gallery','cities','eventcountry','eventstate','eventcity')); 
      }
      if(!$tripcity->isEmpty())
      {
        log::info('inside showcity');
        $title = str_replace('-',' ',$city); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
      $gallery = Event::where('slug1', $last)
      ->where(function ($query) {
       $query->where('publish', '=', '1')
       ->where('status','1');
              })   
         ->orderBy('id', 'desc')
         ->paginate(3);
return view('Eventcity', compact('gallery','eventcountry','eventstate','eventcity')); 
      }
      if(!$tripcountry->isEmpty())
      {
        $title = str_replace('-',' ',$city); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
        log::info('inside showcountry');
        $country = str_replace('-',' ',$city); 
        $countries= Eventcountry::where('country_name',$country)->pluck('id'); 
        $states = Eventstate::whereIn('states.state_country_id',$countries)->get();
        $gallery = Event::where('.slug3', $last)
        ->where(function ($query) {
         $query->where('publish', '=', '1')
         ->where('status','1');
                })   
           ->orderBy('id', 'desc')
           ->paginate(3);
      $countries = Eventcountry::all()->pluck('country_name','id');
 return view('Eventcountry', compact('gallery','countries','states','eventcountry','eventstate','eventcity')); 
      }
      if(!$trip_cities->isEmpty() )
        {
          $trip_citys=$trip_citiss->slug;
          if ( $trip_citys==$middile)
          {
            log::info('inside !$trip_tit ');
            return view('showrelatedtrip'); 
          }
        }
        if(!$trip_countriess->isEmpty() )
        {
                     log::info('inside !$trip_tit ');
            return view('showrelatedtrip'); 
            }
    }

}