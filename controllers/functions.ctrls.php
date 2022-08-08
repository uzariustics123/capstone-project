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

function createUser($conn, $firstname, $lastname, $username, $email, $password, $date_created, $usertype)
{
    $sql = "INSERT INTO users (firstname, lastname, username, email, password, date_created, usertype) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $username, $email, $hashedpassword, $date_created, $usertype);
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
    $sql_user = "SELECT * FROM users WHERE email = ?;";
    $sql_members = "SELECT * FROM members WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt, $sql_user)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",  $email);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);

    if (empty($row)) {
        if (!mysqli_stmt_prepare($stmt, $sql_members)) {
            header("location: ../views/pages-register.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        return $row;
    } else if (!empty($row)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function loginUser($conn, $email, $password)
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
        title: 'User does not exist'
      })</script>";

        header("location: ../views/pages-login.php?");
        exit();
    } else if (!empty($emailExist['temp_pass'])) {
        $temp_pass = $emailExist['temp_pass'];
        if ($temp_pass != $password) {
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
        title: 'Incorrect Password check your email for password'
      })</script>";

            header("location: ../views/pages-login.php?");
            exit();
        } else if ($temp_pass == $password) {
            session_start();
            if ($emailExist["userid"]) {
                $_SESSION["userid"] = $emailExist["userid"];
            } else {
                $_SESSION["userid"] = $emailExist["member_id"];
            }
            $_SESSION["member_id"] = $emailExist["member_id"];
            $_SESSION["importer_id"] = $emailExist["importer_id"];
            $_SESSION["usertype"] = $emailExist["usertype"];
            $_SESSION["temp_pass"] = $emailExist["temp_pass"];
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

            if ($_SESSION["userid"] == $emailExist["userid"]) {
                header("location: ../views/index.php");
                exit();
            } else if ($_SESSION["userid"] == $emailExist["member_id"]) {
                $member_id = $emailExist['member_id'];
                $query = "SELECT * FROM members WHERE member_id = $member_id;";
                $results = $conn->query($query);
                while ($row = $results->fetch_assoc()) {
                    header("location: ../views/pages-member-department.php?user_id=" . $member_id . "&org_id=" . $row['organization_id'] . "&dept_id=" . $row['department_id']);
                    exit();
                }
            }
        }
    } else {

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
            if ($emailExist["userid"]) {
                $_SESSION["userid"] = $emailExist["userid"];
            } else {
                $_SESSION["userid"] = $emailExist["member_id"];
            }
            $_SESSION["member_id"] = $emailExist["member_id"];
            $_SESSION["importer_id"] = $emailExist["importer_id"];
            $_SESSION["usertype"] = $emailExist["usertype"];
            $_SESSION["temp_pass"] = $emailExist["temp_pass"];
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
            if ($_SESSION["userid"] == $emailExist["userid"]) {
                header("location: ../views/index.php");
                exit();
            } else if ($_SESSION["userid"] == $emailExist["member_id"]) {
                $member_id = $emailExist['member_id'];
                $query = "SELECT * FROM members WHERE member_id = $member_id;";
                $results = $conn->query($query);
                while ($row = $results->fetch_assoc()) {
                    header("location: ../views/pages-member-department.php?user_id=" . $member_id . "&org_id=" . $row['organization_id'] . "&dept_id=" . $row['department_id']);
                    exit();
                }
            }
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
function editUserProfile(
    $conn,
    $user_id,
    $organization_id,
    $department_id,
    $firstname,
    $lastname,
    $password,
    $temp_pass,
    $file,
    $mobile,
    $bio,
    $address,
    $usertype,
    $image
) {
    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                if ($usertype == 'Administrator') {
                    $sql = "UPDATE users SET firstname=?, lastname=?, photourl=?,mobile=?, bio=?, address=? WHERE userid=$user_id;";
                } else if ($temp_pass == 'testpass') {
                    $sql = "UPDATE members SET firstname=?, lastname=?, image=?, password = ?, temp_pass = ? WHERE member_id=$user_id;";
                } else {
                    $sql = "UPDATE members SET firstname=?, lastname=?, image=? WHERE member_id=$user_id";
                }

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-profile.php?error=stmtfailed");
                    exit();
                }

                if ($usertype == 'Administrator') {
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $filePath, $mobile, $bio, $address,);
                } else if ($temp_pass == 'testpass') {
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    $temp_pass = null;
                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $filePath, $hashedpassword, $temp_pass);
                } else {
                    mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $filePath);
                }
                unlink($image);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("location: ../views/pages-profile.php?error=none");
                exit();
            }
        }
    }
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
    $fileNew = randomName() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "INSERT INTO organizations (org_name, org_description, user_id, org_imgurl, date_created) VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-add-organization.php?error=mysqlierror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "sssss", $organization_name, $organization_description, $user_id, $filePath, $date_created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);


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
}
function deleteOrganization($conn, $organization_id)
{
    $sql_org = "DELETE FROM organizations WHERE organization_id=?";
    $sql_dept = "DELETE FROM departments WHERE organization_id=?";
    $sql_mem = "DELETE FROM members WHERE organization_id=?";
    $sql_event = "DELETE FROM events WHERE organization_id=?";

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

function editOrganization($conn, $organization_name, $organization_description, $file, $user_id, $organization_id, $imgurl)
{

    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = "UPDATE organizations SET org_name=?, org_description=?, org_imgurl=? WHERE user_id= $user_id AND organization_id= $organization_id;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-organization.php?error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "sss", $organization_name, $organization_description, $filePath);
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
                header("location: ../views/pages-my-organization.php?id=$organization_id&error=editsuccess");
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
function departmentExists($conn, $department_name, $organization_id)
{
    $sql = "SELECT * FROM departments WHERE dept_name = ? AND organization_id = ?;";
    $stmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",  $department_name, $organization_id);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);

    if (!empty($row)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createDepartment($conn, $department_name, $department_desc, $department_code, $file, $user_id, $organization_id, $date_created)
{
    $departmentExist = departmentExists($conn, $department_name, $organization_id);

    if ($departmentExist == true) {

        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Warning!',
        'A deparment already exist.',
        'warning')
        </script>";

        header("location: ../views/pages-my-organization.php?id=$organization_id");
        exit();
    }



    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../assets/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($file['size'] > 0 && $file['error'] == 0) {
            if (move_uploaded_file($file['tmp_name'], $filePath)) {

                $sql = "INSERT INTO departments (dept_name, dept_description, dept_code, dept_imgurl, user_id, organization_id, date_created) VALUES (?,?,?,?,?,?,?);";
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

                mysqli_stmt_bind_param($stmt, "ssssiis", $department_name, $department_desc, $department_code, $filePath, $user_id, $organization_id, $date_created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                session_start();
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
                $sql = "UPDATE departments SET dept_name=?, dept_description=?, dept_code=?, dept_imgurl=? WHERE user_id=$user_id AND organization_id=$organization_id AND department_id=$department_id;";

                $stmt = mysqli_stmt_init($conn);


                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id&error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssss", $department_name, $department_desc, $department_code, $filePath);
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
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $department_id);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_prepare($stmt, $sql_mem)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $department_id);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_prepare($stmt, $sql_event)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
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


function importMembers($conn, $files, $department_id, $importer_id, $organization_id, $date_created)
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
            $middlename = $getData[1];
            $lastname = $getData[2];
            $email = $getData[3];
            $course = $getData[4];
            $yearlevel = $getData[5];
            $usertype = "Member";

            if (!isset($firstname) || !isset($middlename) || !isset($lastname) || !isset($course) || !isset($yearlevel)) {
                session_start();
                $_SESSION["status"] =
                    "<script>
                    Swal.fire(
                    'Error!',
                    'Some columns are missing.',
                    'danger')
                    </script>";
                header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id");
                exit();
            }

            $sql = "SELECT * FROM members WHERE email = ?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../views/pages-register.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if (isset($user['email']) == $email) {
                echo "do nothing";
            } else if (isset($user['department_id']) == $department_id && isset($user['importer_id']) == $importer_id) {
                $sql = "UPDATE members SET firstname=?, middlename=?, lastname=?, course=?, yearlevel=?, usertype=? WHERE email='$email' AND department_id = '$department_id';";
                $stmt = mysqli_stmt_init($conn);
                $stmt = $conn->prepare($sql);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $middlename, $lastname, $course, $yearlevel, $usertype);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                $sql = "INSERT INTO members (firstname, middlename, lastname, email, temp_pass, course, yearlevel, usertype, department_id, importer_id,organization_id,date_created) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
                    exit();
                }

                $password = 'testpass';
                $subject = "Your Login Details";
                mailSender($email, $subject, $password);

                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssssssssiiis", $firstname, $middlename, $lastname, $email, $password, $course, $yearlevel, $usertype, $department_id, $importer_id, $organization_id, $date_created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
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
        header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id&error=none");
        exit();
    } else {
        header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id&error=stmntfailed");
        exit();
    }
}
function emptyInputEditMember($firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype)
{
    $result = true;

    if (empty($firstname) || empty($middlename) || empty($lastname) || empty($email) || empty($course) || empty($yearlevel) || empty($usertype)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function editMember($conn, $organization_id, $user_id, $department_id, $importer_id, $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype)
{
    $sql = "UPDATE members SET firstname = ?, middlename = ?, lastname = ?, email = ?, course = ?, yearlevel = ?, usertype = ? WHERE member_id=$user_id AND organization_id=$organization_id AND department_id=$department_id AND importer_id=$importer_id; ";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $middlename, $lastname, $email, $course, $yearlevel, $usertype);
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

    header("location: ../views/pages-my-department.php?user_id=$importer_id&org_id=$organization_id&dept_id=$department_id#members-list");
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
function createEvent($conn, $event_name, $event_description, $event_date, $date_created, $event_start, $event_end, $attendance_duration, $all_day, $status, $user_id, $organization_id, $department_id, $importer_id, $usertype)
{
    $sql = "INSERT INTO events (event_name, event_description, event_date, date_created, event_start, event_end, attendance_duration, all_day, status, user_id,organization_id, department_id, importer_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssssiiii", $event_name, $event_description, $event_date, $date_created, $event_start, $event_end, $attendance_duration, $all_day, $status, $user_id, $organization_id, $department_id, $importer_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($usertype == "Organizer") {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Added!',
        'Added an event!',
        'success')
        </script>";
        header("location: ../views/pages-member-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
        exit();
    } else if ($usertype == "Administrator") {
        session_start();
        $_SESSION["status"] =
            "<script>
        Swal.fire(
        'Added!',
        'Added an event!',
        'success')
        </script>";
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
        exit();
    }
}


function deleteEvent($conn, $event_id, $user_id, $organization_id, $department_id, $usertype)
{
    $sql = "DELETE FROM events WHERE event_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $event_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Deleted!',
        'Event deleted.',
        'success')
        </script>";
    if ($usertype == 'Administrator') {
        header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
        exit();
    } else if ($usertype == 'Organizer') {
        header("location: ../views/pages-member-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
        exit();
    }
}

function approveEvent($conn, $event_id, $user_id, $organization_id, $department_id)
{
    $sql = "UPDATE events SET status = ? WHERE event_id=$event_id";
    $stmt = mysqli_stmt_init($conn);
    $status = "Approved";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../views/pages-add-organization.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["status"] =
        "<script>
        Swal.fire(
        'Approved!',
        'Event Approved.',
        'success')
        </script>";

    header("location: ../views/pages-my-department.php?user_id=$user_id&org_id=$organization_id&dept_id=$department_id#events");
    exit();
}
