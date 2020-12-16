<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"> <i class="fa fa-circle-o-notch"></i> MISC Setting </span>
    </div>
    <div class="panel-body pn">

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
                <label class="col-md-12" for="campaign_recording_btn">Record All Calls: <span class="text-danger" id="campaign_recording_btn_msg" <?php echo ($CampaignDetail['campaign_recording'] == 'Y') ? '':'style="display:none;'?>">( This option is diabled due to start/stop recording )</span> </label>
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
                <label class="col-md-12"  for="start_stop_recording_btn">Enable Start/Stop Recording Of Calls: <span id="start_stop_recording_btn_msg" class="text-danger" <?php echo ($CampaignDetail['campaign_recording'] == 'ALLFORCE') ? '':'style="display:none;'?>">( This option is diabled due to Record All Calls )</span></label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch " <?php echo ($CampaignDetail['campaign_recording'] == 'ONDEMAND') ? 'active' : ''; ?>" data-val="<?php echo $CampaignDetail['campaign_recording']; ?>" data-name="start_stop_recording" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-y="Y" data-n="N"   id="start_stop_recording_btn" data-input="start_stop_recording" data-toggle="button" aria-pressed="true" autocomplete="off">
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
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['three_way_record_stop'] == "Y") ? 'active' : ''; ?>" data-name="hangup_xfer_record_start" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['dial_prefix']; ?>" data-y="Y" data-n="N"  id="three_way_dial_prefix_btn" data-input="three_way_dial_prefix" data-toggle="button" aria-pressed="true" autocomplete="off">
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
        $Arr_autost = explode(' ',$CampaignDetail['auto_alt_dial_statuses']);
//        if ($data['auto_alt_dial_statuses'] != '') {
//            $st = preg_replace("/ -$/", "", $data['auto_alt_dial_statuses']);
//            $Arr_autost = explode(" ", $st);
//        }

        $StatusCombined = $database->select('vicidial_campaign_statuses',['status','status_name'],['AND'=>['status[!]'=>'','campaign_id'=>NULL],'ORDER'=>['status_name'=>'ASC']]);

        ?>

        <div class="form-group">
            <label>Auto Alt Dialing statuses</label>
<!--            <select class="form-control manage-field-select select2" data-placeholder="Select Status" data-has="multi-select" data-name="auto_alt_dial_statuses" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="auto_alt_dial_statuses" style="width: 100%;" multiple="">
                <?php foreach ($StatusCombined as $groups) { ?>
                    <option value="<?php echo $groups['status']; ?>"  <?php echo in_array($groups['status'], $Arr_autost) ? 'selected' : ''; ?>><?php echo $groups['status'].' - '.$groups['status_name']; ?></option>
                <?php } ?>
            </select>-->

            <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#AutoALTDialing-Modal" style="margin-bottom:5px;" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i>
              </button>

            <div class="" id="AutoALTDialing-Listing">
                <?php foreach ($AllStatus as $each) { ?>
                    <?php if(in_array($each['status'], $Arr_autost)){?>
                <span class="badge badge-lg badge-primary AutoALTDialingListings" style="margin:5px;" data-text="<?php echo $each['status'].' - '.$each['status_name']; ?>"><?php echo $each['status'].' - '.$each['status_name']; ?></span>
                    <?php }?>
                <?php } ?>
            </div>

        </div>

        <div class="form-group">
            <label>Manual Dial Filter</label>
            <select class="form-control manage-field-select" data-name="manual_dial_filter" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="manual_dial_filter" style="width: 100%;">
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
            <select class="form-control  manage-field-select" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="manual_dial_search_filter" id="manual_dial_search_filter" style="width: 100%;">
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

        <div class="form-group CallBackSection" style="display:<?php echo ($CampaignDetail['scheduled_callbacks'] == 'Y') ? 'block' : 'none'; ?>">
        <!--<div class="form-group CallBackSection" style="display:none">-->
            <label>Set Callback Times:</label>

            <div class="row">
                <div class="col-6">
                    <label>From:</label>
                    <div class="bootstrap-timepicker1">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="time" class="form-control manage-field-text-change timepicker1" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callbacks_time_start" id="callbacks_time_start" value="<?php echo $CampaignDetail['callbacks_time_start']; ?>">
                    </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <!-- Date mm/dd/yyyy -->
                    <label>To:</label>
                    <div class="bootstrap-timepicker1">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="time" class="form-control manage-field-text-change timepicker1" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callbacks_time_end" id="callbacks_time_end" value="<?php echo $CampaignDetail['callbacks_time_end']; ?>">
                    </div>
                        </div>
                    <!-- /.input group -->
                </div>
            </div>

        </div>

