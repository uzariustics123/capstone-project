<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

error_reporting(E_ALL ^ E_WARNING);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$jsonpost = isset($_POST['jsondata']) ? $_POST['jsondata'] : endProcessWithMessage("jsondata not set");
$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : 0;
$status = "success";
$failedemails = "";
$jsondata = json_decode($jsonpost, true);

for ($membercount = 0; $membercount < count($jsondata); $membercount++) {
    $firstname = isset($jsondata[$membercount]['firstname']) ? $jsondata[$membercount]['firstname'] : endProcessWithMessage("firstname not set");
    $lastname = isset($jsondata[$membercount]['lastname']) ? $jsondata[$membercount]['lastname'] : endProcessWithMessage("lastname not set");
    $email = isset($jsondata[$membercount]['email']) ? $jsondata[$membercount]['email'] : endProcessWithMessage("email not set");
    $course = isset($jsondata[$membercount]['course']) ? $jsondata[$membercount]['course'] : "null";
    // echo $firstname . " " . $lastname . " " . $email . " " . $course ."\n";

    //check existing user
    $existingUser = $db->prepare("SELECT * FROM users
                WHERE email = ?");
    $existingUser->bind_param('s', $email);
    $existingUser->execute();
    $existingResult = $existingUser->get_result();
    // $check  = $db->query($existingUser);
    if ($row = $existingResult->num_rows > 0) {
        //user already exist in the system so proceed to member insertion
        $user = $existingResult->fetch_assoc();
        $useremail = $user['email'];
        $user_id = $user['userid'];

        if (isExistInMembers($email, $orgid, $deptid, $db)) {
            $status = "error";
            $failedemails .= "\n" . $email . " -> Already exist in members" . $db->error;
        } else {
            $insertToMember = $db->prepare("INSERT INTO members 
                            SET member_email = ?,
                                usertype = 'member',
                                organization_id = ?,
                                user_reference_id = ?,
                                department_id = ?");
            $insertToMember->bind_param('siii', $useremail, $orgid, $user_id, $deptid);
            $insertToMember->execute();
            $insertion = $insertToMember->get_result();
            if ($rowdata = $db->affected_rows > 0) {
            } else {
                $status = "error";
                $failedemails .= "\n" . $email . " -> failed to register as member. department_id:" . $deptid .  " " . $db->error;
            }
        }
    } else {
        //this shouldn't happen under normal circumstances.
        endProcessWithMessage("no user associated with this account");
    }
}


if ($status == "error") {
    endProcessWithMessage("Failed adding entries:\n" . $failedemails);
} else {

    $result = array('status' => 'success', 'message' => "Success adding people.");
    echo json_encode($result);
}


function isExistInMembers($email, $orgid, $deptid, $db)
{
    $query = "SELECT * FROM members WHERE member_email = '$email' AND organization_id = $orgid AND department_id = '$deptid'";
    $result = $db->query($query);
    if ($row = $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
