<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContact;
use App\Mail\ContactFormMail;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(StoreContact $request)
    {
        Contact::create($request->all());
        $data = $request->all();

        // Sending Email to Admin
        Mail::send(new ContactFormMail($data));

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    public function getContacts()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('vendor.voyager.contacts.browse')->with(compact('contacts'));
    }
}
