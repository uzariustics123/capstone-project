<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Events Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" />

  <!-- App css -->
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

            <a href="" target="_blank" class="btn btn-warning h4">Preview <i class="mdi mdi-arrow-right ms-1"></i></a>
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
                <i class="mdi mdi-chart-box-plus-outline text-primary font-24"></i>
              </span>
            </div>
            <h4 class="mt-3">Report</h4>
            <p class="text-muted mt-2 mb-0">
              Generate a report for attendance & evaluation records of the
              student.
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
              Send an announcement notification for every new event created.
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
      <div class="row mt-2 py-5 align-items-center">
        <div class="col-lg-5">
          <img src="./assets/images/features-1.svg" class="img-fluid" alt="" />
        </div>
        <div class="col-lg-6 offset-lg-1">
          <h3 class="fw-normal">Inbuilt charts and pages</h3>
          <p class="text-muted mt-3">
            E-MAP comes with a variety of reporting features like charts and
            pages.
          </p>

          <div class="mt-4">
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-primary"></i> Projects &
              Tasks
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-primary"></i> Ecommerce
              Application Pages
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-primary"></i> Profile,
              pricing, invoice
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-primary"></i> Login,
              signup, forget password
            </p>
          </div>

          <a href="" class="btn btn-primary btn-rounded mt-3">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
        </div>
      </div>

      <div class="row pb-3 pt-5 align-items-center">
        <div class="col-lg-6">
          <h3 class="fw-normal">Simply beautiful design</h3>
          <p class="text-muted mt-3">
            The simplest and fastest way to build dashboard or admin panel.
            Hyper is built using the latest tech and tools and provide an easy
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
              <i class="mdi mdi-circle-medium text-success"></i> Well
              documented and structured code
            </p>
            <p class="text-muted">
              <i class="mdi mdi-circle-medium text-success"></i> Detailed
              Documentation
            </p>
          </div>

          <a href="" class="btn btn-success btn-rounded mt-3">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <img src="./assets/images/features-2.svg" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- END FEATURES 2 -->

  <!-- START FAQ -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <h1 class="mt-0">
              <i class="mdi mdi-frequently-asked-questions"></i>
            </h1>
            <h3>
              Frequently Asked <span class="text-primary">Questions</span>
            </h3>
            <p class="text-muted mt-2">
              Here are some of the basic types of questions for our customers.
              For more <br />information please contact us.
            </p>

            <button type="button" class="btn btn-success btn-sm mt-2">
              <i class="mdi mdi-email-outline me-1"></i> Email us your
              question
            </button>
            <button type="button" class="btn btn-info btn-sm mt-2 ms-1">
              <i class="mdi mdi-twitter me-1"></i> Send us a tweet
            </button>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-5 offset-lg-1">
          <!-- Question/Answer -->
          <div>
            <div class="faq-question-q-box">Q.</div>
            <h4 class="faq-question text-body">
              Can I use this template for my client?
            </h4>
            <p class="faq-answer mb-4 pb-1 text-muted">
              Yup, the marketplace license allows you to use this theme in any
              end products. For more information on licenses, please refere
              <a href="../../licenses/index.htm" target="_blank">here</a>.
            </p>
          </div>

          <!-- Question/Answer -->
          <div>
            <div class="faq-question-q-box">Q.</div>
            <h4 class="faq-question text-body">
              How do I get help with the theme?
            </h4>
            <p class="faq-answer mb-4 pb-1 text-muted">
              Use our dedicated support email (support@coderthemes.com) to
              send your issues or feedback. We are here to help anytime.
            </p>
          </div>
        </div>
        <!--/col-lg-5 -->

        <div class="col-lg-5">
          <!-- Question/Answer -->
          <div>
            <div class="faq-question-q-box">Q.</div>
            <h4 class="faq-question text-body">
              Can this theme work with Wordpress?
            </h4>
            <p class="faq-answer mb-4 pb-1 text-muted">
              No. This is a HTML template. It won't directly with wordpress,
              though you can convert this into wordpress compatible theme.
            </p>
          </div>

          <!-- Question/Answer -->
          <div>
            <div class="faq-question-q-box">Q.</div>
            <h4 class="faq-question text-body">
              Will you regularly give updates of Hyper?
            </h4>
            <p class="faq-answer mb-4 pb-1 text-muted">
              Yes, We will update the Hyper regularly. All the future updates
              would be available without any cost.
            </p>
          </div>
        </div>
        <!--/col-lg-5-->
      </div>
      <!-- end row -->
    </div>
    <!-- end container-->
  </section>
  <!-- END FAQ -->

  <!-- START CONTACT -->
  <section class="py-5 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <h3>Get In <span class="text-primary">Touch</span></h3>
            <p class="text-muted mt-2">
              Please fill out the following form and we will get back to you
              shortly. For more <br />information please contact us.
            </p>
          </div>
        </div>
      </div>

      <div class="row align-items-center mt-3">
        <div class="col-md-4">
          <p class="text-muted">
            <span class="fw-bold">Customer Support:</span><br />
            <span class="d-block mt-1">+1 234 56 7894</span>
          </p>
          <p class="text-muted mt-4">
            <span class="fw-bold">Email Address:</span><br />
            <span class="d-block mt-1">info@gmail.com</span>
          </p>
          <p class="text-muted mt-4">
            <span class="fw-bold">Office Address:</span><br />
            <span class="d-block mt-1">4461 Cedar Street Moro, AR 72368</span>
          </p>
          <p class="text-muted mt-4">
            <span class="fw-bold">Office Time:</span><br />
            <span class="d-block mt-1">9:00AM To 6:00PM</span>
          </p>
        </div>

        <div class="col-md-8">
          <form>
            <div class="row mt-4">
              <div class="col-lg-6">
                <div class="mb-2">
                  <label for="fullname" class="form-label">Your Name</label>
                  <input class="form-control form-control-light" type="text" id="fullname" placeholder="Name..." />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-2">
                  <label for="emailaddress" class="form-label">Your Email</label>
                  <input class="form-control form-control-light" type="email" required="" id="emailaddress" placeholder="Enter you email..." />
                </div>
              </div>
            </div>

            <div class="row mt-1">
              <div class="col-lg-12">
                <div class="mb-2">
                  <label for="subject" class="form-label">Your Subject</label>
                  <input class="form-control form-control-light" type="text" id="subject" placeholder="Enter subject..." />
                </div>
              </div>
            </div>

            <div class="row mt-1">
              <div class="col-lg-12">
                <div class="mb-2">
                  <label for="comments" class="form-label">Message</label>
                  <textarea id="comments" rows="4" class="form-control form-control-light" placeholder="Type your message here..."></textarea>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12 text-end">
                <button class="btn btn-primary">
                  Send a Message <i class="mdi mdi-telegram ms-1"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- END CONTACT -->

  <!-- START FOOTER -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <!-- <img
              src="../assets/images/logo.png"
              alt=""
              class="logo-dark"
              height="18"
            /> -->
          <a href="index.html" class="navbar-brand me-lg-5"> E-MAP </a>
          <p class="text-muted mt-4">
            Hyper makes it easier to build better websites with <br />
            great speed. Save hundreds of hours of design <br />
            and development by using it.
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
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Documentation</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Blog</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Affiliate Program</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-2 mt-3 mt-lg-0">
          <h5 class="text-light">Apps</h5>

          <ul class="list-unstyled ps-0 mb-0 mt-3">
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Ecommerce Pages</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Email</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Social Feed</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Projects</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Tasks Management</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-2 mt-3 mt-lg-0">
          <h5 class="text-light">Discover</h5>

          <ul class="list-unstyled ps-0 mb-0 mt-3">
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Help Center</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Our Products</a>
            </li>
            <li class="mt-2">
              <a href="javascript: void(0);" class="text-muted">Privacy</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="mt-5">
            <p class="text-muted mt-4 text-center mb-0">
              © 2018 - 2021 Hyper. Design and coded by Coderthemes
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