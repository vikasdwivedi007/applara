<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;
use Session;
use Auth;
use Socialite;
use Exception;

class AuthController extends Controller
{
   
   public function registration(Request $request)
   { // echo "<pre>"; print_r($_POST); die();
     $Validate = Validator::make($request->all(), [
        'firstName'   => 'required',
        'lastName'    => 'required',
        'email'       =>'required|email|unique:users',
        'password'   => 'required|min:8',
        'confirpassword' => 'required|min:8',
        'phoneNumber'  => 'required',
        'gender'       => 'required',
        'roll_id'      => 'required',
    ],
        [   
        'firstName.required'     => 'Please Fill The First Name.',
        'lastName.required'      => 'Please Fill The Last Name .',
        'email.required.email.unique:users'  => 'Please Fill The Valid Email Address.',
        'password.required.min:8'     => 'Please Fill The Password.',
        'confirpassword.required.min:8'=> 'Please Fill The Confirm Password.',
        'phoneNumber.required'   => 'Please Fill The valid Mobile Number'
        ]);
		if ($Validate->fails())
		    {
		        return redirect()->back()->withErrors($Validate->errors());
		 }else{ 
    	 $data = User::create([
            'name'      => $request['name'],
            'sirname'       => $request['sirname'],
            'email'          => $request['email'],
            'password'       => Hash::make($request['password']),
            'mobileNumber'    => $request['mobileNumber'],
            'gender'         => $request['gender'],
            'roll'        => $request['roll'],
            'remember_token' => $request['_token']
           
        ]);
          return response()->json(['status'=>'success', 'msg'=>'Registered Successfully!']);
        // $success  = ['status'=>'success','msg'=>'Registered Successfully!']; 
        //  return json_encode($success);
    	// Session::flash('message', 'Registered Successfully!'); 
        // return redirect()->back();

    } 
   }



  public function login(Request $request) 
  {    
	  $Validate = Validator::make($request->all(), [
	        'email'        => 'required|email',
	        'password'     => 'required|min:8',
	    ],	);
	    if ($Validate->fails())
	    {   
	        return redirect()->back()->withErrors($Validate->errors());
	    }
	   else{
			   Auth::attempt(['email' => $request->email, 'password' =>$request['password']]);
            
        if(Auth::check())
        {
             $userinfo = Auth::user();
            if($userinfo->roll_id == 1)
            {
                return redirect()->route('spr-admin/dashboard');
            }
            else if($userinfo->roll_id == 2)
            {
                return redirect()->route('admin/dashboard');
            }
             else if($userinfo->roll_id == 3)
            {
                return redirect()->route('user/dashboard');
            }
             else if($userinfo->roll_id == 4)
            {
                return redirect()->route('member/dashboard');
            }
             else if($userinfo->roll_id == 5)
            {
                return redirect()->route('robot/dashboard');
            }
    	    }
    	    else
    	    {
            $request->session()->flash('message', 'invalid credentials! please check and try again');
            return redirect()->back();
            }

	    }
	  } 

 public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
       

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }  

      public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
           $finduser = User::where('google_id', $user->id)->first();
   
            if($finduser){
                 Auth::login($finduser);
                 return redirect('/home');
   
            }else{
                $newUser = User::create([
                    'google_username' => $user->name,
                    'google_email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
  
                Auth::login($newUser);
   
                return redirect('/spr-admin/dashboard');
            }
  
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    } 

} // cloge controller

