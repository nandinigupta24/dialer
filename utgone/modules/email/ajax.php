<?php
$resultResponse = [];
if(!empty($_GET['action']) && isset($_GET['action']) ){
    if ($_GET['action'] == 'GetEmail') {
    $data = $DBEmail->select('templates', ['id', 'name', 'description', 'active']);
    foreach ($data as $key => $val) {
        $active = $data[$key]['active'];
        $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle '.($active=='Y'?'active':'').'" data-toggle="button" aria-pressed="'.$active.'" autocomplete="off" data-id="'.$val['id'].'" value="'.$active.'" onclick="changeItemStatus(this)">
                    <div class="handle"></div>
                              </button>';
        $data[$key]['Action'] = '<a href="javascript:void(0);" class="btn btn-app text-white btn-primary TemplateView" data-id="'.$data[$key]['id'].'"><i class="fa fa-list-alt" title="View Template"></i></a>'
                . '<a href="javascript:void(0);" class="btn btn-app text-white btn-info TemplateCopy" data-id="'.$data[$key]['id'].'"><i class="fa fa-files-o" title="Copy Template"></i></a>'
                . '<a href="'.base_url('email/edit').'?id='.$data[$key]['id'].'" class="btn btn-app text-white btn-success"><i class="fa fa-edit" title="Manage"></i></a>';
        if(checkRole('email', 'delete')) {
            $data[$key]['Action'] .= '<a class="btn btn-app text-white btn-danger" href="javascript:void(0)" onclick="deleteItem('.$data[$key]['id'].')"><i class="fa fa-times" title="Remove"></i></a>';
        }
    }
    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal" => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
     admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'GETEMAIL','$User', 'GETEMAIL - ROLE',$DBEmail->last(),'Role GETEMAIL','--All--');

 }elseif($_GET['action'] == 'GetTemplateView'){
     $ItemID = $_POST['id'];
     $data = $DBEmail->get('templates','message',['id'=>$ItemID]);
     $resultResponse = response(1, 0, 'Clonned successfully!!', $data);
 }elseif ($_GET['action'] == 'GetRoutine') {
     $data = $DBEmail->select('routines', ['id', 'name', 'description', 'active', 'start_time', 'end_time', 'start_date', 'end_date', 'routine_type']);
     foreach ($data as $key => $val) {
         $active = ($data[$key]['active'] == 'Y') ? 'active':'';
         $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle '.$active.' EmailRoutineActive" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$val['id'].'" value="1">
                     <div class="handle"></div>
                               </button>';
         $data[$key]['action'] = '<a class="btn btn-app text-white btn-success" href="'.base_url('email/routine_edit').'?id='. $data[$key]['id'].'"><i class="fa fa-edit" title="Manage"></i></a>';
         if(checkRole('email', 'delete')) {
            $data[$key]['action'] .= '<a  class="btn btn-app text-white btn-danger removeEmailRoutine" data-id ='.$data[$key]['id'].'><i class="fa fa-times" title="Remove"></i></a>';
         }
         $data[$key]['Queued'] = $DBEmail->count('client_queue',['routine'=>$data[$key]['id']]);
         $data[$key]['SentToday'] = $DBEmail->count('sent',['AND'=>['routine'=>$val['id'],'date_sent[>=]'=>date('Y-m-d').' 00:00:00','date_sent[<=]'=>date('Y-m-d').' 23:59:59']]);
         $data[$key]['SentTotal'] = $DBEmail->count('sent',['routine'=>$data[$key]['id']]);
     }
     $resultResponse = array(
         "draw" => intval(1),
         // "recordsTotal" => intval($totalRow),
         // "recordsFiltered" => intval($totalRow),
         "data" => $data
     );
       admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'GETROUTINE','', 'GETROUTINE - ROLE',$DBEmail->last(),'Role GETROUTINE','--All--');
 } elseif ($_GET['action'] == 'RemoveRoutine') {
    $dataId = $_POST['dataId'];
    $result = $DBEmail->delete('routines', ['id' => $dataId]);
    if ($result->rowCount() > 0) {
        $resultResponse = response(1, 0, 'This email routine has been successfully deleted!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Oops!! No Updated!!', NULL);
    }
     admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'DELETE',$dataId,'DELETE-Email-Rountine',$database->last(),'DELETE Email-Rountine','--All--'); 
  } elseif($_GET['action'] == 'GetEmailQueue'){
        $data = $DBEmail->query("SELECT CQ.id,CQ.type,CQ.subject,CQ.customer_name,CQ.email,CQ.date_added,CQ.lead_id,R.name as routine,T.name as template
FROM client_queue CQ 
JOIN 
routines R 
ON 
R.id=CQ.routine
JOIN
templates T
ON T.id = CQ.template
")->fetchAll(PDO::FETCH_ASSOC);
       
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
         admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'EMAILQUEUE','', 'EMAILQUEUE - ROLE',$DBEmail->last(),'Role EMAILQUEUE','--All--');


}elseif($_GET['action'] == 'GetManagerQueue'){
       $data = $DBEmail->select('manager_queue',['id','routine','type','customer_name','email','lead_id']);
        foreach($data as $key=>$val){

           $data[$key]['Action'] = '<a class="btn btn-app text-white btn-success"><i class="fa fa-arrow-right" title="Edit"></i></a>
           <a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a>
           <a class="btn btn-app text-white btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
         admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'MANAGERQUEUE','', 'MANAGERQUEUE - ROLE',$DBEmail->last(),'Role MANAGERQUEUE','--All--');

    }elseif($_GET['action'] == 'GetEmailSent'){
       $data = $DBEmail->query("SELECT S.type,S.lead_id,S.email,S.customer_name,S.date_sent,R.name as routine,T.name as template
FROM sent S 
JOIN 
routines R 
ON 
R.id=S.routine
JOIN
templates T
ON T.id = S.template")->fetchAll(PDO::FETCH_ASSOC);
        $resultResponse = array(
                    "draw"            => intval(1),
                    "data"            => $data
                    );
        admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'USERS', 'ROUTINE','', 'ROUTINE - ROLE',$DBEmail->last(),'Role ROUTINE','--All--');
    }elseif($_GET['action'] == 'create'){
        $data  = $_POST;
        unset($data['_wysihtml5_mode']);
        $DBEmail->insert('templates', $data);
        $resultResponse = response(1, 0, 'Created successfully!!', NULL);
        admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'EMAIL', 'Created','', 'EMAIL - CREATED',$DBEmail->last(),'EMAIL TEMPLATE','--All--');
    }elseif($_GET['action'] == 'update'){
        if(!checkRole('email', 'edit')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $data  = $_POST;
        
//        unset($data['_wysihtml5_mode']);
        $DBEmail->update('templates', $data, ['id'=>$_GET['id']]);
        
        $resultResponse = response(1, 0, 'Updated successfully!!', NULL);
        admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'EMAIL', 'Updated','', 'EMAIL - Updated',$DBEmail->last(),'EMAIL TEMPLATE','--All--');
    }elseif($_GET['action'] == 'copy'){
        $data  = $_POST;
        $newtemplate = $DBEmail->select('templates', '*',[ 'id'=>$data['clone_list_id']]);

        $newT  = $newtemplate[0];
        unset($newT['id']);
        $newT['name'] = $data['clone_name'];
        $newT['active'] = $data['active'];
        $DBEmail->insert('templates', $newT);
        
        $resultResponse = response(1, 0, 'Clonned successfully!!', NULL);
        admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'EMAIL', 'CLONE','', 'EMAIL - CLONED',$DBEmail->last(),'EMAIL TEMPLATE','--All--');
    }elseif($_GET['action'] == 'deleteTemplateById'){
       $data = $DBEmail->delete('templates', ['id'=>$_GET['id']]);
       $resultResponse = response(1, 0, 'Clonned successfully!!', NULL);
       admin_log_insert($DBEmail,@$_SESSION['Login']['user'],'EMAIL', 'DELETE','', 'EMAIL - DELETE',$DBEmail->last(),'EMAIL TEMPLATE','--All--');
    }elseif($_GET['action']=='SaveEmailRoutine'){
      
        $insertData = $_POST;
        if(isset($insertData['id']) && $insertData['id']) {
            $data = $DBEmail->update('routines',$insertData, ['id'=>$insertData['id']]);
        }else {
            $data = $DBEmail->insert('routines',$insertData);
        }
        if (!empty($data)){
            $resultResponse = ['Saved Sucessfully'];
        }
    }elseif($_GET['action'] == 'UpdateStatus'){
        if(!checkRole('email', 'edit')) { die(json_encode(response(0, 1, 'No Permission!!', NULL)) ); }
        $ItemID = $_POST['ItemID'];
        $ItemValue = $_POST['ItemValue'];
        $data = $DBEmail->update('routines',['active'=>$ItemValue],['id'=>$ItemID]);
        if($data->rowCount()){
             $resultResponse = response(1, 0, 'Status has been successfully updated!!', NULL);
        }else{
             $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    }
      echo json_encode($resultResponse);
}
