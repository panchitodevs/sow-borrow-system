<header class="fixed top-0 w-full bg-white shadow z-50">
  <div class="flex justify-between items-center px-12 py-4 border-b-2 border-gray-300 w-full">
    
    <!-- Logo -->
    <div class="logo flex items-center cursor-pointer" onclick="window.location.href='{{ url('/home') }}'">
      <img src="{{ asset('images/logo.png') }}" alt="Sow & Borrow" class="h-10 mr-2">
      <span class="logo-text text-2xl font-bold text-green-600">SOW & BORROW</span>
    </div>

    <!-- Navigation and Logout -->
    <div class="flex items-center space-x-6">
      <a href="{{ url('/home') }}" class="font-bold text-black hover:text-green-600">Home</a>
      <a href="{{ url('/weather') }}" class="font-bold text-black hover:text-green-600">Weather</a>
      <a href="{{ url('/market-insights') }}" class="font-bold text-black hover:text-green-600">Market Data</a>
      <a href="{{ url('/loans') }}" class="font-bold text-black hover:text-green-600">Loaning</a>
      <a href="{{ url('/investments') }}" class="font-bold text-black hover:text-green-600">Investing</a>
      <a href="{{ url('/linkage') }}" class="font-bold text-black hover:text-green-600">Linkage</a>
      <a href="{{ url('/about') }}" class="font-bold text-black hover:text-green-600">About Us</a>
      <!-- Logout Button Styled Like a Link -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="font-bold text-black hover:text-green-600 transition">
          Logout
        </button>
      </form>
    </div>
  </div>

  <!-- Tailwind & Custom Styles -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Playfair Display', serif;
    }
    body {
      background: #fff;
      color: #000;
    }
  </style>
</header>
