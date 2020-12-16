<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../db/database.php';
require '../email/Email.php';

function pr($array) {
    echo '<pre>';
    print_r($array);
}

function dateDiffInDays($date1, $date2) {
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}

$date = date('Y-m-d');

$day = 2;

$DBUTG->update('user_pricings', ['status' => 'END'], ['AND' => ['status' => 'RUN', 'end' => date('Y-m-d')]]);

$UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['user_group[!]' => 'ADMIN']);

/* Email is Required for This Process */

foreach ($UserGroupListings as $GroupListings) {
    $UserPricingStart = $DBUTG->count('user_pricings', ['user_group' => $GroupListings['user_group']]);
    if ($UserPricingStart == 0) {
        continue;
    }
    $data = $DBUTG->get('user_pricings', '*', ['AND' => ['status' => 'RUN', 'user_group' => $GroupListings['user_group']]]);
    if (!empty($data) && count($data)) {
        $ExistPlanDetail = $DBUTG->get('pricing_plans', '*', ['id' => $data['pricing_plan_id']]);
        $totalDays = dateDiffInDays($data['start'], $data['end']);
        $remainingDays = dateDiffInDays($date, $data['end']);
        if ($remainingDays <= $day) {
            $MailContent = file_get_contents('emails/view/pricing_plan_expired.php');
            $Message = '<font style="font-size:18px;">Dear <b>' . $GroupListings['group_name'] . ' (' . $GroupListings['user_group'] . ')</b></font><br/><br/>';
            $Message .= 'A friendly reminder that your membership at UTGONE is about to expire on ' . $data['end'];
            $Code = ['{{Heading}}', '{{Message}}', ''];
            $Replace = ['Plan Expired Soon!!', $Message];

            $MailContent = str_replace($Code, $Replace, $MailContent);
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
            $EmailAddress = $DBUTG->get('team_email_addresses', 'email_address', ['user_group' => $GroupListings['user_group']]);
            if (!empty($EmailAddress)) {
                $mail->from('support@utgonesolution.com', 'UTGONE');
                $mail->to($EmailAddress);
                $mail->subject('Your plan will expired soon!!');
                $mail->message($MailContent);
                $mail->send();
            }
        }
    } else {
//        require 'emails/view/pp_expired.php';
        $data = $DBUTG->get('user_pricings', '*', ['user_group' => $GroupListings['user_group'], 'ORDER' => ['id' => 'DESC']]);
        $MailContent = file_get_contents('emails/view/pp_expired.php');
        $Message = '<font style="font-size:18px;">Dear <b>' . $GroupListings['group_name'] . ' (' . $GroupListings['user_group'] . ')</b></font><br/><br/>';
        $Message .= 'A friendly reminder that your membership at UTGONE has been expired on ' . $data['end'];
        $Code = ['{{Heading}}', '{{message}}', '{{Team}}', '{{LastDate}}'];
        $Replace = ['Plan Expired!!', $Message, $GroupListings['user_group'], $data['end']];

        $MailContent = str_replace($Code, $Replace, $MailContent);


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
        $EmailAddress = $DBUTG->get('team_email_addresses', 'email_address', ['user_group' => $GroupListings['user_group']]);
        if (!empty($EmailAddress)) {
            $mail->from('support@utgonesolution.com', 'UTGONE');
            $mail->to($EmailAddress);
            $mail->subject('Plan Expired Alert!!');
            $mail->message($MailContent);
            $mail->send();
        }
    }
}

