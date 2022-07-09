<?php
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $organization_id = $_GET['org_id'];
    $department_id = $_GET['dept_id'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteDepartment($conn, $user_id, $organization_id, $department_id);
} else {
    header("location: ../views/index.php?error");
    exit();
}
