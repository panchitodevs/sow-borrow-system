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
        $request->validate([
            'atm_account_number' => 'required|digits:13',
            'atm_pin' => 'required|min:4',
            'first_name' => 'required',
            'middle_name'=> 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^\+639\d{9}$/',
            'barangay' => 'required',
            'street' => 'required',
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
