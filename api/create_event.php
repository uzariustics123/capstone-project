<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$eventname = isset($_POST['eventname']) ? $_POST['eventname'] : endProcessWithMessage("eventname not set");
$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$eventdesc = isset($_POST['eventdesc']) ? $_POST['eventdesc'] : endProcessWithMessage("eventdesc not set");
$attendance_duration = isset($_POST['attendance_duration']) ? $_POST['attendance_duration'] : endProcessWithMessage("attendance_duration not set");
$datestart = isset($_POST['datestart']) ? $_POST['datestart'] : endProcessWithMessage("datestart not set");
$amstarttime = isset($_POST['amstarttime']) ? $_POST['amstarttime'] : endProcessWithMessage("amstarttime not set");
$amendtime = isset($_POST['amendtime']) ? $_POST['amendtime'] : endProcessWithMessage("amendtime not set");
$pmstarttime = isset($_POST['pmstarttime']) ? $_POST['pmstarttime'] : null;
$pmendtime = isset($_POST['pmendtime']) ? $_POST['pmendtime'] : null;
$isallday = isset($_POST['isallday']) ? $_POST['isallday'] : endProcessWithMessage("isallday not set");
$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : endProcessWithMessage("deptid not set");
$usertype = isset($_POST['isallday']) ? $_POST['isallday'] : "organizer";
$venue = isset($_POST['venue']) ? $_POST['venue'] : "venue";

$status = "pending";
if ($usertype == "admin") {
    $status = "approved";
} else {
    $status = "pending";
}

$userid = isset($_POST['userid']) ? $_POST['userid'] : endProcessWithMessage("userid not set");

$query = $db->prepare("
    INSERT INTO events
        SET event_name = ?,
            event_description = ?,
            event_location = ?,
            event_attendance_duration = ?,
            event_date = ?,
            event_start_time_am   = ?,
            event_end_time_am   = ?,
            event_start_time_pm = ?,
            event_end_time_pm   = ?,
            event_all_day   = ?,
            event_status   = ?,
            department_id = ?,
            publisher_id = ?");
$query->bind_param(
    'sssssssssssii',
    $eventname,
    $eventdesc,
    $venue,
    $attendance_duration,
    $datestart,
    $amstarttime,
    $amendtime,
    $pmstarttime,
    $pmendtime,
    $isallday,
    $status,
    $deptid,
    $userid
);
$query->execute();
$result = array();
if ($db->affected_rows > 0) {
    $eventid = $db->insert_id;
    $getMembers = $db->prepare("SELECT * FROM members WHERE department_id = ?");
    $getMembers->bind_param("i", $deptid);
    $getMembers->execute();
    $dept_members = $getMembers->get_result();
    $memberCounts = 0;
    if ($dept_members->num_rows > 0) {
        while ($row = $dept_members->fetch_assoc()) {
            $member_id = $row['member_id'];
            $member_email = $row['member_email'];
            $addMembers = $db->prepare("INSERT INTO participants SET 
            accesstype = 'attendee',
            participant_status = 'pending',
            event_id = ?,
            member_reference_id = ?");
            $addMembers->bind_param("ii", $eventid, $member_id);
            $addMembers->execute();
            $memberInsertionResult = $addMembers->get_result();

            if ($db->affected_rows > 0) {
                $memberCounts++;
                $subject = $eventname;
                $body = 'Hey you are invited to attend ' . $subject . ' you can view and confirm your attendance by logging in to your account';
                mailSender($member_email, $subject, $body);
            } else {
                endProcessWithMessage($memberInsertionResult->error);
            }
        }
    } else {
    }
    if ($memberCounts > 0) {
    }


    $result = array('status' => 'success', 'message' => "Event successfully created", "eventid" => $eventid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error event creation " . $db->error);
}
