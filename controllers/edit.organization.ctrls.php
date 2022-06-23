<?php
if (isset($_GET["id"])) {

    $organization_id = $GET['id'];
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteOrganization($conn, $organization_id);
} else {
    header("location: ../views/pages-add-organization.php?error");
    exit();
}
