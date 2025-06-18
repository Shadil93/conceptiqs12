 

<?php $__env->startSection('title'); ?>
register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<meta name="_token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<!--bootartap  font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Croppie CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
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

    <div class="card" style="width: 50rem; margin-left:70px;">
 <h3 class="ml-3"><u>Add Image</u></h3>
  <div class="card-body">
  <!-- <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
         <?php endif; ?> -->

         <?php if(Session::has('success')): ?>  
  <div class="container">
  <div class="alert alert-success">
             <?php echo e(Session::get('success')); ?>

      </div>
  <?php endif; ?>
    <div class="row">
     
        <div class="col-1 ml-2">
        </div>
        <div class="col-11">
      
                <?php echo csrf_field(); ?>
         <label>Title</label>
        <input type="text" name="description" class="form-control" required>
        <label>Description</label>
        <input type="text" name="subscription" class="form-control" required>
        <!-- <label>Image</label>    
        <input type="file" name="image" class="form-control"> -->

   
        <!-- <div class="card text-center"  id="imageupload" x>
          <div class="card-header">
            uploaded & cropping 
          </div>
          <div class="card-body">
            <div id="image_demo" style="width:350px; height:100px; margin-top:30px;"></div>
          </div>
          <div class="card-footer text-muted">
            <button class="crop_image">Crop & Upload Image</button> 
        </div>
        </div> -->



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


        <!-- <?php if(session('uploaded_image')): ?>
        <div class="mt-3">
            <strong>Preview of Cropped Image:</strong><br>
            <img src="<?php echo e(asset('uploads/' . session('uploaded_image'))); ?>" style="width:200px; height:auto; border:1px solid #ccc;">
        </div>
        <?php endif; ?> -->

           <button type="submit" name="submit" class="btn btn-success mt-4" >submit</button>
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

<?php $__env->startSection('scripts'); ?>
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



<?php $__env->startSection('js'); ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
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
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let $modal = $('#modal');
    let image = document.getElementById('image');
    let cropper = null;

 



    // When a user selects an image
    $("body").on("change", ".image", function(e) {
        let files = e.target.files;

        if (files && files.length > 0) {
            let reader = new FileReader();

            reader.onload = function(event) {
                image.src = event.target.result;
                $modal.modal('show'); // Show cropping modal
            };

            reader.readAsDataURL(files[0]); // Read file as base64
        }
    });

    // When the modal is shown, initialize the cropper
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1, // Square crop
            viewMode: 3,
            preview: '.preview'
        });
    });

    // When the modal is hidden, destroy the cropper
    $modal.on('hidden.bs.modal', function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    // When user clicks "Crop & Upload" button
    $("#crop").click(function () {
        if (!cropper) return;

        // Get cropped image as canvas
        let canvas = cropper.getCroppedCanvas({
            width: 2000,
            height:2000,
        });

        // Convert canvas to blob and send to server via AJAX
        canvas.toBlob(function(blob) {
            let reader = new FileReader();

            reader.onloadend = function () {
                let base64data = reader.result;

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('crop-image-upload-ajax')); ?>",
                    data: {
                        _token: $('meta[name="_token"]').attr('content'),
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
<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\register.blade.php ENDPATH**/ ?>