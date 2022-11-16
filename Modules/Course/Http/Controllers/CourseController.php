<?php

namespace Modules\Course\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Instructor;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use App\Actions\Course\CreateCourse;
use App\Actions\Course\DeleteCourse;
use App\Actions\Course\UpdateCourse;
use App\Exports\EnrollExport;
use App\Exports\CourseExport;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Renderable;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Course\Http\Requests\CourseFormRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $courses = Course::with('category', 'instructor')->latest()->get();
        return view('course::index', compact('courses'));
    }

    public function exportIntoCourseExcel()
    {
        return Excel::download(new CourseExport, 'course_list_' . date('d_m_Y') . '.xlsx');
    }
    public function exportIntoCourseCsv()
    {
        return Excel::download(new CourseExport, 'course_list_' . date('d_m_Y') . '.csv');
    }


    public function getAllCourses()
    {
        $courses = Course::all();
        return view('course::pdfcourse', compact('courses'));
    }

    public function coursePdf()
    {
        $courses = Course::all();
        $pdf = PDF::loadView('course::pdfcourse', compact('courses'));
        return $pdf->download('course_info_' . date('d_m_Y') . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = $this->allCategories();
        $instructors = Instructor::select('id', 'firstname', 'lastname', 'slug', 'status')->whereStatus(true)->get();

        return view('course::create', compact('categories', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CourseFormRequest $request)
    {
        try {
            CreateCourse::create($request);
            flashSuccess('Course Added Successfully');
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
    public function show(Course $course)
    {
        return view('course::show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Course $course)
    {
        $categories = $this->allCategories();
        $instructors = Instructor::select('id', 'firstname', 'lastname', 'slug', 'status')->whereStatus(true)->get();

        return view('course::edit', compact('course', 'categories', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'video_url' => 'url',
        ]);
        try {
            UpdateCourse::update($request, $course);
            flashSuccess('Course Updated Successfully');
            return back();
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
    public function destroy(Course $course)
    {
        DeleteCourse::delete($course);
        try {
            flashSuccess('Course Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function statusChange(Request $request)
    {
        try {
            Course::findOrFail($request->id)->update(['status' => $request->status]);

            if ($request->status == 1) {
                return response()->json(['message' => 'Course Activated Successfully']);
            } else {
                return response()->json(['message' => 'Course Inactivated Successfully']);
            }
        } catch (\Exception $e) {
            return responseError();
        }
    }

    public function enrollCourses()
    {
        // dd('sdmfbsdjhkg');
        $courseEnrolles = CourseEnroll::with('course', 'student')->get();
        return view('course::enroll.index', compact('courseEnrolles'));
    }




    public function getAllenrolls()
    {
        // dd('sdfgjkbdg');
        $courseEnrolles = CourseEnroll::all();
        return view('course::enroll.pdfenrolle', compact('courseEnrolles'));
    }


    public function enrollPdf()
    {
        $courseEnrolles = CourseEnroll::with('course:id,title,course_type', 'student:id,firstname,lastname,email')->get();
        $pdf = PDF::loadView('course::enroll.pdfenrolle', compact('courseEnrolles'));
        return $pdf->download('student_enroll_' . date('d_m_Y') . '.pdf');
    }

    public function exportIntoEnrolExcel()
    {
        return Excel::download(new EnrollExport, 'courseenrolllist.xlsx');
    }
    public function exportIntoEnrolCsv()
    {
        return Excel::download(new EnrollExport, 'courseenrolllist.csv');
    }


















    public function enrollType($type)
    {
        return $type;
        // return $courseEnrolles = CourseEnroll::with('course', 'student')->get();
        // return view('course::enroll.index', compact('courseEnrolles'));
    }

    public function enrollDetails(CourseEnroll $enroll)
    {
        // return $enroll;
        // return $enroll->student;
        // return $enroll->course->instructor;
        return view('course::enroll.details', compact('enroll'));
    }

    public function enrollCreate()
    {
        $students = User::latest()->get();
        $courses = Course::latest()->get();
        return view('course::enroll.create', compact('students', 'courses'));
    }

    public function enrollCourseDelete(CourseEnroll $enroll)
    {
        $enroll->delete();
        flashSuccess('Enroll Course Deleted Successfully');
        return back();
    }

    public function allCategories()
    {
        return Category::latest()->get();
    }

    public function pdf(Course $course)
    {
        $pdf = PDF::loadView('pdf', compact('course'));

        // download PDF file with download method
        return $pdf->download('course_details_' . date('d_m_Y') . '.pdf');
    }
}
