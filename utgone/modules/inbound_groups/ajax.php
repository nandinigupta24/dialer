<?php

$result = [];

if ($_GET['action'] == 'GetInboundNumber') {
    if (!checkRole('inbound_groups', 'view')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
     if($_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
         $data = $database->select('vicidial_inbound_dids', ['did_id', 'did_pattern', 'did_description', 'record_call', 'did_active'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
//         $data = $database->select('vicidial_inbound_dids', ['did_id', 'did_pattern', 'did_description', 'record_call', 'did_active'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                    }else{
                         $data = $database->select('vicidial_inbound_dids', ['did_id', 'did_pattern', 'did_description', 'record_call', 'did_active']);
                    }

    foreach ($data as $key => $val) {
//            $data[$key]['ID'] = '<select class="form-control"><option value="">Select <Option value="ID">ID</option></select>';
//            $data[$key]['Name'] = '<select class="form-control"><option value="">Select <Option value="Name">Name</option></select>';
//
//
//             $data[$key]['status'] = '<input type="text" class="form-control" value="'.$val['status'].'"/>';
        if ($val['record_call'] == 'Y') {
            $RecordCall = 'active';
        } else {
            $RecordCall = '';
        }
        if ($val['did_active'] == 'Y') {
            $didactive = 'active';
        } else {
            $didactive = '';
        }
        $data[$key]['record_call'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['did_id'] . '" data-field="record_call" value="1">
					<div class="handle"></div>
                                  </button>';
        $data[$key]['did_active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $didactive . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['did_id'] . '"  data-field="did_active" value="1">
					<div class="handle"></div>
                                  </button>';

        $action = '';
        if (checkRole('inbound_groups', 'edit')) {
            $action .= '<a href="' . base_url('inbound_groups/edit') . '?did=' . $val['did_id'] . '" class="btn text-white btn-app btn-success"><i class="fa fa-arrow-right" title="Manage"></i></a>';
        }
        if (checkRole('inbound_groups', 'delete')) {
            $action .= '<a data-id="' . $val['did_id'] . '" class="btn btn-app btn-danger Remove text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $data[$key]['Action'] = $action;
//            $data[$key]['Queued'] = '';
//            $data[$key]['SentToday'] = '';
//            $data[$key]['SentTotal'] = '';
        $resultResponse = response(1, 0, 'Rule Sucessfully Created', null);
    }
    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal" => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INNUMBERS', 'LOAD', '', 'LOAD-INNUMBERS', $database->last(), 'LOAD INNUMBERS', '--All--');
} elseif ($_GET['action'] == 'Insert') {
    if (!checkRole('inbound_groups', 'create')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $InboundNumber = $_POST['inbound_number'];
    $InboundDescription = $_POST['inbound_description'];
    $UserGroup = $_POST['user_group'];

    $resultCount = $database->count('vicidial_inbound_dids',['did_pattern'=>$InboundNumber]);
    if(!empty($resultCount) && count($resultCount) > 0){
         $resultResponse = response(0,1, 'This number already exist!!', null);
    }else{
        $data = $database->insert('vicidial_inbound_dids', ['did_pattern' => $InboundNumber, 'did_description' => $InboundDescription,'user_group'=>$UserGroup]);
        $ColumnID = $database->id();
        $responseData = [];
        $responseData['ColumnID'] = $ColumnID;
        $responseData['ColumnName'] = $InboundNumber;
        $responseData['ColumnDescription'] = $InboundDescription;
        $resultResponse = response(1, 0, 'Sucessfully Created!!', $responseData);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'ADD', '', 'ADD - ROLE', $database->last(), 'Role ADD', '--All--');
} elseif ($_GET['action'] == 'Copy') {
    if (!checkRole('inbound_groups', 'create')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $InboundNumber = $_POST['inbound_number'];
    $InboundDescription = $_POST['inbound_description'];
    $did_id = $_POST['did_id'];

    $resultCount = $database->count('vicidial_inbound_dids',['did_pattern'=>$InboundNumber]);

    $data = $database->select('vicidial_inbound_dids', ['did_pattern', 'did_description','did_active','did_route',
    'extension','exten_context',
    'voicemail_ext','phone','server_ip','user','user_unavailable_action','user_route_settings_ingroup',
    'group_id','call_handle_method','agent_search_method','list_id','campaign_id','phone_code','menu_id',
    'record_call','filter_inbound_number','filter_phone_group_id','filter_url','filter_action',
    'filter_extension','filter_exten_context','filter_voicemail_ext','filter_phone','filter_server_ip',
    'filter_user','filter_user_unavailable_action','filter_user_route_settings_ingroup','filter_group_id',
    'filter_call_handle_method','filter_agent_search_method','filter_list_id','filter_campaign_id',
    'filter_phone_code','filter_menu_id','filter_clean_cid_number','custom_one','custom_two','custom_three',
    'custom_four',
    'custom_five','user_group','filter_dnc_campaign','filter_url_did_redirect','no_agent_ingroup_redirect',
    'no_agent_ingroup_id','no_agent_ingroup_extension','pre_filter_phone_group_id','pre_filter_extension',
    'entry_list_id','filter_entry_list_id','max_queue_ingroup_calls','max_queue_ingroup_id','max_queue_ingroup_extension',
    'did_carrier_description'],['did_id'=>$did_id]);

    if(!empty($resultCount) && count($resultCount) > 0){
         $resultResponse = response(0,1, 'This number already exist!!', null);
    }else{
      foreach ($data as $key => $val) {
        $data = $database->insert('vicidial_inbound_dids', ['did_pattern' => $InboundNumber, 'did_description' => $InboundDescription,'did_active'=>$val['did_active'],
      'did_route'=>$val['did_route'], 'extension'=>$val['extension'], 'exten_context'=>$val['exten_context'], 'voicemail_ext'=>$val['voicemail_ext']
    ,'phone'=>$val['phone'],'server_ip'=>$val['server_ip'],'user'=>$val['user'],'user_unavailable_action'=>$val['user_unavailable_action']
  ,'user_route_settings_ingroup'=>$val['user_route_settings_ingroup'],'group_id'=>$val['group_id'],'call_handle_method'=>$val['call_handle_method'],'list_id'=>$val['list_id'],'campaign_id'=>$val['campaign_id']
,'phone_code'=>$val['phone_code'],'menu_id'=>$val['menu_id'],'record_call'=>$val['record_call'],'filter_inbound_number'=>$val['filter_inbound_number']
,'filter_phone_group_id'=>$val['filter_phone_group_id'],'filter_url'=>$val['filter_url'],'filter_action'=>$val['filter_action'],'filter_extension'=>$val['filter_extension']
,'filter_exten_context'=>$val['filter_exten_context'],'filter_voicemail_ext'=>$val['filter_voicemail_ext'],'filter_phone'=>$val['filter_phone'],'filter_phone'=>$val['filter_phone']
,'filter_server_ip'=>$val['filter_server_ip'],'filter_user'=>$val['filter_user'],'filter_user_unavailable_action'=>$val['filter_user_unavailable_action']
,'filter_user_route_settings_ingroup'=>$val['filter_user_route_settings_ingroup'],'filter_group_id'=>$val['filter_group_id'],'filter_call_handle_method'=>$val['filter_call_handle_method']
,'filter_agent_search_method'=>$val['filter_agent_search_method'],'filter_list_id'=>$val['filter_list_id'],'filter_campaign_id'=>$val['filter_campaign_id']
,'filter_phone_code'=>$val['filter_phone_code'],'filter_menu_id'=>$val['filter_menu_id'],'filter_clean_cid_number'=>$val['filter_clean_cid_number'],'custom_one'=>$val['custom_one']
,'custom_two'=>$val['custom_two'],'custom_three'=>$val['custom_three'],'custom_four'=>$val['custom_four'],'custom_five'=>$val['custom_five'],'custom_five'=>$val['custom_five']
,'user_group'=>$val['user_group'],'filter_dnc_campaign'=>$val['filter_dnc_campaign'],'filter_url_did_redirect'=>$val['filter_url_did_redirect']
,'no_agent_ingroup_redirect'=>$val['no_agent_ingroup_redirect'],'no_agent_ingroup_id'=>$val['no_agent_ingroup_id'],'no_agent_ingroup_extension'=>$val['no_agent_ingroup_extension']
,'no_agent_ingroup_extension'=>$val['no_agent_ingroup_extension'],'pre_filter_phone_group_id'=>$val['pre_filter_phone_group_id'],'pre_filter_extension'=>$val['pre_filter_extension']
,'entry_list_id'=>$val['entry_list_id'],'filter_entry_list_id'=>$val['filter_entry_list_id'],'max_queue_ingroup_calls'=>$val['max_queue_ingroup_calls']
,'max_queue_ingroup_id'=>$val['max_queue_ingroup_id'],'max_queue_ingroup_extension'=>$val['max_queue_ingroup_extension'],'did_carrier_description'=>$val['did_carrier_description']]);
      }
        $ColumnID = $database->id();
        $responseData = [];
        $responseData['ColumnID'] = $ColumnID;
        $responseData['ColumnName'] = $InboundNumber;
        $responseData['ColumnDescription'] = $InboundDescription;
        $resultResponse = response(1, 0, 'Sucessfully Created!!', $responseData);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'ADD', '', 'ADD - ROLE', $database->last(), 'Role ADD', '--All--');
} elseif ($_GET['action'] == 'Update') {
    if (!checkRole('inbound_groups', 'edit')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $InboundNumber = $_POST['DID'];
    $InboundDescription = $_POST['Record'];
    $value = $_POST['Value'];
    $data = $database->update('vicidial_inbound_dids', [$InboundDescription => $value], ['did_id' => $InboundNumber]);
    $resultResponse = response(1, 0, 'Sucessfully Update', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INNUMBERS','MODIFY',$InboundNumber, 'MODIFY-INNUMBERS-'.$InboundDescription, $database->last(), 'MODIFY INNUMBERS DETAILS', '--All--');
} elseif ($_GET['action'] == 'Insertgroup') {
    if (!checkRole('inbound_groups', 'create')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }

    $InboundId = $_POST['group_id'];
    $InboundGroupName = $_POST['group_name'];
    $InboundUserGroup = $_POST['user_group'];
    $GroupColor = $_POST['group_color'];
    $GroupHandling = $_POST['group_handling'];
    $Active = $_POST['active'];
    if(!empty($_POST['copy_copy_clone'])){
        $InsertArray = $database->get('vicidial_inbound_groups','*',['group_id'=>$_POST['copy_copy_clone']]);
        unset($InsertArray['group_id']);
        unset($InsertArray['group_name']);
        unset($InsertArray['user_group']);
        unset($InsertArray['group_color']);
        unset($InsertArray['active']);
        $InsertArray['group_id'] = $InboundId;
        $InsertArray['group_name'] = $InboundGroupName;
        $InsertArray['user_group'] = $InboundUserGroup;
        $InsertArray['group_color'] = $GroupColor;
        $InsertArray['active'] = $Active;
        $data = $database->insert('vicidial_inbound_groups', $InsertArray);

    }else{
        $resultCount = $database->count('vicidial_inbound_groups',['group_id' => $InboundId]);
        if(!empty($resultCount) && count($resultCount) > 0){
            $resultResponse = response(0,1,'This ID already exist!!',NULL);
        }else{

        $data = $database->insert('vicidial_inbound_groups', ['group_id' => $InboundId, 'group_name' => $InboundGroupName,'user_group'=>$InboundUserGroup,'group_color'=>$GroupColor,'active'=>$Active,'group_handling'=>$GroupHandling]);
        $responseData = [];
        $responseData['ColumnID'] = $InboundId;
        $responseData['ColumnName'] = $InboundGroupName;
        $resultResponse = response(1,0,'Successfully Created!!',$responseData);
        }
    }

//    $resultResponse = response(1, 0, 'Successfully Created!!', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'ADD',$InboundId, 'ADD_INGROUPS', $database->last(), 'ADD INGROUPS', '--All--');

} elseif ($_GET['action'] == 'Remove') {
    if (!checkRole('inbound_groups', 'delete')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $InboundId = $_POST['id'];
    $result = $database->delete('vicidial_inbound_dids', ['did_id' => $InboundId]);
    if ($result->rowCount() > 0) {
        $resultResponse = response(1, 0, 'Your list has been successfully deleted!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Oops!! No Updated!!', NULL);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INNUMBERS', 'DELETE',$InboundId, 'DELETE-INNUMBERS', $database->last(), 'DELETE INNUMBERS', '--All--');
} elseif ($_GET['action'] == 'UpdateDetail') {
    if (!checkRole('inbound_groups', 'edit')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $FieldID = $_POST['FieldID'];
    $FieldColumn = $_POST['FieldColumn'];
    $FieldValue = $_POST['FieldValue'];
    if ($FieldColumn == 'list_id') {
        $ListExist = $database->count('vicidial_lists', ['list_id' => $FieldValue]);
        if ($ListExist == 0) {
            $DIDGroup = $database->get('vicidial_inbound_dids', ['group_id', 'campaign_id'], ['did_id' => $FieldID]);

            $database->insert('vicidial_lists', ['list_id' => $FieldValue, 'list_name' => $DIDGroup['group_id'], 'list_description' => $DIDGroup['group_id'], 'active' => 'Y']);
        }
    }
    if($FieldColumn== 'group_id'){
         $result = $database->update('vicidial_inbound_dids', [$FieldColumn => $FieldValue,'user_route_settings_ingroup'=>$FieldValue], ['did_id' => $FieldID]);
    }else{
        $result = $database->update('vicidial_inbound_dids', [$FieldColumn => $FieldValue], ['did_id' => $FieldID]);
    }

    if ($result->rowCount() > 0) {
        $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Oops!! No Updated!!', NULL);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INNUMBERS', 'MODIFY',$FieldID, 'MODIFY-INNUMBERS-'.$FieldColumn, $database->last(), 'MODIFY INNUMBERS', '--All--');
}elseif($_GET['action'] == 'CloneInboundGroup'){
    if (!checkRole('inbound_groups', 'delete')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }

    $InboundId = $_POST['group_id'];
    $InboundGroupName = $_POST['group_name'];
//    $InboundUserGroup = $_POST['user_group'];
    $GroupColor = $_POST['group_color'];
    $Active = $_POST['active'];
    if(!empty($_POST['copy_clone'])){
        $InsertArray = $database->get('vicidial_inbound_groups','*',['group_id'=>$_POST['copy_clone']]);
        unset($InsertArray['group_id']);
        unset($InsertArray['group_name']);
        unset($InsertArray['user_group']);
        unset($InsertArray['group_color']);
        unset($InsertArray['active']);
        $InsertArray['group_id'] = $InboundId;
        $InsertArray['group_name'] = $InboundGroupName;
//        $InsertArray['user_group'] = $InboundUserGroup;
        $InsertArray['group_color'] = $GroupColor;
        $InsertArray['active'] = $Active;
        $data = $database->insert('vicidial_inbound_groups', $InsertArray);
        $responseData = [];
        $responseData['ColumnID'] = $InboundId;
        $responseData['ColumnName'] = $InboundGroupName;
        $resultResponse = response(1,0,'Successfully Copied!!',$responseData);
    }

//    $resultResponse = response(1, 0, 'Sucessfully Copied!!', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'COPY',$_POST['copy_clone'], 'COPY-INGROUPS', $database->last(), 'COPY INGROUPS', '--All--');
}elseif($_GET['action'] == 'InsertIVR'){
    $MenuID = $_POST['menu_id'];
    $MenuName = $_POST['menu_name'];
    $UserGroup = $_POST['user_group'];
    $CountValue = $database->count('vicidial_call_menu',['menu_id'=>$MenuID]);
    if(!empty($CountValue) && $CountValue > 0){
        $resultResponse = response(0,1,'This IVR already exist!!',NULL);
    }else{
    $InsertArray = [];
    $InsertArray['menu_id'] = $MenuID;
    $InsertArray['menu_name'] = $MenuName;
    $InsertArray['user_group'] = $UserGroup;

    $database->insert('vicidial_call_menu',$InsertArray);

     $responseData = [];
     $responseData['ColumnID'] = $MenuID;
     $responseData['ColumnName'] = $MenuName;
     $resultResponse = response(1,0,'Successfully Created!!',$responseData);
    }

}
//admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'UPDATEDETAIL', '$FieldID', 'UPDATEDETAIL - ROLE', $database->last(), 'Role UPDATEDETAIL', '--All--');

echo json_encode($resultResponse);
