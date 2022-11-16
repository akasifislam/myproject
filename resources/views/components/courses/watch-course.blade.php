@php
$courseProgress = $enrollCourse->course->courseProgress($enrollCourse->course->id);
@endphp
<div class="contentCard contentCard--watch-course">
    <div class="contentCard-top">
        <a href="{{ route('course.details', $enrollCourse->course->slug) }}">
            <img src="{{ asset($enrollCourse->course->thumbnail) }}" alt="images" class="img-fluid" />
        </a>
    </div>
    <div class="contentCard-bottom">
        <h5>
            <a href="{{ route('course.details', $enrollCourse->course->slug) }}"
                class="font-title--card">{{ Str::words($enrollCourse->course->title, 4, '...') }}</a>
        </h5>

        @php
            $instructor = $enrollCourse->course->instructor;
        @endphp
        <div class="contentCard-info d-flex align-items-center justify-content-between">
            <a href="{{ route('instructor.profile', $instructor->slug) }}"
                class="contentCard-user d-flex align-items-center">
                <img style="width: 50px; height: 50px;" src="{{ asset($instructor->image) }}" alt="client-image"
                    class="rounded-circle" />
                <p class="font-para--md">
                    {{ Str::words($instructor->firstname . ' ' . $instructor->lastname, 3, '..') }}
                </p>
            </a>
            <div class="contentCard-course--status d-flex align-items-center">
                <span class="percentage">{{ number_format($courseProgress, 0) }}%</span>
                <p>Finish</p>
            </div>
        </div>
        <a class="button button-md button--primary-outline w-100 my-3"
            href="{{ route('watch.course', $enrollCourse->course->slug) }}">Watch Course</a>
        <div class="contentCard-watch--progress">
            <span class="percentage" style="width: {{ $courseProgress }}%;"></span>
        </div>
    </div>
</div>
