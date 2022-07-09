<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <?php include '../includes/sidebar.php' ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include '../includes/topbar.php' ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h4 class="page-title">My Organizations</h4>
                            </div>
                        </div>
                    </div>

                    <!-- end row-->

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"><i class="mdi mdi-plus"></i> Create Organization</button>
                        </div>
                    </div>

                    <!-- Large modal -->
                    <form action="../controllers/add.organization.ctrls.php" method="post" enctype="multipart/form-data">
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
                                                            <div class="mb-3">
                                                                <label for="projectname" class="form-label">Name</label>
                                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required></textarea>
                                                            </div>

                                                        </div> <!-- end col-->

                                                        <div class="col-xl-6">
                                                            <div class="mb-3 mt-3 mt-xl-0">
                                                                <label for="projectname" class="mb-0">Organization Cover Photo</label>
                                                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image" id="image" rows="6" placeholder="Enter some brief details about the organization.." required></input>
                                                                </div>

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



                    <div class="row">
                        <?php
                        $query = "SELECT * FROM organizations WHERE user_id = $user;";
                        $results = $conn->query($query);
                        while ($row = $results->fetch_row()) {

                        ?>

                            <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                <div class="card d-block">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top img-fluid" src="<?php if (is_null($row[6])) {
                                                                                    echo '../assets/images/projects/project-1.jpg';
                                                                                } else {
                                                                                    echo $row[6];
                                                                                }
                                                                                ?>" alt="project image cap">
                                    <div class="card-img-overlay">
                                        <div class="badge bg-danger p-1">Organization</div>
                                    </div>

                                    <div class="card-body position-relative">
                                        <!-- project title-->
                                        <h4 class="mt-0">
                                            <a href="apps-projects-details.html" class="text-title"><?php echo $row[1] ?></a>
                                        </h4>
                                        <!-- project detail-->
                                        <p class="mb-3">
                                            <?php
                                            $query = "SELECT * FROM departments WHERE organization_id = $row[0] ;";
                                            $result = $conn->query($query);
                                            $total = $result->num_rows;
                                            ?>
                                            <span class="pe-2 text-nowrap">
                                                <i class="mdi mdi-format-list-bulleted-type"></i>
                                                <b><?= $total ?></b> Departments
                                            </span>
                                            <span class="text-nowrap">
                                                <i class="mdi mdi-comment-multiple-outline"></i>
                                                <b>104</b> Organizers
                                            </span>
                                        </p>

                                        <div class="text-center"><a href="pages-my-organization.php?id=<?php echo $row[0] ?>" class="btn btn-success ">Manage Organization</a></div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        <?php
                        }
                        ?>
                        <!-- end col -->
                    </div>

                    <!-- end row-->
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

    <script>
        $(function(e) {

            var error = `<?= $_GET['error']; ?>`;
            if (error === 'none') {
                e.NotificationApp.send(
                    'Well Done!',
                    'You successfully added an organization.',
                    'top-right',
                    'rgba(0,0,0,0.2)',
                    'success'
                );
            }
            if (error === 'success') {
                e.NotificationApp.send(
                    'Well Done!',
                    'You successfully logged.',
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