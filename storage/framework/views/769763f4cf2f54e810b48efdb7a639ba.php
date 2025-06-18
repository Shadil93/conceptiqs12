

<?php $__env->startSection('title'); ?>
         Admin Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- change dashboard -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('admin/loader/cover-spin.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div id="loader"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 
<div class="col-md-12">



               
                 
          <section class="content">
          <div class="container-fluid">
          <div class="row">
           
           


          <style>
              .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #31507e;
      }
     </style>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                    
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Change Profile</a></li>
   
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div> 


 



              <div class="card-body">
                
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
        <form action="#" method="post" id="add_profile_form" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
<!-- ............................profile div...................................... -->
<!-- <div class="col-md-6">  -->


      <div class="card card-outline">

           <div class="card-body box-profile">
           <h3 class="profile-username text-center">Admin</h3>
                <div class="text-center">

      <label for="image">
<input type="file" id="image"  name="image" accept="image/*" hidden="" class="form-control"> 
 <img class="img-circle prof image1" src="<?php if(Auth::user()->image): ?> <?php echo e(asset('admin/profilepic/'.Auth::user()->image)); ?> <?php else: ?> <?php echo e(asset('admin/images/no-image.png')); ?> <?php endif; ?>" alt="User Image"  width="100" height="100" id="show">  
     </div>
            <p class="text-muted text-center">
            <div class="details text-center" style="display:none">
            <button type="submit" id="add_profile_btn" class="btn btn-info upload" style="border-radius: 20px;font-size: 14px;">Upload</button>
           </div> <p>
            
          <!-- <p class="text-muted text-center">Al-Adwani General Hospital</p> -->
          
           
        </button>
              </div>
              
             </div>

<!-- </div> -->
<!-- ............................end profile div...................................... -->
</form>
       </div>
                  
<div class="tab-pane" id="settings">
                 <form class="form-horizontal changePasswordAdminForm" action="<?php echo e(url('adminChangePassword')); ?>" method="POST" >
                    <?php echo e(csrf_field()); ?>

                      <div class="form-group row">
                        <div>
                      
                        <label for="CurrentPassword" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="oldPassword" placeholder="Current Password" name="oldPassword">
                        <span class="oldPassword-validation" style="color: red;"></span>
                        <span class='invalid' style="color:red;"></span>    
                        </div>
                         </div>
                      </div>
                      
  
                      <div class="form-group row">
                        <div>
                      <label for="NewPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" placeholder="New Password" name="newPassword">
                         <span class="newPassword-validation" style="color: red;"></span>
                       </div>
                          </div>
                      </div>
                 
 
                      <div class="form-group row">
                        <div class="form-group">
                        <label for="ConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">

                        <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" name="ConfirmPassword">
                        <span class="ConfirmPassword-validation" style="color: red;"></span>
                         
                        </div>
                      </div>

                      
                         </div> 
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="add_password_btn" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    
           
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>




<script>
$(document).ready(function(){
  $(".btn").click(function(){
    $(".details").hide();
  });
  $("#show").click(function(){
    $(".details").show();
  });
});
</script>
 

<script type="text/javascript">

$(document).ready(function(e) {
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//image preview
$('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
        $('.image1').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
      });
       






       $("#add_profile_form").submit(function(e) {
        e.preventDefault();
            $("#loader").show();
            var formData = new FormData(this);
            var id =$(this).data('id');


              $(".upload").show();
            
            $('.image-validation').html('');
            $('.image1').html('');
            $('.image').html('');
             
        $.ajax({
          type: 'post',
          url:base_url+'admin/profile',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
            success: (data) => { 
 
            this.reset();
             
            $("#loader").hide();

            $("#add_profile_form")[0].reset();
            $('.image1').html('');
            $('.image').html('');
            
            $('.prof').attr('src',base_url+'admin/profilepic/'+data.image)
          
             

              // Swal.fire(
              //   'Updated!',
              //   'Profile Updated Successfully!',
              //   'success'
              // );


          console.log(data.message);
          var message = data.message;
          // alert(message);


          if (data.status == true)

          {

            Swal.fire(

              '',

              message,

              'success'

            );
            

          } else if (data.status == false) {

            Swal.fire(

              '',

              message,

              'error'

            );

          }











               
            }, 
          error: function(data) {
            $("#loader").hide();
             var image = data.responseJSON.errors.image;
           
             $('.image-validation').html(image);

            
          }
        });

        });
      });

</script>
 
<script>

$(document).ready(function(e) {
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
       $(".changePasswordAdminForm").submit(function(e) {
        e.preventDefault();

        $("#loader").show();

            var formData = new FormData(this);
            var id =$(this).data('id');
            $('.oldPassword-validation').html('');
            $('.newPassword-validation').html('');
            $('.ConfirmPassword-validation').html('');
            $('.invalid').html('');

          $.ajax({
            type: 'POST',
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function() {},
            success: (data) => { 
            this.reset();
              $("#loader").hide();
            $(".changePasswordAdminForm")[0].reset();

            Swal.fire(
                'updated!',
                ' Password  Successfully changed!',
                'success'
              );

              oodoCareerSubmit(formData)

            },
              error: function(data) {

                $("#loader").hide();
              $('.invalid').html(data.responseJSON.message);
             var oldPassword = data.responseJSON.errors.oldPassword;
             var newPassword = data.responseJSON.errors.newPassword;
             var ConfirmPassword = data.responseJSON.errors.ConfirmPassword;
              
             $('.oldPassword-validation').html(oldPassword);
             $('.newPassword-validation').html(newPassword);
             $('.ConfirmPassword-validation').html(ConfirmPassword);
             $('.invalid').html('');


              
           }
           //end validation
           });
       });
     });

</script>

<script>
    var hidden = false;
    function action() {
        hidden = !hidden;
        if(hidden) {
            document.getElementById('togglee').style.visibility = 'hidden';
        } else {
            document.getElementById('togglee').style.visibility = 'visible';
        }
    }
</script> 


<script>
    function oodoCareerSubmit(formData) {
        console.log(formData);
        $.ajax({
            type: "post",
            url:"http://206.189.140.141:8050/api/applications",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                Swal.fire(
                        'Thank You!',
                        ' Thank You For Contacting Us!',
                        'success'
                    );
            },
            error: function(result) {
                $("#loader").hide();
            }

        });
    }
</script>
<?php $__env->stopSection(); ?>






 
   
 
<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\profile.blade.php ENDPATH**/ ?>