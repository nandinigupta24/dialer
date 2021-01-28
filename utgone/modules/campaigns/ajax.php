<?php
$case = ['RecycleRule','CampaignCID','active_update','dial_method_update','sql_query','lead_query','sql_dialing_update','SQLDialingActive','SpeedChange','field_update','AudioUpload','TransferPresets','CampaignStatus','CampaignPauseCode','CampaignQueue','hopper-getRuleDetails','hopper-getRuleQuery', 'list_update_status','AllAudioFile','deleteCampaign','Agent_LogOut','SurveyUpdate','CampaignACCID'];
if(!empty($_GET['case']) && isset($_GET['case']) && in_array($_GET['case'],$case)){
    if($_GET['case'] == 'RecycleRule'){
        if($_GET['rule'] == 'add'){
            $campaign = $_POST['campaign'];
            $status = $_POST['status'];
            $AttemptDelay = $_POST['attempt_delay'];
            $AttemptMaximum = $_POST['attempt_maximum'];
            $Active = $_POST['active'];
            $data = $database->insert('vicidial_lead_recycle',['campaign_id'=>$campaign,'status'=>$status,'attempt_delay'=>$AttemptDelay,'attempt_maximum'=>$AttemptMaximum,'active'=>$Active]);
            if($database->id()){
                $RecycleID = $database->id();

                $StatusList = $database->select('vicidial_campaign_statuses', ['status', 'status_name'], ['campaign_id' => $campaign]);
                $OptionList = '';
                foreach ($StatusList as $cst) {
                    $selected = ($status == $cst['status']) ? "selected" : "";
                                                $OptionList .= '<option value="'.$cst['status'].'" '.$selected.'>'.$cst['status_name'].'</option>';
                                            }
                                     $statusOK = ($Active == 'Y') ? "active" : "";
                $ResponseHTML = '<tr>
                    <th>
                        <select class="form-control campaign-Rcrule-field" data-name="status" data-id="'.$RecycleID.'">
                            <option value="">Select Option</option>
                            '.$OptionList.'
                        </select>
                    </th>
                    <th>
                        <input type="text" data-name="attempt_delay" class="form-control campaign-Rcrule-field" value="'.$AttemptDelay.'" data-id="'.$RecycleID.'" >
                    </th>

                    <th>
                        <div class="slidecontainer">
                            <input type="range" min="1" max="10" step="1"  value="'.$AttemptMaximum.'" class="range-slider campaign-Rcrule-field rangeSlide RcR-rangeSlider" data-id="'.$RecycleID.'" data-name="attempt_maximum" >
                        </div>
                        <span  id="sapn-attempt_maximum<?php echo $RecycleID; ?>">'.$AttemptMaximum.'</span>
                    </th>
                    <th>
                        <button type="button" class="btn btn-sm btn-toggle btn-switch-RcR '.$statusOK.'" data-val="'.$Active.'" data-id="'.$RecycleID.'" data-name="active"  data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                    </th>
                    <th>
                        <div class="btn-group" role="group" ><button type="button" class="btn btn-sm btn-danger delete-campaign-RCR" data-id="'.$RecycleID.'"><i class="fa fa-times"></i></button></div>
                    </th>
                </tr>';

                $result = results('success','Rule has been successfully created.',$ResponseHTML);
            }else{
               $result = results('error','Something gonna wrong!!.',NULL);
            }
        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$RecycleID, 'RECYCLERULE - ROLE',$database->last(),'Role RECYCLERULE','--All--');

        }elseif($_GET['rule'] == 'update'){
            $FieldName = $_POST['FieldName'];
            $FieldID = $_POST['FieldID'];
            $FieldValue = $_POST['FieldValue'];
            if($FieldName == 'attempt_delay'){
                if($FieldValue >= 120 && $FieldValue <= 43200){
                     $database->update('vicidial_lead_recycle',[$FieldName=>$FieldValue],['recycle_id'=>$FieldID]);
                     $result = results('success','Rule has been successfully updated.',NULL);
                }else{
                 $result = results('error','Attempt Delay should between 120 to 43200',NULL);
                }
            }else{
                $database->update('vicidial_lead_recycle',[$FieldName=>$FieldValue],['recycle_id'=>$FieldID]);
                $result = results('success','Rule has been successfully updated.',NULL);
            }
             admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$FieldID, 'UPDATE - Lead Recycle',$database->last(),'Lead Recycle UPDATE','--All--');
        }elseif($_GET['rule'] == 'remove'){
            $ID = $_POST['id'];
            $Campaign = $_POST['campaign'];
            $data = $database->delete('vicidial_lead_recycle',['recycle_id'=>$ID]);

            if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully deleted!!',NULL);
            }else{
               $result = results('error','Something gonna wrong!!',NULL);
            }
            admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'REMOVE',$ID, 'REMOVE - Recycle Rule',$database->last(),'Recycle Rule UPDATE','--All--');
        }


    }elseif($_GET['case'] == 'CampaignCID'){
        $CID = $_POST['cid'];
        $NewVal = $_POST['NewVal'];
        $database->update('vicidial_campaigns',['campaign_cid'=>$NewVal],['campaign_id'=>$CID]);
        $result = results('success','Campaign CID has been successfully changed.',NULL);

      admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'UPDATE',$CID, 'CAMPAIGNCID',$database->last(),'CAMPAIGNCID','--All--');

    }elseif($_GET['case'] == 'active_update'){
       if(checkRole('campaigns', 'edit')) {
       $data = $database->get('vicidial_campaigns','*',['campaign_id'=>$_GET['campaign_id']]);
        if(!empty($data['campaign_id'])){
            $UpdateRecords = $database->update('vicidial_campaigns',['active'=>$_GET['active']],['campaign_id'=>$_GET['campaign_id']]);
            $result = results('success','Campaign status has been successfully changed.',NULL);

        }else{
            $result = results('error','Campaign ID does not exist!!',NULL);
        }
admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$_GET['campaign_id'], 'active - MODIFY - CAMPAIGN',$database->last(),'','--All--');
    }else {
        $result = results('error','No Permission!!',NULL);
    }

    }elseif($_GET['case'] == 'SQLDialingActive'){
    if(checkRole('campaigns', 'edit')) {
       if($_GET['active'] == 'Y'){
            $UpdateRecords = $database->update('vicidial_campaigns',['list_order_mix'=>'SQL'],['campaign_id'=>$_GET['campaign_id']]);
        }else{
            $UpdateRecords = $database->update('vicidial_campaigns',['list_order_mix'=>'DISABLED'],['campaign_id'=>$_GET['campaign_id']]);
        }
        $result = results('success','Campaign SQL Dialing status has been successfully changed.',NULL);
    }else {
        $result = results('error','No Permission!!',NULL);
    }
  admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'SQLDIALINGACTIVE',$_GET['campaign_id'], 'SQLDIALINGACTIVE - ROLE',$database->last(),'SQLDIALINGACTIVE','--All--');

   }elseif($_GET['case'] == 'dial_method_update'){
       if(checkRole('campaigns', 'edit')) {
       $data = $database->get('vicidial_campaigns','*',['campaign_id'=>$_GET['campaign_id']]);
        if(!empty($data['campaign_id'])){
            $UpdateRecords = $database->update('vicidial_campaigns',['dial_method'=>$_GET['dial_method']],['campaign_id'=>$_GET['campaign_id']]);
            $result = results('success','Campaign Dial Method has been updated.',NULL);
        }else{
            $result = results('error','Campaign ID does not exist!!',NULL);
        }
    }else {
        $result = results('error','No Permission!!',NULL);
    }

    admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DIAL-METHOD-UPDATE',$_GET['campaign_id'], 'DIALMETHODUPDATE - CAMPAIGN',$database->last(),'Dial Method Update','--All--');

   }elseif($_GET['case'] == 'SpeedChange'){
       if(checkRole('campaigns', 'edit')) {
        $UpdateRecords = $database->update('vicidial_campaigns',['auto_dial_level'=>$_GET['val']],['campaign_id'=>$_GET['campaign_id']]);
        $result = results('success','Campaign Speed has been updated.',NULL);
        }else {
            $result = results('error','No Permission!!',NULL);
        }

        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'SPEED-CHANGE',$_GET['campaign_id'], 'SPEED-CHANGE - CAMPAIGN',$database->last(),'CAMPAIGN SPEED-CHANGE','--All--');

   }elseif($_GET['case'] == 'sql_query'){
       if(!checkRole('campaigns', 'view')) { die(json_encode( results('error','No Permission!!',NULL) )); }
       $Campaign = $_GET['campaign_id'];
       $data = $DBSQLDialing->select('lists','*',['campaign'=>$_GET['campaign_id']]);

       if(!empty($data) && count($data) > 0){
            foreach($data as $key=>$value){
                $strReplace = str_replace('*','count(*) as total',$value['sql']);

                $SQLCount = $database->query($strReplace)->fetchAll(PDO::FETCH_ASSOC);

                $data[$key]['SQLTotal'] = $SQLCount[0]['total'];
//                $SQLCount = $database->query($value['sql'])->fetchAll(PDO::FETCH_ASSOC);
//                $data[$key]['SQLTotal'] = count($SQLCount);
                $explodeSQl = explode('WHERE',$value['sql']);

//                $SQL = "Select Calls, Agent_Calls, Connects, ROUND(Connects/Agent_Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,`Sales`,Completed,
//ROUND(`Sales`/DMCs*100,2) as ConversionRate,A,ROUND(Completed/DMCs*100,2) as grossDmcConv,`Drop`,ROUND(Sales/Completed*100,2) as posRate
//from
//(select ol.list_id,
//date(ol.call_date) as Date, ol.`campaign_id`,
//sum(case when ol.status is not null then 1 else 0 end) as Calls,
//sum(case when ol.status is not null and ol.user != 'VDAD' then 1 else 0 end) as Agent_Calls,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') or ol.status in (select status from vicidial_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') or ol.status in (select status from vicidial_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where Sale = 'Y') or ol.status in (select status from vicidial_statuses where Sale = 'Y') then 1 else 0 end) as `Sales`,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where completed = 'Y') or ol.status in (select status from vicidial_statuses where completed = 'Y') then 1 else 0 end) as Completed,
//sum(case when ol.status = 'A' then 1 else 0 end) as A,
//sum(case when ol.status in ('DROP') then 1 else 0 end) as `Drop`,
//l.source_id AS DataSource
//from vicidial_log ol
//JOIN vicidial_list l
//ON l.lead_id=ol.lead_id where ".str_replace('vicidial_list','l',$explodeSQl[1]).'
//) a';

                $LogCountData = $DBSQLDialing->get('counts','*',['list_id'=>$value['list_id']]);

//                $LogData = $DBSQLDialing->select('sql_inserts_log','lead_id',['sql_id'=>$value['list_id']]);
                $LeadQuery = "SELECT `lead_id` FROM sql_dialing.sql_inserts_log WHERE `sql_id` = '".$value['list_id']."'";
//                echo $DBSQLDialing->last();
//                exit;
//                $LeadIDArray = [];
//                foreach($LogData as $val){
//                    $LeadIDArray[] = $val['lead_id'];
//                }
//               $LeadIDArray[] = '1897626';


                $SQL = "Select Calls, Agent_Calls, Connects, ROUND(Connects/Agent_Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,`Sales`,Completed,
ROUND(`Sales`/DMCs*100,2) as ConversionRate,A,ROUND(Completed/DMCs*100,2) as grossDmcConv,`Drop`,ROUND(Sales/Completed*100,2) as posRate
from
(select ol.list_id,
date(ol.call_date) as Date, ol.`campaign_id`,
sum(case when ol.status is not null then 1 else 0 end) as Calls,
sum(case when ol.status is not null and ol.user != 'VDAD' then 1 else 0 end) as Agent_Calls,
sum(case when ol.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') or ol.status in (select status from vicidial_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when ol.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') or ol.status in (select status from vicidial_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when ol.status in (select status from vicidial_campaign_statuses where Sale = 'Y') or ol.status in (select status from vicidial_statuses where Sale = 'Y') then 1 else 0 end) as `Sales`,
sum(case when ol.status in (select status from vicidial_campaign_statuses where completed = 'Y') or ol.status in (select status from vicidial_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when ol.status = 'A' then 1 else 0 end) as A,
sum(case when ol.status in ('DROP') then 1 else 0 end) as `Drop`,
l.source_id AS DataSource
from vicidial_log ol
JOIN vicidial_list l
ON l.lead_id=ol.lead_id where ol.campaign_id = '".$Campaign."' AND l.lead_id IN (".$LeadQuery.") ) a";

//                $SQL = "Select Calls, Agent_Calls, Connects, ROUND(Connects/Agent_Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,`Sales`,Completed,
//ROUND(`Sales`/DMCs*100,2) as ConversionRate,A,ROUND(Completed/DMCs*100,2) as grossDmcConv,`Drop`,ROUND(Sales/Completed*100,2) as posRate
//from
//(select ol.list_id,
//date(ol.call_date) as Date, ol.`campaign_id`,
//sum(case when ol.status is not null then 1 else 0 end) as Calls,
//sum(case when ol.status is not null and ol.user != 'VDAD' then 1 else 0 end) as Agent_Calls,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') or ol.status in (select status from vicidial_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') or ol.status in (select status from vicidial_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where Sale = 'Y') or ol.status in (select status from vicidial_statuses where Sale = 'Y') then 1 else 0 end) as `Sales`,
//sum(case when ol.status in (select status from vicidial_campaign_statuses where completed = 'Y') or ol.status in (select status from vicidial_statuses where completed = 'Y') then 1 else 0 end) as Completed,
//sum(case when ol.status = 'A' then 1 else 0 end) as A,
//sum(case when ol.status in ('DROP') then 1 else 0 end) as `Drop`,
//l.source_id AS DataSource
//from vicidial_log ol
//JOIN vicidial_list l
//ON l.lead_id=ol.lead_id where ol.campaign_id = ".$Campaign." AND l.lead_id IN ('".implode("','",$LeadIDArray)."') ) a";

                $SQLCount = $database->query($SQL)->fetchAll();

                $data[$key]['Calls'] = (!empty(@$SQLCount[0]['Calls'])) ? @$SQLCount[0]['Calls'] : 0;
                $data[$key]['Agent_Calls'] = (!empty(@$SQLCount[0]['Agent_Calls'])) ? @$SQLCount[0]['Agent_Calls'] : 0;
                $data[$key]['Connects'] = (!empty(@$SQLCount[0]['Connects'])) ? @$SQLCount[0]['Connects'] : 0;
                $data[$key]['DMCs'] = (!empty(@$SQLCount[0]['DMCs'])) ? @$SQLCount[0]['DMCs'] : 0;
                $data[$key]['Sales'] = (!empty(@$SQLCount[0]['Sales'])) ? @$SQLCount[0]['Sales'] : 0;
                $data[$key]['Completed'] = (!empty(@$SQLCount[0]['Completed'])) ? @$SQLCount[0]['Completed'] : 0;
                $data[$key]['Drop'] = (!empty(@$SQLCount[0]['Drop'])) ? @$SQLCount[0]['Drop'] : 0;
                $data[$key]['A'] = (!empty(@$SQLCount[0]['A'])) ? @$SQLCount[0]['A'] : 0;
                $data[$key]['Availabel'] = ($LogCountData['tcount'] - $LogCountData['dcount']);
//                $data[$key]['Queued'] = (!empty($LogCountData['dcount'])) ? $LogCountData['dcount'] : 0;
                $data[$key]['Queued'] = $database->count('vicidial_hopper',['AND'=>['campaign_id'=>$Campaign,'lead_id'=>$LeadIDArray]]);
                $data[$key]['Conversaion'] = (!empty(@$SQLCount[0]['ConversionRate'])) ? @$SQLCount[0]['ConversionRate'] : 0;
                if($value['active']=='N'){$chk= "";}else{$chk="active";}
                $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle '.$chk.' sql_dialing_status" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$value['list_id'].'" value="1">
						<div class="handle"></div>
                                  </button>';
            }

            $result = results('success','Data Found!!',$data);
        }else{
            $result = results('error','No Data Available!!',[]);
        }

         admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'GET','', 'SQL-QUERY - ROLE',$DBSQLDialing->last(),'SQL-QUERY','--All--');
   }elseif($_GET['case'] == 'lead_query'){

     if(!checkRole('campaigns', 'view')) { die(json_encode( results('error','No Permission!!',NULL) )); }
     $Campaign = $_GET['campaign_id'];
     $DialStatuses = $database->get('vicidial_campaigns','dial_statuses',['campaign_id'=>$Campaign]);
     $DialStatuses = explode(' ',trim(rtrim($DialStatuses,'-')));
     $data  = $database->query("SELECT LS.list_id,LS.list_name, LS.list_description, (select count(1) from vicidial_list vl where vl.list_id = LS.list_id) as lead_count , LS.active, (select max(last_local_call_time) from vicidial_list vl where vl.list_id = LS.list_id) as last_call_date, (select count(1) from vicidial_list vl where vl.list_id = LS.list_id and vc.dial_statuses like concat('%',vl.status,'%')) as queued_leads FROM asterisk.vicidial_lists LS left join vicidial_campaigns vc on vc.campaign_id = LS.campaign_id where LS.campaign_id = '$Campaign' ORDER BY LS.active ASC")->fetchAll(PDO::FETCH_ASSOC);
     if(!empty($data) && count($data) > 0){
          foreach($data as $key=>$value){
     if($value['active']=='N'){$chk= "";}else{$chk="active";}
     $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle '.$chk.' lead_query_status" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$value['list_id'].'" value="1">
     <div class="handle"></div>
                       </button>';
    $ConditionArray = [];
    $ConditionArray['list_id'] = $value['list_id'];
    $ConditionArray['called_since_last_reset'] = 'N';
    if(!empty($DialStatuses) && count($DialStatuses) > 0){
        $ConditionArray['status'] = $DialStatuses;
    }

    $data[$key]['queued_leads'] = $database->count('vicidial_list',$ConditionArray);

                     }
         }

     $result = results('success','Data Found!!',$data);

     admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'GET','', 'LEAD-QUERY - ROLE',$database->last(),'LEAD-QUERY','--All--');
   }
   elseif($_GET['case'] == 'list_update_status'){

       $data  = $database->query("select list_id from vicidial_lists where list_id = ".$_GET['ListID'])->fetch(PDO::FETCH_ASSOC);

       if(isset($data['list_id']) && !empty($data['list_id'])){
           $UpdateRecords = $database->query("update vicidial_lists set active= '".$_GET['active']."' where list_id = ".$_GET['ListID']);
           $result = results('success','List status has been successfully changed.',NULL);
       }else{
           $result = results('error','List does not exist!!',NULL);
       }

        admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'UPDATE','', 'CAMPAIGN-LIST-UPDATE',$database->last(),'CAMPAIGN-LIST-UPDATE','--All--');
   }
   elseif($_GET['case'] == 'sql_dialing_update'){
       $data = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['ListID']]);
        if(!empty($data['list_id'])){
            $UpdateRecords = $DBSQLDialing->update('lists',['active'=>$_GET['active']],['list_id'=>$_GET['ListID']]);
            $result = results('success','SQL List status has been successfully changed.',NULL);
        }else{
            $result = results('error','SQL List does not exist!!',NULL);
        }

         admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'UPDATE','', 'SQL-DIALING-UPDATE',$DBSQLDialing->last(),'SQL-DIALING-UPDATE','--All--');

   }elseif($_GET['case'] == 'field_update'){

       $Type = $_POST['type'];
       $ID = $_POST['id'];
       $FieldName = $_POST['name'];
       $FieldValue = $_POST['val'];

       switch($Type){
           case 'text':
               if($FieldName == 'dial_prefix'){
                   $data = $database->update('vicidial_campaigns',[$FieldName=>$FieldValue,'manual_dial_prefix'=>$FieldValue],['campaign_id'=>$ID]);
               }elseif(in_array($FieldName,['callbacks_time_start','callbacks_time_end'])){
                   $data = $database->update('vicidial_campaigns',[$FieldName=>date('H:i:s',strtotime($FieldValue))],['campaign_id'=>$ID]);
               }elseif($FieldName == 'dial_statuses'){
                   $data = $database->update('vicidial_campaigns',[$FieldName=>" ".$FieldValue],['campaign_id'=>$ID]);
               }else{
                $data = $database->update('vicidial_campaigns',[$FieldName=>$FieldValue],['campaign_id'=>$ID]);
               }
               break;
           case 'select':
               if(in_array($FieldName,['closer_campaigns','xfer_groups','dial_statuses','auto_alt_dial_statuses'])){
                 $FieldValue = implode(' ',$FieldValue).' -';
               }
            //$data = $database->update('vicidial_campaigns',[$FieldName=>" ".$FieldValue],['campaign_id'=>$ID]);
            $data = $database->update('vicidial_campaigns',[$FieldName=>$FieldValue],['campaign_id'=>$ID]);
               break;
           case 'switch':
               if($FieldName == 'three_way_dial_prefix' && $FieldValue == 'Y'){
                  $FieldValue = $database->get('vicidial_campaigns','dial_prefix',['campaign_id'=>$ID]);
               }elseif($FieldName == 'campaign_recording'){
                  $data = $database->update('vicidial_campaigns',['campaign_rec_filename'=>'FULLDATE_CUSTPHONE_AGENT_CAMPAIGN'],['campaign_id'=>$ID]);
               }
            $data = $database->update('vicidial_campaigns',[$FieldName=>$FieldValue],['campaign_id'=>$ID]);
               break;
           default:
       }

       if(!empty($data->rowCount()) && $data->rowCount() > 0){
            $result = results('success','Campaign Setting Updated!!',NULL);
        }else{
            $result = results('error','No Updates!!',NULL);
        }

         admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$ID,$FieldName,$database->last(),$FieldName,'--All--');

   } elseif($_GET['case'] == 'AudioUpload'){

      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));

      $extensions= array("mp3","wav",'gsm');

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"/srv/www/htdocs/".$SS_SoundsWebDirectory."/".$_POST['audio_name'].".".$file_ext);

         if(!empty($_POST['music-file-selected']) && $_POST['music-file-selected'] == 'HoldMusic'){
             $CountMusicOnHold = $database->count('vicidial_music_on_hold');
             $MohID = $_POST['audio_name'].'-'.str_pad($CountMusicOnHold,5, '0', STR_PAD_LEFT);
             $database->insert('vicidial_music_on_hold',['moh_id'=>$_POST['audio_name'],'moh_name'=>$_POST['audio_name'],'active'=>'Y','user_group'=>'---ALL---']);
             $database->insert('vicidial_music_on_hold_files',['filename'=>$_POST['audio_name'],'moh_id'=>$_POST['audio_name'],'rank'=>1]);
             $result = results('success','File Upload!!','<option value="'.$_POST['audio_name'].'">'.$_POST['audio_name'].' - '.$_POST['audio_name'].'</option>');
         }else{
             $result = results('success','File Upload!!',$_POST['audio_name'].".".$file_ext);
         }

      }else{
          $result = results('error','Case not found!!',NULL);
      }

   }elseif($_GET['case'] == 'TransferPresets'){
       $table = 'vicidial_xfer_presets';
       if(!empty($_GET['rule']) && $_GET['rule'] == 'delete'){
          $campaign = $_POST['campaign'];
          $id = $_POST['id'];
          $database->delete($table,['AND'=>['campaign_id'=>$campaign,'preset_number'=>$id]]);
          $result = results('success','Successfully deleted!!',NULL);
          admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',$campaign, 'Transfer Setting - DELETE - CAMPAIGN',$database->last(),'Transfer Settings - ',$_SESSION['CurrentLogin']['user_group']);
       }else{
            $Campaign = $_POST['campaign'];
            $name = $_POST['name'];
            $number = $_POST['number'];
            $active = $_POST['active'];
            if(!empty($_GET['rule']) && $_GET['rule'] == 'edit'){
                $id = $_POST['id'];
                $database->update($table,['preset_name'=>$name,'preset_number'=>$number,'preset_hide_number'=>$active],['AND'=>['campaign_id'=>$Campaign,'preset_number'=>$id]]);
                admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$id, 'Transfer Setting - MODIFY - CAMPAIGN',$database->last(),'Transfer Settings - ',$_SESSION['CurrentLogin']['user_group']);
            }else{
                 $database->insert($table,['campaign_id'=>$Campaign,'preset_name'=>$name,'preset_number'=>$number,'preset_hide_number'=>$active]);
                 admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$database->id(), 'Transfer Setting - ADD - CAMPAIGN',$database->last(),'Transfer Settings - ',$_SESSION['CurrentLogin']['user_group']);
            }
            $result = results('success','Successfully Created!!',NULL);
       }
