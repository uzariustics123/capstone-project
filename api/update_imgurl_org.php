<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : endProcessWithMessage("orgid not set");
$imgurl = isset($_POST['imgurl']) ? $_POST['imgurl'] : endProcessWithMessage("imgurl not set");

$query = "UPDATE organizations
    SET
          org_imgurl = '$imgurl'
          WHERE organization_id = $orgid";

$insert = $db->query($query);
$result = array();
if ($db->affected_rows > 0) {
    //$orgid = $db->insert_id;
    $result = array('status' => 'success', 'message' => "Photo successfully uploaded", 'orgid' => $orgid);
    echo json_encode($result);
} else {
    endProcessWithMessage("Error test " . $orgid . $imgurl . $db->error);
}
