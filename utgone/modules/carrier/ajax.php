<?php

$result = [];
if (isset($_GET['action']) && $_GET['action'] == 'GetCarrier') {
    $data = $database->query("select * from vicidial_server_carriers;")->fetchAll();
    foreach ($data as $key => $val) {
        if ($val['active'] == 'Y') {
            $RecordCall = 'active';
        } else {
            $RecordCall = '';
        }
        $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive ' . $RecordCall . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['carrier_id'] . '" data-field="active" value="1">
			<div class="handle"></div> </button>';
            if(checkRole('admin_settings', 'edit')) {
                $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white" href="' . base_url('carrier/edit?carrier_id=' . $val['carrier_id']) . '"><i class="fa fa-arrow-right" title="Edit Carrier Settings"></i></a>
            <a class="btn btn-app btn-info text-white" href="' . base_url('carrier/copy?carrier_id=' . $val['carrier_id']) . '"><i class="fa fa-copy" title="Copy Carrier Settings"></i></a>';
        
                } else {
                    $data[$key]['Action'] = '';
                } if(checkRole('admin_settings', 'delete')) {
                    $data[$key]['Action'] .= '<a class="btn btn-app btn-danger text-white" onclick="return deleteItem(\'' . $val['carrier_id'] . '\')"><i class="fa fa-times" title="Remove"></i></a>';
                } else {
                    $data[$key]['Action'] = '';
                }
    }
    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal"    => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'GET', '', 'GET - ROLE', $database->last(), 'Role GET', '--All--');
} elseif ($_GET['action'] == 'Insert') {
    $carrier_id = $_POST['carrier_id'];

    $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) == 0) {
        $carrier_name = $_POST['carrier_name'];
        $registration_string = $_POST['registration_string'];
        $account_entry = $_POST['account_entry'];
        $dialplan_entry = $_POST['dialplan_entry'];
        $server_ip = $_POST['server_ip'];
        $user_group = $_POST['user_group'];
        $template_id = $_POST['template_id'];
        $protocol = $_POST['protocol'];
        $active = $_POST['active'];
//      $globals_string=$_POST['globals_string'];
        $globals_string = '';
        $carrier_description = $_POST['carrier_description'];
        $data = $database->insert('vicidial_server_carriers', ['carrier_id' => $carrier_id, 'carrier_name' => $carrier_name, 'registration_string' => $registration_string, 'account_entry' => $account_entry, 'dialplan_entry' => $dialplan_entry, 'server_ip' => $server_ip, 'user_group' => $user_group, 'template_id' => $template_id, 'protocol' => $protocol, 'globals_string' => $globals_string, 'carrier_description' => $carrier_description]);
        $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $server_ip, 'active_asterisk_server' => 'Y', 'generate_vicidial_conf' => 'Y']]);
//      "UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$server_ip';";
        $resultResponse = response(1, 0, 'Carrier Sucessfully Created', null);
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'INSERT', '$carrier_id', 'INSERT - ROLE', $database->last(), 'Role INSERT', '--All--');
    } else {
        $resultResponse = response(0, 1, 'Carrier ID already exists', null);
    }
} elseif ($_GET['action'] == 'Update') {
    if(!checkRole('admin_settings', 'edit')) { die(json_encode( results('error','No Permission!!',NULL) )); }
    $ID = $_POST['id'];
    $Field = $_POST['field'];
    $value = $_POST['value'];
    $data = $database->update('vicidial_server_carriers', [$Field => $value], ['carrier_id' => $ID]);
    $resultResponse = response(1, 0, 'Sucessfully Update', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'UPDATE', '$ID', 'UPDATE - ROLE', $database->last(), 'Role UPDATE', '--All--');
} elseif ($_GET['action'] == 'updateentry') {
//    pr($_POST);
//    exit;
    $carrier_id = $_POST['carrier_id'];
    if (isset($_GET['copy']) && $_GET['copy'] == 1) {
        $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) >= 0) {
            $resultResponse = response(0, 1, 'Carrier ID already exists', null);
            die;
        }
    }

    $carrier_name = $_POST['carrier_name'];
    $registration_string = $_POST['registration_string'];
    $account_entry = $_POST['account_entry'];
    $dialplan_entry = $_POST['dialplan_entry'];
    $server_ip = $_POST['server_ip'];
    $user_group = $_POST['user_group'];
    $template_id = $_POST['template_id'];
    $protocol = $_POST['protocol'];
    $active = $_POST['active'];
