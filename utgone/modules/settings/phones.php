<?php if (!checkRole('settings', 'view')) {
    no_permission();
} else { ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--<section class="content-header">
            <h1>
                All System Phone
        
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">System Settings</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage Phone</div>
                                <ul class="nav panel-tabs">
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-phones" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>Phone ID</th>
                                            <th>Server</th>
                                            <th>Protocol</th>
                                            <th>Active</th>
        <!--                                        <th>Call Time Name</th>
                                            <th>Call Time Default Start</th>
                                            <th>Call Time Default End</th>-->
                                            <!--<th>Action</th>-->
                                            <th class="text-center" data-orderable="false">Action</th>
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
            var dt = $('#table-list-phones').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('settings/ajax') ?>?action=GetPhone',
                    "type": "POST",
                },

                "columns": [
                    {"data": "login"},
                    {"data": "server_ip"},
                    {"data": "protocol"},
                    {"data": "active"},
                    {"data": "Action"},
                ],

            });
        })

        $(document).on('click', '.manage-field-switch', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            if ($(this).hasClass('active')) {
                val = 'Y';

            } else {

                val = 'N';

            }

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=field_update_phone',
                data: {id: id, name: name, val: val, type: 'switch'},
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

        $(document).on('click', '.phoneRemove', function () {
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Data List!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('settings/ajax') ?>?action=delete',
                        data: {id: id}, // serializes the form's elements.
                        success: function (data)
                        {
                            var result = JSON.parse(data);
                            if (result.success === 1) {
                                $('#table-list-phones').DataTable().ajax.reload();
                                swal("Deleted!", "Your Data List has been deleted.", "success");
                            } else {
                                swal("Deleted!", "Your Data List has been deleted.", "success");
                            }
                        }
                    });

                } else {
                    swal("Cancelled", "Your Data List is safe :)", "error");
                }
            });
        });




    </script>
<?php } ?>
