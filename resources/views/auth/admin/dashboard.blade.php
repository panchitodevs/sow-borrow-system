<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
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
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('auth.partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-6 py-12">

            <!-- Dashboard Header -->
            <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-2xl p-10 mb-12 shadow-xl text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-green-900">🌿 AgriVest Admin Dashboard</h1>
                <p class="text-lg md:text-xl text-green-800 mt-3">Oversee operations for loans, investments, users, and platform feedback.</p>
            </div>

            <!-- Navigation Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="{{ route('loaning.index') }}" class="bg-white border border-green-300 rounded-xl p-6 shadow-md hover:shadow-xl transition text-center">
                    <h3 class="text-xl font-bold text-green-800 mb-2">📄 Manage Loans</h3>
                    <p class="text-gray-600 text-sm">View and manage all loan records from the agricultural sector.</p>
                </a>

                <a href="{{ route('vest.index') }}" class="bg-white border border-yellow-300 rounded-xl p-6 shadow-md hover:shadow-xl transition text-center">
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">💰 View Investments</h3>
                    <p class="text-gray-600 text-sm">Track and oversee stakeholder investments in agri-projects.</p>
                </a>

                <a href="{{ route('users.index') }}" class="bg-white border border-indigo-300 rounded-xl p-6 shadow-md hover:shadow-xl transition text-center">
                    <h3 class="text-xl font-bold text-indigo-800 mb-2">👤 Manage Users</h3>
                    <p class="text-gray-600 text-sm">Control access, roles, and monitor platform user activity.</p>
                </a>

                <a href="{{ route('admin.feedbacks.index') }}" class="bg-white border border-blue-300 rounded-xl p-6 shadow-md hover:shadow-xl transition text-center col-span-full sm:col-span-2 lg:col-span-1">
                    <h3 class="text-xl font-bold text-blue-800 mb-2">📢 View Feedbacks</h3>
                    <p class="text-gray-600 text-sm">Read and respond to comments and concerns from users.</p>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-auto">
        @include('auth.partials.footer')
    </footer>

</body>
</html>
