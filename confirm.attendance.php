<?php
if (isset($_GET['participant_id'])) {
    require_once './config/db.php';
    require_once './controllers/functions.ctrls.php';

    echo $participant_id = $_GET['participant_id'];

    confirmAttendanceEmail($conn, $participant_id);
} else {
    header("location: ../views/pages-profile.php");
    exit();
}
