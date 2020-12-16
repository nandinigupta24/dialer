<?php
# vdc_email_display.php - VICIDIAL agent email display script
#
# Copyright (C) 2017  Matt Florell, Joe Johnson <vicidial@gmail.com>    LICENSE: AGPLv2
#
# This page displays any incoming emails in the Vicidial user interface.  It 
# also allows the user to download and view any attachments sent in the email,
# and also gives the user the ability to respond to the email and even
# attach files to it.  The page also logs all email messages that are sent
# through it to the vicidial_email_log table
#
# changes:
# 121214-2300 - First Build
# 130127-0027 - Better non-latin characters support
# 130328-0007 - Converted ereg to preg functions
# 130603-2210 - Added login lockout for 15 minutes after 10 failed logins, and other security fixes
# 130705-1515 - Added optional encrypted passwords compatibility
# 130802-1032 - Changed to PHP mysqli functions
# 140811-0834 - Changed to use QXZ function for echoing text
# 141118-1426 - Added agent_email variable
# 141128-0850 - Code cleanup for QXZ functions
# 141216-2117 - Added language settings lookups and user/pass variable standardization
# 150603-1541 - Fixed email attachments issue
# 170526-2330 - Added additional variable filtering
# 171126-1406 - Added fault tolerance and extra debug
#

$version = '2.14-13';
$build = '171126-1406';

require_once("dbconnect_mysqli.php");
require_once("functions.php");
require_once '../db/database.php';

$SMTPData = $DBEmail->get('smtp', ['host', 'username', 'password', 'port', 'encryption'], ['active' => 'Y']);
if (empty($SMTPData)) {
    die('Please provide SMTP detail!!');
}


if (isset($_GET["DB"])) {
    $DB = $_GET["DB"];
} elseif (isset($_POST["DB"])) {
    $DB = $_POST["DB"];
}
if (isset($_GET["attachment_id"])) {
    $attachment_id = $_GET["attachment_id"];
} elseif (isset($_POST["attachment_id"])) {
    $attachment_id = $_POST["attachment_id"];
}
if (isset($_GET["lead_id"])) {
    $lead_id = $_GET["lead_id"];
} elseif (isset($_POST["lead_id"])) {
    $lead_id = $_POST["lead_id"];
}
if (isset($_GET["email_row_id"])) {
    $email_row_id = $_GET["email_row_id"];
} elseif (isset($_POST["email_row_id"])) {
    $email_row_id = $_POST["email_row_id"];
}
if (isset($_GET["campaign"])) {
    $campaign = $_GET["campaign"];
} elseif (isset($_POST["campaign"])) {
    $campaign = $_POST["campaign"];
}
if (isset($_GET["user"])) {
    $user = $_GET["user"];
} elseif (isset($_POST["user"])) {
    $user = $_POST["user"];
}
if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];
} elseif (isset($_POST["pass"])) {
    $pass = $_POST["pass"];
}
if (isset($_GET["stage"])) {
    $stage = $_GET["stage"];
} elseif (isset($_POST["stage"])) {
    $stage = $_POST["stage"];
}
if (isset($_GET["sender_email"])) {
    $sender_email = $_GET["sender_email"];
} elseif (isset($_POST["sender_email"])) {
    $sender_email = $_POST["sender_email"];
}
if (isset($_GET["reply_subject"])) {
    $reply_subject = $_GET["reply_subject"];
} elseif (isset($_POST["reply_subject"])) {
    $reply_subject = $_POST["reply_subject"];
}
if (isset($_GET["reply_to_address"])) {
    $reply_to_address = $_GET["reply_to_address"];
} elseif (isset($_POST["reply_to_address"])) {
    $reply_to_address = $_POST["reply_to_address"];
}
if (isset($_GET["reply_from_address"])) {
    $reply_from_address = $_GET["reply_from_address"];
} elseif (isset($_POST["reply_from_address"])) {
    $reply_from_address = $_POST["reply_from_address"];
}
if (isset($_GET["reply_message"])) {
    $reply_message = $_GET["reply_message"];
} elseif (isset($_POST["reply_message"])) {
    $reply_message = $_POST["reply_message"];
}
if (isset($_GET["REPLY"])) {
    $REPLY = $_GET["REPLY"];
} elseif (isset($_POST["REPLY"])) {
    $REPLY = $_POST["REPLY"];
}
if (isset($_GET["agent_email"])) {
    $agent_email = $_GET["agent_email"];
} elseif (isset($_POST["agent_email"])) {
    $agent_email = $_POST["agent_email"];
}

