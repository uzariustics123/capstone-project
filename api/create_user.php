<?php



header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : endProcessWithMessage("firstname not set");
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : endProcessWithMessage("lastname not set");
$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email not set");
$photourl = isset($_POST['photourl']) ? $_POST['photourl'] : endProcessWithMessage("photourl not set");

$checkUser = $db->prepare("SELECT email FROM `users` WHERE `email` = ?");
$checkUser->bind_param('s', $email);
$checkUser->execute();
$checkResults = $checkUser->get_result();
if ($checkResults->num_rows > 0) {
    endProcessWithMessage("Email already taken");
} else {
    $query = $db->prepare("INSERT INTO users
        SET
            firstname = ?,
            lastname = ?,
            email = ?,
            registration_status = 'pending',
            photourl = ?");
    $query->bind_param('ssss', $firstname, $lastname, $email, $photourl);
    $query->execute();
    $result = array();
    if ($db->affected_rows > 0) {
        $user_id = base64_encode($db->insert_id);
        $hashed_email = base64_encode($email);
        $subject = "Greetings from Luigi of Emapp!";
        $body = "You recently registered to emapp. To complete your registration please click this <a href='https://emapppp.000webhostapp.com/views/pages-register-password.php?id=$user_id&email=$hashed_email'><b>link</b></a> and enter your new password. <br>
    If the link above did not work you can click this alternative link. <br>
    https://emapppp.000webhostapp.com/views/pages-register-password.php?id=$user_id&email=$hashed_email";
        mailSender($email, $subject, $body);
        $result = array('status' => 'success', 'message' => "An email was sent to your email account please check to complete your registration.");
    } else {
        $result = array('status' => 'error', 'message' => "Error creating user" . $db->error);
    }
    echo json_encode($result);
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
