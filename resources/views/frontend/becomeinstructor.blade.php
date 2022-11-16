@extends('layouts.website')

@section('title') Become an Instuctor - {{ env('APP_NAME') }} @endsection
@section('header-style') class="nav-shadow" @endsection

@section('content')
    <!-- Breadcrumb Starts Here -->
    <section class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb pb-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" class="fs-6 text-secondary">Become an
                        Instructor</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Ends Here -->

    <!-- Become An Instructor Starts Here -->
    <section class="section section--bg-white hero hero--two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero__img-content">
                        <div class="hero__img-content--main">
                            <img src="{{ asset('frontend') }}/dist/images/instructor/become.jpg" alt="image" />
                        </div>
                        <img src="{{ asset('frontend') }}/dist/images/shape/rec02.png" alt="shape"
                            class="hero hero__img-content--shape-01" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-06.png" alt="shape"
                            class="hero hero__img-content--shape-02" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero__content-info">
                        <h2 class="font-title--md mb-0">Become An Instrcutor</h2>
                        <p class="font-para--lg">
                            Suspendisse id dui sed eros volutpat viverra. Aliquam metus velit, sodales eu fringilla quis,
                            posuere vel massa. Sed ut metus at nisi pharetra suscipit. Donec facilisis faucibus augue, eu
                            sodales ante
                            tincidunt sed. Integer libero metus, convallis et ipsum mollis, ultrices convallis arcu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructor Rules Starts Here -->
    <section class="section section--bg-white hero hero--three">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-0">
                    <div class="hero__content-info">
                        <h2 class="font-title--md mb-0">Instructor Rules</h2>
                        <p class="font-para--lg">
                            Aed ut metus at nisi pharetra suscipit. Donec facilisis faucibus augue, eu sodales ante
                            tincidunt sed. Integer libero metus, convallis et ipsum mollis, ultrices convallis arcu.
                        </p>
                        <ul class="hero__dots-info">
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-0">
                    <div class="hero__img-content">
                        <div class="hero__img-content--main">
                            <img src="{{ asset('frontend') }}/dist/images/instructor/rules.jpg" alt="image" />
                        </div>
                        <img src="{{ asset('frontend') }}/dist/images/shape/rec03.png" alt="shape"
                            class="hero hero__img-content--shape-01" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-08.png" alt="shape"
                            class="hero hero__img-content--shape-02" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--bg-offwhite-one top-bg overflow-hidden sucessfullInstructor pb-0">
        <div class="container">
            <h2 class="font-title--md text-center mx-auto">How You Will Become Successful Instructor</h2>
            <div class="row feature my-5">
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Upload Course</h5>
                        <p class="font-para--lg">Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum
                            justo. Vivamus interdum.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-book">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Inspire Students</h5>
                        <p class="font-para--lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed commodo
                            enim Fusce sed.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature">
                        <div class="cardFeature__icon cardFeature__icon--bg-user">
                            <svg width="20" height="32" viewBox="0 0 20 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.875 2V30" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16.4375 7.09082H6.59375C5.37541 7.09082 4.20697 7.56014 3.34548 8.39553C2.48398 9.23092 2 10.3639 2 11.5454C2 12.7268 2.48398 13.8598 3.34548 14.6952C4.20697 15.5306 5.37541 15.9999 6.59375 15.9999H13.1562C14.3746 15.9999 15.543 16.4692 16.4045 17.3046C17.266 18.14 17.75 19.273 17.75 20.4545C17.75 21.6359 17.266 22.7689 16.4045 23.6043C15.543 24.4397 14.3746 24.909 13.1562 24.909H2"
                                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Earn Money</h5>
                        <p class="font-para--lg">Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum
                            justo. Vivamus interdum.</p>
                    </div>
                </div>
            </div>

            <div class="section hero hero--four row align-items-center">
                <div class="col-lg-6">
                    <div class="hero__img-content">
                        <div class="hero__img-content--main">
                            <img src="{{ asset('frontend') }}/dist/images/instructor/info-desk.jpg" alt="image" />
                        </div>
                        <img src="{{ asset('frontend') }}/dist/images/shape/reactangle-lg.png" alt="shape"
                            class="hero hero__img-content--shape-01" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-15.png" alt="shape"
                            class="hero hero__img-content--shape-02" />
                        <img src="{{ asset('frontend') }}/dist/images/shape/circle2.png" alt="shape"
                            class="hero hero__img-content--shape-03" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero__content-info">
                        <h2 class="font-title--md mb-0 w-100">We’re Here to Help You</h2>
                        <p class="font-para--lg">
                            Suspendisse id dui sed eros volutpat viverra. Aliquam metus velit, sodales eu fringilla quis,
                            posuere vel massa. Sed ut metus at nisi pharetra suscipit. Donec facilisis faucibus augue, eu
                            sodales ante
                            tincidunt sed.
                        </p>
                        <ul class="hero__dots-info">
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                            <li>
                                <span></span>
                                <p>Praesent elementum urna in sollicitudin tincidunt.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="section__overlay">
            <span class="section__overlay--shape-01">
                <img src="{{ asset('frontend') }}/dist/images/shape//circle3.png" alt="shape circle" />
            </span>
        </div>
    </section>

    <!-- Call To Action Starts Here -->
    <section class="section section--bg-white calltoaction">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 mx-auto text-center">
                    <h5 class="font-title--sm">Become an Instructor</h5>
                    <p class="my-4 font-para--lg">
                        Duis posuere maximus arcu eu tincidunt. Nam rutrum, nibh vitae tempus venenatis, ex tortor ultricies
                        magna, et faucibus magna eros quis arcu.
                    </p>
                    <a href="{{ route('becomeinstructor.register') }}" class="button button-md button--primary">Let’s
                        Go</a>
                </div>
            </div>
        </div>
    </section>

@endsection
