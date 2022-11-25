<?php

namespace App\Http\Controllers;

use App\Models\CourseEnroll;
use App\Models\EventComment;
use App\Models\Instructor;
use App\Models\WebsiteSettings;
use App\Traits\CourseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;
use Modules\Course\Entities\Course;
use Modules\Event\Entities\Event;
use Modules\Faq\Entities\Faq;
use Modules\Order\Entities\Order;
use Modules\Review\Entities\Review;
use Modules\Testimonial\Entities\Testimonial;

class PagesController extends Controller
{
    use CourseTraits;

    public function index()
    {
        $events = Event::latest()->get()->take(10);
        $testimonials = Testimonial::get()->take(5);
        $allcategories = Category::oldest('order')->get(['id', 'name', 'slug']);
        $categories = Category::with('course')->get()->take(4);
        $instructors = Instructor::whereStatus(true)->latest('total_stars')->get()->take(10);
        $popularCourses = Course::with('category', 'instructor', 'reviews')->withCount('reviews as total_ratings', 'enroll', 'lesson')->withSum('reviews:stars as total_stars')->latest('total_views')->take(12)->get('id', 'category_id', 'instructor_id', 'title', 'slug', 'thumbnail', 'price', 'discount_price', 'duration', 'course_type', 'status');
        $topCategories = Category::with(['course' => function ($query) {
            return $query->where('status', true)->withCount('reviews as total_ratings', 'enroll', 'lesson')->withSum('reviews:stars as total_stars')->with('instructor:id,firstname,lastname,image,slug');
        }])
            ->withCount('course')->latest('course_count')->take(5)->get();
        $bestInstructor = Instructor::whereStatus(true)->latest('total_stars')->first();

        return view('frontend.index', compact('allcategories', 'categories', 'popularCourses', 'instructors', 'topCategories', 'testimonials', 'events'));
    }

    public function course(Request $request)
    {
        $activeCourses = Course::whereStatus(true)->with('category', 'reviews', 'instructor')->withCount('reviews as total_ratings', 'enroll', 'lesson')->withSum('reviews:stars as total_stars');
        $categories = Category::select('id', 'name', 'order', 'slug')->withCount(['course' => function ($q) {
            $q->whereStatus(true);
        }])->oldest('order')->get();

        // course levels count
        $allcourse = Course::whereStatus(true)->get(['level', 'duration']);
        $courseLevels = $this->levelCourseCounts($allcourse);
        $totalCourseCount = count($allcourse);

        // course levels count
        $durations = $this->durationCourseCounts($allcourse);

        // data sorting and filtering
        $activeCourses = $activeCourses->when($request->search, function ($datasorting) use ($request) {
            return $datasorting->Where('title', 'Like', '%' . $request->query('search') . '%')
                ->orWhere('price', 'Like', '%' . $request->query('search') . '%');
        })->when($request->query('category'), function ($datasorting) use ($request) {
            $category = Category::select('id', 'slug')->whereSlug($request->query('category'))->first();
            return $datasorting->Where('category_id', $category->id)->latest();
        })->when($request->sorting, function ($datasorting) use ($request) {
            switch ($request->sorting) {
                case 'trending':
                    $datasorting->latest('total_views');
                    break;
                case 'purchased':
                    $datasorting->latest('total_purchase');
                    break;
                case 'latest':
                    $datasorting->latest();
                    break;
                case 'free':
                    $datasorting->where('course_type', 'Free')->latest();
                    break;
                case 'low_to_high':
                    $datasorting->where('course_type', '!=', 'Free')->oldest('price');
                    break;
                case 'high_to_low':
                    $datasorting->where('course_type', '!=', 'Free')->latest('price');
                    break;
                default:
                    $datasorting;
            }

            return $datasorting;
        })->when($request->query('level'), function ($datasorting) use ($request) {
            switch ($request->query('level')) {
                case 'Beginner':
                    $datasorting->whereLevel('Beginner');
                    break;
                case 'Intermediate':
                    $datasorting->whereLevel('Intermediate');
                    break;
                case 'Advanced':
                    $datasorting->whereLevel('Advanced');
                    break;
                case 'Expert':
                    $datasorting->whereLevel('Expert');
                    break;
                default:
                    $datasorting;
            }
        })->when($request->query('min') && $request->query('max'), function ($datasorting) use ($request) {
            return $datasorting->where([
                ['price', '>=', $request->query('min')],
                ['price', '<=', $request->query('max')],
                ['course_type', '!=', 'Free'],
            ])->latest();
        })->when($request->query('duration'), function ($datasorting) use ($request) {
            switch ($request->query('duration')) {
                case '2':
                    $datasorting->where('duration', '<=', '2');
                    break;
                case '3':
                    $datasorting->where('duration', '>=', '3')->where('duration', '<=', '4');
                    break;
                case '5':
                    $datasorting->where('duration', '>=', '5');
                    break;
                default:
                    $datasorting;
            }

            return $datasorting;
        });

        if ($request->sorting || $request->category || $request->min || $request->max || $request->duration || $request->star) {
            if ($request->star) {
                $courses = $activeCourses->get()->where('star', $request->star);
            } else {
                $courses = $activeCourses->get();
            }

            $totalCourses = count($courses);
            $dataPaginate = false;
        } else {
            $courses = $activeCourses->paginate(12);
            $totalCourses = $courses->total();
            $dataPaginate = true;
        }

        return view('frontend.course', [
            'courses' =>   $courses,
            'courseLevels' =>   $courseLevels,
            'categories' =>   $categories,
            'durations' =>   $durations,
            'filter_level' => $request->query('level'),
            'filter_rating' => $request->query('star'),
            'filter_duration' => $request->query('duration'),
            'filter_min' => $request->query('min'),
            'filter_max' => $request->query('max'),
            'filter_category' => $request->query('category'),
            'filter_sorting' => $request->query('sorting'),
            'filter_search' => $request->query('search'),
            'totalCourses' => $totalCourses,
            'dataPaginate' => $dataPaginate,
            'totalCourseCount' => $totalCourseCount,
        ]);
    }


