<?php

$image = $_GET["image"];
unlink($image);
header("location: ../views/pages-profile.php");
exit();
