<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <?php
    $event_id = $_GET['event_id'];
    if (isset($_GET['org_admin_id'])) {
        $org_admin_id = $_GET['org_admin_id'];
    }

    if (isset($_GET['usertype'])) {
        $usertype = base64_decode($encoded = $_GET['usertype']);
    }
    $now = date('Y-m-d');
    $newDate = date("M d, Y", strtotime($now));
    ?>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include_once '../includes/sidebar.php' ?>

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
                                RIGHT OUTER JOIN organizations on departments.organization_id = organizations.organization_id
                                WHERE event_id = $event_id;";
                    $results = $conn->query($query);
                    while ($row = $results->fetch_assoc()) {
                        $department_id = $row['department_id'];
                        $event_date = $row['event_date'];
                        $event_all_day = $row['event_all_day'];
                        $organization_id = $row['organization_id'];
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
                                                                    if ($row['event_attendance_duration'] == 15) {
                                                                    ?>
                                                                        <option value="15" selected>15</option>
                                                                        <option value="20">20</option>
                                                                        <option value="25">25</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45">45</option>
                                                                        <option value="60">60</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == 20) {
                                                                    ?>
                                                                        <option value="15">15</option>
                                                                        <option value="20" selected>20</option>
                                                                        <option value="25">25</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45">45</option>
                                                                        <option value="60">60</option>
                                                                    <?php
                                                                    } else if ($row['event_attendance_duration'] == 25) { ?>
                                                                        <option value="15">15</option>
                                                                        <option value="20">20</option>
                                                                        <option value="25" selected>25</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45">45</option>
                                                                        <option value="60">60</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == 30) { ?>
                                                                        <option value="15">15</option>
                                                                        <option value="20">20</option>
                                                                        <option value="25">25</option>
                                                                        <option value="30" selected>30</option>
                                                                        <option value="45">45</option>
                                                                        <option value="60">60</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == 45) { ?>
                                                                        <option value="15">15</option>
                                                                        <option value="20">20</option>
                                                                        <option value="25">25</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45" selected>45</option>
                                                                        <option value="60">60</option>
                                                                    <?php } else if ($row['event_attendance_duration'] == 45) { ?>
                                                                        <option value="15">15</option>
                                                                        <option value="20">20</option>
                                                                        <option value="25">25</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45">45</option>
                                                                        <option value="60" selected>60</option>
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
                                        <?php
                                        if ($row['org_admin_id'] == $user) {
                                        ?>
                                            <div class="dropdown card-widgets">
                                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='uil uil-ellipsis-h'></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <?php if ($row['event_status'] == 'pending') { ?>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-event-modal" id="edit-event-modal-button">
                                                            <i class='uil uil-edit me-1'></i>Edit
                                                        </a>
                                                        <!-- item-->
                                                        <?php if ($row['org_admin_id'] == $user) { ?>
                                                            <a href="javascript:void(0);" class="dropdown-item" id="approve-event" data-event_id=<?= $row['event_id'] ?>>
                                                                <i class='uil uil-file-copy-alt me-1'></i>Approve Event
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php

                                                    $now = date('Y-m-d');
                                                    $newdate = date("M d, Y", strtotime($now));
                                                    if ($row['event_date'] >= $newdate) {
                                                    ?>
                                                        <a href="javascript:void(0);" class="dropdown-item delete-event" id="delete-event" data-org_id=<?= $row['organization_id'] ?> data-dept_id=<?= $row['department_id'] ?> data-event_id=<?= $row['event_id'] ?> data-usertype=<?= $usertype ?>>
                                                            <i class="mdi mdi-delete me-1"></i>
                                                            Delete
                                                        </a>
                                                    <?php } ?>
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
                                                        <?= $row['event_attendance_duration'] ?> Minutes
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Participants</h4>
                                    <a href="#" class="btn btn-success btn-sm ms-3 mb-2" data-bs-toggle="modal" data-bs-target="#add_participant"> <i class="mdi mdi-plus"></i> Add Participant</a>
                                    <a href="evaluation-creation-tool.php?event_id=<?= $event_id ?>" class="btn btn-info btn-sm ms-3 mb-2"> <i class="mdi mdi-plus"></i> Add Evaluation</a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="add_participant" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myCenterModalLabel">Add Participant</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM users
                                                RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                WHERE members.organization_id = $organization_id
                                                ;";
                                                $results = $conn->query($query);
                                                while ($row = $results->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $row['firstname'] ?> <?= $row['lastname'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><button type="button" class="btn btn-success btn-rounded btn-sm add_participant" id="add_participant" data-event_id="<?= $event_id ?>" data-member_id="<?= $row['member_id'] ?>">Add</button></td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>


                        <div class="container-fluid" id="members-list">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-bordered mb-3">
                                                <li class="nav-item">
                                                    <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                        Event Participant Details
                                                    </a>
                                                </li>
                                            </ul> <!-- end nav-->
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="basic-datatable-preview">
                                                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                                                        <?php
                                                        date_default_timezone_set('Asia/Manila');
                                                        $now = date('Y-m-d');
                                                        $parsed_date = date("Y-m-d", strtotime($event_date));
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Role</th>
                                                                <th>Participant Status</th>
                                                                <?php if ($parsed_date >= $now) { ?>
                                                                    <th style="width: 75px;">Action</th>
                                                                    <?php } else if ($parsed_date <= $now) {
                                                                    if ($event_all_day == 'yes') {
                                                                    ?>
                                                                        <th>Attendance In AM</th>
                                                                        <th>Attendance Out AM</th>
                                                                        <th>Attendance In PM</th>
                                                                        <th>Attendance Out PM</th>
                                                                    <?php   } else { ?>
                                                                        <th>Attendance In</th>
                                                                        <th>Attendance Out</th>
                                                                <?php
                                                                    }
                                                                } ?>

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
                                                                    <?php if ($row['participant_status'] == 'pending') { ?>
                                                                        <td class="text-warning"><?= $row['participant_status'] ?></td>
                                                                    <?php } else { ?>
                                                                        <td class="text-success"><?= $row['participant_status'] ?></td>
                                                                    <?php } ?>
                                                                    <?php
                                                                    date_default_timezone_set('Asia/Manila');
                                                                    $now = date('Y-m-d');
                                                                    ?>
                                                                    <?php
                                                                    $parsed_date = date("Y-m-d", strtotime($event_date));
                                                                    if ($parsed_date >= $now) { ?>
                                                                        <td class="table-action">
                                                                            <button data-bs-toggle="modal" data-bs-target="#edit-participant-role-modal" class="action-icon btn btn-success btn-light edit-participant-role-modal" value="<?= $row['participant_id']; ?>">
                                                                                <i class="mdi mdi-square-edit-outline"></i>
                                                                            </button>
                                                                        </td>
                                                                        <?php } else {
                                                                        $participant = $row['participant_id'];

                                                                        $sql = "SELECT * FROM attendances
                                                                        RIGHT OUTER JOIN participants ON participants.participant_id = attendances.participant_reference_id
                                                                        RIGHT OUTER JOIN events ON events.event_id = attendances.event_reference_id 
                                                                        WHERE attendances.participant_reference_id = $participant";

                                                                        $result = $conn->query($sql);
                                                                        while ($rows = $result->fetch_assoc()) {
                                                                            $event_all_day = $rows['event_all_day'];
                                                                            $participant_id = $rows['participant_reference_id'];
                                                                            if ($rows['attendance_status'] == 'attended') {
                                                                                echo "<td class='text-success'>" . $rows['attendance_status'] . "</td>";
                                                                            } else {
                                                                                echo "<td class='text-danger'>" . $rows['attendance_status'] . "</td>";
                                                                            }
                                                                        ?>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
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
                </div>
            </div> <!-- content -->
            <?php
            if ($usertype == 'admin' || $usertype == 'organizer') {
            ?>
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Analytics</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <a href="../analytics/invited.participants.php?event_id=<?= $event_id ?>" style="color:inherit;">
                                <div class=" card tilebox-one">
                                    <div class="card-body">
                                        <i class='uil uil-users-alt float-end'></i>
                                        <h4 class="text-uppercase mt-0">Participant Invited</h4>
                                        <?php
                                        $query = "SELECT * FROM users
                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                        RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
                                                        WHERE participants.event_id = $event_id;";
                                        $results = $conn->query($query);
                                        $total = $results->num_rows;
                                        ?>
                                        <h2 class="my-2" id="active-users-count"><?= $total ?></h2>
                                    </div>
                                </div>
                            </a>
                            <a href="../analytics/attended.participants.php?event_id=<?= $event_id ?>&org_id=<?= $organization_id ?>" style="color:inherit;">
                                <div class="card tilebox-one">
                                    <div class="card-body">
                                        <i class='uil uil-analytics float-end'></i>
                                        <h4 class="text-uppercase mt-0">Attended</h4>
                                        <?php
                                        $query = "SELECT * FROM attendances
                                                RIGHT OUTER JOIN participants ON participants.participant_id = attendances.participant_reference_id
                                                RIGHT OUTER JOIN events ON events.event_id = attendances.event_reference_id 
                                                WHERE event_reference_id = $event_id
                                                GROUP BY attendances.participant_reference_id
                                                HAVING COUNT(*) > 0 ;";
                                        $results = $conn->query($query);
                                        $total_attended = 0;
                                        while ($row = $results->fetch_assoc()) {
                                            if ($row['event_all_day'] == 'yes') {
                                                $total_attended++;
                                            } else if ($row['event_all_day'] == 'no') {
                                                $total_attended++;
                                            }
                                        }
                                        ?>
                                        <h2 class="my-2" id="active-views-count"><?= $total_attended ?></h2>
                                    </div> <!-- end card-body-->
                                </div>
                            </a>

                            <a href="../analytics/evaluations.php?event_id=<?= $event_id ?>" style="color:inherit;">
                                <div class="card tilebox-one">
                                    <div class="card-body">
                                        <i class='uil uil-file-check-alt float-end'></i>
                                        <h4 class="text-uppercase mt-0">Evaluated</h4>
                                        <?php
                                        $query = "SELECT * FROM evaluations 
                                        WHERE event_reference_id = $event_id;";
                                        $results = $conn->query($query);
                                        $total = $results->num_rows;
                                        ?>
                                        <h2 class="my-2" id="active-views-count"><?= $total ?></h2>
                                    </div> <!-- end card-body-->
                                </div>
                            </a>

                        </div> <!-- end col -->

                        <div class="col-xl-6 col-lg-6">
                            <a href="../analytics/confirmed.participants.php?event_id=<?= $event_id ?>" style="color:inherit;">
                                <div class="card tilebox-one">
                                    <div class="card-body">
                                        <i class='uil uil-envelope-check float-end'></i>
                                        <h4 class="text-uppercase mt-0">Participant Confirmed</h4>
                                        <?php
                                        $query = "SELECT * FROM users
                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                        RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
                                                        WHERE participants.event_id = $event_id AND participants.participant_status = 'confirmed';";
                                        $results = $conn->query($query);
                                        $total = $results->num_rows;
                                        ?>
                                        <h2 class="my-2" id="active-users-count"><?= $total ?></h2>
                                    </div>
                                </div>
                            </a>

                            <a href="../analytics/checkers.participants.php?event_id=<?= $event_id ?>" style="color:inherit;">
                                <div class="card tilebox-one">
                                    <div class="card-body">
                                        <i class='uil uil-window-restore float-end'></i>
                                        <h4 class="text-uppercase mt-0">Attendance Checkers</h4>
                                        <?php
                                        $query = "SELECT * FROM users
                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                        RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
                                                        WHERE participants.event_id = $event_id AND participants.accesstype = 'attendance-checker';";
                                        $results = $conn->query($query);
                                        $total = $results->num_rows;
                                        ?>
                                        <h2 class="my-2" id="active-views-count"><?= $total ?> </h2>
                                    </div> <!-- end card-body-->
                                </div>
                            </a>
                            <!--end card-->
                        </div>
                    </div>


                </section>
            <?php } ?>
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