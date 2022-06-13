<?php
if (isset($_POST['submit'])) {


    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $facebook = $_POST['facebook'];
    $gmail = $_POST['gmail'];
    $twitter = $_POST['twitter'];
    $github = $_POST['github'];
    $instagram = $_POST['instagram'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    updateUser($conn, $firstname, $lastname, $username, $bio, $address, $mobile, $facebook, $gmail, $twitter, $github, $instagram, $user_id);
} else {
    header("location: ../views/pages-profile.php?error=stmtfailed");
    exit();
}
