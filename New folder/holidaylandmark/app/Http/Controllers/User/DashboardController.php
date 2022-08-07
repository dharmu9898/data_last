<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\User;
use  Auth;
use App\City;
use App\Country;
use App\State;
use DB;
use App\AddTrip;
use Mail;
use App\Mail\OperatorMail;
use App\Package;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      

        $email =  Auth::user()->email; 
        $users = User::where('email',$email)->get();
       $user = User::where('email',$email)->pluck('TripTitle');
       
      
        
       $gallery = Package::where('TripTitle',$user)->first();
       
       $galleries = Package::where('TripTitle',$user)->first();

    if($email!= 'User@blog.com')
          {
      
       $cities=$galleries->city;

      
       $citi = City::where('city_id',$cities)->first();
      
     
       $states=$galleries->state;

      
       $state = State::where('state_id',$states)->first();
    


       $countries=$galleries->country;

      
       $country = Country::where('country_id',$countries)->first();
    

             }


 if($email== 'User@blog.com')
          {
     return view('user.dashboard');        
          }

   return view('user.dashboard',compact('gallery','citi','state','country'));
      		
    }

    public function upload($id)
    {
        $data = User::find($id);
        return view('user.upload',compact('data'));
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

     public function MailtoOperator($id){
            
      

    $find = AddTrip::find($id);

     /*  $find = DB::table('add_trips')
                       
        ->leftJoin('users', 'add_trips.user_id', '=', 'users.id')
                                       
                        
                   ->select('users.email')
                        ->orderBy('add_trips.id', 'desc')
                        ->paginate(10);*/
        return view('user.operatormail')->with('data',$find);
        
    }

    public function send(Request $request)
    {
     $this->validate($request, [
      
      'email'  =>  'required',
      'message' =>  'required',
     ]);
     
     $OperatorMailsend = array(  

              
        'emails' => $request->emails,
        'email' => $request->email,
        'message' => $request->message

);
        

        
                    
               
    Mail::to($OperatorMailsend['emails'])->send(new OperatorMail($OperatorMailsend));
    return redirect('user/dashboard')->with('success', 'Mail has been sent successfully!');

    


 /*   $user = User::findOrFail($id);

    Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
        $m->from('hello@app.com', 'Your Application');

        $m->to($user->email, $user->name)->subject('Your Reminder!');*/
    
    }


    public function show($TripTitle)
    {


        
        $user = Package::where('TripTitle',$TripTitle)->first();
       

        $city=$user->city;

        $cities = City::where('city_id',$city)->first();
       
      
     
     


            
       // return $user;
      
                          
           return view('user.show', compact('user','cities')); 
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
