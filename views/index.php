<?php require_once '../includes/header.php'; ?>
<?php if (isset($user)) {
?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

    <div class="wrapper">
        <?php require_once '../includes/sidebar.php'; ?>
        <div class="content-page">
            <div class="content">
                <?php include_once '../includes/topbar.php'; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">My Organizations</h4>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"><i class="mdi mdi-plus"></i> Create Organization</button>
                        </div>
                    </div>
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
                                                            <input type="hidden" class="form-control" name="user_id" value="<?= $user; ?>">
                                                            <input type="hidden" class="form-control" name="email" value="<?= $email; ?>">
                                                            <div class="mb-3">
                                                                <label for="projectname" class="form-label">Name</label>
                                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" id="address" class="form-control" name="address" placeholder="Enter organization address" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="mb-5 mt-3 mt-xl-0">
                                                                <label for="projectname" class="mb-0">Organization Cover Photo</label>
                                                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image" id="image" rows="6" placeholder="Enter some brief details about the organization.." required></input>
                                                                </div>

                                                            </div>

                                                            <div class="mb-3 mt-3 mt-xl-0">
                                                                <label for="projectname" class="mb-0">Attachments</label>
                                                                <p class="text-muted font-14">Attach a document that proves that you have authorization to manage this organization.</p>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Attachment</label>
                                                                    <input type="file" class="form-control" name="attachment" id="attachment" rows="6" required></input>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center p-1">
                                                    <div class="col">
                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM organizations 
                        RIGHT OUTER JOIN members ON members.organization_id = organizations.organization_id 
                        WHERE members.user_reference_id = $user AND organizations.org_admin_id = $user;";
                        $results = $conn->query($query);
                        while ($row = $results->fetch_assoc()) {
                        ?>
                            <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                <div class="card d-block">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top img-fluid" style="object-fit: cover" src="<?php if (is_null($row['org_imgurl'])) {
                                                                                                            echo '../assets/images/projects/project-1.jpg';
                                                                                                        } else {
                                                                                                            echo $row['org_imgurl'];
                                                                                                        }
                                                                                                        ?>" alt="project image cap">
                                    <div class="card-img-overlay">
                                        <div class="badge <?php
                                                            if ($row['org_status'] == 'pending') {
                                                                echo 'bg-danger';
                                                            } else if ($row['org_status'] == 'approved') {
                                                                echo 'bg-success';
                                                            } else {
                                                                echo 'bg-danger';
                                                            }
                                                            ?> mb-3">
                                            <?= $row['org_status'] ?>
                                        </div>
                                    </div>
                                    <div class="card-body position-relative text-center">
                                        <h4 class="mt-0">
                                            <h4><?= $row['org_name'] ?></h4>
                                            <div class="text-center"><a href="pages-my-organization.php?id=<?= $row['organization_id'] ?>" class="btn btn-success">Manage Organization</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    <?php include_once '../includes/endbar.php'; ?>
    <div class="rightbar-overlay"></div>
    <?php include_once '../includes/footer.php'; ?>
<?php } else {
    header("location:../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>