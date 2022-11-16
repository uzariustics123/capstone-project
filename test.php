<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('../db.php');



$date = '1998-11-24';

$eventdate = Date("M d, Y");
echo $eventdate;
echo '<br/>' . strtotime($eventdate);
echo '<br/>' . strtotime($date);
