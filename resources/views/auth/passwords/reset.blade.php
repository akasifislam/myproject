@extends('layouts.website')

@section('title') Reset Password - {{ env('APP_NAME') }} @endsection

@section('content')
    <!-- Forget Password Area Starts Here -->
    <section class="section signup-area signin-area section-padding overflow-hidden" style="height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-2 order-lg-0">
                    <h2 class="font-title--md mb-3">Reset Password</h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-element @error('email') error @enderror">
                            <div class="@error('email') form-alert-input @enderror">
                                <input hidden type="email" id="email" name="email" value="{{ $email ?? old('email') }}"
                                    required autocomplete="email" autofocus>
                                <div class="@error('email') form-alert-icon @enderror">
                                    @if ($errors->has('email'))
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-alert-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-element @error('password') error @enderror">
                            <div class="@error('password') form-alert @enderror">
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span>*{{ $errors->first() }}</span>
                                @endif
                            </div>

                            <div class="@error('password') form-alert-input @enderror">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                                <div class="form-alert-icon" onclick="showPassword('password',this);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-element @error('password_confirmation') error @enderror">
                            <div class="@error('password_confirmation') form-alert @enderror">
                                <label for="password-confirm">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span>*{{ $errors->first() }}</span>
                                @endif
                            </div>
                            <div class="@error('password_confirmation') form-alert-input @enderror">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <div class="form-alert-icon" onclick="showPassword('password-confirm',this);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-element">
                            <button type="submit" class="button button-lg button--primary w-100">Reset Password</button>
                        </div>
                    </form>
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
