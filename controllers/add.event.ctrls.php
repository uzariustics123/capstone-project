<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';
    $organization_id = $_POST['organization_id'];
    $department_id = $_POST['department_id'];

    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_location = $_POST['event_location'];
    $event_date = $_POST['event_date'];
    $now = date('Y-m-d');
    if (isset($_POST['usertype'])) {
        $usertype = $_POST['usertype'];
        $encoded = base64_encode($usertype);
    }

    if (isset($_POST['org_admin_id'])) {
        $org_admin_id = $_POST['org_admin_id'];
    } else {
        $org_admin_id = "";
    }

    if ($event_date < $now) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning',
        'Date Must be valid',
        'warning')
        </script>";

        header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
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

        header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
        exit();
    }
    $event_attendance_duration = $_POST['attendance_duration'];
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
            header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
            exit();
        }
    }

    $department_id = $_POST['department_id'];
    $organization_id = $_POST['organization_id'];
    if ($_POST['usertype'] == 'organizer') {
        $event_status = 'pending';
    } else {
        $event_status = 'approved';
    }



    $event_datetime_created = date("M d,Y");
    $newdate = date("M d, Y", strtotime($event_date));
    $publisher_id = $_POST['publisher_id'];


    createEvent($conn, $event_name, $event_description, $event_location, $department_id, $newdate, $event_attendance_duration, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_all_day, $event_status, $publisher_id, $organization_id, $usertype, $org_admin_id);
} else {
    header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
    exit();
}
