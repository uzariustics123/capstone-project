<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

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
                                                        $codeString = bin2hex($user);
                                                        $hexed = $codeString;
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
                        <?php if ($usertype != 'admin') { ?>
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
                                                            <span class="badge bg-warning"><?= $row['participant_status'] ?></span>
                                                            <h2 class="mt-2 mb-2">

                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                                </h3>
                                                                <p><?= $row['event_description'] ?></p>
                                                                <div class="text-center">
                                                                    <a class="btn btn-primary confirm_attendance" name='submit' type="submit" href="javascript:void(0)" data-participant_id="<?= $row['participant_id'] ?>" data-event_id="<?= $row['event_id'] ?>">Confirm</a>
                                                                </div>
                                                                <div class="dropdown float-end">
                                                                    <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical font-18"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>
                                                                    </div>
                                                                </div>
                                                        </div> <!-- end card-body -->
                                                    </div>
                                                <?php }
                                                ?>

                                            </div> <!-- end company-list-1-->
                                        </div>

                                        <div class="tasks">
                                            <h5 class="mt-0 task-header text-uppercase">Confirmed</h5>

                                            <div id="task-list-two" class="task-list-items">
                                                <?php
                                                $query = "SELECT * FROM EVENTS
                                                            RIGHT OUTER JOIN participants ON participants.event_id = events.event_id
                                                            RIGHT OUTER JOIN members ON participants.member_reference_id = members.member_id
                                                            WHERE member_reference_id = $member_id 
                                                            AND participant_status = 'confirmed'
                                                            ORDER BY event_date ASC;";
                                                $results = $conn->query($query);
                                                while ($row = $results->fetch_assoc()) {
                                                    $now = date('Y-m-d');
                                                    $newdate = date("M d, Y", strtotime($now));
                                                    $event_date = $row['event_date'];
                                                    if ($event_date >= $newdate) {
                                                ?>

                                                        <div class="card mb-0">
                                                            <div class="card-body p-3">

                                                                <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                                <span class="badge bg-success"><?= $row['participant_status'] ?></span>
                                                                <h2 class="mt-2 mb-2">

                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                                    </h3>
                                                                    <p><?= $row['event_description'] ?></p>
                                                                    <div class="dropdown float-end">
                                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>
                                                                        </div>
                                                                    </div>
                                                            </div> <!-- end card-body -->
                                                        </div>
                                                <?php }
                                                }
                                                ?>
                                            </div> <!-- end company-list-2-->
                                        </div>


                                        <div class="tasks">
                                            <div class="modal fade" id="evaluate_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="myCenterModalLabel">Event Evaluation</h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../controllers/add.evaluation.ctrls.php" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="user_id" value="<?= $user ?>">
                                                                <input type="hidden" name="event_id" value="<?= $event_id ?>">
                                                                <div class=" mt-3">
                                                                    <h4>What is your level of satisfaction with this event?</h4>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio1" name="customRadio1" class="form-check-input" value="1">
                                                                        <label class="form-check-label" for="customRadio1">Very Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio2" name="customRadio1" class="form-check-input" value="2">
                                                                        <label class="form-check-label" for="customRadio2">Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input" value="3">
                                                                        <label class="form-check-label" for="customRadio3">Neutral</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input" value="4">
                                                                        <label class="form-check-label" for="customRadio4">Poor</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio5" name="customRadio1" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio5">Very Poor</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h4>How likely are you to tell a friend about this event?</h4>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio6" name="customRadio2" class="form-check-input" value="1">
                                                                        <label class="form-check-label" for="customRadio6">Very Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio7" name="customRadio2" class="form-check-input" value="2">
                                                                        <label class="form-check-label" for="customRadio7">Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio8" name="customRadio2" class="form-check-input" value="3">
                                                                        <label class="form-check-label" for="customRadio8">Neutral</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio9" name="customRadio2" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio9">Bad</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio10" name="customRadio2" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio10">Very Bad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h4>How would you rate our event venue and equipment in regards to how it served your keynote?</h4>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio11" name="customRadio3" class="form-check-input" value="1">
                                                                        <label class="form-check-label" for="customRadio11">Very Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio12" name="customRadio3" class="form-check-input" value="2">
                                                                        <label class="form-check-label" for="customRadio12">Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio13" name="customRadio3" class="form-check-input" value="3">
                                                                        <label class="form-check-label" for="customRadio13">Neutral</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio14" name="customRadio3" class="form-check-input" value="4">
                                                                        <label class="form-check-label" for="customRadio14">Bad</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio15" name="customRadio3" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio15">Very Bad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h4>How satisfied were you with the speakers and sessions at our event?</h4>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio16" name="customRadio4" class="form-check-input" value="1">
                                                                        <label class="form-check-label" for="customRadio16">Very Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio17" name="customRadio4" class="form-check-input" value="2">
                                                                        <label class="form-check-label" for="customRadio17">Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio18" name="customRadio4" class="form-check-input" value="3">
                                                                        <label class="form-check-label" for="customRadio18">Neutral</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio19" name="customRadio4" class="form-check-input" value="4">
                                                                        <label class="form-check-label" for="customRadio19">Bad</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio20" name="customRadio4" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio20">Very Bad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h4>How did you feel about the duration of the content?</h4>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio21" name="customRadio5" class="form-check-input" value="1">
                                                                        <label class="form-check-label" for="customRadio21">Very Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio22" name="customRadio5" class="form-check-input" value="2">
                                                                        <label class="form-check-label" for="customRadio22">Good</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio23" name="customRadio5" class="form-check-input" value="3">
                                                                        <label class="form-check-label" for="customRadio23">Neutral</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio24" name="customRadio5" class="form-check-input" value="4">
                                                                        <label class="form-check-label" for="customRadio24">Bad</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="customRadio25" name="customRadio5" class="form-check-input" value="5">
                                                                        <label class="form-check-label" for="customRadio25">Very Bad</label>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-primary mt-3 mb-3" name="submit">Submit Evaluation</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>

                                            <h5 class=" mt-0 task-header text-uppercase">Attended</h5>
                                            <div id="task-list-three" class="task-list-items">
                                                <div class="card mb-0">
                                                    <div class="card-body p-3">
                                                        <small class="float-end text-muted">22 Jul 2018</small>
                                                        <span class="badge bg-info">Attended</span>

                                                        <h3 class="mt-2 mb-2 text-center">
                                                            Event Name
                                                        </h3>
                                                        <div class="text-center">
                                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#evaluate_modal">Evaluate</a>
                                                        </div>

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
                                        <div class="tasks">
                                            <h5 class="mt-0 task-header text-uppercase">Missed Events</h5>
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