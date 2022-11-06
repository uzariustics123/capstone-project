<?php include '../includes/header.php' ?>
<?php if (isset($user)) { ?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

    <div class="wrapper">

        <?php require_once '../includes/sidebar.php' ?>
        <div class="content-page">
            <div class="content">

                <?php require_once '../includes/topbar.php' ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Evaluation Creation Tool</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="d-flex justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body form-group">
                            <div class="col-12 mb-2">
                                <label for="eval_title">
                                    <h1>Evaluation Title</h1>
                                </label>
                                <input type="text" class="form-control input-lg" placeholder="Evaluation Name" id="eval_title">
                            </div>
                            <div class="col-12 mb-2">
                                <label for="eval_description">
                                    <h4>Description</h4>
                                </label>
                                <textarea class="form-control" id="eval_description" name="eval_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="d-flex justify-content-center mb-3">
                <button id="add_btn" type="button" tabindex="0" class="btn btn-primary" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Click me if you want to add more questions." title="Add More Questions?">
                    <i class="mdi mdi-layers-plus"></i>Add
                </button>
            </section>

            <div id="add_question"></div>

        </div>
    </div>

    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>

    <?php require_once '../includes/footer.php'; ?>

    <script type="text/javascript">
        var num = 0;
        $(document).on('click', '#add_btn', function() {
            num++;

            $.post('../includes/questions.php', {
                num: num
            }, function(d) {
                $("#add_question").append(d);
            });

        })
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>
