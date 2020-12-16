<?php if (!checkRole('inbound_groups', 'view')) {
    no_permission();
} else { ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!--    <section class="content-header">
            <h1>
                Inbound Number

            </h1>
            <small class="text-muted">Manage all your inbound numbers from this page</small>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Inbound Number</a></li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>All Inbound Numbers</div>
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

                                            <th>Inbound Number</th>
                                            <th>Description</th>
                                            <th>Record</th>
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

    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script>
        $(function () {
            "use strict";
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('inbound_groups/ajax') ?>?action=GetInboundNumber',
                    "type": "POST",
                },

                "columns": [
                    {"data": "did_pattern"},
                    {"data": "did_description"},
                    {"data": "record_call"},
                    {"data": "did_active"},
                    {"data": "Action"},
                ],

            });
        })

        $(document).on('click', '.recordActive', function () {
            var InboundDID = $(this).data("id");
            var InboundDRecord = $(this).data("field");


            if ($(this).hasClass('active')) {
                var value = 'Y';
            } else {
                var value = 'N';
            }

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('inbound_groups/ajax') ?>?action=Update',
                data: {DID: InboundDID, Record: InboundDRecord, Value: value}, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Inbound Number Settings',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('click', '.Remove', function () {
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Inbound Number!",
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
                        url: '<?php echo base_url('inbound_groups/ajax') ?>?action=Remove',
                        data: {id: id},
                        success: function (data)
                        {
                            var result = JSON.parse(data);
                            if (result.success === 1) {
                                $('#table-list-campaigns').DataTable().ajax.reload();
                                swal("Deleted!", "Inbound Number has been deleted.", "success");
                            } else {

                            }
                        }
                    });

                } else {
                    swal("Cancelled", "Inbound Number is safe :)", "error");
                }
            });
        });


    </script>
<?php } ?>
