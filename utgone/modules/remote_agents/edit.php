<?php
if (!checkRole('remote_agents', 'edit')) {
    no_permission();
} else {

$array['default_local_gmt'] =  [12.75,12.00,11.00,10.00,9.50,9.00,8.00,7.00,6.50,6.00,5.75,5.50,5.00,4.50,4.00,3.50,3.00,2.00,1.00,0.00,-1.00,-2.00,-3.00,-3.50,-4.00,-5.00,-6.00,-7.00,-8.00,-9.00,-10.00,-11.00,-12.00];
$ServerListings = $database->select('servers',['server_ip','server_description','external_server_ip'],['ORDER'=>['server_ip'=>'ASC']]);

$campaigns = $database->select('vicidial_campaigns',['campaign_id','campaign_name']);

$inbound_groups = $database->select('vicidial_inbound_groups',['group_id','group_name']);

$users = $database->select('vicidial_users',['user','full_name']);

$userID = $_GET['user'];
$AgentDetail = $database->get('vicidial_remote_agents', '*', ['remote_agent_id' => $userID]);
$closer_campaigns = preg_replace("/ -$/","",$AgentDetail['closer_campaigns']);
$groups = explode(" ", $closer_campaigns);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-desktop"></span>Edit Remote Agent</div>

                    </div>
                    <div class="panel-body pn">

                        <form method="POST" action="<?php echo base_url('remote_agents/ajax')?>?rule=update" id="CreateAgentForm" class="AgentForm">
                            <input type="hidden" name="remote_agent_id" value="<?php echo $_GET['user'] ?>">
                            <div class="pad">

                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">User ID Start</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="user_start" id="user_start">
                                          <?php
                                          foreach($users as $users){
                                          ?>
                                          <option value="<?php echo $users['user'];?>" <?php echo ($AgentDetail['user_start'] == $users['user']) ? 'selected="selected"' : '';?>><?php echo $users['user'];?></option>
                                          <?php
                                        } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Number of Lines</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="number_of_lines" id="number_of_lines" class="form-control" value="<?php echo $AgentDetail['number_of_lines'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Server IP</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="server_ip" id="server_ip">
                                            <?php
                                            foreach($ServerListings as $listings){
                                            ?>
                                            <option value="<?php echo $listings['server_ip'];?>" <?php echo ($AgentDetail['server_ip'] == $listings['server_ip']) ? 'selected="selected"' : '';?>><?php echo $listings['server_ip'].' - '.$listings['server_description'];?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">External Extension</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="conf_exten" id="conf_exten" class="form-control" value="<?php echo $AgentDetail['conf_exten'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status" id="status">
                                            <option value="INACTIVE" <?php echo ($AgentDetail['status'] == 'INACTIVE') ? 'selected="selected"' : '';?>>INACTIVE</option>
                                            <option value="ACTIVE" <?php echo ($AgentDetail['status'] == 'ACTIVE') ? 'selected="selected"' : '';?>>ACTIVE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="campaign_id" class="col-sm-2 col-form-label">Campaign</label>
                                    <div class="col-sm-4">
                                      <select class="form-control" name="campaign_id" id="campaign_id">
                                        <?php
                                        foreach($campaigns as $campaign){
                                        ?>
                                        <option value="<?php echo $campaign['campaign_id'];?>" <?php echo ($AgentDetail['campaign_id'] == $campaign['campaign_id']) ? 'selected="selected"' : '';?>><?php echo $campaign['campaign_id'].' - '.$campaign['campaign_name'];?></option>
                                        <?php
                                      } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="on_hook_agent" class="col-sm-2 col-form-label">On-Hook Agent</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="on_hook_agent" id="on_hook_agent">
                                            <option value="Y" <?php echo ($AgentDetail['on_hook_agent'] == 'Y') ? 'selected="selected"' : '';?>>Y</option>
                                            <option value="N" <?php echo ($AgentDetail['on_hook_agent'] == 'N') ? 'selected="selected"' : '';?>>N</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="on_hook_ring_time" class="col-sm-2 col-form-label">On-Hook Ring Time</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="on_hook_ring_time" id="on_hook_ring_time" class="form-control" value="<?php echo $AgentDetail['on_hook_ring_time'] ?>"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="extension_group" class="col-sm-2 col-form-label">Inbound Groups</label>
                                    <div class="col-sm-4">
                                      <?php
                                      foreach($inbound_groups as $inbound_group){
                                      ?>
                                      <input type="checkbox" name="closer_campaigns[]" id="closer_campaigns <?php echo $inbound_group['group_id'];?>" value="<?php echo $inbound_group['group_id'];?>" class="d-none" <?php echo (in_array($inbound_group['group_id'], $groups) ? 'checked' : ''); ?>>  <label for="closer_campaigns <?php echo $inbound_group['group_id'];?>"><?php echo $inbound_group['group_id'].' - '.$inbound_group['group_name'];?></label><br/>
                                      <?php
                                    } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <button class="btn btn-success btn-app pull-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>

    </section>
    <!-- /.content -->

</div>

<script>

    $(".AgentForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }else{
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
           }
         });


});
</script>
<?php } ?>