<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoaningController extends Controller
{
    // Display all loans
    public function index()
    {
        $loans = Loan::all();
        return view('auth.loaning', compact('loans'));
    }

    // Store a new loan
    public function store(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric',
            'loan_purpose' => 'required|string',
            'loan_term' => 'required|integer',
            'repayment_schedule' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'status' => 'required|in:pending,active,late,paid',
        ]);

        Loan::create($request->all());

        return redirect()->route('loaning.index')->with('success', 'Loan added!');
    }

    // Edit page not needed anymore with inline edit, optional
    public function edit($id)
    {
        $loans = Loan::all();
        $editLoan = Loan::findOrFail($id);
        return view('auth.loaning', compact('loans', 'editLoan'));
    }

    // Update a loan
    public function update(Request $request, $id)
    {
        $request->validate([
            'loan_amount' => 'required|numeric',
            'loan_purpose' => 'required|string',
            'loan_term' => 'required|integer',
            'repayment_schedule' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'status' => 'required|in:pending,active,late,paid',
        ]);

        $loan = Loan::findOrFail($id);
        $loan->update($request->all());

        return redirect()->route('loaning.index')->with('success', 'Loan updated!');
    }

    // Delete a loan
    public function destroy($id)
    {
        Loan::destroy($id);
        return redirect()->route('loaning.index')->with('success', 'Loan deleted!');
    }
}
