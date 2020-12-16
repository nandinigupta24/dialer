<?php
require 'database.php';

require '../admin/functions.php';
function pr($array){
    echo '<pre>';
    print_r($array);
}
//$UpdateQuery = "UPDATE `vicidial_list`  set called_since_last_reset = 'Y3' where lead_id = 2390311";
//$database->query($UpdateQuery)->fetchAll();
//echo $UpdateQuery
//$result = login_user_setup($database,'AnkitK');
//$result = $database->select('vicidial_users',['user','pass','full_name','user_level','user_group']);
//$result = $database->select('vicidial_list','*',['lead_id'=>2390311]);
//$result = $database->select('vicidial_lists','*');
//$result = $database->select('custom_fields','*');
//$result = $database->select('custom_fields_data','*',['lead_id'=>2390311]);
//$result = $database->select('vicidial_xfer_presets','*');
$result = $DBSQLDialing->select('counts','*');
//$result = $DBSQLDialing->query('SHOW TABLES')->fetchAll();
//echo $result[0]['sql'];
//$data = $database->query($result[0]['sql'])->fetchAll();
//$data = $database->query("SELECT  * FROM `vicidial_list`  WHERE vicidial_list.`list_id`  = '6030' and  vicidial_list.`status`  IN  ('AA','CHU') AND called_since_last_reset = 'N'")->fetchAll();
//pr(count($data));
//exit;
//$result = $database->select('vicidial_users','*',['user'=>'AnkushP']);
//$result = $database->update('vicidial_users',['user_level'=>8],['user'=>'AnkushP']);
//$result = $DBUTG->query('SHOW TABLES')->fetchAll();
//$result = $DBUTG->select('role_permissions','*');
//$result = $database->get('vicidial_log','*',['user'=>'AnkitK']);
//$result = $database->select('system_settings','*');
//$result = $database->select('vicidial_list','*',['phone_number'=>'01282526693']);
//$result = $database->select('vicidial_campaign_statuses','*',['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>4005,'Status_Type'=>'Positive'],'AND #the second condition'=>['campaign_id'=>NULL,'human_answered'=>'Y','Status_Type'=>'Positive']]]);
//echo $database->last();
//exit;
//pr($result);

//agent_pause_codes_active

//$Performance = $database->query("Select Calls,Connects,DMCs,Sales,Talk,Pause,Wait,Dispo,TotalDMCTalkSecs
//from
//(select val.`user`, val.campaign_id, val.user_group,
//sum(case when val.status is not null then 1 else 0 end) as Calls,
//sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
//sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
//sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
//sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
//sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
//Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
//Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
//Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs
//from vicidial_agent_log val
//where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = 'AnkitK' AND val.campaign_id = 4005
//) a
//ORDER BY campaign_id")->fetchAll();
//
////
//pr($Performance);

//$data = $database->select('vicidial_agent_log','*',['AND'=>['user'=>'AnkitK','campaign_id'=>4005]]);
//$data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status
//FROM asterisk.vicidial_agent_log AL
//join asterisk.vicidial_list L
//on AL.lead_id = L.lead_id
//where AL.campaign_id = '4005'
//and AL.user = 'AnkitK' AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'")->fetchAll();
//echo $database->last();

pr($result);