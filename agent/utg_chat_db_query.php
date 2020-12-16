<?php

# chat_db_query.php
#
# Copyright (C) 2017  Joe Johnson, Matt Florell <vicidial@gmail.com>    LICENSE: AGPLv2
#
# Called by vdc_chat_display.php and vicidial_chat_agent.js.  This contains all actions taken by the
# agent's interface when chatting with customers, other agents, and managers, through
# vdc_chat_display.php and vicidial_chat_agent.js.  Sample actions include creating and ending
# agent-to-agent chats, refreshing the chat window, and sending messages to the database to be
# displayed.
#
# Builds:
# 150901-2348 - First build
# 151218-1052 - Added missing translation code and user auth
# 151231-0841 - Added agent_allowed_chat_groups setting
# 160107-2318 - Bug fix for agent ending chat with manager
# 160108-2300 - Changed some mysqli_query to mysql_to_mysqli for consistency
# 160303-0051 - Added code for chat transfers
# 160719-1043 - Bug fixes for non-owner chats, and other issues
# 160818-1236 - Added chat colors, usre nickname and scrolling
# 160831-2225 - Agent-to-agent interface now color-coded using system settings, if desired
# 161217-0824 - Added code for multi-user internal chat sessions
# 161221-0800 - Added color-coding for users in internal chat sessions
# 170526-2257 - Added additional variable filtering
# 170528-1028 - Added more variable filtering
#

require("dbconnect_mysqli.php");
require("functions.php");
require "../db/database.php";

$NOW_TIME = date("Y-m-d H:i:s");
$chat_background_array = array(); # Defined further down
$style_array = array("", "italics", "bold italics");

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} elseif (isset($_POST["action"])) {
    $action = $_POST["action"];
}
if (isset($_GET["DB"])) {
    $DB = $_GET["DB"];
} elseif (isset($_POST["DB"])) {
    $DB = $_POST["DB"];
}
if (isset($_GET["chat_id"])) {
    $chat_id = $_GET["chat_id"];
} elseif (isset($_POST["chat_id"])) {
    $chat_id = $_POST["chat_id"];
}
if (isset($_GET["chat_group_id"])) {
    $chat_group_id = $_GET["chat_group_id"];
} elseif (isset($_POST["chat_group_id"])) {
    $chat_group_id = $_POST["chat_group_id"];
}
if (isset($_GET["chat_level"])) {
    $chat_level = $_GET["chat_level"];
} elseif (isset($_POST["chat_level"])) {
    $chat_level = $_POST["chat_level"];
}
if (isset($_GET["chat_creator"])) {
    $chat_creator = $_GET["chat_creator"];
} elseif (isset($_POST["chat_creator"])) {
    $chat_creator = $_POST["chat_creator"];
}
if (isset($_GET["chat_member_name"])) {
    $chat_member_name = $_GET["chat_member_name"];
} elseif (isset($_POST["chat_member_name"])) {
    $chat_member_name = $_POST["chat_member_name"];
}
if (isset($_GET["chat_message"])) {
    $chat_message = $_GET["chat_message"];
} elseif (isset($_POST["chat_message"])) {
    $chat_message = $_POST["chat_message"];
}
if (isset($_GET["email"])) {
    $email = $_GET["email"];
} elseif (isset($_POST["email"])) {
    $email = $_POST["email"];
}
if (isset($_GET["lead_id"])) {
    $lead_id = $_GET["lead_id"];
} elseif (isset($_POST["lead_id"])) {
    $lead_id = $_POST["lead_id"];
}
if (isset($_GET["user"])) {
    $user = $_GET["user"];
} elseif (isset($_POST["user"])) {
    $user = $_POST["user"];
}
if (isset($_GET["server_ip"])) {
    $server_ip = $_GET["server_ip"];
} elseif (isset($_POST["server_ip"])) {
    $server_ip = $_POST["server_ip"];
}
if (isset($_GET["user_level"])) {
    $user_level = $_GET["user_level"];
} elseif (isset($_POST["user_level"])) {
    $user_level = $_POST["user_level"];
}
if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];
} elseif (isset($_POST["pass"])) {
    $pass = $_POST["pass"];
}
if (isset($_GET["first_name"])) {
    $first_name = $_GET["first_name"];
} elseif (isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
}
if (isset($_GET["last_name"])) {
    $last_name = $_GET["last_name"];
} elseif (isset($_POST["last_name"])) {
    $last_name = $_POST["last_name"];
}
if (isset($_GET["group_id"])) {
    $group_id = $_GET["group_id"];
} elseif (isset($_POST["group_id"])) {
    $group_id = $_POST["group_id"];
}
if (isset($_GET["keepalive"])) {
    $keepalive = $_GET["keepalive"];
} elseif (isset($_POST["keepalive"])) {
    $keepalive = $_POST["keepalive"];
}
if (isset($_GET["current_message_count"])) {
    $current_message_count = $_GET["current_message_count"];
} elseif (isset($_POST["current_message_count"])) {
    $current_message_count = $_POST["current_message_count"];
}

if (isset($_GET["manager_chat_id"])) {
    $manager_chat_id = $_GET["manager_chat_id"];
} elseif (isset($_POST["manager_chat_id"])) {
    $manager_chat_id = $_POST["manager_chat_id"];
}
if (isset($_GET["manager_chat_subid"])) {
    $manager_chat_subid = $_GET["manager_chat_subid"];
} elseif (isset($_POST["manager_chat_subid"])) {
    $manager_chat_subid = $_POST["manager_chat_subid"];
}
if (isset($_GET["current_active_chat"])) {
    $current_active_chat = $_GET["current_active_chat"];
} elseif (isset($_POST["current_active_chat"])) {
    $current_active_chat = $_POST["current_active_chat"];
}
if (isset($_GET["field_name"])) {
    $field_name = $_GET["field_name"];
} elseif (isset($_POST["field_name"])) {
    $field_name = $_POST["field_name"];
}
if (isset($_GET["agent_manager"])) {
    $agent_manager = $_GET["agent_manager"];
} elseif (isset($_POST["agent_manager"])) {
    $agent_manager = $_POST["agent_manager"];
}
if (isset($_GET["agent_to_add"])) {
    $agent_to_add = $_GET["agent_to_add"];
} elseif (isset($_POST["agent_to_add"])) {
    $agent_to_add = $_POST["agent_to_add"];
}
if (isset($_GET["agent_user"])) {
    $agent_user = $_GET["agent_user"];
} elseif (isset($_POST["agent_user"])) {
    $agent_user = $_POST["agent_user"];
}
if (isset($_GET["agent_override"])) {
    $agent_override = $_GET["agent_override"];
} elseif (isset($_POST["agent_override"])) {
    $agent_override = $_POST["agent_override"];
}
if (isset($_GET["hangup_override"])) {
    $hangup_override = $_GET["hangup_override"];
} elseif (isset($_POST["hangup_override"])) {
    $hangup_override = $_POST["hangup_override"];
}
if (isset($_GET["manager_message"])) {
    $manager_message = $_GET["manager_message"];
} elseif (isset($_POST["manager_message"])) {
    $manager_message = $_POST["manager_message"];
}
if (isset($_GET["ChatReloadIDNumber"])) {
    $ChatReloadIDNumber = $_GET["ChatReloadIDNumber"];
} elseif (isset($_POST["ChatReloadIDNumber"])) {
    $ChatReloadIDNumber = $_POST["ChatReloadIDNumber"];
}
if (isset($_GET["chat_xfer_type"])) {
    $chat_xfer_type = $_GET["chat_xfer_type"];
} elseif (isset($_POST["chat_xfer_type"])) {
    $chat_xfer_type = $_POST["chat_xfer_type"];
}
if (isset($_GET["chat_xfer_value"])) {
    $chat_xfer_value = $_GET["chat_xfer_value"];
} elseif (isset($_POST["chat_xfer_value"])) {
    $chat_xfer_value = $_POST["chat_xfer_value"];
}

if (!$user) {
    echo "No user, no using.";
    exit;
}

if (file_exists('options.php')) {
    require('options.php');
}

# variable filtering
$user = preg_replace("/\'|\"|\\\\|;| /", "", $user);
$pass = preg_replace("/\'|\"|\\\\|;| /", "", $pass);
$session_name = preg_replace("/\'|\"|\\\\|;/", "", $session_name);
$server_ip = preg_replace("/\'|\"|\\\\|;/", "", $server_ip);
$agent_manager = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $agent_manager);
$agent_user = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $agent_user);
$manager_chat_id = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $manager_chat_id);
$chat_creator = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_creator);
$group_id = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $group_id);
$chat_member_name = preg_replace('/[^- \.\,\_0-9a-zA-Z]/', "", $chat_member_name);
$lead_id = preg_replace('/[^0-9]/', '', $lead_id);
$agent_to_add = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $agent_to_add);
$chat_group_id = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_group_id);
$chat_id = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_id);
$chat_level = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_level);
$chat_xfer_type = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_xfer_type);
$chat_xfer_value = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $chat_xfer_value);
$email = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $email);
$field_name = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $field_name);
$manager_chat_subid = preg_replace("/\||`|&|\'|\"|\\\\|;| /", "", $manager_chat_subid);

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$VUselected_language = '';
$stmt = "SELECT use_non_latin,enable_languages,language_method,default_language,allow_chats FROM system_settings;";
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00XXX', $user, $server_ip, $session_name, $one_mysql_log);
}
if ($DB) {
    echo "$stmt\n";
}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0) {
    $row = mysqli_fetch_row($rslt);
    $non_latin = $row[0];
    $SSenable_languages = $row[1];
    $SSlanguage_method = $row[2];
    $SSdefault_language = $row[3];
    $SSallow_chats = $row[4];
}
$VUselected_language = $SSdefault_language;
##### END SETTINGS LOOKUP #####
###########################################

$auth = 0;
$auth_message = user_authorization($user, $pass, '', 0, 0, 0, 0, 'chat_db_query');
if ($auth_message == 'GOOD') {
    $auth = 1;
}

if ((strlen($user) < 2) or ( strlen($pass) < 2) or ( $auth == 0)) {
    echo _QXZ("Invalid Username/Password:") . " |$user|$pass|$auth_message|chat_db_query|\n";
    exit;
}

