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

                    <div class="d-flex align-items-center">
                        <?php
                        $query1 = "SELECT * FROM questions WHERE event_reference_id = $event_id;";
                        $results1 = $conn->query($query1);
                        while ($row = $results1->fetch_assoc()) {
                            $question_id = $row['question_id'];
                        ?><div>
                                <div class="border border-bottom-0 flex-grow-1 q" data-c="<?= $row['question_content'] ?>" data-q="<?= $row['question_id']; ?>" data-e="<?= $event_id; ?>"></div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="d-flex align-items-center">
                        <?php
                        $results1 = $conn->query($query1);
                        while ($row1 = $results1->fetch_assoc()) {
                            echo '<div class="border flex-grow-1" id="' . $row1['question_id'] . '"></div>';
                        }

                        $query = "SELECT * FROM evaluations WHERE event_reference_id = $event_id";
                        $results = $conn->query($query);
                        while ($row1 = $results->fetch_assoc()) {
                            $data[] = $row1;
                        }

                        $dataJSON = json_encode($data);
                        ?>
                    </div>




                </div>
            </div>

        </div>
    </div>
    <!-- END wrapper -->
    <?php require_once '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php require_once '../includes/footer.php'; ?>


    <script>
        const data = JSON.parse(`<?= $dataJSON; ?>`);
        console.log(data)



        $('.q').each(function() {
            let q_id = $(this).attr('data-q');
            let c = $(this).attr('data-c');

            const evaluations = data.filter(d => d.question_reference_id === q_id);
            console.log(evaluations)

            let row = '<table class="table table-border">';
            row += `<tr><td class="fw-bold text-center h4">${c}</td></tr>`;
            evaluations.forEach(e => {
                row += `<tr><td class="text-center">${e.evaluation_content}</td></tr>`;
            });
            row += `</table>`;
            $(`#${q_id}`).append(row);
            row = '';
        });


        console.log(table);
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>