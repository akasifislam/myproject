<div class="tab-content" id="pills-tabContent">
    @php
        if ($courseDetails->total_stars && $courseDetails->total_ratings) {
            $starFormat = number_format(avgStar($courseDetails->total_stars, $courseDetails->total_ratings), 0);
        } else {
            $starFormat = 0;
        }
    @endphp
    <div class="tab-pane fade show active" id="pills-pills-review" role="tabpanel" aria-labelledby="pills-pills-review">
        <div class="row">
            <div class="col-lg-12">
                <div class="instructor-rating-area d-flex">
                    <div class="rating-number">
                        <h2>{{ $starFormat }}</h2>
                        <div class="rating-icon">
                            <ul class="list-inline">
                                @for ($i = 0; $i < $starFormat; $i++)
                                    @include('components.Stars.small-full')
                                @endfor
                            </ul>
                        </div>
                        <p>Course Rating</p>
                    </div>
                    <x-rating.rating-range :starsCounts="$starsCounts" :starsPercentages="$starsPercentages" />
                </div>
                <div class="students-feedback">
                    <div class="students-feedback-heading">
                        <h5 class="font-title--card">Students Feedback <span>({{ $reviews->count() }})</span></h5>
                    </div>
                    {{-- comments --}}
                    <div id="loadData"></div>

                    <div class="text-center">
                        <button id="load_more_button" class="button button-md button--primary-outline" type="button">Load more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
