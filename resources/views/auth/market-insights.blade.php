<!-- resources/views/market-insights.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sow&Borrow Market Insights - Interactive</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS (Animate on Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Source+Sans+Pro&family=Pacifico&display=swap" rel="stylesheet" />

  <!-- Chart.js -->
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
    input, select {
      outline: none;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
  </style>
  @include('auth.partials.navbar')
</head>
<body class="pt-20" >
  <div class="bg-overlay min-h-screen flex flex-col">
    <header class="bg-gradient-to-r from-green-700 to-lime-600 text-white py-12 shadow-lg" data-aos="fade-down">
      <div class="max-w-7xl mx-auto text-center px-6">
        <h1 class="text-5xl font-bold mb-2 brand">Sow&Borrow Market Insights</h1>
        <p class="text-lg italic tracking-wide">Empowering growth through informed farming decisions</p>
      </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-6 py-10 space-y-16">
      <!-- Loan Calculator -->
      <section class="bg-white rounded-2xl p-8 shadow-lg" data-aos="zoom-in">
        <h2 class="text-2xl font-semibold mb-4 text-green-800">Loan Calculator</h2>
        <form id="loanForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="loanAmount" class="block mb-1 text-sm font-medium">Loan Amount (₱):</label>
            <input type="number" id="loanAmount" name="loanAmount" class="w-full border rounded-xl p-2" required>
          </div>
          <div>
            <label for="interestRate" class="block mb-1 text-sm font-medium">Interest Rate (%):</label>
            <input type="number" id="interestRate" name="interestRate" class="w-full border rounded-xl p-2" step="0.1" required>
          </div>
          <div>
            <label for="loanTerm" class="block mb-1 text-sm font-medium">Loan Term (months):</label>
            <input type="number" id="loanTerm" name="loanTerm" class="w-full border rounded-xl p-2" required>
          </div>
          <div class="flex items-end">
            <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded-xl hover:bg-green-800 transition w-full">Calculate</button>
          </div>
        </form>
        <div id="loanResult" class="mt-6 text-green-800 text-lg font-semibold hidden"></div>
      </section>

      <!-- Market Trends Chart -->
      <section class="bg-white rounded-2xl p-8 shadow-lg" data-aos="fade-up">
        <h2 class="text-2xl font-semibold mb-4 text-green-800">Market Trends</h2>
        <canvas id="priceChart" height="120"></canvas>
      </section>

      <!-- Loan Summary Table -->
      <section class="bg-white rounded-2xl p-8 shadow-lg overflow-auto" data-aos="fade-left">
        <h2 class="text-2xl font-semibold mb-4 text-green-800">Recent Loan Summaries</h2>
        <table class="w-full border border-gray-300 text-sm">
          <thead class="bg-green-100 text-green-900">
            <tr>
              <th class="p-2 text-left">Farmer</th>
              <th class="p-2 text-left">Loan Amount</th>
              <th class="p-2 text-left">Rate</th>
              <th class="p-2 text-left">Term</th>
              <th class="p-2 text-left">Monthly Repayment</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="p-2">Adaeze N.</td>
              <td class="p-2">₱500,000</td>
              <td class="p-2">10%</td>
              <td class="p-2">12 mo</td>
              <td class="p-2">₱43,957</td>
            </tr>
            <tr>
              <td class="p-2">Ibrahim S.</td>
              <td class="p-2">₱300,000</td>
              <td class="p-2">8%</td>
              <td class="p-2">6 mo</td>
              <td class="p-2">₱52,098</td>
            </tr>
            <tr>
              <td class="p-2">Ngozi O.</td>
              <td class="p-2">₱750,000</td>
              <td class="p-2">12%</td>
              <td class="p-2">18 mo</td>
              <td class="p-2">₱49,876</td>
            </tr>
          </tbody>
        </table>
      </section>

      <!-- Regional Pricing Tabs -->
      <section class="bg-white rounded-2xl p-8 shadow-lg" data-aos="fade-right">
        <h2 class="text-2xl font-semibold mb-4 text-green-800">Regional Crop Pricing</h2>
        <div class="flex flex-wrap gap-2 mb-4">
          <button onclick="showTab('north')" class="tab-btn bg-green-200 hover:bg-green-300 px-4 py-2 rounded-xl">North</button>
          <button onclick="showTab('south')" class="tab-btn bg-green-200 hover:bg-green-300 px-4 py-2 rounded-xl">South</button>
          <button onclick="showTab('west')" class="tab-btn bg-green-200 hover:bg-green-300 px-4 py-2 rounded-xl">West</button>
          <button onclick="showTab('east')" class="tab-btn bg-green-200 hover:bg-green-300 px-4 py-2 rounded-xl">East</button>
        </div>

        <div id="north" class="tab-content active">
          <ul class="list-disc list-inside text-green-900">
            <li>Maize - ₱32,000/ton</li>
            <li>Millet - ₱28,000/ton</li>
            <li>Sorghum - ₱30,000/ton</li>
          </ul>
        </div>
        <div id="south" class="tab-content">
          <ul class="list-disc list-inside text-green-900">
            <li>Cassava - ₱25,000/ton</li>
            <li>Oil Palm - ₱40,000/ton</li>
            <li>Rubber - ₱50,000/ton</li>
          </ul>
        </div>
        <div id="west" class="tab-content">
          <ul class="list-disc list-inside text-green-900">
            <li>Cocoa - ₱60,000/ton</li>
            <li>Yam - ₱27,000/ton</li>
            <li>Maize - ₱33,000/ton</li>
          </ul>
        </div>
        <div id="east" class="tab-content">
          <ul class="list-disc list-inside text-green-900">
            <li>Rice - ₱35,000/ton</li>
            <li>Cassava - ₱26,000/ton</li>
            <li>Oil Palm - ₱42,000/ton</li>
          </ul>
        </div>
      </section>
    </main>

    <footer class="bg-green-800 text-white text-center text-xs md:text-sm py-4 md:py-6 mt-auto">
      &copy; {{ date('Y') }} Sow&Borrow. Cultivating Opportunities.
    </footer>
  </div>

  <script>
    AOS.init();

    const loanForm = document.getElementById("loanForm");
    const loanResult = document.getElementById("loanResult");

    loanForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const amount = parseFloat(document.getElementById("loanAmount").value);
      const rate = parseFloat(document.getElementById("interestRate").value) / 100 / 12;
      const term = parseInt(document.getElementById("loanTerm").value);

      const monthly = amount * rate / (1 - Math.pow(1 + rate, -term));
      loanResult.innerHTML = `Monthly Repayment: ₱${monthly.toFixed(2)}`;
      loanResult.classList.remove("hidden");
    });

    const ctx = document.getElementById("priceChart").getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
          label: "Maize Price (₱/ton)",
          data: [32000, 31500, 33000, 34000, 33500, 35000],
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

    function showTab(region) {
      document.querySelectorAll(".tab-content").forEach(tab => tab.classList.remove("active"));
      document.getElementById(region).classList.add("active");
    }
  </script>
</body>
</html>
