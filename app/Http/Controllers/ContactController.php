<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $user = Auth::user();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'message' => $request->message,
        ];

        Contact::create($data);

        Mail::to(env('MAIL_RECEIVER'))->send(new ContactMessage($data));

        return redirect()->back()->with('success', 'Thank you, ' . $user->name . '! Your message has been sent successfully.');
    }
}
