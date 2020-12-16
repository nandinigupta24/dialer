<?php if (!checkRole('email', 'view')) {
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
                                <div class="panel-title"> <span class="fa fa-send-o"></span> Email Sent Logs</div>
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

                                            <th>Lead ID</th>
                                            <th>Routine</th>
                                            <th>Template</th>
                                            <th>Type</th>
                                            <th>Date Sent</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
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
                    "url": '<?php echo base_url('email/ajax') ?>?action=GetEmailSent',
                    "type": "POST",
                },

                "columns": [
                    {"data": "lead_id"},
                    {"data": "routine"},
                    {"data": "template"},
                    {"data": "type"},
                    {"data": "date_sent"},
                    {"data": "customer_name"},
                    {"data": "email"},
                ],

            });
        })



    </script>
<?php } ?>