<!--        <div class="form-group">
            <label for="CampaignName">Set Callback Email Address:</label>
            <input type="text" class="form-control manage-field" value="akumar@usethegeeks.com" id="callback_email" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="callback_email" placeholder="Enter Callback Email Address">
        </div>-->

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
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch btn-switch"  data-name="allow_pause_in_ready" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="" data-y="Y" data-n="N"  id="allow_pause_in_ready_btn" data-input="allow_pause_in_ready" data-toggle="button" aria-pressed="true" autocomplete="off">
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
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['use_internal_dnc'] == 'Y') ? 'active' : ''; ?>" data-name="use_internal_dnc" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $data['use_internal_dnc']; ?>" data-y="Y" data-n="N"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="use_internal_dnc" id="use_internal_dnc_btn" data-input="use_internal_dnc" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="use_campaign_dnc_btn">Use Campaign DNC List :</label>
                <div class=" col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['use_campaign_dnc']=='Y') ? 'active' : '';?>" data-name="use_campaign_dnc" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="use_campaign_dnc"  data-val="<?php echo $data['use_campaign_dnc']; ?>" data-y="Y" data-n="N"  id="use_campaign_dnc_btn" data-input="use_campaign_dnc" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="no_hopper_leads_logins_btn">No Queue Logins :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['no_hopper_leads_logins'] == 'Y') ? 'active' : ''; ?>" data-name="no_hopper_leads_logins" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="no_hopper_leads_logins" data-val="<?php echo $data['no_hopper_leads_logins']; ?>" data-y="Y" data-n="N"   id="no_hopper_leads_logins_btn" data-input="no_hopper_leads_logins" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_agent_call_logs_btn"> Hide Agent Call Logs :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['hide_agent_call_logs'] == 'Y') ? 'active' : ''; ?>" data-name="hide_agent_call_logs" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-name="hide_agent_call_logs" data-val="<?php echo $CampaignDetail['hide_agent_call_logs']; ?>" data-y="Y" data-n="N" id="hide_agent_call_logs_btn" data-input="hide_agent_call_logs" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_customer_call_history_btn"> Hide Customer Call History :</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['hide_customer_call_history'] == 'Y') ? 'active' : ''; ?>" data-name="hide_customer_call_history" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['hide_customer_call_history']; ?>" data-y="Y" data-n="N" id="hide_customer_call_history_btn" data-input=": hide_customer_call_history" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_list_info_btn">Enable Pause Code Expire Email Alert</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['allow_mail_expire_on_pause_code'] == 'Y') ? 'active' : ''; ?>"  data-name="allow_mail_expire_on_pause_code" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['hide_customer_call_history']; ?>" id="" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                </div>
                <div class="col-md-12 allow_mail_expire_on_pause_code"  <?php echo ($CampaignDetail['allow_mail_expire_on_pause_code'] == 'N') ? 'style="display:none;"' : 'style="margin-top: 10px;"'; ?>>
                    <input type="text" value="<?php echo $CampaignDetail['allow_pause_expire_mail_address']; ?>" data-name="allow_pause_expire_mail_address" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="allow_pause_expire_mail_address" class="form-control manage-field-text" placeholder="Enter Email Address Seperated by comma!!"/>
                    <p >For e.g - test@utgone.com,test2@utgone.com</p>
                </div>
            </div>
        </div>


<div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="hide_list_info_btn">DTMF Keypad</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['DTMF_keypad'] == 'Y') ? 'active' : ''; ?>"  data-name="DTMF_keypad" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['DTMF_keypad']; ?>" id="" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_tag">Tags</label>
                <div class="col-md-12">
                  <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['tags']) ? 'active' : ''; ?>"  data-name="tags" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['tags']; ?>" id="" data-toggle="button" aria-pressed="true" autocomplete="off">
                      <div class="handle"></div>
                  </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="campaign_call_timer">Call Timer</label>
                <div class="col-md-12">
                  <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['call_timer']) ? 'active' : ''; ?>"  data-name="call_timer" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['call_timer']; ?>" id="" data-toggle="button" aria-pressed="true" autocomplete="off">
                      <div class="handle"></div>
                  </button>
                </div>
            </div>
        </div>
    </div><!--body-->
</div>
