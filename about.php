<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Basic Meta Tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>About Us - Crowdsourced Urban Problem Reporting Platform</title>
   <meta name="description" content="Learn more about our mission, vision, and the team behind the Crowdsourced Urban Problem Reporting Platform.">
   <meta name="keywords" content="About Us, Urban problem reporting, city issues, community solutions, crowdsourced platform, team">
   <meta name="author" content="Masoom Zia">

   <!-- Favicon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" alt="Platform Favicon" />

   <!-- External CSS -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

   <style>
      /* Custom Styles for About Us Page */
      body {
         font-family: 'Lato', sans-serif;
      }

      header {
         background-color: #014421; /* Dark green */
         position: sticky;
         top: 0;
         z-index: 1000;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .navbar-brand h1 {
         font-size: 30px;
         color: white;
         font-weight: bold;
      }

      .nav-link {
         color: white !important;
         font-size: 16px;
      }

      .about-section {
         padding: 60px 0;
         background-color: #f9f9f9;
      }

      .about-title {
         font-size: 36px;
         font-weight: bold;
         color: #014421;
         margin-bottom: 20px;
         text-align: center;
      }

      .about-content {
         font-size: 18px;
         line-height: 1.6;
         color: #333;
         text-align: center;
         margin-bottom: 30px;
      }

      .team-section {
         padding: 60px 0;
         background-color: #ffffff;
      }

      .team-title {
         font-size: 32px;
         font-weight: bold;
         color: #014421;
         margin-bottom: 20px;
         text-align: center;
      }

      .team-member {
         text-align: center;
         margin-bottom: 30px;
      }

      .team-member img {
         border-radius: 50%;
         width: 150px;
         height: 150px;
         margin-bottom: 15px;
      }

      .team-member h5 {
         font-size: 20px;
         font-weight: bold;
         color: #333;
         margin-bottom: 5px;
      }

      .team-member p {
         font-size: 16px;
         color: #777;
         margin-bottom: 0;
      }

      footer {
         background-color: #014421; /* Dark green */
         padding: 30px 0;
         color: white;
      }

      footer a {
         color: white;
         text-decoration: none;
      }

      footer a:hover {
         text-decoration: underline;
      }

      .footer-title {
         color: white;
      }
   </style>
</head>

<body>
   <!-- Header Section -->
   <header>
      <div class="container-fluid">
         <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php" style="text-decoration: none;">
               <h1>CUPRP</h1>
            </a>
            <!-- Hamburger Menu Icon -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin/index.php">Admin</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="user/index.php">User Login</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="user/registration.php">Register</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.php">About Us</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
   </header>

   <!-- About Us Section -->
   <div class="about-section">
      <div class="container">
         <h2 class="about-title">About Us</h2>
         <p class="about-content">
            Welcome to the Crowdsourced Urban Problem Reporting Platform (CUPRP). Our mission is to empower communities to report urban issues effortlessly and collaboratively work towards solutions. We believe in the power of collective action to improve urban living.
         </p>
         <p class="about-content">
            Our platform allows users to report problems such as roadblocks, garbage, or any urban issue they encounter. By connecting people with similar concerns, we aim to foster a sense of community and drive positive changes in our cities.
         </p>
      </div>
   </div>

   <!-- Team Section -->
   <div class="team-section">
      <div class="container">
         <h2 class="team-title">Meet Our Team</h2>
         <div class="row">
            <div class="col-md-3">
               <div class="team-member">
                  <img src="images/team1.png" alt="Masoom Zia">
                  <h5>Masoom Zia</h5>
                  <p>Founder & CEO</p>
               </div>
            </div>
            <div class="col-md-3">
               <div class="team-member">
                  <img src="images/team2.png" alt="Muhammad Uzair">
                  <h5>Muhammad Uzair</h5>
                  <p>CTO & Developer</p>
               </div>
            </div>
            <div class="col-md-3">
               <div class="team-member">
                  <img src="images/team3.png" alt="Sami Ullah">
                  <h5>Sami Ullah</h5>
                  <p>Community Manager</p>
               </div>
            </div>
            <div class="col-md-3">
               <div class="team-member">
                  <img src="images/team4.png" alt="Muhammad Tanvir">
                  <h5>Muhammad Tanvir</h5>
                  <p>Developer</p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Footer Section -->
   <footer>
      <div class="container">
         <div class="row">
            <!-- Footer Column 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
               <h5 class="footer-title mb-3 text-uppercase font-weight-bold">About Us</h5>
               <p>
                  Spot & Solve is your trusted platform for reporting and resolving urban issues. Together, we create better cities!
               </p>
            </div>

            <!-- Footer Column 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
               <h5 class="footer-title mb-3 text-uppercase font-weight-bold">Quick Links</h5>
               <ul class="list-unstyled">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="admin/index.php">Admin</a></li>
                  <li><a href="user/index.php">User Login</a></li>
                  <li><a href="user/registration.php">User Registration</a></li>
               </ul>
            </div>

            <!-- Footer Column 3 -->
            <div class="col-lg-4 col-md-12 mb-4">
               <h5 class="footer-title mb-3 text-uppercase font-weight-bold">Contact Us</h5>
               <p>
                  <i class="fas fa-map-marker-alt"></i> 123 Green Street, Lahore, Pakistan
               </p>
               <p>
                  <i class="fas fa-phone"></i> +92 300 1234567
               </p>
               <p>
                  <i class="fas fa-envelope"></i> support@masoomzia.com
               </p>
            </div>
         </div>
         <hr class="bg-white">
         <div class="text-center">
            <p class="mb-0">&copy; 2025 Crowdsourced Urban Problem Reporting Platform.&ensp;All Rights Reserved.</p>
         </div>
      </div>
   </footer>

   <!-- JavaScript Files -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>