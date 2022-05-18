<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title> Acceuil</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
        <a href="index.html" class="logo me-auto"
          ><img src="assets/img/logo.jpg" alt="" class="img-fluid"
        /></a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="index.html" class="active"><button type="button" class="btn btn-outline-danger">Home</button></a></li>
            <li><a href="services.html">About</a></li>
            <li><a href="blog.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="page-etudiant.html" class="getstarted"><i class="bi bi-person-circle"></i>Profile</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <div
        id="heroCarousel"
        data-bs-interval="5000"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
      >
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div
            class="carousel-item active"
            style="background-image: url(assets/img/slide-1.jpg)"
          >
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">
                  Bienvenue <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></span>
                </h2>
                <p class="animate__animated animate__fadeInUp">
                  Pour acheter des tickets il suffit d'appuyer sur le lien ci dessus
                </p>
                <a
                  href="main.php"
                  class="btn-get-started animate__animated animate__fadeInUp scrollto"
                  ><i class="bi bi-cart4"></i>Acheter</a
                >
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div
            class="carousel-item"
            style="background-image: url(assets/img/slide-2.jpg)"
          >
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">
                Bienvenue <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></span>
                </h2>
                <p class="animate__animated animate__fadeInUp">
                  Pour acheter des tickets il suffit d'appuyer sur le lien ci dessus
                </p>
                <a
                  href="main.php"
                  class="btn-get-started animate__animated animate__fadeInUp scrollto"
                  ><i class="bi bi-cart4"></i> Acheter</a
                >
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          

        <a
          class="carousel-control-prev"
          href="#heroCarousel"
          role="button"
          data-bs-slide="prev"
        >
          <span
            class="carousel-control-prev-icon bi bi-chevron-left"
            aria-hidden="true"
          ></span>
        </a>

        <a
          class="carousel-control-next"
          href="#heroCarousel"
          role="button"
          data-bs-slide="next"
        >
          <span
            class="carousel-control-next-icon bi bi-chevron-right"
            aria-hidden="true"
          ></span>
        </a>
      </div>
    </section>
    <!-- End Hero -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
