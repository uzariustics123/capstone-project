<?php
function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function randomName()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 30; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function tempPass()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 8; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

function mailSender($recipient, $subject, $body)
{
    $scriptUrl = "https://script.google.com/macros/s/AKfycby-9Q_FJcT8immG1dFWe1cEk2NKRIhDb5WFQShX05zS8uJk8-qBPCQN6P5weWo6vKRmOQ/exec";

    $data = array(
        "recipient" => $recipient,
        "subject" => $subject,
        "body" => $body,
        "isHTML" => 'true'
    );

    $ch = curl_init($scriptUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    return $result;
}

function emptyInputSignup($firstname, $lastname, $email, $password, $registration_status)
{
    $result = true;

    if (empty($firstname) || empty($lastname) || empty($registration_status) || empty($email) || empty($password)) {
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

function createUser($conn, $firstname, $lastname, $email, $password, $registration_status)
{
    $sql = "INSERT INTO users (firstname, lastname, email, photourl, password, registration_status) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $photourl = 'https://cdn-icons-png.flaticon.com/512/892/892781.png';
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $photourl, $hashedpassword, $registration_status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  
      Toast.fire({
        icon: 'success',
        title: 'Registration Success'
      })</script>";
    header("location: ../views/pages-login.php?");
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


function emailExist($conn, $email)
{
    $query = "SELECT * FROM users 
    LEFT OUTER JOIN members ON members.user_reference_id = users.userid 
    WHERE users.email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s",  $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);

    if (!empty($row)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function resetPassword($conn, $email)
{
    $emailExist = emailExist($conn, $email);

    if ($emailExist == false) {
        session_start();
        $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
      Toast.fire({
        icon: 'warning',
        title: 'Email does not exist'
      })</script>";
        header("location: ../views/pages-password-recovery.php");
        exit();
    }

    $query = "UPDATE users SET temp_pass = ?, registration_status = ? WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../views/pages-password-recovery.php");
        exit();
    }
    $temp_pass = tempPass();
    $registration_status = 'pending';
    mysqli_stmt_bind_param($stmt, "sss",  $temp_pass, $registration_status,  $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $recipient = $email;
    $subject = "Password Recovery";
    $body = "Here is your temporary password. After logging in make sure to change your password <br><h1><b> " . $temp_pass . " </b></h1>";
    mailSender($recipient, $subject, $body);
    session_start();
    $_SESSION["email"] = $emailExist["email"];
    header("location: ../views/pages-confirm-mail.php");
    exit();
}


function loginUser($conn, $email, $password)
{
    $emailExist = emailExist($conn, $email);
    $registration_status = $emailExist['registration_status'];

    if ($emailExist == false) {

        session_start();
        $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  
      Toast.fire({
        icon: 'warning',
        title: 'User does not exist'
      })</script>";

        header("location: ../views/pages-login.php?");
        exit();
    }

    if ($registration_status == 'pending') {
        $temp_pass = $emailExist['temp_pass'];

        if ($password != $temp_pass) {
            session_start();
            $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  
      Toast.fire({
        icon: 'warning',
        title: 'Incorrect Password'
      })</script>";

            header("location: ../views/pages-login.php?");
            exit();
        } else if ($password == $temp_pass) {
            session_start();
            $_SESSION["userid"] = $emailExist["userid"];
            $_SESSION["registration_status"] = $emailExist["registration_status"];
            $_SESSION["email"] = $emailExist["email"];
            $_SESSION["member_id"] = $emailExist["member_id"];

            $_SESSION["usertype"] = $emailExist["usertype"];
            $_SESSION['status'] = "
            <script>const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            })
        Toast.fire({
        icon: 'success',
        title: 'Logged in successfully'
        })</script>";
            header("location: ../views/index.php");
            exit();
        }
    } else if ($registration_status == 'registered') {
        $passwordHashed = $emailExist["password"];
        $checkPassword = password_verify($password, $passwordHashed);

        if ($checkPassword == false) {

            session_start();
            $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  
      Toast.fire({
        icon: 'warning',
        title: 'Incorrect Password'
      })</script>";
            header("location: ../views/pages-login.php?");
            exit();
        } else if ($checkPassword == true) {
            session_start();
            $_SESSION["userid"] = $emailExist["userid"];
            $_SESSION["registration_status"] = $emailExist["registration_status"];
            $_SESSION["email"] = $emailExist["email"];
            $_SESSION["member_id"] = $emailExist["member_id"];
            $_SESSION["usertype"] = $emailExist["usertype"];
            $_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })

      Toast.fire({
        icon: 'success',
        title: 'Logged in successfully'
      })</script>";

            header("location: ../views/index.php");
            exit();
        }
    }
}
function emptyInputUserProfile($firstname, $lastname)
{
    $result = true;

    if (empty($firstname) || empty($lastname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function editUserProfile($conn, $user_id, $firstname, $lastname, $file)
{
    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "UPDATE users SET firstname=?, lastname=?, photourl=? WHERE userid = $user_id;";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    session_start();
                    $_SESSION["status"] =
                        "<script>
                    Swal.fire(
                    'Error',
                    'Statement failed',
                    'warning')
                    </script>";
                    header("location: ../views/pages-profile.php");
                    exit();
                }
                $trimmed = ltrim($filePath, "./");
                $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;

                mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $updated_path);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                session_start();
                $_SESSION["status"] =
                    "<script>
                    Swal.fire(
                    'Success',
                    'Profile Updated Successfully',
                    'success')
                    </script>";
                header("location: ../views/pages-profile.php");
                exit();
            }
        }
    }
}