    public function event(Request $request)
    {
        $allEvents = Event::all()->count();
        $categories = Category::select('id', 'name', 'order', 'slug')->withCount('event')->oldest('order')->get();
        $activeEvents = Event::with('instructors');

        $activeEvents = $activeEvents->when($request->search, function ($datasorting) use ($request) {  /* Search Box */
            return $datasorting->Where('title', 'Like', '%' . $request->query('search') . '%')
                ->orWhere('price', 'Like', '%' . $request->query('search') . '%');
        })->when($request->category, function ($datasorting) use ($request) {        /* Sidebar: category */
            $category = Category::select('id', 'slug')->whereSlug($request->category)->first();
            return $datasorting->Where('category_id', $category->id)->latest();
        })->when($request->sorting, function ($datasorting) use ($request) {   /* Sorting: select-option */
            switch ($request->sorting) {
                case 'latest':
                    $datasorting->latest();
                    break;
                case 'free':
                    $datasorting->where('event_type', 'Free')->latest();
                    break;
                case 'low_to_high':
                    $datasorting->where('event_type', '!=', 'Free')->oldest('price');
                    break;
                case 'high_to_low':
                    $datasorting->where('event_type', '!=', 'Free')->latest('price');
                    break;
                default:
                    $datasorting;
            }

            return $datasorting;
        });

        if ($request->sorting || $request->category || $request->search) {
            $events = $activeEvents->get();
            $totalEvents = count($events);
            $dataPaginate = false;
        } else {
            $events = $activeEvents->paginate(8);
            $totalEvents = $events->total();
            $dataPaginate = true;
        }


        return view('frontend.event', [
            'events' =>   $events,
            'allEvents' =>   $allEvents,
            'categories' =>   $categories,
            'filterCategory' => $request->query('category'),
            'filter_sorting' => $request->query('sorting'),
            'filter_search' => $request->query('search'),
            'totalEvents' => $totalEvents,
            'dataPaginate' => $dataPaginate,
        ]);
    }


    public function about()
    {
        $instructors = Instructor::whereStatus(true)->latest('total_stars')->get()->take(10);
        return view('frontend.about', compact('instructors'));
    }

