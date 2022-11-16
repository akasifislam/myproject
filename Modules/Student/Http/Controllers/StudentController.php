<?php

namespace Modules\Student\Http\Controllers;

use App\Actions\Student\CreateStudent;
use App\Actions\Student\DeleteStudent;
use App\Actions\Student\UpdateStudent;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Student\Http\Requests\StudentFormRequest;
use PDF;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function showstudent()
    {
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $students = User::latest()->get();
        return view('student::index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StudentFormRequest $request)
    {

        //return   $request->all();
        try {
            $student = CreateStudent::create($request);

            if ($student) {
                flashSuccess('Student Added Successfully');
                return back();
            }
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
    public function show(User $student)
    {
        return view('student::show', compact('student'));
    }

    public function getAllStudents()
    {
        // dd('sdfgjkbdg');
        $students = User::all();
        return view('student::pdfstudent', compact('students'));
    }

    public function downloadPdf()
    {
        $students = User::all();
        $pdf = PDF::loadView('student::pdfstudent', compact('students'));
        return $pdf->download("student_list_" . date('d_m_Y') . ".pdf");
    }

    public function exportIntoExcel()
    {
        return Excel::download(new StudentExport, "student_list_" . date('d_m_Y') . ".xlsx");
    }
    public function exportIntoCsv()
    {
        return Excel::download(new StudentExport, "student_list_" . date('d_m_Y') . ".csv");
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $student)
    {
        return view('student::edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(StudentFormRequest $request, User $student)
    {
        try {
            $student = UpdateStudent::update($request, $student);

            if ($student) {
                flashSuccess('Student Updated Successfully');
                return redirect()->route('module.student.index');
            }
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
    public function destroy(User $student)
    {
        try {
            $student = DeleteStudent::delete($student);

            if ($student) {
                flashSuccess('Student Deleted Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
