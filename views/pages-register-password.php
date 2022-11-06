<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Signup | Events Management Application System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
                                    Create Password
                                </h4>
                                <p class="text-muted mb-4">
                                    Don't have an account? Create your account, it takes less
                                    than a minute
                                </p>
                            </div>
                            <form action="../controllers/register.password.ctrls.php" method="post">
                                <?php
                                if (isset($_GET["id"]) && $_GET["email"]) {
                                    $user_id = $_GET["id"];
                                    $email = $_GET["email"];
                                }
                                ?>
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <input type="hidden" name="email" value="<?= $email ?>">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" placeholder required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm-password" class="form-control" placeholder="Confirm password" name="confirm-password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="terms_conditions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Terms and Conditions</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h1>Privacy Policy for Events Management Application System</h1>

                                                <p>At Events Management Application, accessible from www.emapp.com.ph, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Events Management Application and how we use it.</p>

                                                <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us. Our Privacy Policy was created with the help of the <a href="https://www.generateprivacypolicy.com/">Privacy Policy Generator</a>.</p>

                                                <h2>Log Files</h2>

                                                <p>Events Management Application follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

                                                <h2>Cookies and Web Beacons</h2>

                                                <p>Like any other website, Events Management Application uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>

                                                <h2>Google DoubleClick DART Cookie</h2>

                                                <p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>

                                                <h2>Our Advertising Partners</h2>

                                                <p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>

                                                <ul>
                                                    <li>
                                                        <p>Google</p>
                                                        <p><a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>
                                                    </li>
                                                </ul>

                                                <h2>Privacy Policies</h2>

                                                <P>You may consult this list to find the Privacy Policy for each of the advertising partners of Events Management Application.</p>

                                                <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Events Management Application, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                                                <p>Note that Events Management Application has no access to or control over these cookies that are used by third-party advertisers.</p>

                                                <h2>Third Party Privacy Policies</h2>

                                                <p>Events Management Application's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

                                                <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?</p>

                                                <h2>Children's Information</h2>

                                                <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                                                <p>Events Management Application does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

                                                <h2>Online Privacy Policy Only</h2>

                                                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Events Management Application. This policy is not applicable to any information collected offline or via channels other than this website.</p>

                                                <h2>Consent</h2>

                                                <p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signup" required />
                                        <label class="form-check-label" for="checkbox-signup">I accept
                                            <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#terms_conditions">Terms and Conditions</a></label>
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