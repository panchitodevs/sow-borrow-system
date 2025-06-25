<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f0fdf4;
        }
        h1 {
            font-family: 'Playfair Display', serif;
        }
    </style>
    @include('auth.partials.navbar')
</head>

<body class="pt-24 px-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-green-900 mb-8 text-center">📢 User Feedbacks</h1>

        @if(session('message'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-xl border border-green-200">
            <table class="min-w-full divide-y divide-green-100">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($feedbacks as $feedback)
                        <tr class="hover:bg-green-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $feedback->name ?? 'Anonymous' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $feedback->email }}</td>
                            <td class="px-6 py-4 text-sm text-yellow-600 font-bold">
                                {{ str_repeat('🌾', $feedback->rating) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $feedback->message }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $feedback->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No feedbacks submitted yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