header("Content-type: text/html; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header("Pragma: no-cache");                          // HTTP/1.0

if ($stage == 'WELCOME') {
    echo "EMAIL";
    exit;
}

$txt = '.txt';
$StarTtime = date("U");
$NOW_DATE = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$CIDdate = date("mdHis");
$ENTRYdate = date("YmdHis");
$MT[0] = '';
$agents = '@agents';
$script_height = ($script_height - 20);
if (strlen($bgcolor) < 6) {
    $bgcolor = 'FFFFFF';
}

$IFRAME = 0;

$user = preg_replace("/\'|\"|\\\\|;| /", "", $user);
$pass = preg_replace("/\'|\"|\\\\|;| /", "", $pass);
$campaign = preg_replace("/\'|\"|\\\\|;/", "", $campaign);
$attachment_id = preg_replace("/[^0-9]/", "", $attachment_id);
$lead_id = preg_replace('/[^0-9]/', '', $lead_id);
$email_row_id = preg_replace('/[^0-9]/', '', $email_row_id);
$reply_to_address = preg_replace("/\'|\"|\\\\|;/", "", $reply_to_address);

#############################################
##### START SYSTEM_SETTINGS AND USER LANGUAGE LOOKUP #####
$VUselected_language = '';
$stmt = "SELECT selected_language from vicidial_users where user='$user';";
if ($DB) {
    echo "|$stmt|\n";
}
$rslt = mysql_to_mysqli($stmt, $link);
if ($mel > 0) {
    mysql_error_logging($NOW_TIME, $link, $mel, $stmt, '00XXX', $user, $server_ip, $session_name, $one_mysql_log);
}
$sl_ct = mysqli_num_rows($rslt);
if ($sl_ct > 0) {
    $row = mysqli_fetch_row($rslt);
    $VUselected_language = $row[0];
}

$stmt = "SELECT use_non_latin,timeclock_end_of_day,agentonly_callback_campaign_lock,custom_fields_enabled,allow_emails,enable_languages,language_method FROM system_settings;";
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
    $timeclock_end_of_day = $row[1];
    $agentonly_callback_campaign_lock = $row[2];
    $custom_fields_enabled = $row[3];
    $allow_emails = $row[4];
    $SSenable_languages = $row[5];
    $SSlanguage_method = $row[6];
}
##### END SETTINGS LOOKUP #####
###########################################

if ($allow_emails < 1) {
    echo _QXZ("Your system does not have the email setting enabled") . "\n";
    exit;
}

if ($non_latin < 1) {
    $user = preg_replace("/[^-_0-9a-zA-Z]/", "", $user);
}


# default optional vars if not set
if (!isset($format)) {
    $format = "text";
}
if ($format == 'debug') {
    $DB = 1;
}
if (!isset($ACTION)) {
    $ACTION = "refresh";
}
if (!isset($query_date)) {
    $query_date = $NOW_DATE;
}

$auth = 0;
$auth_message = user_authorization($user, $pass, '', 0, 0, 0, 0, 'vdc_email_display');
if ($auth_message == 'GOOD') {
    $auth = 1;
}

$stmt = "SELECT count(*) from vicidial_users where user='$user' and modify_leads='1';";
if ($DB) {
    echo "|$stmt|\n";
}
$rslt = mysql_to_mysqli($stmt, $link);
$row = mysqli_fetch_row($rslt);
$VUmodify = $row[0];

