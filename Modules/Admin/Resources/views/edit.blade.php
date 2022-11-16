@extends('layouts.admin')
@section('title') Edit Admin | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Update Admin</h3>
                        <a href="{{ route('module.admin.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <form class="form-horizontal" action="{{ route('module.admin.update', $admin->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row justify-content-center pt-3 pb-4">
                            <div class="col-md-8">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input value="{{ $admin->firstname }}" name="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                placeholder="Enter First Name" required autocomplete="off">
                                            @error('firstname') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input value="{{ $admin->lastname }}" name="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                placeholder="Enter Last Name" required autocomplete="off">
                                            @error('lastname') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input value="{{ $admin->email }}" name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Email" required autocomplete="off">
                                            @error('email') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Change Password <span class="text-danger">*</span></label>
                                            <input value="{{ $admin->password }}" name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter Password">
                                            @error('password') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Phone </label>
                                            <input value="{{ $admin->phone }}" name="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter Phone">
                                            @error('phone') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Address </label>
                                            <input value="{{ $admin->address }}" name="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Nationality">
                                            @error('address') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About</label>
                                            <textarea class="form-control" name="about"
                                                rows="5">{{ $admin->about }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-sync"></i> Update Admin
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center mt-5">
                                    @if ($admin->image)
                                        <img width="250px" height="250px" id="image" class="img-fluid"
                                            src="{{ asset($admin->image) }}" alt="image"
                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                    @else
                                        <img width="250px" height="250px" id="image" class="img-fluid"
                                            src="{{ asset('backend/image/default.png') }}" alt="image"
                                            style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                    @endif

                                    <div class="upload-btn-wrapper mt-3">
                                        <input name="image" class="@error('image') is-invalid @enderror"
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                            id="hiddenImgInput" type="file" hidden />
                                        @error('image') <span class="invalid-feedback pb-2"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror

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