//        admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'TRANSFERPRESETS','$id', 'TRANSFERPRESETS - ROLE',$database->last(),'Role TRANSFERPRESETS','--All--');

   }elseif($_GET['case'] == 'CampaignStatus'){
       if($_GET['rule'] == 'ADD'){
           if(!empty($_POST['status']) && !empty($_POST['status_name']) && !empty($_POST['status_type'])){
               $Status = $_POST['status'];
                $StatusName = $_POST['status_name'];
                $StatusType = $_POST['status_type'];
                $CampaignID = $_POST['campaign_id'];
                $database->insert('vicidial_campaign_statuses',['status'=>$Status,'status_name'=>$StatusName,'Status_Type'=>$StatusType,'campaign_id'=>$CampaignID]);
                $StatusID = $database->id();
                if(!empty($StatusID)){
                    $dataResponse = $database->get('vicidial_campaign_statuses','*',['id'=>$StatusID]);

                    $result = results('success','Successfully Created!!',$dataResponse);
                }else{
                    $result = results('error','Something gonna wrong!!',NULL);
                }
           }else{
               $result = results('error','Please input corrrect data!!',NULL);
           }

        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$StatusID, 'ADD - Campaign Status',$database->last(),'Campaign Status ADD','--All--');

       }elseif($_GET['rule'] == 'DELETE'){
           $StatusID = $_POST['id'];
           $data = $database->delete('vicidial_campaign_statuses',['id'=>$StatusID]);
           if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully deleted!!',NULL);
           }else{
               $result = results('error','Something gonna wrong!!',NULL);
           }
            admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',$StatusID, 'DELETE - Campaign Status',$database->last(),'CAMPAIGN STATUS DELETE','--All--');

       }elseif($_GET['rule'] == 'UPDATE'){
           $Id = $_POST['id'];
           $value = $_POST['val'];
           $Column = $_POST['column'];
           $data = $database->update('vicidial_campaign_statuses',[$Column=>$value],['id'=>$Id]);

           if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully Updated!!',NULL);
           }else{
               $result = results('error','Something gonna wrong!!',NULL);
           }
       }else{
            $result = results('error','Something gonna wrong!!',NULL);
       }
         admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN','MODIFY',$Id,'MODIFY - Campaign Status',$database->last(),'Campaign Status '.$Column,'--All--');

   } elseif($_GET['case'] == 'CampaignACCID'){
       if($_GET['rule'] == 'ADD'){
         $areacode = $_POST['areacode'];
         $outbound_cid = $_POST['outbound_cid'];
         $description = $_POST['description'];
         $CampaignID = $_POST['campaign_id'];
         $area_id = $_POST['areaid'];
         $active = '';
         if($area_id != '') {
           $database->update('vicidial_campaign_cid_areacodes',['areacode'=>$areacode,'outbound_cid'=>$outbound_cid,'cid_description'=>$description],['id'=>$area_id]);
           $dataResponse = $database->get('vicidial_campaign_cid_areacodes','*',['id'=>$area_id]);
           admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$CampaignID, 'UPDATE - Campaign Areacode',$database->last(),'Campaign Areacode UPDATE','--All--');
         } else {
           $database->insert('vicidial_campaign_cid_areacodes',['campaign_id'=>$CampaignID,'areacode'=>$areacode,'outbound_cid'=>$outbound_cid,'cid_description'=>$description,'active'=>$active]);
           $areaID = $database->id();
           if(!empty($areaID)){
               $dataResponse = $database->get('vicidial_campaign_cid_areacodes','*',['id'=>$areaID]);
          }
           admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$CampaignID, 'ADD - Campaign Areacode',$database->last(),'Campaign Areacode ADD','--All--');
         }
         $result = results('success','Successfully Created!!',$dataResponse);
        } elseif($_GET['rule'] == 'Delete'){
          $id = $_GET['id'];
          $data = $database->delete('vicidial_campaign_cid_areacodes',['id'=>$id]);
          $result = results('success','Successfully Deleted!!','');
          admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',$id, 'Campaign Areacode - DELETE',$database->last(),'Campaign Areacode - Delete','--All--');
        } elseif($_GET['rule'] == 'List'){
          $id = $_GET['id'];
          $dataResponse = $database->get('vicidial_campaign_cid_areacodes','*',['id'=>$id]);
          $result = results('success','Successfully Deleted!!',$dataResponse);
        } elseif($_GET['rule'] == 'BulkAdd') {
          $file_name = $_FILES['campaign_area_bulk']['name'];
          $file_size = $_FILES['campaign_area_bulk']['size'];
          $file_tmp = $_FILES['campaign_area_bulk']['tmp_name'];
          $file_type = $_FILES['campaign_area_bulk']['type'];
          $file_ext = strtolower(end(explode('.', $_FILES['campaign_area_bulk']['name'])));

          $extensions = array('csv');

          $CampaignID = $_POST['campaign_id'];

          if (in_array($file_ext, $extensions) === false) {
            $result = results('error','extension not allowed, please choose a csv file.!!',NULL);
          } else {
            if ($file_size > 0) {
              $file_data = fopen($file_tmp, 'r');

              while (($column = fgetcsv($file_data)) !== FALSE) {
                if (isset($column[0]) && $column[0] != '') {
                    $arrayInsert['areacode'] = $column[0];
                    $arrayInsert['campaign_id'] = $CampaignID;
                    $arrayInsert['outbound_cid'] = $column[1];
                    $arrayInsert['cid_description'] = $column[2];
                    $dataSave = $database->insert('vicidial_campaign_cid_areacodes', $arrayInsert);
                }

              }

             if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                 $result = results('success','Successfully created!!',NULL);
              } else {
                  $result = results('error','Something gonna wrong!!',NULL);
              }
            }
          }
        }
       } elseif($_GET['case'] == 'CampaignPauseCode'){
       if($_GET['rule'] == 'ADD'){
           $PauseCode = $_POST['code'];
           $PauseCodeName = $_POST['name'];
           $TimeLimit = $_POST['time'];
           $CampaignID = $_POST['campaign'];
           $database->insert('vicidial_pause_codes',['pause_code'=>$PauseCode,'pause_code_name'=>$PauseCodeName,'time_limit'=>$TimeLimit,'campaign_id'=>$CampaignID]);
           $PauseCodeID = $database->id();
           if(!empty($PauseCodeID)){
               $result = results('success','Successfully created!!',NULL);
           }else{
               $result = results('error','Something gonna wrong!!',NULL);
           }
           admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$PauseCodeID,'Campaign Pause Code',$database->last(),'Campaign Pause Code','--All--');

       }elseif($_GET['rule'] == 'DELETE'){
           $ID = $_POST['id'];
           $Campaign = $_POST['campaign'];
           $data = $database->delete('vicidial_pause_codes',['id'=>$ID]);

           if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully deleted!!',NULL);
           }else{
               $result = results('error','Something gonna wrong!!',NULL);
           }
          admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',$ID, 'CAMPAIGNPAUSECODE - DELETE',$database->last(),'Campaign Pause Code - Delete','--All--');

       }elseif($_GET['rule'] == 'UPDATE'){
           $name = $_POST['name'];
           $code = $_POST['code'];
           $time = $_POST['time'];
           $campaign = $_POST['campaign'];
           $id = $_POST['id'];
           $data = $database->update('vicidial_pause_codes',['pause_code'=>$code,'pause_code_name'=>$name,'time_limit'=>$time],['id'=>$id]);

           if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully Updated!!',NULL);
           }else{
               $result = results('error','No more updated!!',NULL);
           }
       }else{
            $result = results('error','Something gonna wrong!!',NULL);
       }
        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$id,'Pause Code',$database->last(),'Pause Code UPDATE','--All--');

   }elseif($_GET['case'] == 'CampaignQueue'){
       if(!checkRole('campaigns', 'delete')) { die(json_encode(results('error','Something gonna wrong!!',NULL)));  }
       if($_GET['rule'] == 'DELETE'){
           $Campaign = $_POST['campaign'];
           $data = $database->delete('vicidial_hopper',['campaign_id'=>$Campaign]);
           if(!empty($data->rowCount()) && $data->rowCount() > 0){
               $result = results('success','Successfully deleted!!',NULL);
           }else{
               $result = results('error','Something gonna wrong!!',NULL);
           }
       }else{
            $result = results('error','Something gonna wrong!!',NULL);
       }
       admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',@$Campaign,'Vicidial Hopper Entry',$database->last(),'Vicidial Hopper Entry','--All--');
   }elseif($_GET['case'] == 'hopper-getRuleDetails'){
        $row = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['listId']]);
            if (!empty($row)) {
                $array = ['list_id' => $row['list_id'],
                    'list_name' => $row['list_name'],
                    'status' => $row['active'],
                    'query' => $row['sql'],
                    'datapool' => $row['list_json'],
                    'campaign_id' => $row['campaign'],
                    'percentage' => $row['percentage'],
                    'drop_in' => $row['drop_in'],
                    'drop_out' => $row['drop_out'],
                    'expiry_date' => $row['expiry_date'],
                    'queue_priority' => $row['queue_priority'],
                    'sql_condition' => $row['sql_condition']
                ];
//                echo json_encode(array("status" => 'success', 'data' => $array));
                $result = response(1, 0, 'Successfully Submitted!!', $array);
            } else {
                $result = response(0, 1, 'Rule does not exist!!', NULL);
            }

   }elseif($_GET['case'] == 'hopper-getRuleQuery'){
       // Create connection
$ListArray = [
["value"=>"lead_id","text"=>"lead id"],
["value"=>"entry_date","text"=>"entry date"],
["value"=>"modify_date","text"=>"modify date"],
["value"=>"status","text"=>"status"],
["value"=>"user","text"=>"user"],
["value"=>"vendor_lead_code","text"=>"vendor lead code"],
["value"=>"source_id","text"=>"source id"],
["value"=>"list_id","text"=>"list id"],
["value"=>"gmt_offset_now","text"=>"gmt offset now"],
["value"=>"called_since_last_reset","text"=>"called since last reset"],
["value"=>"phone_code","text"=>"phone code"],
["value"=>"phone_number","text"=>"phone number"],
["value"=>"title","text"=>"title"],
["value"=>"first_name","text"=>"first name"],
["value"=>"middle_initial","text"=>"middle initial"],
["value"=>"last_name","text"=>"last name"],
["value"=>"address1","text"=>"address1"],
["value"=>"address2","text"=>"address2"],
["value"=>"address3","text"=>"address3"],
["value"=>"city","text"=>"city"],
["value"=>"state","text"=>"state"],
["value"=>"province","text"=>"province"],
["value"=>"postal_code","text"=>"postal code"],
["value"=>"country_code","text"=>"country code"],
["value"=>"gender","text"=>"gender"],
["value"=>"date_of_birth","text"=>"date of birth"],
["value"=>"alt_phone","text"=>"alt phone"],
["value"=>"email","text"=>"email"],
["value"=>"security_phrase","text"=>"security phrase"],
["value"=>"comments","text"=>"comments"],
["value"=>"called_count","text"=>"called count"],
["value"=>"last_local_call_time","text"=>"last local call time"],
["value"=>"rank","text"=>"rank"],
["value"=>"owner","text"=>"owner"],
["value"=>"entry_list_id","text"=>"entry list id"],
["value"=>"best_time_to_call","text"=>"best time to call"],
["value"=>"sms_count","text"=>"sms count"]
    ];
$ListJSON = json_encode($ListArray);

$optArr['=']='is equal to';
$optArr['BETWEEN']='is between';
$optArr['<']='is less then';
$optArr['<=']='is less then or equal to';
$optArr['>']='is greater then';
$optArr['IN']='is in list';
$optArr['!=']='is not eual to';
$optArr['NOT BETWEEN']='is not between';
$optArr['NOT IN']='is not in list';
$optArr['NOT NULL']='is not null';

//$whrr['lead_id']='Data Pool Lead';
//$whrr['list_id']='Data Pool List';
//$whrr['status']='Data Pool Status';
//$whrr['called_count']='Data Pool Called Count';
//$whrr['gender']='Data Pool Gender';

$whrr["lead_id"] = "lead id";
$whrr["entry_date"] = "entry date";
$whrr["modify_date"] = "modify date";
$whrr["status"] = "status";
$whrr["user"] = "user";
$whrr["vendor_lead_code"] = "vendor lead code";
$whrr["source_id"] = "source id";
$whrr["list_id"] = "list id";
$whrr["gmt_offset_now"] = "gmt offset now";
$whrr["called_since_last_reset"] = "called since last reset";
$whrr["phone_code"] = "phone code";
$whrr["phone_number"] = "phone number";
$whrr["title"] = "title";
$whrr["first_name"] = "first name";
$whrr["middle_initial"] = "middle initial";
$whrr["last_name"] = "last name";
$whrr["address1"] = "address1";
$whrr["address2"] = "address2";
$whrr["address3"] = "address3";
$whrr["city"] = "city";
$whrr["state"] = "state";
$whrr["province"] = "province";
$whrr["postal_code"] = "postal code";
$whrr["country_code"] = "country code";
$whrr["gender"] = "gender";
$whrr["date_of_birth"] = "date of birth";
$whrr["alt_phone"] = "alt phone";
$whrr["email"] = "email";
$whrr["security_phrase"] = "security phrase";
$whrr["comments"] = "comments";
$whrr["called_count"] = "called count";
$whrr["last_local_call_time"] = "last local call time";
$whrr["rank"] = "rank";
$whrr["owner"] = "owner";
$whrr["entry_list_id"] = "entry list id";
$whrr["best_time_to_call"] = "best time to call";
$whrr["sms_count"] = "sms count";

//$sql = "SELECT * FROM `lists` WHERE `list_id`=".$_GET['listId'];
//       $Rowresult = $DBConn->query($sql);
//       $row = $Rowresult->fetch_assoc();
       $row = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['listId']]);
       if (!empty($row)) { ?>
            <div class="row" >
               <!-- inner start-->
                <div class="col-md-12 panel-middle-datapool">
                   <?php $x=0;if($row['list_json']!=''){
                       $decodejson = json_decode($row['list_json']);

                       foreach($decodejson as $row ){
                           if(!empty($row->desc) && $row->desc == 'comment'){
                               $CommentClass = 'comment_line';
                            }else{
                               $CommentClass = '';
                            }

                           ?>

                    <ul class="list-inline list-datapool <?php echo $CommentClass;?>" id="ul-datapool<?=$x;?>" data-id="<?=$x;?>">
                            <?php if($x>0){ ?>
                               <li><span class="data-first" id="data-first-<?=$x;?>" data-key="<?=$x;?>" data-value="and" > and </span></li>
                            <?php } ?>
                            <li>
                                    <span class="editable editable-click datapool-where"
                                        data-type="select" data-value="<?=$row->column;?>"  data-title="" id="datapool-where-<?=$x;?>" data-name="datapool-where-<?=$x;?>"
                                        data-key="<?=$x;?>" data-url="" >
                                        <?=$whrr[$row->column];?></span>
                                </li>
                                <li>
                                        <span class="editable editable-click datapool-condition" data-value="<?=$row->operator;?>"
                                                    data-type="select" id="datapool-condition-<?=$x;?>" data-name="datapool-condition"
                                                    data-key="<?=$x;?>"  data-url="" data-title="">
                                                     <?=$optArr[$row->operator];?></span>
                                </li>
                                <li>

                                        <span class="editable editable-click datapool-value1"
                                                data-type="text" id="datapool-value1-<?=$x;?>" data-name="datapool-value1-<?=$x;?>"
                                                data-key="<?=$x;?>" data-url="" data-value="<?=$row->value1;?>" data-title="">
                                                <?=$row->value1;?></span>
                                </li>
                                <?php if($row->operator=='BETWEEN' || $row->operator=='NOT BETWEEN'){ ?>
                                    <li  class="li-value-2<?=$x;?>"><span class="data-second" data-key="<?=$x;?>" id="data-second-<?=$x;?>" data-value="AND" > and </span></li>
                                    <li class="li-value-2<?=$x;?>">

                                        <span class="editable editable-click datapool-value2"
                                                data-type="text" id="datapool-value2-<?=$x;?>" data-name="datapool-value2-<?=$x;?>"
                                                data-key="<?=$x;?>" data-url="" data-value="<?=$row->value2;?>" data-title="">
                                                <?=$row->value2;?></span>
                                      </li>
                                <?php }?>
                                      <li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>
                                      <li class="RemovePoolRule"><i class="fa fa-times"></i></li>
                            </ul>



                   <?php $x++;}?>
                    <script>
                    $.fn.editable.defaults.mode = 'inline';
                            $('.datapool-where').editable({
                              placeholder: 'Select DataPool1',
                              showbuttons: false,
                                   source: <?php echo $ListJSON;?>,
                                   success: function (response, newValue) {
                                    var k = $(this).editable().data('key');
                                    $(this).attr('data-value',newValue);
                                   }
                              });
                              $('.datapool-condition').editable({
                                   showbuttons: false,
                                   placeholder: 'Select Where',
                                        source: [
                                               {value:'=',text:'is equal to'},
                                               {value:'BETWEEN',text:'is between'},
                                               {value:'<',text:'is less then'},
                                               {value:'<=',text:'is less then or equal to'},
                                               {value:'>',text:'is greater then'},
                                               {value:'IN',text:'is in list'},
                                               {value:'!=',text:'is not eual to'},
                                               {value:'NOT BETWEEN',text:'is not between'},
                                               {value:'NOT IN',text:'is not in list'},
                                               {value:'NOT NULL',text:'is not null'},
                                           ],
                                          success: function (response, newValue) {
                                                var k = $(this).editable().data('key');

                                                $(this).attr('data-value',newValue);
                                                if(newValue=='BETWEEN'  || newValue=='NOT BETWEEN'){
                                                $('#ul-datapool'+k).append(
                                                   '<li  class="li-value-2'+k+'"><span class="data-second" data-key="'+k+'" id="data-second-'+k+'" data-value="AND" > and </span></li>'
                                                   +'<li class="li-value-2'+k+'">'

                                                         +'<span data-key="'+k+'" class="editable editable-click datapool-value2" '
                                                               +'data-type="text" id="datapool-value2-'+k+'" data-name="datapool-value2-'+k+'" '
                                                               +'data-key="'+k+'" data-url="" data-value="" data-title="">'
                                                               +'value</span>'
                                                   +'</li>');
                                                   $('.datapool-value2').editable({
                                                      showbuttons: false,
                                                      success: function (response, newValue) {
                                                         var k = $(this).editable().data('key');
                                                          $(this).attr('data-value',newValue);
                                                      }
                                                });
                                                }else{
                                                   $('.li-value-2'+k).remove();
                                                }
                                        }
                             });
                           $('.datapool-value1').editable({
                               showbuttons: false,
                               success: function (response, newValue) {
                                 var k = $(this).editable().data('key');
                                 $(this).attr('data-value',newValue);
                                 }
                           });
                           $('.datapool-value1').on('shown', function(e, editable) {
                                 //console.log("out-editable",editable);
                                 $(document).on('change', editable, function() {
                                    //console.log("in-editable",editable);
                                    var new_value = editable.input.$input[0].value;
                                    //console.log("element", editable.$element[0].attributes[2].value);
                                    var span = editable.$element[0].attributes[2].value;
                                    $('#'+span).text(new_value);
                                    $('#'+span).attr('data-value',new_value);
                                 });
                              });
                           $('.datapool-value2').editable({
                                       showbuttons: false,
                                       success: function (response, newValue) {
                                          var k = $(this).editable().data('key');
                                             $(this).attr('data-value',newValue);
                                       }
                                 });
                                 $('.datapool-value2').on('shown', function(e, editable) {
                                    //console.log("out-editable",editable);
                                    $(document).on('change', editable, function() {
                                       //console.log("in-editable",editable);
                                       var new_value = editable.input.$input[0].value;
                                       //console.log("element", editable.$element[0].attributes[2].value);
                                       var span = editable.$element[0].attributes[2].value;
                                       $('#'+span).text(new_value);
                                       $('#'+span).attr('data-value',new_value);
                                    });
                                 });
                    </script>
                   <?php } ?>
                </div>
              <!-- inner end-->
            </div>
            <input type="hidden" name="MiddleListId" id="MiddleListId" value="<?=$_GET['listId']?>"/>
            <ul class="list-inline" style="margin-top: 25px;">
                <li>[<a href="#" id="AddnewRule">Add new condition</a>]</li>
            </ul>
       <?php } exit;?>
            <?php
   }else{

   }
