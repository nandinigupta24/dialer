<?php
if (!checkRole('settings', 'edit')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>SMTP Accounts</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <li><a href="" data-toggle="modal" data-target="#modal-left"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>Host Name</th>
                                            <th>Username</th>
                                            <th>Port</th>
                                            <th>Encryption</th>
                                            <th>Created At</th>
                                            <th>Active</th>
                                            <!--<th>A</th>-->

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
    <form class="" method="post" action="<?php echo base_url('smtp/ajax') ?>?action=Insert" id="SmtpRule">
        <div class="modal modal-left fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add SMTP Account</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="" id="SMTP-ID"/>
                        <div class="form-group">
                            <label for="example_input_full_name">Host Name</label>
                            <input class="form-control" type="text" placeholder="" id="SMTP-HOST" name="host" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">User Name</label>
                            <input class="form-control" type="text" placeholder="" id="SMTP-USERNAME" name="username" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Password</label>
                            <input class="form-control" type="password" placeholder="" id="SMTP-PASSWORD" name="password" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Port</label>
                            <input class="form-control" type="number" placeholder="" id="SMTP-PORT" name="port" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Encryption</label>
                            <input class="form-control" type="text" placeholder="" id="SMTP-ENCRYPTION" name="encryption" required="true"/>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(function () {
            "use strict";
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('smtp/ajax') ?>?action=GetSMTP',
                    "type": "POST",
                },

                "columns": [
                    {"data": "host"},
                    {"data": "username"},
                    {"data": "port"},
                    {"data": "encryption"},
                    {"data": "created_at"},
                    {"data": "active"},
                    {"data": "Action"},
                ],

            });
        })


        // this is the id of the form
        $("#SmtpRule").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'SMTP Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#modal-left').modal('hide');
                        $('#SmtpRule')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        $('#SMTP-ID').val('');

                    } else {
                        $.toast({
                            heading: 'SMTP Settings',
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
        });


        $(document).on('click', '.SMTP-Perform', function () {
            var action = $(this).attr('action');
            var ID = $(this).attr('id');
            if (action == 'edit') {
                var SMTPHost = $(this).attr('smtp-host');
                var SMTPUsername = $(this).attr('smtp-username');
                var SMTPPassword = $(this).attr('smtp-password');
                var SMTPPort = $(this).attr('smtp-port');
                var SMTPEncryption = $(this).attr('smtp-encryption');


                $('#SMTP-HOST').val(SMTPHost);
                $('#SMTP-USERNAME').val(SMTPUsername);
                $('#SMTP-PASSWORD').val(SMTPPassword);
                $('#SMTP-PORT').val(SMTPPort);
                $('#SMTP-ENCRYPTION').val(SMTPEncryption);
                $('#SMTP-ID').val(ID);
                $('#modal-left').modal('show');
            } else if (action == 'delete') {
                
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this SMTP!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('smtp/ajax') ?>?action=Remove',
                    data: {ID: ID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'SMTP Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#table-list-campaigns').DataTable().ajax.reload();
                    }
                });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
                
            } else {

            }
        });


        $(document).on('click','.SMTP-STATUS', function () {
            if($(this).hasClass('active')){
                var value = 'Y';
            }else{
                var value = 'N';
             }
             var ID = $(this).data('id');
             $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('smtp/ajax') ?>?action=Update',
                    data: {ID: ID,value:value},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'SMTP Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#table-list-campaigns').DataTable().ajax.reload();
                    }
                });
        });
    </script>
<?php } ?>
