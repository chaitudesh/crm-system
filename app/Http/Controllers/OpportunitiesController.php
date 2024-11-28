<?php
namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Lead;
use Illuminate\Http\Request;

class OpportunitiesController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }

    public function index()
    {
        // Retrieve all opportunities
        $opportunities = Opportunity::all();

        // Return the 'opportunities.index' view with the data
        return view('opportunities.index', compact('opportunities'));
    }
    public function create(Lead $lead)
    {
        return view('opportunities.create', compact('lead'));
    }

    public function store(Request $request, Lead $lead)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'stage' => 'required|string',
            'value' => 'required|numeric',
            'close_date' => 'nullable|date',
        ]);

        // Create the opportunity
        $lead->opportunities()->create($validated);

        return redirect()->route('leads.show', $lead)->with('success', 'Opportunity created successfully!');
    }

}
