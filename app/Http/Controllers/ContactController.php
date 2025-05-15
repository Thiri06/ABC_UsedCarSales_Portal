<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Handle the contact request (e.g., save to database, send email, etc.)
        // Example: Save to the database (optional)
        // Contact::create([
        //     'name' => $request->name,
        //     'message' => $request->message,
        // ]);

        return redirect()->back()->with('success', "Thank you, {$request->name}! Our team will reach out soon to assist you.");
    }
}
