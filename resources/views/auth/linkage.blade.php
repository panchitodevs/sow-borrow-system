<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Linkage Section</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fonts & Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5fff5;
    }

    .linkage-section {
      padding: 50px 20px;
      background-color: #e8f5e9;
    }

    .linkage-container {
      max-width: 1100px;
      margin: 0 auto;
    }

    .title-box {
      background: linear-gradient(135deg, #d0f0c0, #a5d6a7);
      padding: 30px 20px;
      border-radius: 12px;
      text-align: center;
      margin-bottom: 40px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .title-box h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      color: #1b5e20;
      margin: 0;
    }

    .title-box h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      color: #2e7d32;
      margin-top: 10px;
    }

    .linkage-category {
      margin-bottom: 40px;
    }

    .linkage-category h3 {
      color: #388e3c;
      margin-bottom: 15px;
      text-align: center;
      font-size: 1.25rem;
      font-weight: 600;
    }

    .partners {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .partner-card {
      background: white;
      border: 1px solid #c8e6c9;
      border-radius: 10px;
      padding: 20px;
      width: 250px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      text-align: center;
    }

    .partner-card h4 {
      margin: 0 0 10px;
      color: #2e7d32;
    }

    .partner-card a {
      text-decoration: none;
      color: #2e7d32;
      font-weight: bold;
      transition: color 0.2s ease;
    }

    .partner-card a:hover {
      color: #1b5e20;
      text-decoration: underline;
    }

    .partner-card p {
      font-size: 0.9rem;
      color: #555;
    }

    @media (max-width: 600px) {
      .partners {
        flex-direction: column;
        align-items: center;
      }

      .partner-card {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  @include('auth.partials.navbar')

  <section class="linkage-section">
    <div class="linkage-container">
      
      <!-- Title -->
      <div class="title-box">
        <h1>Sow & Borrow</h1>
        <h2>Our Linkages & Partnerships</h2>
      </div>

      <!-- Banking Partners -->
      <div class="linkage-category">
        <h3>🏦 Banking Partners</h3>
        <div class="partners">
          <div class="partner-card">
            <h4><a href="https://www.landbank.com/" target="_blank">Land Bank of the Philippines</a></h4>
            <p>Offers government-backed agricultural loans.</p>
          </div>
          <div class="partner-card">
            <h4><a href="https://acpc.gov.ph/" target="_blank">Agricultural Credit Policy Council</a></h4>
            <p>Supports financing programs for farmers.</p>
          </div>
        </div>
      </div>

      <!-- Government Agencies -->
      <div class="linkage-category">
        <h3>🛡️ Government Agencies</h3>
        <div class="partners">
          <div class="partner-card">
            <h4><a href="https://www.da.gov.ph/" target="_blank">Department of Agriculture</a></h4>
            <p>For farmer databases, programs, or subsidies.</p>
          </div>
          <div class="partner-card">
            <h4><a href="https://www.dti.gov.ph/" target="_blank">Department of Trade and Industry</a></h4>
            <p>For agripreneurs and microfinancing.</p>
          </div>
        </div>
      </div>

      <!-- Agri-Tech Partners -->
      <div class="linkage-category">
        <h3>🌱 Agri-Tech Partners</h3>
        <div class="partners">
          <div class="partner-card">
            <h4><a href="https://www.cropital.com/" target="_blank">Cropital</a></h4>
            <p>A crowdfunding platform that connects farmers with investors.</p>
          </div>
          <div class="partner-card">
            <h4><a href="https://www.iprocure.co.ke/" target="_blank">Agriblocks (by iProcure)</a></h4>
            <p>Uses blockchain for agricultural supply chain transparency.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  @include('auth.partials.footer')

</body>
</html>
