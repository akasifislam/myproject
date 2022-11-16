<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Instructor\Entities\InstructorEducation;
use Modules\Instructor\Entities\InstructorExperience;

class ProfileController extends Controller
{
    public function authCheck()
    {
        $admin = Auth::guard('admin');
        $instructor = Auth::guard('instructor');

        if ($admin->check()) {
            $user = $admin->user();
            $role = 'admin';
        } elseif ($instructor->check()) {
            $user = $instructor->user();
            $role = 'instructor';
        } else {
            $user = Auth::user();
            $role = 'student';
        }

        return [
            $user,
            $role
        ];
    }

    public function profile()
    {
        $auth = $this->authCheck();
        $user = $auth[0];
        $role = $auth[1];

        return view('backend.profile.index', compact('user', 'role'));
    }

    public function setting()
    {
        $auth = $this->authCheck();
        $user = $auth[0];
        $role = $auth[1];

        $editMode = null;
        $education = null;
        $experiencEditMode = null;
        $educations = InstructorEducation::where('instructor_id', auth('instructor')->id())->oldest('order')->get();
        $experiences = InstructorExperience::where('instructor_id',  auth('instructor')->id())->oldest('order')->get();
        return view('backend.profile.setting', compact('user', 'role', 'educations', 'editMode', 'education', 'experiences', 'experiencEditMode'));
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $auth = $this->authCheck();
        $role = $auth[1];

        if ($role == 'admin') {

            $admin = Admin::find($request->admin_id);
            $admin->firstname = $request->firstname;
            $admin->lastname = $request->lastname;
            $admin->slug = Str::slug($request->firstname . '-' . $request->lastname);
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->about = $request->about;
            $admin->address = $request->address;
            if ($request->has('image')) {

                if (file_exists($admin->image) && $admin->image != 'backend/image/default.png') {
                    unlink(($admin->image));
                }

                $image = $request->image;
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/admin', $image, $fileName);
                $db_image = 'storage/admin/' . $fileName;
                $admin->image = $db_image;
            }
            $admin->save();

            session()->flash('success', 'Profile Updated Successfully!');
            return back();
        } elseif ($role == 'instructor') {

            $instructor = Instructor::find($request->instructor_id);

            $instructor->firstname = $request->firstname;
            $instructor->lastname = $request->lastname;
            $instructor->slug = Str::slug($request->firstname . '-' . $request->lastname);
            $instructor->email = $request->email;
            $instructor->phone = $request->phone;
            $instructor->profession = $request->profession;
            $instructor->about = $request->about;
            $instructor->address = $request->address;
            $instructor->gender = $request->gender;
            $instructor->instagram_link = $request->instagram_link;
            $instructor->fb_link = $request->fb_link;
            $instructor->twitter_link = $request->twitter_link;
            $instructor->youtube_link = $request->youtube_link;
            $instructor->linkedin_link = $request->linkedin_link;

            if ($request->has('image')) {

                if (file_exists($instructor->image) && $instructor->image != 'backend/image/default.png') {
                    unlink(($instructor->image));
                }

                $image = $request->image;
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/instructor', $image, $fileName);
                $db_image = 'storage/instructor/' . $fileName;
                $instructor->image = $db_image;
            }
            $instructor->save();

            session()->flash('success', 'Profile Updated Successfully!');
            return back();
        }
    }

    public function profile_password_update(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
            $auth = $this->authCheck();
            $user = $auth[0];
            $role = $auth[1];

            $password_check = Hash::check($request->current_password, $user->password);
            if ($password_check) {
                if ($role == 'admin') {
                    $user = Admin::findOrFail($id);
                } elseif ($role == 'instructor') {
                    $user = Instructor::findOrFail($id);
                }

                $user->update([
                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                session()->flash('error', "Current password is wrong!");
                return back();
            }

            session()->flash('success', 'Profile Updated Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
