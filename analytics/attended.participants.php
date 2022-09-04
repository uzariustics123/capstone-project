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
                                <h4 class="page-title">Invited Participants</h4>
                            </div>
                        </div>
                    </div>

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
                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Participant Status</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $event_id = $_GET['event_id'];
                                                    $organization_id = $_GET['org_id'];
                                                    $query = "SELECT * FROM attendances
                                                                        RIGHT OUTER JOIN participants ON participants.participant_id = attendances.participant_reference_id
                                                                        RIGHT OUTER JOIN events ON events.event_id = attendances.event_reference_id 
                                                                        RIGHT OUTER JOIN users ON users.userid = attendances.attendance_user_id
                                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                                        WHERE event_reference_id = $event_id
                                                                        AND members.organization_id=$organization_id
                                                                        GROUP BY users.userid
                                                                        HAVING COUNT(*) > 0
                                                                        ";
                                                    $results = $conn->query($query);
                                                    while ($row = $results->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $row['firstname'] ?> <?= $row['lastname'] ?></td>
                                                            <td><span id="accesstype<?= $row['participant_id']; ?>"><?= $row['accesstype'] ?></span></td>
                                                            <td class="text-success"><?= $row['participant_status'] ?></td>
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