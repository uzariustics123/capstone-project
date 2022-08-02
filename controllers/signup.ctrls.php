<?php
if (isset($_POST['submit'])) {



  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeat_password = $_POST['repeat_password'];
  $date_created = date('Y-m-d');
  $usertype = 'Administrator';
  require_once '../config/db.php';
  require_once 'functions.ctrls.php';


  if (emptyInputSignup($firstname, $lastname, $username, $email, $password) !== false) {
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
        title: 'Some fields are empty'
      })</script>";
    header("location: ../views/pages-register.php");
    exit();
  }
  if (invalidUid($username) !== false) {
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
        title: 'Invalid Username'
      })</script>";
    header("location: ../views/pages-register.php");
    exit();
  }
  if (invalidEmail($email) !== false) {
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
        title: 'Invalid email address'
      })</script>";
    header("location: ../views/pages-register.php");
    exit();
  }
  if (pwdMatch($password, $repeat_password) !== false) {
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
        title: 'Passwords do not match'
      })</script>";
    header("location: ../views/pages-register.php");
    exit();
  }

  if (emailExist($conn, $email) == true) {
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
        title: 'Email Taken'
      })</script>";
    header("location: ../views/pages-register.php");
    exit();
  }

  createUser($conn, $firstname, $lastname, $username, $email, $password, $date_created, $usertype);
} else {
  header("location: ../index.php");
  exit();
}
