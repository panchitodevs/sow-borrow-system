<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Feed; // ✅ use the correct model

class FeedController extends Controller
{
    public function index(Request $req)
    {
        $query = Feed::query(); // ✅ Use Feed instead of Post

        if ($req->filled('q')) {
            $query->where('title', 'like', '%' . $req->q . '%');
        }

        if ($req->filled('type')) {
            $query->where('type', $req->type);
        }

        $posts = $query->latest()->paginate(6)->withQueryString();
        return view('auth.feed', compact('posts'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'type'  => 'required|in:weather,news,story,seminar,others',
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'link'  => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($r->hasFile('image')) {
            $imagePath = $r->file('image')->store('public/feeds');
            $data['image_path'] = Storage::url($imagePath); // ✅ Add to $data array
        }

        Feed::create($data);
        return back()->with('success', 'Post published!');
    }
}
