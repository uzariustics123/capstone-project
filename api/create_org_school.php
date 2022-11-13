<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$orgname = isset($_POST['orgname']) ? $_POST['orgname'] : endProcessWithMessage("orgname not set");
$orgdesc = isset($_POST['orgdesc']) ? $_POST['orgdesc'] : "";
$orgaddress = isset($_POST['orgaddress']) ? $_POST['orgaddress'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email not set");
$userid = isset($_POST['userid']) ? $_POST['userid'] : endProcessWithMessage("userid not set");

$query = $db->prepare("INSERT INTO organizations
        SET org_name = ?,
        org_description = ?,
        org_address  = ?,
        org_status = 'pending',
        org_admin_id = ?,
        date_created = current_date()");
$query->bind_param('sssi', $orgname, $orgdesc, $orgaddress, $userid);
$query->execute();
$result = array();
if ($db->affected_rows > 0) {
    $orgid = $db->insert_id;
    $query2 = $db->prepare("INSERT INTO members
              SET
              usertype = 'admin',
              user_reference_id = ?,
              member_email = ?,
              organization_id = ?");
    $query2->bind_param('isi', $userid, $email, $orgid);
    $query2->execute();
    if ($db->affected_rows > 0) {

        $result = array('status' => 'success', 'message' => "New org has been added", "orgid" => $orgid);
        echo json_encode($result);
    } else {
        endProcessWithMessage("Error member insertion " . $db->error . $query2);
    }
} else {

    endProcessWithMessage("Error org insertion " . $db->error . $query);
}
