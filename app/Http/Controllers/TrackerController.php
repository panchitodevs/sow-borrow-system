<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;         // Loan model for the 'loaning' table
use App\Models\Investment;   // Investment model for the 'investors' table

class TrackerController extends Controller
{
    /**
     * Display the tracker with all loan and investor records for the authenticated user.
     */
    public function index()
    {
        // Retrieve the loans for the logged in user.
        $loans = Loan::where('user_id', auth()->id())->get();

        // Retrieve the investments for the logged in user and store them in $investors.
        $investors = Investment::where('user_id', auth()->id())->get();

        // Pass both variables to the view.
        return view('auth.tracker', compact('loans', 'investors'));
    }

    /**
     * Process a partial payment for a specific loan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Loan ID
     */
    public function pay(Request $request, $id)
    {
        // Find the loan record for the given ID belonging to the current user.
        $loan = Loan::where('user_id', auth()->id())->findOrFail($id);

        // Validate the payment.
        $request->validate([
            'partial_payment' => 'required|numeric|min:0.01|max:' . $loan->loan_amount,
            'payment_method'  => 'required|string',
        ]);

        $partialPayment = $request->partial_payment;

        // Deduct the partial payment from the loan amount.
        $loan->loan_amount -= $partialPayment;

        // Update status based on the remaining amount.
        if ($loan->loan_amount <= 0) {
            $loan->loan_amount = 0;
            $loan->status = 'paid';
        } else {
            $loan->status = 'active';
        }

        $loan->save();

        return redirect()->route('tracker.index')
                         ->with('success', 'Payment successful. Your loan has been updated.');
    }

    /**
     * Update an investment record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Investment ID
     */
    public function updateInvestment(Request $request, $id)
    {
        // Find the investment record for the given ID belonging to the current user.
        $investment = Investment::where('user_id', auth()->id())->findOrFail($id);

        // Validate the status input.
        $request->validate([
            'status' => 'required|string',
        ]);

        $investment->status = $request->status;
        $investment->save();

        return redirect()->route('tracker.index')
                         ->with('success', 'Investment record updated successfully.');
    }
}
