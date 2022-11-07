<?php
require_once '../config/db.php';
require_once 'functions.ctrls.php';


$answerList[] = $_POST['json'];
$user[] = $_POST['user'];

foreach ($_POST['json'] as $answer) {
    echo $_POST['user'] . ' ' . $answer['name'] . ' ' . $answer['value'] . '<br/>';

    $sql = "INSERT INTO evaluations SET question_reference_id=?, evaluation_content=?,user_reference_id=?, event_reference_id=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $answer['name'], $answer['value'],  $_POST['user'], $_POST['event_id']);
    mysqli_stmt_execute($stmt);
}
mysqli_stmt_close($stmt);
