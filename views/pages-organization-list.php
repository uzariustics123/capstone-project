<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>

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
                    <div class="row">
                        <?php

                        $query = "SELECT * FROM organizations 
                                RIGHT OUTER JOIN members ON members.organization_id = organizations.organization_id
                                WHERE members.user_reference_id = $user AND members.usertype = 'member' OR members.usertype = 'organizer' 
                                GROUP BY members.organization_id
                                HAVING COUNT(*) > 0;";
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

                                                <span class="pe-2 text-nowrap">
                                                    <i class="mdi mdi-format-list-bulleted-type"></i>
                                                    <b></b> Departments
                                                </span>
                                                <span class="text-nowrap">
                                                    <i class="mdi mdi-comment-multiple-outline"></i>
                                                    <b></b> Organizers
                                                </span>
                                            </p>
                                            <div class="text-center"><a href="pages-department-list.php?org_id=<?= $row['organization_id'] ?>" class="btn btn-success">View Organization</a></div>
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