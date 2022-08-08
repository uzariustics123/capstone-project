<?php
if (isset($_GET['event_id'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_id = $_GET['event_id'];
    $user_id = $_GET['user_id'];
    $organization_id = $_GET['org_id'];
    $department_id = $_GET['dept_id'];

    approveEvent($conn, $event_id, $user_id, $organization_id, $department_id);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
