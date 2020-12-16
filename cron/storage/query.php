<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$DBQueries = [];
$DBQueries['agent_outbound_summary'] = "Select CONCAT(full_name,' (',user,')') as AgentName,user_group,Calls as Calls_To_Agent,ManDials,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,A,ROUND(Drops/Connects*100,2) as DropRate,SEC_TO_TIME(TalkTime) as Talk,SEC_TO_TIME(WaitTime) as Wait,SEC_TO_TIME(PauseTime) as Pause,SEC_TO_TIME(DispoTime) as Dispo
from
(select VL.user,VU.full_name,VL.user_group,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A,
 sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) - cast(VAL.dead_sec as signed) else cast(VAL.talk_sec as signed)- cast(VAL.dead_sec as signed) end) as TalkTime,
 sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as PauseTime,
 sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as WaitTime,
 sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as DispoTime
 from vicidial_log VL
 JOIN
 vicidial_agent_log VAL
 ON 
 VL.lead_id = VAL.lead_id
 JOIN
 vicidial_users VU
 ON
 VL.user = VU.user
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
 group by VL.user) a
 ORDER BY AgentName";

$DBQueries['agent_inbound_summary'] = "Select CONCAT(full_name,' (',user,')') as AgentName,user_group AS Agent_Group,Calls AS Calls_To_Agent,ManDials as Manual_Dials,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,A,ROUND(Drops/Connects*100,2) as DropRate,SEC_TO_TIME(TalkTime) as Talk,SEC_TO_TIME(WaitTime) as Wait,SEC_TO_TIME(PauseTime) as Pause,SEC_TO_TIME(DispoTime) as Dispo
from
(select VL.user,VU.full_name,VL.user_group,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A,
 sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) - cast(VAL.dead_sec as signed) else cast(VAL.talk_sec as signed)- cast(VAL.dead_sec as signed) end) as TalkTime,
 sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as PauseTime,
 sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as WaitTime,
 sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as DispoTime
 from vicidial_closer_log VL
 JOIN
 vicidial_agent_log VAL
 ON 
 VL.lead_id = VAL.lead_id
 JOIN
 vicidial_users VU
 ON
 VL.user = VU.user
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDCL' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
 group by VL.user) a
 ORDER BY AgentName";

$DBQueries['agent_combined_summary'] = "Select CONCAT(full_name,' (',user,')') as AgentName,user_group,Calls AS Calls_To_Agent,ManDials AS Manual_Dials,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,A AS Answering_Machines,ROUND(Drops/Connects*100,2) as DropRate,SEC_TO_TIME(TalkTime) as Talk,SEC_TO_TIME(WaitTime) as Wait,SEC_TO_TIME(PauseTime) as Pause,SEC_TO_TIME(DispoTime) as Dispo
from
(select VL.user,VU.full_name,VL.user_group,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A,
 sum(case when VL.dispo_epoch > VL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VL.talk_epoch),FROM_UNIXTIME(VL.dispo_epoch)) - cast(VL.dead_sec as signed) else cast(VL.talk_sec as signed)- cast(VL.dead_sec as signed) end) as TalkTime,
 sum(case when VL.wait_epoch > VL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VL.pause_epoch),FROM_UNIXTIME(VL.wait_epoch)) else VL.pause_sec end) as PauseTime,
 sum(case when VL.talk_epoch > VL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VL.wait_epoch),FROM_UNIXTIME(VL.talk_epoch)) else VL.wait_sec end) as WaitTime,
 sum(VL.dispo_sec + cast(VL.dead_sec as signed)) as DispoTime
from 
 vicidial_agent_log VL
 JOIN
 vicidial_users VU
 ON
 VL.user = VU.user
 WHERE VL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' AND VL.status != '' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
 group by VL.user) a
 ORDER BY AgentName";

$DBQueries['agent_outbound_disposition'] = "select CONCAT(full_name,' (',user,')') as AgentName,a.user,a.user_group,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus  
from (SELECT VU.full_name,VL.user,VL.user_group,VL.status,count(*) as count FROM asterisk.vicidial_log VL JOIN vicidial_users VU ON VL.user=VU.user where VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by VL.user,status) a group by a.user";

