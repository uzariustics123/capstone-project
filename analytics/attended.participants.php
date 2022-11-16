<?php require_once '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <!-- Begin page -->
    <div class="wrapper">

        <?php require_once '../includes/sidebar.php' ?>

        <div class="content-page">
            <div class="content">

                <?php require_once '../includes/topbar.php' ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Attended Participants</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">

                            <?php
                            $event_id = $_GET['event_id'];
                            $organization_id = $_GET['org_id'];
                            $query = "SELECT * FROM events 
                                RIGHT OUTER JOIN departments on events.department_id = departments.department_id
                                RIGHT OUTER JOIN organizations on departments.organization_id = organizations.organization_id
                                WHERE event_id = $event_id;";
                            $results = $conn->query($query);
                            $row = $results->fetch_assoc();
                            $event_all_day = $row['event_all_day'];
                            ?>
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
                                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <?php if ($event_all_day == 'yes') {
                                                        ?>
                                                            <th>Attendance In AM</th>
                                                            <th>Attendance Out AM</th>
                                                            <th>Attendance In PM</th>
                                                            <th>Attendance Out PM</th>
                                                        <?php   } else { ?>
                                                            <th>Attendance In</th>
                                                            <th>Attendance Out</th>
                                                        <?php } ?>
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
                                                        $participant_id = $row['participant_id']
                                                    ?>
                                                        <tr>
                                                            <td><?= $row['firstname'] ?> <?= $row['lastname'] ?></td>
                                                            <td><?= $row['email'] ?></td>
                                                            <?php
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
                </div>
            </div>

        </div>
    </div>
    <!-- END wrapper -->
    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php require_once '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>