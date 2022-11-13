<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$orgname = isset($_POST['orgname']) ? $_POST['orgname'] : endProcessWithMessage("orgname not set");
$orgdesc = isset($_POST['orgdesc']) ? $_POST['orgdesc'] : "";
$orgaddress = isset($_POST['orgaddress']) ? $_POST['orgaddress'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : endProcessWithMessage("type not set");
$userid = isset($_POST['userid']) ? $_POST['userid'] : endProcessWithMessage("userid not set");

$query = $db->prepare('UPDATE organizations
    SET
        org_name = ?,
        org_description = ?,
        org_address  = ?
        WHERE organization_id = ?');
$query->bind_param('sssi', $orgname, $orgdesc, $orgaddress, $orgid);
$query->execute();
$result = array();
if ($db->affected_rows > 0) {
    $result = array('status' => 'success', 'message' => $orgname . " has been updated", 'orgid' => $orgid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error updating org: " . $db->error . "\n and query: " . $query);
}
