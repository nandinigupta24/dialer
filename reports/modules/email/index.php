<div class="content-wrapper">
<!--    <section class="content-header">
         <h1>Auto Email Report</h1>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="breadcrumb-item active">Auto Email Report</li>
         </ol>
     </section>-->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-envelope"></i> Auto Email Report</span>
                
                <ul class="nav panel-tabs">
                                    <li> <a href="javascript:void(0);" title="Create Report" data-toggle="modal" data-target="#modal-report" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus" style="margin-top:4px;"></i></a></li>
                </ul>
            </div>
            <div class="panel-body pn">
                <?php $data = $DBUTG->select('email_reports', '*'); ?>
                <div class="table-responsive">
                    <table id="list-selection" class="table table-bordered table-striped" >
                        <thead class="bg-success">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Report</th>
                                <th>Type</th>
                                <th>Recipients</th>
                                <th>Active</th>
                                <th>Cretaed AT</th>
                                <th data-orderable="false">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            <!--            <div class="box-footer">
                            Footer
                        </div>-->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modal-report" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-center">Setup New Email Report</h4>
            </div>
            <form method="post" action="" id="EmailReportForm">
                <div class="modal-body bg-gray-light">

                    <div class="form-group">
                        <label>Name:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required=""/>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <input type="text" class="form-control" name="description" placeholder="Enter Description" required=""/>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Report:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-circle-o"></i>
                            </div>
                            <select class="form-control" name="report" required="">
                                <option value="">Select Report</option>
                                <optgroup label="Agent Reports">
                                    <option value="agent_outbound_summary">Agent Outbound Summary</option>
                                    <option value="agent_inbound_summary">Agent Inbound Summary</option>
                                    <option value="agent_combined_summary">Agent Combined Summary</option>

                                    <option value="agent_outbound_disposition">Agent Outbound Disposition</option>
                                    <option value="agent_inbound_disposition">Agent Inbound Disposition</option>
                                    <option value="agent_combined_disposition">Agent Combined Disposition</option>
                                    <option value="agent_outbound_vertical_disposition">Agent Outbound Vertical Disposition</option>
                                    <option value="agent_inbound_vertical_disposition">Agent Inbound Vertical Disposition</option>


                                    <option value="agent_time_summary">Agent Time Summary</option>
                                    <option value="agent_pause_summary">Agent Pause Summary</option>
                                    <option value="agent_login_logout_summary">Agent Login/Out Summary</option>
                                    <!--<option value="agent_hour_summary">Agent Hour Summary</option>-->
                                    <!--<option value="agent_hour_breakdown_summary">Agent Hour Breakdown Summary</option>-->
                                    <option value="agent_outbound_hourly_call">Agent Outbound Hourly Call</option>
                                    <option value="agent_talk_hour_report">Agent Talk Hour Report</option>
                                    <option value="agent_pause_hour_report">Agent Pause Hour Report</option>
                                    <option value="agent_wait_hour_report">Agent Wait Hour Report</option>
                                    <option value="agent_wrap_hour_report">Agent Wrap Hour Report</option>
                                </optgroup>
                                <optgroup label="Campaign Reports">
                                    <option value="campaign_outbound_summary">Campaign Outbound Summary</option>
                                    <option value="campaign_inbound_summary">Campaign Inbound Summary</option>
                                    <option value="campaign_combined_summary">Campaign Combined Summary</option>
                                    <option value="campaign_outbound_disposition">Campaign Outbound Disposition</option>
                                    <option value="campaign_inbound_disposition">Campaign Inbound Disposition</option>
                                    <option value="campaign_combined_disposition">Campaign Combined Disposition</option>
                                    <option value="campaign_time_summary">Campaign Time Summary</option>
                                    <option value="campaign_pause_summary">Campaign Pause Summary</option>
                                </optgroup>
                                <optgroup label="Data List Reports">
                                    <option value="list_outbound_summary">List Outbound Summary</option>
                                    <option value="list_inbound_summary">List Inbound Summary</option>
                                    <option value="list_combined_summary">List Combined Summary</option>
                                    <option value="list_outbound_disposition">List Outbound Disposition</option>
                                    <option value="list_inbound_disposition">List Inbound Disposition</option>
                                    <option value="list_combined_disposition">List Combined Disposition</option>
                                    <option value="list_outbound_time">List Outbound Time</option>
                                    <option value="list_hour_breakdown">List Hour Breakdown</option>
                                    <option value="list_penetration_report">List Penetration Report</option>
                                    <option value="list_content_report">List Content Report</option>
                                </optgroup>
                                <optgroup label="Chat Conversation">
                                    <option value="conversation_summary">summary</option>
                                </optgroup>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                            </div>
                            <select class="form-control" name="type">
                                <option value="daily">Daily</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <!--<option value="week_to_date">Week To Date</option>-->
                                <!--<option value="month_to_date">Month To Date</option>-->
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group WeeklyDay" style="display:none;">
                        <label>Week Day Selection:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                            </div>
                            <select class="form-control" name="week_day">
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Recipients:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-circle-o"></i>
                            </div>
                            <input type="text" class="form-control" name="recipients" placeholder="Email address seprated by comma" required=""/>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Inc Weekends:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-circle-o"></i>
                            </div>
                            <select class="form-control" name="weekends">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Attachment Type</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-circle-o"></i>
                            </div>
                            <select class="form-control" name="attachment_type">
                                <option value="HTML">HTML</option>
                                <option value="CSV">CSV</option>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success float-right">Create</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-report-edit" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>


    var dt = $('#list-selection').DataTable({
        destroy: true,
        "bprocessing": true,
        "bserverSide": true,

        "aaSorting": [[1, 'asc']],
        "ajax": {
            "url": '<?php echo base_url('email/ajax') ?>?rule=listing',
            "type": "POST",
        },

        "columns": [
            {"data": "name"},
            {"data": "description"},
            {"data": "report"},
            {"data": "type"},
            {"data": "recipients"},
            {"mRender": function (data, type, row) {
                    if (row.status == 'Y') {
                        var activeClass = 'active';
                    } else {
                        var activeClass = '';
                    }
                    return '<button type="button" class="btn btn-toggle ' + activeClass + ' EmailStatus" data-id="' + row.id + '" data-toggle="button" aria-pressed="true" autocomplete="off">' +
                            '<div class="handle"></div>' +
                            '</button>';
                }
            },
            {"data": "created_at"},
            {"mRender": function (data, type, row) {
                    return '<a href="javascript:void(0);" class="btn btn-primary btn-app EmailShare"  data-id="' + row.id + '"><i class="fa fa-share-alt"></i></a>' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-app EmailEdit" data-id="' + row.id + '"><i class="fa fa-edit"></i></a>' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-app EmailRemove" data-id="' + row.id + '"><i class="fa fa-times"></i></a>';
                }
            }

        ],

    });


    $('#EmailReportForm').on('submit', function (e) {

        e.preventDefault();
        FormData = $('form').serialize();
        FormURL = '<?php echo base_url('email/ajax') ?>?rule=Save';
        $.ajax({
            type: 'post',
            url: FormURL,
            data: FormData,
            success: function (data) {
                var Result = JSON.parse(data);
                if (Result.success == 1) {
                    $("#EmailReportForm").trigger("reset");
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#modal-report').modal('hide');
                    dt.ajax.reload();
                } else {

                }
            }
        });

    });




    $(document).on('click', '.EmailStatus', function () {
        if ($(this).hasClass('active')) {
            var active = 'Y';
        } else {
            var active = 'N';
        }
        var FieldID = $(this).data('id');
        var FieldName = 'status';
        var FieldValue = active;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url('email/ajax') ?>?rule=update',
            data: {FieldID: FieldID, FieldName: FieldName, FieldValue: FieldValue},
            success: function (data) {
                var Result = JSON.parse(data);
                if (Result.success == 1) {
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                } else {
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            }
        });
    });
    $(document).on('click', '.EmailRemove', function () {
        var FieldID = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this report!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('email/ajax') ?>?rule=remove',
                    data: {FieldID: FieldID},
                    success: function (data) {
                        var Result = JSON.parse(data);
                        if (Result.success == 1) {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: Result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                            dt.ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: Result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                        }
                    }
                });
            } else {
                swal("Cancelled", "This email report is safe :)", "error");
            }
        });

    });

    $(document).on('click', '.EmailEdit', function () {
        var FieldID = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('email/ajax') ?>?rule=editView',
            data: {FieldID: FieldID},
            success: function (data) {
                $('#modal-report-edit').find('.modal-content').html(data);
                $('#modal-report-edit').modal('show');
            }
        });

    });

$(document).on('submit','#EmailReportEditForm',function (e) {

        e.preventDefault();
        FormData = $('form').serialize();
        FormURL = '<?php echo base_url('email/ajax') ?>?rule=UpdateForm';
        $.ajax({
            type: 'post',
            url: FormURL,
            data: FormData,
            success: function (data) {
                var Result = JSON.parse(data);
                if (Result.success == 1) {
                    $("#EmailReportEditForm").trigger("reset");
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                     $('#modal-report-edit').find('.modal-content').html('');
                    $('#modal-report-edit').modal('hide');
                    dt.ajax.reload();
                } else {

                }
            }
        });

    });


$(document).on('change','select[name="type"]',function(){
    var value = $(this).val();
    if(value == 'weekly'){
     $('.WeeklyDay').show();
    }
});

$(document).on('click', '.EmailShare', function () {
        var FieldID = $(this).data('id');

        swal({
            title: "Are you sure?",
            text: "You want to share this report!",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, share it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'post',
                    url: '/cron/report.php?report_id='+FieldID,
                    data: {FieldID: FieldID},
                    success: function (data) {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: 'Your report has been successfully shared!!',
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                    }
                });
            } else {
                swal("Cancelled", "This email report is safe :)", "error");
            }
        });

    });

</script>
