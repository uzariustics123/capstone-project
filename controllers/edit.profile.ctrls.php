<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $user_id = $_POST['user_id'];
    $organization_id = $_POST['org_id'];
    $department_id = $_POST['dept_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $file = $_FILES['image'];
    $usertype = $_POST['usertype'];
    $temp_pass = $_POST['temp_pass'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $image = $_POST['photourl'];
    if ($usertype == 'Administrator') {
        $mobile = $_POST['mobile'];
        $bio = $_POST['bio'];
        $address = $_POST['address'];
    } else {
        $mobile = '';
        $bio = '';
        $address = '';
    }



    if (emptyInputUserProfile($firstname, $lastname) !== false) {
        header("location: ../views/pages-profile.php?error=emptyfields");
        exit();
    }
    if ($password != $confirm) {
        header("location: ../views/pages-member-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id");
        exit();
    }

    editUserProfile($conn, $user_id, $organization_id, $department_id, $firstname, $lastname, $password, $temp_pass, $file, $mobile, $bio, $address, $usertype, $image);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
