<?php

function emptyInputSignup($firstname, $lastname, $username, $email, $password)
{
    $result = true;

    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = true;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $repeat_password)
{
    $result = true;

    if ($password !== $repeat_password) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExist($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $username, $email, $password)
{
    $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../views/pages-register.php?error=none");
    exit();
}


function emptyInputLogin($email, $password)
{
    $result = true;

    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password)
{
    $usernameExists = usernameExist($conn, $email, $email);

    if ($usernameExists === false) {
        header("location: ../views/pages-login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $usernameExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../views/pages-login.php?error=wrongpassword");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["user_id"];
        header("location: ../views/index.php");
        exit();
    }
}
function updateUser($conn, $firstname, $lastname, $username, $bio, $address, $mobile, $facebook, $gmail, $twitter, $github, $instagram, $user_id)
{
    $sql = "UPDATE users SET firstname=?, lastname=?, username=?, bio=?, address=?, mobile=?, facebook=?, gmail=?, twitter=?, github=?, instagram=? WHERE user_id=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-profile.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssssss", $firstname, $lastname, $username, $bio, $address, $mobile, $facebook, $gmail, $twitter, $github, $instagram, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../views/pages-profile.php?error=none");
    exit();
}

function emptyInputOrganization($organization_name, $organization_description, $user_id)
{
    $result = true;

    if (empty($organization_name) || empty($organization_description) || empty($user_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createOrganization($conn, $organization_name, $organization_description, $user_id, $file, $date_created)
{

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "INSERT INTO organizations (organization_name, organization_description, user_id, image, date_created) VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-add-organization.php?error=mysqlierror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "sssss", $organization_name, $organization_description, $user_id, $filePath, $date_created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("location: ../views/pages-add-organization.php?error=none");
                exit();
            }
        }
    }
}
function deleteOrganization($conn, $organization_id)
{
    $sql = "DELETE FROM organizations WHERE organization_id=?";
    $stmt = mysqli_stmt_init($conn);



    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=mysqlierror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $organization_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../views/pages-add-organization.php?success");
    exit();
}

function editOrganization($conn, $organization_name, $organization_description, $user_id, $organization_id)
{
    $sql = "UPDATE organizations SET organization_name=?, organization_description=? WHERE user_id=? AND organization_id=?;";

    $stmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-my-organization.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssii", $organization_name, $organization_description, $user_id, $organization_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../views/pages-my-organization.php?id=$organization_id&error=none");
    exit();
}
function emptyInputDepartment($department_name, $department_desc, $department_code, $user_id, $organization_id, $department_id)
{
    $result = true;

    if (empty($department_name) || empty($department_desc) || empty($department_code) || empty($user_id) || empty($organization_id) || empty($department_code)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function createDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $date_created)
{

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {

                $sql = "INSERT INTO departments (department_name, department_description, department_code, department_image, user_id, organization_id, date_created) VALUES (?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-add-organization.php?error=mysqlierror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssssiis", $department_name, $department_desc, $department_code, $filePath, $user_id, $organization_id, $date_created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("location: ../views/pages-my-organization.php?id=$organization_id");
                exit();
            }
        }
    }
}

function editDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $department_id)
{


    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "UPDATE departments SET department_name=?, department_description=?, department_code=?, department_image=? WHERE user_id=$user_id AND organization_id=$organization_id AND department_id=$department_id;";

                $stmt = mysqli_stmt_init($conn);


                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssss", $department_name, $department_desc, $department_code, $filePath);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=none");
                exit();
            }
        }
    }
}



function importMembers($conn, $files, $department_id, $user_id, $organization_id)
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
            $middlename = $getData[1];
            $lastname = $getData[2];
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

            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc();

            if (isset($user['email']) == $email) {
                $sql = "UPDATE members SET firstname=?, middlename=?, lastname=?, email=?, course=?, yearlevel=?, usertype=?, department_id=?, user_id=?, organization_id=? WHERE email='$email';";
                $stmt = mysqli_stmt_init($conn);
                $stmt = $conn->prepare($sql);
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