//    admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'CAMPAIGNQUEUE','$campaign', 'CAMPAIGNQUEUE - ROLE',$database->last(),'Role CAMPAIGNQUEUE','--All--');

    echo json_encode($result); die;
}


if (!empty($_GET) && isset($_GET['case']) && $_GET['case']) {
    if ($_GET['case'] == 'CreateRule') {
        $RuleName = $_POST['rule_name'];
        $Campaign = $_POST['campaign'];
        $DBSQLDialing->insert('lists', ['list_name' => $RuleName, 'campaign' => $Campaign, 'active' => 'N']);
        $lastInsertID = $DBSQLDialing->id();
        $LastInsertedData = $DBSQLDialing->get('lists','*',['list_id'=>$lastInsertID]);
        $resultResponse = response(1, 0, 'Successfully',$LastInsertedData);

        admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN','ADD',$lastInsertID, 'CREATE RULE',$DBSQLDialing->last(),'Create Rule ADD','--All--');

    } elseif ($_GET['case'] == 'EditRule') {
        $QueryArray = isset($_POST['QueryData']) ? $_POST['QueryData'] : '';
        $ListData = isset($_POST['ListData']) ? $_POST['ListData'] : '';
        $SQLCondition = isset($_POST['SQLCondition']) ? $_POST['SQLCondition'] : '';

        $result = get_query($QueryArray);
        $Query = $result['Query'];
        $QueryJson = $result['QueryJson'];

        $per = $ListData['percentage'];
        $priority = $ListData['queue_priority'];

        if(!empty($SQLCondition) && $SQLCondition){
            $ListQuery = "SELECT  * FROM `vicidial_list` WHERE " . $SQLCondition;
            $countQuery = "SELECT count(*) as total  FROM `vicidial_list` WHERE " . $SQLCondition;
        }else{
            $ListQuery = "SELECT  * FROM `vicidial_list` " . $Query;
            $countQuery = "SELECT count(*) as total  FROM `vicidial_list` " . $Query;
        }

        $CountResult = $database->query($countQuery)->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($CountResult[0]['total']) && $CountResult[0]['total'] > 0  && (isset($ListData['reset_list']) && $ListData['reset_list'] == 'Y')){
            if(!empty($SQLCondition) && $SQLCondition){
                    $UpdateQuery = "UPDATE `vicidial_list` set called_since_last_reset = 'N' WHERE " . $SQLCondition;
                    $database->query($UpdateQuery)->fetchAll();
                 }else{
                     $UpdateQuery = "UPDATE `vicidial_list` set called_since_last_reset = 'N' " . $Query;
                    if(!empty($Query) && strlen($Query) > 2){
                        $database->query($UpdateQuery)->fetchAll();
                    }
                 }
        }

        $rows_in_table = (!empty($CountResult[0]['total'])) ? $CountResult[0]['total'] : 0;

        $count = intval(round(($rows_in_table * $per)/100));

//        $count = intval(round(($count * $per)/100));

//        $CampaignHopperLevel = $database->get('vicidial_campaigns','hopper_level',['campaign_id'=>$ListData['campaign_id']]);

//        $PriorityData = intval(round(($CampaignHopperLevel * $priority)/100));

//        $ListQuery_ = "SELECT * FROM `vicidial_list` ".$Query." LIMIT ".$PriorityData;

//        $rowData = $database->query($ListQuery_)->fetchAll();


//        $count = 1;
//
//        $ListQuery_ = "SELECT * FROM `vicidial_list` ".$Query." LIMIT ".$count;
//        $rowData = $database->query($ListQuery_)->fetchAll();
//
//        $listids = rand(1111,9999);
//	$dates = date('Y-m-d h:i:s');
//	$QUERY_log_vici = $database->insert('vicidial_lists',['list_id'=>$listids,'list_name'=>'dialing entry','campaign_id'=>$ListData['campaign_id'],'list_changedate'=>$dates,'active'=>'Y']);

//        foreach($rowData as $row){
//
//            $checkuser = $DBSQLDialing->insert('sql_inserts_log',['sql_id'=>$ListData['list_id'],'lead_id'=>$lead_id]);
//
//            $lead_id = $row['lead_id'];
//            $status = 'READY';
//            $list_id = $row['list_id'];
//            $source_id = $row['source_id'];
//            $vendor_lead_code = $row['vendor_lead_code'];
//
//
//            $array = [];
//            $array['lead_id'] = $lead_id;
//            $array['campaign_id'] = $ListData['campaign_id'];
//            $array['status'] = $status;
//            $array['user'] = '';
//            $array['list_id'] = $list_id;
//            $array['gmt_offset_now'] = '-5.00';
//            $array['state'] = '';
//            $array['alt_dial'] = 'NONE';
//            $array['priority'] = $priority;
//            $array['source'] = $source_id;
//            $array['vendor_lead_code'] = $vendor_lead_code;
//            $database->insert('vicidial_hopper',$array);
//
//        }
//
//         $countIns = $DBSQLDialing->insert('counts',['list_id'=>$ListData['list_id'],'tcount'=>$count,'dcount'=>($count - $PriorityData),'leads_in_hopper'=>$PriorityData]);

         $ListID = $ListData['list_id'];
         $array = [];
         $array['list_name'] = $ListData['rule_name'];
         $array['percentage'] = $ListData['percentage'];
         $array['active'] = $ListData['active'];
         $array['queue_priority'] = $ListData['queue_priority'];
         $array['sql'] = $ListQuery;
         $array['list_json'] = $QueryJson;
         $array['drop_in'] = (!empty($ListData['drop_in'])) ? $ListData['drop_in'] : $ListData['drop_in'];
         $array['drop_out'] = (!empty($ListData['drop_out'])) ? $ListData['drop_out'] : $ListData['drop_out'];
         $array['expiry_date'] = (!empty($ListData['expiry_date'])) ? date('Y-m-d',strtotime($ListData['expiry_date'])) : $ListData['expiry_date'];
         $array['sql_condition'] = (!empty($SQLCondition)) ? $SQLCondition : '';

        $DBSQLDialing->update('lists', $array,['list_id'=>$ListID]);
        $resultResponse = response(1, 0, 'Successfully', NULL);




//        }else{
//            $resultResponse = response(0, 0, 'Something gonna wrong!!', NULL);
//        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'EDIT','$ListID', 'EDIT - ROLE',$database->last(),'Role EDIT','--All--');

    } elseif ($_GET['case'] == 'EditRule1') {

        pr($_POST);
        exit;
        $QueryArray = $_POST['QueryData'];
        $ListData = $_POST['ListData'];

        $result = get_query($QueryArray);
        $Query = $result['Query'];
        $QueryJson = $result['QueryJson'];

        $per = $ListData['percentage'];
        $priority = $ListData['queue_priority'];

        $ListQuery = "SELECT  * FROM `vicidial_list` " . $Query;
        $countQuery = "SELECT count(*) as total  FROM `vicidial_list` " . $Query;
        $CountResult = $database->query($countQuery)->fetchAll();
        $rows_in_table = (!empty($CountResult[0]['total'])) ? $CountResult[0]['total'] : 0;

        $count = intval(round(($rows_in_table * $per)/100));

//        $count = intval(round(($count * $per)/100));

        $CampaignHopperLevel = $database->get('vicidial_campaigns','hopper_level',['campaign_id'=>$ListData['campaign_id']]);

        $PriorityData = intval(round(($CampaignHopperLevel * $priority)/100));

        $ListQuery_ = "SELECT * FROM `vicidial_list` ".$Query." LIMIT ".$PriorityData;

        $rowData = $database->query($ListQuery_)->fetchAll();


//        $count = 1;
//
//        $ListQuery_ = "SELECT * FROM `vicidial_list` ".$Query." LIMIT ".$count;
//        $rowData = $database->query($ListQuery_)->fetchAll();
//
//        $listids = rand(1111,9999);
//	$dates = date('Y-m-d h:i:s');
//	$QUERY_log_vici = $database->insert('vicidial_lists',['list_id'=>$listids,'list_name'=>'dialing entry','campaign_id'=>$ListData['campaign_id'],'list_changedate'=>$dates,'active'=>'Y']);

        foreach($rowData as $row){

            $checkuser = $DBSQLDialing->insert('sql_inserts_log',['sql_id'=>$ListData['list_id'],'lead_id'=>$lead_id]);

            $lead_id = $row['lead_id'];
            $status = 'READY';
            $list_id = $row['list_id'];
            $source_id = $row['source_id'];
            $vendor_lead_code = $row['vendor_lead_code'];


            $array = [];
            $array['lead_id'] = $lead_id;
            $array['campaign_id'] = $ListData['campaign_id'];
            $array['status'] = $status;
            $array['user'] = '';
            $array['list_id'] = $list_id;
            $array['gmt_offset_now'] = '-5.00';
            $array['state'] = '';
            $array['alt_dial'] = 'NONE';
            $array['priority'] = 0;
            $array['source'] = $source_id;
            $array['vendor_lead_code'] = $vendor_lead_code;
            $database->insert('vicidial_hopper',$array);

        }

         $countIns = $DBSQLDialing->insert('counts',['list_id'=>$ListData['list_id'],'tcount'=>$count,'dcount'=>($count - $PriorityData),'leads_in_hopper'=>$PriorityData]);

         $ListID = $ListData['list_id'];
         $array = [];
         $array['list_name'] = $ListData['rule_name'];
         $array['percentage'] = $ListData['percentage'];
         $array['active'] = $ListData['active'];
         $array['queue_priority'] = $ListData['queue_priority'];
         $array['sql'] = $ListQuery;
         $array['list_json'] = $QueryJson;
         $array['drop_in'] = (!empty($ListData['drop_in'])) ? $ListData['drop_in'] : $ListData['drop_in'];
         $array['drop_out'] = (!empty($ListData['drop_out'])) ? $ListData['drop_out'] : $ListData['drop_out'];
         $array['expiry_date'] = (!empty($ListData['expiry_date'])) ? date('Y-m-d',strtotime($ListData['expiry_date'])) : $ListData['expiry_date'];

        $DBSQLDialing->update('lists', $array,['list_id'=>$ListID]);
        $resultResponse = response(1, 0, 'Successfully', NULL);

//        }else{
//            $resultResponse = response(0, 0, 'Something gonna wrong!!', NULL);
//        }
//         admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'USERS', 'EDITRULE1','$ListID', 'EDITRULE1 - ROLE',$DBSQLDialing->last(),'Role EDITRULE1','--All--');

    } elseif ($_GET['case'] == 'RemoveRule') {
        $ListID = $_POST['ListId'];
        $DBSQLDialing->delete('lists', ['list_id' => $ListID]);
        $resultResponse = response(1, 0, 'Successfully', NULL);
        admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'DELETE',$ListID, 'Rule - DELETE',$DBSQLDialing->last(),'Rule Delete','--All--');
    } elseif ($_GET['case'] == 'ViewRule') {
        $QueryArray = $_POST['queryData'];
        $x = 1;
        $Query = '';
        foreach ($QueryArray as $each) {
            $array = array();
            if ($x == 1) {
                $Query .= " WHERE";
            } else {
                $Query .= " " . $each['initial'] . " ";
            }

            $Query .= " vicidial_list.`" . $each['column_name'] . "` ";
            $Query .= " " . $each['operator'] . " ";

            if ($each['operator'] == 'NOT IN' || $each['operator'] == 'IN') {

                $_val1 = "'" . str_replace(",", "','", $each['value1']) . "'";
                $Query .= " (" . $_val1 . ") ";
            } else {
                $Query .= "'" . $each['value1'] . "'";
            }

            if ($each['operator'] == 'BETWEEN' || $each['operator'] == 'NOT BETWEEN') {
                $Query .= " " . $each['opt_btw'] . " ";
                $Query .= "'" . $each['value2'] . "'";
            }
            $x++;
        }

        $ListQuery = "SELECT * FROM `vicidial_list` " . $Query;
        $resultResponse = response(1, 0, 'Successfully', $ListQuery);
//       admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'Campaign', 'VIEW','', 'Rule Query View',$DBSQLDialing->last(),'Role REMOVERULE','--All--');

    }elseif($_GET['case'] == 'TestRule'){
        $QueryArray = $_POST['queryData'];
        $SQLCondition = $_POST['SQLCondition'];
        $x = 1;
        $Query = '';
        foreach ($QueryArray as $each) {
            $array = array();
            if ($x == 1) {
                $Query .= " WHERE";
            } else {
                $Query .= " " . $each['initial'] . " ";
            }

            $Query .= " vicidial_list.`" . $each['column_name'] . "` ";
            $Query .= " " . $each['operator'] . " ";

            if ($each['operator'] == 'NOT IN' || $each['operator'] == 'IN') {

                $_val1 = "'" . str_replace(",", "','", $each['value1']) . "'";
                $Query .= " (" . $_val1 . ") ";
            } else {
                $Query .= "'" . $each['value1'] . "'";
            }

            if ($each['operator'] == 'BETWEEN' || $each['operator'] == 'NOT BETWEEN') {
                $Query .= " " . $each['opt_btw'] . " ";
                $Query .= "'" . $each['value2'] . "'";
            }
            $x++;
        }

        if(!empty($Query) && strlen($Query) > 2){
             $ListQuery = "SELECT count(*) as total FROM `vicidial_list` " . $Query;
             $ListQueryResponse = $database->query($ListQuery)->fetchAll(PDO::FETCH_ASSOC);
             $resultResponse = response(1, 0, 'Successfully', 'You have '.$ListQueryResponse[0]['total'].' leads in the selected query.');
        }elseif(!empty($SQLCondition) && $SQLCondition){
             $ListQuery = "SELECT count(*) as total FROM `vicidial_list` WHERE " . $SQLCondition;
             $ListQueryResponse = $database->query($ListQuery)->fetchAll(PDO::FETCH_ASSOC);
             $resultResponse = response(1, 0, 'Successfully', 'You have '.$ListQueryResponse[0]['total'].' leads in the selected query.');
        }else{
            $resultResponse = response(0, 1, 'Successfully', 'Please set some conditions');
        }


        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'TEST','', 'Rule Test',$database->last(),'Rule Test','--All--');


            } elseif ($_GET['case'] == 'CopyRule') {
        $ListID = $_POST['list_id'];
        $RuleName = $_POST['rule_name'];
        $RuleData = $DBSQLDialing->get('lists', '*', ['list_id' => $ListID]);
        $RuleData['list_name'] = $RuleName;
        unset($RuleData['list_id']);
        $DBSQLDialing->insert('lists', $RuleData);
        $account_id = $DBSQLDialing->id();
        $RuleData['list_id'] = $account_id;

        $resultResponse = response(1, 0, 'Successfully', $RuleData);
         admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'COPY',$ListID, 'COPY RULE',$DBSQLDialing->last(),'Copy Rule','--All--');

    } elseif ($_GET['case'] == 'UpdatePercentage') {
        $ListId = $_POST['ListId'];
        $val = $_POST['val'];
        $campaign = $_POST['campaign'];
        $ExistPercentage = $DBSQLDialing->sum('lists','percentage',['AND'=>['campaign'=>$campaign,'list_id[!]'=>$ListId]]);
        $NewPercentage = $ExistPercentage + $val;
        if($NewPercentage > 100){
            $resultResponse = response(0, 1, 'Percentage should be as 100',$val);
        }else{
            $DBSQLDialing->update('lists',['percentage'=>$val],['list_id'=>$ListId]);
            $resultResponse = response(1, 0, 'Successfully',NULL);
        }
        admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'MODIFY',$ListId, 'UPDATE-PERCENTAGE',$DBSQLDialing->last(),'Update Percentage','--All--');

    } elseif ($_GET['case'] == 'GetRule') {
        $campaign = $_POST['campaign'];
        $data = [];
        $data['ListDetail'] = $DBSQLDialing->select('lists','*',['campaign'=>$campaign]);
//        $data['ListListing'] = $database->select('vicidial_lists',['list_id','list_name'],['AND'=>['campaign_id'=>$campaign]]);
        $ListData = $database->select('vicidial_lists',['list_id','list_name'],['AND'=>['campaign_id'=>$campaign,'active'=>'Y']]);

        $arrayList = [];
        foreach($ListData as $key=>$ListValue){
            $arrayList[$key]['value'] = $ListValue['list_id'];
            $arrayList[$key]['text'] = $ListValue['list_id'];
        }

        $data['ListListing'] = json_encode($arrayList);


        $query = "SELECT DISTINCT source_id FROM vicidial_list WHERE source_id != ''";

        $SourceID = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $arraySource = [];
        $key = 0;
        foreach($SourceID as $SourceValue){
            $arraySource[$key]['value'] = $SourceValue['source_id'];
            $arraySource[$key]['text'] = $SourceValue['source_id'];
            $key++;
        }

        $data['SourceListing'] = json_encode($arraySource);

        $resultResponse = response(1, 0, 'Successfully Found!!',$data);

       admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'GET',$campaign,'GET-RULE',$DBSQLDialing->last(),'Get-Rule','--All--');
    }elseif($_GET['case'] == 'GetSource'){
        $ListID = $_POST['ListID'];
        $query = "SELECT DISTINCT source_id FROM vicidial_list WHERE source_id != '' AND list_id IN ('".$ListID."')";

        $SourceID = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $arraySource = [];
        $key = 0;
        foreach($SourceID as $SourceValue){
            $arraySource[$key]['value'] = $SourceValue['source_id'];
            $arraySource[$key]['text'] = $SourceValue['source_id'];
            $key++;
        }

        $listJSON = json_encode($arraySource);

        $resultResponse = response(1, 0, 'Successfully Found!!',$listJSON);

    } elseif ($_GET['case'] == 'GetRuleData') {
        $campaign = $_POST['campaign'];
        $data = $DBSQLDialing->select('lists','*',['campaign'=>$campaign]);
        $ListData = [];
        foreach($data as $value){
           $ListData[] = $value['list_id'];
        }
        $RecordsDialed = $DBSQLDialing->sum('counts','dcount',['list_id[<>]'=>$ListData]);
        $RecordsDialTotal = $DBSQLDialing->sum('counts','tcount',['list_id[<>]'=>$ListData]);
        $RecordsInQueue = ($RecordsDialTotal - $RecordsDialed);

        $array = [];
        $array['Queue'] = $RecordsInQueue;
        $array['Dialed'] = $RecordsDialed;
        $resultResponse = response(1, 0, 'Successfully Found!!',$array);
         admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'CAMPAIGN', 'GET',$campaign, 'GET-RULE-DATA',$DBSQLDialing->last(),'Get Rule Data','--All--');

    } elseif ($_GET['case'] == 'ListRule') {
//        $DBSQLDialing->insert('lists', ['list_name' => 'sacsfdsfsdfdsfs', 'campaign' => 4005, 'active' => 'N']);
        $data = $DBSQLDialing->select('lists', '*');
        pr($data);
        exit;
//        admin_log_insert($DBSQLDialing,@$_SESSION['Login']['user'],'USERS', 'LISTRULE','', 'LISTRULE - ROLE',$DBSQLDialing->last(),'Role LISTRULE','--All--');
    }
    if(isset($resultResponse)) echo json_encode($resultResponse);
    elseif(isset($result)) echo json_encode($result);
    die;
}

