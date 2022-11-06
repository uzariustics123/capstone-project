<?php
if (isset($_GET['event_id']) && $_GET['member_id']) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_id = $_GET['event_id'];
    $member_id = $_GET['member_id'];

    if (participantExist($conn, $event_id, $member_id) == true) {

        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning!',
        'User already a participant in this event.',
        'warning')
        </script>";
        header("location: ../views/pages-view-event-details.php?event_id=$event_id");
        exit();
    }


    addSingleParticipant($conn, $event_id, $member_id);
} else {
    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}
