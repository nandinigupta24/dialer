<html>

<head>
    <META NAME="ROBOTS" CONTENT="NONE">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <title>UTG Contact Centre</title>
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/css/bootstrap-extend.css" />
    <!--PICKERS-->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?php echo publicAssest();?>assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <!--<link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_plugins/iCheck/all.css">-->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
    <!--END PICKERS-->
    
    <link href="<?php echo publicAssest();?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/select2/dist/css/select2.min.css">
    <!-- theme style -->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/css/master_style.css" />
    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/css/skins/_all-skins.css" />
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/confirm/confirm.css" />
    <!-- Vector CSS -->
    <!--<link href="<?php echo publicAssest();?>assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
 Morris charts
<link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/morris.js/morris.css"/>-->
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/bootstrap-switch/switch.css" />
    <link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_components/datatable/datatables.min.css" />
    <link rel="icon" href="<?php echo publicAssest();?>assets/images/favicon.ico">


    <script src="<?php echo publicAssest();?>assets/vendor_components/jquery/dist/jquery.min.js"></script>
    <!-- popper -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/popper/dist/popper.min.js"></script>
    <!-- Bootstrap 4.0-->
    <script src="<?php echo publicAssest();?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--<script src="<?php echo publicAssest();?>assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>-->
    <!--<script src="<?php echo publicAssest();?>assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>-->

    <!-- Select2 -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/select2/dist/js/select2.full.js"></script>
    <!-- InputMask -->
    <script src="<?php echo publicAssest();?>assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo publicAssest();?>assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo publicAssest();?>assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="<?php echo publicAssest();?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

    <!--<link href="https://dialer.usethegeeks.com/adminbsb/plugins/bootstrap3-editable/css/bootstrap-editable.css" type="text/css" rel="stylesheet"/>-->
    <!--<script src="https://dialer.usethegeeks.com/adminbsb/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>-->


    <!-- bootstrap time picker -->
    <script src="<?php echo publicAssest();?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <script type="text/javascript"
        src="<?php echo publicAssest();?>assets/vendor_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo publicAssest();?>assets/vendor_plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/fastclick/lib/fastclick.js"></script> 
    <script src="<?php echo publicAssest();?>assets/vendor_components/confirm/confirm.js"></script>
    <!-- Fab Admin App -->
    <script src="<?php echo publicAssest();?>assets/js/template.js"></script>
    <!-- Fab Admin for demo purposes -->
    <script src="<?php echo publicAssest();?>assets/js/demo.js"></script>
    <!-- Fab Admin for advanced form element -->
    <script src="<?php echo publicAssest();?>assets/js/pages/advanced-form-element.js"></script>

    <!-- This is data table -->
    <script src="<?php echo publicAssest();?>assets/vendor_components/datatable/datatables.min.js"></script>

    <script src="<?php echo publicAssest();?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    <link href="<?php echo publicAssest();?>assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="<?php echo publicAssest();?>assets/vendor_components/sweetalert/sweetalert.min.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <!--<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop" style="display: block;"> <i class="fa fa-money"></i> This is an example top alert. You can edit what u wish. <a href="#" class="closed"><i class="fa fa-times" style="margin-top:6px;"></i></a> </div>-->
    <div class="wrapper">

        <?php include 'top_header.php';?>
        <?php include 'sidebar.php';?>
         