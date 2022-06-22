<?php
if (isset($_POST['submit'])) {


    $user_id = $_POST['user_id'];
    $organization_name = $_POST['organization_name'];
    $organization_description = $_POST['organization_description'];

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';


    if (emptyInputOrganization($organization_name, $organization_description, $user_id) !== false) {
        header("location: ../views/pages-add-organization.php?error=emptyfields");
        exit();
    }

    createOrganization($conn, $organization_name, $organization_description, $user_id);
} else {
    header("location: ../views/pages-add-organization.php");
    exit();
}
