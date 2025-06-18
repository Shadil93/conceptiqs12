@extends('configuration.layouts.app')

@section('title')
Portfolio
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

<script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!--bootartap  font CSS --->
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .content-wrapper {
        min-height: 100vh;
        padding: 20px 0;
    }

    .btn-open-popup {
        padding: 12px 24px;
        font-size: 18px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    /* .modal-content{
        margin-top: 100px !important;

    } */

    .btn-open-popup:hover {
        background-color: #4caf50;
    }

    .overlay-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1050;
    }

    .popup-box {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        width: 560px;
        text-align: center;
        opacity: 0;
        transform: scale(0.8);
        animation: fadeInUp 0.5s ease-out forwards;
    }

    .form-container {
        display: flex;
        flex-direction: row;
    }

    .form-label {
        margin-bottom: 10px;
        font-size: 16px;
        color: #444;
        text-align: left;
    }

    .form-input {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    .btn-submit,
    .btn-close-popup {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-submit {
        background-color: green;
        color: #fff;
    }

    .btn-close-popup {
        margin-top: 12px;
        background-color: #e74c3c;
        color: #fff;
    }

    .btn-submit:hover,
    .btn-close-popup:hover {
        background-color: #4caf50;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }

    .btn-edit {
        color: #ffc107;
        border: 1px solid #ffc107;
    }

    .btn-edit:hover {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-delete {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    img {
  max-width: 100%;
  display: block;
  touch-action: none; /* Add this */
}

    /* Keyframes for fadeInUp animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animation for popup */
    .overlay-container.show {
        display: flex;
        opacity: 1;
    }

    /* Preview styling */
    .image-preview {
        width: 160px;
        height: 160px;
        overflow: hidden;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 0 auto;
    }

    /* Form validation styling */
    .was-validated .form-control:invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .form-control:valid {
        border-color: #28a745;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }

    .was-validated .form-control:invalid ~ .invalid-feedback {
        display: block;
    }
</style>
@endsection

@section('body')


@endsection

@section('content')
<section class="content">
    <div class="container">
        <!-- Flash Messages -->
        @if(Session::has('success'))  
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(Session::has('error'))  
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <!-- @if(session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            @if($errors->any())
                toastr.error("{{ $errors->first() }}");
            @endif -->

        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- <h2 class="mb-0">Portfolio Items</h2> -->
            <!-- <button class="btn btn-success btn-open-popup" onclick="togglePopup()">
                <i class="bi bi-plus-lg mr-1"></i> Add New Item
            </button> -->
                <div class="col-md-12  ">
		   <!-- <button type="button" style="margin-left:60rem;" class="btn btn-success"  data-toggle="modal" data-target="#addTask">
				Add 
		   </button> -->
           <button type="button" style="margin-left:60rem;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTask">
                +Add
           </button>
      <div class="card">
        <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addServiceForm" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">+Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Title -->
                    <!-- <div class="form-group mb-2">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" name="title" id="Title" required>
                    </div> -->
                    <div class="form-group mb-2">
    <label for="Title">Title</label>
    <input type="text" class="form-control" name="title" id="Title" required>
    <!-- <div class="invalid-feedback">Title is required.</div> -->
</div>
                    <!-- Description -->
                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <!-- Image -->
                    <!-- <div class="form-group mb-2">
                        <label for="imageInput">Image</label>
                        <input type="file" class="form-control image-input" data-target="cropped_image_hidden" accept="image/*" required>
                        <input type="hidden" name="cropped_image" id="cropped_image_hidden">
                        <div class="image-preview mt-2" style="display: none;"></div>
                    </div> -->
                    <div class="form-group">
                    <label for="imageInput">Image</label>
                    <input type="file" class="form-control image-input" data-target="cropped_image_add" accept="image/*" required>
                    <div class="invalid-feedback">Please select an image</div>
                     <input type="hidden" name="cropped_image" id="cropped_image_hidden"> 
                     
                    <div  class="image-preview mt-2" style="display: none;"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>
            </div>
        </form>
    </div>
</div>
        </div>

        <!-- Blog Data Table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover" >
                        
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="width: 150px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                                                <tbody>
                                                @forelse ($blogs as $blog)
                        <tr>
                            <td>{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description}}</td>
                            <td>
                                @php
                                $uploadPath = public_path('uploads/' . $blog->image);
                                $storagePath = storage_path('app/public/images/' . $blog->image);
                                @endphp

                                @if(file_exists($uploadPath))
                                <img src="{{ asset('uploads/' . $blog->image) }}" width="100" height="100" class="img-thumbnail">
                                @elseif(file_exists($storagePath))
                                <img src="{{ asset('storage/images/' . $blog->image) }}" width="100" height="100" class="img-thumbnail" alt="Preview">
                                @else
                                <span class="badge badge-secondary">No image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTask_{{ $blog->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- <td>
								<a data-toggle="modal" data-target="#deleteTask_{{ $blog->id }}" class="fa-hover waves-effect">
									<i class="fas fa-trash-alt"></i>
								</a>
							</td> -->
                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                                <td colspan="5" class="text-center">No items found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination -->
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
<!--new-->@foreach($blogs as $blog)
<!-- <div class="modal fade" id="editTask_{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="editTaskLabel_{{ $blog->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h4 class="modal-title">Edit Blog</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="description" class="form-control" value="{{ $blog->description }}" required>
                    </div>

                    <div class="form-group">
                        <label>Subscription</label>
                        <input type="text" name="subscription" class="form-control" value="{{ $blog->subscription }}" required>
                    </div>

                    <div class="form-group">
                        <label>Current Image</label><br>
                        @if($blog->image && file_exists(public_path('uploads/' . $blog->image)))
                            <img src="{{ asset('uploads/' . $blog->image) }}" width="100">
                        @else
                            <span>No image</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<div class="modal fade" id="editTask_{{ $blog->id }}" tabindex="-1" aria-labelledby="editTaskLabel_{{ $blog->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskLabel_{{ $blog->id }}">Edit Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Title -->
                    <div class="form-group mb-2">
                        <label for="edit_title_{{ $blog->id }}">Title</label>
                        <input type="text" class="form-control" name="title" id="edit_title_{{ $blog->id }}" value="{{ $blog->title }}" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-2">
                        <label for="edit_description_{{ $blog->id }}">Description</label>
                        <input type="text" class="form-control" name="description" id="edit_description_{{ $blog->id }}" value="{{ $blog->description }}" required>
                    </div>

                    <!-- Current Image -->
                    <div class="form-group mb-2">
                        <label>Current Image</label><br>
                        @if($blog->image && file_exists(public_path('uploads/' . $blog->image)))
                            <img src="{{ asset('uploads/' . $blog->image) }}" width="100" class="img-thumbnail">
                        @else
                            <span>No image</span>
                        @endif
                    </div>

                    <!-- Upload New Image -->
                    <div class="form-group mb-2">
                        <label for="edit_image_{{ $blog->id }}">Upload New Image</label>
                        <!-- <input type="file" name="image" class="form-control" id="edit_image_{{ $blog->id }}"> -->
                         <input type="file" class="form-control image-input" data-target="cropped_image_edit_{{ $blog->id }}" accept="image/*">
                        <input type="hidden" name="cropped_image" id="cropped_image_edit_{{ $blog->id }}">
                        <div class="image-preview mt-2" style="display: none;"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endforeach<!-- Modal for Image Cropping -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <img id="image" src="" style="max-width: 100%; display: block;">
                    </div>
                    <div class="col-md-4">
                        <div class="preview" style="width: 160px; height: 160px; overflow: hidden; border: 1px solid #ccc;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop & Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- 1. jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">       

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- 2. Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- 3. Cropper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<!-- 4. Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- 5. DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- 6. Custom JS (optional, only if file exists in public/js) -->
{{-- <script src="{{ asset('js/your-custom.js') }}"></script> --}}
<script>
    // Enable Bootstrap custom validation
    (function () {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>


<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    const $modal = $('#modal');
    const image = document.getElementById('image');
    let cropper, targetInputId, file;

    $("body").on("change", ".image-input", function (e) {
        file = e.target.files[0];
        if (!file) return;

        targetInputId = $(this).data('target');

        const reader = new FileReader();
        reader.onload = function (event) {
            image.src = event.target.result;
            $modal.modal('show');
        };
        reader.readAsDataURL(file);
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
        if (!cropper) {
            toastr.error("Cropper not initialized.");
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert("Please upload an image smaller than 2MB.");
            return;
        }

        const canvas = cropper.getCroppedCanvas({ width: 400, height: 400 });
        canvas.toBlob(function (blob) {
            const reader = new FileReader();
            reader.onloadend = function () {
                const base64data = reader.result;

                $.ajax({
                    type: "POST",
                    url: "{{ route('crop-image-upload-ajax') }}",
                    data: { image: base64data },
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            if (targetInputId) {
                                $('#' + targetInputId).val(response.file_name);
                            }
                            $('#cropped_image_hidden').val(response.file_name);

                            const previewContainer = $('#' + targetInputId)
                                .closest('.form-group')
                                .find('.image-preview');

                            if (previewContainer.length) {
                                previewContainer.html(
                                    `<img src="${response.image_url}" class="img-thumbnail" style="max-height: 150px;">`
                                );
                            }

                            $modal.modal('hide');
                            toastr.success("Image cropped and uploaded successfully.");
                        } else {
                            toastr.error("Upload failed: " + response.message);
                        }
                    },
                    error: function (xhr) {
                        toastr.error("AJAX error " + xhr.status);
                        console.error(xhr.responseText);
                    }
                });
            };
            reader.readAsDataURL(blob);
        }, 'image/png', 0.9);
    });
});
</script>

    
@endsection
