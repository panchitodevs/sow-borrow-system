<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
            $imagePath = $r->file('image')->store('feeds', 'public'); // stores in storage/app/public/feeds
            $data['image_path'] = 'storage/' . $imagePath; // make web-accessible path
        }

        Feed::create($data);
        return back()->with('success', 'Post published!');
    }

    public function edit($id)
    {
        $post = Feed::findOrFail($id);
        return view('auth.feed_edit', compact('post'));
    }

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
            // Delete old image if exists
            if ($post->image_path && File::exists(public_path($post->image_path))) {
                File::delete(public_path($post->image_path));
            }

            // Store new image
            $imagePath = $r->file('image')->store('feeds', 'public');
            $data['image_path'] = 'storage/' . $imagePath;
        }

        $post->update($data);
        return redirect()->route('feed.index')->with('success', 'Post updated!');
    }

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
