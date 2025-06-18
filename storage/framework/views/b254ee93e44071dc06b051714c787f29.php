

<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <!-- icon -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <!-- <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>
          <div class="info-box-content"> -->
           
            <!-- <span class="info-box-number">

           
            </span> -->
            
          </div>
        </div>
      </div>



      <!-- <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span> -->

          <!-- <div class="info-box-content">
            <span class="info-box-text">Services</span>
            <span class="info-box-number"></span>
          </div> -->

        </div>

      </div>


    <div class="clearfix hidden-md-up"></div>
    </div>
    <div class="col-md-12">
      <div class="card">
    </div>
  </div>
  </div>
  </div>
  </div>

</section>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {

    $('#myTable').DataTable();

  });
</script>

<script>
  $(document).ready(function () {

    $('#myTable_career').DataTable();

  });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\dashboard.blade.php ENDPATH**/ ?>