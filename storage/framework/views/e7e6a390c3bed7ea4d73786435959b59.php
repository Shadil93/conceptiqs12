

<?php $__env->startSection('title'); ?>
servies
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <!-- icon -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>
          <div class="info-box-content">
           
            <!-- <span class="info-box-number">

        
            </span> -->
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Services</span>
            <span class="info-box-number"></span>
          </div>
        </div>
      </div>
    <div class="clearfix hidden-md-up"></div>
    </div>
    <div class="col-md-12">

		   <button type="button" style="margin-left:60rem;" class="btn btn-success"  data-toggle="modal" data-target="#addTask">
				Add 
		   </button>
      <div class="card">
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('servies.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="addTaskLabel">Add</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form fields -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" class="form-control" name="title" id="Title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputPassword" class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>
            </form>
        </div>
    </div>
</div>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Description</th>
							<th>Image</th>
							<th colspan="2" style="text-align: center;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<span class="num"><?php echo e(($data->currentPage() - 1) * $data->perPage() + $loop->iteration); ?></span>
							</td>
							<td><?php echo e($image->title); ?></td>
							<td><?php echo e($image->description); ?></td>
							<td>
								
									<img src="<?php echo e(asset('storage/' . $image->image)); ?>" width="100px" height="100px">
							
							</td>
							<td>
								<a data-toggle="modal" data-target="#editTask_<?php echo e($image->id); ?>" class="fa-hover waves-effect">
									<i class="fas fa-edit"></i>
								</a>
							</td>
							<td>
								<a data-toggle="modal" data-target="#deleteTask_<?php echo e($image->id); ?>" class="fa-hover waves-effect">
									<i class="fas fa-trash-alt"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<div class="d-flex justify-content-center mt-3">
					<?php echo e($data->links()); ?>

				</div>
			</div>
		</div>
	</div>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="modal fade" id="editTask_<?php echo e($image->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editTaskLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="addTaskLabel">Update </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="<?php echo e(route('servies.update', $image->id)); ?>" method="post"  enctype="multipart/form-data" >
										<?php echo csrf_field(); ?>
										<?php echo method_field('PUT'); ?>
									<div class="modal-body">
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="inputName"> title</label>
													<input type="text" class="form-control" name="title" id="title" placeholder=" title" value="<?php echo e($image->title); ?>"  >
												</div>
											</div>
											<div class="form-group col-lg-12">
												<label for="description" class="control-label">Description</label>
												<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description here"><?php echo e($image->description); ?></textarea>


											</div>
											<!-- <div class="form-group col-lg-6">
											<label for="inputPassword" class="control-label">Image</label>
											<input type="file" class="form-control" name="image" id="image" placeholder="Image"  value="<?php echo e($image->image); ?>" >
											</div> -->
											<div class="form-group col-lg-6">
											<label for="image" class="control-label">Image</label>
											
											<?php if($image->image): ?>
												<div class="mb-2">
													<img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="Current Image" width="100">
												</div>
											<?php endif; ?>
											
											<input type="file" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo e($image->image); ?>" >
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
									</div>
								</div>
							</form>
							</div>
              </div>
            <div class="modal fade" id="deleteTask_<?php echo e($image->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteTaskLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h4 class="modal-title" id="deleteTaskLabel">Delete Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  	
                  <form action="<?php echo e(route('servies.delete', $image->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Delete</button>
                </div>
            </form>
              </div>
            </div>
          </section>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    $('#servicesTable').DataTable();
  });
</script>

<script>
// Suppress browser extension errors
window.addEventListener('error', function (e) {
  if (e.message && e.message.includes('message channel closed')) {
    e.preventDefault();
    return false;
  }
});

window.addEventListener('unhandledrejection', function (e) {
  if (e.reason && e.reason.message &&
    (e.reason.message.includes('message channel closed') ||
      e.reason.message.includes('Extension context invalidated'))) {
    e.preventDefault();
    return false;
  }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('configuration.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\servies\index.blade.php ENDPATH**/ ?>