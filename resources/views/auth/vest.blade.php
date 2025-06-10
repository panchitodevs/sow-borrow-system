<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vestment Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f5fff5;
        }

        h1, h2, h3, h4 {
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
        <h1 class="text-4xl text-green-900 font-bold">Vestment Management</h1>
        <p class="text-green-800 mt-2">View, edit, and manage all vestment entries</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-xl rounded-xl p-6">
        <h2 class="text-2xl text-green-700 mb-6 text-center">📋 All Vestment Records</h2>

        <table class="min-w-full table-auto border-collapse border border-green-300 text-sm">
            <thead>
                <tr>
                    <th class="px-3 py-2 border">ID</th>
                    <th class="px-3 py-2 border">Amount</th>
                    <th class="px-3 py-2 border">Type</th>
                    <th class="px-3 py-2 border">Duration</th>
                    <th class="px-3 py-2 border">Notes</th>
                    <th class="px-3 py-2 border">Phone</th>
                    <th class="px-3 py-2 border">Email</th>
                    <th class="px-3 py-2 border">Status</th>
                    <th class="px-3 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($vests as $vest)
                    <tr class="hover:bg-green-50 transition-all">
                        <form method="POST" action="{{ route('vest.update', $vest->id) }}" onsubmit="return confirm('Save changes to this vestment?')">
                            @csrf
                            @method('PUT')
                            <td class="px-3 py-2 border">{{ $vest->id }}</td>
                            <td class="px-3 py-2 border">
                                <input type="number" name="amount" value="{{ $vest->amount }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="text" name="investment_type" value="{{ $vest->investment_type }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="number" name="duration_months" value="{{ $vest->duration_months }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="text" name="notes" value="{{ $vest->notes }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="text" name="phone" value="{{ $vest->phone }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <input type="email" name="email" value="{{ $vest->email }}">
                            </td>
                            <td class="px-3 py-2 border">
                                <select name="status">
                                    <option value="pending" {{ $vest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="active" {{ $vest->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="withdrawn" {{ $vest->status === 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                                </select>
                            </td>
                            <td class="px-3 py-2 border flex flex-col space-y-2">
                                <button type="submit" class="btn-save">Save</button>
                        </form>
                        <form method="POST" action="{{ route('vest.destroy', $vest->id) }}" onsubmit="return confirm('Delete this vestment?')">
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
