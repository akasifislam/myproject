@extends('layouts.admin')
@section('title') Event Details @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Event Details</h3>
                    <a href="{{ route('module.event.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>

                <div class="row m-2">
                    <div class="col-md-4">
                        <h5><strong>Thumbnail</strong></h5>
                        <img src="{{ asset($event->thumbnail) }}" alt="thumbnail" class="image-fluid" height="200px" width="350px">
                    </div>
                    <div class="col-md-8 pt-4">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <tbody>
                                <tr class="mb-5">
                                    <th width="30%">Title</th>
                                    <td width="70%">{{ $event->title }}</td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">Total Seat</th>
                                    <td width="70%">{{ $event->total_seat }}</td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">Event Type</th>
                                    <td width="70%"><span
                                        class="badge badge-primary">{{ $event->event_type }}</span></td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">Price</th>
                                    <td width="70%">{{ $event->price ? $event->price : '-' }}</td>
                                </tr>

                                <tr class="mb-5">
                                    <th width="30%">Date</th>
                                    <td width="70%">{{ date('j F, Y', strtotime($event->date)) }}</td>
                                </tr>

                                <tr class="mb-5">
                                    <th width="30%">Time</th>
                                    <td width="70%">{{ $event->starting_time . ' - ' . $event->ending_time }}</td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">City</th>
                                    <td width="70%">{{ $event->city }}</td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">Country</th>
                                    <td width="70%">{{ $event->country }}</td>
                                </tr>

                                <tr class="mb-5">
                                    <th width="30%">Full Address</th>
                                    <td width="70%">{{ $event->address }}</td>
                                </tr>
                                <tr class="mb-5">
                                    <th width="30%">Description</th>
                                    <td width="70%">{{ $event->description }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
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
        .ck-editor__editable_inline {
            min-height: 170px;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('.select2s4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
