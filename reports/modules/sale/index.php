<?php

if(!empty($_GET['start']) && !empty($_GET['end'])){
    $start = $_GET['start'].' 00:00:00';
    $end = $_GET['end'].' 23:59:59';
}else{
    $start = date('Y-m-d').' 00:00:00';
    $end = date('Y-m-d').' 23:59:59';
}

$dataGroup = $database->select('vicidial_campaigns','campaign_id',['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
$query = "SELECT * from vicidial_list WHERE status in (SELECT status FROM vicidial_campaign_statuses WHERE sale = 'Y') AND list_id in (SELECT list_id FROM vicidial_lists WHERE campaign_id IN ('".implode("','",$dataGroup)."')) AND last_local_call_time >= '".$start."' AND last_local_call_time <= '".$end."'";

$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
   


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

 
    <!-- Main content --> 
    <section class="content">
        <div class="row">     
            <div class="col-12 col-lg-12 col-md-12">  
                <div class="box">     
                    <div class="with-border">
                        <div class="panel-heading"> 
                            <div class="panel-title"> <span class="fa fa-list-alt"></span>Sale Report</div>
                            <ul class="nav panel-tabs">
                                    <li> <a type="button" id="daterange-btn">
                                            <span>
                                                <?php if($_GET['start']){
                                                    echo date('F d,Y',strtotime($_GET['start'])).' - '.date('F d,Y',strtotime($_GET['end']));
                                                }else{?>
                                              <i class="fa fa-calendar text-success"></i>&nbsp; Date Range Picker
                                                <?php }?>
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                             </a></li>
                        </ul>  
                        </div>       
                    </div>      
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>
                                        <th>Lead ID</th>
                                        <th>Agent</th> 
                                        <th>List ID</th>
                                        <th>Entry Date</th>
                                        <th>Status</th>
                                        <th>Source</th>
                                        <th>Phone Number</th>
                                        <th>Call Time</th>
                                        <!--<th>Customer Name</th>-->
                                        <!--<th>Customer Address</th>-->
                                        <!--<th>Customer Postcode</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $recording) { 
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $recording['lead_id']; ?></td>
                                            <td><?php echo $recording['user']; ?></td>
                                            <td><?php echo $recording['list_id']; ?></td>
                                            <td><?php echo $recording['entry_date']; ?></td>
                                            <td><?php echo $recording['status']; ?></td>
                                            <td><?php echo $recording['source_id']; ?></td>
                                            <td><?php echo $recording['phone_number']; ?></td>
                                            <td><?php echo $recording['last_local_call_time']; ?></td>
                                            <!--<td><?php // echo $recording['first_name'].' '.$recording['last_name']; ?></td>-->
                                            <!--<td><?php // echo $recording['address1'].' '.$recording['address2'].' '.$recording['address3']; ?></td>-->
                                            <!--<td><?php // echo $recording['postcode']; ?></td>-->
                                        </tr>
                                    <?php } ?>
                                </tbody>
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
        $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var start = start.format('YYYY-MM-DD');
        var end = end.format('YYYY-MM-DD');
        window.location.href = '<?php echo base_url('sale')?>?start='+start+'&end='+end;
      }
    );
    })

    $('#table-list-campaigns').DataTable({dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],"order": [[ 3, 'desc' ]]});

    

</script>
