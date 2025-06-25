<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loan Application</title>
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
</head>

<body class="min-h-screen flex flex-col pt-40">

  {{-- Navbar --}}
  @include('auth.partials.navbar')

  <div class="w-full flex justify-center px-4">
    <div class="w-full max-w-2xl">

      <h1 class="text-4xl font-bold mb-10 text-green-900 text-center">Loan Application Form</h1>

      {{-- Success Message --}}
      @if(session('success'))
        <div class="mb-6 p-4 bg-green-200 text-green-800 rounded shadow text-center">
          {{ session('success') }}
        </div>
      @endif

      {{-- Validation Errors --}}
      @if($errors->any())
        <div class="mb-6 p-4 bg-red-200 text-red-800 rounded shadow">
          <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Loan Form --}}
      <form action="{{ route('loans.store') }}" method="POST" class="bg-white shadow-lg rounded-2xl p-10 space-y-6 border border-green-100 mb-20">

        {{-- Form Header --}}
        
        {{-- CSRF Token --}}
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
      <div x-data="loanCalcApp()" x-init="initializeSlider()">
  <h2 class="text-xl font-semibold text-green-700 mb-4 border-b border-green-200 pb-2">Loan Details</h2>

  <!-- Amount Input + Range -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800">Loan Amount (₱10,000–₱1,000,000)</label>
    <input type="range" min="10000" max="1000000" step="10000" class="w-full accent-green-700 mb-2"
      @input="amount = +$event.target.value; sync()" x-bind:value="amount" />
    <input type="number" name="loan_amount" min="10000" step="1000" required
      x-model.number="amount" @input="sync()"
      class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
  </div>

  <!-- Interest -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800">Interest Rate (%)</label>
    <input type="number" name="interest_rate" readonly x-model="rate"
      class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 text-gray-700" />
  </div>

  <!-- Term -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800">Loan Term (months)</label>
    <input type="number" name="loan_term" readonly x-model="term"
      class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 text-gray-700" />
  </div>

  <!-- Monthly Repayment -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800">Estimated Monthly Payment</label>
    <input type="text" readonly :value="formattedMonthly()" class="w-full border border-green-300 rounded px-4 py-2 bg-gray-100 text-gray-700" />
  </div>

  <!-- Purpose -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800" for="loan_purpose">Loan Purpose</label>
    <input type="text" name="loan_purpose" id="loan_purpose" required
      placeholder="E.g., seeds, fertilizers, tools"
      class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
  </div>

  <!-- Repayment Schedule -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800" for="repayment_schedule">Repayment Schedule</label>
    <select name="repayment_schedule" id="repayment_schedule" required
      class="w-full border border-green-300 rounded px-4 py-2 bg-white focus:ring-2 focus:ring-green-500">
      <option value="">-- Select --</option>
      <option value="Monthly">Monthly</option>
      <option value="Quarterly">Quarterly</option>
    </select>
  </div>

  <!-- Collateral (Required) -->
  <div class="mb-4">
    <label class="block mb-1 text-green-800" for="collateral">Collateral</label>
    <input type="text" name="collateral" id="collateral" required
      placeholder="Enter your collateral"
      class="w-full border border-green-300 rounded px-4 py-2 focus:ring-2 focus:ring-green-500" />
  </div>
</div>

<!-- Alpine.js & Logic -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  function loanCalcApp() {
    return {
      amount: 10000,
      rate: 12,
      term: 6,
      initializeSlider() {
        this.sync();
      },
      sync() {
        // Adjust interest & term based on amount
        if (this.amount <= 100000) {
          this.rate = 12;
          this.term = 6;
        } else if (this.amount <= 300000) {
          this.rate = 10;
          this.term = 12;
        } else if (this.amount <= 600000) {
          this.rate = 8;
          this.term = 18;
        } else {
          this.rate = 6;
          this.term = 24;
        }
      },
      formattedMonthly() {
        const r = this.rate / 100 / 12;
        const n = this.term;
        const m = this.amount * r / (1 - Math.pow(1 + r, -n));
        return `₱${m.toFixed(2).toLocaleString()}`;
      }
    }
  }
</script>



        {{-- Submit --}}
        <button type="submit"
          class="w-full mt-6 bg-green-700 hover:bg-green-800 text-white font-semibold py-3 rounded-xl transition duration-300">
          Submit Loan Application
        </button>
      </form>

    </div>
  </div>

  {{-- Footer --}}
  @include('auth.partials.footer')

</body>
</html>
