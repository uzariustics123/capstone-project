<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
    exit();
};
?>
<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                        </span>Notification
                    </h5>
                </div>
                <div style="max-height: 230px;" data-simplebar="">

                    <?php
                    $query = "SELECT * FROM events WHERE importer_id = $user AND status = 'Pending';";
                    $results = $conn->query($query);
                    while ($row = $results->fetch_assoc()) {
                    ?>
                        <a href="pages-view-event-details.php?event_id=<?= $row['event_id'] ?>" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details"><?= $row['event_name'] ?></p>
                            <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>
                    <?php } ?>
                </div>
                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>
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
                    $query = "SELECT * FROM users WHERE userid = $user;";
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
                        <span>

                            <span class="account-user-name"><?= $row['firstname'] ?> <?php echo $row['lastname'] ?></span>
                            <span class="account-position">Administrator</span>

                        </span>
                        <?php
                    } else if (empty($row)) {
                        $query = "SELECT * FROM members WHERE member_id = $user;";
                        $results = $conn->query($query);
                        $row = $results->fetch_assoc();
                        if (!empty($row)) { ?>
                            <span class="account-user-avatar">

                                <img src="<?php if (empty($row['image'])) {
                                                echo '../assets/images/users/avatar-1.jpg';
                                            } else {
                                                echo $row['image'];
                                            }
                                            ?>" alt="user-image" class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name"><?= $row['firstname'] ?> <?= $row['lastname'] ?></span>
                                <span class="account-position"><?= $row['usertype'] ?></span>

                            </span>
                    <?php
                        }
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
                <a href="../views/pages-profile.php" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>

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