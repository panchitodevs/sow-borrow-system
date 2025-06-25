<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('auth.feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'rating' => 'required|integer|between:1,5',
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'message' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
