<?php
$AgentID = $_GET['AgentID'];
$start = $end = date('Y-m-d');
if (!empty($_GET['start']) && !empty($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
}
$SearchArray = [];
$SearchArray['AND']['vicidial_closer_log.user'] = $AgentID;
$SearchArray['AND']['vicidial_closer_log.call_date[>=]'] = $start.' 00:00:00';
$SearchArray['AND']['vicidial_closer_log.call_date[<=]'] = $end.' 23:59:59';
$SelectArray = ['vicidial_closer_log.user','vicidial_closer_log.call_date','vicidial_closer_log.campaign_id','vicidial_closer_log.lead_id','vicidial_closer_log.status','vicidial_closer_log.length_in_sec','vicidial_list.phone_number','vicidial_list.list_id'];
$report = $database->select('vicidial_closer_log',['[>]vicidial_list'=>['lead_id'=>'lead_id']],$SelectArray,$SearchArray);


?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Agent Campaign Inbound Summary Report</span>
                <ul class="nav panel-tabs">
                    <li> <a type="button" id="daterange-btn">
                            <span>
                                <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;Date Range Picker
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive pn">
                    <table id="table-list-campaigns" class="table table-bordered table-striped" >
                        <thead class="bg-success">
                            <tr>
                                <th>Agent</th>
                                <th>Call Date</th>
                                <th>Campaign</th>
                                <th>List</th>
                                <th>Lead ID</th>
                                <th>Status</th>
                                <th>Phone Number</th>
                                <th>Call Length</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($report as $value){?>
                            <tr>
                                <td><?php echo $value['user'];?></td>
                                <td><?php echo $value['call_date'];?></td>
                                <td><?php echo $value['campaign_id'];?></td>
                                <td><?php echo $value['list_id'];?></td>
                                <td><?php echo $value['lead_id'];?></td>
                                <td><?php echo $value['status'];?></td>
                                <td><?php echo $value['phone_number'];?></td>
                                <td><?php echo $value['length_in_sec'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script>
$('#table-list-campaigns').DataTable();
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
                startDate: moment(),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                var start = start.format('YYYY-MM-DD');
                var end = end.format('YYYY-MM-DD');

                window.location.href = '<?php echo base_url('outbound/calls_drilldown') ?>?AgentID=<?php echo $_GET['AgentID'];?>&start='+start+'&end='+end;
//                var dt = $('#table-list-campaigns').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ],
//                    destroy: true,
//                    "bprocessing": true,
//                    "bserverSide": true,
//                    "aaSorting": [[1, 'asc']],
//                    "pageLength": 25,
//                    "ajax": {
//                        "url": '<?php echo base_url('outbound/ajax') ?>?rule=OutboundSummary&start=' + start + '&end=' + end,
//                        "type": "POST",
//                    },
//
//                    "columns": [
//                        {"data": "AgentName"},
//                        {"data": "user_group"},
//                        {"data": "Calls"},
//                        {"data": "ManDials"},
//                        {"data": "Connects"},
//                        {"data": "ConnectRate"},
//                        {"data": "DMCs"},
//                        {"data": "DMCRate"},
//                        {"data": "Sales"},
//                        {"data": "Completed"},
//                        {"data": "ConversionRate"},
//                        {"data": "Drops"},
//                        {"data": "A"},
//                        {"data": "DropRate"},
//                        {"data": "TalkTime"},
//                        {"data": "WaitTime"},
//                        {"data": "PauseTime"},
//                        {"data": "DispoTime"},
//                        {"mRender": function (data, type, row) {
//                                return '<a href="<?php echo base_url('outbound/calls_drilldown'); ?>?AgentID=' + row.user + '&start=' + start + '&end=' + end + '" class="btn btn-primary btn-app" title="View Detail"><i class="fa fa-list"></i></a>';
//                            }}
//                    ]
//
//                });
            }
    );

</script>
