<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');



$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email uid not set");

$query = "SELECT * FROM users WHERE email = '$email'";

//execute the query

$user = $db->query($query);

//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $userdata = $user->fetch_assoc();
    $result = array('status' => 'success', 'message' => "current user request granted", 'data' => $userdata);
    echo json_encode($result);
} else {

    endProcessWithMessage("User doesn't exist");
}
function endProcessWithMessage($msg)
{

    $result = array('status' => 'error', 'message' => "$msg");

    echo json_encode($result);

    die();
}
