<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;

use App\Models\Customer; // Import the Customer model
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $customers = Customer::all(); // Fetch all customers
        return view('tasks.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'customer_id' => 'required|exists:customers,id', // Ensure it exists in the customers table
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

}
