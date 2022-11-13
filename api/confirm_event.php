<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$memberid = isset($_POST["memberid"]) ? $_POST['memberid'] : endProcessWithMessage("memberid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

$query = $db->prepare("UPDATE participants
    SET
          participant_status = 'confirmed'
          WHERE member_reference_id = ? AND event_id = ?");
$query->bind_param('ii', $memberid, $eventid);
$query->execute();
$queryResult = $query->get_result();
$result = array();
if ($db->affected_rows > 0) {
    //$orgid = $db->insert_id;
    $result = array('status' => 'success', 'message' => "Successfully confirmed event");
    echo json_encode($result);
} else {
    endProcessWithMessage("Error confirming event" . $db->error);
}
