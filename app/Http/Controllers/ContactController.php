<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Customer;
class ContactController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
    public function create()
    {
        $customers = Customer::all();
        return view('contacts.create', compact('customers'));
    }
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:15',
            'customer_id' => 'required|exists:customers,id', // Validation for customer_id

        ]);

        // Save the contact
        Contact::create($validated);

        // Redirect with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id); // Find the contact or throw a 404 error
        $contact->delete(); // Delete the contact from the database

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id); // Retrieve the contact or throw a 404 error
        return view('contacts.edit', compact('contact')); // Return the edit view with the contact data
    }

}

