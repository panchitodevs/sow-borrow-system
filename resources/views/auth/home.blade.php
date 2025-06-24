<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sow & Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Playfair Display', serif;
    }
  </style>
</head>
<body class="bg-white text-green-900">

@include('auth.partials.navbar')

<!-- Hero Section -->
<section class="text-center px-4 pt-20" id="home" data-aos="fade-down">
  <h1 class="text-4xl font-bold mb-2">Sowing the Seeds of Progress with Smart Farm Loans</h1>
  <h2 class="text-xl mb-6">Smart financing solutions to help you cultivate success, season after season</h2>
  <div class="flex justify-center gap-6 mb-4" data-aos="zoom-in">
    <a href="/investments" class="bg-green-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-700 transition">Apply to be an Investor</a>
    <a href="/loans" class="bg-green-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-700 transition">Apply for a Loan</a>
  </div>
</section>

<!-- Hero Image -->
<div class="h-72 bg-cover bg-center" style="background-image: url('{{ asset('images/mabinibohol.jpg') }}');" data-aos="fade-up"></div>

<!-- Services -->
<section class="py-16 px-4 text-center" data-aos="fade-up">
  <h1 class="text-3xl font-bold mb-10">Our Services</h1>
  <div class="flex flex-wrap justify-center gap-6">
    @foreach ([
      ['Crop Loan', 'For seasonal planting'],
      ['Livestock Loans', 'For animal production'],
      ['Irrigation Loans', 'To improve water access'],
      ['Agri-Business Loans', 'For farm-based enterprises.'],
      ['Equipment Financing', 'To modernize your agricultural operations'],
    ] as [$title, $desc])
      <div class="border-2 border-green-600 p-8 min-w-[250px] text-lg font-bold bg-white hover:bg-green-600 hover:text-white transition duration-300" data-aos="zoom-in">
        <h3 class="text-xl mb-1">{{ $title }}</h3>
        <h6 class="text-sm font-normal">{{ $desc }}</h6>
      </div>
    @endforeach
  </div>
</section>

<!-- Break Image -->
<section class="h-72 bg-cover bg-center" style="background-image: url('{{ asset('images/bohol.jpg') }}');" data-aos="fade"></section>

<!-- Philippine Agriculture -->
<section class="text-center py-16 px-4" data-aos="fade-up">
  <h1 class="text-3xl font-bold mb-10">Philippine Agriculture</h1>
  <div class="flex flex-wrap justify-center gap-8">
    @foreach ([
      'The Philippines is primarily an agriculture-dependent country.',
      'Agriculture has contributed 20% of GDP, 24% to exports, 40% to employment.',
      'The sector includes farming, fishing, livestock, and forestry.',
      'Coconut, rice, maize, and sugarcane are top crops in the Philippines.',
    ] as $fact)
      <div class="w-72 h-60 rounded-[20%] bg-lime-100 flex items-center justify-center text-center px-6 shadow-lg text-base font-medium text-green-900 hover:scale-105 transition duration-300" data-aos="flip-left">
        <h3><b>{{ $fact }}</b></h3>
      </div>
    @endforeach
  </div>
</section>

<!-- Final Image -->
<section class="h-72 bg-cover bg-center" style="background-image: url('{{ asset('images/bg3.png') }}');" data-aos="fade"></section>

@include('auth.partials.footer')

<script>
  AOS.init({ duration: 1000 });
</script>

</body>
</html>
