<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function adminResetPasswordForm()
    {
        return view('admin.password.reset');
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:admins,email']);
    }
}