$DBQueries['agent_inbound_disposition'] = "select CONCAT(full_name,' (',user,')') as AgentName,a.user,a.user_group,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus  
from (SELECT VU.full_name,VCL.user,VCL.user_group,VCL.status,count(*) as count FROM vicidial_closer_log VCL JOIN vicidial_users VU ON VCL.user=VU.user where VCL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VCL.user != 'VDCL' ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by VCL.user,VCL.status) a group by a.user";

$DBQueries['agent_combined_disposition'] = "select CONCAT(full_name,' (',user,')') as AgentName,a.user,a.user_group,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus  
from (SELECT VU.full_name,VL.user,VL.user_group,VL.status,count(*) as count FROM vicidial_agent_log VL JOIN vicidial_users VU ON VL.user=VU.user where VL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' AND VL.status != '' ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by VL.user,VL.status) a group by a.user";

$DBQueries['agent_time_summary'] = "Select CONCAT(full_name,' (',user,')') as AgentName,user_group AS Agent_Group,
    SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,
    SEC_TO_TIME(a.Talk) as Talk,
    SEC_TO_TIME(a.Pause) as Pause, 
    SEC_TO_TIME(a.Wait) as Wait, 
    SEC_TO_TIME(a.Dispo) as Dispo,
    round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Wait_Percentage,
    round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Talk_Percentage,
    round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Pause_Percentage,
    round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Dispo_Percentage
from
 (select val.user,VU.full_name,val.user_group,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
  from vicidial_agent_log val
  JOIN vicidial_users VU
  ON val.user = VU.user
  WHERE val.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' ". get_validation_cron($database,'agent','VU','AND',$UserID)." 
  group by val.user
  ) a ORDER BY AgentName";

$DBQueries['agent_pause_summary'] = "select 
CONCAT(VU.full_name,' (',VU.user,')') AS AgentName,group_concat(s.sub_status) AS StatusList,GROUP_CONCAT(s.total) AS StatusCount 
from 
(select user,sub_status,SEC_TO_TIME(sum(pause_sec)) as total 
from vicidial_agent_log 
WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND sub_status != ''
group by user,sub_status
) s 
JOIN vicidial_users VU
ON
s.user = VU.user
". get_validation_cron($database,'agent','VU','WHERE',$UserID)."
GROUP BY s.user";

$DBQueries['agent_login_logout_summary'] = "SELECT CONCAT(U.full_name,' (',U.user,')') as Agent,
U.user_group as Agent,
MIN(UL.event_date) as FirstLogin,
MAX(UL.event_date) as FirstLogout,
SEC_TO_TIME(VAL.TalkSec+VAL.PauseSec+VAL.WaitSec+VAL.DispoSec) as TotalLoggedIN
FROM asterisk.vicidial_user_log UL
JOIN asterisk.vicidial_users U
ON UL.user = U.user
inner join (select user,sum(talk_sec) as TalkSec,sum(dispo_sec) as DispoSec,sum(pause_sec) as PauseSec,sum(wait_sec) as WaitSec from vicidial_agent_log where event_time BETWEEN '2019-09-27 00:00:00' AND '2019-09-27 23:59:59' group by user) VAL on UL.user = VAL.user
WHERE UL.event_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59'
AND UL.event IN ('LOGIN','LOGOUT') ". get_validation_cron($database,'agent','U','AND',$UserID)."
GROUP BY UL.user
order by UL.event desc";

$DBQueries['agent_outbound_vertical_disposition'] = "SELECT CONCAT(VU.full_name,' (',VL.user,')') as Agent,CONCAT(VL.status,' - ',CS.status_name) as Status,
    count(*) as Calls,
    CS.human_answered,
    CS.customer_contact
FROM asterisk.vicidial_log VL
left join asterisk.vicidial_campaign_statuses CS
on VL.campaign_id = CS.campaign_id
JOIN vicidial_users VU  
ON VL.user = VU.user
where VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.status != '' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
group by VL.status,VL.user
order by VL.user,VL.status";

$DBQueries['agent_inbound_vertical_disposition'] = "SELECT CONCAT(VU.full_name,' (',VL.user,')') as Agent,CONCAT(VL.status,' - ',CS.status_name) as Status,
    count(*) as Calls,
    CS.human_answered,
    CS.customer_contact
FROM asterisk.vicidial_closer_log VL
JOIN vicidial_agent_log VAL
ON VL.lead_id = VAL.lead_id
left join asterisk.vicidial_campaign_statuses CS
on VAL.campaign_id = CS.campaign_id
JOIN vicidial_users VU  
ON VL.user = VU.user
where VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.status != '' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
group by VL.status,VL.user
order by VL.user,VL.status";

$DBQueries['agent_performance'] = "Select AgentName AS Agent_ID,CampaignName AS Campaign_ID,user_group AS Agent_Group ,Calls,SEC_TO_TIME(Talk) as Talk, SEC_TO_TIME(Pause) as Pause, SEC_TO_TIME(Wait) as Wait, 
SEC_TO_TIME(Dispo) as Dispo, DMCs, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,CONCAT(VU.full_name,' (',VU.user,')') as AgentName,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') as CampaignName,
 sum(case when val.status is not null then 1 else 0 end) as Calls,
 sum(case when val.status in (select status from status_combined where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when val.status in (select status from status_combined where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when val.status in (select status from status_combined where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
 sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
 Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
 Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
 Sum(case when val.Status in (select status from status_combined where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs
 from asterisk.vicidial_agent_log val
 JOIN vicidial_campaigns VC
 ON val.campaign_id = VC.campaign_id
 JOIN vicidial_users VU
 ON val.user = VU.user
 WHERE val.event_time between 'StartDate 00:00:00' and 'EndDate 23:59:59' ". get_validation_cron($database,'agent','VU','AND',$UserID)."
 #val.event_time > CURDATE()
 group by  val.`user`) a
 ORDER BY `user`";

$DBQueries['agent_talk_hour_report'] = "select VU.full_name,a.user,a.user_group,group_concat(a.CallDate) as CallDateCount,group_concat(a.count) as countTotal,sum(a.count) as total  
from (SELECT HOUR(event_time) as CallDate,user,user_group,sum(talk_sec) as count FROM asterisk.vicidial_agent_log WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND HOUR(event_time) > 0 group by user,HOUR(event_time)) a JOIN vicidial_users VU ON a.user = VU.user ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by a.user";

$DBQueries['agent_pause_hour_report'] = "select VU.full_name,a.user,a.user_group,group_concat(a.CallDate) as CallDateCount,group_concat(a.count) as countTotal,sum(a.count) as total  
from (SELECT HOUR(event_time) as CallDate,user,user_group,sum(pause_sec) as count FROM asterisk.vicidial_agent_log WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND HOUR(event_time) > 0 group by user,HOUR(event_time)) a JOIN vicidial_users VU ON a.user = VU.user ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by a.user";

$DBQueries['agent_wait_hour_report'] = "select VU.full_name,a.user,a.user_group,group_concat(a.CallDate) as CallDateCount,group_concat(a.count) as countTotal,sum(a.count) as total  
from (SELECT HOUR(event_time) as CallDate,user,user_group,sum(wait_sec) as count FROM asterisk.vicidial_agent_log WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND HOUR(event_time) > 0 group by user,HOUR(event_time)) a JOIN vicidial_users VU ON a.user = VU.user ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by a.user";

$DBQueries['agent_wrap_hour_report'] = "select VU.full_name,a.user,a.user_group,group_concat(a.CallDate) as CallDateCount,group_concat(a.count) as countTotal,sum(a.count) as total  
from (SELECT HOUR(event_time) as CallDate,user,user_group,sum(dispo_sec) as count FROM asterisk.vicidial_agent_log WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND HOUR(event_time) > 0 group by user,HOUR(event_time)) a JOIN vicidial_users VU ON a.user = VU.user ". get_validation_cron($database,'agent','VU','AND',$UserID)." group by a.user";



/* * *****************CAMPAIGN WISE****************** */
$DBQueries['campaign_outbound_summary'] = "Select CONCAT(campaign_name,' (',campaign_id,')') as CampaignName, Calls, Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,ManDials,Drops,ROUND(Drops/Connects*100,2) as DropRate,A,SEC_TO_TIME(Talk) as TalkTime,SEC_TO_TIME(Pause) as PauseTime,SEC_TO_TIME(Wait) as WaitTime,SEC_TO_TIME(Dispo) as DispoTime
from
(select VL.campaign_id,VC.campaign_name,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A,
 sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) - cast(VAL.dead_sec as signed) else cast(VAL.talk_sec as signed)- cast(VAL.dead_sec as signed) end) as Talk,
 sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
 sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
 sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
 from vicidial_log VL
 JOIN
 vicidial_agent_log VAL
 ON 
 VL.lead_id = VAL.lead_id
 JOIN
 vicidial_campaigns VC
 ON
 VL.campaign_id = VC.campaign_id
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.campaign_id != '' ". get_validation_cron($database,'campaign','VC','AND',$UserID)."
 group by VL.campaign_id) a
 ORDER BY campaign_id";

$DBQueries['campaign_inbound_summary'] = "Select campaign_id as CampaignName, Calls, Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,ManDials,Drops,ROUND(Drops/Connects*100,2) as DropRate,A,SEC_TO_TIME(Talk) as TalkTime,SEC_TO_TIME(Pause) as PauseTime,SEC_TO_TIME(Wait) as WaitTime,SEC_TO_TIME(Dispo) as DispoTime
from
(select VL.campaign_id,VC.campaign_name,VC.campaign_id as CampaignID,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A,
 sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) - cast(VAL.dead_sec as signed) else cast(VAL.talk_sec as signed)- cast(VAL.dead_sec as signed) end) as Talk,
 sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
 sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
 sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
 from vicidial_closer_log VL
 JOIN
 vicidial_agent_log VAL
 ON 
 VL.lead_id = VAL.lead_id
 JOIN
 vicidial_campaigns VC
 ON
 VAL.campaign_id = VC.campaign_id
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.campaign_id != '' ". get_validation_cron($database,'campaign','VC','AND',$UserID)."
 group by VL.campaign_id) a
 ORDER BY campaign_id";

$DBQueries['campaign_combined_summary'] = "SELECT CONCAT(campaign_name,' (',campaign_id,')') as CampaignName, Calls, Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,ROUND(Drops/Connects*100,2) as DropRate,A,SEC_TO_TIME(Talk) as TalkTime,SEC_TO_TIME(Pause) as PauseTime,SEC_TO_TIME(Wait) as WaitTime,SEC_TO_TIME(Dispo) as DispoTime
FROM
(select VAL.campaign_id,VC.campaign_name,
 sum(case when VAL.status is not null then 1 else 0 end) as Calls,
 sum(case when VAL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VAL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VAL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VAL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VAL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VAL.status='A' then 1 else 0 end) as A,
 sum(case when VAL.dispo_epoch > VAL.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.talk_epoch),FROM_UNIXTIME(VAL.dispo_epoch)) - cast(VAL.dead_sec as signed) else cast(VAL.talk_sec as signed)- cast(VAL.dead_sec as signed) end) as Talk,
 sum(case when VAL.wait_epoch > VAL.pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.pause_epoch),FROM_UNIXTIME(VAL.wait_epoch)) else VAL.pause_sec end) as Pause,
 sum(case when VAL.talk_epoch > VAL.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(VAL.wait_epoch),FROM_UNIXTIME(VAL.talk_epoch)) else VAL.wait_sec end) as Wait,
 sum(VAL.dispo_sec + cast(VAL.dead_sec as signed)) as Dispo
 FROM vicidial_agent_log VAL
 JOIN
 vicidial_campaigns VC
 ON
 VAL.campaign_id = VC.campaign_id
 WHERE VAL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VAL.campaign_id != '' ". get_validation_cron($database,'campaign','VC','AND',$UserID)."
 GROUP BY VAL.campaign_id) a
 ORDER BY campaign_id";

