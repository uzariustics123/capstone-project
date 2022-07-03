<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>

    <!-- Begin page -->
    <div class="wrapper">

        <?php include '../includes/sidebar.php' ?>
        <!-- Begin page -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <?php include '../includes/topbar.php' ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row mt-3">
                        <div class="col-xl-6 col-lg-7">
                            <div class="card text-center">
                                <div class="card-body">
                                    <?php
                                    $user = $_SESSION['userid'];
                                    include_once('../config/db.php');
                                    $query = "SELECT * FROM users WHERE user_id = $user;";
                                    $results = $conn->query($query);
                                    while ($row = $results->fetch_row()) {
                                    ?>
                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-gear"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-department-modal" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit Profile</a>
                                            </div>
                                        </div>
                                        <img src="../assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" />

                                        <h4 class="mb-0 mt-2"><?php echo $row[1] ?> <?php echo $row[2] ?></h4>
                                        <p class="text-muted font-14">Administrator</p>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">
                                                <?php echo $row[6] ?>
                                            </p>
                                            <p class="text-muted mb-2 font-13">
                                                <strong>Full Name :</strong>
                                                <span class="ms-2"><?php echo $row[1] ?> <?php echo $row[2] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Mobile :</strong><span class="ms-2"><?php echo $row[8] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Email :</strong>
                                                <span class="ms-2"><?php echo $row[4] ?></span>
                                            </p>
                                            <p class="text-muted mb-1 font-13">
                                                <strong>Location :</strong>
                                                <span class="ms-2"><?php echo $row[7] ?></span>
                                            </p>
                                        </div>

                                        <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="<?php echo $row[9] ?>" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"> </i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="<?php echo $row[10] ?>" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="<?php echo $row[11] ?>" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="<?php echo $row[12] ?>" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="<?php echo $row[13] ?>" class="social-list-item border-warning text-warning"><i class="mdi mdi-instagram"></i></a>
                                            </li>
                                        </ul>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
        <?php
                                    }
        ?>


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <?php include '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->
    <script src="../assets/js/customscript.js"></script>

    <?php include '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>