<?php

namespace App\Http\Controllers\TourOperator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\city;
use App\country;
use App\state;
use DB;
use App\TourOperator;
use App\AddTrip;
use App\Rvsp;
use App\User;
use App\Package;
use Log;


class DashboardController extends Controller
{
    public function index()
    {



        /*     $touroperator = DB::table('add_trips')
        ->leftJoin('users', 'add_trips.user_id', '=', 'users.id')
       
->leftJoin('countries','add_trips.country', '=', 'countries.country_id')
->leftJoin('states','add_trips.state', '=', 'states.state_id')
->leftJoin('cities','add_trips.city', '=', 'cities.city_id')
->select('add_trips.*','states.state_name','countries.country_name','cities.city_name','users.name')
->orderBy('add_trips.id', 'desc')
->paginate(10);



return view('touroperator.dashboard',compact('touroperator'));    */
        $email =  Auth::user()->email;
        $gallery = DB::table('packages')
            ->leftJoin('users', 'packages.user_id', '=', 'users.id')
            ->leftJoin('countries', 'packages.country', '=', 'countries.country_id')
            ->leftJoin('states', 'packages.state', '=', 'states.state_id')
            ->leftJoin('cities', 'packages.city', '=', 'cities.city_id')
            ->leftJoin('addimages', 'packages.TripTitle', '=', 'addimages.trips')
            // ,'addimages.image_name'
            ->where('packages.email', $email)
            ->select(
                'packages.*',
                'countries.country_name',
                'states.state_name',
                'cities.city_name',
                'users.name',
                'addimages.image_name'
            )->distinct()
            ->orderBy('packages.id', 'desc')
            ->paginate(10);
            Log::info($gallery);

        $sub = Package::where('email', $email)->sum('subscriber');

        $res = DB::table('rvsps')

            ->pluck('TripTitle');

        return view('touroperator.index', compact('gallery', 'res', 'sub'))->render();
    }
    public function rvsplist()
    {


        // $Trips = DB::table('rvsps')
        //->select('TripTitle')
        // ->distinct()->get('TripTitle');

        $res = DB::table('rvsps')
            ->select('TripTitle', DB::raw('COUNT(TripTitle) as total_member'))
            ->groupBy('TripTitle')
            ->havingRaw('COUNT(TripTitle) > 0')
            ->get();



        $touroperator = Rvsp::latest()->paginate(20);

        // return $result;    

        return view('touroperator.rvsplist', compact('res', 'touroperator'));
    }


    public function confirm($id)
    {



        $find = Rvsp::find($id);
        return view('touroperator.confirm')->with('data', $find);
    }

    public function list($TripTitle)
    {





        // $touroperator = Rvsp::where('TripTitle',$TripTitle)
        // ->latest()->paginate(20);
        // $touroperator = Rvsp::->latest()->paginate(20);
        // return $touroperator;


        $id = Rvsp::where('TripTitle', $TripTitle)->pluck('id');
        $data = Rvsp::find($id);
        // return  $data;

        return view('touroperator.Rvsp', compact('data'));
    }

    public function updates(Request $request)
    {





        //  $email=Rvsp::where('TripTitle',$name)->pluck('emailid');
        //   $Nam=Rvsp::where('TripTitle',$name)->pluck('Name');


        //   value="{{$tour->id}}" name="rvsp_id[]">  </td>

        $data = $request->except('_token');

        $email = User::where('email', $data['rvsp_id'])->first();
        if ($email) {
            return redirect()->route('touroperator.index')->with('success', 'Email is already exists.');
        }

        $subject_count = count($data['rvsp_id']);

        if ($request->selectAll) {
            for ($i = 0; $i < $subject_count; $i++) {

                $tss = new User;
                $tss->name = $data['rv_id'][$i];
                $tss->email = $data['rvsp_id'][$i];
                $tss->Phoneno = $data['rvp_id'][$i];
                $tss->Address = $data['rva_id'][$i];
                $tss->TripTitle = $data['rvt_id'][$i];









                $tss->role_id = 3;
                $tss->save();
            }
        } else {


            for ($i = 0; $i < $subject_count; $i++) {

                $tss = new User;
                $tss->name = $data['rv_id'][$i];
                $tss->email = $data['rvsp_id'][$i];
                $tss->Phoneno = $data['rvp_id'][$i];
                $tss->Address = $data['rva_id'][$i];
                $tss->TripTitle = $data['rvt_id'][$i];

                $tss->role_id = 3;
                $tss->save();
            }
        }



        return redirect()->route('touroperator.index')->with('success', 'confirm Added Successfully.');

        /*   $user = new User();
        if ($request->selectAll){
            $user->name =  $Nam;
             $user->email = $email;
             $user->role_id = "3";
        }
       
        $user->save();*/
        //   DB::insert('INSERT INTO users (email, name) VALUES (?, ?)', array($email, $Name));

        /* $id=Rvsp::where('TripTitle',$name)->pluck('id');
        
      $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            // 'contribution'=>'required',            
             ]);
        
             $user = new User();
             $user->name =  $request->name;
             $user->email = $request->email;
             $user->role_id = "3";
          
             $user->save();
      //  Log::info('in request function');
     //   Log::info($addrequest);
        
   
    

                 /*   if ($request-> selectAll){
                        $user->userlist = 'all';
                    }
                    else{
                        $user->userlist =  implode(',',$request->userlist);
                    } 

                    $user->save();
                    return redirect()->route('admin.manager.index')->with('success', 'Access given to manager Successfully');







    
        return redirect()->route('touroperator.rvsplist')->with('success','confirm Added Successfully.');*/
    }
}