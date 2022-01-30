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
class MemberController extends Controller
{
    function __construct()
    {

    }
    
   public function getallMember()
   { 
   	$getMember  =  DB::table('users')->where('roll_id', 4)->get();
   	return view('spradmin.member.membershowdata', compact('getMember'));
   }

      public function showMemberDataTable()
     {
       return view('spradmin.member.getallmemberlist');
     }
       
      public function memberStatusChange(Request $request)
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
     public function memberDeletefun(Request $request) 
 {        
        $id =    $request->input('id');
       $delete  = User::where('id', $id)->delete();
    if ($delete) {
       return response()->json(['status'=>'success', 'msg'=>'Member Delete Successfully!']);
    }
  }

     public function getSingleMembers(Request $request)
   {   
            $id = $request->input('id');
            $userList = User::select('id', 'firstName', 'lastName', 'phoneNumber')->where('id', $id)->orderBy('firstName', 'asc')->first();
             return response()->json($userList);
}  

  public function memberupdateFormData(Request $request)
{  
     $id = $request->input('id');
     $updateAdmin = [
          'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName'),
          'phoneNumber' => $request->input('phoneNumber')
           ];
     $upDate = DB::table('users')->where('id', $id)->update($updateAdmin); 
     return response()->json(['status'=>'success', 'msg'=>'Member Update Successfully!']); 
 }

    function regsterNewMember(Request $request)
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
          return response()->json(['status'=>'success', 'msg'=>'New Member Registered Successfully!']);

   }  

     public function viewMemberDetailss(Request $request,$id) 
  {     
       $getSingle = DB::table('users')->where('id', $id)->get()->first(); 
       return view('spradmin.member.memberviewDetails',compact('getSingle'));
 }
}
