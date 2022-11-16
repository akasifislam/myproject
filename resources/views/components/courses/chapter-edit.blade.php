<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="line-height: 36px;">Edit Chapter</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('course.chapter.update', $chapter->id) }}" method="POST">
            @csrf
            @method('Put')
            <input name="course_id" type="hidden" value="{{ $chapter->course_id }}">
            <div class="form-group">
                <label for="chapter_name">Chapter Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    id="chapter_name" placeholder="Enter Name" value="{{ $chapter->name }}">
                @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync"></i> Update
                </button>
                <a href="{{ route('course.syllabus', $chapter->course_id) }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Cancel Edit
                </a>
            </div>
        </form>
    </div>
</div>
