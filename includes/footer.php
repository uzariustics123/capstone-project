<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../views/pages-404.php');
    exit();
};
?>
<script>
    $(window).on('load', function() {
        $('#preloader').delay(1300).fadeOut(500);
    });
</script>
<!-- bundle -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/js/app.min.js"></script>


<!-- demo app -->
<script src="../assets/js/pages/demo.dashboard.js"></script>
<script src="../assets/js/vendor/Chart.bundle.min.js"></script>
<script src="../assets/js/pages/demo.project-detail.js"></script>
<!-- end demo js-->


<!-- third party js -->
<script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="../assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="../assets/js/vendor/buttons.html5.min.js"></script>
<script src="../assets/js/vendor/buttons.flash.min.js"></script>
<script src="../assets/js/vendor/buttons.print.min.js"></script>
<script src="../assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="../assets/js/vendor/dataTables.select.min.js"></script>

<!-- Datatables js -->
<script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>



<!-- third party js ends -->

<!-- demo app -->
<script src="../assets/js/pages/demo.dashboard-analytics.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="../assets/js/pages/demo.datatable-init.js"></script>
<!-- end demo js-->

<!-- third party js ends -->


<script src="../assets/js/pages/demo.toastr.js"></script>
<script src="../assets/js/pages/demo.form-wizard.js"></script>

<!-- <script src="../assets/js/vendor/apexcharts.min.js"></script> -->
<script src="../assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- end demo js-->
<script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="../assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="../assets/js/vendor/buttons.html5.min.js"></script>
<script src="../assets/js/vendor/buttons.flash.min.js"></script>
<script src="../assets/js/vendor/buttons.print.min.js"></script>


