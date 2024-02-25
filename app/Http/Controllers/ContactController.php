<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Contact/Index', [
            'contacts' => $request->user()->contacts()->take(10)->get()
        ]);
    }

    public function show(Contact $contact)
    {
        return Inertia::render('Contact/Form', [
            'contact' => $contact
        ]);
    }

    public function create()
    {
        return Inertia::render('Contact/Form');
    }

    public function store(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ])->validateWithBag('createContact');

        $request->user()->contacts()->save(
            Contact::make($validData)
        );

        return Inertia::location(route('contact.index'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validData = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ])->validateWithBag('updateContact');

        $contact->update($validData);

        return back(303);
    }
}
