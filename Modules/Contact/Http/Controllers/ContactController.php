<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;

class ContactController extends Controller
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
        $contacts = Contact::latest()->get();
        return view('contact::index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // store
        try {
            $contact = Contact::create($request->all());

            if ($contact) {
                flashSuccess('Your message has successfully submitted!!');
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
    public function show(Contact $contact)
    {
        return view('contact::show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Contact $contact)
    {
        try {
            $deleteContact = $contact->delete();

            if ($deleteContact) {
                flashSuccess('The contact has been deleted successfully !!');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
