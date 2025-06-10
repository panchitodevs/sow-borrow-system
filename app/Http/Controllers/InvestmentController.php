<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function create()
    {
        return view('auth.investments');
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

        return redirect()->back()->with('success', 'Your investment has been submitted successfully!');
    }
}
