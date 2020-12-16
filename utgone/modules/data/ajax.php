<?php

$arrayRule = ['add', 'copy', 'listing', 'update', 'delete', 'ListCustomUpdate', 'ListCustomAdd', 'ListDetailUpdate', 'GetCustomField', 'GetLeadInsert', 'CLI', 'DownloadLead', 'TemplateSave', 'CreateDataRule', 'RemoveDataRule', 'CreateStatusEmailRule', 'RemoveStatusEmailRule', 'CreateArchiveRule', 'RemoveArchiveRule', 'practice'];
if (!empty($_GET['rule']) && in_array($_GET['rule'], $arrayRule)) {
    if ($_GET['rule'] == 'add') {
        if (!checkRole('data', 'create')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $ListID = $_POST['list_id'];
        $ListName = $_POST['list_name'];
        $ListDescription = $_POST['list_description'];
        $ListCampaignID = $_POST['campaign_id'];
        $ListActive = $_POST['active'];
        $ListExist = $database->count('vicidial_lists', ['list_id' => $ListID]);
        if (!empty($ListExist) && $ListExist > 0) {
            $response = response(0, 1, 'List ID ' . $ListID . ' already exist!!', NULL);
        } else {
            $arrayInsert = [];
            $arrayInsert['list_id'] = $ListID;
            $arrayInsert['list_name'] = $ListName;
            $arrayInsert['campaign_id'] = $ListCampaignID;
            $arrayInsert['active'] = $ListActive;
            $arrayInsert['list_description'] = $ListDescription;
            $ListExist = $database->insert('vicidial_lists', $arrayInsert);

            $responseData = [];
            $responseData['ListID'] = $ListID;
            $responseData['ListName'] = $ListName;

            $response = response(1, 0, 'New List has been created successfully!!', $responseData);
            admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'ADD', $ListID, 'ADD-LISTS', $database->last(), 'ADD LISTS', '--All--');
        }
    } elseif ($_GET['rule'] == 'copy') {
        if (!checkRole('data', 'create')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $ListID = $_POST['list_id'];
        $ListName = $_POST['list_name'];
        $ListDescription = $_POST['list_description'];
        $ListCloneID = $_POST['clone_list_id'];
        $ListActive = $_POST['active'];
        $ListExist = $database->count('vicidial_lists', ['OR' => ['list_id' => $ListID, 'list_name' => $ListName]]);
        if (!empty($ListExist) && $ListExist > 0) {
            $response = response(0, 1, 'List ID ' . $ListID . ' already exist!!', NULL);
        } else {
            $arrayInsert = $database->get('vicidial_lists', '*', ['list_id' => $ListCloneID]);
            $arrayInsert['list_id'] = $ListID;
            $arrayInsert['list_name'] = $ListName;
            $arrayInsert['active'] = $ListActive;
            $arrayInsert['list_description'] = $ListDescription;
            $ListExist = $database->insert('vicidial_lists', $arrayInsert);

            $ListCustomFields = $database->get('custom_fields', '*', ['list_id' => $ListCloneID]);
            if (!empty($ListCustomFields['list_id']) && $ListCustomFields['list_id'] == $ListCloneID) {
                $ListCustomFields['list_id'] = $ListID;
                $database->insert('custom_fields', $ListCustomFields);
            }

            $responseData = [];
            $responseData['ListID'] = $ListID;
            $responseData['ListName'] = $ListName;
            $response = response(1, 0, 'New List has been copied successfully!!', $responseData);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'COPY', $ListID, 'COPY-LISTS', $database->last(), 'COPY LISTS', '--All--');
    } elseif ($_GET['rule'] == 'listing') {
        if (!checkRole('data', 'view')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $arrayField = ['list_id', 'list_name', 'campaign_id', 'list_description', 'active', 'resets_today'];

        $campaignID = isset($_SESSION['CurrentLogin']['Campaign']) ? $_SESSION['CurrentLogin']['Campaign'] : 0;

        $ConditionArray = [];
        if (!empty($campaignID) && $campaignID) {
            $ConditionArray['campaign_id'] = $campaignID;
        }

        if (!empty($_GET['show']) && $_GET['show'] == 'all') {
            $data = $database->select('vicidial_lists', $arrayField, ['campaign_id' => $campaignID]);
        } else {
            $ConditionArray['active'] = 'Y';

            $data = $database->select('vicidial_lists', $arrayField, ['AND' => $ConditionArray]);
        }

        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['campaign_id' => $campaignID, 'ORDER' => ['campaign_id' => 'ASC']]);

        foreach ($data as $key => $value) {
            $data[$key]['Total'] = $database->count('vicidial_list', ['list_id' => $value['list_id']]);
            $data[$key]['Available'] = $database->count('vicidial_list', ['AND' => ['list_id' => $value['list_id'], 'status' => 'NEW']]);
            $data[$key]['Queued'] = 0;
            $data[$key]['ResetCount'] = $value['resets_today'];
            $data[$key]['DupeCount'] = 0;
            $data[$key]['Archive'] = 0;
            $data[$key]['TPS'] = 0;
            $SQL_D = '';
            if ($value['active'] == 'Y') {
                $SQL_D = 'active';
            }
            $data[$key]['active'] = '<button type="button" class="btn btn-sm btn-toggle ' . $SQL_D . ' SwitchListActive" data-id="' . $value['list_id'] . '" data-toggle="button" aria-pressed="false">
						<div class="handle"></div>
                                  </button>';
            $data[$key]['Action'] = '<a href="' . base_url('data/ajax') . '?rule=DownloadLead&list_id=' . $value['list_id'] . '" class="btn btn-app btn-info" title="Download List"><i class="fa fa-download"></i></a><a href="' . base_url('data/edit') . '?list_id=' . $value['list_id'] . '" class="btn btn-app btn-success" title="View List "><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-app btn-danger ListRemove" data-id="' . $value['list_id'] . '" title="Remove List"><i class="fa fa-times"></i></a>';

            $CampaignListing = '<select class="form-control CampaignSelection" name="" data-id="' . $value['list_id'] . '">';
            $CampaignListing .= '<option value="">Select Campaign</option>';
            foreach ($CampaignListings as $listing) {
                $selected = (!empty($listing['campaign_id']) && $listing['campaign_id'] == $value['campaign_id']) ? 'selected="selected"' : '';
                $CampaignListing .= '<option value="' . $listing['campaign_id'] . '"  ' . $selected . '>' . $listing['campaign_id'] . ' - ' . $listing['campaign_name'] . '</option>';
            }
            $CampaignListing .= '</select>';

            $data[$key]['campaign_id'] = $CampaignListing;
        }
        $resultResponse = array(
            "draw" => intval(1),
            "recordsTotal" => intval(count($data)),
            "recordsFiltered" => intval(count($data)),
            "data" => $data
        );
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'LOAD', '', 'LISTING-LISTS', $database->last(), 'LISTING LISTS', '--All--');

        echo json_encode($resultResponse);
        exit;
    } elseif ($_GET['rule'] == 'update') {
        if (!checkRole('data', 'edit')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $POSTCount = count($_POST);
        if ($POSTCount == 3) {
            $FieldName = $_POST['field'];
            $FieldValue = $_POST['value'];
            $Condition = $_POST['ListID'];
            $result = $database->update('vicidial_lists', [$FieldName => $FieldValue], ['list_id' => $Condition]);

            if ($result->rowCount() > 0) {
                $response = response(1, 0, 'Your list has been successfully updated!!', NULL);
            } else {
                $response = response(0, 1, 'Oops!! No Updated!!', NULL);
            }
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', $Condition, 'MODIFY-' . $FieldName, $database->last(), 'MODIFY LISTS', '--All--');
    } elseif ($_GET['rule'] == 'delete') {
        if (!checkRole('data', 'delete')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $Condition = $_POST['ListID'];
        $result = $database->delete('vicidial_lists', ['list_id' => $Condition]);
        $database->delete('vicidial_list', ['list_id' => $Condition]);

        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Your list has been successfully deleted!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'DELETE', $Condition, 'DELETE-DETAIL', $database->last(), 'DELETE DETAIL LISTS', '--All--');
    } elseif ($_GET['rule'] == 'ListCustomUpdate') {
        if (!checkRole('data', 'view')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $ListID = $_POST['ListID'];
        $FieldColumn = $_POST['FieldColumn'];
        $FieldValue = $_POST['FieldValue'];
        $result = $database->update('custom_fields', [$FieldColumn => $FieldValue], ['list_id' => $ListID]);
        if ($result->rowCount() > 0) {
            $response = response(1, 0, 'Your list custom fields has been successfully updated!!', NULL);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', $ListID, 'MODIFY-CUSTOM', $database->last(), 'MODIFY CUSTOM FIELDS', '--All--');
    } elseif ($_GET['rule'] == 'ListCustomAdd') {
        if (!checkRole('data', 'create')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        //$TableColumn = ['custom_1' => NULL, 'custom_2' => NULL, 'custom_3' => NULL, 'custom_4' => NULL, 'custom_5' => NULL, 'custom_6' => NULL, 'custom_7' => NULL, 'custom_8' => NULL, 'custom_9' => NULL, 'custom_10' => NULL];
        $ListID = $_POST['ListID'];
        $FieldValue = $_POST['FieldValue'];
        $result = $database->get('custom_fields', '*', ['list_id' => $ListID]);
        if (empty($result)) {
            $result = $database->insert('custom_fields', ['custom_1' => $FieldValue, 'list_id' => $ListID]);
            if (!empty($result->rowCount()) && $result->rowCount() > 0) {
                $Array = [];
                $Array['Column'] = 'custom_1';
                $Array['Value'] = $FieldValue;
                $response = response(1, 0, 'Your list custom fields has been successfully inserted!!', $Array);
            } else {
                $response = response(0, 1, 'Oops!! No Updated!!', NULL);
            }
            admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'ADD', $ListID, 'ADD-CUSTOM', $database->last(), 'ADD CUSTOM FIELDS LISTS', '--All--');
        } else {
            $result1 = array_filter($result);
            $EmptyKeyColumn = array_keys(array_diff($result, $result1));
            $result = $database->update('custom_fields', [$EmptyKeyColumn[0] => $FieldValue], ['list_id' => $ListID]);
            if ($result->rowCount() > 0) {
                $Array = [];
                $Array['Column'] = $EmptyKeyColumn[0];
                $Array['Value'] = $FieldValue;
                $response = response(1, 0, 'Your list custom fields has been successfully updated!!', $Array);
            } else {
                $response = response(0, 1, 'Oops!! No Updated!!', NULL);
            }
            admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', $ListID, 'MODIFY-CUSTOM', $database->last(), 'MODIFY CUSTOM FIELDS LISTS', '--All--');
        }
    } elseif ($_GET['rule'] == 'ListDetailUpdate') {
        
        if (!checkRole('data', 'edit')) {
            echo json_encode(response(0, 1, 'No Permission!!', NULL));
            die;
        }
        $ListID = $_POST['list_id'];
        $ListName = $_POST['list_name'];
        $ListDescription = $_POST['list_description'];
        $ExpirationDate = $_POST['expiration_date'];
        $CampaignCIDOveride = $_POST['campaign_cid_override'];
        $ResetTime = $_POST['reset_time'];
        $CampaignID = $_POST['campaign_id'];
        $WebFormAddress = $_POST['web_form_address'];
        $MessageExtenOverride = $_POST['am_message_exten_override'];
        $reset_list = $_POST['reset_list'];
        $active = $_POST['active'];
        $reset_list = $_POST['reset_list'];
        $DailyResetLimit = isset($_POST['daily_reset_limit']) ? $_POST['daily_reset_limit'] : 0;

        $UpdateArray = [];
        $UpdateArray['list_name'] = $ListName;
        $UpdateArray['list_description'] = $ListDescription;
        $UpdateArray['expiration_date'] = $ExpirationDate;
        $UpdateArray['campaign_cid_override'] = $CampaignCIDOveride;
        $UpdateArray['reset_time'] = $ResetTime;
        $UpdateArray['campaign_id'] = $CampaignID;
        $UpdateArray['web_form_address'] = $WebFormAddress;
        $UpdateArray['am_message_exten_override'] = $MessageExtenOverride;
        $UpdateArray['active'] = $active;
        $UpdateArray['reset_list'] = $reset_list;
        $UpdateArray['daily_reset_limit'] = $DailyResetLimit;

        $result = $database->update('vicidial_lists', $UpdateArray, ['list_id' => $ListID]);

        if ($reset_list == 'Y') {
            $rslt = $database->get('vicidial_lists', ['daily_reset_limit', 'resets_today','reset_time'], ['list_id' => $ListID]);
            if (($rslt['daily_reset_limit'] > $rslt['resets_today']) or ( $rslt['daily_reset_limit'] < 0)) {
                $database->update('vicidial_lists', ['resets_today' => ($rslt['resets_today'] + 1), 'reset_time'=>($rslt['reset_time'] + 1),'last_reset_date' => date('Y-m-d H:i:s')], ['list_id' => $ListID]);
                $database->update('vicidial_list', ['called_since_last_reset' => 'N'], ['list_id' => $ListID]);
            }else{
                $database->update('vicidial_lists', ['resets_today' => ($rslt['resets_today'] + 1),'reset_time'=>($rslt['reset_time'] + 1), 'last_reset_date' => date('Y-m-d H:i:s')], ['list_id' => $ListID]);
                $database->update('vicidial_list', ['called_since_last_reset' => 'N'], ['list_id' => $ListID]);
            }
            $response = response(1, 0, 'Your list has been successfully updated!!', NULL);
        }else{
            
            if ($result->rowCount() > 0) {
                $response = response(1, 0, 'Your list has been successfully updated!!', NULL);
            } else {
                $response = response(0, 1, 'Oops!! No Updated!!', NULL);
            }
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', $ListID, 'MODIFY-DETAIL', $database->last(), 'MODIFY DETAIL LISTS', '--All--');
    } elseif ($_GET['rule'] == 'GetCustomField') {
        $ListID = $_POST['ListID'];
        $CustomFields = $database->get('custom_fields', ['custom_1', 'custom_2', 'custom_3', 'custom_4', 'custom_5', 'custom_6', 'custom_7', 'custom_8', 'custom_9', 'custom_10'], ['list_id' => $ListID]);
        if (!empty($CustomFields) && count($CustomFields) > 0) {
            $CustomFields = array_filter($CustomFields);
            $response = response(1, 0, 'Successfully Updated', $CustomFields);
        } else {
            $response = response(0, 1, 'Oops!! No Updated!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'LOAD', $ListID, 'LOAD-CUSTOM', $database->last(), 'LOAD CUSTOM FIELDS', '--All--');
    } elseif ($_GET['rule'] == 'GetLeadInsert') {
        $ListID = $_POST['list_id'];
        $PhoneCode = $_POST['phone_code'];
        $PhoneNumber = $_POST['phone_number'];
        $Title = $_POST['title'];
        $FirstName = $_POST['first_name'];
        $MiddleInitial = $_POST['middle_initial'];
        $LastName = $_POST['last_name'];
        $Address1 = $_POST['address1'];
        $Address2 = $_POST['address2'];
        $Address3 = $_POST['address3'];
        $City = $_POST['city'];
        $State = $_POST['state'];
        $Province = $_POST['province'];
        $PostalCode = $_POST['postal_code'];
        $CountryCode = $_POST['country_code'];
        $DateOfBirth = $_POST['date_of_birth'];
        $AltPhone = $_POST['alt_phone'];
        $Email = $_POST['email'];
        $SecurityPhrase = $_POST['security_phrase'];
        $comments = $_POST['comments'];
        $VendorLeadCode = $_POST['vendor_lead_code'];

        $CodeExist = $database->count('vicidial_list', ['vendor_lead_code' => $VendorLeadCode]);

        if ($CodeExist > 0) {
            $_SESSION['LeadPostData'] = $_POST;
            $_SESSION['VendorLeadCodeValidation'] = 'Vendor Lead Code Exist already';
            header('location:single?msg=fail');
            exit;
        } else {
            $InsertArray = [];
            $InsertArray['list_id'] = $ListID;
            $InsertArray['phone_code'] = $PhoneCode;
            $InsertArray['phone_number'] = $PhoneNumber;
            $InsertArray['title'] = $Title;
            $InsertArray['first_name'] = $FirstName;
            $InsertArray['middle_initial'] = $MiddleInitial;
            $InsertArray['last_name'] = $LastName;
            $InsertArray['address1'] = $Address1;
            $InsertArray['address2'] = $Address2;
            $InsertArray['address3'] = $Address3;
            $InsertArray['city'] = $City;
            $InsertArray['state'] = $State;
            $InsertArray['province'] = $Province;
            $InsertArray['postal_code'] = $PostalCode;
            $InsertArray['country_code'] = $CountryCode;
//        $InsertArray['gender'] = [];
            $InsertArray['date_of_birth'] = $DateOfBirth;
            $InsertArray['alt_phone'] = $AltPhone;
            $InsertArray['email'] = $Email;
            $InsertArray['security_phrase'] = $SecurityPhrase;
            $InsertArray['comments'] = $comments;
            $InsertArray['entry_list_id'] = $ListID;
            $InsertArray['vendor_lead_code'] = $VendorLeadCode;
            $InsertArray['status'] = "NEW";
            $InsertArray['entry_date'] = date('Y-m-d H:i:s');

            $data = $database->insert('vicidial_list', $InsertArray);
            if ($database->id()) {
                $LeadID = $database->id();
                unset($_SESSION['LeadPostData']);
                unset($_SESSION['VendorLeadCodeValidation']);
                $CustomFields = $database->get('custom_fields', ['custom_1', 'custom_2', 'custom_3', 'custom_4', 'custom_5', 'custom_6', 'custom_7', 'custom_8', 'custom_9', 'custom_10'], ['list_id' => $ListID]);
                if (!empty($CustomFields) && count($CustomFields) > 0) {
                    $CustomFields = array_filter($CustomFields);
                    $InsertCustomArray = [];
                    $InsertCustomArray['list_id'] = $ListID;
                    $InsertCustomArray['lead_id'] = $LeadID;
                    foreach (array_keys($CustomFields) as $val) {
                        $InsertCustomArray[$val] = $_POST[$val];
                    }

                    $database->insert('custom_fields_data', $InsertCustomArray);
                }
                admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'ADD', @$LeadID, 'ADD-LISTS-LEAD', $database->last(), 'ADD LEAD LISTS', '--All--');
                header('location:single?msg=success&lead_id=' . $LeadID);
                exit;
            }
        }
    } elseif ($_GET['rule'] == 'CLI') {
        $data = $database->update('vicidial_lists', ['campaign_cid_override' => $_POST['prefix'] . $_POST['cli']], ['list_id' => $_POST['list_id']]);

        $UpdateD = $data->rowCount();
        if ($UpdateD > 0) {
            $response = response(1, 0, 'Successfully Updated', $UpdateD);
        } else {
            $response = response(0, 1, 'Something Gonna Wrong!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', @$_POST['list_id'], 'MODIFY-campaign_cid_override', $database->last(), 'MODIFY DETAIL LISTS', '--All--');
    } elseif ($_GET['rule'] == 'DownloadLead') {
        $ListID = $_GET['list_id'];
        $LeadFieldArray = [];
        $data = $database->select('vicidial_list', '*', ['list_id' => $ListID]);

        $filename = $ListID . ".csv";
        $fp = fopen('php://output', 'w');
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        $Count = 0;
        foreach ($data as $line) {
            if ($Count == 0) {
                fputcsv($fp, array_keys($line));
            }
            fputcsv($fp, $line);
            $Count++;
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'EXPORT', $ListID, 'EXPORT-LISTS-LEADS', $database->last(), 'EXPOST LEAD DETAIL LISTS', '--All--');
        exit;
    } elseif ($_GET['rule'] == 'TemplateSave') {
        $ListID = $_SESSION['LISTID'];
        $TemplateName = $_POST['template_name'];
        $TemplateDescription = $_POST['template_description'];
        unset($_POST['template_name']);
        unset($_POST['template_description']);
        $StandardVariables = '';
           
        foreach ($_POST as $key => $val) {
            if(!empty($key) && $key == 'Custom'){
                foreach($_POST['Custom'] as $k=>$v){
                   if ($v != '' && $v >= 0) {
                        $StandardVariables .= $k . ',' . $v . '|';
                    } 
                }
            }else{
                if ($val != '' && $val >= 0) {
                    $StandardVariables .= $key . ',' . $val . '|';
                }
            }
        }
        $InsertArray = [];
        $InsertArray['list_id'] = $ListID;
        $InsertArray['template_name'] = $TemplateName;
        $InsertArray['template_description'] = $TemplateDescription;
        $InsertArray['standard_variables'] = $StandardVariables;

        $TemplateExist = $database->count('vicidial_custom_leadloader_templates', ['AND' => ['list_id' => $ListID, 'template_name' => $TemplateName]]);

        if ($TemplateExist == 0) {
            $database->insert('vicidial_custom_leadloader_templates', $InsertArray);
            $response = response(1, 0, 'Template successfully created!!', NULL);
        } else {
            $response = response(0, 1, 'This template alreadt exist!!', NULL);
        }
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'LOAD', $ListID, 'LOAD-LISTS-TEMPLATE', $database->last(), 'LOAD LISTS TEMPLATE', '--All--');
    } elseif ($_GET['rule'] == 'CreateDataRule') {
        $Start = date('Y-m-d', strtotime($_POST['StartDate']));
        $StartTime = date('H:i:s', strtotime($_POST['StartTime']));
        $_POST['start'] = $Start . ' ' . $StartTime;

        $End = date('Y-m-d', strtotime($_POST['EndDate']));
        $EndTime = date('H:i:s', strtotime($_POST['EndTime']));
        $_POST['end'] = $End . ' ' . $EndTime;


        if (!empty($_POST['rule_statuses']) && count($_POST['rule_statuses']) > 0) {
            $_POST['rule_statuses'] = implode(',', $_POST['rule_statuses']);
        }

        if (!empty($_POST['rule_list_id']) && count($_POST['rule_list_id']) > 0) {
            $_POST['rule_list_id'] = implode(',', $_POST['rule_list_id']);
        }

        if (!empty($_POST['rule_campaign_id']) && count($_POST['rule_campaign_id']) > 0) {
            $_POST['rule_campaign_id'] = implode(',', $_POST['rule_campaign_id']);
        }
        unset($_POST['StartDate']);
        unset($_POST['StartTime']);
        unset($_POST['EndDate']);
        unset($_POST['EndTime']);

        $ExistResult = $DBUTG->count('data_rules', ['rule_name' => $_POST['rule_name']]);
        if (!empty($ExistResult) && $ExistResult > 0) {
            $response = response(0, 1, 'This Data Rule already exist!!', NULL);
        } else {
            $data = $DBUTG->insert('data_rules', $_POST);
            $LastUpdatedID = $DBUTG->id();
            if (!empty($LastUpdatedID) && $LastUpdatedID > 0) {
                /* Start Process */
                $data = $DBUTG->get('data_rules', '*', ['id' => $LastUpdatedID]);
                $ColumnFilter = $data['rule_timeout_field'];
                $selection = $data['list_by_campaign'];
                switch ($selection) {
                    case 'campaign':
                        $ListIDs = $database->select('vicidial_lists',['list_id'], ['campaign_id' => explode(',', $data['rule_campaign_id'])]);
                        break;
                    case 'list':
                        $ListIDs = explode(',', $data['rule_list_id']);
                        break;
                    default:
                }

                if ($data['rule_copy_custom_fields'] == 'Y') {
                    $searchQueryCustom = "WHERE";
                    $searchQueryCustom .= " VL.".$ColumnFilter." >= '" . $data['start'] . "'";
                    $searchQueryCustom .= " AND VL.".$ColumnFilter." <= '" . $data['end'] . "'";

                    if (!empty($ListIDs) && count($ListIDs)) {
                        $searchQueryCustom .= " AND VL.list_id IN ('" . implode(",'", $ListIDs) . "')";
                    }

                    if (!empty($data['rule_statuses']) && $data['rule_statuses']) {
                        $searchQueryCustom .= " AND VL.status  IN ('" . implode(",'", explode(",", $data['rule_statuses'])) . "')";
                    }

                    if (!empty($data['rule_users']) && $data['rule_users']) {
                        $searchQueryCustom .= " AND VL.user = '" . $data['rule_users'] . "'";
                    }
                    $query = "UPDATE vicidial_list VL JOIN custom_fields_data CFD ON VL.lead_id = CFD.lead_id SET CFD.list_id = '" . $data['rule_list_assignment'] . "' " . $searchQueryCustom;

                    $data123 = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
                }
                
                $searchQueryDuplicateLead = 'WHERE';
                $searchQuery = [];
                $searchQuery['AND'][$ColumnFilter.'[>=]'] = $data['start'];
                $searchQuery['AND'][$ColumnFilter.'[<=]'] = $data['end'];
                
                $searchQueryDuplicateLead .= " VL1.".$ColumnFilter." >= '".$data['start']."'";
                $searchQueryDuplicateLead .= " AND VL1.".$ColumnFilter." <= '".$data['end']."'";
                
                if (!empty($ListIDs) && count($ListIDs)) {
                    $searchQuery['AND']['list_id'] = $ListIDs;
                    $searchQueryDuplicateLead .= " AND VL1.list_id IN ('" . implode(",'", $ListIDs) . "')";
                }

                if (!empty($data['rule_statuses']) && $data['rule_statuses']) {
                    $searchQuery['AND']['status'] = explode(',', $data['rule_statuses']);
                    $searchQueryDuplicateLead .= " AND VL1.status  IN ('" . implode(",'", explode(",", $data['rule_statuses'])) . "')";
                }

                if (!empty($data['rule_users']) && $data['rule_users']) {
                    $searchQuery['AND']['user'] = $data['rule_users'];
                    $searchQueryDuplicateLead .= " AND VL1.user = '" . $data['rule_users'] . "'";
                }

                if (!empty($data['rule_agent_groups']) && $data['rule_agent_groups']) {
//                    $searchQuery['AND']['user'] = $data['rule_users'];
                }


                $data1 = $database->count('vicidial_list', '*', $searchQuery);

                $SetStatusUpdate = [];

                $SetStatusUpdate['list_id'] = $data['rule_list_assignment'];

                if ($data['rule_set_status_to_new'] == 'Y') {
                    $SetStatusUpdate['status'] = 'NEW';
                }

                if ($data['rule_reset_called_count'] == 'Y') {
                    $SetStatusUpdate['called_count'] = 0;
                }
                
                if ($data['rule_duplicate_lead'] == 'Y') {
                    
                    $queryDuplicateLead = "UPDATE `vicidial_list` VL1 SET list_id = '".$data['rule_list_assignment']."'
".$searchQueryDuplicateLead." 
AND 
VL1.phone_number NOT IN 
(SELECT VL2.phone_number FROM (SELECT * FROM `vicidial_list`) VL2 WHERE VL2.list_id = '".$data['rule_list_assignment']."')";
                    
                    $dataResult = $database->query($queryDuplicateLead)->fetchAll(PDO::FETCH_ASSOC);
                    
                }else{
                    $dataUpdate = $database->update('vicidial_list', $SetStatusUpdate, $searchQuery); 
                    $CountUpdate = $dataUpdate->rowCount();
                }

                /* END Process */
                $response = response(1, 0, 'Your data rule has been successfully submitted!!', $dataResult);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['rule'] == 'RemoveDataRule') {
        if (!empty($_POST['rule_id']) && $_POST['rule_id']) {
            $data = $DBUTG->delete('data_rules', ['id' => $_POST['rule_id']]);
            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                $response = response(1, 0, 'Rule has been successfully deleted!!', NULL);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {
            $response = response(0, 1, 'Rule ID does not exist', NULL);
        }
    } elseif ($_GET['rule'] == 'CreateStatusEmailRule') {
        $ExistResult = $DBUTG->count('status_email_settings', ['rule_name' => $_POST['rule_name']]);
        if (!empty($ExistResult) && $ExistResult > 0) {
            $response = response(0, 1, 'This Data Rule already exist!!', NULL);
        } else {
            if(!empty($_POST['statuses']) && count($_POST['statuses']) > 0){
                $_POST['statuses'] = implode(',',$_POST['statuses']);
            }
            
            if(!empty($_POST['list_id']) && count($_POST['list_id']) > 0){
                $_POST['list_id'] = implode(',',$_POST['list_id']);
            }
            
            $data = $DBUTG->insert('status_email_settings', $_POST);
            $LastUpdatedID = $DBUTG->id();
            
            if (!empty($LastUpdatedID) && $LastUpdatedID > 0) {
                $response = response(1, 0, 'Your status email rule has been successfully submitted!!', NULL);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['rule'] == 'RemoveStatusEmailRule') {
        if (!empty($_POST['rule_id']) && $_POST['rule_id']) {
            $data = $DBUTG->delete('status_email_settings', ['id' => $_POST['rule_id']]);
            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                $response = response(1, 0, 'Rule has been successfully deleted!!', NULL);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {
            $response = response(0, 1, 'Rule ID does not exist', NULL);
        }
    } elseif ($_GET['rule'] == 'CreateArchiveRule') {
        $ExistResult = $DBUTG->count('data_archive_rules', ['rule_name' => $_POST['rule_name']]);
        if (!empty($ExistResult) && $ExistResult > 0) {
            $response = response(0, 1, 'This Data Rule already exist!!', NULL);
        } else {
            if (!empty($_POST['rule_list_id']) && count($_POST['rule_list_id']) > 0) {
                $_POST['rule_list_id'] = implode(',', $_POST['rule_list_id']);
            }
            if (!empty($_POST['rule_statuses']) && count($_POST['rule_statuses']) > 0) {
                $_POST['rule_statuses'] = implode(',', $_POST['rule_statuses']);
            }
            $data = $DBUTG->insert('data_archive_rules', $_POST);
            $LastUpdatedID = $DBUTG->id();
            if (!empty($LastUpdatedID) && $LastUpdatedID > 0) {
                /* START Process */
                $data = $DBUTG->query('SELECT * FROM data_archive_rules WHERE id = '.$LastUpdatedID)->fetchAll(PDO::FETCH_ASSOC);

                $case = $data[0]['rule_interval_type'];
                $interval = $data[0]['rule_interval'];
                switch ($case) {
                    case 'days':
                        $start = date('Y-m-d H:i:s', strtotime('-' . $interval . ' days'));
                        $end = date('Y-m-d H:i:s');
                        break;
                    case 'months':
                        $start = date('Y-m-d H:i:s', strtotime('-' . $interval . ' months'));
                        $end = date('Y-m-d H:i:s');
                        break;
                    case 'hours':
                        $start = date('Y-m-d H:i:s', strtotime('-' . $interval . ' hours'));
                        $end = date('Y-m-d H:i:s');
                        break;
                    default:
                }


                $searchQuery = "WHERE";
                $searchQuery .= " entry_date >= '" . $start . "'";
                $searchQuery .= " AND entry_date <= '" . $end . "'";
                if (!empty($data[0]['rule_list_id']) && $data[0]['rule_list_id']) {
                    $searchQuery .= " AND list_id IN ('" . implode("','", explode(',', $data[0]['rule_list_id'])) . "')";
                }

                if (!empty($data[0]['rule_statuses']) && $data[0]['rule_statuses']) {
                    $searchQuery .= " AND status IN ('" . implode("','", explode(",", $data[0]['rule_statuses'])) . "')";
                }

                $searchQuery .= " AND called_count >= '" . $data[0]['rule_called_count'] . "'";


                $query = "INSERT INTO list_archive
SELECT * FROM vicidial_list " . $searchQuery;
               
                $data1 = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
                
                $DeleteQuery = "DELETE FROM vicidial_list ".$searchQuery;
                $database->query($DeleteQuery)->fetchAll(PDO::FETCH_ASSOC);
                
                /* END Process */
                $response = response(1, 0, 'Your status email rule has been successfully submitted!!', NULL);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
    } elseif ($_GET['rule'] == 'RemoveArchiveRule') {
        if (!empty($_POST['rule_id']) && $_POST['rule_id']) {
            $data = $DBUTG->delete('data_archive_rules', ['id' => $_POST['rule_id']]);
            if (!empty($data->rowCount()) && $data->rowCount() > 0) {
                $response = response(1, 0, 'Archive Rule has been successfully deleted!!', NULL);
            } else {
                $response = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        } else {
            $response = response(0, 1, 'Rule ID does not exist', NULL);
        }
    } elseif ($_GET['rule'] == 'practice') {
        $columns = array(
            0 => 'status',
            1 => 'status_name',
            2 => 'selectable',
            3 => 'human_answered',
            4 => 'sale',
            5 => 'dnc',
            6 => 'customer_contact',
            7 => 'not_interested',
            8 => 'scheduled_callback',
            9 => 'completed',
            10 => 'Status_Type',
        );

        /* Start Data Tables */
        ## Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        ## Search 
        $searchQuery = " ";
        if ($searchValue != '') {
            $searchQuery = " WHERE (status like '%" . $searchValue . "%' or 
        status_name like '%" . $searchValue . "%' ) ";
        }

        ## Total number of records without filtering
        $sel = "select count(*) as allcount from vicidial_campaign_statuses";
        $records = $database->query($sel)->fetchAll(PDO::FETCH_ASSOC);
        $totalRecords = $records[0]['allcount'];

        ## Total number of record with filtering
        $sel = "select count(*) as allcount from vicidial_campaign_statuses " . $searchQuery;
        $records = $database->query($sel)->fetchAll(PDO::FETCH_ASSOC);
        $totalRecordwithFilter = $records[0]['allcount'];

        ## Fetch records
        $empQuery = "select * from vicidial_campaign_statuses " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage;

        $data = $database->query($empQuery)->fetchAll(PDO::FETCH_ASSOC);

        $totaldata = $database->count('vicidial_campaign_statuses');
        $response = array(
            "draw" => intval($_REQUEST['draw']),
            "recordsTotal" => intval($totalRecords),
            "recordsFiltered" => intval($totalRecordwithFilter),
            "data" => $data
        );
    }
    echo json_encode($response);
} else {
    echo json_encode(response(0, 1, 'Rule Not Defined', NULL));
}
