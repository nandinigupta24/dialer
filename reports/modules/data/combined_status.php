<div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
        <?php
        $StatusListings = $database->query("SELECT status,count(*) as total,status_name FROM vicidial_campaign_statuses WHERE status !='' group by status")->fetchAll(PDO::FETCH_ASSOC);
        $start = $end = date('Y-m-d');
        if (isset($_GET['start'])) {
            $start = $_GET['start'];
        }
        if (isset($_GET['end'])) {
            $end = $_GET['end'];
        }
        $data = $database->query("select a.list_id,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus,VC.list_name
from (SELECT VL.list_id,VAL.status,count(*) as count FROM asterisk.vicidial_agent_log  VAL JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id
where VAL.event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND VAL.status is NOT NULL group by VL.list_id,VAL.status ) a
JOIN vicidial_lists VC ON a.list_id=VC.list_id ".get_validation('list','VC','AND',$database)." group by a.list_id")->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Data Combined Status Report</span>
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
                                <th>List</th>
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
                                    <th><?php echo $value['list_name'] . ' (' . $value['list_id'] . ')'; ?></th>
                                <?php
                                foreach ($StatusListings as $status) {
                                    if(count(explode(',', $value['nameStatus'])) == count(explode(',', $value['countStatus']))){
                                        $statusArray = array_combine(explode(',', $value['nameStatus']), explode(',', $value['countStatus']));
                                    }
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
                    window.location.href = "<?php echo base_url('data/combined_status');?>?start=" + start + "&end=" + end;
                }
        );
    })

</script>
