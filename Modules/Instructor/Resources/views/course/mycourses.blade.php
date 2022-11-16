@extends('layouts.admin')
@section('title') Course List | Instructor @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title" style="line-height: 36px;">Course List</h3>
                            </div>
                            <div class="col-4 text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('instructor.pdf.download.mycourse') }}"
                                        class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;PDF
                                    </a>
                                    <a href="{{ route('instructor.excel.download.mycourse') }}"
                                        class="btn bg-success float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;Excel
                                    </a>
                                    <a href="{{ route('instructor.csv.download.mycourse') }}"
                                        class="btn bg-info float-right d-flex align-items-center justify-content-center"><i
                                            class="fas fa-file-pdf"></i>&nbsp;Csv
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                < <a href="{{ route('instructor.course.create') }}"
                                    class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                        class="fas fa-plus"></i>&nbsp;Add Course</a>
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
                                                    aria-sort="descending" width="8%">Thumbnail</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="20%">Title</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="13%">Category</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Course Type</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Price</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Discount Price</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="10%"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        @if ($course->thumbnail && file_exists($course->thumbnail))
                                                            <img src="{{ asset($course->thumbnail) }}" height="50px"
                                                            width="50px" alt="image">
                                                        @else
                                                            <img src="{{ asset('backend/image/thumbnail.jpg') }}" height="50px"
                                                            width="50px" alt="image">
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $course->title }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $course->category->name }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <span
                                                            class="badge badge-primary">{{ $course->course_type }}</span>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $course->price ? $course->price : '-' }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $course->discount_price ? $course->discount_price : '-' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div>
                                                            <label class="switch ">
                                                                <input data-id="{{ $course->id }}" type="checkbox"
                                                                    class="success toggle-switch"
                                                                    {{ $course->status == 1 ? 'checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('instructor.course.show', $course->slug) }}"><i
                                                                            class="fas fa-eye text-success"></i>&nbsp;&nbsp;Course
                                                                        Details</a></li>
                                                                <li><a href="{{ route('instructor.course.syllabus', $course->slug) }}"
                                                                        class="dropdown-item"><i
                                                                            class="fas fa-book-open text-primary"></i>&nbsp;&nbsp;Chapter
                                                                        and Lesson</a></li>
                                                                <li><a href="{{ route('instructor.course.edit', $course->slug) }}"
                                                                        class="dropdown-item"><i
                                                                            class="fas fa-edit text-info"></i>&nbsp;&nbsp;Edit
                                                                        Course</a></li>
                                                                <li><a href="{{ route('instructor.course.enroll', $course->slug) }}"
                                                                        class="dropdown-item"><i
                                                                            class="fas fa-user-plus"></i>&nbsp;&nbsp;Enroll
                                                                        A
                                                                        Student</a></li>
                                                                <li>
                                                                    <form
                                                                        action="{{ route('instructor.course.destroy', $course->slug) }}"
                                                                        method="POST" class="d-inline">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                                                            <i
                                                                                class="fas fa-trash text-danger"></i>&nbsp;&nbsp;Delete
                                                                            Course
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
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
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 35px;
            height: 19px;
            /* width: 60px;
                                                                                                                                                                                height: 34px; */
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 3px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input.success:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(15px);
            -ms-transform: translateX(15px);
            transform: translateX(15px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
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

        $('.toggle-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('instructor.course.status.change') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    toastr.success(response.message, 'Success');
                }
            });
        })
    </script>
@endsection
