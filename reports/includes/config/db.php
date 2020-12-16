<?php
require 'Medoo.php';

use Medoo\Medoo;
if(!session_id()){
session_start();
}

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'asterisk',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass
        ]);

$DBSQLDialing = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sql_dialing',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass
        ]);

$DBEmail = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'email',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass
        ]);

$DBSMS = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sms',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass
        ]);

$DBUTG = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'UTG',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass
        ]);

$DBScripts = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'Scripts',
    'server' => $DBHost,
    'username' => $DBUser,
    'password' => $DBPass,
    "logging" => true,
        ]);

if(!empty($_SESSION['Login']['user'])){
    $RoleExist = $database->get('vicidial_users','role_id',['user'=>$_SESSION['Login']['user']]);
    $RolePermission = $DBUTG->select('role_permissions',['module_id','create','edit','view','delete'],['role_id'=>$RoleExist]);    
}

?>

