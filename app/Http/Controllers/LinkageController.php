<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkageController extends Controller
{
    public function index()
    {
        return view('auth.linkage');
    }
}

