@extends('layouts.admin')
@section('title') Enroll New | Instructor @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Enroll New Student</h3>
                        <a href="{{ route('instructor.course.enroll.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="card-body">
                        <form class="w-50 mx-auto my-5" action="{{ route('instructor.enroll.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Select Student <span class="text-danger">*</span></label>
                                <select name="student_id" class="select2bs4 form-control @error('student_id') is-invalid @enderror">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('student_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Course <span class="text-danger">*</span></label>
                                <select name="course_id" class="select2bs4 form-control @error('course_id') is-invalid @enderror">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('course_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="row mt-4">
                                <div class="col-6 offset-3 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Enroll Now
                                    </button>
                                </div>
                            </div>
                        </form>
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

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
