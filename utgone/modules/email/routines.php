<?php
if (!checkRole('email', 'view')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!--    <section class="content-header">
            <h1>
                Email Routine Management

            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Email Routines</a></li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Email Routines</div>
                                <ul class="nav panel-tabs">
                                    <li ><a href="<?php echo base_url('email/routine_create') ?>"><i class="fa fa-plus" title="Add SMTP"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Routine Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Queued</th>
                                            <th>Sent Today</th>
                                            <th>Sent Total</th>
                                            <th>Active</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>



                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!--                    <div class="box-footer">
                                                Footer
                                            </div>-->
                        <!-- /.box-footer-->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function () {
            "use strict";
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('email/ajax') ?>?action=GetRoutine',
                    "type": "POST",
                },

                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "description"},
                    {"data": "routine_type"},
                    {"data": "start_date"},
                    {"data": "end_date"},
                    {"data": "start_time"},
                    {"data": "end_time"},
                    {"data": "Queued"},
                    {"data": "SentToday"},
                    {"data": "SentTotal"},
                    {"data": "active"},
                    {"data": "action"},
                ],

            });
        })

        $(document).on('click', '.EmailRoutineActive', function () {
            var ItemID = $(this).data('id');
            if ($(this).hasClass('active')) {
                var value = 'Y';
            } else {
                var value = 'N';
            }
            $.post('<?php echo base_url('email/ajax')?>?action=UpdateStatus', {ItemID:ItemID,ItemValue:value}, function(response){
               var Result = JSON.parse(response);
               var ICON = 'error';
                if(Result.success == 1){
                    var ICON = 'success';
                    }
                    $.toast({
                        heading: 'Email Routine Setting',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: ICON,
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
            })
        });

        $(document).on('click', '.removeEmailRoutine', function () {
        var dataId = $(this).data('id');
        var data = {dataId: dataId};
        var RemoveGroup = $(this);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this team!",
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
            type: 'POST',
            url: '<?php echo base_url('email/ajax')?>?action=RemoveRoutine',
            data: data, // serializes the form's elements.
            success: function (data)
            {
              //alert(data); exit;
                var result = JSON.parse(data);
                if (result.success === 1) {
                    $.toast({
                        heading: 'Email Routine Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    RemoveGroup.parent().parent().remove();
                } else {
                    $.toast({
                        heading: 'Email Routine Setting',
                        text: result.message,
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
                swal("Cancelled", "This email routine data is safe :)", "error");
            }
        });
    });
    </script>
<?php } ?>
