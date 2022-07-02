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


                    <div class="row">
                        <?php
                        $user_id = $_GET['user_id'];
                        $organization_id = $_GET['org_id'];
                        $department_id = $_GET['dept_id'];

                        $query = "SELECT * FROM departments WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id;";
                        $results = $conn->query($query);

                        while ($row = $results->fetch_row()) {
                        ?>
                            <!-- Standard modal -->
                            <div id="edit-department-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <form action="">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="department_name" class="form-label">Department Name</label>
                                                    <input type="text" class="form-control" id="department_name" aria-describedby="emailHelp" placeholder="Enter department name" value="<?php echo $row[1] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_description" class="form-label">Department Description</label>
                                                    <input type="text" class="form-control" id="department_description" placeholder="Enter department description" value="<?php echo $row[2] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_code" class="form-label">Department Code</label>
                                                    <input type="text" class="form-control" id="department_code" placeholder="Enter department code" value="<?php echo $row[3] ?>">
                                                </div>
                                                <div class="mb-1 mt-3">
                                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </form>
                            </div><!-- /.modal -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-gear"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->

                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-department-modal" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                    <img src="<?php echo $row[4]; ?>" class="img-fluid" style="max-width: 580px; min-width: 200px" alt="Product-img">
                                                </a>
                                            </div> <!-- end col -->
                                            <div class="col-lg-7">
                                                <form class="ps-lg-4">
                                                    <!-- Product title -->
                                                    <h1 class="mt-0"><?php echo $row[1]; ?></h1>
                                                    <p class="mb-1">Date Created: <b><?php echo $row[7]; ?></b></p>

                                                    <!-- Product stock -->
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten"><?php echo $row[3]; ?></span></h4>
                                                    </div>

                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Description:</h6>
                                                        <p><?php echo $row[2]; ?></p>
                                                    </div>
                                                <?php } ?>

                                                <!-- Department information -->

                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Members:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id;";
                                                            $results = $conn->query($query);
                                                            $total = $results->num_rows;
                                                            ?>
                                                            <p class="text-sm lh-150"><?php echo $total; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Organizers:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id AND usertype = 'organizer';";
                                                            $results = $conn->query($query);
                                                            $total = $results->num_rows;
                                                            ?>
                                                            <p class="text-sm lh-150"><?php echo $total; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Students:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id AND usertype = 'student';";
                                                            $results = $conn->query($query);
                                                            $total = $results->num_rows;
                                                            ?>
                                                            <p class="text-sm lh-150"><?php echo $total; ?></p>

                                                        </div>
                                                    </div>
                                                </div>

                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->



                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="row">
                                <div class="col-md-auto">
                                    <div class="card  p-3">
                                        <div class="mb-5 mt-3 mt-xl-0">
                                            <form action="../controllers/import.members.ctrls.php?" method="post" enctype="multipart/form-data">
                                                <h4 class="mb-2">Import CSV</h4>
                                                <p class="text-muted font-14">Import your CSV file here format should be Firstname, Middlename, Lastname, Course, Yearlevel</p>
                                                <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">
                                                <div class="mb-2">
                                                    <input type="file" class="form-control" name="file" id="file" rows="6"></input>
                                                </div>
                                                <div class="text-center"><button type="submit" name="import" class="btn btn-primary btn-rounded">Import</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                                                <thead class="table-light">
                                                    <tr>

                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Course</th>
                                                        <th>Year Level</th>
                                                        <th>Usertype</th>

                                                        <th style="width: 75px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $user_id = $_GET['user_id'];
                                                    $organization_id = $_GET['org_id'];
                                                    $department_id = $_GET['dept_id'];

                                                    $query = "SELECT * FROM members WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id;";
                                                    $results = $conn->query($query);
                                                    while ($row = $results->fetch_row()) {
                                                    ?>
                                                        <tr>
                                                            <td class="table-user">
                                                                <img src="../assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                                <a href="javascript:void(0);" class="text-body fw-semibold"><?php echo $row[1] ?> <?php echo $row[2] ?> <?php echo $row[3] ?></a>
                                                            </td>
                                                            <td><?php echo $row[4] ?></td>
                                                            <td><?php echo $row[5] ?></td>
                                                            <td>
                                                                <?php echo $row[6] ?>
                                                            </td>
                                                            <td><?php echo $row[7] ?></td>

                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon">
                                                                    <i class="mdi mdi-square-edit-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon">
                                                                    <i class="mdi mdi-delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
                    </div>
                </div>
            </div>

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