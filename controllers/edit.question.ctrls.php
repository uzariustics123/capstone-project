<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $question_id = $_POST['equestion_id'];
    $question_content = $_POST['equestion'];
    $question_type = $_POST['etype'];


    editQuestion($conn, $question_id, $question_content, $question_type);
} else {
    header("location: ../views/evaluation-creation-tool.php");
    exit();
}
