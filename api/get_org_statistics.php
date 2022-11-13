<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");
$orgid = isset($_POST["orgid"]) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$usercount = 0;
$eventcount = 0;
$departmentsCount = 0;
$organizercount = 0;
$pendingUsercount = 0;
$approvedUsercount = 0;
$pendingEventcount = 0;
$approvedEventcount = 0;
//$data = json_decode(file_get_contents("php://input"))

$getUserCount = $db->prepare("SELECT * FROM members
RIGHT OUTER JOIN users ON users.userid = members.user_reference_id
WHERE organization_id = ? GROUP BY user_reference_id");
$getUserCount->bind_param('i', $orgid);
$getUserCount->execute();
$usercount = $getUserCount->get_result()->num_rows;

$getPendingUserCount = $db->prepare("SELECT * FROM members
RIGHT OUTER JOIN users ON users.userid = members.user_reference_id
WHERE organization_id = ? AND users.registration_status = 'pending' GROUP BY user_reference_id");
$getPendingUserCount->bind_param('i', $orgid);
$getPendingUserCount->execute();
$pendingUsercount = $getPendingUserCount->get_result()->num_rows;


$getEventCount = $db->prepare("SELECT * FROM events
RIGHT OUTER JOIN departments ON departments.department_id = events.department_id
RIGHT OUTER JOIN organizations ON organizations.organization_id = departments.organization_id
WHERE organizations.organization_id = ?");
$getEventCount->bind_param('i', $orgid);
$getEventCount->execute();
$eventcount = $getEventCount->get_result()->num_rows;

$getPendingEventCount = $db->prepare("SELECT * FROM events
RIGHT OUTER JOIN departments ON departments.department_id = events.department_id
RIGHT OUTER JOIN organizations ON organizations.organization_id = departments.organization_id
WHERE organizations.organization_id = ? AND events.event_status = 'pending'");
$getPendingEventCount->bind_param('i', $orgid);
$getPendingEventCount->execute();
$pendingEventcount = $getPendingEventCount->get_result()->num_rows;


$getApprovedEventCount = $db->prepare("SELECT * FROM events
RIGHT OUTER JOIN departments ON departments.department_id = events.department_id
RIGHT OUTER JOIN organizations ON organizations.organization_id = departments.organization_id
WHERE organizations.organization_id = ? AND events.event_status = 'approved'");
$getApprovedEventCount->bind_param('i', $orgid);
$getApprovedEventCount->execute();
$approvedEventcount = $getApprovedEventCount->get_result()->num_rows;


// $getApprovedEventCount = $db->prepare("SELECT * FROM events
// RIGHT OUTER JOIN departments ON departments.department_id = events.department_id
// RIGHT OUTER JOIN organizations ON organizations.organization_id = departments.organization_id
// WHERE organizations.organization_id = ? AND events.event_status = 'approved'");
// $getApprovedEventCount->bind_param('i', $orgid);
// $getApprovedEventCount->execute();
// $approvedEventcount = $getApprovedEventCount->get_result()->num_rows;


$getDeptCount = $db->prepare("SELECT * FROM departments
WHERE organization_id = ?");
$getDeptCount->bind_param('i', $orgid);
$getDeptCount->execute();
$departmentsCount = $getDeptCount->get_result()->num_rows;

$getOrganizersCount = $db->prepare("SELECT * FROM members
WHERE organization_id = ? AND usertype = 'organizer' GROUP BY user_reference_id");
$getOrganizersCount->bind_param('i', $orgid);
$getOrganizersCount->execute();
$organizercount = $getOrganizersCount->get_result()->num_rows;





$result = array();




$result = array(
    'status' => 'success', 'message' => "success getting org data",
    'usercount' => $usercount,
    'departmentsCount' => $departmentsCount,
    'eventcount' => $eventcount,
    'organizercount' => $organizercount,
    'pendingUsers' => $pendingUsercount,
    'pendingEvent' => $pendingEventcount,
    'approveEvent' => $approvedEventcount,
    'approveUsers' => $approvedUsercount,
);
echo json_encode($result);
