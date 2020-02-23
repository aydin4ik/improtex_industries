<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactMessage;    
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('layouts.pages.contacts', [
            'contacts' => Contact::first()
        ]);
    }


    public function submit(Request $request)
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);
        
        Mail::to('aydin@example.com')->send(new ContactMessage($data));

        return response('success', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
