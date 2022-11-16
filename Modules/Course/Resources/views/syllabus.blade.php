@extends('layouts.admin')
@section('title') Course Syllabus | Admin @endsection
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
                            <a class="nav-link {{ Route::is('course.syllabus') || Route::is('course.chapter.edit') ? 'active' : '' }}" href="{{ route('course.syllabus', $course->id) }}"> Chapter </a>
                            <a class="nav-link {{ Route::is('chapter.lesson.edit') ? 'active' : '' }}" href="{{  route('course.lesson', $course->id)  }}"> Lesson </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    {{-- Chapter tab --}}
                    <div id="chapter-tab">
                        <div class="row">
                            <div class="col-md-8">
                                {{-- chapter table --}}
                                <x-courses.chapter-table :chapters="$chapters" />
                            </div>
                            <div class="col-md-4">
                                @if ($editMode && $chapter)
                                    {{-- chapter edit --}}
                                    <x-courses.chapter-edit :chapter="$chapter" />
                                @else
                                    {{-- chapter create --}}
                                    <x-courses.chapter-create :course="$course" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($lesson->video_type))
        <input id="videoType" type="hidden" value="{{ $lesson->video_type }}">
    @endif

@endsection

@section('script')
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        // Chapter Sorting
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
                    url: "{{ route('course.chapter.updateOrder') }}",
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

        $('#file_upload_group').hide();
        $('#lessonType').on('change', function() {
            if (this.value == 'file') {
                $('#file_upload_group').show();
                $('#video_url_group').hide();
                $('#video_url').val('');
            } else {
                $('#video_url_group').show();
                $('#file_upload_group').hide();
                $('#file_upload').val('');
            }
        });

        $('#update_lessonType').on('change', function() {
            if (this.value == 'file') {
                $('#update_file_upload_group').show();
                $('#update_video_url_group').hide();

            } else {
                $('#update_video_url_group').show();
                $('#update_file_upload_group').hide();

            }
        });

        if ($('#videoType').val() == 'file') {
            $('#update_file_upload_group').show();
            $('#update_video_url_group').hide();
        } else {
            $('#update_file_upload_group').hide();
            $('#update_video_url_group').show();
        }
    </script>
@endsection
