<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>

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
                                <h3 class="page-title">My Organization</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <?php

                    $organization_id = $_GET['id'];
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
                                            <input type="hidden" class="form-control" name="user_id" value="<?= $user; ?>">
                                            <input type="hidden" class="form-control" name="organization_id" value="<?= $row['organization_id']; ?>">
                                            <div class="mb-3">
                                                <label for="projectname" class="form-label">Name</label>
                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" value="<?= $row['organization_name'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required><?= $row['organization_description'] ?></textarea>
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
                            <div class="col-lg-8">
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
                                                <a href="../controllers/delete.organization.ctrls.php?id=<?= $row['organization_id'] ?>" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            </div>



                                        </div>
                                        <!-- project title-->
                                        <img src="<?= $row['image'] ?>" class="img-fluid rounded" alt="background image">
                                        <h2 class="mt-3">
                                            <?= $row['organization_name'] ?>
                                        </h2>
                                        <div class="badge bg-danger mb-3">Organization</div>

                                        <h3>Organization Details:</h3>

                                        <p class="text-muted mb-2">
                                            <?= $row['organization_description'] ?>
                                        </p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Date Created</h5>
                                                    <p><?= $row['date_created'] ?></p>
                                                </div>
                                            </div>
                                            <?php
                                            $query = "SELECT * FROM users WHERE user_id = $user;";
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

                                        <div id="tooltip-container">
                                            <h5>Team Members:</h5>
                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-6.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-7.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-8.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-4.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-5.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                                                <img src="../assets/images/users/avatar-3.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                            </a>
                                        </div>

                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->

                            </div>
                            <div class="col-lg-4">
                                <div class="card card-block p-3">
                                    <div class="mb-3 mt-5 mt-xl-0">
                                        <form method="post" action="../controllers/add.department.ctrls.php" enctype="multipart/form-data">
                                            <h4 class="mb-3">Add Department</h4>
                                            <input type="hidden" class="form-control" name="user_id" value="<?= $user; ?>">
                                            <input type="hidden" class="form-control" name="organization_id" value="<?= $organization_id = $_GET['id']; ?>">
                                            <div class="mb-1 mt-3">
                                                <label for="department" class="form-label">Department Name</label>
                                                <input type="input" name="department_name" class="form-control" id="department" aria-describedby="emailHelp" placeholder="Enter department name.." required>
                                            </div>
                                            <div class="mb-1 mt-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="input" name="department_desc" class="form-control" id="description" placeholder="Enter department description..">
                                            </div>
                                            <div class="mb-1 mt-3">
                                                <label for="code" class="form-label">Department Code</label>
                                                <input type="input" name="department_code" class="form-control" id="code" placeholder="Enter department code.." required>
                                            </div>
                                            <div class="mb-1 mt-3">
                                                <label for="projectname" class="mb-0">Department Cover Photo</label>
                                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px). Only accepts jpg, jpeg, png file format</p>
                                                <div class="mb-3">
                                                    <input type="file" class="form-control" name="image" id="image" rows="6"></input>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                            </div>

                        </div><!-- end col -->

                </div>
                <!-- end row -->

            </div>




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
                        $query = "SELECT * FROM departments WHERE user_id = $user AND organization_id = $organization_id;";
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
                                            <a href="../views/pages-my-department.php?user_id=<?= $user; ?>&org_id=<?= $organization_id ?>&dept_id=<?= $row['department_id'] ?>" class="dropdown-item"><i class="mdi mdi-account-cog me-1"></i>Manage</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                    <!-- project title-->
                                    <!-- Thumbnail-->
                                    <div class="text-center"><img src="<?= $row['department_image'] ?>" alt="image" class="img-fluid rounded mt-2" width="250" /></div>

                                    <h2 class="mt-3">
                                        <a href="apps-projects-details.html" class="text-title"><?= $row['department_name'] ?></a>
                                    </h2>
                                    <div class="badge bg-secondary text-light mb-3"><?= $row['department_code'] ?></div>

                                    <p class="text-muted font-13 mb-3"><?= $row['department_description'] ?>
                                    </p>

                                    <!-- project detail-->
                                    <p class="mb-1">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                            <b>12</b> Tasks
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>482</b> Comments
                                        </span>
                                    </p>
                                    <div id="tooltip-container2">
                                        <a href="javascript:void(0);" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                                            <img src="../assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="friend">
                                        </a>

                                        <a href="javascript:void(0);" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                                            <img src="../assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                        </a>
                                    </div>
                                </div> <!-- end card-body-->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <!-- project progress-->
                                        <p class="mb-2 fw-bold">Progress <span class="float-end">63%</span></p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;">
                                            </div><!-- /.progress-bar -->
                                        </div><!-- /.progress -->
                                    </li>
                                </ul>
                            </div> <!-- end card-->
                        </div>

                    <?php } ?>
                </div>

            </div><!-- container -->
        <?php } ?>
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
    <script>
        $(function(e) {
            var error = `<?= $_GET['error']; ?>`;
            if (error === 'stmtfailed') {
                e.NotificationApp.send(
                    'Oh snap!',
                    'Change a few things up and try submitting again.',
                    'top-right',
                    'rgba(0,0,0,0.2)',
                    'error'
                );
            }
            if (error === 'editsuccess') {
                e.NotificationApp.send(
                    'Well Done!',
                    'Edit Success.',
                    'top-right',
                    'rgba(0,0,0,0.2)',
                    'success'
                );
            }
            if (error === 'none') {
                e.NotificationApp.send(
                    'Well Done!',
                    'Added a new Department.',
                    'top-right',
                    'rgba(0,0,0,0.2)',
                    'success'
                );
            }

        });
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>