$user_stmt = "select full_name,user_level,selected_language from vicidial_users where user='$user'";
$user_level = 0;
$user_rslt = mysql_to_mysqli($user_stmt, $link);
if (mysqli_num_rows($user_rslt) > 0) {
    $user_row = mysqli_fetch_row($user_rslt);
    $full_name = $user_row[0];
    $user_level = $user_row[1];
    $VUselected_language = $user_row[2];
}
if ($SSallow_chats < 1) {
    header("Content-type: text/html; charset=utf-8");
    echo _QXZ("Error, chat disabled on this system");
    exit;
}


###### AGENT/MANAGER CHAT FUNCTIONS #######
if ($action == "CreateAgentToAgentChat" && $agent_manager && $agent_user && $manager_message) {

    # Check that you aren't already chatting with the agent - also checks for chats where the other agent is the manager and you are the requested chat recipient
    $dupe_chat_stmt = "select * from vicidial_manager_chats where (manager='$agent_manager' and selected_agents like '%|$agent_user|%') or (manager='$agent_user' and selected_agents like '%|$agent_manager|%')";
    $dupe_chat_rslt = mysql_to_mysqli($dupe_chat_stmt, $link);
    if (mysqli_num_rows($dupe_chat_rslt) > 0) {
        echo _QXZ("Error:  You already have an open chat with this agent");
    } else {

        # This is slightly different from the manager-to-agent chat because it's only one agent you're chatting to so for reporting all that agent's specific information is grabbed and used to make the vicidial_manager_chats entry.  Since the query should only return one result there's no while loop to insert subid chat info.

        $stmt = "select vicidial_live_agents.user, vicidial_users.full_name, vicidial_users.user_group, vicidial_live_agents.campaign_id from vicidial_live_agents, vicidial_users where vicidial_live_agents.user=vicidial_users.user and vicidial_live_agents.user='$agent_user' and vicidial_users.user!='$agent_manager' order by vicidial_users.full_name asc";
        $rslt = mysql_to_mysqli($stmt, $link);
        if (mysqli_num_rows($rslt) > 0) {
            $row = mysqli_fetch_row($rslt);
            $user = $row[0];
            $user_group = $row[2];
            $campaign_id = $row[3];

            $ins_stmt = "insert into vicidial_manager_chats(chat_start_date, manager, selected_agents, selected_user_groups, selected_campaigns, allow_replies, internal_chat_type) VALUES(now(), '$agent_manager', '|$agent_user|', '|$user_group|', '|$campaign_id|', 'Y', 'AGENT')";
            $ins_rslt = mysql_to_mysqli($ins_stmt, $link);
            $manager_chat_id = mysqli_insert_id($link);

            $subid = 1;

            # $manager_message = preg_replace('/;/i','',$manager_message);
            $manager_message = preg_replace("/\r/i", '', $manager_message);
            $manager_message = preg_replace("/\n/i", ' ', $manager_message);
            # $manager_message=addslashes(trim("$manager_message"));

            $message_id = date("U") . "." . rand(10000000, 99999999);

            $mgr_stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
            $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
            $mgr_row = mysqli_fetch_row($mgr_rslt);
            $participants = preg_replace("/\|$/", "", $mgr_row[0]);
            $participants_array = explode("|", $participants);

            $message_id = date("U") . "." . rand(10000000, 99999999);
            $message_date = date("Y-m-d H:i:s");

            # post message to each user, use $error_msg variable to ensure every insert command worked
            $error_msg = "";
            while (list($key, $val) = each($participants_array)) {
                $participant = $val;
                $ins_chat_stmt = "insert into vicidial_manager_chat_log(manager_chat_id, manager_chat_subid, manager, user, message, message_id, message_date, message_posted_by) VALUES('$manager_chat_id', '$subid', '$agent_manager', '$participant', '" . mysqli_real_escape_string($link, $manager_message) . "', '$message_id', '$message_date', '$agent_manager')";
                $ins_chat_rslt = mysql_to_mysqli($ins_chat_stmt, $link);
            }

            echo "$manager_chat_id|$subid";
        }
    }
}

if ($action == "DisplayMgrAgentChat" && $manager_chat_id && $manager_chat_subid && $user) {
    $stmt = "select vm.message_posted_by, vm.message, vm.message_date, vu.full_name, vm.manager, vm.manager_chat_subid, vmc.chat_start_date, vm.message_posted_by from vicidial_manager_chats vmc, vicidial_manager_chat_log vm, vicidial_users vu where vmc.manager_chat_id='$manager_chat_id' and vmc.manager_chat_id=vm.manager_chat_id and vm.manager_chat_subid='$manager_chat_subid' and vm.user=vu.user and vm.user='$user' order by vm.manager_chat_subid asc, message_date desc";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($debug == 1) {
        echo "$stmt<BR>\n";
    }

    # Mark messages as viewed by user (not manager, even if manager is agent at the time)
    $upd_stmt = "update vicidial_manager_chat_log set message_viewed_date=now() where message_viewed_date is null and manager_chat_id='$manager_chat_id' and manager_chat_subid='$manager_chat_subid' and user='$user'";
    $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
    $new_messages = mysqli_affected_rows($link);

    if (mysqli_num_rows($rslt) > 0) {
        $prev_chat_subid = "";
        $backlog_limit = 20;
        $chat_output_text = "";

        /*
          $chat_color_stmt="select std_row1_background, std_row2_background from system_settings s, vicidial_screen_colors v where s.agent_screen_colors=v.colors_id and length(frame_background)=6 and length(menu_background)=6 limit 1;";
          $color_rslt=mysql_to_mysqli($chat_color_stmt, $link);
          if(mysqli_num_rows($color_rslt)>0 && $use_agent_colors>0) {
          $color_row=mysqli_fetch_array($color_rslt);
          $color_array=array("#000000", "#000000");
          $chat_background_array=array("#$color_row[std_row1_background]", "#$color_row[std_row2_background]");
          } else {
          $color_array=array("#0000FF", "#FF0000");
          $chat_background_array=array("#CCCCFF", "#FFCCCC");
          }
         */

        # Create color-coding for chat
        $cc_stmt = "select * from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id' and manager_chat_subid='$manager_chat_subid' order by message_date asc";
        $cc_rslt = mysql_to_mysqli($cc_stmt, $link);
        $chat_members = array();
        while ($cc_row = mysqli_fetch_row($cc_rslt)) {
            if (!in_array("$cc_row[9]", $chat_members)) {
                array_push($chat_members, "$cc_row[9]");
            }
        }

        $chat_color_stmt = "select std_row1_background, std_row2_background, std_row3_background, std_row4_background, std_row5_background, alt_row1_background, alt_row2_background, alt_row3_background from system_settings s, vicidial_screen_colors v where s.agent_chat_screen_colors=v.colors_id and length(std_row1_background)=6 and length(std_row2_background)=6 and s.agent_chat_screen_colors!='default' limit 1;";
        $color_rslt = mysql_to_mysqli($chat_color_stmt, $link);
        if (mysqli_num_rows($color_rslt) > 0 && $use_agent_colors > 0) {
            $color_row = mysqli_fetch_array($color_rslt);
            $color_array = array("#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000");
            $chat_background_array = array("#$color_row[std_row1_background]", "#$color_row[std_row2_background]", "#$color_row[std_row3_background]", "#$color_row[std_row4_background]", "#$color_row[std_row5_background]", "#$color_row[alt_row1_background]", "#$color_row[alt_row2_background]", "#$color_row[alt_row3_background]");
        } else {
            $color_array = array("#CC0000", "#009900", "#000099", "#999900", "#993300", "#330066", "#009999", "#660033");
            $chat_background_array = array("#FFCCCC", "#CCFFCC", "#CCCCFF", "#FFFFCC", "#FFCC99", "#CC99FF", "#CCFFFF", "#FF99CC");
        }

        while ($row = mysqli_fetch_row($rslt)) {
            if (!$chat_start_date) {
                $chat_start_date = $row[6];
            }
            if (!$manager) {
                $manager = $row[4];
            }
            if ($backlog_limit > 0) {

                # Current agent is always the blue text
                # if ($row[0]!=$user) {$fc="#990000";} else {$fc="#000099";}
                #if ($row[0]!=$user) {
                #	$chat_color_key=1;
                #} else {
                #	$chat_color_key=0;
                #}
                $chat_color_key = array_search("$row[7]", $chat_members);

                $chat_output_text = "<tr><td bgcolor='$chat_background_array[$chat_color_key]'><font color='$color_array[$chat_color_key]' FACE=\"ARIAL,HELVETICA\" size='2' class='bold'>$row[1]</font></td></tr>" . $chat_output_text;


                # $chat_output_text="<font color='$fc' FACE=\"ARIAL,HELVETICA\" size='1'>$row[1]</font><BR>".$chat_output_text;
                $backlog_limit--;
            }
        }
        $chat_output_text = "<table border='0' cellpadding='1' cellspacing='1' width='100%'>" . $chat_output_text;

        $chat_output_text .= "</table>";

        $reply_stmt = "select allow_replies, internal_chat_type from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
        $reply_rslt = mysql_to_mysqli($reply_stmt, $link);
        $reply_row = mysqli_fetch_row($reply_rslt);
        $allow_replies = $reply_row[0];
        $internal_chat_type = $reply_row[1]; # Need this returned to determine if agent side can add agents to this chat (manager chats, they should not be able to)
        $display_name = "";

        $participant_stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
        $participant_rslt = mysql_to_mysqli($participant_stmt, $link);
        $prow = mysqli_fetch_row($participant_rslt);
        $participants = preg_replace("/\|$/", "", $prow[0]);

        $mgr_stmt = "select full_name from vicidial_users where user in ('" . preg_replace("/\|/", "','", $participants) . "') and user!='$user'";
        $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
        $display_name = "";
        while ($mgr_row = mysqli_fetch_row($mgr_rslt)) {
            $display_name .= $mgr_row[0];
            $display_name .= ", ";
        }
        $display_name = preg_replace("/, $/", "", $display_name);

        /*
          if ($manager==$user) {
          $mgr_stmt="select distinct full_name from vicidial_users vu, vicidial_manager_chat_log vc where manager_chat_id='$manager_chat_id' and manager_chat_subid='$manager_chat_subid' and vc.user=vu.user";
          $mgr_rslt=mysql_to_mysqli($mgr_stmt, $link);
          if (mysqli_num_rows($mgr_rslt)==0) { # Used to be !=1, but can't use that now because it returns all participants
          $display_name="ERROR - $mgr_stmt";
          } else {
          $mgr_row=mysqli_fetch_row($mgr_rslt);
          $display_name=$mgr_row[0];
          }
          } else {
          # $mgr_stmt="select full_name from vicidial_users where user='$manager'";
          $mgr_stmt="select full_name from vicidial_users where user in ('$participants') and user!='$user'";
          $mgr_rslt=mysql_to_mysqli($mgr_stmt, $link);
          $mgr_row=mysqli_fetch_row($mgr_rslt);
          $display_name=$mgr_row[0];

          $other_participants
          }
         */

        echo $allow_replies . "\n" . $chat_output_text . "\n" . $chat_start_date . "\n" . $display_name . "\n" . $new_messages . "\n" . $internal_chat_type;
    } else {
        echo "N\n" . _QXZ("CHAT ENDED") . "\n\n";
    }
}

