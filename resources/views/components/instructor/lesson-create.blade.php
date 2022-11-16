<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Create Lesson</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.chapter.lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="course_id" type="hidden" value="{{ $course->id }}">
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
                <div class="form-group">
                    <label for="lesson_name">Lesson Name</label>
                    <input name="lesson_name" type="text"
                        class="form-control @error('lesson_name') is-invalid @enderror" id="lesson_name"
                        placeholder="Enter Name" value="{{ old('lesson_name') }}">
                    @error('lesson_name') <span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group">
                    <label for="lesson_name">Duration (Minutes)</label>
                    <input name="duration" type="text" class="form-control @error('duration') is-invalid @enderror"
                        id="lesson_name" placeholder="Total minutes" value="{{ old('duration') }}">
                    @error('duration') <span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group">
                    <label for="lesson_name">Lesson Type</label>
                    <select id="lessonType" name="video_type" class="form-control">
                        <option {{ old('video_type') == 'youtube' ? 'selected' : '' }} value="youtube">Youtube
                        </option>
                        <option {{ old('video_type') == 'vimeo' ? 'selected' : '' }} value="vimeo">Vimeo</option>
                        <option {{ old('video_type') == 'file' ? 'selected' : '' }} value="file">File Upload</option>
                    </select>
                </div>
                <div class="form-group" id="video_url_group">
                    <label for="lesson_name">Video URL</label>
                    <input id="video_url" name="video_url" type="text"
                        class="form-control @error('video_url') is-invalid @enderror" id="lesson_name"
                        placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Y" value="{{ old('video_url') }}">
                    @error('video_url') <span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group" id="file_upload_group">
                    <input id="file_upload" name="file" type="file"
                        class="form-control pl-0 border-0 @error('file') is-invalid @enderror">
                    @error('file') <span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
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
