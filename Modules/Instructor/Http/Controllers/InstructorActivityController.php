<?php

namespace Modules\Instructor\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Instructor\Entities\InstructorEducation;
use App\Actions\Instructor\Education\CreateEducation;
use App\Actions\Instructor\Education\DeleteEducation;
use App\Actions\Instructor\Education\UpdateEducation;
use Modules\Instructor\Entities\InstructorExperience;
use App\Actions\Instructor\Education\SortingEducation;
use App\Actions\Instructor\Experience\CreateExperience;
use App\Actions\Instructor\Experience\DeleteExperience;
use App\Actions\Instructor\Experience\UpdateExperience;
use App\Actions\Instructor\Experience\SortingExperience;
use Modules\Instructor\Http\Requests\InstructorEducationFormRequest;
use Modules\Instructor\Http\Requests\InstructorExperienceFormRequest;

class InstructorActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function activityIndex(Instructor $instructor, $education = null, $editMode = false)
    {
        $educations = InstructorEducation::where('instructor_id', $instructor->id)->oldest('order')->get();

        return view('instructor::activityIndex', compact('educations', 'instructor', 'education', 'editMode'));
    }

    public function experience(Instructor $instructor, $experience = null, $experiencEditMode = false)
    {
        $experiences = InstructorExperience::where('instructor_id', $instructor->id)->oldest('order')->get();

        return view('instructor::instructor-experience', compact('instructor', 'experiences', 'experience', 'experiencEditMode'));
    }

    /**
     * Education store
     */
    public function educationStore(InstructorEducationFormRequest $request)
    {

        try {
            CreateEducation::create($request->validated());

            flashSuccess('Education Added Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function educationEdit(InstructorEducation $education)
    {
        return $this->activityIndex($education->instructor, $education, true);
    }

    public function educationUpdate(InstructorEducationFormRequest $request, InstructorEducation $education)
    {
        try {
            UpdateEducation::update($request, $education);

            flashSuccess('Education Updated Successfully');
            return redirect()->route('instructor.activity', $education->instructor_id);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function updateEducationOrder(Request $request)
    {
        try {
            $education = SortingEducation::sort($request);

            if ($education) {
                return response()->json(['message' => 'Education Sorted Successfully!']);
            } else {
                flashError();
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function experienceEdit(InstructorExperience $experience)
    {
        return $this->experience($experience->instructor, $experience, true);
    }

    public function experienceUpdate(InstructorExperienceFormRequest $request, InstructorExperience $experience)
    {
        try {
            UpdateExperience::update($request, $experience);

            flashSuccess('Experience Updated Successfully');
            return redirect()->route('instructor.experience', $experience->instructor_id);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function destroy(InstructorEducation $education)
    {
        try {
            DeleteEducation::delete($education);

            flashSuccess('Education Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }



    /**
     * Experience
     */

    public function experienceStore(InstructorExperienceFormRequest $request)
    {
        try {
            CreateExperience::create($request->validated());

            flashSuccess('Experience Added Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }



    public function destroyExperience(InstructorExperience $experience)
    {
        try {
            DeleteExperience::delete($experience);

            flashSuccess('Experience Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }


    public function updateExperienceOrder(Request $request)
    {

        try {
            $education = SortingExperience::sort($request);

            if ($education) {
                return response()->json(['message' => 'Experience Sorted Successfully!']);
            } else {
                flashError();
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
