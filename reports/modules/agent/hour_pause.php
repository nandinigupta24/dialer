<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php
$start = $end = date('Y-m-d');
if(!empty($_GET['start']) && !empty($_GET['end'])){
  $start = $_GET['start'];
  $end = $_GET['end'];
}
?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> <i class="fa fa-list-alt"></i> Agent Hourly Pause Report</span>
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
                <?php

                $query = "SELECT HOUR(VAL.event_time) as HourTime
FROM
vicidial_agent_log VAL
WHERE
VAL.event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND HOUR(VAL.event_time) > 0 group by HOUR(VAL.event_time)";
                $Hour = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);


                $ResultQuery = "select VU.full_name,a.user,a.user_group,group_concat(a.CallDate) as CallDateCount,group_concat(a.count) as countTotal,sum(a.count) as total
from (SELECT HOUR(event_time) as CallDate,user,user_group,sum(pause_sec) as count FROM asterisk.vicidial_agent_log WHERE event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND HOUR(event_time) > 0 group by user,HOUR(event_time)) a JOIN vicidial_users VU ON a.user = VU.user ".get_validation('agent','VU','WHERE',$database)." group by a.user";
                $data = $database->query($ResultQuery)->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <div class="table-responsive">
                    <table id="table-list-campaigns" class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                                <th>Agent</th>
                                <th>Group</th>
                                <?php foreach($Hour as $timeHour){?>
                                <th><?php echo str_pad($timeHour['HourTime'], 2, '0', STR_PAD_LEFT);?>:00</th>
                                <?php }?>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $value){?>
                                <tr>
                                    <td><?php echo $value['full_name'].' ('.$value['user'].')';?></td>
                                    <td><?php echo $value['user_group'];?></td>
                                    <?php
                                foreach($Hour as $timeHour){
                                    $statusArray = array_combine(explode(',',$value['CallDateCount']),explode(',',$value['countTotal']));
                                ?>
                                <?php echo isset($statusArray[$timeHour['HourTime']]) ? '<th>'.gmdate('H:i:s',$statusArray[$timeHour['HourTime']]).'</th>' : '<td>00:00:00</td>';?></td>
                                <?php }?>
                                 <td><?php echo gmdate('H:i:s',$value['total']);?></td>
                                </tr>
                            <?php }?>
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
                        ]
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
                    window.location.href = "<?php echo base_url('agent/hour_pause');?>?start="+start+"&end="+end;
                }
        );
    })

</script>
