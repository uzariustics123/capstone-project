<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
    exit();
};
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="../assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="../assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="../assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="../assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Home</li>

            <li class="side-nav-item">

                <a href="index.php" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> My Organizations </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>
        </ul>

        <!-- End Sidebar -->
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->