<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\State;
use App\User;
use App\SocialProvider;
use Illuminate\Support\Facades\Log;
use DB;



class AdminSMController extends Controller
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
                
       $socialmembers = User::where('role_id', 3)
                            ->leftJoin('countries','users.country', '=', 'countries.country_id')
                            ->leftJoin('states','users.state', '=', 'states.state_id')
                            ->leftJoin('cities','users.city', '=', 'cities.city_id')
                            ->paginate(30);
         return view('admin.socialmembers.index', compact('socialmembers'));

                
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showsm($id)
    {
        $socialmembers = DB::table('users')
                         ->leftJoin('countries','users.country', '=', 'countries.country_id')
                        ->leftJoin('states','users.state', '=', 'states.state_id')
                        ->leftJoin('cities','users.city', '=', 'cities.city_id')
                        ->where('users.id', $id)
                        ->first();
        return view('admin.socialmembers.show', compact('socialmembers'));
                        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroysm($id)
    {
        $socialmembers =DB::table('users')
                    ->leftJoin('social_providers','users.id', '=','social_providers.user_id')
                     ->leftJoin('requesthelps','users.id', '=','requesthelps.user_id')
                    ->where('users.id', $id); 
        DB::table('social_providers')->where('user_id', $id)->delete();
        DB::table('requesthelps')->where('user_id', $id)->delete();
        $socialmembers->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully.');
    }

    function fetch_concern_data(Request $request){
            if($request->ajax()){                
                  $manual_filter_tablesm = $request->get('manual_filter_tablesm');
                $mfiltersm = str_replace("","%",$manual_filter_tablesm);
                if($mfiltersm != null){

                $socialmembers = User::where('role_id', 3)
                        ->leftJoin('countries','users.country', '=', 'countries.country_id')
                            ->leftJoin('states','users.state', '=', 'states.state_id')
                            ->leftJoin('cities','users.city', '=', 'cities.city_id')
                       ->where('users.name', 'like', '%'.$mfiltersm.'%')
                ->orWhere('countries.country_name', 'like', '%'.$mfiltersm.'%')
                ->orWhere('states.state_name', 'like', '%'.$mfiltersm.'%')
                ->orWhere('cities.city_name', 'like', '%'.$mfiltersm.'%')
                ->select('users.name', 'countries.country_name', 'states.state_name', 'cities.city_name')               
                ->orderBy('users.id', 'DESC')
                ->paginate(30); 
            }  else{
                        $socialmembers = User::where('role_id', 3)
                            ->leftJoin('countries','users.country', '=', 'countries.country_id')
                            ->leftJoin('states','users.state', '=', 'states.state_id')
                            ->leftJoin('cities','users.city', '=', 'cities.city_id')
                            ->orderBy('users.id', 'DESC')
                            ->paginate(30);
                    }  

                    return view('admin.socialmembers.paginated_data', compact('socialmembers'))->render();        
                 }
            }

}







