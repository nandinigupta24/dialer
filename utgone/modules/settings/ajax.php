<?php

$result = [];
if (!empty($_GET) && isset($_GET['action']) && $_GET['action']) {

    if ($_GET['action'] == 'AddCallTime') {
        //$datata = $database->select('vicidial_call_times', '*', []);
        //echo'<pre>';print_r($datata);exit;

        $call_time["call_time_id"] = $_POST['call_time_id'];
        $call_time["call_time_name"] = $_POST['call_time_name'];
        $call_time["user_group"] = $_POST['user_group'];
        $insert = $database->insert('vicidial_call_times', $call_time);
        if ($insert) {
            $responseData = [];
            $responseData['ColumnID'] = $_POST['call_time_id'];
            $responseData['ColumnName'] = $_POST['call_time_name'];
            $resultResponse = response(1, 0, 'Successfully Added!!', $responseData);
        }
        //$datata = $database->select('vicidial_call_times', '*', []);
        //echo'<pre>';print_r($datata);exit;
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'CallTime', 'ADD', $_POST['call_time_id'], 'ADD-CALLTIME', $database->last(), 'ADD CALLTIME', '--All--');

    if ($_GET['action'] == 'listing') {
        $arrayField = ['call_time_id', 'call_time_name', 'ct_default_start', 'ct_default_stop'];


        if ($_SESSION['CurrentLogin']['user_group'] != 'ADMIN') {
            if (isset($_GET['call_time_id']) && $_GET['call_time_id']) {
                $data = $database->select('vicidial_call_times', '*', ["call_time_id" => $_GET['call_time_id']]);
            } else {
                $data = $database->select('vicidial_call_times', '*', ['user_group' => $_SESSION['CurrentLogin']['user_group']]);
            }
        } else {
            if (isset($_GET['call_time_id']) && $_GET['call_time_id']) {
                $data = $database->select('vicidial_call_times', '*', ["call_time_id" => $_GET['call_time_id']]);
            } else {
                $data = $database->select('vicidial_call_times', '*', []);
            }
        }


        //echo'<pre>';print_r($datata);exit;
        /* if (!empty($_GET['show']) && $_GET['show'] == 'all') {
          $data = $database->select('vicidial_call_times', $arrayField,[]);
          // $data = $database->select('vicidial_call_times', '*',[]);
          } else {
          //$data = $database->select('vicidial_lists', $arrayField, ['active' => 'Y']);
          $data = $database->select('vicidial_call_times', $arrayField, []);
          } */
        //echo'<pre>';print_r($data);exit;
        //$CallListings = $database->select('vicidial_call_times', ['campaign_id', 'campaign_name']);

        foreach ($data as $key => $value) {
            //$data[$key]['Action'] = '<a data-id="' . $value['call_time_id'] . '"  href="" class="btn btn-app btn-info" title="Edit List"><i class="fa fa-edit"></i></a>';
            //. '<a href="" class="btn btn-app btn-success" title="View List "><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-app btn-danger ListRemove" data-id="' . $value['call_time_id'] . '" title="Remove List"><i class="fa fa-times"></i></a>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success"href="' . base_url('settings/call_time_edit') . '?call_time_id=' . $value['call_time_id'] . '"><i class="fa fa-arrow-right" title="Manage"></i></a><a href="javascript:void(0);" class="btn btn-app btn-danger callRemove" data-id="' . $value['call_time_id'] . '"><i class="fa fa-times" title="Remove"></i></a>';
        }

        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval(count($data)),
            "recordsFiltered" => intval(count($data)),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'CALLTIME', 'LOAD', '', 'LOAD-CALLTIME', $database->last(), 'LOAD CALLTIME', '--All--');
        echo json_encode($resultResponse);
        exit;
    }

    if ($_GET['action'] == 'delete') {
        $Condition = $_POST['id'];
        $result = $database->delete('vicidial_call_times', ['call_time_id' => $Condition]);
        if ($result->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Record has been successfully deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'CALLTIME', 'DELETE', $Condition, 'DELETE-CALLTIME', $database->last(), 'DELETE CALLTIME', '--All--');
    }


    if ($_GET['action'] == 'field_update') {

        $Type = $_POST['type'];
        $ID = $_POST['id'];
        $FieldName = $_POST['name'];
        $FieldValue = str_replace(':', '', $_POST['val']);

        switch ($Type) {
            case 'text':
                $data = $database->update('vicidial_call_times', [$FieldName => $FieldValue], ['call_time_id' => $ID]);
                //echo '<pre>';print_r($data);exit;
                break;
            case 'select':
                /* if(in_array($FieldName,['closer_campaigns','xfer_groups'])){
                  $FieldValue = implode(' ',$FieldValue);
                  } */
                // $data = $database->update('phones',[$FieldName=>$FieldValue],['dialplan_number'=>$ID]);
                break;
            case 'switch':
                /* if($FieldName == 'three_way_dial_prefix' && $FieldValue == 'Y'){
                  $FieldValue = $DBAsterisk->get('phones','dial_prefix',['campaign_id'=>$ID]);
                  } */
                $data = $database->update('vicidial_call_times', [$FieldName => $FieldValue], ['call_time_id' => $ID]);
                break;
            default:
        }

        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            //$resultResponse = results('success','Updated!!',NULL);
            $resultResponse = response(1, 0, 'Call time settings updated successfully!!', NULL);
        } else {
            $resultResponse = response(1, 0, 'No Updates!!', NULL);
//              $resultResponse = response(1, 0, 'Call time settings updated successfully!!', NULL);
            //$resultResponse = results('error','No Updates!!',NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'CALLTIME', 'MODIFY', $ID, 'MODIFY-CALLTIME', $database->last(), 'MODIFY CALLTIME', '--All--');
        echo json_encode($resultResponse);
        exit;
    }
    if ($_GET['action'] == 'GetPhone') {
        if ($_SESSION['CurrentLogin']['user_group'] != 'ADMIN') {
            if (isset($_GET['extension']) && $_GET['extension']) {
                $data = $database->select('phones', '*', ["extension" => $_GET['extension']]);
            } else {
                $data = $database->select('phones', ['login', 'server_ip', 'protocol', 'extension', 'active'], ['user_group' => $_SESSION['CurrentLogin']['user_group']]);
            }
        } else {
            if (isset($_GET['extension']) && $_GET['extension']) {
                $data = $database->select('phones', '*', ["extension" => $_GET['extension']]);
            } else {
                $data = $database->select('phones', ['login', 'server_ip', 'protocol', 'extension', 'active']);
            }
        }

        foreach ($data as $key => $val) {
            $status = '';
            if ($val['active'] == 'Y') {
                $status = 'active';
            }
            $data[$key]['active'] = '<button type="button"  data-name="active" class="manage-field-switch btn btn-sm btn-toggle ' . $status . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['extension'] . '" value="0">
						<div class="handle"></div>
                                  </button>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success"href="' . base_url('settings/phone_edit') . '?extension=' . $val['extension'] . '"><i class="fa fa-arrow-right" title="Manage"></i></a><a href="javascript:void(0);" class="btn btn-app btn-danger phoneRemove" data-id="' . $val['extension'] . '"><i class="fa fa-times" title="Remove"></i></a>';
//            $data[$key]['Queued'] = '';
//            $data[$key]['SentToday'] = '';
//            $data[$key]['SentTotal'] = '';
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'PHONE', '$insertData', 'PHONE - ROLE', $database->last(), 'Role PHONE', '--All--');
    }


    if ($_GET['action'] == 'getServers') {
        $datat = $database->select('servers', '*', []);
        $Option = '<option value="">Select </option>';
        foreach ($datat as $key => $value) {
            $Option .= '<option value="' . $value['server_ip'] . '">' . $value['server_id'] . '-' . $value['server_ip'] . '</option>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval(count($datat)),
            "recordsFiltered" => intval(count($datat)),
            "data" => $Option
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'SERVER', '', 'SERVER - ROLE', $database->last(), 'Role SERVER', '--All--');
    }


    if ($_GET['action'] == 'AddNewPhone') {
        $phone["extension"] = $_POST['extension_number'];
        $phone["dialplan_number"] = $_POST['extension_number'];
        $phone["voicemail_id"] = $_POST['extension_number'];
        $phone["outbound_cid"] = '';
        $phone["server_ip"] = $_POST['server'];
        $phone["login"] = $_POST['extension_number'];
        $phone["pass"] = $_POST['extension_number'];
        $phone["conf_secret"] = $_POST['extension_number'];
        $phone["active"] = $_POST['active'];
        $phone["protocol"] = $_POST['protocol'];
        $phone["user_group"] = $_POST['user_group'];
        $PhoneExist = $database->count('phones', ['AND' => ['extension' => $_POST['extension_number'], 'server_ip' => $_POST['server']]]);
        if (!empty($PhoneExist) && $PhoneExist > 0) {
            $resultResponse = response(0, 1, 'This extension already exist!!', NULL);
        } else {
            $PhoneExist = $database->count('phones', ['AND' => ['login' => $_POST['extension_number']]]);
            if (!empty($PhoneExist) && $PhoneExist > 0) {
                $resultResponse = response(0, 1, 'This login already exist!!', NULL);
            } else {
                try {
                    $insert = $database->insert('phones', $phone);

                    /* Extra Updates START */

                    $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $_POST['server'], 'generate_vicidial_conf' => 'Y', 'active_asterisk_server' => 'Y']]);
                    $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $SS_ActiveVoicemailServer, 'generate_vicidial_conf' => 'Y', 'active_asterisk_server' => 'Y']]);

                    /* Extra Updates END */

                    $responseData = [];
                    $responseData['ColumnExtension'] = $_POST['extension_number'];
                    $responseData['ColumnLogin'] = $_POST['agent_login'];
                    $responseData['ColumnPass'] = $_POST['agent_password'];
                } catch (Exception $e) {

                }
            }
        }
        if ($insert) {
            $resultResponse = response(1, 0, 'Your phone has been created successfully.!', $responseData);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'PHONE', 'ADD', $phone, 'ADD-PHONE', $database->last(), 'ADD PHONE', '--All--');
    }


    if ($_GET['action'] == 'delete') {
        $ID = $_POST['id'];
        $data = $database->delete('phones', ['extension' => $ID]);
        if ($data) {
            //$resultResponse = results('success','Updated!!',NULL);
            $resultResponse = response(1, 0, 'Record deleted successfully!!', NULL);
        } else {
            $resultResponse = response(1, 0, 'Record Not deleted!!', NULL);
            //$resultResponse = results('error','No Updates!!',NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'PHONE', 'DELETE', $ID, 'DELETE-PHONE', $database->last(), 'DELETE PHONE', '--All--');
    }

    if (isset($_GET['action']) && $_GET['action'] == 'field_update_phone') {

        $Type = $_POST['type'];
        $ID = $_POST['id'];
        $FieldName = $_POST['name'];
        $FieldValue = $_POST['val'];

        switch ($Type) {
            case 'text':
                $data = $database->update('phones', [$FieldName => $FieldValue], ['extension' => $ID]);
                //echo '<pre>';print_r($data);exit;
                break;
            case 'select':
                /* if(in_array($FieldName,['closer_campaigns','xfer_groups'])){
                  $FieldValue = implode(' ',$FieldValue);
                  } */
                // $data = $database->update('phones',[$FieldName=>$FieldValue],['dialplan_number'=>$ID]);
                break;
            case 'switch':
                /* if($FieldName == 'three_way_dial_prefix' && $FieldValue == 'Y'){
                  $FieldValue = $DBAsterisk->get('phones','dial_prefix',['campaign_id'=>$ID]);
                  } */
                $data = $database->update('phones', [$FieldName => $FieldValue], ['extension' => $ID]);
                break;
            default:
        }

        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            //$resultResponse = results('success','Updated!!',NULL);
            $resultResponse = response(1, 0, 'Phone Settings updated successfully!!', NULL);
        } else {
            $resultResponse = response(1, 0, 'No Updates!!', NULL);
            //$resultResponse = results('error','No Updates!!',NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'PHONE', 'MODIFY', $ID, 'MODIFY-PHONE', $database->last(), 'MODIFY PHONE', '--All--');
        echo json_encode($resultResponse);
        exit;
    }

    if ($_GET['action'] == 'GetAudioLog') {
//        $data = $database->select('vicidial_admin_log',['event_code','user','event_date','ip_address']);
        $data = $database->query("SELECT AL.admin_log_id,AL.event_code,U.full_name,AL.event_date,AL.ip_address
FROM vicidial_admin_log AL
join vicidial_users U
on AL.user=U.user where AL.event_section = 'AUDIOSTORE' AND AL.event_type = 'LOAD'")->fetchAll();

        foreach ($data as $key => $val) {
            $EventCode = explode(' ', $val['event_code']);
            $EventCode = $EventCode[0];
            $data[$key]['event_code'] = $EventCode;
            $data[$key]['play'] = '<audio controls>
  <source src="/' . $SS_SoundsWebDirectory . '/' . $EventCode . '" type="audio/mpeg">
Your browser does not support the audio element.
</audio>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-danger text-white Remove-Audio" admin-log-id="' . $val['admin_log_id'] . '" FileName="' . $EventCode . '"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'AUDIOLOG', '', 'AUDIOLOG - ROLE', $database->last(), 'Role AUDIOLOG', '--All--');
    }

    if ($_GET['action'] == 'GetDNC') {
        ## Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value

        ## Search
        $searchQuery = " ";
        if($searchValue != ''){
            $searchQuery = " and (campaign_id like '%".$searchValue."%' or campaign_name like '%".$searchValue."%' or phone_number like'%".$searchValue."%' or created_at like '%".$searchValue."%') ";
        }

        if ($_SESSION['CurrentLogin']['user_level'] == 9) {
            $data = $database->query("SELECT campaign_id, campaign_name, phone_number,created_at  FROM vicidial_campaign_dnc WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage."")->fetchAll();
            $recordsAll = $database->query("SELECT count(*) FROM vicidial_campaign_dnc")->fetchAll();
            $recordsFilter = $database->query("SELECT count(*) FROM vicidial_campaign_dnc WHERE 1 ".$searchQuery."")->fetchAll();
        } else {
            $user_group = $_SESSION['CurrentLogin']['user_group'];
            $camp = $database->get('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['campaign_name' => $user_group]);
            $data = $database->query("SELECT campaign_id, campaign_name, phone_number, created_at FROM vicidial_campaign_dnc WHERE campaign_id = ".$camp['campaign_id']." ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage."")->fetchAll();
            $recordsAll = $database->query("SELECT count(*) FROM vicidial_campaign_dnc WHERE campaign_id = ".$camp['campaign_id']."")->fetchAll();
            $recordsFilter = $database->query("SELECT count(*) FROM vicidial_campaign_dnc WHERE campaign_id = ".$camp['campaign_id']." $searchQuery")->fetchAll();
        }

        $resultResponse = array(
            "draw" => intval($draw),
            "iTotalRecords" => $recordsAll[0][0],
            "iTotalDisplayRecords" => $recordsFilter[0][0],
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'DNC', '', 'DNC - ROLE', $database->last(), 'Role DNC', '--All--');
    } elseif ($_GET['action'] == 'GetSystemDNC') {
        $data = $database->query("SELECT name, description, phone_number FROM vicidial_dnc LIMIT 200")->fetchAll();
//        foreach ($data as $key => $val) {
//            $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" title="Manage"></i></a><a  class="btn btn-app btn-success text-white"><i class="fa fa-arrow-down" title="Download"></i></a>';
//        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'SYSTEMDNC', '', 'SYSTEMDNC - ROLE', $database->last(), 'Role SYSTEMDNC', '--All--');
    }

    if ($_GET['action'] == 'GetAdminLog') {
        if(isset($_GET['start'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
            $sql = "DATE(event_date) BETWEEN '$start' and '$end'";
        } else {
            $curr_date = date('Y-m-d');
            $sql = "DATE(event_date) = '$curr_date'";
        }
        if ($_SESSION['CurrentLogin']['user_level'] == 9) {
            $data = $database->query("SELECT event_date, user, event_type, record_id, event_code FROM vicidial_admin_log WHERE $sql ORDER BY admin_log_id DESC LIMIT 200")->fetchAll();
        } else {
            $user = $_SESSION['CurrentLogin']['user'];
            $data = $database->query("SELECT event_date, user, event_type, record_id, event_code FROM vicidial_admin_log WHERE $sql AND user = '".$user."' ORDER BY admin_log_id DESC LIMIT 200")->fetchAll();
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'ADMINLOG', '', 'ADMINLOG - ROLE', $database->last(), 'Role ADMINLOG', '--All--');
    }

    if (isset($_GET['action']) && $_GET['action'] == 'GetServer') {
        $data = $database->select('servers', ['server_id', 'server_description', 'server_ip', 'asterisk_version', 'max_vicidial_trunks', 'local_gmt']);

        foreach ($data as $key => $val) {
            if ($val['active'] == 'Y') {
                $RecordCall = 'active';
            } else {
                $RecordCall = '';
            }
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['carrier_id'] . '" data-field="active" value="1">
<div class="handle"></div>
                         </button>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit Server Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
//             "recordsTotal"    => intval($totalRow),
//             "recordsFiltered" => intval($totalRow),
            "data" => $data
        );

//    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'GET', '', 'GET - ROLE', $database->last(), 'Role GET', '--All--');
    }
    if (isset($_GET['action']) && $_GET['action'] == 'GetContainer') {
        $data = $database->query("select * from vicidial_settings_containers")->fetchAll();
        foreach ($data as $key => $val) {
            if ($val['active'] == 'Y') {
                $RecordCall = 'active';
            } else {
                $RecordCall = '';
            }
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['carrier_id'] . '" data-field="active" value="1">
			<div class="handle"></div>
                          </button>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit Container Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
    }if (isset($_GET['action']) && $_GET['action'] == 'GetCarrier') {
        $data = $database->query("select * from vicidial_server_carriers")->fetchAll();
        foreach ($data as $key => $val) {
            if ($val['active'] == 'Y') {
                $RecordCall = 'active';
            } else {
                $RecordCall = '';
            }
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['carrier_id'] . '" data-field="active" value="1">
			<div class="handle"></div>
                          </button>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit Carrier Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
    }if (isset($_GET['action']) && $_GET['action'] == 'GetSettings') {
        $data = $database->query("select * from system_settings")->fetchAll();
        foreach ($data as $key => $val) {
            if ($val['active'] == 'Y') {
                $RecordCall = 'active';
            } else {
                $RecordCall = '';
            }
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['carrier_id'] . '" data-field="active" value="1">
			<div class="handle"></div>
                          </button>';
            $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit System Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data" => $data
        );
    }

    if ($_GET['action'] == 'SaveDNC') {
        $PhoneNumber = $_POST['phone_number'];
        $CampaignID = $_POST['campaign_id'];
        $CampaignName = $_POST['campaign_name'];

        $countExist = $database->count('vicidial_campaign_dnc', ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
        if (!empty($countExist) && $countExist > 0) {
            $arrayInsert = [];
            $arrayInsert['campaign_id'] = $CampaignID;
            $arrayInsert['campaign_name'] = $CampaignName;
            $arrayInsert['updated_at'] = date('Y-m-d H:m:s');
            $dataSave = $database->update('vicidial_campaign_dnc', $arrayInsert, ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
            $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            /* if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            } */
        } else {
            $arrayInsert = [];
            $arrayInsert['phone_number'] = $PhoneNumber;
            $arrayInsert['campaign_id'] = $CampaignID;
            $arrayInsert['campaign_name'] = $CampaignName;
            $arrayInsert['created_at'] = date('Y-m-d H:m:s');
            $dataSave = $database->insert('vicidial_campaign_dnc', $arrayInsert);
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['action'] == 'SaveDNCBulk') {
        $file_name = $_FILES['phone_number_bulk']['name'];
        $file_size = $_FILES['phone_number_bulk']['size'];
        $file_tmp = $_FILES['phone_number_bulk']['tmp_name'];
        $file_type = $_FILES['phone_number_bulk']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['phone_number_bulk']['name'])));
        $extensions = array('csv');
        $dataSave = 0;

        $CampaignID = $_POST['campaign_id_bulk'];
        $CampaignName = $_POST['campaign_name_bulk'];

        if (in_array($file_ext, $extensions) === false) {
            $resultResponse = response(0, 1, 'extension not allowed, please choose a csv file.!!', NULL);
        } else {
            if ($file_size > 0) {
                $file_data = fopen($file_tmp, 'r');
                $phone = [];
                while (($column = fgetcsv($file_data)) !== FALSE) {
                    if (isset($column[0])) {
                        //array_push($phone, $column[0]);
                        $PhoneNumber = $column[0];
                        $countExist = $database->count('vicidial_campaign_dnc', ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
                        if (!empty($countExist) && $countExist > 0) {
                            $arrayInsert = [];
                            $arrayInsert['campaign_id'] = $CampaignID;
                            $arrayInsert['campaign_name'] = $CampaignName;
                            $arrayInsert['updated_at'] = date('Y-m-d H:m:s');
                            $dataSave = $database->update('vicidial_campaign_dnc', $arrayInsert, ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
                        } else {
                            $arrayInsert = [];
                            $arrayInsert['phone_number'] = $PhoneNumber;
                            $arrayInsert['campaign_id'] = $CampaignID;
                            $arrayInsert['campaign_name'] = $CampaignName;
                            $arrayInsert['created_at'] = date('Y-m-d H:m:s');
                            $dataSave = $database->insert('vicidial_campaign_dnc', $arrayInsert);
                        }
                    }
                }

                if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                    $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
                } else {
                    $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
                }

                /* $PhoneNumber = implode(',', $phone);
                $CampaignID = $_POST['campaign_id_bulk'];
                $CampaignName = $_POST['campaign_name_bulk'];
                $countExist = $database->count('vicidial_campaign_dnc', ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
                //$resultResponse = response(0, 1, $countExist, NULL);
                if (!empty($countExist) && $countExist > 0) {
                    $arrayInsert = [];
                    $arrayInsert['campaign_id'] = $CampaignID;
                    $arrayInsert['campaign_name'] = $CampaignName;
                    $dataSave = $database->update('vicidial_campaign_dnc', $arrayInsert, ['AND' => ['phone_number' => $PhoneNumber, 'campaign_id' => $CampaignID]]);
                    $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
                    if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                        $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
                    } else {
                        $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
                    }
                } else {
                    $arrayInsert = [];
                    $arrayInsert['phone_number'] = $PhoneNumber;
                    $arrayInsert['campaign_id'] = $CampaignID;
                    $arrayInsert['campaign_name'] = $CampaignName;
                    $dataSave = $database->insert('vicidial_campaign_dnc', $arrayInsert);
                    if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                        $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
                    } else {
                        $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
                    }
                }  */
            }
        }
    } elseif ($_GET['action'] == 'SaveSystemDNC') {
        $PhoneNumber = $_POST['phone_number'];
        $Name = $_POST['name'];
        $Description = $_POST['description'];

        $countExist = $database->count('vicidial_dnc', ['phone_number' => $PhoneNumber]);
        if (!empty($countExist) && $countExist > 0) {
            $arrayInsert = [];
            $arrayInsert['name'] = $Name;
            $arrayInsert['description'] = $Description;

            $dataSave = $database->update('vicidial_dnc', $arrayInsert, ['phone_number' => $PhoneNumber]);
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {
            $arrayInsert = [];
            $arrayInsert['phone_number'] = $PhoneNumber;
            $arrayInsert['name'] = $Name;
            $arrayInsert['description'] = $Description;

            $dataSave = $database->insert('vicidial_dnc', $arrayInsert);
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['action'] == 'RemoveSystemDNC') {
        $Phone = $_POST['phone'];
        $dataSave = $database->delete('vicidial_dnc', ['phone_number' => $Phone]);
        if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully Deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'RemoveDNC') {
        $Phone = $_POST['phonenumber'];
        $CampaignID = $_POST['campaignid'];
        $dataSave = $database->delete('vicidial_campaign_dnc', ['AND' => ['phone_number' => $Phone, 'campaign_id' => $CampaignID]]);
        if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully Deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'AudioUpload') {
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

        $extensions = array("jpeg", "jpg", "mp3", 'wav', 'gsm');

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {

            $fileName = $_POST['audio_name'] . "." . $file_ext;
            $FilePath = "/srv/www/htdocs/" . $SS_SoundsWebDirectory . "/" . $fileName;
            move_uploaded_file($file_tmp, $FilePath);

            $database->update('servers', ['sounds_update' => 'Y']);

            admin_log_insert($database, @$_SESSION['Login']['user'], 'AUDIOSTORE', 'LOAD', 'manualupload', $fileName . ' ' . filesize($FilePath), $database->last(), '', $_SESSION['CurrentLogin']['user_group']);

            $resultResponse = response(1, 0, 'File has been successfully updated!!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'This user does not exist!!', NULL);
        }
    } elseif ($_GET['action'] == 'AudioDelete') {
        $AdminLogID = $_POST['AdminLogID'];
        $AdminLogFileID = $_POST['AdminLogFileID'];
        $countExist = $database->delete('vicidial_admin_log', ['admin_log_id' => $AdminLogID]);
        unlink("/srv/www/htdocs/" . $SS_SoundsWebDirectory . "/" . $AdminLogFileID);
        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully deleted!!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'AUDIOSTORE', 'DELETE', 'manualupload', $AdminLogID, $database->last(), 'File Delete', '--All--');
    } elseif ($_GET['action'] == 'GetTemplates') {
        $data = $database->select('vicidial_conf_templates', '*');

        foreach ($data as $key => $val) {
            if(checkRole('admin_settings', 'edit')) {
                $data[$key]['Action'] = '<a href="javascript:void(0);" class="btn btn-success btn-app CONF-Template-Action" action="edit" TemplateID="' . $val['template_id'] . '" ><i class="fa fa-arrow-right"></i></a>';
            } else {
                $data[$key]['Action'] = '';
            } if(checkRole('admin_settings', 'delete')) {
                $data[$key]['Action'] .= '<a href="javascript:void(0);" class="btn btn-danger btn-app CONF-Template-Action" action="delete" TemplateID="' . $val['template_id'] . '" ><i class="fa fa-times"></i></a>';
            } else {
                $data[$key]['Action'] = '';
            }
        }

        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'RemoveTemplates') {
        $TemplateID = $_POST['TemplateID'];
        $countExist = $database->delete('vicidial_conf_templates', ['template_id' => $TemplateID]);
        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'InsertTemplate') {
        $TemplateID = $_POST['template_id'];
        $TemplateName = $_POST['template_name'];
        $TemplateContents = $_POST['template_contents'];
        $UserGroup = $_POST['user_group'];
        if (!empty($_POST['action']) && $_POST['action'] == 'edit') {
            $arrayInsert = [];
            $arrayInsert['template_name'] = $TemplateName;
            $arrayInsert['template_contents'] = $TemplateContents;
            $arrayInsert['user_group'] = $UserGroup;
            $countExist = $database->update('vicidial_conf_templates', $arrayInsert, ['template_id' => $TemplateID]);
            if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {

            $SaveExist = $database->count('vicidial_conf_templates', ['template_id' => $TemplateID]);

            if (!empty($SaveExist) && $SaveExist > 0) {
                $resultResponse = response(0, 1, 'Already Exist!!', NULL);
            } else {
                $arrayInsert = [];
                $arrayInsert['template_id'] = $TemplateID;
                $arrayInsert['template_name'] = $TemplateName;
                $arrayInsert['template_contents'] = $TemplateContents;
                $arrayInsert['user_group'] = $UserGroup;
                $countExist = $database->insert('vicidial_conf_templates', $arrayInsert);
                if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
                    $resultResponse = response(1, 0, 'Successfully created!!', NULL);
                } else {
                    $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
                }
            }
        }
    } elseif ($_GET['action'] == 'DetailTemplates') {
        $TemplateID = $_POST['TemplateID'];
        $data = $database->get('vicidial_conf_templates', '*', ['template_id' => $TemplateID]);
        $resultResponse = response(1, 0, 'Successfully found!!', $data);
    } elseif ($_GET['action'] == 'GetServers') {
        $data = $database->select('servers', ['server_id', 'server_description', 'server_ip', 'active', 'asterisk_version', 'outbound_calls_per_second', 'web_socket_url', 'active_asterisk_server', 'active_agent_login_server']);
        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'RemoveServers') {
        $ServerID = $_POST['ServerID'];
        $countExist = $database->delete('servers', ['server_id' => $ServerID]);
        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'InsertServers') {

        $ServerID = $_POST['server_id'];
        $ServerDescription = $_POST['server_description'];
        $ServerIP = $_POST['server_ip'];
        $AsteriskVersion = $_POST['asterisk_version'];
        $OutboundCallsPerSecond = $_POST['outbound_calls_per_second'];
        $WebSocketURL = $_POST['web_socket_url'];
        $UserGroup = $_POST['user_group'];
        $max_vicidial_trunks = $_POST['max_vicidial_trunks'];
        $external_server_ip = $_POST['external_server_ip'];
        $vicidial_recording_limit = $_POST['vicidial_recording_limit'];

        if (!empty($_POST['action']) && $_POST['action'] == 'edit') {

            $arrayInsert = [];
            $arrayInsert['server_id'] = $ServerID;
            $arrayInsert['server_description'] = $ServerDescription;
            $arrayInsert['server_ip'] = $ServerIP;
            $arrayInsert['asterisk_version'] = $AsteriskVersion;
            $arrayInsert['outbound_calls_per_second'] = $OutboundCallsPerSecond;
            $arrayInsert['web_socket_url'] = $WebSocketURL;
            $arrayInsert['user_group'] = $UserGroup;
            $arrayInsert['max_vicidial_trunks'] = $max_vicidial_trunks;
            $arrayInsert['external_server_ip'] = $external_server_ip;
            $arrayInsert['vicidial_recording_limit'] = $vicidial_recording_limit;

            $countExist = $database->update('servers', $arrayInsert, ['server_id' => $ServerID]);
            if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {

            $SaveExist = $database->count('servers', ['server_id' => $ServerID]);

            if (!empty($SaveExist) && $SaveExist > 0) {
                $resultResponse = response(0, 1, 'Already Exist!!', NULL);
            } else {
                $arrayInsert = [];
                $arrayInsert['server_id'] = $ServerID;
                $arrayInsert['server_description'] = $ServerDescription;
                $arrayInsert['server_ip'] = $ServerIP;
                $arrayInsert['asterisk_version'] = $AsteriskVersion;
                $arrayInsert['outbound_calls_per_second'] = $OutboundCallsPerSecond;
                $arrayInsert['web_socket_url'] = $WebSocketURL;
                $arrayInsert['user_group'] = $UserGroup;
                $arrayInsert['active'] = 'N';
                $arrayInsert['active_asterisk_server'] = 'N';
                $arrayInsert['active_agent_login_server'] = 'N';
                $arrayInsert['max_vicidial_trunks'] = $max_vicidial_trunks;
                $arrayInsert['external_server_ip'] = $external_server_ip;
                $arrayInsert['vicidial_recording_limit'] = $vicidial_recording_limit;

                $countExist = $database->insert('servers', $arrayInsert);
                if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
                    $resultResponse = response(1, 0, 'Successfully created!!', NULL);
                } else {
                    $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
                }
            }
        }
    } elseif ($_GET['action'] == 'DetailServers') {
        $ServerID = $_POST['ServerID'];
        $data = $database->get('servers', ['server_id','max_vicidial_trunks', 'external_server_ip', 'vicidial_recording_limit', 'server_description', 'server_ip', 'active', 'asterisk_version', 'outbound_calls_per_second', 'web_socket_url', 'active_asterisk_server', 'active_agent_login_server', 'user_group'], ['server_id' => $ServerID]);
        $resultResponse = response(1, 0, 'Successfully found!!', $data);
    } elseif ($_GET['action'] == 'UpdateServers') {
        $ServerID = $_POST['ServerID'];
        $value = $_POST['value'];
        $ServerColumn = $_POST['ServerColumn'];
        $countExist = $database->update('servers', [$ServerColumn => $value], ['server_id' => $ServerID]);
        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'GetVoiceMail') {
        if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
            $data = $database->select("vicidial_voicemail", '*');
        } else {
            $data = $database->select("vicidial_voicemail", '*', ['user_group' => $_SESSION['CurrentLogin']['allowed_teams_access']]);
        }
        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'LOAD', '', '', $database->last(), 'VOICEMAIL', '--All--');
    } elseif ($_GET['action'] == 'SaveVoicemail') {

        if (!empty($_POST['action']) && $_POST['action'] == 'edit') {
            $VoiceMail = $_POST['voicemail_id'];
            unset($_POST['voicemail_id']);
            unset($_POST['action']);
            $data = $database->update('vicidial_voicemail', $_POST, ['voicemail_id' => $VoiceMail]);
            if (!empty($data->rowCount()) && $data->rowCount()) {
                $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
                admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'MODIFY', $VoiceMail, '', $database->last(), 'VOICEMAIL', '--All--');
            } else {
                $resultResponse = response(0, 1, 'something gonna wrong!!', NULL);
            }
        } else {
            $VoiceMail = $_POST['voicemail_id'];
            $Exist = $database->count('vicidial_voicemail', ['voicemail_id' => $VoiceMail]);
            if (!empty($Exist) && $Exist > 1) {
                $resultResponse = response(0, 1, 'Already exist!!', NULL);
            } else {
                unset($_POST['action']);
                $data = $database->insert('vicidial_voicemail', $_POST);

                if (!empty($data->rowCount()) && $data->rowCount()) {
                    $stmtA = $database->last();
                    $resultResponse = response(1, 0, 'Successfully saved!!', NULL);
                    admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'ADD', $VoiceMail, '', $database->last(), 'VOICEMAIL', '--All--');

                    /* START */
                    $stmt = "SELECT active_voicemail_server from system_settings;";
                    $rslt = mysql_to_mysqli($stmt, $link);
                    $row = mysqli_fetch_row($rslt);
                    $active_voicemail_server = $row[0];

                    $stmtB = "UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$active_voicemail_server';";
                    $rslt = mysql_to_mysqli($stmtB, $link);

                    ### LOG INSERTION Admin Log Table ###
                    $SQL_log = "$stmtA|$stmtB|";
                    $SQL_log = preg_replace('/;/', '', $SQL_log);
                    $SQL_log = addslashes($SQL_log);
//                    $stmt="INSERT INTO vicidial_admin_log set event_date='".date('Y-m-d H:i:s')."', user='$PHP_AUTH_USER', ip_address='$ip', event_section='VOICEMAIL', event_type='ADD', record_id='$VoiceMail', event_code='ADMIN ADD VOICEMAIL', event_sql=\"$SQL_log\", event_notes='';";
                    admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'ADD', $VoiceMail, 'ADMIN ADD VOICEMAIL', $SQL_log, '', $_SESSION['CurrentLogin']['user_group']);
                    /* END */
                } else {
                    $resultResponse = response(0, 1, 'something gonna wrong!!', NULL);
                }
            }
        }
    } elseif ($_GET['action'] == 'DetailVoicemail') {
        $VoicemailID = $_POST['VoicemailID'];
        $data = $database->get('vicidial_voicemail', '*', ['voicemail_id' => $VoicemailID]);
        $resultResponse = response(1, 0, 'Successfully found!!', $data);
        admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'LOAD', $VoicemailID, '', $database->last(), 'VOICEMAIL', '--All--');
    } elseif ($_GET['action'] == 'DeleteVoicemail') {
        $VoicemailID = $_POST['VoicemailID'];
        $countExist = $database->delete('vicidial_voicemail', ['voicemail_id' => $VoicemailID]);
        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully deleted!!', NULL);
            admin_log_insert($database, @$_SESSION['Login']['user'], 'VOICEMAIL', 'DELETE', $VoicemailID, '', $database->last(), 'VOICEMAIL', '--All--');
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'GetEmailAccounts') {
        if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
            $data = $database->select("vicidial_email_accounts", '*');
        } else {
            $data = $database->select("vicidial_email_accounts", '*', ['user_group' => $_SESSION['CurrentLogin']['user_group']]);
        }

        foreach ($data as $k => $value) {
            $count = $database->count('vicidial_email_list', ['AND' => ['status' => 'NEW', 'email_account_id' => $value['email_account_id']]]);
            if (!empty($count) && $count >= 0) {
                $data[$k]['UnreadEmail'] = $count;
            } else {
                $data[$k]['UnreadEmail'] = 0;
            }
        }

        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'InsertEmailAccounts') {
        $EmailAccountID = $_POST['email_account_id'];
        $EmailAccountName = $_POST['email_account_name'];
        $EmailAccountDescription = $_POST['email_account_description'];
        $Protocol = $_POST['protocol'];
        $Pop3AuthMode = $_POST['pop3_auth_mode'];
        $EmailReplytoAddress = $_POST['email_replyto_address'];
        $EmailAccountServer = $_POST['email_account_server'];
        $EmailAccountUser = $_POST['email_account_user'];
        $EmailAccountPass = $_POST['email_account_pass'];
        $EmailFrequencyCheckMins = $_POST['email_frequency_check_mins'];
        $GroupID = $_POST['group_id'];
        $DefaultListID = $_POST['default_list_id'];
        $ListID = $_POST['list_id'];
        $CampaignID = $_POST['campaign_id'];
        $UserGroup = $_POST['user_group'];
        $Active = $_POST['active'];
        $EmailAccountType = 'INBOUND';
        $AgentSearchMethod = 'LB';
        $CallHandleMethod = 'EMAIL';

        $dataExist = $database->count('vicidial_email_accounts', ['email_account_id' => $EmailAccountID]);
        if (!empty($dataExist) && $dataExist > 0) {
            $resultResponse = response(0, 1, 'Already Exist!!', $dataExist);
        } else {
            $InsertArray = [];
            $InsertArray['email_account_id'] = $EmailAccountID;
            $InsertArray['email_account_name'] = $EmailAccountName;
            $InsertArray['email_account_description'] = $EmailAccountDescription;
            $InsertArray['protocol'] = $Protocol;
            $InsertArray['pop3_auth_mode'] = $Pop3AuthMode;
            $InsertArray['email_replyto_address'] = $EmailReplytoAddress;
            $InsertArray['email_account_server'] = $EmailAccountServer;
            $InsertArray['email_account_user'] = $EmailAccountUser;
            $InsertArray['email_account_pass'] = $EmailAccountPass;
            $InsertArray['email_frequency_check_mins'] = $EmailFrequencyCheckMins;
            $InsertArray['group_id'] = $GroupID;
            $InsertArray['default_list_id'] = $DefaultListID;
            $InsertArray['list_id'] = $ListID;
            $InsertArray['campaign_id'] = $CampaignID;
            $InsertArray['user_group'] = $UserGroup;
            $InsertArray['active'] = $Active;
            $InsertArray['email_account_type'] = $EmailAccountType;
            $InsertArray['agent_search_method'] = $AgentSearchMethod;
            $InsertArray['call_handle_method'] = $CallHandleMethod;
            $countExist = $database->insert('vicidial_email_accounts', $InsertArray);

            $responseData = [];
            $responseData['EmailAccountID'] = $EmailAccountID;
            $responseData['EmailAccountName'] = $EmailAccountName;
            if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully created!!', $responseData);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['action'] == 'UpdateEmailAccounts') {
        $EmailAccountID = $_GET['editID'];

        $EmailAccountName = $_POST['email_account_name'];
        $EmailAccountDescription = $_POST['email_account_description'];
        $Protocol = $_POST['protocol'];
        $Pop3AuthMode = $_POST['pop3_auth_mode'];
        $EmailReplytoAddress = $_POST['email_replyto_address'];
        $EmailAccountServer = $_POST['email_account_server'];
        $EmailAccountUser = $_POST['email_account_user'];
        $EmailAccountPass = $_POST['email_account_pass'];
        $EmailFrequencyCheckMins = $_POST['email_frequency_check_mins'];
        $GroupID = $_POST['group_id'];
        $DefaultListID = $_POST['default_list_id'];
        $ListID = $_POST['list_id'];
        $CampaignID = $_POST['campaign_id'];
        $UserGroup = $_POST['user_group'];
        $Active = $_POST['active'];
        $EmailAccountType = 'INBOUND';
        $AgentSearchMethod = 'LB';
        $CallHandleMethod = 'EMAIL';


        $InsertArray = [];
        $InsertArray['email_account_name'] = $EmailAccountName;
        $InsertArray['email_account_description'] = $EmailAccountDescription;
        $InsertArray['protocol'] = $Protocol;
        $InsertArray['pop3_auth_mode'] = $Pop3AuthMode;
        $InsertArray['email_replyto_address'] = $EmailReplytoAddress;
        $InsertArray['email_account_server'] = $EmailAccountServer;
        $InsertArray['email_account_user'] = $EmailAccountUser;
        $InsertArray['email_account_pass'] = $EmailAccountPass;
        $InsertArray['email_frequency_check_mins'] = $EmailFrequencyCheckMins;
        $InsertArray['group_id'] = $GroupID;
        $InsertArray['default_list_id'] = $DefaultListID;
        $InsertArray['list_id'] = $ListID;
        $InsertArray['campaign_id'] = $CampaignID;
        $InsertArray['user_group'] = $UserGroup;
        $InsertArray['active'] = $Active;
        $InsertArray['email_account_type'] = $EmailAccountType;
        $InsertArray['agent_search_method'] = $AgentSearchMethod;
        $InsertArray['call_handle_method'] = $CallHandleMethod;
        $countExist = $database->update('vicidial_email_accounts', $InsertArray, ['email_account_id' => $EmailAccountID]);

        if (!empty($countExist->rowCount()) && $countExist->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully updated!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'RemoveEmailAccounts') {
        $EmailAccountID = $_POST['EmailAccountID'];
        $dataSave = $database->delete('vicidial_email_accounts', ['email_account_id' => $EmailAccountID]);
        if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Successfully Deleted!!', NULL);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } elseif ($_GET['action'] == 'ChatAccount') {
        $data = $database->query("select * from chat_authentications")->fetchAll();
        foreach ($data as $key => $val) {
            $active = ($val['status'] == 'Y') ? 'active' : '';
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle CHAT-STATUS ' . $active . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" value="1">
                                            <div class="handle"></div>
                                      </button>';
//            $data[$key]['Action'] = '';
            $data[$key]['Action'] = '<a class="btn text-white btn-app btn-success CHAT-Perform" action="edit" id="' . $val['id'] . '" CHAT-user="' . $val['user'] . '" CHAT-website="' . $val['website'] . '" CHAT-app="' . $val['app_id'] . '" CHAT-db="' . $val['db_ip'] . '" CHAT-status="' . $val['status'] . '" title="Edit CHAT Account"><i class="fa fa-arrow-right"></i></a><a class="btn text-white btn-app btn-danger CHAT-Perform" action="delete" id="' . $val['id'] . '" title="Remove CHAT Account"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
//    admin_log_insert($DBEmail, @$_SESSION['Login']['user'], 'LIVECHAT', 'SELECT', '', 'SELECT - ROLE', $DBEmail->last(), 'Role SELECT', '--All--');
    } elseif ($_GET['action'] == 'StatusChatAccount') {
        $ID = $_POST['ID'];
        $value = $_POST['value'];
        if ($value == 'Y') {
            $Update = $database->update('chat_authentications', ['status' => 'Y'], ['id' => $ID]);
        } else {
            $Update = $database->update('chat_authentications', ['status' => 'N'], ['id' => $ID]);
        }

        if (!empty($Update->rowCount()) && $Update->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Sucessfully Updated!!', null);
        } else {
            $resultResponse = response(1, 0, 'Something gonna wrong!!', null);
        }
    }elseif($_GET['action'] == 'AddChatAccount'){
        if(!empty($_POST['id']) && $_POST['id'] > 0){
            $User = $_POST['user'];
            $Website = $_POST['website'];
            $APP_ID = $_POST['app_id'];
            $DB_IP = $_POST['db_ip'];
            $data = $database->update('chat_authentications', ['user' => $User, 'website' => $Website, 'app_id' => $APP_ID, 'db_ip' => $DB_IP, 'status' => 'N', 'updated_at' => date('Y-m-d H:i:s')],['id'=>$_POST['id']]);
            $resultResponse = response(1, 0, 'Sucessfully Updated!!', null);
        }else{

            $User = $_POST['user'];
            $Website = $_POST['website'];
            $APP_ID = $_POST['app_id'];
            $DB_IP = $_POST['db_ip'];
            $data = $database->insert('chat_authentications', ['user' => $User, 'website' => $Website, 'app_id' => $APP_ID, 'db_ip' => $DB_IP, 'status' => 'N', 'created_at' => date('Y-m-d H:i:s')]);
            $resultResponse = response(1, 0, 'Sucessfully Created!!', null);
        }
    }elseif($_GET['action'] == 'RemoveChatAccount'){
        $ID = $_POST['ID'];
        $Update = $database->delete('chat_authentications',['id'=>$ID]);
        if(!empty($Update->rowCount()) && $Update->rowCount() > 0){
            $resultResponse = response(1, 0, 'Sucessfully Deleted!!', null);
        }else{
            $resultResponse = response(1, 0, 'Something gonna wrong!!', null);
        }
    }
    echo json_encode($resultResponse);
}
