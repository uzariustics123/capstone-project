<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $organization_id = $_POST['organization_id'];
    $department_name = $_POST['department_name'];
    $department_desc = $_POST['department_desc'];
    $department_code = $_POST['department_code'];
    $file = $_FILES['image'];
    $email = $_POST['email'];

    if (emptyInputOrganization($department_name, $department_desc, $department_code, $organization_id) !== false) {
        header("location: ../views/pages-add-organization.php?error=emptyfields");
        exit();
    }

    createDepartment($conn, $department_name, $department_desc, $department_code, $file, $organization_id, $email);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
