<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use App\Models\ContactMe;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    
    // Show the user-facing contact page with contact details and form
    public function showUserContactPage(Request $request)
    {
        // Fetch all contact details from the database
        $contactDetails = ContactDetail::all();
        
        // Return the view for the user-side contact page with the contact details
        return view('contacts.index', compact('contactDetails'));
    }

    // Show contact details form and list (Admin section)
    public function showContactForm(Request $request)
    {
        $contactDetails = ContactDetail::all();
        $editContactDetail = null;

        if ($request->has('editContactDetail')) {
            $editContactDetail = ContactDetail::findOrFail($request->editContactDetail);
        }

        return view('contacts.contactdetails', compact('contactDetails', 'editContactDetail'));
    }

    // Store or update contact details (Admin section)
    public function saveContactDetails(Request $request, $id = null)
    {
        $request->validate([
            'location' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        if ($id) {
            $contactDetail = ContactDetail::findOrFail($id);
            $contactDetail->update($request->all());
            $message = 'Contact details updated successfully';
        } else {
            ContactDetail::create($request->all());
            $message = 'Contact details added successfully';
        }

        return redirect()->route('contactdetails.index')->with('success', $message);
    }

    // Delete contact detail (Admin section)
    public function destroyContactDetail($id)
    {
        $contactDetail = ContactDetail::findOrFail($id);
        $contactDetail->delete();

        return redirect()->route('contactdetails.index')->with('success', 'Contact details deleted successfully');
    }

    // Show contact messages (Admin section)
    public function showContactMessages()
    {
        $messages = ContactMe::all();
        return view('contacts.contactme', compact('messages'));
    }

    // Store contact message (User message submission)
    public function storeContactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    
        // Store the message in the database
        ContactMe::create($request->all());
    
        // Get the previous URL
        $previousUrl = url()->previous();
    
        // Check if the previous page was the login page to prevent redirection there
        if ($previousUrl == route('login.form')) {
            return redirect()->route('home.index')->with('success', 'Thanks for reaching out! I’ll get back to you soon.');
        }
    
        // Redirect back to the page from where the form was submitted
        return redirect($previousUrl)->with('success', 'Thanks for reaching out! I’ll get back to you soon.');
    }
    


    // Delete contact message (Admin section)
    public function destroyContactMessage($id)
    {
        $message = ContactMe::findOrFail($id);
        $message->delete();

        return redirect()->route('contactme.index')->with('success', 'Message deleted successfully');
    }

    public function markAsRead($id)
    {
        // Find the message by ID and update its read status
        $message = ContactMe::findOrFail($id);
        $message->read = true; // Set the message as read
        $message->save();
    
        // Redirect back to the same page with a success message
        return back()->with('success', 'Message marked as read successfully.');
    }
    
public function index()
{
    // Count unread messages
    $unreadMessagesCount = ContactMe::where('read', false)->count();

    // Fetch all messages 
    $messages = ContactMe::all(); 

    // Return the view and pass the unreadMessagesCount
    return view('admin', compact('messages', 'unreadMessagesCount'));
}



}
