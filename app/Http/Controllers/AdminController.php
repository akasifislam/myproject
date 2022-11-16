<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CourseEnroll;
use App\Models\Instructor;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Post;
use Modules\Comment\Entities\Comment;
use Modules\Coupon\Entities\Coupon;
use Modules\Course\Entities\Course;
use Modules\Event\Entities\Event;
use Modules\Order\Entities\Order;
use Modules\Review\Entities\Review;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // bar chart
        $enrolled_students = CourseEnroll::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $enrolled_months = CourseEnroll::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($enrolled_months as $index => $month) {
            $datas[$month - 1] = $enrolled_students[$index];
        }

        // return $datas;

        $course = Course::where('status', true)->with('instructor');
        $courses = $course->count();
        $recent_courses = $course->take(5)->latest()->get();

        // pie chart
        // $top_purchased_courses = $course->where('course_type', 'paid')->latest('total_purchase')->take(5)->pluck('title');
        // $top_purchased_courses = json_decode($top_purchased_courses);
        // gettype($top_purchased_courses);
        // return $top_enroll_courses = $course->latest('total_purchase')->take(5)->get('title');

        $course_enroll = CourseEnroll::with('student', 'course')->latest()->get();
        $recent_enrolls = $course_enroll->take(5);
        $enrolls = $course_enroll->count();

        $all_reviews = Review::with('instructor', 'course.instructor')->latest()->get();
        $reviews = $all_reviews->count();
        $best_rated_courses = $all_reviews->where('stars', 5)->take(5);

        $students = User::count();
        $instructors = Instructor::where('status', true)->count();
        $admins = Admin::count();
        $coupons = Coupon::where('status', true)->count();
        $events = Event::select('id', 'title', 'date')->latest()->get();
        $events_count = $events->count();
        $latest_events = $events->take(5);
        $orders = Order::where('status', 'pending')->count();

        return view('backend.index', compact('students', 'instructors', 'admins', 'reviews', 'courses', 'coupons', 'enrolls', 'events_count', 'latest_events', 'orders', 'recent_courses', 'recent_enrolls', 'best_rated_courses', 'datas'));
    }
}
