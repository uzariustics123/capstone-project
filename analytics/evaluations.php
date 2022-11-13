<?php require_once '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <!-- Begin page -->
    <div class="wrapper">

        <?php require_once '../includes/sidebar.php' ?>

        <div class="content-page">
            <div class="content">

                <?php require_once '../includes/topbar.php' ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Evaluations</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    $event_id = $_GET['event_id'];
                    ?>

                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <?php
                                $query = "SELECT * FROM questions WHERE event_reference_id = $event_id;";
                                $results = $conn->query($query);
                                while ($row = $results->fetch_assoc()) {
                                ?>
                                    <th><?= $row['question_content'] ?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <!-- BUG -->
                        <tbody>
                            <?php
                            $query = "SELECT * FROM evaluations WHERE event_reference_id = $event_id;";
                            $results = $conn->query($query);
                            while ($row = $results->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $row['evaluation_content'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
    <!-- END wrapper -->
    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php require_once '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>