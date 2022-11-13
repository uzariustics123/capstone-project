<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");
$itempos  = isset($_POST["itempos"]) ? $_POST['itempos'] : endProcessWithMessage("itempos not set");

//$data = json_decode(file_get_contents("php://input"))
//$_POST['data']

$query = $db->prepare("UPDATE events 
            SET event_status = 'approved'
            WHERE event_id = ?");
$query->bind_param('i', $eventid);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();

if ($db->affected_rows > 0) {

    $result = array('status' => 'success', 'message' => "Event approved", 'itempos' => $itempos);
} else {

    $result = array('status' => 'error', 'message' => "Unable to approved event" . $db->error);
}



echo json_encode($result);
