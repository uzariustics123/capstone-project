<?php

// SELECT * FROM users
// RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
// RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
// WHERE participants.event_id = 80


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

// $userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
// $orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
// $deptid = isset($_POST["deptid"]) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM users 
RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
LEFT OUTER JOIN departments ON members.department_id = departments.department_id
RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
WHERE participants.event_id = ? AND participants.participant_status = 'confirmed'");
$query->bind_param('i', $eventid);
$query->execute();
//execute the query

$users = $query->get_result();
//check results

$result = array();

if ($row = $users->num_rows > 0) {
    $rows = array();
    while ($row = $users->fetch_assoc()) {
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting list of users", 'data' => $rows);
    echo json_encode($result);
} else {
    endProcessWithMessage("no participants found");
}