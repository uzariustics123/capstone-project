<?php
// include mysql database configuration file

if (isset($_POST['import'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $department_id = $_POST['department_id'];
    $organization_id = $_POST['organization_id'];
    $files = $_FILES['file'];

    importMembers($conn, $department_id, $organization_id, $files);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
