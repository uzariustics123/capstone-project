<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';



    $organization_id = $_POST['organization_id'];
    $organization_name = $_POST['organization_name'];
    $organization_description = $_POST['organization_description'];
    $organization_address = $_POST['address'];
    $file = $_FILES['image'];
    $imgurl = $_POST['org_imgurl'];


    if (emptyInputOrganization($organization_name, $organization_description, $organization_id, $file) !== false) {
        header("location: ../views/pages-my-organization.php?id=$organization_id");
        exit();
    }

    editOrganization($conn, $organization_id, $organization_name, $organization_description, $organization_address, $file, $imgurl);
} else {
    header("location: ../views/pages-my-organization.php");
    exit();
}