if (!empty($_GET) && isset($_GET['action']) && $_GET['action']) {
    if ($_GET['action'] == 'AddCampaign') {

        if (checkRole('campaigns', 'create')) {

            $Count = $database->count('vicidial_campaigns',['campaign_id'=>$_POST['campaign_id']]);

            if($Count > 0){
                $resultResponse = response(0, 1, 'Already Exist!!', NULL);
            }else{

            $campaigns = [];
            $campaigns['campaign_id'] = $_POST['campaign_id'];
            $campaigns['campaign_name'] = $_POST['campaign_name'];
            $campaigns['campaign_description'] = $_POST['campaign_description'];
            $campaigns['active'] = (!empty($_POST['campaign_active'])) ? "Y" : "N";
            if (!empty($_POST['campaign_webform']) && $_POST['campaign_webform'] == 1) {
                $campaigns["web_form_address"] = $_POST['web_form_address'];
                $campaigns["web_form_address_two"] = $_POST['web_form_address_two'];
            }

            $campaigns["get_call_launch"] = (!empty($_POST['open_new_window'])) ? "WEBFORM" : "NONE";
            $campaigns["campaign_allow_inbound"] = (!empty($_POST['campaign_blanded'])) ? "Y" : "N";
            $campaigns["hopper_level"] = $_POST['max_leads_to_queue'];
            $campaigns["use_auto_hopper"] = $_POST['auto_queue_level'];
            $campaigns["auto_trim_hopper"] = $_POST['auto_trim_queue_leads'];
            $campaigns["lead_order_randomize"] = $_POST['queue_randomize'];
            $campaigns["dial_method"] = $_POST['dial_method'];
            $campaigns["auto_dial_level"] = $_POST['dial_speed'];
            $campaigns["dial_timeout"] = $_POST['dial_timeout'];
            $campaigns["drop_call_seconds"] = $_POST['drop_timeout'];
            $campaigns["campaign_cid"] = $_POST['outbond_number'];
            $campaigns["campaign_vdad_exten"] = $_POST['enable_amd'];
            $campaigns["campaign_recording"] = $_POST['campaign_recording'];
            $campaigns["campaign_rec_filename"] = "FULLDATE_CUSTPHONE_AGENT_CAMPAIGN";
            $campaigns["alt_number_dialing"] = $_POST['alt_number_dial'];
            $campaigns["scheduled_callbacks"] = $_POST['scheduled_callbacks'];
            $campaigns["agent_pause_codes_active"] = $_POST['agent_pause_codes_active'];
            $campaigns["list_order_mix"] = "DISABLED";
            $campaigns["campaign_stats_refresh"] = "Y";
            $campaigns["dial_status_a"] = "NEW";
            $campaigns["lead_order"] = "DOWN";
            $campaigns["hide_agent_call_logs"] = "N";
            $campaigns["hide_customer_call_history"] = "N";
            $campaigns["user_group"] = $_POST['user_group'];

            if(!empty($_POST['user_group']) && $_POST['user_group'] != 'ADMIN'){
                $UserGroupDetail = $database->get('vicidial_user_groups',['allowed_campaigns'],['user_group'=>$_POST['user_group']]);
                $database->update('vicidial_user_groups',['allowed_campaigns'=>" ".$campaigns['campaign_id'].$UserGroupDetail['allowed_campaigns']],['user_group'=>$_POST['user_group']]);
            }

            $Insert = $database->insert('vicidial_campaigns', $campaigns);

            if ($Insert) {
                foreach ($_POST['dialing_statuses'] as $row) {
                    $arr = explode('_', $row);
                    $datata = $database->select('vicidial_statuses', '*', ['status' => $arr[0]]);
                    foreach ($datata as $res) {
                        $res['campaign_id'] = $_POST['campaign_id'];
                        $vst = $database->insert('vicidial_campaign_statuses', $res);
                    }
                }
            }
            $_SESSION['CurrentLogin']['CampaignID'][] = $_POST['campaign_id'];
            $_SESSION['CurrentLogin']['Campaign'][] = $_POST['campaign_id'];
            $responseData = [];
            $responseData['CampaignID'] = $_POST['campaign_id'];
            $responseData['CampaignName'] = $_POST['campaign_name'];

            $resultResponse = response(1, 0, 'Successfully Submitted!!', $responseData);
            }
        } else {
            $resultResponse = response(0, 1, 'No Permission!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'ADD',$_POST['campaign_id'], 'ADD-CAMPAIGN',$database->last(),'Add Campaign','--All--');

    } elseif ($_GET['action'] == 'CopyCampaign') {
        if (checkRole('campaigns', 'create')) {
            $CampaignExist = $database->count('vicidial_campaigns',['OR'=>['campaign_id' => $_POST['campId'],'campaign_name'=>$_POST['campName']]]);
            if(!empty($CampaignExist) && $CampaignExist > 0){
                $resultResponse = response(0, 1, 'Campaign Id or Campaign Name already exist!!', NULL);
            }else{
                $Campaign = $database->get('vicidial_campaigns', '*', ['campaign_id' => $_POST['campIdCopy']]);
                $Campaign['campaign_id'] = $_POST['campId'];
                $Campaign['campaign_name'] = $_POST['campName'];
                $Campaign['campaign_description'] = $_POST['campDesc'];

                if(!empty($Campaign['user_group']) && $Campaign['user_group'] != 'ADMIN'){
                $UserGroupDetail = $database->get('vicidial_user_groups',['allowed_campaigns'],['user_group'=>$Campaign['user_group']]);
                $database->update('vicidial_user_groups',['allowed_campaigns'=>" ".$Campaign['campaign_id'].$UserGroupDetail['allowed_campaigns']],['user_group'=>$Campaign['user_group']]);
                }

                $insert = $database->insert('vicidial_campaigns', $Campaign);
                if ($insert) {
                    $CampaignStatues = $database->select('vicidial_campaign_statuses', '*', ['campaign_id' => $_POST['campIdCopy']]);
                    foreach ($CampaignStatues as $each) {
                        unset($each['id']);
                        $each['campaign_id'] = $_POST['campId'];
                        $vst = $database->insert('vicidial_campaign_statuses', $each);
                    }
                    $CampaignPauseCodes = $database->select('vicidial_pause_codes', '*', ['campaign_id' => $_POST['campIdCopy']]);
                    foreach ($CampaignPauseCodes as $each) {
                        unset($each['id']);
                        $each['campaign_id'] = $_POST['campId'];
                        $vst = $database->insert('vicidial_pause_codes', $each);
                    }


                    /*Response Array*/
                    $responseData = [];
                    $responseData['CampaignID'] = $_POST['campId'];
                    $responseData['CampaignName'] = $_POST['campName'];

                    $resultResponse = response(1, 0, 'Campaign Copied Successfully!!', $responseData);
                } else {
                    $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
                }
            }
        } else {
            $resultResponse = response(0, 1, 'No Permission!!', NULL);
        }
        admin_log_insert($database,@$_SESSION['Login']['user'],'CAMPAIGN', 'COPY',$_POST['campIdCopy'], 'COPY-CAMPAIGN',$database->last(),'Copy Campaign','--All--');

    } elseif ($_GET['action'] == 'GetCampaign') {

        $val = $_GET['val'];
        if (!empty($_SESSION['Login']['user'])) {
            $User = $_SESSION['Login']['user'];
        } else {
            $User = $_SERVER['PHP_AUTH_USER'];
        }

        $data = $database->get('vicidial_users', '*', ['user' => $User]);

        $data = $database->get('vicidial_user_groups', '*', ['user_group' => $data['user_group']]);

        $LOGallowed_campaigns = $data['allowed_campaigns'];

        if (strpos($LOGallowed_campaigns, 'ALL-CAMPAIGNS') !== false) {
            if (!empty($_POST['columns'][0]['search']['value']) && $_POST['columns'][0]['search']['value']) {
//     $SQL = "SELECT * FROM vicidial_campaigns where active = 'Y'";
            } else {
//     $SQL = "SELECT * FROM vicidial_campaigns where active = 'Y'";
                if ($val == 0) {
                    $SQL = "SELECT * FROM vicidial_campaigns where active='Y'";
                }
                if ($val == 1) {
                    $SQL = "SELECT * FROM vicidial_campaigns";
                }
            }
        } else {
            if ($val == 0) {
//                $Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
                $Campaign = $_SESSION['CurrentLogin']['CampaignID'];
                if(!empty($Campaign) && count($Campaign) > 0){
                    $SQL = "SELECT * FROM vicidial_campaigns where active='Y' AND campaign_id IN ('" . implode("','", $Campaign) . "')";
                }else{
                     $SQL = "SELECT * FROM vicidial_campaigns where active='Y' AND campaign_id IN ('" . implode("','", $Campaign) . "')";
//                    $SQL = "SELECT * FROM vicidial_campaigns where active='Y'";
                }

            }
            if ($val == 1) {
//                $Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
                 $Campaign = $_SESSION['CurrentLogin']['CampaignID'];
                $SQL = "SELECT * FROM vicidial_campaigns where  campaign_id IN ('" . implode("','", $Campaign) . "')";
            }
        }

        $query = "SELECT * FROM system_settings";
        //$systemDetail = $database->get('system_settings',['auto_dial_limit']]);
        $systemDetail = $database->query($query)->fetch();


//       $Rowresult = $conn->query($SQL);
//       $totalRow = $Rowresult->num_rows;
        $TableData = array();
        $Rowresult = $database->query($SQL)->fetchAll();

        foreach ($Rowresult as $row) {
            $eachData = array();
            $agent_incall = 0;
            $agent_ready = 0;
            $agent_paused = 0;
            $agent_total = 0;
            $agent_wait = 0;
            //  $Sql2 = "SELECT * FROM  vicidial_live_agents WHERE campaign_id=".$row['campaign_id'];
            $Sql2 = "SELECT user,server_ip,status,lead_id,campaign_id,
                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'READY' THEN 1 ELSE 0 END) AS 'READY',
                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'PAUSED' THEN 1 ELSE 0 END) AS 'PAUSED',
                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'INCALL' THEN 1 ELSE 0 END) AS 'INCALL',
                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'QUEUE' THEN 1 ELSE 0 END) AS 'QUEUE'
                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'dispo' THEN 1 ELSE 0 END) AS 'WRAP'
                FROM `vicidial_live_agents` WHERE  campaign_id=" . $row['campaign_id'];

