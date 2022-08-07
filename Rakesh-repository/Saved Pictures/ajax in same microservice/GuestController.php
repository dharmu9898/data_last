<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddTrip;
use App\City;
use App\Country;
use App\State;
use App\Event;
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


class GuestController extends Controller
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
              log::info('inside here tour country');
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
              return view('pagess', compact('gallery'))->render();
                }

                if(!$tour_state_id->isEmpty() )
                {
                  log::info('inside here tour state');
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
                  ->paginate(3);
                  return view('pagess', compact('gallery'))->render();
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
                      ->paginate(3);
                      return view('pagess', compact('gallery'))->render();
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
                          ->paginate(3);
                          return view('pagess', compact('gallery'))->render();
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
              ->paginate(3);
                  
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
              ->paginate(3);
             
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
              ->paginate(3);
                  
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
          ->paginate(3);
              
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
      ->where('publish',1)                             
                   ->orderBy('packages.id', 'desc')
                   ->paginate(4);
                  log::info($gallery);
                           $countries = DB::table('trip_countries')
                          ->leftJoin('countries','trip_countries.country', '=', 'countries.country_id')
                              
                         ->select('trip_countries.*','countries.country_name','countries.country_id')
                             ->orderBy('trip_countries.id', 'desc')
                                    ->paginate(3);
                                $states = DB::table('trip_states')
                                ->leftJoin('countries','trip_states.country', '=', 'countries.country_id')
                                ->leftJoin('states','trip_states.state', '=', 'states.state_id')
                                                         
                                ->select('trip_states.*','countries.country_name','countries.country_id','states.state_name','states.state_id')
                                 
                   ->orderBy('trip_states.id','desc')
                                    ->paginate(3);
                         $city = DB::table('trip_cities')
                         ->leftJoin('countries','trip_cities.country', '=', 'countries.country_id')
                         ->leftJoin('states','trip_cities.state', '=', 'states.state_id')
                         ->leftJoin('cities','trip_cities.city', '=', 'cities.city_id')
                                
                         ->select('trip_cities.*','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                        
                           ->orderBy('trip_cities.id','desc')
                                         ->paginate(3);


                                         $galleries = DB::table('packages')
                                         ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
                                         ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
                                          ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
                                                                                  
                                   ->select('packages.*','trip_categories.id','trip_categories.category','addimages.image_name')                                                      
                                   ->groupBy('packages.TripTitle')       
                                   ->where('Permission','Approve')                             
      ->where('publish',1)                                                                                         
                                         ->orderBy('Subscriber','desc') 
                                           
                                         ->paginate(4); 
                                    $activated= DB::table('rvsps')->where('status','1') ->orderBy('id','asc')->paginate(2);
                                    $unactivated= DB::table('rvsps')->where('status','0') ->orderBy('id','desc')->paginate(2); 
                                     $unactivatedsum= Rvsp::where('status','0')->count('status');

                                    // $activated= DB::table('rvsps')->where('status','1') ->select('rvsps.*', DB::raw('count(emailid) as usercounts'))
                                     //->groupby('emailid')->orderBy('usercounts','desc')->paginate(2);
                                         log::info('yeh unactive');
                                         log::info($unactivatedsum);
                                         $activatedsub= Rvsp::where('status','1')->count('status');
                                         $moreactivated= DB::table('rvsps')->where('status','1')->skip(2)->take(8)->get();
                                         $moreunactivated= DB::table('rvsps')->where('status','0')->skip(2)->take(2)->get();
                                        
                                         $products = Event::where('publish','1')->paginate(4, ['*'], 'events');
                                         log::info($products);
                                         log::info($moreactivated);
                                            return view('welcome',compact('gallery','countries','states','city',
                                            'galleries','activated','unactivated','unactivatedsum',
                                            'activatedsub','moreactivated','moreunactivated','products'));
                                            }


                                }  
public function getStates($id){
        $states= State::where('country_id',$id)->pluck('state_name','id');
        return json_encode($states);
    }
