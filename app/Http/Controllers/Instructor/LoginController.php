<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::INSTRUCTOR;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:instructor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('instructor.login');
    }

    protected function guard()
    {
        return Auth::guard('instructor');
    }
}
