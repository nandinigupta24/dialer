<?php
$case = ['saveComment', 'showComment'];
if(!empty($_GET['case']) && isset($_GET['case']) && in_array($_GET['case'],$case)){

  if ($_GET['case'] == 'showComment'){

  $start = $_GET['start'];
  $end = $_GET['end'];
  if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
      $user_group = "AND VAL.user_group= '" . $_SESSION['CurrentLogin']['user_group'] . "'";
  } else {
  	$user_group = '';
  }
  $query = "SELECT CONCAT(VU.full_name,'(',VAL.user,')') as user,VAL.lead_id,VAL.campaign_id,VAL.event_time,VAL.status, VL.list_id,VL.phone_number,RL.filename,RL.recording_id,RL.location,RL.length_in_sec,RC.comments,RC.updated_at FROM UTG.call_recording_comment RC INNER JOIN recording_log RL ON RL.recording_id = RC.recording_id INNER JOIN vicidial_agent_log VAL ON VAL.dispo_epoch = RL.end_epoch and VAL.lead_id = RL.lead_id INNER JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id JOIN vicidial_users VU ON VAL.user = VU.user  WHERE updated_at BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' ".$user_group." ORDER BY RC.updated_at asc";
  $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
  $resultResponse = array(
      "draw" => intval(1),
      "data" => $data
  );
  echo json_encode($resultResponse);
} elseif ($_GET['case'] == 'saveComment') {
  $lead_id = $_POST['lead_id'];
  $admin_comment = $_POST['admin_comment'];
  $recording_id = $_POST['recording_id'];

  $record_count = $DBUTG->count('call_recording_comment', ['recording_id' => $recording_id]);
  if($record_count) {
    $data = $DBUTG->update('call_recording_comment',['comments'=>$admin_comment, 'lead_id'=>$lead_id, 'updated_at' => date('Y-m-d H:i:s')], ['recording_id' => $recording_id]);
  } else {
    $data = $DBUTG->insert('call_recording_comment',['recording_id' => $recording_id, 'comments'=>$admin_comment, 'lead_id'=>$lead_id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
  }
  if(!empty($data->rowCount()) && $data->rowCount() > 0){
     $result = results('success','Successfully added!!',NULL);
  } else{
     $result = results('error','Something gonna wrong!!',NULL);
  }
  echo json_encode($result);
}
}
