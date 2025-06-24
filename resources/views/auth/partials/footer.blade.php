<footer class="bg-white text-green-900 border-t mt-16 border-gray-200 shadow-inner">
  <div class="max-w-7xl mx-auto px-8 py-12 grid grid-cols-1 md:grid-cols-4 gap-12 text-base">
    
    <!-- Navigation Links -->
    <div>
      <h2 class="text-lg font-bold mb-4">Quick Links</h2>
      <ul class="space-y-3">
        <li><a href="{{ url('/feedback') }}" target="_blank" class="hover:text-green-600">Feedback</a></li>
        <li><a href="{{ url('/help') }}" target="_blank" class="hover:text-green-600">Help</a></li>
        <li><a href="{{ url('/about') }}" target="_blank" class="hover:text-green-600">About</a></li>
        <li><a href="{{ url('/press') }}" target="_blank" class="hover:text-green-600">Press</a></li>
        <li><a href="{{ url('/privacy-policy') }}" target="_blank" class="hover:text-green-600">Privacy Policy</a></li>
      </ul>
    </div>

    <!-- Social Links -->
    <div>
      <h2 class="text-lg font-bold mb-4">Follow Us</h2>
      <div class="flex items-center space-x-6">
        <a href="https://facebook.com" target="_blank">
          <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-8 h-8 hover:scale-110 transition" />
        </a>
        <a href="https://instagram.com" target="_blank">
          <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-8 h-8 hover:scale-110 transition" />
        </a>
        <a href="https://twitter.com" target="_blank">
          <img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="w-8 h-8 hover:scale-110 transition" />
        </a>
      </div>
    </div>

    <!-- Contact Info -->
    <div>
      <h2 class="text-lg font-bold mb-4">Reach Us</h2>
      <ul class="space-y-3">
        <li>📞 <span class="text-green-700 font-semibold">+63 912 345 6789</span></li>
        <li>📧 <span class="text-green-700 font-semibold">support@sowandborrow.ph</span></li>
        <li>📍 <span class="text-green-700 font-semibold">123 Agri Road, Mabini, Bohol</span></li>
      </ul>
    </div>

    <!-- Branding -->
    <div class="text-center md:text-left">
      <img src="{{ asset('images/logo.png') }}" alt="Sow & Borrow" class="h-14 mx-auto md:mx-0 mb-4" />
      <p class="text-sm text-gray-600">&copy; {{ date('Y') }} Sow & Borrow. All rights reserved.</p>
    </div>
  </div>
</footer>
