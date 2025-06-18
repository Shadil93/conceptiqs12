

<?php $__env->startSection('title'); ?>
edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="_token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<!--bootartap  font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Croppie CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- font CSS -->

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
      <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
         <?php endif; ?>

    <div class="card" style="width: 50rem; margin-left:70px;">
 <h3 class="ml-3"><u>Update Image</u></h3>
  <div class="card-body">
  <div class="container">
    <div class="row">
        <div class="col-1 ml-2">
       
        </div>
        <div class="col-11">
        <form method="POST" action="<?php echo e(route('update',$data->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>  
        <label>Title</label>
        <input type="text" name="description" class="form-control" value="<?php echo e($data->description); ?>">
        <label>Description</label>
        <input type="text" name="subscription" class="form-control" value="<?php echo e($data->subscription); ?>">
        <!-- <label>Image</label>     -->
        <!-- <input type="file" name="image" class="form-control" value="<?php echo e($data->image); ?>"> -->
         <label>Current Image</label><br>
    <?php if($data->image): ?>
        <img src="<?php echo e(asset('uploads/' . $data->image)); ?>" width="100" height="100">
    <?php endif; ?><br> <label>Upload New Image</label>

    <div class="container mt-4">
     <h4>Upload and Crop Image</h4> 
    <input type="file" name="image" class="image form-control mt-2 mb-4" required> 
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" style="width: 100%;">
                        </div>
                        <div class="col-md-4">
                            <div class="preview" style="width:160px; height:160px; overflow:hidden; border:1px solid #ccc;"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop & Upload</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <!-- <input type="file" name="image" class="form-control image"> -->
        <button type="submit" name="update" class="btn btn-success mt-4"   value="update" onclick="return confirm('Are you sure you want to update this?')">submit</button>
            </form>
        </div>
    </div>
  </div>
  
  
  </div>
</div>
</div>
    <div class="col-md-12">
   
  </div>
  </div>
  </div>
  </div>


</section>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
  
<!-- DataTables JS -->
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- Croppie JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

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
let $modal = $('#modal');
let image = document.getElementById('image');
let cropper = null;

$("body").on("change", ".image", function(e) {
    let files = e.target.files;
    if (files && files.length > 0) {
        let reader = new FileReader();
        reader.onload = function(event) {
            image.src = event.target.result;
            $modal.modal('show');
        };
        reader.readAsDataURL(files[0]);
    }
});
$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
    });
});

$modal.on('hidden.bs.modal', function () {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
});

$("#crop").click(function () {
    if (!cropper) return;

    let canvas = cropper.getCroppedCanvas({
        width: 1500,
        height: 1500,
    });

    canvas.toBlob(function(blob) {
        let reader = new FileReader();
        reader.onloadend = function () {
            let base64data = reader.result;

            $.ajax({
                type: "POST",
                url: "<?php echo e(route('crop-image-upload-ajax')); ?>",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    image: base64data
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $modal.modal('hide');
                    alert("Image cropped and uploaded successfully!");
                },
                error: function (xhr) {
                    alert("Something went wrong while uploading the image.");
                    console.log(xhr.responseText);
                }
            });
        };

        reader.readAsDataURL(blob);
    });
});
</script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\edit.blade.php ENDPATH**/ ?>