<?php

namespace App\Http\Controllers;

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

class GuestController extends Controller
{
    public function index()
    {
                   /*    $gallery = DB::table('packages')
                        ->leftJoin('users', 'packages.user_id', '=', 'users.id')
                       
                
                        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                        ->leftJoin('states','packages.state', '=', 'states.state_id')
                        ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                            ->select('packages.*','states.state_name','countries.country_name','cities.city_name','users.name')
                            
                           
                            ->orderBy('packages.id', 'desc')
                                     ->paginate(10);
                      
                                     $countries = Country::all()->pluck('country_name','id');*/
                 


                                /*   $gallery = DB::table('trip_categories')
                  
                       
                
                                     ->leftJoin('countries','trip_categories.country', '=', 'countries.country_id')
                                     ->leftJoin('states','trip_categories.state', '=', 'states.state_id')
                                     ->leftJoin('cities','trip_categories.city', '=', 'cities.city_id')
                                         ->select('trip_categories.*','states.state_name','countries.country_name','cities.city_name')
                                         
                                        
                                         ->orderBy('trip_categories.id', 'desc')
                                                  ->paginate(10);*/

       $gallery = DB::table('packages')
       ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
         ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('states','packages.state', '=', 'states.state_id')
    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                           
    ->select('packages.*','trip_categories.id','trip_categories.category','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                                  
      ->where('Permission','yes')                             
                                      
                   ->orderBy('packages.id', 'desc')
                   ->take(9)->get();
                  
                      $galleries = DB::table('packages')
                        ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')
                        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                        ->leftJoin('states','packages.state', '=', 'states.state_id')
                        ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                                                                 
                  ->select('packages.*','trip_categories.id','trip_categories.category','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')                                                      
                        ->where('Permission','yes')                                                                                     
                        ->orderBy('Subscriber','desc')   
                        ->take(9)->get();  
//$galls=Package::orderBy('Subscriber','desc')->take(5)->get();
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('Subscriber');
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('TripTitle');
//$galls=Package::orderBy('Subscriber','desc')->take(5)->pluck('Subscriber','id');
                           $countries = DB::table('destinations')
                          ->leftJoin('countries','destinations.country', '=', 'countries.country_id')
                                
                         ->select('destinations.*','countries.country_name','countries.country_id')
                             ->orderBy('destinations.id', 'desc')
                                    ->paginate(9);
                                $states = DB::table('add_states')
                                ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
                                ->leftJoin('states','add_states.state', '=', 'states.state_id')
                                                         
                                ->select('add_states.*','countries.country_name','countries.country_id','states.state_name','states.state_id')
                                   
                   ->orderBy('add_states.id','desc')
                                    ->paginate(9);

                         $city = DB::table('add_cities')
                         ->leftJoin('countries','add_cities.country', '=', 'countries.country_id')
                         ->leftJoin('states','add_cities.state', '=', 'states.state_id')
                         ->leftJoin('cities','add_cities.city', '=', 'cities.city_id')
                                      
                         ->select('add_cities.*','countries.country_name','countries.country_id','states.state_name','states.state_id','cities.city_name','cities.city_id')
                        
                           ->orderBy('add_cities.id','desc')
                                         ->paginate(9);
                       return view('welcome',compact('gallery','countries','states','city','galleries'))->render();
                          
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
public function getStates($id){
        $states= State::where('country_id',$id)->pluck('state_name','id');
        return json_encode($states);
    }
public function getCities($id){
        $cities= City::where('state_id',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
        public function welcome_fetch_category(Request $request){
      
       
        if($request->ajax()){
            $filter_category = $request->get('filter_category');
            $gallery =DB::table('packages')

            ->where(function ($query) use ($filter_category) {
            if($filter_category != "all"){
                $query->where('packages.Category',$filter_category);
                }
            })
            ->orderBy('packages.id','desc')->paginate(30);
            return view('pagess', compact('gallery'))->render();
        }
    }
    public function welcome_fetchs_data(Request $request){
        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_table');
            $mfilter = str_replace("","%",$manual_filter);
            $gallery = DB::table('trip_categories')
            
            ->where('trip_categories.category', 'like', '%'.$mfilter.'%')
            
            //  ->orwhere(function ($query) use ($mfilter) {
            // })
            ->orderBy('trip_categories.id', 'DESC')
            ->paginate(30);
            return view('pagess', compact('gallery'))->render();
        }
    }
    public function welcome_fetch_country(Request $request){
        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_country');
            $mfilter = str_replace("","%",$manual_filter);
            $countries = DB::table('destinations')
            ->join('countries','destinations.country', '=', 'countries.country_id')
           
            
              ->where(function ($query) use ($mfilter) {

               $query->Where('countries.country_name', 'like', '%'.$mfilter.'%');
             })
            ->orderBy('destinations.id', 'DESC')
            ->paginate(30);
            return view('page', compact('countries'))->render();
        }
    }


    public function welcome_fetching_data(Request $request){
      
           

        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_tables');
              $manual_filter_tablesm = $request->get('manual_filter_tablesm1');
            $mfiltersm = str_replace("","%",$manual_filter_tablesm);
            if($manual_filter != null){
            $states = DB::table('add_states')
                   
                    ->join('countries','add_states.country', '=', 'countries.country_id')
                    ->join('states','add_states.state', '=', 'states.state_id')
                   
                    ->where(function ($query) use ($manual_filter) {
              
                        $query->Where('add_states.country', $manual_filter)
                        ->orWhere('add_states.state', $manual_filter);
               
                    })
                
                ->orderBy('add_states.id', 'DESC')
                ->paginate(10);
                } else{
            $states = DB::table('add_states')
                   
       ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
       ->leftJoin('states','add_states.state', '=', 'states.state_id')
       
        ->where(function ($query) use ($mfiltersm) {
              
                 $query->Where('countries.country_name', 'like', '%'.$mfiltersm.'%')
            ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%');
             
                })
                ->orderBy('add_states.id', 'DESC')
                ->paginate(30);
                      }
            return view('state', compact('states'))->render();


          
        
        }
    }
    public function welcome_fetching_city(Request $request){
      
           

        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_cont');
              $manual_filter_tablesm = $request->get('manual_filter_tablesms');
            $mfiltersm = str_replace("","%",$manual_filter_tablesm);
            if($manual_filter != null){
                $gallery = DB::table('packages')
                   
                ->join('countries','packages.country', '=', 'countries.country_id')
                ->join('states','packages.state', '=', 'states.state_id')
                ->join('cities','packages.city', '=', 'cities.city_id')
                ->where(function ($query) use ($manual_filter) {
          
                    $query->Where('packages.country', $manual_filter)
                    ->orWhere('packages.state', $manual_filter)
             ->orWhere('packages.city', $manual_filter);  
                })
            
            ->orderBy('packages.id', 'DESC')
            ->paginate(10);
            } else{
        $gallery = DB::table('packages')
               
   ->leftJoin('countries','packages.country', '=', 'countries.country_id')
   ->leftJoin('states','packages.state', '=', 'states.state_id')
   ->leftJoin('cities','packages.city', '=', 'cities.city_id')
    ->where(function ($query) use ($mfiltersm) {
          
             $query->Where('countries.country_name', 'like', '%'.$mfiltersm.'%')
        ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
        ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%');   
            })
            ->orderBy('packages.id', 'DESC')
            ->paginate(30);
                  }
        return view('pagess', compact('gallery'))->render();
        }
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
              
                        $query->Where('packages.country', $manual_filter)
                        ->orWhere('packages.state', $manual_filter)
                 ->orWhere('packages.city', $manual_filter);  
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
         
    

   public function welcome_fetch_dashboard(Request $request){
      
           

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
              
                        $query->Where('packages.country', $manual_filter)
                        ->orWhere('packages.state', $manual_filter)
                 ->orWhere('packages.city', $manual_filter)
                 ->orWhere('packages.Category', $manual_filter); 
                    })
                
