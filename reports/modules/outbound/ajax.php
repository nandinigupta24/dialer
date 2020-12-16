<?php
$ruleList = ['outbound','WrapTime', 'WaitTime', 'PauseTime', 'TalkTime', 'OutboundCalls', 'Performance', 'OutboundStatus', 'InboundSummary', 'InboundStatus', 'Time', 'OutboundSummary', 'AgentOutboundSummary', 'OutboundStatusVertical', 'InboundStatusVertical', 'CombinedSummary', 'LoginLogout', 'LoginLogoutDetail', 'LoginLogoutBreakDown'];
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

if ($_GET['rule'] == 'WrapTime') {
    $data = $database->query("Select user as USERID,user_group, SEC_TO_TIME(Dispo) as Dispo,CallTime
from
(select val.`user`, val.campaign_id, val.user_group,hour(val.event_time) as CallTime,
 Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
 from asterisk.vicidial_agent_log val
 WHERE val.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59'
 #val.event_time > CURDATE()
 group by  val.`user`,hour(val.event_time)) a
 ORDER BY `user`")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($totalRow),
        "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'WaitTime') {
    $data = $database->query("Select user as USERID,user_group,SEC_TO_TIME(Wait) as Wait,CallTime
from
(select val.`user`, val.campaign_id, val.user_group,hour(val.event_time) as CallTime,
 Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait
 from asterisk.vicidial_agent_log val
 WHERE val.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59'
 #val.event_time > CURDATE()
 group by  val.`user`,hour(val.event_time)) a
 ORDER BY `user`")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($totalRow),
        "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'PauseTime') {
    $data = $database->query("Select user as USERID,user_group, SEC_TO_TIME(Pause) as Pause,CallTime
from
(select val.`user`, val.campaign_id, val.user_group,hour(val.event_time) as CallTime,
 #sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
 sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause
 from asterisk.vicidial_agent_log val
 WHERE val.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59'
 #val.event_time > CURDATE()
 group by  val.`user`,hour(val.event_time)) a
 ORDER BY `user`")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($totalRow),
        "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'TalkTime') {
    $data = $database->query("Select user as USERID,user_group,SEC_TO_TIME(Talk) as Talk,CallTime
from
(select val.`user`, val.campaign_id, val.user_group,hour(val.event_time) as CallTime,
 sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk
 from asterisk.vicidial_agent_log val
 WHERE val.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59'
 #val.event_time > CURDATE()
 group by  val.`user`,hour(val.event_time)) a
 ORDER BY `user`")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($totalRow),
        "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundCalls') {
    $data = $database->query("select
DATE_FORMAT(o.call_date, '%d-%m-%y') AS `Call Date`,
TIME_FORMAT(o.call_date, '%H-%i-%s') AS `Call Time`,
SEC_TO_TIME (o.length_in_sec) AS `Length of Call`,
u.full_name AS `Agent Name`,
c.campaign_name AS Campaign,
o.user_group AS `Group`
from vicidial_log o
JOIN campaigns c
ON o.campaign_id=c.campaign_id
JOIN users u
ON o.user=u.user")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'Performance') {
    $query = "Select LOWER(user) as USERID, campaign_id,user_group,Calls,SEC_TO_TIME(Talk) as Talk, SEC_TO_TIME(Pause) as Pause, SEC_TO_TIME(Wait) as Wait,
SEC_TO_TIME(Dispo) as Dispo, DMCs, TotalDMCTalkSecs,CampaignName,AgentName
from
(select val.`user`, val.campaign_id, val.user_group,CONCAT(VU.full_name,' (',VU.user,')') as AgentName,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') as CampaignName,
 sum(case when val.status is not null then 1 else 0 end) as Calls,
 sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) else cast(val.talk_sec as signed) end) as Talk,
 sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
 Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
 Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
 Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs
 from asterisk.vicidial_agent_log val
 JOIN vicidial_campaigns VC
 ON val.campaign_id = VC.campaign_id
 JOIN vicidial_users VU
 ON val.user = VU.user
 WHERE val.event_time between '" . $start . " 00:00:00' and '" . $end . " 23:59:59' ".get_validation('agent','VU','AND',$database)."
 #val.event_time > CURDATE()
 group by  val.`user`) a
 ORDER BY `user`";


    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal" => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundStatus') {
    $data = $database->query("SELECT status,user,user_group,count(*) as count FROM vicidial_log WHERE call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND user != 'VDAD' group by user,status")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundSummary') {
    $query = "select a.Emails,a.Chats,CONCAT(a.full_name,' (',a.user,')') as AgentName,a.user_group,a.Calls,a.Connects,ROUND(a.Connects/a.Calls*100,2) as ConnectRate,a.DMCs,ROUND(a.DMCs/a.Connects*100,2) as DMCRate,a.Sales,a.Completed,ROUND(a.Sales/a.DMCs*100,2) as ConversionRate,a.ManDials,a.Drops,ROUND(a.Drops/a.Connects*100,2) as DropRate,a.A,
sec_to_time(b.talk) as TalkTime,sec_to_time(b.Pause) as PauseTime,sec_to_time(b.Wait) as WaitTime,sec_to_time(b.Dispo) as DispoTime from
(select VL.user as user,VU.full_name as full_name,VL.user_group as user_group,
sum(case when VL.status is not null then 1 else 0 end) as Calls,
sum(case when VL.status is not null and VL.comments = 'EMAIL' then 1 else 0 end) as Emails,
sum(case when VL.status is not null and VL.comments = 'CHAT' then 1 else 0 end) as Chats,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A
from vicidial_closer_log VL
JOIN
vicidial_users VU
ON
VL.user = VU.user
WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23') AND VL.user != 'VDCL' ".get_validation('agent','VU','AND',$database)."
group by VL.user) a

JOIN
(select VAL.user as user,sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) else cast(VAL.talk_sec as signed) end) as Talk,
sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
from vicidial_agent_log VAL
where VAL.event_time between '".$start." 00:00:00' and '".$end." 23:23:23' group by VAL.user) b
on a.user = b.user";
//    $data = $database->select('vicidial_closer_log','*',['AND'=>['call_date[>=]'=>'2019-12-17 00:00:00','user'=>4009]]);

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundStatus') {
    $data = $database->query("SELECT status,user,user_group,count(*) as count FROM vicidial_closer_log WHERE call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND user != 'VDAD' AND user != 'VDCL' group by user,status")->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'Time') {
    $data = $database->query("Select user_group,CONCAT(full_name,' (',user,')') as AgentName,a.Talk, SEC_TO_TIME(a.Talk) as TalkTime,a.Pause,SEC_TO_TIME(a.Pause) as PauseTime, a.Wait,SEC_TO_TIME(a.Wait) as WaitTime, a.Dispo,SEC_TO_TIME(a.Dispo) as DispoTime,SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,a.Talk + a.Dispo +a.Pause + a.Wait as Total,round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as WaitPer,round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as TalkPer,round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as PausePer,round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as DispoPer
from
 (select val.user,VU.full_name,val.user_group,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) else cast(val.talk_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
  from vicidial_agent_log val
  JOIN vicidial_users VU
  ON val.user = VU.user
  WHERE val.event_time BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' ".get_validation('agent','VU','AND',$database)."
  group by val.user
  ) a ORDER BY AgentName")->fetchAll(PDO::FETCH_ASSOC);
    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundSummary') {

    $query = "select CONCAT(a.full_name,' (',a.user,')') as AgentName,a.user,a.full_name,a.user_group,a.Calls,a.Connects,ROUND(a.Connects/a.Calls*100,2) as ConnectRate,a.DMCs,ROUND(a.DMCs/a.Connects*100,2) as DMCRate,a.Sales,a.Completed,ROUND(a.Sales/a.DMCs*100,2) as ConversionRate,a.ManDials,a.Drops,ROUND(a.Drops/a.Connects*100,2) as DropRate,a.A,
b.Talk,SEC_TO_TIME(b.Talk) as TalkTime,b.Pause,SEC_TO_TIME(b.Pause) as PauseTime,b.Wait,SEC_TO_TIME(b.Wait) as WaitTime,b.Dispo,SEC_TO_TIME(b.Dispo) as DispoTime from
(select VL.user as user,VU.full_name as full_name,VU.user_group as user_group,
sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A
from vicidial_log VL
JOIN
vicidial_users VU
ON
VL.user = VU.user
WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23') AND VL.user != 'VDAD' ".get_validation('agent','VU','AND',$database)."
group by VL.user) a

JOIN

(select VAL.user as user,sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) else cast(VAL.talk_sec as signed) end) as Talk,
sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
from vicidial_agent_log VAL
where VAL.event_time between '".$start." 00:00:00' and '".$end." 23:23:23' group by VAL.user) b
on a.user = b.user";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'AgentOutboundSummary') {
//    $data = $database->select('vicidial_log','*',['AND'=>['user'=>$_GET['agent_id'],'call_date[>=]'=>$_GET['start'],'call_date[<=]'=>$_GET['end']]]);
    $data = $database->select('vicidial_log', '*', ['AND' => ['user' => $_GET['agent_id'], 'call_date[>=]' => $_GET['start'] . ' 00:00:00', 'call_date[<=]' => $_GET['end'] . ' 23:59:59']]);
    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'OutboundStatusVertical') {
    $query = "SELECT VL.status,VL.user,VL.user_group,count(*) as Calls,CS.human_answered,CS.customer_contact,CONCAT(VL.status,' - ',CS.status_name) as StatusName,CONCAT(VU.full_name,' (',VL.user,')') as AgentName
FROM asterisk.vicidial_log VL
left join asterisk.vicidial_campaign_statuses CS
on VL.status = CS.status
JOIN vicidial_users VU
ON VL.user = VU.user
where VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.status NOT IN ('DISPO','INCALL','') ".get_validation('agent','VU','AND',$database)."
group by VL.status,VL.user
order by VL.user,VL.status";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'InboundStatusVertical') {
    $query = "SELECT VL.status,VL.user,VL.user_group,count(*) as Calls,CS.human_answered,CS.customer_contact,CONCAT(VL.status,' - ',CS.status_name) as StatusName,CONCAT(VU.full_name,' (',VL.user,')') as AgentName
FROM asterisk.vicidial_closer_log VL
JOIN vicidial_agent_log VAL
ON VL.lead_id = VAL.lead_id
left join asterisk.vicidial_campaign_statuses CS
on VAL.status = CS.status
JOIN vicidial_users VU
ON VL.user = VU.user
where VL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' AND VL.status != '' ".get_validation('agent','VU','AND',$database)." AND VL.status != 'INCALL'
group by VL.status,VL.user
order by VL.user,VL.status";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'CombinedSummary') {

    $query = "select b.Emails,b.Chats,CONCAT(a.full_name,' (',a.user,')') as AgentName,a.user,a.full_name,a.user_group,
        ifnull(b.Calls,0) +ifnull(c.Calls,0) as Calls ,
        ifnull(b.Connects,0) + ifnull(c.Connects,0) as Connects,
        ROUND((ifnull(b.Connects,0) + ifnull(c.Connects,0))/(ifnull(b.Calls,0) +ifnull(c.Calls,0))*100,2) as ConnectRate,
        ifnull(b.DMCs,0) + ifnull(c.DMCs,0) as DMCs,
        ROUND((ifnull(b.DMCs,0) + ifnull(c.DMCs,0))/(ifnull(b.Connects,0) + ifnull(c.Connects,0))*100,2) as DMCRate,
        ifnull(b.Sales,0) + ifnull(c.Sales,0) as Sales,
        ROUND((ifnull(b.Sales,0) + ifnull(c.Sales,0))/(ifnull(b.DMCs,0) + ifnull(c.DMCs,0))*100,2) as ConversionRate,
        ifnull(b.Completed,0) + ifnull(c.Completed,0) as Completed ,
        ifnull(b.ManDials,0) + ifnull(c.ManDials,0) as ManDials,
        ifnull(b.Drops,0) + ifnull(c.Drops,0) as Drops,
        ROUND((ifnull(b.Drops,0) + ifnull(c.Drops,0))/(ifnull(b.Connects,0) + ifnull(c.Connects,0))*100,2) as DropRate,
ifnull(b.A,0) + ifnull(c.A,0) as A,
sec_to_time(a.talk) as TalkTime,sec_to_time(a.Pause) as PauseTime,sec_to_time(a.Wait) as WaitTime,
sec_to_time(a.Dispo) as DispoTime
from
(select VAL.user as user,VU.full_name,VAL.user_group as user_group,sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) else cast(VAL.talk_sec as signed) end) as Talk,
sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
from vicidial_agent_log VAL
JOIN
vicidial_users VU
ON
VAL.user = VU.user
where VAL.event_time between '".$start." 00:00:00' and '".$end." 23:23:23' ".get_validation('agent','VU','AND',$database)." group by VAL.user) a

