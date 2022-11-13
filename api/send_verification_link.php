<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');

$email = isset($_POST['email']) ? $_POST['email'] : endProcessWithMessage("email not set");
// mailSender()