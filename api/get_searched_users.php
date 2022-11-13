<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');
include_once('auth_check.php');

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : endProcessWithMessage("keyword uid not set");

$query = "SELECT * FROM users 
WHERE email LIKE '$keyword%'
OR firstname LIKE '$keyword%'
OR lastname LIKE '$keyword%'
LIMIT 10
";

//execute the query

$user = $db->query($query);

//check results

$result = array();

if ($row = $user->num_rows > 0) {

    $rows = array();
    while ($row = $user->fetch_assoc()) {
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting filtered user", 'data' => $rows);
    echo json_encode($result);
} else {

    endProcessWithMessage("no data found for this keyword");
}
