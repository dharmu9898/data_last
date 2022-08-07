<?php

namespace App\Http\Controllers\TourOperator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\City;
use App\Country;
use App\State;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Log;
use App\Package;
use App\Rvsp;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $states = State::where('states.country_id','101')->get();
        $city = DB::table('cities')->whereIn('cities.state_id', $states)->get();

        return view('touroperator.gallery.addgallery',compact('states','city'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getCityName = City::where('city_id', $request->city)->first();
     
        $cityname = $getCityName->city_name; 


        $this->validate($request,[
            'TripTitle'=>'required',            
            'NoOfDays'=>'required',
            'Description'=>'required',
            'Destination'=>'required',
            'Keyword'=>'required',
        
             'datetime'=>'required',
             'Image' => 'required',

             'Image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
          
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
         $addrequest->TripTitle =  $request->TripTitle;
         $addrequest->NoOfDays =  $request->NoOfDays;
         $addrequest->Description =  $request->Description;
         $addrequest->Destination =  $request->Destination;
         $addrequest->Keyword= $request->Keyword;

         $addrequest->Image= json_encode($data);

         $addrequest->datetime =  $request->datetime;
         $addrequest->country =  $request->country;
         $addrequest->state =  $request->state;
         $addrequest->city =  $request->city;
   
         $addrequest->slug = $cityname;
   
                
        $addrequest->save();
            // send mail for tour operator

            
        return redirect()->route('touroperator.gallery.index')->with('success', ' operator Added gallery Successfully ');
  
      


    }

    
    
   
    public function show($id)
    {
       

       
      

          
            $gallery = DB::table('packages')
                              ->leftJoin('users', 'packages.id', '=', 'users.id')
                             ->leftJoin('states','packages.state', '=', 'states.state_id')
                            ->leftJoin('cities','packages.city', '=', 'cities.city_id')
                            ->select('packages.*','cities.city_name','users.name')
                            ->where('packages.id', $id)
                            ->first();
    
                      
         return view('touroperator.gallery.showgallery', compact('gallery')); 
      
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Package::find($id);


        $states = State::where('states.country_id','101')->get();
        $cities = DB::table('cities')->whereIn('cities.state_id', $states)->get();

        $state_id = $find->state;    
        $state = State::where("state_id" , $state_id)->first();
      
        $city_id = $find->city;    
         $city = City::where('city_id',$city_id)->first();
        return view('touroperator.gallery.editgallery',compact('id' ,'city','state','states','cities'))->with('data',$find);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = Package::find($id);
        
        
           $user->delete();
          return redirect()->route('touroperator.gallery.index')->with('danger', 'operator access has been Deleted!');
 
    }
    public function update(Request $request, $id)
    {



        $this->validate($request,[
            'TripTitle'=>'required',            
            'NoOfDays'=>'required',
            'Description'=>'required',
            'Destination'=>'required',
            'Keyword'=>'required',
        
             'datetime'=>'required',
             'Image' => 'required',

             'Image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        if($request->hasfile('Image'))

        {

           foreach($request->file('Image') as $file)

           {

               $name = time().'.'.$file->extension();

               $file->move(public_path().'/image/', $name);  

               $data[] = $name;  

           }

        }



               
     



        $addrequest = Package::find($id);
         $addrequest->user_id = auth::user()->id;
         $addrequest->TripTitle =  $request->TripTitle;
         $addrequest->NoOfDays =  $request->NoOfDays;
         $addrequest->Description =  $request->Description;
         $addrequest->Destination =  $request->Destination;
         $addrequest->Keyword= $request->Keyword;

         $addrequest->Image= json_encode($data);

         $addrequest->datetime =  $request->datetime;
         $addrequest->country =  $request->country;
         $addrequest->state =  $request->state;
         $addrequest->city =  $request->city;
        
                
        $addrequest->save();
            // send mail for tour
            





        
        return redirect()->route('touroperator.gallery.index')->with('success','Request Added Successfully.');

      
    }

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


}