function setupProfile($conn, $user, $password, $firstname, $lastname, $file)
{
    if ($file != null) {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $file['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../assets/uploads/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $sql = "UPDATE users SET firstname=?, lastname=?, photourl=?, password=?, temp_pass=?, registration_status=? WHERE userid = $user;";
                    $stmt = mysqli_stmt_init($conn);
                    $temp_pass = null;
                    $registration_status = 'registered';
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        session_start();
                        $_SESSION["status"] =
                            "<script>
                    Swal.fire(
                    'Error',
                    'Statement failed',
                    'warning')
                    </script>";
                        header("location: ../views/index.php");
                        exit();
                    }
                    $trimmed = ltrim($filePath, "./");
                    $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param(
                        $stmt,
                        "ssssss",
                        $firstname,
                        $lastname,
                        $updated_path,
                        $hashedpassword,
                        $temp_pass,
                        $registration_status
                    );
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    session_start();
                    $_SESSION["registration_status"] = $registration_status;
                    $_SESSION["status"] =
                        "<script>
                    Swal.fire(
                    'Success',
                    'Profile Updated Successfully',
                    'success')
                    </script>";
                    header("location: ../views/index.php");
                    exit();
                }
            }
        }
    } else {
        $file = 'https://cdn-icons-png.flaticon.com/512/892/892781.png';
        $sql = "UPDATE users SET firstname=?, lastname=?, photourl=?, password=?, temp_pass=?, registration_status=? WHERE userid = $user;";
        $stmt = mysqli_stmt_init($conn);
        $temp_pass = null;
        $registration_status = 'registered';
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION["status"] =
                "<script>
                    Swal.fire(
                    'Error',
                    'Statement failed',
                    'warning')
                    </script>";
            header("location: ../views/index.php");
            exit();
        }
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $firstname,
            $lastname,
            $file,
            $hashedpassword,
            $temp_pass,
            $registration_status
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        session_start();
        $_SESSION["registration_status"] = $registration_status;
        $_SESSION["status"] =
            "<script>
                    Swal.fire(
                    'Success',
                    'Profile Updated Successfully',
                    'success')
                    </script>";
        header("location: ../views/index.php");
        exit();
    }
}

