<?php

// app/Models/Loan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id', 'loan_amount', 'loan_purpose', 'loan_term', 'repayment_schedule', 'collateral', 'phone', 'email', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
