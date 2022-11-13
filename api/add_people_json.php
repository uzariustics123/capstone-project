<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
//include_once('auth_check.php');

error_reporting(E_ALL ^ E_WARNING);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$jsonpost = isset($_POST['jsondata']) ? $_POST['jsondata'] : endProcessWithMessage("jsondata not set");
$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : 0;

$status = "success";
$failedemails = "";
$jsondata = json_decode($jsonpost, true);

// echo $jsondata[0]['firtsname'];


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
            $failedemails .= "\n" . $email . " -> Already exist as member" . $db->error;
        } else {
            $insertToMember = "INSERT INTO members 
                            SET member_email = '$useremail',
                                usertype = 'member',
                                organization_id = $orgid,
                                user_reference_id = $user_id,
                                department_id = $deptid ";
            $insertion = $db->query($insertToMember);
            if ($rowdata = $db->affected_rows > 0) {
            } else {
                $status = "error";
                $failedemails .= "\nfailed to add member" . $email . $db->error;
            }
        }
    } else {
        //user doesn't exist so register with temp_pass and registration_status = pending for confirmation.
        //user must also register to the system to complete the registration and the membership to the School/Organization
        $randomPass = RandomPass();
        $regUser = $db->prepare("INSERT INTO users 
            SET firstname = ?,
                lastname = ?,
                email = ?,
                registration_status = 'pending',
                temp_pass = ?,
                photourl = 'https://cdn-icons-png.flaticon.com/512/892/892781.png' ");
        $regUser->bind_param('ssss', $firstname, $lastname, $email, $randomPass);
        $regUser->execute();
        $insertion = $regUser->get_result();
        if ($rowdata = $db->affected_rows > 0) {
            $userid =  $db->insert_id;
            $addToMembers = " INSERT INTO members 
                        SET member_email = '$email',
                        usertype = 'member',
                        user_reference_id = $userid,
                        department_id = $deptid,
                        organization_id = $orgid";
            if (isExistInMembers($email, $orgid, $deptid, $db)) {
                $status = "error";
                $failedemails .= "\n" . $email . " -> already a member" . $db->error;
            } else {
                $memberInsertion = $db->query($addToMembers);
                if ($memberrow = $db->affected_rows > 0) {
                } else {
                    $status = "error";
                    $failedemails .= "\n" . $email . " -> failed to register as member. department_id:" . $deptid .  " " . $db->error;
                }
            }
        } else {
            $status = "error";
            $failedemails .= "\n" . $email . " -> Something went wrong when processing this entry " . $db->error;
        }
    }
}

if ($status == "error") {
    endProcessWithMessage("Failed entries\n" . $failedemails);
} else {

    $result = array('status' => 'success', 'message' => "Success adding people. \nFailed entries\n" . $failedemails);
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
function endProcessWithMessage($msg)
{
    $result = array('status' => 'error', 'message' => "$msg");
    echo json_encode($result);
    die();
}
function isExistInMembers($email, $orgid, $deptid, $db)
{
    $query = "SELECT * FROM members WHERE member_email = '$email' AND organization_id = $orgid AND department_id = $deptid";
    $result = $db->query($query);
    if ($row = $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
