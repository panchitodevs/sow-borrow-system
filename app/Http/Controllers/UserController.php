<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all users in the admin view
    public function index()
    {
        $users = User::all();
        return view('auth.admin.users', compact('users'));
    }

    // Update a user's details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role'  => 'required|in:user,admin',
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
