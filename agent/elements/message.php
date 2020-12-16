<?php
require '../../db/database.php';

$Method = $_GET['method'];
if($Method == 'GetMessage'){
    $UserID = $_POST['user'];
    $User_ID = $database->get('vicidial_users',['user_id'],['user'=>$UserID]);
    $dataCount = $database->select('chat_internal','*',['ORDER'=>['id'=>'DESC'],'AND'=>['status'=>'N','user_id'=>$User_ID['user_id']]]);
    if(!empty($dataCount) && count($dataCount) > 0){
        $MessageHTML = '';
        
        foreach($dataCount as $val){
            $SenderID = $database->get('vicidial_users','*',['user_id'=>$val['sender_id']]);
           
            $MessageHTML .= '<a class="media media-single" href="#">
                              <div class="media-body">
                                    <h6>'.$val['message'].'</h6>
                                    <small class="text-fader"><i class="fa fa-user"></i> By '.$SenderID['full_name'].'</small>
                                    <small class="text-fader"><i class="fa fa-clock-o"></i> '.$val['created_at'].'</small>
                              </div>
                            </a>';
        }
        $result = ['count'=>count($dataCount),'data'=>$MessageHTML];
        $response = results('success','New Message', $result);
    }else{
        $response = results('error','No New Message',NULL);
    }
}elseif($Method == 'SeenMessage'){
     $UserID = $_POST['user'];
     $User_ID = $database->get('vicidial_users',['user_id'],['user'=>$UserID]);
     $dataCount = $database->update('chat_internal',['status'=>'Y'],['AND'=>['status'=>'N','user_id'=>$User_ID['user_id']]]);
     $response = results('success','New Message',NULL);
}

echo json_encode($response);