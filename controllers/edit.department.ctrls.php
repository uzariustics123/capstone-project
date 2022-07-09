<?php
if (isset($_POST['save'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';



    $user_id = $_POST['user_id'];
    $organization_id = $_POST['organization_id'];
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $department_desc = $_POST['department_desc'];
    $department_code = $_POST['department_code'];
    $file = $_FILES['image'];

    if (emptyInputDepartment($department_name, $department_desc, $department_code, $user_id, $organization_id) !== false) {
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=emptyfields");
        exit();
    }

    editDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $department_id);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
