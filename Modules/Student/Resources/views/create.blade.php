@extends('layouts.admin')
@section('title') Student Create @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Student</h3>
                        <a href="{{ route('module.student.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <form class="form-horizontal" action="{{ route('module.student.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row justify-content-center pt-3 pb-4">
                            <div class="col-md-8">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input value="{{ old('firstname') }}" name="firstname" type="text"
                                                class="form-control {{ $errors->first('firstname', 'is-invalid') }}"
                                                placeholder="Enter First Name">
                                            @error('firstname') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input value="{{ old('lastname') }}" name="lastname" type="text"
                                                class="form-control {{ $errors->first('lastname', 'is-invalid') }}"
                                                placeholder="Enter Last Name">
                                            @error('lastname') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input value="{{ old('email') }}" name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Email">
                                            @error('email') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input value="{{ old('password') }}" name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter Password">
                                            @error('password') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Phone </label>
                                            <input value="{{ old('phone') }}" name="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter Phone">
                                            @error('phone') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Nationality </label>
                                            <input value="{{ old('nationality') }}" name="nationality" type="text"
                                                class="form-control @error('nationality') is-invalid @enderror"
                                                placeholder="Nationality">
                                            @error('nationality') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>What Do You Do</label>
                                            <input value="{{ old('profession') }}" name="profession" type="text"
                                                class="form-control" placeholder="Profession">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About</label>
                                            <textarea class="form-control" name="about"
                                                rows="5">{{ old('about') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Create Student
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center mt-5">
                                    <img width="250px" height="250px" id="image" class="img-fluid"
                                        src="{{ asset('backend/image/default.png') }}" alt="image"
                                        style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">

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
                </div>
            </div>
        </div>
    </div>
@endsection
