<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search');
     

    }

    function action(Request $request)
    {


     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('add_trips')
                                            
                                            ->join('countries','add_trips.country', '=','countries.country_id')
                                            ->join('cities','add_trips.city', '=','cities.city_id')
                                            ->join('states','add_trips.state', '=','states.state_id')
                                            ->where('add_trips.emailid', 'like', '%'.$query.'%')
                                            ->orWhere('add_trips.Phoneno', 'like', '%'.$query.'%')
                                            ->orWhere('add_trips.triptitle', 'like', '%'.$query.'%')
                                            ->orWhere('add_trips.Noofdays', 'like', '%'.$query.'%')
                                            ->orWhere('add_trips.location','like', '%'.$query.'%')
                                            ->orderBy('add_trips.id', 'DESC')
                                            ->paginate(30)
                                            ->get();
         
      }
      else
      {
        $data = DB::table('add_trips')
        ->leftJoin('users', 'add_trips.user_id', '=', 'users.id')
        ->leftJoin('countries','add_trips.country', '=', 'countries.country_id')
        ->leftJoin('states','add_trips.state', '=', 'states.state_id')
        ->leftJoin('cities','add_trips.city', '=', 'cities.city_id')
        ->select('add_trips.*','states.state_name','countries.country_name','cities.city_name','users.name')
        ->orderBy('add_trips.id', 'desc')
        ->paginate(10)
        ->get();
        

      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
       
        $output='
        <tr>
        <td>'. $row->country_name .'</td>
        <td>'. $row->state_name .'</td>
        <td>'. $row->city_name .'</td>
        <td>'. $row->emailid .'</td>
        <td>'. $row->Phoneno .'</td>
        <td>'. $row->triptitle .'</td>
        <td>'. $row->Noofdays .'</td>
        <td>'. $row->location .'</td>        
                    </tr>                                               
                                        
                                        
                                        
                ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}