@extends('layouts.app')
@section('content')<br><br>

<div class="panel-body">
	<h2>Change Password</h2> 
	   <div class="container">
	   	<form name="ChangePass" id="ChangePass" autocomplete="off" onsubmit="return sprChangepass()">
	<div class="row">
		<div class="col-sm-4">
		   @csrf
		    <input type="hidden" name="id" value=" {{ $id = Auth::user()->id }}">
		    <label>Current Password</label>
		    <div class="form-group pass_show"> 
                <input type="password" value="" name="currentPass" minlength="8" id="currentPass"
                autocomplete="off"  class="form-control" placeholder="Current Password"> 
                @error('currentPass')
                <p>{{$message}}</p>
                @enderror
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" name="password" minlength="8" id="password"
                autocomplete="off"  class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" name="confirmPass" minlength="8" id="confirmPass"
                autocomplete="off"  class="form-control" placeholder="Confirm Password"> 
            </div> 

            <div class="form-group"> 
              <button type="submit" class="btn btn-success  btn-lg btn-block" name="submit" id="submit">Change password</button>
            </div> 
            
		</div>  
	</div>
</div>
 </form>
</div> 


<script type="text/javascript">

$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
 $(document).on('click','.pass_show .ptxt', function(){ 
$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
   
  $('#submit').click(function(){
     
     var currPass = $('#currentPass').val();
     var Pass = $('#password').val();
     var confimPass = $('#confirmPass').val(); 

     if (currPass == '' || Pass == '' || confirmPass =='') {
          swal({
              title: "Sorry?",
              text: "All Field is Required!!..",	
              icon: "warning",
              dangerMode: true,
         });
         return false
     } else if (Pass !=  confimPass) {
     	 swal({
              title: "Not matched?",
              text: "Your New Password is Not Match From Confirm Password Field",	
              icon: "warning",
              dangerMode: true,
         });
         return false
     }

   });

	function sprChangepass(){
    
     var formData = $('#ChangePass').serialize();
     //alert(formData); return false;
   
        $.ajax({
           url:"{{ url('spr-admin/ChangePAssword') }}",
           method:'POST',
           dataType: "json",
           data: formData,
           success:function(response){
           	console.log(response); return false;
            //  if (response.status == 'success') {
            //    swal({
            //         icon: "success",
            //         title: response.msg,
            //         timer: 1500
            // });
            //   $("#ChangePass")[0].reset();
            //  //  return false;  
            //  }

          },
         error:function(response){
         	console.log(response); return false;
        //    if (response.status == 'error') {
        //        swal({
	       //        title: "Sorry?",
	       //        text: error.msg,	
	       //        icon: "warning",
	       //        dangerMode: true,
        //  });
        //  return false;

        //   }          
        } 

     });
    return false;
	}
</script>
@endsection