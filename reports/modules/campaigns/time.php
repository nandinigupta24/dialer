<?php
$query = "Select a.campaign_id, a.Talk, a.Pause, a.Wait, a.Dispo,VC.campaign_name
from
(select val.campaign_id,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
from vicidial_agent_log val
WHERE val.event_time > CURDATE()
group by val.campaign_id
) a JOIN vicidial_campaigns VC
ON a.campaign_id = VC.campaign_id
ORDER BY a.campaign_id";
$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--   <section class="content-header">
        <h1>
            Campaigns Time Report
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Campaigns Time Report</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Campaigns Time Report</span>

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
                            <th>Campaign ID</th>
                            <th>Total Time</th>
                            <th>Talk</th>
                            <th>Talk %</th>
                            <th>Pause</th>
                            <th>Pause %</th>
                            <th>Wait</th>
                            <th>Wait %</th>
                            <th>Dispo</th>
                            <th>Dispo %</th>
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
                "url": '<?php echo base_url('campaigns/ajax');?>?rule=Time',
                "type": "POST",
            },

            "columns": [
                { "data": "campaign_id" },
                { "data": "TotalTime"},
                { "data": "TalkTime"},
                { "data": "TalkPer"},
                { "data": "PauseTime"},
                { "data": "PausePer"},
                { "data": "WaitTime"},
                { "data": "WaitPer"},
                { "data": "DispoTime"},
                { "data": "DispoPer"},
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
                            "url": '<?php echo base_url('campaigns/ajax');?>?rule=Time&start=' + start + '&end=' + end,
                            "type": "POST",
                        },

                        "columns": [
                            { "data": "campaign_id" },
                            { "data": "TotalTime"},
                            { "data": "TalkTime"},
                            { "data": "TalkPer"},
                            { "data": "PauseTime"},
                            { "data": "PausePer"},
                            { "data": "WaitTime"},
                            { "data": "WaitPer"},
                            { "data": "DispoTime"},
                            { "data": "DispoPer"},
                        ],
                    });
                }
        );
    })

</script>