                ->orderBy('packages.id', 'DESC')
                ->paginate(9);
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
                ->paginate(9);
                      }
            return view('pagess', compact('gallery'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
  
    //
    public function getRole(Request $request){

        
        if($request->ajax()){
            $filter_city = $request->get('filter_city');
            $profiles =DB::table('add_trips')
           
            ->join('cities','add_trips.city', '=','cities.city_id')
          
            ->where(function ($query) use ($filter_city) {
            if($filter_city != "all"){
                $query->where('profiles.city',$filter_city);
                }
            })
            ->orderBy('add_trips.id','desc')->paginate(30);
            return view('paginated_data', compact('profiles'))->render();
        }
    }


    public function welcome_country(Request $request){

        if($request->ajax()){
            $filter_city = $request->get('filter_city');
            $gallery =DB::table('Packages')
           
          
            ->join('cities','Packages.city', '=','cities.city_id')
            ->where(function ($query) use ($filter_city) {
            if($filter_city != "all"){
                $query->where('Packages.city',$filter_city);
                }
            })
            ->orderBy('Packages.id','desc')->paginate(30);
            return view('page', compact('gallery'))->render();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $this->validate($request, [
      
            'email'  =>  'required',
            'emailid'  =>  'required',
           ]);
           $OperatorMailsend = array(  

              
            'email' => $request->email
    );


    $OperatorMailsends = array(  

              
      
        'emailid' => $request->emailid
       

);
    Mail::to($OperatorMailsend['email'])->send(new OperatorMail($OperatorMailsend));
    Mail::to($OperatorMailsends['emailid'])->send(new OperatorMails($OperatorMailsends));
        
       
        
        $data = $request->emailid;
        
         $emails = User::where('email',$data)->first();
        $email = Rvsp::where('emailid',$data)->first();
        if($email){
           return redirect()->back()->with('success', 'You have already subscribed for this trip with this email .');
        }
     
     if($emails){
           return redirect()->back()->with('success', 'You have already subscribed for this trip with this email .');
        }
        $addrequest = new Rvsp();
           
        $sub=$request->TripTitle;
        DB::table('packages')
        ->where('TripTitle', $sub)
        ->increment('Subscriber', 1);

       
               // return  $rest;
        
         $addrequest->emailid= $request->emailid;
         $addrequest->Phoneno =  $request->Phoneno;
         $addrequest->Name =  $request->Name;
         $addrequest->Address =  $request->Address;
         $addrequest->TripTitle =  $request->TripTitle;
         $addrequest->Address =  $request->Address;
       
                $addrequest->save();

               
            // send mail for tour operator

           return redirect()->back()->with('success', ' your message send Successfully ');

         

         
  

      
    }

    
    public function welcome_fetch_statecity(Request $request){
      
           

        if($request->ajax()){
            $filter_country = $request->get('filter_city');
            $gallery =DB::table('packages')
            ->join('countries','packages.country', '=','countries.country_id')
            
            ->join('states','packages.state', '=','states.state_id')
            ->join('cities','packages.city', '=','cities.city_id')
           
            ->where(function ($query) use ($filter_country) {
            if($filter_country != "all"){
                $query->where('packages.city',$filter_country);
                }
            })
            ->orderBy('packages.id','desc')->paginate(30);
            return view('category', compact('gallery'))->render();
        
        }
    }

    public function welcome_fetch_countries(Request $request){
      
           

        if($request->ajax()){
            $filter_state = $request->get('filter_state');
            $gallery =DB::table('packages')
            ->join('countries','packages.country', '=','countries.country_id')
            ->join('states','packages.state', '=','states.state_id')
            ->join('cities','packages.city', '=','cities.city_id')
           
            ->where(function ($query) use ($filter_state) {
            if($filter_state != "all"){
                $query->where('packages.state',$filter_state);
                }
            })
            ->orderBy('packages.id','desc')->paginate(30);
            return view('category', compact('gallery'))->render();
        
        }
    }


    public function welcome_fetch_allsearching(Request $request){
      
      
        


        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_tablesm');
            $mfilter = str_replace("","%",$manual_filter);
              $cat_id = $request->get('CatId');
            $gallery = DB::table('packages')
            ->leftjoin('countries','packages.country', '=','countries.country_id')
            ->leftjoin('cities','packages.city', '=','cities.city_id')
            ->leftjoin('states','packages.state', '=','states.state_id')
             ->where('packages.slug', $cat_id)
            ->where(function ($query) use ($mfilter) {
                      
                $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
       
        ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
        ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
        
            })
            ->orderBy('packages.id', 'DESC')
            ->paginate(30);
                  }
            return view('category', compact('gallery'))->render();
        
        
    }



    public function welcome_fetch_allsearch(Request $request){
      
      
        


        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_tablesm');
            $mfilter = str_replace("","%",$manual_filter);
              $cat_id = $request->get('CatId');
            $gallery = DB::table('packages')
           
            ->leftjoin('countries','packages.country', '=','countries.country_id')
            ->leftjoin('cities','packages.city', '=','cities.city_id')
            ->leftjoin('states','packages.state', '=','states.state_id')
             ->where('packages.slug1', $cat_id)
          
            ->where(function ($query) use ($mfilter) {
                      
                $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
      
        ->orWhere('cities.city_name', 'like', '%'.$mfilter.'%')  
        ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
        ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
       
            })
            ->orderBy('packages.id', 'DESC')
            ->paginate(30);
                  }
            return view('category', compact('gallery'))->render();
        
        
    }



    public function welcome_fetch_all(Request $request){
      
      
        


        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_tablesm');
            $mfilter = str_replace("","%",$manual_filter);
             $cat_id = $request->get('CatId');
            $gallery = DB::table('packages')
            ->leftjoin('countries','packages.country', '=','countries.country_id')
            ->leftjoin('cities','packages.city', '=','cities.city_id')
            ->leftjoin('states','packages.state', '=','states.state_id')
             ->where('packages.slug2', $cat_id)
            ->where(function ($query) use ($mfilter) {
                      
                $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
      
        ->orWhere('states.state_name', 'like', '%'.$mfilter.'%')
        ->orWhere('cities.city_name', 'like', '%'.$mfilter.'%')
        ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
        ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
         
            })
            ->orderBy('packages.id', 'DESC')
            ->paginate(30);
                  }
            return view('category', compact('gallery'))->render();
        
        
    }
    public function welcome_fetch_cities(Request $request){
      
           

        if($request->ajax()){
            $filter_city = $request->get('filter_city');
            $gallery =DB::table('packages')
            ->join('countries','packages.country', '=','countries.country_id')
            
            ->join('states','packages.state', '=','states.state_id')
            ->join('cities','packages.city', '=','cities.city_id')
           
            ->where(function ($query) use ($filter_city) {
            if($filter_city != "all"){
                $query->where('packages.city',$filter_city);
                }
            })
            ->orderBy('packages.id','desc')->paginate(30);
            return view('category', compact('gallery'))->render();
        
        }
    }

    
   public function show($tour)
    {

       
        $title = str_replace('-',' ',$tour);
        $my=explode("/", $title);
        $last=Arr::last( $my);
        
 
   $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('states','packages.state', '=', 'states.state_id')
       ->leftJoin('iternaries','packages.TripTitle', '=', 'iternaries.trips')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.*','iternaries.explanation','countries.country_name','states.state_name','cities.city_name','users.name')
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
    return view('show', compact('gallery','iternary','iternary1')); 
    }

  
  public function shows($states)
    {

        $title = str_replace('-',' ',$states); 
        
        $my=explode("/", $title);

        $last=Arr::last( $my);
        
   
        
   $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.*','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.TripTitle', $last)
      ->first();

     

     return view('showstates', compact('gallery')); 
    }

  
  
  
  
    public function gallery($Image)
    {

        $title = str_replace('-',' ',$tour); 
        
        $my=explode("/", $title);

        $last=Package::where('packages.Image', $Image)->pluck('TripTitle');
        
        $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
        ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.*','trip_categories.Describe','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.Image', $Image)
      ->orderBy('packages.id', 'desc')
      ->paginate(10);


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
     return view('show', compact('gallery','iternary','iternary1')); 
    }


