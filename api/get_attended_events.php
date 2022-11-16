<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM events
LEFT OUTER JOIN departments ON departments.department_id = events.department_id
INNER JOIN attendances ON attendances.event_reference_id = events.event_id
WHERE attendances.attendance_user_id = ? GROUP BY events.event_id ");
$query->bind_param('i', $userid);
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
    $result = array('status' => 'success', 'message' => "success getting list of event attended", 'data' => $rows);
    echo json_encode($result);
} else {

    endProcessWithMessage("Currently no events attended yet.");
}
