<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptid = isset($_POST["deptid"]) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM events
WHERE department_id = ?");
$query->bind_param("i", $deptid);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    while ($row = $user->fetch_assoc()) {
        if ($row['event_status'] == 'pending') {
            if ($row['publisher_id'] == $userid) {
                $rows[] = $row;
            } else {
            }
        } else {
            $rows[] = $row;
        }
    }
    $result = array('status' => 'success', 'message' => "success getting list of events", 'data' => $rows);
    echo json_encode($result);
} else {

    endProcessWithMessage("Currently no events yet, add new.");
}
