<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <?php
        $StatusListings = $database->query("SELECT pause_code,pause_code_name,count(*) as total FROM vicidial_pause_codes group by pause_code")->fetchAll(PDO::FETCH_ASSOC);

        $start = $end = date('Y-m-d');
        if (isset($_GET['start'])) {
            $start = $_GET['start'];
        }
        if (isset($_GET['end'])) {
            $end = $_GET['end'];
        }
        $query = "select
CONCAT(VC.campaign_name,' (',VC.campaign_id,')') AS CampaignName,group_concat(s.sub_status) AS StatusList,GROUP_CONCAT(s.total) AS StatusCount
from
(select campaign_id,sub_status,sum(pause_sec) as total
from vicidial_agent_log
WHERE event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
group by campaign_id,sub_status
) s
JOIN vicidial_campaigns VC
ON
s.campaign_id = VC.campaign_id " . get_validation('campaign', 'VC', 'WHERE',$database) . "
GROUP BY s.campaign_id";
        $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
       
        
        ?>
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Campaign Pause Report</span>
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
                                <th>System Defined Pause</th>
                                <!--<th>System Pause</th>-->
                                <?php
                                foreach ($StatusListings as $status) {
                                    ?>
                                    <th><?php echo $status['pause_code']; ?><br>(<?php echo $status['pause_code_name']; ?>)</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $value) {
                                $statusArray = array_combine(explode(',', 'System,' . $value['StatusList']), explode(',', $value['StatusCount']));
                                ?>
                                <tr>
                                    <th><?php echo $value['CampaignName']; ?></th>
                                    <th><?php echo gmdate("H:i:s", (@$statusArray['LAGGED'] + @$statusArray['LOGIN'] + @$statusArray['System'])); ?></th>
                                    <?php
                                    foreach ($StatusListings as $status) {
                                        ?>
                                        <?php echo isset($statusArray[$status['pause_code']]) ? '<th>' . gmdate("H:i:s", $statusArray[$status['pause_code']]) . '</th>' : '<td>00:00:00</td>'; ?></td>
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
                    window.location.href = "<?php echo base_url('campaigns/pause'); ?>?start=" + start + "&end=" + end;
                }
        );
    })

</script>
