<?php
if (isset($_POST['submit'])) {
    require_once '../config/db.php';
    require_once 'functions.ctrls.php';



    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_location = $_POST['event_location'];
    $event_date = $_POST['event_date'];
    $now = date('Y-m-d');
    if ($event_date <= $now) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning',
        'Date Must be valid',
        'warning')
        </script>";
        header("location: ../views/pages-view-event-details.php?event_id=$event_id");
        exit();
    }

    $event_start_time_am = $_POST['event_start_time_am'];
    $event_end_time_am = $_POST['event_end_time_am'];
    if ($event_start_time_am >= $event_end_time_am) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning',
        'Time Values must be valid',
        'warning')
        </script>";
        header("location: ../views/pages-view-event-details.php?event_id=$event_id");
        exit();
    }

    $event_attendance_duration = $_POST['event_attendance_duration'];

    if (isset($_POST['event_all_day'])) {
        $event_all_day = 'no';

        $event_start_time_pm = null;
        $event_end_time_pm = null;
    } else {
        $event_all_day = 'yes';
        $event_start_time_pm = $_POST['event_start_time_pm'];
        $event_end_time_pm = $_POST['event_end_time_pm'];
        if ($event_start_time_pm >= $event_end_time_pm) {
            session_start();
            $_SESSION["status"] =
                "<script>
        Swal.fire(
        'Warning',
        'Time Values must be valid',
        'warning')
        </script>";
            header("location: ../views/pages-view-event-details.php?event_id=$event_id");
            exit();
        }
    }

    $newdate = date("M d, Y", strtotime($event_date));

    editEvent($conn, $event_id, $event_name, $event_description, $event_location, $newdate, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_attendance_duration, $event_all_day);
} else {
    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}
