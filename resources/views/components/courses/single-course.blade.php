<div class="contentCard contentCard--course">
    <div class="contentCard-top">

        <a href="{{ route('course.details', $course->slug) }}"><img src="{{ asset($course->thumbnail) }}"
                alt="images" class="img-fluid"></a>
    </div>
    <div class="contentCard-bottom">
        <h6>
            <a href="{{ route('course.details', $course->slug) }}" class="font-title--card">{{ $course->title }}</a>
        </h6>
        <div class="contentCard-info d-flex align-items-center justify-content-between">
            <a href="{{ route('instructor.profile', $course->instructor->slug) }}"
                class="contentCard-user d-flex align-items-center">
                <img src="{{ asset($course->instructor->image) }}" alt="client-image" class="rounded-circle"
                    width="34px" height="34px">

                <p class="font-para--md">
                    {{ $course->instructor->firstname . ' ' . $course->instructor->lastname }}
                </p>
            </a>
            @if ($course->course_type == 'Free')
                <h6>Free</h6>
            @else
                @if ($course->discount_price)
                    <div class="price">
                        <del>${{ $course->price }}</del>
                        <span>${{ $course->discount_price }}</span>
                    </div>
                @else
                    <div class="price">
                        <span>${{ $course->price }}</span>
                    </div>
                @endif
            @endif
        </div>
        <div class="contentCard-more d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/star.png" alt="star">
                </div>
                @if ($course->total_stars && $course->total_ratings)
                    <span>
                        {{ number_format(avgStar($course->total_stars, $course->total_ratings), 0) }}
                    </span>
                @else
                    <span>
                        0
                    </span>
                @endif
            </div>
            <div class="eye d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/eye.png" alt="eye">
                </div>
                <span>{{ $course->enroll_count }}</span>
            </div>
            <div class="book d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/book.png" alt="location">
                </div>
                <span>{{ $course->lesson_count }} Lesson</span>
            </div>
            <div class="clock d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/Clock.png" alt="clock">
                </div>
                <span>{{ $course->duration }} Hours</span>
            </div>
        </div>
    </div>
</div>