    public function eventDetails($slug)
    {
        $officeInfo = WebsiteSettings::first();
        $event = Event::with('speakers')->whereSlug($slug)->firstOrFail();
        $comingEvents = Event::where([['date', '<', now()->addDays(7)], ['slug', '!=', $slug]])->latest()->take(10)->get();
        $totalComments = EventComment::where('event_id', $event->id)->count();

        $comments = EventComment::where('event_id', $event->id)->with('users', 'event')->latest()->get();
        $total = $comments->count();


        // Event View count
        if ($event->id != session('event_id')) {
            session(['event_id' => $event->id]);
            $event->timestamps = false;
            $event->increment('total_views');
        }

        return view('frontend.eventdetails', compact('event', 'comingEvents', 'totalComments', 'officeInfo', 'comments', 'total'));
    }

    public function contact()
    {
        $webInfo = WebsiteSettings::first();
        return view('frontend.contact', compact('webInfo'));
    }

    public function profile()
    {
        $student = Auth::user();
        $enrollCourses = CourseEnroll::with('course.instructor')->whereStudentId(auth()->user()->id)->get();
        $orders = Order::with('orderdetails.course.instructor')->whereUserId(auth()->user()->id)->take(5)->latest()->get();

        return view('frontend.profile', compact('student', 'enrollCourses', 'orders'));
    }