<script>
    $('#logout').click(function() {
        Swal.fire({
            title: 'Are you sure you want to logout?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/logout.ctrls.php";
            }
        })

    })
    $('.delete-department').click(function() {
        var data_org_id = $(this).data('org_id');
        var data_dept_id = $(this).data('dept_id');
        console.log({
            data_dept_id
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/delete.department.ctrls.php?&org_id=" + data_org_id + "&dept_id=" + data_dept_id;
            }
        })

    })

    $('.delete-organization').click(function() {
        var data_org_id = $(this).data('org_id');
        var data_user_id = $(this).data('user_id');
        console.log({
            data_org_id
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/delete.organization.ctrls.php?id=" + data_org_id + "&user_id" + data_user_id;
            }
        })

    })

    $(document).ready(function() {
        $(document).on('click', '.edit-custom', function() {
            var id = $(this).val();
            var member_id = $('#member_id' + id).text();
            var usertype = $('#usertype' + id).text();


            $('#edit').modal('show');

            $('#emember_id').val(member_id);
            if (usertype == 'member') {
                $('#eusertype-select option[value="member"]').attr("selected", true);
            } else if (usertype == 'organizer') {
                $('#eusertype-select option[value="organizer"]').attr("selected", true);
            }
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.edit-participant-role-modal', function() {
            var id = $(this).val();
            var accesstype = $('#accesstype' + id).text();
            var participant_id = $('#participant_id' + id).text();


            $('#eparticipant_id').val(id);
            if (accesstype == 'attendee') {
                $('#eparticipant_role_select option[value="attendee"]').attr("selected", true);
            } else if (accesstype == 'attendance-checker') {
                $('#eparticipant_role_select option[value="attendance-checker"]').attr("selected", true);
            }
        });
    });


    $('#delete-department').click(function() {
        var data_org_id = $(this).data('org_id');
        var data_dept_id = $(this).data('dept_id');

        console.log({
            data_dept_id
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/delete.department.ctrls.php?&org_id=" + data_org_id + "&dept_id=" + data_dept_id;
            }
        })

    })

    $('.delete-event').click(function() {
        var event_id = $(this).data('event_id');
        var organization_id = $(this).data('org_id');
        var department_id = $(this).data('dept_id');
        var user_id = $(this).data('user_id');
        var usertype = $(this).data('usertype');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/delete.event.ctrls.php?user_id=" + user_id + "&org_id=" + organization_id + "&dept_id=" + department_id + "&event_id=" + event_id + "&usertype=" + usertype;
            }
        })

    })
    $('#approve-event').click(function(e) {
        e.preventDefault();
        var event_id = $(this).data('event_id');


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/approve.event.ctrls.php?event_id=" + event_id;
            }
        })

    })

    $('#deleteqr').click(function() {
        var image = $(this).data('image');
        window.location.href = "../controllers/delete.qr.ctrls.php?image=" + image;
    })


    $(document).ready(function() {
        $("#edit-profile").click(function() {
            password = $("#password").val();
            confirm = $("#confirm").val();
            firstname = $("#firstname").val();
            lastname = $("#lastname").val();

            $.ajax({
                type: "POST",
                url: '../controllers/edit.profile.ctrls.php',
                data: {
                    password,
                    confirm,
                    firstname,
                    lastname
                },
                success: function(result) {}
            })

        })
    })

    $("#event_all_day1").change(function() {
        if (this.checked) {
            $('#label1').text("Start Time");
            $('#label2').text("End Time");
            $("#event-start-time-afternoon").attr('type', 'hidden');
            $("#event-end-time-afternoon").attr('type', 'hidden');
            $("#label3").attr('hidden', true);
            $("#label4").attr('hidden', true);
        } else if (!this.checked) {
            $('#label1').text("Start Time Morning");
            $('#label2').text("End Time Morning");
            $("#event-start-time-afternoon").attr('type', 'time');
            $("#event-end-time-afternoon").attr('type', 'time');
            $("#label3").attr('hidden', false);
            $("#label4").attr('hidden', false);
        }
    });
    $("#event_all_day2").change(function() {
        if (this.checked) {
            $('#label1').text("Start Time");
            $('#label2').text("End Time");
            $("#event-start-time-afternoon").attr('type', 'hidden');
            $("#event-end-time-afternoon").attr('type', 'hidden');
            $("#label3").attr('hidden', true);
            $("#label4").attr('hidden', true);
        } else if (!this.checked) {
            $('#label1').text("Start Time Morning");
            $('#label2').text("End Time Morning");
            $("#event-start-time-afternoon").attr('type', 'time');
            $("#event-end-time-afternoon").attr('type', 'time');
            $("#label3").attr('hidden', false);
            $("#label4").attr('hidden', false);
        }
    });

    $('#edit-event-modal-button').click(function() {
        if (document.getElementById("event_all_day1").value = 'no') {
            $("#label3").attr('hidden', true);
            $("#label4").attr('hidden', true);
            $("#event-start-time-afternoon").attr('type', 'hidden');
            $("#event-end-time-afternoon").attr('type', 'hidden');
        }

    })

    $('.confirm_attendance').click(function() {
        var data_participant_id = $(this).data('participant_id');
        var data_event_id = $(this).data('event_id');

        Swal.fire({
            title: 'Are you sure you want to confirm attendance?',
            text: "",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../controllers/confirm.attendance.ctrls.php?participant_id=" + data_participant_id + "&event_id=" + data_event_id;
            }
        })

    })

    $('.evaluate').click(function() {
        var event_id = $(this).data('event_id');
        $('#eevent_id').val(event_id);
    })

    $(document).ready(function() {
        $('#saveBtn').click(function() {
            var user_id = $("#user_id").val();
            var saveBtn = $("#saveBtn").val();
            if ($('#light-mode-check').is(":checked")) {
                var color_scheme = "light";
            } else {
                var color_scheme = "dark";
            }

            if ($('#fluid-check').is(":checked")) {
                var width = "fluid";
            } else {
                var width = "boxed";;
            }

            if ($('#default-check').is(":checked")) {
                var theme = "default";
            } else if ($('#light-check').is(":checked")) {
                var theme = "light";
            } else if ($('#dark-check').is(":checked")) {
                var theme = "dark";
            }

            if ($('#fixed-check').is(":checked")) {
                var compact = "fixed";
            } else if ($('#condensed-check').is(":checked")) {
                var compact = "condensed";
            } else if ($('#scrollable-check').is(":checked")) {
                var compact = "scrollable";
            }

            $.ajax({
                type: "POST",
                url: '../controllers/user.configuration.ctrls.php',
                data: {
                    user_id,
                    saveBtn,
                    color_scheme,
                    width,
                    theme,
                    compact
                },
                success: function(result) {

                }
            })

        })
    })

    $(document).ready(function() {
        $(document).on('click', '.org_review', function() {
            var id = $(this).val();
            var photourl = $('#photourl' + id).text();
            var firstname = $('#firstname' + id).text();
            var lastname = $('#lastname' + id).text();
            var date_created = $('#date_created' + id).text();
            var org_name = $('#org_name' + id).text();
            var org_description = $('#org_description' + id).text();
            var attachments = $('#attachments' + id).text();

            $('#organization_review').modal('show');
            $('#org_id').val(id);
            $('#ephotourl').attr("src", photourl);
            $('#efirstname').text(firstname);
            $('#elastname').text(lastname);
            $('#edate_created').text(date_created);
            $('#eorg_name').text(org_name);
            $('#eorg_description').text(org_description);
            $("#eattachments").attr("href", attachments)
            $("#approve").attr("value", id)
            $("#disapprove").attr("value", id)

        });
    });

    $(document).ready(function() {
        $("#approve").click(function() {
            var id = $(this).val();


            Swal.fire({
                title: 'Are you sure you want to accept organization review?',
                text: "",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../controllers/approve.organization.ctrls.php?id=" +
                        id;
                }
            })

        })
    })

    $(document).ready(function() {
        $("#disapprove").click(function() {
            var id = $(this).val();

            Swal.fire({
                title: 'Are you sure you want to disapprove this organization?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../controllers/disapprove.organization.ctrls.php?id=" +
                        id;
                }
            })

        })
    })

    $(document).ready(function() {
        $(".add_participant").click(function() {
            var data_event_id = $(this).data('event_id');
            var data_member_id = $(this).data('member_id');


            Swal.fire({
                title: 'Are you sure you want add this user to this event?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../controllers/add.single.participant.ctrls.php?event_id=" +
                        data_event_id + "&member_id=" + data_member_id;
                }
            })

        })
    })

    $(document).ready(function() {
        $(".add_member").click(function() {
            var data_org_id = $(this).data('org_id');
            var data_dept_id = $(this).data('dept_id');
            var data_user_id = $(this).data('user_id');
            var data_org_admin_id = $(this).data('org_admin_id');
            var data_member_email = $(this).data('member_email');

            Swal.fire({
                title: 'Are you sure you want this person to this department?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../controllers/add.single.member.ctrls.php?org_id=" + data_org_id + "&dept_id=" + data_dept_id + "&user_id=" + data_user_id + "&org_admin_id=" + data_org_admin_id + "&member_email=" + data_member_email;
                }
            })

        })
    })
</script>
</body>

</html>