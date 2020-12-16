<?php

$arrayRule = ['Remove', 'SendMessage', 'update', 'AgentSelection','add','StatusUpdate'];
$table = 'vicidial_user_groups';
if (!empty($_GET['rule']) && in_array($_GET['rule'], $arrayRule)) {
    if ($_GET['rule'] == 'Remove') {
        $data = $database->delete($table, ['user_group' => $_POST['Group']]);
        $Updated = $data->rowCount();
        if (!empty($Updated) && count($Updated) > 0) {
            $response = response(1, 0, 'Team has been successfully deleted!!', NULL);
        } else {
            $response = response(0, 1, 'Something gonna wrong!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERGROUPS', 'DELETE', $_POST['Group'], 'DELETE-USERGROUPS', $database->last(), 'DELETE USERGROUPS', '--All--');
    } elseif ($_GET['rule'] == 'SendMessage') {
        $UserID = $_POST['UserID'];
        $message = $_POST['message'];
        $database->insert('chat_internal', ['user_group' => $UserID, 'message' => $message, 'status' => 'N', 'created_at' => date('Y-m-d H:i:s'), 'sender_id' => $_SESSION['CurrentLogin']['user_id']]);
        if ($database->id()) {
            $response = response(1, 0, 'Successfully Sent Message', $database->id());
        } else {
            $response = response(0, 1, 'Something gonna wrong!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERGROUPS', 'ADD', $UserID, 'ADD-USERGROUPS-MESSAGE', $database->last(), 'ADD USERGROUPS MESSAGE', '--All--');
    } elseif ($_GET['rule'] == 'update') {
        $UserGroup = $_POST['user_group'];
        $GroupName = $_POST['group_name'];
        $AllowedCampaign = $_POST['allowed_campaigns'];
        $EmailAddress = $_POST['email_address'];
        $LicensingID = $_POST['licensing'];
        $status = $_POST['status'];
        $ChatID = $_POST['chat_ID'];
        $agent_status_viewable_groups = $_POST['agent_status_viewable_groups'];
        $agent_status_viewable_groups = implode(' ',$agent_status_viewable_groups);

        $arrayUpdate = [];
        $arrayUpdate['group_name'] = $GroupName;
        $arrayUpdate['allowed_campaigns'] = " ".trim(implode(' ',$AllowedCampaign)).' -';
        $arrayUpdate['status'] = $status;
        $arrayUpdate['agent_status_viewable_groups'] = $agent_status_viewable_groups;
        $arrayUpdate['chat_ID'] = $ChatID;

        $EmailAddressExist = $DBUTG->get('team_email_addresses','email_address',['user_group'=>$UserGroup]);
        if(!empty($EmailAddressExist)){
            if($EmailAddressExist != $EmailAddress){
                $DBUTG->update('team_email_addresses',['email_address'=>$EmailAddress,'updated_at'=>date('Y-m-d H:i:s')],['user_group'=>$UserGroup]);
            }
        }else{
             $DBUTG->insert('team_email_addresses',['email_address'=>$EmailAddress,'user_group'=>$UserGroup,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
        }

        /*License Area*/
        $EmailAddressExist = $DBUTG->get('user_licensings','licensing_id',['user_group'=>$UserGroup,'ORDER'=>['id'=>'DESC']]);
        if(!empty($EmailAddressExist)){
            if($EmailAddressExist != $LicensingID){
                $DBUTG->insert('user_licensings',['licensing_id'=>$LicensingID,'user_group'=>$UserGroup,'created_at'=>date('Y-m-d H:i:s')]);
            }
        }else{
             $DBUTG->insert('user_licensings',['licensing_id'=>$LicensingID,'user_group'=>$UserGroup,'created_at'=>date('Y-m-d H:i:s')]);
        }

        $data = $database->update($table, $arrayUpdate, ['user_group' => $UserGroup]);

        if ($data->rowCount() > 0) {
            $response = response(1, 0, 'Successfully Updated!!', $data->rowCount());
        } else {
//            $response = response(0, 1, 'Something gonna wrong !!', NULL);
            $response = response(1, 0, 'Successfully Updated!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERGROUPS', 'MODIFY', $UserGroup, 'MODIFY-USERGROUPS', $database->last(), 'MODIFY USERGROUPS MESSAGE', '--All--');
    } elseif($_GET['rule'] == 'AgentSelection') {
        $UserGroup = $_POST['AgentSelection_user_group'];
        $Agent = $_POST['agent'];

        $data = $database->update('vicidial_users',['user_group'=>$UserGroup],['user'=>$Agent]);

        if ($data->rowCount() > 0) {
             $response = response(1, 0, 'Successfully Updated!!', $data->rowCount());
         } else {
             $response = response(0, 1, 'Something gonna wrong !!', NULL);
         }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERGROUPS', 'MODIFY', $UserGroup, 'MODIFY-USERGROUPS-AGENTSELECTION', $database->last(), 'MODIFY USERGROUPS AGENTSELECTION', '--All--');
    }elseif($_GET['rule'] == 'add'){
        $UserGroup = trim($_POST['user_group']);
        $GroupName = $_POST['group_name'];
        $AllowedCampaigns = $_POST['allowed_campaigns'];
        $EmailAddress = $_POST['email_address'];
        $licensing_id = $_POST['licensing'];
        $status = $_POST['status'];
        $UserGroupCount = $database->count('vicidial_user_groups',['user_group'=>$UserGroup]);
        if(!empty($UserGroupCount) && $UserGroupCount > 0){
             $response = response(0, 1,'This Group already exist!!',NULL);
        }else{
            $array = [];
            $array['user_group'] = $UserGroup;
            $array['group_name'] = $GroupName;
            $array['allowed_campaigns'] = ' '.implode(' ',$AllowedCampaigns).' - ';
            $array['status'] = $status;
            $database->insert('vicidial_user_groups',$array);

            $dataEmailAddress = $DBUTG->count('team_email_addresses',['user_group'=>$UserGroup]);
            if($dataEmailAddress == 0){
                $DBUTG->insert('team_email_addresses',['user_group'=>$UserGroup,'email_address'=>$EmailAddress,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
            }
            $DBUTG->insert('user_licensings',['user_group'=>$UserGroup,'licensing_id'=>$licensing_id,'created_at'=>date('Y-m-d H:i:s')]);

            /*Response Result*/
            $responseData = [];
            $responseData['ColumnID'] = $UserGroup;
            $responseData['ColumnName'] = $GroupName;
            $response = response(1,0,'New Group has been created successfully!!',$responseData);
        }
    }elseif($_GET['rule'] == 'StatusUpdate'){
        $ItemID = $_POST['ItemID'];
        $ItemValue = $_POST['ItemValue'];
        $data = $database->update('vicidial_user_groups',['status'=>$ItemValue],['user_group'=>$ItemID]);

        if($data->rowCount() > 0) {
             $response = response(1, 0, 'Successfully Updated!!', $data->rowCount());
         }else {
             $response = response(0, 1, 'Something gonna wrong !!', NULL);
         }
    }
} else {
    $response = response(0, 1, 'Rule Not Defined', NULL);
}

echo json_encode($response);
