<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sow & Borrow</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet"/>
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
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 50px;
      background: #fff;
      border-bottom: 2px solid #ccc;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 40px;
      margin-right: 10px;
    }
    .logo-text {
      font-size: 30px;
      font-weight: bold;
      color: #4caf50;
    }
    nav a {
      margin: 0 10px;
      text-decoration: none;
      color: black;
      font-weight: bold;
      transition: color 0.3s;
    }
    nav a:hover {
      color: green;
    }

    .hero {
      text-align: center;
      padding: 40px 20px 0;
    }
    .hero h1 {
      font-size: 36px;
      color: #1b3d1b;
      margin-bottom: 10px;
    }
    .hero h2 {
      font-size: 25px;
      color: #333;
      margin-bottom: 20px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-bottom: -40px;
      z-index: 2;
      position: relative;
    }

    .buttons a {
      background-color: #4caf50;
      color: white;
      text-decoration: none;
      padding: 20px 50px;   
      margin: 12px;
      display: inline-block;
      font-size: 22px;     
      border-radius: 6px;
      transition: background 0.3s;
    }

    .buttons a:hover {
      background-color: #3e8e41;
    }

    .hero-image {
      background: url('bg1.png') center/cover no-repeat;
      height: 300px;
      margin-bottom: -5px;
    }

    .services {
      text-align: center;
      padding: 60px 20px 40px;
    }

    .services h1 {
      font-size: 32px;
      color: #1b3d1b;
      margin-bottom: 30px;
    }

    .service-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .service {
      border: 2px solid #4caf50;
      padding: 40px 50px;
      font-size: 22px;
      font-weight: bold;
      min-width: 250px;
      text-align: center;
      transition: all 0.3s ease;
      cursor: pointer;
      background-color: #fff;
    }

    .service:hover {
      background-color: #4caf50;
      color: white;
    }

    .break-image {
      background: url('bg2.png') center/cover no-repeat;
      height: 300px;
      margin-bottom: 40px;
    }

    .contact {
      background: #4caf50;
      color: white;
      text-align: center;
      padding: 15px 20px;
    }

    footer {
      background: #222;
      color: white;
      text-align: center;
      padding: 15px 20px;
    }

    footer a {
      color: lightgreen;
      text-decoration: none;
    }   

  </style>
</head>

<body>
  <header>
    <div class="logo">
      <img src="{{ asset('images/logos.png') }}" alt="Sow & Borrow"/>
      <span class="logo-text">SOW & BORROW</span>
    </div>
    <nav>
      <a href="#home">Home</a>
      <a href="{{ route('weather') }}">Weather</a>
      <a href="#market-data">Market Data</a>
      <a href="#loaning">Loaning</a>
      <a href="#investing">Investing</a>
      <a href="{{ route('linkage') }}">Linkage</a>
      <a href="{{ route('about') }}">About Us</a>
    </nav>
  </header>

  <section class="hero" id="home">
    <h1>Sowing the Seeds of Progress with Smart Farm Loans</h1>
    <h2>Smart financing solutions to help you cultivate success, season after season</h2>
    <div class="buttons">
      <a href="{{ route('investor.create') }}">Apply to be an Investor</a>
      <a href="{{ route('loan.apply') }}">Apply for a Loan</a>
    </div>
  </section>

  <div class="hero-image" style="background-image: url('{{ asset('images/bg1.png') }}')"></div>

  <section class="services">
    <h1>Our Services</h1>
    <div class="service-grid">
      <div class="service"><h3><b>Crop Loan</b></h3><h6>For seasonal planting</h6></div>
      <div class="service"><h3><b>Livestock Loans</b></h3><h6>For animal production</h6></div>
      <div class="service"><h3><b>Irrigation Loans</b></h3><h6>To improve water access</h6></div>
      <div class="service"><h3><b>Agri-Business Loans</b></h3><h6>For farm-based enterprises.</h6></div>
      <div class="service"><h3><b>Equipment Financing</b></h3><h6>To modernize your agricultural operations</h6></div>
    </div>
  </section>

  <section class="break-image" style="background-image: url('{{ asset('images/bg2.png') }}')"></section>

  <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <p>Email: support@sowandborrow.org</p>
    <p>Phone: (02) 8376 1942</p>
  </section>

  <footer>
    <p>&copy; 2025 <strong>Sow & Borrow</strong>. All rights reserved.</p>
  </footer>
</body>
</html>
