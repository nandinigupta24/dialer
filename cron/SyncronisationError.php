<?php
echo 'HELLO';
exit;    
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require '../db/database.php';



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
//SERVER DETAIL
      
      
$stmt = "SELECT UNIX_TIMESTAMP(last_update),UNIX_TIMESTAMP(db_time) from server_updater";

$data = $database->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
print_r($data);
exit;

//1) $time_diff = ($server_epoch(UNIX_TIMESTAMP(last_update)) - $db_epoch(UNIX_TIMESTAMP(db_time)));
//
//2) $web_diff = ($db_epoch - $web_epoch);
//
//$web_epoch = date("U");
//$StarTtime = date("U");
//
//if ( ( ($time_diff > 15) or ($time_diff < -15) or ($web_diff > 15) or ($web_diff < -15) ) and (preg_match("/0\$/i",$StarTtime)) )

