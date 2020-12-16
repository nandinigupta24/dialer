<?php
$row = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['listId']]);
if (!empty($row)) {
    $array = ['list_id' => $row['list_id'],
        'list_name' => $row['list_name'],
        'status' => $row['active'],
        'query' => $row['sql'],
        'datapool' => $row['list_json'],
        'campaign_id' => $row['campaign'],
        'percentage' => $row['percentage'],
        'drop_in' => $row['drop_in'],
        'drop_out' => $row['drop_out'],
        'expiry_date' => $row['expiry_date'],
        'queue_priority' => $row['queue_priority'],
        'sql_condition' => $row['sql_condition']
    ];
    echo json_encode(array("status" => 'success', 'data' => $array));
} else {
    echo json_encode(array("status" => 'error', 'data' => ""));
}
?>
