<?php
	// Account details
	$apiKey = urlencode('RpBX4povm/Y-YBye7xYB0kZzwQAucARgkfaRKA7iDJ');

	// Prepare data for POST request
	$data = array('apikey' => $apiKey);

	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/get_inboxes/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
 
	// Process your response here
	$response = json_decode($response, true, 10);
    if(isset($response['inboxes']) && $response['inboxes']) {
        foreach ($response['inboxes'] as $key => $value) {
            // Inbox details
        	$inbox_id = $value['number'];

        	// Prepare data for POST request
        	$data = array('apikey' => $apiKey, 'inbox_id' => $inbox_id);

        	// Send the POST request with cURL
        	$ch = curl_init('https://api.txtlocal.com/get_messages/');
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	$messResponse = curl_exec($ch);
        	curl_close($ch);

        	// Process your response here
        	$mresponse = json_decode($messResponse, true, 10);
            if(isset($mresponse['messages']) && $mresponse['messages']) {
                foreach ($mresponse['messages'] as $key => $msg) {
                    {
                        $rData = [
                            'phone_number' => $msg['number'],
                            'status'    => $msg['status'],
                            'msg'   => $msg['message'],
                            'receivedAt' => $msg['date'],
                            'inbox_id' => $inbox_id,
                        ];
                        $where = [];
                        foreach($rData as $k=>$d) {
                            $where[] = " $k = '$d' ";
                        }
                        if($DBSMS->query("select count(1) as from received where ".implode(' and ', $where))->fetchColumn()==0){
                            $DBSMS->insert('received', $rData);
                        }
	               }
                }
            }
        }
    }
?>
