<?php

$result = [];
if (isset($_GET['action']) && $_GET['action'] == 'GetSMTP') {
    $data = $DBEmail->query("select * from smtp")->fetchAll();
    foreach ($data as $key => $val) {
        $active = ($val['active'] == 'Y') ? 'active' : '';
        $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle SMTP-STATUS '.$active.'" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$val['id'].'" value="1">
					<div class="handle"></div>
                                  </button>';
        $data[$key]['Action'] = '<a class="btn text-white btn-app btn-success SMTP-Perform" action="edit" id="' . $val['id'] . '" SMTP-host="'.$val['host'].'" SMTP-username="'.$val['username'].'" SMTP-password="'.$val['password'].'" SMTP-port="'.$val['port'].'" SMTP-encryption="'.$val['encryption'].'"><i class="fa fa-arrow-right" title="Edit SMTP Account"></i></a><a class="btn text-white btn-app btn-danger SMTP-Perform" action="delete" id="' . $val['id'] . '"><i class="fa fa-times" title="Remove"></i></a>';
    }
    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
    admin_log_insert($DBEmail, @$_SESSION['Login']['user'], 'USERS', 'SELECT', '', 'SELECT - ROLE', $DBEmail->last(), 'Role SELECT', '--All--');
} elseif ($_GET['action'] == 'Insert') {
    if(!empty($_POST['id']) && $_POST['id'] > 0){
        $Host = $_POST['host'];
        $UserName = $_POST['username'];
        $Password = $_POST['password'];
        $port = $_POST['port'];
        $encryption = $_POST['encryption'];
        $data = $DBEmail->update('smtp', ['host' => $Host, 'username' => $UserName, 'password' => $Password, 'port' => $port, 'encryption' => $encryption, 'updated_at' => date('Y-m-d H:i:s')],['id'=>$_POST['id']]);
        $resultResponse = response(1, 0, 'Sucessfully Updated!!', null);
    }else{
        $Host = $_POST['host'];
        $UserName = $_POST['username'];
        $Password = $_POST['password'];
        $port = $_POST['port'];
        $encryption = $_POST['encryption'];
        $data = $DBEmail->insert('smtp', ['host' => $Host, 'username' => $UserName, 'password' => $Password, 'port' => $port, 'encryption' => $encryption, 'active' => 'N', 'created_at' => date('Y-m-d H:i:s')]);
        $resultResponse = response(1, 0, 'Sucessfully Created!!', null);
    }
} elseif ($_GET['action'] == 'Remove') {
    $ID = $_POST['ID'];
    $Update = $DBEmail->delete('smtp',['id'=>$ID]);
    if(!empty($Update->rowCount()) && $Update->rowCount() > 0){
        $resultResponse = response(1, 0, 'Sucessfully Deleted!!', null);
    }else{
        $resultResponse = response(1, 0, 'Something gonna wrong!!', null);
    }
}elseif($_GET['action'] == 'Update'){
    $ID = $_POST['ID'];
    $value = $_POST['value'];
    if($value == 'Y'){
        $Update = $DBEmail->update('smtp',['active'=>'N'],['id[!]'=>$ID]);
        $Update = $DBEmail->update('smtp',['active'=>'Y'],['id'=>$ID]);
    }else{
        $Update = $DBEmail->update('smtp',['active'=>'N'],['id'=>$ID]);
    }
    
    if(!empty($Update->rowCount()) && $Update->rowCount() > 0){
        $resultResponse = response(1, 0, 'Sucessfully Updated!!', null);
    }else{
        $resultResponse = response(1, 0, 'Something gonna wrong!!', null);
    }
}
admin_log_insert($DBEmail, @$_SESSION['Login']['user'], 'USERS', 'INSERT', '', 'INSERT - ROLE', $DBEmail->last(), 'Role INSERT', '--All--');

echo json_encode($resultResponse);
