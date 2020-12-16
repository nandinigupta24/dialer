<?php if (!checkRole('inbound_groups', 'view')) {
    no_permission();
} else { ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>All Inbound IVR's</div>
                                <ul class="nav panel-tabs">
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>IVR ID</th>
                                            <th>IVR Name</th>
                                            <th>IVR Audio</th>
                                            <th>Options</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                    "url": '<?php echo base_url('ivr/ajax') ?>?action=GetIVR',
                    "type": "POST",
                },

                "columns": [
                    {"data": "menu_id"},
                    {"data": "menu_name"},
                    {"data": "menu_prompt"},
                    {"data": "menu_timeout"},
                    {"data": "Action"},
                ],

            });
        });
        
        $(document).on('click', '.RemoveIvr', function () {
        var ivrID = $(this).data('id');
        var data = {ivrID: ivrID};
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
            url: '<?php echo base_url('ivr/ajax')?>?action=Remove',
            data: data, // serializes the form's elements.
            success: function (data)
            {
//                alert(data);
                var result = JSON.parse(data);
                if (result.success === 1) {
                    $.toast({
                        heading: 'IVR setting',
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
                        heading: 'IVR setting',
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
                swal("Cancelled", "This list is safe :)", "error");
            }
        });
    });
    </script>
    <!--admin_development.php?ADD=540"-->
<?php } ?>
