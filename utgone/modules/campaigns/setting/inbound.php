<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-arrow-down"></i></a>Inbound Settings</h3>   
    </div>
    <div class="box-body">
        <?php
        $InboundXFERgroups = array();
        if ($CampaignDetail['closer_campaigns'] != '') {
            $Inxfergrp = preg_replace("/ -$/", "", $CampaignDetail['closer_campaigns']);
            $InboundXFERgroups = explode(" ", $Inxfergrp);
        }
        $InboundGroup = $database->select('vicidial_inbound_groups',['group_id','group_name'],['active'=>'Y']);
        ?>
        <div class="form-group">
            <label>Allowed Inbound Groups </label>
            <select class="form-control select2 manage-field-select" data-has="multi-select" id="closer_campaigns" data-name="closer_campaigns"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;" multiple>
                <?php foreach ($InboundGroup as $groups) { ?>
                    <option value="<?php echo $groups['group_id']; ?>"  <?php echo in_array($groups['group_id'], $InboundXFERgroups) ? 'selected' : ''; ?>><?php echo $groups['group_name']; ?></option>
                <?php } ?>
            </select>      
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_allow_inbound_btn">Blended Campaign:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['campaign_allow_inbound'] == 'Y') ? 'active' : ''; ?>" data-name="campaign_allow_inbound"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  data-val="<?php echo $CampaignDetail['campaign_allow_inbound']; ?>" data-y="Y" data-n="N"  id="campaign_allow_inbound_btn" data-input="campaign_allow_inbound" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                   
                </div>
            </div> 
        </div>





        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="allow_closers_btn">Allow Closers (<span class="text-success">allow inbound only agents</span>):</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['allow_closers'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  data-name="allow_closers"  data-val="<?php echo $CampaignDetail['allow_closers']; ?>" data-y="Y" data-n="N" id="allow_closers_btn" data-input="allow_closers" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                   
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="inbound_queue_no_dial_btn">Inbound Queue No Dial 
                    (<span class="text-success">stops outbound calls while inbound has a queue_tab</span>):
                </label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['inbound_queue_no_dial'] == 'ALL_SERVERS') ? 'active' : ''; ?>" data-name="inbound_queue_no_dial" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"   data-val="<?php echo $CampaignDetail['inbound_queue_no_dial']; ?>" data-y="Y" data-n="N" id="inbound_queue_no_dial_btn" data-input="inbound_queue_no_dial" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label class="col-md-12" for="view_calls_in_queue_btn">View Queuing Inbound Calls
                (<span class="text-success"> enables agents to view inbound calls queuing in the agent interface</span>):
            </label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['view_calls_in_queue'] == 'ALL') ? 'active' : ''; ?>" data-name="view_calls_in_queue" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"   data-val="<?php echo $CampaignDetail['view_calls_in_queue']; ?>" data-y="Y" data-n="N" id="inbound_queue_no_dial_btn" data-input="view_calls_in_queue" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    
                </div>
<!--            <select class="form-control manage-field-select" data-name="view_calls_in_queue" data-id="<?php #echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option value="NONE"  <?php #echo ($CampaignDetail['view_calls_in_queue'] == 'NONE') ? 'selected' : ''; ?>>NONE</option>
                <option value="ALL" <?php #echo ($CampaignDetail['view_calls_in_queue'] == 'ALL') ? 'selected' : ''; ?>>ALL</option>
                <option value="1" <?php #echo ($CampaignDetail['view_calls_in_queue'] == '1') ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php #echo ($CampaignDetail['view_calls_in_queue'] == '2') ? 'selected' : ''; ?>>2</option>
                <option  value="3" <?php #echo ($CampaignDetail['view_calls_in_queue'] == '3') ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php #echo ($CampaignDetail['view_calls_in_queue'] == '4') ? 'selected' : ''; ?>>4</option>
                <option value="5" <?php #echo ($CampaignDetail['view_calls_in_queue'] == '5') ? 'selected' : ''; ?>>5</option>
            </select>-->
        </div>
        </div>    


        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="grab_calls_in_queue_btn">Grab Calls In Queue
                    (<span class="text-success">if view queuing inbound calls is enabled it allows the agents to select the inbound call to take</span>):
                </label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['grab_calls_in_queue'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $CampaignDetail['grab_calls_in_queue']; ?>" data-y="Y" data-n="N"  data-name="grab_calls_in_queue" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  id="grab_calls_in_queue_btn" data-input="grab_calls_in_queue" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                   
                </div>   
            </div> 
        </div>


    </div>
</div>