<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
  .btn-success {
    border-radius: 20px !important;
}
 b {
   color: #FF0000;
   font-family: bold;
 }
  </style>
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/login.css">
 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body style="background-image: url('http://getwallpapers.com/wallpaper/full/f/1/0/20960.jpg');">

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white' style="margin-top: -100px !important;">Login Form</h1>
                @if(Session::has('message'))
                <p class="alert alert-danger" id="errormsg" style="background-color: red; color: white; border-radius: 60px;">{{Session::get('message') }}</p>
                @endif
              <div class="form-login"></br>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                <h4>User & Member Login from</h4>
                </br>
                <input type="email" id="email" name="email" value="{{ old('email') }}"  class="form-control input-sm chat-input" placeholder="Enter Email"/>
                @error('email')
                <b>{{$message}}</b>
                @enderror
                </br></br>
                <input type="password" id="password"  value="{{ old('password') }}" name="password" class="form-control input-sm chat-input" placeholder="Enter password"/>
                @error('password')
                <b>{{$message}}</b>
                @enderror
                <br>
                 <!--  <div class="text-left" >
                        <input type="checkbox" class="form-check-input" id="exampleCheck1"><br>
                        <label class="custom" style="text-align: right 20px;">Remember me</label>
                </div>
                </br></br> -->
               
                <div class="wrapper">
                        <span class="group-btn">
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success  btn-block neClassbtn">login</button>
                        </span>
                </div><br>
                  <div class="wrapper">
                        <span class="group-btn">
                            <a  href="{{ url('loginWithgoogle') }}" style="border-radius: 20px !important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-danger  btn-block neClassbtn">Login With Google +</a>
                        </span>
                </div><br>
                 <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important;  background-color: #385898 !important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary  btn-block neClassbtn">Login With Facebook</a>
                        </span>
                </div><br>
                 <!-- <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important; background: #E1306C !important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-danger  btn-block neClassbtn">Login With Instagram</a>
                        </span>
                </div><br>
                 <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important; background: #0073b1 !important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary  btn-block neClassbtn">Login With LinkedIn</a>
                        </span>
                </div><br>
                <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important; background: rgb(29, 161, 242)!important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary  btn-block neClassbtn">Login With Twitter</a>
                        </span>
                </div><br>
                  <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important; background: #444!important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary  btn-block neClassbtn">Login With GitHub</a>
                        </span>
                </div><br>
                <div class="wrapper">
                        <span class="group-btn">
                            <a  href="" style="border-radius: 20px !important; background: #324fe1!important;" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary  btn-block neClassbtn">Login With yahoo</a>
                        </span>
                </div> -->

            </div>
            </form>
        </div>
    </div>
    </br></br></br>
    <!--footer-->
    <div class="footer text-white text-center">
        <p> if you are not registered<a href="{{ url('register') }}">go to registration form</a></p>
    </div>
    <!--//footer-->
</div>
<script type="text/javascript">
   $(document).ready(function(){
      setTimeout(function() {
      $('#errormsg').fadeOut('slow');
       }, 5000); 
  }) ; 
 $('#submit').click(function(){
       var email = $('#email').val();
       var password = $('#password').val(); 
          if (email == '' || password == '') {
         swal({
              title: "Sorry?",
              text: "Email and Password Field is Required!!..",
              icon: "warning",
              dangerMode: true,
        });
         return false;
    }

});
</script>
</body>
</html>
