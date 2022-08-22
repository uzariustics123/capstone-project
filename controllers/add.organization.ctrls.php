<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $userid = $_POST['user_id'];
    $email = $_POST['email'];
    $organization_name = $_POST['organization_name'];
    $organization_description = $_POST['organization_description'];
    $organization_address = $_POST['address'];
    $file = $_FILES['image'];
    $date_created = date('Y-m-d');

    if (emptyInputOrganization($organization_name, $organization_description, $organization_address) !== false) {
        header("location: ../views/pages-add-organization.php?error=emptyfields");
        exit();
    }

    createOrganization($conn, $organization_name, $organization_description, $organization_address, $userid, $file, $date_created, $email);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
