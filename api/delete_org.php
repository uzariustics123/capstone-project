<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");

$type = isset($_POST["type"]) ? $_POST['type'] : "Organization";

$query = "DELETE organizations, members, departments FROM organizations
        LEFT OUTER JOIN departments ON organizations.organization_id = departments.organization_id
        LEFT OUTER JOIN members ON organizations.organization_id = members.organization_id
        LEFT OUTER JOIN events ON events.department_id = departments.department_id
        LEFT OUTER JOIN participants ON participants.event_id = events.event_id
        LEFT OUTER JOIN attendances ON attendances.event_reference_id = events.event_id
        WHERE organizations.organization_id = $orgid";



//execute the query

$user = $db->query($query);



//check results

$result = array();

if ($db->affected_rows > 0) {
    $result = array('status' => 'success', 'message' => "Deleted succesfully", 'orgid' => $orgid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error " . $db->error . " id = " . $orgid);
}
