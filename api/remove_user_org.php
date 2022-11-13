<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");

$type = isset($_POST["type"]) ? $_POST['type'] : "Organization";

$query = $db->prepare("DELETE members, participants, attendance FROM members
        LEFT OUTER JOIN participants ON participants.member_reference_id  = members.user_reference_id
        LEFT OUTER JOIN attendance ON attendance.participant_reference_id  = participants.member_reference_id
        WHERE members.user_reference_id = ?");
$query->bind_param('i', $userid);
$query->execute();

//check results

$result = array();

if ($db->affected_rows > 0) {
    $result = array('status' => 'success', 'message' => "user has been removed successfully", 'orgid' => $orgid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error removing user " . $db->error . " id = " . $orgid);
}
