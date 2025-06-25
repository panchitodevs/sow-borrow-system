<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sow&Borrow Market Insights - Mabini, Bohol</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: linear-gradient(to bottom, #f0fdf4, #dcfce7);
    }
    .brand {
      font-family: 'Pacifico', cursive;
    }
    .bg-overlay {
      background: linear-gradient(to bottom right, #ecfccb, #bbf7d0);
    }
  </style>
</head>
<body class="pt-20">

<!-- Navbar -->
@include('auth.partials.navbar')

<!-- Header -->
<header class="bg-gradient-to-r from-green-700 to-lime-600 text-white py-12 shadow-lg" data-aos="fade-down">
  <div class="max-w-7xl mx-auto text-center px-6">
    <h1 class="text-5xl font-bold brand mb-2">Sow&Borrow Market Insights</h1>
    <p class="text-lg italic tracking-wide">Empowering Mabini, Bohol through informed farming decisions</p>
  </div>
</header>

<!-- Main Section -->
<main class="bg-overlay py-10 px-4 md:px-10">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- Loan Calculator -->
    <section class="bg-white rounded-2xl p-8 shadow-xl" data-aos="zoom-in">
      <h2 class="text-2xl font-bold text-green-800 mb-4">Loan Calculator</h2>
      <label class="text-sm font-medium">Loan Amount (₱10,000–₱1,000,000):</label>
      <input type="range" id="loanAmount" min="10000" max="1000000" step="10000"
             class="w-full accent-green-700 mt-1 mb-2" oninput="updateSliderValue(this.value)">
      <p class="text-sm mb-4">Selected: ₱<span id="loanAmountDisplay">10000</span></p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm font-medium">Interest Rate (%)</label>
          <input type="number" id="interestRate" class="w-full border rounded-xl p-2 bg-gray-100" readonly>
        </div>
        <div>
          <label class="text-sm font-medium">Loan Term (months)</label>
          <input type="number" id="loanTerm" class="w-full border rounded-xl p-2 bg-gray-100" readonly>
        </div>
      </div>
      <div id="loanResult" class="mt-4 text-green-800 font-semibold"></div>
    </section>

    <!-- Crop Pricing -->
    <section class="bg-white rounded-2xl p-8 shadow-xl" data-aos="fade-right">
      <h2 class="text-2xl font-bold text-green-800 mb-4">Mabini Crop Pricing</h2>
      <ul class="list-disc pl-5 text-green-900 space-y-2">
        <li>Rice (Palay) – ₱20,000/ton</li>
        <li>Corn – ₱17,500/ton</li>
        <li>Coconut (Copra) – ₱35,000/ton</li>
        <li>Banana (Saba) – ₱12,000/ton</li>
        <li>Cassava – ₱14,000/ton</li>
      </ul>
    </section>

    <!-- Market Trends -->
    <section class="bg-white rounded-2xl p-8 shadow-xl" data-aos="fade-up">
      <h2 class="text-2xl font-bold text-green-800 mb-4">Market Trends</h2>
      <canvas id="priceChart" height="120"></canvas>
    </section>

    <!-- Tips for Farmers -->
    <section class="bg-white rounded-2xl p-8 shadow-xl" data-aos="fade-left">
      <h2 class="text-2xl font-bold text-green-800 mb-4">Smart Farming Tips</h2>
      <ul class="list-disc pl-5 text-green-900 space-y-2">
        <li>Use organic compost to enrich soil quality.</li>
        <li>Harvest early in the morning to retain crop moisture.</li>
        <li>Stay informed with weather updates before planting.</li>
        <li>Join local cooperatives for financial and material support.</li>
        <li>Attend LGU-sponsored agri-trainings to improve techniques.</li>
      </ul>
    </section>

    <!-- Summary Cards (Final Section) -->
<section class="bg-white rounded-2xl p-8 shadow-lg mt-12" data-aos="fade-up">
  <h2 class="text-2xl font-semibold mb-6 text-green-800">Key Insights Summary</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <div class="bg-green-50 p-5 rounded-xl shadow flex flex-col items-center">
      <span class="text-green-700 text-3xl font-bold">₱20K</span>
      <p class="text-sm text-gray-700">Avg Rice Price/Ton</p>
    </div>
    <div class="bg-green-50 p-5 rounded-xl shadow flex flex-col items-center">
      <span class="text-green-700 text-3xl font-bold">₱1M</span>
      <p class="text-sm text-gray-700">Max Loan Amount</p>
    </div>
    <div class="bg-green-50 p-5 rounded-xl shadow flex flex-col items-center">
      <span class="text-green-700 text-3xl font-bold">6%</span>
      <p class="text-sm text-gray-700">Lowest Interest Rate</p>
    </div>
    <div class="bg-green-50 p-5 rounded-xl shadow flex flex-col items-center">
      <span class="text-green-700 text-3xl font-bold">24 mo</span>
      <p class="text-sm text-gray-700">Max Loan Term</p>
    </div>
  </div>
</section>

  </div>
</main>

<!-- Footer -->
@include('auth.partials.footer')

<script>
  AOS.init();

  const loanAmountInput = document.getElementById("loanAmount");
  const interestRateInput = document.getElementById("interestRate");
  const loanTermInput = document.getElementById("loanTerm");
  const loanResult = document.getElementById("loanResult");

  function updateSliderValue(value) {
    document.getElementById("loanAmountDisplay").innerText = parseInt(value).toLocaleString();

    let rate, term;
    if (value <= 100000) {
      rate = 12;
      term = 6;
    } else if (value <= 300000) {
      rate = 10;
      term = 12;
    } else if (value <= 600000) {
      rate = 8;
      term = 18;
    } else {
      rate = 6;
      term = 24;
    }

    interestRateInput.value = rate;
    loanTermInput.value = term;
    autoCalculate(parseFloat(value), rate, term);
  }

  function autoCalculate(amount, rate, term) {
    const monthlyRate = rate / 100 / 12;
    const monthly = amount * monthlyRate / (1 - Math.pow(1 + monthlyRate, -term));
    loanResult.innerHTML = `Monthly Repayment: ₱${monthly.toFixed(2).toLocaleString()}`;
  }

  updateSliderValue(loanAmountInput.value);

  const ctx = document.getElementById("priceChart").getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
        label: "Palay Price (₱/ton)",
        data: [19500, 20000, 20500, 19800, 20200, 20700],
        backgroundColor: "rgba(34, 197, 94, 0.2)",
        borderColor: "rgba(34, 197, 94, 1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true }
      },
      scales: {
        y: { beginAtZero: false }
      }
    }
  });
</script>

</body>
</html>
