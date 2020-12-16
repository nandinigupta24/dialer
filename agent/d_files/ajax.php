<?php
require '../../db/DBClass.php';
require '../../db/database.php';

if (!empty($_POST['rule']) && $_POST['rule']) {
    if ($_POST['rule'] == 'CallHistory') {
        $CampaignID = $_POST['CampaignID'];
        $InboundGroups = $_POST['InboundGroups'];
        $UserID = $_POST['UserID'];
        $CampaignDetail = DB::query('SELECT dial_method FROM vicidial_campaigns where campaign_id='.$CampaignID);
        $CampaignGroup = $CampaignDetail[0]['dial_method'];
            $groups = explode(' ',$InboundGroups);
            $CampaignIDs = array_filter($groups);
            $CampaignIDs[] = $CampaignID;
           
        
        $data1 = DB::query('SELECT * FROM vicidial_log VCL where VCL.call_date >= "'.date('Y-m-d').' 00:00:00" AND VCL.call_date <= "'.date('Y-m-d').' 23:59:59" AND VCL.user = "'.$UserID.'" AND VCL.campaign_id IN ("'.implode('","',$CampaignIDs).'")');
        $data2 = DB::query('SELECT * FROM vicidial_closer_log VCL where VCL.call_date >= "'.date('Y-m-d').' 00:00:00" AND VCL.call_date <= "'.date('Y-m-d').' 23:59:59" AND VCL.user = "'.$UserID.'" AND VCL.campaign_id IN ("'.implode('","',$CampaignIDs).'")');
        $data = array_merge($data1,$data2);
//        $resultResponse = array(
//                    "draw"            => intval(1),  
//                    "recordsTotal"    => intval($data),  
//                    "recordsFiltered" => intval($data), 
//                    "data"            => $data   
//                    );
        require 'elements/call_history.php';
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
        
        $data1 = DB::query('SELECT * FROM vicidial_closer_log where call_date >= "'.$Start.' 00:00:00" AND call_date <= "'.$End.' 23:59:59" AND user = "'.$UserID.'" AND campaign_id IN ("'.implode('","',$CampaignIDs).'")');
        $data2 = DB::query('SELECT * FROM vicidial_log where call_date >= "'.$Start.' 00:00:00" AND call_date <= "'.$End.' 23:59:59" AND user = "'.$UserID.'" AND campaign_id IN ("'.implode('","',$CampaignIDs).'")');
        $data = array_merge($data1,$data2);
        require 'elements/call_history.php';
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
        
       
        switch($caseValue){
            case 'Call':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL")->fetchAll();
                
                require 'elements/call_detail.php';
                break;
            case 'Connect':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where human_answered = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'elements/call_detail.php';
                break;
            case 'DMC':
                $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where customer_contact = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'elements/call_detail.php';
                break;
            case 'Sale':
               $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status IN (select status from vicidial_campaign_statuses where Sale = 'Y' AND campaign_id = ".$LoginCampaign.")")->fetchAll();
                require 'elements/call_detail.php'; 
                break;
            case 'Talk':
                 $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.status is NOT NULL")->fetchAll();
                require 'elements/call_detail.php'; 
                break;
            case 'Wait':
               $data = $database->query("SELECT AL.event_time,AL.wait_sec
FROM asterisk.vicidial_agent_log AL
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.wait_sec > 0")->fetchAll();
                require 'elements/wait_detail.php'; 
                break;
            case 'Dispo':
               $data = $database->query("SELECT AL.event_time,AL.lead_id,L.first_name,L.last_name,AL.status,AL.dispo_sec as talk_sec
FROM asterisk.vicidial_agent_log AL
join asterisk.vicidial_list L
on AL.lead_id = L.lead_id
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.dispo_sec > 0")->fetchAll();
                require 'elements/call_detail.php'; 
                break;
            case 'Pause':
                 $data = $database->query("SELECT AL.event_time,AL.lead_id,AL.status,AL.pause_sec as talk_sec,AL.sub_status as SubStatus
FROM asterisk.vicidial_agent_log AL
where AL.campaign_id = '".$LoginCampaign."'
and AL.user = '".$LoginUser."' AND AL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND AL.pause_sec > 0")->fetchAll();
                require 'elements/pause_detail.php';
                break;
            
        }
        
        exit;
    }
     echo json_encode($resultResponse);
}
