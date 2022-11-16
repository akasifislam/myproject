@extends('layouts.website')

@section('title') Profile @endsection

@section('body-style') style="background-color: #ebebf2;" @stop

@section('content')
    <!-- Breadcrumb Starts Here -->
    <section class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Students Info area Starts Here -->
    <section class="section students-info">
        <div class="container">

            {{-- profile header --}}
            <x-student.profile-header :student="$student" :enrollCourses="$enrollCourses" />

            <div class="row students-info-main">
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <button class="nav-link {{ $errors->any() ? '' : 'active' }}" id="nav-profile-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                                aria-controls="nav-profile" aria-selected="true">My Profile</button>

                            <button class="nav-link" id="nav-coursesall-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-coursesall" type="button" role="tab" aria-controls="nav-coursesall"
                                aria-selected="false">All Courses</button>

                            <button class="nav-link" id="nav-activecourses-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-activecourses" type="button" role="tab"
                                aria-controls="nav-activecourses" aria-selected="false">
                                Active Courses
                            </button>

                            <button class="nav-link" id="nav-completedcourses-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-completedcourses" type="button" role="tab"
                                aria-controls="nav-completedcourses" aria-selected="false">
                                Completed Courses
                            </button>

                            <button class="nav-link" id="nav-purchase-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-purchase" type="button" role="tab" aria-controls="nav-purchase"
                                aria-selected="false">Purchase History</button>
                            <button class="nav-link {{ $errors->any() ? 'active' : '' }}" id="nav-setting-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-setting" type="button" role="tab"
                                aria-controls="nav-setting" aria-selected="false">Settings</button>

                            <button class="nav-link" id="nav-chat-tab" data-bs-toggle="tab" data-bs-target="#nav-chat"
                                type="button" role="tab" aria-controls="nav-completedcourses" aria-selected="false">
                                Chat
                            </button>

                            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="nav-link" id="nav-logout-tab" data-bs-toggle="tab" data-bs-target="#nav-logout"
                                type="button" role="tab" aria-controls="nav-logout" aria-selected="false">Logout</button>

                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade {{ $errors->any() ? '' : 'show active' }}" id="nav-profile"
                            role="tabpanel" aria-labelledby="nav-profile-tab">
                            {{-- profile info --}}
                            <x-student.profile-info :student="$student" />
                        </div>

                        <div class="tab-pane fade" id="nav-coursesall" role="tabpanel" aria-labelledby="nav-coursesall-tab">
                            {{-- all courses --}}
                            <x-student.all-courses :enrollCourses="$enrollCourses" />
                        </div>

                        <div class="tab-pane fade" id="nav-activecourses" role="tabpanel"
                            aria-labelledby="nav-activecourses-tab">
                            {{-- active courses --}}
                            <x-student.active-courses :enrollCourses="$enrollCourses" />
                        </div>

                        <div class="tab-pane fade" id="nav-completedcourses" role="tabpanel"
                            aria-labelledby="nav-completedcourses-tab">
                            {{-- completed courses --}}
                            <x-student.completed-courses :enrollCourses="$enrollCourses" />
                        </div>

                        <div class="tab-pane fade" id="nav-purchase" role="tabpanel" aria-labelledby="nav-purchase-tab">
                            {{-- orders purchase history --}}
                            <x-student.purchase-history :orders="$orders" />
                        </div>

                        <div class="tab-pane fade {{ $errors->any() ? 'show active' : '' }}" id="nav-setting"
                            role="tabpanel" aria-labelledby="nav-setting-tab">
                            {{-- profile setting --}}
                            <x-student.profile-setting :student="$student" />
                        </div>
                        <div class="tab-pane fade" id="nav-chat" role="tabpanel"
                            aria-labelledby="nav-setting-tab">
                            {{-- chat compoent --}}
                            <x-student.chat-component :student="$student" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