$stmt = "SELECT count(*) from vicidial_live_agents where user='$user';";
if ($DB) {
    echo "|$stmt|\n";
}
$rslt = mysql_to_mysqli($stmt, $link);
$row = mysqli_fetch_row($rslt);
$LVAactive = $row[0];
$LVAactive = 9;
if ((strlen($user) < 2) or ( strlen($pass) < 2) or ( $auth == 0) or ( ($LVAactive < 1) )) {
    echo _QXZ("Invalid Username/Password:") . " |$user|$pass|$auth_message|\n";
    echo "<form action=./utg_vdc_email_display.php method=POST name=email_display_form id=email_display_form>\n";
    echo "<input type=hidden name=user id=user value=\"$user\">\n";
    echo "</form>\n";
    exit;
} else {
    # do nothing for now
}

if ($REPLY) {
    $to = "$reply_to_address";
    $from = "$reply_from_address";
    $subject = "$reply_subject";
    $message = "$reply_message";
    $headers = "From: $from";
    $attachment_str = "";


//    $to = 'apanwar@usethegeeks.co.uk';
//    $sendmail = @mail($to, $subject, $message, $headers);
    /* Email */
    require '../email/Email.php';

    $mail = new CI_Email;  // create a new object 
    $mail->initialize(array(
        'protocol' => 'smtp',
        'smtp_host' => $SMTPData['host'],
        'smtp_user' => $SMTPData['username'],
        'smtp_pass' => $SMTPData['password'],
        'smtp_port' => $SMTPData['port'],
        'smtp_crypto' => $SMTPData['encryption'],
        'crlf' => "\r\n",
        'newline' => "\r\n",
        'mailtype' => 'html'
    ));
    
    $mail->from('support@utgonesolution.com', 'UTGONE');

    $mail->to($to);
    $mail->subject($subject);
    $mail->message($message);
    if (!empty($_POST['file_attach']) && $_POST['file_attach']) {
        $array = array_filter(explode(',', $_POST['file_attach']));
        foreach ($array as $value) {
            $mail->attach($value);
        }
    }
//        $mail->headers($message);
    $mail->send();
//    echo '<pre>';
//    print_r($mail);
//    exit;
    /* END Email */
    if ($mail) {
        $reply_message = preg_replace('/(\"|\||\'|\;)/', '\\\$1', $reply_message);
        $log_stmt = "INSERT INTO vicidial_email_log(email_row_id, lead_id, email_date, user, email_to, message, campaign_id, attachments) VALUES('$email_row_id', '$lead_id', now(), '$user', '$reply_to_address', '$reply_message', '$campaign', '$attachment_str')";
        $log_rslt = mysql_to_mysqli($log_stmt, $link);
//        echo "<p>mail sent to $to!</p>";
        ?>
        <html>
            <head>
                <title><?php echo _QXZ("AGENT email frame"); ?></title>
                <!-- Bootstrap 4.0-->
                <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

                <!-- Bootstrap extend-->
                <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

                <!-- Theme style -->
                <link rel="stylesheet" href="../assets/css/master_style.css">

                <!-- Fab Admin skins -->
                <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">	

                <!-- iCheck -->
                <link rel="stylesheet" href="../assets/vendor_plugins/iCheck/flat/blue.css">

                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            </head>
            <body>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    Mail sent to <?php echo $to; ?>
                </div>
            </body>
        </html>
        <?php
        # Hangup the "call" on the agent screen
        $stmt = "UPDATE vicidial_live_agents set external_hangup='1' where user='$user';";
        if ($DB) {
            echo "$stmt\n";
        }
        $rslt = mysql_to_mysqli($stmt, $link);
        $affected_rows = mysqli_affected_rows($link);
    } else {
        ?>
        <html>
            <head>
                <title><?php echo _QXZ("AGENT email frame"); ?></title>
                <!-- Bootstrap 4.0-->
                <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

                <!-- Bootstrap extend-->
                <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

                <!-- Theme style -->
                <link rel="stylesheet" href="../assets/css/master_style.css">

                <!-- Fab Admin skins -->
                <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">	

                <!-- iCheck -->
                <link rel="stylesheet" href="../assets/vendor_plugins/iCheck/flat/blue.css">

                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            </head>
            <body>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?php echo _QXZ("mail could not be sent!"); ?>
                </div>
            </body>
        </html>

        <?php
//        echo "<p>" . _QXZ("mail could not be sent!") . "</p>";
    }
    exit;
}


