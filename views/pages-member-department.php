<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <div class="wrapper">
        <?php include '../includes/sidebar.php' ?>
        <div class="content-page">
            <div class="content">
                <?php include '../includes/topbar.php' ?>
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">My Department</h4>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mb-3 d-grid">
                            <a class="btn btn-lg font-16 btn-danger" href="#events">
                                <i class="mdi mdi-plus-circle-outline"></i> View Events
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mb-3 d-grid">
                            <a class="btn btn-lg font-16 btn-success" href="#members-list">
                                <i class="mdi mdi-plus-circle-outline"></i> View Members
                            </a>
                        </div>
                    </div>


                    <?php
                    $department_id = $_GET['dept_id'];
                    $query = "SELECT * FROM departments WHERE department_id = $department_id;";
                    $results = $conn->query($query);
                    while ($row = $results->fetch_assoc()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                    <img src="<?= $row['dept_imgurl'] ?>" class="img-fluid" style="max-width: 380px;" alt="Product-img">
                                                </a>
                                            </div> <!-- end col -->
                                            <div class="col-lg-7">
                                                <form class="ps-lg-4">
                                                    <!-- Product title -->
                                                    <h2 class="mt-0"><?= $row['dept_name'] ?></h2>
                                                    <p class="mb-1">Date Created: <?= $row['date_created'] ?></p>
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten"><?= $row['dept_code'] ?></span></h4>
                                                    </div>

                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Description:</h6>
                                                        <p><?= $row['dept_description'] ?> </p>
                                                    </div>
                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    <?php } ?>
                    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myCenterModalLabel">Add Event Details</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <form action="../controllers/add.event.ctrls.php" method="post" enctype="multipart/form-data">
                                                    <?php
                                                    $organization_id = $_GET['org_id'];
                                                    $department_id = $_GET['dept_id'];
                                                    if (isset($_SESSION['importer_id'])) {
                                                        $importer_id = $_SESSION['importer_id'];
                                                    } else {
                                                        $importer_id = 0;
                                                    }
                                                    $usertype = $_SESSION['usertype'];
                                                    ?>
                                                    <input type="hidden" name="user-id" value=<?= $user; ?>>
                                                    <input type="hidden" name="organization-id" value=<?= $organization_id; ?>>
                                                    <input type="hidden" name="department-id" value=<?= $department_id; ?>>
                                                    <input type="hidden" name="importer-id" value=<?= $importer_id; ?>>
                                                    <input type="hidden" name="usertype" value=<?= $usertype; ?>>
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
                                                            <label for="event-date" class="form-label"> Event Date</label>
                                                            <input class="form-control" name="event-date" id="event-date" type="date" name="date">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="event-start-time" class="form-label">Start Time</label>
                                                            <input class="form-control" name="event-start" id="example-start-time" type="time" name="time">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="event-end-time" class="form-label">End Time</label>
                                                            <input class="form-control" name="event-end" id="example-end-time" type="time" name="time">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="attendance-duration-select" class="form-label">Attendance Duration (mins)</label>
                                                            <select class="form-select" name="attendance-duration-select" id="attendance-duration-select">
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                                <option value="30">30</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input" id="all-day" name="all-day">
                                                                <label class=" form-check-label" for="customSwitch1">Toggle this switch if event is whole day</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <div class="modal fade" id="update-profile" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <?php
                                        $query = "SELECT * FROM members WHERE member_id = $user;";
                                        $results = $conn->query($query);
                                        while ($row = $results->fetch_assoc()) {
                                        ?>
                                            <form action="../controllers/edit.profile.ctrls.php" method="post" enctype="multipart/form-data">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Wizard With Progress Bar</h4>
                                                        <div class="edit-profile-custom">
                                                            <div id="progressbarwizard">
                                                                <input type="hidden" name="user_id" value="<?= $user ?>">
                                                                <input type="hidden" name="org_id" value="<?= $row['organization_id'] ?>">
                                                                <input type="hidden" name="dept_id" value="<?= $row['department_id'] ?>">
                                                                <input type="hidden" name="temp_pass" value="<?= $temp_pass ?>">
                                                                <input type="hidden" name="usertype" value="<?= $usertype ?>">
                                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                                    <li class="nav-item">
                                                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-account-circle me-1"></i>
                                                                            <span class="d-none d-sm-inline">Account</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-face-profile me-1"></i>
                                                                            <span class="d-none d-sm-inline">Profile</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#finish-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                                            <span class="d-none d-sm-inline">Finish</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                                <div class="tab-content b-0 mb-0">

                                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                                    </div>

                                                                    <div class="tab-pane" id="account-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="password">Create New Password</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="password" id="password" name="password" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="confirm">Confirm New Password</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="password" id="confirm" name="confirm" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>

                                                                    <div class="tab-pane" id="profile-tab-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="firstname"> First Name</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $row['firstname'] ?>" data-firstname="<?= $row['firstname'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="lastname"> Last Name</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $row['lastname'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="image"> Image</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="file" id="image" name="image" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>

                                                                    <div class="tab-pane" id="finish-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="text-center">
                                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                                    <div class="mb-3">
                                                                                        <div class="form-check d-inline-block">
                                                                                            <input type="checkbox" class="form-check-input" id="customCheck3" required>
                                                                                            <label class="form-check-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                                                                        </div>
                                                                                        <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                                            mattis dictum aliquet.</p>
                                                                                    </div>
                                                                                    <button name="submit" id="edit-profile" class="btn btn-primary">Submit</button>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>

                                                                    <ul class="list-inline mb-0 wizard">
                                                                        <li class="previous list-inline-item">
                                                                            <a href="#" class="btn btn-info">Previous</a>
                                                                        </li>
                                                                        <li class="next list-inline-item float-end">
                                                                            <a href="#" class="btn btn-info">Next</a>
                                                                        </li>
                                                                    </ul>

                                                                </div> <!-- tab-content -->
                                                            </div> <!-- end #progressbarwizard-->
                                                        </div>

                                                    </div> <!-- end card-body -->
                                                </div> <!-- end card-->
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div> <!-- end card-->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->

                    <section class="container-fluid" id="events">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Events
                                        <?php
                                        $query = "SELECT * FROM members WHERE member_id = $member_id AND usertype = 'Organizer';";
                                        $results = $conn->query($query);
                                        while ($row = $results->fetch_assoc()) {
                                        ?>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#centermodal" class="btn btn-success btn-sm ms-3">Add New Event</a>
                                        <?php } ?>
                                    </h4>
                                </div>
                            </div>
                        </div>


                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="board">
                                    <div class="tasks">
                                        <h5 class="mt-0 task-header">FOR APPROVAL (1)</h5>
                                        <div id="task-list-one" class="task-list-items">
                                            <!-- Task Item -->

                                            <?php
                                            $organization_id = $_GET['org_id'];
                                            $department_id = $_GET['dept_id'];
                                            $query = "SELECT * FROM events WHERE organization_id = $organization_id AND department_id = $department_id AND status = 'Pending';";
                                            $results = $conn->query($query);
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <!-- Date Created -->
                                                        <small class="float-end text-muted"><?= $row['date_created'] ?></small>
                                                        <span class="badge bg-danger"><?= $row['status'] ?></span>

                                                        <h5 class="mt-2 mb-2">
                                                            <!-- Event Name -->
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                        </h5>
                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-check-outline text-muted"></i>
                                                                Confirmed
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-clock-outline text-muted"></i>
                                                                <b>74</b> Unconfirmed
                                                            </span>
                                                        </p>
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <!-- item-->
                                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                                <!-- item-->
                                                                <a href="javascript:void(0);" class="dropdown-item" id="delete-event" data-org_id=<?= $organization_id ?> data-dept_id=<?= $row['department_id'] ?> data-user_id=<?= $row['user_id'] ?> data-event_id=<?= $row['event_id'] ?> data-usertype=<?= $usertype ?>><i class="mdi mdi-delete me-1"></i>Delete</a>

                                                            </div>
                                                        </div>
                                                        <p class="mb-0">
                                                            <img src="../assets/images/users/avatar-2.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Robert Carlile</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->
                                            <?php } ?>
                                        </div> <!-- end company-list-1-->
                                    </div>
                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">APPROVED</h5>
                                        <div id="task-list-two" class="task-list-items">

                                            <?php
                                            $organization_id = $_GET['org_id'];
                                            $department_id = $_GET['dept_id'];
                                            $query = "SELECT * FROM events WHERE organization_id = $organization_id AND department_id = $department_id AND status = 'Approved';";
                                            $results = $conn->query($query);
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted"><?= $row['date_created'] ?></small>
                                                        <span class="badge bg-success"><?= $row['status'] ?></span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                        </h5>
                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                                CRM
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                                <b>48</b> Comments
                                                            </span>
                                                        </p>


                                                        <p class="mb-0">
                                                            <img src="../assets/images/users/avatar-6.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Louis Allen</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->
                                            <?php } ?>
                                        </div> <!-- end company-list-2-->
                                    </div>
                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">UPCOMING (1)</h5>
                                        <div id="task-list-three" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">22 Jul 2018</small>
                                                    <span class="badge bg-danger">High</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Improve animation loader</a>
                                                    </h5>
                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>39</b> Comments
                                                        </span>
                                                    </p>
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">
                                                        <img src="../assets/images/users/avatar-4.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                        <span class="align-middle">Riley Steele</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                        </div> <!-- end company-list-3-->
                                    </div>
                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">Done (1)</h5>
                                        <div id="task-list-four" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">16 Jul 2018</small>
                                                    <span class="badge bg-success">Low</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Dashboard design</a>
                                                    </h5>
                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            Hyper
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>287</b> Comments
                                                        </span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <img src="../assets/images/users/avatar-10.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                        <span class="align-middle">Harvey Dickinson</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                        </div> <!-- end company-list-4-->
                                    </div>
                                </div> <!-- end .board-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </section>
                </div>
                <!-- Center modal -->
            </div>
        </div>

    </div>
    <?php include '../includes/endbar.php' ?>
    <div class="rightbar-overlay"></div>
    <?php include '../includes/footer.php'; ?>
<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
unset($_SESSION['temp_pass']);
?>