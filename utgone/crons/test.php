<?php

include('../../db/global.php');
include('../includes/functions.php');
require 'library/twilio-php/Services/Twilio.php';

$AccountsDetails = $DBSMS->get('accounts', '*', ['active' => 'Y']);
if (empty($AccountsDetails)) {
    die('Account Detail does not exist!!');
}

$sid = $AccountsDetails['sid']; // Your Account SID from www.twilio.com/user/account
$token = $AccountsDetails['token']; // Your Auth Token from www.twilio.com/user/account

$client = new Services_Twilio($sid, $token);

echo '<pre>';
print_r($client);
exit;
$message = $client->account->messages->read( array("to" => $_SERVER['QUERY_STRING']),
    50);

print_r($message);
