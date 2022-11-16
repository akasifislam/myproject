<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $setting = App\Models\WebsiteSettings::websiteSetting();
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @if ($setting->favicon_image && file_exists($setting->favicon_image))
        <link rel="icon" href="{{ asset($setting->favicon_image) }}" type="image" sizes="16x16">
    @else
        <link rel="icon" href="{{ asset('backend/image/64x64.png') }}" type="image" sizes="16x16">
    @endif

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/dist/img') }}/16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/dist/img') }}/32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('backend/dist/img') }}/64x64.png">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('livewire')
    @yield('style')
    <style>
        .nav-treeview a {
            margin-left: 30px;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @php
                $admin = Auth::guard('admin');
                $instructor = Auth::guard('instructor');

                if ($admin->check()) {
                    $user = $admin->user();
                    $role = 'admin';
                } elseif ($instructor->check()) {
                    $user = $instructor->user();
                    $role = 'instructor';
                } else {
                    $user = Auth::user();
                    $role = 'student';
                }
            @endphp
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if ($user->image)
                                <img width="30px" height="30px" class="rounded-circle mr-1"
                                    src="{{ asset($user->image) }}"
                                    alt="User profile picture">{{ $user->firstname }}
                            @else
                                <img width="30px" height="30px" class="rounded-circle mr-1"
                                    src="{{ asset('backend/image/defult.png') }}"
                                    alt="User profile picture">{{ $user->firstname }}
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="{{ route('profile') }}" class="dropdown-item text-primary" type="button"><i
                                    class="fas fa-user"></i> Profile</a>
                            <a href="{{ route('setting') }}" class="dropdown-item text-primary" type="button"><i
                                    class="fas fa-user-cog"></i> Setting</a>
                            <a class="dropdown-item text-danger" role="button" href="javascript:void(0)"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                @if ($setting->header_logo && file_exists($setting->header_logo))
                <img src="{{ asset($setting->header_logo) }}" alt="Logo Image"
                    class="brand-image img-circle">
                @else
                <img src="{{ asset('backend/image/headerlogo.png') }}" alt="Logo Image"
                    class="brand-image img-circle">
                @endif
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @auth('admin')
                            <x-sidebar-list :linkActive="Route::is('admin.dashboard') ? true : false"
                                route="admin.dashboard" icon="fas fa-tachometer-alt">
                                Dashboard
                            </x-sidebar-list>
                            @if (Module::collections()->has('Admin') || Module::collections()->has('Instructor') || Module::collections()->has('Student'))
                                <li
                                    class="nav-item {{ Route::is('module.admin.index') || Route::is('module.admin.create') || Route::is('module.admin.edit') || Route::is('module.admin.show') || Route::is('module.student.index') || Route::is('module.student.create') || Route::is('module.student.edit') || Route::is('module.student.show') || Route::is('module.instructor.index') || Route::is('module.instructor.create') || Route::is('module.instructor.edit') || Route::is('module.instructor.show') || Route::is('instructor.experience') || Route::is('instructor.experience.edit')|| Route::is('instructor.activity') || Route::is('instructor.education.edit') ? 'menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('module.admin.index') || Route::is('module.admin.create') || Route::is('module.admin.edit') || Route::is('module.admin.show') || Route::is('module.student.index') || Route::is('module.student.create') || Route::is('module.student.edit') || Route::is('module.student.show') || Route::is('module.instructor.index') || Route::is('module.instructor.create') || Route::is('module.instructor.edit') || Route::is('module.instructor.show') || Route::is('instructor.experience') || Route::is('instructor.experience.edit')|| Route::is('instructor.activity') || Route::is('instructor.education.edit') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Users
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('module.admin.index') }}"
                                                class="nav-link {{ Route::is('module.admin.index') || Route::is('module.admin.create') || Route::is('module.admin.edit') || Route::is('module.admin.show') ? 'active' : '' }}">
                                                <i class="fas fa-circle" style="font-size: 12px; line-height: 12px; text-align: center;"></i>
                                                <p>Admins</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('module.instructor.index') }}"
                                                class="nav-link {{ Route::is('module.instructor.index') || Route::is('module.instructor.create') || Route::is('module.instructor.edit') || Route::is('module.instructor.show') || Route::is('instructor.experience') || Route::is('instructor.experience.edit')|| Route::is('instructor.activity') || Route::is('instructor.education.edit') ? 'active' : '' }}">
                                                <i class="fas fa-circle" style="font-size: 12px; line-height: 12px; text-align: center;"></i>
                                                <p>Instructors</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('module.student.index') }}"
                                                class="nav-link {{ Route::is('module.student.index') || Route::is('module.student.create') || Route::is('module.student.edit') || Route::is('module.student.show') ? 'active' : '' }}">
                                                <i class="fas fa-circle" style="font-size: 12px; line-height: 12px; text-align: center;"></i>
                                                <p>Students</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (Module::collections()->has('Order'))
                                <x-sidebar-list
                                    :linkActive="Route::is('course.purchases.history') || Route::is('course.order.details') ? true : false"
                                    route="course.purchases.history" icon="fas fa-credit-card">
                                    Order History
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Category'))
                                <x-sidebar-list
                                    :linkActive="Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') ? true : false"
                                    route="module.category.index" icon="fas fa-tags">
                                    Category
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Course'))
                                <x-sidebar-list
                                    :linkActive="Route::is('module.course.index') || Route::is('module.course.create') || Route::is('module.course.edit') || Route::is('module.course.show') || Route::is('course.syllabus') || Route::is('course.chapter.edit') || Route::is('chapter.lesson.edit') || Route::is('course.lesson') || Route::is('course.lesson.edit') ? true : false"
                                    route="module.course.index" icon="fas fa-play">
                                    Course
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Course'))
                                <x-sidebar-list
                                    :linkActive="Route::is('module.course.enroll.index') || Route::is('module.course.enroll.create') || Route::is('module.course.enroll.details') ? true : false"
                                    route="module.course.enroll.index" icon="fas fa-check-square">
                                    Enroll Courses
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Coupon'))
                                <x-sidebar-list
                                    :linkActive="Route::is('coupon.index') || Route::is('coupon.create') || Route::is('coupon.edit') ? true : false"
                                    route="coupon.index" icon="fas fa-percent">
                                    Coupon
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Event'))
                                <x-sidebar-list
                                    :linkActive="Route::is('module.event.index') || Route::is('module.event.create') || Route::is('module.event.show') || Route::is('module.event.edit') ? true : false"
                                    route="module.event.index" icon="fas fa-calendar-alt">
                                    Event
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Subscription'))
                                <x-sidebar-list :linkActive="Route::is('module.email.index') ? true : false"
                                    route="module.email.index" icon="fas fa-bell">
                                    Subscriptions
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Testimonial'))
                                <x-sidebar-list :linkActive="Route::is('module.testimonial.index') || Route::is('module.testimonial.create') || Route::is('module.testimonial.edit') ? true : false"
                                    route="module.testimonial.index" icon="far fa-comment-alt">
                                    Testimonials
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Faq'))
                                <x-sidebar-list :linkActive="Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                                    route="module.faq.index" icon="fas fa-question">
                                    Faq
                                </x-sidebar-list>
                            @endif
                            @if (Module::collections()->has('Contact'))
                                <x-sidebar-list
                                    :linkActive="Route::is('module.contact.index') || Route::is('module.contact.show') ? true : false"
                                    route="module.contact.index" icon="fas fa-envelope">
                                    Contacts
                                </x-sidebar-list>
                            @endif
                            <li
                                class="nav-item {{ Route::is('admin.payments') || Route::is('website.setting.index') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Route::is('website.setting.index') || Route::is('admin.payments') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Settings
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('website.setting.index') }}"
                                            class="nav-link {{ Route::is('website.setting.index') ? 'active' : '' }}">
                                            <i class="fas fa-circle" style="font-size: 12px; line-height: 12px; text-align: center;"></i>
                                            <p>Website Settings</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.payments') }}"
                                            class="nav-link {{ Route::is('admin.payments') ? 'active' : '' }}">
                                            <i class="fas fa-circle" style="font-size: 12px; line-height: 12px; text-align: center;"></i>
                                            <p>Payment Settings</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <x-sidebar-list :linkActive="Route::is('themes') ? true : false" route="themes"
                                icon="fas fa-exchange-alt">
                                Themes
                            </x-sidebar-list>
                        @endauth
                        @auth('instructor')
                            <x-sidebar-list :linkActive="Route::is('instructor.dashboard') ? true : false"
                                route="instructor.dashboard" icon="fas fa-tachometer-alt">
                                Dashboard
                            </x-sidebar-list>

                            {{-- <x-sidebar-list
                                :linkActive="Route::is('instructor.purchase') || Route::is('instructor.purchase.details') ? true : false"
                                route="instructor.purchase" icon="fas fa-credit-card">
                                Order History
                            </x-sidebar-list> --}}

                            <x-sidebar-list :linkActive="Route::is('instructor.course.create') ? true : false"
                                route="instructor.course.create" icon="fas fa-graduation-cap">
                                Create New Course
                            </x-sidebar-list>

                            <x-sidebar-list
                                :linkActive="Route::is('instructor.courses') || Route::is('instructor.course.show') || Route::is('instructor.course.edit') || Route::is('instructor.course.syllabus') || Route::is('instructor.course.chapter.edit') || Route::is('instructor.chapter.lesson.edit') ? true : false"
                                route="instructor.courses" icon="fas fa-play">
                                My Courses
                            </x-sidebar-list>

                            <x-sidebar-list
                                :linkActive="Route::is('instructor.course.enroll') || Route::is('instructor.course.enroll.index') ? true : false"
                                route="instructor.course.enroll.index" icon="fas fa-check-square">
                                Enrolls
                            </x-sidebar-list>

                            <x-sidebar-list :linkActive="Route::is('instructor.course.reviews') ? true : false"
                                route="instructor.course.reviews" icon="fas fa-star">
                                My Reviews
                            </x-sidebar-list>
                            <!-- Chat -->
                            @if (Module::collections()->has('Chat'))
                                <x-sidebar-list :linkActive="Route::is('module.chat.index') ? true : false"
                                    route="module.chat.index" icon="fa fa-comment-dots">
                                    Chat
                                </x-sidebar-list>
                            @endif

                        @endauth

                        <hr>
                        <li class="nav-item">
                            <a target="_blank" href="{{ route('index') }}" class="nav-link bg-primary text-light">
                                <i class="nav-icon fas fa-link"></i>
                                <p>Visit Website</p>
                            </a>
                        </li>



                        {{-- @if (Module::collections()->has('Review'))
                            <li class="nav-item">
                                <a href="{{ route('review.index') }}" class="nav-link {{ Route::is('review.index') || Route::is('review.create') || Route::is('review.edit')  ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Review</p>
                                </a>
                            </li>
                        @endif
                        @if (Module::collections()->has('Setting'))
                            <li class="nav-item">
                                <a href="{{ route('module.setting.index') }}" class="nav-link {{ Route::is('module.setting.index') ||  Route::is('module.setting.create') ||  Route::is('module.setting.edit') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                        @endif --}}
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumbs')
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="http://zakirsoft.com">zakirsoft.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>
    </div>

    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('backend') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- toastr notification -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'Success!')
        @elseif(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}", 'Warning!')
        @elseif(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", 'Error!')
        @endif
        // toast config
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "hideMethod": "fadeOut"
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('script')
</body>

</html>
