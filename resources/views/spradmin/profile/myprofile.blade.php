@extends('layouts.app')
@section('content') 
<br>
<div class="panel-body">
   <h3>Super Admin Profile</h3>
     <!--  <div class="text-right">
           <a href="{{ route('spr-admin/showMemberlist') }}" class="btn btn-success "><i class="fa fa-arrow-left" aria-hidden="true"></i>Go to Back Page</a>
      </div> -->
      <br>
     <table  id="example" class="table table-striped table-bordered" style="width:100%">

     	   <tr>
     	   	    <th>id</th>
     	   	    <td>{{$sprAdminProfile->id}}</td>
     	   </tr>
     	   <tr>
     	   	    <th>First Name</th>
     	   	    <td>{{$sprAdminProfile->firstName}}</td>
     	   </tr>
     	   <tr>
     	   	    <th>Last Name</th>
     	   	    <td>{{$sprAdminProfile->lastName}}</td>
     	   </tr>
     	   <tr>
     	   	    <th>Email</th>
     	   	    <td>{{$sprAdminProfile->email}}</td>
     	   </tr>
     	   <tr>
     	   	    <th>Mobile No:</th>
     	   	    <td>{{$sprAdminProfile->phoneNumber}}</td>
     	   </tr>
     	   <tr>
     	   	    <th>Gender</th>
     	   	<td>
                     @if($sprAdminProfile->gender == 1)
                     <button type="button" title="male" class="btn btn-custon-rounded-three btn-primary btn-xs"> male</button>
                     @else 
                     <button type="button" title="female" class="btn btn-custon-rounded-three btn-info btn-xs">female </button>
                     @endif
               </td>
     	   </tr>
     	   <tr>
     	   	    <th>User Type</th>
     	   	    <td>
                     @if($sprAdminProfile->roll_id == 1)
                     <button type="button" title="spradmin" title="member" class="btn btn-custon-rounded-three btn-info btn-xs"> </i>SuperAdmin</button>
                     @endif
                   </td>
     	   </tr>
             <tr>
                   <th>Status</th>
               <td>
                     @if($sprAdminProfile->status == 1)
                     <button type="button"  title="active" class="btn btn-custon-rounded-three btn-success btn-xs"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                     @else 
                     <button type="button" title="Inactive"  class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-thumbs-down" aria-hidden="true"></i> </button>
                 @endif
                </td>
             </tr>

             <tr>
                   <th>Permission</th>
                   <td>
                     @if($sprAdminProfile->permission == 1)
                     <button type="button"  title="active" class="btn btn-custon-rounded-three btn-success btn-xs">Yes</button>
                     @else 
                     <button type="button" title="Inactive"  class="btn btn-custon-rounded-three btn-danger btn-xs"> No</button>
                 @endif
                </td>
             </tr>


             <tr>
                   <th>Create Date</th>
                <td type="button" class="btn btn-primary btn-sm" title="Create date">{{date('d-m-Y', strtotime($sprAdminProfile->created_at))}}</td>
             </tr>


            

</table>
</div>
 @endsection