public function showcountry($names)
    {
        $country = str_replace('-',' ',$names); 
        $countries= Country::where('country_name',$country)->pluck('country_id'); 
        
        $states = DB::table('states')->whereIn('states.country_id',$countries)->get();
      
        $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('destinations','packages.slug2', '=', 'destinations.slug')   
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
        ->select('packages.*','destinations.desc','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.slug2', $country)
     // ->where('Permission', '=', 'yes')
       ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(10);
     
      $galleries = DB::table('packages')
      ->leftJoin('users', 'packages.id', '=', 'users.id')
      ->leftJoin('countries','packages.country', '=', 'countries.country_id')
     ->leftJoin('destinations','packages.slug2', '=', 'destinations.slug')   
     ->leftJoin('states','packages.state', '=', 'states.state_id')
    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.NoOfDays','destinations.Image','countries.country_name','states.state_name','cities.city_name','users.name')
    ->where('packages.slug2', $country)
      ->where(function ($query) {
               $query->where('Permission', '=', 'yes');      
           })  
    ->orderBy('packages.id', 'desc') 
    ->paginate(10); 

      $countries = Country::all()->pluck('country_name','id');
 return view('showcountry', compact('gallery','countries','galleries','states')); 
    }

    public function showstate($state)
    {
        $title = str_replace('-',' ',$state); 
        $my=explode("/", $title);
        $last=Arr::last( $my);
        
        $states= State::where('state_name',$last)->pluck('state_id');                  
          
        $cities = DB::table('cities')->whereIn('cities.state_id',$states)->get();
        
        $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id') 
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('add_states','packages.slug1', '=', 'add_states.slug')   
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
        ->select('packages.*','add_states.Explain','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.slug1', $last)
   ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
                     
           })   
      ->orderBy('packages.id', 'desc')
      ->paginate(10);
      $galleries = DB::table('packages')
      ->leftJoin('users', 'packages.id', '=', 'users.id')
      ->leftJoin('countries','packages.country', '=', 'countries.country_id')
     ->leftJoin('add_states','packages.slug1', '=', 'add_states.slug')   
     ->leftJoin('states','packages.state', '=', 'states.state_id')
    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.NoOfDays','add_states.Image','countries.country_name','states.state_name','cities.city_name','users.name')
    ->where('packages.slug1', $last)
     ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
                     
           })  
    ->orderBy('packages.id', 'desc')
    ->paginate(10);


return view('showstate', compact('gallery','galleries','cities')); 
    }
    public function showcity($city)
    {
        $title = str_replace('-',' ',$city); 
       
        $my=explode("/", $title);
        
        $last=Arr::last( $my);
        
       
      $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
       ->leftJoin('add_cities','packages.slug', '=', 'add_cities.slug')   
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
        ->select('packages.*','add_cities.Describes','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.slug', $last)
       ->where(function ($query) {
               $query->where('Permission', '=', 'yes');       
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(10);

      $galleries = DB::table('packages')
      ->leftJoin('users', 'packages.id', '=', 'users.id')
      ->leftJoin('countries','packages.country', '=', 'countries.country_id')
     ->leftJoin('add_cities','packages.slug', '=', 'add_cities.slug')   
     ->leftJoin('states','packages.state', '=', 'states.state_id')
    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.NoOfDays','add_cities.Image','countries.country_name','states.state_name','cities.city_name','users.name')
    ->where('packages.slug', $last)
     ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
                     
           }) 
    ->orderBy('packages.id', 'desc')
    ->paginate(10);
return view('showcity', compact('gallery','galleries')); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}