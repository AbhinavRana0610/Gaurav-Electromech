<?php $page_title = "Our Locations | Gaurav Electromech";
$description = "Gaurav Electromech supplies earthing systems, lightning arrestors and cable trays across India and overseas. Find our earthing and lightning protection solutions in Bengaluru, Mumbai, Navi Mumbai, Hyderabad, Chennai, Ahmedabad, Pune, Jaipur, Lucknow and Kanpur.";
$canonical = "https://www.earthingmanufacturers.com/locations.php";

include('header.php') ?>

<section class="section banner-section">
    <div class="banner-container">
        <div class="banner-inner">
            <h1 class="heading-xl">Our Presence Across India</h1>
            <p class="locations-subheading">Serving excellence in major cities & states</p>
        </div>
    </div>
</section>

<section class="locations-wrapper">
  <div class="locations-container">
    <div class="locations-grid">
      <!-- Aapke saare location-box yahan rahenge -->
      <div class="location-box"><a href="../bengaluru/backfilling-earthing-compund.php" title="Bengaluru">Bengaluru</a></div>
      <div class="location-box"><a href="../mumbai/backfilling-earthing-compund.php" title="Mumbai">Mumbai</a></div>
      <div class="location-box"><a href="../navi-mumbai/backfilling-earthing-compund.php" title="Navi Mumbai">Navi Mumbai</a></div>
      <div class="location-box"><a href="../hyderabad/backfilling-earthing-compund.php" title="Hyderabad">Hyderabad</a></div>
      <div class="location-box"><a href="../chennai/backfilling-earthing-compund.php" title="Chennai">Chennai</a></div>
      <div class="location-box"><a href="../ahmedabad/backfilling-earthing-compund.php" title="Ahmedabad">Ahmedabad</a></div>
      <div class="location-box"><a href="../pune/backfilling-earthing-compund.php" title="Pune">Pune</a></div>
      <div class="location-box"><a href="../jaipur/backfilling-earthing-compund.php" title="Jaipur">Jaipur</a></div>
      <div class="location-box"><a href="../lucknow/backfilling-earthing-compund.php" title="Lucknow">Lucknow</a></div>
      <div class="location-box"><a href="../kanpur/backfilling-earthing-compund.php" title="Kanpur">Kanpur</a></div>
      
    </div>
  </div>
</section>

<style>
    /* =================================
       BANNER SECTION ka naya CSS
    ==================================== */
    .banner-section {
      /* Ek sundar sa gradient background. Aap ise image se bhi badal sakte hain. */
      background: linear-gradient(to right, #175092, #fb841c); 
      color: #ffffff; /* Safed text behtar contrast ke liye */
      padding: 100px 20px; /* Upar-neeche aur dayein-bayein se space */
      text-align: center; /* Text ko center mein rakhega */
    }


    .banner-container {
      max-width: 1200px;
      margin: 0 auto; /* Content ko page ke center me rakhta hai */
    }

    /* Mukhya Heading ke liye styles */
    .heading-xl {
      font-size: 3.5rem; /* Bada font size */
      font-weight: 700;  /* Mota font */
      margin-bottom: 15px;
      line-height: 1.2;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Halki si parchhayi */
    }

    /* Banner ke andar subheading ke liye styles */
    .banner-section .locations-subheading {
      font-size: 1.2rem;
      color: #f0f0f0; /* Thoda halka safed rang */
      margin-bottom: 0;
      max-width: 600px; /* Line ko zyada lamba hone se rokta hai */
      margin-left: auto;
      margin-right: auto;
    }

    /* Responsive Design: Mobile par behtar dikhne ke liye */
    @media (max-width: 768px) {
      .banner-section {
        padding: 80px 20px;
      }
      .heading-xl {
        font-size: 2.5rem; /* Mobile ke liye chhota font size */
      }
      .banner-section .locations-subheading {
        font-size: 1rem;
      }
    }


    /* =================================
       LOCATIONS SECTION ka aapka purana CSS
    ==================================== */
    .locations-wrapper {
      padding: 60px 20px; /* Padding kam kar di hai taki banner se zyada door na lage */
    }

    .locations-container {
      max-width: 1200px;
      margin: auto;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: rgb(0, 0, 0);
    }

    .locations-heading {
      font-size: 2.8rem;
      color: #1f2937;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .locations-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 25px;
    }

    .location-box {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 20px;
      font-size: 1.1rem;
      font-weight: 600;
      color: rgb(0, 0, 0);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .location-box:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
      background: rgba(255, 255, 255, 0.9);
    }
</style>

<?php include('footer.php') ?>