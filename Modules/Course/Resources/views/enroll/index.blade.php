@extends('layouts.admin')
@section('title') Enroll Courses List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title" style="line-height: 36px;">Enroll Courses List</h3>
                            </div>
                            <div class="col-4 text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('module.course.enroll.pdf') }}"
                                        class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;PDF</a>
                                    <a href="{{ route('module.course.enroll.excel') }}"
                                        class="btn bg-success float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;Excel</a>
                                    <a href="{{ route('module.course.enroll.csv') }}"
                                        class="btn bg-info float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;CSV</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('module.course.enroll.create') }}"
                                    class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                        class="fas fa-plus"></i>&nbsp;Enroll Course</a>
                            </div>
                        </div>
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
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Action</th>
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
                                                            <a
                                                                href="{{ route('module.student.show', $enroll->student->id) }}">
                                                                {{ $enroll->student->firstname . ' ' . $enroll->student->lastname }}
                                                            </a>
                                                        </b><br>
                                                        <small>Email:
                                                            {{ $enroll->student->email }}</small>

                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a
                                                            href="{{ route('module.course.show', $enroll->course->id) }}">{{ $enroll->course->title }}</a>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a class="badge badge-primary"
                                                            href="{{ route('module.course.enroll.type', $enroll->course->course_type) }}">{{ $enroll->course->course_type }}</a>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $enroll->created_at->format('jS M, Y') }}, <br>
                                                        {{ $enroll->created_at->diffForHumans() }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <form
                                                            action="{{ route('module.course.enroll.course.destroy', $enroll->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" title="Delete"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"> <i class="fas fa-trash"></i></button>
                                                        </form>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('module.course.enroll.details', $enroll->id) }}"><i
                                                                class="fa fa-eye"></i></a>
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
