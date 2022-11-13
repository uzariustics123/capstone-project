<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$userid = isset($_POST['userid']) ? $_POST['userid'] : endProcessWithMessage("Required user");

$query = "SELECT userid FROM users WHERE userid = '$userid'";

//execute the query

$user = $db->query($query);

//check results

$result = array();

if ($row = $user->num_rows > 0) {
} else {

     endProcessWithMessage("Unauthorized user " . "$query");
}

function endProcessWithMessage($msg)
{

     $result = array('status' => 'error', 'message' => "$msg");

     echo json_encode($result);

     die();
}
function mailSender($recipient, $subject, $body)
{
     $scriptUrl = "https://script.google.com/macros/s/AKfycby-9Q_FJcT8immG1dFWe1cEk2NKRIhDb5WFQShX05zS8uJk8-qBPCQN6P5weWo6vKRmOQ/exec";

     $data = array(
          "recipient" => $recipient,
          "subject" => $subject,
          "body" => $body,
          "isHTML" => 'true'
     );

     $ch = curl_init($scriptUrl);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     $result = curl_exec($ch);
     return $result;
}
