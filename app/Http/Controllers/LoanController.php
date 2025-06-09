<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        return view('auth.loans', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:1000',
            'loan_purpose' => 'required|string|max:255',
            'loan_term' => 'required|integer|min:1|max:60',
            'repayment_schedule' => 'required|in:Monthly,Quarterly,Annually',
            'collateral' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Loan::create([
            'user_id' => Auth::id(),
            'loan_amount' => $request->loan_amount,
            'loan_purpose' => $request->loan_purpose,
            'loan_term' => $request->loan_term,
            'repayment_schedule' => $request->repayment_schedule,
            'collateral' => $request->collateral,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('loans.create')->with('success', 'Loan application submitted successfully!');
    }
}