if ($action == "EndAgentToAgentChat" && $manager_chat_id && $user) {
    $subid_lookup = "select distinct manager_chat_subid from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id' and user='$user'";
    $subid_rslt = mysql_to_mysqli($subid_lookup, $link);
    # should only be one, but making array just in case
    $manager_chat_subid_array = array();
    while ($subid_row = mysqli_fetch_row($subid_rslt)) {
        $manager_chat_subid = $subid_row[0];
        array_push($manager_chat_subid_array, "$subid_row[0]");
    }


    $archive_stmt = "insert ignore into vicidial_manager_chat_log_archive select * from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id' and manager_chat_subid in ('" . implode("','", $manager_chat_subid_array) . "')";
    $archive_rslt = mysql_to_mysqli($archive_stmt, $link);

    # JCJ 1/7/16 - do not do this, as it will end the chat for all agents.
    # $archive_stmt="insert ignore into vicidial_manager_chats_archive select * from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
    # $archive_rslt=mysqli_query($link, $archive_stmt);

    $delete_stmt = "delete from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id' and manager_chat_subid in ('" . implode("','", $manager_chat_subid_array) . "')";
    $delete_rslt = mysql_to_mysqli($delete_stmt, $link);

    #if (mysqli_affected_rows($link)>0) {
    #	$archive_stmt="delete from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
    #	$archive_rslt=mysqli_query($link, $archive_stmt);
    #}
    echo mysqli_affected_rows($link);
}

if ($action == "RefreshActiveChatView" && $user) {
    # Get a count on unread messages where the user is involved but not the chat manager/initiator in order to create the ChatReloadIDNumber variable
    $chat_reload_id_number_array = array();
    $unread_stmt = "select manager_chat_id, manager_chat_subid, sum(if(message_viewed_date is not null and vicidial_manager_chat_log.user='$user', 0, 1)) as unread_count from vicidial_manager_chat_log where vicidial_manager_chat_log.user='$user' group by manager_chat_id, manager_chat_subid order by manager_chat_id, manager_chat_subid";
    $unread_rslt = mysql_to_mysqli($unread_stmt, $link);
    while ($unread_row = mysqli_fetch_array($unread_rslt)) {
        $IDNumber = $unread_row["manager_chat_id"] . "-" . $unread_row["manager_chat_subid"] . "-" . $unread_row["unread_count"];
        array_push($chat_reload_id_number_array, "$IDNumber");
    }

    # Pull the most recently posted-to chat that has not been viewed, then the most recent period, and display that as the default window
    $stmt = "select distinct vicidial_manager_chat_log.manager_chat_id, vicidial_manager_chat_log.manager_chat_subid, vicidial_users.full_name, vicidial_manager_chats.chat_start_date, sum(if(vicidial_manager_chat_log.message_viewed_date is null and vicidial_manager_chat_log.user='$user', 1, 0)) from vicidial_manager_chat_log, vicidial_manager_chats, vicidial_users where vicidial_manager_chat_log.user='$user' and vicidial_manager_chat_log.manager_chat_id=vicidial_manager_chats.manager_chat_id and vicidial_manager_chats.manager=vicidial_users.user group by manager_chat_id, manager_chat_subid order by message_viewed_date asc, message_date desc";
    $rslt = mysql_to_mysqli($stmt, $link);

    $active_chats_array = array();
    $chat_subid_array = array();
    $unread_chats_array = array();
    $chat_managers_array = array();
    $chat_start_date_array = array();
    while ($row = mysqli_fetch_row($rslt)) {
        if ($row[0] != "") {
            array_push($active_chats_array, "$row[0]");
            $chat_subid_array[$row[0]] = "$row[1]";
            $chat_managers_array[$row[0]] = "$row[2]";
            $chat_start_date_array[$row[0]] = "$row[3]";
            if ($row[4] > 0) {
                array_push($unread_chats_array, $row[0]);
            } # Store any chat with unread messages.
            $agents_managers_array[$row[0]] = "0";
        }
    }

    # Get a count on unread messages where the user is the chat manager/initiator in order to create the ChatReloadIDNumber variable
    $unread_stmt = "select manager_chat_id, manager_chat_subid, sum(if(message_viewed_date is not null and vicidial_manager_chat_log.user='$user', 0, 1)) as unread_count from vicidial_manager_chat_log where vicidial_manager_chat_log.manager='$user' group by manager_chat_id, manager_chat_subid order by manager_chat_id, manager_chat_subid";
    $unread_rslt = mysql_to_mysqli($unread_stmt, $link);
    while ($unread_row = mysqli_fetch_array($unread_rslt)) {
        $IDNumber = $unread_row["manager_chat_id"] . "-" . $unread_row["manager_chat_subid"] . "-" . $unread_row["unread_count"];
        array_push($chat_reload_id_number_array, "$IDNumber");
    }

    ### This was added for agent to agent chats since there needs to be a list of open chats where the agent viewing this is also the manager,
    ### which will now happen because agents can now start their own chats.  Added vicidial_manager_chat_log.user to this query on 2/4/15 for
    ### manager override
    $stmt = "select distinct vicidial_manager_chat_log.manager_chat_id, vicidial_manager_chat_log.manager_chat_subid, vicidial_users.full_name, vicidial_manager_chats.chat_start_date, sum(if(vicidial_manager_chat_log.message_viewed_date is null and vicidial_manager_chat_log.user='$user', 1, 0)),vicidial_manager_chat_log.user from vicidial_manager_chat_log, vicidial_manager_chats, vicidial_users where vicidial_manager_chat_log.manager='$user' and vicidial_manager_chat_log.manager_chat_id=vicidial_manager_chats.manager_chat_id and vicidial_manager_chat_log.user=vicidial_users.user group by manager_chat_id, manager_chat_subid order by message_viewed_date asc, message_date desc";
    $rslt = mysql_to_mysqli($stmt, $link);
    while ($row = mysqli_fetch_row($rslt)) {
        if ($row[0] != "") {
            array_push($active_chats_array, "$row[0]");
            $chat_subid_array[$row[0]] = "$row[1]";
            $chat_managers_array[$row[0]] = "$row[2]";
            $chat_start_date_array[$row[0]] = "$row[3]";
            if ($row[4] > 0) {
                array_push($unread_chats_array, $row[0]);
            } # Store any chat with unread messages.
            $agents_managers_array[$row[0]] = "$row[5]";  // IS a chat where the agent is a manager
        }
    }
    #########
    asort($chat_reload_id_number_array);
    $new_ChatReloadIDNumber = "";
    while (list($key, $id_number) = each($chat_reload_id_number_array)) {
        $new_ChatReloadIDNumber .= "$id_number.";
    }
    $new_ChatReloadIDNumber = substr($new_ChatReloadIDNumber, 0, -1);

    sort($active_chats_array);
    asort($chat_managers_array);

    # Create color-coding for internal chat
    $cc_stmt = "select * from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id' and manager_chat_subid='$manager_chat_subid' order by message_date asc";
    $cc_rslt = mysql_to_mysqli($cc_stmt, $link);
    $chat_members = array();
    while ($cc_row = mysqli_fetch_row($cc_rslt)) {
        if (!in_array("$cc_row[9]", $chat_members)) {
            array_push($chat_members, "$cc_row[9]");
        }
    }

    $chat_color_stmt = "select std_row1_background, std_row2_background, std_row3_background, std_row4_background, std_row5_background, alt_row1_background, alt_row2_background, alt_row3_background from system_settings s, vicidial_screen_colors v where s.agent_chat_screen_colors=v.colors_id and length(std_row1_background)=6 and length(std_row2_background)=6 and s.agent_chat_screen_colors!='default' limit 1;";
    $color_rslt = mysql_to_mysqli($chat_color_stmt, $link);
    if (mysqli_num_rows($color_rslt) > 0 && $use_agent_colors > 0) {
        $color_row = mysqli_fetch_array($color_rslt);
        $color_array = array("#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000");
        $chat_background_array = array("#$color_row[std_row1_background]", "#$color_row[std_row2_background]", "#$color_row[std_row3_background]", "#$color_row[std_row4_background]", "#$color_row[std_row5_background]", "#$color_row[alt_row1_background]", "#$color_row[alt_row2_background]", "#$color_row[alt_row3_background]");
    } else {
        $color_array = array("#CC0000", "#009900", "#000099", "#999900", "#993300", "#330066", "#009999", "#660033");
        $chat_background_array = array("#FFCCCC", "#CCFFCC", "#CCCCFF", "#FFFFCC", "#FFCC99", "#CC99FF", "#CCFFFF", "#FF99CC");
    }


#	Removed this on 2016-12-09, because a) the active chat display should be refreshing when an agent is added to a chat, and the agent already in the chat isn't seeing the change, and b) the below section isn't querying the database anyway, so it won't affect page performance.
#	if ($new_ChatReloadIDNumber!=$ChatReloadIDNumber) {
    echo "$new_ChatReloadIDNumber|";
    echo "<ul class='chatview'>";
    if (empty($chat_managers_array)) {
        echo "\t<li class='arial_bold'>" . _QXZ("NO OPEN CHATS") . "</li>\n";
    } else {
        while (list($manager_chat_id, $text) = each($chat_managers_array)) {
            $manager_chat_subid = $chat_subid_array[$manager_chat_id];
            if (!empty($unread_chats_array) && in_array($manager_chat_id, $unread_chats_array)) {
                $cclass = "unreadchat";
            } else {
                $cclass = "viewedchat";
            }
            echo "\t<li class='" . $cclass . "'><a onClick=\"document.getElementById('CurrentActiveChat').value='$manager_chat_id'; document.getElementById('CurrentActiveChatSubID').value='$manager_chat_subid'; document.getElementById('AgentManagerOverride').value='" . $agents_managers_array[$manager_chat_id] . "'; LoadAvailableAgentsForChat('AllLiveNonChatAgents', 'agent_to_add');\">Chat #" . $manager_chat_id . "</a></li>\n"; # $chat_managers_array[$manager_chat_id]
            $additional_agents_stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
            $additional_agents_rslt = mysql_to_mysqli($additional_agents_stmt, $link);
            $aa_row = mysqli_fetch_row($additional_agents_rslt);
            $additional_agents = preg_replace("/^\||\|$/", "", $aa_row[0]);
            $additional_agents = preg_replace("/\|/", "','", $additional_agents);
            $full_name_stmt = "select full_name, user from vicidial_users where user in ('$additional_agents') and user!='$user' order by full_name asc";
            $full_name_rslt = mysql_to_mysqli($full_name_stmt, $link);
            while ($fname_row = mysqli_fetch_row($full_name_rslt)) {

                $chat_color_key = array_search("$fname_row[1]", $chat_members);
                # $chat_output_text="<tr><td bgcolor='$chat_background_array[$chat_color_key]'><font color='$color_array[$chat_color_key]' FACE=\"ARIAL,HELVETICA\" size='2' class='bold'>$row[1]</font></td></tr>".$chat_output_text;

                echo "\t<li class='additional_agents' style='background-color:" . $chat_background_array[$chat_color_key] . ";'><a onClick=\"document.getElementById('CurrentActiveChat').value='$manager_chat_id'; document.getElementById('CurrentActiveChatSubID').value='$manager_chat_subid'; document.getElementById('AgentManagerOverride').value='" . $agents_managers_array[$manager_chat_id] . "'; LoadAvailableAgentsForChat('AllLiveNonChatAgents', 'agent_to_add');\">" . $fname_row[0] . "</a></li>\n";
            }
        }
    }
    echo "</ul>\n";
#	}
}

