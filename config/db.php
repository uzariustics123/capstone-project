<?php

$connection = new mysqli('localhost', 'root', '', 'event_management_db');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
