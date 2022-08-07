<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\MicroserviceController;
use Log;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data= new  MicroserviceController;
       
      $data= $data->showdata();

      $alldata= $data['data'];
      
// Log::info('data aa home gaya '.print_r($alldata,true));
        return view('home',compact('alldata'));
    }


    public function edit($id)
    {
      $data= new  MicroserviceController;
      $edit_data = $data->editdata($id);
      $data= $data->editdata($id);
      $data_value = $data['data'];

      Log::info('data aa home gaya for edit: '. print_r($data_value, true));

      return view('edit',compact('data_value'));
        
    }
}
