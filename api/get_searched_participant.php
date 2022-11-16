<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : endProcessWithMessage("keyword uid not set");
$deptid = isset($_POST['deptid']) ? $_POST['deptid'] : endProcessWithMessage("deptid uid not set");

// $query = "SELECT * FROM users 
// RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
// LEFT OUTER JOIN departments ON members.department_id = departments.department_id
// RIGHT OUTER JOIN participants ON participants.member_reference_id = members.member_id
// WHERE email LIKE '$keyword%'
// OR firstname LIKE '$keyword%'
// OR lastname LIKE '$keyword%'
// AND members.department_id = $deptid AND participants.participant_status = 'confirmed'
// LIMIT 10 GROUP BY users.userid
// "; 

//execute the query

$query = $db->prepare("SELECT * FROM users 
RIGHT OUTER JOIN members ON members.user_reference_id = users.userid
LEFT OUTER JOIN departments ON members.department_id = departments.department_id
WHERE email LIKE CONCAT(?,'%') OR firstname LIKE CONCAT(?,'%') OR lastname LIKE CONCAT(?,'%') AND members.department_id = ? GROUP BY users.userid");
$query->bind_param('sssi', $keyword, $keyword, $keyword, $deptid);
$query->execute();
//execute the query

$users = $query->get_result();
//check results

$result = array();

if ($row = $users->num_rows > 0) {
    $rows = array();
    while ($row = $users->fetch_assoc()) {
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting list of searched participants", 'data' => $rows);
    echo json_encode($result);
} else {
    endProcessWithMessage("No results found!");
}
