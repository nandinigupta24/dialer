<?php
require '../db/database.php';

function pr($array){
    echo '<pre>';
    print_r($array);
}

/*Table Name*/
$TableVicidialHopper = 'vicidial_hopper';

function get_query($QueryArray) {
    $x = 1;
    $Query = '';
    $QueryJson = [];
    foreach ($QueryArray as $each) {
        $array = array();
        if ($x == 1) {
            $Query .= " WHERE";
            $array['initial'] = "";
        } else {
            $Query .= " " . $each['initial'] . " ";
            $array['initial'] = "and";
        }

        $Query .= " vicidial_list.`" . $each['column_name'] . "` ";
        $Query .= " " . $each['operator'] . " ";

        $array['column'] = $each['column_name'];
        $array['operator'] = $each['operator'];
        $array['value1'] = $each['value1'];
        $array['desc'] = $each['desc'];
        if ($each['operator'] == 'NOT IN' || $each['operator'] == 'IN') {

            $_val1 = "'" . str_replace(",", "','", $each['value1']) . "'";
            $Query .= " (" . $_val1 . ") ";
        } else {
            $Query .= "'" . $each['value1'] . "'";
        }

        if ($each['operator'] == 'BETWEEN' || $each['operator'] == 'NOT BETWEEN') {
            $Query .= " " . $each['opt_btw'] . " ";
            $Query .= "'" . $each['value2'] . "'";
            $array['optbtw'] = $each['operator'];
            $array['value2'] = $each['value2'];
            $array['desc'] = $each['desc'];
        }
        $QueryJson[] = $array;
        $x++;
    }
    $Result = [];
    $Result['QueryJson'] = json_encode($QueryJson);
    $Result['Query'] = $Query;
    
    return $Result;
}

$FieldArray = ['campaign_id','campaign_name','list_order_mix','hopper_level'];
$Condition = ['list_order_mix'=>'SQL','active'=>'Y'];
$campaigns = $database->select('vicidial_campaigns',$FieldArray,['AND'=>$Condition]);

