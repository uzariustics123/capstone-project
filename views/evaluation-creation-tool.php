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

                <div class="row">
                    <div class="col-xl-12">
                        <section class="">
                            <div class="card">
                                <div class="card-body form-group">
                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <input type="hidden" name="user_id" id="user_id" value=<?= $user ?>>
                                            <div class="col-6">
                                                <label for="input1" class="form-label">Question</label>
                                                <input type="text" name="question" id="question" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="type" class="form-label">Question Type</label>
                                                <select class="form-control select" name="type" data-toggle="select" id="type">
                                                    <option>Select One</option>
                                                    <option value="input">Input</option>
                                                    <option value="rating">Rating</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <section class="d-flex justify-content-center mb-3">
                            <button id="add_btn" type="button" tabindex="0" class="btn btn-primary" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Click me if you want to add more questions." title="Add More Questions?">
                                <i class="mdi mdi-layers-plus"></i> Add
                            </button>

                        </section>
                        <div id="add_question"></div>
                    </div>
                </div>

                <?php
                $query = "SELECT * FROM questions WHERE user_reference_id = $user";
                $results = $conn->query($query);
                while ($row = $results->fetch_assoc()) {
                }
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-bordered mb-3">
                                    <li class="nav-item">
                                        <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Event Participant Details
                                        </a>
                                    </li>
                                </ul> <!-- end nav-->
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th style="width: 75px;">Actions</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM questions WHERE user_reference_id = $user";
                                                $results = $conn->query($query);
                                                while ($row = $results->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><span id="question_content<?= $row['question_id']; ?>"><?= $row['question_content'] ?></span></td>
                                                        <td><span id="question_type<?= $row['question_id']; ?>"><?= $row['question_type'] ?></span></td>
                                                        <td class="table-action">
                                                            <button data-bs-toggle="modal" data-bs-target="#edit-question" class="action-icon btn btn-success btn-light edit-question" value="<?= $row['question_id'] ?>">
                                                                <i class="mdi mdi-circle-edit-outline"></i>
                                                            </button>
                                                            <button id="delete-question" name="delete-question" class="action-icon btn btn-success btn-light delete-question" value="<?= $row['question_id'] ?>">
                                                                <i class="mdi mdi-delete-empty-outline"></i>
                                                            </button>
                                                        </td>

                                                    </tr>

                                                    <div class="modal fade" id="edit-question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="standard-modalLabel">Edit Question</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                </div>
                                                                <form method="post" action="../controllers/edit.question.ctrls.php" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <input type="hidden" name="equestion_id" id="equestion_id">
                                                                            <div class="col-6">
                                                                                <label for="input1" class="form-label">Question</label>
                                                                                <input type="text" name="equestion" id="equestion" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="type" class="form-label">Question Type</label>
                                                                                <select class="form-control select" name="etype" data-toggle="select" id="etype">
                                                                                    <option>Select One</option>
                                                                                    <option value="input">Input</option>
                                                                                    <option value="rating">Rating</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end preview-->
                                </div> <!-- end tab-content-->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div>

        </div>
    </div>

    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>

    <?php require_once '../includes/footer.php'; ?>

    <script>
        $(document).ready(function() {

            let order = 0;
            $('#add_btn').click(function() {
                let user_id = $("#user_id").val();
                let question = $("#question").val();
                let type = $("#type").val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Save this question?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../controllers/add.question.ctrls.php?id=" + user_id + "&question=" + question + "&type=" + type;
                    }
                })

            })

        })

        $(document).ready(function() {
            $(document).on('click', '.edit-question', function() {
                var id = $(this).val();
                var question_content = $('#question_content' + id).text();
                var question_type = $('#question_type' + id).text();


                $('#equestion_id').val(id);
                $('#equestion').val(question_content);
                $('#etype').val(question_type);
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete-question', function() {
                var id = $(this).val();

                Swal.fire({
                    title: 'Are you sure you want to delete this question?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../controllers/delete.question.ctrls.php?id=" + id;
                    }
                })
            })

        })
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>