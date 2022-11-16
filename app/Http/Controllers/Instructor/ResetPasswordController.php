<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::INSTRUCTOR;

    public function showResetForm(Request $request, $token = null)
    {
        if (!$request->email) {
            abort(404);
        }
        return view('instructor.password.confirm')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('instructors');
    }

    protected function guard()
    {
        return Auth::guard('instructor');
    }
}
