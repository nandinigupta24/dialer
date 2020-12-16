<?php
require 'Medoo.php';

use Medoo\Medoo;
if(!session_id()){
session_start();
}

$database = $DBAsterisk = new Medoo([
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

//$DBCustomView = new Medoo([
//    'database_type' => 'mysql',
//    'database_name' => 'custom_view',
//    'server' => $DBHost,
//    'username' => $DBUser,
//    'password' => $DBPass
//        ]);



if(!empty($_SESSION['Login']['user'])){
    $RoleExist = $database->get('vicidial_users','role_id',['user'=>$_SESSION['Login']['user']]);
    $RolePermission = $DBUTG->select('role_permissions',['module_id','create','edit','view','delete'],['role_id'=>$RoleExist]);    
}
$VARDB_server = $DBHost;
$VARDB_port = '3306';
$VARDB_user = $DBUser;
$VARDB_pass = $DBPass;
$VARDB_database = 'asterisk';
$server_string = $VARDB_server;
$conn = $link = mysqli_connect($server_string, "$VARDB_user", "$VARDB_pass", "$VARDB_database", $VARDB_port);


$DB = [];
$DB['server'] = $DBHost;
$DB['user'] = $DBUser;
$DB['pass'] = $DBPass;
$DB['database'] = 'sql_dialing';
$DB['port'] = '3306';

// Create connection
$DBConn = new mysqli($DB['server'], $DB['user'], $DB['pass'], $DB['database']);
?>

