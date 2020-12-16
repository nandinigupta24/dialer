<?php

$result = [];
$ruleList = ['inbound'];
if (!in_array($_GET['rule'], $ruleList)) {
    $result = response(0, 1, 'Rule Method does not exist', NULL);
    echo json_encode($result);
    exit;
}
$start = $end = date('Y-m-d');
if (!empty($_GET['start'])) {
    $start = $_GET['start'];
}
if (!empty($_GET['end'])) {
    $end = $_GET['end'];
}

if ($_GET['rule'] == 'inbound') {
//   echo $Query = "SELECT * FROM vicidial_closer_log VCL WHERE VCL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' " . get_validation('campaign', 'VCL', 'AND',$database) . " ORDER BY VCL.call_date desc";
   $Query = "SELECT VCL.*,CONCAT(VU.full_name,'(',VCL.user,')') as user FROM vicidial_closer_log VCL JOIN vicidial_users VU
ON
VCL.user = VU.user  WHERE VCL.call_date BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' " . get_validation('campaign', 'VCL', 'AND',$database) . " ORDER BY VCL.call_date desc";
   
    $data = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);

    $resultResponse = array(
        "draw" => intval(1),
        "data" => $data
    );
}

echo json_encode($resultResponse);
