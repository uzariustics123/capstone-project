<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>
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
                $user_id = $_GET['user_id'];
                $organization_id = $_GET['org_id'];
                $department_id = $_GET['dept_id'];
                ?>
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="pages-my-organization.php?id=<?= $organization_id ?>">My Organization</a></li>
                                        <li class="breadcrumb-item active"><a href="pages-my-department.php?user_id=<?= $user_id ?>&org_id=<?= $organization_id ?>&dept_id=<?= $department_id ?>">My Department</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">My Department</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <a href="pages-create-event.php" class="btn btn-primary type=" button" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Event</a>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $query = "SELECT * FROM departments WHERE user_id = $user_id AND organization_id = $organization_id AND department_id = $department_id;";
                        $results = $conn->query($query);

                        while ($row = $results->fetch_assoc()) {
                        ?>
                            <!-- Standard modal -->
                            <div id="edit-department-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <form action="../controllers/edit.department.ctrls.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                                <input type="hidden" name="organization_id" value="<?= $organization_id ?>">
                                                <input type="hidden" name="department_id" value="<?= $department_id ?>">
                                                <div class="mb-3">
                                                    <label for="department_name" class="form-label">Department Name</label>
                                                    <input type="text" class="form-control" name="department_name" id="department_name" aria-describedby="emailHelp" placeholder="Enter department name" value="<?= $row['department_name'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_description" class="form-label">Department Description</label>
                                                    <input type="text" class="form-control" name="department_desc" id="department_description" placeholder="Enter department description" value="<?= $row['department_description'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department_code" class="form-label">Department Code</label>
                                                    <input type="text" class="form-control" name="department_code" id="department_code" placeholder="Enter department code" value="<?= $row['department_code'] ?>">
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
                                                <a href="../controllers/delete.department.ctrls.php?dept_id=<?= $department_id ?>&org_id=<?= $organization_id ?>" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                    <img src="<?= $row['department_image']; ?>" class="img-fluid" style="max-width: 580px; min-width: 200px" alt="Product-img">
                                                </a>
                                            </div> <!-- end col -->
                                            <div class="col-lg-7">
                                                <form class="ps-lg-4">
                                                    <!-- Product title -->
                                                    <h1 class="mt-0"><?= $row['department_name']; ?></h1>
                                                    <p class="mb-1">Date Created: <b><?= $row['date_created']; ?></b></p>

                                                    <!-- Product stock -->
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten"><?= $row['department_code']; ?></span></h4>
                                                    </div>

                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Description:</h6>
                                                        <p><?= $row['department_description']; ?></p>
                                                    </div>
                                                <?php } ?>

                                                <!-- Department information -->

                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Members:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE importer_id = $user_id AND organization_id = $organization_id AND department_id = $department_id;";
                                                            $results = $conn->query($query);
                                                            $total = $results->num_rows;

                                                            ?>
                                                            <p class="text-sm lh-150"><?= $total; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Organizers:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE importer_id = $user_id AND organization_id = $organization_id AND department_id = $department_id AND usertype = 'organizer';";
                                                            $results = $conn->query($query);
                                                            $total = $results->num_rows;

                                                            ?>
                                                            <p class="text-sm lh-150"><?= $total; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Total Number of Students:</h6>
                                                            <?php
                                                            $query = "SELECT * FROM members WHERE importer_id = $user_id AND organization_id = $organization_id AND department_id = $department_id AND usertype = 'student';";
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

                            <div class="row">
                                <div class="col-md-auto">
                                    <div class="card  p-3">
                                        <div class="mb-5 mt-3 mt-xl-0">
                                            <form action="../controllers/import.members.ctrls.php?" method="post" enctype="multipart/form-data">
                                                <h4 class="mb-2">Import CSV</h4>
                                                <p class="text-muted font-14">Import your CSV file here format should be Firstname, Middlename, Lastname, Course, Yearlevel</p>
                                                <input type="hidden" name="department_id" value="<?= $department_id; ?>">
                                                <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                                <input type="hidden" name="organization_id" value="<?= $organization_id; ?>">
                                                <div class="mb-2">
                                                    <input type="file" class="form-control" name="file" id="file" rows="6" required></input>
                                                </div>
                                                <div class="text-center"><button type="submit" name="import" class="btn btn-primary">Import</button></div>
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
                                <h3 class="page-title mt-5">Members</h3>
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
                                                        <th>Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $importer_id = $_GET['user_id'];
                                                    $organization_id = $_GET['org_id'];
                                                    $department_id = $_GET['dept_id'];

                                                    $query = "SELECT * FROM members WHERE importer_id = $importer_id AND organization_id = $organization_id AND department_id = $department_id;";
                                                    $results = $conn->query($query);
                                                    while ($row = $results->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td class="table-user">
                                                                <span hidden id="importer_id<?php echo $row['user_id']; ?>"><?php echo $row['importer_id']; ?></span>
                                                                <span hidden id="organization_id<?php echo $row['user_id']; ?>"><?php echo $row['organization_id']; ?></span>
                                                                <span hidden id="department_id<?php echo $row['user_id']; ?>"><?php echo $row['department_id']; ?></span>

                                                                <img src="../assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                                <a href="javascript:void(0);" class="text-body fw-semibold">
                                                                    <span id="firstname<?php echo $row['user_id']; ?>"><?php echo $row['firstname']; ?></span>
                                                                    <span id="middlename<?php echo $row['user_id']; ?>"><?php echo $row['middlename']; ?></span>
                                                                    <span id="lastname<?php echo $row['user_id']; ?>"><?php echo $row['lastname']; ?></span>
                                                                </a>
                                                            </td>
                                                            <td><span id="email<?php echo $row['user_id']; ?>"><?php echo $row['email']; ?></span></td>
                                                            <td><span id="course<?php echo $row['user_id']; ?>"><?php echo $row['course']; ?></span></td>
                                                            <td><span id="yearlevel<?php echo $row['user_id']; ?>"><?php echo $row['yearlevel']; ?></span></td>

                                                            <td><span id="usertype<?php echo $row['user_id']; ?>"><?php if ($row['usertype'] == 'organizer') { ?>
                                                                        <span class="badge bg-primary">Organizer</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge bg-success">Member</span>
                                                                    <?php } ?></span></td>
                                                            <td class="table-action">
                                                                <button data-bs-toggle="modal" data-bs-target="#edit-member-modal" class="action-icon edit-custom btn btn-success btn-light" value="<?php echo $row['user_id']; ?>">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <!-- Standard modal -->
                                                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="#" enctype="multipart/form-data">
                                                                            <input type="hidden" id="eimporter_id" name="importer_id">
                                                                            <input type="hidden" id="eorganization_id" name="organization_id">
                                                                            <input type="hidden" id="edepartment_id" name="department_id">
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="firstname" class="form-label">Firstname</label>
                                                                                <input type="input" name="firstname" class="form-control" id="efirstname" required>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="middlename" class="form-label">Middlename</label>
                                                                                <input type="input" name="middlename" class="form-control" id="emiddlename" required>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="department" class="form-label">Lastname</label>
                                                                                <input type="input" name="lastname" class="form-control" id="elastname" required>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" name="email" class="form-control" id="eemail" required>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="ecourse" class="form-label">Course</label>
                                                                                <input type="input" name="ecourse" class="form-control" id="ecourse" required>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="yearlevel-select" class="form-label">Year Level</label>
                                                                                <select class="form-select" name="yearlevel-select" id="eyearlevel-select">
                                                                                    <option value="1">1st</option>
                                                                                    <option value="2">2nd</option>
                                                                                    <option value="3">3rd</option>
                                                                                    <option value="4">4th</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-1 mt-1">
                                                                                <label for="usertype-select" class="form-label">Usertype</label>
                                                                                <select class="form-select" name="eusertype-select" id="eusertype-select">
                                                                                    <option value="1">Member</option>
                                                                                    <option value="2">Organizer</option>
                                                                                </select>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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


    </div>
    <!-- END wrapper -->
    <?php include '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php include '../includes/footer.php'; ?>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-custom', function() {
                var id = $(this).val();
                var importer_id = $('#importer_id' + id).text();
                var organization_id = $('#organization_id' + id).text();
                var department_id = $('#department_id' + id).text();
                var firstname = $('#firstname' + id).text();
                var middlename = $('#middlename' + id).text();
                var lastname = $('#lastname' + id).text();
                var email = $('#email' + id).text();
                var course = $('#course' + id).text();
                var yearlevel = $('#yearlevel' + id).text();
                var usertype = $('#usertype' + id).text();


                $('#edit').modal('show');
                $('#eimporter_id').val(importer_id);
                $('#eorganization_id').val(organization_id);
                $('#edepartment_id').val(department_id);
                $('#efirstname').val(firstname);
                $('#emiddlename').val(middlename);
                $('#elastname').val(lastname);
                $('#eemail').val(email);
                $('#ecourse').val(course);
                if (yearlevel == '1st') {
                    $('#eyearlevel-select option[value="1"]').attr("selected", true);
                } else if (yearlevel == '2nd') {
                    $('#eyearlevel-select option[value="2"]').attr("selected", true);
                } else if (yearlevel == '3rd') {
                    $('#eyearlevel-select option[value="3"]').attr("selected", true);
                } else if (yearlevel == '4th') {
                    $('#eyearlevel-select option[value="4"]').attr("selected", true);
                }

                if (usertype == 'member') {
                    $('#eusertype-select option[value="1"]').attr("selected", true);
                } else if (usertype == 'organizer') {
                    $('#eusertype-select option[value="2"]').attr("selected", true);
                }
            });
        });
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>