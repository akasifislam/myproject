@extends('layouts.admin')
@section('title') Site Settings @endsection
@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Settings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Settings</h3>
                </div>
                <div class="px-5 py-3">
                    @foreach ($settings as $setting)
                    <form class="form-horizontal" action="{{ route('website.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Site Name</label>
                                    <input value="{{ $setting->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                                    @error('name') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Site Email</label>
                                    <input value="{{ $setting->email }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Site Email">
                                    @error('email') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input value="{{ $setting->phone }}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Instagram Link</label>
                                    <input value="{{ $setting->instagram_link }}" name="instagram_link" type="url" class="form-control @error('instagram_link') is-invalid @enderror" >
                                    @error('instagram_link') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Linkedin Link</label>
                                    <input value="{{ $setting->linkedin_link }}" name="linkedin_link" type="url" class="form-control @error('linkedin_link') is-invalid @enderror" >
                                    @error('linkedin_link') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Twitter Link</label>
                                    <input value="{{ $setting->twitter_link }}" name="twitter_link" type="url" class="form-control @error('twitter_link') is-invalid @enderror" >
                                    @error('twitter_link') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">YouTube Link</label>
                                    <input value="{{ $setting->youtube_link }}" name="youtube_link" type="url" class="form-control @error('youtube_link') is-invalid @enderror" >
                                    @error('youtube_link') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Facebook Link</label>
                                    <input value="{{ $setting->fb_link }}" name="fb_link" type="url" class="form-control @error('fb_link') is-invalid @enderror">
                                    @error('fb_link') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Full Address</label>
                                    <textarea name="address" rows="4" class="form-control @error('email') is-invalid @enderror">{{ $setting->address }}</textarea>
                                    @error('address') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="form-label">Site Favicon</label>
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-2">
                                                @if (file_exists($setting->favicon_image))
                                                    <img class="img-circle" src="{{ asset($setting->favicon_image) }}" id="favicon_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @else
                                                    <img class="img-circle" src="{{ asset('backend/image/64x64.png') }}" id="favicon_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @endif
                                            </div>
                                            <div class="col-4 mt-4">
                                                <input type="file" name="favicon_image" autocomplete="image" onchange="document.getElementById('favicon_image').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            @error('favicon_image') <span class="text-danger" role="alert"><span>{{ $message }}</span></span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Header Logo</label>
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-2">
                                                @if (file_exists($setting->header_logo))
                                                    <img class="img-circle" src="{{ asset($setting->header_logo) }}" id="header_logo" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @else
                                                    <img class="img-circle" src="{{ asset('backend/image/headerlogo.png') }}" id="header_logo" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @endif
                                            </div>
                                            <div class="col-4 mt-4">
                                                <input type="file" name="header_logo" autocomplete="image" onchange="document.getElementById('header_logo').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            @error('header_logo') <span class="text-danger" role="alert"><span>{{ $message }}</span></span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="form-label">Footer Logo</label>
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-2">
                                                @if (file_exists($setting->footer_logo))
                                                    <img class="img-circle" src="{{ asset($setting->footer_logo) }}" id="footer_logo" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @else
                                                    <img class="img-circle" src="{{ asset('backend/image/footerlogo.png') }}" id="footer_logo" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @endif
                                            </div>
                                            <div class="col-4 mt-4">
                                                <input type="file" name="footer_logo" autocomplete="image" onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            @error('footer_logo') <span class="text-danger" role="alert"><span>{{ $message }}</span></span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

