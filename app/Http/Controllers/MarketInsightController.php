<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketInsightController extends Controller
{
    public function index()
    {
        return view('auth.market-insights'); // Make sure this matches your Blade file name
    }
}
