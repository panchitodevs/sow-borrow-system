<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Feed;


class FeedController extends Controller
{
    public function index(Request $request)
    {
        $query = Feed::query();

        // Search filter
        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('body', 'like', '%' . $request->q . '%');
            });
        }

        // Type filter
        if ($request->filled('type')) {
            $query->where('type', $request->type);
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
        $imagePath = $r->file('image')->store('feeds', 'public'); // corrected
        $data['image_path'] = $imagePath;
    }

    Feed::create($data);
    return back()->with('success', 'Post published!');
}
public function edit($id)
{
    $post = Feed::findOrFail($id);
    return view('auth.feed_edit', compact('post'));
}

// Handle update
public function update(Request $r, $id)
{
    $post = Feed::findOrFail($id);

    $data = $r->validate([
        'type'  => 'required|in:weather,news,story,seminar,others',
        'title' => 'required|string|max:255',
        'body'  => 'required|string',
        'link'  => 'nullable|url',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($r->hasFile('image')) {
        if ($post->image_path && File::exists(public_path($post->image_path))) {
            File::delete(public_path($post->image_path));
        }

        $path = $r->file('image')->store('storage/feeds', 'public');
        $data['image_path'] = $path;
    }

    $post->update($data);
    return redirect()->route('feed.index')->with('success', 'Post updated!');
}

// Handle delete
public function destroy($id)
{
    $post = Feed::findOrFail($id);
    if ($post->image_path && File::exists(public_path($post->image_path))) {
        File::delete(public_path($post->image_path));
    }
    $post->delete();
    return back()->with('success', 'Post deleted!');
}
}
