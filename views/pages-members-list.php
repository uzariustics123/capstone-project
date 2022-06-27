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
                                                    <th style="width: 20px">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck1" />
                                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Course</th>
                                                    <th>Year Level</th>
                                                    <th>Department</th>
                                                    <th>Usertype</th>
                                                    <th>Revenue</th>
                                                    <th style="width: 75px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck2" />
                                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Paul J. Friend</a>
                                                    </td>
                                                    <td>Homovee</td>
                                                    <td>
                                                        <span class="fw-semibold">128</span>
                                                    </td>
                                                    <td>$128,250</td>
                                                    <td>07/07/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck4" />
                                                            <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Kathryn S. Collier</a>
                                                    </td>
                                                    <td>Epiloo</td>
                                                    <td>
                                                        <span class="fw-semibold">78</span>
                                                    </td>
                                                    <td>$89,458</td>
                                                    <td>06/30/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 34, 63, 25, 34, 12, 434, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck5" />
                                                            <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-1.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Timothy Kauper</a>
                                                    </td>
                                                    <td>Uberer</td>
                                                    <td>
                                                        <span class="fw-semibold">847</span>
                                                    </td>
                                                    <td>$258,125</td>
                                                    <td>09/08/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 34, 33, 25, 34, 50, 65, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck6" />
                                                            <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-5.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Zara Raws</a>
                                                    </td>
                                                    <td>Symic</td>
                                                    <td>
                                                        <span class="fw-semibold">235</span>
                                                    </td>
                                                    <td>$56,210</td>
                                                    <td>07/15/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 45, 34, 33, 34, 34, 50, 55, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck7" />
                                                            <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-6.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Annette P. Kelsch</a>
                                                    </td>
                                                    <td>Insulore</td>
                                                    <td>
                                                        <span class="fw-semibold">485</span>
                                                    </td>
                                                    <td>$330,251</td>
                                                    <td>09/05/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 30, 67, 33, 25, 34, 56, 65, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3" />
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="../assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" />
                                                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                                                    </td>
                                                    <td>Execucy</td>
                                                    <td>
                                                        <span class="fw-semibold">09</span>
                                                    </td>
                                                    <td>$78,410</td>
                                                    <td>09/12/2018</td>
                                                    <td>
                                                        <div class="spark-chart" data-dataset="[25, 66, 41, 45, 63, 25, 66, 12, 45, 9, 54]"></div>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="javascript:void(0);" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

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