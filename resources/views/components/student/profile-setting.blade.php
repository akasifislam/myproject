<div class="row">
    <div class="col-lg-9 order-2 order-lg-0">
        <div class="white-bg">
            <div class="students-info-form">
                <h6 class="font-title--card">Your Information</h6>
                <form action="{{ route('student.info.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="fname">First Name</label>
                            <input type="text"
                                class="form-control @error('firstname') is-invalid @enderror"
                                value="{{ $student->firstname }}" id="fname"
                                name="firstname" />
                            @error('firstname') <span
                                    style="margin-top: -12px;display: block;margin-bottom: 10px;"
                                    class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="lname">Last Name</label>
                            <input type="text"
                                class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ $student->lastname }}" id="lname" name="lastname" />
                            @error('lastname') <span
                                    style="margin-top: -12px;display: block;margin-bottom: 10px;"
                                    class="invalid-feedback"
                                role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ $student->email }}" name="email" />
                            @error('email') <span
                                    style="margin-top: -12px;display: block;margin-bottom: 10px;"
                                    class="invalid-feedback"
                                role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="do">What Do You Do</label>
                            <input type="text" id="do" class="form-control"
                                value="{{ $student->profession }}" name="profession" />
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="pnumber">Phone Number</label>
                            <input type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ $student->phone }}" id="pnumber" name="phone" />
                            @error('phone') <span
                                    style="margin-top: -12px;display: block;margin-bottom: 10px;"
                                    class="invalid-feedback"
                                role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="nationality">Nationality</label>
                            <input type="text"
                                class="form-control @error('nationality') is-invalid @enderror"
                                value="{{ $student->nationality }}" id="nationality"
                                name="nationality" />
                            @error('nationality') <span
                                    style="margin-top: -12px;display: block;margin-bottom: 10px;"
                                    class="invalid-feedback"
                                role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about" id="about" cols="30"
                                rows="5">{{ $student->about }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-lg-end justify-content-center mt-2">
                        <button class="button button-lg button--primary" type="submit">Save Changes</button>
                    </div>
                    <input type="file" name="image" id="image" class="d-none"
                        onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                </form>
            </div>
        </div>
        <div class="white-bg mt-4">
            <div class="students-info-form">
                @if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h6>Change Password</h6>
                <form action="{{ route('student.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="cpass">Current Password</label>
                            <div class="input-with-icon">
                                <input type="password" id="cpass" class="form-control"
                                    placeholder="Enter Password" name="current_password" />
                                <div class="input-icon" onclick="showPassword('cpass',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="npass">New Password</label>
                            <div class="input-with-icon">
                                <input type="password" id="npass" class="form-control"
                                    placeholder="Enter Password" name="password" />
                                <div class="input-icon" onclick="showPassword('npass',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="cnpass">Confirm New Password</label>
                            <div class="input-with-icon">
                                <input type="password" id="cnpass" class="form-control"
                                    placeholder="Enter Password" name="password_confirmation" />
                                <div class="input-icon" onclick="showPassword('cnpass',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-lg-end justify-content-center mt-2">
                        <button class="button button-lg button--primary" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
        <div class="white-bg">
            <div class="change-image-wizard">
                <div class="image mx-auto">
                    <img id="img_preview" src="{{ asset($student->image) }}" alt="User"
                        class="img-fluid" style="width:200px;height:200px;border-radius:50%" />
                </div>
                <form action="#">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="button button--primary-outline"
                            onclick="document.getElementById('image').click()">CHANGE
                            iMAGE</button>
                    </div>
                </form>
                <p>Image size should be under 1MB image ratio 200px.</p>
            </div>
        </div>
    </div>
</div>
