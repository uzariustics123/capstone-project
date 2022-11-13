<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');


//$data = json_decode(file_get_contents("php://input"))

$query = "SELECT * FROM departments";

$string = "one,two,three,four";
$strray = array();
$strray = explode(",", $string);
foreach($strray as $entry){
    
}

echo json_encode($strray);
    
function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            // $randstring .= $characters[rand(0, strlen($characters))];
            $randstring .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randstring;
    }

    echo RandomString();