function emptyInputOrganization($organization_name, $organization_description, $organization_address)
{
    $result = true;

    if (empty($organization_name) || empty($organization_description) || empty($organization_address)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createOrganization($conn, $organization_name, $organization_description, $organization_address, $userid, $file, $date_created, $email)
{

    if ($file != null) {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $file['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = randomName() . "." . $fileActExt;
        $filePath = '../assets/uploads/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $sql = "INSERT INTO organizations (org_name, org_description, org_address, org_imgurl, date_created, org_admin_id) VALUES (?,?,?,?,?,?);";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../views/pages-add-organization.php?error=mysqlierror");
                        exit();
                    }
                    $trimmed = ltrim($filePath, "./");
                    $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;

                    mysqli_stmt_bind_param($stmt, "ssssss", $organization_name, $organization_description, $organization_address, $updated_path, $date_created, $userid);
                    mysqli_stmt_execute($stmt);


                    if (mysqli_affected_rows($conn)) {
                        $organization_id = $conn->insert_id;

                        $sql = "INSERT INTO members (member_email, usertype, organization_id,user_reference_id) VALUES (?,?,?,?);";
                        $stmt = mysqli_stmt_init($conn);
                        $usertype = 'admin';
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: ../views/pages-add-organization.php?error=mysqlierror");
                            exit();
                        }

                        mysqli_stmt_bind_param($stmt, "ssss", $email, $usertype, $organization_id, $userid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                    }
                    session_start();
                    $_SESSION["status"] =
                        "<script>
                    Swal.fire(
                    'Added!',
                    'An organization has been added.',
                    'success')
                    </script>";
                    header("location: ../views/index.php?error=none");
                    exit();
                }
            }
        }
    } else {
        $file = "https://images.unsplash.com/photo-1606327054536-e37e655d4f4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80";

        $sql = "INSERT INTO organizations (org_name, org_description, org_address, org_imgurl, date_created, org_admin_id) VALUES (?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../views/pages-add-organization.php?error=mysqlierror");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "ssssss", $organization_name, $organization_description, $organization_address, $file, $date_created, $userid);
        mysqli_stmt_execute($stmt);


        if (mysqli_affected_rows($conn)) {
            $organization_id = $conn->insert_id;

            $sql = "INSERT INTO members (member_email, usertype, organization_id,user_reference_id) VALUES (?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            $usertype = 'admin';
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../views/pages-add-organization.php?error=mysqlierror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssss", $email, $usertype, $organization_id, $userid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        session_start();
        $_SESSION["status"] =
            "<script>
                    Swal.fire(
                    'Added!',
                    'An organization has been added.',
                    'success')
                    </script>";
        header("location: ../views/index.php?error=none");
        exit();
    }
}
function deleteOrganization($conn, $organization_id)
{
    $sql_org = "DELETE FROM organizations WHERE organization_id=?";
    $sql_dept = "DELETE FROM departments WHERE organization_id=?";
    $sql_mem = "DELETE FROM members WHERE organization_id=?";
    $sql_event = "DELETE FROM events WHERE publisher_id=?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql_org)) {
        header("location: ../views/pages-add-organization.php?error=mysqlierror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $organization_id);
    mysqli_stmt_execute($stmt);

    if (!mysqli_stmt_prepare($stmt, $sql_dept)) {
        header("location: ../views/pages-add-organization.php?error=mysqlierror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $organization_id);
    mysqli_stmt_execute($stmt);

    if (!mysqli_stmt_prepare($stmt, $sql_mem)) {
        header("location: ../views/pages-add-organization.php?error=mysqlierror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $organization_id);
    mysqli_stmt_execute($stmt);

    if (!mysqli_stmt_prepare($stmt, $sql_event)) {
        header("location: ../views/pages-add-organization.php?error=mysqlierror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $organization_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Deleted!',
        'An organization has been deleted.',
        'success')
        </script>";
    header("location: ../views/index.php?error=none");
    exit();
}

function editOrganization($conn, $organization_id, $organization_name, $organization_description, $organization_address, $file, $imgurl)
{

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {

                $sql = "UPDATE organizations SET org_name=?, org_description=?, org_address=?,org_imgurl=? WHERE organization_id= $organization_id;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-organization.php?error=stmtfailed");
                    exit();
                }
                $trimmed = ltrim($filePath, "./");
                $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;

                mysqli_stmt_bind_param($stmt, "ssss", $organization_name, $organization_description, $organization_address, $updated_path);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                unlink($imgurl);

                session_start();
                $_SESSION["status"] =
                    "<script>
                 Swal.fire(
                'Updated!',
                'Succesfully Updated!',
                'success')
                </script>";
                header("location: ../views/pages-my-organization.php?id=$organization_id");
                exit();
            }
        }
    }
}
function emptyInputDepartment($department_name, $department_desc, $department_code, $user_id, $organization_id)
{
    $result = true;

    if (empty($department_name) || empty($department_desc) || empty($department_code) || empty($user_id) || empty($organization_id) || empty($department_code)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createDepartment($conn, $department_name, $department_desc, $department_code, $file, $organization_id, $email)
{
    $emailExist = emailExist($conn, $email);

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {

                $sql = "INSERT INTO departments (dept_name, dept_description, dept_code, dept_imgurl, organization_id) VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    session_start();
                    $_SESSION["status"] =
                        "<script>
                    Swal.fire(
                    'Error!',
                    'Something went wrong!',
                    'warning')
                    </script>";
                    header("location: ../views/index.php");
                    exit();
                }

                $trimmed = ltrim($filePath, "./");
                $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;

                mysqli_stmt_bind_param($stmt, "sssss", $department_name, $department_desc, $department_code, $updated_path, $organization_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                session_start();
                $_SESSION["usertype"] = $emailExist["usertype"];
                $_SESSION["status"] =
                    "<script>
                    Swal.fire(
                    'Added!',
                    'A department has been added.',
                    'success')
                    </script>";
                header("location: ../views/pages-my-organization.php?id=$organization_id");
                exit();
            }
        }
    }
}

function editDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $department_id, $imgurl)
{


    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "UPDATE departments SET dept_name=?, dept_description=?, dept_code=?, dept_imgurl=? WHERE department_id=$department_id;";

                $stmt = mysqli_stmt_init($conn);


                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmtfailed");
                    exit();
                }

                $trimmed = ltrim($filePath, "./");
                $updated_path = "https://emapppp.000webhostapp.com/" . $trimmed;

                mysqli_stmt_bind_param($stmt, "ssss", $department_name, $department_desc, $department_code, $updated_path);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                unlink($imgurl);
                session_start();
                $_SESSION["status"] =
                    "<script>
                    Swal.fire(
                    'Updated!',
                    'A department has been updated.',
                    'success')
                    </script>";
                header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id");
                exit();
            }
        }
    }
}

