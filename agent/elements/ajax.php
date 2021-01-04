<?php
//require '../../db/DBClass.php';
require '../../db/database.php';

if (!empty($_POST['rule']) && $_POST['rule']) {
    if ($_POST['rule'] == 'CallHistory') {
        $CampaignID = $_POST['CampaignID'];
        $InboundGroups = $_POST['InboundGroups'];
        $UserID = $_POST['UserID'];
        $CampaignDetail = $database->query('SELECT dial_method FROM vicidial_campaigns where campaign_id='.$CampaignID)->fetchAll(PDO::FETCH_ASSOC);
        $CampaignGroup = $CampaignDetail[0]['dial_method'];
            $groups = explode(' ',$InboundGroups);
            $CampaignIDs = array_filter($groups);
            $CampaignIDs[] = $CampaignID;


        $data1 = $database->query("SELECT * FROM vicidial_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC);

        $data2 = $database->query("SELECT * FROM vicidial_closer_log VCL where VCL.call_date >= '" . date("Y-m-d") . " 00:00:00' AND VCL.call_date <= '" . date('Y-m-d') . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC);
        $data = array_merge($data1, $data2);
        require 'include/call_history.php';
        exit;
    } elseif($_POST['rule'] == 'CallInbound'){
      $CampaignID = $_POST['CampaignID'];
      $InboundGroups = $_POST['InboundGroups'];
      $UserID = $_POST['UserID'];
      //$data = $database->query("SELECT * FROM vicidial_closer_log VCL JOIN vicidial_list VL ON VCL.lead_id = VL.lead_id  where VCL.call_date >= '" . date("Y-m-d") . " 00:00:00' AND VCL.call_date <= '" . date('Y-m-d') . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.status = 'DROP' AND VL.status = 'DROP' ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC);
      //$data = $database->query("SELECT * FROM vicidial_closer_log VCL where VCL.call_date >= '" . date("Y-m-d") . " 00:00:00' AND VCL.call_date <= '" . date('Y-m-d') . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.status = 'DROP'GROUP BY VCL.phone_number ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC);
      $data = $database->query("SELECT * FROM vicidial_closer_log VCL JOIN vicidial_list VL ON VCL.lead_id = VL.lead_id where VL.modify_date >= '" . date("Y-m-d") . " 00:00:00' AND VL.modify_date <= '" . date('Y-m-d') . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VL.status = 'DROP'GROUP BY VL.lead_id")->fetchAll(PDO::FETCH_ASSOC);

      if(count($data) > 0) {

      $table = '<table class="table">';
      $table .= '<thead class="thead-light">';
      $table .= '<tr><th>Time Of Call</th><th>Phone Number</th><th>Action</th></tr>';
      $table .= '</thead>';
      $table .= '<tbody>';
      foreach ($data as $value) {
        $table .= '<tr>';
        $table .= '<td>'.$value['call_date'].'</td>';
        $table .= '<td>'.$value['phone_number'].'</td>';
        $table .= '<td>
        <a href="javascript:void(0);" class="btn btn-success CallDial btn-app" data-phone="'.$value['phone_number'].'">
            <i class="fa fa-phone"></i>
        </a></td>';
        $table .= '</tr>';
      }
      $table .= '</tbody>';
      $table .= '</table>';
    } else {
      $table = "<div class='alert alert-info alert-dismissible'>
          No Drop List Available
      </div>";
    }
      echo json_encode(['table' => $table, 'count' => count($data)]);
      exit;
    } elseif($_POST['rule'] == 'CallHistory1') {
       $CampaignID = $_POST['CampaignID'];
       $InboundGroups = $_POST['InboundGroups'];
       $Start = $_POST['start'];
       $End = $_POST['end'];
       $UserID = $_POST['UserID'];

       $groups = explode(' ',$InboundGroups);
        $CampaignIDs = array_filter($groups);
        $CampaignIDs[] = $CampaignID;

        $data1 = $database->query("SELECT * FROM vicidial_log VCL where VCL.call_date >= '" . $Start . " 00:00:00' AND VCL.call_date <= '" . $End . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "')")->fetchAll(PDO::FETCH_ASSOC);
        $data2 = $database->query("SELECT * FROM vicidial_closer_log VCL where VCL.call_date >= '" . $Start . " 00:00:00' AND VCL.call_date <= '" . $End . " 23:59:59' AND VCL.user = '" . $UserID . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "')")->fetchAll(PDO::FETCH_ASSOC);
        $data = array_merge($data1,$data2);
        require 'include/call_history.php';
        exit;
//        $resultResponse = array(
//                    "draw"            => intval(1),
//                    "recordsTotal"    => intval($data),
//                    "recordsFiltered" => intval($data),
//                    "data"            => $data
//                    );
    } elseif($_POST['rule'] == 'performance_detail') {
        $caseValue = $_POST['caseValue'];
        $LoginUser = $_POST['LoginUser'];
        $LoginCampaign = $_POST['LoginCampaign'];

        $InboundGroups = $_POST['InboundGroups'];
        $CampaignDetail = $database->query('SELECT dial_method FROM vicidial_campaigns where campaign_id='.$LoginCampaign)->fetchAll(PDO::FETCH_ASSOC);
        $CampaignGroup = $CampaignDetail[0]['dial_method'];
            $groups = explode(' ',$InboundGroups);
            $CampaignIDs = array_filter($groups);
            $CampaignIDs[] = $LoginCampaign;

        switch($caseValue){
            case 'Call':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,L.phone_number,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL")->fetchAll();

                require 'include/call_detail.php';
                break;
            case 'Connect':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,L.phone_number,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where human_answered = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'include/call_detail.php';
                break;
            case 'DMC':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,L.phone_number,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where customer_contact = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'include/call_detail.php';
                break;
            case 'Sale':
               $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,L.phone_number,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where Sale = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'include/call_detail.php';
                break;
            case 'Talk':
                /* $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL")->fetchAll(); */
                $data1 = $database->query("SELECT *, L.first_name, L.last_name, L.phone_number, L.email FROM asterisk.vicidial_log VCL
                join asterisk.vicidial_list L on VCL.lead_id = L.lead_id where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00'
                AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $LoginUser . "'
                AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') ORDER BY VCL.call_date DESC")->fetchAll();

                $data2 = $database->query("SELECT *, L.first_name, L.last_name, L.phone_number, L.email FROM asterisk.vicidial_closer_log VCL
                join asterisk.vicidial_list L on VCL.lead_id = L.lead_id where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00'
                AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $LoginUser . "'
                AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') ORDER BY VCL.call_date DESC")->fetchAll();
                $data = array_merge($data1, $data2);
                require 'include/call_detail.php';
                break;
            case 'Wait':
               $data = $database->query("SELECT AL.event_time,AL.wait_sec
FROM asterisk.vicidial_agent_log AL
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.wait_sec > 0")->fetchAll();
                require 'include/wait_detail.php';
                break;
            case 'Dispo':
               $data = $database->query("SELECT AL.event_time as call_date,AL.lead_id,L.first_name,L.last_name,L.phone_number,AL.status,AL.dispo_sec as length_in_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.dispo_sec > 0")->fetchAll();
                require 'include/call_detail.php';
                break;
            case 'Pause':
                 $data = $database->query("SELECT AL.event_time,AL.lead_id,AL.status,AL.pause_sec as talk_sec,AL.sub_status as SubStatus
FROM asterisk.vicidial_agent_log AL
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.pause_sec > 0")->fetchAll();
                require 'include/pause_detail.php';
                break;
            case 'Chat':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec,L.phone_number
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL AND AL.comments='CHAT'")->fetchAll();

                require 'include/chat_detail.php';
                break;
            case 'Email':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec,L.email
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL AND AL.comments='EMAIL'")->fetchAll();

                require 'include/email_detail.php';
                break;
            default:

        }

        exit;
    }elseif($_POST['rule'] == 'DashboardPerformance'){

        /* $VD_login = $_POST['VD_login'];
        $VD_campaign = $_POST['VD_campaign'];
        $InboundGroups = $_POST['InboundGroups'];

        $InboundGroups = $_POST['InboundGroups'];
        $CampaignDetail = $database->query('SELECT dial_method FROM vicidial_campaigns where campaign_id='.$LoginCampaign)->fetchAll(PDO::FETCH_ASSOC);
        $CampaignGroup = $CampaignDetail[0]['dial_method'];
            $groups = explode(' ',$InboundGroups);
            $CampaignIDs = array_filter($groups);
            $CampaignIDs[] = $LoginCampaign;

            $resultResponse = $InboundGroups[0];

         $Performance = $database->query("Select Email,Chat,Calls,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,
sum(case when val.status is not null then 1 else 0 end) as Calls,
sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
sum(talk_sec) as TalkSeconds,
sum(wait_sec) as WaitSeconds,
sum(pause_sec) as PauseSeconds,
sum(dispo_sec) as DispoSeconds
from vicidial_agent_log val
where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
) a
ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC); */

$InboundGroups = $_POST['InboundGroups'];
$VD_login = $_POST['VD_login'];
$VD_campaign = $_POST['VD_campaign'];

$CampaignDetail = $database->query('SELECT dial_method FROM vicidial_campaigns where campaign_id='.$CampaignID)->fetchAll(PDO::FETCH_ASSOC);
$CampaignGroup = $CampaignDetail[0]['dial_method'];
    $groups = explode(' ',$InboundGroups);
    $CampaignIDs = array_filter($groups);
    $CampaignIDs[] = $VD_campaign;

$utg_call_length = $database->query("SELECT (SELECT SUM(length_in_sec) FROM vicidial_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') GROUP BY VCL.user ORDER BY VCL.call_date DESC) AS inbound, (SELECT SUM(length_in_sec) as utg_call_length FROM vicidial_closer_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id IN ('" . implode("','", $CampaignIDs) . "') GROUP BY VCL.user ORDER BY VCL.call_date DESC) AS outbound")->fetchAll(PDO::FETCH_ASSOC);
if($utg_call_length[0] == '' || $utg_call_length[0] == 0) {
  $Performance = $database->query("Select Email,Chat,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
  from
  (select val.`user`, val.campaign_id, val.user_group,
  sum(case when val.status is not null then 1 else 0 end) as Calls,
  sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
  sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
  sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
  sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
  sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast('talk_sec' as signed)- cast(val.dead_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
  Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast('talk_sec' as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
  0 as TalkSeconds,
  sum(wait_sec) as WaitSeconds,
  sum(pause_sec) as PauseSeconds,
  sum(dispo_sec) as DispoSeconds
  from vicidial_agent_log val
  where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
  ) a
  ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC);
} else {
  $Performance = $database->query("Select Email,Chat,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,
sum(case when val.status is not null then 1 else 0 end) as Calls,
sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast('talk_sec' as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast('talk_sec' as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
".($utg_call_length[0]['inbound'] + $utg_call_length[0]['outbound'])." as TalkSeconds,
sum(wait_sec) as WaitSeconds,
sum(pause_sec) as PauseSeconds,
sum(dispo_sec) as DispoSeconds
from vicidial_agent_log val
where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
) a
ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC);
}
       $resultResponse = $Performance[0];

    }elseif($_POST['rule'] == 'Dispositions'){
        $VD_campaign = $_POST['VD_campaign'];
        $Positive = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Positive'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Positive']]]);
        $Negative = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Negative'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Negative']]]);
        $Neutral = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Neutral'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Neutral']]]);
        $Unconcluded = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Unconcluded'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Unconcluded']]]);

        require 'include/call_dispo.php';
        exit;
    }elseif($_POST['rule'] == 'CustomerCallHistory'){
        $LeadID = $_POST['LeadID'];
        $campaign = $_POST['campaign'];
        $data1 = $database->select('vicidial_log',['call_date','user','length_in_sec','status','campaign_id'],['lead_id'=>$LeadID]);
        $data2 = $database->select('vicidial_closer_log',['call_date','user','length_in_sec','status','campaign_id'],['lead_id'=>$LeadID]);
        require 'include/customer_call_history.php';
        exit;
    }elseif($_POST['rule'] == 'LeadInformation'){
        $LeadID = $_POST['LeadID'];
        $data = $database->get('vicidial_list','*',['lead_id'=>$LeadID]);
        require 'include/lead_detail.php';
        exit;
    }
     echo json_encode($resultResponse);
}
