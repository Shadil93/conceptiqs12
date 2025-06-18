<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"href="<?php echo e(asset('admin/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/adminlte.min.css')); ?>">
  <!-- custom -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/custom.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/lobibox/lobibox.css')); ?>">
<!--data table CSS -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css" rel="stylesheet" />
<!--alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="<?php echo e(asset('admin/loader/cover-spin.css')); ?>">

<?php echo $__env->yieldContent('css'); ?>
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
      color: #fff;
      background-color: #31507e;
  }
</style>
<style>
  * {
      box-sizing: border-box;
  }

  table {
      table-layout: fixed;
      /* border-collapse: collapse; */
      width: 100%;

      /* max-width: 100px; */

  }

  td {
      /* background: #86dbd7; */
      padding: 25px;
      overflow: hidden;
      white-space: nowrap;
      width: 100px;
      border: solid 1px #666;
  }
</style>
<style>
  select {
      font-family: fontAwesome
  }
</style>
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php echo $__env->yieldContent('body'); ?>
  <div class="wrapper">
 
    
    <nav class="main-header navbar navbar-expand navbar-dark">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
           <a href="<?php echo e(url('/dashboard')); ?>" class="nav-link">Dashboard</a>
        </li>
         
      </ul>

 
      <ul class="navbar-nav ml-auto">
   
       

        <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
       <li class="nav-item">
         <a class="nav-link py-1" data-toggle="dropdown" href="#">
                    <img class="img-circle prof" src="<?php if(Auth::user()->image): ?> <?php echo e(asset('admin/profilepic/'.Auth::user()->image)); ?> <?php else: ?> <?php echo e(asset('admin/images/no-image.png')); ?> <?php endif; ?>"
                        alt="User Image"  width="40" height="40">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>

                    <a href="<?php echo e(url('admin/profile')); ?>" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>Profile
                        <span class="float-right text-muted text-sm"></span>
                    </a>

                    <div class="dropdown-divider"></div>
 
                   <a href="<?php echo e(url('logout')); ?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Logout
                    </a>
                   
          </div>
      </li>
    </ul>
  </nav>

<!-- ................................................................................. -->

<?php echo $__env->make('configuration.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
 
<!-- ...................................................................... -->

  
<div class="content-wrapper">
 
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0">Dashboard</h1> -->
            </div> 
            <div class="col-sm-6">
              
            </div>
          </div>
        </div>
      </div>
 
      <?php echo $__env->yieldContent('content'); ?>
  





  
  <script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
  <?php echo $__env->yieldContent('js'); ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--------------------LobyBOX-------------------->
<script src="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/js/lobibox.min.js"></script>
  <script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/dist/js/adminlte.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/raphael/raphael.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/dist/js/demo.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/dist/js/pages/dashboard2.js')); ?>"></script>
  <!--alertify JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
      var base_url = '<?php echo url('/'); ?>/';
  </script>
<!--sweet alert JavaScript -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--data table JavaScript -->
 
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script>

window.addEventListener( "pageshow", function ( event ) {
      // alert("hhhhh")
  var historyTraversal = event.persisted ||
                         ( typeof window.performance != "undefined" &&
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});

 

</script>
 <script>
  
if( window.history && window.history.pushState ){

history.pushState( "nohb", null, "" );
$(window).on( "popstate", function(event){
  if( !event.originalEvent.state ){
    history.pushState( "nohb", null, "" );
    return;
  }
});
}
 </script>
 
</body>

</html><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\layouts\app.blade.php ENDPATH**/ ?>