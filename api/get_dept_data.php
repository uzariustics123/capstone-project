<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptid = isset($_POST["deptid"]) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = "SELECT * FROM departments
WHERE department_id = $deptid";

//execute the query

$user = $db->query($query);
//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    $result = array('status' => 'success', 'message' => "success getting data of dept", 'data' => $user->fetch_assoc());
    echo json_encode($result);
} else {

    endProcessWithMessage("Currently no Departments yet, add new.");
}
