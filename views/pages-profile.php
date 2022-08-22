<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <?php
    $department_id = $_GET['department_id'];
    ?>
    <!-- Begin page -->
    <div class="wrapper">
        <?php include '../includes/sidebar.php' ?>
        <div class="content-page">
            <?php include '../includes/topbar.php' ?>
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row mt-3">
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <?php
                                $query = "SELECT * FROM users WHERE userid = $user;";
                                $results = $conn->query($query);
                                $row = $results->fetch_assoc();
                                if (!empty($row)) {
                                ?>

                                    <!-- Standard modal -->
                                    <div id="organization_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <form action="../controllers/edit.profile.ctrls.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update Profile</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-2">
                                                            <input type="hidden" name="user_id" value="<?= $user ?>">

                                                            <div class="mb-3 col-md-6">
                                                                <label for="firstname" class="form-label">Firstname</label>
                                                                <input type="text" value="<?= $row['firstname'] ?>" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="lastname" class="form-label">Lastname</label>
                                                                <input type="text" value="<?= $row['lastname'] ?>" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" name="image" class="form-control" id="image" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </form>
                                    </div><!-- /.modal -->

                                    <div class="card-body text-center">

                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-gear"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#organization_modal"> <i class="mdi mdi-square-edit-outline me-1"></i>Edit Profile</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changepass"> <i class="mdi mdi-lock-alert-outline me-1"></i>Change Password</a>
                                            </div>
                                        </div>

                                        <img src="<?php if (is_null($row['photourl'])) {
                                                        echo '../assets/images/users/avatar-1.jpg';
                                                    } else {
                                                        echo $row['photourl'];
                                                    }
                                                    ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" />

                                        <h4 class="mb-0 mt-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h4>
                                        <p class="text-muted font-14">Administrator</p>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">
                                            </p>
                                            <p class="text-muted mb-2 font-13">
                                                <strong>Full Name :</strong>
                                                <span class="ms-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Email :</strong>
                                                <span class="ms-2"><?= $row['email'] ?></span>
                                            </p>

                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Generate QR Code</button>
                                    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">
                                                <div class="text-center mt-2">
                                                    <img src="<?php if (is_null($row['photourl'])) {
                                                                    echo '../assets/images/users/avatar-1.jpg';
                                                                } else {
                                                                    echo $row['photourl'];
                                                                }
                                                                ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" />
                                                    <h4><?= $row['firstname'] ?> <?= $row['lastname'] ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <?php
                                                        include "../assets/phpqrcode/qrlib.php";
                                                        $PNG_TEMP_DIR = '../assets/images/temp/';
                                                        if (!file_exists($PNG_TEMP_DIR))
                                                            mkdir($PNG_TEMP_DIR);
                                                        $filename = $PNG_TEMP_DIR . 'test.png';
                                                        $codeString = $user;
                                                        $hexed = $codeString . $row['firstname'] . $row['lastname'];
                                                        $filename = $PNG_TEMP_DIR . 'test' . md5($hexed) . '.png';
                                                        QRcode::png($hexed, $filename);
                                                        $file = $PNG_TEMP_DIR . basename($filename);
                                                        ?>
                                                        <?= '<img src="' . $file . '" alt="" height="200">'; ?>
                                                        <button type="button" id="deleteqr" class="btn btn-success my-2" data-bs-dismiss="modal" data-image="<?= $file ?>">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <?php if (isset($department_id)) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Event Records</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="board">
                                        <div class="tasks" data-plugin="dragula" data-containers='["task-list-one", "task-list-two", "task-list-three", "task-list-four"]'>
                                            <h5 class="mt-0 task-header">UNCONFIRMED</h5>
                                            <div id="task-list-one" class="task-list-items">
                                                <?php
                                                $query = "SELECT * FROM EVENTS
                                                            RIGHT OUTER JOIN participants ON participants.event_id = events.event_id
                                                            RIGHT OUTER JOIN members ON participants.member_reference_id = members.member_id
                                                            WHERE member_reference_id = $member_id AND participant_status = 'pending' ORDER BY event_date ASC;";
                                                $results = $conn->query($query);
                                                while ($row = $results->fetch_assoc()) {
                                                ?>

                                                    <div class="card mb-0">

                                                        <div class="card-body p-3">

                                                            <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                            <span class="badge bg-success"><?= $row['event_status'] ?></span>
                                                            <h2 class="mt-2 mb-2">

                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                                </h3>
                                                                <p><?= $row['event_description'] ?></p>
                                                                <p class="mb-0">
                                                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                        <i class="mdi mdi-account-check-outline text-muted"></i>
                                                                        Confirmed
                                                                        <?= $member_id ?>
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

                                                                        <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>

                                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">
                                                                    <img src="../assets/images/users/avatar-2.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                                    <span class="align-middle">Robert Carlile</span>
                                                                </p>
                                                        </div> <!-- end card-body -->
                                                    </div>
                                                <?php }
                                                ?>

                                            </div> <!-- end company-list-1-->
                                        </div>

                                        <div class="tasks">
                                            <h5 class="mt-0 task-header text-uppercase">Confirmed</h5>

                                            <div id="task-list-two" class="task-list-items">

                                                <!-- Task Item -->
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">22 Jun 2018</small>
                                                        <span class="badge bg-secondary text-light">Medium</span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Write a release note</a>
                                                        </h5>

                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                                Hyper
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                                <b>17</b> Comments
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
                                                            <img src="assets/images/users/avatar-5.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Sean White</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

                                                <!-- Task Item -->
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">19 Jun 2018</small>
                                                        <span class="badge bg-success">Low</span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Enable analytics tracking</a>
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
                                                            <img src="assets/images/users/avatar-6.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Louis Allen</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

                                            </div> <!-- end company-list-2-->
                                        </div>


                                        <div class="tasks">
                                            <h5 class="mt-0 task-header text-uppercase">Attended</h5>
                                            <div id="task-list-three" class="task-list-items">

                                                <!-- Task Item -->
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">2 May 2018</small>
                                                        <span class="badge bg-danger">High</span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Kanban board design</a>
                                                        </h5>

                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                                CRM
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                                <b>65</b> Comments
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
                                                            <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Coder Themes</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

                                                <!-- Task Item -->
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">7 May 2018</small>
                                                        <span class="badge bg-secondary text-light">Medium</span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Code HTML email template</a>
                                                        </h5>

                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                                CRM
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                                <b>106</b> Comments
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
                                                            <img src="assets/images/users/avatar-9.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Zak Turnbull</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

                                                <!-- Task Item -->
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">8 Jul 2018</small>
                                                        <span class="badge bg-secondary text-light">Medium</span>

                                                        <h5 class="mt-2 mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Brand logo design</a>
                                                        </h5>

                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                                Design
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                                <b>95</b> Comments
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
                                                            <img src="assets/images/users/avatar-8.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Lily Parkin</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

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
                                                            <img src="assets/images/users/avatar-4.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle">Riley Steele</span>
                                                        </p>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <!-- Task Item End -->

                                            </div> <!-- end company-list-3-->
                                        </div>

                                        <div class="tasks">
                                            <h5 class="mt-0 task-header text-uppercase">Attended and Evaluated</h5>
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
                                                            <img src="assets/images/users/avatar-10.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
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
                        <?php } ?>
                    </div>

                </div>
                <!-- container -->
            </div>
        <?php } ?>
        </div>
    </div>
    <?php include '../includes/endbar.php' ?>
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->
    <script src="../assets/js/customscript.js"></script>
    <?php include '../includes/footer.php'; ?>
<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>