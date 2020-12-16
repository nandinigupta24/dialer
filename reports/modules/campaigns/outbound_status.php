<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <?php
        $StatusListings = $database->query("SELECT status,count(*) as total,status_name FROM vicidial_campaign_statuses WHERE status != '' group by status")->fetchAll(PDO::FETCH_ASSOC);
        $start = $end = date('Y-m-d');
        if (isset($_GET['start'])) {
            $start = $_GET['start'];
        }
        if (isset($_GET['end'])) {
            $end = $_GET['end'];
        }
        $query = "select a.campaign_id,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus,VC.campaign_name
from (SELECT campaign_id,status,count(*) as count FROM asterisk.vicidial_log where call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' group by campaign_id,status) a  JOIN vicidial_campaigns VC ON a.campaign_id=VC.campaign_id ".get_validation('campaign','VC','WHERE',$database)." group by a.campaign_id";
        $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
       
        ?>
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Campaign Outbound Status Summary Report</span>

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
                                <th>Campaign</th>
<?php
foreach ($StatusListings as $status) {
    ?>
                                    <th><?php echo $status['status']; ?><br>(<?php echo $status['status_name']; ?>)</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($data as $value) {
    ?>
                                <tr>
                                    <th><?php echo $value['campaign_name'] . ' (' . $value['campaign_id'] . ')'; ?></th>
                                <?php
                                foreach ($StatusListings as $status) {
                                    $statusArray = array_combine(explode(',', $value['nameStatus']), explode(',', $value['countStatus']));
                                    ?>
                                        <?php echo isset($statusArray[$status['status']]) ? '<th>' . $statusArray[$status['status']] . '</th>' : '<td>0</td>'; ?></td>
                                    <?php } ?>
                                </tr>

                                        <?php
                                    }
                                    ?>
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
        });
//        var dt = $('#table-list-campaigns').DataTable({
//             dom: 'Bfrtip',
//                        buttons: [
//                            'copy', 'csv', 'excel', 'pdf', 'print'
//                        ],
//            destroy: true,
//            "bprocessing": true,
//            "bserverSide": true,
//            "aaSorting": [[1, 'asc']],
//            "pageLength": 25,
//            "ajax": {
//                "url": 'ajax/reports/campaign.php?rule=OutboundStatus',
//                "type": "POST",
//            },
//
//            "columns": [
//                { "data": "status" },
//                { "data": "campaign_id"},
//                { "data": "count"},
//            ],
//
//        });

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
                    window.location.href = "<?php echo base_url('campaigns/outbound_status') ?>?start=" + start + "&end=" + end;
                }
        );
    })

</script>
