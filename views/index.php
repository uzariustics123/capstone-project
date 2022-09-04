<?php require_once '../includes/header.php'; ?>
<?php if (isset($user)) {
?>
    <?php if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        echo "<span>$status</span>";
    } ?>

    <div class="wrapper">
        <?php require_once '../includes/sidebar.php'; ?>
        <div class="content-page">
            <div class="content">
                <?php include_once '../includes/topbar.php'; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">My Organizations</h4>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"><i class="mdi mdi-plus"></i> Create Organization</button>
                        </div>
                    </div>
                    <form action="../controllers/add.organization.ctrls.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <input type="hidden" class="form-control" name="user_id" value="<?= $user; ?>">
                                                            <input type="hidden" class="form-control" name="email" value="<?= $email; ?>">
                                                            <div class="mb-3">
                                                                <label for="projectname" class="form-label">Name</label>
                                                                <input type="text" id="projectname" class="form-control" name="organization_name" placeholder="Enter organization name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" id="address" class="form-control" name="address" placeholder="Enter organization address" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="project-overview" class="form-label">Organization Details</label>
                                                                <textarea class="form-control" name="organization_description" id="project-overview" rows="6" placeholder="Enter some brief details about the organization.." required></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="mb-3 mt-3 mt-xl-0">
                                                                <label for="projectname" class="mb-0">Organization Cover Photo</label>
                                                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                                                <div class="mb-3">
                                                                    <label for="project-overview" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image" id="image" rows="6" placeholder="Enter some brief details about the organization.."></input>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center p-1">
                                                    <div class="col">
                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM organizations 
                        RIGHT OUTER JOIN members ON members.organization_id = organizations.organization_id 
                        WHERE members.user_reference_id = $user AND organizations.org_admin_id = $user;";
                        $results = $conn->query($query);
                        while ($row = $results->fetch_assoc()) {
                        ?>
                            <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                <div class="card d-block">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top img-fluid" style="object-fit: cover" src="<?php if (is_null($row['org_imgurl'])) {
                                                                                                            echo '../assets/images/projects/project-1.jpg';
                                                                                                        } else {
                                                                                                            echo $row['org_imgurl'];
                                                                                                        }
                                                                                                        ?>" alt="project image cap">
                                    <div class="card-img-overlay">
                                        <div class="badge bg-danger p-1">Organization</div>
                                    </div>
                                    <div class="card-body position-relative text-center">
                                        <h4 class="mt-0">
                                            <h4><?= $row['org_name'] ?></h4>
                                            <div class="text-center"><a href="pages-my-organization.php?id=<?= $row['organization_id'] ?>" class="btn btn-success">Manage Organization</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="modal fade" id="update-profile" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <?php
                                        $query = "SELECT * FROM users WHERE userid = $user;";
                                        $results = $conn->query($query);
                                        while ($row = $results->fetch_assoc()) {
                                        ?>
                                            <form action="../controllers/profile.setup.ctrls.php" method="post" enctype="multipart/form-data">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Looks like it's your first time logging in! Let's get you set up</h4>
                                                        <div class="edit-profile-custom">
                                                            <div id="progressbarwizard">
                                                                <input type="hidden" name="user_id" value="<?= $user ?>">

                                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                                    <li class="nav-item">
                                                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-account-circle me-1"></i>
                                                                            <span class="d-none d-sm-inline">Account</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-face-profile me-1"></i>
                                                                            <span class="d-none d-sm-inline">Profile</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#finish-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                                            <span class="d-none d-sm-inline">Finish</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                                <div class="tab-content b-0 mb-0">

                                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                                    </div>

                                                                    <div class="tab-pane" id="account-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="password">Create New Password</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="password" id="password" name="password" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="confirm">Confirm New Password</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="password" id="confirm" name="confirm" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>

                                                                    <div class="tab-pane" id="profile-tab-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="firstname"> FirstName</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $row['firstname'] ?>" data-firstname="<?= $row['firstname'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="lastname"> LastName</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $row['lastname'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label class="col-md-3 col-form-label" for="image"> Image</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="file" id="image" name="image" class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>
                                                                    <div class="modal fade" id="terms_conditions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="myLargeModalLabel">Terms and Conditions</h4>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h1>Privacy Policy for Events Management Application System</h1>

                                                                                    <p>At Events Management Application, accessible from www.emapp.com.ph, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Events Management Application and how we use it.</p>

                                                                                    <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us. Our Privacy Policy was created with the help of the <a href="https://www.generateprivacypolicy.com/">Privacy Policy Generator</a>.</p>

                                                                                    <h2>Log Files</h2>

                                                                                    <p>Events Management Application follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

                                                                                    <h2>Cookies and Web Beacons</h2>

                                                                                    <p>Like any other website, Events Management Application uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>

                                                                                    <h2>Google DoubleClick DART Cookie</h2>

                                                                                    <p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>

                                                                                    <h2>Our Advertising Partners</h2>

                                                                                    <p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>

                                                                                    <ul>
                                                                                        <li>
                                                                                            <p>Google</p>
                                                                                            <p><a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>
                                                                                        </li>
                                                                                    </ul>

                                                                                    <h2>Privacy Policies</h2>

                                                                                    <P>You may consult this list to find the Privacy Policy for each of the advertising partners of Events Management Application.</p>

                                                                                    <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Events Management Application, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                                                                                    <p>Note that Events Management Application has no access to or control over these cookies that are used by third-party advertisers.</p>

                                                                                    <h2>Third Party Privacy Policies</h2>

                                                                                    <p>Events Management Application's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

                                                                                    <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?</p>

                                                                                    <h2>Children's Information</h2>

                                                                                    <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                                                                                    <p>Events Management Application does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

                                                                                    <h2>Online Privacy Policy Only</h2>

                                                                                    <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Events Management Application. This policy is not applicable to any information collected offline or via channels other than this website.</p>

                                                                                    <h2>Consent</h2>

                                                                                    <p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
                                                                                </div>
                                                                            </div><!-- /.modal-content -->
                                                                        </div><!-- /.modal-dialog -->
                                                                    </div>
                                                                    <div class="tab-pane" id="finish-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="text-center">
                                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                                    <div class="mb-3">
                                                                                        <div class="form-check d-inline-block">
                                                                                            <input type="checkbox" class="form-check-input" id="customCheck3" required>
                                                                                            <label class="form-check-label" for="customCheck3">I agree with the <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#terms_conditions">Terms and Conditions</a> </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <button name="submit" id="edit-profile" class="btn btn-primary">Submit</button>
                                                                                </div>
                                                                            </div> <!-- end col -->
                                                                        </div> <!-- end row -->
                                                                    </div>

                                                                    <ul class="list-inline mb-0 wizard">
                                                                        <li class="previous list-inline-item">
                                                                            <a href="#" class="btn btn-info">Previous</a>
                                                                        </li>
                                                                        <li class="next list-inline-item float-end">
                                                                            <a href="#" class="btn btn-info">Next</a>
                                                                        </li>
                                                                    </ul>

                                                                </div> <!-- tab-content -->
                                                            </div> <!-- end #progressbarwizard-->
                                                        </div>

                                                    </div> <!-- end card-body -->
                                                </div> <!-- end card-->
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div> <!-- end card-->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->

                </div>
            </div>

        </div>
    </div>
    </div>
    <?php include_once '../includes/endbar.php'; ?>
    <div class="rightbar-overlay"></div>
    <?php include_once '../includes/footer.php'; ?>
<?php } else {
    header("location:../views/pages-404.php");
    exit();
} ?>
<?php
unset($_SESSION['status']);
?>