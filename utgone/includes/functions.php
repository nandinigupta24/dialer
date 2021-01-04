<?php
// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);
$myWorkingDir = strtolower('/utgone/');
$queryString = $_SERVER['QUERY_STRING'];
$requestUrl = strtolower(str_replace('?'.$queryString, '',$_SERVER['REQUEST_URI']));
$pathUrl = trim(str_replace($myWorkingDir, '',$requestUrl),'/');
$pathUrl = explode('/', $pathUrl);
$publicAssestUrl = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/';

include('config/db.php');

$SystemSettings = $database->get('system_settings',['sounds_web_directory','active_voicemail_server']);
$SS_SoundsWebDirectory = $SystemSettings['sounds_web_directory'];
$SS_ActiveVoicemailServer = $SystemSettings['active_voicemail_server'];

/*Role ID Access START*/
if(!empty($_SESSION['CurrentLogin']['role_id']) && $_SESSION['CurrentLogin']['role_id'] != 1){
    $stmtRole = "select m.key as module, rp.create, rp.edit, rp.view, rp.delete
                     from `role_permissions`as rp
                    inner join modules m on m.id = rp.module_id
                    inner join roles r on r.id and  rp.role_id
                    where rp.role_id = '".$_SESSION['CurrentLogin']['role_id']."'";

    $userPermissions = $DBUTG->query($stmtRole)->fetchAll(PDO::FETCH_ASSOC);
    if($userPermissions && count($userPermissions)>0) {
        foreach($userPermissions as $permission){
            $_SESSION['role'][$permission['module']] = $permission;
        }
    }
}
/*Role ID Access END*/


