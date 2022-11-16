@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            You're an administrator!
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span style="background: #8c7ae6; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Admins</span>
                    <span class="info-box-number">{{ $admins }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #1289A7; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-user-graduate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Students</span>
                    <span class="info-box-number">{{ $students }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #12CBC4; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-chalkboard-teacher"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Instructors</span>
                    <span class="info-box-number">{{ $instructors }}</span>
                </div>
            </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #f1c40f; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Reviews</span>
                    <span class="info-box-number">{{ $reviews }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #0abde3; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-gifts"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Active Coupons</span>
                    <span class="info-box-number">{{ $coupons }}</span>
                </div>
            </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #a29bfe; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-check-square"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Enrolled</span>
                    <span class="info-box-number">{{ $enrolls }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #4b4b4b; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Events</span>
                    <span class="info-box-number">
                        {{ $events_count }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #EA2027; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-play"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Courses</span>
                    <span class="info-box-number">
                        {{ $courses }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Monthly Enrolled Student</h4>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header ml-3 mt-3">
                    <h3>Best Rated Course</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Course Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($best_rated_courses as $best_rated_course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $best_rated_course->course->title }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nothing Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-6">
            <div class="card" style="height:580px">
                <h4 class="ml-3 mt-3">Chart Title</h4>
                <div class="card-body" style="margin-top: 100px; margin-left: 100px; ">
                    <div id="pieChart"></div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header ml-3 mt-3">
                    <h3>Top Instructors</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Instructor Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($best_rated_courses->take(5) as $best_rated_course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $best_rated_course->course->instructor->firstname . ' ' . $best_rated_course->course->instructor->lastname }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nothing Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Recent Courses</h4>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Course Title</th>
                                <th>Instructor Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recent_courses as $recent_course)
                                <tr>
                                    <td width="5%">{{ $loop->iteration }}</td>
                                    <td width="55%"><a
                                            href="{{ route('module.course.show', $recent_course->id) }}">{{ $recent_course->title }}</a>
                                    </td>
                                    <td width="40%"><a
                                            href="{{ route('module.instructor.show', $recent_course->instructor->id) }}">{{ $recent_course->instructor->firstname . ' ' . $recent_course->instructor->lastname }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nothing Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Recent Enrolls</h4>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student Name</th>
                                <th>Course Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recent_enrolls as $recent_enroll)
                                <tr>
                                    <td width="5%">{{ $loop->iteration }}</td>
                                    <td width="55%"><a
                                            href="{{ route('module.student.show', $recent_enroll->student->id) }}">{{ $recent_enroll->student->firstname . ' ' . $recent_enroll->student->lastname }}</a>
                                    </td>
                                    <td width="40%"><a
                                            href="{{ route('module.course.show', $recent_enroll->course->id) }}">{{ $recent_enroll->course->title }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nothing Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Latest Events</h4>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latest_events as $latest_event)
                                <tr>
                                    <td width="5%">{{ $loop->iteration }}</td>
                                    <td width="40%">{{ $latest_event->title }}</td>
                                    <td width="10%">
                                        <a class="btn btn-primary"
                                            href="{{ route('module.event.show', $latest_event->id) }}"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nothing Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        #chart {
            max-width: 650px;
            margin: 35px auto;
        }

    </style>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // column chart
        var options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'enrolls',
                data: {{ json_encode($datas) }}
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // pie chart
        var options = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#pieChart"), options);
        chart.render();
    </script>
@endsection
