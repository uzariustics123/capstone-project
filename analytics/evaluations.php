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

                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4 class="text-center mb-4">What is your level of satisfaction with this event?</h4>
                                            <footer>
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                                        😁 Very Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_1 = 1;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                                                        🙂 Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_1 = 2;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                        😐 Fair
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_1 = 3;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-warning">
                                                        😕 Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_1 = 4;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                                        😒 Very Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_1 = 5;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </blockquote>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-warning">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4 class="text-center mb-4">How likely are you to tell a friend about this event?</h4>
                                            <footer>
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                                        😁 Very Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_2 = 1;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                                                        🙂 Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_2 = 2;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                        😐 Fair
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_2 = 3;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-warning">
                                                        😕 Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_2 = 4;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                                        😒 Very Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_2 = 5;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </blockquote>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4 class="text-center mb-4">How would you rate our event venue and equipment in regards to how it served your keynote?</h4>
                                            <footer>
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                                        😁 Very Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_3 = 1;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                                                        🙂 Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_3 = 2;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                        😐 Fair
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_3 = 3;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-warning">
                                                        😕 Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_3 = 4;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                                        😒 Very Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_3 = 5;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </blockquote>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4 class="text-center mb-4">How satisfied were you with the speakers and sessions at our event?</h4>
                                            <footer>
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                                        😁 Very Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_4 = 1;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                                                        🙂 Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_4 = 2;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                        😐 Fair
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_4 = 3;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-warning">
                                                        😕 Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_4 = 4;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                                        😒 Very Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_4 = 5;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </blockquote>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4 class="text-center mb-4">How did you feel about the duration of the content?</h4>
                                            <footer>
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                                        😁 Very Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_5 = 1;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                                                        🙂 Satisfied
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_5 = 2;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                        😐 Fair
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_5 = 3;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-warning">
                                                        😕 Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_5 = 4;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                                        😒 Very Poor
                                                        <?php
                                                        $sql = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_5 = 5;";
                                                        $results = $conn->query($sql);
                                                        $total = $results->num_rows;
                                                        echo "<span class='badge bg-primary rounded-pill'> $total</span>";
                                                        ?>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </blockquote>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>
                    </section>

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