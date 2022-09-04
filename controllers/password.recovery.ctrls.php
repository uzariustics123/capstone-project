<?php

if (isset($_POST['submit'])) {

    $email = $_POST['emailaddress'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    resetPassword($conn, $email);
} else {
    header("location: ../index.php?error=error");
    exit();
}