function user_authorization($user, $pass, $user_option, $user_update) {

    global $link;
    global $DB;

    #############################################
    ##### START SYSTEM_SETTINGS LOOKUP #####
    $stmt = "SELECT use_non_latin,webroot_writable,pass_hash_enabled,pass_key,pass_cost FROM system_settings;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($DB) {
        echo "$stmt\n";
    }
    $qm_conf_ct = mysqli_num_rows($rslt);
    if ($qm_conf_ct > 0) {
        $row = mysqli_fetch_row($rslt);
        $non_latin = $row[0];
        $SSwebroot_writable = $row[1];
        $SSpass_hash_enabled = $row[2];
        $SSpass_key = $row[3];
        $SSpass_cost = $row[4];
    }
    ##### END SETTINGS LOOKUP #####
    ###########################################

    $STARTtime = date("U");
    $TODAY = date("Y-m-d");
    $NOW_TIME = date("Y-m-d H:i:s");
    $ip = getenv("REMOTE_ADDR");
    $browser = getenv("HTTP_USER_AGENT");
    $LOCK_over = ($STARTtime - 900); # failed login lockout time is 15 minutes(900 seconds)
    $LOCK_trigger_attempts = 10;

    $user = preg_replace("/\'|\"|\\\\|;/", "", $user);
    $pass = preg_replace("/\'|\"|\\\\|;/", "", $pass);

    $passSQL = "pass='$pass'";

    if ($SSpass_hash_enabled > 0) {
        if (file_exists("../agc/bp.pl")) {
            $pass_hash = exec("../agc/bp.pl --pass=$pass");
        } else {
            $pass_hash = exec("../../agc/bp.pl --pass=$pass");
        }
        $pass_hash = preg_replace("/PHASH: |\n|\r|\t| /", '', $pass_hash);
        $passSQL = "pass_hash='$pass_hash'";
    }

    $stmt = "SELECT count(*) from vicidial_users where user='$user' and $passSQL and user_level > 7 and active='Y' and ( (failed_login_count < $LOCK_trigger_attempts) or (UNIX_TIMESTAMP(last_login_date) < $LOCK_over) );";
    if ($user_option == 'REPORTS') {
        $stmt = "SELECT count(*) from vicidial_users where user='$user' and $passSQL and user_level > 6 and active='Y' and ( (failed_login_count < $LOCK_trigger_attempts) or (UNIX_TIMESTAMP(last_login_date) < $LOCK_over) );";
    }
    if ($user_option == 'REMOTE') {
        $stmt = "SELECT count(*) from vicidial_users where user='$user' and $passSQL and user_level > 3 and active='Y' and ( (failed_login_count < $LOCK_trigger_attempts) or (UNIX_TIMESTAMP(last_login_date) < $LOCK_over) );";
    }
    if ($user_option == 'QC') {
        $stmt = "SELECT count(*) from vicidial_users where user='$user' and $passSQL and user_level > 1 and active='Y' and ( (failed_login_count < $LOCK_trigger_attempts) or (UNIX_TIMESTAMP(last_login_date) < $LOCK_over) );";
    }
    if ($user_option == 'TEST-LOGIN') {
        $stmt = "SELECT count(*) from vicidial_users where user='$user' and $passSQL and active='Y' and ( (failed_login_count < $LOCK_trigger_attempts) or (UNIX_TIMESTAMP(last_login_date) < $LOCK_over) );";
    }
    if ($DB) {
        echo "|$stmt|\n";
    }
    if ($non_latin > 0) {
        $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_row($rslt);
    $auth = $row[0];

    if ($auth < 1) {
        $auth_key = 'BAD';
        $stmt = "SELECT failed_login_count,UNIX_TIMESTAMP(last_login_date) from vicidial_users where user='$user';";
        if ($non_latin > 0) {
            $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        $cl_user_ct = mysqli_num_rows($rslt);
        if ($cl_user_ct > 0) {
            $row = mysqli_fetch_row($rslt);
            $failed_login_count = $row[0];
            $last_login_date = $row[1];

            if ($failed_login_count < $LOCK_trigger_attempts) {
//                $stmt = "UPDATE vicidial_users set failed_login_count=(failed_login_count+1),last_ip='$ip' where user='$user';";
//                $rslt = mysql_to_mysqli($stmt, $link);
            } else {
                if ($LOCK_over > $last_login_date) {
                    $stmt = "UPDATE vicidial_users set last_login_date=NOW(),failed_login_count=1,last_ip='$ip' where user='$user';";
                    $rslt = mysql_to_mysqli($stmt, $link);
                } else {
                    $auth_key = 'LOCK';
                }
            }
        }
        if ($SSwebroot_writable > 0) {
            $fp = fopen("./project_auth_entries.txt", "a");
            fwrite($fp, "ADMIN|FAIL|$NOW_TIME|$user|$auth_key|$ip|$browser|\n");
            fclose($fp);
        }
    } else {
        if ($user_update > 0) {
            $stmt = "UPDATE vicidial_users set last_login_date=NOW(),last_ip='$ip',failed_login_count=0 where user='$user';";
            $rslt = mysql_to_mysqli($stmt, $link);
        }
        $auth_key = 'GOOD';
    }
    return $auth_key;
}

##### END validate user login credentials, check for failed lock out #####

## Get User Role Permissions ##
function user_permissions($username)
{

    global $link;
$stmt = "SELECT role_id from vicidial_users where user='$username'";
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_assoc($rslt);
    $role_id = $row['role_id'];

    return $role_id;
}

## end Get User Roles with Permissions

##### BEGIN reformat seconds into HH:MM:SS or MM:SS #####

function sec_convert($sec, $precision) {
    $sec = round($sec, 0);

    if ($sec < 1) {
        if ($precision == 'HF') {
            return "0:00:00";
        } else {
            if ($precision == 'S') {
                return "0";
            } else {
                return "0:00";
            }
        }
    } else {
        if ($precision == 'HF') {
            $precision = 'H';
        } else {
            if (($sec < 3600) and ( $precision != 'S')) {
                $precision = 'M';
            }
        }

        if ($precision == 'H') {
            $Fhours_H = MathZDC($sec, 3600);
            $Fhours_H_int = floor($Fhours_H);
            $Fhours_H_int = intval("$Fhours_H_int");
            $Fhours_M = ($Fhours_H - $Fhours_H_int);
            $Fhours_M = ($Fhours_M * 60);
            $Fhours_M_int = floor($Fhours_M);
            $Fhours_M_int = intval("$Fhours_M_int");
            $Fhours_S = ($Fhours_M - $Fhours_M_int);
            $Fhours_S = ($Fhours_S * 60);
            $Fhours_S = round($Fhours_S, 0);
            if ($Fhours_S < 10) {
                $Fhours_S = "0$Fhours_S";
            }
            if ($Fhours_M_int < 10) {
                $Fhours_M_int = "0$Fhours_M_int";
            }
            $Ftime = "$Fhours_H_int:$Fhours_M_int:$Fhours_S";
        }
        if ($precision == 'M') {
            $Fminutes_M = MathZDC($sec, 60);
            $Fminutes_M_int = floor($Fminutes_M);
            $Fminutes_M_int = intval("$Fminutes_M_int");
            $Fminutes_S = ($Fminutes_M - $Fminutes_M_int);
            $Fminutes_S = ($Fminutes_S * 60);
            $Fminutes_S = round($Fminutes_S, 0);
            if ($Fminutes_S < 10) {
                $Fminutes_S = "0$Fminutes_S";
            }
            $Ftime = "$Fminutes_M_int:$Fminutes_S";
        }
        if ($precision == 'S') {
            $Ftime = $sec;
        }
        return "$Ftime";
    }
}

##### END reformat seconds into HH:MM:SS or MM:SS #####
##### BEGIN counts like elements in an array, optional sort asc desc #####

function array_group_count($array, $sort = false) {
    $tally_array = array();

    $i = 0;
    foreach (array_unique($array) as $value) {
        $count = 0;
        foreach ($array as $element) {
            if ($element == "$value") {
                $count++;
            }
        }

        $count = sprintf("%010s", $count);
        $tally_array[$i] = "$count $value";
        $i++;
    }

    if ($sort == 'desc') {
        rsort($tally_array);
    } elseif ($sort == 'asc') {
        sort($tally_array);
    }

    return $tally_array;
}

##### END counts like elements in an array, optional sort asc desc #####
##### BEGIN bar chart using max stats data #####

function horizontal_bar_chart($campaign_id, $days_graph, $title, $link, $metric, $metric_name, $more_link, $END_DATE, $download_link) {
    $stats_start_time = time();
    if ($END_DATE) {
        $Bstats_date[0] = $END_DATE;
    } else {
        $Bstats_date[0] = date("Y-m-d");
    }
    $Btotal_calls[0] = 0;
    $link_text = '';
    $max_count = 0;
    $i = 0;
    $NWB = "$download_link &nbsp; <a href=\"javascript:openNewWindow('help.php?ADD=99999";
    $NWE = "')\"><IMG SRC=\"help.gif\" WIDTH=20 HEIGHT=20 BORDER=0 ALT=\"HELP\" ALIGN=TOP></A>";


    ### get stats for last X days
    $stmt = "SELECT stats_date,$metric from vicidial_daily_max_stats where campaign_id='$campaign_id' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]';";
    if ($metric == 'total_calls_inbound_all') {
        $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_type='INGROUP' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]' group by stats_date;";
    }
    if ($metric == 'total_calls_outbound_all') {
        $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_type='CAMPAIGN' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]' group by stats_date;";
    }
    if ($metric == 'ra_total_calls') {
        $stmt = "SELECT stats_date,total_calls from vicidial_daily_ra_stats where stats_flag='OPEN' and stats_date<='$Bstats_date[0]' and user='$campaign_id';";
    }
    if ($metric == 'ra_concurrent_calls') {
        $stmt = "SELECT stats_date,max_calls from vicidial_daily_ra_stats where stats_flag='OPEN' and stats_date<='$Bstats_date[0]' and user='$campaign_id';";
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    $Xstats_to_print = mysqli_num_rows($rslt);
    if ($Xstats_to_print > 0) {
        $rowx = mysqli_fetch_row($rslt);
        $Bstats_date[0] = $rowx[0];
        $Btotal_calls[0] = $rowx[1];
        if ($max_count < $Btotal_calls[0]) {
            $max_count = $Btotal_calls[0];
        }
    }
    $stats_date_ARRAY = explode("-", $Bstats_date[0]);
    $stats_start_time = mktime(10, 10, 10, $stats_date_ARRAY[1], $stats_date_ARRAY[2], $stats_date_ARRAY[0]);
    while ($i <= $days_graph) {
        $Bstats_date[$i] = date("Y-m-d", $stats_start_time);
        $Btotal_calls[$i] = 0;
        $stmt = "SELECT stats_date,$metric from vicidial_daily_max_stats where campaign_id='$campaign_id' and stats_date='$Bstats_date[$i]';";
        if ($metric == 'total_calls_inbound_all') {
            $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_date='$Bstats_date[$i]' and stats_type='INGROUP' group by stats_date;";
        }
        if ($metric == 'total_calls_outbound_all') {
            $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_date='$Bstats_date[$i]' and stats_type='CAMPAIGN' group by stats_date;";
        }
        if ($metric == 'ra_total_calls') {
            $stmt = "SELECT stats_date,total_calls from vicidial_daily_ra_stats where stats_date='$Bstats_date[$i]' and user='$campaign_id';";
        }
        if ($metric == 'ra_concurrent_calls') {
            $stmt = "SELECT stats_date,max_calls from vicidial_daily_ra_stats where stats_date='$Bstats_date[$i]' and user='$campaign_id';";
        }
        echo "<!-- $i) $stmt \\-->\n";
        $rslt = mysql_to_mysqli($stmt, $link);
        $Ystats_to_print = mysqli_num_rows($rslt);
        if ($Ystats_to_print > 0) {
            $rowx = mysqli_fetch_row($rslt);
            $Btotal_calls[$i] = $rowx[1];
            if ($max_count < $Btotal_calls[$i]) {
                $max_count = $Btotal_calls[$i];
            }
        }
        $i++;
        $stats_start_time = ($stats_start_time - 86400);
    }
    if ($max_count < 1) {
        echo "<!-- no max stats cache summary information available -->";
    } else {
        if ($title == 'campaign') {
            $out_in_type = ' outbound';
        }
        if ($title == 'in-group') {
            $out_in_type = ' inbound';
        }
        if ($more_link > 0) {
            $link_text = "<a href=\"$PHP_SELF?ADD=999993&campaign_id=$campaign_id&stage=$title\"><font size=1>more summary stats...</font></a>";
        }
        echo "<table cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"white\" summary=\"Multiple day $metric_name.\" style=\"background-image:url(images/bg_fade.png); background-repeat:repeat-x; background-position:left top; width: 33em;\">\n";
        echo "<caption align=\"top\">$days_graph Day $out_in_type $metric_name for this $title &nbsp; $link_text  &nbsp; $NWB#max_stats$NWE<br /></caption>\n";
        echo "<tr>\n";
        echo "<th scope=\"col\" style=\"text-align: left; vertical-align:top;\"><span class=\"auraltext\">date</span> </th>\n";
        echo "<th scope=\"col\" style=\"text-align: left; vertical-align:top;\"><span class=\"auraltext\">$metric_name</span> </th>\n";
        echo "</tr>\n";

        $max_multi = MathZDC(400, $max_count);
        $i = 0;
        while ($i < $days_graph) {
            $bar_width = intval($max_multi * $Btotal_calls[$i]);
            if ($Btotal_calls[$i] < 1) {
                $Btotal_calls[$i] = "-none-";
            }
            echo "<tr>\n";
            echo "<td class=\"chart_td\"><font style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 60%;\">$Bstats_date[$i] </font></td>\n";
            echo "<td class=\"chart_td\"><img src=\"images/bar.png\" alt=\"\" width=\"$bar_width\" height=\"10\" style=\"vertical-align: middle; margin: 2px 2px 2px 0;\"/><font style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 60%;\"> $Btotal_calls[$i]</font></td>\n";
            echo "</tr>\n";
            $i++;
        }
        echo "</table>\n";
    }
}

