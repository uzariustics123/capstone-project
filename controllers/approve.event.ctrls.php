<?php
if (isset($_GET['event_id'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_id = $_GET['event_id'];
    approveEvent($conn, $event_id);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
