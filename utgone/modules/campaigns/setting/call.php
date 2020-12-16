<!--- BOX tab inner-contant -- Call startgy-->
<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-phone"></i></a> Calling Strategy</h3>   
    </div>

    <div class="box-body">
        <div class="form-group">
            <label>Calling Method:</label>
            <select class="form-control manage-field-select" data-name="dial_method" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option value="RATIO" <?php echo ($CampaignDetail['dial_method'] == 'RATIO') ? 'selected' : ''; ?>>Auto Dial</option>
                <option value="INBOUND_MAN" <?php echo ($CampaignDetail['dial_method'] == 'INBOUND_MAN') ? 'selected' : ''; ?>>Inbound</option>
                <option value="MANUAL" <?php echo ($CampaignDetail['dial_method'] == 'MANUAL') ? 'selected' : ''; ?>>Manual Dial</option>
                <option value="ADAPT_TAPERED" <?php echo ($CampaignDetail['dial_method'] == 'ADAPT_TAPERED') ? 'selected' : ''; ?>>Predictive Dial</option>
            </select>  
        </div>

       <!-- <div class="form-group">
            <label>Dialing Statuses:</label>
            <select class="form-control select2 manage-field-d-status" data-name="dialing_statuses" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" multiple style="width: 100%;">
                <?php foreach ($vicidial_statuses as $each) { ?>
                    <option value="<?php echo $each['status']; ?>"><?php echo $each['status_name']; ?></option>
                <?php } ?>
            </select>  
        </div>-->
        <div class="form-group">
            <label for="dial_timeout">Calling timeout:</label> 
            <div class="row">
                <div class="col-md-10">
                    <div class="slidecontainer">  
                        <input type="range" min="15" max="60" step="1"  value="<?php echo $CampaignDetail['dial_timeout']; ?>" class="range-slider rangeSlide manage-field-select" data-name="dial_timeout" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="dial_timeout" name="dial_timeout" > 
                    </div> 
                </div>
                <div class="col-md-2">
                    <span id="span-dial_timeout"><?php echo $CampaignDetail['dial_timeout']; ?></span> seconds
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="drop_call_seconds">Drop timeout:</label> 
            <div class="row">
                <div class="col-md-10">
                    <div class="slidecontainer">  
                        <input type="range" min="0" max="2" step="0.1"  value="<?php echo $CampaignDetail['drop_call_seconds']; ?>" class="range-slider rangeSlide manage-field-select" data-name="drop_call_seconds" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="drop_call_seconds" name="drop_call_seconds" > 
                    </div> 
                </div>
                <div class="col-md-2">
                    <span id="span-drop_call_seconds"><?php echo $CampaignDetail['drop_call_seconds']; ?></span> seconds
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="drop_lockout_time">Drop Lockout (Hours):</label> 
            <div class="row">
                <div class="col-md-10">
                    <div class="slidecontainer">  
                        <input type="range" min="72" max="144" step="1"  value="<?php echo $CampaignDetail['drop_lockout_time']; ?>" class="range-slider rangeSlide manage-field-select" data-name="drop_lockout_time" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="drop_lockout_time" name="drop_lockout_time" > 
                    </div> 
                </div>
                <div class="col-md-2">
                    <span id="span-drop_lockout_time"><?php echo $CampaignDetail['drop_lockout_time']; ?></span> hours
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="manual_auto_next">Auto Manual Dial:</label> 
            <div class="row">
                <div class="col-md-10">
                    <div class="slidecontainer">  
                        <input type="range" min="0" max="60" step="1"  value="<?php echo $CampaignDetail['manual_auto_next']; ?>" class="range-slider rangeSlide manage-field-select" data-name="manual_auto_next" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="manual_auto_next" name="manual_auto_next" > 
                    </div> 
                </div>
                <div class="col-md-2">
                    <span id="span-manual_auto_next"><?php echo $CampaignDetail['manual_auto_next']; ?></span> seconds
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="list_order_mix_btn">Sql Dialing:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['list_order_mix'] == 'SQL') ? 'active' : ''; ?>" data-name="list_order_mix" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $data['list_order_mix']; ?>" data-y="SQL" data-n="DISABLED"   id="list_order_mix_btn" data-input="list_order_mix" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>  
                  
                </div>
            </div> 
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="agent_dial_owner_only_btn">Lead Owner Dialing:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle btn-switch  <?php echo ($CampaignDetail['agent_dial_owner_only'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $CampaignDetail['agent_dial_owner_only']; ?>" data-y="Y" data-n="N"   id="agent_dial_owner_only_btn" data-input="agent_dial_owner_only" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button> 
                    <input type="hidden" class="manage-field" data-name="agent_dial_owner_only" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="agent_dial_owner_only" id="agent_dial_owner_only" value="<?php echo $CampaignDetail['agent_dial_owner_only']; ?>"> 
                </div>
            </div>
        </div> 




        <div class="form-group">
            <label>Preview Dial Settings :</label>
            <select class="form-control manage-field-select" data-name="manual_preview_dial" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  style="width: 100%;"> 
                <option value="DISABLED" <?php echo ($CampaignDetail['manual_preview_dial'] == 'DISABLED') ? 'selected' : ''; ?>>DISABLED</option>
                <option value="PREVIEW_AND_SKIP"  <?php echo ($CampaignDetail['manual_preview_dial'] == 'PREVIEW_AND_SKIP') ? 'selected' : ''; ?>> PREVIEW_AND_SKIP</option>
                <option value="PREVIEW_ONLY"  <?php echo ($CampaignDetail['manual_preview_dial'] == 'PREVIEW_ONLY') ? 'selected' : ''; ?>>PREVIEW_ONLY</option>  
            </select> 
        </div>


        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_allow_inbound_btn">Allow inbound while previewing:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle btn-switch  <?php echo ($CampaignDetail['campaign_allow_inbound'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $CampaignDetail['campaign_allow_inbound']; ?>" data-y="Y" data-n="N"   id="campaign_allow_inbound_btn" data-input="campaign_allow_inbound" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button> 
                    <input type="hidden" class="manage-field" data-name="campaign_allow_inbound" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="campaign_allow_inbound" id="campaign_allow_inbound" value="<?php echo $CampaignDetail['campaign_allow_inbound']; ?>"> 
                </div>
            </div>
        </div> 



        <!-- innerbox-->
        <div class="box box-secondary Only-Agents" <?php echo (in_array($CampaignDetail['dial_method'],['MANUAL','INBOUND_MAN'])) ? 'style="display:none;"': '';?>>
            <div class="box-body">

                <div class="form-group"> 
                    <div class="row">
                        <label class="col-md-12" for="available_only_ratio_tally_btn">Allow Only agents:</label>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['available_only_ratio_tally'] == 'Y') ? 'active' : ''; ?>" data-name="available_only_ratio_tally"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="available_only_ratio_tally_btn" data-val="<?php echo $CampaignDetail['available_only_ratio_tally']; ?>" data-y="Y" data-n="N"   id="available_only_ratio_tally_btn" data-input="available_only_ratio_tally" data-toggle="button" aria-pressed="true" autocomplete="off">
                                <div class="handle"></div> 
                            </button>
                           
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <label>Allow Only Threshold:</label> 
                    <select class="form-control manage-field" data-name="available_only_tally_threshold"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                        <option value="DISABLED"  <?php echo ($data->available_only_tally_threshold == 'DISABLED') ? 'selected' : '' ?>>DISABLED</option>
                        <option value="LOGGED-IN_AGENTS" <?php echo ($data->available_only_tally_threshold == 'LOGGED-IN_AGENTS') ? 'selected' : '' ?>> LOGGED-IN_AGENTS</option>
                        <option value="NON-PAUSED_AGENTS" <?php echo ($data->available_only_tally_threshold == 'NON-PAUSED_AGENTS') ? 'selected' : '' ?>>NON-PAUSED_AGENTS</option>
                        <option value="WAITING_AGENTS" <?php echo ($data->available_only_tally_threshold == 'WAITING_AGENTS') ? 'selected' : '' ?>>WAITING_AGENTS</option>
                    </select> 
                </div>

                <div class="form-group">
                    <label for="use_auto_hopper_btn">Available Only Threshold Agents:</label>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="slidecontainer">  
                                <input type="range" min="0" max="50" step="1"  value="<?php echo $CampaignDetail['available_only_tally_threshold_agents']; ?>" class="range-slider rangeSlide manage-field-select" id="available_only_tally_threshold_agents" name="available_only_tally_threshold_agents" data-name="available_only_tally_threshold_agents" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"> 
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <span id="span-available_only_tally_threshold_agents"><?php echo $CampaignDetail['available_only_tally_threshold_agents']; ?></span>   
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="use_auto_hopper_btn">Drop Percentage Target:</label>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="slidecontainer">  
                                <input type="range" min="0" max="3" step="0.1"  value="<?php echo $CampaignDetail['adaptive_dropped_percentage']; ?>" class="range-slider rangeSlide manage-field-select" id="adaptive_dropped_percentage" name="adaptive_dropped_percentage" data-name="adaptive_dropped_percentage" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"> 
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <span id="span-adaptive_dropped_percentage"><?php echo $CampaignDetail['adaptive_dropped_percentage']; ?></span>   
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="use_auto_hopper_btn">Max Predictive Dial Level:</label>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="slidecontainer">  
                                <input type="range" min="0.1" max="10" step="0.1"  value="<?php echo $CampaignDetail['adaptive_maximum_level']; ?>" class="range-slider rangeSlide manage-field-select" id="adaptive_maximum_level" name="adaptive_maximum_level" data-name="adaptive_maximum_level" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"> 
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <span id="span-adaptive_maximum_level"><?php echo $CampaignDetail['adaptive_maximum_level']; ?></span>   
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label>Auto Dial Level Threshold:</label>
                    <select class="form-control manage-field-select" data-name="dial_level_threshold" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                        <option value="DISABLED"  <?php echo ($CampaignDetail['dial_level_threshold'] == 'DISABLED') ? 'selected' : ''; ?>>DISABLED</option>
                        <option value="LOGGED-IN_AGENTS" <?php echo ($CampaignDetail['dial_level_threshold'] == 'LOGGED-IN_AGENTS') ? 'selected' : ''; ?>> LOGGED-IN_AGENTS</option>
                        <option value="NON-PAUSED_AGENTS" <?php echo ($CampaignDetail['dial_level_threshold'] == 'NON-PAUSED_AGENTS') ? 'selected' : ''; ?>>NON-PAUSED_AGENTS</option>
                        <option value="WAITING_AGENTS" <?php echo ($CampaignDetail['dial_level_threshold'] == 'WAITING_AGENTS') ? 'selected' : ''; ?>>WAITING_AGENTS</option>
                    </select> 
                </div>


                <div class="form-group">
                    <label for="use_auto_hopper_btn">Auto Dial Level Threshold Agents:</label>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="slidecontainer">  
                                <input type="range" min="0" max="50" step="1"  value="<?php echo $CampaignDetail['dial_level_threshold_agents']; ?>" class="range-slider rangeSlide manage-field-select" id="dial_level_threshold_agents" name="dial_level_threshold_agents" data-name="dial_level_threshold_agents" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"> 
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <span id="span-dial_level_threshold_agents"><?php echo $CampaignDetail['dial_level_threshold_agents']; ?></span>    
                        </div>
                    </div>
                </div>


            </div><!--inner box  body-->
        </div>   <!-- innerbox-->

    </div>
</div> 
<!--- BOX tab inner-contant -- Call startgy--> 

