<?php include '../includes/header.php' ?>
<?php if (isset($user) && isset($_GET['event_id'])) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>
    <!-- Begin page -->
    <div class="wrapper">

        <?php require_once '../includes/sidebar.php' ?>
        <!-- Begin page -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <?php require_once '../includes/topbar.php' ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                                <h4 class="page-title">Evaluation</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <section>
                        <div class="row">
                            <?php
                            $event_id = $_GET['event_id'];
                            $query = "SELECT * FROM questions WHERE event_reference_id = $event_id";
                            $results = $conn->query($query);
                            while ($row = $results->fetch_assoc()) {
                            ?>
                                <div class="col-md-2">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body">
                                            <blockquote class="card-bodyquote">
                                                <h4 class="text-center mb-4"><?= $row['question_content'] ?></h4>

                                                <form class="answers" id="<?= $row['question_id'] ?>">

                                                    <footer>
                                                        <?php
                                                        if ($row['question_type'] == 'rating') {
                                                        ?>
                                                            <ul class="list-group">

                                                                <div class="form-check list-group-item d-flex list-group-item-success test">
                                                                    &nbsp;
                                                                    <input class="form-check-input" type="radio" name="<?= $row['question_id'] ?>" id="<?= $row['question_id'] . "1" ?>" value="very_satisfied">
                                                                    <label class="form-check-label" for="<?= $row['question_id'] . "1" ?>">
                                                                        &nbsp; 😁 Very Satisfied
                                                                    </label>
                                                                </div>
                                                                <div class="form-check list-group-item d-flex list-group-item-primary test">
                                                                    &nbsp;
                                                                    <input class="form-check-input" type="radio" name="<?= $row['question_id'] ?>" id="<?= $row['question_id'] . "2" ?>" value="satisfied">
                                                                    <label class="form-check-label" for="<?= $row['question_id'] . "2" ?>">
                                                                        &nbsp; 🙂 Satisfied
                                                                    </label>
                                                                </div>
                                                                <div class="form-check list-group-item d-flex list-group-item-info test">
                                                                    &nbsp;
                                                                    <input class="form-check-input" type="radio" name="<?= $row['question_id'] ?>" id="<?= $row['question_id'] . "3" ?>" value="fair" checked>
                                                                    <label class="form-check-label" for="<?= $row['question_id'] . "3" ?>">
                                                                        &nbsp; 😐 Fair
                                                                    </label>
                                                                </div>
                                                                <div class="form-check list-group-item d-flex list-group-item-warning test">
                                                                    &nbsp;
                                                                    <input class="form-check-input" type="radio" name="<?= $row['question_id']  ?>" id="<?= $row['question_id'] . "4" ?>" value="poor">
                                                                    <label class="form-check-label" for="<?= $row['question_id'] . "4" ?>">
                                                                        &nbsp; 😕 Poor
                                                                    </label>
                                                                </div>
                                                                <div class="form-check list-group-item d-flex list-group-item-danger test">
                                                                    &nbsp;
                                                                    <input class="form-check-input" type="radio" name="<?= $row['question_id'] ?>" id="<?= $row['question_id'] . "5" ?>" value="very_poor">
                                                                    <label class="form-check-label" for="<?= $row['question_id'] . "5" ?>">
                                                                        &nbsp; 😒 Very Poor
                                                                    </label>
                                                                </div>

                                                            </ul>
                                                        <?php } else { ?>
                                                            <input class="form-control" type="text" name="<?= $row['question_id'] ?>" id="<?= $row['question_id'] ?>" />

                                                        <?php } ?>
                                                    </footer>
                                                </form>
                                            </blockquote>
                                        </div> <!-- end card-body-->

                                    </div> <!-- end card-->
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                    <div class="mb-3 mb-0 text-center">
                        <a class="btn btn-lg btn-primary" type="submit" name="submit" id="submit">
                            Submit
                        </a>
                    </div>
                </div> <!-- container -->


            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->
    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php require_once '../includes/footer.php'; ?>


    <script>
        $(document).ready(function() {
            $("#submit").click(function(e) {
                e.preventDefault;
                var answersList = $(".answers").serializeArray()




                Swal.fire({
                    title: 'Submit this evaluation?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Submit'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(answersList)
                        $.ajax({
                            type: "POST",
                            url: "../controllers/add.evaluation.ctrls.php",
                            data: {
                                'json': answersList,
                                'user': `<?= $user ?>`,
                                'event_id': `<?= $event_id ?>`
                            },
                            success: function(data, status, xhr) {
                                console.log(data);
                                window.location.href = "pages-profile.php";
                            },
                            error: function(xhr, status, errorMessage) {
                                alert(status)
                            }
                        });
                    }
                })

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