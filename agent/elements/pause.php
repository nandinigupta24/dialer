<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../../db/database.php';
//require '../../email/Email.php';

$data_api = $DBUTG->select('sendgrid_settings', '*');

$api_key = $data_api[0]['api_key'];

$params = [];

$Method = $_GET['method'];
if ($Method == 'ExceedLimit') {
    $CampaignID = $_POST['CampaignID'];
    $user = $_POST['user'];

    $CampaignDetail = $database->get('vicidial_campaigns', ['allow_mail_expire_on_pause_code', 'allow_pause_expire_mail_address'], ['campaign_id' => $CampaignID]);
    if ($CampaignDetail['allow_mail_expire_on_pause_code'] == 'Y') {
        if (!empty($CampaignDetail['allow_pause_expire_mail_address'])) {
            $EmailAddress = explode(',', $CampaignDetail['allow_pause_expire_mail_address']);
            for ($i = 0; $i < count($EmailAddress); $i++) {
              $params['to['.$i.']'] = $EmailAddress[$i];
            }
            //$params['to'] = $CampaignDetail['allow_pause_expire_mail_address'];

            $params['from'] = 'ngupta@usethegeeks.co.uk';
            $params['subject'] = $user . ' has exceed break time limit!!';
            $MailContent = file_get_contents('../../cron/emails/view/pause_exceed_limit.php');
            $Code = ['{{User}}', '{{Campaign}}'];
            $Replace = [$user, $CampaignID];

            $MailContent = str_replace($Code, $Replace, $MailContent);

            $params['html'] = $MailContent;
        } else {
            $userGroup = $database->get('vicidial_users', 'user_group', ['user' => $user]);
            $EmailAddress = $DBUTG->get('team_email_addresses', 'email_address', ['user_group' => $userGroup]);
            if (!empty($EmailAddress)) {
                $params['from'] = 'ngupta@usethegeeks.co.uk';
                $params['to'] = $EmailAddress;
                $params['subject'] = $user . ' has exceed break time limit!!';
                $MailContent = file_get_contents('../../cron/emails/view/pause_exceed_limit.php');
                $Code = ['{{User}}', '{{Campaign}}'];
                $Replace = [$user, $CampaignID];

                $MailContent = str_replace($Code, $Replace, $MailContent);

                $params['html'] = $MailContent;
            }
        }

        $sendgrid_apikey = $api_key;
        $url = 'https://api.sendgrid.com/';
        $js = array();
        $request = $url . 'api/mail.send.json';

            $session = curl_init($request);
                // Tell PHP not to use SSLv3 (instead opting for TLS)
                curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
                curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
                // Tell curl to use HTTP POST
                curl_setopt($session, CURLOPT_POST, true);
                // Tell curl that this is the body of the POST
                curl_setopt($session, CURLOPT_POSTFIELDS, $params);
                // Tell curl not to return headers, but do return the response
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

                // obtain response
                $response = curl_exec($session);
                curl_close($session);
    //              $result = json_decode($response);
                // print everything out
    //              echo $response->{'message'};
                $data = json_decode($response, true);

                print_r($data);
    }
} else {

}
