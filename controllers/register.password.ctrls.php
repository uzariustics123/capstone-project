<?php
if (isset($_POST['submit'])) {



  $password = $_POST['password'];
  $repeat_password = $_POST['confirm-password'];
  $user_id = $_POST['user_id'];
  $email = $_POST['email'];

  require_once '../config/db.php';
  require_once 'functions.ctrls.php';

  if (strlen($password) < 6 && strlen($repeat_password) < 6) {
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
          title: 'Password must be at least 6 characters'
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

  createUserPassword($conn, $user_id, $email, $password);
} else {
  header("location: ../index.php");
  exit();
}
