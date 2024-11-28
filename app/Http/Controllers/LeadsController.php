<?php
namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads',
            'phone' => 'nullable|string',
            'source' => 'required|string',
        ]);

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully!');
    }

    public function show(Lead $lead)
    {
        return view('leads.show', compact('lead'));
    }
    public function edit($id)
    {
        // Retrieve the lead by its ID
        $lead = Lead::findOrFail($id);

        // Return the view for editing the lead
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'source' => 'required|string|max:255',
        ]);

        $lead = Lead::findOrFail($id);
        $lead->update($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully!');
    }

    public function destroy($id)
    {
        // Find the lead by ID
        $lead = Lead::findOrFail($id);

        // Delete the lead
        $lead->delete();

        // Redirect back with a success message
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }
}
