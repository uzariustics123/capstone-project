<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <?php $event_id = $_GET['event_id'];
    if (isset($_GET['usertype'])) {
        $usertype = base64_decode($encoded = $_GET['usertype']);
    }
    ?>
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
                    $query = "SELECT * FROM events 
                                RIGHT OUTER JOIN departments on events.department_id = departments.department_id
                                WHERE event_id = $event_id;";
                    $results = $conn->query($query);
                    while ($row = $results->fetch_assoc()) {
                    ?>

                        <div class="modal fade" id="edit-event-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <form action="../controllers/edit.event.ctrls.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="event_id" value="<?= $event_id; ?>">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label for="event-name" class="form-label">Event Name</label>
                                                                <input type="text" id="event-name" name="event_name" class="form-control" value="<?= $row['event_name'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="event-description" class="form-label">Event Desciption</label>
                                                                <textarea class="form-control" id="event-description" name="event_description" rows="5"><?= $row['event_description'] ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="event_location" class="form-label">Event Venue</label>
                                                                <input type="text" class="form-control" id="event_location" name="event_location" value="<?= $row['event_location'] ?>">
                                                            </div>
                                                            <div class="mb-3">

                                                                <label for="event-date" class="form-label"> Event Date</label>
                                                                <input class="form-control" name="event_date" id="event-date" type="date" value="<?= $newDate = date("Y-m-d", strtotime($row['event_date'])); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="event-start-time-morning" class="form-label" id="label1">Start Time Morning</label>
                                                                <input class="form-control" name="event_start_time_am" id="event-start-time-morning" type="time" value="<?= $row['event_start_time_am'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="event-end-time-morning" class="form-label" id="label2">End Time Morning</label>
                                                                <input class="form-control" name="event_end_time_am" id="event-end-time-morning" type="time" value="<?= $row['event_end_time_am'] ?>">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="event-start-time-afternoon" class="form-label" id='label3'>Start Time Afternoon</label>
                                                                <input class="form-control" name="event_start_time_pm" id="event-start-time-afternoon" type="time" value="<?= $row['event_start_time_pm'] ?>">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="event-end-time-afternoon" class="form-label" id='label4'>End Time Afternoon</label>
                                                                <input class="form-control" name="event_end_time_pm" id="event-end-time-afternoon" type="time" value="<?= $row['event_end_time_pm'] ?>">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="attendance-duration-select" class="form-label">Attendance Duration (mins)</label>
                                                                <select class="form-select" name="event_attendance_duration" id="attendance-duration-select">
                                                                    <?php
                                                                    if ($row['event_attendance_duration'] == '00:15:00') {
                                                                    ?>
                                                                        <option value="1500" selected>15</option>
                                                                        <option value="2000">20</option>
                                                                        <option value="2500">25</option>
                                                                        <option value="3000">30</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == '00:20:00') {
                                                                    ?>
                                                                        <option value="1500">15</option>
                                                                        <option value="2000" selected>20</option>
                                                                        <option value="2500">25</option>
                                                                        <option value="3000">30</option>
                                                                    <?php
                                                                    } else if ($row['event_attendance_duration'] == '00:25:00') { ?>
                                                                        <option value="1500">15</option>
                                                                        <option value="2000">20</option>
                                                                        <option value="2500" selected>25</option>
                                                                        <option value="3000">30</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == '00:30:00') { ?>
                                                                        <option value="1500">15</option>
                                                                        <option value="2000">20</option>
                                                                        <option value="2500">25</option>
                                                                        <option value="3000" selected>30</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <div class="form-check form-switch">
                                                                    <?php
                                                                    if ($row['event_all_day'] == 'yes') {
                                                                    ?>
                                                                        <input type="checkbox" class="form-check-input test" id="event_all_day1" name="event_all_day" value="yes">
                                                                    <?php } else if ($row['event_all_day'] == 'no') {
                                                                    ?>
                                                                        <input type="checkbox" checked class="form-check-input test" id="event_all_day1" name="event_all_day" value="no">
                                                                    <?php
                                                                    } ?>
                                                                    <label class=" form-check-label" for="event_all_day">Toggle this switch if event is half day</label>
                                                                </div>
                                                            </div>
                                                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="row">
                            <div class="col-xxl-12 col-xl-12">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                        <?php if ($row['event_status'] == 'pending') { ?>
                                            <div class="dropdown card-widgets">
                                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='uil uil-ellipsis-h'></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-event-modal" id="edit-event-modal-button">
                                                        <i class='uil uil-edit me-1'></i>Edit
                                                    </a>
                                                    <!-- item-->
                                                    <?php if ($usertype == 'admin') { ?>
                                                        <a href="javascript:void(0);" class="dropdown-item" id="approve-event" data-event_id=<?= $row['event_id'] ?>>
                                                            <i class='uil uil-file-copy-alt me-1'></i>Approve Event
                                                        </a>
                                                    <?php } ?>
                                                    <div class="dropdown-divider"></div>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                        <i class='uil uil-trash-alt me-1'></i>Delete
                                                    </a>

                                                </div> <!-- end dropdown menu-->
                                            </div> <!-- end dropdown-->
                                        <?php } ?>


                                        <h1 class="mt-2 text-center"><?= $row['event_name'] ?></h1>
                                        <p class="text-muted text-center"><?= $row['event_description'] ?></p>

                                        <div class="row">
                                            <div class="col-4">
                                                <!-- assignee -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Location</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-location font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $row['event_location'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end assignee -->
                                            </div> <!-- end col -->

                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event Date</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14">
                                                        <?= $row['event_date'] ?>
                                                    </h5>

                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event Attendance Duration</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14">
                                                        <?= substr($row['event_attendance_duration'], 3, 2) ?> Minutes
                                                    </h5>

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

                                                    <h5 class="mt-1 font-14 text-capitalize">
                                                        <?= $row['event_status'] ?>
                                                    </h5>

                                                </div>
                                                <!-- end assignee -->
                                            </div> <!-- end col -->

                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Is the event all day?</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-cloud-sun font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14 text-uppercase">
                                                        <?= $row['event_all_day'] ?>
                                                    </h5>

                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Department</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-stopwatch font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14">
                                                        <?= $row['dept_name'] ?>
                                                    </h5>

                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event Start Time Morning</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14">
                                                        <?= date('h:i:s a', strtotime($row['event_start_time_am'])) ?>
                                                    </h5>

                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event End Time Morning</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-clock font-18 text-success me-1'></i>

                                                    <h5 class="mt-1 font-14">
                                                        <?= date('h:i:s a', strtotime($row['event_end_time_am'])) ?>
                                                    </h5>

                                                </div>

                                            </div>
                                        </div>
                                        <?php if ($row['event_all_day'] == 'yes') { ?>
                                            <div class="row">
                                                <div class="col-4">
                                                    <!-- start due date -->
                                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event Start Time Afternoon</p>
                                                    <div class="d-flex">
                                                        <i class='uil uil-clock font-18 text-success me-1'></i>

                                                        <h5 class="mt-1 font-14">
                                                            <?= date('h:i:s a', strtotime($row['event_start_time_pm'])) ?>
                                                        </h5>

                                                    </div>
                                                    <!-- end due date -->
                                                </div> <!-- end col -->
                                                <div class="col-4">
                                                    <!-- start due date -->
                                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Event End Time Afternoon</p>
                                                    <div class="d-flex">
                                                        <i class='uil uil-clock font-18 text-success me-1'></i>

                                                        <h5 class="mt-1 font-14">
                                                            <?= date('h:i:s a', strtotime($row['event_end_time_pm'])) ?>
                                                        </h5>

                                                    </div>

                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    <?php } ?>

                    <?php
                    if ($usertype == 'admin' || $usertype == 'organizer') {
                    ?>
                        <div class="container-fluid" id="members-list">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-bordered mb-3">
                                                <li class="nav-item">
                                                    <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                        Preview
                                                    </a>
                                                </li>
                                            </ul> <!-- end nav-->
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="basic-datatable-preview">
                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th style="width: 75px;">Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT * FROM users
                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                        RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
                                                        WHERE participants.event_id = $event_id
                                                        ;";
                                                            $results = $conn->query($query);
                                                            while ($row = $results->fetch_assoc()) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $row['firstname'] ?> <?= $row['lastname'] ?></td>
                                                                    <td><span id="accesstype<?= $row['participant_id']; ?>"><?= $row['accesstype'] ?></span></td>
                                                                    <td class="text-success"><?= $row['participant_status'] ?></td>
                                                                    <td class="table-action">
                                                                        <button data-bs-toggle="modal" data-bs-target="#edit-participant-role-modal" class="action-icon btn btn-success btn-light edit-participant-role-modal" value="<?= $row['participant_id']; ?>">
                                                                            <i class="mdi mdi-square-edit-outline"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end preview-->
                                            </div> <!-- end tab-content-->
                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                            <!-- Standard modal -->
                            <div class="modal fade" id="edit-participant-role-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Edit Member Details</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <form method="post" action="../controllers/edit.participant.role.ctrls.php" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="event_id" class="form-control" value="<?= $event_id ?>">
                                                <input type="hidden" name="participant_id" class="form-control" id="eparticipant_id">
                                                <div class="mb-1 mt-1">
                                                    <label for="participant_role_select" class="form-label">Change Participant Role</label>
                                                    <select class="form-select" name="participant_role_select" id="eparticipant_role_select">
                                                        <option value="attendee">Attendee</option>
                                                        <option value="attendance-checker">Attendance Checker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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