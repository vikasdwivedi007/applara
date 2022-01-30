@extends('layouts.app')

@section('content')
<br>
 <div class="container">
   <div class="data-table-area mg-tb-15">
      <div class="container-fluid">
         <div class="row">
            <!-- data table load useing ajax jquery -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="sparkline13-list">
                  <div class="sparkline13-hd">
                     <div class="main-sparkline13-hd">
                        <h1>Member<span class="table-project-n">Data</span> Table</h1>
                     </div>
                  </div>
                    <div class="text-right">
                  <a href="javascript:void(0)" onclick="return addNewMember()" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Add New Member</a>
                 </div>
                  <div class="sparkline13-graph">
                     <div class="datatable-dashv1-list custom-datatable-overright">
                        <div class="bootstrap-table">
                           <div class="fixed-table-toolbar">
                              <div class="bs-bars pull-left">
                                 <div id="toolbar">
                                    <select class="form-control">
                                       <option value="">Export Basic</option>
                                       <option value="all">Export All</option>
                                       <option value="selected">Export Selected</option>
                                    </select>
                                 </div>
                              </div>
                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table table-hover JColResizer">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>FirstName</th>
                                       <th>LastName</th>
                                       <th>Email</th>
                                       <th>Mobile No</th>
                                       <th>Gender</th>
                                       <th>Status</th>
                                       <th>User Type</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody id="loadMemberdatatable">
                                  <!-- load tr section with data useing ajax -->
          
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- row div -->
      </div>
   </div>
</div>
 <!-- Edit popup for User Update form in jquery...... -->
 <!--  Jquery Model popup  -->
<div id="memberUpdateforms" class="modal fade" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style="background-color: #4B0082 !important; color: white; text-align: bold;">
            <h5 class="modal-title">Member Update Form</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
             <form name="update_form" id="update_form"  onsubmit="return memberUpdate()" > 
              <input type="hidden" name="id" id="id" value="">
              @csrf
                  <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="emailHelp" placeholder="Enter First Name" value="" required="required">
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Enter Last Name" name="lastName" value="" required="required">
                  </div>

                  <div class="form-group">
                    <label for="phoneNumber">Mobile No</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" value=""  minlength="10" maxlength="10" required="required">
                  </div>
                  <div class="form-group form-check">
                  </div>
                <center> <button type="submit" value="submit" id="submit" name="submit" class="btn btn-primary">Update</button></center>
            </form>
          </div>        
      </div>
   </div>
</div>
                  <!--  form cloge form update..... -->


                   <!--  For Add new Admin By Super Admin ofter login model popup -->
<div class="modal" tabindex="-1" role="dialog" id="addNewMembers">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #C71585; color: white;">
        <h5 class="modal-title">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form name="addnewmembesForm" id="addnewmembesForm" onsubmit="return addnewMemberFor()">
        @csrf 
        <input type="hidden" name="roll_id" id="roll_id" value="4">
       <div class="row">
           <div class="col-md-6">
              <div class="form-group">
                <label for="firstName">Firstname</label>
                 <input type="text" class="form-control" id="firstName" aria-describedby="emailHelp" placeholder="Enter First Name" value="{{ old('firstName') }}" name="firstName"  required > 
              </div>
           </div>

           <div class="col-md-6">
            <div class="form-group">
             <label for="lastName">Lastname</label>
             <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Enter Last Name" value="{{ old('lastName') }}" name="lastName" required > 
          </div>
        </div>
      </div> 

         <div class="row">
           <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                 <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="admin@gmail.com" value="{{ old('email') }}" name="email" required > 
              </div>
           </div>

           <div class="col-md-6">
            <div class="form-group">
             <label for="password">Password</label>
             <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="************" value="{{ old('password') }}" name="password" required > 
          </div>
        </div>
    </div>

      <div class="row">
           <div class="col-md-6">
              <div class="form-group">
                <label for="phoneNumber">Mobile No</label>
                 <input type="text" class="form-control" id="phoneNumber" aria-describedby="emailHelp" placeholder="9985204565" minlength="10" maxlength="10" value="{{ old('phoneNumber') }}" name="phoneNumber" required > 
              </div>
           </div>

           <div class="col-md-3">
            <div class="form-group">
             <label for="Male">Male</label><br>
             <input type="radio"  checked="checked" name="gender" value="1"> 
          </div>
        </div> 
         <div class="col-md-3">
            <div class="form-group">
             <label for="Male">Female</label><br>
             <input type="radio"  name="gender" value="2"> 
          </div>
        </div>
    </div>

           <center>
            <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
           </center>
       </form>
      </div>
    </div>
  </div>
