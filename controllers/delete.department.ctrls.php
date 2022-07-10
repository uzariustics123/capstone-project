<?php
if (isset($_GET['dept_id'])) {
    $department_id = $_GET['dept_id'];
    $organization_id = $_GET['org_id'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteDepartment($conn, $department_id, $organization_id);
} else {
    header("location: ../views/index.php?error");
    exit();
}
