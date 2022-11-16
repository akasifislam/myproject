@extends('layouts.admin')
@section('title') Instructor Activities | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Course Syllabus</h3>
                    </div>
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link {{ Route::is('instructor.activity') ? 'active' : '' }}" href="{{ route('instructor.activity', $instructor->id) }}"> Education </a>
                            <a class="nav-link {{ Route::is('instructor.experience') || Route::is('instructor.experience.edit') ? 'active' : '' }}" href="{{  route('instructor.experience', $instructor->id)  }}"> Experience </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height: 36px;">Experience</h3>
                            </div>
                            @component('components.Experience.table', compact('experiences')) @endcomponent
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if ($experiencEditMode && $experience)
                            @component('components.Experience.editform', compact('experience')) @endcomponent
                        @else
                            @component('components.Experience.createform', compact('instructor')) @endcomponent
                        @endif
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

    <script>

        // sorting education table
        $(function() {
            $("#sortable").sortable({
                items: 'tr',
                cursor: 'move',
                opacity: 0.4,
                scroll: false,
                dropOnEmpty: false,
                update: function() {
                    sendTaskOrderToServer('#sortable tr');
                },
                classes: {
                    "ui-sortable": "highlight"
                },
            });
            $("#sortable").disableSelection();

            function sendTaskOrderToServer(selector) {
                var order = [];
                $(selector).each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('module.instructor.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    }
                });
            }
        });


        // sorting experience table
        $(function() {
            $("#sortable2").sortable({
                items: 'tr',
                cursor: 'move',
                opacity: 0.4,
                scroll: false,
                dropOnEmpty: false,
                update: function() {
                    sendTaskOrderToServer('#sortable2 tr');
                },
                classes: {
                    "ui-sortable": "highlight"
                },
            });
            $("#sortable2").disableSelection();

            function sendTaskOrderToServer(selector) {
                var order = [];
                $(selector).each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('instructor.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    }
                });
            }
        });

    </script>
@endsection
