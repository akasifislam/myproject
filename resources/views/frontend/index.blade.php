@extends('layouts.website')

@section('title') Home - {{ env('APP_NAME') }} @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">@endsection

@section('footer_class') footer-ex-p @endsection

@section('content')
    <!-- Banner Starts Here -->
    <section class="main-banner" style="background-image: url({{ asset('frontend/dist/images/banner/banner.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-lg-0 order-2 order-lg-0">
                    <div class="banner-two-start">
                        <h1 class="font-title--lg">Learn with Expert Anytime Anywhere.</h1>
                        <p>Our mision is to help people to find the best course online and learn with expert anytime,
                            anywhere.</p>

                        {{-- search --}}
                        <x-frontend.banner-search :categories="$allcategories" />
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-0">
                    <div class="main-banner-end"><img src="{{ asset('frontend/dist/images/banner/banner-image-01.png') }}"
                            alt="image" class="img-fluid" /></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse Categories Starts Here -->
    <section class="section browse-categories">
        <div class="container">
            <h2 class="font-title--md text-center">Browse Course with Top Categories</h2>
            <div class="browse-categories__wrapper position-relative">
                <div class="categories--box">
                    @foreach ($topCategories as $category)
                        <form action="{{ route('courses') }}" method="GET" class="categoryWiseCourseForm">
                            <input class="category_wise_input" type="hidden" name="category">
                            <div class="browse-categories-item default-item-one">
                                <div class="browse-categories-item-icon">
                                    @switch($loop->iteration)
                                        @case(1)
                                            <div class="categories-one default-categories">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @break
                                        @case(2)
                                            <div class="categories-two default-categories">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @break
                                        @case(3)
                                            <div class="categories-three default-categories">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @break
                                        @case(4)
                                            <div class="categories-four default-categories">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @break
                                        @case(5)
                                            <div class="categories-five default-categories">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @break
                                        @default

                                    @endswitch
                                </div>
                                <div class="browse-categories-item-text">
                                    <h6 class="font-title--card"><a onclick="categoryWiseCourse('{{ $category->slug }}')"
                                            href="javascript:void(0)">{{ $category->name }}</a></h6>
                                    <p>{{ $category->course->count() }} Courses</p>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center"><a href="{{ route('courses') }}"
                        class="button button-lg button--primary mt-lg-5 mt-5">Browse all Courses</a></div>
            </div>
        </div>
        <div class="browse-categories-shape">
            <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-11.png') }}" alt="shape"
                class="img-fluid shape-01" />
            <img src="{{ asset('frontend/dist/images/shape/line01.png') }}" alt="shape" class="img-fluid shape-02" />
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
                                        <button class="nav-link" id="pills-{{ $category->id }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-{{ $category->slug }}" type="button" role="tab"
                                            aria-controls="pills-{{ $category->id }}" aria-selected="false">
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

    <section class="section feature section section--bg-offwhite-one">
        <div class="container">
            <h2 class="font-title--md text-center">Why You'll Learn with {{ env('APP_NAME') }}</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-book">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">250k online course</h5>
                        <p class="font-para--lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed commodo
                            enim Fusce sed.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
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

    <!--  Learning Rules Starts Here -->
    <section class="section learning-rules">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-0">
                    <div class="learning-rules-starts">
                        <h2 class="font-title--md">How You’ll Learning Something New on {{ env('APP_NAME') }}.</h2>
                        <div class="learning-rules-item">
                            <div class="item-number"><span>1.</span></div>
                            <div class="item-text">
                                <h6 class="font-title--xs">Make Your Own Place.</h6>
                                <p class="font-para--lg">Fusce dictum, velit eu placerat consectetur, ante nisl auctor
                                    magna, sit amet fringilla urna nibh a risus.</p>
                            </div>
                        </div>
                        <div class="learning-rules-item">
                            <div class="item-number"><span>2.</span></div>
                            <div class="item-text">
                                <h6 class="font-title--xs">Find Best Course With Better Filtter.</h6>
                                <p class="font-para--lg">Morbi id est a risus sollicitudin maximus. Fusce lorem neque,
                                    tincidunt vel rhoncus eget, convallis ullamcorper sem.</p>
                            </div>
                        </div>
                        <div class="learning-rules-item">
                            <div class="item-number"><span>3.</span></div>
                            <div class="item-text">
                                <h6 class="font-title--xs">And Become a Master in Your Field.</h6>
                                <p class="font-para--lg">Sed pulvinar dignissim neque, ac consectetur urna tincidunt vel.
                                    Sed congue nulla sed tempus ultrices.</p>
                            </div>
                        </div>
                        <a href="{{ route('courses') }}" class="button button-lg button--primary mt-lg-5 mt-2">Start
                            Learning</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-0">
                    <div class="learning-rules-ends">
                        <img src="{{ asset('frontend') }}/dist/images/hero/hero-img-01.jpg" alt="img"
                            class="img-fluid" />
                        <div class="learning-rules-ends-circle"><img
                                src="{{ asset('frontend') }}/dist/images/shape/l03.png" alt="shape" class="img-fluid" />
                        </div>
                        <div class="earning-rules-ends-shape"><img
                                src="{{ asset('frontend') }}/dist/images/shape/l04.png" alt="shape"
                                class="img-fluid shape-1" /> <img src="{{ asset('frontend') }}/dist/images/shape/l05.png"
                                alt="shape" class="img-fluid shape-2" /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="learning-rules-shape"><img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-16.png"
                alt="shape" class="img-fluid shape-01" /> <img src="{{ asset('frontend') }}/dist/images/shape/l02.png"
                alt="shape" class="img-fluid shape-02" /></div>
    </section>

    <!--  About Services Starts Here -->
    <section class="section about-services section section--bg-offgradient">
        <div class="container about-services-area">
            <div class="row">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-title--md">What Our Students Says About our Services</h2>
                </div>
            </div>
            <div class="testimonial testimonial--one testimonial__slider--one">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial__item">
                        <p class="font-para--lg">“{{ $testimonial->description }}“</p>
                        <div class="testimonial__user-wrapper d-flex justify-content-between">
                            <div class="testimonial__user d-flex align-items-center">
                                <div class="testimonial__user-img"><img style="width: 64px; height: 64px"
                                        src="{{ $testimonial->image }}" alt="Client" /></div>
                                <div class="testimonial__user-info">
                                    <h6>{{ $testimonial->name }}</h6>
                                    <span class="font-para--md">{{ $testimonial->position }}</span>
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
        <div class="about-services-shape">
            <img src="{{ asset('frontend') }}/dist/images/shape/line02.png" alt="shape" class="img-fluid img-shape-01" />
            <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-13.png" alt="shape"
                class="img-fluid img-shape-02" />
            <img src="{{ asset('frontend') }}/dist/images/shape/l02.png" alt="shape" class="img-fluid img-shape-03" />
        </div>
        <div class="container overflow-hidden">
            <div class="row mb-40">
                <div class="col-lg-6 mx-auto text-center brands-area-two-heading">
                    <h4 class="mb-2 dark-text">Over 30,000+ Schools & College Learning With Us.</h4>
                    <p>Proin euismod elementum dolor, non iaculis velit mollis sed. In eleifend urna sit amet purus congue.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-area">
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/1.png"
                                alt="Brand" class="img-fluid" /></div>
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/2.png"
                                alt="Brand" class="img-fluid" /></div>
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/3.png"
                                alt="Brand" class="img-fluid" /></div>
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/4.png"
                                alt="Brand" class="img-fluid" /></div>
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/2.png"
                                alt="Brand" class="img-fluid" /></div>
                        <div class="brand-area-image"><img src="{{ asset('frontend') }}/dist/images/versity/5.png"
                                alt="Brand" class="img-fluid" /></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Instructors Starts Here -->
    @if (count($instructors))
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
    @endif

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
                                <x-event.single-event :event="$event" class="contentCard--space" />
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
                            <div class="text-center"><a href="javascript:void(0)" class="green-btn">Get
                                    {{ env('APP_NAME') }} For
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
                                <input required name="email" type="email" value="{{ old('email') }}"
                                    class="form-control border-lowBlack" placeholder="Your email" />
                                <button class="button button-lg button--primary" type="submit">Subscribe</button>
                            </div>
                            @error('email') <span
                                    class="invalid-feedback text-start mb-3 d-block">{{ $message }}</span>
                            @enderror
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

    function categoryWiseCourse(slug) {
        $('.category_wise_input').val(slug)
        $('.categoryWiseCourseForm').submit()
    }
</script>
@endsection