##### END bar chart using max stats data #####
##### BEGIN download max stats data #####

function download_max_system_stats($campaign_id, $days_graph, $title, $metric, $metric_name, $END_DATE) {
    global $CSV_text, $link;
    $stats_start_time = time();
    if ($END_DATE) {
        $Bstats_date[0] = $END_DATE;
    } else {
        $Bstats_date[0] = date("Y-m-d");
    }
    $Btotal_calls[0] = 0;
    $link_text = '';
    $i = 0;

    ### get stats for last X days
    $stmt = "SELECT stats_date,$metric from vicidial_daily_max_stats where campaign_id='$campaign_id' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]';";
    if ($metric == 'total_calls_inbound_all') {
        $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_type='INGROUP' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]' group by stats_date;";
    }
    if ($metric == 'total_calls_outbound_all') {
        $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_type='CAMPAIGN' and stats_flag='OPEN' and stats_date<='$Bstats_date[0]' group by stats_date;";
    }
    if ($metric == 'ra_total_calls') {
        $stmt = "SELECT stats_date,total_calls from vicidial_daily_ra_stats where stats_flag='OPEN' and stats_date<='$Bstats_date[0]' and user='$campaign_id';";
    }
    if ($metric == 'ra_concurrent_calls') {
        $stmt = "SELECT stats_date,max_calls from vicidial_daily_ra_stats where stats_flag='OPEN' and stats_date<='$Bstats_date[0]' and user='$campaign_id';";
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    $Xstats_to_print = mysqli_num_rows($rslt);
    if ($Xstats_to_print > 0) {
        $rowx = mysqli_fetch_row($rslt);
        $Bstats_date[0] = $rowx[0];
        $Btotal_calls[0] = $rowx[1];
        if ($max_count < $Btotal_calls[0]) {
            $max_count = $Btotal_calls[0];
        }
    }
    $stats_date_ARRAY = explode("-", $Bstats_date[0]);
    $stats_start_time = mktime(10, 10, 10, $stats_date_ARRAY[1], $stats_date_ARRAY[2], $stats_date_ARRAY[0]);
    while ($i <= $days_graph) {
        $Bstats_date[$i] = date("Y-m-d", $stats_start_time);
        $Btotal_calls[$i] = 0;
        $stmt = "SELECT stats_date,$metric from vicidial_daily_max_stats where campaign_id='$campaign_id' and stats_date='$Bstats_date[$i]';";
        if ($metric == 'total_calls_inbound_all') {
            $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_date='$Bstats_date[$i]' and stats_type='INGROUP' group by stats_date;";
        }
        if ($metric == 'total_calls_outbound_all') {
            $stmt = "SELECT stats_date,sum(total_calls) from vicidial_daily_max_stats where stats_date='$Bstats_date[$i]' and stats_type='CAMPAIGN' group by stats_date;";
        }
        if ($metric == 'ra_total_calls') {
            $stmt = "SELECT stats_date,total_calls from vicidial_daily_ra_stats where stats_date='$Bstats_date[$i]' and user='$campaign_id';";
        }
        if ($metric == 'ra_concurrent_calls') {
            $stmt = "SELECT stats_date,max_calls from vicidial_daily_ra_stats where stats_date='$Bstats_date[$i]' and user='$campaign_id';";
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        $Ystats_to_print = mysqli_num_rows($rslt);
        if ($Ystats_to_print > 0) {
            $rowx = mysqli_fetch_row($rslt);
            $Btotal_calls[$i] = $rowx[1];
            if ($max_count < $Btotal_calls[$i]) {
                $max_count = $Btotal_calls[$i];
            }
        }
        $i++;
        $stats_start_time = ($stats_start_time - 86400);
    }

    if ($title == 'campaign') {
        $out_in_type = ' outbound';
    }
    if ($title == 'in-group') {
        $out_in_type = ' inbound';
    }
    $CSV_text .= "\"$days_graph Day $out_in_type $metric_name for this $title\"\n";

    if ($max_count < 1) {
        $CSV_text .= "\"no max stats cache summary information available\"\n";
    } else {
        $CSV_text .= "\"DATE\",\"$metric_name\"\n";

        $i = 0;
        while ($i < $days_graph) {
            $bar_width = intval($max_multi * $Btotal_calls[$i]);
            if ($Btotal_calls[$i] < 1) {
                $Btotal_calls[$i] = "-none-";
            }
            $CSV_text .= "\"$Bstats_date[$i]\",\"$Btotal_calls[$i]\"\n";
            $i++;
        }

        $CSV_text .= "\n\n";
    }
}

##### END download max stats data #####
##### LOOKUP GMT, FINDS THE CURRENT GMT OFFSET FOR A PHONE NUMBER #####

function lookup_gmt($phone_code, $USarea, $state, $LOCAL_GMT_OFF_STD, $Shour, $Smin, $Ssec, $Smon, $Smday, $Syear, $postalgmt, $postal_code, $owner, $USprefix) {
    global $link;

    $postalgmt_found = 0;
    if ((preg_match("/POSTAL/i", $postalgmt)) && (strlen($postal_code) > 4)) {
        if (preg_match('/^1$/', $phone_code)) {
            $stmt = "select postal_code,state,GMT_offset,DST,DST_range,country,country_code from vicidial_postal_codes where country_code='$phone_code' and postal_code LIKE \"$postal_code%\";";
            $rslt = mysql_to_mysqli($stmt, $link);
            $pc_recs = mysqli_num_rows($rslt);
            if ($pc_recs > 0) {
                $row = mysqli_fetch_row($rslt);
                $gmt_offset = $row[2];
                $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
                $dst = $row[3];
                $dst_range = $row[4];
                $PC_processed++;
                $postalgmt_found++;
                $post++;
            }
        }
    }
    if (($postalgmt == "TZCODE") && (strlen($owner) > 1)) {
        $dst_range = '';
        $dst = 'N';
        $gmt_offset = 0;

        $stmt = "select GMT_offset from vicidial_phone_codes where tz_code='$owner' and country_code='$phone_code' limit 1;";
        $rslt = mysql_to_mysqli($stmt, $link);
        $pc_recs = mysqli_num_rows($rslt);
        if ($pc_recs > 0) {
            $row = mysqli_fetch_row($rslt);
            $gmt_offset = $row[0];
            $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
            $PC_processed++;
            $postalgmt_found++;
            $post++;
        }

        $stmt = "select distinct DST_range from vicidial_phone_codes where tz_code='$owner' and country_code='$phone_code' order by DST_range desc limit 1;";
        $rslt = mysql_to_mysqli($stmt, $link);
        $pc_recs = mysqli_num_rows($rslt);
        if ($pc_recs > 0) {
            $row = mysqli_fetch_row($rslt);
            $dst_range = $row[0];
            if (strlen($dst_range) > 2) {
                $dst = 'Y';
            }
        }
    }
    if ((preg_match("/NANPA/i", $tz_method)) && (strlen($USarea) > 2) && (strlen($USprefix) > 2)) {
        $stmt = "select GMT_offset,DST from vicidial_nanpa_prefix_codes where areacode='$USarea' and prefix='$USprefix';";
        $rslt = mysql_to_mysqli($stmt, $link);
        $pc_recs = mysqli_num_rows($rslt);
        if ($pc_recs > 0) {
            $row = mysqli_fetch_row($rslt);
            $gmt_offset = $row[0];
            $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
            $dst = $row[1];
            $dst_range = '';
            if ($dst == 'Y') {
                $dst_range = 'SSM-FSN';
            }
            $PC_processed++;
            $postalgmt_found++;
            $post++;
        }
    }
    if ($postalgmt_found < 1) {
        $PC_processed = 0;
        ### UNITED STATES ###
        if ($phone_code == '1') {
            $stmt = "select country_code,country,areacode,state,GMT_offset,DST,DST_range,geographic_description from vicidial_phone_codes where country_code='$phone_code' and areacode='$USarea';";
            $rslt = mysql_to_mysqli($stmt, $link);
            $pc_recs = mysqli_num_rows($rslt);
            if ($pc_recs > 0) {
                $row = mysqli_fetch_row($rslt);
                $gmt_offset = $row[4];
                $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
                $dst = $row[5];
                $dst_range = $row[6];
                $PC_processed++;
            }
        }
        ### MEXICO ###
        if ($phone_code == '52') {
            $stmt = "select country_code,country,areacode,state,GMT_offset,DST,DST_range,geographic_description from vicidial_phone_codes where country_code='$phone_code' and areacode='$USarea';";
            $rslt = mysql_to_mysqli($stmt, $link);
            $pc_recs = mysqli_num_rows($rslt);
            if ($pc_recs > 0) {
                $row = mysqli_fetch_row($rslt);
                $gmt_offset = $row[4];
                $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
                $dst = $row[5];
                $dst_range = $row[6];
                $PC_processed++;
            }
        }
        ### AUSTRALIA ###
        if ($phone_code == '61') {
            $stmt = "select country_code,country,areacode,state,GMT_offset,DST,DST_range,geographic_description from vicidial_phone_codes where country_code='$phone_code' and state='$state';";
            $rslt = mysql_to_mysqli($stmt, $link);
            $pc_recs = mysqli_num_rows($rslt);
            if ($pc_recs > 0) {
                $row = mysqli_fetch_row($rslt);
                $gmt_offset = $row[4];
                $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
                $dst = $row[5];
                $dst_range = $row[6];
                $PC_processed++;
            }
        }
        ### ALL OTHER COUNTRY CODES ###
        if (!$PC_processed) {
            $PC_processed++;
            $stmt = "select country_code,country,areacode,state,GMT_offset,DST,DST_range,geographic_description from vicidial_phone_codes where country_code='$phone_code';";
            $rslt = mysql_to_mysqli($stmt, $link);
            $pc_recs = mysqli_num_rows($rslt);
            if ($pc_recs > 0) {
                $row = mysqli_fetch_row($rslt);
                $gmt_offset = $row[4];
                $gmt_offset = preg_replace("/\+/i", "", $gmt_offset);
                $dst = $row[5];
                $dst_range = $row[6];
                $PC_processed++;
            }
        }
    }

    ### Find out if DST to raise the gmt offset ###
    $AC_GMT_diff = ($gmt_offset - $LOCAL_GMT_OFF_STD);
    $AC_localtime = mktime(($Shour + $AC_GMT_diff), $Smin, $Ssec, $Smon, $Smday, $Syear);
    $hour = date("H", $AC_localtime);
    $min = date("i", $AC_localtime);
    $sec = date("s", $AC_localtime);
    $mon = date("m", $AC_localtime);
    $mday = date("d", $AC_localtime);
    $wday = date("w", $AC_localtime);
    $year = date("Y", $AC_localtime);
    $dsec = ( ( ($hour * 3600) + ($min * 60) ) + $sec );

    $AC_processed = 0;
    if ((!$AC_processed) and ( $dst_range == 'SSM-FSN')) {
        if ($DBX) {
            print "     " . _QXZ("Second Sunday March to First Sunday November") . "\n";
        }
        #**********************************************************************
        # SSM-FSN
        #     This is returns 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on Second Sunday March to First Sunday November at 2 am.
        #     INPUTS:
        #       mm              INTEGER       Month.
        #       dd              INTEGER       Day of the month.
        #       ns              INTEGER       Seconds into the day.
        #       dow             INTEGER       Day of week (0=Sunday, to 6=Saturday)
        #     OPTIONAL INPUT:
        #       timezone        INTEGER       hour difference UTC - local standard time
        #                                      (DEFAULT is blank)
        #                                     make calculations based on UTC time,
        #                                     which means shift at 10:00 UTC in April
        #                                     and 9:00 UTC in October
        #     OUTPUT:
        #                       INTEGER       1 = DST, 0 = not DST
        #
		# S  M  T  W  T  F  S
        # 1  2  3  4  5  6  7
        # 8  9 10 11 12 13 14
        #15 16 17 18 19 20 21
        #22 23 24 25 26 27 28
        #29 30 31
        #
        # S  M  T  W  T  F  S
        #    1  2  3  4  5  6
        # 7  8  9 10 11 12 13
        #14 15 16 17 18 19 20
        #21 22 23 24 25 26 27
        #28 29 30 31
        #
        #**********************************************************************

        $USACAN_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 3 || $mm > 11) {
            $USACAN_DST = 0;
        } elseif ($mm >= 4 and $mm <= 10) {
            $USACAN_DST = 1;
        } elseif ($mm == 3) {
            if ($dd > 13) {
                $USACAN_DST = 1;
            } elseif ($dd >= ($dow + 8)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (7200 + $timezone * 3600)) {
                        $USACAN_DST = 0;
                    } else {
                        $USACAN_DST = 1;
                    }
                } else {
                    if ($dow == 0 and $ns < 7200) {
                        $USACAN_DST = 0;
                    } else {
                        $USACAN_DST = 1;
                    }
                }
            } else {
                $USACAN_DST = 0;
            }
        } elseif ($mm == 11) {
            if ($dd > 7) {
                $USACAN_DST = 0;
            } elseif ($dd < ($dow + 1)) {
                $USACAN_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (7200 + ($timezone - 1) * 3600)) {
                        $USACAN_DST = 1;
                    } else {
                        $USACAN_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 7200) {
                        $USACAN_DST = 1;
                    } else {
                        $USACAN_DST = 0;
                    }
                }
            } else {
                $USACAN_DST = 0;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $USACAN_DST\n";
        }
        if ($USACAN_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'FSA-LSO')) {
        if ($DBX) {
            print "     " . _QXZ("First Sunday April to Last Sunday October") . "\n";
        }
        #**********************************************************************
        # FSA-LSO
        #     This is returns 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on first Sunday in April and last Sunday in October at 2 am.
        #**********************************************************************

        $USA_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 4 || $mm > 10) {
            $USA_DST = 0;
        } elseif ($mm >= 5 and $mm <= 9) {
            $USA_DST = 1;
        } elseif ($mm == 4) {
            if ($dd > 7) {
                $USA_DST = 1;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (7200 + $timezone * 3600)) {
                        $USA_DST = 0;
                    } else {
                        $USA_DST = 1;
                    }
                } else {
                    if ($dow == 0 and $ns < 7200) {
                        $USA_DST = 0;
                    } else {
                        $USA_DST = 1;
                    }
                }
            } else {
                $USA_DST = 0;
            }
        } elseif ($mm == 10) {
            if ($dd < 25) {
                $USA_DST = 1;
            } elseif ($dd < ($dow + 25)) {
                $USA_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (7200 + ($timezone - 1) * 3600)) {
                        $USA_DST = 1;
                    } else {
                        $USA_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 7200) {
                        $USA_DST = 1;
                    } else {
                        $USA_DST = 0;
                    }
                }
            } else {
                $USA_DST = 0;
            }
        } # end of month checks

        if ($DBX) {
            print "     DST: $USA_DST\n";
        }
        if ($USA_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'LSM-LSO')) {
        if ($DBX) {
            print "     " . _QXZ("Last Sunday March to Last Sunday October") . "\n";
        }
        #**********************************************************************
        #     This is s 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on last Sunday in March and last Sunday in October at 1 am.
        #**********************************************************************

        $GBR_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 3 || $mm > 10) {
            $GBR_DST = 0;
        } elseif ($mm >= 4 and $mm <= 9) {
            $GBR_DST = 1;
        } elseif ($mm == 3) {
            if ($dd < 25) {
                $GBR_DST = 0;
            } elseif ($dd < ($dow + 25)) {
                $GBR_DST = 0;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $GBR_DST = 0;
                    } else {
                        $GBR_DST = 1;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $GBR_DST = 0;
                    } else {
                        $GBR_DST = 1;
                    }
                }
            } else {
                $GBR_DST = 1;
            }
        } elseif ($mm == 10) {
            if ($dd < 25) {
                $GBR_DST = 1;
            } elseif ($dd < ($dow + 25)) {
                $GBR_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $GBR_DST = 1;
                    } else {
                        $GBR_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $GBR_DST = 1;
                    } else {
                        $GBR_DST = 0;
                    }
                }
            } else {
                $GBR_DST = 0;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $GBR_DST\n";
        }
        if ($GBR_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }
    if ((!$AC_processed) and ( $dst_range == 'LSO-LSM')) {
        if ($DBX) {
            print "     " . _QXZ("Last Sunday October to Last Sunday March") . "\n";
        }
        #**********************************************************************
        #     This is s 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on last Sunday in October and last Sunday in March at 1 am.
        #**********************************************************************

        $AUS_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 3 || $mm > 10) {
            $AUS_DST = 1;
        } elseif ($mm >= 4 and $mm <= 9) {
            $AUS_DST = 0;
        } elseif ($mm == 3) {
            if ($dd < 25) {
                $AUS_DST = 1;
            } elseif ($dd < ($dow + 25)) {
                $AUS_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $AUS_DST = 1;
                    } else {
                        $AUS_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $AUS_DST = 1;
                    } else {
                        $AUS_DST = 0;
                    }
                }
            } else {
                $AUS_DST = 0;
            }
        } elseif ($mm == 10) {
            if ($dd < 25) {
                $AUS_DST = 0;
            } elseif ($dd < ($dow + 25)) {
                $AUS_DST = 0;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $AUS_DST = 0;
                    } else {
                        $AUS_DST = 1;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $AUS_DST = 0;
                    } else {
                        $AUS_DST = 1;
                    }
                }
            } else {
                $AUS_DST = 1;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $AUS_DST\n";
        }
        if ($AUS_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'FSO-LSM')) {
        if ($DBX) {
            print "     " . _QXZ("First Sunday October to Last Sunday March") . "\n";
        }
        #**********************************************************************
        #   TASMANIA ONLY
        #     This is s 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on first Sunday in October and last Sunday in March at 1 am.
        #**********************************************************************

        $AUST_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 3 || $mm > 10) {
            $AUST_DST = 1;
        } elseif ($mm >= 4 and $mm <= 9) {#
            $AUST_DST = 0;
        } elseif ($mm == 3) {
            if ($dd < 25) {
                $AUST_DST = 1;
            } elseif ($dd < ($dow + 25)) {
                $AUST_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $AUST_DST = 1;
                    } else {
                        $AUST_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $AUST_DST = 1;
                    } else {
                        $AUST_DST = 0;
                    }
                }
            } else {
                $AUST_DST = 0;
            }
        } elseif ($mm == 10) {
            if ($dd > 7) {
                $AUST_DST = 1;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (7200 + $timezone * 3600)) {
                        $AUST_DST = 0;
                    } else {
                        $AUST_DST = 1;
                    }
                } else {
                    if ($dow == 0 and $ns < 3600) {
                        $AUST_DST = 0;
                    } else {
                        $AUST_DST = 1;
                    }
                }
            } else {
                $AUST_DST = 0;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $AUST_DST\n";
        }
        if ($AUST_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'FSO-FSA')) {
        if ($DBX) {
            print "     " . _QXZ("Sunday in October to First Sunday in April") . "\n";
        }
        #**********************************************************************
        # FSO-FSA
        #   2008+ AUSTRALIA ONLY (country code 61)
        #     This is returns 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on first Sunday in October and first Sunday in April at 1 am.
        #**********************************************************************

        $AUSE_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 4 or $mm > 10) {
            $AUSE_DST = 1;
        } elseif ($mm >= 5 and $mm <= 9) {
            $AUSE_DST = 0;
        } elseif ($mm == 4) {
            if ($dd > 7) {
                $AUSE_DST = 0;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (3600 + $timezone * 3600)) {
                        $AUSE_DST = 1;
                    } else {
                        $AUSE_DST = 0;
                    }
                } else {
                    if ($dow == 0 and $ns < 7200) {
                        $AUSE_DST = 1;
                    } else {
                        $AUSE_DST = 0;
                    }
                }
            } else {
                $AUSE_DST = 1;
            }
        } elseif ($mm == 10) {
            if ($dd >= 8) {
                $AUSE_DST = 1;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (7200 + $timezone * 3600)) {
                        $AUSE_DST = 0;
                    } else {
                        $AUSE_DST = 1;
                    }
                } else {
                    if ($dow == 0 and $ns < 3600) {
                        $AUSE_DST = 0;
                    } else {
                        $AUSE_DST = 1;
                    }
                }
            } else {
                $AUSE_DST = 0;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $AUSE_DST\n";
        }
        if ($AUSE_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'FSO-TSM')) {
        if ($DBX) {
            print "     " . _QXZ("First Sunday October to Third Sunday March") . "\n";
        }
        #**********************************************************************
        #     This is s 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on first Sunday in October and third Sunday in March at 1 am.
        #**********************************************************************

        $NZL_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 3 || $mm > 10) {
            $NZL_DST = 1;
        } elseif ($mm >= 4 and $mm <= 9) {
            $NZL_DST = 0;
        } elseif ($mm == 3) {
            if ($dd < 14) {
                $NZL_DST = 1;
            } elseif ($dd < ($dow + 14)) {
                $NZL_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $NZL_DST = 1;
                    } else {
                        $NZL_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $NZL_DST = 1;
                    } else {
                        $NZL_DST = 0;
                    }
                }
            } else {
                $NZL_DST = 0;
            }
        } elseif ($mm == 10) {
            if ($dd > 7) {
                $NZL_DST = 1;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 and $ns < (7200 + $timezone * 3600)) {
                        $NZL_DST = 0;
                    } else {
                        $NZL_DST = 1;
                    }
                } else {
                    if ($dow == 0 and $ns < 3600) {
                        $NZL_DST = 0;
                    } else {
                        $NZL_DST = 1;
                    }
                }
            } else {
                $NZL_DST = 0;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $NZL_DST\n";
        }
        if ($NZL_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'LSS-FSA')) {
        if ($DBX) {
            print "     " . _QXZ("Last Sunday in September to First Sunday in April") . "\n";
        }
        #**********************************************************************
        # LSS-FSA
        #   2007+ NEW ZEALAND (country code 64)
        #     This is returns 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect.
        #     Based on last Sunday in September and first Sunday in April at 1 am.
        #**********************************************************************

        $NZLN_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 4 || $mm > 9) {
            $NZLN_DST = 1;
        } elseif ($mm >= 5 && $mm <= 9) {
            $NZLN_DST = 0;
        } elseif ($mm == 4) {
            if ($dd > 7) {
                $NZLN_DST = 0;
            } elseif ($dd >= ($dow + 1)) {
                if ($timezone) {
                    if ($dow == 0 && $ns < (3600 + $timezone * 3600)) {
                        $NZLN_DST = 1;
                    } else {
                        $NZLN_DST = 0;
                    }
                } else {
                    if ($dow == 0 && $ns < 7200) {
                        $NZLN_DST = 1;
                    } else {
                        $NZLN_DST = 0;
                    }
                }
            } else {
                $NZLN_DST = 1;
            }
        } elseif ($mm == 9) {
            if ($dd < 25) {
                $NZLN_DST = 0;
            } elseif ($dd < ($dow + 25)) {
                $NZLN_DST = 0;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $NZLN_DST = 0;
                    } else {
                        $NZLN_DST = 1;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $NZLN_DST = 0;
                    } else {
                        $NZLN_DST = 1;
                    }
                }
            } else {
                $NZLN_DST = 1;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $NZLN_DST\n";
        }
        if ($NZLN_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if ((!$AC_processed) and ( $dst_range == 'TSO-LSF')) {
        if ($DBX) {
            print "     " . _QXZ("Third Sunday October to Last Sunday February") . "\n";
        }
        #**********************************************************************
        # TSO-LSF
        #     This is returns 1 if Daylight Savings Time is in effect and 0 if
        #       Standard time is in effect. Brazil
        #     Based on Third Sunday October to Last Sunday February at 1 am.
        #**********************************************************************

        $BZL_DST = 0;
        $mm = $mon;
        $dd = $mday;
        $ns = $dsec;
        $dow = $wday;

        if ($mm < 2 || $mm > 10) {
            $BZL_DST = 1;
        } elseif ($mm >= 3 and $mm <= 9) {
            $BZL_DST = 0;
        } elseif ($mm == 2) {
            if ($dd < 22) {
                $BZL_DST = 1;
            } elseif ($dd < ($dow + 22)) {
                $BZL_DST = 1;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $BZL_DST = 1;
                    } else {
                        $BZL_DST = 0;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $BZL_DST = 1;
                    } else {
                        $BZL_DST = 0;
                    }
                }
            } else {
                $BZL_DST = 0;
            }
        } elseif ($mm == 10) {
            if ($dd < 22) {
                $BZL_DST = 0;
            } elseif ($dd < ($dow + 22)) {
                $BZL_DST = 0;
            } elseif ($dow == 0) {
                if ($timezone) { # UTC calculations
                    if ($ns < (3600 + ($timezone - 1) * 3600)) {
                        $BZL_DST = 0;
                    } else {
                        $BZL_DST = 1;
                    }
                } else { # local time calculations
                    if ($ns < 3600) {
                        $BZL_DST = 0;
                    } else {
                        $BZL_DST = 1;
                    }
                }
            } else {
                $BZL_DST = 1;
            }
        } # end of month checks
        if ($DBX) {
            print "     DST: $BZL_DST\n";
        }
        if ($BZL_DST) {
            $gmt_offset++;
        }
        $AC_processed++;
    }

    if (!$AC_processed) {
        if ($DBX) {
            print "     " . _QXZ("No DST Method Found") . "\n";
        }
        if ($DBX) {
            print "     DST: 0\n";
        }
        $AC_processed++;
    }

    return $gmt_offset;
}