$DBQueries['campaign_outbound_disposition'] = "select a.campaign_id,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus,VC.campaign_name,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') AS CampaignName  
from (SELECT campaign_id,status,count(*) as count FROM asterisk.vicidial_log where call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' group by campaign_id,status) a  JOIN vicidial_campaigns VC ON a.campaign_id=VC.campaign_id ". get_validation_cron($database,'campaign','VC','AND',$UserID)." group by a.campaign_id";

$DBQueries['campaign_inbound_disposition'] = "select a.campaign_id,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') AS CampaignName  
from (SELECT campaign_id,status,count(*) as count FROM asterisk.vicidial_closer_log  where call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' group by campaign_id,status) a JOIN vicidial_campaigns VC ON a.campaign_id=VC.campaign_id ". get_validation_cron($database,'campaign','VC','AND',$UserID)." group by a.campaign_id";

$DBQueries['campaign_combined_disposition'] = "select a.campaign_id,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus,VC.campaign_name,CONCAT(VC.campaign_name,' (',VC.campaign_id,')') AS CampaignName
from (SELECT campaign_id,status,count(*) as count FROM asterisk.vicidial_agent_log where event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND status != '' group by campaign_id,status) a  JOIN vicidial_campaigns VC ON a.campaign_id=VC.campaign_id ". get_validation_cron($database,'campaign','VC','AND',$UserID)." group by a.campaign_id";

$DBQueries['campaign_time_summary'] = "Select CONCAT(VC.campaign_name,' (',a.campaign_id,')') as Campaign,
    SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,
    SEC_TO_TIME(a.Talk) as TalkTime,
    round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Talk_Percentage,
    SEC_TO_TIME(a.Pause) as PauseTime,
    round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Pause_Percentage,
    SEC_TO_TIME(a.Wait) as WaitTime,
    round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Wait_Percentage,
    SEC_TO_TIME(a.Dispo) as DispoTime,
    round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Dispo_Percentage
from
 (select val.campaign_id,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo
  from vicidial_agent_log val
  WHERE val.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' 
  group by val.campaign_id
  ) a JOIN vicidial_campaigns VC
  ON a.campaign_id = VC.campaign_id
  ". get_validation_cron($database,'campaign','VC','WHERE',$UserID)."
  ORDER BY a.campaign_id";

$DBQueries['campaign_pause_summary'] = "select 
CONCAT(VC.campaign_name,' (',VC.campaign_id,')') AS CampaignName,group_concat(s.sub_status) AS StatusList,GROUP_CONCAT(s.total) AS StatusCount 
from 
(select campaign_id,sub_status,sum(pause_sec) as total 
from vicidial_agent_log 
WHERE event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND sub_status != ''
group by campaign_id,sub_status
) s 
JOIN vicidial_campaigns VC
ON
s.campaign_id = VC.campaign_id
". get_validation_cron($database,'campaign','VC','WHERE',$UserID)."
GROUP BY s.campaign_id";


/* * *****************DATA LIST WISE****************** */
$DBQueries['list_outbound_summary'] = "Select CONCAT(a.list_name,' (',a.list_id,')') as ListName,b.totalLeads,a.Calls,a.Connects,ROUND(a.Connects/a.Calls*100,2) as ConnectRate, a.DMCs, ROUND(a.DMCs/a.Connects*100,2) as DMCRate,a.Sales,a.Completed,a.Drops,ROUND(a.Drops/a.Connects*100,2) as DropRate,a.A
from
(select VL.list_id as list_id,VU.list_name as list_name,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
 sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
 sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
 sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
 sum(case when VL.status='A' then 1 else 0 end) as A
 from vicidial_log VL JOIN vicidial_lists VU ON VL.list_id = VU.list_id
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'list','VU','AND',$UserID)."
 group by VL.list_id) a
LEFT JOIN    
(select list_id,count(lead_id) as totalLeads from
vicidial_list
 group by list_id
  ) b on a.list_id = b.list_id";

$DBQueries['list_inbound_summary'] = "Select CONCAT(list_name,' (',list_id,')') AS ListName,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VL.list_id,VU.list_name,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
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
 WHERE VL.call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'list','VU','AND',$UserID)."
 group by VL.list_id) a";

