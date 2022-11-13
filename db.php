<?php


//host, username, password, db name,
// $db = new mysqli('localhost', 'root', '', 'events_management');
$db = new mysqli('localhost', 'root', '', 'emapp_test');



if ($db->connect_error) {

    //

    endProcessWithMessage($db->connect_error);
} else {

    //Do some shit here

}
