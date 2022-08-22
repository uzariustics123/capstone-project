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
    $imgurl = $_POST['dept_imgurl'];


    editDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $department_id, $imgurl);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
