<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VestmentController extends Controller
{
    public function index()
    {
        $vests = Investment::all();
        return view('auth.vest', compact('vests'));
    }

    public function create()
    {
        return view('auth.vest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'investment_type' => 'required|string|max:255',
            'duration_months' => 'required|integer|in:3,6,12,24',
            'notes' => 'nullable|string|max:1000',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        Investment::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'investment_type' => $request->investment_type,
            'duration_months' => $request->duration_months,
            'notes' => $request->notes,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('vest.index')->with('success', 'Investment added!');
    }

    public function edit($id)
    {
        $vests = Investment::all();
        $editVest = Investment::findOrFail($id);
        return view('auth.vesting', compact('vests', 'editVest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'investment_type' => 'required|string|max:255',
            'duration_months' => 'required|integer|in:3,6,12,24',
            'notes' => 'nullable|string|max:1000',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $investment = Investment::findOrFail($id);
        $investment->update($request->all());

        return redirect()->route('vest.index')->with('success', 'Investment updated!');
    }

    public function destroy($id)
    {
        Investment::destroy($id);
        return redirect()->route('vest.index')->with('success', 'Investment deleted!');
    }
}