//             $InnerResult = $conn->query($Sql2);
//             $InnerRow = $InnerResult->num_rows;
            $res = $database->query($Sql2)->fetchAll();
            $agent_drop = 0;
            if (count($res) > 0) {
                $res = $res[0];
                $agent_wait = ($res['READY']) ? $res['READY'] : 0;
                $agent_paused = ($res['PAUSED']) ? $res['PAUSED'] : 0;
                $agent_incall = ($res['INCALL']) ? $res['INCALL'] : 0;
                $agent_ready = ($res['QUEUE']) ? $res['QUEUE'] : 0;
                $agent_drop = ($res['WRAP']) ? $res['WRAP'] : 0;
                $agent_total = ($InnerRow) ? $InnerRow : 0;
            }

            $eachData['ID'] = $row['campaign_id'];
            $eachData['Campaign_Name'] = $row['campaign_name'];
            if ($row['active'] == 'N') {
                $chk = "";
            } else {
                $chk = "active";
            }
            $eachData['Active'] = '<button type="button" class="btn btn-sm btn-toggle ' . $chk . ' CampaignActive" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $row['campaign_id'] . '" value="1">
						<div class="handle"></div>
                                  </button>';
//           $eachData['Active'] = '<label class="switch">
//									<input type="checkbox" '.$chk.' class="class_name campaign_active" data-id="'.$row['campaign_id'].'" value="1">
//									<span class="slider"></span>
//									</label>';
            $Dial_Method = "<select class='form-control CampaignDialMethod' data-id='" . $row['campaign_id'] . "'>";
