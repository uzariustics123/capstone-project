<?php
if (isset($_GET['participant_id']) && isset($_GET['event_id'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $participant_id = $_GET['participant_id'];
    confirmAttendance($conn, $participant_id);
} else {
    header("location: ../views/pages-profile.php");
    exit();
}
