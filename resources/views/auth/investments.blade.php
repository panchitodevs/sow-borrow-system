<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Investment Application - Sow & Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Source+Sans+Pro&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: linear-gradient(to right, #ecfdf5, #d1fae5);
    }

    h1, label {
      font-family: 'Playfair Display', serif;
    }
  </style>

  {{-- Navbar --}}
  @include('auth.partials.navbar')
</head>

<body class="min-h-screen flex flex-col items-center pt-40 px-4">
  <h1 class="text-4xl font-bold mb-10 text-green-900 text-center">Investment Application Form</h1>

  {{-- Success Message --}}
  @if(session('success'))
    <div class="mb-6 p-4 bg-green-200 text-green-800 rounded shadow w-full max-w-lg text-center">
      {{ session('success') }}
    </div>
  @endif

  {{-- Validation Errors --}}
  @if($errors->any())
    <div class="mb-6 p-4 bg-red-200 text-red-800 rounded shadow w-full max-w-lg">
      <ul class="list-disc list-inside text-sm">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Investment Form --}}
  <form action="{{ route('investments.store') }}" method="POST" class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-2xl space-y-6 border border-green-100">
    @csrf

    {{-- User Info --}}
    <div>
      <h2 class="text-xl font-semibold text-green-700 mb-4 border-b border-green-200 pb-2">Your Information</h2>

      <div class="mb-4">
        <label class="block mb-1 text-green-800">Full Name</label>
        <input type="text" readonly
          value="{{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}"
          class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 cursor-not-allowed" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800">Email</label>
        <input type="email" name="email" readonly
          value="{{ auth()->user()->email }}"
          class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 cursor-not-allowed" />
      </div>

      <div>
        <label class="block mb-1 text-green-800">Phone Number</label>
        <input type="text" name="phone" readonly
          value="{{ auth()->user()->phone }}"
          class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 cursor-not-allowed" />
      </div>
    </div>

    {{-- Investment Details --}}
    <div>
      <h2 class="text-xl font-semibold text-green-700 mb-4 border-b border-green-200 pb-2">Investment Details</h2>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="amount">Investment Amount (PHP)</label>
        <input type="number" name="amount" id="amount" min="1000" step="100" required
          placeholder="Enter amount to invest"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="investment_type">Investment Type</label>
        <input type="text" name="investment_type" id="investment_type" required
          placeholder="E.g., crops, equipment, land"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="duration_months">Duration (months)</label>
        <select name="duration_months" id="duration_months" required
          class="w-full border border-green-300 rounded px-4 py-2 bg-white focus:ring-2 focus:ring-green-500">
          <option value="">-- Select Duration --</option>
          <option value="3">3 months</option>
          <option value="6">6 months</option>
          <option value="12">12 months</option>
          <option value="24">24 months</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 text-green-800" for="notes">Additional Notes (optional)</label>
        <textarea name="notes" id="notes" rows="4"
          placeholder="Any details you'd like to share"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500"></textarea>
      </div>
    </div>

    {{-- Submit --}}
    <button type="submit"
      class="w-full mt-6 bg-green-700 hover:bg-green-800 text-white font-semibold py-3 rounded-xl transition duration-300">
      Submit Investment
    </button>
  </form>
</body>
</html>
