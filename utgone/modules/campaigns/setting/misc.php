<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-circle-o-notch"></i></a> MISC Setting</h3>
    </div>
    <div class="box-body">

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_vdad_exten_btn">Enable AMD:</label>
                <div class="col-md-12">
                <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['campaign_vdad_exten'] == '8369') ? 'active' : ''; ?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="campaign_vdad_exten_btn_btn" data-val="<?php echo $CampaignDetail['campaign_vdad_exten_btn']; ?>" data-y="Y" data-n="" data-input="campaign_vdad_exten_btn" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_recording_btn">Record All Calls: <span class="text-danger" id="campaign_recording_btn_msg" style="display:none;">( This option is diabled due to start/stop recording )</span> </label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['campaign_recording'] == 'ALLFORCE') ? 'active' : ''; ?>" data-name="campaign_recording" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['view_calls_in_queue']; ?>" data-y="ALLFORCE" data-n="N"  id="campaign_recording_btn" data-input="campaign_recording" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden" class="manage-field" data-id="<?php #echo $CampaignDetail['campaign_id']; ?>" data-name="campaign_recording" id="campaign_recording" value="<?php echo $CampaignDetail['campaign_recording']; ?>">-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="start_stop_recording_btn">Enable Start/Stop Recording Of Calls: <span id="start_stop_recording_btn_msg" class="text-danger" style="display:none;">( This option is diabled due to Record All Calls )</span></label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch " <?php echo ($CampaignDetail['campaign_recording'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $CampaignDetail['start_stop_recording']; ?>" data-name="start_stop_recording" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-y="Y" data-n="N"   id="start_stop_recording_btn" data-input="start_stop_recording" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="start_stop_recording" id="start_stop_recording" value="0">-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="three_way_dial_prefix_btn">Record 3rd Leg Calls:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['three_way_dial_prefix'] == $CampaignDetail['dial_prefix']) ? 'active' : ''; ?>" data-name="three_way_dial_prefix" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['dial_prefix']; ?>" data-y="Y" data-n="N"  id="three_way_dial_prefix_btn" data-input="three_way_dial_prefix" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden" class="manage-field"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="three_way_dial_prefix" id="three_way_dial_prefix" value="<?php echo $CampaignDetail['three_way_dial_prefix']; ?>">-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="alt_number_dialing_btn">Alt Number Dial:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['alt_number_dialing'] == 'Y') ? 'active' : ''; ?>" data-name="alt_number_dialing" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['alt_number_dialing']; ?>" data-y="Y" data-n="N"   id="alt_number_dialing_btn" data-input="alt_number_dialing" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden" class="manage-field"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="alt_number_dialing" id="alt_number_dialing" value="<?php echo $CampaignDetail['alt_number_dialing']; ?>">-->
                </div>
            </div>
        </div>

