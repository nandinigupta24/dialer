<?php

$Type = (!empty($_GET['type']) && $_GET['type']) ? 'Inbound' : 'Outbound';
if($Type == 'Inbound'){
    $ListID = $_GET['ListID'];
    $start = $end = date('Y-m-d');
    if (!empty($_GET['start']) && !empty($_GET['end'])) {
        $start = $_GET['start'];
        $end = $_GET['end'];
    }

    $query = "SELECT * FROM vicidial_closer_log VL WHERE VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND list_id='".$ListID."'";
    $report = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
}else{
    $ListID = $_GET['ListID'];
    $start = $end = date('Y-m-d');
    if (!empty($_GET['start']) && !empty($_GET['end'])) {
        $start = $_GET['start'];
        $end = $_GET['end'];
    }

    $query = "SELECT VL.user,VL.call_date,VL.campaign_id,VL.list_id,VL.lead_id,VL.status,VL.phone_number,VL.length_in_sec,VLL.first_name,VLL.last_name,VLL.comments FROM vicidial_log VL JOIN vicidial_list VLL ON VL.lead_id = VLL.lead_id WHERE VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.list_id='".$ListID."'";
    $report = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Data <?php echo $Type;?> Summary Report</span>
                <ul class="nav panel-tabs">
                    <li> <a type="button" id="daterange-btn">
                            <span>
                                <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;Date Range Picker
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </a></li>
                </ul>
            </div>
            <div class="box-body">
                <div class="table-responsive">
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
                                <th>Customer Name</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($report as $value) { ?>
                                <tr>
                                    <td><?php echo $value['user']; ?></td>
                                    <td><?php echo $value['call_date']; ?></td>
                                    <td><?php echo $value['campaign_id']; ?></td>
                                    <td><?php echo $value['list_id']; ?></td>
                                    <td><?php echo $value['lead_id']; ?></td>
                                    <td><?php echo $value['status']; ?></td>
                                    <td><?php echo $value['phone_number']; ?></td>
                                    <td><?php echo $value['length_in_sec']; ?></td>
                                    <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>
                                    <td><?php echo $value['comments']; ?></td>
                                </tr>
                            <?php } ?>
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
    $('#table-list-campaigns').DataTable({dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]});
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
                <?php 
                if($Type == 'Inbound'){?>
                    window.location.href = '<?php echo base_url('data/list') ?>?ListID=<?php echo $_GET['ListID']; ?>&type=inbound&start=' + start + '&end=' + end;
                <?php }else{?>
                    window.location.href = '<?php echo base_url('data/list') ?>?ListID=<?php echo $_GET['ListID']; ?>&start=' + start + '&end=' + end;   
               <?php }?>
            }
    );

</script>