function mysql_to_mysqli($stmt, $link) {
    $rslt = mysqli_query($link, $stmt);
    return $rslt;
}

function MathZDC($dividend, $divisor, $quotient = 0) {
    if ($divisor == 0) {
        return $quotient;
    } else if ($dividend == 0) {
        return 0;
    } else {
        return ($dividend / $divisor);
    }
}

function use_archive_table($table_name) {
    global $link;
    $tbl_stmt = "show tables like '" . $table_name . "_archive'";
    $tbl_rslt = mysql_to_mysqli($tbl_stmt, $link);
    if (mysqli_num_rows($tbl_rslt) > 0) {
        $tbl_row = mysqli_fetch_row($tbl_rslt);
        return $tbl_row[0];
    } else {
        return $table_name;
    }
}

# function to print/echo content, options for length, alignment and ordered internal variables are included

function _QXZ($English_text, $sprintf = 0, $align = "l", $v_one = '', $v_two = '', $v_three = '', $v_four = '', $v_five = '', $v_six = '', $v_seven = '', $v_eight = '', $v_nine = '') {
    global $SSenable_languages, $SSlanguage_method, $VUselected_language, $link;

    if ($SSenable_languages == '1') {
        if ($SSlanguage_method != 'DISABLED') {
            if ((strlen($VUselected_language) > 0) and ( $VUselected_language != 'default English')) {
                if ($SSlanguage_method == 'MYSQL') {
                    $stmt = "SELECT translated_text from vicidial_language_phrases where english_text='$English_text' and language_id='$VUselected_language';";
                    $rslt = mysql_to_mysqli($stmt, $link);
                    $sl_ct = mysqli_num_rows($rslt);
                    if ($sl_ct > 0) {
                        $row = mysqli_fetch_row($rslt);
                        $English_text = $row[0];
                    }
                }
            }
        }
    }

    if (preg_match("/%\ds/", $English_text)) {
        $English_text = preg_replace("/%1s/", $v_one, $English_text);
        $English_text = preg_replace("/%2s/", $v_two, $English_text);
        $English_text = preg_replace("/%3s/", $v_three, $English_text);
        $English_text = preg_replace("/%4s/", $v_four, $English_text);
        $English_text = preg_replace("/%5s/", $v_five, $English_text);
        $English_text = preg_replace("/%6s/", $v_six, $English_text);
        $English_text = preg_replace("/%7s/", $v_seven, $English_text);
        $English_text = preg_replace("/%8s/", $v_eight, $English_text);
        $English_text = preg_replace("/%9s/", $v_nine, $English_text);
    }
    ### uncomment to test output
    #	$English_text = str_repeat('*', strlen($English_text));
    if ($sprintf > 0) {
        if ($align == "r") {
            $fmt = "%" . $sprintf . "s";
        } else {
            $fmt = "%-" . $sprintf . "s";
        }
        $English_text = sprintf($fmt, $English_text);
    }
    return $English_text;
}