public function getCities($id){
        $cities= City::where('state_id',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
    
    
   
    

    public function store(Request $request)
    {
      
      $this->validate($request, [
                  'email'  =>  'required',
            'emailid'  =>  'required',
           ]);
           $sub=$request->TripTitle;
                     $OperatorMailsend = array(  
                         'email' => $request->email
    );
    $OperatorMailsends = array(  
             'emailid' => $request->emailid
       );
    Mail::to($OperatorMailsend['email'])->send(new OperatorMail($OperatorMailsend));
    Mail::to($OperatorMailsends['emailid'])->send(new OperatorMails($OperatorMailsends));
                             $data = $request->emailid;
                             log::info($data);
                       $email = Rvsp::where('emailid',$data)->where('TripHeading',$sub)->first();
                       $myemail = Rvsp::where('emailid',$data)->where('TripHeading',$sub)->pluck('emailid');
                       $visit_trip = Rvsp::where('emailid',$data)->pluck('emailid');
                        if(!$myemail->isEmpty() )
      {
                       $trip=$email->TripHeading;
                       log::info($trip);
                       log::info($sub);
        if($trip==$sub){
          log::info('inside it');
          DB::table('rvsps')
          ->where('emailid', $data)
          ->increment('visit_trip', 1);
          DB::table('rvsps')
        ->where('emailid', $data)->where('TripHeading', $sub)
        ->increment('users', 1);
        }
        else{
          $addrequest = new Rvsp();
          log::info('inside of inside else');
          DB::table('rvsps')
          ->where('emailid', $data)
          ->increment('visit_trip', 1);
          DB::table('packages')
          ->where('TripTitle', $sub)
          ->increment('Subscriber', 1);
             $addrequest->emailid= $request->emailid;
           $addrequest->Phoneno =  $request->Phoneno;
           $addrequest->Name =  $request->Name;
           $addrequest->status =  1;
           $addrequest->Address =  $request->Address;
           $addrequest->TripHeading =  $request->TripTitle;
         
                         $addrequest->save();
             
        }
      }
      else{

        if(!$visit_trip->isEmpty() )
        {
         
          log::info('inside visit else');
          $addrequest = new Rvsp();
            
        $counts = DB::table('rvsps')
          ->where('emailid', $data)
          ->count('emailid');
          DB::table('packages')
          ->where('TripTitle', $sub)
          ->increment('Subscriber', 1);
  
           $addrequest->emailid= $request->emailid;
           $addrequest->Phoneno =  $request->Phoneno;
           $addrequest->Name =  $request->Name;
           $addrequest->status =  1;
           $addrequest->visit_trip =  $counts+1;
           $addrequest->Address =  $request->Address;
           $addrequest->TripHeading =  $request->TripTitle;
         
                         $addrequest->save();
        }
        else{
        log::info('inside else');
        $addrequest = new Rvsp();
          
      
        DB::table('packages')
        ->where('TripTitle', $sub)
        ->increment('Subscriber', 1);

         $addrequest->emailid= $request->emailid;
         $addrequest->Phoneno =  $request->Phoneno;
         $addrequest->Name =  $request->Name;
         $addrequest->status =  1;
         $addrequest->visit_trip =  1;
         $addrequest->Address =  $request->Address;
         $addrequest->TripHeading =  $request->TripTitle;
        
                       $addrequest->save();
                      }
      }
      return redirect()->back()->with('success', ' your message send Successfully ');
    }
    public function stores(Request $request)
    {

      $input = $request->useremail;
      log::info($input);
      $userdata = DB::table('rvsps')->where('emailid', $input)->first();
      $usersdata = DB::table('rvsps')->where('emailid', $input)->pluck('emailid');
     
      if(!$usersdata->isEmpty() )
      {
      $name=$userdata->Name;
      $address=$userdata->Address;
      $phone=$userdata->Phoneno;
      $TripHeading =  $request->TripsTitle;
      log::info('inside show stores okk');
     

              $this->validate($request, [
                'useremail'  =>  'required',
          'uemail'  =>  'required',
        ]);
        $sub=$request->TripsTitle;
                            $data = $request->useremail;
                          log::info($data);
                    $email = Rvsp::where('emailid',$data)->where('TripHeading',$sub)->first();
                    $myemail = Rvsp::where('emailid',$data)->where('TripHeading',$sub)->pluck('emailid');
                    $visit_trip = Rvsp::where('emailid',$data)->pluck('emailid');
                      if(!$myemail->isEmpty() )
{
             $trip=$email->TripHeading;
             log::info($trip);
             log::info($sub);
        if($trip==$sub){
        log::info('inside it');
        DB::table('rvsps')
        ->where('emailid', $data)
        ->increment('visit_trip', 1);
        DB::table('rvsps')
        ->where('emailid', $data)->where('TripHeading', $sub)
        ->increment('users', 1);
        }
        else{
        $addrequest = new Rvsp();
        log::info('inside of inside else');
        DB::table('rvsps')
        ->where('emailid', $data)
        ->increment('visit_trip', 1);
        DB::table('packages')
        ->where('TripTitle', $sub)
        ->increment('Subscriber', 1);
          $addrequest->emailid= $request->useremail;
        $addrequest->Phoneno =  $phone;
        $addrequest->Name =  $name;
        $addrequest->status =  1;
        $addrequest->Address =  $address;
        $addrequest->TripHeading =  $request->TripsTitle;
        $addrequest->password = $request->userpassword;
                      $addrequest->save();
   
      }
      }
      else{

      if(!$visit_trip->isEmpty() )
      {

      log::info('inside visit else');
      $addrequest = new Rvsp();
        
      $counts = DB::table('rvsps')
      ->where('emailid', $data)
      ->count('emailid');
      DB::table('packages')
      ->where('TripTitle', $sub)
      ->increment('Subscriber', 1);

     
      
                    $addrequest->save();


                    $addrequest->emailid= $request->useremail;
                    $addrequest->Phoneno =  $phone;
                    $addrequest->Name =  $name;
                    $addrequest->status =  1;
      $addrequest->visit_trip =  $counts+1;
      $addrequest->Address =  $address;
      $addrequest->TripHeading =  $request->TripsTitle;
      $addrequest->password = $request->userpassword;
                    $addrequest->save();
      }
      else{
      log::info('inside else');
      $addrequest = new Rvsp();


      DB::table('packages')
      ->where('TripTitle', $sub)
      ->increment('Subscriber', 1);

      $addrequest->emailid= $request->useremail;
                    $addrequest->Phoneno =  $phone;
                    $addrequest->Name =  $name;
                    $addrequest->status =  1;
      $addrequest->visit_trip =  1;
      $addrequest->Address =  $address;
      $addrequest->TripHeading =  $request->TripsTitle;
      $addrequest->password = $request->userpassword;
                  $addrequest->save();
                  }
      }
      $response = [
        'success' => true,
        'data' => $addrequest,
        'message' => 'Training Updated successfully.'
    ];

   
    return response()->json($response, 200);
    }

    else{
      log::info('inside else register');
      return response()->json('success', 200);


    }

    }
   
  
    public function showtrips($tour)
    {
      log::info('inside show');
        $title = str_replace('-',' ',$tour);
        $my=explode("/", $title);
        $last=Arr::last( $my);

         $gallery = DB::table('packages')
         ->leftJoin('addimages','packages.TripTitle', '=', 'addimages.trips')
         ->leftJoin('trip_cities','packages.slug2', '=', 'trip_cities.slug2')  
         ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
      ->select('packages.*','iternaries.explanation','addimages.image_name')
      ->where('packages.TripTitle', $last)
      ->first();
        $iternary = DB::table('iternaries')

      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 1')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);
      log::info('iternaery variable');
     log::info($iternary);
     
      $iternary1 = DB::table('iternaries')
  
      ->select('iternaries.*')
      ->where('iternaries.trips', $last)
      ->where('iternaries.Days', 'day 2')
      ->orderBy('iternaries.id', 'asc')
      ->paginate(10);
      log::info($iternary1);
    return view('show', compact('gallery','iternary','iternary1')); 
    }
    

    
  public function welcome_fetch_allsearching(Request $request){
    log::info('inside allsearching');
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
         ->where('packages.slug2', $cat_id)
        ->where(function ($query) use ($mfilter) {
                 
            $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
            ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
            ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
           ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
       ->orWhere('addimages.image_name', 'like', '%'.$mfilter.'%') 
    ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
            })
        ->orderBy('packages.id', 'DESC')
        ->paginate(30);
              }
        return view('category', compact('gallery'))->render();
        
}





public function welcome_fetch_allsearch(Request $request){
  log::info('inside allsearch');
    if($request->ajax()){
        $manual_filter = $request->get('manual_filter_tablesm');
        $mfilter = str_replace("","%",$manual_filter);
          $cat_id = $request->get('CatId');
          log::info($mfilter);
        $gallery = DB::table('packages')
                     
          ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
          ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips') 
          ->groupBy('packages.TripTitle')
         ->where('packages.slug1', $cat_id)
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
    
}

public function welcome_fetch_all(Request $request){
  log::info('inside all');
     if($request->ajax()){
        $manual_filter = $request->get('manual_filter_tablesm');
        $mfilter = str_replace("","%",$manual_filter);
         $cat_id = $request->get('CatId');
         log::info($mfilter);
        $gallery = DB::table('packages')
              
        ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
        ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips')
        ->groupBy('packages.TripTitle')
         ->where('packages.slug2', $cat_id)
        ->where(function ($query) use ($mfilter) {
                  
            $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
            ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
            ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
  
    
    ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
   
    ->orWhere('packages.slug1', 'like', '%'.$mfilter.'%')
    ->orWhere('packages.slug2', 'like', '%'.$mfilter.'%') 
    ->orWhere('addimages.image_name', 'like', '%'.$mfilter.'%') 
    ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
     
        })
        ->orderBy('packages.id', 'DESC')
        ->paginate(30);
              }
        return view('category', compact('gallery'))->render();
    
    
}
public function welcome_fetch_cities(Request $request){
      
           
log::info('inside fetch cities');
  if($request->ajax()){
      $filter_city = $request->get('filter_city');
      log::info($filter_city);
      $gallery =DB::table('packages')
       ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
        ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips')
        ->groupBy('packages.TripTitle')
     
      ->where(function ($query) use ($filter_city) {
      if($filter_city != "all"){
          $query->where('packages.city',$filter_city);
        
          }
      })
      ->orderBy('packages.id','desc')->paginate(30);
      return view('category', compact('gallery'))->render();
  
  }
}




public function welcome_fetch_statecity(Request $request){
      
           

  if($request->ajax()){
      $filter_country = $request->get('filter_city');
      $gallery =DB::table('packages')
     
      ->Join('addimages','packages.TripTitle', '=', 'addimages.trips')
      ->Join('iternaries','packages.TripTitle', '=', 'iternaries.trips')
      ->groupBy('packages.TripTitle')
      ->where(function ($query) use ($filter_country) {
      if($filter_country != "all"){
          $query->where('packages.city',$filter_country);
          }
      })
      ->orderBy('packages.id','desc')->paginate(30);
      return view('category', compact('gallery'))->render();
  
  }
}

}