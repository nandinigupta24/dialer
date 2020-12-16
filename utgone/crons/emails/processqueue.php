<?php

$queueEMAIL = $DBEmail->select('client_queue', '*', ['status' => 'active']);
if (count($queueEMAIL) > 0) {
    $sendgrid_apikey = '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';
    $url = 'https://api.sendgrid.com/';
    $js = array();
    $request = $url . 'api/mail.send.json';

    foreach ($queueEMAIL as $email) {
        if ($email['email']) {
//          if($response['status'] == 'active'){
            $params = array(
                'to' => $email['email'],
                'toname' => $email['customer_name'],
                'from' => $email['from'],
//                  'fromname'  => $email['from'],
                'subject' => $email['subject'],
                'text' => strip_tags($email['msg']),
                'html' => $email['msg'],
//                  'x-smtpapi' => json_encode($js),
            );
            // Generate curl request
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
            if (!empty($data['message']) && $data['message'] == 'success') {
                $sent = [
                    'routine' => $email['routine'],
                    'template' => $email['template'],
                    'type' => $email['type'],
                    'lead_id' => $email['lead_id'],
                    'email' => $email['email'],
                    'customer_name' => $email['customer_name'],
                    'msg' => $email['msg'],
                    'date_sent' => date('Y-m-d H:i:s'),
                    'from' => $email['from'],
                ];
                $DBEmail->insert('sent', $sent);
                $DBEmail->delete('client_queue', ['id' => $email['id']]);
            } else {
                $DBEmail->update('client_queue', ['status' => 'fail'], ['id' => $email['id']]);
            }
        } else {
            $DBEmail->update('client_queue', ['status' => 'fail11'], ['id' => $email['id']]);
        }
    }
}
