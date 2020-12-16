<?php
######################################################################################################
######################################################################################################
#######   static variable settings for display options
######################################################################################################
######################################################################################################

$page_width='770';
$section_width='750';
$header_font_size='3';
$subheader_font_size='2';
$subcamp_font_size='2';
$header_selected_bold='<b>';
$header_nonselected_bold='';
$users_color =		'#FFFF99';
$campaigns_color =	'#FFCC99';
$lists_color =		'#FFCCCC';
$ingroups_color =	'#CC99FF';
$remoteagent_color ='#CCFFCC';
$usergroups_color =	'#CCFFFF';
$scripts_color =	'#99FFCC';
$filters_color =	'#CCCCCC';
$admin_color =		'#FF99FF';
$reports_color =	'#99FF33';
$times_color =		'#FF33FF';
$shifts_color =		'#FF33FF';
$phones_color =		'#FF33FF';
$conference_color =	'#FF33FF';
$server_color =		'#FF33FF';
$templates_color =	'#FF33FF';
$carriers_color =	'#FF33FF';
$settings_color = 	'#FF33FF';
$label_color =		'#FF33FF';
$status_color = 	'#FF33FF';
$moh_color = 		'#FF33FF';
$vm_color = 		'#FF33FF';
$tts_color = 		'#FF33FF';
$cc_color = 		'#FF33FF';
$cts_color = 		'#FF33FF';
$subcamp_color =	'#FF9933';
$users_font =		'BLACK';
$campaigns_font =	'BLACK';
$lists_font =		'BLACK';
$ingroups_font =	'BLACK';
$remoteagent_font =	'BLACK';
$usergroups_font =	'BLACK';
$scripts_font =		'BLACK';
$filters_font =		'BLACK';
$admin_font =		'BLACK';
$qc_font =			'BLACK';
$reports_font =		'BLACK';
$times_font =		'BLACK';
$phones_font =		'BLACK';
$conference_font =	'BLACK';
$server_font =		'BLACK';
$settings_font = 	'BLACK';
$label_font = 	'BLACK';
$status_font = 	'BLACK';
$moh_font = 	'BLACK';
$vm_font = 		'BLACK';
$tts_font = 	'BLACK';
$cc_font =		'BLACK';
$cts_font = 	'BLACK';
$subcamp_font =		'BLACK';

### comment this section out for colorful section headings
$users_color =		'#E6E6E6';
$campaigns_color =	'#E6E6E6';
$lists_color =		'#E6E6E6';
$ingroups_color =	'#E6E6E6';
$remoteagent_color ='#E6E6E6';
$usergroups_color =	'#E6E6E6';
$scripts_color =	'#E6E6E6';
$filters_color =	'#E6E6E6';
$admin_color =		'#E6E6E6';
$qc_color =			'#E6E6E6';
$reports_color =	'#E6E6E6';
$times_color =		'#C6C6C6';
$shifts_color =		'#C6C6C6';
$phones_color =		'#C6C6C6';
$conference_color =	'#C6C6C6';
$server_color =		'#C6C6C6';
$templates_color =	'#C6C6C6';
$carriers_color =	'#C6C6C6';
$settings_color = 	'#C6C6C6';
$label_color =		'#C6C6C6';
$status_color = 	'#C6C6C6';
$moh_color = 		'#C6C6C6';
$vm_color = 		'#C6C6C6';
$tts_color = 		'#C6C6C6';
$cc_color = 		'#C6C6C6';
$cts_color = 		'#C6C6C6';
$sc_color = 		'#C6C6C6';
$sg_color = 		'#C6C6C6';
$subcamp_color =	'#C6C6C6';
###
if(!empty($_SESSION['Login']['user']) && !empty($_SESSION['Login']['password'])){
    $PHP_AUTH_USER= $_SESSION['Login']['user'];
    $PHP_AUTH_PW= $_SESSION['Login']['password']; 
}else{
    $PHP_AUTH_USER=$_SERVER['PHP_AUTH_USER'];
    $PHP_AUTH_PW=$_SERVER['PHP_AUTH_PW'];
}
$PHP_SELF=$_SERVER['PHP_SELF'];
$QUERY_STRING = getenv("QUERY_STRING");

######################################################################################################
######################################################################################################
#######   Form variable declaration
######################################################################################################
######################################################################################################

if (isset($_GET["DB"]))				{$DB=$_GET["DB"];}
elseif (isset($_POST["DB"]))	{$DB=$_POST["DB"];}
if (isset($_GET["active"]))	{$active=$_GET["active"];}
elseif (isset($_POST["active"]))	{$active=$_POST["active"];}
if (isset($_GET["adaptive_dl_diff_target"]))	{$adaptive_dl_diff_target=$_GET["adaptive_dl_diff_target"];}
elseif (isset($_POST["adaptive_dl_diff_target"]))	{$adaptive_dl_diff_target=$_POST["adaptive_dl_diff_target"];}
if (isset($_GET["adaptive_dropped_percentage"]))	{$adaptive_dropped_percentage=$_GET["adaptive_dropped_percentage"];}
elseif (isset($_POST["adaptive_dropped_percentage"])){$adaptive_dropped_percentage=$_POST["adaptive_dropped_percentage"];}
if (isset($_GET["adaptive_intensity"]))	{$adaptive_intensity=$_GET["adaptive_intensity"];}
elseif (isset($_POST["adaptive_intensity"]))	{$adaptive_intensity=$_POST["adaptive_intensity"];}
if (isset($_GET["adaptive_latest_server_time"]))	{$adaptive_latest_server_time=$_GET["adaptive_latest_server_time"];}
elseif (isset($_POST["adaptive_latest_server_time"])){$adaptive_latest_server_time=$_POST["adaptive_latest_server_time"];}
if (isset($_GET["adaptive_maximum_level"]))	{$adaptive_maximum_level=$_GET["adaptive_maximum_level"];}
elseif (isset($_POST["adaptive_maximum_level"]))	{$adaptive_maximum_level=$_POST["adaptive_maximum_level"];}
if (isset($_GET["SUB"]))			{$SUB=$_GET["SUB"];}
elseif (isset($_POST["SUB"]))	{$SUB=$_POST["SUB"];}
if (isset($_GET["ADD"]))			{$ADD=$_GET["ADD"];}
elseif (isset($_POST["ADD"]))	{$ADD=$_POST["ADD"];}
if (isset($_GET["admin_hangup_enabled"]))	{$admin_hangup_enabled=$_GET["admin_hangup_enabled"];}
elseif (isset($_POST["admin_hangup_enabled"]))	{$admin_hangup_enabled=$_POST["admin_hangup_enabled"];}
if (isset($_GET["admin_hijack_enabled"]))	{$admin_hijack_enabled=$_GET["admin_hijack_enabled"];}
elseif (isset($_POST["admin_hijack_enabled"]))	{$admin_hijack_enabled=$_POST["admin_hijack_enabled"];}
if (isset($_GET["admin_monitor_enabled"]))	{$admin_monitor_enabled=$_GET["admin_monitor_enabled"];}
elseif (isset($_POST["admin_monitor_enabled"]))	{$admin_monitor_enabled=$_POST["admin_monitor_enabled"];}
if (isset($_GET["AFLogging_enabled"]))	{$AFLogging_enabled=$_GET["AFLogging_enabled"];}
elseif (isset($_POST["AFLogging_enabled"]))	{$AFLogging_enabled=$_POST["AFLogging_enabled"];}
if (isset($_GET["agent_choose_ingroups"]))	{$agent_choose_ingroups=$_GET["agent_choose_ingroups"];}
elseif (isset($_POST["agent_choose_ingroups"]))	{$agent_choose_ingroups=$_POST["agent_choose_ingroups"];}
if (isset($_GET["agentcall_manual"]))	{$agentcall_manual=$_GET["agentcall_manual"];}
elseif (isset($_POST["agentcall_manual"]))	{$agentcall_manual=$_POST["agentcall_manual"];}
if (isset($_GET["agentonly_callbacks"]))	{$agentonly_callbacks=$_GET["agentonly_callbacks"];}
elseif (isset($_POST["agentonly_callbacks"]))	{$agentonly_callbacks=$_POST["agentonly_callbacks"];}
if (isset($_GET["AGI_call_logging_enabled"]))	{$AGI_call_logging_enabled=$_GET["AGI_call_logging_enabled"];}
elseif (isset($_POST["AGI_call_logging_enabled"]))	{$AGI_call_logging_enabled=$_POST["AGI_call_logging_enabled"];}
if (isset($_GET["agi_output"]))	{$agi_output=$_GET["agi_output"];}
elseif (isset($_POST["agi_output"]))	{$agi_output=$_POST["agi_output"];}
if (isset($_GET["allcalls_delay"]))	{$allcalls_delay=$_GET["allcalls_delay"];}
elseif (isset($_POST["allcalls_delay"]))	{$allcalls_delay=$_POST["allcalls_delay"];}
if (isset($_GET["allow_closers"]))	{$allow_closers=$_GET["allow_closers"];}
elseif (isset($_POST["allow_closers"]))	{$allow_closers=$_POST["allow_closers"];}
if (isset($_GET["alt_number_dialing"]))	{$alt_number_dialing=$_GET["alt_number_dialing"];}
elseif (isset($_POST["alt_number_dialing"]))	{$alt_number_dialing=$_POST["alt_number_dialing"];}
if (isset($_GET["alter_agent_interface_options"]))	{$alter_agent_interface_options=$_GET["alter_agent_interface_options"];}
elseif (isset($_POST["alter_agent_interface_options"]))	{$alter_agent_interface_options=$_POST["alter_agent_interface_options"];}
if (isset($_GET["am_message_exten"]))	{$am_message_exten=$_GET["am_message_exten"];}
elseif (isset($_POST["am_message_exten"]))	{$am_message_exten=$_POST["am_message_exten"];}
if (isset($_GET["amd_send_to_vmx"]))	{$amd_send_to_vmx=$_GET["amd_send_to_vmx"];}
elseif (isset($_POST["amd_send_to_vmx"]))	{$amd_send_to_vmx=$_POST["amd_send_to_vmx"];}
if (isset($_GET["answer_transfer_agent"]))	{$answer_transfer_agent=$_GET["answer_transfer_agent"];}
elseif (isset($_POST["answer_transfer_agent"]))	{$answer_transfer_agent=$_POST["answer_transfer_agent"];}
if (isset($_GET["ast_admin_access"]))	{$ast_admin_access=$_GET["ast_admin_access"];}
elseif (isset($_POST["ast_admin_access"]))	{$ast_admin_access=$_POST["ast_admin_access"];}
if (isset($_GET["ast_delete_phones"]))	{$ast_delete_phones=$_GET["ast_delete_phones"];}
elseif (isset($_POST["ast_delete_phones"]))	{$ast_delete_phones=$_POST["ast_delete_phones"];}
if (isset($_GET["asterisk_version"]))	{$asterisk_version=$_GET["asterisk_version"];}
elseif (isset($_POST["asterisk_version"]))	{$asterisk_version=$_POST["asterisk_version"];}
if (isset($_GET["ASTmgrSECRET"]))	{$ASTmgrSECRET=$_GET["ASTmgrSECRET"];}
elseif (isset($_POST["ASTmgrSECRET"]))	{$ASTmgrSECRET=$_POST["ASTmgrSECRET"];}
if (isset($_GET["ASTmgrUSERNAME"]))	{$ASTmgrUSERNAME=$_GET["ASTmgrUSERNAME"];}
elseif (isset($_POST["ASTmgrUSERNAME"]))	{$ASTmgrUSERNAME=$_POST["ASTmgrUSERNAME"];}
if (isset($_GET["ASTmgrUSERNAMElisten"]))	{$ASTmgrUSERNAMElisten=$_GET["ASTmgrUSERNAMElisten"];}
elseif (isset($_POST["ASTmgrUSERNAMElisten"]))	{$ASTmgrUSERNAMElisten=$_POST["ASTmgrUSERNAMElisten"];}
if (isset($_GET["ASTmgrUSERNAMEsend"]))	{$ASTmgrUSERNAMEsend=$_GET["ASTmgrUSERNAMEsend"];}
elseif (isset($_POST["ASTmgrUSERNAMEsend"]))	{$ASTmgrUSERNAMEsend=$_POST["ASTmgrUSERNAMEsend"];}
if (isset($_GET["ASTmgrUSERNAMEupdate"]))	{$ASTmgrUSERNAMEupdate=$_GET["ASTmgrUSERNAMEupdate"];}
elseif (isset($_POST["ASTmgrUSERNAMEupdate"]))	{$ASTmgrUSERNAMEupdate=$_POST["ASTmgrUSERNAMEupdate"];}
if (isset($_GET["attempt_delay"]))	{$attempt_delay=$_GET["attempt_delay"];}
elseif (isset($_POST["attempt_delay"]))	{$attempt_delay=$_POST["attempt_delay"];}
if (isset($_GET["attempt_maximum"]))	{$attempt_maximum=$_GET["attempt_maximum"];}
elseif (isset($_POST["attempt_maximum"]))	{$attempt_maximum=$_POST["attempt_maximum"];}
if (isset($_GET["auto_dial_level"]))	{$auto_dial_level=$_GET["auto_dial_level"];}
elseif (isset($_POST["auto_dial_level"]))	{$auto_dial_level=$_POST["auto_dial_level"];}
if (isset($_GET["auto_dial_next_number"]))	{$auto_dial_next_number=$_GET["auto_dial_next_number"];}
elseif (isset($_POST["auto_dial_next_number"]))	{$auto_dial_next_number=$_POST["auto_dial_next_number"];}
if (isset($_GET["available_only_ratio_tally"]))	{$available_only_ratio_tally=$_GET["available_only_ratio_tally"];}
elseif (isset($_POST["available_only_ratio_tally"])){$available_only_ratio_tally=$_POST["available_only_ratio_tally"];}
if (isset($_GET["call_out_number_group"]))	{$call_out_number_group=$_GET["call_out_number_group"];}
elseif (isset($_POST["call_out_number_group"]))	{$call_out_number_group=$_POST["call_out_number_group"];}
if (isset($_GET["call_parking_enabled"]))	{$call_parking_enabled=$_GET["call_parking_enabled"];}
elseif (isset($_POST["call_parking_enabled"]))	{$call_parking_enabled=$_POST["call_parking_enabled"];}
if (isset($_GET["call_time_comments"]))	{$call_time_comments=$_GET["call_time_comments"];}
elseif (isset($_POST["call_time_comments"]))	{$call_time_comments=$_POST["call_time_comments"];}
if (isset($_GET["call_time_id"]))	{$call_time_id=$_GET["call_time_id"];}
elseif (isset($_POST["call_time_id"]))	{$call_time_id=$_POST["call_time_id"];}
if (isset($_GET["call_time_name"]))	{$call_time_name=$_GET["call_time_name"];}
elseif (isset($_POST["call_time_name"]))	{$call_time_name=$_POST["call_time_name"];}
if (isset($_GET["CallerID_popup_enabled"]))	{$CallerID_popup_enabled=$_GET["CallerID_popup_enabled"];}
elseif (isset($_POST["CallerID_popup_enabled"]))	{$CallerID_popup_enabled=$_POST["CallerID_popup_enabled"];}
if (isset($_GET["campaign_cid"]))	{$campaign_cid=$_GET["campaign_cid"];}
elseif (isset($_POST["campaign_cid"]))	{$campaign_cid=$_POST["campaign_cid"];}
if (isset($_GET["campaign_detail"]))	{$campaign_detail=$_GET["campaign_detail"];}
elseif (isset($_POST["campaign_detail"]))	{$campaign_detail=$_POST["campaign_detail"];}
if (isset($_GET["campaign_id"]))	{$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))	{$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["campaign_name"]))	{$campaign_name=$_GET["campaign_name"];}
elseif (isset($_POST["campaign_name"]))	{$campaign_name=$_POST["campaign_name"];}
if (isset($_GET["campaign_rec_exten"]))	{$campaign_rec_exten=$_GET["campaign_rec_exten"];}
elseif (isset($_POST["campaign_rec_exten"]))	{$campaign_rec_exten=$_POST["campaign_rec_exten"];}
if (isset($_GET["campaign_rec_filename"]))	{$campaign_rec_filename=$_GET["campaign_rec_filename"];}
elseif (isset($_POST["campaign_rec_filename"]))	{$campaign_rec_filename=$_POST["campaign_rec_filename"];}
if (isset($_GET["ingroup_rec_filename"]))	{$ingroup_rec_filename=$_GET["ingroup_rec_filename"];}
elseif (isset($_POST["ingroup_rec_filename"]))	{$ingroup_rec_filename=$_POST["ingroup_rec_filename"];}
if (isset($_GET["campaign_recording"]))	{$campaign_recording=$_GET["campaign_recording"];}
elseif (isset($_POST["campaign_recording"]))	{$campaign_recording=$_POST["campaign_recording"];}
if (isset($_GET["campaign_vdad_exten"]))	{$campaign_vdad_exten=$_GET["campaign_vdad_exten"];}
elseif (isset($_POST["campaign_vdad_exten"]))	{$campaign_vdad_exten=$_POST["campaign_vdad_exten"];}
if (isset($_GET["change_agent_campaign"]))	{$change_agent_campaign=$_GET["change_agent_campaign"];}
elseif (isset($_POST["change_agent_campaign"]))	{$change_agent_campaign=$_POST["change_agent_campaign"];}
if (isset($_GET["client_browser"]))	{$client_browser=$_GET["client_browser"];}
elseif (isset($_POST["client_browser"]))	{$client_browser=$_POST["client_browser"];}
if (isset($_GET["closer_default_blended"]))	{$closer_default_blended=$_GET["closer_default_blended"];}
elseif (isset($_POST["closer_default_blended"]))	{$closer_default_blended=$_POST["closer_default_blended"];}
if (isset($_GET["company"]))	{$company=$_GET["company"];}
elseif (isset($_POST["company"]))	{$company=$_POST["company"];}
if (isset($_GET["computer_ip"]))	{$computer_ip=$_GET["computer_ip"];}
elseif (isset($_POST["computer_ip"]))	{$computer_ip=$_POST["computer_ip"];}
if (isset($_GET["conf_exten"]))	{$conf_exten=$_GET["conf_exten"];}
elseif (isset($_POST["conf_exten"]))	{$conf_exten=$_POST["conf_exten"];}
if (isset($_GET["conf_on_extension"]))	{$conf_on_extension=$_GET["conf_on_extension"];}
elseif (isset($_POST["conf_on_extension"]))	{$conf_on_extension=$_POST["conf_on_extension"];}
if (isset($_GET["conferencing_enabled"]))	{$conferencing_enabled=$_GET["conferencing_enabled"];}
elseif (isset($_POST["conferencing_enabled"]))	{$conferencing_enabled=$_POST["conferencing_enabled"];}
if (isset($_GET["CoNfIrM"]))	{$CoNfIrM=$_GET["CoNfIrM"];}
elseif (isset($_POST["CoNfIrM"]))	{$CoNfIrM=$_POST["CoNfIrM"];}
if (isset($_GET["ct_default_start"]))	{$ct_default_start=$_GET["ct_default_start"];}
elseif (isset($_POST["ct_default_start"]))	{$ct_default_start=$_POST["ct_default_start"];}
if (isset($_GET["ct_default_stop"]))	{$ct_default_stop=$_GET["ct_default_stop"];}
elseif (isset($_POST["ct_default_stop"]))	{$ct_default_stop=$_POST["ct_default_stop"];}
if (isset($_GET["ct_friday_start"]))	{$ct_friday_start=$_GET["ct_friday_start"];}
elseif (isset($_POST["ct_friday_start"]))	{$ct_friday_start=$_POST["ct_friday_start"];}
if (isset($_GET["ct_friday_stop"]))	{$ct_friday_stop=$_GET["ct_friday_stop"];}
elseif (isset($_POST["ct_friday_stop"]))	{$ct_friday_stop=$_POST["ct_friday_stop"];}
if (isset($_GET["ct_monday_start"]))	{$ct_monday_start=$_GET["ct_monday_start"];}
elseif (isset($_POST["ct_monday_start"]))	{$ct_monday_start=$_POST["ct_monday_start"];}
if (isset($_GET["ct_monday_stop"]))	{$ct_monday_stop=$_GET["ct_monday_stop"];}
elseif (isset($_POST["ct_monday_stop"]))	{$ct_monday_stop=$_POST["ct_monday_stop"];}
if (isset($_GET["ct_saturday_start"]))	{$ct_saturday_start=$_GET["ct_saturday_start"];}
elseif (isset($_POST["ct_saturday_start"]))	{$ct_saturday_start=$_POST["ct_saturday_start"];}
if (isset($_GET["ct_saturday_stop"]))	{$ct_saturday_stop=$_GET["ct_saturday_stop"];}
elseif (isset($_POST["ct_saturday_stop"]))	{$ct_saturday_stop=$_POST["ct_saturday_stop"];}
if (isset($_GET["ct_sunday_start"]))	{$ct_sunday_start=$_GET["ct_sunday_start"];}
elseif (isset($_POST["ct_sunday_start"]))	{$ct_sunday_start=$_POST["ct_sunday_start"];}
if (isset($_GET["ct_sunday_stop"]))	{$ct_sunday_stop=$_GET["ct_sunday_stop"];}
elseif (isset($_POST["ct_sunday_stop"]))	{$ct_sunday_stop=$_POST["ct_sunday_stop"];}
if (isset($_GET["ct_thursday_start"]))	{$ct_thursday_start=$_GET["ct_thursday_start"];}
elseif (isset($_POST["ct_thursday_start"]))	{$ct_thursday_start=$_POST["ct_thursday_start"];}
if (isset($_GET["ct_thursday_stop"]))	{$ct_thursday_stop=$_GET["ct_thursday_stop"];}
elseif (isset($_POST["ct_thursday_stop"]))	{$ct_thursday_stop=$_POST["ct_thursday_stop"];}
if (isset($_GET["ct_tuesday_start"]))	{$ct_tuesday_start=$_GET["ct_tuesday_start"];}
elseif (isset($_POST["ct_tuesday_start"]))	{$ct_tuesday_start=$_POST["ct_tuesday_start"];}
if (isset($_GET["ct_tuesday_stop"]))	{$ct_tuesday_stop=$_GET["ct_tuesday_stop"];}
elseif (isset($_POST["ct_tuesday_stop"]))	{$ct_tuesday_stop=$_POST["ct_tuesday_stop"];}
if (isset($_GET["ct_wednesday_start"]))	{$ct_wednesday_start=$_GET["ct_wednesday_start"];}
elseif (isset($_POST["ct_wednesday_start"]))	{$ct_wednesday_start=$_POST["ct_wednesday_start"];}
if (isset($_GET["ct_wednesday_stop"]))	{$ct_wednesday_stop=$_GET["ct_wednesday_stop"];}
elseif (isset($_POST["ct_wednesday_stop"]))	{$ct_wednesday_stop=$_POST["ct_wednesday_stop"];}
if (isset($_GET["DBX_database"]))	{$DBX_database=$_GET["DBX_database"];}
elseif (isset($_POST["DBX_database"]))	{$DBX_database=$_POST["DBX_database"];}
if (isset($_GET["DBX_pass"]))	{$DBX_pass=$_GET["DBX_pass"];}
elseif (isset($_POST["DBX_pass"]))	{$DBX_pass=$_POST["DBX_pass"];}
if (isset($_GET["DBX_port"]))	{$DBX_port=$_GET["DBX_port"];}
elseif (isset($_POST["DBX_port"]))	{$DBX_port=$_POST["DBX_port"];}
if (isset($_GET["DBX_server"]))	{$DBX_server=$_GET["DBX_server"];}
elseif (isset($_POST["DBX_server"]))	{$DBX_server=$_POST["DBX_server"];}
if (isset($_GET["DBX_user"]))	{$DBX_user=$_GET["DBX_user"];}
elseif (isset($_POST["DBX_user"]))	{$DBX_user=$_POST["DBX_user"];}
if (isset($_GET["DBY_database"]))	{$DBY_database=$_GET["DBY_database"];}
elseif (isset($_POST["DBY_database"]))	{$DBY_database=$_POST["DBY_database"];}
if (isset($_GET["DBY_pass"]))	{$DBY_pass=$_GET["DBY_pass"];}
elseif (isset($_POST["DBY_pass"]))	{$DBY_pass=$_POST["DBY_pass"];}
if (isset($_GET["DBY_port"]))	{$DBY_port=$_GET["DBY_port"];}
elseif (isset($_POST["DBY_port"]))	{$DBY_port=$_POST["DBY_port"];}
if (isset($_GET["DBY_server"]))	{$DBY_server=$_GET["DBY_server"];}
elseif (isset($_POST["DBY_server"]))	{$DBY_server=$_POST["DBY_server"];}
if (isset($_GET["DBY_user"]))	{$DBY_user=$_GET["DBY_user"];}
elseif (isset($_POST["DBY_user"]))	{$DBY_user=$_POST["DBY_user"];}
if (isset($_GET["delete_call_times"]))	{$delete_call_times=$_GET["delete_call_times"];}
elseif (isset($_POST["delete_call_times"]))	{$delete_call_times=$_POST["delete_call_times"];}
if (isset($_GET["delete_campaigns"]))	{$delete_campaigns=$_GET["delete_campaigns"];}
elseif (isset($_POST["delete_campaigns"]))	{$delete_campaigns=$_POST["delete_campaigns"];}
if (isset($_GET["delete_filters"]))	{$delete_filters=$_GET["delete_filters"];}
elseif (isset($_POST["delete_filters"]))	{$delete_filters=$_POST["delete_filters"];}
if (isset($_GET["delete_ingroups"]))	{$delete_ingroups=$_GET["delete_ingroups"];}
elseif (isset($_POST["delete_ingroups"]))	{$delete_ingroups=$_POST["delete_ingroups"];}
if (isset($_GET["delete_lists"]))	{$delete_lists=$_GET["delete_lists"];}
elseif (isset($_POST["delete_lists"]))	{$delete_lists=$_POST["delete_lists"];}
if (isset($_GET["delete_remote_agents"]))	{$delete_remote_agents=$_GET["delete_remote_agents"];}
elseif (isset($_POST["delete_remote_agents"]))	{$delete_remote_agents=$_POST["delete_remote_agents"];}
if (isset($_GET["delete_scripts"]))	{$delete_scripts=$_GET["delete_scripts"];}
elseif (isset($_POST["delete_scripts"]))	{$delete_scripts=$_POST["delete_scripts"];}
if (isset($_GET["delete_user_groups"]))	{$delete_user_groups=$_GET["delete_user_groups"];}
elseif (isset($_POST["delete_user_groups"]))	{$delete_user_groups=$_POST["delete_user_groups"];}
if (isset($_GET["delete_users"]))	{$delete_users=$_GET["delete_users"];}
elseif (isset($_POST["delete_users"]))	{$delete_users=$_POST["delete_users"];}
if (isset($_GET["dial_method"]))	{$dial_method=$_GET["dial_method"];}
elseif (isset($_POST["dial_method"]))	{$dial_method=$_POST["dial_method"];}
if (isset($_GET["dial_prefix"]))	{$dial_prefix=$_GET["dial_prefix"];}
elseif (isset($_POST["dial_prefix"]))	{$dial_prefix=$_POST["dial_prefix"];}
if (isset($_GET["dial_status_a"]))	{$dial_status_a=$_GET["dial_status_a"];}
elseif (isset($_POST["dial_status_a"]))	{$dial_status_a=$_POST["dial_status_a"];}
if (isset($_GET["dial_status_b"]))	{$dial_status_b=$_GET["dial_status_b"];}
elseif (isset($_POST["dial_status_b"]))	{$dial_status_b=$_POST["dial_status_b"];}
if (isset($_GET["dial_status_c"]))	{$dial_status_c=$_GET["dial_status_c"];}
elseif (isset($_POST["dial_status_c"]))	{$dial_status_c=$_POST["dial_status_c"];}
if (isset($_GET["dial_status_d"]))	{$dial_status_d=$_GET["dial_status_d"];}
elseif (isset($_POST["dial_status_d"]))	{$dial_status_d=$_POST["dial_status_d"];}
if (isset($_GET["dial_status_e"]))	{$dial_status_e=$_GET["dial_status_e"];}
elseif (isset($_POST["dial_status_e"]))	{$dial_status_e=$_POST["dial_status_e"];}
if (isset($_GET["dial_timeout"]))	{$dial_timeout=$_GET["dial_timeout"];}
elseif (isset($_POST["dial_timeout"]))	{$dial_timeout=$_POST["dial_timeout"];}
if (isset($_GET["dialplan_number"]))	{$dialplan_number=$_GET["dialplan_number"];}
elseif (isset($_POST["dialplan_number"]))	{$dialplan_number=$_POST["dialplan_number"];}
if (isset($_GET["drop_call_seconds"]))	{$drop_call_seconds=$_GET["drop_call_seconds"];}
elseif (isset($_POST["drop_call_seconds"]))	{$drop_call_seconds=$_POST["drop_call_seconds"];}
if (isset($_GET["drop_exten"]))	{$drop_exten=$_GET["drop_exten"];}
elseif (isset($_POST["drop_exten"]))	{$drop_exten=$_POST["drop_exten"];}
if (isset($_GET["drop_action"]))	{$drop_action=$_GET["drop_action"];}
elseif (isset($_POST["drop_action"]))	{$drop_action=$_POST["drop_action"];}
if (isset($_GET["dtmf_send_extension"]))	{$dtmf_send_extension=$_GET["dtmf_send_extension"];}
elseif (isset($_POST["dtmf_send_extension"]))	{$dtmf_send_extension=$_POST["dtmf_send_extension"];}
if (isset($_GET["enable_fast_refresh"]))	{$enable_fast_refresh=$_GET["enable_fast_refresh"];}
elseif (isset($_POST["enable_fast_refresh"]))	{$enable_fast_refresh=$_POST["enable_fast_refresh"];}
if (isset($_GET["enable_persistant_mysql"]))	{$enable_persistant_mysql=$_GET["enable_persistant_mysql"];}
elseif (isset($_POST["enable_persistant_mysql"]))	{$enable_persistant_mysql=$_POST["enable_persistant_mysql"];}
if (isset($_GET["ext_context"]))	{$ext_context=$_GET["ext_context"];}
elseif (isset($_POST["ext_context"]))	{$ext_context=$_POST["ext_context"];}
if (isset($_GET["extension"]))	{$extension=$_GET["extension"];}
elseif (isset($_POST["extension"]))	{$extension=$_POST["extension"];}
if (isset($_GET["fast_refresh_rate"]))	{$fast_refresh_rate=$_GET["fast_refresh_rate"];}
elseif (isset($_POST["fast_refresh_rate"]))	{$fast_refresh_rate=$_POST["fast_refresh_rate"];}
if (isset($_GET["force_logout"]))	{$force_logout=$_GET["force_logout"];}
elseif (isset($_POST["force_logout"]))	{$force_logout=$_POST["force_logout"];}
if (isset($_GET["fronter_display"]))	{$fronter_display=$_GET["fronter_display"];}
elseif (isset($_POST["fronter_display"]))	{$fronter_display=$_POST["fronter_display"];}
if (isset($_GET["full_name"]))	{$full_name=$_GET["full_name"];}
elseif (isset($_POST["full_name"]))	{$full_name=$_POST["full_name"];}
if (isset($_GET["fullname"]))	{$fullname=$_GET["fullname"];}
elseif (isset($_POST["fullname"]))	{$fullname=$_POST["fullname"];}
if (isset($_GET["get_call_launch"]))	{$get_call_launch=$_GET["get_call_launch"];}
elseif (isset($_POST["get_call_launch"]))	{$get_call_launch=$_POST["get_call_launch"];}
if (isset($_GET["group_color"]))	{$group_color=$_GET["group_color"];}
elseif (isset($_POST["group_color"]))	{$group_color=$_POST["group_color"];}
if (isset($_GET["group_id"]))	{$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))	{$group_id=$_POST["group_id"];}
if (isset($_GET["group_name"]))	{$group_name=$_GET["group_name"];}
elseif (isset($_POST["group_name"]))	{$group_name=$_POST["group_name"];}
if (isset($_GET["groups"]))	{$groups=$_GET["groups"];}
elseif (isset($_POST["groups"]))	{$groups=$_POST["groups"];}
if (isset($_GET["XFERgroups"]))	{$XFERgroups=$_GET["XFERgroups"];}
elseif (isset($_POST["XFERgroups"]))	{$XFERgroups=$_POST["XFERgroups"];}
if (isset($_GET["HKstatus"]))	{$HKstatus=$_GET["HKstatus"];}
elseif (isset($_POST["HKstatus"]))	{$HKstatus=$_POST["HKstatus"];}
if (isset($_GET["hopper_level"]))	{$hopper_level=$_GET["hopper_level"];}
elseif (isset($_POST["hopper_level"]))	{$hopper_level=$_POST["hopper_level"];}
if (isset($_GET["hotkey"]))	{$hotkey=$_GET["hotkey"];}
elseif (isset($_POST["hotkey"]))	{$hotkey=$_POST["hotkey"];}
if (isset($_GET["hotkeys_active"]))	{$hotkeys_active=$_GET["hotkeys_active"];}
elseif (isset($_POST["hotkeys_active"]))	{$hotkeys_active=$_POST["hotkeys_active"];}
if (isset($_GET["install_directory"]))	{$install_directory=$_GET["install_directory"];}
elseif (isset($_POST["install_directory"]))	{$install_directory=$_POST["install_directory"];}
if (isset($_GET["lead_filter_comments"]))	{$lead_filter_comments=$_GET["lead_filter_comments"];}
elseif (isset($_POST["lead_filter_comments"]))	{$lead_filter_comments=$_POST["lead_filter_comments"];}
if (isset($_GET["lead_filter_id"]))	{$lead_filter_id=$_GET["lead_filter_id"];}
elseif (isset($_POST["lead_filter_id"]))	{$lead_filter_id=$_POST["lead_filter_id"];}
if (isset($_GET["lead_filter_name"]))	{$lead_filter_name=$_GET["lead_filter_name"];}
elseif (isset($_POST["lead_filter_name"]))	{$lead_filter_name=$_POST["lead_filter_name"];}
if (isset($_GET["lead_filter_sql"]))	{$lead_filter_sql=$_GET["lead_filter_sql"];}
elseif (isset($_POST["lead_filter_sql"]))	{$lead_filter_sql=$_POST["lead_filter_sql"];}
if (isset($_GET["lead_order"]))	{$lead_order=$_GET["lead_order"];}
elseif (isset($_POST["lead_order"]))	{$lead_order=$_POST["lead_order"];}
if (isset($_GET["list_id"]))	{$list_id=$_GET["list_id"];}
elseif (isset($_POST["list_id"]))	{$list_id=$_POST["list_id"];}
if (isset($_GET["list_name"]))	{$list_name=$_GET["list_name"];}
elseif (isset($_POST["list_name"]))	{$list_name=$_POST["list_name"];}
if (isset($_GET["load_leads"]))	{$load_leads=$_GET["load_leads"];}
elseif (isset($_POST["load_leads"]))	{$load_leads=$_POST["load_leads"];}
if (isset($_GET["local_call_time"]))	{$local_call_time=$_GET["local_call_time"];}
elseif (isset($_POST["local_call_time"]))	{$local_call_time=$_POST["local_call_time"];}
if (isset($_GET["local_gmt"]))	{$local_gmt=$_GET["local_gmt"];}
elseif (isset($_POST["local_gmt"]))	{$local_gmt=$_POST["local_gmt"];}
if (isset($_GET["local_web_callerID_URL"]))	{$local_web_callerID_URL=$_GET["local_web_callerID_URL"];}
elseif (isset($_POST["local_web_callerID_URL"]))	{$local_web_callerID_URL=$_POST["local_web_callerID_URL"];}
if (isset($_GET["login"]))	{$login=$_GET["login"];}
elseif (isset($_POST["login"]))	{$login=$_POST["login"];}
if (isset($_GET["login_campaign"]))	{$login_campaign=$_GET["login_campaign"];}
elseif (isset($_POST["login_campaign"]))	{$login_campaign=$_POST["login_campaign"];}
if (isset($_GET["login_pass"]))	{$login_pass=$_GET["login_pass"];}
elseif (isset($_POST["login_pass"]))	{$login_pass=$_POST["login_pass"];}
if (isset($_GET["login_user"]))	{$login_user=$_GET["login_user"];}
elseif (isset($_POST["login_user"]))	{$login_user=$_POST["login_user"];}
if (isset($_GET["max_vicidial_trunks"]))	{$max_vicidial_trunks=$_GET["max_vicidial_trunks"];}
elseif (isset($_POST["max_vicidial_trunks"]))	{$max_vicidial_trunks=$_POST["max_vicidial_trunks"];}
if (isset($_GET["modify_call_times"]))	{$modify_call_times=$_GET["modify_call_times"];}
elseif (isset($_POST["modify_call_times"]))	{$modify_call_times=$_POST["modify_call_times"];}
if (isset($_GET["modify_leads"]))	{$modify_leads=$_GET["modify_leads"];}
elseif (isset($_POST["modify_leads"]))	{$modify_leads=$_POST["modify_leads"];}
if (isset($_GET["monitor_prefix"]))	{$monitor_prefix=$_GET["monitor_prefix"];}
elseif (isset($_POST["monitor_prefix"]))	{$monitor_prefix=$_POST["monitor_prefix"];}
if (isset($_GET["next_agent_call"]))	{$next_agent_call=$_GET["next_agent_call"];}
elseif (isset($_POST["next_agent_call"]))	{$next_agent_call=$_POST["next_agent_call"];}
if (isset($_GET["number_of_lines"]))	{$number_of_lines=$_GET["number_of_lines"];}
elseif (isset($_POST["number_of_lines"]))	{$number_of_lines=$_POST["number_of_lines"];}
if (isset($_GET["old_campaign_id"]))	{$old_campaign_id=$_GET["old_campaign_id"];}
elseif (isset($_POST["old_campaign_id"]))	{$old_campaign_id=$_POST["old_campaign_id"];}
if (isset($_GET["old_conf_exten"]))	{$old_conf_exten=$_GET["old_conf_exten"];}
elseif (isset($_POST["old_conf_exten"]))	{$old_conf_exten=$_POST["old_conf_exten"];}
if (isset($_GET["old_extension"]))	{$old_extension=$_GET["old_extension"];}
elseif (isset($_POST["old_extension"]))	{$old_extension=$_POST["old_extension"];}
if (isset($_GET["old_server_id"]))	{$old_server_id=$_GET["old_server_id"];}
elseif (isset($_POST["old_server_id"]))	{$old_server_id=$_POST["old_server_id"];}
if (isset($_GET["old_server_ip"]))	{$old_server_ip=$_GET["old_server_ip"];}
elseif (isset($_POST["old_server_ip"]))	{$old_server_ip=$_POST["old_server_ip"];}
if (isset($_GET["OLDuser_group"]))	{$OLDuser_group=$_GET["OLDuser_group"];}
elseif (isset($_POST["OLDuser_group"]))	{$OLDuser_group=$_POST["OLDuser_group"];}
if (isset($_GET["omit_phone_code"]))	{$omit_phone_code=$_GET["omit_phone_code"];}
elseif (isset($_POST["omit_phone_code"]))	{$omit_phone_code=$_POST["omit_phone_code"];}
if (isset($_GET["outbound_cid"]))	{$outbound_cid=$_GET["outbound_cid"];}
elseif (isset($_POST["outbound_cid"]))	{$outbound_cid=$_POST["outbound_cid"];}
if (isset($_GET["park_ext"]))	{$park_ext=$_GET["park_ext"];}
elseif (isset($_POST["park_ext"]))	{$park_ext=$_POST["park_ext"];}
if (isset($_GET["park_file_name"]))	{$park_file_name=$_GET["park_file_name"];}
elseif (isset($_POST["park_file_name"]))	{$park_file_name=$_POST["park_file_name"];}
if (isset($_GET["park_on_extension"]))	{$park_on_extension=$_GET["park_on_extension"];}
elseif (isset($_POST["park_on_extension"]))	{$park_on_extension=$_POST["park_on_extension"];}
if (isset($_GET["pass"]))	{$pass=$_GET["pass"];}
elseif (isset($_POST["pass"]))	{$pass=$_POST["pass"];}
if (isset($_GET["phone_ip"]))	{$phone_ip=$_GET["phone_ip"];}
elseif (isset($_POST["phone_ip"]))	{$phone_ip=$_POST["phone_ip"];}
if (isset($_GET["phone_login"]))	{$phone_login=$_GET["phone_login"];}
elseif (isset($_POST["phone_login"]))	{$phone_login=$_POST["phone_login"];}
if (isset($_GET["phone_number"]))	{$phone_number=$_GET["phone_number"];}
elseif (isset($_POST["phone_number"]))	{$phone_number=$_POST["phone_number"];}
if (isset($_GET["phone_pass"]))	{$phone_pass=$_GET["phone_pass"];}
elseif (isset($_POST["phone_pass"]))	{$phone_pass=$_POST["phone_pass"];}
if (isset($_GET["phone_type"]))	{$phone_type=$_GET["phone_type"];}
elseif (isset($_POST["phone_type"]))	{$phone_type=$_POST["phone_type"];}
if (isset($_GET["picture"]))	{$picture=$_GET["picture"];}
elseif (isset($_POST["picture"]))	{$picture=$_POST["picture"];}
if (isset($_GET["protocol"]))	{$protocol=$_GET["protocol"];}
elseif (isset($_POST["protocol"]))	{$protocol=$_POST["protocol"];}
if (isset($_GET["QUEUE_ACTION_enabled"]))	{$QUEUE_ACTION_enabled=$_GET["QUEUE_ACTION_enabled"];}
elseif (isset($_POST["QUEUE_ACTION_enabled"]))	{$QUEUE_ACTION_enabled=$_POST["QUEUE_ACTION_enabled"];}
if (isset($_GET["recording_exten"]))	{$recording_exten=$_GET["recording_exten"];}
elseif (isset($_POST["recording_exten"]))	{$recording_exten=$_POST["recording_exten"];}
if (isset($_GET["remote_agent_id"]))	{$remote_agent_id=$_GET["remote_agent_id"];}
elseif (isset($_POST["remote_agent_id"]))	{$remote_agent_id=$_POST["remote_agent_id"];}
if (isset($_GET["reset_hopper"]))	{$reset_hopper=$_GET["reset_hopper"];}
elseif (isset($_POST["reset_hopper"]))	{$reset_hopper=$_POST["reset_hopper"];}
if (isset($_GET["reset_list"]))	{$reset_list=$_GET["reset_list"];}
elseif (isset($_POST["reset_list"]))	{$reset_list=$_POST["reset_list"];}
if (isset($_GET["safe_harbor_exten"]))	{$safe_harbor_exten=$_GET["safe_harbor_exten"];}
elseif (isset($_POST["safe_harbor_exten"]))	{$safe_harbor_exten=$_POST["safe_harbor_exten"];}
if (isset($_GET["scheduled_callbacks"]))	{$scheduled_callbacks=$_GET["scheduled_callbacks"];}
elseif (isset($_POST["scheduled_callbacks"]))	{$scheduled_callbacks=$_POST["scheduled_callbacks"];}
if (isset($_GET["script_comments"]))	{$script_comments=$_GET["script_comments"];}
elseif (isset($_POST["script_comments"]))	{$script_comments=$_POST["script_comments"];}
if (isset($_GET["script_id"]))	{$script_id=$_GET["script_id"];}
elseif (isset($_POST["script_id"]))	{$script_id=$_POST["script_id"];}
if (isset($_GET["script_name"]))	{$script_name=$_GET["script_name"];}
elseif (isset($_POST["script_name"]))	{$script_name=$_POST["script_name"];}
if (isset($_GET["script_text"]))	{$script_text=$_GET["script_text"];}
elseif (isset($_POST["script_text"]))	{$script_text=$_POST["script_text"];}
if (isset($_GET["selectable"]))	{$selectable=$_GET["selectable"];}
elseif (isset($_POST["selectable"]))	{$selectable=$_POST["selectable"];}
if (isset($_GET["server_description"]))	{$server_description=$_GET["server_description"];}
elseif (isset($_POST["server_description"]))	{$server_description=$_POST["server_description"];}
if (isset($_GET["server_id"]))	{$server_id=$_GET["server_id"];}
elseif (isset($_POST["server_id"]))	{$server_id=$_POST["server_id"];}
if (isset($_GET["server_ip"]))	{$server_ip=$_GET["server_ip"];}
elseif (isset($_POST["server_ip"]))	{$server_ip=$_POST["server_ip"];}
if (isset($_GET["stage"]))	{$stage=$_GET["stage"];}
elseif (isset($_POST["stage"]))	{$stage=$_POST["stage"];}
if (isset($_GET["state_call_time_state"]))	{$state_call_time_state=$_GET["state_call_time_state"];}
elseif (isset($_POST["state_call_time_state"]))	{$state_call_time_state=$_POST["state_call_time_state"];}
if (isset($_GET["state_rule"]))	{$state_rule=$_GET["state_rule"];}
elseif (isset($_POST["state_rule"]))	{$state_rule=$_POST["state_rule"];}
if (isset($_GET["status"]))	{$status=$_GET["status"];}
elseif (isset($_POST["status"]))	{$status=$_POST["status"];}
if (isset($_GET["status_id"]))	{$status_id=$_GET["status_id"];}
elseif (isset($_POST["status_id"]))	{$status_id=$_POST["status_id"];}
if (isset($_GET["status_name"]))	{$status_name=$_GET["status_name"];}
elseif (isset($_POST["status_name"]))	{$status_name=$_POST["status_name"];}
if (isset($_GET["submit"]))	{$submit=$_GET["submit"];}
elseif (isset($_POST["submit"]))	{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))	{$SUBMIT=$_GET["SUBMIT"];}
elseif (isset($_POST["SUBMIT"]))	{$SUBMIT=$_POST["SUBMIT"];}
if (isset($_GET["sys_perf_log"]))	{$sys_perf_log=$_GET["sys_perf_log"];}
elseif (isset($_POST["sys_perf_log"]))	{$sys_perf_log=$_POST["sys_perf_log"];}
if (isset($_GET["telnet_host"]))	{$telnet_host=$_GET["telnet_host"];}
elseif (isset($_POST["telnet_host"]))	{$telnet_host=$_POST["telnet_host"];}
if (isset($_GET["telnet_port"]))	{$telnet_port=$_GET["telnet_port"];}
elseif (isset($_POST["telnet_port"]))	{$telnet_port=$_POST["telnet_port"];}
if (isset($_GET["updater_check_enabled"]))	{$updater_check_enabled=$_GET["updater_check_enabled"];}
elseif (isset($_POST["updater_check_enabled"]))	{$updater_check_enabled=$_POST["updater_check_enabled"];}
if (isset($_GET["use_internal_dnc"]))	{$use_internal_dnc=$_GET["use_internal_dnc"];}
elseif (isset($_POST["use_internal_dnc"]))	{$use_internal_dnc=$_POST["use_internal_dnc"];}
if (isset($_GET["use_campaign_dnc"]))	{$use_campaign_dnc=$_GET["use_campaign_dnc"];}
elseif (isset($_POST["use_campaign_dnc"]))	{$use_campaign_dnc=$_POST["use_campaign_dnc"];}
if (isset($_GET["user"]))	{$user=$_GET["user"];}
elseif (isset($_POST["user"]))	{$user=$_POST["user"];}
if (isset($_GET["user_group"]))	{$user_group=$_GET["user_group"];}
elseif (isset($_POST["user_group"]))	{$user_group=$_POST["user_group"];}
if (isset($_GET["user_level"]))	{$user_level=$_GET["user_level"];}
elseif (isset($_POST["user_level"]))	{$user_level=$_POST["user_level"];}
if (isset($_GET["user_start"]))	{$user_start=$_GET["user_start"];}
elseif (isset($_POST["user_start"]))	{$user_start=$_POST["user_start"];}
if (isset($_GET["user_switching_enabled"]))	{$user_switching_enabled=$_GET["user_switching_enabled"];}
elseif (isset($_POST["user_switching_enabled"]))	{$user_switching_enabled=$_POST["user_switching_enabled"];}
if (isset($_GET["vd_server_logs"]))	{$vd_server_logs=$_GET["vd_server_logs"];}
elseif (isset($_POST["vd_server_logs"]))	{$vd_server_logs=$_POST["vd_server_logs"];}
if (isset($_GET["VDstop_rec_after_each_call"]))	{$VDstop_rec_after_each_call=$_GET["VDstop_rec_after_each_call"];}
elseif (isset($_POST["VDstop_rec_after_each_call"]))	{$VDstop_rec_after_each_call=$_POST["VDstop_rec_after_each_call"];}
if (isset($_GET["VICIDIAL_park_on_extension"]))	{$VICIDIAL_park_on_extension=$_GET["VICIDIAL_park_on_extension"];}
elseif (isset($_POST["VICIDIAL_park_on_extension"]))	{$VICIDIAL_park_on_extension=$_POST["VICIDIAL_park_on_extension"];}
if (isset($_GET["VICIDIAL_park_on_filename"]))	{$VICIDIAL_park_on_filename=$_GET["VICIDIAL_park_on_filename"];}
elseif (isset($_POST["VICIDIAL_park_on_filename"]))	{$VICIDIAL_park_on_filename=$_POST["VICIDIAL_park_on_filename"];}
if (isset($_GET["vicidial_recording"]))	{$vicidial_recording=$_GET["vicidial_recording"];}
elseif (isset($_POST["vicidial_recording"]))	{$vicidial_recording=$_POST["vicidial_recording"];}
if (isset($_GET["vicidial_transfers"]))	{$vicidial_transfers=$_GET["vicidial_transfers"];}
elseif (isset($_POST["vicidial_transfers"]))	{$vicidial_transfers=$_POST["vicidial_transfers"];}
if (isset($_GET["VICIDIAL_web_URL"]))	{$VICIDIAL_web_URL=$_GET["VICIDIAL_web_URL"];}
elseif (isset($_POST["VICIDIAL_web_URL"]))	{$VICIDIAL_web_URL=$_POST["VICIDIAL_web_URL"];}
if (isset($_GET["voicemail_button_enabled"]))	{$voicemail_button_enabled=$_GET["voicemail_button_enabled"];}
elseif (isset($_POST["voicemail_button_enabled"]))	{$voicemail_button_enabled=$_POST["voicemail_button_enabled"];}
if (isset($_GET["voicemail_dump_exten"]))	{$voicemail_dump_exten=$_GET["voicemail_dump_exten"];}
elseif (isset($_POST["voicemail_dump_exten"]))	{$voicemail_dump_exten=$_POST["voicemail_dump_exten"];}
if (isset($_GET["voicemail_ext"]))	{$voicemail_ext=$_GET["voicemail_ext"];}
elseif (isset($_POST["voicemail_ext"]))	{$voicemail_ext=$_POST["voicemail_ext"];}
if (isset($_GET["voicemail_exten"]))	{$voicemail_exten=$_GET["voicemail_exten"];}
elseif (isset($_POST["voicemail_exten"]))	{$voicemail_exten=$_POST["voicemail_exten"];}
if (isset($_GET["voicemail_id"]))	{$voicemail_id=$_GET["voicemail_id"];}
elseif (isset($_POST["voicemail_id"]))	{$voicemail_id=$_POST["voicemail_id"];}
if (isset($_GET["web_form_address"]))	{$web_form_address=$_GET["web_form_address"];}
elseif (isset($_POST["web_form_address"]))	{$web_form_address=$_POST["web_form_address"];}
if (isset($_GET["wrapup_message"]))	{$wrapup_message=$_GET["wrapup_message"];}
elseif (isset($_POST["wrapup_message"]))	{$wrapup_message=$_POST["wrapup_message"];}
if (isset($_GET["wrapup_seconds"]))	{$wrapup_seconds=$_GET["wrapup_seconds"];}
elseif (isset($_POST["wrapup_seconds"]))	{$wrapup_seconds=$_POST["wrapup_seconds"];}
if (isset($_GET["xferconf_a_dtmf"]))	{$xferconf_a_dtmf=$_GET["xferconf_a_dtmf"];}
elseif (isset($_POST["xferconf_a_dtmf"]))	{$xferconf_a_dtmf=$_POST["xferconf_a_dtmf"];}
if (isset($_GET["xferconf_a_number"]))	{$xferconf_a_number=$_GET["xferconf_a_number"];}
elseif (isset($_POST["xferconf_a_number"]))	{$xferconf_a_number=$_POST["xferconf_a_number"];}
if (isset($_GET["xferconf_b_dtmf"]))	{$xferconf_b_dtmf=$_GET["xferconf_b_dtmf"];}
elseif (isset($_POST["xferconf_b_dtmf"]))	{$xferconf_b_dtmf=$_POST["xferconf_b_dtmf"];}
if (isset($_GET["xferconf_b_number"]))	{$xferconf_b_number=$_GET["xferconf_b_number"];}
elseif (isset($_POST["xferconf_b_number"]))	{$xferconf_b_number=$_POST["xferconf_b_number"];}
if (isset($_GET["vicidial_balance_active"]))	{$vicidial_balance_active=$_GET["vicidial_balance_active"];}
elseif (isset($_POST["vicidial_balance_active"]))	{$vicidial_balance_active=$_POST["vicidial_balance_active"];}
if (isset($_GET["balance_trunks_offlimits"]))	{$balance_trunks_offlimits=$_GET["balance_trunks_offlimits"];}
elseif (isset($_POST["balance_trunks_offlimits"]))	{$balance_trunks_offlimits=$_POST["balance_trunks_offlimits"];}
if (isset($_GET["dedicated_trunks"]))	{$dedicated_trunks=$_GET["dedicated_trunks"];}
elseif (isset($_POST["dedicated_trunks"]))	{$dedicated_trunks=$_POST["dedicated_trunks"];}
if (isset($_GET["trunk_restriction"]))	{$trunk_restriction=$_GET["trunk_restriction"];}
elseif (isset($_POST["trunk_restriction"]))	{$trunk_restriction=$_POST["trunk_restriction"];}
if (isset($_GET["campaigns"]))						{$campaigns=$_GET["campaigns"];}
elseif (isset($_POST["campaigns"]))				{$campaigns=$_POST["campaigns"];}
if (isset($_GET["dial_level_override"]))			{$dial_level_override=$_GET["dial_level_override"];}
elseif (isset($_POST["dial_level_override"]))	{$dial_level_override=$_POST["dial_level_override"];}
if (isset($_GET["concurrent_transfers"]))			{$concurrent_transfers=$_GET["concurrent_transfers"];}
elseif (isset($_POST["concurrent_transfers"]))	{$concurrent_transfers=$_POST["concurrent_transfers"];}
if (isset($_GET["auto_alt_dial"]))			{$auto_alt_dial=$_GET["auto_alt_dial"];}
elseif (isset($_POST["auto_alt_dial"]))	{$auto_alt_dial=$_POST["auto_alt_dial"];}
if (isset($_GET["modify_users"]))				{$modify_users=$_GET["modify_users"];}
elseif (isset($_POST["modify_users"]))		{$modify_users=$_POST["modify_users"];}
if (isset($_GET["modify_campaigns"]))			{$modify_campaigns=$_GET["modify_campaigns"];}
elseif (isset($_POST["modify_campaigns"]))	{$modify_campaigns=$_POST["modify_campaigns"];}
if (isset($_GET["modify_lists"]))				{$modify_lists=$_GET["modify_lists"];}
elseif (isset($_POST["modify_lists"]))		{$modify_lists=$_POST["modify_lists"];}
if (isset($_GET["modify_scripts"]))				{$modify_scripts=$_GET["modify_scripts"];}
elseif (isset($_POST["modify_scripts"]))	{$modify_scripts=$_POST["modify_scripts"];}
if (isset($_GET["modify_filters"]))				{$modify_filters=$_GET["modify_filters"];}
elseif (isset($_POST["modify_filters"]))	{$modify_filters=$_POST["modify_filters"];}
if (isset($_GET["modify_ingroups"]))			{$modify_ingroups=$_GET["modify_ingroups"];}
elseif (isset($_POST["modify_ingroups"]))	{$modify_ingroups=$_POST["modify_ingroups"];}
if (isset($_GET["modify_usergroups"]))			{$modify_usergroups=$_GET["modify_usergroups"];}
elseif (isset($_POST["modify_usergroups"]))	{$modify_usergroups=$_POST["modify_usergroups"];}
if (isset($_GET["modify_remoteagents"]))			{$modify_remoteagents=$_GET["modify_remoteagents"];}
elseif (isset($_POST["modify_remoteagents"]))	{$modify_remoteagents=$_POST["modify_remoteagents"];}
if (isset($_GET["modify_servers"]))				{$modify_servers=$_GET["modify_servers"];}
elseif (isset($_POST["modify_servers"]))	{$modify_servers=$_POST["modify_servers"];}
if (isset($_GET["view_reports"]))				{$view_reports=$_GET["view_reports"];}
elseif (isset($_POST["view_reports"]))		{$view_reports=$_POST["view_reports"];}
if (isset($_GET["agent_pause_codes_active"]))			{$agent_pause_codes_active=$_GET["agent_pause_codes_active"];}
elseif (isset($_POST["agent_pause_codes_active"]))	{$agent_pause_codes_active=$_POST["agent_pause_codes_active"];}
if (isset($_GET["pause_code"]))					{$pause_code=$_GET["pause_code"];}
elseif (isset($_POST["pause_code"]))		{$pause_code=$_POST["pause_code"];}
if (isset($_GET["pause_code_name"]))			{$pause_code_name=$_GET["pause_code_name"];}
elseif (isset($_POST["pause_code_name"]))	{$pause_code_name=$_POST["pause_code_name"];}
if (isset($_GET["billable"]))					{$billable=$_GET["billable"];}
elseif (isset($_POST["billable"]))			{$billable=$_POST["billable"];}
if (isset($_GET["campaign_description"]))			{$campaign_description=$_GET["campaign_description"];}
elseif (isset($_POST["campaign_description"]))	{$campaign_description=$_POST["campaign_description"];}
if (isset($_GET["campaign_stats_refresh"]))			{$campaign_stats_refresh=$_GET["campaign_stats_refresh"];}
elseif (isset($_POST["campaign_stats_refresh"])){$campaign_stats_refresh=$_POST["campaign_stats_refresh"];}
if (isset($_GET["list_description"]))			{$list_description=$_GET["list_description"];}
elseif (isset($_POST["list_description"]))	{$list_description=$_POST["list_description"];}
if (isset($_GET["vicidial_recording_override"]))		{$vicidial_recording_override=$_GET["vicidial_recording_override"];}	
elseif (isset($_POST["vicidial_recording_override"]))	{$vicidial_recording_override=$_POST["vicidial_recording_override"];}
if (isset($_GET["use_non_latin"]))				{$use_non_latin=$_GET["use_non_latin"];}
elseif (isset($_POST["use_non_latin"]))		{$use_non_latin=$_POST["use_non_latin"];}
if (isset($_GET["webroot_writable"]))			{$webroot_writable=$_GET["webroot_writable"];}
elseif (isset($_POST["webroot_writable"]))	{$webroot_writable=$_POST["webroot_writable"];}
if (isset($_GET["enable_queuemetrics_logging"]))	{$enable_queuemetrics_logging=$_GET["enable_queuemetrics_logging"];}
elseif (isset($_POST["enable_queuemetrics_logging"]))	{$enable_queuemetrics_logging=$_POST["enable_queuemetrics_logging"];}
if (isset($_GET["queuemetrics_server_ip"]))				{$queuemetrics_server_ip=$_GET["queuemetrics_server_ip"];}
elseif (isset($_POST["queuemetrics_server_ip"]))	{$queuemetrics_server_ip=$_POST["queuemetrics_server_ip"];}
if (isset($_GET["queuemetrics_dbname"]))			{$queuemetrics_dbname=$_GET["queuemetrics_dbname"];}
elseif (isset($_POST["queuemetrics_dbname"]))	{$queuemetrics_dbname=$_POST["queuemetrics_dbname"];}
if (isset($_GET["queuemetrics_login"]))				{$queuemetrics_login=$_GET["queuemetrics_login"];}
elseif (isset($_POST["queuemetrics_login"]))	{$queuemetrics_login=$_POST["queuemetrics_login"];}
if (isset($_GET["queuemetrics_pass"]))			{$queuemetrics_pass=$_GET["queuemetrics_pass"];}
elseif (isset($_POST["queuemetrics_pass"]))	{$queuemetrics_pass=$_POST["queuemetrics_pass"];}
if (isset($_GET["queuemetrics_url"]))			{$queuemetrics_url=$_GET["queuemetrics_url"];}
elseif (isset($_POST["queuemetrics_url"]))	{$queuemetrics_url=$_POST["queuemetrics_url"];}
if (isset($_GET["queuemetrics_log_id"]))			{$queuemetrics_log_id=$_GET["queuemetrics_log_id"];}
elseif (isset($_POST["queuemetrics_log_id"]))	{$queuemetrics_log_id=$_POST["queuemetrics_log_id"];}
if (isset($_GET["dial_status"]))				{$dial_status=$_GET["dial_status"];}
elseif (isset($_POST["dial_status"]))		{$dial_status=$_POST["dial_status"];}
if (isset($_GET["queuemetrics_eq_prepend"]))			{$queuemetrics_eq_prepend=$_GET["queuemetrics_eq_prepend"];}
elseif (isset($_POST["queuemetrics_eq_prepend"]))	{$queuemetrics_eq_prepend=$_POST["queuemetrics_eq_prepend"];}
if (isset($_GET["vicidial_agent_disable"]))				{$vicidial_agent_disable=$_GET["vicidial_agent_disable"];}
elseif (isset($_POST["vicidial_agent_disable"]))	{$vicidial_agent_disable=$_POST["vicidial_agent_disable"];}
if (isset($_GET["disable_alter_custdata"]))				{$disable_alter_custdata=$_GET["disable_alter_custdata"];}
elseif (isset($_POST["disable_alter_custdata"]))	{$disable_alter_custdata=$_POST["disable_alter_custdata"];}
if (isset($_GET["alter_custdata_override"]))			{$alter_custdata_override=$_GET["alter_custdata_override"];}
elseif (isset($_POST["alter_custdata_override"]))	{$alter_custdata_override=$_POST["alter_custdata_override"];}
if (isset($_GET["no_hopper_leads_logins"]))				{$no_hopper_leads_logins=$_GET["no_hopper_leads_logins"];}
elseif (isset($_POST["no_hopper_leads_logins"]))	{$no_hopper_leads_logins=$_POST["no_hopper_leads_logins"];}
if (isset($_GET["enable_sipsak_messages"]))				{$enable_sipsak_messages=$_GET["enable_sipsak_messages"];}
elseif (isset($_POST["enable_sipsak_messages"]))	{$enable_sipsak_messages=$_POST["enable_sipsak_messages"];}
if (isset($_GET["allow_sipsak_messages"]))				{$allow_sipsak_messages=$_GET["allow_sipsak_messages"];}
elseif (isset($_POST["allow_sipsak_messages"]))		{$allow_sipsak_messages=$_POST["allow_sipsak_messages"];}
if (isset($_GET["admin_home_url"]))				{$admin_home_url=$_GET["admin_home_url"];}
elseif (isset($_POST["admin_home_url"]))	{$admin_home_url=$_POST["admin_home_url"];}
if (isset($_GET["list_order_mix"]))				{$list_order_mix=$_GET["list_order_mix"];}
elseif (isset($_POST["list_order_mix"]))	{$list_order_mix=$_POST["list_order_mix"];}
if (isset($_GET["vcl_id"]))						{$vcl_id=$_GET["vcl_id"];}
elseif (isset($_POST["vcl_id"]))			{$vcl_id=$_POST["vcl_id"];}
if (isset($_GET["vcl_name"]))					{$vcl_name=$_GET["vcl_name"];}
elseif (isset($_POST["vcl_name"]))			{$vcl_name=$_POST["vcl_name"];}
if (isset($_GET["list_mix_container"]))				{$list_mix_container=$_GET["list_mix_container"];}
elseif (isset($_POST["list_mix_container"]))	{$list_mix_container=$_POST["list_mix_container"];}
if (isset($_GET["mix_method"]))					{$mix_method=$_GET["mix_method"];}
elseif (isset($_POST["mix_method"]))		{$mix_method=$_POST["mix_method"];}
if (isset($_GET["human_answered"]))				{$human_answered=$_GET["human_answered"];}
elseif (isset($_POST["human_answered"]))	{$human_answered=$_POST["human_answered"];}
if (isset($_GET["category"]))					{$category=$_GET["category"];}
elseif (isset($_POST["category"]))			{$category=$_POST["category"];}
if (isset($_GET["vsc_id"]))						{$vsc_id=$_GET["vsc_id"];}
elseif (isset($_POST["vsc_id"]))			{$vsc_id=$_POST["vsc_id"];}
if (isset($_GET["vsc_name"]))					{$vsc_name=$_GET["vsc_name"];}
elseif (isset($_POST["vsc_name"]))			{$vsc_name=$_POST["vsc_name"];}
if (isset($_GET["vsc_description"]))			{$vsc_description=$_GET["vsc_description"];}
elseif (isset($_POST["vsc_description"]))	{$vsc_description=$_POST["vsc_description"];}
if (isset($_GET["tovdad_display"]))				{$tovdad_display=$_GET["tovdad_display"];}
elseif (isset($_POST["tovdad_display"]))	{$tovdad_display=$_POST["tovdad_display"];}
if (isset($_GET["mix_container_item"]))				{$mix_container_item=$_GET["mix_container_item"];}
elseif (isset($_POST["mix_container_item"]))	{$mix_container_item=$_POST["mix_container_item"];}
if (isset($_GET["enable_agc_xfer_log"]))			{$enable_agc_xfer_log=$_GET["enable_agc_xfer_log"];}
elseif (isset($_POST["enable_agc_xfer_log"]))	{$enable_agc_xfer_log=$_POST["enable_agc_xfer_log"];}
if (isset($_GET["after_hours_action"]))				{$after_hours_action=$_GET["after_hours_action"];}
elseif (isset($_POST["after_hours_action"]))	{$after_hours_action=$_POST["after_hours_action"];}
if (isset($_GET["after_hours_message_filename"]))			{$after_hours_message_filename=$_GET["after_hours_message_filename"];}
elseif (isset($_POST["after_hours_message_filename"]))	{$after_hours_message_filename=$_POST["after_hours_message_filename"];}
if (isset($_GET["after_hours_exten"]))				{$after_hours_exten=$_GET["after_hours_exten"];}
elseif (isset($_POST["after_hours_exten"]))		{$after_hours_exten=$_POST["after_hours_exten"];}
if (isset($_GET["after_hours_voicemail"]))			{$after_hours_voicemail=$_GET["after_hours_voicemail"];}
elseif (isset($_POST["after_hours_voicemail"]))	{$after_hours_voicemail=$_POST["after_hours_voicemail"];}
if (isset($_GET["welcome_message_filename"]))			{$welcome_message_filename=$_GET["welcome_message_filename"];}
elseif (isset($_POST["welcome_message_filename"]))	{$welcome_message_filename=$_POST["welcome_message_filename"];}
if (isset($_GET["moh_context"]))					{$moh_context=$_GET["moh_context"];}
elseif (isset($_POST["moh_context"]))			{$moh_context=$_POST["moh_context"];}
if (isset($_GET["onhold_prompt_filename"]))				{$onhold_prompt_filename=$_GET["onhold_prompt_filename"];}
elseif (isset($_POST["onhold_prompt_filename"]))	{$onhold_prompt_filename=$_POST["onhold_prompt_filename"];}
if (isset($_GET["prompt_interval"]))				{$prompt_interval=$_GET["prompt_interval"];}
elseif (isset($_POST["prompt_interval"]))		{$prompt_interval=$_POST["prompt_interval"];}
if (isset($_GET["agent_alert_exten"]))				{$agent_alert_exten=$_GET["agent_alert_exten"];}
elseif (isset($_POST["agent_alert_exten"]))		{$agent_alert_exten=$_POST["agent_alert_exten"];}
if (isset($_GET["agent_alert_delay"]))				{$agent_alert_delay=$_GET["agent_alert_delay"];}
elseif (isset($_POST["agent_alert_delay"]))		{$agent_alert_delay=$_POST["agent_alert_delay"];}
if (isset($_GET["group_rank"]))					{$group_rank=$_GET["group_rank"];}
elseif (isset($_POST["group_rank"]))		{$group_rank=$_POST["group_rank"];}
if (isset($_GET["campaign_allow_inbound"]))				{$campaign_allow_inbound=$_GET["campaign_allow_inbound"];}
elseif (isset($_POST["campaign_allow_inbound"]))	{$campaign_allow_inbound=$_POST["campaign_allow_inbound"];}
if (isset($_GET["old_campaign_allow_inbound"]))				{$old_campaign_allow_inbound=$_GET["old_campaign_allow_inbound"];}
elseif (isset($_POST["old_campaign_allow_inbound"]))	{$old_campaign_allow_inbound=$_POST["old_campaign_allow_inbound"];}
if (isset($_GET["manual_dial_list_id"]))				{$manual_dial_list_id=$_GET["manual_dial_list_id"];}
elseif (isset($_POST["manual_dial_list_id"]))		{$manual_dial_list_id=$_POST["manual_dial_list_id"];}
if (isset($_GET["campaign_rank"]))				{$campaign_rank=$_GET["campaign_rank"];}
elseif (isset($_POST["campaign_rank"]))		{$campaign_rank=$_POST["campaign_rank"];}
if (isset($_GET["source_campaign_id"]))				{$source_campaign_id=$_GET["source_campaign_id"];}
elseif (isset($_POST["source_campaign_id"]))	{$source_campaign_id=$_POST["source_campaign_id"];}
if (isset($_GET["source_user_id"]))				{$source_user_id=$_GET["source_user_id"];}
elseif (isset($_POST["source_user_id"]))	{$source_user_id=$_POST["source_user_id"];}
if (isset($_GET["source_group_id"]))			{$source_group_id=$_GET["source_group_id"];}
elseif (isset($_POST["source_group_id"]))	{$source_group_id=$_POST["source_group_id"];}
if (isset($_GET["default_xfer_group"]))				{$default_xfer_group=$_GET["default_xfer_group"];}
elseif (isset($_POST["default_xfer_group"]))	{$default_xfer_group=$_POST["default_xfer_group"];}
if (isset($_GET["qc_enabled"]))					{$qc_enabled=$_GET["qc_enabled"];}
elseif (isset($_POST["qc_enabled"]))		{$qc_enabled=$_POST["qc_enabled"];}
if (isset($_GET["qc_user_level"]))				{$qc_user_level=$_GET["qc_user_level"];}
elseif (isset($_POST["qc_user_level"]))		{$qc_user_level=$_POST["qc_user_level"];}
if (isset($_GET["qc_pass"]))					{$qc_pass=$_GET["qc_pass"];}
elseif (isset($_POST["qc_pass"]))			{$qc_pass=$_POST["qc_pass"];}
if (isset($_GET["qc_finish"]))					{$qc_finish=$_GET["qc_finish"];}
elseif (isset($_POST["qc_finish"]))			{$qc_finish=$_POST["qc_finish"];}
if (isset($_GET["qc_commit"]))					{$qc_commit=$_GET["qc_commit"];}
elseif (isset($_POST["qc_commit"]))			{$qc_commit=$_POST["qc_commit"];}
if (isset($_GET["qc_campaigns"]))				{$qc_campaigns=$_GET["qc_campaigns"];}
elseif (isset($_POST["qc_campaigns"]))		{$qc_campaigns=$_POST["qc_campaigns"];}
if (isset($_GET["qc_groups"]))					{$qc_groups=$_GET["qc_groups"];}
elseif (isset($_POST["qc_groups"]))			{$qc_groups=$_POST["qc_groups"];}
if (isset($_GET["queue_priority"]))				{$queue_priority=$_GET["queue_priority"];}
elseif (isset($_POST["queue_priority"]))	{$queue_priority=$_POST["queue_priority"];}
if (isset($_GET["drop_inbound_group"]))				{$drop_inbound_group=$_GET["drop_inbound_group"];}
elseif (isset($_POST["drop_inbound_group"]))	{$drop_inbound_group=$_POST["drop_inbound_group"];}
if (isset($_GET["qc_statuses"]))			{$qc_statuses=$_GET["qc_statuses"];}
elseif (isset($_POST["qc_statuses"]))	{$qc_statuses=$_POST["qc_statuses"];}
if (isset($_GET["qc_lists"]))				{$qc_lists=$_GET["qc_lists"];}
elseif (isset($_POST["qc_lists"]))		{$qc_lists=$_POST["qc_lists"];}
if (isset($_GET["qc_get_record_launch"]))			{$qc_get_record_launch=$_GET["qc_get_record_launch"];}
elseif (isset($_POST["qc_get_record_launch"]))	{$qc_get_record_launch=$_POST["qc_get_record_launch"];}
if (isset($_GET["qc_show_recording"]))				{$qc_show_recording=$_GET["qc_show_recording"];}
elseif (isset($_POST["qc_show_recording"]))		{$qc_show_recording=$_POST["qc_show_recording"];}
if (isset($_GET["qc_shift_id"]))				{$qc_shift_id=$_GET["qc_shift_id"];}
elseif (isset($_POST["qc_shift_id"]))		{$qc_shift_id=$_POST["qc_shift_id"];}
if (isset($_GET["qc_web_form_address"]))				{$qc_web_form_address=$_GET["qc_web_form_address"];}
elseif (isset($_POST["qc_web_form_address"]))	{$qc_web_form_address=$_POST["qc_web_form_address"];}
if (isset($_GET["qc_script"]))						{$qc_script=$_GET["qc_script"];}
elseif (isset($_POST["qc_script"]))				{$qc_script=$_POST["qc_script"];}
if (isset($_GET["ingroup_recording_override"]))		{$ingroup_recording_override=$_GET["ingroup_recording_override"];}	
elseif (isset($_POST["ingroup_recording_override"]))	{$ingroup_recording_override=$_POST["ingroup_recording_override"];}
if (isset($_GET["code"]))				{$code=$_GET["code"];}	
elseif (isset($_POST["code"]))		{$code=$_POST["code"];}
if (isset($_GET["code_name"]))			{$code_name=$_GET["code_name"];}	
elseif (isset($_POST["code_name"]))	{$code_name=$_POST["code_name"];}
if (isset($_GET["afterhours_xfer_group"]))			{$afterhours_xfer_group=$_GET["afterhours_xfer_group"];}	
elseif (isset($_POST["afterhours_xfer_group"]))	{$afterhours_xfer_group=$_POST["afterhours_xfer_group"];}
if (isset($_GET["alias_id"]))				{$alias_id=$_GET["alias_id"];}	
elseif (isset($_POST["alias_id"]))		{$alias_id=$_POST["alias_id"];}
if (isset($_GET["alias_name"]))				{$alias_name=$_GET["alias_name"];}	
elseif (isset($_POST["alias_name"]))		{$alias_name=$_POST["alias_name"];}
if (isset($_GET["logins_list"]))				{$logins_list=$_GET["logins_list"];}	
elseif (isset($_POST["logins_list"]))		{$logins_list=$_POST["logins_list"];}
if (isset($_GET["shift_id"]))				{$shift_id=$_GET["shift_id"];}	
elseif (isset($_POST["shift_id"]))		{$shift_id=$_POST["shift_id"];}
if (isset($_GET["shift_name"]))				{$shift_name=$_GET["shift_name"];}	
elseif (isset($_POST["shift_name"]))		{$shift_name=$_POST["shift_name"];}
if (isset($_GET["shift_start_time"]))			{$shift_start_time=$_GET["shift_start_time"];}	
elseif (isset($_POST["shift_start_time"]))	{$shift_start_time=$_POST["shift_start_time"];}
if (isset($_GET["shift_length"]))				{$shift_length=$_GET["shift_length"];}	
elseif (isset($_POST["shift_length"]))		{$shift_length=$_POST["shift_length"];}
if (isset($_GET["shift_weekdays"]))				{$shift_weekdays=$_GET["shift_weekdays"];}	
elseif (isset($_POST["shift_weekdays"]))	{$shift_weekdays=$_POST["shift_weekdays"];}
if (isset($_GET["group_shifts"]))			{$group_shifts=$_GET["group_shifts"];}	
elseif (isset($_POST["group_shifts"]))	{$group_shifts=$_POST["group_shifts"];}
if (isset($_GET["timeclock_end_of_day"]))			{$timeclock_end_of_day=$_GET["timeclock_end_of_day"];}	
elseif (isset($_POST["timeclock_end_of_day"]))	{$timeclock_end_of_day=$_POST["timeclock_end_of_day"];}
if (isset($_GET["survey_first_audio_file"]))			{$survey_first_audio_file=$_GET["survey_first_audio_file"];}	
elseif (isset($_POST["survey_first_audio_file"]))	{$survey_first_audio_file=$_POST["survey_first_audio_file"];}
if (isset($_GET["survey_dtmf_digits"]))					{$survey_dtmf_digits=$_GET["survey_dtmf_digits"];}	
elseif (isset($_POST["survey_dtmf_digits"]))		{$survey_dtmf_digits=$_POST["survey_dtmf_digits"];}
if (isset($_GET["survey_ni_digit"]))					{$survey_ni_digit=$_GET["survey_ni_digit"];}	
elseif (isset($_POST["survey_ni_digit"]))			{$survey_ni_digit=$_POST["survey_ni_digit"];}
if (isset($_GET["survey_opt_in_audio_file"]))			{$survey_opt_in_audio_file=$_GET["survey_opt_in_audio_file"];}	
elseif (isset($_POST["survey_opt_in_audio_file"]))	{$survey_opt_in_audio_file=$_POST["survey_opt_in_audio_file"];}
if (isset($_GET["survey_ni_audio_file"]))				{$survey_ni_audio_file=$_GET["survey_ni_audio_file"];}	
elseif (isset($_POST["survey_ni_audio_file"]))		{$survey_ni_audio_file=$_POST["survey_ni_audio_file"];}
if (isset($_GET["survey_method"]))						{$survey_method=$_GET["survey_method"];}	
elseif (isset($_POST["survey_method"]))				{$survey_method=$_POST["survey_method"];}
if (isset($_GET["survey_no_response_action"]))			{$survey_no_response_action=$_GET["survey_no_response_action"];}	
elseif (isset($_POST["survey_no_response_action"]))	{$survey_no_response_action=$_POST["survey_no_response_action"];}
if (isset($_GET["survey_ni_status"]))					{$survey_ni_status=$_GET["survey_ni_status"];}	
elseif (isset($_POST["survey_ni_status"]))			{$survey_ni_status=$_POST["survey_ni_status"];}
if (isset($_GET["survey_response_digit_map"]))			{$survey_response_digit_map=$_GET["survey_response_digit_map"];}	
elseif (isset($_POST["survey_response_digit_map"]))	{$survey_response_digit_map=$_POST["survey_response_digit_map"];}
if (isset($_GET["survey_xfer_exten"]))					{$survey_xfer_exten=$_GET["survey_xfer_exten"];}	
elseif (isset($_POST["survey_xfer_exten"]))			{$survey_xfer_exten=$_POST["survey_xfer_exten"];}
if (isset($_GET["survey_camp_record_dir"]))				{$survey_camp_record_dir=$_GET["survey_camp_record_dir"];}	
elseif (isset($_POST["survey_camp_record_dir"]))	{$survey_camp_record_dir=$_POST["survey_camp_record_dir"];}
if (isset($_GET["add_timeclock_log"]))				{$add_timeclock_log=$_GET["add_timeclock_log"];}	
elseif (isset($_POST["add_timeclock_log"]))		{$add_timeclock_log=$_POST["add_timeclock_log"];}
if (isset($_GET["modify_timeclock_log"]))			{$modify_timeclock_log=$_GET["modify_timeclock_log"];}	
elseif (isset($_POST["modify_timeclock_log"]))	{$modify_timeclock_log=$_POST["modify_timeclock_log"];}
if (isset($_GET["delete_timeclock_log"]))			{$delete_timeclock_log=$_GET["delete_timeclock_log"];}	
elseif (isset($_POST["delete_timeclock_log"]))	{$delete_timeclock_log=$_POST["delete_timeclock_log"];}
if (isset($_GET["phone_numbers"]))					{$phone_numbers=$_GET["phone_numbers"];}	
elseif (isset($_POST["phone_numbers"]))			{$phone_numbers=$_POST["phone_numbers"];}
if (isset($_GET["vdc_header_date_format"]))					{$vdc_header_date_format=$_GET["vdc_header_date_format"];}	
elseif (isset($_POST["vdc_header_date_format"]))		{$vdc_header_date_format=$_POST["vdc_header_date_format"];}
if (isset($_GET["vdc_customer_date_format"]))				{$vdc_customer_date_format=$_GET["vdc_customer_date_format"];}	
elseif (isset($_POST["vdc_customer_date_format"]))		{$vdc_customer_date_format=$_POST["vdc_customer_date_format"];}
if (isset($_GET["vdc_header_phone_format"]))				{$vdc_header_phone_format=$_GET["vdc_header_phone_format"];}	
elseif (isset($_POST["vdc_header_phone_format"]))		{$vdc_header_phone_format=$_POST["vdc_header_phone_format"];}
if (isset($_GET["disable_alter_custphone"]))			{$disable_alter_custphone=$_GET["disable_alter_custphone"];}	
elseif (isset($_POST["disable_alter_custphone"]))	{$disable_alter_custphone=$_POST["disable_alter_custphone"];}
if (isset($_GET["alter_custphone_override"]))			{$alter_custphone_override=$_GET["alter_custphone_override"];}	
elseif (isset($_POST["alter_custphone_override"]))	{$alter_custphone_override=$_POST["alter_custphone_override"];}
if (isset($_GET["vdc_agent_api_access"]))				{$vdc_agent_api_access=$_GET["vdc_agent_api_access"];}	
elseif (isset($_POST["vdc_agent_api_access"]))		{$vdc_agent_api_access=$_POST["vdc_agent_api_access"];}
if (isset($_GET["vdc_agent_api_active"]))				{$vdc_agent_api_active=$_GET["vdc_agent_api_active"];}	
elseif (isset($_POST["vdc_agent_api_active"]))		{$vdc_agent_api_active=$_POST["vdc_agent_api_active"];}
if (isset($_GET["display_queue_count"]))				{$display_queue_count=$_GET["display_queue_count"];}	
elseif (isset($_POST["display_queue_count"]))		{$display_queue_count=$_POST["display_queue_count"];}
if (isset($_GET["sale_category"]))				{$sale_category=$_GET["sale_category"];}	
elseif (isset($_POST["sale_category"]))		{$sale_category=$_POST["sale_category"];}
if (isset($_GET["dead_lead_category"]))				{$dead_lead_category=$_GET["dead_lead_category"];}	
elseif (isset($_POST["dead_lead_category"]))	{$dead_lead_category=$_POST["dead_lead_category"];}
if (isset($_GET["manual_dial_filter"]))				{$manual_dial_filter=$_GET["manual_dial_filter"];}	
elseif (isset($_POST["manual_dial_filter"]))	{$manual_dial_filter=$_POST["manual_dial_filter"];}
if (isset($_GET["agent_clipboard_copy"]))			{$agent_clipboard_copy=$_GET["agent_clipboard_copy"];}	
elseif (isset($_POST["agent_clipboard_copy"]))	{$agent_clipboard_copy=$_POST["agent_clipboard_copy"];}
if (isset($_GET["agent_extended_alt_dial"]))			{$agent_extended_alt_dial=$_GET["agent_extended_alt_dial"];}	
elseif (isset($_POST["agent_extended_alt_dial"]))	{$agent_extended_alt_dial=$_POST["agent_extended_alt_dial"];}
if (isset($_GET["play_place_in_line"]))				{$play_place_in_line=$_GET["play_place_in_line"];}	
elseif (isset($_POST["play_place_in_line"]))	{$play_place_in_line=$_POST["play_place_in_line"];}
if (isset($_GET["play_estimate_hold_time"]))			{$play_estimate_hold_time=$_GET["play_estimate_hold_time"];}	
elseif (isset($_POST["play_estimate_hold_time"]))	{$play_estimate_hold_time=$_POST["play_estimate_hold_time"];}
if (isset($_GET["hold_time_option"]))				{$hold_time_option=$_GET["hold_time_option"];}	
elseif (isset($_POST["hold_time_option"]))		{$hold_time_option=$_POST["hold_time_option"];}
if (isset($_GET["hold_time_option_seconds"]))			{$hold_time_option_seconds=$_GET["hold_time_option_seconds"];}	
elseif (isset($_POST["hold_time_option_seconds"]))	{$hold_time_option_seconds=$_POST["hold_time_option_seconds"];}
if (isset($_GET["hold_time_option_exten"]))				{$hold_time_option_exten=$_GET["hold_time_option_exten"];}	
elseif (isset($_POST["hold_time_option_exten"]))	{$hold_time_option_exten=$_POST["hold_time_option_exten"];}
if (isset($_GET["hold_time_option_voicemail"]))				{$hold_time_option_voicemail=$_GET["hold_time_option_voicemail"];}	
elseif (isset($_POST["hold_time_option_voicemail"]))	{$hold_time_option_voicemail=$_POST["hold_time_option_voicemail"];}
if (isset($_GET["hold_time_option_xfer_group"]))			{$hold_time_option_xfer_group=$_GET["hold_time_option_xfer_group"];}	
elseif (isset($_POST["hold_time_option_xfer_group"]))	{$hold_time_option_xfer_group=$_POST["hold_time_option_xfer_group"];}
if (isset($_GET["hold_time_option_callback_filename"]))				{$hold_time_option_callback_filename=$_GET["hold_time_option_callback_filename"];}	
elseif (isset($_POST["hold_time_option_callback_filename"]))	{$hold_time_option_callback_filename=$_POST["hold_time_option_callback_filename"];}
if (isset($_GET["hold_time_option_callback_list_id"]))				{$hold_time_option_callback_list_id=$_GET["hold_time_option_callback_list_id"];}	
elseif (isset($_POST["hold_time_option_callback_list_id"]))		{$hold_time_option_callback_list_id=$_POST["hold_time_option_callback_list_id"];}
if (isset($_GET["hold_recall_xfer_group"]))				{$hold_recall_xfer_group=$_GET["hold_recall_xfer_group"];}	
elseif (isset($_POST["hold_recall_xfer_group"]))	{$hold_recall_xfer_group=$_POST["hold_recall_xfer_group"];}
if (isset($_GET["no_delay_call_route"]))			{$no_delay_call_route=$_GET["no_delay_call_route"];}	
elseif (isset($_POST["no_delay_call_route"]))	{$no_delay_call_route=$_POST["no_delay_call_route"];}
if (isset($_GET["play_welcome_message"]))			{$play_welcome_message=$_GET["play_welcome_message"];}	
elseif (isset($_POST["play_welcome_message"]))	{$play_welcome_message=$_POST["play_welcome_message"];}
if (isset($_GET["did_id"]))					{$did_id=$_GET["did_id"];}	
elseif (isset($_POST["did_id"]))		{$did_id=$_POST["did_id"];}
if (isset($_GET["source_did"]))				{$source_did=$_GET["source_did"];}	
elseif (isset($_POST["source_did"]))	{$source_did=$_POST["source_did"];}
if (isset($_GET["did_pattern"]))			{$did_pattern=$_GET["did_pattern"];}	
elseif (isset($_POST["did_pattern"]))	{$did_pattern=$_POST["did_pattern"];}
if (isset($_GET["did_description"]))			{$did_description=$_GET["did_description"];}	
elseif (isset($_POST["did_description"]))	{$did_description=$_POST["did_description"];}
if (isset($_GET["did_active"]))				{$did_active=$_GET["did_active"];}	
elseif (isset($_POST["did_active"]))	{$did_active=$_POST["did_active"];}
if (isset($_GET["did_route"]))				{$did_route=$_GET["did_route"];}	
elseif (isset($_POST["did_route"]))		{$did_route=$_POST["did_route"];}
if (isset($_GET["exten_context"]))			{$exten_context=$_GET["exten_context"];}	
elseif (isset($_POST["exten_context"]))	{$exten_context=$_POST["exten_context"];}
if (isset($_GET["phone"]))					{$phone=$_GET["phone"];}	
elseif (isset($_POST["phone"]))			{$phone=$_POST["phone"];}
if (isset($_GET["user_unavailable_action"]))			{$user_unavailable_action=$_GET["user_unavailable_action"];}	
elseif (isset($_POST["user_unavailable_action"]))	{$user_unavailable_action=$_POST["user_unavailable_action"];}
if (isset($_GET["user_route_settings_ingroup"]))			{$user_route_settings_ingroup=$_GET["user_route_settings_ingroup"];}	
elseif (isset($_POST["user_route_settings_ingroup"]))	{$user_route_settings_ingroup=$_POST["user_route_settings_ingroup"];}
if (isset($_GET["call_handle_method"]))				{$call_handle_method=$_GET["call_handle_method"];}	
elseif (isset($_POST["call_handle_method"]))	{$call_handle_method=$_POST["call_handle_method"];}
if (isset($_GET["agent_search_method"]))			{$agent_search_method=$_GET["agent_search_method"];}	
elseif (isset($_POST["agent_search_method"]))	{$agent_search_method=$_POST["agent_search_method"];}
if (isset($_GET["phone_code"]))				{$phone_code=$_GET["phone_code"];}	
elseif (isset($_POST["phone_code"]))	{$phone_code=$_POST["phone_code"];}
if (isset($_GET["email"]))					{$email=$_GET["email"];}	
elseif (isset($_POST["email"]))			{$email=$_POST["email"];}
if (isset($_GET["modify_inbound_dids"]))			{$modify_inbound_dids=$_GET["modify_inbound_dids"];}	
elseif (isset($_POST["modify_inbound_dids"]))	{$modify_inbound_dids=$_POST["modify_inbound_dids"];}
if (isset($_GET["delete_inbound_dids"]))			{$delete_inbound_dids=$_GET["delete_inbound_dids"];}	
elseif (isset($_POST["delete_inbound_dids"]))	{$delete_inbound_dids=$_POST["delete_inbound_dids"];}
if (isset($_GET["three_way_call_cid"]))				{$three_way_call_cid=$_GET["three_way_call_cid"];}	
elseif (isset($_POST["three_way_call_cid"]))	{$three_way_call_cid=$_POST["three_way_call_cid"];}
if (isset($_GET["three_way_dial_prefix"]))			{$three_way_dial_prefix=$_GET["three_way_dial_prefix"];}
elseif (isset($_POST["three_way_dial_prefix"]))	{$three_way_dial_prefix=$_POST["three_way_dial_prefix"];}
if (isset($_GET["forced_timeclock_login"]))				{$forced_timeclock_login=$_GET["forced_timeclock_login"];}
elseif (isset($_POST["forced_timeclock_login"]))	{$forced_timeclock_login=$_POST["forced_timeclock_login"];}
if (isset($_GET["answer_sec_pct_rt_stat_one"]))				{$answer_sec_pct_rt_stat_one=$_GET["answer_sec_pct_rt_stat_one"];}
elseif (isset($_POST["answer_sec_pct_rt_stat_one"]))	{$answer_sec_pct_rt_stat_one=$_POST["answer_sec_pct_rt_stat_one"];}
if (isset($_GET["answer_sec_pct_rt_stat_two"]))				{$answer_sec_pct_rt_stat_two=$_GET["answer_sec_pct_rt_stat_two"];}
elseif (isset($_POST["answer_sec_pct_rt_stat_two"]))	{$answer_sec_pct_rt_stat_two=$_POST["answer_sec_pct_rt_stat_two"];}
if (isset($_GET["list_active_change"]))				{$list_active_change=$_GET["list_active_change"];}
elseif (isset($_POST["list_active_change"]))	{$list_active_change=$_POST["list_active_change"];}
if (isset($_GET["web_form_target"]))			{$web_form_target=$_GET["web_form_target"];}
elseif (isset($_POST["web_form_target"]))	{$web_form_target=$_POST["web_form_target"];}
if (isset($_GET["alt_server_ip"]))				{$alt_server_ip=$_GET["alt_server_ip"];}
elseif (isset($_POST["alt_server_ip"]))	{$alt_server_ip=$_POST["alt_server_ip"];}
if (isset($_GET["recording_web_link"]))				{$recording_web_link=$_GET["recording_web_link"];}
elseif (isset($_POST["recording_web_link"]))	{$recording_web_link=$_POST["recording_web_link"];}
if (isset($_GET["enable_vtiger_integration"]))			{$enable_vtiger_integration=$_GET["enable_vtiger_integration"];}
elseif (isset($_POST["enable_vtiger_integration"]))	{$enable_vtiger_integration=$_POST["enable_vtiger_integration"];}
if (isset($_GET["vtiger_server_ip"]))			{$vtiger_server_ip=$_GET["vtiger_server_ip"];}
elseif (isset($_POST["vtiger_server_ip"]))	{$vtiger_server_ip=$_POST["vtiger_server_ip"];}
if (isset($_GET["vtiger_dbname"]))				{$vtiger_dbname=$_GET["vtiger_dbname"];}
elseif (isset($_POST["vtiger_dbname"]))		{$vtiger_dbname=$_POST["vtiger_dbname"];}
if (isset($_GET["vtiger_login"]))			{$vtiger_login=$_GET["vtiger_login"];}
elseif (isset($_POST["vtiger_login"]))	{$vtiger_login=$_POST["vtiger_login"];}
if (isset($_GET["vtiger_pass"]))			{$vtiger_pass=$_GET["vtiger_pass"];}
elseif (isset($_POST["vtiger_pass"]))	{$vtiger_pass=$_POST["vtiger_pass"];}
if (isset($_GET["vtiger_url"]))				{$vtiger_url=$_GET["vtiger_url"];}
elseif (isset($_POST["vtiger_url"]))	{$vtiger_url=$_POST["vtiger_url"];}
if (isset($_GET["vtiger_search_category"]))				{$vtiger_search_category=$_GET["vtiger_search_category"];}
elseif (isset($_POST["vtiger_search_category"]))	{$vtiger_search_category=$_POST["vtiger_search_category"];}
if (isset($_GET["vtiger_create_call_record"]))			{$vtiger_create_call_record=$_GET["vtiger_create_call_record"];}
elseif (isset($_POST["vtiger_create_call_record"]))	{$vtiger_create_call_record=$_POST["vtiger_create_call_record"];}
if (isset($_GET["vtiger_create_lead_record"]))			{$vtiger_create_lead_record=$_GET["vtiger_create_lead_record"];}
elseif (isset($_POST["vtiger_create_lead_record"]))	{$vtiger_create_lead_record=$_POST["vtiger_create_lead_record"];}
if (isset($_GET["vtiger_screen_login"]))			{$vtiger_screen_login=$_GET["vtiger_screen_login"];}
elseif (isset($_POST["vtiger_screen_login"]))	{$vtiger_screen_login=$_POST["vtiger_screen_login"];}
if (isset($_GET["qc_features_active"]))				{$qc_features_active=$_GET["qc_features_active"];}
elseif (isset($_POST["qc_features_active"]))	{$qc_features_active=$_POST["qc_features_active"];}
if (isset($_GET["outbound_autodial_active"]))			{$outbound_autodial_active=$_GET["outbound_autodial_active"];}
elseif (isset($_POST["outbound_autodial_active"]))	{$outbound_autodial_active=$_POST["outbound_autodial_active"];}
if (isset($_GET["cpd_amd_action"]))				{$cpd_amd_action=$_GET["cpd_amd_action"];}
elseif (isset($_POST["cpd_amd_action"]))	{$cpd_amd_action=$_POST["cpd_amd_action"];}
if (isset($_GET["download_lists"]))				{$download_lists=$_GET["download_lists"];}
elseif (isset($_POST["download_lists"]))	{$download_lists=$_POST["download_lists"];}
if (isset($_GET["active_asterisk_server"]))				{$active_asterisk_server=$_GET["active_asterisk_server"];}
elseif (isset($_POST["active_asterisk_server"]))	{$active_asterisk_server=$_POST["active_asterisk_server"];}
if (isset($_GET["generate_vicidial_conf"]))				{$generate_vicidial_conf=$_GET["generate_vicidial_conf"];}
elseif (isset($_POST["generate_vicidial_conf"]))	{$generate_vicidial_conf=$_POST["generate_vicidial_conf"];}
if (isset($_GET["rebuild_conf_files"]))				{$rebuild_conf_files=$_GET["rebuild_conf_files"];}
elseif (isset($_POST["rebuild_conf_files"]))	{$rebuild_conf_files=$_POST["rebuild_conf_files"];}
if (isset($_GET["template_id"]))			{$template_id=$_GET["template_id"];}
elseif (isset($_POST["template_id"]))	{$template_id=$_POST["template_id"];}
if (isset($_GET["conf_override"]))			{$conf_override=$_GET["conf_override"];}
elseif (isset($_POST["conf_override"]))	{$conf_override=$_POST["conf_override"];}
if (isset($_GET["template_name"]))			{$template_name=$_GET["template_name"];}
elseif (isset($_POST["template_name"]))	{$template_name=$_POST["template_name"];}
if (isset($_GET["template_contents"]))			{$template_contents=$_GET["template_contents"];}
elseif (isset($_POST["template_contents"]))	{$template_contents=$_POST["template_contents"];}
if (isset($_GET["carrier_id"]))			{$carrier_id=$_GET["carrier_id"];}
elseif (isset($_POST["carrier_id"]))	{$carrier_id=$_POST["carrier_id"];}
if (isset($_GET["carrier_name"]))			{$carrier_name=$_GET["carrier_name"];}
elseif (isset($_POST["carrier_name"]))	{$carrier_name=$_POST["carrier_name"];}
if (isset($_GET["registration_string"]))			{$registration_string=$_GET["registration_string"];}
elseif (isset($_POST["registration_string"]))	{$registration_string=$_POST["registration_string"];}
if (isset($_GET["account_entry"]))			{$account_entry=$_GET["account_entry"];}
elseif (isset($_POST["account_entry"]))	{$account_entry=$_POST["account_entry"];}
if (isset($_GET["globals_string"]))				{$globals_string=$_GET["globals_string"];}
elseif (isset($_POST["globals_string"]))	{$globals_string=$_POST["globals_string"];}
if (isset($_GET["dialplan_entry"]))				{$dialplan_entry=$_GET["dialplan_entry"];}
elseif (isset($_POST["dialplan_entry"]))	{$dialplan_entry=$_POST["dialplan_entry"];}
if (isset($_GET["group_alias_id"]))				{$group_alias_id=$_GET["group_alias_id"];}
elseif (isset($_POST["group_alias_id"]))	{$group_alias_id=$_POST["group_alias_id"];}
if (isset($_GET["group_alias_name"]))				{$group_alias_name=$_GET["group_alias_name"];}
elseif (isset($_POST["group_alias_name"]))	{$group_alias_name=$_POST["group_alias_name"];}
if (isset($_GET["caller_id_number"]))				{$caller_id_number=$_GET["caller_id_number"];}
elseif (isset($_POST["caller_id_number"]))	{$caller_id_number=$_POST["caller_id_number"];}
if (isset($_GET["caller_id_name"]))				{$caller_id_name=$_GET["caller_id_name"];}
elseif (isset($_POST["caller_id_name"]))	{$caller_id_name=$_POST["caller_id_name"];}
if (isset($_GET["agent_allow_group_alias"]))			{$agent_allow_group_alias=$_GET["agent_allow_group_alias"];}
elseif (isset($_POST["agent_allow_group_alias"]))	{$agent_allow_group_alias=$_POST["agent_allow_group_alias"];}
if (isset($_GET["default_group_alias"]))				{$default_group_alias=$_GET["default_group_alias"];}
elseif (isset($_POST["default_group_alias"]))		{$default_group_alias=$_POST["default_group_alias"];}
if (isset($_GET["outbound_calls_per_second"]))				{$outbound_calls_per_second=$_GET["outbound_calls_per_second"];}
elseif (isset($_POST["outbound_calls_per_second"]))		{$outbound_calls_per_second=$_POST["outbound_calls_per_second"];}
if (isset($_GET["shift_enforcement"]))				{$shift_enforcement=$_GET["shift_enforcement"];}
elseif (isset($_POST["shift_enforcement"]))		{$shift_enforcement=$_POST["shift_enforcement"];}
if (isset($_GET["agent_shift_enforcement_override"]))			{$agent_shift_enforcement_override=$_GET["agent_shift_enforcement_override"];}
elseif (isset($_POST["agent_shift_enforcement_override"]))	{$agent_shift_enforcement_override=$_POST["agent_shift_enforcement_override"];}
if (isset($_GET["manager_shift_enforcement_override"]))				{$manager_shift_enforcement_override=$_GET["manager_shift_enforcement_override"];}
elseif (isset($_POST["manager_shift_enforcement_override"]))	{$manager_shift_enforcement_override=$_POST["manager_shift_enforcement_override"];}
if (isset($_GET["export_reports"]))				{$export_reports=$_GET["export_reports"];}
elseif (isset($_POST["export_reports"]))	{$export_reports=$_POST["export_reports"];}
if (isset($_GET["delete_from_dnc"]))			{$delete_from_dnc=$_GET["delete_from_dnc"];}
elseif (isset($_POST["delete_from_dnc"]))	{$delete_from_dnc=$_POST["delete_from_dnc"];}
if (isset($_GET["vtiger_search_dead"]))				{$vtiger_search_dead=$_GET["vtiger_search_dead"];}
elseif (isset($_POST["vtiger_search_dead"]))	{$vtiger_search_dead=$_POST["vtiger_search_dead"];}
if (isset($_GET["vtiger_status_call"]))				{$vtiger_status_call=$_GET["vtiger_status_call"];}
elseif (isset($_POST["vtiger_status_call"]))	{$vtiger_status_call=$_POST["vtiger_status_call"];}
if (isset($_GET["sale"]))				{$sale=$_GET["sale"];}
elseif (isset($_POST["sale"]))		{$sale=$_POST["sale"];}
if (isset($_GET["dnc"]))				{$dnc=$_GET["dnc"];}
elseif (isset($_POST["dnc"]))		{$dnc=$_POST["dnc"];}
if (isset($_GET["customer_contact"]))			{$customer_contact=$_GET["customer_contact"];}
elseif (isset($_POST["customer_contact"]))	{$customer_contact=$_POST["customer_contact"];}
if (isset($_GET["not_interested"]))				{$not_interested=$_GET["not_interested"];}
elseif (isset($_POST["not_interested"]))	{$not_interested=$_POST["not_interested"];}
if (isset($_GET["unworkable"]))					{$unworkable=$_GET["unworkable"];}
elseif (isset($_POST["unworkable"]))		{$unworkable=$_POST["unworkable"];}
if (isset($_GET["user_code"]))					{$user_code=$_GET["user_code"];}
elseif (isset($_POST["user_code"]))			{$user_code=$_POST["user_code"];}
if (isset($_GET["territory"]))					{$territory=$_GET["territory"];}
elseif (isset($_POST["territory"]))			{$territory=$_POST["territory"];}
if (isset($_GET["survey_third_digit"]))				{$survey_third_digit=$_GET["survey_third_digit"];}
elseif (isset($_POST["survey_third_digit"]))	{$survey_third_digit=$_POST["survey_third_digit"];}
if (isset($_GET["survey_fourth_digit"]))			{$survey_fourth_digit=$_GET["survey_fourth_digit"];}
elseif (isset($_POST["survey_fourth_digit"]))	{$survey_fourth_digit=$_POST["survey_fourth_digit"];}
if (isset($_GET["survey_third_audio_file"]))			{$survey_third_audio_file=$_GET["survey_third_audio_file"];}
elseif (isset($_POST["survey_third_audio_file"]))	{$survey_third_audio_file=$_POST["survey_third_audio_file"];}
if (isset($_GET["survey_fourth_audio_file"]))			{$survey_fourth_audio_file=$_GET["survey_fourth_audio_file"];}
elseif (isset($_POST["survey_fourth_audio_file"]))	{$survey_fourth_audio_file=$_POST["survey_fourth_audio_file"];}
if (isset($_GET["survey_third_status"]))				{$survey_third_status=$_GET["survey_third_status"];}
elseif (isset($_POST["survey_third_status"]))		{$survey_third_status=$_POST["survey_third_status"];}
if (isset($_GET["survey_fourth_status"]))				{$survey_fourth_status=$_GET["survey_fourth_status"];}
elseif (isset($_POST["survey_fourth_status"]))		{$survey_fourth_status=$_POST["survey_fourth_status"];}
if (isset($_GET["survey_third_exten"]))					{$survey_third_exten=$_GET["survey_third_exten"];}
elseif (isset($_POST["survey_third_exten"]))		{$survey_third_exten=$_POST["survey_third_exten"];}
if (isset($_GET["survey_fourth_exten"]))				{$survey_fourth_exten=$_GET["survey_fourth_exten"];}
elseif (isset($_POST["survey_fourth_exten"]))		{$survey_fourth_exten=$_POST["survey_fourth_exten"];}
if (isset($_GET["menu_id"]))				{$menu_id=$_GET["menu_id"];}
elseif (isset($_POST["menu_id"]))		{$menu_id=$_POST["menu_id"];}
if (isset($_GET["menu_name"]))				{$menu_name=$_GET["menu_name"];}
elseif (isset($_POST["menu_name"]))		{$menu_name=$_POST["menu_name"];}
if (isset($_GET["menu_prompt"]))			{$menu_prompt=$_GET["menu_prompt"];}
elseif (isset($_POST["menu_prompt"]))	{$menu_prompt=$_POST["menu_prompt"];}
if (isset($_GET["menu_timeout"]))			{$menu_timeout=$_GET["menu_timeout"];}
elseif (isset($_POST["menu_timeout"]))	{$menu_timeout=$_POST["menu_timeout"];}
if (isset($_GET["menu_timeout_prompt"]))			{$menu_timeout_prompt=$_GET["menu_timeout_prompt"];}
elseif (isset($_POST["menu_timeout_prompt"]))	{$menu_timeout_prompt=$_POST["menu_timeout_prompt"];}
if (isset($_GET["menu_invalid_prompt"]))			{$menu_invalid_prompt=$_GET["menu_invalid_prompt"];}
elseif (isset($_POST["menu_invalid_prompt"]))	{$menu_invalid_prompt=$_POST["menu_invalid_prompt"];}
if (isset($_GET["menu_repeat"]))				{$menu_repeat=$_GET["menu_repeat"];}
elseif (isset($_POST["menu_repeat"]))		{$menu_repeat=$_POST["menu_repeat"];}
if (isset($_GET["menu_time_check"]))			{$menu_time_check=$_GET["menu_time_check"];}
elseif (isset($_POST["menu_time_check"]))	{$menu_time_check=$_POST["menu_time_check"];}
if (isset($_GET["track_in_vdac"]))				{$track_in_vdac=$_GET["track_in_vdac"];}
elseif (isset($_POST["track_in_vdac"]))		{$track_in_vdac=$_POST["track_in_vdac"];}
if (isset($_GET["source_menu"]))			{$source_menu=$_GET["source_menu"];}
elseif (isset($_POST["source_menu"]))	{$source_menu=$_POST["source_menu"];}
if (isset($_GET["agentonly_callback_campaign_lock"]))			{$agentonly_callback_campaign_lock=$_GET["agentonly_callback_campaign_lock"];}
elseif (isset($_POST["agentonly_callback_campaign_lock"]))	{$agentonly_callback_campaign_lock=$_POST["agentonly_callback_campaign_lock"];}
if (isset($_GET["sounds_central_control_active"]))			{$sounds_central_control_active=$_GET["sounds_central_control_active"];}
elseif (isset($_POST["sounds_central_control_active"]))	{$sounds_central_control_active=$_POST["sounds_central_control_active"];}
if (isset($_GET["sounds_web_server"]))				{$sounds_web_server=$_GET["sounds_web_server"];}
elseif (isset($_POST["sounds_web_server"]))		{$sounds_web_server=$_POST["sounds_web_server"];}
if (isset($_GET["sounds_web_directory"]))			{$sounds_web_directory=$_GET["sounds_web_directory"];}
elseif (isset($_POST["sounds_web_directory"]))	{$sounds_web_directory=$_POST["sounds_web_directory"];}
if (isset($_GET["sounds_update"]))			{$sounds_update=$_GET["sounds_update"];}
elseif (isset($_POST["sounds_update"]))	{$sounds_update=$_POST["sounds_update"];}
if (isset($_GET["active_voicemail_server"]))			{$active_voicemail_server=$_GET["active_voicemail_server"];}
elseif (isset($_POST["active_voicemail_server"]))	{$active_voicemail_server=$_POST["active_voicemail_server"];}
if (isset($_GET["auto_dial_limit"]))			{$auto_dial_limit=$_GET["auto_dial_limit"];}
elseif (isset($_POST["auto_dial_limit"]))	{$auto_dial_limit=$_POST["auto_dial_limit"];}
if (isset($_GET["user_territories_active"]))			{$user_territories_active=$_GET["user_territories_active"];}
elseif (isset($_POST["user_territories_active"]))	{$user_territories_active=$_POST["user_territories_active"];}
if (isset($_GET["vicidial_recording_limit"]))			{$vicidial_recording_limit=$_GET["vicidial_recording_limit"];}
elseif (isset($_POST["vicidial_recording_limit"]))	{$vicidial_recording_limit=$_POST["vicidial_recording_limit"];}
if (isset($_GET["phone_context"]))				{$phone_context=$_GET["phone_context"];}
elseif (isset($_POST["phone_context"]))		{$phone_context=$_POST["phone_context"];}
if (isset($_GET["carrier_logging_active"]))				{$carrier_logging_active=$_GET["carrier_logging_active"];}
elseif (isset($_POST["carrier_logging_active"]))	{$carrier_logging_active=$_POST["carrier_logging_active"];}
if (isset($_GET["drop_lockout_time"]))				{$drop_lockout_time=$_GET["drop_lockout_time"];}
elseif (isset($_POST["drop_lockout_time"]))		{$drop_lockout_time=$_POST["drop_lockout_time"];}
if (isset($_GET["allow_custom_dialplan"]))				{$allow_custom_dialplan=$_GET["allow_custom_dialplan"];}
elseif (isset($_POST["allow_custom_dialplan"]))		{$allow_custom_dialplan=$_POST["allow_custom_dialplan"];}
if (isset($_GET["custom_dialplan_entry"]))				{$custom_dialplan_entry=$_GET["custom_dialplan_entry"];}
elseif (isset($_POST["custom_dialplan_entry"]))		{$custom_dialplan_entry=$_POST["custom_dialplan_entry"];}
if (isset($_GET["phone_ring_timeout"]))					{$phone_ring_timeout=$_GET["phone_ring_timeout"];}
elseif (isset($_POST["phone_ring_timeout"]))		{$phone_ring_timeout=$_POST["phone_ring_timeout"];}
if (isset($_GET["conf_secret"]))					{$conf_secret=$_GET["conf_secret"];}
elseif (isset($_POST["conf_secret"]))			{$conf_secret=$_POST["conf_secret"];}
if (isset($_GET["tracking_group"]))					{$tracking_group=$_GET["tracking_group"];}
elseif (isset($_POST["tracking_group"]))		{$tracking_group=$_POST["tracking_group"];}
if (isset($_GET["no_agent_no_queue"]))				{$no_agent_no_queue=$_GET["no_agent_no_queue"];}
elseif (isset($_POST["no_agent_no_queue"]))		{$no_agent_no_queue=$_POST["no_agent_no_queue"];}
if (isset($_GET["no_agent_action"]))				{$no_agent_action=$_GET["no_agent_action"];}
elseif (isset($_POST["no_agent_action"]))		{$no_agent_action=$_POST["no_agent_action"];}
if (isset($_GET["no_agent_action_value"]))			{$no_agent_action_value=$_GET["no_agent_action_value"];}
elseif (isset($_POST["no_agent_action_value"]))	{$no_agent_action_value=$_POST["no_agent_action_value"];}
if (isset($_GET["quick_transfer_button"]))			{$quick_transfer_button=$_GET["quick_transfer_button"];}
elseif (isset($_POST["quick_transfer_button"]))	{$quick_transfer_button=$_POST["quick_transfer_button"];}
if (isset($_GET["prepopulate_transfer_preset"]))			{$prepopulate_transfer_preset=$_GET["prepopulate_transfer_preset"];}
elseif (isset($_POST["prepopulate_transfer_preset"]))	{$prepopulate_transfer_preset=$_POST["prepopulate_transfer_preset"];}
if (isset($_GET["enable_tts_integration"]))				{$enable_tts_integration=$_GET["enable_tts_integration"];}
elseif (isset($_POST["enable_tts_integration"]))	{$enable_tts_integration=$_POST["enable_tts_integration"];}
if (isset($_GET["tts_id"]))							{$tts_id=$_GET["tts_id"];}
elseif (isset($_POST["tts_id"]))				{$tts_id=$_POST["tts_id"];}
if (isset($_GET["tts_name"]))						{$tts_name=$_GET["tts_name"];}
elseif (isset($_POST["tts_name"]))				{$tts_name=$_POST["tts_name"];}
if (isset($_GET["tts_text"]))						{$tts_text=$_GET["tts_text"];}
elseif (isset($_POST["tts_text"]))				{$tts_text=$_POST["tts_text"];}
if (isset($_GET["drop_rate_group"]))				{$drop_rate_group=$_GET["drop_rate_group"];}
elseif (isset($_POST["drop_rate_group"]))		{$drop_rate_group=$_POST["drop_rate_group"];}
if (isset($_GET["agent_status_viewable_groups"]))			{$agent_status_viewable_groups=$_GET["agent_status_viewable_groups"];}
elseif (isset($_POST["agent_status_viewable_groups"]))	{$agent_status_viewable_groups=$_POST["agent_status_viewable_groups"];}
if (isset($_GET["agent_status_view_time"]))				{$agent_status_view_time=$_GET["agent_status_view_time"];}
elseif (isset($_POST["agent_status_view_time"]))	{$agent_status_view_time=$_POST["agent_status_view_time"];}
if (isset($_GET["view_calls_in_queue"]))			{$view_calls_in_queue=$_GET["view_calls_in_queue"];}
elseif (isset($_POST["view_calls_in_queue"]))	{$view_calls_in_queue=$_POST["view_calls_in_queue"];}
if (isset($_GET["view_calls_in_queue_launch"]))				{$view_calls_in_queue_launch=$_GET["view_calls_in_queue_launch"];}
elseif (isset($_POST["view_calls_in_queue_launch"]))	{$view_calls_in_queue_launch=$_POST["view_calls_in_queue_launch"];}
if (isset($_GET["grab_calls_in_queue"]))			{$grab_calls_in_queue=$_GET["grab_calls_in_queue"];}
elseif (isset($_POST["grab_calls_in_queue"]))	{$grab_calls_in_queue=$_POST["grab_calls_in_queue"];}
if (isset($_GET["call_requeue_button"]))			{$call_requeue_button=$_GET["call_requeue_button"];}
elseif (isset($_POST["call_requeue_button"]))	{$call_requeue_button=$_POST["call_requeue_button"];}
if (isset($_GET["pause_after_each_call"]))			{$pause_after_each_call=$_GET["pause_after_each_call"];}
elseif (isset($_POST["pause_after_each_call"]))	{$pause_after_each_call=$_POST["pause_after_each_call"];}
if (isset($_GET["no_hopper_dialing"]))				{$no_hopper_dialing=$_GET["no_hopper_dialing"];}
elseif (isset($_POST["no_hopper_dialing"]))		{$no_hopper_dialing=$_POST["no_hopper_dialing"];}
if (isset($_GET["agent_dial_owner_only"]))			{$agent_dial_owner_only=$_GET["agent_dial_owner_only"];}
elseif (isset($_POST["agent_dial_owner_only"]))	{$agent_dial_owner_only=$_POST["agent_dial_owner_only"];}
if (isset($_GET["reset_time"]))						{$reset_time=$_GET["reset_time"];}
elseif (isset($_POST["reset_time"]))			{$reset_time=$_POST["reset_time"];}
if (isset($_GET["allow_alerts"]))					{$allow_alerts=$_GET["allow_alerts"];}
elseif (isset($_POST["allow_alerts"]))			{$allow_alerts=$_POST["allow_alerts"];}
if (isset($_GET["agent_display_dialable_leads"]))			{$agent_display_dialable_leads=$_GET["agent_display_dialable_leads"];}
elseif (isset($_POST["agent_display_dialable_leads"]))	{$agent_display_dialable_leads=$_POST["agent_display_dialable_leads"];}
if (isset($_GET["vicidial_balance_rank"]))			{$vicidial_balance_rank=$_GET["vicidial_balance_rank"];}
elseif (isset($_POST["vicidial_balance_rank"]))	{$vicidial_balance_rank=$_POST["vicidial_balance_rank"];}
if (isset($_GET["agent_script_override"]))			{$agent_script_override=$_GET["agent_script_override"];}
elseif (isset($_POST["agent_script_override"]))	{$agent_script_override=$_POST["agent_script_override"];}
if (isset($_GET["moh_id"]))				{$moh_id=$_GET["moh_id"];}
elseif (isset($_POST["moh_id"]))	{$moh_id=$_POST["moh_id"];}
if (isset($_GET["moh_name"]))			{$moh_name=$_GET["moh_name"];}
elseif (isset($_POST["moh_name"]))	{$moh_name=$_POST["moh_name"];}
if (isset($_GET["random"]))				{$random=$_GET["random"];}
elseif (isset($_POST["random"]))	{$random=$_POST["random"];}
if (isset($_GET["filename"]))			{$filename=$_GET["filename"];}
elseif (isset($_POST["filename"]))	{$filename=$_POST["filename"];}
if (isset($_GET["rank"]))				{$rank=$_GET["rank"];}
elseif (isset($_POST["rank"]))		{$rank=$_POST["rank"];}
if (isset($_GET["rebuild_music_on_hold"]))				{$rebuild_music_on_hold=$_GET["rebuild_music_on_hold"];}
elseif (isset($_POST["rebuild_music_on_hold"]))		{$rebuild_music_on_hold=$_POST["rebuild_music_on_hold"];}
if (isset($_GET["active_agent_login_server"]))			{$active_agent_login_server=$_GET["active_agent_login_server"];}
elseif (isset($_POST["active_agent_login_server"]))	{$active_agent_login_server=$_POST["active_agent_login_server"];}
if (isset($_GET["enable_second_webform"]))			{$enable_second_webform=$_GET["enable_second_webform"];}
elseif (isset($_POST["enable_second_webform"]))	{$enable_second_webform=$_POST["enable_second_webform"];}
if (isset($_GET["web_form_address_two"]))			{$web_form_address_two=$_GET["web_form_address_two"];}
elseif (isset($_POST["web_form_address_two"]))	{$web_form_address_two=$_POST["web_form_address_two"];}
if (isset($_GET["waitforsilence_options"]))			{$waitforsilence_options=$_GET["waitforsilence_options"];}
elseif (isset($_POST["waitforsilence_options"]))	{$waitforsilence_options=$_POST["waitforsilence_options"];}
if (isset($_GET["campaign_cid_override"]))			{$campaign_cid_override=$_GET["campaign_cid_override"];}
elseif (isset($_POST["campaign_cid_override"]))	{$campaign_cid_override=$_POST["campaign_cid_override"];}
if (isset($_GET["am_message_exten_override"]))			{$am_message_exten_override=$_GET["am_message_exten_override"];}
elseif (isset($_POST["am_message_exten_override"]))	{$am_message_exten_override=$_POST["am_message_exten_override"];}
if (isset($_GET["drop_inbound_group_override"]))			{$drop_inbound_group_override=$_GET["drop_inbound_group_override"];}
elseif (isset($_POST["drop_inbound_group_override"]))	{$drop_inbound_group_override=$_POST["drop_inbound_group_override"];}
if (isset($_GET["agent_select_territories"]))			{$agent_select_territories=$_GET["agent_select_territories"];}
elseif (isset($_POST["agent_select_territories"]))	{$agent_select_territories=$_POST["agent_select_territories"];}
if (isset($_GET["agent_choose_territories"]))			{$agent_choose_territories=$_GET["agent_choose_territories"];}
elseif (isset($_POST["agent_choose_territories"]))	{$agent_choose_territories=$_POST["agent_choose_territories"];}
if (isset($_GET["carrier_description"]))			{$carrier_description=$_GET["carrier_description"];}
elseif (isset($_POST["carrier_description"]))	{$carrier_description=$_POST["carrier_description"];}
if (isset($_GET["delete_vm_after_email"]))			{$delete_vm_after_email=$_GET["delete_vm_after_email"];}
elseif (isset($_POST["delete_vm_after_email"]))	{$delete_vm_after_email=$_POST["delete_vm_after_email"];}
if (isset($_GET["custom_one"]))					{$custom_one=$_GET["custom_one"];}
elseif (isset($_POST["custom_one"]))		{$custom_one=$_POST["custom_one"];}
if (isset($_GET["custom_two"]))					{$custom_two=$_GET["custom_two"];}
elseif (isset($_POST["custom_two"]))		{$custom_two=$_POST["custom_two"];}
if (isset($_GET["custom_three"]))				{$custom_three=$_GET["custom_three"];}
elseif (isset($_POST["custom_three"]))		{$custom_three=$_POST["custom_three"];}
if (isset($_GET["custom_four"]))				{$custom_four=$_GET["custom_four"];}
elseif (isset($_POST["custom_four"]))		{$custom_four=$_POST["custom_four"];}
if (isset($_GET["custom_five"]))				{$custom_five=$_GET["custom_five"];}
elseif (isset($_POST["custom_five"]))		{$custom_five=$_POST["custom_five"];}
if (isset($_GET["crm_popup_login"]))			{$crm_popup_login=$_GET["crm_popup_login"];}
elseif (isset($_POST["crm_popup_login"]))	{$crm_popup_login=$_POST["crm_popup_login"];}
if (isset($_GET["crm_login_address"]))			{$crm_login_address=$_GET["crm_login_address"];}
elseif (isset($_POST["crm_login_address"]))	{$crm_login_address=$_POST["crm_login_address"];}
if (isset($_GET["timer_action"]))					{$timer_action=$_GET["timer_action"];}
elseif (isset($_POST["timer_action"]))			{$timer_action=$_POST["timer_action"];}
if (isset($_GET["timer_action_message"]))			{$timer_action_message=$_GET["timer_action_message"];}
elseif (isset($_POST["timer_action_message"]))	{$timer_action_message=$_POST["timer_action_message"];}
if (isset($_GET["timer_action_seconds"]))			{$timer_action_seconds=$_GET["timer_action_seconds"];}
elseif (isset($_POST["timer_action_seconds"]))	{$timer_action_seconds=$_POST["timer_action_seconds"];}
if (isset($_GET["start_call_url"]))				{$start_call_url=$_GET["start_call_url"];}
elseif (isset($_POST["start_call_url"]))	{$start_call_url=$_POST["start_call_url"];}
if (isset($_GET["dispo_call_url"]))				{$dispo_call_url=$_GET["dispo_call_url"];}
elseif (isset($_POST["dispo_call_url"]))	{$dispo_call_url=$_POST["dispo_call_url"];}
if (isset($_GET["xferconf_c_number"]))			{$xferconf_c_number=$_GET["xferconf_c_number"];}
elseif (isset($_POST["xferconf_c_number"]))	{$xferconf_c_number=$_POST["xferconf_c_number"];}
if (isset($_GET["xferconf_d_number"]))			{$xferconf_d_number=$_GET["xferconf_d_number"];}
elseif (isset($_POST["xferconf_d_number"]))	{$xferconf_d_number=$_POST["xferconf_d_number"];}
if (isset($_GET["xferconf_e_number"]))			{$xferconf_e_number=$_GET["xferconf_e_number"];}
elseif (isset($_POST["xferconf_e_number"]))	{$xferconf_e_number=$_POST["xferconf_e_number"];}
if (isset($_GET["record_call"]))				{$record_call=$_GET["record_call"];}
elseif (isset($_POST["record_call"]))		{$record_call=$_POST["record_call"];}
if (isset($_GET["ignore_list_script_override"]))			{$ignore_list_script_override=$_GET["ignore_list_script_override"];}
elseif (isset($_POST["ignore_list_script_override"]))	{$ignore_list_script_override=$_POST["ignore_list_script_override"];}
if (isset($_GET["external_server_ip"]))			{$external_server_ip=$_GET["external_server_ip"];}
elseif (isset($_POST["external_server_ip"])){$external_server_ip=$_POST["external_server_ip"];}
if (isset($_GET["is_webphone"]))				{$is_webphone=$_GET["is_webphone"];}
elseif (isset($_POST["is_webphone"]))		{$is_webphone=$_POST["is_webphone"];}
if (isset($_GET["use_external_server_ip"]))			{$use_external_server_ip=$_GET["use_external_server_ip"];}
elseif (isset($_POST["use_external_server_ip"])){$use_external_server_ip=$_POST["use_external_server_ip"];}
if (isset($_GET["default_webphone"]))			{$default_webphone=$_GET["default_webphone"];}
elseif (isset($_POST["default_webphone"]))	{$default_webphone=$_POST["default_webphone"];}
if (isset($_GET["default_external_server_ip"]))			{$default_external_server_ip=$_GET["default_external_server_ip"];}
elseif (isset($_POST["default_external_server_ip"])){$default_external_server_ip=$_POST["default_external_server_ip"];}
if (isset($_GET["webphone_url"]))				{$webphone_url=$_GET["webphone_url"];}
elseif (isset($_POST["webphone_url"]))		{$webphone_url=$_POST["webphone_url"];}
if (isset($_GET["enable_agc_dispo_log"]))			{$enable_agc_dispo_log=$_GET["enable_agc_dispo_log"];}
elseif (isset($_POST["enable_agc_dispo_log"]))	{$enable_agc_dispo_log=$_POST["enable_agc_dispo_log"];}
if (isset($_GET["agent_call_log_view"]))			{$agent_call_log_view=$_GET["agent_call_log_view"];}
elseif (isset($_POST["agent_call_log_view"]))	{$agent_call_log_view=$_POST["agent_call_log_view"];}
if (isset($_GET["agent_call_log_view_override"]))			{$agent_call_log_view_override=$_GET["agent_call_log_view_override"];}
elseif (isset($_POST["agent_call_log_view_override"]))	{$agent_call_log_view_override=$_POST["agent_call_log_view_override"];}
if (isset($_GET["use_custom_cid"]))				{$use_custom_cid=$_GET["use_custom_cid"];}
elseif (isset($_POST["use_custom_cid"]))	{$use_custom_cid=$_POST["use_custom_cid"];}
if (isset($_GET["scheduled_callbacks_alert"]))			{$scheduled_callbacks_alert=$_GET["scheduled_callbacks_alert"];}
elseif (isset($_POST["scheduled_callbacks_alert"]))	{$scheduled_callbacks_alert=$_POST["scheduled_callbacks_alert"];}
if (isset($_GET["queuemetrics_loginout"]))			{$queuemetrics_loginout=$_GET["queuemetrics_loginout"];}
elseif (isset($_POST["queuemetrics_loginout"]))	{$queuemetrics_loginout=$_POST["queuemetrics_loginout"];}
if (isset($_GET["callcard_enabled"]))				{$callcard_enabled=$_GET["callcard_enabled"];}
elseif (isset($_POST["callcard_enabled"]))		{$callcard_enabled=$_POST["callcard_enabled"];}
if (isset($_GET["callcard_admin"]))					{$callcard_admin=$_GET["callcard_admin"];}
elseif (isset($_POST["callcard_admin"]))		{$callcard_admin=$_POST["callcard_admin"];}
if (isset($_GET["agent_xfer_consultative"]))				{$agent_xfer_consultative=$_GET["agent_xfer_consultative"];}
elseif (isset($_POST["agent_xfer_consultative"]))		{$agent_xfer_consultative=$_POST["agent_xfer_consultative"];}
if (isset($_GET["agent_xfer_dial_override"]))				{$agent_xfer_dial_override=$_GET["agent_xfer_dial_override"];}
elseif (isset($_POST["agent_xfer_dial_override"]))		{$agent_xfer_dial_override=$_POST["agent_xfer_dial_override"];}
if (isset($_GET["agent_xfer_vm_transfer"]))					{$agent_xfer_vm_transfer=$_GET["agent_xfer_vm_transfer"];}
elseif (isset($_POST["agent_xfer_vm_transfer"]))		{$agent_xfer_vm_transfer=$_POST["agent_xfer_vm_transfer"];}
if (isset($_GET["agent_xfer_blind_transfer"]))				{$agent_xfer_blind_transfer=$_GET["agent_xfer_blind_transfer"];}
elseif (isset($_POST["agent_xfer_blind_transfer"]))		{$agent_xfer_blind_transfer=$_POST["agent_xfer_blind_transfer"];}
if (isset($_GET["agent_xfer_dial_with_customer"]))			{$agent_xfer_dial_with_customer=$_GET["agent_xfer_dial_with_customer"];}
elseif (isset($_POST["agent_xfer_dial_with_customer"]))	{$agent_xfer_dial_with_customer=$_POST["agent_xfer_dial_with_customer"];}
if (isset($_GET["agent_xfer_park_customer_dial"]))			{$agent_xfer_park_customer_dial=$_GET["agent_xfer_park_customer_dial"];}
elseif (isset($_POST["agent_xfer_park_customer_dial"]))	{$agent_xfer_park_customer_dial=$_POST["agent_xfer_park_customer_dial"];}
if (isset($_GET["agent_fullscreen"]))			{$agent_fullscreen=$_GET["agent_fullscreen"];}
elseif (isset($_POST["agent_fullscreen"]))	{$agent_fullscreen=$_POST["agent_fullscreen"];}
if (isset($_GET["extension_id"]))				{$extension_id=$_GET["extension_id"];}
elseif (isset($_POST["extension_id"]))		{$extension_id=$_POST["extension_id"];}
if (isset($_GET["extension_group_id"]))				{$extension_group_id=$_GET["extension_group_id"];}
elseif (isset($_POST["extension_group_id"]))	{$extension_group_id=$_POST["extension_group_id"];}
if (isset($_GET["campaign_groups"]))			{$campaign_groups=$_GET["campaign_groups"];}
elseif (isset($_POST["campaign_groups"]))	{$campaign_groups=$_POST["campaign_groups"];}
if (isset($_GET["extension_group"]))			{$extension_group=$_GET["extension_group"];}
elseif (isset($_POST["extension_group"]))	{$extension_group=$_POST["extension_group"];}
if (isset($_GET["agent_choose_blended"]))			{$agent_choose_blended=$_GET["agent_choose_blended"];}
elseif (isset($_POST["agent_choose_blended"]))	{$agent_choose_blended=$_POST["agent_choose_blended"];}
if (isset($_GET["queuemetrics_callstatus"]))			{$queuemetrics_callstatus=$_GET["queuemetrics_callstatus"];}
elseif (isset($_POST["queuemetrics_callstatus"]))	{$queuemetrics_callstatus=$_POST["queuemetrics_callstatus"];}
if (isset($_GET["extension_appended_cidname"]))				{$extension_appended_cidname=$_GET["extension_appended_cidname"];}
elseif (isset($_POST["extension_appended_cidname"]))	{$extension_appended_cidname=$_POST["extension_appended_cidname"];}
if (isset($_GET["scheduled_callbacks_count"]))			{$scheduled_callbacks_count=$_GET["scheduled_callbacks_count"];}
elseif (isset($_POST["scheduled_callbacks_count"]))	{$scheduled_callbacks_count=$_POST["scheduled_callbacks_count"];}
if (isset($_GET["realtime_block_user_info"]))			{$realtime_block_user_info=$_GET["realtime_block_user_info"];}
elseif (isset($_POST["realtime_block_user_info"]))	{$realtime_block_user_info=$_POST["realtime_block_user_info"];}
if (isset($_GET["manual_dial_override"]))			{$manual_dial_override=$_GET["manual_dial_override"];}
elseif (isset($_POST["manual_dial_override"]))	{$manual_dial_override=$_POST["manual_dial_override"];}
if (isset($_GET["blind_monitor_warning"]))			{$blind_monitor_warning=$_GET["blind_monitor_warning"];}
elseif (isset($_POST["blind_monitor_warning"]))	{$blind_monitor_warning=$_POST["blind_monitor_warning"];}
if (isset($_GET["blind_monitor_message"]))			{$blind_monitor_message=$_GET["blind_monitor_message"];}
elseif (isset($_POST["blind_monitor_message"]))	{$blind_monitor_message=$_POST["blind_monitor_message"];}
if (isset($_GET["blind_monitor_filename"]))				{$blind_monitor_filename=$_GET["blind_monitor_filename"];}
elseif (isset($_POST["blind_monitor_filename"]))	{$blind_monitor_filename=$_POST["blind_monitor_filename"];}
if (isset($_GET["uniqueid_status_display"]))			{$uniqueid_status_display=$_GET["uniqueid_status_display"];}
elseif (isset($_POST["uniqueid_status_display"]))	{$uniqueid_status_display=$_POST["uniqueid_status_display"];}
if (isset($_GET["uniqueid_status_prefix"]))				{$uniqueid_status_prefix=$_GET["uniqueid_status_prefix"];}
elseif (isset($_POST["uniqueid_status_prefix"]))	{$uniqueid_status_prefix=$_POST["uniqueid_status_prefix"];}
if (isset($_GET["default_codecs"]))				{$default_codecs=$_GET["default_codecs"];}
elseif (isset($_POST["default_codecs"]))	{$default_codecs=$_POST["default_codecs"];}
if (isset($_GET["codecs_list"]))			{$codecs_list=$_GET["codecs_list"];}
elseif (isset($_POST["codecs_list"]))	{$codecs_list=$_POST["codecs_list"];}
if (isset($_GET["codecs_with_template"]))			{$codecs_with_template=$_GET["codecs_with_template"];}
elseif (isset($_POST["codecs_with_template"]))	{$codecs_with_template=$_POST["codecs_with_template"];}
if (isset($_GET["custom_fields_modify"]))			{$custom_fields_modify=$_GET["custom_fields_modify"];}
elseif (isset($_POST["custom_fields_modify"]))	{$custom_fields_modify=$_POST["custom_fields_modify"];}
if (isset($_GET["hold_time_option_minimum"]))			{$hold_time_option_minimum=$_GET["hold_time_option_minimum"];}
elseif (isset($_POST["hold_time_option_minimum"]))	{$hold_time_option_minimum=$_POST["hold_time_option_minimum"];}
if (isset($_GET["source_carrier"]))				{$source_carrier=$_GET["source_carrier"];}
elseif (isset($_POST["source_carrier"]))	{$source_carrier=$_POST["source_carrier"];}
if (isset($_GET["hold_time_option_press_filename"]))			{$hold_time_option_press_filename=$_GET["hold_time_option_press_filename"];}
elseif (isset($_POST["hold_time_option_press_filename"]))	{$hold_time_option_press_filename=$_POST["hold_time_option_press_filename"];}
if (isset($_GET["hold_time_option_callmenu"]))			{$hold_time_option_callmenu=$_GET["hold_time_option_callmenu"];}
elseif (isset($_POST["hold_time_option_callmenu"]))	{$hold_time_option_callmenu=$_POST["hold_time_option_callmenu"];}
if (isset($_GET["inbound_queue_no_dial"]))			{$inbound_queue_no_dial=$_GET["inbound_queue_no_dial"];}
elseif (isset($_POST["inbound_queue_no_dial"]))	{$inbound_queue_no_dial=$_POST["inbound_queue_no_dial"];}
if (isset($_GET["default_afterhours_filename_override"]))			{$default_afterhours_filename_override=$_GET["default_afterhours_filename_override"];}
elseif (isset($_POST["default_afterhours_filename_override"]))	{$default_afterhours_filename_override=$_POST["default_afterhours_filename_override"];}
if (isset($_GET["sunday_afterhours_filename_override"]))			{$sunday_afterhours_filename_override=$_GET["sunday_afterhours_filename_override"];}
elseif (isset($_POST["sunday_afterhours_filename_override"]))	{$sunday_afterhours_filename_override=$_POST["sunday_afterhours_filename_override"];}
if (isset($_GET["monday_afterhours_filename_override"]))			{$monday_afterhours_filename_override=$_GET["monday_afterhours_filename_override"];}
elseif (isset($_POST["monday_afterhours_filename_override"]))	{$monday_afterhours_filename_override=$_POST["monday_afterhours_filename_override"];}
if (isset($_GET["tuesday_afterhours_filename_override"]))			{$tuesday_afterhours_filename_override=$_GET["tuesday_afterhours_filename_override"];}
elseif (isset($_POST["tuesday_afterhours_filename_override"]))	{$tuesday_afterhours_filename_override=$_POST["tuesday_afterhours_filename_override"];}
if (isset($_GET["wednesday_afterhours_filename_override"]))			{$wednesday_afterhours_filename_override=$_GET["wednesday_afterhours_filename_override"];}
elseif (isset($_POST["wednesday_afterhours_filename_override"]))	{$wednesday_afterhours_filename_override=$_POST["wednesday_afterhours_filename_override"];}
if (isset($_GET["thursday_afterhours_filename_override"]))			{$thursday_afterhours_filename_override=$_GET["thursday_afterhours_filename_override"];}
elseif (isset($_POST["thursday_afterhours_filename_override"]))	{$thursday_afterhours_filename_override=$_POST["thursday_afterhours_filename_override"];}
if (isset($_GET["friday_afterhours_filename_override"]))			{$friday_afterhours_filename_override=$_GET["friday_afterhours_filename_override"];}
elseif (isset($_POST["friday_afterhours_filename_override"]))	{$friday_afterhours_filename_override=$_POST["friday_afterhours_filename_override"];}
if (isset($_GET["saturday_afterhours_filename_override"]))			{$saturday_afterhours_filename_override=$_GET["saturday_afterhours_filename_override"];}
elseif (isset($_POST["saturday_afterhours_filename_override"]))	{$saturday_afterhours_filename_override=$_POST["saturday_afterhours_filename_override"];}
if (isset($_GET["onhold_prompt_no_block"]))				{$onhold_prompt_no_block=$_GET["onhold_prompt_no_block"];}
elseif (isset($_POST["onhold_prompt_no_block"]))	{$onhold_prompt_no_block=$_POST["onhold_prompt_no_block"];}
if (isset($_GET["onhold_prompt_seconds"]))			{$onhold_prompt_seconds=$_GET["onhold_prompt_seconds"];}
elseif (isset($_POST["onhold_prompt_seconds"]))	{$onhold_prompt_seconds=$_POST["onhold_prompt_seconds"];}
if (isset($_GET["hold_time_option_no_block"]))			{$hold_time_option_no_block=$_GET["hold_time_option_no_block"];}
elseif (isset($_POST["hold_time_option_no_block"]))	{$hold_time_option_no_block=$_POST["hold_time_option_no_block"];}
if (isset($_GET["hold_time_option_prompt_seconds"]))			{$hold_time_option_prompt_seconds=$_GET["hold_time_option_prompt_seconds"];}
elseif (isset($_POST["hold_time_option_prompt_seconds"]))	{$hold_time_option_prompt_seconds=$_POST["hold_time_option_prompt_seconds"];}
if (isset($_GET["admin_web_directory"]))			{$admin_web_directory=$_GET["admin_web_directory"];}
elseif (isset($_POST["admin_web_directory"]))	{$admin_web_directory=$_POST["admin_web_directory"];}
if (isset($_GET["tts_voice"]))				{$tts_voice=$_GET["tts_voice"];}
elseif (isset($_POST["tts_voice"]))		{$tts_voice=$_POST["tts_voice"];}
if (isset($_GET["label_title"]))					{$label_title=$_GET["label_title"];}
elseif (isset($_POST["label_title"]))			{$label_title=$_POST["label_title"];}
if (isset($_GET["label_first_name"]))				{$label_first_name=$_GET["label_first_name"];}
elseif (isset($_POST["label_first_name"]))		{$label_first_name=$_POST["label_first_name"];}
if (isset($_GET["label_middle_initial"]))			{$label_middle_initial=$_GET["label_middle_initial"];}
elseif (isset($_POST["label_middle_initial"]))	{$label_middle_initial=$_POST["label_middle_initial"];}
if (isset($_GET["label_last_name"]))				{$label_last_name=$_GET["label_last_name"];}
elseif (isset($_POST["label_last_name"]))		{$label_last_name=$_POST["label_last_name"];}
if (isset($_GET["label_address1"]))					{$label_address1=$_GET["label_address1"];}
elseif (isset($_POST["label_address1"]))		{$label_address1=$_POST["label_address1"];}
if (isset($_GET["label_address2"]))					{$label_address2=$_GET["label_address2"];}
elseif (isset($_POST["label_address2"]))		{$label_address2=$_POST["label_address2"];}
if (isset($_GET["label_address3"]))					{$label_address3=$_GET["label_address3"];}
elseif (isset($_POST["label_address3"]))		{$label_address3=$_POST["label_address3"];}
if (isset($_GET["label_city"]))						{$label_city=$_GET["label_city"];}
elseif (isset($_POST["label_city"]))			{$label_city=$_POST["label_city"];}
if (isset($_GET["label_state"]))					{$label_state=$_GET["label_state"];}
elseif (isset($_POST["label_state"]))			{$label_state=$_POST["label_state"];}
if (isset($_GET["label_province"]))					{$label_province=$_GET["label_province"];}
elseif (isset($_POST["label_province"]))		{$label_province=$_POST["label_province"];}
if (isset($_GET["label_postal_code"]))				{$label_postal_code=$_GET["label_postal_code"];}
elseif (isset($_POST["label_postal_code"]))		{$label_postal_code=$_POST["label_postal_code"];}
if (isset($_GET["label_vendor_lead_code"]))			{$label_vendor_lead_code=$_GET["label_vendor_lead_code"];}
elseif (isset($_POST["label_vendor_lead_code"])){$label_vendor_lead_code=$_POST["label_vendor_lead_code"];}
if (isset($_GET["label_gender"]))					{$label_gender=$_GET["label_gender"];}
elseif (isset($_POST["label_gender"]))			{$label_gender=$_POST["label_gender"];}
if (isset($_GET["label_phone_number"]))				{$label_phone_number=$_GET["label_phone_number"];}
elseif (isset($_POST["label_phone_number"]))	{$label_phone_number=$_POST["label_phone_number"];}
if (isset($_GET["label_phone_code"]))				{$label_phone_code=$_GET["label_phone_code"];}
elseif (isset($_POST["label_phone_code"]))		{$label_phone_code=$_POST["label_phone_code"];}
if (isset($_GET["label_alt_phone"]))				{$label_alt_phone=$_GET["label_alt_phone"];}
elseif (isset($_POST["label_alt_phone"]))		{$label_alt_phone=$_POST["label_alt_phone"];}
if (isset($_GET["label_security_phrase"]))			{$label_security_phrase=$_GET["label_security_phrase"];}
elseif (isset($_POST["label_security_phrase"]))	{$label_security_phrase=$_POST["label_security_phrase"];}
if (isset($_GET["label_email"]))					{$label_email=$_GET["label_email"];}
elseif (isset($_POST["label_email"]))			{$label_email=$_POST["label_email"];}
if (isset($_GET["label_comments"]))					{$label_comments=$_GET["label_comments"];}
elseif (isset($_POST["label_comments"]))		{$label_comments=$_POST["label_comments"];}
if (isset($_GET["custom_fields_enabled"]))			{$custom_fields_enabled=$_GET["custom_fields_enabled"];}
elseif (isset($_POST["custom_fields_enabled"]))	{$custom_fields_enabled=$_POST["custom_fields_enabled"];}
if (isset($_GET["slave_db_server"]))				{$slave_db_server=$_GET["slave_db_server"];}
elseif (isset($_POST["slave_db_server"]))		{$slave_db_server=$_POST["slave_db_server"];}
if (isset($_GET["reports_use_slave_db"]))			{$reports_use_slave_db=$_GET["reports_use_slave_db"];}
elseif (isset($_POST["reports_use_slave_db"]))	{$reports_use_slave_db=$_POST["reports_use_slave_db"];}
if (isset($_GET["custom_reports_use_slave_db"]))			{$custom_reports_use_slave_db=$_GET["custom_reports_use_slave_db"];}
elseif (isset($_POST["custom_reports_use_slave_db"]))	{$custom_reports_use_slave_db=$_POST["custom_reports_use_slave_db"];}
if (isset($_GET["hold_time_second_option"]))			{$hold_time_second_option=$_GET["hold_time_second_option"];}
elseif (isset($_POST["hold_time_second_option"]))	{$hold_time_second_option=$_POST["hold_time_second_option"];}
if (isset($_GET["hold_time_third_option"]))				{$hold_time_third_option=$_GET["hold_time_third_option"];}
elseif (isset($_POST["hold_time_third_option"]))	{$hold_time_third_option=$_POST["hold_time_third_option"];}
if (isset($_GET["wait_hold_option_priority"]))			{$wait_hold_option_priority=$_GET["wait_hold_option_priority"];}
elseif (isset($_POST["wait_hold_option_priority"]))	{$wait_hold_option_priority=$_POST["wait_hold_option_priority"];}
if (isset($_GET["wait_time_option"]))					{$wait_time_option=$_GET["wait_time_option"];}
elseif (isset($_POST["wait_time_option"]))			{$wait_time_option=$_POST["wait_time_option"];}
if (isset($_GET["wait_time_second_option"]))			{$wait_time_second_option=$_GET["wait_time_second_option"];}
elseif (isset($_POST["wait_time_second_option"]))	{$wait_time_second_option=$_POST["wait_time_second_option"];}
if (isset($_GET["wait_time_third_option"]))				{$wait_time_third_option=$_GET["wait_time_third_option"];}
elseif (isset($_POST["wait_time_third_option"]))	{$wait_time_third_option=$_POST["wait_time_third_option"];}
if (isset($_GET["wait_time_option_seconds"]))			{$wait_time_option_seconds=$_GET["wait_time_option_seconds"];}
elseif (isset($_POST["wait_time_option_seconds"]))	{$wait_time_option_seconds=$_POST["wait_time_option_seconds"];}
if (isset($_GET["wait_time_option_exten"]))				{$wait_time_option_exten=$_GET["wait_time_option_exten"];}
elseif (isset($_POST["wait_time_option_exten"]))	{$wait_time_option_exten=$_POST["wait_time_option_exten"];}
if (isset($_GET["wait_time_option_voicemail"]))			{$wait_time_option_voicemail=$_GET["wait_time_option_voicemail"];}
elseif (isset($_POST["wait_time_option_voicemail"]))	{$wait_time_option_voicemail=$_POST["wait_time_option_voicemail"];}
if (isset($_GET["wait_time_option_xfer_group"]))			{$wait_time_option_xfer_group=$_GET["wait_time_option_xfer_group"];}
elseif (isset($_POST["wait_time_option_xfer_group"]))	{$wait_time_option_xfer_group=$_POST["wait_time_option_xfer_group"];}
if (isset($_GET["wait_time_option_callmenu"]))				{$wait_time_option_callmenu=$_GET["wait_time_option_callmenu"];}
elseif (isset($_POST["wait_time_option_callmenu"]))		{$wait_time_option_callmenu=$_POST["wait_time_option_callmenu"];}
if (isset($_GET["wait_time_option_callback_filename"]))				{$wait_time_option_callback_filename=$_GET["wait_time_option_callback_filename"];}
elseif (isset($_POST["wait_time_option_callback_filename"]))	{$wait_time_option_callback_filename=$_POST["wait_time_option_callback_filename"];}
if (isset($_GET["wait_time_option_callback_list_id"]))			{$wait_time_option_callback_list_id=$_GET["wait_time_option_callback_list_id"];}
elseif (isset($_POST["wait_time_option_callback_list_id"]))	{$wait_time_option_callback_list_id=$_POST["wait_time_option_callback_list_id"];}
if (isset($_GET["wait_time_option_press_filename"]))			{$wait_time_option_press_filename=$_GET["wait_time_option_press_filename"];}
elseif (isset($_POST["wait_time_option_press_filename"]))	{$wait_time_option_press_filename=$_POST["wait_time_option_press_filename"];}
if (isset($_GET["wait_time_option_no_block"]))			{$wait_time_option_no_block=$_GET["wait_time_option_no_block"];}
elseif (isset($_POST["wait_time_option_no_block"]))	{$wait_time_option_no_block=$_POST["wait_time_option_no_block"];}
if (isset($_GET["wait_time_option_prompt_seconds"]))			{$wait_time_option_prompt_seconds=$_GET["wait_time_option_prompt_seconds"];}
elseif (isset($_POST["wait_time_option_prompt_seconds"]))	{$wait_time_option_prompt_seconds=$_POST["wait_time_option_prompt_seconds"];}
if (isset($_GET["timer_action_destination"]))			{$timer_action_destination=$_GET["timer_action_destination"];}
elseif (isset($_POST["timer_action_destination"]))	{$timer_action_destination=$_POST["timer_action_destination"];}
if (isset($_GET["allowed_reports"]))			{$allowed_reports=$_GET["allowed_reports"];}
elseif (isset($_POST["allowed_reports"]))	{$allowed_reports=$_POST["allowed_reports"];}
if (isset($_GET["allowed_custom_reports"]))			{$allowed_custom_reports=$_GET["allowed_custom_reports"];}
elseif (isset($_POST["allowed_custom_reports"]))	{$allowed_custom_reports=$_POST["allowed_custom_reports"];}
if (isset($_GET["filter_phone_group_id"]))			{$filter_phone_group_id=$_GET["filter_phone_group_id"];}
elseif (isset($_POST["filter_phone_group_id"]))	{$filter_phone_group_id=$_POST["filter_phone_group_id"];}
if (isset($_GET["filter_phone_group_name"]))			{$filter_phone_group_name=$_GET["filter_phone_group_name"];}
elseif (isset($_POST["filter_phone_group_name"]))	{$filter_phone_group_name=$_POST["filter_phone_group_name"];}
if (isset($_GET["filter_phone_group_description"]))				{$filter_phone_group_description=$_GET["filter_phone_group_description"];}
elseif (isset($_POST["filter_phone_group_description"]))	{$filter_phone_group_description=$_POST["filter_phone_group_description"];}
if (isset($_GET["filter_inbound_number"]))			{$filter_inbound_number=$_GET["filter_inbound_number"];}
elseif (isset($_POST["filter_inbound_number"]))	{$filter_inbound_number=$_POST["filter_inbound_number"];}
if (isset($_GET["filter_url"]))				{$filter_url=$_GET["filter_url"];}
elseif (isset($_POST["filter_url"]))	{$filter_url=$_POST["filter_url"];}
if (isset($_GET["filter_action"]))			{$filter_action=$_GET["filter_action"];}
elseif (isset($_POST["filter_action"]))	{$filter_action=$_POST["filter_action"];}
if (isset($_GET["filter_extension"]))			{$filter_extension=$_GET["filter_extension"];}
elseif (isset($_POST["filter_extension"]))	{$filter_extension=$_POST["filter_extension"];}
if (isset($_GET["filter_exten_context"]))			{$filter_exten_context=$_GET["filter_exten_context"];}
elseif (isset($_POST["filter_exten_context"]))	{$filter_exten_context=$_POST["filter_exten_context"];}
if (isset($_GET["filter_voicemail_ext"]))			{$filter_voicemail_ext=$_GET["filter_voicemail_ext"];}
elseif (isset($_POST["filter_voicemail_ext"]))	{$filter_voicemail_ext=$_POST["filter_voicemail_ext"];}
if (isset($_GET["filter_phone"]))			{$filter_phone=$_GET["filter_phone"];}
elseif (isset($_POST["filter_phone"]))	{$filter_phone=$_POST["filter_phone"];}
if (isset($_GET["filter_server_ip"]))			{$filter_server_ip=$_GET["filter_server_ip"];}
elseif (isset($_POST["filter_server_ip"]))	{$filter_server_ip=$_POST["filter_server_ip"];}
if (isset($_GET["filter_user"]))			{$filter_user=$_GET["filter_user"];}
elseif (isset($_POST["filter_user"]))	{$filter_user=$_POST["filter_user"];}
if (isset($_GET["filter_user_unavailable_action"]))				{$filter_user_unavailable_action=$_GET["filter_user_unavailable_action"];}
elseif (isset($_POST["filter_user_unavailable_action"]))	{$filter_user_unavailable_action=$_POST["filter_user_unavailable_action"];}
if (isset($_GET["filter_user_route_settings_ingroup"]))				{$filter_user_route_settings_ingroup=$_GET["filter_user_route_settings_ingroup"];}
elseif (isset($_POST["filter_user_route_settings_ingroup"]))	{$filter_user_route_settings_ingroup=$_POST["filter_user_route_settings_ingroup"];}
if (isset($_GET["filter_group_id"]))			{$filter_group_id=$_GET["filter_group_id"];}
elseif (isset($_POST["filter_group_id"]))	{$filter_group_id=$_POST["filter_group_id"];}
if (isset($_GET["filter_call_handle_method"]))			{$filter_call_handle_method=$_GET["filter_call_handle_method"];}
elseif (isset($_POST["filter_call_handle_method"]))	{$filter_call_handle_method=$_POST["filter_call_handle_method"];}
if (isset($_GET["filter_agent_search_method"]))				{$filter_agent_search_method=$_GET["filter_agent_search_method"];}
elseif (isset($_POST["filter_agent_search_method"]))	{$filter_agent_search_method=$_POST["filter_agent_search_method"];}
if (isset($_GET["filter_list_id"]))				{$filter_list_id=$_GET["filter_list_id"];}
elseif (isset($_POST["filter_list_id"]))	{$filter_list_id=$_POST["filter_list_id"];}
if (isset($_GET["filter_campaign_id"]))				{$filter_campaign_id=$_GET["filter_campaign_id"];}
elseif (isset($_POST["filter_campaign_id"]))	{$filter_campaign_id=$_POST["filter_campaign_id"];}
if (isset($_GET["filter_phone_code"]))			{$filter_phone_code=$_GET["filter_phone_code"];}
elseif (isset($_POST["filter_phone_code"]))	{$filter_phone_code=$_POST["filter_phone_code"];}
if (isset($_GET["filter_menu_id"]))				{$filter_menu_id=$_GET["filter_menu_id"];}
elseif (isset($_POST["filter_menu_id"]))	{$filter_menu_id=$_POST["filter_menu_id"];}
if (isset($_GET["filter_clean_cid_number"]))			{$filter_clean_cid_number=$_GET["filter_clean_cid_number"];}
elseif (isset($_POST["filter_clean_cid_number"]))	{$filter_clean_cid_number=$_POST["filter_clean_cid_number"];}
if (isset($_GET["webphone_url_override"]))			{$webphone_url_override=$_GET["webphone_url_override"];}
elseif (isset($_POST["webphone_url_override"]))	{$webphone_url_override=$_POST["webphone_url_override"];}
if (isset($_GET["calculate_estimated_hold_seconds"]))			{$calculate_estimated_hold_seconds=$_GET["calculate_estimated_hold_seconds"];}
elseif (isset($_POST["calculate_estimated_hold_seconds"]))	{$calculate_estimated_hold_seconds=$_POST["calculate_estimated_hold_seconds"];}
if (isset($_GET["enable_xfer_presets"]))			{$enable_xfer_presets=$_GET["enable_xfer_presets"];}
elseif (isset($_POST["enable_xfer_presets"]))	{$enable_xfer_presets=$_POST["enable_xfer_presets"];}
if (isset($_GET["hide_xfer_number_to_dial"]))			{$hide_xfer_number_to_dial=$_GET["hide_xfer_number_to_dial"];}
elseif (isset($_POST["hide_xfer_number_to_dial"]))	{$hide_xfer_number_to_dial=$_POST["hide_xfer_number_to_dial"];}
if (isset($_GET["preset_name"]))			{$preset_name=$_GET["preset_name"];}
elseif (isset($_POST["preset_name"]))	{$preset_name=$_POST["preset_name"];}
if (isset($_GET["preset_number"]))			{$preset_number=$_GET["preset_number"];}
elseif (isset($_POST["preset_number"]))	{$preset_number=$_POST["preset_number"];}
if (isset($_GET["preset_dtmf"]))			{$preset_dtmf=$_GET["preset_dtmf"];}
elseif (isset($_POST["preset_dtmf"]))	{$preset_dtmf=$_POST["preset_dtmf"];}
if (isset($_GET["preset_hide_number"]))				{$preset_hide_number=$_GET["preset_hide_number"];}
elseif (isset($_POST["preset_hide_number"]))	{$preset_hide_number=$_POST["preset_hide_number"];}
if (isset($_GET["manual_dial_prefix"]))				{$manual_dial_prefix=$_GET["manual_dial_prefix"];}
elseif (isset($_POST["manual_dial_prefix"]))	{$manual_dial_prefix=$_POST["manual_dial_prefix"];}
if (isset($_GET["webphone_systemkey"]))				{$webphone_systemkey=$_GET["webphone_systemkey"];}
elseif (isset($_POST["webphone_systemkey"]))	{$webphone_systemkey=$_POST["webphone_systemkey"];}
if (isset($_GET["webphone_dialpad"]))			{$webphone_dialpad=$_GET["webphone_dialpad"];}
elseif (isset($_POST["webphone_dialpad"]))	{$webphone_dialpad=$_POST["webphone_dialpad"];}
if (isset($_GET["webphone_systemkey_override"]))			{$webphone_systemkey_override=$_GET["webphone_systemkey_override"];}
elseif (isset($_POST["webphone_systemkey_override"]))	{$webphone_systemkey_override=$_POST["webphone_systemkey_override"];}
if (isset($_GET["webphone_dialpad_override"]))			{$webphone_dialpad_override=$_GET["webphone_dialpad_override"];}
elseif (isset($_POST["webphone_dialpad_override"]))	{$webphone_dialpad_override=$_POST["webphone_dialpad_override"];}
if (isset($_GET["force_change_password"]))			{$force_change_password=$_GET["force_change_password"];}
elseif (isset($_POST["force_change_password"]))	{$force_change_password=$_POST["force_change_password"];}
if (isset($_GET["first_login_trigger"]))			{$first_login_trigger=$_GET["first_login_trigger"];}
elseif (isset($_POST["first_login_trigger"]))	{$first_login_trigger=$_POST["first_login_trigger"];}
if (isset($_GET["default_phone_registration_password"]))			{$default_phone_registration_password=$_GET["default_phone_registration_password"];}
elseif (isset($_POST["default_phone_registration_password"]))	{$default_phone_registration_password=$_POST["default_phone_registration_password"];}
if (isset($_GET["default_phone_login_password"]))			{$default_phone_login_password=$_GET["default_phone_login_password"];}
elseif (isset($_POST["default_phone_login_password"]))	{$default_phone_login_password=$_POST["default_phone_login_password"];}
if (isset($_GET["default_server_password"]))			{$default_server_password=$_GET["default_server_password"];}
elseif (isset($_POST["default_server_password"]))	{$default_server_password=$_POST["default_server_password"];}
if (isset($_GET["customer_3way_hangup_logging"]))			{$customer_3way_hangup_logging=$_GET["customer_3way_hangup_logging"];}
elseif (isset($_POST["customer_3way_hangup_logging"]))	{$customer_3way_hangup_logging=$_POST["customer_3way_hangup_logging"];}
if (isset($_GET["customer_3way_hangup_seconds"]))			{$customer_3way_hangup_seconds=$_GET["customer_3way_hangup_seconds"];}
elseif (isset($_POST["customer_3way_hangup_seconds"]))	{$customer_3way_hangup_seconds=$_POST["customer_3way_hangup_seconds"];}
if (isset($_GET["customer_3way_hangup_action"]))			{$customer_3way_hangup_action=$_GET["customer_3way_hangup_action"];}
elseif (isset($_POST["customer_3way_hangup_action"]))	{$customer_3way_hangup_action=$_POST["customer_3way_hangup_action"];}
if (isset($_GET["add_lead_url"]))			{$add_lead_url=$_GET["add_lead_url"];}
elseif (isset($_POST["add_lead_url"]))	{$add_lead_url=$_POST["add_lead_url"];}
if (isset($_GET["ivr_park_call"]))			{$ivr_park_call=$_GET["ivr_park_call"];}
elseif (isset($_POST["ivr_park_call"]))	{$ivr_park_call=$_POST["ivr_park_call"];}
if (isset($_GET["ivr_park_call_agi"]))			{$ivr_park_call_agi=$_GET["ivr_park_call_agi"];}
elseif (isset($_POST["ivr_park_call_agi"]))	{$ivr_park_call_agi=$_POST["ivr_park_call_agi"];}
if (isset($_GET["manual_preview_dial"]))			{$manual_preview_dial=$_GET["manual_preview_dial"];}
elseif (isset($_POST["manual_preview_dial"]))	{$manual_preview_dial=$_POST["manual_preview_dial"];}
if (isset($_GET["eht_minimum_prompt_filename"]))			{$eht_minimum_prompt_filename=$_GET["eht_minimum_prompt_filename"];}
elseif (isset($_POST["eht_minimum_prompt_filename"]))	{$eht_minimum_prompt_filename=$_POST["eht_minimum_prompt_filename"];}
if (isset($_GET["eht_minimum_prompt_no_block"]))			{$eht_minimum_prompt_no_block=$_GET["eht_minimum_prompt_no_block"];}
elseif (isset($_POST["eht_minimum_prompt_no_block"]))	{$eht_minimum_prompt_no_block=$_POST["eht_minimum_prompt_no_block"];}
if (isset($_GET["eht_minimum_prompt_seconds"]))				{$eht_minimum_prompt_seconds=$_GET["eht_minimum_prompt_seconds"];}
elseif (isset($_POST["eht_minimum_prompt_seconds"]))	{$eht_minimum_prompt_seconds=$_POST["eht_minimum_prompt_seconds"];}
if (isset($_GET["realtime_agent_time_stats"]))				{$realtime_agent_time_stats=$_GET["realtime_agent_time_stats"];}
elseif (isset($_POST["realtime_agent_time_stats"]))		{$realtime_agent_time_stats=$_POST["realtime_agent_time_stats"];}
if (isset($_GET["admin_modify_refresh"]))			{$admin_modify_refresh=$_GET["admin_modify_refresh"];}
elseif (isset($_POST["admin_modify_refresh"]))	{$admin_modify_refresh=$_POST["admin_modify_refresh"];}
if (isset($_GET["nocache_admin"]))			{$nocache_admin=$_GET["nocache_admin"];}
elseif (isset($_POST["nocache_admin"]))	{$nocache_admin=$_POST["nocache_admin"];}
if (isset($_GET["generate_cross_server_exten"]))			{$generate_cross_server_exten=$_GET["generate_cross_server_exten"];}
elseif (isset($_POST["generate_cross_server_exten"]))	{$generate_cross_server_exten=$_POST["generate_cross_server_exten"];}
if (isset($_GET["queuemetrics_addmember_enabled"]))				{$queuemetrics_addmember_enabled=$_GET["queuemetrics_addmember_enabled"];}
elseif (isset($_POST["queuemetrics_addmember_enabled"]))	{$queuemetrics_addmember_enabled=$_POST["queuemetrics_addmember_enabled"];}
if (isset($_GET["modify_page"]))			{$modify_page=$_GET["modify_page"];}
elseif (isset($_POST["modify_page"]))	{$modify_page=$_POST["modify_page"];}
if (isset($_GET["modify_url"]))				{$modify_url=$_GET["modify_url"];}
elseif (isset($_POST["modify_url"]))	{$modify_url=$_POST["modify_url"];}
if (isset($_GET["use_auto_hopper"]))			{$use_auto_hopper=$_GET["use_auto_hopper"];}
elseif (isset($_POST["use_auto_hopper"]))	{$use_auto_hopper=$_POST["use_auto_hopper"];}
if (isset($_GET["auto_hopper_multi"]))			{$auto_hopper_multi=$_GET["auto_hopper_multi"];}
elseif (isset($_POST["auto_hopper_multi"]))	{$auto_hopper_multi=$_POST["auto_hopper_multi"];}
if (isset($_GET["auto_trim_hopper"]))			{$auto_trim_hopper=$_GET["auto_trim_hopper"];}
elseif (isset($_POST["auto_trim_hopper"]))	{$auto_trim_hopper=$_POST["auto_trim_hopper"];}
if (isset($_GET["api_manual_dial"]))			{$api_manual_dial=$_GET["api_manual_dial"];}
elseif (isset($_POST["api_manual_dial"]))	{$api_manual_dial=$_POST["api_manual_dial"];}
if (isset($_GET["manual_dial_call_time_check"]))			{$manual_dial_call_time_check=$_GET["manual_dial_call_time_check"];}
elseif (isset($_POST["manual_dial_call_time_check"]))	{$manual_dial_call_time_check=$_POST["manual_dial_call_time_check"];}
if (isset($_GET["queuemetrics_dispo_pause"]))			{$queuemetrics_dispo_pause=$_GET["queuemetrics_dispo_pause"];}
elseif (isset($_POST["queuemetrics_dispo_pause"]))	{$queuemetrics_dispo_pause=$_POST["queuemetrics_dispo_pause"];}
if (isset($_GET["lead_order_randomize"]))			{$lead_order_randomize=$_GET["lead_order_randomize"];}
elseif (isset($_POST["lead_order_randomize"]))	{$lead_order_randomize=$_POST["lead_order_randomize"];}
if (isset($_GET["lead_order_secondary"]))			{$lead_order_secondary=$_GET["lead_order_secondary"];}
elseif (isset($_POST["lead_order_secondary"]))	{$lead_order_secondary=$_POST["lead_order_secondary"];}
if (isset($_GET["per_call_notes"]))				{$per_call_notes=$_GET["per_call_notes"];}
elseif (isset($_POST["per_call_notes"]))	{$per_call_notes=$_POST["per_call_notes"];}
if (isset($_GET["my_callback_option"]))				{$my_callback_option=$_GET["my_callback_option"];}
elseif (isset($_POST["my_callback_option"]))	{$my_callback_option=$_POST["my_callback_option"];}
if (isset($_GET["agent_lead_search"]))			{$agent_lead_search=$_GET["agent_lead_search"];}
elseif (isset($_POST["agent_lead_search"]))	{$agent_lead_search=$_POST["agent_lead_search"];}
if (isset($_GET["agent_lead_search_method"]))			{$agent_lead_search_method=$_GET["agent_lead_search_method"];}
elseif (isset($_POST["agent_lead_search_method"]))	{$agent_lead_search_method=$_POST["agent_lead_search_method"];}
if (isset($_GET["queuemetrics_phone_environment"]))				{$queuemetrics_phone_environment=$_GET["queuemetrics_phone_environment"];}
elseif (isset($_POST["queuemetrics_phone_environment"]))	{$queuemetrics_phone_environment=$_POST["queuemetrics_phone_environment"];}
if (isset($_GET["active_twin_server_ip"]))			{$active_twin_server_ip=$_GET["active_twin_server_ip"];}
elseif (isset($_POST["active_twin_server_ip"]))	{$active_twin_server_ip=$_POST["active_twin_server_ip"];}
if (isset($_GET["on_hook_agent"]))			{$on_hook_agent=$_GET["on_hook_agent"];}
elseif (isset($_POST["on_hook_agent"]))	{$on_hook_agent=$_POST["on_hook_agent"];}
if (isset($_GET["on_hook_ring_time"]))			{$on_hook_ring_time=$_GET["on_hook_ring_time"];}
elseif (isset($_POST["on_hook_ring_time"]))	{$on_hook_ring_time=$_POST["on_hook_ring_time"];}
if (isset($_GET["auto_pause_precall"]))			{$auto_pause_precall=$_GET["auto_pause_precall"];}
elseif (isset($_POST["auto_pause_precall"]))	{$auto_pause_precall=$_POST["auto_pause_precall"];}
if (isset($_GET["auto_resume_precall"]))			{$auto_resume_precall=$_GET["auto_resume_precall"];}
elseif (isset($_POST["auto_resume_precall"]))	{$auto_resume_precall=$_POST["auto_resume_precall"];}
if (isset($_GET["auto_pause_precall_code"]))			{$auto_pause_precall_code=$_GET["auto_pause_precall_code"];}
elseif (isset($_POST["auto_pause_precall_code"]))	{$auto_pause_precall_code=$_POST["auto_pause_precall_code"];}
if (isset($_GET["audit_comments"]))                    {$audit_comments=$_GET["audit_comments"];}
elseif (isset($_POST["audit_comments"]))        {$audit_comments=$_POST["audit_comments"];}
if (isset($_GET["reload_dialplan_on_servers"]))				{$reload_dialplan_on_servers=$_GET["reload_dialplan_on_servers"];}
elseif (isset($_POST["reload_dialplan_on_servers"]))	{$reload_dialplan_on_servers=$_POST["reload_dialplan_on_servers"];}
if (isset($_GET["manual_dial_cid"]))			{$manual_dial_cid=$_GET["manual_dial_cid"];}
elseif (isset($_POST["manual_dial_cid"]))	{$manual_dial_cid=$_POST["manual_dial_cid"];}
if (isset($_GET["post_phone_time_diff_alert"]))				{$post_phone_time_diff_alert=$_GET["post_phone_time_diff_alert"];}
elseif (isset($_POST["post_phone_time_diff_alert"]))	{$post_phone_time_diff_alert=$_POST["post_phone_time_diff_alert"];}
if (isset($_GET["custom_3way_button_transfer"]))			{$custom_3way_button_transfer=$_GET["custom_3way_button_transfer"];}
elseif (isset($_POST["custom_3way_button_transfer"]))	{$custom_3way_button_transfer=$_POST["custom_3way_button_transfer"];}
if (isset($_GET["available_only_tally_threshold"]))				{$available_only_tally_threshold=$_GET["available_only_tally_threshold"];}
elseif (isset($_POST["available_only_tally_threshold"]))	{$available_only_tally_threshold=$_POST["available_only_tally_threshold"];}
if (isset($_GET["available_only_tally_threshold_agents"]))			{$available_only_tally_threshold_agents=$_GET["available_only_tally_threshold_agents"];}
elseif (isset($_POST["available_only_tally_threshold_agents"]))	{$available_only_tally_threshold_agents=$_POST["available_only_tally_threshold_agents"];}
if (isset($_GET["dial_level_threshold"]))			{$dial_level_threshold=$_GET["dial_level_threshold"];}
elseif (isset($_POST["dial_level_threshold"]))	{$dial_level_threshold=$_POST["dial_level_threshold"];}
if (isset($_GET["dial_level_threshold_agents"]))			{$dial_level_threshold_agents=$_GET["dial_level_threshold_agents"];}
elseif (isset($_POST["dial_level_threshold_agents"]))	{$dial_level_threshold_agents=$_POST["dial_level_threshold_agents"];}
if (isset($_GET["time_zone_setting"]))			{$time_zone_setting=$_GET["time_zone_setting"];}
elseif (isset($_POST["time_zone_setting"]))	{$time_zone_setting=$_POST["time_zone_setting"];}
if (isset($_GET["safe_harbor_audio"]))			{$safe_harbor_audio=$_GET["safe_harbor_audio"];}
elseif (isset($_POST["safe_harbor_audio"]))	{$safe_harbor_audio=$_POST["safe_harbor_audio"];}
if (isset($_GET["safe_harbor_menu_id"]))			{$safe_harbor_menu_id=$_GET["safe_harbor_menu_id"];}
elseif (isset($_POST["safe_harbor_menu_id"]))	{$safe_harbor_menu_id=$_POST["safe_harbor_menu_id"];}
if (isset($_GET["dtmf_log"]))			{$dtmf_log=$_GET["dtmf_log"];}
elseif (isset($_POST["dtmf_log"]))	{$dtmf_log=$_POST["dtmf_log"];}
if (isset($_GET["webphone_auto_answer"]))			{$webphone_auto_answer=$_GET["webphone_auto_answer"];}
elseif (isset($_POST["webphone_auto_answer"]))	{$webphone_auto_answer=$_POST["webphone_auto_answer"];}
if (isset($_GET["survey_menu_id"]))				{$survey_menu_id=$_GET["survey_menu_id"];}
elseif (isset($_POST["survey_menu_id"]))	{$survey_menu_id=$_POST["survey_menu_id"];}
if (isset($_GET["callback_days_limit"]))			{$callback_days_limit=$_GET["callback_days_limit"];}
elseif (isset($_POST["callback_days_limit"]))	{$callback_days_limit=$_POST["callback_days_limit"];}
if (isset($_GET["dl_diff_target_method"]))			{$dl_diff_target_method=$_GET["dl_diff_target_method"];}
elseif (isset($_POST["dl_diff_target_method"]))	{$dl_diff_target_method=$_POST["dl_diff_target_method"];}
if (isset($_GET["disable_dispo_screen"]))			{$disable_dispo_screen=$_GET["disable_dispo_screen"];}
elseif (isset($_POST["disable_dispo_screen"]))	{$disable_dispo_screen=$_POST["disable_dispo_screen"];}
if (isset($_GET["disable_dispo_status"]))			{$disable_dispo_status=$_GET["disable_dispo_status"];}
elseif (isset($_POST["disable_dispo_status"]))	{$disable_dispo_status=$_POST["disable_dispo_status"];}
if (isset($_GET["screen_labels"]))			{$screen_labels=$_GET["screen_labels"];}
elseif (isset($_POST["screen_labels"]))	{$screen_labels=$_POST["screen_labels"];}
if (isset($_GET["label_hide_field_logs"]))			{$label_hide_field_logs=$_GET["label_hide_field_logs"];}
elseif (isset($_POST["label_hide_field_logs"]))	{$label_hide_field_logs=$_POST["label_hide_field_logs"];}
if (isset($_GET["label_id"]))			{$label_id=$_GET["label_id"];}
elseif (isset($_POST["label_id"]))	{$label_id=$_POST["label_id"];}
if (isset($_GET["label_name"]))				{$label_name=$_GET["label_name"];}
elseif (isset($_POST["label_name"]))	{$label_name=$_POST["label_name"];}
if (isset($_GET["status_display_fields"]))			{$status_display_fields=$_GET["status_display_fields"];}
elseif (isset($_POST["status_display_fields"]))	{$status_display_fields=$_POST["status_display_fields"];}
if (isset($_GET["queuemetrics_pe_phone_append"]))			{$queuemetrics_pe_phone_append=$_GET["queuemetrics_pe_phone_append"];}
elseif (isset($_POST["queuemetrics_pe_phone_append"]))	{$queuemetrics_pe_phone_append=$_POST["queuemetrics_pe_phone_append"];}
if (isset($_GET["test_campaign_calls"]))			{$test_campaign_calls=$_GET["test_campaign_calls"];}
elseif (isset($_POST["test_campaign_calls"]))	{$test_campaign_calls=$_POST["test_campaign_calls"];}
if (isset($_GET["agents_calls_reset"]))				{$agents_calls_reset=$_GET["agents_calls_reset"];}
elseif (isset($_POST["agents_calls_reset"]))	{$agents_calls_reset=$_POST["agents_calls_reset"];}
if (isset($_GET["voicemail_timezone"]))				{$voicemail_timezone=$_GET["voicemail_timezone"];}
elseif (isset($_POST["voicemail_timezone"]))	{$voicemail_timezone=$_POST["voicemail_timezone"];}
if (isset($_GET["voicemail_options"]))			{$voicemail_options=$_GET["voicemail_options"];}
elseif (isset($_POST["voicemail_options"]))	{$voicemail_options=$_POST["voicemail_options"];}
if (isset($_GET["default_voicemail_timezone"]))				{$default_voicemail_timezone=$_GET["default_voicemail_timezone"];}
elseif (isset($_POST["default_voicemail_timezone"]))	{$default_voicemail_timezone=$_POST["default_voicemail_timezone"];}
if (isset($_GET["default_local_gmt"]))			{$default_local_gmt=$_GET["default_local_gmt"];}
elseif (isset($_POST["default_local_gmt"]))	{$default_local_gmt=$_POST["default_local_gmt"];}
if (isset($_GET["na_call_url"]))			{$na_call_url=$_GET["na_call_url"];}
elseif (isset($_POST["na_call_url"]))	{$na_call_url=$_POST["na_call_url"];}
if (isset($_GET["on_hook_cid"]))			{$on_hook_cid=$_GET["on_hook_cid"];}
elseif (isset($_POST["on_hook_cid"]))	{$on_hook_cid=$_POST["on_hook_cid"];}
if (isset($_GET["form_end"]))			{$form_end=$_GET["form_end"];}
elseif (isset($_POST["form_end"]))	{$form_end=$_POST["form_end"];}
if (isset($_GET["noanswer_log"]))			{$noanswer_log=$_GET["noanswer_log"];}
elseif (isset($_POST["noanswer_log"]))	{$noanswer_log=$_POST["noanswer_log"];}
if (isset($_GET["alt_log_server_ip"]))			{$alt_log_server_ip=$_GET["alt_log_server_ip"];}
elseif (isset($_POST["alt_log_server_ip"]))	{$alt_log_server_ip=$_POST["alt_log_server_ip"];}
if (isset($_GET["alt_log_dbname"]))			{$alt_log_dbname=$_GET["alt_log_dbname"];}
elseif (isset($_POST["alt_log_dbname"]))	{$alt_log_dbname=$_POST["alt_log_dbname"];}
if (isset($_GET["alt_log_login"]))			{$alt_log_login=$_GET["alt_log_login"];}
elseif (isset($_POST["alt_log_login"]))	{$alt_log_login=$_POST["alt_log_login"];}
if (isset($_GET["alt_log_pass"]))			{$alt_log_pass=$_GET["alt_log_pass"];}
elseif (isset($_POST["alt_log_pass"]))	{$alt_log_pass=$_POST["alt_log_pass"];}
if (isset($_GET["tables_use_alt_log_db"]))			{$tables_use_alt_log_db=$_GET["tables_use_alt_log_db"];}
elseif (isset($_POST["tables_use_alt_log_db"]))	{$tables_use_alt_log_db=$_POST["tables_use_alt_log_db"];}
if (isset($_GET["did_agent_log"]))			{$did_agent_log=$_GET["did_agent_log"];}
elseif (isset($_POST["did_agent_log"]))	{$did_agent_log=$_POST["did_agent_log"];}
if (isset($_GET["survey_recording"]))			{$survey_recording=$_GET["survey_recording"];}
elseif (isset($_POST["survey_recording"]))	{$survey_recording=$_POST["survey_recording"];}
if (isset($_GET["campaign_cid_areacodes_enabled"]))				{$campaign_cid_areacodes_enabled=$_GET["campaign_cid_areacodes_enabled"];}
elseif (isset($_POST["campaign_cid_areacodes_enabled"]))	{$campaign_cid_areacodes_enabled=$_POST["campaign_cid_areacodes_enabled"];}
if (isset($_GET["areacode"]))			{$areacode=$_GET["areacode"];}
elseif (isset($_POST["areacode"]))	{$areacode=$_POST["areacode"];}
if (isset($_GET["cid_description"]))			{$cid_description=$_GET["cid_description"];}
elseif (isset($_POST["cid_description"]))	{$cid_description=$_POST["cid_description"];}
if (isset($_GET["pllb_grouping"]))			{$pllb_grouping=$_GET["pllb_grouping"];}
elseif (isset($_POST["pllb_grouping"]))	{$pllb_grouping=$_POST["pllb_grouping"];}
if (isset($_GET["pllb_grouping_limit"]))			{$pllb_grouping_limit=$_GET["pllb_grouping_limit"];}
elseif (isset($_POST["pllb_grouping_limit"]))	{$pllb_grouping_limit=$_POST["pllb_grouping_limit"];}
if (isset($_GET["description"]))			{$description=$_GET["description"];}
elseif (isset($_POST["description"]))	{$description=$_POST["description"];}
if (isset($_GET["did_ra_extensions_enabled"]))			{$did_ra_extensions_enabled=$_GET["did_ra_extensions_enabled"];}
elseif (isset($_POST["did_ra_extensions_enabled"]))	{$did_ra_extensions_enabled=$_POST["did_ra_extensions_enabled"];}
if (isset($_GET["modify_shifts"]))			{$modify_shifts=$_GET["modify_shifts"];}
elseif (isset($_POST["modify_shifts"]))	{$modify_shifts=$_POST["modify_shifts"];}
if (isset($_GET["modify_phones"]))			{$modify_phones=$_GET["modify_phones"];}
elseif (isset($_POST["modify_phones"]))	{$modify_phones=$_POST["modify_phones"];}
if (isset($_GET["modify_carriers"]))			{$modify_carriers=$_GET["modify_carriers"];}
elseif (isset($_POST["modify_carriers"]))	{$modify_carriers=$_POST["modify_carriers"];}
if (isset($_GET["modify_labels"]))			{$modify_labels=$_GET["modify_labels"];}
elseif (isset($_POST["modify_labels"]))	{$modify_labels=$_POST["modify_labels"];}
if (isset($_GET["modify_statuses"]))			{$modify_statuses=$_GET["modify_statuses"];}
elseif (isset($_POST["modify_statuses"]))	{$modify_statuses=$_POST["modify_statuses"];}
if (isset($_GET["modify_voicemail"]))			{$modify_voicemail=$_GET["modify_voicemail"];}
elseif (isset($_POST["modify_voicemail"]))	{$modify_voicemail=$_POST["modify_voicemail"];}
if (isset($_GET["modify_audiostore"]))			{$modify_audiostore=$_GET["modify_audiostore"];}
elseif (isset($_POST["modify_audiostore"]))	{$modify_audiostore=$_POST["modify_audiostore"];}
if (isset($_GET["modify_moh"]))				{$modify_moh=$_GET["modify_moh"];}
elseif (isset($_POST["modify_moh"]))	{$modify_moh=$_POST["modify_moh"];}
if (isset($_GET["modify_tts"]))				{$modify_tts=$_GET["modify_tts"];}
elseif (isset($_POST["modify_tts"]))	{$modify_tts=$_POST["modify_tts"];}
if (isset($_GET["action_xfer_cid"]))			{$action_xfer_cid=$_GET["action_xfer_cid"];}
elseif (isset($_POST["action_xfer_cid"]))	{$action_xfer_cid=$_POST["action_xfer_cid"];}
if (isset($_GET["drop_callmenu"]))			{$drop_callmenu=$_GET["drop_callmenu"];}
elseif (isset($_POST["drop_callmenu"]))	{$drop_callmenu=$_POST["drop_callmenu"];}
if (isset($_GET["after_hours_callmenu"]))			{$after_hours_callmenu=$_GET["after_hours_callmenu"];}
elseif (isset($_POST["after_hours_callmenu"]))	{$after_hours_callmenu=$_POST["after_hours_callmenu"];}
if (isset($_GET["dtmf_field"]))			{$dtmf_field=$_GET["dtmf_field"];}
elseif (isset($_POST["dtmf_field"]))	{$dtmf_field=$_POST["dtmf_field"];}
if (isset($_GET["call_count_limit"]))			{$call_count_limit=$_GET["call_count_limit"];}
elseif (isset($_POST["call_count_limit"]))	{$call_count_limit=$_POST["call_count_limit"];}
if (isset($_GET["call_count_target"]))			{$call_count_target=$_GET["call_count_target"];}
elseif (isset($_POST["call_count_target"]))	{$call_count_target=$_POST["call_count_target"];}
if (isset($_GET["completed"]))			{$completed=$_GET["completed"];}
elseif (isset($_POST["completed"]))	{$completed=$_POST["completed"];}
if (isset($_GET["expanded_list_stats"]))			{$expanded_list_stats=$_GET["expanded_list_stats"];}
elseif (isset($_POST["expanded_list_stats"]))	{$expanded_list_stats=$_POST["expanded_list_stats"];}
if (isset($_GET["report_option"]))			{$report_option=$_GET["report_option"];}
elseif (isset($_POST["report_option"]))	{$report_option=$_POST["report_option"];}
if (isset($_GET["preset_contact_search"]))			{$preset_contact_search=$_GET["preset_contact_search"];}
elseif (isset($_POST["preset_contact_search"]))	{$preset_contact_search=$_POST["preset_contact_search"];}
if (isset($_GET["contacts_enabled"]))			{$contacts_enabled=$_GET["contacts_enabled"];}
elseif (isset($_POST["contacts_enabled"]))	{$contacts_enabled=$_POST["contacts_enabled"];}
if (isset($_GET["contact_id"]))				{$contact_id=$_GET["contact_id"];}
elseif (isset($_POST["contact_id"]))	{$contact_id=$_POST["contact_id"];}
if (isset($_GET["first_name"]))				{$first_name=$_GET["first_name"];}
elseif (isset($_POST["first_name"]))	{$first_name=$_POST["first_name"];}
if (isset($_GET["last_name"]))				{$last_name=$_GET["last_name"];}
elseif (isset($_POST["last_name"]))		{$last_name=$_POST["last_name"];}
if (isset($_GET["office_num"]))				{$office_num=$_GET["office_num"];}
elseif (isset($_POST["office_num"]))	{$office_num=$_POST["office_num"];}
if (isset($_GET["cell_num"]))				{$cell_num=$_GET["cell_num"];}
elseif (isset($_POST["cell_num"]))		{$cell_num=$_POST["cell_num"];}
if (isset($_GET["other_num1"]))				{$other_num1=$_GET["other_num1"];}
elseif (isset($_POST["other_num1"]))	{$other_num1=$_POST["other_num1"];}
if (isset($_GET["other_num2"]))				{$other_num2=$_GET["other_num2"];}
elseif (isset($_POST["other_num2"]))	{$other_num2=$_POST["other_num2"];}
if (isset($_GET["modify_contacts"]))			{$modify_contacts=$_GET["modify_contacts"];}
elseif (isset($_POST["modify_contacts"]))	{$modify_contacts=$_POST["modify_contacts"];}
if (isset($_GET["bu_name"]))			{$bu_name=$_GET["bu_name"];}
elseif (isset($_POST["bu_name"]))	{$bu_name=$_POST["bu_name"];}
if (isset($_GET["department"]))				{$department=$_GET["department"];}
elseif (isset($_POST["department"]))	{$department=$_POST["department"];}
if (isset($_GET["job_title"]))			{$job_title=$_GET["job_title"];}
elseif (isset($_POST["job_title"]))	{$job_title=$_POST["job_title"];}
if (isset($_GET["location"]))			{$location=$_GET["location"];}
elseif (isset($_POST["location"]))	{$location=$_POST["location"];}
if (isset($_GET["callback_hours_block"]))			{$callback_hours_block=$_GET["callback_hours_block"];}
elseif (isset($_POST["callback_hours_block"]))	{$callback_hours_block=$_POST["callback_hours_block"];}
if (isset($_GET["callback_list_calltime"]))				{$callback_list_calltime=$_GET["callback_list_calltime"];}
elseif (isset($_POST["callback_list_calltime"]))	{$callback_list_calltime=$_POST["callback_list_calltime"];}
if (isset($_GET["modify_same_user_level"]))				{$modify_same_user_level=$_GET["modify_same_user_level"];}
elseif (isset($_POST["modify_same_user_level"]))	{$modify_same_user_level=$_POST["modify_same_user_level"];}
if (isset($_GET["admin_hide_lead_data"]))			{$admin_hide_lead_data=$_GET["admin_hide_lead_data"];}
elseif (isset($_POST["admin_hide_lead_data"]))	{$admin_hide_lead_data=$_POST["admin_hide_lead_data"];}
if (isset($_GET["admin_hide_phone_data"]))			{$admin_hide_phone_data=$_GET["admin_hide_phone_data"];}
elseif (isset($_POST["admin_hide_phone_data"]))	{$admin_hide_phone_data=$_POST["admin_hide_phone_data"];}
if (isset($_GET["admin_viewable_groups"]))			{$admin_viewable_groups=$_GET["admin_viewable_groups"];}
elseif (isset($_POST["admin_viewable_groups"]))	{$admin_viewable_groups=$_POST["admin_viewable_groups"];}
if (isset($_GET["admin_viewable_call_times"]))			{$admin_viewable_call_times=$_GET["admin_viewable_call_times"];}
elseif (isset($_POST["admin_viewable_call_times"]))	{$admin_viewable_call_times=$_POST["admin_viewable_call_times"];}
if (isset($_GET["max_calls_method"]))			{$max_calls_method=$_GET["max_calls_method"];}
elseif (isset($_POST["max_calls_method"]))	{$max_calls_method=$_POST["max_calls_method"];}
if (isset($_GET["max_calls_count"]))			{$max_calls_count=$_GET["max_calls_count"];}
elseif (isset($_POST["max_calls_count"]))	{$max_calls_count=$_POST["max_calls_count"];}
if (isset($_GET["max_calls_action"]))			{$max_calls_action=$_GET["max_calls_action"];}
elseif (isset($_POST["max_calls_action"]))	{$max_calls_action=$_POST["max_calls_action"];}
if (isset($_GET["territory_reset"]))			{$territory_reset=$_GET["territory_reset"];}
elseif (isset($_POST["territory_reset"]))	{$territory_reset=$_POST["territory_reset"];}
if (isset($_GET["hopper_vlc_dup_check"]))			{$hopper_vlc_dup_check=$_GET["hopper_vlc_dup_check"];}
elseif (isset($_POST["hopper_vlc_dup_check"]))	{$hopper_vlc_dup_check=$_POST["hopper_vlc_dup_check"];}
if (isset($_GET["download_max_system_stats_metric"]))			{$download_max_system_stats_metric=$_GET["download_max_system_stats_metric"];}
elseif (isset($_POST["download_max_system_stats_metric"]))	{$download_max_system_stats_metric=$_POST["download_max_system_stats_metric"];}
if (isset($_GET["download_max_system_stats_metric_name"]))			{$download_max_system_stats_metric_name=$_GET["download_max_system_stats_metric_name"];}
elseif (isset($_POST["download_max_system_stats_metric_name"]))	{$download_max_system_stats_metric_name=$_POST["download_max_system_stats_metric_name"];}
if (isset($_GET["inventory_report"]))			{$inventory_report=$_GET["inventory_report"];}
elseif (isset($_POST["inventory_report"]))	{$inventory_report=$_POST["inventory_report"];}
if (isset($_GET["report_rank"]))			{$report_rank=$_GET["report_rank"];}
elseif (isset($_POST["report_rank"]))	{$report_rank=$_POST["report_rank"];}
if (isset($_GET["in_group_dial"]))			{$in_group_dial=$_GET["in_group_dial"];}
elseif (isset($_POST["in_group_dial"]))	{$in_group_dial=$_POST["in_group_dial"];}
if (isset($_GET["in_group_dial_select"]))			{$in_group_dial_select=$_GET["in_group_dial_select"];}
elseif (isset($_POST["in_group_dial_select"]))	{$in_group_dial_select=$_POST["in_group_dial_select"];}
if (isset($_GET["dial_ingroup_cid"]))			{$dial_ingroup_cid=$_GET["dial_ingroup_cid"];}
elseif (isset($_POST["dial_ingroup_cid"]))	{$dial_ingroup_cid=$_POST["dial_ingroup_cid"];}
if (isset($_GET["allow_emails"]))			{$allow_emails=$_GET["allow_emails"];}
elseif (isset($_POST["allow_emails"]))	{$allow_emails=$_POST["allow_emails"];}
if (isset($_GET["allow_chats"]))			{$allow_chats=$_GET["allow_chats"];}
elseif (isset($_POST["allow_chats"]))	{$allow_chats=$_POST["allow_chats"];}
if (isset($_GET["chat_url"]))			{$chat_url=$_GET["chat_url"];}
elseif (isset($_POST["chat_url"]))	{$chat_url=$_POST["chat_url"];}
if (isset($_GET["chat_timeout"]))			{$chat_timeout=$_GET["chat_timeout"];}
elseif (isset($_POST["chat_timeout"]))	{$chat_timeout=$_POST["chat_timeout"];}
if (isset($_GET["manager_chat_id"]))			{$manager_chat_id=$_GET["manager_chat_id"];}
elseif (isset($_POST["manager_chat_id"]))	{$manager_chat_id=$_POST["manager_chat_id"];}
if (isset($_GET["group_handling"]))			{$group_handling=$_GET["group_handling"];}
elseif (isset($_POST["group_handling"]))	{$group_handling=$_POST["group_handling"];}
if (isset($_GET["agentcall_email"]))			{$agentcall_email=$_GET["agentcall_email"];}
elseif (isset($_POST["agentcall_email"]))	{$agentcall_email=$_POST["agentcall_email"];}
if (isset($_GET["agentcall_chat"]))			{$agentcall_chat=$_GET["agentcall_chat"];}
elseif (isset($_POST["agentcall_chat"]))	{$agentcall_chat=$_POST["agentcall_chat"];}
if (isset($_GET["modify_email_accounts"]))			{$modify_email_accounts=$_GET["modify_email_accounts"];}
elseif (isset($_POST["modify_email_accounts"]))	{$modify_email_accounts=$_POST["modify_email_accounts"];}
if (isset($_GET["safe_harbor_audio_field"]))			{$safe_harbor_audio_field=$_GET["safe_harbor_audio_field"];}
elseif (isset($_POST["safe_harbor_audio_field"]))	{$safe_harbor_audio_field=$_POST["safe_harbor_audio_field"];}
if (isset($_GET["query_date"]))			{$query_date=$_GET["query_date"];}
elseif (isset($_POST["query_date"]))	{$query_date=$_POST["query_date"];}
if (isset($_GET["end_date"]))			{$end_date=$_GET["end_date"];}
elseif (isset($_POST["end_date"]))	{$end_date=$_POST["end_date"];}
if (isset($_GET["call_menu_qualify_enabled"]))			{$call_menu_qualify_enabled=$_GET["call_menu_qualify_enabled"];}
elseif (isset($_POST["call_menu_qualify_enabled"]))	{$call_menu_qualify_enabled=$_POST["call_menu_qualify_enabled"];}
if (isset($_GET["qualify_sql"]))			{$qualify_sql=$_GET["qualify_sql"];}
elseif (isset($_POST["qualify_sql"]))	{$qualify_sql=$_POST["qualify_sql"];}
if (isset($_GET["admin_list_counts"]))			{$admin_list_counts=$_GET["admin_list_counts"];}
elseif (isset($_POST["admin_list_counts"]))	{$admin_list_counts=$_POST["admin_list_counts"];}
if (isset($_GET["voicemail_greeting"]))				{$voicemail_greeting=$_GET["voicemail_greeting"];}
elseif (isset($_POST["voicemail_greeting"]))	{$voicemail_greeting=$_POST["voicemail_greeting"];}
if (isset($_GET["old_voicemail_greeting"]))				{$old_voicemail_greeting=$_GET["old_voicemail_greeting"];}
elseif (isset($_POST["old_voicemail_greeting"]))	{$old_voicemail_greeting=$_POST["old_voicemail_greeting"];}
if (isset($_GET["allow_voicemail_greeting"]))			{$allow_voicemail_greeting=$_GET["allow_voicemail_greeting"];}
elseif (isset($_POST["allow_voicemail_greeting"]))	{$allow_voicemail_greeting=$_POST["allow_voicemail_greeting"];}
if (isset($_GET["show_vm_on_summary"]))			{$show_vm_on_summary=$_GET["show_vm_on_summary"];}
elseif (isset($_POST["show_vm_on_summary"]))	{$show_vm_on_summary=$_POST["show_vm_on_summary"];}
if (isset($_GET["pause_after_next_call"]))			{$pause_after_next_call=$_GET["pause_after_next_call"];}
elseif (isset($_POST["pause_after_next_call"]))	{$pause_after_next_call=$_POST["pause_after_next_call"];}
if (isset($_GET["owner_populate"]))				{$owner_populate=$_GET["owner_populate"];}
elseif (isset($_POST["owner_populate"]))	{$owner_populate=$_POST["owner_populate"];}
if (isset($_GET["queuemetrics_socket"]))			{$queuemetrics_socket=$_GET["queuemetrics_socket"];}
elseif (isset($_POST["queuemetrics_socket"]))	{$queuemetrics_socket=$_POST["queuemetrics_socket"];}
if (isset($_GET["queuemetrics_socket_url"]))			{$queuemetrics_socket_url=$_GET["queuemetrics_socket_url"];}
elseif (isset($_POST["queuemetrics_socket_url"]))	{$queuemetrics_socket_url=$_POST["queuemetrics_socket_url"];}
if (isset($_GET["holiday_id"]))					{$holiday_id=$_GET["holiday_id"];}
elseif (isset($_POST["holiday_id"]))		{$holiday_id=$_POST["holiday_id"];}
if (isset($_GET["holiday_name"]))				{$holiday_name=$_GET["holiday_name"];}
elseif (isset($_POST["holiday_name"]))		{$holiday_name=$_POST["holiday_name"];}
if (isset($_GET["holiday_comments"]))			{$holiday_comments=$_GET["holiday_comments"];}
elseif (isset($_POST["holiday_comments"]))	{$holiday_comments=$_POST["holiday_comments"];}
if (isset($_GET["holiday_date"]))				{$holiday_date=$_GET["holiday_date"];}
elseif (isset($_POST["holiday_date"]))		{$holiday_date=$_POST["holiday_date"];}
if (isset($_GET["holiday_status"]))				{$holiday_status=$_GET["holiday_status"];}
elseif (isset($_POST["holiday_status"]))	{$holiday_status=$_POST["holiday_status"];}
if (isset($_GET["holiday_rule"]))				{$holiday_rule=$_GET["holiday_rule"];}
elseif (isset($_POST["holiday_rule"]))		{$holiday_rule=$_POST["holiday_rule"];}
if (isset($_GET["expiration_date"]))			{$expiration_date=$_GET["expiration_date"];}
elseif (isset($_POST["expiration_date"]))	{$expiration_date=$_POST["expiration_date"];}
if (isset($_GET["use_other_campaign_dnc"]))				{$use_other_campaign_dnc=$_GET["use_other_campaign_dnc"];}
elseif (isset($_POST["use_other_campaign_dnc"]))	{$use_other_campaign_dnc=$_POST["use_other_campaign_dnc"];}
if (isset($_GET["enhanced_disconnect_logging"]))			{$enhanced_disconnect_logging=$_GET["enhanced_disconnect_logging"];}
elseif (isset($_POST["enhanced_disconnect_logging"]))	{$enhanced_disconnect_logging=$_POST["enhanced_disconnect_logging"];}
if (isset($_GET["amd_inbound_group"]))			{$amd_inbound_group=$_GET["amd_inbound_group"];}
elseif (isset($_POST["amd_inbound_group"]))	{$amd_inbound_group=$_POST["amd_inbound_group"];}
if (isset($_GET["amd_callmenu"]))				{$amd_callmenu=$_GET["amd_callmenu"];}
elseif (isset($_POST["amd_callmenu"]))		{$amd_callmenu=$_POST["amd_callmenu"];}
if (isset($_GET["level_8_disable_add"]))			{$level_8_disable_add=$_GET["level_8_disable_add"];}
elseif (isset($_POST["level_8_disable_add"]))	{$level_8_disable_add=$_POST["level_8_disable_add"];}
if (isset($_GET["survey_wait_sec"]))			{$survey_wait_sec=$_GET["survey_wait_sec"];}
elseif (isset($_POST["survey_wait_sec"]))	{$survey_wait_sec=$_POST["survey_wait_sec"];}
if (isset($_GET["queuemetrics_record_hold"]))			{$queuemetrics_record_hold=$_GET["queuemetrics_record_hold"];}
elseif (isset($_POST["queuemetrics_record_hold"]))	{$queuemetrics_record_hold=$_POST["queuemetrics_record_hold"];}
if (isset($_GET["country_code_list_stats"]))			{$country_code_list_stats=$_GET["country_code_list_stats"];}
elseif (isset($_POST["country_code_list_stats"]))	{$country_code_list_stats=$_POST["country_code_list_stats"];}
if (isset($_GET["manual_dial_lead_id"]))			{$manual_dial_lead_id=$_GET["manual_dial_lead_id"];}
elseif (isset($_POST["manual_dial_lead_id"]))	{$manual_dial_lead_id=$_POST["manual_dial_lead_id"];}
if (isset($_GET["auto_restart_asterisk"]))			{$auto_restart_asterisk=$_GET["auto_restart_asterisk"];}
elseif (isset($_POST["auto_restart_asterisk"]))	{$auto_restart_asterisk=$_POST["auto_restart_asterisk"];}
if (isset($_GET["asterisk_temp_no_restart"]))			{$asterisk_temp_no_restart=$_GET["asterisk_temp_no_restart"];}
elseif (isset($_POST["asterisk_temp_no_restart"]))	{$asterisk_temp_no_restart=$_POST["asterisk_temp_no_restart"];}
if (isset($_GET["dead_max"]))					{$dead_max=$_GET["dead_max"];}
elseif (isset($_POST["dead_max"]))			{$dead_max=$_POST["dead_max"];}
if (isset($_GET["dispo_max"]))					{$dispo_max=$_GET["dispo_max"];}
elseif (isset($_POST["dispo_max"]))			{$dispo_max=$_POST["dispo_max"];}
if (isset($_GET["pause_max"]))					{$pause_max=$_GET["pause_max"];}
elseif (isset($_POST["pause_max"]))			{$pause_max=$_POST["pause_max"];}
if (isset($_GET["dead_max_dispo"]))				{$dead_max_dispo=$_GET["dead_max_dispo"];}
elseif (isset($_POST["dead_max_dispo"]))	{$dead_max_dispo=$_POST["dead_max_dispo"];}
if (isset($_GET["dispo_max_dispo"]))			{$dispo_max_dispo=$_GET["dispo_max_dispo"];}
elseif (isset($_POST["dispo_max_dispo"]))	{$dispo_max_dispo=$_POST["dispo_max_dispo"];}
if (isset($_GET["voicemail_dump_exten_no_inst"]))			{$voicemail_dump_exten_no_inst=$_GET["voicemail_dump_exten_no_inst"];}
elseif (isset($_POST["voicemail_dump_exten_no_inst"]))	{$voicemail_dump_exten_no_inst=$_POST["voicemail_dump_exten_no_inst"];}
if (isset($_GET["voicemail_instructions"]))				{$voicemail_instructions=$_GET["voicemail_instructions"];}
elseif (isset($_POST["voicemail_instructions"]))	{$voicemail_instructions=$_POST["voicemail_instructions"];}
if (isset($_GET["alter_admin_interface_options"]))			{$alter_admin_interface_options=$_GET["alter_admin_interface_options"];}
elseif (isset($_POST["alter_admin_interface_options"]))	{$alter_admin_interface_options=$_POST["alter_admin_interface_options"];}
if (isset($_GET["filter_dnc_campaign"]))			{$filter_dnc_campaign=$_GET["filter_dnc_campaign"];}
elseif (isset($_POST["filter_dnc_campaign"]))	{$filter_dnc_campaign=$_POST["filter_dnc_campaign"];}
if (isset($_GET["filter_url_did_redirect"]))			{$filter_url_did_redirect=$_GET["filter_url_did_redirect"];}
elseif (isset($_POST["filter_url_did_redirect"]))	{$filter_url_did_redirect=$_POST["filter_url_did_redirect"];}
if (isset($_GET["max_inbound_calls"]))			{$max_inbound_calls=$_GET["max_inbound_calls"];}
elseif (isset($_POST["max_inbound_calls"]))	{$max_inbound_calls=$_POST["max_inbound_calls"];}
if (isset($_GET["manual_dial_search_checkbox"]))			{$manual_dial_search_checkbox=$_GET["manual_dial_search_checkbox"];}
elseif (isset($_POST["manual_dial_search_checkbox"]))	{$manual_dial_search_checkbox=$_POST["manual_dial_search_checkbox"];}
if (isset($_GET["hide_call_log_info"]))				{$hide_call_log_info=$_GET["hide_call_log_info"];}
elseif (isset($_POST["hide_call_log_info"]))	{$hide_call_log_info=$_POST["hide_call_log_info"];}
if (isset($_GET["modify_custom_dialplans"]))			{$modify_custom_dialplans=$_GET["modify_custom_dialplans"];}
elseif (isset($_POST["modify_custom_dialplans"]))	{$modify_custom_dialplans=$_POST["modify_custom_dialplans"];}
if (isset($_GET["queuemetrics_pause_type"]))			{$queuemetrics_pause_type=$_GET["queuemetrics_pause_type"];}
elseif (isset($_POST["queuemetrics_pause_type"]))	{$queuemetrics_pause_type=$_POST["queuemetrics_pause_type"];}
if (isset($_GET["frozen_server_call_clear"]))			{$frozen_server_call_clear=$_GET["frozen_server_call_clear"];}
elseif (isset($_POST["frozen_server_call_clear"]))	{$frozen_server_call_clear=$_POST["frozen_server_call_clear"];}
if (isset($_GET["timer_alt_seconds"]))			{$timer_alt_seconds=$_GET["timer_alt_seconds"];}
elseif (isset($_POST["timer_alt_seconds"]))	{$timer_alt_seconds=$_POST["timer_alt_seconds"];}
if (isset($_GET["wrapup_seconds_override"]))			{$wrapup_seconds_override=$_GET["wrapup_seconds_override"];}
elseif (isset($_POST["wrapup_seconds_override"]))	{$wrapup_seconds_override=$_POST["wrapup_seconds_override"];}
if (isset($_GET["no_agent_ingroup_redirect"]))			{$no_agent_ingroup_redirect=$_GET["no_agent_ingroup_redirect"];}
elseif (isset($_POST["no_agent_ingroup_redirect"]))	{$no_agent_ingroup_redirect=$_POST["no_agent_ingroup_redirect"];}
if (isset($_GET["no_agent_ingroup_id"]))			{$no_agent_ingroup_id=$_GET["no_agent_ingroup_id"];}
elseif (isset($_POST["no_agent_ingroup_id"]))	{$no_agent_ingroup_id=$_POST["no_agent_ingroup_id"];}
if (isset($_GET["no_agent_ingroup_extension"]))			{$no_agent_ingroup_extension=$_GET["no_agent_ingroup_extension"];}
elseif (isset($_POST["no_agent_ingroup_extension"]))	{$no_agent_ingroup_extension=$_POST["no_agent_ingroup_extension"];}
if (isset($_GET["pre_filter_phone_group_id"]))			{$pre_filter_phone_group_id=$_GET["pre_filter_phone_group_id"];}
elseif (isset($_POST["pre_filter_phone_group_id"]))	{$pre_filter_phone_group_id=$_POST["pre_filter_phone_group_id"];}
if (isset($_GET["pre_filter_extension"]))			{$pre_filter_extension=$_GET["pre_filter_extension"];}
elseif (isset($_POST["pre_filter_extension"]))	{$pre_filter_extension=$_POST["pre_filter_extension"];}
if (isset($_GET["wrapup_bypass"]))			{$wrapup_bypass=$_GET["wrapup_bypass"];}
elseif (isset($_POST["wrapup_bypass"]))	{$wrapup_bypass=$_POST["wrapup_bypass"];}
if (isset($_GET["wrapup_after_hotkey"]))			{$wrapup_after_hotkey=$_GET["wrapup_after_hotkey"];}
elseif (isset($_POST["wrapup_after_hotkey"]))	{$wrapup_after_hotkey=$_POST["wrapup_after_hotkey"];}
if (isset($_GET["callback_time_24hour"]))			{$callback_time_24hour=$_GET["callback_time_24hour"];}
elseif (isset($_POST["callback_time_24hour"]))	{$callback_time_24hour=$_POST["callback_time_24hour"];}
if (isset($_GET["callback_active_limit"]))			{$callback_active_limit=$_GET["callback_active_limit"];}
elseif (isset($_POST["callback_active_limit"]))	{$callback_active_limit=$_POST["callback_active_limit"];}
if (isset($_GET["callback_active_limit_override"]))				{$callback_active_limit_override=$_GET["callback_active_limit_override"];}
elseif (isset($_POST["callback_active_limit_override"]))	{$callback_active_limit_override=$_POST["callback_active_limit_override"];}
if (isset($_GET["comments_all_tabs"]))			{$comments_all_tabs=$_GET["comments_all_tabs"];}
elseif (isset($_POST["comments_all_tabs"]))	{$comments_all_tabs=$_POST["comments_all_tabs"];}
if (isset($_GET["comments_dispo_screen"]))			{$comments_dispo_screen=$_GET["comments_dispo_screen"];}
elseif (isset($_POST["comments_dispo_screen"]))	{$comments_dispo_screen=$_POST["comments_dispo_screen"];}
if (isset($_GET["comments_callback_screen"]))			{$comments_callback_screen=$_GET["comments_callback_screen"];}
elseif (isset($_POST["comments_callback_screen"]))	{$comments_callback_screen=$_POST["comments_callback_screen"];}
if (isset($_GET["qc_comment_history"]))				{$qc_comment_history=$_GET["qc_comment_history"];}
elseif (isset($_POST["qc_comment_history"]))	{$qc_comment_history=$_POST["qc_comment_history"];}
if (isset($_GET["show_previous_callback"]))				{$show_previous_callback=$_GET["show_previous_callback"];}
elseif (isset($_POST["show_previous_callback"]))	{$show_previous_callback=$_POST["show_previous_callback"];}
if (isset($_GET["clear_script"]))				{$clear_script=$_GET["clear_script"];}
elseif (isset($_POST["clear_script"]))	{$clear_script=$_POST["clear_script"];}
if (isset($_GET["modify_languages"]))			{$modify_languages=$_GET["modify_languages"];}
elseif (isset($_POST["modify_languages"]))	{$modify_languages=$_POST["modify_languages"];}
if (isset($_GET["enable_languages"]))			{$enable_languages=$_GET["enable_languages"];}
elseif (isset($_POST["enable_languages"]))	{$enable_languages=$_POST["enable_languages"];}
if (isset($_GET["cpd_unknown_action"]))				{$cpd_unknown_action=$_GET["cpd_unknown_action"];}
elseif (isset($_POST["cpd_unknown_action"]))	{$cpd_unknown_action=$_POST["cpd_unknown_action"];}
if (isset($_GET["selected_language"]))			{$selected_language=$_GET["selected_language"];}
elseif (isset($_POST["selected_language"]))	{$selected_language=$_POST["selected_language"];}
if (isset($_GET["user_choose_language"]))			{$user_choose_language=$_GET["user_choose_language"];}
elseif (isset($_POST["user_choose_language"]))	{$user_choose_language=$_POST["user_choose_language"];}
if (isset($_GET["language_method"]))			{$language_method=$_GET["language_method"];}
elseif (isset($_POST["language_method"]))	{$language_method=$_POST["language_method"];}
if (isset($_GET["ignore_group_on_search"]))				{$ignore_group_on_search=$_GET["ignore_group_on_search"];}
elseif (isset($_POST["ignore_group_on_search"]))	{$ignore_group_on_search=$_POST["ignore_group_on_search"];}
if (isset($_GET["manual_dial_search_filter"]))			{$manual_dial_search_filter=$_GET["manual_dial_search_filter"];}
elseif (isset($_POST["manual_dial_search_filter"]))	{$manual_dial_search_filter=$_POST["manual_dial_search_filter"];}
if (isset($_GET["meetme_enter_login_filename"]))			{$meetme_enter_login_filename=$_GET["meetme_enter_login_filename"];}
elseif (isset($_POST["meetme_enter_login_filename"]))	{$meetme_enter_login_filename=$_POST["meetme_enter_login_filename"];}
if (isset($_GET["meetme_enter_leave3way_filename"]))			{$meetme_enter_leave3way_filename=$_GET["meetme_enter_leave3way_filename"];}
elseif (isset($_POST["meetme_enter_leave3way_filename"]))	{$meetme_enter_leave3way_filename=$_POST["meetme_enter_leave3way_filename"];}
if (isset($_GET["enable_did_entry_list_id"]))			{$enable_did_entry_list_id=$_GET["enable_did_entry_list_id"];}
elseif (isset($_POST["enable_did_entry_list_id"]))	{$enable_did_entry_list_id=$_POST["enable_did_entry_list_id"];}
if (isset($_GET["entry_list_id"]))			{$entry_list_id=$_GET["entry_list_id"];}
elseif (isset($_POST["entry_list_id"]))	{$entry_list_id=$_POST["entry_list_id"];}
if (isset($_GET["filter_entry_list_id"]))			{$filter_entry_list_id=$_GET["filter_entry_list_id"];}
elseif (isset($_POST["filter_entry_list_id"]))	{$filter_entry_list_id=$_POST["filter_entry_list_id"];}
if (isset($_GET["allow_chats"]))			{$allow_chats=$_GET["allow_chats"];}
elseif (isset($_POST["allow_chats"]))	{$allow_chats=$_POST["allow_chats"];}
if (isset($_GET["enable_third_webform"]))			{$enable_third_webform=$_GET["enable_third_webform"];}
elseif (isset($_POST["enable_third_webform"]))	{$enable_third_webform=$_POST["enable_third_webform"];}
if (isset($_GET["web_form_address_three"]))			{$web_form_address_three=$_GET["web_form_address_three"];}
elseif (isset($_POST["web_form_address_three"]))	{$web_form_address_three=$_POST["web_form_address_three"];}
if (isset($_GET["api_list_restrict"]))			{$api_list_restrict=$_GET["api_list_restrict"];}
elseif (isset($_POST["api_list_restrict"]))	{$api_list_restrict=$_POST["api_list_restrict"];}
if (isset($_GET["api_allowed_functions"]))			{$api_allowed_functions=$_GET["api_allowed_functions"];}
elseif (isset($_POST["api_allowed_functions"]))	{$api_allowed_functions=$_POST["api_allowed_functions"];}
if (isset($_GET["manual_dial_override_field"]))			{$manual_dial_override_field=$_GET["manual_dial_override_field"];}
elseif (isset($_POST["manual_dial_override_field"]))	{$manual_dial_override_field=$_POST["manual_dial_override_field"];}
if (isset($_GET["status_display_ingroup"]))			{$status_display_ingroup=$_GET["status_display_ingroup"];}
elseif (isset($_POST["status_display_ingroup"]))	{$status_display_ingroup=$_POST["status_display_ingroup"];}
if (isset($_GET["populate_lead_ingroup"]))			{$populate_lead_ingroup=$_GET["populate_lead_ingroup"];}
elseif (isset($_POST["populate_lead_ingroup"]))	{$populate_lead_ingroup=$_POST["populate_lead_ingroup"];}
if (isset($_GET["script_color"]))			{$script_color=$_GET["script_color"];}
elseif (isset($_POST["script_color"]))	{$script_color=$_POST["script_color"];}
if (isset($_GET["customer_gone_seconds"]))			{$customer_gone_seconds=$_GET["customer_gone_seconds"];}
elseif (isset($_POST["customer_gone_seconds"]))	{$customer_gone_seconds=$_POST["customer_gone_seconds"];}
if (isset($_GET["max_queue_ingroup_calls"]))			{$max_queue_ingroup_calls=$_GET["max_queue_ingroup_calls"];}
elseif (isset($_POST["max_queue_ingroup_calls"]))	{$max_queue_ingroup_calls=$_POST["max_queue_ingroup_calls"];}
if (isset($_GET["max_queue_ingroup_id"]))			{$max_queue_ingroup_id=$_GET["max_queue_ingroup_id"];}
elseif (isset($_POST["max_queue_ingroup_id"]))	{$max_queue_ingroup_id=$_POST["max_queue_ingroup_id"];}
if (isset($_GET["max_queue_ingroup_extension"]))			{$max_queue_ingroup_extension=$_GET["max_queue_ingroup_extension"];}
elseif (isset($_POST["max_queue_ingroup_extension"]))	{$max_queue_ingroup_extension=$_POST["max_queue_ingroup_extension"];}
if (isset($_GET["agent_debug_logging"]))			{$agent_debug_logging=$_GET["agent_debug_logging"];}
elseif (isset($_POST["agent_debug_logging"]))	{$agent_debug_logging=$_POST["agent_debug_logging"];}
if (isset($_GET["agent_display_fields"]))			{$agent_display_fields=$_GET["agent_display_fields"];}
elseif (isset($_POST["agent_display_fields"]))	{$agent_display_fields=$_POST["agent_display_fields"];}
if (isset($_GET["default_language"]))			{$default_language=$_GET["default_language"];}
elseif (isset($_POST["default_language"]))	{$default_language=$_POST["default_language"];}
if (isset($_GET["agent_whisper_enabled"]))			{$agent_whisper_enabled=$_GET["agent_whisper_enabled"];}
elseif (isset($_POST["agent_whisper_enabled"]))	{$agent_whisper_enabled=$_POST["agent_whisper_enabled"];}
if (isset($_GET["drop_lead_reset"]))			{$drop_lead_reset=$_GET["drop_lead_reset"];}
elseif (isset($_POST["drop_lead_reset"]))	{$drop_lead_reset=$_POST["drop_lead_reset"];}
if (isset($_GET["after_hours_lead_reset"]))				{$after_hours_lead_reset=$_GET["after_hours_lead_reset"];}
elseif (isset($_POST["after_hours_lead_reset"]))	{$after_hours_lead_reset=$_POST["after_hours_lead_reset"];}
if (isset($_GET["nanq_lead_reset"]))			{$nanq_lead_reset=$_GET["nanq_lead_reset"];}
elseif (isset($_POST["nanq_lead_reset"]))	{$nanq_lead_reset=$_POST["nanq_lead_reset"];}
if (isset($_GET["wait_time_lead_reset"]))			{$wait_time_lead_reset=$_GET["wait_time_lead_reset"];}
elseif (isset($_POST["wait_time_lead_reset"]))	{$wait_time_lead_reset=$_POST["wait_time_lead_reset"];}
if (isset($_GET["hold_time_lead_reset"]))			{$hold_time_lead_reset=$_GET["hold_time_lead_reset"];}
elseif (isset($_POST["hold_time_lead_reset"]))	{$hold_time_lead_reset=$_POST["hold_time_lead_reset"];}
if (isset($_GET["container_id"]))			{$container_id=$_GET["container_id"];}
elseif (isset($_POST["container_id"]))	{$container_id=$_POST["container_id"];}
if (isset($_GET["container_notes"]))			{$container_notes=$_GET["container_notes"];}
elseif (isset($_POST["container_notes"]))	{$container_notes=$_POST["container_notes"];}
if (isset($_GET["container_type"]))				{$container_type=$_GET["container_type"];}
elseif (isset($_POST["container_type"]))	{$container_type=$_POST["container_type"];}
if (isset($_GET["container_entry"]))			{$container_entry=$_GET["container_entry"];}
elseif (isset($_POST["container_entry"]))	{$container_entry=$_POST["container_entry"];}
if (isset($_GET["admin_cf_show_hidden"]))			{$admin_cf_show_hidden=$_GET["admin_cf_show_hidden"];}
elseif (isset($_POST["admin_cf_show_hidden"]))	{$admin_cf_show_hidden=$_POST["admin_cf_show_hidden"];}
if (isset($_GET["user_hide_realtime_enabled"]))				{$user_hide_realtime_enabled=$_GET["user_hide_realtime_enabled"];}
elseif (isset($_POST["user_hide_realtime_enabled"]))	{$user_hide_realtime_enabled=$_POST["user_hide_realtime_enabled"];}
if (isset($_GET["user_hide_realtime"]))				{$user_hide_realtime=$_GET["user_hide_realtime"];}
elseif (isset($_POST["user_hide_realtime"]))	{$user_hide_realtime=$_POST["user_hide_realtime"];}
if (isset($_GET["did_carrier_description"]))			{$did_carrier_description=$_GET["did_carrier_description"];}
elseif (isset($_POST["did_carrier_description"]))	{$did_carrier_description=$_POST["did_carrier_description"];}
if (isset($_GET["status_group_id"]))			{$status_group_id=$_GET["status_group_id"];}
elseif (isset($_POST["status_group_id"]))	{$status_group_id=$_POST["status_group_id"];}
if (isset($_GET["status_group_notes"]))				{$status_group_notes=$_GET["status_group_notes"];}
elseif (isset($_POST["status_group_notes"]))	{$status_group_notes=$_POST["status_group_notes"];}
if (isset($_GET["min_sec"]))				{$min_sec=$_GET["min_sec"];}
elseif (isset($_POST["min_sec"]))		{$min_sec=$_POST["min_sec"];}
if (isset($_GET["max_sec"]))				{$max_sec=$_GET["max_sec"];}
elseif (isset($_POST["max_sec"]))		{$max_sec=$_POST["max_sec"];}
if (isset($_GET["usacan_phone_dialcode_fix"]))				{$usacan_phone_dialcode_fix=$_GET["usacan_phone_dialcode_fix"];}
elseif (isset($_POST["usacan_phone_dialcode_fix"]))		{$usacan_phone_dialcode_fix=$_POST["usacan_phone_dialcode_fix"];}
if (isset($_GET["am_message_wildcards"]))				{$am_message_wildcards=$_GET["am_message_wildcards"];}
elseif (isset($_POST["am_message_wildcards"]))		{$am_message_wildcards=$_POST["am_message_wildcards"];}
if (isset($_GET["cache_carrier_stats_realtime"]))				{$cache_carrier_stats_realtime=$_GET["cache_carrier_stats_realtime"];}
elseif (isset($_POST["cache_carrier_stats_realtime"]))		{$cache_carrier_stats_realtime=$_POST["cache_carrier_stats_realtime"];}
if (isset($_GET["unavail_dialplan_fwd_exten"]))					{$unavail_dialplan_fwd_exten=$_GET["unavail_dialplan_fwd_exten"];}
elseif (isset($_POST["unavail_dialplan_fwd_exten"]))		{$unavail_dialplan_fwd_exten=$_POST["unavail_dialplan_fwd_exten"];}
if (isset($_GET["unavail_dialplan_fwd_context"]))				{$unavail_dialplan_fwd_context=$_GET["unavail_dialplan_fwd_context"];}
elseif (isset($_POST["unavail_dialplan_fwd_context"]))		{$unavail_dialplan_fwd_context=$_POST["unavail_dialplan_fwd_context"];}
if (isset($_GET["nva_call_url"]))				{$nva_call_url=$_GET["nva_call_url"];}
elseif (isset($_POST["nva_call_url"]))		{$nva_call_url=$_POST["nva_call_url"];}
if (isset($_GET["nva_search_method"]))				{$nva_search_method=$_GET["nva_search_method"];}
elseif (isset($_POST["nva_search_method"]))		{$nva_search_method=$_POST["nva_search_method"];}
if (isset($_GET["nva_error_filename"]))				{$nva_error_filename=$_GET["nva_error_filename"];}
elseif (isset($_POST["nva_error_filename"]))	{$nva_error_filename=$_POST["nva_error_filename"];}
if (isset($_GET["nva_new_list_id"]))				{$nva_new_list_id=$_GET["nva_new_list_id"];}
elseif (isset($_POST["nva_new_list_id"]))		{$nva_new_list_id=$_POST["nva_new_list_id"];}
if (isset($_GET["nva_new_phone_code"]))				{$nva_new_phone_code=$_GET["nva_new_phone_code"];}
elseif (isset($_POST["nva_new_phone_code"]))	{$nva_new_phone_code=$_POST["nva_new_phone_code"];}
if (isset($_GET["nva_new_status"]))					{$nva_new_status=$_GET["nva_new_status"];}
elseif (isset($_POST["nva_new_status"]))		{$nva_new_status=$_POST["nva_new_status"];}
if (isset($_GET["gather_asterisk_output"]))				{$gather_asterisk_output=$_GET["gather_asterisk_output"];}
elseif (isset($_POST["gather_asterisk_output"]))	{$gather_asterisk_output=$_POST["gather_asterisk_output"];}
if (isset($_GET["manual_dial_timeout"]))			{$manual_dial_timeout=$_GET["manual_dial_timeout"];}
elseif (isset($_POST["manual_dial_timeout"]))	{$manual_dial_timeout=$_POST["manual_dial_timeout"];}
//add::rimpal
if (isset($_GET["script_level"]))			{$script_level=$_GET["script_level"];}
elseif (isset($_POST["script_level"]))	{$script_level=$_POST["script_level"];}
if (isset($_GET["directory_name"]))			{$directory_name=$_GET["directory_name"];}
elseif (isset($_POST["directory_name"]))	{$directory_name=$_POST["directory_name"];}
if (isset($_GET["directory_id"]))			{$directory_id=$_GET["directory_id"];}
elseif (isset($_POST["directory_id"]))	{$directory_id=$_POST["directory_id"];}

if (isset($script_id)) {$script_id= strtoupper($script_id);}
if (isset($lead_filter_id)) {$lead_filter_id = strtoupper($lead_filter_id);}
if (isset($directory_name)) {$directory_name= strtoupper($directory_name);}

if (strlen($dial_status) > 0) {$ADD='28';$status = $dial_status;}

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,enable_queuemetrics_logging,enable_vtiger_integration,qc_features_active,outbound_autodial_active,sounds_central_control_active,enable_second_webform,user_territories_active,custom_fields_enabled,admin_web_directory,webphone_url,first_login_trigger,hosted_settings,default_phone_registration_password,default_phone_login_password,default_server_password,test_campaign_calls,active_voicemail_server,voicemail_timezones,default_voicemail_timezone,default_local_gmt,campaign_cid_areacodes_enabled,pllb_grouping_limit,did_ra_extensions_enabled,expanded_list_stats,contacts_enabled,alt_log_server_ip,alt_log_dbname,alt_log_login,alt_log_pass,tables_use_alt_log_db,call_menu_qualify_enabled,admin_list_counts,allow_voicemail_greeting,svn_revision,allow_emails,level_8_disable_add,pass_key,pass_hash_enabled,disable_auto_dial,country_code_list_stats,frozen_server_call_clear,active_modules,allow_chats,enable_languages,language_method,meetme_enter_login_filename,meetme_enter_leave3way_filename,enable_did_entry_list_id,enable_third_webform,default_language,user_hide_realtime_enabled FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =							$row[0];
	$SSenable_queuemetrics_logging =		$row[1];
	$SSenable_vtiger_integration =			$row[2];
	$SSqc_features_active =					$row[3];
	$SSoutbound_autodial_active =			$row[4];
	$SSsounds_central_control_active =		$row[5];
	$SSenable_second_webform =				$row[6];
	$SSuser_territories_active =			$row[7];
	$SScustom_fields_enabled =				$row[8];
	$SSadmin_web_directory =				$row[9];
	$SSwebphone_url =						$row[10];
	$SSfirst_login_trigger =				$row[11];
	$SShosted_settings =					$row[12];
	$SSdefault_phone_registration_password =$row[13];
	$SSdefault_phone_login_password =		$row[14];
	$SSdefault_server_password =			$row[15];
	$SStest_campaign_calls =				$row[16];
	$SSactive_voicemail_server =			$row[17];
	$SSvoicemail_timezones =				$row[18];
	$SSdefault_voicemail_timezone =			$row[19];
	$SSdefault_local_gmt =					$row[20];
	$SScampaign_cid_areacodes_enabled =		$row[21];
	$SSpllb_grouping_limit =				$row[22];
	$SSdid_ra_extensions_enabled =			$row[23];
	$SSexpanded_list_stats =				$row[24];
	$SScontacts_enabled =					$row[25];
	$SSalt_log_server_ip =					$row[26];
	$SSalt_log_dbname =						$row[27];
	$SSalt_log_login =						$row[28];
	$SSalt_log_pass =						$row[29];
	$SStables_use_alt_log_db =				$row[30];
	$SScall_menu_qualify_enabled =			$row[31];
	$SSadmin_list_counts =					$row[32];
	$SSallow_voicemail_greeting =			$row[33];
	$SSsvn_revision =						$row[34];
	$SSallow_emails =						$row[35];
	$SSlevel_8_disable_add =				$row[36];
	$SSpass_key =							$row[37];
	$SSpass_hash_enabled =					$row[38];
	$SSdisable_auto_dial =					$row[39];
	$SScountry_code_list_stats =			$row[40];
	$SSfrozen_server_call_clear =			$row[41];
	$SSactive_modules =						$row[42];
	$SSallow_chats =						$row[43];
	$SSenable_languages =					$row[44];
	$SSlanguage_method =					$row[45];
	$SSmeetme_enter_login_filename =		$row[46];
	$SSmeetme_enter_leave3way_filename =	$row[47];
	$SSenable_did_entry_list_id =			$row[48];
	$SSenable_third_webform =				$row[49];
	$SSdefault_language =					$row[50];
	$SSuser_hide_realtime_enabled =			$row[51];
	}
##### END SETTINGS LOOKUP #####
###########################################


### populate pass_key if not set
if ( ($qm_conf_ct > 0) and (strlen($SSpass_key)<16) )
	{
	$SSpass_key = '';
	$possible = "0123456789abcdefghijklmnpqrstvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";  
	$i = 0; 
	$length = 16;
	while ($i < $length) 
		{ 
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		$SSpass_key .= $char;
		$i++;
		}
	$stmt="UPDATE system_settings set pass_key='$SSpass_key' where ( (pass_key is NULL) or (pass_key='') );";
	$rslt=mysql_to_mysqli($stmt, $link);
    }
    
    ######################################################################################################
######################################################################################################
#######   Form variable filtering for security and data integrity
######################################################################################################
######################################################################################################

if ($non_latin < 1)
{
### DIGITS ONLY ###
$adaptive_latest_server_time = preg_replace('/[^0-9]/','',$adaptive_latest_server_time);
$admin_hangup_enabled = preg_replace('/[^0-9]/','',$admin_hangup_enabled);
$admin_hijack_enabled = preg_replace('/[^0-9]/','',$admin_hijack_enabled);
$admin_monitor_enabled = preg_replace('/[^0-9]/','',$admin_monitor_enabled);
$AFLogging_enabled = preg_replace('/[^0-9]/','',$AFLogging_enabled);
$agent_choose_ingroups = preg_replace('/[^0-9]/','',$agent_choose_ingroups);
$agentcall_manual = preg_replace('/[^0-9]/','',$agentcall_manual);
$agentonly_callbacks = preg_replace('/[^0-9]/','',$agentonly_callbacks);
$AGI_call_logging_enabled = preg_replace('/[^0-9]/','',$AGI_call_logging_enabled);
$allcalls_delay = preg_replace('/[^0-9]/','',$allcalls_delay);
$alter_agent_interface_options = preg_replace('/[^0-9]/','',$alter_agent_interface_options);
$answer_transfer_agent = preg_replace('/[^0-9]/','',$answer_transfer_agent);
$ast_admin_access = preg_replace('/[^0-9]/','',$ast_admin_access);
$ast_delete_phones = preg_replace('/[^0-9]/','',$ast_delete_phones);
$attempt_delay = preg_replace('/[^0-9]/','',$attempt_delay);
$attempt_maximum = preg_replace('/[^0-9]/','',$attempt_maximum);
$auto_dial_next_number = preg_replace('/[^0-9]/','',$auto_dial_next_number);
$balance_trunks_offlimits = preg_replace('/[^0-9]/','',$balance_trunks_offlimits);
$call_parking_enabled = preg_replace('/[^0-9]/','',$call_parking_enabled);
$CallerID_popup_enabled = preg_replace('/[^0-9]/','',$CallerID_popup_enabled);
$campaign_detail = preg_replace('/[^0-9]/','',$campaign_detail);
$campaign_rec_exten = preg_replace('/[^0-9]/','',$campaign_rec_exten);
$campaign_vdad_exten = preg_replace('/[^0-9]/','',$campaign_vdad_exten);
$change_agent_campaign = preg_replace('/[^0-9]/','',$change_agent_campaign);
$closer_default_blended = preg_replace('/[^0-9]/','',$closer_default_blended);
$conf_exten = preg_replace('/[^0-9]/','',$conf_exten);
$conf_on_extension = preg_replace('/[^0-9]/','',$conf_on_extension);
$conferencing_enabled = preg_replace('/[^0-9]/','',$conferencing_enabled);
$ct_default_start = preg_replace('/[^0-9]/','',$ct_default_start);
$ct_default_stop = preg_replace('/[^0-9]/','',$ct_default_stop);
$ct_friday_start = preg_replace('/[^0-9]/','',$ct_friday_start);
$ct_friday_stop = preg_replace('/[^0-9]/','',$ct_friday_stop);
$ct_monday_start = preg_replace('/[^0-9]/','',$ct_monday_start);
$ct_monday_stop = preg_replace('/[^0-9]/','',$ct_monday_stop);
$ct_saturday_start = preg_replace('/[^0-9]/','',$ct_saturday_start);
$ct_saturday_stop = preg_replace('/[^0-9]/','',$ct_saturday_stop);
$ct_sunday_start = preg_replace('/[^0-9]/','',$ct_sunday_start);
$ct_sunday_stop = preg_replace('/[^0-9]/','',$ct_sunday_stop);
$ct_thursday_start = preg_replace('/[^0-9]/','',$ct_thursday_start);
$ct_thursday_stop = preg_replace('/[^0-9]/','',$ct_thursday_stop);
$ct_tuesday_start = preg_replace('/[^0-9]/','',$ct_tuesday_start);
$ct_tuesday_stop = preg_replace('/[^0-9]/','',$ct_tuesday_stop);
$ct_wednesday_start = preg_replace('/[^0-9]/','',$ct_wednesday_start);
$ct_wednesday_stop = preg_replace('/[^0-9]/','',$ct_wednesday_stop);
$DBX_port = preg_replace('/[^0-9]/','',$DBX_port);
$DBY_port = preg_replace('/[^0-9]/','',$DBY_port);
$dedicated_trunks = preg_replace('/[^0-9]/','',$dedicated_trunks);
$delete_call_times = preg_replace('/[^0-9]/','',$delete_call_times);
$delete_campaigns = preg_replace('/[^0-9]/','',$delete_campaigns);
$delete_filters = preg_replace('/[^0-9]/','',$delete_filters);
$delete_ingroups = preg_replace('/[^0-9]/','',$delete_ingroups);
$delete_lists = preg_replace('/[^0-9]/','',$delete_lists);
$delete_remote_agents = preg_replace('/[^0-9]/','',$delete_remote_agents);
$delete_scripts = preg_replace('/[^0-9]/','',$delete_scripts);
$delete_user_groups = preg_replace('/[^0-9]/','',$delete_user_groups);
$delete_users = preg_replace('/[^0-9]/','',$delete_users);
$dial_timeout = preg_replace('/[^0-9]/','',$dial_timeout);
$dialplan_number = preg_replace('/[^0-9]/','',$dialplan_number);
$enable_fast_refresh = preg_replace('/[^0-9]/','',$enable_fast_refresh);
$enable_persistant_mysql = preg_replace('/[^0-9]/','',$enable_persistant_mysql);
$fast_refresh_rate = preg_replace('/[^0-9]/','',$fast_refresh_rate);
$hopper_level = preg_replace('/[^0-9]/','',$hopper_level);
$hotkey = preg_replace('/[^0-9]/','',$hotkey);
$hotkeys_active = preg_replace('/[^0-9]/','',$hotkeys_active);
$list_id = preg_replace('/[^0-9]/','',$list_id);
$load_leads = preg_replace('/[^0-9]/','',$load_leads);
$max_vicidial_trunks = preg_replace('/[^0-9]/','',$max_vicidial_trunks);
$modify_call_times = preg_replace('/[^0-9]/','',$modify_call_times);
$modify_users = preg_replace('/[^0-9]/','',$modify_users);
$modify_campaigns = preg_replace('/[^0-9]/','',$modify_campaigns);
$modify_lists = preg_replace('/[^0-9]/','',$modify_lists);
$modify_scripts = preg_replace('/[^0-9]/','',$modify_scripts);
$modify_filters = preg_replace('/[^0-9]/','',$modify_filters);
$modify_ingroups = preg_replace('/[^0-9]/','',$modify_ingroups);
$modify_usergroups = preg_replace('/[^0-9]/','',$modify_usergroups);
$modify_remoteagents = preg_replace('/[^0-9]/','',$modify_remoteagents);
$modify_servers = preg_replace('/[^0-9]/','',$modify_servers);
$view_reports = preg_replace('/[^0-9]/','',$view_reports);
$modify_leads = preg_replace('/[^0-9]/','',$modify_leads);
$monitor_prefix = preg_replace('/[^0-9]/','',$monitor_prefix);
$number_of_lines = preg_replace('/[^0-9]/','',$number_of_lines);
$old_conf_exten = preg_replace('/[^0-9]/','',$old_conf_exten);
$outbound_cid = preg_replace('/[^0-9]/','',$outbound_cid);
$park_ext = preg_replace('/[^0-9]/','',$park_ext);
$park_on_extension = preg_replace('/[^0-9]/','',$park_on_extension);
$phone_number = preg_replace('/[^0-9]/','',$phone_number);
$QUEUE_ACTION_enabled = preg_replace('/[^0-9]/','',$QUEUE_ACTION_enabled);
$recording_exten = preg_replace('/[^0-9]/','',$recording_exten);
$remote_agent_id = preg_replace('/[^0-9]/','',$remote_agent_id);
$telnet_port = preg_replace('/[^0-9]/','',$telnet_port);
$updater_check_enabled = preg_replace('/[^0-9]/','',$updater_check_enabled);
$user_level = preg_replace('/[^0-9]/','',$user_level);
$user_switching_enabled = preg_replace('/[^0-9]/','',$user_switching_enabled);
$VDstop_rec_after_each_call = preg_replace('/[^0-9]/','',$VDstop_rec_after_each_call);
$VICIDIAL_park_on_extension = preg_replace('/[^0-9]/','',$VICIDIAL_park_on_extension);
$vicidial_recording = preg_replace('/[^0-9]/','',$vicidial_recording);
$vicidial_transfers = preg_replace('/[^0-9]/','',$vicidial_transfers);
$voicemail_button_enabled = preg_replace('/[^0-9]/','',$voicemail_button_enabled);
$voicemail_dump_exten = preg_replace('/[^0-9]/','',$voicemail_dump_exten);
$voicemail_dump_exten_no_inst = preg_replace('/[^0-9]/','',$voicemail_dump_exten_no_inst);
$voicemail_exten = preg_replace('/[^0-9]/','',$voicemail_exten);
$wrapup_seconds = preg_replace('/[^0-9]/','',$wrapup_seconds);
$use_non_latin = preg_replace('/[^0-9]/','',$use_non_latin);
$webroot_writable = preg_replace('/[^0-9]/','',$webroot_writable);
$enable_queuemetrics_logging = preg_replace('/[^0-9]/','',$enable_queuemetrics_logging);
$enable_sipsak_messages = preg_replace('/[^0-9]/','',$enable_sipsak_messages);
$allow_sipsak_messages = preg_replace('/[^0-9]/','',$allow_sipsak_messages);
$mix_container_item = preg_replace('/[^0-9]/','',$mix_container_item);
$prompt_interval = preg_replace('/[^0-9]/','',$prompt_interval);
$agent_alert_delay = preg_replace('/[^0-9]/','',$agent_alert_delay);
$manual_dial_list_id = preg_replace('/[^0-9]/','',$manual_dial_list_id);
$qc_user_level = preg_replace('/[^0-9]/','',$qc_user_level);
$qc_pass = preg_replace('/[^0-9]/','',$qc_pass);
$qc_finish = preg_replace('/[^0-9]/','',$qc_finish);
$qc_commit = preg_replace('/[^0-9]/','',$qc_commit);
$shift_start_time = preg_replace('/[^0-9]/','',$shift_start_time);
$timeclock_end_of_day = preg_replace('/[^0-9]/','',$timeclock_end_of_day);
$survey_xfer_exten = preg_replace('/[^0-9]/','',$survey_xfer_exten);
$add_timeclock_log = preg_replace('/[^0-9]/','',$add_timeclock_log);
$modify_timeclock_log = preg_replace('/[^0-9]/','',$modify_timeclock_log);
$delete_timeclock_log = preg_replace('/[^0-9]/','',$delete_timeclock_log);
$vdc_agent_api_access = preg_replace('/[^0-9]/','',$vdc_agent_api_access);
$vdc_agent_api_active = preg_replace('/[^0-9]/','',$vdc_agent_api_active);
$hold_time_option_seconds = preg_replace('/[^0-9]/','',$hold_time_option_seconds);
$hold_time_option_callback_list_id = preg_replace('/[^0-9]/','',$hold_time_option_callback_list_id);
$did_id = preg_replace('/[^0-9]/','',$did_id);
$source_did = preg_replace('/[^0-9]/','',$source_did);
$modify_inbound_dids = preg_replace('/[^0-9]/','',$modify_inbound_dids);
$delete_inbound_dids = preg_replace('/[^0-9]/','',$delete_inbound_dids);
$answer_sec_pct_rt_stat_one = preg_replace('/[^0-9]/','',$answer_sec_pct_rt_stat_one);
$answer_sec_pct_rt_stat_two = preg_replace('/[^0-9]/','',$answer_sec_pct_rt_stat_two);
$enable_vtiger_integration = preg_replace('/[^0-9]/','',$enable_vtiger_integration);
$qc_features_active = preg_replace('/[^0-9]/','',$qc_features_active);
$outbound_autodial_active = preg_replace('/[^0-9]/','',$outbound_autodial_active);
$download_lists = preg_replace('/[^0-9]/','',$download_lists);
$caller_id_number = preg_replace('/[^0-9]/','',$caller_id_number);
$outbound_calls_per_second = preg_replace('/[^0-9]/','',$outbound_calls_per_second);
$manager_shift_enforcement_override = preg_replace('/[^0-9]/','',$manager_shift_enforcement_override);
$export_reports = preg_replace('/[^0-9]/','',$export_reports);
$delete_from_dnc = preg_replace('/[^0-9]/','',$delete_from_dnc);
$menu_timeout = preg_replace('/[^0-9]/','',$menu_timeout);
$menu_time_check = preg_replace('/[^0-9]/','',$menu_time_check);
$track_in_vdac = preg_replace('/[^0-9]/','',$track_in_vdac);
$menu_repeat = preg_replace('/[^0-9]/','',$menu_repeat);
$agentonly_callback_campaign_lock = preg_replace('/[^0-9]/','',$agentonly_callback_campaign_lock);
$sounds_central_control_active = preg_replace('/[^0-9]/','',$sounds_central_control_active);
$user_territories_active = preg_replace('/[^0-9]/','',$user_territories_active);
$vicidial_recording_limit = preg_replace('/[^0-9]/','',$vicidial_recording_limit);
$allow_custom_dialplan = preg_replace('/[^0-9]/','',$allow_custom_dialplan);
$phone_ring_timeout = preg_replace('/[^0-9]/','',$phone_ring_timeout);
$enable_tts_integration = preg_replace('/[^0-9]/','',$enable_tts_integration);
$allow_alerts = preg_replace('/[^0-9]/','',$allow_alerts);
$vicidial_balance_rank = preg_replace('/[^0-9]/','',$vicidial_balance_rank);
$rank = preg_replace('/[^0-9]/','',$rank);
$enable_second_webform = preg_replace('/[^0-9]/','',$enable_second_webform);
$campaign_cid_override = preg_replace('/[^0-9]/','',$campaign_cid_override);
$agent_choose_territories = preg_replace('/[^0-9]/','',$agent_choose_territories);
$timer_action_seconds = preg_replace('/[^0-9]/','',$timer_action_seconds);
$default_webphone = preg_replace('/[^0-9]/','',$default_webphone);
$default_external_server_ip = preg_replace('/[^0-9]/','',$default_external_server_ip);
$enable_agc_xfer_log = preg_replace('/[^0-9]/','',$enable_agc_xfer_log);
$enable_agc_dispo_log = preg_replace('/[^0-9]/','',$enable_agc_dispo_log);
$callcard_enabled = preg_replace('/[^0-9]/','',$callcard_enabled);
$callcard_admin = preg_replace('/[^0-9]/','',$callcard_admin);
$extension_id = preg_replace('/[^0-9]/','',$extension_id);
$agent_choose_blended = preg_replace('/[^0-9]/','',$agent_choose_blended);
$realtime_block_user_info = preg_replace('/[^0-9]/','',$realtime_block_user_info);
$codecs_with_template = preg_replace('/[^0-9]/','',$codecs_with_template);
$custom_fields_modify = preg_replace('/[^0-9]/','',$custom_fields_modify);
$hold_time_option_minimum = preg_replace('/[^0-9]/','',$hold_time_option_minimum);
$onhold_prompt_seconds = preg_replace('/[^0-9]/','',$onhold_prompt_seconds);
$hold_time_option_prompt_seconds = preg_replace('/[^0-9]/','',$hold_time_option_prompt_seconds);
$custom_fields_enabled = preg_replace('/[^0-9]/','',$custom_fields_enabled);
$wait_time_option_seconds = preg_replace('/[^0-9]/','',$wait_time_option_seconds);
$wait_time_option_callback_list_id = preg_replace('/[^0-9]/','',$wait_time_option_callback_list_id);
$wait_time_option_prompt_seconds = preg_replace('/[^0-9]/','',$wait_time_option_prompt_seconds);
$filter_list_id = preg_replace('/[^0-9]/','',$filter_list_id);
$calculate_estimated_hold_seconds = preg_replace('/[^0-9]/','',$calculate_estimated_hold_seconds);
$customer_3way_hangup_seconds = preg_replace('/[^0-9]/','',$customer_3way_hangup_seconds);
$eht_minimum_prompt_seconds = preg_replace('/[^0-9]/','',$eht_minimum_prompt_seconds);
$admin_modify_refresh = preg_replace('/[^0-9]/','',$admin_modify_refresh);
$nocache_admin = preg_replace('/[^0-9]/','',$nocache_admin);
$generate_cross_server_exten = preg_replace('/[^0-9]/','',$generate_cross_server_exten);
$queuemetrics_addmember_enabled = preg_replace('/[^0-9]/','',$queuemetrics_addmember_enabled);
$modify_page = preg_replace('/[^0-9]/','',$modify_page);
$on_hook_ring_time = preg_replace('/[^0-9]/','',$on_hook_ring_time);
$reload_dialplan_on_servers = preg_replace('/[^0-9]/','',$reload_dialplan_on_servers);
$available_only_tally_threshold_agents = preg_replace('/[^0-9]/','',$available_only_tally_threshold_agents);
$dial_level_threshold_agents = preg_replace('/[^0-9]/','',$dial_level_threshold_agents);
$dtmf_log = preg_replace('/[^0-9]/','',$dtmf_log);
$callback_days_limit = preg_replace('/[^0-9]/','',$callback_days_limit);
$queuemetrics_pe_phone_append = preg_replace('/[^0-9]/','',$queuemetrics_pe_phone_append);
$test_campaign_calls = preg_replace('/[^0-9]/','',$test_campaign_calls);
$agents_calls_reset = preg_replace('/[^0-9]/','',$agents_calls_reset);
$campaign_cid_areacodes_enabled = preg_replace('/[^0-9]/','',$campaign_cid_areacodes_enabled);
$areacode = preg_replace('/[^0-9]/','',$areacode);
$pllb_grouping_limit = preg_replace('/[^0-9]/','',$pllb_grouping_limit);
$did_ra_extensions_enabled = preg_replace('/[^0-9]/','',$did_ra_extensions_enabled);
$modify_shifts = preg_replace('/[^0-9]/','',$modify_shifts);
$modify_phones = preg_replace('/[^0-9]/','',$modify_phones);
$modify_carriers = preg_replace('/[^0-9]/','',$modify_carriers);
$modify_labels = preg_replace('/[^0-9]/','',$modify_labels);
$modify_statuses = preg_replace('/[^0-9]/','',$modify_statuses);
$modify_voicemail = preg_replace('/[^0-9]/','',$modify_voicemail);
$modify_audiostore = preg_replace('/[^0-9]/','',$modify_audiostore);
$modify_moh = preg_replace('/[^0-9]/','',$modify_moh);
$modify_tts = preg_replace('/[^0-9]/','',$modify_tts);
$call_count_limit = preg_replace('/[^0-9]/','',$call_count_limit);
$call_count_target = preg_replace('/[^0-9]/','',$call_count_target);
$expanded_list_stats = preg_replace('/[^0-9]/','',$expanded_list_stats);
$contacts_enabled = preg_replace('/[^0-9]/','',$contacts_enabled);
$contact_id = preg_replace('/[^0-9]/','',$contact_id);
$office_num = preg_replace('/[^0-9]/','',$office_num);
$cell_num = preg_replace('/[^0-9]/','',$cell_num);
$other_num1 = preg_replace('/[^0-9]/','',$other_num1);
$other_num2 = preg_replace('/[^0-9]/','',$other_num2);
$modify_contacts = preg_replace('/[^0-9]/','',$modify_contacts);
$callback_hours_block = preg_replace('/[^0-9]/','',$callback_hours_block);
$modify_same_user_level = preg_replace('/[^0-9]/','',$modify_same_user_level);
$admin_hide_lead_data = preg_replace('/[^0-9]/','',$admin_hide_lead_data);
$max_calls_count = preg_replace('/[^0-9]/','',$max_calls_count);
$report_rank = preg_replace('/[^0-9]/','',$report_rank);
$dial_ingroup_cid = preg_replace('/[^0-9]/','',$dial_ingroup_cid);
$call_menu_qualify_enabled = preg_replace('/[^0-9]/','',$call_menu_qualify_enabled);
$admin_list_counts = preg_replace('/[^0-9]/','',$admin_list_counts);
$allow_voicemail_greeting = preg_replace('/[^0-9]/','',$allow_voicemail_greeting);
$enhanced_disconnect_logging = preg_replace('/[^0-9]/','',$enhanced_disconnect_logging);
$level_8_disable_add = preg_replace('/[^0-9]/','',$level_8_disable_add);
$survey_wait_sec = preg_replace('/[^0-9]/','',$survey_wait_sec);
$queuemetrics_record_hold = preg_replace('/[^0-9]/','',$queuemetrics_record_hold);
$country_code_list_stats = preg_replace('/[^0-9]/','',$country_code_list_stats);
$dead_max = preg_replace('/[^0-9]/','',$dead_max);
$dispo_max = preg_replace('/[^0-9]/','',$dispo_max);
$pause_max = preg_replace('/[^0-9]/','',$pause_max);
$alter_admin_interface_options = preg_replace('/[^0-9]/','',$alter_admin_interface_options);
$max_inbound_calls = preg_replace('/[^0-9]/','',$max_inbound_calls);
$modify_custom_dialplans = preg_replace('/[^0-9]/','',$modify_custom_dialplans);
$queuemetrics_pause_type = preg_replace('/[^0-9]/','',$queuemetrics_pause_type);
$frozen_server_call_clear = preg_replace('/[^0-9]/','',$frozen_server_call_clear);
$callback_time_24hour = preg_replace('/[^0-9]/','',$callback_time_24hour);
$callback_active_limit = preg_replace('/[^0-9]/','',$callback_active_limit);
$modify_languages = preg_replace('/[^0-9]/','',$modify_languages);
$enable_languages = preg_replace('/[^0-9]/','',$enable_languages);
$user_choose_language = preg_replace('/[^0-9]/','',$user_choose_language);
$ignore_group_on_search = preg_replace('/[^0-9]/','',$ignore_group_on_search);
$enable_did_entry_list_id = preg_replace('/[^0-9]/','',$enable_did_entry_list_id);
$entry_list_id = preg_replace('/[^0-9]/','',$entry_list_id);
$filter_entry_list_id = preg_replace('/[^0-9]/','',$filter_entry_list_id);
$enable_third_webform = preg_replace('/[^0-9]/','',$enable_third_webform);
$api_list_restrict = preg_replace('/[^0-9]/','',$api_list_restrict);
$customer_gone_seconds = preg_replace('/[^0-9]/','',$customer_gone_seconds);
$agent_whisper_enabled = preg_replace('/[^0-9]/','',$agent_whisper_enabled);
$admin_cf_show_hidden = preg_replace('/[^0-9]/','',$admin_cf_show_hidden);
$agentcall_chat = preg_replace('/[^0-9]/','',$agentcall_chat);
$user_hide_realtime_enabled = preg_replace('/[^0-9]/','',$user_hide_realtime_enabled);
$user_hide_realtime = preg_replace('/[^0-9]/','',$user_hide_realtime);
$min_sec = preg_replace('/[^0-9]/','',$min_sec);
$max_sec = preg_replace('/[^0-9]/','',$max_sec);
$usacan_phone_dialcode_fix = preg_replace('/[^0-9]/','',$usacan_phone_dialcode_fix);
$cache_carrier_stats_realtime = preg_replace('/[^0-9]/','',$cache_carrier_stats_realtime);
$nva_new_list_id = preg_replace('/[^0-9]/','',$nva_new_list_id);
$nva_new_phone_code = preg_replace('/[^0-9]/','',$nva_new_phone_code);
$manual_dial_timeout = preg_replace('/[^0-9]/','',$manual_dial_timeout);

$drop_call_seconds = preg_replace('/[^-0-9]/','',$drop_call_seconds);
$timer_alt_seconds = preg_replace('/[^-0-9]/','',$timer_alt_seconds);
$wrapup_seconds_override = preg_replace('/[^-0-9]/','',$wrapup_seconds_override);
$max_queue_ingroup_calls = preg_replace('/[^-0-9]/','',$max_queue_ingroup_calls);

### DIGITS and COLONS
$shift_length = preg_replace('/[^\:0-9]/','',$shift_length);

### DIGITS and HASHES and STARS
$survey_dtmf_digits = preg_replace('/[^\#\*0-9]/','',$survey_dtmf_digits);
$survey_ni_digit = preg_replace('/[^\#\*0-9]/','',$survey_ni_digit);

### DIGITS and DASHES
$group_rank = preg_replace('/[^-0-9]/','',$group_rank);
$campaign_rank = preg_replace('/[^-0-9]/','',$campaign_rank);
$queue_priority = preg_replace('/[^-0-9]/','',$queue_priority);

### Y or N ONLY ###
$allow_closers = preg_replace('/[^NY]/','',$allow_closers);
$reset_hopper = preg_replace('/[^NY]/','',$reset_hopper);
$amd_send_to_vmx = preg_replace('/[^NY]/','',$amd_send_to_vmx);
$selectable = preg_replace('/[^NY]/','',$selectable);
$reset_list = preg_replace('/[^NY]/','',$reset_list);
$fronter_display = preg_replace('/[^NY]/','',$fronter_display);
$omit_phone_code = preg_replace('/[^NY]/','',$omit_phone_code);
$available_only_ratio_tally = preg_replace('/[^NY]/','',$available_only_ratio_tally);
$sys_perf_log = preg_replace('/[^NY]/','',$sys_perf_log);
$vicidial_balance_active = preg_replace('/[^NY]/','',$vicidial_balance_active);
$vd_server_logs = preg_replace('/[^NY]/','',$vd_server_logs);
$campaign_stats_refresh = preg_replace('/[^NY]/','',$campaign_stats_refresh);
$disable_alter_custdata = preg_replace('/[^NY]/','',$disable_alter_custdata);
$no_hopper_leads_logins = preg_replace('/[^NY]/','',$no_hopper_leads_logins);
$human_answered = preg_replace('/[^NY]/','',$human_answered);
$tovdad_display = preg_replace('/[^NY]/','',$tovdad_display);
$campaign_allow_inbound = preg_replace('/[^NY]/','',$campaign_allow_inbound);
$old_campaign_allow_inbound = preg_replace('/[^NY]/','',$old_campaign_allow_inbound);
$display_queue_count = preg_replace('/[^NY]/','',$display_queue_count);
$qc_show_recording = preg_replace('/[^NY]/','',$qc_show_recording);
$sale_category = preg_replace('/[^NY]/','',$sale_category);
$dead_lead_category = preg_replace('/[^NY]/','',$dead_lead_category);
$agent_extended_alt_dial  = preg_replace('/[^NY]/','',$agent_extended_alt_dial);
$play_place_in_line  = preg_replace('/[^NY]/','',$play_place_in_line);
$play_estimate_hold_time  = preg_replace('/[^NY]/','',$play_estimate_hold_time);
$no_delay_call_route  = preg_replace('/[^NY]/','',$no_delay_call_route);
$did_active  = preg_replace('/[^NY]/','',$did_active);
$active_asterisk_server = preg_replace('/[^NY]/','',$active_asterisk_server);
$generate_vicidial_conf = preg_replace('/[^NY]/','',$generate_vicidial_conf);
$rebuild_conf_files = preg_replace('/[^NY]/','',$rebuild_conf_files);
$agent_allow_group_alias = preg_replace('/[^NY]/','',$agent_allow_group_alias);
$vtiger_status_call = preg_replace('/[^NY]/','',$vtiger_status_call);
$sale = preg_replace('/[^NY]/','',$sale);
$dnc = preg_replace('/[^NY]/','',$dnc);
$customer_contact = preg_replace('/[^NY]/','',$customer_contact);
$not_interested = preg_replace('/[^NY]/','',$not_interested);
$unworkable = preg_replace('/[^NY]/','',$unworkable);
$sounds_update = preg_replace('/[^NY]/','',$sounds_update);
$carrier_logging_active = preg_replace('/[^NY]/','',$carrier_logging_active);
$agent_status_view_time = preg_replace('/[^NY]/','',$agent_status_view_time);
$no_hopper_dialing = preg_replace('/[^NY]/','',$no_hopper_dialing);
$agent_display_dialable_leads = preg_replace('/[^NY]/','',$agent_display_dialable_leads);
$random = preg_replace('/[^NY]/','',$random);
$rebuild_music_on_hold = preg_replace('/[^NY]/','',$rebuild_music_on_hold);
$active_agent_login_server = preg_replace('/[^NY]/','',$active_agent_login_server);
$agent_select_territories = preg_replace('/[^NY]/','',$agent_select_territories);
$delete_vm_after_email = preg_replace('/[^NY]/','',$delete_vm_after_email);
$crm_popup_login = preg_replace('/[^NY]/','',$crm_popup_login);
$ignore_list_script_override = preg_replace('/[^NY]/','',$ignore_list_script_override);
$is_webphone = preg_replace('/[^-_0-9a-zA-Z]/','',$is_webphone);
$use_external_server_ip = preg_replace('/[^NY]/','',$use_external_server_ip);
$agent_xfer_consultative = preg_replace('/[^NY]/','',$agent_xfer_consultative);
$agent_xfer_dial_override = preg_replace('/[^NY]/','',$agent_xfer_dial_override);
$agent_xfer_vm_transfer = preg_replace('/[^NY]/','',$agent_xfer_vm_transfer);
$agent_xfer_blind_transfer = preg_replace('/[^NY]/','',$agent_xfer_blind_transfer);
$agent_xfer_dial_with_customer = preg_replace('/[^NY]/','',$agent_xfer_dial_with_customer);
$agent_xfer_park_customer_dial = preg_replace('/[^NY]/','',$agent_xfer_park_customer_dial);
$agent_fullscreen = preg_replace('/[^NY]/','',$agent_fullscreen);
$extension_appended_cidname = preg_replace('/[^NY]/','',$extension_appended_cidname);
$onhold_prompt_no_block = preg_replace('/[^NY]/','',$onhold_prompt_no_block);
$hold_time_option_no_block = preg_replace('/[^NY]/','',$hold_time_option_no_block);
$wait_time_option_no_block = preg_replace('/[^NY]/','',$wait_time_option_no_block);
$preset_hide_number = preg_replace('/[^NY]/','',$preset_hide_number);
$use_auto_hopper = preg_replace('/[^NY]/','',$use_auto_hopper);
$auto_trim_hopper = preg_replace('/[^NY]/','',$auto_trim_hopper);
$force_change_password = preg_replace('/[^NY]/','',$force_change_password);
$first_login_trigger = preg_replace('/[^NY]/','',$first_login_trigger);
$eht_minimum_prompt_no_block = preg_replace('/[^NY]/','',$eht_minimum_prompt_no_block);
$lead_order_randomize = preg_replace('/[^NY]/','',$lead_order_randomize);
$on_hook_agent = preg_replace('/[^NY]/','',$on_hook_agent);
$auto_pause_precall = preg_replace('/[^NY]/','',$auto_pause_precall);
$auto_resume_precall = preg_replace('/[^NY]/','',$auto_resume_precall);
$webphone_auto_answer = preg_replace('/[^NY]/','',$webphone_auto_answer);
$noanswer_log = preg_replace('/[^NY]/','',$noanswer_log);
$did_agent_log = preg_replace('/[^NY]/','',$did_agent_log);
$completed = preg_replace('/[^NY]/','',$completed);
$report_option = preg_replace('/[^NY]/','',$report_option);
$hopper_vlc_dup_check = preg_replace('/[^NY]/','',$hopper_vlc_dup_check);
$inventory_report = preg_replace('/[^NY]/','',$inventory_report);
$manual_dial_lead_id = preg_replace('/[^NY]/','',$manual_dial_lead_id);
$auto_restart_asterisk = preg_replace('/[^NY]/','',$auto_restart_asterisk);
$asterisk_temp_no_restart = preg_replace('/[^NY]/','',$asterisk_temp_no_restart);
$voicemail_instructions = preg_replace('/[^NY]/','',$voicemail_instructions);
$filter_url_did_redirect = preg_replace('/[^NY]/','',$filter_url_did_redirect);
$hide_call_log_info = preg_replace('/[^NY]/','',$hide_call_log_info);
$callback_active_limit_override = preg_replace('/[^NY]/','',$callback_active_limit_override);
$drop_lead_reset = preg_replace('/[^NY]/','',$drop_lead_reset);
$after_hours_lead_reset = preg_replace('/[^NY]/','',$after_hours_lead_reset);
$nanq_lead_reset = preg_replace('/[^NY]/','',$nanq_lead_reset);
$wait_time_lead_reset = preg_replace('/[^NY]/','',$wait_time_lead_reset);
$hold_time_lead_reset = preg_replace('/[^NY]/','',$hold_time_lead_reset);
$am_message_wildcards = preg_replace('/[^NY]/','',$am_message_wildcards);
$gather_asterisk_output = preg_replace('/[^NY]/','',$gather_asterisk_output);

$qc_enabled = preg_replace('/[^0-9NY]/','',$qc_enabled);
$active = preg_replace('/[^0-9NY]/','',$active);


### ALPHA-NUMERIC ONLY ###
$script_id = preg_replace('/[^0-9a-zA-Z]/','',$script_id);
$agent_script_override = preg_replace('/[^0-9a-zA-Z]/','',$agent_script_override);
$campaign_script = preg_replace('/[^0-9a-zA-Z]/','',$campaign_script);
$submit = preg_replace('/[^0-9a-zA-Z]/','',$submit);
$campaign_cid = preg_replace('/[^0-9a-zA-Z]/','',$campaign_cid);
$get_call_launch = preg_replace('/[^0-9a-zA-Z]/','',$get_call_launch);
$campaign_recording = preg_replace('/[^0-9a-zA-Z]/','',$campaign_recording);
$ADD = preg_replace('/[^0-9a-zA-Z]/','',$ADD);
$dial_prefix = preg_replace('/[^0-9a-zA-Z]/','',$dial_prefix);
$state_call_time_state = preg_replace('/[^0-9a-zA-Z]/','',$state_call_time_state);
$scheduled_callbacks = preg_replace('/[^0-9a-zA-Z]/','',$scheduled_callbacks);
$concurrent_transfers = preg_replace('/[^0-9a-zA-Z]/','',$concurrent_transfers);
$billable = preg_replace('/[^0-9a-zA-Z]/','',$billable);
$pause_code = preg_replace('/[^0-9a-zA-Z]/','',$pause_code);
$vicidial_recording_override = preg_replace('/[^0-9a-zA-Z]/','',$vicidial_recording_override);
$ingroup_recording_override = preg_replace('/[^0-9a-zA-Z]/','',$ingroup_recording_override);
$queuemetrics_log_id = preg_replace('/[^0-9a-zA-Z]/','',$queuemetrics_log_id);
$after_hours_exten = preg_replace('/[^0-9a-zA-Z]/','',$after_hours_exten);
$after_hours_voicemail = preg_replace('/[^0-9a-zA-Z]/','',$after_hours_voicemail);
$qc_script = preg_replace('/[^0-9a-zA-Z]/','',$qc_script);
$code = preg_replace('/[^0-9a-zA-Z]/','',$code);
$survey_no_response_action = preg_replace('/[^0-9a-zA-Z]/','',$survey_no_response_action);
$survey_ni_status = preg_replace('/[^0-9a-zA-Z]/','',$survey_ni_status);
$qc_get_record_launch = preg_replace('/[^0-9a-zA-Z]/','',$qc_get_record_launch);
$agent_pause_codes_active = preg_replace('/[^0-9a-zA-Z]/','',$agent_pause_codes_active);
$three_way_dial_prefix = preg_replace('/[^0-9a-zA-Z]/','',$three_way_dial_prefix);
$agent_shift_enforcement_override = preg_replace('/[^0-9a-zA-Z]/','',$agent_shift_enforcement_override);
$survey_third_status = preg_replace('/[^0-9a-zA-Z]/','',$survey_third_status);
$survey_fourth_status = preg_replace('/[^0-9a-zA-Z]/','',$survey_fourth_status);
$sounds_web_directory = preg_replace('/[^0-9a-zA-Z]/','',$sounds_web_directory);
$disable_alter_custphone = preg_replace('/[^0-9a-zA-Z]/','',$disable_alter_custphone);
$view_calls_in_queue = preg_replace('/[^0-9a-zA-Z]/','',$view_calls_in_queue);
$view_calls_in_queue_launch = preg_replace('/[^0-9a-zA-Z]/','',$view_calls_in_queue_launch);
$grab_calls_in_queue = preg_replace('/[^0-9a-zA-Z]/','',$grab_calls_in_queue);
$call_requeue_button = preg_replace('/[^0-9a-zA-Z]/','',$call_requeue_button);
$pause_after_each_call = preg_replace('/[^0-9a-zA-Z]/','',$pause_after_each_call);
$use_internal_dnc = preg_replace('/[^0-9a-zA-Z]/','',$use_internal_dnc);
$use_campaign_dnc = preg_replace('/[^0-9a-zA-Z]/','',$use_campaign_dnc);
$voicemail_id = preg_replace('/[^0-9a-zA-Z]/','',$voicemail_id);
$status_id = preg_replace('/[^0-9a-zA-Z]/','',$status_id);
$agent_call_log_view = preg_replace('/[^0-9a-zA-Z]/','',$agent_call_log_view);
$agent_call_log_view_override = preg_replace('/[^0-9a-zA-Z]/','',$agent_call_log_view_override);
$queuemetrics_loginout = preg_replace('/[^0-9a-zA-Z]/','',$queuemetrics_loginout);
$queuemetrics_callstatus = preg_replace('/[^0-9a-zA-Z]/','',$queuemetrics_callstatus);
$enable_xfer_presets = preg_replace('/[^0-9a-zA-Z]/','',$enable_xfer_presets);
$hide_xfer_number_to_dial = preg_replace('/[^0-9a-zA-Z]/','',$hide_xfer_number_to_dial);
$manual_dial_prefix = preg_replace('/[^0-9a-zA-Z]/','',$manual_dial_prefix);
$customer_3way_hangup_logging = preg_replace('/[^0-9a-zA-Z]/','',$customer_3way_hangup_logging);
$customer_3way_hangup_action = preg_replace('/[^0-9a-zA-Z]/','',$customer_3way_hangup_action);
$queuemetrics_dispo_pause = preg_replace('/[^0-9a-zA-Z]/','',$queuemetrics_dispo_pause);
$per_call_notes = preg_replace('/[^0-9a-zA-Z]/','',$per_call_notes);
$my_callback_option = preg_replace('/[^0-9a-zA-Z]/','',$my_callback_option);
$auto_pause_precall_code = preg_replace('/[^0-9a-zA-Z]/','',$auto_pause_precall_code);
$disable_dispo_status = preg_replace('/[^0-9a-zA-Z]/','',$disable_dispo_status);
$use_custom_cid = preg_replace('/[^0-9a-zA-Z]/','',$use_custom_cid);
$action_xfer_cid = preg_replace('/[^0-9a-zA-Z]/','',$action_xfer_cid);
$callback_list_calltime = preg_replace('/[^0-9a-zA-Z]/','',$callback_list_calltime);
$pause_after_next_call = preg_replace('/[^0-9a-zA-Z]/','',$pause_after_next_call);
$owner_populate = preg_replace('/[^0-9a-zA-Z]/','',$owner_populate);
$use_other_campaign_dnc = preg_replace('/[^0-9a-zA-Z]/','',$use_other_campaign_dnc);
$dead_max_dispo = preg_replace('/[^0-9a-zA-Z]/','',$dead_max_dispo);
$dispo_max_dispo = preg_replace('/[^0-9a-zA-Z]/','',$dispo_max_dispo);
$wrapup_bypass = preg_replace('/[^0-9a-zA-Z]/','',$wrapup_bypass);
$wrapup_after_hotkey = preg_replace('/[^0-9a-zA-Z]/','',$wrapup_after_hotkey);
$show_previous_callback = preg_replace('/[^0-9a-zA-Z]/','',$show_previous_callback);
$clear_script = preg_replace('/[^0-9a-zA-Z]/','',$clear_script);
$allow_chats = preg_replace('/[^0-9a-zA-Z]/','',$allow_chats);
$allow_emails = preg_replace('/[^0-9a-zA-Z]/','',$allow_emails);
$status_display_ingroup = preg_replace('/[^0-9a-zA-Z]/','',$status_display_ingroup);
$populate_lead_ingroup = preg_replace('/[^0-9a-zA-Z]/','',$populate_lead_ingroup);
$nva_new_status = preg_replace('/[^0-9a-zA-Z]/','',$nva_new_status);

### DIGITS and Dots
$server_ip = preg_replace('/[^\.0-9]/','',$server_ip);
$auto_dial_level = preg_replace('/[^\.0-9]/','',$auto_dial_level);
$adaptive_maximum_level = preg_replace('/[^\.0-9]/','',$adaptive_maximum_level);
$phone_ip = preg_replace('/[^\.0-9]/','',$phone_ip);
$old_server_ip = preg_replace('/[^\.0-9]/','',$old_server_ip);
$computer_ip = preg_replace('/[^\.0-9]/','',$computer_ip);
$queuemetrics_server_ip = preg_replace('/[^\.0-9]/','',$queuemetrics_server_ip);
$vtiger_server_ip = preg_replace('/[^\.0-9]/','',$vtiger_server_ip);
$active_voicemail_server = preg_replace('/[^\.0-9]/','',$active_voicemail_server);
$auto_dial_limit = preg_replace('/[^\.0-9]/','',$auto_dial_limit);
$adaptive_dropped_percentage = preg_replace('/[^\.0-9]/','',$adaptive_dropped_percentage);
$drop_lockout_time = preg_replace('/[^\.0-9]/','',$drop_lockout_time);
$filter_server_ip = preg_replace('/[^\.0-9]/','',$filter_server_ip);
$auto_hopper_multi = preg_replace('/[^\.0-9]/','',$auto_hopper_multi);

### ALPHA-NUMERIC and spaces and hash and star and comma
$xferconf_a_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$xferconf_a_dtmf);
$xferconf_b_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$xferconf_b_dtmf);
$xferconf_c_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$xferconf_c_dtmf);
$xferconf_d_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$xferconf_d_dtmf);
$xferconf_e_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$xferconf_e_dtmf);
$survey_third_digit = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$survey_third_digit);
$survey_fourth_digit = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$survey_fourth_digit);
$survey_third_exten = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$survey_third_exten);
$survey_fourth_exten = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$survey_fourth_exten);
$preset_dtmf = preg_replace('/[^ \,\*\#0-9a-zA-Z]/','',$preset_dtmf);


### ALPHACAPS-NUMERIC
$xferconf_a_number = preg_replace('/[^0-9A-Z]/','',$xferconf_a_number);
$xferconf_b_number = preg_replace('/[^0-9A-Z]/','',$xferconf_b_number);

### ALPHA-NUMERIC and underscore and dash
$agi_output = preg_replace('/[^-_0-9a-zA-Z]/','',$agi_output);
$ASTmgrSECRET = preg_replace('/[^-_0-9a-zA-Z]/','',$ASTmgrSECRET);
$ASTmgrUSERNAME = preg_replace('/[^-_0-9a-zA-Z]/','',$ASTmgrUSERNAME);
$ASTmgrUSERNAMElisten = preg_replace('/[^-_0-9a-zA-Z]/','',$ASTmgrUSERNAMElisten);
$ASTmgrUSERNAMEsend = preg_replace('/[^-_0-9a-zA-Z]/','',$ASTmgrUSERNAMEsend);
$ASTmgrUSERNAMEupdate = preg_replace('/[^-_0-9a-zA-Z]/','',$ASTmgrUSERNAMEupdate);
$call_time_id = preg_replace('/[^-_0-9a-zA-Z]/','',$call_time_id);
$campaign_id = preg_replace('/[^-_0-9a-zA-Z]/','',$campaign_id);
$CoNfIrM = preg_replace('/[^-_0-9a-zA-Z]/','',$CoNfIrM);
$DBX_database = preg_replace('/[^-_0-9a-zA-Z]/','',$DBX_database);
$DBX_pass = preg_replace('/[^-_0-9a-zA-Z]/','',$DBX_pass);
$DBX_user = preg_replace('/[^-_0-9a-zA-Z]/','',$DBX_user);
$DBY_database = preg_replace('/[^-_0-9a-zA-Z]/','',$DBY_database);
$DBY_pass = preg_replace('/[^-_0-9a-zA-Z]/','',$DBY_pass);
$DBY_user = preg_replace('/[^-_0-9a-zA-Z]/','',$DBY_user);
$dial_method = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_method);
$dial_status_a = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status_a);
$dial_status_b = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status_b);
$dial_status_c = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status_c);
$dial_status_d = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status_d);
$dial_status_e = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status_e);
$ext_context = preg_replace('/[^-_0-9a-zA-Z]/','',$ext_context);
$group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$group_id);
$lead_filter_id = preg_replace('/[^-_0-9a-zA-Z]/','',$lead_filter_id);
$local_call_time = preg_replace('/[^-_0-9a-zA-Z]/','',$local_call_time);
$login = preg_replace('/[^-_0-9a-zA-Z]/','',$login);
$login_campaign = preg_replace('/[^-_0-9a-zA-Z]/','',$login_campaign);
$login_pass = preg_replace('/[^-_0-9a-zA-Z]/','',$login_pass);
$login_user = preg_replace('/[^-_0-9a-zA-Z]/','',$login_user);
$next_agent_call = preg_replace('/[^-_0-9a-zA-Z]/','',$next_agent_call);
$old_campaign_id = preg_replace('/[^-_0-9a-zA-Z]/','',$old_campaign_id);
$old_server_id = preg_replace('/[^-_0-9a-zA-Z]/','',$old_server_id);
$OLDuser_group = preg_replace('/[^-_0-9a-zA-Z]/','',$OLDuser_group);
$park_file_name = preg_replace('/[^-_0-9a-zA-Z]/','',$park_file_name);
$pass = preg_replace('/[^-_0-9a-zA-Z]/','',$pass);
$phone_login = preg_replace('/[^-_0-9a-zA-Z]/','',$phone_login);
$phone_pass = preg_replace('/[^-_0-9a-zA-Z]/','',$phone_pass);
$PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/','',$PHP_AUTH_PW);
$PHP_AUTH_USER = preg_replace('/[^-_0-9a-zA-Z]/','',$PHP_AUTH_USER);
$protocol = preg_replace('/[^-_0-9a-zA-Z]/','',$protocol);
$server_id = preg_replace('/[^-_0-9a-zA-Z]/','',$server_id);
$stage = preg_replace('/[^-_0-9a-zA-Z]/','',$stage);
$state_rule = preg_replace('/[^-_0-9a-zA-Z]/','',$state_rule);
$holiday_rule = preg_replace('/[^-_0-9a-zA-Z]/','',$holiday_rule);
$trunk_restriction = preg_replace('/[^-_0-9a-zA-Z]/','',$trunk_restriction);
$user = preg_replace('/[^-_0-9a-zA-Z]/','',$user);
$user_group = preg_replace('/[^-_0-9a-zA-Z]/','',$user_group);
$VICIDIAL_park_on_filename = preg_replace('/[^-_0-9a-zA-Z]/','',$VICIDIAL_park_on_filename);
$auto_alt_dial = preg_replace('/[^-_0-9a-zA-Z]/','',$auto_alt_dial);
$dial_status = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_status);
$queuemetrics_eq_prepend = preg_replace('/[^-_0-9a-zA-Z]/','',$queuemetrics_eq_prepend);
$vicidial_agent_disable = preg_replace('/[^-_0-9a-zA-Z]/','',$vicidial_agent_disable);
$alter_custdata_override = preg_replace('/[^-_0-9a-zA-Z]/','',$alter_custdata_override);
$list_order_mix = preg_replace('/[^-_0-9a-zA-Z]/','',$list_order_mix);
$vcl_id = preg_replace('/[^-_0-9a-zA-Z]/','',$vcl_id);
$mix_method = preg_replace('/[^-_0-9a-zA-Z]/','',$mix_method);
$category = preg_replace('/[^-_0-9a-zA-Z]/','',$category);
$vsc_id = preg_replace('/[^-_0-9a-zA-Z]/','',$vsc_id);
$moh_context = preg_replace('/[^-_0-9a-zA-Z]/','',$moh_context);
$source_campaign_id = preg_replace('/[^-_0-9a-zA-Z]/','',$source_campaign_id);
$source_user_id = preg_replace('/[^-_0-9a-zA-Z]/','',$source_user_id);
$source_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$source_group_id);
$default_xfer_group = preg_replace('/[^-_0-9a-zA-Z]/','',$default_xfer_group);
$drop_exten = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_exten);
$safe_harbor_exten = preg_replace('/[^-_0-9a-zA-Z]/','',$safe_harbor_exten);
$drop_action = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_action);
$drop_inbound_group = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_inbound_group);
$afterhours_xfer_group = preg_replace('/[^-_0-9a-zA-Z]/','',$afterhours_xfer_group);
$after_hours_action = preg_replace('/[^-_0-9a-zA-Z]/','',$after_hours_action);
$alias_id = preg_replace('/[^-_0-9a-zA-Z]/','',$alias_id);
$shift_id = preg_replace('/[^-_0-9a-zA-Z]/','',$shift_id);
$qc_shift_id = preg_replace('/[^-_0-9a-zA-Z]/','',$qc_shift_id);
$survey_method = preg_replace('/[^-_0-9a-zA-Z]/','',$survey_method);
$alter_custphone_override = preg_replace('/[^-_0-9a-zA-Z]/','',$alter_custphone_override);
$manual_dial_filter = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_filter);
$manual_dial_search_filter = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_search_filter);
$agent_clipboard_copy = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_clipboard_copy);
$hold_time_option = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_option);
$hold_time_option_xfer_group = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_option_xfer_group);
$hold_recall_xfer_group = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_recall_xfer_group);
$play_welcome_message = preg_replace('/[^-_0-9a-zA-Z]/','',$play_welcome_message);
$did_route = preg_replace('/[^-_0-9a-zA-Z]/','',$did_route);
$user_unavailable_action = preg_replace('/[^-_0-9a-zA-Z]/','',$user_unavailable_action);
$user_route_settings_ingroup = preg_replace('/[^-_0-9a-zA-Z]/','',$user_route_settings_ingroup);
$call_handle_method = preg_replace('/[^-_0-9a-zA-Z]/','',$call_handle_method);
$agent_search_method = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_search_method);
$hold_time_option_voicemail = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_option_voicemail);
$exten_context = preg_replace('/[^-_0-9a-zA-Z]/','',$exten_context);
$three_way_call_cid = preg_replace('/[^-_0-9a-zA-Z]/','',$three_way_call_cid);
$web_form_target = preg_replace('/[^-_0-9a-zA-Z]/','',$web_form_target);
$recording_web_link = preg_replace('/[^-_0-9a-zA-Z]/','',$recording_web_link);
$vtiger_search_category = preg_replace('/[^-_0-9a-zA-Z]/','',$vtiger_search_category);
$vtiger_create_call_record = preg_replace('/[^-_0-9a-zA-Z]/','',$vtiger_create_call_record);
$vtiger_create_lead_record = preg_replace('/[^-_0-9a-zA-Z]/','',$vtiger_create_lead_record);
$vtiger_screen_login = preg_replace('/[^-_0-9a-zA-Z]/','',$vtiger_screen_login);
$cpd_amd_action = preg_replace('/[^-_0-9a-zA-Z]/','',$cpd_amd_action);
$cpd_unknown_action = preg_replace('/[^-_0-9a-zA-Z]/','',$cpd_unknown_action);
$template_id = preg_replace('/[^-_0-9a-zA-Z]/','',$template_id);
$carrier_id = preg_replace('/[^-_0-9a-zA-Z]/','',$carrier_id);
$source_carrier = preg_replace('/[^-_0-9a-zA-Z]/','',$source_carrier);
$group_alias_id = preg_replace('/[^-_0-9a-zA-Z]/','',$group_alias_id);
$default_group_alias = preg_replace('/[^-_0-9a-zA-Z]/','',$default_group_alias);
$vtiger_search_dead = preg_replace('/[^-_0-9a-zA-Z]/','',$vtiger_search_dead);
$menu_id = preg_replace('/[^-_0-9a-zA-Z]/','',$menu_id);
$source_menu = preg_replace('/[^-_0-9a-zA-Z]/','',$source_menu);
$call_time_id = preg_replace('/[^-_0-9a-zA-Z]/','',$call_time_id);
$phone_context = preg_replace('/[^-_0-9a-zA-Z]/','',$phone_context);
$conf_secret = preg_replace('/[^-_0-9a-zA-Z]/','',$conf_secret);
$tracking_group = preg_replace('/[^-_0-9a-zA-Z]/','',$tracking_group);
$no_agent_no_queue = preg_replace('/[^-_0-9a-zA-Z]/','',$no_agent_no_queue);
$no_agent_action = preg_replace('/[^-_0-9a-zA-Z]/','',$no_agent_action);
$quick_transfer_button = preg_replace('/[^-_0-9a-zA-Z]/','',$quick_transfer_button);
$prepopulate_transfer_preset = preg_replace('/[^-_0-9a-zA-Z]/','',$prepopulate_transfer_preset);
$tts_id = preg_replace('/[^-_0-9a-zA-Z]/','',$tts_id);
$drop_rate_group = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_rate_group);
$agent_dial_owner_only = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_dial_owner_only);
$reset_time = preg_replace('/[^-_0-9a-zA-Z]/','',$reset_time);
$moh_id = preg_replace('/[^-_0-9a-zA-Z]/','',$moh_id);
$drop_inbound_group_override = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_inbound_group_override);
$timer_action = preg_replace('/[^-_0-9a-zA-Z]/','',$timer_action);
$record_call = preg_replace('/[^-_0-9a-zA-Z]/','',$record_call);
$scheduled_callbacks_alert = preg_replace('/[^-_0-9a-zA-Z]/','',$scheduled_callbacks_alert);
$extension_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$extension_group_id);
$extension_group = preg_replace('/[^-_0-9a-zA-Z]/','',$extension_group);
$scheduled_callbacks_count = preg_replace('/[^-_0-9a-zA-Z]/','',$scheduled_callbacks_count);
$manual_dial_override = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_override);
$blind_monitor_warning = preg_replace('/[^-_0-9a-zA-Z]/','',$blind_monitor_warning);
$uniqueid_status_display = preg_replace('/[^-_0-9a-zA-Z]/','',$uniqueid_status_display);
$hold_time_option_callmenu = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_option_callmenu);
$inbound_queue_no_dial = preg_replace('/[^-_0-9a-zA-Z]/','',$inbound_queue_no_dial);
$hold_time_second_option = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_second_option);
$hold_time_third_option = preg_replace('/[^-_0-9a-zA-Z]/','',$hold_time_third_option);
$wait_hold_option_priority = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_hold_option_priority);
$wait_time_option = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_option);
$wait_time_second_option = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_second_option);
$wait_time_third_option = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_third_option);
$wait_time_option_xfer_group = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_option_xfer_group);
$wait_time_option_callmenu = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_option_callmenu);
$wait_time_option_voicemail = preg_replace('/[^-_0-9a-zA-Z]/','',$wait_time_option_voicemail);
$filter_phone_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_phone_group_id);
$filter_action = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_action);
$filter_user_unavailable_action = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_user_unavailable_action);
$filter_user_route_settings_ingroup = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_user_route_settings_ingroup);
$filter_agent_search_method = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_agent_search_method);
$filter_campaign_id = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_campaign_id);
$filter_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_group_id);
$filter_menu_id = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_menu_id);
$filter_call_handle_method = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_call_handle_method);
$filter_user = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_user);
$filter_exten_context = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_exten_context);
$webphone_systemkey = preg_replace('/[^-_0-9a-zA-Z]/','',$webphone_systemkey);
$webphone_dialpad = preg_replace('/[^-_0-9a-zA-Z]/','',$webphone_dialpad);
$webphone_systemkey_override = preg_replace('/[^-_0-9a-zA-Z]/','',$webphone_systemkey_override);
$webphone_dialpad_override = preg_replace('/[^-_0-9a-zA-Z]/','',$webphone_dialpad_override);
$default_phone_registration_password = preg_replace('/[^-_0-9a-zA-Z]/','',$default_phone_registration_password);
$default_phone_login_password = preg_replace('/[^-_0-9a-zA-Z]/','',$default_phone_login_password);
$default_server_password = preg_replace('/[^-_0-9a-zA-Z]/','',$default_server_password);
$ivr_park_call = preg_replace('/[^-_0-9a-zA-Z]/','',$ivr_park_call);
$manual_preview_dial = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_preview_dial);
$realtime_agent_time_stats = preg_replace('/[^-_0-9a-zA-Z]/','',$realtime_agent_time_stats);
$api_manual_dial = preg_replace('/[^-_0-9a-zA-Z]/','',$api_manual_dial);
$manual_dial_call_time_check = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_call_time_check);
$lead_order_secondary = preg_replace('/[^-_0-9a-zA-Z]/','',$lead_order_secondary);
$agent_lead_search = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_lead_search);
$agent_lead_search_method = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_lead_search_method);
$manual_dial_cid = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_cid);
$post_phone_time_diff_alert = preg_replace('/[^-_0-9a-zA-Z]/','',$post_phone_time_diff_alert);
$custom_3way_button_transfer = preg_replace('/[^-_0-9a-zA-Z]/','',$custom_3way_button_transfer);
$available_only_tally_threshold_agents = preg_replace('/[^-_0-9a-zA-Z]/','',$available_only_tally_threshold_agents);
$dial_level_threshold_agents = preg_replace('/[^-_0-9a-zA-Z]/','',$dial_level_threshold_agents);
$time_zone_setting = preg_replace('/[^-_0-9a-zA-Z]/','',$time_zone_setting);
$safe_harbor_menu_id = preg_replace('/[^-_0-9a-zA-Z]/','',$safe_harbor_menu_id);
$survey_menu_id = preg_replace('/[^-_0-9a-zA-Z]/','',$survey_menu_id);
$dl_diff_target_method = preg_replace('/[^-_0-9a-zA-Z]/','',$dl_diff_target_method);
$disable_dispo_screen = preg_replace('/[^-_0-9a-zA-Z]/','',$disable_dispo_screen);
$screen_labels = preg_replace('/[^-_0-9a-zA-Z]/','',$screen_labels);
$label_hide_field_logs = preg_replace('/[^-_0-9a-zA-Z]/','',$label_hide_field_logs);
$label_id = preg_replace('/[^-_0-9a-zA-Z]/','',$label_id);
$status_display_fields = preg_replace('/[^-_0-9a-zA-Z]/','',$status_display_fields);
$voicemail_timezone = preg_replace('/[^-_0-9a-zA-Z]/','',$voicemail_timezone);
$default_voicemail_timezone = preg_replace('/[^-_0-9a-zA-Z]/','',$default_voicemail_timezone);
$on_hook_cid = preg_replace('/[^-_0-9a-zA-Z]/','',$on_hook_cid);
$pllb_grouping = preg_replace('/[^-_0-9a-zA-Z]/','',$pllb_grouping);
$user_start = preg_replace('/[^-_0-9a-zA-Z]/','',$user_start);
$drop_callmenu = preg_replace('/[^-_0-9a-zA-Z]/','',$drop_callmenu);
$after_hours_callmenu = preg_replace('/[^-_0-9a-zA-Z]/','',$after_hours_callmenu);
$survey_recording = preg_replace('/[^-_0-9a-zA-Z]/','',$survey_recording);
$dtmf_field = preg_replace('/[^-_0-9a-zA-Z]/','',$dtmf_field);
$preset_contact_search = preg_replace('/[^-_0-9a-zA-Z]/','',$preset_contact_search);
$admin_hide_phone_data = preg_replace('/[^-_0-9a-zA-Z]/','',$admin_hide_phone_data);
$max_calls_method = preg_replace('/[^-_0-9a-zA-Z]/','',$max_calls_method);
$max_calls_action = preg_replace('/[^-_0-9a-zA-Z]/','',$max_calls_action);
$in_group_dial = preg_replace('/[^-_0-9a-zA-Z]/','',$in_group_dial);
$in_group_dial_select = preg_replace('/[^-_0-9a-zA-Z]/','',$in_group_dial_select);
$queuemetrics_socket = preg_replace('/[^-_0-9a-zA-Z]/','',$queuemetrics_socket);
$holiday_id = preg_replace('/[^-_0-9a-zA-Z]/','',$holiday_id);
$holiday_date = preg_replace('/[^-_0-9a-zA-Z]/','',$holiday_date);
$holiday_status = preg_replace('/[^-_0-9a-zA-Z]/','',$holiday_status);
$expiration_date = preg_replace('/[^-_0-9a-zA-Z]/','',$expiration_date);
$amd_inbound_group = preg_replace('/[^-_0-9a-zA-Z]/','',$amd_inbound_group);
$amd_callmenu = preg_replace('/[^-_0-9a-zA-Z]/','',$amd_callmenu);
$filter_inbound_number = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_inbound_number);
$filter_dnc_campaign = preg_replace('/[^-_0-9a-zA-Z]/','',$filter_dnc_campaign);
$manual_dial_search_checkbox = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_search_checkbox);
$alt_number_dialing = preg_replace('/[^-_0-9a-zA-Z]/','',$alt_number_dialing);
$no_agent_ingroup_redirect = preg_replace('/[^-_0-9a-zA-Z]/','',$no_agent_ingroup_redirect);
$no_agent_ingroup_id = preg_replace('/[^-_0-9a-zA-Z]/','',$no_agent_ingroup_id);
$pre_filter_phone_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$pre_filter_phone_group_id);
$shift_enforcement = preg_replace('/[^-_0-9a-zA-Z]/','',$shift_enforcement);
$comments_all_tabs = preg_replace('/[^-_0-9a-zA-Z]/','',$comments_all_tabs);
$comments_dispo_screen = preg_replace('/[^-_0-9a-zA-Z]/','',$comments_dispo_screen);
$comments_callback_screen = preg_replace('/[^-_0-9a-zA-Z]/','',$comments_callback_screen);
$qc_comment_history = preg_replace('/[^-_0-9a-zA-Z]/','',$qc_comment_history);
$language_method = preg_replace('/[^-_0-9a-zA-Z]/','',$language_method);
$manual_dial_override_field = preg_replace('/[^-_0-9a-zA-Z]/','',$manual_dial_override_field);
$max_queue_ingroup_id = preg_replace('/[^-_0-9a-zA-Z]/','',$max_queue_ingroup_id);
$agent_debug_logging = preg_replace('/[^-_0-9a-zA-Z]/','',$agent_debug_logging);
$container_id = preg_replace('/[^-_0-9a-zA-Z]/','',$container_id);
$container_type = preg_replace('/[^-_0-9a-zA-Z]/','',$container_type);
$status_group_id = preg_replace('/[^-_0-9a-zA-Z]/','',$status_group_id);
$unavail_dialplan_fwd_exten = preg_replace('/[^-_0-9a-zA-Z]/','',$unavail_dialplan_fwd_exten);
$unavail_dialplan_fwd_context = preg_replace('/[^-_0-9a-zA-Z]/','',$unavail_dialplan_fwd_context);
$nva_search_method = preg_replace('/[^-_0-9a-zA-Z]/','',$nva_search_method);

### ALPHA-NUMERIC and underscore and dash and slash and dot
$menu_timeout_prompt = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$menu_timeout_prompt);
$menu_invalid_prompt = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$menu_invalid_prompt);
$after_hours_message_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$after_hours_message_filename);
$welcome_message_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$welcome_message_filename);
$onhold_prompt_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$onhold_prompt_filename);
$hold_time_option_callback_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$hold_time_option_callback_filename);
$agent_alert_exten = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$agent_alert_exten);
$filename = preg_replace('/[^-\/\._0-9a-zA-Z]/','',$filename);
$am_message_exten = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$am_message_exten);
$am_message_exten_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$am_message_exten_override);
$campaign_groups = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$campaign_groups);
$blind_monitor_filename = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$blind_monitor_filename);
$hold_time_option_press_filename = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$hold_time_option_press_filename);
$default_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$default_afterhours_filename_override);
$sunday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$sunday_afterhours_filename_override);
$monday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$monday_afterhours_filename_override);
$tuesday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$tuesday_afterhours_filename_override);
$wednesday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$wednesday_afterhours_filename_override);
$thursday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$thursday_afterhours_filename_override);
$friday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$friday_afterhours_filename_override);
$saturday_afterhours_filename_override = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$saturday_afterhours_filename_override);
$admin_web_directory = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$admin_web_directory);
$tts_voice = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$tts_voice);
$wait_time_option_callback_filename = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$wait_time_option_callback_filename);
$wait_time_option_press_filename = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$wait_time_option_press_filename);
$eht_minimum_prompt_filename = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$eht_minimum_prompt_filename);
$queuemetrics_phone_environment = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$queuemetrics_phone_environment);
$active_twin_server_ip = preg_replace('/[^-\|\/\._0-9a-zA-Z]/','',$active_twin_server_ip);
$safe_harbor_audio = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$safe_harbor_audio);
$alt_log_server_ip = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$alt_log_server_ip);
$alt_log_dbname = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$alt_log_dbname);
$alt_log_login = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$alt_log_login);
$alt_log_pass = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$alt_log_pass);
$survey_first_audio_file = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$survey_first_audio_file);
$survey_opt_in_audio_file = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$survey_opt_in_audio_file);
$survey_ni_audio_file = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$survey_ni_audio_file);
$survey_third_audio_file = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$survey_third_audio_file);
$survey_fourth_audio_file = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$survey_fourth_audio_file);
$safe_harbor_audio_field = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$safe_harbor_audio_field);
$voicemail_greeting = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$voicemail_greeting);
$old_voicemail_greeting = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$old_voicemail_greeting);
$meetme_enter_login_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$meetme_enter_login_filename);
$meetme_enter_leave3way_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$meetme_enter_leave3way_filename);
$nva_error_filename = preg_replace('/[^-\/\|\._0-9a-zA-Z]/','',$nva_error_filename);

### ALPHA-NUMERIC and underscore and dash and slash and dot and comma
$menu_prompt = preg_replace('/[^-\/\|\,\._0-9a-zA-Z]/','',$menu_prompt);

### ALPHA-NUMERIC and underscore and dash and comma
$logins_list = preg_replace('/[^-\,\_0-9a-zA-Z]/','',$logins_list);
$forced_timeclock_login = preg_replace('/[^-\,\_0-9a-zA-Z]/','',$forced_timeclock_login);
$uniqueid_status_prefix = preg_replace('/[^-\,\_0-9a-zA-Z]/','',$uniqueid_status_prefix);

### ALPHA-NUMERIC and dots
$sounds_web_server = preg_replace('/[^-\:\.0-9a-zA-Z]/','',$sounds_web_server);
### ALPHA-NUMERIC and spaces
$lead_order = preg_replace('/[^ 0-9a-zA-Z]/','',$lead_order);
### ALPHA-NUMERIC and spaces and dashes and underscores
$preset_name = preg_replace('/[^- \_0-9a-zA-Z]/','',$preset_name);
$selected_language = preg_replace('/[^- \_0-9a-zA-Z]/','',$selected_language);
$default_language = preg_replace('/[^- \_0-9a-zA-Z]/','',$default_language);

### ALPHA-NUMERIC and hash
$group_color = preg_replace('/[^\#0-9a-zA-Z]/','',$group_color);
$script_color = preg_replace('/[^\#0-9a-zA-Z]/','',$script_color);
### ALPHA-NUMERIC and hash and star and dot and underscore
$hold_time_option_exten = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$hold_time_option_exten);
$did_pattern = preg_replace('/[^\+\*\#\.\_0-9a-zA-Z]/','',$did_pattern);
$voicemail_ext = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$voicemail_ext);
$phone = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$phone);
$phone_code = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$phone_code);
$wait_time_option_exten = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$wait_time_option_exten);
$filter_voicemail_ext = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$filter_voicemail_ext);
$filter_phone_code = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$filter_phone_code);
$filter_phone = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$filter_phone);
$preset_number = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$preset_number);
$no_agent_ingroup_extension = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$no_agent_ingroup_extension);
$pre_filter_extension = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$pre_filter_extension);
$max_queue_ingroup_extension = preg_replace('/[^\*\#\.\_0-9a-zA-Z]/','',$max_queue_ingroup_extension);

### ALPHA-NUMERIC and spaces dots, commas, dashes, underscores
$adaptive_dl_diff_target = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$adaptive_dl_diff_target);
$adaptive_intensity = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$adaptive_intensity);
$asterisk_version = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$asterisk_version);
$call_time_comments = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$call_time_comments);
$call_time_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$call_time_name);
$campaign_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$campaign_name);
$campaign_rec_filename = preg_replace('/[^-\.\_0-9a-zA-Z]/','',$campaign_rec_filename);
$ingroup_rec_filename = preg_replace('/[^-\.\_0-9a-zA-Z]/','',$ingroup_rec_filename);
$company = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$company);
$full_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$full_name);
$fullname = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$fullname);
$group_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$group_name);
$HKstatus = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$HKstatus);
$lead_filter_comments = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$lead_filter_comments);
$lead_filter_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$lead_filter_name);
$list_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$list_name);
$local_gmt = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$local_gmt);
$phone_type = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$phone_type);
$picture = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$picture);
$script_comments = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$script_comments);
$script_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$script_name);
$server_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$server_description);
$status = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$status);
$status_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$status_name);
$wrapup_message = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$wrapup_message);
$pause_code_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$pause_code_name);
$campaign_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$campaign_description);
$list_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$list_description);
$vcl_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$vcl_name);
$vsc_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$vsc_name);
$vsc_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$vsc_description);
$code_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$code_name);
$alias_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$alias_name);
$shift_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$shift_name);
$did_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$did_description);
$template_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$template_name);
$carrier_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$carrier_name);
$group_alias_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$group_alias_name);
$caller_id_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$caller_id_name);
$user_code = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$user_code);
$territory = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$territory);
$tts_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$tts_name);
$moh_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$moh_name);
$timer_action_message = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$timer_action_message);
$default_codecs = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$default_codecs);
$codecs_list = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$codecs_list);
$label_title = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_title);
$label_first_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_first_name);
$label_middle_initial = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_middle_initial);
$label_last_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_last_name);
$label_address1 = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_address1);
$label_address2 = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_address2);
$label_address3 = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_address3);
$label_city = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_city);
$label_state = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_state);
$label_province = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_province);
$label_postal_code = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_postal_code);
$label_vendor_lead_code = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_vendor_lead_code);
$label_gender = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_gender);
$label_phone_number = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_phone_number);
$label_phone_code = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_phone_code);
$label_alt_phone = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_alt_phone);
$label_security_phrase = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_security_phrase);
$label_email = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_email);
$label_comments = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_comments);
$slave_db_server = preg_replace('/[^- \.\,\:\_0-9a-zA-Z]/','',$slave_db_server);
$filter_phone_group_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$filter_phone_group_name);
$filter_phone_group_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$filter_phone_group_description);
$filter_clean_cid_number = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$filter_clean_cid_number);
$label_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$label_name);
$default_local_gmt = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$default_local_gmt);
$cid_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$cid_description);
$description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$description);
$first_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$first_name);
$last_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$last_name);
$bu_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$bu_name);
$department = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$department);
$group = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$group);
$job_title = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$job_title);
$location = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$location);
$holiday_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$holiday_name);
$holiday_comments = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$holiday_comments);
$api_allowed_functions = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$api_allowed_functions);
$agent_display_fields = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$agent_display_fields);
$container_notes = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$container_notes);
$did_carrier_description = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$did_carrier_description);
$status_group_notes = preg_replace('/[^- \.\,\_0-9a-zA-Z]/','',$status_group_notes);

### ALPHA-NUMERIC and underscore and dash and slash and at and dot
$call_out_number_group = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$call_out_number_group);
$client_browser = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$client_browser);
$DBX_server = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$DBX_server);
$DBY_server = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$DBY_server);
$dtmf_send_extension = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$dtmf_send_extension);
$install_directory = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$install_directory);
$old_extension = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$old_extension);
$telnet_host = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$telnet_host);
$queuemetrics_dbname = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$queuemetrics_dbname);
$queuemetrics_login = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$queuemetrics_login);
$queuemetrics_pass = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$queuemetrics_pass);
$email = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$email);
$vtiger_dbname = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$vtiger_dbname);
$vtiger_login = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$vtiger_login);
$vtiger_pass = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$vtiger_pass);
$external_server_ip = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$external_server_ip);
$alt_server_ip = preg_replace('/[^-\.\:\/\@\_0-9a-zA-Z]/','',$alt_server_ip);

### ALPHA-NUMERIC and underscore and dash and slash and at and dot and space
$custom_one = preg_replace('/[^- \.\:\/\@\_0-9a-zA-Z]/','',$custom_one);
$custom_two = preg_replace('/[^- \.\:\/\@\_0-9a-zA-Z]/','',$custom_two);
$custom_three = preg_replace('/[^- \.\:\/\@\_0-9a-zA-Z]/','',$custom_three);
$custom_four = preg_replace('/[^- \.\:\/\@\_0-9a-zA-Z]/','',$custom_four);
$custom_five = preg_replace('/[^- \.\:\/\@\_0-9a-zA-Z]/','',$custom_five);

### ALPHA-NUMERIC and underscore and dash and slash and at and dot and pound and star
$extension = preg_replace('/[^-\*\#\.\:\/\@\_0-9a-zA-Z]/','',$extension);
$timer_action_destination = preg_replace('/[^-\*\#\.\:\/\@\_0-9a-zA-Z]/','',$timer_action_destination);
$filter_extension = preg_replace('/[^-\*\#\.\:\/\@\_0-9a-zA-Z]/','',$filter_extension);

### ALPHA-NUMERIC and space and underscore and dash and slash and at and dot and pound and star and pipe and comma
$ivr_park_call_agi = preg_replace('/[^- \*\#\.\,\:\/\|\@\_0-9a-zA-Z]/','',$ivr_park_call_agi);

### ALPHA-NUMERIC and space and underscore and dash and slash and at and dot and pound and star and pipe and comma and equal
$voicemail_options = preg_replace('/[^- \=\*\#\.\,\:\/\|\@\_0-9a-zA-Z]/','',$voicemail_options);

### NUMERIC and comma and pipe
$waitforsilence_options = preg_replace('/[^\|\,0-9a-zA-Z]/','',$waitforsilence_options);

### value cleaning
$no_agent_action_value = preg_replace('/[^-\/\|\_\#\*\,\.\_0-9a-zA-Z]/','',$no_agent_action_value);

### ALPHA-NUMERIC and underscore and dash and slash and at and space and colon
$vdc_header_date_format = preg_replace('/[^- \:\/\_0-9a-zA-Z]/','',$vdc_header_date_format);
$vdc_customer_date_format = preg_replace('/[^- \:\/\_0-9a-zA-Z]/','',$vdc_customer_date_format);
$menu_name = preg_replace('/[^- \:\/\_0-9a-zA-Z]/','',$menu_name);

### ALPHA-NUMERIC and underscore and dash and at and space and parantheses
$vdc_header_phone_format = preg_replace('/[^- \(\)\_0-9a-zA-Z]/', '',$vdc_header_phone_format);

### remove semi-colons ###
$lead_filter_sql = preg_replace('/;/','',$lead_filter_sql);
$list_mix_container = preg_replace('/;/','',$list_mix_container);
$survey_response_digit_map = preg_replace('/;/','',$survey_response_digit_map);
$survey_camp_record_dir = preg_replace('/;/','',$survey_camp_record_dir);
$conf_override = preg_replace('/;/','',$conf_override);
$template_contents = preg_replace('/;/','',$template_contents);
$registration_string = preg_replace('/;/','',$registration_string);
$account_entry = preg_replace('/;/','',$account_entry);
$account_entry = preg_replace('/\r/', '',$account_entry);
$globals_string = preg_replace('/;/','',$globals_string);
$dialplan_entry = preg_replace('/;/','',$dialplan_entry);
$dialplan_entry = preg_replace('/\r/', '',$dialplan_entry);
$custom_dialplan_entry = preg_replace('/\\\\/', '',$custom_dialplan_entry);
$custom_dialplan_entry = preg_replace('/\'/', '',$custom_dialplan_entry);
$custom_dialplan_entry = preg_replace('/\r/', '',$custom_dialplan_entry);
$tts_text = preg_replace('/\\\\/', '',$tts_text);
$tts_text = preg_replace('/;/','',$tts_text);
$tts_text = preg_replace('/\r/', '',$tts_text);
$tts_text = preg_replace('/\"/', '',$tts_text);
$carrier_description = preg_replace('/\\\\/', '',$carrier_description);
$carrier_description = preg_replace('/;/','',$carrier_description);
$carrier_description = preg_replace('/\r/', '',$carrier_description);
$carrier_description = preg_replace('/\"/', '',$carrier_description);
$blind_monitor_message = preg_replace('/\\\\/', '',$blind_monitor_message);
$blind_monitor_message = preg_replace('/;/','',$blind_monitor_message);
$blind_monitor_message = preg_replace('/\r/', '',$blind_monitor_message);
$blind_monitor_message = preg_replace('/\"/', '',$blind_monitor_message);
$modify_url = preg_replace('/\\\\/', '',$modify_url);
$modify_url = preg_replace('/;/','',$modify_url);
$modify_url = preg_replace('/\r/', '',$modify_url);
$modify_url = preg_replace('/\"/', '',$modify_url);
$qualify_sql = preg_replace('/\\\\/', '',$qualify_sql);
$qualify_sql = preg_replace('/;/','',$qualify_sql);
$qualify_sql = preg_replace('/\r/', '',$qualify_sql);
$qualify_sql = preg_replace('/\'/', "\"",$qualify_sql);
$queuemetrics_socket_url = preg_replace('/\\\\/', '',$queuemetrics_socket_url);
$queuemetrics_socket_url = preg_replace('/;/','',$queuemetrics_socket_url);
$queuemetrics_socket_url = preg_replace('/\r/', '',$queuemetrics_socket_url);
$queuemetrics_socket_url = preg_replace('/\'/', "\"",$queuemetrics_socket_url);
### VARIABLES TO BE mysql_real_escape_string ###
# $web_form_address
# $queuemetrics_url
# $admin_home_url
# $qc_web_form_address
# $vtiger_url
# $web_form_address_two
# $crm_login_address
# $start_call_url
# $dispo_call_url
# $add_lead_url
# $webphone_url
# $webphone_url_override
# $filter_url
# $na_call_url
# $web_form_address_three
# $container_entry
# $nva_call_url

### VARIABLES not filtered at all ###
# $script_text

}	# end of non_latin
else
{
$PHP_AUTH_PW = preg_replace('/\'|\"|\\\\|;/', '',$PHP_AUTH_PW);
$PHP_AUTH_USER = preg_replace('/\'|\"|\\\\|;/', '',$PHP_AUTH_USER);
}



##### END VARIABLE FILTERING FOR SECURITY #####


# ViciDial database administration
# admin.php

# make sure you have added a user to the vicidial_users MySQL table with at least user_level 9 to access this page the first time

$admin_version = '2.12-528a';
$build = '151229-2258';

$STARTtime = date("U");
$SQLdate = date("Y-m-d H:i:s");
$REPORTdate = date("Y-m-d");
$EXPtestdate = date("Ymd");
$CIDdate = date("mdHis");
while (strlen($CIDdate) > 9) {$CIDdate = substr("$CIDdate", 1);}

$MT[0]='';
$US='_';
$active_lists=0;
$inactive_lists=0;
$modify_refresh_set=0;
$modify_footer_refresh=0;
$check_time = ($STARTtime - 86400);
$SSanswer_transfer_agent =	'8368';
$add_copy_disabled=0;

$month_old = mktime(0, 0, 0, date("m")-1, date("d"),  date("Y"));
$past_month_date = date("Y-m-d H:i:s",$month_old);
$week_old = mktime(0, 0, 0, date("m"), date("d")-7,  date("Y"));
$past_week_date = date("Y-m-d H:i:s",$week_old);

$dtmf[0]='0';				$dtmf_key[0]='0';
$dtmf[1]='1';				$dtmf_key[1]='1';
$dtmf[2]='2';				$dtmf_key[2]='2';
$dtmf[3]='3';				$dtmf_key[3]='3';
$dtmf[4]='4';				$dtmf_key[4]='4'; 
$dtmf[5]='5';				$dtmf_key[5]='5';
$dtmf[6]='6';				$dtmf_key[6]='6';
$dtmf[7]='7';				$dtmf_key[7]='7';
$dtmf[8]='8';				$dtmf_key[8]='8';
$dtmf[9]='9';				$dtmf_key[9]='9';
$dtmf[10]='HASH';			$dtmf_key[10]='#';
$dtmf[11]='STAR';			$dtmf_key[11]='*';
$dtmf[12]='A';				$dtmf_key[12]='A';
$dtmf[13]='B';				$dtmf_key[13]='B';
$dtmf[14]='C';				$dtmf_key[14]='C';
$dtmf[15]='D';				$dtmf_key[15]='D';
$dtmf[16]='TIMECHECK';		$dtmf_key[16]='TIMECHECK';
$dtmf[17]='TIMEOUT';		$dtmf_key[17]='TIMEOUT';
$dtmf[18]='INVALID';		$dtmf_key[18]='INVALID';
$dtmf[19]='INVALID_2ND';	$dtmf_key[19]='INVALID_2ND';
$dtmf[20]='INVALID_3RD';	$dtmf_key[20]='INVALID_3RD';

$stmt="SELECT selected_language from vicidial_users where user='$PHP_AUTH_USER';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$sl_ct = mysqli_num_rows($rslt);
if ($sl_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$VUselected_language =		$row[0];
	}

if ($force_logout)
	{
	if( (strlen($PHP_AUTH_USER)>0) or (strlen($PHP_AUTH_PW)>0) )
		{
//		Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
//		Header("HTTP/1.0 401 Unauthorized");
                unset($_SESSION['Login']);
                $_SESSION['msg'] = 'You have successfully logged out.';
                header('location:admin-login.php?logout=1');
                exit;
		}
echo "<title>"._QXZ(" Welcome")."</title>\n";
echo "	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>
		<link href='plugins/bootstrap/css/bootstrap.css' rel='stylesheet'>
		<link href='plugins/node-waves/waves.css' rel='stylesheet' />
		<link href='plugins/animate-css/animate.css' rel='stylesheet' />
		<link href='plugins/morrisjs/morris.css' rel='stylesheet' />
		<link href='css/style.css' rel='stylesheet'>
		<link href='css/themes/all-themes.css' rel='stylesheet' /> ";
echo "</head>\n";
echo "<body class='signup-page' style='background:url(images/bg.png);background-repeat: no-repeat;background-size: cover;'>";
echo "<div class='signup-box'>
			<div class='logo text-center'> <img class='logo' src='logo.png' alt='logo' style='width:100%'> </div>
			<div class='card' style='background:transparent;'>
				<div class='body'>
					<h3 class='msg' align='center'>You have successfully logged out</h3>
					<div>
					  <a href=\"./welcome.php\" class='btn btn-primary btn-block waves-effect' style='color:#fff; font-size:16px;' >Login Again</a>
					</div>
				</div>
			</div>
		</div> 
	<script src='plugins/jquery/jquery.min.js'></script>
    <script src='plugins/bootstrap/js/bootstrap.js'></script>
    <script src='plugins/node-waves/waves.js'></script>
    <script src='js/admin.js'></script>
    <script src='js/pages/index.js'></script>
	<script src='js/demo.js'></script>";

echo "</body>";
echo "</html>"; 
	exit;
	}
        
#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,auto_dial_limit,user_territories_active,allow_custom_dialplan,callcard_enabled,admin_modify_refresh,nocache_admin,webroot_writable,allow_emails FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =					$row[0];
	$SSauto_dial_limit =			$row[1];
	$SSuser_territories_active =	$row[2];
	$SSallow_custom_dialplan =		$row[3];
	$SScallcard_enabled =			$row[4];
	$SSadmin_modify_refresh =		$row[5];
	$SSnocache_admin =				$row[6];
	$SSwebroot_writable =			$row[7];
	$SSemail_enabled =				$row[8];
	}
##### END SETTINGS LOOKUP #####
###########################################

$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

$user_auth=0;
$auth=0;
$reports_auth=0;
$qc_auth=0;
//$auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'QC',1);
$auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'TEST-LOGIN',1);
if ($auth_message == 'GOOD')
	{$user_auth=1;}

if ($user_auth > 0)
	{
	$stmt="SELECT count(*) from vicidial_users where user='$PHP_AUTH_USER' and user_level > 7;";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);
	$auth=$row[0];

	$stmt="SELECT count(*) from vicidial_users where user='$PHP_AUTH_USER' and user_level > 6 and view_reports='1';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);
	$reports_auth=$row[0];

	$stmt="SELECT count(*) from vicidial_users where user='$PHP_AUTH_USER' and user_level > 1 and qc_enabled='1';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);
	$qc_auth=$row[0];

	$reports_only_user=0;
	$qc_only_user=0;
	if ( ($reports_auth > 0) and ($auth < 1) )
		{
		$ADD=999999;
		$reports_only_user=1;
		}
	if ( ($qc_auth > 0) and ($reports_auth < 1) and ($auth < 1) )
		{
		if ( ($ADD != '881') and ($ADD != '100000000000000') )
			{
            $ADD=100000000000000;
			}
		$qc_only_user=1;
		}
	if ( ($qc_auth < 1) and ($reports_auth < 1) and ($auth < 1) )
		{
		$VDdisplayMESSAGE = _QXZ("You do not have permission to be here");
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
	}
else
	{
	$VDdisplayMESSAGE = _QXZ("Login incorrect, please try again");
	if ($auth_message == 'LOCK')
		{
		$VDdisplayMESSAGE = _QXZ("Too many login attempts, try again in 15 minutes");
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
              header('location:admin-login.php');
//	Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
//	Header("HTTP/1.0 401 Unauthorized");
//	echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$PHP_AUTH_PW|$auth_message|\n";
	exit;
	}
$admin_lists_custom = 'admin_lists_custom.php';
if (preg_match("/cf_encrypt/",$SSactive_modules))
	{$admin_lists_custom = 'admin_lists_custom_encrypt.php';}
$x_ra_carrier = 0;
if (preg_match("/x_ra_carrier/",$SSactive_modules))
	{$x_ra_carrier = 1;}

##############################################
# Include QC Agents with no other permission #
##############################################
//Get QC User permissions
$stmt="SELECT qc_enabled,qc_user_level,qc_pass,qc_finish,qc_commit from vicidial_users where user='$PHP_AUTH_USER' and user_level > 1 and active='Y' and qc_enabled='1';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$qc_auth=$row[0];
//Not "qc_" as it will interfere with ADD=4A storage of modified user.
if ($qc_auth=='1') 
	{
    $qcuser_level=$row[1];
    $qcpass=$row[2];
    $qcfinish=$row[3];
    $qccommit=$row[4];
	}
//Modify menuing to allow qc users into the system (if they have no permission otherwise)
//Copied Reports-Only user setup for QC-Only user (Poundteam QC setup)
$qc_only_user=0;
if ( ($qc_auth > 0) and ($auth < 1) )
        {
        if ($ADD != '881')
			{
			$ADD=100000000000000;
		   }
        $qc_only_user=1;
        }

$stmt="SELECT user_id,user,pass,full_name,user_level,user_group,phone_login,phone_pass,delete_users,delete_user_groups,delete_lists,delete_campaigns,delete_ingroups,delete_remote_agents,load_leads,campaign_detail,ast_admin_access,ast_delete_phones,delete_scripts,modify_leads,hotkeys_active,change_agent_campaign,agent_choose_ingroups,closer_campaigns,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,delete_filters,alter_agent_interface_options,closer_default_blended,delete_call_times,modify_call_times,modify_users,modify_campaigns,modify_lists,modify_scripts,modify_filters,modify_ingroups,modify_usergroups,modify_remoteagents,modify_servers,view_reports,vicidial_recording_override,alter_custdata_override,qc_enabled,qc_user_level,qc_pass,qc_finish,qc_commit,add_timeclock_log,modify_timeclock_log,delete_timeclock_log,alter_custphone_override,vdc_agent_api_access,modify_inbound_dids,delete_inbound_dids,active,alert_enabled,download_lists,agent_shift_enforcement_override,manager_shift_enforcement_override,shift_override_flag,export_reports,delete_from_dnc,email,user_code,territory,allow_alerts,callcard_admin,force_change_password,modify_shifts,modify_phones,modify_carriers,modify_labels,modify_statuses,modify_voicemail,modify_audiostore,modify_moh,modify_tts,modify_contacts,modify_same_user_level,alter_admin_interface_options,modify_custom_dialplans,modify_languages,selected_language,user_choose_language from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGfull_name				=$row[3];
$LOGuser_level				=$row[4];
$LOGuser_group				=$row[5];
$LOGdelete_users			=$row[8];
$LOGdelete_user_groups		=$row[9];
$LOGdelete_lists			=$row[10];
$LOGdelete_campaigns		=$row[11];
$LOGdelete_ingroups			=$row[12];
$LOGdelete_remote_agents	=$row[13];
$LOGload_leads				=$row[14];
$LOGcampaign_detail			=$row[15];
$LOGast_admin_access		=$row[16];
$LOGast_delete_phones		=$row[17];
$LOGdelete_scripts			=$row[18];
$LOGmodify_leads			=$row[19];
$LOGdelete_filters			=$row[29];
$LOGalter_agent_interface	=$row[30];
$LOGdelete_call_times		=$row[32];
$LOGmodify_call_times		=$row[33];
$LOGmodify_users			=$row[34];
$LOGmodify_campaigns		=$row[35];
$LOGmodify_lists			=$row[36];
$LOGmodify_scripts			=$row[37];
$LOGmodify_filters			=$row[38];
$LOGmodify_ingroups			=$row[39];
$LOGmodify_usergroups		=$row[40];
$LOGmodify_remoteagents		=$row[41];
$LOGmodify_servers			=$row[42];
$LOGview_reports			=$row[43];
$LOGmodify_dids				=$row[56];
$LOGdelete_dids				=$row[57];
$LOGmanager_shift_enforcement_override=$row[61];
$LOGexport_reports			=$row[64];
$LOGdelete_from_dnc			=$row[65];
$LOGcallcard_admin			=$row[70];
$LOGforce_change_password	=$row[71];
$LOGmodify_shifts			=$row[72];
$LOGmodify_phones			=$row[73];
$LOGmodify_carriers			=$row[74];
$LOGmodify_labels			=$row[75];
$LOGmodify_statuses			=$row[76];
$LOGmodify_voicemail		=$row[77];
$LOGmodify_audiostore		=$row[78];
$LOGmodify_moh				=$row[79];
$LOGmodify_tts				=$row[80];
$LOGmodify_contacts			=$row[81];
$LOGmodify_same_user_level	=$row[82];
$LOGalter_admin_interface	=$row[83];
$LOGmodify_custom_dialplans =$row[84];
$LOGmodify_languages		=$row[85];
$LOGselected_language		=$row[86];
$LOGuser_choose_language	=$row[87];

$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGallowed_campaigns =			$row[0];
$LOGallowed_reports =			$row[1];
$LOGadmin_viewable_groups =		$row[2];
$LOGadmin_viewable_call_times =	$row[3];

$LOGallowed_campaignsSQL='';
$whereLOGallowed_campaignsSQL='';
if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
	{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
	}
$regexLOGallowed_campaigns = " $LOGallowed_campaigns ";

if (preg_match("/DRA/",$SShosted_settings))
	{$LOGmodify_remoteagents=0;}

$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';
$valLOGadmin_viewable_groupsSQL='';
$vmLOGadmin_viewable_groupsSQL='';
if ( (!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
	{
	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
	$LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	$whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	$valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	$vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	}
else 
	{$admin_viewable_groupsALL=1;}
$regexLOGadmin_viewable_groups = " $LOGadmin_viewable_groups ";

$LOGadmin_viewable_call_timesSQL='';
$whereLOGadmin_viewable_call_timesSQL='';
if ( (!preg_match('/\-\-ALL\-\-/i', $LOGadmin_viewable_call_times)) and (strlen($LOGadmin_viewable_call_times) > 3) )
	{
	$rawLOGadmin_viewable_call_timesSQL = preg_replace("/ -/",'',$LOGadmin_viewable_call_times);
	$rawLOGadmin_viewable_call_timesSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_call_timesSQL);
	$LOGadmin_viewable_call_timesSQL = "and call_time_id IN('---ALL---','$rawLOGadmin_viewable_call_timesSQL')";
	$whereLOGadmin_viewable_call_timesSQL = "where call_time_id IN('---ALL---','$rawLOGadmin_viewable_call_timesSQL')";
	}
$regexLOGadmin_viewable_call_times = " $LOGadmin_viewable_call_times ";

$UUgroups_list='';
if ($admin_viewable_groupsALL > 0)
	{$UUgroups_list .= "<option value=\"---ALL---\">"._QXZ("All Admin User Groups")."</option>\n";}
$stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
$rslt=mysql_to_mysqli($stmt, $link);
$UUgroups_to_print = mysqli_num_rows($rslt);
$o=0;
while ($UUgroups_to_print > $o) 
	{
	$rowx=mysqli_fetch_row($rslt);
	$UUgroups_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
	$o++;
	}

$first_login_link=0;

if ($LOGforce_change_password=='Y')
	{
	$ADD=999997;
	$reports_only_user=1;
	}
if ($SSfirst_login_trigger=='Y')
	{
	
	if ($ADD==999996)
		{$reports_only_user=1;}
	else
		{
		$ADD=999995;
		$first_login_link=1;
		}
	}
if ($ADD==999995)
	{
	$reports_only_user=1;
	}

if (($LOGuser_level < 9) and ($SSlevel_8_disable_add > 0))
	{$add_copy_disabled++;}


if ($download_max_system_stats_metric_name) 
	{
	if (!$query_date) {$query_date=date("Y-m-d", time()-(29*86400));}
	if (!$end_date) 
		{
		$end_date=date("Y-m-d", time());
		}
	else if (strtotime($end_date)>strtotime(date("Y-m-d"))) 
		{
		$end_date=date("Y-m-d");
		}
	if ($query_date>$end_date) {$query_date=$end_date;}

	$num_graph_days = ceil(abs(strtotime($end_date) - strtotime($query_date)) / 86400)+1;
	$CSV_text="";

	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="total call count in and out") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','total_calls','total call count in and out',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="total inbound call count") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','total_calls_inbound_all','total inbound call count',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="total outbound call count") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','total_calls_outbound_all','total outbound call count',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="most concurrent calls in and out") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','(max_inbound + max_outbound)','most concurrent calls in and out',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="most concurrent calls inbound total") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','max_inbound','most concurrent calls inbound total',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="most concurrent calls outbound total") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','max_outbound','most concurrent calls outbound total',$end_date);
		}
	if ($download_max_system_stats_metric_name=="ALL" || $download_max_system_stats_metric_name=="most concurrent agents") 
		{
		download_max_system_stats($campaign_id,$num_graph_days,'system','max_agents','most concurrent agents',$end_date);
		}

	$FILE_TIME = date("Ymd-His");
	$CSVfilename = "MAX_SYSTEM_STATS_$US$FILE_TIME.csv";
	$CSV_text=preg_replace('/ +\"/', '"', $CSV_text);
	$CSV_text=preg_replace('/\" +/', '"', $CSV_text);
	header('Content-type: application/octet-stream');

	header("Content-Disposition: attachment; filename=\"$CSVfilename\"");
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	ob_clean();
	flush();

	echo "$CSV_text";

	exit;
	}


######################################################################################################
######################################################################################################
#######   Header settings
######################################################################################################
######################################################################################################


header ("Content-type: text/html; charset=utf-8");
if ($SSnocache_admin=='1')
	{
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
    }
    
    
echo "\n";
echo "\n";
/*echo "<!-- VERSION: $admin_version   BUILD: $build   ADD: $ADD   PHP_SELF: $PHP_SELF-->\n";*/
echo "\n";
//echo "<script language=\"JavaScript\" src=\"calendar_db.js\"></script>\n";
//echo "<link rel=\"stylesheet\" href=\"calendar.css\">\n";
/* for horizontal submenu */
//echo "<link rel=\"stylesheet\" href=\"submenu.css\">\n";
//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"vicidial_stylesheet.css\" />";
//echo "<style>.tableheadsmalledit1{background-color:#36457E;} </style>";
if ($SSnocache_admin=='1')
	{
	echo "<META HTTP-EQUIV=\"Pragma\" CONTENT=\"no-cache\">\n";
	echo "<META HTTP-EQUIV=\"Expires\" CONTENT=\"-1\">\n";
	echo "<META HTTP-EQUIV=\"CACHE-CONTROL\" CONTENT=\"NO-CACHE\">\n";
	}
if ( ($SSadmin_modify_refresh > 1) and (preg_match("/^3/",$ADD)) )
	{
	$modify_refresh_set=1;
	if (preg_match("/^3/",$ADD)) {$modify_url = "$PHP_SELF?$QUERY_STRING";}
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"$SSadmin_modify_refresh;URL=$modify_url\">\n";
	}
echo "<title>"._QXZ("UTG Contact Centre").": ";

###krishna   set the default screen to the user list
if ( (!isset($ADD)) or (strlen($ADD)<1) )   {
	$ADD="999990"; 
  //   $ADD="0A";
}
if ($ADD=='0') {
	$ADD="999990";
//	$ADD="0A";
}

### set the sections and headers
if ($ADD=="1")			{$hh='users';		echo _QXZ("Add New User");}
if ($ADD=="10101010")	{$hh='users';		echo _QXZ("Hopper Entry");}
if ($ADD=="1A")			{$hh='users';		echo _QXZ("Copy User");}
if ($ADD==11)			{$hh='campaigns';	$sh='basic';	echo _QXZ("Add New Campaign");}
if ($ADD==12)			{$hh='campaigns';	$sh='basic';	echo _QXZ("Copy Campaign");}
if ($ADD==111)			{$hh='lists';		echo _QXZ("Add New List");}
if ($ADD==121)			{$hh='lists';		echo _QXZ("Add New DNC");}
if ($ADD==171)			{$hh='ingroups';	echo _QXZ("Filter Phone Group Numbers");}
if ($ADD==1111)			{$hh='ingroups';	echo _QXZ("Add New In-Group");}
if ($ADD==1211)			{$hh='ingroups';	echo _QXZ("Copy In-Group");}
if ($ADD==1311)			{$hh='ingroups';	echo _QXZ("Add New DID");}
if ($ADD==1411)			{$hh='ingroups';	echo _QXZ("Copy DID");}
if ($ADD==1511)			{$hh='ingroups';	echo _QXZ("Add Call Menu");}
if ($ADD==1611)			{$hh='ingroups';	echo _QXZ("Copy Call Menu");}
if ($ADD==1711)			{$hh='ingroups';	echo _QXZ("Add Filter Phone Group");}
if ($ADD==1811)			{$hh='ingroups';	echo _QXZ("Add New EMAIL In-Group");}
if ($ADD==18111)		{$hh='ingroups';	echo _QXZ("Add New CHAT In-Group");}
if ($ADD==1911)			{$hh='ingroups';	echo _QXZ("Copy EMAIL In-Group");}
if ($ADD==19111)		{$hh='ingroups';	echo _QXZ("Copy CHAT In-Group");}
if ($ADD==11111)		{$hh='remoteagent';	echo _QXZ("Add New Remote Agents");}
if ($ADD==12111)		{$hh='remoteagent';	echo _QXZ("Add Extension Group");}
if ($ADD==111111)		{$hh='usergroups';	echo _QXZ("Add New Users Group");}
if ($ADD==1111111)		{$hh='scripts';		echo _QXZ("Add New Script");}
if ($ADD==11111111)		{$hh='filters';		echo _QXZ("Add New Filter");}
if ($ADD==111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Add New Call Time");}
if ($ADD==131111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("Add New Shift");}
if ($ADD==1111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Add New State Call Time");}
if ($ADD==1211111111)	{$hh='admin';	$sh='times';	echo _QXZ("Add Holiday");}
if ($ADD==11111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADD NEW PHONE");}
if ($ADD==12111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADD NEW PHONE ALIAS");}
if ($ADD==13111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADD NEW GROUP ALIAS");}
if ($ADD==111111111111)	{$hh='admin';	$sh='server';	echo _QXZ("ADD NEW SERVER");}
if ($ADD==131111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("ADD NEW CONF TEMPLATE");}
if ($ADD==141111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("ADD NEW CARRIER");}
if ($ADD==140111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("ADD COPIED CARRIER");}
if ($ADD==151111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("ADD NEW TTS ENTRY");}
if ($ADD==161111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("ADD NEW MUSIC ON HOLD ENTRY");}
if ($ADD==171111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("ADD NEW VOICEMAIL BOX");}
if ($ADD==181111111111)	{$hh='admin';	$sh='label';	echo _QXZ("ADD NEW SCREEN LABEL");}
if ($ADD==191111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("ADD NEW CONTACT");}
if ($ADD==192111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("ADD SETTINGS CONTAINER");}
if ($ADD==193111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("ADD STATUS GROUP");}
if ($ADD==1111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("ADD NEW CONFERENCE");}
if ($ADD==11111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("ADD NEW AGENT CONFERENCE");}
if ($ADD=='2')			{$hh='users';		echo _QXZ("New User Addition");}
if ($ADD=='2A')			{$hh='users';		echo _QXZ("New Copied User Addition");}
if ($ADD==20)			{$hh='campaigns';	$sh='basic';	echo _QXZ("New Copied Campaign Addition");}
if ($ADD==21)			{$hh='campaigns';	$sh='basic';	echo _QXZ("New Campaign Addition");}
if ($ADD==22)			{$hh='campaigns';	$sh='status';	echo _QXZ("New Campaign Status Addition");}
if ($ADD==23)			{$hh='campaigns';	$sh='hotkey';	echo _QXZ("New Campaign HotKey Addition");}
if ($ADD==25)			{$hh='campaigns';	$sh='recycle';	echo _QXZ("New Campaign Lead Recycle Addition");}
if ($ADD==26)			{$hh='campaigns';	$sh='autoalt';	echo _QXZ("New Auto Alt Dial Status");}
if ($ADD==27)			{$hh='campaigns';	$sh='pause';	echo _QXZ("New Agent Pause Code");}
if ($ADD==28)			{$hh='campaigns';	$sh='dialstat';	echo _QXZ("Campaign Dial Status Added");}
if ($ADD==29)			{$hh='campaigns';	$sh='listmix';	echo _QXZ("Campaign List Mix Added");}
if ($ADD==201)			{$hh='campaigns';	$sh='preset';	echo _QXZ("Campaign Preset Added");}
if ($ADD==202)			{$hh='campaigns';	$sh='accid';	echo _QXZ("Campaign Areacode CID Modify");}
if ($ADD==211)			{$hh='lists';		echo _QXZ("New List Addition");}
if ($ADD==2111)			{$hh='ingroups';	echo _QXZ("New In-Group Addition");}
if ($ADD==2011)			{$hh='ingroups';	echo _QXZ("New Copied In-Group Addition");}
if ($ADD==2311)			{$hh='ingroups';	echo _QXZ("New DID Addition");}
if ($ADD==2411)			{$hh='ingroups';	echo _QXZ("New Copied DID Addition");}
if ($ADD==2511)			{$hh='ingroups';	echo _QXZ("New Call Menu");}
if ($ADD==2611)			{$hh='ingroups';	echo _QXZ("New Call Menu");}
if ($ADD==2711)			{$hh='ingroups';	echo _QXZ("New Filter Phone Group");}
if ($ADD==2811)			{$hh='ingroups';	echo _QXZ("New Email Group Addition");}
if ($ADD==2911)			{$hh='ingroups';	echo _QXZ("New Copied Email Group Addition");}
if ($ADD==29111)		{$hh='ingroups';	echo _QXZ("New Copied Chat Group Addition");}
if ($ADD==21111)		{$hh='remoteagent';	echo _QXZ("New Remote Agents Addition");}
if ($ADD==22111)		{$hh='remoteagent';	echo _QXZ("New Group Extension Addition");}
if ($ADD==211111)		{$hh='usergroups';	echo _QXZ("New Users Group Addition");}
if ($ADD==2111111)		{$hh='scripts';		echo _QXZ("New Script Addition");}
if ($ADD==21111111)		{$hh='filters';		echo _QXZ("New Filter Addition");}
if ($ADD==211111111)	{$hh='admin';	$sh='times';	echo _QXZ("New Call Time Addition");}
if ($ADD==231111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("New Shift Addition");}
if ($ADD==2111111111)	{$hh='admin';	$sh='times';	echo _QXZ("New State Call Time Addition");}
if ($ADD==2211111111)	{$hh='admin';	$sh='times';	echo _QXZ("New Holiday Addition");}
if ($ADD==21111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADDING NEW PHONE");}
if ($ADD==22111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADDING NEW PHONE ALIAS");}
if ($ADD==23111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("ADDING NEW GROUP ALIAS");}
if ($ADD==211111111111)	{$hh='admin';	$sh='server';	echo _QXZ("ADDING NEW SERVER");}
if ($ADD==221111111111)	{$hh='admin';	$sh='server';	echo _QXZ("ADDING NEW SERVER TRUNK RECORD");}
if ($ADD==231111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("ADDING NEW CONF TEMPLATE");}
if ($ADD==241111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("ADDING NEW CARRIER");}
if ($ADD==240111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("ADDING COPIED CARRIER");}
if ($ADD==251111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("ADDING NEW TTS ENTRY");}
if ($ADD==261111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("ADDING NEW MUSIC ON HOLD ENTRY");}
if ($ADD==271111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("ADDING NEW VOICEMAIL BOX");}
if ($ADD==281111111111)	{$hh='admin';	$sh='label';	echo _QXZ("ADDING NEW SCREEN LABEL");}
if ($ADD==291111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("ADDING NEW CONTACT");}
if ($ADD==292111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("ADDING NEW SETTINGS CONTAINER");}
if ($ADD==293111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("ADDING NEW STATUS GROUP");}
if ($ADD==2111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("ADDING NEW CONFERENCE");}
if ($ADD==21111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("ADDING NEW AGENT CONFERENCE");}
if ($ADD==221111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("ADDING SYSTEM STATUSES");}
if ($ADD==231111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("ADDING STATUS CATEGORY");}
if ($ADD==241111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("ADDING QC STATUS CODE");}
if ($ADD==3)			{$hh='users';		echo _QXZ("Modify User");}
if ($ADD==30)			{$hh='campaigns';	echo _QXZ("Campaign Not Allowed");}
if ($ADD==31)			
	{
	$hh='campaigns';	$sh='detail';	echo _QXZ("Modify Campaign - Detail")." - $campaign_id";
	if ($SUB==22)	{echo " - "._QXZ("Statuses");}
	if ($SUB==23)	{echo " - "._QXZ("HotKeys");}
	if ($SUB==25)	{echo " - "._QXZ("Lead Recycle Entries");}
	if ($SUB==26)	{echo " - "._QXZ("Auto Alt Dial Statuses");}
	if ($SUB==27)	{echo " - "._QXZ("Agent Pause Codes");}
	if ($SUB==28)	{echo " - "._QXZ("QC");}
	if ($SUB==29)	{echo " - "._QXZ("List Mixes");}
	if ($SUB=='20A')	{echo " - "._QXZ("Survey");}
	if ($SUB==201)	{echo " - "._QXZ("Presets");}
	if ($SUB==202)	{echo " - "._QXZ("AC-CID");}
	}
if ($ADD==34)
	{
	$hh='campaigns';	$sh='basic';	echo _QXZ("Modify Campaign - Basic View")." - $campaign_id";
	if ($SUB==22)	{echo " - "._QXZ("Statuses");}
	if ($SUB==23)	{echo " - "._QXZ("HotKeys");}
	if ($SUB==25)	{echo " - "._QXZ("Lead Recycle Entries");}
	if ($SUB==26)	{echo " - "._QXZ("Auto Alt Dial Statuses");}
	if ($SUB==27)	{echo " - "._QXZ("Agent Pause Codes");}
	if ($SUB==28)	{echo " - "._QXZ("QC");}
	if ($SUB==29)	{echo " - "._QXZ("List Mixes");}
	if ($SUB=='20A')	{echo " - "._QXZ("Survey");}
	if ($SUB==201)	{echo " - "._QXZ("Presets");}
	if ($SUB==202)	{echo " - "._QXZ("AC-CID");}
	}
if ($ADD==32)			{$hh='campaigns';	$sh='status';	echo _QXZ("Campaign Statuses");}
if ($ADD==33)			{$hh='campaigns';	$sh='hotkey';	echo _QXZ("Campaign HotKeys");}
if ($ADD==35)			{$hh='campaigns';	$sh='recycle';	echo _QXZ("Campaign Lead Recycle Entries");}
if ($ADD==36)			{$hh='campaigns';	$sh='autoalt';	echo _QXZ("Campaign Auto Alt Dial Statuses");}
if ($ADD==37)			{$hh='campaigns';	$sh='pause';	echo _QXZ("Campaign Agent Pause Codes");}
if ($ADD==38)			{$hh='campaigns';	$sh='dialstat';	echo _QXZ("Campaign Dial Statuses");}
if ($ADD==39)			{$hh='campaigns';	$sh='listmix';	echo _QXZ("Campaign List Mixes");}
if ($ADD==301)			{$hh='campaigns';	$sh='preset';	echo _QXZ("Campaign Presets");}
if ($ADD==302)			{$hh='campaigns';	$sh='accid';	echo _QXZ("Campaign Areacode CID");}
if ($ADD==311)			{$hh='lists';		echo _QXZ("Modify List");}
if ($ADD==3111)			{$hh='ingroups';	echo _QXZ("Modify In-Group");}
if ($ADD==3311)			{$hh='ingroups';	echo _QXZ("Modify DID");}
if ($ADD==3321)			{$hh='ingroups';	echo _QXZ("Modify DID RA Extension Overrides");}
if ($ADD==3511)			{$hh='ingroups';	echo _QXZ("Modify Call Menu");}
if ($ADD==3711)			{$hh='ingroups';	echo _QXZ("Modify Filter Phone Group");}
if ($ADD==3811)			{$hh='ingroups';	echo _QXZ("Modify EMAIL In-Group");}
if ($ADD==3911)			{$hh='ingroups';	echo _QXZ("Modify CHAT In-Group");}
if ($ADD==31111)		{$hh='remoteagent';	echo _QXZ("Modify Remote Agents");}
if ($ADD==32111)		{$hh='remoteagent';	echo _QXZ("Modify Extension Group");}
if ($ADD==311111)		{$hh='usergroups';	echo _QXZ("Modify Users Groups");}
if ($ADD==3111111)		{$hh='scripts';		echo _QXZ("Modify Script");}
if ($ADD==31111111)		{$hh='filters';		echo _QXZ("Modify Filter");}
if ($ADD==311111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Call Time");}
if ($ADD==321111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Call Time State Definitions List");}
if ($ADD==322111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Call Time State Holiday");}
if ($ADD==331111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("Modify Shift");}
if ($ADD==3111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify State Call Time");}
if ($ADD==3211111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Holiday");}
if ($ADD==31111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY PHONE");}
if ($ADD==32111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY PHONE ALIAS");}
if ($ADD==33111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY GROUP ALIAS");}
if ($ADD==311111111111)	{$hh='admin';	$sh='server';	echo _QXZ("MODIFY SERVER");}
if ($ADD==331111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("MODIFY CONF TEMPLATE");}
if ($ADD==341111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("MODIFY CARRIER");}
if ($ADD==351111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("MODIFY TTS ENTRY");}
if ($ADD==361111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("MODIFY MUSIC ON HOLD ENTRY");}
if ($ADD==371111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("MODIFY VOICEMAIL BOX");}
if ($ADD==381111111111)	{$hh='admin';	$sh='label';	echo _QXZ("MODIFY SCREEN LABEL");}
if ($ADD==391111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("MODIFY CONTACT");}
if ($ADD==392111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("MODIFY SETTINGS CONTAINER");}
if ($ADD==393111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("MODIFY STATUS GROUP");}
if ($ADD==3111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("MODIFY CONFERENCE");}
if ($ADD==31111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("MODIFY AGENT CONFERENCE");}
if ($ADD==311111111111111)	{$hh='admin';	$sh='settings';	echo _QXZ("MODIFY SYSTEM SETTINGS");}
if ($ADD==321111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY SYSTEM STATUSES");}
if ($ADD==331111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY STATUS CATEGORY");}
if ($ADD==341111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY QC STATUS CODE");}
if ($ADD=="4A")			{$hh='users';		echo _QXZ("Modify User - Admin");}
if ($ADD=="4B")			{$hh='users';		echo _QXZ("Modify User - Admin");}
if ($ADD==4)			{$hh='users';		echo _QXZ("Modify User");}
if ($ADD==41)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Modify Campaign");}
if ($ADD==42)			{$hh='campaigns';	$sh='status';	echo _QXZ("Modify Campaign Status");}
if ($ADD==43)			{$hh='campaigns';	$sh='hotkey';	echo _QXZ("Modify Campaign HotKey");}
if ($ADD==44)			{$hh='campaigns';	$sh='basic';	echo _QXZ("Modify Campaign - Basic View");}
if ($ADD==45)			{$hh='campaigns';	$sh='recycle';	echo _QXZ("Modify Campaign Lead Recycle");}
if ($ADD==47)			{$hh='campaigns';	$sh='pause';	echo _QXZ("Modify Agent Pause Code");}
if ($ADD==48)			{$hh='campaigns';	$sh='qc';	echo _QXZ("Modify Campaign QC Settings");}
if ($ADD==49)			{$hh='campaigns';	$sh='listmix';	echo _QXZ("Modify Campaign List Mix");}
if ($ADD==401)			{$hh='campaigns';	$sh='preset';	echo _QXZ("Modify Campaign Preset");}
if ($ADD=='40A')		{$hh='campaigns';	$sh='survey';	echo _QXZ("Modify Campaign Survey");}
if ($ADD==411)			{$hh='lists';		echo _QXZ("Modify List");}
if ($ADD==4111)			{$hh='ingroups';	echo _QXZ("Modify In-Group");}
if ($ADD==4311)			{$hh='ingroups';	echo _QXZ("Modify DID");}
if ($ADD==4511)			{$hh='ingroups';	echo _QXZ("Modify Call Menu");}
if ($ADD==4711)			{$hh='ingroups';	echo _QXZ("Modify Filter Phone Group");}
if ($ADD==4811)			{$hh='ingroups';	echo _QXZ("Modify Email In-Group");}
if ($ADD==4911)			{$hh='ingroups';	echo _QXZ("Modify Chat In-Group");}
if ($ADD==41111)		{$hh='remoteagent';	echo _QXZ("Modify Remote Agents");}
if ($ADD==42111)		{$hh='remoteagent';	echo _QXZ("Modify Extension Group");}
if ($ADD==411111)		{$hh='usergroups';	echo _QXZ("Modify Users Groups");}
if ($ADD==4111111)		{$hh='scripts';		echo _QXZ("Modify Script");}
if ($ADD==41111111)		{$hh='filters';		echo _QXZ("Modify Filter");}
if ($ADD==411111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Call Time");}
if ($ADD==431111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("Modify Shift");}
if ($ADD==4111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify State Call Time");}
if ($ADD==4211111111)	{$hh='admin';	$sh='times';	echo _QXZ("Modify Holiday");}
if ($ADD==41111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY PHONE");}
if ($ADD==42111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY PHONE ALIAS");}
if ($ADD==43111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("MODIFY GROUP ALIAS");}
if ($ADD==411111111111)	{$hh='admin';	$sh='server';	echo _QXZ("MODIFY SERVER");}
if ($ADD==421111111111)	{$hh='admin';	$sh='server';	echo _QXZ("MODIFY SERVER TRUNK RECORD");}
if ($ADD==431111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("MODIFY CONF TEMPLATE");}
if ($ADD==441111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("MODIFY CARRIER");}
if ($ADD==451111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("MODIFY TTS ENTRY");}
if ($ADD==461111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("MODIFY MUSIC ON HOLD ENTRY");}
if ($ADD==471111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("MODIFY VOICEMAIL BOX");}
if ($ADD==481111111111)	{$hh='admin';	$sh='label';	echo _QXZ("MODIFY SCREEN LABEL");}
if ($ADD==491111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("MODIFY CONTACT");}
if ($ADD==492111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("MODIFY SETTINGS CONTAINER");}
if ($ADD==493111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("MODIFY STATUS GROUP");}
if ($ADD==4111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("MODIFY CONFERENCE");}
if ($ADD==41111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("MODIFY CONFERENCE");}
if ($ADD==411111111111111)	{$hh='admin';	$sh='settings';	echo _QXZ("MODIFY SYSTEM SETTINGS");}
if ($ADD==421111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY SYSTEM STATUSES");}
if ($ADD==431111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY STATUS CATEGORIES");}
if ($ADD==441111111111111)	{$hh='admin';	$sh='status';	echo _QXZ("MODIFY QC STATUS CODE");}
if ($ADD==5)			{$hh='users';		echo _QXZ("Delete User");}
if ($ADD==51)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Delete Campaign");}
if ($ADD==52)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Logout Agents");}
if ($ADD==53)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Emergency VDAC Jam Clear");}
if ($ADD==511)			{$hh='lists';		echo _QXZ("Delete List");}
if ($ADD==512)			{$hh='lists';		echo _QXZ("Clear List");}
if ($ADD==5111)			{$hh='ingroups';	echo _QXZ("Delete In-Group");}
if ($ADD==5311)			{$hh='ingroups';	echo _QXZ("Delete DID");}
if ($ADD==5511)			{$hh='ingroups';	echo _QXZ("Delete Call Menu");}
if ($ADD==5711)			{$hh='ingroups';	echo _QXZ("Delete Phone Filter Group");}
if ($ADD==51111)		{$hh='remoteagent';	echo _QXZ("Delete Remote Agents");}
if ($ADD==52111)		{$hh='remoteagent';	echo _QXZ("Delete Extension Group");}
if ($ADD==511111)		{$hh='usergroups';	echo _QXZ("Delete Users Group");}
if ($ADD==5111111)		{$hh='scripts';		echo _QXZ("Delete Script");}
if ($ADD==51111111)		{$hh='filters';		echo _QXZ("Delete Filter");}
if ($ADD==511111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete Call Time");}
if ($ADD==531111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("Delete Shift");}
if ($ADD==5111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete State Call Time");}
if ($ADD==5211111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete Holiday");}
if ($ADD==51111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE PHONE");}
if ($ADD==52111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE PHONE ALIAS");}
if ($ADD==53111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE GROUP ALIAS");}
if ($ADD==511111111111)	{$hh='admin';	$sh='server';	echo _QXZ("DELETE SERVER");}
if ($ADD==531111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("DELETE CONF TEMPLATE");}
if ($ADD==541111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("DELETE CARRIER");}
if ($ADD==551111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("DELETE TTS ENTRY");}
if ($ADD==561111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("DELETE MUSIC ON HOLD ENTRY");}
if ($ADD==571111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("DELETE VOICEMAIL BOX");}
if ($ADD==581111111111)	{$hh='admin';	$sh='label';	echo _QXZ("DELETE SCREEN LABEL");}
if ($ADD==591111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("DELETE CONTACT");}
if ($ADD==592111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("DELETE SETTINGS CONTAINER");}
if ($ADD==593111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("DELETE STATUS GROUP");}
if ($ADD==5111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("DELETE CONFERENCE");}
if ($ADD==51111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("DELETE AGENT CONFERENCE");}
if ($ADD==6)			{$hh='users';		echo _QXZ("Delete User");}
if ($ADD==61)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Delete Campaign");}
if ($ADD==62)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Logout Agents");}
if ($ADD==63)			{$hh='campaigns';	$sh='detail';	echo _QXZ("Emergency VDAC Jam Clear");}
if ($ADD==65)			{$hh='campaigns';	$sh='recycle';	echo _QXZ("Delete Lead Recycle");}
if ($ADD==66)			{$hh='campaigns';	$sh='autoalt';	echo _QXZ("Delete Auto Alt Dial Status");}
if ($ADD==67)			{$hh='campaigns';	$sh='pause';	echo _QXZ("Delete Agent Pause Code");}
if ($ADD==68)			{$hh='campaigns';	$sh='dialstat';	echo _QXZ("Campaign Dial Status Removed");}
if ($ADD==69)			{$hh='campaigns';	$sh='listmix';	echo _QXZ("Campaign List Mix Removed");}
if ($ADD==601)			{$hh='campaigns';	$sh='preset';	echo _QXZ("Campaign Preset Removed");}
if ($ADD==611)			{$hh='lists';		echo _QXZ("Delete List");}
if ($ADD==612)			{$hh='lists';		echo _QXZ("Clear List");}
if ($ADD==6111)			{$hh='ingroups';	echo _QXZ("Delete In-Group");}
if ($ADD==6311)			{$hh='ingroups';	echo _QXZ("Delete DID");}
if ($ADD==6511)			{$hh='ingroups';	echo _QXZ("Delete Call Menu");}
if ($ADD==6711)			{$hh='ingroups';	echo _QXZ("Delete Phone Filter Group");}
if ($ADD==61111)		{$hh='remoteagent';	echo _QXZ("Delete Remote Agents");}
if ($ADD==62111)		{$hh='remoteagent';	echo _QXZ("Delete Extension Group");}
if ($ADD==611111)		{$hh='usergroups';	echo _QXZ("Delete Users Group");}
if ($ADD==6111111)		{$hh='scripts';		echo _QXZ("Delete Script");}
if ($ADD==61111111)		{$hh='filters';		echo _QXZ("Delete Filter");}
if ($ADD==611111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete Call Time");}
if ($ADD==631111111)	{$hh='admin';	$sh='shifts';	echo _QXZ("Delete Shift");}
if ($ADD==6111111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete State Call Time");}
if ($ADD==6211111111)	{$hh='admin';	$sh='times';	echo _QXZ("Delete Holiday");}
if ($ADD==61111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE PHONE");}
if ($ADD==62111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE PHONE ALIAS");}
if ($ADD==63111111111)	{$hh='admin';	$sh='phones';	echo _QXZ("DELETE GROUP ALIAS");}
if ($ADD==611111111111)	{$hh='admin';	$sh='server';	echo _QXZ("DELETE SERVER");}
if ($ADD==621111111111)	{$hh='admin';	$sh='server';	echo _QXZ("DELETE SERVER TRUNK RECORD");}
if ($ADD==631111111111)	{$hh='admin';	$sh='templates';	echo _QXZ("DELETE CONF TEMPLATE");}
if ($ADD==641111111111)	{$hh='admin';	$sh='carriers';	echo _QXZ("DELETE CARRIER");}
if ($ADD==651111111111)	{$hh='admin';	$sh='tts';	echo _QXZ("DELETE TTS ENTRY");}
if ($ADD==661111111111)	{$hh='admin';	$sh='moh';	echo _QXZ("DELETE MUSIC ON HOLD ENTRY");}
if ($ADD==671111111111)	{$hh='admin';	$sh='vm';	echo _QXZ("DELETE VOICEMAIL BOX");}
if ($ADD==681111111111)	{$hh='admin';	$sh='label';	echo _QXZ("DELETE SCREEN LABEL");}
if ($ADD==691111111111)	{$hh='admin';	$sh='cts';	echo _QXZ("DELETE CONTACT");}
if ($ADD==692111111111)	{$hh='admin';	$sh='sc';	echo _QXZ("DELETE SETTINGS CONTAINER");}
if ($ADD==693111111111)	{$hh='admin';	$sh='sg';	echo _QXZ("DELETE STATUS GROUP");}
if ($ADD==6111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("DELETE CONFERENCE");}
if ($ADD==61111111111111)	{$hh='admin';	$sh='conference';	echo _QXZ("DELETE AGENT CONFERENCE");}
if ($ADD==73)			{$hh='campaigns';	echo _QXZ("Dialable Lead Count");}
if ($ADD==7111111)		{$hh='scripts';		echo _QXZ("Preview Script");}
if ($ADD==700000000000000)	{$hh='reports';	echo _QXZ("ADMIN CHANGE LOG");}
if ($ADD==710000000000000)	{$hh='reports';	echo _QXZ("USER ADMIN CHANGE LOG");}
if ($ADD==720000000000000)	{$hh='reports';	echo _QXZ("SECTION ADMIN CHANGE LOG");}
if ($ADD==730000000000000)	{$hh='reports';	echo _QXZ("DETAIL ADMIN CHANGE LOG");}
if ($ADD==800000000000000)	{$hh='reports';	echo _QXZ("ADMIN REPORT LOG");}
if ($ADD==810000000000000)	{$hh='reports';	echo _QXZ("USER ADMIN REPORT LOG");}
if ($ADD==830000000000000)	{$hh='reports';	echo _QXZ("DETAIL ADMIN REPORT LOG");}
if ($ADD=="0A")			{$hh='users';		echo _QXZ("Users List");}
if ($ADD==8)			{$hh='users';		echo _QXZ("CallBacks Within Agent");}
if ($ADD==81)			{$hh='campaigns';	$sh='list';	echo _QXZ("CallBacks Within Campaign");}
if ($ADD==811)			{$hh='lists';	echo _QXZ("CallBacks Within List");}
if ($ADD==8111)			{$hh='usergroups';	echo _QXZ("CallBacks Within User Group");}
if ($ADD==10)			{$hh='campaigns';	$sh='list';		echo _QXZ("Campaigns");}
if ($ADD==100)			{$hh='lists';		echo _QXZ("Lists");}
if ($ADD==1000)			{$hh='ingroups';	echo _QXZ("In-Groups");}
if ($ADD==1300)			{$hh='ingroups';	echo _QXZ("DIDs");}
if ($ADD==1320)			{$hh='ingroups';	echo _QXZ("Modify DID RA Extension Overrides");}
if ($ADD==1500)			{$hh='ingroups';	echo _QXZ("Call Menus");}
if ($ADD==1700)			{$hh='ingroups';	echo _QXZ("Filter Phone Groups");}
if ($ADD==1800)			{$hh='ingroups';	echo _QXZ("Email In-Groups");}
if ($ADD==1900)			{$hh='ingroups';	echo _QXZ("Chat In-Groups");}
if ($ADD==10000)		{$hh='remoteagent';	echo _QXZ("Remote Agents");}
if ($ADD==12000)		{$hh='remoteagent';	echo _QXZ("Extension Groups");}
if ($ADD==100000)		{$hh='usergroups';	echo _QXZ("User Groups");}
if ($ADD==1000000)		{$hh='scripts';		echo _QXZ("Scripts");}
if ($ADD==10000000)		{$hh='filters';		echo _QXZ("Filters");}
if ($ADD==100000000)	{$hh='admin';	$sh='times';	echo _QXZ("Call Times");}
if ($ADD==130000000)	{$hh='admin';	$sh='shifts';	echo _QXZ("Shifts");}
if ($ADD==210000000)	{$hh='admin';	$sh='sqlquery';	echo _QXZ("sqlquery");}
if ($ADD==1000000000)	{$hh='admin';	$sh='times';	echo _QXZ("State Call Times");}
if ($ADD==1200000000)	{$hh='admin';	$sh='times';	echo _QXZ("Holidays");}
if ($ADD==10000000000)	{$hh='admin';	$sh='phones';	echo _QXZ("PHONE LIST");}
if ($ADD==12000000000)	{$hh='admin';	$sh='phones';	echo _QXZ("PHONE ALIAS LIST");}
if ($ADD==13000000000)	{$hh='admin';	$sh='phones';	echo _QXZ("GROUP ALIAS LIST");}
if ($ADD==100000000000)	{$hh='admin';	$sh='server';	echo _QXZ("SERVER LIST");}
if ($ADD==130000000000)	{$hh='admin';	$sh='templates';	echo _QXZ("CONF TEMPLATE LIST");}
if ($ADD==140000000000)	{$hh='admin';	$sh='carriers';	echo _QXZ("CARRIER LIST");}
if ($ADD==150000000000)	{$hh='admin';	$sh='tts';	echo _QXZ("TTS ENTRY LIST");}
if ($ADD==160000000000)	{$hh='admin';	$sh='moh';	echo _QXZ("MUSIC ON HOLD ENTRY LIST");}
if ($ADD==170000000000)	{$hh='admin';	$sh='vm';	echo _QXZ("VOICEMAIL BOXES LIST");}
if ($ADD==180000000000)	{$hh='admin';	$sh='label';	echo _QXZ("SCREEN LABELS LIST");}
if ($ADD==190000000000)	{$hh='admin';	$sh='cts';	echo _QXZ("CONTACTS LIST");}
if ($ADD==192000000000)	{$hh='admin';	$sh='sc';	echo _QXZ("SETTINGS CONTAINTER LIST");}
if ($ADD==193000000000)	{$hh='admin';	$sh='sg';	echo _QXZ("STATUS GROUP LIST");}
if ($ADD==1000000000000)	{$hh='admin';	$sh='conference';	echo _QXZ("CONFERENCE LIST");}
if ($ADD==10000000000000)	{$hh='admin';	$sh='conference';	echo _QXZ("AGENT CONFERENCE LIST");}
if ($ADD==100000000000000)	{$hh='qc';		echo _QXZ("Quality Control");}
if ($ADD==881)          {$hh='qc';			echo _QXZ("Quality Control Campaign")," $campaign_id";}
if ($ADD==550)			{$hh='users';		echo _QXZ("Search Form");}
if ($ADD==551)			{$hh='users';		echo _QXZ("SEARCH PHONES");}
if ($ADD==660)			{$hh='users';		echo _QXZ("Search Results");}
if ($ADD==661)			{$hh='users';		echo _QXZ("SEARCH PHONES RESULTS");}
if ($ADD==99999)		{$hh='users';		echo _QXZ("HELP");}
if ($ADD==999999)		{$hh='reports';		echo _QXZ("REPORTS");}
if ($ADD==999998)		{$hh='admin';		echo _QXZ("ADMIN");}
if ($ADD==999997)		{$hh='reports';		echo _QXZ("CHANGE PASSWORD");}
if ($ADD==999996)		{$hh='reports';		echo _QXZ("INITIAL INSTALL WELCOME");}
if ($ADD==999995)		{$hh='reports';		echo _QXZ("COPYRIGHT TRADEMARK LICENSE");}
if ($ADD==999994)		{$hh='reports';		echo _QXZ("ADMIN UTILITIES");}
if ($ADD==999993)		{$hh='reports';		echo _QXZ("SUMMARY STATS");}
if ($ADD==999992)		{$hh='reports';		echo _QXZ("SYSTEM SUMMARY STATS");}
if ($ADD==999991)		{$hh='reports';		echo _QXZ("SERVERS VERSIONS");}
if ($ADD==999990)		{$hh='reports';		echo _QXZ("SYSTEM SNAPSHOT STATS");}
if ($ADD==999989)		{$hh='reports';		echo _QXZ("USER CHANGE LANGUAGE");}

if ( ($ADD==999993) or ($ADD==999992) or ($ADD==730000000000000) or ($ADD==830000000000000) )
	{
	if ($ADD==999993)		{$report_name = "SUMMARY STATS";}
	if ($ADD==999992)		{$report_name = "SYSTEM SUMMARY STATS";}
	if ($ADD==730000000000000)	{$report_name = "DETAIL ADMIN CHANGE LOG";}
	if ($ADD==830000000000000)	{$report_name = "DETAIL ADMIN REPORT LOG";}

	##### BEGIN log visit to the vicidial_report_log table #####
	$LOGip = getenv("REMOTE_ADDR");
	$LOGbrowser = getenv("HTTP_USER_AGENT");
	$LOGscript_name = getenv("SCRIPT_NAME");
	$LOGserver_name = getenv("SERVER_NAME");
	$LOGserver_port = getenv("SERVER_PORT");
	$LOGrequest_uri = getenv("REQUEST_URI");
	$LOGhttp_referer = getenv("HTTP_REFERER");
	if (preg_match("/443/i",$LOGserver_port)) {$HTTPprotocol = 'https://';}
	else {$HTTPprotocol = 'http://';}
	if (($LOGserver_port == '80') or ($LOGserver_port == '443') ) {$LOGserver_port='';}
	else {$LOGserver_port = ":$LOGserver_port";}
	$LOGfull_url = "$HTTPprotocol$LOGserver_name$LOGserver_port$LOGrequest_uri";

	$LOGhostname = php_uname('n');
	if (strlen($LOGhostname)<1) {$LOGhostname='X';}
	if (strlen($LOGserver_name)<1) {$LOGserver_name='X';}

	$stmt="SELECT webserver_id FROM vicidial_webservers where webserver='$LOGserver_name' and hostname='$LOGhostname' LIMIT 1;";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$webserver_id_ct = mysqli_num_rows($rslt);
	if ($webserver_id_ct > 0)
		{
		$row=mysqli_fetch_row($rslt);
		$webserver_id = $row[0];
		}
	else
		{
		##### insert webserver entry
		$stmt="INSERT INTO vicidial_webservers (webserver,hostname) values('$LOGserver_name','$LOGhostname');";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
		$affected_rows = mysqli_affected_rows($link);
		$webserver_id = mysqli_insert_id($link);
		}

	$stmt="INSERT INTO vicidial_report_log set event_date=NOW(), user='$PHP_AUTH_USER', ip_address='$LOGip', report_name='$report_name', browser='$LOGbrowser', referer='$LOGhttp_referer', notes='$LOGserver_name:$LOGserver_port $LOGscript_name |$group, $query_date, $end_date, $shift, $stage, $report_display_type|', url='$LOGfull_url', webserver='$webserver_id';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$report_log_id = mysqli_insert_id($link);
	##### END log visit to the vicidial_report_log table #####
	}

if ( ($ADD>2) and ($ADD < 99998) )
	{
	##### get scripts listing for dynamic pulldown
	$stmt="SELECT script_id,script_name from vicidial_scripts $whereLOGadmin_viewable_groupsSQL order by script_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$scripts_to_print = mysqli_num_rows($rslt);
	$scripts_list="<option value=\"\">"._QXZ("NONE")."</option>\n";

	$o=0;
	while ($scripts_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$scripts_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
		$scriptname_list["$rowx[0]"] = "$rowx[1]";
		$o++;
		}

	##### get filters listing for dynamic pulldown
	$stmt="SELECT lead_filter_id,lead_filter_name,lead_filter_sql from vicidial_lead_filters $whereLOGadmin_viewable_groupsSQL order by lead_filter_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$filters_to_print = mysqli_num_rows($rslt);
	$filters_list="<option value=\"\">NONE</option>\n";

	$o=0;
	while ($filters_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$filters_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
		$filtername_list["$rowx[0]"] = "$rowx[1]";
		$filtersql_list["$rowx[0]"] = "$rowx[2]";
		$o++;
		}

	##### get call_times listing for dynamic pulldown
	$stmt="SELECT call_time_id,call_time_name from vicidial_call_times $whereLOGadmin_viewable_call_timesSQL order by call_time_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$times_to_print = mysqli_num_rows($rslt);

	$o=0;
	while ($times_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$call_times_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
		$call_timename_list["$rowx[0]"] = "$rowx[1]";
		$o++;
		}
	}

if ( ( (strlen($ADD)>4) and ($ADD < 99998) ) or ($ADD==3) or (($ADD>20) and ($ADD<70)) or ($ADD=="4A")  or ($ADD=="4B") or (strlen($ADD)==12) )
	{

	##### BEGIN get campaigns listing for rankings #####

	$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id";
	$rslt=mysql_to_mysqli($stmt, $link);
	$campaigns_to_print = mysqli_num_rows($rslt);
	$campaigns_list='';
	$campaigns_value='';
	$RANKcampaigns_list="<tr ><td>"._QXZ("CAMPAIGN")."</td><td> "._QXZ("RANK")."</td><td> "._QXZ("GRADE")."</td><td>"._QXZ("CALLS")."</td><td ALIGN=CENTER>"._QXZ("WEB VARS")."</td></tr>\n";

	$o=0;
	while ($campaigns_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$campaigns_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
		$campaign_id_values[$o] = $rowx[0];
		$campaign_name_values[$o] = $rowx[1];
		$o++;
		}

	$o=0;
	$stmt_grp_values='';
	while ($campaigns_to_print > $o)
		{
		$group_web_vars='';
		$campaign_web='';
		$stmt="SELECT campaign_rank,calls_today,group_web_vars,campaign_grade from vicidial_campaign_agents where user='$user' and campaign_id='$campaign_id_values[$o]' $LOGallowed_campaignsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$ranks_to_print = mysqli_num_rows($rslt);
		if ($ranks_to_print > 0)
			{
			$row=mysqli_fetch_row($rslt);
			$SELECT_campaign_rank =		$row[0];
			$calls_today =				$row[1];
			$group_web_vars =			$row[2];
			$SELECT_campaign_grade =	$row[3];
			}
		else
			{$calls_today=0;   $SELECT_campaign_rank=0;   $SELECT_campaign_grade=1;   $group_web_vars='';}
		if ( ($ADD=="4A") or ($ADD=="4B") )
			{
			if (isset($_GET["RANK_$campaign_id_values[$o]"]))			{$campaign_rank=$_GET["RANK_$campaign_id_values[$o]"];}
				elseif (isset($_POST["RANK_$campaign_id_values[$o]"]))	{$campaign_rank=$_POST["RANK_$campaign_id_values[$o]"];}
			if (isset($_GET["WEB_$campaign_id_values[$o]"]))			{$campaign_web=$_GET["WEB_$campaign_id_values[$o]"];}
				elseif (isset($_POST["WEB_$campaign_id_values[$o]"]))	{$campaign_web=$_POST["WEB_$campaign_id_values[$o]"];}
			if (isset($_GET["GRADE_$campaign_id_values[$o]"]))			{$campaign_grade=$_GET["GRADE_$campaign_id_values[$o]"];}
				elseif (isset($_POST["GRADE_$campaign_id_values[$o]"]))	{$campaign_grade=$_POST["GRADE_$campaign_id_values[$o]"];}
			if ($non_latin < 1)
				{
				$campaign_rank = preg_replace('/[^-\_0-9]/','',$campaign_rank);
				$campaign_web = preg_replace("/;|\"|\'/","",$campaign_web);
				$campaign_grade = preg_replace('/[^-\_0-9]/','',$campaign_grade);
				}

			if ($ranks_to_print > 0)
				{
				$stmt="UPDATE vicidial_campaign_agents set campaign_rank='$campaign_rank', campaign_weight='$campaign_rank', group_web_vars='$campaign_web',campaign_grade='$campaign_grade' where campaign_id='$campaign_id_values[$o]' and user='$user';";
				$rslt=mysql_to_mysqli($stmt, $link);
				$stmt_grp_values .= "$stmt|";
				}
			else
				{
				$stmt="INSERT INTO vicidial_campaign_agents set campaign_rank='$campaign_rank', campaign_weight='$campaign_rank', campaign_id='$campaign_id_values[$o]', user='$user', group_web_vars='$campaign_web',campaign_grade='$campaign_grade';";
				$rslt=mysql_to_mysqli($stmt, $link);
				$stmt_grp_values .= "$stmt|";
				}

			$stmt="UPDATE vicidial_live_agents set campaign_weight='$campaign_rank',campaign_grade='$campaign_grade' where campaign_id='$campaign_id_values[$o]' and user='$user';";
			$rslt=mysql_to_mysqli($stmt, $link);
			$stmt_grp_values .= "$stmt|";
			}
		else 
			{
			$campaign_rank = $SELECT_campaign_rank;
			$campaign_grade = $SELECT_campaign_grade;
			}

		if (preg_match('/1$|3$|5$|7$|9$/i', $o))
			{$bgcolor='bgcolor="#fff"';} 
		else
			{$bgcolor='bgcolor="#f9f9f9"';}

		# disable non user-group allowable campaign ranks
		$stmt="SELECT user_group from vicidial_users where user='$user' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$Ruser_group =	$row[0];

		$stmt="SELECT allowed_campaigns from vicidial_user_groups where user_group='$Ruser_group' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$allowed_campaigns =	$row[0];
		$allowed_campaigns = preg_replace("/ -$/","",$allowed_campaigns);
		$UGcampaigns = explode(" ", $allowed_campaigns);

		$p=0;   $RANK_camp_active=0;   $GRADE_camp_active=0;   $CR_disabled = '';
		if (preg_match('/\-ALL\-CAMPAIGNS\-/i',$allowed_campaigns))
			{$RANK_camp_active++;   $GRADE_camp_active++;}
		else
			{
			$UGcampaign_ct = count($UGcampaigns);
			while ($p < $UGcampaign_ct)
				{
				if ($campaign_id_values[$o] == $UGcampaigns[$p]) 
					{$RANK_camp_active++;   $GRADE_camp_active++;}
				$p++;
				}
			}
		if ($RANK_camp_active < 1) {$CR_disabled = 'DISABLED';}

		$RANKcampaigns_list .= "<tr  ><td>";
		$campaigns_list .= "<a href=\"$PHP_SELF?ADD=31&campaign_id=$campaign_id_values[$o]\">$campaign_id_values[$o]</a> - $campaign_name_values[$o] \n";
		$RANKcampaigns_list .= "<a href=\"$PHP_SELF?ADD=31&campaign_id=$campaign_id_values[$o]\">$campaign_id_values[$o]</a> - $campaign_name_values[$o] </td>";
		$RANKcampaigns_list .= "<td> <select size=1 name=RANK_$campaign_id_values[$o] $CR_disabled class='form-control' >\n";
		$h="9";
		while ($h>=-9)
			{
			$RANKcampaigns_list .= "<option value=\"$h\"";
			if ($h==$campaign_rank)
				{$RANKcampaigns_list .= " SELECTED";}
			$RANKcampaigns_list .= ">$h</option>";
			$h--;
			}
		if ( (strlen($campaign_web) < 1) and (strlen($group_web_vars) > 0) )
			{$campaign_web=$group_web_vars;}
		$RANKcampaigns_list .= "</select></td>\n";
		$RANKcampaigns_list .= "<td> <select size=1 name=GRADE_$campaign_id_values[$o] $CR_disabled class='form-control' >\n";
		$h="10";
		while ($h>=1)
			{
			$RANKcampaigns_list .= "<option value=\"$h\"";
			if ($h==$campaign_grade)
				{$RANKcampaigns_list .= " SELECTED";}
			$RANKcampaigns_list .= ">$h</option>";
			$h--;
			}
		if ( (strlen($campaign_web) < 1) and (strlen($group_web_vars) > 0) )
			{$campaign_web=$group_web_vars;}
		$RANKcampaigns_list .= "</select></td>\n";
		$RANKcampaigns_list .= "<td align=center> $calls_today</td>\n";
		$RANKcampaigns_list .= "<td> <input type=text size=25 maxlength=255 name=WEB_$campaign_id_values[$o] value=\"$campaign_web\" class='form-control' ></td></tr>\n";
		$o++;
		}
	##### END get campaigns listing for rankings #####


	##### BEGIN get inbound groups listing for checkboxes #####
	$xfer_groupsSQL='';
	if ( (($ADD>20) and ($ADD<70)) and ($ADD!=41) or ( ($ADD==41) and ( (preg_match('/list_activation/i', $stage)) or (preg_match('/test_call/',$stage)) ) ) )
		{
		$stmt="SELECT closer_campaigns,xfer_groups from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$closer_campaigns =	$row[0];
			$closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
			$groups = explode(" ", $closer_campaigns);
		$xfer_groups =	$row[1];
			$xfer_groups = preg_replace("/ -$/","",$xfer_groups);
			$XFERgroups = explode(" ", $xfer_groups);
		$xfer_groupsSQL = preg_replace("/^ | -$/","",$xfer_groups);
		$xfer_groupsSQL = preg_replace("/ /","','",$xfer_groupsSQL);
		$xfer_groupsSQL = "WHERE group_id IN('$xfer_groupsSQL')";
		}
	if ($ADD==41)
		{
		$p=0;
		$XFERgroup_ct = count($XFERgroups);
		while ($p < $XFERgroup_ct)
			{
			$xfer_groups .= " $XFERgroups[$p]";
			$p++;
			}
		$xfer_groupsSQL = preg_replace("/^ | -$/","",$xfer_groups);
		$xfer_groupsSQL = preg_replace("/ /","','",$xfer_groupsSQL);
		$xfer_groupsSQL = "WHERE group_id IN('$xfer_groupsSQL')";
		}

	if ( (($ADD==31111) or ($ADD==31111)) and (count($groups)<1) )
		{
		$stmt="SELECT closer_campaigns from vicidial_remote_agents where remote_agent_id='$remote_agent_id';";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$closer_campaigns =	$row[0];
		$closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
		$groups = explode(" ", $closer_campaigns);
		}

	if ($ADD==3)
		{
		$stmt="SELECT closer_campaigns from vicidial_users where user='$user' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$closer_campaigns =	$row[0];
		$closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
		$groups = explode(" ", $closer_campaigns);
		}

	$stmt="SELECT group_id,group_name from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
#	$stmt="SELECT group_id,group_name from vicidial_inbound_groups where group_id NOT IN('AGENTDIRECT') order by group_id";
	$rslt=mysql_to_mysqli($stmt, $link);
	$groups_to_print = mysqli_num_rows($rslt);
	$groups_list='';
	$groups_value='';
	$XFERgroups_list='';
	$RANKgroups_list="<tr ><td>"._QXZ("INBOUND GROUP")."</td><td> "._QXZ("RANK")."</td><td>  "._QXZ("GRADE")."</td><td> "._QXZ("CALLS")."</td><td ALIGN=CENTER>"._QXZ("WEB VARS")."</td></tr>\n";

	$o=0;
	while ($groups_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$group_id_values[$o] = $rowx[0];
		$group_name_values[$o] = $rowx[1];
		$o++;
		}

	$o=0;
	$USER_inbound_calls_today=0;
	while ($groups_to_print > $o)
		{
		$group_web_vars='';
		$group_web='';
		$stmt="SELECT group_rank,calls_today,group_web_vars,group_grade from vicidial_inbound_group_agents where user='$user' and group_id='$group_id_values[$o]';";
		$rslt=mysql_to_mysqli($stmt, $link);
		$ranks_to_print = mysqli_num_rows($rslt);
		if ($ranks_to_print > 0)
			{
			$row=mysqli_fetch_row($rslt);
			$SELECT_group_rank =	$row[0];
			$calls_today =			$row[1];
			$group_web_vars =		$row[2];
			$SELECT_group_grade =	$row[3];
			}
		else
			{$calls_today=0;   $SELECT_group_rank=0;   $SELECT_group_grade=1;}
		if ( ($ADD=="4A") or ($ADD=="4B") )
			{
			if (isset($_GET["RANK_$group_id_values[$o]"]))			{$group_rank=$_GET["RANK_$group_id_values[$o]"];}
				elseif (isset($_POST["RANK_$group_id_values[$o]"]))	{$group_rank=$_POST["RANK_$group_id_values[$o]"];}
			if (isset($_GET["WEB_$group_id_values[$o]"]))			{$group_web=$_GET["WEB_$group_id_values[$o]"];}
				elseif (isset($_POST["WEB_$group_id_values[$o]"]))	{$group_web=$_POST["WEB_$group_id_values[$o]"];}
			if (isset($_GET["GRADE_$group_id_values[$o]"]))				{$group_grade=$_GET["GRADE_$group_id_values[$o]"];}
				elseif (isset($_POST["GRADE_$group_id_values[$o]"]))	{$group_grade=$_POST["GRADE_$group_id_values[$o]"];}

			if ($non_latin < 1)
				{
				$group_rank = preg_replace('/[^-\_0-9]/','',$group_rank);
				$group_web = preg_replace("/;|\"|\'/","",$group_web);
				$group_grade = preg_replace('/[^-\_0-9]/','',$group_grade);
				}

			if ($ranks_to_print > 0)
				{
				$stmt="UPDATE vicidial_inbound_group_agents set group_rank='$group_rank', group_weight='$group_rank', group_web_vars='$group_web', group_grade='$group_grade' where group_id='$group_id_values[$o]' and user='$user';";
				$rslt=mysql_to_mysqli($stmt, $link);
				$stmt_grp_values .= "$stmt|";
				}
			else
				{
				$stmt="INSERT INTO vicidial_inbound_group_agents set group_rank='$group_rank', group_weight='$group_rank', group_id='$group_id_values[$o]', user='$user', group_web_vars='$group_web', group_grade='$group_grade';";
				$rslt=mysql_to_mysqli($stmt, $link);
				$stmt_grp_values .= "$stmt|";
				}

			$stmt="UPDATE vicidial_live_inbound_agents set group_weight='$group_rank', group_grade='$group_grade' where group_id='$group_id_values[$o]' and user='$user';";
			$rslt=mysql_to_mysqli($stmt, $link);
			$stmt_grp_values .= "$stmt|";
			}
		else 
			{
			$group_rank = $SELECT_group_rank;
			$group_grade = $SELECT_group_grade;
			}

		if (preg_match('/1$|3$|5$|7$|9$/i', $o))
			{$bgcolor='bgcolor="#fff"';} 
		else
			{$bgcolor='bgcolor="#f9f9f9"';}

		$groups_list .= "<input class='filled-in' id='md_checkbox_gl$o' type=\"checkbox\" name=\"groups[]\" value=\"$group_id_values[$o]\"";
		$XFERgroups_list .= "<input class='filled-in' id='md_checkbox_xgl$o' type=\"checkbox\" name=\"XFERgroups[]\" value=\"$group_id_values[$o]\"";
		$RANKgroups_list .= "<tr  ><td> <input class=\"filled-in\" type=\"checkbox\" name=\"groups[]\" value=\"$group_id_values[$o]\" ";
		$p=0;
		$group_ct = count($groups);
		while ($p < $group_ct)
			{
			if ($group_id_values[$o] == $groups[$p]) 
				{
				$groups_list .= " CHECKED";
				$RANKgroups_list .= " CHECKED";
				$groups_value .= " $group_id_values[$o]";
				}
			$p++;
			}
		$p=0;
		$XFERgroup_ct = count($XFERgroups);
		while ($p < $XFERgroup_ct)
			{
			if ($group_id_values[$o] == $XFERgroups[$p]) 
				{
				$XFERgroups_list .= " CHECKED";
				$XFERgroups_value .= " $group_id_values[$o]";
				}
			$p++; 
			}
		$stmt="SELECT queue_priority from vicidial_inbound_groups where group_id='$group_id_values[$o]' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$VIG_priority =			$row[0];

		$groups_list .= "><label for='md_checkbox_gl$o'> <a href=\"$PHP_SELF?ADD=3111&group_id=$group_id_values[$o]\">$group_id_values[$o]</a> - $group_name_values[$o] - $VIG_priority</label> \n";
		$XFERgroups_list .= "><label for='md_checkbox_xgl$o'> <a href=\"$PHP_SELF?ADD=3111&group_id=$group_id_values[$o]\">$group_id_values[$o]</a> - $group_name_values[$o]</label> \n";
		$RANKgroups_list .= "><a href=\"$PHP_SELF?ADD=3111&group_id=$group_id_values[$o]\">$group_id_values[$o]</a> - $group_name_values[$o] </lable></td>";
		$RANKgroups_list .= "<td><select size=1 name=RANK_$group_id_values[$o] class='form-control' >\n";
		$h="9";
		while ($h>=-9)
			{
			$RANKgroups_list .= "<option value=\"$h\"";
			if ($h==$group_rank)
				{$RANKgroups_list .= " SELECTED";}
			$RANKgroups_list .= ">$h</option>";
			$h--;
			}
		if ( (strlen($group_web) < 1) and (strlen($group_web_vars) > 0) )
			{$group_web=$group_web_vars;}
		$RANKgroups_list .= "</select></td>\n";
		$RANKgroups_list .= "<td> <select size=1 name=GRADE_$group_id_values[$o] class='form-control' >\n";
		$h="10";
		while ($h>=1)
			{
			$RANKgroups_list .= "<option value=\"$h\"";
			if ($h==$group_grade)
				{$RANKgroups_list .= " SELECTED";}
			$RANKgroups_list .= ">$h</option>";
			$h--;
			}
		if ( (strlen($group_web) < 1) and (strlen($group_web_vars) > 0) )
			{$group_web=$group_web_vars;}
		$RANKgroups_list .= "</select></td>\n";
		$RANKgroups_list .= "<td align=center>  $calls_today</td>\n";
		$RANKgroups_list .= "<td>  <input type=text size=25 maxlength=255 name=WEB_$group_id_values[$o] value=\"$group_web\" class='form-control' ></td></tr>\n";
		$o++;
		$USER_inbound_calls_today = ($USER_inbound_calls_today + $calls_today);
		}
	if (strlen($groups_value)>2) {$groups_value .= " -";}
	if (strlen($XFERgroups_value)>2) {$XFERgroups_value .= " -";}
	}
	##### END get inbound groups listing for checkboxes #####


##### BEGIN get campaigns listing for checkboxes #####
if ( ($ADD==211111) or ($ADD==311111) or ($ADD==411111) or ($ADD==511111) or ($ADD==611111) )
	{
	if ( ($ADD==211111) or ($ADD==311111) or ($ADD==511111) or ($ADD==611111) )
		{
		$stmt="SELECT allowed_campaigns,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$user_group' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$allowed_campaigns =			$row[0];
		$qc_allowed_campaigns =			$row[1];
		$qc_allowed_inbound_groups =	$row[2];
		$allowed_campaigns = preg_replace("/ -$/","",$allowed_campaigns);
		$campaigns = explode(" ", $allowed_campaigns);
		$qc_allowed_campaigns = preg_replace("/ -$/","",$qc_allowed_campaigns);
		$qc_campaigns = explode(" ", $qc_allowed_campaigns);
		$qc_allowed_inbound_groups = preg_replace("/ -$/","",$qc_allowed_inbound_groups);
		$qc_groups = explode(" ", $qc_allowed_inbound_groups);
		}

	$campaigns_value='';
	if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
		{$campaigns_list='<B><input class=\"filled-in\"    type="checkbox" name="campaigns[]" value="-ALL-CAMPAIGNS-"';}
	$qc_campaigns_value='';
	$qc_campaigns_list='<B><input class=\"filled-in\"  type="checkbox" name="qc_campaigns[]" value="-ALL-CAMPAIGNS-"';
	$qc_groups_value='';
	$qc_groups_list='<B><input class=\"filled-in\"  type="checkbox" name="qc_groups[]" value="-ALL-GROUPS-"';
	$p=0;
	while ($p<2000)
		{
		if (preg_match('/ALL\-CAMPAIGNS/i',$campaigns[$p])) 
			{
			if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
				{
				$campaigns_list.=" CHECKED";
				$campaigns_value .= " -ALL-CAMPAIGNS-";
				}
			}
		if (preg_match('/ALL\-CAMPAIGNS/i',$qc_campaigns[$p])) 
			{
			$qc_campaigns_list.=" CHECKED";
			$qc_campaigns_value .= " -ALL-CAMPAIGNS-";
			}
		if (preg_match('/ALL\-GROUPS/i',$qc_groups[$p])) 
			{
			$qc_groups_list.=" CHECKED";
			$qc_groups_value .= " -ALL-GROUPS-";
			}
		$p++;
		}
	if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
		{$campaigns_list.="><label for=''> "._QXZ("ALL-CAMPAIGNS - USERS CAN VIEW ANY CAMPAIGN")."</B></label><BR>\n";}
	$qc_campaigns_list.="><label for=''> "._QXZ("ALL-CAMPAIGNS - USERS CAN QC ANY CAMPAIGN")."</B></label><BR>\n";
	$qc_groups_list.="><label for=''> "._QXZ("ALL-GROUPS - USERS CAN QC ANY INBOUND GROUP")."</B></label><BR>\n";

	$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$campaigns_to_print = mysqli_num_rows($rslt);

	$o=0;
	while ($campaigns_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$campaign_id_value = $rowx[0];
		$campaign_name_value = $rowx[1];
		$campaigns_list .= "<input class=\"filled-in\" id=\"md_checkbox_11$o\" type=\"checkbox\" name=\"campaigns[]\" value=\"$campaign_id_value\"";
		$qc_campaigns_list .= "<input class=\"filled-in\" id=\"md_checkbox_12$o\" type=\"checkbox\" name=\"qc_campaigns[]\" value=\"$campaign_id_value\"";
		$p=0;
		while ($p<1000)
			{
			if ( ($campaign_id_value == $campaigns[$p]) and (strlen($campaign_id_value) > 1) )
				{
			#	echo "<!--  X $p|$campaign_id_value|$campaigns[$p]| -->";
				$campaigns_list .= " CHECKED";
				$campaigns_value .= " $campaign_id_value";
				}
			if ($campaign_id_value == $qc_campaigns[$p]) 
				{
				$qc_campaigns_list .= " CHECKED";
				$qc_campaigns_value .= " $campaign_id_value";
				}
		#	echo "<!--  O $p|$campaign_id_value|$campaigns[$p]| -->";
			$p++;
			}
		$campaigns_list .= "><label for=\"md_checkbox_11$o\"> $campaign_id_value - $campaign_name_value</label><BR>\n";
		$qc_campaigns_list .= "><label for=\"md_checkbox_12$o\"> $campaign_id_value - $campaign_name_value</label><BR>\n";
		$o++;
		}

	$stmt="SELECT group_id,group_name from vicidial_inbound_groups where group_id NOT IN('AGENTDIRECT') $LOGadmin_viewable_groupsSQL order by group_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$groups_to_print = mysqli_num_rows($rslt);

	$o=0;
	while ($groups_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$group_id_value = $rowx[0];
		$group_name_value = $rowx[1];
		$qc_groups_list .= "<input type=\"checkbox\" name=\"qc_groups[]\" value=\"$group_id_value\"";
		$p=0;
		while ($p<2000)
			{
			if ( ($group_id_value == $qc_groups[$p]) and (strlen($group_id_value) > 1) )
				{
				$qc_groups_list .= " CHECKED";
				$qc_groups_value .= " $group_id_value";
				}
			$p++;
			}
		$qc_groups_list .= "> $group_id_value - $group_name_value<BR>\n";
		$o++;
		}

	if (strlen($campaigns_value)>2) {$campaigns_value .= " -";}
	if (strlen($qc_campaigns_value)>2) {$qc_campaigns_value .= " -";}
	if (strlen($qc_groups_value)>2) {$qc_groups_value .= " -";}
	}
	##### END get campaigns listing for checkboxes #####


if ( (strlen($ADD)==11) or (strlen($ADD)>12) or ( ($ADD > 1299) and ($ADD < 9999) ) or ($ADD=='141111111111') or ($ADD=='140111111111') or ($ADD=='341111111111') or ($ADD=='311111111111111') or ( (strlen($ADD)>4) and ($ADD < 99998) ) or ($ADD==3) or (($ADD>20) and ($ADD<70)) or ($ADD=="4A") or ($ADD=="4B") or (strlen($ADD)==12) )
	{
	##### get server listing for dynamic pulldown 
	$stmt="SELECT server_ip,server_description,external_server_ip from servers order by server_ip";
	$rsltx=mysql_to_mysqli($stmt, $link);
	$servers_to_print = mysqli_num_rows($rsltx);
	$servers_list='';

	$o=0;
	while ($servers_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rsltx);
		$servers_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1] - $rowx[2]</option>\n";
		$o++;
		}
	}



$NWB = " &nbsp; <a href=\"javascript:openNewWindow('help.php";
$NWE = "')\"><i class=\"material-icons\">help</i></a>";



if ($ADD==99999)
	{
	echo"<TITLE>"._QXZ("Help Redirect")."</TITLE>\n";
	echo"<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=iso-8859-1\">\n";
	echo"<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=./help.php\">\n";
	echo"</HEAD>\n";
	echo"<BODY BGCOLOR=#FFFFFF marginheight=0 marginwidth=0 leftmargin=0 topmargin=0>\n";
	echo"<a href=\"./help.php\">"._QXZ("click here to continue").". . .</a>\n";
	exit;
	}

$Permission = $DBUTG->select('role_permissions',['module_id','create','edit','view','delete']);

######################################################################################################
######################################################################################################
#######   7 series, filter count preview and script preview
######################################################################################################
######################################################################################################

