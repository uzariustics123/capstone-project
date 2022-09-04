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
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <div class="page-title-box text-center">
                                <h1 class="h1">Event Feed</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="timeline" dir="ltr">
                                <div class="timeline-show mb-3 text-center">
                                    <h5 class="m-0 time-show-name mb-2">Today</h5> <br>
                                    <h5 class="m-0 time-show-name"><?= $newdate = date("M d, Y",); ?></h5>
                                </div>
                                <?php
                                $sql = "SELECT * FROM events 
                                RIGHT OUTER JOIN departments ON events.department_id = departments.department_id
                                RIGHT OUTER JOIN organizations ON departments.organization_id = organizations.organization_id
                                RIGHT OUTER JOIN members ON departments.department_id = members.department_id
                                RIGHT OUTER JOIN users ON members.user_reference_id = users.userid 
                                WHERE events.event_status = 'approved'
                                AND members.user_reference_id = $user OR organizations.org_admin_id = $user
                                GROUP BY events.event_id
                                HAVING COUNT(*) > 0
                                ORDER BY events.event_date ASC";
                                $results = $conn->query($sql);
                                $counter = 0;
                                while ($row = $results->fetch_assoc()) {
                                    $now = date('Y-m-d');
                                    $newdate = date("M d, Y", strtotime($now));
                                    if ($row['event_date'] >= $newdate) {
                                        $counter++;
                                        if ($counter % 2 == 0) { ?>
                                            <div class="timeline-lg-item timeline-item-right text-center">
                                                <div class="timeline-desk">

                                                    <?php
                                                    if ($row['org_admin_id'] == $user) { ?>
                                                        <a href="../views/pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode('admin') ?>" style=" text-decoration: none; color: inherit;">
                                                            <div class="timeline-box">
                                                                <span class="arrow"></span>
                                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                                <h4 class="mt-0 mb-1 font-16"><?= $row['event_name'] ?></h4>
                                                                <p class="text-muted"><small><?= $row['event_date'] ?></small></p>
                                                                <p><?= $row['event_description'] ?></p>
                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 148</a>
                                                            </div>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="../views/pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode($row['usertype']) ?>" style=" text-decoration: none; color: inherit;">
                                                            <div class="timeline-box">
                                                                <span class="arrow"></span>
                                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                                <h4 class="mt-0 mb-1 font-16"><?= $row['event_name'] ?></h4>
                                                                <p class="text-muted"><small><?= $row['event_date'] ?></small></p>
                                                                <p><?= $row['event_description'] ?></p>
                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 148</a>
                                                            </div>
                                                        </a>
                                                    <?php }
                                                    ?>


                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="timeline-lg-item timeline-item-left text-center">
                                                <div class="timeline-desk">

                                                    <?php
                                                    if ($row['org_admin_id'] == $user) { ?>

                                                        <a href="../views/pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode('admin') ?>" style=" text-decoration: none; color: inherit;">
                                                            <div class="timeline-box">
                                                                <span class="arrow-alt"></span>
                                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                                <h4 class="mt-0 mb-1 font-16"><?= $row['event_name'] ?></h4>
                                                                <p class="text-muted"><small><?= $row['event_date'] ?></small></p>
                                                                <p><?= $row['event_description'] ?></p>

                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">👍 17</a>
                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">❤️ 89</a>
                                                            </div>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="../views/pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode($row['usertype']) ?>" style=" text-decoration: none; color: inherit;">
                                                            <div class="timeline-box">
                                                                <span class="arrow-alt"></span>
                                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                                <h4 class="mt-0 mb-1 font-16"><?= $row['event_name'] ?></h4>
                                                                <p class="text-muted"><small><?= $row['event_date'] ?></small></p>
                                                                <p><?= $row['event_description'] ?></p>

                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">👍 17</a>
                                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">❤️ 89</a>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                        <?php
                                        }
                                        ?>
                                <?php }
                                } ?>
                            </div>
                            <!-- end timeline -->
                        </div> <!-- end col -->
                    </div>

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