//         $dialMethodOptions = ["MANUAL","RATIO","ADAPT_HARD_LIMIT","ADAPT_TAPERED","ADAPT_AVERAGE","INBOUND_MAN"];
            $dialMethodOptions1 = ["RATIO" => 'Auto Dial', "INBOUND_MAN" => 'Inbound', 'MANUAL' => 'Manual Dial', 'ADAPT_TAPERED' => 'Predictive Dial'];
//          foreach($dialMethodOptions as $opt){
//             if($opt==$row['dial_method']){$optselected = "selected";}else{ $optselected = "";}
//              $Dial_Method .= "<option value='".$opt."' ".$optselected.">".$opt."</option>";
//          }
            foreach ($dialMethodOptions1 as $key => $val) {
                if ($key == $row['dial_method']) {
                    $optselected = "selected";
                } else {
                    $optselected = "";
                }
                $Dial_Method .= "<option value='" . $key . "' " . $optselected . ">" . $val . "</option>";
            }
            $Dial_Method .= "</select>";
            $eachData['Dial_Method'] = $Dial_Method;
            if ($row['list_order_mix'] == 'DISABLED') {
                $SQL_D = "";
            } else {
                $SQL_D = "active";
            }
            $eachData['SQL_Dailing'] = '<button type="button" class="btn btn-sm btn-toggle ' . $SQL_D . ' SQLActive" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $row['campaign_id'] . '" value="1">
						<div class="handle"></div>
                                  </button>';

            if (in_array($row['dial_method'], ['MANUAL', 'INBOUND_MAN'])) {
//               $Speed = "N/A When using Manual/Inbound Mode";
                $TextDisplay = 'block';
                $SliderDisplay = 'none';
                $selected = 'disabled';
            } else {
                $TextDisplay = 'none';
                $SliderDisplay = 'block';
                $selected = '';
//               $Speed = '<div class="slidecontainer">
//                								  <input type="range" min="0" max="5" step="0.1"  value="'.$row['auto_dial_level'].'" class="range-slider speedChange" id="myRange'.$row['campaign_id'].'"  data-id="'.$row['campaign_id'].'">
//                                  <span id="span-'.$row['campaign_id'].'">'.$row['auto_dial_level'].'</span>
//                								</div>';
            }

            /* $eachData['Speed'] = '<div class="Speed-Section Speed-Section-TEXT-' . $row['campaign_id'] . '" style="display:' . $TextDisplay . '">N/A When using Manual/Inbound Mode</div><div class="slidecontainer Speed-Section Speed-Section-Other-' . $row['campaign_id'] . '" style="display:' . $SliderDisplay . '">
                								  <input type="range" min="0" max="'.$systemDetail['auto_dial_limit'].'" step="0.1"  value="' . $row['auto_dial_level'] . '" class="range-slider speedChange" id="myRange' . $row['campaign_id'] . '"  data-id="' . $row['campaign_id'] . '">
                                  <span id="span-' . $row['campaign_id'] . '">' . number_format($row['auto_dial_level'], 1) . '</span>
                								</div>'; */
            $eachData['Speed'] = "<select class='form-control speedChange' data-id='" . $row['campaign_id'] . "' $selected>";
            $eachData['Speed'] .= '<option>0</option>';
            $adl=0;
            while ($adl < $systemDetail['auto_dial_limit']) {
              if ($adl < 1)
      					{$adl = ($adl + 1);}
      				else
      					{
      					if ($adl < 3)
      						{$adl = ($adl + 0.1);}
      					else
      						{
      						if ($adl < 4)
      							{$adl = ($adl + 0.25);}
      						else
      							{
      							if ($adl < 5)
      								{$adl = ($adl + 0.5);}
      							else
      								{
      								if ($adl < 10)
      									{$adl = ($adl + 1);}
      								else
      									{
      									if ($adl < 20)
      										{$adl = ($adl + 2);}
      									else
      										{
      										if ($adl < 40)
      											{$adl = ($adl + 5);}
      										else
      											{
      											if ($adl < 200)
      												{$adl = ($adl + 10);}
      											else
      												{
      												if ($adl < 400)
      													{$adl = ($adl + 50);}
      												else
      													{
      													if ($adl < 1000)
      														{$adl = ($adl + 100);}
      													else
      														{$adl = ($adl + 1);}
      													}
      												}
      											}
      										}
      									}
      								}
      							}
      						}
      					}
                if($adl > $systemDetail['auto_dial_limit'] && $adl != $systemDetail['auto_dial_limit']){
                  $adl = $systemDetail['auto_dial_limit'];
                }
                $eachData['Speed'] .= '<option value="'.$adl.'"';
                if(trim($adl) == $row['auto_dial_level']) {
                  $eachData['Speed'] .= 'selected';
                }
                $eachData['Speed'] .= '>'.$adl. '</option>';
            }
            $eachData['Speed'] .= '</select>';
            ;
            $agents = [];
            $agent_paused = 0;
            $agent_ready = 0;
            $agent_total = 0;
            $agent_incall = 0;
            $agents['logged_in'] = $agent_total;
            $agents['in_calls'] = $agent_incall;
            $agents['waiting'] = $agent_ready;
            $agents['paused'] = $agent_paused;
            $agents['drop'] = $agent_drop;
//            if (!empty($talking_to_print) && count($talking_to_print) > 0) {
//                $i = 0;
//                $agentcount = 0;
//                foreach ($talking_to_print as $value) {
//                    if (preg_match("/READY|PAUSED/i", $value['status'])) {
//                        $value['last_call_time'] = $value['last_call_finish'];
//                    }
//                    $Lstatus = $value['status'];
//                    $status = sprintf("%-6s", $value['status']);
//                    if (!preg_match("/INCALL|QUEUE/i", $value['status'])) {
//                        $call_time_S = ($STARTtime - $value['last_call_finish']);
//                    } else {
//                        $call_time_S = ($STARTtime - $value['last_call_time']);
//                    }
//                    $call_time_M = MathZDC(@$call_time_S, 60);
//                    $call_time_M = round($call_time_M, 2);
//                    $call_time_M_int = intval("$call_time_M");
//                    $call_time_SEC = ($call_time_M - $call_time_M_int);
//                    $call_time_SEC = ($call_time_SEC * 60);
//                    $call_time_SEC = round($call_time_SEC, 0);
//                    if ($call_time_SEC < 10) {
//                        $call_time_SEC = "0$call_time_SEC";
//                    }
//                    $call_time_MS = "$call_time_M_int:$call_time_SEC";
//                    $call_time_MS = sprintf("%7s", $call_time_MS);
//                    $G = '';
//                    $EG = '';
//                    if (preg_match("/PAUSED/i", $value['status'])) {
//                        if ($call_time_M_int >= 30) {
//                            $i++;
//                            continue;
//                        } else {
//                            $agent_paused++;
//                            $agent_total++;
//                        }
//                    }
//
//                    if ((preg_match("/INCALL/i", $status)) or ( preg_match("/QUEUE/i", $status))) {
//                        $agent_incall++;
//                        $agent_total++;
//                    }
//                    if ((preg_match("/READY/i", $status)) or ( preg_match("/CLOSER/i", $status))) {
//                        $agent_ready++;
//                        $agent_total++;
//                    }
//                    $agentcount++;
//                    $i++;
//                }
//
//                $agents['logged_in'] = $agent_total;
//                $agents['in_calls'] = $agent_incall;
//                $agents['waiting'] = $agent_ready;
//                $agents['paused'] = $agent_paused;
//            }

            $DropCallCount = $database->count('vicidial_closer_log', ['AND' => ['campaign_id' => $row['campaign_id'], 'call_date [>]' => date('Y-m-d') . ' 00:00:00', 'status' => 'DROP']]);
            $AllCallCount = $database->count('vicidial_closer_log', ['AND' => ['campaign_id' => $row['campaign_id'], 'call_date [>]' => date('Y-m-d H:i:s')]]);

            $DropRatePercentage = $AllCallCount ? (($DropCallCount * 100) / $AllCallCount) : 0;

            $eachData['Logged_In'] = $database->count('vicidial_live_agents', ['campaign_id' => $row['campaign_id']]);

            $UpdateQuery = "SELECT status,count(*) as total FROM vicidial_live_agents where campaign_id = '".$row['campaign_id']."' group by status";
            $resultLive = $database->query($UpdateQuery)->fetchAll();
            $LiveAgent = [];
            foreach($resultLive as $liveAgent){
                $LiveAgent[$liveAgent['status']] = $liveAgent['total'];
            }

            $LiveAgentData = get_agent_logged_in($database, $row['campaign_id']);
            $eachData['Logged_In'] = array_sum($LiveAgentData);
            $eachData['Talking'] = $LiveAgentData['TALK'];
            $eachData['Waiting'] = $LiveAgentData['WAIT'];
            $eachData['Paused'] = $LiveAgentData['PAUSE'];
            $eachData['Wrap'] = $LiveAgentData['DISPO'];
            $eachData['Drop_Rate'] = get_campaigns_DROP_RATE($database,$row['campaign_id']).'%';
//            $eachData['Talking'] = (!empty($LiveAgent['INCALL'])) ? $LiveAgent['INCALL'] : 0;
//            $eachData['Waiting'] = (!empty($LiveAgent['READY'])) ? $LiveAgent['READY'] : 0;
//            $eachData['Paused'] = (!empty($LiveAgent['PAUSED'])) ? $LiveAgent['PAUSED'] : 0;
//            $eachData['Wrap'] = (!empty($LiveAgent['DISPO'])) ? $LiveAgent['DISPO'] : 0;
//            $eachData['Drop_Rate'] = get_campaigns_DROP_RATE($database,$row['campaign_id']).'%';



//           $eachData['action'] ='<div style="width:75px"><a href="'.base_url('campaigns/edit').'?campaign_id='.$row['campaign_id'].'" class="btn btn-app btn-success"><i class="fa fa-arrow-right"></i></a><a href="'.base_url('campaigns/edit').'?CoNfIrM=YES&campaign_id='.$row['campaign_id'].'" class="btn btn-app btn-danger"><i class="fa fa-times"></i></a></div>';
//           $eachData['action'] ='';
            if (checkRole('campaigns', 'edit')) {
                $EditAction = '<a href="'.base_url('campaigns/edit').'?campaign_id=' . $row['campaign_id'] . '" class="btn btn-app btn-success" title="Campaign Detail"><i class="fa fa-arrow-right"></i></a>';
                $EditAction1 = '<a href="javascript:void(0);" class="btn btn-app btn-warning AgentLogOut" data-id="'.$row['campaign_id'].'" title="Logout All Agent"><i class="fa fa-sign-out"></i></a>';
            } else {
              $EditAction = '';
              $EditAction1 = '';
            }
            if (checkRole('campaigns', 'delete')) {
                $RemoveAction = '<a href="javascript:void(0);" class="btn btn-app btn-danger RemoveCampaign" data-id="'.$row['campaign_id'].'" title="Remove Campaign"><i class="fa fa-times"></i></a>';
            } else {
              $RemoveAction = '';
            }
            $eachData['action'] = '<div style="width:105px">' . $EditAction .$EditAction1 . $RemoveAction . '</div>';
//           $eachData['action'] ='<ul class="btn-ul" style="display:inline"><li>
//
//								     <a class="btn btn-primary btn-xs-btn" type="button" title="Edit rule" href="/adminbsb/admin.php?ADD=31&campaign_id='.$row['campaign_id'].'"><i class="material-icons">forward</i></a></li>
//								     <li><a class="btn btn-danger btn-xs-btn" type="button" title="Delete rule" href="/adminbsb/admin.php?ADD=61&CoNfIrM=YES&campaign_id='.$row['campaign_id'].'"><i class="material-icons">clear</i></a></li>
//								  </ul>';
            $ListSql = "SELECT * FROM `lists` WHERE campaign=" . $row['campaign_id'];
