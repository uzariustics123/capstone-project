<?php include '../includes/header.php' ?>
<?php if (isset($user)) {
?>

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
                <?php
                $organization_id = $_GET['org_id'];
                $department_id = $_GET['dept_id'];
                if (isset($_GET['admin_id'])) {
                    $org_admin_id = $_GET['admin_id'];
                } else {
                    $org_admin_id = null;
                }

                ?>
                <!-- Start Content-->
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
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM departments 
                        RIGHT OUTER JOIN organizations ON departments.organization_id = organizations.organization_id
                        WHERE department_id =$department_id;";
                        $results = $conn->query($query);
                        while ($row = $results->fetch_assoc()) {

                        ?>
                            <!-- Standard modal -->
                            <div id="edit-department-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <form action="../controllers/edit.department.ctrls.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?= $user ?>">
                                                <input type="hidden" name="organization_id" value="<?= $organization_id ?>">
                                                <input type="hidden" name="department_id" value="<?= $department_id ?>">
                                                <input type="hidden" name="dept_imgurl" value="<?= $row['dept_imgurl'] ?>">
                                                <div class="mb-3">
                                                    <label for="department_name" class="form-label">Department Name</label>
                                                    <input type="text" class="form-control" name="department_name" id="department_name" aria-describedby="emailHelp" placeholder="Enter department name" value="<?= $row['dept_name'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_description" class="form-label">Department Description</label>
                                                    <input type="text" class="form-control" name="department_desc" id="department_description" placeholder="Enter department description" value="<?= $row['dept_description'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_code" class="form-label">Department Code</label>
                                                    <input type="text" class="form-control" name="department_code" id="department_code" placeholder="Enter department code" value="<?= $row['dept_code'] ?>">
                                                </div>
                                                <div class="mb-1 mt-3">
                                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                                    <input type="file" class="form-control" name="image" id="image" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </form>
                            </div><!-- /.modal -->
                            <div class="row">
                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            if (isset($_GET['usertype'])) {
                                                $usertype = base64_decode($encoded = $_GET['usertype']);
                                            }
                                            if ($usertype == 'organizer' || $usertype == 'admin' || $org_admin_id == $user) {
                                            ?>


                                                <div class="dropdown card-widgets">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="dripicons-gear"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-department-modal" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" id="delete-department" class="dropdown-item" data-dept_id=<?= $department_id ?> data-org_id=<?= $organization_id ?>><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <!-- Product image -->
                                                    <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                        <img src="<?= $row['dept_imgurl']; ?>" class="img-fluid rounded" alt="Product-img">
                                                    </a>
                                                </div> <!-- end col -->
                                                <div class="col-lg-7">
                                                    <form class="ps-lg-4">

                                                        <h1 class="mt-0"><?= $row['dept_name']; ?></h1>

                                                        <div class="mt-3">
                                                            <h4><span class="badge badge-success-lighten"><?= $row['dept_code']; ?></span></h4>
                                                        </div>

                                                        <div class="mt-4">
                                                            <h6 class="font-14">Description:</h6>
                                                            <p><?= $row['dept_description']; ?></p>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- Department information -->
                                                    <div class="mt-4">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h6 class="font-14">Members:</h6>
                                                                <?php
                                                                $query = "SELECT * FROM members WHERE department_id = $department_id;";
                                                                $results = $conn->query($query);
                                                                $total = $results->num_rows;
                                                                ?>
                                                                <p class="text-sm lh-150"><?= $total; ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </form>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                                <?php

                                if (isset($_GET['usertype'])) {
                                    $usertype = base64_decode($encoded = $_GET['usertype']);
                                }
                                if ($usertype == 'organizer' || $usertype == 'admin' || $org_admin_id == $user) {
                                ?>
                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card  p-3">
                                            <div class="mb-5 mt-3 mt-xl-0">
                                                <form action="../controllers/import.members.ctrls.php?" method="post" enctype="multipart/form-data">
                                                    <h4 class="mb-2">Import CSV</h4>
                                                    <p class="text-muted font-14">Import your CSV file here format should be Firstname, Lastname, Email</p>
                                                    <input type="hidden" name="department_id" value="<?= $department_id; ?>">
                                                    <input type="hidden" name="organization_id" value="<?= $organization_id; ?>">
                                                    <input type="hidden" name="org_admin_id" value="<?= $org_admin_id; ?>">
                                                    <div class="mb-2">
                                                        <input type="file" class="form-control" name="file" id="file" rows="6" required></input>
                                                    </div>

                                                    <div class="text-center"><button type="submit" name="import" class="btn btn-primary">Import</button></div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- end row-->
                </div> <!-- container -->
            </div> <!-- content -->

            <div class="modal fade" id="add_member" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <td><button type="button" class="btn btn-success btn-rounded btn-sm add_member" id="add_member" data-org_id="<?= $organization_id ?>" data-dept_id="<?= $department_id ?>" data-user_id="<?= $row['userid'] ?>" data-org_admin_id="<?= $org_admin_id ?>" data-member_email="<?= $row['member_email'] ?>">Add</button></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <?php
            if ($usertype == 'organizer' || $usertype == 'admin' || $org_admin_id == $user) {
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Members List
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_member" class="btn btn-success btn-sm ms-3">Add Member</a>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="container-fluid" id="members-list">
                <div class="row">
                    <table id="row-callback-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registration Status</th>
                                <th>Usertype</th>
                                <?php
                                if ($usertype == 'organizer' || $usertype == 'admin' || $org_admin_id == $user) {
                                ?>
                                    <th style="width: 75px;">Action</th>
                                <?php } ?>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT * FROM users 
                                RIGHT OUTER JOIN members ON members.user_reference_id = users.userid 
                                LEFT OUTER JOIN departments ON members.department_id = departments.department_id WHERE members.department_id = $department_id";
                            $results = $conn->query($query);
                            while ($row = $results->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><span id="member_id<?= $row['userid']; ?>"><?= $row['member_id'] ?></span></td>
                                    <td>
                                        <span id="firstname<?= $row['userid']; ?>"><?= $row['firstname'] ?></span>
                                        <span id="lastname<?= $row['userid']; ?>"><?= $row['lastname'] ?></span>

                                    </td>
                                    <td><span id="email<?= $row['userid']; ?>"><?= $row['email'] ?></span></td>
                                    <td><span id="registration_status<?= $row['userid']; ?>"><?= $row['registration_status'] ?></span></td>

                                    <td>
                                        <span class="badge bg-primary" id="usertype<?= $row['userid']; ?>"><?= $row['usertype'] ?></span>
                                    </td>
                                    <?php
                                    if ($usertype == 'organizer' || $usertype == 'admin' || $org_admin_id == $user) {
                                    ?>
                                        <td class="table-action">
                                            <button data-bs-toggle="modal" data-bs-target="#edit-member-modal" class="action-icon edit-custom btn btn-success btn-light" value="<?= $row['userid']; ?>">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </td>
                                    <?php } ?>
                                </tr>

                                <!-- Standard modal -->
                                <div class="modal fade" id="edit-member-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Edit Member Details</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <form method="post" action="../controllers/edit.member.ctrls.php" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <input type="hidden" name="organization_id" value="<?= $organization_id ?>" />
                                                    <input type="hidden" name="department_id" value="<?= $department_id ?>" />
                                                    <input type="hidden" name="member_id" class="form-control" id="emember_id">
                                                    <div class="mb-1 mt-1">
                                                        <label for="usertype-select" class="form-label">Change Usertype</label>
                                                        <select class="form-select" name="usertype-select" id="eusertype-select">
                                                            <option value="member">Member</option>
                                                            <option value="organizer">Organizer</option>
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
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
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

                                            <input type="hidden" name="publisher_id" value="<?= $user; ?>">
                                            <input type="hidden" name="department_id" value="<?= $department_id; ?>">
                                            <input type="hidden" name="organization_id" value="<?= $organization_id; ?>">
                                            <input type="hidden" name="org_admin_id" value="<?= $org_admin_id; ?>">

                                            <input type="hidden" name="usertype" value="<?= $usertype; ?>">

                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="event-name" class="form-label">Event Name</label>
                                                    <input type="text" id="event-name" name="event_name" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-description" class="form-label">Event Desciption</label>
                                                    <textarea class="form-control" id="event-description" name="event_description" rows="5"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event_location" class="form-label">Event Venue</label>
                                                    <input type="text" class="form-control" id="event_location" name="event_location"></input>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-date" class="form-label"> Event Date</label>
                                                    <input class="form-control" name="event_date" id="event-date" type="date">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-start-time-morning" class="form-label" id="label1">Start Time Morning</label>
                                                    <input class="form-control" name="event_start_time_am" id="event-start-time-morning" type="time" name="time">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-end-time-morning" class="form-label" id="label2">End Time Morning</label>
                                                    <input class="form-control" name="event_end_time_am" id="event-end-time-morning" type="time" name="time">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-start-time-afternoon" class="form-label" id='label3'>Start Time Afternoon</label>
                                                    <input class="form-control" name="event_start_time_pm" id="event-start-time-afternoon" type="time">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="event-end-time-afternoon" class="form-label" id='label4'>End Time Afternoon</label>
                                                    <input class="form-control" name="event_end_time_pm" id="event-end-time-afternoon" type="time">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="attendance-duration-select" class="form-label">Attendance Duration (mins)</label>
                                                    <select class="form-select" name="attendance_duration" id="attendance-duration-select">
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                        <option value="45">45</option>
                                                        <option value="60">60</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="event_all_day1" name="event_all_day">
                                                        <label class=" form-check-label" for="event_all_day">Toggle this switch if event is half day</label>
                                                    </div>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary">Publish</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <section class="container-fluid" id="events">
                <!-- start page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Events
                                <a href="#" data-bs-toggle="modal" data-bs-target="#centermodal" class="btn btn-success btn-sm ms-3">Add New Event</a>
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="board">
                            <div class="tasks">
                                <h5 class="mt-0 task-header">FOR APPROVAL</h5>
                                <div id="task-list-one" class="task-list-items">
                                    <?php
                                    $query = "SELECT * FROM events 
                                            RIGHT OUTER JOIN users ON events.publisher_id = users.userid
                                            WHERE event_status = 'pending' AND department_id = $department_id ORDER BY event_date ASC;";
                                    $results = $conn->query($query);
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <!-- Task Item -->
                                        <div class="card mb-0">

                                            <div class="card-body p-3">
                                                <!-- Date Created -->
                                                <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                <span class="badge bg-warning"><?= $row['event_status'] ?></span>
                                                <h2 class="mt-2 mb-2">
                                                    <!-- Event Name -->
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                    </h3>
                                                    <p><?= $row['event_description'] ?></p>
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <?php
                                                            $usertype_encoded = base64_encode($usertype);
                                                            ?>
                                                            <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= $usertype_encoded ?> &org_admin_id=<?= $user ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>

                                                        </div>
                                                    </div>
                                                    <p class="mb-0">
                                                        <img src="<?= $row['photourl'] ?>" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                        <span class="align-middle"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                                    </p>
                                            </div> <!-- end card-body -->
                                        </div>
                                        <!-- Task Item End -->
                                    <?php }
                                    ?>
                                </div> <!-- end company-list-1-->
                            </div>
                            <div class="tasks">
                                <h5 class="mt-0 task-header text-uppercase">ONGOING</h5>
                                <div id="task-list-two" class="task-list-items">
                                    <!-- Task Item -->
                                    <?php
                                    $now = date('Y-m-d');
                                    $query = "SELECT * FROM events 
                                            RIGHT OUTER JOIN users ON events.publisher_id = users.userid
                                            WHERE event_status = 'approved' AND department_id = $department_id ORDER BY event_date ASC;";
                                    $results = $conn->query($query);
                                    while ($row = $results->fetch_assoc()) {
                                        $parsed_date = date("M d, Y", strtotime($row['event_date']));
                                        if ($parsed_date == $now) {
                                    ?>
                                            <!-- Task Item -->
                                            <div class="card mb-0">

                                                <div class="card-body p-3">
                                                    <!-- Date Created -->
                                                    <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                    <span class="badge bg-success"><?= $row['event_status'] ?></span>
                                                    <h2 class="mt-2 mb-2">
                                                        <!-- Event Name -->
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                        </h3>
                                                        <p><?= $row['event_description'] ?></p>
                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-check-outline text-muted"></i>
                                                                <?php
                                                                $event_id = $row['event_id'];
                                                                $sql = "SELECT * FROM participants WHERE event_id =  $event_id AND participant_status = 'confirmed'";
                                                                $result = $conn->query($sql);
                                                                $num_rows = mysqli_num_rows($result);
                                                                ?>
                                                                <b><?= $num_rows ?></b> Confirmed
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-clock-outline text-muted"></i>
                                                                <?php
                                                                $event_id = $row['event_id'];
                                                                $sql = "SELECT * FROM participants WHERE event_id =  $event_id AND participant_status = 'pending'";
                                                                $result = $conn->query($sql);
                                                                $num_rows = mysqli_num_rows($result);
                                                                ?>
                                                                <b><?= $num_rows ?></b> Pending
                                                            </span>
                                                        </p>
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php
                                                                if ($usertype == 'admin') {
                                                                ?>
                                                                    <a href="javascript:void(0);" class="dropdown-item delete-event" id="delete-event" data-org_id=<?= $organization_id ?> data-dept_id=<?= $row['department_id'] ?> data-event_id=<?= $row['event_id'] ?> data-usertype=<?= $usertype ?>>
                                                                        <i class="mdi mdi-delete me-1"></i>
                                                                        Delete
                                                                    </a>
                                                                <?php } ?>
                                                                <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode($usertype) ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">
                                                            <img src="<?= $row['photourl'] ?>" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                                        </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                    <?php }
                                    }
                                    ?>
                                </div> <!-- end company-list-2-->
                            </div>
                            <div class="tasks">
                                <h5 class="mt-0 task-header text-uppercase">UPCOMING</h5>
                                <div id="task-list-two" class="task-list-items">
                                    <!-- Task Item -->
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $now = date('Y-m-d');
                                    $query = "SELECT * FROM events 
                                            RIGHT OUTER JOIN users ON events.publisher_id = users.userid
                                            WHERE event_status = 'approved' AND department_id = $department_id ORDER BY event_date ASC;";
                                    $results = $conn->query($query);
                                    while ($row = $results->fetch_assoc()) {
                                        $parsed_date = date("Y-m-d", strtotime($row['event_date']));
                                        if ($parsed_date > $now) {
                                    ?>
                                            <!-- Task Item -->
                                            <div class="card mb-0">

                                                <div class="card-body p-3">
                                                    <!-- Date Created -->
                                                    <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                    <span class="badge bg-success"><?= $row['event_status'] ?></span>
                                                    <h2 class="mt-2 mb-2">
                                                        <!-- Event Name -->
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                        </h3>
                                                        <p><?= $row['event_description'] ?></p>
                                                        <p class="mb-0">
                                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-check-outline text-muted"></i>
                                                                <?php
                                                                $event_id = $row['event_id'];
                                                                $sql = "SELECT * FROM participants WHERE event_id =  $event_id AND participant_status = 'confirmed'";
                                                                $result = $conn->query($sql);
                                                                $num_rows = mysqli_num_rows($result);
                                                                ?>
                                                                <b><?= $num_rows ?></b> Confirmed
                                                            </span>
                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                                <i class="mdi mdi-account-clock-outline text-muted"></i>
                                                                <?php
                                                                $event_id = $row['event_id'];
                                                                $sql = "SELECT * FROM participants WHERE event_id =  $event_id AND participant_status = 'pending'";
                                                                $result = $conn->query($sql);
                                                                $num_rows = mysqli_num_rows($result);
                                                                ?>
                                                                <b><?= $num_rows ?></b> Pending
                                                            </span>
                                                        </p>
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php
                                                                if ($usertype == 'admin') {
                                                                ?>
                                                                    <a href="javascript:void(0);" class="dropdown-item delete-event" id="delete-event" data-org_id=<?= $organization_id ?> data-dept_id=<?= $row['department_id'] ?> data-event_id=<?= $row['event_id'] ?> data-usertype=<?= $usertype ?>>
                                                                        <i class="mdi mdi-delete me-1"></i>
                                                                        Delete
                                                                    </a>
                                                                <?php } ?>
                                                                <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode($usertype) ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">
                                                            <img src="<?= $row['photourl'] ?>" alt="user-img" class="avatar-xs rounded-circle me-1">
                                                            <span class="align-middle"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                                        </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                    <?php }
                                    }
                                    ?>
                                </div> <!-- end company-list-2-->
                            </div>
                            <div class="tasks">
                                <h5 class="mt-0 task-header text-uppercase">Done</h5>
                                <div id="task-list-four" class="task-list-items">
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $now = date('Y-m-d');

                                    $query = "SELECT * FROM events 
                                            RIGHT OUTER JOIN users ON events.publisher_id = users.userid
                                            WHERE event_status = 'approved' AND department_id = $department_id ORDER BY event_date ASC;";
                                    $results = $conn->query($query);
                                    while ($row = $results->fetch_assoc()) {
                                        $parsed_date = date('Y-m-d', strtotime($row['event_date']));
                                        if ($parsed_date < $now) {
                                    ?>

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted"><?= $row['event_date'] ?></small>
                                                    <span class="badge bg-success">Done</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body"><?= $row['event_name'] ?></a>
                                                    </h5>
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
                                            <!-- Task Item End -->
                                    <?php }
                                    }
                                    ?>
                                </div> <!-- end company-list-4-->
                            </div>
                        </div> <!-- end .board-->
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </section>
        </div>
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