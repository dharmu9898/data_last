<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Requesthelp;

class DashboardController extends Controller
{
    public function index()
    {
      	$users = User::all();
      	$social_revolutionaries = User::where('role_id', 2)->get();
      	$socialmembers = User::where('role_id', 3)->get();
      	$request = Requesthelp::get();
        return view('admin.dashboard', compact('users','social_revolutionaries','socialmembers','request') );

    }
}
