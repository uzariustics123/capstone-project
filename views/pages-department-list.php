<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <?php
    $organization_id = $_GET['org_id'];

    ?>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include '../includes/sidebar.php' ?>
        <!-- Begin page -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <?php if (isset($_SESSION['status'])) {
                $status = $_SESSION['status'];
                echo "<span>$status</span>";
            } ?>


            <div class="content">
                <?php include '../includes/topbar.php' ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h4 class="page-title">My Organization</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <?php
                    $query = "SELECT * FROM organizations WHERE organization_id = $organization_id;";
                    $results = $conn->query($query);

                    while ($row = $results->fetch_assoc()) {
                    ?>
                        <!-- Standard modal -->
                        <div id="organization_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                            <form action="../controllers/edit.organization.ctrls.php" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <input type="hidden" class="form-control" name="organization_id" value="<?= $organization_id ?>">
                                            <input type="hidden" class="form-control" name="org_imgurl" value="<?= $row['org_imgurl']; ?>">
                                            <div class="mb-3">
                                                <label for="projectname" class="form-label">Name</label>
                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" value="<?= $row['org_name'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" id="address" class="form-control" name="address" placeholder="Enter organization name" value="<?= $row['org_address'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required><?= $row['org_description'] ?></textarea>
                                            </div>
                                            <div class="mb-1 mt-3">
                                                <label for="exampleInputPassword1" class="form-label">Image</label>
                                                <input type="file" name="image" class="form-control" placeholder="Image" required>
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


                        <div class="row">
                            <div class="col-lg-12">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-dots-3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="../controllers/edit.organization.ctrls.php?id=<?= $row['organization_id'] ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#organization_modal"> <i class="mdi mdi-square-edit-outline me-1"></i>Edit</a>
                                                <!-- item-->

                                                <a href="javascript:void(0)" id="delete-organization" class="dropdown-item delete-organization" data-org_id=<?= $organization_id ?>>
                                                    <i class="mdi mdi-delete me-1"></i>Delete
                                                </a>
                                            </div>
                                        </div>
                                        <!-- project title-->
                                        <img src="<?= $row['org_imgurl'] ?>" class="img-fluid rounded" alt="background image" style="max-width: 600px">
                                        <h2 class="mt-3">
                                            <?= $row['org_name'] ?>
                                        </h2>
                                        <div class="badge bg-danger mb-3">Organization</div>

                                        <h3>Organization Details:</h3>

                                        <p class="text-muted mb-2">
                                            <?= $row['org_description'] ?>
                                        </p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Date Created</h5>
                                                    <p><?= $row['date_created'] ?></p>
                                                </div>
                                            </div>
                                            <?php
                                            $query = "SELECT * FROM users
                                                        RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
                                                        RIGHT OUTER JOIN organizations ON organizations.organization_id = members.organization_id
                                                        WHERE members.usertype = 'admin' AND members.organization_id = $organization_id      
                                                        ;";
                                            $results = $conn->query($query);
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <h5>Created by:</h5>
                                                        <p><?= $row['firstname'] ?> <?= $row['lastname'] ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->

                            </div>
                        </div><!-- end col -->
                </div>
                <!-- end row -->

            </div>

        <?php } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title">Departments</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $query = "SELECT * FROM departments
                RIGHT OUTER JOIN members ON members.department_id = departments.department_id
                WHERE members.organization_id = $organization_id
                AND member_email = '$email'";
                $results = $conn->query($query);
                while ($row = $results->fetch_assoc()) {
                ?>
                    <div class="col-md-6 col-xxl-3">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="dropdown card-widgets">
                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="dripicons-dots-3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="../views/pages-my-department.php?org_id=<?= $organization_id ?>&dept_id=<?= $row['department_id'] ?>&usertype=<?= base64_encode($row['usertype']) ?>" class="dropdown-item"><i class="mdi mdi-eye-circle-outline me-1"></i>View</a>
                                        <!-- item-->
                                    </div>

                                </div>
                                <!-- project title-->
                                <!-- Thumbnail-->

                                <div class="text-center"><img src="<?= $row['dept_imgurl'] ?>" alt="image" class="img-fluid rounded mt-2" width="250" /></div>


                                <h2 class="mt-3">
                                    <?= $row['dept_name'] ?>
                                </h2>
                                <div class="badge bg-success text-light mb-3"><?= $row['dept_code'] ?></div>

                                <p class="text-muted font-13 mb-3"><?= $row['dept_description'] ?>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>

                <?php } ?>
            </div>

        </div><!-- container -->
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