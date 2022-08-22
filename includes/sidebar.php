<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
    exit();
};
if (isset($_SESSION['member_id'])) {
    $member_id = $_SESSION['member_id'];
} else {
    $member_id = 0;
}


?>
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="../views/index.php" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="../assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="../assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="../views/index.php" class="logo text-center logo-dark">
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
                    <span>Home</span>
                </a>
            </li>


            <li class="side-nav-title side-nav-item">Apps</li>
            <?php
            $query = "SELECT * FROM members WHERE member_id = $member_id AND usertype = 'organizer';";
            $results = $conn->query($query);
            while ($row = $results->fetch_assoc()) {
            ?>
                <li class="side-nav-item">
                    <a href="pages-organization-list.php" class="side-nav-link">
                        <i class="uil-suitcase-alt"></i>
                        <span> My Organization </span>
                    </a>
                </li>
            <?php } ?>
            <?php
            $query = "SELECT * FROM members WHERE member_id = $member_id AND usertype = 'member';";
            $results = $conn->query($query);
            while ($row = $results->fetch_assoc()) {
            ?>
                <li class="side-nav-item">
                    <a href="pages-organization-list.php" class="side-nav-link">
                        <i class="uil-suitcase-alt"></i>
                        <span> My Organization</span>
                    </a>
                </li>
            <?php } ?>

            <?php
            $query = "SELECT * FROM members WHERE member_id = $member_id AND usertype = 'admin';";
            $results = $conn->query($query);
            while ($row = $results->fetch_assoc()) {
            ?>
                <li class="side-nav-item">
                    <a href="javascript:void(0)" class="side-nav-link">
                        <i class="uil-chart"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <!-- End Sidebar -->
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->