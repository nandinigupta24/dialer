<?php


$startMS = microtime();

header ("Content-type: text/html; charset=utf-8");

$report_name='User Status';

$add_copy_disabled=0;

require("dbconnect_mysqli.php");
require("functions.php");
require '../db/database.php';

if(!empty($_SESSION['Login']['user']) && !empty($_SESSION['Login']['password'])){
    $PHP_AUTH_USER=$_SESSION['Login']['user'];
    $PHP_AUTH_PW=$_SESSION['Login']['password'];
}elseif(!empty($_POST['user_name']) && !empty($_POST['password'])){
    $PHP_AUTH_USER=$_POST['user_name'];
    $PHP_AUTH_PW=$_POST['password'];
}else{
//    $PHP_AUTH_USER=$_SERVER['PHP_AUTH_USER'];
//    $PHP_AUTH_PW=$_SERVER['PHP_AUTH_PW'];
    $PHP_AUTH_USER='AnkitK';
    $PHP_AUTH_PW='Utgesx0092021';
}
$PHP_SELF=$_SERVER['PHP_SELF'];
if (isset($_GET["begin_date"]))				{$begin_date=$_GET["begin_date"];}
	elseif (isset($_POST["begin_date"]))	{$begin_date=$_POST["begin_date"];}
if (isset($_GET["end_date"]))				{$end_date=$_GET["end_date"];}
	elseif (isset($_POST["end_date"]))		{$end_date=$_POST["end_date"];}
if (isset($_GET["user"]))				{$user=$_GET["user"];}
	elseif (isset($_POST["user"]))		{$user=$_POST["user"];}
if (isset($_GET["group"]))				{$group=$_GET["group"];}
	elseif (isset($_POST["group"]))		{$group=$_POST["group"];}
if (isset($_GET["stage"]))				{$stage=$_GET["stage"];}
	elseif (isset($_POST["stage"]))		{$stage=$_POST["stage"];}
if (isset($_GET["DB"]))					{$DB=$_GET["DB"];}
	elseif (isset($_POST["DB"]))		{$DB=$_POST["DB"];}
if (isset($_GET["submit"]))				{$submit=$_GET["submit"];}
	elseif (isset($_POST["submit"]))	{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))				{$SUBMIT=$_GET["SUBMIT"];}
	elseif (isset($_POST["SUBMIT"]))	{$SUBMIT=$_POST["SUBMIT"];}

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,webroot_writable,outbound_autodial_active,user_territories_active,level_8_disable_add,enable_languages,language_method,allow_chats FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =						$row[0];
	$webroot_writable =					$row[1];
	$SSoutbound_autodial_active =		$row[2];
	$user_territories_active =			$row[3];
	$SSlevel_8_disable_add =			$row[4];
	$SSenable_languages =				$row[5];
	$SSlanguage_method =				$row[6];
	$SSallow_chats =					$row[7];
	}
##### END SETTINGS LOOKUP #####
###########################################

if (!isset($begin_date)) {$begin_date = $TODAY;}
if (!isset($end_date)) {$end_date = $TODAY;}

$PHP_AUTH_USER = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_USER);
$PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_PW);
$user = preg_replace("/'|\"|\\\\|;/","",$user);
$group = preg_replace("/'|\"|\\\\|;/","",$group);
$stage = preg_replace("/'|\"|\\\\|;/","",$stage);
$begin_date = preg_replace("/'|\"|\\\\|;/","",$begin_date);
$end_date = preg_replace("/'|\"|\\\\|;/","",$end_date);

$StarTtimE = date("U");
$TODAY = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$ip = getenv("REMOTE_ADDR");
$check_time = ($StarTtimE - 86400);
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

$stmt="SELECT selected_language from vicidial_users where user='$PHP_AUTH_USER';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$sl_ct = mysqli_num_rows($rslt);
if ($sl_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$VUselected_language =		$row[0];
	}

$auth=0;
$reports_auth=0;
$admin_auth=0;
$auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'REPORTS',1);
if ($auth_message == 'GOOD')
	{$auth=1;}

