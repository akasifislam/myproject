@extends('layouts.website')

@section('title') Course - {{ env('APP_NAME') }} @stop

@section('body-style') style='background-color: #ebebf2;' @stop

@section('content')
    <!-- Breadcrumb Starts Here -->
    <div class="event-sub-section eventsearch-sub-section">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses') }}" class="fs-6 text-secondary">course</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Ends Here -->
    <section class="section event-search">
        <form action="{{ route('courses') }}" method="GET" id="course_filtering">

            <div class="container">
                <x-sorting.search-filter :filterSearch="$filter_search" />

                <div class="row">
                    <div class="col-lg-4 d-none d-lg-block">
                        {{-- category sorting --}}
                        <div class="event-search-wizard" id="category">
                            <div class="event-search-wizard-header">
                                <h6>Category</h6>
                                <button style="border: 0; background: transparent;" type="button"
                                    onclick="toggle('category',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-sorting.category-sorting :filterCategory="$filter_category" :categories="$categories"
                                :totalCourseCount="$totalCourseCount" />
                        </div>
                        {{-- level sorting --}}
                        <div class="event-search-wizard" id="level">
                            <div class="event-search-wizard-header">
                                <h6>Level</h6>
                                <button style="border: 0; background: transparent;" type="button"
                                    onclick="accordion('level',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-sorting.level-sorting :courseLevels="$courseLevels" :totalCourseCount="$totalCourseCount" />
                        </div>

                        {{-- price sorting --}}
                        <div class="event-search-wizard" id="price">
                            <div class="event-search-wizard-header">
                                <h6>Price</h6>
                                <button style="border: 0; background: transparent;" type="button"
                                    onclick="accordion('price',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-sorting.price-sorting :filterMin='$filter_min' :filterMax='$filter_max' />
                        </div>

                        {{-- rating sorting --}}
                        <div class="event-search-wizard" id="rating">
                            <div class="event-search-wizard-header">
                                <h6>Rating</h6>
                                <button style="border: 0; background: transparent;" type="button"
                                    onclick="accordion('rating',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-sorting.rating-sorting :filterRating='$filter_rating' />
                        </div>

                        {{-- duration sorting --}}
                        <div class="event-search-wizard" id="duration">
                            <div class="event-search-wizard-header">
                                <h6>Duration</h6>
                                <button style="border: 0; background: transparent;" type="button"
                                    onclick="accordion('duration',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-sorting.duration-sorting :filterDuration='$filter_duration' :durations="$durations"
                                :totalCourseCount="$totalCourseCount" />
                        </div>


                    </div>
                    @php
                        $sorting = $filter_sorting;
                    @endphp
                    <div class="col-lg-8">
                        <div class="event-search-results">
                            <div class="event-search-results-heading">
                                <x-sorting.filtering :sorting="$sorting" />

                                @if ($totalCourses > 1)
                                    <p>{{ $totalCourses }} results found.</p>
                                @else
                                    <p>{{ $totalCourses }} result found.</p>
                                @endif
                                <button type="button"
                                    class="button button-lg button--primary button--primary-filter d-lg-none" id="filter">
                                    <span>
                                        <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    Filter
                                </button>
                            </div>
                        </div>
                        <div class="row event-search-content">
                            @forelse ($courses as $course)
                                <div class="col-sm-6 mb-4">
                                    {{-- single course --}}
                                    <x-courses.single-course :course="$course" />
                                </div>
                            @empty
                                <div>
                                    <h5 class="text-center mt-5 pt-5">
                                        No Course Found!
                                    </h5>
                                </div>
                            @endforelse
                        </div>
                        @if ($dataPaginate)
                            {{-- course pagination --}}
                            <x-courses.pagination :courses="$courses" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="filter-sidebar active">
                <div class="filter-sidebar__top">
                    <button class="filter--cross">
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5967 4.59668L5.40429 13.7891" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M5.40332 4.59668L14.5957 13.7891" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <div class="filter-sidebar__wrapper">
                    <div class="event-search-wizard" id="category-sidebar">
                        <div class="event-search-wizard-header">
                            <h6>Category</h6>
                            <button style="border: 0; background: transparent;" type="button"
                                onclick="toggle('category-sidebar',this);">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <x-sorting.category-sorting :totalCourseCount="$totalCourseCount" :filterCategory="$filter_category"
                            :categories="$categories" />
                    </div>
                    <div class="event-search-wizard" id="level-sidebar">
                        <div class="event-search-wizard-header">
                            <h6>Level</h6>
                            <button type="button" style="border: 0; background: transparent;"
                                onclick="toggle('level-sidebar',this);">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <x-sorting.level-sorting :courseLevels="$courseLevels" :totalCourseCount="$totalCourseCount" />
                    </div>
                    <div class="event-search-wizard" id="price-sidebar">
                        <div class="event-search-wizard-header">
                            <h6>Price</h6>
                            <button type="button" style="border: 0; background: transparent;"
                                onclick="toggle('price-sidebar',this);">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <x-sorting.price-sorting :filterMin='$filter_min' :filterMax='$filter_max' />
                    </div>
                    <div class="event-search-wizard" id="rating-sidebar">
                        <div class="event-search-wizard-header">
                            <h6>Rating</h6>
                            <button type="button" style="border: 0; background: transparent;"
                                onclick="toggle('rating-sidebar',this);">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <x-sorting.rating-sorting :filterRating='$filter_rating' />
                    </div>
                    <div class="event-search-wizard" id="duration-sidebar">
                        <div class="event-search-wizard-header">
                            <h6>Duration</h6>
                            <button type="button" style="border: 0; background: transparent;"
                                onclick="toggle('duration-sidebar',this);">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <x-sorting.duration-sorting :filterDuration='$filter_duration' :durations="$durations"
                            :totalCourseCount="$totalCourseCount" />
                    </div>
                </div>

                <button type="submit" class="button button-lg button--primary button--primary-filter w-100 d-lg-none"
                    type="button">
                    <span>
                        <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    Apply
                </button>
            </div>
            <input id="categoryWiseSorting" name="category" type="hidden"
                value="{{ $filter_category ? $filter_category : '' }}">
            <input id="levelSorting" name="level" type="hidden" value="{{ $filter_level ? $filter_level : '' }}">
            <input id="ratingStarSorting" name="star" type="hidden" value="{{ $filter_rating ? $filter_rating : '' }}">
            <input id="durationSortingInput" name="duration" type="hidden"
                value="{{ $filter_duration ? $filter_duration : '' }}">

        </form>
    </section>

