<?php

namespace Modules\Instructor\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Review\Entities\Review;
use Modules\Category\Entities\Category;
use App\Actions\Instructor\CreateInstructor;
use App\Actions\Instructor\DeleteInstructor;
use App\Actions\Instructor\UpdateInstructor;
use App\Exports\CourseExport;
use App\Models\CourseEnroll;
use App\Exports\InstructorExport;
use App\Models\User;
use PDF;
use App\Exports\MyCourseExport;
use Illuminate\Contracts\Support\Renderable;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Instructor\Http\Requests\InstructorFormRequest;
use Modules\Order\Entities\Order;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $instructors = Instructor::latest()->get();
        return view('instructor::index', compact('instructors'));
    }

    public function instructorPdf()
    {
        $instructors = Instructor::all();
        $pdf = PDF::loadView('instructor::pdfinstructor', compact('instructors'));
        return $pdf->download('instructor_info_' . date('d_m_Y') . '.pdf');
    }

    public function mycoursePdf()
    {
        $courses = Course::where('instructor_id', auth('instructor')->id())->get();
        $pdf = PDF::loadView('course::pdfcourse', compact('courses'));
        return $pdf->download('course_info_' . date('d_m_Y') . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('instructor::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(InstructorFormRequest $request)
    {
        try {
            CreateInstructor::create($request);
            flashSuccess('Instructor Added Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Instructor $instructor)
    {
        return view('instructor::show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Instructor $instructor)
    {
        return view('instructor::edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(InstructorFormRequest $request, Instructor $instructor)
    {
        try {
            UpdateInstructor::update($request, $instructor);
            flashSuccess('Instructor Updated Successfully');
            return redirect()->route('module.instructor.index');
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Instructor $instructor)
    {
        try {
            DeleteInstructor::delete($instructor);
            flashSuccess('Instructor Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function instructorCourses()
    {
        // dd('dfjhkbgfjh');
        $courses = Course::with('category', 'instructor')->where('instructor_id', auth()->user()->id)->latest()->get();
        return view('instructor::course.mycourses', compact('courses'));
    }

    public function exportIntoMyCourseExcel()
    {
        return Excel::download(new CourseExport, 'my_course_list_' . date('d_m_Y') . '.xlsx');
    }
    public function exportIntoMyCourseCsv()
    {
        return Excel::download(new CourseExport, 'my_course_list_' . date('d_m_Y') . '.csv');
    }

    public function getAllCourses()
    {
        $courses = Course::all();
        return view('instructor::course.pdfcourses', compact('courses'));
    }

    public function downloadPdf()
    {
        $courses = Course::all();
        $pdf = PDF::loadView('instructor::course.pdfcourses', compact('courses'));
        return $pdf->download('course_info_' . date('d_m_Y') . '.pdf');
    }


    public function downloadExcel()
    {
        return Excel::downlaod(new CourseExport, 'excelfiledownload.xlsx');
    }

    public function downloadCSV()
    {
        return Excel::downlaod(new CourseExport, 'csvfiledownload.csv');
    }

    public function instructorCourseCreate()
    {
        $categories = $this->allCategories();
        return view('instructor::course.courseCreate', compact('categories'));
    }

    public function instructorCourseEdit(Course $course)
    {
        $categories = $this->allCategories();
        $instructors = Instructor::select('id', 'firstname', 'lastname', 'slug', 'status')->whereStatus(true)->get();
        return view('instructor::course.courseEdit', compact('course', 'categories', 'instructors'));
    }

    public function allCategories()
    {
        return Category::latest()->get();
    }

    public function loadMoreData(Request $request)
    {
        return Review::with('student_reviews')->where('instructor_id', $request->instructor_id)->latest()->paginate(5);
    }

    public function showEnrollForm()
    {
        $students = User::latest()->get();
        $courses = Course::where('instructor_id', auth()->user()->id)->get();
        return view('instructor::course.enroll', compact('students', 'courses'));
    }

    public function reviews()
    {
        $reviews = Review::with('student_reviews', 'course', 'instructor')->where('instructor_id', auth()->user()->id)->get();
        return view('instructor.reviews', compact('reviews'));
    }

    public function enrolIndex()
    {
        $allEnrolls = CourseEnroll::with('course', 'course.instructor', 'student')->get();
        $courseEnrolles = $allEnrolls->where('course.instructor.id', auth()->user()->id);
        return view('instructor::course.all-enrolls', compact('courseEnrolles'));
    }

    public function exportIntoExcel()
    {
        return Excel::download(new InstructorExport, 'instructorlist.xlsx');
    }
    public function exportIntoCsv()
    {
        return Excel::download(new InstructorExport, 'instructorlist.csv');
    }

    public function coursePurchase()
    {
        return Order::with('user')->get();
        return view('instructor::order.index');
    }

    public function purchaseDetails()
    {
        return view('instructor::order.details');
    }
}
