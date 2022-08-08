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
<script src="../assets/js/vendor/dataTables.checkboxes.min.js"></script>
<script src="../assets/js/pages/demo.form-wizard.js"></script>

<!-- third party js ends -->

<!-- demo app -->
<script src="../assets/js/pages/demo.sellers.js"></script>
<script src="../assets/js/pages/demo.toastr.js"></script>
<script src="../assets/js/pages/demo.form-wizard.js"></script>
<!-- end demo js-->

<!-- Showing update profile after import for members -->
<?php if (isset($temp_pass)) {
?>
    <script>
        $(document).ready(function() {
            $('#update-profile').modal('show');
        });
    </script>
<?php } ?>


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
                window.location.href = "../controllers/delete.organization.ctrls.php?id=" + data_org_id;
            }
        })

    })

    $(document).ready(function() {
        $(document).on('click', '.edit-custom', function() {
            var id = $(this).val();
            var importer_id = $('#importer_id' + id).text();
            var organization_id = $('#organization_id' + id).text();
            var department_id = $('#department_id' + id).text();
            var firstname = $('#firstname' + id).text();
            var middlename = $('#middlename' + id).text();
            var lastname = $('#lastname' + id).text();
            var email = $('#email' + id).text();
            var course = $('#course' + id).text();
            var yearlevel = $('#yearlevel' + id).text();
            var usertype = $('#usertype' + id).text();
            $('#edit').modal('show');
            $('#emember_id').val(id);
            $('#eimporter_id').val(importer_id);
            $('#eorganization_id').val(organization_id);
            $('#edepartment_id').val(department_id);
            $('#efirstname').val(firstname);
            $('#emiddlename').val(middlename);
            $('#elastname').val(lastname);
            $('#eemail').val(email);
            $('#ecourse').val(course);

            if (yearlevel == '1st') {
                $('#eyearlevel-select option[value="1st"]').attr("selected", true);
            } else if (yearlevel == '2nd') {
                $('#eyearlevel-select option[value="2nd"]').attr("selected", true);
            } else if (yearlevel == '3rd') {
                $('#eyearlevel-select option[value="3rd"]').attr("selected", true);
            } else if (yearlevel == '4th') {
                $('#eyearlevel-select option[value="4th"]').attr("selected", true);
            }

            if (usertype == 'Member') {
                $('#eusertype-select option[value="Member"]').attr("selected", true);
            } else if (usertype == 'Organizer') {
                $('#eusertype-select option[value="Organizer"]').attr("selected", true);
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
        var organization_id = $(this).data('org_id');
        var department_id = $(this).data('dept_id');
        var user_id = $(this).data('user_id');

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
                window.location.href = "../controllers/approve.event.ctrls.php?user_id=" + user_id + "&org_id=" + organization_id + "&dept_id=" + department_id + "&event_id=" + event_id;
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
                success: function(result) {

                }
            })

        })
    })
</script>



</body>

</html>