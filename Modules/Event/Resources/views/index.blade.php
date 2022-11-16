@extends('layouts.admin')
@section('title') Event List | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Event List</h3>
                        <a href="{{ route('module.event.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Add Event</a>
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
                                                    aria-sort="descending" width="30%">Title</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Event Type</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Price</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="15%">Date & Time</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="20%">Seats</th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="10%"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                                <tr role="row">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <img src="{{ asset($event->thumbnail) }}" height="50px"
                                                            width="50px" alt="image">
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $event->id }}{{ $event->title }}
                                                    </td>

                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <span class="badge badge-primary">{{ $event->event_type }}</span>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $event->price ? $event->price : '-' }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <p class="m-0"><b>Time:</b>
                                                            {{ $event->starting_time . ' - ' . $event->ending_time }}</p>
                                                        <p class="m-0"><b>Date:</b> {{ $event->date }}</p>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <p class="m-0">Total Seat: <b>{{ $event->total_seat }}</b></p>
                                                        <p class="m-0">Booked Seat: <b>{{ $event->booked_seat }}</b> </p>
                                                        <p class="m-0">Remaining Seat:
                                                            <b>{{ $event->total_seat - $event->booked_seat }}</b>
                                                        </p>
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
                                                                        href="{{ route('module.event.show', $event->id) }}"><i
                                                                            class="fas fa-eye text-success"></i>&nbsp;&nbsp;Event
                                                                        Details</a></li>
                                                                <li><a href="{{ route('module.event.edit', $event->id) }}"
                                                                        class="dropdown-item"><i
                                                                            class="fas fa-edit text-info"></i>&nbsp;&nbsp;Edit
                                                                        Event</a></li>
                                                                <li><a href="{{ route('module.event.bookedseats', $event->id) }}"
                                                                        class="dropdown-item"><i
                                                                            class="fas fa-chair text-primary"></i>&nbsp;&nbsp;Booked
                                                                        Seats</a></li>
                                                                <form
                                                                    action="{{ route('module.event.destroy', $event->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                                        <i
                                                                            class="fas fa-trash text-danger"></i>&nbsp;&nbsp;Delete
                                                                        Event
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
