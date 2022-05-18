<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Home_Page</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="assetsPage2/img/favicon.ico" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assetsPage2/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link
      href="assetsPage2/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assetsPage2/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assetsPage2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assetsPage2/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assetsPage2/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assetsPage2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assetsPage2/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
        <a href="index.html" class="logo me-auto"
          ><img src="assetsPage2/img/logo.jpg" alt="" class="img-fluid"
        /></a>

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a href="index.html" class="active">Home</a>
            </li>
            <li><a href="services.html">About</a></li>
            <li><a href="blog.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li>
              <a href="index.html" class="getstarted"
                ><i class="bi bi-person-circle"></i>Profile</a
              >
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->
    <div
      class="jumbotron text-center"
      style="margin-top: 150px; position: relative"
    >
      <h1 class="display-3">Merci <?php $_SESSION['prenom'];?>!</h1>
      <img src="assetsPage2/img/logo-removebg.png" alt="" height="120px" />
      <p class="lead" style="margin-top: 20px">
        <strong><?php echo $_SESSION["message"];?></strong>
      </p>
      <hr />
      <p>vous voulez sortir ?</p>
      <p class="lead">
        <a href="index.php" class="getstarted" style="font-weight: 700"
          ><i class="bi bi-box-arrow-left"></i>Log out</a
        >
      </p>
    </div>
    <!-- Vendor JS Files -->
    <script src="assetsPage2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetsPage2/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsPage2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsPage2/vendor/php-email-form/validate.js"></script>
    <script src="assetsPage2/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assetsPage2/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsPage2/js/main.js"></script>
  </body>
</html>
