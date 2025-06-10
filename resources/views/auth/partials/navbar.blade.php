<header class="fixed top-0 w-full bg-white shadow z-50">
  <div class="flex justify-between items-center px-12 py-4 border-b-2 border-gray-300 w-full">
   
    <!-- Logo -->
    <div class="logo flex items-center cursor-pointer" onclick="window.location.href='{{ url('/home') }}'">
      <img src="{{ asset('images/logo.png') }}" alt="Sow & Borrow" class="h-10 mr-2">
      <span class="logo-text text-2xl font-bold text-green-600">SOW & BORROW</span>
    </div>


    <!-- Navigation -->
    <div class="flex items-center space-x-6 relative">
      <a href="{{ url('/home') }}" class="font-bold text-black hover:text-green-600">Home</a>
      <a href="{{ url('/weather') }}" class="font-bold text-black hover:text-green-600">Weather</a>
      <a href="{{ url('/market-insights') }}" class="font-bold text-black hover:text-green-600">Market Data</a>
      <a href="{{ url('/loans') }}" class="font-bold text-black hover:text-green-600">Loaning</a>
      <a href="{{ url('/investments') }}" class="font-bold text-black hover:text-green-600">Investing</a>
      <a href="{{ url('/linkage') }}" class="font-bold text-black hover:text-green-600">Linkage</a>
      <a href="{{ url('/about') }}" class="font-bold text-black hover:text-green-600">About Us</a>



      <!-- Profile Dropdown -->
      <div class="relative">
        <button id="profileBtn" class="font-bold text-black hover:text-green-600 focus:outline-none">
          Profile
        </button>
        <div id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white text-black border rounded shadow-lg hidden z-50">
          <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">My Profile</a>
          <a href="{{ url('/tracker') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Tracker</a>
          <a href="{{ url('/admin/dashboard') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Admin</a>
          <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?');">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
          </form>
        </div>
      </div>
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


  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const btn = document.getElementById('profileBtn');
      const menu = document.getElementById('dropdownMenu');


      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        menu.classList.toggle('hidden');
      });


      document.addEventListener('click', function () {
        if (!menu.classList.contains('hidden')) {
          menu.classList.add('hidden');
        }
      });


      menu.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
  </script>
</header>



