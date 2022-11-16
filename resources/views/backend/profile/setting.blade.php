@extends('layouts.admin')
@section('title') Profile Settings @endsection
@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Setting</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile Settings</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a
                        class="nav-link {{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? '' : 'active' }}"
                        href="#gen_settings" data-toggle="tab">General Settings</a></li>
                <li class="nav-item"><a
                        class="nav-link {{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? 'active' : '' }}"
                        href="#settings" data-toggle="tab">Change Password</a></li>
                @auth('instructor')
                    <li class="nav-item "><a class="nav-link" href="#education" data-toggle="tab">Education and Experience</a>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade {{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? '' : 'show active' }}"
                    id="gen_settings" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="tab-pane active" id="gen_settings">

                                @if ($role == 'admin')
                                    <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row justify-content-center pt-3 pb-4">
                                            <div class="col-md-8">
                                                <input type="hidden" value="{{ $user->id }}" name="admin_id">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">First Name</label>
                                                            <input name="firstname" value="{{ $user->firstname }}"
                                                                type="text"
                                                                class="form-control @error('firstname') is-invalid @enderror"
                                                                placeholder="Enter First Name">
                                                            @error('firstname') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Last Name</label>
                                                            <input name="lastname" value="{{ $user->lastname }}"
                                                                type="text"
                                                                class="form-control @error('lastname') is-invalid @enderror"
                                                                placeholder="Enter Last Name">
                                                            @error('lastname') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <input name="email" value="{{ $user->email }}" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="Enter New Email">
                                                            @error('email') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Phone</label>
                                                            <input name="phone" value="{{ $user->phone }}" type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Enter Phone Number">
                                                            @error('phone') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Address</label>
                                                            <textarea name="address" rows="4"
                                                                class="form-control @error('address') is-invalid @enderror">{{ $user->address }}</textarea>
                                                            @error('address') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">About</label>
                                                            <textarea name="about" rows="4"
                                                                class="form-control @error('about') is-invalid @enderror">{{ $user->about }}</textarea>
                                                            @error('about') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fas fa-sync"></i> Update Profile</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center mt-5">

                                                    @if ($user->image)
                                                        <img width="250px" height="250px" id="image" class="img-fluid"
                                                            src="{{ asset($user->image) }}" alt="User profile picture"
                                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                                    @else
                                                        <img width="250px" height="250px" class="img-fluid"
                                                            src="{{ asset('backend/image/default.png') }}"
                                                            alt="User profile picture"
                                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                                    @endif

                                                    <div class="upload-btn-wrapper mt-3">
                                                        <input name="image"
                                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                            id="hiddenImgInput" type="file" hidden />
                                                        <button onclick="$('#hiddenImgInput').click()" class="btn btn-info"
                                                            type="button">Choose an image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                @elseif ($role == 'instructor')

                                    <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row justify-content-center pt-3 pb-4">
                                            <div class="col-md-8">
                                                <input type="hidden" value="{{ $user->id }}" name="instructor_id">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">First Name</label>
                                                            <input name="firstname" value="{{ $user->firstname }}"
                                                                type="text"
                                                                class="form-control @error('firstname') is-invalid @enderror"
                                                                placeholder="Enter First Name">
                                                            @error('firstname') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Last Name</label>
                                                            <input name="lastname" value="{{ $user->lastname }}"
                                                                type="text"
                                                                class="form-control @error('lastname') is-invalid @enderror"
                                                                placeholder="Enter Last Name">
                                                            @error('lastname') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <input name="email" value="{{ $user->email }}" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="Enter New Email">
                                                            @error('email') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Phone</label>
                                                            <input name="phone" value="{{ $user->phone }}" type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Enter Phone Number">
                                                            @error('phone') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Profession</label>
                                                            <input name="profession" value="{{ $user->profession }}"
                                                                type="text"
                                                                class="form-control @error('profession') is-invalid @enderror"
                                                                placeholder="Enter New Profession">
                                                            @error('profession') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input {{ $user->gender == 'Male' ? 'checked' : '' }}
                                                                        type="radio" id="radioPrimary2" name="gender"
                                                                        value="Male">
                                                                    <label for="radioPrimary2">Male</label>
                                                                </div>
                                                                <div class="icheck-primary d-inline ml-3">
                                                                    <input
                                                                        {{ $user->gender == 'Female' ? 'checked' : '' }}
                                                                        type="radio" id="radioPrimary3" name="gender"
                                                                        value="Female">
                                                                    <label for="radioPrimary3">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">About</label>
                                                            <textarea name="about"
                                                                class="form-control @error('about') is-invalid @enderror"
                                                                rows="4">{{ $user->about }}</textarea>
                                                            @error('about') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Address</label>
                                                            <textarea name="address"
                                                                class="form-control @error('address') is-invalid @enderror"
                                                                rows="4">{{ $user->address }}</textarea>
                                                            @error('address') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Facebook</label>
                                                            <input name="fb_link" value="{{ $user->fb_link }}"
                                                                type="text"
                                                                class="form-control @error('fb_link') is-invalid @enderror"
                                                                placeholder="Enter New Facebook Link">
                                                            @error('fb_link') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Twitter</label>
                                                            <input name="twitter_link" value="{{ $user->twitter_link }}"
                                                                type="text"
                                                                class="form-control @error('twitter_link') is-invalid @enderror"
                                                                placeholder="Enter New Twitter Link">
                                                            @error('twitter_link') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Instagram</label>
                                                            <input name="instagram_link"
                                                                value="{{ $user->instagram_link }}" type="text"
                                                                class="form-control @error('instagram_link') is-invalid @enderror"
                                                                placeholder="Enter New Instagram Link">
                                                            @error('instagram_link') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">YouTube</label>
                                                            <input name="youtube_link" value="{{ $user->youtube_link }}"
                                                                type="text"
                                                                class="form-control @error('youtube_link') is-invalid @enderror"
                                                                placeholder="Enter New Twitter Link">
                                                            @error('youtube_link') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">LinkedIn</label>
                                                            <input name="linkedin_link"
                                                                value="{{ $user->linkedin_link }}" type="text"
                                                                class="form-control @error('linkedin_link') is-invalid @enderror"
                                                                placeholder="Enter New Twitter Link">
                                                            @error('linkedin_link') <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-6 offset-3 text-center">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="fas fa-sync"></i> Update Profile</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="text-center mt-5">

                                                    @if ($user->image)
                                                        <img width="250px" height="250px" id="image" class="img-fluid"
                                                            src="{{ asset($user->image) }}" alt="User profile picture"
                                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                                    @else
                                                        <img width="250px" height="250px" class="img-fluid"
                                                            src="{{ asset('backend/image/default.png') }}"
                                                            alt="User profile picture"
                                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                                    @endif

                                                    <div class="upload-btn-wrapper mt-3">
                                                        <input name="image"
                                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                            id="hiddenImgInput" type="file" hidden />
                                                        <button onclick="$('#hiddenImgInput').click()" class="btn btn-info"
                                                            type="button">Choose an image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2nd Tab --}}
                <div class="tab-pane fade {{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? 'show active' : '' }}"
                    id="settings" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form class="form-horizontal" action="{{ route('profile.password.update', $user->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input name="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            placeholder="Enter Current Password">
                                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter New Password">
                                        @error('password') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input name="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm New Password">
                                        @error('password_confirmation') <div class="invalid-feedback"> {{ $message }}
                                        </div> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @php
                    $instructor = auth('instructor')->user();
                @endphp
                @auth('instructor')
                    {{-- 3rd Tab --}}
                    <div class="tab-pane fade " id="education" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title" style="line-height: 36px;">Educational Qualification</h3>
                                            </div>
                                            @component('components.Education.table', compact('educations')) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($editMode && $education)
                                            @component('components.Education.editform', compact('education')) @endcomponent
                                        @else
                                            @component('components.Education.createform', compact('instructor')) @endcomponent
                                        @endif
                                    </div>
                                </div>

                                <!-- Experience  -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title" style="line-height: 36px;">Experience</h3>
                                            </div>
                                            @component('components.Experience.table', compact('experiences')) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($experiencEditMode && $experience)
                                            @component('components.Experience.editform', compact('experience')) @endcomponent
                                        @else
                                            @component('components.Experience.createform', compact('instructor')) @endcomponent
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
