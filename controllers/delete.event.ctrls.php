<?php
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteEvent($conn, $event_id);
} else {
    header("location: ../views/index.php?error");
    exit();
}
