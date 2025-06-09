<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'atm_account_number' => 'required|digits:13',
            'atm_pin' => 'required|digits:6',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits_between:10,15',
            'barangay' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|digits:4',
            'dob' => 'required|date',
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
        ]);

        User::create([
            'atm_account_number' => $request->atm_account_number,
            'atm_pin' => $request->atm_pin,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'email' => $request->email,
            'phone' => $request->phone,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'city' => $request->city,
            'zip' => $request->zip,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }
}

