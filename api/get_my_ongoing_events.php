<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$member_id = isset($_POST["memberid"]) ? $_POST['memberid'] : endProcessWithMessage("memberid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM events
LEFT OUTER JOIN participants ON participants.event_id = events.event_id
LEFT OUTER JOIN departments ON departments.department_id = events.department_id
WHERE participants.member_reference_id = ?");
$datenow = date("M d, Y");
$query->bind_param('i', $member_id);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    while ($row = $user->fetch_assoc()) {
        $eventdate = $row['event_date'];
        if (strtotime($datenow)  == strtotime($eventdate)) {
            $rows[] = $row;
        }
    }
    if (sizeof($rows) > 0) {
        $result = array('status' => 'success', 'message' => "success getting list of ongoing event", 'data' => $rows);
        echo json_encode($result);
    } else {
        endProcessWithMessage("No ongoing events as of now.");
    }
} else {

    endProcessWithMessage("No ongoing events for now.");
}
