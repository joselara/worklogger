<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\RedirectsActions;

class ContactController extends Controller
{
    use RedirectsActions;

    public function index()
    {
        return Inertia::render('Contact/Index', [
            'contacts' => Contact::take(10)->get()
        ]);
    }

    public function show(Contact $contact)
    {
        return Inertia::render('Contact/Show', [
            'contact' => $contact
        ]);
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
