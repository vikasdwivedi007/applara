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
class SuperadminController extends Controller
{  

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
     {
		$allAdmin  = DB::table('users')->where('roll_id', 2)->count();
		$allUser   = DB::table('users')->where('roll_id', 3)->count();
		$allMember = DB::table('users')->where('roll_id', 4)->count();
		$allRobot  = DB::table('users')->where('roll_id', 5)->count();	
		return view('spradmin.dashboard',compact('allAdmin','allUser','allMember','allRobot'));	
    } 


 // for admin data table using jquery ajax.......
 
     public function getalladmin()
     { 
       $getAdmin  =  DB::table('users')->where('roll_id', 2)->get();
       return view('spradmin.admin.adminDatalist',compact('getAdmin'));
     }   

     public function showAdminDataTable()
     {
       return view('spradmin.admin.adminlist');
     }

// for admin data table using jquery ajax.......




    public function changeStatus(Request $request)
    {   
       $id = $request->input('id');
       $status = $request->input('status');
     if ($status == 1) {
      $update = User::where('id', $id)->update(['status' => 0]);
      } else { $update =  User::where('id', $id)->update(['status' => 1]);
     } if ($update) {
           return response()->json(['status'=>'success', 'msg'=>'Status Change Successfully!']);
     	 }
      } 

 public function adminDeleteFun(Request $request) 
 { 
        $id =    $request->input('id');
       $delete  = User::where('id', $id)->delete();
    if ($delete) {
       return response()->json(['status'=>'success', 'msg'=>'Admin Delete Successfully!']);
    }
  }

 public function getsingleAdmin(Request $request)
   {   
            $id = $request->input('id');
            $userList = User::select('id', 'firstName', 'lastName', 'phoneNumber')->where('id', $id)->orderBy('firstName', 'asc')->first();
             return response()->json($userList);
}  

public function adminUpdatedata(Request $request)
{  
     $id = $request->input('id');
     $updateAdmin = [
          'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName'),
          'phoneNumber' => $request->input('phoneNumber')
           ];
     $upDate = DB::table('users')->where('id', $id)->update($updateAdmin); 
     return response()->json(['status'=>'success', 'msg'=>'Admin UpDate Successfully!']); 
 }

 public function viewAdminDetails(Request $request,$id) 
  {     
       $getSingle = DB::table('users')->where('id', $id)->get()->first(); 
       return view('spradmin.admin.viewadmindetails',compact('getSingle'));
 }
    
 public  function regsterNewAdmin(Request $request)
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
          return response()->json(['status'=>'success', 'msg'=>'New Admin Registered Successfully!']);

   }  

 public function myprofile(Request $request,$id)
 {
   $sprAdminProfile = DB::table('users')->where('id', $id)->get()->first(); 
   return view('spradmin.profile.myprofile',compact('sprAdminProfile'));
 }
   

 public function changePass()
 {
   return view('spradmin.profile.sprchangepass');
 }  

 // public function ChangePAsswords(Request $request)
 // {  
 //  // $rules = [
 //  //       'currentPass'     =>  'required|email|unique:users',
 //  //       'password'        =>  'required|min:8|regex:',
 //  //       'confirmPass'     =>  'required|same:email',
 //  //   ];

 //  //   $messages = [
 //  //       'currentPass.required'            => 'The field is required',
 //  //       'password.required.min:8'         => 'The field is required',
 //  //       'confirmPass.min:8'              => 'The field is required',
        
 //  //   ];
 //       $id        = $request->input('id');
 //       $curentpass = $request->input('currentPass');
 //       $password = Hash::make($request->input('password'));
 //       $confimpassW = $request->input('confirmPass');

 //       //  if ($password != $confimpassW) {
 //       //     return response()->json(['error'=>'error', 'msg'=>'Sorry New password is not match from confim password!']);
 //       // }
 //      if (Auth::attempt(array('id' => $id, 'password' => $curentpass)))
 //        {
 //          $updataPass = User::where('id', $id)->update(['password'=> $password]);
 //           return response()->json(['status'=>'success', 'msg'=>'Password Change Successfully!']);

 //        }else{
 //          return response()->json(['status'=>'error', 'msg'=>'Your Current Password is Not Match!']);
 //         }

 //       }
public function ChangePAsswords(Request $request)
 {   
     
     DB::enableQueryLog();//enable query logging
     $id =  $request->input('id');
     $currentPass = Hash::make($request->input('currentPass'));
     $newPass =  Hash::make($request->input('password'));
     $confirmPass =  Hash::make($request->input('confirmPass'));

    //  if ($newPass != $confirmPass) {
    //    return response()->json(['status' => 'error', 'msg' =>'Your new password is not match from  confirm password']);
    //  }else 
     if(!Auth::attempt(['password'=>$currentPass,'id'=> $id])){            
       return response()->json(['status' => 'notmatch', 'msg' => 'Your currnet password is not from Database please check!']);
     } else if(Auth::check()){
      print_r(DB::getQueryLog());
       $updateData = DB::table('users')
              ->where('id', $id)
              ->update(['password' => $newPass]); 
      return response()->json(['status' => 'success', 'msg' => 'Your password Chenge Successfully!']);         
   }
   }

} // cloge Controllers............................................................................