//        $globals_string=$_POST['globals_string'];
    $globals_string = '';
    $carrier_description = $_POST['carrier_description'];
    $data = $database->update('vicidial_server_carriers', ['carrier_name' => $carrier_name, 'registration_string' => $registration_string, 'account_entry' => $account_entry, 'dialplan_entry' => $dialplan_entry, 'server_ip' => $server_ip, 'user_group' => $user_group, 'template_id' => $template_id, 'protocol' => $protocol, 'globals_string' => $globals_string, 'carrier_description' => $carrier_description], ['carrier_id' => $carrier_id]);
    $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $server_ip, 'active_asterisk_server' => 'Y', 'generate_vicidial_conf' => 'Y']]);
    $resultResponse = response(1, 0, 'Carrier Sucessfully Updated', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'update', '$carrier_id', 'update - ROLE', $database->last(), 'Role update', '--All--');
} elseif ($_GET['action'] == 'remove') {
    $carrier_id = $_POST['carrier_id'];

    $data = $database->delete('vicidial_server_carriers', ['carrier_id' => $carrier_id]);

    if (!empty($data->rowCount()) && $data->rowCount() > 0) {
        $result = results('success', 'Successfully deleted!!', NULL);
    } else {
        $result = results('error', 'Something gonna wrong!!', NULL);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'CARRIER', 'REMOVE', $ID, 'REMOVE - Recycle Rule', $database->last(), 'Recycle Rule UPDATE', '--All--');
} elseif ($_GET['action'] == 'InsertAgain') {
    $carrier_id = $_POST['carrier_id'];
    $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) == 0) {

        $carrier_name = $_POST['carrier_name'];
        $registration_string = $_POST['registration_string'];
        $account_entry = $_POST['account_entry'];
        $dialplan_entry = $_POST['dialplan_entry'];
        $server_ip = $_POST['server_ip'];
        $user_group = $_POST['user_group'];
        $template_id = '--NONE--';
        $protocol = $_POST['protocol'];
        $active = $_POST['active'];
//      $globals_string=$_POST['globals_string'];
        $globals_string = '';
        $carrier_description = $_POST['carrier_description'];
        $data = $database->insert('vicidial_server_carriers', ['carrier_id' => $carrier_id, 'carrier_name' => $carrier_name, 'registration_string' => $registration_string, 'account_entry' => $account_entry, 'dialplan_entry' => $dialplan_entry, 'server_ip' => $server_ip, 'user_group' => $user_group, 'template_id' => $template_id, 'protocol' => $protocol, 'globals_string' => $globals_string, 'carrier_description' => $carrier_description, 'dial_prefix' => $_POST['dial_prefix']]);
        $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $server_ip, 'active_asterisk_server' => 'Y', 'generate_vicidial_conf' => 'Y']]);
//      "UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$server_ip';";
        $resultResponse = response(1, 0, 'Carrier Sucessfully Created', null);
        admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'INSERT', '$carrier_id', 'INSERT - ROLE', $database->last(), 'Role INSERT', '--All--');
    } else {
        $resultResponse = response(0, 1, 'Carrier ID already exists', null);
    }
} elseif ($_GET['action'] == 'Update_Carrier') {
    
    $carrier_id = $_POST['carrier_id'];
    if (isset($_GET['copy']) && $_GET['copy'] == 1) {
        $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) >= 0) {
            $resultResponse = response(0, 1, 'Carrier ID already exists', null);
            die;
        }
    }

    $carrier_name = $_POST['carrier_name'];
    $registration_string = $_POST['registration_string'];
    $account_entry = $_POST['account_entry'];
    $dialplan_entry = $_POST['dialplan_entry'];
    $server_ip = $_POST['server_ip'];
    $user_group = $_POST['user_group'];
    $template_id = '--NONE--';
    $protocol = $_POST['protocol'];
    $active = $_POST['active'];
//        $globals_string=$_POST['globals_string'];
    $globals_string = '';
    $carrier_description = $_POST['carrier_description'];
    $data = $database->update('vicidial_server_carriers', ['carrier_name' => $carrier_name, 'registration_string' => $registration_string, 'account_entry' => $account_entry, 'dialplan_entry' => $dialplan_entry, 'server_ip' => $server_ip, 'user_group' => $user_group, 'template_id' => $template_id, 'protocol' => $protocol, 'globals_string' => $globals_string, 'carrier_description' => $carrier_description,'active'=>$active], ['carrier_id' => $carrier_id]);
    $database->update('servers', ['rebuild_conf_files' => 'Y'], ['AND' => ['server_ip' => $server_ip, 'active_asterisk_server' => 'Y', 'generate_vicidial_conf' => 'Y']]);
    $resultResponse = response(1, 0, 'Carrier Sucessfully Updated', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'update', '$carrier_id', 'update - ROLE', $database->last(), 'Role update', '--All--');
}


echo json_encode($resultResponse);
