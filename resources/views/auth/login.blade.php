<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sow and Borrow</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Playfair Display', serif;
      font-weight: 500;
    }
    h1, h2, label, .font-playfair {
      font-family: 'Playfair Display', serif;
    }
    .font-brand {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
    }
    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #4BAE4F;
      box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.5);
    }
    input, textarea, select {
      font-weight: normal;
    }
  </style>
</head>
<body class="h-screen flex">
  <div class="hidden md:block md:w-2/3 bg-cover bg-center" style="background-image: url('{{ asset('images/choco.png') }}'); filter: brightness(0.8);"></div>

  <div class="w-full md:w-1/3 relative shadow-2xl overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/image.png') }}');"></div>
    <div class="absolute inset-0 bg-[#6B6767] opacity-70"></div>

    <div class="relative z-10 flex flex-col items-center justify-start h-full p-8 text-gray-100 py-8">
      <div class="absolute top-7 left-4">
        <img src="{{ asset('images/logo2.png') }}" alt="City Logo" class="rounded-full shadow-lg w-20 h-20">
      </div>

      <div class="w-full max-w-sm flex flex-col items-center text-center">
        <div class="mb-0 mt-0 md:mt-0">
          <img src="{{ asset('images/logo1.png') }}" alt="Sow & Borrow Logo" class="w-70 h-auto drop-shadow-lg mx-auto">
        </div>

        <h1 class="text-4xl font-bold mb-0 mt-0 text-white tracking-wide">LOG IN</h1>
        <p class="text-gray-300 text-lg mb-8 font-medium mt-2">Welcome back! Please enter your details</p>

        <form method="POST" action="{{ route('login') }}" class="w-full space-y-6">
          @csrf
          <div>
            <label for="email" class="sr-only">Email or Phone Number</label>
            <input type="email" id="email" name="email" placeholder="Email or Phone Number" required
              class="w-full px-5 py-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 
              border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400 
              focus:border-green-400 transition-all duration-200 shadow-md text-lg">
          </div>

          <div>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required
              class="w-full px-5 py-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 
              border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400 
              focus:border-green-400 transition-all duration-200 shadow-md text-lg">
          </div>

          <div class="text-right">
            <a href="#" class="text-white text-sm font-bold hover:underline transition-colors duration-200">Forgot Password?</a>
          </div>

          <button type="submit"
            class="w-full py-3 rounded-lg bg-green-600 text-white text-xl font-bold 
            hover:bg-green-700 transition-colors duration-200 shadow-lg 
            transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
            LOGIN
          </button>
        </form>

        <div class="mt-8 text-lg">
          <span class="text-gray-300 font-medium">Don't have account?</span>
          <a href="{{ url('/register') }}" class="text-white ml-1 font-bold hover:underline transition-colors duration-200">Register here</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
