<?php
$result = [];
$MethodList = ['Save', 'listing', 'remove', 'update', 'editView', 'UpdateForm', 'share'];
if (!in_array($_GET['rule'], $MethodList)) {
    echo json_encode(response(0, 1, 'Rule Not Defined!!', NULL));
    exit;
}

$table = 'email_reports';

if ($_GET['rule'] == 'Save') {
    if (isset($_POST) && $_POST) {

        $Name = $_POST['name'];
        $Description = $_POST['description'];
        $Report = $_POST['report'];
        $Type = $_POST['type'];
        $Recipients = $_POST['recipients'];
        $Weekends = $_POST['weekends'];
        $AttachmentType = $_POST['attachment_type'];
        $WeekDay = $_POST['week_day'];

        $arrayInsert = [];
        $arrayInsert['name'] = $Name;
        $arrayInsert['user_id'] = $_SESSION['CurrentLogin']['user_id'];
        $arrayInsert['description'] = $Description;
        $arrayInsert['report'] = $Report;
        $arrayInsert['type'] = $Type;
        $arrayInsert['recipients'] = $Recipients;
        $arrayInsert['weekends'] = $Weekends;
        $arrayInsert['attachment_type'] = $AttachmentType;
        $arrayInsert['status'] = 'Y';
        if ($Type == 'weekly') {
            $arrayInsert['status'] = $WeekDay;
        }
        $arrayInsert['created_at'] = date('Y-m-d H:i:s');
        $arrayInsert['updated_at'] = date('Y-m-d H:i:s');

        $DBUTG->insert($table, $arrayInsert);
        $LastInsertID = $DBUTG->id();

        if ($LastInsertID) {
            $result = response(1, 0, 'Your Email Report has been successfully created!!', NULL);
        } else {
            $result = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } else {
        $result = response(0, 1, 'Method does not supportable', NULL);
    }
} elseif ($_GET['rule'] == 'UpdateForm') {
    if (isset($_POST) && $_POST) {

        $ID = $_POST['id'];
        $Name = $_POST['name'];
        $Description = $_POST['description'];
        $Report = $_POST['report'];
        $Type = $_POST['type'];
        $Recipients = $_POST['recipients'];
        $Weekends = $_POST['weekends'];
        $AttachmentType = $_POST['attachment_type'];
        $WeekDay = $_POST['week_day'];

        $arrayInsert = [];
        $arrayInsert['name'] = $Name;
        $arrayInsert['description'] = $Description;
        $arrayInsert['report'] = $Report;
        $arrayInsert['type'] = $Type;
        $arrayInsert['recipients'] = $Recipients;
        $arrayInsert['weekends'] = $Weekends;
        $arrayInsert['attachment_type'] = $AttachmentType;
        $arrayInsert['updated_at'] = date('Y-m-d H:i:s');
        if ($Type == 'weekly') {
            $arrayInsert['status'] = $WeekDay;
        }
        $data = $DBUTG->update($table, $arrayInsert, ['id' => $ID]);
        if ($data->rowCount() > 0) {
            $result = response(1, 0, 'Your Email Report has been successfully updated!!', NULL);
        } else {
            $result = response(0, 1, 'Something gonna wrong!!', NULL);
        }
    } else {
        $result = response(0, 1, 'Method does not supportable', NULL);
    }
} elseif ($_GET['rule'] == 'listing') {
    $data = $DBUTG->select($table, '*', ['user_id' => $_SESSION['CurrentLogin']['user_id']]);

    $result = array(
        "draw" => intval(1),
        "recordsTotal" => intval($data),
        "recordsFiltered" => intval($data),
        "data" => $data
    );
} elseif ($_GET['rule'] == 'update') {
    $FieldID = $_POST['FieldID'];
    $FieldName = $_POST['FieldName'];
    $FieldValue = $_POST['FieldValue'];
    $data = $DBUTG->update($table, [$FieldName => $FieldValue], ['id' => $FieldID]);
    if ($data->rowCount() > 0) {
        $result = response(1, 0, 'Successfully updated!!', $data->rowCount());
    } else {
        $result = response(0, 1, 'Something gonna wrong!!', NULL);
    }
} elseif ($_GET['rule'] == 'remove') {
    $FieldID = $_POST['FieldID'];

    $data = $DBUTG->delete($table, ['id' => $FieldID]);

    if ($data->rowCount() > 0) {
        $result = response(1, 0, 'Successfully deleted!!', $data->rowCount());
    } else {
        $result = response(0, 1, 'Something gonna wrong!!', NULL);
    }
} elseif ($_GET['rule'] == 'editView') {
    $FieldID = $_POST['FieldID'];
    $data = $DBUTG->get($table, '*', ['id' => $FieldID]);
    require 'edit.php';

    exit;

    $result = response(0, 1, 'Something gonna wrong!!', NULL);
} elseif ($_GET['rule'] == 'share') {

} else {

}


echo json_encode($result);