function deleteDepartment($conn, $department_id, $organization_id)
{
    $sql_dept = "DELETE FROM departments WHERE department_id=?";
    $sql_mem = "DELETE FROM members WHERE department_id=?";
    $sql_event = "DELETE FROM events WHERE department_id=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql_dept)) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        Error!',
        'Statement Fail.',
        'danger')
        </script>";
        header("location: ../views/pages-my-organization.php?id=$organization_id");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $department_id);
    mysqli_stmt_execute($stmt);

    if (!mysqli_stmt_prepare($stmt, $sql_mem)) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        Error!',
        'Statement Fail.',
        'danger')
        </script>";
        header("location: ../views/pages-my-organization.php?id=$organization_id");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $department_id);
    mysqli_stmt_execute($stmt);

    if (!mysqli_stmt_prepare($stmt, $sql_event)) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        Error!',
        'Statement Fail.',
        'danger')
        </script>";
        header("location: ../views/pages-my-organization.php?id=$organization_id");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $department_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Deleted!',
        'A department has been deleted.',
        'success')
        </script>";

    header("location: ../views/pages-my-organization.php?id=$organization_id");
    exit();
}


function importMembers($conn, $department_id, $organization_id, $files, $org_admin_id)
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

    if (
        !empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)
    ) {
        $files = fopen($_FILES['file']['tmp_name'], 'r');
        fgetcsv($files);

        while (($getData = fgetcsv($files, 10000, ",")) !== FALSE) {

            $firstname = $getData[0];
            $lastname = $getData[1];
            $email = $getData[2];
            $registration_status = 'pending';
            $usertype = "member";


            if (!isset($firstname) || !isset($lastname) || !isset($email)) {
                session_start();
                $_SESSION["status"] =
                    "<script>
                    Swal.fire(
                    'Error!',
                    'Some columns are missing.',
                    'danger')
                    </script>";
                header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id");
                exit();
            }


            $emailExist = emailExist($conn, $email);

            if ($emailExist == true) {
                $userid = $emailExist['userid'];

                $sql_for_update = "SELECT * FROM members WHERE department_id = ? AND user_reference_id = $userid;";
                $stmt_for_update = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt_for_update, $sql_for_update)) {
                    header("location: ../views/pages-register.php?error=stmtfailed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt_for_update, "s", $department_id);
                mysqli_stmt_execute($stmt_for_update);
                $result = $stmt_for_update->get_result();
                $members = $result->fetch_assoc();

                if (isset($members['department_id']) == $department_id && $members['user_reference_id'] == $userid) {
                    session_start();
                    $_SESSION["status"] =
                        "<script>
                    Swal.fire(
                    'Added!',
                    'Import success.',
                    'success')
                    </script>";
                    header("location: ../views/pages-my-department.php?&org_id=$organization_id&dept_id=$department_id&admin_id=$org_admin_id");
                    exit();
                } else {
                    $sql = "INSERT INTO members (member_email, usertype, department_id, organization_id, user_reference_id) VALUES (?,?,?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../views/pages-register.php?error=stmtfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "sssss", $email, $usertype, $department_id, $organization_id, $userid);
                    mysqli_stmt_execute($stmt);

                    $subject = "Congratulations!!";
                    $body = "<h1><b>You have been successfully added to a department in your organization</b></h1>";
                    //mailSender($email, $subject, $body);
                }
            } else if ($emailExist == false) {

                $sql = "INSERT INTO users (firstname, lastname, email, photourl, temp_pass, registration_status) VALUES (?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                $photourl = 'https://cdn-icons-png.flaticon.com/512/892/892781.png';
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                    exit();
                }
                $password = tempPass();
                mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $photourl, $password, $registration_status);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                if (mysqli_affected_rows($conn)) {
                    $insert_id = $conn->insert_id;

                    $sql = "INSERT INTO members (member_email, usertype, department_id, organization_id, user_reference_id) VALUES (?,?,?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "sssss", $email, $usertype, $department_id, $organization_id, $insert_id);
                    mysqli_stmt_execute($stmt);

                    $subject = "Congratulations!!";
                    $body = "You have been successfully added to a department in your organization to view this you can login using your email and this password. When first time logging in you will be prompted to change this temporary password. Thank you! <h2>" . $password . "</h2>";
                    //mailSender($email, $subject, $body);
                }
            }
        }

        fclose($files);

        session_start();
        $_SESSION["status"] =
            "<script>
                    Swal.fire(
                    'Added!',
                    'Import success.',
                    'success')
                    </script>";
        header("location: ../views/pages-my-department.php?&org_id=$organization_id&dept_id=$department_id&admin_id=$org_admin_id");
        exit();
    } else {
        header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
        exit();
    }
}

