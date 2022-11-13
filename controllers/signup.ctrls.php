<?php
if (isset($_POST['submit'])) {



  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];

  require_once '../config/db.php';
  require_once 'functions.ctrls.php';


  if (emptyInputSignup($firstname, $lastname, $email) !== false) {
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

  createUser($conn, $firstname, $lastname, $email);
} else {
  header("location: ../index.php");
  exit();
}
