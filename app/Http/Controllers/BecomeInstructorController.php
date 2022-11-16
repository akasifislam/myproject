<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BecomeInstructorController extends Controller
{
    public function index()
    {
        return view('frontend.becomeinstructor');
    }

    public function register()
    {
        return view('frontend.instructor-form');
    }

    public function store(Request $request)
    {


        // Validation
        $this->validate($request, [
            'firstname' => "required",
            'lastname' => "required",
            'email' => "required|unique:instructors,email",
            'password' => "required|min:8|confirmed",
            'password_confirmation' => "required",
            'privacy' => ['required']
        ]);

        try {
            $created = Instructor::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'slug' => Str::slug($request->firstname . $request->lastname),
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if ($created) {
                auth()->logout();
                return  redirect()->route('instructor.login');
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
