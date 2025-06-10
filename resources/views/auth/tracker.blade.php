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
    @include('auth.partials.navbar')
</head>
<body class="pt-20">
    <div class="max-w-6xl mx-auto">


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


        <!-- Loan Tracker Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-xl p-6 mb-12">
            <h2 class="text-2xl text-green-700 mb-4 text-center">📋 Your Loan Records</h2>
            <table class="min-w-full table-auto border border-green-300 rounded-lg">
                <thead class="bg-green-100 text-green-800">
                    <tr>
                        <th class="px-4 py-2 border border-green-200">ID</th>
                        <th class="px-4 py-2 border border-green-200">Remaining Amount</th>
                        <th class="px-4 py-2 border border-green-200">Purpose</th>
                        <th class="px-4 py-2 border border-green-200">Term (months)</th>
                        <th class="px-4 py-2 border border-green-200">Schedule</th>
                        <th class="px-4 py-2 border border-green-200">Collateral</th>
                        <th class="px-4 py-2 border border-green-200">Status</th>
                        <th class="px-4 py-2 border border-green-200">Partial Payment</th>
                        <th class="px-4 py-2 border border-green-200">Payment Method</th>
                        <th class="px-4 py-2 border border-green-200">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($loans as $loan)
                        <tr class="hover:bg-green-50 transition">
                            <!-- Loan Details -->
                            <td class="px-4 py-2 border border-green-100">{{ $loan->id }}</td>
                            <td class="px-4 py-2 border border-green-100">₱{{ number_format($loan->loan_amount, 2) }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $loan->loan_purpose }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $loan->loan_term }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $loan->repayment_schedule }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $loan->collateral ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border border-green-100">
                                <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $loan->status === 'paid' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                    {{ ucfirst($loan->status) }}
                                </span>
                            </td>
                            <!-- Partial Payment Form for Loans -->
                            <form action="{{ route('loan.tracker.pay', $loan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to submit this payment?');">
                                @csrf
                                <td class="px-4 py-2 border border-green-100">
                                    <input type="number" name="partial_payment" step="0.01" min="0.01" max="{{ $loan->loan_amount }}"
                                        placeholder="Amount" class="w-full text-center" required>
                                </td>
                                <td class="px-4 py-2 border border-green-100">
                                    <select name="payment_method" class="w-full text-center" required>
                                        <option value="">Select Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank_transfer">Bank Transfer</option>
                                        <option value="online_payment">Online Payment</option>
                                        <option value="check">Check</option>
                                    </select>
                                </td>
                                <td class="px-4 py-2 border border-green-100">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                        Pay Now
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Investment Tracker Section -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-2xl text-green-700 mb-4 text-center">📋 Your Investment Records</h2>
            <table class="min-w-full table-auto border border-green-300 rounded-lg">
                <thead class="bg-green-100 text-green-800">
                    <tr>
                        <th class="px-4 py-2 border border-green-200">ID</th>
                        <th class="px-4 py-2 border border-green-200">Amount</th>
                        <th class="px-4 py-2 border border-green-200">Investment Type</th>
                        <th class="px-4 py-2 border border-green-200">Duration (months)</th>
                        <th class="px-4 py-2 border border-green-200">Notes</th>
                        <th class="px-4 py-2 border border-green-200">Phone</th>
                        <th class="px-4 py-2 border border-green-200">Email</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($investors as $investor)
                        <tr class="hover:bg-green-50 transition">
                            <td class="px-4 py-2 border border-green-100">{{ $investor->id }}</td>
                            <td class="px-4 py-2 border border-green-100">₱{{ number_format($investor->amount, 2) }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $investor->investment_type }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $investor->duration_months }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $investor->notes ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $investor->phone }}</td>
                            <td class="px-4 py-2 border border-green-100">{{ $investor->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Total Investment Summary -->
            <div class="mt-4 text-right font-bold text-green-900">
                Total Investments: ₱{{ number_format($investors->sum('amount'), 2) }}
            </div>
        </div>


    </div>
</body>
</html>





