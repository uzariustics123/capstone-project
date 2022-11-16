<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../../db.php');
include_once('../auth_check.php');

$userid = isset($_POST["userid"])? $_POST['userid'] : endProcessWithMessage("userid not set") ;
$deptid = isset($_POST["orgid"])? $_POST['orgid'] : endProcessWithMessage("orgid not set") ;

//$data = json_decode(file_get_contents("php://input"))

$query = "SELECT * FROM users
RIGHT OUTER JOIN members ON users.userid = members.userid
WHERE department_id = $deptid";

//execute the query

$user = $db->query($query);
//check results

$result = array();

if($row = $user->num_rows > 0){

    $rows = array();
    while($row = $user->fetch_assoc()){
        $rows[] = $row;
    }
    $result = array('status' => 'success', 'message' => "success getting list of depts", 'data' => $rows);
    echo json_encode($result);
    }else{

       endProcessWithMessage("Currently no Departments yet, add new.");

    }

    
