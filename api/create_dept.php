<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$deptname = isset($_POST['deptname']) ? $_POST['deptname'] : endProcessWithMessage("deptname not set");
$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptdesc = isset($_POST['deptdesc']) ? $_POST['deptdesc'] : "None";
$deptcode = isset($_POST['deptcode']) ? $_POST['deptcode'] : "None";

$userid = isset($_POST['userid']) ? $_POST['userid'] : endProcessWithMessage("userid not set");

$query = "
    INSERT INTO departments
        SET dept_name = '$deptname',
        dept_description = '$deptdesc',
        dept_code  = '$deptcode',
        organization_id = $orgid ";


$insert = $db->query($query);
$result = array();
if ($db->affected_rows > 0) {
    $deptid = $db->insert_id;
    $result = array('status' => 'success', 'message' => "Photo successfully uploaded", "deptid" => $deptid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error test " . $orgid . $imgurl . $db->error);
}