$DBQueries['list_combined_summary'] = "Select CONCAT(list_name,' (',list_id,')') as ListName,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VU.list_id,VU.list_name,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
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
 WHERE VL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'list','VU','AND',$UserID)."
 group by VLL.list_id) a";

$DBQueries['list_outbound_disposition'] = "select CONCAT(VC.list_name,' (',a.list_id,')') AS ListName,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus  
from (SELECT list_id,status,count(*) as count FROM asterisk.vicidial_log where call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' group by list_id,status) a  
JOIN vicidial_lists VC ON a.list_id=VC.list_id ". get_validation_cron($database,'list','VC','WHERE',$UserID)." group by a.list_id";

$DBQueries['list_inbound_disposition'] = "select CONCAT(VC.list_name,' (',a.list_id,')') AS ListName,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus 
from (SELECT list_id,status,count(*) as count FROM asterisk.vicidial_closer_log where call_date BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' group by list_id,status) a  
JOIN vicidial_lists VC ON a.list_id=VC.list_id ". get_validation_cron($database,'list','VC','WHERE',$UserID)." group by a.list_id";

$DBQueries['list_combined_disposition'] = "select CONCAT(VC.list_name,' (',a.list_id,')') AS ListName,group_concat(a.status) as nameStatus,group_concat(a.count) as countStatus  
from (SELECT VL.list_id,VAL.status,count(*) as count FROM asterisk.vicidial_agent_log  VAL JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id 
where VAL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VAL.status != '' group by VL.list_id,VAL.status) a  
JOIN vicidial_lists VC ON a.list_id=VC.list_id ". get_validation_cron($database,'list','VC','WHERE',$UserID)." group by a.list_id";

$DBQueries['list_outbound_time'] = "Select CONCAT(VC.list_name,' (',VC.list_id,')') as ListName,SEC_TO_TIME(a.Talk + a.Dispo +a.Pause + a.Wait) as TotalTime,
    SEC_TO_TIME(a.Talk) as Talk,
    round(((a.Talk*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Talk_Percentage,
    SEC_TO_TIME(a.Pause) as Pause,
    round(((a.Pause*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Pause_Percentage,
    SEC_TO_TIME(a.Wait) as Wait,
    round(((a.Wait*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Wait_Percentage,
    SEC_TO_TIME(a.Dispo) as Dispo,
    round(((a.Dispo*100)/(a.Talk + a.Dispo +a.Pause + a.Wait)),2) as Dispo_Percentage
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
  WHERE val.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' 
  group by VL.list_id
  ) a JOIN vicidial_lists VC
  ON a.list_id = VC.list_id
  ". get_validation_cron($database,'list','VC','WHERE',$UserID)."
  ORDER BY a.list_id";

$DBQueries['list_hour_breakdown'] = "Select EventTimeHour AS Hour,CONCAT(list_name,' (',list_id,')') as List,Calls,Connects,ROUND(Connects/Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,Sales,Completed,ROUND(Sales/DMCs*100,2) as ConversionRate,Drops,ROUND(Drops/Connects*100,2) as DropRate,A
from
(select VU.list_id,VU.list_name,HOUR(VL.event_time) as EventTimeHour,
 sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
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
 WHERE VL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND VL.user != 'VDAD' ". get_validation_cron($database,'list','VU','AND',$UserID)."
 group by VLL.list_id,HOUR(VL.event_time)) a ORDER BY EventTimeHour";

$DBQueries['list_penetration_report'] = "SELECT 
CONCAT(VLS.list_name,' (',VLS.list_id,')') as List,
CONCAT(VC.campaign_name,' (',VC.campaign_id,')') as Campaign,
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
VLS.list_id = b.list_id
". get_validation_cron($database,'list','VLS','AND',$UserID)."
GROUP BY VLS.list_id";

$DBQueries['list_content_report'] = "select
CONCAT(VL.list_name,' (',VL.list_id,')') as List,
CONCAT(VCS.status_name,' (',VCS.status,')') as Status,  
a.status_count as NumberOfLeads,
round((a.status_count*100)/b.total,2) as Percentage,
VCS.human_answered
from  
(select status,list_id,count(*) as status_count from vicidial_list group by status,list_id) a 
join  (select list_id,count(*) as total from vicidial_list group by list_id)  b on a.list_id = b.list_id
JOIN vicidial_campaign_statuses VCS ON a.status = VCS.status
JOIN vicidial_lists VL ON a.list_id = VL.list_id ". get_validation_cron($database,'list','VL','WHERE',$UserID)."";


$DBQueries['Status'] = "SELECT status,count(*) as total,status_name FROM vicidial_campaign_statuses group by status";

$DBQueries['Pause'] = "SELECT pause_code,pause_code_name,count(*) as total FROM vicidial_pause_codes group by pause_code";

$DBQueries['Hour'] = "SELECT HOUR(VAL.event_time) as HourTime
FROM 
vicidial_agent_log VAL 
WHERE 
VAL.event_time BETWEEN 'StartDate 00:00:00' AND 'EndDate 23:59:59' AND HOUR(VAL.event_time) > 0 group by HOUR(VAL.event_time)";

