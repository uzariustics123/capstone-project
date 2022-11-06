<?php
if (isset($_GET['id'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $user_id = $_GET['id'];
    $question = $_GET['question'];
    $type = $_GET['type'];



    addQuestion($conn, $user_id, $question, $type);
} else {
    header("location: ../views/evaluation-creation-tool.php");
    exit();
}