<!--         <div class="form-group">
                 <label for="auto_alt_number_dial_btn">Auto Alt Number Dial:</label>
                 <button type="button" class="btn btn-sm btn-toggle btn-switch"  id="auto_alt_number_dial_btn" data-input="start_stop_recording" data-toggle="button" aria-pressed="true" autocomplete="off">
                                <div class="handle"></div>
            </button>
            <input type="hidden" name="auto_alt_number_dial" id="auto_alt_number_dial" value="0">
        </div>-->
         <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="auto_alt_number_dial_btn">Auto Alt Number Dial:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['auto_alt_dial'] == 'ALT_ONLY') ? 'active' : ''; ?>" data-name="auto_alt_dial" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['auto_alt_dial']; ?>" data-y="Y" data-n="N"   id="alt_number_dialing_btn" data-input="auto_alt_dial" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden" class="manage-field"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="alt_number_dialing" id="alt_number_dialing" value="<?php echo $CampaignDetail['alt_number_dialing']; ?>">-->
                </div>
            </div>
        </div>

        <?php
        $Arr_autost = array();
        if ($data->auto_alt_dial_statuses != '') {
            $st = preg_replace("/ -$/", "", $data->auto_alt_dial_statuses);
            $Arr_autost = explode(" ", $st);
        }

        $StatusCombined = $database->select('vicidial_status_combined',['status','status_name']);

        ?>

        <div class="form-group">
            <label>Auto Alt Dialing statuses</label>
            <select class="form-control manage-field-select select2" data-has="multi-select" data-name="auto_alt_dial_statuses" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="auto_alt_dial_statuses" style="width: 100%;" multiple="">
                <?php foreach ($StatusCombined as $groups) { ?>
                    <option value="<?php echo $groups['status']; ?>"  <?php echo in_array($groups['status'], $Arr_autost) ? 'selected' : ''; ?>><?php echo $groups['status_name']; ?></option>
                <?php } ?>

            </select>
        </div>

        <div class="form-group">
            <label>Manual Dial Filter</label>
            <select class="form-control select2 manage-field-select" data-name="manual_dial_filter" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="manual_dial_filter" style="width: 100%;">
                <option value="" <?php echo ($CampaignDetail['manual_dial_filter'] == '') ? 'selected' : ''; ?>>NONE</option>
                <option value="DNC_ONLY" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_ONLY') ? 'selected' : ''; ?>>DNC_ONLY</option>
                <option  value="CAMPLISTS_ONLY" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ONLY') ? 'selected' : ''; ?>>CAMPLISTS_ONLY</option>
                <option value="CAMPLISTS_ALL" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ALL') ? 'selected' : ''; ?>>CAMPLISTS_ALL</option>
                <option value="DNC_AND_CAMPLISTS" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS</option>
                <option value="DNC_AND_CAMPLISTS_ALL" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS_ALL') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS_ALL</option>
                <option value="DNC_ONLY_WITH_ALT" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_ONLY_WITH_ALT') ? 'selected' : ''; ?>>DNC_ONLY_WITH_ALT</option>
                <option value="CAMPLISTS_ONLY_WITH_ALT" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ONLY_WITH_ALT') ? 'selected' : ''; ?>>CAMPLISTS_ONLY_WITH_ALT</option>
                <option value="CAMPLISTS_ALL_WITH_ALT" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ALL_WITH_ALT') ? 'selected' : ''; ?>>CAMPLISTS_ALL_WITH_ALT</option>
                <option value="DNC_AND_CAMPLISTS_WITH_ALT" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS_WITH_ALT') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS_WITH_ALT</option>
                <option value="DNC_AND_CAMPLISTS_ALL_WITH_ALT" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS_ALL_WITH_ALT') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS_ALL_WITH_ALT</option>
                <option value="DNC_ONLY_WITH_ALT_ADDR3" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_ONLY_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>DNC_ONLY_WITH_ALT_ADDR3</option>
                <option value="CAMPLISTS_ONLY_WITH_ALT_ADDR3" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ONLY_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>CAMPLISTS_ONLY_WITH_ALT_ADDR3</option>
                <option value="CAMPLISTS_ALL_WITH_ALT_ADDR3" <?php echo ($CampaignDetail['manual_dial_filter'] == 'CAMPLISTS_ALL_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>CAMPLISTS_ALL_WITH_ALT_ADDR3</option>
                <option value="DNC_AND_CAMPLISTS_WITH_ALT_ADDR3" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS_WITH_ALT_ADDR3</option>
                <option value="DNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3" <?php echo ($CampaignDetail['manual_dial_filter'] == 'DNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>DNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3</option>

            </select>
        </div>

        <div class="form-group">
            <label>Manual Dial Search Filter</label>
            <select class="form-control select2  manage-field-select" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="manual_dial_search_filter" id="manual_dial_filter" style="width: 100%;">
                <option <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'NONE') ? 'selected' : ''; ?>>NONE</option>
                <option  <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ONLY') ? 'selected' : ''; ?>>CAMPLISTS_ONLY</option>
                <option  <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ALL') ? 'selected' : ''; ?>>CAMPLISTS_ALL</option>
                <option  <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ONLY_WITH_ALT') ? 'selected' : ''; ?>>CAMPLISTS_ONLY_WITH_ALT</option>
                <option  <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ALL_WITH_ALT') ? 'selected' : ''; ?>>CAMPLISTS_ALL_WITH_ALT</option>
                <option <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ONLY_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>CAMPLISTS_ONLY_WITH_ALT_ADDR3</option>
                <option  <?php echo ($CampaignDetail['manual_dial_search_filter'] == 'CAMPLISTS_ALL_WITH_ALT_ADDR3') ? 'selected' : ''; ?>>CAMPLISTS_ALL_WITH_ALT_ADDR3</option>
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="scheduled_callbacks_btn">Allow Callback:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['scheduled_callbacks'] == 'Y') ? 'active' : ''; ?>" data-name="scheduled_callbacks" id="scheduled_callbacks"  data-val="<?php echo $CampaignDetail['scheduled_callbacks']; ?>" data-y="Y" data-n="N"  id="scheduled_callbacks_btn" data-input="scheduled_callbacks" data-toggle="button" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Set Callback Times:</label>
            <div class="row">
                <div class="col-6">
                    <label>From:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control manage-field-text" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callbacks_time_start" id="callbacks_time_start" value="<?php echo $CampaignDetail['callbacks_time_start']; ?>">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <!-- Date mm/dd/yyyy -->
                    <label>To:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control manage-field-text" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callbacks_time_end" id="callbacks_time_end" value="<?php echo $CampaignDetail['callbacks_time_end']; ?>">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="CampaignName">Set Callback Email Address:</label>
            <input type="text" class="form-control manage-field" value="akumar@usethegeeks.com" id="callback_email" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callback_email" placeholder="Enter Callback Email Address">
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="agent_pause_codes_active_btn">Pause Codes:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['agent_pause_codes_active'] == 'Y') ? 'active' : ''; ?>"  data-val="<?php echo $CampaignDetail['agent_pause_codes_active']; ?>" data-y="Y" data-n="N" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="agent_pause_codes_active"  id="agent_pause_codes_active_btn" data-input="agent_pause_codes_active" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="allow_pause_in_ready_btn">Allow Pause While In Ready :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle btn-switch"  data-val="" data-y="Y" data-n="N"  id="allow_pause_in_ready_btn" data-input="allow_pause_in_ready" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <input type="hidden"  class="manage-field" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="allow_pause_in_ready" id="allow_pause_in_ready" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="use_internal_dnc_btn">Use System DNC List  :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['use_internal_dnc'] == 'Y') ? 'active' : ''; ?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $data['use_internal_dnc']; ?>" data-y="Y" data-n="N"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="use_internal_dnc" id="use_internal_dnc_btn" data-input="use_internal_dnc" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="use_campaign_dnc_btn">Use Campaign DNC List :</label>
                <div class=" col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['use_campaign_dnc']=='Y') ? 'active' : '';?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="use_campaign_dnc"  data-val="<?php echo $data['use_campaign_dnc']; ?>" data-y="Y" data-n="N"  id="use_campaign_dnc_btn" data-input="use_campaign_dnc" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="no_hopper_leads_logins_btn">No Queue Logins :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['no_hopper_leads_logins'] == 'Y') ? 'active' : ''; ?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="no_hopper_leads_logins" data-val="<?php echo $data['no_hopper_leads_logins']; ?>" data-y="Y" data-n="N"   id="no_hopper_leads_logins_btn" data-input="no_hopper_leads_logins" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_agent_call_logs_btn"> Hide Agent Call Logs :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['hide_agent_call_logs'] == 'Y') ? 'active' : ''; ?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="hide_agent_call_logs" data-val="<?php echo $CampaignDetail['hide_agent_call_logs']; ?>" data-y="Y" data-n="N" id="hide_agent_call_logs_btn" data-input="hide_agent_call_logs" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_customer_call_history_btn"> Hide Customer Call History :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle btn-switch <?php echo ($CampaignDetail['no_hopper_leads_logins'] == 'Y') ? 'active' : ''; ?>" data-name="campaign_vdad_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['no_hopper_leads_logins']; ?>" data-y="Y" data-n="N" id="hide_customer_call_history_btn" data-input=": hide_customer_call_history" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <input type="hidden" class="manage-field" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="hide_customer_call_history" id="hide_customer_call_history" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_list_info_btn"> Hide List Information :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle btn-switch "  data-val="" data-y="Y" data-n="N" id="hide_list_info_btn" data-input="hide_customer_call_history" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <input type="hidden" class="manage-field" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="hide_list_info" id="hide_list_info" value="">
                </div>
            </div>
        </div>
    </div><!--body-->
</div>
