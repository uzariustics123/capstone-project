<?php
if (isset($_GET['id'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $organization_id = $_GET['id'];

    disapproveOrganization($conn, $organization_id);
} else {
    header("location: ../views/admin.php");
    exit();
}
