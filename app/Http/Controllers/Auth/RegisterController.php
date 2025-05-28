<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // or your custom model
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'atm_account_number' => 'required',
            'atm_pin' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'dob' => 'required|date',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
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

        auth()->login($user);
        return redirect()->route('home');
    }
}