<?php
$arrayRule = ['listing','add','delete','update'];

if (!empty($_GET['rule']) && in_array($_GET['rule'], $arrayRule)) {
  if ($_GET['rule'] == 'listing') {
    if(!checkRole('users', 'view')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }

    $data = $database->select('vicidial_remote_agents', ['remote_agent_id', 'user_start', 'number_of_lines', 'server_ip', 'conf_exten', 'extension_group', 'status', 'campaign_id']);
    $response = array(
        "draw" => intval(1),
        // "recordsTotal" => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
     admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'LOAD','', 'LOAD-USERS',$database->last(),'LOAD USERS','--All--');
  } elseif ($_GET['rule'] == 'add') {
    if(!checkRole('users', 'create')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
    $arrayInsert['user_start'] = $_POST['user_start'];
    $arrayInsert['number_of_lines'] = $_POST['number_of_lines'];
    $arrayInsert['server_ip'] = $_POST['server_ip'];
    $arrayInsert['conf_exten'] = $_POST['conf_exten'];
    $arrayInsert['campaign_id'] = $_POST['campaign_id'];
    $closer_campaigns = $_POST['closer_campaigns'];
    $groups_value='';
    $p=0;
    $count_closer = count($_POST['closer_campaigns']);
    while ($p < $count_closer) {
      $groups_value .= " $closer_campaigns[$p]";
      $p++;
    }

    $arrayInsert['closer_campaigns'] = $groups_value;

    $UserExist = $database->count('vicidial_remote_agents', ['server_ip' => $_POST['server_ip'], 'user_start' => $_POST['user_start']]);
    if($UserExist) {
      $response = response(0, 0, 'Remote Agent already Exist with this User ID!!', 'NULL');
    } else {
      $ListExist = $database->insert('vicidial_remote_agents', $arrayInsert);
      $AgentID = $database->id();
      $responseData = [];
      $responseData['AgentID'] = $AgentID;

      $response = response(1, 0, 'New Remote Agent has been created successfully!!', $responseData);
    }
  } elseif ($_GET['rule'] == 'delete') {
      $Condition = $_POST['userID'];
      $result = $database->delete('vicidial_remote_agents', ['remote_agent_id' => $Condition]);
      if ($result->rowCount() > 0) {
          $response = response(1, 0, 'This remote agent has been successfully deleted!!', NULL);
      } else {
          $response = response(0, 1, 'Oops!! No Updated!!', NULL);
      }
       admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'DELETE',$Condition,'DELETE-USERS',$database->last(),'DELETE USERS','--All--');
  } elseif ($_GET['rule'] == 'update') {
    if(!checkRole('users', 'edit')){ die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
    $remote_agent_id = $_POST['remote_agent_id'];
    $user_start = $_POST['user_start'];
    $number_of_lines = $_POST['number_of_lines'];
    $server_ip = $_POST['server_ip'];
    $conf_exten = $_POST['conf_exten'];
    $campaign_id = $_POST['campaign_id'];
    $extension_group = $_POST['extension_group'];
    $on_hook_agent = $_POST['on_hook_agent'];
    $on_hook_ring_time = $_POST['on_hook_ring_time'];

    $closer_campaigns = $_POST['closer_campaigns'];
    $groups_value='';
    $p=0;
    $count_closer = count($closer_campaigns);
    while ($p < $count_closer) {
      $groups_value .= " $closer_campaigns[$p]";
      $p++;
    }

    $result = $database->update('vicidial_remote_agents', ['user_start' => $user_start, 'number_of_lines' => $number_of_lines, 'server_ip' => $server_ip, 'conf_exten' => $conf_exten, 'campaign_id' => $campaign_id, 'extension_group' => $extension_group, 'on_hook_agent' => $on_hook_agent, 'on_hook_ring_time' => $on_hook_ring_time, 'closer_campaigns' => $groups_value],['remote_agent_id' => $remote_agent_id]);
    if ($result->rowCount() > 0) {
        $response = response(1, 0, 'Your user has been successfully updated!!', NULL);
    } else {
        $response = response(0, 1, 'Oops!! No Updated!!', NULL);
    }
  }
}

echo json_encode($response);
?>
