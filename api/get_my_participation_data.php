<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$memberid = isset($_POST["memberid"]) ? $_POST['memberid'] : endProcessWithMessage("memberid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");
//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM participants
WHERE member_reference_id = ? AND event_id = ?");
$query->bind_param('ii', $memberid, $eventid);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    while ($row = $user->fetch_assoc()) {
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting data", 'data' => $rows);
    echo json_encode($result);
} else {
    endProcessWithMessage("You are not a participant of this event.");
}
