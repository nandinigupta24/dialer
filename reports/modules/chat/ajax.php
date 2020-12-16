<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($_GET['action'] == 'chatfind'){
   $ChatID = $_POST['ChatID'];
   
   $Query = "SELECT VCA.chat_id,VCA.chat_start_time,VCA.status,VCA.chat_creator,VCA.group_id,VCA.lead_id,VL.phone_number,VL.first_name,VL.last_name FROM vicidial_chat_archive VCA JOIN vicidial_list VL ON VL.lead_id = VCA.lead_id WHERE VCA.chat_id = '".$ChatID."'";
   $ChatDetails = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);
   
   $ChatConversation = $database->select('vicidial_chat_log_archive', '*', ['chat_id' => $ChatID, 'ORDER' => ['message_time' => 'ASC']]);
   
   $End = end($ChatConversation);
  
   require 'ChatArea.php';
   
   exit;
}elseif($_GET['action'] == 'SidebarRight'){
    $ChatID = $_POST['ChatID'];
    $Query = "SELECT VCA.chat_id,VCA.chat_start_time,VCA.status,VCA.chat_creator,VCA.group_id,VCA.lead_id,VL.phone_number,VL.first_name,VL.last_name,VL.email FROM vicidial_chat_archive VCA JOIN vicidial_list VL ON VL.lead_id = VCA.lead_id WHERE VCA.chat_id = '".$ChatID."'";
    $ChatDetails = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    
    require 'ChatSidebar.php';
    exit;
}else{
    
}