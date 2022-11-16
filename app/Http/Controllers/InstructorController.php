<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CourseEnroll;
use App\Models\Instructor;
use Modules\Course\Entities\Course;
use Modules\Review\Entities\Review;
use Modules\Event\Entities\Event;
use Modules\Order\Entities\Order;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Modules\Blog\Entities\Post;
use Modules\Comment\Entities\Comment;
use Modules\Coupon\Entities\Coupon;
use Modules\Testimonial\Entities\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Entities\OrderDetails;

class InstructorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:instructor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_students = User::count();
        $courses = Course::where('instructor_id', Auth::user()->id);
        $total_course = $courses->count();
        $active_courses = $courses->whereStatus(true)->count();
        $instructor = auth('instructor')->user();
        $reviews = Review::whereInstructorId($instructor->id)->get();
        $total_reviews = count($reviews);
        $total_stars = $reviews->pluck('stars')->sum();


        // $myCourses = $courses->pluck('price');
        // $myCourses->count();



        if ($total_stars && $total_reviews) {
            $avg_star = avgStar($total_stars, $total_reviews);
        } else {
            $avg_star = 0;
        }

        $instructor_enroll_courses = CourseEnroll::whereHas('course', function (Builder $query) use ($instructor) {
            $query->select('id', 'instructor_id')->where('instructor_id', $instructor->id);
        });

        $total_enrolls = $instructor_enroll_courses->count();
        $today_enrolls = $instructor_enroll_courses->whereDay('created_at', '=', date('d'))->count();
        $thismonth_enrolls = $instructor_enroll_courses->whereMonth('created_at', '=', date('m'))->count();
        $recent_enrolls = $instructor_enroll_courses->with('course')->latest()->get();
        $best_courses = $courses->withCount('reviews as total_ratings')->withSum('reviews:stars as total_stars')->latest('total_stars')->get()->take(10);

        // google pie chart
        $datas = array(1, 2, 3, 4, 7, 2, 19, 2, 11, 18, 6, 7);

        return view('instructor::dashboard', compact('total_students', 'total_course', 'active_courses', 'total_reviews', 'avg_star', 'today_enrolls', 'thismonth_enrolls', 'total_enrolls', 'reviews', 'courses', 'recent_enrolls', 'recent_enrolls', 'best_courses', 'datas'));
    }
}
