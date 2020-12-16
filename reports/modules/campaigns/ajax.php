<?php

$ruleList = ['OutboundSummary', 'OutboundStatus', 'InboundSummary', 'InboundStatus', 'CombinedSummary', 'CombinedStatus', 'Time', 'Pause'];

$CampaignList = $_SESSION['CurrentLogin']['CampaignID'];

//$CampaignList = $database->select('vicidial_campaigns','campaign_id',['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);

//$UserGroup = 'CogentHub';
//$data = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['user_group' => $UserGroup]);
//$CampaignList = array_column($data, 'campaign_id');
//
//$data = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['user_group' => $UserGroup]);
//$CampaignListInboundGroups = array_column($data, 'group_id');




if (!in_array($_GET['rule'], $ruleList)) {
    $result = response(0, 1, 'Rule Method does not exist', NULL);
    echo json_encode($result);
    exit;
}
$start = $end = date('Y-m-d');
if (!empty($_GET['start'])) {
    $start = $_GET['start'];
}
if (!empty($_GET['end'])) {
    $end = $_GET['end'];
}

if ($_GET['rule'] == 'OutboundSummary') {

    $query = "select z.in_campaign_id as CampaignName,
      ifnull(z.in_Calls,0) as Calls, 
      ifnull(z.in_Agent_Calls,0) as Connects,
      ROUND(z.in_Agent_Calls/z.in_Calls*100,2) as ConnectRate,
      ifnull(z.ag_Manual_Calls,0) as ManualCalls, 
      ifnull(z.in_DMCs, 0) as DMCs,
      ROUND(z.in_DMCs/z.in_Agent_Calls*100,2) as DMCRate,
      ifnull(z.in_Sales, 0) as Sales, 
    ROUND((ifnull(z.in_Sales, 0))/( ifnull(z.in_DMCs, 0)) * 100, 2) as ConversionRate, 
      z.in_DroppedCalls as Drops, 
      z.in_AnswerMachine as A,  
      ROUND(z.in_DroppedCalls / ( z.in_Connects + z.in_AnswerMachine+ z.in_DroppedCalls) * 100, 2) as DropRate,
      z.ag_Talk as TalkTime, z.ag_Pause as PauseTime, z.ag_Wait as WaitTime, z.ag_Dispo as DispoTime, SEC_TO_TIME(ROUND(z.ag_TotalDMCTalksecs/z.ag_DMCs)) AS AveDMCTalk,z.ag_TotalDMCTalkSecs,
addtime(z.ag_Talk,addtime(z.ag_dispo,z.ag_Wait)) as total_productive,(ifnull(z.in_DMCs, 0))/(time_to_sec(addtime(z.ag_Talk,addtime(z.ag_dispo,z.ag_Wait)))/3600) as DMC_Productive,(z.in_Connects/(ifnull(in_Agent_Calls, 0)))*100 as Total_Connect_Rate, 
((ifnull(z.in_DMCs, 0))/z.in_Connects)*100 as Total_DMCrate,sec_to_time((time_to_sec(z.ag_talk))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_talk,sec_to_time((time_to_sec(z.ag_wait))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_wait,sec_to_time((time_to_sec(z.ag_dispo))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_wrap

from 
(select b.campaign_id as in_campaign_id,sum(b.Calls) as in_Calls,sum(b.Connects) as in_Connects,sum(b.Agent_Calls) as in_Agent_Calls,sum(b.DMCs) as in_DMCs,sum(b.Sales) as in_Sales,
sum(b.DroppedCalls) as in_DroppedCalls,sum(b.AnswerMachine) as in_AnswerMachine,sum(d.Calls) as ag_Calls,sum(d.Manual_Calls) as ag_Manual_calls,sum(d.Connects) as ag_Connects,sum(d.DMCs) as ag_DMCs,sum(d.Sales) as ag_Sales
,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Talk))) as ag_Talk,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Pause))) as ag_Pause,
SEC_TO_TIME(SUM(TIME_TO_SEC(d.Wait))) as ag_Wait,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Dispo))) as ag_Dispo,
SEC_TO_TIME(SUM(TIME_TO_SEC(d.TotalDMCTalkSecs))) as ag_TotalDMCTalkSecs
from 
(select date(vl.call_date) as Date, vl.`campaign_id`, 
  sum(case when status is not null and vl.comments not in ('CHAT','EMAIL') then 1 else 0 end) as Calls,
  sum(case when status is not null and vl.comments not in ('CHAT','EMAIL') and user != 'VDAD' then 1 else 0 end) as Agent_Calls,
  sum(case when vl.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
  sum(case when vl.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
  sum(case when vl.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
  sum(case when vl.status = 'A' then 1 else 0 end) as AnswerMachine,
  sum(case when vl.status in ('DROP') then 1 else 0 end) as DroppedCalls
  from vicidial_log vl
  WHERE call_date between '" . $start . " 00:00:00' and '" . $end . " 23:59:59' AND campaign_id IN ('" . implode("','", $CampaignList) . "')
  group by date(vl.call_date), vl.`campaign_id`) b
  join
(select date(al.event_time) as Date,al.campaign_id ,
        sum(case when al.status is not null then 1 else 0 end) as Calls,
        sum(case when al.status is not null and al.comments = 'MANUAL'  then 1 else 0 end) as Manual_Calls,
        sum(case when al.status in (select status from vicidial_campaign_statuses where human_answered = 'Y')  then 1 else 0 end) as Connects,
        sum(case when al.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y')  then 1 else 0 end) as DMCs,
        sum(case when al.status in (select status from vicidial_campaign_statuses where Sale = 'Y')  then 1 else 0 end) as Sales,
        SEC_TO_TIME(sum(case when al.dispo_epoch > al.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(al.dead_sec as signed) ELSE cast(al.talk_sec as signed) - cast(al.dead_sec as signed) end)) as Talk, 
        SEC_TO_TIME(sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end)) as Pause,
        SEC_TO_TIME(Sum(case when talk_epoch > wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else wait_sec end)) as Wait,
        SEC_TO_TIME(Sum(dispo_sec + cast(al.dead_sec as signed))) as Dispo,
        SEC_TO_TIME(Sum(case when Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y')  then (cast(Talk_sec as signed)) else 0 end)) as TotalDMCTalkSecs
        from vicidial_agent_log al 
        WHERE event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59' AND campaign_id IN ('" . implode("','", $CampaignList) . "')
        group by date(al.event_time), al.`campaign_id`) d
   on b.campaign_id = d.campaign_id group by b.campaign_id) z";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundStatus') {
    $data = $database->query("select a.campaign_id,group_concat(a.status),group_concat(a.count)
from (SELECT campaign_id,status,count(*) as count FROM asterisk.vicidial_log where call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.campaign_id IN ('" . implode("','", $CampaignList) . "') group by campaign_id,status) a group by a.campaign_id")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundSummary') {

    $query = "select z.Chats,z.Emails,z.in_campaign_id as campaign_id,
      ifnull(z.in_Calls,0) as Calls, 
      ifnull(z.in_Agent_Calls,0) as Connects,
      ROUND(z.in_Agent_Calls/z.in_Calls*100,2) as ConnectRate,
      ifnull(z.in_DMCs, 0) as DMCs, 
      ROUND(z.in_DMCs/z.in_Agent_Calls*100,2) as DMCRate,
      ifnull(z.in_Sales, 0) as Sales, 
    ROUND((ifnull(z.in_Sales, 0))/( ifnull(z.in_DMCs, 0)) * 100, 2) as ConversionRate, 
      z.in_DroppedCalls as Drops,   
      ROUND(z.in_DroppedCalls / ( z.in_Connects + z.in_DroppedCalls) * 100, 2) as DropRate,
      z.ag_Talk as TalkTime, z.ag_Pause as PauseTime, z.ag_Wait as WaitTime, z.ag_Dispo as DispoTime, SEC_TO_TIME(ROUND(z.ag_TotalDMCTalksecs/z.ag_DMCs)) AS AveDMCTalk,z.ag_TotalDMCTalkSecs,
addtime(z.ag_Talk,addtime(z.ag_dispo,z.ag_Wait)) as total_productive,(ifnull(z.in_DMCs, 0))/(time_to_sec(addtime(z.ag_Talk,addtime(z.ag_dispo,z.ag_Wait)))/3600) as DMC_Productive,(z.in_Connects/(ifnull(in_Agent_Calls, 0)))*100 as Total_Connect_Rate, 
((ifnull(z.in_DMCs, 0))/z.in_Connects)*100 as Total_DMCrate,sec_to_time((time_to_sec(z.ag_talk))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_talk,sec_to_time((time_to_sec(z.ag_wait))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_wait,sec_to_time((time_to_sec(z.ag_dispo))/(ifnull(z.in_Agent_Calls, 0) + isnull(z.in_Calls))) as avg_wrap

from 
(select b.Emails,b.Chats,b.campaign_id as in_campaign_id,sum(b.Calls) as in_Calls,sum(b.Connects) as in_Connects,sum(b.Agent_Calls) as in_Agent_Calls,sum(b.DMCs) as in_DMCs,sum(b.Sales) as in_Sales,
sum(b.DroppedCalls) as in_DroppedCalls,sum(d.Calls) as ag_Calls,sum(d.Connects) as ag_Connects,sum(d.DMCs) as ag_DMCs,sum(d.Sales) as ag_Sales
,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Talk))) as ag_Talk,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Pause))) as ag_Pause,
SEC_TO_TIME(SUM(TIME_TO_SEC(d.Wait))) as ag_Wait,SEC_TO_TIME(SUM(TIME_TO_SEC(d.Dispo))) as ag_Dispo,
SEC_TO_TIME(SUM(TIME_TO_SEC(d.TotalDMCTalkSecs))) as ag_TotalDMCTalkSecs
from 
(select date(cl.call_date) as Date, cl.`campaign_id`,cl.uniqueid,
  sum(case when cl.`list_id` is not null then 1 else 0 end) as Calls,
  sum(case when cl.`list_id` is not null and cl.comments = 'EMAIL' then 1 else 0 end) as Emails,
  sum(case when cl.`list_id` is not null and cl.comments = 'CHAT' then 1 else 0 end) as Chats,
  sum(case when cl.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
  sum(case when status is not null then 1 else 0 end) as Agent_Calls,
  sum(case when cl.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
  sum(case when cl.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
  sum(case when cl.status in ('DROP') then 1 else 0 end) as DroppedCalls
  from vicidial_closer_log as cl where 
  cl.call_date between '" . $start . " 00:00:00' and '" . $end . " 23:59:59' AND cl.campaign_id IN ('" . implode("','", $CampaignList) . "')
  group by date(cl.call_date), cl.`campaign_id`,cl.uniqueid) b
 left join
(select date(al.event_time) as Date,al.uniqueid ,
        sum(case when status is not null then 1 else 0 end) as Calls,
        sum(case when al.status in (select status from vicidial_campaign_statuses where human_answered = 'Y')  then 1 else 0 end) as Connects,
        sum(case when al.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y')  then 1 else 0 end) as DMCs,
        sum(case when al.status in (select status from vicidial_campaign_statuses where Sale = 'Y')  then 1 else 0 end) as Sales,
        SEC_TO_TIME(sum(case when al.dispo_epoch > al.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(al.dead_sec as signed) ELSE cast(al.talk_sec as signed) - cast(al.dead_sec as signed) end)) as Talk, 
        SEC_TO_TIME(sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end)) as Pause,
        SEC_TO_TIME(Sum(case when talk_epoch > wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else wait_sec end)) as Wait,
        SEC_TO_TIME(Sum(dispo_sec + cast(al.dead_sec as signed))) as Dispo,
        SEC_TO_TIME(Sum(case when Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y')  then (cast(Talk_sec as signed)) else 0 end)) as TotalDMCTalkSecs
        from vicidial_agent_log al
        WHERE event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59' AND campaign_id IN ('" . implode("','", $CampaignList) . "')
        group by date(al.event_time), al.`campaign_id`,al.uniqueid) d
   on b.uniqueid = d.uniqueid 
  group by b.campaign_id) z";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundStatus') {
    $data = $database->query("SELECT status,campaign_id,count(*) as count FROM vicidial_closer_log WHERE call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND campaign_id IN ('" . implode("','", $CampaignList) . "') AND user != 'VDAD' AND user != 'VDCL' group by campaign_id,status")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'CombinedSummary') {
    $query = "select a.Chats,a.Emails,CONCAT(a.campaign_name,' (',a.campaign_id,')') as CampaignName,a.Calls,a.Connects,ROUND(a.Connects/a.Calls*100,2) as ConnectRate,a.DMCs,ROUND(a.DMCs/a.Connects*100,2) as DMCRate,
a.Sales,
a.Completed,ROUND(a.Sales/a.DMCs*100,2) as ConversionRate,
a.ManDials,
a.Drops,ROUND(a.Drops/a.Connects*100,2) as DropRate,
a.A,
sec_to_time(b.talk) as TalkTime,sec_to_time(b.Pause) as PauseTime,sec_to_time(b.Wait) as WaitTime,
sec_to_time(b.Dispo) as DispoTime from
(select VL.campaign_id,VC.campaign_name,
sum(case when VL.status is not null then 1 else 0 end) as Calls,
sum(case when VL.status is not null and VL.comments = 'EMAIL' then 1 else 0 end) as Emails,
sum(case when VL.status is not null and VL.comments = 'CHAT' then 1 else 0 end) as Chats,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.status in (select status from vicidial_campaign_statuses where answering_machine = 'Y') then 1 else 0 end) as A,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops
from vicidial_agent_log VL
JOIN
vicidial_campaigns VC
ON
VL.campaign_id = VC.campaign_id
WHERE (VL.event_time  between '" . $start . " 00:00:00' and '" . $end . " 23:23:23') AND VL.user != 'VDAD' AND VL.campaign_id IN ('" . implode("','", $CampaignList) . "') 
group by VL.campaign_id) a 

JOIN 

(select VAL.campaign_id,sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) else cast(VAL.talk_sec as signed) end) as Talk,
sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
from vicidial_agent_log VAL
where VAL.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:23:23' group by VAL.campaign_id) b
on a.campaign_id = b.campaign_id";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $resultResponse = array(
        "draw" => intval($data),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'CombinedStatus') {
    
} elseif ($_GET['rule'] == 'Time') {

    $query = "Select a.Talk, SEC_TO_TIME(a.Talk) as TalkTime,a.Pause,SEC_TO_TIME(a.Pause) as PauseTime, a.Wait,SEC_TO_TIME(a.Wait) as WaitTime, a.Dispo,SEC_TO_TIME(a.Dispo) as DispoTime,SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,a.Talk + a.Dispo +a.Pause + a.Wait as Total,round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as WaitPer,round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as TalkPer,round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as PausePer,round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as DispoPer,VC.campaign_name,CONCAT(VC.campaign_name,' (',a.campaign_id,')') as campaign_id
from
 (select VAL.campaign_id,
  sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) else cast(VAL.talk_sec as signed) end) as Talk,
  sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
  Sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
  Sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
  from vicidial_agent_log VAL
  WHERE VAL.event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VAL.campaign_id IN ('" . implode("','", $CampaignList) . "')
  group by VAL.campaign_id
  ) a JOIN vicidial_campaigns VC
  ON a.campaign_id = VC.campaign_id
  ORDER BY a.campaign_id";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal"    => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'Pause') {
    
} else {
    
}

echo json_encode($resultResponse);
