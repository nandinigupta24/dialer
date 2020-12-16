<?php

$version = '2.13-502c';
$build = '161126-2137';
$mel=1;					# Mysql Error Log enabled = 1
$mysql_log_count=87;
$one_mysql_log=0;
$DB=0;
$OLDDesign = 0;
require_once("dbconnect_mysqli.php");
require_once '../db/database.php';
require_once("functions.php");

require_once 'elements/constant.php';
require_once '../db/DBClass.php';

if(empty($_SESSION['Login']['user'])){
    header('location:../');
    exit;
}

$hide_gender=0;
$US='_';
$CL=':';
$AT='@';
$DS='-';
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");
$script_name = getenv("SCRIPT_NAME");
$server_name = getenv("SERVER_NAME");
$server_port = getenv("SERVER_PORT");

if(!isset($server_ip)) {
  $server_ip = '';
}
if(!isset($session_name)) {
  $session_name = '';
}

/*START Pricing Plan */
if(!empty($_SESSION['CurrentLogin']['user_group'])){
    get_expired_check($_SESSION['CurrentLogin']['user_group'], $database, $DBUTG);
    get_plan_agent_login($_SESSION['CurrentLogin']['user_group'], $database, $DBUTG);
}
/*END Pricing Plan */

if (preg_match("/443/i",$server_port)) {$HTTPprotocol = 'https://';}
  else {$HTTPprotocol = 'http://';}
if (($server_port == '80') or ($server_port == '443') ) {$server_port='';}
else {$server_port = "$CL$server_port";}
$agcPAGE = "$HTTPprotocol$server_name$server_port$script_name";
$agcDIR = preg_replace('/vicidial\.php/i','',$agcPAGE);
$agcDIR = preg_replace("/$SSagent_script/i",'',$agcDIR);
if (strlen($static_agent_url) > 5)
	{$agcPAGE = $static_agent_url;}
if (strlen($VUselected_language) < 1)
	{$VUselected_language = $default_language;}
$vdc_form_display = 'vdc_form_display.php';
if (preg_match("/cf_encrypt/",$active_modules))
	{$vdc_form_display = 'vdc_form_display_encrypt.php';}
header ("Content-type: text/html; charset=utf-8");
header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header ("Pragma: no-cache");

if ($campaign_login_list > 0)
	{
    $camp_form_code  = "<select size=\"1\" class=\"form-control\" name=\"VD_campaign\" id=\"VD_campaign\" onfocus=\"login_allowable_campaigns()\">\n";
	$camp_form_code .= "<option value=\"\"></option>\n";

	$LOGallowed_campaignsSQL='';
	if (isset($relogin) && $relogin == 'YES')
		{
		$stmt="SELECT user_group from vicidial_users where user='$VD_login' and active='Y';";
		if ($non_latin > 0) {$rslt=mysql_to_mysqli("SET NAMES 'UTF8'", $link);}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01002',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$cl_user_ct = mysqli_num_rows($rslt);
		if ($cl_user_ct > 0)
			{
			$row=mysqli_fetch_row($rslt);
			$VU_user_group=$row[0];

			$stmt="SELECT allowed_campaigns from vicidial_user_groups where user_group='$VU_user_group';";
			$rslt=mysql_to_mysqli($stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01003',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$row=mysqli_fetch_row($rslt);
			if ( (!preg_match("/ALL-CAMPAIGNS/i",$row[0])) )
				{
				$LOGallowed_campaignsSQL = preg_replace('/\s-/i','',$row[0]);
				$LOGallowed_campaignsSQL = preg_replace('/\s/i',"','",$LOGallowed_campaignsSQL);
				$LOGallowed_campaignsSQL = "and campaign_id IN('$LOGallowed_campaignsSQL')";
				}
			}
		else
			{
			echo "<select size=\"1\" class=\"form-control\" name=\"VD_campaign\" id=\"VD_campaign\" onFocus=\"login_allowable_campaigns()\">\n";
			echo "<option value=\"\">-- "._QXZ("USER LOGIN ERROR")." --</option>\n";
			echo "</select>\n";
			}
		}

	### code for manager override of shift restrictions
	if (isset($MGR_override) && $MGR_override > 0)
		{
		if (isset($_GET["MGR_login$loginDATE"]))				{$MGR_login=$_GET["MGR_login$loginDATE"];}
				elseif (isset($_POST["MGR_login$loginDATE"]))	{$MGR_login=$_POST["MGR_login$loginDATE"];}
		if (isset($_GET["MGR_pass$loginDATE"]))					{$MGR_pass=$_GET["MGR_pass$loginDATE"];}
				elseif (isset($_POST["MGR_pass$loginDATE"]))	{$MGR_pass=$_POST["MGR_pass$loginDATE"];}

		$MGR_login = preg_replace("/\'|\"|\\\\|;/","",$MGR_login);
		$MGR_pass = preg_replace("/\'|\"|\\\\|;/","",$MGR_pass);

		$MGR_auth=0;
		$auth_message = user_authorization($MGR_login,$MGR_pass,'MGR',0,0,0,0);
		if (preg_match("/^GOOD/",$auth_message))
			{$MGR_auth=1;}

		if($MGR_auth>0)
			{
			$stmt="UPDATE vicidial_users SET shift_override_flag='1' where user='$VD_login';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01059',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			echo "<!-- Shift Override entered for $VD_login by $MGR_login -->\n";

			### Add a record to the vicidial_admin_log
			$SQL_log = "$stmt|";
			$SQL_log = preg_replace('/;/','',$SQL_log);
			$SQL_log = addslashes($SQL_log);
			$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$MGR_login', ip_address='$ip', event_section='AGENT', event_type='OVERRIDE', record_id='$VD_login', event_code='MANAGER OVERRIDE OF AGENT SHIFT ENFORCEMENT', event_sql=\"$SQL_log\", event_notes='user: $VD_login';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01060',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			}
		}


	$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
	if ($non_latin > 0) {$rslt=mysql_to_mysqli("SET NAMES 'UTF8'", $link);}
	$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01004',$VD_login,$server_ip,$session_name,$one_mysql_log);}
	$camps_to_print = mysqli_num_rows($rslt);

	$o=0;
	while ($camps_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		if ($show_campname_pulldown)
			{$campname = " - $rowx[1]";}
		else
			{$campname = '';}
		if ($VD_campaign)
			{
			if ( (preg_match("/$VD_campaign/i",$rowx[0])) and (strlen($VD_campaign) == strlen($rowx[0])) )
                {$camp_form_code .= "<option value=\"$rowx[0]\" selected=\"selected\">$rowx[0]$campname</option>\n";}
			else
				{
				if (!preg_match('/login_allowable_campaigns/',$camp_form_code))
					{$camp_form_code .= "<option value=\"$rowx[0]\">$rowx[0]$campname</option>\n";}
				}
			}
		else
			{
			if (!preg_match('/login_allowable_campaigns/',$camp_form_code))
					{$camp_form_code .= "<option value=\"$rowx[0]\">$rowx[0]$campname</option>\n";}
			}
		$o++;
		}
	$camp_form_code .= "</select>\n";
	}
else
	{
    $camp_form_code = "<input type=\"text\" class='form-control' name=\"vd_campaign\"  value=\"$VD_campaign\" />\n";
	}


if ($LogiNAJAX >= 10)
	{
	?>

<!--    <script type="text/javascript">


	var BrowseWidth = 0;
	var BrowseHeight = 0;

	function browser_dimensions()
		{
	<?php
		if (preg_match('/MSIE/',$browser))
			{
			echo "	if (document.documentElement && document.documentElement.clientHeight)\n";
			echo "			{BrowseWidth = document.documentElement.clientWidth;}\n";
			echo "		else if (document.body)\n";
			echo "			{BrowseWidth = document.body.clientWidth;}\n";
			echo "		if (document.documentElement && document.documentElement.clientHeight)\n";
			echo "			{BrowseHeight = document.documentElement.clientHeight;}\n";
			echo "		else if (document.body)\n";
			echo "			{BrowseHeight = document.body.clientHeight;}\n";
			}
		else
			{
			echo "BrowseWidth = window.innerWidth;\n";
			echo "		BrowseHeight = window.innerHeight;\n";
			}
	?>

		document.vicidial_form.JS_browser_width.value = BrowseWidth;
		document.vicidial_form.JS_browser_height.value = BrowseHeight;
		}

	// ################################################################################
	// Send Request for allowable campaigns to populate the campaigns pull-down
		function login_allowable_campaigns()
			{
		//	alert(document.vicidial_form.JS_browser_width.value + '|' + BrowseWidth + '|' + document.vicidial_form.JS_browser_height.value + '|' + BrowseHeight);
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
				logincampaign_query = "&user=" + document.vicidial_form.VD_login.value + "&pass=" + document.vicidial_form.VD_pass.value + "&ACTION=LogiNCamPaigns&format=html";
				xmlhttp.open('POST', 'vdc_db_query.php');
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(logincampaign_query);
				xmlhttp.onreadystatechange = function()
					{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
						{
						Nactiveext = null;
						Nactiveext = xmlhttp.responseText;
					//	alert(logincampaign_query);
					//	alert(xmlhttp.responseText);
						document.getElementById("LogiNCamPaigns").innerHTML = Nactiveext;
                        document.getElementById("LogiNReseT").innerHTML = "<input class='btn btn-primary' type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" />";
						document.getElementById("VD_campaign").focus();
						}
					}
				delete xmlhttp;
				}
			}
	//
	</script>-->

	<?php
	}
else
	{
	?>

	<?php

	}

$grey_link='';
if ($link_to_grey_version > 0)
	{$grey_link = "<font class=\"sb_text\"> | </font><a href=\"./vicidial-grey.php?pl=$phone_login&pp=$phone_pass&VD_login=$VD_login&VD_pass=$VD_pass\"> <font class=\"sb_text\">"._QXZ("Old Agent Screen")."</font></a>";}

if (isset($relogin) && $relogin == 'YES')
	{

    require_once 'elements/relogin.php';
    exit;
	}


if ( (strlen($phone_login)<2) or (strlen($phone_pass)<2) )
	{
	require_once 'elements/login.php';
        exit;
	}
