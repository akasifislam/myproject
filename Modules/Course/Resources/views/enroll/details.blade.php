@extends('layouts.admin')
@section('title') Enroll Course Details | Admin @endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ asset($enroll->student->image) }}" alt="image"
                                            class="d-block mx-auto image-fluid" height="150px" width="150px"
                                            style="border-radius: 50%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="pt-4">
                                            <h4 class="font-weight-bold">
                                                {{ $enroll->student->firstname . ' ' . $enroll->student->lastname }}</h4>
                                            <p><b>Email: </b>{{ $enroll->student->email }}</p>
                                            <p><b>Phone: </b>{{ $enroll->student->phone }}</p>
                                            <p><b>Nationality: </b>{{ $enroll->student->nationality }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Instructor Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ asset($enroll->course->instructor->image) }}" alt="image"
                                            class="d-block mx-auto image-fluid" height="150px" width="150px"
                                            style="border-radius: 50%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="pt-4">
                                            <h4 class="font-weight-bold">
                                                {{ $enroll->course->instructor->firstname . ' ' . $enroll->course->instructor->lastname }}
                                            </h4>
                                            <p><b>Email: </b>{{ $enroll->course->instructor->email }}</p>
                                            <p><b>Phone: </b>{{ $enroll->course->instructor->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Course Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-md-12">
                                <img src="{{ asset($enroll->course->thumbnail) }}" alt="image"
                                    class="d-block mx-auto image-fluid" height="200px" width="350px">
                            </div>
                            <div class="col-md-12 pt-4">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <tbody>
                                        <tr class="mb-5">
                                            <th width="50%">Title</th>
                                            <td width="50%">{{ $enroll->course->title }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Price</th>
                                            <td width="50%">{{ $enroll->course->price }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Discount Price</th>
                                            <td width="50%">{{ $enroll->course->discount_price }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Level</th>
                                            <td width="50%">{{ $enroll->course->level }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Duration</th>
                                            <td width="50%">{{ $enroll->course->duration }} Hours</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Course Type</th>
                                            <td width="50%">{{ $enroll->course->course_type }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Video Type</th>
                                            <td width="50%">{{ $enroll->course->video_type }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Video Url</th>
                                            <td width="50%"><a
                                                    href="{{ $enroll->course->video_url }}">{{ $enroll->course->video_url }}</a>
                                            </td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Total Views</th>
                                            <td width="50%">{{ $enroll->course->total_views }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Total Purchase</th>
                                            <td width="50%">{{ $enroll->course->total_purchase }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Course Link</th>
                                            <td width="50%"><a target="_blank"
                                                    href="{{ route('course.details', $enroll->course->slug) }}">Go to
                                                    Link</a></td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="50%">Description</th>
                                            <td width="50%">{!! $enroll->course->description !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')

    <style>
        p {
            margin-bottom: 3px;
        }

    </style>

@endsection
