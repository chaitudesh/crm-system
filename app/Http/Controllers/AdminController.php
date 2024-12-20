<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.admin');
    }

    public function submit(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'nullable|string',
            'address' => 'required|string',
        ]);

        // Create a new Admin record in the database
        Admin::create($validated);

        // Redirect to the login route
        return redirect()->route('login');
    }
}