if ($action == "ReloadAgentNewChatSpan" && $user) {
    echo "<table width='600' border='0' cellpadding='5' cellspacing='0'>\n";
    echo "<TR BGCOLOR='#E6E6E6' valign='top'>\n";
    echo "<td width='*'><font class='arial'>" . _QXZ("Select a live agent") . ":</font><BR>\n";

    $stmt = "SELECT user_group from vicidial_users where user='$user';";
    if ($non_latin > 0) {
        $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00573', $user, $server_ip, $session_name, $one_mysql_log);
    }
    $row = mysqli_fetch_row($rslt);
    $VU_user_group = $row[0];

    $stmt = "SELECT campaign_id from vicidial_live_agents where user='$user';";
    if ($non_latin > 0) {
        $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00XXX', $user, $server_ip, $session_name, $one_mysql_log);
    }
    $row = mysqli_fetch_row($rslt);
    $campaign_id = $row[0];

    $agent_allowed_chat_groupsSQL = '';
    ### Gather timeclock and shift enforcement restriction settings
    $stmt = "SELECT agent_status_viewable_groups,agent_status_view_time,agent_allowed_chat_groups from vicidial_user_groups where user_group='$VU_user_group';";
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_row($rslt);
    $agent_allowed_chat_groups = $row[2];
    $agent_allowed_chat_groupsSQL = preg_replace('/\s\s/i', '', $agent_allowed_chat_groups);
    $agent_allowed_chat_groupsSQL = preg_replace('/\s/i', "','", $agent_allowed_chat_groupsSQL);
    $agent_allowed_chat_groupsSQL = "user_group IN('$agent_allowed_chat_groupsSQL')";
    $agent_status_view = 0;
    if (strlen($agent_allowed_chat_groups) > 2) {
        $agent_status_view = 1;
    }
    $agent_status_view_time = 0;
    if ($row[1] == 'Y') {
        $agent_status_view_time = 1;
    }
    $andSQL = '';
    if (preg_match("/ALL-GROUPS/", $agent_allowed_chat_groups)) {
        $AGENTviewSQL = "";
    } else {
        $AGENTviewSQL = "($agent_allowed_chat_groupsSQL)";

        if (preg_match("/CAMPAIGN-AGENTS/", $agent_allowed_chat_groups)) {
            $AGENTviewSQL = "($AGENTviewSQL or (campaign_id='$campaign_id'))";
        }
        $AGENTviewSQL = "and $AGENTviewSQL";
    }

    $stmt = "SELECT vla.user,vu.full_name from vicidial_live_agents vla,vicidial_users vu where vla.user=vu.user and vu.user!='$user' $AGENTviewSQL order by vu.full_name;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($rslt) {
        $agents_count = mysqli_num_rows($rslt);
    }
    $loop_count = 0;
    echo "<select name='agent' id='agent'>\n";
    echo "<option value=''>" . _QXZ("Available agents") . "</option>\n";
    while ($agents_count > $loop_count) {
        $row = mysqli_fetch_row($rslt);
        echo "<option value='$row[0]'>$row[1]</option>\n";
        $loop_count++;
    }
    echo "</select>";

    echo "</td>\n";
    echo "<td width='200'><font class='arial'>" . _QXZ("Message") . ":</font><BR>\n";
    echo "<textarea class='small_arial' rows='5' cols='36' name='agent_message' id='agent_message'></textarea>";
    echo "</td></TR>\n";

    echo "<TR BGCOLOR='#E6E6E6'>\n";
    echo "<td><BR><input class='red_btn' type='button' style='width:200px' value='" . _QXZ("BACK TO CHAT SCREEN") . "' onClick=\"document.getElementById('AgentChatSpan').style.display='block'; document.getElementById('AgentNewChatSpan').style.display='none';\"></td>\n";
    echo "<td align='center'><BR><input class='green_btn' type='button' style='width:200px' value='" . _QXZ("START CHAT") . "' onClick=\"CreateAgentToAgentChat()\">\n</td></TR>\n";
    echo "</table>";
}

