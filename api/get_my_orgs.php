<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$userid = isset($_POST["userid"]) ? $_POST['userid'] : endProcessWithMessage("userid not set");

//$data = json_decode(file_get_contents("php://input"))

$query = "SELECT * FROM organizations
LEFT OUTER JOIN members ON members.organization_id = organizations.organization_id
WHERE user_reference_id = $userid
GROUP BY members.organization_id
HAVING COUNT(*) > 0";


//execute the query

$user = $db->query($query);



//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    while ($row = $user->fetch_assoc()) {
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting list of orgs", 'data' => $rows);
    echo json_encode($result);
} else {

    endProcessWithMessage("You currently have no school or organization, add new.");
}
