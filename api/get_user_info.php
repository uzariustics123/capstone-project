<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$viewUserid = isset($_POST["viewUserid"]) ? $_POST['viewUserid'] : endProcessWithMessage("viewUserid not set");
$myParticipatedEventscount = 0;
//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT * FROM users
LEFT OUTER JOIN members ON members.user_reference_id = users.userid
LEFT OUTER JOIN departments ON departments.department_id = members.department_id
LEFT OUTER JOIN organizations ON organizations.organization_id = members.organization_id
WHERE users.userid = ? AND members.organization_id = ?");
$datenow = date("M d, Y");
$query->bind_param('ii', $viewUserid, $orgid);
$query->execute();

//execute the query

$user = $query->get_result();
//check results

$result = array();





if ($row = $user->num_rows > 0) {

    $userdata = $user->fetch_assoc();

    $getMyParticipatedEventCount = $db->prepare("SELECT * FROM participants 
    WHERE participants.member_reference_id = ?");
    $getMyParticipatedEventCount->bind_param('i', $userdata['member_id']);
    $getMyParticipatedEventCount->execute();
    $myParticipatedEventscount = $getMyParticipatedEventCount->get_result()->num_rows;

    $getMyEvaluatedEvents = $db->prepare("SELECT * FROM evaluations 
    WHERE user_reference_id = ?");
    $getMyEvaluatedEvents->bind_param('i', $viewUserid);
    $getMyEvaluatedEvents->execute();
    $evaluatedEvents = $getMyEvaluatedEvents->get_result()->num_rows;

    $result = array(
        'status' => 'success', 'message' => "success getting user info", 'data' => $userdata,
        "eventParticipated" => $myParticipatedEventscount,
        "evaluatedEvents" => $evaluatedEvents
    );
    echo json_encode($result);
} else {

    endProcessWithMessage("This user cannot be found on this Organization.");
}
