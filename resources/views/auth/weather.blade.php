<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Weather - Sow & Borrow</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <style>
    /* Original CSS unchanged */
    body { margin: 0; font-family: sans-serif; background-color: #f9f9f9; }
    .top-banner { width: 100%; height: 120px; background: url('{{ asset('images/plant1.jpg') }}') no-repeat center center; background-size: cover; }
    .marquee { background-color: #61a84a; padding: 10px; display: flex; justify-content: space-around; color: white; font-weight: bold; border-radius: 10px; margin: 0 20px; margin-top: -20px; position: relative; z-index: 3; }
    .top-bar { display: flex; justify-content: space-between; align-items: flex-start; padding: 40px; background-color: white; border-radius: 6px; margin-top: -10px; position: relative; z-index: 2; box-shadow: 0 2px 8px rgba(0,0,0,0.14); max-width: 1000px; margin-left: auto; margin-right: auto; }
    .image-box { max-width: 250px; }
    .image-box img { width: 200%; }
    .clock-box { border: 1px solid #ccc; padding: 10px; max-width: 250px; text-align: center; background-color: white; border-radius: 6px; }
    .accordion { width: 1020px; margin: 0 auto; padding: 29px; border: 1px solid #ccc; background-color: #fff; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15); border-radius: 8px; clear: both; }
    .accordion-item { margin-bottom: 8px; border: 1px solid #ccc; border-radius: 4px; overflow: hidden; }
    .accordion-header { display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background-color: #f1f1f1; cursor: pointer; font-weight: bold; }
    .accordion-header .accordion-title { font-size: 20px; font-family: 'Playfair Display', serif; }
    .accordion-icon { transition: transform 0.3s ease; }
    .accordion-content { max-height: 0; overflow: hidden; background-color: #fafafa; padding: 0 12px; font-size: 12px; transition: max-height 0.3s ease, padding 0.3s ease; }
    .accordion-item.active .accordion-content { max-height: 2000px; padding: 20px; }
    .accordion-item.active .accordion-icon { transform: rotate(180deg); }
    .accordion-content table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 10px; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; font-size: 14px; }
    .accordion-content th, .accordion-content td { border: 1px solid #ddd; padding: 12px 15px; text-align: left; }
    .accordion-content thead { background-color: #f2f2f2; font-weight: bold; }
    .accordion-content h2 { margin-top: 20px; font-size: 18px; color: #333; }
    .region-header { background-color: #d2e6d2; font-weight: bold; text-align: left; }
    .color-yellow { background-color: #ffff66; }
    .color-orange { background-color: #ff9933; }
    .color-red { background-color: #ff3300; }
    .color-lightgray { background-color: #eeeeee; }
  </style>
@include('auth.partials.navbar')
</head>
<body class = "pt-20">
  <div class="top-banner"></div>
  <div class="marquee">DAILY WEATHER</div>
  <div class="top-bar">
    <div class="image-box">
      <img src="{{ asset('images/date.png') }}" alt="Weather" width= "100%">
    </div>
    <div class="clock-box">
      <h4 style="margin: 0;">
        <a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/country/ph">
          <span style="color:gray;">Current local time in</span><br />Philippines
        </a>
      </h4>
      <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FManila"
              width="100%" height="90" frameborder="0" style="display:block;" seamless></iframe>
    </div>
  </div>
  <br>

  <div class="accordion">
    <!-- Heat Index Summary -->
    <div class="accordion-item">
      <div class="accordion-header">
        <span class="accordion-title">Heat Index Summary</span>
        <span class="accordion-icon">▼</span>
      </div>
      <div class="accordion-content">
        <table>
          <thead>
            <tr><th>City</th><th>Region</th><th>Heat Index (°C)</th><th>Alert</th></tr>
          </thead>
          <tbody>
            <tr class="color-red"><td>Tuguegarao</td><td>Cagayan</td><td>42</td><td>Extreme Danger</td></tr>
            <tr class="color-orange"><td>Dagupan</td><td>Pangasinan</td><td>41</td><td>Danger</td></tr>
            <tr class="color-red"><td>Clark Airport</td><td>Pampanga</td><td>43</td><td>Extreme Danger</td></tr>
            <tr class="color-orange"><td>Subic Bay</td><td>Zambales</td><td>40</td><td>Danger</td></tr>
          </tbody>
        </table>
        <p class="mt-4">Current heat indices are based on recent measurements and heatwave warnings across Luzon, with some locations reaching up to 43°C. :contentReference[oaicite:4]{index=4}</p>
      </div>
    </div>

    <!-- General Weather -->
    <div class="accordion-item">
      <div class="accordion-header">
        <span class="accordion-title">General Weather</span>
        <span class="accordion-icon">▼</span>
      </div>
      <div class="accordion-content">
        <p>According to Holiday Weather (2025), May is the hottest month... (original content).</p>

        <h2>Forecast Weather Conditions</h2>
        <table>
          <thead><tr><th>Place</th><th>Condition</th><th>Caused By</th><th>Impacts</th></tr></thead>
          <tbody>
            <tr><td>Manila</td><td>Sunny</td><td>High pressure system</td><td>Clear skies, warm</td></tr>
            <tr><td>Cebu</td><td>Partly Cloudy</td><td>Moisture from the sea</td><td>Warm, occasional clouds</td></tr>
            <tr><td>Davao</td><td>Rainy</td><td>Monsoon</td><td>Frequent showers</td></tr>
            <tr><td>Baguio</td><td>Foggy</td><td>High humidity</td><td>Reduced visibility</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Daily Temperature -->
    <div class="accordion-item">
      <div class="accordion-header">
        <span class="accordion-title">Daily Temperature</span>
        <span class="accordion-icon">▼</span>
      </div>
      <div class="accordion-content">
        <h3>Top 10 Lowest (Jun 8, 2025)</h3>
        <table>
          <thead><tr><th>Station</th><th>Temp (°C)</th></tr></thead>
          <tbody>
            <tr><td>Baguio City</td><td>18.0</td></tr>
            <tr><td>Malaybalay, Bukidnon</td><td>20.8</td></tr>
            <tr><td>Tanay, Rizal</td><td>21.2</td></tr>
            <tr><td>Coron, Palawan</td><td>22.4</td></tr>
            <tr><td>Casiguran, Aurora</td><td>22.8</td></tr>
          </tbody>
        </table>

        <h3>Top 10 Highest (Jun 8, 2025)</h3>
        <table>
          <thead><tr><th>Station</th><th>Temp (°C)</th></tr></thead>
          <tbody>
            <tr><td>Tuguegarao City</td><td>36.4</td></tr>
            <tr><td>Aparri, Cagayan</td><td>34.8</td></tr>
            <tr><td>Hinatuan, Surigao del Sur</td><td>34.5</td></tr>
            <tr><td>Catbalogan City</td><td>33.8</td></tr>
            <tr><td>Davao Intl Airport</td><td>33.2</td></tr>
          </tbody>
        </table>
        <p class="mt-2">Temperature data from PAGASA’s official June 8 report. :contentReference[oaicite:5]{index=5}</p>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll('.accordion-header').forEach(h => {
      h.addEventListener('click', () => {
        h.parentElement.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
