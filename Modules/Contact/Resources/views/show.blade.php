@extends('layouts.admin')
@section('title') Contact Details | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Contact Details</h3>
                        <a href="{{ route('module.contact.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <tr class="mb-5">
                                            <th width="20%">Name</th>
                                            <td width="80%">{{ $contact->name }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="20%">Email</th>
                                            <td width="80%">{{ $contact->email }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="20%">Subject</th>
                                            <td width="80%">{{ $contact->subject }}</td>
                                        </tr>
                                        <tr class="mb-5">
                                            <th width="20%">Message</th>
                                            <td width="80%">{{ $contact->message }}</td>
                                        </tr>
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
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
