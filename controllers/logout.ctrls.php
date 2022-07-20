<?php

session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['status'] = "
        <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      })
  
      Toast.fire({
        icon: 'success',
        title: 'Logged out successfully'
      })</script>";
header("location: ../views/pages-logout.php");
exit();
