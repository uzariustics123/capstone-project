<?php
if (isset($_POST['submit'])) {

    require_once '../config/db.php';
    require_once 'functions.ctrls.php';

    $event_name = $_POST['event-name'];
    $event_description = $_POST['event-description'];
    $event_date = $_POST['event-date'];
    $date_created = date('Y-m-d');
    $event_start = $_POST['event-start'];
    $event_end = $_POST['event-end'];
    $attendance_duration = $_POST['attendance-duration-select'];
    if (isset($_POST['all-day'])) {
        $all_day = "yes";
    } else {
        $all_day = "no";
    }
    $all_day;
    $status = "Approved";
    $user_id = $_POST['user-id'];
    $organization_id = $_POST['organization-id'];
    $department_id = $_POST['department-id'];
    if ($_POST['importer-id'] != 0) {
        $importer_id = $_POST['importer-id'];
        $status = "Pending";
    }


    if (emptyEventInput($event_name, $event_description, $event_date, $date_created, $event_start, $event_end, $attendance_duration, $all_day)) {

        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Error!',
        'Empty Input',
        'danger')
        </script>";
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id");
        exit();
    }

    createEvent($conn, $event_name, $event_description, $event_date, $date_created, $event_start, $event_end, $attendance_duration, $all_day, $status, $user_id, $organization_id, $department_id, $importer_id);
} else {
    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id");
    exit();
}
