@extends('layouts.website')

@section('title') Forget Password - {{ env('APP_NAME') }} @endsection
@section('header-style') class="nav-shadow" @endsection

@section('content')
    <!-- Forget Password Area Starts Here -->
    <section class="section signup-area signin-area section-padding overflow-hidden">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 order-2 order-lg-0">
                    <div class="signup-area-textwrapper">
                        <h2 class="font-title--md mb-0">Forget Passowrd</h2>
                        <p class="mt-2 mb-lg-4 mb-3">Don't have account? <a href="{{ route('student.register') }}"
                                class="text-black-50">Sign up</a></p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-element @error('email') error @enderror">
                                <div class="@error('email') form-alert @enderror">
                                    <label for="name">Email</label>
                                    @if ($errors->has('email'))
                                        <span>*{{ $errors->first() }}</span>
                                    @endif
                                </div>
                                <div class="@error('email') form-alert-input @enderror">
                                    <input placeholder="Enter email" type="email" id="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    <div class="@error('email') form-alert-icon @enderror">
                                        @if ($errors->any())
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-alert-circle">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-element">
                                <button type="submit" class="button button-lg button--primary w-100">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="signup-area-image">
                        <img src="{{ asset('frontend') }}/dist/images/signup/Illustration.png" alt="Illustration Image"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forget Password Area Ends Here -->

    <!-- Dot Images Starts Here -->
    <div class="dot-images">
        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-10.png" alt="shape" style="z-index: 1;"
            class="img-fluid first-dotimage">
        <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-07.png" alt="shape"
            class="img-fluid second-dotimage">
    </div>
    <!-- Dot Images Ends Here -->
@endsection
