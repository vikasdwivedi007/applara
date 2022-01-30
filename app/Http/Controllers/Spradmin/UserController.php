<?php

namespace App\Http\Controllers\Spradmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;
use Session;


class UserController extends Controller
{
    function __construct()
    {
       

    }

  
   public function getallUser()
   {
     $getAll = DB::table('users')->where('roll_id', 3)->get();
     return view('spradmin.user.userDatatable', compact('getAll'));
   }    

   public function showUserDataTablePage()
      {
      	return view('spradmin.user.getalluser');
      }   
   

    public function userStatusChange(Request $request)
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
     public function userDelete(Request $request) 
 {        
        $id =    $request->input('id');
       $delete  = User::where('id', $id)->delete();
    if ($delete) {
       return response()->json(['status'=>'success', 'msg'=>'User Delete Successfully!']);
    }
  }

   public function getSingleUser(Request $request)
   {   
            $id = $request->input('id');
            $userList = User::select('id', 'firstName', 'lastName', 'phoneNumber')->where('id', $id)->orderBy('firstName', 'asc')->first();
             return response()->json($userList);
}  
  public function userUpdatedata(Request $request)
{  
     $id = $request->input('id');
     $updateAdmin = [
          'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName'),
          'phoneNumber' => $request->input('phoneNumber')
           ];
     $upDate = DB::table('users')->where('id', $id)->update($updateAdmin); 
     return response()->json(['status'=>'success', 'msg'=>'User UpDate Successfully!']); 
 }

  public function viewUserDetailss(Request $request,$id) 
  {     
       $getSingle = DB::table('users')->where('id', $id)->get()->first(); 
       return view('spradmin.user.userviewDetails',compact('getSingle'));
 }
      function regsterNewUser(Request $request){

    $Userdata = User::create([
            'firstName'      => $request['firstName'],
            'lastName'       => $request['lastName'],
            'email'          => $request['email'],
            'password'       => Hash::make($request['password']),
            'phoneNumber'    => $request['phoneNumber'],
            'gender'         => $request['gender'],
            'roll_id'        => $request['roll_id'],
            'remember_token' => $request['_token']
           
        ]);
          return response()->json(['status'=>'success', 'msg'=>'New User Registered Successfully!']);

   }
}
