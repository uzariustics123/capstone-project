<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

error_reporting(E_ALL ^ E_WARNING);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$jsonpost = isset($_POST['responseJSON']) ? $_POST['responseJSON'] : endProcessWithMessage("responseJSON not set");
$eventid = isset($_POST['eventid']) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

$status = "success";
$failedResponse = "";
$jsondata = json_decode($jsonpost, true);

// echo $jsondata[0]['firtsname'];


for ($responseCount = 0; $responseCount < count($jsondata); $responseCount++) {

    $evaluation_content = isset($jsondata[$responseCount]['evaluation_content']) ? $jsondata[$responseCount]['evaluation_content'] : endProcessWithMessage("evaluation_content not set");
    $question_reference_id = isset($jsondata[$responseCount]['question_reference_id']) ? $jsondata[$responseCount]['question_reference_id'] : endProcessWithMessage("question_reference_id not set");

    $insertResponse = $db->prepare("INSERT INTO evaluations 
                SET evaluation_content = ?,
                question_reference_id = ?,
                user_reference_id = ?,
                event_reference_id = ? ");
    $insertResponse->bind_param('siii', $evaluation_content, $question_reference_id, $userid, $eventid);
    $insertResponse->execute();
    $existingResult = $insertResponse->get_result();
    if ($db->affected_rows > 0) {
    } else {
        $status = "error";
        $failedResponse .= "\nfailed to save response for question number " . ($responseCount - 1) . "\n" . $db->error;
    }
}

if ($status == "error") {
    endProcessWithMessage($failedResponse);
} else {

    $result = array('status' => 'success', 'message' => "Response submitted");
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
