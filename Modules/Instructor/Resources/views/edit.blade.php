@extends('layouts.admin')
@section('title') Instructor Edit @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Edit Instructor</h3>
                    <a href="{{ route('module.instructor.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <form class="form-horizontal" action="{{ route('module.instructor.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-center pt-3 pb-4">
                        <div class="col-md-8">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input value="{{ $instructor->firstname }}" name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter First Name">
                                            @error('firstname') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input value="{{ $instructor->lastname }}" name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Last Name">
                                            @error('lastname') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input value="{{ $instructor->email }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                            @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                            @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Phone </label>
                                            <input value="{{ $instructor->phone }}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone">
                                            @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>Profession </label>
                                           <input value="{{ $instructor->profession }}" name="profession" type="text" class="form-control @error('profession') is-invalid @enderror" placeholder="Enter Phone">
                                            @error('profession') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                       </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>Gender <span class="text-danger">*</span></label>
                                           <div class="form-group clearfix">
                                               <div class="icheck-primary d-inline">
                                                 <input {{ $instructor->gender == 'Male' ? 'checked':'' }} type="radio" id="radioPrimary2" name="gender" value="Male">
                                                 <label for="radioPrimary2">Male</label>
                                               </div>
                                               <div class="icheck-primary d-inline ml-3">
                                                 <input {{ $instructor->gender == 'Female' ? 'checked':'' }} type="radio" id="radioPrimary3" name="gender" value="Female">
                                                 <label for="radioPrimary3">Female</label>
                                               </div>
                                             </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>About Me</label>
                                           <textarea class="form-control" name="about" rows="5">{{ $instructor->about }}</textarea>
                                       </div>
                                   </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Address </label>
                                            <textarea name="address" class="form-control" rows="5">{{ $instructor->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Facebook URL </label>
                                            <input value="{{ $instructor->fb_link }}" name="fb_link" type="url" class="form-control @error('fb_link') is-invalid @enderror">
                                            @error('fb_link') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label>Twitter URL </label>
                                            <input value="{{ $instructor->twitter_link }}" name="twitter_link" type="url" class="form-control @error('twitter_link') is-invalid @enderror">
                                            @error('twitter_link') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>Instagram URL </label>
                                           <input value="{{ $instructor->instagram_link }}" name="instagram_link" type="url" class="form-control @error('instagram_link') is-invalid @enderror">
                                           @error('instagram_link') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                       </div>
                                   </div>
                                   <div class="col-6">
                                        <div class="form-group">
                                           <label>Youtube URL </label>
                                           <input value="{{ $instructor->youtube_link }}" name="youtube_link" type="url" class="form-control @error('youtube_link') is-invalid @enderror">
                                           @error('youtube_link') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                       </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                       <label>LinkedIn URL </label>
                                       <input value="{{ $instructor->linkedin_link }}" name="linkedin_link" type="url" class="form-control @error('linkedin_link') is-invalid @enderror">
                                       @error('linkedin_link') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                   </div>
                               </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-sync"></i> Update Instructor
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center mt-5">
                                @if ($instructor->image)
                                <img width="250px" height="250px" id="image" class="img-fluid" src="{{ asset($instructor->image) }}" alt="image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                @else
                                <img width="250px" height="250px" id="image" class="img-fluid" src="{{ asset('backend/image/default.png') }}" alt="image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                @endif

                                <div class="upload-btn-wrapper mt-3">
                                    <input name="image" class="@error('image') is-invalid @enderror" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" id="hiddenImgInput" type="file" hidden/>
                                    @error('image') <span class="invalid-feedback pb-2" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    <button onclick="$('#hiddenImgInput').click()"  class="btn btn-info" type="button">Choose an image</button>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection
