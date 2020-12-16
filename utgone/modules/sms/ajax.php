<?php
$result = [];
if (!empty($_GET) && $_GET['action']) {

    if($_GET['action'] == 'GetTemplate'){
       $data = $DBSMS->select('templates',['id','name','description','message','active']);
        foreach($data as $key=>$val){
            $status = $data[$key]['active'];
            $data[$key]['active'] = '<button type="button" class="change_status btn btn-sm btn-toggle '.($status=='Y'?'active':'').'" data-toggle="button" aria-pressed="'.$status.'" autocomplete="off" data-id="'.$data[$key]['id'].'" value="1" onclick="changeItemStatus(this)">
						<div class="handle"></div>
                                  </button>';

           $action = '';
           if(checkRole('sms', 'edit')) {
               $action .='<a class="btn btn-app text-white btn-success" href="javascript:void(0);" onclick="editItem('.$data[$key]['id'].', 0)"><i class="fa fa-arrow-right" title="Manage"></i></a>';
           }
           if(checkRole('sms', 'create')) {
                 $action .='<a class="btn btn-app text-white btn-success" href="javascript:void(0);" onclick="editItem('.$data[$key]['id'].', 1)"><i class="fa fa-copy" title="copy"></i></a>';
           }
           // '<a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a>';
           if(checkRole('sms', 'delete')) {
               $action .='<a class="btn btn-app text-white btn-danger text-white" href="javascript:void(0)" onclick="deleteItem('.$data[$key]['id'].')"><i class="fa fa-times" title="Remove"></i></a>';
           }
          $data[$key]['Action'] = $action;
        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
    }elseif($_GET['action'] == 'GetSMSSent'){
       $data = $DBSMS->select('sent',['id','routine','type','msg','date_sent','customer_name','phone_number','lead_id','status']);
        foreach($data as $key=>$val){
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="1002" value="1">
						<div class="handle"></div>
                                  </button>';
            $action = '';
            if(checkRole('sms', 'edit')) {
                $action .='<a class="btn btn-app text-white btn-success" ><i class="fa fa-arrow-right" title="Edit"></i></a>';
            }
            // '<a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a>';
            if(checkRole('sms', 'delete')) {
                $action .='<a class="btn btn-app text-white btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
            }
           $data[$key]['Action'] = $action;
           
            $data[$key]['routine'] = $DBSMS->get('routines','name',['id'=>$val['routine']]);
        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
    }
    elseif($_GET['action'] == 'GetSMSRoutine'){
       $data = $DBSMS->select('routines',['id','name','routine_type','start_date','start_time','active']);
        foreach($data as $key=>$val){
            $status = $val['active'];
            $data[$key]['active'] = '<button type="button" class="change_status btn btn-sm btn-toggle '.($status=='Y'?'active':'').'" data-toggle="button" aria-pressed="'.$status.'" autocomplete="off" data-id="'.$data[$key]['id'].'" value="1" onclick="changeItemStatus(this)">
                        <div class="handle"></div>
                                  </button>';
           $action ='';
//          if(checkRole('sms', 'edit') && time() < strtotime($data[$key]['start_date'].' '.$data[$key]['start_time'])) {
          if(checkRole('sms', 'edit')) {
              $action .='<a class="btn btn-app text-white btn-success" href="'.base_url('sms/routine_edit').'?id='.$data[$key]['id'].'" onclick="editItem('.$data[$key]['id'].', 0)"><i class="fa fa-arrow-right" title="Manage"></i></a>';
          }
          if(checkRole('sms', 'create')) {
                $action .='<a class="btn btn-app text-white btn-success"href="'.base_url('sms/routine_edit').'?copy='.$data[$key]['id'].'""><i class="fa fa-copy" title="copy"></i></a>';
          }
          // '<a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a>';
          //if(checkRole('sms', 'delete') && time() < strtotime($data[$key]['start_date'].' '.$data[$key]['start_time'])) {
            if(checkRole('sms', 'delete')) {
              $action .='<a class="btn btn-app text-white btn-danger text-white" href="javascript:void(0)" onclick="deleteItem('.$data[$key]['id'].')"><i class="fa fa-times" title="Remove"></i></a>';
          }
          $data[$key]['action'] = $action;

           $data[$key]['queued'] = $DBSMS->query("select count(1) as d from queue where status = 'active' and routine = ".$data[$key]['id'])->fetchColumn();
            $data[$key]['sent_today'] = $DBSMS->query("select count(1) as d from sent where status = 'sent' and DATE_FORMAT(date_sent, '%Y-%m-%d') = '".date('Y-m-d')."' and routine = ".$data[$key]['id'])->fetchColumn();
            $data[$key]['sent_total'] = $DBSMS->query("select count(1) as d from sent where status = 'sent' and routine = ".$data[$key]['id'])->fetchColumn();

        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
    }elseif($_GET['action'] == 'GetSMSRecvied'){
       $data = $DBSMS->select('received',['id','msg','receivedAt','phone_number','sentTo','status']);
        foreach($data as $key=>$val){

           $data[$key]['Action'] = '<a  class="btn btn-app text-white btn-success"><i class="fa fa-arrow-right" title="Manage"></i></a><a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a><a class="btn btn-app text-white btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
    }elseif($_GET['action'] == 'GetSMSLiveQueue'){
       $data = $DBSMS->select('queue',['id','msg','routine','phone_number','type','status','lead_id','customer_name']);
        foreach($data as $key=>$val){
            $data[$key]['routine'] = $DBSMS->get('routines','name',['id'=>$val['routine']]);
//           $data[$key]['Action'] = '<a class="btn btn-app text-white btn-success"><i class="fa fa-arrow-right" title="Manage"></i></a><a class="btn btn-app text-white btn-warning"><i class="fa fa-sign-out" title="Sign Out"></i></a><a class="btn btn-app text-white btn-danger"><i class="fa fa-times" title="Remove"></i></a>';
        }
        $resultResponse = array(
                    "draw"            => intval(1),
                    // "recordsTotal"    => intval($totalRow),
                    // "recordsFiltered" => intval($totalRow),
                    "data"            => $data
                    );
    }elseif($_GET['action']=='SaveTemplate'){
        $insertData = $_POST;
//        $insertData['user_id'] = 0;
        if(isset($insertData['id']) && $insertData['id']) {
            if (!checkRole('sms', 'edit')) {
                $resultResponse = ['No Permission!!'];
            } else {
             $data = $DBSMS->update('templates',$insertData, ['id'=>$insertData['id']]);   
            }
        }else {
            unset($insertData['id']);
            $data = $DBSMS->insert('templates',$insertData);
        }

        if (!empty($data)){
            $resultResponse = ['Saved Sucessfully'];
        }
        
    }
    elseif($_GET['action']=='SaveSMSRoutine'){
        $insertData = $_POST;
        /* $insertData['start'] = $insertData['start_date'].' '.$insertData['start_time'];
        $insertData['end'] = $insertData['end_date'].' '.$insertData['end_time']; */
        if(isset($insertData['id']) && $insertData['id']) {
            if (!checkRole('sms', 'edit')) {
                $resultResponse = ['No Permission!!'];
            } else {
                $data = $DBSMS->update('routines',$insertData, ['id'=>$insertData['id']]);
            }
        }else {
            $data = $DBSMS->insert('routines',$insertData);
        }
       
        if (!empty($data)){
            $resultResponse = ['Saved Sucessfully'];
        } 
    }elseif($_GET['action'] == 'GetTemplateById'){
       $data = $DBSMS->get('templates',['id','name','description','message','active'], ['id'=>$_GET['id']]);
       $resultResponse = $data;
    }elseif($_GET['action'] == 'deleteTemplateById'){
       $data = $DBSMS->delete('templates', ['id'=>$_GET['id']]);
//       $resultResponse =  $data[0];
    }elseif($_GET['action'] == 'deleteRoutineById'){
       $data = $DBSMS->delete('routines', ['id'=>$_GET['id']]);
       $resultResponse = ['Deleted Sucessfully'];//$data[0];
   }elseif($_GET['action']=='SaveRoutine'){
       $insertData = $_POST;
       if(isset($insertData['id']) && $insertData['id']) {
        if (!checkRole('sms', 'edit')) {
            $resultResponse = ['No Permission!!'];
        } else {
           $data = $DBSMS->update('routines',$insertData, ['id'=>$insertData['id']]);
        }
           if (!empty($data)){
               $resultResponse = ['Saved Sucessfully'];
           }
       }
   }elseif($_GET['action']=='SaveAccountDetails'){
       $insertData = $_POST;
       if(isset($insertData['id']) && $insertData['id']) {
           $data = $DBSMS->update('accounts',$insertData, ['id'=>$insertData['id']]);
           if (!empty($data)){
               $resultResponse = ['Saved Sucessfully'];
           }
       }
   }

    echo json_encode($resultResponse);
}
