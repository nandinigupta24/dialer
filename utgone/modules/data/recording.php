<?php
if (!checkRole('data', 'view')) {
    no_permission();
} else {

if (!empty($_POST) && $_POST) {
        $date = date('Y-m-d', strtotime($_POST['date']));
        $campaign = $_POST['campaign'];
        $status = $_POST['status'];
        $agent = $_POST['agent'];
        $database->insert('recording_inputs', ['userid' => $_SESSION['CurrentLogin']['user'], 'campaign_id' => $campaign, 'status' => $status, 'event_start' => $date . ' 00:00:00', 'event_end' => $date . ' 23:59:59', 'agent' => $agent]);
        $new = shell_exec('sh '.$_SERVER['DOCUMENT_ROOT'].'/db/Ankit/zipConv.sh ' . $_SESSION['CurrentLogin']['user'].' '.$_SERVER['DOCUMENT_ROOT'].' '.$DBPass);
        //die($_SESSION['CurrentLogin']['user'].' '.$campaign.' '.$status.' '.$date.' '.$_SERVER['DOCUMENT_ROOT'].' '.$DBPass.' '.$agent);
        $filename = $_SESSION['CurrentLogin']['user'] . date('Y-m-d') . '_' . substr($new, -11);
        echo "<script type='text/javascript'>window.open('/db/Ankit/".trim($filename)."', '_blank');</script>";
//        echo "<script type='text/javascript'> document.location = '/db/Ankit/".trim($filename)."'; </script>";
    }
//    $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);

//    $status = $database->select('vicidial_campaign_statuses', ['status', 'status_name'], ['ORDER' => ['status' => 'ASC']]);
//    $status = $database->query('SELECT status,status_name FROM vicidial_campaign_statuses group by status order by status ASC')->fetchAll(PDO::FETCH_ASSOC);


    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['active' => 'Y']);
    }else{
//        $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['AND'=>['active' => 'Y','user_group'=>$_SESSION['CurrentLogin']['user_group']]]);
        $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['AND'=>['active' => 'Y','campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]]);
    }

    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $users = $database->select('vicidial_users', ['user', 'full_name']);
    }else{
        $users = $database->select('vicidial_users', ['user', 'full_name'], ['AND'=>['user_group'=>$_SESSION['CurrentLogin']['user_group']]]);
    }

        $query = "SELECT status,status_name FROM vicidial_campaign_statuses WHERE (campaign_id is NULL OR campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."')) AND status != '' order by status ASC";
        $status = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper" style="min-height: 336.8px;">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-plus"></span>Batch Download Recordings</div>
                    </div>
                    <div class="panel-body pn">
                        <?php if (!empty($_POST) && $_POST) {?>
                        <div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Please check your downloads!!
                        </div>
                        <?php }?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="CampaignName">Date:</label>
                                        <input type="text" autocomplete="off" name="date" class="form-control" id="datepicker1" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="CampaignName">Campaign:</label>
                                        <select class="form-control" name="campaign" required="">
                                            <option value="">Select Option</option>
<?php foreach ($campaign as $valCampaign) { ?>
                                                <option value="<?php echo $valCampaign['campaign_id']; ?>"><?php echo $valCampaign['campaign_id'] . ' - ' . $valCampaign['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="CampaignName">Status:</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Option</option>
<?php foreach ($status as $valStatus) { ?>
                                                <option value="<?php echo $valStatus['status']; ?>"><?php echo $valStatus['status'] . ' - ' . $valStatus['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="CampaignName">Agent:</label>
                                        <select class="form-control" name="agent">
                                            <option value="">Select Option</option>
<?php foreach ($users as $user) { ?>
                                                <option value="<?php echo $user['user']; ?>"><?php echo $user['user'] . ' - '. $user['full_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Download</button>
                                    </div>
                                </div>
                            </div>

                        </form></div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>



    </section>
    <!-- /.content -->
</div>
<?php } ?>

<script>
$('#datepicker1').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                });
</script>
