<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Requesthelp;

class AdminRequestController extends Controller
{
    public function __construct()
          {
             $this->middleware('auth');
          }


    public function index()
    {
        $allrequests = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                        ->orderBy('requesthelps.request_id','desc')
                        ->paginate(30);
        return view('admin.request.index', compact('allrequests'));
        
    }

    public function show($id)
    {
        $allrequests = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                         ->where('requesthelps.request_id', $id)
                        ->first();

        return view('admin.request.show', compact('allrequests'));
    }

    public function destroy($id)
    {       
       $allrequests = DB::table('requesthelps')->where('request_id', $id)->delete();        
        return redirect()->back()->with('success', 'Request Deleted Successfully.');
    }

    function fetch_concern_data(Request $request){
            if($request->ajax()){
                $manual_filter = $request->get('manual_filter_table');
                  $manual_filter_tablesm = $request->get('manual_filter_tablesm');

                $mfilter = str_replace("","%",$manual_filter);
                $mfiltersm = str_replace("","%",$manual_filter_tablesm);
                if($mfiltersm != null){

                $allrequests = DB::table('requesthelps')
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

                $allrequests = DB::table('requesthelps')
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
                         $allrequests = DB::table('requesthelps')
                        ->leftJoin('users', 'requesthelps.user_id', '=', 'users.id')
                        ->leftJoin('countries','requesthelps.country', '=', 'countries.country_id')
                        ->leftJoin('states','requesthelps.state', '=', 'states.state_id')
                        ->leftJoin('cities','requesthelps.city', '=', 'cities.city_id')
                        ->orderBy('requesthelps.request_id','desc')
                        ->paginate(30);
                    }  

                    return view('admin.request.paginated_data', compact('allrequests'))->render();        
                 }
            }
}
