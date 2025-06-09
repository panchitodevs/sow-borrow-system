<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loan Application - Sow & Borrow</title>
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
  <h1 class="text-4xl font-bold mb-10 text-green-900 text-center">Loan Application Form</h1>

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

  {{-- Loan Form --}}
  <form action="{{ route('loans.store') }}" method="POST" class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-2xl space-y-6 border border-green-100">
    @csrf

    {{-- User Info --}}
    <div>
      <h2 class="text-xl font-semibold text-green-700 mb-4 border-b border-green-200 pb-2">Your Information</h2>

      <div class="mb-4">
        <label class="block mb-1 text-green-800">Full Name</label>
        <input type="text" name="full_name" readonly
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

    {{-- Loan Details --}}
    <div>
      <h2 class="text-xl font-semibold text-green-700 mb-4 border-b border-green-200 pb-2">Loan Details</h2>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="loan_amount">Loan Amount (PHP)</label>
        <input type="number" name="loan_amount" id="loan_amount" min="1000" step="100" required
          placeholder="Enter amount you want to borrow"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="loan_purpose">Loan Purpose</label>
        <input type="text" name="loan_purpose" id="loan_purpose" required
          placeholder="E.g., seeds, equipment, fertilizers"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="loan_term">Loan Term (months)</label>
        <select name="loan_term" id="loan_term" required
          class="w-full border border-green-300 rounded px-4 py-2 bg-white focus:ring-2 focus:ring-green-500">
          <option value="">-- Select Term --</option>
          <option value="3">3 months</option>
          <option value="6">6 months</option>
          <option value="12">12 months</option>
          <option value="24">24 months</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block mb-1 text-green-800" for="repayment_schedule">Repayment Schedule</label>
        <select name="repayment_schedule" id="repayment_schedule" required
          class="w-full border border-green-300 rounded px-4 py-2 bg-white focus:ring-2 focus:ring-green-500">
          <option value="">-- Select Schedule --</option>
          <option value="Monthly">Monthly</option>
          <option value="Quarterly">Quarterly</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 text-green-800" for="collateral">Collateral (optional)</label>
        <input type="text" name="collateral" id="collateral"
          placeholder="Describe collateral if any"
          class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
      </div>
    </div>

    {{-- Submit --}}
    <button type="submit" 
      class="w-full mt-6 bg-green-700 hover:bg-green-800 text-white font-semibold py-3 rounded-xl transition duration-300">
      Submit Loan Application
    </button>
  </form>
</body>
</html>
