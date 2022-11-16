<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Entities\Email;
use Illuminate\Contracts\Support\Renderable;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $emails = Email::latest()->get();
        return view('subscription::index', compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'Please Give Your Email Address!!',
            'email.email' => 'Invalid Email Address!!'
        ]);

        $alreadyExists = Email::whereEmail($request->email)->count();

        if ($alreadyExists) {
            flashError('Email has already been taken');
            return back();
        }

        try {
            $email =  Email::create($request->all());

            if ($email) {
                flashSuccess('Your subscription has been successful!!');
                return back();
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
    public function destroy(Email $email)
    {
        try {
            $email = $email->delete();

            if ($email) {
                flashSuccess('Email Deleted Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
