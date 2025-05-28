<!-- resources/views/linkage.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Linkage Section - Agriculture Loaning</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
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

<section class="linkage-section">
  <div class="linkage-container">
    
    <div class="title-box">
      <h1>Sow & Borrow</h1>
      <h2>Our Linkages & Partnerships</h2>
    </div>

    <div class="linkage-category">
      <h3>🏦 Banking Partners</h3>
      <div class="partners">
        <div class="partner-card">
          <h4>Land Bank of the Philippines</h4>
          <p>Offers government-backed agricultural loans.</p>
        </div>
        <div class="partner-card">
          <h4>Agricultural Credit Policy Council</h4>
          <p>Supports financing programs for farmers.</p>
        </div>
      </div>
    </div>

    <div class="linkage-category">
      <h3>🛡️ Government Agencies</h3>
      <div class="partners">
        <div class="partner-card">
          <h4>Department of Agriculture</h4>
          <p>For farmer databases, programs, or subsidies.</p>
        </div>
        <div class="partner-card">
          <h4>Department of Trade and Industry</h4>
          <p>For agripreneurs and microfinancing.</p>
        </div>
      </div>
    </div>

    <div class="linkage-category">
      <h3>🌱 Agri-Tech Partners</h3>
      <div class="partners">
        <div class="partner-card">
          <h4>Cropital</h4>
          <p>A crowdfunding platform that connects farmers with individuals who want to invest in agriculture.</p>
        </div>
        <div class="partner-card">
          <h4>Agriblocks (by iProcure)</h4>
          <p>Uses blockchain technology for tracking the agricultural supply chain.</p>
        </div>
      </div>
    </div>

  </div>
</section>

</body>
</html>
