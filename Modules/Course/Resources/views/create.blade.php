@extends('layouts.admin')
@section('title') Course Create @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Course</h3>
                        <a href="{{ route('module.course.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <form class="form-horizontal" action="{{ route('module.course.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row justify-content-center pt-3 pb-4">
                            <div class="col-md-8">
                                @csrf
                                <input id="instructor_id_input" type="hidden" name="instructor_id"
                                    value="{{ auth()->id() }}">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Course Title <span class="text-danger">*</span></label>
                                            <input value="{{ old('title') }}" name="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Enter Title" required autocomplete="off">
                                            @error('title') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select name="category_id" required
                                                class="select2bs4 w-100 @error('category_id') is-invalid @enderror">
                                                <option value="" selected class="d-none">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == old('category_id') ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::getDefaultDriver() == 'admin')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Instructor <span class="text-danger">*</span></label>
                                                <select id="instructor_select" required
                                                    class="select2bs4 w-100 @error('instructor_id') is-invalid @enderror">
                                                    <option value="" selected class="d-none">Select Instructor</option>
                                                    @foreach ($instructors as $instructor)
                                                        <option value="{{ $instructor->id }}">
                                                            {{ $instructor->firstname . ' ' . $instructor->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('instructor_id') <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Course Type <span class="text-danger">*</span></label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input onclick="courseType('paid')" type="radio" id="paidcourse" checked
                                                        name="course_type" value="Paid">
                                                    <label for="paidcourse">Paid Course</label>
                                                </div>
                                                <div class="icheck-success d-inline ml-3">
                                                    <input onclick="courseType('free')" type="radio" id="freecourse"
                                                        name="course_type" value="Free">
                                                    <label for="freecourse">Free Course</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="coursetype">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input id="price" value="{{ old('price') }}" name="price" type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Enter Price" autocomplete="off">
                                            @error('price') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Discount Price</label>
                                            <input id="discount_price" value="{{ old('discount_price') }}"
                                                name="discount_price" type="text" class="form-control "
                                                placeholder="Enter Discount Price" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Level </label>
                                            <select name="level" class="form-control @error('level') is-invalid @enderror">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Expert">Expert</option>
                                            </select>
                                            @error('level') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Video Duration (Hours) <span class="text-danger">*</span></label>
                                            <input value="{{ old('duration') }}" name="duration" type="number"
                                                class="form-control @error('duration') is-invalid @enderror"
                                                placeholder="Total hours" required autocomplete="off">
                                            @error('duration') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Video Type </label>
                                            <select name="video_type"
                                                class="form-control @error('video_type') is-invalid @enderror">
                                                <option value="youtube">Youtube</option>
                                                <option value="vimeo">Vimeo</option>
                                            </select>
                                            @error('video_type') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Video URL <span class="text-danger">*</span></label>
                                            <input value="{{ old('video_url') }}" name="video_url" type="url"
                                                class="form-control @error('video_url') is-invalid @enderror"
                                                placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Y" required
                                                autocomplete="off">
                                            @error('video_url') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="active" checked name="status" value="1">
                                                    <label for="active">Active</label>
                                                </div>
                                                <div class="icheck-danger d-inline ml-3">
                                                    <input type="radio" id="inactive" name="status" value="0">
                                                    <label for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                            @error('status') <span class="invalid-feedback d-block"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="editor2" type="text" class="form-control" name="description"
                                                placeholder="Write description of course... ">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Create Course
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center mt-5">
                                    <label class="form-lebel mb-3">Thumbnail Image</label> <br>
                                    <img width="300px" height="300px" id="image" class="img-fluid"
                                        src="{{ asset('backend/image/thumbnail.jpg') }}" alt="image"
                                        style="border: 1px solid #adb5bd;margin: 0 auto;padding: 3px;">

                                    <div class="upload-btn-wrapper mt-3">
                                        <input name="thumbnail"
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                            id="hiddenImgInput" type="file" hidden />
                                        <button onclick="$('#hiddenImgInput').click()" class="btn btn-info"
                                            type="button">Choose an image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input id="guard_name" type="hidden" value="{{ Auth::getDefaultDriver() }}">
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });

        function courseType(type) {
            if (type == 'free') {
                $('#coursetype').hide();
                $('#price').val('');
                $('#discount_price').val('');
            } else {
                $('#coursetype').show();
            }
        }

        let guard_name = $('#guard_name').val();
        if (guard_name == 'admin') {
            $('#instructor_id_input').val('');
        }

        $('#instructor_select').on('change', function() {
            $('#instructor_id_input').val($(this).val())
        })
    </script>
@endsection
