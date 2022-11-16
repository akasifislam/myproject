<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModal" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="ratingModal">
                    Leave A Rating</h5>

            </div>
            <div class="modal-body text-center pt-0 pb-0">
                <div class="modal-body-rating">
                    <p id="a1">1 <span>(Very Poor)</span></p>
                    <p id="b2">2 <span>(Poor)</span></p>
                    <p id="c3">3 <span>(Average)</span></p>
                    <p id="d4">4 <span>(I'm Glad)</span></p>
                    <p id="e5">5 <span>(Amazing)</span></p>
                    <div id="rating" class="mx-auto mt-3"></div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('review.store') }}" method="POST" class="w-100">
                    @csrf
                    <input name="stars" type="hidden" class="rating-stars">
                    <input name="course_id" type="hidden" value="{{ $course->id }}">
                    <input name="instructor_id" type="hidden" value="{{ $course->instructor_id }}">
                    <label for="messages">Message</label>
                    <textarea required name="comment" id="messages"
                        placeholder="How do you feel after taking this course?" class="w-100"></textarea>

                    <button type="submit" class="button button-md button--primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
