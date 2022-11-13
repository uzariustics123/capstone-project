<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');




$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptid = isset($_POST["deptid"]) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");
$attendancetype = isset($_POST["attendancetype"]) ? $_POST["attendancetype"] : endProcessWithMessage("attendancetype is missing");
$scannedUserid = isset($_POST["clientUserid"]) ? $_POST["clientUserid"] : endProcessWithMessage("scan user id is missing");
// $usertypes = isset($_POST["usertype"]) ? $_POST['usertype'] : endProcessWithMessage("usertype not set");
//$data = json_decode(file_get_contents("php://input"))








if ($_POST["tag"] == "attend") {

    $query = $db->prepare("SELECT * FROM users 
    LEFT OUTER JOIN members ON users.userid = members.user_reference_id
    INNER JOIN participants ON participants.member_reference_id = members.member_id
    WHERE participants.event_id = ? 
    AND members.user_reference_id = ? 
    AND participants.participant_status = 'confirmed'
    AND members.organization_id = ?");
    $query->bind_param('iii', $eventid, $scannedUserid, $orgid);
    $query->execute();
    $users = $query->get_result();
    $result = array();

    if ($row = $users->num_rows > 0) {
        // $firstResult = $users->fetch_assoc();
        $rows = array();
        while ($row = $users->fetch_assoc()) {
            $rows[] = $row;
        }
        $result = array('status' => 'success', 'message' => "success getting user details", 'data' => $rows);
        echo json_encode($result);
    } else {
        endProcessWithMessage("This user is not a participant of this event.");
    }
} else if ($_POST["tag"] == "confirm_attend") {
    $checkExistingAttendamce = $db->prepare("SELECT * FROM attendances WHERE attendance_user_id = ? AND attendance_type = ?");
    $checkExistingAttendamce->bind_param('is', $scannedUserid, $attendancetype);
    $checkExistingAttendamce->execute();
    if ($checkExistingAttendamce->get_result()->num_rows > 0) {

        endProcessWithMessage("A participant already attended");
    } else {
    }
    $checkExistingAttendamce->close();
    // $usertypes = isset($_POST["usertype"]) ? $_POST['usertype'] : endProcessWithMessage("usertype not set");
    $participantid = isset($_POST["participantid"]) ? $_POST["participantid"] : endProcessWithMessage("user participant id is missing");
    $attendancestatus = isset($_POST["attendancestatus"]) ? $_POST["attendancestatus"] : endProcessWithMessage("attendancestatus is missing");
    $query = $db->prepare("INSERT INTO attendances
    SET attendance_type	= ?,
    participant_reference_id = ?,
    attendance_user_id = ?,
    attendance_status = ?,
    event_reference_id = ?");
    $query->bind_param('siisi', $attendancetype, $participantid, $scannedUserid, $attendancestatus, $eventid);
    $query->execute();
    $users = $query->get_result();
    $result = array();

    if ($db->affected_rows > 0) {
        $result = array('status' => 'success', 'message' => "Attended successfully");
        echo json_encode($result);
    } else {
        endProcessWithMessage("Error attendning event, please report error to your administrator");
    }
}

//check user membership
