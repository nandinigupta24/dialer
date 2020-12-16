<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ActionArray = ['InsertShift', 'GetShift', 'RemoveShift', 'ShiftDetail', 'EditShift', 'InsertLevel', 'GetLevel', 'RemoveLevel', 'LevelDetail', 'EditLevel', 'InsertEvent', 'GetEvent', 'RemoveEvent', 'EventDetail', 'EditEvent'];
if (!empty($_GET['action']) && in_array($_GET['action'], $ActionArray)) {
    if ($_GET['action'] == 'InsertShift') {
        foreach($_POST['agent'] as $k=>$agent){
            $Exist = $DBUTG->count('agentshifts', ['AND' => ['campaign' => $_POST['campaign'], 'user' => $agent]]);
            if (!empty($Exist) && $Exist > 0) {
                 $Exist = $DBUTG->get('agentshifts','id',['AND' => ['campaign' => $_POST['campaign'], 'user' => $agent]]);
                 $data = $DBUTG->update('agentshifts',['start_time'=>$_POST['shift_start_time'],'end_time'=>$_POST['shift_end_time']],['id'=>$Exist]);
            } else {
                $InsertArray = [];
                $InsertArray['campaign'] = $_POST['campaign'];
                $InsertArray['user'] = $agent;
                $InsertArray['description'] = $_POST['shift_description'];
                $InsertArray['start_time'] = $_POST['shift_start_time'];
                $InsertArray['end_time'] = $_POST['shift_end_time'];
                $InsertArray['user_group'] = $_POST['user_group'];
                $InsertArray['created_at'] = date('Y-m-d H:i:s');
                $InsertArray['updated_at'] = date('Y-m-d H:i:s');
                $data = $DBUTG->insert('agentshifts', $InsertArray);
                if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                    $resultResponse = response(1, 0, 'This shift has been successfully inserted!!', null);
                } else {
                    $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
                }
            }
        }
        
       
        $resultResponse = response(1, 0, 'This shift has been successfully inserted!!', null);
        
//        $Exist = $DBUTG->count('agentshifts', ['AND' => ['campaign' => $_POST['campaign'], 'user' => $_POST['agent']]]);
//
//        if (!empty($Exist) && $Exist > 0) {
//            $resultResponse = response(0, 1, 'Already exist!!', null);
//        } else {
//            $data = $DBUTG->insert('agentshifts', $InsertArray);
//            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
//                $resultResponse = response(1, 0, 'This shift has been successfully inserted!!', null);
//            } else {
//                $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
//            }
//        }
    } elseif ($_GET['action'] == 'GetShift') {
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $data = $DBUTG->select("agentshifts", '*');
        }else{
            $data = $DBUTG->select("agentshifts", '*',['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }

        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'RemoveShift') {
        $Id = $_POST['ShiftID'];
        $data = $DBUTG->delete('agentshifts', ['id' => $Id]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Agent Shifts has been removed!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'ShiftDetail') {
        $Id = $_POST['ShiftID'];
        $data = $DBUTG->get('agentshifts', '*', ['id' => $Id]);
        if (!empty($data) && count($data) > 0) {
            $resultResponse = response(1, 0, 'Successfully Found!!', $data);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'EditShift') {
        $InsertArray = [];
        $InsertArray['campaign'] = $_POST['campaign'];
        $InsertArray['user'] = $_POST['agent'];
        $InsertArray['description'] = $_POST['shift_description'];
        $InsertArray['start_time'] = $_POST['shift_start_time'];
        $InsertArray['end_time'] = $_POST['shift_end_time'];
        $InsertArray['updated_at'] = date('Y-m-d H:i:s');
        $data = $DBUTG->update('agentshifts', $InsertArray, ['id' => $_POST['id']]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'This shift has been successfully updated!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'InsertLevel') {
        $InsertArray = [];
        $InsertArray['level'] = $_POST['level'];
        $InsertArray['campaign'] = NULL;
        $InsertArray['points'] = $_POST['points'];
        $InsertArray['description'] = $_POST['description'];
        $InsertArray['user_group'] = $_POST['user_group'];
        $InsertArray['created_at'] = date('Y-m-d H:i:s');
        $InsertArray['updated_at'] = date('Y-m-d H:i:s');
        $Exist = $DBUTG->count('agent_levels', ['AND' => ['level' => $_POST['level'], 'user_group' => $_POST['user_group']]]);

        if (!empty($Exist) && $Exist > 0) {
            $resultResponse = response(0, 1, 'Already exist!!', null);
        } else {
            $data = $DBUTG->insert('agent_levels', $InsertArray);

            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                $resultResponse = response(1, 0, 'This level has been successfully inserted!!', null);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
            }
        }
    } elseif ($_GET['action'] == 'GetLevel') {
       
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
             $data = $DBUTG->select("agent_levels", '*');
        }else{
            $data = $DBUTG->select("agent_levels", '*',['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }
        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'RemoveLevel') {
        $Id = $_POST['LevelID'];
        $data = $DBUTG->delete('agent_levels', ['id' => $Id]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Agent Levels has been removed!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'LevelDetail') {
        $Id = $_POST['LevelID'];
        $data = $DBUTG->get('agent_levels', '*', ['id' => $Id]);
        if (!empty($data) && count($data) > 0) {
            $resultResponse = response(1, 0, 'Successfully Found!!', $data);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'EditLevel') {
        $InsertArray = [];
        $InsertArray['level'] = $_POST['level'];
        $InsertArray['points'] = $_POST['points'];
        $InsertArray['description'] = $_POST['description'];
        $InsertArray['updated_at'] = date('Y-m-d H:i:s');
        $data = $DBUTG->update('agent_levels', $InsertArray, ['id' => $_POST['id']]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'This Level has been successfully updated!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'InsertEvent') {
        $InsertArray = [];
        $InsertArray['event'] = $_POST['event'];
        $InsertArray['points'] = $_POST['points'];
        $InsertArray['user_group'] = $_POST['user_group'];
        $InsertArray['created_at'] = date('Y-m-d H:i:s');
        $InsertArray['updated_at'] = date('Y-m-d H:i:s');

        $Exist = $DBUTG->count('agent_events', ['AND' => ['event' => $_POST['event'], 'user_group' => $_POST['user_group']]]);

        if (!empty($Exist) && $Exist > 0) {
            $resultResponse = response(0, 1, 'Already exist!!', null);
        } else {
            $data = $DBUTG->insert('agent_events', $InsertArray);

            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                $resultResponse = response(1, 0, 'This event has been successfully inserted!!', null);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
            }
        }
    } elseif ($_GET['action'] == 'GetEvent') {
       
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
             $data = $DBUTG->select("agent_events", '*');
        }else{
            $data = $DBUTG->select("agent_events", '*',['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }
        $resultResponse = array(
            "draw" => intval(1),
            "data" => $data
        );
    } elseif ($_GET['action'] == 'RemoveEvent') {
        $Id = $_POST['EventID'];
        $data = $DBUTG->delete('agent_events', ['id' => $Id]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'Agent Event has been removed!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'EventDetail') {
        $Id = $_POST['EventID'];
        $data = $DBUTG->get('agent_events', '*', ['id' => $Id]);
        if (!empty($data) && count($data) > 0) {
            $resultResponse = response(1, 0, 'Successfully Found!!', $data);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    } elseif ($_GET['action'] == 'EditEvent') {
        $InsertArray = [];
        $InsertArray['event'] = $_POST['event'];
        $InsertArray['points'] = $_POST['points'];
        $InsertArray['updated_at'] = date('Y-m-d H:i:s');
        $data = $DBUTG->update('agent_events', $InsertArray, ['id' => $_POST['id']]);
        if (!empty($data->rowCount()) && $data->rowCount() > 0) {
            $resultResponse = response(1, 0, 'This Event has been successfully updated!!', null);
        } else {
            $resultResponse = response(0, 1, 'Something gonna wrong!!', null);
        }
    }
} else {
    $resultResponse = response(0, 1, 'Not allowed', null);
}
echo json_encode($resultResponse);
