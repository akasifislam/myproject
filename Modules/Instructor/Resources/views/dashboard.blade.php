@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            You're an instructor!
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="bg-primary info-box-icon elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <div class="d-flex justify-content-between">
                        <span class="info-box-text">Students</span>
                    </div>


                    <span class="info-box-number">{{ $total_students }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span style="background: #EA2027; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-play"></i></span>

                <div class="info-box-content">
                    <div class="d-flex justify-content-between">
                        <span class="info-box-text">Total Courses</span>
                        <span><a href="{{ route('instructor.courses') }}"><i class="fas fa-arrow-right"></i></a></span>
                    </div>


                    <span class="info-box-number">{{ $total_course }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="bg-success info-box-icon elevation-1"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                    <div class="d-flex justify-content-between">
                        <span class="info-box-text">Active Courses</span>
                        <span><a href="{{ route('instructor.courses') }}"><i class="fas fa-arrow-right"></i></a></span>
                    </div>
                    <span class="info-box-number">{{ $active_courses }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #e9b407; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Star</span>
                    <span class="info-box-number">{{ $avg_star }}({{ $total_reviews }})</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="bg-info info-box-icon elevation-1"><i class="fas fa-user-graduate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Enrolled</span>
                    <span class="info-box-number">{{ $total_enrolls }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="bg-dark info-box-icon elevation-1"><i class="fas fa-user-graduate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Today Enrolled</span>
                    <span class="info-box-number">{{ $today_enrolls }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span style="background: #8e44ad; color: #fff" class="info-box-icon elevation-1"><i
                        class="fas fa-user-graduate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">This Month Enrolled</span>
                    <span class="info-box-number">{{ $thismonth_enrolls }}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Monthly Enrolled Student</h4>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="height:580px">
                <h4 class="ml-3 mt-3">Instructor</h4>
                <div class="card-body" style="margin-top: 100px; margin-left: 100px; ">
                    <div id="pieChart"></div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Best Courses</h4>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Course Title</th>
                                <th>Star</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($best_courses as $course)
                                <tr>
                                    <td width="5%">{{ $loop->iteration }}</td>
                                    <td width="55%">{{ $course->title }}</td>

                                    @if ($course->total_stars && $course->total_ratings)
                                        <td width="40%">
                                            @for ($i = 0; $i < avgStar($course->total_stars, $course->total_ratings); $i++)
                                                @include('frontend.partials.star')
                                            @endfor
                                        </td>
                                    @else
                                        <td width="40%"><i class="far fa-star"></i></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h4 class="ml-3 mt-3">Recent Enrolls</h4>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Course Title</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recent_enrolls as $recent_enroll)
                                <tr>
                                    <td width="5%">{{ $loop->iteration }}</td>
                                    <td width="55%">
                                        {{ $recent_enroll->course->title }}
                                    </td>
                                    <td width="40%">
                                        @if ($recent_enroll->course->discount_price)
                                            <span>${{ $recent_enroll->course->discount_price }}</span>
                                        @else
                                            <span>${{ $recent_enroll->course->price }}</span>
                                        @endif
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

{{-- @section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // pie chart
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
            series: [44, 55, 13, 43],
            chart: {
                width: 420,
                type: 'pie',
            },
            labels: ['Enroll Student', 'Courses', 'Active Coupons', 'Active Coupons'],
            responsive: [{
                breakpoint: 420,
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
@endsection --}}
