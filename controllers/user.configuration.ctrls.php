<?php
if (isset($_POST['saveBtn'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    echo $user_id = $_POST['user_id'];
    echo $color_scheme = $_POST['colorScheme'];
    echo $width = $_POST['width'];
    echo $theme = $_POST['theme'];
    echo $compact = $_POST['compact'];

    saveUserConfiguration($conn, $user_id, $color_scheme, $width, $theme, $compact);
} else {
    header("location: ../views/index.php");
    exit();
}
