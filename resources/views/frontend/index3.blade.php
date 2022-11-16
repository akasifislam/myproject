@extends('layouts.website')

@section('title') Home - {{ env('APP_NAME') }} @endsection

@section('content')

    <!-- Banner Startrs Here -->
    <section class="banner-three"
        style="background: url({{ asset('frontend') }}/dist/images/banner/banner-image-03.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row align-items-center banner-three-content">
                <div class="col-lg-7 position-relative">
                    <h1 class="font-title--lg">Learn with {{ $bestInstructor->firstname }} Anytime Anywhere.</h1>
                    <p>{{ $bestInstructor->about }}
                    </p>
                    <a class="btn-white" href="{{ route('student.register') }}">Get Started</a>
                    <div class="playbtn-area">
                        <a href="https://www.youtube.com/watch?v=3CvFz5j1Krk" class="play-button pulse">
                            <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.2843 13.5451C19.2012 13.6563 18.8133 14.1293 18.5085 14.4354L18.3423 14.6023C16.0148 17.1343 10.2239 20.9461 7.28683 22.1703C7.28683 22.1982 5.54124 22.9216 4.71 22.9494H4.59917C3.32461 22.9494 2.13317 22.226 1.5236 21.0574C1.19111 20.4175 0.886319 18.5533 0.858611 18.5255C0.60924 16.856 0.442993 14.2991 0.442993 11.4861C0.442993 8.53682 0.60924 5.86577 0.914027 4.22418C0.914027 4.19636 1.21881 2.69389 1.41277 2.19307C1.71755 1.46966 2.27171 0.857541 2.96441 0.468012C3.51857 0.189777 4.10043 0.0506592 4.71 0.0506592C5.34728 0.0784827 6.53872 0.498617 7.00976 0.6906C10.113 1.91483 16.0425 5.92142 18.3146 8.36988C18.7025 8.75941 19.1181 9.23241 19.2289 9.34371C19.7 9.95582 19.9493 10.7071 19.9493 11.5167C19.9493 12.2373 19.7277 12.9608 19.2843 13.5451"
                                    fill="#1089FF" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- New Course Feature Starts Here -->
    <section class="section new-course-feature">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="font-title--md">Popular Online Courses</h2>
                </div>
            </div>

            <div class="new__courses">
                @foreach ($popularCourses as $course)
                    <x-courses.single-course :course="$course" />
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('courses') }}" class="button button-lg button--primary mt-lg-5 mt-5">Browse all
                        Courses</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Hero Area Starts Here -->
    <section class="section section--bg-white hero hero--five hero--five-p">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <div class="hero__img-content">
                        <div class="hero__img-content--main">
                            <img src="{{ asset($bestInstructor->image) }}" alt="image" class="img-fluid" />
                        </div>
                        <img src="{{ asset('frontend') }}/dist/images/shape/line.png" alt="shape"
                            class="hero__img-content--shape-01" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-10.png" alt="shape"
                            class="hero__img-content--shape-02" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/reactangle-2.png" alt="shape"
                            class="hero__img-content--shape-03" />
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hero__content-info">
                        <h2 class="font-title--md mb-0">Hi, I'm
                            {{ $bestInstructor->firstname . ' ' . $bestInstructor->lastname }}</h2>
                        <span>{{ $bestInstructor->profession }}</span>
                        <p class="font-para--lg">
                            {{ $bestInstructor->about }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section -->
    <section class="section feature section section--bg-offwhite-one">
        <div class="container">
            <h2 class="font-title--md text-center">Why Chose My Courses?</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-book">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-clock">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Lifetime Access</h5>
                        <p class="font-para--lg">
                            Vivamus cursus libero quis lobortis mattis. Suspendisse in malesuada mi. Maecenas vel euismod
                            turpis.
                        </p>
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
                        <h5 class="font-title--xs">54k Students Learning</h5>
                        <p class="font-para--lg">
                            Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum justo. Vivamus
                            interdum.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-clock">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">1.5k Online Courses</h5>
                        <p class="font-para--lg">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed commodo enim Fusce sed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Area Starts Here -->
    <section class="section section--bg-white">
        <div class="container">
            <h2 class="font-title--md text-center">What My Students Says About our Services</h2>
            <div class="testimonial testimonial--two testimonial__slider--two">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial__item">
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
                        <p class="font-para--lg">
                            “{{ $testimonial->description }}“
                        </p>

                        <div class="testimonial__user d-flex align-items-center justify-content-lg-start">
                            <div class="testimonial__user-img">
                                <img style="width: 64px; height: 64px"
                                    src="{{ asset($testimonial->image) }}" alt="Client" />
                            </div>
                            <div class="testimonial__user-info">
                                <h6>{{ $testimonial->name }}</h6>
                                <span class="font-para--md">{{ $testimonial->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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

    <!-- Newsletter Area Starts Here -->
    <section class="section section--bg-white newsletterarea-normal">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="newsletterarea-normal-start">
                        <h5 class="font-title--sm">Subscribe to Get Notify</h5>
                        <p class="font-para--lg">Duis posuere maximus arcu eu tincidunt. Nam rutrum, nibh vitae tempus
                            venenatis.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="newsletterarea-normal-end">
                        <form method="POST" action="{{ route('module.email.store') }}">
                            @csrf
                            <div class="input-group">
                                <input name="email" type="email" value="{{ old('email') }}"
                                    class="form-control {{ $errors->first('email', 'is-invalid') }}"
                                    placeholder="Your email" required />
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
