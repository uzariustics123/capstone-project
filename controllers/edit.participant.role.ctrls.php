<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_id = $_POST['event_id'];
    $participant_id = $_POST['participant_id'];
    $accesstype = $_POST['participant_role_select'];


    editParticipantRole($conn, $participant_id, $accesstype, $event_id);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
