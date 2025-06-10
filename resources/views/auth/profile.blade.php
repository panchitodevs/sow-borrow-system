<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    * {
      font-family: 'Playfair Display', serif;
    }
    body {
      background: #fff;
      color: #000;
    }
  </style>
  <script>
    function confirmUpdate() {
      return confirm('Are you sure you want to update your profile?');
    }
  </script>
</head>
<body class="min-h-screen bg-gray-100">


  <!-- Navbar -->
  @include('auth.partials.navbar')


  <!-- Profile Content -->
  <div class="max-w-3xl mx-auto mt-32 p-6 bg-white shadow-lg rounded">
    <h1 class="text-3xl font-bold text-green-600 mb-6">My Profile</h1>


    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif


    <form action="{{ route('profile.update') }}" method="POST" class="space-y-5" onsubmit="return confirmUpdate();">
      @csrf
      @method('PUT')


      <!-- Name Fields -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('first_name')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="middle_name">Middle Name</label>
          <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name', auth()->user()->middle_name) }}"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('middle_name')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('last_name')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>


      <!-- Email -->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
          class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
        @error('email')
          <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>
     
      <!-- ATM Account Number (read-only)-->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="atm_account_number">ATM Account Number</label>
        <input type="text" id="atm_account_number" name="atm_account_number"
          value="{{ old('atm_account_number', auth()->user()->atm_account_number) }}" readonly
          class="w-full px-4 py-2 border rounded bg-gray-100 shadow-sm focus:outline-none">
      </div>


      <!-- Gender -->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Gender</label>
        <select id="gender" name="gender"
          class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender', auth()->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
          <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>


     <!-- Civil Status-->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="civil_status">Civil Status</label>
        <select id="civil_status" name="civil_status"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          <option value="Single" {{ old('civil_status', auth()->user()->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
          <option value="Married" {{ old('civil_status', auth()->user()->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
          <option value="Divorced" {{ old('civil_status', auth()->user()->civil_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option>
          <option value="Widowed" {{ old('civil_status', auth()->user()->civil_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
        </select>
        @error('civil_status')
          <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>




      <!-- Phone Number -->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required
          class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
        @error('phone')
          <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>


      <!-- Address Details -->
      <fieldset class="border p-4">
        <legend class="text-xl font-bold text-gray-700 mb-4">Address Details</legend>
       
        <!-- Barangay -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="barangay">Barangay</label>
          <input type="text" id="barangay" name="barangay" value="{{ old('barangay', auth()->user()->barangay) }}"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('barangay')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>


        <!-- Street -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="street">Street</label>
          <input type="text" id="street" name="street" value="{{ old('street', auth()->user()->street) }}"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('street')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>


        <!-- City -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="city">City</label>
          <input type="text" id="city" name="city" value="{{ old('city', auth()->user()->city) }}"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('city')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>


        <!-- ZIP -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="zip">ZIP</label>
          <input type="text" id="zip" name="zip" value="{{ old('zip', auth()->user()->zip) }}"
            class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
          @error('zip')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>
      </fieldset>


      <!-- Date of Birth -->
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" value="{{ old('dob', auth()->user()->dob) }}" required
          class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
        @error('dob')
          <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>


      <!-- Submit Button -->
      <div class="pt-4">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow">
          Update Profile
        </button>
      </div>
    </form>
  </div>
</body>
</html>



