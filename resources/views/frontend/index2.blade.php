@extends('layouts.website')

@section('title') Home - {{ env('APP_NAME') }} @endsection

@section('footer_class') footer-ex-p @endsection

@section('content')
    <!-- Banner Starts Here -->
    <section class="section banner-two overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0 order-2 order-lg-0">
                    <div class="banner-two-start">
                        <h1 class="font-title--lg">Learn with Expert Anytime Anywhere.</h1>
                        <p>Our mision is to help people to find the best course online and learn with expert anytime,
                            anywhere.</p>
                        {{-- search --}}
                        <x-frontend.banner-search :categories="$allcategories" />
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-0">
                    <div class="banner-two-end">
                        <div class="image">
                            <img src="{{ asset('frontend') }}/dist/images/banner/banner-image-02.png" alt="Instructor"
                                class="img-fluid" />
                        </div>
                        <div class="image-shapes">
                            <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-01.png" alt="shape"
                                class="img-fluid shape01" />
                            <img src="{{ asset('frontend') }}/dist/images/shape/rec07.png" alt="shape"
                                class="img-fluid shape02" />
                            <img src="{{ asset('frontend') }}/dist/images/shape/rec06.png" alt="shape"
                                class="img-fluid shape03" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Featured Starts Here -->
    <section class="section pb-0 home-top-feature">
        <svg class="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,192L60,165.3C120,139,240,85,360,106.7C480,128,600,224,720,224C840,224,960,128,1080,117.3C1200,107,1320,181,1380,218.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
        <div class="container">
            <div class="row feature">
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-book">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 4H10.4C11.8852 4 13.3096 4.5619 14.3598 5.5621C15.41 6.56229 16 7.91885 16 9.33333V28C16 26.9391 15.5575 25.9217 14.7699 25.1716C13.9822 24.4214 12.9139 24 11.8 24H2V4Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M30 4H21.6C20.1148 4 18.6904 4.5619 17.6402 5.5621C16.59 6.56229 16 7.91885 16 9.33333V28C16 26.9391 16.4425 25.9217 17.2302 25.1716C18.0178 24.4214 19.0861 24 20.2 24H30V4Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h5 class="font-title--xs">250K Online Course</h5>
                        <p class="font-para--lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed commodo
                            enim Fusce sed.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-user">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.3854 14.2241C24.8741 14.2241 26.8914 12.2068 26.8914 9.71806C26.8914 7.23066 24.8741 5.21204 22.3854 5.21204"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M24.4575 19.121C25.2009 19.1715 25.939 19.2781 26.6674 19.4394C27.6774 19.6403 28.8938 20.0544 29.3257 20.9606C29.6017 21.5414 29.6017 22.2179 29.3257 22.7988C28.8951 23.7049 27.6774 24.119 26.6674 24.3268"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5993 20.0912C18.6424 20.0912 22.9503 20.8552 22.9503 23.907C22.9503 26.9602 18.6697 27.7502 13.5993 27.7502C8.55612 27.7502 4.24963 26.9876 4.24963 23.9344C4.24963 20.8811 8.52879 20.0912 13.5993 20.0912Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5992 15.7349C10.2727 15.7349 7.6076 13.0684 7.6076 9.74188C7.6076 6.41669 10.2727 3.75024 13.5992 3.75024C16.9258 3.75024 19.5922 6.41669 19.5922 9.74188C19.5922 13.0684 16.9258 15.7349 13.5992 15.7349Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Expert Instructors</h5>
                        <p class="font-para--lg">Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum
                            justo. Vivamus interdum.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-clock">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-clock">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Lifetime Access</h5>
                        <p class="font-para--lg">Vivamus cursus libero quis lobortis mattis. Suspendisse in malesuada mi.
                            Maecenas vel euismod turpis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories Starts Here -->
    <section class="section featured-categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center font-title--md">Find Course with Top Categories</h2>
                </div>
            </div>

            <div class="categories categories__slider">
                @foreach ($categories as $category)
                    <div class="category">
                        <div class="category__img">
                            <a href="#"><img src="{{ $category->thumbnail }}" alt="images" class="img-fluid" /></a>
                        </div>
                        <div class="category__tittle">
                            <h6><a href="#">{{ $category->name }}</a></h6>
                            <span>{{ $category->course->count() }} Courses</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-center my-5 mb-0">
                    <a href="{{ route('courses') }}" class="button button-lg button--primary">Browse all Courses</a>
                </div>
            </div>
        </div>
    </section>

    <!--  Popular Courses Starts Here -->
    <section class="section section--bg-offwhite-three featured-popular-courses main-popular-course">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-popular-courses-heading d-flex align-content-center justify-content-between">
                        <div class="main-heading">
                            <h3 class="font-title--md">Our Popular Courses</h3>
                        </div>
                        <div class="nav-button featured-popular-courses-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active ps-0" id="pills-all-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                        aria-selected="true">All</button>
                                </li>

                                @foreach ($topCategories as $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-{{ $category->slug }}-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-{{ $category->slug }}"
                                            type="button" role="tab" aria-controls="pills-{{ $category->id }}"
                                            aria-selected="false">
                                            {{ $category->name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row">
                            @foreach ($popularCourses as $course)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <x-courses.single-course :course="$course" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($topCategories as $category)
                        <div class="tab-pane fade" id="pills-{{ $category->slug }}" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="row">
                                @foreach ($category->course->take(12) as $course)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <x-courses.single-course :course="$course" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('courses') }}" class="button button-lg button--primary mt-lg-5 mt-2">Browse all
                        Courses</a>
                </div>
            </div>
        </div>
        <div class="featured-popular-courses-shape">
            <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-12.png" alt="Shape"
                class="img-fluid dot-06" />
            <img src="{{ asset('frontend') }}/dist/images/shape/triangel.png" alt="Shape" class="img-fluid dot-07" />
        </div>
    </section>

    <!--  Students Says Starts Here -->
    <section class="section testimonial students-says mb-0 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial__img">
                        <img src="{{ asset('frontend') }}/dist/images/hero/hero-img-02.png" alt="image" />
                        <div class="dot">
                            <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-04.png" alt="dot images" />
                        </div>
                        <div class="rectangle">
                            <img src="{{ asset('frontend') }}/dist/images/shape/rectangle.png" alt="rectangle" />
                        </div>
                        <div class="play-video">
                            <a class="popup-video play-button" href="https://www.youtube.com/watch?v=3CvFz5j1Krk">
                                <svg width="23" height="27" viewBox="0 0 23 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                        fill="#1089FF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="testimonial__wrapper">
                        <div class="testimonial__wrapper_title">
                            <h3 class="font-title--md">What Our Students Says</h3>
                        </div>

                        <div class="testimonial testimonial--03 testimonial__slider--three">

                            @foreach ($testimonials as $testimonial)


                                <div class="testimonial__item">
                                    <p class="font-para--lg">
                                        “{{ $testimonial->description }}“
                                    </p>

                                    <div class="testimonial__user-wrapper d-flex justify-content-between">
                                        <div class="testimonial__user d-flex align-items-center">
                                            <div class="testimonial__user-img">
                                                <img style="width: 64px; height: 64px"
                                                    src="{{ asset($testimonial->image) }}"
                                                    alt="Client" />
                                            </div>
                                            <div class="testimonial__user-info">
                                                <h6>{{ $testimonial->name }}</h6>
                                                <span
                                                    class="font-para--md">{{ $testimonial->position }}</span>
                                            </div>
                                        </div>
                                        <ul class="testimonial__item-star d-flex align-items-center">
                                            @switch($testimonial->stars)
                                                @case(1)
                                                    @include('components.Stars.full')
                                                @break
                                                @case(2)
                                                    @for ($i = 0; $i < 2; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                                @case(3) @for ($i = 0; $i < 3; $i++)
                                                    @include('components.Stars.full') @endfor

                                                @break
                                                @case(4)
                                                    @for ($i = 0; $i < 4; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                                @case(5)
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                            @endswitch
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brands Starts Here -->
    <section class="section brands-area-two overflow-hidden">
        <div class="container">
            <div class="row mb-40">
                <div class="col-lg-6 mx-auto text-center brands-area-two-heading">
                    <h4 class="mb-2 dark-text">Over 30,000+ Schools & College Learning With Us.</h4>
                    <p>
                        Proin euismod elementum dolor, non iaculis velit mollis sed. In eleifend urna sit amet purus congue.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-area">
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/1.png" alt="Brand" class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/2.png" alt="Brand" class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/3.png" alt="Brand" class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/4.png" alt="Brand" class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/2.png" alt="Brand" class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{ asset('frontend') }}/dist/images/versity/5.png" alt="Brand" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Instructors Starts Here -->
    <section class="section best-instructor-featured overflow-hidden main-instructor-featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <h3 class="text-center mb-40 font-title--md">Meet Our Best Instructor</h3>
                    <div class="ourinstructor__wrapper mt-lg-5 mt-0">
                        <div class="ourinstructor-active">
                            @foreach ($instructors as $instructor)
                                <x-frontend.best-instructors :instructor="$instructor" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-instructor-featured-shape"><img
                src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-14.png" alt="shape"
                class="img-fluid shape01" /> <img src="{{ asset('frontend') }}/dist/images/shape/triangel2.png"
                alt="shape" class="img-fluid shape02" /></div>
    </section>

    <!--  Join Area Starts Here -->
    <section class="section section--bg-offwhite-two join">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="font-title--md mb-2 text-center">Start Learning with 250K Students Around the World.</h2>
                    <p class="font-para--lg text-center">Vivamus finibus, est id sodales imperdiet, ex dolor varius nibh, a
                        luctus erat risus sed velit. Phasellus scelerisque.</p>
                    <a href="{{ route('student.register') }}" class="button button-lg button--primary mt-lg-4 mt-2">Join
                        Today</a>
                </div>
            </div>
        </div>
        <div class="join__overlay">
            <div class="join__overlay-img join__overlay-img--1">
                <img src="{{ asset('frontend') }}/dist/images/join/01.png" alt="image" class="img-fluid" />
                <span>
                    <img src="{{ asset('frontend') }}/dist/images/join/shape03.svg" alt="Shape" class="img-fluid" />
                </span>
            </div>
            <div class="join__overlay-img join__overlay-img--2">
                <img src="{{ asset('frontend') }}/dist/images/join/02.png" alt="image" class="img-fluid" />
                <span>
                    <img src="{{ asset('frontend') }}/dist/images/join/shape04.svg" alt="Shape"
                        class="shape-04 img-fluid" />
                </span>
            </div>
            <div class="join__overlay-img join__overlay-img--3">
                <img src="{{ asset('frontend') }}/dist/images/join/shape06.svg" alt="Shape" class="shape-06 img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--4">
                <img src="{{ asset('frontend') }}/dist/images/join/shape05.svg" alt="Shape" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--5">
                <img src="{{ asset('frontend') }}/dist/images/join/shape07.svg" alt="Shape" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--6">
                <img src="{{ asset('frontend') }}/dist/images/join/03.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--7">
                <img src="{{ asset('frontend') }}/dist/images/join/07.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--8">
                <img src="{{ asset('frontend') }}/dist/images/join/01.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--9">
                <img src="{{ asset('frontend') }}/dist/images/join/06.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--10">
                <img src="{{ asset('frontend') }}/dist/images/join/07.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--11">
                <img src="{{ asset('frontend') }}/dist/images/join/08.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--12">
                <img src="{{ asset('frontend') }}/dist/images/join/09.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--13">
                <img src="{{ asset('frontend') }}/dist/images/join/10.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--14">
                <img src="{{ asset('frontend') }}/dist/images/join/11.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--15">
                <img src="{{ asset('frontend') }}/dist/images/join/shape03.svg" alt="Shape" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--16">
                <img src="{{ asset('frontend') }}/dist/images/join/13.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--17">
                <img src="{{ asset('frontend') }}/dist/images/join/01.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--18">
                <img src="{{ asset('frontend') }}/dist/images/join/14.png" alt="image" class="img-fluid" />
            </div>
            <div class="join__overlay-img join__overlay-img--19">
                <img src="{{ asset('frontend') }}/dist/images/join/01.png" alt="image" class="img-fluid" />
            </div>
        </div>
    </section>

    <!--  Latest Events Featured Starts Here -->
    @if (count($events))
        <section class="section section--bg-offwhite-three latest-events-featured main-events-featured">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="font-title--md">Latest Events</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 position-relative px-0 mx-0">
                        <div class="eventsSlider">
                            @foreach ($events as $event)
                                <div class="contentCard contentCard--event contentCard--space">
                                    <div class="contentCard-top">
                                        <a href="{{ route('event.details', $event->slug) }}"><img
                                                src="{{ asset($event->thumbnail) }}" alt="images"
                                                class="img-fluid" /></a>
                                    </div>
                                    <div class="contentCard-bottom">
                                        <h5>
                                            <a href="{{ route('event.details', $event->slug) }}"
                                                class="font-title--card">{{ $event->title }}</a>
                                        </h5>
                                        <div class="contentCard-more d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="icon"><img
                                                        src="{{ asset('frontend') }}/dist/images/icon/Location.png"
                                                        alt="location" /></div>
                                                <span>{{ Str::words($event->country . ', ' . $event->city, 4, '...') }}</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="icon"><img
                                                        src="{{ asset('frontend') }}/dist/images/icon/calendar.png"
                                                        alt="calendar" /></div>
                                                <span>{{ date('d M, Y', strtotime($event->date)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center"><a href="{{ route('event') }}"
                            class="button button-lg button--primary mt-lg-5 mt-5">Browse all events</a></div>
                </div>
            </div>
            <div class="main-events-featured-shape"><img src="{{ asset('frontend') }}/dist/images/shape/triangel3.png"
                    alt="shape" class="img-fluid shape01" /></div>
        </section>
    @endif

    <!--  Main Become Instructor Starts Here -->
    <section class="section main-become-instructor">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-become-instructor-item me-12">
                        <div class="main-image"><img src="{{ asset('frontend') }}/dist/images/event/image01.png"
                                alt="image" class="img-fluid" /></div>
                        <div class="main-text">
                            <h6 class="font-title--sm">Become an Instructor</h6>
                            <p>Praesent ultricies nulla ac congue bibendum. Aliquam tempor euismod purus posuere gravida.
                                Praesent augue sapien, vulputate eu imperdiet eget, tempor at enim.</p>
                            <div class="text-center"><a href="{{ route('becomeinstructor.index') }}"
                                    class="green-btn">Apply as Instructor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-become-instructor-item ms-12 mb-0">
                        <div class="main-image"><img src="{{ asset('frontend') }}/dist/images/event/image02.png"
                                alt="image" class="img-fluid" /></div>
                        <div class="main-text">
                            <h6 class="font-title--sm">Use {{ env('APP_NAME') }} For Business</h6>
                            <p>Praesent ultricies nulla ac congue bibendum. Aliquam tempor euismod purus posuere gravida.
                                Praesent augue sapien, vulputate eu imperdiet eget, tempor at enim.</p>
                            <div class="text-center"><a href="javascript:void(0)" class="green-btn">Get {{ env('APP_NAME') }} For
                                    Business</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-become-instructor-shape"><img src="{{ asset('frontend') }}/dist/images/shape/line03.png"
                alt="shape" class="img-fluid" /></div>
    </section>

    <!-- News Letter Starts Here -->
    <section style="background-color: #ebebf2;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="newsletter-area text-center">
                        <h4>Subscribe our Newsletter</h4>
                        <p class="mt-2 mb-lg-4 mb-3">Duis posuere maximus arcu eu tincidunt. Nam rutrum, nibh vitae tempus
                            venenatis, ex tortor ultricies magna, et faucibus magna eros quis arcu.</p>
                        <form method="POST" action="{{ route('module.email.store') }}">
                            @csrf
                            <div class="input-group">
                                <input name="email" type="email" value="{{ old('email') }}"
                                    class="form-control border-lowBlack {{ $errors->first('email', 'is-invalid') }}"
                                    placeholder="Your email" />
                                @error('email') <span class="invalid-feedback text-start mb-3">{{ $message }}</span>
                                @enderror
                                <button class="button button-lg button--primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function category_sorting_function(slug) {
            $('#category_input_value').val(slug)
            $('#category_sorting_form').submit()
        }
    </script>
@endsection
