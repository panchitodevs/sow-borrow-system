<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('auth.feedback');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'feedback' => 'required|string',
        ]);


        Feedback::create($validated);


        return back()->with('success', 'Feedback submitted successfully!');
    }
}





