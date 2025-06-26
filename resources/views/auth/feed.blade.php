<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feed</title>

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet" />

    <style>
        body{font-family:'Source Sans Pro',sans-serif;background:#f5fff5;}
        h1,h2,h3,h4{font-family:'Playfair Display',serif;}
        .btn-green{@apply bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition;}
        input,select,textarea{@apply w-full border border-green-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400;}
    </style>
</head>
<body class="pt-20 flex flex-col min-h-screen">

    {{-- Navbar --}}
    @include('auth.partials.navbar')

    <main class="flex-grow max-w-5xl mx-auto px-6 pb-20">
        {{-- Header --}}
        <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-xl p-8 mb-8 shadow-lg text-center">
            <h1 class="text-4xl text-green-900 font-bold">🌾 AgriVest Feed</h1>
            <p class="text-green-800 mt-2">Latest updates, weather, seminars, and more.</p>
        </div>

        {{-- Admin-only Create Post --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <details class="mb-8">
                    <summary class="cursor-pointer btn-green w-max">➕ Create Post</summary>
                    <div class="bg-white border border-green-300 rounded-md p-6 mt-4 shadow">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-semibold">Section Type</label>
                                    <select name="type" required>
                                        @foreach(['weather','news','story','seminar','others'] as $t)
                                            <option value="{{ $t }}">{{ ucfirst($t) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="text-sm font-semibold">Title</label>
                                    <input type="text" name="title" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-semibold">Description / Body</label>
                                <textarea name="body" rows="4" required></textarea>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-semibold">Optional Link (URL)</label>
                                    <input type="url" name="link">
                                </div>
                                <div>
                                    <label class="text-sm font-semibold">Image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>

                            <button class="btn-green">Publish</button>
                        </form>
                    </div>
                </details>
            @endif
        @endauth

        {{-- Feed --}}
        <div class="space-y-6">
            @forelse($posts as $post)
                <article class="bg-white border border-green-200 rounded-xl shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm px-3 py-1 rounded-full bg-green-100 text-green-800 capitalize">
                            {{ $post->type }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <h2 class="text-xl font-bold text-green-900 mb-2">{{ $post->title }}</h2>

                    @if($post->image_path)
                        <img src="{{ asset($post->image_path) }}" alt="image" class="w-full mb-4 rounded-md">
                    @endif

                    <p class="text-gray-700 mb-4">{{ $post->description }}</p>

                    @if($post->link)
                        <a href="{{ $post->link }}" target="_blank" class="text-blue-600 hover:underline">🔗 Read more</a>
                    @endif
                </article>
                @auth
    @if(auth()->user()->role === 'admin')
        <div class="flex justify-end gap-2 mt-4">
            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">✏️ Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">🗑️ Delete</button>
            </form>
        </div>
    @endif
@endauth

            @empty
                <p class="text-center text-gray-600">No posts found.</p>
            @endforelse

            <div class="mt-8">{{ $posts->links() }}</div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="mt-auto">
        @include('auth.partials.footer')
    </footer>

</body>
</html>
