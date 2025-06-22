<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sow & Borrow</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />


  <!-- Fonts and Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(to right, #f0fdf4, #ecfccb);
    }
    .section {
      background-color: #fff;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body class="min-h-screen p-6 pt-24 text-green-900">


  <!-- Header -->
  <div class="max-w-5xl mx-auto mb-10 text-center">
    <h1 class="text-4xl font-bold text-green-800 mb-4">Privacy Policy</h1>
    <p class="text-gray-700 text-base">
      This policy explains how Sow & Borrow collects, uses, and protects your information.
    </p>
  </div>


  <!-- Action Buttons -->
  <div class="text-center no-print mb-6 space-x-4">
    <button onclick="window.print()" class="bg-green-700 text-white px-4 py-2 rounded shadow hover:bg-green-800">
      🖨 Print
    </button>
    <a href="{{ route('privacy.download') }}" target="_blank" class="bg-lime-600 text-green-800 px-4 py-2 rounded shadow hover:bg-lime-700">
      ⬇ Download as PDF
    </a>
  </div>


  <!-- Policy Content -->
  <div class="max-w-5xl mx-auto space-y-8">
    @foreach([
      '1. Information We Collect' => 'We collect personal information such as name, email, contact number, address, and financial details during registration, loan applications, or investment processes.',
      '2. How We Use Your Information' => '<ul class="list-disc ml-6 space-y-1"><li>To provide personalized services like loan offers or investment insights.</li><li>To communicate with users regarding account or service updates.</li><li>To analyze service performance and improve platform usability.</li></ul>',
      '3. Data Security' => 'We implement strong security measures to protect your data, including encrypted storage, secure authentication, and access control protocols.',
      '4. Sharing of Information' => 'We do not sell or rent your information. Data is shared only with trusted partners (such as payment gateways or government programs) and only with your consent.',
      '5. Your Rights' => 'You may access, update, or request deletion of your personal information by contacting our support team at <strong>privacy@sowandborrow.com</strong>.',
      '6. Updates to This Policy' => 'We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated revision date.'
    ] as $title => $content)
      <div class="section">
        <h2 class="text-xl font-semibold mb-2">{{ $title }}</h2>
        <p>{!! $content !!}</p>
      </div>
    @endforeach
  </div>


  <!-- Back Button -->
  <div class="text-center mt-10 no-print">
    <a href="{{ url('/home') }}" class="text-lime-700 font-semibold hover:text-lime-900 transition text-sm">
      ⬅ Back to Home
    </a>
  </div>


</body>
</html>



