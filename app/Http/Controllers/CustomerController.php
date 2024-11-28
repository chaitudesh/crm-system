<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function __construct()
    {
        
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function index()
    {
        $customers = Customer::all();


        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable',
            'company' => 'nullable',
        ]));

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

}
