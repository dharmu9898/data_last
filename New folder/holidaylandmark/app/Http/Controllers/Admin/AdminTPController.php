<?php

namespace App\Http\Controllers\Admin;







use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use App\City;
use App\Country;
use App\State;
use Auth;
use App\Package;
use Illuminate\Support\Facades\Log;
use App\SocialProvider;
use App\TripCategory;
use App\Destination;
use App\AddState;
use App\AddCity;
use App\Rvsp;



class AdminTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        
      
        $users = User::where('role_id', '2')
        ->leftJoin('countries','users.Country', '=', 'countries.country_id')
        ->leftJoin('states','users.state', '=', 'states.state_id')
        ->leftJoin('cities','users.city', '=', 'cities.city_id')
        ->select('users.*','cities.city_name','countries.country_name','states.state_name','users.name')

        
        
        ->orderBy('id', 'desc')->paginate(10);
       
        return view('admin.operator.index', compact('users'));
    }


 public function tripdetail()
            {
        
               
                $gallery = DB::table('packages')
                ->leftJoin('users', 'packages.user_id', '=', 'users.id')
               
              
                ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                ->leftJoin('states','packages.state', '=', 'states.state_id')
                ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                
                ->select('packages.*','countries.country_name','states.state_name','cities.city_name','users.name')
                
               
                ->orderBy('packages.id', 'desc')
                         ->paginate(10);
            
              
                    $sub= Package::sum('subscriber');
                       
                         $res = DB::table('rvsps')
                                                    
                         ->pluck('TripTitle');
                       
                    
                       
                        
                       
             
 
                  
                        
                       
              
            $galleries = Package::all();       
             
 
               
                        
                       
              
            return view('admin.tripdetail',compact('gallery','res','sub','galleries'))->render(); 
            
            
            
            
                
            }

            public function updates(Request $request)
            {
        
                
        
               
           $data = $request->except('_token');
                
               
        
      $my= $data['Permission'];
      
    
      
      
      
      
      $arr= array_first($my);
                
                $subject_count = count($data['Permission']);
                
                  if (array_unique($my)==array('yes'))
         {
               
                if ($request->selectAll){
                for($i=0; $i < $subject_count; $i++){
                    $id = Package::all()->pluck('id');
                   
                   
                    DB::table('packages')
                    ->whereIn('id', $id)
                    ->update(array('Permission' => 'yes'));
                   
                }
            }
         }
                
         if ($arr=='no')
         {
               
                if ($request->selectAll){
                for($i=0; $i < $subject_count; $i++){
                    $id = Package::all()->pluck('id');
                   
                   
                    DB::table('packages')
                    ->whereIn('id', $id)
                    ->update(array('Permission' => 'yes'));
                   
                }
            }
                else
                {
        
        
                    for($i=0; $i < $subject_count; $i++)   {
        
                      
                       
                        $id = Package::whereIn('id',$data['Perm'])->pluck('id');
                   
                  
                        DB::table('packages')
                        ->whereIn('id', $id)
                        ->update(array('Permission' => 'yes'));
                      
                        
                        
        
                }
                } 
        
            }

            else{

                if ($request->selectAll){
                    for($i=0; $i < $subject_count; $i++){
                        $id = Package::all()->pluck('id');
                       
                       
                        DB::table('packages')
                        ->whereIn('id', $id)
                        ->update(array('Permission' => 'no'));
                       
                    }
                }
                    else
                    {
            
            
                        for($i=0; $i < $subject_count; $i++)   {
            
                          
                           
                            $id = Package::whereIn('id',$data['Perm'])->pluck('id');
                       
                      
                            DB::table('packages')
                            ->whereIn('id', $id)
                            ->update(array('Permission' => 'no'));
                          
                            
                            
            
                    }
                    } 

            }
                
  return redirect()->route('admin.list')->with('success','Permission Granted Successfully.');
        
           
        
        
        
            }

            
            public function list()
            {
                $gallery = DB::table('packages')
                ->leftJoin('users', 'packages.user_id', '=', 'users.id')
                ->leftJoin('countries','packages.country', '=', 'countries.country_id')
                ->leftJoin('states','packages.state', '=', 'states.state_id')
                ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                
                ->select('packages.*','countries.country_name','states.state_name','cities.city_name','users.name')
                
               
                ->orderBy('packages.id', 'desc')
                         ->paginate(10);
            // return $gallery;
           return view('admin.Permission',compact('gallery'));
            }
            public function welcome_fetchs_data(Request $request){
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
                    ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%');   
                        })
                        ->orderBy('packages.id', 'DESC')
                        ->paginate(10);
                              }

                            
                           return view('admin.paginations_data', compact('gallery'))->render(); 
                         }
            }
            public function lists($TripTitle)
            {
                                                 
                       
               
        
        
               $id=Rvsp::where('TripTitle',$TripTitle)->pluck('id');
               $data = Rvsp::find($id);
            
           return view('admin.Rvsp',compact('data'));
        
                    
                                           
        
            
        
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
            
                              
                 return view('admin.showgallery', compact('gallery')); 
              
            }
            public function updatervsp(Request $request)
            {
        
              
        
                $data = $request->except('_token');
                
                $email = User::where('email',$data['rvsp_id'])->first();
                if($email){
                   return redirect()->route('admin.tripdetail')->with('success', ' already subscribed.');
                }
                
                $subject_count = count($data['rvsp_id']);
                
                if ($request-> selectAll){
                for($i=0; $i < $subject_count; $i++){
         
                    $tss = new User;
                    $tss->name = $data['rv_id'][$i];
                    $tss->email = $data['rvsp_id'][$i];
                    $tss->Phoneno = $data['rvp_id'][$i];
                    $tss->Address = $data['rva_id'][$i];
                    $tss->TripTitle = $data['rvt_id'][$i];
                       
                    
                    
         
                                   
        
        
        
        
                    $tss->role_id=3;
                    $tss->save();
                   
                }
            }
                else
                {
        
        
                    for($i=0; $i < $subject_count; $i++)   {
        
                        $tss = new User;
                        $tss->name = $data['rv_id'][$i];
                        $tss->email = $data['rvsp_id'][$i];
                        $tss->Phoneno = $data['rvp_id'][$i];
                        $tss->Address = $data['rva_id'][$i];
                        $tss->TripTitle = $data['rvt_id'][$i];
                              
                        $tss->role_id=3;
                        $tss->save();
                       
        
                }
                } 
        
        
                
                return redirect()->route('admin.tripdetail')->with('success','confirm Added Successfully.');
        
            
        
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

      
              
                return view('admin.edittrip',compact('id' ,'country_name','country_id','state_name', 'state_id','city_name','city_id'))->with('data',$find);
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
                    'Iternary'=>'required',
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
        
        
                
                return redirect()->route('admin.tripdetail')->with('success','trip updated Successfully.');
        
              
            }
        
            public function destroygallery($id)
            {
                $user = Package::find($id);
                
                
                   $user->delete();
                  return redirect()->route('admin.tripdetail')->with('danger', ' Trip has been Deleted!');
         
            }      

   public function destination()
    {
       
        $international=DB::table('destinations')
        ->leftJoin('countries','destinations.country', '=', 'countries.country_id')
        
        ->select('destinations.*','countries.country_name')
        ->orderBy('destinations.id', 'desc')->paginate(10);
        $countries = Country::all()->pluck('country_name','id');
        return view('admin.adddestination',compact('countries','international'));   

            }    
            public function state()
            {
                $state = DB::table('add_states')
                ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
                ->leftJoin('states','add_states.state', '=', 'states.state_id')
                ->select('add_states.*','countries.country_name','states.state_name')
        
                ->orderBy('add_states.id', 'desc')->paginate(10);
        
        
                $countries = Country::all()->pluck('country_name','id');
               
        
        
                return view('admin.addstate',compact('countries','state'));   
        
                    }    
                    public function city()
                    {
                       
                               
        $place = DB::table('add_cities')
        ->leftJoin('countries','add_cities.country', '=', 'countries.country_id')
        ->leftJoin('states','add_cities.state', '=', 'states.state_id')
        ->leftJoin('cities','add_cities.city', '=', 'cities.city_id')
        ->select('add_cities.*','cities.city_name','countries.country_name','states.state_name')

        
        
        ->orderBy('add_cities.id', 'desc')->paginate(10);


                        $countries = Country::all()->pluck('country_name','id');
                      
                      
                
                        return view('admin.addcity',compact('countries','place'));   
                
                            }  
                            
                            

 public function Uploadstate(Request $request)
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
        
                $this->validate($request,[

                    'country'=>'required',
                    'state'=>'required',
                    'Explain'=>'required', 
                     'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                     'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
                  
                ]);
        
                if($request->hasfile('Image'))
        
                {


                    $file= $request->file('Image'); 

                    $name = $file->getClientOriginalName();
        
                    $file->move(public_path().'/category/', $name);  
                }
               
        
              
        
               // $addrequest = new TripCategory();
               
               $addrequest = new AddState();
               


               
                 $addrequest->Image =$name;  
                 $addrequest->country =  $request->country;
                 $addrequest->state =  $request->state;
                 $addrequest->Explain =  $request->Explain;
                 $addrequest->slug = $Statename;
                $addrequest->country_state = $country_state;
               //  $addrequest->slug = $Countryname;
                        
                $addrequest->save();
                    // send mail for tour operator
        
                    
                return redirect()->route('admin.statestour')->withInput()->with('success', ' state Added  Successfully ');
          
              
        
        
            }
            public function Uploadcity(Request $request)
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

        
                $this->validate($request,[

                   
                    'country'=>'required',
                    'state'=>'required',
                    'city'=>'required',
                    'Describes'=>'required',
        
          'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                     'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
                  
                ]);
        
                if($request->hasfile('Image'))
        
                {


                    $file= $request->file('Image'); 

                    $name = $file->getClientOriginalName();
        
                    $file->move(public_path().'/category/', $name);  
                }
               
        
              
        
               // $addrequest = new TripCategory();
               
               $addrequest = new AddCity();
               


               
                 $addrequest->Image =$name;  
                 $addrequest->country =  $request->country;
                 $addrequest->state =  $request->state;
                 $addrequest->city =  $request->city;
                 $addrequest->Describes =  $request->Describes;
                 $addrequest->slug = $cityname;
                 $addrequest->country_state_city = $country_state_city;
               //  $addrequest->slug = $Countryname;
                        
                $addrequest->save();
                    // send mail for tour operator
        
                    
                return redirect()->route('admin.citiestour')->withInput()->with('success', ' famous places Added  Successfully ');
          
              
        
        
            }
            public function Uploaddestination(Request $request)
            {
              
                $getCountryName = Country::where('country_id', $request->country)->first();
             
                  if (!empty($getCountryName))
        {
                $Countryname = $getCountryName->country_name; 
        
        }
                $this->validate($request,[

                   
                    'country'=>'required',
                   
                    'Desc'=>'required',
                      'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        
                     'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
                  
                ]);
        
                if($request->hasfile('Image'))
        
                {


                    $file= $request->file('Image'); 

                    $name = $file->getClientOriginalName();
        
                    $file->move(public_path().'/category/', $name);  
                }
               
        
              
        
               // $addrequest = new TripCategory();
               
               $addrequest = new Destination();
               


               
                 $addrequest->Image =$name;  
                 $addrequest->country =  $request->country;
                
                 $addrequest->Desc =  $request->Desc;
                 $addrequest->slug = $Countryname;
               //  $addrequest->slug = $Countryname;
                        
                $addrequest->save();
                    // send mail for tour operator
        
                    
                return redirect()->route('admin.internationaltour')->withInput()->with('success', ' International tour Added  Successfully ');
          
              
        
        
            }
    public function Uploadcategory(Request $request)
    {
      
     //   $getCountryName = Country::where('country_id', $request->country)->first();
     
    //    $Countryname = $getCountryName->country_name; 

        $this->validate($request,[

           
             'category'=>'required',
             'Describe'=>'required',
             'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
             'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
          
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

            
        return redirect()->route('admin.tourcategory')->withInput()->with('success', ' category Added  Successfully ');
    }
    
     public function category()
    {
        $gallery=TripCategory::all();
        return view('admin.tourcategory',compact('gallery'));     
    }
public function international()
    {
       

 $gallery=DB::table('destinations')
        ->leftJoin('countries','destinations.country', '=', 'countries.country_id')
        
        ->select('destinations.*','countries.country_name')
        ->orderBy('destinations.id', 'desc')->paginate(10);
        $countries = Country::all()->pluck('country_name','id');
      
 return view('admin.internationaltour',compact('countries','gallery'));  
         

            } 
            
              public function states()
    {
       


         $gallery = DB::table('add_states')
                ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
                ->leftJoin('states','add_states.state', '=', 'states.state_id')
               
                ->select('add_states.*','countries.country_name','states.state_name')
        
                
                
                ->orderBy('add_states.id', 'desc')->paginate(10);
        
        
                $countries = Country::all()->pluck('country_name','id');
               
        
        
                return view('admin.statestour',compact('countries','gallery')); 

    

            } 
            
            
             public function cities()
    {
       

$place = DB::table('add_cities')
        ->leftJoin('countries','add_cities.country', '=', 'countries.country_id')
        ->leftJoin('states','add_cities.state', '=', 'states.state_id')
        ->leftJoin('cities','add_cities.city', '=', 'cities.city_id')
        ->select('add_cities.*','cities.city_name','countries.country_name','states.state_name')

        
        
        ->orderBy('add_cities.id', 'desc')->paginate(10);


                        $countries = Country::all()->pluck('country_name','id');
                      
                      
                
                        return view('admin.citiestour',compact('countries','place'));  
      

        

            } 
    public function Tripcategory()
    {
       


      $countries = Country::all()->pluck('country_name','id');
      $category=TripCategory::all();


        return view('admin.Tripcategory',compact('countries','category'));   

            }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $countries = DB::table('countries')->get();
      // $states = State::where('states.country_id', $countries)->get();
     // $city = DB::table('cities')->whereIn('cities.state_id', $states)->get();

        return view('admin.operator.create', compact('countries'));
    }
    public function getStates($id){
        $states= State::where('country_id',$id)->pluck('state_name','id');
        return json_encode($states);
    }
public function getCities($id){
        $cities= City::where('state_id',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->email;
        $email = User::where('email',$data)->first();
        if($email){
           return redirect()->back()->with('success', 'Email is already exists.');
        }
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'Phoneno' => 'required',
            'experience' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->Phoneno =  $request->Phoneno;
       
        $user->password =   Hash::make($request->password);
        $user->Experience = $request->experience;
        $user->Country =  $request->country;
        $user->State =  $request->state;
        $user->City =  $request->city;
        $user->role_id = "2";
     
        $user->save();
            // send mail for tour operator

        return redirect()->route('admin.operator.index')->with('success', ' operator Added Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operators = DB::table('users')
        ->leftJoin('countries','users.Country', '=', 'countries.country_id')
        ->leftJoin('states','users.state', '=', 'states.state_id')
        ->leftJoin('cities','users.city', '=', 'cities.city_id')
        ->select('users.*','cities.city_name','countries.country_name','states.state_name','users.name')
        ->where('users.id', $id)
        ->first();       
        return view('admin.operator.show', compact('operators'));
    }
    public function changepassword($id){
        $users = User::find($id);
      return view('admin.adminchangepassword',compact('users'));
    }

    public function changePasswordUpdate(Request $request ,$id)
    {

     $request->validate([

        'password'=> 'required'

     ]);
     $user = Auth::user();
     $user->password = bcrypt($request->get('password'));
     $user->save();
     return back()->with('success','Password changed Successfully');
    }


    public function welcome_fetch_data(Request $request){
        if($request->ajax())
        {
            $manual_filter = $request->get('manual_filter_table');
        //    return $manual_filter;
              $manual_filter_tablesm = $request->get('manual_filter_tablesm');
            $mfiltersm = str_replace("","%",$manual_filter_tablesm);
            if($manual_filter != null){
            $users = DB::table('users')
                    ->where('role_id',2)
                    ->join('countries','users.country', '=', 'countries.country_id')
                    ->join('states','users.state', '=', 'states.state_id')
                    ->join('cities','users.city', '=', 'cities.city_id')
                    ->where(function ($query) use ($manual_filter) {
              
                        $query->Where('users.country', $manual_filter)
                        ->orWhere('users.state', $manual_filter)
                 ->orWhere('users.city', $manual_filter);  
                    })
                
                ->orderBy('users.id', 'DESC')
                ->paginate(10);
                // return $users;
                } 
                else{
            $users = DB::table('users')
                    ->where('role_id',2)
                    ->leftJoin('countries','users.country', '=', 'countries.country_id')
                    ->leftJoin('states','users.state', '=', 'states.state_id')
                    ->leftJoin('cities','users.city', '=', 'cities.city_id')
                    ->where(function ($query) use ($mfiltersm) {
              
                    $query->where('users.name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('users.email', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
                    ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%');   
                })
                ->orderBy('users.id', 'DESC')
                ->paginate(10);
            }
                      return view('admin.operator.paginated_data', compact('users'))->render(); 
                 }
    }


/*    public function welcome_fetch_data(Request $request){
        if($request->ajax()){

          
            $manual_filter = $request->get('manual_filter_tablesm');
            $mfilter = str_replace("","%",$manual_filter);
           
            $users =  User::where('role_id', '2')
            ->leftJoin('countries','users.Country', '=','countries.country_id')
            ->leftJoin('cities','users.City', '=','cities.city_id')
            ->leftJoin('states','users.State', '=','states.state_id')

            ->where(function ($query) use ($mfilter) {
              
                    $query->where('users.name', 'like', '%'.$mfilter.'%')
                    ->orWhere('users.email', 'like', '%'.$mfilter.'%')
            ->orWhere('countries.country_name', 'like', '%'.$mfilter.'%')
            ->orWhere('states.state_name', 'like', '%'.$mfilter.'%')
            ->orWhere('cities.city_name', 'like', '%'.$mfilter.'%');   
                })
            
            
            //  ->orwhere(function ($query) use ($mfilter) {
            // })
            ->orderBy('users.id', 'DESC')
            ->paginate(30);
          
            return view('admin.operator.paginated_data', compact('users'))->render();
        }
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
       public function showcategory($id)
    {
        $category = DB::table('trip_categories')
               ->where('trip_categories.id', $id)
        ->first();    
                  
        return view('admin.showcategory', compact('category'));
    }
	
	 public function editcategory($id)
    {
        $find = Tripcategory::find($id); 
                
        return view('admin.editcategory')->with('data',$find);
    }
   public function updatecategory(Request $request, $id)
    {
        $image_name = $request->hidden_image;
                  $image = $request->file('Image');
                       if($image != '')  // here is the if part when you dont want to update the image required
                                        {
                               $request->validate([ 
                                                'category'     =>  'required',
                                                'Describe'     =>  'required',
                                            ]);
                                
                                            $image_name = rand() . '.' . $image->getClientOriginalExtension();
                                            $image->move(public_path().'/category/', $image_name); 
                                        }
                                        else  // this is the else part when you dont want to update the image not required
                                        {
                                            $request->validate([
                                               
                                                'category'     =>  'required',
                                                'Describe'     =>  'required',  
                                            ]);
                                        }
                                
                                        $input_data = array(
                                            
                                            'Describe'        =>       $request->Describe,
                                            'category'        =>       $request->category,
                                            'Image'            =>   $image_name
                                        );
                                  
                                        TripCategory::whereId($id)->update($input_data);
                                
                                        return redirect()->route('admin.tourcategory')->withInput()->with('success', ' category updated  Successfully ');
                          
                                
        




        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycategory($id)
    {
        
        $category = TripCategory::find($id);
       
        $category->delete();
        return redirect()->route('admin.tourcategory')->with('danger', 'category has been Deleted!');
 

    }


    public function showinternational($id)
    {
        $international = DB::table('destinations')
        ->leftJoin('countries','destinations.country', '=', 'countries.country_id')
              ->select('destinations.*','countries.country_name')
                       ->where('destinations.id', $id)
        ->first();    
                  
        return view('admin.showcountry', compact('international'));
     

        
    }
	
	 public function editinternational($id)
    {
      
        $find = Destination::find($id); 
        $country_id = $find->country;    
        $country = Country::where("country_id" , $country_id)->first();
        if($find->country == 'country')
        {
 
         $country_name = 'country'; 
         
 
        }
        else{
        $country_name = $country->country_name;    
         } 
        
  return view('admin.editcountry',compact('id' ,'country_name','country_id'))->with('data',$find);
      
        
    }

	


   public function updateinternational(Request $request, $id)
    {
        $image_name = $request->hidden_image;
                  $image = $request->file('Image');
                  $getCountryName = Country::where('country_id', $request->country)->first();
             
              if (!empty($getCountryName))
        {
                $Countryname = $getCountryName->country_name; 
                
        }
                       if($image != '')  // here is the if part when you dont want to update the image required
                                        {
                               $request->validate([
                                                
                                                'country'     =>  'required',
                                                'desc'     =>  'required',
                                                
                                            ]);
                                
                                            $image_name = rand() . '.' . $image->getClientOriginalExtension();
                                            $image->move(public_path().'/category/', $image_name); 
                                        }
                                        else  // this is the else part when you dont want to update the image not required
                                        {
                                            $request->validate([
                                               
                                                'country'     =>  'required',
                                                'desc'     =>  'required',
                                               
                                                
                                            ]);
                                        }
                                
                                        $input_data = array(
                                            
                                            'desc'        =>       $request->desc,
                                            'country'        =>       $request->country,
                                            'Image'            =>   $image_name,
                                           'slug' => $Countryname
                                        );
                                  
                                        Destination::whereId($id)->update($input_data);
                                
                                        return redirect()->route('admin.internationaltour')->withInput()->with('success', ' international tour has been updated  Successfully '); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyinternational($id)
    {
        
        $category = Destination::find($id);
       
        $category->delete();
        return redirect()->back()->with('danger', 'international tour has been Deleted!');
    }
    public function showstate($id)
    {
        $state = DB::table('add_states')
        ->leftJoin('countries','add_states.country', '=', 'countries.country_id')
        ->leftJoin('states','add_states.state', '=', 'states.state_id')
        ->select('add_states.*','countries.country_name','states.state_name')
        ->where('add_states.id', $id)
        ->first();    
                  
        return view('admin.showstate', compact('state'));
    }
	
	 public function editstate($id)
    {
      
        $find = AddState::find($id); 
        $country_id = $find->country;    
        $country = Country::where("country_id" , $country_id)->first();
        if($find->country == 'country')
        {
 
         $country_name = 'country'; 
         
 
        }
        else{
        $country_name = $country->country_name;    
         } 
        
        $state_id = $find->state;
        $state = State::where('state_id',$state_id)->first();
    
        if($find->state == 'state')
        {
 
         $state_name = 'state'; 
         
        }
        else{
         $state_name = $state->state_name;   
               } 
        
                   
  return view('admin.editstate',compact('id' ,'country_name','country_id','state_name', 'state_id'))->with('data',$find);   
    }

	


   public function updatestate(Request $request, $id)
    {
        $image_name = $request->hidden_image;
                  $image = $request->file('Image');
                  
                  
               
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
                       if($image != '')  // here is the if part when you dont want to update the image required
                                        {
                               $request->validate([
                                                
                                                'country'     =>  'required',
                                                'state'     =>  'required',
                                                'Explain'     =>  'required',
                                               
                                            ]);
                                
                                            $image_name = rand() . '.' . $image->getClientOriginalExtension();
                                            $image->move(public_path().'/category/', $image_name); 
                                        }
                                        else  // this is the else part when you dont want to update the image not required
                                        {
                                            $request->validate([
                                               
                                                'country'     =>  'required',
                                                'state'     =>  'required',
                                                'Explain'     =>  'required',
                                               
                                                
                                            ]);
                                        }
                                
                                        $input_data = array(
                                            
                                            'Explain'   =>   $request->Explain,
                                            'country'     =>    $request->country,
                                            'state'   =>  $request->state,
                                             'country_state' => $country_state,
                                            'Image'            =>   $image_name,
                                            'slug' => $Statename
                                        );
                                  
                                        AddState::whereId($id)->update($input_data);
                                
                                        return redirect()->route('admin.statestour')->withInput()->with('success', ' updated  Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroystate($id)
    {
        $category = AddState::find($id);
        $category->delete();
        return redirect()->route('admin.statestour')->with('danger', 'state has been Deleted!');
    }
    public function showcity($id)
    {
        $city = DB::table('add_cities')
        ->leftJoin('countries','add_cities.country', '=', 'countries.country_id')
        ->leftJoin('states','add_cities.state', '=', 'states.state_id')
        ->leftJoin('cities','add_cities.city', '=', 'cities.city_id')
        ->select('add_cities.*','cities.city_name','countries.country_name','states.state_name')
          ->where('add_cities.id', $id)
        ->first();    
                  
        return view('admin.showcity', compact('city'));
    }
	
	 public function editcity($id)
    {
        $find = AddCity::find($id);  
        $country_id = $find->country;    
        $country = Country::where("country_id" , $country_id)->first();
        if($find->country == 'country')
        {
         $country_name = 'country'; 
        }
        else{
        $country_name = $country->country_name;    
         } 
        $state_id = $find->state;
        $state = State::where('state_id',$state_id)->first();
    
        if($find->state == 'state')
        {
 
         $state_name = 'state'; 
         
 
        }
        else{
         $state_name = $state->state_name;   
               } 
        $city_id = $find->city;
        $city = City::where('city_id',$city_id)->first();
 
        if($find->city == 'city')
        {
 
         $city_name = 'city'; 
         
 
        }
        else{
         $city_name = $city->city_name;  
               } 
              
        
  return view('admin.editcity',compact('id' ,'country_name','country_id','state_name', 'state_id','city_name','city_id'))->with('data',$find);   
    }
   public function updatecity(Request $request, $id)
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
        $image_name = $request->hidden_image;
        $image = $request->file('Image');
             if($image != '')  // here is the if part when you dont want to update the image required
                              {
                     $request->validate([
                                      
                                      'country'     =>  'required',
                                      'state'     =>  'required',
                                      'city'     =>  'required',
                                      'Describes'     =>  'required',
                                      
                                  ]);
                      
                                  $image_name = rand() . '.' . $image->getClientOriginalExtension();
                                  $image->move(public_path().'/category/', $image_name); 
                              }
                              else  // this is the else part when you dont want to update the image not required
                              {
                                  $request->validate([
                                     
                                      'country'     =>  'required',
                                      'state'     =>  'required',
                                      'city'     =>  'required',
                                      'Describes'     =>  'required',
                                     
                                      
                                  ]);
                              }
                      
                              $input_data = array(
                                  
                                  'Describes'        =>       $request->Describes,
                                  'country'        =>       $request->country,
                                  'state'     =>  $request->state,
                                   'city'     =>  $request->city,
                                  'Image'            =>   $image_name,
                                  'slug' => $cityname,
                                   'country_state_city' => $country_state_city,
                              );
                        
                              AddCity::whereId($id)->update($input_data);
                      
                              return redirect()->route('admin.citiestour')->withInput()->with('success', ' updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycity($id)
    {
        
        $category = AddCity::find($id);
       
        $category->delete();
        return redirect()->route('admin.citiestour')->with('danger', 'places has been Deleted!');
    }


    public function edit($id)
    {
      //  $users = User::where('id',  '=', $id)->orderBy('id', 'desc')->first()
       //->paginate(5);
       $find = User::find($id);
    //    return $find;
       $country_id = $find->Country;   
    //    return $country_id;
       $country = Country::where("country_id" , $country_id)->first();
    //    return $country;
       if($find->Country == 'country')
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
     return view('admin.operator.edit',compact('id' ,'country_name','country_id','state_name', 'state_id','city_name','city_id'))->with('data',$find);
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
        $this->validate($request,[
            'name' => 'required',
           
            'Phoneno' => 'required',
            'experience' => 'required'
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

        return redirect()->route('admin.operator.index')->with('success', ' operator update Successfully ');
  
                
    }
    public function welcome_category(Request $request){

        if($request->ajax()){
            $category_filter = $request->get('filter_category');
            
            $gallery =DB::table('trip_categories')
           
          
            // ->join('cities','Packages.city', '=','cities.city_id')
            ->where(function ($query) use ($category_filter) {
            if($category_filter != "all"){
                $query->where('trip_categories.category',$category_filter);
                }
            })
           
            ->orderBy('trip_categories.id','desc')->paginate(30);
 
            
            return view('admin.paginations1_data', compact('gallery'))->render();
        }
    }
    public function welcome_state(Request $request){

        if($request->ajax()){
            $state_filter = $request->get('filter_state');
            // return $state_filter;
            $gallery =DB::table('add_states')
           
          
            // ->join('cities','Packages.city', '=','cities.city_id')
            ->where(function ($query) use ($state_filter) {
            if($state_filter != "all"){
                $query->where('add_states.slug',$state_filter);
                }
            })
           
            ->orderBy('add_states.id','desc')->paginate(30);
 
            
           return view('admin.paginations3_data', compact('gallery'))->render();
        }
    }
    // public function welcome_state(Request $request){

    //     if($request->ajax()){
    //         $state_filter = $request->get('filter_state');
    //         // return $state_filter;
    //             $gallery = DB::table('add_states')
				
    //                 // ->join('cities','Packages.city', '=','cities.city_id')
    //         ->where(function ($query) use ($state_filter) {
    //         if($state_filter != "all"){
    //             $query->where('add_states.slug',$state_filter);
    //             }
    //         })
    //         ->orderBy('add_states.id','desc')->paginate(30);
    //       return view('admin.paginations3_data', compact('gallery'))->render();
    //     }
    // }

    // if($request->ajax()){
    //     $manual_filter = $request->get('category_state');
    //     //return $manual_filter;
    //     $gallery =DB::table('add_states')
       
    //     ->where('add_states.slug',$manual_filter)
    //     // ->join('cities','Packages.city', '=','cities.city_id')
    //     // ->where(function ($query) use ($manual_filter) {
    //     // if($manual_filter != "all"){
    //     //     $query->where('add_states.slug',$manual_filter);
    //     //     }
    //     // })
       
    //     ->orderBy('add_states.id','desc')->paginate(30);

    // function welcome_state(Request $request){
    //     if($request->ajax()){
    //         $manual_filter = $request->get('category_state');
    //         //return("manual_filter");
    //         //   $manual_filter_tablesm = $request->get('manual_filter_tablesm');
            
    //         // $mfiltersm = str_replace("","%",$manual_filter_tablesm);
    //         if($manual_filter != null){  
    //             $gallery = DB::table('add_states')
                
    //                 ->Where('add_states.slug', $manual_filter) 
    //                 // ->orWhere('cruds.email', $manual_filter)
    //                ->orderBy('add_states.id', 'DESC')
    //                ->paginate(5); 
    //           }   
    //         //   else{
    //         //         $data = DB::table('cruds')
    //         //  ->Where('cruds.first_name', 'like', '%'.$mfiltersm.'%') 
    //         //  ->orWhere('cruds.last_name', 'like', '%'.$mfiltersm.'%') 
    //         //  ->orWhere('cruds.email', 'like', '%'.$mfiltersm.'%') 
    //         //  ->orWhere('cruds.class', 'like', '%'.$mfiltersm.'%') 
    //         //  ->orWhere('cruds.roll', 'like', '%'.$mfiltersm.'%') 
    //         //     ->orderBy('cruds.id', 'DESC')
    //         //     ->paginate(5); 
    //         //   }   
    //           return view('admin.paginations3_data', compact('gallery'))->render();        
    //      }
    // }

    public function welcome_country(Request $request){
       
        if($request->ajax()){
            $country_filter = $request->get('filter_country');
            $gallery =DB::table('destinations')
           
        
            // ->join('cities','Packages.city', '=','cities.city_id')
            ->where(function ($query) use ($country_filter) {
            if($country_filter != "all"){
                $query->where('destinations.slug',$country_filter);
                }
            })
           
            ->orderBy('destinations.id','desc')->paginate(30);
 
         return view('admin.paginations2_data', compact('gallery'))->render();
        }
    }
    // function welcome_category(Request $request){
    //     if($request->ajax()){
    //         $category_filter = $request->get('filter_category');
              
    //         if($category_filter != null){  
    //             $category = DB::table('trip_categories')
    //                 ->Where('trip_categories.category', $category) 
    //                ->orderBy('trip_categories.id', 'DESC')
    //                ->paginate(5); 
    //                }  
                   
    //           return view('admin.paginations1_data', compact('category'))->render();       
    //      }
    // }

    // public function welcome_category(Request $request){

    //     if($request->ajax()){
    //         $category_filter = $request->get('filter_category');
          
    //         $category =DB::table('trip_categories')
           
          
    //         // ->join('cities','Packages.city', '=','cities.city_id')
    //         ->where("trip_categories.category" , $category_filter)
    //      /*   ->where(function ($query) use ($category_filter) {
    //         if($category_filter != "all"){
    //             $query->where('trip_categories.category',$category_filter);
    //             }
    //         })*/
            
    //         ->orderBy('trip_categories.id','desc');
    //         return $category;

    //         return view('admin.paginations1_data', compact('category'))->render();
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        
        $user = User::find($id);
        $provider = SocialProvider::where('user_id',$id);
        $provider->delete();
        $user->delete();
        return redirect()->route('admin.operator.index')->with('danger', 'operator access has been Deleted!');
 

    }
}