<?php
if(isset($_GET['method'])){
    $Method = $_GET['method'];
    if ($Method == 'ForceLogout') {
        $UserID = $_POST['UserID'];
        $User = $_SESSION['Login']['user'];
        $password = $_SESSION['Login']['password'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, base_url_reports('cron/UTG_user_status.php'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=".$UserID."&user_name=".$User."&password=".$password."&stage=log_agent_out");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'LOGOUT',$UserID, 'LOGOUT-USERS',$database->last(),'LOGOUT USERS','--All--');
        }
        die;
    } else {
        die('Follow');
    }
}
$arrayRule = ['add', 'copy', 'listing', 'update', 'delete', 'Tables', 'user_role_create', 'user_role_delete', 'user_role_setting', 'user_role_permission', 'user_role_user', 'AudioUpload', 'TemplateSave', 'leadUpdate','leadCustomUpdate','leadOutboundUpdate','leadInboundUpdate','SendMessage','TransferCallback',
'ReleaseCallback', 'token'];

$table = 'vicidial_users';

if (!empty($_GET['rule']) && in_array($_GET['rule'], $arrayRule)) {

    if ($_GET['rule'] == 'add') {
        if(!checkRole('users', 'create')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $User = $_POST['user'];
        $FullName = $_POST['full_name'];
        $Pass = $_POST['pass'];
        $PhoneLogin = $_POST['phone_login'];
        $UserGroup = $_POST['user_group'];
        $AgentChooseIngroups = $_POST['agent_choose_ingroups'];
        $ScheduledCallbacks = $_POST['scheduled_callbacks'];
        $AgentcallManual = $_POST['agentcall_manual'];
        $CloserDefaultBlended = $_POST['closer_default_blended'];
        $AgentChooseBlended = $_POST['agent_choose_blended'];
        $AgentonlyCallbacks = $_POST['agentonly_callbacks'];
        $VicidialRecording = $_POST['vicidial_recording'];
        $RoleID = $_POST['role_id'];
        $UserLevel = $_POST['user_level'];
        $api_token = $_POST['api_token'];
        $api_ip_list = $_POST['api_ip_list'];
        $api_start_date = $_POST['api_start_date'];
        $api_end_date = $_POST['api_end_date'];

        $resultReponse = get_plan_agents($UserGroup,$database,$DBUTG);
        if($resultReponse == 'failed'){
            $response = response(0,1, 'This group has no more permissions to create agent!!',NULL);
        }else{

//        $AdminInterfaceEnable = $_POST['admin_interface_enable'];
        $UserExist = $database->count($table, ['user' => $User]);
        if(!empty($PhoneLogin)){
            $UserExistPhone = $database->count($table, ['phone_login' => $PhoneLogin]);
        }else{
            $UserExistPhone = 0;
        }
        if (!empty($UserExist) && $UserExist > 0) {
            $response = response(0, 1, 'User already exist!!', NULL);
        }elseif(!empty($UserExistPhone) && $UserExistPhone > 0){
            $response = response(0, 1, 'Phone already assigned to someone!!', NULL);
        } else {
            $arrayInsert = [];
            $arrayInsert['user'] = $User;
            $arrayInsert['full_name'] = $FullName;
            $arrayInsert['pass'] = $Pass;
            $arrayInsert['phone_login'] = $PhoneLogin;
            if(!empty($PhoneLogin)){
                $arrayInsert['phone_pass'] = $PhoneLogin;
            }
            $arrayInsert['user_group'] = $UserGroup;
//            $arrayInsert['admin_interface_enable'] = $AdminInterfaceEnable;
            $arrayInsert['agent_choose_ingroups'] = $AgentChooseIngroups;
            $arrayInsert['scheduled_callbacks'] = $ScheduledCallbacks;
            $arrayInsert['agentcall_manual'] = $AgentcallManual;
            $arrayInsert['closer_default_blended'] = $CloserDefaultBlended;
            $arrayInsert['agent_choose_blended'] = $AgentChooseBlended;
            $arrayInsert['agentonly_callbacks'] = $AgentonlyCallbacks;
            $arrayInsert['vicidial_recording'] = $VicidialRecording;
            $arrayInsert['vdc_agent_api_access'] = $_POST['vdc_agent_api_access'];
            $arrayInsert['api_only_user'] = $_POST['api_only_user'];
            $arrayInsert['custom_one'] = $_POST['custom_one'];
            $arrayInsert['role_id'] = $RoleID;
            $arrayInsert['user_level'] = $UserLevel;
            $arrayInsert['api_token'] = trim($api_token);
            $arrayInsert['api_ip_list'] = $api_ip_list;
            $arrayInsert['api_start_date'] = $api_start_date;
            $arrayInsert['api_end_date'] = $api_end_date;

            if($UserLevel == 8 || $UserLevel == 7){
                //$arrayInsert['vdc_agent_api_access'] = 1;
                $arrayInsert['api_allowed_functions'] = 'blind_monitor';
                $arrayInsert['admin_interface_enable'] = 1;
                $arrayInsert['view_reports'] = '1';
            }else{
                $arrayInsert['admin_interface_enable'] = $_POST['admin_interface_enable'];
                $arrayInsert['view_reports'] = $_POST['view_reports'];
            }
            $ListExist = $database->insert($table, $arrayInsert);
            $UserID = $database->id();
            /*Response Result*/
            $responseData = [];
            $responseData['UserID'] = $UserID;
            $responseData['UserName'] = $FullName;

            $response = response(1, 0, 'New user has been created successfully!!', $responseData);
        }
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS','ADD',$User, 'ADD-USERS',$database->last(),'ADD USERS','--All--');

    } elseif ($_GET['rule'] == 'copy') {
        if(!checkRole('users', 'create')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $User = $_POST['user'];
        $FullName = $_POST['full_name'];
        $Pass = $_POST['pass'];
        $PhoneLogin = $_POST['phone_login'];
//        $UserGroup = $_POST['user_group'];
        $CopyClone = $_POST['copy_clone'];

        $UserExist = $database->count($table, ['user' => $User]);
        $UserExistPhone = $database->count($table, ['phone_login' => $PhoneLogin]);
        if (!empty($UserExist) && $UserExist > 0) {
            $response = response(0, 1, 'User already exist!!', NULL);
        }elseif (!empty($UserExistPhone) && $UserExistPhone > 0 && !empty($PhoneLogin)) {
            $response = response(0, 1, 'Phone already assigned to someone!!', NULL);
        } else {
            $arrayInsert = $database->get($table, '*', ['user' => $CopyClone]);
            $resultReponse = get_plan_agents($arrayInsert['user_group'],$database,$DBUTG);
        if($resultReponse == 'failed'){
            $response = response(0,1, 'This group has no more permissions to create agent!!',NULL);
        }else{
            unset($arrayInsert['user_id']);
            unset($arrayInsert['user']);
            unset($arrayInsert['full_name']);
            unset($arrayInsert['pass']);
            if(!empty($PhoneLogin)){
               unset($arrayInsert['phone_login']);
               $arrayInsert['phone_login'] = $PhoneLogin;
            }

//            unset($arrayInsert['user_group']);
            $arrayInsert['user'] = $User;
            $arrayInsert['full_name'] = $FullName;
            $arrayInsert['pass'] = $Pass;
//            $arrayInsert['user_group'] = $UserGroup;
            $ListExist = $database->insert($table, $arrayInsert);

            $UserID = $database->id();
            /*Response Result*/
            $responseData = [];
            $responseData['UserID'] = $UserID;
            $responseData['UserName'] = $FullName;
            $response = response(1, 0, 'New user has been copied successfully!!', $responseData);
        }
    }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS','COPY',$CopyClone,'COPY-USERS',$database->last(),'COPY USERS','--All--');

    } elseif ($_GET['rule'] == 'listing') {
        if(!checkRole('users', 'view')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }

        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $data = $database->select($table, ['user_id', 'user', 'full_name', 'user_group', 'active','user_level']);
            $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['user_group[!]'=>'ADMIN']);
        }else{
            $data = $database->select($table, ['user_id', 'user', 'full_name', 'user_group', 'active','user_level'],['AND'=>['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]]);
            $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
        }
//        $data = $database->select($table, ['user_id', 'user', 'full_name', 'user_group', 'active'],['AND'=>['user_level[!]'=>9,'user_group'=>$_SESSION['CurrentLogin']['user_group']]]);

//        $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['user_group[!]'=>'ADMIN']);


        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name']);

        $Option = '';
        $Option .= '<option value="ADMIN">ADMIN</option>';
        foreach ($UserGroup as $k => $v) {
            $Option .= '<option value="' . $v['user_group'] . '">' . $v['user_group'] . '</option>';
        }

        foreach ($data as $key => $val) {
            $status = '';
            if ($val['active'] == 'Y') {
                $status = 'active';
            }

            $LoginStatus = $database->get('vicidial_live_agents', ['campaign_id', 'status'], ['user' => $val['user']]);

            $NewOption = str_replace('value="' . $val['user_group'] . '"', 'value="' . $val['user_group'] . '" selected="selected"', $Option);

            $data[$key]['user_group'] = '<select class="form-control TeamUpdate" data-id="' . $val['user_id'] . '">' . $NewOption . '</select>';
            $data[$key]['Enabled'] = '<button type="button" class="btn btn-sm btn-toggle ' . $status . ' SwitchStatusBTN" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['user_id'] . '">
						<div class="handle"></div>
                                  </button>';
            if (!empty($LoginStatus)) {
                $index = array_search($LoginStatus['campaign_id'], array_column($CampaignListings, 'campaign_id'));
                if ($LoginStatus["status"] == 'PAUSED') {
                    $classStatus = 'badge-warning';
                } elseif ($LoginStatus["status"] == 'READY') {
                    $classStatus = 'badge-info';
                } elseif ($LoginStatus["status"] == 'INCALL') {
                    $classStatus = 'badge-success';
                } elseif ($LoginStatus["status"] == 'QUEUE') {
                    $classStatus = 'badge-primary';
                } elseif ($LoginStatus["status"] == 'DISPO') {
                    $classStatus = 'badge-danger';
                } elseif ($LoginStatus["status"] == 'DEAD') {
                    $classStatus = 'badge-danger';
                }

                $data[$key]['Status'] = '<span class="badge ' . $classStatus . ' badge-xl">' . $LoginStatus["status"] . '</span>';
                $data[$key]['Campaign'] = '<a href="'.base_url('campaigns/edit').'?campaign_id=' . $LoginStatus["campaign_id"] . '"><span class="badge badge-info badge-xl">' . $CampaignListings[$index]['campaign_name'] . '</span></a>';
                $data[$key]['Logged'] = '<span class="badge badge-success badge-pill badge-xl">logged in</span>';
            } else {
                $data[$key]['Status'] = '';
                $data[$key]['Campaign'] = '';
                $data[$key]['Logged'] = '<span class="badge badge-danger badge-pill badge-xl">logged off</span>';
            }
            $action = '';
            if(checkRole('users', 'view')) {
                $action .= '<a class="btn btn-app btn-success" href="'.base_url('users/edit').'?user=' . $val['user_id'] . '"><i class="fa fa-arrow-right" title="Manage"></i></a>';
            }
            if(checkRole('users', 'edit')) {
                $action .= '<a class="btn btn-app btn-warning ForceLogout" data-id='.$val['user'].' href="javascript:void(0);" ><i class="fa fa-sign-out" title="Sign Out"></i></a>';
            }
            if(checkRole('users', 'delete')) {
                $action .= '<a href="javascript:void(0);" class="btn btn-app btn-danger UserRemove" data-id="' . $val['user_id'] . '"><i class="fa fa-times" title="Remove"></i></a>';
            }
            $data[$key]['Action'] = $action;

            if($val['user_level'] == 1){
                $data[$key]['Role'] = 'AGENT';
            }elseif($val['user_level'] == 7){
                $data[$key]['Role'] = 'TEAM MANAGER';
            }elseif($val['user_level'] == 8){
                $data[$key]['Role'] = 'ADMIN';
            }elseif($val['user_level'] == 9){
                $data[$key]['Role'] = 'SUPER';
            }else{
                $data[$key]['Role'] = 'Not Defined';
            }

        }
        $response = array(
            "draw" => intval(1),
            // "recordsTotal" => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'LOAD','', 'LOAD-USERS',$database->last(),'LOAD USERS','--All--');

    } elseif ($_GET['rule'] == 'update') {
        if(!checkRole('users', 'edit')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $POSTCount = count($_POST);
        if ($POSTCount == 3) {
            $FieldName = $_POST['field'];
            $FieldValue = $_POST['value'];
            $Condition = $_POST['userID'];
            if ($FieldName == 'closer_campaigns') {
                $getUser = $database->get($table, [$FieldName], ['user_id' => $Condition]);
                if (preg_match("~\b".$FieldValue."\b~",$getUser[$FieldName])) {
                    $FieldValue = str_replace($FieldValue . ' ', '', trim(rtrim($getUser[$FieldName],'-')));
                } else {
                    $FieldValue = $FieldValue . ' ' . trim(rtrim($getUser[$FieldName],'-'));
                }
                if(!empty($FieldValue) && $FieldValue){
                    $FieldValue = " ".$FieldValue." -";
                }else{
                    $FieldValue = "";
                }
//                if (strpos($getUser[$FieldName], $FieldValue) !== false) {
//                    $FieldValue = str_replace($FieldValue . ' ', '', $getUser[$FieldName]);
//                } else {
//                    $FieldValue = $FieldValue . ' ' . $getUser[$FieldName];
//                }

            }elseif($FieldName == 'allowed_teams_access'){
                $FieldValue= implode(' ',$FieldValue);
            }elseif($FieldName == 'phone_login'){
                $result = $database->update($table, ['phone_pass' => $FieldValue], ['user_id' => $Condition]);
            }
            $result = $database->update($table, [$FieldName => trim($FieldValue)], ['user_id' => $Condition]);

            if ($result->rowCount() > 0) {
                $response = response(1, 0, 'Successfully updated!!', NULL);
            } else {
                $response = response(0, 1, 'Oops!! No Updated!!', NULL);
            }
        } else {

        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'MODIFY',$Condition,'MODIFY-'.$FieldName,$database->last(),'MODIFY USERS FIELD','--All--');

    } elseif ($_GET['rule'] == 'delete') {
        $Condition = $_POST['userID'];
        $result = $database->delete($table, ['user_id' => $Condition]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'This user has been successfully deleted!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'DELETE',$Condition,'DELETE-USERS',$database->last(),'DELETE USERS','--All--');
    } elseif ($_GET['rule'] == 'call_listing') {

    } elseif ($_GET['rule'] == 'user_role_create') {
        $title = $_POST['role_title'];
        $description = $_POST['role_description'];
        $status = 'active';
        $RoleExist = $DBUTG->count('roles', ['title' => $title]);
        if (!empty($RoleExist) && $RoleExist > 0) {
            $response = response(0, 1, 'This Role already exist!!', NULL);
        } else {
            $arrayInsert = [];
            $arrayInsert['title'] = $title;
            $arrayInsert['description'] = $description;
            $arrayInsert['status'] = $status;
            $role = $DBUTG->insert('roles', $arrayInsert);
            $RoleID = $DBUTG->id();
            $DateMessage = '<a class="media media-single" href="javascript:void(0);" data-id="' . $RoleID . '" id="role-' . $RoleID . '">
                                            <span class="title font-size-16 text-fade" title="' . $description . '">' . $title . '</span>
                                            <span class="badge badge-lg badge-secondary">0</span>
                                            <span class="badge badge-lg badge-info" title="Role User"><i class="fa fa-user"></i></span>
                                            <span class="badge badge-lg badge-primary RoleSetting" title="Role Setting"><i class="fa fa-cog fa-spin"></i></span>
                                            <span class="badge badge-lg badge-danger RoleRemove" title="Remove Role"><i class="fa fa-times"></i></span>
                                          </a>';
            $response = response(1, 0, 'New Role has been created successfully!!', $DateMessage);
             admin_log_insert($database,@$_SESSION['Login']['user'],'USERS','ADD',$RoleID, 'ADD-USERS-ROLE',$DBUTG->last(),'ADD USERS ROLE','--All--');
        }
    } elseif ($_GET['rule'] == 'user_role_delete') {
        $Condition = $_POST['role_id'];
        $result = $DBUTG->delete('roles', ['id' => $Condition]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'This user has been successfully deleted!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'DELETE',$Condition, 'DELETE-USERS-ROLE',$DBUTG->last(),'DELETE USERS ROLE','--All--');

    } elseif ($_GET['rule'] == 'user_role_setting') {
        if(!checkRole('users', 'view')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $RoleID = $_POST['role_id'];
        $tableName = 'role_permissions';
        $RolePermission = $DBUTG->select($tableName, ['module_id', 'create', 'edit', 'view', 'delete'], ['role_id' => $RoleID]);

        $RoleListing = $DBUTG->get('roles', ['id', 'title', 'description'], ['id' => $RoleID]);

        $Role = $DBUTG->select('modules', '*');
        $table = '<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">' . $RoleListing['title'] . '</h4>
				</div>
				<div class="box-body px-0 pt-0 pb-30"><div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-success"><tr>
                                <th>Module</th>
                                <th>Create</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Remove</th>
                            </tr>
                        </thead><tbody>';
//        $RolePermission = array_filter(array_merge(array(0),$RolePermission));

        foreach ($Role as $roleValue) {

//            $ArraySearch = array_search($roleValue['id'], array_column($RolePermission, 'module_id'));
            $ArraySearch = array_keys(array_column($RolePermission, 'module_id'), $roleValue['id']);
            $ArraySearch = @$ArraySearch[0];
            if (!empty($RolePermission[$ArraySearch])) {
                $Permission = $RolePermission[$ArraySearch];
                $create = (!empty($Permission['create']) && $Permission['create'] == 'Y') ? "active" : "";
                $edit = (!empty($Permission['edit']) && $Permission['edit'] == 'Y') ? "active" : "";
                $view = (!empty($Permission['view']) && $Permission['view'] == 'Y') ? "active" : "";
                $delete = (!empty($Permission['delete']) && $Permission['delete'] == 'Y') ? "active" : "";
                $table .= '<tr role-id="' . $RoleID . '">
                                    <th>' . $roleValue['title'] . '</th>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN ' . $create . '" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="create">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN ' . $edit . '" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="edit">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN ' . $view . '" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="view">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN ' . $delete . '" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="delete">
                                            <div class="handle"></div></td>
                                </tr>';
            } else {
                $table .= '<tr role-id="' . $RoleID . '">
                                    <th>' . $roleValue['title'] . '</th>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="create">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="edit">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="view">
                                            <div class="handle"></div></td>
                                    <td><button type="button" class="btn btn-toggle SwitchAccessBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-module="' . $roleValue['id'] . '" data-operation="delete">
                                            <div class="handle"></div></td>
                                </tr>';
            }
        }
        $table .= '</tbody></table>
                </div></div></div>';


        $response = response(0, 1, 'Oops!! No Updated!!', $table);
         admin_log_insert($database,@$_SESSION['Login']['user'],'USERS','LOAD',$RoleID,'LOAD-USERS-ROLE',$DBUTG->last(),'LOAD USERS ROLE','--All--');

    } elseif ($_GET['rule'] == 'user_role_user') {
        if(!checkRole('users', 'view')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $RoleID = $_POST['role_id'];
        $tableName = 'vicidial_users';
        $UserListing = $database->select($tableName, ['full_name', 'user', 'active'], ['role_id' => $RoleID]);

        $RoleListing = $DBUTG->get('roles', ['id', 'title', 'description'], ['id' => $RoleID]);

        $table = '<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">' . $RoleListing['title'] . '</h4>
                                            <span class="badge badge-primary pull-right">' . count($UserListing) . '</span>
				</div>
				<div class="box-body px-0 pt-0 pb-30"><div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark"><tr>
                                <th>UserName</th>
                                <th>Full Name</th>
                                <th>Active</th>
                            </tr>
                        </thead><tbody>';
        foreach ($UserListing as $user) {
            $table .= '<tr>
                                    <th>' . $user['user'] . '</th>
                                    <td>' . $user['full_name'] . '</td>
                                    <td>' . $user['active'] . '</td>
                                </tr>';
        }
        $table .= '</tbody></table>
                </div></div></div>';


        $response = response(0, 1, 'Oops!! No Updated!!', $table);
        admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'MODIFY',$RoleID, 'MODIFY USERS ROLE',$DBUTG->last(),'Role VIEW','--All--');

    } elseif ($_GET['rule'] == 'user_role_permission') {
        if(!checkRole('users', 'edit')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $ModuleID = $_POST['module_id'];
        $Operation = $_POST['operation'];
        $RoleID = $_POST['role_id'];
        $value = $_POST['value'];

        $table = 'role_permissions';

        $ExistRolePermission = $DBUTG->count($table, ['AND' => ['role_id' => $RoleID, 'module_id' => $ModuleID]]);

        if ($ExistRolePermission == 0) {
            $ExistRolePermission = $DBUTG->insert($table, ['role_id' => $RoleID, 'module_id' => $ModuleID, $Operation => $value]);
        } else {
            $ExistRolePermission = $DBUTG->update($table, [$Operation => $value], ['AND' => ['role_id' => $RoleID, 'module_id' => $ModuleID]]);
        }

        admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'MODIFY','', $Operation.' - ROLE PERMISSION',$DBUTG->last(),'Role Permission Update','--All--');
        $response = response(1, 0, 'Premission updated!!', NULL);

        admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'MODIFY',$ModuleID, 'MODIFY-USER-ROLE-PERMISSION',$DBUTG->last(),'MODIFY USER ROLE PERMISSION','--All--');

    } elseif ($_GET['rule'] == 'AudioUpload') {

        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

        $extensions = array("jpeg", "jpg", "mp3", 'xlsx', 'csv');

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "/srv/www/htdocs/uploads/" . $file_name);
            $result = results('success', 'File Upload!!', NULL);
        } else {
            $result = results('error', 'Case not found!!', NULL);
        }
        admin_log_insert($database,@$_SESSION['Login']['user'],'AUDIO','LOAD','','LOAD-AUDIO','',$file_name,'--All--');

    } elseif ($_GET['rule'] == 'TemplateSave') {
        $ListID = $_SESSION['LISTID'];
        $TemplateName = $_POST['template_name'];
        $TemplateDescription = $_POST['template_description'];
        unset($_POST['template_name']);
        unset($_POST['template_description']);
        $StandardVariables = '';

        foreach ($_POST as $key => $val) {
            if ($val != '' && $val >= 0) {
                $StandardVariables .= $key . ',' . $val . '|';
            }
        }

        $InsertArray = [];
        $InsertArray['list_id'] = $ListID;
        $InsertArray['template_name'] = $TemplateName;
        $InsertArray['template_description'] = $TemplateDescription;
        $InsertArray['standard_variables'] = $StandardVariables;

        $TemplateExist = $database->count('vicidial_custom_leadloader_templates', ['AND' => ['list_id' => $ListID, 'template_name' => $TemplateName]]);

        if ($TemplateExist == 0) {
            $database->insert('vicidial_custom_leadloader_templates', $InsertArray);
            $response = response(1, 0, 'Template successfully created!!', NULL);
        } else {
            $response = response(0, 1, 'This template alreadt exist!!', NULL);
        }
           admin_log_insert($database,@$_SESSION['Login']['user'],'LISTS','LOAD',$ListID, 'LOAD-LISTS-TEMPLATE',$database->last(),'LOAD LISTS TEMPLATE','--All--');

    } elseif ($_GET['rule'] == 'leadUpdate') {
        $lead_id = $_POST['lead_id'];
        unset($_POST['lead_id']);
        $result = $database->update('vicidial_list', $_POST, ['lead_id' => $lead_id]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Lead detail has been successfully updated!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database,@$_SESSION['Login']['user'],'LEAD', 'MODIFY',$lead_id, 'MODIFY-LEAD',$database->last(),'MODIFY LEAD','--All--');

    } elseif ($_GET['rule'] == 'leadCustomUpdate') {

        $lead_id = $_POST['lead_id'];
        $list_id = $_POST['list_id'];
        unset($_POST['lead_id']);
        unset($_POST['list_id']);
        $result = $database->update('custom_fields_data', $_POST, ['AND'=>['lead_id' => $lead_id,'list_id'=>$list_id]]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Lead custom detail has been successfully updated!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'LEAD','MODIFY',$lead_id, 'MODIFY-LEAD-CUSTOM',$database->last(),'MODIFY LEAD CUSTOM','--All--');

    } elseif ($_GET['rule'] == 'leadOutboundUpdate') {

        $UniqueID = $_POST['formId'];
        $value = $_POST['formValue'];

        $result = $database->update('vicidial_log',['status'=>$value], ['uniqueid' => $UniqueID]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Lead outbound status has been successfully updated!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database,@$_SESSION['Login']['user'],'LEAD','MODIFY',$UniqueID,'MODIFY-LEAD-OUTBOUND',$database->last(),'MODIFY LEAD OUTBOUND','--All--');

    } elseif ($_GET['rule'] == 'leadInboundUpdate') {
         if(!checkRole('users', 'edit')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $UniqueID = $_POST['formId'];
        $value = $_POST['formValue'];

        $result = $database->update('vicidial_closer_log',['status'=>$value], ['closecallid' => $UniqueID]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Lead inbound status has been successfully updated!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'LEAD','MODIFY',$UniqueID, 'MODIFY-LEAD-INBOUND',$database->last(),'MODIFY LEAD INBOUND','--All--');

    } elseif ($_GET['rule'] == 'Tables') {
//        $data = $LiveDatabase->query('SHOW TABLES')->fetchAll();
//        $data = $database->select('phones','*');
//        $data = $database->select('custom_fields','*');
//        $data = $database->select('vicidial_lists',['list_id','list_name']);
//        $data = $database->count('vicidial_lists',['list_name'=>'dialing entry']);
//        $data = $database->update('vicidial_lists',['active'=>'Y'],['list_id'=>10032]);
//        $data = $database->select('custom_fields_data', '*',['list_id'=>10032]);
//        $data = $database->query("INSERT INTO `vicidial_list` (`vendor_lead_code`, `source_id`, `list_id`, `phone_code`, `phone_number`, `title`, `first_name`, `middle_initial`, `last_name`, `address1`, `address2`, `address3`, `city`, `state`, `province`, `postal_code`, `country_code`, `gender`, `date_of_birth`, `alt_phone`, `email`, `security_phrase`, `owner`, `rank`, `entry_list_id`, `status`) VALUES ('Synergy123', NULL, '10032', NULL, '9780025056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10032', 'NEW')")->fetchAll();
        $data = $database->select('vicidial_lists','*');
//        $data = $database->query('DESCRIBE vicidial_callbacks')->fetchAll();
//        $DBSMS
//        $Sql2 = "SELECT user,server_ip,status,lead_id,campaign_id,
//                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'READY' THEN 1 ELSE 0 END) AS 'READY',
//                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'PAUSED' THEN 1 ELSE 0 END) AS 'PAUSED',
//                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'INCALL' THEN 1 ELSE 0 END) AS 'INCALL',
//                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'QUEUE' THEN 1 ELSE 0 END) AS 'QUEUE'
//                SUM(CASE WHEN `vicidial_live_agents`.`status` = 'dispo' THEN 1 ELSE 0 END) AS 'WRAP'
//                FROM `vicidial_live_agents` WHERE  campaign_id=4005";
////        $data = $database->query($Sql2)->fetchAll();
//        $data = $database->get('vicidial_live_agents',['campaign_id','status'],['user'=>'AnkitK']);
//        pr($data1);
        pr($data);
        exit;
    } elseif($_GET['rule'] == 'SendMessage'){
        $UserID = $_POST['UserID'];
        $message = $_POST['message'];
        $database->insert('chat_internal',['user_id'=>$UserID,'message'=>$message,'status'=>'N','created_at'=>date('Y-m-d H:i:s'),'sender_id'=>$_SESSION['CurrentLogin']['user_id']]);
        if($database->id()){
           $response = response(1, 0, 'Successfully Sent Message',$database->id());
        }else{
            $response = response(0, 1, 'Something gonna wrong!!', NULL);
        }
         admin_log_insert($database,@$_SESSION['Login']['user'],'MESSAGE','ADD',$UserID, 'ADD-MESSAGE',$database->last(),'ADD MESSAGE','--All--');

    }elseif($_GET['rule'] == 'TransferCallback'){
        $userFrom = $_POST['user_from'];
        $userTo = $_POST['user_to'];

        $CallbackCount = $database->count('vicidial_callbacks',['user'=>$userFrom]);
        if(!empty($CallbackCount) && $CallbackCount > 0){
            $data = $database->update('vicidial_callbacks',['user'=>$userTo],['user'=>$userFrom]);

            $UpdatedRow = $data->rowCount();
            $response = response(1, 0, 'Callbacks updated', $UpdatedRow);
        }else{
             $response = response(0, 1, 'No Callbacks for this user!!', NULL);
        }
        admin_log_insert($database,@$_SESSION['Login']['user'],'CALLBACKS','MODIFY',$userFrom, 'MODIFY-CALLBACK-TRANSFER',$database->last(),'MODIFY CALLBACK TRANSFER','--All--');

    }elseif($_GET['rule'] == 'ReleaseCallback'){
        $UserID = $_POST['user_id'];
        $CampaignID = $_POST['campaign_id'];
        $CallbackTime = date('Y-m-d',strtotime($_POST['callback_time']));

        $CallbackCount = $database->count('vicidial_callbacks',['AND'=>['callback_time[<=]'=>$CallbackTime.' 23:59:59','user'=>$UserID,'campaign_id'=>$CampaignID]]);
        if(!empty($CallbackCount) && $CallbackCount > 0){
            $data = $database->delete('vicidial_callbacks',['AND'=>['callback_time[<=]'=>$CallbackTime.' 23:59:59','user'=>$UserID,'campaign_id'=>$CampaignID]]);
            $UpdatedRow = $data->rowCount();
            $response = response(1, 0, $UpdatedRow.' Callbacks Release', $UpdatedRow);
        }else{
             $response = response(0, 1, 'No Callbacks for this user!!', NULL);
        }

        admin_log_insert($database,@$_SESSION['Login']['user'],'CALLBACKS','DELETE',$UserID,'DELETE-CALLBACKS',$database->last(),'DELETE CALLBACKS','--All--');

    }elseif($_GET['rule'] == 'token'){
        $length = 30;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        echo $randomString;
        die;
    }

    echo json_encode($response);


} else {
    echo json_encode(response(0, 1, 'Rule Not Defined', NULL));
}
