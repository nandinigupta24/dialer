<?php //

include('../../db/global.php');
include('../includes/functions.php');

$nowTime = date('H:i:00');
$today = date('Y-m-d H:i:s');

$query = "SELECT * FROM `routines` WHERE active = 'Y' AND '".$today."' between start and end";

$data = $DBSMS->query($query)->fetchAll(PDO::FETCH_ASSOC);


foreach ($data as $key => $row) {
    $smsTemplate = $DBSMS->select('templates', '*', ['active' => 'Y', 'id' => $row['template']]);

    if (count($smsTemplate) > 0) {
        $smsTemplate = $smsTemplate[0];


        $ConditionSearchArray = [];

        /* Email Count */
        if ($row['call_count'] >= 0) {
            $ConditionSearchArray['called_count[' . $row['call_count_type'] . ']'] = $row['call_count'];
        }

        /* Call Count */
        if ($row['sms_count'] >= 0) {
            $ConditionSearchArray['sms_count[' . $row['sms_count_type'] . ']'] = $row['sms_count'];
        }

        /* Status Unserialise */
        $status = unserialize($row['statuses']);
        if (!empty($status) && count($status) > 0) {
            $ConditionSearchArray['status'] = $status;
        }

        /* List ID Unserialize */
        $listIds = unserialize($row['lists']);
        if (!empty($listIds) && count($listIds) > 0) {
            $ConditionSearchArray['list_id'] = $listIds;
        }

        $ConditionSearchArray['phone_number[!]'] = NULL;
      
        if ($row['age_lead_operator'] == '>') {
            $days_ago = date('Y-m-d H:i:s', strtotime('-' . $row['age_lead'] . ' days'));
            $ConditionSearchArray[$row['time_field'] . '[>=]'] = $days_ago;
            $ConditionSearchArray[$row['time_field'] . '[<=]'] = date('Y-m-d H:i:s');
        } elseif ($row['age_lead_operator'] == '<') {
            $days_ago = date('Y-m-d H:i:s', strtotime('-' . $row['age_lead'] . ' days'));
            $ConditionSearchArray[$row['time_field'] . '[>=]'] = $days_ago;
            $ConditionSearchArray[$row['time_field'] . '[<=]'] = date('Y-m-d H:i:s');
        } else {
            $days_ago = date('Y-m-d');
        }


        $PhoneList = $database->select('vicidial_list', '*', ['AND' => $ConditionSearchArray]);
        if(count($PhoneList) == 0){
            continue;
        }
        
        foreach ($PhoneList as $phoneRow) {
            $queueData = [
                'routine' => $row['id'],
                'template' => $row['template'],
                'type' => $row['routine_type'],
                'msg' => $smsTemplate['message'],
                'from_acc' => $row['customSentFrom'],
                'from' => $row['sentFrom'],
                'lead_id' => $phoneRow['lead_id'],
                'status' => 'active',
                'list_id' => $phoneRow['list_id'],
                'phone_code' => $phoneRow['phone_code'],
                'phone_number' => $phoneRow['phone_number'],
                'campaign_id' => $list[0]['campaign_id'],
                'customer_name' => $phoneRow['first_name'] . ' ' . $phoneRow['last_name'],
                'date_added' => date('Y-m-d H:i:s'),
            ];

            $database->update('vicidial_list', ['sms_count' => ($phoneRow['sms_count'] + 1)], ['lead_id' => $phoneRow['lead_id']]);

            $DBSMS->insert('queue', $queueData);
        }
    }
}

include('sms/processqueue.php');
//include('sms/inbox.php');
