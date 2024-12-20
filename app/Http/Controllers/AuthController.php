<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_name')) {
            return redirect()->route('login')->withErrors('Session expired. Please log in.');
        }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $ret = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if (Auth::attempt($request->only('email', 'password'))) {
        if (Auth::attempt($ret)) {
            // Fetch the authenticated user's information
            $user = Auth::user();

            // Store user details in the session
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                // Add more fields as required
            ]);

            return redirect()->route('dashboard'); // Change 'dashboard' to your desired route
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush(); // Clear all session data
        return redirect()->route('login');
    }


}
