<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'atm_account_number',
        'atm_pin',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'civil_status',
        'email',
        'phone',
        'barangay',
        'street',
        'city',
        'zip',
        'dob',
        'password',
    ];
}