//             $InnerSqlResult = $DBConn->query($ListSql);
//             $InnerSqlListrow = $InnerSqlResult->num_rows;
            $InnerSqlListrow = $database->query($ListSql)->fetchAll();
            $_rule = array();
            if (count($InnerSqlListrow) > 0) {
                $j = 1;
                foreach ($InnerSqlListrow as $rs) {
                    //    print_r($rs);
                    $each = array();
                    $each['id'] = $rs['list_id'];
                    $each['name'] = $rs['list_name'];
                    if ($row['active'] == 'Y') {
                        $listActive = "checked";
                    } else {
                        $listActive = "";
                    }
                    $each['active'] = '<label class="switch">
                              <input type="checkbox" ' . $listActive . ' class="RuleEnableSingle" data-id="' . $rs['list_id'] . '">
                              <span class="slider"></span>
                              </label>';
                    $each['percentage'] = 0;
                    $each['total'] = 0;
                    $each['availabel'] = 0;
                    $each['total'] = 0;
                    $each['queued'] = 0;
                    $each['dials'] = 0;
                    $each['connect'] = 0;
                    $each['dmc'] = 0;
                    $each['drop'] = 0;
                    $each['sales'] = 0;
                    $each['conversaion'] = 0;
                    $each['ans_machine'] = 0;
                    $each['no_ans'] = 0;
                    $_rule[] = $each;
                    $j++;
                }
            }
            $eachData['_rule'] = $_rule;

            $TableData[] = $eachData;
        }

        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal" => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $TableData
        );