if ($action == "load_available_agents_for_chat" && $user && $field_name) {
    $stmt = "SELECT user_group from vicidial_users where user='$user';";
    if ($non_latin > 0) {
        $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00573', $user, $server_ip, $session_name, $one_mysql_log);
    }
    $row = mysqli_fetch_row($rslt);
    $VU_user_group = $row[0];

    $stmt = "SELECT campaign_id from vicidial_live_agents where user='$user';";
    if ($non_latin > 0) {
        $rslt = mysql_to_mysqli("SET NAMES 'UTF8'", $link);
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($mel > 0) {
        mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00XXX', $user, $server_ip, $session_name, $one_mysql_log);
    }
    $row = mysqli_fetch_row($rslt);
    $campaign_id = $row[0];

    $agent_allowed_chat_groupsSQL = '';
    ### Gather timeclock and shift enforcement restriction settings
    $stmt = "SELECT agent_status_viewable_groups,agent_status_view_time,agent_allowed_chat_groups from vicidial_user_groups where user_group='$VU_user_group';";
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_row($rslt);
    $agent_allowed_chat_groups = $row[2];
    $agent_allowed_chat_groupsSQL = preg_replace('/\s\s/i', '', $agent_allowed_chat_groups);
    $agent_allowed_chat_groupsSQL = preg_replace('/\s/i', "','", $agent_allowed_chat_groupsSQL);
    $agent_allowed_chat_groupsSQL = "user_group IN('$agent_allowed_chat_groupsSQL')";
    $agent_status_view = 0;
    if (strlen($agent_allowed_chat_groups) > 2) {
        $agent_status_view = 1;
    }
    $agent_status_view_time = 0;
    if ($row[1] == 'Y') {
        $agent_status_view_time = 1;
    }
    $andSQL = '';
    if (preg_match("/ALL-GROUPS/", $agent_allowed_chat_groups)) {
        $AGENTviewSQL = "";
    } else {
        $AGENTviewSQL = "($agent_allowed_chat_groupsSQL)";

        if (preg_match("/CAMPAIGN-AGENTS/", $agent_allowed_chat_groups)) {
            $AGENTviewSQL = "($AGENTviewSQL or (campaign_id='$campaign_id'))";
        }
        $AGENTviewSQL = "and $AGENTviewSQL";
    }

    # Filter out agents already in the current active chat
    $stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
    $rslt = mysql_to_mysqli($stmt, $link);
    $row = mysqli_fetch_array($rslt);
    $selected_agents = $row["participants"];
    $selected_agents = preg_replace("/^\||\|$/", "", $selected_agents);
    $selected_agents = preg_replace("/\|/", "','", $selected_agents);

    $stmt = "SELECT vla.user,vu.full_name from vicidial_live_agents vla,vicidial_users vu where vla.user=vu.user and vu.user!='$user' and vu.user not in ('$selected_agents') $AGENTviewSQL order by vu.full_name;";
    $rslt = mysql_to_mysqli($stmt, $link);
    if ($rslt) {
        $agents_count = mysqli_num_rows($rslt);
    }
    $loop_count = 0;

    echo "<select name='$field_name' id='$field_name'>\n";
    echo "<option value=''>Available agents</option>\n";
    while ($agents_count > $loop_count) {
        $row = mysqli_fetch_row($rslt);
        echo "<option value='$row[0]'>" . substr($row[1], 0, 20) . "</option>\n";
        $loop_count++;
    }
    echo "</select>";

    if ($agents_count > 0) {
        echo "<BR><BR><input class='blue_btn' type='button' style='width:100px' value='" . _QXZ("INVITE") . "' onClick='AddAgentToExistingChat()'>";
    }
}

if ($action == "add_agent_to_existing_chat" && $agent_to_add && $manager_chat_id && $user) {
    $mgr_stmt = "select manager from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
    $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
    $mgr_row = mysqli_fetch_row($mgr_rslt);
    $manager = $mgr_row[0];

    if ($manager) {
        $fname_stmt = "select full_name from vicidial_users where user='$user'";
        $fname_rslt = mysql_to_mysqli($fname_stmt, $link);
        $fname_row = mysqli_fetch_row($fname_rslt);
        $invitee = $fname_row[0];

        $fname_stmt = "select full_name from vicidial_users where user='$agent_to_add'";
        $fname_rslt = mysql_to_mysqli($fname_stmt, $link);
        $fname_row = mysqli_fetch_row($fname_rslt);
        $invited = $fname_row[0];

        # Below five lines have to be repeated twice.  Once to get all the agents currently in the chat BEFORE the new agent is loaded to check that the agent isn't already in the list...
        $mgr_stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
        $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
        $mgr_row = mysqli_fetch_row($mgr_rslt);
        $participants = preg_replace("/\|$/", "", $mgr_row[0]);
        $participants_array = explode("|", $participants);

        if (in_array($agent_to_add, $participants_array)) {
            echo _QXZ("Error - agent is already in this chat.");
        } else {
            $upd_stmt = "update vicidial_manager_chats set selected_agents=concat(selected_agents, '$agent_to_add|') where manager_chat_id='$manager_chat_id'";
            $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
            if (mysqli_affected_rows($link) > 0) {

                $message_id = date("U") . "." . rand(10000000, 99999999);
                $message_date = date("Y-m-d H:i:s");
                $message_posted_by = $user;

                # Five lines repeated to get all the agents currently in the chat AFTER the new agent is loaded to post an alert message to each one.
                $mgr_stmt = "select concat(manager, selected_agents) as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
                $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
                $mgr_row = mysqli_fetch_row($mgr_rslt);
                $participants = preg_replace("/\|$/", "", $mgr_row[0]);
                $participants_array = explode("|", $participants);

                # post message to each user, use $error_msg variable to ensure every insert command worked
                $error_msg = "";
                while (list($key, $val) = each($participants_array)) {
                    $participant = $val;
                    $ins_chat_stmt = "insert into vicidial_manager_chat_log(manager_chat_id, manager_chat_subid, manager, user, message, message_id, message_date, message_posted_by) VALUES('$manager_chat_id', '$manager_chat_subid', '$manager', '$participant', 'Agent $invited has been added to the chat by $invitee', '$message_id', '$message_date', '$message_posted_by')";
                    $ins_chat_rslt = mysql_to_mysqli($ins_chat_stmt, $link);
                    if (mysqli_insert_id($link) > 0) {
                        $reload_chat_span = 1;
                    } else {
                        $error_msg = _QXZ("Error sending message.");
                    }
                }
                if ($error_msg && $error_msg != "") {
                    echo _QXZ("$error_msg");
                }
            } else {
                echo _QXZ("Error adding agent to chat");
            }
        }
    } else {
        echo _QXZ("Error adding agent to chat");
    }
}

if ($action == "SendMgrChatMessage" && $manager_chat_id && $manager_chat_subid) {

    $chat_message = preg_replace("/\r/i", '', $chat_message);
    $chat_message = preg_replace("/\n/i", ' ', $chat_message);

    $mgr_stmt = "select manager, concat(manager, selected_agents), internal_chat_type as participants from vicidial_manager_chats where manager_chat_id='$manager_chat_id'";
    $mgr_rslt = mysql_to_mysqli($mgr_stmt, $link);
    $mgr_row = mysqli_fetch_row($mgr_rslt);
    $manager = $mgr_row[0];
    $participants = preg_replace("/\|$/", "", $mgr_row[1]);
    $participants_array = explode("|", $participants);
    $internal_chat_type = $mgr_row[2];

    # Removed as of 11/16/16 for agent-to-agent chat interface.  Not sure of effect.
    # if ($agent_override && $agent_override!="0") {$user=$agent_override;} // Added for agent-to-agent chatting so the manager ID and user ID don't get mixed up

    if ($manager) {
        $message_id = date("U") . "." . rand(10000000, 99999999);
        $message_date = date("Y-m-d H:i:s");
        $message_posted_by = $user;

        if ($internal_chat_type == "AGENT") {
            # post message to each user, use $error_msg variable to ensure every insert command worked.
            $error_msg = "";
            while (list($key, $val) = each($participants_array)) {
                $participant = $val;

                $ins_chat_stmt = "insert into vicidial_manager_chat_log(manager_chat_id, manager_chat_subid, manager, user, message, message_id, message_date, message_posted_by) VALUES('$manager_chat_id', '$manager_chat_subid', '$manager', '$participant', '" . mysqli_real_escape_string($link, $chat_message) . "', '$message_id', '$message_date', '$user')";
                $ins_chat_rslt = mysql_to_mysqli($ins_chat_stmt, $link);
                if (mysqli_insert_id($link) > 0) {
                    $reload_chat_span = 1;
                } else {
                    $error_msg = "Error sending message.";
                }
            }
            if ($error_msg && $error_msg != "") {
                echo _QXZ("$error_msg");
            }
        } else {
            # Only post one message to the proper sub id - both agent and manager see these.
            $ins_chat_stmt = "insert into vicidial_manager_chat_log(manager_chat_id, manager_chat_subid, manager, user, message, message_id, message_date, message_posted_by) VALUES('$manager_chat_id', '$manager_chat_subid', '$manager', '$user', '" . mysqli_real_escape_string($link, $chat_message) . "', '$message_id', '$message_date', '$message_posted_by')";
            $ins_chat_rslt = mysql_to_mysqli($ins_chat_stmt, $link);
            if (mysqli_insert_id($link) > 0) {
                $reload_chat_span = 1;
            } else {
                $error_msg = "Error sending message.";
            }
        }
    } else {
        echo _QXZ("Error sending message.");
    }
}
######################################

if ($action == "assign_chat" && $chat_id) { # Assign available vicidial_agent to chat
}

###### CUSTOMER-AGENT CHAT FUNCTIONS ######
if ($action == "start_chat" && $user && $server_ip) {
    if (!$chat_group_id) {
        echo "NO_GROUP";
    } else {
        $user_stmt = "select if(user_nickname!='' and user_nickname is not null, user_nickname, full_name) from vicidial_users where user='$user'";
        $user_rslt = mysql_to_mysqli($user_stmt, $link);
        if (mysqli_num_rows($user_rslt) > 0) {
            $live_agent_stmt = "select * from vicidial_live_agents where user='$user' and status='PAUSED'";
            $live_agent_rslt = mysql_to_mysqli($live_agent_stmt, $link);
            if (mysqli_num_rows($live_agent_rslt) > 0) {
                $user_row = mysqli_fetch_row($user_rslt);
                $user_name = "$user_row[0]";

                $upd_stmt = "UPDATE vicidial_live_agents set status='INCALL',comments='CHAT',last_call_time='$NOW_TIME',external_hangup=0,external_status='',external_pause='',external_dial='',last_state_change='$NOW_TIME',pause_code='' where user='$user' and server_ip='$server_ip';";
                $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
                if (mysqli_affected_rows($link) > 0) {
                    $ins_stmt = "insert into vicidial_live_chats(chat_creator, chat_start_time, status, group_id) values('$user', now(), 'WAITING', '$chat_group_id')";
                    $ins_rslt = mysql_to_mysqli($ins_stmt, $link);

                    $chat_id = mysqli_insert_id($link);
                    if ($chat_id) {
                        $ins_stmt2 = "insert into vicidial_chat_participants(chat_id, chat_member, chat_member_name, vd_agent) values('$chat_id', '$user', '$user_name', 'Y')";
                        $ins_rslt2 = mysql_to_mysqli($ins_stmt2, $link);
                        echo $chat_id;
                    } else {
                        echo "0";
                    }
                } else {
                    echo "FAILED_LIVE_STATUS";
                }
            } else {
                echo "NOT_PAUSED";
            }
        } else {
            echo "0";
        }
    }
}

/* Customers have separate function  file - customer_chat_functions.php */
if ($action == "agent_send_message" && $chat_id) {
    $live_stmt = "select status from vicidial_live_chats where chat_id='$chat_id'";
    $live_rslt = mysql_to_mysqli($live_stmt, $link);

    if ($user && $chat_message && $chat_id && mysqli_num_rows($live_rslt) > 0) {
        $live_row = mysqli_fetch_row($live_rslt);
        $status = $live_row[0];
        if ($status == "WAITING") {
            echo _QXZ("Chat is waiting for an agent") . ": $chat_id";
        } else {
            if ($status == "LIVE") {
                $ins_stmt = "insert ignore into vicidial_chat_log(chat_id, message, poster, chat_member_name, chat_level) VALUES('$chat_id', '" . mysqli_real_escape_string($link, $chat_message) . "', '$user', '" . mysqli_real_escape_string($link, $chat_member_name) . "', '$chat_level')";
                $ins_rslt = mysql_to_mysqli($ins_stmt, $link);
                if (mysqli_affected_rows($link) < 1) {
                    echo "<font class='chat_title alert'>" . _QXZ("SYSTEM ERROR") . "</font><BR/>\n";
                }
            } else {
                echo "<font class='chat_title alert'>" . _QXZ("SYSTEM ERROR") . "</font><BR/>\n";
            }
        }
    } else if (mysqli_num_rows($rslt) == 0) {
        echo _QXZ("Chat has been closed") . ": $chat_id";
    }
}

if ($action == "xfer_chat" && $user && $chat_id && $chat_xfer_value && $chat_xfer_type) {
    $stmt = "select group_id from vicidial_live_chats where chat_id='$chat_id'";
    $rslt = mysql_to_mysqli($stmt, $link);
    if (mysqli_num_rows($rslt) == 0) {
        echo "ERROR";
        exit;
    } else {
        $row = mysqli_fetch_row($rslt);
        $group_id = $row[0];
    }

    if ($chat_xfer_type == "group") {
        $upd_stmt = "update vicidial_live_chats set group_id='$chat_xfer_value', status='WAITING', chat_creator='NONE', transferring_agent='$user' where chat_id='$chat_id'";
        $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
    } else {
        $upd_stmt = "update vicidial_live_chats set group_id='AGENTDIRECT_CHAT', user_direct='$chat_xfer_value', user_direct_group_id='$group_id', status='WAITING', transferring_agent='$user' where chat_id='$chat_id'";
        $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
    }
    echo mysqli_affected_rows($link) . "|";

    if (mysqli_affected_rows($link) == 1) {
        $log_upd_stmt = "insert into vicidial_chat_log(chat_id, message, message_time, poster, chat_member_name, chat_level) VALUES('$chat_id', 'Chat transferred to " . strtoupper($chat_xfer_type) . " " . strtoupper($chat_xfer_value) . "', now(), '$user', '" . mysqli_real_escape_string($link, $chat_member_name) . "', '1')";
        $log_upd_rslt = mysql_to_mysqli($log_upd_stmt, $link);

        $upd_stmt = "UPDATE vicidial_live_agents set status='PAUSED',comments='',external_hangup=0,external_status='',external_pause='',external_dial='',last_state_change='$NOW_TIME',pause_code='' where user='$user' and server_ip='$server_ip' and status='INCALL' and comments='CHAT'";
        $upd_rslt = mysql_to_mysqli($upd_stmt, $link);

        $del_stmt = "delete from vicidial_chat_participants where chat_member='$user' and chat_id='$chat_id'";
        $del_rslt = mysql_to_mysqli($del_stmt, $link);

        $vla_stmt = "select closer_campaigns from vicidial_live_agents where user='$user'";
        $vla_rslt = mysql_to_mysqli($vla_stmt, $link);
        echo "<BR/><BR/><input class='green_btn' type='button' style=\"width:150px\" value=\"" . _QXZ("START CHAT") . "\" onClick=\"StartChat()\">";
        echo "<BR/><BR/><select name='startchat_group_id' id='startchat_group_id' class='chat_window' onChange=\"document.getElementById('chat_group_id').value=this.value\">";
        echo "<option value='' selected>--" . _QXZ("SELECT A CHAT GROUP") . "--</option>";
        if (mysqli_num_rows($vla_rslt) > 0) {
            $vla_row = mysqli_fetch_row($vla_rslt);
            $closer_campaigns = trim($vla_row[0]);
            $closer_campaigns = preg_replace('/\s/', '\',\'', $closer_campaigns);
            $closer_campaigns_SQL = "'" . $closer_campaigns . "'";

            $group_stmt = "select group_id, group_name from vicidial_inbound_groups where group_handling='CHAT' and group_id in ($closer_campaigns_SQL) order by group_name asc";
            $group_rslt = mysql_to_mysqli($group_stmt, $link);
            while ($group_row = mysqli_fetch_row($group_rslt)) {
                echo "<option value='" . $group_row[0] . "'>" . $group_row[1] . "</option>";
            }
        }
        echo "</select>";
        echo "|"; // DO NOT ECHO TOGGLE DIAL CONTROL HERE.  WE DO NOT WANT THE AGENT'S PAUSE BUTTON REACTIVATED YET.
    }
}


if ($action == "agent_leave_chat" && $user && $chat_id) {
    $del_stmt2 = "delete from vicidial_chat_participants where chat_id='$chat_id' and chat_member='$user'";
    $del_rslt2 = mysql_to_mysqli($del_stmt2, $link);
    $deleted_participants = mysqli_affected_rows($link);
    if ($deleted_participants > 0) {
        # ERASE THE CHAT IF THE PERSON NEVER GOT PICKED UP - I DON'T REMEMBER WHY I MOVED customer_leave_chat TO leave_chat
        $stmt = "select lead_id from vicidial_live_chats where chat_id='$chat_id' and status='WAITING' and chat_creator='NONE'";
        $rslt = mysql_to_mysqli($stmt, $link);
        if (mysqli_num_rows($rslt) > 0) {
            $row = mysqli_fetch_row($rslt);
            $lead_id = $row[0];
            # CHECK IF SHOULD USE SPECIAL DROP STATUS 'CDROP' FOR DROPPED CHATS
            $upd_stmt = "update vicidial_list set status='CDROP' where lead_id='$lead_id'";
            $upd_rslt = mysql_to_mysqli($upd_stmt, $link);

            $ins_stmt = "insert ignore into vicidial_chat_archive select * From vicidial_live_chats where chat_id='$chat_id'";
            $ins_rslt = mysql_to_mysqli($ins_stmt, $link);

            # DELETE ONLY IF NO ONE'S LEFT IN THE CHAT AFTER THIS POINT
            $del_stmt = "delete from vicidial_live_chats where chat_id='$chat_id' and status='WAITING' and chat_creator='NONE' and (select count(*) from vicidial_chat_participants where chat_id='$chat_id')=0;";
            $del_rslt = mysql_to_mysqli($del_stmt, $link);
        }
    }
}

if ($action == "update_agent_chat_window" && $chat_id) {
    $status_stmt = "select status, chat_creator from vicidial_live_chats where chat_id='$chat_id'";
    $status_rslt = mysql_to_mysqli($status_stmt, $link);
    if (mysqli_num_rows($status_rslt) == 0) {
//        echo "<font class='chat_title alert'>" . _QXZ("Chat does not exist or has been closed") . ": $chat_id</font><BR/>\n";
        echo "<div class='alert alert-success fade show' role='alert'><h4 class='alert-heading'>Chat Closed!!</h4>".
                                                "<p>"._QXZ("Chat does not exist or has been closed")." : ".$chat_id."</p></div>";
    } else {
        $status_row = mysqli_fetch_row($status_rslt);

        ## Modify user's ping date to verify they are still participating
        if ($user && $keepalive) {
            $upd_stmt = "update vicidial_chat_participants set ping_date=now() where chat_member='$user' and chat_id='$chat_id'";
            $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
        }

        ## CHECK IF CHAT IS ACTIVE, IF SO GRAB DISTINCT USERS IN ORDER OF POST TO ASSIGN COLORS
        if ($status_row[0] == "LIVE") {
            $live_stmt = "select * from vicidial_live_chats vlc, vicidial_chat_participants vcp where vlc.chat_id='$chat_id' and status='LIVE' and vlc.chat_id=vcp.chat_id and vcp.chat_member='$user'";
            $live_rslt = mysql_to_mysqli($live_stmt, $link);
            if (mysqli_num_rows($live_rslt) > 0) {
//                    $querySelect = "SELECT * FROM vicidial_list WHERE lead_id = ";
                    $LeadID = $database->get('vicidial_live_chats','lead_id',['chat_id'=>$chat_id]);
                    if(!empty($LeadID) && $LeadID){
                        $LeadDetail = $database->get('vicidial_list',['first_name','last_name'],['lead_id'=>$LeadID]);
//                        echo "<div style='position:fixed;left:38%;'><b>"._QXZ('Current chat')." : ". $chat_id." : ".$LeadDetail['first_name']." ".$LeadDetail['last_name']."</b></div>";
                    }else{
//                        echo "<font class='chat_title bold'>"._QXZ("Current chat").": $chat_id : </font><BR/>";
                    }
                # Create color-coding for chat
                $stmt = "select * from vicidial_chat_log where chat_id='$chat_id' order by message_time asc";

                $rslt = mysql_to_mysqli($stmt, $link);
                $chat_members = array();
                while ($row = mysqli_fetch_row($rslt)) {
                    if (!in_array("$row[4]", $chat_members)) {
                        array_push($chat_members, "$row[4]");
                    }
                }

                $chat_color_stmt = "select std_row1_background, std_row2_background, std_row3_background, std_row4_background, std_row5_background, alt_row1_background, alt_row2_background, alt_row3_background from system_settings s, vicidial_screen_colors v where s.agent_chat_screen_colors=v.colors_id and length(std_row1_background)=6 and length(std_row2_background)=6 and s.agent_chat_screen_colors!='default' limit 1;";
                $color_rslt = mysql_to_mysqli($chat_color_stmt, $link);
                if (mysqli_num_rows($color_rslt) > 0 && $use_agent_colors > 0) {
                    $color_row = mysqli_fetch_array($color_rslt);
                    $color_array = array("#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000", "#000000");
                    $chat_background_array = array("#$color_row[std_row1_background]", "#$color_row[std_row2_background]", "#$color_row[std_row3_background]", "#$color_row[std_row4_background]", "#$color_row[std_row5_background]", "#$color_row[alt_row1_background]", "#$color_row[alt_row2_background]", "#$color_row[alt_row3_background]");
                } else {
                    $color_array = array("#CC0000", "#009900", "#000099", "#999900", "#993300", "#330066", "#009999", "#660033");
                    $chat_background_array = array("#FFCCCC", "#CCFFCC", "#CCCCFF", "#FFFFCC", "#FFCC99", "#CC99FF", "#CCFFFF", "#FF99CC");
                }

                ## GRAB CHAT MESSAGES AND DISPLAY THEM
                if (!$user_level || $user_level == 0) {
                    $user_level_clause = " and chat_level='0' ";
                } else {
                    $user_level_clause = "";
                }

                $stmt = "select * from vicidial_chat_log where chat_id='$chat_id' $user_level_clause order by message_time asc";

//				echo "<table border='0' cellpadding='3' width='100%'>";
                $rslt = mysql_to_mysqli($stmt, $link);
//				while ($row=mysqli_fetch_row($rslt)) {
//					$chat_color_key=array_search("$row[4]", $chat_members);
//					$row[2]=preg_replace('/\n/', '<BR/>', $row[2]);
//					echo "<tr><td bgcolor='$chat_background_array[$chat_color_key]'><li><font color='$color_array[$chat_color_key]' class='chat_message bold'>$row[5]</font> <font class='chat_timestamp bold'>($row[3])</font> - <font class='chat_message ".$style_array[$row[6]]."'>$row[2]</font></li></td></tr>";
//				}
//				echo "</table>";

                while ($row = mysqli_fetch_row($rslt)) {
                    if ($user == $row[4]) {
//                        echo '<div class="message me">' .
//                                '<div class="text-main">' .
//                                '<div class="text-group me">' .
//                                '<div class="text me">' .
//                                '<p>'.$row[2].'OK</p>' .
//                                '</div>' .
//                                '</div>' .
//                                '<span>'.date('H:i A',strtotime($row[3])).'</span> </div>' .
//                                '</div>';
                        echo '<div class="chat-box-wrapper">'.
                                        '<div>'.
                                            '<div class="avatar-icon-wrapper mr-1">'.
                                                '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>'.
                                                '<div class="avatar-icon avatar-icon-lg rounded">'.
                                                    '<img src="../assets/chat/images/agent.png" alt=""></div>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div>'.
                                            '<div class="chat-box">'.$row[2].'</div>'.
                                            '<small class="opacity-6">'.
                                                '<i class="fa fa-calendar-alt mr-1"></i>'.date("H:i A",strtotime($row[3])).' | Yesterday'.
                                            '</small>'.
                                        '</div>'.
                                    '</div>';
                    } else {
//                            echo '<div class="message">'.
//                                '<img class="avatar-md" src="data:image/png;base64,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" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">'.
//                                    '<div class="text-main">'.
//                                      '<div class="text-group">'.
//                                        '<div class="text">'.
//                                          '<p>'.$row[2].'</p>'.
//                                        '</div>'.
//                                      '</div>'.
//                                      '<span>'.date('H:i A',strtotime($row[3])).'</span> </div>'.
//                                  '</div>';
                        echo '<div class="float-right">'.
                                        '<div class="chat-box-wrapper chat-box-wrapper-right">'.
                                            '<div>'.
                                                '<div class="chat-box">'.$row[2].'</div>'.
                                                '<small class="opacity-6">'.
                                                    '<i class="fa fa-calendar-alt mr-1"></i>'.date("H:i A",strtotime($row[3])).' | Yesterday'.
                                                '</small>'.
                                            '</div>'.
                                            '<div>'.
                                                '<div class="avatar-icon-wrapper ml-1">'.
                                                    '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>'.
                                                    '<div class="avatar-icon avatar-icon-lg rounded"><img src="../assets/chat/images/customer.png" alt=""></div>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';

                    }
                }

                ## PLAY AUDIO FILE IF THERE ARE NEW MESSAGES
                $current_messages = mysqli_num_rows($rslt);
				echo "<input type='hidden' id='current_message_count' name='current_message_count' value='$current_messages'>\n$current_messages";
            } else {
                echo "<font class='chat_title bold'>" . _QXZ("Click on a live chat at right to join it.") . "</font><BR/>\n";
            }
        } else {
            if ($status_row[1] == "NONE") {
                echo "<font class='chat_title bold'>" . _QXZ("Waiting for next available agent...") . "</font><BR/>\n";
                # 8/28 - Added in case agent starts chat but hasn't invited someone or they haven't shown up yet
            } else if ($status_row[1] == $user || $status_row[0] == "WAITING") {
                echo "<font class='chat_title bold'>" . _QXZ("Please send an invite to the customer to begin...") . "</font><BR/>\n";
            } else {
                echo "<font class='chat_title alert'>" . _QXZ("SYSTEM ERROR") . "</font><BR/>\n";
            }
        }
    }
}

### CURRENTLY DEFUNCT
/*
  if ($action=="customer_leave_chat" && $chat_id) {
  $del_stmt2="delete from vicidial_chat_participants where chat_id='$chat_id' and chat_member='$user'";
  $del_rslt2=mysql_to_mysqli($del_stmt2, $link);
  $deleted_participants=mysqli_affected_rows($link);

  $archive_stmt="insert ignore into vicidial_chat_archive select chat_id, chat_start_time, 'DROP' as status, chat_creator, group_id, lead_id from vicidial_live_chats where chat_id='$chat_id'  and status='WAITING' and chat_creator='NONE'";
  $archive_rslt=mysql_to_mysqli($archive_stmt, $link);
  if (mysqli_affected_rows($link)>0) {
  $del_stmt="delete from vicidial_live_chats where chat_id='$chat_id' and status='WAITING' and chat_creator='NONE'";
  $del_rslt=mysql_to_mysqli($del_stmt, $link);
  }
  }
 */
#####################################

if ($action == "send_invite" && $chat_id && $email && $chat_group_id) {
    $chat_stmt = "select chat_url from system_settings";
    $chat_rslt = mysql_to_mysqli($chat_stmt, $link);
    $chat_row = mysqli_fetch_row($chat_rslt);
    $chat_url = $chat_row[0];

    ## Check if person being emailed exists as a lead
    $email_stmt = "select lead_id from vicidial_list where email='$email' order by lead_id desc limit 1";
    $email_rslt = mysql_to_mysqli($email_stmt, $link);
    if (mysqli_num_rows($email_rslt) > 0) {
        $email_row = mysqli_fetch_row($email_rslt);
        $lead_id = $email_row[0];
    } else {
        $ins_stmt = "insert into vicidial_list(status, email, list_id, security_phrase) VALUES('NEW', '$email', '$default_list_id', '$chat_group_id')";
        $ins_rslt = mysql_to_mysqli($ins_stmt, $link);
        $lead_id = mysqli_insert_id($link);
    }

    if ($lead_id) {
        $to = "$email";
        $from = 'vicidial_chat_bot@vicidial.com';
        $subject = "VICIDIAL CHAT INVITE - DO NOT REPLY TO THIS EMAIL";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "To: $email\r\n";
        $headers .= "From: $from\r\n";

        $unique_userID = time() . "." . rand(10000, 99999);

        $user_stmt = "select full_name from vicidial_users where user='$user'";
        $user_rslt = mysql_to_mysqli($user_stmt, $link);
        $user_row = mysqli_fetch_row($user_rslt);
        $user_name = $user_row[0];

        $message = "<html>
		<head>
		  <title>Invitation to ViciDIAL chat</title>
		</head>
		<body>
		  <p>$user_name has invited you to participate in a Vicidial Chat<BR>

		  <p><a href='" . $chat_url . "?unique_userID=" . urlencode($unique_userID) . "&lead_id=$lead_id&chat_group_id=" . urlencode($chat_group_id) . "&chat_id=$chat_id&email=" . urlencode($email) . "'>JOIN CHAT</A><BR>

		  <p>Enter your name, which will allow you to start chatting with the Vicidial agent.<BR>
		</body>
		</html>";

        #	  <table>
        #		<tr>
        #		  <th>PUT FORM HERE LATER</th>
        #		</tr>
        #	  </table>


        $sendmail = @mail($to, $subject, $message, $headers);
    }

    if ($sendmail) {
        $upd_stmt = "update vicidial_live_chats set lead_id='$lead_id' where chat_id='$chat_id'";
        $upd_rslt = mysql_to_mysqli($upd_stmt, $link);
        if (mysqli_affected_rows($link) > 0) {
            echo "$lead_id";
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
}

if ($action == "load_xfer_options" && $user && $chat_group_id) {
    $vla_stmt = "select vla.campaign_id, vug.agent_allowed_chat_groups from vicidial_live_agents vla, vicidial_users vu, vicidial_user_groups vug where vla.user='$user' and vla.user=vu.user and vu.user_group=vug.user_group";
    $vla_rslt = mysql_to_mysqli($vla_stmt, $link);
    if (mysqli_num_rows($vla_rslt) > 0) {
        $vla_row = mysqli_fetch_row($vla_rslt);
        $user_campaign_id = trim($vla_row[0]);
        $allowed_chat_user_groups = trim($vla_row[1]);
    }

    $xfer_group_stmt = "select xfer_groups from vicidial_campaigns where campaign_id='$user_campaign_id'";
    $xfer_group_rslt = mysql_to_mysqli($xfer_group_stmt, $link);
    if (mysqli_num_rows($xfer_group_rslt) > 0) {
        $xfer_row = mysqli_fetch_row($xfer_group_rslt);
        $xfer_groups = trim($xfer_row[0]);
        $xfer_groups = preg_replace('/\s/', '\',\'', $xfer_groups);
        $xfer_groups_SQL = "'" . $xfer_groups . "'";
    }

    $chat_groups_array = array();
    $chat_group_names_array = array();
    $chat_agents_array = array();
    $chat_agent_names_array = array();

    $group_stmt = "select group_id, group_name from vicidial_inbound_groups where group_handling='CHAT' and group_id in ($xfer_groups_SQL) order by group_name asc";
    $group_rslt = mysql_to_mysqli($group_stmt, $link);
    if (mysqli_num_rows($group_rslt) > 0) {
        while ($group_row = mysqli_fetch_row($group_rslt)) {
            # echo "<option value='".$group_row[0]."'>".$group_row[1]."</option>";
            array_push($chat_groups_array, $group_row[0]);
            array_push($chat_group_names_array, $group_row[1]);
        }
    } else {
        array_push($chat_groups_array, "");
        array_push($chat_group_names_array, "** " . _QXZ("NO AVAILABLE GROUPS") . " **");
    }

    echo implode("|", $chat_groups_array) . "\n" . implode("|", $chat_group_names_array);
    echo "\n";

    $user_group_SQL = "";
    if (preg_match('/\-\-CAMPAIGN\-AGENTS\-\-/')) {
        $user_group_SQL .= "vla.campaign_id='$user_campaign_id' or ";
        $allowed_chat_user_groups = trim(preg_replace('/\-\-CAMPAIGN\-AGENTS\-\-/', '', $allowed_chat_user_groups));
    }
    if (!preg_match('/\-\-ALL\-GROUPS\-\-/', $allowed_chat_user_groups)) {
        $allowed_chat_user_groups = preg_replace('/\s/', '\',\'', $allowed_chat_user_groups);
        $user_group_SQL .= "vu.user_group in ('$allowed_chat_user_groups')";
    } else {
        $user_group_SQL .= "vu.user_group not in ('')";
    }
    $user_group_SQL = preg_replace('/ or $/', '', $user_group_SQL);
    if (strlen($user_group_SQL) > 0) {
        $available_agents_SQL = "and ($user_group_SQL)";
    } else {
        $available_agents_SQL = "";
    }

    $agent_stmt = "select vu.user, full_name from vicidial_live_agents vla, vicidial_users vu, vicidial_campaigns vc where vla.user!='$user' and vla.user=vu.user and vla.campaign_id=vc.campaign_id and vc.allow_chats='Y' $available_agents_SQL order by full_name asc";
    $agent_rslt = mysql_to_mysqli($agent_stmt, $link);
    if (mysqli_num_rows($agent_rslt) > 0) {
        while ($agent_row = mysqli_fetch_row($agent_rslt)) {
#			echo "<option value='".$agent_row[0]."'>".$agent_row[0]." - ".$agent_row[1]."</option>";
            array_push($chat_agents_array, $agent_row[0]);
            array_push($chat_agent_names_array, $agent_row[1]);
        }
    } else {
        array_push($chat_agents_array, "");
        array_push($chat_agent_names_array, "** " . _QXZ("NO AVAILABLE AGENTS") . " **");
    }

    echo implode("|", $chat_agents_array) . "\n" . implode("|", $chat_agent_names_array);
}

if ($action == "end_chat" && $chat_id && $chat_creator && $user && $server_ip) {
    # Check that chat is actually ending by the agent and not a transfer
    if ($chat_creator == "XFER") {
        echo "Leaving XFER|";
        # At this point this should only be coming from the 'HANGUP CUSTOMER' button, so once that is clicked it is safe to make the 'START CHAT' available again.
        $vla_stmt = "select closer_campaigns from vicidial_live_agents where user='$user'";
        $vla_rslt = mysql_to_mysqli($vla_stmt, $link);
        echo "<BR/><BR/><input class='green_btn' type='button' style=\"width:150px\" value=\"" . _QXZ("START CHAT") . "\" onClick=\"StartChat()\">";
        echo "<BR/><BR/><select name='startchat_group_id' id='startchat_group_id' class='chat_window' onChange=\"document.getElementById('chat_group_id').value=this.value\">";
        echo "<option value='' selected>--" . _QXZ("SELECT A CHAT GROUP") . "--</option>";
        if (mysqli_num_rows($vla_rslt) > 0) {
            $vla_row = mysqli_fetch_row($vla_rslt);
            $closer_campaigns = trim($vla_row[0]);
            $closer_campaigns = preg_replace('/\s/', '\',\'', $closer_campaigns);
            $closer_campaigns_SQL = "'" . $closer_campaigns . "'";

            $group_stmt = "select group_id, group_name from vicidial_inbound_groups where group_handling='CHAT' and group_id in ($closer_campaigns_SQL) order by group_name asc";
            $group_rslt = mysql_to_mysqli($group_stmt, $link);
            while ($group_row = mysqli_fetch_row($group_rslt)) {
                echo "<option value='" . $group_row[0] . "'>" . $group_row[1] . "</option>";
            }
        }
        echo "</select>";
        echo "|TOGGLE_DIAL_CONTROL";

        exit;
    } else if ($user != $chat_creator) {
        echo _QXZ("You cannot end this chat unless you are the one who started it.");
        exit;
    }

    $archive_stmt = "insert ignore into vicidial_chat_archive select * from vicidial_live_chats where chat_id='$chat_id'";
    $archive_rslt = mysql_to_mysqli($archive_stmt, $link);

    $archive_log_stmt = "insert ignore into vicidial_chat_log_archive select * from vicidial_chat_log where chat_id='$chat_id'";
    $archive_log_rslt = mysql_to_mysqli($archive_log_stmt, $link);

    $del_stmt = "delete from vicidial_live_chats where chat_id='$chat_id' and chat_creator='$chat_creator'";
    $del_rslt = mysql_to_mysqli($del_stmt, $link);
    if (mysqli_affected_rows($link) == 0) {
        echo _QXZ("Warning: chat ID not found. Deleting any remaining participants...") . "<BR><BR>";
    } else {
        echo _QXZ("Chat ended") . "<BR><BR>";
    }
    $del_log_stmt = "delete from vicidial_chat_log where chat_id='$chat_id'";
    $del_log_rslt = mysql_to_mysqli($del_log_stmt, $link);

    $del_stmt2 = "delete from vicidial_chat_participants where chat_id='$chat_id'";
    $del_rslt2 = mysql_to_mysqli($del_stmt2, $link);
    $deleted_participants = mysqli_affected_rows($link);

    echo "$deleted_participants " . _QXZ("removed from chat.");

    # HTML to display after ending chat - will only display again if no lead_id, i.e. no customer involved and no dispositioning needed.
    echo "|";
    if (!$lead_id) {
        $upd_stmt = "UPDATE vicidial_live_agents set status='PAUSED',comments='',external_hangup=0,external_status='',external_pause='',external_dial='',last_state_change='$NOW_TIME',pause_code='' where user='$user' and server_ip='$server_ip' and status='INCALL' and comments='CHAT'";
        $upd_rslt = mysql_to_mysqli($upd_stmt, $link);

        $vla_stmt = "select closer_campaigns from vicidial_live_agents where user='$user'";
        $vla_rslt = mysql_to_mysqli($vla_stmt, $link);
        echo "<BR/><BR/><input class='green_btn' type='button' style=\"width:150px\" value=\"" . _QXZ("START CHAT") . "\" onClick=\"StartChat()\">";
        echo "<BR/><BR/><select name='startchat_group_id' id='startchat_group_id' class='chat_window' onChange=\"document.getElementById('chat_group_id').value=this.value\">";
        echo "<option value='' selected>--" . _QXZ("SELECT A CHAT GROUP") . "--</option>";
        if (mysqli_num_rows($vla_rslt) > 0) {
            $vla_row = mysqli_fetch_row($vla_rslt);
            $closer_campaigns = trim($vla_row[0]);
            $closer_campaigns = preg_replace('/\s/', '\',\'', $closer_campaigns);
            $closer_campaigns_SQL = "'" . $closer_campaigns . "'";

            $group_stmt = "select group_id, group_name from vicidial_inbound_groups where group_handling='CHAT' and group_id in ($closer_campaigns_SQL) order by group_name asc";
            $group_rslt = mysql_to_mysqli($group_stmt, $link);
            while ($group_row = mysqli_fetch_row($group_rslt)) {
                echo "<option value='" . $group_row[0] . "'>" . $group_row[1] . "</option>";
            }
        }
        echo "</select>";
        echo "|TOGGLE_DIAL_CONTROL";
    }
}

if ($action == "join_chat" && $user && $chat_id && $chat_member_name) {
    # REMOVE AGENT FROM OTHER CHATS, JUST IN CASE
    $del_stmt = "delete from vicidial_chat_participants where chat_member='$user'";
    $del_rslt = mysql_to_mysqli($del_stmt, $link);

    $nickname_stmt = "select user_nickname from vicidial_users where user='$user' and user_nickname is not null and user_nickname!=''";
    $nickname_rslt = mysql_to_mysqli($nickname_stmt, $link);
    if (mysqli_num_rows($nickname_rslt) > 0) {
        $nickname_row = mysqli_fetch_array($nickname_rslt);
        $chat_member_name = $nickname_row["user_nickname"];
    }

    $ins_stmt = "insert into vicidial_chat_participants(chat_id, chat_member, chat_member_name, vd_agent) values('$chat_id', '$user', '" . mysqli_real_escape_string($link, $chat_member_name) . "', 'Y')";
    $ins_rslt = mysql_to_mysqli($ins_stmt, $link);
    if (mysqli_affected_rows($link) == 0) {
        echo "ERROR|" . _QXZ("Chat was not joined.");
    } else {
        $creator_stmt = "select chat_creator from vicidial_live_chats where chat_id='$chat_id'";
        $creator_rslt = mysql_to_mysqli($creator_stmt, $link);
        if (mysqli_num_rows($creator_rslt) > 0) {
            $crow = mysqli_fetch_row($creator_rslt);
            echo "$crow[0]";
        } else {
            echo "ERROR|" . _QXZ("You have joined a non-existent chat.  Trippy.") . "\n";
        }
    }
}

if ($action == "show_live_chats" && $user) {
    echo "<ul id=\"treemenu1\" class=\"treeview\">\n";
    if ($user && $pass) {
        $user_stmt = "select full_name from vicidial_users where user='$user' and pass='$pass'";
        $user_rslt = mysql_to_mysqli($user_stmt, $link);
        $vicidial_user = mysqli_num_rows($user_rslt);
        $vicidial_user_row = mysqli_fetch_row($user_rslt);
        $full_name = $vicidial_user_row[0];
    }

    $active_chats = array();
    $agents_in_chat = array();
    $absent_agents = array();
    if ($vicidial_user) { # If you aren't a vicidial_user you aren't going to see the chat window.
        $stmt = "select vlc.chat_id, vcp.chat_member, vcp.chat_member_name, vlc.chat_creator, vcp.vd_agent from vicidial_live_chats vlc, vicidial_chat_participants vcp where vlc.chat_id=vcp.chat_id order by vlc.chat_id asc, vcp.chat_member_name asc";

        $rslt = mysql_to_mysqli($stmt, $link);
        while ($row = mysqli_fetch_row($rslt)) {
            $chat_id = $row[0];
            $chat_member = $row[1];
            $chat_member_name = $row[2];
            $chat_creator = $row[3];
            $vd_agent = $row[4];
            $active_chats[$chat_id][] = array("$chat_member", "$chat_member_name", "in chat", "$chat_creator");
            if ($vd_agent == "Y") {
                array_push($agents_in_chat, "$chat_member");
            }
        }

        # If an agent is the owner of a live chat but not a participant, they need their name displayed there.
        $empty_live_chat_stmt = "select chat_id, '$user' as chat_member, '$full_name' as chat_member, chat_creator from vicidial_live_chats where status='LIVE' and chat_creator='$user'";
        $empty_live_chat_rslt = mysql_to_mysqli($empty_live_chat_stmt, $link);
        while ($row = mysqli_fetch_row($empty_live_chat_rslt)) {
            $chat_id = $row[0];
            $chat_member = $row[1];
            $chat_member_name = $row[2];
            $empty_chat_creator = $row[3];
            if (!$active_chats[$chat_id]) {
                $active_chats[$chat_id][] = array("$chat_member", "$chat_member_name", "absent", "$empty_chat_creator");
            }
        }
    }

    if ($active_chats) {
//        echo "<font class='chat_title bold'>" . _QXZ("Live Chats") . ":</font><BR><BR>";
        while (list($key, $val) = each($active_chats)) {
            # PREVENT CLICKING ON UNAVAILABLE CHAT ROOMS
            if ($val[0][3] != "NONE") {
                echo "<li class='submenu' onClick=\"JoinChat('$key', '$chat_creator');\"><font class='chat_message bold'>" . _QXZ("Chat ID") . " #$key</font>\n";
            } else {
                echo "<li class='submenu' onClick=\"chat_alert_box('Chat room is not available - no agent has been assigned it.')\"><font class='chat_message bold'>" . _QXZ("Chat ID") . " #$key</font>\n";
            }
            echo "\t<ul id=\"chat_members_$key\">\n";
            while (list($subkey, $subval) = each($val)) {
                if ($subval[2] == "absent") {
                    $font_color = " absent_agent";
                } else if (in_array($subval[0], $agents_in_chat)) {
                    $font_color = " vd_agent";
                } else {
                    $font_color = "";
                }
                echo "\t\t<li><font class='chat_timestamp bold$font_color'>$subval[1]</font></li>\n";
            }
            echo "\t</ul>\n";
            echo "</li>\n";
        }
        echo "</ul>";
    }

    if ($rslt && mysqli_num_rows($rslt) > 0) {
//        echo "<input type='button' style='width:180px' value='" . _QXZ("CLICK CHAT TO JOIN") . "' disabled>";
        echo "<input type='button' class='btn btn-info btn-block' value='" . _QXZ("CLICK CHAT TO JOIN") . "' disabled>";
    }
}
?>
