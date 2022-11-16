<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {

        // Validation
        $this->validate($request, [
            'firstname' => "required",
            'lastname' => "required",
            'email' => "required|unique:users,email",
            'password' => "required|min:8|confirmed",
            'password_confirmation' => "required",
        ]);

        try {
            $created = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'slug' => Str::slug($request->firstname . $request->lastname),
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if ($created) {
                flashSuccess('Registration Successful');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function studentLogout()
    {
        auth()->guard('web')->logout();

        return  redirect()->route('login');
    }
}
