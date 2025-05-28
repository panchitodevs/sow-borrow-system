<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Redirect to home if login successful
            return redirect()->intended('/home');
        }

        // Redirect back with error if failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }
}


