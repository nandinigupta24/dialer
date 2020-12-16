<?php
if (!checkRole('data', 'view')) {
    no_permission();
} else {
   
    ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box ">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-history text-success"></span>Data Archive Rules<span class="cam-name"></span></div>
                                <ul class="nav panel-tabs">
                                    <li><a href="javascript:void(0);" class="text-success CreateRule" title="Create Rule"><i class="fa fa-plus"></i></a></li>
                                    <li><a href="javascript:void(0);" class="text-success" title="Refresh Page" onclick="window.location.reload();"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered" id="employee-grid">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>Status</th>
                                                <th>Status Name</th>
                                                <th>Selectable</th>
                                                <th>Human Answered</th>
                                                <th>Sale</th>
                                                <th>DNC</th>
                                                <th>Customer Contact</th>
                                                <th>Not Interested</th>
                                                <th>Scheduled Callback</th>
                                                <th>Completed</th>
                                                <th>Status Type</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
//        $('#ListData').DataTable();


    </script>
    <script type="text/javascript" language="javascript" >
    $(document).ready(function() {
        var dataTable = $('#employee-grid').DataTable( {
            "processing": true,
            "serverSide": true,
            ajax:{
                url :"<?php echo base_url('data/ajax')?>?rule=practice", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
//                    $(".employee-grid-error").html("");
//                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
//                    $("#employee-grid_processing").css("display","none");
 
                }
            },
           columns:[
                    {data:'status'},
                    {data:'status_name'},
                    {data:'selectable'},
                    {data:'human_answered'},
                    {data:'sale'},
                    {data:'dnc'},
                    {data:'customer_contact'},
                    {data:'not_interested'},
                    {data:'scheduled_callback'},
                    {data:'completed'},
                    {data:'Status_Type'},
                    ]     
        } );
    } );
</script>
<?php } ?>
