<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $user_id = $_POST['user_id'];
    $organization_name = $_POST['organization_name'];
    $organization_description = $_POST['organization_description'];
    $file = $_FILES['image'];

    if (emptyInputOrganization($organization_name, $organization_description, $user_id) !== false) {
        header("location: ../views/pages-add-organization.php?error=emptyfields");
        exit();
    }

    createOrganization($conn, $organization_name, $organization_description, $user_id, $file);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
