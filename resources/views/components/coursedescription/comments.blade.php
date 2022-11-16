<div class="lesson-comments">
    <div class="feedback-comment pt-0 ps-0 pe-0">
        <h5>Add a Public Comment</h5>
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $courseId }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <label for="comment">Comment</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment"
                placeholder="Add a Public Comment" name="comment"></textarea>
            @error('comment') <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <button type="submit" class="button button-md button--primary float-end">Post Comment
            </button>
        </form>
    </div>
    <div class="students-feedback pt-0 ps-0 pe-0 pb-0 mb-0">
        <div class="students-feedback-heading">
            <h5>Comments <span>({{ $total }})</span></h5>
        </div>
        @if (!$comments->isEmpty())
            <div id="loadData"></div>
        @else
            <p class="test-muted">Be First To Comment</p>
        @endif
    </div>
</div>
