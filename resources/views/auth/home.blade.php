<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sow & Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Source+Sans+Pro&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
    }
    h1, h2, h3, h4 {
      font-family: 'Libre Baskerville', serif;
    }
  </style>
</head>

<body class="pt-20 text-green-900 bg-white">

@include('auth.partials.navbar')

<!-- Hero -->
<section class="hero text-center px-4 pt-10" id="home" data-aos="fade-down">
  <h1 class="text-4xl font-bold mb-2">Sowing the Seeds of Progress with Smart Farm Loans</h1>
  <h2 class="text-xl mb-6">Smart financing solutions to help you cultivate success, season after season</h2>
  <div class="flex justify-center gap-6 mb-4" data-aos="zoom-in">
    <a href="{{ url('/investments') }}" class="bg-green-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-700 transition">Apply to be an Investor</a>
    <a href="{{ url('/loans') }}" class="bg-green-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-700 transition">Apply for a Loan</a>
  </div>
</section>

<div class="hero-image h-72 bg-cover bg-center" style="background-image: url('{{ asset("images/bg1.png") }}')" data-aos="fade-up"></div>

<!-- Services -->
<section class="services text-center py-16 px-4" data-aos="fade-up">
  <h1 class="text-3xl font-bold mb-10">Our Services</h1>
  <div class="service-grid flex flex-wrap justify-center gap-6">
    @foreach ([
      ['Crop Loan', 'For seasonal planting'],
      ['Livestock Loans', 'For animal production'],
      ['Irrigation Loans', 'To improve water access'],
      ['Agri-Business Loans', 'For farm-based enterprises'],
      ['Equipment Financing', 'To modernize your agricultural operations'],
    ] as [$title, $desc])
      <div class="service border-2 border-green-600 p-6 min-w-[250px] text-lg font-bold bg-white hover:bg-green-600 hover:text-white transition duration-300" data-aos="zoom-in">
        <h3 class="text-xl mb-1">{{ $title }}</h3>
        <h6 class="text-sm font-normal">{{ $desc }}</h6>
      </div>
    @endforeach
  </div>
</section>

<!-- Image Break -->
<section class="break-image h-72 bg-cover bg-center" style="background-image: url('{{ asset("images/bg2.png") }}')" data-aos="fade"></section>

<!-- Agriculture Info -->
<section class="agriculture-section text-center py-16 px-4 bg-white" data-aos="fade-up">
  <h1 class="text-3xl font-bold mb-10">Philippine Agriculture</h1>
  <div class="agriculture-info flex flex-wrap justify-center gap-8">
    @foreach ([
      'The Philippines is primarily an agriculture-dependent country.',
      'Agriculture has contributed 20% of GDP, 24% to exports, 40% to employment.',
      'The sector includes farming, fishing, livestock, and forestry.',
      'Coconut, rice, maize, and sugarcane are top crops in the Philippines.',
    ] as $fact)
      <div class="agri-circle w-72 h-60 rounded-[20%] bg-lime-100 flex items-center justify-center text-center px-6 shadow-lg text-base font-medium text-green-900 hover:scale-105 transition duration-300" data-aos="flip-left">
        <h3><b>{{ $fact }}</b></h3>
      </div>
    @endforeach
  </div>
</section>

<!-- Break Photo -->
<section class="break-photo h-72 bg-cover bg-center" style="background-image: url('{{ asset("images/bg3.png") }}')" data-aos="fade"></section>

<!-- Contact -->
<section class="contact bg-green-600 text-white text-center py-8 px-4" id="contact" data-aos="fade-up">
  <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
  <p>Email: support@sowandborrow.org</p>
  <p>Phone: (02) 8376 1942</p>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-6 text-sm" data-aos="fade-up">
  <p>&copy; 2025 <strong>Sow & Borrow</strong>. All rights reserved.</p>
</footer>

<!-- AOS Init -->
<script>
  AOS.init({ duration: 1000 });
</script>

</body>
</html>
