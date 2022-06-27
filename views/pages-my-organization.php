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
                                <h4 class="page-title">My Organization</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <?php

                    $organization_id = $_GET['id'];
                    $query = "SELECT * FROM organizations WHERE organization_id = $organization_id;";
                    $results = $conn->query($query);

                    while ($row = $results->fetch_row()) {
                    ?>
                        <!-- /.modal Start -->
                        <form action="../controllers/edit.organization.ctrls.php" method="post">
                            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $user; ?>">
                                                                <input type="hidden" class="form-control" name="organization_id" value="<?php echo $row[0]; ?>">
                                                                <div class="mb-3">
                                                                    <label for="projectname" class="form-label">Name</label>
                                                                    <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" value="<?php echo $row[1] ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Organization Details</label>
                                                                    <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.."><?php echo $row[2] ?></textarea>
                                                                </div>
                                                            </div> <!-- end col-->
                                                        </div>
                                                        <!-- end row -->

                                                    </div> <!-- end card-body -->
                                                    <div class="modal-footer text-center p-1">
                                                        <div class="col"><button type="submit" name="submit" class="btn btn-primary btn-rounded">Submit</button></div>
                                                    </div>
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </form>
                        <!-- end row-->
                        <!-- /.modal -->

                        <div class="row">
                            <div class="col-xxl-8 col-lg-6">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-dots-3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="../controllers/edit.organization.ctrls.php?id=<?php echo $row[0] ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"> <i class="mdi mdi-square-edit-outline me-1"></i>Edit</a>
                                                <!-- item-->
                                                <a href="../controllers/delete.organization.ctrls.php?id=<?php echo $row[0] ?>" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            </div>



                                        </div>
                                        <!-- project title-->
                                        <img src="<?php echo $row[6] ?>" class="img-fluid rounded" alt="background image">
                                        <h2 class="mt-3">
                                            <?php echo $row[1] ?>
                                        </h2>
                                        <div class="badge bg-danger mb-3">Organization</div>

                                        <h3>Organization Details:</h3>

                                        <p class="text-muted mb-2">
                                            <?php echo $row[2] ?>
                                        </p>

                                        <div class="row">
                                            <?php
                                            $query = "SELECT * FROM users WHERE user_id = $user;";
                                            $results = $conn->query($query);
                                            while ($row = $results->fetch_row()) {
                                            ?>
                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <h5>Created by:</h5>
                                                        <p><?php echo $row[01] ?> <?php echo $row[2] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <h5>Date Created</h5>
                                                        <p>22 December 2018 <small class="text-muted">1:00 PM</small></p>
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
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Import</h5>
                                        <div class="">
                                            <p class="text-muted font-14">Import your CSV file here</p>
                                            <div action="/" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                <div class="fallback">
                                                    <input name="file" type="file">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <i class="h3 text-muted dripicons-cloud-upload"></i>
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </div>

                                            <!-- Preview -->
                                            <div class="dropzone-previews mt-3" id="file-previews"></div>

                                            <!-- file preview template -->
                                            <div class="d-none" id="uploadPreviewTemplate">
                                                <div class="card mt-1 mb-0 shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                                                            </div>
                                                            <div class="col ps-0">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                                                <p class="mb-0" data-dz-size=""></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                                                    <i class="dripicons-cross"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end file preview template -->
                                            <div class="text-center p-1">
                                                <div class="col"><button type="submit" name="submit" class="btn btn-primary btn-rounded">Submit</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                </div> <!-- container -->



                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Members</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                                            <thead class="table-dark">
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Course</th>
                                                    <th>Year Level</th>
                                                    <th>Department</th>
                                                    <th>Usertype</th>

                                                    <th style="width: 75px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM members WHERE user_id = $user AND organization_id = $organization_id;";
                                                $results = $conn->query($query);
                                                while ($row = $results->fetch_row()) {
                                                ?>
                                                    <tr>

                                                        <td class="table-user">
                                                            <img src="../assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?php echo $row[1] ?> <?php echo $row[2] ?> <?php echo $row[3] ?></a>
                                                        </td>
                                                        <td><?php echo $row[4] ?></td>
                                                        <td>
                                                            <?php echo $row[5] ?>
                                                        </td>
                                                        <td><?php echo $row[6] ?></td>
                                                        <td><?php echo $row[7] ?></td>


                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon">
                                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon">
                                                                <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <!-- end row -->

                </div> <!-- container -->
            </div> <!-- content -->
        </div>
    <?php } ?>
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