if ($auth > 0)
	{
	$stmt="SELECT count(*) from vicidial_users where user='$PHP_AUTH_USER' and user_level > 7 and view_reports='1';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);
	$admin_auth=$row[0];

	$stmt="SELECT count(*) from vicidial_users where user='$PHP_AUTH_USER' and user_level > 6 and view_reports='1';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);
	$reports_auth=$row[0];

	if ($reports_auth < 1)
		{
		$VDdisplayMESSAGE = _QXZ("You are not allowed to view reports");
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
	if ( ($reports_auth > 0) and ($admin_auth < 1) )
		{
		$ADD=999999;
		$reports_only_user=1;
		}
	}
else
	{
	$VDdisplayMESSAGE = _QXZ("Login incorrect, please try again");
	if ($auth_message == 'LOCK')
		{
		$VDdisplayMESSAGE = ("Too many login attempts, try again in 15 minutes");
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
	Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
	Header("HTTP/1.0 401 Unauthorized");
	echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$PHP_AUTH_PW|$auth_message|\n";
	exit;
	}


$stmt="SELECT user_level from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGuser_level				=$row[0];

if (($LOGuser_level < 9) and ($SSlevel_8_disable_add > 0))
	{$add_copy_disabled++;}


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

$stmt="INSERT INTO vicidial_report_log set event_date=NOW(), user='$PHP_AUTH_USER', ip_address='$LOGip', report_name='$report_name', browser='$LOGbrowser', referer='$LOGhttp_referer', notes='$LOGserver_name:$LOGserver_port $LOGscript_name |$user, $stage, $group|', url='$LOGfull_url', webserver='$webserver_id';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$report_log_id = mysqli_insert_id($link);
##### END log visit to the vicidial_report_log table #####

$stmt="SELECT full_name,change_agent_campaign,modify_timeclock_log from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGfullname =				$row[0];
$change_agent_campaign =	$row[1];
$modify_timeclock_log =		$row[2];

$stmt="SELECT full_name,user_group from vicidial_users where user='" . mysqli_real_escape_string($link, $user) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$full_name = $row[0];
$user_group = $row[1];

$stmt="SELECT live_agent_id,user,server_ip,conf_exten,extension,status,lead_id,campaign_id,uniqueid,callerid,channel,random_id,last_call_time,last_update_time,last_call_finish,closer_campaigns,call_server_ip,user_level,comments,campaign_weight,calls_today,external_hangup,external_status,external_pause,external_dial,agent_log_id,last_state_change,agent_territories,outbound_autodial,manager_ingroup_set,external_igb_set_user from vicidial_live_agents where user='" . mysqli_real_escape_string($link, $user) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$agents_to_print = mysqli_num_rows($rslt);
$i=0;
while ($i < $agents_to_print)
	{
	$row=mysqli_fetch_row($rslt);
	$Aserver_ip =				$row[2];
	$Asession_id =				$row[3];
	$Aextension =				$row[4];
	$Astatus =					$row[5];
	$Acampaign =				$row[7];
	$Acallerid =				$row[9];
	$Alast_call =				$row[14];
	$Acl_campaigns =			$row[15];
	$agent_territories = 		$row[27];
	$outbound_autodial = 		$row[28];
	$manager_ingroup_set =		$row[29];
	$external_igb_set_user =	$row[30];
	$i++;
	}

if ($SSallow_chats > 0)
	{
	$stmt="SELECT chat_id,chat_start_time,status,chat_creator,group_id,lead_id from vicidial_live_chats where status='LIVE' and chat_creator='$user'";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$active_chats=mysqli_num_rows($rslt);
	if($active_chats>0)
		{
		$Achats="";
		while ($row=mysqli_fetch_row($rslt))
			{
			$chat_id=$row[0];
			$Achats.="$chat_id, ";
			}
		$Achats=preg_replace('/, $/', "", $Achats);
		}
	else
		{
		$Achats=_QXZ("NONE");
		}
	}

$stmt="SELECT event_date,status,ip_address from vicidial_timeclock_status where user='" . mysqli_real_escape_string($link, $user) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$tc_logs_to_print = mysqli_num_rows($rslt);
if ($tc_logs_to_print > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$Tevent_date =		$row[0];
	$Tstatus =			$row[1];
	$Tip_address =		$row[2];
	$i++;
	}

if ($Astatus == 'INCALL')
	{
	$stmtP="select count(*) from parked_channels where channel_group='$Acallerid';";
	$rsltP=mysql_to_mysqli($stmtP,$link);
	$rowP=mysqli_fetch_row($rsltP);
	$parked_channel = $rowP[0];

	if ($parked_channel > 0)
		{
		$Astatus =	'PARK';
		}
	else
		{
		$stmtP="select count(*) from vicidial_auto_calls where callerid='$Acallerid';";
		$rsltP=mysql_to_mysqli($stmtP,$link);
		$rowP=mysqli_fetch_row($rsltP);
		$live_channel = $rowP[0];

		if ($live_channel < 1)
			{
			$Astatus =	'DEAD';
			}
		}
	}


$stmt="select campaign_id from vicidial_campaigns;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$groups_to_print = mysqli_num_rows($rslt);
$i=0;
while ($i < $groups_to_print)
	{
	$row=mysqli_fetch_row($rslt);
	$groups[$i] =$row[0];
	$i++;
	}


if ($stage == "log_agent_out")
	{
	$now_date_epoch = date('U');
	$inactive_epoch = ($now_date_epoch - 60);
	$stmt = "SELECT user,campaign_id,UNIX_TIMESTAMP(last_update_time),status from vicidial_live_agents where user='" . mysqli_real_escape_string($link, $user) . "';";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "<BR>$stmt\n";}
	$vla_ct = mysqli_num_rows($rslt);
	if ($vla_ct > 0)
		{
		$row=mysqli_fetch_row($rslt);
		$VLA_user =					$row[0];
		$VLA_campaign_id =			$row[1];
		$VLA_update_time =			$row[2];
		$VLA_status =				$row[3];

		if ($VLA_update_time > $inactive_epoch)
			{
			$lead_active=0;
			$stmt = "SELECT agent_log_id,user,server_ip,event_time,lead_id,campaign_id,pause_epoch,pause_sec,wait_epoch,wait_sec,talk_epoch,talk_sec,dispo_epoch,dispo_sec,status,user_group,comments,sub_status,dead_epoch,dead_sec from vicidial_agent_log where user='$VLA_user' order by agent_log_id desc LIMIT 1;";
			$rslt=mysql_to_mysqli($stmt, $link);
			if ($DB) {echo "<BR>$stmt\n";}
			$val_ct = mysqli_num_rows($rslt);
			if ($val_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$VAL_agent_log_id =		$row[0];
				$VAL_user =				$row[1];
				$VAL_server_ip =		$row[2];
				$VAL_event_time =		$row[3];
				$VAL_lead_id =			$row[4];
				$VAL_campaign_id =		$row[5];
				$VAL_pause_epoch =		$row[6];
				$VAL_pause_sec =		$row[7];
				$VAL_wait_epoch =		$row[8];
				$VAL_wait_sec =			$row[9];
				$VAL_talk_epoch =		$row[10];
				$VAL_talk_sec =			$row[11];
				$VAL_dispo_epoch =		$row[12];
				$VAL_dispo_sec =		$row[13];
				$VAL_status =			$row[14];
				$VAL_user_group =		$row[15];
				$VAL_comments =			$row[16];
				$VAL_sub_status =		$row[17];
				$VAL_dead_epoch =		$row[18];
				$VAL_dead_sec =			$row[19];

				if ($DB) {echo "\n<BR>"._QXZ("VAL VALUES").": $VAL_agent_log_id|$VAL_status|$VAL_lead_id\n";}

				if ( ($VAL_wait_epoch < 1) or ( (preg_match('/PAUSE/', $VLA_status)) and ($VAL_dispo_epoch < 1) ) )
					{
					$VAL_pause_sec = ( ($now_date_epoch - $VAL_pause_epoch) + $VAL_pause_sec);
					$stmt = "UPDATE vicidial_agent_log SET wait_epoch='$now_date_epoch', pause_sec='$VAL_pause_sec', pause_type='ADMIN' where agent_log_id='$VAL_agent_log_id';";
					}
				else
					{
					if ($VAL_talk_epoch < 1)
						{
						$VAL_wait_sec = ( ($now_date_epoch - $VAL_wait_epoch) + $VAL_wait_sec);
						$stmt = "UPDATE vicidial_agent_log SET talk_epoch='$now_date_epoch', wait_sec='$VAL_wait_sec' where agent_log_id='$VAL_agent_log_id';";
						}
					else
						{
						$lead_active++;
						$status_update_SQL='';
						if ( ( (strlen($VAL_status) < 1) or ($VAL_status == 'NULL') ) and ($VAL_lead_id > 0) )
							{
							$status_update_SQL = ", status='PU'";
							$stmt="UPDATE vicidial_list SET status='PU' where lead_id='$VAL_lead_id';";
							if ($DB) {echo "<BR>$stmt\n";}
							$rslt=mysql_to_mysqli($stmt, $link);
							}
						if ($VAL_dispo_epoch < 1)
							{
							$VAL_talk_sec = ($now_date_epoch - $VAL_talk_epoch);
							$stmt = "UPDATE vicidial_agent_log SET dispo_epoch='$now_date_epoch', talk_sec='$VAL_talk_sec'$status_update_SQL where agent_log_id='$VAL_agent_log_id';";
							}
						else
							{
							if ($VAL_dispo_sec < 1)
								{
								$VAL_dispo_sec = ($now_date_epoch - $VAL_dispo_epoch);
								$stmt = "UPDATE vicidial_agent_log SET dispo_sec='$VAL_dispo_sec' where agent_log_id='$VAL_agent_log_id';";
								}
							}
						}
					}

				if ($DB) {echo "<BR>$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				}
			}

		$stmt="DELETE from vicidial_live_agents where user='" . mysqli_real_escape_string($link, $user) . "';";
		if ($DB) {echo "<BR>$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);

		if (strlen($VAL_user_group) < 1)
			{
			$stmt = "SELECT user_group FROM vicidial_users where user='$VLA_user';";
			$rslt=mysql_to_mysqli($stmt, $link);
			if ($DB) {echo "<BR>$stmt\n";}
			$val_ct = mysqli_num_rows($rslt);
			if ($val_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$VAL_user_group =		$row[0];
				}
			}

		$stmt = "INSERT INTO vicidial_user_log (user,event,campaign_id,event_date,event_epoch,user_group) values('$VLA_user','LOGOUT','$VLA_campaign_id','$NOW_TIME','$now_date_epoch','$VAL_user_group');";
		if ($DB) {echo "<BR>$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);


		#############################################
		##### START QUEUEMETRICS LOGGING LOOKUP #####
		$stmt = "SELECT enable_queuemetrics_logging,queuemetrics_server_ip,queuemetrics_dbname,queuemetrics_login,queuemetrics_pass,queuemetrics_log_id,queuemetrics_loginout,queuemetrics_addmember_enabled,queuemetrics_pe_phone_append,queuemetrics_pause_type FROM system_settings;";
		$rslt=mysql_to_mysqli($stmt, $link);
		if ($DB) {echo "<BR>$stmt\n";}
		$qm_conf_ct = mysqli_num_rows($rslt);
		if ($qm_conf_ct > 0)
			{
			$row=mysqli_fetch_row($rslt);
			$enable_queuemetrics_logging =		$row[0];
			$queuemetrics_server_ip	=			$row[1];
			$queuemetrics_dbname =				$row[2];
			$queuemetrics_login	=				$row[3];
			$queuemetrics_pass =				$row[4];
			$queuemetrics_log_id =				$row[5];
			$queuemetrics_loginout =			$row[6];
			$queuemetrics_addmember_enabled =	$row[7];
			$queuemetrics_pe_phone_append =		$row[8];
			$queuemetrics_pause_type =			$row[9];
			}
		##### END QUEUEMETRICS LOGGING LOOKUP #####
		###########################################
		if ($enable_queuemetrics_logging > 0)
			{
			$QM_LOGOFF = 'AGENTLOGOFF';
			if ($queuemetrics_loginout=='CALLBACK')
				{$QM_LOGOFF = 'AGENTCALLBACKLOGOFF';}

			#$linkB=mysql_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass");
			#mysql_select_db("$queuemetrics_dbname", $linkB);
			$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass", "$queuemetrics_dbname");
			if (!$linkB) {die(_QXZ("Could not connect: ")."$queuemetrics_server_ip|$queuemetrics_login" . mysqli_connect_error());}

			$agents='@agents';
			$agent_logged_in='';
			$time_logged_in='0';

			$stmtB = "SELECT agent,time_id,data1 FROM queue_log where agent='Agent/" . mysqli_real_escape_string($link, $user) . "' and verb IN('AGENTLOGIN','AGENTCALLBACKLOGIN') and time_id > $check_time order by time_id desc limit 1;";

			if ($queuemetrics_loginout == 'NONE')
				{
				$pause_typeSQL='';
				if ($queuemetrics_pause_type > 0)
					{$pause_typeSQL=",data5='ADMIN'";}
				$stmt = "INSERT INTO queue_log SET partition='P01',time_id='$now_date_epoch',call_id='NONE',queue='NONE',agent='Agent/" . mysqli_real_escape_string($link, $user) . "',verb='PAUSEREASON',serverid='$queuemetrics_log_id',data1='LOGOFF'$pause_typeSQL;";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $linkB);
				$affected_rows = mysqli_affected_rows($linkB);

				$stmtB = "SELECT agent,time_id,data1 FROM queue_log where agent='Agent/" . mysqli_real_escape_string($link, $user) . "' and verb IN('ADDMEMBER','ADDMEMBER2') and time_id > $check_time order by time_id desc limit 1;";
				}

			$rsltB=mysql_to_mysqli($stmtB, $linkB);
			if ($DB) {echo "<BR>$stmtB\n";}
			$qml_ct = mysqli_num_rows($rsltB);
			if ($qml_ct > 0)
				{
				$row=mysqli_fetch_row($rsltB);
				$agent_logged_in =		$row[0];
				$time_logged_in =		$row[1];
				$RAWtime_logged_in =	$row[1];
				$phone_logged_in =		$row[2];
				}

			$time_logged_in = ($now_date_epoch - $time_logged_in);
			if ($time_logged_in > 1000000) {$time_logged_in=1;}

			if ($queuemetrics_addmember_enabled > 0)
				{
				$queuemetrics_phone_environment='';
				$stmt = "SELECT queuemetrics_phone_environment FROM vicidial_campaigns where campaign_id='$VLA_campaign_id';";
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($DB) {echo "<BR>$stmt\n";}
				$cqpe_ct = mysqli_num_rows($rslt);
				if ($cqpe_ct > 0)
					{
					$row=mysqli_fetch_row($rslt);
					$queuemetrics_phone_environment =	$row[0];
					}

				$stmt = "SELECT distinct queue FROM queue_log where time_id >= $RAWtime_logged_in and agent='$agent_logged_in' and verb IN('ADDMEMBER','ADDMEMBER2') and queue != '$VLA_campaign_id' order by time_id desc;";
				$rslt=mysql_to_mysqli($stmt, $linkB);
				if ($DB) {echo "$stmt\n";}
				$amq_conf_ct = mysqli_num_rows($rslt);
				$i=0;
				while ($i < $amq_conf_ct)
					{
					$row=mysqli_fetch_row($rslt);
					$AMqueue[$i] =	$row[0];
					$i++;
					}

				### add the logged-in campaign as well
				$AMqueue[$i] = $VLA_campaign_id;
				$i++;
				$amq_conf_ct++;

				$i=0;
				while ($i < $amq_conf_ct)
					{
					$pe_append='';
					if ( ($queuemetrics_pe_phone_append > 0) and (strlen($queuemetrics_phone_environment)>0) )
						{
						$qm_extension = explode('/',$phone_logged_in);
						$pe_append = "-$qm_extension[1]";
						}
					$stmt = "INSERT INTO queue_log SET partition='P01',time_id='$now_date_epoch',call_id='NONE',queue='$AMqueue[$i]',agent='$agent_logged_in',verb='REMOVEMEMBER',data1='$phone_logged_in',serverid='$queuemetrics_log_id',data4='$queuemetrics_phone_environment$pe_append';";
					$rslt=mysql_to_mysqli($stmt, $linkB);
					$affected_rows = mysqli_affected_rows($linkB);
					$i++;
					}
				}

			if ($queuemetrics_loginout != 'NONE')
				{
				$stmtB = "INSERT INTO queue_log SET partition='P01',time_id='$now_date_epoch',call_id='NONE',queue='NONE',agent='$agent_logged_in',verb='$QM_LOGOFF',serverid='$queuemetrics_log_id',data1='$phone_logged_in',data2='$time_logged_in';";
				if ($DB) {echo "<BR>$stmtB\n";}
				$rsltB=mysql_to_mysqli($stmtB, $linkB);
				}
			}

//		$message = _QXZ("Agent")." $user - $full_name "._QXZ("has been emergency logged out, make sure they close their web browser");
		$message = $user." - ".$full_name ._QXZ(" has been emergency logged out, make sure they close their web browser");
                echo json_encode(results('success', $message,NULL));
		}
	else
		{
		$message = $user._QXZ(" is not logged in");
                echo json_encode(results('error', $message, NULL));
		}

	if ($db_source == 'S')
		{
		mysqli_close($link);
		$use_slave_server=0;
		$db_source = 'M';
		require("dbconnect_mysqli.php");
		}

	$endMS = microtime();
	$startMSary = explode(" ",$startMS);
	$endMSary = explode(" ",$endMS);
	$runS = ($endMSary[0] - $startMSary[0]);
	$runM = ($endMSary[1] - $startMSary[1]);
	$TOTALrun = ($runS + $runM);

	$stmt="UPDATE vicidial_report_log set run_time='$TOTALrun' where report_log_id='$report_log_id';";
	if ($DB) {echo "|$stmt|\n";}
	$rslt=mysql_to_mysqli($stmt, $link);

	exit;
	}
?>
