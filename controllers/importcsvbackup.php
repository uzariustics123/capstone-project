<?php
// include mysql database configuration file
include_once '../config/db.php';

if (isset($_POST['import'])) {

    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);
        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
            // Get row data
            $name = $getData[0];
            $email = $getData[1];
            $phone = $getData[2];
            $status = $getData[3];

            // If user already exists in the database with the same email
            $query = "SELECT id FROM users WHERE email = '" . $getData[1] . "'";

            $check = mysqli_query($conn, $query);

            if ($check->num_rows > 0) {
                mysqli_query($conn, "UPDATE users SET name = '" . $name . "', phone = '" . $phone . "', status = '" . $status . "', created_at = NOW() WHERE email = '" . $email . "'");
            } else {
                mysqli_query($conn, "INSERT INTO users (name, email, phone, created_at, updated_at, status) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', NOW(), NOW(), '" . $status . "')");
            }
        }

        // Close opened CSV file
        fclose($csvFile);

        header("Location: ../views/index.php");
    } else {
        echo "Please select valid file";
    }
}




// Prepated Statement Backup
function importMembers($conn, $department_id, $files)
{
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // Validate whether selected file is a CSV file
    if (
        !empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)
    ) {

        // Open uploaded CSV file with read-only mode
        $files = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($files);
        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($files, 10000, ",")) !== FALSE) {
            // Get row data
            $firstname = $getData[0];
            $lastname = $getData[1];
            $email = $getData[2];
            $email = $getData[3];
            $course = $getData[4];
            $yearlevel = $getData[5];
            $usertype = "student";


            $sql = "SELECT email FROM members WHERE email = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../views/pages-register.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);

            if (mysqli_fetch_assoc($resultData)) {
                $sql = "UPDATE members SET firstname=?, middlename=?, lastname=?, email=?, course=?, yearlevel=?, usertype=?, department_id=?, user_id=?, organization_id=? WHERE user_id=? AND organization_id=? AND department_id=?;";

                $stmt = mysqli_stmt_init($conn);


                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "sssssssiii", $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype, $department_id, $user_id, $organization_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                $sql = "INSERT INTO members (firstname, middlename, lastname, email, course, yearlevel, usertype, department_id, user_id, organization_id) VALUES (?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "sssssssiii", $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype, $department_id, $user_id, $organization_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        // Close opened CSV file
        fclose($files);

        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=none");
        exit();
    } else {
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=failed");
        exit();
    }
}


function importMembers2($conn, $files, $department_id, $user_id, $organization_id)
{
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $files = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($files);
        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($files, 10000, ",")) !== FALSE) {
            // Get row data
            $firstname = $getData[0];
            $middlename = $getData[1];
            $lastname = $getData[2];
            $email = $getData[3];
            $course = $getData[4];
            $yearlevel = $getData[5];
            $usertype = "student";


            $sql = "INSERT INTO members (firstname, middlename, lastname, email, course, yearlevel, usertype, department_id, user_id, organization_id) VALUES (?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE firstname=VALUES(firstname), middlename=VALUES(middlename), lastname=VALUES(lastname), email=VALUES(email), course=VALUES(course), yearlevel=VALUES(yearlevel), usertype=VALUES(usertype), department_id=VALUES(department_id), user_id=VALUES(user_id), organization_id=VALUES(organization_id);";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sssssssiii", $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype, $department_id, $user_id, $organization_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        // Close opened CSV file
        fclose($files);

        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=none");
        exit();
    } else {
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=failed");
        exit();
    }
}
