<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $organization_id = $_POST['organization_id'];
    $department_id = $_POST['department_id'];
    $member_id = $_POST['member_id'];
    $usertype = $_POST['usertype-select'];


    editMember($conn, $usertype, $member_id, $organization_id, $department_id);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
