<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | AgriVest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f0fdf4;
        }
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
    </style>
    @include('auth.partials.navbar')
</head>
<body class="pt-20">

<div class="max-w-7xl mx-auto px-6">
    <!-- Header -->
    <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-xl p-8 mb-12 shadow-lg text-center">
        <h1 class="text-4xl text-green-900 font-bold">🌿 AgriVest Admin Dashboard</h1>
        <p class="text-green-800 mt-2 text-lg">Manage all operations related to agricultural loans, investments, and users.</p>
    </div>

    <!-- Navigation Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('loaning.index') }}" class="block bg-white shadow-lg hover:shadow-xl transition-all border border-green-300 rounded-xl p-6 text-center">
            <h3 class="text-xl font-bold text-green-800 mb-2">📄 Manage Loans</h3>
            <p class="text-sm text-gray-600">View and update all loan records from farmers and agri-businesses.</p>
        </a>

        <a href="{{ route('vest.index') }}" class="block bg-white shadow-lg hover:shadow-xl transition-all border border-yellow-300 rounded-xl p-6 text-center">
            <h3 class="text-xl font-bold text-yellow-800 mb-2">💰 View Investments</h3>
            <p class="text-sm text-gray-600">Track and manage all investment entries from stakeholders.</p>
        </a>

        <a href="{{ route('users.index') }}" class="block bg-white shadow-lg hover:shadow-xl transition-all border border-yellow-300 rounded-xl p-6 text-center">
            <h3 class="text-xl font-bold text-yellow-800 mb-2">👤 Manage Users</h3>
            <p class="text-sm text-gray-600">Track and manage all platform users and their access roles.</p>
        </a>

        <a href="{{ route('admin.feedbacks.index') }}" class="block bg-white shadow-lg hover:shadow-xl transition-all border border-blue-300 rounded-xl p-6 text-center">
            <h3 class="text-xl font-bold text-blue-800 mb-2">📢 View Feedbacks</h3>
            <p class="text-sm text-gray-600">Read and respond to feedback submitted by platform users.</p>
        </a>
    </div>

    <!-- Footer -->
    @include('auth.partials.footer')
</div>

</body>
</html>
