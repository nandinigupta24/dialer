<!--<<<<<<< HEAD
=======-->
<!--<script src="../../assets/vendor_components/jquery/dist/jquery.min.js"></script>
 popper 
<script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>
 Bootstrap 4.0
<script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

 Magnific popup JavaScript 
<script src="../../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="../../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

 Select2 
<script src="../../assets/vendor_components/select2/dist/js/select2.full.js"></script>
 InputMask 
<script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
 date-range-picker 
<script src="../../assets/vendor_components/moment/min/moment.min.js"></script>
<script src="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 bootstrap datepicker 
<script src="../../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 bootstrap color picker 
<script src="../../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 bootstrap time picker 
<script src="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
 SlimScroll 
<script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 iCheck 1.0.1 
<script src="../../assets/vendor_plugins/iCheck/icheck.min.js"></script>
 FastClick 
<script src="../../assets/vendor_components/fastclick/lib/fastclick.js"></script>
 Fab Admin App 
<script src="../assets/js/template.js"></script>
 Fab Admin for demo purposes 
<script src="../assets/js/demo.js"></script>
 Fab Admin for advanced form element 
<script src="../assets/js/pages/advanced-form-element.js"></script>

 This is data table 
<script src="../../assets/vendor_components/datatable/datatables.min.js"></script>

 Fab Admin for Data Table 
<script src="../assets/js/pages/data-table.js"></script>
<script src="../../assets/vendor_plugins/bootstrap-slider/bootstrap-slider.js"></script>-->


<script>
    // chat app scrolling

    $('#chat-app, #chat-contact').slimScroll({
        height: '400px'
    });
</script>

<script>
    $(function () {
        /* BOOTSTRAP SLIDER */
        $('.slider').slider()
    })

    $(function () {
        "use strict";
        //Initialize Select2 Elements
        $('#Campaign-Selection').select2();
        $('#Group-Selection').select2();
    });


    $(document).on('click', '.CampaignAllSelection', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $("#Campaign-Selection > option").prop("selected", "");
            $("#Campaign-Selection").trigger("change");// Trigger change to select 2
        } else {
            $(this).addClass('active');
            $("#Campaign-Selection > option").prop("selected", "selected");// Select All Options
            $("#Campaign-Selection").trigger("change");// Trigger change to select 2
        }
    });
//            var interval = 5;
//            setInterval(function(){ 
//                interval--;
//                $('#refresh_countdown').html(interval);
//                if(interval == 1){
//                    location.reload();
//                }
//            }, 5000);
</script>