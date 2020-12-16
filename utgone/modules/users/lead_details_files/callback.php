<div class="col-md-12">
    <div class="panel panel-visible formtabs" id="AllFormsTab">
        <div class="panel-heading">
            <div class="panel-title"> <span class="fa fa-book"></span>Callbacks for this lead</div>
            <ul class="nav panel-tabs">

            </ul>
        </div>
        <div class="panel-body pbn">
        <?php $CallbackData = $database->select('vicidial_callbacks', '*',['lead_id'=>$leadID]); ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="TableCallback">
                        <thead class="bg-success">
                            <tr>
                                <th>Campaign ID</th>
                                <th>List ID</th>
                                <th>Callback Time</th>
                                <th>Agent</th>
                                <th>Recipient</th>
                                <th data-orderable="false">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($CallbackData as $callback) { ?>
                                <tr>
                                    <td><?php echo $callback['campaign_id']; ?></td>
                                    <td><?php echo $callback['list_id']; ?></td>
                                    <td><?php echo $callback['callback_time']; ?></td>
                                    <td><?php echo $callback['user']; ?></td>
                                    <td><?php echo $callback['recipient']; ?></td>
                                    <td>
                                        <a href="javascript:void();" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
                </div>
            </div>     
        </div>
    </div>
</div>
<script>
    $('#TableCallback').DataTable();
</script>