else
	{
	if ($WeBRooTWritablE > 0)
		{//$fp = fopen ("./vicidial_auth_entries.txt", "a");
    }
	$VDloginDISPLAY=0;

	if ( (strlen($VD_login)<2) or (strlen($VD_pass)<2) or (strlen($VD_campaign)<2) )
		{
		$VDloginDISPLAY=1;
		}
	else
		{
		$auth=0;
		$auth_message = user_authorization($VD_login,$VD_pass,'',1,0,1,0);
		if (preg_match("/^GOOD/",$auth_message))
			{
			$auth=1;
			$pass_hash = preg_replace("/GOOD\|/",'',$auth_message);

                        get_stats_log($database, $DBUTG,$_SESSION['Login']['user'],$VD_campaign, 'on_time_login',date('H:i:s'));

			}
		# case-sensitive check for user
		if($auth>0)
			{
			if ($VD_login != "$VUuser")
				{
				$auth=0;
				$auth_message='ERRCASE';
				}
			}

		if($auth>0){
                    if(!empty($OLDDesign) && $OLDDesign == 1){
                        require_once 'elements/dash_header.php';
                    }else{
                        require_once 'elements/top_header_code.php';
                    }
                }else
			{
			if ($WeBRooTWritablE > 0)
				{
				//fwrite ($fp, "vdweb|FAIL|$date|$VD_login|XXXX|$ip|$browser|\n");
				//fclose($fp);
				}
			$VDloginDISPLAY=1;

            $VDdisplayMESSAGE = _QXZ("Login incorrect, please try again")."<br>";
			if ($auth_message == 'LOCK')
				{$VDdisplayMESSAGE = _QXZ("Too many login attempts, try again in 15 minutes")."<br>";}
			if ($auth_message == 'ERRNETWORK')
				{$VDdisplayMESSAGE = _QXZ("Too many network errors, please contact your administrator")."<br>";}
			if ($auth_message == 'ERRSERVERS')
				{$VDdisplayMESSAGE = _QXZ("No available servers, please contact your administrator")."<br>";}
			if ($auth_message == 'ERRPHONES')
				{$VDdisplayMESSAGE = _QXZ("No available phones, please contact your administrator")."<br>";}
			if ($auth_message == 'ERRDUPLICATE')
				{$VDdisplayMESSAGE = _QXZ("You are already logged in, please log out of your other session first")."<br>";}
			if ($auth_message == 'ERRAGENTS')
				{$VDdisplayMESSAGE = _QXZ("Too many agents logged in, please contact your administrator")."<br>";}
			if ($auth_message == 'ERRCASE')
				{$VDdisplayMESSAGE = _QXZ("Login incorrect, user names are case sensitive")."<br>";}
			}
		}
	if ($VDloginDISPLAY){
            require_once 'elements/campaign_login_error.php';
            exit;
		}

	$original_phone_login = $phone_login;

	# code for parsing load-balanced agent phone allocation where agent interface
	# will send multiple phones-table logins so that the script can determine the
	# server that has the fewest agents logged into it.
	#   login: ca101,cb101,cc101
		$alias_found=0;
	$stmt="select count(*) from phones_alias where alias_id = '$phone_login';";
	$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01018',$VD_login,$server_ip,$session_name,$one_mysql_log);}
	$alias_ct = mysqli_num_rows($rslt);
	if ($alias_ct > 0)
		{
		$row=mysqli_fetch_row($rslt);
		$alias_found = $row[0];
		}
	if ($alias_found > 0)
		{
		$stmt="select alias_name,logins_list from phones_alias where alias_id = '$phone_login' limit 1;";
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01019',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$alias_ct = mysqli_num_rows($rslt);
		if ($alias_ct > 0)
			{
			$row=mysqli_fetch_row($rslt);
			$alias_name = $row[0];
			$phone_login = $row[1];
			}
		}

	$pa=0;
	if ( (preg_match('/,/i',$phone_login)) and (strlen($phone_login) > 2) )
		{
		$phoneSQL = "(";
		$phones_auto = explode(',',$phone_login);
		$phones_auto_ct = count($phones_auto);
		while($pa < $phones_auto_ct)
			{
			if ($pa > 0)
				{$phoneSQL .= " or ";}
			$desc = ($phones_auto_ct - $pa - 1); # traverse in reverse order
			$phoneSQL .= "(login='$phones_auto[$desc]' and pass='$phone_pass')";
			$pa++;
			}
		$phoneSQL .= ")";
		}
	else {$phoneSQL = "login='$phone_login' and pass='$phone_pass'";}

	$authphone=0;
	#$stmt="SELECT count(*) from phones where $phoneSQL and active = 'Y';";

	$active_agentSQL = "and active_agent_login_server='Y'";
	if ($admin_test == 'YES')
		{$active_agentSQL='';}
	$stmt="SELECT count(*) from phones,servers where $phoneSQL and phones.active = 'Y' and phones.server_ip=servers.server_ip $active_agentSQL;";
	if ($DB) {echo "|$stmt|\n";}
	echo "<!-- server query: $admin_test|$stmt| -->\n";

	$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01020',$VD_login,$server_ip,$session_name,$one_mysql_log);}
	$row=mysqli_fetch_row($rslt);
	$authphone=$row[0];
	if (!$authphone)
		{

		require_once 'elements/phone_login_error.php';
		exit;
		}
	else
		{
		##### BEGIN phone login load balancing functions #####
		### go through the phones logins list to figure out which server has
		### fewest non-remote agents logged in and use that phone login account
		if ($pa > 0)
			{
			$pb=0;
			$pb_login='';
			$pb_server_ip='';
			$pb_count=0;
			$pb_log='';
			$pb_valid_server_ips='';
			$pb_force_set=0;
			while ( ($pb < $phones_auto_ct) and ($pb_force_set < 1) )
				{
				### find the server_ip of each phone_login
				$stmtn="SELECT count(*) from phones where login = '$phones_auto[$pb]';";
				if ($DB) {echo "|$stmtx|\n";}
				if ($non_latin > 0) {$rslt=mysql_to_mysqli("SET NAMES 'UTF8'", $link);}
				$rslt=mysql_to_mysqli($stmtn, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01084',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$rown=mysqli_fetch_row($rslt);
				if ($rown[0] > 0)
					{
					$stmtx="SELECT server_ip from phones where login = '$phones_auto[$pb]';";
					if ($DB) {echo "|$stmtx|\n";}
					$rslt=mysql_to_mysqli($stmtx, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01021',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					$rowx=mysqli_fetch_row($rslt);
					}
				else
					{$rowx[0]='0.0.0.0';}

				### get number of agents logged in to each server
				$stmt="SELECT count(*) from vicidial_live_agents where server_ip = '$rowx[0]' and extension NOT LIKE \"R%\";";
				if ($DB) {echo "|$stmt|\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01022',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$row=mysqli_fetch_row($rslt);

				### find out whether the server is set to active
				$stmt="SELECT count(*) from servers where server_ip = '$rowx[0]' and active='Y' $active_agentSQL;";
				if ($DB) {echo "|$stmt|\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01023',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$rowy=mysqli_fetch_row($rslt);

				$stmt="SELECT count(*) FROM vicidial_conferences where server_ip='$rowx[0]' and ((extension='') or (extension is null));";
				if ($DB) {echo "|$stmt|\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01085',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$rowys=mysqli_fetch_row($rslt);

				### find out if this server has a twin
				$twin_not_live=0;
				if ($rowy[0] > 0)
					{
					$stmt="SELECT active_twin_server_ip from servers where server_ip = '$rowx[0]';";
					if ($DB) {echo "|$stmt|\n";}
					$rslt=mysql_to_mysqli($stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01070',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					$rowyy=mysqli_fetch_row($rslt);
					if (strlen($rowyy[0]) > 4)
						{
						### find out whether the twin server_updater is running
						$stmt="SELECT count(*) from server_updater where server_ip = '$rowyy[0]' and last_update > '$past_minutes_date';";
						if ($DB) {echo "|$stmt|\n";}
						$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01071',$VD_login,$server_ip,$session_name,$one_mysql_log);}
						$rowyz=mysqli_fetch_row($rslt);
						if ($rowyz[0] < 1) {$twin_not_live=1;}
						}
					}

				### find out whether the server_updater is running
				$stmt="SELECT count(*) from server_updater where server_ip = '$rowx[0]' and last_update > '$past_minutes_date';";
				if ($DB) {echo "|$stmt|\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01024',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$rowz=mysqli_fetch_row($rslt);

				$pb_log .= "$phones_auto[$pb]|$rowx[0]|$row[0]|$rowy[0]|$rowys[0]|$rowz[0]|$twin_not_live|   ";

				if ( ($rowy[0] > 0) and ($rowys[0] > 0) and ($rowz[0] > 0) and ($twin_not_live < 1) )
					{
					if ( ($pllb_grouping == 'ONE_SERVER_ONLY') or ($pllb_grouping == 'CASCADING') )
						{
						if ($pllb_grouping == 'ONE_SERVER_ONLY')
							{
							### one-server-only plib check
							### get number of agents logged in to each server
							$stmt="SELECT count(*) from vicidial_live_agents where server_ip = '$rowx[0]' and campaign_id='$VD_campaign' and extension NOT LIKE \"R%\";";
							if ($DB) {echo "|$stmt|\n";}
							$rslt=mysql_to_mysqli($stmt, $link);
							if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01074',$VD_login,$server_ip,$session_name,$one_mysql_log);}
							$rowG=mysqli_fetch_row($rslt);

							if ($rowG[0] > 0)
								{
								$pb_count=$row[0];
								$pb_server_ip=$rowx[0];
								$phone_login=$phones_auto[$pb];
								$pb_force_set++;
								echo "<!--      PLLB: ONE_SERVER_ONLY|$pb_server_ip|$pb_count| -->\n";
								}
							}
						else
							{
							### cascading plib check
							### get number of agents logged in to each server
							$stmt="SELECT count(*) from vicidial_live_agents where server_ip = '$rowx[0]' and campaign_id='$VD_campaign' and extension NOT LIKE \"R%\";";
							if ($DB) {echo "|$stmt|\n";}
							$rslt=mysql_to_mysqli($stmt, $link);
							if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01075',$VD_login,$server_ip,$session_name,$one_mysql_log);}
							$rowG=mysqli_fetch_row($rslt);

							echo "<!--      PLLB CASCADING CHECK: |$pllb_grouping|$rowx[0]|$rowG[0]|$pllb_grouping_limit|   |$row[0]|$SSpllb_grouping_limit| -->\n";
							if ( ($rowG[0] > 0) and ($rowG[0] < $pllb_grouping_limit) and ($row[0] < $SSpllb_grouping_limit) )
								{
								$pb_count=$row[0];
								$pb_server_ip=$rowx[0];
								$phone_login=$phones_auto[$pb];
								$pb_force_set++;
								echo "<!--      PLLB: CASCADING|$pb_server_ip|$pb_count| -->\n";
								}
							}
						}
					if ($DB > 0) {echo "($pb_count <> $row[0]) $pb|$pb_force_set|$phones_auto[$pb]|$pb_server_ip|$pb_count| -->\n";}
					if ($pb_force_set < 1)
						{
						if ( ($pb_count >= $row[0]) or (strlen($pb_server_ip) < 4) )
							{
							$pb_count=$row[0];
							$pb_server_ip=$rowx[0];
							$phone_login=$phones_auto[$pb];
							}
						}
					}
				$pb++;
				}


			echo "<!-- Phones balance selection: $phone_login|$pb_server_ip|$past_minutes_date|$pb_force_set|     |$pb_log -->\n";
			}
		##### END phone login load balancing functions #####

		echo "<title>Agent web client</title>\n";
		$stmt="SELECT extension,dialplan_number,voicemail_id,phone_ip,computer_ip,server_ip,login,pass,status,active,phone_type,fullname,company,picture,messages,old_messages,protocol,local_gmt,ASTmgrUSERNAME,ASTmgrSECRET,login_user,login_pass,login_campaign,park_on_extension,conf_on_extension,VICIDIAL_park_on_extension,VICIDIAL_park_on_filename,monitor_prefix,recording_exten,voicemail_exten,voicemail_dump_exten,ext_context,dtmf_send_extension,call_out_number_group,client_browser,install_directory,local_web_callerID_URL,VICIDIAL_web_URL,AGI_call_logging_enabled,user_switching_enabled,conferencing_enabled,admin_hangup_enabled,admin_hijack_enabled,admin_monitor_enabled,call_parking_enabled,updater_check_enabled,AFLogging_enabled,QUEUE_ACTION_enabled,CallerID_popup_enabled,voicemail_button_enabled,enable_fast_refresh,fast_refresh_rate,enable_persistant_mysql,auto_dial_next_number,VDstop_rec_after_each_call,DBX_server,DBX_database,DBX_user,DBX_pass,DBX_port,DBY_server,DBY_database,DBY_user,DBY_pass,DBY_port,outbound_cid,enable_sipsak_messages,email,template_id,conf_override,phone_context,phone_ring_timeout,conf_secret,is_webphone,use_external_server_ip,codecs_list,webphone_dialpad,phone_ring_timeout,on_hook_agent,webphone_auto_answer,webphone_dialbox,webphone_mute,webphone_volume,webphone_debug from phones where login='$phone_login' and pass='$phone_pass' and active = 'Y';";
		if ($DB) {echo "|$stmt|\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01025',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$row=mysqli_fetch_row($rslt);

		$extension=$row[0];
		$dialplan_number=$row[1];
		$voicemail_id=$row[2];
		$phone_ip=$row[3];
		$computer_ip=$row[4];
		$server_ip=$row[5];
		$login=$row[6];
		$pass=$row[7];
		$status=$row[8];
		$active=$row[9];
		$phone_type=$row[10];
		$fullname=$row[11];
		$company=$row[12];
		$picture=$row[13];
		$messages=$row[14];
		$old_messages=$row[15];
		$protocol=$row[16];
		$local_gmt=$row[17];
		$ASTmgrUSERNAME=$row[18];
		$ASTmgrSECRET=$row[19];
		$login_user=$row[20];
		$login_pass=$row[21];
		$login_campaign=$row[22];
		$park_on_extension=$row[23];
		$conf_on_extension=$row[24];
		$VICIDiaL_park_on_extension=$row[25];
		$VICIDiaL_park_on_filename=$row[26];
		$monitor_prefix=$row[27];
		$recording_exten=$row[28];
		$voicemail_exten=$row[29];
		$voicemail_dump_exten=$row[30];
		$ext_context=$row[31];
		$dtmf_send_extension=$row[32];
		$call_out_number_group=$row[33];
		$client_browser=$row[34];
		$install_directory=$row[35];
		$local_web_callerID_URL=$row[36];
		$VICIDiaL_web_URL=$row[37];
		$AGI_call_logging_enabled=$row[38];
		$user_switching_enabled=$row[39];
		$conferencing_enabled=$row[40];
		$admin_hangup_enabled=$row[41];
		$admin_hijack_enabled=$row[42];
		$admin_monitor_enabled=$row[43];
		$call_parking_enabled=$row[44];
		$updater_check_enabled=$row[45];
		$AFLogging_enabled=$row[46];
		$QUEUE_ACTION_enabled=$row[47];
		$CallerID_popup_enabled=$row[48];
		$voicemail_button_enabled=$row[49];
		$enable_fast_refresh=$row[50];
		$fast_refresh_rate=$row[51];
		$enable_persistant_mysql=$row[52];
		$auto_dial_next_number=$row[53];
		$VDstop_rec_after_each_call=$row[54];
		$DBX_server=$row[55];
		$DBX_database=$row[56];
		$DBX_user=$row[57];
		$DBX_pass=$row[58];
		$DBX_port=$row[59];
		$outbound_cid=$row[65];
		$enable_sipsak_messages=$row[66];
		$conf_secret=$row[72];
		$is_webphone=$row[73];
		$use_external_server_ip=$row[74];
		$codecs_list=$row[75];
		$webphone_dialpad=$row[76];
		$phone_ring_timeout=$row[77];
		$on_hook_agent=$row[78];
		$webphone_auto_answer=$row[79];
		$webphone_dialbox=$row[80];
		$webphone_mute=$row[81];
		$webphone_volume=$row[82];
		$webphone_debug=$row[83];

		$login_context = $ext_context;
		if (strlen($meetme_enter_login_filename) > 0)
			{$login_context = 'meetme-enter-login';}

		$no_empty_session_warnings=0;
		if ( ($phone_login == 'nophone') or ($on_hook_agent == 'Y') )
			{
			$no_empty_session_warnings=1;
			}
		if ($PhonESComPIP == '1')
			{
			if (strlen($computer_ip) < 4)
				{
				$stmt="UPDATE phones SET computer_ip='$ip' where login='$phone_login' and pass='$phone_pass' and active = 'Y';";
				if ($DB) {echo "|$stmt|\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01026',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				}
			}
		if ($PhonESComPIP == '2')
			{
			$stmt="UPDATE phones SET computer_ip='$ip' where login='$phone_login' and pass='$phone_pass' and active = 'Y';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01027',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			}
		if ($clientDST)
			{
			$local_gmt = ($local_gmt + $isdst);
			}

		$stmt="SELECT asterisk_version,web_socket_url from servers where server_ip='$server_ip';";
		if ($DB) {echo "|$stmt|\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01028',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$row=mysqli_fetch_row($rslt);
		$asterisk_version=$row[0];
		$web_socket_url=$row[1];

		if ($protocol == 'EXTERNAL')
			{
			$protocol = 'Local';
			$extension = "$dialplan_number$AT$ext_context";
			}
		if (preg_match("/Zap/i",$protocol))
			{
			if (preg_match("/^1\.0|^1\.2|^1\.4\.1|^1\.4\.20|^1\.4\.21/i",$asterisk_version))
				{$do_nothing=1;}
			else
				{
				$protocol = 'DAHDI';
				}
			}

		$SIP_user = "$protocol/$extension";
		$SIP_user_DiaL = "$protocol/$extension";
		$qm_extension = "$extension";
		if ( (preg_match('/8300/',$dialplan_number)) and (strlen($dialplan_number)<5) and ($protocol == 'Local') )
			{
			$SIP_user = "$protocol/$extension$VD_login";
			$qm_extension = "$extension$VD_login";
			}

		# If a park extension is not set, use the default one
		if ( (strlen($park_ext)>0) && (strlen($park_file_name)>0) )
			{
			$VICIDiaL_park_on_extension = "$park_ext";
			$VICIDiaL_park_on_filename = "$park_file_name";
			echo "<!-- CAMPAIGN CUSTOM PARKING:  |$VICIDiaL_park_on_extension|$VICIDiaL_park_on_filename| -->\n";
			}
		echo "<!-- CAMPAIGN DEFAULT PARKING: |$VICIDiaL_park_on_extension|$VICIDiaL_park_on_filename| -->\n";

		# If a web form address is not set, use the default one
		if (strlen($web_form_address)>0)
			{
			$VICIDiaL_web_form_address = "$web_form_address";
			echo "<!-- CAMPAIGN CUSTOM WEB FORM:   |$VICIDiaL_web_form_address| -->\n";
			}
		else
			{
			$VICIDiaL_web_form_address = "$VICIDiaL_web_URL";
			print "<!-- CAMPAIGN DEFAULT WEB FORM:  |$VICIDiaL_web_form_address| -->\n";
			$VICIDiaL_web_form_address_enc = rawurlencode($VICIDiaL_web_form_address);
			}
		$VICIDiaL_web_form_address_enc = rawurlencode($VICIDiaL_web_form_address);

		# If a web form address two is not set, use the first one
		if (strlen($web_form_address_two)>0)
			{
			$VICIDiaL_web_form_address_two = "$web_form_address_two";
			echo "<!-- CAMPAIGN CUSTOM WEB FORM 2:   |$VICIDiaL_web_form_address_two| -->\n";
			}
		else
			{
			$VICIDiaL_web_form_address_two = "$VICIDiaL_web_form_address";
			echo "<!-- CAMPAIGN DEFAULT WEB FORM 2:  |$VICIDiaL_web_form_address_two| -->\n";
			$VICIDiaL_web_form_address_two_enc = rawurlencode($VICIDiaL_web_form_address_two);
			}
		$VICIDiaL_web_form_address_two_enc = rawurlencode($VICIDiaL_web_form_address_two);

		# If a web form address three is not set, use the first one
		if (strlen($web_form_address_three)>0)
			{
			$VICIDiaL_web_form_address_three = "$web_form_address_three";
			echo "<!-- CAMPAIGN CUSTOM WEB FORM 3:   |$VICIDiaL_web_form_address_three| -->\n";
			}
		else
			{
			$VICIDiaL_web_form_address_three = "$VICIDiaL_web_form_address";
			echo "<!-- CAMPAIGN DEFAULT WEB FORM 3:  |$VICIDiaL_web_form_address_three| -->\n";
			$VICIDiaL_web_form_address_three_enc = rawurlencode($VICIDiaL_web_form_address_three);
			}
		$VICIDiaL_web_form_address_three_enc = rawurlencode($VICIDiaL_web_form_address_three);

		# If closers are allowed on this campaign
		if ($allow_closers=="Y")
			{
			$VICIDiaL_allow_closers = 1;
			echo "<!-- CAMPAIGN ALLOWS CLOSERS:    |$VICIDiaL_allow_closers| -->\n";
			}
		else
			{
			$VICIDiaL_allow_closers = 0;
			echo "<!-- CAMPAIGN ALLOWS NO CLOSERS: |$VICIDiaL_allow_closers| -->\n";
			}


		$session_ext = preg_replace("/[^a-z0-9]/i", "", $extension);
		if (strlen($session_ext) > 10) {$session_ext = substr($session_ext, 0, 10);}
		$session_rand = (rand(1,9999999) + 10000000);
		$session_name = "$StarTtimE$US$session_ext$session_rand";

		if ($webform_sessionname)
			{$webform_sessionname = "&session_name=$session_name";}
		else
			{$webform_sessionname = '';}

		$stmt="DELETE from web_client_sessions where start_time < '$past_month_date' and extension='$extension' and server_ip = '$server_ip' and program = 'vicidial';";
		if ($DB) {echo "|$stmt|\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01029',$VD_login,$server_ip,$session_name,$one_mysql_log);}

		$stmt="INSERT INTO web_client_sessions values('$extension','$server_ip','vicidial','$NOW_TIME','$session_name');";
		if ($DB) {echo "|$stmt|\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01030',$VD_login,$server_ip,$session_name,$one_mysql_log);}

		$PricingPlan = $DBUTG->get('user_pricings', '*', ['AND' => ['user_group' => $_SESSION['CurrentLogin']['user_group'], 'status' => 'RUN']]);
    $PricingPlanCount = $DBUTG->count('user_pricings', '*', ['AND' => ['user_group' => $_SESSION['CurrentLogin']['user_group'], 'status' => 'RUN']]);

		if($PricingPlanCount > 0 && $PricingPlan['end'] < date('Y-m-d')) { //&& $vicidial['user_group'] != 'ADMIN')
			require_once 'elements/licence_expire.php'; die;
		}
		if ( ( ($campaign_allow_inbound == 'Y') and ($dial_method != 'MANUAL') ) || ($campaign_leads_to_call > 0) || (preg_match('/Y/',$no_hopper_leads_logins)) )
			{
			##### check to see if the user has a conf extension already, this happens if they previously exited uncleanly
			$stmt="SELECT conf_exten FROM vicidial_conferences where extension='$SIP_user' and server_ip = '$server_ip' LIMIT 1;";
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01032',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			if ($DB) {echo "$stmt\n";}
			$prev_login_ct = mysqli_num_rows($rslt);
			$i=0;
			while ($i < $prev_login_ct)
				{
				$row=mysqli_fetch_row($rslt);
				$session_id =$row[0];
				$i++;
				}
			if ($prev_login_ct > 0)
				{echo "<!-- USING PREVIOUS MEETME ROOM - $session_id - $NOW_TIME - $SIP_user -->\n";}
			else
				{
				##### grab the next available vicidial_conference room and reserve it
				$stmt="SELECT count(*) FROM vicidial_conferences where server_ip='$server_ip' and ((extension='') or (extension is null));";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01033',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$row=mysqli_fetch_row($rslt);
				if ($row[0] > 0)
					{
					$stmt="UPDATE vicidial_conferences set extension='$SIP_user', leave_3way='0' where server_ip='$server_ip' and ((extension='') or (extension is null)) limit 1;";
						if (isset($format) && $format=='debug') {echo "\n<!-- $stmt -->";}
					$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01034',$VD_login,$server_ip,$session_name,$one_mysql_log);}

					$stmt="SELECT conf_exten from vicidial_conferences where server_ip='$server_ip' and ( (extension='$SIP_user') or (extension='$VD_login') );";
						if (isset($format) && $format=='debug') {echo "\n<!-- $stmt -->";}
					$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01035',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					$row=mysqli_fetch_row($rslt);
					$session_id = $row[0];
					}
				echo "<!-- USING NEW MEETME ROOM - $session_id - $NOW_TIME - $SIP_user -->\n";
				}

			### mark leads that were not dispositioned during previous calls as ERI
			$stmt="UPDATE vicidial_list set status='ERI', user='' where status IN('QUEUE','INCALL') and user ='$VD_login';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01036',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$vlERIaffected_rows = mysqli_affected_rows($link);
			echo "<!-- old QUEUE and INCALL reverted list:   |$vlERIaffected_rows| -->\n";

			$stmt="DELETE from vicidial_hopper where status IN('QUEUE','INCALL','DONE') and user ='$VD_login';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01037',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$vhICaffected_rows = mysqli_affected_rows($link);
			echo "<!-- old QUEUE and INCALL reverted hopper: |$vhICaffected_rows| -->\n";

			$stmt="DELETE from vicidial_live_agents where user ='$VD_login';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01038',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$vlaLIaffected_rows = mysqli_affected_rows($link);
			echo "<!-- old vicidial_live_agents records cleared: |$vlaLIaffected_rows| -->\n";

			$stmt="DELETE from vicidial_live_inbound_agents where user ='$VD_login';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01039',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$vliaLIaffected_rows = mysqli_affected_rows($link);
			echo "<!-- old vicidial_live_inbound_agents records cleared: |$vliaLIaffected_rows| -->\n";

			$stmt="UPDATE routing_initiated_recordings set processed='2' where user='$VD_login' and processed='0';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01086',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$RIRaffected_rows = mysqli_affected_rows($link);
			echo "<!-- routing_initiated_recordings invalidated:   |$RIRaffected_rows| -->\n";

			$VULhostname = php_uname('n');
			$VULservername = $_SERVER['SERVER_NAME'];
			if (strlen($VULhostname)<1) {$VULhostname='X';}
			if (strlen($VULservername)<1) {$VULservername='X';}

			$stmt="SELECT webserver_id FROM vicidial_webservers where webserver='$VULservername' and hostname='$VULhostname' LIMIT 1;";
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01080',$VD_login,$server_ip,$session_name,$one_mysql_log);}
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
				$stmt="INSERT INTO vicidial_webservers (webserver,hostname) values('$VULservername','$VULhostname');";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01081',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				$webserver_id = mysqli_insert_id($link);
				echo "<!-- vicidial_webservers record inserted: |$affected_rows|$webserver_id| -->\n";
				}

			$stmt="SELECT url_id FROM vicidial_urls where url='$agcPAGE' LIMIT 1;";
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01082',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			if ($DB) {echo "$stmt\n";}
			$url_id_ct = mysqli_num_rows($rslt);
			if ($url_id_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$url_id = $row[0];
				}
			else
				{
				##### insert url entry
				$stmt="INSERT INTO vicidial_urls (url) values('$agcPAGE');";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01083',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				$url_id = mysqli_insert_id($link);
				echo "<!-- vicidial_urls record inserted: |$affected_rows|$url_id| -->\n";
				}

			### insert an entry into the user log for the login event
			$vul_data = "$vlERIaffected_rows|$vhICaffected_rows|$vlaLIaffected_rows|$vliaLIaffected_rows";
			$stmt = "INSERT INTO vicidial_user_log (user,event,campaign_id,event_date,event_epoch,user_group,session_id,server_ip,extension,computer_ip,browser,data,phone_login,server_phone,phone_ip,webserver,login_url,browser_width,browser_height) values('$VD_login','LOGIN','$VD_campaign','$NOW_TIME','$StarTtimE','$VU_user_group','$session_id','$server_ip','$protocol/$extension','$ip','$browser','$vul_data','$original_phone_login','$phone_login','LOOKUP','$webserver_id','$url_id','$JS_browser_width','$JS_browser_height');";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01031',$VD_login,$server_ip,$session_name,$one_mysql_log);}

        #   echo "<b>You have logged in as user: $VD_login on phone: $SIP_user to campaign: $VD_campaign</b><br>\n";
			$VICIDiaL_is_logged_in=1;

			### set the callerID for manager middleware-app to connect the phone to the user
			$SIqueryCID = "S$CIDdate$session_id";

			#############################################
			##### START SYSTEM_SETTINGS LOOKUP #####
			$stmt = "SELECT enable_queuemetrics_logging,queuemetrics_server_ip,queuemetrics_dbname,queuemetrics_login,queuemetrics_pass,queuemetrics_log_id,vicidial_agent_disable,allow_sipsak_messages,queuemetrics_loginout,queuemetrics_addmember_enabled,queuemetrics_pe_phone_append,queuemetrics_pause_type FROM system_settings;";
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01040',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			if ($DB) {echo "$stmt\n";}
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
				$vicidial_agent_disable =			$row[6];
				$allow_sipsak_messages =			$row[7];
				$queuemetrics_loginout =			$row[8];
				$queuemetrics_addmember_enabled =	$row[9];
				$queuemetrics_pe_phone_append =		$row[10];
				$queuemetrics_pause_type =			$row[11];
				}
			##### END QUEUEMETRICS LOGGING LOOKUP #####
			###########################################

			if ( ($enable_sipsak_messages > 0) and ($allow_sipsak_messages > 0) and (preg_match("/SIP/i",$protocol)) )
				{
				$extension = preg_replace("/\'|\"|\\\\|;/","",$extension);
				$phone_ip = preg_replace("/\'|\"|\\\\|;/","",$phone_ip);
				$SIPSAK_prefix = 'LIN-';
				echo "<!-- sending login sipsak message: $SIPSAK_prefix$VD_campaign -->\n";
				passthru("/usr/local/bin/sipsak -M -O desktop -B \"$SIPSAK_prefix$VD_campaign\" -r 5060 -s sip:$extension@$phone_ip > /dev/null");
				$SIqueryCID = "$SIPSAK_prefix$VD_campaign$DS$CIDdate";
				}

			$WebPhonEurl='';
			$webphone_content='';
			$TEMP_SIP_user_DiaL = $SIP_user_DiaL;
			if ($on_hook_agent == 'Y')
				{$TEMP_SIP_user_DiaL = 'Local/8300@default';}
			### insert a NEW record to the vicidial_manager table to be processed
			$agent_login_data="||$NOW_TIME|NEW|N|$server_ip||Originate|$SIqueryCID|Channel: $SIP_user_DiaL|Context: $login_context|Exten: $session_id|Priority: 1|Callerid: \"$SIqueryCID\" <$campaign_cid>|||||";
			$agent_login_stmt="INSERT INTO vicidial_manager values('','','$NOW_TIME','NEW','N','$server_ip','','Originate','$SIqueryCID','Channel: $TEMP_SIP_user_DiaL','Context: $login_context','Exten: $session_id','Priority: 1','Callerid: \"$SIqueryCID\" <$campaign_cid>','','','','','');";
			if ( ($is_webphone != 'Y') and ($is_webphone != 'Y_API_LAUNCH') )
				{
				if ($DB) {echo "$agent_login_stmt\n";}
				$rslt=mysql_to_mysqli($agent_login_stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01041',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				echo "<!-- call placed to session_id: $session_id from phone: $SIP_user $SIP_user_DiaL -->\n";
				}
			else
				{
				### build Iframe variable content for webphone here
				$codecs_list = preg_replace("/ /",'',$codecs_list);
				$codecs_list = preg_replace("/-/",'',$codecs_list);
				$codecs_list = preg_replace("/&/",'',$codecs_list);
				$webphone_server_ip = $server_ip;
				if ($use_external_server_ip=='Y')
					{
					##### find external_server_ip if enabled for this phone account
					$stmt="SELECT external_server_ip FROM servers where server_ip='$server_ip' LIMIT 1;";
					$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01065',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					if ($DB) {echo "$stmt\n";}
					$exip_ct = mysqli_num_rows($rslt);
					if ($exip_ct > 0)
						{
						$row=mysqli_fetch_row($rslt);
						$webphone_server_ip =$row[0];
						}
					}
				if (strlen($webphone_url) < 6)
					{
					##### find webphone_url in system_settings and generate IFRAME code for it #####
					$stmt="SELECT webphone_url FROM system_settings LIMIT 1;";
					$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01066',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					if ($DB) {echo "$stmt\n";}
					$wu_ct = mysqli_num_rows($rslt);
					if ($wu_ct > 0)
						{
						$row=mysqli_fetch_row($rslt);
						$webphone_url =$row[0];
						}
					}
				if (strlen($system_key) < 1)
					{
					##### find system_key in system_settings if populated #####
					$stmt="SELECT webphone_systemkey FROM system_settings LIMIT 1;";
					$rslt=mysql_to_mysqli($stmt, $link);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01068',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					if ($DB) {echo "$stmt\n";}
					$wsk_ct = mysqli_num_rows($rslt);
					if ($wsk_ct > 0)
						{
						$row=mysqli_fetch_row($rslt);
						$system_key =$row[0];
						}
					}
				$webphone_options='INITIAL_LOAD';
				if ($webphone_dialpad == 'Y') {$webphone_options .= "--DIALPAD_Y";}
				if ($webphone_dialpad == 'N') {$webphone_options .= "--DIALPAD_N";}
				if ($webphone_dialpad == 'TOGGLE') {$webphone_options .= "--DIALPAD_TOGGLE";}
				if ($webphone_dialpad == 'TOGGLE_OFF') {$webphone_options .= "--DIALPAD_OFF_TOGGLE";}
				if ($webphone_auto_answer == 'Y') {$webphone_options .= "--AUTOANSWER_Y";}
				if ($webphone_auto_answer == 'N') {$webphone_options .= "--AUTOANSWER_N";}
				if ($webphone_dialbox == 'Y') {$webphone_options .= "--DIALBOX_Y";}
				if ($webphone_dialbox == 'N') {$webphone_options .= "--DIALBOX_N";}
				if ($webphone_mute == 'Y') {$webphone_options .= "--MUTE_Y";}
				if ($webphone_mute == 'N') {$webphone_options .= "--MUTE_N";}
				if ($webphone_volume == 'Y') {$webphone_options .= "--VOLUME_Y";}
				if ($webphone_volume == 'N') {$webphone_options .= "--VOLUME_N";}
				if ($webphone_debug == 'Y') {$webphone_options .= "--DEBUG";}
				if (strlen($web_socket_url) > 5) {$webphone_options .= "--WEBSOCKETURL$web_socket_url";}

				### base64 encode variables
				$b64_phone_login =		base64_encode($extension);
				$b64_phone_pass =		base64_encode($conf_secret);
				$b64_session_name =		base64_encode($session_name);
				$b64_server_ip =		base64_encode($webphone_server_ip);
				$b64_callerid =			base64_encode($outbound_cid);
				$b64_protocol =			base64_encode($protocol);
				$b64_codecs =			base64_encode($codecs_list);
				$b64_options =			base64_encode($webphone_options);
				$b64_system_key =		base64_encode($system_key);

				$WebPhonEurl = "$webphone_url?phone_login=$b64_phone_login&phone_login=$b64_phone_login&phone_pass=$b64_phone_pass&server_ip=$b64_server_ip&callerid=$b64_callerid&protocol=$b64_protocol&codecs=$b64_codecs&options=$b64_options&system_key=$b64_system_key";

				if ($is_webphone == 'Y')
					{
					if ($webphone_location == 'bar')
						{
						$webphone_content = "<iframe src=\"$WebPhonEurl\" style=\"width:" . $webphone_width . "px;height:480px;background-color:transparent;z-index:17;\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" id=\"webphone\" name=\"webphone\" width=\"" . $webphone_width . "px\" height=\"480px\"> </iframe>";
						}
					else
						{
						$webphone_content = "<iframe src=\"$WebPhonEurl\" style=\"width:" . $webphone_width . "px;height:480px;background-color:transparent;z-index:17;\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" id=\"webphone\" name=\"webphone\" width=\"" . $webphone_width . "px\" height=\"480px\"> </iframe>";
						}
					}
				}

			$stmt="DELETE from vicidial_session_data where user='$VD_login';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01078',$VD_login,$server_ip,$session_name,$one_mysql_log);}

			$stmt="INSERT INTO vicidial_session_data SET session_name='$session_name',user='$VD_login',campaign_id='$VD_campaign',server_ip='$server_ip',conf_exten='$session_id',extension='$extension',login_time='$NOW_TIME',webphone_url='$WebPhonEurl',agent_login_call='$agent_login_data';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01079',$VD_login,$server_ip,$session_name,$one_mysql_log);}

			##### grab the campaign_weight and number of calls today on that campaign for the agent
			$stmt="SELECT campaign_weight,calls_today,campaign_grade FROM vicidial_campaign_agents where user='$VD_login' and campaign_id = '$VD_campaign';";
			$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01042',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			if ($DB) {echo "$stmt\n";}
			$vca_ct = mysqli_num_rows($rslt);
			if ($vca_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$campaign_weight =	$row[0];
				$calls_today =		$row[1];
				$campaign_grade =	$row[2];
				$i++;
				}
			else
				{
				$campaign_weight =	'0';
				$calls_today =		'0';
				$campaign_grade =	'1';
				$stmt="INSERT INTO vicidial_campaign_agents (user,campaign_id,campaign_rank,campaign_weight,calls_today,campaign_grade) values('$VD_login','$VD_campaign','0','0','$calls_today','$campaign_grade');";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01043',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				echo "<!-- new vicidial_campaign_agents record inserted: |$affected_rows| -->\n";
				}

			if ($auto_dial_level > 0)
				{
				echo "<!-- campaign is set to auto_dial_level: $auto_dial_level -->\n";

				$closer_chooser_string='';
				$stmt="INSERT INTO vicidial_live_agents (user,server_ip,conf_exten,extension,status,lead_id,campaign_id,uniqueid,callerid,channel,random_id,last_call_time,last_update_time,last_call_finish,closer_campaigns,user_level,campaign_weight,calls_today,last_state_change,outbound_autodial,manager_ingroup_set,on_hook_ring_time,on_hook_agent,last_inbound_call_time,last_inbound_call_finish,campaign_grade,pause_code) values('$VD_login','$server_ip','$session_id','$SIP_user','PAUSED','','$VD_campaign','','','','$random','$NOW_TIME','$tsNOW_TIME','$NOW_TIME','$closer_chooser_string','$user_level','$campaign_weight','$calls_today','$NOW_TIME','Y','N','$phone_ring_timeout','$on_hook_agent','$NOW_TIME','$NOW_TIME','$campaign_grade','LOGIN');";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01044',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				echo "<!-- new vicidial_live_agents record inserted: |$affected_rows| -->\n";

				if ($enable_queuemetrics_logging > 0)
					{
					$QM_LOGIN = 'AGENTLOGIN';
					$QM_PHONE = "$VD_login@agents";
					if ( ($queuemetrics_loginout=='CALLBACK') or ($queuemetrics_loginout=='NONE') )
						{
						$QM_LOGIN = 'AGENTCALLBACKLOGIN';
						$QM_PHONE = "$SIP_user_DiaL";
						}
					$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass");
					if (!$linkB) {die(_QXZ("Could not connect: ")."$queuemetrics_server_ip|$queuemetrics_login" . mysqli_connect_error());}
					mysqli_select_db($linkB, "$queuemetrics_dbname");

					if ( ($queuemetrics_pe_phone_append > 0) and (strlen($qm_phone_environment)>0) )
						{$qm_phone_environment .= "-$qm_extension";}

					if ($queuemetrics_loginout!='NONE')
						{
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='NONE',agent='Agent/$VD_login',verb='$QM_LOGIN',data1='$QM_PHONE',serverid='$queuemetrics_log_id',data4='$qm_phone_environment';";
						if ($DB) {echo "$stmt\n";}
						$rslt=mysql_to_mysqli($stmt, $linkB);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01045',$VD_login,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						echo "<!-- queue_log $QM_LOGIN entry added: $VD_login|$affected_rows|$QM_PHONE -->\n";
						}

					$pause_typeSQL='';
					if ($queuemetrics_pause_type > 0)
						{$pause_typeSQL=",data5='AGENT'";}
					$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='NONE',agent='Agent/$VD_login',verb='PAUSEALL',serverid='$queuemetrics_log_id',data4='$qm_phone_environment' $pause_typeSQL;";
					if ($DB) {echo "$stmt\n";}
					$rslt=mysql_to_mysqli($stmt, $linkB);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01046',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					$affected_rows = mysqli_affected_rows($linkB);
					echo "<!-- queue_log PAUSE entry added: $VD_login|$affected_rows -->\n";

					if ($queuemetrics_addmember_enabled > 0)
						{
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='$VD_campaign',agent='Agent/$VD_login',verb='ADDMEMBER2',data1='$QM_PHONE',serverid='$queuemetrics_log_id',data4='$qm_phone_environment';";
						if ($DB) {echo "$stmt\n";}
						$rslt=mysql_to_mysqli($stmt, $linkB);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01069',$VD_login,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						echo "<!-- queue_log ADDMEMBER2 entry added: $VD_login|$affected_rows -->\n";
						}

					mysqli_close($linkB);
					mysqli_select_db($link, "$VARDB_database");
					}


				if ( ($campaign_allow_inbound == 'Y') and ($dial_method != 'MANUAL') )
					{
					print "<!-- CLOSER-type campaign -->\n";
					}
				}
			else
				{
				print "<!-- campaign is set to manual dial: $auto_dial_level -->\n";

				$stmt="INSERT INTO vicidial_live_agents (user,server_ip,conf_exten,extension,status,lead_id,campaign_id,uniqueid,callerid,channel,random_id,last_call_time,last_update_time,last_call_finish,user_level,campaign_weight,calls_today,last_state_change,outbound_autodial,manager_ingroup_set,on_hook_ring_time,on_hook_agent,campaign_grade) values('$VD_login','$server_ip','$session_id','$SIP_user','PAUSED','','$VD_campaign','','','','$random','$NOW_TIME','$tsNOW_TIME','$NOW_TIME','$user_level', '$campaign_weight', '$calls_today','$NOW_TIME','N','N','$phone_ring_timeout','$on_hook_agent','$campaign_grade');";
				if ($DB) {echo "$stmt\n";}
				$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01047',$VD_login,$server_ip,$session_name,$one_mysql_log);}
				$affected_rows = mysqli_affected_rows($link);
				echo "<!-- new vicidial_live_agents record inserted: |$affected_rows| -->\n";

				if ($enable_queuemetrics_logging > 0)
					{
					$QM_LOGIN = 'AGENTLOGIN';
					$QM_PHONE = "$VD_login@agents";
					if ( ($queuemetrics_loginout=='CALLBACK') or ($queuemetrics_loginout=='NONE') )
						{
						$QM_LOGIN = 'AGENTCALLBACKLOGIN';
						$QM_PHONE = "$SIP_user_DiaL";
						}
					$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass");
					if (!$linkB) {die(_QXZ("Could not connect: ")."$queuemetrics_server_ip|$queuemetrics_login" . mysqli_connect_error());}
					mysqli_select_db($linkB, "$queuemetrics_dbname");

					if ($queuemetrics_loginout!='NONE')
						{
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='$VD_campaign',agent='Agent/$VD_login',verb='$QM_LOGIN',data1='$QM_PHONE',serverid='$queuemetrics_log_id',data4='$qm_phone_environment';";
						if ($DB) {echo "$stmt\n";}
						$rslt=mysql_to_mysqli($stmt, $linkB);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01048',$VD_login,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						echo "<!-- queue_log $QM_LOGIN entry added: $VD_login|$affected_rows|$QM_PHONE -->\n";
						}

					$pause_typeSQL='';
					if ($queuemetrics_pause_type > 0)
						{$pause_typeSQL=",data5='AGENT'";}
					$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='NONE',agent='Agent/$VD_login',verb='PAUSEALL',serverid='$queuemetrics_log_id',data4='$qm_phone_environment' $pause_typeSQL;";
					if ($DB) {echo "$stmt\n";}
					$rslt=mysql_to_mysqli($stmt, $linkB);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01049',$VD_login,$server_ip,$session_name,$one_mysql_log);}
					$affected_rows = mysqli_affected_rows($linkB);
					echo "<!-- queue_log PAUSE entry added: $VD_login|$affected_rows -->\n";

					if ($queuemetrics_addmember_enabled > 0)
						{
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimE',call_id='NONE',queue='$VD_campaign',agent='Agent/$VD_login',verb='ADDMEMBER2',data1='$QM_PHONE',serverid='$queuemetrics_log_id',data4='$qm_phone_environment';";
						if ($DB) {echo "$stmt\n";}
						$rslt=mysql_to_mysqli($stmt, $linkB);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01072',$VD_login,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						echo "<!-- queue_log ADDMEMBER2 entry added: $VD_login|$affected_rows -->\n";
						}

					mysqli_close($linkB);
					mysqli_select_db($link, "$VARDB_database");
					}
				}
			}
		else
			{

                    require_once 'elements/no_leads_hopper.php';
//			echo "<title>"._QXZ("Agent web client: Campaign Login")."</title>\n";
//			echo "</head>\n";
//            echo "<body class=\"signup-page\" onresize=\"browser_dimensions();\" onload=\"browser_dimensions();\">\n";
//			echo '<div class="signup-box">
//        			<div class="logo text-center">
//					<img class="logo" src="./images/logo.png"  alt="logo" style="width:100%" />
//					</div>
//					<div class="card">
//					<div class="body">';
//            echo "<form class='form-horizontal' action=\"$PHP_SELF\" method=\"post\">\n";
//            echo "<input type=\"hidden\" name=\"DB\" value=\"$DB\" />\n";
//            echo "<input type=\"hidden\" name=\"JS_browser_height\" id=\"JS_browser_height\" value=\"\" />\n";
//            echo "<input type=\"hidden\" name=\"JS_browser_width\" id=\"JS_browser_width\" value=\"\" />\n";
//            echo "<input type=\"hidden\" name=\"phone_login\" value=\"$phone_login\" />\n";
//            echo "<input type=\"hidden\" name=\"phone_pass\" value=\"$phone_pass\" />\n";
//			echo '<div class="msg"><font size=5>Campaign Login</font></div>';
//            echo "<div class=\" alert alert-danger\">Sorry, there are no leads in the hopper for this campaign</div>";
//			echo '<div class="input-group">
//                 <span class="input-group-addon">
//                     <i class="material-icons">person</i>
//                 </span>';
//            echo " <div class=\"form-line\"> <input class=\"form-control\" type=\"text\" name=\"VD_login\" size=\"10\" maxlength=\"20\" value=\"$VD_login\" placeholder=\"Username\"/></div></div>";
//			echo '<div class="input-group">
//                 <span class="input-group-addon">
//                     <i class="material-icons">lock</i>
//                 </span>';
//            echo " <div class=\"form-line\"><input class=\"form-control\" type=\"password\" name=\"VD_pass\" size=\"10\" maxlength=\"20\" value=\"$VD_pass\" placeholder=\"Password\" /></div></div>";
//			echo '<div class="input-group">
//                 <span class="input-group-addon">
//                     <i class="material-icons">widgets</i>
//                 </span>';
//            echo " <div class=\"form-line\"><span id=\"LogiNCamPaigns\">$camp_form_code</span></div></div>";
//			echo "<center><input type=\"submit\" name=\"SUBMIT\" value=\"Submit\" class=\"btn btn-primary waves-effect\" /> ";
//			echo "<span id=\"LogiNReseT\"><input type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" class=\"btn btn-primary waves-effect\"></span> ";
//			echo "</center>";
//            echo "</form></div></div>";
//			echo "</body>\n\n";
//			echo "</html>\n\n";
			exit;
			}
		if (strlen($session_id) < 1)
			{
			echo "<title>"._QXZ("Agent web client: Campaign Login")."</title>\n";
			echo "</head>\n";
            echo "<body class=\"signup-page\" onresize=\"browser_dimensions();\" onload=\"browser_dimensions();\">\n";
			 echo '<div class="signup-box">
        			<div class="logo text-center">
					<img class="logo" src="./images/logo.png"  alt="logo" style="width:100%" />
        			</div>
					<div class="card">
					<div class="body">';
            echo "<form action=\"$PHP_SELF\" method=\"post\" />\n";
            echo "<input type=\"hidden\" name=\"DB\" value=\"$DB\" />\n";
            echo "<input type=\"hidden\" name=\"JS_browser_height\" id=\"JS_browser_height\" value=\"\" />\n";
            echo "<input type=\"hidden\" name=\"JS_browser_width\" id=\"JS_browser_width\" value=\"\" />\n";
            echo "<input type=\"hidden\" name=\"phone_login\" value=\"$phone_login\" />\n";
            echo "<input type=\"hidden\" name=\"phone_pass\" value=\"$phone_pass\" />\n";
			echo '<div class="msg"><font size=5>Re-Login</font></div>';
            echo "<div class=\"alert alert-danger\">Sorry, there are no available sessions|$session_id|$server_ip|$extension|$SIP_user|</div>";
			echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>';
            echo "<div class=\"form-line\"><input class=\"form-control\" type=\"text\" name=\"VD_login\" size=\"10\" maxlength=\"20\" value=\"$VD_login\" placeholder=\"Username\" /></div></div>";
			 echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>';
            echo "<div class=\"form-line\"><input class=\"form-control\" type=\"password\" name=\"VD_pass\" size=\"10\" maxlength=\"20\" value=\"$VD_pass\" placeholder=\"Password\"  /></div></div>";
			 echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">widgets</i>
                                    </span>';
            echo "<div class=\"form-line\"><span id=\"LogiNCamPaigns\">$camp_form_code</span></div></div>";
            echo "<center><input type=\"submit\" name=\"SUBMIT\" value=\"Submit\" class=\"btn btn-primary waves-effect\" /> ";
			echo "<span id=\"LogiNReseT\"><input type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" class=\"btn btn-primary waves-effect\"></span> ";
			echo "</center>";
			echo "</FORM></div></div>";
			echo "</body>\n\n";
			echo "</html>\n\n";
			exit;
			}

		if (preg_match('/MSIE/',$browser))
			{
			$useIE=1;
			echo "<!-- client web browser used: MSIE |$browser|$useIE| -->\n";
			}
		else
			{
			$useIE=0;
			echo "<!-- client web browser used: W3C-Compliant |$browser|$useIE| -->\n";
			}

		$StarTtimE = date("U");
		$NOW_TIME = date("Y-m-d H:i:s");
		##### Agent is going to log in so insert the vicidial_agent_log entry now
		$stmt="INSERT INTO vicidial_agent_log (user,server_ip,event_time,campaign_id,pause_epoch,pause_sec,wait_epoch,user_group,sub_status,pause_type) values('$VD_login','$server_ip','$NOW_TIME','$VD_campaign','$StarTtimE','0','$StarTtimE','$VU_user_group','LOGIN','AGENT');";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01050',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$affected_rows = mysqli_affected_rows($link);
		$agent_log_id = mysqli_insert_id($link);
		echo "<!-- vicidial_agent_log record inserted: |$affected_rows|$agent_log_id| -->\n";

		##### update vicidial_campaigns to show agent has logged in
		$stmt="UPDATE vicidial_campaigns set campaign_logindate='$NOW_TIME' where campaign_id='$VD_campaign';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01064',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$VCaffected_rows = mysqli_affected_rows($link);
		echo "<!-- vicidial_campaigns campaign_logindate updated: |$VCaffected_rows|$NOW_TIME| -->\n";

		if ($enable_queuemetrics_logging > 0)
			{
			$StarTtimEpause = ($StarTtimE + 1);
			$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass");
			if (!$linkB) {die(_QXZ("Could not connect: ")."$queuemetrics_server_ip|$queuemetrics_login" . mysqli_connect_error());}
			mysqli_select_db($linkB, "$queuemetrics_dbname");

			$pause_typeSQL='';
			if ($queuemetrics_pause_type > 0)
				{$pause_typeSQL=",data5='AGENT'";}

			$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtimEpause',call_id='NONE',queue='NONE',agent='Agent/$VD_login',verb='PAUSEREASON',data1='LOGIN',data3='$QM_PHONE',serverid='$queuemetrics_log_id'$pause_typeSQL;";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $linkB);
		if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'01063',$VD_login,$server_ip,$session_name,$one_mysql_log);}
			$affected_rows = mysqli_affected_rows($linkB);
			echo "<!-- queue_log PAUSEREASON LOGIN entry added: $VD_login|$affected_rows|$QM_PHONE -->\n";

			mysqli_close($linkB);
			mysqli_select_db($link, "$VARDB_database");
			}

		$stmt="UPDATE vicidial_live_agents SET agent_log_id='$agent_log_id' where user='$VD_login';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01061',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$VLAaffected_rows_update = mysqli_affected_rows($link);

		$stmt="UPDATE vicidial_users SET shift_override_flag='0' where user='$VD_login' and shift_override_flag='1';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01057',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		$VUaffected_rows = mysqli_affected_rows($link);

		$S='*';
		$D_s_ip = explode('.', $server_ip);
		if (strlen($D_s_ip[0])<2) {$D_s_ip[0] = "0$D_s_ip[0]";}
		if (strlen($D_s_ip[0])<3) {$D_s_ip[0] = "0$D_s_ip[0]";}
		if (strlen($D_s_ip[1])<2) {$D_s_ip[1] = "0$D_s_ip[1]";}
		if (strlen($D_s_ip[1])<3) {$D_s_ip[1] = "0$D_s_ip[1]";}
		if (strlen($D_s_ip[2])<2) {$D_s_ip[2] = "0$D_s_ip[2]";}
		if (strlen($D_s_ip[2])<3) {$D_s_ip[2] = "0$D_s_ip[2]";}
		if (strlen($D_s_ip[3])<2) {$D_s_ip[3] = "0$D_s_ip[3]";}
		if (strlen($D_s_ip[3])<3) {$D_s_ip[3] = "0$D_s_ip[3]";}
		$server_ip_dialstring = "$D_s_ip[0]$S$D_s_ip[1]$S$D_s_ip[2]$S$D_s_ip[3]$S";

		##### grab the datails of all active scripts in the system
		$stmt="SELECT script_id,script_name FROM vicidial_scripts WHERE active='Y' order by script_id limit 1000;";
		$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01051',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		if ($DB) {echo "$stmt\n";}
		$MM_scripts = mysqli_num_rows($rslt);
		$e=0;
		while ($e < $MM_scripts)
			{
			$row=mysqli_fetch_row($rslt);
			$MMscriptid[$e] =$row[0];
			$MMscriptname[$e] = urlencode($row[1]);
			$MMscriptids = "$MMscriptids'$MMscriptid[$e]',";
      if(isset($MMscriptnames)) {
          $MMscriptnames = "$MMscriptnames'$MMscriptname[$e]',";
      } else {
        $MMscriptnames = '';
      }
			$e++;
			}
		$MMscriptids = substr("$MMscriptids", 0, -1);
		$MMscriptnames = substr("$MMscriptnames", 0, -1);


		##### BEGIN vicidial_list FIELD LENGTH LOOKUP #####
		$MAXvendor_lead_code =		'20';
		$MAXphone_code =			'10';
		$MAXphone_number =			'18';
		$MAXtitle =					'4';
		$MAXfirst_name =			'30';
		$MAXmiddle_initial =		'1';
		$MAXlast_name =				'30';
		$MAXaddress1 =				'100';
		$MAXaddress2 =				'100';
		$MAXaddress3 =				'100';
		$MAXcity =					'50';
		$MAXstate =					'2';
		$MAXprovince =				'50';
		$MAXpostal_code =			'10';
		$MAXalt_phone =				'12';
		$MAXemail =					'70';
		$MAXsecurity_phrase =		'100';

		$stmt = "SHOW COLUMNS FROM vicidial_list;";
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'01087',$VD_login,$server_ip,$session_name,$one_mysql_log);}
		if ($DB) {echo "$stmt\n";}
		$scvl_ct = mysqli_num_rows($rslt);
		$s=0;
		while ($scvl_ct > $s)
			{
			$row=mysqli_fetch_row($rslt);
			$vl_field =	$row[0];
			$vl_type = preg_replace("/[^0-9]/",'',$row[1]);
			if (strlen($vl_type) > 0)
				{
				if ( ($vl_field == 'vendor_lead_code') and ($MAXvendor_lead_code != $vl_type) )
					{$MAXvendor_lead_code = $vl_type;}
				if ( ($vl_field == 'phone_code') and ($MAXphone_code != $vl_type) )
					{$MAXphone_code = $vl_type;}
				if ( ($vl_field == 'phone_number') and ($MAXphone_number != $vl_type) )
					{$MAXphone_number = $vl_type;}
				if ( ($vl_field == 'title') and ($MAXtitle != $vl_type) )
					{$MAXtitle = $vl_type;}
				if ( ($vl_field == 'first_name') and ($MAXfirst_name != $vl_type) )
					{$MAXfirst_name = $vl_type;}
				if ( ($vl_field == 'middle_initial') and ($MAXmiddle_initial != $vl_type) )
					{$MAXmiddle_initial = $vl_type;}
				if ( ($vl_field == 'last_name') and ($MAXlast_name != $vl_type) )
					{$MAXlast_name = $vl_type;}
				if ( ($vl_field == 'address1') and ($MAXaddress1 != $vl_type) )
					{$MAXaddress1 = $vl_type;}
				if ( ($vl_field == 'address2') and ($MAXaddress2 != $vl_type) )
					{$MAXaddress2 = $vl_type;}
				if ( ($vl_field == 'address3') and ($MAXaddress3 != $vl_type) )
					{$MAXaddress3 = $vl_type;}
				if ( ($vl_field == 'city') and ($MAXcity != $vl_type) )
					{$MAXcity = $vl_type;}
				if ( ($vl_field == 'state') and ($MAXstate != $vl_type) )
					{$MAXstate = $vl_type;}
				if ( ($vl_field == 'province') and ($MAXprovince != $vl_type) )
					{$MAXprovince = $vl_type;}
				if ( ($vl_field == 'postal_code') and ($MAXpostal_code != $vl_type) )
					{$MAXpostal_code = $vl_type;}
				if ( ($vl_field == 'alt_phone') and ($MAXalt_phone != $vl_type) )
					{$MAXalt_phone = $vl_type;}
				if ( ($vl_field == 'email') and ($MAXemail != $vl_type) )
					{$MAXemail = $vl_type;}
				if ( ($vl_field == 'security_phrase') and ($MAXsecurity_phrase != $vl_type) )
					{$MAXsecurity_phrase = $vl_type;}
				}
			$s++;
			}
		##### END vicidial_list FIELD LENGTH LOOKUP #####
		}
	}


### SCREEN WIDTH AND HEIGHT CALCULATIONS ###
### DO NOT EDIT! ###
if ($stretch_dimensions > 0)
	{
	if ($agent_status_view < 1)
		{
		if ($JS_browser_width >= 510)
			{$BROWSER_WIDTH = ($JS_browser_width - 80);}
		}
	else
		{
		if ($JS_browser_width >= 730)
			{$BROWSER_WIDTH = ($JS_browser_width - 300);}
		}
	if ($JS_browser_height >= 340)
		{$BROWSER_HEIGHT = ($JS_browser_height - 40);}
	}
if ($agent_fullscreen=='Y')
	{
	$BROWSER_WIDTH = ($JS_browser_width - 10);
	$BROWSER_HEIGHT = $JS_browser_height;
	}
$MASTERwidth=($BROWSER_WIDTH - 340);
$MASTERheight=($BROWSER_HEIGHT - 200);
if ($MASTERwidth < 430) {$MASTERwidth = '430';}
if ($MASTERheight < 300) {$MASTERheight = '300';}
if ($per_call_notes == 'ENABLED')
	{
	if ($MASTERheight < 340) {$MASTERheight = '340';}
	}
if ($webphone_location == 'bar') {$MASTERwidth = ($MASTERwidth + $webphone_height);}

$CAwidth =  ($MASTERwidth + 340);	# 770 - cover all (none-in-session, customer hunngup, etc...)
$SBwidth =	($MASTERwidth + 331);	# 761 - SideBar starting point
$MNwidth =  ($MASTERwidth + 330);	# 760 - main frame
$XFwidth =  ($MASTERwidth + 320);	# 750 - transfer/conference
$HCwidth =  ($MASTERwidth + 310);	# 740 - hotkeys and callbacks
$CQwidth =  ($MASTERwidth + 300);	# 730 - calls in queue listings
$AMwidth =  ($MASTERwidth + 270);	# 700 - refresh links
$SCwidth =  ($MASTERwidth + 230);	# 670 - live call seconds counter, sidebar link
$PDwidth =  ($MASTERwidth + 210);	# 650 - preset-dial links
$MUwidth =  ($MASTERwidth + 180);	# 610 - agent mute
$SSwidth =  ($MASTERwidth + 176);	# 606 - scroll script
$SDwidth =  ($MASTERwidth + 170);	# 600 - scroll script, customer data and calls-in-session
$HKwidth =  ($MASTERwidth + 20);	# 450 - Hotkeys button
$HSwidth =  ($MASTERwidth + 1);		# 431 - Header spacer
$PBwidth =  ($MASTERwidth + 0);		# 430 - Presets list
$CLwidth =  ($MASTERwidth - 120);	# 310 - Calls in queue link


$GHheight =  ($MASTERheight + 1260);# 1560 - Gender Hide span
$DBheight =  ($MASTERheight + 260);	# 560 - Debug span
$WRheight =  ($MASTERheight + 210);	# 510 - Warning boxes
$CQheight =  ($MASTERheight + 140);	# 440 - Calls in queue section
$SLheight =  ($MASTERheight + 122);	# 422 - SideBar link, Agents view link
$QLheight =  ($MASTERheight + 112);	# 412 - Calls in queue link
$HKheight =  ($MASTERheight + 105);	# 405 - HotKey active Button
$AMheight =  ($MASTERheight + 100);	# 400 - Agent mute buttons
$PBheight =  ($MASTERheight + 90);	# 390 - preset dial links
$MBheight =  ($MASTERheight + 65);	# 365 - Manual Dial Buttons
$CBheight =  ($MASTERheight + 50);	# 350 - Agent Callback, pause code, volume control Buttons and agent status
$SSheight =  ($MASTERheight + 31);	# 331 - script content
$HTheight =  ($MASTERheight + 10);	# 310 - transfer frame, callback comments and hotkey
$BPheight =  ($MASTERheight - 250);	# 50 - bottom buffer, Agent Xfer Span
$SCheight =	 49;	# 49 - seconds on call display
$SFheight =	 65;	# 65 - height of the script and form contents
$SRheight =	 69;	# 69 - height of the script and form refrech links
$CHheight =  ($JS_browser_height - 50);
if ($webphone_location == 'bar')
	{
	$SCheight = ($SCheight + $webphone_height);
#	$SFheight = ($SFheight + $webphone_height);
	$SRheight = ($SRheight + $webphone_height);
	}
$AVTheight = '0';
if ($is_webphone) {$AVTheight = '20';}


################################################################
### BEGIN - build the callback calendar (12 months)          ###
################################################################
define ('ADAY', (60*60*24));
$CdayARY = getdate();
$Cmon = $CdayARY['mon'];
$Cyear = $CdayARY['year'];
$CTODAY = date("Y-m");
$CTODAYmday = date("j");
$CINC=0;
$live_days=0;
$limit_days=999;
if ($callback_days_limit > 0)
	{$limit_days=$callback_days_limit;}

$Cmonths = Array('0','January','February','March','April','May','June',
				'July','August','September','October','November','December');
$Cdays = Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');

$CCAL_OUT = '';

$CCAL_OUT .= "<table class=\"table table-responsive\" >";

while ($CINC < 12)
	{
	if ( ($CINC == 0) || ($CINC == 4) ||($CINC == 8) )
		{$CCAL_OUT .= "<tr>";}

	$CCAL_OUT .= "<td valign=\"top\">";

	$CYyear = $Cyear;
	$Cmonth=	($Cmon + $CINC);
	if ($Cmonth > 12)
		{
		$Cmonth = ($Cmonth - 12);
		$CYyear++;
		}
	$Cstart= mktime(11,0,0,$Cmonth,1,$CYyear);
	$CfirstdayARY = getdate($Cstart);
	#echo "|$Cmon|$Cmonth|$CINC|\n";
	$CPRNTDAY = date("Y-m", $Cstart);

	$CCAL_OUT .= "<table border=\"1\" cellpadding=\"1\" bordercolor=\"000000\" cellspacing=\"0\" bgcolor=\"white\">";
	$CCAL_OUT .= "<tr>";
	$CCAL_OUT .= "<td colspan=\"7\" bordercolor=\"#ffffff\" bgcolor=\"#FFFFCC\">";
	$CCAL_OUT .= "<div align=\"center\"><font color=\"#000066\"><b><font face=\"Arial, Helvetica, sans-serif\" size=\"2\">";
	$CCAL_OUT .= $Cmonths[$CfirstdayARY['mon']]." $CfirstdayARY[year]";
	$CCAL_OUT .= "</font></b></font></div>";
	$CCAL_OUT .= "</td>";
	$CCAL_OUT .= "</tr>";

	foreach($Cdays as $Cday)
		{
		$CDCLR="#ffffff";
		$CCAL_OUT .= "<td bordercolor=\"$CDCLR\">";
		$CCAL_OUT .= "<div align=\"center\"><font color=\"#000066\"><b><font face=\"Arial, Helvetica, sans-serif\" size=\"1\">";
		$CCAL_OUT .= "$Cday";
		$CCAL_OUT .= "</font></b></font></div>";
		$CCAL_OUT .= "</td>";
		}

	for( $Ccount=0;$Ccount<(6*7);$Ccount++)
		{
		$Cdayarray = getdate($Cstart);
		if((($Ccount) % 7) == 0)
			{
			if($Cdayarray['mon'] != $CfirstdayARY['mon'])
				break;
			$CCAL_OUT .= "</tr><tr>";
			}
		if($Ccount < $CfirstdayARY['wday'] || $Cdayarray['mon'] != $Cmonth)
			{
			$CCAL_OUT .= "<td bordercolor=\"#ffffff\"><font color=\"#000066\"><b><font face=\"Arial, Helvetica, sans-serif\" size=\"1\">&nbsp;</font></b></font></td>";
			}
		else
			{
			if( ($Cdayarray['mday'] == $CTODAYmday) and ($CPRNTDAY == $CTODAY) )
				{
				$CPRNTmday = $Cdayarray['mday'];
				if ($CPRNTmday < 10) {$CPRNTmday = "0$CPRNTmday";}
				if ($limit_days > $live_days)
					{
					$CB_date_onclick="onclick=\"CB_date_pick('$CPRNTDAY-$CPRNTmday');return false;\"";
					$CBL = "<a href=\"#\" $CB_date_onclick>";
					$CEL = "</a>";
					}
				else
					{$CBL='';   $CEL=''; $CB_date_onclick='';}
				$CCAL_OUT .= "<td bgcolor=\"#FFCCCC\" bordercolor=\"#FFCCCC\" $CB_date_onclick>";
				$CCAL_OUT .= "<div align=\"center\"><font face=\"Arial, Helvetica, sans-serif\" size=\"1\">";
				$CCAL_OUT .= "$CBL$Cdayarray[mday]$CEL";
				$CCAL_OUT .= "</font></div>";
				$CCAL_OUT .= "</td>";
				$Cstart += ADAY;
				$live_days++;
				}
			else
				{
				$CDCLR="#ffffff";
				if ( ($Cdayarray['mday'] < $CTODAYmday) and ($CPRNTDAY == $CTODAY) )
					{
					$CDCLR="$MAIN_COLOR";
					$CBL = '';
					$CEL = '';
					$CB_date_onclick='';
					}
				else
					{
					$CPRNTmday = $Cdayarray['mday'];
					if ($CPRNTmday < 10) {$CPRNTmday = "0$CPRNTmday";}
					if ($limit_days > $live_days)
						{
						$CB_date_onclick="onclick=\"CB_date_pick('$CPRNTDAY-$CPRNTmday');return false;\"";
						$CBL = "<a href=\"#\" $CB_date_onclick>";
						$CEL = "</a>";
						}
					else
						{$CBL='';   $CEL=''; $CB_date_onclick='';}
					$live_days++;
					}

				$CCAL_OUT .= "<td bgcolor=\"$CDCLR\" bordercolor=\"#ffffff\" $CB_date_onclick>";
				$CCAL_OUT .= "<div align=\"center\"><font face=\"Arial, Helvetica, sans-serif\" size=1>";
				$CCAL_OUT .= "$CBL$Cdayarray[mday]$CEL";
				$CCAL_OUT .= "</font></div>";
				$CCAL_OUT .= "</td>";
				$Cstart += ADAY;
				}
			}
		}
	$CCAL_OUT .= "</tr>";
	$CCAL_OUT .= "</table>";
	$CCAL_OUT .= "</td>";

	if ( ($CINC == 3) || ($CINC == 7) ||($CINC == 11) )
		{$CCAL_OUT .= "</tr>";}
	$CINC++;
	}

$CCAL_OUT .= "</table>";

#echo "$CCAL_OUT\n";
################################################################
### END - build the callback calendar (12 months)            ###
################################################################

$zi = 2;
    require_once 'elements/home.php';
    exit;
?>
