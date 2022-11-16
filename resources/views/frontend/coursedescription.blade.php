<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $setting = App\Models\WebsiteSettings::websiteSetting();
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Course Watch - {{ env('APP_NAME') }}</title>

    {{-- style --}}
    @include('components.coursedescription.style-files')
</head>

<body style="background-color: #ebebf2;">
    <!-- Header Starts Here -->
    <header class="bg-transparent">
        <div class="container-fluid">
            <div class="coursedescription-header">
                <div class="coursedescription-header-start">
                    <a class="logo-image" href="{{ route('index') }}">
                        @if ($setting->header_logo && file_exists($setting->header_logo))
                            <img src="{{ asset($setting->header_logo) }}" alt="brand" class="img-fluid" />
                        @else
                            <img src="{{ asset('backend/image/headerlogo.png') }}" alt="brand" class="img-fluid" />
                        @endif
                    </a>
                    <div class="topic-info">
                        <div class="topic-info-arrow">
                            <a href="{{ route('user.profile') }}">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 19.5L8.5 12.5L15.5 5.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="topic-info-text">
                            <h6 class="font-title--xs"><a href="#">{{ $course->title }}</a></h6>
                            <div class="lesson-hours">
                                <div class="book-lesson">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z"
                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z"
                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    <span>{{ $lessonCount }} Lesson</span>
                                </div>
                                <div class="totoal-hours">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 17C13.1421 17 16.5 13.6421 16.5 9.5C16.5 5.35786 13.1421 2 9 2C4.85786 2 1.5 5.35786 1.5 9.5C1.5 13.6421 4.85786 17 9 17Z"
                                            stroke="#FF7A1A" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M9 5V9.5L12 11" stroke="#FF7A1A" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>{{ $total_duration }} Hours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $reviewExists = $course->alreadyReviewed($course->id);
                @endphp
                <div class="coursedescription-header-end">
                    @if ($reviewExists)
                        <a href="#" class="rating-link" data-bs-toggle="modal" data-bs-target="#ratingModal">Leave a
                            Rating</a>
                    @endif
                    <!-- Modal -->
                    <x-coursedescription.rating-modal :course="$course" />

                    <button class="button button--primary">Next Lession</button>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Ends Here -->

    <!-- Course Description Starts Here -->
    <div class="container-fluid">
        <div class="row course-description">
            <div class="col-lg-8">
                <div class="course-description-start">
                    <div class="video-area">
                        <div class="course-overview-image" style="
                        width: 100%;
                    ">
                            <img src="{{ asset($course->thumbnail) }}" alt="img" style="
                            width: inherit;
                            border: inherit;
                            object-fit: cover;
                        " />
                            <a id="lesson_video" class="popup-video play-button"
                                href="{{ $selected_lesson ? $selected_lesson->video_url : $course->video_url }}">
                                <svg width=" 23" height="27" viewBox="0 0 23 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                        fill="#1089FF"></path>
                                </svg>
                            </a>
                        </div>
                        {{-- <video controls id="my-video" class="video-js w-100"
                            poster="{{ asset('frontend') }}/dist/images/courses/vthumb.jpg" data-setup="{}">
                            <source src="{{ asset('frontend') }}/dist/images/courses/video.mp4" class="w-100" />
                        </video> --}}
                        {{-- <source src="https://www.youtube.com/watch?v=wcmQjEJTGD4" class="w-100" /> --}}
                    </div>
                    <div class="course-description-start-content">
                        <h5 class="font-title--sm">
                            @if (!empty($selected_lesson))
                                {{ $selected_lesson->lesson_name }}
                            @else
                                {{ $course->title ? $course->title : 'Nothing found' }}
                            @endif
                        </h5>
                        <nav class="course-description-start-content-tab">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link {{ $errors->any() ? '' : 'active' }}" id="nav-ldescrip-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-ldescrip" type="button" role="tab"
                                    aria-controls="nav-ldescrip" aria-selected="true">
                                    Lesson Description
                                </button>
                                <button class="nav-link" id="nav-lnotes-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-lnotes" type="button" role="tab" aria-controls="nav-lnotes"
                                    aria-selected="false">Lesson Notes</button>
                                <button class="nav-link {{ $errors->any() ? 'active' : '' }}" id="nav-lcomments-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-lcomments" type="button" role="tab"
                                    aria-controls="nav-lcomments" aria-selected="false">Comments</button>
                                <button class="nav-link" id="nav-loverview-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-loverview" type="button" role="tab"
                                    aria-controls="nav-loverview" aria-selected="false">Course Overview</button>
                                <button class="nav-link" id="nav-linstruc-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-linstruc" type="button" role="tab" aria-controls="nav-linstruc"
                                    aria-selected="false">Instructor</button>
                            </div>
                        </nav>
                        <div class="tab-content course-description-start-content-tabitem" id="nav-tabContent">
                            <div class="tab-pane fade {{ $errors->any() ? '' : 'show active' }}" id="nav-ldescrip"
                                role="tabpanel" aria-labelledby="nav-ldescrip-tab">
                                <!-- Lesson Description Starts Here -->
                                <div class="lesson-description">
                                    @if (!empty($selected_lesson->description))
                                        {!! $selected_lesson->description !!}
                                    @else
                                        {!! $course->description ? $course->description : 'Nothing found' !!}
                                    @endif
                                </div>
                                <!-- Lesson Description Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="nav-lnotes" role="tabpanel" aria-labelledby="nav-lnotes-tab">
                                <!-- Course Notes Starts Here -->
                                <div class="course-notes-area">
                                    @if (!empty($selected_lesson->note))
                                        {!! $selected_lesson->note !!}
                                    @else
                                        {{ $course->note ? $course->note : 'Nothing found' }}
                                    @endif
                                </div>
                                <!-- Course Notes Ends Here -->
                            </div>
                            <div class="tab-pane fade {{ $errors->any() ? 'show active' : '' }}" id="nav-lcomments"
                                role="tabpanel" aria-labelledby="nav-lcomments-tab">
                                @php
                                    $courseId = $course->id;
                                @endphp
                                <!-- Lesson Comments Starts Here -->
                                <x-coursedescription.comments :comments="$comments" :courseId="$courseId"
                                    :total="$total" :course="$course" />
                                <!-- Lesson Comments Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="nav-loverview" role="tabpanel"
                                aria-labelledby="nav-loverview-tab">
                                <!-- Course Overview Starts Here -->
                                <div class="row course-overview-main">
                                    {!! $course->description !!}
                                </div>
                                <!-- Course Overview Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="nav-linstruc" role="tabpanel"
                                aria-labelledby="nav-linstruc-tab">
                                <!-- course details instructor  -->
                                <x-coursedescription.instructor-details :avgStar="$avgStar" :course="$course"
                                    :totalcourses="$instructorTotalCourses" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- course contents --}}
            <x-coursedescription.course-contents :course="$course" />
        </div>
    </div>
    <!-- Course Description Ends Here -->

    {{-- script --}}
    @include('components.coursedescription.script-files')


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function loadMoreData(id = 0) {
            axios.post('{{ route('course-load-data') }}', {
                    id: id,
                    course_id: ' {{ $courseId }}',
                })
                .then(res => {
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
</body>

</html>
