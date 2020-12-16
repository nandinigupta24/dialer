<?php

# admin.php - VICIDIAL administration page
#
# Copyright (C) 2019  Matt Florell <vicidial@gmail.com>    LICENSE: AGPLv2
# 

$startMS = microtime();

require("dbconnect_mysqli.php");
require("functions.php");





/*Music ON HOLD*/
$moh_name = 'TestAudioVolume5';
$active = 'Y';
$random = 'N';
$user_group = 'TestAudioVolumn';
$moh_id = 'TestAudioVolume5';
//$filename = 'TestAudioVolumn';
$filename = 'welcome_message';

$stmt = "UPDATE vicidial_music_on_hold set moh_name='$moh_name',active='$active',random='$random',user_group='$user_group' where moh_id='$moh_id';";
$rslt = mysql_to_mysqli($stmt, $link);
$stmtLIST = $stmt;

$stmt = "SELECT filename,rank from vicidial_music_on_hold_files where moh_id='$moh_id' order by rank;";
$rsltx = mysql_to_mysqli($stmt, $link);
$mohfiles_to_print = mysqli_num_rows($rsltx);
$ranks = ($mohfiles_to_print + 1);
$o = 0;
while ($mohfiles_to_print > $o) {
    $rowx = mysqli_fetch_row($rsltx);
    $mohfiles[$o] = $rowx[0];
    $mohranks[$o] = $rowx[1];
    $o++;
}

$o = 0;
while ($mohfiles_to_print > $o) {
    $new_rank = 0;
    $Ffilename = $mohfiles[$o];
    if (isset($_GET[$Ffilename])) {
        $new_rank = $_GET[$Ffilename];
    } elseif (isset($_POST[$Ffilename])) {
        $new_rank = $_POST[$Ffilename];
    }

    $stmt = "UPDATE vicidial_music_on_hold_files set rank='$new_rank' where moh_id='$moh_id' and filename='$mohfiles[$o]';";
    $rslt = mysql_to_mysqli($stmt, $link);
    $stmtLIST .= "|$stmt";
    $o++;
}

if (strlen($filename) > 0) {
    $stmt = "INSERT INTO vicidial_music_on_hold_files set filename='$filename',rank='$ranks',moh_id='$moh_id';";
    $rslt = mysql_to_mysqli($stmt, $link);
    $stmtLIST .= "|$stmt";
}

$stmtA = "UPDATE servers SET rebuild_conf_files='Y',rebuild_music_on_hold='Y',sounds_update='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y';";
$rslt = mysql_to_mysqli($stmtA, $link);

echo "<br>" . _QXZ("MUSIC ON HOLD ENTRY MODIFIED") . ": $moh_id\n";

### LOG INSERTION Admin Log Table ###
$SQL_log = "$stmtLIST|$stmtA|";
$SQL_log = preg_replace('/;/', '', $SQL_log);
$SQL_log = addslashes($SQL_log);
$stmt = "INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='MOH', event_type='MODIFY', record_id='$moh_id', event_code='ADMIN MODIFY MOH', event_sql=\"$SQL_log\", event_notes='';";
if ($DB) {
    echo "|$stmt|\n";
}
$rslt = mysql_to_mysqli($stmt, $link);
?>
