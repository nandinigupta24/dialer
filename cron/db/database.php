<?php

require 'Medoo.php';

use Medoo\Medoo;

if(!session_id()){
    session_start();
}

//
//$database = new Medoo([
//    'database_type' => 'mysql',
//    'database_name' => 'asterisk',
//    'server' => '10.68.68.5',
//    'username' => 'cron',
//    'password' => '1234'
//        ]);

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'asterisk',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

$DBSQLDialing = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sql_dialing',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

$DBEmail = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'email',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

$DBSMS = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sms',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

$DBUTG = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'UTG',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

$DBCustomView = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'custom_view',
    'server' => '10.68.68.5',
    'username' => 'ikcon',
    'password' => 'Blue369Pass'
        ]);

//function pr($array) {
//    echo '<pre>';
//    print_r($array);
//}
//print_r($LiveDatabase);
//exit;

if(!empty($_SESSION['Login']['user'])){
    $RoleExist = $database->get('vicidial_users','role_id',['user'=>$_SESSION['Login']['user']]);
    $RolePermission = $DBUTG->select('role_permissions',['module_id','create','edit','view','delete'],['role_id'=>$RoleExist]);
}

function get_permission_2($Permission,$moduleID,$action){
    $ArraySearch = array_search($moduleID, array_column($Permission, 'module_id'));
    return $Permission[$ArraySearch][$action];
}

function get_phone_validation($phone) {
    if (preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
       return 'success';
    }else{
        return 'failed';
    }
}

function get_explode_template($StandardVariables){
    $Variables = explode('|',$StandardVariables);
    foreach($Variables as $k=>$v){
        unset($Variables[$k]);
        if(!empty($v)){
            $Explode = explode(',',$v);
            $Variables[$Explode[0]] = $Explode[1];
        }
    }
    return $Variables;
}

function TimeToSec($time) {
    $sec = 0;
    foreach (array_reverse(explode(':', $time)) as $k => $v) $sec += pow(60, $k) * $v;
    return $sec;
}

function results($status, $message, $data) {
    $result = [];
    $result['status'] = $status;
    $result['message'] = $message;
    $result['data'] = $data;
    return $result;
}
?>
