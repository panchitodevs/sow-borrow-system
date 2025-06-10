<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - Sow&Borrow Loans</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0') no-repeat center center fixed;
      background-size: cover;
    }
    h1, h2, h3 {
      font-family: 'Libre Baskerville', serif;
    }
    .overlay {
      background-color: rgba(255, 255, 255, 0.9);
    }
  </style>
</head>
@include('auth.partials.navbar')
<body class="text-green-900, pt-20">>
  <div class="overlay min-h-screen px-6 py-12">
    <!-- Header -->
    <header class="text-center mb-12" data-aos="fade-down">
      <h1 class="text-4xl font-bold mb-2">About Sow&Borrow Loans</h1>
      <p class="text-lg">Empowering Farmers with Accessible Financial Solutions</p>
    </header>

    <!-- Mission Section -->
    <section class="max-w-5xl mx-auto mb-16" data-aos="fade-up">
      <div class="bg-white p-6 rounded-2xl shadow-xl flex flex-col md:flex-row items-center gap-6">
        <img src="images/logo.png" alt="Farming Support" class="w-full md:w-1/2 rounded-xl shadow-lg" />
        <div>
          <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
          <p>
            At Sow&Borrow, we are committed to helping farmers and agribusinesses access affordable loans to grow their operations.
            Our deep roots in agriculture make us more than a lender. We're a trusted partner.
          </p>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="max-w-6xl mx-auto mb-16 grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
      <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="zoom-in">
        <img src="images/lir.jpeg" alt="Low Interest" class="rounded mb-4">
        <h3 class="text-xl font-bold mb-2">Low-Interest Rates</h3>
        <p>We offer competitive interest rates to support small and large-scale farmers.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="100">
        <img src="images/ela.png" alt="Fast Approval" class="rounded mb-4">
        <h3 class="text-xl font-bold mb-2">Fast Loan Approval</h3>
        <p>Get your loans approved quickly so you can focus on what really matters on your land.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="200">
        <img src="images/third.jpeg" alt="Support Team" class="rounded mb-4">
        <h3 class="text-xl font-bold mb-2">Agri-Expert Support</h3>
        <p>Our dedicated team of agricultural finance experts is here to guide you every step of the way.</p>
      </div>
    </section>

<!-- Team Section -->
<section class="max-w-5xl mx-auto mb-16" data-aos="fade-up">
  <h2 class="text-2xl font-bold mb-6 text-center">Meet Our Team</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
    <div class="bg-white p-4 rounded-xl shadow-md" data-aos="flip-left">
      <img src="images/emman.png" class="w-24 h-24 mx-auto rounded-full mb-3" />
      <h3 class="text-lg font-semibold">Emmanuel John Umali</h3>
      <p class="text-sm text-gray-600">Founder & CEO</p>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-md" data-aos="flip-left" data-aos-delay="100">
      <img src="images/justine.png" class="w-24 h-24 mx-auto rounded-full mb-3" />
      <h3 class="text-lg font-semibold">Justine Manese</h3>
      <p class="text-sm text-gray-600">Head of Agri-Finance</p>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-md" data-aos="flip-left" data-aos-delay="200">
      <img src="images/diether.jpeg" class="w-24 h-24 mx-auto rounded-full mb-3" />
      <h3 class="text-lg font-semibold">Diether Reyes</h3>
      <p class="text-sm text-gray-600">Loan Specialist</p>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-md" data-aos="flip-left" data-aos-delay="300">
      <img src="images/clive.jpeg" class="w-24 h-24 mx-auto rounded-full mb-3" />
      <h3 class="text-lg font-semibold">Kristine Clive Aparece</h3>
      <p class="text-sm text-gray-600">Marketing Lead</p>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-md" data-aos="flip-left" data-aos-delay="400">
      <img src="images/loreno.png" class="w-24 h-24 mx-auto rounded-full mb-3" />
      <h3 class="text-lg font-semibold">Christian Loreno</h3>
      <p class="text-sm text-gray-600">Technology Officer</p>
    </div>
  </div>
</section>

    <!-- Footer -->
    <footer class="text-center text-sm text-green-800 mt-12" data-aos="fade-up">
      &copy; 2025 Sow&Borrow Loans. All rights reserved.
    </footer>
  </div>

  <script>
    AOS.init({ duration: 1000 });
  </script>
</body>
</html>