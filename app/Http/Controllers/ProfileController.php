<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }


    public function update(Request $request)
    {
        $user = Auth::user();


        $validatedData = $request->validate([
        'first_name'   => 'required|string|max:255',
        'middle_name'  => 'nullable|string|max:255',
        'last_name'    => 'required|string|max:255',
        'email'        => 'required|email|max:255|unique:users,email,' . auth()->id(),
        'atm_account_number' => 'sometimes', // Not editable maybe; leave it out if read-only.
        'gender'       => 'required|in:male,female,other',
        'civil_status' => 'nullable|string|max:255',
        'phone'        => 'required|string|max:20',
        'barangay'     => 'nullable|string|max:255',
        'street'       => 'nullable|string|max:255',
        'city'         => 'nullable|string|max:255',
        'zip'          => 'nullable|string|max:20',
        'dob'          => 'required|date',
        ]);


        $user = auth()->user();
        $user->update($validatedData);


    return redirect()->back()->with('success', 'Profile updated successfully!');
  }
}





