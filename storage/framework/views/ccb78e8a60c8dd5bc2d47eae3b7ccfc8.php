

<?php $__env->startSection('title'); ?>
view
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__env->stopSection(); ?>






<?php $__env->startSection('content'); ?>



<section class="content">
  <div class="container-fluid">
    <!-- icon -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
            <!-- <div class="info-box">
            <span class=""></a></span>

            <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number">

            
                </span>
            </div>

            </div> -->
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <!-- <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"></span>

          <div class="info-box-content">
            <span class="info-box-text"></span>
            <span class="info-box-number"></span>
          </div>

        </div> -->

      </div>
      <div class="clearfix hidden-md-up">
      </div>
<div class="container">
        <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info" style="margin-left:55rem; ">
         <button  class="btn btn-success ml-3" ><a href="/register" style="color:#fff">Add</a><br></button>
          <div class="">
          <!-- <span class=""><a href="/view">view</a></span>  -->
          </div>
        </div>
      </div>
            <div class="col-3">
            </div>
           <table class="table ">
            <tr>
                <th>#</th>
                <th>description</th>
                <th>subscription</th>
                <th>image</th>
                <th colspan="2" style="text-align: center;">Action</th>
</tr>   
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><span class="num"><?php echo e(($data->currentPage() - 1) * $data->perPage() + $loop->iteration); ?></span></td>
                <td><?php echo e($datas->description); ?></td>
                <td><?php echo e($datas->subscription); ?></td>
                <td>
                 <?php
                    $uploadPath = public_path('uploads/' . $datas->image);
                    $storagePath = storage_path('app/public/images/' . $datas->image);
                ?>

                <?php if(file_exists($uploadPath)): ?>
                    <img src="<?php echo e(asset('uploads/' . $datas->image)); ?>" width="100px" height="100px">
                <?php elseif(file_exists($storagePath)): ?>
                    <img src="<?php echo e(asset('storage/images/' . $datas->image)); ?>" width="100px" height="100px">
                <?php else: ?>
                    <span>No image available</span>
                <?php endif; ?>
                </td>
                <!-- <img src="<?php echo e(asset('storage/images/' . $datas->image)); ?>" width="100px" height="100px"> -->
                <!-- <img src="<?php echo e(asset('uploads/' . $datas->image)); ?>" width="100px" height="100px"> -->
                 
                 <!-- <td><img src="<?php echo e(asset('storage/images/' .$datas->images)); ?>"  width="100px" height="100px"></td> -->
                 <!-- <td><img src="<?php echo e(asset($datas->image)); ?>"  width="100px" height="100px"></td> -->
                <!-- <td><a href="<?php echo e(route('configuration.edit',$datas->id)); ?>" class="btn btn-success">edit</a></td> -->
                <td class="text-center">
                    <a href="<?php echo e(route('configuration.edit', $datas->id)); ?>" class="btn btn-sm btn-light" title="Edit">
                        <i class="bi bi-pen text-warning"></i>
                    </a>
                </td>

                <!-- <td class="text-center">
                  <form action="<?php echo e(route('delete', $datas->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                       
                       <button type="submit" class="btn btn-sm btn-light text-danger"  onclick="return confirm('Are you sure you want to delete this?')">
                          <i class="bi bi-trash-fill"></i>
                      </button>
                  </form>  -->
              </td> 
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </table>
  </div>
</div>
<div>
<?php echo e($data->links()); ?>

</div>
</div>
    <div class="col-md-12">
   
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
<script>
$('#button_delete').click(function() {  
  // Prevent default button action
  event.preventDefault();

  // Get pagination information
  const currentPage = new URLSearchParams(window.location.search).get('page') || 1;

  $.ajax({
    type: 'POST',  
    cache: false,
    url: 'test.php',
    data: $.extend(
      $('#form1').serialize(), 
      { 
        'last_id': $('#table tr:last').attr('id'),
        'page': currentPage // Pass current page to maintain pagination state
      }
    ), 
    dataType: 'json',
    success: function(data) {            
      if(data.success === 1) {
        // Remove deleted rows
        $.each(data.id, function(index, value) {       
          $('#'+value).remove();
        });
        
        // Add new rows if available
        $.each(data.new_rows_data, function(i, val) {
          $('#table').append('<tr id="'+val.id+'">'+
            '<td></td>'+
            '<td></td>'+
            '<td>'+val.message+'</td>'+           
            '</tr>');
        });

        // Update pagination if needed (optional)
        if(data.paginationHtml) {
          $('.pagination-container').html(data.paginationHtml);
        }
      } else if(data.error) {
        // Handle error message
        alert(data.error);
      }
    },
    error: function(xhr, status, error) {
      console.error("AJAX Error:", error);
      alert("An error occurred while processing your request.");
    }
  });

  return false;
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\view.blade.php ENDPATH**/ ?>