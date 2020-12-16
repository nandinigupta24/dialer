<div class="modal fade" id="modal-default" style="overflow:hidden;">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-md">
            <div class="modal-header" style="background-color:#4eb598;color:#fff">
                <h4 class="modal-title"><i class="fa fa-search"></i> Search</h4>
                <!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>-->
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>Campaign Selection </label>
                        <select class="form-control select2" id="Campaign-Selection" name='groups[]' multiple="multiple" data-placeholder="Select a Campaign" style="width: 100%;">
                            <?php
    for($o=0;$o<=$groups_to_print;$o++)
	{
	if (preg_match("/\|$LISTgroups[$o]\|/",$group_string)) 
		{
            echo "<option selected value='$LISTgroups[$o]'>$LISTgroups[$o] - $LISTnames[$o]</option>";
                }else{
            echo "<option value='$LISTgroups[$o]'>$LISTgroups[$o] - $LISTnames[$o]</option>";
                }
	}
        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>Group Selection </label>
                        <select class="form-control select2" id="Group-Selection" name='groupsuser_group_filter[]' multiple="multiple" data-placeholder="Select a Group" style="width: 100%;">
                            <?php 
                            
                            $o=0;
while ($o < $usergroups_to_print)
	{
	if (preg_match("/\|$usergroups[$o]\|/",$user_group_string))
		{echo "<option selected value='$usergroups[$o]'>$usergroups[$o] - $usergroupnames[$o]</option>";}
	else
		{
		if ( ($user_group_none > 0) and ($usergroups[$o] == 'ALL-GROUPS') )
			{echo "<option selected value='$usergroups[$o]'>$usergroups[$o] - $usergroupnames[$o]</option>";}
                 elseif($usergroups[$o] == $_SESSION['CurrentLogin']['user_group']){
                     echo "<option selected value='$usergroups[$o]'>$usergroups[$o] - $usergroupnames[$o]</option>";
                 }       
		else
			{echo "<option value='$usergroups[$o]'>$usergroups[$o] - $usergroupnames[$o]</option>";}
		}
	$o++;
	}
        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-success float-right" onclick="update_variables('form_submit','');">Search</button>
                <button type="button" class="btn btn-warning float-right CampaignAllSelection">All Campaigns</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
 
<div class="modal fade" id="monitor-modal" style="overflow:hidden;">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-md">
            <div class="modal-header bg-info">
                <h4 class="modal-title"><i class="fa fa-search"></i> Choose Report Display Options</h4>
                <!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>-->
            </div>
            <div class="modal-body">     
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>Monitor </label>
                        <select class="form-control" id="monitor_active_new" name='monitor_active_new' placeholder="Select a Monitor" required="">
                            <option value="">None</option>
                            <option value="MONITOR" <?php echo (!empty($_GET['monitor_active']) && $_GET['monitor_active'] =='MONITOR' )? 'selected="selected"':'';?>>Listen</option>
                            <option value="BARGE" <?php echo (!empty($_GET['monitor_active']) && $_GET['monitor_active'] =='BARGE' )? 'selected="selected"':'';?>>Take Over</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>Monitor Extension </label>
                        <input class="form-control" type="text" name="monitor_extension" id="monitor_extension" placeholder="" required="" value="<?php echo (!empty($_GET['monitor_phone'])) ? $_GET['monitor_phone'] : $_SESSION['CurrentLogin']['phone_login'];?>">
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label> Inbound </label>
                        <select class="form-control" id="with_inbound_new" name='with_inbound_new'>
                            <option value="N">No</option>
                            <option value="Y">Yes</option>
                            <option value="O">Only</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="CloseModal">Close</button>

                <button type="button" class="btn btn-success float-right" onclick="update_variables_monitor();">Save</button>
                <!--<button type="button" class="btn btn-warning float-right CampaignAllSelection">All Campaigns</button>-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>