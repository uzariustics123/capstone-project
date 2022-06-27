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

function createOrganization($conn, $organization_name, $organization_description, $user_id, $file)
{

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "INSERT INTO organizations (organization_name, organization_description, user_id, image) VALUES (?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-add-organization.php?error=mysqlierror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssss", $organization_name, $organization_description, $user_id, $filePath);
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

    header("location: ../views/pages-add-organization.php?error=none");
    exit();
}
