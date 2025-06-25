<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan & Investment Tracker</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
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
    </style>
</head>
<body class="min-h-screen flex flex-col pt-20">

{{-- Navbar --}}
@include('auth.partials.navbar')

<main class="flex-grow">
<div class="max-w-6xl mx-auto px-4 py-10">

    <!-- Page Header -->
    <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-xl p-8 mb-12 shadow-md text-center">
        <h1 class="text-4xl text-green-900 font-bold">Loan & Investment Tracker</h1>
        <p class="text-green-800 mt-2">Review, update, and manage your loan and investment information</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Loan Tracker -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-xl p-6 mb-12">
        <h2 class="text-2xl text-green-700 mb-4 text-center">📋 Your Loan Records</h2>
        <table class="min-w-full table-auto border border-green-300">
            <thead class="bg-green-100 text-green-800">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Remaining</th>
                    <th class="px-4 py-2 border">Purpose</th>
                    <th class="px-4 py-2 border">Term</th>
                    <th class="px-4 py-2 border">Schedule</th>
                    <th class="px-4 py-2 border">Collateral</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Payment</th>
                    <th class="px-4 py-2 border">Method</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($loans as $loan)
                <tr class="hover:bg-green-50">
                    <td class="px-4 py-2 border">{{ $loan->id }}</td>
                    <td class="px-4 py-2 border">₱{{ number_format($loan->loan_amount, 2) }}</td>
                    <td class="px-4 py-2 border">{{ $loan->loan_purpose }}</td>
                    <td class="px-4 py-2 border">{{ $loan->loan_term }}</td>
                    <td class="px-4 py-2 border">{{ $loan->repayment_schedule }}</td>
                    <td class="px-4 py-2 border">{{ $loan->collateral ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                            {{ $loan->status === 'paid' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                            {{ ucfirst($loan->status) }}
                        </span>
                    </td>
                    <form action="{{ route('loan.tracker.pay', $loan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        <td class="px-4 py-2 border">
                            <input type="number" name="partial_payment" class="text-center w-24" step="0.01" min="0.01" max="{{ $loan->loan_amount }}" required>
                        </td>
                        <td class="px-4 py-2 border">
                            <select name="payment_method" class="text-center w-full" required>
                                <option value="">Select</option>
                                <option value="cash">Cash</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="online_payment">Online</option>
                                <option value="check">Check</option>
                            </select>
                        </td>
                        <td class="px-4 py-2 border">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded">Pay</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Investment Tracker -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-xl p-6 mb-10">
        <h2 class="text-2xl text-green-700 mb-4 text-center">📋 Your Investment Records</h2>
        <table class="min-w-full table-auto border border-green-300">
            <thead class="bg-green-100 text-green-800">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Amount</th>
                    <th class="px-4 py-2 border">Type</th>
                    <th class="px-4 py-2 border">Duration</th>
                    <th class="px-4 py-2 border">Notes</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Withdraw</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($investors as $investor)
                <tr class="hover:bg-green-50">
                    <td class="px-4 py-2 border">{{ $investor->id }}</td>
                    <td class="px-4 py-2 border">₱{{ number_format($investor->amount, 2) }}</td>
                    <td class="px-4 py-2 border">{{ $investor->investment_type }}</td>
                    <td class="px-4 py-2 border">{{ $investor->duration_months }}</td>
                    <td class="px-4 py-2 border">{{ $investor->notes ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $investor->phone }}</td>
                    <td class="px-4 py-2 border">{{ $investor->email }}</td>
                    <td class="px-4 py-2 border">
                        <form action="{{ route('investor.withdraw', $investor->id) }}" method="POST" onsubmit="return confirm('Confirm withdrawal?');">
                            @csrf
                            <input type="number" name="withdraw_amount" class="w-24 mb-1 border text-sm px-2 py-1 rounded" min="1" max="{{ $investor->amount }}" step="0.01" placeholder="₱" required>
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded w-full">Withdraw</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Summary -->
        <div class="mt-4 text-right font-bold text-green-900">
            Total Investments: ₱{{ number_format($investors->sum('amount'), 2) }}
        </div>
    </div>
</div>
</main>

{{-- Footer --}}
@include('auth.partials.footer')

</body>
</html>
