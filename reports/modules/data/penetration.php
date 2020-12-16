<div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Data Hour Breakdown Report</span>
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
                    <table id="table-list-campaigns" class="table table-bordered table-striped" >
                        <thead class="bg-success">
                            <tr>
                                <th>List</th>
                                <th>Campaign</th>
                                <th>Last Dialled</th>
                                <th>Total Leads</th>
                                <th>Dialable</th>
                                <th>Percent Dialable (%)</th>
                                <!--<th>Final Hit Disposition</th>-->
                                <!--<th>Penetration Report</th>-->
                                <!--<th>Average Dial Attempts</th>-->
                                <th>Active</th>
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
                "url": '<?php echo base_url('data/ajax');?>?rule=Penetration',
                "type": "POST",
            },

            "columns": [
                {"data": "ListName"},
                {"data": "CampaignName"},
                {"data": "LastDialled"},
                {"data": "TotalLeads"},
                {"data": "DialableLeads"},
                {"data": "PercentageDialable"},
                {"data": "Status"}
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
                            "url": '<?php echo base_url('data/ajax');?>?rule=Penetration&start=' + start + '&end=' + end,
                            "type": "POST",
                        },

                        "columns": [
                            {"mRender": function (data, type, row) {
                                    return row.EventTimeHour + ':00';
                                }},
                            {"data": "ListName"},
                            {"data": "Calls"},
                            {"data": "ManDials"},
                            {"data": "Connects"},
                            {"data": "ConnectRate"},
                            {"data": "DMCs"},
                            {"data": "DMCRate"},
                            {"data": "Sales"},
                            {"data": "Completed"},
                            {"data": "ConversionRate"},
                            {"data": "Drops"},
                            {"data": "A"}
                        ]

                    });
                }
        );
    });
</script>
