<?php

$result = [];
if (isset($_GET['action']) && $_GET['action'] == 'GetStatuses') {
//    $data = $database->select('vicidial_statuses', ['status', 'status_name', 'selectable', 'human_answered', 'sale', 'not_interested', 'scheduled_callback', 'completed', 'unworkable', 'dnc']);
    $data = $database->select('vicidial_campaign_statuses', ['id', 'status', 'status_name', 'selectable', 'human_answered', 'sale', 'not_interested', 'scheduled_callback', 'completed', 'unworkable', 'dnc','Status_Type'], ['AND'=>['campaign_id' => NULL,'Status_Type[!]'=>NULL]]);
    foreach ($data as $key => $val) {
        $data[$key]['status'] = '<input type="text" class="form-control" name="status" value="' . $val['status'] . '" data-id="' . $val['id'] . '"/>';
        $data[$key]['status_name'] = '<input type="text" class="form-control" name="status_name" value="' . $val['status_name'] . '" data-id="' . $val['id'] . '"/>';
        
        if(!empty($val['Status_Type']) && $val['Status_Type'] == "Positive"){
            $StatusTypePositive = 'selected="selected"';
            $StatusTypeUnconcluded = '';
            $StatusTypeNegative = '';
            $StatusTypeNeutral = '';
        }elseif(!empty($val['Status_Type']) && $val['Status_Type'] == "Negative"){
            $StatusTypeNegative = 'selected="selected"';
            $StatusTypePositive = '';
            $StatusTypeUnconcluded = '';
            $StatusTypeNeutral = '';
        }elseif(!empty($val['Status_Type']) && $val['Status_Type'] == "Neutral"){
            $StatusTypeNeutral = 'selected="selected"';
            $StatusTypePositive = '';
            $StatusTypeUnconcluded = '';
            $StatusTypeNegative = '';
        }elseif(!empty($val['Status_Type']) && $val['Status_Type'] == "Unconcluded"){
            $StatusTypeUnconcluded = 'selected="selected"';
            $StatusTypeNegative = '';
            $StatusTypeNeutral = '';
            $StatusTypePositive = '';
        }else{
            $StatusTypePositive = '';
            $StatusTypeUnconcluded = '';
            $StatusTypeNegative = '';
            $StatusTypeNeutral = '';
        }
        
        $data[$key]['status_type'] =  '<select class="form-control " name="Status_Type" data-id="'.$val['id'].'" value="'.$val['Status_Type'].'">
                                            <option value="Positive" '.$StatusTypePositive.'>POSITIVE</option>
                                            <option value="Negative" '.$StatusTypeNegative.'>NEGATIVE</option>
                                            <option value="Neutral" '.$StatusTypeNeutral.'>NEUTRAL</option>
                                            <option value="Unconcluded" '.$StatusTypeUnconcluded.'>Unconcluded</option>
                                        </select>';
        
        $selectable = ($val['selectable'] == 'Y') ? 'active' : '';
        $data[$key]['selectable'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $selectable . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="selectable" value="">
					<div class="handle"></div>
                                  </button>';
        $HumanAnswered = ($val['human_answered'] == 'Y') ? 'active' : '';
        $data[$key]['human_answered'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $HumanAnswered . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="human_answered" value="">
					<div class="handle"></div>
                                  </button>';
        $CustomerContact = ($val['customer_contact'] == 'Y') ? 'active' : '';
        $data[$key]['customer_contact'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $CustomerContact . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="customer_contact" value="">
					<div class="handle"></div>
                                  </button>';
        $Sale = ($val['sale'] == 'Y') ? 'active' : '';
        $data[$key]['sale'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $Sale . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="sale" value="">
					<div class="handle"></div>
                                  </button>';
        $NotInterested = ($val['not_interested'] == 'Y') ? 'active' : '';
        $data[$key]['not_interested'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $NotInterested . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="not_interested" value="">
					<div class="handle"></div>
                                  </button>';
        $ScheduledCallback = ($val['scheduled_callback'] == 'Y') ? 'active' : '';
        $data[$key]['scheduled_callback'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $ScheduledCallback . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="scheduled_callback" value="">
					<div class="handle"></div>
                                  </button>';
        $Completed = ($val['completed'] == 'Y') ? 'active' : '';
        $data[$key]['completed'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $Completed . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="completed" value="">
					<div class="handle"></div>
                                  </button>';
        $Unworkable = ($val['unworkable'] == 'Y') ? 'active' : '';
        $data[$key]['unworkable'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $Unworkable . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="unworkable" value="">
					<div class="handle"></div>
                                  </button>';
        $DNC = ($val['dnc'] == 'Y') ? 'active' : '';
        $data[$key]['dnc'] = '<button type="button" class="btn btn-sm btn-toggle SystemStatus ' . $DNC . '" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="' . $val['id'] . '" data-column="dnc" value="">
					<div class="handle"></div>
                                  </button>';

        $data[$key]['Action'] = '<a class="btn text-white btn-app btn-danger System-Status" data-id="' . $val['id'] . '"><i class="fa fa-times" title="Remove"></i></a>';
    }
    $resultResponse = array(
        "draw" => intval(1),
        // "recordsTotal"    => intval($totalRow),
        // "recordsFiltered" => intval($totalRow),
        "data" => $data
    );
} elseif ($_GET['action'] == 'UpdateStatuses') {
    $StatusID = $_POST['StatusID'];
    $value = $_POST['value'];
    $StatusColumn = $_POST['StatusColumn'];
    $dataSave = $database->update('vicidial_campaign_statuses', [$StatusColumn => $value], ['id' => $StatusID]);
    if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
        $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
    }
} elseif ($_GET['action'] == 'RemoveStatuses') {
    $StatusID = $_POST['StatusID'];
    $dataSave = $database->delete('vicidial_campaign_statuses',['id' => $StatusID]);
    if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
        $resultResponse = response(1, 0, 'Successfully deleted!!', NULL);
    } else {
        $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
    }
}
admin_log_insert($database, @$_SESSION['Login']['user'], 'USERS', 'SELECT', '', 'SELECT - ROLE', $database->last(), 'Role SELECT', '--All--');

echo json_encode($resultResponse);
