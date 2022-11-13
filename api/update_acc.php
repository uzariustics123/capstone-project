<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : endProcessWithMessage("firstname not set");
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : endProcessWithMessage("lastname not set");
$password = isset($_POST['password']) ? $_POST['password'] : endProcessWithMessage("password not set");
$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email not set");
$hashpass = password_hash($password, PASSWORD_DEFAULT);

$query = $db->prepare("UPDATE users
    SET
          firstname = ?,
          password = ?,
          lastname = ?,
          temp_pass = '',
          registration_status = 'registered'
          WHERE email = ?");
$query->bind_param('ssss', $firstname, $hashpass, $lastname, $email);
$query->execute();
$result = array();
if ($db->affected_rows > 0) {

    $result = array('status' => 'success', 'message' => "Account successfully updated");
} else {

    $result = array('status' => 'error', 'message' => "Error updating account" . $db->error);
}



echo json_encode($result);

function endProcessWithMessage($msg)
{
    $result = array('status' => 'error', 'message' => "$msg");
    echo json_encode($result);
    die();
}
