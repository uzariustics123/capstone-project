<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

    <div class="wrapper">

        <?php require_once '../includes/sidebar.php' ?>


        <div class="content-page">
            <div class="content">
                <?php require_once '../includes/topbar.php' ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Admin Module</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="container-fluid">

                <div class="row">

                    <!-- Right Sidebar -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $counter = 0;
                                $query = "SELECT * FROM organizations 
                                            RIGHT OUTER JOIN users ON users.userid = organizations.org_admin_id
                                            WHERE org_status = 'pending';";
                                $results = $conn->query($query);
                                while ($row = $results->fetch_assoc()) {
                                    $counter++;
                                } ?>
                                <div class="page-aside-left">
                                    <div class="email-menu-list mt-3">
                                        <a href="javascript: void(0);" class="text-danger fw-bold"><i class="dripicons-inbox me-2"></i>Inbox<span class="badge badge-danger-lighten float-end ms-2"><?= $counter ?></span></a>
                                    </div>
                                </div>


                                <div class="page-aside-right">


                                    <div class="mt-3">
                                        <ul class="email-list">
                                            <?php
                                            $query = "SELECT * FROM organizations 
                                            RIGHT OUTER JOIN users ON users.userid = organizations.org_admin_id
                                            WHERE org_status = 'pending';";
                                            $results = $conn->query($query);
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                                <li>
                                                    <div class="email-sender-info">
                                                        <a href="javascript: void(0);" class="email-title">
                                                            <span id="firstname<?= $row['organization_id'] ?>"><?= $row['firstname'] ?> </span>
                                                            <span id="lastname<?= $row['organization_id'] ?>"><?= $row['lastname'] ?></span>
                                                        </a>
                                                    </div>

                                                    <span id="date_created<?= $row['organization_id'] ?>" hidden="hidden"><?= $row['date_created'] ?></span>
                                                    <span id="attachments<?= $row['organization_id'] ?>" hidden="hidden"><?= $row['attachments'] ?></span>
                                                    <span id="photourl<?= $row['organization_id'] ?>" hidden="hidden"><?= $row['photourl'] ?></span>

                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">
                                                            <span id="org_name<?= $row['organization_id'] ?>"><?= $row['org_name'] ?></span>
                                                            <span id="org_description<?= $row['organization_id'] ?>"><?= $row['org_description'] ?></span>
                                                        </a>
                                                        <div class="email-date">11:49 am</div>
                                                    </div>
                                                    <div class="actions">

                                                        <button type="button" class="btn btn-success org_review" data-bs-toggle="modal" data-bs-target="#organization_review" value="<?= $row['organization_id'] ?>">
                                                            <i class="mdi mdi-account-check"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can-outline "></i></button>
                                                    </div>

                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </div>

                                    <div class="row">
                                        <div class="col-7 mt-1">
                                            Showing 1 - 20 of 289
                                        </div> <!-- end col-->
                                        <div class="col-5">
                                            <div class="btn-group float-end">
                                                <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                                                <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                                            </div>
                                        </div> <!-- end col-->
                                    </div>

                                    <div class="modal fade" id="organization_review" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <div class="mt-3">
                                                        <h5 class="font-18">Organization Request Details</h5>
                                                        <hr>
                                                        <span hidden="hidden" id="org_id"></span>

                                                        <div class="d-flex mb-3 mt-1">
                                                            <img class="d-flex me-2 rounded-circle" src="" alt="placeholder image" height="32" id="ephotourl">
                                                            <div class="w-100 overflow-hidden">

                                                                <p class="float-end" id="edate_created"></p>

                                                                <h6 class="m-0 mt-1 font-14">
                                                                    <span id="efirstname"></span>
                                                                    <span id="elastname"></span>
                                                                </h6>

                                                            </div>
                                                        </div>

                                                        <h4 id="eorg_name"></h4>
                                                        <p id="eorg_description"></p>
                                                        <hr>

                                                        <h5 class="mb-3">Attachments</h5>

                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <div class="card mb-1 shadow-none border">
                                                                    <div class="p-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <div class="avatar-sm">
                                                                                    <span class="avatar-title bg-primary-lighten text-primary rounded">
                                                                                        .DOCX
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col ps-0">
                                                                                <a href="javascript:void(0);" class="text-muted fw-bold">File</a>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <!-- Button -->
                                                                                <a href="javascript:void(0);" download="file" id="eattachments" class="btn btn-link btn-lg text-muted">
                                                                                    <i class="dripicons-download"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->

                                                        </div>
                                                        <!-- end row-->
                                                        <div class="mt-3">
                                                            <button class="btn btn-success me-2" id="approve" value="<?= $row['organization_id'] ?>"><i class="mdi mdi-account-check me-1"></i> Approve</button>
                                                            <button class="btn btn-danger" id="disapprove" value="<?= $row['organization_id'] ?>">Decline <i class="mdi mdi-trash-can-outline ms-1"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- end row-->
                                </div>
                                <!-- end inbox-rightbar-->
                            </div>
                            <!-- end card-body -->
                            <div class="clearfix"></div>
                        </div> <!-- end card-box -->

                    </div> <!-- end Col -->
                </div>

            </section>


        </div>


    </div>

    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>

    <?php require_once '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>