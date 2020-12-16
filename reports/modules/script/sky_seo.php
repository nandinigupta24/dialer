<?php
if (!empty($_GET['start']) && !empty($_GET['end'])) {
    $start = $_GET['start'] . ' 00:00:00';
    $end = $_GET['end'] . ' 23:59:59';
} else {
    $start = date('Y-m-d') . ' 00:00:00';
    $end = date('Y-m-d') . ' 23:59:59';
}

$data = $DBScripts->select('sky_seo_details', '*', ["AND" => ['created_at[>=]' => $start, 'created_at[<=]' => $end, 'OR' => ['question_1[!]' => NULL, 'question_2[!]' => NULL, 'question_3[!]' => NULL, 'question_4[!]' => NULL]], 'ORDER' => ['id' => 'DESC']]);
//$data = $DBScripts->select('sky_seo_details', '*', ["AND" => ['created_at[>=]' => $start, 'created_at[<=]' => $end], 'ORDER' => ['id' => 'DESC']]);
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
                            <div class="panel-title"> <span class="fa fa-list-alt"></span>SKY SEO Script Report</div>
                            <ul class="nav panel-tabs">
                                <li><a href="javascript:void(0);" class="text-danger RemoveBulk" title="Remove data according to date filter"><i class="fa fa-trash-o"></i>&nbsp; Bulk Remove</a></li>
                                
                                <li> <a type="button" id="daterange-btn">
                                        <span>
                                            <?php
                                            if ($_GET['start']) {
                                                echo date('F d,Y', strtotime($_GET['start'])) . ' - ' . date('F d,Y', strtotime($_GET['end']));
                                            } else {
                                                ?>
                                                <i class="fa fa-calendar text-success"></i>&nbsp; Date Range Picker
                                            <?php } ?>
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

                                        <th>Agent</th>
                                        <th>Campaign ID</th>
                                        <th>Lead ID</th>

                                        <th>Title</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Update Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Postcode</th>
                                        <th>Update Postcode</th>
                                        <th>Phone Number</th>

                                        <th>Age Group</th>
                                        <th>Electricity Provider</th>
                                        <th>Gas Provider</th>
                                        <th>Payment Mode</th>
                                        <th>Property Type</th>
                                        <th>Warm House Discount</th>
                                        <th>OPT-IN Statement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $recording) {
                                        $UrlHITData = unserialize($recording['url_hit_data']);
                                        ?>
                                        <tr>
                                            <td><?php echo $recording['agent_id']; ?></td>
                                            <td><?php echo $recording['campaign_id']; ?></td>
                                            <td><?php echo $recording['lead_id']; ?></td>

                                            <td><?php echo (!empty($recording['title'])) ? $recording['title'] : $UrlHITData['title']; ?></td>
                                            <td><?php echo $recording['first_name']; ?></td>
                                            <td><?php echo $recording['last_name']; ?></td>
                                            <td><?php echo $recording['add1'] . ',' . $recording['add2'] . ',' . $recording['add3']; ?></td>
                                            <td><?php echo $recording['update_house_number']; ?></td>
                                            <td><?php echo $recording['city']; ?></td>
                                            <td><?php echo $recording['state']; ?></td>
                                            <td><?php echo $recording['post_code']; ?></td>
                                            <td><?php echo $recording['update_postcode']; ?></td>
                                            <td><?php echo $recording['phone_number']; ?></td>

                                            <td><?php echo $recording['question_1']; ?></td>
                                            <td><?php echo $recording['question_2']; ?></td>
                                            <td><?php echo $recording['question_3']; ?></td>
                                            <td><?php echo $recording['question_4']; ?></td>
                                            <td><?php echo $recording['question_5']; ?></td>
                                            <td><?php echo $recording['question_6']; ?></td>
                                            <td><?php echo $recording['OPTIN']; ?></td>
                                            <td><button class="btn btn-danger Remove" data-id="<?php echo $recording['id']; ?>"><i class="fa fa-trash-o"></i> Remove</button></td>
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
                    window.location.href = '<?php echo base_url('script/sky_seo') ?>?start=' + start + '&end=' + end;
                }
        );
    })

    $('#table-list-campaigns').DataTable({dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "order": [[3, 'desc']]
        });

    $(document).on('click','.Remove',function(){
        var ID = $(this).data('id');
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f00",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.post('<?php echo base_url('script/ajax') ?>?action=deleteByIdSKY', {ID:ID}, function (resp) {
                            swal("Deleted!", "Your data been deleted.", "success");
    //                        table.ajax.reload();
                            window.location.reload();
                        });
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
            });
    });

     $(document).on('click','.RemoveBulk',function(){
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f00",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.post('<?php echo base_url('script/ajax') ?>?action=RemoveBulk&type=SKYSEO', {start:'<?php echo $start;?>',end:'<?php echo $end;?>'}, function (resp) {
                            swal("Deleted!", "Your data been deleted.", "success");
    //                        table.ajax.reload();
                            window.location.reload();
                        });
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
            });
    });

</script>
