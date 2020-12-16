<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require 'Medoo.php';
require 'global.php';
use Medoo\Medoo;

if (!session_id()) {
    session_start();
}


$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'asterisk',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);

$DBSQLDialing = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sql_dialing',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);

$DBEmail = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'email',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);

$DBSMS = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sms',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);

$DBUTG = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'UTG',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);


if (!empty($_SESSION['Login']['user'])) {
    $RoleExist = $database->get('vicidial_users', 'role_id', ['user' => $_SESSION['Login']['user']]);
    $RolePermission = $DBUTG->select('role_permissions', ['module_id', 'create', 'edit', 'view', 'delete'], ['role_id' => $RoleExist]);
}

function get_permission_2($Permission, $moduleID, $action) {
    $ArraySearch = array_search($moduleID, array_column($Permission, 'module_id'));
    return $Permission[$ArraySearch][$action];
}

//function get_phone_validation($phone) {
//    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
//        return 'success';
//    } else {
//        return 'failed';
//    }
//}

function get_explode_template($StandardVariables) {
    $Variables = explode('|', $StandardVariables);
    foreach ($Variables as $k => $v) {
        unset($Variables[$k]);
        if (!empty($v)) {
            $Explode = explode(',', $v);
            $Variables[$Explode[0]] = $Explode[1];
        }
    }
    return $Variables;
}

function TimeToSec($time) {
    $sec = 0;
    foreach (array_reverse(explode(':', $time)) as $k => $v)
        $sec += pow(60, $k) * $v;
    return $sec;
}

function results($status, $message, $data) {
    $result = [];
    $result['status'] = $status;
    $result['message'] = $message;
    $result['data'] = $data;
    return $result;
}

function get_validation($type, $tableSyntax, $operator) {
    $OperatorAssign = '';
    if ($operator != NULL) {
        $OperatorAssign = ' ' . $operator . ' ';
    }
    $UserGroup = $_SESSION['CurrentLogin']['user_group'];

    if ($UserGroup == 'ADMIN') {
        $query = '';
    } else {
        switch ($type) {
            case 'agent':
                $query = $OperatorAssign . $tableSyntax . ".user_group = '" . $UserGroup . "'";
                break;
            case 'campaign':
                $query = $OperatorAssign . $tableSyntax . ".campaign_id IN ('" . implode("','", $_SESSION['CurrentLogin']['Campaign']) . "')";
                break;
            case 'list':
                $query = $OperatorAssign . $tableSyntax . ".campaign_id IN ('" . implode("','", $_SESSION['CurrentLogin']['Campaign']) . "')";
                break;
            default:
        }
    }
    return $query;
}

function get_validation_cron($database, $type, $tableSyntax, $operator, $UserID) {
    $OperatorAssign = '';
    if ($operator != NULL) {
        $OperatorAssign = ' ' . $operator . ' ';
    }

    $UserDetail = $database->get('vicidial_users', ['user', 'full_name', 'user_level', 'user_group', 'role_id', 'user_id'], ['user_id' => $UserID]);
    $UserGroup = $database->get('vicidial_user_groups', ['allowed_campaigns'], ['user_group' => $UserDetail['user_group']]);

    $LOGallowed_campaigns = $UserGroup['allowed_campaigns'];
    if (strpos($LOGallowed_campaigns, 'ALL-CAMPAIGNS') !== false) {
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id']);
        $Campaign = [];
        foreach ($CampaignListings as $value) {
            $Campaign[] = $value['campaign_id'];
        }
    } else {
        $Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
    }

    $Campaign = $Campaign;
    $UserGroup = $UserDetail['user_group'];

    if ($UserGroup == 'ADMIN') {
        $query = '';
    } else {
        switch ($type) {
            case 'agent':
                $query = $OperatorAssign . $tableSyntax . ".user_group = '" . $UserGroup . "'";
                break;
            case 'campaign':
                $query = $OperatorAssign . $tableSyntax . ".campaign_id IN ('" . implode("','", $Campaign) . "')";
                break;
            case 'list':
                $query = $OperatorAssign . $tableSyntax . ".campaign_id IN ('" . implode("','", $Campaign) . "')";
                break;
            default:
        }
    }
    return $query;
}

function create_csv($list) {

    $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/db/file.csv', 'w+');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}

function create_csv_data($data) {
    $fp = fopen('file.csv', 'w+');
    fputcsv($fp, $data);
    fclose($fp);
}


function get_phone_validation($phone) {
//    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
//       return 'success';
//    }else{
//        return 'failed';
//    }
    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
       return 'success';
    }else{
        if (preg_match("/^[44][1-9]\d{10}$/", $phone)) {
            return 'success';
        }else{
            return 'failed';
        }
    }
}
?>
