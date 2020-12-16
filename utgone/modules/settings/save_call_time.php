<?php if(!checkRole('settings', 'edit')){ no_permission(); } else {?>
<?php

##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
$stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_user_groups' and active='1';";
$rslt=mysql_to_mysqli($stmt, $link);
$voi_ct = mysqli_num_rows($rslt);
if ($voi_ct > 0)
{
$row=mysqli_fetch_row($rslt);
$user_group = ($row[0] + 1);

$stmt="UPDATE vicidial_override_ids SET value='$user_group' where id_table='vicidial_user_groups' and active='1';";
$rslt=mysql_to_mysqli($stmt, $link);
}
##### END ID override optional section #####
$stmt="SELECT count(*) from vicidial_user_groups where user_group='$user_group';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
if ($row[0] > 0)
{

$msg =  "<div class='alert bg-red'>
<h4>USER GROUP NOT ADDED - there is already a user group entry with this name</h4>
</div>";
}
else
{
if ( (strlen($user_group) < 2) or (strlen($group_name) < 2) )
{

$msg =  "<div class='alert bg-red' >
    <h4>"._QXZ("USER GROUP NOT ADDED - Please go back and look at the data you entered <br> Group name and description must be at least 2 characters in length")."</h4>
   </div>";
}
else
{
$allowed_user_group_insert_SQL = '---ALL---';
 $allowed_campaign_insert_SQL = implode(' ', $_POST['allowed_campaigns']);
// $allowed_campaign_insert_SQL = '-ALL-CAMPAIGNS-';
# if admin user's user group does not have --ALL-- then add this new user group to their user group's allowable user groups
if ($admin_viewable_groupsALL < 1)
	{
	$UPDATEadmin_viewable_groups =	$LOGadmin_viewable_groups;
	$UPDATEadmin_viewable_groups = preg_replace("/ $/"," $user_group ",$UPDATEadmin_viewable_groups);
	$LOGadmin_viewable_groups = $UPDATEadmin_viewable_groups;

	$stmt="UPDATE vicidial_user_groups SET admin_viewable_groups='$UPDATEadmin_viewable_groups' where user_group='$LOGuser_group';";
	$rslt=mysql_to_mysqli($stmt, $link);

	$allowed_user_group_insert_SQL = " $user_group -";

	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
	$LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	$whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
	}
if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
	{
	$allowed_campaign_insert_SQL = $LOGallowed_campaigns;
	}

$stmt="INSERT INTO vicidial_user_groups(user_group,group_name,allowed_campaigns,admin_viewable_groups) values('$user_group','$group_name','$allowed_campaign_insert_SQL','$allowed_user_group_insert_SQL');";
$rslt=mysql_to_mysqli($stmt, $link);


$msg =  "<div  class='alert bg-teal'>
    <h4>"._QXZ("USER GROUP ADDED").": $user_group</h4>
   </div><br>";

### LOG INSERTION Admin Log Table ###
$SQL_log = "$stmt|";
$SQL_log = preg_replace('/;/', '', $SQL_log);
$SQL_log = addslashes($SQL_log);
$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERGROUPS', event_type='ADD', record_id='$user_group', event_code='ADMIN ADD USER GROUP', event_sql=\"$SQL_log\", event_notes='';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);

###############################################################
##### START SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
$stmt = "SELECT enable_vtiger_integration,vtiger_server_ip,vtiger_dbname,vtiger_login,vtiger_pass,vtiger_url FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$ss_conf_ct = mysqli_num_rows($rslt);
if ($ss_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$enable_vtiger_integration =	$row[0];
	$vtiger_server_ip	=			$row[1];
	$vtiger_dbname =				$row[2];
	$vtiger_login =					$row[3];
	$vtiger_pass =					$row[4];
	$vtiger_url =					$row[5];
	}
##### END SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
#############################################################

if ($enable_vtiger_integration > 0)
	{
	### connect to your vtiger database
	#$linkV=mysql_connect("$vtiger_server_ip", "$vtiger_login","$vtiger_pass");
	#if (!$linkV) {die("Could not connect: $vtiger_server_ip|$vtiger_dbname|$vtiger_login|$vtiger_pass" . mysqli_error());}
	#echo 'Connected successfully';
	#mysql_select_db("$vtiger_dbname", $linkV);
	$linkV=mysqli_connect("$vtiger_server_ip", "$vtiger_login", "$vtiger_pass", "$vtiger_dbname");
	if (!$linkV)
		{
		die('MySQL '._QXZ("connect ERROR").': ' . mysqli_connect_error());
		}


	######################################
	##### BEGIN Add/Update group info in Vtiger
	$stmt="SELECT count(*) from vtiger_groups where groupname='$user_group';";
	$rslt=mysql_to_mysqli($stmt, $linkV);
	if ($DB) {echo "$stmt\n";}
	if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
	$row=mysqli_fetch_row($rslt);
	$group_found_count = $row[0];

	### group exists in vtiger, update it
	if ($group_found_count > 0)
		{
		$stmt="SELECT groupid from vtiger_groups where groupname='$user_group';";
		$rslt=mysql_to_mysqli($stmt, $linkV);
		if ($DB) {echo "$stmt\n";}
		if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
		$row=mysqli_fetch_row($rslt);
		$groupid = $row[0];
		}

	### user doesn't exist in vtiger, insert it
	else
		{
		#### BEGIN CREATE NEW GROUP RECORD IN VTIGER
		# Get next available id from vtiger_users_seq to use as groupid
		$stmt="SELECT id from vtiger_users_seq;";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $linkV);
		$row=mysqli_fetch_row($rslt);
		$groupid = ($row[0] + 1);
		if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

		# Increase next available groupid with 1 so next record gets proper id
		$stmt="UPDATE vtiger_users_seq SET id = '$groupid';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $linkV);
		if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

		$stmtA = "INSERT INTO vtiger_groups SET groupid='$groupid',groupname='$user_group',description='$group_name';";
		if ($DB) {echo "|$stmtA|\n";}
		$rslt=mysql_to_mysqli($stmtA, $linkV);
		if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

		#### END CREATE NEW GROUP RECORD IN VTIGER
		}
	##### END Add/Update group info in Vtiger
	######################################
	}
}
}
} ?>
