<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dynamic Admin| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
 
<!-- <style>
body {
  background-position: 70% 30%;
  /* background-position: left; */
  background-image: url('website/img/bg-img/bg-service.jpg');
}
</style> -->
 
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Dynamic Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<span class='invalid' style="color:red;"></span> 


<form method="post" id="formSubmit" data-content="login">
     @csrf
     <span class="username-validation error-validation" style="color:red;"></span>
        <div class="input-group mb-3">
       <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="UserName">
               <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
             </div>
         </div>

         <span class="password-validation error-validation" style="color:red;"></span>  
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

     

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="add_login_btn"   class="btn btn-primary btn-primary">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

       

      
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script>
      var base_url = '{!! url('/') !!}/';
  </script>


<!--admin login -->
<script type="text/javascript">
    $(document).ready(function(e) {
        
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
      });
      //modal validation reset
 
  
  
  $('.error-validation').html('');
  

        // modal form id  ,store
        $('#formSubmit').submit(function(e) {
        e.preventDefault();
       
    

        var formData = new FormData(this);
               //validation
            $('.username-validation').html('');
            $('.password-validation').html('');
            //invalid credential
            $('.invalid').html('');

            
  
          //store  
         $.ajax({
         type: 'post',
          url: base_url+'login',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          //sweet alert
         success: (data) => {
            this.reset();
             

            var url = data.redirect_location;
           console.log(url);



          window.location.href = url;
     
           
             
          },//end sweet alert// validation
          error: function(data) {
            
             //invalid cred
            $('.invalid').html(data.responseJSON.message);
            var username = data.responseJSON.errors.username;
            var password = data.responseJSON.errors.password;
           
            
            
            $('.username-validation').html(username);
            $('.password-validation').html(password);
              //ivalid cred
            $('.invalid').html('');

           
             
          }//end validation
  
        
        });
      });
    });
   </script>




</body>
</html>
