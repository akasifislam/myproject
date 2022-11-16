@extends('layouts.website')

@section('title') Course Details - {{ env('APP_NAME') }} @endsection

@section('body-style') style="background-color: #ebebf2;" @endsection

@section('content')

    <!-- Breadcrumb Starts Here -->
    <section class="section event-sub-section">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses') }}" class="fs-6 text-secondary">Course</a>
                    </li>
                    <li class="breadcrumb-item fs-6 text-secondary d-none d-lg-inline-block" aria-current="page">
                        {{ $courseDetails->title }}
                    </li>
                </ol>
            </nav>
            <div class="row event-sub-section-main mb-3">
                <div class="col-lg-8">
                    <h3 class="font-title--sm">{{ $courseDetails->title }}</h3>
                    <div class="created-by d-flex align-items-center">
                        <div class="created-by-image me-3">
                            <img class="rounded-circle" src="{{ asset($courseDetails->instructor->image) }}" alt="">
                        </div>
                        <div class="created-by-text">
                            <p>Created by</p>
                            <h6><a
                                    href="{{ route('instructor.profile', $courseDetails->instructor->slug) }}">{{ $courseDetails->instructor->firstname . ' ' . $courseDetails->instructor->lastname }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-with-date d-flex align-items-lg-center">
                        <div class="icon-with-date-start d-flex align-items-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.94438 2.34287L11.7457 5.96656C11.8359 6.14934 12.0102 6.2769 12.2124 6.30645L16.2452 6.88901C16.4085 6.91079 16.5555 6.99635 16.6559 7.12701C16.8441 7.37201 16.8153 7.71891 16.5898 7.92969L13.6668 10.7561C13.5183 10.8961 13.4522 11.1015 13.4911 11.3014L14.1911 15.2898C14.2401 15.6204 14.0145 15.93 13.684 15.9836C13.5471 16.0046 13.4071 15.9829 13.2826 15.9214L9.69082 14.0384C9.51037 13.9404 9.29415 13.9404 9.1137 14.0384L5.49546 15.9315C5.1929 16.0855 4.82267 15.9712 4.65778 15.6748C4.59478 15.5551 4.57301 15.419 4.59478 15.286L5.29479 11.2975C5.32979 11.0984 5.26368 10.8938 5.11901 10.753L2.18055 7.92735C1.94099 7.68935 1.93943 7.30201 2.17821 7.06246C2.17899 7.06168 2.17977 7.06012 2.18055 7.05935C2.27932 6.9699 2.40066 6.91001 2.5321 6.88668L6.56569 6.30412C6.76713 6.27223 6.94058 6.14623 7.03236 5.96345L8.83215 2.34287C8.90448 2.19587 9.03281 2.08309 9.18837 2.03176C9.3447 1.97965 9.51582 1.99209 9.66282 2.06598C9.78337 2.12587 9.88215 2.22309 9.94438 2.34287Z"
                                    stroke="#FF7A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            @if ($courseDetails->total_stars && $courseDetails->total_ratings)
                                <p class="font-para--md">
                                    {{ number_format(avgStar($courseDetails->total_stars, $courseDetails->total_ratings), 0) }}
                                    Star
                                    <span>({{ $courseDetails->total_ratings }})</span>
                                </p>
                            @else
                                <p class="font-para--md">0 Star
                                    <span>(0)</span>
                                </p>
                            @endif
                        </div>
                        <div class="icon-with-date-end d-flex align-items-center">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 16.5C13.1421 16.5 16.5 13.1421 16.5 9C16.5 4.85786 13.1421 1.5 9 1.5C4.85786 1.5 1.5 4.85786 1.5 9C1.5 13.1421 4.85786 16.5 9 16.5Z"
                                    stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M9 4.5V9L12 10.5" stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <p class="font-para--md">{{ $courseDetails->duration }} Hours</p>
                        </div>
                    </div>
                    <div class="icon-with-date d-flex align-items-lg-cente mb-0">
                        <div class="icon-with-date-start d-flex align-items-center">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9C1 9 4 3 9.25 3C14.5 3 17.5 9 17.5 9C17.5 9 14.5 15 9.25 15C4 15 1 9 1 9Z"
                                    stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M9.25 11.25C10.4926 11.25 11.5 10.2426 11.5 9C11.5 7.75736 10.4926 6.75 9.25 6.75C8.00736 6.75 7 7.75736 7 9C7 10.2426 8.00736 11.25 9.25 11.25Z"
                                    stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <p class="font-para--md">{{ $courseDetails->enroll_count }} Enrolled</p>
                        </div>
                        <div class="icon-with-date-end d-flex align-items-center">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                    stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                    stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <p class="font-para--md">{{ $courseDetails->lesson_count }} Lesson</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Ends Here -->

    <!-- Event Info Starts Here -->
    <section class="section event-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-overview">
                        <div class="course-overview-image">
                            <img src="{{ asset($courseDetails->thumbnail) }}" alt="img">
                            <a class="popup-video play-button" href="{{ $courseDetails->video_url }}">
                                <svg width="23" height="27" viewBox="0 0 23 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                        fill="#1089FF"></path>
                                </svg>
                            </a>
                        </div>
                        <ul class="nav course-overview-nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active font-para--lg" id="pills-courseoverview-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-courseoverview" type="button" role="tab"
                                    aria-controls="pills-courseoverview" aria-selected="true">
                                    Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-para--lg" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">
                                    Curriculum
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-para--lg" id="pills-c-instructor-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-c-instructor" type="button" role="tab"
                                    aria-controls="pills-c-instructor" aria-selected="false">
                                    Instructor
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link me-0 font-para--lg" id="pills-course-review-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab"
                                    aria-controls="pills-course-review-tab" aria-selected="false">
                                    Review
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content course-overview-content" id="pills-tabContentTwo">
                            <div class="tab-pane fade show active" id="pills-courseoverview" role="tabpanel"
                                aria-labelledby="pills-courseoverview-tab">
                                <!-- Course Overview Starts Here -->
                                <div class="row course-overview-main mt-4">
                                    {!! $courseDetails->description ? $courseDetails->description : 'Nothing found' !!}
                                </div>
                                <!-- Course Overview Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile">
                                <!-- Course Curriculum Area Starts Here -->
                                <x-coursedescription.curriculum :courseDetails="$courseDetails" />
                                <!-- Course Curriculum Area Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="pills-c-instructor" role="tabpanel"
                                aria-labelledby="pills-c-instructor-tab">
                                <!-- Course Details Instructor Starts Here -->
                                <x-coursedescription.instructor :avgStar="$avgStar" :courseDetails="$courseDetails"
                                    :instructorTotalCourses="$instructorTotalCourses" />
                                <!-- Course Details Instructor Ends Here -->
                            </div>
                            <div class="tab-pane fade show course-review-content" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review">
                                <!-- Course Details Review Starts Here -->
                                <x-coursedescription.review :courseDetails="$courseDetails" :reviews="$reviews"
                                    :starsCounts="$starsCounts" :starsPercentages="$starsPercentages" />
                                <!-- Course Details Review Ends Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    {{-- cart side --}}
                    <x-coursedescription.cart-side :courseDetails="$courseDetails" />
                </div>
            </div>
        </div>
    </section>
    <!-- Event Info Ends Here -->
    <section class="section new-course-feature section--bg-offwhite-five">
        @if (count($relatedCourses))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2 class="font-title--md text-center">Related Course</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 position-relative px-0 mx-0">
                            <div class="new__courses">
                                @foreach ($relatedCourses as $course)
                                    <x-courses.single-course :course="$course" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="new-course-overlay">
            <img src="{{ asset('frontend') }}/dist/images/shape/circle5.png" alt="shape" class="img-fluid shape01" />
            <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-15.png" alt="shape"
                class="img-fluid shape02" />
        </div>
    </section>


@stop

@section('style')
<style>
    .rating-stars {
        font-size: 25px;
    }
    .rating-stars .rate-base-layer
    {
        color: #8f8fa3;
        color: #b2b2be;
    }
    .rating-stars .rate-hover-layer
    {
        color: #ff7a1a;
    }
    .rating-stars .rate-select-layer
    {
        color: #ff7a1a;
    }

</style>
@endsection

@section('script')
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    <script src="https://unpkg.com/dayjs@1.8.21/plugin/relativeTime.js"></script>
    <script>
        dayjs.extend(window.dayjs_plugin_relativeTime)
    </script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function formatRatingItem(item){
            var review = `<div class="students-feedback-item" style="word-break: break-all;">
                <div class="feedback-rating">
                    <div class="feedback-rating-start">
                        <div class="image">
                            <img src="`+ location.origin+'/'+item.student_reviews.image +`" alt="Image" />
                        </div>
                        <div class="text">
                            <h6><a href="#"> `+ item.student_reviews.firstname + " " + item.student_reviews.lastname +` </a>
                            </h6>
                            <p class="created-date-`+item.id+`"> `+item.created_at+` </p>
                        </div>
                    </div>
                    <div class="feedback-rating-end">
                        <div class="rating-stars rating-`+item.id+`" data-rate-value="`+item.stars+`"></div>
                    </div>
                </div>
                <p>
                `+item.comment+`
                </p>
            </div>`

            $('#loadData').append(review);

            // Options
            var options = {
                max_value: 5,
                step_size: 0.5,
                initial_value: 0,
                selected_symbol_type: 'utf8_star', // Must be a key from symbols
                cursor: 'default',
                readonly: true,
                change_once: false, // Determines if the rating can only be set once
                // ajax_method: 'POST',
                // url: 'http://localhost/test.php',
                additional_data: {} // Additional data to send to the server
            }

            $(`.rating-${item.id}`).rate(options);

            let data = dayjs(item.created_at).fromNow();
            $(`.created-date-${item.id}`).html(data)
            $(`.created-date-${item.id}`).html(data)
        }

        function loadMoreData(url) {
            axios.post(url, {
                course_id: ' {{ $courseDetails->id }}',
            })
            .then(res => {
                // console.log(res.data);
                var nextPageUrl = res.data.next_page_url;
                // set next page url
                $('#load_more_button').data("url", nextPageUrl)

                $.each(res.data.data, function( key, value ) {
                    formatRatingItem(value);
                });

                // handle button
                if(nextPageUrl == null){
                    $('#load_more_button').attr('disabled', true).removeAttr('class').attr('class', 'button button-md button--disabled').html('No more results found!');
                }else {
                    $('#load_more_button').html('Load more');
                }
            })
            .catch(err => {
                console.log(err);
            })
        }

        loadMoreData('{{ route('load-data') }}');

        $(document).on('click', '#load_more_button', function() {
            let pageUrl = $(this).data('url');

            if(pageUrl !== null){
                $('#load_more_button').html('<span style="text-transform: lowercase;">Loading...</span>');
                loadMoreData(pageUrl);
            }
        });
    </script>
@stop
