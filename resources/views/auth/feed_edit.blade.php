<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Source Sans Pro', sans-serif; background: #f5fff5; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }
        .btn-green { @apply bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition; }
        input, select, textarea { @apply w-full border border-green-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400; }
    </style>
</head>
<body class="pt-20 max-w-3xl mx-auto p-6">

    <h1 class="text-3xl font-bold text-green-900 mb-6">✏️ Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold">Section Type</label>
                <select name="type" required>
                    @foreach(['weather','news','story','seminar','others'] as $t)
                        <option value="{{ $t }}" {{ $post->type === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm font-semibold">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" required>
            </div>
        </div>

        <div>
            <label class="text-sm font-semibold">Description / Body</label>
            <textarea name="body" rows="4" required>{{ $post->body }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold">Optional Link (URL)</label>
                <input type="url" name="link" value="{{ $post->link }}">
            </div>
            <div>
                <label class="text-sm font-semibold">Replace Image</label>
                <input type="file" name="image">
                @if($post->image_path)
                    <img src="{{ asset($post->image_path) }}" class="w-full mt-2 rounded-md" alt="Post image">
                @endif
            </div>
        </div>

        <div class="flex gap-4 mt-4">
            <a href="{{ route('feed.index') }}" class="text-gray-600 hover:underline">← Cancel</a>
            <button type="submit" class="btn-green">💾 Update</button>
        </div>
    </form>

</body>
</html>
