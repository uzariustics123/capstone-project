<?php
if (isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['user_id']) && isset($_POST['data'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    echo $title = $_POST['question'];
    echo $desc = $_POST['type'];
    echo  $user_id = $_POST['user_id'];
    echo  $data = $_POST['data'];


    // saveTemplate($conn, $title, $desc, $user_id, $data);
} else {
    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}
