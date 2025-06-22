<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sow & Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
 
  <!-- Fonts & Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


  <style>
    body {
      font-family: 'Quicksand', sans-serif;
    }
    .faq-question:hover {
      color: #65a30d;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-green-100 via-lime-100 to-yellow-100 min-h-screen py-10 px-6">


  <!-- Back Button -->
  <div class="mb-6">
    <a href="{{ url('/home') }}" class="text-lime-700 hover:text-lime-900 font-semibold text-sm">&larr; Back to Home</a>
  </div>


  <!-- FAQ Header -->
  <div class="text-center mb-10">
    <h1 class="text-3xl font-bold text-green-800">Help Center</h1>
    <p class="text-lg text-gray-700 mt-2">Your questions answered. If you can’t find your answer here, contact us directly!</p>
  </div>


  <!-- FAQ Section -->
  <div class="max-w-4xl mx-auto space-y-6">


    <!-- FAQ Item -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-lime-500">
      <h3 class="text-lg font-semibold text-green-800 faq-question">How do I apply for a loan?</h3>
      <p class="mt-2 text-gray-700">You can apply for a loan by navigating to the Loaning page. Fill in the loan application form and submit your required details. Our team will get back to you within 48 hours.</p>
    </div>


    <!-- FAQ Item -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-lime-500">
      <h3 class="text-lg font-semibold text-green-800 faq-question">How can I invest in a farmer’s project?</h3>
      <p class="mt-2 text-gray-700">Visit the Investing page to browse projects open for funding. Once you choose, complete the investment form and submit your confirmation.</p>
    </div>


    <!-- FAQ Item -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-lime-500">
      <h3 class="text-lg font-semibold text-green-800 faq-question">What should I do if I forget my ATM PIN or Account Number?</h3>
      <p class="mt-2 text-gray-700">Kindly visit the nearest municipal agriculture office or contact our support team for secure verification and PIN/account reset assistance.</p>
    </div>


    <!-- FAQ Item -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-lime-500">
      <h3 class="text-lg font-semibold text-green-800 faq-question">Where can I view current crop prices?</h3>
      <p class="mt-2 text-gray-700">The Market Data page provides up-to-date pricing of local crops. Prices are updated daily by the Market Monitoring Officer.</p>
    </div>


    <!-- FAQ Item -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-lime-500">
      <h3 class="text-lg font-semibold text-green-800 faq-question">How do I update my profile information?</h3>
      <p class="mt-2 text-gray-700">Go to the Profile page from the navbar dropdown. You can update your contact info, address, and more from there.</p>
    </div>


    <!-- Contact Note -->
    <div class="text-center text-sm text-gray-600 mt-12">
      Can’t find your question? <a href="{{ url('/feedback') }}" class="text-lime-700 font-medium hover:underline">Contact Support</a>
    </div>
  </div>
</body>
</html>





