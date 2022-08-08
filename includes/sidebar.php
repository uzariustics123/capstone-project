<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
    exit();
};
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
            <?php
            $query = "SELECT * FROM users WHERE usertype = 'Administrator' AND userid = $user;";
            $results = $conn->query($query);
            while ($row = $results->fetch_assoc()) {
            ?>
                <li class="side-nav-title side-nav-item">Home</li>
                <li class="side-nav-item">

                    <a href="index.php" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> My Dashboard </span>
                    </a>
                </li>
            <?php } ?>
            <?php
            if (isset($member_id)) {
                $query = "SELECT * FROM members WHERE member_id = $member_id;";
                $results = $conn->query($query);
                $row = $results->fetch_array(); ?>
                <li class="side-nav-title side-nav-item">Apps</li>
                <li class="side-nav-item">
                    <a href="pages-member-department.php?user_id=<?= $row['member_id'] ?>&org_id=<?= $row['organization_id'] ?>&dept_id=<?= $row['department_id'] ?>" class="side-nav-link">
                        <i class="uil-suitcase-alt"></i>
                        <span> My Departments </span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <!-- End Sidebar -->
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->