function editMember($conn, $usertype, $member_id, $organization_id, $department_id)
{
    $sql = "UPDATE members SET usertype = ? WHERE member_id=$member_id; ";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $usertype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Updated!',
        'Updated Member details.',
        'success')
        </script>";

    header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id#members-list");
    exit();
}

function emptyEventInput($event_name, $event_description, $event_date, $date_created, $event_start, $event_end, $event_duration, $all_day)
{
    $result = true;

    if (empty($event_name) || empty($event_description) || empty($event_date) || empty($date_created) || empty($event_start) || empty($event_end) || empty($event_duration) || empty($all_day)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createEvent($conn, $event_name, $event_description, $event_location, $department_id, $newdate, $event_attendance_duration, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_all_day, $event_status, $publisher_id, $organization_id, $usertype, $org_admin_id)
{
    $insert = "INSERT INTO events SET 
            event_name=?,
            event_description=?,
            event_location=?,
            department_id=?,          
            event_date=?,
            event_attendance_duration=?,
            event_start_time_am=?,
            event_end_time_am=?,
            event_start_time_pm=?,
            event_end_time_pm=?,
            event_all_day=?,
            event_status=?,
            publisher_id=?;";

    $stmt = mysqli_stmt_init($conn);
    $encoded = base64_encode($usertype);
    if (!mysqli_stmt_prepare($stmt, $insert)) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Error!',
        'Statement Failed!',
        'success')
        </script>";
        header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssssssss", $event_name, $event_description, $event_location, $department_id, $newdate, $event_attendance_duration, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_all_day, $event_status, $publisher_id);
    mysqli_stmt_execute($stmt);

    $event_id = $conn->insert_id;

    $query = "SELECT * FROM members WHERE department_id = $department_id;";
    $results = $conn->query($query);
    while ($row = $results->fetch_assoc()) {
        $member_id = $row['member_id'];
        $accesstype = 'attendee';
        $participant_status = 'pending';
        $sql = "INSERT INTO participants SET accesstype = ?, participant_status=?, event_id = $event_id, member_reference_id =$member_id";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION["status"] =
                "<script>
        Swal.fire(
        'Error!',
        'Statement Failed!',
        'success')
        </script>";
            header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id");
        }

        mysqli_stmt_bind_param($stmt, "ss", $accesstype, $participant_status);
        mysqli_stmt_execute($stmt);
    }

    if ($event_status == 'approved') {
        $query = "SELECT * FROM ((events 
                RIGHT OUTER JOIN departments ON events.department_id = departments.department_id)
                RIGHT OUTER JOIN members ON events.department_id = members.department_id)
                WHERE events.event_id = $event_id;";
        $results = $conn->query($query);
        while ($row = $results->fetch_assoc()) {
            $recipient = $row['member_email'];
            $subject = $row['event_name'];
            $body = 'Hey you are invited to attend ' . $subject . ' you can view and confirm your attendance by logging in to your account';
            //mailSender($recipient, $subject, $body);
        }
    }

    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Success!',
        'Added Event Successfully!',
        'success')
        </script>";
    mysqli_stmt_close($stmt);
    $link = "?org_id=$organization_id&dept_id=$department_id&usertype=$encoded&admin_id=$org_admin_id";
    header("location: ../views/pages-my-department.php" . $link);
    exit();
}


