@extends('layouts.admin')
@section('title') Order Details @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Order Details</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <tbody>
                                        <tr class="mb-5">
                                            <th width="30%">Order No.</th>
                                            <td width="70%">{{ $orderInfo->order_no }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="30%">Total Price</th>
                                            <td width="70%">${{ $orderInfo->total }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="30%">Courses</th>
                                            <td width="70%">
                                                <ul>
                                                    @foreach ($orderInfo->orderdetails as $details)
                                                        <li><a href="#">{{ $details->course->title }}</a> <small class="text-danger">(${{ $details->course->price }})</small> </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="30%">Payment Method</th>
                                            <td width="70%">{{ $orderInfo->payment->method }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Student Details</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <tbody>
                                        <tr class="mb-5">
                                            <th width="30%">Student Name</th>
                                            <td width="70%">{{ $orderInfo->student->firstname . ' ' . $orderInfo->student->lastname }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="30%">Student Email</th>
                                            <td width="70%">{{ $orderInfo->student->email }}</td>
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
