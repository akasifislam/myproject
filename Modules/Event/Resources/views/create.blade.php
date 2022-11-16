@extends('layouts.admin')
@section('title') Create Event | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Event</h3>
                        <a href="{{ route('module.event.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>

                    <form class="form-horizontal" action="{{ route('module.event.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row justify-content-center pt-3 pb-4">
                            <div class="col-md-8">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Event Title <span class="text-danger">*</span></label>
                                            <input value="{{ old('title') }}" name="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Enter Event Title">
                                            @error('title') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select name="category_id"
                                                class="select2bs4 w-100 @error('category_id') is-invalid @enderror">
                                                <option value="" selected class="d-none">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == old('category_id') ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Date <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('date') is-invalid @enderror"
                                                id="datePicker" value="{{ old('date') }}" name="date"
                                                placeholder="Select Event Date">
                                            @error('date') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Country <span class="text-danger">*</span></label>
                                            <input value="{{ old('country') }}" name="country" type="text"
                                                class="form-control @error('country') is-invalid @enderror"
                                                placeholder="Enter Country">
                                            @error('country') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">City <span class="text-danger">*</span></label>
                                            <input value="{{ old('city') }}" name="city" type="text"
                                                class="form-control @error('city') is-invalid @enderror"
                                                placeholder="Enter City">
                                            @error('city') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Event Type <span class="text-danger">*</span></label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input onclick="eventType('paid')" type="radio" id="paidevent" checked
                                                        name="event_type" value="Paid">
                                                    <label for="paidevent">Paid Event</label>
                                                </div>
                                                <div class="icheck-success d-inline ml-3">
                                                    <input onclick="eventType('free')" type="radio" id="freeevent"
                                                        name="event_type" value="Free">
                                                    <label for="freeevent">Free Event</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6" id="eventType">
                                        <div class="form-group">
                                            <label>Price <span class="text-danger">*</span></label>
                                            <input id="price" value="{{ old('price') }}" name="price" type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Enter Price">
                                            @error('price') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Starting Time <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('starting_time') is-invalid @enderror"
                                                id="sTimePicker" value="{{ old('starting_time') }}" name="starting_time"
                                                placeholder="Select Starting Time">
                                            @error('starting_time') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Ending Time <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('ending_time') is-invalid @enderror"
                                                id="eTimePicker" value="{{ old('ending_time') }}" name="ending_time"
                                                placeholder="Select Ending Time">
                                            @error('ending_time') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Total Seat <span class="text-danger">*</span></label>
                                            <input value="{{ old('total_seat') }}" name="total_seat" type="number"
                                                class="form-control @error('total_seat') is-invalid @enderror"
                                                placeholder="Enter Total Seat">
                                            @error('total_seat') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Speakers <span
                                                    class="text-danger">*</span></label>
                                            <select name="speakers[]"
                                                class="form-control @error('speakers') is-invalid @enderror js-example-basic-multiple"
                                                multiple="multiple">
                                                @foreach ($instructors as $instructor)
                                                    <option value="{{ $instructor->id }}">
                                                        {{ $instructor->firstname . ' ' . $instructor->lastname }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('speakers') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Full Address <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="address" rows="5"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter Full Address"></textarea>
                                            @error('address') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea name="description" rows="5"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Write A Description of the Event"></textarea>
                                            @error('description') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Create Event
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center mt-5">
                                    <label class="form-lebel mb-3">Thumbnail Image</label> <br>
                                    <img width="300px" height="300px" id="image" class="img-fluid"
                                        src="{{ asset('backend/image/thumbnail.jpg') }}" alt="image"
                                        style="border: 1px solid #adb5bd;margin: 0 auto;padding: 3px;">

                                    <div class="upload-btn-wrapper mt-3">
                                        <input name="thumbnail" class="@error('thumbnail') is-invalid @enderror"
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                            id="hiddenImgInput" type="file" hidden />
                                        @error('thumbnail') <span class="invalid-feedback pb-2"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        <button onclick="$('#hiddenImgInput').click()" class="btn btn-info"
                                            type="button">Choose an image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
        }

        .ck-editor__editable_inline {
            min-height: 300px;
        }

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
            color: red;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });

        function eventType(type) {
            if (type == 'free') {
                $('#eventType').hide();
                $('#price').val('');
            } else {
                $('#eventType').show();
            }
        }

        let guard_name = $('#guard_name').val();
        if (guard_name == 'admin') {
            $('#instructor_id_input').val('');
        }

        $('#instructor_select').on('change', function() {
            $('#instructor_id_input').val($(this).val())
        });

        // date picker
        $(function() {
            $('#datePicker').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });

        // starting time picker
        $(function() {
            $('#sTimePicker').datetimepicker({
                format: 'hh:mm A',
            });
        });

        // ending time picker
        $(function() {
            $('#eTimePicker').datetimepicker({
                format: 'hh:mm A',
            });
        });
    </script>
@endsection
