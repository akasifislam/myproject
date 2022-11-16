@extends('layouts.admin')

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
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Review List</h3>
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
                                                    aria-sort="descending" width="20%">Course Title</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="40%">Comment</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Stars</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Date</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="20%">Student Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $review->course->title }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $review->comment }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        @if ($review->stars == 1)
                                                            @include('frontend.partials.star')

                                                        @elseif ($review->stars == 2)
                                                            @for ($i = 0; $i < $review->stars; $i++)
                                                                @include('frontend.partials.star')
                                                            @endfor

                                                        @elseif ($review->stars == 3)
                                                            @for ($i = 0; $i < $review->stars; $i++)
                                                                @include('frontend.partials.star')
                                                            @endfor

                                                        @elseif ($review->stars == 4)
                                                            @for ($i = 0; $i < $review->stars; $i++)
                                                                @include('frontend.partials.star')
                                                            @endfor
                                                        @elseif ($review->stars == 5)
                                                            @for ($i = 0; $i < $review->stars; $i++)
                                                                @include('frontend.partials.star')
                                                            @endfor
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ date('d M, Y', strtotime($review->updated_at)) }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $review->student_reviews->firstname . ' ' . $review->student_reviews->lastname ?? '' }}
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
