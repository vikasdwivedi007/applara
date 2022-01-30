<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//  Common Route For All.....
Route::get('loginWithgoogle', 'AuthController@redirectToGoogle');
Route::get('google/callback', 'AuthController@handleGoogleCallback');
Route::view('/login',  'login')->name('login');
Route::view('/register',  'register')->name('register');
Route::post('/register',  'AuthController@registration')->name('register');
Route::post('/login',      'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');




// Super Admin Route section
 // Route for Admin Section
Route::get('/spr-admin/dashboard', 'Spradmin\SuperadminController@index')
->name('spr-admin/dashboard')->middleware('spradminMid');
Route::get('/spr-admin/adminlist', 'Spradmin\SuperadminController@getalladmin')->name('spr-admin/adminlist');
Route::get('/spr-admin/showAdminData', 'Spradmin\SuperadminController@showAdminDataTable')->name('spr-admin/showAdminData');
Route::post('/spr-admin/adminDelete', 'Spradmin\SuperadminController@adminDeleteFun')->name('spr-admin/adminDelete');
Route::post('/spr-admin/getsingleAdmin', 'Spradmin\SuperadminController@getsingleAdmin')->name('spr-admin/getsingleAdmin');
Route::post('/spr-admin/adminupdate', 'Spradmin\SuperadminController@adminUpdatedata')->name('spr-admin/adminupdate');
Route::post('/spr-admin/changeStatus', 'Spradmin\SuperadminController@changeStatus')->name('spr-admin/changeStatus');
Route::get('/spr-admin/viewadminDetails/{id}', 'Spradmin\SuperadminController@viewAdminDetails')->name('spr-admin/viewadminDetails');
Route::post('/spr-admin/addNewAdmin', 'Spradmin\SuperadminController@regsterNewAdmin')->name('spr-admin/addNewAdmin');

                            // Route for User  Section
Route::get('/spr-admin/userlist', 'Spradmin\UserController@getallUser')->name('spr-admin/userlist');
Route::get('/spr-admin/showUserlist', 'Spradmin\UserController@showUserDataTablePage')->name('spr-admin/showUserlist');
Route::post('/spr-admin/changeStatus', 'Spradmin\UserController@userStatusChange')->name('spr-admin/changeStatus');
Route::post('/spr-admin/userdelete', 'Spradmin\UserController@userDelete')->name('spr-admin/userdelete');
Route::post('/spr-admin/getSingleUser', 'Spradmin\UserController@getSingleUser')->name('spr-admin/getSingleUser');
Route::post('/spr-admin/userUpdate', 'Spradmin\UserController@userUpdatedata')->name('spr-admin/userUpdate');
Route::get('/spr-admin/viewUserDetails/{id}', 'Spradmin\UserController@viewUserDetailss')->name('spr-admin/viewUserDetails');
Route::post('/spr-admin/addNewUser', 'Spradmin\UserController@regsterNewUser')->name('spr-admin/addNewAdmin');

                         // Route for Member Section
Route::get('/spr-admin/memberlist', 'Spradmin\MemberController@getallMember')->name('spr-admin/memberlist');
Route::get('/spr-admin/showMemberlist', 'Spradmin\MemberController@showMemberDataTable')->name('spr-admin/showMemberlist');
Route::post('/spr-admin/changeStatus', 'Spradmin\MemberController@memberStatusChange')->name('spr-admin/changeStatus');
Route::post('/spr-admin/memberdelete', 'Spradmin\MemberController@memberDeletefun')->name('spr-admin/memberdelete');
Route::post('/spr-admin/getSingleMember', 'Spradmin\MemberController@getSingleMembers')->name('spr-admin/getSingleMember');
Route::post('/spr-admin/membersupdates', 'Spradmin\MemberController@memberupdateFormData')->name('spr-admin/membersupdates');
Route::post('/spr-admin/newmemberregister', 'Spradmin\MemberController@regsterNewMember')->name('spr-admin/newmemberregister');
Route::get('/spr-admin/viewMembersDetails/{id}', 'Spradmin\MemberController@viewMemberDetailss')->name('spr-admin/viewMembersDetails');
                           
                         // Route for Robot Section
Route::get('/spr-admin/robotlist', 'Spradmin\RobotController@getallRobot')->name('spr-admin/robotlist');
Route::get('/spr-admin/showRobotlist', 'Spradmin\RobotController@showallmemeberData')->name('spr-admin/showRobotlist');
Route::post('/spr-admin/changeStatus', 'Spradmin\RobotController@robotStatusChange')->name('spr-admin/changeStatus');
Route::post('/spr-admin/robotDelete', 'Spradmin\RobotController@robotDeletefun')->name('spr-admin/robotDelete');
Route::post('/spr-admin/getSingleRobot', 'Spradmin\RobotController@getSingleRobots')->name('spr-admin/getSingleRobot');
Route::post('/spr-admin/robotUpDate', 'Spradmin\RobotController@RobotupdateFormData')->name('spr-admin/robotUpDate');
Route::post('/spr-admin/robotRegister', 'Spradmin\RobotController@regsterNewRobot')->name('spr-admin/robotRegister');
Route::get('/spr-admin/viewrobotDet/{id}', 'Spradmin\RobotController@viewRobotDetailss')->name('spr-admin/viewrobotDet');
 
   // Route for Super Admin Progfile
Route::get('spr-admin/myprofile/{id}', 'Spradmin\SuperadminController@myprofile' )->name('spr-admin/myprofile');
Route::get('spr-admin/sprChangepss', 'Spradmin\SuperadminController@changePass' )->name('spr-admin/sprChangepss');
Route::post('spr-admin/ChangePAssword', 'Spradmin\SuperadminController@ChangePAsswords' )->name('spr-admin/ChangePAssword');



// Admin Route 
Route::get('/admin/dashboard', 'Admin\AdminController@index')
->name('admin/dashboard')->middleware('adminMid');




// User Route
Route::get('/user/dashboard',  'User\UserController@index')
->name('user/dashboard')->middleware('userMid');




// Member Route 
Route::get('/member/dashboard','Member\MemberController@index')
->name('member/dashboard')->middleware('memberMid');





// Robot Route
Route::get('/robot/dashboard', 'Robot\RobotController@index')
->name('robot/dashboard')->middleware('robotMid');












