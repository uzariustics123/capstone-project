<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$userid = isset($_GET['userid']) ? $_GET['userid'] : endProcessWithMessage("userid not set");
