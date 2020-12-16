<?php

require 'library/twilio-php/Services/Twilio.php';

$AccountsDetails = $DBSMS->get('accounts', '*', ['active' => 'Y']);
if (empty($AccountsDetails)) {
    die('Account Detail does not exist!!');
}

$sid = $AccountsDetails['sid']; // Your Account SID from www.twilio.com/user/account
$token = $AccountsDetails['token']; // Your Auth Token from www.twilio.com/user/account

$client = new Services_Twilio($sid, $token);

$queueSMS = $DBSMS->select('queue', '*', ['status' => 'active']);
if (count($queueSMS) > 0) {

    foreach ($queueSMS as $sms) {
        if ($sms['phone_number']) {
            $number = substr($sms['phone_number'], -10);

            if (strlen($number) == 10) {
                $message = $client->account->messages->sendMessage(
                        $AccountsDetails['phone_number'], 
                        '+'.$sms['phone_code'] . $number, 
                        $sms['msg']
                );
                if (in_array($message->status,['queued','sent'])) {
                    $sent = [
                        'routine' => $sms['routine'],
                        'template' => $sms['template'],
                        'type' => $sms['type'],
                        'lead_id' => $sms['lead_id'],
                        'phone_number' => $sms['phone_number'],
                        'customer_name' => $sms['customer_name'],
                        'msg' => $sms['msg'],
                        'date_sent' => date('Y-m-d H:i:s'),
//                        'from_acc' => $sms['from_acc'],
                        'from' => $sms['from'],
                        'status' => $message->status,
                        'sent_id' => (!empty($message->sid)) ? $message->sid : 'Q',
//                        'cost' => $response['cost'],
                    ];
                    
                    $DBSMS->insert('sent', $sent);
                   
                    $DBSMS->delete('queue', ['id' => $sms['id']]);
                } else {
                    $DBSMS->update('queue', ['status' => 'fail'], ['id' => $sms['id']]);
                }
            } else {
                $DBSMS->update('queue', ['status' => 'fail'], ['id' => $sms['id']]);
            }
        } else {
            $DBSMS->update('queue', ['status' => 'fail'], ['id' => $sms['id']]);
        }
    }
}else{
    die('No More in QUEUE');
}
