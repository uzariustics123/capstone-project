<?php
if (isset($_GET['participant_id'])) {
    $participant_id = $_GET['participant_id'];
}
require_once './config/db.php';
require_once './controllers/functions.ctrls.php';
?>
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
                        <?php
                        $unhashed = base64_decode($participant_id);
                        $query = "SELECT * FROM EVENTS
                        RIGHT OUTER JOIN participants ON participants.`event_id` = events.`event_id`
                        WHERE participants.`participant_id` = $unhashed";
                        $results = $conn->query($query);
                        $row = $results->fetch_assoc();
                        ?>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto mb-3">
                                <h4 class="text-center mt-0 fw-bold">
                                    You have been invited to attend.
                                </h4>
                                <h2>
                                    <?= $row['event_name'] ?>
                                </h2>
                            </div>

                            <div class="row">
                                <a href="./confirm.attendance.php?participant_id=<?= $unhashed ?>" class="btn btn-primary">Accept Invite</a>
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