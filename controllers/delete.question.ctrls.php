<?php
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteQuestion($conn, $question_id);
} else {
    header("location: ../views/evaluation-creation-tool.php");
    exit();
}
