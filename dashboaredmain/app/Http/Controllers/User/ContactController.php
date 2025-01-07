<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        // Find or create the customer
        $customer = Customer::firstOrCreate(
            ['email' => $request->email]
        );

        // Store the contact message
        Contact::create([
            'customer_id' => $customer->id,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
