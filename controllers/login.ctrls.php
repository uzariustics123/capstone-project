<?php
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../views/pages-login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);
} else {
    header("location: ../index.php?error=error");
    exit();
}
