<html>
    <head>
        <title>UTGONE Dialler Installation</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!------ Include the above in your HEAD tag ---------->
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <style>   /*Contact sectiom*/
            .content-header{
                font-family: 'Oleo Script', cursive;
                color:#fcc500;
                font-size: 45px;
            }

            .section-content{
                text-align: center; 

            }
            select {
                color : initial !important;
            }
            #contact{

                font-family: 'Teko', sans-serif;
                padding-top: 60px;
                width: 100%;
                width: 100vw;
                height: 550px; /* change it to your value depending on context*/
                background: #3a6186; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                color : #fff;    
            }
            .contact-section{
                padding-top: 40px;
            }
            .contact-section .col-md-6{
                width: 50%;
            }

            .form-line{
                border-right: 1px solid #B29999;
            }

            .form-group{
                margin-top: 10px;
            }
            label{
                font-size: 1.3em;
                line-height: 1em;
                font-weight: normal;
            }
            .form-control{
                font-size: 1.3em;
                color: #080808;
            }
            textarea.form-control {
                height: 135px;
                resize: none;/*disables the resize function*/
                /* margin-top: px;*/
            }

            .submit{
                font-size: 1.1em;
                float: right;
                width: 150px;
                background-color: transparent;
                color: #fff;

            }
        </style>
    </head>
    <body>
        <section id="contact">
            <div class="section-content">
                <h1 class="section-header"> 
                    <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> UTGONE</span> Installation</h1>

                <?php
                require('db/global.php');
				function mysql_to_mysqli($stmt, $link) 
				{
					$rslt=mysqli_query($link, $stmt);
					return $rslt;
				}
	
                $link = mysqli_connect($server_string, "$DBUser", "$DBPass", "asterisk", $VARDB_port);
                die($link);

                /* Delete Index HTML */
                unlink("index.html");
                echo '<h3><p><i class="fa fa-check"></i> INDEX.HTML file deleted successfully!!</p></h3>';
                /* Create a File Index.PHP */

                $file_pointer = 'index.php';

                if (file_exists($file_pointer)) {
                    echo '<h3><p><i class="fa fa-check"></i> INDEX.PHP file already exist</p></h3>';
                } else {
                    $fp = fopen($file_pointer, 'w');
                    fwrite($fp, "<?php
        header('location:utgone/login.php');
        exit;
        ?>");
                    echo '<h3><p><i class="fa fa-check"></i> INDEX.PHP file created successfully!!</p></h3>';
                    fclose($fp);
                }

                /* Group status active */
                $UserGroupQuery = "UPDATE `vicidial_user_groups` set status = 'Y'";
                $rslt = mysql_to_mysqli($UserGroupQuery, $link);
                echo '<h3><p><i class="fa fa-check"></i> User Group status has been successfully updated!!</p></h3>';

                $UserGroupQuery = "UPDATE `vicidial_users` set experience = 0,auto_enable=Y,admin_interface_enable=1,role_id=1";
                $rslt = mysql_to_mysqli($UserGroupQuery, $link);
                echo '<h3><p><i class="fa fa-check"></i> All users status has been successfully set for new rule!!</p></h3>';

                $query_select = "SELECT * FROM vicidial_users where user = 'AnkitK'";
                $rslt_select = mysql_to_mysqli($query_select, $link);
                $rowcount=mysqli_num_rows($rslt_select);
                if(!$rowcount) {
                    $query = "INSERT INTO `vicidial_users` (`user`, `pass`, `full_name`, `user_level`, `user_group`, `phone_login`, `phone_pass`, `delete_users`, `delete_user_groups`, `delete_lists`, `delete_campaigns`, `delete_ingroups`, `delete_remote_agents`, `load_leads`, `campaign_detail`, `ast_admin_access`, `ast_delete_phones`, `delete_scripts`, `modify_leads`, `hotkeys_active`, `change_agent_campaign`, `agent_choose_ingroups`, `closer_campaigns`, `scheduled_callbacks`, `agentonly_callbacks`, `agentcall_manual`, `vicidial_recording`, `vicidial_transfers`, `delete_filters`, `alter_agent_interface_options`, `closer_default_blended`, `delete_call_times`, `modify_call_times`, `modify_users`, `modify_campaigns`, `modify_lists`, `modify_scripts`, `modify_filters`, `modify_ingroups`, `modify_usergroups`, `modify_remoteagents`, `modify_servers`, `view_reports`, `vicidial_recording_override`, `alter_custdata_override`, `qc_enabled`, `qc_user_level`, `qc_pass`, `qc_finish`, `qc_commit`, `add_timeclock_log`, `modify_timeclock_log`, `delete_timeclock_log`, `alter_custphone_override`, `vdc_agent_api_access`, `modify_inbound_dids`, `delete_inbound_dids`, `active`, `alert_enabled`, `download_lists`, `agent_shift_enforcement_override`, `manager_shift_enforcement_override`, `shift_override_flag`, `export_reports`, `delete_from_dnc`, `email`, `user_code`, `territory`, `allow_alerts`, `agent_choose_territories`, `custom_one`, `custom_two`, `custom_three`, `custom_four`, `custom_five`, `voicemail_id`, `agent_call_log_view_override`, `callcard_admin`, `agent_choose_blended`, `realtime_block_user_info`, `custom_fields_modify`, `force_change_password`, `agent_lead_search_override`, `modify_shifts`, `modify_phones`, `modify_carriers`, `modify_labels`, `modify_statuses`, `modify_voicemail`, `modify_audiostore`, `modify_moh`, `modify_tts`, `preset_contact_search`, `modify_contacts`, `modify_same_user_level`, `admin_hide_lead_data`, `admin_hide_phone_data`, `agentcall_email`, `modify_email_accounts`, `failed_login_count`, `last_login_date`, `last_ip`, `pass_hash`, `alter_admin_interface_options`, `max_inbound_calls`, `modify_custom_dialplans`, `wrapup_seconds_override`, `modify_languages`, `selected_language`, `user_choose_language`, `ignore_group_on_search`, `api_list_restrict`, `api_allowed_functions`, `lead_filter_id`, `admin_cf_show_hidden`, `agentcall_chat`, `user_hide_realtime`, `access_recordings`, `modify_colors`, `user_nickname`, `user_new_lead_limit`, `api_only_user`, `modify_auto_reports`, `modify_ip_lists`, `ignore_ip_list`, `ready_max_logout`, `export_gdpr_leads`, `pause_code_approval`, `max_hopper_calls`, `max_hopper_calls_hour`, `mute_recordings`, `hide_call_log_info`, `next_dial_my_callbacks`, `user_admin_redirect_url`, `role_id`, `allowed_teams_access`, `admin_interface_enable`, `auto_enable`, `experience`) VALUES "
                        . "('AnkitK','Utgesx009',	'Ankit Kumar',	9,	'ADMIN',	'9898',	'9898',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'0',	'1',	'1',	' AGENTDIRECT AGENTDIRECT_CHAT AnkitInbou Chat_Testing SupportTeam SupportUTG TDT6 TestD1061 UTGONE -',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'DISABLED',	'NOT_ACTIVE',	'1',	1,	'1',	'1',	'1',	'1',	'1',	'1',	'NOT_ACTIVE',	'1',	'1',	'1',	'Y',	'0',	'1',	'DISABLED',	'1',	'',	'1',	'1',	'',	'',	'',	'0',	'0',	'',	'',	'',	'',	'',	'',	'DISABLED',	'1',	'1',	'0',	'0',	'N',	'NOT_ACTIVE',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'NOT_ACTIVE',	'1',	'1',	'0',	'0',	'1',	'1',	0,	'2020-02-26 14:40:43',	'14.98.72.66',	'',	'1',	0,	'1',	-1,	'0',	'default English',	'0',	'0',	'0',	' ALL_FUNCTIONS add_group_alias add_lead add_list add_phone add_phone_alias add_user agent_ingroup_info agent_stats_export agent_status audio_playback blind_monitor call_agent callid_info change_ingroups check_phone_number did_log_export external_add_lead external_dial external_hangup external_pause external_status in_group_status logout moh_list park_call pause_code preview_dial_action ra_call_control recording recording_lookup send_dtmf server_refresh set_timer_action sounds_list st_get_agent_active_lead st_login_log transfer_conference update_fields update_lead update_list update_log_entry update_phone update_phone_alias update_user user_group_status vm_list webphone_url webserver logged_in_agents update_campaign update_did lead_field_info phone_number_log switch_lead ccc_lead_info lead_status_search call_status_stats calls_in_queue_count force_fronter_leave_3way force_fronter_audio_stop ',	'NONE',	'0',	'0',	'0',	'0',	'1',	'',	-1,	'0',	'0',	'0',	'0',	-1,	'0',	'1',	0,	0,	'DISABLED',	'DISABLED',	'NOT_ACTIVE',	'',	1,	NULL,	'1',	'Y',	1)";

                    $rslt = mysql_to_mysqli($query, $link);
                    $affected_rows = mysqli_affected_rows($link);

                    if (!empty($affected_rows) && $affected_rows > 0) {
                        echo '<h3><p><i class="fa fa-check"></i> AnkitK user has been successfully created as ADMIN Rights!!</p></h3>';
                    } else {
                        echo '<h3><p><i class="fa fa-check"></i> AnkitK user has been already exist!!</p></h3>';
                    }
                } 

                $SystemSetting = "UPDATE system_settings set webphone_url = '/viciphone/viciphone.php'";
                $rslt = mysql_to_mysqli($SystemSetting, $link);
                echo '<h3><p><i class="fa fa-check"></i> System Setting has been updated!!</p></h3>';
                $date = date('Y-m-d H:i:s');

                $UTGLink = mysqli_connect($server_string, "$DBUser", "$DBPass", "UTG", $VARDB_port);

                $RoleQuery = "INSERT INTO `roles` (`id`, `description`, `title`, `status`, `created_at`, `updated_at`) VALUES
        (1,	'All Modules with full permission',	'Super Admin',	'active',	'$date',	NULL),
        (2,	'This is role for test super admin access is working or not',	'Admin-Testing',	'active',	'$date',	NULL),
        (3,	'Cogent-Admin',	'Cogent-Admin',	'active',	'$date',	NULL)";
                mysql_to_mysqli($RoleQuery, $UTGLink);
                $affected_rows = mysqli_affected_rows($UTGLink);
                if (!empty($affected_rows) && $affected_rows >= 0) {
                    echo '<h3><p><i class="fa fa-check"></i> Role Table entry has been successfully placed!!</p></h3>';
                } else {
                    echo '<h3><p><i class="fa fa-check"></i> Role Table entry does not placed!!</p></h3>';
                }


                $RolePermissionQuery = "INSERT INTO `role_permissions` (`id`, `role_id`, `module_id`, `create`, `edit`, `view`, `delete`, `created_at`, `updated_at`) VALUES
(1,	1,	'1',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(2,	1,	'2',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(3,	1,	'3',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(4,	1,	'4',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(5,	1,	'5',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(6,	1,	'6',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(7,	1,	'7',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(8,	1,	'8',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(9,	1,	'9',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL),
(10,	1,	'9',	'Y',	'Y',	'Y',	'Y',	'$date',	NULL)";

                mysql_to_mysqli($RolePermissionQuery, $UTGLink);
                $affected_rows = mysqli_affected_rows($UTGLink);
                if (!empty($affected_rows) && $affected_rows >= 0) {
                    echo '<h3><p><i class="fa fa-check"></i> Role Permission Table entry has been successfully placed!!</p></h3>';
                } else {
                    echo '<h3><p><i class="fa fa-check"></i> Role Permission Table entry does not placed!!</p></h3>';
                }

                $StatusQuery = "INSERT INTO `vicidial_campaign_statuses` (`status`, `status_name`, `selectable`, `human_answered`, `category`, `sale`, `dnc`, `customer_contact`, `not_interested`, `unworkable`, `scheduled_callback`, `completed`, `min_sec`, `max_sec`, `answering_machine`, `Status_Type`) VALUES
('NEW',	'New Lead',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('QUEUE',	'Lead To Be Called',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('INCALL',	'Lead Being Called',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('DROP',	'Agent Not Available',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('XDROP',	'Agent Not Available IN',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('NA',	'No Answer AutoDial',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('CALLBK',	'Call Back',	'Y',	'Y',	'UNDEFINED',	'N',	'N',	'Y',	'N',	'N',	'Y',	'N',	0,	0,	'N',	'Neutral'),
('CBHOLD',	'Call Back Hold',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'Y',	'N',	'N',	'Y',	'N',	0,	0,	'N',	NULL),
('A',	'Answering Machine',	'Y',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'Y',	'Neutral'),
('AA',	'Answering Machine Auto',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('AM',	'Answering Machine SentToMesg',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'Y',	NULL),
('AL',	'Answering Machine Msg Played',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'Y',	NULL),
('AFAX',	'Fax Machine Auto',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'Y',	'N',	'N',	0,	0,	'N',	NULL),
('AB',	'Busy Auto',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('B',	'Busy',	'Y',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	'Neutral'),
('DC',	'Disconnected Number',	'Y',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'Y',	'N',	'N',	0,	0,	'N',	'Negative'),
('ADC',	'Disconnected Number Auto',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'Y',	'N',	'N',	0,	0,	'N',	NULL),
('DEC',	'Declined Sale',	'Y',	'Y',	'UNDEFINED',	'N',	'N',	'Y',	'N',	'N',	'N',	'N',	0,	0,	'N',	'Negative'),
('DNC',	'DO NOT CALL',	'Y',	'Y',	'UNDEFINED',	'N',	'Y',	'N',	'N',	'N',	'N',	'Y',	0,	0,	'N',	NULL),
('DNCL',	'DO NOT CALL Hopper Sys Match',	'N',	'N',	'UNDEFINED',	'N',	'Y',	'N',	'N',	'N',	'N',	'Y',	0,	0,	'N',	NULL),
('DNCC',	'DO NOT CALL Hopper Camp Match',	'N',	'N',	'UNDEFINED',	'N',	'Y',	'N',	'N',	'N',	'N',	'Y',	0,	0,	'N',	NULL),
('SALE',	'Sale Made',	'Y',	'Y',	'UNDEFINED',	'Y',	'N',	'N',	'N',	'N',	'N',	'Y',	0,	0,	'N',	'Positive'),
('N',	'No Answer',	'Y',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	'Neutral'),
('NI',	'Not Interested',	'Y',	'Y',	'UNDEFINED',	'N',	'N',	'Y',	'Y',	'N',	'N',	'N',	0,	0,	'N',	'Negative'),
('NP',	'No Pitch No Price',	'Y',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('PU',	'Call Picked Up',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('PM',	'Played Message',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('XFER',	'Call Transferred',	'Y',	'Y',	'UNDEFINED',	'N',	'N',	'Y',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('ERI',	'Agent Error',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('SVYEXT',	'Survey sent to Extension',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('SVYVM',	'Survey sent to Voicemail',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('SVYHU',	'Survey Hungup',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('SVYREC',	'Survey sent to Record',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('QVMAIL',	'Queue Abandon Voicemail Left',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('RQXFER',	'Re-Queue',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('TIMEOT',	'Inbound Queue Timeout Drop',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('AFTHRS',	'Inbound After Hours Drop',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('NANQUE',	'Inbound No Agent No Queue Drop',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('PDROP',	'Outbound Pre-Routing Drop',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('IVRXFR',	'Outbound drop to Call Menu',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('SVYCLM',	'Survey sent to Call Menu',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('MLINAT',	'Multi-Lead auto-alt set inactv',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'Y',	0,	0,	'N',	NULL),
('MAXCAL',	'Inbound Max Calls Drop',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('LRERR',	'Outbound Local Channel Res Err',	'N',	'Y',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('QCFAIL',	'QC_FAIL_CALLBK',	'N',	'Y',	'QC',	'N',	'N',	'Y',	'N',	'N',	'Y',	'N',	0,	0,	'N',	NULL),
('ADCT',	'Disconnected Number Temporary',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('LSMERG',	'Agent lead search old lead mrg',	'N',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL),
('DAIR',	'Dead Air',	'Y',	'N',	'UNDEFINED',	'N',	'N',	'N',	'N',	'N',	'N',	'N',	0,	0,	'N',	NULL);";

                mysql_to_mysqli($StatusQuery, $link);
                $StatusAffectedRows = mysqli_affected_rows($link);

                if (!empty($StatusAffectedRows) && $StatusAffectedRows > 0) {
                    echo '<h3><p><i class="fa fa-check"></i> System Status has been successfully inserted!!</p></h3>';
                } else {
                    echo '<h3><p><i class="fa fa-check"></i> System status already exist!!</p></h3>';
                }
				
				$ModulesQuery = "INSERT INTO `modules` (`id`, `description`, `parent`, `title`, `key`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Campaigns',	NULL,	'Campaigns',	'campaigns',	'Y',	'2019-09-03 17:14:13',	NULL),
(2,	'Data',	NULL,	'Data',	'data',	'Y',	'2019-09-03 17:14:13',	NULL),
(3,	'Users',	NULL,	'Users',	'users',	'Y',	'2019-09-03 17:14:13',	NULL),
(4,	'Teams',	NULL,	'Teams',	'teams',	'Y',	'2019-09-03 17:14:13',	NULL),
(5,	'Inbound Groups',	NULL,	'Inbound Groups',	'inbound_groups',	'Y',	'2019-09-03 17:14:13',	NULL),
(6,	'EMAIL',	NULL,	'EMAIL',	'email',	'Y',	'2019-09-03 17:14:13',	NULL),
(7,	'SMS',	NULL,	'SMS',	'sms',	'Y',	'2019-09-03 17:14:13',	NULL),
(8,	'Settings',	NULL,	'Settings',	'settings',	'Y',	'2019-09-03 17:14:13',	NULL),
(9,	'Admin Settings',	NULL,	'Admin Settings',	'admin_settings',	'Y',	'2019-09-03 17:14:13',	NULL),
(10,	'leaderboard',	NULL,	'LeaderBoard',	'leaderboard',	'Y',	'2020-01-02 15:27:19',	NULL);";

                mysql_to_mysqli($ModulesQuery, $link);
                $ModuleAffectedRows = mysqli_affected_rows($link);

                if (!empty($ModuleAffectedRows) && $ModuleAffectedRows > 0) {
                    echo '<h3><p><i class="fa fa-check"></i> Modules has been successfully inserted!!</p></h3>';
                } else {
                    echo '<h3><p><i class="fa fa-check"></i> Modules already exist!!</p></h3>';
                }
                ?>
            </div>
        </section>

    </body>
</html>

<?php
$UploadFile = __DIR__ . '/uploads';
if (!file_exists($UploadFile)) {
    mkdir('uploads');
}

unlink(__FILE__);
?>