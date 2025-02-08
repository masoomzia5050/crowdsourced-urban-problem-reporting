<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Basic Meta Tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>Crowdsourced Urban Problem Reporting Platform</title>
   <meta name="description" content="Easily report urban problems and collaborate on solutions with our community-driven platform.">
   <meta name="keywords" content="Urban problem reporting, city issues, community solutions, crowdsourced platform, report problems">
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
   <!-- Open Graph Meta Tags for Social Sharing -->
   <meta property="og:title" content="Crowdsourced Urban Problem Reporting Platform">
   <meta property="og:description" content="Report urban problems and participate in solving them with our crowdsourced platform.">
   <meta property="og:image" content="images/social-preview.png">
   <meta property="og:url" content="https://yourwebsite.com">
   <meta property="og:type" content="website">
   <style> 
      /* Ensure the images fill the entire space */
      .banner-image { width: 100%; height: 100vh; object-fit: cover; }
      .carousel-caption { bottom: 30%; background: rgba(0, 0, 0, 0.5); padding: 10px; color: white !important; }
      .carousel-caption h1, .carousel-caption p { color: white !important; }
      @media (max-width: 768px) { .carousel-caption { bottom: 20%; padding: 5px; } .carousel-caption h1 { font-size: 24px; } .carousel-caption p { font-size: 14px; } }
      /* Custom Colors */
      body { font-family: 'Lato', sans-serif; }
      header { background-color: #014421; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
      .navbar-brand h1 { font-size: 30px; color: white; font-weight: bold; }
      .nav-link { color: white !important; font-size: 16px; }
      .banner_section { background-color: white; height: 100vh; }
      .feature_box i { color: #014421; }
      .cta_section { background-color: #014421; color: white; text-align: center; padding: 30px; }
      .cta_section .cta_title { color: white !important; }
      .cta_section .btn { background-color: white; color: #014421; font-weight: bold; }
      footer { background-color: #014421; padding: 30px 0; color: white; }
      footer a { color: white; text-decoration: none; }
      footer a:hover { text-decoration: underline; }
      .footer-title { color: white; }
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
                  <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
                  <li class="nav-item"><a class="nav-link" href="user/index.php">User Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="user/registration.php">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
               </ul>
            </div>
         </nav>
      </div>
   </header>
   <!-- Banner Section -->
   <div class="banner_section d-flex align-items-center">
      <div class="container-fluid p-0">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="images/banner1.jpg" class="d-block w-100 banner-image" alt="Report Issues Banner">
                  <div class="carousel-caption d-block">
                     <h1 class="banner_title">Report City Issues Effortlessly</h1>
                     <p>Connect with the community to solve urban problems together.</p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img src="images/banner2.jpg" class="d-block w-100 banner-image" alt="Your Voice Matters Banner">
                  <div class="carousel-caption d-block">
                     <h1 class="banner_title">Your Voice Matters</h1>
                     <p>Empower change by reporting issues that impact your neighborhood.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Features Section -->
   <div class="features_section" style="background-color: #ffffff;">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="feature_box" style="text-align: center; padding: 20px;">
                  <i class="fa fa-bullhorn fa-3x"></i>
                  <h3>Report Issues</h3>
                  <p>Easily report roadblocks, garbage, or any urban issue you see.</p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="feature_box" style="text-align: center; padding: 20px;">
                  <i class="fa fa-users fa-3x"></i>
                  <h3>Community Driven</h3>
                  <p>Collaborate with neighbors to address problems collectively.</p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="feature_box" style="text-align: center; padding: 20px;">
                  <i class="fa fa-check-circle fa-3x"></i>
                  <h3>Track Solutions</h3>
                  <p>Stay updated as issues progress towards resolution.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Call to Action -->
   <div class="cta_section">
      <h2 class="cta_title">Join Our Mission to Improve Urban Living</h2>
      <p>Be part of the solution. Start reporting today!</p>
      <a href="user/registration.php" class="btn btn-light">Get Started</a>
   </div>
    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Footer Column 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title mb-3 text-uppercase font-weight-bold">About Us</h5>
                    <p>Spot & Solve is your trusted platform for reporting and resolving urban issues. Together, we create better cities!</p>
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
                    <p><i class="fas fa-map-marker-alt"></i> 123 Green Street, Lahore, Pakistan</p>
                    <p><i class="fas fa-phone"></i> +92 300 1234567</p>
                    <p><i class="fas fa-envelope"></i> support@masoomzia.com</p>
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
   <script>
      $(document).ready(function() {
         $('#main_slider').carousel({
            interval: 5000 // Optional: set the time interval for the slide change
         });
      });
   </script>
</body>
</html>