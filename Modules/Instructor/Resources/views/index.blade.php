@extends('layouts.admin')
@section('title') Instructor List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title" style="line-height: 36px;">Instructor List</h3>
                            </div>
                            <div class="col-4 text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('module.instructor.download.pdf') }}"
                                        class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;PDF</a>
                                    <a href="{{ route('module.instructor.download.excel') }}"
                                        class="btn bg-success float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-excel"></i>&nbsp;Excel</a>
                                    <a href="{{ route('module.instructor.download.csv') }}"
                                        class="btn bg-info float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-csv"></i>&nbsp;CSV</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('module.instructor.create') }}"
                                    class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                        class="fas fa-plus"></i>&nbsp;Add Instructor</a>
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
                                                    aria-sort="descending" width="10%">Image</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="25%">Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="22%">Email</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="18%">Phone</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Gender</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="15%"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instructors as $instructor)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <img src="{{ asset($instructor->image) }}" height="50px"
                                                            width="50px" alt="image">
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $instructor->firstname . ' ' . $instructor->lastname }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $instructor->email }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $instructor->phone ? $instructor->phone : '-' }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $instructor->gender }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Edit Instructor"
                                                            href="{{ route('instructor.activity', $instructor->id) }}"
                                                            class="btn bg-primary"><i class="fas fa-cog"></i></a>
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Edit Instructor"
                                                            href="{{ route('module.instructor.edit', $instructor->id) }}"
                                                            class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('module.instructor.destroy', $instructor->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Instructor"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Show Instructor"
                                                            href="{{ route('module.instructor.show', $instructor->id) }}"
                                                            class="btn bg-success"><i class="fas fa-eye"></i></a>
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