function deleteEvent($conn, $event_id, $organization_id, $department_id)
{

    $query = "SELECT * FROM participants 
                RIGHT OUTER JOIN members ON participants.member_reference_id = members.member_id
                RIGHT OUTER JOIN events ON participants.event_id = events.event_id
                WHERE events.event_id = $event_id;";
    $results = $conn->query($query);
    while ($row = $results->fetch_assoc()) {
        $recipient = $row['member_email'];
        $subject = $row['event_name'];
        $body = 'The Event ' . $subject . ' has been deleted ';
        //mailSender($recipient, $subject, $body);
    }


    $sql = "DELETE FROM events WHERE event_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $event_id);
    mysqli_stmt_execute($stmt);


    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Deleted!',
        'Event deleted.',
        'success')
        </script>";

    header("location: ../views/pages-my-department.php?org_id=$organization_id&dept_id=$department_id#events-list");
    exit();
}

function approveEvent($conn, $event_id)
{
    $sql = "UPDATE events SET event_status = ? WHERE event_id=$event_id";
    $stmt = mysqli_stmt_init($conn);
    $status = "approved";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-view-event-details.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);

    $query = "SELECT * FROM events 
                RIGHT OUTER JOIN departments ON events.department_id = departments.department_id
                RIGHT OUTER JOIN members ON events.department_id = members.department_id
                WHERE events.event_id = $event_id;";
    $results = $conn->query($query);
    while ($row = $results->fetch_assoc()) {
        $recipient = $row['member_email'];
        $subject = $row['event_name'];
        $body = 'Hey you are invited to attend ' . $subject . ' you can view and confirm your attendance by logging in to your account';
        //mailSender($recipient, $subject, $body);
    }

    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Approved!',
        'Event Approved.',
        'success')
        </script>";

    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}


