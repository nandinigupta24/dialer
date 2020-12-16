<?php
require '../db/database.php';

$leadID = $_POST['lead_id'];

$LeadDetail = $database->get('vicidial_list', '*', ['lead_id' =>$leadID]);

$CustomFields = $database->get('custom_fields', '*', ['list_id' => $LeadDetail['list_id']]);

if(count($CustomFields)) {
  unset($CustomFields['list_id']);

$CustomFields = array_filter($CustomFields);

$CustomFieldsData = $database->get('custom_fields_data', array_keys($CustomFields), ['AND' => ['list_id' => $LeadDetail['list_id'], 'lead_id' => $leadID]]);
//print_r($CustomFieldsData);
//exit;
//$data = array_combine(array_values($CustomFields), $CustomFieldsData);
$response = '';
foreach($CustomFieldsData as $k=>$v){
    $response .= '<div class="col-4">
    <div class="form-group">
        <label for="'.$k.'">'.$CustomFields[$k].':</label>
        <input type="text" class="form-control" name="'.$k.'" id="'.$k.'" value="'.$v.'" placeholder="'.$CustomFields[$k].'"/>
    </div>
    </div>';
}


if(empty($response)){
   foreach($CustomFields as $k=>$v){
        $response .= '<div class="col-4">
        <div class="form-group">
            <label for="'.$k.'">'.$CustomFields[$k].':</label>
            <input type="text" class="form-control" name="'.$k.'" id="'.$k.'" placeholder="'.$v.'"/>
        </div>
        </div>';
    }
}

echo $response;
} else {
  echo '';
}
