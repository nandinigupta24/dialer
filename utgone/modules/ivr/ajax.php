<?php
$result = [];
if ($_GET['action'] == 'GetIVR') {
    if (!checkRole('inbound_groups', 'view')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $data = $database->select('vicidial_call_menu', ['menu_id', 'menu_name', 'menu_prompt', 'menu_timeout']);
    }else{
        $data = $database->select('vicidial_call_menu', ['menu_id', 'menu_name', 'menu_prompt', 'menu_timeout'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
    }
    
    foreach ($data as $key => $val) {
        $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white" href="' . base_url('inbound_groups/ivr_edit') . '?menu_id=' . $val['menu_id'] . '"><i class="fa fa-arrow-right" title="Manage"></i></a>';
        if(checkRole('inbound_groups', 'delete')) {
            $data[$key]['Action'] .= '<a class="btn btn-app btn-danger RemoveIvr text-white" data-id=' . $val['menu_id'] . '><i class="fa fa-times" title="Remove"></i></a>';
        }
    }
    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
}elseif ($_GET['action'] == 'Remove') {
    if (!checkRole('inbound_groups', 'delete')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $menu_id = $_POST['ivrID'];
    $result = $database->delete('vicidial_call_menu', ['menu_id' => $menu_id]);
    if ($result->rowCount() > 0) {
        $resultResponse = response(1, 0, 'Your list has been successfully deleted!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Oops!! No Updated!!', NULL);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'IVR', 'DELETE',$menu_id, 'DELETE-IVR', $database->last(), 'DELETE IVR', '--All--');
} elseif($_GET['action'] == 'SaveIVROption'){
   $MenuID = $_POST['menu_id'];
   $OptionValue = $_POST['option_value'];
   $optionDescription =  $_POST['option_description'];
   $optionRoute = $_POST['option_route'];
   $status = $_POST['status'];
   
   $countExist = $database->count('vicidial_call_menu_options',['AND'=>['menu_id'=>$MenuID,'option_value'=>$OptionValue]]);
  
   
   if(!empty($countExist) && $countExist >= 0){
       $ArrayUpdate = [];
       $ArrayUpdate['option_description'] = $optionDescription;
       $ArrayUpdate['option_route'] = $optionRoute;
       $ArrayUpdate['status'] = $status;
       switch($optionRoute){
           case 'CALLMENU':
               $Option_route_value = $_POST['CALLMENU_value'];
               break;
           case 'INGROUP':
               $Option_route_value = $_POST['INGROUP_value'];
               $ArrayUpdate['Option_route_value'] = $_POST['INGROUP_Lead'].',,'.$_POST['INGROUP_Lead_list'].','.$_POST['INGROUP_Lead_campaign'].',,,,,';
               break;
           case 'DID':
               $Option_route_value = $_POST['DID_value'];
               break;
           case 'HANGUP':
               $Option_route_value = $_POST['HANGUP_value'];
               break;
           case 'PHONE':
               $Option_route_value = $_POST['PHONE_value'];
               break;
           case 'VOICEMAIL':
               $Option_route_value = $_POST['VOICEMAIL_value'];
               break;
           default:
               
       }
       $ArrayUpdate['Option_route_value'] = $Option_route_value;
       
       $dataUpdate = $database->update('vicidial_call_menu_options',$ArrayUpdate,['AND'=>['menu_id'=>$MenuID,'option_value'=>$OptionValue]]);
       
       if($dataUpdate->rowCount() > 0){
           $resultResponse = response(1, 0, 'Your Call menu has been successfully updated!!', NULL);
       }
   }else{
       $ArrayUpdate = [];
       $ArrayUpdate['menu_id'] = $MenuID;
       $ArrayUpdate['option_value'] = $OptionValue;
       $ArrayUpdate['option_description'] = $optionDescription;
       $ArrayUpdate['option_route'] = $optionRoute;
       $ArrayUpdate['status'] = $status;
       switch($optionRoute){
           case 'CALLMENU':
               $Option_route_value = $_POST['CALLMENU_value'];
               break;
           case 'INGROUP':
               $Option_route_value = $_POST['INGROUP_value'];
               
               $ArrayUpdate['Option_route_value'] = $_POST['INGROUP_Lead'].',,'.$_POST['INGROUP_Lead_list'].','.$_POST['INGROUP_Lead_campaign'].',,,,,';
               break;
           case 'DID':
               $Option_route_value = $_POST['DID_value'];
               break;
           case 'HANGUP':
               $Option_route_value = $_POST['HANGUP_value'];
               break;
           case 'PHONE':
               $Option_route_value = $_POST['PHONE_value'];
               break;
           case 'VOICEMAIL':
               $Option_route_value = $_POST['VOICEMAIL_value'];
               break;
           default:
               
       }
       $ArrayUpdate['Option_route_value'] = $Option_route_value;
       
       $dataSave = $database->insert('vicidial_call_menu_options',$ArrayUpdate);
       if($dataSave->rowCount() > 0){
           $resultResponse = response(1, 0, 'Your Call menu has been successfully created!!', NULL);
       }
   }
   
}elseif($_GET['action'] == 'SaveIVR'){
    
    $MenuID = $_POST['menu_id'];
    $MenuName = $_POST['menu_name'];
    $MenuTimeout = $_POST['menu_timeout'];
    $MenuRepeat = $_POST['menu_repeat'];
    $MenuTimeCheck = $_POST['menu_time_check'];
    $MenuCallTimeID = $_POST['call_time_id'];
    $MenuPrompt = $_POST['menu_prompt'];
    $MenuTimeoutPrompt = $_POST['menu_timeout_prompt'];
    $MenuInvalidPrompt = $_POST['menu_invalid_prompt'];
    
    $arrayUpdate = [];
    $arrayUpdate['menu_name'] = $MenuName;
    $arrayUpdate['menu_timeout'] = $MenuTimeout;
    $arrayUpdate['menu_repeat'] = $MenuRepeat;
    $arrayUpdate['menu_time_check'] = $MenuTimeCheck;
    $arrayUpdate['call_time_id'] = $MenuCallTimeID;
    $arrayUpdate['menu_prompt'] = $MenuPrompt;
    $arrayUpdate['menu_timeout_prompt'] = $MenuTimeoutPrompt;
    $arrayUpdate['menu_invalid_prompt'] = $MenuInvalidPrompt;
    
    $dataUpdate = $database->update('vicidial_call_menu',$arrayUpdate,['menu_id'=>$MenuID]);
    if(!empty($dataUpdate->rowCount()) && $dataUpdate->rowCount() > 0){
        $resultResponse = response(1, 0, 'Call menu has been successfully Updated!!', NULL);
    }else{
        $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
    }
}elseif($_GET['action'] == 'AudioUpload'){
    $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));

      $extensions= array("jpeg","jpg","mp3");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
          $arrayInsert = [];
          $arrayInsert['audio_filename'] = $_POST['audio_name'].'.'.$file_ext;
          $arrayInsert['audio_format'] = $file_ext;
          $arrayInsert['audio_filesize'] = $file_size;
          $arrayInsert['audio_epoch'] = strtotime("now");
//          $arrayInsert['audio_length'] = $_POST['audio_name'];
          $database->insert('audio_store_details',$arrayInsert);
          move_uploaded_file($file_tmp,"/srv/www/htdocs/".$SS_SoundsWebDirectory."/".$_POST['audio_name'].".".$file_ext);
          $resultResponse = response(1,0,'File has been successfully updated!!!',NULL);
      }else{
          $resultResponse = response(0,1,'This user does not exist!!',NULL);
      }
}
admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'GETIVR', '', 'GETIVR - ROLE', $database->last(), 'Role GETIVR', '--All--');

echo json_encode($resultResponse);
