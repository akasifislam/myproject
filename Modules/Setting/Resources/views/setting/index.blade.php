@extends('layouts.admin')
@section('title') Website Settings | Admin  @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Website Settings</h3>
                    </div>
                    <div class="card-body">
                        <div class="row pt-3 pb-4">
                            <div class="col-md-8 offset-md-2 mb-50 mt-20">
                                <form enctype="multipart/form-data" method="POST" action="{{ route('module.setting.update', $settings->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="form-check-label">Website Title</label>
                                            <input required value="{{ $settings->title }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                                            @error('title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="form-check-label">Website Sub Title</label>
                                            <input required value="{{ $settings->sub_title }}" name="sub_title" type="text" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter Sub Title">
                                            @error('sub_title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-check-label">Header Script</label>
                                            <textarea class="form-control @error('header_resource') is-invalid @enderror" row="3" name="header_resource" id="" cols="30" rows="10">{{ $settings->header_resource }}</textarea>
                                            @error('header_resource') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="form-check-label">Footer Script</label>
                                            <textarea class="form-control @error('footer_resource') is-invalid @enderror" row="3" name="footer_resource" id="" cols="30" rows="10">{{ $settings->footer_resource }}</textarea>
                                            @error('footer_resource') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Favicon</label>
                                            <br>
                                                @if ($settings->favicon)
                                                    <img width="110px" class="img-fluid" id="favicon" width="100px" src="{{ asset($settings->favicon) }}" alt="" >
                                                @else
                                                    <img width="110px" class="img-fluid" id="favicon" width="100px" src="{{ asset('backend/image/64x64.png') }}" alt="" >
                                                @endif
                                            <br>
                                            <br>
                                            <input name="favicon" onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])" id="favicon" type="file" class="form-control @error('favicon') is-invalid @enderror" placeholder="Enter Favicon">
                                            @error('favicon') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Logo</label>
                                            <br>
                                               @if ($settings->logo)
                                                   <img height="50px" width="170px" class="img-fluid" id="logo" src="{{ asset($settings->logo) }}" alt="" >
                                               @else
                                                   <img height="50px" width="170px" class="img-fluid" id="logo" src="{{ asset('backend/image/logo-default.png') }}" alt="" >
                                               @endif
                                            <br>
                                            <br>
                                            <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" placeholder="Enter logo" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])" id="logo">
                                            @error('logo') <span class="invalid-feedback" role="a lert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <button class="btn btn-success" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
