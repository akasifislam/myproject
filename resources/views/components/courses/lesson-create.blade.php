<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Create Lesson</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="course_id" type="hidden" value="{{ $course->id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="chapter_name">Chapter</label>
                            <select name="chapter_id" class="form-control">
                                <option value="" selected class="d-none">Select Chapter</option>
                                @if (is_array($chapters) || is_object($chapters))
                                    @foreach ($chapters as $chapter)
                                        <option {{ $chapter->id == old('chapter_id') ? 'selected' : '' }}
                                            value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('chapter_id') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lesson_name">Lesson Name</label>
                            <input name="lesson_name" type="text"
                                class="form-control @error('lesson_name') is-invalid @enderror" id="lesson_name"
                                placeholder="Enter Name" value="{{ old('lesson_name') }}">
                            @error('lesson_name') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration">Duration (Minutes)</label>
                            <input name="duration" type="number"
                                class="form-control @error('duration') is-invalid @enderror" id="duration"
                                placeholder="Total minutes" value="{{ old('duration') }}">
                            @error('duration') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lessonType">Lesson Type</label>
                            <select id="lessonType" name="video_type" class="form-control">
                                <option {{ old('video_type') == 'youtube' ? 'selected' : '' }} value="youtube">
                                    Youtube
                                </option>
                                <option {{ old('video_type') == 'vimeo' ? 'selected' : '' }} value="vimeo">Vimeo
                                </option>
                                <option {{ old('video_type') == 'file' ? 'selected' : '' }} value="file">File Upload
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="video_url_group">
                            <label for="video_url">Video URL</label>
                            <input id="video_url" name="video_url" type="url"
                                class="form-control @error('video_url') is-invalid @enderror" id="lesson_name"
                                placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Y"
                                value="{{ old('video_url') }}">
                            @error('video_url') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="file_upload_group">
                            <label for="file_upload">File</label>
                            <input id="file_upload" name="file" type="file"
                                class="form-control pl-0 border-0 @error('file') is-invalid @enderror">
                            @error('file') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editor1">Lesson Description</label>
                            <textarea id="editor1" type="text" class="form-control" name="description"
                                placeholder="Write description of Lesson... ">{{ old('description') }}</textarea>
                            @error('description') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editor2">Lesson Note</label>
                            <textarea id="editor2" type="text" class="form-control" name="note"
                                placeholder="Write note of Lesson... ">{{ old('note') }}</textarea>
                            @error('note') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
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
            color: #fff;
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

        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });

        function courseType(type) {
            if (type == 'free') {
                $('#coursetype').hide();
                $('#price').val('');
                $('#discount_price').val('');
            } else {
                $('#coursetype').show();
            }
        }

        let guard_name = $('#guard_name').val();
        if (guard_name == 'admin') {
            $('#instructor_id_input').val('');
        }

        $('#instructor_select').on('change', function() {
            $('#instructor_id_input').val($(this).val())
        })
    </script>
@endsection
