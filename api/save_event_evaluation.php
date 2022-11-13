<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

error_reporting(E_ALL ^ E_WARNING);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$jsonpost = isset($_POST['questionsJSON']) ? $_POST['questionsJSON'] : endProcessWithMessage("questionsJSON not set");
$eventid = isset($_POST['eventid']) ? $_POST['eventid'] : endProcessWithMessage("eventid not set");

$status = "success";
$failedQuestions = "";
$jsondata = json_decode($jsonpost, true);

// echo $jsondata[0]['firtsname'];


for ($questionCount = 0; $questionCount < count($jsondata); $questionCount++) {

    $question_content = isset($jsondata[$questionCount]['question_content']) ? $jsondata[$questionCount]['question_content'] : endProcessWithMessage("question_content not set");
    $question_type = isset($jsondata[$questionCount]['question_type']) ? $jsondata[$questionCount]['question_type'] : endProcessWithMessage("question_type not set");
    $insertQuestion = $db->prepare("INSERT INTO questions 
                SET question_content = ?,
                question_type = ?,
                event_reference_id = ? ");
    $insertQuestion->bind_param('ssi', $question_content, $question_type, $eventid);
    $insertQuestion->execute();
    $existingResult = $insertQuestion->get_result();
    if ($db->affected_rows > 0) {
    } else {
        $status = "error";
        $failedQuestions .= "\nfailed to save number " . ($questionCount - 1) . "\n" . $db->error;
    }
}

if ($status == "error") {
    endProcessWithMessage($failedQuestions);
} else {

    $result = array('status' => 'success', 'message' => "Evaluation has been saved");
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
