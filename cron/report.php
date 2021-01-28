<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../db/database.php';

$filepath = dirname(__FILE__);
$filename = $filepath.'/storage/report__.csv';

$data_api = $DBUTG->select('sendgrid_settings', '*');

$api_key = $data_api[0]['api_key'];

function create_csv_file($list, $filename) {
    $file = fopen($filename,"w");

    // Open temp file pointer
    //if (!$file = fopen('php://temp', 'w')) return FALSE;

    // Loop data and write to file pointer
    foreach ($list as $fields) {
        fputcsv($file, $fields);
    }

    fclose($file);
}

$directory = 'storage/report/';

$day = date('l');

if(!empty($_GET['report_id']) && $_GET['report_id']){
    $data = $DBUTG->select('email_reports', '*', ['id' => $_GET['report_id']]);
}else{
    $data = $DBUTG->select('email_reports', '*', ['status' => 'Y']);
}

//$data = $DBUTG->select('email_reports', '*', ['id' => 7]);

$start = $end = date('Y-m-d');

$current_time = date('H:i');

foreach ($data as $value) {

    $AttachmentType = $value['attachment_type'];

    $UserID = $value['user_id'];
    if($value['email_time'] != '') {
      $end_time = $value['email_time'];
    } else {
      $end_time = '23:59:59';
    }

    if($current_time == $end_time) {

    require 'storage/query.php';

    if ($value['type'] == strtolower($day)) {

    }

    if($value['weekends'] == 'yes') {
      if ($value['type'] == 'daily') {

      } elseif ($value['type'] == 'weekly') {
         if (strtolower($day) == 'friday') {
             $start = date('Y-m-d', strtotime("last Monday"));
             $end = date('Y-m-d');
         } else {
             continue;
         }
       }
       elseif ($value['type'] == 'monthly') {
           if (gmdate('t') == gmdate('d')) {
               $start = date('Y-m-01');
               $end = date('Y-m-t');
           } else {
               continue;
           }
       }
    } else {
      if ($value['type'] == 'daily') {
        if(strtolower($day) == 'saturday' || strtolower($day) == 'sunday') {
          continue;
        }
      } elseif ($value['type'] == 'weekly') {
         if (strtolower($day) == 'friday') {
             $start = date('Y-m-d', strtotime("last Saturday"));
             $end = date('Y-m-d');
         } else {
             continue;
         }
       } elseif ($value['type'] == 'monthly') {
           if (gmdate('t') == gmdate('d')) {
               $start = date('Y-m-01');
               $end = date('Y-m-t');
           } else {
               continue;
           }
       }
    }

    if (!empty($DBQueries[$value['report']])) {
        $FileName = 'CronReport-' . $start . '-' . $end . '-' . $value['name'] . '-' . time();

        $Query = str_replace(['StartDate', 'EndDate'], [$start, $end.' '.$end_time], $DBQueries[$value['report']]);

        $dataExist = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);

        if (strpos($value['report'], 'disposition') !== false && strpos($value['report'], 'vertical') == false) {
            if (strpos($value['report'], 'agent') !== false) {
                $FieldName = 'AgentName';
            } elseif (strpos($value['report'], 'campaign') !== false) {
                $FieldName = 'CampaignName';
            } elseif (strpos($value['report'], 'list') !== false) {
                $FieldName = 'ListName';
            } else {
                continue;
            }

            $StatusList = $database->query($DBQueries['Status'])->fetchAll(PDO::FETCH_ASSOC);
            $count = 0;

            if ($AttachmentType == 'HTML') {
                $AttachmentBody = '<table>';

                $header = '<tr><th>' . $FieldName . '</th><th>User Group</th>';
                foreach ($StatusList as $listStatus) {
                    $header .= '<th>' . $listStatus['status'] . '(' . $listStatus['status_name'] . ')</th>';
                }
                $AttachmentBody .= $header . '</tr>';

                foreach ($dataExist as $k => $record) {
                    $body = $record[$FieldName] . ',';
                    $body .= $record['user_group'] . ',';
                    $statusArray = array_combine(explode(',', $record['nameStatus']), explode(',', $record['countStatus']));
                    foreach ($StatusList as $listStatus) {
                        $body .= (!empty($statusArray[$listStatus['status']])) ? $statusArray[$listStatus['status']] . ',' : '0,';
                    }
                    $AttachmentBody .= '<tr><td>' . str_replace(',', '</td><td>', $body) . "</td></tr>";
                }
                $AttachmentBody .= '</table>';
            } elseif ($AttachmentType == 'CSV') {
                $AttachmentBody = [];
                $header = $FieldName . ',';
                foreach ($StatusList as $listStatus) {
                    $header .= $listStatus['status'] . '(' . $listStatus['status_name'] . '),';
                }
                $AttachmentBody[] = explode(',',$header);

                foreach ($dataExist as $k => $record) {

                    $body = $record[$FieldName] . ',';
                    $statusArray = array_combine(explode(',', $record['nameStatus']), explode(',', $record['countStatus']));
                    foreach ($StatusList as $listStatus) {
                        $body .= (!empty($statusArray[$listStatus['status']])) ? $statusArray[$listStatus['status']] . ',' : '0,';
                    }

                    $AttachmentBody[] = explode(',',$body);
                }
            }

        } elseif (strpos($value['report'], 'pause') !== false) {
            if (strpos($value['report'], 'agent') !== false) {
                $FieldName = 'AgentName';
            } elseif (strpos($value['report'], 'campaign') !== false) {
                $FieldName = 'CampaignName';
            } elseif (strpos($value['report'], 'list') !== false) {
                $FieldName = 'ListName';
            } else {
                continue;
            }

            $PauseList = $database->query($DBQueries['Pause'])->fetchAll(PDO::FETCH_ASSOC);

            $count = 0;

            if ($AttachmentType == 'HTML') {
                $AttachmentBody = '<table>';

                $header = '<tr><th>' . $FieldName . '</th>';
                foreach ($PauseList as $listPause) {
                    $header .= '<th>' . $listPause['pause_code'] . '(' . $listPause['pause_code_name'] . ')</th>';
                }
                $AttachmentBody .= $header . '</tr>';

                foreach ($dataExist as $k => $record) {
                    $body = $record[$FieldName] . ',';
                    $statusArray = array_combine(explode(',', $record['StatusList']), explode(',', $record['StatusCount']));
                    foreach ($PauseList as $listPause) {
                        $body .= (!empty($statusArray[$listPause['pause_code']])) ? $statusArray[$listPause['pause_code']] . ',' : '0,';
                    }
                    $AttachmentBody .= '<tr><td>' . str_replace(',', '</td><td>', $body) . "</td></tr>";
                }
                $AttachmentBody .= '</table>';
            } elseif ($AttachmentType == 'CSV') {
                $AttachmentBody = [];
                $header = $FieldName . ',';
                foreach ($PauseList as $listPause) {
                    $header .= $listPause['pause_code'] . '(' . $listPause['pause_code_name'] . '),';
                }
                $AttachmentBody[] = explode(',',$header);

                foreach ($dataExist as $k => $record) {

                    $body = $record[$FieldName] . ',';
                    $statusArray = array_combine(explode(',', $record['StatusList']), explode(',', $record['StatusCount']));
                    foreach ($PauseList as $listPause) {
                        $body .= (!empty($statusArray[$listPause['pause_code']])) ? $statusArray[$listPause['pause_code']] . ',' : '0,';
                    }

                    $AttachmentBody[] = explode(',',$body);
                }
            }

        } elseif (strpos($value['report'], '_hour_report') !== false) {

            $QueryHour = str_replace(['StartDate', 'EndDate'], [$start, $end], $DBQueries['Hour']);
            $HourList = $database->query($QueryHour)->fetchAll(PDO::FETCH_ASSOC);

            $count = 0;

            if ($AttachmentType == 'HTML') {
                $AttachmentBody = '<table>';

                $header = '<tr><th>Agent</th><th>Group</th>';
                foreach ($HourList as $timeHour) {
                    $header .= '<th>' . str_pad($timeHour['HourTime'], 2, '0', STR_PAD_LEFT) . ':00</th>';
                }
                $AttachmentBody .= $header . '</tr>';

                foreach ($dataExist as $k => $record) {
                    $body = $record['full_name'] . ',' . $record['user_group'] . ',';
                    $statusArray = array_combine(explode(',', $record['CallDateCount']), explode(',', $record['countTotal']));

                    foreach ($HourList as $timeHour) {

                        $body .= (!empty($statusArray[$timeHour['HourTime']]) && $statusArray[$timeHour['HourTime']]) ? gmdate('H:i:s', $statusArray[$timeHour['HourTime']]) . ',' : '0,';
                    }
                    $AttachmentBody .= '<tr><td>' . str_replace(',', '</td><td>', $body) . "</td></tr>";
                }
                $AttachmentBody .= '</table>';
            } elseif ($AttachmentType == 'CSV') {
                $AttachmentBody = [];
                $header = 'Agent,Group,';
                foreach ($HourList as $timeHour) {
                    $header .= str_pad($timeHour['HourTime'], 2, '0', STR_PAD_LEFT) . ':00,';
                }
                $AttachmentBody[] = explode(',',$header);

                foreach ($dataExist as $k => $record) {
                    $body = $record['full_name'] . ',' . $record['user_group'] . ',';
                    $statusArray = array_combine(explode(',', $record['CallDateCount']), explode(',', $record['countTotal']));

                    foreach ($HourList as $timeHour) {

                        $body .= (!empty($statusArray[$timeHour['HourTime']]) && $statusArray[$timeHour['HourTime']]) ? gmdate('H:i:s', $statusArray[$timeHour['HourTime']]) . ',' : '0,';
                    }

                    $AttachmentBody[] = explode(',',$body);
                }
            }
        } else {
            $count = 0;

            if ($AttachmentType == 'HTML') {
                $AttachmentBody = '<table class="table"  cellpadding="2" width="100%">';
                foreach ($dataExist as $k => $record) {
                    if ($count == 0) {
                        $AttachmentBody .= '<tr style="background-color: #26c6da !important;color: #fff;"><th>' . implode('</th><th>', array_keys($record)) . "</th></tr>";
                    }

                    $AttachmentBody .= '<tr><td>' . implode('</td><td>', $record) . "</td></tr>";
                    $count++;
                }
                $AttachmentBody .= '</table>';
            } elseif ($AttachmentType == 'CSV') {
                $AttachmentBody = [];
                foreach ($dataExist as $k => $record) {
                    if ($count == 0) {
                        $AttachmentBody[] = array_keys($record);
                    }

                    $AttachmentBody[] = $record;
                    $count++;
                }
            }
        }


        $toArray = array_filter(explode(',',$value['recipients']));
        $params = [];
        $params['to'] = $toArray[0];
        $params['from'] = 'ngupta@usethegeeks.co.uk';
        $params['subject'] = $value['name'];

        if ($AttachmentType == 'CSV') {
            $MailConent = "<html>
    <head>
        <title></title>
        <style>
            table.list tr td {
                /*padding: 5px 13px;*/
                border-bottom:1px solid #007c9c;
                border-right:1px solid #007c9c;

            }
            table.list tr{
                padding: 0px;
                border-bottom: 1px solid #000;

            }
            table.list {
                clear: both;
                background: #f2f2f2;
                margin: 2px 0;
                /*margin-bottom:50px*/
            }
            table {
            border-collapse: collapse;
            }
            table, th, td {
                    border: 2px solid #1290AC;
            }
            .green{color:#00CC66; font-weight:bold}
            .orange{color:orange; font-weight:bold}
            .red{color:red; font-weight:bold}
            .list tr:first-child {
   background-color: #26c6da !important;
    color: #fff;
}
.table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#b8daff}.table-hover .table-primary:hover{background-color:#9fcdff}.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#9fcdff}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#d6d8db}.table-hover .table-secondary:hover{background-color:#c8cbcf}.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#c8cbcf}.table-success,.table-success>td,.table-success>th{background-color:#c3e6cb}.table-hover .table-success:hover{background-color:#b1dfbb}.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#b1dfbb}.table-info,.table-info>td,.table-info>th{background-color:#bee5eb}.table-hover .table-info:hover{background-color:#abdde5}.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#abdde5}.table-warning,.table-warning>td,.table-warning>th{background-color:#ffeeba}.table-hover .table-warning:hover{background-color:#ffe8a1}.table-hover .table-warning:hover>td,.table-hover .table-warning:hover>th{background-color:#ffe8a1}.table-danger,.table-danger>td,.table-danger>th{background-color:#f5c6cb}.table-hover .table-danger:hover{background-color:#f1b0b7}.table-hover .table-danger:hover>td,.table-hover .table-danger:hover>th{background-color:#f1b0b7}.table-light,.table-light>td,.table-light>th{background-color:#fdfdfe}.table-hover .table-light:hover{background-color:#ececf6}.table-hover .table-light:hover>td,.table-hover .table-light:hover>th{background-color:#ececf6}.table-dark,.table-dark>td,.table-dark>th{background-color:#c6c8ca}.table-hover .table-dark:hover{background-color:#b9bbbe}.table-hover .table-dark:hover>td,.table-hover .table-dark:hover>th{background-color:#b9bbbe}.table-active,.table-active>td,.table-active>th{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover>td,.table-hover .table-active:hover>th{background-color:rgba(0,0,0,.075)}.table .thead-dark th{color:#fff;background-color:#212529;border-color:#32383e}.table .thead-light th{color:#495057;background-color:#e9ecef;border-color:#dee2e6}.table-dark{color:#fff;background-color:#212529}.table-dark td,.table-dark th,.table-dark thead th{border-color:#32383e}.table-dark.table-bordered{border:0}.table-dark.table-striped tbody tr:nth-of-type(odd){background-color:rgba(255,255,255,.05)}.table-dark.table-hover tbody tr:hover{background-color:rgba(255,255,255,.075)}@media (max-width:575.98px){.table-responsive-sm{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-sm>.table-bordered{border:0}}@media (max-width:767.98px){.table-responsive-md{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-md>.table-bordered{border:0}}@media (max-width:991.98px){.table-responsive-lg{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-lg>.table-bordered{border:0}}@media (max-width:1199.98px){.table-responsive-xl{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-xl>.table-bordered{border:0}}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive>.table-bordered{border:0}
        </style>
    </head>
    <body></body></html>";
            //$data = create_csv_file($AttachmentBody, $filename);
            //$params['Attachment'] = $filename;
            $file_data = file_get_contents($filename);
            $params['files[report__.csv]'] = $file_data;
            $params['type']='application/csv';
            //$params['attach'] = chunk_split(base64_encode(create_csv_file($AttachmentBody)));
        } elseif ($AttachmentType == 'HTML') {
            $MailConent = "<html>
    <head>
        <title></title>
        <style>
            table.list tr td {
                /*padding: 5px 13px;*/
                border-bottom:1px solid #007c9c;
                border-right:1px solid #007c9c;

            }
            table.list tr{
                padding: 0px;
                border-bottom: 1px solid #000;

            }
            table.list {
                clear: both;
                background: #f2f2f2;
                margin: 2px 0;
                /*margin-bottom:50px*/
            }
            table {
            border-collapse: collapse;
            }
            table, th, td {
                    border: 2px solid #1290AC;
            }
            .green{color:#00CC66; font-weight:bold}
            .orange{color:orange; font-weight:bold}
            .red{color:red; font-weight:bold}
            .list tr:first-child {
   background-color: #26c6da !important;
    color: #fff;
}
.table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#b8daff}.table-hover .table-primary:hover{background-color:#9fcdff}.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#9fcdff}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#d6d8db}.table-hover .table-secondary:hover{background-color:#c8cbcf}.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#c8cbcf}.table-success,.table-success>td,.table-success>th{background-color:#c3e6cb}.table-hover .table-success:hover{background-color:#b1dfbb}.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#b1dfbb}.table-info,.table-info>td,.table-info>th{background-color:#bee5eb}.table-hover .table-info:hover{background-color:#abdde5}.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#abdde5}.table-warning,.table-warning>td,.table-warning>th{background-color:#ffeeba}.table-hover .table-warning:hover{background-color:#ffe8a1}.table-hover .table-warning:hover>td,.table-hover .table-warning:hover>th{background-color:#ffe8a1}.table-danger,.table-danger>td,.table-danger>th{background-color:#f5c6cb}.table-hover .table-danger:hover{background-color:#f1b0b7}.table-hover .table-danger:hover>td,.table-hover .table-danger:hover>th{background-color:#f1b0b7}.table-light,.table-light>td,.table-light>th{background-color:#fdfdfe}.table-hover .table-light:hover{background-color:#ececf6}.table-hover .table-light:hover>td,.table-hover .table-light:hover>th{background-color:#ececf6}.table-dark,.table-dark>td,.table-dark>th{background-color:#c6c8ca}.table-hover .table-dark:hover{background-color:#b9bbbe}.table-hover .table-dark:hover>td,.table-hover .table-dark:hover>th{background-color:#b9bbbe}.table-active,.table-active>td,.table-active>th{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover>td,.table-hover .table-active:hover>th{background-color:rgba(0,0,0,.075)}.table .thead-dark th{color:#fff;background-color:#212529;border-color:#32383e}.table .thead-light th{color:#495057;background-color:#e9ecef;border-color:#dee2e6}.table-dark{color:#fff;background-color:#212529}.table-dark td,.table-dark th,.table-dark thead th{border-color:#32383e}.table-dark.table-bordered{border:0}.table-dark.table-striped tbody tr:nth-of-type(odd){background-color:rgba(255,255,255,.05)}.table-dark.table-hover tbody tr:hover{background-color:rgba(255,255,255,.075)}@media (max-width:575.98px){.table-responsive-sm{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-sm>.table-bordered{border:0}}@media (max-width:767.98px){.table-responsive-md{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-md>.table-bordered{border:0}}@media (max-width:991.98px){.table-responsive-lg{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-lg>.table-bordered{border:0}}@media (max-width:1199.98px){.table-responsive-xl{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-xl>.table-bordered{border:0}}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive>.table-bordered{border:0}
        </style>
    </head>
    <body></body>" . $AttachmentBody . "</html>";
        }
        $params['html'] = $MailConent;

        //print_r($params); die;



        $sendgrid_apikey = $api_key;
    $url = 'https://api.sendgrid.com/';
    $js = array();
    $request = $url . 'api/mail.send.json';

        $session = curl_init($request);
            // Tell PHP not to use SSLv3 (instead opting for TLS)
            curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
            curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
            // Tell curl to use HTTP POST
            curl_setopt($session, CURLOPT_POST, true);
            // Tell curl that this is the body of the POST
            curl_setopt($session, CURLOPT_POSTFIELDS, $params);
            // Tell curl not to return headers, but do return the response
            curl_setopt($session, CURLOPT_HEADER, false);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

            // obtain response
            $response = curl_exec($session);
            curl_close($session);
//              $result = json_decode($response);
            // print everything out
//              echo $response->{'message'};
            $data = json_decode($response, true);

            print_r($data);
    }
  }

}




/*START CHAT*/
