<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");
$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM questions
    WHERE event_reference_id = ?");
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
    $result = array('status' => 'success', 'message' => "success getting list of questions", 'data' => $rows);
    echo json_encode($result);
} else {
    endProcessWithMessage("this event has no questions made for the evaluation");
}
