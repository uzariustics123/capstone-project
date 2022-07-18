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
<!-- end demo js-->

</body>

</html>