if(!function_exists('pr')){
    function pr($array) {
        echo '<pre>';
        print_r($array);
    }
}




function get_permission($Permission,$moduleID,$action){
    $ArraySearch = array_search($moduleID, array_column($Permission, 'module_id'));
    return $Permission[$ArraySearch][$action];
}


function checkRole($module = '', $perm = '') {
    if(isset($_SESSION['role'][$module])) {
        $moduleP = $_SESSION['role'][$module];
        if($perm=='any') {
            foreach($moduleP as $r=>$value) {
                if($value=='Y') return true;
            }
        }elseif(isset($moduleP[$perm]) && $moduleP[$perm]=='Y') {
            return true;
        }
    }
    return false;
}


function get_permission_2($Permission,$moduleID,$action){
    $ArraySearch = array_search($moduleID, array_column($Permission, 'module_id'));
    return $Permission[$ArraySearch][$action];
}

function get_phone_validation($phone) {
//    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
//       return 'success';
//    }else{
//        return 'failed';
//    }
    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
       return 'success';
    }else{
        if (preg_match("/^[44][1-9]\d{10}$/", $phone)) {
            return 'success';
        }else{
            return 'failed';
        }
    }
}

function get_explode_template($StandardVariables){
    $Variables = explode('|',$StandardVariables);
    foreach($Variables as $k=>$v){
        unset($Variables[$k]);
        if(!empty($v)){
            $Explode = explode(',',$v);
            $Variables[$Explode[0]] = $Explode[1];
        }
    }
    return $Variables;
}

