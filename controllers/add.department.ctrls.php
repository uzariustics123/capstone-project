<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $user_id = $_POST['user_id'];
    $organization_id = $_POST['organization_id'];
    $department_name = $_POST['department_name'];
    $department_desc = $_POST['department_desc'];
    $department_code = $_POST['department_code'];
    $file = $_FILES['image'];
    $date_created = date('Y-m-d');

    if (emptyInputOrganization($department_name, $department_desc, $department_code, $user_id, $organization_id) !== false) {
        header("location: ../views/pages-add-organization.php?error=emptyfields");
        exit();
    }

    createDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $date_created);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
