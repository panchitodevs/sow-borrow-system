<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f5fff5;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }

        input, select {
            @apply p-2 w-full border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400;
        }

        table th, table td {
            @apply text-sm text-gray-700;
        }

        table th {
            @apply bg-green-100 font-semibold;
        }

        .btn-save {
            @apply text-green-700 hover:text-white hover:bg-green-600 px-3 py-1 rounded-md transition;
        }

        .btn-delete {
            @apply text-red-600 hover:text-white hover:bg-red-600 px-3 py-1 rounded-md transition;
        }
    </style>

    @include('auth.partials.navbar')
</head>
<body class="pt-20">

<div class="max-w-7xl mx-auto">
    <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-xl p-8 mb-12 shadow-md text-center">
        <h1 class="text-4xl text-green-900 font-bold">User Management</h1>
        <p class="text-green-800 mt-2">Manage platform users, roles, and permissions</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-xl rounded-xl p-6">
        <h2 class="text-2xl text-green-700 mb-6 text-center">👥 All Users</h2>

        <table class="min-w-full table-auto border-collapse border border-green-300 text-sm">
            <thead>
                <tr>
                    <th class="px-3 py-2 border">ID</th>
                    <th class="px-3 py-2 border">Name</th>
                    <th class="px-3 py-2 border">Email</th>
                    <th class="px-3 py-2 border">Phone</th>
                    <th class="px-3 py-2 border">Role</th>
                    <th class="px-3 py-2 border">Created</th>
                    <th class="px-3 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users as $user)
                    <tr class="hover:bg-green-50 transition-all">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" onsubmit="return confirm('Save changes to this user?')">
                            @csrf
                            @method('PUT')
                            <td class="px-3 py-2 border">{{ $user->id }}</td>
                            <td class="px-3 py-2 border">
                                <input type="text" name="name" value="{{ $user->name }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="email" name="email" value="{{ $user->email }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="text" name="phone" value="{{ $user->phone }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <select name="role">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </td>
                            <td class="px-3 py-2 border">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="px-3 py-2 border flex flex-col space-y-2">
                                <button type="submit" class="btn-save">Save</button>
                        </form>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
