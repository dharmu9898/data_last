<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\city;
use App\country;
use App\state;
use App\User;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
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
        return view('admin.dashboard');
    }

    public function SocialRevolutionaries()
    {
        $social_revolutionaries = User::latest()->paginate(1)->get();
        return view('admin.socialrevolutionaries.index', compact('social_revolutionaries'));
    }

    public function SocialMembers()
    {
         $socialmembers = User::latest()->paginate(1)->get();
         return view('admin.socialmembers.index', compact('socialmembers'));
    }

    
    

    

}
