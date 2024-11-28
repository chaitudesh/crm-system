<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalTasks = Task::count();
        $completedTasks = Task::where('is_completed', true)->count();
        $recentCustomers = Customer::latest()->take(5)->get();
        $recentTasks = Task::latest()->take(5)->get();

        return view('dashboard.index', compact('totalCustomers', 'totalTasks', 'completedTasks', 'recentCustomers', 'recentTasks'));
    }
}
