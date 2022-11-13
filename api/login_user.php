<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email missing");
$pass = isset($_POST['password']) ? $_POST['password'] : endProcessWithMessage("password missing");
$hashpass = password_hash($pass, PASSWORD_DEFAULT);

$stmn = $db->prepare("SELECT * FROM users WHERE email = ?");
$stmn->bind_param('s', $email);
$stmn->execute();
$result = $stmn->get_result();
if ($row = $result->num_rows > 0) {
    $data = $result->fetch_assoc();

    if ($data['registration_status'] == "registered") {
        $checkpass = password_verify($pass, $data['password']);
        if ($checkpass) {
            $api = array('status' => 'success', 'message' => "", 'registration_status' => $data['registration_status'], 'data' => $data);
            echo json_encode($api);
        } else {
            endProcessWithMessage("password or email does not match");
        }
    } else {
        endProcessWithMessage("This email is pending for registration, please check your inbox to complete registration");
    }
} else {
    endProcessWithMessage("There's no account associated with this email");
}


function endProcessWithMessage($msg)
{

    $result = array('status' => 'error', 'message' => "$msg");

    echo json_encode($result);

    die();
}
