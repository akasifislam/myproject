@extends('layouts.admin')
@section('title') Enroll New | Instructor @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Enrolled Students</h3>
                        <a href="{{ route('instructor.course.enroll') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Enroll Now</a>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered dataTable dtr-inline" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Student Image</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="25%">Student</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="30%">Course Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Course Type</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="15%">Enrollment Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courseEnrolles as $enroll)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <img class="rounded-circle"
                                                            src="{{ asset($enroll->student->image) }}" height="50px"
                                                            width="50px" alt="image">
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <b>
                                                            {{ $enroll->student->firstname . ' ' . $enroll->student->lastname }}
                                                        </b><br>
                                                        <small>Email:
                                                            {{ $enroll->student->email }}</small>

                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a
                                                            href="{{ route('instructor.course.show', $enroll->course->id) }}">{{ $enroll->course->title }}</a>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a class="badge badge-primary" href="{{ route('module.course.enroll.type', $enroll->course->course_type) }}">{{ $enroll->course->course_type }}</a>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $enroll->created_at->format('jS M, Y') }}, <br>
                                                        {{ $enroll->created_at->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
@endsection
