<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$member_id = isset($_POST['member_id']) ? $_POST['member_id'] : endProcessWithMessage("member_id not set");
$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$usertype = isset($_POST['usertype']) ? $_POST['usertype'] : endProcessWithMessage("usertype not set");

$query = $db->prepare("UPDATE members 
SET usertype = ?, 
department_id = ?
WHERE member_id = ?");
$query->bind_param("sii", $usertype, $deptid, $member_id);
$query->execute();

$result = array();
if ($db->affected_rows > 0) {
    //$member_id = $db->insert_id;
    $result = array('status' => 'success', 'message' => 'User privilege has been changed');
    echo json_encode($result);
} else {
    endProcessWithMessage("No changes has been made");
}
