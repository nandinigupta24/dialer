<?php

include('../../db/global.php');
include('../includes/functions.php');

$nowTime = date('H:i:00');
$today = date('Y-m-d');

$Condition = [];
$Condition['active'] = 'Y';

$Condition['end_date[>=]'] = date('Y-m-d');

$Condition['end_time[>=]'] = date('H:i:s');

$data = $DBEmail->select('routines', '*', ['AND' => $Condition]);


foreach ($data as $key => $row) {
    $emailTemplate = $DBEmail->select('templates', '*', ['active' => 'Y', 'id' => $row['template']]);
    if (count($emailTemplate) > 0) {
        $emailTemplate = $emailTemplate[0];

        $ConditionSearchArray = [];

        /* Email Count */
        if ($row['email_count'] >= 0) {
            $ConditionSearchArray['email_count[' . $row['email_count_type'] . ']'] = $row['email_count'];
        }

        /* Call Count */
        if ($row['call_count'] >= 0) {
            $ConditionSearchArray['called_count[' . $row['call_count_type'] . ']'] = $row['call_count'];
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
        $ConditionSearchArray['last_local_call_time[>=]'] = $row['start_date'] . ' ' . $row['start_time'];
        $ConditionSearchArray['last_local_call_time[<=]'] = $row['end_date'] . ' ' . $row['end_time'];
        $ConditionSearchArray['email[!]'] = NULL;

        $emailList = $database->select('vicidial_list', '*', ['AND' => $ConditionSearchArray, 'LIMIT' => $row['messages_per_minute']]);
        
        foreach ($emailList as $emailRow) {
            if (!$emailRow['email'])
                continue;
            $queueData = [
                'routine' => $row['id'],
                'template' => $row['template'],
                'type' => $row['routine_type'],
                'subject' => $row['client_rule_subject'],
                'msg' => $emailTemplate['message'],
//                'from_acc' => $row['customSentFrom'],
                'from' => $row['sentFrom'],
                'lead_id' => $emailRow['lead_id'],
                'status' => 'active',
                'list_id' => $emailRow['list_id'],
                'email' => $emailRow['email'],
                'campaign_id' => $list[0]['campaign_id'],
                'customer_name' => $emailRow['first_name'] . ' ' . $emailRow['last_name'],
                'date_added' => date('Y-m-d H:i:s'),
            ];
            $database->update('vicidial_list', ['email_count' => ($emailList['email_count'] + 1)], ['lead_id' => $emailRow['lead_id']]);

            $DBEmail->insert('client_queue', $queueData);
        }
    }
}

include('emails/processqueue.php');
