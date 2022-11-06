<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Signup | Events Management Application System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="./assets/images/favicon.ico" />

    <!-- App css -->
    <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="./assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="./assets/js/sweetalert2.min.js"></script>
</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="./assets/images/logo.png" alt="" height="18" /></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h2 class="text-dark-50 text-center mt-0 fw-bold">
                                    Attendance Confirmed
                                </h2>
                            </div>
                            <div class="row">
                                <h2 class="text-dark-50 text-center mt-0 fw-bold">
                                    <i>✅</i>
                                </h2>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->



    <!-- bundle -->
    <script src="./assets/js/vendor.min.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <!-- end demo js-->
</body>

</html>
<?php unset($_SESSION['status']); ?>