@endsection

@section('style_course_page')
<link rel="stylesheet" href="{{ asset('frontend') }}/src/scss/vendors/plugin/css/jquery-ui.css" />
@endsection

@section('script')
<script>
    function accordion(id, el) {
        const wizard = document.getElementById(id);
        console.log(wizard);
        wizard.classList.toggle("active");
    }

    function coursePageRedirect() {
        window.location.href = '{{ route('courses') }}';
    }

    function categorySorting(categorySlug) {
        console.log(123)
        $('#categoryWiseSorting').val(categorySlug)
        $('#course_filtering').submit()
    }

    function courseLevelSorting(level) {
        $('#levelSorting').val(level)
        $('#course_filtering').submit()
    }

    function ratingSorting(star) {
        $('#ratingStarSorting').val(star)
        $('#course_filtering').submit()
    }

    function durationSorting(hour) {
        $('#durationSortingInput').val(hour)
        $('#course_filtering').submit()
    }

    // new
    function toggle(id, el) {
        const wizard = document.getElementById(id);
        wizard.classList.toggle("active");
    }

    const filterBtn = document.querySelector("#filter");
    const cross = document.querySelector(".filter--cross");
    filterBtn.addEventListener("click", function() {
        let sidebar = document.querySelector(".filter-sidebar");
        sidebar.classList.toggle("active");
    });
    cross.addEventListener("click", function() {
        let sidebar = document.querySelector(".filter-sidebar");
        sidebar.classList.remove("active");
    });

    $(function() {
        $('#slider-range').slider({
            range: true,
            orientation: 'horizontal',
            min: 0,
            max: 5000,
            values: [{{ $filter_min ? $filter_min : '0' }},
                {{ $filter_max ? $filter_max : '5000' }}
            ],
            step: 100,

            slide: function(event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $('#min_price').val(ui.values[0]);
                $('#max_price').val(ui.values[1]);
            },
        });

        $('#min_price').val($('#slider-range').slider('values', 0));
        $('#max_price').val($('#slider-range').slider('values', 1));
    });
</script>
@endsection

@section('script_course_page')
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/price_range_script.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery-ui.min.js"></script>
@endsection
