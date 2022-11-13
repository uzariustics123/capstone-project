<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$imgurl = isset($_POST['imgurl']) ? $_POST['imgurl'] : endProcessWithMessage("imgurl not set");

$query = "UPDATE departments
    SET
    dept_imgurl = '$imgurl'
          WHERE department_id = $deptid";

$insert = $db->query($query);
$result = array();
if ($db->affected_rows > 0) {
    //$orgid = $db->insert_id;
    $result = array('status' => 'success', 'message' => 'Department updated');
    echo json_encode($result);
} else {
    endProcessWithMessage("Error test " . $orgid . $imgurl . $db->error);
}
