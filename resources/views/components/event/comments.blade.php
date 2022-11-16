<!-- Write a Review Area Starts Here -->
@auth
    <div class="col-lg-12">
        <div class="writereview-area">
            <h6 class="font-title--card">Write a Review</h6>
            <form action="{{ route('event.comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $eventId }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <label for="comment">Comment</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment"
                    placeholder="Add a Public Comment" name="comment"></textarea>
                @error('comment') <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <div class="d-flex justify-content-lg-end justify-content-center">
                    <button class="button button-md button--primary mt-3">Post
                        Comment</button>
                </div>
            </form>


        </div>
    </div>
@endauth
<!-- Write a Review Area Ends Here -->


<!-- Feedback Area Ends Here -->
<div class="col-lg-12">
    <div class="feedback-area">
        <h6 class="font-title--card">Students Feedback
            <span>({{ $total }})</span>
        </h6>
        @if ($total == 0)
            <p class="test-muted">Be First To Comment</p>
        @else
            <div id="loadData"></div>
        @endif
    </div>
</div>
<!-- Feedback Area Ends Here -->



@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        function loadMoreData(id = 0) {
            axios.post('{{ route('event.comment.data') }}', {
                    id: id,
                    event_id: ' {{ $eventId }}',
                })
                .then(res => {
                    console.log(res)
                    $('#load_more_button').remove();
                    $('#loadData').append(res.data);
                })
                .catch(err => {
                    console.log(err);
                })
        }
        loadMoreData(0);

        $(document).on('click', '#load_more_button', function() {
            var id = $(this).data('id');

            $('#load_more_button').html('<span style="text-transform: lowercase;">Loading...</span>');
            loadMoreData(id);
        });
    </script>
@stop
