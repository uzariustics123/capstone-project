<?php
if (isset($_POST['submit'])) {



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $date_created = date('Y-m-d');
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    if (emptyInputSignup($firstname, $lastname, $username, $email, $password) !== false) {
        header("location: ../views/pages-register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../views/pages-register.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../views/pages-register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $repeat_password) !== false) {
        header("location: ../views/pages-register.php?error=passwordsdontmatch");
        exit();
    }
    if (usernameExist($conn, $username, $email) !== false) {
        header("location: ../views/pages-register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $firstname, $lastname, $username, $email, $password, $date_created);
} else {
    header("location: ../index.php");
    exit();
}
