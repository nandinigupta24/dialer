<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
	<script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
     <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
	<style>div.noscroll_script {
    min-height: 500px;
    overflow: auto;
    font-size: 12px;}
	.form-control{
	border: 1px solid #66afe9;
	}
	.card{
	border: 5px solid #ffc107;
	}
	#leftsidebar{
	border-right: 5px solid #ffc107;
	}
	#rightsidebar{
	border-left: 5px solid #ffc107;
	}
        #DispoSelectContent a:focus { 
            background-color: #1f91f3 !important;
            color:#fff !important;
        }
        #DispoSelectContent a:hover { 
            background-color: #1f91f3 !important;
            color:#fff !important;
        }
</style>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


##### grab the full name and other settings of the agent
$stmt = "SELECT full_name,user_level,hotkeys_active,agent_choose_ingroups,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,closer_default_blended,user_group,vicidial_recording_override,alter_custphone_override,alert_enabled,agent_shift_enforcement_override,shift_override_flag,allow_alerts,closer_campaigns,agent_choose_territories,custom_one,custom_two,custom_three,custom_four,custom_five,agent_call_log_view_override,agent_choose_blended,agent_lead_search_override,preset_contact_search,max_inbound_calls,wrapup_seconds_override,email,user_choose_language from vicidial_users where user='$VD_login' and active='Y';";
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01007', $VD_login, $server_ip, $session_name, $one_mysql_log);
}
$row = mysqli_fetch_row($rslt);
$LOGfullname = $row[0];
$user_level = $row[1];
$VU_hotkeys_active = $row[2];
$VU_agent_choose_ingroups = $row[3];
$VU_scheduled_callbacks = $row[4];
$agentonly_callbacks = $row[5];
$agentcall_manual = $row[6];
$VU_vicidial_recording = $row[7];
$VU_vicidial_transfers = $row[8];
$VU_closer_default_blended = $row[9];
$VU_user_group = $row[10];
$VU_vicidial_recording_override = $row[11];
$VU_alter_custphone_override = $row[12];
$VU_alert_enabled = $row[13];
$VU_agent_shift_enforcement_override = $row[14];
$VU_shift_override_flag = $row[15];
$VU_allow_alerts = $row[16];
$VU_closer_campaigns = $row[17];
$VU_agent_choose_territories = $row[18];
$VU_custom_one = $row[19];
$VU_custom_two = $row[20];
$VU_custom_three = $row[21];
$VU_custom_four = $row[22];
$VU_custom_five = $row[23];
$VU_agent_call_log_view_override = $row[24];
$VU_agent_choose_blended = $row[25];
$VU_agent_lead_search_override = $row[26];
$VU_preset_contact_search = $row[27];
$VU_max_inbound_calls = $row[28];
$VU_wrapup_seconds_override = $row[29];
$LOGemail = $row[30];
$VU_user_choose_language = $row[31];

if (($VU_alert_enabled > 0) and ( $VU_allow_alerts > 0)) {
    $VU_alert_enabled = 'ON';
} else {
    $VU_alert_enabled = 'OFF';
}
$AgentAlert_allowed = $VU_allow_alerts;

### Gather timeclock and shift enforcement restriction settings
$stmt = "SELECT forced_timeclock_login,shift_enforcement,group_shifts,agent_status_viewable_groups,agent_status_view_time,agent_call_log_view,agent_xfer_consultative,agent_xfer_dial_override,agent_xfer_vm_transfer,agent_xfer_blind_transfer,agent_xfer_dial_with_customer,agent_xfer_park_customer_dial,agent_fullscreen,webphone_url_override,webphone_dialpad_override,webphone_systemkey_override,admin_viewable_groups,agent_xfer_park_3way from vicidial_user_groups where user_group='$VU_user_group';";
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01052', $VD_login, $server_ip, $session_name, $one_mysql_log);
}
$row = mysqli_fetch_row($rslt);
$forced_timeclock_login = $row[0];
$shift_enforcement = $row[1];
$LOGgroup_shiftsSQL = preg_replace('/\s\s/i', '', $row[2]);
$LOGgroup_shiftsSQL = preg_replace('/\s/i', "','", $LOGgroup_shiftsSQL);
$LOGgroup_shiftsSQL = "shift_id IN('$LOGgroup_shiftsSQL')";
$agent_status_viewable_groups = $row[3];
$agent_status_viewable_groupsSQL = preg_replace('/\s\s/i', '', $agent_status_viewable_groups);
$agent_status_viewable_groupsSQL = preg_replace('/\s/i', "','", $agent_status_viewable_groupsSQL);
$agent_status_viewable_groupsSQL = "user_group IN('$agent_status_viewable_groupsSQL')";
$agent_status_view = 0;
if (strlen($agent_status_viewable_groups) > 2) {
    $agent_status_view = 1;
}
$agent_status_view_time = 0;
if ($row[4] == 'Y') {
    $agent_status_view_time = 1;
}
if ($row[5] == 'Y') {
    $agent_call_log_view = 1;
}
if ($row[6] == 'Y') {
    $agent_xfer_consultative = 1;
}
if ($row[7] == 'Y') {
    $agent_xfer_dial_override = 1;
}
if ($row[8] == 'Y') {
    $agent_xfer_vm_transfer = 1;
}
if ($row[9] == 'Y') {
    $agent_xfer_blind_transfer = 1;
}
if ($row[10] == 'Y') {
    $agent_xfer_dial_with_customer = 1;
}
if ($row[11] == 'Y') {
    $agent_xfer_park_customer_dial = 1;
}
if (($row[17] == 'Y') and ( $SSagent_xfer_park_3way > 0)) {
    $agent_xfer_park_3way = 1;
}
if ($VU_agent_call_log_view_override == 'Y') {
    $agent_call_log_view = 1;
}
if ($VU_agent_call_log_view_override == 'N') {
    $agent_call_log_view = 0;
}
$agent_fullscreen = $row[12];
$webphone_url = $row[13];
$webphone_dialpad_override = $row[14];
$system_key = $row[15];
$admin_viewable_groups = $row[16];

$admin_viewable_groupsALL = 0;
$LOGadmin_viewable_groupsSQL = '';
$whereLOGadmin_viewable_groupsSQL = '';
$valLOGadmin_viewable_groupsSQL = '';
$vmLOGadmin_viewable_groupsSQL = '';
if ((!preg_match('/\-\-ALL\-\-/i', $admin_viewable_groups)) and ( strlen($admin_viewable_groups) > 3)) {
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/", '', $admin_viewable_groups);
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /", "','", $rawLOGadmin_viewable_groupsSQL);
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
} else {
    $admin_viewable_groupsALL = 1;
}

if (($webphone_dialpad_override != 'DISABLED') and ( strlen($webphone_dialpad_override) > 0)) {
    $webphone_dialpad = $webphone_dialpad_override;
}

