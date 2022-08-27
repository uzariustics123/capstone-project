<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_id = $_POST['event_id'];
    $user_id = $_POST['user_id'];

    $customRadio1 = $_POST['customRadio1'];
    $customRadio2 = $_POST['customRadio2'];
    $customRadio3 = $_POST['customRadio3'];
    $customRadio4 = $_POST['customRadio4'];
    $customRadio5 = $_POST['customRadio5'];

    addEvaluation($conn, $user_id, $event_id, $customRadio1, $customRadio2, $customRadio3, $customRadio4, $customRadio5);
} else {
    header("location: ../views/pages-profile.php");
    exit();
}
