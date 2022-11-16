<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

error_reporting(E_ALL ^ E_WARNING);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$jsonpost = isset($_POST['jsondata']) ? $_POST['jsondata'] : endProcessWithMessage("jsondata not set");
$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$eventid = isset($_POST['eventid']) ? $_POST['eventid'] : 0;

$status = "success";
$failedInserts = "";
$jsondata = json_decode($jsonpost, true);

// echo $jsondata[0]['firtsname'];


for ($membercount = 0; $membercount < count($jsondata); $membercount++) {
    $firstname = isset($jsondata[$membercount]['firstname']) ? $jsondata[$membercount]['firstname'] : endProcessWithMessage("firstname not set");
    $lastname = isset($jsondata[$membercount]['lastname']) ? $jsondata[$membercount]['lastname'] : endProcessWithMessage("lastname not set");
    $user_reference_id = isset($jsondata[$membercount]['userid']) ? $jsondata[$membercount]['userid'] : endProcessWithMessage("userid not set");

    //check existing user
    $existingParticipant = $db->prepare("SELECT * FROM participants
                WHERE member_reference_id = (SELECT member_id FROM members WHERE user_reference_id = ?) AND event_id = ?");
    $existingParticipant->bind_param('ii', $user_reference_id, $eventid);
    $existingParticipant->execute();
    $existingResult = $existingParticipant->get_result();
    // endProcessWithMessage($eventid);
    // $check  = $db->query($existingParticipant);
    if ($row = $existingResult->num_rows > 0) {
        //user already exist 

        $status = "error";
        $failedInserts = $firstname . " " . $lastname . " is already a participant of the event" . $db->error;
    } else {

        $addMembers = $db->prepare("INSERT INTO participants SET 
            accesstype = 'attendee',
            participant_status = 'pending',
            event_id = ?,
            member_reference_id = (SELECT member_id FROM members WHERE user_reference_id = ?)");
        $addMembers->bind_param("ii", $eventid, $user_reference_id);
        $addMembers->execute();
        $memberInsertionResult = $addMembers->get_result();

        if ($db->affected_rows > 0) {

            $subject = $eventname;
            $body = 'Hey you are invited to attend ' . $subject . ' you can view and confirm your attendance by logging in to your account';
            mailSender($member_email, $subject, $body);
        } else {
            $status = "error";
            $failedInserts = "failed to add as participant" . $firstname . " " . $lastname . $db->error;
        }
    }
}

if ($status == "error") {
    endProcessWithMessage("Failed entries\n" . $failedInserts);
} else if ($status == "success") {
    $result = array('status' => 'success', 'message' => "Particpants were successfully added");
    echo json_encode($result);
}
function RandomPass()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}