function TimeToSec($time) {
    $sec = 0;
    foreach (array_reverse(explode(':', $time)) as $k => $v) $sec += pow(60, $k) * $v;
    return $sec;
}

function base_url($string = '') {
    global $myWorkingDir, $publicAssestUrl;
    return $publicAssestUrl.'utgone/'.$string;
}

function base_url_reports($string = '') {
    global $myWorkingDir, $publicAssestUrl;
    return $publicAssestUrl.$string;
}

function redirect($string = '') {
    header('location:'.base_url($string));
    exit;
}
function publicAssest() {
    global $publicAssestUrl;
    return $publicAssestUrl;
}

function response($success, $error, $message, $data) {
    $array = [];
    $array['success'] = $success;
    $array['error'] = $error;
    $array['message'] = $message;
    $array['data'] = $data;
    return $array;
}

function results($status, $message, $data) {
    $result = [];
    $result['status'] = $status;
    $result['message'] = $message;
    $result['data'] = $data;
    return $result;
}

function get_query($QueryArray) {
    $x = 1;
    $Query = '';
    $QueryJson = [];
    if($QueryArray){
    foreach ($QueryArray as $each) {
        $array = array();
        if ($x == 1) {
            $Query .= " WHERE";
            $array['initial'] = "";
        } else {
            $Query .= " " . $each['initial'] . " ";
            $array['initial'] = "and";
        }

        $Query .= " vicidial_list.`" . $each['column_name'] . "` ";
        $Query .= " " . $each['operator'] . " ";

        $array['column'] = $each['column_name'];
        $array['operator'] = $each['operator'];
        $array['value1'] = $each['value1'];
        $array['desc'] = $each['desc'];
        if ($each['operator'] == 'NOT IN' || $each['operator'] == 'IN') {

            $_val1 = "'" . str_replace(",", "','", $each['value1']) . "'";
            $Query .= " (" . $_val1 . ") ";
        } else {
            $Query .= "'" . $each['value1'] . "'";
        }

        if ($each['operator'] == 'BETWEEN' || $each['operator'] == 'NOT BETWEEN') {
            $Query .= " " . $each['opt_btw'] . " ";
            $Query .= "'" . $each['value2'] . "'";
            $array['optbtw'] = $each['operator'];
            $array['value2'] = $each['value2'];
            $array['desc'] = $each['desc'];
        }
        $QueryJson[] = $array;
        $x++;
    }}
    $Result = [];
    $Result['QueryJson'] = json_encode($QueryJson);
    $Result['Query'] = $Query;

    return $Result;
}


