<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-envelope"></span>Email Accounts</div>
                            <ul class="nav panel-tabs">
                                <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                <li><a href="<?php echo base_url('settings/email_accounts') ?>?action=add"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>
                                        <th>Account ID</th>
                                        <th>Account Name</th>
                                        <th>Description</th>
                                        <th>Reply To Address</th>
                                        <th>Protocol </th>
                                        <th>Server</th>
                                        <th>Frequency</th>
                                        <th>Active</th>
                                        <th>Unread Emails</th>
                                        <th class="text-center"  data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>



                        </div>
                    </div>
                                        <div class="box-footer">
                                            <!--Footer-->
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
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetEmailAccounts',
                "type": "POST",
            },
            "columns": [
                {"data": "email_account_id"},
                {"data": "email_account_name"},
                {"data": "email_account_description"},
                {"data": "email_replyto_address"},
                {"data": "protocol"},
                {"data": "email_account_server"},
                {"data": "email_frequency_check_mins"},
                {"data": "active"},
                {"data": "UnreadEmail"},
                {"data": "Action",
                    "render": function (data, type, row, meta) {
                        return '<a href="<?php echo base_url('settings/email_accounts') ?>?action=edit&editID=' + row.email_account_id + '" class="btn btn-success btn-app Campaign-DNC-Action" action="edit"><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app EmailAccountRemove" email-account-id="'+row.email_account_id+'"><i class="fa fa-times"></i></a>'
                    }
                },
            ],

        });
    })

    $(document).on('click', '.EmailAccountRemove', function () {
        var EmailAccountID = $(this).attr('email-account-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Email Account!",
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
                        url: '<?php echo base_url('settings/ajax') ?>?action=RemoveEmailAccounts',
                        data: {EmailAccountID: EmailAccountID},
                        success: function (data) {
                            var result = JSON.parse(data);
                            $.toast({
                                heading: 'Email Account Settings',
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
    });

</script>