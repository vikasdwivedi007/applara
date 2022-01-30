<!DOCTYPE html>
<html>
<head>
    <title>registration form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/register.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    .mycontrol {
    background: transparent!important;
    color: white !important;
    border-radius: 10px !important;
}
.btn-primary {
    border-radius: 40px !important;
}
b {
    color: #FF0000;
}
</style>
</head>
<body >

<div class="container">
                    
            <form  class="form-horizontal" role="form" id="registration_form" onsubmit="return Datainsert()" >
                @csrf
                <!--  @if(Session::has('message'))
                       <p class="alert alert-success" id="successmsg" style="background-color: green; color: white;    border-radius: 70px !important;">{{ Session::get('message') }}</p>
                    @endif -->
               <div class="alert alert-success" id="successmsg" style="display: none;  background-color: green; color: white; border-radius: 70px !important;"></div>  
               <marquee direction="">
                <h3 style="color: white;">Registration</h3>
                <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&display=swap" rel="stylesheet">
            </marquee>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" value="{{ old('firstName') }}" onkeypress="return IsAlphaNumeric(event);" name="firstName"  placeholder="First Name" class="form-control mycontrol" autofocus>
                         @error('firstName')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" value="{{ old('lastName') }}" onkeypress="return IsAlphaNumeric(event);" name="lastName" placeholder="Last Name" class="form-control mycontrol" autofocus>
                         @error('lastName')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email"value="{{ old('email') }}" placeholder="Email" class="form-control mycontrol" name= "email">
                         @error('email')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input  type="password" id="password" value="{{ old('password') }}" name="password" placeholder="Password" class="form-control mycontrol">
                         @error('password')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwords" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="confirpassword" value="{{ old('confirpassword') }}" name="confirpassword" placeholder="Confirm Password" class="form-control mycontrol">
                         @error('confirpassword')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>
              
                <div class="form-group">
                    <label for="phoneNumber"  class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-9">
                        <input type="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}" minlength="10" maxlength="10" onclick="return phoneno()" name="phoneNumber" placeholder="Phone number" class="form-control mycontrol">
                         @error('phoneNumber')
                         <b>{{$message}}</b>
                         @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="female" name="gender"  checked="checked" value="1">Male
                                </label>
                            </div>

                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="male" name="gender" value="2">Female
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                  <div class="form-group">
                    <label class="control-label col-sm-3">Roll</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="roll_id"  name="roll_id" value="3">User
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="roll_id" name="roll_id" checked="checked" value="4">Member
                                </label>
                            </div>
                              <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="roll_id" name="roll_id" value="5">Robot
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
             
                <button style="background-color: #5cb85c!important;" type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block">Register</button><br>

                <div class="text-right">
                <a href="{{ url('/') }}">if you are already registered go to login page</a>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
        <script type="text/javascript">
        $(document).ready(function(){
    
  }) ; 
     function IsAlphaNumeric(e) {
         var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
         var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || keyCode == 32 || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
         document.getElementById("error").style.display = ret ? "none" : "inline";
         return ret;
     }
    function phoneno(){ 
            $('#phoneNumber').keypress(function(e) {
                var a = [];
                var k = e.which;
                for (i = 48; i < 58; i++)
                    a.push(i);
                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }

    $( "#submit" ).click(function() {
              var firstName = $('#firstName').val();
             var lastName =  $('#lastName').val();
             var email =     $('#email').val();
             var password =  $('#password').val();
             var confirpassword = $('#confirpassword').val();
             var birthDate =   $('#birthDate').val();
             var phoneNumber = $('#email').val();
             if (firstName == '' || lastName == '' || email == '' || password == '' ||confirpassword == '' ||birthDate == '' || phoneNumber == '' )  {
         swal({
              title: "Sorry?",
              text: "All field is required!!..",
              icon: "warning",
              dangerMode: true,

        });
       return false;  
    }
 });
  

 function Datainsert() {
     var formData = $( "#registration_form" ).serialize();  

        $.ajax({
           url:"{{ url('register') }}",
           method:'POST',
           dataType: "json",
           data: formData,
           success:function(response){
          if(response.status == 'success') {
             swal({
              icon: "success",
               title: response.msg,
               timer: 1500
            });
           //$('#successmsg').text(response.msg);
            $("#registration_form")[0].reset();
          setTimeout(function() {
               $('#successmsg').fadeOut('slow');
                }, 4000); 
          }
            },
           error:function(error){
              console.log(error)
           }
        });
       return false; 

   }
  

        </script>
</body>
</html>