<?php

namespace App\Http\Controllers\Robot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RobotController extends Controller
{  

	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
     return view('robot.dashboard');	
    }  
}
