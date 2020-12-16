<?php

$result = [];
$ruleList = ['OutboundSummary', 'InboundSummary', 'CombinedSummary', 'OutboundTime', 'HourBreakDown', 'Content', 'Penetration'];
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
    $query = "Select b.totalLeads,CONCAT(a.list_name,' (',a.list_id,')') as ListName,a.list_id,a.list_name,a.DEC_Status,a.Calls,a.Connects,ROUND(a.Connects/a.Calls*100,2) as ConnectRate, a.DMCs, ROUND(a.DMCs/a.Connects*100,2) as DMCRate,a.Sales,a.Completed,ROUND(a.Sales/a.DMCs*100,2) as ConversionRate,a.ManDials,a.Drops,ROUND(a.Drops/a.Connects*100,2) as DropRate,a.A
from
(select VL.list_id as list_id,VU.list_name as list_name,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.status in ('DEC') then 1 else 0 end) as DEC_Status,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A
 from vicidial_log VL JOIN vicidial_lists VU ON VL.list_id = VU.list_id
 WHERE VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' " . get_validation('list', 'VU', 'AND',$database) . "
 group by VL.list_id) a
LEFT JOIN
(select list_id,count(lead_id) as totalLeads from
vicidial_list
 group by list_id
  ) b on a.list_id = b.list_id";
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundSummary') {
    $query = "Select Emails,Chats,CONCAT(list_name,' (',list_id,')')as ListName,list_id,list_name,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,ManDials,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VL.list_id,VU.list_name,
 sum(case when VL.status is not null then 1 else 0 end) as Calls,
 sum(case when VL.status is not null and VL.comments = 'CHAT' then 1 else 0 end) as Chats,
 sum(case when VL.status is not null and VL.comments = 'EMAIL' then 1 else 0 end) as Emails,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A
 from vicidial_closer_log VL
 JOIN
 vicidial_lists VU
 ON
 VL.list_id = VU.list_id
 WHERE VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.user != 'VDAD' " . get_validation('list', 'VU', 'AND',$database) . "
 group by VL.list_id) a";
    
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'CombinedSummary') {
    $query = "Select Chats,Emails,CONCAT(list_name,' (',list_id,')') as ListName,list_id,list_name,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,ManDials,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VU.list_id,VU.list_name,
 sum(case when VL.status is not null then 1 else 0 end) as Calls,
 sum(case when VL.status is not null and VL.comments = 'CHAT' then 1 else 0 end) as Chats,
 sum(case when VL.status is not null and VL.comments = 'EMAIL' then 1 else 0 end) as Emails,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A
 from vicidial_agent_log VL
JOIN
 vicidial_list VLL
 ON
 VL.lead_id = VLL.lead_id
 JOIN
 vicidial_lists VU
 ON
 VLL.list_id = VU.list_id
 WHERE VL.event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.user != 'VDAD' " . get_validation('list', 'VU', 'AND',$database) . "
 group by VLL.list_id) a";
    
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundTime') {
    $Query = "Select a.Talk, SEC_TO_TIME(a.Talk) as TalkTime,a.Pause,SEC_TO_TIME(a.Pause) as PauseTime, a.Wait,SEC_TO_TIME(a.Wait) as WaitTime, a.Dispo,SEC_TO_TIME(a.Dispo) as DispoTime,SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,a.Talk + a.Dispo +a.Pause + a.Wait as Total,round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as WaitPer,round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as TalkPer,round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as PausePer,round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as DispoPer,VC.list_name,CONCAT(VC.list_name,' (',VC.list_id,')') as ListName
from
 (select VL.list_id,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
  from vicidial_agent_log val
  JOIN
  vicidial_log VL
  ON
  val.lead_id = VL.lead_id
  WHERE val.event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
  group by VL.list_id
  ) a JOIN vicidial_lists VC
  ON a.list_id = VC.list_id
  " . get_validation('list', 'VC', 'WHERE',$database) . "
  ORDER BY a.list_id";

    $data = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'HourBreakDown') {
    $query = "Select EventTimeHour,CONCAT(list_name,' (',list_id,')') as ListName,list_id,list_name,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VU.list_id,VU.list_name,HOUR(VL.event_time) as EventTimeHour,
 sum(case when VL.status is not null then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A
 from vicidial_agent_log VL
JOIN
 vicidial_list VLL
 ON
 VL.lead_id = VLL.lead_id
 JOIN
 vicidial_lists VU
 ON
 VLL.list_id = VU.list_id
 WHERE VL.event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.user != 'VDAD' " . get_validation('list', 'VU', 'AND',$database) . "
 group by VLL.list_id,HOUR(VL.event_time)) a ORDER BY EventTimeHour";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'Content') {
    $query = "select
CONCAT(VL.list_name,' (',VL.list_id,')') as ListName,
CONCAT(VCS.status_name,' (',VCS.status,')') as StatusName,
VCS.human_answered,
a.status_count as NumberOfLeads,
b.total,
round((a.status_count*100)/b.total,2) as Percentage
from
(select status,list_id,count(*) as status_count from vicidial_list group by status,list_id) a
join  (select list_id,count(*) as total from vicidial_list group by list_id)  b on a.list_id = b.list_id
JOIN vicidial_campaign_statuses VCS ON a.status = VCS.status
JOIN vicidial_lists VL ON a.list_id = VL.list_id " . get_validation('list', 'VL', 'WHERE',$database);

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'Penetration') {
    $query = "SELECT
CONCAT(VLS.list_name,' (',VLS.list_id,')') as ListName,
CONCAT(VC.campaign_name,' (',VC.campaign_id,')') as CampaignName,
VLS.list_lastcalldate as LastDialled,
b.total AS TotalLeads,
C.total AS DialableLeads,
(round((C.total*100)/b.total,2)) AS PercentageDialable,
VLS.active as Status
FROM vicidial_lists VLS
JOIN vicidial_campaigns VC
ON VLS.campaign_id = VC.campaign_id
JOIN  (SELECT list_id,count(*) AS total FROM vicidial_list GROUP BY list_id)  b
ON
VLS.list_id = b.list_id
JOIN  (SELECT list_id,count(*) AS total FROM vicidial_list where called_since_last_reset = 'N' GROUP BY list_id)  C
ON
VLS.list_id = b.list_id " . get_validation('list', 'VLS', 'WHERE',$database) . "
GROUP BY VLS.list_id";
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} else {
    
}

echo json_encode($resultResponse);