    public function faq()
    {
        $faqs = Faq::latest()->take(5)->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function courseDetails($slug)
    {
        $courseDetails = Course::with(['category', 'lesson', 'instructor', 'reviews', 'chapter' => function ($q) {
            return $q->withCount('lesson');
        }])->withCount('reviews as total_ratings', 'enroll', 'lesson')->withSum('reviews:stars as total_stars')->whereSlug($slug)->first();

        $relatedCourses = Course::with('instructor')->withCount('reviews as total_ratings', 'lesson', 'enroll')
            ->withSum('reviews:stars as total_stars')
            ->whereStatus(true)->whereCategoryId($courseDetails->category_id)->where('id', '!=', $courseDetails->id)->latest()->get();
        $reviews = Review::where('course_id', $courseDetails->id)->latest()->get();
        $instructorTotalCourses = Course::whereStatus(true)->whereInstructorId($courseDetails->instructor_id)->count();

        // Course View count
        if ($courseDetails->id != session('course_id')) {
            session(['course_id' => $courseDetails->id]);
            $courseDetails->timestamps = false;
            $courseDetails->increment('total_views');
        }

        // rating count and percentages
        $totalStars = $courseDetails->total_stars ?? 0;
        $ratings = Review::select('course_id', 'stars')->whereCourseId($courseDetails->id)->get();

        // avg star
        if (count($ratings) && $totalStars) {
            $avgStar = avgStar($totalStars, count($ratings));
        } else {
            $avgStar = 0;
        }

        // single star counting
        $onestarcount = 0;
        $twostarcount = 0;
        $threestarcount = 0;
        $fourstarcount = 0;
        $fivestarcount = 0;

        // stars counting
        foreach ($ratings as $rating) {
            switch ($star = $rating->stars) {
                case '1':
                    $onestarcount = $onestarcount + $star;
                    break;
                case '2':
                    $twostarcount = $twostarcount + $star;
                    break;
                case '3':
                    $threestarcount = $threestarcount + $star;
                    break;
                case '4':
                    $fourstarcount = $fourstarcount + $star;
                    break;
                case '5':
                    $fivestarcount = $fivestarcount + $star;
                    break;
            }
        }

        // all single stars count
        $stars_counts = [
            'fivestar' => $fivestarcount,
            'fourstar' => $fourstarcount,
            'threestar' => $threestarcount,
            'twostar' =>   $twostarcount,
            'onestar' => $onestarcount,
        ];

        // all stars percentage
        $stars_percentages = [
            'fivestar' => 0,
            'fourstar' =>  0,
            'threestar' => 0,
            'twostar' => 0,
            'onestar' => 0,
        ];

        // if totalStars exists then calculate
        if ($totalStars) {
            $stars_percentages['fivestar'] = number_format(($fivestarcount / $totalStars) * 100, 0);
            $stars_percentages['fourstar'] = number_format(($fourstarcount / $totalStars) * 100, 0);
            $stars_percentages['threestar'] = number_format(($threestarcount / $totalStars) * 100, 0);
            $stars_percentages['twostar'] = number_format(($twostarcount / $totalStars) * 100, 0);
            $stars_percentages['onestar'] = number_format(($onestarcount / $totalStars) * 100, 0);
        }

        return view('frontend.coursedetails', [
            'courseDetails' => $courseDetails,
            'relatedCourses' => $relatedCourses,
            'reviews' => $reviews,
            'avgStar' => $avgStar,
            'instructorTotalCourses' => $instructorTotalCourses,
            'starsCounts' => $stars_counts,
            'starsPercentages' => $stars_percentages,
        ]);
    }

    public function instructorProfile($slug)
    {
        $instructor = Instructor::with(['education' => function ($qu) {
            return $qu->oldest('order');
        }, 'experience' => function ($quu) {
            return $quu->oldest('order');
        }, 'course' => function ($q) {
            return $q->with('instructor:id,firstname,lastname,image,slug')->withCount('reviews as total_ratings', 'enroll', 'lesson')->withSum('reviews:stars as total_stars');
        }])->whereSlug($slug)->first();

        $instructorCourses = Course::where('instructor_id', $instructor->id)->latest()->paginate(6);

        // rating count and percentages
        $reviews = Review::where('instructor_id', $instructor->id)->latest()->get();
        $totalStars = $reviews->pluck('stars')->sum() ?? 0;

        // avg star
        if (count($reviews) && $totalStars) {
            $avgStar = avgStar($totalStars, count($reviews));
        } else {
            $avgStar = 0;
        }

        // single star counting
        $onestarcount = 0;
        $twostarcount = 0;
        $threestarcount = 0;
        $fourstarcount = 0;
        $fivestarcount = 0;

        // stars counting
        foreach ($reviews as $rating) {
            switch ($star = $rating->stars) {
                case '1':
                    $onestarcount = $onestarcount + $star;
                    break;
                case '2':
                    $twostarcount = $twostarcount + $star;
                    break;
                case '3':
                    $threestarcount = $threestarcount + $star;
                    break;
                case '4':
                    $fourstarcount = $fourstarcount + $star;
                    break;
                case '5':
                    $fivestarcount = $fivestarcount + $star;
                    break;
            }
        }

        // all single stars count
        $stars_counts = [
            'fivestar' => $fivestarcount,
            'fourstar' => $fourstarcount,
            'threestar' => $threestarcount,
            'twostar' =>   $twostarcount,
            'onestar' => $onestarcount,
        ];

        // all stars percentage
        $stars_percentages = [
            'fivestar' => 0,
            'fourstar' =>  0,
            'threestar' => 0,
            'twostar' => 0,
            'onestar' => 0,
        ];

        // if totalStars exists then calculate
        if ($totalStars) {
            $stars_percentages['fivestar'] = number_format(($fivestarcount / $totalStars) * 100, 0);
            $stars_percentages['fourstar'] = number_format(($fourstarcount / $totalStars) * 100, 0);
            $stars_percentages['threestar'] = number_format(($threestarcount / $totalStars) * 100, 0);
            $stars_percentages['twostar'] = number_format(($twostarcount / $totalStars) * 100, 0);
            $stars_percentages['onestar'] = number_format(($onestarcount / $totalStars) * 100, 0);
        }

        return view('frontend.instructorProfile', [
            'instructor' => $instructor,
            'reviews' => $reviews,
            'avgStar' => $avgStar,
            'starsCounts' => $stars_counts,
            'starsPercentages' => $stars_percentages,
            'instructorCourses' => $instructorCourses,
        ]);
    }

    public function loadMoreData(Request $request)
    {
        return Review::with('student_reviews')->where('course_id', $request->course_id)->latest()->paginate(5);
    }

    // Course Order Details
    public function orderDetails(Order $order)
    {
        $orderInfo = $order->with('orderdetails.course.instructor', 'payment')->first();

        return view('backend.order-details', compact('orderInfo'));
    }
}
