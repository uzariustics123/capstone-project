<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <?php include '../includes/sidebar.php' ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include '../includes/topbar.php' ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item "><a href="pages-my-organization.php?id=<?= $organization_id ?>">My Organization</a></li>
                                        <li class="breadcrumb-item"><a href="pages-my-department.php?user_id=<?= $user_id ?>&org_id=<?= $organization_id ?>&dept_id=<?= $department_id ?>">My Department</a></li>
                                        <li class="breadcrumb-item disabled"><a href="pages-my-organization.php?id=<?= $organization_id ?>">Add Event</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Event Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="event-name" class="form-label">Event Name</label>
                                            <input type="text" id="event-name" name="event-name" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="event-description" class="form-label">Event Desciption</label>
                                            <textarea class="form-control" id="event-description" name="event-description" rows="5"></textarea>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Text area</label>
                                            <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                        </div>


                                        <div class="mb-3">
                                            <label for="organizer-select" class="form-label">Add Organizer</label>
                                            <select class="form-control selectpicker" name="organizer-select" id="organizer-select" multiple data-live-search=true>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="event-date" class="form-label"> Event Date</label>
                                            <input class="form-control" name="event-date" id="event-date" type="date" name="date">
                                        </div>

                                        <div class="mb-3">
                                            <label for="event-start-time" class="form-label">Start Time</label>
                                            <input class="form-control" name="event-start-time" id="example-start-time" type="time" name="time">
                                        </div>
                                        <div class="mb-3">
                                            <label for="event-end-time" class="form-label">End Time</label>
                                            <input class="form-control" name="event-end-time" id="example-end-time" type="time" name="time">
                                        </div>

                                        <div class="mb-3">
                                            <label for="attendance-duration-select" class="form-label">Attendance Duration (mins)</label>
                                            <select class="form-select" name="attendance-duration-select" id="attendance-duration-select">
                                                <option>15</option>
                                                <option>20</option>
                                                <option>25</option>
                                                <option>30</option>

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="event-duration-select" name="event-duration-select">
                                                <label class=" form-check-label" for="customSwitch1">Toggle this switch if event is whole day</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Primary</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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