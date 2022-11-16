<?php

// SELECT * FROM users
// RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
// RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
// WHERE participants.event_id = 80


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

// $userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
// $orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
// $deptid = isset($_POST["deptid"]) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$eventid = isset($_POST["eventid"]) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = $db->prepare("SELECT users.userid, users.firstname, users.lastname, users.email, users.photourl FROM users
INNER JOIN attendances ON attendances.attendance_user_id = users.userid
WHERE attendances.event_reference_id = ? GROUP BY attendances.attendance_user_id");
$query->bind_param('i', $eventid);
$query->execute();
$users = $query->get_result();
//check results

$result = array();

if ($row = $users->num_rows > 0) {
    $attendUsers = array();
    while ($row = $users->fetch_assoc()) {
        $attendee_user_id = $row['userid'];
        $query = $db->prepare("SELECT * FROM attendances
        WHERE attendance_user_id = ?");
        $query->bind_param('i', $attendee_user_id);
        $query->execute();
        $attendanceResult = $query->get_result();
        $userAttendanceData = array();
        if ($attedance = $attendanceResult->num_rows > 0) {
            $attendances = array();
            while ($attedance = $attendanceResult->fetch_assoc()) {
                $attendances[] = $attedance;
            }
            $row['attendance_data'] = $attendances;
        }
        $attendUsers[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting list of attended participants", 'data' => $attendUsers);
    echo json_encode($result);
} else {
    endProcessWithMessage("There are no participant attendance found.");
}