</div>

                     <!-- cloge model registration form   -->

<script type="text/javascript">
    $(document).ready(function(){
      gateallMember();
    });

function gateallMember()
{ 

 $.ajax({
          url: "{{ url('spr-admin/memberlist') }}",
          type: "get",
          cache: false,
      success: function(data){
           $('#loadMemberdatatable').html(data);
        }
    });

}

  function memberStatusChange(id,status)
     {  
    swal({
          title: "Are you sure?",
          text: " You Want to change Status in this Candidate!",
          icon: "warning",
          buttons: true,
          successMode: true,
   })
   .then((willDelete) => {
      if (willDelete) {
     $.ajax({
              url: '{{url("spr-admin/changeStatus")}}',
              type: 'post',
              dataType: 'json',
              data: {"_token": "{{ csrf_token() }}", id : id, 'status':status},
      success:function(response){
              gateallMember();
               if (response.status == 'success') {
           swal({
                   icon: "success",
                   title: response.msg,
                   timer: 1500  
              });
            
             }
          }
        
       });
    } 
   });
      
   
      return  false; 
     } 
   

   function memberDelete(id)
     {  
     swal({
            title: "Are you sure?",
            text: "you want to delete this Candidate!",
            icon: "warning",
            buttons: true,
            successMode: true,
   })
   .then((willDelete) => {
      if (willDelete) {
        $.ajax({
              url: '{{url("spr-admin/memberdelete")}}',
              type: 'post',
              dataType: 'json',
              data: {"_token": "{{ csrf_token() }}", id : id},
        success:function(response){
              gateallMember();
               if (response.status == 'success') {
                swal({
                    icon: "success",
                   title: response.msg,
                   timer: 1500  
              });
            
             }
          }
        
       });
    } 
   });
     
   return  false; 
   
   }


  function membereditform(id)
   {  
     swal({
            title: "Are you sure?",
            text: "you want to Update this Candidate!",
            icon: "warning",
            buttons: true,
            successMode: true,
   })
   .then((willDelete) => {
      if (willDelete) {
      $.ajax({
             url: '{{url("spr-admin/getSingleMember")}}',
             type: 'post',
             dataType: 'json',
             data: {"_token": "{{ csrf_token() }}", id : id},
       success:function(response){
                $('#id').val(response.id);
                $('#firstName').val(response.firstName);
                $('#lastName').val(response.lastName);
                $('#phoneNumber').val(response.phoneNumber);
                $('#memberUpdateforms .modal-body').html();
                $('#memberUpdateforms').modal();
               }
           });
        return false;
    } 
   });
     
     } 


     function memberUpdate(){
    
  var updateData =  $( "#update_form" ).serialize();
      $.ajax({
             type: 'POST',
             url: '{{url("spr-admin/membersupdates")}}',
             data: updateData,
       success:function(response){
              $('#memberUpdateforms').modal('hide');
               gateallMember();
               if (response.status == 'success') {
                swal({
                   icon: "success",
                   title: response.msg,
                   timer: 1500  
              });
            
             }
            return false; 
              
               }
           });
        return false;
  } 

    function addNewMember(){ 
     swal({
            title: "Are you sure?",
            text: "You want to Add New Member!",
            icon: "warning",
            buttons: true,
            successMode: true,
   })
   .then((willDelete) => {
      if (willDelete) {
        $('#addNewMembers').modal('show');
      } 
      });
     } 

    function addnewMemberFor(){

   var AddNewMembersData =  $( "#addnewmembesForm" ).serialize();

       $.ajax({
             type: 'POST',
             url: '{{url("spr-admin/newmemberregister")}}',
             data: AddNewMembersData,
       success:function(response){
              $('#addNewMembers').modal('hide');
               gateallMember();
               if (response.status == 'success') {
                swal({
                   icon: "success",
                   title: response.msg,
                   timer: 1500  
              });
              $("#addnewmembesForm")[0].reset();
             }

            return false; 
              
               }
           });
        return false;

 }  
    
</script>

 @endsection