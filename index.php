<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Events Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <link rel="shortcut icon" href="./assets/images/logo_sm.png" />

  <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
  <link href="./assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading" data-layout-config='{"darkMode":false}'>



  <!-- NAVBAR START -->
  <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
    <div class="container">
      <!-- logo -->
      <a href="index.html" class="navbar-brand me-lg-5">
        <!-- <img
            src="../assets/images/logo.png"
            alt=""
            class="logo-dark"
            height="18"
          /> -->
        <span class="text-white fw-bold">E-MAPP</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="mdi mdi-menu"></i>
      </button>

      <!-- menus -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!-- left menu -->
        <ul class="navbar-nav me-auto align-items-center">
          <li class="nav-item mx-lg-1">
            <a class="nav-link active" href="">Home</a>
          </li>
          <li class="nav-item mx-lg-1">
            <a class="nav-link" href="">Features</a>
          </li>
          <li class="nav-item mx-lg-1">
            <a class="nav-link" href="">FAQs</a>
          </li>
        </ul>

        <!-- right menu -->
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item me-0">
            <a href="views/pages-login.php" class="nav-link d-lg-none">Login now</a>
            <a href="views/pages-login.php" class="btn btn-md btn-success btn-rounded d-none d-lg-inline-flex">
              <i class="mdi mdi-login-variant me-2"></i> Login now
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- NAVBAR END -->

  <!-- START HERO -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <div class="mt-md-4">
            <div>
              <span class="badge bg-danger rounded-pill">New</span>
              <span class="text-white-50 ms-1">Welcome to our landing page</span>
            </div>
            <h2 class="text-white fw-normal mb-4 mt-3 hero-title">
              Event Management Application System
            </h2>

            <p class="mb-4 font-16 text-white-50">
              Event Management Application System or E-MAP is a capstone
              project that can create, notify students about an event it can
              also handle the attendance and evaluation process for these
              events.
            </p>

            <a href="views/pages-login.php" target="_blank" class="btn btn-warning h4">Preview <i class="mdi mdi-arrow-right ms-1"></i></a>
          </div>
        </div>
        <div class="col-md-5 offset-md-2">
          <div class="text-md-end mt-3 mt-md-0">
            <img src="./assets/images/startup.svg" alt="" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END HERO -->

  <!-- START SERVICES -->
  <section class="py-5">
    <div class="container">
      <div class="row py-4">
        <div class="col-lg-12">
          <div class="text-center">
            <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
            <h3>
              The system is fully
              <span class="text-primary">responsive</span> and easy to
              <span class="text-primary">navigate</span>
            </h3>
            <p class="text-muted mt-2">
              The clean and well designed UI allows easy navigation of the
              system. It's designed for <br />it's not only designed well the
              system is also fully equipped with features and functionality to
              help you manage events.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-qrcode text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Scan and Generate QR codes</h4>
            <p class="text-muted mt-2 mb-0">
              The system can <b>scan</b> and <b>generate</b> QR codes for
              student attendance.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-human-greeting text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Admin and Organizer Feature</h4>
            <p class="text-muted mt-2 mb-0">
              Allow administrators and organizers to manage an event.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-card-text-outline text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Evaluation System</h4>
            <p class="text-muted mt-2 mb-0">
              Allow students to evaluate events they attended.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-database-import-outline text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Import using CSV</h4>
            <p class="text-muted mt-2 mb-0">
              Allow admin to import student data into the system using Comma
              Separated Value (CSV).
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-security text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Security</h4>
            <p class="text-muted mt-2 mb-0">
              The security ensures that each entity involved in using the system is secured.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="text-center p-3">
            <div class="avatar-sm m-auto">
              <span class="avatar-title bg-primary-lighten rounded-circle">
                <i class="mdi mdi-message-alert-outline text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Notification</h4>
            <p class="text-muted mt-2 mb-0">
              Send an Email announcement notification for every new event created.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END SERVICES -->

  <!-- START FEATURES 2 -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <h1 class="mt-0">
              <i class="mdi mdi-heart-multiple-outline"></i>
            </h1>
            <h3>Features you'll <span class="text-danger">love</span></h3>
            <p class="text-muted mt-2">
              E-MAP comes with next generation ui design and have multiple
              benefits
            </p>
          </div>
        </div>
      </div>
      <div class="row pb-3 pt-5 align-items-center">
        <div class="col-lg-6">
          <h3 class="fw-normal">Simple yet beautiful design</h3>
          <p class="text-muted mt-3">
            Emapp is built using the latest tech and tools and provide an easy
            way to customize anything, including an overall color schemes,
            layout, etc.
          </p>

          <div class="mt-4">
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-success"></i> Built with
              latest Bootstrap
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-success"></i> Extensive use
              of SCSS variables
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-success"></i> Mobile friendly
            </p>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <img src="./assets/images/features-2.svg" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- END FEATURES 2 -->

  <!-- START FOOTER -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <a href="./views/pages-login.php" class="navbar-brand me-lg-5"><b>E-MAP</b></a>
          <p class="text-muted mt-4">
            Emapp makes it easier to manage events and attendance with <br />
            great speed. Save hundreds of hours of design paperworks <br />
            and development by using this.
          </p>
          <ul class="social-list list-inline mt-3">
            <li class="list-inline-item text-center">
              <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
            </li>
            <li class="list-inline-item text-center">
              <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
            </li>
            <li class="list-inline-item text-center">
              <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
            </li>
            <li class="list-inline-item text-center">
              <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
            </li>
          </ul>
        </div>

        <div class="col-lg-2 mt-3 mt-lg-0">
          <h5 class="text-light">Company</h5>

          <ul class="list-unstyled ps-0 mb-0 mt-3">
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">About Us</a>
            </li>
          </ul>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="mt-5">
              <p class="text-muted mt-4 text-center mb-0">
                © 2022 Emapp. Design and coded by Luigi Macas, Charleston Clyde Villaruz
              </p>
            </div>
          </div>
        </div>
      </div>
  </footer>
  <!-- END FOOTER -->

  <!-- bundle -->
  <script src="./assets/js/vendor.min.js"></script>
  <script src="./assets/js/app.min.js"></script>

</body>

</html>