function editEvent($conn, $event_id, $event_name, $event_description, $event_location, $newdate, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_attendance_duration, $event_all_day)
{
    $sql = "UPDATE events SET event_name = ?, event_description = ?, event_location = ?, event_date =?, event_start_time_am = ?,
    event_end_time_am =?, event_start_time_pm =? ,event_end_time_pm =?, event_attendance_duration = ?, event_all_day =?
    WHERE event_id =$event_id";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssss", $event_name, $event_description, $event_location, $newdate, $event_start_time_am, $event_end_time_am, $event_start_time_pm, $event_end_time_pm, $event_attendance_duration, $event_all_day);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Updated!',
        'Event Details Updated.',
        'success')
        </script>";

    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}

function editParticipantRole($conn, $participant_id, $accesstype, $event_id)
{
    $sql = "UPDATE participants SET accesstype = ? WHERE participant_id =$participant_id";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $accesstype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Updated!',
        'Role Updated.',
        'success')
        </script>";

    header("location: ../views/pages-view-event-details.php?event_id=$event_id");
    exit();
}
function confirmAttendance($conn, $participant_id)
{
    $participant_status = 'confirmed';
    $sql = "UPDATE participants SET participant_status = ? WHERE participant_id =$participant_id";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $participant_status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Confirmed!',
        'Attendance Confirmed.',
        'success')
        </script>";

    header("location: ../views/pages-profile.php");
    exit();
}
function addEvaluation($conn, $user_id, $event_id,  $customRadio1, $customRadio2, $customRadio3, $customRadio4, $customRadio5)
{

    $query = "SELECT * FROM evaluations WHERE user_reference_id = $user_id AND event_reference_id = $event_id;";
    $result = $conn->query($query);
    $rows = $result->fetch_assoc();
    if (!empty($rows)) {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning!',
        'evaluation already added',
        'warning')
        </script>";

        header("location: ../views/pages-profile.php");
        exit();
    }


    $sql = "INSERT INTO evaluations SET user_reference_id=?, event_reference_id=?, question_1=?, question_2=?, question_3=?, question_4=?, question_5 =?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $event_id,  $customRadio1, $customRadio2, $customRadio3, $customRadio4, $customRadio5);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Congratulations!',
        'Succesfully added evaluation.',
        'success')
        </script>";

    header("location: ../views/pages-profile.php");
    exit();
}
function saveUserConfiguration($conn, $user_id, $color_scheme, $width, $theme, $compact)
{
    $sql = "INSERT INTO configurations SET user_reference_id=?, event_reference_id=?, question_1=?, question_2=?, question_3=?, question_4=?, question_5 =?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $event_id,  $customRadio1, $customRadio2, $customRadio3, $customRadio4, $customRadio5);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Congratulations!',
        'Succesfully added evaluation.',
        'success')
        </script>";

    header("location: ../views/pages-profile.php");
    exit();
}
