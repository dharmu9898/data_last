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

class CategoryController extends Controller
{
    

    public function index()
    {


       
    }



    public function showcategory($name)
    {
        

       
                        
               
                     
                    
                        
               
        


        $category = str_replace('-',' ',$name); 

        $city= Package::where('Category',$category)->pluck('slug');
        $cit= City::whereIn('city_name',$city)->pluck('city_id');

        $cities= DB::table('cities')->whereIn('cities.city_id',$cit)->get();               
         
                 

        $gallery = DB::table('packages')
        ->leftJoin('users', 'packages.id', '=', 'users.id')
        ->leftJoin('countries','packages.country', '=', 'countries.country_id')
        ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
       ->leftJoin('states','packages.state', '=', 'states.state_id')
      ->leftJoin('cities','packages.city', '=', 'cities.city_id')
      ->select('packages.*','trip_categories.Describe','countries.country_name','states.state_name','cities.city_name','users.name')
      ->where('packages.Category', $category)
      ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
                     
           })  
      ->orderBy('packages.id', 'desc')
      ->paginate(10);

      $galliries = DB::table('packages')
      ->leftJoin('users', 'packages.id', '=', 'users.id')
      ->leftJoin('countries','packages.country', '=', 'countries.country_id')
      ->leftJoin('trip_categories','packages.Category', '=', 'trip_categories.category')              
     ->leftJoin('states','packages.state', '=', 'states.state_id')
    ->leftJoin('cities','packages.city', '=', 'cities.city_id')
    ->select('packages.NoOfDays','trip_categories.Image','countries.country_name','states.state_name','cities.city_name','users.name')
    ->where('packages.Category', $category)
    ->where(function ($query) {
               $query->where('Permission', '=', 'yes');
                     
           })  
    ->orderBy('packages.id', 'desc')
    ->paginate(10);


  return view('showcategory', compact('gallery','galliries','cities')); 
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
      
      
        


        if($request->ajax()){
            $manual_filter = $request->get('manual_filter_tablesm');
            $mfilter = str_replace("","%",$manual_filter);
              $cat_id = $request->get('CatId');
            $gallery = DB::table('packages')
           
            ->leftjoin('countries','packages.country', '=','countries.country_id')
            ->leftjoin('cities','packages.city', '=','cities.city_id')
            ->leftjoin('states','packages.state', '=','states.state_id')
             ->where('packages.Category', $cat_id)
          
            ->where(function ($query) use ($mfilter) {
                      
                $query->where('packages.TripTitle', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.datetime', 'like', '%'.$mfilter.'%')
                ->orWhere('packages.Category', 'like', '%'.$mfilter.'%')
      
        ->orWhere('cities.city_name', 'like', '%'.$mfilter.'%')  
        ->orWhere('packages.time', 'like', '%'.$mfilter.'%')
        ->orWhere('packages.Destination', 'like', '%'.$mfilter.'%');
       
            })
            ->orderBy('packages.id', 'DESC')
            ->paginate(10);
                  }
            return view('category', compact('gallery'))->render();
        
        
    }



    public function welcome_fetch_statecity(Request $request){
      
           

        if($request->ajax()){
            $filter_country = $request->get('filter_city');
                $cat_id = $request->get('CatId');
            $gallery =DB::table('packages')
            ->join('countries','packages.country', '=','countries.country_id')
            
            ->join('states','packages.state', '=','states.state_id')
            ->join('cities','packages.city', '=','cities.city_id')
              ->where('packages.Category', $cat_id)
            ->where(function ($query) use ($filter_country) {
            if($filter_country != "all"){
                $query->where('packages.city',$filter_country);
                }
            })
            ->orderBy('packages.id','desc')->paginate(10);
            return view('category', compact('gallery'))->render();
        
        }
    }









}
