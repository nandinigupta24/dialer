<script language="Javascript">
	
	var needToConfirmExit = true;
	var MTvar;
	var NOW_TIME = '<?php echo $NOW_TIME ?>';
	var SQLdate = '<?php echo $NOW_TIME ?>';
	var StarTtimE = '<?php echo $StarTtimE ?>';
	var UnixTime = '<?php echo $StarTtimE ?>';
	var UnixTimeMS = 0;
	var JSseedTIME = <?php echo $JS_date  ?>;
	var t = new Date();
	t.setTime(JSseedTIME);
	var c = new Date();
	LCAe = new Array('','','','','','');
	LCAc = new Array('','','','','','');
	LCAt = new Array('','','','','','');
	LMAe = new Array('','','','','','');
	var CalL_XC_a_Dtmf = '<?php echo $xferconf_a_dtmf ?>';
	var CalL_XC_a_NuMber = '<?php echo $xferconf_a_number ?>';
	var CalL_XC_b_Dtmf = '<?php echo $xferconf_b_dtmf ?>';
	var CalL_XC_b_NuMber = '<?php echo $xferconf_b_number ?>';
	var CalL_XC_c_NuMber = '<?php echo $xferconf_c_number ?>';
	var CalL_XC_d_NuMber = '<?php echo $xferconf_d_number ?>';
	var CalL_XC_e_NuMber = '<?php echo $xferconf_e_number ?>';
	var VU_hotkeys_active = '<?php echo $VU_hotkeys_active ?>';
	var VU_agent_choose_ingroups = '<?php echo $VU_agent_choose_ingroups ?>';
	var VU_agent_choose_ingroups_DV = '';
	var agent_choose_territories = '<?php echo $VU_agent_choose_territories ?>';
	var agent_select_territories = '<?php echo $agent_select_territories ?>';
	var agent_choose_blended = '<?php echo $VU_agent_choose_blended ?>';
	var VU_closer_campaigns = '<?php echo $VU_closer_campaigns ?>';
	var CallBackDatETimE = '';
	var CallBackrecipient = '';
	var CallBackCommenTs = '';
	var CallBackLeadStatus = '';
	var DispoQMcsCODE = '';
	var scheduled_callbacks = '<?php echo $scheduled_callbacks ?>';
	var dispo_check_all_pause = '<?php echo $dispo_check_all_pause ?>';
	var api_check_all_pause = '<?php echo $api_check_all_pause ?>';
	VARgroup_alias_ids = new Array(<?php echo $VARgroup_alias_ids ?>);
	VARgroup_alias_names = new Array(<?php echo $VARgroup_alias_names ?>);
	VARcaller_id_numbers = new Array(<?php echo $VARcaller_id_numbers ?>);
	var VD_group_aliases_ct = '<?php echo $VD_group_aliases_ct ?>';
	var agent_allow_group_alias = '<?php echo $agent_allow_group_alias ?>';
	var default_group_alias = '<?php echo $default_group_alias ?>';
	var default_group_alias_cid = '<?php echo $default_group_alias_cid ?>';
	var active_group_alias = '';
	var agent_pause_codes_active = '<?php echo $agent_pause_codes_active ?>';
	VARpause_codes = new Array(<?php echo $VARpause_codes ?>);
	VARpause_code_names = new Array(<?php echo $VARpause_code_names ?>);
	VARpause_code_mgrapr = new Array(<?php echo $VARpause_code_mgrapr ?>);
	var VD_pause_codes_ct = '<?php echo $VD_pause_codes_ct ?>';
	VARpreset_names = new Array(<?php echo $VARpreset_names ?>);
	VARpreset_numbers = new Array(<?php echo $VARpreset_numbers ?>);
	VARpreset_dtmfs = new Array(<?php echo $VARpreset_dtmfs ?>);
	VARpreset_hide_numbers = new Array(<?php echo $VARpreset_hide_numbers ?>);
	var VD_preset_names_ct = '<?php echo $VD_preset_names_ct ?>';
	var status_group_statuses_data = '';
	var last_call_date = '';
	VARstatuses = new Array();
	VARstatusnames = new Array();
	VARSELstatuses = new Array();
	VARCBstatuses = new Array();
	VARMINstatuses = new Array();
	VARMAXstatuses = new Array();
	var VARCBstatusesLIST = '';
	var VD_statuses_ct = 0;
	var VARSELstatuses_ct = 0;
	gVARstatuses = new Array();
	gVARstatusnames = new Array();
	gVARSELstatuses = new Array();
	gVARCBstatuses = new Array();
	gVARMINstatuses = new Array();
	gVARMAXstatuses = new Array();
	var gVARCBstatusesLIST = '';
	var gVD_statuses_ct = 0;
	var gVARSELstatuses_ct = 0;
	sVARstatuses = new Array(<?php echo $VARstatuses ?>);
	sVARstatusnames = new Array(<?php echo $VARstatusnames ?>);
	sVARSELstatuses = new Array(<?php echo $VARSELstatuses ?>);
	sVARCBstatuses = new Array(<?php echo $VARCBstatuses ?>);
	sVARMINstatuses = new Array(<?php echo $VARMINstatuses ?>);
	sVARMAXstatuses = new Array(<?php echo $VARMAXstatuses ?>);
	var sVARCBstatusesLIST = '<?php echo $VARCBstatusesLIST ?>';
	var sVD_statuses_ct = '<?php echo $VD_statuses_ct ?>';
	var sVARSELstatuses_ct = '<?php echo $VARSELstatuses_ct ?>';
	cVARstatuses = new Array(<?php echo $cVARstatuses ?>);
	cVARstatusnames = new Array(<?php echo $cVARstatusnames ?>);
	cVARSELstatuses = new Array(<?php echo $cVARSELstatuses ?>);
	cVARCBstatuses = new Array(<?php echo $cVARCBstatuses ?>);
	cVARMINstatuses = new Array(<?php echo $cVARMINstatuses ?>);
	cVARMAXstatuses = new Array(<?php echo $cVARMAXstatuses ?>);
	var cVARCBstatusesLIST = '<?php echo $cVARCBstatusesLIST ?>';
	var cVD_statuses_ct = '<?php echo $VD_statuses_camp ?>';
	var cVARSELstatuses_ct = '<?php echo $cVARSELstatuses_ct ?>';
	VARingroups = new Array(<?php echo $VARingroups ?>);
	var INgroupCOUNT = '<?php echo $INgrpCT ?>';

	VARemailgroups = new Array(<?php echo $VARemailgroups ?>);
	// var EMAILgroupCOUNT = '<?php echo $EMAILgrpCT ?>';
	var EMAILgroupCOUNT = 0;
	var incomingEMAILgroups= new Array();

	VARchatgroups = new Array(<?php echo $VARchatgroups ?>);
	var CHATgroupCOUNT = 0;
	var incomingCHATgroups= new Array();

	VARphonegroups = new Array(<?php echo $VARphonegroups ?>);
	// var PHONEgroupCOUNT = '<?php echo $PHONEgrpCT ?>';
	var PHONEgroupCOUNT = 0;

	var VARingroup_handlers = new Array(<?php echo $VARingroup_handlers ?>);
	var QUEUEpadding=0;

	VARdialingroups = new Array(<?php echo $VARdialingroups ?>);
	var dialINgroupCOUNT = '<?php echo $dialINgrpCT ?>';
	VARterritories = new Array(<?php echo $VARterritories ?>);
	var territoryCOUNT = '<?php echo $territoryCT ?>';
	VARxfergroups = new Array(<?php echo $VARxfergroups ?>);
	VARxfergroupsnames = new Array(<?php echo $VARxfergroupsnames ?>);
	var XFgroupCOUNT = '<?php echo $XFgrpCT ?>';
	var default_xfer_group = '<?php echo $default_xfer_group ?>';
	var default_xfer_group_name = '<?php echo $default_xfer_group_name ?>';
	var LIVE_default_xfer_group = '<?php echo $default_xfer_group ?>';
	var HK_statuses_camp = '<?php echo $HK_statuses_camp ?>';
	HKhotkeys = new Array(<?php echo $HKhotkeys ?>);
	HKstatuses = new Array(<?php echo $HKstatuses ?>);
	HKstatusnames = new Array(<?php echo $HKstatusnames ?>);
	var hotkeys = new Array();
	<?php $h=0;
	while ($HK_statuses_camp > $h)
		{
		echo "hotkeys['$HKhotkey[$h]'] = \"$HKstatus[$h] ----- $HKstatus_name[$h]\";\n";
		$h++;
		}
	?>
	var HKdispo_display = 0;
	var HKdispo_submit = 0;
	var HKbutton_allowed = 1;
	var HKfinish = 0;
	var scriptnames = new Array();
	<?php $h=0;
	while ($MM_scripts > $h)
		{
		echo "scriptnames['$MMscriptid[$h]'] = \"$MMscriptname[$h]\";\n";
		$h++;
		}
	?>
	var view_scripts = '<?php echo $view_scripts ?>';
	var LOGfullname = '<?php echo $LOGfullname ?>';
	var LOGemail = '<?php echo $LOGemail ?>';
	var recLIST = '';
	var filename = '';
	var last_filename = '';
	var LCAcount = 0;
	var LMAcount = 0;
	var filedate = '<?php echo $FILE_TIME ?>';
	var agcDIR = '<?php echo $agcDIR ?>';
	var agcPAGE = '<?php echo $agcPAGE ?>';
	var extension = '<?php echo $extension ?>';
	var extension_xfer = '<?php echo $extension ?>';
	var dialplan_number = '<?php echo $dialplan_number ?>';
	var ext_context = '<?php echo $ext_context ?>';
	var login_context = '<?php echo $login_context ?>';
	var protocol = '<?php echo $protocol ?>';
	var agentchannel = '';
	var local_gmt ='<?php echo $local_gmt ?>';
	var server_ip = '<?php echo $server_ip ?>';
	var server_ip_dialstring = '<?php echo $server_ip_dialstring ?>';
	var asterisk_version = '<?php echo $asterisk_version ?>';
<?php
if ($enable_fast_refresh < 1) {echo "\tvar refresh_interval = 1000;\n";}
	else {echo "\tvar refresh_interval = $fast_refresh_rate;\n";}
?>
	var session_id = '<?php echo $session_id ?>';
	var VICIDiaL_closer_login_checked = 0;
	var VICIDiaL_closer_login_selected = 0;
	var VICIDiaL_pause_calling = 1;
	var CalLCID = '';
	var MDnextCID = '';
	var XDnextCID = '';
	var LasTCID = '';
	var lead_dial_number = '';
	var MD_channel_look = 0;
	var XD_channel_look = 0;
	var MDuniqueid = '';
	var MDchannel = '';
	var MD_ring_secondS = 0;
	var MDlogEPOCH = 0;
	var VD_live_customer_call = 0;
	var VD_live_call_secondS = 0;
	var XD_live_customer_call = 0;
	var XD_live_call_secondS = 0;
	var xfer_in_call = 0;
	var open_dispo_screen = 0;
	var AgentDispoing = 0;
	var logout_stop_timeouts = 0;
	var VICIDiaL_allow_closers = '<?php echo $VICIDiaL_allow_closers ?>';
	var VICIDiaL_closer_blended = '0';
	var VU_closer_default_blended = '<?php echo $VU_closer_default_blended ?>';
	var VDstop_rec_after_each_call = '<?php echo $VDstop_rec_after_each_call ?>';
	var phone_login = '<?php echo $phone_login ?>';
	var original_phone_login = '<?php echo $original_phone_login ?>';
	var phone_pass = '<?php echo $phone_pass ?>';
	var user = '<?php echo $VD_login ?>';
	var user_abb = '<?php echo $user_abb ?>';
	var pass = '<?php if (strlen($pass_hash)>12) {echo $pass_hash;} else {echo $VD_pass;} ?>';
	var orig_pass = '<?php echo $VD_pass ?>';
	var pass_hash = '<?php echo $pass_hash ?>';
	var campaign = '<?php echo $VD_campaign ?>';
	var group = '<?php echo $VD_campaign ?>';
	var VICIDiaL_web_form_address_enc = '<?php echo $VICIDiaL_web_form_address_enc ?>';
	var VICIDiaL_web_form_address = '<?php echo $VICIDiaL_web_form_address ?>';
	var VDIC_web_form_address = '<?php echo $VICIDiaL_web_form_address ?>';
	var VICIDiaL_web_form_address_two_enc = '<?php echo $VICIDiaL_web_form_address_two_enc ?>';
	var VICIDiaL_web_form_address_two = '<?php echo $VICIDiaL_web_form_address_two ?>';
	var VDIC_web_form_address_two = '<?php echo $VICIDiaL_web_form_address_two ?>';
	var VICIDiaL_web_form_address_three_enc = '<?php echo $VICIDiaL_web_form_address_three_enc ?>';
	var VICIDiaL_web_form_address_three = '<?php echo $VICIDiaL_web_form_address_three ?>';
	var VDIC_web_form_address_three = '<?php echo $VICIDiaL_web_form_address_three ?>';
	var CalL_ScripT_id = '';
	var CalL_ScripT_color = '';
	var CalL_AutO_LauncH = '';
	var panel_bgcolor = '<?php echo $MAIN_COLOR ?>';
	var CusTCB_bgcolor = '#FFFF66';
	var auto_dial_level = '<?php echo $auto_dial_level ?>';
	var starting_dial_level = '<?php echo $auto_dial_level ?>';
	var dial_timeout = '<?php echo $dial_timeout ?>';
	var manual_dial_timeout = '<?php echo $manual_dial_timeout ?>';
	var dial_prefix = '<?php echo $dial_prefix ?>';
	var manual_dial_prefix = '<?php echo $manual_dial_prefix ?>';
	var three_way_dial_prefix = '<?php echo $three_way_dial_prefix ?>';
	var campaign_cid = '<?php echo $campaign_cid ?>';
	var use_custom_cid = '<?php echo $use_custom_cid ?>';
	var campaign_vdad_exten = '<?php echo $campaign_vdad_exten ?>';
	var campaign_leads_to_call = '<?php echo $campaign_leads_to_call ?>';
	var epoch_sec = <?php echo $StarTtimE ?>;
	var dtmf_send_extension = '<?php echo $dtmf_send_extension ?>';
	var recording_exten = '<?php echo $campaign_rec_exten ?>';
	var campaign_recording = '<?php echo $campaign_recording ?>';
	var campaign_rec_filename = '<?php echo $campaign_rec_filename ?>';
	var LIVE_campaign_recording = '<?php echo $campaign_recording ?>';
	var LIVE_campaign_rec_filename = '<?php echo $campaign_rec_filename ?>';
	var LIVE_default_group_alias = '<?php echo $default_group_alias ?>';
	var LIVE_caller_id_number = '<?php echo $default_group_alias_cid ?>';
	var LIVE_web_vars = '<?php echo $default_web_vars ?>';
	var default_web_vars = '<?php echo $default_web_vars ?>';
	var campaign_script = '<?php echo $campaign_script ?>';
	var get_call_launch = '<?php echo $get_call_launch ?>';
	var campaign_am_message_exten = '<?php echo $campaign_am_message_exten ?>';
	var park_on_extension = '<?php echo $VICIDiaL_park_on_extension ?>';
	var park_count=0;
	var customerparked=0;
	var customerparkedcounter=0;
	var check_n = 0;
	var conf_check_recheck = 0;
	var lastconf='';
	var lastcustchannel='';
	var lastcustserverip='';
	var lastxferchannel='';
	var custchannellive=0;
	var xferchannellive=0;
	var nochannelinsession=0;
	var agc_dial_prefix = '91';
	var dtmf_silent_prefix = '<?php echo $dtmf_silent_prefix ?>';
	var conf_silent_prefix = '<?php echo $conf_silent_prefix ?>';
	var menuheight = 30;
	var menuwidth = 30;
	var HTheight = '<?php echo $HTheight ?>px';
	var WRheight = '<?php echo $WRheight ?>px';
	var CAwidth = '<?php echo $CAwidth ?>px';
	var menufontsize = 8;
	var textareafontsize = 10;
	var check_s;
	var active_display = 1;
	var conf_channels_xtra_display = 0;
	var display_message = '';
	var web_form_vars = '';
	var Nactiveext;
	var Nbusytrunk;
	var Nbusyext;
	var extvalue = extension;
	var activeext_query;
	var busytrunk_query;
	var busyext_query;
	var busytrunkhangup_query;
	var busylocalhangup_query;
	var activeext_order='asc';
	var busytrunk_order='asc';
	var busyext_order='asc';
	var busytrunkhangup_order='asc';
	var busylocalhangup_order='asc';
	var xmlhttp=false;
	var XfeR_channel = '';
	var XDcheck = '';
	var agent_log_id = '<?php echo $agent_log_id ?>';
	var session_name = '<?php echo $session_name ?>';
	var AutoDialReady = 0;
	var AutoDialWaiting = 0;
	var fronter = '';
	var VDCL_group_id = '';
	var previous_dispo = '';
	var previous_called_count = '';
	var hot_keys_active = 0;
	var all_record = 'NO';
	var all_record_count = 0;
	var LeaDDispO = '';
	var LeaDPreVDispO = '';
	var AgaiNHanguPChanneL = '';
	var AgaiNHanguPServeR = '';
	var AgainCalLSecondS = '';
	var AgaiNCalLCID = '';
	var CB_count_check = 60;
	var callholdstatus = '<?php echo $callholdstatus ?>'
	var agentcallsstatus = '<?php echo $agentcallsstatus ?>'
	var campagentstatctmax = '<?php echo $campagentstatctmax ?>'
	var campagentstatct = '0';
	var manual_dial_in_progress = 0;
	var auto_dial_alt_dial = 0;
	var reselect_preview_dial = 0;
	var in_lead_preview_state = 0;
	var reselect_alt_dial = 0;
	var alt_dial_active = 0;
	var alt_dial_status_display = 0;
	var mdnLisT_id = '<?php echo $manual_dial_list_id ?>';
	var VU_vicidial_transfers = '<?php echo $VU_vicidial_transfers ?>';
	var agentonly_callbacks = '<?php echo $agentonly_callbacks ?>';
	var agentcall_manual = '<?php echo $agentcall_manual ?>';
	var manual_dial_preview = '<?php echo $manual_dial_preview ?>';
	var manual_preview_dial = '<?php echo $manual_preview_dial ?>';
	var starting_alt_phone_dialing = '<?php echo $alt_phone_dialing ?>';
	var alt_phone_dialing = '<?php echo $alt_phone_dialing ?>';
	var alt_number_dialing = '<?php echo $alt_number_dialing ?>';
	var timer_alt_seconds = '<?php echo $timer_alt_seconds ?>';
	var timer_alt_count=0;
	var timer_alt_trigger=0;
	var manual_auto_next = '<?php echo $manual_auto_next ?>';
	var manual_auto_next_count = '<?php echo $manual_auto_next ?>';
	var manual_auto_next_trigger=0;
	var manual_auto_show = '<?php echo $manual_auto_show ?>';
	var last_mdtype='';
	var DefaulTAlTDiaL = '<?php echo $DefaulTAlTDiaL ?>';
	var wrapup_seconds = '<?php echo $wrapup_seconds ?>';
	var wrapup_message = '<?php echo $wrapup_message ?>';
	var wrapup_counter = 0;
	var wrapup_waiting = 0;
	var wrapup_bypass = '<?php echo $wrapup_bypass ?>';
	var wrapup_after_hotkey = '<?php echo $wrapup_after_hotkey ?>';
	var use_internal_dnc = '<?php echo $use_internal_dnc ?>';
	var use_campaign_dnc = '<?php echo $use_campaign_dnc ?>';
	var three_way_call_cid = '<?php echo $three_way_call_cid ?>';
	var outbound_cid = '<?php echo $outbound_cid ?>';
	var threeway_cid = '';
	var cid_choice = '';
	var prefix_choice = '';
	var agent_dialed_number='';
	var agent_dialed_type='';
	var allcalls_delay = '<?php echo $allcalls_delay ?>';
	var omit_phone_code = '<?php echo $omit_phone_code ?>';
	var no_delete_sessions = '<?php echo $no_delete_sessions ?>';
	var webform_session = '<?php echo $webform_sessionname ?>';
	var local_consult_xfers = '<?php echo $local_consult_xfers ?>';
	var vicidial_agent_disable = '<?php echo $vicidial_agent_disable ?>';
	var CBentry_time = '';
	var CBcallback_time = '';
	var CBuser = '';
	var CBcomments = '';
	var volumecontrol_active = '<?php echo $volumecontrol_active ?>';
	var PauseCode_HTML = '';
	var manual_auto_hotkey = 0;
	var manual_auto_hotkey_wait = 0;
	var dialed_number = '';
	var dialed_label = '';
	var source_id = '';
	var entry_date = '';
	var adfREGentry_date = new RegExp("entry_date","g");
	var adfREGsource_id = new RegExp("source_id","g");
	var adfREGdate_of_birth = new RegExp("date_of_birth","g");
	var adfREGrank = new RegExp("rank","g");
	var adfREGowner = new RegExp("owner","g");
	var adfREGlast_local_call_time = new RegExp("last_local_call_time","g");
	var DispO3waychannel = '';
	var DispO3wayXtrAchannel = '';
	var DispO3wayCalLserverip = '';
	var DispO3wayCalLxfernumber = '';
	var DispO3wayCalLcamptail = '';
	var PausENotifYCounTer = 0;
	var RedirecTxFEr = 0;
	var phone_ip = '<?php echo $phone_ip ?>';
	var enable_sipsak_messages = '<?php echo $enable_sipsak_messages ?>';
	var allow_sipsak_messages = '<?php echo $allow_sipsak_messages ?>';
	var HidEMonitoRSessionS = '<?php echo $HidEMonitoRSessionS ?>';
	var LogouTKicKAlL = '<?php echo $LogouTKicKAlL ?>';
	var flag_channels = '<?php echo $flag_channels ?>';
	var flag_string = '<?php echo $flag_string ?>';
	var vdc_header_date_format = '<?php echo $vdc_header_date_format ?>';
	var vdc_customer_date_format = '<?php echo $vdc_customer_date_format ?>';
	var vdc_header_phone_format = '<?php echo $vdc_header_phone_format ?>';
	var disable_alter_custphone = '<?php echo $disable_alter_custphone ?>';
	var manual_dial_filter = '<?php echo $manual_dial_filter ?>';
	var manual_dial_search_filter = '<?php echo $manual_dial_search_filter ?>';
	var CopY_tO_ClipboarD = '<?php echo $CopY_tO_ClipboarD ?>';
	var inOUT = 'OUT';
	var useIE = '<?php echo $useIE ?>';
	var random = '<?php echo $random ?>';
	var threeway_end = 0;
	var agentphonelive = 0;
	var conf_dialed = 0;
	var leaving_threeway = 0;
	var blind_transfer = 0;
	var hangup_all_non_reserved = '<?php echo $hangup_all_non_reserved ?>';
	var dial_method = '<?php echo $dial_method ?>';
	var web_form_target = '<?php echo $web_form_target ?>';
	var TEMP_VDIC_web_form_address = '';
	var TEMP_VDIC_web_form_address_two = '';
	var TEMP_VDIC_web_form_address_three = '';
	var APIPausE_ID = '99999';
	var APIDiaL_ID = '99999';
	var CheckDEADcall = 0;
	var CheckDEADcallON = 0;
	var CheckDEADcallCOUNT = 0;
	var currently_in_email_or_chat = 0;
	var VtigeRLogiNScripT = '<?php echo $vtiger_screen_login ?>';
	var VtigeRurl = '<?php echo $vtiger_url ?>';
	var VtigeREnableD = '<?php echo $enable_vtiger_integration ?>';
	var alert_enabled = '<?php echo $VU_alert_enabled ?>';
	var allow_alerts = '<?php echo $VU_allow_alerts ?>';
	var shift_logout_flag = 0;
	var api_logout_flag = 0;
	var vtiger_callback_id = 0;
	var agent_status_view = '<?php echo $agent_status_view ?>';
	var agent_status_view_time = '<?php echo $agent_status_view_time ?>';
	var agent_status_view_active = 0;
	var xfer_select_agents_active = 0;
	var even=0;
	var VU_user_group = '<?php echo $VU_user_group ?>';
	var quick_transfer_button = '<?php echo $quick_transfer_button ?>';
	var quick_transfer_button_enabled = '<?php echo $quick_transfer_button_enabled ?>';
	var quick_transfer_button_orig = '';
	var quick_transfer_button_locked = '<?php echo $quick_transfer_button_locked ?>';
	var prepopulate_transfer_preset = '<?php echo $prepopulate_transfer_preset ?>';
	var prepopulate_transfer_preset_enabled = '<?php echo $prepopulate_transfer_preset_enabled ?>';
	var view_calls_in_queue = '<?php echo $view_calls_in_queue ?>';
	var view_calls_in_queue_launch = '<?php echo $view_calls_in_queue_launch ?>';
	var view_calls_in_queue_active = '<?php echo $view_calls_in_queue_launch ?>';
	var call_requeue_button = '<?php echo $call_requeue_button ?>';
	var no_hopper_dialing = '<?php echo $no_hopper_dialing ?>';
	var agent_dial_owner_only = '<?php echo $agent_dial_owner_only ?>';
	var agent_display_dialable_leads = '<?php echo $agent_display_dialable_leads ?>';
	var no_empty_session_warnings = '<?php echo $no_empty_session_warnings ?>';
	var script_width = '<?php echo $SDwidth ?>';
	var script_height = '<?php echo $SSheight ?>';
//	var enable_second_webform = '<?php echo $enable_second_webform ?>';
	var enable_second_webform = 0;
//	var enable_third_webform = '<?php echo $enable_third_webform ?>';
	var enable_third_webform = 0;
	var no_delete_VDAC=0;
	var manager_ingroups_set=0;
	var external_igb_set_name='';
	var recording_filename='';
	var recording_id='';
	var delayed_script_load='';
	var script_recording_delay='';
	var VDRP_stage='PAUSED';
	var VDRP_stage_seconds=0;
	var VU_custom_one = '<?php echo $VU_custom_one ?>';
	var VU_custom_two = '<?php echo $VU_custom_two ?>';
	var VU_custom_three = '<?php echo $VU_custom_three ?>';
	var VU_custom_four = '<?php echo $VU_custom_four ?>';
	var VU_custom_five = '<?php echo $VU_custom_five ?>';
	var crm_popup_login = '<?php echo $crm_popup_login ?>';
	var crm_login_address = '<?php echo $crm_login_address ?>';
	var update_fields=0;
	var update_fields_data='';
	var campaign_timer_action = '<?php echo $timer_action ?>';
	var campaign_timer_action_message = '<?php echo $timer_action_message ?>';
	var campaign_timer_action_seconds = '<?php echo $timer_action_seconds ?>';
	var campaign_timer_action_destination = '<?php echo $timer_action_destination ?>';
	var timer_action='';
	var timer_action_message='';
	var timer_action_seconds='';
	var timer_action_destination = '';
	var is_webphone='<?php echo $is_webphone ?>';
	var WebPhonEurl='<?php echo $WebPhonEurl ?>';
	var pause_code_counter=1;
	var agent_call_log_view='<?php echo $agent_call_log_view ?>';
	var scheduled_callbacks_alert='<?php echo $scheduled_callbacks_alert ?>';
	var scheduled_callbacks_count='<?php echo $scheduled_callbacks_count ?>';
	var callback_days_limit='<?php echo $callback_days_limit ?>';
	var callback_active_limit='<?php echo $callback_active_limit ?>';
	var tmp_vicidial_id='';
	var agent_xfer_consultative='<?php echo $agent_xfer_consultative ?>';
	var agent_xfer_dial_override='<?php echo $agent_xfer_dial_override ?>';
	var agent_xfer_vm_transfer='<?php echo $agent_xfer_vm_transfer ?>';
	var agent_xfer_blind_transfer='<?php echo $agent_xfer_blind_transfer ?>';
	var agent_xfer_dial_with_customer='<?php echo $agent_xfer_dial_with_customer ?>';
	var agent_xfer_park_customer_dial='<?php echo $agent_xfer_park_customer_dial ?>';
	var agent_xfer_park_3way='<?php echo $agent_xfer_park_3way ?>';
	var EAphone_code='';
	var EAphone_number='';
	var EAalt_phone_notes='';
	var EAalt_phone_active='';
	var EAalt_phone_count='';
	var conf_check_attempts = '<?php echo $conf_check_attempts ?>';
	var conf_check_attempts_cleanup = '<?php echo ($conf_check_attempts + 2) ?>';
	var blind_monitor_warning='<?php echo $blind_monitor_warning ?>';
	var blind_monitor_message="<?php echo $blind_monitor_message ?>";
	var blind_monitor_filename='<?php echo $blind_monitor_filename ?>';
	var blind_monitoring_now=0;
	var blind_monitoring_now_trigger=0;
	var no_blind_monitors=0;
	var uniqueid_status_display='';
	var uniqueid_status_prefix='';
	var custom_call_id='';
	var api_dtmf='';
	var api_transferconf_function='';
	var api_transferconf_group='';
	var api_transferconf_number='';
	var api_transferconf_consultative='';
	var api_transferconf_override='';
	var api_transferconf_group_alias='';
	var api_transferconf_cid_number='';
	var api_parkcustomer='';
	var API_selected_xfergroup='';
	var API_selected_callmenu='';
	var custom_fields_enabled='<?php echo $custom_fields_enabled ?>';
	var form_contents_loaded=0;
	var email_enabled='<?php echo $email_enabled ?>';
	var chat_enabled='<?php echo $chat_enabled ?>';
	var chat_URL='<?php echo $chat_URL; ?>';
	var enable_xfer_presets='<?php echo $enable_xfer_presets ?>';
	var hide_xfer_number_to_dial='<?php echo $hide_xfer_number_to_dial ?>';
	var Presets_HTML='';
	var did_pattern='';
	var did_id='';
	var did_extension='';
	var did_description='';
	var did_custom_one='';
	var did_custom_two='';
	var did_custom_three='';
	var did_custom_four='';
	var did_custom_five='';
	var closecallid='';
	var xfercallid='';
	var custom_field_names='';
	var custom_field_values='';
	var custom_field_types='';
	var customer_3way_hangup_logging='<?php echo $customer_3way_hangup_logging ?>';
	var customer_3way_hangup_seconds='<?php echo $customer_3way_hangup_seconds ?>';
	var customer_3way_hangup_action='<?php echo $customer_3way_hangup_action ?>';
	var customer_3way_hangup_counter=0;
	var customer_3way_hangup_counter_trigger=0;
	var customer_3way_hangup_dispo_message='';
	var ivr_park_call='<?php echo $ivr_park_call ?>';
	var qm_phone='<?php echo $QM_PHONE ?>';
	var APIManualDialQueue=0;
	var APIManualDialQueue_last=0;
	var api_manual_dial='<?php echo $api_manual_dial ?>';
	var manual_dial_call_time_check='<?php echo $manual_dial_call_time_check ?>';
	var CloserSelecting=0;
	var TerritorySelecting=0;
	var WaitingForNextStep=0;
	var AllowManualQueueCalls='<?php echo $AllowManualQueueCalls ?>';
	var AllowManualQueueCallsChoice='<?php echo $AllowManualQueueCallsChoice ?>';
	var call_variables='';
	var focus_blur_enabled='<?php echo $focus_blur_enabled ?>';
	var CBlinkCONTENT='';
	var my_callback_option='<?php echo $my_callback_option ?>';
	var per_call_notes='<?php echo $per_call_notes ?>';
	var agent_lead_search='<?php echo $agent_lead_search ?>';
	var agent_lead_search_method='<?php echo $agent_lead_search_method ?>';
	var qm_phone_environment='<?php echo $qm_phone_environment ?>';
	var LastCallCID='';
	var LastCallbackCount=0;
	var LastCallbackViewed=0;
	var auto_pause_precall='<?php echo $auto_pause_precall ?>';
	var auto_pause_precall_code='<?php echo $auto_pause_precall_code ?>';
	var auto_resume_precall='<?php echo $auto_resume_precall ?>';
	var trigger_ready=0;
	var hide_gender='<?php echo $hide_gender ?>';
	var manual_dial_cid='<?php echo $manual_dial_cid ?>';
	var post_phone_time_diff_alert_message='';
	var custom_3way_button_transfer='<?php echo $custom_3way_button_transfer ?>';
	var custom_3way_button_transfer_enabled='<?php echo $custom_3way_button_transfer_enabled ?>';
	var custom_3way_button_transfer_park='<?php echo $custom_3way_button_transfer_park ?>';
	var custom_3way_button_transfer_view='<?php echo $custom_3way_button_transfer_view ?>';
	var custom_3way_button_transfer_contacts='<?php echo $custom_3way_button_transfer_contacts ?>';
	var waiting_on_dispo=0;
	var disable_dispo_screen='<?php echo $disable_dispo_screen ?>';
	var disable_dispo_status='<?php echo $disable_dispo_status ?>';
	var status_display_NAME='<?php echo $status_display_NAME ?>';
	var status_display_CALLID='<?php echo $status_display_CALLID ?>';
	var status_display_LEADID='<?php echo $status_display_LEADID ?>';
	var status_display_LISTID='<?php echo $status_display_LISTID ?>';
	var qm_extension='<?php echo $qm_extension ?>';
	var hide_dispo_list='<?php echo $hide_dispo_list ?>';
	var external_transferconf_count=0;
	var consult_custom_delay='<?php echo $consult_custom_delay ?>';
	var consult_custom_wait=0;
	var consult_custom_go=0;
	var consult_custom_sent=0;
	var in_group_dial='<?php echo $in_group_dial ?>';
	var in_group_dial_select='<?php echo $in_group_dial_select ?>';
	var in_group_dial_display='<?php echo $in_group_dial_display ?>';
	var active_ingroup_dial='';
	var nocall_dial_flag='DISABLED';
	var pause_after_next_call='<?php echo $pause_after_next_call ?>';
	var next_call_pause='<?php echo $pause_after_next_call ?>';
	var deactivated_old_session='<?php echo $vlaLIaffected_rows ?>';
	var owner_populate='<?php echo $owner_populate ?>';
	var qc_enabled='<?php echo $qc_enabled ?>';
	var inbound_lead_search=0;
	var VU_agent_choose_ingroups_skip_count=0;
	var mrglock_ig_select_ct='<?php echo $mrglock_ig_select_ct ?>';
	var agent_select_territories_skip_count=0;
	var last_recording_filename='';
	var dead_max='<?php echo $dead_max ?>';
	var dispo_max='<?php echo $dispo_max ?>';
	var pause_max='<?php echo $pause_max ?>';
	var dead_max_dispo='<?php echo $dead_max_dispo ?>';
	var dispo_max_dispo='<?php echo $dispo_max_dispo ?>';
	var dead_auto_dispo_count=0;
	var dead_auto_dispo_finish=0;
	var cid_lock=0;
	var UpdatESettingSChecK=0;
	var manual_dial_search_checkbox='<?php echo $manual_dial_search_checkbox ?>';
	var hide_call_log_info='<?php echo $hide_call_log_info ?>';
	var regWFS = new RegExp("FSCREEN","g");
	var regWMS = new RegExp("WUSCRIPT","g");
	var FSCREENup=0;
	var HKFSCREENup=0;
	var dial_next_failed=0;
	var xfer_agent_selected=0;
	var comments_all_tabs='<?php echo $comments_all_tabs ?>';
	var comments_dispo_screen='<?php echo $comments_dispo_screen ?>';
	var comments_callback_screen='<?php echo $comments_callback_screen ?>';
	var qc_comment_history='<?php echo $qc_comment_history ?>';
	var OtherTab='0';
	var show_previous_callback='<?php echo $show_previous_callback ?>';
	var clear_script='<?php echo $clear_script ?>';
	var parked_hangup='0';
	var api_transferconf_ID = '';
	var manual_dial_override_field='<?php echo $manual_dial_override_field ?>';
	var status_display_ingroup='<?php echo $status_display_ingroup ?>';
	var customer_gone_seconds='<?php echo $customer_gone_seconds_negative ?>';
	var updatedispo_resume_trigger='0';
	var button_click_log='<?php echo $NOW_TIME ?>-----LOGIN---|';
	var agent_display_fields='<?php echo $agent_display_fields ?>';
	var customer_sec='0';
	var allow_required_fields='<?php echo $allow_required_fields ?>';
	var DiaLControl_auto_HTML1 = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif") ?>\" border=\"0\" alt=\"You are paused\" /></a>";
	var DiaLControl_auto_HTML = "<a href=\"javascript:void(0);\" class=\"btn btn-success\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"> <i class=\"fa fa-play\"></i> </a>";
	var DiaLControl_auto_HTML_ready1 = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_active.gif") ?>\" border=\"0\" alt=\"You are active\" /></a>";
	var DiaLControl_auto_HTML_ready = "<a href=\"javascript:void(0);\" class=\"btn btn-success\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\"> <i class=\"fa fa-pause\"></i> </a>";
	var DiaLControl_auto_HTML_OFF = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif") ?>\" border=\"0\" alt=\"pause button disabled\" />";
    var DiaLControl_manual_HTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif") ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
	var image_loading = new Image();
		image_loading.src="<div class=\"preloader pl-size-xl\"><div class=\"spinner-layer\"><div class=\"circle-clipper left\"><div class=\"circle\"></div></div><div class=\"circle-clipper right\"><div class=\"circle\"></div></div></div></div>";
	var image_loading_done = new Image();
		image_loading_done.src="./images/<?php echo _QXZ("check.png") ?>";
	var image_blank = new Image();
		image_blank.src="./images/<?php echo _QXZ("blank.gif") ?>";
	var image_livecall_OFF = new Image();
		image_livecall_OFF.src="./images/<?php echo _QXZ("agc_live_call_OFF.gif") ?>";
	var image_livecall_ON = new Image();
		image_livecall_ON.src="./images/<?php echo _QXZ("agc_live_call_ON.gif") ?>";
	var image_livecall_DEAD = new Image();
		image_livecall_DEAD.src="./images/<?php echo _QXZ("agc_live_call_DEAD.gif") ?>";
	var image_livechat_ON = new Image();
		image_livechat_ON.src="./images/<?php echo _QXZ("agc_live_chat_ON.gif") ?>";
	var image_livechat_DEAD = new Image();
		image_livechat_DEAD.src="./images/<?php echo _QXZ("agc_live_chat_DEAD.gif") ?>";
	var image_liveemail_ON = new Image();
		image_liveemail_ON.src="./images/<?php echo _QXZ("agc_live_email_ON.gif") ?>";
	var image_LB_dialnextnumber = new Image();
		image_LB_dialnextnumber.src="./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif") ?>";
	var image_LB_hangupcustomer = new Image();
		image_LB_hangupcustomer.src="./images/<?php echo _QXZ("vdc_LB_hangupcustomer.gif") ?>";
	var image_LB_transferconf = new Image();
		image_LB_transferconf.src="./images/<?php echo _QXZ("vdc_LB_transferconf.gif") ?>";
	var image_LB_grabparkedcall = new Image();
		image_LB_grabparkedcall.src="./images/<?php echo _QXZ("vdc_LB_grabparkedcall.gif") ?>";
	var image_LB_parkcall = new Image();
		image_LB_parkcall.src="./images/<?php echo _QXZ("vdc_LB_parkcall.gif") ?>";
	var image_LB_webform = new Image();
		image_LB_webform.src="./images/<?php echo _QXZ("vdc_LB_webform.gif") ?>";
	var image_LB_stoprecording = new Image();
		image_LB_stoprecording.src="./images/<?php echo _QXZ("vdc_LB_stoprecording.gif") ?>";
	var image_LB_startrecording = new Image();
		image_LB_startrecording.src="./images/<?php echo _QXZ("vdc_LB_startrecording.gif") ?>";
	var image_LB_paused = new Image();
		image_LB_paused.src="./images/<?php echo _QXZ("vdc_LB_paused.gif") ?>";
	var image_LB_active = new Image();
		image_LB_active.src="./images/<?php echo _QXZ("vdc_LB_active.gif") ?>";
	var image_LB_blank_OFF = new Image();
		image_LB_blank_OFF.src="./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif") ?>";

	var image_LB_senddtmf = new Image();
		image_LB_senddtmf.src="./images/<?php echo _QXZ("vdc_LB_senddtmf.gif") ?>";
	var image_LB_dialnextnumber_OFF = new Image();
		image_LB_dialnextnumber_OFF.src="./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif") ?>";
	var image_LB_hangupcustomer_OFF = new Image();
		image_LB_hangupcustomer_OFF.src="./images/<?php echo _QXZ("vdc_LB_hangupcustomer_OFF.gif") ?>";
	var image_LB_transferconf_OFF = new Image();
		image_LB_transferconf_OFF.src="./images/<?php echo _QXZ("vdc_LB_transferconf_OFF.gif") ?>";
	var image_LB_grabparkedcall_OFF = new Image();
		image_LB_grabparkedcall_OFF.src="./images/<?php echo _QXZ("vdc_LB_grabparkedcall_OFF.gif") ?>";
	var image_LB_parkcall_OFF = new Image();
		image_LB_parkcall_OFF.src="./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif") ?>";
	var image_LB_webform_OFF = new Image();
		image_LB_webform_OFF.src="./images/<?php echo _QXZ("vdc_LB_webform_OFF.gif") ?>";
	var image_LB_stoprecording_OFF = new Image();
		image_LB_stoprecording_OFF.src="./images/<?php echo _QXZ("vdc_LB_stoprecording_OFF.gif") ?>";
	var image_LB_startrecording_OFF = new Image();
		image_LB_startrecording_OFF.src="./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif") ?>";
	var image_LB_senddtmf_OFF = new Image();
		image_LB_senddtmf_OFF.src="./images/<?php echo _QXZ("vdc_LB_senddtmf_OFF.gif") ?>";
	var image_LB_ivrgrabparkedcall = new Image();
		image_LB_ivrgrabparkedcall.src="./images/<?php echo _QXZ("vdc_LB_grabivrparkcall.gif") ?>";
	var image_LB_ivrparkcall = new Image();
		image_LB_ivrparkcall.src="./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif") ?>";
	var image_XB_parkxferline_ON = new Image();
		image_XB_parkxferline_ON.src="./images/<?php echo _QXZ("vdc_XB_parkxferline_ON.gif") ?>";
	var image_XB_parkxferline_OFF = new Image();
		image_XB_parkxferline_OFF.src="./images/<?php echo _QXZ("vdc_XB_parkxferline_OFF.gif") ?>";
	var image_XB_parkxferline_GRAB = new Image();
		image_XB_parkxferline_GRAB.src="./images/<?php echo _QXZ("vdc_XB_parkxferline_GRAB.gif") ?>";
	var image_internal_chat_OFF = new Image();
		image_internal_chat_OFF.src="./images/<?php echo _QXZ("vdc_tab_chat_internal.gif") ?>";
	var image_internal_chat_ON = new Image();
		image_internal_chat_ON.src="./images/<?php echo _QXZ("vdc_tab_chat_internal_red.gif") ?>";
	var image_internal_chat_ALERT = new Image();
		image_internal_chat_ALERT.src="./images/<?php echo _QXZ("vdc_tab_chat_internal_blink.gif") ?>";
	var image_customer_chat_OFF = new Image();
		image_customer_chat_OFF.src="./images/<?php echo _QXZ("vdc_tab_chat_customer.gif") ?>";
	var image_customer_chat_ON = new Image();
		image_customer_chat_ON.src="./images/<?php echo _QXZ("vdc_tab_chat_customer_red.gif") ?>";
	var image_customer_chat_ALERT = new Image();
		image_customer_chat_ALERT.src="./images/<?php echo _QXZ("vdc_tab_chat_customer_blink.gif") ?>";
	var image_chat_alert_UNMUTE = new Image();
		image_chat_alert_UNMUTE.src="./images/<?php echo _QXZ("vdc_volume_UNMUTE.gif") ?>";
	var image_chat_alert_MUTE = new Image();
		image_chat_alert_MUTE.src="./images/<?php echo _QXZ("vdc_volume_MUTE.gif") ?>";

<?php
	if ($window_validation > 0)
		{
		echo "var win_valid_name = '$win_valid_name';\n";
		echo "var val_win_name = window.name;\n";
		echo "if (win_valid_name != val_win_name)\n";
		echo "\t{\n";
		echo "\tvar invalid_opener=1;\n";
		echo "\t}\n";
		echo "else\n";
		echo "\t{\n";
		echo "\tvar invalid_opener=0;\n";
		echo "\t}\n";
		}
	else
		{
		echo "\tvar invalid_opener=0;\n";
		}
?>
	window.name='vicidial_window';


// ################################################################################
// Present an alert if the user tried to leave the vicidial.php page without clicking log out
// onclick="needToConfirmExit = false;" will keep the alert from showing
	window.onbeforeunload = confirmExit;
	function confirmExit()
		{
		if (needToConfirmExit)
			{
			return "You are attempting to leave the agent screen without logging out. This may result in lost information. Are you sure you want to exit this page?";
			}
		}


// ################################################################################
// Send Hangup command for Live call connected to phone now to Manager
	function livehangup_send_hangup(taskvar) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----livehangup_send_hangup---" + taskvar + "|";
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "HLagcW" + epoch_sec + user_abb;
			var hangupvalue = taskvar;
			livehangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Hangup&format=text&channel=" + hangupvalue + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(livehangup_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
					alert_box(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		}

// ################################################################################
// Send volume control command for meetme participant
	function volume_control(taskdirection,taskvolchannel,taskagentmute) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----volume_control---" + taskdirection + " " + taskvolchannel + " " + taskagentmute + "|";
		if (taskagentmute=='AgenT')
			{
			taskvolchannel = agentchannel;
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "VCagcW" + epoch_sec + user_abb;
			var volchanvalue = taskvolchannel;
			livevolume_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=VolumeControl&format=text&channel=" + volchanvalue + "&stage=" + taskdirection + "&exten=" + session_id + "&ext_context=" + ext_context + "&queryCID=" + queryCID;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(livevolume_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if (taskagentmute=='AgenT')
			{
			if (taskdirection=='MUTING')
				{
//                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('UNMUTE','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_UNMUTE.gif") ?>\" border=\"0\" /></a>";
                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('UNMUTE','" + agentchannel + "','AgenT');return false;\" class=\"btn btn-success\"><i class='fa fa-microphone-slash'></i></a>";
				}
			else
				{
//                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_MUTE.gif") ?>\" border=\"0\" /></a>";
                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\" class=\"btn btn-success\"><i class='fa fa-microphone'></i></a>";
				}
			}

		}


// ################################################################################
// Send alert control command for agent
	function alert_control(taskalert) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----alert_control---" + taskalert + "|";
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			alert_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=AlertControl&format=text&stage=" + taskalert;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(alert_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if (taskalert=='ON')
			{
			alert_enabled = 'ON';
			document.getElementById("AgentAlertSpan").innerHTML = "<a href=\"#\" onclick=\"alert_control('OFF');return false;\"><?php echo _QXZ("Alert is ON") ?></a>";
			}
		else
			{
			alert_enabled = 'OFF';
			document.getElementById("AgentAlertSpan").innerHTML = "<a href=\"#\" onclick=\"alert_control('ON');return false;\"><?php echo _QXZ("Alert is OFF") ?></a>";
			}

		}


// ################################################################################
// custom button transfer 3way call
	function custom_button_transfer()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----custom_button_transfer---|";
		ShoWTransferMain('ON');
		if (custom_3way_button_transfer_contacts > 0)
			{
			generate_contacts_search();
			}
		else
			{
			if (custom_3way_button_transfer_view > 0)
				{
				generate_presets_pulldown();
				}
			else
				{
				if ( (custom_3way_button_transfer == 'PRESET_1') || (custom_3way_button_transfer == 'PARK_PRESET_1') )
					{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
				if ( (custom_3way_button_transfer == 'PRESET_2') || (custom_3way_button_transfer == 'PARK_PRESET_2') )
					{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
				if ( (custom_3way_button_transfer == 'PRESET_3') || (custom_3way_button_transfer == 'PARK_PRESET_3') )
					{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
				if ( (custom_3way_button_transfer == 'PRESET_4') || (custom_3way_button_transfer == 'PARK_PRESET_4') )
					{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
				if ( (custom_3way_button_transfer == 'PRESET_5') || (custom_3way_button_transfer == 'PARK_PRESET_5') )
					{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
				if ( (custom_3way_button_transfer == 'FIELD_address3') || (custom_3way_button_transfer == 'PARK_FIELD_address3') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.address3.value;}
				if ( (custom_3way_button_transfer == 'FIELD_province') || (custom_3way_button_transfer == 'PARK_FIELD_province') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.province.value;}
				if ( (custom_3way_button_transfer == 'FIELD_security_phrase') || (custom_3way_button_transfer == 'PARK_FIELD_security_phrase') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.security_phrase.value;}
				if ( (custom_3way_button_transfer == 'FIELD_vendor_lead_code') || (custom_3way_button_transfer == 'PARK_FIELD_vendor_lead_code') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.vendor_lead_code.value;}
				if ( (custom_3way_button_transfer == 'FIELD_email') || (custom_3way_button_transfer == 'PARK_FIELD_email') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.email.value;}
				if ( (custom_3way_button_transfer == 'FIELD_owner') || (custom_3way_button_transfer == 'PARK_FIELD_owner') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.owner.value;}

				var temp_xfernumber = document.vicidial_form.xfernumber.value;
				if (temp_xfernumber.length < 3)
					{
					alert_box("Number to Dial invalid: " + temp_xfernumber);
					ShoWTransferMain('OFF','YES');
					}
				else
					{
					if (custom_3way_button_transfer_park > 0)
						{
						xfer_park_dial();
						}
					else
						{
						SendManualDial('YES');
						}
					}
				}
			}
		}

// ################################################################################
// park customer and place 3way call
	function xfer_park_dial(XPDclick)
		{
		if (XPDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----xfer_park_dial---|";}
		conf_dialed=1;

		mainxfer_send_redirect('ParK',lastcustchannel,lastcustserverip);

		SendManualDial('YES');
		}

// ################################################################################
// place 3way and customer into other conference and fake-hangup the lines
	function leave_3way_call(tempvarattempt,LTCclick)
		{
		if (LTCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----leave_3way_call---" + tempvarattempt + "|";}
		threeway_end=0;
		leaving_threeway=1;

		if (customerparked > 0)
			{
			mainxfer_send_redirect('FROMParK',lastcustchannel,lastcustserverip);
			}

		mainxfer_send_redirect('3WAY','','',tempvarattempt);

//		if (threeway_end == '0')
//			{
//			document.vicidial_form.xferchannel.value = '';
//			xfercall_send_hangup();
//
//			document.vicidial_form.callchannel.value = '';
//			document.vicidial_form.callserverip.value = '';
//			dialedcall_send_hangup();
//			}

		if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
		}

// ################################################################################
// filter manual dialstring and pass on to originate call
	function SendManualDial(taskFromConf,SMDclick)
		{
		conf_dialed=1;
		var sending_group_alias = 0;
		// Dial With Customer button
		if (taskFromConf == 'YES')
			{
			xfer_in_call=1;
			agent_dialed_number='1';
			agent_dialed_type='XFER_3WAY';

            document.getElementById("DialWithCustomer").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer_OFF.gif") ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" /></a>";

            document.getElementById("ParkCustomerDial").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial_OFF.gif") ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" /></a>";

			var manual_number = document.vicidial_form.xfernumber.value;
			var manual_number_hidden = document.vicidial_form.xfernumhidden.value;
			if ( (manual_number.length < 1) && (manual_number_hidden.length > 0) )
				{manual_number=manual_number_hidden;}
			var manual_string = manual_number.toString();
			var dial_conf_exten = session_id;
			threeway_cid = '';
			if (three_way_call_cid == 'CAMPAIGN')
				{threeway_cid = campaign_cid;}
			if (three_way_call_cid == 'AGENT_PHONE')
				{
				cid_lock=1;
				threeway_cid = outbound_cid;
				}
			if (three_way_call_cid == 'CUSTOMER')
				{
				cid_lock=1;
				threeway_cid = document.vicidial_form.phone_number.value;
				}
			if (three_way_call_cid == 'CUSTOM_CID')
				{threeway_cid = document.vicidial_form.security_phrase.value;}
			if (three_way_call_cid == 'AGENT_CHOOSE')
				{
				cid_lock=1;
				threeway_cid = cid_choice;
				if (active_group_alias.length > 1)
					{var sending_group_alias = 1;}
				}
			if (SMDclick=='YES')
				{button_click_log = button_click_log + "" + SQLdate + "-----SendManualDial---" + taskFromConf + "|" + agent_dialed_type + "|" + manual_string + "|" + three_way_call_cid + "|" + threeway_cid + "|";}
			}
		else
			{
			var manual_number = document.vicidial_form.xfernumber.value;
			var manual_string = manual_number.toString();
			var threeway_cid='1';
			if (manual_dial_cid == 'AGENT_PHONE')
				{
				cid_lock=1;
				threeway_cid = outbound_cid;
				}
			if (SMDclick=='YES')
				{button_click_log = button_click_log + "" + SQLdate + "-----SendManualDial---" + taskFromConf + "|" + agent_dialed_type + "|" + manual_string + "|" + manual_dial_cid + "|" + threeway_cid + "|";}
			}

		var regXFvars = new RegExp("XFER","g");
		if (manual_string.match(regXFvars))
			{
			var donothing=1;
			}
		else
			{
			if ( (document.vicidial_form.xferoverride.checked==false) || (manual_dial_override_field == 'DISABLED') )
				{
				if (three_way_dial_prefix == 'X') {var temp_dial_prefix = '';}
				else {var temp_dial_prefix = three_way_dial_prefix;}
				if (omit_phone_code == 'Y') {var temp_phone_code = '';}
				else {var temp_phone_code = document.vicidial_form.phone_code.value;}

				// append dial prefix if phone number is greater than 7 digits on non-AGENTDIRECT calls
				if ( (manual_string.length > 7) && (xfer_agent_selected < 1) )
					{manual_string = temp_dial_prefix + "" + temp_phone_code + "" + manual_string;}
				}
			else
				{agent_dialed_type='XFER_OVERRIDE';}
			// due to a bug in Asterisk, these call variables do not actually work
			call_variables = '__vendor_lead_code=' + document.vicidial_form.vendor_lead_code.value + ',__lead_id=' + document.vicidial_form.lead_id.value;
			}
		var sending_preset_name = document.vicidial_form.xfername.value;
		if (taskFromConf == 'YES')
			{
			// give extra time for custom fields to commit before consultative transfers
			if ( (document.vicidial_form.consultativexfer.checked==true) && (custom_fields_enabled > 0) && (consult_custom_delay > 0) )
				{
				if (consult_custom_wait >= consult_custom_delay)
					{
					consult_custom_go = 1;
					consult_custom_wait = 0;
					}
				else
					{
					CustomerData_update();
					consult_custom_wait++;
					consult_custom_sent++;
					}
				}
			else
				{
				consult_custom_go = 1;
				consult_custom_wait = 0;
				}

			if (consult_custom_go > 0)
				{
				basic_originate_call(manual_string,'NO','YES',dial_conf_exten,'NO',taskFromConf,threeway_cid,sending_group_alias,'',sending_preset_name,call_variables);
				}
			}
		else
			{basic_originate_call(manual_string,'NO','NO','','','',threeway_cid,sending_group_alias,sending_preset_name,call_variables);}

		MD_ring_secondS=0;
		}

// ################################################################################
// Send Originate command to manager to place a phone call
	function basic_originate_call(tasknum,taskprefix,taskreverse,taskdialvalue,tasknowait,taskconfxfer,taskcid,taskusegroupalias,taskalert,taskpresetname,taskvariables) 
		{
		if (taskalert == '1')
			{
			var TAqueryCID = tasknum;
			tasknum = '83047777777777';
			taskdialvalue = '7' + taskdialvalue;
			var alertquery = 'alertCID=1';
			}
		else
			{var alertquery = 'alertCID=0';}
		var usegroupalias=0;
		var consultativexfer_checked = 0;
		if (document.vicidial_form.consultativexfer.checked==true)
			{consultativexfer_checked = 1;}
		var regCXFvars = new RegExp("CXFER","g");
		var tasknum_string = tasknum.toString();
		if ( (tasknum_string.match(regCXFvars)) || (consultativexfer_checked > 0) )
			{
			if (tasknum_string.match(regCXFvars))
				{
				var Ctasknum = tasknum_string.replace(regCXFvars, '');
				if (Ctasknum.length < 2)
					{Ctasknum = '90009';}
				var agentdirect = '';
				}
			else
				{
				Ctasknum = '90009';
				var agentdirect = tasknum_string;
				}
			var XfeRSelecT = document.getElementById("XfeRGrouP");
			var XfeR_GrouP = XfeRSelecT.value;
			if (API_selected_xfergroup.length > 1)
				{var XfeR_GrouP = API_selected_xfergroup;}
			tasknum = Ctasknum + "*" + XfeR_GrouP + '*CXFER*' + document.vicidial_form.lead_id.value + '**' + dialed_number + '*' + user + '*' + agentdirect + '*' + VD_live_call_secondS + '*';

			if (consult_custom_sent < 1)
				{CustomerData_update();}
			}
		var regAXFvars = new RegExp("AXFER","g");
		if (tasknum_string.match(regAXFvars))
			{
			var Ctasknum = tasknum_string.replace(regAXFvars, '');
			if (Ctasknum.length < 2)
				{Ctasknum = '83009';}
			var closerxfercamptail = '_L';
			if (closerxfercamptail.length < 3)
				{closerxfercamptail = 'IVR';}
			tasknum = Ctasknum + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value + '*' + campaign + '*' + closerxfercamptail + '*' + user + '**' + VD_live_call_secondS + '*';

			if (consult_custom_sent < 1)
				{CustomerData_update();}
			}


		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			if (taskprefix == 'NO') {var call_prefix = '';}
			  else {var call_prefix = agc_dial_prefix;}

			if (prefix_choice.length > 0)
				{var call_prefix = prefix_choice;}

			if (taskreverse == 'YES')
				{
				if (taskdialvalue.length < 2)
					{var dialnum = dialplan_number;}
				else
					{var dialnum = taskdialvalue;}
				var call_prefix = '';
				var originatevalue = "Local/" + tasknum + "@" + ext_context;
				}
			  else 
				{
				var dialnum = tasknum;
				if ( (protocol == 'EXTERNAL') || (protocol == 'Local') )
					{
					var protodial = 'Local';
					var extendial = extension;
			//		var extendial = extension + "@" + ext_context;
					}
				else
					{
					var protodial = protocol;
					var extendial = extension;
					}
				var originatevalue = protodial + "/" + extendial;
				}

			var leadCID = document.vicidial_form.lead_id.value;
			var epochCID = epoch_sec;
			if (leadCID.length < 1)
				{leadCID = user_abb;}
			leadCID = set_length(leadCID,'10','left');
			epochCID = set_length(epochCID,'6','right');
			if (taskconfxfer == 'YES')
				{var queryCID = "DC" + epochCID + 'W' + leadCID + 'W';}
			else
				{var queryCID = "DV" + epochCID + 'W' + leadCID + 'W';}

	//		if (taskconfxfer == 'YES')
	//			{var queryCID = "DCagcW" + epoch_sec + user_abb;}
	//		else
	//			{var queryCID = "DVagcW" + epoch_sec + user_abb;}

			if (taskalert == '1')
				{
				queryCID = TAqueryCID;
				}

			if (cid_choice.length > 3) 
				{
				var call_cid = cid_choice;
				usegroupalias=1;
				}
			else 
				{
				if (taskcid.length > 3) 
					{var call_cid = taskcid;}
				else 
					{var call_cid = campaign_cid;}
				}

			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Originate&format=text&channel=" + originatevalue + "&queryCID=" + queryCID + "&exten=" + call_prefix + "" + dialnum + "&ext_context=" + ext_context + "&ext_priority=1&outbound_cid=" + call_cid + "&usegroupalias="+ usegroupalias + "&preset_name=" + taskpresetname + "&campaign=" + campaign + "&account=" + active_group_alias + "&agent_dialed_number=" + agent_dialed_number + "&agent_dialed_type=" + agent_dialed_type + "&lead_id=" + document.vicidial_form.lead_id.value + "&stage=" + CheckDEADcallON + "&" + alertquery + "&cid_lock=" + cid_lock + "&call_variables=" + taskvariables;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(VMCoriginate_query);
				//	alert(xmlhttp.responseText);

					var regBOerr = new RegExp("ERROR","g");
					var BOresponse = xmlhttp.responseText;
					if (BOresponse.match(regBOerr))
						{
						alert_box(BOresponse);
						}

					if ((taskdialvalue.length > 0) && (tasknowait != 'YES'))
						{
						XDnextCID = queryCID;
						MD_channel_look=1;
						XDcheck = 'YES';

                //      document.getElementById("HangupXferLine").innerHTML ="<a href=\"#\" onclick=\"xfercall_send_hangup();return false;\"><img src=\"./images/vdc_XB_hangupxferline.gif\" border=\"0\" alt=\"Hangup Xfer Line\" /></a>";
						}
					}
				}
			delete xmlhttp;
			active_group_alias='';
			cid_choice='';
			prefix_choice='';
			agent_dialed_number='';
			agent_dialed_type='';
		//	CalL_ScripT_id='';
		//	CalL_ScripT_color='';
			call_variables='';
			xfer_agent_selected=0;
			}
		}


// ################################################################################
// zero-pad numbers or chop them to get to the desired length
function set_length(SLnumber,SLlength_goal,SLdirection)
	{
	var SLnumber = SLnumber + '';
	var begin_point=0;
	var number_length = SLnumber.length;
	if (number_length > SLlength_goal)
		{
		if (SLdirection == 'right')
			{
			begin_point = (number_length - SLlength_goal);
			SLnumber = SLnumber.substr(begin_point,SLlength_goal);
			}
		else
			{
			SLnumber = SLnumber.substr(0,SLlength_goal);
			}
		}
//	alert(SLnumber + '|' + SLlength_goal + '|' + begin_point + '|' + SLdirection + '|' + SLnumber.length + '|' + number_length);
	var result = SLnumber + '';
	while(result.length < SLlength_goal)
		{
		result = "0" + result;
		}
	return result;
	}


// ################################################################################
// filter conf_dtmf send string and pass on to originate call
	function SendConfDTMF(taskconfdtmf,SDTclick)
		{
		if (SDTclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----SendConfDTMF---" + taskconfdtmf + "|";}
		var dtmf_number = document.vicidial_form.conf_dtmf.value;
//                alert(dtmf_number);
		var dtmf_string = dtmf_number.toString();
		var conf_dtmf_room = taskconfdtmf;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = dtmf_string;
			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=SysCIDdtmfOriginate&format=text&channel=" + dtmf_send_extension + "&queryCID=" + queryCID + "&exten=" + dtmf_silent_prefix + '' + conf_dtmf_room + "&ext_context=" + ext_context + "&ext_priority=1";
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
			//		alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		document.vicidial_form.conf_dtmf.value = '';
		}

// ################################################################################
// Check to see if there are any channels live in the agent's conference meetme room
	function check_for_conf_calls(taskconfnum,taskforce)
		{
		if (typeof(xmlhttprequestcheckconf) == "undefined") {
			//alert (xmlhttprequestcheckconf == xmlhttpSendConf);
			xmlhttprequestcheckconf_wait = 0;
			custchannellive--;
			if ( (agentcallsstatus == '1') || (callholdstatus == '1') )
				{
				campagentstatct++;
				if (campagentstatct > campagentstatctmax) 
					{
					campagentstatct=0;
					var campagentstdisp = 'YES';
					}
				else
					{
					var campagentstdisp = 'NO';
					}
				}
			else
				{
				var campagentstdisp = 'NO';
				}

			xmlhttprequestcheckconf=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttprequestcheckconf = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttprequestcheckconf = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttprequestcheckconf = false;
			  }
			 }
			@end @*/
			//alert ("1");
			if (!xmlhttprequestcheckconf && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckconf = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckconf) 
				{
				checkconf_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&client=vdc&conf_exten=" + taskconfnum + "&auto_dial_level=" + auto_dial_level + "&campagentstdisp=" + campagentstdisp + "&customer_chat_id=" + document.vicidial_form.customer_chat_id.value + "&live_call_seconds=" + VD_live_call_secondS +"&clicks=" + button_click_log;
				button_click_log='';
				xmlhttprequestcheckconf.open('POST', 'utg_conf_exten_check.php'); 
				xmlhttprequestcheckconf.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckconf.send(checkconf_query); 
				xmlhttprequestcheckconf.onreadystatechange = function() 
					{
					if (xmlhttprequestcheckconf && xmlhttprequestcheckconf.readyState == 4 && xmlhttprequestcheckconf.status == 200) 
						{
						var check_conf = null;
						var LMAforce = taskforce;
						check_conf = xmlhttprequestcheckconf.responseText;
					//	alert(checkconf_query);
					//	alert(xmlhttprequestcheckconf.responseText);
						var check_ALL_array=check_conf.split("\n");
                                                
						var check_time_array=check_ALL_array[0].split("|");
//                                                console.log(check_time_array);
						var Time_array = check_time_array[1].split("UnixTime: ");
						 UnixTime = Time_array[1];
						 UnixTime = parseInt(UnixTime);
						 UnixTimeMS = (UnixTime * 1000);
						t.setTime(UnixTimeMS);
						if ( (callholdstatus == '1') || (agentcallsstatus == '1') || (vicidial_agent_disable != 'NOT_ACTIVE') )
							{
							var Alogin_array = check_time_array[2].split("Logged-in: ");
							var AGLogiN = Alogin_array[1];
							var CamPCalLs_array = check_time_array[3].split("CampCalls: ");
							var CamPCalLs = CamPCalLs_array[1];
							var DiaLCalLs_array = check_time_array[5].split("DiaLCalls: ");
							var DiaLCalLs = DiaLCalLs_array[1];
							var WaitinGChats_array = check_time_array[27].split("WaitinGChats: ");
							var WaitinGChats = WaitinGChats_array[1];
							var WaitinGEmails_array = check_time_array[28].split("WaitinGEmails: ");
							var WaitinGEmails = WaitinGEmails_array[1];
							if (AGLogiN != 'N')
								{
								document.getElementById("AgentStatusStatus").innerHTML = AGLogiN;
								}
							if (CamPCalLs != 'N')
								{
								document.getElementById("AgentStatusCalls").innerHTML = CamPCalLs;
                                                                if(CamPCalLs > 0){
                                                                    $.toast({
                                                                           heading: 'Call Queue Alert',
                                                                           text: 'You have '+CamPCalLs+' call in queue.',
                                                                           position: 'top-right',
                                                                           loaderBg: '#ff6849',
                                                                           icon: 'warning',
                                                                           hideAfter: 3500,
                                                                           stack: 6
                                                                       });
                                                                    }
//                                                                });
//                                                                console.log(CamPCalLs);
								}
							if (DiaLCalLs != 'N')
								{
								document.getElementById("AgentStatusDiaLs").innerHTML = DiaLCalLs;
								}
							// Chat alert
							if (chat_enabled > 0)
								{
								if (WaitinGChats == 'Y')
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ALERT.src;
									}
								else if (WaitinGChats == 'C')
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ON.src;
									}
								else 
									{
									document.images['CustomerChatImg'].src=image_customer_chat_OFF.src;
									}
								}
							// Email alert
							if (WaitinGEmails != 'N')
								{
								document.getElementById("AgentStatusEmails").innerHTML = WaitinGEmails;
								}
							if ( (AGLogiN == 'DEAD_VLA') && ( (vicidial_agent_disable == 'LIVE_AGENT') || (vicidial_agent_disable == 'ALL') ) )
								{
								showDiv('AgenTDisablEBoX');
								refresh_interval = 7300000;
								}
							if ( (AGLogiN == 'DEAD_EXTERNAL') && ( (vicidial_agent_disable == 'EXTERNAL') || (vicidial_agent_disable == 'ALL') ) )
								{
								showDiv('AgenTDisablEBoX');
								refresh_interval = 7300000;
								}
							if ( (AGLogiN == 'TIME_SYNC') && (vicidial_agent_disable == 'ALL') )
								{
								showDiv('SysteMDisablEBoX');
								}
							if (AGLogiN == 'SHIFT_LOGOUT')
								{
								shift_logout_flag=1;
								}
							if (AGLogiN == 'API_LOGOUT')
								{
								api_logout_flag=1;
								if ( (MD_channel_look < 1) && (VD_live_customer_call < 1) && (alt_dial_status_display < 1) )
									{LogouT('API','');}
								}
							}
						var VLAStatuS_array = check_time_array[4].split("Status: ");
						var VLAStatuS = VLAStatuS_array[1];
//                                                console.log(VLAStatuS);
                                                if(VLAStatuS != 'PAUSED'){
//                                                   clearInterval(MyCallTimer); 
                                                }        
						if ( (VLAStatuS == 'PAUSED') && (AutoDialWaiting == 1) )
							{
							if (PausENotifYCounTer > 10)
								{
								alert_box("<?php echo _QXZ("Your session has been paused"); ?>");
								AutoDial_ReSume_PauSe('VDADpause');
								PausENotifYCounTer=0;
								}
							else {PausENotifYCounTer++;}
							}
						else {PausENotifYCounTer=0;}
                                                
                                                <!--Icon SHOW & HIDE on Call Process-->
                                                <!--console.log(VLAStatuS);-->
                                                if(VLAStatuS == 'INCALL'){
                                                    $('#DTMF-Model').show();    
                                                    $('#HangupControl').show();    
                                                    $('#WebFormSpan').show();    
                                                    $('#XferControl').show();    
                                                    $('#CallPause').hide();    
                                                    $('#NextLead').hide();    
                                                    $('#ManualDial').hide();    
                                                    $('#InboundGroups').hide();    
                                                    $('#LogoutBTN').hide();
                                                    $('#StatsDetail-Area').hide();
                                                    $('#StatsDetail-LI').hide();
                                                    $('#LeadDetail-Area').show();
                                                    $('#LeadDetail-LI').show();
//                                                    $('#CallInformation-Modal').modal('show');
                                                }else{
//                                                    $('#DTMF-Model').hide();    
//                                                    $('#HangupControl').hide();    
//                                                    $('#WebFormSpan').hide();    
//                                                    $('#XferControl').hide();    
//                                                    $('#CallPause').show();    
//                                                    $('#NextLead').show();    
//                                                    $('#ManualDial').show();    
//                                                    $('#InboundGroups').show();    
//                                                    $('#LogoutBTN').show();
//                                                    $('#StatsDetail-Area').show();
//                                                    $('#StatsDetail-LI').show();
//                                                    $('#LeadDetail-Area').hide();
//                                                    $('#LeadDetail-LI').hide();
//                                                    $('#WebForm-Display').hide();
//                                                    $('#AgentWebFormView').hide();
//                                                    $('#AgentDetailView').show();
//                                                    $('#DispoModal').hide();
                                                }

						var APIHanguP_array = check_time_array[6].split("APIHanguP: ");
						var APIHanguP = APIHanguP_array[1];
						var APIStatuS_array = check_time_array[7].split("APIStatuS: ");
						var APIStatuS = APIStatuS_array[1];
						var APIPausE_array = check_time_array[8].split("APIPausE: ");
						var APIPausE = APIPausE_array[1];
						var APIDiaL_array = check_time_array[9].split("APIDiaL: ");
						var APIDiaL = APIDiaL_array[1];
						var APIManualDialQueue_array = check_time_array[24].split("APIManualDialQueue: ");
						APIManualDialQueue = APIManualDialQueue_array[1];
						var CheckDEADcall_array = check_time_array[10].split("DEADcall: ");
						CheckDEADcall = CheckDEADcall_array[1];
						var InGroupChange_array = check_time_array[11].split("InGroupChange: ");
						var InGroupChange = InGroupChange_array[1];
						var InGroupChangeBlend = check_time_array[12];
						var InGroupChangeUser = check_time_array[13];
						var InGroupChangeName = check_time_array[14];
						var APIFields_array = check_time_array[15].split("APIFields: ");
						update_fields = APIFields_array[1];
						var APIFieldsData_array = check_time_array[16].split("APIFieldsData: ");
						update_fields_data = APIFieldsData_array[1];
						var APITimerAction_array = check_time_array[17].split("APITimerAction: ");
						api_timer_action = APITimerAction_array[1];
						var APITimerMessage_array = check_time_array[18].split("APITimerMessage: ");
						api_timer_action_message = APITimerMessage_array[1];
						var APITimerSeconds_array = check_time_array[19].split("APITimerSeconds: ");
						api_timer_action_seconds = APITimerSeconds_array[1];
						var APITimerDestination_array = check_time_array[23].split("APITimerDestination: ");
						api_timer_action_destination = APITimerDestination_array[1];
						var APIRecording_array = check_time_array[25].split("APIRecording: ");
						var api_recording = APIRecording_array[1];
						var APIPauseCode_array = check_time_array[26].split("APIPaUseCodE: ");
						var api_pause_code = APIPauseCode_array[1];
						var APIdtmf_array = check_time_array[20].split("APIdtmf: ");
						api_dtmf = APIdtmf_array[1];
						var APItransfercond_array = check_time_array[21].split("APItransferconf: ");
						var api_transferconf_values_array = APItransfercond_array[1].split("---");
						api_transferconf_function = api_transferconf_values_array[0];
						api_transferconf_group = api_transferconf_values_array[1];
						api_transferconf_number = api_transferconf_values_array[2];
						api_transferconf_consultative = api_transferconf_values_array[3];
						api_transferconf_override = api_transferconf_values_array[4];
						api_transferconf_group_alias = api_transferconf_values_array[5];
						api_transferconf_cid_number = api_transferconf_values_array[6];
						var APIpark_array = check_time_array[22].split("APIpark: ");
						api_parkcustomer = APIpark_array[1];

						if (api_pause_code.length > 0)
							{
							if (VDRP_stage == 'PAUSED')
								{
								PauseCodeSelect_submit(api_pause_code);
								}
							}
						var regAPIrec = new RegExp("START","g");
						if (api_recording.match(regAPIrec))
							{
							var APIrec_append = api_recording;
							if (APIrec_append.length > 5)
								{APIrec_append = APIrec_append.replace(regAPIrec, '');}
							else
								{APIrec_append='';}

							conf_send_recording('MonitorConf', session_id,'','1', APIrec_append);
							}
						if (api_recording=='STOP')
							{
							conf_send_recording('StopMonitorConf', session_id, recording_filename,'1');
							}
						if (api_transferconf_function.length > 0)
							{
							if (api_transferconf_ID == api_transferconf_values_array[7])
								{
							//	alert("TRANSFERCONF COMMAND ALREADY RECEIVED: " + api_transferconf_function + "|" + api_transferconf_ID + "|" + api_transferconf_values_array[7] + "|" + external_transferconf_count);
								Clear_API_Field('external_transferconf');
								}
							else
								{
								api_transferconf_ID = api_transferconf_values_array[7];
								if (api_transferconf_function == 'HANGUP_XFER')
									{xfercall_send_hangup();}
								if (api_transferconf_function == 'HANGUP_BOTH')
									{bothcall_send_hangup();}
								if (api_transferconf_function == 'LEAVE_VM')
									{mainxfer_send_redirect('XfeRVMAIL',lastcustchannel,lastcustserverip);}
								if (api_transferconf_function == 'LEAVE_3WAY_CALL')
									{leave_3way_call('FIRST');}
								if (api_transferconf_function == 'BLIND_TRANSFER')
									{
									if (api_transferconf_override=='YES')
										{document.vicidial_form.xferoverride.checked=true;}
									if (api_transferconf_override=='NO')
										{document.vicidial_form.xferoverride.checked=false;}
									document.vicidial_form.xfernumber.value = api_transferconf_number;
									mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
									}
								if (external_transferconf_count < 1)
									{
									if (api_transferconf_function == 'LOCAL_CLOSER')
										{
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip);
										}
									if (api_transferconf_function == 'DIAL_WITH_CUSTOMER')
										{
										if (api_transferconf_consultative=='YES')
											{document.vicidial_form.consultativexfer.checked=true;}
										if (api_transferconf_consultative=='NO')
											{document.vicidial_form.consultativexfer.checked=false;}
										if (api_transferconf_override=='YES')
											{document.vicidial_form.xferoverride.checked=true;}
										if (api_transferconf_override=='NO')
											{document.vicidial_form.xferoverride.checked=false;}
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										active_group_alias = api_transferconf_group_alias;
										cid_choice = api_transferconf_cid_number;
										SendManualDial('YES');
										}
									if (api_transferconf_function == 'PARK_CUSTOMER_DIAL')
										{
										if (api_transferconf_consultative=='YES')
											{document.vicidial_form.consultativexfer.checked=true;}
										if (api_transferconf_consultative=='NO')
											{document.vicidial_form.consultativexfer.checked=false;}
										if (api_transferconf_override=='YES')
											{document.vicidial_form.xferoverride.checked=true;}
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										active_group_alias = api_transferconf_group_alias;
										cid_choice = api_transferconf_cid_number;
										xfer_park_dial();
										}
									external_transferconf_count=3;
									}
								Clear_API_Field('external_transferconf');
								}
							}
						if (api_parkcustomer == 'PARK_CUSTOMER')
							{mainxfer_send_redirect('ParK',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'GRAB_CUSTOMER')
							{mainxfer_send_redirect('FROMParK',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'PARK_IVR_CUSTOMER')
							{mainxfer_send_redirect('ParKivr',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'GRAB_IVR_CUSTOMER')
							{mainxfer_send_redirect('FROMParKivr',lastcustchannel,lastcustserverip);}
						if (api_dtmf.length > 0)
							{
							var REGdtmfPOUND = new RegExp("P","g");
							var REGdtmfSTAR = new RegExp("S","g");
							var REGdtmfQUIET = new RegExp("Q","g");
							api_dtmf = api_dtmf.replace(REGdtmfPOUND, '#');
							api_dtmf = api_dtmf.replace(REGdtmfSTAR, '*');
							api_dtmf = api_dtmf.replace(REGdtmfQUIET, ',');
							document.vicidial_form.conf_dtmf.value = api_dtmf;
							SendConfDTMF(session_id);
							}

						if (api_timer_action.length > 2)
							{
							timer_action = api_timer_action;
							timer_action_message = api_timer_action_message;
							timer_action_seconds = api_timer_action_seconds;
							timer_action_destination = api_timer_action_destination;
						//	alert("TIMER_API:" + timer_action + '|' + timer_action_message + '|' + timer_action_seconds + '|' + timer_action_destination + '|');
							}
						if ( (APIHanguP==1) && ( (VD_live_customer_call==1) || (MD_channel_look==1) ) )
							{
							hideDiv('CustomerGoneBox');
							WaitingForNextStep=0;
							custchannellive=0;

							dialedcall_send_hangup();
							}
						if ( (APIStatuS.length < 1000) && (APIStatuS.length > 0) && (AgentDispoing > 1) && (APIStatuS != '::::::::::') )
							{
							var regCBmatch = new RegExp('!',"g");
							if (APIStatuS.match(regCBmatch))
								{
								var APIcbSTATUS_array = APIStatuS.split("!");
								var APIcbSTATUS =		APIcbSTATUS_array[0];
								var APIcbDATETIME =		APIcbSTATUS_array[1];
								var APIcbTYPE =			APIcbSTATUS_array[2];
								var APIcbCOMMENTS =		APIcbSTATUS_array[3];
								var APIqmCScode =		APIcbSTATUS_array[4];

								if ( (APIcbDATETIME.length > 10) && (APIcbTYPE.length > 5) )
									{
									CallBackDatETimE =		APIcbDATETIME;
									CallBackrecipient =		APIcbTYPE;
									CallBackLeadStatus =	APIcbSTATUS;
									CallBackCommenTs =		APIcbCOMMENTS;
									hideDiv('CallBackSelectBox');
									document.vicidial_form.DispoSelection.value = 'CBHOLD';
									}
								else
									{document.vicidial_form.DispoSelection.value = APIcbSTATUS;}
								if (APIqmCScode.length > 0)
									{
									DispoQMcsCODE =			APIqmCScode;
									}
								// ZZZZZZZZZZZZZZZZZZZZZZZ API callback
							//	alert("CBdata: " + CallBackDatETimE + "|" + CallBackrecipient + "|" + CallBackLeadStatus + "|" + CallBackCommenTs + "|" + DispoQMcsCODE + "|");
								DispoSelect_submit();
								}
							else
								{
								document.vicidial_form.DispoSelection.value = APIStatuS;
								DispoSelect_submit();
								}
							}
						if (APIPausE.length > 4)
							{
							var APIPausE_array = APIPausE.split("!");
							if (APIPausE_ID == APIPausE_array[1])
								{
							//	alert("PAUSE ALREADY RECEIVED");
								}
							else
								{
								APIPausE_ID = APIPausE_array[1];
								if (APIPausE_array[0]=='PAUSE')
									{
									if (VD_live_customer_call==1)
										{
										// set to pause on next dispo
										document.vicidial_form.DispoSelectStop.checked=true;
									//	alert("Setting dispo to PAUSE");
										}
									else
										{
										if (AutoDialReady==1)
											{
											if (auto_dial_level != '0')
												{
												AutoDialWaiting = 0;
												AutoDial_ReSume_PauSe("VDADpause");
												}
											VICIDiaL_pause_calling = 1;
											}
										}
									}
								if ( (APIPausE_array[0]=='RESUME') && (AutoDialReady < 1) && (auto_dial_level > 0) )
									{
									AutoDialWaiting = 1;
									AutoDial_ReSume_PauSe("VDADready");
									}
								}
							}
						if ( (APIDiaL.length > 9) && (AllowManualQueueCalls == '0') )
							{
							APIManualDialQueue++;
							}
						if (APIManualDialQueue != APIManualDialQueue_last)
							{
							APIManualDialQueue_last = APIManualDialQueue;
                            document.getElementById("ManualQueueNotice").innerHTML = "<b><font color=\"red\" size=\"3\"><?php echo _QXZ("Manual Queue:"); ?> " + APIManualDialQueue + "</font></b><br>";
							}
						if ( (APIDiaL.length > 9) && (WaitingForNextStep == '0') && (AllowManualQueueCalls == '1') && (check_n > 2) )
							{
							var APIDiaL_array_detail = APIDiaL.split("!");
							if (APIDiaL_ID == APIDiaL_array_detail[6])
								{
							//	alert("DiaL ALREADY RECEIVED: " + APIDiaL_ID + "|" + APIDiaL_array_detail[5]);
								}
							else
								{
								if (APIDiaL_array_detail[0] == 'MANUALNEXT')  // trigger Dial Next Number button
									{
									if (APIDiaL_array_detail[4] == 'YES')  // focus on vicidial agent screen
										{window.focus();   alert_box("<?php echo _QXZ("Placing call to next number"); ?>");}
									if (APIDiaL_array_detail[3] == 'YES')
										{document.vicidial_form.LeadPreview.checked=true;}
									if (APIDiaL_array_detail[3] == 'NO')
										{document.vicidial_form.LeadPreview.checked=false;}
									ManualDialNext('','','','','','0');
									}
								else
									{
									APIDiaL_ID = APIDiaL_array_detail[6];
									document.vicidial_form.MDDiaLCodE.value = APIDiaL_array_detail[1];
									document.vicidial_form.phone_code.value = APIDiaL_array_detail[1];
									document.vicidial_form.MDPhonENumbeR.value = APIDiaL_array_detail[0];
									document.vicidial_form.vendor_lead_code.value = APIDiaL_array_detail[5];
									prefix_choice = APIDiaL_array_detail[7];
									active_group_alias = APIDiaL_array_detail[8];
									cid_choice = APIDiaL_array_detail[9];
									vtiger_callback_id = APIDiaL_array_detail[10];
									document.vicidial_form.MDLeadID.value = APIDiaL_array_detail[11];
									document.vicidial_form.MDType.value = APIDiaL_array_detail[12];
									//	alert(APIDiaL_array_detail[1] + "-----" + APIDiaL + "-----" + document.vicidial_form.MDDiaLCodE.value + "-----" + document.vicidial_form.phone_code.value);

									if (APIDiaL_array_detail[2] == 'YES')  // lookup lead in system
										{document.vicidial_form.LeadLookuP.checked=true;}
									else
										{document.vicidial_form.LeadLookuP.checked=false;}
									if (APIDiaL_array_detail[4] == 'YES')  // focus on vicidial agent screen
										{window.focus();   alert_box("Placing call to:" + APIDiaL_array_detail[1] + " " + APIDiaL_array_detail[0]);}
									if (APIDiaL_array_detail[3] == 'NO')  // NO call preview
										{document.vicidial_form.LeadPreview.checked=false;}
									if (APIDiaL_array_detail[3] == 'YES')  // call preview
										{NeWManuaLDiaLCalLSubmiT('PREVIEW');}
									else
										{NeWManuaLDiaLCalLSubmiT('NOW');}
									}
								}
							}
						if ( (in_lead_preview_state==1) || (alt_dial_status_display==1) )
							{
							if ( (in_lead_preview_state==1) && (APIDiaL == 'SKIP') )
								{
								ManualDialSkip();
								}
							if (APIDiaL == 'DIALONLY')
								{
								ManualDialOnly('MaiNPhonE');
								}
							if (APIDiaL == 'ALTDIAL')
								{
								ManualDialOnly('ALTPhonE');
								}
							if (APIDiaL == 'ADR3DIAL')
								{
								ManualDialOnly('AddresS3');
								}
							if ( (alt_dial_status_display==1) && (APIDiaL == 'FINISH') )
								{
								ManualDialAltDonE();
								}
							}

						if ( (CheckDEADcall > 0) && (VD_live_customer_call==1) && (currently_in_email_or_chat < 1) )
							{
							if (CheckDEADcallON < 1)
								{
								if( document.images ) 
									{ document.images['livecall'].src = image_livecall_DEAD.src;}
								CheckDEADcallON=1;
								CheckDEADcallCOUNT++;
								customer_sec = VD_live_call_secondS;

								if ( (xfer_in_call > 0) && (customer_3way_hangup_logging=='ENABLED') )
									{
									customer_3way_hangup_counter_trigger=1;
									customer_3way_hangup_counter=1;
									}
								if (customerparked==1)
									{
									parked_hangup='1';
									}
								}
							}
						if ( (CheckDEADcall > 0) && (VD_live_customer_call==1) && (VD_live_call_secondS > 5) && ((CalL_AutO_LauncH == 'CHAT')) && (currently_in_email_or_chat > 0) )
							{
							if (CheckDEADcallON < 1)
								{
								if( document.images ) 
									{ document.images['livecall'].src = image_livechat_DEAD.src;}
								CheckDEADcallON=1;
								CheckDEADcallCOUNT++;
								customer_sec = VD_live_call_secondS;
								}
							}
						if (InGroupChange > 0)
							{
							var external_blended = InGroupChangeBlend;
							var external_igb_set_user = InGroupChangeUser;
							external_igb_set_name = InGroupChangeName;
							manager_ingroups_set=1;

							if ( (external_blended == '1') && (dial_method != 'INBOUND_MAN') )
								{VICIDiaL_closer_blended = '1';}

							if (external_blended == '0')
								{VICIDiaL_closer_blended = '0';}
							}

						var check_conf_array=check_ALL_array[1].split("|");
						var live_conf_calls = check_conf_array[0];
						var conf_chan_array = check_conf_array[1].split(" ~");
						if ( (conf_channels_xtra_display == 1) || (conf_channels_xtra_display == 0) )
							{
							if (live_conf_calls > 0)
								{
								var temp_blind_monitors=0;
								var loop_ct=0;
								var display_ct=0;
								var ARY_ct=0;
								var LMAalter=0;
								var LMAcontent_change=0;
								var LMAcontent_match=0;
								agentphonelive=0;
								var conv_start=-1;
                                var live_conf_HTML = "<font ><b><?php echo _QXZ("LIVE CALLS IN YOUR SESSION:"); ?></b></font><br><table class='table table-responsive table-striped'><tr ><td><font class=\"log_title\">#</font></td><td><font class=\"log_title\"><?php echo _QXZ("REMOTE CHANNEL"); ?></font></td><td><font class=\"log_title\"><?php echo _QXZ("HANGUP"); ?></font></td><td><font class=\"log_title\"><?php echo _QXZ("VOLUME"); ?></font></td></tr>";
								if ( (LMAcount > live_conf_calls)  || (LMAcount < live_conf_calls) || (LMAforce > 0))
									{
									LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
									LMAcount=0;   LMAcontent_change++;
									}
								while (loop_ct < live_conf_calls)
									{
									loop_ct++;
									loop_s = loop_ct.toString();
									if (loop_s.match(/1$|3$|5$|7$|9$/)) 
										{var row_color = '#DDDDFF';}
									else
										{var row_color = '#CCCCFF';}
									var conv_ct = (loop_ct + conv_start);
									var channelfieldA = conf_chan_array[conv_ct];
									var regXFcred = new RegExp(flag_string,"g");
									var regRNnolink = new RegExp('Local/5' + taskconfnum,"g")
									if ( (channelfieldA.match(regXFcred)) && (flag_channels>0) )
										{
										var chan_name_color = 'log_text_red';
										}
									else
										{
										var chan_name_color = 'log_text';
										}
									if ( (HidEMonitoRSessionS==1) && (channelfieldA.match(/ASTblind/)) )
										{
										var hide_channel=1;
										blind_monitoring_now++;
										temp_blind_monitors++;
										if (blind_monitoring_now==1)
											{blind_monitoring_now_trigger=1;}
										}
									else
										{
										display_ct++;
										if (channelfieldA.match(regRNnolink))
											{
											// do not show hangup or volume control links for recording channels
											live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\"><?php echo _QXZ("recording"); ?></font></td><td></td></tr>";
											}
										else
											{
											if (volumecontrol_active!=1)
												{
												live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\"><a href=\"#\" onclick=\"livehangup_send_hangup('" + channelfieldA + "');return false;\"><?php echo _QXZ("HANGUP"); ?></a></font></td><td></td></tr>";
												}
											else
												{
                                                live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\"><a href=\"#\" onclick=\"livehangup_send_hangup('" + channelfieldA + "');return false;\"><?php echo _QXZ("HANGUP"); ?></a></font></td><td><a href=\"#\" onclick=\"volume_control('UP','" + channelfieldA + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_up.gif") ?>\" border=\"0\" /></a> &nbsp; <a href=\"#\" onclick=\"volume_control('DOWN','" + channelfieldA + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_down.gif") ?>\" border=\"0\" /></a> &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"volume_control('MUTING','" + channelfieldA + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_MUTE.gif") ?>\" border=\"0\" /></a> &nbsp; <a href=\"#\" onclick=\"volume_control('UNMUTE','" + channelfieldA + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_UNMUTE.gif") ?>\" border=\"0\" /></a></td></tr>";
												}
											}
										}
				//		var debugspan = document.getElementById("debugbottomspan").innerHTML;

									if (channelfieldA == lastcustchannel) {custchannellive++;}
									else
										{
										if(customerparked == 1)
											{custchannellive++;}
										// allow for no customer hungup errors if call from another server
										if(server_ip == lastcustserverip)
											{var nothing='';}
										else
											{custchannellive++;}
										}

									if (volumecontrol_active > 0)
										{
										if ( (protocol != 'EXTERNAL') && (protocol != 'Local') )
											{
											var regAGNTchan = new RegExp(protocol + '/' + extension,"g");
											if  ( (channelfieldA.match(regAGNTchan)) && (agentchannel != channelfieldA) )
												{
												agentchannel = channelfieldA;

//                                                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_MUTE.gif") ?>\" border=\"0\" /></a>";
                                                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\" class=\"btn btn-success\"><i class='fa fa-microphone'></i></a>";
												}
											}
										else							
											{
											if (agentchannel.length < 3)
												{
												agentchannel = channelfieldA;

                                                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\" class=\"btn btn-success\"><i class='fa fa-microphone-slash'></i></a>";
												}
											}
							//			document.getElementById("agentchannelSPAN").innerHTML = agentchannel;
										}

                //      document.getElementById("debugbottomspan").innerHTML = debugspan + '<br>' + channelfieldA + '|' + lastcustchannel + '|' + custchannellive + '|' + LMAcontent_change + '|' + LMAalter;

									if (!LMAe[ARY_ct]) 
										{LMAe[ARY_ct] = channelfieldA;   LMAcontent_change++;  LMAalter++;}
									else
										{
										if (LMAe[ARY_ct].length < 1) 
											{LMAe[ARY_ct] = channelfieldA;   LMAcontent_change++;  LMAalter++;}
										else
											{
											if (LMAe[ARY_ct] == channelfieldA) {LMAcontent_match++;}
											 else {LMAcontent_change++;   LMAe[ARY_ct] = channelfieldA;}
											}
										}
									if (LMAalter > 0) {LMAcount++;}
									
									if (agentchannel == channelfieldA) {agentphonelive++;}

									ARY_ct++;
									}
		//	var debug_LMA = LMAcontent_match+"|"+LMAcontent_change+"|"+LMAcount+"|"+live_conf_calls+"|"+LMAe[0]+LMAe[1]+LMAe[2]+LMAe[3]+LMAe[4]+LMAe[5];
        //                          document.getElementById("confdebug").innerHTML = debug_LMA + "<br>";

								if (agentphonelive < 1) {agentchannel='';}

								live_conf_HTML = live_conf_HTML + "</table>";

								if (LMAcontent_change > 0)
									{
									if (conf_channels_xtra_display == 1)
										{document.getElementById("outboundcallsspan").innerHTML = live_conf_HTML;}
									}
								nochannelinsession=0;
                                                                $('#loading_intro').fadeOut('fast');
								if (temp_blind_monitors < 1)
									{
									no_blind_monitors++;
									if (no_blind_monitors > 2)
										{blind_monitoring_now=0;}
									}
								}
							else
								{
								LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
								LMAcount=0;
								if (conf_channels_xtra_display == 1)
									{
									if (document.getElementById("outboundcallsspan").innerHTML.length > 2)
										{
										document.getElementById("outboundcallsspan").innerHTML = '';
										}
									}
								custchannellive = -99;
								nochannelinsession++;

								no_blind_monitors++;
								if (no_blind_monitors > 2)
									{blind_monitoring_now=0;}
								}
							}
							delete xmlhttprequestcheckconf;
							xmlhttprequestcheckconf = undefined; 
						}
					else if (xmlhttprequestcheckconf && xmlhttprequestcheckconf.readyState == 4 && xmlhttprequestcheckconf.status != 200) 
						{
						// Cleanup  after AJAX Request returns error.
						// alert("Status: " + xmlhttprequestcheckconf.status);
						delete xmlhttprequestcheckconf;
						xmlhttprequestcheckconf = undefined;
						}
					}
				}
			}
		else 
			{
			if (xmlhttprequestcheckconf) 
				{
				xmlhttprequestcheckconf_wait++;
				if (xmlhttprequestcheckconf_wait >= conf_check_attempts) 
					{
					// Abort AJAX Request, due to timeout.
					// The handler must take care of cleanup.
					// alert("xmlhttprequestcheckconf: Abort (Wait > 3 sec)");
					xmlhttprequestcheckconf.abort();
					}
				}
			if (xmlhttprequestcheckconf_wait >= conf_check_attempts_cleanup) 
				{
				// In case the handler function fails to do cleanup, cleanup manually.
				xmlhttprequestcheckconf_wait = 0;
				delete xmlhttprequestcheckconf;
				xmlhttprequestcheckconf = undefined;
				}
			else 
				{
				xmlhttprequestcheckconf = undefined;
				}
			}
		}


// ################################################################################
// Send MonitorConf/StopMonitorConf command for recording of conferences
	function conf_send_recording(taskconfrectype,taskconfrec,taskconffile,taskfromapi,taskapiappend,CSRclick) 
		{
		if (CSRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----conf_send_recording---" + taskconfrectype + " " + taskconfrec + " " + taskconffile + " " + taskfromapi + " " + taskapiappend + "|";}
		if (inOUT == 'OUT')
			{
			tmp_vicidial_id = document.vicidial_form.uniqueid.value;
			}
		else
			{
			tmp_vicidial_id = 'IN';
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			if (taskconfrectype == 'MonitorConf')
				{
				var REGrecCLEANvlc = new RegExp(" ","g");
				var recVendorLeadCode = document.vicidial_form.vendor_lead_code.value;
				recVendorLeadCode = recVendorLeadCode.replace(REGrecCLEANvlc, '');
				var recLeadID = document.vicidial_form.lead_id.value;

				// 	var campaign_recording = '<?php echo $campaign_recording ?>';
				//	var campaign_rec_filename = '<?php echo $campaign_rec_filename ?>';
				//	CAMPAIGN CUSTPHONE FULLDATE TINYDATE EPOCH AGENT VENDORLEADCODE LEADID
				var REGrecCAMPAIGN = new RegExp("CAMPAIGN","g");
				var REGrecINGROUP = new RegExp("INGROUP","g");
				var REGrecCUSTPHONE = new RegExp("CUSTPHONE","g");
				var REGrecFULLDATE = new RegExp("FULLDATE","g");
				var REGrecTINYDATE = new RegExp("TINYDATE","g");
				var REGrecEPOCH = new RegExp("EPOCH","g");
				var REGrecAGENT = new RegExp("AGENT","g");
				var REGrecVENDORLEADCODE = new RegExp("VENDORLEADCODE","g");
				var REGrecLEADID = new RegExp("LEADID","g");
				var REGrecCALLID = new RegExp("CALLID","g");
				filename = LIVE_campaign_rec_filename + '' + taskapiappend;
				filename = filename.replace(REGrecCAMPAIGN, campaign);
				filename = filename.replace(REGrecINGROUP, VDCL_group_id);
				filename = filename.replace(REGrecCUSTPHONE, lead_dial_number);
				filename = filename.replace(REGrecFULLDATE, filedate);
				filename = filename.replace(REGrecTINYDATE, tinydate);
				filename = filename.replace(REGrecEPOCH, epoch_sec);
				filename = filename.replace(REGrecAGENT, user);
				filename = filename.replace(REGrecVENDORLEADCODE, recVendorLeadCode);
				filename = filename.replace(REGrecLEADID, recLeadID);
				filename = filename.replace(REGrecCALLID, LasTCID);
			//	filename = filedate + "_" + user_abb;
				var query_recording_exten = recording_exten;
				var channelrec = "Local/" + conf_silent_prefix + '' + taskconfrec + "@" + ext_context;
                var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('StopMonitorConf','" + taskconfrec + "','" + filename + "','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_stoprecording.gif") ?>\" border=\"0\" alt=\"Stop Recording\" /></a>";

				if (LIVE_campaign_recording == 'ALLFORCE')
					{
                    document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif") ?>\" border=\"0\" alt=\"Start Recording\" />";
					}
				else
					{
					document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
					}
				}
			if (taskconfrectype == 'StopMonitorConf')
				{
				filename = taskconffile;
				var query_recording_exten = session_id;
				var channelrec = "Local/" + conf_silent_prefix + '' + taskconfrec + "@" + ext_context;
                var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('MonitorConf','" + taskconfrec + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording.gif") ?>\" border=\"0\" alt=\"Start Recording\" /></a>";
				if (LIVE_campaign_recording == 'ALLFORCE')
					{
                    document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif") ?>\" border=\"0\" alt=\"Start Recording\" />";
					}
				else
					{
					document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
					}
				}
			confmonitor_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=" + taskconfrectype + "&format=text&channel=" + channelrec + "&filename=" + filename + "&exten=" + query_recording_exten + "&ext_context=" + ext_context + "&lead_id=" + document.vicidial_form.lead_id.value + "&ext_priority=1&FROMvdc=YES&uniqueid=" + tmp_vicidial_id + "&FROMapi=" + taskfromapi;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(confmonitor_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var RClookResponse = null;
			//	document.getElementById("busycallsdebug").innerHTML = confmonitor_query;
			//		alert(confmonitor_query);
			//		alert(xmlhttp.responseText);
					RClookResponse = xmlhttp.responseText;
					var RClookResponse_array=RClookResponse.split("\n");
					var RClookFILE = RClookResponse_array[1];
					var RClookID = RClookResponse_array[2];
					var RClookFILE_array = RClookFILE.split("Filename: ");
					var RClookID_array = RClookID.split("RecorDing_ID: ");
					if (RClookID_array.length > 0)
						{
						recording_filename = RClookFILE_array[1];
						recording_id = RClookID_array[1];

						if (delayed_script_load == 'YES')
							{
							RefresHScript();
							delayed_script_load='NO';
							}

						var RecDispNamE = RClookFILE_array[1];
						last_recording_filename = RClookFILE_array[1];
						if (RecDispNamE.length > 25)
							{
							RecDispNamE = RecDispNamE.substr(0,22);
							RecDispNamE = RecDispNamE + '...';
							}
						document.getElementById("RecorDingFilename").innerHTML = RecDispNamE;
						document.getElementById("RecorDID").innerHTML = RClookID_array[1];

						if (taskconfrectype == 'MonitorConf')
							{
							var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('StopMonitorConf','" + taskconfrec + "','ID:" + recording_id + "','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_stoprecording.gif") ?>\" border=\"0\" alt=\"Stop Recording\" /></a>";
							if (LIVE_campaign_recording == 'ALLFORCE')
								{
								document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif") ?>\" border=\"0\" alt=\"Start Recording\" />";
								}
							else
								{
								document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
								}
							}
						}
					}
				}
			delete xmlhttp;
			}
		}

// ################################################################################
// Send Redirect command for live call to Manager sends phone name where call is going to
// Covers the following types: XFER, VMAIL, ENTRY, CONF, PARK, FROMPARK, XfeRLOCAL, XfeRINTERNAL, XfeRBLIND, VfeRVMAIL
	function mainxfer_send_redirect(taskvar,taskxferconf,taskserverip,taskdebugnote,taskdispowindow,tasklockedquick,MSRclick) 
		{
		if (MSRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----mainxfer_send_redirect---" + taskvar + " " + taskxferconf + " " + taskserverip + " " + taskdebugnote + " " + taskdispowindow + " " + tasklockedquick + "|";}
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		var XfeR_GrouP = XfeRSelecT.value;
		var ADvalue = document.vicidial_form.xfernumber.value;
		if (CalLCID.length < 1)
			{
			CalLCID = MDnextCID;
			}
		if ( ( (taskvar == 'XfeRLOCAL') || (taskvar == 'XfeRINTERNAL') ) && (XfeR_GrouP.match(/AGENTDIRECT/i)) && (ADvalue.length < 2) )
			{
			alert_box("<?php echo _QXZ("YOU MUST SELECT AN AGENT TO TRANSFER TO WHEN USING AGENTDIRECT"); ?>");
			}
		else
			{
			blind_transfer=1;
			var consultativexfer_checked = 0;
			if (document.vicidial_form.consultativexfer.checked==true)
				{consultativexfer_checked = 1;}
			if (taskvar == 'XfeRLOCAL')
				{consultativexfer_checked = 0;}

			if (taskxferconf=='EMAIL') // If it's an EMAIL you're transferring, it will work differently from a call, BIG TIME.  So a new function was made.
				{ 
				var email_row_id=taskserverip; // Change variable name to what it actually is; too confusing otherwise
				transfer_email(taskvar, document.vicidial_form.lead_id.value, document.vicidial_form.uniqueid.value, email_row_id);
				} 
			else 
				{
			//	conf_dialed=1;
				if (auto_dial_level == 0) {RedirecTxFEr = 1;}
				var xmlhttpXF=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttpXF = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttpXF = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttpXF = false;
				  }
				 }
				@end @*/
				if (!xmlhttpXF && typeof XMLHttpRequest!='undefined')
					{
					xmlhttpXF = new XMLHttpRequest();
					}
				if (xmlhttpXF) 
					{ 
					var redirectvalue = MDchannel;
					var redirectserverip = lastcustserverip;
					if (redirectvalue.length < 2)
						{redirectvalue = lastcustchannel}
					if ( (taskvar == 'XfeRBLIND') || (taskvar == 'XfeRVMAIL') )
						{
						if (tasklockedquick > 0)
							{document.vicidial_form.xfernumber.value = quick_transfer_button_orig;}
						var queryCID = "XBvdcW" + epoch_sec + user_abb;
						var blindxferdialstring = document.vicidial_form.xfernumber.value;
						var blindxferhiddendialstring = document.vicidial_form.xfernumhidden.value;
						if ( (blindxferdialstring.length < 1) && (blindxferhiddendialstring.length > 0) )
							{blindxferdialstring=blindxferhiddendialstring;}
						var regXFvars = new RegExp("XFER","g");
						if (blindxferdialstring.match(regXFvars))
							{
							var regAXFvars = new RegExp("AXFER","g");
							if (blindxferdialstring.match(regAXFvars))
								{
								var Ctasknum = blindxferdialstring.replace(regAXFvars, '');
								if (Ctasknum.length < 2)
									{Ctasknum = '83009';}
								var closerxfercamptail = '_L';
								if (closerxfercamptail.length < 3)
									{closerxfercamptail = 'IVR';}
								blindxferdialstring = Ctasknum + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value + '*' + campaign + '*' + closerxfercamptail + '*' + user + '**' + VD_live_call_secondS + '*';
								}
							}
						else
							{
							if ( (document.vicidial_form.xferoverride.checked==false) || (manual_dial_override_field == 'DISABLED') )
								{
								if (three_way_dial_prefix == 'X') {var temp_dial_prefix = '';}
								else {var temp_dial_prefix = three_way_dial_prefix;}
								if (omit_phone_code == 'Y') {var temp_phone_code = '';}
								else {var temp_phone_code = document.vicidial_form.phone_code.value;}

								if (blindxferdialstring.length > 7)
									{blindxferdialstring = temp_dial_prefix + "" + temp_phone_code + "" + blindxferdialstring;}
								}
							}
						if (API_selected_callmenu.length > 0)
							{
							var blindxferdialstring = 's';
							var blindxfercontext = document.vicidial_form.xfernumber.value;
							}
						else
							{var blindxfercontext = ext_context;}
						no_delete_VDAC=0;
						if (taskvar == 'XfeRVMAIL')
							{
							var blindxferdialstring = campaign_am_message_exten + '*' + campaign + '*' + document.vicidial_form.phone_code.value + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value;
							no_delete_VDAC=1;
							}
						if (blindxferdialstring.length<'1')
							{
							xferredirect_query='';
							taskvar = 'NOTHING';
							alert_box("<?php echo _QXZ("Transfer number must have at least 1 digit:"); ?>" + blindxferdialstring);
							}
						else
							{
							xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectVD&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + blindxferdialstring + "&ext_context=" + blindxfercontext + "&ext_priority=1&auto_dial_level=" + auto_dial_level + "&campaign=" + campaign + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&secondS=" + VD_live_call_secondS + "&session_id=" + session_id + "&nodeletevdac=" + no_delete_VDAC + "&preset_name=" + document.vicidial_form.xfername.value + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
							}
						}
					if (taskvar == 'XfeRINTERNAL') 
						{
						var closerxferinternal = '';
						taskvar = 'XfeRLOCAL';
						}
					else 
						{
						var closerxferinternal = '9';
						}
					if (taskvar == 'XfeRLOCAL')
						{
						if (consult_custom_sent < 1)
							{CustomerData_update();}

						document.vicidial_form.xfername.value='';
						var XfeRSelecT = document.getElementById("XfeRGrouP");
						var XfeR_GrouP = XfeRSelecT.value;
						if (API_selected_xfergroup.length > 1)
							{var XfeR_GrouP = API_selected_xfergroup;}
						if (tasklockedquick > 0)
							{XfeR_GrouP = quick_transfer_button_orig;}
						var queryCID = "XLvdcW" + epoch_sec + user_abb;
						// 		 "90009*$group**$lead_id**$phone_number*$user*$agent_only*";
						var redirectdestination = closerxferinternal + '90009*' + XfeR_GrouP + '**' + document.vicidial_form.lead_id.value + '**' + dialed_number + '*' + user + '*' + document.vicidial_form.xfernumber.value + '*';


						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectVD&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&auto_dial_level=" + auto_dial_level + "&campaign=" + campaign + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&secondS=" + VD_live_call_secondS + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
						}
					if (taskvar == 'XfeR')
						{
						var queryCID = "LRvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectName&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&extenName=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
						}
					if (taskvar == 'VMAIL')
						{
						var queryCID = "LVvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectNameVmail&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + voicemail_dump_exten + "&extenName=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
						}
					if (taskvar == 'ENTRY')
						{
						var queryCID = "LEvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer_entry.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Redirect&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
						}
					if (taskvar == '3WAY')
						{
						xferredirect_query='';

						var queryCID = "VXvdcW" + epoch_sec + user_abb;
						var redirectdestination = "NEXTAVAILABLE";
						var redirectXTRAvalue = XDchannel;
						var redirecttype_test = document.vicidial_form.xfernumber.value;
						var XfeRSelecT = document.getElementById("XfeRGrouP");
						var XfeR_GrouP = XfeRSelecT.value;
						if (API_selected_xfergroup.length > 1)
							{var XfeR_GrouP = API_selected_xfergroup;}
						var regRXFvars = new RegExp("CXFER","g");
						if ( ( (redirecttype_test.match(regRXFvars)) || (consultativexfer_checked > 0) ) && (local_consult_xfers > 0) )
							{var redirecttype = 'RedirectXtraCXNeW';}
						else
							{var redirecttype = 'RedirectXtraNeW';}
						DispO3waychannel = redirectvalue;
						DispO3wayXtrAchannel = redirectXTRAvalue;
						DispO3wayCalLserverip = redirectserverip;
						DispO3wayCalLxfernumber = document.vicidial_form.xfernumber.value;
						DispO3wayCalLcamptail = '';

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=" + redirecttype + "&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&extrachannel=" + redirectXTRAvalue + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&phone_number=" + document.vicidial_form.phone_number.value + "&filename=" + taskdebugnote + "&campaign=" + XfeR_GrouP + "&session_id=" + session_id + "&agentchannel=" + agentchannel + "&protocol=" + protocol + "&extension=" + extension + "&auto_dial_level=" + auto_dial_level + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

						if (taskdebugnote == 'FIRST') 
							{
							document.getElementById("DispoSelectHAspan").innerHTML = "<a href=\"#\" onclick=\"DispoLeavE3wayAgaiN()\"><?php echo _QXZ("Leave 3Way Call Again"); ?></a>";
							}
						}
					if (taskvar == 'ParK')
						{
						blind_transfer=0;
						var queryCID = "LPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToPark&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_grabparkedcall.gif") ?>\" border=\"0\" alt=\"Grab Parked Call\" /></a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_LB_grabivrparkcall_OFF.gif") ?>\" border=\"0\" alt=\"Grab IVR Parked Call\" />";
							}
						customerparked=1;
						customerparkedcounter=0;
						}
					if (taskvar == 'FROMParK')
						{
						blind_transfer=0;
						var queryCID = "FPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromPark&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall.gif") ?>\" border=\"0\" alt=\"Park Call\" /></a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif") ?>\" border=\"0\" alt=\"IVR Park Call\" /></a>";
							}
						customerparked=0;
						customerparkedcounter=0;
						}
					if (taskvar == 'ParKivr')
						{
						blind_transfer=0;
						var queryCID = "LPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToParkIVR&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif") ?>\" border=\"0\" alt=\"Grab Parked Call\" />";
						if (ivr_park_call=='ENABLED_PARK_ONLY')
							{
							document.getElementById("ivrParkControl").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_LB_grabivrparkcall_OFF.gif") ?>\" border=\"0\" alt=\"Grab IVR Parked Call\" />";
							}
						if (ivr_park_call=='ENABLED')
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_grabivrparkcall.gif") ?>\" border=\"0\" alt=\"Grab IVR Parked Call\" /></a>";
							}
						customerparked=1;
						customerparkedcounter=0;
						}
					if (taskvar == 'FROMParKivr')
						{
						blind_transfer=0;
						var queryCID = "FPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromParkIVR&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall.gif") ?>\" border=\"0\" alt=\"Park Call\" /></a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif") ?>\" border=\"0\" alt=\"IVR Park Call\" /></a>";
							}
						customerparked=0;
						customerparkedcounter=0;
						}

					if (taskvar == 'ParKXfeR')
						{
						blind_transfer=0;
						var queryCID = "LXvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToParkXfer&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + XDnextCID + "&uniqueid=" + XDuniqueid + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkxferline_GRAB.gif"); ?>\" border=\"0\" alt=\"Grab Parked Xfer Line\" style=\"vertical-align:middle\" /></a>";
						}
					if (taskvar == 'FROMParKXfeR')
						{
						blind_transfer=0;
						var queryCID = "FXvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromParkXfer&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + XDnextCID + "&uniqueid=" + XDuniqueid + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

                        document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkxferline_ON.gif"); ?>\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" /></a>";
						}

					var XFRDop = '';
					xmlhttpXF.open('POST', 'manager_send.php'); 
					xmlhttpXF.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttpXF.send(xferredirect_query); 
					xmlhttpXF.onreadystatechange = function() 
						{ 
						if (xmlhttpXF.readyState == 4 && xmlhttpXF.status == 200) 
							{
							var XfeRRedirecToutput = null;
							XfeRRedirecToutput = xmlhttpXF.responseText;
							var XfeRRedirecToutput_array=XfeRRedirecToutput.split("|");
							var XFRDop = XfeRRedirecToutput_array[0];
							if (XFRDop == "NeWSessioN")
								{
								threeway_end=1;
								document.getElementById("callchannel").innerHTML = '';
								document.vicidial_form.callserverip.value = '';
								dialedcall_send_hangup();

								document.vicidial_form.xferchannel.value = '';
								xfercall_send_hangup();

								session_id = XfeRRedirecToutput_array[1];
								document.getElementById("sessionIDspan").innerHTML = session_id;

						//		alert("session_id changed to: " + session_id);
								}
						//	alert(xferredirect_query + "\n" + xmlhttpXF.responseText);
						//	document.getElementById("debugbottomspan").innerHTML = xferredirect_query + "\n" + xmlhttpXF.responseText;
							}
						}
					delete xmlhttpXF;
					}

				// used to send second Redirect for manual dial calls
				if ( (auto_dial_level == 0) && (taskvar != '3WAY') )
					{
					RedirecTxFEr = 1;
					var xmlhttpXF2=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttpXF2 = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttpXF2 = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttpXF2 = false;
					  }
					 }
					@end @*/
					if (!xmlhttpXF2 && typeof XMLHttpRequest!='undefined')
						{
						xmlhttpXF2 = new XMLHttpRequest();
						}
					if (xmlhttpXF2) 
						{ 
						xmlhttpXF2.open('POST', 'manager_send.php'); 
						xmlhttpXF2.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttpXF2.send(xferredirect_query + "&stage=2NDXfeR"); 
						xmlhttpXF2.onreadystatechange = function() 
							{ 
							if (xmlhttpXF2.readyState == 4 && xmlhttpXF2.status == 200) 
								{
								Nactiveext = null;
								Nactiveext = xmlhttpXF2.responseText;
						//		alert(RedirecTxFEr + "|" + xmlhttpXF2.responseText);
							}
						}
						delete xmlhttpXF2;
						}
					}

				if ( (taskvar == 'XfeRLOCAL') || (taskvar == 'XfeRBLIND') || (taskvar == 'XfeRVMAIL') )
					{
					if (auto_dial_level == 0) {RedirecTxFEr = 1;}
					document.getElementById("callchannel").innerHTML = '';
					document.vicidial_form.callserverip.value = '';
					if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
				//	alert(RedirecTxFEr + "|" + auto_dial_level);
					dialedcall_send_hangup(taskdispowindow,'','',no_delete_VDAC);
					}
				} // END ELSE FOR EMAIL CHECK
			}
		}

// ################################################################################
// Transfer an email to an in-group for another rep.
// Currently this behaves as a blind transfer no matter which button you press, but saving the taskvar variable just in case
	function transfer_email(EMAILtaskvar, EMAILlead_id, EMAILuniqueid, email_row_id) {

		var xmlhttpXF=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttpXF = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttpXF = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttpXF = false;
		  }
		 }
		@end @*/
		if (!xmlhttpXF && typeof XMLHttpRequest!='undefined')
			{
			xmlhttpXF = new XMLHttpRequest();
			}
		if (xmlhttpXF) 
			{ 
			var redirectvalue = MDchannel;
			var redirectserverip = lastcustserverip;
			var queryCID='';
			var exten='';
			var ext_context='';
			var redirectXTRAvalue='';
			var redirectdestination='';
			var taskdebugnote='';
			if (redirectvalue.length < 2)
				{redirectvalue = lastcustchannel}
			var XFRDop = '';
			var XfeRSelecT = document.getElementById("XfeRGrouP");
			var XfeR_GrouP = XfeRSelecT.value;
			if (API_selected_xfergroup.length > 1)
				{var XfeR_GrouP = API_selected_xfergroup;}
			// + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context
			xferemail_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=XFERemail&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&extrachannel=" + redirectXTRAvalue + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&phone_number=" + document.vicidial_form.phone_number.value + "&filename=" + taskdebugnote + "&campaign=" + XfeR_GrouP + "&session_id=" + session_id + "&agentchannel=" + agentchannel + "&protocol=" + protocol + "&extension=" + extension + "&auto_dial_level=" + auto_dial_level + "&list_id=" + document.vicidial_form.list_id.value + "&email_row_id=" + email_row_id;
			//alert(xferemail_query);

			xmlhttpXF.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttpXF.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttpXF.send(xferemail_query); 
			xmlhttpXF.onreadystatechange = function() 
				{ 
				if (xmlhttpXF.readyState == 4 && xmlhttpXF.status == 200) 
					{
					var XfeRRedirecToutput = null;
					XfeRRedirecToutput = xmlhttpXF.responseText;
					// alert(XfeRRedirecToutput);
					var XfeRRedirecToutput_array=XfeRRedirecToutput.split("|");
					var XFRDop = XfeRRedirecToutput_array[0];
					if (XFRDop == 1)
						{
						threeway_end=1;
						document.getElementById("callchannel").innerHTML = '';
						document.vicidial_form.callserverip.value = '';
						dialedcall_send_hangup(); // Put this in the transfer_email function

				//*		document.vicidial_form.xferchannel.value = '';
				//*		xfercall_send_hangup();

				//*		session_id = XfeRRedirecToutput_array[1];
				//*		document.getElementById("sessionIDspan").innerHTML = session_id;

				//		alert("session_id changed to: " + session_id);
						}
						else 
						{
							//
						}
				//	alert(xferredirect_query + "\n" + xmlhttpXF.responseText);
				//	document.getElementById("debugbottomspan").innerHTML = xferredirect_query + "\n" + xmlhttpXF.responseText;
					}
				}
			delete xmlhttpXF;
			}
	}

// ################################################################################
// Finish the alternate dialing and move on to disposition the call
	function ManualDialAltDonE(MDDclick)
		{
		if (MDDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialAltDonE---|";}
		alt_phone_dialing=starting_alt_phone_dialing;
		alt_dial_active = 0;
		alt_dial_status_display = 0;
		open_dispo_screen=1;
		document.getElementById("MainStatuSSpan").innerHTML = "<?php echo _QXZ("Dial Next Number"); ?>";
		}
// ################################################################################
// Insert or update the vicidial_log entry for a customer call
	function DialLog(taskMDstage,nodeletevdac)
		{
		var alt_num_status = 0;
		if (taskMDstage == "start") 
			{
			MDlogEPOCH = 0;
			var UID_test = document.vicidial_form.uniqueid.value;
			if (UID_test.length < 4)
				{
				UID_test = epoch_sec + '.' + random;
				document.vicidial_form.uniqueid.value = UID_test;
				}
			}
		else
			{
			if (alt_phone_dialing == 1)
				{
				if (document.vicidial_form.DiaLAltPhonE.checked==true)
					{
					var status_display_content='';
					if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
					if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

					alt_num_status = 1;
					reselect_alt_dial = 1;
					alt_dial_active = 1;
					alt_dial_status_display = 1;
					if ( ( (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') ) && ( (last_mdtype != 'ALT') && (last_mdtype != 'ADDR3') ) )
						{
						timer_alt_count=timer_alt_seconds;
						timer_alt_trigger=1;
						}
					var man_status = "<?php echo _QXZ("Dial Alt Phone Number:"); ?> <a href=\"#\" onclick=\"ManualDialOnly('MaiNPhonE','YES')\"><font class=\"preview_text\"><?php echo _QXZ("MAIN PHONE"); ?></font></a> <?php echo _QXZ("or"); ?> <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ALT PHONE"); ?></font></a> <?php echo _QXZ("or"); ?> <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ADDRESS3"); ?></font></a> <?php echo _QXZ("or"); ?> <a href=\"#\" onclick=\"ManualDialAltDonE('YES')\"><font class=\"preview_text_red\"><?php echo _QXZ("FINISH LEAD"); ?></font></a>" + status_display_content; 
					document.getElementById("MainStatuSSpan").innerHTML = man_status;
					}
				}
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			manDiaLlog_query = "format=text&server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=manDiaLlogCaLL&stage=" + taskMDstage + "&uniqueid=" + document.vicidial_form.uniqueid.value + 
			"&user=" + user + "&pass=" + pass + "&campaign=" + campaign + 
			"&lead_id=" + document.vicidial_form.lead_id.value + 
			"&list_id=" + document.vicidial_form.list_id.value + 
			"&length_in_sec=0&phone_code=" + document.vicidial_form.phone_code.value + 
			"&phone_number=" + lead_dial_number + 
			"&exten=" + extension + "&channel=" + lastcustchannel + "&start_epoch=" + MDlogEPOCH + "&auto_dial_level=" + auto_dial_level + "&VDstop_rec_after_each_call=" + VDstop_rec_after_each_call + "&conf_silent_prefix=" + conf_silent_prefix + "&protocol=" + protocol + "&extension=" + extension + "&ext_context=" + ext_context + "&conf_exten=" + session_id + "&user_abb=" + user_abb + "&agent_log_id=" + agent_log_id + "&MDnextCID=" + LasTCID + "&inOUT=" + inOUT + "&alt_dial=" + dialed_label + "&DB=0" + "&agentchannel=" + agentchannel + "&conf_dialed=" + conf_dialed + "&leaving_threeway=" + leaving_threeway + "&hangup_all_non_reserved=" + hangup_all_non_reserved + "&blind_transfer=" + blind_transfer + "&dial_method=" + dial_method + "&nodeletevdac=" + nodeletevdac + "&alt_num_status=" + alt_num_status + "&qm_extension=" + qm_extension + "&called_count=" + document.vicidial_form.called_count.value;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		//		document.getElementById("busycallsdebug").innerHTML = "utg_vdc_db_query.php?" + manDiaLlog_query;
			xmlhttp.send(manDiaLlog_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var MDlogResponse = null;
				//	alert(manDiaLlog_query);
				//	alert(xmlhttp.responseText);

				//	var debug_response = xmlhttp.responseText;
				//	var REGcommentsDBNL = new RegExp("\n","g");
				//	debug_response = debug_response.replace(REGcommentsDBNL, "<br>");
				//	document.getElementById("debugbottomspan").innerHTML = debug_response;

					MDlogResponse = xmlhttp.responseText;
					var MDlogResponse_array=MDlogResponse.split("\n");
					MDlogLINE = MDlogResponse_array[0];
					if ( (MDlogLINE == "LOG NOT ENTERED") && (VDstop_rec_after_each_call != 1) )
						{
				//		alert("error: log not entered\n");
						}
					else
						{
						MDlogEPOCH = MDlogResponse_array[1];
				//		alert("VICIDIAL Call log entered:\n" + document.vicidial_form.uniqueid.value);
						if ( (taskMDstage != "start") && (VDstop_rec_after_each_call == 1) )
							{
                            var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('MonitorConf','" + session_id + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording.gif") ?>\" border=\"0\" alt=\"Start Recording\" /></a>";
							if ( (LIVE_campaign_recording == 'NEVER') || (LIVE_campaign_recording == 'ALLFORCE') )
								{
                                document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif") ?>\" border=\"0\" alt=\"Start Recording\" />";
								}
							else
								{document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;}
							
							MDlogRecorDings = MDlogResponse_array[3];
							if (window.MDlogRecorDings)
								{
								var MDlogRecorDings_array=MDlogRecorDings.split("|");
						//		recording_filename = MDlogRecorDings_array[2];
						//		recording_id = MDlogRecorDings_array[3];

								var RecDispNamE = MDlogRecorDings_array[2];
								last_recording_filename = MDlogRecorDings_array[2];
								if (RecDispNamE.length > 25)
									{
									RecDispNamE = RecDispNamE.substr(0,22);
									RecDispNamE = RecDispNamE + '...';
									}
								document.getElementById("RecorDingFilename").innerHTML = RecDispNamE;
								document.getElementById("RecorDID").innerHTML = MDlogRecorDings_array[3];
								}
							}
						}
					}
				}
			delete xmlhttp;
			}
		RedirecTxFEr=0;
		conf_dialed=0;
		}


// ################################################################################
// Request number of dialable leads left in this campaign
	function DiaLableLeaDsCounT()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			DLcount_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=DiaLableLeaDsCounT&campaign=" + campaign + "&format=text";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(DLcount_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					var DLcounT = xmlhttp.responseText;
                        document.getElementById("dialableleadsspan").innerHTML ="<?php echo _QXZ("Dialable Leads:"); ?><br> " + DLcounT;
						
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Request number of USERONLY callbacks for this agent
	function CalLBacKsCounTCheck()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CBcount_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=CalLBacKCounT&campaign=" + campaign + "&format=text";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CBcount_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var CBpre = '';
					var CBpost = '';
					var Defer=0;

				//	alert(xmlhttp.responseText);
					var CBcounTtotal = xmlhttp.responseText;
					var CBcounTtotal_array=CBcounTtotal.split("|");
					var CBcounT = CBcounTtotal_array[0];
					if (scheduled_callbacks_count=='LIVE')
						{CBcounT = CBcounTtotal_array[1];}
					if (CBcounT == 0) {var CBprint = "<?php echo _QXZ("No"); ?>";}
					else 
						{
						var CBprint = CBcounT;
						if ( (LastCallbackCount < CBcounT) || (LastCallbackCount > CBcounT) )
							{
							LastCallbackCount = CBcounT;
							LastCallbackViewed=0;
							}

						if ( (scheduled_callbacks_alert == 'RED_DEFER') || (scheduled_callbacks_alert == 'BLINK_DEFER') || (scheduled_callbacks_alert == 'BLINK_RED_DEFER') )
							{Defer=1;}

						if ( (LastCallbackViewed > 0) && (Defer > 0) )
							{var do_nothing=1;}
						else
							{
							if ( (scheduled_callbacks_alert == 'BLINK') || (scheduled_callbacks_alert == 'BLINK_DEFER') )
								{
								CBpre = '<span class="blink">';
								CBpost = '</span>';
								}
							if ( (scheduled_callbacks_alert == 'RED') || (scheduled_callbacks_alert == 'RED_DEFER') )
								{
								CBpre = '<b><font color="red">';
								CBpost = '</font></b>';
								}
							if ( (scheduled_callbacks_alert == 'BLINK_RED') || (scheduled_callbacks_alert == 'BLINK_RED_DEFER') )
								{
								CBpre = '<span class="blink"><b><font color="red">';
								CBpost = '</font></b></span>';
								}
							}
						}
                                                
					CBlinkCONTENT ="<a href=\"#\" onclick=\"CalLBacKsLisTCheck();return false;\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"No Active Callbacks\">" + CBpre + '' + CBprint + '' + " Active Callbacks" + CBpost + "</button></a>";	
				//	document.getElementById("debugbottomspan").innerHTML = "<PRE>CBlinkdebug " + CBlinkCONTENT + "</PRE>";
//					document.getElementById("CBstatusSpan").innerHTML = CBlinkCONTENT;
                                        if(CBprint == 'No'){
                                        CBprint = 0;
                                        }
                                        $('#CallBackManagement .badge').html(CBpre+CBprint+CBpost);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Request list of USERONLY callbacks for this agent
	function CalLBacKsLisTCheck()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLBacKsLisTCheck---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ( (auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
//				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO CHECK CALLBACKS IN AUTO-DIAL MODE"); ?>");
                                $.toast({
                                        heading: 'Agent Alert',
                                        text: '<?php echo _QXZ("YOU MUST BE PAUSED TO CHECK CALLBACKS IN AUTO-DIAL MODE"); ?>',
                                        position: 'top-right',
                                        loaderBg: '#ff6849',
                                        icon: 'warning',
                                        hideAfter: 3500,
                                        stack: 6
                                    });
				button_click_log = button_click_log + "" + SQLdate + "-----CheckCallbacksFailed---" + VDRP_stage + "|";
				}
			}
		if (move_on == 1)
			{
			LastCallbackViewed=1;

//			showDiv('CallBacKsLisTBox');
                        $('#CallBack-Modal').modal('show');
			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var CBlist_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=CalLBacKLisT&campaign=" + campaign + "&format=text";
			//	document.getElementById("debugbottomspan").innerHTML = "DEBUG OUTPUT: |" + CBlist_query + "|";
				xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(CBlist_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						var all_CBs = null;
						all_CBs = xmlhttp.responseText;
						var all_CBs_array=all_CBs.split("\n");
						var CB_calls = all_CBs_array[0];
						var loop_ct=0;
						var conv_start=0;
                        var CB_HTML = "<table width=\"<?php echo $HCwidth ?>px\"><tr bgcolor=\"<?php echo $SCRIPT_COLOR ?>\"><td><font class=\"log_title\">#</font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("CALLBACK DATE/TIME"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("NUMBER"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("INFO"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("FULL NAME"); ?> </font></td><td align=\"center\"><font class=\"log_title\">  <?php echo _QXZ("STATUS"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("CAMPAIGN"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("LAST CALL DATE/TIME"); ?> </font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("DIAL"); ?></font></td><td align=\"center\"><font class=\"log_title\"> <?php echo _QXZ("ALT"); ?> </font></td></tr>"
						var CBT_HTML = '';
                                                    while (loop_ct < CB_calls)
							{
							loop_ct++;
							loop_s = loop_ct.toString();
							if (loop_s.match(/1$|3$|5$|7$|9$/)) 
								{var row_color = '#DDDDFF';}
							else
								{var row_color = '#CCCCFF';}
							var conv_ct = (loop_ct + conv_start);
							var call_array = all_CBs_array[conv_ct].split("-!T-");
							var CB_name = call_array[0] + " " + call_array[1];
							var CB_phone = call_array[2];
							var CB_id = call_array[3];
							var CB_lead_id = call_array[4];
							var CB_campaign = call_array[5];
							var CB_status = call_array[6];
							var CB_lastcall_time = call_array[7];
							var CB_callback_time = call_array[8];
							var CB_comments = call_array[9];
							var CB_dialable = call_array[10];
							var CB_alt_phone = call_array[11];
							var CB_comments_ten = CB_comments;
							if (CB_comments_ten.length > 10)
								{
								CB_comments_ten = CB_comments_ten.substr(0,10);
								CB_comments_ten = CB_comments_ten + '...';
								}
							if (CB_dialable > 0)
								{
								var alt_link = "<a href=\"#\" onclick=\"new_callback_call('" + CB_id + "','" + CB_lead_id + "','ALT');return false;\"><?php echo _QXZ("ALT"); ?></a>&nbsp;";
								if (CB_alt_phone.length < 3)
									{alt_link = "<?php echo _QXZ("ALT"); ?>&nbsp;";}
								CB_HTML = CB_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + loop_ct + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_callback_time + "</td><td align=\"right\"><font class=\"log_text\">" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_comments_ten + " - <a href=\"#\" onclick=\"VieWLeaDInfO('" + CB_lead_id + "','" + CB_id + "');return false;\"><?php echo _QXZ("INFO"); ?></a></font></td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_lastcall_time + "&nbsp;</font></td><td align=\"right\"><font class=\"log_text\"><a href=\"#\" onclick=\"new_callback_call('" + CB_id + "','" + CB_lead_id + "','MAIN');return false;\"><?php echo _QXZ("DIAL"); ?></a>&nbsp;</font></td><td align=\"right\"><font class=\"log_text\">" + alt_link + "</font></td></tr>";
								CBT_HTML = CBT_HTML + "<tr><td>" + CB_callback_time + "</td><td >" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td>" + CB_comments_ten + "</td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\"><a href=\"javascript:void(0);\" onclick=\"VieWLeaDInfO('" + CB_lead_id + "','" + CB_id + "');return false;\" class=\"btn btn-primary btn-app\"><i class=\"fa fa-info\"></i></a><a href=\"#\" onclick=\"new_callback_call('" + CB_id + "','" + CB_lead_id + "','MAIN');return false;\" class=\"btn btn-success btn-app\"><i class=\"fa fa-phone\"></i></a></td></tr>";
								}
							else
								{
								CB_HTML = CB_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + loop_ct + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_callback_time + "</td><td align=\"right\"><font class=\"log_text\">" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_comments_ten + " - INFO</font></td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_lastcall_time + "&nbsp;</font></td><td align=\"right\" colspan=2><font class=\"log_text\"><?php echo _QXZ("NON-DIALABLE"); ?>&nbsp;</font></td></tr>";
								CBT_HTML = CBT_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + loop_ct + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_callback_time + "</td><td align=\"right\"><font class=\"log_text\">" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_comments_ten + " - INFO</font></td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_lastcall_time + "&nbsp;</font></td><td align=\"right\" colspan=2><font class=\"log_text\"><?php echo _QXZ("NON-DIALABLE"); ?>&nbsp;</font></td></tr>";
								}
							}
						CB_HTML = CB_HTML + "</table>";
						document.getElementById("CallBacKsLisT").innerHTML = CB_HTML;
                                                
                                                $('#CallBackList-listings tbody').html(CBT_HTML);
                                                $('#CallBackList-listings').DataTable();
						}
					}
				delete xmlhttp;
				}
			}
		}

// ################################################################################
// Request list of active manager chats for this agent
	function InternalChatsCheck(line_code)
		{
			var xmlhttp=false;
			// var MGR_chat_print=0;
			var MGRpre='';
			var MGRpost='';
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var InternalChat_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=ManagerChatsCheck";
				xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(InternalChat_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var active_InternalChat_info = null;
						active_InternalChat_info = xmlhttp.responseText;
						var Internal_chat_array=active_InternalChat_info.split("|");
						var Internal_chat_print=Internal_chat_array[0];
						var Internal_chat_unread_msg=Internal_chat_array[1];
						var Internal_chat_alert_sounds=Internal_chat_array[2];

						if (Internal_chat_print>0)
							{
							if (Internal_chat_unread_msg>0)
								{
									document.images['InternalChatImg'].src=image_internal_chat_ALERT.src;
								}
							else 
								{
								document.images['InternalChatImg'].src=image_internal_chat_ON.src;
								}
							}
						else 
							{
							Internal_chat_print="NO";
//							document.images['InternalChatImg'].src=image_internal_chat_OFF.src;
							}

						var ChatIFrame = document.getElementById('InternalChatIFrame');
						var innerChatDoc = (ChatIFrame.contentDocument) ? ChatIFrame.contentDocument : ChatIFrame.contentWindow.document;

						if (innerChatDoc.getElementById("InternalMessageCount")) // Prevents javascript error when page loads
						{
							if (Internal_chat_alert_sounds>innerChatDoc.getElementById("InternalMessageCount").value && innerChatDoc.getElementById("InternalMessageCount").value>0 && !innerChatDoc.getElementById("MuteChatAlert").checked) 
								{
								document.getElementById("ChatAudioAlertFile").play(); 
								}
							innerChatDoc.getElementById("InternalMessageCount").value=Internal_chat_alert_sounds;
							}
						}
						// alert(line_code+ " -- " + MGR_chat_print + " -- " +MGR_chat_unread_msg);
					}
				}
		}

// ################################################################################
// closes callback list screen
	function alert_box(temp_message)
		{
		document.getElementById("AlertBoxContent").innerHTML = temp_message;
//		document.getElementById("AlertBoxContent").innerHTML = 'HI';

		showDiv('AlertBox');

		document.alert_form.alert_button.focus();
		}


// ################################################################################
// closes callback list screen
	function CalLBacKsLisTClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLBacKsLisTClose---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		hideDiv('CallBacKsLisTBox');
		CalLBacKsCounTCheck();
		}


// ################################################################################
// closes call log display screen
	function CalLLoGVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLLoGVieWClose---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		hideDiv('CalLLoGDisplaYBox');
		}


// ################################################################################
// closes lead search screen
	function LeaDSearcHVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeaDSearcHVieWClose---|";
		if ( (auto_resume_precall == 'Y') && (inbound_lead_search < 1) )
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		ShoWGenDerPulldown();
		hideDiv('SearcHForMDisplaYBox');
		}


// ################################################################################
// closes contacts search screen
	function ContactSearcHVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ContactSearcHVieWClose---|";
		ShoWGenDerPulldown();
		hideDiv('SearcHContactsDisplaYBox');
		}


// ################################################################################
// Open up a callback customer record as manual dial preview mode
	function new_callback_call(taskCBid,taskLEADid,taskCBalt)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----new_callback_call---" + taskCBid + " " + taskLEADid + " " + taskCBalt + "|";
		if (waiting_on_dispo > 0)
			{
			alert_box("<?php echo _QXZ("System Delay, Please try again"); ?><BR><font size=1>code:" + agent_log_id + " - " + waiting_on_dispo + "</font>");
			}
		else
			{
		//	alt_phone_dialing=1;
			LastCallbackViewed=1;
			LastCallbackCount = (LastCallbackCount - 1);
			auto_dial_level=0;
			manual_dial_in_progress=1;
			MainPanelToFront();
			buildDiv('DiaLLeaDPrevieW');
			if (alt_phone_dialing == 1)
				{buildDiv('DiaLDiaLAltPhonE');}
			document.vicidial_form.LeadPreview.checked=true;
		//	document.vicidial_form.DiaLAltPhonE.checked=true;
			hideDiv('CallBacKsLisTBox');
			ManualDialNext(taskCBid,taskLEADid,'','','','0','',taskCBalt);
			}
		}


// ################################################################################
// Finish Callback and go back to original screen
	function manual_dial_finished()
		{
		alt_phone_dialing=starting_alt_phone_dialing;
		auto_dial_level=starting_dial_level;
		MainPanelToFront();
		CalLBacKsCounTCheck();
		InternalChatsCheck(); 
		manual_dial_in_progress=0;
		}


// ################################################################################
// Open page to enter details for a new manual dial lead
	function NeWManuaLDiaLCalL(TVfast,TVphone_code,TVphone_number,TVlead_id,TVtype,NMCclick)
		{
		if (NMCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----NeWManuaLDiaLCalL---" + TVfast + " " + TVphone_code + " " + TVphone_number + " " + TVlead_id + " " + TVtype + "|";}
		var move_on=1;
		if ( (starting_dial_level != 0) && (dial_next_failed < 1) && ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) ) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO MANUAL DIAL A NEW LEAD IN AUTO-DIAL MODE"); ?>");
				}
			}
		if (move_on == 1)
			{
			if (TVfast=='FAST')
				{
				NeWManuaLDiaLCalLSubmiTfast();
				}
			else
				{
				if (TVfast=='CALLLOG')
					{
					hideDiv('CalLLoGDisplaYBox');
					hideDiv('SearcHForMDisplaYBox');
					hideDiv('SearcHResultSDisplaYBox');
					hideDiv('LeaDInfOBox');
					document.vicidial_form.MDDiaLCodE.value = TVphone_code;
					document.vicidial_form.MDPhonENumbeR.value = TVphone_number;
					document.vicidial_form.MDPhonENumbeRHiddeN.value = TVphone_number;
					document.vicidial_form.MDLeadID.value = TVlead_id;
					document.vicidial_form.MDType.value = TVtype;
					if (disable_alter_custphone == 'HIDE')
						{document.vicidial_form.MDPhonENumbeR.value = 'XXXXXXXXXX';}
					}
				if (TVfast=='LEADSEARCH')
					{
					hideDiv('SearcHForMDisplaYBox');
					hideDiv('SearcHResultSDisplaYBox');
					hideDiv('LeaDInfOBox');
					document.vicidial_form.MDDiaLCodE.value = TVphone_code;
					document.vicidial_form.MDPhonENumbeR.value = TVphone_number;
					document.vicidial_form.MDLeadID.value = TVlead_id;
					document.vicidial_form.MDType.value = TVtype;
					}
				if (agent_allow_group_alias == 'Y')
					{
                    document.getElementById("ManuaLDiaLGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("Group Alias:"); ?> " + active_group_alias + "</font>";
                    document.getElementById("ManuaLDiaLGrouP").innerHTML = "<a href=\"#\" onclick=\"GroupAliasSelectContent_create('0');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Choose a Group Alias"); ?></font></a>";
					}
				if (in_group_dial_display > 0)
					{
                    document.getElementById("ManuaLDiaLInGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("Dial In-Group:"); ?> " + active_ingroup_dial + "</font>";
                    document.getElementById("ManuaLDiaLInGrouP").innerHTML = "<a href=\"#\" onclick=\"ManuaLDiaLInGrouPSelectContent_create('0');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Choose a Dial In-Group"); ?></font></a>";
					}
				if ( (in_group_dial == 'BOTH') || (in_group_dial == 'NO_DIAL') )
					{
					nocall_dial_flag = 'DISABLED';
                    document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("No-Call Dial:"); ?> " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Activate"); ?></font></a>";
					}
				<!--showDiv('NeWManuaLDiaLBox');-->
                                $('#NeWManuaLDiaLBoxModal').modal('show');
				document.vicidial_form.search_phone_number.value='';
				document.vicidial_form.search_lead_id.value='';
				document.vicidial_form.search_vendor_lead_code.value='';
				document.vicidial_form.search_first_name.value='';
				document.vicidial_form.search_last_name.value='';
				document.vicidial_form.search_city.value='';
				document.vicidial_form.search_state.value='';
				document.vicidial_form.search_postal_code.value='';
				}
			}
		}


// ################################################################################
// Populate lead information from search while on inbound call
	function LeaDSearcHSelecT(LSSlead_id,LSStype)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeaDSearcHSelecT---" + LSSlead_id + " " + LSStype + "|";
		var move_on=0;
		if (VD_live_customer_call==1)
			{
			move_on=1;
			}
		if (move_on == 1)
			{
			if (typeof(xmlhttprequestselectupdate) == "undefined") 
				{
				var xmlhttprequestselectupdate=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttprequestselectupdate = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttprequestselectupdate = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttprequestselectupdate = false;
				  }
				 }
				@end @*/
				if (!xmlhttprequestselectupdate && typeof XMLHttpRequest!='undefined')
					{
					xmlhttprequestselectupdate = new XMLHttpRequest();
					}
				if (xmlhttprequestselectupdate) 
					{ 
					checkVDAI_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&ACTION=LeaDSearcHSelecTUpdatE" + "&lead_id=" + LSSlead_id + "&stage=" + document.vicidial_form.lead_id.value + "&agent_log_id=" + agent_log_id + "&phone_number=" + document.vicidial_form.phone_number.value;
					xmlhttprequestselectupdate.open('POST', 'utg_vdc_db_query.php'); 
					xmlhttprequestselectupdate.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttprequestselectupdate.send(checkVDAI_query); 
					xmlhttprequestselectupdate.onreadystatechange = function() 
						{ 
						if (xmlhttprequestselectupdate.readyState == 4 && xmlhttprequestselectupdate.status == 200) 
							{
							var check_incoming = null;
							lead_change = xmlhttprequestselectupdate.responseText;
						//	alert(checkVDAI_query);
						//	alert(xmlhttprequestselectupdate.responseText);
							var change_array=lead_change.split("\n");
                                                        console.log(change_array);
							if (change_array[0] == '1')
								{
								var VDIC_data_VDAC=change_array[1].split("|");
								VDIC_web_form_address = VICIDiaL_web_form_address;
								VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
								VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
								var VDIC_fronter='';

								var change_data=change_array[2].split("|");
								if (change_data[0].length > 5)
									{VDIC_web_form_address	= change_data[0];}
								var VDCL_group_name			= change_data[1];
								var VDCL_group_color		= change_data[2];
								var VDCL_fronter_display	= change_data[3];
								 VDCL_group_id				= change_data[4];
								 CalL_ScripT_id				= change_data[5];
								 CalL_AutO_LauncH			= change_data[6];
								 CalL_XC_a_Dtmf				= change_data[7];
								 CalL_XC_a_NuMber			= change_data[8];
								 CalL_XC_b_Dtmf				= change_data[9];
								 CalL_XC_b_NuMber			= change_data[10];
								if ( (change_data[11].length > 1) && (change_data[11] != '---NONE---') )
									{LIVE_default_xfer_group = change_data[11];}
								else
									{LIVE_default_xfer_group = default_xfer_group;}

								if ( (change_data[12].length > 1) && (change_data[12]!='DISABLED') )
									{LIVE_campaign_recording = change_data[12];}
								else
									{LIVE_campaign_recording = campaign_recording;}

								if ( (change_data[13].length > 1) && (change_data[13]!='NONE') )
									{LIVE_campaign_rec_filename = change_data[13];}
								else
									{LIVE_campaign_rec_filename = campaign_rec_filename;}

								if ( (change_data[14].length > 1) && (change_data[14]!='NONE') )
									{LIVE_default_group_alias = change_data[14];}
								else
									{LIVE_default_group_alias = default_group_alias;}

								if ( (change_data[15].length > 1) && (change_data[15]!='NONE') )
									{LIVE_caller_id_number = change_data[15];}
								else
									{LIVE_caller_id_number = default_group_alias_cid;}

								if (change_data[16].length > 0)
									{LIVE_web_vars = change_data[16];}
								else
									{LIVE_web_vars = default_web_vars;}

								if (change_data[17].length > 5)
									{VDIC_web_form_address_two = change_data[17];}

								CalL_XC_c_NuMber			= change_data[21];
								CalL_XC_d_NuMber			= change_data[22];
								CalL_XC_e_NuMber			= change_data[23];
								CalL_XC_e_NuMber			= change_data[23];
								uniqueid_status_display		= change_data[24];
								uniqueid_status_prefix		= change_data[26];
								did_id						= change_data[28];
								did_extension				= change_data[29];
								did_pattern					= change_data[30];
								did_description				= change_data[31];
								closecallid					= change_data[32];
								xfercallid					= change_data[33];
								if (change_data[34].length > 5)
									{VDIC_web_form_address_three = change_data[34];}
								if (change_data[35].length > 1)
									{CalL_ScripT_color = change_data[35];}

								document.vicidial_form.lead_id.value			= VDIC_data_VDAC[0];
								LeaDPreVDispO									= change_array[6];
								fronter											= change_array[7];
								document.vicidial_form.vendor_lead_code.value	= change_array[8];
								document.vicidial_form.list_id.value			= change_array[9];
								document.vicidial_form.gmt_offset_now.value		= change_array[10];
								document.vicidial_form.phone_code.value			= change_array[11];
								if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
									{
									var tmp_pn = document.getElementById("phone_numberDISP");
									if (disable_alter_custphone=='Y')
										{
										tmp_pn.innerHTML						= change_array[12];
										}
									}
                                                                        console.log('Hi 123');
								document.vicidial_form.phone_number.value		= change_array[12];
								document.vicidial_form.title.value				= change_array[13];
								document.vicidial_form.first_name.value			= change_array[14];
								document.vicidial_form.middle_initial.value		= change_array[15];
								document.vicidial_form.last_name.value			= change_array[16];
								document.vicidial_form.address1.value			= change_array[17];
								document.vicidial_form.address2.value			= change_array[18];
								document.vicidial_form.address3.value			= change_array[19];
								document.vicidial_form.city.value				= change_array[20];
								document.vicidial_form.state.value				= change_array[21];
								document.vicidial_form.province.value			= change_array[22];
								document.vicidial_form.postal_code.value		= change_array[23];
								document.vicidial_form.country_code.value		= change_array[24];
								document.vicidial_form.gender.value				= change_array[25];
								document.vicidial_form.date_of_birth.value		= change_array[26];
								document.vicidial_form.alt_phone.value			= change_array[27];
								document.vicidial_form.email.value				= change_array[28];
								document.vicidial_form.security_phrase.value	= change_array[29];
								var REGcommentsNL = new RegExp("!N","g");
								change_array[30] = change_array[30].replace(REGcommentsNL, "\n");
								document.vicidial_form.comments.value			= change_array[30];
								document.vicidial_form.called_count.value		= change_array[31];
								CBentry_time									= change_array[32];
								CBcallback_time									= change_array[33];
								CBuser											= change_array[34];
								CBcomments										= change_array[35];
								dialed_number									= change_array[36];
								dialed_label									= change_array[37];
								source_id										= change_array[38];
								EAphone_code									= change_array[39];
								EAphone_number									= change_array[40];
								EAalt_phone_notes								= change_array[41];
								EAalt_phone_active								= change_array[42];
								EAalt_phone_count								= change_array[43];
								document.vicidial_form.rank.value				= change_array[44];
								document.vicidial_form.owner.value				= change_array[45];
								document.vicidial_form.entry_list_id.value		= change_array[47];
								custom_field_names								= change_array[48];
								custom_field_values								= change_array[49];
								custom_field_types								= change_array[50];
								//Added By Poundteam for Audited Comments (Manual Dial Section Only)
								if (qc_enabled > 0)
									{
									document.vicidial_form.ViewCommentButton.value                      = change_array[53];
									document.vicidial_form.audit_comments_button.value                  = change_array[53];
									if (comments_all_tabs == 'ENABLED')
										{document.vicidial_form.OtherViewCommentButton.value            = change_array[53];}
									var REGACcomments = new RegExp("!N","g");
									var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
									var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
									change_array[54] = change_array[54].replace(REGACcomments, "\n");
									change_array[54] = change_array[54].replace(REGACfontbegin, "<font color=red>");
									change_array[54] = change_array[54].replace(REGACfontend, "</font>");
									document.getElementById("audit_comments").innerHTML                  = change_array[54];
									if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (change_array[53]!='0') && (change_array[53]!='') )
										{ViewComments('ON');}
									}
								//END section Added By Poundteam for Audited Comments
								// Add here for AutoDial (VDADcheckINCOMING in utg_vdc_db_query)

								document.vicidial_form.list_name.value			= change_array[55];
								// list webform3 - 56
								// script color - 57
								document.vicidial_form.list_description.value	= change_array[58];
								entry_date										= change_array[59];
								did_custom_one									= change_array[60];
								did_custom_two									= change_array[61];
								did_custom_three								= change_array[62];
								did_custom_four									= change_array[63];
								did_custom_five									= change_array[64];
								status_group_statuses_data						= change_array[65];
								last_call_date									= change_array[66];

								// build statuses list for disposition screen
								VARstatuses = [];
								VARstatusnames = [];
								VARSELstatuses = [];
								VARCBstatuses = [];
								VARMINstatuses = [];
								VARMAXstatuses = [];
								VARCBstatusesLIST = '';
								VD_statuses_ct = 0;
								VARSELstatuses_ct = 0;
								gVARstatuses = [];
								gVARstatusnames = [];
								gVARSELstatuses = [];
								gVARCBstatuses = [];
								gVARMINstatuses = [];
								gVARMAXstatuses = [];
								gVARCBstatusesLIST = '';
								gVD_statuses_ct = 0;
								gVARSELstatuses_ct = 0;

								if (status_group_statuses_data.length > 7)
									{
									var gVARstatusesRAW=status_group_statuses_data.split(',');
									var gVARstatusesRAWct = gVARstatusesRAW.length;
									var loop_gct=0;
									while (loop_gct < gVARstatusesRAWct)
										{
										var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
										var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
										gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
										gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
										gVARSELstatuses[loop_gct] =	'Y';
										gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
										gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
										gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
										if (gVARCBstatuses[loop_gct] == 'Y')
											{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
										gVD_statuses_ct++;
										gVARSELstatuses_ct++;

										loop_gct++;
										}
									}
								else
									{
									gVARstatuses = cVARstatuses;
									gVARstatusnames = cVARstatusnames;
									gVARSELstatuses = cVARSELstatuses;
									gVARCBstatuses = cVARCBstatuses;
									gVARMINstatuses = cVARMINstatuses;
									gVARMAXstatuses = cVARMAXstatuses;
									gVARCBstatusesLIST = cVARCBstatusesLIST;
									gVD_statuses_ct = cVD_statuses_ct;
									gVARSELstatuses_ct = cVARSELstatuses_ct;
									}

								VARstatuses = sVARstatuses.concat(gVARstatuses);
								VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
								VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
								VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
								VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
								VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
								VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
								VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
								VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

								var HKdebug='';
								var HKboxAtemp='';
								var HKboxBtemp='';
								var HKboxCtemp='';
								if (HK_statuses_camp > 0)
									{
									hotkeys = [];
									var temp_HK_valid_ct=0;
									while (HK_statuses_camp > temp_HK_valid_ct)
										{
										var temp_VARstatuses_ct=0;
										while (VD_statuses_ct > temp_VARstatuses_ct)
											{
											if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
												{
												hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

												if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
													{
													HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
													{
													HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
													{
													HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}

												HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
												}
											temp_VARstatuses_ct++;
											}
										temp_HK_valid_ct++;
										}
									document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
									document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
									document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
									}

								if (agent_display_fields.match(adfREGentry_date))
									{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
								if (agent_display_fields.match(adfREGsource_id))
									{document.getElementById("source_idDISP").innerHTML = source_id;}
								if (agent_display_fields.match(adfREGdate_of_birth))
									{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
								if (agent_display_fields.match(adfREGrank))
									{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
								if (agent_display_fields.match(adfREGowner))
									{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
								if (agent_display_fields.match(adfREGlast_local_call_time))
									{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

								if (hide_gender > 0)
									{
									document.vicidial_form.gender_list.value	= change_array[25];
									}
								else
									{
									var gIndex = 0;
									if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
									if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
									document.getElementById("gender_list").selectedIndex = gIndex;
									}

								hideDiv('SearcHForMDisplaYBox');
								hideDiv('SearcHResultSDisplaYBox');
								hideDiv('LeaDInfOBox');
								document.vicidial_form.search_phone_number.value='';
								document.vicidial_form.search_lead_id.value='';
								document.vicidial_form.search_vendor_lead_code.value='';
								document.vicidial_form.search_first_name.value='';
								document.vicidial_form.search_last_name.value='';
								document.vicidial_form.search_city.value='';
								document.vicidial_form.search_state.value='';
								document.vicidial_form.search_postal_code.value='';

								lead_dial_number = document.vicidial_form.phone_number.value;
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								if (CBentry_time.length > 2)
									{
									document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("PREVIOUS CALLBACK"); ?> </b>";
									document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
									document.getElementById("CBcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Last Call:"); ?> </b>" + CBentry_time;
									document.getElementById("CBcommentsBoxB").innerHTML = "<b><?php echo _QXZ("CallBack:"); ?> </b>" + CBcallback_time;
									document.getElementById("CBcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Agent:"); ?> </b>" + CBuser;
									document.getElementById("CBcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Comments:"); ?> </b><br>" + CBcomments;
									if (show_previous_callback == 'ENABLED')
										{showDiv('CBcommentsBox');}
									}
			
								if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
									{
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = default_xfer_group;}

									document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}
								if (prepopulate_transfer_preset_enabled > 0)
									{
									if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									}
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{
									if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

									document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}

								// Build transfer pull-down list
								var loop_ct = 0;
								var live_XfeR_HTML = '';
								var XfeR_SelecT = '';
								while (loop_ct < XFgroupCOUNT)
									{
									if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
										{XfeR_SelecT = 'selected ';}
									else {XfeR_SelecT = '';}
									live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
									loop_ct++;
									}
                                                                        console.log('Hello 5');
								document.getElementById("XfeRGrouPLisT").innerHTML = "<select size=\"1\" name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

								if (VDCL_group_id.length > 1)
									{var group = VDCL_group_id;}
								else
									{var group = campaign;}
								if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

								if (hide_gender < 1)
									{
									var genderIndex = document.getElementById("gender_list").selectedIndex;
									var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
									document.vicidial_form.gender.value = genderValue;
									}

								LeaDDispO='';

								var regWFAcustom = new RegExp("^VAR","ig");
								if (VDIC_web_form_address.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
									TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
									}

								if (VDIC_web_form_address_two.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
									}

								if (VDIC_web_form_address_three.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
									}
                                                                        console.log('Script 6');
								document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";

								if (enable_second_webform > 0)
									{
									document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
									}

								if (enable_third_webform > 0)
									{
									document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
									}

								if (CalL_ScripT_color.length > 1)
									{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
								if ( (view_scripts == 1) && (CalL_ScripT_id.length > 0) )
									{
									var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
									var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

									if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
										{
										delayed_script_load = 'YES';
										RefresHScript('CLEAR');
										}
									else
										{
										load_script_contents('ScriptContents','');
										}
									}

								if (custom_fields_enabled > 0)
									{
									FormContentsLoad();
									}
								if (CalL_AutO_LauncH == 'SCRIPT')
									{
									if (delayed_script_load == 'YES')
										{
										load_script_contents('ScriptContents','');
										}
									ScriptPanelToFront();
									}
								if (CalL_AutO_LauncH == 'FORM')
									{
									FormPanelToFront();
									}

								if (CalL_AutO_LauncH == 'WEBFORM')
									{
									window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									}
								if (CalL_AutO_LauncH == 'WEBFORMTWO')
									{
									window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									}
								if (CalL_AutO_LauncH == 'WEBFORMTHREE')
									{
									window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									}

								if (useIE > 0)
									{
									var regCTC = new RegExp("^NONE","ig");
									if (CopY_tO_ClipboarD.match(regCTC))
										{var nothing=1;}
									else
										{
										var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
								//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
										window.clipboardData.setData('Text', tmp_clip.value)
								//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
										}
									}
								}
							else
								{
								// do nothing
								}
								xmlhttprequestselectupdate = undefined;
								delete xmlhttprequestselectupdate;
							}
						}
					}
				}
			}
		}


// ################################################################################
// Insert the new manual dial as a lead and go to manual dial screen
	function NeWManuaLDiaLCalLSubmiT(tempDiaLnow,NMDclick)
		{
		if (NMDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----NeWManuaLDiaLCalLSubmiT---" + tempDiaLnow + "|";}
		if (waiting_on_dispo > 0)
			{
			alert_box("<?php echo _QXZ("System Delay, Please try again"); ?><BR><font size=1><?php echo _QXZ("code:"); ?>" + agent_log_id + " - " + waiting_on_dispo + "</font>");
			}
		else
			{
			hideDiv('NeWManuaLDiaLBox');
                        $('#NeWManuaLDiaLBoxModal').modal('hide');
		//	document.getElementById("debugbottomspan").innerHTML = "DEBUG OUTPUT" + document.vicidial_form.MDPhonENumbeR.value + "|" + active_group_alias;

			var sending_group_alias = 0;
			var MDDiaLCodEform = document.vicidial_form.MDDiaLCodE.value;
			var MDPhonENumbeRform = document.vicidial_form.MDPhonENumbeR.value;
			var MDLeadIDform = document.vicidial_form.MDLeadID.value;
			var MDLeadIDEntryform = document.vicidial_form.MDLeadIDEntry.value;
			var MDTypeform = document.vicidial_form.MDType.value;
			var MDDiaLOverridEform = document.vicidial_form.MDDiaLOverridE.value;
			var MDVendorLeadCode = document.vicidial_form.vendor_lead_code.value;
			var MDLookuPLeaD = 'new';
			if ( (document.vicidial_form.LeadLookuP.checked==true) || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
				{MDLookuPLeaD = 'lookup';}

			if (MDPhonENumbeRform == 'XXXXXXXXXX')
				{MDPhonENumbeRform = document.vicidial_form.MDPhonENumbeRHiddeN.value;}

			if (MDDiaLCodEform.length < 1)
				{MDDiaLCodEform = document.vicidial_form.phone_code.value;}
				

			if (MDLeadIDEntryform.length > 0)
				{MDLeadIDform = document.vicidial_form.MDLeadIDEntry.value;}

			if ( (MDDiaLOverridEform.length > 0) && (active_ingroup_dial.length < 1) && (manual_dial_override_field == 'ENABLED') )
				{
				agent_dialed_number=1;
				agent_dialed_type='MANUAL_OVERRIDE';
				basic_originate_call(session_id,'NO','YES',MDDiaLOverridEform,'YES','','1','0');
				}
			else
				{
				if (active_ingroup_dial.length < 1)
					{
					auto_dial_level=0;
					manual_dial_in_progress=1;
					agent_dialed_number=1;
					}
				MainPanelToFront();

				if ( (tempDiaLnow == 'PREVIEW') && (active_ingroup_dial.length < 1) )
					{
				//	alt_phone_dialing=1;
					agent_dialed_type='MANUAL_PREVIEW';
					buildDiv('DiaLLeaDPrevieW');
					if (alt_phone_dialing == 1)
						{buildDiv('DiaLDiaLAltPhonE');}
					document.vicidial_form.LeadPreview.checked=true;
				//	document.vicidial_form.DiaLAltPhonE.checked=true;
					}
				else
					{
					agent_dialed_type='MANUAL_DIALNOW';
					if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
						{
						document.vicidial_form.DiaLAltPhonE.checked=true;
						}
					else
						{
						document.vicidial_form.LeadPreview.checked=false;
						document.vicidial_form.DiaLAltPhonE.checked=false;
						}
					}
				if (active_group_alias.length > 1)
					{var sending_group_alias = 1;}

				ManualDialNext("",MDLeadIDform,MDDiaLCodEform,MDPhonENumbeRform,MDLookuPLeaD,MDVendorLeadCode,sending_group_alias,MDTypeform);
				}

			document.vicidial_form.MDPhonENumbeR.value = '';
			document.vicidial_form.MDDiaLOverridE.value = '';
			document.vicidial_form.MDLeadID.value = '';
			document.vicidial_form.MDLeadIDEntry.value='';
			document.vicidial_form.MDType.value = '';
			document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
			}
		}

// ################################################################################
// Fast version of manual dial
	function NeWManuaLDiaLCalLSubmiTfast()
		{
		var MDDiaLCodEform = document.vicidial_form.phone_code.value;
		var MDPhonENumbeRform = document.vicidial_form.phone_number.value;
		var MDVendorLeadCode = document.vicidial_form.vendor_lead_code.value;

		if ( (MDDiaLCodEform.length < 1) || (MDPhonENumbeRform.length < 5) )
			{
			alert_box("<?php echo _QXZ("YOU MUST ENTER A PHONE NUMBER AND DIAL CODE TO USE FAST DIAL"); ?>");
			}
		else
			{
			if (waiting_on_dispo > 0)
				{
				alert_box("<?php echo _QXZ("System Delay, Please try again"); ?><BR><font size=1><?php echo _QXZ("code:"); ?>" + agent_log_id + " - " + waiting_on_dispo + "</font>");
				}
			else
				{
				var MDLookuPLeaD = 'new';
				if ( (document.vicidial_form.LeadLookuP.checked==true) || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
					{MDLookuPLeaD = 'lookup';}
			
				agent_dialed_number=1;
				agent_dialed_type='MANUAL_DIALFAST';
			//	alt_phone_dialing=1;
				auto_dial_level=0;
				manual_dial_in_progress=1;
				MainPanelToFront();
				buildDiv('DiaLLeaDPrevieW');
				if (alt_phone_dialing == 1)
					{buildDiv('DiaLDiaLAltPhonE');}
				document.vicidial_form.LeadPreview.checked=false;
			//	document.vicidial_form.DiaLAltPhonE.checked=true;
				ManualDialNext("","",MDDiaLCodEform,MDPhonENumbeRform,MDLookuPLeaD,MDVendorLeadCode,'0');
				}
			}
		}


// ################################################################################
// Toggle the no-dial flag
	function NoDiaLSwitcH()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoDiaLSwitcH---|";
		if (nocall_dial_flag == 'DISABLED')
			{
			nocall_dial_flag = 'ENABLED';
			document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("No-Call Dial:"); ?> " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Deactivate"); ?></font></a>";
			}
		else
			{
			nocall_dial_flag = 'DISABLED';
			document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("No-Call Dial:"); ?> " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Activate"); ?></font></a>";
			}
		}


// ################################################################################
// Request lookup of manual dial channel
	function ManualDialCheckChanneL(taskCheckOR)
		{
		if (taskCheckOR == 'YES')
			{
			var CIDcheck = XDnextCID;
			}
		else
			{
			var CIDcheck = MDnextCID;
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			manDiaLlook_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=manDiaLlookCaLL&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&MDnextCID=" + CIDcheck + "&agent_log_id=" + agent_log_id + "&lead_id=" + document.vicidial_form.lead_id.value + "&DiaL_SecondS=" + MD_ring_secondS + "&stage=" + taskCheckOR;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(manDiaLlook_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var MDlookResponse = null;
				//	alert(xmlhttp.responseText);

				//	var debug_response = xmlhttp.responseText;
				//	var REGcommentsDBNL = new RegExp("\n","g");
				//	debug_response = debug_response.replace(REGcommentsDBNL, "<br>");
				//	document.getElementById("debugbottomspan").innerHTML = "<br>|" + manDiaLlook_query + "|<br>\n" + debug_response;

					MDlookResponse = xmlhttp.responseText;
					var MDlookResponse_array=MDlookResponse.split("\n");
					var MDlookCID = MDlookResponse_array[0];
					var regMDL = new RegExp("^Local","ig");
					if (MDlookCID == "NO")
						{
						MD_ring_secondS++;
						var dispnum = lead_dial_number;

						var status_display_number = phone_number_format(dispnum);

						if (alt_dial_status_display=='0')
							{
							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + CIDcheck;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

					//		alert(document.getElementById("MainStatuSSpan").innerHTML);
							document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Calling:"); ?> " + status_display_number + " " + status_display_content + " &nbsp; <?php echo _QXZ("Waiting for Ring..."); ?> " + MD_ring_secondS + " <?php echo _QXZ("seconds"); ?>";
					//		alert("channel not found yet:\n" + campaign);
							}
						}
					else
						{
						if (taskCheckOR == 'YES')
							{
							XDuniqueid = MDlookResponse_array[0];
							XDchannel = MDlookResponse_array[1];
							var XDalert = MDlookResponse_array[2];
							
							if (XDalert == 'ERROR')
								{
								var XDerrorDesc = MDlookResponse_array[3];
								var XDerrorDescSIP = MDlookResponse_array[4];
								var DiaLAlerTMessagE = "<?php echo _QXZ("Call Rejected:"); ?> " + XDchannel + "\n" + XDerrorDesc + "\n" + XDerrorDescSIP;
								TimerActionRun("DiaLAlerT",DiaLAlerTMessagE);
								}
							if ( (XDchannel.match(regMDL)) && (asterisk_version != '1.0.8') && (asterisk_version != '1.0.9') && (MD_ring_secondS < 10) )
								{
								// bad grab of Local channel, try again
								MD_ring_secondS++;
								}
							else
								{
								document.vicidial_form.xferuniqueid.value	= MDlookResponse_array[0];
								document.vicidial_form.xferchannel.value	= MDlookResponse_array[1];
								lastxferchannel = MDlookResponse_array[1];
								document.vicidial_form.xferlength.value		= 0;

								XD_live_customer_call = 1;
								XD_live_call_secondS = 0;
								MD_channel_look=0;

								var called3rdparty = document.vicidial_form.xfernumber.value;
								if (hide_xfer_number_to_dial=='ENABLED')
									{called3rdparty=' ';}
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Called 3rd party:"); ?> " + called3rdparty + " " + status_display_content;

                                document.getElementById("Leave3WayCall").innerHTML ="<a href=\"#\" onclick=\"leave_3way_call('FIRST','YES');return false;\" class=\"btn btn-danger btn-app\"><i class=\"fa fa-sign-out\"></i></a>";

                                document.getElementById("DialWithCustomer").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer_OFF.gif"); ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" />";

                                document.getElementById("ParkCustomerDial").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial_OFF.gif"); ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" />";

                                document.getElementById("HangupXferLine").innerHTML ="<a href=\"#\" onclick=\"xfercall_send_hangup('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hangupxferline.gif"); ?>\" border=\"0\" alt=\"Hangup Xfer Line\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkxferline_ON.gif"); ?>\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" onclick=\"bothcall_send_hangup('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hangupbothlines.gif"); ?>\" border=\"0\" alt=\"Hangup Both Lines\" style=\"vertical-align:middle\" /></a>";

								xferchannellive=1;
								XDcheck = '';
								}
							}
						else
							{
							MDuniqueid = MDlookResponse_array[0];
							MDchannel = MDlookResponse_array[1];
							var MDalert = MDlookResponse_array[2];
							
							if (MDalert == 'ERROR')
								{
								var MDerrorDesc = MDlookResponse_array[3];
								var MDerrorDescSIP = MDlookResponse_array[4];
								var DiaLAlerTMessagE = "<?php echo _QXZ("Call Rejected:"); ?> " + MDchannel + "\n" + MDerrorDesc + "\n" + MDerrorDescSIP;
								TimerActionRun("DiaLAlerT",DiaLAlerTMessagE);
								}
							if ( (MDchannel.match(regMDL)) && (asterisk_version != '1.0.8') && (asterisk_version != '1.0.9') )
								{
								// bad grab of Local channel, try again
								MD_ring_secondS++;
								}
							else
								{
								custchannellive=1;

								document.vicidial_form.uniqueid.value		= MDlookResponse_array[0];
								document.getElementById("callchannel").innerHTML	= MDlookResponse_array[1];
								lastcustchannel = MDlookResponse_array[1];
								if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
								document.vicidial_form.SecondS.value		= 0;
								document.getElementById("SecondSDISP").innerHTML = '0';

								VD_live_customer_call = 1;
								VD_live_call_secondS = 0;
								customer_sec=0;

								MD_channel_look=0;
								var dispnum = lead_dial_number;
								var status_display_number = phone_number_format(dispnum);
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Called:"); ?> " + status_display_number + " " + status_display_content + " &nbsp;"; 

                                document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall.gif"); ?>\" border=\"0\" alt=\"Park Call\" /></a>";
								if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
									{
                                    document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif"); ?>\" border=\"0\" alt=\"IVR Park Call\" /></a>";
									}
                                                                        $('.DTMF-BTN-keyboard').show();
                                document.getElementById("HangupControl").innerHTML = "<a href=\"#\" onclick=\"dialedcall_send_hangup('','','','','YES');\" class='btn btn-danger'><i class='fa fa-phone fa-rotate-hangup'></i></a>";

                                document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class='btn btn-primary'><i class='fa fa-share'></i></a>";

                                document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_localcloser.gif"); ?>\" border=\"0\" alt=\"LOCAL CLOSER\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_blindtransfer.gif"); ?>\" border=\"0\" alt=\"Dial Blind Transfer\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_ammessage.gif"); ?>\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + MDchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_up.gif"); ?>\" border=\"0\"></a>";
                                document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + MDchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_down.gif"); ?>\" border=\"0\"></a>";

								if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
									{
									quick_transfer_button_orig='';
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = default_xfer_group;}

                                    document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}
								if (prepopulate_transfer_preset_enabled > 0)
									{
									if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									}
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{
									if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									quick_transfer_button_orig='';
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

                                    document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}

								if (custom_3way_button_transfer_enabled > 0)
									{
									document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" /></a>";
									}

								if (call_requeue_button > 0)
									{
									var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
									var regCRB = new RegExp("AGENTDIRECT","ig");
									if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
										{
                                        document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
										}
									else
										{
                                        document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call_OFF.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" />";
										}
									}

								// Build transfer pull-down list
								var loop_ct = 0;
								var live_XfeR_HTML = '';
								var XfeR_SelecT = '';
								while (loop_ct < XFgroupCOUNT)
									{
									if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
										{XfeR_SelecT = 'selected ';}
									else {XfeR_SelecT = '';}
									live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
									loop_ct++;
									}
                                                                        
                                document.getElementById("XfeRGrouPLisT").innerHTML = "<select size=\"1\" name=\"XfeRGrouP\" id=\"XfeRGrouP\" class=\"form-control\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

								// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
								DialLog("start");

								custchannellive=1;
								}
							}
						}
					}
				}
			delete xmlhttp;
			}

		if ( (MD_ring_secondS > 49) && (MD_ring_secondS > manual_dial_timeout) )
			{
			MD_channel_look=0;
			MD_ring_secondS=0;
			alert_box("Dial timed out, contact your system administrator\n");

			if (taskCheckOR == 'YES')
				{
				document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer.gif"); ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" /></a>";
				document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial.gif"); ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" /></a>";
				}
			}
		}

// ################################################################################
// Update Agent screen with values from vicidial_list record
	function UpdateFieldsData()
		{
		var fields_list = update_fields_data + ',';
		update_fields=0;
		update_fields_data='';
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			UpdateFields_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=UpdateFields&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&stage=" + update_fields_data;
			//		alert(manual_dial_filter + "\n" +manDiaLnext_query);
			xmlhttp.open('POST', 'utg_vdc_db_query.php');
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(UpdateFields_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var UDfieldsResponse = null;
				//	alert(UpdateFields_query);
				//	alert(xmlhttp.responseText);
					UDfieldsResponse = xmlhttp.responseText;

					var UDfieldsResponse_array=UDfieldsResponse.split("\n");
                                        console.log(UDfieldsResponse_array);

					var UDresponse_status							= UDfieldsResponse_array[0];
					if (UDresponse_status == 'GOOD')
						{
						var regUDvendor_lead_code = new RegExp("vendor_lead_code,","ig");
						if (fields_list.match(regUDvendor_lead_code))
							{document.vicidial_form.vendor_lead_code.value	= UDfieldsResponse_array[1];}
						var regUDsource_id = new RegExp("source_id,","ig");
						if (fields_list.match(regUDsource_id))
							{source_id										= UDfieldsResponse_array[2];}
						var regUDgmt_offset_now = new RegExp("gmt_offset_now,","ig");
						if (fields_list.match(regUDgmt_offset_now))
							{document.vicidial_form.gmt_offset_now.value	= UDfieldsResponse_array[3];}
						var regUDphone_code = new RegExp("phone_code,","ig");
						if (fields_list.match(regUDphone_code))
							{document.vicidial_form.phone_code.value		= UDfieldsResponse_array[4];}
						var regUDphone_number = new RegExp("phone_number,","ig");
						if (fields_list.match(regUDphone_number))
							{
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= UDfieldsResponse_array[5];
									}
								}
                                                                console.log('Hi 1234');
							document.vicidial_form.phone_number.value		= UDfieldsResponse_array[5];
							}
						var regUDtitle = new RegExp("title,","ig");
						if (fields_list.match(regUDtitle))
							{document.vicidial_form.title.value				= UDfieldsResponse_array[6];}
						var regUDfirst_name = new RegExp("first_name,","ig");
						if (fields_list.match(regUDfirst_name))
							{document.vicidial_form.first_name.value		= UDfieldsResponse_array[7];}
						var regUDmiddle_initial = new RegExp("middle_initial,","ig");
						if (fields_list.match(regUDmiddle_initial))
							{document.vicidial_form.middle_initial.value	= UDfieldsResponse_array[8];}
						var regUDlast_name = new RegExp("last_name,","ig");
						if (fields_list.match(regUDlast_name))
							{document.vicidial_form.last_name.value			= UDfieldsResponse_array[9];}
						var regUDaddress1 = new RegExp("address1,","ig");
						if (fields_list.match(regUDaddress1))
							{document.vicidial_form.address1.value			= UDfieldsResponse_array[10];}
						var regUDaddress2 = new RegExp("address2,","ig");
						if (fields_list.match(regUDaddress2))
							{document.vicidial_form.address2.value			= UDfieldsResponse_array[11];}
						var regUDaddress3 = new RegExp("address3,","ig");
						if (fields_list.match(regUDaddress3))
							{document.vicidial_form.address3.value			= UDfieldsResponse_array[12];}
						var regUDcity = new RegExp("city,","ig");
						if (fields_list.match(regUDcity))
							{document.vicidial_form.city.value				= UDfieldsResponse_array[13];}
						var regUDstate = new RegExp("state,","ig");
						if (fields_list.match(regUDstate))
							{document.vicidial_form.state.value				= UDfieldsResponse_array[14];}
						var regUDprovince = new RegExp("province,","ig");
						if (fields_list.match(regUDprovince))
							{document.vicidial_form.province.value			= UDfieldsResponse_array[15];}
						var regUDpostal_code = new RegExp("postal_code,","ig");
						if (fields_list.match(regUDpostal_code))
							{document.vicidial_form.postal_code.value		= UDfieldsResponse_array[16];}
						var regUDcountry_code = new RegExp("country_code,","ig");
						if (fields_list.match(regUDcountry_code))
							{document.vicidial_form.country_code.value		= UDfieldsResponse_array[17];}
						var regUDgender = new RegExp("gender,","ig");
						if (fields_list.match(regUDgender))
							{
							document.vicidial_form.gender.value				= UDfieldsResponse_array[18];
							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value		= UDfieldsResponse_array[18];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}
							}
						var regUDdate_of_birth = new RegExp("date_of_birth,","ig");
						if (fields_list.match(regUDdate_of_birth))
							{document.vicidial_form.date_of_birth.value		= UDfieldsResponse_array[19];}
						var regUDalt_phone = new RegExp("alt_phone,","ig");
						if (fields_list.match(regUDalt_phone))
							{document.vicidial_form.alt_phone.value			= UDfieldsResponse_array[20];}
						var regUDemail = new RegExp("email,","ig");
						if (fields_list.match(regUDemail))
							{document.vicidial_form.email.value				= UDfieldsResponse_array[21];}
						var regUDsecurity_phrase = new RegExp("security_phrase,","ig");
						if (fields_list.match(regUDsecurity_phrase))
							{document.vicidial_form.security_phrase.value	= UDfieldsResponse_array[22];}
						var regUDcomments = new RegExp("comments,","ig");
						if (fields_list.match(regUDcomments))
							{
							var REGcommentsNL = new RegExp("!N","g");
							UDfieldsResponse_array[23] = UDfieldsResponse_array[23].replace(REGcommentsNL, "\n");
							if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
								{document.vicidial_form.other_tab_comments.value = UDfieldsResponse_array[23];}
							else
								{document.vicidial_form.comments.value			= UDfieldsResponse_array[23];}
							}
						var regUDrank = new RegExp("rank,","ig");
						if (fields_list.match(regUDrank))
							{document.vicidial_form.rank.value				= UDfieldsResponse_array[24];}
						var regUDowner = new RegExp("owner,","ig");
						if (fields_list.match(regUDowner))
							{document.vicidial_form.owner.value				= UDfieldsResponse_array[25];}
						var regUDformreload = new RegExp("formreload,","ig");
						if (fields_list.match(regUDformreload))
							{FormContentsLoad();}

						// JOEJ 082812 - new for email feature
						var regUDemailreload = new RegExp("emailreload,","ig");
						if (fields_list.match(regUDemailreload))
							{EmailContentsLoad();}

						// JOEJ 060514 - new for chat feature
						var regUDchatreload = new RegExp("chatreload,","ig");
						if (fields_list.match(regUDchatreload))
							{CustomerChatContentsLoad();}

						var regWFAcustom = new RegExp("^VAR","ig");
						if (VDIC_web_form_address.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
							TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
							}

						if (VDIC_web_form_address_two.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
							TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
							}

						if (VDIC_web_form_address_three.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
							TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
							}
                                                        console.log('Script 7');
                        document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";
						if (enable_second_webform > 0)
							{
                            document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
							}
						if (enable_third_webform > 0)
							{
                            document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
							}
						}
					else
						{
						alert_box("Update Fields Error!: " + xmlhttp.responseText);
						}
					}
				}
			}
		}


// ################################################################################
// Send the Manual Dial Next Number request
	function ManualDialNext(mdnCBid,mdnBDleadid,mdnDiaLCodE,mdnPhonENumbeR,mdnStagE,mdVendorid,mdgroupalias,mdtype,MDNclick)
		{
		if (MDNclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialNext---" + mdnCBid + " " + mdnBDleadid + " " + mdnDiaLCodE + " " + mdnPhonENumbeR + " " + mdnStagE + " " + mdVendorid + " " + mdgroupalias + " " + mdtype + "|";}
		UpdatESettingS();
		if (waiting_on_dispo > 0)
			{
			alert_box("<?php echo _QXZ("System Delay, Please try again"); ?><BR><font size=1><?php echo _QXZ("code:"); ?>" + agent_log_id + " - " + waiting_on_dispo + " - " + manual_auto_hotkey_wait + "</font>");

			dial_next_failed=1;
			var alert_displayed=0;
			trigger_ready=1;
			alt_phone_dialing=starting_alt_phone_dialing;
			auto_dial_level=starting_dial_level;
			MainPanelToFront();
			CalLBacKsCounTCheck();

			if (starting_dial_level == 0)
				{
				document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
				}
			else
				{
				if (dial_method == "INBOUND_MAN")
					{
					auto_dial_level=starting_dial_level;

					document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif"); ?>\" border=\"0\" alt=\"You are paused\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
					}
				document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
				document.getElementById("MainStatuSSpanOLD").style.background = panel_bgcolor;
				reselect_alt_dial = 0;
				}
			}
		else
			{
			inOUT = 'OUT';
			all_record = 'NO';
			all_record_count=0;
			if (dial_method == "INBOUND_MAN")
				{
				auto_dial_level=0;

				if (VDRP_stage != 'PAUSED')
					{
					agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','',"DIALNEXT",'1','NXDIAL');

				//	PauseCodeSelect_submit("NXDIAL");
					}
				else
					{auto_dial_level=starting_dial_level;}

				document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
				}
			else
				{
				if (active_ingroup_dial.length < 1)
					{
					document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
					}
				}
			var manual_dial_only_type_flag = '';
			if ( (mdtype == 'ALT') || (mdtype == 'ADDR3') )
				{
				agent_dialed_type = mdtype;
				agent_dialed_number = mdnPhonENumbeR;
				if (mdtype == 'ALT')
					{manual_dial_only_type_flag = 'ALTPhonE';}
				if (mdtype == 'ADDR3')
					{manual_dial_only_type_flag = 'AddresS3';}
				}
			if ( (document.vicidial_form.LeadPreview.checked==true) && (active_ingroup_dial.length < 1) )
				{
				reselect_preview_dial = 1;
				in_lead_preview_state = 1;
				var man_preview = 'YES';

				if (alt_phone_dialing == 1)
					{
					var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES')\"><font class=\"preview_text\"> <?php echo _QXZ("DIAL LEAD"); ?></font></a> or <a href=\"#\" onclick=\"ManualDialSkip('YES')\"><font class=\"preview_text\"><?php echo _QXZ("SKIP LEAD"); ?></font></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ALT PHONE"); ?></font></a> or <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ADDRESS3"); ?></font></a>"; 
					if (manual_preview_dial=='PREVIEW_ONLY')
						{
						var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES')\"><font class=\"preview_text\"> <?php echo _QXZ("DIAL LEAD"); ?></font></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ALT PHONE"); ?></font></a> or <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES')\"><font class=\"preview_text\"><?php echo _QXZ("ADDRESS3"); ?></font></a>"; 
						}
					}
				else
					{
					var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES')\"><font class=\"preview_text\"> <?php echo _QXZ("DIAL LEAD"); ?></font></a> or <a href=\"#\" onclick=\"ManualDialSkip('YES')\"><font class=\"preview_text\"><?php echo _QXZ("SKIP LEAD"); ?></font></a>"; 
					if (manual_preview_dial=='PREVIEW_ONLY')
						{
						var man_status = "<?php echo _QXZ("Preview the Lead then"); ?> <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES')\"><font class=\"preview_text\"> <?php echo _QXZ("DIAL LEAD"); ?></font></a>"; 
						}
					}
				}
			else
				{
				reselect_preview_dial = 0;
				var man_preview = 'NO';
				var man_status = "<?php echo _QXZ("Waiting for Ring..."); ?>"; 
				}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				if (cid_choice.length > 3) 
					{var call_cid = cid_choice;}
				else 
					{
					var call_cid = campaign_cid;
					if (manual_dial_cid == 'AGENT_PHONE')
						{
						cid_lock=1;
						call_cid = outbound_cid;
						}
					}
				if (prefix_choice.length > 0)
					{var call_prefix = prefix_choice;}
				else
					{var call_prefix = manual_dial_prefix;}

				manDiaLnext_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=manDiaLnextCaLL&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&ext_context=" + ext_context + "&dial_timeout=" + manual_dial_timeout + "&dial_prefix=" + call_prefix + "&campaign_cid=" + call_cid + "&preview=" + man_preview + "&agent_log_id=" + agent_log_id + "&callback_id=" + mdnCBid + "&lead_id=" + mdnBDleadid + "&phone_code=" + mdnDiaLCodE + "&phone_number=" + mdnPhonENumbeR + "&list_id=" + mdnLisT_id + "&stage=" + mdnStagE  + "&use_internal_dnc=" + use_internal_dnc + "&use_campaign_dnc=" + use_campaign_dnc + "&omit_phone_code=" + omit_phone_code + "&manual_dial_filter=" + manual_dial_filter + "&manual_dial_search_filter=" + manual_dial_search_filter + "&vendor_lead_code=" + mdVendorid + "&usegroupalias=" + mdgroupalias + "&account=" + active_group_alias + "&agent_dialed_number=" + agent_dialed_number + "&agent_dialed_type=" + agent_dialed_type + "&vtiger_callback_id=" + vtiger_callback_id + "&dial_method=" + dial_method + "&manual_dial_call_time_check=" + manual_dial_call_time_check + "&qm_extension=" + qm_extension + "&dial_ingroup=" + active_ingroup_dial + "&nocall_dial_flag=" + nocall_dial_flag + "&cid_lock=" + cid_lock;
				//		alert(manual_dial_filter + "\n" +manDiaLnext_query);
				xmlhttp.open('POST', 'utg_vdc_db_query.php');
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(manDiaLnext_query); 
				xmlhttp.onreadystatechange = function() 
					{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var MDnextResponse = null;
					//	alert(manDiaLnext_query + "\n" + xmlhttp.responseText);
					//	document.getElementById("debugbottomspan").innerHTML = manDiaLnext_query + "\n" + xmlhttp.responseText;
						MDnextResponse = xmlhttp.responseText;

						if (active_ingroup_dial.length > 0)
							{
							AutoDial_ReSume_PauSe("VDADready",'','','NO_STATUS_CHANGE');
							AutoDialWaiting=1;
							}
						else
							{
							var MDnextResponse_array=MDnextResponse.split("\n");
							MDnextCID = MDnextResponse_array[0];
							LastCallCID = MDnextResponse_array[0];

							var regMNCvar = new RegExp("HOPPER EMPTY","ig");
							var regMDFvarDNC = new RegExp("DNC","ig");
							var regMDFvarCAMP = new RegExp("CAMPLISTS","ig");
							var regMDFvarTIME = new RegExp("OUTSIDE","ig");
							if ( (MDnextCID.match(regMNCvar)) || (MDnextCID.match(regMDFvarDNC)) || (MDnextCID.match(regMDFvarCAMP)) || (MDnextCID.match(regMDFvarTIME)) )
								{
								dial_next_failed=1;
								var alert_displayed=0;
								trigger_ready=1;
								alt_phone_dialing=starting_alt_phone_dialing;
								auto_dial_level=starting_dial_level;
								MainPanelToFront();
								CalLBacKsCounTCheck();
								InternalChatsCheck(); 

								if (MDnextCID.match(regMNCvar))
									{alert_box("<?php echo _QXZ("No more leads in the hopper for campaign:"); ?>\n" + campaign);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarDNC))
									{alert_box("<?php echo _QXZ("This phone number is in the DNC list:"); ?>\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarCAMP))
									{alert_box("<?php echo _QXZ("This phone number is not in the campaign lists:"); ?>\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarTIME))
									{alert_box("<?php echo _QXZ("This phone number is outside of the local call time:"); ?>\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (alert_displayed==0)						
									{alert_box("<?php echo _QXZ("Unspecified error:"); ?>\n" + mdnPhonENumbeR + "|" + MDnextCID);   alert_displayed=1;}

								if (starting_dial_level == 0)
									{
									document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
									}
								else
									{
									if (dial_method == "INBOUND_MAN")
										{
										auto_dial_level=starting_dial_level;

										document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif"); ?>\" border=\"0\" alt=\"You are paused\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
										}
									else
										{
										document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
										}
									document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
									document.getElementById("MainStatuSSpanOLD").style.background = panel_bgcolor;
									reselect_alt_dial = 0;
									}
								}
							else
								{
                                                                console.log('HI 123 OK');
								fronter = user;
								LasTCID											= MDnextResponse_array[0];
								if(MDnextResponse_array[61]){
                                                                    var CustomArray = MDnextResponse_array[61].split(':');
                                                                    var CustomNewArray = CustomArray.filter(Boolean);
                                                                    
                                                                    $.each(CustomNewArray, function(index, item){
                                                                        var NewItem = item.split('-');
                                                                        $('.CustomFieldsDiv').append('<div class="col-6">'+
                                                                                        '<div class="input-group">'+
                                                                                            '<div class="input-group-addon">'+
                                                                                                '<i class="fa fa-user"></i>'+
                                                                                            '</div>'+
                                                                                            '<input type="text" class="form-control CustomFieldInput" name="'+NewItem[0]+'" id="'+NewItem[0]+'" value="'+NewItem[1]+'" placeholder="'+NewItem[2]+'" readonly/>'+
                                                                                        '</div>'+
                                                                                        '</div>');
                                                                    });
                                                                    
                                                                }
                                                               
                                                                
                                                                document.vicidial_form.lead_id.value			= MDnextResponse_array[1];
								LeaDPreVDispO									= MDnextResponse_array[2];
								document.vicidial_form.vendor_lead_code.value	= MDnextResponse_array[4];
								document.vicidial_form.list_id.value			= MDnextResponse_array[5];
								document.vicidial_form.gmt_offset_now.value		= MDnextResponse_array[6];
								document.vicidial_form.phone_code.value			= MDnextResponse_array[7];
								if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
									{
									var tmp_pn = document.getElementById("phone_numberDISP");
									if (disable_alter_custphone=='Y')
										{
										tmp_pn.innerHTML						= MDnextResponse_array[8];
										}
									}
                                                                        
								document.vicidial_form.phone_number.value		= MDnextResponse_array[8];
								document.vicidial_form.title.value				= MDnextResponse_array[9];
								document.vicidial_form.first_name.value			= MDnextResponse_array[10];
								document.vicidial_form.middle_initial.value		= MDnextResponse_array[11];
								document.vicidial_form.last_name.value			= MDnextResponse_array[12];
								document.vicidial_form.address1.value			= MDnextResponse_array[13];
								document.vicidial_form.address2.value			= MDnextResponse_array[14];
								document.vicidial_form.address3.value			= MDnextResponse_array[15];
								document.vicidial_form.city.value				= MDnextResponse_array[16];
								document.vicidial_form.state.value				= MDnextResponse_array[17];
								document.vicidial_form.province.value			= MDnextResponse_array[18];
								document.vicidial_form.postal_code.value		= MDnextResponse_array[19];
								document.vicidial_form.country_code.value		= MDnextResponse_array[20];
								document.vicidial_form.gender.value				= MDnextResponse_array[21];
								document.vicidial_form.date_of_birth.value		= MDnextResponse_array[22];
								document.vicidial_form.alt_phone.value			= MDnextResponse_array[23];
								document.vicidial_form.email.value				= MDnextResponse_array[24];
								document.vicidial_form.security_phrase.value	= MDnextResponse_array[25];
								var REGcommentsNL = new RegExp("!N","g");
								MDnextResponse_array[26] = MDnextResponse_array[26].replace(REGcommentsNL, "\n");
								document.vicidial_form.comments.value			= MDnextResponse_array[26];
								document.vicidial_form.called_count.value		= MDnextResponse_array[27];
								previous_called_count							= MDnextResponse_array[27];
								previous_dispo									= MDnextResponse_array[2];
								CBentry_time									= MDnextResponse_array[28];
								CBcallback_time									= MDnextResponse_array[29];
								CBuser											= MDnextResponse_array[30];
								CBcomments										= MDnextResponse_array[31];
								dialed_number									= MDnextResponse_array[32];
								dialed_label									= MDnextResponse_array[33];
								source_id										= MDnextResponse_array[34];
								document.vicidial_form.rank.value				= MDnextResponse_array[35];
								document.vicidial_form.owner.value				= MDnextResponse_array[36];
							//	CalL_ScripT_id									= MDnextResponse_array[37];
								script_recording_delay							= MDnextResponse_array[38];
								CalL_XC_a_NuMber								= MDnextResponse_array[39];
								CalL_XC_b_NuMber								= MDnextResponse_array[40];
								CalL_XC_c_NuMber								= MDnextResponse_array[41];
								CalL_XC_d_NuMber								= MDnextResponse_array[42];
								CalL_XC_e_NuMber								= MDnextResponse_array[43];
								document.vicidial_form.entry_list_id.value		= MDnextResponse_array[44];
								custom_field_names								= MDnextResponse_array[45];
								custom_field_values								= MDnextResponse_array[46];
								custom_field_types								= MDnextResponse_array[47];
								var list_webform								= MDnextResponse_array[48];
								var list_webform_two							= MDnextResponse_array[49];
								post_phone_time_diff_alert_message				= MDnextResponse_array[50];
							//Added By Poundteam for Audited Comments (Manual Dial Section Only)
							if (qc_enabled > 0)
									{
									document.vicidial_form.ViewCommentButton.value		= MDnextResponse_array[51];
									document.vicidial_form.audit_comments_button.value	= MDnextResponse_array[51];
									if (comments_all_tabs == 'ENABLED')
										{document.vicidial_form.OtherViewCommentButton.value = MDnextResponse_array[51];}
									var REGACcomments 			= new RegExp("!N","g");
									var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
									var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACcomments, "\n");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACfontbegin, "<font color=red>");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACfontend, "</font>");
									document.getElementById("audit_comments").innerHTML = MDnextResponse_array[52];
									if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (MDnextResponse_array[51]!='0') && (MDnextResponse_array[51]!='') )
										{ViewComments('ON');}
									}
							//END section Added By Poundteam for Audited Comments

								document.vicidial_form.list_name.value			= MDnextResponse_array[53];
								var list_webform_three							= MDnextResponse_array[54];
								CalL_ScripT_color								= MDnextResponse_array[55];
								document.vicidial_form.list_description.value	= MDnextResponse_array[56];
								entry_date										= MDnextResponse_array[57];
								status_group_statuses_data						= MDnextResponse_array[58];
								last_call_date									= MDnextResponse_array[59];

								// build statuses list for disposition screen
								VARstatuses = [];
								VARstatusnames = [];
								VARSELstatuses = [];
								VARCBstatuses = [];
								VARMINstatuses = [];
								VARMAXstatuses = [];
								VARCBstatusesLIST = '';
								VD_statuses_ct = 0;
								VARSELstatuses_ct = 0;
								gVARstatuses = [];
								gVARstatusnames = [];
								gVARSELstatuses = [];
								gVARCBstatuses = [];
								gVARMINstatuses = [];
								gVARMAXstatuses = [];
								gVARCBstatusesLIST = '';
								gVD_statuses_ct = 0;
								gVARSELstatuses_ct = 0;

								if (status_group_statuses_data.length > 7)
									{
									var gVARstatusesRAW=status_group_statuses_data.split(',');
									var gVARstatusesRAWct = gVARstatusesRAW.length;
									var loop_gct=0;
									while (loop_gct < gVARstatusesRAWct)
										{
										var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
										var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
										gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
										gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
										gVARSELstatuses[loop_gct] =	'Y';
										gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
										gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
										gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
										if (gVARCBstatuses[loop_gct] == 'Y')
											{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
										gVD_statuses_ct++;
										gVARSELstatuses_ct++;

										loop_gct++;
										}
									}
								else
									{
									gVARstatuses = cVARstatuses;
									gVARstatusnames = cVARstatusnames;
									gVARSELstatuses = cVARSELstatuses;
									gVARCBstatuses = cVARCBstatuses;
									gVARMINstatuses = cVARMINstatuses;
									gVARMAXstatuses = cVARMAXstatuses;
									gVARCBstatusesLIST = cVARCBstatusesLIST;
									gVD_statuses_ct = cVD_statuses_ct;
									gVARSELstatuses_ct = cVARSELstatuses_ct;
									}

								VARstatuses = sVARstatuses.concat(gVARstatuses);
								VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
								VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
								VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
								VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
								VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
								VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
								VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
								VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

						//	document.getElementById("debugbottomspan").innerHTML = VARCBstatusesLIST + '<br>' + gVARCBstatusesLIST + '|' + cVARCBstatusesLIST + '|' + gVARstatusesDETAILS[2] + '|' + MDnextResponse_array[58] + '|' + loop_gct;

								var HKdebug='';
								var HKboxAtemp='';
								var HKboxBtemp='';
								var HKboxCtemp='';
								if (HK_statuses_camp > 0)
									{
									hotkeys = [];
									var temp_HK_valid_ct=0;
									while (HK_statuses_camp > temp_HK_valid_ct)
										{
										var temp_VARstatuses_ct=0;
										while (VD_statuses_ct > temp_VARstatuses_ct)
											{
											if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
												{
												hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

												if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
													{
													HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
													{
													HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
													{
													HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
													}

												HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
												}
											temp_VARstatuses_ct++;
											}
										temp_HK_valid_ct++;
										}
									document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
									document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
									document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;

								//	document.getElementById("debugbottomspan").innerHTML = "DEBUG: UnixTime " + HKdebug;
									}

								if (agent_display_fields.match(adfREGentry_date))
									{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
								if (agent_display_fields.match(adfREGsource_id))
									{document.getElementById("source_idDISP").innerHTML = source_id;}
								if (agent_display_fields.match(adfREGdate_of_birth))
									{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
								if (agent_display_fields.match(adfREGrank))
									{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
								if (agent_display_fields.match(adfREGowner))
									{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
								if (agent_display_fields.match(adfREGlast_local_call_time))
									{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
					
								lead_dial_number = dialed_number;
								var dispnum = dialed_number;
								var status_display_number = phone_number_format(dispnum);
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + MDnextCID;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Calling:"); ?> " + status_display_number + " " + status_display_content + " &nbsp; " + man_status;
								if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

								if (hide_gender > 0)
									{
									document.vicidial_form.gender_list.value		= MDnextResponse_array[21];
									}
								else
									{
									var gIndex = 0;
									if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
									if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
									document.getElementById("gender_list").selectedIndex = gIndex;
									var genderIndex = document.getElementById("gender_list").selectedIndex;
									var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
									document.vicidial_form.gender.value = genderValue;
									}

								LeaDDispO='';
                                                                <!--console.log(VICIDiaL_web_form_address);-->
								VDIC_web_form_address = VICIDiaL_web_form_address;
								VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
								VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
								if (list_webform.length > 5) {VDIC_web_form_address=list_webform;}
								if (list_webform_two.length > 5) {VDIC_web_form_address_two=list_webform_two;}
								if (list_webform_three.length > 5) {VDIC_web_form_address_three=list_webform_three;}

								var regWFAcustom = new RegExp("^VAR","ig");
								if (VDIC_web_form_address.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
									TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
									}

								if (VDIC_web_form_address_two.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
									}

								if (VDIC_web_form_address_three.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
									}
                                                                        <!--console.log('Script 1');-->
                                                                        <!--console.log(VDIC_web_form_address);-->
                                                                        <!--console.log(TEMP_VDIC_web_form_address);-->
								document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";
								if (enable_second_webform > 0)
									{
									document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
									}
								if (enable_third_webform > 0)
									{
									document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
									}

								if (CBentry_time.length > 2)
									{
									document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("PREVIOUS CALLBACK"); ?> </b>";
									document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
									document.getElementById("CBcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Last Call:"); ?> </b>" + CBentry_time;
									document.getElementById("CBcommentsBoxB").innerHTML = "<b><?php echo _QXZ("CallBack:"); ?> </b>" + CBcallback_time;
									document.getElementById("CBcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Agent:"); ?> </b>" + CBuser;
									document.getElementById("CBcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Comments:"); ?> </b><br>" + CBcomments;
									if (show_previous_callback == 'ENABLED')
										{showDiv('CBcommentsBox');}
									}

								if (post_phone_time_diff_alert_message.length > 10)
									{
									document.getElementById("post_phone_time_diff_span_contents").innerHTML = " &nbsp; &nbsp; " + post_phone_time_diff_alert_message + "<br>";
									showDiv('post_phone_time_diff_span');
									}

								if (CalL_ScripT_color.length > 1)
									{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}

								if (document.vicidial_form.LeadPreview.checked==false)
									{
									reselect_preview_dial = 0;
									MD_channel_look=1;
									custchannellive=1;
                                                                        $('.DTMF-BTN-keyboard').show();
									document.getElementById("HangupControl").innerHTML = "<a href=\"#\" onclick=\"dialedcall_send_hangup('','','','','YES');\" class='btn btn-danger'><i class='fa fa-phone fa-rotate-hangup'></i></a>";

									if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
										{all_record = 'YES';}

									if ( (view_scripts == 1) && (campaign_script.length > 0) )
										{
										var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
										var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

										if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
											{
											delayed_script_load = 'YES';
											RefresHScript('CLEAR');
											}
										else
											{
											load_script_contents('ScriptContents','');
											}
										}

									if (custom_fields_enabled > 0)
										{
										FormContentsLoad();
										}
									// JOEJ 082812 - new for email feature
									// Will populate email tab in case this is a customer with an email record AND that the user selected a campaign that handles emails instead of phones
									if (email_enabled > 0 && EMAILgroupCOUNT > 0)
										{
										EmailContentsLoad();
										}
									// JOEJ 060514 - new for chat feature
									// Will populate chat tab in case this is a customer awaiting a chat AND the agent selected a campaign that allows chats
									if (chat_enabled > 0 && CHATgroupCOUNT > 0)
										{
										CustomerChatContentsLoad();
										}
									if (get_call_launch == 'SCRIPT')
										{
										if (delayed_script_load == 'YES')
											{
											load_script_contents('ScriptContents','');
											}
										ScriptPanelToFront();
										}

									if (get_call_launch == 'FORM')
										{
										FormPanelToFront();
										}

									if (get_call_launch == 'EMAIL')
										{
										EmailPanelToFront();
										}

									if (get_call_launch == 'CHAT')
										{
										CustomerChatPanelToFront();
										}

									if (get_call_launch == 'WEBFORM')
										{
										window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										}
									if (get_call_launch == 'WEBFORMTWO')
										{
										window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										}
									if (get_call_launch == 'WEBFORMTHREE')
										{
										window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										}
									}
								else
									{
									if (custom_fields_enabled > 0)
										{
										FormContentsLoad();
										}
									if ( (view_scripts == 1) && (campaign_script.length > 0) )
										{
										var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
										var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');
										RefresHScript();
										}
									reselect_preview_dial = 1;
									}
								}
							}
						}
					}
				delete xmlhttp;

				if (document.vicidial_form.LeadPreview.checked==false)
					{
					active_group_alias='';
					cid_choice='';
					prefix_choice='';
					agent_dialed_number='';
					agent_dialed_type='';
				//	CalL_ScripT_id='';
				//	CalL_ScripT_color='';
					xfer_agent_selected=0;
					}
				}
			}
		}


// ################################################################################
// Send the Manual Dial Skip
	function ManualDialSkip(MDSclick)
		{
		if (MDSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialSkip---|";}
		if (manual_dial_in_progress==1)
			{
			alert_box("<?php echo _QXZ("YOU CANNOT SKIP A CALLBACK OR MANUAL DIAL, YOU MUST DIAL THE LEAD"); ?>");
			}
		else
			{
			in_lead_preview_state=0;
			if (dial_method == "INBOUND_MAN")
				{
				auto_dial_level=starting_dial_level;

                document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
				}
			else
				{
                document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
				}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				manDiaLskip_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=manDiaLskip&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&lead_id=" + document.vicidial_form.lead_id.value + "&stage=" + previous_dispo + "&called_count=" + previous_called_count + "&campaign=" + campaign;
				xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(manDiaLskip_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var MDSnextResponse = null;
					//	alert(manDiaLskip_query);
					//	alert(xmlhttp.responseText);
						MDSnextResponse = xmlhttp.responseText;

						var MDSnextResponse_array=MDSnextResponse.split("\n");
						MDSnextCID = MDSnextResponse_array[0];
						if (MDSnextCID == "LEAD NOT REVERTED")
							{
							alert_box("<?php echo _QXZ("Lead was not reverted, there was an error:"); ?>\n" + MDSnextResponse);
							}
						else
							{
							document.vicidial_form.lead_id.value		='';
							document.vicidial_form.vendor_lead_code.value='';
							document.vicidial_form.list_id.value		='';
							document.vicidial_form.list_name.value		='';
							document.vicidial_form.list_description.value='';
							document.vicidial_form.entry_list_id.value	='';
							document.vicidial_form.gmt_offset_now.value	='';
							document.vicidial_form.phone_code.value		='';
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								tmp_pn.innerHTML			= ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';
								}
                                                                <!--console.log('Hi 123456');-->
							document.vicidial_form.phone_number.value	='';
							document.vicidial_form.title.value			='';
							document.vicidial_form.first_name.value		='';
							document.vicidial_form.middle_initial.value	='';
							document.vicidial_form.last_name.value		='';
							document.vicidial_form.address1.value		='';
							document.vicidial_form.address2.value		='';
							document.vicidial_form.address3.value		='';
							document.vicidial_form.city.value			='';
							document.vicidial_form.state.value			='';
							document.vicidial_form.province.value		='';
							document.vicidial_form.postal_code.value	='';
							document.vicidial_form.country_code.value	='';
							document.vicidial_form.gender.value			='';
							document.vicidial_form.date_of_birth.value	='';
							document.vicidial_form.alt_phone.value		='';
							document.vicidial_form.email.value			='';
							document.vicidial_form.security_phrase.value='';
							document.vicidial_form.comments.value		='';
							document.vicidial_form.other_tab_comments.value		='';
							document.getElementById("audit_comments").innerHTML		='';
							if (qc_enabled > 0)
								{
								document.vicidial_form.ViewCommentButton.value		='';
								document.vicidial_form.audit_comments_button.value	='';
								if (comments_all_tabs == 'ENABLED')
									{document.vicidial_form.OtherViewCommentButton.value ='';}
								}
							document.vicidial_form.called_count.value	='';
							document.vicidial_form.rank.value			='';
							document.vicidial_form.owner.value			='';
							VDCL_group_id = '';
							fronter = '';
							previous_called_count = '';
							previous_dispo = '';
							custchannellive=1;
							customer_sec=0;
							xfer_agent_selected=0;
							source_id='';
							entry_date='';
							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = ' &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = ' &nbsp; ';}

							if (post_phone_time_diff_alert_message.length > 10)
								{
								document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
								hideDiv('post_phone_time_diff_span');
								}

							document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Lead skipped, go on to next lead"); ?>";

							if (dial_method == "INBOUND_MAN")
								{
                                document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif"); ?>\" border=\"0\" alt=\"You are paused\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
								}
							else
								{
                                document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
								}
							}
						}
					}
				delete xmlhttp;
				active_group_alias='';
				cid_choice='';
				prefix_choice='';
				agent_dialed_number='';
				agent_dialed_type='';
			//	CalL_ScripT_id='';
			//	CalL_ScripT_color='';
				dial_next_failed=0;
				xfer_agent_selected=0;
				RefresHScript('CLEAR');
				ViewComments('OFF','OFF');
				last_call_date='';
			//	document.getElementById('vcFormIFrame').src='./vdc_form_display.php?lead_id=&list_id=&stage=WELCOME';
				}
			}
		}


// ################################################################################
// Send the Manual Dial Only - dial the previewed lead
	function ManualDialOnly(taskaltnum,MDOclick)
		{
		if (MDOclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialOnly---" + taskaltnum + "|";}
		UpdatESettingS();
		in_lead_preview_state=0;
		inOUT = 'OUT';
		alt_dial_status_display = 0;
		all_record = 'NO';
		all_record_count=0;
		document.vicidial_form.uniqueid.value='';
		var usegroupalias=0;
		if (taskaltnum == 'ALTPhonE')
			{
			var manDiaLonly_num = document.vicidial_form.alt_phone.value;
			lead_dial_number = document.vicidial_form.alt_phone.value;
			dialed_number = lead_dial_number;
			dialed_label = 'ALT';
			WebFormRefresH('');
			WebFormTwoRefresH('');
			WebFormThreeRefresH('');
			}
		else
			{
			if (taskaltnum == 'AddresS3')
				{
				var manDiaLonly_num = document.vicidial_form.address3.value;
				lead_dial_number = document.vicidial_form.address3.value;
				dialed_number = lead_dial_number;
				dialed_label = 'ADDR3';
				WebFormRefresH('');
				WebFormTwoRefresH('');
				WebFormThreeRefresH('');
				}
			else
				{
				var manDiaLonly_num = document.vicidial_form.phone_number.value;
				lead_dial_number = document.vicidial_form.phone_number.value;
				dialed_number = lead_dial_number;
				dialed_label = 'MAIN';
				WebFormRefresH('');
				WebFormTwoRefresH('');
				WebFormThreeRefresH('');
				}
			}
		if (dialed_label == 'ALT')
            {document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ALT"); ?> </b>";}
		if (dialed_label == 'ADDR3')
            {document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ADDRESS3"); ?> </b>";}
		last_mdtype = dialed_label;
		var REGalt_dial = new RegExp("X","g");
		if (dialed_label.match(REGalt_dial))
			{
            document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER:"); ?> " + dialed_label + "</b>";
			document.getElementById("EAcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Phone Code and Number:"); ?> </b>" + EAphone_code + " " + EAphone_number;

			var EAactive_link = '';
			if (EAalt_phone_active == 'Y') 
				{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
			else
				{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

            document.getElementById("EAcommentsBoxB").innerHTML = "<b><?php echo _QXZ("Active:"); ?> </b>" + EAalt_phone_active + "<br>" + EAactive_link;
			document.getElementById("EAcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Alt Count:"); ?> </b>" + EAalt_phone_count;
            document.getElementById("EAcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Notes:"); ?> </b><br>" + EAalt_phone_notes;
			showDiv('EAcommentsBox');
			}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			if (cid_choice.length > 3) 
				{
				var call_cid = cid_choice;
				usegroupalias=1;
				}
			else 
				{
				var call_cid = campaign_cid;
				if (manual_dial_cid == 'AGENT_PHONE')
					{
					cid_lock=1;
					call_cid = outbound_cid;
					}
				}
			if (prefix_choice.length > 0)
				{var call_prefix = prefix_choice;}
			else
				{var call_prefix = manual_dial_prefix;}

			manDiaLonly_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=manDiaLonly&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_number=" + manDiaLonly_num + "&phone_code=" + document.vicidial_form.phone_code.value + "&campaign=" + campaign + "&ext_context=" + ext_context + "&dial_timeout=" + manual_dial_timeout + "&dial_prefix=" + call_prefix + "&campaign_cid=" + call_cid + "&omit_phone_code=" + omit_phone_code + "&usegroupalias=" + usegroupalias + "&account=" + active_group_alias + "&agent_dialed_number=" + dialed_number + "&agent_dialed_type=" + dialed_label + "&dial_method=" + dial_method + "&agent_log_id=" + agent_log_id + "&security=" + document.vicidial_form.security_phrase.value + "&qm_extension=" + qm_extension + "&old_CID=" + LastCallCID + "&cid_lock=" + cid_lock;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(manDiaLonly_query);
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var MDOnextResponse = null;
			//		alert(manDiaLonly_query);
			//		alert(xmlhttp.responseText);
					MDOnextResponse = xmlhttp.responseText;

					var MDOnextResponse_array=MDOnextResponse.split("\n");
					MDnextCID =		MDOnextResponse_array[0];
					LastCallCID =	MDOnextResponse_array[0];
					agent_log_id =	MDOnextResponse_array[1];
					if (MDnextCID == " CALL NOT PLACED")
						{
						alert_box("<?php echo _QXZ("call was not placed, there was an error:"); ?>\n" + MDOnextResponse);
						}
					else
						{
						LasTCID =	MDOnextResponse_array[0];
						MD_channel_look=1;
						custchannellive=1;

						var dispnum = manDiaLonly_num;
						var status_display_number = phone_number_format(dispnum);

						if (alt_dial_status_display=='0')
							{
							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + MDnextCID;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

							document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Calling:"); ?> " + status_display_number + " " + status_display_content + " &nbsp; <?php echo _QXZ("Waiting for Ring..."); ?>";
							$('.DTMF-BTN-keyboard').show();
                            document.getElementById("HangupControl").innerHTML = "<a href=\"#\" onclick=\"dialedcall_send_hangup('','','','','YES');\" class='btn btn-danger'><i class='fa fa-phone fa-rotate-hangup'></i></a>";
							}
						if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
							{all_record = 'YES';}

						if (CalL_ScripT_color.length > 1)
							{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
						if ( (view_scripts == 1) && (campaign_script.length > 0) )
							{
							var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
							var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

							if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
								{
								delayed_script_load = 'YES';
								RefresHScript('CLEAR');
								}
							else
								{
								load_script_contents('ScriptContents','');
								}
							}

						if (custom_fields_enabled > 0)
							{
							// commented out because it is already loaded and will reset the form
						//	FormContentsLoad();
							}
						// JOEJ 082812 - new for email feature
						// Will populate email tab in case this is a customer with an email record
						if (email_enabled > 0)
							{
							EmailContentsLoad();
							}
						// JOEJ 060514 - new for email feature
						// Will populate chat tab in case this is a customer awaiting a chat with an agent
						if (chat_enabled > 0)
							{
							CustomerChatContentsLoad();
							}
						if (get_call_launch == 'SCRIPT')
							{
							if (delayed_script_load == 'YES')
								{
								load_script_contents('ScriptContents','');
								}
							ScriptPanelToFront();
							}
						if (get_call_launch == 'FORM')
							{
							FormPanelToFront();
							}
						if (get_call_launch == 'EMAIL')
							{
							EmailPanelToFront();
							}
						if (get_call_launch == 'CHAT')
							{
							CustomerChatPanelToFront();
							}
						if (get_call_launch == 'WEBFORM')
							{
							window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
							}
						if (get_call_launch == 'WEBFORMTWO')
							{
							window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
							}
						if (get_call_launch == 'WEBFORMTHREE')
							{
							window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
							}
						}
					}
				}
			delete xmlhttp;
			active_group_alias='';
			cid_choice='';
			prefix_choice='';
			agent_dialed_number='';
			agent_dialed_type='';
		//	CalL_ScripT_id='';
		//	CalL_ScripT_color='';
			xfer_agent_selected=0;
			}
		}


// ################################################################################
// Set the client to READY and start looking for calls (VDADready, VDADpause)
	function AutoDial_ReSume_PauSe(taskaction,taskagentlog,taskwrapup,taskstatuschange,temp_reason,temp_auto,temp_auto_code,APRclick)
		{
                    
		if (APRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----AutoDial_ReSume_PauSe---" + taskaction + " " + taskagentlog + " " + taskstatuschange + " " + temp_reason + " " + temp_auto + " " + temp_auto_code + "|";}
		var add_pause_code='';
		if (taskaction == 'VDADready')
			{
			VDRP_stage = 'READY';
			VDRP_stage_seconds=0;
			if (INgroupCOUNT > 0)
				{
				if (VICIDiaL_closer_blended == 0)
					{VDRP_stage = 'CLOSER';}
				else 
					{VDRP_stage = 'READY';}
				}
			AutoDialReady = 1;
			AutoDialWaiting = 1;
                        
			if (dial_method == "INBOUND_MAN")
				{
				auto_dial_level=starting_dial_level;
//                                alert(3);
                document.getElementById("CallPause").innerHTML = '<a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe("VDADpause","","","","","","","YES");" title="Go Pause"> <i class="fa fa-pause"></i> </a>';
//                document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_active.gif"); ?>\" border=\"0\" alt=\"You are active\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
				}
			else
				{
//                                    alert(4);
				document.getElementById("CallPause").innerHTML = DiaLControl_auto_HTML_ready;
//				document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_ready1;
				}
			}
		else
			{
			VDRP_stage = 'PAUSED';
			VDRP_stage_seconds=0;
			AutoDialReady = 0;
			AutoDialWaiting = 0;
			pause_code_counter = 0;
			dial_next_failed=0;
			if (dial_method == "INBOUND_MAN")
				{
//                                    alert(1);
				auto_dial_level=starting_dial_level;
                                document.getElementById("CallPause").innerHTML = '<a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe("VDADready","","","","","","","YES");"> <i class="fa fa-pause"></i> </a>';
//                document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif"); ?>\" border=\"0\" alt=\"You are paused\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
				}
			else
				{
//                                    alert(2);
				document.getElementById("CallPause").innerHTML = DiaLControl_auto_HTML;
//				document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML1;
				}

			if ( (agent_pause_codes_active=='FORCE') && (temp_reason != 'LOGOUT') && (temp_reason != 'REQUEUE') && (temp_reason != 'DIALNEXT') && (temp_auto != '1') )
				{
				PauseCodeSelectContent_create();
 				}
			if (temp_auto == '1')
				{
				add_pause_code = "&sub_status=" + temp_auto_code;
				}
			}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			autoDiaLready_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=" + taskaction + "&user=" + user + "&pass=" + pass + "&stage=" + VDRP_stage + "&agent_log_id=" + agent_log_id + "&agent_log=" + taskagentlog + "&wrapup=" + taskwrapup + "&campaign=" + campaign + "&dial_method=" + dial_method + "&comments=" + taskstatuschange + add_pause_code + "&qm_extension=" + qm_extension;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(autoDiaLready_query); 
			xmlhttp.onreadystatechange = function()
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var check_dispo = null;
					check_dispo = xmlhttp.responseText;
					var check_DS_array=check_dispo.split("\n");
				//	alert(xmlhttp.responseText + "\n|" + check_DS_array[1] + "\n|" + check_DS_array[2] + "|");
					if (check_DS_array[1] == 'Next agent_log_id:')
						{agent_log_id = check_DS_array[2];}
					}
				}
			delete xmlhttp;
			}
		waiting_on_dispo=0;
		return agent_log_id;
		}



// ################################################################################
// Check to see if there is a call being sent from the auto-dialer to agent conf
	function ReChecKCustoMerChaN()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			recheckVDAI_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&ACTION=VDADREcheckINCOMING" + "&agent_log_id=" + agent_log_id + "&lead_id=" + document.vicidial_form.lead_id.value;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(recheckVDAI_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var recheck_incoming = null;
					recheck_incoming = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					var recheck_VDIC_array=recheck_incoming.split("\n");
					if (recheck_VDIC_array[0] == '1')
						{
						var reVDIC_data_VDAC=recheck_VDIC_array[1].split("|");
						if (reVDIC_data_VDAC[3] == lastcustchannel)
							{
						// do nothing
							}
						else
							{
				//	alert("Channel has changed from:\n" + lastcustchannel + '|' + lastcustserverip + "\nto:\n" + reVDIC_data_VDAC[3] + '|' + reVDIC_data_VDAC[4]);
							document.getElementById("callchannel").innerHTML	= reVDIC_data_VDAC[3];
							lastcustchannel = reVDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= reVDIC_data_VDAC[4];
							lastcustserverip = reVDIC_data_VDAC[4];
							custchannellive = 1;
							}
						}
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// pull the script contents sending the webform variables to the script display script
	function load_script_contents(script_span,script_override)
		{
		var new_script_content = null;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			NeWscript_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&called_count=" + document.vicidial_form.called_count.value + "&script_override=" + script_override + "&ScrollDIV=1&" + web_form_vars;
			xmlhttp.open('POST', 'vdc_script_display.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(NeWscript_query);
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					new_script_content = xmlhttp.responseText;
					document.getElementById(script_span).innerHTML = new_script_content;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Alternate phone number change
	function alt_phone_change(APCphone,APCcount,APCleadID,APCactive)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----alt_phone_change---" + APCphone + " " + APCcount + " " + APCleadID + " " + APCactive + "|";

		var EAactive_link = '';
		if (APCactive == 'Y') 
			{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\"><?php echo _QXZ("Change this phone number to INACTIVE"); ?></a>";}
		else
			{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\"><?php echo _QXZ("Change this phone number to ACTIVE"); ?></a>";}

        document.getElementById("EAcommentsBoxB").innerHTML = "<b>Active: </b>" + EAalt_phone_active + "<br>" + EAactive_link;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			APC_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&ACTION=alt_phone_change" + "&phone_number=" + APCphone + "&lead_id=" + APCleadID + "&called_count=" + APCcount + "&stage=" + APCactive;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(APC_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
			//		alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Check to see if there is a call being sent from the auto-dialer to agent conf
	function check_for_auto_incoming()
		{
		if (typeof(xmlhttprequestcheckauto) == "undefined") 
			{
			all_record = 'NO';
			all_record_count=0;
		//	document.vicidial_form.lead_id.value = '';
			var xmlhttprequestcheckauto=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttprequestcheckauto = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttprequestcheckauto = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttprequestcheckauto = false;
			  }
			 }
			@end @*/
			if (!xmlhttprequestcheckauto && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckauto = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckauto) 
				{ 
				checkVDAI_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&campaign=" + campaign + "&ACTION=VDADcheckINCOMING" + "&agent_log_id=" + agent_log_id + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass;
				xmlhttprequestcheckauto.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttprequestcheckauto.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckauto.send(checkVDAI_query); 
				xmlhttprequestcheckauto.onreadystatechange = function() 
					{ 
					if (xmlhttprequestcheckauto.readyState == 4 && xmlhttprequestcheckauto.status == 200) 
						{
						var check_incoming = null;
						check_incoming = xmlhttprequestcheckauto.responseText;
					//	alert(checkVDAI_query);
					//	alert(xmlhttprequestcheckauto.responseText);
						var check_VDIC_array=check_incoming.split("\n");
						if (check_VDIC_array[0] == '1')
							{
						//	alert(xmlhttprequestcheckauto.responseText);
							AutoDialWaiting = 0;
							QUEUEpadding = 0;
							UpdatESettingSChecK = 1;

							var VDIC_data_VDAC=check_VDIC_array[1].split("|");
							VDIC_web_form_address = VICIDiaL_web_form_address;
							VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
							VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
							var VDIC_fronter='';

							var VDIC_data_VDIG=check_VDIC_array[2].split("|");
							if (VDIC_data_VDIG[0].length > 5)
								{VDIC_web_form_address = VDIC_data_VDIG[0];}
							var VDCL_group_name			= VDIC_data_VDIG[1];
							var VDCL_group_color		= VDIC_data_VDIG[2];
							var VDCL_fronter_display	= VDIC_data_VDIG[3];
							 VDCL_group_id				= VDIC_data_VDIG[4];
							 CalL_ScripT_id				= VDIC_data_VDIG[5];
							 CalL_AutO_LauncH			= VDIC_data_VDIG[6];
							 CalL_XC_a_Dtmf				= VDIC_data_VDIG[7];
							 CalL_XC_a_NuMber			= VDIC_data_VDIG[8];
							 CalL_XC_b_Dtmf				= VDIC_data_VDIG[9];
							 CalL_XC_b_NuMber			= VDIC_data_VDIG[10];
							if ( (VDIC_data_VDIG[11].length > 1) && (VDIC_data_VDIG[11] != '---NONE---') )
								{LIVE_default_xfer_group = VDIC_data_VDIG[11];}
							else
								{LIVE_default_xfer_group = default_xfer_group;}

							if ( (VDIC_data_VDIG[12].length > 1) && (VDIC_data_VDIG[12]!='DISABLED') )
								{LIVE_campaign_recording = VDIC_data_VDIG[12];}
							else
								{LIVE_campaign_recording = campaign_recording;}

							if ( (VDIC_data_VDIG[13].length > 1) && (VDIC_data_VDIG[13]!='NONE') )
								{LIVE_campaign_rec_filename = VDIC_data_VDIG[13];}
							else
								{LIVE_campaign_rec_filename = campaign_rec_filename;}

							if ( (VDIC_data_VDIG[14].length > 1) && (VDIC_data_VDIG[14]!='NONE') )
								{LIVE_default_group_alias = VDIC_data_VDIG[14];}
							else
								{LIVE_default_group_alias = default_group_alias;}

							if ( (VDIC_data_VDIG[15].length > 1) && (VDIC_data_VDIG[15]!='NONE') )
								{LIVE_caller_id_number = VDIC_data_VDIG[15];}
							else
								{LIVE_caller_id_number = default_group_alias_cid;}

							if (VDIC_data_VDIG[16].length > 0)
								{LIVE_web_vars = VDIC_data_VDIG[16];}
							else
								{LIVE_web_vars = default_web_vars;}

							if (VDIC_data_VDIG[17].length > 5)
								{VDIC_web_form_address_two = VDIC_data_VDIG[17];}

							var call_timer_action							= VDIC_data_VDIG[18];

							if ( (call_timer_action == 'NONE') || (call_timer_action.length < 2) )
								{
								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
								}
							else
								{
								var call_timer_action_message				= VDIC_data_VDIG[19];
								var call_timer_action_seconds				= VDIC_data_VDIG[20];
								var call_timer_action_destination			= VDIC_data_VDIG[27];
								timer_action = call_timer_action;
								timer_action_message = call_timer_action_message;
								timer_action_seconds = call_timer_action_seconds;
								timer_action_destination = call_timer_action_destination;
								}

							CalL_XC_c_NuMber			= VDIC_data_VDIG[21];
							CalL_XC_d_NuMber			= VDIC_data_VDIG[22];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							uniqueid_status_display		= VDIC_data_VDIG[24];
							uniqueid_status_prefix		= VDIC_data_VDIG[26];
							did_id						= VDIC_data_VDIG[28];
							did_extension				= VDIC_data_VDIG[29];
							did_pattern					= VDIC_data_VDIG[30];
							did_description				= VDIC_data_VDIG[31];
							closecallid					= VDIC_data_VDIG[32];
							xfercallid					= VDIC_data_VDIG[33];
							if (VDIC_data_VDIG[34].length > 5)
								{VDIC_web_form_address_three = VDIC_data_VDIG[34];}
							if (VDIC_data_VDIG[35].length > 1)
								{CalL_ScripT_color = VDIC_data_VDIG[35];}

							var VDIC_data_VDFR=check_VDIC_array[3].split("|");
							if ( (VDIC_data_VDFR[1].length > 1) && (VDCL_fronter_display == 'Y') )
								{VDIC_fronter = "  <?php echo _QXZ("Fronter:"); ?> " + VDIC_data_VDFR[0] + " - " + VDIC_data_VDFR[1];}
							<!--console.log('Hi 12333333');-->
							<!--console.log(VDIC_data_VDAC);-->
                                                        if(VDIC_data_VDAC[67]){ 
                                                                    var CustomArray = VDIC_data_VDAC[67].split(':');
                                                                    var CustomNewArray = CustomArray.filter(Boolean);
                                                                    
                                                                    $.each(CustomNewArray, function(index, item){
                                                                        var NewItem = item.split('-');
                                                                        $('.CustomFieldsDiv').append('<div class="col-6">'+
                                                                                        '<div class="input-group">'+
                                                                                            '<div class="input-group-addon">'+
                                                                                                '<i class="fa fa-user"></i>'+
                                                                                            '</div>'+
                                                                                            '<input type="text" class="form-control CustomFieldInput" name="'+NewItem[0]+'" id="'+NewItem[0]+'" value="'+NewItem[1]+'" placeholder="'+NewItem[2]+'" readonly/>'+
                                                                                        '</div>'+
                                                                                        '</div>');
                                                                    });
                                                                    
                                                                }
                                                        
							document.vicidial_form.lead_id.value		= VDIC_data_VDAC[0];
							document.vicidial_form.uniqueid.value		= VDIC_data_VDAC[1];
							CIDcheck									= VDIC_data_VDAC[2];
							CalLCID										= VDIC_data_VDAC[2];
							LastCallCID									= VDIC_data_VDAC[2];
							document.getElementById("callchannel").innerHTML	= VDIC_data_VDAC[3];
							lastcustchannel = VDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= VDIC_data_VDAC[4];
							lastcustserverip = VDIC_data_VDAC[4];
							if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
							document.vicidial_form.SecondS.value		= 0;
							document.getElementById("SecondSDISP").innerHTML = '0';

							if (uniqueid_status_display=='ENABLED')
								{custom_call_id			= " Call ID " + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PREFIX')
								{custom_call_id			= " Call ID " + uniqueid_status_prefix + "" + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PRESERVE')
								{custom_call_id			= " Call ID " + VDIC_data_VDIG[25];}

							VD_live_customer_call = 1;
							VD_live_call_secondS = 0;
							customer_sec = 0;

							// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
						//	DialLog("start");

							custchannellive=1;

							LasTCID											= check_VDIC_array[4];
							LeaDPreVDispO									= check_VDIC_array[6];
							fronter											= check_VDIC_array[7];
							document.vicidial_form.vendor_lead_code.value	= check_VDIC_array[8];
							document.vicidial_form.list_id.value			= check_VDIC_array[9];
							document.vicidial_form.gmt_offset_now.value		= check_VDIC_array[10];
							document.vicidial_form.phone_code.value			= check_VDIC_array[11];
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= check_VDIC_array[12];
									}
								}
                                                                console.log(check_VDIC_array);
                                                                if(check_VDIC_array[67]){ 
                                                                    var CustomArray = check_VDIC_array[67].split(':');
                                                                    var CustomNewArray = CustomArray.filter(Boolean);
                                                                    
                                                                    $.each(CustomNewArray, function(index, item){
                                                                        var NewItem = item.split('-');
                                                                        $('.CustomFieldsDiv').append('<div class="col-6">'+
                                                                                        '<div class="input-group">'+
                                                                                            '<div class="input-group-addon">'+
                                                                                                '<i class="fa fa-user"></i>'+
                                                                                            '</div>'+
                                                                                            '<input type="text" class="form-control CustomFieldInput" name="'+NewItem[0]+'" id="'+NewItem[0]+'" value="'+NewItem[1]+'" placeholder="'+NewItem[2]+'" readonly/>'+
                                                                                        '</div>'+
                                                                                        '</div>');
                                                                    });
                                                                    
                                                                }
                                                                <!--console.log('Hi 1234567');-->
							document.vicidial_form.phone_number.value		= check_VDIC_array[12];
							document.vicidial_form.title.value				= check_VDIC_array[13];
							document.vicidial_form.first_name.value			= check_VDIC_array[14];
							document.vicidial_form.middle_initial.value		= check_VDIC_array[15];
							document.vicidial_form.last_name.value			= check_VDIC_array[16];
							document.vicidial_form.address1.value			= check_VDIC_array[17];
							document.vicidial_form.address2.value			= check_VDIC_array[18];
							document.vicidial_form.address3.value			= check_VDIC_array[19];
							document.vicidial_form.city.value				= check_VDIC_array[20];
							document.vicidial_form.state.value				= check_VDIC_array[21];
							document.vicidial_form.province.value			= check_VDIC_array[22];
							document.vicidial_form.postal_code.value		= check_VDIC_array[23];
							document.vicidial_form.country_code.value		= check_VDIC_array[24];
							document.vicidial_form.gender.value				= check_VDIC_array[25];
							document.vicidial_form.date_of_birth.value		= check_VDIC_array[26];
							document.vicidial_form.alt_phone.value			= check_VDIC_array[27];
							document.vicidial_form.email.value				= check_VDIC_array[28];
							document.vicidial_form.security_phrase.value	= check_VDIC_array[29];
							var REGcommentsNL = new RegExp("!N","g");
							check_VDIC_array[30] = check_VDIC_array[30].replace(REGcommentsNL, "\n");
							document.vicidial_form.comments.value			= check_VDIC_array[30];
							document.vicidial_form.called_count.value		= check_VDIC_array[31];
							CBentry_time									= check_VDIC_array[32];
							CBcallback_time									= check_VDIC_array[33];
							CBuser											= check_VDIC_array[34];
							CBcomments										= check_VDIC_array[35];
							dialed_number									= check_VDIC_array[36];
							dialed_label									= check_VDIC_array[37];
							source_id										= check_VDIC_array[38];
							EAphone_code									= check_VDIC_array[39];
							EAphone_number									= check_VDIC_array[40];
							EAalt_phone_notes								= check_VDIC_array[41];
							EAalt_phone_active								= check_VDIC_array[42];
							EAalt_phone_count								= check_VDIC_array[43];
							document.vicidial_form.rank.value				= check_VDIC_array[44];
							document.vicidial_form.owner.value				= check_VDIC_array[45];
							script_recording_delay							= check_VDIC_array[46];
							document.vicidial_form.entry_list_id.value		= check_VDIC_array[47];
							custom_field_names								= check_VDIC_array[48];
							custom_field_values								= check_VDIC_array[49];
							custom_field_types								= check_VDIC_array[50];
							//Added By Poundteam for Audited Comments (Manual Dial Section Only)
							if (qc_enabled > 0)
								{
								document.vicidial_form.ViewCommentButton.value               = check_VDIC_array[53];
								document.vicidial_form.audit_comments_button.value           = check_VDIC_array[53];
								if (comments_all_tabs == 'ENABLED')
									{document.vicidial_form.OtherViewCommentButton.value	 = check_VDIC_array[53];}
								var REGACcomments = new RegExp("!N","g");
								var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
								var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACcomments, "\n");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACfontbegin, "<font color=red>");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACfontend, "</font>");
								document.getElementById("audit_comments").innerHTML          = check_VDIC_array[54];
								if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (check_VDIC_array[53]!='0') && (check_VDIC_array[53]!='') )
									{ViewComments('ON');}
								}
							//END section Added By Poundteam for Audited Comments
							// Add here for AutoDial (VDADcheckINCOMING in utg_vdc_db_query)

							document.vicidial_form.list_name.value			= check_VDIC_array[55];
							// list webform3 - 56
							CalL_ScripT_color								= check_VDIC_array[57];
							document.vicidial_form.list_description.value	= check_VDIC_array[58];
							entry_date										= check_VDIC_array[59];
							did_custom_one									= check_VDIC_array[60];
							did_custom_two									= check_VDIC_array[61];
							did_custom_three								= check_VDIC_array[62];
							did_custom_four									= check_VDIC_array[63];
							did_custom_five									= check_VDIC_array[64];
							status_group_statuses_data						= check_VDIC_array[65];
							last_call_date									= check_VDIC_array[66];

							// build statuses list for disposition screen
							VARstatuses = [];
							VARstatusnames = [];
							VARSELstatuses = [];
							VARCBstatuses = [];
							VARMINstatuses = [];
							VARMAXstatuses = [];
							VARCBstatusesLIST = '';
							VD_statuses_ct = 0;
							VARSELstatuses_ct = 0;
							gVARstatuses = [];
							gVARstatusnames = [];
							gVARSELstatuses = [];
							gVARCBstatuses = [];
							gVARMINstatuses = [];
							gVARMAXstatuses = [];
							gVARCBstatusesLIST = '';
							gVD_statuses_ct = 0;
							gVARSELstatuses_ct = 0;

							if (status_group_statuses_data.length > 7)
								{
								var gVARstatusesRAW=status_group_statuses_data.split(',');
								var gVARstatusesRAWct = gVARstatusesRAW.length;
								var loop_gct=0;
								while (loop_gct < gVARstatusesRAWct)
									{
									var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
									var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
									gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
									gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
									gVARSELstatuses[loop_gct] =	'Y';
									gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
									gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
									gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
									if (gVARCBstatuses[loop_gct] == 'Y')
										{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
									gVD_statuses_ct++;
									gVARSELstatuses_ct++;

									loop_gct++;
									}
								}
							else
								{
								gVARstatuses = cVARstatuses;
								gVARstatusnames = cVARstatusnames;
								gVARSELstatuses = cVARSELstatuses;
								gVARCBstatuses = cVARCBstatuses;
								gVARMINstatuses = cVARMINstatuses;
								gVARMAXstatuses = cVARMAXstatuses;
								gVARCBstatusesLIST = cVARCBstatusesLIST;
								gVD_statuses_ct = cVD_statuses_ct;
								gVARSELstatuses_ct = cVARSELstatuses_ct;
								}

							VARstatuses = sVARstatuses.concat(gVARstatuses);
							VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
							VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
							VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
							VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
							VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
							VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
							VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
							VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

							var HKdebug='';
							var HKboxAtemp='';
							var HKboxBtemp='';
							var HKboxCtemp='';
							if (HK_statuses_camp > 0)
								{
								hotkeys = [];
								var temp_HK_valid_ct=0;
								while (HK_statuses_camp > temp_HK_valid_ct)
									{
									var temp_VARstatuses_ct=0;
									while (VD_statuses_ct > temp_VARstatuses_ct)
										{
										if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
											{
											hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

											if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
												{
												HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
												{
												HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
												{
												HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}

											HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
											}
										temp_VARstatuses_ct++;
										}
									temp_HK_valid_ct++;
									}
								document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
								document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
								document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
								}

							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = source_id;}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

							if (CalL_ScripT_color.length > 1)
								{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}

							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value	= check_VDIC_array[25];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								}
                                                                <!--console.log('Hi 12345678');-->
							lead_dial_number = document.vicidial_form.phone_number.value;
							var dispnum = document.vicidial_form.phone_number.value;
							var status_display_number = phone_number_format(dispnum);
							var callnum = dialed_number;
							var dial_display_number = phone_number_format(callnum);

							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + LasTCID;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

							document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + " " + custom_call_id + " " + status_display_content + " &nbsp; " + VDIC_fronter; 

							if (CBentry_time.length > 2)
								{
                                document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("PREVIOUS CALLBACK"); ?> </b>";
								document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
								document.getElementById("CBcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Last Call:"); ?> </b>" + CBentry_time;
								document.getElementById("CBcommentsBoxB").innerHTML = "<b><?php echo _QXZ("CallBack:"); ?> </b>" + CBcallback_time;
								document.getElementById("CBcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Agent:"); ?> </b>" + CBuser;
                                document.getElementById("CBcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Comments:"); ?> </b><br>" + CBcomments;
								if (show_previous_callback == 'ENABLED')
									{showDiv('CBcommentsBox');}
								}
							if (dialed_label == 'ALT')
                                {document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ALT"); ?> </b>";}
							if (dialed_label == 'ADDR3')
                                {document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ADDRESS3"); ?> </b>";}
							var REGalt_dial = new RegExp("X","g");
							if (dialed_label.match(REGalt_dial))
								{
                                document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER:"); ?> " + dialed_label + "</b>";
								document.getElementById("EAcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Phone Code and Number:"); ?> </b>" + EAphone_code + " " + EAphone_number;

								var EAactive_link = '';
								if (EAalt_phone_active == 'Y') 
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
								else
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

                                document.getElementById("EAcommentsBoxB").innerHTML = "<b><?php echo _QXZ("Active:"); ?> </b>" + EAalt_phone_active + "<br>" + EAactive_link;
								document.getElementById("EAcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Alt Count:"); ?> </b>" + EAalt_phone_count;
								document.getElementById("EAcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Notes:"); ?> </b>" + EAalt_phone_notes;
								showDiv('EAcommentsBox');
								}

							if (VDIC_data_VDIG[1].length > 0)
								{
								inOUT = 'IN';
								if (VDIC_data_VDIG[2].length > 2)
									{
									document.getElementById("MainStatuSSpan").style.background = VDIC_data_VDIG[2];
									document.getElementById("MainStatuSSpanOLD").style.background = VDIC_data_VDIG[2];
									}
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

								var temp_status_display_ingroup = " <?php echo _QXZ("Group"); ?>- " + VDIC_data_VDIG[1];
								if (status_display_ingroup == 'DISABLED')
									{temp_status_display_ingroup='';}

								document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + " " + custom_call_id + " " + temp_status_display_ingroup + "&nbsp; " + VDIC_fronter + " " + status_display_content; 
								}

                            document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall.gif"); ?>\" border=\"0\" alt=\"Park Call\" /></a>";
							if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
								{
                                document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif"); ?>\" border=\"0\" alt=\"IVR Park Call\" /></a>";
								}
                                                                $('.DTMF-BTN-keyboard').show();
                            document.getElementById("HangupControl").innerHTML = "<a href=\"#\" onclick=\"dialedcall_send_hangup('','','','','YES');\" class='btn btn-danger'><i class='fa fa-phone fa-rotate-hangup'></i></a>";

                            document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class='btn btn-success'><i class='fa fa-share'></i></a>";

                            document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_localcloser.gif"); ?>\" border=\"0\" alt=\"LOCAL CLOSER\" style=\"vertical-align:middle\" /></a>";

                            document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_blindtransfer.gif"); ?>\" border=\"0\" alt=\"Dial Blind Transfer\" style=\"vertical-align:middle\" /></a>";

                            document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_ammessage.gif"); ?>\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";
		
							if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
								{
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = default_xfer_group;}

                                document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}
							if (prepopulate_transfer_preset_enabled > 0)
								{
								if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								}
							if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
								{
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

                                document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}

							if (custom_3way_button_transfer_enabled > 0)
								{
								document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" /></a>";
								}


							if (call_requeue_button > 0)
								{
								var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
								var regCRB = new RegExp("AGENTDIRECT","ig");
								if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
									{
                                    document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
									}
								else
									{
                                    document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call_OFF.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" />";
									}
								}

							// Build transfer pull-down list
							var loop_ct = 0;
							var live_XfeR_HTML = '';
							var XfeR_SelecT = '';
							while (loop_ct < XFgroupCOUNT)
								{
								if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
									{XfeR_SelecT = 'selected ';}
								else {XfeR_SelecT = '';}
								live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
								loop_ct++;
								}
                                                                <!--console.log('Hello 2');-->
                            document.getElementById("XfeRGrouPLisT").innerHTML = "<select size=\"1\" name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

							if (lastcustserverip == server_ip)
								{
                                document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + lastcustchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_up.gif"); ?>\" border=\"0\" /></a>";
                                document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + lastcustchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_down.gif"); ?>\" border=\"0\" /></a>";
								}

							if (dial_method == "INBOUND_MAN")
								{
                                document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
								}
							else
								{
								document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
								}

							if (VDCL_group_id.length > 1)
								{var group = VDCL_group_id;}
							else
								{var group = campaign;}
							if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

							if (hide_gender < 1)
								{
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}

							LeaDDispO='';

							var regWFAcustom = new RegExp("^VAR","ig");
							if (VDIC_web_form_address.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
								TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
								}

							if (VDIC_web_form_address_two.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
								}

							if (VDIC_web_form_address_three.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
								}

                                                                <!--console.log('Script 2');-->
                            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";

							if (enable_second_webform > 0)
								{
                                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
								}

							if (enable_third_webform > 0)
								{
                                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
								}

							if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
								{all_record = 'YES';}

							if ( (view_scripts == 1) && (CalL_ScripT_id.length > 0) )
								{
								var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
								var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

								if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
									{
									delayed_script_load = 'YES';
									RefresHScript('CLEAR');
									}
								else
									{
									load_script_contents('ScriptContents','');
									}
								}

							if (custom_fields_enabled > 0)
								{
								FormContentsLoad();
								}
							// JOEJ 082812 - new for email feature
							if (email_enabled > 0)
								{
								EmailContentsLoad();
								}
							// JOEJ 060514 - new for chat feature
							if (chat_enabled > 0)
								{
								CustomerChatContentsLoad();
								}
							if (CalL_AutO_LauncH == 'SCRIPT')
								{
								if (delayed_script_load == 'YES')
									{
									load_script_contents('ScriptContents','');
									}
								ScriptPanelToFront();
								}
							if (CalL_AutO_LauncH == 'FORM')
								{
								FormPanelToFront();
								}
							if (CalL_AutO_LauncH == 'EMAIL')
								{
								EmailPanelToFront();
								}

							if (CalL_AutO_LauncH == 'WEBFORM')
								{
								window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}
							if (CalL_AutO_LauncH == 'WEBFORMTWO')
								{
								window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}
							if (CalL_AutO_LauncH == 'WEBFORMTHREE')
								{
								window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}

							if (useIE > 0)
								{
								var regCTC = new RegExp("^NONE","ig");
								if (CopY_tO_ClipboarD.match(regCTC))
									{var nothing=1;}
								else
									{
									var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
							//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
									window.clipboardData.setData('Text', tmp_clip.value)
							//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
									}
								}

							if (alert_enabled=='ON')
								{
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);
								alert(" <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + "\n <?php echo _QXZ("Group"); ?>- " + VDIC_data_VDIG[1] + " &nbsp; " + VDIC_fronter);
								}
							}
						else if ( ((email_enabled>0 && EMAILgroupCOUNT>0) || (chat_enabled>0 && CHATgroupCOUNT>0)) && AutoDialWaiting==1)
							{
							// JOEJ check for EMAIL/CHAT
							// QUEUEpadding is needed to allow inbound calls to get through QUEUE status
							QUEUEpadding++;
							if (QUEUEpadding==5) 
								{
								QUEUEpadding=0;
								check_for_incoming_other();
								}
							}
							xmlhttprequestcheckauto = undefined;
							delete xmlhttprequestcheckauto;
						}
					}
				}
			}
		}


// ################################################################################
// Check to see if there is an email or chat unanswered in queue
// This should not happen if the agent is INCALL
// Pass the manual_chat_override when the agent starts a chat themselves, 
// so the dialer will skip checking for emails
	function check_for_incoming_other(manual_chat_override)
		{
		if (typeof(xmlhttprequestcheckother) == "undefined") 
			{
			all_record = 'NO';
			all_record_count=0;
			var xmlhttprequestcheckother=false;
			if (!xmlhttprequestcheckother && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckother = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckother) 
				{ 
		
				checkVDAI_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&campaign=" + campaign + "&ACTION=VDADcheckINCOMINGother" + "&agent_log_id=" + agent_log_id + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass;

				if (!manual_chat_override)
					{
					// Add on all the email groups the user selected in order to pass them to the utg_vdc_db_query script
					for (var i = 0; i < incomingEMAILgroups.length; i++) 
						{
						checkVDAI_query+="&inbound_email_groups[]="+incomingEMAILgroups[i];
						}
					}
				// Add on all the chat groups the user selected in order to pass them to the utg_vdc_db_query script
				for (var i = 0; i < incomingCHATgroups.length; i++) 
					{
				    checkVDAI_query+="&inbound_chat_groups[]="+incomingCHATgroups[i];
					}

				xmlhttprequestcheckother.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttprequestcheckother.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckother.send(checkVDAI_query); 

				xmlhttprequestcheckother.onreadystatechange = function() 
					{ 
					if (xmlhttprequestcheckother.readyState == 4 && xmlhttprequestcheckother.status == 200) 
						{
						var check_incoming = null;
						check_incoming = xmlhttprequestcheckother.responseText;
						var check_VDIC_array=check_incoming.split("\n");
//                                                console.log(check_VDIC_array);
						if (check_VDIC_array[0] == '1')
							{
							AutoDialWaiting = 0;
							UpdatESettingSChecK = 1;

							var VDIC_data_VDAC=check_VDIC_array[1].split("|");
							VDIC_web_form_address = VICIDiaL_web_form_address;
							VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
							VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
							CalL_AutO_LauncH			= VDIC_data_VDAC[3];
							if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
							if (CalL_AutO_LauncH=='EMAIL')
								{
								document.vicidial_form.email_row_id.value= VDIC_data_VDAC[4];
								document.getElementById("EmailAudioAlertFile").play();
								if( document.images ) { document.images['livecall'].src = image_liveemail_ON.src;}
								}
							else if (CalL_AutO_LauncH=='CHAT')
								{
								if (chat_enabled > 0)
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ON.src;
									document.getElementById("ChatAudioAlertFile").play();
									document.vicidial_form.chat_id.value= VDIC_data_VDAC[4];
									document.vicidial_form.customer_chat_id.value= VDIC_data_VDAC[4];
									if( document.images ) { document.images['livecall'].src = image_livechat_ON.src;}
									}
								}
							var VDIC_fronter='';

							var VDIC_data_VDIG=check_VDIC_array[2].split("|");
							if (VDIC_data_VDIG[0].length > 5)
								{VDIC_web_form_address = VDIC_data_VDIG[0];}
							var VDCL_group_name			= VDIC_data_VDIG[1];
							var VDCL_group_color		= VDIC_data_VDIG[2];
							var VDCL_fronter_display	= VDIC_data_VDIG[3];
							 VDCL_group_id				= VDIC_data_VDIG[4];
							 CalL_ScripT_id				= VDIC_data_VDIG[5];
							 CalL_XC_a_Dtmf				= VDIC_data_VDIG[7];
							 CalL_XC_a_NuMber			= VDIC_data_VDIG[8];
							 CalL_XC_b_Dtmf				= VDIC_data_VDIG[9];
							 CalL_XC_b_NuMber			= VDIC_data_VDIG[10];
							if ( (VDIC_data_VDIG[11].length > 1) && (VDIC_data_VDIG[11] != '---NONE---') )
								{LIVE_default_xfer_group = VDIC_data_VDIG[11];}
							else
								{LIVE_default_xfer_group = default_xfer_group;}

							if ( (VDIC_data_VDIG[12].length > 1) && (VDIC_data_VDIG[12]!='DISABLED') )
								{LIVE_campaign_recording = VDIC_data_VDIG[12];}
							else
								{LIVE_campaign_recording = campaign_recording;}

							if ( (VDIC_data_VDIG[13].length > 1) && (VDIC_data_VDIG[13]!='NONE') )
								{LIVE_campaign_rec_filename = VDIC_data_VDIG[13];}
							else
								{LIVE_campaign_rec_filename = campaign_rec_filename;}

							if ( (VDIC_data_VDIG[14].length > 1) && (VDIC_data_VDIG[14]!='NONE') )
								{LIVE_default_group_alias = VDIC_data_VDIG[14];}
							else
								{LIVE_default_group_alias = default_group_alias;}

							if ( (VDIC_data_VDIG[15].length > 1) && (VDIC_data_VDIG[15]!='NONE') )
								{LIVE_caller_id_number = VDIC_data_VDIG[15];}
							else
								{LIVE_caller_id_number = default_group_alias_cid;}

							if (VDIC_data_VDIG[16].length > 0)
								{LIVE_web_vars = VDIC_data_VDIG[16];}
							else
								{LIVE_web_vars = default_web_vars;}

							if (VDIC_data_VDIG[17].length > 5)
								{VDIC_web_form_address_two = VDIC_data_VDIG[17];}

							var call_timer_action							= VDIC_data_VDIG[18];

							if ( (call_timer_action == 'NONE') || (call_timer_action.length < 2) )
								{
								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
								}
							else
								{
								var call_timer_action_message				= VDIC_data_VDIG[19];
								var call_timer_action_seconds				= VDIC_data_VDIG[20];
								var call_timer_action_destination			= VDIC_data_VDIG[27];
								timer_action = call_timer_action;
								timer_action_message = call_timer_action_message;
								timer_action_seconds = call_timer_action_seconds;
								timer_action_destination = call_timer_action_destination;
								}

							CalL_XC_c_NuMber			= VDIC_data_VDIG[21];
							CalL_XC_d_NuMber			= VDIC_data_VDIG[22];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							uniqueid_status_display		= VDIC_data_VDIG[24];
							uniqueid_status_prefix		= VDIC_data_VDIG[26];
							did_id						= VDIC_data_VDIG[28];
							did_extension				= VDIC_data_VDIG[29];
							did_pattern					= VDIC_data_VDIG[30];
							did_description				= VDIC_data_VDIG[31];
							closecallid					= VDIC_data_VDIG[32];
							xfercallid					= VDIC_data_VDIG[33];
							if (VDIC_data_VDIG[34].length > 5)
								{VDIC_web_form_address_three = VDIC_data_VDIG[34];}
							if (VDIC_data_VDIG[35].length > 1)
								{CalL_ScripT_color = VDIC_data_VDIG[35];}

							var VDIC_data_VDFR=check_VDIC_array[3].split("|");
							if ( (VDIC_data_VDFR[1].length > 1) && (VDCL_fronter_display == 'Y') )
								{VDIC_fronter = "  <?php echo _QXZ("Fronter:"); ?> " + VDIC_data_VDFR[0] + " - " + VDIC_data_VDFR[1];}
							<!--console.log(VDIC_data_VDAC+'Incoming Call');-->
                                                        <!--console.log(VDIC_data_VDAC);-->
                                                        if(VDIC_data_VDAC[67]){ 
                                                                    var CustomArray = VDIC_data_VDAC[67].split(':');
                                                                    var CustomNewArray = CustomArray.filter(Boolean);
                                                                    
                                                                    $.each(CustomNewArray, function(index, item){
                                                                        var NewItem = item.split('-');
                                                                        $('.CustomFieldsDiv').append('<div class="col-6">'+
                                                                                        '<div class="input-group">'+
                                                                                            '<div class="input-group-addon">'+
                                                                                                '<i class="fa fa-user"></i>'+
                                                                                            '</div>'+
                                                                                            '<input type="text" class="form-control CustomFieldInput" name="'+NewItem[0]+'" id="'+NewItem[0]+'" value="'+NewItem[1]+'" placeholder="'+NewItem[2]+'" readonly/>'+
                                                                                        '</div>'+
                                                                                        '</div>');
                                                                    });
                                                                    
                                                                }
							document.vicidial_form.lead_id.value		= VDIC_data_VDAC[0];
							document.vicidial_form.uniqueid.value		= VDIC_data_VDAC[1];
							CIDcheck									= VDIC_data_VDAC[2];
							CalLCID										= VDIC_data_VDAC[2];
							LastCallCID									= VDIC_data_VDAC[2];
							document.getElementById("callchannel").innerHTML	= VDIC_data_VDAC[3];
							lastcustchannel = VDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= VDIC_data_VDAC[4];
							lastcustserverip = VDIC_data_VDAC[4];
							document.vicidial_form.SecondS.value		= 0;
							document.getElementById("SecondSDISP").innerHTML = '0';

							if (uniqueid_status_display=='ENABLED')
								{custom_call_id			= " Call ID " + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PREFIX')
								{custom_call_id			= " Call ID " + uniqueid_status_prefix + "" + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PRESERVE')
								{custom_call_id			= " Call ID " + VDIC_data_VDIG[25];}

							VD_live_customer_call = 1;
							VD_live_call_secondS = 0;
							customer_sec = 0;
							currently_in_email_or_chat = 1; // Do this to block channel checks (or anything else) that would indicate a completed call

							// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
						//	DialLog("start");

							custchannellive=1;

							LasTCID											= check_VDIC_array[4];
							LeaDPreVDispO									= check_VDIC_array[6];
							fronter											= check_VDIC_array[7];
							document.vicidial_form.vendor_lead_code.value	= check_VDIC_array[8];
							document.vicidial_form.list_id.value			= check_VDIC_array[9];
							document.vicidial_form.gmt_offset_now.value		= check_VDIC_array[10];
							document.vicidial_form.phone_code.value			= check_VDIC_array[11];
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= check_VDIC_array[12];
									}
								}
                                                                <!--console.log('Hi 123090');-->
                                                                
							document.vicidial_form.phone_number.value		= check_VDIC_array[12];
							document.vicidial_form.title.value				= check_VDIC_array[13];
							document.vicidial_form.first_name.value			= check_VDIC_array[14];
							document.vicidial_form.middle_initial.value		= check_VDIC_array[15];
							document.vicidial_form.last_name.value			= check_VDIC_array[16];
							document.vicidial_form.address1.value			= check_VDIC_array[17];
							document.vicidial_form.address2.value			= check_VDIC_array[18];
							document.vicidial_form.address3.value			= check_VDIC_array[19];
							document.vicidial_form.city.value				= check_VDIC_array[20];
							document.vicidial_form.state.value				= check_VDIC_array[21];
							document.vicidial_form.province.value			= check_VDIC_array[22];
							document.vicidial_form.postal_code.value		= check_VDIC_array[23];
							document.vicidial_form.country_code.value		= check_VDIC_array[24];
							document.vicidial_form.gender.value				= check_VDIC_array[25];
							document.vicidial_form.date_of_birth.value		= check_VDIC_array[26];
							document.vicidial_form.alt_phone.value			= check_VDIC_array[27];
							document.vicidial_form.email.value				= check_VDIC_array[28];
							document.vicidial_form.security_phrase.value	= check_VDIC_array[29];
							var REGcommentsNL = new RegExp("!N","g");
							check_VDIC_array[30] = check_VDIC_array[30].replace(REGcommentsNL, "\n");
							document.vicidial_form.comments.value			= check_VDIC_array[30];
							document.vicidial_form.called_count.value		= check_VDIC_array[31];
							CBentry_time									= check_VDIC_array[32];
							CBcallback_time									= check_VDIC_array[33];
							CBuser											= check_VDIC_array[34];
							CBcomments										= check_VDIC_array[35];
							dialed_number									= check_VDIC_array[36];
							dialed_label									= check_VDIC_array[37];
							source_id										= check_VDIC_array[38];
							EAphone_code									= check_VDIC_array[39];
							EAphone_number									= check_VDIC_array[40];
							EAalt_phone_notes								= check_VDIC_array[41];
							EAalt_phone_active								= check_VDIC_array[42];
							EAalt_phone_count								= check_VDIC_array[43];
							document.vicidial_form.rank.value				= check_VDIC_array[44];
							document.vicidial_form.owner.value				= check_VDIC_array[45];
							script_recording_delay							= check_VDIC_array[46];
							document.vicidial_form.entry_list_id.value		= check_VDIC_array[47];
							custom_field_names								= check_VDIC_array[48];
							custom_field_values								= check_VDIC_array[49];
							custom_field_types								= check_VDIC_array[50];
							document.vicidial_form.list_name.value			= check_VDIC_array[51];
							// list webform3 - 52
							// script color - 53
							document.vicidial_form.list_description.value	= check_VDIC_array[54];
							entry_date										= check_VDIC_array[55];
							did_custom_one									= check_VDIC_array[56];
							did_custom_two									= check_VDIC_array[57];
							did_custom_three								= check_VDIC_array[58];
							did_custom_four									= check_VDIC_array[59];
							did_custom_five									= check_VDIC_array[60];
							status_group_statuses_data						= check_VDIC_array[61];
							last_call_date									= check_VDIC_array[62];

							// build statuses list for disposition screen
							VARstatuses = [];
							VARstatusnames = [];
							VARSELstatuses = [];
							VARCBstatuses = [];
							VARMINstatuses = [];
							VARMAXstatuses = [];
							VARCBstatusesLIST = '';
							VD_statuses_ct = 0;
							VARSELstatuses_ct = 0;
							gVARstatuses = [];
							gVARstatusnames = [];
							gVARSELstatuses = [];
							gVARCBstatuses = [];
							gVARMINstatuses = [];
							gVARMAXstatuses = [];
							gVARCBstatusesLIST = '';
							gVD_statuses_ct = 0;
							gVARSELstatuses_ct = 0;

							if (status_group_statuses_data.length > 7)
								{
								var gVARstatusesRAW=status_group_statuses_data.split(',');
								var gVARstatusesRAWct = gVARstatusesRAW.length;
								var loop_gct=0;
								while (loop_gct < gVARstatusesRAWct)
									{
									var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
									var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
									gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
									gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
									gVARSELstatuses[loop_gct] =	'Y';
									gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
									gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
									gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
									if (gVARCBstatuses[loop_gct] == 'Y')
										{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
									gVD_statuses_ct++;
									gVARSELstatuses_ct++;

									loop_gct++;
									}
								}
							else
								{
								gVARstatuses = cVARstatuses;
								gVARstatusnames = cVARstatusnames;
								gVARSELstatuses = cVARSELstatuses;
								gVARCBstatuses = cVARCBstatuses;
								gVARMINstatuses = cVARMINstatuses;
								gVARMAXstatuses = cVARMAXstatuses;
								gVARCBstatusesLIST = cVARCBstatusesLIST;
								gVD_statuses_ct = cVD_statuses_ct;
								gVARSELstatuses_ct = cVARSELstatuses_ct;
								}

							VARstatuses = sVARstatuses.concat(gVARstatuses);
							VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
							VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
							VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
							VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
							VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
							VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
							VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
							VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

							var HKdebug='';
							var HKboxAtemp='';
							var HKboxBtemp='';
							var HKboxCtemp='';
							if (HK_statuses_camp > 0)
								{
								hotkeys = [];
								var temp_HK_valid_ct=0;
								while (HK_statuses_camp > temp_HK_valid_ct)
									{
									var temp_VARstatuses_ct=0;
									while (VD_statuses_ct > temp_VARstatuses_ct)
										{
										if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
											{
											hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

											if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
												{
												HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
												{
												HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
												{
												HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br>";
												}

											HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
											}
										temp_VARstatuses_ct++;
										}
									temp_HK_valid_ct++;
									}
								document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
								document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
								document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
								}

							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = source_id;}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value	= check_VDIC_array[25];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								}

							lead_dial_number = document.vicidial_form.phone_number.value;
							var dispnum = document.vicidial_form.phone_number.value;
							var status_display_number = phone_number_format(dispnum);
							var callnum = dialed_number;
							var dial_display_number = phone_number_format(callnum);

							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + LasTCID;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

							document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + " " + custom_call_id + " " + status_display_content + " &nbsp; " + VDIC_fronter; 

							if (CBentry_time.length > 2)
								{
								document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("PREVIOUS CALLBACK"); ?> </b>";
								document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
								document.getElementById("CBcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Last Call:"); ?> </b>" + CBentry_time;
								document.getElementById("CBcommentsBoxB").innerHTML = "<b><?php echo _QXZ("CallBack:"); ?> </b>" + CBcallback_time;
								document.getElementById("CBcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Agent:"); ?> </b>" + CBuser;
								document.getElementById("CBcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Comments:"); ?> </b><br>" + CBcomments;
								if (show_previous_callback == 'ENABLED')
									{showDiv('CBcommentsBox');}
								}
							if (dialed_label == 'ALT')
								{document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ALT"); ?> </b>";}
							if (dialed_label == 'ADDR3')
								{document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER: ADDRESS3"); ?> </b>";}
							var REGalt_dial = new RegExp("X","g");
							if (dialed_label.match(REGalt_dial))
								{
								document.getElementById("CusTInfOSpaN").innerHTML = " <b> <?php echo _QXZ("ALT DIAL NUMBER:"); ?> " + dialed_label + "</b>";
								document.getElementById("EAcommentsBoxA").innerHTML = "<b><?php echo _QXZ("Phone Code and Number:"); ?> </b>" + EAphone_code + " " + EAphone_number;

								var EAactive_link = '';
								if (EAalt_phone_active == 'Y') 
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
								else
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

								document.getElementById("EAcommentsBoxB").innerHTML = "<b><?php echo _QXZ("Active:"); ?> </b>" + EAalt_phone_active + "<br>" + EAactive_link;
								document.getElementById("EAcommentsBoxC").innerHTML = "<b><?php echo _QXZ("Alt Count:"); ?> </b>" + EAalt_phone_count;
								document.getElementById("EAcommentsBoxD").innerHTML = "<b><?php echo _QXZ("Notes:"); ?> </b>" + EAalt_phone_notes;
								showDiv('EAcommentsBox');
								}

							if (VDIC_data_VDIG[1].length > 0)
								{
								inOUT = 'IN';
								if (VDIC_data_VDIG[2].length > 2)
									{
									document.getElementById("MainStatuSSpan").style.background = VDIC_data_VDIG[2];
									document.getElementById("MainStatuSSpanOLD").style.background = VDIC_data_VDIG[2];
									}
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Name:"); ?> " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("UID:"); ?> " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("Lead:"); ?> " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " <?php echo _QXZ("List:"); ?> " + document.vicidial_form.list_id.value;}

								var temp_status_display_ingroup = " <?php echo _QXZ("Group"); ?>- " + VDIC_data_VDIG[1];
								if (status_display_ingroup == 'DISABLED')
									{temp_status_display_ingroup='';}

								document.getElementById("MainStatuSSpan").innerHTML = " <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + " " + custom_call_id + " " + temp_status_display_ingroup + "&nbsp; " + VDIC_fronter + " " + status_display_content; 
								}
                                                                $('.DTMF-BTN-keyboard').show();
							document.getElementById("HangupControl").innerHTML = "<a href=\"#\" onclick=\"dialedcall_send_hangup('','','','','YES');\" class='btn btn-danger'><i class='fa fa-phone fa-rotate-hangup'></i></a>";

					/*
							document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall.gif"); ?>\" border=\"0\" alt=\"Park Call\" /></a>";
							if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
								{
								document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall.gif"); ?>\" border=\"0\" alt=\"IVR Park Call\" /></a>";
								}

							document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class='btn btn-success'><i class='fa fa-share'></i></a>";

							document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_localcloser.gif"); ?>\" border=\"0\" alt=\"LOCAL CLOSER\" style=\"vertical-align:middle\" /></a>";

							document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_blindtransfer.gif"); ?>\" border=\"0\" alt=\"Dial Blind Transfer\" style=\"vertical-align:middle\" /></a>";

							document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_ammessage.gif"); ?>\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";

							if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
								{
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = default_xfer_group;}

								document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}
							if (prepopulate_transfer_preset_enabled > 0)
								{
								if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								}
							if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
								{
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

								document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}

							if (custom_3way_button_transfer_enabled > 0)
								{
								document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" /></a>";
								}


							if (call_requeue_button > 0)
								{
								var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
								var regCRB = new RegExp("AGENTDIRECT","ig");
								if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
									{
									document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
									}
								else
									{
									document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call_OFF.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" />";
									}
								}
					*/
							// Build transfer pull-down list
							var loop_ct = 0;
							var live_XfeR_HTML = '';
							var XfeR_SelecT = '';
							while (loop_ct < XFgroupCOUNT)
								{
								if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
									{XfeR_SelecT = 'selected ';}
								else {XfeR_SelecT = '';}
								live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
								loop_ct++;
								}
                                                                <!--console.log('Hello 3');-->
							document.getElementById("XfeRGrouPLisT").innerHTML = "<select size=\"1\" name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

							if (lastcustserverip == server_ip)
								{
								document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + lastcustchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_up.gif"); ?>\" border=\"0\" /></a>";
								document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + lastcustchannel + "','');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_volume_down.gif"); ?>\" border=\"0\" /></a>";
								}

							if (dial_method == "INBOUND_MAN")
								{
								document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
								}
							else
								{
								document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
								}

							if (VDCL_group_id.length > 1)
								{var group = VDCL_group_id;}
							else
								{var group = campaign;}
							if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

							if (hide_gender < 1)
								{
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}

							LeaDDispO='';

							var regWFAcustom = new RegExp("^VAR","ig");
							if (VDIC_web_form_address.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
								TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
								}

							if (VDIC_web_form_address_two.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
								}

							if (VDIC_web_form_address_three.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
								}

                                                                <!--console.log('Script 3');-->
							document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";

							if (enable_second_webform > 0)
								{
								document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
								}
							if (enable_third_webform > 0)
								{
								document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
								}

							if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
								{all_record = 'YES';}

							if (CalL_ScripT_color.length > 1)
								{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
							if ( (view_scripts == 1) && (CalL_ScripT_id.length > 0) )
								{
								var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
								var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

								if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
									{
									delayed_script_load = 'YES';
									RefresHScript('CLEAR');
									}
								else
									{
									load_script_contents('ScriptContents','');
									}
								}

							if (custom_fields_enabled > 0)
								{
								FormContentsLoad();
								}
							// JOEJ 082812 - new for email feature
							if (email_enabled > 0)
								{
								EmailContentsLoad();
								}
							// JOEJ 060514 - new for chat feature
							if (chat_enabled > 0)
								{
								CustomerChatContentsLoad('', '', manual_chat_override);
								}
							if (CalL_AutO_LauncH == 'SCRIPT')
								{
								if (delayed_script_load == 'YES')
									{
									load_script_contents('ScriptContents','');
									}
								ScriptPanelToFront();
								}
							if (CalL_AutO_LauncH == 'FORM')
								{
								FormPanelToFront();
								}
							if (CalL_AutO_LauncH == 'EMAIL')
								{
								EmailPanelToFront();
								}
							if (CalL_AutO_LauncH == 'CHAT')
								{
								CustomerChatPanelToFront();
								}

							if (CalL_AutO_LauncH == 'WEBFORM')
								{
								window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}
							if (CalL_AutO_LauncH == 'WEBFORMTWO')
								{
								window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}
							if (CalL_AutO_LauncH == 'WEBFORMTHREE')
								{
								window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								}

							if (useIE > 0)
								{
								var regCTC = new RegExp("^NONE","ig");
								if (CopY_tO_ClipboarD.match(regCTC))
									{var nothing=1;}
								else
									{
									var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
							//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
									window.clipboardData.setData('Text', tmp_clip.value)
							//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
									}
								}

							if (alert_enabled=='ON')
								{
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);
								alert(" <?php echo _QXZ("Incoming:"); ?> " + dial_display_number + "\n <?php echo _QXZ("Group"); ?>- " + VDIC_data_VDIG[1] + " &nbsp; " + VDIC_fronter);
								}
							}
							xmlhttprequestcheckother = undefined;
							delete xmlhttprequestcheckother;
						}
					}
				}
			}
		}


// ################################################################################
// refresh or clear the SCRIPT frame contents
	function RefresHScript(temp_wipe,RFSclick)
		{
		if (RFSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----RefresHScript---" + temp_wipe + "|";}
		if (temp_wipe == 'CLEAR')
			{
			document.getElementById("ScriptContents").innerHTML = '';
			}
		else
			{
			document.getElementById("ScriptContents").innerHTML = '';
			WebFormRefresH('','','1');
			WebFormTwoRefresH('','','1');
			WebFormThreeRefresH('','','1');
			load_script_contents('ScriptContents','');
			}
		}


// ################################################################################
// refresh the content of the web form URL
	function WebFormRefresH(taskrefresh,submittask,force_webvars_refresh) 
		{
		var webvars_refresh=0;

		if (VDCL_group_id.length > 1)
			{var group = VDCL_group_id;}
		else
			{var group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
			TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
			}
		else
			{webvars_refresh=1;}

		if ( (webvars_refresh > 0) || (force_webvars_refresh > 0) )
			{
			TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
			}

		if (taskrefresh == 'OUT')
			{
//                        console.log('Script 4');
            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH('IN');\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";
			}
		else 
			{
//                        console.log('Script 5');
            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormRefresH('OUT');\" class='btn btn-success'><i class='fa fa-code-fork'></i></a>\n";
			}
		}


// ################################################################################
// refresh the content of the second web form URL
	function WebFormTwoRefresH(taskrefresh,submittask) 
		{
		if (VDCL_group_id.length > 1)
			{var group = VDCL_group_id;}
		else
			{var group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address_two.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
			TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
			}
		else
			{
			TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
			}

		if (enable_second_webform > 0)
			{
			if (taskrefresh == 'OUT')
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH('IN');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
				}
			else 
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormTwoRefresH('OUT');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
				}
			}
		}


// ################################################################################
// refresh the content of the third web form URL
	function WebFormThreeRefresH(taskrefresh,submittask) 
		{
		if (VDCL_group_id.length > 1)
			{var group = VDCL_group_id;}
		else
			{var group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address_three.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
			TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
			}
		else
			{
			TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
			}

		if (enable_third_webform > 0)
			{
			if (taskrefresh == 'OUT')
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH('IN');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
				}
			else 
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormThreeRefresH('OUT');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
				}
			}
		}


// ################################################################################
// Send hangup a second time from the dispo screen 
	function DispoHanguPAgaiN() 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoHanguPAgaiN---|";
		form_cust_channel = AgaiNHanguPChanneL;
		document.getElementById("callchannel").innerHTML = AgaiNHanguPChanneL;
		document.vicidial_form.callserverip.value = AgaiNHanguPServeR;
		lastcustchannel = AgaiNHanguPChanneL;
		lastcustserverip = AgaiNHanguPServeR;
		VD_live_call_secondS = AgainCalLSecondS;
		CalLCID = AgaiNCalLCID;

		document.getElementById("DispoSelectHAspan").innerHTML = "";

		dialedcall_send_hangup();
		}


// ################################################################################
// Send leave 3way call a second time from the dispo screen 
	function DispoLeavE3wayAgaiN() 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoLeavE3wayAgaiN---|";
		XDchannel = DispO3wayXtrAchannel;
		document.vicidial_form.xfernumber.value = DispO3wayCalLxfernumber;
		MDchannel = DispO3waychannel;
		lastcustserverip = DispO3wayCalLserverip;

		document.getElementById("DispoSelectHAspan").innerHTML = "";

		leave_3way_call('SECOND');

		DispO3waychannel = '';
		DispO3wayXtrAchannel = '';
		DispO3wayCalLserverip = '';
		DispO3wayCalLxfernumber = '';
		DispO3wayCalLcamptail = '';
		}


// ################################################################################
// Start Hangup Functions for both 
	function bothcall_send_hangup(BCHclick) 
		{
		if (BCHclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----bothcall_send_hangup---|";}
		xfer_agent_selected=0;
		if (lastcustchannel.length > 3)
			{dialedcall_send_hangup();}
		if (lastxferchannel.length > 3)
			{xfercall_send_hangup();}
		}

// ################################################################################
// Send Hangup command for customer call connected to the conference now to Manager
	function dialedcall_send_hangup(dispowindow,hotkeysused,altdispo,nodeletevdac,DSHclick) 
		{
		var required_fail=0;
		if (allow_required_fields=='Y')
			{
			var required_fields_list =  document.vicidial_form.required_fields.value;
			if (required_fields_list.length > 4)
				{
				var regRFtitle = new RegExp("title","ig");
				var regRFfirst_name = new RegExp("first_name","ig");
				var regRFmiddle_initial = new RegExp("middle_initial","ig");
				var regRFlast_name = new RegExp("last_name","ig");
				var regRFaddress1 = new RegExp("address1","ig");
				var regRFaddress2 = new RegExp("address2","ig");
				var regRFaddress3 = new RegExp("address3","ig");
				var regRFcity = new RegExp("city","ig");
				var regRFstate = new RegExp("state","ig");
				var regRFpostal_code = new RegExp("postal_code","ig");
				var regRFprovince = new RegExp("province","ig");
				var regRFphone_code = new RegExp("phone_code","ig");
				var regRFalt_phone = new RegExp("alt_phone","ig");
				var regRFvendor_lead_code = new RegExp("vendor_lead_code","ig");
				var regRFsecurity_phrase = new RegExp("security_phrase","ig");
				var regRFemail = new RegExp("email","ig");
				var error_field_list='';

				if (required_fields_list.match(regRFtitle))
					{
					var TEMP_title = document.vicidial_form.title.value;
					if (TEMP_title.length < 1){required_fail++;  error_field_list = error_field_list + " title";}
					}
				if (required_fields_list.match(regRFfirst_name))
					{
					var TEMP_first_name = document.vicidial_form.first_name.value;
					if (TEMP_first_name.length < 1){required_fail++;  error_field_list = error_field_list + " first_name";}
					}
				if (required_fields_list.match(regRFmiddle_initial))
					{
					var TEMP_middle_initial = document.vicidial_form.middle_initial.value;
					if (TEMP_middle_initial.length < 1){required_fail++;  error_field_list = error_field_list + " middle_initial";}
					}
				if (required_fields_list.match(regRFlast_name))
					{
					var TEMP_last_name = document.vicidial_form.last_name.value;
					if (TEMP_last_name.length < 1){required_fail++;  error_field_list = error_field_list + " last_name";}
					}
				if (required_fields_list.match(regRFaddress1))
					{
					var TEMP_address1 = document.vicidial_form.address1.value;
					if (TEMP_address1.length < 1){required_fail++;  error_field_list = error_field_list + " address1";}
					}
				if (required_fields_list.match(regRFaddress2))
					{
					var TEMP_address2 = document.vicidial_form.address2.value;
					if (TEMP_address2.length < 1){required_fail++;  error_field_list = error_field_list + " address2";}
					}
				if (required_fields_list.match(regRFaddress3))
					{
					var TEMP_address3 = document.vicidial_form.address3.value;
					if (TEMP_address3.length < 1){required_fail++;  error_field_list = error_field_list + " address3";}
					}
				if (required_fields_list.match(regRFcity))
					{
					var TEMP_city = document.vicidial_form.city.value;
					if (TEMP_city.length < 1){required_fail++;  error_field_list = error_field_list + " city";}
					}
				if (required_fields_list.match(regRFstate))
					{
					var TEMP_state = document.vicidial_form.state.value;
					if (TEMP_state.length < 1){required_fail++;  error_field_list = error_field_list + " state";}
					}
				if (required_fields_list.match(regRFpostal_code))
					{
					var TEMP_postal_code = document.vicidial_form.postal_code.value;
					if (TEMP_postal_code.length < 1){required_fail++;  error_field_list = error_field_list + " postal_code";}
					}
				if (required_fields_list.match(regRFprovince))
					{
					var TEMP_province = document.vicidial_form.province.value;
					if (TEMP_province.length < 1){required_fail++;  error_field_list = error_field_list + " province";}
					}
				if (required_fields_list.match(regRFvendor_lead_code))
					{
					var TEMP_vendor_lead_code = document.vicidial_form.vendor_lead_code.value;
					if (TEMP_vendor_lead_code.length < 1){required_fail++;  error_field_list = error_field_list + " vendor_lead_code";}
					}
				if (required_fields_list.match(regRFphone_code))
					{
					var TEMP_phone_code = document.vicidial_form.phone_code.value;
					if (TEMP_phone_code.length < 1){required_fail++;  error_field_list = error_field_list + " phone_code";}
					}
				if (required_fields_list.match(regRFalt_phone))
					{
					var TEMP_alt_phone = document.vicidial_form.alt_phone.value;
					if (TEMP_alt_phone.length < 1){required_fail++;  error_field_list = error_field_list + " alt_phone";}
					}
				if (required_fields_list.match(regRFsecurity_phrase))
					{
					var TEMP_security_phrase = document.vicidial_form.security_phrase.value;
					if (TEMP_security_phrase.length < 1){required_fail++;  error_field_list = error_field_list + " security_phrase";}
					}
				if (required_fields_list.match(regRFemail))
					{
					var TEMP_email = document.vicidial_form.email.value;
					if (TEMP_email.length < 1){required_fail++;  error_field_list = error_field_list + " email";}
					}
				}
			}
		if (required_fail > 0)
			{
			alert_box("<?php echo _QXZ("YOU MUST FILL IN ALL REQUIRED FIELDS BEFORE YOU CAN HANG UP THIS CALL");?>: " + error_field_list);
			}
		else
			{
			if (VDCL_group_id.length > 1)
				{var group = VDCL_group_id;}
			else
				{var group = campaign;}
			var form_cust_channel = document.getElementById("callchannel").innerHTML;
			var form_cust_serverip = document.vicidial_form.callserverip.value;
			var customer_channel = lastcustchannel;
			var customer_server_ip = lastcustserverip;
			AgaiNHanguPChanneL = lastcustchannel;
			AgaiNHanguPServeR = lastcustserverip;
			AgainCalLSecondS = VD_live_call_secondS;
			AgaiNCalLCID = CalLCID;
			dial_next_failed=0;
			if (customer_sec < 1)
				{customer_sec = VD_live_call_secondS;}
			var process_post_hangup=0;

			if (DSHclick=='YES')
				{button_click_log = button_click_log + "" + SQLdate + "-----dialedcall_send_hangup---" + group + "|" + form_cust_channel + "|" + CalLCID + "|" + VD_live_call_secondS + "|";}

			// Force chat to end, if exists.  Uses hangup_override value in EndChat function to end if chat does not exist.
			if (document.getElementById('CustomerChatIFrame') && typeof document.getElementById('CustomerChatIFrame').contentWindow.EndChat=='function')
				{
				document.getElementById('CustomerChatIFrame').contentWindow.EndChat('Hangup');
				}

			if ( (RedirecTxFEr < 1) && ( (MD_channel_look==1) || (auto_dial_level == 0) ) )
				{
				MD_channel_look=0;
				DialTimeHangup('MAIN');
				}
			if (form_cust_channel.length > 3)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					var queryCID = "HLvdcW" + epoch_sec + user_abb;
					var hangupvalue = customer_channel;
					//		alert(auto_dial_level + "|" + CalLCID + "|" + customer_server_ip + "|" + hangupvalue + "|" + VD_live_call_secondS);
					custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=Hangup&format=text&user=" + user + "&pass=" + pass + "&channel=" + hangupvalue + "&call_server_ip=" + customer_server_ip + "&queryCID=" + queryCID + "&auto_dial_level=" + auto_dial_level + "&CalLCID=" + CalLCID + "&secondS=" + VD_live_call_secondS + "&exten=" + session_id + "&campaign=" + group + "&stage=CALLHANGUP&nodeletevdac=" + nodeletevdac + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
					xmlhttp.open('POST', 'manager_send.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(custhangup_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							Nactiveext = null;
							Nactiveext = xmlhttp.responseText;

						//		alert(xmlhttp.responseText);
						//	var HU_debug = xmlhttp.responseText;
						//	var HU_debug_array=HU_debug.split(" ");
						//	if (HU_debug_array[0] == 'Call')
						//		{
						//		alert(xmlhttp.responseText);
						//		}

							}
						}
					process_post_hangup=1;
					delete xmlhttp;
					}
				}
			else 
				{process_post_hangup=1;}
			if (process_post_hangup==1)
				{
				VD_live_customer_call = 0;
				VD_live_call_secondS = 0;
				MD_ring_secondS = 0;
				CalLCID = '';
				MDnextCID = '';
				cid_lock=0;

			//	UPDATE VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
				DialLog("end",nodeletevdac);
				conf_dialed=0;
				if (dispowindow == 'NO')
					{
					open_dispo_screen=0;
					}
				else
					{
					if (auto_dial_level == 0)			
						{
						if (document.vicidial_form.DiaLAltPhonE.checked==true)
							{
							reselect_alt_dial = 1;
							open_dispo_screen=0;
							}
						else
							{
							reselect_alt_dial = 0;
							open_dispo_screen=1;
							}
						}
					else
						{
						if (document.vicidial_form.DiaLAltPhonE.checked==true)
							{
							reselect_alt_dial = 1;
							open_dispo_screen=0;
							auto_dial_level=0;
							manual_dial_in_progress=1;
							auto_dial_alt_dial=1;
							}
						else
							{
							reselect_alt_dial = 0;
							open_dispo_screen=1;
							}
						}
					}

			//  DEACTIVATE CHANNEL-DEPENDANT BUTTONS AND VARIABLES
				document.getElementById("callchannel").innerHTML = '';
				document.vicidial_form.callserverip.value = '';
				lastcustchannel='';
				lastcustserverip='';
				MDchannel='';
				if (post_phone_time_diff_alert_message.length > 10)
					{
					document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
					hideDiv('post_phone_time_diff_span');
					post_phone_time_diff_alert_message='';
					}

				if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
				<!--document.getElementById("WebFormSpan").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form\" />";-->
				if (enable_second_webform > 0)
					{
					document.getElementById("WebFormSpanTwo").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" />";
					}
				if (enable_third_webform > 0)
					{
					document.getElementById("WebFormSpanThree").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" />";
					}
				document.getElementById("ParkControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif"); ?>\" border=\"0\" alt=\"Park Call\" />";
				if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
					{
					document.getElementById("ivrParkControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_ivrparkcall_OFF.gif"); ?>\" border=\"0\" alt=\"IVR Park Call\" />";
					}
				<!--document.getElementById("HangupControl").innerHTML = "<img src=\"./images/<?php // echo _QXZ("vdc_LB_hangupcustomer_OFF.gif"); ?>\" border=\"0\" alt=\"Hangup Customer\" />";-->
				document.getElementById("HangupControl").innerHTML = "";
                                $('.DTMF-BTN-keyboard').hide();
				<!--document.getElementById("XferControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_transferconf_OFF.gif"); ?>\" border=\"0\" alt=\"Transfer - Conference\" />";-->
				document.getElementById("XferControl").innerHTML = "";
				document.getElementById("LocalCloser").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_XB_localcloser_OFF.gif"); ?>\" border=\"0\" alt=\"LOCAL CLOSER\" style=\"vertical-align:middle\" />";
				document.getElementById("DialBlindTransfer").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_XB_blindtransfer_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Blind Transfer\" style=\"vertical-align:middle\" />";
				document.getElementById("DialBlindVMail").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_XB_ammessage_OFF.gif"); ?>\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" />";
				document.getElementById("VolumeUpSpan").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_volume_up_off.gif"); ?>\" border=\"0\" />";
				document.getElementById("VolumeDownSpan").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_volume_down_off.gif"); ?>\" border=\"0\" />";

				if (quick_transfer_button_enabled > 0)
					{document.getElementById("QuickXfer").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer_OFF.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" />";}

				if (custom_3way_button_transfer_enabled > 0)
					{document.getElementById("CustomXfer").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer_OFF.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" />";}

				if (call_requeue_button > 0)
					{
					document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call_OFF.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" />";
					}

				document.getElementById("custdatetime").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';

				if ( (auto_dial_level == 0) && (dial_method != 'INBOUND_MAN') )
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
						if (altdispo == 'ALTPH2')
							{
							ManualDialOnly('ALTPhonE');
							}
						else
							{
							if (altdispo == 'ADDR3')
								{
								ManualDialOnly('AddresS3');
								}
							else
								{
								if (hotkeysused == 'YES')
									{
									alt_dial_active = 0;
									alt_dial_status_display = 0;
									reselect_alt_dial = 0;
									manual_auto_hotkey = 1;
									}
								}
							}
						}
					else
						{
						if (hotkeysused == 'YES')
							{
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							manual_auto_hotkey = 1;
							}
						else
							{
							document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
							}
						reselect_alt_dial = 0;
						}
					}
				else
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
						if (altdispo == 'ALTPH2')
							{
							ManualDialOnly('ALTPhonE');
							}
						else
							{
							if (altdispo == 'ADDR3')
								{
								ManualDialOnly('AddresS3');
								}
							else
								{
								if (hotkeysused == 'YES')
									{
									manual_auto_hotkey = 1;
									alt_dial_active=0;
									alt_dial_status_display = 0;

									document.getElementById("MainStatuSSpan").style.background =panel_bgcolor;
									document.getElementById("MainStatuSSpanOLD").style.background =panel_bgcolor;
									document.getElementById("MainStatuSSpan").innerHTML = '';
									if (dial_method == "INBOUND_MAN")
										{
										document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
										}
									else
										{
										document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
										}
									reselect_alt_dial = 0;
									}
								}
							}
						}
					else
						{
						document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
						document.getElementById("MainStatuSSpanOLD").style.background = panel_bgcolor;
						if (dial_method == "INBOUND_MAN")
							{
							document.getElementById("DiaLControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_blank_OFF.gif"); ?>\" border=\"0\" alt=\"pause button disabled\" /><br><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" />";
							}
						else
							{
							document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
							}
						reselect_alt_dial = 0;
						}
					}
				ShoWTransferMain('OFF');
				}
			}
		}


// ################################################################################
// Send Hangup command for 3rd party call connected to the conference now to Manager
	function xfercall_send_hangup(HANclick) 
		{
		var xferchannel = document.vicidial_form.xferchannel.value;
		var xfer_channel = lastxferchannel;
		var process_post_hangup=0;
		xfer_in_call=0;
		if (HANclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----xfercall_send_hangup---" + xferchannel + "|";}
		if ( (MD_channel_look==1) && (leaving_threeway < 1) )
			{
			MD_channel_look=0;
			DialTimeHangup('XFER');
			}
		if (xferchannel.length > 3)
			{
			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var queryCID = "HXvdcW" + epoch_sec + user_abb;
				var hangupvalue = xfer_channel;
				custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=Hangup&format=text&user=" + user + "&pass=" + pass + "&channel=" + hangupvalue + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
				xmlhttp.open('POST', 'manager_send.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(custhangup_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						Nactiveext = null;
						Nactiveext = xmlhttp.responseText;
				//		alert(xmlhttp.responseText);
						}
					}
				process_post_hangup=1;
				delete xmlhttp;
				}
			}
		else {process_post_hangup=1;}
		if (process_post_hangup==1)
			{
			XD_live_customer_call = 0;
			XD_live_call_secondS = 0;
			MD_ring_secondS = 0;
			MD_channel_look=0;
			XDnextCID = '';
			XDcheck = '';
			xferchannellive=0;
			consult_custom_wait=0;
			consult_custom_go=0;
			consult_custom_sent=0;
			xfer_agent_selected=0;


		//  DEACTIVATE CHANNEL-DEPENDANT BUTTONS AND VARIABLES
			document.vicidial_form.xferchannel.value = "";
			lastxferchannel='';

        //  document.getElementById("Leave3WayCall").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_leave3waycall_OFF.gif"); ?>\" border=\"0\" alt=\"LEAVE 3-WAY CALL\" />";

            document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer.gif"); ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" /></a>";

            document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial.gif"); ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" /></a>";

            document.getElementById("HangupXferLine").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_hangupxferline_OFF.gif"); ?>\" border=\"0\" alt=\"Hangup Xfer Line\" style=\"vertical-align:middle\" />";

            document.getElementById("ParkXferLine").innerHTML ="<img src=\"./images/<?php echo _QXZ("vdc_XB_parkxferline_OFF.gif"); ?>\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" />";

            document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" onclick=\"bothcall_send_hangup('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hangupbothlines.gif"); ?>\" border=\"0\" alt=\"Hangup Both Lines\" style=\"vertical-align:middle\" /></a>";
			}
		}

// ################################################################################
// Send Hangup command for any Local call that is not in the quiet(7) entry - used to stop manual dials even if no connect
	function DialTimeHangup(tasktypecall) 
		{
		if ( (RedirecTxFEr < 1) && (leaving_threeway < 1) )
			{
	//	alert("RedirecTxFEr|" + RedirecTxFEr);
		MD_channel_look=0;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "HTvdcW" + epoch_sec + user_abb;
			custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=HangupConfDial&format=text&user=" + user + "&pass=" + pass + "&exten=" + session_id + "&ext_context=" + ext_context + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(custhangup_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText + "\n" + tasktypecall + "\n" + leaving_threeway);
 					}
				}
			delete xmlhttp;
			}
			}
		}


// ################################################################################
// Update vicidial_list lead record with all altered values from form
	function CustomerData_update()
		{
		if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
			{
			var test_otcx = document.vicidial_form.other_tab_comments.value;
			if (test_otcx.length > 0)
				{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
			}
		var REGcommentsAMP = new RegExp('&',"g");
		var REGcommentsQUES = new RegExp("\\?","g");
		var REGcommentsPOUND = new RegExp("\\#","g");
		var REGcommentsRESULT = document.vicidial_form.comments.value.replace(REGcommentsAMP, "--AMP--");
		REGcommentsRESULT = REGcommentsRESULT.replace(REGcommentsQUES, "--QUES--");
		REGcommentsRESULT = REGcommentsRESULT.replace(REGcommentsPOUND, "--POUND--");

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}

			VLupdate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&campaign=" + campaign +  "&ACTION=updateLEAD&format=text&user=" + user + "&pass=" + pass + 
			"&lead_id=" + encodeURIComponent(document.vicidial_form.lead_id.value) + 
			"&vendor_lead_code=" + encodeURIComponent(document.vicidial_form.vendor_lead_code.value) + 
			"&phone_number=" + encodeURIComponent(document.vicidial_form.phone_number.value) + 
			"&title=" + encodeURIComponent(document.vicidial_form.title.value) + 
			"&first_name=" + encodeURIComponent(document.vicidial_form.first_name.value) + 
			"&middle_initial=" + encodeURIComponent(document.vicidial_form.middle_initial.value) + 
			"&last_name=" + encodeURIComponent(document.vicidial_form.last_name.value) + 
			"&address1=" + encodeURIComponent(document.vicidial_form.address1.value) + 
			"&address2=" + encodeURIComponent(document.vicidial_form.address2.value) + 
			"&address3=" + encodeURIComponent(document.vicidial_form.address3.value) + 
			"&city=" + encodeURIComponent(document.vicidial_form.city.value) + 
			"&state=" + encodeURIComponent(document.vicidial_form.state.value) + 
			"&province=" + encodeURIComponent(document.vicidial_form.province.value) + 
			"&postal_code=" + encodeURIComponent(document.vicidial_form.postal_code.value) + 
			"&country_code=" + encodeURIComponent(document.vicidial_form.country_code.value) + 
			"&gender=" + encodeURIComponent(document.vicidial_form.gender.value) + 
			"&date_of_birth=" + encodeURIComponent(document.vicidial_form.date_of_birth.value) + 
			"&alt_phone=" + encodeURIComponent(document.vicidial_form.alt_phone.value) + 
			"&email=" + encodeURIComponent(document.vicidial_form.email.value) + 
			"&security_phrase=" + encodeURIComponent(document.vicidial_form.security_phrase.value) + 
			"&comments=" + REGcommentsRESULT;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VLupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}

		}

// ################################################################################
// Generate the Call Disposition Chooser panel
	function DispoSelectContent_create(taskDSgrp,taskDSstage,DSCclick)
		{
//                Dispo Active Class Hide
                $('.dispoBTN').addClass('btn-secondry');   
                $('.dispoBTN').removeClass('btn-success');
                
		if (DSCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DispoSelectContent_create---" + taskDSgrp + " " + taskDSstage + "|";}
		if (disable_dispo_screen > 0)
			{
			document.vicidial_form.DispoSelection.value = disable_dispo_status;
			DispoSelect_submit();
			}
		else
			{
			if (customer_3way_hangup_dispo_message.length > 1)
				{
				document.getElementById("Dispo3wayMessage").innerHTML = "<br><b><font color=\"red\" size=\"3\">" + customer_3way_hangup_dispo_message + "</font></b><br>";
				}
			if (APIManualDialQueue > 0)
				{
				document.getElementById("DispoManualQueueMessage").innerHTML = "<br><b><font color=\"red\" size=\"3\"><?php echo _QXZ("Manual Dial Queue Calls Waiting:"); ?> " + APIManualDialQueue + "</font></b><br>";
				}
			if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
				{
				var test_notes = document.vicidial_form.call_notes_dispo.value;
				if (test_notes.length > 0)
					{document.vicidial_form.call_notes.value = document.vicidial_form.call_notes_dispo.value}
				document.getElementById("PerCallNotesContent").innerHTML = "<br><b><font size=\"3\"><?php echo _QXZ("Call Notes:"); ?> </font></b><br><textarea name=\"call_notes_dispo\" id=\"call_notes_dispo\" rows=\"2\" cols=\"100\" class=\"form-control_text\" value=\"\">" + document.vicidial_form.call_notes.value + "</textarea>";
				}
			else
				{
				var test_notes = document.vicidial_form.call_notes_dispo.value;
				if (test_notes.length > 0)
					{document.vicidial_form.call_notes.value = document.vicidial_form.call_notes_dispo.value}
				document.getElementById("PerCallNotesContent").innerHTML = "<input type=\"hidden\" name=\"call_notes_dispo\" id=\"call_notes_dispo\" value=\"" + document.vicidial_form.call_notes.value + "\" />";
				}

			if ( (comments_dispo_screen == 'ENABLED') || (comments_dispo_screen == 'REPLACE_CALL_NOTES') )
				{
				var test_commmentsD = document.vicidial_form.dispo_comments.value;
				if (test_commmentsD.length > 0)
					{document.vicidial_form.comments.value = document.vicidial_form.dispo_comments.value;}

				var dispo_comment_output = "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\"><?php echo $label_comments ?>: <br><span id='dispoviewcommentsdisplay'><input type='button' id='DispoViewCommentButton' onClick=\"ViewComments('ON','','dispo','YES')\" value='-<?php _QXZ("History"); ?>-'/></span></font></td><td align=\"left\"><font class=\"body_text\">";
				dispo_comment_output = dispo_comment_output + "<textarea name=\"dispo_comments\" id=\"dispo_comments\" rows=\"2\" cols=\"100\" class=\"form-control_text\" value=\"\">" + document.vicidial_form.comments.value + "</textarea>\n";
				dispo_comment_output = dispo_comment_output + "</td></tr></table>\n";
				document.getElementById("DispoCommentsContent").innerHTML = dispo_comment_output;
				}
			else
				{
				document.getElementById("DispoCommentsContent").innerHTML = "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />";
				}

			HidEGenDerPulldown();
			AgentDispoing = 1;
			var CBflag = '';
			var MINMAXbegin='';
			var MINMAXend='';
			var VD_statuses_ct_onethird = parseInt(VARSELstatuses_ct / 3);
			var VD_statuses_ct_twothird = (VD_statuses_ct_onethird * 2);
			var dispo_HTML = "<table class='table'><tr><td colspan=\"2\"><b> <?php echo _QXZ("CALL DISPOSITION"); ?></b></td></tr><tr><td ><span id=\"DispoSelectA\">";
			var loop_ct = 0;
			var print_ct = 0;
			if (hide_dispo_list < 1)
				{
				while (loop_ct < VD_statuses_ct)
					{
					if (VARSELstatuses[loop_ct] == 'Y')
						{
						CBflag = '';
						if (VARCBstatuses[loop_ct] == 'Y')
							{CBflag = '*';}
						// check for minimum and maximum customer talk seconds to see if status is non-selectable
						if ( ( (VARMINstatuses[loop_ct] > 0) && (customer_sec < VARMINstatuses[loop_ct]) ) || ( (VARMAXstatuses[loop_ct] > 0) && (customer_sec > VARMAXstatuses[loop_ct]) ) )
							{
							dispo_HTML = dispo_HTML + '<DEL>' + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</DEL> " + CBflag + "<br><br>";
							}
						else
							{
							if (taskDSgrp == VARstatuses[loop_ct]) 
								{
								dispo_HTML = dispo_HTML + "<a class='btn btn-default waves-effect' href=\"#\" onclick=\"DispoSelect_submit('','','YES');return false;\">" + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</a> " + CBflag + "<br><br>";
								}
							else
								{
								dispo_HTML = dispo_HTML + "<a class='btn btn-default waves-effect' href=\"#\" onclick=\"DispoSelectContent_create('" + VARstatuses[loop_ct] + "','ADD','YES');return false;\" >" + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</a> " + CBflag + "<br><br>";
								}
							}
						if (print_ct == VD_statuses_ct_onethird) 
							{dispo_HTML = dispo_HTML + "</span></td><td ><span id=\"DispoSelectB\">";}
						if (print_ct == VD_statuses_ct_twothird) 
							{dispo_HTML = dispo_HTML + "</span></td><td><span id=\"DispoSelectC\">";}
						print_ct++;
						}
					loop_ct++;
					}
				}
			else
				{
				dispo_HTML = dispo_HTML + "<?php echo _QXZ("Disposition Status List Hidden"); ?><br><br>";
				}
			dispo_HTML = dispo_HTML + "</span></td></tr></table>";

			if (taskDSstage == 'ReSET') {document.vicidial_form.DispoSelection.value = '';}
			else {document.vicidial_form.DispoSelection.value = taskDSgrp;}
			
			document.getElementById("DispoSelectContent").innerHTML = dispo_HTML;
			if (focus_blur_enabled==1)
				{
				document.inert_form.inert_button.focus();
				document.inert_form.inert_button.blur();
				}
			if (my_callback_option == 'CHECKED')
				{document.vicidial_form.CallBackOnlyMe.checked=true;}
			}
		}

// ################################################################################
// Generate the Pause Code Chooser panel
	function PauseCodeSelectContent_create(PCSclick)
		{
		if (PCSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeSelectContent_create---|";}
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1','');
				}
			else
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO ENTER A PAUSE CODE IN AUTO-DIAL MODE"); ?>");
				}
			}
		if (move_on == 1)
			{
			if (APIManualDialQueue > 0)
				{
				PauseCodeSelect_submit('NXDIAL');
				}
			else
				{
				HidEGenDerPulldown();
				showDiv('PauseCodeSelectBox');
				WaitingForNextStep=1;
				PauseCode_HTML = '';
				document.vicidial_form.PauseCodeSelection.value = '';		
				var VD_pause_codes_ct_half = parseInt(VD_pause_codes_ct / 2);
                                
                PauseCode_HTML = "<table class=\"table\" style=\"width:400px;\"><tr><td colspan=\"2\"><font class=sh_text'> PAUSE CODE</font></td></tr><tr><td ><font class=\"log_text\"><span id=\"PauseCodeSelectA\">";
				var loop_ct = 0;
                               
//                                console.log(VARpause_codes);
//                                console.log(VARpause_code_names);
				while (loop_ct < VD_pause_codes_ct)
					{
                    PauseCode_HTML = PauseCode_HTML + "<font size=\"3\" ><b><a href=\"#\" class=\"btn btn-warning btn-block\" onclick=\"PauseCodeSelect_submit('" + VARpause_codes[loop_ct] + "','YES');return false;\">" + VARpause_codes[loop_ct] + " - " + VARpause_code_names[loop_ct] + "</a></b></font><br><br>";
					loop_ct++;
					if (loop_ct == VD_pause_codes_ct_half) 
                        {PauseCode_HTML = PauseCode_HTML + "</span></font><font class=\"log_text\"><span id=PauseCodeSelectB>";}
					}

				if (agent_pause_codes_active=='FORCE')
					{var Go_BacK_LinK = '';}
				else
                    {var Go_BacK_LinK = "<font size=\"3\" ><b><a href=\"#\" class=\"pull-right btn btn-default\" onclick=\"PauseCodeSelect_submit('','YES');return false;\">Go Back</a>";}

                PauseCode_HTML = PauseCode_HTML + "</span></font></td></tr></table><br><br>" + Go_BacK_LinK;
				document.getElementById("PauseCodeSelectContent").innerHTML = PauseCode_HTML;
				}
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Open lead search form panel
	function OpeNSearcHForMDisplaYBox()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNSearcHForMDisplaYBox---|";
		var move_on=1;

		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				if ( (inOUT=='IN') && ( (agent_lead_search=='LIVE_CALL_INBOUND') || (agent_lead_search=='LIVE_CALL_INBOUND_AND_MANUAL') ) )
					{
					// set phone number in search box to number of live inbound call
					document.vicidial_form.search_phone_number.value=document.vicidial_form.phone_number.value;
					inbound_lead_search=1;
					}
				else
					{
					move_on=0;
					alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO SEARCH FOR A LEAD"); ?>: " + inOUT + "|" + agent_lead_search);
					}
				}
			}
		else
			{
			if (agent_lead_search=='LIVE_CALL_INBOUND')
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE ON AN ACTIVE INBOUND CALL TO SEARCH FOR A LEAD"); ?>");
				}
			}
		if (move_on == 1)
			{
			HidEGenDerPulldown();
			showDiv('SearcHForMDisplaYBox');
			if ( (VD_live_customer_call!=1) || (inOUT=='OUT') )
				{WaitingForNextStep=1;}
			}
		}


// ################################################################################
// Generate the Contacts Search span content
	function generate_contacts_search(CNTclick)
		{
		if (CNTclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----generate_contacts_search---|";}
		HidEGenDerPulldown();
		showDiv('SearcHContactsDisplaYBox');
		}


// ################################################################################
// Generate the Presets Chooser span content

function generate_presets_pulldown(PREclick) {
        Presets_HTML = "<select id=\"XfeRPreset\" name=\"XfeRPreset\" class=\"form-control XfeRPreset\" onChange=\"NewPresetSelect_submit(this.value);return false;\"><option></option>";
        var loop_ct = 0;
        while (loop_ct < VD_preset_names_ct) {
            Presets_HTML = Presets_HTML + "<option value='" + VARpreset_names[loop_ct] + "|" + VARpreset_numbers[loop_ct] + "|" + VARpreset_dtmfs[loop_ct] + "|" + VARpreset_hide_numbers[loop_ct] + "'>" + VARpreset_names[loop_ct];
            if (VARpreset_hide_numbers[loop_ct] == 'N') {
                Presets_HTML = Presets_HTML + " - " + VARpreset_numbers[loop_ct];
            }
            Presets_HTML = Presets_HTML + "</option>";
            loop_ct++;
        }
        Presets_HTML = Presets_HTML + "</select>";
        $('#PresetsSelectBoxContent').html(Presets_HTML);
    }
    
    
	function generate_presets_pulldown_OLD(PREclick)
		{
		if (PREclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----generate_presets_pulldown---|";}
		showDiv('PresetsSelectBox');
		Presets_HTML = '';
		document.vicidial_form.PresetSelection.value = '';		
        Presets_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"400px\"><tr><td bgcolor=\"#CCCCFF\" height=<?php echo $HTheight ?> width=\"400px\" valign=\"bottom\"><font class=\"log_text\">";
		var loop_ct = 0;
		while (loop_ct < VD_preset_names_ct)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('" + VARpreset_names[loop_ct] + "','" + VARpreset_numbers[loop_ct] + "','" + VARpreset_dtmfs[loop_ct] + "','" + VARpreset_hide_numbers[loop_ct] + "','N');return false;\">" + VARpreset_names[loop_ct];
			if (VARpreset_hide_numbers[loop_ct]=='N')
				{Presets_HTML = Presets_HTML + " - " + VARpreset_numbers[loop_ct];}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			loop_ct++;
			}

		if ( (CalL_XC_a_NuMber.length > 0) || (CalL_XC_a_Dtmf.length > 0) )
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D1','" + CalL_XC_a_NuMber + "','" + CalL_XC_a_Dtmf + "','N','N');return false;\">D1";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_a_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			}
		if ( (CalL_XC_b_NuMber.length > 0) || (CalL_XC_b_Dtmf.length > 0) )
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D2','" + CalL_XC_b_NuMber + "','" + CalL_XC_b_Dtmf + "','N','N');return false;\">D2";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_b_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			}
		if (CalL_XC_c_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D3','" + CalL_XC_c_NuMber + "','','N','N');return false;\">D3";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_c_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			}
		if (CalL_XC_d_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D4','" + CalL_XC_d_NuMber + "','','N','N');return false;\">D4";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_d_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			}
		if (CalL_XC_e_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D5','" + CalL_XC_e_NuMber + "','','N','N');return false;\">D5";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_e_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br>";
			}

        Presets_HTML = Presets_HTML + "</td></tr></table><br><br><table cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"330px\" align=\"left\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #CCCCFF\"><b><a href=\"#\" onclick=\"hideDiv('PresetsSelectBox');return false;\"><?php echo _QXZ("Close"); ?> [X]</a></b></font></td></tr></table>";
		document.getElementById("PresetsSelectBoxContent").innerHTML = Presets_HTML;
		}


// ################################################################################
// Submit chosen Preset
	function PresetSelect_submit(taskpresetname,taskpresetnumber,taskpresetdtmf,taskhidenumber,taskclosesearch)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----PresetSelect_submit---" + taskpresetname + " " + taskpresetnumber + " " + taskpresetdtmf + " " + taskhidenumber + " " + taskclosesearch + "|";
		if (taskclosesearch=='Y')
			{
			hideDiv('SearcHResultSContactsBox');
			hideDiv('SearcHContactsDisplaYBox');
			}
		hideDiv('PresetsSelectBox');
		document.vicidial_form.conf_dtmf.value = taskpresetdtmf;
		document.vicidial_form.xfername.value = taskpresetname;
		if ( (taskhidenumber=='Y') && (hide_xfer_number_to_dial=='DISABLED') )
			{
			document.vicidial_form.xfernumhidden.value = taskpresetnumber;
			document.vicidial_form.xfernumber.value='';
			}
		else
			{
			document.vicidial_form.xfernumhidden.value = '';
			document.vicidial_form.xfernumber.value = taskpresetnumber;
			}
		scroll(0,0);
		}


// ################################################################################
// Generate the Group Alias Chooser panel
	function GroupAliasSelectContent_create(task3way)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----GroupAliasSelectContent_create---" + task3way + "|";
		HidEGenDerPulldown();
		showDiv('GroupAliasSelectBox');
		WaitingForNextStep=1;
		GroupAlias_HTML = '';
		document.vicidial_form.GroupAliasSelection.value = '';		
		var VD_group_aliases_ct_half = parseInt(VD_group_aliases_ct / 2);
        GroupAlias_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td colspan=\"2\"> <font style=\"sh_text\"><?php echo _QXZ("GROUP ALIAS"); ?></font></td></tr><tr><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=\"GroupAliasSelectA\">";
		if (task3way > 0)
			{
			VD_group_aliases_ct_half = (VD_group_aliases_ct_half - 1);
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('CAMPAIGN','" + campaign_cid + "','0');return false;\"><?php echo _QXZ("CAMPAIGN"); ?> - " + campaign_cid + "</a></b></font><br><br>";
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('CUSTOMER','" + document.vicidial_form.phone_number.value + "','0');return false;\"><?php echo _QXZ("CUSTOMER"); ?> - " + document.vicidial_form.phone_number.value + "</a></b></font><br><br>";
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('AGENT_PHONE','" + outbound_cid + "','0');return false;\"><?php echo _QXZ("AGENT_PHONE"); ?> - " + outbound_cid + "</a></b></font><br><br>";
			}
		var loop_ct = 0;
		while (loop_ct < VD_group_aliases_ct)
			{
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('" + VARgroup_alias_ids[loop_ct] + "','" + VARcaller_id_numbers[loop_ct] + "','1');return false;\">" + VARgroup_alias_ids[loop_ct] + " - " + VARgroup_alias_names[loop_ct] + " - " + VARcaller_id_numbers[loop_ct] + "</a></b></font><br><br>";
			loop_ct++;
			if (loop_ct == VD_group_aliases_ct_half) 
                {GroupAlias_HTML = GroupAlias_HTML + "</span></font></td><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=GroupAliasSelectB>";}
			}

        var Go_BacK_LinK = "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('','','0');return false;\"><?php echo _QXZ("Go Back"); ?></a>";

        GroupAlias_HTML = GroupAlias_HTML + "</span></font></td></tr></table><br><br>" + Go_BacK_LinK;
		document.getElementById("GroupAliasSelectContent").innerHTML = GroupAlias_HTML;
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}


// ################################################################################
// Generate the Dial In-Group Chooser panel
	function ManuaLDiaLInGrouPSelectContent_create()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManuaLDiaLInGrouPSelectContent_create---|";
		HidEGenDerPulldown();
		showDiv('DiaLInGrouPSelectBox');
		WaitingForNextStep=1;
		DiaLInGrouP_HTML = '';
		document.vicidial_form.DiaLInGrouPSelection.value = '';		
		var VD_dial_ingroups_ct_half = parseInt(dialINgroupCOUNT / 2);
        DiaLInGrouP_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td colspan=\"2\"><font class=\"sh_text\"> <?php echo _QXZ("DIAL IN-GROUP"); ?></font></td></tr><tr><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=\"DiaLInGrouPSelectA\">";
		var loop_ct = 0;
		while (loop_ct < dialINgroupCOUNT)
			{
            DiaLInGrouP_HTML = DiaLInGrouP_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"DiaLInGrouPSelect_submit('" + VARdialingroups[loop_ct] + "','1');return false;\">" + VARdialingroups[loop_ct] + "</a></b></font><br><br>";
			loop_ct++;
			if (loop_ct == VD_dial_ingroups_ct_half) 
                {DiaLInGrouP_HTML = DiaLInGrouP_HTML + "</span></font></td><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=DiaLInGrouPSelectB>";}
			}

        var Go_BacK_LinK = "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"DiaLInGrouPSelect_submit('');return false;\"><?php echo _QXZ("Go Back"); ?></a>";

        DiaLInGrouP_HTML = DiaLInGrouP_HTML + "</span></font></td></tr></table><br><br>" + Go_BacK_LinK;
		document.getElementById("DiaLInGrouPSelectContent").innerHTML = DiaLInGrouP_HTML;
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}


// ################################################################################
// open web form, then submit disposition
	function WeBForMDispoSelect_submit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----WeBForMDispoSelect_submit---|";
		leaving_threeway=0;
		blind_transfer=0;
		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.vicidial_form.xferchannel.value = '';
        document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer.gif"); ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" /></a>";
        document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial.gif"); ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" /></a>";
        document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" onclick=\"bothcall_send_hangup('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hangupbothlines.gif"); ?>\" border=\"0\" alt=\"Hangup Both Lines\" style=\"vertical-align:middle\" /></a>";

		var DispoChoice = document.vicidial_form.DispoSelection.value;

		if (DispoChoice.length < 1) {alert_box("<?php echo _QXZ("You Must Select a Disposition"); ?>");}
		else
			{
			document.getElementById("CusTInfOSpaN").innerHTML = "";
			document.getElementById("CusTInfOSpaN").style.background = panel_bgcolor;

			LeaDDispO = DispoChoice;
	
			WebFormRefresH('NO','YES');

//            document.getElementById("WebFormSpan").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form\" />";
			if (enable_second_webform > 0)
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_two_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form 2\" />";
				}
			if (enable_third_webform > 0)
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_webform_three_OFF.gif"); ?>\" border=\"0\" alt=\"Web Form 3\" />";
				}
			window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');

			DispoSelect_submit();
			}
		}


// ################################################################################
// Update vicidial_list lead record with disposition selection
	function DispoSelect_submit(temp_use_pause_code,temp_dispo_pause_code,DSPclick)
		{
                $('.dispoBTN').addClass('btn-secondry');   
                $('.dispoBTN').removeClass('btn-success');   
		if (DSPclick=='YES')
			{
                            button_click_log = button_click_log + "" + SQLdate + "-----DispoSelect_submit---|";
                                if($('.PauseCodeSwitch').hasClass('active')){
                                    var PauseCode = $('#DispoPauseCodeSelection').val();
                                    PauseCodeSelect_submit(PauseCode,'YES');
                                }
                                
                               
                        }
		if (VDCL_group_id.length > 1)
			{var group = VDCL_group_id;}
		else
			{var group = campaign;}
		leaving_threeway=0;
		blind_transfer=0;
		CheckDEADcallON=0;
		CheckDEADcallCOUNT=0;
		customer_sec=0;
		currently_in_email_or_chat=0;
		customer_3way_hangup_counter=0;
		customer_3way_hangup_counter_trigger=0;
		waiting_on_dispo=1;
		var VDDCU_recording_id=document.getElementById("RecorDID").innerHTML;
		var VDDCU_recording_filename=last_recording_filename;
		var dispo_urls='';
		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.vicidial_form.xferchannel.value = '';
        document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_dialwithcustomer.gif"); ?>\" border=\"0\" alt=\"Dial With Customer\" style=\"vertical-align:middle\" /></a>";
        document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_parkcustomerdial.gif"); ?>\" border=\"0\" alt=\"Park Customer Dial\" style=\"vertical-align:middle\" /></a>";
        document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" onclick=\"bothcall_send_hangup('YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hangupbothlines.gif"); ?>\" border=\"0\" alt=\"Hangup Both Lines\" style=\"vertical-align:middle\" /></a>";
 
		var DispoChoice = document.vicidial_form.DispoSelection.value;

		if (DispoChoice.length < 1) {
//                alert_box("<?php echo _QXZ("You Must Select a Disposition"); ?>");
                $.toast({
                        heading: 'Disposition Alert',
                        text: '<?php echo _QXZ("You Must Select a Disposition"); ?>',
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });
                }else{
                        
                        $('#DTMF-Model').hide();    
                        $('#HangupControl').hide();    
                        $('#WebFormSpan').hide();    
                        $('#XferControl').hide();    
                        $('#CallPause').show();    
                        $('#NextLead').show();    
                        $('#ManualDial').show();    
                        $('#InboundGroups').show();    
                        $('#LogoutBTN').show();
                        $('#StatsDetail-Area').show();
                        $('#StatsDetail-LI').show();
                        $('#LeadDetail-Area').hide();
                        $('#LeadDetail-LI').hide();
                        $('#WebForm-Display').hide();
                        $('#AgentWebFormView').hide();
                        $('#AgentDetailView').show();
                        $('#DispoModal').hide(); 
                        $('.CustomFieldsDiv').html('');    
			if (document.vicidial_form.lead_id.value == '') 
				{
			//	alert_box("<?php echo _QXZ("You can only disposition a call once"); ?>");
				waiting_on_dispo=0;
				AgentDispoing = 0;
                                $('#CallDispo-Modal').modal('hide');
				hideDiv('DispoSelectBox');
				hideDiv('DispoButtonHideA');
				hideDiv('DispoButtonHideB');
				hideDiv('DispoButtonHideC');
				document.getElementById("debugbottomspan").innerHTML =  "<?php echo _QXZ("Disposition set twice: "); ?>" + document.vicidial_form.lead_id.value + "|" + DispoChoice + "\n"
				}
			else
				{
				if (document.vicidial_form.DiaLAltPhonE.checked==true)
					{
					var man_status = ""; 
					document.getElementById("MainStatuSSpan").innerHTML = man_status;
					alt_dial_status_display = 0;
					}
				document.getElementById("CusTInfOSpaN").innerHTML = "";
				document.getElementById("CusTInfOSpaN").style.background = panel_bgcolor;
				var regCBstatus = new RegExp(' ' + DispoChoice + ' ',"ig");
                                console.log(scheduled_callbacks+' ---- '+VARCBstatusesLIST.match(regCBstatus)+' ---- '+DispoChoice);
				if ( (VARCBstatusesLIST.match(regCBstatus)) && (DispoChoice.length > 0) && (scheduled_callbacks > 0) && (DispoChoice != 'CBHOLD') )
					{
					var INTLastCallbackCount = parseInt(LastCallbackCount);
					var INTcallback_active_limit = parseInt(callback_active_limit);
					if ( (INTcallback_active_limit > 0) && (INTLastCallbackCount >= INTcallback_active_limit) )
						{
						document.getElementById("CallBackOnlyMe").checked = false;
						document.getElementById("CallBackOnlyMe").disabled = true;
						}
					else
						{
						document.getElementById("CallBackOnlyMe").disabled = false;
						}
					
					if ( (comments_callback_screen == 'ENABLED') || (comments_callback_screen == 'REPLACE_CB_NOTES') )
						{
						var cb_comment_output = "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\"><?php echo $label_comments ?>: <br><span id='cbviewcommentsdisplay'><input type='button' id='CBViewCommentButton' onClick=\"ViewComments('ON','','cb','YES')\" value='-<?php _QXZ("History"); ?>-'/></span></font></td><td align=\"left\"><font class=\"body_text\">";
						cb_comment_output = cb_comment_output + "<textarea name=\"cbcomment_comments\" id=\"cbcomment_comments\" rows=\"2\" cols=\"100\" class=\"form-control_text\" value=\"\">" + document.vicidial_form.dispo_comments.value + "</textarea>\n";
						cb_comment_output = cb_comment_output + "</td></tr></table>\n";
						document.getElementById("CBCommentsContent").innerHTML = cb_comment_output;
						}
					else
						{
						document.getElementById("CBCommentsContent").innerHTML = "<input type=\"hidden\" name=\"cbcomment_comments\" id=\"cbcomment_comments\" value=\"" + document.vicidial_form.dispo_comments.value + "\" />";
						}

					<!--showDiv('CallBackSelectBox');-->
                                        $('#CallDispo-Modal').modal('hide');
                                        $('#AgentCallbackSelection-Modal').modal('show');
					}
				else
					{
					var xmlhttp=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttp = false;
					  }
					 }
					@end @*/
					if (!xmlhttp && typeof XMLHttpRequest!='undefined')
						{
						xmlhttp = new XMLHttpRequest();
						}
					if (xmlhttp) 
						{
                                                
						DSupdate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=updateDISPO&format=text&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&dispo_choice=" + DispoChoice + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&auto_dial_level=" + auto_dial_level + "&agent_log_id=" + agent_log_id + "&CallBackDatETimE=" + CallBackDatETimE + "&list_id=" + document.vicidial_form.list_id.value + "&recipient=" + CallBackrecipient + "&use_internal_dnc=" + use_internal_dnc + "&use_campaign_dnc=" + use_campaign_dnc + "&MDnextCID=" + LasTCID + "&stage=" + group + "&vtiger_callback_id=" + vtiger_callback_id + "&phone_number=" + document.vicidial_form.phone_number.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&dial_method=" + dial_method + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&CallBackLeadStatus=" + CallBackLeadStatus + "&comments=" + encodeURIComponent(CallBackCommenTs) + "&custom_field_names=" + custom_field_names + "&call_notes=" + encodeURIComponent(document.vicidial_form.call_notes_dispo.value) + "&dispo_comments=" + encodeURIComponent(document.vicidial_form.dispo_comments.value) + "&cbcomment_comments=" + encodeURIComponent(document.vicidial_form.cbcomment_comments.value) + "&qm_dispo_code=" + DispoQMcsCODE + "&email_enabled=" + email_enabled + "&recording_id=" + VDDCU_recording_id + "&recording_filename=" + VDDCU_recording_filename + "&called_count=" + document.vicidial_form.called_count.value + "&parked_hangup=" + parked_hangup + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass;
						console.log(DSupdate_query);
                                                xmlhttp.open('POST', 'utg_vdc_db_query.php');
						xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttp.send(DSupdate_query); 
						xmlhttp.onreadystatechange = function() 
							{ 
						//	alert(DSupdate_query + "\n" +xmlhttp.responseText);

							if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
								{
							//	alert(xmlhttp.responseText);
								var check_dispo = null;
								check_dispo = xmlhttp.responseText;
								var check_DS_array=check_dispo.split("\n");
								if (auto_dial_level < 1)
									{
									if (check_DS_array[1] == 'Next agent_log_id:')
										{
										agent_log_id = check_DS_array[2];
										}
									}
								if (check_DS_array[3] == 'Dispo URLs:')
									{
									dispo_urls = check_DS_array[4];

									SendURLs(dispo_urls,"dispo");
									}
								waiting_on_dispo=0;
								}
							}
						delete xmlhttp;
						}
					// CLEAR ALL FORM VARIABLES
					document.vicidial_form.lead_id.value		='';
					document.vicidial_form.vendor_lead_code.value='';
					document.vicidial_form.list_id.value		='';
					document.vicidial_form.list_name.value		='';
					document.vicidial_form.list_description.value='';
					document.vicidial_form.entry_list_id.value	='';
					document.vicidial_form.gmt_offset_now.value	='';
					document.vicidial_form.phone_code.value		='';
					if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
						{
						var tmp_pn = document.getElementById("phone_numberDISP");
						tmp_pn.innerHTML			= ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';
						}
					document.vicidial_form.phone_number.value	='';
					document.vicidial_form.title.value			='';
					document.vicidial_form.first_name.value		='';
					document.vicidial_form.middle_initial.value	='';
					document.vicidial_form.last_name.value		='';
					document.vicidial_form.address1.value		='';
					document.vicidial_form.address2.value		='';
					document.vicidial_form.address3.value		='';
					document.vicidial_form.city.value			='';
					document.vicidial_form.state.value			='';
					document.vicidial_form.province.value		='';
					document.vicidial_form.postal_code.value	='';
					document.vicidial_form.country_code.value	='';
					document.vicidial_form.gender.value			='';
					document.vicidial_form.date_of_birth.value	='';
					document.vicidial_form.alt_phone.value		='';
					document.vicidial_form.email.value			='';
					document.vicidial_form.security_phrase.value='';
					document.vicidial_form.comments.value		='';
					document.vicidial_form.other_tab_comments.value		='';
					document.getElementById("audit_comments").innerHTML		='';
					if (qc_enabled > 0)
						{
						document.vicidial_form.ViewCommentButton.value		='';
						document.vicidial_form.audit_comments_button.value	='';
						if (comments_all_tabs == 'ENABLED')
							{document.vicidial_form.OtherViewCommentButton.value ='';}
						}
					document.vicidial_form.called_count.value	='';
					document.vicidial_form.call_notes.value		='';
					document.vicidial_form.call_notes_dispo.value ='';
					document.vicidial_form.email_row_id.value		='';
					document.vicidial_form.chat_id.value		='';
					document.vicidial_form.customer_chat_id.value		='';
					document.vicidial_form.dispo_comments.value ='';
					document.vicidial_form.cbcomment_comments.value ='';
					VDCL_group_id = '';
					fronter = '';
					inOUT = 'OUT';
					vtiger_callback_id='0';
					recording_filename='';
					recording_id='';
					document.vicidial_form.uniqueid.value='';
					MDuniqueid='';
					XDuniqueid='';
					tmp_vicidial_id='';
					EAphone_code='';
					EAphone_number='';
					EAalt_phone_notes='';
					EAalt_phone_active='';
					EAalt_phone_count='';
					XDnextCID='';
					XDcheck = '';
					MDnextCID='';
					XD_live_customer_call = 0;
					XD_live_call_secondS = 0;
					xfer_in_call=0;
					MD_channel_look=0;
					MD_ring_secondS=0;
					uniqueid_status_display='';
					uniqueid_status_prefix='';
					custom_call_id='';
					API_selected_xfergroup='';
					API_selected_callmenu='';
					timer_action='';
					timer_action_seconds='';
					timer_action_mesage='';
					timer_action_destination='';
					did_pattern='';
					did_id='';
					did_extension='';
					did_description='';
					did_custom_one='';
					did_custom_two='';
					did_custom_three='';
					did_custom_four='';
					did_custom_five='';
					closecallid='';
					xfercallid='';
					custom_field_names='';
					custom_field_values='';
					custom_field_types='';
					customerparked=0;
					customerparkedcounter=0;
					consult_custom_wait=0;
					consult_custom_go=0;
					consult_custom_sent=0;
					document.getElementById("ParkCounterSpan").innerHTML = '';
					document.vicidial_form.xfername.value='';
					document.vicidial_form.xfernumhidden.value='';
					document.getElementById("debugbottomspan").innerHTML = '';
					customer_3way_hangup_dispo_message='';
					document.getElementById("Dispo3wayMessage").innerHTML = '';
					document.getElementById("DispoManualQueueMessage").innerHTML = '';
					document.getElementById("ManualQueueNotice").innerHTML = '';
					APIManualDialQueue_last=0;
					document.vicidial_form.FORM_LOADED.value = '0';
					CallBackLeadStatus = '';
					CallBackDatETimE='';
					CallBackrecipient='';
					CallBackCommenTs='';
					DispoQMcsCODE='';
					active_ingroup_dial='';
					CalL_ScripT_id='';
					CalL_ScripT_color='';
					nocall_dial_flag='DISABLED';
					document.vicidial_form.CallBackDatESelectioN.value = '';
					document.vicidial_form.CallBackCommenTsField.value = '';

					document.vicidial_form.search_phone_number.value='';
					document.vicidial_form.search_lead_id.value='';
					document.vicidial_form.search_vendor_lead_code.value='';
					document.vicidial_form.search_first_name.value='';
					document.vicidial_form.search_last_name.value='';
					document.vicidial_form.search_city.value='';
					document.vicidial_form.search_state.value='';
					document.vicidial_form.search_postal_code.value='';
					document.vicidial_form.MDPhonENumbeR.value = '';
					document.vicidial_form.MDDiaLOverridE.value = '';
					document.vicidial_form.MDLeadID.value = '';
					document.vicidial_form.MDLeadIDEntry.value='';
					document.vicidial_form.MDType.value = '';
					document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
					inbound_lead_search=0;
					cid_lock=0;
					timer_alt_trigger=0;
					last_mdtype='';
					document.getElementById("timer_alt_display").innerHTML = '';
					document.getElementById("manual_auto_next_display").innerHTML = '';
					document.getElementById("RecorDID").innerHTML = '';
					dial_next_failed=0;
					xfer_agent_selected=0;
					source_id='';
					entry_date='';
					last_call_date='';
					if (manual_auto_next > 0)
						{manual_auto_next_trigger=1;   manual_auto_next_count=manual_auto_next;}
					if (agent_display_fields.match(adfREGentry_date))
						{document.getElementById("entry_dateDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGsource_id))
						{document.getElementById("source_idDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGdate_of_birth))
						{document.getElementById("date_of_birthDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGrank))
						{document.getElementById("rankDISP").innerHTML = ' &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGowner))
						{document.getElementById("ownerDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGlast_local_call_time))
						{document.getElementById("last_local_call_timeDISP").innerHTML = ' &nbsp; ';}

					if ( (manual_dial_search_checkbox == 'SELECTED_RESET') || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
						{document.vicidial_form.LeadLookuP.checked=true;}
					if ( (manual_dial_search_checkbox == 'UNSELECTED_RESET') || (manual_dial_search_checkbox == 'UNSELECTED_LOCK') )
						{document.vicidial_form.LeadLookuP.checked=false;}

					if (post_phone_time_diff_alert_message.length > 10)
						{
						document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
						hideDiv('post_phone_time_diff_span');
						post_phone_time_diff_alert_message='';
						}

					if (manual_dial_in_progress==1)
						{
						manual_dial_finished();
						}
					if (hide_gender < 1)
						{
						document.getElementById("GENDERhideFORieALT").innerHTML = '';
						document.getElementById("GENDERhideFORie").innerHTML = "<select size=\"1\" name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\"><?php echo _QXZ("U - Undefined"); ?></option><option value=\"M\"><?php echo _QXZ("M - Male"); ?></option><option value=\"F\"><?php echo _QXZ("F - Female"); ?></option></select>";
						}
					hideDiv('DispoSelectBox');
                                        $('#CallDispo-Modal').modal('hide');
					hideDiv('DispoButtonHideA');
					hideDiv('DispoButtonHideB');
					hideDiv('DispoButtonHideC');
					document.getElementById("DispoSelectBox").style.top = '1px';  // Firefox error on this line for some reason
					document.getElementById("DispoSelectMaxMin").innerHTML = "<a href=\"#\" onclick=\"DispoMinimize()\"> <?php echo _QXZ("minimize"); ?> </a>";
					document.getElementById("DispoSelectHAspan").innerHTML = "<a href=\"#\" onclick=\"DispoHanguPAgaiN()\"><?php echo _QXZ("Hangup Again"); ?></a>";
					if (pause_after_next_call == 'ENABLED')
						{
						document.getElementById("NexTCalLPausE").innerHTML = "<a href=\"#\" onclick=\"next_call_pause_click();return false;\"><?php echo _QXZ("Next Call Pause"); ?></a>";
						}
					CBcommentsBoxhide();
					EAcommentsBoxhide();
					ContactSearchReset();
					ViewComments('OFF','OFF');
					if (clear_script == 'ENABLED')
						{document.getElementById("ScriptContents").innerHTML = '';}
					parked_hangup='0';

					// Set customer chat tab to OFF, just to be sure
					if (chat_enabled > 0)
						{
						document.images['CustomerChatImg'].src=image_customer_chat_OFF.src;
						}
					CustomerChatContentsLoad();
					EmailContentsLoad();
	
					AgentDispoing = 0;

					if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
						{
						document.vicidial_form.DiaLAltPhonE.checked=true;
						}
					if ( (shift_logout_flag < 1) && (api_logout_flag < 1) )
						{
						if (wrapup_waiting == 0)
							{
							if (document.vicidial_form.DispoSelectStop.checked==true)
								{
								if (auto_dial_level != '0')
									{
									AutoDialWaiting = 0;
									QUEUEpadding = 0;
									if (temp_use_pause_code==1)
										{
										AutoDial_ReSume_PauSe("VDADpause",'','','','',"1",temp_dispo_pause_code);
										}
									else
										{
										AutoDial_ReSume_PauSe("VDADpause");
										}
									}
								VICIDiaL_pause_calling = 1;
								if (dispo_check_all_pause != '1')
									{
									document.vicidial_form.DispoSelectStop.checked=false;
									}
								}
							else
								{
								if (auto_dial_level != '0')
									{
									updatedispo_resume_trigger=1;
								//	AutoDialWaiting = 1;
								//	if (temp_use_pause_code==1)
								//		{
								//		agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID",'','','',"1",temp_dispo_pause_code);
								//		}
								//	else
								//		{
								//		agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID");
								//		}
									}
								else
									{
									// trigger HotKeys manual dial automatically go to next lead
								//	if (manual_auto_hotkey > 0)
								//		{
								//		manual_auto_hotkey = 0;
								//		ManualDialNext('','','','','','0');
								//		}
									}
								}
							}
						}
					else
						{
						if (shift_logout_flag > 0)
							{LogouT('SHIFT','');}
						else
							{LogouT('API','');}
						}
					if (focus_blur_enabled==1)
						{
						document.inert_form.inert_button.focus();
						document.inert_form.inert_button.blur();
						}
					}
				// scroll back to the top of the page
				scroll(0,0);
				}
			}
		}


// ################################################################################
// Submit the URLs 
	function SendURLs(newurlids,newurltype)
		{
		// Send AJAX call to run the defined url_ids for dispo_call_url
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			DUsend_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=RUNurls&format=text&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&url_ids=" + newurlids + "&campaign=" + campaign + "&auto_dial_level=" + auto_dial_level + "&stage=dispo";
			xmlhttp.open('POST', 'utg_vdc_db_query.php');
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(DUsend_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
				//	alert(DUsend_query + "\n" + xmlhttp.responseText);
					var dispo_url_send_response = null;
					dispo_url_send_response = xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Submit the Pause Code 
	function PauseCodeSelect_submit(newpausecode,PCSclick)
		{
		if (PCSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeSelect_submit---" + newpausecode + "|";}
		hideDiv('PauseCodeSelectBox');
		ShoWGenDerPulldown();

		WaitingForNextStep=0;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VMCpausecode_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=PauseCodeSubmit&format=text&status=" + newpausecode + "&agent_log_id=" + agent_log_id + "&campaign=" + campaign + "&extension=" + extension + "&protocol=" + protocol + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&stage=" + pause_code_counter + "&campaign_cid=" + LastCallCID + "&auto_dial_level=" + starting_dial_level;
//			console.log(VMCpausecode_query);
                        pause_code_counter++;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCpausecode_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var check_pause_code = null;
					var check_pause_code = xmlhttp.responseText;
					var check_PC_array=check_pause_code.split("\n");
                                       
					if (check_PC_array[1] == 'Next agent_log_id:')
						{agent_log_id = check_PC_array[2];}
                                                    
                                                    if(check_PC_array[5] >= 0){
//                                                     console.log(check_PC_array);
                                                    pauseTimer('countdown',check_PC_array[5]);
                                                    }
                                                    
				//	alert(VMCpausecode_query);
				//	alert(xmlhttp.responseText + "\n|" + check_PC_array[1] + "\n|" + check_PC_array[2] + "|" + agent_log_id + "|" + pause_code_counter);
					}
				}
			delete xmlhttp;
			}
//		return agent_log_id;
		LastCallCID='';
		scroll(0,0);
		}


// ################################################################################
// Submit the Group Alias 
	function GroupAliasSelect_submit(newgroupalias,newgroupcid,newusegroup)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----GroupAliasSelect_submit---" + newgroupalias + " " + newgroupcid + " " + newusegroup + "|";
		hideDiv('GroupAliasSelectBox');
		ShoWGenDerPulldown();
		WaitingForNextStep=0;
		
		if (newusegroup > 0)
			{
			active_group_alias = newgroupalias;
            document.getElementById("ManuaLDiaLGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
            document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "<font size=\"1\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
			}
		cid_choice = newgroupcid;
		scroll(0,0);
		}


// ################################################################################
// Submit the Dial In-Group 
	function DiaLInGrouPSelect_submit(dialingroupid,dialingroupgo)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DiaLInGrouPSelect_submit---" + dialingroupid + " " + dialingroupgo + "|";
		hideDiv('DiaLInGrouPSelectBox');
		ShoWGenDerPulldown();
		WaitingForNextStep=0;
		
		if (dialingroupid.length > 0)
			{
			active_ingroup_dial = dialingroupid;
            document.getElementById("ManuaLDiaLInGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\"><?php echo _QXZ("Dial In-Group:"); ?> " + active_ingroup_dial + "</font>";
			}
		scroll(0,0);
		}


// ################################################################################
// Update selected user and campaign settings
	function UpdatESettingS()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VUVCsettings_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=update_settings&format=text&agent_log_id=" + agent_log_id + "&campaign=" + campaign;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VUVCsettings_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var update_settings_content = null;
					var update_settings_content = xmlhttp.responseText;
					var settings_array=update_settings_content.split("\n");
					if (settings_array[0] == 'Agent Session: 1')
						{
						if (settings_array[1] == 'SETTINGS GATHERED')
							{
							var wrapup_seconds_array=settings_array[2].split("wrapup_seconds: ");
								wrapup_seconds=wrapup_seconds_array[1];
							var dead_max_array=settings_array[3].split("dead_max: ");
								dead_max=dead_max_array[1];
							var dispo_max_array=settings_array[4].split("dispo_max: ");
								dispo_max=dispo_max_array[1];
							var pause_max_array=settings_array[5].split("pause_max: ");
								pause_max=pause_max_array[1];
							var dead_max_dispo_array=settings_array[6].split("dead_max_dispo: ");
								dead_max_dispo=dead_max_dispo_array[1];
							var dispo_max_dispo_array=settings_array[7].split("dispo_max_dispo: ");
								dispo_max_dispo=dispo_max_dispo_array[1];
							var dial_timeout_array=settings_array[8].split("dial_timeout: ");
								dial_timeout=dial_timeout_array[1];
							var wrapup_bypass_array=settings_array[9].split("wrapup_bypass: ");
								wrapup_bypass=wrapup_bypass_array[1];
							var wrapup_message_array=settings_array[10].split("wrapup_message: ");
								wrapup_message=wrapup_message_array[1];
							var wrapup_after_hotkey_array=settings_array[11].split("wrapup_after_hotkey: ");
								wrapup_after_hotkey=wrapup_after_hotkey_array[1];
							var manual_dial_timeout_array=settings_array[12].split("manual_dial_timeout: ");
								manual_dial_timeout=manual_dial_timeout_array[1];

							if (wrapup_seconds > 0)
								{
								if (wrapup_bypass=='ENABLED')
									{document.getElementById("WrapupBypass").innerHTML = "<a href=\"#\" onclick=\"WrapupFinish();return false;\"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a>";}
								else
									{document.getElementById("WrapupBypass").innerHTML = '';}

								var wrapup_message_script = wrapup_message.replace(regWFS, '');
								wrapup_message_script = wrapup_message_script.replace(regWMS, '');
								if (wrapup_message.match(regWMS))
									{
									if (wrapup_message.match(regWFS))
										{load_script_contents('FSCREENWrapupMessage',wrapup_message_script);}
									else
										{load_script_contents('WrapupMessage',wrapup_message_script);}
									}
								else
									{
									if (wrapup_message.match(regWFS))
										{document.getElementById("FSCREENWrapupMessage").innerHTML = "<center>" + wrapup_message_script + "</center>";}
									else
										{document.getElementById("WrapupMessage").innerHTML = wrapup_message_script;}
									}
								}
							}
						}
				//	alert(VUVCsettings_query);
				//	alert(xmlhttp.responseText + "\n|" + settings_array[1] + "\n|" + settings_array[2] + "|" + wrapup_seconds + "|" + pause_max + "|" + dial_timeout);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Populate the dtmf and xfer number for each preset link in xfer-conf frame
	function DtMf_PreSet_a()
		{
		document.vicidial_form.conf_dtmf.value = CalL_XC_a_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;
		document.vicidial_form.xfername.value = 'D1';
		}
	function DtMf_PreSet_b()
		{
		document.vicidial_form.conf_dtmf.value = CalL_XC_b_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;
		document.vicidial_form.xfername.value = 'D2';
		}
	function DtMf_PreSet_c()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;
		document.vicidial_form.xfername.value = 'D3';
		}
	function DtMf_PreSet_d()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;
		document.vicidial_form.xfername.value = 'D4';
		}
	function DtMf_PreSet_e()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;
		document.vicidial_form.xfername.value = 'D5';
		}

	function DtMf_PreSet_a_DiaL(taskquiet,DTAclick)
		{
		if (DTAclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DtMf_PreSet_a_DiaL---|";}
		document.vicidial_form.conf_dtmf.value = CalL_XC_a_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_a_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_b_DiaL(taskquiet,DTBclick)
		{
		if (DTBclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DtMf_PreSet_b_DiaL---|";}
		document.vicidial_form.conf_dtmf.value = CalL_XC_b_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_b_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_c_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_c_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_d_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_d_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_e_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_e_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function hangup_timer_xfer()
		{
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;

		dialedcall_send_hangup();
		}
	function extension_timer_xfer()
		{
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
		}
	function callmenu_timer_xfer()
		{
		API_selected_callmenu = timer_action_destination;
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
		}
	function ingroup_timer_xfer()
		{
		API_selected_xfergroup = timer_action_destination;
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip);
		}

// ################################################################################
// Show message that customer has hungup the call before agent has
	function CustomerChanneLGone()
		{
		showDiv('CustomerGoneBox');

		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.getElementById("CustomerGoneChanneL").innerHTML = lastcustchannel;
		if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
		WaitingForNextStep=1;
		}
	function CustomerGoneOK()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CustomerGoneOK---|";
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;
		}
	function CustomerGoneHangup()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CustomerGoneHangup---|";
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;

		dialedcall_send_hangup();
		}
// ################################################################################
// Show message that there are no voice channels in the VICIDIAL session
	<!--function NoneInSession()-->
		<!--{-->
//		showDiv('NoneInSessionBox');
//		document.getElementById("NoneInSessionID").innerHTML = session_id;
//		WaitingForNextStep=1;
//                NoneInSessionCalL('LOGIN');
//                return false;
//                $('.CallAgentWebphone').click();
		<!--}-->
                
                
                function NoneInSession(webphone)
		{
//		showDiv('NoneInSessionBox');
//		document.getElementById("NoneInSessionID").innerHTML = session_id;
//		WaitingForNextStep=1;
//                NoneInSessionCalL('LOGIN');
//                return false;
//                $('.CallAgentWebphone').click();
if(webphone) {
            $('#1check').removeClass('hidden');
            $('#2check').removeClass('hidden');
            $('#3check').removeClass('hidden');
            $('#loadingPhone').removeClass('hidden').html($('#loadingPhone').html() + " .");
            if(nochannelinsession > 0) {
                NoneInSessionCalL('LOGIN');
            } else {
                setTimeout(
                    function()
                    {
                        NoneInSession(true);
                    }, 500);

            }
        } else {
//            $('#NoneInSessionBox').modal({backdrop: 'static', keyboard: false, show: true});
//            document.getElementById("NoneInSessionID").innerHTML = session_id;
            $('#phonering_disabled').removeClass('hidden');
        }
        WaitingForNextStep = 1;
		}
	function NoneInSessionOK()
		{
                $('#phonering_disabled').addClass('hidden');
		button_click_log = button_click_log + "" + SQLdate + "-----NoneInSessionOK---|";
		hideDiv('NoneInSessionBox');
		WaitingForNextStep=0;
		nochannelinsession=0;
		}
	function NoneInSessionCalL(tempstate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoneInSessionCalL---|";
                $('#phonering_disabled').addClass('hidden');
		hideDiv('NoneInSessionBox');
		WaitingForNextStep=0;
		nochannelinsession=0;

		if ( (protocol == 'EXTERNAL') || (protocol == 'Local') )
			{
			var protodial = 'Local';
			var extendial = extension;
	//		var extendial = extension + "@" + ext_context;
			}
		else
			{
			var protodial = protocol;
			var extendial = extension;
			}
		var originatevalue = protodial + "/" + extendial;
		var queryCID = "ACagcW" + epoch_sec + user_abb;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=OriginateVDRelogin&format=text&channel=" + originatevalue + "&queryCID=" + queryCID + "&exten=" + session_id + "&ext_context=" + login_context + "&ext_priority=1" + "&extension=" + extension + "&protocol=" + protocol + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&allow_sipsak_messages=" + allow_sipsak_messages + "&campaign=" + campaign + "&outbound_cid=" + campaign_cid;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
                                            
                                        console.log('Hi');
					console.log(xmlhttp.responseText);
                                        console.log('BYE');
					}
				}
			delete xmlhttp;
			}
		if ( (auto_dial_level > 0) && (tempstate != 'LOGIN') )
			{
			AutoDial_ReSume_PauSe("VDADpause");
			}
		}


// ################################################################################
// Generate the Closer In Group Chooser panel
	function CloserSelectContent_create(CLScreate)
		{
		if (CLScreate=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CloserSelectContent_create---|";}
		HidEGenDerPulldown();
		if ( (VU_agent_choose_ingroups == '1') && (manager_ingroups_set < 1) )
			{
//            var live_CSC_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"100%\"><tr><td><font class='sd_text'>Available Groups <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"><b>( <?php echo _QXZ("ADD ALL"); ?>)</a></font></td><td><font class='sd_text'>Selected Groups</font></td></tr><tr><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=CloserSelectAdd> &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"><b>( <?php echo _QXZ("ADD ALL"); ?>)</b><br>";
            var live_CSC_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"100%\"><tr><td><font class='sd_text'>Available Groups <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"><b>( <?php echo _QXZ("ADD ALL"); ?>)</a></font></td><td><font class='sd_text'>Selected Groups <span class=\"RemoveAllGroups\" style=\"display:none;\"><a href=\"#\" onclick=\"CloserSelect_change('-----DELETE-ALL-----','DELETE');return false;\"><b>(Remove All)</b></a></span></font></td></tr><tr><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\" class=\"green\"><font class=\"log_text\"><span id=CloserSelectAdd> &nbsp;";
//		$('.CloserSelectContent').find('.Positive').html("Available Groups (<a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"> <?php echo _QXZ("ADD ALL"); ?></a>)");	
                    var loop_ct = 0;
                    var New_live_CSC_HTML = '';
			while (loop_ct < INgroupCOUNT)
				{
                live_CSC_HTML = live_CSC_HTML + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','ADD');return false;\" class=\"btn btn-secondary w100 mb-10\">" + VARingroups[loop_ct] + "</a><br>";
                New_live_CSC_HTML = New_live_CSC_HTML + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','ADD');return false;\" class=\"btn btn-secondary w100 mb-10\">" + VARingroups[loop_ct] + "</a><br>";
				loop_ct++;
				}
                 $('#CloserSelectAdd1').html(New_live_CSC_HTML);               
            live_CSC_HTML = live_CSC_HTML + "</span></font></td><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\" class=\"red\"><font class=\"log_text\"><span id=CloserSelectDelete></span></font></td></tr></table>";

			document.vicidial_form.CloserSelectList.value = '';
			document.getElementById("CloserSelectContent").innerHTML = live_CSC_HTML;
			}
		else
			{
			// Added to get email counts so inbound emails will come in - this is normally done in CloserSelectContent_select, which is bypassed if agents aren't allowed to select ingroups
			var loop_ct = 0;
			EMAILgroupCOUNT = 0;
			CHATgroupCOUNT = 0;
			PHONEgroupCOUNT = 0;
			incomingEMAILS = 0;
			incomingCHATS = 0;
			while (loop_ct < INgroupCOUNT)
				{
				if (VARingroup_handlers[loop_ct]=="EMAIL") 
					{
					incomingEMAILgroups[incomingEMAILS]=VARingroups[loop_ct];
					EMAILgroupCOUNT++;
					incomingEMAILS++;
					}
				else if (VARingroup_handlers[loop_ct]=="CHAT") 
					{
					incomingCHATgroups[incomingCHATS]=VARingroups[loop_ct];
					CHATgroupCOUNT++;
					incomingCHATS++;
					}
				else
					{
					PHONEgroupCOUNT++;
					}
				loop_ct++;
				}

			VU_agent_choose_ingroups_DV = "MGRLOCK";
            var live_CSC_HTML = "<?php echo _QXZ("Manager has selected groups for you"); ?><br>";
			document.vicidial_form.CloserSelectList.value = '';
			document.getElementById("CloserSelectContent").innerHTML = live_CSC_HTML;
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Move a Closer In Group record to the selected column or reverse
	function CloserSelect_change(taskCSgrp,taskCSchange)
		{
                    
		button_click_log = button_click_log + "" + SQLdate + "-----CloserSelect_change---" + taskCSgrp + " " + taskCSchange + "|";
		var CloserSelectListValue = document.vicidial_form.CloserSelectList.value;
//                alert(CloserSelectListValue);
		var CSCchange = 0;
		var regCS = new RegExp(" " + taskCSgrp + " ","ig");
		var regCSall = new RegExp("-ALL-----","ig");
		var regCSallADD = new RegExp("-----ADD-ALL-----","ig");
		var regCSallDELETE = new RegExp("-----DELETE-ALL-----","ig");
//                alert(regCS);
		if ( (CloserSelectListValue.match(regCS)) && (CloserSelectListValue.length > 3) )
			{
			if (taskCSchange == 'DELETE') {CSCchange = 1;}
			}
		else
			{
			if (taskCSchange == 'ADD') {CSCchange = 1;}
			}
		if (taskCSgrp.match(regCSall))
			{CSCchange = 1;}

	//	alert(taskCSgrp+"|"+taskCSchange+"|"+CloserSelectListValue.length+"|"+CSCchange+"|"+CSCcolumn+"|"+INgroupCOUNT)
            
		if (CSCchange==1) 
			{
			var loop_ct = 0;
			EMAILgroupCOUNT = 0;
			CHATgroupCOUNT = 0;
			PHONEgroupCOUNT = 0;
			var CSCcolumn = '';
			var live_CSC_HTML_ADD = '';
			var live_CSC_HTML_DELETE = '';
			var live_CSC_LIST_value = " ";
			incomingEMAILS = 0;
			incomingCHATS = 0;
			incomingEMAILgroups = new Array();
			incomingCHATgroups = new Array();
			while (loop_ct < INgroupCOUNT)
				{
				var regCSL = new RegExp(" " + VARingroups[loop_ct] + " ","ig");
				if (CloserSelectListValue.match(regCSL)) {CSCcolumn = 'DELETE';}
				else {CSCcolumn = 'ADD';}
				if ( ( (VARingroups[loop_ct] == taskCSgrp) && (taskCSchange == 'DELETE') ) || (taskCSgrp.match(regCSallDELETE)) ) {CSCcolumn = 'ADD';}
				if ( ( (VARingroups[loop_ct] == taskCSgrp) && (taskCSchange == 'ADD') ) || (taskCSgrp.match(regCSallADD)) ) {CSCcolumn = 'DELETE';}
					

				if (CSCcolumn == 'DELETE')
					{
                    live_CSC_HTML_DELETE = live_CSC_HTML_DELETE + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','DELETE');return false;\" class=\"btn btn-info w100 mb-10\">" + VARingroups[loop_ct] + "</a><br>";
					live_CSC_LIST_value = live_CSC_LIST_value + VARingroups[loop_ct] + " ";
					if (VARingroup_handlers[loop_ct]=="EMAIL") 
						{
						incomingEMAILgroups[incomingEMAILS]=VARingroups[loop_ct];
						EMAILgroupCOUNT++;
						incomingEMAILS++;
						}
					else if (VARingroup_handlers[loop_ct]=="CHAT") 
						{
						incomingCHATgroups[incomingCHATS]=VARingroups[loop_ct];
						CHATgroupCOUNT++;
						incomingCHATS++;
						}
					else
						{
						PHONEgroupCOUNT++;
						}
					}
				else
					{
                    live_CSC_HTML_ADD = live_CSC_HTML_ADD + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','ADD');return false;\" class=\"btn btn-secondary w100 mb-10\">" + VARingroups[loop_ct] + "</a><br>";
					}
				loop_ct++;
				}
                               
			document.vicidial_form.CloserSelectList.value = live_CSC_LIST_value;
//            document.getElementById("CloserSelectAdd").innerHTML = " &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\" ><b>(Add All)</b><br>" + live_CSC_HTML_ADD;
            document.getElementById("CloserSelectAdd").innerHTML = " &nbsp; " + live_CSC_HTML_ADD;
//            document.getElementById("CloserSelectDelete").innerHTML = " &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----DELETE-ALL-----','DELETE');return false;\"><b>(Remove All)</b><br>" + live_CSC_HTML_DELETE;
            document.getElementById("CloserSelectDelete").innerHTML = " &nbsp;" + live_CSC_HTML_DELETE;
//            alert(live_CSC_HTML_DELETE);
            $('.RemoveAllGroups').show();
			}
		}

// ################################################################################
// Update vicidial_live_agents record with closer in group choices
	function CloserSelect_submit(CLSsubmit)
		{
		if (CLSsubmit=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CloserSelect_submit---|";}
		if (dial_method == "INBOUND_MAN")
			{document.vicidial_form.CloserSelectBlended.checked=false;}
		if (document.vicidial_form.CloserSelectBlended.checked==true)
			{VICIDiaL_closer_blended = 1;}
		else
			{VICIDiaL_closer_blended = 0;}

		var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;

		if (call_requeue_button > 0)
			{
//            document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/<?php echo _QXZ("vdc_LB_requeue_call_OFF.gif"); ?>\" border=\"0\" alt=\"Re-Queue Call\" />";
			}
		else
			{
//			document.getElementById("ReQueueCall").innerHTML =  "";
			}

		if (VU_agent_choose_ingroups_DV == "MGRLOCK")
			{CloserSelectChoices = "MGRLOCK";}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CSCupdate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=regCLOSER&format=text&user=" + user + "&pass=" + pass + "&comments=" + VU_agent_choose_ingroups_DV + "&closer_blended=" + VICIDiaL_closer_blended + "&campaign=" + campaign + "&qm_phone=" + qm_phone + "&qm_extension=" + qm_extension + "&dial_method=" + dial_method + "&closer_choice=" + CloserSelectChoices + "-";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CSCupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}

//		hideDiv('CloserSelectBox');
//                $('#modal-default').modal('hide');
                $('#modal-inbound-groups').modal('hide');
		MainPanelToFront();
		CloserSelecting = 0;
		scroll(0,0);
		}


// ################################################################################
// Generate the Territory Chooser panel
	function TerritorySelectContent_create(TERcreate)
		{
		if (TERcreate=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelectContent_create---|";}
		if (agent_select_territories == '1')
			{
			HidEGenDerPulldown();
			if (agent_choose_territories > 0)
				{
                var live_TERR_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td><font class='sd_text'><?php echo _QXZ("TERRITORIES NOT SELECTED"); ?></font></td><td><font class='sd_text'><?php echo _QXZ("SELECTED TERRITORIES"); ?></font></td></tr><tr><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=TerritorySelectAdd> &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- <?php echo _QXZ("ADD ALL"); ?> ---</b><br>";
				var loop_ct = 0;
				while (loop_ct < territoryCOUNT)
					{
                    live_TERR_HTML = live_TERR_HTML + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','ADD');return false;\">" + VARterritories[loop_ct] + "<br>";
					loop_ct++;
					}
                live_TERR_HTML = live_TERR_HTML + "</span></font></td><td bgcolor=\"\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=TerritorySelectDelete></span></font></td></tr></table>";

				document.vicidial_form.TerritorySelectList.value = '';
				document.getElementById("TerritorySelectContent").innerHTML = live_TERR_HTML;
				}
			else
				{
				agent_select_territories = "MGRLOCK";
                var live_TERR_HTML = "<?php echo _QXZ("Manager has selected territories for you"); ?><br>";
				document.vicidial_form.TerritorySelectList.value = '';
				document.getElementById("TerritorySelectContent").innerHTML = live_TERR_HTML;
				}
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Move a Territory record to the selected column or reverse
	function TerritorySelect_change(taskTERRgrp,taskTERRchange)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelect_change---" + taskTERRgrp + " " + taskTERRchange + "|";
		var TerritorySelectListValue = document.vicidial_form.TerritorySelectList.value;
		var TERRchange = 0;
		var regTERR = new RegExp(" " + taskTERRgrp + " ","ig");
		var regTERRall = new RegExp("-ALL-----","ig");
		var regTERRallADD = new RegExp("-----ADD-ALL-----","ig");
		var regTERRallDELETE = new RegExp("-----DELETE-ALL-----","ig");
		if ( (TerritorySelectListValue.match(regTERR)) && (TerritorySelectListValue.length > 3) )
			{
			if (taskTERRchange == 'DELETE') {TERRchange = 1;}
			}
		else
			{
			if (taskTERRchange == 'ADD') {TERRchange = 1;}
			}
		if (taskTERRgrp.match(regTERRall))
			{TERRchange = 1;}
//	alert("TERR: " + TerritorySelectListValue + "\nCHANGE: " + TERRchange + "\nACTION: " + taskTERRchange + "\nSELECTED: " + taskTERRgrp + "\nTOTAL: " + territoryCOUNT);
		if (TERRchange==1) 
			{
			var loop_ct = 0;
			var TERRcolumn = '';
			var live_TERR_HTML_ADD = '';
			var live_TERR_HTML_DELETE = '';
			var live_TERR_LIST_value = " ";
			while (loop_ct < territoryCOUNT)
				{
				var regTERRL = new RegExp(" " + VARterritories[loop_ct] + " ","ig");
				if (TerritorySelectListValue.match(regTERRL)) {TERRcolumn = 'DELETE';}
				else {TERRcolumn = 'ADD';}
				if ( ( (VARterritories[loop_ct] == taskTERRgrp) && (taskTERRchange == 'DELETE') ) || (taskTERRgrp.match(regTERRallDELETE)) ) 
					{TERRcolumn = 'ADD';}
				if ( ( (VARterritories[loop_ct] == taskTERRgrp) && (taskTERRchange == 'ADD') ) || (taskTERRgrp.match(regTERRallADD)) ) 
					{TERRcolumn = 'DELETE';}

				if (TERRcolumn == 'DELETE')
					{
                    live_TERR_HTML_DELETE = live_TERR_HTML_DELETE + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','DELETE');return false;\">" + VARterritories[loop_ct] + "<br>";
					live_TERR_LIST_value = live_TERR_LIST_value + VARterritories[loop_ct] + " ";
					}
				else
					{
                    live_TERR_HTML_ADD = live_TERR_HTML_ADD + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','ADD');return false;\">" + VARterritories[loop_ct] + "<br>";
					}
				loop_ct++;
				}

			document.vicidial_form.TerritorySelectList.value = live_TERR_LIST_value;
            document.getElementById("TerritorySelectAdd").innerHTML = " &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- <?php echo _QXZ("ADD ALL"); ?> ---</b><br>" + live_TERR_HTML_ADD;
            document.getElementById("TerritorySelectDelete").innerHTML = " &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----DELETE-ALL-----','DELETE');return false;\"><b>--- <?php echo _QXZ("DELETE ALL"); ?> ---</b><br>" + live_TERR_HTML_DELETE;
			}
		}

// ################################################################################
// Enable or Disable manual dial queue calls
	function ManualQueueChoiceChange(task_amqc)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManualQueueChoiceChange---" + task_amqc + "|";
		AllowManualQueueCalls = task_amqc;
		var TerritorySelectChoices = document.vicidial_form.TerritorySelectList.value;

		if (AllowManualQueueCalls == '0')
            {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('1');return false;\"><?php echo _QXZ("Manual Queue is Off"); ?></a><br>";}
		else
            {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('0');return false;\"><?php echo _QXZ("Manual Queue is On"); ?></a><br>";}
		}

// ################################################################################
// Update vicidial_live_agents record with territory choices
	function TerritorySelect_submit(TERsubmit)
		{
		if (TERsubmit=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelect_submit---|";}
		var TerritorySelectChoices = document.vicidial_form.TerritorySelectList.value;

		if (agent_select_territories == "MGRLOCK")
			{TerritorySelectChoices = "MGRLOCK";}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			TERRupdate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=regTERRITORY&format=text&user=" + user + "&pass=" + pass + "&comments=" + agent_select_territories + "&campaign=" + campaign + "&agent_territories=" + TerritorySelectChoices + "-";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(TERRupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}

		hideDiv('TerritorySelectBox');
		MainPanelToFront();
		TerritorySelecting = 0;
		scroll(0,0);
		}


// ################################################################################
// clear api field
	function Clear_API_Field(temp_field)
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			TERRupdate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=Clear_API_Field&format=text&user=" + user + "&pass=" + pass + "&comments=" + temp_field;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(TERRupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Log the user out of the system when they close their browser while logged in
	function BrowserCloseLogout()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----BrowserCloseLogout---|";
		if (logout_stop_timeouts < 1)
			{
			if (VDRP_stage != 'PAUSED')
				{
				AutoDial_ReSume_PauSe("VDADpause",'','','',"LOGOUT");
				}
			LogouT('CLOSE','');
		// removing alert because onbeforeunload function invalidates it
		//	alert("<?php echo _QXZ("PLEASE CLICK THE LOGOUT LINK TO LOG OUT NEXT TIME."); ?>\n");
			}
		}


// ################################################################################
// Normal logout with check for pause stage first
	function NormalLogout()
		{
                    
		button_click_log = button_click_log + "" + SQLdate + "-----NormalLogout---|";
		if (logout_stop_timeouts < 1)
			{
//                            alert(logout_stop_timeouts);
			var pausetrigger='';
			if (VDRP_stage != 'PAUSED')
				{
				pausetrigger='PAUSE';
			//	AutoDial_ReSume_PauSe("VDADpause",'','','',"LOGOUT");
				}
                                <!--alert(pausetrigger);-->
			LogouT('NORMAL',pausetrigger);
			}else{
                            $('#modal-logout').modal('show');
                        }
                        
		}


// ################################################################################
// Log the user out of the system, if active call or active dial is occuring, don't let them.
	function LogouT(tempreason,temppause)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LogouT---" + tempreason + " " + temppause + "|";
		if (MD_channel_look==1)
			{alert("<?php echo _QXZ("You cannot log out during a Dial attempt. Wait 50 seconds for the dial to fail out if it is not answered"); ?>");}
		else
			{
			if (VD_live_customer_call==1)
				{
				alert("<?php echo _QXZ("STILL A LIVE CALL! Hang it up then you can log out."); ?>\n" + VD_live_customer_call);
				}
			else
				{
                                    
				if (alt_dial_status_display==1)
					{
					alert("<?php echo _QXZ("You are in ALT dial mode, you must finish the lead before logging out."); ?>\n" + reselect_alt_dial);
					}
				else
					{
                                            
//					document.getElementById("LogouTProcess").innerHTML = "<br><br><font class=\"loading_text\"><?php echo _QXZ("LOGOUT PROCESSING..."); ?></font><br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"./images/<?php echo _QXZ("check.png"); ?>\" height=\"150px\" width=\"150px\" alt=\"<?php echo _QXZ("LOGOUT PROCESSING..."); ?>\" />";
					//	document.getElementById("LogouTProcess").innerHTML = "<?php echo _QXZ("LOGOUT PROCESSING..."); ?>";
//                                        alert('HIOK');
					var xmlhttp=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttp = false;
					  }
					 }
					@end @*/
					if (!xmlhttp && typeof XMLHttpRequest!='undefined')
						{
						xmlhttp = new XMLHttpRequest();
						}
					if (xmlhttp) 
						{
						VDlogout_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=userLOGout&format=text&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&agent_log_id=" + agent_log_id + "&no_delete_sessions=" + no_delete_sessions + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&LogouTKicKAlL=" + LogouTKicKAlL + "&ext_context=" + ext_context + "&qm_extension=" + qm_extension + "&stage=" + tempreason + "&pause_trigger=" + temppause + "&dial_method=" + dial_method;
						xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
						xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttp.send(VDlogout_query); 
						xmlhttp.onreadystatechange = function()
							{ 
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
								{
							//	alert(VDlogout_query);
							//	alert(xmlhttp.responseText);
								needToConfirmExit = false;
                                                                $('#modal-logout').modal('show');
								document.getElementById("LogouTProcess").innerHTML = "<br><br><font class=\"loading_text\"><?php echo _QXZ("LOGOUT PROCESS COMPLETE, YOU MAY NOW CLOSE YOUR BROWSER OR LOG BACK IN"); ?></font><br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"./images/<?php echo _QXZ("check.png"); ?>\" height=\"150px\" width=\"150px\" alt=\"<?php echo _QXZ("LOGOUT PROCESS COMPLETE, YOU MAY NOW CLOSE YOUR BROWSER OR LOG BACK IN"); ?>\" />";
								}
							}
						delete xmlhttp;
						}
                                                
					hideDiv('MainPanel');      
//					showDiv('LogouTBox');
					$('#modal-logout').modal('show');
					refresh_interval = 7300000;
					var logout_content='';
					if (tempreason=='SHIFT')
                        {logout_content="<?php echo _QXZ("Your Shift is over or has changed, you have been logged out of your session"); ?><br><br>";}
					if (tempreason=='API')
                        {logout_content="<?php echo _QXZ("The system has received a command to log you out, you have been logged out of your session"); ?><br><br>";}
					if (tempreason=='TIMEOUT')
                        {logout_content="<?php echo _QXZ("You have been paused for too long, you have been logged out of your session"); ?><br><br>";}

//					document.getElementById("LogouTBoxLinkModal").innerHTML = logout_content + "<a class=\"btn btn-default\" href=\"" + agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + orig_pass + "\" onclick=\"needToConfirmExit = false;\"><?php echo _QXZ("CLICK HERE TO LOG IN AGAIN"); ?></a></font>\n";
//					var logoutURL = "<a class=\"btn btn-default\" href=\"" + agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + orig_pass + "\" onclick=\"needToConfirmExit = false;\"><?php echo _QXZ("CLICK HERE TO LOG IN AGAIN"); ?></a></font>\n";
					var logoutURL =  agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + orig_pass;
//                                        alert(logoutURL);
    $('#LogouTBoxLinkModalNEW').attr('href',logoutURL);
					logout_stop_timeouts = 1;

					//	window.location= agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + pass;
					}
				}
			}
		}
<?php
if ($useIE > 0)
{
?>
// ################################################################################
// MSIE-only hotkeypress function to bind hotkeys defined in the campaign to dispositions
	function hotkeypress(evt)
		{
		enter_disable();
		if ( (hot_keys_active==1) && ( (VD_live_customer_call==1) || (MD_ring_secondS > 4) ) )
			{
			var e = evt? evt : window.event;
			if(!e) return;
			var key = 0;
			if (e.keyCode) { key = e.keyCode; } // for moz/fb, if keyCode==0 use 'which'
			else if (typeof(e.which)!= 'undefined') { key = e.which; }

			var HKdispo = hotkeys[String.fromCharCode(key)];
		//	alert("|" + key + "|" + HKdispo + "|");
			if (HKdispo) 
				{
			//	document.vicidial_form.inert_button.focus();
			//	document.vicidial_form.inert_button.blur();
				button_click_log = button_click_log + "" + SQLdate + "-----hotkeypress---" + HKdispo + "|";
				CustomerData_update();
				var HKdispo_ary = HKdispo.split(" ----- ");
				if ( (HKdispo_ary[0] == 'ALTPH2') || (HKdispo_ary[0] == 'ADDR3') )
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
						}
					}
				else
					{
					var HKXdebug='';
					var HKerror=0;
					var temp_VARstatuses_ct=0;
					while (VD_statuses_ct > temp_VARstatuses_ct)
						{
						if (HKdispo_ary[0] == VARstatuses[temp_VARstatuses_ct])
							{
							if ( ( (CheckDEADcallON > 0) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (customer_sec < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (customer_sec > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) || ( (CheckDEADcallON < 1) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) )
								{
								HKerror=1;
								alert_box("<?php echo _QXZ("That status is not available at this time: "); ?>" + HKdispo_ary[0] + ' ' + VD_live_call_secondS + '(' + customer_sec + ')');
								}
						//	HKXdebug = HKXdebug + 'ERROR: ' + HKdispo_ary[0] + ' ' + VARstatuses[temp_VARstatuses_ct] + ' ' + VARMINstatuses[temp_VARstatuses_ct] + '| ' + VARMAXstatuses[temp_VARstatuses_ct] + '| ' + CheckDEADcallON + '| ' + VD_live_call_secondS + '| ';

						//	document.getElementById("debugbottomspan").innerHTML = HKXdebug;
							}
						temp_VARstatuses_ct++;
						}
					if (HKerror < 1)
						{
						// transfer call to answering maching message with hotkey
						if ( (HKdispo_ary[0] == 'LTMG') || (HKdispo_ary[0] == 'XFTAMM') )
							{
							mainxfer_send_redirect('XfeRVMAIL', lastcustchannel, lastcustserverip);
							}
						else
							{
							HKdispo_display = 3;
							// Check for hotkeys enabled wrapup message
							if ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) )
								{
								HKdispo_display = wrapup_seconds;
								if (HKdispo_display < 3)
									{HKdispo_display = 3;}

								document.getElementById("HotKeyActionBox").style.top = '1px';
								document.getElementById("HotKeyActionBox").style.left = '1px';
								document.getElementById("HKWrapupTimer").innerHTML = "<br><?php echo _QXZ("Call Wrapup:"); ?> " + HKdispo_display + " <?php echo _QXZ("seconds remaining in wrapup"); ?>";
								if (wrapup_message.match(regWFS))
									{
								//	document.getElementById("FSCREENWrapupMessage").innerHTML = document.getElementById("WrapupMessage").innerHTML;
									}
								else
									{
									document.getElementById("HKWrapupMessage").innerHTML = "<br><br><center><table width=" + CAwidth + "><tr><td height=" + WRheight + " align=center>" + document.getElementById("WrapupMessage").innerHTML + "<br> &nbsp; </td></tr></table></center>";
									}

								if (wrapup_bypass == 'ENABLED')
									{
									document.getElementById("HKWrapupBypass").innerHTML = " &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"HKWrapupFinish();return false;\"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a>";
									}
								else
									{document.getElementById("HKWrapupBypass").innerHTML = '';}
								}
							else
								{
								document.getElementById("HotKeyActionBox").style.top = HTheight;
								document.getElementById("HotKeyActionBox").style.left = '5px';
								document.getElementById("HKWrapupTimer").innerHTML = '';
								document.getElementById("HKWrapupMessage").innerHTML = '';
								document.getElementById("HKWrapupBypass").innerHTML = '';
								}
							HKdispo_submit = HKdispo_display;
							HKfinish=1;
							alt_phone_dialing=starting_alt_phone_dialing;
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							document.getElementById("HotKeyDispo").innerHTML = HKdispo_ary[0] + " - " + HKdispo_ary[1];
							if ( ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) ) && (wrapup_message.match(regWFS)) )
								{showDiv('FSCREENWrapupBox');  HKFSCREENup=1;}
							else
								{showDiv('HotKeyActionBox');}
							hideDiv('HotKeyEntriesBox');
							document.vicidial_form.DispoSelection.value = HKdispo_ary[0];
							dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
							if (custom_fields_enabled > 0)
								{
								vcFormIFrame.document.form_custom_fields.submit();
								}
							}
						}
					}
				}
			}
		}

<?php
}
else
{
?>
// ################################################################################
// W3C-compliant hotkeypress function to bind hotkeys defined in the campaign to dispositions
	function hotkeypress(evt)
		{
		enter_disable();
		if ( (hot_keys_active==1) && ( (VD_live_customer_call==1) || (MD_ring_secondS > 4) ) )
			{
			var e = evt? evt : window.event;
			if(!e) return;
			var key = 0;
			if (e.keyCode) { key = e.keyCode; } // for moz/fb, if keyCode==0 use 'which'
			else if (typeof(e.which)!= 'undefined') { key = e.which; }
			//
			var HKdispo = hotkeys[String.fromCharCode(key)];
			if (HKdispo) 
				{
				if (focus_blur_enabled==1)
					{
					document.inert_form.inert_button.focus();
					document.inert_form.inert_button.blur();
					}
				button_click_log = button_click_log + "" + SQLdate + "-----hotkeypress---" + HKdispo + "|";
				CustomerData_update();
				var HKdispo_ary = HKdispo.split(" ----- ");
				if ( (HKdispo_ary[0] == 'ALTPH2') || (HKdispo_ary[0] == 'ADDR3') )
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
						}
					}
				else
					{
					var HKXdebug='';
					var HKerror=0;
					var temp_VARstatuses_ct=0;
					while (VD_statuses_ct > temp_VARstatuses_ct)
						{
						if (HKdispo_ary[0] == VARstatuses[temp_VARstatuses_ct])
							{
							if ( ( (CheckDEADcallON > 0) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (customer_sec < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (customer_sec > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) || ( (CheckDEADcallON < 1) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) )
								{
								HKerror=1;

								alert_box("<?php echo _QXZ("That status is not available at this time: "); ?>" + HKdispo_ary[0] + ' ' + VD_live_call_secondS + '(' + customer_sec + ')');
								}
						//	HKXdebug = HKXdebug + 'ERROR: ' + HKdispo_ary[0] + ' ' + VARstatuses[temp_VARstatuses_ct] + ' ' + VARMINstatuses[temp_VARstatuses_ct] + '| ' + VARMAXstatuses[temp_VARstatuses_ct] + '| ' + CheckDEADcallON + '| ' + VD_live_call_secondS + '| ';

						//	document.getElementById("debugbottomspan").innerHTML = HKXdebug;
							}
						temp_VARstatuses_ct++;
						}
					if (HKerror < 1)
						{
						// transfer call to answering maching message with hotkey
						if ( (HKdispo_ary[0] == 'LTMG') || (HKdispo_ary[0] == 'XFTAMM') )
							{
							mainxfer_send_redirect('XfeRVMAIL', lastcustchannel, lastcustserverip);
							}
						else
							{
							HKdispo_display = 3;
							// Check for hotkeys enabled wrapup message
							if ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) )
								{
								HKdispo_display = wrapup_seconds;
								if (HKdispo_display < 3)
									{HKdispo_display = 3;}

								document.getElementById("HotKeyActionBox").style.top = '1px';
								document.getElementById("HotKeyActionBox").style.left = '1px';
								document.getElementById("HKWrapupTimer").innerHTML = "<br><?php echo _QXZ("Call Wrapup:"); ?> " + HKdispo_display + " <?php echo _QXZ("seconds remaining in wrapup"); ?>";
								if (wrapup_message.match(regWFS))
									{
								//	document.getElementById("FSCREENWrapupMessage").innerHTML = document.getElementById("WrapupMessage").innerHTML;
									}
								else
									{
									document.getElementById("HKWrapupMessage").innerHTML = "<br><br><center><table width=" + CAwidth + "><tr><td height=" + WRheight + " align=center>" + document.getElementById("WrapupMessage").innerHTML + "<br> &nbsp; </td></tr></table></center>";
									}

								if (wrapup_bypass == 'ENABLED')
									{
									document.getElementById("HKWrapupBypass").innerHTML = " &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"HKWrapupFinish();return false;\"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a>";
									}
								else
									{document.getElementById("HKWrapupBypass").innerHTML = '';}
								}
							else
								{
								document.getElementById("HotKeyActionBox").style.top = HTheight;
								document.getElementById("HotKeyActionBox").style.left = '5px';
								document.getElementById("HKWrapupTimer").innerHTML = '';
								document.getElementById("HKWrapupMessage").innerHTML = '';
								document.getElementById("HKWrapupBypass").innerHTML = '';
								}
							HKdispo_submit = HKdispo_display;
							HKfinish=1;
							document.getElementById("HotKeyDispo").innerHTML = HKdispo_ary[0] + " - " + HKdispo_ary[1];
							if ( ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) ) && (wrapup_message.match(regWFS)) )
								{showDiv('FSCREENWrapupBox');  HKFSCREENup=1;}
							else
								{showDiv('HotKeyActionBox');}
							hideDiv('HotKeyEntriesBox');
							document.vicidial_form.DispoSelection.value = HKdispo_ary[0];
							alt_phone_dialing=starting_alt_phone_dialing;
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
							if (custom_fields_enabled > 0)
								{
								vcFormIFrame.document.form_custom_fields.submit();
								}
							}
						}
				//	DispoSelect_submit();
				//	AutoDialWaiting = 1;
				//	AutoDial_ReSume_PauSe("VDADready");
				//	alert(HKdispo + " - " + HKdispo_ary[0] + " - " + HKdispo_ary[1]);
					}
				}
			}
		}

<?php
}
### end of onkeypress functions
?>
// ################################################################################
// disable enter/return keys to not clear out vars on customer info
	function enter_disable(evt)
		{
		var e = evt? evt : window.event;
		if(!e) return;
		var key = 0;
		if (e.keyCode) { key = e.keyCode; } // for moz/fb, if keyCode==0 use 'which'
		else if (typeof(e.which)!= 'undefined') { key = e.which; }
		return key != 13;
		}


// ################################################################################
// decode the scripttext and scriptname so that it can be displayed
	function URLDecode(encodedvar,scriptformat,urlschema,webformnumber)
	{
   // Replace %ZZ with equivalent character
   // Put [ERR] in output if %ZZ is invalid.
	var HEXCHAR = "0123456789ABCDEFabcdef"; 
	var encoded = encodedvar;
	var decoded = '';
	var web_form_varsX = '';
	var i = 0;
	var RGnl = new RegExp("[\\r]\\n","g");
	var RGtab = new RegExp("\t","g");
	var RGplus = new RegExp(" |\\t|\\n","g");
	var RGiframe = new RegExp("iframe","gi");
 // var regWF = new RegExp("\\`|\\~|\\:|\\;|\\#|\\'|\\\"|\\{|\\}|\\(|\\)|\\*|\\^|\\%|\\$|\\!|\\%|\\r|\\t|\\n|","ig");
	var regWF = new RegExp("\\`|\\:|\\;|\\#|\\\"|\\{|\\}|\\^|\\$|\\r|\\t|\\n|","ig");

	var xtest;
	xtest=unescape(encoded);
	encoded=utf8_decode(xtest);

	if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
		{
		var test_otcx = document.vicidial_form.other_tab_comments.value;
		if (test_otcx.length > 0)
			{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
		}
	if (urlschema == 'DEFAULT')
		{
		web_form_varsX = 
		"&lead_id=" + encodeURIComponent(document.vicidial_form.lead_id.value) + 
		"&vendor_id=" + encodeURIComponent(document.vicidial_form.vendor_lead_code.value) + 
		"&list_id=" + encodeURIComponent(document.vicidial_form.list_id.value) + 
		"&gmt_offset_now=" + encodeURIComponent(document.vicidial_form.gmt_offset_now.value) + 
		"&phone_code=" + encodeURIComponent(document.vicidial_form.phone_code.value) + 
		"&phone_number=" + encodeURIComponent(document.vicidial_form.phone_number.value) + 
		"&title=" + encodeURIComponent(document.vicidial_form.title.value) + 
		"&first_name=" + encodeURIComponent(document.vicidial_form.first_name.value) + 
		"&middle_initial=" + encodeURIComponent(document.vicidial_form.middle_initial.value) + 
		"&last_name=" + encodeURIComponent(document.vicidial_form.last_name.value) + 
		"&address1=" + encodeURIComponent(document.vicidial_form.address1.value) + 
		"&address2=" + encodeURIComponent(document.vicidial_form.address2.value) + 
		"&address3=" + encodeURIComponent(document.vicidial_form.address3.value) + 
		"&city=" + encodeURIComponent(document.vicidial_form.city.value) + 
		"&state=" + encodeURIComponent(document.vicidial_form.state.value) + 
		"&province=" + encodeURIComponent(document.vicidial_form.province.value) + 
		"&postal_code=" + encodeURIComponent(document.vicidial_form.postal_code.value) + 
		"&country_code=" + encodeURIComponent(document.vicidial_form.country_code.value) + 
		"&gender=" + encodeURIComponent(document.vicidial_form.gender.value) + 
		"&date_of_birth=" + encodeURIComponent(document.vicidial_form.date_of_birth.value) + 
		"&alt_phone=" + encodeURIComponent(document.vicidial_form.alt_phone.value) + 
		"&email=" + encodeURIComponent(document.vicidial_form.email.value) + 
		"&security_phrase=" + encodeURIComponent(document.vicidial_form.security_phrase.value) + 
		"&comments=" + encodeURIComponent(document.vicidial_form.comments.value) + 
		"&user=" + user + 
		"&pass=" + pass + 
		"&orig_pass=" + orig_pass +
		"&campaign=" + campaign + 
		"&phone_login=" + phone_login + 
		"&original_phone_login=" + original_phone_login +
		"&phone_pass=" + phone_pass + 
		"&fronter=" + fronter + 
		"&closer=" + user + 
		"&group=" + group + 
		"&channel_group=" + group + 
		"&SQLdate=" + SQLdate + 
		"&epoch=" + UnixTime + 
		"&uniqueid=" + document.vicidial_form.uniqueid.value + 
		"&customer_zap_channel=" + lastcustchannel + 
		"&customer_server_ip=" + lastcustserverip +
		"&server_ip=" + server_ip + 
		"&SIPexten=" + extension + 
		"&session_id=" + session_id + 
		"&phone=" + document.vicidial_form.phone_number.value + 
		"&parked_by=" + document.vicidial_form.lead_id.value +
		"&dispo=" + LeaDDispO + '' +
		"&dialed_number=" + dialed_number + '' +
		"&dialed_label=" + dialed_label + '' +
		"&source_id=" + source_id + '' +
		"&rank=" + document.vicidial_form.rank.value + '' +
		"&owner=" + document.vicidial_form.owner.value + '' +
		"&camp_script=" + campaign_script + '' +
		"&in_script=" + CalL_ScripT_id + '' +
		"&script_width=" + script_width + '' +
		"&script_height=" + script_height + '' +
		"&fullname=" + LOGfullname + '' +
		"&agent_email=" + LOGemail + '' +
		"&recording_filename=" + recording_filename + '' +
		"&recording_id=" + recording_id + '' +
		"&user_custom_one=" + VU_custom_one + '' +
		"&user_custom_two=" + VU_custom_two + '' +
		"&user_custom_three=" + VU_custom_three + '' +
		"&user_custom_four=" + VU_custom_four + '' +
		"&user_custom_five=" + VU_custom_five + '' +
		"&preset_number_a=" + CalL_XC_a_NuMber + '' +
		"&preset_number_b=" + CalL_XC_b_NuMber + '' +
		"&preset_number_c=" + CalL_XC_c_NuMber + '' +
		"&preset_number_d=" + CalL_XC_d_NuMber + '' +
		"&preset_number_e=" + CalL_XC_e_NuMber + '' +
		"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +
		"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' +
		"&did_id=" + did_id + '' +
		"&did_extension=" + did_extension + '' +
		"&did_pattern=" + did_pattern + '' +
		"&did_description=" + did_description + '' +
		"&closecallid=" + closecallid + '' +
		"&xfercallid=" + xfercallid + '' +
		"&agent_log_id=" + agent_log_id + '' +
		"&entry_list_id=" + document.vicidial_form.entry_list_id.value + '' +
		"&call_id=" + LasTCID + '' +
		"&user_group=" + VU_user_group + '' +
		"&list_name=" + encodeURIComponent(document.vicidial_form.list_name.value) + 
		"&list_description=" + encodeURIComponent(document.vicidial_form.list_description.value) + 
		"&entry_date=" + entry_date + '' +
		"&did_custom_one=" + did_custom_one + '' +
		"&did_custom_two=" + did_custom_two + '' +
		"&did_custom_three=" + did_custom_three + '' +
		"&did_custom_four=" + did_custom_four + '' +
		"&did_custom_five=" + did_custom_five + '' +
		"&web_vars=" + LIVE_web_vars + '' +
		webform_session;

		if (custom_field_names.length > 2)
			{
			var url_custom_field='';
			var CFN_array=custom_field_names.split('|');
			var CFN_count=CFN_array.length;
			var CFN_tick=0;
			while (CFN_tick < CFN_count)
				{
				var CFN_field = CFN_array[CFN_tick];
				if (CFN_field.length > 0)
					{
					var url_custom_field = url_custom_field + "&" + CFN_field + "=--A--" + CFN_field + "--B--";
					}
				CFN_tick++;
				}
			if (url_custom_field.length > 10)
				{
				url_custom_field = '&CF_uses_custom_fields=Y' + url_custom_field;
				}
			web_form_varsX = web_form_varsX + '' + url_custom_field;
			scriptformat='YES';
			}

		web_form_varsX = web_form_varsX.replace(RGplus, '+');
		web_form_varsX = web_form_varsX.replace(RGnl, '+');
		web_form_varsX = web_form_varsX.replace(regWF, '');

		var regWFAvars = new RegExp("\\?","ig");
		if (encoded.match(regWFAvars))
			{web_form_varsX = '&' + web_form_varsX}
		else
			{web_form_varsX = '?' + web_form_varsX}

		var TEMPX_VDIC_web_form_address = encoded + "" + web_form_varsX;

		var regWFAqavars = new RegExp("\\?&","ig");
		var regWFAaavars = new RegExp("&&","ig");
		TEMPX_VDIC_web_form_address = TEMPX_VDIC_web_form_address.replace(regWFAqavars, '?');
		TEMPX_VDIC_web_form_address = TEMPX_VDIC_web_form_address.replace(regWFAaavars, '&');
		encoded = TEMPX_VDIC_web_form_address;
		}
	if (scriptformat == 'YES')
		{
		// custom fields populate if lead information is sent with custom field names
		if (custom_field_names.length > 2)
			{
			var CFN_array=custom_field_names.split('|');
			var CFV_array=custom_field_values.split('----------');
			var CFT_array=custom_field_types.split('|');
			var CFN_count=CFN_array.length;
			var CFN_tick=0;
			var CFN_debug='';
			var CF_loaded = document.vicidial_form.FORM_LOADED.value;
		//	alert(custom_field_names + "\n" + custom_field_values + "\n" + CFN_count + "\n" + CF_loaded);
			while (CFN_tick < CFN_count)
				{
				var CFN_field = CFN_array[CFN_tick];
				var RG_CFN_field = new RegExp("--A--" + CFN_field + "--B--","g");
				if ( (CFN_field.length > 0) && (encoded.match(RG_CFN_field)) )
					{
					if (CF_loaded=='1')
						{
						var CFN_value='';
						var field_parsed=0;
						if ( (CFT_array[CFN_tick]=='TIME') && (field_parsed < 1) )
							{
							var CFN_field_hour = 'HOUR_' + CFN_field;
							var cIndex_hour = vcFormIFrame.document.form_custom_fields[CFN_field_hour].selectedIndex;
							var CFN_value_hour =  vcFormIFrame.document.form_custom_fields[CFN_field_hour].options[cIndex_hour].value;
							var CFN_field_minute = 'MINUTE_' + CFN_field;
							var cIndex_minute = vcFormIFrame.document.form_custom_fields[CFN_field_minute].selectedIndex;
							var CFN_value_minute =  vcFormIFrame.document.form_custom_fields[CFN_field_minute].options[cIndex_minute].value;
							var CFN_value = CFN_value_hour + ':' + CFN_value_minute + ':00'
							field_parsed=1;
							}
						if ( (CFT_array[CFN_tick]=='SELECT') && (field_parsed < 1) )
							{
							var cIndex = vcFormIFrame.document.form_custom_fields[CFN_field].selectedIndex;
							var CFN_value =  vcFormIFrame.document.form_custom_fields[CFN_field].options[cIndex].value;
							field_parsed=1;
							}
						if ( (CFT_array[CFN_tick]=='MULTI') && (field_parsed < 1) )
							{
							var chosen = '';
							var CFN_field = CFN_field + '[]';
							for (i=0; i<vcFormIFrame.document.form_custom_fields[CFN_field].options.length; i++) 
								{
								if (vcFormIFrame.document.form_custom_fields[CFN_field].options[i].selected) 
									{
									chosen = chosen + '' + vcFormIFrame.document.form_custom_fields[CFN_field].options[i].value + ',';
									}
								}
							var CFN_value = chosen;
							if (CFN_value.length > 0) {CFN_value = CFN_value.slice(0,-1);}
							field_parsed=1;
							}
						if ( ( (CFT_array[CFN_tick]=='RADIO') || (CFT_array[CFN_tick]=='CHECKBOX') ) && (field_parsed < 1) )
							{
							var chosen = '';
							var CFN_field = CFN_field + '[]';
							var len = vcFormIFrame.document.form_custom_fields[CFN_field].length;
							for (i = 0; i <len; i++) 
								{
								if (vcFormIFrame.document.form_custom_fields[CFN_field][i].checked) 
									{
									chosen = chosen + '' + vcFormIFrame.document.form_custom_fields[CFN_field][i].value + ',';
									}
								}
							var CFN_value = chosen;
							if (CFN_value.length > 0) {CFN_value = CFN_value.slice(0,-1);}
							field_parsed=1;
							}
						if (field_parsed < 1)
							{
							var CFN_value = vcFormIFrame.document.form_custom_fields[CFN_field].value;
							field_parsed=1;
							}
						}
					else
						{
						var CFN_value = CFV_array[CFN_tick];
						}
					CFN_value = encodeURIComponent(CFN_value);
					CFN_value = CFN_value.replace(RGnl,'+');
					CFN_value = CFN_value.replace(RGtab,'+');
					CFN_value = CFN_value.replace(RGplus,'+');
					encoded = encoded.replace(RG_CFN_field, CFN_value);
					web_form_varsX = web_form_varsX.replace(RG_CFN_field, CFN_value);
					CFN_debug = CFN_debug + '|' + CFN_field + '-' + CFN_value;
					}
				CFN_tick++;
				}
//			document.getElementById("debugbottomspan").innerHTML = CFN_debug;
			}

		if (webformnumber == '1')
			{web_form_vars = web_form_varsX;}
		if (webformnumber == '2')
			{web_form_vars_two = web_form_varsX;}
		if (webformnumber == '3')
			{web_form_vars_three = web_form_varsX;}

		var SCvendor_lead_code = encodeURIComponent(document.vicidial_form.vendor_lead_code.value);
		var SCsource_id = source_id;
		var SClist_id = encodeURIComponent(document.vicidial_form.list_id.value);
		var SClist_name = encodeURIComponent(document.vicidial_form.list_name.value);
		var SClist_description = encodeURIComponent(document.vicidial_form.list_description.value);
		var SCgmt_offset_now = encodeURIComponent(document.vicidial_form.gmt_offset_now.value);
		var SCcalled_since_last_reset = "";
		var SCphone_code = encodeURIComponent(document.vicidial_form.phone_code.value);
		var SCphone_number = encodeURIComponent(document.vicidial_form.phone_number.value);
		var SCtitle = encodeURIComponent(document.vicidial_form.title.value);
		var SCfirst_name = encodeURIComponent(document.vicidial_form.first_name.value);
		var SCmiddle_initial = encodeURIComponent(document.vicidial_form.middle_initial.value);
		var SClast_name = encodeURIComponent(document.vicidial_form.last_name.value);
		var SCaddress1 = encodeURIComponent(document.vicidial_form.address1.value);
		var SCaddress2 = encodeURIComponent(document.vicidial_form.address2.value);
		var SCaddress3 = encodeURIComponent(document.vicidial_form.address3.value);
		var SCcity = encodeURIComponent(document.vicidial_form.city.value);
		var SCstate = encodeURIComponent(document.vicidial_form.state.value);
		var SCprovince = encodeURIComponent(document.vicidial_form.province.value);
		var SCpostal_code = encodeURIComponent(document.vicidial_form.postal_code.value);
		var SCcountry_code = encodeURIComponent(document.vicidial_form.country_code.value);
		var SCgender = encodeURIComponent(document.vicidial_form.gender.value);
		var SCdate_of_birth = encodeURIComponent(document.vicidial_form.date_of_birth.value);
		var SCalt_phone = encodeURIComponent(document.vicidial_form.alt_phone.value);
		var SCemail = encodeURIComponent(document.vicidial_form.email.value);
		var SCsecurity_phrase = encodeURIComponent(document.vicidial_form.security_phrase.value);
		var SCcomments = encodeURIComponent(document.vicidial_form.comments.value);
		var SCfullname = LOGfullname;
		var SCagent_email = LOGemail;
		var SCfronter = fronter;
		var SCuser = user;
		var SCpass = pass;
		var SClead_id = document.vicidial_form.lead_id.value;
		var SCcampaign = campaign;
		var SCphone_login = phone_login;
		var SCoriginal_phone_login = original_phone_login;
		var SCgroup = group;
		var SCchannel_group = group;
		var SCSQLdate = SQLdate;
		var SCepoch = UnixTime;
		var SCuniqueid = document.vicidial_form.uniqueid.value;
		var SCcustomer_zap_channel = lastcustchannel;
		var SCserver_ip = server_ip;
		var SCSIPexten = extension;
		var SCsession_id = session_id;
		var SCdispo = LeaDDispO;
		var SCdialed_number = dialed_number;
		var SCdialed_label = dialed_label;
		var SCrank = document.vicidial_form.rank.value;
		var SCowner = document.vicidial_form.owner.value;
		var SCcamp_script = campaign_script;
		var SCin_script = CalL_ScripT_id;
		var SCscript_width = script_width;
		var SCscript_height = script_height;
		var SCrecording_filename = recording_filename;
		var SCrecording_id = recording_id;
		var SCuser_custom_one = VU_custom_one;
		var SCuser_custom_two = VU_custom_two;
		var SCuser_custom_three = VU_custom_three;
		var SCuser_custom_four = VU_custom_four;
		var SCuser_custom_five = VU_custom_five;
		var SCpreset_number_a = CalL_XC_a_NuMber;
		var SCpreset_number_b = CalL_XC_b_NuMber;
		var SCpreset_number_c = CalL_XC_c_NuMber;
		var SCpreset_number_d = CalL_XC_d_NuMber;
		var SCpreset_number_e = CalL_XC_e_NuMber;
		var SCpreset_dtmf_a = CalL_XC_a_Dtmf;
		var SCpreset_dtmf_b = CalL_XC_b_Dtmf;
		var SCdid_id = did_id;
		var SCdid_extension = did_extension;
		var SCdid_pattern = did_pattern;
		var SCdid_description = did_description;
		var SCclosecallid = closecallid;
		var SCxfercallid = xfercallid;
		var SCcall_id = LasTCID;
		var SCuser_group = VU_user_group;
		var SCagent_log_id = agent_log_id;
		var SCentry_date = entry_date;
		var SCdid_custom_one = did_custom_one;
		var SCdid_custom_two = did_custom_two;
		var SCdid_custom_three = did_custom_three;
		var SCdid_custom_four = did_custom_four;
		var SCdid_custom_five = did_custom_five;
		var SCweb_vars = LIVE_web_vars;

		if (encoded.match(RGiframe))
			{
			SCvendor_lead_code = SCvendor_lead_code.replace(RGplus,'+');
			SCsource_id = SCsource_id.replace(RGplus,'+');
			SClist_id = SClist_id.replace(RGplus,'+');
			SClist_name = SClist_name.replace(RGplus,'+');
			SClist_description = SClist_description.replace(RGplus,'+');
			SCgmt_offset_now = SCgmt_offset_now.replace(RGplus,'+');
			SCcalled_since_last_reset = SCcalled_since_last_reset.replace(RGplus,'+');
			SCphone_code = SCphone_code.replace(RGplus,'+');
			SCphone_number = SCphone_number.replace(RGplus,'+');
			SCtitle = SCtitle.replace(RGplus,'+');
			SCfirst_name = SCfirst_name.replace(RGplus,'+');
			SCmiddle_initial = SCmiddle_initial.replace(RGplus,'+');
			SClast_name = SClast_name.replace(RGplus,'+');
			SCaddress1 = SCaddress1.replace(RGplus,'+');
			SCaddress2 = SCaddress2.replace(RGplus,'+');
			SCaddress3 = SCaddress3.replace(RGplus,'+');
			SCcity = SCcity.replace(RGplus,'+');
			SCstate = SCstate.replace(RGplus,'+');
			SCprovince = SCprovince.replace(RGplus,'+');
			SCpostal_code = SCpostal_code.replace(RGplus,'+');
			SCcountry_code = SCcountry_code.replace(RGplus,'+');
			SCgender = SCgender.replace(RGplus,'+');
			SCdate_of_birth = SCdate_of_birth.replace(RGplus,'+');
			SCalt_phone = SCalt_phone.replace(RGplus,'+');
			SCemail = SCemail.replace(RGplus,'+');
			SCsecurity_phrase = SCsecurity_phrase.replace(RGplus,'+');
			SCcomments = SCcomments.replace(RGplus,'+');
			SCfullname = SCfullname.replace(RGplus,'+');
			SCagent_email = SCagent_email.replace(RGplus,'+');
			SCfronter = SCfronter.replace(RGplus,'+');
			SCuser = SCuser.replace(RGplus,'+');
			SCpass = SCpass.replace(RGplus,'+');
			SClead_id = SClead_id.replace(RGplus,'+');
			SCcampaign = SCcampaign.replace(RGplus,'+');
			SCphone_login = SCphone_login.replace(RGplus,'+');
			SCoriginal_phone_login = SCoriginal_phone_login.replace(RGplus,'+');
			SCgroup = SCgroup.replace(RGplus,'+');
			SCchannel_group = SCchannel_group.replace(RGplus,'+');
			SCSQLdate = SCSQLdate.replace(RGplus,'+');
			SCuniqueid = SCuniqueid.replace(RGplus,'+');
			SCcustomer_zap_channel = SCcustomer_zap_channel.replace(RGplus,'+');
			SCserver_ip = SCserver_ip.replace(RGplus,'+');
			SCSIPexten = SCSIPexten.replace(RGplus,'+');
			SCdispo = SCdispo.replace(RGplus,'+');
			SCdialed_number = SCdialed_number.replace(RGplus,'+');
			SCdialed_label = SCdialed_label.replace(RGplus,'+');
			SCrank = SCrank.replace(RGplus,'+');
			SCowner = SCowner.replace(RGplus,'+');
			SCcamp_script = SCcamp_script.replace(RGplus,'+');
			SCin_script = SCin_script.replace(RGplus,'+');
			SCscript_width = SCscript_width.replace(RGplus,'+');
			SCscript_height = SCscript_height.replace(RGplus,'+');
			SCrecording_filename = SCrecording_filename.replace(RGplus,'+');
			SCrecording_id = SCrecording_id.replace(RGplus,'+');
			SCuser_custom_one = SCuser_custom_one.replace(RGplus,'+');
			SCuser_custom_two = SCuser_custom_two.replace(RGplus,'+');
			SCuser_custom_three = SCuser_custom_three.replace(RGplus,'+');
			SCuser_custom_four = SCuser_custom_four.replace(RGplus,'+');
			SCuser_custom_five = SCuser_custom_five.replace(RGplus,'+');
			SCpreset_number_a = SCpreset_number_a.replace(RGplus,'+');
			SCpreset_number_b = SCpreset_number_b.replace(RGplus,'+');
			SCpreset_number_c = SCpreset_number_c.replace(RGplus,'+');
			SCpreset_number_d = SCpreset_number_d.replace(RGplus,'+');
			SCpreset_number_e = SCpreset_number_e.replace(RGplus,'+');
			SCpreset_dtmf_a = SCpreset_dtmf_a.replace(RGplus,'+');
			SCpreset_dtmf_b = SCpreset_dtmf_b.replace(RGplus,'+');
			SCdid_id = SCdid_id.replace(RGplus,'+');
			SCdid_extension = SCdid_extension.replace(RGplus,'+');
			SCdid_pattern = SCdid_pattern.replace(RGplus,'+');
			SCdid_description = SCdid_description.replace(RGplus,'+');
			SCcall_id = SCcall_id.replace(RGplus,'+');
			SCuser_group = SCuser_group.replace(RGplus,'+');
			SCentry_date = SCentry_date.replace(RGplus,'+');
			SCdid_custom_one = SCdid_custom_one.replace(RGplus,'+');
			SCdid_custom_two = SCdid_custom_two.replace(RGplus,'+');
			SCdid_custom_three = SCdid_custom_three.replace(RGplus,'+');
			SCdid_custom_four = SCdid_custom_four.replace(RGplus,'+');
			SCdid_custom_five = SCdid_custom_five.replace(RGplus,'+');
			SCweb_vars = SCweb_vars.replace(RGplus,'+');
			}

		var RGvendor_lead_code = new RegExp("--A--vendor_lead_code--B--","g");
		var RGsource_id = new RegExp("--A--source_id--B--","g");
		var RGlist_id = new RegExp("--A--list_id--B--","g");
		var RGlist_name = new RegExp("--A--list_name--B--","g");
		var RGlist_description = new RegExp("--A--list_description--B--","g");
		var RGgmt_offset_now = new RegExp("--A--gmt_offset_now--B--","g");
		var RGcalled_since_last_reset = new RegExp("--A--called_since_last_reset--B--","g");
		var RGphone_code = new RegExp("--A--phone_code--B--","g");
		var RGphone_number = new RegExp("--A--phone_number--B--","g");
		var RGtitle = new RegExp("--A--title--B--","g");
		var RGfirst_name = new RegExp("--A--first_name--B--","g");
		var RGmiddle_initial = new RegExp("--A--middle_initial--B--","g");
		var RGlast_name = new RegExp("--A--last_name--B--","g");
		var RGaddress1 = new RegExp("--A--address1--B--","g");
		var RGaddress2 = new RegExp("--A--address2--B--","g");
		var RGaddress3 = new RegExp("--A--address3--B--","g");
		var RGcity = new RegExp("--A--city--B--","g");
		var RGstate = new RegExp("--A--state--B--","g");
		var RGprovince = new RegExp("--A--province--B--","g");
		var RGpostal_code = new RegExp("--A--postal_code--B--","g");
		var RGcountry_code = new RegExp("--A--country_code--B--","g");
		var RGgender = new RegExp("--A--gender--B--","g");
		var RGdate_of_birth = new RegExp("--A--date_of_birth--B--","g");
		var RGalt_phone = new RegExp("--A--alt_phone--B--","g");
		var RGemail = new RegExp("--A--email--B--","g");
		var RGsecurity_phrase = new RegExp("--A--security_phrase--B--","g");
		var RGcomments = new RegExp("--A--comments--B--","g");
		var RGfullname = new RegExp("--A--fullname--B--","g");
		var RGagent_email = new RegExp("--A--agent_email--B--","g");
		var RGfronter = new RegExp("--A--fronter--B--","g");
		var RGuser = new RegExp("--A--user--B--","g");
		var RGpass = new RegExp("--A--pass--B--","g");
		var RGlead_id = new RegExp("--A--lead_id--B--","g");
		var RGcampaign = new RegExp("--A--campaign--B--","g");
		var RGphone_login = new RegExp("--A--phone_login--B--","g");
		var RGoriginal_phone_login = new RegExp("--A--original_phone_login--B--","g");
		var RGgroup = new RegExp("--A--group--B--","g");
		var RGchannel_group = new RegExp("--A--channel_group--B--","g");
		var RGSQLdate = new RegExp("--A--SQLdate--B--","g");
		var RGepoch = new RegExp("--A--epoch--B--","g");
		var RGuniqueid = new RegExp("--A--uniqueid--B--","g");
		var RGcustomer_zap_channel = new RegExp("--A--customer_zap_channel--B--","g");
		var RGserver_ip = new RegExp("--A--server_ip--B--","g");
		var RGSIPexten = new RegExp("--A--SIPexten--B--","g");
		var RGsession_id = new RegExp("--A--session_id--B--","g");
		var RGdispo = new RegExp("--A--dispo--B--","g");
		var RGdialed_number = new RegExp("--A--dialed_number--B--","g");
		var RGdialed_label = new RegExp("--A--dialed_label--B--","g");
		var RGrank = new RegExp("--A--rank--B--","g");
		var RGowner = new RegExp("--A--owner--B--","g");
		var RGcamp_script = new RegExp("--A--camp_script--B--","g");
		var RGin_script = new RegExp("--A--in_script--B--","g");
		var RGscript_width = new RegExp("--A--script_width--B--","g");
		var RGscript_height = new RegExp("--A--script_height--B--","g");
		var RGrecording_filename = new RegExp("--A--recording_filename--B--","g");
		var RGrecording_id = new RegExp("--A--recording_id--B--","g");
		var RGuser_custom_one = new RegExp("--A--user_custom_one--B--","g");
		var RGuser_custom_two = new RegExp("--A--user_custom_two--B--","g");
		var RGuser_custom_three = new RegExp("--A--user_custom_three--B--","g");
		var RGuser_custom_four = new RegExp("--A--user_custom_four--B--","g");
		var RGuser_custom_five = new RegExp("--A--user_custom_five--B--","g");
		var RGpreset_number_a = new RegExp("--A--preset_number_a--B--","g");
		var RGpreset_number_b = new RegExp("--A--preset_number_b--B--","g");
		var RGpreset_number_c = new RegExp("--A--preset_number_c--B--","g");
		var RGpreset_number_d = new RegExp("--A--preset_number_d--B--","g");
		var RGpreset_number_e = new RegExp("--A--preset_number_e--B--","g");
		var RGpreset_dtmf_a = new RegExp("--A--preset_dtmf_a--B--","g");
		var RGpreset_dtmf_b = new RegExp("--A--preset_dtmf_b--B--","g");
		var RGdid_id = new RegExp("--A--did_id--B--","g");
		var RGdid_extension = new RegExp("--A--did_extension--B--","g");
		var RGdid_pattern = new RegExp("--A--did_pattern--B--","g");
		var RGdid_description = new RegExp("--A--did_description--B--","g");
		var RGclosecallid = new RegExp("--A--closecallid--B--","g");
		var RGxfercallid = new RegExp("--A--xfercallid--B--","g");
		var RGagent_log_id = new RegExp("--A--agent_log_id--B--","g");
		var RGcall_id = new RegExp("--A--call_id--B--","g");
		var RGuser_group = new RegExp("--A--user_group--B--","g");
		var RGentry_date = new RegExp("--A--entry_date--B--","g");
		var RGdid_custom_one = new RegExp("--A--did_custom_one--B--","g");
		var RGdid_custom_two = new RegExp("--A--did_custom_two--B--","g");
		var RGdid_custom_three = new RegExp("--A--did_custom_three--B--","g");
		var RGdid_custom_four = new RegExp("--A--did_custom_four--B--","g");
		var RGdid_custom_five = new RegExp("--A--did_custom_five--B--","g");
		var RGweb_vars = new RegExp("--A--web_vars--B--","g");

		encoded = encoded.replace(RGvendor_lead_code, SCvendor_lead_code);
		encoded = encoded.replace(RGsource_id, SCsource_id);
		encoded = encoded.replace(RGlist_id, SClist_id);
		encoded = encoded.replace(RGlist_name, SClist_name);
		encoded = encoded.replace(RGlist_description, SClist_description);
		encoded = encoded.replace(RGgmt_offset_now, SCgmt_offset_now);
		encoded = encoded.replace(RGcalled_since_last_reset, SCcalled_since_last_reset);
		encoded = encoded.replace(RGphone_code, SCphone_code);
		encoded = encoded.replace(RGphone_number, SCphone_number);
		encoded = encoded.replace(RGtitle, SCtitle);
		encoded = encoded.replace(RGfirst_name, SCfirst_name);
		encoded = encoded.replace(RGmiddle_initial, SCmiddle_initial);
		encoded = encoded.replace(RGlast_name, SClast_name);
		encoded = encoded.replace(RGaddress1, SCaddress1);
		encoded = encoded.replace(RGaddress2, SCaddress2);
		encoded = encoded.replace(RGaddress3, SCaddress3);
		encoded = encoded.replace(RGcity, SCcity);
		encoded = encoded.replace(RGstate, SCstate);
		encoded = encoded.replace(RGprovince, SCprovince);
		encoded = encoded.replace(RGpostal_code, SCpostal_code);
		encoded = encoded.replace(RGcountry_code, SCcountry_code);
		encoded = encoded.replace(RGgender, SCgender);
		encoded = encoded.replace(RGdate_of_birth, SCdate_of_birth);
		encoded = encoded.replace(RGalt_phone, SCalt_phone);
		encoded = encoded.replace(RGemail, SCemail);
		encoded = encoded.replace(RGsecurity_phrase, SCsecurity_phrase);
		encoded = encoded.replace(RGcomments, SCcomments);
		encoded = encoded.replace(RGfullname, SCfullname);
		encoded = encoded.replace(RGagent_email, SCagent_email);
		encoded = encoded.replace(RGfronter, SCfronter);
		encoded = encoded.replace(RGuser, SCuser);
		encoded = encoded.replace(RGpass, SCpass);
		encoded = encoded.replace(RGlead_id, SClead_id);
		encoded = encoded.replace(RGcampaign, SCcampaign);
		encoded = encoded.replace(RGphone_login, SCphone_login);
		encoded = encoded.replace(RGoriginal_phone_login, SCoriginal_phone_login);
		encoded = encoded.replace(RGgroup, SCgroup);
		encoded = encoded.replace(RGchannel_group, SCchannel_group);
		encoded = encoded.replace(RGSQLdate, SCSQLdate);
		encoded = encoded.replace(RGepoch, SCepoch);
		encoded = encoded.replace(RGuniqueid, SCuniqueid);
		encoded = encoded.replace(RGcustomer_zap_channel, SCcustomer_zap_channel);
		encoded = encoded.replace(RGserver_ip, SCserver_ip);
		encoded = encoded.replace(RGSIPexten, SCSIPexten);
		encoded = encoded.replace(RGsession_id, SCsession_id);
		encoded = encoded.replace(RGdispo, SCdispo);
		encoded = encoded.replace(RGdialed_number, SCdialed_number);
		encoded = encoded.replace(RGdialed_label, SCdialed_label);
		encoded = encoded.replace(RGrank, SCrank);
		encoded = encoded.replace(RGowner, SCowner);
		encoded = encoded.replace(RGcamp_script, SCcamp_script);
		encoded = encoded.replace(RGin_script, SCin_script);
		encoded = encoded.replace(RGscript_width, SCscript_width);
		encoded = encoded.replace(RGscript_height, SCscript_height);
		encoded = encoded.replace(RGrecording_filename, SCrecording_filename);
		encoded = encoded.replace(RGrecording_id, SCrecording_id);
		encoded = encoded.replace(RGuser_custom_one, SCuser_custom_one);
		encoded = encoded.replace(RGuser_custom_two, SCuser_custom_two);
		encoded = encoded.replace(RGuser_custom_three, SCuser_custom_three);
		encoded = encoded.replace(RGuser_custom_four, SCuser_custom_four);
		encoded = encoded.replace(RGuser_custom_five, SCuser_custom_five);
		encoded = encoded.replace(RGpreset_number_a, SCpreset_number_a);
		encoded = encoded.replace(RGpreset_number_b, SCpreset_number_b);
		encoded = encoded.replace(RGpreset_number_c, SCpreset_number_c);
		encoded = encoded.replace(RGpreset_number_d, SCpreset_number_d);
		encoded = encoded.replace(RGpreset_number_e, SCpreset_number_e);
		encoded = encoded.replace(RGpreset_dtmf_a, SCpreset_dtmf_a);
		encoded = encoded.replace(RGpreset_dtmf_b, SCpreset_dtmf_b);
		encoded = encoded.replace(RGdid_id, SCdid_id);
		encoded = encoded.replace(RGdid_extension, SCdid_extension);
		encoded = encoded.replace(RGdid_pattern, SCdid_pattern);
		encoded = encoded.replace(RGdid_description, SCdid_description);
		encoded = encoded.replace(RGclosecallid, SCclosecallid);
		encoded = encoded.replace(RGxfercallid, SCxfercallid);
		encoded = encoded.replace(RGagent_log_id, SCagent_log_id);
		encoded = encoded.replace(RGcall_id, SCcall_id);
		encoded = encoded.replace(RGuser_group, SCuser_group);
		encoded = encoded.replace(RGentry_date, SCentry_date);
		encoded = encoded.replace(RGdid_custom_one,SCdid_custom_one);
		encoded = encoded.replace(RGdid_custom_two,SCdid_custom_two);
		encoded = encoded.replace(RGdid_custom_three,SCdid_custom_three);
		encoded = encoded.replace(RGdid_custom_four,SCdid_custom_four);
		encoded = encoded.replace(RGdid_custom_five,SCdid_custom_five);
		encoded = encoded.replace(RGweb_vars, SCweb_vars);
		}

	decoded=encoded; // simple no ?
	decoded = decoded.replace(RGnl, '+');
	decoded = decoded.replace(RGplus,'+');
	decoded = decoded.replace(RGtab,'+');

	//	   while (i < encoded.length) {
	//		   var ch = encoded.charAt(i);
	//		   if (ch == "%") {
	//				if (i < (encoded.length-2) 
	//						&& HEXCHAR.indexOf(encoded.charAt(i+1)) != -1 
	//						&& HEXCHAR.indexOf(encoded.charAt(i+2)) != -1 ) {
	//					decoded += unescape( encoded.substr(i,3) );
	//					i += 3;
	//				} else {
	//					alert("Bad escape combo near ..." + encoded.substr(i) );
	//					decoded += "%[ERR]";
	//					i++;
	//				}
	//			} else {
	//			   decoded += ch;
	//			   i++;
	//			}
	//		} // while
    //      decoded = decoded.replace(RGnl, "<br>");
	//
//        console.log('URL Encoded');
//        console.log(decoded);
        
        
        if($('.CustomFieldsDiv').find('.CustomFieldInput').length > 0){
            $('.CustomFieldInput').each(function(index,item){
               var ItemColumn = $(item).attr('placeholder');
               var ItemID = $(item).attr('id')
               var ItemValue = $(item).val();
               decoded += "&"+ItemColumn+"=" + encodeURIComponent(ItemValue);
            });
        }
	return decoded;
	};


// ################################################################################
// Taken form php.net Angelos
function utf8_decode(utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    };


// ################################################################################
// phone number format
function phone_number_format(formatphone) {
	// customer_local_time, status date display 9999999999
	//	vdc_header_phone_format
    //  US_DASH 000-000-0000 - USA dash separated phone number<br>
    //  US_PARN (000)000-0000 - USA dash separated number with area code in parenthesis<br>
    //  UK_DASH 00 0000-0000 - UK dash separated phone number with space after city code<br>
    //  AU_SPAC 000 000 000 - Australia space separated phone number<br>
    //  IT_DASH 0000-000-000 - Italy dash separated phone number<br>
    //  FR_SPAC 00 00 00 00 00 - France space separated phone number<br>
	var regUS_DASHphone = new RegExp("US_DASH","g");
	var regUS_PARNphone = new RegExp("US_PARN","g");
	var regUK_DASHphone = new RegExp("UK_DASH","g");
	var regAU_SPACphone = new RegExp("AU_SPAC","g");
	var regIT_DASHphone = new RegExp("IT_DASH","g");
	var regFR_SPACphone = new RegExp("FR_SPAC","g");
	var status_display_number = formatphone;
	var dispnum = formatphone;
	if (disable_alter_custphone == 'HIDE')
		{
		var status_display_number = 'XXXXXXXXXX';
		var dispnum = 'XXXXXXXXXX';
		}
	if (vdc_header_phone_format.match(regUS_DASHphone))
		{
		var status_display_number = dispnum.substring(0,3) + '-' + dispnum.substring(3,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regUS_PARNphone))
		{
		var status_display_number = '(' + dispnum.substring(0,3) + ')' + dispnum.substring(3,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regUK_DASHphone))
		{
		var status_display_number = dispnum.substring(0,2) + ' ' + dispnum.substring(2,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regAU_SPACphone))
		{
		var status_display_number = dispnum.substring(0,3) + ' ' + dispnum.substring(3,6) + ' ' + dispnum.substring(6,9);
		}
	if (vdc_header_phone_format.match(regIT_DASHphone))
		{
		var status_display_number = dispnum.substring(0,4) + '-' + dispnum.substring(4,7) + '-' + dispnum.substring(8,10);
		}
	if (vdc_header_phone_format.match(regFR_SPACphone))
		{
		var status_display_number = dispnum.substring(0,2) + ' ' + dispnum.substring(2,4) + ' ' + dispnum.substring(4,6) + ' ' + dispnum.substring(6,8) + ' ' + dispnum.substring(8,10);
		}

	return status_display_number;
	};


// ################################################################################
// RefresH the agents view sidebar or xfer frame
	function refresh_agents_view(RAlocation,RAcount)
		{
                
		if (RAcount > 0)
			{
			if (even > 0)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=AGENTSview&format=text&user=" + user + "&pass=" + pass + "&user_group=" + VU_user_group + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&stage=" + agent_status_view_time + "&campaign=" + campaign + "&comments=" + RAlocation;
					xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							var newRAlocationHTML = xmlhttp.responseText;
						//	alert(newRAlocationHTML);
                                                    
							if (RAlocation == 'AgentXferViewSelect') 
								{
                                                                    
                                                                console.log(newRAlocationHTML);
                                document.getElementById(RAlocation).innerHTML = newRAlocationHTML + "\n<br><br><a href=\"#\" onclick=\"AgentsXferSelect('0','AgentXferViewSelect');return false;\><?php echo _QXZ("Close Window"); ?></a>&nbsp;";
								}
							else
								{
                                                                console.log('BYE');
								document.getElementById(RAlocation).innerHTML = newRAlocationHTML + "\n";
								}
							}
						}
					delete xmlhttp;
					}
				}
			}
		}


// ################################################################################
// Grab the call in queue and bring it into the session
	function callinqueuegrab(CQauto_call_id)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----callinqueuegrab---" + CQauto_call_id + "|";
		if (CQauto_call_id > 0)
			{
			var move_on=1;
			if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
				{
				if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
					{
					agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1','GRABCL');
					}
				else
					{
					move_on=0;
					alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO GRAB CALLS IN QUEUE"); ?>");
					}
				}
			if (move_on == 1)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=CALLSINQUEUEgrab&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&campaign=" + campaign + "&stage=" + CQauto_call_id;
					xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							var CQgrabresponse = xmlhttp.responseText;
							var regCQerror = new RegExp("ERROR","ig");
							if (CQgrabresponse.match(regCQerror))
								{
								alert_box(CQgrabresponse);
								}
							else
								{
								AutoDial_ReSume_PauSe("VDADready",'','','NO_STATUS_CHANGE');
								AutoDialWaiting=1;
								}
							}
						}
					delete xmlhttp;
					}
				}
			}
		}


// ################################################################################
// RefresH the calls in queue bottombar
	function refresh_calls_in_queue(CQcount)
		{
		if (CQcount > 0)
			{
			if (even > 0)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=CALLSINQUEUEview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&campaign=" + campaign + "&stage=<?php echo $CQwidth ?>";
					xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
						//	alert(xmlhttp.responseText);
							document.getElementById('callsinqueuelist').innerHTML = xmlhttp.responseText + "\n";
							}
						}
					delete xmlhttp;
					}

				}
			}
		}


// ################################################################################
// Open or close the callsinqueue view bottombar
	function show_calls_in_queue(CQoperation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----show_calls_in_queue---" + CQoperation + "|";
		if (CQoperation=='SHOW')
			{
			document.getElementById("callsinqueuelink").innerHTML = "<a href=\"#\"  onclick=\"show_calls_in_queue('HIDE');\"><?php echo _QXZ("Hide Calls In Queue"); ?></a>";
			view_calls_in_queue_active=1;
			showDiv('callsinqueuedisplay');
			}
		else
			{
			document.getElementById("callsinqueuelink").innerHTML = "<a href=\"#\"  onclick=\"show_calls_in_queue('SHOW');\"><?php echo _QXZ("Show Calls In Queue"); ?></a>";
			view_calls_in_queue_active=0;
			hideDiv('callsinqueuedisplay');
			}
		}


// ################################################################################
// Open or close the agents view sidebar or xfer frame
	function AgentsViewOpen(AVlocation,AVoperation)
		{
		if (AVoperation=='open')
			{
			if (AVlocation=='AgentViewSpan')
				{
				button_click_log = button_click_log + "" + SQLdate + "-----AgentsViewOpen---" + AVlocation + " " + AVoperation + "|";
				document.getElementById("AgentViewLink").innerHTML = "<a class=\"btn bg-lime  btn-sm\" href=\"#\" onclick=\"AgentsViewOpen('AgentViewSpan','close');return false;\">Agents View -</a>";
				agent_status_view_active=1;
				}
			showDiv(AVlocation);
			}
		else
			{
			if (AVlocation=='AgentViewSpan')
				{
				button_click_log = button_click_log + "" + SQLdate + "-----AgentsViewOpen---" + AVlocation + " " + AVoperation + "|";
				document.getElementById("AgentViewLink").innerHTML = "<a class=\"btn bg-lime  btn-sm\" href=\"#\" onclick=\"AgentsViewOpen('AgentViewSpan','open');return false;\">Agents View +</a>";
				agent_status_view_active=0;
				}
			hideDiv(AVlocation);
			}
		}


// ################################################################################
// Open or close the webphone view sidebar
	function webphoneOpen(WVlocation,WVoperation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----webphoneOpen---" + WVlocation + " " + WVoperation + "|";
		if (WVoperation=='open')
			{
			document.getElementById("webphoneLink").innerHTML = "<a href=\"#\" onclick=\"webphoneOpen('webphoneSpan','close');return false;\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\"><?php echo _QXZ("WebPhone View"); ?> -</a>";
			displayDiv(WVlocation);
			}
		else
			{
			document.getElementById("webphoneLink").innerHTML = "<a href=\"#\" onclick=\"webphoneOpen('webphoneSpan','open');return false;\" style=\"width:136px\" class=\"btn bg-lime btn-block btn-sm waves-effect\"><?php echo _QXZ("WebPhone View"); ?> +</a>";
			noneDiv(WVlocation);
			}
		}


// ################################################################################
// Populate the number to dial field with the selected user ID
	function AgentsXferSelect(AXuser,AXlocation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----AgentsXferSelect---" + AXuser + " " + AXlocation + "|";
		xfer_select_agents_active=0;
		document.getElementById('AgentXferViewSelect').innerHTML = '';
		hideDiv('AgentXferViewSpan');
		hideDiv(AXlocation);
		xfer_agent_selected=1;
		if (AXuser=='0')
			{xfer_agent_selected=0;}
		document.vicidial_form.xfernumber.value = AXuser;
		}


// ################################################################################
// OnChange function for transfer group select list
	function XferAgentSelectLink()
		{
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		var XScheck = XfeRSelecT.value
		if (XScheck.match(/AGENTDIRECT/i))
			{
			showDiv('agentdirectlink');
			}
		else
			{
			hideDiv('agentdirectlink');
			}
		}


// ################################################################################
// function for number to dial for AGENTDIRECT in-group transfers
	function XferAgentSelectLaunch()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----XferAgentSelectLaunch---|";
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		var XScheck = XfeRSelecT.value
		if (XScheck.match(/AGENTDIRECT/i))
			{
//			showDiv('AgentXferViewSpan');
			AgentsViewOpen('AgentXferViewSelect','open');
                        console.log(agent_status_view);
			refresh_agents_view('AgentXferViewSelect',agent_status_view)
			xfer_select_agents_active=1;
			document.vicidial_form.xfername.value='';
			}
		}


// ################################################################################
// Call ReQueue call back to AGENTDIRECT queue launch
	function call_requeue_launch()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----call_requeue_launch---|";
		document.vicidial_form.xfernumber.value = user;

		// Build transfer pull-down list
		var loop_ct = 0;
		var live_XfeR_HTML = '';
		var XfeR_SelecT = '';
		while (loop_ct < XFgroupCOUNT)
			{
			if (VARxfergroups[loop_ct] == 'AGENTDIRECT')
				{XfeR_SelecT = 'selected ';}
			else {XfeR_SelecT = '';}
			live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
			loop_ct++;
			}
                        console.log('Hello 4');
        document.getElementById("XfeRGrouPLisT").innerHTML = "<select size=\"1\" name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onchange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

		mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip,'','NO');

		document.vicidial_form.DispoSelection.value = 'RQXFER';
		DispoSelect_submit();

		AutoDial_ReSume_PauSe("VDADpause",'','','',"REQUEUE",'1','RQUEUE');

//		PauseCodeSelect_submit("RQUEUE");
		}


// ################################################################################
// View Customer lead information
	function VieWLeaDInfO(VLI_lead_id,VLI_cb_id,VLI_inbound_lead_search)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWLeaDInfO---" + VLI_lead_id + " " + VLI_cb_id + " " + VLI_inbound_lead_search + "|";
		showDiv('LeaDInfOBox');

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=LEADINFOview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&lead_id=" + VLI_lead_id + "&disable_alter_custphone=" + disable_alter_custphone + "&campaign=" + campaign + "&callback_id=" + VLI_cb_id + "&inbound_lead_search=" + VLI_inbound_lead_search + "&manual_dial_filter=" + agentcall_manual + "&stage=<?php echo $HCwidth ?>";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(RAview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('LeaDInfOSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Refresh the call log display
	function VieWCalLLoG(logdate,formdate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWCalLLoG---" + logdate + " " + formdate + "|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO VIEW YOUR CALL LOG"); ?>");
			//	alert("debug: " + AutoDialWaiting + "|" + VD_live_customer_call + "|" + alt_dial_active + "|" + MD_channel_look + "|" + in_lead_preview_state);
				}
			}

		if (formdate=='form')
			{logdate = document.vicidial_form.calllogdate.value;}

		if (typeof logdate != 'undefined')
			{
			var validformat=/^\d{4}\-\d{2}\-\d{2}$/ //Basic check for format validity YYYY-MM-DD
			var returnval=false
			if (!validformat.test(logdate))
				{
				move_on=0;
				alert_box("<?php echo _QXZ("Invalid Date Format. Please correct and submit again."); ?>")
				}
			else
				{ //Detailed check for valid date ranges
				var monthfield=logdate.split("-")[1]
				var dayfield=logdate.split("-")[2]
				var yearfield=logdate.split("-")[0]
				var dayobj = new Date(yearfield, monthfield-1, dayfield)
				if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
					{
					move_on=0;
					alert_box("<?php echo _QXZ("Invalid Day, Month, or Year range detected. Please correct and submit again."); ?>")
					}
				}
			}

		if (move_on == 1)
			{
			showDiv('CalLLoGDisplaYBox');

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=CALLLOGview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&date=" + logdate + "&disable_alter_custphone=" + disable_alter_custphone +"&campaign=" + campaign + "&manual_dial_filter=" + agentcall_manual + "&stage=<?php echo $HCwidth ?>";
				xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(RAview_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						document.getElementById('CallLogSpan').innerHTML = xmlhttp.responseText + "\n";
						}
					}
				delete xmlhttp;
				}
			}
		}


// ################################################################################
// Gather and display contacts search data
	function ContactSearchSubmit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ContactSearchSubmit---|";
		showDiv('SearcHResultSContactsBox');

		document.getElementById('SearcHResultSContactsSpan').innerHTML = "<?php echo _QXZ("Searching..."); ?>\n";

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp)
			{ 
			LSview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=SEARCHCONTACTSRESULTSview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&phone_number=" + document.vicidial_form.contacts_phone_number.value + "&first_name=" + document.vicidial_form.contacts_first_name.value + "&last_name=" + document.vicidial_form.contacts_last_name.value + "&bu_name=" + document.vicidial_form.contacts_bu_name.value + "&department=" + document.vicidial_form.contacts_department.value + "&group_name=" + document.vicidial_form.contacts_group_name.value + "&job_title=" + document.vicidial_form.contacts_job_title.value + "&location=" + document.vicidial_form.contacts_location.value + "&campaign=" + campaign + "&stage=<?php echo $HCwidth ?>";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(LSview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('SearcHResultSContactsSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}



// ################################################################################
// Reset contact search form
	function ContactSearchReset(CNTreset)
		{
		if (CNTreset=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ContactSearchReset---|";}
		document.vicidial_form.contacts_phone_number.value='';
		document.vicidial_form.contacts_first_name.value='';
		document.vicidial_form.contacts_last_name.value='';
		document.vicidial_form.contacts_bu_name.value='';
		document.vicidial_form.contacts_department.value='';
		document.vicidial_form.contacts_group_name.value='';
		document.vicidial_form.contacts_job_title.value='';
		document.vicidial_form.contacts_location.value='';
		}


// ################################################################################
// Gather and display lead search data
	function LeadSearchSubmit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchSubmit---|";
		if ( ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) ) && (inbound_lead_search < 1) )
			{
			alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO SEARCH FOR A LEAD"); ?>");
			}
		else
			{
			showDiv('SearcHResultSDisplaYBox');

			document.getElementById('SearcHResultSSpan').innerHTML = "<?php echo _QXZ("Searching..."); ?>\n";

			var phone_search_fields = '';
			if (document.vicidial_form.search_main_phone.checked==true)
				{phone_search_fields = phone_search_fields + "MAIN_";}
			if (document.vicidial_form.search_alt_phone.checked==true)
				{phone_search_fields = phone_search_fields + "ALT_";}
			if (document.vicidial_form.search_addr3_phone.checked==true)
				{phone_search_fields = phone_search_fields + "ADDR3_";}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp)
				{ 
				LSview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=SEARCHRESULTSview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&phone_number=" + document.vicidial_form.search_phone_number.value + "&lead_id=" + document.vicidial_form.search_lead_id.value + "&vendor_lead_code=" + document.vicidial_form.search_vendor_lead_code.value + "&first_name=" + document.vicidial_form.search_first_name.value + "&last_name=" + document.vicidial_form.search_last_name.value + "&city=" + document.vicidial_form.search_city.value + "&state=" + document.vicidial_form.search_state.value + "&postal_code=" + document.vicidial_form.search_postal_code.value + "&search=" + phone_search_fields + "&campaign=" + campaign + "&inbound_lead_search=" + inbound_lead_search + "&manual_dial_filter=" + agentcall_manual + "&stage=<?php echo $HCwidth ?>";
				xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(LSview_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						document.getElementById('SearcHResultSSpan').innerHTML = xmlhttp.responseText + "\n";
						}
					}
				delete xmlhttp;
				}
			}
		}


// ################################################################################
// Reset lead search form
	function LeadSearchReset()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchReset---|";
		document.vicidial_form.search_phone_number.value='';
		document.vicidial_form.search_lead_id.value='';
		document.vicidial_form.search_vendor_lead_code.value='';
		document.vicidial_form.search_first_name.value='';
		document.vicidial_form.search_last_name.value='';
		document.vicidial_form.search_city.value='';
		document.vicidial_form.search_state.value='';
		document.vicidial_form.search_postal_code.value='';
		}


// ################################################################################
// Hide manual dial form
	function ManualDialHide()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManualDialHide---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		hideDiv('NeWManuaLDiaLBox');
                $('#NeWManuaLDiaLBoxModal').modal('hide');
		document.vicidial_form.MDPhonENumbeR.value = '';
		document.vicidial_form.MDDiaLOverridE.value = '';
		document.vicidial_form.MDLeadID.value = '';
		document.vicidial_form.MDLeadIDEntry.value='';
		document.vicidial_form.MDType.value = '';
		document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
		}


// ################################################################################
// Refresh the lead notes display
	function VieWNotesLoG(logframe)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWNotesLoG---" + logframe + "|";
		showDiv('CalLNotesDisplaYBox');

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			RAview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=LEADINFOview&search=logfirst&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&manual_dial_filter=" + agentcall_manual + "&stage=<?php echo $HCwidth ?>";
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(RAview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('CallNotesSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}



// ################################################################################
// Run the logging process for customer 3way hangup
	function customer_3way_hangup_process(temp_hungup_time,temp_xfer_call_seconds)
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CTHPview_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=customer_3way_hangup_process&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&status=" + temp_hungup_time + "&stage=" + temp_xfer_call_seconds;
			xmlhttp.open('POST', 'utg_vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CTHPview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById("debugbottomspan").innerHTML = "CUSTOMER 3WAY HANGUP " + xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Refresh the FORM content
	function FormContentsLoad(FRMrefresh)
		{
		if (FRMrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----FormContentsLoad---|";}
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('vcFormIFrame').src='./<?php echo $vdc_form_display ?>?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + pass + '&campaign=' + campaign + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&agent_email=" + LOGemail + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' +"&xfercallid=" + xfercallid + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + "&called_count=" + document.vicidial_form.called_count.value + '' + "&did_custom_one=" + did_custom_one + "&did_custom_two=" + did_custom_two + "&did_custom_three=" + did_custom_three + "&did_custom_four=" + did_custom_four + "&did_custom_five=" + did_custom_five + "&web_vars=" + LIVE_web_vars + '';
		form_list_id = '';
		form_entry_list_id = '';
		}

// ################################################################################
// Refresh the EMAIL content
	function EmailContentsLoad(EMLrefresh)
		{
		if (EMLrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----EmailContentsLoad---|";}
		var email_row_id = document.vicidial_form.email_row_id.value;
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('vcEmailIFrame').src='./vdc_email_display.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass + '&campaign=' + campaign + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&agent_email=" + LOGemail + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' +"&xfercallid=" + xfercallid + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + '' + "&did_custom_one=" + did_custom_one + "&did_custom_two=" + did_custom_two + "&did_custom_three=" + did_custom_three + "&did_custom_four=" + did_custom_four + "&did_custom_five=" + did_custom_five + "&web_vars=" + LIVE_web_vars + '';
		form_list_id = '';
		form_entry_list_id = '';
		}

// ################################################################################
// Refresh the agent/customer CHAT content
	function CustomerChatContentsLoad(clickMute, CHTrefresh, email_invite_lead_id)
		{
		if (CHTrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CustomerChatContentsLoad---|";}		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		var form_chat_id = document.vicidial_form.chat_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('CustomerChatIFrame').src='./vdc_chat_display.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass + '&campaign=' + campaign + '&chat_id=' + form_chat_id + '&dial_method=' + dial_method + '&clickmute=' + clickMute + '&email_invite_lead_id=' + email_invite_lead_id + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' + "&xfercallid=" + xfercallid + '' + "&chat_group_id=" + VDCL_group_id + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + '' +"&web_vars=" + LIVE_web_vars + '';
		form_list_id = '';
		form_chat_id = '';
		form_entry_list_id = '';
		// CustomerChatPanelToFront();
		}

// ################################################################################
// Refresh the agent/manager CHAT content
	function InternalChatContentsLoad(ICHrefresh)
		{
		if (ICHrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----InternalChatContentsLoad---|";}		var form_list_id = document.vicidial_form.list_id.value;
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		var form_chat_id = document.vicidial_form.chat_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('InternalChatIFrame').src='./agc_agent_manager_chat_interface.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass;
		form_list_id = '';
		form_chat_id = '';
		form_entry_list_id = '';
		InternalChatPanelToFront();
		}


// ################################################################################
// Move the Dispo frame out of the way and change the link to maximize
	function DispoMinimize()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoMinimize---|";
		showDiv('DispoButtonHideA');
		showDiv('DispoButtonHideB');
		showDiv('DispoButtonHideC');
		document.getElementById("DispoSelectBox").style.top = '340px';
		document.getElementById("DispoSelectMaxMin").innerHTML = "<a class='btn bg-blue-grey' href=\"#\" onclick=\"DispoMaximize()\"> <?php echo _QXZ("maximize"); ?> </a>";
		}


// ################################################################################
// Move the Dispo frame to the top and change the link to minimize
	function DispoMaximize()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoMaximize---|";
		document.getElementById("DispoSelectBox").style.top = '1px';
		document.getElementById("DispoSelectMaxMin").innerHTML = "<a class='btn bg-blue-grey' href=\"#\" onclick=\"DispoMinimize()\"> <?php echo _QXZ("minimize"); ?> </a>";
		hideDiv('DispoButtonHideA');
		hideDiv('DispoButtonHideB');
		hideDiv('DispoButtonHideC');
		}


// ################################################################################
// Trigger a pause on the next dispo screen only
	function next_call_pause_click()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----next_call_pause_click---|";
		document.vicidial_form.DispoSelectStop.checked=true;
		document.getElementById("NexTCalLPausE").innerHTML = "<?php echo _QXZ("Next Call Pause Set"); ?>";
		}


// ################################################################################
// Show the groups selection span
	function OpeNGrouPSelectioN()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNGrouPSelectioN---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO CHANGE GROUPS"); ?>");
				}
			}
		if (move_on == 1)
			{
			if (manager_ingroups_set > 0)
				{
				alert_box("<?php echo _QXZ("Manager"); ?> " + external_igb_set_name + " <?php echo _QXZ("has selected your in-group choices"); ?>");
				}
			else
				{
				HidEGenDerPulldown();
//				showDiv('CloserSelectBox');
//                                $('#modal-default').modal('show');
                                $('#modal-inbound-groups').modal('show');
				}
			}
		}


// ################################################################################
// Show the territories selection span
	function OpeNTerritorYSelectioN()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNTerritorYSelectioN---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO CHANGE TERRITORIES"); ?>");
				}
			}
		if (move_on == 1)
			{
			showDiv('TerritorySelectBox')
			}
		}


// ################################################################################
// Hide the CBcommentsBox span upon click
	function CBcommentsBoxhide()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CBcommentsBoxhide---|";
		CBentry_time = '';
		CBcallback_time = '';
		CBuser = '';
		CBcomments = '';
		document.getElementById("CBcommentsBoxA").innerHTML = "";
		document.getElementById("CBcommentsBoxB").innerHTML = "";
		document.getElementById("CBcommentsBoxC").innerHTML = "";
		document.getElementById("CBcommentsBoxD").innerHTML = "";
		hideDiv('CBcommentsBox');
		}


// ################################################################################
// Hide the EAcommentsBox span upon click
	function EAcommentsBoxhide(minimizetask)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----EAcommentsBoxhide---" + minimizetask + "|";
		hideDiv('EAcommentsBox');
		if (minimizetask=='YES')
			{showDiv('EAcommentsMinBox');}
		else
			{hideDiv('EAcommentsMinBox');}
		}


// ################################################################################
// Show the EAcommentsBox span upon click
	function EAcommentsBoxshow()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----EAcommentsBoxshow---|";
		showDiv('EAcommentsBox');
		hideDiv('EAcommentsMinBox');
		}


// ################################################################################
// Populating the date field in the callback frame prior to submission
	function CB_date_pick(taskdate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CB_date_pick---" + taskdate + "|";
		document.vicidial_form.CallBackDatESelectioN.value = taskdate;
		document.getElementById("CallBackDatEPrinT").innerHTML = taskdate;
		}


// ################################################################################
// Submitting the callback date and time to the system
	function CallBackDatE_submitOLD()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CallBackDatE_submit---|";
		CallBackDatEForM = document.vicidial_form.CallBackDatESelectioN.value;
		CallBackCommenTs = document.vicidial_form.CallBackCommenTsField.value;
		if (CallBackDatEForM.length < 2)
			{alert_box("<?php echo _QXZ("You must choose a date"); ?>");}
		else
			{

	<?php
	if ($useIE > 0)
	{
	?>

			var CallBackTimEHouRFORM = document.getElementById('CBT_hour');
			var CallBackTimEHouR = CallBackTimEHouRFORM[CallBackTimEHouRFORM.selectedIndex].text;
		//	var CallBackTimEHouRIDX = CallBackTimEHouRFORM.value;

			var CallBackTimEMinuteSFORM = document.getElementById('CBT_minute');
			var CallBackTimEMinuteS = CallBackTimEMinuteSFORM[CallBackTimEMinuteSFORM.selectedIndex].text;
		//	var CallBackTimEMinuteSIDX = CallBackTimEMinuteSFORM.value;

		<?php
		if ($callback_time_24hour < 1)
		{
		?>
			var CallBackTimEAmpMFORM = document.getElementById('CBT_ampm');
			var CallBackTimEAmpM = CallBackTimEAmpMFORM[CallBackTimEAmpMFORM.selectedIndex].text;
		//	var CallBackTimEAmpMIDX = CallBackTimEAmpMFORM.value;
		<?php
		}
		?>
			CallBackLeadStatus = document.vicidial_form.DispoSelection.value;

		//	alert (CallBackTimEHouR + "|" + CallBackTimEHouRFORM + "|" + CallBackTimEHouRIDX + "|");
		//	alert (CallBackTimEMinuteS + "|" + CallBackTimEMinuteSFORM + "|" + CallBackTimEMinuteSIDX + "|");
		//	alert (CallBackTimEAmpM + "|" + CallBackTimEAmpMFORM + "|" + CallBackTimEAmpMIDX + "|");

			CallBackTimEMinuteSFORM.selectedIndex = '0';
		<?php
		if ($callback_time_24hour < 1)
		{
		?>
			CallBackTimEHouRFORM.selectedIndex = '0';
			CallBackTimEAmpMFORM.selectedIndex = '1';
		<?php
		}
		else
		{
		?>
			CallBackTimEHouRFORM.selectedIndex = '11';
		<?php
		}
	}
	else
	{
	?>
			CallBackTimEHouR = document.vicidial_form.CBT_hour.value;
			CallBackTimEMinuteS = document.vicidial_form.CBT_minute.value;
		<?php
		if ($callback_time_24hour < 1)
		{
		?>
			CallBackTimEAmpM = document.vicidial_form.CBT_ampm.value;
			document.vicidial_form.CBT_ampm.value = 'PM';
			document.vicidial_form.CBT_hour.value = '01';
		<?php
		}
		else
		{
		?>
			document.vicidial_form.CBT_hour.value = '12';
		<?php
		}
		?>
			CallBackLeadStatus = document.vicidial_form.DispoSelection.value;
			document.vicidial_form.CBT_minute.value = '00';

	<?php
	}
	if ($callback_time_24hour < 1)
		{
	?>
			if (CallBackTimEHouR == '12')
				{
				if (CallBackTimEAmpM == 'AM')
					{
					CallBackTimEHouR = '00';
					}
				}
			else
				{
				if (CallBackTimEAmpM == 'PM')
					{
					CallBackTimEHouR = CallBackTimEHouR * 1;
					CallBackTimEHouR = (CallBackTimEHouR + 12);
					}
				}
		<?php
		}
		?>
			CallBackDatETimE = CallBackDatEForM + " " + CallBackTimEHouR + ":" + CallBackTimEMinuteS + ":00";

			if (document.vicidial_form.CallBackOnlyMe.checked==true)
				{
				CallBackrecipient = 'USERONLY';
				}
			else
				{
				CallBackrecipient = 'ANYONE';
				}
			document.getElementById("CallBackDatEPrinT").innerHTML = "<?php echo _QXZ("Select a Date Below"); ?>";
			document.vicidial_form.CallBackOnlyMe.checked=false;
			if (my_callback_option == 'CHECKED')
				{document.vicidial_form.CallBackOnlyMe.checked=true;}
			document.vicidial_form.CallBackDatESelectioN.value = '';
			document.vicidial_form.CallBackCommenTsField.value = '';

		//	alert(CallBackDatETimE + "|" + CallBackCommenTs);
			
			document.vicidial_form.DispoSelection.value = 'CBHOLD';
			hideDiv('CallBackSelectBox');
			DispoSelect_submit();
			}
		}

function reformatDateString(s) {
        var b = s.split(/\D/);
        return b.reverse().join('-');
    }
    
function CallBackDatE_submit() {
        
        button_click_log = button_click_log + "" + SQLdate + "-----CallBackDatE_submit---|";
//        CallBackDatEForM = document.vicidial_form.CallBackDatESelectioN.value;
        CallBackDatEForM = $('input[name="CallBackDatESelectioN"]').val();
        CallBackDatEForM = reformatDateString(CallBackDatEForM);
//        alert(CallBackDatEForM);
//        CallBackCommenTs = document.vicidial_form.CallBackCommenTsField.value;
        CallBackCommenTs = $('textarea[name="CallBackCommenTsField"]').val();
        CallBackDatETimE = CallBackDatEForM + " " + $('input[name="CallBackTimESelectioN"]').val();
        
        CallBackLeadStatus = document.vicidial_form.DispoSelection.value;
//        CBALTV = document.vicidial_form.CBALTV.value;
		var today = new Date();
        if (CallBackDatEForM.length < 2) {
            alert_box("You must choose a date");
        }
        else {
            if (document.vicidial_form.CallBackOnlyMe.checked == true) {
                CallBackrecipient = 'USERONLY';
            }
            else {
                CallBackrecipient = 'ANYONE';
            }
            document.vicidial_form.CallBackOnlyMe.checked = false;
            if (my_callback_option == 'CHECKED') {
                document.vicidial_form.CallBackOnlyMe.checked = true;
            }
            var cd = new Date();
            var dd = cd.getDate();
            var mm = cd.getMonth()+1; //January is 0!
            var yyyy = cd.getFullYear();
            var cn = cd.getHours();
            var cm = cd.getMinutes();
            document.vicidial_form.CallBackCommenTsField.value = '';
            <!--$(".datepicker").val(dd + '/' + mm + '/' + yyyy);-->
            <!--$('.time').val(cn + ":" + cm);-->
            <!--$('#CBALTV').val('0');-->
            <!--$('#EmailReminderAddress').val('');-->


            //	alert(CallBackDatETimE + "|" + CallBackCommenTs);

            document.vicidial_form.DispoSelection.value = 'CBHOLD';
            $('#AgentCallbackSelection-Modal').modal('hide');
            
            DispoSelect_submit();
        }
    }

// ################################################################################
// Finish the wrapup timer early
	function TimerActionRun(taskaction,taskdialalert)
		{
		var next_action=0;
		if (taskaction == 'DiaLAlerT')
			{
//            document.getElementById("TimerContentSpan").innerHTML = "<b><?php echo _QXZ("DIAL ALERT:"); ?><br><br>" + taskdialalert.replace("\n","<br>") + "</b>";
                                    $.toast({
                                        heading: '<?php echo _QXZ("DIAL ALERT:"); ?>',
                                        text: taskdialalert.replace("\n","<br>"),
                                        position: 'top-right',
                                        loaderBg: '#ff6849',
                                        icon: 'warning',
                                        hideAfter: 6000,
                                        stack: 6
                                    });
//			showDiv('TimerSpan');
			}
		else
			{
			if ( (timer_action_message.length > 0) || (timer_action == 'MESSAGE_ONLY') )
				{
                document.getElementById("TimerContentSpan").innerHTML = "<b><?php echo _QXZ("TIMER NOTIFICATION:"); ?> " + timer_action_seconds + " seconds<br><br>" + timer_action_message + "</b>";

				showDiv('TimerSpan');
				}

			if (timer_action == 'WEBFORM')
				{
				WebFormRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				}
			if (timer_action == 'WEBFORM2')
				{
				WebFormTwoRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				}
			if (timer_action == 'WEBFORM3')
				{
				WebFormThreeRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				}
			if (timer_action == 'D1_DIAL')
				{
				DtMf_PreSet_a_DiaL();
				}
			if (timer_action == 'D2_DIAL')
				{
				DtMf_PreSet_b_DiaL();
				}
			if (timer_action == 'D3_DIAL')
				{
				DtMf_PreSet_c_DiaL();
				}
			if (timer_action == 'D4_DIAL')
				{
				DtMf_PreSet_d_DiaL();
				}
			if (timer_action == 'D5_DIAL')
				{
				DtMf_PreSet_e_DiaL();
				}
			if (timer_action == 'D1_DIAL_QUIET')
				{
				DtMf_PreSet_a_DiaL('YES');
				}
			if (timer_action == 'D2_DIAL_QUIET')
				{
				DtMf_PreSet_b_DiaL('YES');
				}
			if (timer_action == 'D3_DIAL_QUIET')
				{
				DtMf_PreSet_c_DiaL('YES');
				}
			if (timer_action == 'D4_DIAL_QUIET')
				{
				DtMf_PreSet_d_DiaL('YES');
				}
			if (timer_action == 'D5_DIAL_QUIET')
				{
				DtMf_PreSet_e_DiaL('YES');
				}
			if ( (timer_action == 'HANGUP') && (VD_live_customer_call==1) )
				{
				hangup_timer_xfer();
				}
			if ( (timer_action == 'EXTENSION') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				extension_timer_xfer();
				}
			if ( (timer_action == 'CALLMENU') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				callmenu_timer_xfer();
				}
			if ( (timer_action == 'IN_GROUP') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				ingroup_timer_xfer();
				}
			if (timer_action_destination.length > 0)
				{
				var regNS = new RegExp("nextstep---","ig");
				if (timer_action_destination.match(regNS))
					{
					next_action=1;
					timer_action = 'NONE';
					var next_action_array=timer_action_destination.split("nextstep---");
					var next_action_details_array=next_action_array[1].split("--");
					timer_action = next_action_details_array[0];
					timer_action_seconds = parseInt(next_action_details_array[1]);
					timer_action_seconds = (timer_action_seconds + VD_live_call_secondS);
					timer_action_destination = next_action_details_array[2];
					timer_action_message = next_action_details_array[3];
				//	alert("NEXT: " + timer_action + '|' + timer_action_message + '|' + timer_action_seconds + '|' + timer_action_destination + '|');
					}
				}
			}

		if (next_action < 1)
			{timer_action = 'NONE';}	
		}


// ################################################################################
// Finish the wrapup timer early
	function WrapupFinish()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----WrapupFinish---|";
		wrapup_counter=999;
		}


// ################################################################################
// Finish the wrapup timer on the hotkeys screen early
	function HKWrapupFinish()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----HKWrapupFinish---|";
		HKdispo_display=2;
		}


// ################################################################################
// GLOBAL FUNCTIONS
	function begin_all_refresh()
		{
		<?php if ( ($HK_statuses_camp > 0) && ($user_level>=$HKuser_level) && ($VU_hotkeys_active > 0) ) {echo "document.onkeypress = hotkeypress;\n";} ?>
		all_refresh();
		}
	function start_all_refresh()
		{
		if (VICIDiaL_closer_login_checked==0)
			{
			hideDiv('NothingBox');
			hideDiv('AlertBox');
		//	hideDiv('NothingBox2');
			hideDiv('CBcommentsBox');
			hideDiv('EAcommentsBox');
			hideDiv('EAcommentsMinBox');
			hideDiv('HotKeyActionBox');
			hideDiv('HotKeyEntriesBox');
			hideDiv('ViewCommentsBox');
			hideDiv('MainPanel');
			hideDiv('ScriptPanel');
			hideDiv('ScriptRefresH');
			hideDiv('EmailPanel');
			hideDiv('EmailRefresH');
			hideDiv('CustomerChatPanel');
			hideDiv('CustomerChatRefresH');
			hideDiv('InternalChatPanel');
			hideDiv('FormPanel');
			hideDiv('FormRefresH');
			hideDiv('DispoSelectBox');
			hideDiv('LogouTBox');
			hideDiv('AgenTDisablEBoX');
			hideDiv('SysteMDisablEBoX');
			hideDiv('CustomerGoneBox');
			hideDiv('NoneInSessionBox');
			hideDiv('WrapupBox');
			hideDiv('FSCREENWrapupBox');
			hideDiv('TransferMain');
			hideDiv('WelcomeBoxA');
			hideDiv('CallBackSelectBox');
			hideDiv('DispoButtonHideA');
			hideDiv('DispoButtonHideB');
			hideDiv('DispoButtonHideC');
			hideDiv('CallBacKsLisTBox');
			hideDiv('NeWManuaLDiaLBox');
                        $('#NeWManuaLDiaLBoxModal').modal('hide');
			hideDiv('PauseCodeSelectBox');
			hideDiv('PresetsSelectBox');
			hideDiv('GroupAliasSelectBox');
			hideDiv('DiaLInGrouPSelectBox');
			hideDiv('AgentViewSpan');
			hideDiv('AgentXferViewSpan');
			hideDiv('TimerSpan');
			hideDiv('CalLLoGDisplaYBox');
			hideDiv('CalLNotesDisplaYBox');
			hideDiv('SearcHForMDisplaYBox');
			hideDiv('SearcHResultSDisplaYBox');
			hideDiv('SearcHContactsDisplaYBox');
			hideDiv('SearcHResultSContactsBox');
			hideDiv('LeaDInfOBox');
			hideDiv('agentdirectlink');
			hideDiv('blind_monitor_notice_span');
			hideDiv('post_phone_time_diff_span');
			hideDiv('ivrParkControl');
			hideDiv('InvalidOpenerSpan');
			hideDiv('OtherTabCommentsSpan');
			if (deactivated_old_session < 1)
				{hideDiv('DeactivateDOlDSessioNSpan');}
			if (is_webphone!='Y')
				{noneDiv('webphoneSpan');}
			if (view_calls_in_queue_launch != '1')
				{hideDiv('callsinqueuedisplay');}
			if (agentonly_callbacks != '1')
				{hideDiv('CallbacksButtons');}
			if (email_enabled < 1)
				{hideDiv('AgentStatusEmails');}
			if (allow_alerts < 1)
				{hideDiv('AgentAlertSpan');}
			if (allow_alerts < 1)
				{hideDiv('AgentAlertSpan');}
		//	if ( (agentcall_manual != '1') && (starting_dial_level > 0) )
			if (agentcall_manual != '1')
				{hideDiv('ManuaLDiaLButtons');}
			if (agent_call_log_view != '1')
				{
				hideDiv('CallNotesButtons');
				hideDiv('CallLogButtons');
				}
			if (callholdstatus != '1')
				{hideDiv('AgentStatusCalls');}
			if (agentcallsstatus != '1')
				{hideDiv('AgentStatusSpan');}
			if ( ( (auto_dial_level > 0) && (dial_method != "INBOUND_MAN") ) || (manual_dial_preview < 1) )
				{clearDiv('DiaLLeaDPrevieW');}
			if (alt_phone_dialing != 1)
				{clearDiv('DiaLDiaLAltPhonE');}
			if (pause_after_next_call != 'ENABLED')
				{clearDiv('NexTCalLPausE');}
			if (volumecontrol_active != '1')
				{hideDiv('VolumeControlSpan');}
			if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
				{document.vicidial_form.DiaLAltPhonE.checked=true;}
			if (agent_status_view != '1')
				{document.getElementById("AgentViewLink").innerHTML = "";}
			if (dispo_check_all_pause == '1')
				{document.vicidial_form.DispoSelectStop.checked=true;}
			if (agent_xfer_consultative < 1)
				{hideDiv('consultative_checkbox');}
			if (agent_xfer_dial_override < 1)
				{hideDiv('dialoverride_checkbox');}
			if (agent_xfer_vm_transfer < 1)
				{hideDiv('DialBlindVMail');}
			if (agent_xfer_blind_transfer < 1)
				{hideDiv('DialBlindTransfer');}
			if (agent_xfer_dial_with_customer < 1)
				{hideDiv('DialWithCustomer');}
			if (agent_xfer_park_customer_dial < 1)
				{hideDiv('ParkCustomerDial');}
			if (agent_xfer_park_3way < 1)
				{hideDiv('ParkXferLine');}
			if (AllowManualQueueCallsChoice == '1')
                {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('1');return false;\"><?php echo _QXZ("Manual Queue is Off"); ?></a><br>";}
			if (qc_enabled < 1)
				{document.getElementById("viewcommentsdisplay").innerHTML = "";}

			if ( (manual_dial_search_checkbox == 'SELECTED') || (manual_dial_search_checkbox == 'SELECTED_RESET') || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
				{document.vicidial_form.LeadLookuP.checked=true;}
			else
				{document.vicidial_form.LeadLookuP.checked=false;}

			if ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') )
				{
				document.getElementById("PauseCodeLinkSpan").innerHTML = "<a class=\"btn bg-orange\" href=\"#\" onclick=\"PauseCodeSelectContent_create('YES');return false;\"><?php echo _QXZ("Enter a Pause Code"); ?></a>";
				}
			if (VICIDiaL_allow_closers < 1)
				{
				document.getElementById("LocalCloser").style.visibility = 'hidden';
				}
			document.getElementById("sessionIDspan").innerHTML = session_id;
			if ( (LIVE_campaign_recording == 'NEVER') || (LIVE_campaign_recording == 'ALLFORCE') )
				{
                document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_startrecording_OFF.gif"); ?>\" border=\"0\" alt=\"Start Recording\" />";
				}
			if (INgroupCOUNT > 0)
				{
				if (VU_closer_default_blended == 1)
					{document.vicidial_form.CloserSelectBlended.checked=true}
				CloserSelectContent_create();
//				showDiv('CloserSelectBox');
//                                $('#modal-default').modal('show');
                                $('#modal-inbound-groups').modal('show');
				var CloserSelecting = 1;
				CloserSelectContent_create();
				if (VU_agent_choose_ingroups_DV == "MGRLOCK")
					{VU_agent_choose_ingroups_skip_count = mrglock_ig_select_ct;}
				}
			else
				{
//				hideDiv('CloserSelectBox');
//                                $('#modal-default').modal('hide');
                                $('#modal-inbound-groups').modal('hide');
				MainPanelToFront();
				var CloserSelecting = 0;
				if (dial_method == "INBOUND_MAN")
					{
					dial_method = "MANUAL";
					auto_dial_level=0;
					starting_dial_level=0;
					document.getElementById("DiaLControl").innerHTML = DiaLControl_manual_HTML;
					}
				}
			if (territoryCOUNT > 0)
				{
				showDiv('TerritorySelectBox');
				var TerritorySelecting = 1;
				TerritorySelectContent_create();
				if (agent_select_territories == "MGRLOCK")
					{agent_select_territories_skip_count=4;}
				}
			else
				{
				hideDiv('TerritorySelectBox');
				MainPanelToFront();
				var TerritorySelecting = 0;
				}
			if ( (VtigeRLogiNScripT == 'Y') && (VtigeREnableD > 0) )
				{
				document.getElementById("ScriptContents").innerHTML = "<iframe src=\"" + VtigeRurl + "/index.php?module=Users&action=Authenticate&return_module=Users&return_action=Login&user_name=" + user + "&user_password=" + orig_pass + "&login_theme=softed&login_language=en_us\" style=\"background-color:transparent;z-index:17;\" scrolling=\"auto\" frameborder=\"0\" allowtransparency=\"true\" id=\"popupFrame\" name=\"popupFrame\" width=\"" + script_width + "px\" height=\"" + script_height + "px\"> </iframe> ";
				}
			if ( (VtigeRLogiNScripT == 'NEW_WINDOW') && (VtigeREnableD > 0) )
				{
				var VtigeRall = VtigeRurl + "/index.php?module=Users&action=Authenticate&return_module=Users&return_action=Login&user_name=" + user + "&user_password=" + orig_pass + "&login_theme=softed&login_language=en_us";
				
				VtigeRwin =window.open(VtigeRall, web_form_target,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=700,height=480');

				VtigeRwin.blur();
				}
			if ( (crm_popup_login == 'Y') && (crm_login_address.length > 4) )
				{
				var regWFAcustom = new RegExp("^VAR","ig");
				var TEMP_crm_login_address = URLDecode(crm_login_address,'YES');
				TEMP_crm_login_address = TEMP_crm_login_address.replace(regWFAcustom, '');

				var CRMwin = 'CRMwin';
				CRMwin = window.open(TEMP_crm_login_address, CRMwin,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=700,height=480');

				CRMwin.blur();
				}
			if (INgroupCOUNT > 0)
				{
				HidEGenDerPulldown();
				}
			if (is_webphone=='Y')
				{
                                
				NoneInSession(true);
				document.getElementById("NoneInSessionLink").innerHTML = "<a class=\"btn btn-primary waves-effect btn-lg CallAgentWebphone\" href=\"#\" onclick=\"NoneInSessionCalL('LOGIN');return false;\"><?php echo _QXZ("Call Agent Webphone"); ?></a>";
				
				var WebPhonEtarget = 'webphonewindow';

			//	WebPhonEwin =window.open(WebPhonEurl, WebPhonEtarget,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=180,height=270');

			//	WebPhonEwin.blur();
				}else{
                                 $('#1check').removeClass('hidden');
                                    $('#2check').removeClass('hidden');
                                    $('#3check').removeClass('hidden');
                                    }

			if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
				{
				showDiv('ivrParkControl');
				}
			if (manual_dial_override_field == 'DISABLED')
				{document.getElementById("xferoverride").disabled = true;}

			VICIDiaL_closer_login_checked = 1;
			}
		else
			{
			var WaitingForNextStep=0;
			if ( (CloserSelecting==1) || (TerritorySelecting==1) )	{WaitingForNextStep=1;}
			if (open_dispo_screen==1)
				{
				wrapup_counter=0;
				if (wrapup_seconds > 0)	
					{
					if (wrapup_message.match(regWFS))
						{showDiv('FSCREENWrapupBox');  FSCREENup=1;}
					else
						{showDiv('WrapupBox');}
					document.getElementById("WrapupTimer").innerHTML = wrapup_seconds;
					wrapup_waiting=1;
					}
				CustomerData_update();
				if (hide_gender < 1)
					{
					document.getElementById("GENDERhideFORie").innerHTML = '';
					document.getElementById("GENDERhideFORieALT").innerHTML = "<select size=\"1\" name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\"><?php echo _QXZ("U - Undefined"); ?></option><option value=\"M\"><?php echo _QXZ("M - Male"); ?></option><option value=\"F\"><?php echo _QXZ("F - Female"); ?></option></select>";
					}
				ViewComments('OFF','OFF');
				<!--showDiv('DispoSelectBox');-->
                                $('#CallDispo-Modal').modal('show');
				DispoSelectContent_create('','ReSET');
				WaitingForNextStep=1;
				open_dispo_screen=0;
				LIVE_default_xfer_group = default_xfer_group;
				LIVE_campaign_recording = campaign_recording;
				LIVE_campaign_rec_filename = campaign_rec_filename;
				if (disable_alter_custphone!='HIDE')
					{document.getElementById("DispoSelectPhonE").innerHTML = dialed_number;}
				else
					{document.getElementById("DispoSelectPhonE").innerHTML = '';}
				if (auto_dial_level == 0)
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
                        document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";

						document.getElementById("MainStatuSSpan").innerHTML = "<?php echo _QXZ("Dial Next Call"); ?>";
						}
					else
						{
						reselect_alt_dial = 0;
						}
					}

				// Submit custom form if it is custom_fields_enabled
				if (custom_fields_enabled > 0)
					{
				//	alert("IFRAME submitting!");
					vcFormIFrame.document.form_custom_fields.submit();
					}
				}
			if (UpdatESettingSChecK > 0)
				{
				UpdatESettingSChecK=0;
				UpdatESettingS();
				}
			if (AgentDispoing > 0)	
				{
				WaitingForNextStep=1;
				check_for_conf_calls(session_id, '0');
				AgentDispoing++;
			//	document.getElementById("debugbottomspan").innerHTML = "DISPO SECONDS " + AgentDispoing;

				if ( (dispo_max > 0) && (AgentDispoing > dispo_max) )
					{
					button_click_log = button_click_log + "" + SQLdate + "-----DispoMax---" + dispo_max + " " + dispo_max_dispo + "|";

					document.vicidial_form.DispoSelectStop.checked=true;
					document.vicidial_form.DispoSelection.value = dispo_max_dispo;
					DispoSelect_submit('1',dispo_max_dispo);
					}
				}
			if (VU_agent_choose_ingroups_skip_count > 0)
				{
				VU_agent_choose_ingroups_skip_count--;
				if (VU_agent_choose_ingroups_skip_count == 0)
					{CloserSelect_submit();}
				}
			if (agent_select_territories_skip_count > 0)
				{
				agent_select_territories_skip_count--;
				if (agent_select_territories_skip_count == 0)
					{TerritorySelect_submit();}
				}
			if (logout_stop_timeouts==1)	{WaitingForNextStep=1;}
			if ( (custchannellive < customer_gone_seconds) && (lastcustchannel.length > 3) && (no_empty_session_warnings < 1) && (document.vicidial_form.lead_id.value != '') && (currently_in_email_or_chat==0) ) 
				{CustomerChanneLGone();}
		//	document.getElementById("debugbottomspan").innerHTML = "custchannellive: " + custchannellive + " lastcustchannel.length: " + lastcustchannel.length + " no_empty_session_warnings: " + no_empty_session_warnings + " lead_id: |" + document.vicidial_form.lead_id.value + "|";
			if ( (custchannellive < -10) && (lastcustchannel.length > 3) ) {ReChecKCustoMerChaN();}
			if ( (nochannelinsession > 16) && (check_n > 15) && (no_empty_session_warnings < 1) ) {NoneInSession();}
			if (external_transferconf_count > 0) {external_transferconf_count = (external_transferconf_count - 1);}

			if (WaitingForNextStep==0)
				{
				if (trigger_ready > 0)
					{
					trigger_ready=0;
					if (auto_resume_precall == 'Y')
						{AutoDial_ReSume_PauSe("VDADready");}
					}
				// check for live channels in conference room and get current datetime
				check_for_conf_calls(session_id, '0');
				// refresh agent status view
				if (agent_status_view_active > 0)
					{
					refresh_agents_view('AgentViewStatus',agent_status_view);
					}
				if (view_calls_in_queue_active > 0)
					{
					refresh_calls_in_queue(view_calls_in_queue);
					}
				if (xfer_select_agents_active > 0)
					{
					refresh_agents_view('AgentXferViewSelect',agent_status_view);
					}
				if (agentonly_callbacks == '1')
					{CB_count_check++;}

				if (AutoDialWaiting == 1)
					{
					check_for_auto_incoming();
					}
				// look for a channel name for the manually dialed call
				if (MD_channel_look==1)
					{
					ManualDialCheckChanneL(XDcheck);
					}
				if ( (CB_count_check > 19) && (agentonly_callbacks == '1') )
					{
					CalLBacKsCounTCheck();
					CB_count_check=0;
					}
				if (chat_enabled=='1') // JOEJ - if chat is enabled, check if manager has sent message.
					{
					InternalChatsCheck();
					}
				if ( (even > 0) && (agent_display_dialable_leads > 0) )
					{
					DiaLableLeaDsCounT();
					}
				if (timer_alt_trigger > 0)
					{
					if (timer_alt_count < 1)
						{
						timer_alt_trigger=0;
						timer_alt_count=timer_alt_seconds;
						document.getElementById("timer_alt_display").innerHTML = '';
						if (alt_number_dialing == 'SELECTED_TIMER_ALT')
							{ManualDialOnly('ALTPhonE');}
						if (alt_number_dialing == 'SELECTED_TIMER_ADDR3')
							{ManualDialOnly('AddresS3');}
						}
					else
						{
						document.getElementById("timer_alt_display").innerHTML = " <?php echo _QXZ("Dial Countdown:"); ?> " + timer_alt_count + " &nbsp; " + last_mdtype;
						timer_alt_count--;
						}
					}
				if ( (manual_auto_next > 0) && (manual_auto_next_trigger > 0) && (document.getElementById("WrapupBox").style.visibility != 'visible') && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
					{
					if (manual_auto_next_count < 1)
						{
						manual_auto_next_trigger=0;
						manual_auto_next_count=manual_auto_next;
						document.getElementById("manual_auto_next_display").innerHTML = '';
						
						button_click_log = button_click_log + "" + SQLdate + "-----ManualAutoNext---" + manual_auto_next + " " + manual_auto_show + "|";

						ManualDialNext('','','','','','0','','','YES');
						}
					else
						{
						if (manual_auto_show == 'Y')
							{
							document.getElementById("manual_auto_next_display").innerHTML = " <?php echo _QXZ("Dial Next Countdown:"); ?> " + manual_auto_next_count + " &nbsp; ";
							}
						manual_auto_next_count--;
						}
					}				
				if (VD_live_customer_call==1)
					{
					VD_live_call_secondS++;
					document.vicidial_form.SecondS.value		= VD_live_call_secondS;
					document.getElementById("SecondSDISP").innerHTML = VD_live_call_secondS;
                                        CountDownTimer('countdown',VD_live_call_secondS);
					if (CheckDEADcallON > 0 && currently_in_email_or_chat < 1)
						{
						CheckDEADcallCOUNT++;
					//	document.getElementById("debugbottomspan").innerHTML = "DEAD CALL SECONDS " + CheckDEADcallCOUNT;

						if ( (dead_max > 0) && (CheckDEADcallCOUNT > dead_max) )
							{
							CustomerData_update();
							if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
								{
								var test_notesDE = document.vicidial_form.call_notes.value;
								if (test_notesDE.length > 0)
									{document.vicidial_form.call_notes_dispo.value = document.vicidial_form.call_notes.value}
								}
							button_click_log = button_click_log + "" + SQLdate + "-----DeadMax---" + dead_max + " " + dead_max_dispo + "|";

							dead_auto_dispo_count=4;
							dead_auto_dispo_finish=1;
							alt_phone_dialing=starting_alt_phone_dialing;
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							document.vicidial_form.DispoSelection.value = dead_max_dispo;
							document.vicidial_form.DispoSelectStop.checked=true;
							dialedcall_send_hangup('NO', 'NO', dead_max_dispo);
							if (custom_fields_enabled > 0)
								{
								vcFormIFrame.document.form_custom_fields.submit();
								}
							}
						}
					}
				if (XD_live_customer_call==1)
					{
					XD_live_call_secondS++;
					document.vicidial_form.xferlength.value		= XD_live_call_secondS;
					}
				if (customerparked==1)
					{
					customerparkedcounter++;
					var parked_mm = Math.floor(customerparkedcounter/60);  // The minutes
					var parked_ss = customerparkedcounter % 60;              // The balance of seconds
					if (parked_ss < 10)
						{parked_ss = "0" + parked_ss;}
					var parked_mmss = parked_mm + ":" + parked_ss;
					document.getElementById("ParkCounterSpan").innerHTML = "<?php echo _QXZ("Time On Park:"); ?> " + parked_mmss;
					}
				if (customer_3way_hangup_counter_trigger > 0)
					{
					if (customer_3way_hangup_counter > customer_3way_hangup_seconds)
						{
						var customer_3way_timer_seconds = (XD_live_call_secondS - customer_3way_hangup_counter);
						customer_3way_hangup_process('DURING_CALL',customer_3way_timer_seconds);

						customer_3way_hangup_counter=0;
						customer_3way_hangup_counter_trigger=0;

						if (customer_3way_hangup_action=='DISPO')
							{
							customer_3way_hangup_dispo_message="<?php echo _QXZ("Customer Hung-up, 3-way Call Ended Automatically"); ?>";
							bothcall_send_hangup();
							}
						}
					else
						{
						customer_3way_hangup_counter++;
						document.getElementById("debugbottomspan").innerHTML = "<?php echo _QXZ("CUSTOMER 3WAY HANGUP"); ?> " + customer_3way_hangup_counter;
						}
					}
				if ( (update_fields > 0) && (update_fields_data.length > 2) )
					{
					UpdateFieldsData();
					}
				if ( (timer_action != 'NONE') && (timer_action.length > 3) && (timer_action_seconds <= VD_live_call_secondS) && (timer_action_seconds >= 0) )
					{
					TimerActionRun('','');
					}
				if (HKdispo_display > 0)
					{
					if ( (HKdispo_display <= 2) && (HKfinish==1) )
						{
						HKfinish=0;
						manual_auto_hotkey_wait=0;
						DispoSelect_submit();
					//	AutoDialWaiting = 1;
					//	AutoDial_ReSume_PauSe("VDADready");
						}
					if (HKdispo_display == 1)
						{
						if (hot_keys_active==1)
							{showDiv('HotKeyEntriesBox');}
						if (HKFSCREENup > 0)
							{hideDiv('FSCREENWrapupBox');   HKFSCREENup=0;}
						else
							{hideDiv('HotKeyActionBox');}
						}
					HKdispo_display--;
					if ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) )
						{
						document.getElementById("HKWrapupTimer").innerHTML = "<br><?php echo _QXZ("Call Wrapup:"); ?> " + HKdispo_display + " <?php echo _QXZ("seconds remaining in wrapup"); ?>";
						}
					}
				if (dead_auto_dispo_count > 0)
					{
					if ( (dead_auto_dispo_count == 3) && (dead_auto_dispo_finish==1) )
						{
						dead_auto_dispo_finish=0;
						DispoSelect_submit('1',dead_max_dispo);
						}
					dead_auto_dispo_count--;
					}

				if (all_record == 'YES')
					{
					if (all_record_count < allcalls_delay)
						{all_record_count++;}
					else
						{
						conf_send_recording('MonitorConf',session_id ,'','','');
						all_record = 'NO';
						all_record_count=0;
						}
					}


				if (active_display==1)
					{
					check_s = check_n.toString();
						if ( (check_s.match(/00$/)) || (check_n<2) ) 
							{
						//	check_for_conf_calls();
							}
					}
				if (check_n<2) 
					{
					}
				else
					{
				//	check_for_live_calls();
					check_s = check_n.toString();
					}
				if ( (blind_monitoring_now > 0) && ( (blind_monitor_warning=='ALERT') || (blind_monitor_warning=='NOTICE') ||  (blind_monitor_warning=='AUDIO') || (blind_monitor_warning=='ALERT_NOTICE') || (blind_monitor_warning=='ALERT_AUDIO') || (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') ) )
					{
					if ( (blind_monitor_warning=='NOTICE') || (blind_monitor_warning=='ALERT_NOTICE') || (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') )
						{
                        document.getElementById("blind_monitor_notice_span_contents").innerHTML = blind_monitor_message + "<br>";
						showDiv('blind_monitor_notice_span');
						}
					if (blind_monitoring_now_trigger > 0)
						{
						if ( (blind_monitor_warning=='ALERT') || (blind_monitor_warning=='ALERT_NOTICE')|| (blind_monitor_warning=='ALERT_AUDIO') || (blind_monitor_warning=='ALL') )
							{
							document.getElementById("blind_monitor_alert_span_contents").innerHTML = blind_monitor_message;
							showDiv('blind_monitor_alert_span');
							}
						if ( (blind_monitor_filename.length > 0) && ( (blind_monitor_warning=='AUDIO') || (blind_monitor_warning=='ALERT_AUDIO')|| (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') ) )
							{
							basic_originate_call(blind_monitor_filename,'NO','YES',session_id,'YES','','1','0','1');
							}
						blind_monitoring_now_trigger=0;
						}
					}
				else
					{
					hideDiv('blind_monitor_notice_span');
					document.getElementById("blind_monitor_notice_span_contents").innerHTML = '';
					hideDiv('blind_monitor_alert_span');
					}
				if (wrapup_seconds > 0)	
					{
					document.getElementById("WrapupTimer").innerHTML = (wrapup_seconds - wrapup_counter);
					wrapup_counter++;
					if ( (wrapup_counter > wrapup_seconds) && ( (document.getElementById("WrapupBox").style.visibility == 'visible') || (FSCREENup > 0) ) )
						{
						wrapup_waiting=0;
						if (FSCREENup > 0)
							{hideDiv('FSCREENWrapupBox');   FSCREENup=0;}
						else
							{hideDiv('WrapupBox');}
						if (document.vicidial_form.DispoSelectStop.checked==true)
							{
							if (auto_dial_level != '0')
								{
								AutoDialWaiting = 0;
						//		alert('wrapup pause');
								AutoDial_ReSume_PauSe("VDADpause");
						//		document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
								}
							VICIDiaL_pause_calling = 1;
							if (dispo_check_all_pause != '1')
								{
								document.vicidial_form.DispoSelectStop.checked=false;
						//		alert("unchecking PAUSE");
								}
							}
						else
							{
							if (auto_dial_level != '0')
								{
								AutoDialWaiting = 1;
						//		alert('wrapup ready');
								AutoDial_ReSume_PauSe("VDADready","NEW_ID","WRAPUP");
						//		document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_ready;
								}
							}
						}
					}
				}
			if (consult_custom_wait > 0)
				{
				if (consult_custom_wait == '1')
					{vcFormIFrame.document.form_custom_fields.submit();}
				if (consult_custom_wait >= consult_custom_delay)
					{SendManualDial('YES');}
				else
					{consult_custom_wait++;}
				}
			if (HKdispo_display < 1)
				{
				if (manual_auto_hotkey == "1")
					{
					if ( (waiting_on_dispo > 0) && (manual_auto_hotkey_wait < 10) )
						{
						manual_auto_hotkey_wait++;
					//	document.getElementById("debugbottomspan").innerHTML = "trigger next manual dial delay: " + manual_auto_hotkey_wait + "|" + waiting_on_dispo;
						}
					else
						{
						manual_auto_hotkey = 0;
						if ( (dial_method == "INBOUND_MAN") || (dial_method == "MANUAL") )
							{ManualDialNext('','','','','','0');}
						}
					}
				if (manual_auto_hotkey > 1) {manual_auto_hotkey = (manual_auto_hotkey - 1);}
				}

			// resume after updatedispo received
			if (updatedispo_resume_trigger == "1")
				{
				if (waiting_on_dispo == "0")
					{
					updatedispo_resume_trigger=0;
					agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID");
					AutoDialWaiting = 1;
					}
				else
					{
				//	document.getElementById("debugbottomspan").innerHTML = "waiting on dispo response to resume: " + waiting_on_dispo + "|" + updatedispo_resume_trigger;
					}
				}
			}
		setTimeout("all_refresh()", refresh_interval);
		}
	function all_refresh()
		{
		epoch_sec++;
		check_n++;
		even++;
		if (even > 1)
			{even=0;}
		var year= t.getYear()
		var month= t.getMonth()
			month++;
		var daym= t.getDate()
		var hours = t.getHours();
		var min = t.getMinutes();
		var sec = t.getSeconds();
		var regMSdate = new RegExp("MS_","g");
		var regUSdate = new RegExp("US_","g");
		var regEUdate = new RegExp("EU_","g");
		var regALdate = new RegExp("AL_","g");
		var regAMPMdate = new RegExp("AMPM","g");
		if (year < 1000) {year+=1900}
		if (month< 10) {month= "0" + month}
		if (daym< 10) {daym= "0" + daym}
		if (hours < 10) {hours = "0" + hours;}
		if (min < 10) {min = "0" + min;}
		if (sec < 10) {sec = "0" + sec;}
		var Tyear = (year-2000);
		filedate = year + "" + month + "" + daym + "-" + hours + "" + min + "" + sec;
		tinydate = Tyear + "" + month + "" + daym + "" + hours + "" + min + "" + sec;
		SQLdate = year + "-" + month + "-" + daym + " " + hours + ":" + min + ":" + sec;

		var status_date = '';
		var status_time = hours + ":" + min + ":" + sec;
		if (vdc_header_date_format.match(regMSdate))
			{
			status_date = year + "-" + month + "-" + daym;
			}
		if (vdc_header_date_format.match(regUSdate))
			{
			status_date = month + "/" + daym + "/" + year;
			}
		if (vdc_header_date_format.match(regEUdate))
			{
			status_date = daym + "/" + month + "/" + year;
			}
		if (vdc_header_date_format.match(regALdate))
			{
			var statusmon='';
			if (month == 1) {statusmon = "<?php echo _QXZ("JAN"); ?>";}
			if (month == 2) {statusmon = "<?php echo _QXZ("FEB"); ?>";}
			if (month == 3) {statusmon = "<?php echo _QXZ("MAR"); ?>";}
			if (month == 4) {statusmon = "<?php echo _QXZ("APR"); ?>";}
			if (month == 5) {statusmon = "<?php echo _QXZ("MAY"); ?>";}
			if (month == 6) {statusmon = "<?php echo _QXZ("JUN"); ?>";}
			if (month == 7) {statusmon = "<?php echo _QXZ("JLY"); ?>";}
			if (month == 8) {statusmon = "<?php echo _QXZ("AUG"); ?>";}
			if (month == 9) {statusmon = "<?php echo _QXZ("SEP"); ?>";}
			if (month == 10) {statusmon = "<?php echo _QXZ("OCT"); ?>";}
			if (month == 11) {statusmon = "<?php echo _QXZ("NOV"); ?>";}
			if (month == 12) {statusmon = "<?php echo _QXZ("DEC"); ?>";}

			status_date = statusmon + " " + daym;
			}
		if (vdc_header_date_format.match(regAMPMdate))
			{
			var AMPM = 'AM';
			if (hours == 12) {AMPM = 'PM';}
			if (hours == 0) {AMPM = 'AM'; hours = '12';}
			if (hours > 12) {hours = (hours - 12);   AMPM = 'PM';}
			status_time = hours + ":" + min + ":" + sec + " " + AMPM;
			}

		document.getElementById("status").innerHTML = status_date + " " + status_time  + display_message;
		if (VD_live_customer_call==1)
			{
			var customer_gmt = parseFloat(document.vicidial_form.gmt_offset_now.value);
			var AMPM = 'AM';
			var customer_gmt_diff = (customer_gmt - local_gmt);
			var UnixTimec = (UnixTime + (3600 * customer_gmt_diff));
			var UnixTimeMSc = (UnixTimec * 1000);
			c.setTime(UnixTimeMSc);
			var Cyear= c.getYear()
			var Cmon= c.getMonth()
				Cmon++;
			var Cdaym= c.getDate()
			var Chours = c.getHours();
			var Cmin = c.getMinutes();
			var Csec = c.getSeconds();
			if (Cyear < 1000) {Cyear+=1900}
			if (Cmon < 10) {Cmon= "0" + Cmon}
			if (Cdaym < 10) {Cdaym= "0" + Cdaym}
			if (Chours < 10) {Chours = "0" + Chours;}
			if ( (Cmin < 10) && (Cmin.length < 2) ) {Cmin = "0" + Cmin;}
			if ( (Csec < 10) && (Csec.length < 2) ) {Csec = "0" + Csec;}
			if (Cmin < 10) {Cmin = "0" + Cmin;}
			if (Csec < 10) {Csec = "0" + Csec;}
			VDRP_stage_seconds=0;

		var customer_date = '';
		var customer_time = Chours + ":" + Cmin + ":" + Csec;
		if (vdc_customer_date_format.match(regMSdate))
			{
			customer_date = Cyear + "-" + Cmon + "-" + Cdaym;
			}
		if (vdc_customer_date_format.match(regUSdate))
			{
			customer_date = Cmon + "/" + Cdaym + "/" + Cyear;
			}
		if (vdc_customer_date_format.match(regEUdate))
			{
			customer_date = Cdaym + "/" + Cmon + "/" + Cyear;
			}
		if (vdc_customer_date_format.match(regALdate))
			{
			var customermon='';
			if (Cmon == 1) {customermon = "<?php echo _QXZ("JAN"); ?>";}
			if (Cmon == 2) {customermon = "<?php echo _QXZ("FEB"); ?>";}
			if (Cmon == 3) {customermon = "<?php echo _QXZ("MAR"); ?>";}
			if (Cmon == 4) {customermon = "<?php echo _QXZ("APR"); ?>";}
			if (Cmon == 5) {customermon = "<?php echo _QXZ("MAY"); ?>";}
			if (Cmon == 6) {customermon = "<?php echo _QXZ("JUN"); ?>";}
			if (Cmon == 7) {customermon = "<?php echo _QXZ("JLY"); ?>";}
			if (Cmon == 8) {customermon = "<?php echo _QXZ("AUG"); ?>";}
			if (Cmon == 9) {customermon = "<?php echo _QXZ("SEP"); ?>";}
			if (Cmon == 10) {customermon = "<?php echo _QXZ("OCT"); ?>";}
			if (Cmon == 11) {customermon = "<?php echo _QXZ("NOV"); ?>";}
			if (Cmon == 12) {customermon = "<?php echo _QXZ("DEC"); ?>";}

			customer_date = customermon + " " + Cdaym + " ";
			}
		if (vdc_customer_date_format.match(regAMPMdate))
			{
			var AMPM = 'AM';
			if (Chours == 12) {AMPM = 'PM';}
			if (Chours == 0) {AMPM = 'AM'; Chours = '12';}
			if (Chours > 12) {Chours = (Chours - 12);   AMPM = 'PM';}
			customer_time = Chours + ":" + Cmin + ":" + Csec + " " + AMPM;
			}

			var customer_local_time = customer_date + " " + customer_time;
			document.getElementById("custdatetime").innerHTML = customer_local_time;
			}
		if ( (VDRP_stage=='PAUSED') && (VD_live_customer_call < 1) )
			{
			VDRP_stage_seconds++;
		//	document.getElementById("debugbottomspan").innerHTML = "PAUSED SECONDS " + VDRP_stage_seconds;

			if ( (pause_max > 0) && (VDRP_stage_seconds > pause_max) )
				{
				LogouT('TIMEOUT','');
				}
			}
		start_all_refresh();

		if (check_n==2)
			{
			hideDiv('LoadingBox');
			if (invalid_opener > 0)
				{
				refresh_interval = 7300000;
				logout_stop_timeouts = 1;
				showDiv('InvalidOpenerSpan');
				}
			}
		}
	function pause()	// Pauses the refreshing of the lists
		{active_display=2;  display_message="  - <?php echo _QXZ("ACTIVE DISPLAY PAUSED"); ?> - ";}
	function start()	// resumes the refreshing of the lists
		{active_display=1;  display_message='';}
	function faster()	// lowers by 1000 milliseconds the time until the next refresh
		{
		 if (refresh_interval>1001)
			{refresh_interval=(refresh_interval - 1000);}
		}
	function slower()	// raises by 1000 milliseconds the time until the next refresh
		{
		refresh_interval=(refresh_interval + 1000);
		}

	// functions to hide and show different DIVs
	function showDiv(divvar) 
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.visibility = 'visible';
			}
		}
	function displayDiv(divvar) 
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.display = 'block';
			}
		}	
	function hideDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.visibility = 'hidden';
			if (divvar == 'InternalChatPanel') // Clear the manager chat panel to prevent incoming messages from immediately being marked as read
				{
				document.getElementById('InternalChatIFrame').src='./agc_agent_manager_chat_interface.php?user='+user+'&pass='+orig_pass;
				}
			}
		}
		function noneDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.display = 'none';
			}
		}
	function clearDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			document.getElementById(divvar).innerHTML = '';
			if (divvar == 'DiaLLeaDPrevieW')
				{
                var buildDivHTML = " <input type=\"checkbox\" class=\"filled-in\" id=\"LeadPreview\" name=\"LeadPreview\"  value=\"0\" /><label for=\"LeadPreview\"> <?php echo _QXZ("LEAD PREVIEW"); ?></label><br>";
				document.getElementById("DiaLLeaDPrevieWHide").innerHTML = buildDivHTML;
				}
			if (divvar == 'DiaLDiaLAltPhonE')
				{
                var buildDivHTML = "<input type=\"checkbox\" class=\"filled-in\" id=\"altLeadPreview\" name=\"DiaLAltPhonE\"  value=\"0\" /><label for=\"altLeadPreview\"> <?php echo _QXZ("ALT PHONE DIAL"); ?></label><br>";
				document.getElementById("DiaLDiaLAltPhonEHide").innerHTML = buildDivHTML;
				}
			if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
				{document.vicidial_form.DiaLAltPhonE.checked=true;}
			}
		}
	function buildDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			var buildDivHTML = "";
			if (divvar == 'DiaLLeaDPrevieW')
				{
				document.getElementById("DiaLLeaDPrevieWHide").innerHTML = '';
                var buildDivHTML = " <input type=\"checkbox\" class=\"filled-in\" id=\"lead3\" name=\"LeadPreview\" size=\"1\" value=\"0\" /><label for=\"lead3\"> <?php echo _QXZ("LEAD PREVIEW"); ?></label><br>";
				document.getElementById(divvar).innerHTML = buildDivHTML;
				if (reselect_preview_dial==1)
					{document.vicidial_form.LeadPreview.checked=true}
				}
			if (divvar == 'DiaLDiaLAltPhonE')
				{
				document.getElementById("DiaLDiaLAltPhonEHide").innerHTML = '';
                var buildDivHTML = " <input type=\"checkbox\" class=\"filled-in\" id=\"lead4\" name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /><label for=\"lead4\"> <?php echo _QXZ("ALT PHONE DIAL"); ?></label><br>";
				document.getElementById(divvar).innerHTML = buildDivHTML;
				if (reselect_alt_dial==1)
					{document.vicidial_form.DiaLAltPhonE.checked=true}
				if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
					{document.vicidial_form.DiaLAltPhonE.checked=true;}
				}
			}
		}

	function conf_channels_detail(divvar) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----conf_channels_detail---" + divvar + "|";
		if (divvar == 'SHOW')
			{
			conf_channels_xtra_display = 1;
			document.getElementById("busycallsdisplay").innerHTML = "<a href=\"#\"  onclick=\"conf_channels_detail('HIDE');\"><?php echo _QXZ("Hide conference call channel information"); ?></a>";
			LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
			LMAcount=0;
			}
		else
			{
			conf_channels_xtra_display = 0;
            document.getElementById("busycallsdisplay").innerHTML = "<a href=\"#\" onclick=\"conf_channels_detail('SHOW');\"><?php echo _QXZ("Show conference call channel information"); ?></a><br><br>&nbsp;";
			document.getElementById("outboundcallsspan").innerHTML = '';
			LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
			LMAcount=0;
			}
		}

	function HotKeys(HKstate) 
		{
		if ( (HKstate == 'ON') && (HKbutton_allowed == 1) )
			{
			showDiv('HotKeyEntriesBox');
			hot_keys_active = 1;
            document.getElementById("hotkeysdisplay").innerHTML = "<a href=\"#\" onMouseOut=\"HotKeys('OFF')\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hotkeysactive.gif"); ?>\" border=\"0\" alt=\"HOT KEYS ACTIVE\" /></a>";
			}
		else
			{
			hideDiv('HotKeyEntriesBox');
			hot_keys_active = 0;
            document.getElementById("hotkeysdisplay").innerHTML = "<a href=\"#\" onMouseOver=\"HotKeys('ON')\"><img src=\"./images/<?php echo _QXZ("vdc_XB_hotkeysactive_OFF.gif"); ?>\" border=\"0\" alt=\"HOT KEYS INACTIVE\" /></a>";
			}
		}

	function ViewComments(VCommstate,VCforcehide,VCspanname,VCMclick)
		{
		if (VCMclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ViewComments---" + VCommstate + " " + VCforcehide + " " + VCspanname + "|";}
		if ( (VCommstate == 'ON') )
			{
			showDiv('ViewCommentsBox');
			if ( (qc_comment_history == 'CLICK_ALLOW_MINIMIZE') || (qc_comment_history == 'AUTO_OPEN_ALLOW_MINIMIZE') )
				{
				document.getElementById("ViewCommentsBox").style.top = '350px';
				document.getElementById("ViewCommentsShowHide").innerHTML = "<a href=\"#\" onclick=\"ViewComments('OFF','','','YES');return false;\"><?php echo _QXZ("hide comment history"); ?></a> - <a href=\"#\" onclick=\"ViewComments('OFF','OFF','','YES');return false;\"><?php echo _QXZ("close"); ?></a>";
				}
			//view_comments_active = 1;
			document.getElementById("viewcommentsdisplay").innerHTML = "<input type=\"button\" id='ViewCommentButton' onClick=\"ViewComments('OFF','','','YES')\" value=\"<?php echo _QXZ("HIDE"); ?>\" />";
			if (comments_all_tabs == 'ENABLED')
				{document.getElementById("otherviewcommentsdisplay").innerHTML = "<input type=\"button\" id='OtherViewCommentButton' onClick=\"ViewComments('OFF','','','YES')\" value=\"<?php echo _QXZ("HIDE"); ?>\" />";}
			if (VCspanname == 'dispo') 
				{document.getElementById("dispoviewcommentsdisplay").innerHTML = "<input type=\"button\" id='DispoViewCommentButton' onClick=\"ViewComments('OFF','','dispo','YES')\" value=\"<?php echo _QXZ("HIDE"); ?>\" />";}
			if (VCspanname == 'cb') 
				{document.getElementById("cbviewcommentsdisplay").innerHTML = "<input type=\"button\" id='CBViewCommentButton' onClick=\"ViewComments('OFF','','cb','YES')\" value=\"<?php echo _QXZ("HIDE"); ?>\" />";}
			}
		else
			{
			if ( (qc_comment_history == 'CLICK_ALLOW_MINIMIZE') || (qc_comment_history == 'AUTO_OPEN_ALLOW_MINIMIZE') )
				{
				document.getElementById("ViewCommentsBox").style.top = '<?php echo $CHheight ?>px';
				document.getElementById("ViewCommentsShowHide").innerHTML = "<a href=\"#\" onclick=\"ViewComments('ON','','','YES');return false;\"><?php echo _QXZ("show comment history"); ?></a>";
				if (VCforcehide == 'OFF')
					{hideDiv('ViewCommentsBox');}
				}
			else
				{hideDiv('ViewCommentsBox');}
			//view_comments_active = 0;
			document.getElementById("viewcommentsdisplay").innerHTML = "<input type=\"button\" id='ViewCommentButton' value='0' onClick=\"ViewComments('ON','','','YES')\">";
            document.vicidial_form.ViewCommentButton.value = document.vicidial_form.audit_comments_button.value;
			if (comments_all_tabs == 'ENABLED')
				{
				document.getElementById("otherviewcommentsdisplay").innerHTML = "<input type=\"button\" id='OtherViewCommentButton' value='0' onClick=\"ViewComments('ON','','','YES')\">";
	            document.vicidial_form.OtherViewCommentButton.value = document.vicidial_form.audit_comments_button.value;
				}
			if (VCspanname == 'dispo') 
				{document.getElementById("dispoviewcommentsdisplay").innerHTML = "<input type=\"button\" id='DispoViewCommentButton' onClick=\"ViewComments('ON','','dispo','YES')\" value='0' />";}
			if (VCspanname == 'cb') 
				{document.getElementById("cbviewcommentsdisplay").innerHTML = "<input type=\"button\" id='CBViewCommentButton' onClick=\"ViewComments('ON','','cb','YES')\" value='0' />";}
			}
		}

	function ShoWTransferMain(showxfervar,showoffvar,SXMclick)
		{
		if (SXMclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ShoWTransferMain---" + showxfervar + " " + showoffvar + "|";}
		if (VU_vicidial_transfers == '1')
			{
			XferAgentSelectLink();

			if (showxfervar == 'ON')
				{
				var xfer_height = <?php echo $HTheight ?>;
				if (alt_phone_dialing>0) {xfer_height = (xfer_height + 20);}
				if ( (auto_dial_level == 0) && (manual_dial_preview == 1) ) {xfer_height = (xfer_height + 20);}
				var X_xfer_height = xfer_height.toString();
				var temp_xfer_height = X_xfer_height + 'px';
				document.getElementById("TransferMain").style.top = "";
				HKbutton_allowed = 0;
				<!--showDiv('TransferMain');-->
                                $('#CallTransfer-Modal').modal('show');
                document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('OFF','YES','YES');\" class='btn btn-success'><i class='fa fa-share'></i></a>";
				if ( (quick_transfer_button_enabled > 0) && (quick_transfer_button_locked < 1) )
                    {document.getElementById("QuickXfer").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer_OFF.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" />";}
				if (custom_3way_button_transfer_enabled > 0)
                    {document.getElementById("CustomXfer").innerHTML = "<img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer_OFF.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" />";}
				}
			else
				{
				HKbutton_allowed = 1;
				hideDiv('TransferMain');
                                $('#CallTransfer-Modal').modal('hide');
				hideDiv('agentdirectlink');
				if (showoffvar == 'YES')
					{
                    document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class='btn btn-success'><i class='fa fa-share'></i></a>";

					if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
						{
                        document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
						}
					if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
						{
                        document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_quickxfer.gif"); ?>\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
						}
					if (custom_3way_button_transfer_enabled > 0)
						{
                        document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/<?php echo _QXZ("vdc_LB_customxfer.gif"); ?>\" border=\"0\" alt=\"Custom Transfer\" /></a>";
						}
					}
				}
			if (three_way_call_cid == 'AGENT_CHOOSE')
				{
				if ( (active_group_alias.length < 1) && (LIVE_default_group_alias.length > 1) && (LIVE_caller_id_number.length > 3) )
					{
					active_group_alias = LIVE_default_group_alias;
					cid_choice = LIVE_caller_id_number;
					}
                document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "<font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Group Alias:"); ?> " + active_group_alias + "</font>";
                document.getElementById("XfeRCID").innerHTML = "<a href=\"#\" onclick=\"GroupAliasSelectContent_create('1');\"><font size=\"1\" face=\"Arial,Helvetica\"><?php echo _QXZ("Click Here to Choose a Group Alias"); ?></font></a>";
				}
			else
				{
				document.getElementById("XfeRCID").innerHTML = "";
				document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "";
				}
			}
		else
			{
			if (showxfervar != 'OFF')
				{
				alert_box("<?php echo _QXZ("YOU DO NOT HAVE PERMISSIONS TO TRANSFER CALLS"); ?>");
				}
			}
		}

	function MainPanelToFront(resumevar,MPFclick)
		{
		if (MPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----MainPanelToFront---" + resumevar + "|";}
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		var CBMPheight = '<?php echo $CBheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBMPheight;
//		document.getElementById("CallbacksButtons").style.left = '300px';
		if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='0';
			var test_otcx = document.vicidial_form.other_tab_comments.value;
			if (test_otcx.length > 0)
				{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
			hideDiv('OtherTabCommentsSpan');
			}
		hideDiv('ScriptPanel');
		hideDiv('ScriptRefresH');
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		showDiv('MainPanel');
		ShoWGenDerPulldown();

		if (resumevar != 'NO')
			{
			if (alt_phone_dialing == 1)
				{
				buildDiv('DiaLDiaLAltPhonE');

				if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
					{
					document.vicidial_form.DiaLAltPhonE.checked=true;
					}
				}
			else
				{clearDiv('DiaLDiaLAltPhonE');}
			if (pause_after_next_call != 'ENABLED')
				{clearDiv('NexTCalLPausE');}
			if (auto_dial_level == 0)
				{
				if (auto_dial_alt_dial==1)
					{
					auto_dial_alt_dial=0;
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_manual_HTML;
					if (manual_dial_preview == 1)
						{buildDiv('DiaLLeaDPrevieW');}
					}
				}
			else
				{
				if (dial_method == "INBOUND_MAN")
					{
                    document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_paused.gif"); ?>\" border=\"0\" alt=\"You are paused\" /></a><br><a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/<?php echo _QXZ("vdc_LB_dialnextnumber.gif"); ?>\" border=\"0\" alt=\"Dial Next Number\" /></a>";
					if (manual_dial_preview == 1)
						{buildDiv('DiaLLeaDPrevieW');}
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
					clearDiv('DiaLLeaDPrevieW');
					}
				}
			}
		panel_bgcolor='<?php echo $MAIN_COLOR ?>';
		document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
		document.getElementById("MainStatuSSpanOLD").style.background = panel_bgcolor;
		}

	function ScriptPanelToFront(SPFclick)
		{
		if (SPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ScriptPanelToFront---|";}
		var CBSPheight = '<?php echo $QLheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBSPheight;
//		document.getElementById("CallbacksButtons").style.left = '340px';
		showDiv('ScriptPanel');
		showDiv('ScriptRefresH');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		panel_bgcolor='<?php echo $SCRIPT_COLOR ?>';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function FormPanelToFront(FPFclick)
		{
		if (FPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----FormPanelToFront---|";}
		var CBFPheight = '<?php echo $QLheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBFPheight;
//		document.getElementById("CallbacksButtons").style.left = '340px';
		showDiv('FormPanel');
		showDiv('FormRefresH');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		panel_bgcolor='<?php echo $FORM_COLOR ?>';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}
	function EmailPanelToFront(EPFclick)
		{
		if (EPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----EmailPanelToFront---|";}
		var CBFPheight = '<?php echo $QLheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBFPheight;
//		document.getElementById("CallbacksButtons").style.left = '340px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		showDiv('EmailPanel');
		showDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		panel_bgcolor='<?php echo $FORM_COLOR ?>';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}
	function CustomerChatPanelToFront(CPFclick)
		{
		if (CPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CustomerChatPanelToFront---|";}
		var CBFPheight = '<?php echo $QLheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBFPheight;
//		document.getElementById("CallbacksButtons").style.left = '360px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		showDiv('CustomerChatPanel');
		showDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		panel_bgcolor='<?php echo $FORM_COLOR ?>';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function InternalChatPanelToFront(IPFclick)
		{
		if (IPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----InternalChatPanelToFront---|";}
		var CBFPheight = '<?php echo $QLheight ?>px';
//		document.getElementById("CallbacksButtons").style.top = CBFPheight;
//		document.getElementById("CallbacksButtons").style.left = '360px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		showDiv('InternalChatPanel');
//		document.getElementById("MainTable").style.backgroundColor="";
//		document.getElementById("MaiNfooter").style.backgroundColor="";
		panel_bgcolor='<?php echo $FORM_COLOR ?>';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function HidEGenDerPulldown()
		{
//		if (hide_gender < 1)
//			{
//			var gIndex = 0;
//			var genderIndex = document.getElementById("gender_list").selectedIndex;
//			var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
//			if (genderValue == 'M') {var gIndex = 1;}
//			if (genderValue == 'F') {var gIndex = 2;}
//			document.getElementById("GENDERhideFORieALT").innerHTML = "<select size=\"1\" name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\"><?php echo _QXZ("U - Undefined"); ?></option><option value=\"M\"><?php echo _QXZ("M - Male"); ?></option><option value=\"F\"><?php echo _QXZ("F - Female"); ?></option></select>";
//			document.getElementById("GENDERhideFORie").innerHTML = '';
//			document.getElementById("gender_list").selectedIndex = gIndex;
//			}
		}

	function ShoWGenDerPulldown()
		{
//		if (hide_gender < 1)
//			{
//			var gIndex = 0;
//			var genderIndex = document.getElementById("gender_list").selectedIndex;
//			var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
//			if (genderValue == 'M') {var gIndex = 1;}
//			if (genderValue == 'F') {var gIndex = 2;}
//			document.getElementById("GENDERhideFORie").innerHTML = "<select size=\"1\" name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\"><?php echo _QXZ("U - Undefined"); ?></option><option value=\"M\"><?php echo _QXZ("M - Male"); ?></option><option value=\"F\"><?php echo _QXZ("F - Female"); ?></option></select>";
//			document.getElementById("GENDERhideFORieALT").innerHTML = '';
//			document.getElementById("gender_list").selectedIndex = gIndex;
//			}
		}


function get_custom_lead_fields(lead_id){
    $.ajax({
       type: "POST",
       url: 'utg_lead_custom_fields.php',
       data: {lead_id:lead_id},
       success: function(data)
       {
          console.log('Hi I am HERE');  
          $('.CustomFieldsDiv').html(data);
       }
     });
}


setInterval(function(){ 
        $.ajax({
                   type:'POST',
                   url: 'd_files/message.php?method=GetMessage',
                   data: {user:user}, // serializes the form's elements.
                   success: function(data)
                   {
                       var result = JSON.parse(data);
                        console.log(result);
                        if(result.status == 'success'){
                            var MessageCount = result.data.count;
                            var MessageData = result.data.data;
                            $('#MessageSectionDiv').html(MessageData);
                             $.toast({
                                    heading: 'Message Alert',
                                    text: 'You have '+MessageCount+' message.',
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'warning',
                                    hideAfter: 10000,
                                    stack: 6
                                });
                        }else{
                            var MessageCount = 0;
//                            $('#MessageSectionDiv').html('');
                        }
                        $('#AgentMessageCount').html(MessageCount);
                   }
                 });
}, 30000);


function agent_message_handle(){
$.ajax({
                   type:'POST',
                   url: 'd_files/message.php?method=SeenMessage',
                   data: {user:user}, 
                   success: function(data)
                   {
                       
                   }
                 });
}

	</script>