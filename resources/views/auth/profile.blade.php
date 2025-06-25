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
<body class="min-h-screen flex flex-col bg-gray-100">

  <!-- Navbar -->
  @include('auth.partials.navbar')

  <!-- Profile Content -->
  <main class="flex-grow">
    <div class="max-w-3xl mx-auto mt-32 mb-20 p-6 bg-white shadow-lg rounded">
      <h1 class="text-3xl font-bold text-green-600 mb-6">My Profile</h1>

      <!-- Profile Image -->
      @if(auth()->user()->profile_image)
        <div class="mb-4 text-center">
          <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"
               class="w-32 h-32 rounded-full mx-auto shadow-md object-cover">
        </div>
      @endif

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
          @foreach(['first_name' => 'First Name', 'middle_name' => 'Middle Name', 'last_name' => 'Last Name'] as $field => $label)
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $field }}">{{ $label }}</label>
              <input type="text" id="{{ $field }}" name="{{ $field }}"
                     value="{{ old($field, auth()->user()->$field) }}"
                     class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500"
                     {{ $field !== 'middle_name' ? 'required' : '' }}>
              @error($field)
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
              @enderror
            </div>
          @endforeach
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

        <!-- ATM Account Number (read-only) -->
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
            @foreach(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'] as $value => $text)
              <option value="{{ $value }}" {{ old('gender', auth()->user()->gender) === $value ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
          </select>
          @error('gender')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Civil Status -->
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="civil_status">Civil Status</label>
          <select id="civil_status" name="civil_status"
                  class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
            @foreach(['Single', 'Married', 'Divorced', 'Widowed'] as $status)
              <option value="{{ $status }}" {{ old('civil_status', auth()->user()->civil_status) === $status ? 'selected' : '' }}>
                {{ $status }}
              </option>
            @endforeach
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
        <fieldset class="border p-4 rounded">
          <legend class="text-xl font-bold text-gray-700 mb-4">Address Details</legend>

          <!-- Barangay -->
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="barangay">Barangay</label>
            <select id="barangay" name="barangay" required
                    class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
              <option value="">Select Barangay</option>
              @foreach(['Abaca','Baybayon','Bato','Bulawan','Cabulao','Del Mar','Lungsod Daan','Minol','Poblacion I','Poblacion II','San Jose','San Roque','Tangkigan','Tugas','Valaga'] as $b)
                <option value="{{ $b }}" {{ old('barangay', auth()->user()->barangay) === $b ? 'selected' : '' }}>{{ $b }}</option>
              @endforeach
            </select>
            @error('barangay')
              <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
          </div>

          <!-- Street -->
          <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="street">Street</label>
            <input type="text" id="street" name="street" value="{{ old('street', auth()->user()->street) }}"
                   class="w-full px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-green-500">
            @error('street')
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
        <div class="pt-4 text-center">
          <button type="submit"
                  class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow">
            Update Profile
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  @include('auth.partials.footer')
</body>
</html>
