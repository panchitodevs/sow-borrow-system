<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->merge([
            // Optional: Format phone to +63 if starts with 09
            'phone' => preg_replace('/^09/', '+639', $request->phone),
        ]);

        $request->validate([
            'atm_account_number' => 'required|digits:13',
            'atm_pin' => 'required|digits:6',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^\+639\d{9}$/',
            'barangay' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'dob' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age < 18) {
                    $fail('You must be at least 18 years old to register.');
                }
            }],
            'password' => [
                'required',
                'confirmed',
                Password::min(6)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ], [
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.uncompromised' => 'This password has appeared in a data breach. Please choose another.',
            'phone.regex' => 'Phone number must be in +63 format with 10 digits after it.',
        ]);

        User::create([
            'atm_account_number' => $request->atm_account_number,
            'atm_pin' => Hash::make($request->atm_pin),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'email' => $request->email,
            'phone' => $request->phone,
            'barangay' => $request->barangay,
            'street' => $request->street,   
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created! Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}