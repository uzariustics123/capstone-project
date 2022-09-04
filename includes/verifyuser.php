<?php
session_start();
require_once '../config/db.php';

if ((!isset($_SESSION['userid']))) {
  $_SESSION['status'] = "<script>const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  })
  Toast.fire({
    icon: 'warning',
    title: 'You must login to continue'
  })</script>";
  header('location: ../views/pages-login.php');
  exit();
} else {
  $user = $_SESSION['userid'];
  $email = $_SESSION['email'];
  $registration_status = $_SESSION['registration_status'];
  if (isset($_SESSION['usertype'])) {
    $usertype = $_SESSION['usertype'];
  } else {
    $usertype = null;
  }
  $users = "SELECT * FROM users WHERE userid = '$user';";
  $result = $conn->query($users);
  if (mysqli_num_rows($result) < 1) {
    unset($_SESSION['user_id']);
    $_SESSION['status'] = "<script>const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    })
    Toast.fire({
      icon: 'warning',
      title: 'You must login to continue'
    })</script>";
    header('location: ../views/pages-login.php');
    exit();
  }
}
