<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $table = 'investors';
    protected $fillable = [
        'user_id', 'amount', 'investment_type', 'duration_months', 'notes', 'email', 'phone',
    ];
    
}
