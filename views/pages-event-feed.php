<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h4 class="page-title">Event Feed</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- start news feeds -->
                        <div class="card">
                            <div class="card-body pb-1">
                                <div class="d-flex">
                                    <img class="me-2 rounded" src="../assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <div class="dropdown float-end text-muted">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                        <p class="text-muted"><small>about 2 minuts ago <span class="mx-1">⚬</span> <span>Public</span></small></p>
                                    </div>
                                </div>

                                <hr class="m-0">

                                <div class="font-16 text-center text-dark my-3">
                                    <i class="mdi mdi-format-quote-open font-20"></i> Leave one wolf alive and the sheep are never safe. When people ask you
                                    what happened here, tell them the North remembers. Tell them winter came for
                                    House Frey.
                                </div>

                                <hr class="m-0">

                                <div class="my-1">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted ps-0"><i class='mdi mdi-heart text-danger'></i> 2k Likes</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class='uil uil-comments-alt'></i> 200 Comments</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class='uil uil-share-alt'></i> Share</a>
                                </div>

                                <hr class="m-0">

                                <div class="mt-3">
                                    <div class="d-flex">
                                        <img class="me-2 rounded" src="../assets/images/users/avatar-9.jpg" alt="Generic placeholder image" height="32">
                                        <div>
                                            <h5 class="m-0">Sansa Stark </h5>
                                            <p class="text-muted mb-0"><small>2 mins ago</small></p>

                                            <p class="my-1">This is awesome! Proud of sis :) Waiting for you to
                                                come back to winterfall</p>

                                            <div>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted p-0">
                                                    <i class='uil uil-heart me-1'></i> Like
                                                </a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted p-0 ps-2">
                                                    <i class='uil uil-comments-alt me-1'></i> Reply
                                                </a>
                                            </div>

                                            <div class="d-flex mt-3">
                                                <img class="me-2 rounded" src="../assets/images/users/avatar-8.jpg" alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Cersei Lannister </h5>
                                                    <p class="text-muted mb-0"><small>1 min ago</small></p>

                                                    <p class="my-1">I swear! She won't be able to reach to winterfall</p>
                                                </div>
                                            </div> <!-- end d-flex-->
                                        </div> <!-- end div -->
                                    </div> <!-- end d-flex-->

                                    <hr>

                                    <div class="d-flex mb-2">
                                        <img src="../assets/images/users/avatar-1.jpg" height="32" class="align-self-start rounded me-2" alt="Arya Stark">
                                        <div class="w-100">
                                            <input type="text" class="form-control border-0 form-control-sm" placeholder="Write a comment">
                                        </div> <!-- end w-100 -->
                                    </div> <!-- end d-flex -->

                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>

                </div> <!-- container -->


            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    <?php include '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php include '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>