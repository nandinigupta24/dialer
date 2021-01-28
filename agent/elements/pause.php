<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../../db/database.php';
//require '../../email/Email.php';

$mail = new CI_Email;
$mail->initialize(array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.sendgrid.net',
    'smtp_user' => 'apikey',
    'smtp_pass' => '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',
    'smtp_port' => 587,
    'crlf' => "\r\n",
    'newline' => "\r\n",
    'mailtype' => 'html'
));

$Method = $_GET['method'];
if ($Method == 'ExceedLimit') {
    $CampaignID = $_POST['CampaignID'];
    $user = $_POST['user'];

    $CampaignDetail = $database->get('vicidial_campaigns', ['allow_mail_expire_on_pause_code', 'allow_pause_expire_mail_address'], ['campaign_id' => $CampaignID]);
    if ($CampaignDetail['allow_mail_expire_on_pause_code'] == 'Y') {
        if (!empty($CampaignDetail['allow_pause_expire_mail_address'])) {
            $EmailAddress = explode(',', $CampaignDetail['allow_pause_expire_mail_address']);

            $mail->from('support@utgonesolution.com', 'UTGONE');
            $mail->to($EmailAddress);
            $mail->subject($user . ' has exceed break time limit!!');
            $MailContent = file_get_contents('../../cron/emails/view/pause_exceed_limit.php');
            $Code = ['{{User}}', '{{Campaign}}'];
            $Replace = [$user, $CampaignID];

            $MailContent = str_replace($Code, $Replace, $MailContent);

            $mail->message($MailContent);
            $mail->send();
        } else {
            $userGroup = $database->get('vicidial_users', 'user_group', ['user' => $user]);
            $EmailAddress = $DBUTG->get('team_email_addresses', 'email_address', ['user_group' => $userGroup]);
            if (!empty($EmailAddress)) {
                $mail->from('support@utgonesolution.com', 'UTGONE');
                $mail->to($EmailAddress);
                $mail->subject($user . ' has exceed break time limit!!');
                $MailContent = file_get_contents('../../cron/emails/view/pause_exceed_limit.php');
                $Code = ['{{User}}', '{{Campaign}}'];
                $Replace = [$user, $CampaignID];

                $MailContent = str_replace($Code, $Replace, $MailContent);

                $mail->message($MailContent);
                $mail->send();
            }
        }
    }
} else {

}
