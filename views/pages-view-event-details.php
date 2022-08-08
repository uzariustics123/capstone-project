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

                                <h4 class="page-title">Event Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php

                    $event_id = $_GET['event_id'];
                    $query = "SELECT * FROM events WHERE event_id = $event_id;";
                    $results = $conn->query($query);
                    while ($row = $results->fetch_assoc()) {
                    ?>
                        <div class="row">
                            <div class="col-xxl-8 col-xl-7">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='uil uil-ellipsis-h'></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">

                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    <i class='uil uil-edit me-1'></i>Edit
                                                </a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item" id="approve-event" data-org_id=<?= $row['organization_id'] ?> data-dept_id=<?= $row['department_id'] ?> data-user_id=<?= $row['user_id'] ?> data-event_id=<?= $row['event_id'] ?>>
                                                    <i class='uil uil-file-copy-alt me-1'></i>Approve Event
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                    <i class='uil uil-trash-alt me-1'></i>Delete
                                                </a>
                                            </div> <!-- end dropdown menu-->
                                        </div> <!-- end dropdown-->



                                        <h2 class="mt-2"><?= $row['event_name'] ?></h2>

                                        <h5 class="mt-3">Description:</h5>

                                        <p class="text-muted mb-4">
                                            <?= $row['event_description'] ?>
                                        </p>

                                        <div class="row">
                                            <div class="col-4">
                                                <!-- assignee -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Location</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-location font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            PE Academic Building
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end assignee -->
                                            </div> <!-- end col -->

                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event Start</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $row['event_start'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event End</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $row['event_end'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-4">
                                                <!-- assignee -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Status</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-sync font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $row['status'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end assignee -->
                                            </div> <!-- end col -->

                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Is the event all day?</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-cloud-sun font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            Yes
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Attendance Duration</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-stopwatch font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $row['attendance_duration'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                        </div>


                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    <?php } ?>
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