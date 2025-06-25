<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('auth.admin.feedbacks', compact('feedbacks'));
    }
}