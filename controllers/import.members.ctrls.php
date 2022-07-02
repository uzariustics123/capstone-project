<?php
// include mysql database configuration file

if (isset($_POST['import'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $user_id = $_POST['user_id'];
    $department_id = $_POST['department_id'];
    $organization_id = $_POST['organization_id'];
    $files = $_FILES['file'];

    importMembers($conn, $files, $department_id, $user_id, $organization_id);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
