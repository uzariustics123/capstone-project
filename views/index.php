<?php include '../includes/header.php' ?>
<?php if (isset($user) && $usertype == 'Administrator') { ?>

    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

    <div class="wrapper">
        <?php include '../includes/sidebar.php' ?>
        <div class="content-page">
            <div class="content">
                <?php include '../includes/topbar.php' ?>
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
                                                            <div class="mb-3">
                                                                <label for="projectname" class="form-label">Name</label>
                                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="mb-3 mt-3 mt-xl-0">
                                                                <label for="projectname" class="mb-0">Organization Cover Photo</label>
                                                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image" id="image" rows="6" placeholder="Enter some brief details about the organization.." required></input>
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
                        $query = "SELECT * FROM organizations WHERE user_id = $user;";
                        $results = $conn->query($query);
                        while ($row = $results->fetch_assoc()) {
                        ?>
                            <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                <div class="card d-block">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top img-fluid" src="<?php if (is_null($row['org_imgurl'])) {
                                                                                    echo '../assets/images/projects/project-1.jpg';
                                                                                } else {
                                                                                    echo $row['org_imgurl'];
                                                                                }
                                                                                ?>" alt="project image cap">
                                    <div class="card-img-overlay">
                                        <div class="badge bg-danger p-1">Organization</div>
                                    </div>
                                    <div class="card-body position-relative">
                                        <h4 class="mt-0">
                                            <h4><?= $row['org_name'] ?></h4>
                                            <p class="mb-3">
                                                <?php
                                                $org_id = $row['organization_id'];
                                                $query = "SELECT * FROM departments WHERE organization_id = $org_id ;";
                                                $result = $conn->query($query);
                                                $total = $result->num_rows;
                                                $assoc = $result->fetch_assoc();
                                                ?>
                                                <span class="pe-2 text-nowrap">
                                                    <i class="mdi mdi-format-list-bulleted-type"></i>
                                                    <b><?= $total ?></b> Departments
                                                </span>
                                                <span class="text-nowrap">
                                                    <?php
                                                    $org_id = $row['organization_id'];
                                                    $query = "SELECT * FROM members WHERE usertype = 'organizer' AND  organization_id = $org_id;";
                                                    $result = $conn->query($query);
                                                    $total = $result->num_rows;
                                                    ?>
                                                    <i class="mdi mdi-comment-multiple-outline"></i>
                                                    <b><?= $total ?></b> Organizers
                                                </span>
                                            </p>
                                            <div class="text-center"><a href="pages-my-organization.php?id=<?= $row['organization_id'] ?>" class="btn btn-info">Manage Organization</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div><!-- /.modal -->
    </div>
    </div>
    <?php include '../includes/endbar.php' ?>
    <div class="rightbar-overlay"></div>
    <?php include '../includes/footer.php'; ?>
<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>
<!-- 3bEylXkPHw -->