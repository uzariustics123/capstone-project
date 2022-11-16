<?php

// SELECT * FROM users
// RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
// RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
// WHERE participants.event_id = 80


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");
$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM evaluations
RIGHT OUTER JOIN users ON users.userid = evaluations.user_reference_id
WHERE evaluations.event_reference_id = ? GROUP BY evaluations.user_reference_id");
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
    $result = array('status' => 'success', 'message' => "got some data", 'data' => $rows);
    echo json_encode($result);
} else {
    endProcessWithMessage("No participants have evaluated the event yet, or maybe the organizer did not made an evaluation for this event.");
}
