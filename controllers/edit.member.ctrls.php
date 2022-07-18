<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $user_id = $_POST['user_id'];
    $department_id = $_POST['department_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $yearlevel = $_POST['yearlevel'];
    $usertype = $_POST['usertype'];




    if (emptyInputEditMember($firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype) !== false) {
        header("location: ../views/pages-profile.php?error=emptyfields");
        exit();
    }

    editUserProfile($conn, $user_id, $firstname, $lastname, $file, $mobile, $bio, $address, $facebook, $gmail, $twitter, $github, $instagram);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
