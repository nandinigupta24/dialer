<html>

    <head>
        <META NAME="ROBOTS" CONTENT="NONE">
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <title>UTG Contact Centre</title>
        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap/dist/css/bootstrap.min.css" />
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/css/bootstrap-extend.css" />
        <!--PICKERS-->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet"
              href="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <!--<link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_plugins/iCheck/all.css">-->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
        <!--END PICKERS-->
        <link href="<?php echo publicAssest(); ?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/select2/dist/css/select2.min.css">
        <!-- theme style -->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/css/master_style.css" />
        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/css/skins/_all-skins.css" />
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/confirm/confirm.css" />
        <!-- Vector CSS -->
        <link href="<?php echo publicAssest(); ?>assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/morris.js/morris.css"/>
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-switch/switch.css" />
        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/datatable/datatables.min.css" />
        <link rel="icon" href="<?php echo publicAssest(); ?>assets/images/favicon.ico">

        <link rel="stylesheet" href="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">


        <?php if ($pathUrl[0] == 'dashboard') { ?>
            <!-- jQuery 3 -->
            <script src="../assets/vendor_components/jquery/dist/jquery.js"></script>

            <!-- jQuery UI 1.11.4 -->
            <script src="../assets/vendor_components/jquery-ui/jquery-ui.js"></script>

            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>

            <!-- popper -->
            <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

            <!-- Bootstrap 4.0-->
            <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

            <!-- ChartJS -->
            <script src="../assets/vendor_components/chart.js-master/Chart.min.js"></script>

            <!-- Slimscroll -->
            <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

            <!-- FastClick -->
            <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

            <!-- peity -->
            <script src="../assets/vendor_components/jquery.peity/jquery.peity.js"></script>

            <!-- Morris.js charts -->
            <script src="../assets/vendor_components/raphael/raphael.min.js"></script>
            <script src="../assets/vendor_components/morris.js/morris.min.js"></script>

            <!-- Fab Admin App -->
            <script src="../assets/js/template.js"></script>

            <!-- Fab Admin dashboard demo (This is only for demo purposes) -->
            <script src="../assets/js/pages/dashboard_1.js"></script>

            <!-- Fab Admin for demo purposes -->
            <script src="../assets/js/demo.js"></script>	

            <!-- Vector map JavaScript -->
            <script src="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js"></script>
        <?php } else { ?>
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/jquery/dist/jquery.min.js"></script>
            <!--popper--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/popper/dist/popper.min.js"></script>
            <!--Bootstrap 4.0-->
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

            <script src="<?php echo publicAssest(); ?>assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

            <!--Select2--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/select2/dist/js/select2.full.js"></script>
            <!--InputMask--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
            <script src="<?php echo publicAssest(); ?>assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
            <script src="<?php echo publicAssest(); ?>assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
            <!--date-range-picker--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/moment/min/moment.min.js"></script>
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!--bootstrap datepicker--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <!--bootstrap color picker--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!--            <link href="<?php echo publicAssest(); ?>assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" type="text/css" rel="stylesheet"/>
            <script src="<?php echo publicAssest(); ?>assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>-->


            <!--bootstrap time picker--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

            <script type="text/javascript"
            src="<?php echo publicAssest(); ?>assets/vendor_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
            <!--SlimScroll--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <!--iCheck 1.0.1--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_plugins/iCheck/icheck.min.js"></script>
            <!--FastClick--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/fastclick/lib/fastclick.js"></script>
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/confirm/confirm.js"></script>
            <!--Fab Admin App--> 
            <script src="<?php echo publicAssest(); ?>assets/js/template.js"></script>
            <!--Fab Admin for demo purposes--> 
            <script src="<?php echo publicAssest(); ?>assets/js/demo.js"></script>
            <!--Fab Admin for advanced form element--> 
            <!--<script src="<?php echo publicAssest(); ?>assets/js/pages/advanced-form-element.js"></script>-->

            <!--This is data table--> 
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/datatable/datatables.min.js"></script>

            <script src="<?php echo publicAssest(); ?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
            <link href="<?php echo publicAssest(); ?>assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
            <script src="<?php echo publicAssest(); ?>assets/vendor_components/sweetalert/sweetalert.min.js"></script>
        <?php } ?>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <?php include 'top_header.php'; ?>
            <?php include 'sidebar.php'; ?>
