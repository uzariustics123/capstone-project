<?php

$conn = new mysqli('localhost', 'root', '', 'emapp_test');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

// Remote Server
// $conn = new mysqli('192.168.150.175', 'clyde123', '', 'events_management');
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// };
