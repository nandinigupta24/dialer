<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Inbound Call Log Report</span>
                <ul class="nav panel-tabs">
                    <li> <a type="button" id="daterange-btn">
                            <span>
                                <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;Date Range Picker
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </a></li>
                </ul>
            </div>
            <div class="panel-body pn">
                <div class="table-responsive">
                    <table id="table-list-campaigns" class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                                <th>Inbound Group</th>
                                <th>List ID</th>
                                <th>Status</th>
                                <th>Comment</th>
                                <th>Agent</th>
                                <th>Agent Group</th>
                                <th>Lead ID</th>
                                <th>Call Date</th>
                                <th>Call Length In Seconds</th>
                                <th>Queue Length In Seconds</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<script>
    $(function () {
        "use strict";
        var dt = $('#table-list-campaigns').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "pageLength": 25,
            "ajax": {
                "url": '<?php echo base_url('inbound/ajax'); ?>?rule=inbound',
                "type": "POST",
            },

            "columns": [
                {"data": "campaign_id"},
                {"data": "list_id"},
                {"data": "status"},
                {"data": "comments"},
                {"data": "user"},
                {"data": "user_group"},
                {"data": "lead_id"},
                {"data": "call_date"},
                {"data": "length_in_sec"},
                {"data": "queue_seconds"},
                {"data": "phone_number"},
            ],

        });

        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    var start = start.format('YYYY-MM-DD');
                    var end = end.format('YYYY-MM-DD');
                    var dt = $('#table-list-campaigns').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        destroy: true,
                        "bprocessing": true,
                        "bserverSide": true,
                        "aaSorting": [[1, 'asc']],
                        "pageLength": 25,
                        "ajax": {
                            "url": '<?php echo base_url('inbound/ajax'); ?>?rule=inbound&start=' + start + '&end=' + end,
                            "type": "POST",
                        },

                        "columns": [
                            {"data": "campaign_id"},
                            {"data": "list_id"},
                            {"data": "status"},
                             {"data": "comments"},
                            {"data": "user"},
                            {"data": "user_group"},
                            {"data": "lead_id"},
                            {"data": "call_date"},
                            {"data": "length_in_sec"},
                            {"data": "queue_seconds"},
                            {"data": "phone_number"},
                        ],

                    });
                }
        );
    })

</script>