if ((strlen($VD_language) > 0) and ( $VU_user_choose_language == '1')) {
    $LANGUAGEactive = 0;
    if ($VD_language == 'default English') {
        $LANGUAGEactive = 1;
    } else {
        $stmt = "SELECT count(*) FROM vicidial_languages where language_id='$VD_language' and active='Y' $LOGadmin_viewable_groupsSQL;";
        if ($DB) {
            echo "|$stmt|\n";
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01082', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        $row = mysqli_fetch_row($rslt);
        $LANGUAGEactive = $row[0];
    }

    if ($LANGUAGEactive > 0) {
        $stmt = "UPDATE vicidial_users SET selected_language='$VD_language' where user='$VD_login';";
        if ($DB) {
            echo "$stmt\n";
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01083', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        $VUlanguage_affected_rows = mysqli_affected_rows($link);

        echo "<!-- USER LANGUAGE OVERRIDE: |$VUselected_language|$VD_language| -->\n";

        $VUselected_language = $VD_language;
    }
}

### BEGIN - CHECK TO SEE IF AGENT IS LOGGED IN TO TIMECLOCK, IF NOT, OUTPUT ERROR
if ((preg_match('/Y/', $forced_timeclock_login)) or ( (preg_match('/ADMIN_EXEMPT/', $forced_timeclock_login)) and ( $VU_user_level < 8) )) {
    $last_agent_event = '';
    $HHMM = date("Hi");
    $HHteod = substr($timeclock_end_of_day, 0, 2);
    $MMteod = substr($timeclock_end_of_day, 2, 2);

    if ($HHMM < $timeclock_end_of_day) {
        $EoD = mktime($HHteod, $MMteod, 10, date("m"), date("d") - 1, date("Y"));
    } else {
        $EoD = mktime($HHteod, $MMteod, 10, date("m"), date("d"), date("Y"));
    }

    $EoDdate = date("Y-m-d H:i:s", $EoD);

    ##### grab timeclock logged-in time for each user #####
    $stmt = "SELECT event from vicidial_timeclock_log where user='$VD_login' and event_epoch >= '$EoD' order by timeclock_id desc limit 1;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01053', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    $events_to_parse = mysqli_num_rows($rslt);
    if ($events_to_parse > 0) {
        $rowx = mysqli_fetch_row($rslt);
        $last_agent_event = $rowx[0];
    }
    if ($DB > 0) {
        echo "|$stmt|$events_to_parse|$last_agent_event|";
    }
    if ((strlen($last_agent_event) < 2) or ( preg_match('/LOGOUT/', $last_agent_event))) {
        $VDloginDISPLAY = 1;
        $VDdisplayMESSAGE = _QXZ("YOU MUST LOG IN TO THE TIMECLOCK FIRST") . "<br>";
    }
}
### END - CHECK TO SEE IF AGENT IS LOGGED IN TO TIMECLOCK, IF NOT, OUTPUT ERROR
### BEGIN - CHECK TO SEE IF SHIFT ENFORCEMENT IS ENABLED AND AGENT IS OUTSIDE OF THEIR SHIFTS, IF SO, OUTPUT ERROR
if (( (preg_match("/START|ALL/", $shift_enforcement)) and ( !preg_match("/OFF/", $VU_agent_shift_enforcement_override)) ) or ( preg_match("/START|ALL/", $VU_agent_shift_enforcement_override))) {
    $shift_ok = 0;
    if ((strlen($LOGgroup_shiftsSQL) < 3) and ( $VU_shift_override_flag < 1)) {
        $VDloginDISPLAY = 1;
        $VDdisplayMESSAGE = _QXZ("ERROR: There are no Shifts enabled for your user group") . "<br>";
    } else {
        $HHMM = date("Hi");
        $wday = date("w");

        $stmt = "SELECT shift_id,shift_start_time,shift_length,shift_weekdays from vicidial_shifts where $LOGgroup_shiftsSQL order by shift_id";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01056', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        $shifts_to_print = mysqli_num_rows($rslt);

        $o = 0;
        while (($shifts_to_print > $o) and ( $shift_ok < 1)) {
            $rowx = mysqli_fetch_row($rslt);
            $shift_id = $rowx[0];
            $shift_start_time = $rowx[1];
            $shift_length = $rowx[2];
            $shift_weekdays = $rowx[3];

            if (preg_match("/$wday/i", $shift_weekdays)) {
                $HHshift_length = substr($shift_length, 0, 2);
                $MMshift_length = substr($shift_length, 3, 2);
                $HHshift_start_time = substr($shift_start_time, 0, 2);
                $MMshift_start_time = substr($shift_start_time, 2, 2);
                $HHshift_end_time = ($HHshift_length + $HHshift_start_time);
                $MMshift_end_time = ($MMshift_length + $MMshift_start_time);
                if ($MMshift_end_time > 59) {
                    $MMshift_end_time = ($MMshift_end_time - 60);
                    $HHshift_end_time++;
                }
                if ($HHshift_end_time > 23) {
                    $HHshift_end_time = ($HHshift_end_time - 24);
                }
                $HHshift_end_time = sprintf("%02s", $HHshift_end_time);
                $MMshift_end_time = sprintf("%02s", $MMshift_end_time);
                $shift_end_time = "$HHshift_end_time$MMshift_end_time";

                if (
                        ( ($HHMM >= $shift_start_time) and ( $HHMM < $shift_end_time) ) or ( ($HHMM < $shift_start_time) and ( $HHMM < $shift_end_time) and ( $shift_end_time <= $shift_start_time) ) or ( ($HHMM >= $shift_start_time) and ( $HHMM >= $shift_end_time) and ( $shift_end_time <= $shift_start_time) )
                ) {
                    $shift_ok++;
                }
            }
            $o++;
        }

        if (($shift_ok < 1) and ( $VU_shift_override_flag < 1)) {
            $VDloginDISPLAY = 1;
            $VDdisplayMESSAGE = _QXZ("ERROR: You are not allowed to log in outside of your shift") . "<br>";
        }
    }
    if (($shift_ok < 1) and ( $VU_shift_override_flag < 1) and ( $VDloginDISPLAY > 0)) {
        $VDdisplayMESSAGE .= "<br><br>" . _QXZ("MANAGER OVERRIDE:") . "<br>\n";
        $VDdisplayMESSAGE .= "<form action=\"$PHP_SELF\" method=\"post\">\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"MGR_override\" value=\"1\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"relogin\" value=\"YES\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"DB\" value=\"$DB\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"phone_login\" value=\"$phone_login\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"phone_pass\" value=\"$phone_pass\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"VD_login\" value=\"$VD_login\" />\n";
        $VDdisplayMESSAGE .= "<input type=\"hidden\" name=\"VD_pass\" value=\"$VD_pass\" />\n";
        $VDdisplayMESSAGE .= "Manager Login: <input type=\"text\" name=\"MGR_login$loginDATE\" size=\"10\" maxlength=\"20\" /><br>\n";
        $VDdisplayMESSAGE .= "Manager Password: <input type=\"password\" name=\"MGR_pass$loginDATE\" size=\"10\" maxlength=\"20\" /><br>\n";
        $VDdisplayMESSAGE .= "<input type=\"submit\" name=\"SUBMIT\" value=\"" . _QXZ("SUBMIT") . "\" /></form>\n";
    }
}
### END - CHECK TO SEE IF SHIFT ENFORCEMENT IS ENABLED AND AGENT IS OUTSIDE OF THEIR SHIFTS, IF SO, OUTPUT ERROR
### BEGIN find any custom field labels ###
$label_title = _QXZ(" Title");
$label_first_name = _QXZ("First");
$label_middle_initial = _QXZ("MI");
$label_last_name = _QXZ("Last ");
$label_address1 = _QXZ("Address1");
$label_address2 = _QXZ("Address2");
$label_address3 = _QXZ("Address3");
$label_city = _QXZ("City");
$label_state = _QXZ(" State");
$label_province = _QXZ("Province");
$label_postal_code = _QXZ("PostCode");
$label_vendor_lead_code = _QXZ("Vendor ID");
$label_gender = _QXZ(" Gender");
$label_phone_number = _QXZ("Phone");
$label_phone_code = _QXZ("DialCode");
$label_alt_phone = _QXZ("Alt. Phone");
$label_security_phrase = _QXZ("Show");
$label_email = _QXZ("Email");
$label_comments = _QXZ(" Comments");

$stmt = "SELECT label_title,label_first_name,label_middle_initial,label_last_name,label_address1,label_address2,label_address3,label_city,label_state,label_province,label_postal_code,label_vendor_lead_code,label_gender,label_phone_number,label_phone_code,label_alt_phone,label_security_phrase,label_email,label_comments from system_settings;";
$rslt = mysql_to_mysqli($stmt, $link);
$row = mysqli_fetch_row($rslt);
if (strlen($row[0]) > 0) {
    $label_title = $row[0];
}
if (strlen($row[1]) > 0) {
    $label_first_name = $row[1];
}
if (strlen($row[2]) > 0) {
    $label_middle_initial = $row[2];
}
if (strlen($row[3]) > 0) {
    $label_last_name = $row[3];
}
if (strlen($row[4]) > 0) {
    $label_address1 = $row[4];
}
if (strlen($row[5]) > 0) {
    $label_address2 = $row[5];
}
if (strlen($row[6]) > 0) {
    $label_address3 = $row[6];
}
if (strlen($row[7]) > 0) {
    $label_city = $row[7];
}
if (strlen($row[8]) > 0) {
    $label_state = $row[8];
}
if (strlen($row[9]) > 0) {
    $label_province = $row[9];
}
if (strlen($row[10]) > 0) {
    $label_postal_code = $row[10];
}
if (strlen($row[11]) > 0) {
    $label_vendor_lead_code = $row[11];
}
if (strlen($row[12]) > 0) {
    $label_gender = $row[12];
}
if (strlen($row[13]) > 0) {
    $label_phone_number = $row[13];
}
if (strlen($row[14]) > 0) {
    $label_phone_code = $row[14];
}
if (strlen($row[15]) > 0) {
    $label_alt_phone = $row[15];
}
if (strlen($row[16]) > 0) {
    $label_security_phrase = $row[16];
}
if (strlen($row[17]) > 0) {
    $label_email = $row[17];
}
if (strlen($row[18]) > 0) {
    $label_comments = $row[18];
}
### END find any custom field labels ###
if ($label_gender == '---HIDE---') {
    $hide_gender = 1;
}

if ($WeBRooTWritablE > 0) {
    fwrite($fp, "vdweb|GOOD|$date|$VD_login|XXXX|$ip|$browser|$LOGfullname|\n");
    fclose($fp);
}
$user_abb = "$VD_login$VD_login$VD_login$VD_login";
while ((strlen($user_abb) > 4) and ( $forever_stop < 200)) {
    $user_abb = preg_replace("/^\./i", "", $user_abb);
    $forever_stop++;
}

$stmt = "SELECT allowed_campaigns from vicidial_user_groups where user_group='$VU_user_group';";
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01008', $VD_login, $server_ip, $session_name, $one_mysql_log);
}
$row = mysqli_fetch_row($rslt);
$LOGallowed_campaigns = $row[0];

if ((!preg_match("/\s$VD_campaign\s/i", $LOGallowed_campaigns)) and ( !preg_match("/ALL-CAMPAIGNS/i", $LOGallowed_campaigns))) {
    echo "<title>" . _QXZ("Agent web client: Campaign Login") . "</title>\n";
    echo "</head>\n";
    echo "<body class=\"signup-page\" onresize=\"browser_dimensions();\" onload=\"browser_dimensions();\">\n";
    echo '  <div class="signup-box">
        				<div class="logo text-center">
						<img class="logo" src="./images/logo.png"  alt="logo" style="width:100%" />
        				</div>
						<div class="card">
						<div class="body">';
    echo "<form class='form-horizontal' action=\"$PHP_SELF\" method=\"post\">\n";
    echo "<input type=\"hidden\" name=\"db\" value=\"$DB\" />\n";
    echo "<input type=\"hidden\" name=\"JS_browser_height\" id=\"JS_browser_height\" value=\"\" />\n";
    echo "<input type=\"hidden\" name=\"JS_browser_width\" id=\"JS_browser_width\" value=\"\" />\n";
    echo "<input type=\"hidden\" name=\"phone_login\" value=\"$phone_login\" />\n";
    echo "<input type=\"hidden\" name=\"phone_pass\" value=\"$phone_pass\" />\n";
    echo '<div class="msg"><font size=5>Campain Login</font></div>';

    echo "<div class=\"alert alert-danger\"> Sorry, you are not allowed to login to this campaign: $VD_campaign</div>";

    echo '<div class="input-group">
                 <span class="input-group-addon">
                     <i class="material-icons">user</i>
                 </span>';

    echo " <div class=\"form-line\"><input type=\"text\" name=\"VD_login\" size=\"10\" maxlength=\"20\" value=\"$VD_login\" placeholder=\"Username\"/></div></div>";
    echo ' <div class="input-group">
                 <span class="input-group-addon">
                     <i class="material-icons">user</i>
                 </span>';
    echo " <div class=\"form-line\"><input type=\"password\" name=\"VD_pass\" size=\"10\" maxlength=\"20\" value=\"$VD_pass\" placeholder=\"Password\"/></div></div>";
    echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">widgets</i>
                                    </span>';
    echo "<div class=\"form-line\"><span id=\"LogiNCamPaigns\">$camp_form_code</span></div></div>";
    echo "<center><input type=\"submit\" name=\"SUBMIT\" value=\"Submit\" class=\"btn btn-primary waves-effect\" /> ";
    echo "<span id=\"LogiNReseT\"><input type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" class=\"btn btn-primary waves-effect\"></span> ";
    echo "</center>";
    echo "</form></div></div>";
    echo "</body>\n\n";
    echo "</html>\n\n";
    exit;
}

##### check to see that the campaign is active
$stmt = "SELECT count(*) FROM vicidial_campaigns where campaign_id='$VD_campaign' and active='Y';";
if ($DB) {
    echo "|$stmt|\n";
}
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01009', $VD_login, $server_ip, $session_name, $one_mysql_log);
}
$row = mysqli_fetch_row($rslt);
$CAMPactive = $row[0];
if ($CAMPactive > 0) {
    $VARstatuses = '';
    $VARstatusnames = '';
    $VARSELstatuses = '';
    $VARSELstatuses_ct = 0;
    $VARCBstatuses = '';
    $VARMINstatuses = '';
    $VARMAXstatuses = '';
    $VARCBstatusesLIST = '';
    $cVARstatuses = '';
    $cVARstatusnames = '';
    $cVARSELstatuses = '';
    $cVARSELstatuses_ct = 0;
    $cVARCBstatuses = '';
    $cVARMINstatuses = '';
    $cVARMAXstatuses = '';
    $cVARCBstatusesLIST = '';
    ##### grab the statuses that can be used for dispositioning by an agent
    $stmt = "SELECT status,status_name,scheduled_callback,selectable,min_sec,max_sec FROM vicidial_statuses WHERE status != 'NEW' order by status limit 500;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01010', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    if ($DB) {
        echo "$stmt\n";
    }
    $VD_statuses_ct = mysqli_num_rows($rslt);
    $i = 0;
    while ($i < $VD_statuses_ct) {
        $row = mysqli_fetch_row($rslt);
        $statuses[$i] = $row[0];
        $status_names[$i] = $row[1];
        $CBstatuses[$i] = $row[2];
        $SELstatuses[$i] = $row[3];
        $MINsec[$i] = $row[4];
        $MAXsec[$i] = $row[5];
        if ($TEST_all_statuses > 0) {
            $SELstatuses[$i] = 'Y';
        }
        $VARstatuses = "$VARstatuses'$statuses[$i]',";
        $VARstatusnames = "$VARstatusnames'$status_names[$i]',";
        $VARSELstatuses = "$VARSELstatuses'$SELstatuses[$i]',";
        $VARCBstatuses = "$VARCBstatuses'$CBstatuses[$i]',";
        $VARMINstatuses = "$VARMINstatuses'$MINsec[$i]',";
        $VARMAXstatuses = "$VARMAXstatuses'$MAXsec[$i]',";
        if ($CBstatuses[$i] == 'Y') {
            $VARCBstatusesLIST .= " $statuses[$i]";
        }
        if ($SELstatuses[$i] == 'Y') {
            $VARSELstatuses_ct++;
        }
        $i++;
    }

    ##### grab the campaign-specific statuses that can be used for dispositioning by an agent
    $stmt = "SELECT status,status_name,scheduled_callback,selectable,min_sec,max_sec FROM vicidial_campaign_statuses WHERE status != 'NEW' and campaign_id='$VD_campaign' order by status limit 500;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01011', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    if ($DB) {
        echo "$stmt\n";
    }
    $VD_statuses_camp = mysqli_num_rows($rslt);
    $j = 0;
    while ($j < $VD_statuses_camp) {
        $row = mysqli_fetch_row($rslt);
        $statuses[$i] = $row[0];
        $status_names[$i] = $row[1];
        $CBstatuses[$i] = $row[2];
        $SELstatuses[$i] = $row[3];
        $MINsec[$i] = $row[4];
        $MAXsec[$i] = $row[5];
        if ($TEST_all_statuses > 0) {
            $SELstatuses[$i] = 'Y';
        }
        $cVARstatuses = "$cVARstatuses'$statuses[$i]',";
        $cVARstatusnames = "$cVARstatusnames'$status_names[$i]',";
        $cVARSELstatuses = "$cVARSELstatuses'$SELstatuses[$i]',";
        $cVARCBstatuses = "$cVARCBstatuses'$CBstatuses[$i]',";
        $cVARMINstatuses = "$cVARMINstatuses'$MINsec[$i]',";
        $cVARMAXstatuses = "$cVARMAXstatuses'$MAXsec[$i]',";
        if ($CBstatuses[$i] == 'Y') {
            $cVARCBstatusesLIST .= " $statuses[$i]";
        }
        if ($SELstatuses[$i] == 'Y') {
            $cVARSELstatuses_ct++;
        }
        $i++;
        $j++;
    }
    #	$VD_statuses_ct = ($VD_statuses_ct+$VD_statuses_camp);
    $VARstatuses = substr("$VARstatuses", 0, -1);
    $VARstatusnames = substr("$VARstatusnames", 0, -1);
    $VARSELstatuses = substr("$VARSELstatuses", 0, -1);
    $VARCBstatuses = substr("$VARCBstatuses", 0, -1);
    $VARMINstatuses = substr("$VARMINstatuses", 0, -1);
    $VARMAXstatuses = substr("$VARMAXstatuses", 0, -1);
    $VARCBstatusesLIST .= " ";
    $cVARstatuses = substr("$cVARstatuses", 0, -1);
    $cVARstatusnames = substr("$cVARstatusnames", 0, -1);
    $cVARSELstatuses = substr("$cVARSELstatuses", 0, -1);
    $cVARCBstatuses = substr("$cVARCBstatuses", 0, -1);
    $cVARMINstatuses = substr("$cVARMINstatuses", 0, -1);
    $cVARMAXstatuses = substr("$cVARMAXstatuses", 0, -1);
    $cVARCBstatusesLIST .= " ";

    ##### grab the campaign-specific HotKey statuses that can be used for dispositioning by an agent
    $stmt = "SELECT hotkey,status,status_name FROM vicidial_campaign_hotkeys WHERE selectable='Y' and status != 'NEW' and campaign_id='$VD_campaign' order by hotkey limit 9;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01012', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    if ($DB) {
        echo "$stmt\n";
    }
    $HK_statuses_camp = mysqli_num_rows($rslt);
    $w = 0;
    $HKboxA = '';
    $HKboxB = '';
    $HKboxC = '';
    while ($w < $HK_statuses_camp) {
        $row = mysqli_fetch_row($rslt);
        $HKhotkey[$w] = $row[0];
        $HKstatus[$w] = $row[1];
        $HKstatus_name[$w] = $row[2];
        $HKhotkeys = "$HKhotkeys'$HKhotkey[$w]',";
        $HKstatuses = "$HKstatuses'$HKstatus[$w]',";
        $HKstatusnames = "$HKstatusnames'$HKstatus_name[$w]',";
        if ($w < 3) {
            $HKboxA = "$HKboxA <font class=\"skb_text\">$HKhotkey[$w]</font> - $HKstatus[$w] - $HKstatus_name[$w]<br>";
        }
        if (($w >= 3) and ( $w < 6)) {
            $HKboxB = "$HKboxB <font class=\"skb_text\">$HKhotkey[$w]</font> - $HKstatus[$w] - $HKstatus_name[$w]<br>";
        }
        if ($w >= 6) {
            $HKboxC = "$HKboxC <font class=\"skb_text\">$HKhotkey[$w]</font> - $HKstatus[$w] - $HKstatus_name[$w]<br>";
        }
        $w++;
    }
    $HKhotkeys = substr("$HKhotkeys", 0, -1);
    $HKstatuses = substr("$HKstatuses", 0, -1);
    $HKstatusnames = substr("$HKstatusnames", 0, -1);

    ##### grab the campaign settings
    $stmt = "SELECT park_ext,park_file_name,web_form_address,allow_closers,auto_dial_level,dial_timeout,dial_prefix,campaign_cid,campaign_vdad_exten,campaign_rec_exten,campaign_recording,campaign_rec_filename,campaign_script,get_call_launch,am_message_exten,xferconf_a_dtmf,xferconf_a_number,xferconf_b_dtmf,xferconf_b_number,alt_number_dialing,scheduled_callbacks,wrapup_seconds,wrapup_message,closer_campaigns,use_internal_dnc,allcalls_delay,omit_phone_code,agent_pause_codes_active,no_hopper_leads_logins,campaign_allow_inbound,manual_dial_list_id,default_xfer_group,xfer_groups,disable_alter_custphone,display_queue_count,manual_dial_filter,agent_clipboard_copy,use_campaign_dnc,three_way_call_cid,dial_method,three_way_dial_prefix,web_form_target,vtiger_screen_login,agent_allow_group_alias,default_group_alias,quick_transfer_button,prepopulate_transfer_preset,view_calls_in_queue,view_calls_in_queue_launch,call_requeue_button,pause_after_each_call,no_hopper_dialing,agent_dial_owner_only,agent_display_dialable_leads,web_form_address_two,agent_select_territories,crm_popup_login,crm_login_address,timer_action,timer_action_message,timer_action_seconds,start_call_url,dispo_call_url,xferconf_c_number,xferconf_d_number,xferconf_e_number,use_custom_cid,scheduled_callbacks_alert,scheduled_callbacks_count,manual_dial_override,blind_monitor_warning,blind_monitor_message,blind_monitor_filename,timer_action_destination,enable_xfer_presets,hide_xfer_number_to_dial,manual_dial_prefix,customer_3way_hangup_logging,customer_3way_hangup_seconds,customer_3way_hangup_action,ivr_park_call,manual_preview_dial,api_manual_dial,manual_dial_call_time_check,my_callback_option,per_call_notes,agent_lead_search,agent_lead_search_method,queuemetrics_phone_environment,auto_pause_precall,auto_pause_precall_code,auto_resume_precall,manual_dial_cid,custom_3way_button_transfer,callback_days_limit,disable_dispo_screen,disable_dispo_status,screen_labels,status_display_fields,pllb_grouping,pllb_grouping_limit,in_group_dial,in_group_dial_select,pause_after_next_call,owner_populate,manual_dial_lead_id,dead_max,dispo_max,pause_max,dead_max_dispo,dispo_max_dispo,max_inbound_calls,manual_dial_search_checkbox,hide_call_log_info,timer_alt_seconds,wrapup_bypass,wrapup_after_hotkey,callback_active_limit,callback_active_limit_override,comments_all_tabs,comments_dispo_screen,comments_callback_screen,qc_comment_history,show_previous_callback,clear_script,manual_dial_search_filter,web_form_address_three,manual_dial_override_field,status_display_ingroup,customer_gone_seconds,agent_display_fields,manual_dial_timeout,manual_auto_next,manual_auto_show,allow_required_fields FROM vicidial_campaigns where campaign_id = '$VD_campaign';";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01013', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    if ($DB) {
        echo "$stmt\n";
    }
    $row = mysqli_fetch_row($rslt);
    $park_ext = $row[0];
    $park_file_name = $row[1];
    $web_form_address = stripslashes($row[2]);
    $allow_closers = $row[3];
    $auto_dial_level = $row[4];
    $dial_timeout = $row[5];
    $dial_prefix = $row[6];
    $campaign_cid = $row[7];
    $campaign_vdad_exten = $row[8];
    $campaign_rec_exten = $row[9];
    $campaign_recording = $row[10];
    $campaign_rec_filename = $row[11];
    $campaign_script = $row[12];
    $get_call_launch = $row[13];
    $campaign_am_message_exten = '8320';
    $xferconf_a_dtmf = $row[15];
    $xferconf_a_number = $row[16];
    $xferconf_b_dtmf = $row[17];
    $xferconf_b_number = $row[18];
    $alt_number_dialing = $row[19];
    $VC_scheduled_callbacks = $row[20];
    $wrapup_seconds = $row[21];
    $wrapup_message = $row[22];
    $closer_campaigns = $row[23];
    $use_internal_dnc = $row[24];
    $allcalls_delay = $row[25];
    $omit_phone_code = $row[26];
    $agent_pause_codes_active = $row[27];
    $no_hopper_leads_logins = $row[28];
    $campaign_allow_inbound = $row[29];
    $manual_dial_list_id = $row[30];
    $default_xfer_group = $row[31];
    $xfer_groups = $row[32];
    $disable_alter_custphone = $row[33];
    $display_queue_count = $row[34];
    $manual_dial_filter = $row[35];
    $CopY_tO_ClipboarD = $row[36];
    $use_campaign_dnc = $row[37];
    $three_way_call_cid = $row[38];
    $dial_method = $row[39];
    $three_way_dial_prefix = $row[40];
    $web_form_target = $row[41];
    $vtiger_screen_login = $row[42];
    $agent_allow_group_alias = $row[43];
    $default_group_alias = $row[44];
    $quick_transfer_button = $row[45];
    $prepopulate_transfer_preset = $row[46];
    $view_calls_in_queue = $row[47];
    $view_calls_in_queue_launch = $row[48];
    $call_requeue_button = $row[49];
    $pause_after_each_call = $row[50];
    $no_hopper_dialing = $row[51];
    $agent_dial_owner_only = $row[52];
    $agent_display_dialable_leads = $row[53];
    $web_form_address_two = $row[54];
    $agent_select_territories = $row[55];
    $crm_popup_login = $row[56];
    $crm_login_address = $row[57];
    $timer_action = $row[58];
    $timer_action_message = $row[59];
    $timer_action_seconds = $row[60];
    $start_call_url = $row[61];
    $dispo_call_url = $row[62];
    $xferconf_c_number = $row[63];
    $xferconf_d_number = $row[64];
    $xferconf_e_number = $row[65];
    $use_custom_cid = $row[66];
    $scheduled_callbacks_alert = $row[67];
    $scheduled_callbacks_count = $row[68];
    $manual_dial_override = $row[69];
    $blind_monitor_warning = $row[70];
    $blind_monitor_message = $row[71];
    $blind_monitor_filename = $row[72];
    $timer_action_destination = $row[73];
    $enable_xfer_presets = $row[74];
    $hide_xfer_number_to_dial = $row[75];
    $manual_dial_prefix = $row[76];
    $customer_3way_hangup_logging = $row[77];
    $customer_3way_hangup_seconds = $row[78];
    $customer_3way_hangup_action = $row[79];
    $ivr_park_call = $row[80];
    $manual_preview_dial = $row[81];
    $api_manual_dial = $row[82];
    $manual_dial_call_time_check = $row[83];
    $my_callback_option = $row[84];
    $per_call_notes = $row[85];
    $agent_lead_search = $row[86];
    $agent_lead_search_method = $row[87];
    $qm_phone_environment = $row[88];
    $auto_pause_precall = $row[89];
    $auto_pause_precall_code = $row[90];
    $auto_resume_precall = $row[91];
    $manual_dial_cid = $row[92];
    $custom_3way_button_transfer = $row[93];
    $callback_days_limit = $row[94];
    $disable_dispo_screen = $row[95];
    $disable_dispo_status = $row[96];
    $screen_labels = $row[97];
    $status_display_fields = $row[98];
    $pllb_grouping = $row[99];
    $pllb_grouping_limit = $row[100];
    $in_group_dial = $row[101];
    $in_group_dial_select = $row[102];
    $pause_after_next_call = $row[103];
    $owner_populate = $row[104];
    $manual_dial_lead_id = $row[105];
    $dead_max = $row[106];
    $dispo_max = $row[107];
    $pause_max = $row[108];
    $dead_max_dispo = $row[109];
    $dispo_max_dispo = $row[110];
    $CP_max_inbound_calls = $row[111];
    $manual_dial_search_checkbox = $row[112];
    $hide_call_log_info = $row[113];
    $timer_alt_seconds = $row[114];
    $wrapup_bypass = $row[115];
    $wrapup_after_hotkey = $row[116];
    $callback_active_limit = $row[117];
    $callback_active_limit_override = $row[118];
    $comments_all_tabs = $row[119];
    $comments_dispo_screen = $row[120];
    $comments_callback_screen = $row[121];
    $qc_comment_history = $row[122];
    $show_previous_callback = $row[123];
    $clear_script = $row[124];
    $manual_dial_search_filter = $row[125];
    $web_form_address_three = $row[126];
    $manual_dial_override_field = $row[127];
    $status_display_ingroup = $row[128];
    $customer_gone_seconds = $row[129];
    $agent_display_fields = $row[130];
    $manual_dial_timeout = $row[131];
    $manual_auto_next = $row[132];
    $manual_auto_show = $row[133];
    $allow_required_fields = $row[134];

    if (($SSmanual_auto_next < 1) or ( ($dial_method != 'INBOUND_MAN') and ( $dial_method != 'MANUAL') )) {
        $manual_auto_next = 0;
    }

    if (($manual_dial_timeout < 1) or ( strlen($manual_dial_timeout) < 1)) {
        $manual_dial_timeout = $dial_timeout;
    }

    if ((strlen($customer_gone_seconds) < 1) or ( $customer_gone_seconds < 1)) {
        $customer_gone_seconds = 30;
    }
    $customer_gone_seconds_negative = ($customer_gone_seconds * -1);

    if (($callback_active_limit_override == 'Y') and ( $callback_active_limit > 0)) {
        $temp_cb_act_lmt_ovrd = preg_replace("/[^0-9]/", '', $VU_custom_three);
        if (strlen($temp_cb_act_lmt_ovrd) > 0)
            $callback_active_limit = $temp_cb_act_lmt_ovrd;
    }
    if ($VU_wrapup_seconds_override >= 0) {
        $wrapup_seconds = $VU_wrapup_seconds_override;
    }
    if (($pause_max < 10) or ( strlen($pause_max) < 2)) {
        $pause_max = 0;
    }
    if (($pause_max > 9) and ( $pause_max <= $dial_timeout)) {
        $pause_max = ($dial_timeout + 10);
    }
    if (($queuemetrics_pe_phone_append > 0) and ( strlen($qm_phone_environment) > 0)) {
        $qm_phone_environment .= "-$qm_extension";
    }

    $status_display_NAME = 0;
    $status_display_CALLID = 0;
    $status_display_LEADID = 0;
    $status_display_LISTID = 0;
    if (preg_match("/NAME/", $status_display_fields)) {
        $status_display_NAME = 1;
    }
    if (preg_match("/CALLID/", $status_display_fields)) {
        $status_display_CALLID = 1;
    }
    if (preg_match("/LEADID/", $status_display_fields)) {
        $status_display_LEADID = 1;
    }
    if (preg_match("/LISTID/", $status_display_fields)) {
        $status_display_LISTID = 1;
    }

    if (($screen_labels != '--SYSTEM-SETTINGS--') and ( strlen($screen_labels) > 1)) {
        $stmt = "SELECT label_title,label_first_name,label_middle_initial,label_last_name,label_address1,label_address2,label_address3,label_city,label_state,label_province,label_postal_code,label_vendor_lead_code,label_gender,label_phone_number,label_phone_code,label_alt_phone,label_security_phrase,label_email,label_comments from vicidial_screen_labels where label_id='$screen_labels' and active='Y' limit 1;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01073', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        $screenlabels_count = mysqli_num_rows($rslt);
        if ($screenlabels_count > 0) {
            $row = mysqli_fetch_row($rslt);
            if (strlen($row[0]) > 0) {
                $label_title = $row[0];
            }
            if (strlen($row[1]) > 0) {
                $label_first_name = $row[1];
            }
            if (strlen($row[2]) > 0) {
                $label_middle_initial = $row[2];
            }
            if (strlen($row[3]) > 0) {
                $label_last_name = $row[3];
            }
            if (strlen($row[4]) > 0) {
                $label_address1 = $row[4];
            }
            if (strlen($row[5]) > 0) {
                $label_address2 = $row[5];
            }
            if (strlen($row[6]) > 0) {
                $label_address3 = $row[6];
            }
            if (strlen($row[7]) > 0) {
                $label_city = $row[7];
            }
            if (strlen($row[8]) > 0) {
                $label_state = $row[8];
            }
            if (strlen($row[9]) > 0) {
                $label_province = $row[9];
            }
            if (strlen($row[10]) > 0) {
                $label_postal_code = $row[10];
            }
            if (strlen($row[11]) > 0) {
                $label_vendor_lead_code = $row[11];
            }
            if (strlen($row[12]) > 0) {
                $label_gender = $row[12];
                $hide_gender = 0;
            }
            if (strlen($row[13]) > 0) {
                $label_phone_number = $row[13];
            }
            if (strlen($row[14]) > 0) {
                $label_phone_code = $row[14];
            }
            if (strlen($row[15]) > 0) {
                $label_alt_phone = $row[15];
            }
            if (strlen($row[16]) > 0) {
                $label_security_phrase = $row[16];
            }
            if (strlen($row[17]) > 0) {
                $label_email = $row[17];
            }
            if (strlen($row[18]) > 0) {
                $label_comments = $row[18];
            }
            ### END find any custom field labels ###
            if ($label_gender == '---HIDE---') {
                $hide_gender = 1;
            }
        }
    }

    $hide_dispo_list = 0;
    if (($disable_dispo_screen == 'DISPO_ENABLED') or ( $disable_dispo_screen == 'DISPO_SELECT_DISABLED') or ( strlen($disable_dispo_status) < 1)) {
        if ($disable_dispo_screen == 'DISPO_SELECT_DISABLED') {
            $hide_dispo_list = 1;
        }
        $disable_dispo_screen = 0;
        $disable_dispo_status = '';
    }
    if (($disable_dispo_screen == 'DISPO_DISABLED') and ( strlen($disable_dispo_status) > 0)) {
        $disable_dispo_screen = 1;
    }

    if (($VU_agent_lead_search_override == 'ENABLED') or ( $VU_agent_lead_search_override == 'LIVE_CALL_INBOUND') or ( $VU_agent_lead_search_override == 'LIVE_CALL_INBOUND_AND_MANUAL') or ( $VU_agent_lead_search_override == 'DISABLED')) {
        $agent_lead_search = $VU_agent_lead_search_override;
    }
    $AllowManualQueueCalls = 1;
    $AllowManualQueueCallsChoice = 0;
    if ($api_manual_dial == 'QUEUE') {
        $AllowManualQueueCalls = 0;
        $AllowManualQueueCallsChoice = 1;
    }
    if ($manual_preview_dial == 'DISABLED') {
        $manual_dial_preview = 0;
    }
    if ($manual_dial_override == 'ALLOW_ALL') {
        $agentcall_manual = 1;
    }
    if ($manual_dial_override == 'DISABLE_ALL') {
        $agentcall_manual = 0;
    }
    if ($user_territories_active < 1) {
        $agent_select_territories = 0;
    }
    if (preg_match("/Y/", $agent_select_territories)) {
        $agent_select_territories = 1;
    } else {
        $agent_select_territories = 0;
    }

    if (preg_match("/Y/", $agent_display_dialable_leads)) {
        $agent_display_dialable_leads = 1;
    } else {
        $agent_display_dialable_leads = 0;
    }

    if (preg_match("/Y/", $no_hopper_dialing)) {
        $no_hopper_dialing = 1;
    } else {
        $no_hopper_dialing = 0;
    }

    if ((preg_match("/Y/", $call_requeue_button)) and ( $auto_dial_level > 0)) {
        $call_requeue_button = 1;
    } else {
        $call_requeue_button = 0;
    }

    if ((preg_match("/AUTO/", $view_calls_in_queue_launch)) and ( $auto_dial_level > 0)) {
        $view_calls_in_queue_launch = 1;
    } else {
        $view_calls_in_queue_launch = 0;
    }

    if ((!preg_match("/NONE/", $view_calls_in_queue)) and ( $auto_dial_level > 0)) {
        $view_calls_in_queue = 1;
    } else {
        $view_calls_in_queue = 0;
    }

    if (preg_match("/Y/", $pause_after_each_call)) {
        $dispo_check_all_pause = 1;
    }

    $quick_transfer_button_enabled = 0;
    $quick_transfer_button_locked = 0;
    if (preg_match("/IN_GROUP|PRESET_1|PRESET_2|PRESET_3|PRESET_4|PRESET_5/", $quick_transfer_button)) {
        $quick_transfer_button_enabled = 1;
    }
    if (preg_match("/LOCKED/", $quick_transfer_button)) {
        $quick_transfer_button_locked = 1;
    }

    $custom_3way_button_transfer_enabled = 0;
    $custom_3way_button_transfer_park = 0;
    $custom_3way_button_transfer_view = 0;
    $custom_3way_button_transfer_contacts = 0;
    if (preg_match("/PRESET_|FIELD_/", $custom_3way_button_transfer)) {
        $custom_3way_button_transfer_enabled = 1;
    }
    if (preg_match("/PARK_/", $custom_3way_button_transfer)) {
        $custom_3way_button_transfer_park = 1;
        $custom_3way_button_transfer_enabled = 1;
    }
    if (preg_match("/VIEW_PRESET/", $custom_3way_button_transfer)) {
        $custom_3way_button_transfer_view = 1;
        $custom_3way_button_transfer_enabled = 1;
    }
    if ((preg_match("/VIEW_CONTACTS/", $custom_3way_button_transfer)) and ( $enable_xfer_presets == 'CONTACTS') and ( $VU_preset_contact_search != 'DISABLED')) {
        $custom_3way_button_transfer_contacts = 1;
        $custom_3way_button_transfer_enabled = 1;
    }

    $preset_populate = '';
    $prepopulate_transfer_preset_enabled = 0;
    if (preg_match("/PRESET_1|PRESET_2|PRESET_3|PRESET_4|PRESET_5/", $prepopulate_transfer_preset)) {
        $prepopulate_transfer_preset_enabled = 1;
        if (preg_match("/PRESET_1/", $prepopulate_transfer_preset)) {
            $preset_populate = $xferconf_a_number;
        }
        if (preg_match("/PRESET_2/", $prepopulate_transfer_preset)) {
            $preset_populate = $xferconf_b_number;
        }
        if (preg_match("/PRESET_3/", $prepopulate_transfer_preset)) {
            $preset_populate = $xferconf_c_number;
        }
        if (preg_match("/PRESET_4/", $prepopulate_transfer_preset)) {
            $preset_populate = $xferconf_d_number;
        }
        if (preg_match("/PRESET_5/", $prepopulate_transfer_preset)) {
            $preset_populate = $xferconf_e_number;
        }
    }

    $VARpreset_names = '';
    $VARpreset_numbers = '';
    $VARpreset_dtmfs = '';
    $VARpreset_hide_numbers = '';
    if ($enable_xfer_presets == 'ENABLED') {
        ##### grab the presets for this campaign
        $stmt = "SELECT preset_name,preset_number,preset_dtmf,preset_hide_number FROM vicidial_xfer_presets WHERE campaign_id='$VD_campaign' order by preset_name limit 500;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01067', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $VD_presets = mysqli_num_rows($rslt);
        $j = 0;
        while ($j < $VD_presets) {
            $row = mysqli_fetch_row($rslt);
            $preset_names[$j] = $row[0];
            $preset_numbers[$j] = $row[1];
            $preset_dtmfs[$j] = $row[2];
            $preset_hide_numbers[$j] = $row[3];
            $VARpreset_names = "$VARpreset_names'$preset_names[$j]',";
            $VARpreset_numbers = "$VARpreset_numbers'$preset_numbers[$j]',";
            $VARpreset_dtmfs = "$VARpreset_dtmfs'$preset_dtmfs[$j]',";
            $VARpreset_hide_numbers = "$VARpreset_hide_numbers'$preset_hide_numbers[$j]',";
            $j++;
        }
        $VARpreset_names = substr("$VARpreset_names", 0, -1);
        $VARpreset_numbers = substr("$VARpreset_numbers", 0, -1);
        $VARpreset_dtmfs = substr("$VARpreset_dtmfs", 0, -1);
        $VARpreset_hide_numbers = substr("$VARpreset_hide_numbers", 0, -1);
        $VD_preset_names_ct = $j;
        if ($j < 1) {
            $enable_xfer_presets = 'DISABLED';
        }
    }

    $default_group_alias_cid = '';
    if (strlen($default_group_alias) > 1) {
        $stmt = "select caller_id_number from groups_alias where group_alias_id='$default_group_alias';";
        if ($DB) {
            echo "$stmt\n";
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01055', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        $VDIG_cidnum_ct = mysqli_num_rows($rslt);
        if ($VDIG_cidnum_ct > 0) {
            $row = mysqli_fetch_row($rslt);
            $default_group_alias_cid = $row[0];
        }
    }

    $stmt = "select group_web_vars from vicidial_campaign_agents where campaign_id='$VD_campaign' and user='$VD_login';";
    if ($DB) {
        echo "$stmt\n";
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01056', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    $VDIG_cidogwv = mysqli_num_rows($rslt);
    if ($VDIG_cidogwv > 0) {
        $row = mysqli_fetch_row($rslt);
        $default_web_vars = $row[0];
    }

    if ((!preg_match('/DISABLED/', $VU_vicidial_recording_override)) and ( $VU_vicidial_recording > 0)) {
        $campaign_recording = $VU_vicidial_recording_override;
        echo "<!-- USER RECORDING OVERRIDE: |$VU_vicidial_recording_override|$campaign_recording| -->\n";
    }
    if (($VC_scheduled_callbacks == 'Y') and ( $VU_scheduled_callbacks == '1')) {
        $scheduled_callbacks = '1';
    }
    if ($VU_vicidial_recording == '0') {
        $campaign_recording = 'NEVER';
    }
    if ($VU_alter_custphone_override == 'ALLOW_ALTER') {
        $disable_alter_custphone = 'N';
    }
    if (strlen($manual_dial_prefix) < 1) {
        $manual_dial_prefix = $dial_prefix;
    }
    if (strlen($three_way_dial_prefix) < 1) {
        $three_way_dial_prefix = $dial_prefix;
    }
    if (($alt_number_dialing == 'Y') or ( $alt_number_dialing == 'SELECTED') or ( $alt_number_dialing == 'SELECTED_TIMER_ALT') or ( $alt_number_dialing == 'SELECTED_TIMER_ADDR3')) {
        $alt_phone_dialing = '1';
    } else {
        $alt_phone_dialing = '0';
        $DefaulTAlTDiaL = '0';
    }
    if ($display_queue_count == 'N') {
        $callholdstatus = '0';
    }
    if (($dial_method == 'INBOUND_MAN') or ( $outbound_autodial_active < 1)) {
        $VU_closer_default_blended = 0;
    }

    $closer_campaigns = preg_replace("/^ | -$/", "", $closer_campaigns);
    $closer_campaigns = preg_replace("/ /", "','", $closer_campaigns);
    $closer_campaigns = "'$closer_campaigns'";

    if ((preg_match('/Y/', $agent_pause_codes_active)) or ( preg_match('/FORCE/', $agent_pause_codes_active))) {
        ##### grab the pause codes for this campaign
        $stmt = "SELECT pause_code,pause_code_name FROM vicidial_pause_codes WHERE campaign_id='$VD_campaign' order by pause_code limit 100;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01014', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $VD_pause_codes = mysqli_num_rows($rslt);
        $j = 0;
        while ($j < $VD_pause_codes) {
            $row = mysqli_fetch_row($rslt);
            $pause_codes[$i] = $row[0];
            $pause_code_names[$i] = $row[1];
            $VARpause_codes = "$VARpause_codes'$pause_codes[$i]',";
            $VARpause_code_names = "$VARpause_code_names'$pause_code_names[$i]',";
            $i++;
            $j++;
        }
        $VD_pause_codes_ct = ($VD_pause_codes_ct + $VD_pause_codes);
        $VARpause_codes = substr("$VARpause_codes", 0, -1);
        $VARpause_code_names = substr("$VARpause_code_names", 0, -1);
    }

    ##### grab the inbound groups to choose from if campaign contains CLOSER
    $VARingroups = "''";
    $VARingroup_handlers = "''";
    $VARphonegroups = "''";
    $VARemailgroups = "''";
    $VARchatgroups = "''";
    if (($campaign_allow_inbound == 'Y') and ( $dial_method != 'MANUAL')) {
        ### validate that the agent has not exceeded their max inbound calls for today
        if (($VU_max_inbound_calls > 0) or ( $CP_max_inbound_calls > 0)) {
            $max_inbound_calls = $CP_max_inbound_calls;
            if ($VU_max_inbound_calls > 0) {
                $max_inbound_calls = $VU_max_inbound_calls;
            }

            $stmt = "SELECT sum(calls_today) FROM vicidial_inbound_group_agents where user='$VD_login' and group_type='C';";
            $rslt = mysql_to_mysqli($stmt, $link);
            if ($mel > 0) {
                mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01080', $VD_login, $server_ip, $session_name, $one_mysql_log);
            }
            if ($DB) {
                echo "\n<!-- $rowx[0]|$stmt -->";
            }
            $vigagt_ct = mysqli_num_rows($rslt);
            if ($vigagt_ct > 0) {
                $row = mysqli_fetch_row($rslt);
                $max_inbound_count = $row[0];

                if ($max_inbound_count >= $max_inbound_calls) {
                    $closer_campaigns = "''";
                }
            }
        }

        $VARingroups = '';
        $VARingroup_handlers = '';
        $VARphonegroups = '';
        $VARemailgroups = '';
        $VARchatgroups = '';
        $stmt = "SELECT group_id,group_handling from vicidial_inbound_groups where active = 'Y' and group_id IN($closer_campaigns) order by group_id limit 800;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01015', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $closer_ct = mysqli_num_rows($rslt);
        $INgrpCT = 0;
        $EMAILgrpCT = 0;
        $CHATgrpCT = 0;
        $PHONEgrpCT = 0;
        while ($INgrpCT < $closer_ct) {
            $row = mysqli_fetch_row($rslt);
            $closer_groups[$INgrpCT] = $row[0];
            $closer_group_handling[$INgrpCT] = $row[1]; // PHONE OR EMAIL OR CHAT - this is important
            $VARingroups = "$VARingroups'$closer_groups[$INgrpCT]',";
            $VARingroup_handlers = "$VARingroup_handlers'$closer_group_handling[$INgrpCT]',";
            if ($row[1] == "EMAIL") { // Make a list of ingroups for email handling groups, chat handling groups and one for phones, so there is no overlap
                $VARemailgroups = "$VARemailgroups'$closer_groups[$INgrpCT]',";
                $VARemailgroupsURL = $VARemailgroupsURL . "&email_group_ids[]=$closer_groups[$INgrpCT]";
                $EMAILgrpCT++;
            } else if ($row[1] == "CHAT") {
                $VARchatgroups = "$VARchatgroups'$closer_groups[$INgrpCT]',";
                $VARchatgroupsURL = $VARchatgroupsURL . "&chat_group_ids[]=$closer_groups[$INgrpCT]";
                $CHATgrpCT++;
            } else {
                $VARphonegroups = "$VARphonegroups'$closer_groups[$INgrpCT]',";
                $VARphonegroupsURL = $VARphonegroupsURL . "&phone_group_ids[]=$closer_groups[$INgrpCT]";
                $PHONEgrpCT++;
            }
            $INgrpCT++;
        }
        $VARingroups = substr("$VARingroups", 0, -1);
        $VARingroup_handlers = substr("$VARingroup_handlers", 0, -1);
        $VARphonegroups = substr("$VARphonegroups", 0, -1);
        $VARemailgroups = substr("$VARemailgroups", 0, -1);
        $VARchatgroups = substr("$VARchatgroups", 0, -1);
    } else {
        $closer_campaigns = "''";
    }

    $in_group_dial_display = 0;
    if ($in_group_dial != 'DISABLED') {
        $in_group_dial_display = 1;

        if ($in_group_dial_select == 'CAMPAIGN_SELECTED') {
            $VARdialingroups = '';
            $stmt = "select group_id from vicidial_inbound_groups where active = 'Y' and group_id IN($closer_campaigns) order by group_id limit 800;";
            $rslt = mysql_to_mysqli($stmt, $link);
            if ($mel > 0) {
                mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01076', $VD_login, $server_ip, $session_name, $one_mysql_log);
            }
            if ($DB) {
                echo "$stmt\n";
            }
            $dialcloser_ct = mysqli_num_rows($rslt);
            $dialINgrpCT = 0;
            while ($dialINgrpCT < $dialcloser_ct) {
                $row = mysqli_fetch_row($rslt);
                $dial_closer_groups[$dialINgrpCT] = $row[0];
                $VARdialingroups = "$VARdialingroups'$dial_closer_groups[$dialINgrpCT]',";
                $dialINgrpCT++;
            }
            $VARdialingroups = substr("$VARdialingroups", 0, -1);
        }
        if ($in_group_dial_select == 'ALL_USER_GROUP') {
            $VARdialingroups = '';
            $stmt = "select group_id from vicidial_inbound_groups where active = 'Y' and user_group IN('---ALL---','$user_group') order by group_id limit 800;";
            $rslt = mysql_to_mysqli($stmt, $link);
            if ($mel > 0) {
                mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01077', $VD_login, $server_ip, $session_name, $one_mysql_log);
            }
            if ($DB) {
                echo "$stmt\n";
            }
            $dialcloser_ct = mysqli_num_rows($rslt);
            $dialINgrpCT = 0;
            while ($dialINgrpCT < $dialcloser_ct) {
                $row = mysqli_fetch_row($rslt);
                $dial_closer_groups[$dialINgrpCT] = $row[0];
                $VARdialingroups = "$VARdialingroups'$dial_closer_groups[$dialINgrpCT]',";
                $dialINgrpCT++;
            }
            $VARdialingroups = substr("$VARdialingroups", 0, -1);
        }
    }


    ##### gather territory listings for this agent if select territories is enabled
    $VARterritories = '';
    if ($agent_select_territories > 0) {
        $stmt = "SELECT territory from vicidial_user_territories where user='$VD_login';";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01062', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $territory_ct = mysqli_num_rows($rslt);
        $territoryCT = 0;
        while ($territoryCT < $territory_ct) {
            $row = mysqli_fetch_row($rslt);
            $territories[$territoryCT] = $row[0];
            $VARterritories = "$VARterritories'$territories[$territoryCT]',";
            $territoryCT++;
        }
        $VARterritories = substr("$VARterritories", 0, -1);
        echo "<!-- $territory_ct  $territoryCT |$stmt| -->\n";
    }

    ##### grab the allowable inbound groups to choose from for transfer options
    $xfer_groups = preg_replace("/^ | -$/", "", $xfer_groups);
    $xfer_groups = preg_replace("/ /", "','", $xfer_groups);
    $xfer_groups = "'$xfer_groups'";
    $VARxfergroups = "''";
    if ($allow_closers == 'Y') {
        $VARxfergroups = '';
        $stmt = "select group_id,group_name from vicidial_inbound_groups where active = 'Y' and group_id IN($xfer_groups) order by group_id limit 800;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01016', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $xfer_ct = mysqli_num_rows($rslt);
        $XFgrpCT = 0;
        while ($XFgrpCT < $xfer_ct) {
            $row = mysqli_fetch_row($rslt);
            $VARxfergroups = "$VARxfergroups'$row[0]',";
            $VARxfergroupsnames = "$VARxfergroupsnames'$row[1]',";
            if ($row[0] == "$default_xfer_group") {
                $default_xfer_group_name = $row[1];
            }
            $XFgrpCT++;
        }
        $VARxfergroups = substr("$VARxfergroups", 0, -1);
        $VARxfergroupsnames = substr("$VARxfergroupsnames", 0, -1);
    }

    if (preg_match('/Y/', $agent_allow_group_alias)) {
        ##### grab the active group aliases
        $stmt = "SELECT group_alias_id,group_alias_name,caller_id_number FROM groups_alias WHERE active='Y' order by group_alias_id limit 1000;";
        $rslt = mysql_to_mysqli($stmt, $link);
        if ($mel > 0) {
            mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01054', $VD_login, $server_ip, $session_name, $one_mysql_log);
        }
        if ($DB) {
            echo "$stmt\n";
        }
        $VD_group_aliases = mysqli_num_rows($rslt);
        $j = 0;
        while ($j < $VD_group_aliases) {
            $row = mysqli_fetch_row($rslt);
            $group_alias_id[$i] = $row[0];
            $group_alias_name[$i] = $row[1];
            $caller_id_number[$i] = $row[2];
            $VARgroup_alias_ids = "$VARgroup_alias_ids'$group_alias_id[$i]',";
            $VARgroup_alias_names = "$VARgroup_alias_names'$group_alias_name[$i]',";
            $VARcaller_id_numbers = "$VARcaller_id_numbers'$caller_id_number[$i]',";
            $i++;
            $j++;
        }
        $VD_group_aliases_ct = ($VD_group_aliases_ct + $VD_group_aliases);
        $VARgroup_alias_ids = substr("$VARgroup_alias_ids", 0, -1);
        $VARgroup_alias_names = substr("$VARgroup_alias_names", 0, -1);
        $VARcaller_id_numbers = substr("$VARcaller_id_numbers", 0, -1);
    }

    ##### grab the number of leads in the hopper for this campaign
    $stmt = "SELECT count(*) FROM vicidial_hopper where campaign_id = '$VD_campaign' and status='READY';";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '01017', $VD_login, $server_ip, $session_name, $one_mysql_log);
    }
    if ($DB) {
        echo "$stmt\n";
    }
    $row = mysqli_fetch_row($rslt);
    $campaign_leads_to_call = $row[0];
    echo "<!-- $campaign_leads_to_call - leads left to call in hopper -->\n";
} else {
    $VDloginDISPLAY = 1;
    $VDdisplayMESSAGE = _QXZ("Campaign not active, please try again") . "<br>";
}
			