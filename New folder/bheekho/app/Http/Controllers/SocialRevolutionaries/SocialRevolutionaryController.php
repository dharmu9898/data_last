<?php
namespace App\Http\Controllers\SocialRevolutionaries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\State;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Log;
use App\Requesthelp;
use Brian2694\Toastr\Facades\Toastr;


class SocialRevolutionaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
       
        Log::info("you are in social_revolutionaries Controller index function");
        if(auth::user()->phone == NULL ){
           
            return view('socialrevolutionaries.form');
        } else {
          $socialrevolutionaries = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                        ->orderBy('requesthelps.request_id','desc')
                        ->paginate(30);
           Log::info($socialrevolutionaries);
       return view('socialrevolutionaries.dashboard',compact('socialrevolutionaries'));
          
          
        }


   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleid($id)
    {        
        $user = User::find($id);
        $user->role_id = '2';
        $user->save();
        return redirect()->route('socialrevolutionaries.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addrequest()
    {
        return view('socialrevolutionaries.addrequest');
    }

    public function addnewrequest(Request $request)
    {
        $this->validate($request, [
            'concern'=>'required',
            'message'=>'required',                       
             ]);
        Log::info('you are in addrequestupdate function');
        $addrequest = new Requesthelp();
        $addrequest->user_id = auth::user()->id;
        $addrequest->concern = $request->get('concern');
        $addrequest->message = $request->get('message');
        $addrequest->country = $request->get('country');
        $addrequest->state = $request->get('state');
        $addrequest->city = $request->get('city');
        $addrequest->save();
        Log::info('in request function');
        Log::info($addrequest);
        
        return redirect()->route('socialrevolutionaries.dashboard')->with('success','Request Added Successfully.');


    }

    public function myrequest()
    {
        $socialrevolutionaries = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                        ->where('requesthelps.user_id', '=', Auth::user()->id)
                        ->paginate(30);
        return view('socialrevolutionaries.myrequests',compact('socialrevolutionaries'));
        Log::info('In socialrevolutionaries My Request data');
        Log::info($socialrevolutionaries);
        // return $socialrevolutionaries;                       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialrevolutionaries = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                         ->where('requesthelps.request_id', $id)
                        ->first();

        return view('socialrevolutionaries.show', compact('socialrevolutionaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social_revolutionaries = User::find($id);
        $city_id = $social_revolutionaries->city;    
         $city = City::where('city_id',$city_id)->first();
        
        $country_id = $social_revolutionaries->country;    
        $country = Country::where("country_id",$country_id)->first();

        $state_id = $social_revolutionaries->state;    
        $state = State::where("state_id" , $state_id)->first();
        return view('socialrevolutionaries.profileupdate', compact('social_revolutionaries', 'id' ,'city','country','state'));
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
          $this->validate($request, [
            'phone'=>'required|max:16',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            // 'contribution'=>'required',            
             ]);
        
        $social_revolutionaries = User::find($id);
        $social_revolutionaries->phone = $request->get('phone');
        $social_revolutionaries->country = $request->get('country');
        $social_revolutionaries->state = $request->get('state');
        $social_revolutionaries->city = $request->get('city');
        // $social_revolutionaries->contribution = $request->get('contribution');        
        $social_revolutionaries->save();
        return redirect()->route('socialrevolutionaries.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialrevolutionaries = DB::table('requesthelps')->where('request_id', $id)->delete();
         return redirect()->back()->with('success', 'Request Deleted Successfully.');
    }

    public function profileupdate(Request $request, $id)
    {
        $this->validate($request, [
            "name"=>"required|max:35",            
            'phone'=>'required|max:16',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',                       
             ]);
        
        $social_revolutionaries = User::find($id);
        $social_revolutionaries->name = $request->get('name');
        $social_revolutionaries->phone = $request->get('phone');
        $social_revolutionaries->country = $request->get('country');
        $social_revolutionaries->state = $request->get('state');
        $social_revolutionaries->city = $request->get('city');
             
        $social_revolutionaries->save();
        return redirect()->route('socialrevolutionaries.dashboard')->with('success', 'Profile Updated Successfully.');
    }

       

        function fetch_concern_data(Request $request){
            if($request->ajax()){
                $manual_filter = $request->get('manual_filter_table');
                  $manual_filter_tablesm = $request->get('manual_filter_tablesm');

                $mfilter = str_replace("","%",$manual_filter);
                $mfiltersm = str_replace("","%",$manual_filter_tablesm);
                if($mfiltersm != null){

                $socialrevolutionaries = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                       ->where('users.name', 'like', '%'.$mfiltersm.'%')
                     ->orWhere('requesthelps.concern', 'like', '%'.$mfiltersm.'%')                
                ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
                ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
                ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%')                
                ->select('users.name', 'countries.country_name', 'states.state_name', 'cities.city_name', 'requesthelps.*')               
                ->orderBy('requesthelps.request_id', 'DESC')
                ->paginate(30); 
            }  elseif($mfilter != null){            

                $socialrevolutionaries = DB::table('requesthelps')
                        ->join('users', 'requesthelps.user_id', '=', 'users.id')
                        ->join('countries','requesthelps.country', '=', 'countries.country_id')
                        ->join('states','requesthelps.state', '=', 'states.state_id')
                        ->join('cities','requesthelps.city', '=', 'cities.city_id')
                        ->where('users.name', 'like', '%'.$mfilter.'%')
                     ->orWhere('requesthelps.concern', 'like', '%'.$mfilter.'%') 
                     ->orWhere('countries.country_name', 'like', '%'.$mfilter.'%')
                     ->orWhere('states.state_name', 'like', '%'.$mfilter.'%')
                     ->orWhere('cities.city_name', 'like', '%'.$mfilter.'%')  
                     ->select('users.name', 'countries.country_name', 'states.state_name', 'cities.city_name', 'requesthelps.*')               
                    ->orderBy('requesthelps.request_id', 'DESC')
                    ->paginate(30); 
                    }   
                    else{
                         $socialrevolutionaries = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                        ->orderBy('requesthelps.request_id','desc')
                        ->paginate(30);
                    }                                 

                return view('socialrevolutionaries.paginated_data', compact('socialrevolutionaries'))->render();
            }
        }
        
            
        
        
}
