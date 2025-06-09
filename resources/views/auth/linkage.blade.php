<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Linkage Section - Sow & Borrow</title>

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

  <section class="py-16 bg-green-50">
    <div class="max-w-6xl mx-auto px-6">

      <div class="bg-gradient-to-tr from-green-200 to-green-300 rounded-xl p-12 mb-16 shadow-md text-center">
        <h1 class="text-4xl text-green-900 font-bold">Sow & Borrow</h1>
        <h2 class="text-2xl text-green-800 mt-4">Our Linkages & Partnerships</h2>
      </div>

      {{-- Banking Partners --}}
      <div class="mb-16">
        <h3 class="text-2xl text-green-700 mb-8 text-center">🏦 Banking Partners</h3>
        <div class="flex flex-wrap justify-center gap-8">
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Land Bank of the Philippines</h4>
            <p class="text-gray-700 text-sm">Offers government-backed agricultural loans.</p>
          </div>
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Agricultural Credit Policy Council</h4>
            <p class="text-gray-700 text-sm">Supports financing programs for farmers.</p>
          </div>
        </div>
      </div>

      {{-- Government Agencies --}}
      <div class="mb-16">
        <h3 class="text-2xl text-green-700 mb-8 text-center">🛡️ Government Agencies</h3>
        <div class="flex flex-wrap justify-center gap-8">
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Department of Agriculture</h4>
            <p class="text-gray-700 text-sm">For farmer databases, programs, or subsidies.</p>
          </div>
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Department of Trade and Industry</h4>
            <p class="text-gray-700 text-sm">For agripreneurs and microfinancing.</p>
          </div>
        </div>
      </div>

      {{-- Agri-Tech Partners --}}
      <div>
        <h3 class="text-2xl text-green-700 mb-8 text-center">🌱 Agri-Tech Partners</h3>
        <div class="flex flex-wrap justify-center gap-8">
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Cropital</h4>
            <p class="text-gray-700 text-sm">
              A crowdfunding platform that connects farmers with individuals who want to invest in agriculture.
            </p>
          </div>
          <div class="bg-white border border-green-200 rounded-xl p-6 w-64 shadow-sm text-center">
            <h4 class="text-green-800 font-semibold mb-3">Agriblocks (by iProcure)</h4>
            <p class="text-gray-700 text-sm">Uses blockchain technology for tracking the agricultural supply chain.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

</body>
</html>
