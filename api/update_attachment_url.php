<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$attachment = isset($_POST['attachment']) ? $_POST['attachment'] : endProcessWithMessage("attachment not set");

$query = $db->prepare("UPDATE organizations 
SET attachments = ? 
WHERE organization_id = ?");
$query->bind_param("si", $attachment, $orgid);
$query->execute();

$result = array();
if ($db->affected_rows > 0) {
    //$orgid = $db->insert_id;
    $result = array('status' => 'success', 'message' => 'Attachment uploaded successfully');
    echo json_encode($result);
} else {
    endProcessWithMessage("Error updating attachment" . $db->error);
}
