<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>

    <!-- Begin page -->
    <div class="wrapper">
        <?php include '../includes/sidebar.php' ?>
        <div class="content-page">
            <?php include '../includes/topbar.php' ?>
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row mt-3">
                        <div class="col-xl-6 col-lg-7">
                            <div class="card">
                                <?php
                                $query = "SELECT * FROM users WHERE userid = $user;";
                                $results = $conn->query($query);
                                $row = $results->fetch_assoc();
                                if (!empty($row)) {
                                ?>

                                    <!-- Standard modal -->
                                    <div id="organization_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <form action="../controllers/edit.profile.ctrls.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update Profile</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-2">
                                                            <input type="hidden" name="user_id" value="<?= $user ?>">
                                                            <input type="hidden" name="usertype" value="<?= $usertype ?>">
                                                            <input type="hidden" name="photourl" value="<?= $row['photourl'] ?>">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="firstname" class="form-label">Firstname</label>
                                                                <input type="text" value="<?= $row['firstname'] ?>" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="lastname" class="form-label">Lastname</label>
                                                                <input type="text" value="<?= $row['lastname'] ?>" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" name="image" class="form-control" id="image" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="mobile" class="form-label">Mobile Number</label>
                                                            <input type="text" value="<?= $row['mobile'] ?>" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bio" class="form-label">Bio</label>
                                                            <textarea class="form-control" id="bio" rows="10" name="bio"><?= $row['bio'] ?></textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" value="<?= $row['address'] ?>" class="form-control" id="address" name="address" placeholder="1234 Main St">
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

                                    <div class="card-body text-center">

                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-gear"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#organization_modal"> <i class="mdi mdi-square-edit-outline me-1"></i>Edit Profile</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changepass"> <i class="mdi mdi-lock-alert-outline me-1"></i>Change Password</a>
                                            </div>
                                        </div>

                                        <img src="<?php if (is_null($row['photourl'])) {
                                                        echo '../assets/images/users/avatar-1.jpg';
                                                    } else {
                                                        echo $row['photourl'];
                                                    }
                                                    ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" />

                                        <h4 class="mb-0 mt-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h4>
                                        <p class="text-muted font-14">Administrator</p>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">
                                            </p>
                                            <p class="text-muted mb-2 font-13">
                                                <strong>Full Name :</strong>
                                                <span class="ms-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Mobile :</strong><span class="ms-2"><?= $row['mobile'] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Email :</strong>
                                                <span class="ms-2"><?= $row['email'] ?></span>
                                            </p>
                                            <p class="text-muted mb-1 font-13">
                                                <strong>Location :</strong>
                                                <span class="ms-2"><?= $row['address'] ?></span>
                                            </p>
                                            <p class="text-muted mb-1 font-13">
                                                <strong>Bio :</strong>
                                                <span class="ms-2"><?= $row['bio'] ?></span>
                                            </p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Generate QR Code</button>
                                    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <?php
                                                        include "../assets/phpqrcode/qrlib.php";
                                                        $PNG_TEMP_DIR = '../assets/images/temp/';
                                                        if (!file_exists($PNG_TEMP_DIR))
                                                            mkdir($PNG_TEMP_DIR);
                                                        $filename = $PNG_TEMP_DIR . 'test.png';
                                                        $codeString = $user;
                                                        $hexed = $codeString . $row['firstname'] . $row['lastname'];
                                                        $filename = $PNG_TEMP_DIR . 'test' . md5($hexed) . '.png';
                                                        QRcode::png($hexed, $filename);
                                                        $file = $PNG_TEMP_DIR . basename($filename);
                                                        ?>
                                                        <?= '<img src="' . $file . '" alt="" height="200">'; ?>
                                                        <button type="button" id="deleteqr" class="btn btn-info my-2" data-bs-dismiss="modal" data-image="<?= $file ?>">Continue</button>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
                <!-- container -->
            </div>
        <?php
                                } else { ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-xl-12 col-lg-12">
                            <?php
                                    $query = "SELECT * FROM members WHERE member_id = $user;";
                                    $results = $conn->query($query);
                                    $row = $results->fetch_assoc();
                                    if (!empty($row)) {

                            ?>
                                <div class="card">
                                    <!-- Standard modal -->
                                    <div id="organization_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <form action="../controllers/edit.profile.ctrls.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update Profile</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-2">
                                                            <input type="hidden" name="user_id" value="<?= $user ?>">
                                                            <input type="hidden" name="usertype" value="<?= $suertype ?>">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="firstname" class="form-label">Firstname</label>
                                                                <input type="text" value="<?= $row['firstname'] ?>" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="lastname" class="form-label">Lastname</label>
                                                                <input type="text" value="<?= $row['lastname'] ?>" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" name="image" class="form-control" id="image" required>
                                                            </div>
                                                        </div>
                                                        <?php if (!empty($row['mobile'])) { ?>
                                                            <div class="mb-3">
                                                                <label for="mobile" class="form-label">Mobile Number</label>
                                                                <input type="text" value="<?= $row['mobile'] ?>" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (!empty($row['bio'])) { ?>
                                                            <div class="mb-3">
                                                                <label for="bio" class="form-label">Bio</label>
                                                                <textarea class="form-control" id="bio" rows="10" name="bio"><?= $row['bio'] ?></textarea>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (!empty($row['address'])) { ?>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" value="<?= $row['address'] ?>" class="form-control" id="address" name="address" placeholder="1234 Main St">
                                                            </div>
                                                        <?php } ?>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </form>
                                    </div><!-- /.modal -->

                                    <div class="card-body text-center">

                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="dripicons-gear"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#organization_modal"> <i class="mdi mdi-square-edit-outline me-1"></i>Edit Profile</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changepass"> <i class="mdi mdi-lock-alert-outline me-1"></i>Change Password</a>
                                            </div>
                                        </div>

                                        <img src="<?php if (is_null($row['image'])) {
                                                        echo '../assets/images/users/avatar-1.jpg';
                                                    } else {
                                                        echo $row['image'];
                                                    }
                                                    ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" />

                                        <h4 class="mb-0 mt-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h4>
                                        <p class="text-muted font-14"><?= $row['usertype'] ?></p>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">

                                            </p>
                                            <p class="text-muted mb-2 font-13">
                                                <strong>Full Name :</strong>
                                                <span class="ms-2"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Course :</strong><span class="ms-2"><?= $row['course'] ?></span>
                                            </p>

                                            <p class="text-muted mb-2 font-13">
                                                <strong>Email :</strong>
                                                <span class="ms-2"><?= $row['email'] ?></span>
                                            </p>
                                            <?php if (!empty($row['address'])) { ?>
                                                <p class="text-muted mb-1 font-13">
                                                    <strong>Location :</strong>
                                                    <span class="ms-2"><?= $row['address'] ?></span>
                                                </p>
                                            <?php } ?>
                                            <?php if (!empty($row['bio'])) { ?>
                                                <p class="text-muted mb-1 font-13">
                                                    <strong>Bio :</strong>
                                                    <span class="ms-2"><?= $row['bio'] ?></span>
                                                </p>
                                            <?php } ?>

                                        </div>

                                    </div>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Generate QR</button>
                                    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <?php
                                                        include "../assets/phpqrcode/qrlib.php";
                                                        $PNG_TEMP_DIR = '../assets/images/temp/';
                                                        if (!file_exists($PNG_TEMP_DIR))
                                                            mkdir($PNG_TEMP_DIR);
                                                        $filename = $PNG_TEMP_DIR . 'test.png';
                                                        $codeString = $user;
                                                        $hexed = $codeString . $row['firstname'] . $row['lastname'];
                                                        $filename = $PNG_TEMP_DIR . 'test' . md5($hexed) . '.png';
                                                        QRcode::png($hexed, $filename);
                                                        $file = $PNG_TEMP_DIR . basename($filename);
                                                        ?>
                                                        <?= '<img src="' . $file . '" alt="" height="200">'; ?>
                                                        <button type="button" id="deleteqr" class="btn btn-info my-2" data-bs-dismiss="modal" data-image="<?= $file ?>">Continue</button>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                </div>
                                <!-- end card -->
                            <?php } ?>
                        </div>
                        <!-- end col-->
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php include '../includes/endbar.php' ?>
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->
    <script src="../assets/js/customscript.js"></script>
    <?php include '../includes/footer.php'; ?>
<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>