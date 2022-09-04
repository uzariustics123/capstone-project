<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
};
?>
<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <?php $query = "SELECT * FROM ((events 
                RIGHT OUTER JOIN departments ON events.department_id = departments.department_id)
                RIGHT OUTER JOIN organizations ON departments.organization_id = organizations.organization_id)
                WHERE organizations.org_admin_id = $user AND events.event_status ='pending';";
                $results = $conn->query($query);
                if ($results->num_rows > 0) {
                ?>
                    <span class="noti-icon-badge"></span>
                <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                        </span>Notification
                    </h5>
                </div>
                <?php
                $query = "SELECT * FROM ((events 
                RIGHT OUTER JOIN departments ON events.department_id = departments.department_id)
                RIGHT OUTER JOIN organizations ON departments.organization_id = organizations.organization_id)
                WHERE organizations.org_admin_id = $user AND events.event_status ='pending';";
                $results = $conn->query($query);
                while ($row = $results->fetch_assoc()) {
                ?>
                    <div style="max-height: 230px;" data-simplebar="">
                        <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>&usertype=<?= base64_encode($usertype) ?>" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-calendar-alert"></i>
                            </div>
                            <p class="notify-details"><?= $row['event_name'] ?></p>
                            <small class="text-muted"><?= $row['event_datetime_created'] ?></small>
                            </p>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </li>

        <li class="notification-list">
            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                <i class="dripicons-gear noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list">

            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <div class="topbar-profile">
                    <?php
                    $query = "SELECT * FROM users
                            LEFT OUTER JOIN members ON members.user_reference_id = users.userid
                            WHERE userid = $user;";
                    $results = $conn->query($query);
                    $row = $results->fetch_assoc();
                    if (!empty($row)) {
                    ?>
                        <span class="account-user-avatar">

                            <img src="<?php if (empty($row['photourl'])) {
                                            echo '../assets/images/users/avatar-1.jpg';
                                        } else {
                                            echo $row['photourl'];
                                        }
                                        ?>" alt="user-image" class="rounded-circle">
                        </span>

                        <span class="account-user-name mt-1"><?= $row['firstname'] ?> <?php echo $row['lastname'] ?></span>
                    <?php
                    }
                    ?>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <?php
                if ($row['usertype'] == 'member' || $row['usertype'] == 'organizer') {
                ?>
                    <a href="../views/pages-profile.php" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                <?php  } else {
                ?>
                    <a href="../views/pages-profile.php" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                <?php
                } ?>
                <!-- item-->
                <a href="javascript:void(0)" class="dropdown-item notify-item" id="logout">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>

</div>
<!-- end Topbar -->