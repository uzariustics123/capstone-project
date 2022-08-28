<?php
if (isset($_GET['id'])) {
    $organization_id = $_GET['id'];
    $user_id = $_GET['user_id'];
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    deleteOrganization($conn, $organization_id, $user_id);
} else {
    header("location: ../views/index.php?error");
    exit();
}
