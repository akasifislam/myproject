@extends('layouts.admin')
@section('title') Course Details @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Course Details</h3>
                        <a href="{{ route('instructor.courses') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>

                    <div class="row m-2">
                        <div class="col-md-4">
                            <h5><strong>Thumbnail</strong></h5>
                            @if ($course->thumbnail && file_exists($course->thumbnail))
                                <img src="{{ asset($course->thumbnail) }}" alt="image" class="image-fluid" height="350px"
                                width="350px">
                            @else
                                <img src="{{ asset('backend/image/thumbnail.jpg') }}" alt="image" class="image-fluid" height="350px"
                                width="350px">
                            @endif

                        </div>
                        <div class="col-md-8 pt-4">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <tbody>
                                    <tr class="mb-5">
                                        <th width="50%">Title</th>
                                        <td width="50%">{{ $course->title }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Price</th>
                                        <td width="50%">{{ $course->price }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Discount Price</th>
                                        <td width="50%">{{ $course->discount_price }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Level</th>
                                        <td width="50%">{{ $course->level }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Duration</th>
                                        <td width="50%">{{ $course->duration }} Hours</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Course Type</th>
                                        <td width="50%">{{ $course->course_type }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Video Type</th>
                                        <td width="50%">{{ $course->video_type }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Video Url</th>
                                        <td width="50%"><a href="{{ $course->video_url }}">{{ $course->video_url }}</a>
                                        </td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Total Views</th>
                                        <td width="50%">{{ $course->total_views }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Total Purchase</th>
                                        <td width="50%">{{ $course->total_purchase }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Course Link</th>
                                        <td width="50%"><a target="_blank"
                                                href="{{ route('course.details', $course->slug) }}">Go to Link</a></td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Description</th>
                                        <td width="50%">{!! $course->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
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

        .ck-editor__editable_inline {
            min-height: 170px;
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
        $('.select2s4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
