<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class ContactController extends Controller
{
    public function index()
    {
        
        $contacts= Contact::all();


        return view ('admin.contact.index' , compact('contacts'));
    }

    public function updateStatus(Request $request, $contact_id)
    {
    $request->validate([
        'status' => 'required|in:pending,replied',
    ]);

    // Find the order by ID
    $contact = Contact::find($contact_id);

    if ($contact) {
        // Update the status
        $contact->status = $request->status;
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => 'Contact status updated successfully.',
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Contact not found.',
    ]);
    }

    public function delete($contact_id)
    {
        $contact= Contact::find($contact_id);
        if ($contact) {
            $contact->delete();
    
            return redirect('admin/contact')->with('message', 'Contact deleted successfully');
        }
    
        return redirect('admin/contact')->with('error', 'Contact not found');
    }

    public function markSeen($id)
{
    $contact = Contact::find($id);
    
    if ($contact) {
        $contact->status = 'seen';
        $contact->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}


    
}
