<?php

namespace App\Http\Controllers\Spradmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use session;
use DB;
use Cookie;
use Auth;
use Mail;
use App;
use Hash;

class RobotController extends Controller
{
   function __construct(){

   }

  public function getallRobot()
  {
    $getallRobot  =  DB::table('users')->where('roll_id', 5)->get();
     return view('spradmin.robot.robotrDatalist',compact('getallRobot'));
  }
  public function showallmemeberData()
  {
    return view('spradmin.robot.robotlist');
  }

      public function robotStatusChange(Request $request)
    {   
        $id = $request->input('id');
       $status = $request->input('status');

       if ($status == 1) {
                 $update = User::where('id', $id)->update(['status' => 0]);
         } else {
                 $update =  User::where('id', $id)->update(['status' => 1]);
       }
    if ($update) {
           return response()->json(['status'=>'success', 'msg'=>'Status Change Successfully!']);
       }
      }
     public function robotDeletefun(Request $request) 
 {        
        $id =    $request->input('id');
       $delete  = User::where('id', $id)->delete();
    if ($delete) {
       return response()->json(['status'=>'success', 'msg'=>'Robot Delete Successfully!']);
    }
  }
   public function getSingleRobots(Request $request)
   {   
            $id = $request->input('id');
            $userList = User::select('id', 'firstName', 'lastName', 'phoneNumber')->where('id', $id)->orderBy('firstName', 'asc')->first();
             return response()->json($userList);
}  
    
    public function RobotupdateFormData(Request $request)
{  
        $id = $request->input('id');
     $updateRobot = [
          'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName'),
          'phoneNumber' => $request->input('phoneNumber')
           ];
     $upDate = DB::table('users')->where('id', $id)->update($updateRobot); 
     return response()->json(['status'=>'success', 'msg'=>'Robot UpDate Successfully!']); 
 }

   function regsterNewRobot(Request $request)
   {  
    $Admindata = User::create([
            'firstName'      => $request['firstName'],
            'lastName'       => $request['lastName'],
            'email'          => $request['email'],
            'password'       => Hash::make($request['password']),
            'phoneNumber'    => $request['phoneNumber'],
            'gender'         => $request['gender'],
            'roll_id'        => $request['roll_id'],
            'remember_token' => $request['_token']
           
        ]);
          return response()->json(['status'=>'success', 'msg'=>'New Robot Registered Successfully!']);

   }  


 public function viewRobotDetailss(Request $request,$id) 
  {     
       $getSingle = DB::table('users')->where('id', $id)->get()->first(); 
       return view('spradmin.robot.viewDetailsOfRobot',compact('getSingle'));
 }
}
