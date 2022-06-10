<?php
if (isset($_POST['submit'])) {



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    require_once '../config/db.php';
    require_once 'functions.inc.php';


    if (emptyInputSignup($firstname, $lastname, $username, $email, $password) !== false) {
        header("location: ../views/pages-login.html?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../views/pages-login.html?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../views/pages-login.html?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $repeat_password) !== false) {
        header("location: ../views/pages-login.html?error=passwordsdontmatch");
        exit();
    }
    if (usernameExist($conn, $username, $email) !== false) {
        header("location: ../views/pages-login.html?error=usernametaken");
        exit();
    }

    createUser($conn, $firstname, $lastname, $username, $email, $password);
} else {
    header("location: ../index.html");
    exit();
}
