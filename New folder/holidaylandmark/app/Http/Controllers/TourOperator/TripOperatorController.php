<?php

namespace App\Http\Controllers\TourOperator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Input;
use App\City;
use App\Country;
use App\State;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Log;
use App\AddTrip;
use App\Package;
use App\Rvsp;
use App\TripCategory;
use App\Destination;
use App\AddState;
use App\AddCity;
use Mail;
use App\Iternaries;
use App\Mail\OperatorMail;
use App\Mail\OperatorMails;
use App\Mail\OperatorMailing;
use App\addimage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class TripOperatorController extends Controller
{
    public function create()
    {
       


        $countries = Country::all()->pluck('country_name','id');
      


        return view('touroperator.create',compact('countries'));   

            }

            public function getStates($id){
                $states= State::where('country_id',$id)->pluck('state_name','id');
                return json_encode($states);
            }
        
        
        public function getCities($id){
                $cities= City::where('state_id',$id)->pluck('city_name','id');
                return json_encode($cities);
            }
            public function category()
            {
               
        
        
                $countries = Country::all()->pluck('country_name','id');
              
        
        
                return view('touroperator.Tripcategory',compact('countries'));   
        
                    }

                    public function destination()
                    {
                       
                
                
                        $countries = Country::all()->pluck('country_name','id');
                      
                
                
                        return view('touroperator.adddestination',compact('countries'));   
                
                            }    

                            public function state()
                            {
                               
                        
                        
                                $countries = Country::all()->pluck('country_name','id');
                              
                        
                        
                                return view('touroperator.addstate',compact('countries'));   
                        
                                    }    
                                    public function city()
                                    {
                                       
                                
                                
                                        $countries = Country::all()->pluck('country_name','id');
                                      
                                
                                
                                        return view('touroperator.addcity',compact('countries'));   
                                
                                            }    

  public function iternary()
            {
           
                $trip=Package::all()->pluck('TripTitle');
             
            
    return view('touroperator.iternary',compact('trip'));
            }


            public function list()
            {
        
                $email =  Auth::user()->email;

               

                $gallery = DB::table('packages')
                ->leftJoin('users', 'packages.user_id', '=', 'users.id')
               
              
                ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                ->leftJoin('states','packages.state', '=', 'states.state_id')
                ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                
               // SELECT DISTINCT Country FROM Customers 'addimages.image_name';
                ->where('packages.email',$email)
               
                ->select('packages.*', 'countries.country_name','states.state_name',
                'cities.city_name','users.name')
             
                ->orderBy('packages.id', 'desc')
                         ->paginate(10);
                    $sub= Package::where('email',$email)->sum('subscriber');
                         $res = DB::table('rvsps')
                         ->pluck('TripTitle');
                        //  Log::info($gallery);

            return view('touroperator.index',compact('gallery','res','sub'))->render();   
            }
            public function welcome_fetch_data(Request $request){
                if($request->ajax()){
                    $email =  Auth::user()->email; 
                    $manual_filter = $request->get('manual_filter_table');
                      $manual_filter_tablesm = $request->get('manual_filter_tablesm');
                    $mfiltersm = str_replace("","%",$manual_filter_tablesm);
                    if($manual_filter != null){
                    $gallery = DB::table('packages')
                           
                            ->join('countries','packages.country', '=', 'countries.country_id')
                            ->join('states','packages.state', '=', 'states.state_id')
                            ->join('cities','packages.city', '=', 'cities.city_id')
                              ->where('packages.email', $email)
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
                    ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%');   
                        })
                        ->orderBy('packages.id', 'DESC')
                        ->paginate(10);
                              }

                            
                           return view('touroperator.paginations_data', compact('gallery'))->render(); 
                         }
            }

        

            public function addgallery()
            {
                
                $states = State::where('states.country_id','101')->get();
                $city = DB::table('cities')->whereIn('cities.state_id', $states)->get();
        
                 $email=User::where('role_id',1)->get();
               
                return view('touroperator.addtrip',compact('states','city','email'));  
            }


            public function Uploadcategory(Request $request)
            {
              
             //   $getCountryName = Country::where('country_id', $request->country)->first();
             
            //    $Countryname = $getCountryName->country_name; 
        
                $this->validate($request,[

                   
                     'category'=>'required',
                    
                     'Describe'=>'required',
                     'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=550,min_height=600',
                  
                ]);
        
                if($request->hasfile('Image'))
        
                {


                    $file= $request->file('Image'); 

                    $name = $file->getClientOriginalName();
        
                    $file->move(public_path().'/category/', $name);  
                }
               
        
              
        
             $addrequest = new TripCategory();
               
            //   $addrequest = new TripTitle();
               


                 $addrequest->category =  $request->category;
                 $addrequest->Describe =  $request->Describe;
                 $addrequest->Image =$name;  
                
               //  $addrequest->slug = $Countryname;
                        
                $addrequest->save();
                    // send mail for tour operator
        
                    
                return redirect()->route('touroperator.addtrip')->withInput()->with('success', ' category Added  Successfully ');
          
              
        
        
            }
           
              public function additernary(Request $request)
            {
                
               




            $this->validate($request,[

                



                    'trips'=>'required',            
                    'Days'=>'required',
                    'location' => 'required',
                    'Iternary'=>'required',
                   
                   
         
                ]);
        
        
              
        
               
        
        
                $addrequest = new Iternaries();
                 $addrequest->user_id = auth::user()->id;
                 $addrequest->email = auth::user()->email;
                 $addrequest->trips =  $request->trips;
                 $addrequest->location =  $request->location;
                 $addrequest->Days =  $request->Days;
                 $addrequest->explanation =  $request->Iternary;
                
               
               
                

                $addrequest->save();
                    // send mail for tour operator
        
                    
                return redirect()->route('touroperator.addtrip')->withInput()->with('success', ' iternary Added gallery Successfully ');
          
              
        
        
            }
            public function save(Request $request)
            {
                
                 $OperatorMailsends = array(  
                    'email' => $request->email
                   
                   
            
            );

            $trip=$request->TripTitle;
       
            $orders =DB::table('addimages')->where('trips', $trip )->groupBy('trips')->pluck('image_name');
            
            $title = str_replace("/",' ',$orders);
           
            Mail::to($OperatorMailsends['email'])->send(new OperatorMailing($OperatorMailsends));

                 $getCountryName = Country::where('country_id', $request->country)->first();
             
                $Countryname = $getCountryName->country_name; 
        
                $Countriess =str_slug($Countryname);


                $getStateName = State::where('state_id', $request->state)->first();
             
                $Statename = $getStateName->state_name; 
                
                $States =str_slug($Statename);
                

                $country_state=collect([$Countriess, $States])->implode('/');

                $getCityName = City::where('city_id', $request->city)->first();
             
                $cityname = $getCityName->city_name; 

                $cities = str_slug($cityname); 

                $country_state_city=collect([$Countriess, $States,$cities])->implode('/');

               
                $getsCategory = $request->TripTitle;
                $Category = str_slug($getsCategory); 
               

                $c_s_c_cat=collect([$Countriess, $States,$cities,$Category])->implode('/');
            $this->validate($request,[

                    'country'=>'required',
                    'state'=>'required',
                    'city'=>'required',

                    'TripTitle'=>'required',            
                    'NoOfDays'=>'required',
                    'Keyword' => 'required',
                    'Description'=>'required',
                    'Destination'=>'required',
                  
                    'category' => 'required',
                     'datetime'=>'required',
                     'time'=>'required',
                     'Image' => 'required',
        
                 'Image.*' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=1000,min_height=600',
                   
         
                ]);
        
        
              
        
                if($request->hasfile('Image'))
        
                {
        
                   foreach($request->file('Image') as $file)
        
                   {
        
                       $name = $file->getClientOriginalName();
        
                       $file->move(public_path().'/image/', $name);  
        
                       $data[] = $name;  
        
                   }
                }
                $addrequest = new Package();
                 $addrequest->user_id = auth::user()->id;
                 $addrequest->email = auth::user()->email;
                 $addrequest->TripTitle =  $request->TripTitle;
                 $addrequest->NoOfDays =  $request->NoOfDays;
                 $addrequest->Description =  $request->Description;
                 $addrequest->Destination =  $request->Destination;
                 $addrequest->Iternary =  $request->Iternary;
                 $addrequest->Image= json_encode($data);
               
                 $addrequest->datetime =  $request->datetime;
                 $addrequest->time =      $request->time;
                 $addrequest->Keyword =   $request->Keyword;
                 $addrequest->Category =  $request->category;
                 $addrequest->country =   $request->country;
                 $addrequest->state =  $request->state;
                 $addrequest->city =  $request->city;
           
                 $addrequest->slug = $cityname;
                 $addrequest->slug1 = $Statename;
                 $addrequest->slug2 = $Countryname;
                 $addrequest->img = $orders;
                 $addrequest->country_state = $country_state;
              
                 $addrequest->country_state_city = $country_state_city;
                 $addrequest->c_s_c_cat = $c_s_c_cat;
                 $addrequest->save();
                    // send mail for tour operator  
              
                 return redirect()->route('touroperator.index')->withInput()->with('success','trip Added gallery Successfully');
                }
            
             public function addimage()
            {
           
                $trip=Package::all()->pluck('TripTitle');
             
            
    return view('touroperator.addimage',compact('trip'));
            } 

    
            public function addimageview()
            {
                $gallery=addimage::orderBy('id', 'DESC')->paginate(15);
                return view('touroperator.addimageview',compact('gallery'));     
            }  
            
            public function showtripsimage($id)
            {
                $trip = DB::table('addimages')
                  ->where('addimages.id', $id)
                ->first();    
                          
                return view('touroperator.showtripimage', compact('trip'));
            }   


    public function destroytripimage($id)
            {
                $trip = addimage::find($id);
                $trip->delete();
                return redirect()->route('touroperator.addimageview')->with('danger', 'Trip Image has been Deleted!');
            }  

    public function edittripimage($id)
            {
                $find = addimage::find($id);  
                $trip=Package::all()->pluck('TripTitle');       
                return view('touroperator.edittripimage',compact('trip'))->with('gallery',$find);
            }


            public function updatetripimage(Request $request, $id)
          
             {
           
           
            if($request->hasFile('imag'))
            {
                $image_array = $request->file('imag');
                $array_len = count($image_array);
                for($i=0; $i<$array_len;$i++)
                {
                    $image_size = $image_array{$i}->getClientSize();
                    $image_ext = $image_array{$i}->getClientOriginalExtension();
                    $new_image_name =rand(123456,99999).".".$image_ext;
                    $destination_path = public_path('/images');
                    $image_array{$i}->move($destination_path,$new_image_name);
                
                $gallery = addimage::find($id);
              
                $gallery->trips = Input::get('triptitle');
                $gallery->image_name = $new_image_name;
                $gallery->update();
                }
            }

            $gallery = addimage::find($id);
            $tri= $gallery->trips;
            $orders =DB::table('addimages')->where('trips', $tri )->groupBy('trips')->pluck('image_name');
          
            $affected = DB::table('packages')
            ->where('TripTitle', $tri)
            ->update(['img' => $orders]);

                Session::flash('message', 'Trip Update Successfully');
                return redirect()->route('touroperator.addimageview')->with('success', 'Trip Edit successfully.');       
            }    
   
    public function addsimage(Request $request)
        {
            $this->validate($request,[
                    'trips'=>'required', 
                   
                ]);
              

                if($request->hasFile('imag'))
                {
                    $image_array = $request->file('imag');
                    $array_len = count($image_array);
                    for($i=0; $i<$array_len;$i++)
                    {
                        $image_size = $image_array{$i}->getClientSize();
                        $image_ext = $image_array{$i}->getClientOriginalExtension();
                        $new_image_name =rand(123456,99999).".".$image_ext;
                        $destination_path = public_path('/images');
                        $image_array{$i}->move($destination_path,$new_image_name);
                    
                            $addrequest = new addimage();
                             $addrequest->user_id = auth::user()->id;
                             $addrequest->email = auth::user()->email;
                             $addrequest->trips =  $request->input('trips');
                             $addrequest->image_name =$new_image_name; 
                           
                            $addrequest->save();
                        }
                 
                    return redirect()->back()->with('success', ' trip  added  Successfully ');
                
                    // send mail for tour operator
                    }
                return redirect()->back()->withInput()->with('success', ' iternary Added gallery Successfully ');

                }
            public function showgallery($id)
            {
               
        
               
              
        
                  
                    $gallery = DB::table('packages')
                                      ->leftJoin('users', 'packages.id', '=', 'users.id')
                                     ->leftJoin('states','packages.state', '=', 'states.state_id')
                                    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                                    ->select('packages.*','cities.city_name','users.name')
                                    ->where('packages.id', $id)
                                    ->first();
            
                              
                 return view('touroperator.showgallery', compact('gallery')); 
              
            }
            public function showprofile($id)
            {
                $operators = DB::table('users')
                ->leftJoin('countries','users.Country', '=', 'countries.country_id')
                ->leftJoin('states','users.state', '=', 'states.state_id')
                ->leftJoin('cities','users.city', '=', 'cities.city_id')
                ->select('users.*','cities.city_name','countries.country_name','states.state_name','users.name')
                ->where('users.id', $id)
                ->first();      
             
                return view('touroperator.showprofile',compact('operators'));
            }

            public function editprofile($id)
            {
                $find = User::find($id);
        
      
        
                $country_id = $find->Country;    
                $country = Country::where("country_id" , $country_id)->first();
                if($find->Country == 'Country')
                {
         
                 $country_name = 'Country'; 
                 
         
                }
                else{
                $country_name = $country->country_name;    
                 } 
                
                $state_id = $find->State;
                $state = State::where('state_id',$state_id)->first();
            
                if($find->State == 'State')
                {
         
                 $state_name = 'State'; 
                 
         
                }
                else{
                 $state_name = $state->state_name;   
                       } 
                $city_id = $find->City;
                $city = City::where('city_id',$city_id)->first();
         
                if($find->City == 'City')
                {
         
                 $city_name = 'City'; 
                 
         
                }
                else{
                 $city_name = $city->city_name;  
                       } 
         
         
              
                        
              return view('touroperator.editprofile',compact('id' ,'country_name','country_id','state_name', 'state_id','city_name','city_id'))->with('data',$find);
                 
                 
      
        
               
          
                 
               
            }
            public function profile()
            {
            $email =  Auth::user()->email; 
            $user = DB::table('users')
               ->leftJoin('countries','users.Country', '=', 'countries.country_id')
            ->leftJoin('states','users.state', '=', 'states.state_id')
            ->leftJoin('cities','users.city', '=', 'cities.city_id')
            ->select('users.*','cities.city_name','countries.country_name','states.state_name','users.name')
            ->where('users.email',$email)
            ->get();   
             
     return view('touroperator.profile',compact('user'));
            }
            public function editgallery($id)
            {

      
                $find = Package::find($id);
        
                $country_id = $find->country;    
                $country = Country::where("country_id" , $country_id)->first();
                $country_name = $country->country_name;    
                    
                $state_id = $find->state;
                $state = State::where('state_id',$state_id)->first();
                $state_name = $state->state_name;
         
                $city_id = $find->city;
                $city = City::where('city_id',$city_id)->first();
                $city_name = $city->city_name;

      
              
                return view('touroperator.edittrip',compact('id' ,'country_name','country_id','state_name', 'state_id','city_name','city_id'))->with('data',$find);
            }


            public function destroygallery($id)
            {
                $user = Package::find($id);
                
                
                   $user->delete();
                  return redirect()->route('touroperator.index')->with('danger', ' Trip has been Deleted!');
         
            }

            public function updategallery(Request $request, $id)
            {
          
          
           $getCountryName = Country::where('country_id', $request->country)->first();
               
                  if (!empty($getCountryName))
        {
                $Countryname = $getCountryName->country_name; 
                $Countriess =str_slug($Countryname);
                
          
        }
        
          

                $getStateName = State::where('state_id', $request->state)->first();
                      if (!empty($getStateName))
        {
             
                $Statename = $getStateName->state_name;  
                $States =str_slug($Statename);

                $country_state=collect([$Countriess, $States])->implode('/');

        }
        
    

                $getCityName = City::where('city_id', $request->city)->first();
             
                                  if (!empty($getCityName))
        {
     
                $cityname = $getCityName->city_name; 
                $cities = str_slug($cityname); 
                $country_state_city=collect([$Countriess, $States,$cities])->implode('/');
                
        }

        $getCategory = Package::where('TripTitle', $request->TripTitle)->first();

        $getsCategory = $getCategory->TripTitle;
        $Category = str_slug($getsCategory); 

       
        $c_s_c_cat=collect([$Countriess, $States,$cities,$Category])->implode('/');


                $this->validate($request,[
                    'TripTitle'=>'required',            
                    'NoOfDays'=>'required',
                    'Description'=>'required',
                    'Destination'=>'required',
                  
                    'time'=>'required',
                     'datetime'=>'required',
                     'category' => 'required',
                     
                    'state' => 'required',
                     'city' => 'required',
                      'country' => 'required',
                    
                     'Keyword' => 'required',
                     
                    
                  
                ]);
        
                if($request->hasfile('Image'))
        
                {
        
                   foreach($request->file('Image') as $file)
        
                   {
        
                       $name = $file->getClientOriginalName();
        
                       $file->move(public_path().'/image/', $name);  
        
                       $data[] = $name;  
        
                   }
        
                }
        
        
        
        
                       
             
                $image = $request->file('Image');
                if($image != '')  // here is the if part when you dont want to update the image required
                {
        
        
                $addrequest = Package::find($id);
                 $addrequest->user_id = auth::user()->id;
                 $addrequest->email = auth::user()->email;
                 $addrequest->TripTitle =  $request->TripTitle;
                 $addrequest->NoOfDays =  $request->NoOfDays;
                 $addrequest->Description =  $request->Description;
                 $addrequest->Destination =  $request->Destination;
                 $addrequest->Iternary =  $request->Iternary;
                 $addrequest->Image= json_encode($data);
                 $addrequest->time =  $request->time;
                 $addrequest->Category =  $request->category;
                 $addrequest->datetime =  $request->datetime;
                 $addrequest->Keyword =  $request->Keyword;
                 $addrequest->country =  $request->country;
                 $addrequest->state =  $request->state;
                 $addrequest->city =  $request->city;
                
                 $addrequest->slug = $cityname;
                 $addrequest->slug1 = $Statename;
                 $addrequest->slug2 = $Countryname;
                   $addrequest->country_state = $country_state;
              
                 $addrequest->country_state_city = $country_state_city;
                 $addrequest->c_s_c_cat = $c_s_c_cat;

                        
                $addrequest->save();
                    // send mail for tour
                    
                }
        
        else{


            $addrequest = Package::find($id);
            $addrequest->user_id = auth::user()->id;
            $addrequest->email = auth::user()->email;
            $addrequest->TripTitle =  $request->TripTitle;
            $addrequest->NoOfDays =  $request->NoOfDays;
            $addrequest->Description =  $request->Description;
            $addrequest->Destination =  $request->Destination;
            $addrequest->Iternary =  $request->Iternary;
         
            $addrequest->time =  $request->time;
            $addrequest->Category =  $request->category;
            $addrequest->datetime =  $request->datetime;
            $addrequest->Keyword =  $request->Keyword;
            $addrequest->country =  $request->country;
            $addrequest->state =  $request->state;
            $addrequest->city =  $request->city;
           
            $addrequest->slug = $cityname;
            $addrequest->slug1 = $Statename;
            $addrequest->slug2 = $Countryname;
              $addrequest->country_state = $country_state;
              
                 $addrequest->country_state_city = $country_state_city;
                 $addrequest->c_s_c_cat = $c_s_c_cat;

                   
           $addrequest->save();


        }
        
        
                
                return redirect()->route('touroperator.index')->with('success','trip updated Successfully.');
        
              
            }
        
            
        
            
            

            public function store(Request $request)
            {
                $city_name = City::all();
                
                $this->validate($request,[
                    'emailid'=>'required',
                    'Phoneno'=>'required | numeric | digits:10 | starts_with: 6,7,8,9',   
                    'triptitle'=>'required',
                    'location'=>'required',
                    'iternary'=>'required',
        
                ]);
                $addrequest = new AddTrip();
                 $addrequest->user_id = auth::user()->id;
                
                 $addrequest->emailid= $request->emailid;
                 $addrequest->Phoneno =  $request->Phoneno;
                 $addrequest->triptitle =  $request->triptitle;
                 $addrequest->Noofdays =  $request->Noofdays;
                 $addrequest->location =  $request->location;
                 $addrequest->iternary =  $request->iternary;
                 $addrequest->country =  $request->country;
                 $addrequest->state =  $request->state;
                // $addrequest->slug =  $request->city;
                 $addrequest->city =  $request->city;
                 $addrequest->operatoremail = auth::user()->email;
                $addrequest->save();
                    // send mail for tour operator
        
                return redirect()->route('touroperator.dashboard')->with('success', ' trip Added Successfully ');
          
              





            }
            public function show($id)
            {
                $touroperator = DB::table('add_trips')
                                  ->leftJoin('users', 'add_trips.id', '=', 'users.id')
                                ->leftJoin('countries','add_trips.country', '=', 'countries.country_id')
                                ->leftJoin('states','add_trips.state', '=', 'states.state_id')
                                ->leftJoin('cities','add_trips.city', '=', 'cities.city_id')
                                ->select('add_trips.*','states.state_name','countries.country_name','cities.city_name','users.name')
                                ->where('add_trips.id', $id)
                                ->first();
        
                          
             return view('touroperator.show', compact('touroperator')); 
            }
         
            public function edit($id)
            {
                $find = AddTrip::find($id);
               return view('touroperator.edit')->with('data',$find);
            }

            public function updateprofile(Request $request, $id)
            {
                $this->validate($request,[
                    'name' => 'required',
                  
                    'Phoneno' => 'required',
                    'experience' => 'required',
                   
                   
                  
                    
        
                ]);
                $user = User::find($id);
        
                $user->name =  $request->name;
              
                $user->Phoneno =  $request->Phoneno;
               
              
                $user->Experience = $request->experience;
                $user->Country =  $request->country;
                $user->State =  $request->state;
                $user->City =  $request->city;
                $user->role_id = "2";
             
                $user->save();
                    // send mail for tour operator
        
                return redirect()->route('touroperator.index')->with('success', ' profile updated Successfully ');  
            }
        
            public function update(Request $request, $id)
            {
                
                $this->validate($request, [
                    'emailid'=>'required',
                    'Phoneno'=>'required | numeric | digits:10 | starts_with: 6,7,8,9',   
                    'triptitle'=>'required',
                    'location'=>'required',
                    'iternary'=>'required',
                    // 'contribution'=>'required',            
                     ]);
                
                $touroperator = AddTrip::find($id);
               // $touroperator->user_id = auth::user()->id;
                 $touroperator->emailid = $request->emailid;
                $touroperator->Phoneno = $request->Phoneno;
                 $touroperator->triptitle = $request->triptitle;
                 $touroperator->Noofdays = $request->Noofdays;
                $touroperator->location = $request->location;
                $touroperator->iternary = $request->iternary;
                $touroperator->save();
              //  Log::info('in request function');
             //   Log::info($addrequest);
                
                return redirect()->route('touroperator.dashboard')->with('success','trip  updated Successfully.');
        
              
        
            }

            public function destroy($id)
            {
                $user = AddTrip::find($id);
                $user->delete();
                return redirect()->route('admin.operator.index')->with('danger', 'trip  has been Deleted!');
         
            }
           
           
}