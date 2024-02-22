<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;

class ContactController extends Controller
{
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
}
