<?php if (!checkRole('campaigns', 'delete')) {
    no_permission();
} else { ?>
    <?php

    extract($_GET);
    $LOGallowed_campaignsSQL = '';
    $SQLdate = date('Y-m-d');
    $stmt = "SELECT count(*) from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_row($rslt);
    if ($row[0] < 1) {
        $msg = "<div  class='alert bg-red'>
    <h4>" . _QXZ("CAMPAIGN NOT FOUND") . ": $campaign_id</h4>
   </div>";
    } else {
        $stmtA = "DELETE from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL limit 1;";
        $rslt = mysql_to_mysqli($stmtA, $link);

        $stmt = "DELETE from vicidial_campaign_agents where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_live_agents where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_statuses where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_hotkeys where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "INSERT INTO vicidial_callbacks_archive SELECT * from vicidial_callbacks where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_callbacks where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_stats where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_stats_debug where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_lead_recycle where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_server_stats where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_server_trunks where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_pause_codes where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaigns_list_mix where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_xfer_presets where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_xfer_stats where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $stmt = "DELETE from vicidial_campaign_cid_areacodes where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

        $msg = "<div  class='alert bg-teal'>
    <h4>" . _QXZ("REMOVING LIST HOPPER LEADS FROM OLD CAMPAIGN HOPPER") . " ($campaign_id) -
   ";
        $stmt = "DELETE from vicidial_hopper where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
        $rslt = mysql_to_mysqli($stmt, $link);

### LOG INSERTION Admin Log Table ###
        $SQL_log = "$stmtA|";
        $SQL_log = preg_replace('/;/', '', $SQL_log);
        $SQL_log = addslashes($SQL_log);
        $stmt = "INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='DELETE', record_id='$campaign_id', event_code='ADMIN DELETE CAMPAIGN', event_sql=\"$SQL_log\", event_notes='';";
        if ($DB) {
            echo "|$stmt|\n";
        }
        $rslt = mysql_to_mysqli($stmt, $link);

        $msg = "CAMPAIGN DELETION COMPLETED : $campaign_id</h4></div>";
        redirect('campaigns');
    }
}
    ?>
