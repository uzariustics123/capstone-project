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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                        <li class="breadcrumb-item active">Create Project</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Organization</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- end row-->

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"><i class="mdi mdi-plus"></i> Create Organization</button>
                        </div>
                    </div>

                    <!-- Large modal -->
                    <form action="../controllers/add.organization.ctrls.php" method="post">
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
                                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.."></textarea>
                                                            </div>
                                                        </div> <!-- end col-->
                                                    </div>
                                                    <!-- end row -->
                                                    <div class="row text-center">
                                                        <div class="col"><button type="submit" name="submit" class="btn btn-primary btn-rounded">Primary</button></div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </form>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-md-6 col-xxl-3">
                            <!-- project card -->
                            <div class="card d-block">
                                <!-- project-thumbnail -->
                                <img class="card-img-top" src="../assets/images/projects/project-1.jpg" alt="project image cap">
                                <div class="card-img-overlay">
                                    <div class="badge bg-danger text-light p-1">Organization</div>
                                </div>

                                <div class="card-body position-relative">
                                    <!-- project title-->
                                    <h4 class="mt-0">
                                        <a href="apps-projects-details.html" class="text-title">Organization Name</a>
                                    </h4>

                                    <!-- project detail-->
                                    <p class="mb-3">
                                        <span class="pe-2 text-nowrap">
                                            <i class="mdi mdi-format-list-bulleted-type"></i>
                                            <b>5</b> Departments
                                        </span>
                                        <span class="text-nowrap">
                                            <i class="mdi mdi-comment-multiple-outline"></i>
                                            <b>104</b> Organizers
                                        </span>
                                    </p>
                                    <div class="mb-3" id="tooltip-container4">
                                        <a href="javascript:void(0);" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                                            <img src="../assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="friend">
                                        </a>

                                        <a href="javascript:void(0);" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                                            <img src="../assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                        </a>

                                        <a href="javascript:void(0);" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                                            <img src="../assets/images/users/avatar-9.jpg" class="rounded-circle avatar-xs" alt="friend">
                                        </a>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
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

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>