<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->merge([
            // Format phone to +63 if starts with 09
            'phone' => preg_replace('/^09/', '+639', $request->phone),
        ]);
        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        }

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
            'barangay' => 'required|string',
            'street' => 'required|string',
            'dob' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age < 18) {
                    $fail('You must be at least 18 years old to register.');
                }
            }],
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
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
            'phone.regex' => 'Phone number must be in +63 format with 10 digits after it.'
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
            'dob' => $request->dob,
            'profile_image' => $imagePath,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }
}
