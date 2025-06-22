<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sow and Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />


  <!-- Fonts & Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


  <style>
    body {
      font-family: 'Quicksand', sans-serif;
    }
    .wheat {
      font-size: 2rem;
      transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
    }
    .rating input:checked + .wheat {
      color: #84cc16;
      transform: scale(1.4);
      filter: drop-shadow(0 0 4px #a3e635);
    }
    .toast {
      position: fixed;
      top: 1rem;
      right: 1rem;
      background-color: #dcfce7;
      color: #166534;
      padding: 1rem 1.5rem;
      border-radius: 0.5rem;
      display: none;
      z-index: 1000;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-green-100 via-lime-100 to-yellow-100 min-h-screen flex items-center justify-center p-6">


  <!-- Toast Message -->
  <div id="toast" class="toast">✅ Feedback submitted successfully!</div>


  <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full p-10 border border-green-200 relative">


    <!-- Back to Home Button -->
    <a href="{{ url('/home') }}" class="absolute top-4 left-4 text-lime-700 font-semibold hover:text-lime-900 transition text-sm">
      ⬅ Back to Home
    </a>


    <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">
      Send Us Your Feedback!
    </h1>


    <form method="POST" action="{{ route('feedback.store') }}" class="space-y-6">
      @csrf


      <!-- Name Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700">Name <span class="text-gray-400">(Optional)</span></label>
        <input type="text" name="name" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-lime-500 focus:border-lime-500" placeholder="Juan Dela Cruz">
      </div>


      <!-- Email Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" required class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-lime-500 focus:border-lime-500" placeholder="juan@example.com">
      </div>


      <!-- Rating Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">How satisfied are you with our services? <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-5 gap-3 sm:flex sm:justify-between text-3xl mt-2 rating">
          @for ($i = 1; $i <= 5; $i++)
            <label class="flex flex-col items-center cursor-pointer">
              <input type="radio" name="rating" value="{{ $i }}" class="sr-only" required="{{ $i === 1 ? 'required' : '' }}">
              <span class="wheat" title="{{ ['Very Dissatisfied', 'Dissatisfied', 'Neutral', 'Satisfied', 'Very Satisfied'][$i-1] }}">🌾</span>
              <span class="text-xs mt-1 text-gray-600">{{ $i }}</span>
            </label>
          @endfor
        </div>
      </div>


      <!-- Feedback Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700">Tell us more about your experience <span class="text-red-500">*</span></label>
        <textarea name="feedback" rows="5" required class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-lime-500 focus:border-lime-500" placeholder="Your feedback here..."></textarea>
      </div>


      <!-- Submit Button -->
      <div class="flex justify-center pt-4">
        <button type="submit" class="bg-lime-500 text-green-800 font-semibold px-8 py-3 rounded-xl hover:bg-lime-600 shadow-md transition duration-200">
          🌻Submit Feedback
        </button>
      </div>
    </form>
  </div>


  <!-- JS Toast -->
  @if(session('success'))
    <script>
      const toast = document.getElementById('toast');
      toast.textContent = "{{ session('success') }}";
      toast.style.display = 'block';
      setTimeout(() => toast.style.display = 'none', 3000);
    </script>
  @endif
</body>
</html>





