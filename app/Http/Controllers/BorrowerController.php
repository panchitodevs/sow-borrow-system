<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'atm_account_number' => 'required|string|max:255',
        'atm_pin' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string',
        'civil_status' => 'required|string',
        'email' => 'required|email|unique:borrowers,email',
        'phone' => 'required|string|max:20',
        'barangay' => 'required|string',
        'street' => 'required|string',
        'city' => 'required|string',
        'zip' => 'required|string',
        'dob' => 'required|date',
        'password' => 'required|string|min:6|confirmed',
    ]);

    Borrower::create([
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

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
}

    

    /**
     * Display the specified resource.
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrower $borrower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower)
    {
        //
    }
}