LEFT JOIN

(select VL.user as user,VU.full_name as full_name,VL.user_group as user_group,
sum(case when VL.status is not null then 1 else 0 end) as Calls,
sum(case when VL.status is not null and VL.comments = 'EMAIL' then 1 else 0 end) as Emails,
sum(case when VL.status is not null and VL.comments = 'CHAT' then 1 else 0 end) as Chats,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A
from vicidial_closer_log VL
JOIN
vicidial_users VU
ON
VL.user = VU.user
WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23') AND VL.user != 'VDAD' ".get_validation('agent','VU','AND',$database)."
group by VL.user) b on a.user= b.user

LEFT JOIN

(select VL.user as user,VU.full_name as full_name,VL.user_group as user_group,
sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A
from vicidial_log VL
JOIN
vicidial_users VU
ON
VL.user = VU.user
WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23') AND VL.user != 'VDAD' ".get_validation('agent','VU','AND',$database)."
group by VL.user) c on a.user = c.user";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'LoginLogout') {
    $query = "SELECT U.user,CONCAT(U.full_name,' (',U.user,')') as AgentName,
U.user_group as AgentGroup,
MIN(UL.event_date) as FirstLogin,
MAX(UL.event_date) as FirstLogout,
SEC_TO_TIME(talk+wait+wrap+pause+system_pause) as TotalLoggedIN
FROM asterisk.vicidial_user_log UL
JOIN asterisk.vicidial_users U
ON UL.user = U.user
inner join (select user,
               sum(case when wait_epoch > pause_epoch then wait_epoch - pause_epoch else pause_sec end) as pause,

               sum(case when sub_status is null then

                                             case when wait_epoch > pause_epoch then wait_epoch - pause_epoch else pause_sec end

                              else 0 end) as system_pause,



               sum(case when talk_epoch > wait_epoch then talk_epoch - wait_epoch else wait_sec end) as wait,

               sum(case when dispo_epoch > talk_epoch then dispo_epoch - talk_epoch else talk_sec end) as talk,

               sum(dispo_sec) as wrap,

               sum(dead_sec) as dead,sum(talk_sec) as TalkSec,sum(dispo_sec) as DispoSec,sum(pause_sec) as PauseSec,sum(wait_sec) as WaitSec from vicidial_agent_log where event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' group by user) VAL on UL.user = VAL.user
WHERE UL.event_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
AND UL.event IN ('LOGIN','LOGOUT') ".get_validation('agent','U','AND',$database)."
GROUP BY UL.user
order by UL.event desc";
//    $query = "SELECT U.user,CONCAT(U.full_name,' (',U.user,')') as AgentName,
//U.user_group as AgentGroup,
//MIN(UL.event_date) as FirstLogin,
//MAX(UL.event_date) as FirstLogout,
//SEC_TO_TIME(VAL.TalkSec+VAL.PauseSec+VAL.WaitSec+VAL.DispoSec) as TotalLoggedIN
//SEC_TO_TIME(VAL.TalkSec+VAL.PauseSec+VAL.WaitSec+VAL.DispoSec) as TotalLoggedIN
//FROM asterisk.vicidial_user_log UL
//JOIN asterisk.vicidial_users U
//ON UL.user = U.user
//inner join (select user,sum(case when al.status is not null then 1 else 0 end) as num_calls,
//
//               sum(case when wait_epoch > pause_epoch then wait_epoch - pause_epoch else pause_sec end) as pause,
//
//               sum(case when sub_status is null then
//
//                                             case when wait_epoch > pause_epoch then wait_epoch - pause_epoch else pause_sec end
//
//                              else 0 end) as system_pause,
//
//
//
//               sum(case when talk_epoch > wait_epoch then talk_epoch - wait_epoch else wait_sec end) as wait,
//
//               sum(case when dispo_epoch > talk_epoch then dispo_epoch - talk_epoch else talk_sec end) as talk,
//
//               sum(dispo_sec) as wrap,
//
//               sum(dead_sec) as dead,sum(talk_sec) as TalkSec,sum(dispo_sec) as DispoSec,sum(pause_sec) as PauseSec,sum(wait_sec) as WaitSec from vicidial_agent_log where event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' group by user) VAL on UL.user = VAL.user
//WHERE UL.event_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
//AND UL.event IN ('LOGIN','LOGOUT') ".get_validation('agent','U','AND',$database)."
//GROUP BY UL.user
//order by UL.event desc";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'LoginLogoutDetail') {
    $AgentID = $_GET['AgentID'];
    $query = "SELECT U.full_name,UL.event_date,event,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') as CampaignName,extension,computer_ip
FROM asterisk.vicidial_user_log UL
JOIN asterisk.vicidial_users U
ON UL.user = U.user
JOIN asterisk.vicidial_campaigns VC
ON UL.campaign_id = VC.campaign_id
WHERE UL.event_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
AND UL.event IN ('LOGIN','LOGOUT') ".get_validation('agent','U','AND',$database)." AND UL.user='" . $AgentID."'";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'LoginLogoutBreakDown') {
    $query = "SELECT DATE(UL.event_date) as DateFormat,U.user,CONCAT(U.full_name,' (',U.user,')') as AgentName,
U.user_group as AgentGroup,
MIN(UL.event_date) as FirstLogin,
MAX(UL.event_date) as FirstLogout,
SEC_TO_TIME(VAL.TalkSec+VAL.PauseSec+VAL.WaitSec+VAL.DispoSec) as TotalLoggedIN
FROM asterisk.vicidial_user_log UL
JOIN asterisk.vicidial_users U
ON UL.user = U.user
inner join (select user,sum(talk_sec) as TalkSec,sum(dispo_sec) as DispoSec,sum(pause_sec) as PauseSec,sum(wait_sec) as WaitSec from vicidial_agent_log where event_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' group by user) VAL on UL.user = VAL.user
WHERE UL.event_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'
AND UL.event IN ('LOGIN','LOGOUT') ".get_validation('agent','U','AND',$database)."
GROUP BY UL.user,DATE(UL.event_date)
ORDER BY DateFormat";

    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
}elseif($_GET['rule'] == 'outbound'){
//     $Query = "SELECT * FROM vicidial_log VCL WHERE VCL.call_date BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND status is NOT NULL ". get_validation('campaign','VCL','AND',$database)." ORDER BY VCL.call_date desc";
     $Query = "SELECT VCL.*,CONCAT(VU.full_name,'(',VCL.user,')') as user FROM vicidial_log VCL JOIN vicidial_users VU
ON
VCL.user = VU.user WHERE VCL.call_date BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND status is NOT NULL ". get_validation('campaign','VCL','AND',$database)." ORDER BY VCL.call_date desc";

    $data = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal" => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} else {

}

echo json_encode($resultResponse);