if (($lead_id) or ( strlen($email_row_id) > 0)) {
    $stmt = "SELECT * from vicidial_email_list where lead_id='$lead_id' and direction='INBOUND' and status IN('NEW','INCALL') order by email_date asc";
    if ($email_row_id) {
        $stmt = "SELECT * from vicidial_email_list where lead_id='$lead_id' and email_row_id='$email_row_id' and direction='INBOUND' and status IN('NEW','INCALL') order by email_date asc";
    }
    if ($DB > 0) {
        echo "$stmt\n";
    }
    $rslt = mysql_to_mysqli($stmt, $link);
    if (mysqli_num_rows($rslt) > 0) {
        $row = mysqli_fetch_array($rslt);
        $email_row_id = $row["email_row_id"];
        preg_match('/\<[^\>\@]+\@[^\>\@]+\>/', $row["email_from"], $matches);
        if (strlen($matches[0]) > 0) {
            $email_from = substr($matches[0], 1, -1);
        } else {
            $email_from = $row["email_from"];
        }
        preg_match('/\<[^\>\@]+\@[^\>\@]+\>/', $row["email_to"], $matches);
        if (strlen($matches[0]) > 0) {
            $row["email_from"] = preg_replace('/\>/', '&gt;', $row["email_from"]);
            $row["email_from"] = preg_replace('/\</', '&lt;', $row["email_from"]);
            $email_to = substr($matches[0], 1, -1);
        } else {
            $row["email_to"] = preg_replace('/\>/', '\>', $row["email_to"]);
            $email_to = $row["email_to"];
        }
        $EMAIL_form1 = "<div class='form-group'><label class=''>" . _QXZ("Date received:") . "</label><input class='form-control' placeholder='To:' value='" . $row['email_date'] . "' readonly=''></div>";
        $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("From:") . "</label><input class='form-control' placeholder='To:' value='" . $row['email_from'] . "' readonly=''></div>";
        $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("Subject:") . "</label><input class='form-control' placeholder='To:' value='" . $row['subject'] . "' readonly=''></div>";
        $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("Message:") . "</label><textarea class='form-control' readonly=''>" . $row['message'] . "</textarea></div>";

//        <div class='btn btn-info btn-file'><i class='fa fa-paperclip'></i> Attachment</div></div>";
        $att_stmt = "select * from inbound_email_attachments where email_row_id='$email_row_id'";
        $att_rslt = mysql_to_mysqli($att_stmt, $link);
        if (mysqli_num_rows($att_rslt) > 0) {
            $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("Attachments:") . "</label><br/>";
            while ($att_row = mysqli_fetch_array($att_rslt)) {
                $EMAIL_form1 .= "<a href='" . $_SERVER[PHP_SELF] . "?attachment_id=" . $att_row[attachment_id] . "&lead_id=" . $lead_id . "&user=" . $user . "&pass=" . $pass . "' class='btn btn-info btn-file'><i class='fa fa-paperclip'></i> " . $att_row['filename'] . "</a>";
//                $EMAIL_form .= "<LI><a href='$_SERVER[PHP_SELF]?attachment_id=$att_row[attachment_id]&lead_id=$lead_id&user=$user&pass=$pass'>$att_row[filename]</a>\n";
            }
            $EMAIL_form1 .= "</div>";
        }

        $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("Response:") . "</label><input type='text' class='form-control' name='reply_subject' value='RE:" . $row['subject'] . "'></div>";
        $EMAIL_form1 .= "<div class='form-group'><label class=''>" . _QXZ("Reply:") . "</label><textarea id='reply_message' name='reply_message' class='form-control'></textarea></div>";
        $EMAIL_form1 .= "<input type='hidden' name='reply_to_address' value='$email_from'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='reply_from_address' value='$email_to'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='campaign' value='$campaign'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='lead_id' value='$lead_id'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='email_row_id' value='$email_row_id'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='user' value='$user'>\n";
        $EMAIL_form1 .= "<input type='hidden' name='pass' value='$pass'>\n";

//        $EMAIL_form = "<center><TABLE cellspacing=2 cellpadding=2 bgcolor='#CCCCCC' class='table table-bordered' style='width:100%;'>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Date received:") . "</td><td align='left' valign='top' width='*'>$row[email_date]</td></tr>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("From:") . "</td><td align='left' valign='top' width='*'>$row[email_from]</td></tr>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Subject:") . "</td><td align='left' valign='top' width='*'>$row[subject]</td></tr>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Message:") . "</td><td align='left' valign='top' width='*'><pre>$row[message]</pre></td></tr>\n";
//
//        $att_stmt = "select * from inbound_email_attachments where email_row_id='$email_row_id'";
//        $att_rslt = mysql_to_mysqli($att_stmt, $link);
//        if (mysqli_num_rows($att_rslt) > 0) {
//            $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Attachments:") . "</td><td align='left' valign='top' width='*'><pre>";
//            while ($att_row = mysqli_fetch_array($att_rslt)) {
//                $EMAIL_form .= "<LI><a href='$_SERVER[PHP_SELF]?attachment_id=$att_row[attachment_id]&lead_id=$lead_id&user=$user&pass=$pass'>$att_row[filename]</a>\n";
//            }
//            $EMAIL_form .= "</pre></td></tr>";
//        }
//        $EMAIL_form .= "<tr><td colspan='2'><HR></td></tr>";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Response:") . "</td><td align='left' valign='top' width='*'>RE: $row[subject]<input type='hidden' name='reply_subject' value='RE: $row[subject]'></td></tr>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>" . _QXZ("Reply:") . "<BR><BR><input type='button' name='copy' value='" . _QXZ("COPY MESSAGE") . " >>>' onClick='CopyMessage($row[email_row_id])'></td><td align='left' valign='top' width='*'><textarea rows='8' cols='50' name='reply_message' id='reply_message'>$reply_message</textarea></td></tr>\n";
//        $EMAIL_form .= "<tr bgcolor=white><td align='right' valign='top' width='150'>Attachments:</td><td align='left' valign='top' width='*'>";
//        $EMAIL_form .= "<span id='attachment_span1'><input type=file name='attachment1' value='$attachment1'></span><BR/>";
//        $EMAIL_form .= "<span id='attachment_span2'><input type=file name='attachment2'></span><BR/>";
//        $EMAIL_form .= "<span id='attachment_span3'><input type=file name='attachment3'></span><BR/>";
//        $EMAIL_form .= "<span id='attachment_span4'><input type=file name='attachment4'></span><BR/>";
//        $EMAIL_form .= "<span id='attachment_span5'><input type=file name='attachment5'></span>";
//        $EMAIL_form .= "</td></tr>\n";
//        $EMAIL_form .= "<tr><td colspan='2' align='center'><input type='submit' name='REPLY' value='" . _QXZ("REPLY") . "'></td></tr>";
//        $EMAIL_form .= "</table></center>\n";
//        $EMAIL_form .= "<input type='hidden' name='reply_to_address' value='$email_from'>\n";
//        $EMAIL_form .= "<input type='hidden' name='reply_from_address' value='$email_to'>\n";
//        $EMAIL_form .= "<input type='hidden' name='campaign' value='$campaign'>\n";
//        $EMAIL_form .= "<input type='hidden' name='lead_id' value='$lead_id'>\n";
//        $EMAIL_form .= "<input type='hidden' name='email_row_id' value='$email_row_id'>\n";
//        $EMAIL_form .= "<input type='hidden' name='user' value='$user'>\n";
//        $EMAIL_form .= "<input type='hidden' name='pass' value='$pass'>\n";
    }

    if ($attachment_id) {
        $stmt = "select * from inbound_email_attachments where attachment_id='$attachment_id'";
        $rslt = mysql_to_mysqli($stmt, $link);
        if (mysqli_num_rows($rslt) > 0) {
            $row = mysqli_fetch_array($rslt);
            $filename = $row["filename"];
            $encoding = $row["file_encoding"];
            $file_size = $row["file_size"];
            $file_type = $row["file_type"];
            $file_contents = $row["file_contents"];
            if ($encoding == "base64") {
                $file_contents = base64_decode($file_contents);
                $file_size = strlen($file_contents);
            }
            header("Content-length: " . $file_size . "");
            header("Content-type: " . $file_type . "");
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            echo $file_contents;
        }
    } else {
        ?>
        <html>
            <head>
                <title><?php echo _QXZ("AGENT email frame"); ?></title>
                <!-- Bootstrap 4.0-->
                <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

                <!-- Bootstrap extend-->
                <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

                <!-- Theme style -->
                <link rel="stylesheet" href="../assets/css/master_style.css">

                <!-- Fab Admin skins -->
                <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">	

                <!-- iCheck -->
                <link rel="stylesheet" href="../assets/vendor_plugins/iCheck/flat/blue.css">

                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            </head>
            <script language="Javascript">
                function ParseFileName()
                {
                    for (var i = 1; i <= 5; i++)
                    {
                        var attachment_field = eval("document.forms[0].attachment" + i);
                        var endstr = attachment_field.value.lastIndexOf('\\');
                        if (endstr > -1)
                        {
                            endstr++;
                            var filename = attachment_field.value.substring(endstr);
                            attachment_field.value = filename;
                        }
                    }
                }
                function CopyMessageOLD()
                {
        <?php
        $row["message"] = preg_replace('/\r|\n/', ' ', $row["message"]);
        echo "var message=\"" . preg_replace('/\"/', '\\\"', $row["message"]) . "\";\n";
        ?>
                    var msg_array = message.split(" ");
                    var full_msg = "";
                    var msg_line = "> ";
                    for (var i = 0; i < msg_array.length; i++)
                    {
                        if (msg_array[i].length >= 48)
                        {
                            msg_line += msg_array[i] + " ";
                        }
                        if (msg_line.length + msg_array[i].length < 50)
                        {
                            msg_line += msg_array[i] + " ";
                        } else
                        {
                            full_msg += msg_line + "\n";
                            msg_line = "> " + msg_array[i] + " ";
                        }
                    }
                    full_msg += msg_line + "\n";
                    var email_field_value = document.getElementById("reply_message").value + "\n";
                    email_field_value += full_msg;
                    //                    document.getElementById("reply_message").value = email_field_value;
                    //                    alert(email_field_value);
                    $('#reply_message').data("wysihtml5").editor.setValue(email_field_value);
                }
            </script>
            <style type="text/css">
                pre { white-space: pre-wrap; }
            </style>
            <body>
                <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' name="email_display_form" id="email_display_form" onSubmit="if (this.submitted)
                                    return false;
                                this.submitted = true" enctype="multipart/form-data">
                      <?php // echo $EMAIL_form;  ?>
                    <div class="box bg-transparent no-shadow">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php echo $EMAIL_form1; ?>

                            <div class="row attach-file">

                            </div>
                        </div>
                        <input type="hidden" name="file_attach" value="" id="FileAttachData"/>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <!--<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>-->
                                <button type="submit" class="btn btn-success" name="REPLY" value="REPLY"><i class="fa fa-envelope-o"></i> <?php echo _QXZ("REPLY"); ?></button>
                            </div>

                        <!--<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>-->
                            <button type="button" class="btn btn-info" onClick='CopyMessage();'><i class="fa fa-copy"></i> Copy Message</button>
                            <button type="button" class="btn btn-primary File-Attachment"><i class="fa fa-paperclip"></i>Attachment</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </form>


                <form method="post" enctype="multipart/form-data" id="FileInputForm">
                    <input type="file" name="file" value="" id="File-Attachment-Input" style="display:none;"/>
                </form>


                <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>

                <!-- popper -->
                <!--<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>-->

                <!-- Bootstrap 4.0-->
                <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- SlimScroll -->
                <!--<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->

                <!-- FastClick -->
                <!--<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>-->

                <!-- Fab Admin App -->
                <!--<script src="../assets/js/template.js"></script>-->

                <!-- iCheck -->
                <!--<script src="../assets/vendor_plugins/iCheck/icheck.js"></script>-->

                <!-- Fab Admin for demo purposes -->
                <!--<script src="../assets/js/demo.js"></script>-->

                <!-- Bootstrap WYSIHTML5 -->
                <script src="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

                <!-- Fab Admin for editor -->
                <script>
                                $(function () {
                                    //Add text editor
                                    $("#reply_message").wysihtml5();
                                });

                                function CopyMessage()
                                {
        <?php
        $row["message"] = preg_replace('/\r|\n/', ' ', $row["message"]);
        echo "var message=\"" . preg_replace('/\"/', '\\\"', $row["message"]) . "\";\n";
        ?>
                                    var msg_array = message.split(" ");
                                    var full_msg = "";
                                    var msg_line = "> ";
                                    for (var i = 0; i < msg_array.length; i++)
                                    {
                                        if (msg_array[i].length >= 48)
                                        {
                                            msg_line += msg_array[i] + " ";
                                        }
                                        if (msg_line.length + msg_array[i].length < 50)
                                        {
                                            msg_line += msg_array[i] + " ";
                                        } else
                                        {
                                            full_msg += msg_line + "\n";
                                            msg_line = "> " + msg_array[i] + " ";
                                        }
                                    }
                                    full_msg += msg_line + "\n";
                                    //                    var email_field_value = document.getElementById("reply_message").value + "\n";
                                    var email_field_value = $('.wysihtml5-sandbox').contents().find('.wysihtml5-editor').html();
                                    email_field_value += full_msg;
                                    $('.wysihtml5-sandbox').contents().find('.wysihtml5-editor').html(email_field_value);
                                }



                                $('input[type="file"]').change(function (e) {
                                    var fileName = e.target.files[0].name;
                                    $('#FileInputForm').trigger('submit');
                                });


                                $('.File-Attachment').click(function () {
                                    $('#File-Attachment-Input').click();
                                });

                                $('#FileInputForm').on('submit', function (e) {
                                    var form = $(this)[0];

                                    var data = new FormData(form);
                                    e.preventDefault();

                                    $.ajax({
                                        type: 'post',
                                        url: 'utg_vdc_file_upload.php',
                                        data: data,
                                        enctype: 'multipart/form-data',
                                        processData: false, // Important!
                                        contentType: false,
                                        cache: false,
                                        success: function (data) {
                                            var Result = JSON.parse(data);
                                            var HTML = '<div class="col-sm-6" id=' + Result.fileURL + '><div class="alert alert-danger alert-dismissable">' +
                                                    '<button type="button" class="close" data-dismiss="alert" file-ID=' + Result.fileURL + '>×</button>' + Result.filename + '</div></div>';
                                            $('.attach-file').append(HTML);
                                            var FileAttachData = $('#FileAttachData').val();
                                            var FileAttachData = FileAttachData + ',' + Result.fileURL;
                                            $('#FileAttachData').val(FileAttachData);

                                        }
                                    });

                                });

                                $(document).on('click', '.close', function () {
                                    var fileID = $(this).attr('file-ID');
                                    var FileAttachData = $('#FileAttachData').val();
                                    var FileAttachDataNew = FileAttachData.split(',');

                                    const index = FileAttachDataNew.indexOf(fileID);
                                    if (index > -1) {
                                        FileAttachDataNew.splice(index, 1);
                                    }
                                    $('#' + fileID).remove();
                                    FileAttachDataNew.join(',')
                                    //                                    console.log(FileAttachDataNew);
                                });
                </script>
            </body>
        </html>
        <?php
    }
} else {
    echo _QXZ("ERROR - ID variable missing");
}
?>
