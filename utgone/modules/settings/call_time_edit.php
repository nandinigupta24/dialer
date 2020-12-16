<?php if (!checkRole('settings', 'edit')) {
    no_permission();
} else { ?>
    <script>
        var d = document.getElementById("content_wrapper");
    //d.className = d.className + " animated animated-shortest fadeIn";
    </script>
    <div class="content-wrapper" style="min-height: 621.094px;">
    <!--    <section class="content-header">
            <h1>
                New Call Time
            </h1>
            <p>Manage all your Call time from this page</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('settings/call_times') ?>">Call Time Edit</a></li>
                <li class="breadcrumb-item active">Edit Call Times: <?php echo $_REQUEST['call_time_id'] ?></li>
            </ol>
        </section>-->
        <section class="content">
            <input id="rec_call_time_id" type="hidden" value ="<?php echo $_REQUEST['call_time_id'] ?>">
            <!-- Content Header (Page header) -->
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading"> <span class="panel-title"><i class="fa fa-book"></i> Call Time: <?php echo $_REQUEST['call_time_id'] ?></span>
                                <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                    <li class="nav-item"><a href="#gen_tab" data-toggle="tab" class="nav-link show active" data-content="General Information related to the campaign" rel="popover" data-placement="top" data-original-title="General Information" data-trigger="hover"><i class="fa fa-info"></i></a></li>
                                    <li class="nav-item"><a href="#default_tab" data-toggle="tab" class="nav-link" data-content="Default start and end times" rel="popover" data-placement="top" data-original-title="Default start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Default</a></li>
                                    <li class="nav-item"><a href="#mon_tab" data-toggle="tab" class="nav-link" data-content="Monday start and end times" rel="popover" data-placement="top" data-original-title="Monday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Monday</a></li>
                                    <li class="nav-item"><a href="#tues_tab" data-toggle="tab" class="nav-link" data-content="Tuesday start and end times" rel="popover" data-placement="top" data-original-title="Tuesday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Tuesday</a></li>
                                    <li class="nav-item"><a href="#wed_tab" data-toggle="tab" class="nav-link" data-content="Wednesday start and end times" rel="popover" data-placement="top" data-original-title="Wednesday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Wednesday</a></li>
                                    <li class="nav-item"><a href="#thurs_tab" data-toggle="tab" class="nav-link" data-content="Thursday start and end times" rel="popover" data-placement="top" data-original-title="Thursday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Thurday</a></li>
                                    <li class="nav-item"><a href="#fri_tab" data-toggle="tab" class="nav-link" data-content="Friday start and end times" rel="popover" data-placement="top" data-original-title="Friday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Friday</a></li>
                                    <li class="nav-item"><a href="#sat_tab" data-toggle="tab" class="nav-link" data-content="Saturday start and end times" rel="popover" data-placement="top" data-original-title="Saturday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Saturday</a></li>
                                    <li class="nav-item"><a href="#sun_tab" data-toggle="tab" class="nav-link" data-content="Sunday start and end times" rel="popover" data-placement="top" data-original-title="Sunday start and end times" data-trigger="hover" style="font: normal normal normal 14px/1 FontAwesome;">Sunday</a></li>
                                </ul>
                            </div>
                            <div class="panel-body pn">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="all_campaign_settings">
                                            <div class="tab-content">
                                                <div id="gen_tab" class="tab-pane active">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> General Information</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="call_time_id">Call Time ID</label>
                                                                <input id="call_time_id" name="call_time_id" type="text" class="form-control manage-field-text" value="10-6">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="call_time_name">Call Time Name</label>
                                                                <input id="call_time_name" name="call_time_name" type="text" class="form-control manage-field-text" value="Pre2Post">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="default_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Default Time Setings</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="ct_default_start">Call Time Default Start</label>
                                                                <input id="ct_default_start" name="ct_default_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_default_stop">Call Time Default End</label>
                                                                <input id="ct_default_stop" name="ct_default_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="mon_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Monday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="ct_monday_start">Call Time Default Start</label>
                                                                <input id="ct_monday_start" name="ct_monday_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_monday_stop">Call Time Default End</label>
                                                                <input id="ct_monday_stop" name="ct_monday_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="tues_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Tuesday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body" style="padding:30px;">
                                                            <div class="form-group">
                                                                <label for="ct_tuesday_start">Call Time Default Start</label>
                                                                <input id="ct_tuesday_start" name="ct_tuesday_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_tuesday_stop">Call Time Default End</label>
                                                                <input id="ct_tuesday_stop" name="ct_tuesday_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="wed_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Wednesday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body" style="padding:30px;">
                                                            <div class="form-group">
                                                                <label for="ct_wednesday_start">Call Time Default Start</label>
                                                                <input id="ct_wednesday_start" name="ct_wednesday_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_wednesday_stop">Call Time Default End</label>
                                                                <input id="ct_wednesday_stop" name="ct_wednesday_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="thurs_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Thursday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="ct_thursday_start">Call Time Default Start</label>
                                                                <input id="ct_thursday_start" name="ct_thursday_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_thursday_stop">Call Time Default End</label>
                                                                <input id="ct_thursday_stop" name="ct_thursday_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="fri_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Friday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="ct_friday_start">Call Time Default Start</label>
                                                                <input id="ct_friday_start" name="ct_friday_start" type="time" class="form-control manage-field-text" value="10:00">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_friday_stop">Call Time Default End</label>
                                                                <input id="ct_friday_stop" name="ct_friday_stop" type="time" class="form-control manage-field-text" value="18:00">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="sat_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Saturday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="ct_saturday_start">Call Time Default Start</label>
                                                                <input id="ct_saturday_start" name="ct_saturday_start" type="time" class="form-control manage-field-text" value="0:">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_saturday_stop">Call Time Default End</label>
                                                                <input id="ct_saturday_stop" name="ct_saturday_stop" type="time" class="form-control manage-field-text" value="0:">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div id="sun_tab" class="tab-pane">
                                                    <div class="panel pn">
                                                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-info"></i> Sunday Time Setings</span>
                                                        </div>
                                                        <div class="panel-body" >
                                                            <div class="form-group">
                                                                <label for="ct_sunday_start">Call Time Default Start</label>
                                                                <input id="ct_sunday_start" name="ct_sunday_start" type="time" class="form-control manage-field-text" value="0:">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ct_sunday_stop">Call Time Default End</label>
                                                                <input id="ct_sunday_stop" name="ct_sunday_stop" type="time" class="form-control manage-field-text" value="0:">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- END CONTENT -->

                </div></div></section></div>
    <script>
        $(document).on('focusout', '.manage-field-text', function (e) {
            var rec_call_time_id = $('#rec_call_time_id').val();
            e.preventDefault();
            var id = rec_call_time_id
            var name = $(this).attr('name');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=field_update',
                data: {id: id, name: name, val: val, type: 'text'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        function convertNumberToTime(number) {
            var ct_default_start_temp = number.toString();
            if (ct_default_start_temp.length > 3) {
                var final_default_start_temp = ct_default_start_temp[0] + ct_default_start_temp[1] + ':' + ct_default_start_temp[2] + ct_default_start_temp[3];
            } else {
                var final_default_start_temp = '0' + ct_default_start_temp[0] + ':' + ct_default_start_temp[1] + ct_default_start_temp[2];
            }

            return final_default_start_temp;
        }

        $(document).ready(function () {
            var rec_call_time_id = $('#rec_call_time_id').val();
            $.ajax({
                type: "GET",
                url: '<?php echo base_url('settings/ajax') ?>?action=listing&call_time_id=' + rec_call_time_id,
                success: function (response) {
                    var result = JSON.parse(response);
                    var data = result.data[0];
                    console.log('data==>', data);
                    //$('span.phone_number').html(data.login);
                    //$('div#active').html(data.active);
                    $('input#call_time_id').val(data.call_time_id);
                    $('input#call_time_name').val(data.call_time_name);

                    console.log('final_default_start_temp', convertNumberToTime(data.ct_default_start));
                    $('input#ct_default_start').val(convertNumberToTime(data.ct_default_start));
                    $('input#ct_default_stop').val(convertNumberToTime(data.ct_default_stop));

                    $('input#ct_sunday_start').val(convertNumberToTime(data.ct_sunday_start));
                    $('input#ct_sunday_stop').val(convertNumberToTime(data.ct_sunday_stop));

                    $('input#ct_monday_start').val(convertNumberToTime(data.ct_monday_start));
                    $('input#ct_monday_stop').val(convertNumberToTime(data.ct_monday_stop));
                    $('input#ct_tuesday_start').val(convertNumberToTime(data.ct_tuesday_start));
                    $('input#ct_tuesday_stop').val(convertNumberToTime(data.ct_tuesday_stop));
                    $('input#ct_wednesday_start').val(convertNumberToTime(data.ct_wednesday_start));
                    $('input#ct_wednesday_stop').val(convertNumberToTime(data.ct_wednesday_stop));
                    $('input#ct_thursday_start').val(convertNumberToTime(data.ct_thursday_start));
                    $('input#ct_thursday_stop').val(convertNumberToTime(data.ct_thursday_stop));
                    $('input#ct_friday_start').val(convertNumberToTime(data.ct_friday_start));
                    $('input#ct_friday_stop').val(convertNumberToTime(data.ct_friday_stop));
                    $('input#ct_saturday_start').val(convertNumberToTime(data.ct_saturday_start));
                    $('input#ct_saturday_stop').val(convertNumberToTime(data.ct_saturday_stop));

                    console.log('Result by dailplain_number', result)
                }
            });
        })
    </script>
<?php } ?>
