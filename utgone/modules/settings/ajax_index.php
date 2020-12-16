<?php
$result = [];
if(isset($_GET['action']) && $_GET['action'] == 'GetServer'){
 $data = $database->query("select * from servers;")->fetchAll();
foreach($data as $key=>$val){
         if($val['active']== 'Y'){
             $RecordCall='active';
          }else{
              $RecordCall='';
          }
     $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive '.$RecordCall.'" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$val['carrier_id'].'" data-field="active" value="1">
			<div class="handle"></div>
                          </button>';
    $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit Carrier Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
}
$resultResponse = array(
            "draw"            => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data"            => $data
            );
 admin_log_insert($database,@$_SESSION['Login']['user'],'USERS', 'GET','', 'GET - ROLE',$database->last(),'Role GET','--All--');

}elseif(isset($_GET['action']) && $_GET['action'] == 'GetContainer'){
 $data = $database->query("select * from servers;")->fetchAll();
foreach($data as $key=>$val){
         if($val['active']== 'Y'){
             $RecordCall='active';
          }else{
              $RecordCall='';
          }
     $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle recordActive '.$RecordCall.'" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="'.$val['carrier_id'].'" data-field="active" value="1">
			<div class="handle"></div>
                          </button>';
    $data[$key]['Action'] = '<a class="btn btn-app btn-success text-white"><i class="fa fa-edit" data-toggle="modal" data-target="#edit_carrier" title="Edit Carrier Settings"></i></a><a class="btn btn-app btn-danger text-white"><i class="fa fa-times" title="Remove"></i></a>';
}
$resultResponse = array(
            "draw"            => intval(1),
            // "recordsTotal"    => intval($totalRow),
            // "recordsFiltered" => intval($totalRow),
            "data"            => $data
            );
    echo json_encode($resultResponse);
}