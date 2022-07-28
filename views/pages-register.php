<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />

  <!-- App css -->
  <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
  <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
  <script src="../assets/js/sweetalert2.min.js"></script>
</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

  <?php if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    echo "<span>$status</span>";
  } ?>

  <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
          <div class="card">

            <!-- Logo-->
            <div class="card-header pt-4 pb-4 text-center bg-primary">
              <a href="index.html">
                <span><img src="../assets/images/logo.png" alt="" height="18" /></span>
              </a>
            </div>

            <div class="card-body p-4">
              <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center mt-0 fw-bold">
                  Sign Up
                </h4>
                <p class="text-muted mb-4">
                  Don't have an account? Create your account, it takes less
                  than a minute
                </p>
              </div>

              <form action="../controllers/signup.ctrls.php" method="post">
                <div class="mb-3">
                  <label for="firstname" class="form-label">First Name</label>
                  <input class="form-control" type="text" id="firstname" placeholder="Enter your first name" name="firstname" required />
                </div>
                <div class="mb-3">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input class="form-control" type="text" id="lastname" placeholder="Enter your last name" name="lastname" required />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">UserName</label>
                  <input class="form-control" type="text" id="username" placeholder="Enter your username" name="username" required />
                </div>

                <div class="mb-3">
                  <label for="emailaddress" class="form-label">Email address</label>
                  <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="email" required />
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required />
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="repeat_password" class="form-label">Repeat Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="repeat_password" class="form-control" placeholder="Repeat Password" name="repeat_password" required />
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Terms and Conditions</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                      </div>
                      <div class="modal-body">

                        <h3>Privacy Policy for Event Manager</h3>

                        <p>At Eventmanger, accessible from Eventmanager.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Eventmanger and how we use it.</p>

                        <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

                        <p>This Privacy Policy applies only to our online activities and is valid for visitors to our application with regards to the information that they shared and/or collect in Eventmanger. This policy is not applicable to any information collected offline or via channels other than this application. Our Privacy Policy was created with the help of the <a href="https://www.generateprivacypolicy.com/">Free Privacy Policy Generator</a>.</p>

                        <h4>Consent</h4>

                        <p>By using our application, you hereby consent to our Privacy Policy and agree to its terms.</p>

                        <h4>Information we collect</h4>

                        <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                        <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
                        <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

                        <h4>How we use your information</h4>

                        <p>We use the information we collect in various ways, including to:</p>

                        <ul>
                          <li>Provide, operate, and maintain our application/website</li>
                          <li>Improve, personalize, and expand our application/website</li>
                          <li>Understand and analyze how you use our application/website</li>
                          <li>Develop new products, services, features, and functionality</li>
                          <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the application or website, and for marketing and promotional purposes</li>
                          <li>Send you emails</li>
                          <li>Find and prevent fraud</li>
                        </ul>

                        <h4>Log Files</h4>

                        <p>Eventmanger follows a standard procedure of using log files. These files log visitors when they visit websites or applications. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the application, tracking users' movement on the application, and gathering demographic information.</p>

                        <h4>Cookies and Web Beacons</h4>

                        <p>Like any other website/application, Eventmanger uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website/application that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>

                        <p>For more general information on cookies, please read <a href="https://www.generateprivacypolicy.com/#cookies">the Cookies article on Generate Privacy Policy website</a>.</p>

                        <h4>Google DoubleClick DART Cookie</h4>

                        <p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>

                        <h4>Our Advertising Partners</h4>

                        <p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>

                        <ul>
                          <li>
                            <p>Google</p>
                            <p><a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>
                          </li>
                        </ul>

                        <h4>Advertising Partners Privacy Policies</h4>

                        <P>You may consult this list to find the Privacy Policy for each of the advertising partners of Eventmanger.</p>

                        <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Eventmanger, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                        <p>Note that Eventmanger has no access to or control over these cookies that are used by third-party advertisers.</p>

                        <h4>Third Party Privacy Policies</h4>

                        <p>Eventmanger's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

                        <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>

                        <h4>CCPA Privacy Rights (Do Not Sell My Personal Information)</h4>

                        <p>Under the CCPA, among other rights, California consumers have the right to:</p>
                        <p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                        <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
                        <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                        <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                        <h4>GDPR Data Protection Rights</h4>

                        <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
                        <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
                        <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
                        <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
                        <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
                        <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
                        <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
                        <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                        <h4>Children's Information</h4>

                        <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                        <p>Eventmanger does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox-signup" required />
                    <label class="form-check-label" for="checkbox-signup">I accept
                      <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Terms and Conditions</a></label>
                  </div>
                </div>

                <div class="mb-3 text-center">
                  <button class="btn btn-primary" type="submit" name="submit">
                    Sign Up
                  </button>
                </div>

              </form>
            </div>
            <!-- end card-body -->
          </div>
          <!-- end card -->

          <div class="row mt-3">
            <div class="col-12 text-center">
              <p class="text-muted">
                Already have account?
                <a href="pages-login.php" class="text-muted ms-1"><b>Log In</b></a>
              </p>
            </div>
            <!-- end col-->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->



  <!-- bundle -->
  <script src="../assets/js/vendor.min.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <!-- end demo js-->
</body>

</html>
<?php unset($_SESSION['status']); ?>