foreach($campaigns as $campaignDetail){
    $HopperLevel = $campaignDetail['hopper_level'];
    $Campaign = $campaignDetail['campaign_id'];
    $NewHopperLevel = $campaignDetail['hopper_level'];
    $listData = $DBSQLDialing->select('lists','*',['AND'=>['active'=>'Y','campaign'=>$Campaign],'ORDER'=>['queue_priority'=>'DESC']]); 
   
    foreach($listData as $list){
        $QueuePriority = $list['queue_priority'];
        $Percentage = $list['percentage'];
        $JSON = $list['list_json'];
        $SQL = $list['sql'];
        $ListID = $list['list_id'];
        
        if($HopperLevel <= 0){
            break;
        }
        
        $LogCount = $DBSQLDialing->get('counts','*',['list_id'=>$ListID,'ORDER'=>['id'=>'DESC']]);
        
        if(!empty($LogCount) && count($LogCount) > 0){
            if($LogCount['dcount'] > $LogCount['tcount']){
                $DBSQLDialing->update('lists',['active'=>'N'],['list_id'=>$ListID]); 
                $DBSQLDialing->delete('counts',['list_id'=>$ListID]);
                continue;
            }
            
            /*After Existing counts*/
            $LeadIdExist = $database->select($TableVicidialHopper,['lead_id'],['campaign_id'=>$Campaign]);
            
            if(!empty($LeadIdExist) && count($LeadIdExist) > 0){
                
                if(count($LeadIdExist) >= 30){
                    break;
                }
                $LeadIDExist = implode(',',array_column($LeadIdExist,'lead_id'));
                $NotInQuery = ' AND lead_id NOT IN ('.$LeadIDExist.') ';
            }
            
            $Offset = $LogCount['dcount'];
            $Limit  = $LogCount['leads_in_hopper'];

            if($Limit>$HopperLevel){
                $Limit = $HopperLevel;
            }elseif($Limit == $HopperLevel){
                $Limit = $HopperLevel;
            }else{
                $HopperLevel = ($HopperLevel - $Limit);
            }
            
//            $query = $SQL." AND called_since_last_reset='N' ".$NotInQuery." LIMIT ".$Offset.",".$Limit;
            $query = $SQL." AND called_since_last_reset='N' ".$NotInQuery." LIMIT ".$Limit;
//          echo $query;
            $rowData = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
            
            $DataCount = count($rowData);
           
            $dupeCount = $Limit - $DataCount;
            
            
            foreach($rowData as $row){
                $lead_id = $row['lead_id']; 

                $DBSQLDialing->insert('sql_inserts_log',['sql_id'=>$ListID,'lead_id'=>$lead_id]);

                $array = [];
                $array['lead_id'] = $lead_id;
                $array['campaign_id'] = $Campaign;
                $array['status'] = 'READY';
                $array['user'] = '';
                $array['list_id'] = $row['list_id'];
                $array['gmt_offset_now'] = '-5.00';
                $array['state'] = '';
                $array['alt_dial'] = 'NONE';
                $array['priority'] = $QueuePriority;
                $array['source'] = $row['source_id'];
                $array['vendor_lead_code'] = $row['vendor_lead_code'];
                $database->insert($TableVicidialHopper,$array);

            }
            if(($Offset+$Limit) > $LogCount['tcount']){
                $CountUpdate = $LogCount['tcount'];
            }else{
                $CountUpdate = ($Offset+$Limit);
            }
             $countIns = $DBSQLDialing->update('counts',['dcount'=>($Offset+$Limit),'non_d_count'=>($LogCount['non_d_count'] + $dupeCount)],['list_id'=>$ListID]);
            /*END Existing Counts*/
        }else{
            
            $CountSQL = str_replace('*','count(*) as total',$SQL);
        
            $CountResult = $database->query($CountSQL)->fetchAll();
            $rows_in_table = (!empty($CountResult[0]['total'])) ? $CountResult[0]['total'] : 0;
            
//            $count = intval(round(($rows_in_table * $Percentage)/100));
            $count = intval(round(($NewHopperLevel * $Percentage)/100));
            
            if($count>$HopperLevel){
                $count = $HopperLevel;
            }elseif($count == $HopperLevel){
                $count = $HopperLevel;
            }else{
                $HopperLevel = ($HopperLevel - $count);
            }
            
            
             $ListQuery_ = $SQL." AND called_since_last_reset='N' LIMIT ".$count;
             
             $rowData = $database->query($ListQuery_)->fetchAll();
            
             $DCount = count($rowData);
             
             if($DCount <= $count){
                 $count = $DCount;
             }
             
             foreach($rowData as $row){
            
                $lead_id = $row['lead_id'];

                $DBSQLDialing->insert('sql_inserts_log',['sql_id'=>$ListID,'lead_id'=>$lead_id]);

                $array = [];
                $array['lead_id'] = $lead_id;
                $array['campaign_id'] = $Campaign;
                $array['status'] = 'READY';
                $array['user'] = '';
                $array['list_id'] = $row['list_id'];
                $array['gmt_offset_now'] = '-5.00';
                $array['state'] = '';
                $array['alt_dial'] = 'NONE';
                $array['priority'] = $QueuePriority;
                $array['source'] = $row['source_id'];
                $array['vendor_lead_code'] = $row['vendor_lead_code'];
                $database->insert($TableVicidialHopper,$array);
            
        }       
         $countIns = $DBSQLDialing->insert('counts',['list_id'=>$ListID,'tcount'=>$rows_in_table,'dcount'=>$DCount,'leads_in_hopper'=>$count,'created_date'=>date('Y-m-d H:i:s')]);
         
        }
        
    }
    
}



//pr($campaigns);
exit;
     