/*Create Admin Log Here*/
function admin_log_insert($database,$User,$EventSection,$EventType,$RecordID,$EventCode,$EventSQL,$EventNotes,$UserGroup){
    $InsertArray = [];
    $InsertArray['event_date'] = date('Y-m-d H:i:s');
    $InsertArray['user'] = $User;
    $InsertArray['ip_address'] = getUserIP();
    $InsertArray['event_section'] = $EventSection;
    $InsertArray['event_type'] = $EventType;
    $InsertArray['record_id'] = $RecordID;
    $InsertArray['event_code'] = $EventCode;
    $InsertArray['event_sql'] = $EventSQL;
    $InsertArray['event_notes'] = $EventNotes;
    $InsertArray['user_group'] = $UserGroup;
    $database->insert('vicidial_admin_log',$InsertArray);
}

function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function no_permission(){
    include('common/no.php');
}

/*Login User Setup Latest*/
function login_user_setup($database,$user,$DBUTG){
    $UserDetail = $database->get('vicidial_users',['user','full_name','user_level','user_group','role_id','user_id','view_reports','admin_interface_enable','auto_enable','phone_login','experience','allowed_teams_access'],['user'=>$user]);
    $UserGroup = $database->get('vicidial_user_groups', ['allowed_campaigns','chat_ID'], ['user_group' => $UserDetail['user_group']]);
    $LOGallowed_campaigns = $UserGroup['allowed_campaigns'];
    $ChatID = $UserGroup['chat_ID'];
    if (strpos($LOGallowed_campaigns, 'ALL-CAMPAIGNS') !== false) {
        $CampaignListings = $database->select('vicidial_campaigns',['campaign_id']);
        $Campaign = [];
        foreach($CampaignListings as $value){
         $Campaign[] = $value['campaign_id'];
        }
    } else {
        $Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
    }

    if(!empty($UserDetail['allowed_teams_access'])){
        $explode = explode(' ',$UserDetail['allowed_teams_access']);
        $UserGroup = $database->select('vicidial_user_groups', ['allowed_campaigns'], ['user_group' => $explode]);
        foreach($UserGroup as $group){
            $LOGallowed_campaigns = $group['allowed_campaigns'];
            $campaign1 = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
            $Campaign = array_merge($Campaign,$campaign1);
        }

    }



    $_SESSION['CurrentLogin'] = [];
     if(!empty($Campaign) && count($Campaign) > 0){
        $_SESSION['CurrentLogin']['Campaign'] = $Campaign;
    }else{
        $_SESSION['CurrentLogin']['Campaign'] = [999999999999];
    }
    $arrayCombine = [];
    $_SESSION['CurrentLogin']['user'] = $UserDetail['user'];
    $_SESSION['CurrentLogin']['full_name'] = $UserDetail['full_name'];
    $_SESSION['CurrentLogin']['user_level'] = $UserDetail['user_level'];
    $_SESSION['CurrentLogin']['user_group'] = $UserDetail['user_group'];
    $_SESSION['CurrentLogin']['role_id'] = $UserDetail['role_id'];
    $_SESSION['CurrentLogin']['user_id'] = $UserDetail['user_id'];
    $_SESSION['CurrentLogin']['view_reports'] = $UserDetail['view_reports'];
    $_SESSION['CurrentLogin']['admin_interface_enable'] = $UserDetail['admin_interface_enable'];
    $_SESSION['CurrentLogin']['auto_enable'] = $UserDetail['auto_enable'];
    $_SESSION['CurrentLogin']['phone_login'] = $UserDetail['phone_login'];
    $_SESSION['CurrentLogin']['Experience'] = $UserDetail['experience'];
    $arrayCombine = (!empty($UserDetail['allowed_teams_access'])) ? explode(' ',$UserDetail['allowed_teams_access']): [];
    $arrayCombine[] = $UserDetail['user_group'];
    $_SESSION['CurrentLogin']['allowed_teams_access'] = $arrayCombine;
    $_SESSION['CurrentLogin']['ChatID'] = $ChatID;
    $_SESSION['CurrentLogin']['Lock'] = 1;


    $UserGroupArray = [];
    $UserGroupArray[] = $UserDetail['user_group'];
    if(!empty($UserDetail['allowed_teams_access'])){
        $explode = explode(' ',$UserDetail['allowed_teams_access']);
        foreach($explode as $valExplode){
            if(!empty(trim($valExplode))){
                $UserGroupArray[] = trim($valExplode);
            }
        }
    }
    if(!empty($UserDetail['phone_login']) && $UserDetail['phone_login']){
        $PhoneData = $database->get('phones','pass',['login'=>$UserDetail['phone_login']]);
        $_SESSION['CurrentLogin']['phone_pass'] = $PhoneData;
    }

    if($UserDetail['user_group'] != 'ADMIN'){
        $UserGroupDetail = array_column($database->select('vicidial_inbound_groups',['group_id'],['user_group'=>$UserDetail['user_group']]),'group_id');
    }else{
        $UserGroupDetail = array_column($database->select('vicidial_inbound_groups',['group_id']),'group_id');
    }
    $_SESSION['CurrentLogin']['InboundGroup'] = $UserGroupDetail;
    $_SESSION['CurrentLogin']['CampaignID'] = array_merge($UserGroupDetail,$Campaign);

    $LicensingID = $DBUTG->get('user_licensings','licensing_id',['user_group'=>$UserDetail['user_group'],'ORDER'=>['id'=>'DESC']]);
    $_SESSION['CurrentLogin']['License']['ID'] = $LicensingID;
    $LicensingDetail = $DBUTG->get('licensings',['title','modules'],['id'=>$LicensingID]);
    $_SESSION['CurrentLogin']['License']['Title'] = $LicensingDetail['title'];
    $LicensingModules = $DBUTG->select('licensing_modules','module_title',['id'=>unserialize($LicensingDetail['modules'])]);

    foreach($LicensingModules as $module){
        $_SESSION['CurrentLogin']['License'][$module] = 'Active';
    }
    return $Campaign;
}

function initials($str) {
    $ret = '';
    foreach (explode(' ', $str) as $word)
        $ret .= strtoupper($word[0]);
    return $ret;
}