//         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'GETCAMPAIGNS','$User', 'GETCAMPAIGNS - ROLE',$database->last(),'Role GETCAMPAIGNS','--All--');

} elseif($_GET['action'] == 'Agent_LogOut') {
  $PHP_AUTH_USER = $_SESSION['Login']['user'];
  $campaign_id = $_POST['campaign_id'];

  $stmt="SELECT user_id,user,pass,full_name,user_level,user_group,phone_login,phone_pass,delete_users,delete_user_groups,delete_lists,delete_campaigns,delete_ingroups,delete_remote_agents,load_leads,campaign_detail,ast_admin_access,ast_delete_phones,delete_scripts,modify_leads,hotkeys_active,change_agent_campaign,agent_choose_ingroups,closer_campaigns,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,delete_filters,alter_agent_interface_options,closer_default_blended,delete_call_times,modify_call_times,modify_users,modify_campaigns,modify_lists,modify_scripts,modify_filters,modify_ingroups,modify_usergroups,modify_remoteagents,modify_servers,view_reports,vicidial_recording_override,alter_custdata_override,qc_enabled,qc_user_level,qc_pass,qc_finish,qc_commit,add_timeclock_log,modify_timeclock_log,delete_timeclock_log,alter_custphone_override,vdc_agent_api_access,modify_inbound_dids,delete_inbound_dids,active,alert_enabled,download_lists,agent_shift_enforcement_override,manager_shift_enforcement_override,shift_override_flag,export_reports,delete_from_dnc,email,user_code,territory,allow_alerts,callcard_admin,force_change_password,modify_shifts,modify_phones,modify_carriers,modify_labels,modify_statuses,modify_voicemail,modify_audiostore,modify_moh,modify_tts,modify_contacts,modify_same_user_level,alter_admin_interface_options,modify_custom_dialplans,modify_languages,selected_language,user_choose_language,modify_colors,api_only_user,modify_auto_reports,modify_ip_lists,export_gdpr_leads from vicidial_users where user='$PHP_AUTH_USER';";
  $rslt=mysql_to_mysqli($stmt, $link);
  $row=mysqli_fetch_row($rslt);
  $LOGfull_name				=$row[3];
  $LOGuser_level				=$row[4];
  $LOGuser_group				=$row[5];
  $LOGdelete_users			=$row[8];
  $LOGdelete_user_groups		=$row[9];
  $LOGdelete_lists			=$row[10];
  $LOGdelete_campaigns		=$row[11];
  $LOGdelete_ingroups			=$row[12];
  $LOGdelete_remote_agents	=$row[13];
  $LOGload_leads				=$row[14];
  $LOGcampaign_detail			=$row[15];
  $LOGast_admin_access		=$row[16];
  $LOGast_delete_phones		=$row[17];
  $LOGdelete_scripts			=$row[18];
  $LOGmodify_leads			=$row[19];
  $LOGdelete_filters			=$row[29];
  $LOGalter_agent_interface	=$row[30];
  $LOGdelete_call_times		=$row[32];
  $LOGmodify_call_times		=$row[33];
  $LOGmodify_users			=$row[34];
  $LOGmodify_campaigns		=$row[35];
  $LOGmodify_lists			=$row[36];
  $LOGmodify_scripts			=$row[37];
  $LOGmodify_filters			=$row[38];
  $LOGmodify_ingroups			=$row[39];
  $LOGmodify_usergroups		=$row[40];
  $LOGmodify_remoteagents		=$row[41];
  $LOGmodify_servers			=$row[42];
  $LOGview_reports			=$row[43];
  $LOGmodify_dids				=$row[56];
  $LOGdelete_dids				=$row[57];
  $LOGmanager_shift_enforcement_override=$row[61];
  $LOGexport_reports			=$row[64];
  $LOGdelete_from_dnc			=$row[65];
  $LOGcallcard_admin			=$row[70];
  $LOGforce_change_password	=$row[71];
  $LOGmodify_shifts			=$row[72];
  $LOGmodify_phones			=$row[73];
  $LOGmodify_carriers			=$row[74];
  $LOGmodify_labels			=$row[75];
  $LOGmodify_statuses			=$row[76];
  $LOGmodify_voicemail		=$row[77];
  $LOGmodify_audiostore		=$row[78];
  $LOGmodify_moh				=$row[79];
  $LOGmodify_tts				=$row[80];
  $LOGmodify_contacts			=$row[81];
  $LOGmodify_same_user_level	=$row[82];
  $LOGalter_admin_interface	=$row[83];
  $LOGmodify_custom_dialplans =$row[84];
  $LOGmodify_languages		=$row[85];
  $LOGselected_language		=$row[86];
  $LOGuser_choose_language	=$row[87];
  $LOGmodify_colors			=$row[88];
  $LOGapi_only_user			=$row[89];
  $LOGmodify_auto_reports		=$row[90];
  $LOGmodify_ip_lists			=$row[91];
  $LOGexport_gdpr_leads		=$row[92];

  $stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
  $rslt=mysql_to_mysqli($stmt, $link);
  $row=mysqli_fetch_row($rslt);
  $LOGallowed_campaigns =			$row[0];
  $LOGallowed_reports =			$row[1];
  $LOGadmin_viewable_groups =		$row[2];
  $LOGadmin_viewable_call_times =	$row[3];
  $LOGqc_allowed_campaigns =		$row[4];
  $LOGqc_allowed_inbound_groups =	$row[5];

  $LOGallowed_campaignsSQL='';
  $campLOGallowed_campaignsSQL='';
  $whereLOGallowed_campaignsSQL='';
  if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
  	{
  	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
  	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
  	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
  	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
  	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
  	}
    	if ($LOGmodify_campaigns==1)
    		{
    		//echo "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";

    		if (strlen($campaign_id) < 2)
    			{
    			$message = "AGENTS NOT LOGGED OUT OF CAMPAIGN - Please go back and look at the data you entered. Campaign_id must be at least 2 characters in length";
    			}
    		else
    			{
    			$stmtLOG='';
    			$usersLOG='';
    			$stmt="SELECT count(*) from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
    			$rslt=mysql_to_mysqli($stmt, $link);
    			$row=mysqli_fetch_row($rslt);
    			if ($row[0] < 1)
    				{$message = "CAMPAIGN NOT FOUND ".$campaign_id;}
    			else
    				{
    				$now_date_epoch = date('U');
    				$inactive_epoch = ($now_date_epoch - 60);
    				$stmt = "SELECT user,campaign_id,UNIX_TIMESTAMP(last_update_time),extension,status,conf_exten,server_ip from vicidial_live_agents where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
    				$rslt=mysql_to_mysqli($stmt, $link);
    				if ($DB) {}
    				$vla_ct = mysqli_num_rows($rslt);
    				$k=0;
    				while ($vla_ct > $k)
    					{
    					$row=mysqli_fetch_row($rslt);
    					$VLA_user[$k] =			$row[0];
    					$VLA_campaign_id[$k] =	$row[1];
    					$VLA_update_time[$k] =	$row[2];
    					$VLA_extension[$k] =	$row[3];
    					$VLA_status[$k] =		$row[4];
    					$VLA_conf_exten[$k] =	$row[5];
    					$VLA_server_ip[$k] =	$row[6];
    					$k++;
    					}

    				$k=0;
    				while ($vla_ct > $k)
    					{
    					if ($VLA_update_time[$k] > $inactive_epoch)
    						{
    						$lead_active=0;
    						$stmt = "SELECT agent_log_id,user,server_ip,event_time,lead_id,campaign_id,pause_epoch,pause_sec,wait_epoch,wait_sec,talk_epoch,talk_sec,dispo_epoch,dispo_sec,status,user_group,comments,sub_status,dead_epoch,dead_sec from vicidial_agent_log where user='$VLA_user[$k]' order by agent_log_id desc LIMIT 1;";
    						$rslt=mysql_to_mysqli($stmt, $link);
    						if ($DB) {}
    						$val_ct = mysqli_num_rows($rslt);
    						if ($val_ct > 0)
    							{
    							$row=mysqli_fetch_row($rslt);
    							$VAL_agent_log_id =		$row[0];
    							$VAL_user =				$row[1];
    							$VAL_server_ip =		$row[2];
    							$VAL_event_time =		$row[3];
    							$VAL_lead_id =			$row[4];
    							$VAL_campaign_id =		$row[5];
    							$VAL_pause_epoch =		$row[6];
    							$VAL_pause_sec =		$row[7];
    							$VAL_wait_epoch =		$row[8];
    							$VAL_wait_sec =			$row[9];
    							$VAL_talk_epoch =		$row[10];
    							$VAL_talk_sec =			$row[11];
    							$VAL_dispo_epoch =		$row[12];
    							$VAL_dispo_sec =		$row[13];
    							$VAL_status =			$row[14];
    							$VAL_user_group =		$row[15];
    							$VAL_comments =			$row[16];
    							$VAL_sub_status =		$row[17];
    							$VAL_dead_epoch =		$row[18];
    							$VAL_dead_sec =			$row[19];

    							if ($DB) {//echo "\n<BR>"._QXZ("VAL VALUES").": $VAL_agent_log_id|$VAL_status|$VAL_lead_id\n";
                  }

    							if ( ($VAL_wait_epoch < 1) or ( ($VAL_status == 'PAUSE') and ($VAL_dispo_epoch < 1) ) )
    								{
    								$VAL_pause_sec = ( ($now_date_epoch - $VAL_pause_epoch) + $VAL_pause_sec);
    								$stmt = "UPDATE vicidial_agent_log SET wait_epoch='$now_date_epoch', pause_sec='$VAL_pause_sec', pause_type='ADMIN' where agent_log_id='$VAL_agent_log_id';";
    								$stmtLOG .= "$stmt|";
    								}
    							else
    								{
    								if ($VAL_talk_epoch < 1)
    									{
    									$VAL_wait_sec = ( ($now_date_epoch - $VAL_wait_epoch) + $VAL_wait_sec);
    									$stmt = "UPDATE vicidial_agent_log SET talk_epoch='$now_date_epoch', wait_sec='$VAL_wait_sec' where agent_log_id='$VAL_agent_log_id';";
    									$stmtLOG .= "$stmt|";
    									}
    								else
    									{
    									$lead_active++;
    									$status_update_SQL='';
    									if ( ( (strlen($VAL_status) < 1) or ($VAL_status == 'NULL') ) and ($VAL_lead_id > 0) )
    										{
    										$status_update_SQL = ", status='PU'";
    										$stmt="UPDATE vicidial_list SET status='PU' where lead_id='$VAL_lead_id';";
    										if ($DB) {}
    										$rslt=mysql_to_mysqli($stmt, $link);
    										$stmtLOG .= "$stmt|";
    										}
    									if ($VAL_dispo_epoch < 1)
    										{
    										$VAL_talk_sec = ($now_date_epoch - $VAL_talk_epoch);
    										$stmt = "UPDATE vicidial_agent_log SET dispo_epoch='$now_date_epoch', talk_sec='$VAL_talk_sec'$status_update_SQL where agent_log_id='$VAL_agent_log_id';";
    										$stmtLOG .= "$stmt|";
    										}
    									else
    										{
    										if ($VAL_dispo_sec < 1)
    											{
    											$VAL_dispo_sec = ($now_date_epoch - $VAL_dispo_epoch);
    											$stmt = "UPDATE vicidial_agent_log SET dispo_sec='$VAL_dispo_sec' where agent_log_id='$VAL_agent_log_id';";
    											$stmtLOG .= "$stmt|";
    											}
    										}
    									}
    								}

    							if ($DB) {}
    							$rslt=mysql_to_mysqli($stmt, $link);
    							}
    						}

    					$stmt="DELETE from vicidial_live_agents where user='$VLA_user[$k]';";
    					if ($DB) {}
    					$rslt=mysql_to_mysqli($stmt, $link);
    					$stmtLOG .= "$stmt|";

    					if (strlen($VAL_user_group) < 1)
    						{
    						$stmt = "SELECT user_group FROM vicidial_users where user='$VLA_user[$k]' $LOGadmin_viewable_groupsSQL;";
    						$rslt=mysql_to_mysqli($stmt, $link);
    						if ($DB) {}
    						$val_ct = mysqli_num_rows($rslt);
    						if ($val_ct > 0)
    							{
    							$row=mysqli_fetch_row($rslt);
    							$VAL_user_group =		$row[0];
    							}
    						}

    					$local_DEF = 'Local/5555';
    					$local_AMP = '@';
    					$ext_context = 'default';
    					$kick_local_channel = "$local_DEF$VLA_conf_exten[$k]$local_AMP$ext_context";
    					$queryCID = "ULGH3457$StarTtimE";

    					$stmtC="INSERT INTO vicidial_manager values('','','$NOW_TIME','NEW','N','$VLA_server_ip[$k]','','Originate','$queryCID','Channel: $kick_local_channel','Context: $ext_context','Exten: 8300','Priority: 1','Callerid: $queryCID','','','','$channel','$exten');";
    					if ($DB) {}
    					$rslt=mysql_to_mysqli($stmtC, $link);

    					$stmt = "INSERT INTO vicidial_user_log (user,event,campaign_id,event_date,event_epoch,user_group,extension) values('$VLA_user[$k]','LOGOUT','$VLA_campaign_id[$k]','$SQLdate','$now_date_epoch','$VAL_user_group','MGR LOGOUT: $PHP_AUTH_USER');";
    					if ($DB) {}
    					$rslt=mysql_to_mysqli($stmt, $link);
    					$stmtLOG .= "$stmt|";
    					$usersLOG .= "$VLA_user[$k]|";


    					#############################################
    					##### START QUEUEMETRICS LOGGING LOOKUP #####
    					$stmt = "SELECT enable_queuemetrics_logging,queuemetrics_server_ip,queuemetrics_dbname,queuemetrics_login,queuemetrics_pass,queuemetrics_log_id,queuemetrics_loginout,queuemetrics_addmember_enabled,queuemetrics_dispo_pause,queuemetrics_pe_phone_append,queuemetrics_pause_type FROM system_settings;";
    					$rslt=mysql_to_mysqli($stmt, $link);
    					if ($DB) {}
    					$qm_conf_ct = mysqli_num_rows($rslt);
    					if ($qm_conf_ct > 0)
    						{
    						$row=mysqli_fetch_row($rslt);
    						$enable_queuemetrics_logging =		$row[0];
    						$queuemetrics_server_ip	=			$row[1];
    						$queuemetrics_dbname =				$row[2];
    						$queuemetrics_login	=				$row[3];
    						$queuemetrics_pass =				$row[4];
    						$queuemetrics_log_id =				$row[5];
    						$queuemetrics_loginout =			$row[6];
    						$queuemetrics_addmember_enabled =	$row[7];
    						$queuemetrics_dispo_pause =			$row[8];
    						$queuemetrics_pe_phone_append =		$row[9];
    						$queuemetrics_pause_type =			$row[10];
    						}
    					##### END QUEUEMETRICS LOGGING LOOKUP #####
    					###########################################
    					if ($enable_queuemetrics_logging > 0)
    						{
    						$QM_LOGOFF = 'AGENTLOGOFF';
    						if ($queuemetrics_loginout=='CALLBACK')
    							{$QM_LOGOFF = 'AGENTCALLBACKLOGOFF';}

    						$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass","$queuemetrics_dbname");
    						if (!$linkB)
    							{
    							die('MySQL '._QXZ("connect ERROR").': ' . mysqli_connect_error());
    							}
    						$agents='@agents';
    						$agent_logged_in='';
    						$time_logged_in='0';

    						$stmtB = "SELECT agent,time_id,data1 FROM queue_log where agent='Agent/$VLA_user[$k]' and verb IN('AGENTLOGIN','AGENTCALLBACKLOGIN') and time_id > $check_time order by time_id desc limit 1;";
    						$rsltB=mysql_to_mysqli($stmtB, $linkB);
    						if ($DB) {}
    						$qml_ct = mysqli_num_rows($rsltB);
    						if ($qml_ct > 0)
    							{
    							$row=mysqli_fetch_row($rsltB);
    							$agent_logged_in =		$row[0];
    							$time_logged_in =		$row[1];
    							$RAWtime_logged_in =	$row[1];
    							$phone_logged_in =		$row[2];
    							}

    						$time_logged_in = ($now_date_epoch - $time_logged_in);
    						if ($time_logged_in > 1000000) {$time_logged_in=1;}

    						if ($queuemetrics_loginout == 'NONE')
    							{
    							$pause_typeSQL='';
    							if ($queuemetrics_pause_type > 0)
    								{$pause_typeSQL=",data5='ADMIN'";}
    							$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$now_date_epoch',call_id='NONE',queue='NONE',agent='Agent/$VLA_user[$k]',verb='PAUSEREASON',serverid='$queuemetrics_log_id',data1='LOGOFF'$pause_typeSQL;";
    							if ($DB) {}
    							$rslt=mysql_to_mysqli($stmt, $linkB);
    							$affected_rows = mysqli_affected_rows($linkB);
    							}

    						if ($queuemetrics_addmember_enabled > 0)
    							{
    							$queuemetrics_phone_environment='';
    							$stmt = "SELECT queuemetrics_phone_environment FROM vicidial_campaigns where campaign_id='$VLA_campaign_id[$k]' $LOGallowed_campaignsSQL;";
    							$rslt=mysql_to_mysqli($stmt, $link);
    							if ($DB) {}
    							$cqpe_ct = mysqli_num_rows($rslt);
    							if ($cqpe_ct > 0)
    								{
    								$row=mysqli_fetch_row($rslt);
    								$queuemetrics_phone_environment =	$row[0];
    								}

    							if ( ($time_logged_in < 1) or ($queuemetrics_loginout == 'NONE') )
    								{
    								$stmtB = "SELECT agent,time_id,data3 FROM queue_log where agent='Agent/$VLA_user[$k]' and verb='PAUSEREASON' and data1='LOGIN' order by time_id desc limit 1;";
    								$rsltB=mysql_to_mysqli($stmtB, $linkB);
    								if ($DB) {}
    								$qml_ct = mysqli_num_rows($rsltB);
    								if ($qml_ct > 0)
    									{
    									$row=mysqli_fetch_row($rsltB);
    									$agent_logged_in =		$row[0];
    									$time_logged_in =		$row[1];
    									$RAWtime_logged_in =	$row[1];
    									$phone_logged_in =		$row[2];
    									}
    								$time_logged_in = ($now_date_epoch - $time_logged_in);
    								if ($time_logged_in > 1000000) {$time_logged_in=1;}
    								}
    							$stmt = "SELECT distinct queue FROM queue_log where time_id >= $RAWtime_logged_in and agent='$agent_logged_in' and verb IN('ADDMEMBER','ADDMEMBER2')  and queue != '$VLA_campaign_id[$k]' order by time_id desc;";
    							$rslt=mysql_to_mysqli($stmt, $linkB);
    							if ($DB) {}
    							$amq_conf_ct = mysqli_num_rows($rslt);
    							$i=0;
    							while ($i < $amq_conf_ct)
    								{
    								$row=mysqli_fetch_row($rslt);
    								$AMqueue[$i] =	$row[0];
    								$i++;
    								}

    							### add the logged-in campaign as well
    							$AMqueue[$i] = $VLA_campaign_id[$k];
    							$i++;
    							$amq_conf_ct++;

    							$i=0;
    							while ($i < $amq_conf_ct)
    								{
    								$pe_append='';
    								if ( ($queuemetrics_pe_phone_append > 0) and (strlen($queuemetrics_phone_environment)>0) )
    									{
    									$qm_extension = explode('/',$phone_logged_in);
    									$pe_append = "-$qm_extension[1]";
    									}
    								$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$now_date_epoch',call_id='NONE',queue='$AMqueue[$i]',agent='$agent_logged_in',verb='REMOVEMEMBER',data1='$phone_logged_in',serverid='$queuemetrics_log_id',data4='$queuemetrics_phone_environment$pe_append';";
    								$rslt=mysql_to_mysqli($stmt, $linkB);
    								$affected_rows = mysqli_affected_rows($linkB);
    								$i++;
    								}
    							}

    						if ($queuemetrics_loginout != 'NONE')
    							{
    							$stmtB = "INSERT INTO queue_log SET `partition`='P01',time_id='$now_date_epoch',call_id='NONE',queue='NONE',agent='$agent_logged_in',verb='$QM_LOGOFF',serverid='$queuemetrics_log_id',data1='$phone_logged_in',data2='$time_logged_in';";
    							if ($DB) {}
    							$rsltB=mysql_to_mysqli($stmtB, $linkB);
    							}
    						}

    					$message = "$VLA_user[$k] has been emergency logged out, make sure they close their web browser. ";

    					$k++;
    					}

    				### LOG INSERTION Admin Log Table ###
    				$SQL_log = "$stmtLOG";
    				$SQL_log = preg_replace('/;/', '', $SQL_log);
    				$SQL_log = addslashes($SQL_log);
    				$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='LOGOUT', record_id='$campaign_id', event_code='ADMIN LOGOUT CAMPAIGN AGENTS', event_sql=\"$SQL_log\", event_notes='Users logged out: $usersLOG';";
    				if ($DB) {}
    				$rslt=mysql_to_mysqli($stmt, $link);

    				$message .= "AGENT LOGOUT COMPLETED: ". $campaign_id;
    				}
    			}
          echo json_encode(results('success', $message, NULL));
    		}
    	else
    		{
    		$message = "You do not have permission to view this page";
        echo json_encode(results('error', $message, NULL));
      }
      exit;
} elseif ($_GET['action'] == 'GetUser') {
        $data = $database->select('vicidial_users', ['user', 'full_name', 'user_group']);
        foreach ($data as $key => $val) {
            $data[$key]['user_group'] = '<select class="form-control"><option value="">Select <Option value="ADMIN">ADMIN</option><Option value="CogentHub">CogentHub</option><Option value="admin5">admin5</option><Option value="admin6">admin6</option></select>';
            $data[$key]['Enabled'] = '<button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="1002" value="1">
						<div class="handle"></div>
                                  </button>';
            $data[$key]['Status'] = '<span class="badge badge-pill badge-primary">Status</span>';
            $data[$key]['Campaign'] = '<span type="button" class="btn btn-success" onclick="myFunction()">Success</span>';
            $data[$key]['Logged'] = '<span class="badge badge-danger">logged off</span>';
            $data[$key]['Action'] = '<a type="button" class="btn btn-app btn-success"><i class="fa fa-arrow-right" title="Manage"></i></a><a type="button" class="btn btn-app btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a><a type="button" class="btn btn-app btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval($totalRow),
            "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
//         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'GETUSER','$User', 'GETUSER - ROLE',$database->last(),'Role GETUSER','--All--');

    } elseif ($_GET['action'] == 'GetEmail') {
        $data = $DBEmail->select('templates', ['id', 'name', 'description', 'active']);
        foreach ($data as $key => $val) {
//            $data[$key]['ID'] = '<select class="form-control"><option value="">Select <Option value="ID">ID</option></select>';
//            $data[$key]['Name'] = '<select class="form-control"><option value="">Select <Option value="Name">Name</option></select>';
//            $data[$key]['description'] = '<select class="form-control"><option value="">Select <Option value="description">description</option></select>';
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="1002" value="1">
						<div class="handle"></div>
                                  </button>';
            $data[$key]['Action'] = '<a type="button" class="btn btn-app btn-success"><i class="fa fa-edit" title="Manage"></i></a><a type="button" class="btn btn-app btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval($totalRow),
            "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
//         admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'GETEMAIL','$User', 'GETEMAIL - ROLE',$DBEmail->last(),'Role GETEMAIL','--All--');


    } elseif ($_GET['action'] == 'GetRoutine') {
        $data = $DBEmail->select('routines', ['id', 'name', 'description', 'active', 'start_time', 'end_time', 'start_date', 'end_date', 'routine_type']);
        foreach ($data as $key => $val) {
//            $data[$key]['ID'] = '<select class="form-control"><option value="">Select <Option value="ID">ID</option></select>';
//            $data[$key]['Name'] = '<select class="form-control"><option value="">Select <Option value="Name">Name</option></select>';
//            $data[$key]['description'] = '<select class="form-control"><option value="">Select <Option value="description">description</option></select>';
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="1002" value="1">
						<div class="handle"></div>
                                  </button>';
            $data[$key]['action'] = '<a type="button" class="btn btn-app btn-success"><i class="fa fa-edit" title="Manage"></i></a><a type="button" class="btn btn-app btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
            $data[$key]['Queued'] = '';
            $data[$key]['SentToday'] = '';
            $data[$key]['SentTotal'] = '';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval($totalRow),
            "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
//          admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'GETROUTINE','', 'GETROUTINE - ROLE',$DBEmail->last(),'Role GETROUTINE','--All--');

    } elseif ($_GET['action'] == 'GetEmailQueue') {
        $data = $DBEmail->select('client_queue', ['id', 'routine', 'type', 'customer_name', 'email', 'lead_id']);
        foreach ($data as $key => $val) {

            $data[$key]['Action'] = '<a type="button" class="btn btn-app btn-success"><i class="fa fa-edit" title="Edit"></i></a><a type="button" class="btn btn-app btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
//            $data[$key]['Queued'] = '';
//            $data[$key]['SentToday'] = '';
//            $data[$key]['SentTotal'] = '';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval($totalRow),
            "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
//        admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'EMAILQUEUE','', 'EMAILQUEUE - ROLE',$DBEmail->last(),'Role EMAILQUEUE','--All--');

    } elseif ($_GET['action'] == 'GetManagerQueue') {
        $data = $DBEmail->select('manager_queue', ['id', 'routine', 'type', 'customer_name', 'email', 'lead_id']);
        foreach ($data as $key => $val) {

            $data[$key]['Action'] = '<a type="button" class="btn btn-app btn-success"><i class="fa fa-arrow-right" title="Edit"></i></a><a type="button" class="btn btn-app btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a><a type="button" class="btn btn-app btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval($totalRow),
            "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
    }elseif($_GET['action'] == 'AllAudioFile'){
        $result = '';
        if ($handle = opendir('/srv/www/htdocs/' . $SS_SoundsWebDirectory . '/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                     $selected =  ($_POST['AlreadyMusicFileSelected'] == $entry) ? 'selected' : '';
                    $result .= '<option value="'.$entry.'" '.$selected.'>'.$entry.'</option>';
                }
            }
            closedir($handle);
        }
        $resultResponse = response(1,0, '', $result);

    }elseif($_GET['action'] == 'SurveyUpdate'){
        $ColumnName = $_POST['ColumnName'];
        $ColumnID = $_POST['ColumnID'];
        $ColumnValue = $_POST['ColumnValue'];

        $data = $database->update('vicidial_campaigns',[$ColumnName=>$ColumnValue],['campaign_id'=>$ColumnID]);
        if(!empty($data->rowCount())){
            $resultResponse = response(1, 0, 'Successfully Udpdated!!', NULL);
        }else{
            $resultResponse = response(0, 1, 'Nothing updated!!',NULL);
        }

    }elseif($_GET['action'] == 'deleteCampaign'){
        $id = $_GET['id'];
        $data = $database->delete('vicidial_campaigns',['campaign_id'=>$id]);
        if(!empty($data->rowCount())){
            $resultResponse = response(1, 0, 'Successfully deleted!!', NULL);
        }else{
            $resultResponse = response(0, 1, 'Nothing updated!!',NULL);
        }
    }
//      admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'MANAGEQUEUE','', 'MANAGEQUEUE - ROLE',$DBEmail->last(),'Role MANAGEQUEUE','--All--');

    echo json_encode($resultResponse);
}



//if(!empty($_GET['case']) && in_array($_GET['case'],$case)){
//    if($_GET['case'] == 'hopper-getRuleDetails'){
//        $row = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['listId']]);
//            if (!empty($row)) {
//                $array = ['list_id' => $row['list_id'],
//                    'list_name' => $row['list_name'],
//                    'status' => $row['active'],
//                    'query' => $row['sql'],
//                    'datapool' => $row['list_json'],
//                    'campaign_id' => $row['campaign'],
//                    'percentage' => $row['percentage'],
//                    'drop_in' => $row['drop_in'],
//                    'drop_out' => $row['drop_out'],
//                    'expiry_date' => $row['expiry_date'],
//                    'queue_priority' => $row['queue_priority']
//                ];
////                echo json_encode(array("status" => 'success', 'data' => $array));
//                $resultResponse = response(1, 0, 'Successfully Submitted!!', $array);
//            } else {
//                $resultResponse = response(0, 1, 'Rule does not exist!!', NULL);
//            }
//            echo jsone_encode($resultResponse);
//    }
//}
exit;
