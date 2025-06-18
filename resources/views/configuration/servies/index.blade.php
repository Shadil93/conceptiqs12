@extends('configuration.layouts.app')

@section('title')
servies
@endsection

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- font CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
@endsection

@section('body')

@endsection


@section('content')
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
            <form action="{{ route('servies.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
						@foreach ($data as $image)
						<tr>
							<td>
								<span class="num">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</span>
							</td>
							<td>{{ $image->title }}</td>
							<td>{{ $image->description }}</td>
							<td>
								
									<img src="{{ asset('storage/' . $image->image) }}" width="100px" height="100px">
							
							</td>
							<td>
								<a data-toggle="modal" data-target="#editTask_{{ $image->id }}" class="fa-hover waves-effect">
									<i class="fas fa-edit"></i>
								</a>
							</td>
							<td>
								<a data-toggle="modal" data-target="#deleteTask_{{ $image->id }}" class="fa-hover waves-effect">
									<i class="fas fa-trash-alt"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="d-flex justify-content-center mt-3">
					{{ $data->links() }}
				</div>
			</div>
		</div>
	</div>
            @foreach ($data as $image)
                        <div class="modal fade" id="editTask_{{  $image->id }}" tabindex="-1" role="dialog" aria-labelledby="editTaskLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="addTaskLabel">Update </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{route('servies.update', $image->id)}}" method="post"  enctype="multipart/form-data" >
										@csrf
										@method('PUT')
									<div class="modal-body">
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="inputName"> title</label>
													<input type="text" class="form-control" name="title" id="title" placeholder=" title" value="{{ $image->title }}"  >
												</div>
											</div>
											<div class="form-group col-lg-12">
												<label for="description" class="control-label">Description</label>
												<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description here">{{ $image->description }}</textarea>


											</div>
											<!-- <div class="form-group col-lg-6">
											<label for="inputPassword" class="control-label">Image</label>
											<input type="file" class="form-control" name="image" id="image" placeholder="Image"  value="{{ $image->image }}" >
											</div> -->
											<div class="form-group col-lg-6">
											<label for="image" class="control-label">Image</label>
											{{-- Show existing image --}}
											@if($image->image)
												<div class="mb-2">
													<img src="{{ asset('storage/' . $image->image) }}" alt="Current Image" width="100">
												</div>
											@endif
											{{-- File input for uploading new image --}}
											<input type="file" class="form-control" name="image" id="image" placeholder="Image" value="{{ $image->image }}" >
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
            <div class="modal fade" id="deleteTask_{{  $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteTaskLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h4 class="modal-title" id="deleteTaskLabel">Delete Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  	
                  <form action="{{route('servies.delete', $image->id)}}" method="post">
                @csrf
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Delete</button>
                </div>
            </form>
              </div>
            </div>
          </section>
        </div>
        @endforeach
          </div>
          </div>
          </div>
          </div>

        </section>
        </div>

        @endsection
@section('js')
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
@endsection