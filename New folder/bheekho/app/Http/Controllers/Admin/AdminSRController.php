<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\State;
use App\User;
use Illuminate\Support\Facades\Log;
use DB;


class AdminSRController extends Controller
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
        $social_revolutionaries = User::where('role_id',2)
                            ->leftJoin('countries','users.country', '=', 'countries.country_id')
                            ->leftJoin('states','users.state', '=', 'states.state_id')
                            ->leftJoin('cities','users.city', '=', 'cities.city_id')    
                            ->paginate(10);
        return view('admin.socialrevolutionaries.index', compact('social_revolutionaries'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
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
     public function showsr($id)
    {
        $social_revolutionaries = DB::table('users')
                         ->leftJoin('countries','users.country', '=', 'countries.country_id')
                        ->leftJoin('states','users.state', '=', 'states.state_id')
                        ->leftJoin('cities','users.city', '=', 'cities.city_id')
                        ->where('users.id', $id)
                        ->first();

    return view('admin.socialrevolutionaries.show', compact('social_revolutionaries'));
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
    public function destroysr($id)
    {       
        $data =DB::table('users')
                    ->leftJoin('social_providers','users.id', '=','social_providers.user_id')
                    ->where('users.id', $id); 
        DB::table('social_providers')->where('user_id', $id)->delete();
        DB::table('requesthelps')->where('user_id', $id)->delete();                           
        $data->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully.');
    }
}
