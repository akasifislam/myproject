<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Create Chapter</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.course.chapter.store') }}" method="POST">
                @csrf
                <input name="course_id" type="hidden" value="{{ $courseId }}">
                <div class="form-group">
                    <label for="chapter_name">Chapter Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="chapter_name" placeholder="Enter Name">
                    @error('name') <span class="invalid-feedback"
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
