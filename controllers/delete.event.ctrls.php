<?php
if (isset($_GET['event_id'])) {
    require_once '../config/db.php';
    require 'functions.ctrls.php';


    $event_id = $_GET['event_id'];
    $organization_id = $_GET['org_id'];
    $department_id = $_GET['dept_id'];

    deleteEvent($conn, $event_id, $organization_id, $department_id);
} else {
    header("location: ../views/index.php?error");
    exit();
}
