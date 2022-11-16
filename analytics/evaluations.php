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

                    <div class="d-flex flex-column">
                        <!-- <table class="table dt-responsive nowrap w-100"> -->
                        <?php
                        $query1 = "SELECT * FROM questions WHERE event_reference_id = $event_id;";
                        $results1 = $conn->query($query1);
                        $questionArray = array();
                        while ($row = $results1->fetch_assoc()) {
                            $questionArray[] = $row;
                            $question_id = $row['question_id'];
                            $question_type = $row['question_type'];

                        ?>
                            <div class="card p-1">
                                <th>
                                    <h5 class="card-title"><?= $row['question_content'] ?></h5>
                                </th>
                                <?php
                                if ($question_type == 'rating') {
                                    $very_satisfied = 0;
                                    $satisfy = 0;
                                    $fair = 0;
                                    $poor = 0;
                                    $very_poor = 0;
                                    $Qresponse = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_reference_id = $question_id";
                                    $results = $conn->query($Qresponse);
                                ?>
                                    <table class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Very Satisfied</th>
                                                <th>Satisfied</th>
                                                <th>Fair</th>
                                                <th>Poor</th>
                                                <th>Very Poor</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        while ($row1 = $results->fetch_assoc()) {
                                            // $data[] = $row1;
                                            if (strtolower($row1['evaluation_content']) == 'very satisfied') {
                                                $very_satisfied++;
                                            } else if (strtolower($row1['evaluation_content']) == 'satisfied') {
                                                $satisfy++;
                                            } else if (strtolower($row1['evaluation_content']) == 'fair') {
                                                $fair++;
                                            } else if (strtolower($row1['evaluation_content']) == 'poor') {
                                                $poor++;
                                            } else if (strtolower($row1['evaluation_content']) == 'very Poor') {
                                                $very_poor++;
                                            }
                                        }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $very_satisfied ?> responded</td>
                                                <td><?= $satisfy ?> responded</td>
                                                <td><?= $fair ?> responded</td>
                                                <td><?= $poor ?> responded</td>
                                                <td><?= $very_poor ?> responded</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                    $Qresponse = "SELECT * FROM evaluations WHERE event_reference_id = $event_id AND question_reference_id = $question_id";
                                    $results = $conn->query($Qresponse);
                                ?><ol class="list-group list-group-numbered">

                                        <?php
                                        while ($row1 = $results->fetch_assoc()) {
                                            // $data[] = $row1;
                                        ?><li class="list-group-item"><?= $row1['evaluation_content'] ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ol> <?php
                                        }
                                            ?>
                            </div>
                        <?php
                        } ?>

                        <!-- </table> -->

                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <?php
                    // $results1 = $conn->query($query1);




                    // $dataJSON = json_encode($data);
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



        // $('.q').each(function() {
        //     let q_id = $(this).attr('data-q');
        //     let c = $(this).attr('data-c');

        //     const evaluations = data.filter(d => d.question_reference_id === q_id);
        //     console.log(evaluations)

        //     let row = '<table class="table table-border">';
        //     row += `<tr><td class="fw-bold text-center h4">${c}</td></tr>`;
        //     evaluations.forEach(e => {
        //         row += `<tr><td class="text-center">${e.evaluation_content}</td></tr>`;
        //     });
        //     row += `</table>`;
        //     $(`#${q_id}`).append(row);
        //     row = '';
        // });


        console.log(table);
    </script>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>