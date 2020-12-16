<?php

$result = [];
if ($_GET['action'] == 'GetInboundGroup') {
    if (!checkRole('inbound_groups', 'view')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $data = $database->select('vicidial_inbound_groups', ['group_id', 'group_name', 'group_color', 'active']);
    foreach ($data as $key => $val) {
//            $data[$key]['ID'] = '<select class="form-control"><option value="">Select <Option value="ID">ID</option></select>';
//            $data[$key]['Name'] = '<select class="form-control"><option value="">Select <Option value="Name">Name</option></select>';
//
        if ($val['active'] == 'Y') {
            $didactive = 'active';
        } else {
            $didactive = '';
        }
        if ($val['group_color'] == 'Y') {
            $groupcolor = 'active';
        } else {
            $groupcolor = '';
        }
//        $data[$key]['group_color'] = '<input type="text" class="text-slash Cxedit editable editable-click recordActive ' . $groupcolor . '"  value="' . $val['group_color'] . '"/>';
        $data[$key]['group_color'] = '<div class="form-group">
                <label>Color picker with addon:</label>
                <div class="input-group my-colorpicker2 colorpicker-element">
                  <input type="text" class="form-control field1">

                  <div class="input-group-addon">
                    <i class="ion ion-paintbucket" style="background-color: rgb(138, 36, 36);"></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>';

//             $data[$key]['record_call'] = '<button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="1002" value="1">
//					<div class="handle"></div>
//                                  </button>';
        $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle BTN-Switch ' . $didactive . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['group_id'] . '"  data-field="active">
					<div class="handle"></div>
                                  </button>';

        $action = '';
        if (checkRole('inbound_groups', 'edit')) {
            $action .= '<a href="' . base_url('inbound_groups/group_edit') . '"  class="btn btn-app btn-success text-white"><i class="fa fa-edit" title="Edit Settings"></i></a>';
        }
        if (checkRole('inbound_groups', 'delete')) {
            $action .= '<a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
        }

        $data[$key]['Action'] = $action;
//            $data[$key]['Queued'] = '';
//            $data[$key]['SentToday'] = '';
//            $data[$key]['SentTotal'] = '';
    }
    $resultResponse = array(
        "draw" => intval(1),
        "recordsTotal" => intval($totalRow),
        "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
    admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'INBOUNDGROUP', '', 'INBOUNDGROUP - ROLE', $database->last(), 'Role INBOUNDGROUP', '--All--');
} elseif ($_GET['action'] == 'Update') {
    if (!checkRole('inbound_groups', 'edit')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $RecordID = $_POST['RecordID'];
    $RecordField = $_POST['RecordField'];
    $RecordValue = $_POST['RecordValue'];
    $data = $database->update('vicidial_inbound_groups', [$RecordField => $RecordValue], ['group_id' => $RecordID]);

    $resultResponse = response(1, 0, 'Sucessfully Updated!!', null);

    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'MODIFY', $RecordID, 'MODIFY-INGROUPS-' . $RecordField, $database->last(), 'MODIFY INGROUPS', '--All--');
} elseif ($_GET['action'] == 'Insert') {
    if (!checkRole('inbound_groups', 'create')) {
        die(json_encode(response(0, 1, 'No Permission!!', NULL)));
    }
    $GroupID = $_POST['group_id'];
    $GroupName = $_POST['group_name'];
    $NextAgentCall = $_POST['next_agent_call'];
    $data = $database->insert('vicidial_inbound_groups', ['group_id' => $GroupID, 'group_name' => $GroupName, 'next_agent_call' => $NextAgentCall]);
    $resultResponse = response(1, 0, 'Successfully Created!!', null);
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'ADD', $GroupID, 'ADD-INGROUPS', $database->last(), 'ADD INGROUPS', '--All--');
} elseif ($_GET['action'] == 'Remove') {
    $GroupID = $_POST['GroupID'];
    $data = $database->delete('vicidial_inbound_groups', ['group_id' => $GroupID]);
    $UpdateCount = $data->rowCount();
    if ($UpdateCount > 0) {
        $resultResponse = response(1, 0, 'Successfully deleted', $UpdateCount);
    } else {
        $resultResponse = response(0, 1, 'Something gonna wrong!!', $UpdateCount);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'DELETE', $GroupID, 'DELETE-INGROUPS', $database->last(), 'DELETE INGROUPS', '--All--');
} elseif ($_GET['action'] == 'UpdateGroup') {
    $FieldName = $_POST['FieldName'];
    $FieldValue = $_POST['FieldValue'];
    $FieldID = $_POST['FieldID'];

    $data = $database->update('vicidial_inbound_groups', [$FieldName => $FieldValue], ['group_id' => $FieldID]);
    $UpdatedCount = $data->rowCount();
    if ($UpdatedCount > 0) {
        $resultResponse = response(1, 0, 'Successfully updated!!!', $UpdatedCount);
    } else {
        $resultResponse = response(0, 1, 'Something gonna wrong!!', $UpdatedCount);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'MODIFY', $FieldID, 'MODIFY-INGROUPS-' . $FieldName, $database->last(), 'MODIFY INGROUPS DETAILS', '--All--');
} elseif ($_GET['action'] == 'UpdateRank') {
    $GroupID = $_POST['GroupID'];
    $FieldValue = $_POST['FieldValue'];
    $FieldID = $_POST['FieldID'];

    $Count = $database->count('vicidial_inbound_group_agents', ['AND' => ['group_id' => $GroupID, 'user' => $FieldID]]);
    if ($Count > 0) {
        $data = $database->update('vicidial_inbound_group_agents', ['group_rank' => $FieldValue], ['AND' => ['group_id' => $GroupID, 'user' => $FieldID]]);
        $UpdatedCount = $data->rowCount();
        if ($UpdatedCount > 0) {
            $resultResponse = response(1, 0, 'Successfully updated!!!', $UpdatedCount);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', $UpdatedCount);
        }
    } else {
        $resultResponse = response(0, 1, 'This user does not exist!!', NULL);
    }
    admin_log_insert($database, @$_SESSION['Login']['user'], 'INGROUPS', 'MODIFY', $GroupID, 'MODIFY-INGROUPS', $database->last(), 'MODIFY INGROUPS', '--All--');
} elseif ($_GET['action'] == 'AudioUpload') {

    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    
    $extensions = array("jpeg", "jpg", "mp3",'wav','gsm');

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        $fileName = $_POST['audio_name'] . ".".$file_ext;
        $FilePath = "/srv/www/htdocs/".$SS_SoundsWebDirectory."/" . $fileName;
        move_uploaded_file($file_tmp, $FilePath);
        
        $database->update('servers',['sounds_update'=>'Y']);
        
        admin_log_insert($database, @$_SESSION['Login']['user'], 'AUDIOSTORE','LOAD','manualupload', $fileName.' '. filesize($FilePath), $database->last(), '',$_SESSION['CurrentLogin']['user_group']);
        
        $resultResponse = response(1, 0, 'File has been successfully updated!!!', $_POST['audio_name']);
    } else {
        $resultResponse = response(0, 1, 'This file does not upload!!', NULL);
    }
} elseif ($_GET['action'] == 'HoldMusic') {
    
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $FileNameValue = reset(explode('.', $_FILES['file']['name']));
    
    $extensions = array("gsm", "wav");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }


    if (empty($errors) == true) {

        $Name = $_POST['audio_name'];
        $Exist = $database->count('vicidial_music_on_hold', ['moh_id' => $Name]);
        
        if (!empty($Exist) && $Exist > 0) {
            $resultResponse = response(0, 1, 'This name is already exist!!', NULL);
        } else {
            $FilePath = "/srv/www/htdocs/" . $SS_SoundsWebDirectory . "/" . $file_name;
            move_uploaded_file($file_tmp,$FilePath);
            $filename = $FileNameValue;
            $array = [];
            $array['moh_id'] = $Name;
            $array['moh_name'] = $Name;
            $array['active'] = 'Y';
            $array['random'] = 'N';
            $array['remove'] = 'N';
            $array['user_group'] = $_SESSION['CurrentLogin']['user_group'];

            $database->insert('vicidial_music_on_hold', $array);
            /* START */
            $moh_id = $Name;
            
           

            if (strlen($filename) > 0) {
                $stmt = "INSERT INTO vicidial_music_on_hold_files set filename='$filename',rank='1',moh_id='$moh_id';";
                $rslt = mysql_to_mysqli($stmt, $link);
                $stmtLIST .= "|$stmt";
            }

            $stmtA = "UPDATE servers SET rebuild_conf_files='Y',rebuild_music_on_hold='Y',sounds_update='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y';";
            $rslt = mysql_to_mysqli($stmtA, $link);

//            echo "<br>" . _QXZ("MUSIC ON HOLD ENTRY MODIFIED") . ": $moh_id\n";

### LOG INSERTION Admin Log Table ###
            $SQL_log = "$stmtLIST|$stmtA|";
            $SQL_log = preg_replace('/;/', '', $SQL_log);
            $SQL_log = addslashes($SQL_log);
            $stmt = "INSERT INTO vicidial_admin_log set event_date='".date('Y-m-d H:i:s')."', user='".$_SESSION['CurrentLogin']['user']."', event_section='MOH', event_type='MODIFY', record_id='$moh_id', event_code='ADMIN MODIFY MOH', event_sql=\"$SQL_log\", event_notes='';";
            if ($DB) {
//                echo "|$stmt|\n";
            }
            $rslt = mysql_to_mysqli($stmt, $link);
            /* END */
             admin_log_insert($database, @$_SESSION['Login']['user'], 'AUDIOSTORE','LOAD','manualupload', $file_name.' '. filesize($FilePath), $database->last(), '',$_SESSION['CurrentLogin']['user_group']);
            $resultResponse = response(1, 0, 'File has been successfully updated!!!', [$moh_id,$filename]);
        }

        
    } else {
        $resultResponse = response(0, 1, 'This user does not exist!!', NULL);
    }
}


echo json_encode($resultResponse);
