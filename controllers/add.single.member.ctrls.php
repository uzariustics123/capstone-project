<?php

if (isset($_GET['org_id']) && isset($_GET['dept_id']) && isset($_GET['user_id']) && isset($_GET['member_email'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $organization_id = $_GET['org_id'];
    $department_id = $_GET['dept_id'];
    $user_id = $_GET['user_id'];
    $org_admin_id = $_GET['org_admin_id'];
    $member_email = $_GET['member_email'];

    if (memberExist($conn, $member_email, $organization_id, $department_id, $user_id)) {
        session_start();
        $_SESSION["status"] =
            "<script>
                    Swal.fire(
                    'Warning!',
                    'User already in this department.',
                    'warning')
                    </script>";
        header("location: ../views/pages-my-department.php?&org_id=$organization_id&dept_id=$department_id&admin_id=$org_admin_id");
        exit();
    }

    addSingleMember($conn, $member_email, $department_id, $org_admin_id, $user_id, $org_admin_id);
} else {
    header("location: ../views/pages-my-department.php?&org_id=$organization_id&dept_id=$department_id&admin_id=$org_admin_id");
    exit();
}
