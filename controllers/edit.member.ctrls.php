<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $importer_id = $_POST['importer_id'];
    $organization_id = $_POST['organization_id'];
    $user_id = $_POST['user_id'];
    $department_id = $_POST['department_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $yearlevel = $_POST['yearlevel-select'];
    $usertype = $_POST['usertype-select'];




    if (emptyInputEditMember($firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype) !== false) {
        header("location: ../views/pages-profile.php?error=emptyfields");
        exit();
    }

    editMember($conn, $organization_id, $user_id, $department_id, $importer_id, $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
