<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $file = $_FILES['image'];



    if (emptyInputUserProfile($firstname, $lastname) !== false) {
        header("location: ../views/pages-profile.php?error=emptyfields");
        exit();
    }


    editUserProfile($conn, $user_id, $firstname, $lastname, $file);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
