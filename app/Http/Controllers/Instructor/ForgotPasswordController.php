<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function instructorResetPasswordForm()
    {
        return view('instructor.password.reset');
    }

    public function broker()
    {
        return Password::broker('instructors');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:instructors,email']);
    }
}