function get_campaigns_DROP_RATE_OLD($database,$campaign_id){
    $query = "SELECT count(CASE WHEN status = 'DROP' THEN 1 END) AS 'DROP',count(*) AS 'TOTAL' FROM vicidial_agent_log WHERE campaign_id = '".$campaign_id."' AND lead_id is NOT NULL AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'";
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $result = (($data[0]['DROP']/$data[0]['TOTAL'])*100);

    return round($result,2);
}
function get_campaigns_DROP_RATE($database,$campaign_id){
    $start = $end = date('Y-m-d');
//    $start = $end = '2019-12-03';
    $campaignArray = [];
    $CloserCampaigns = $database->get('vicidial_campaigns','closer_campaigns',['campaign_id'=>$campaign_id]);
    $campaignArray = explode(' ',trim(str_replace("-","",$CloserCampaigns)));
    $campaignArray[] = $campaign_id;
    $totalArray = [];
    $totalArray['Outbound']['Drop'] = $database->count('vicidial_log',['AND'=>['call_date[>=]'=>$start.' 00:00:00','call_date[<=]'=>$end.' 23:59:59','campaign_id'=>$campaign_id,'status'=>'DROP']]);

    $totalArray['Outbound']['Total'] = $database->count('vicidial_log',['AND'=>['call_date[>=]'=>$start.' 00:00:00','call_date[<=]'=>$end.' 23:59:59','campaign_id'=>$campaign_id]]);
    $totalArray['Inbound']['Drop'] = $database->count('vicidial_closer_log',['AND'=>['call_date[>=]'=>$start.' 00:00:00','call_date[<=]'=>$end.' 23:59:59','campaign_id'=>$campaignArray,'status'=>'DROP']]);
    $totalArray['Inbound']['Total'] = $database->count('vicidial_closer_log',['AND'=>['call_date[>=]'=>$start.' 00:00:00','call_date[<=]'=>$end.' 23:59:59','campaign_id'=>$campaignArray]]);

//    $campaignArray[] = $campaign_id;

    $DropCall = $totalArray['Outbound']['Drop'] + $totalArray['Inbound']['Drop'];
    $TotalCall = $totalArray['Outbound']['Total'] + $totalArray['Inbound']['Total'];
    $result = (($DropCall/$TotalCall)*100);
//<<<<<<< HEAD
//    $query = "SELECT sum(dialable_leads),sum(calls_today),sum(drops_today) as DropsAnswerToday,avg(drops_answers_today_pct),avg(differential_onemin),avg(agents_average_onemin),sum(balance_trunk_fill),sum(answers_today) as AnswerToday,max(status_category_1),sum(status_category_count_1),max(status_category_2),sum(status_category_count_2),max(status_category_3),sum(status_category_count_3),max(status_category_4),sum(status_category_count_4),sum(agent_calls_today),sum(agent_wait_today),sum(agent_custtalk_today),sum(agent_acw_today),sum(agent_pause_today),sum(agenthandled_today) from vicidial_campaign_stats where campaign_id IN ('".implode("','",$campaignArray)."')";
//=======
    $query = "SELECT sum(dialable_leads),sum(calls_today),sum(drops_today) as DropsAnswerToday,avg(drops_answers_today_pct),avg(differential_onemin),avg(agents_average_onemin),sum(balance_trunk_fill),sum(answers_today) as AnswerToday,max(status_category_1),sum(status_category_count_1),max(status_category_2),sum(status_category_count_2),max(status_category_3),sum(status_category_count_3),max(status_category_4),sum(status_category_count_4),sum(agent_calls_today),sum(agent_wait_today),sum(agent_custtalk_today),sum(agent_acw_today),sum(agent_pause_today),sum(agenthandled_today) from vicidial_campaign_stats where campaign_id = '".$campaign_id."'";
//>>>>>>> 6ecee07d15e5cbddf4ae8acbd591604f1cac0b25
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $DROP = $data[0]['DropsAnswerToday'];
    $Answer = $data[0]['AnswerToday'];
    $Output = (MathZDC($DROP, $Answer)*100);
    return round($Output,2);
//<<<<<<< HEAD
//    return round($result,2);
//=======
//>>>>>>> 6ecee07d15e5cbddf4ae8acbd591604f1cac0b25
}

function get_stats_log($database,$DBUTG,$user,$campaign,$event,$other){

    switch($event){
        case 'on_sale':
            $ExistCount = $database->count('vicidial_campaign_statuses',['AND'=>['status'=>$other,'sale'=>'Y','campaign_id'=>[$campaign,NULL]]]);
            if(!empty($ExistCount) && $ExistCount > 0 ){
                $points = $DBUTG->get('agent_events','points',['event'=>'on_sale']);
                $DBUTG->insert('agent_logs',['event'=>'on_time','user'=>$user,'points'=>$points,'created_at'=>date('Y-m-d H:i:s')]);
            }
            break;
        case 'on_time_login':
            $ExistCount = $DBUTG->count('agentshifts',['AND'=>['campaign'=>$campaign,'user'=>$user]]);
            if(!empty($ExistCount) && $ExistCount > 0 ){
                $StartTime = $DBUTG->get('agentshifts','start_time',['AND'=>['campaign'=>$campaign,'user'=>$user]]);
                if($StartTime >= $other){
                    $points = $DBUTG->get('agent_events','points',['event'=>'on_time_login']);
                    $ExistLog = $DBUTG->count('agent_logs',['AND'=>['event'=>'on_login_time','user'=>$user,'created_at[>=]'=>date('Y-m-d').' 00:00:00']]);
                    if(!empty($ExistLog) && $ExistLog > 0){

                    }else{
                        $DBUTG->insert('agent_logs',['event'=>'on_login_time','user'=>$user,'points'=>$points,'created_at'=>date('Y-m-d H:i:s')]);
                    }
                }
            }
            break;
        default:

    }
}

function get_plan_agents($UserGroup,$database,$DBUTG){
        $exist = $DBUTG->count('user_pricings',['AND'=>['status'=>'RUN','user_group'=>$UserGroup]]);
        if($exist > 0){
            $PricePlanID = $DBUTG->get('user_pricings','pricing_plan_id',['AND'=>['status'=>'RUN','user_group'=>$UserGroup]]);
            $agent = $DBUTG->get('pricing_plans','agent',['id'=>$PricePlanID]);
            $existAgent = $database->count('vicidial_users',['AND'=>['user_group'=>$UserGroup,'user_level'=>1]]);
            if($existAgent < $agent){
                $result = 'success';
            }else{
                $result = 'failed';
            }
        }else{
            $result = 'failed';
        }
        return $result;
}

function dateDiffInDays($date1, $date2)
{
    // Calulating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

function get_agent_logged_in($database,$campaignID){
    $query = "SELECT sum(case when status = 'INCALL' then 1 Else 0 End) as 'TALK',sum(case when status = 'READY' then 1 Else 0 End) as WAIT,sum(case when status = 'PAUSED' then 1 Else 0 End) as PAUSE,sum(case when status = 'DISPO' then 1 Else 0 End) as DISPO,sum(case when status = 'DEAD' then 1 Else 0 End) as DEAD FROM vicidial_live_agents WHERE campaign_id = '".$campaignID."'";
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $array = [];
    if(!empty($data) && count($data) > 0){
        $array['TALK'] = (!empty($data[0]['TALK'])) ? $data[0]['TALK'] : 0;
        $array['WAIT'] = (!empty($data[0]['WAIT'])) ? $data[0]['WAIT'] : 0;
        $array['PAUSE'] = (!empty($data[0]['PAUSE'])) ? $data[0]['PAUSE'] : 0;
        $array['DISPO'] = (!empty($data[0]['DISPO'])) ? $data[0]['DISPO'] : 0;
        $array['DEAD'] = (!empty($data[0]['DEAD'])) ? $data[0]['DEAD'] : 0;
    }else{
        $array['TALK'] = 0;
        $array['WAIT'] = 0;
        $array['PAUSE'] = 0;
        $array['DISPO'] = 0;
        $array['DEAD'] = 0;
    }
    return $array;
}
?>
