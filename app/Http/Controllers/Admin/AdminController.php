<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{ 
	
  public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {  
  	   $allUser  =   DB::table('users')->where('roll_id', 3)->count();
  	   $allMember=   DB::table('users')->where('roll_id', 4)->count(); 
  	   $allRobot =   DB::table('users')->where('roll_id', 5)->count();
        return view('admin.dashboard',compact('allUser','allMember', 'allRobot'));	
  }  

}
