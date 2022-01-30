@extends('layouts.app')
@section('content')
<div class="container">
   <div class="data-table-area mg-tb-15">
      <div class="container-fluid">
         <div class="row">
            <!-- data table load useing ajax jquery -->
         
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             
               <div class="sparkline13-list">
                  <div class="sparkline13-hd">
                     <div class="main-sparkline13-hd">
                        <h1>Admin <span class="table-project-n">Data</span> Table</h1>
                     </div>
                  </div>
                  <div class="text-right">
                  <a href="javascript:void(0)" onclick="return addNewAdmin()" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Add New Admin</a>
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
                                 <tbody id="alluserTable">
                                  
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

<!--  Jquery Model popup  -->
<div id="updatemyModal" class="modal fade" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style="background-color: #9932CC !important; color: white; text-align: bold;">
            <h5 class="modal-title">Update Form</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
             <form name="update_form" id="update_form"  onsubmit="return adminUpdate()" > 
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

 <!--  For Add new Admin By Super Admin ofter login model popup -->
<div class="modal" tabindex="-1" role="dialog" id="addNewAdminForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #C71585; color: white;">
        <h5 class="modal-title">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form name="addNewAdminBySpr" id="addNewAdminBySpr" onsubmit="return addnewAdminfor()">
        @csrf 
        <input type="hidden" name="roll_id" id="roll_id" value="2">
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
     getall();
   });
   
   function getall()
   {
     $.ajax({
          url: "{{ url('spr-admin/adminlist') }}",
          type: "get",
          cache: false,
      success: function(data){
           $('#alluserTable').html(data);
        }
    });
   } 
   
    function changeStatus(id,status)
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
              getall();
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
   
     function adminDelete(id)
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
              url: '{{url("spr-admin/adminDelete")}}',
              type: 'post',
              dataType: 'json',
              data: {"_token": "{{ csrf_token() }}", id : id},
        success:function(response){
              getall();
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
   
   function adminEdit(id)
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
             url: '{{url("spr-admin/getsingleAdmin")}}',
             type: 'post',
             dataType: 'json',
             data: {"_token": "{{ csrf_token() }}", id : id},
       success:function(response){
                $('#id').val(response.id);
                $('#firstName').val(response.firstName);
                $('#lastName').val(response.lastName);
                $('#phoneNumber').val(response.phoneNumber);
                $('#updatemyModal .modal-body').html();
                $('#updatemyModal').modal();
               }
           });
        return false;
    } 
   });
     
     } 
   
 function adminUpdate(){
    
  var updateData =  $( "#update_form" ).serialize();
      $.ajax({
             type: 'POST',
             url: '{{url("spr-admin/adminupdate")}}',
             data: updateData,
       success:function(response){
              $('#updatemyModal').modal('hide');
               getall();
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

  function addNewAdmin()
  { 
     swal({
            title: "Are you sure?",
            text: "You want to Add New Admin!",
            icon: "warning",
            buttons: true,
            successMode: true,
   })
   .then((willDelete) => {
      if (willDelete) {
        $('#addNewAdminForm').modal('show');
      } 
      });
     } 
    
 function addnewAdminfor(){

var AddNewAdminData =  $( "#addNewAdminBySpr" ).serialize();

       $.ajax({
             type: 'POST',
             url: '{{url("spr-admin/addNewAdmin")}}',
             data: AddNewAdminData,
       success:function(response){
              $('#addNewAdminForm').modal('hide');
               getall();
               if (response.status == 'success') {
                swal({
                   icon: "success",
                   title: response.msg,
                   timer: 1500  
              });
              $("#registration_form")[0].reset();
             }

            return false; 
              
               }
           });
        return false;

 }
</script>
@endsection