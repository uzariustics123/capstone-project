<?php

if (isset($_POST['submit'])) {
  require_once '../config/db.php';
  require_once 'functions.ctrls.php';

  $user = $_POST['user_id'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  if ($_FILES['image']['size'] != 0) {
    $file = $_FILES['image'];
  } else {
    $file = null;
  }


  if (empty($password) || empty($confirm)) {
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
        title: 'Empty fields'
      })</script>";
    header("location: ../views/index.php");
    exit();
  }
  if ($password != $confirm) {
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
        title: 'Password do not match'
      })</script>";
    header("location: ../views/index.php");
    exit();
  }
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
    header("location: ../views/index.php");
    exit();
  }


  setupProfile($conn, $user, $password, $firstname, $lastname, $file);
} else {
  header("location: ../views/index.php");
  exit();
}
