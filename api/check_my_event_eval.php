<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM evaluations
WHERE event_reference_id = ? AND user_reference_id = ?");
$query->bind_param('ii', $eventid, $userid);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $result = array('status' => 'success', 'message' => "you already have a evaluation of this event");
    echo json_encode($result);
} else {

    endProcessWithMessage("No evaluation has been made for this event.");
}
