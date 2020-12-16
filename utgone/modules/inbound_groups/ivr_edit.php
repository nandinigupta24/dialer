<?php
if (!checkRole('inbound_groups', 'edit')) {
    no_permission();
} else {
    ?>
    <?php
    $CallMenuData = $database->get('vicidial_call_menu', '*', ['menu_id' => $_GET['menu_id']]);

//    $Phone = $database->select('phones',['extension','dialplan_number','fullname']);
//    $CallMenuListings = $database->select('vicidial_call_menu',['menu_id','menu_name']);
//    $InboundGroupListings = $database->select('vicidial_inbound_groups',['group_id','group_name']);
//    $InboundDIDListings = $database->select('vicidial_inbound_dids',['did_pattern','did_description','did_id']);
//    $InboundDIDListings = $database->select('vicidial_voicemail',['did_pattern','did_description','did_id']);

    $CallMenuDataOptions = $database->select('vicidial_call_menu_options', '*', ['menu_id' => $_GET['menu_id']]);

    $FileChooser = $database->select('audio_store_details', ['audio_filename']);

    if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
        $CampaignList = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_name' => 'ASC']]);
        $InboundGroupListings = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['ORDER' => ['group_id' => 'ASC']]);
        $InboundDIDListings = $database->select('vicidial_inbound_dids', ['did_pattern', 'did_description', 'did_id'], ['ORDER' => ['did_pattern' => 'ASC']]);
        $CallMenuListings = $database->select('vicidial_call_menu', ['menu_id', 'menu_name'], ['ORDER' => ['menu_id' => 'ASC']]);
        $Phone = $database->select('phones', ['extension', 'dialplan_number', 'fullname'], ['ORDER' => ['extension' => 'ASC']]);
    } else {
        $CampaignList = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_name' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);
        $InboundGroupListings = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['ORDER' => ['group_id' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);
        $InboundDIDListings = $database->select('vicidial_inbound_dids', ['did_pattern', 'did_description', 'did_id'], ['ORDER' => ['did_pattern' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);
        $CallMenuListings = $database->select('vicidial_call_menu', ['menu_id', 'menu_name'], ['ORDER' => ['menu_id' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);
        $Phone = $database->select('phones', ['extension', 'dialplan_number', 'fullname'], ['ORDER' => ['extension' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);
    }
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"><i class="fa fa-book"></i> Inbound IVR: <?php echo $CallMenuData['menu_id'] . ' - ' . $CallMenuData['menu_name']; ?></span>
                            <ul class="nav nav-tabs justify-content-end pull-right">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#tab1" onclick="$('#bottom_tools').show();"  role="tab" aria-selected="true" title="Dashboard"><i class="fa fa-dashboard"></i></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" onclick="$('#bottom_tools').hide();"  role="tab" aria-selected="true" title="Setting"><i class="fa fa-gears"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">
                                <div id="tab1" class="tab-pane p15">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="text-uppercase mbn"> Inbound IVR </h4>
                                            <!--<h6 class="mb15"> Visual overflow for 02SIMBRAND. </h6>-->
                                            <span id="today_sales_table">
                                                <?php
                                                $DIDdata = $database->select('vicidial_inbound_dids', ['did_pattern'], ['group_id' => $GroupData['group_id']]);
                                                if (!empty($DIDdata) && count($DIDdata)) {
                                                    $NumberAssigned = '';
                                                    foreach ($DIDdata as $dataList) {
                                                        $NumberAssigned .= $dataList['did_pattern'] . ', ';
                                                    }
                                                } else {
                                                    $NumberAssigned = 'No Inbound Number Assigned';
                                                }
                                                ?>
                                                <div class="alert alert-success col-lg-12" role="alert"><center>Inbound Number: <?php echo $NumberAssigned; ?></center></div>
                                                <div class="alert alert-default" role="alert" style="margin-bottom: 0px;"><center><i class="fa fa-long-arrow-down fa-3x"></i></center></div>
                                                <div class="alert alert-info" role="alert"><center>Inbound Group: <?php echo $GroupData['group_id'] . ' (' . $GroupData['group_name'] . ')'; ?></center></div>
                                                <div class="alert alert-default" role="alert" style="margin-bottom: 0px;"><center><i class="fa fa-long-arrow-down fa-3x"></i></center></div>
                                                <div class="row">
                                                    <div class="alert alert-warning col-sm-6" role="alert"><center>Drop Action: <?php echo $GroupData['drop_action']; ?> - <?php echo $GroupData['drop_exten']; ?><br></center></div>
                                                    <div class="alert alert-danger col-sm-6" role="alert"><center>After Hours Action: <?php echo $GroupData['after_hours_action']; ?> - <?php echo $GroupData['after_hours_exten']; ?><br></center></div>
                                                </div>
                                            </span>

                                        </div>

                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane p15 form-horizontal active">
                                    <div class="panel pn">
                                        <div class="panel-heading">
                                            <span class="panel-title"></span>
                                            <ul class="nav nav-tabs pull-right justify-content-end" role="tablist">
                                                <li class="nav-item">
                                                    <a href="#gen_tab" data-toggle="tab" class="nav-link active" data-content="General Inbound Group Settings" rel="popover" data-placement="top" data-original-title="General Settings" data-trigger="hover"><i class="fa fa-info pr5"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#1_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">1</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#2_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">2</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#3_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">3</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#4_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">4</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#5_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">5</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#6_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">6</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#7_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">7</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#8_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">8</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#9_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">9</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="##_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">#</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#*_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">*</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#Timeout_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">Timeout</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#Timecheck_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Inbound Group Drop Settings" data-trigger="hover"><span style="font: normal normal normal 14px/1 FontAwesome;">Timecheck</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="tab-content">
                                                        <div id="gen_tab" class="tab-pane active">
                                                            <div class="panel pn">
                                                                <div class="panel-heading"> 
                                                                    <span class="panel-title"> <i class="fa fa-info"></i> General Settings</span>
                                                                </div>
                                                                <form id="all_inbound_group_settings" method="post">
                                                                    <input type="submit" name="" value="" style="display:none;" id="all_inbound_group_settings_submit"/>
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label for="group_id">IVR ID</label>
                                                                            <input id="group_id" name="menu_id" type="text" class="form-control" value="<?php echo $CallMenuData['menu_id']; ?>" readonly="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="group_name">IVR Name</label>
                                                                            <input id="group_name" name="menu_name" type="text" class="form-control" value="<?php echo $CallMenuData['menu_name']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="next_agent_call">IVR Prompt Filename</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control" name="menu_prompt" id="menu_prompt">
                                                                                    <option value="">Select File</option>
                                                                                    <?php
                                                                                    if ($handle = opendir('/srv/www/htdocs/' . $SS_SoundsWebDirectory . '/')) {

                                                                                        while (false !== ($entry = readdir($handle))) {

                                                                                            if ($entry != "." && $entry != "..") {
                                                                                                $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                <option value="<?php echo $fileName; ?>" <?php echo (!empty($CallMenuData['menu_prompt']) && $CallMenuData['menu_prompt'] == $fileName) ? 'selected="selected"' : ''; ?>>
                                                                                                <?php echo $fileName; ?>
                                                                                                </option>
                                                                                                    <?php
                                                                                                }
                                                                                            }

                                                                                            closedir($handle);
                                                                                        }
                                                                                        ?>            
                                                                                </select>
                                                                                <div class="input-group-addon text-success">
                                                                                    <a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload"></i></a>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="queue_priority">IVR Timeout</label>
                                                                            <div>
                                                                                <input type="number" value="<?php echo $CallMenuData['menu_timeout']; ?>" name="menu_timeout" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="group_color">IVR Timeout Prompt Filename</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control" name="menu_timeout_prompt" id="menu_timeout_prompt" >
                                                                                    <option value="">Select File</option>
    <?php
    if ($handle = opendir('/srv/www/htdocs/' . $SS_SoundsWebDirectory . '/')) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {
                $fileName = substr($entry, 0, strrpos($entry, "."));
                ?>
                                                                                                <option value="<?php echo $fileName; ?>" <?php echo (!empty($CallMenuData['menu_timeout_prompt']) && $CallMenuData['menu_timeout_prompt'] == $fileName) ? 'selected="selected"' : ''; ?>>
                                                                                                <?php echo $fileName; ?>
                                                                                                </option>
                                                                                                <?php
                                                                                            }
                                                                                        }

                                                                                        closedir($handle);
                                                                                    }
                                                                                    ?> 
                                                                                </select>

                                                                                <div class="input-group-addon text-success">
                                                                                    <a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload"></i></a>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="web_form_address">IVR Invalid Selection Prompt Filename</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control" name="menu_invalid_prompt" id="menu_invalid_prompt">
                                                                                    <option value="">Select File</option>
    <?php
    if ($handle = opendir('/srv/www/htdocs/' . $SS_SoundsWebDirectory . '/')) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {
                $fileName = substr($entry, 0, strrpos($entry, "."));
                ?>
                                                                                                <option value="<?php echo $fileName; ?>" <?php echo (!empty($CallMenuData['menu_invalid_prompt']) && $CallMenuData['menu_invalid_prompt'] == $fileName) ? 'selected="selected"' : ''; ?>>
                                                                                                <?php echo $fileName; ?>
                                                                                                </option>
                                                                                                <?php
                                                                                            }
                                                                                        }

                                                                                        closedir($handle);
                                                                                    }
                                                                                    ?> 
                                                                                </select>

                                                                                <div class="input-group-addon text-success">
                                                                                    <a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload"></i></a>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="web_form_address">IVR Menu Repeat</label>
                                                                            <div>
                                                                                <input id="menu_repeat" name="menu_repeat" type="text" class="form-control" value="<?php echo $CallMenuData['menu_repeat']; ?>" placeholder=""/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="web_form_address">IVR Time Check</label>
                                                                            <div>
                                                                                <button type="button" class="btn btn-toggle <?php echo ($CallMenuData['menu_time_check'] == 1) ? 'active' : ''; ?> IVR-Time-Check" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                                    <div class="handle"></div>
                                                                                </button>
                                                                                <input type="hidden" name="menu_time_check" value="<?php echo $CallMenuData['menu_time_check']; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="web_form_address">Group Call Times</label>
                                                                            <div>
    <?php
    if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
        $CallTimesData = $database->select('vicidial_call_times', ['call_time_id', 'call_time_name'], ['ORDER' => ['call_time_id' => 'ASC']]);
    } else {
        $CallTimesData = $database->select('vicidial_call_times', ['call_time_id', 'call_time_name'], ['user_group' => $_SESSION['CurrentLogin']['user_group'], 'ORDER' => ['call_time_id' => 'ASC']]);
    }
    ?>
                                                                                <select class="form-control" name="call_time_id">
                                                                                <?php foreach ($CallTimesData as $callTime) { ?>
                                                                                        <option value="<?php echo $callTime['call_time_id']; ?>" <?php echo (!empty($CallMenuData['call_time_id']) && $CallMenuData['call_time_id'] == $callTime['call_time_id']) ? 'selected="selected"' : ''; ?>>
                                                                                    <?php echo $callTime['call_time_id'] . ' - ' . $callTime['call_time_name']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </form>   
                                                            </div>
                                                        </div>
    <?php
    $array = [1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, '*' => 'STAR', '#' => 'HASH', 'Timeout' => 'TIMEOUT', 'Timecheck' => 'TIMECHECK'];
    foreach ($array as $k => $v) {
        $key = array_search($v, array_column($CallMenuDataOptions, 'option_value'));
        $dataCheck = $CallMenuDataOptions[$key];
        ?>
                                                            <div id="<?php echo $k; ?>_tab" class="tab-pane">
                                                                <div class="panel pn">
                                                                    <div class="panel-heading"> 
                                                                        <span class="panel-title"> <i class="fa fa-info"></i> General Settings - <?php echo $k; ?></span>
                                                                    </div>
                                                                    <form method="post" class="menu_option_form">
                                                                        <div class="panel-body" id="<?php echo $k; ?>">
                                                                            <input type="submit" name="" value="" style="display:none;" class="MenuOptionFormSubmit_<?php echo $k; ?>"/>
                                                                            <input type="hidden" name="menu_id" value="<?php echo $CallMenuData['menu_id']; ?>"/>
                                                                            <input type="hidden" name="option_value" value="<?php echo $v; ?>"/>
                                                                            <div class="form-group">
                                                                                <label for="group_id">Description</label>
                                                                                <input id="" name="option_description" type="text" class="form-control" value="<?php echo @$dataCheck['option_description']; ?>"/>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="web_form_address">Action</label>
                                                                                <select class="form-control InboundIVR-Menu" name="option_route">
                                                                                    <option value="">----Select Option---</option>
                                                                                    <option value="CALLMENU" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'CALLMENU') ? 'SELECTED="SELECTED"' : ''; ?>>IVR</option>
                                                                                    <option value="INGROUP" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'INGROUP') ? 'SELECTED="SELECTED"' : ''; ?>>Inbound Group</option>
                                                                                    <option value="DID" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'DID') ? 'SELECTED="SELECTED"' : ''; ?>>Inbound Number</option>
                                                                                    <option value="HANGUP" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'HANGUP') ? 'SELECTED="SELECTED"' : ''; ?>>Hangup</option>
                                                                                    <option value="PHONE" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'PHONE') ? 'SELECTED="SELECTED"' : ''; ?>>Phone</option>
                                                                                    <option value="VOICEMAIL" <?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'VOICEMAIL') ? 'SELECTED="SELECTED"' : ''; ?>>Voicemail</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group CALLMENU InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'CALLMENU') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Call Menu</label>
                                                                                <select class="form-control" name="CALLMENU_value">
                                                                                    <option value="">Select Option</option>
        <?php foreach ($CallMenuListings as $CMListings) { ?>
                                                                                        <option value="<?php echo $CMListings['menu_id']; ?>" <?php echo (!empty($dataCheck['option_route_value']) && $dataCheck['option_route_value'] == $CMListings['menu_id']) ? 'SELECTED="SELECTED"' : ''; ?>>
            <?php echo $CMListings['menu_id'] . ' - ' . $CMListings['menu_name']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group INGROUP InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'INGROUP') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Inbound Group</label>
                                                                                <select class="form-control" name="INGROUP_value">
                                                                                    <option value="">Select Option</option>
        <?php foreach ($InboundGroupListings as $IGListings) { ?>
                                                                                        <option value="<?php echo $IGListings['group_id']; ?>" <?php echo (!empty($dataCheck['option_route_value']) && $dataCheck['option_route_value'] == $IGListings['group_id']) ? 'SELECTED="SELECTED"' : ''; ?>>
            <?php echo $IGListings['group_id'] . ' - ' . $IGListings['group_name']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group DID InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'DID') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Inbound Number</label>
                                                                                <select class="form-control" name="DID_value">
                                                                                    <option value="">Select Option</option>
        <?php foreach ($InboundDIDListings as $IDListings) { ?>
                                                                                        <option value="<?php echo $IDListings['did_pattern']; ?>" <?php echo (!empty($dataCheck['option_route_value']) && $dataCheck['option_route_value'] == $IDListings['did_pattern']) ? 'SELECTED="SELECTED"' : ''; ?>>
            <?php echo $IDListings['did_pattern'] . ' - ' . $IDListings['did_description']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group PHONE InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'PHONE') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Phone</label>
                                                                                <select class="form-control" name="PHONE_value">
                                                                                    <option value="">Select Option</option>
        <?php foreach ($Phone as $PhoneListings) { ?>
                                                                                        <option value="<?php echo $PhoneListings['dialplan_number']; ?>" <?php echo (!empty($dataCheck['option_route_value']) && $dataCheck['option_route_value'] == $PhoneListings['dialplan_number']) ? 'SELECTED="SELECTED"' : ''; ?>>
            <?php echo $PhoneListings['extension'] . ' - ' . $PhoneListings['dialplan_number']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group VOICEMAIL InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'VOICEMAIL') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Voice Mail</label>
                                                                                <select class="form-control" name="VOICEMAIL">
                                                                                    <option value="" >Select Option</option>
        <?php foreach ($Phone as $PhoneListings) { ?>
                                                                                        <option value="<?php echo $PhoneListings['dialplan_number']; ?>" <?php echo (!empty($dataCheck['option_route_value']) && $dataCheck['option_route_value'] == $PhoneListings['dialplan_number']) ? 'SELECTED="SELECTED"' : ''; ?>>
            <?php echo $PhoneListings['dialplan_number'] . ' - ' . $PhoneListings['fullname']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>

                                                                                    <?php
                                                                                    if (!empty($dataCheck['option_route_value_context']) && $dataCheck['option_route'] == 'INGROUP') {
                                                                                        $LeadData = explode(',', $dataCheck['option_route_value_context']);
                                                                                    }
                                                                                    ?>

                                                                            <div class="form-group INGROUP-Part InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'INGROUP') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Lead Lookup Method</label>
                                                                                <select class="form-control" name="INGROUP_Lead">
                                                                                    <option value="CID" <?php echo (!empty($LeadData[0]) && $LeadData[0] == 'CID') ? 'selected="selected"' : ''; ?>>Create New Lead</option>
                                                                                    <option value="CIDLOOKUP" <?php echo (!empty($LeadData[0]) && $LeadData[0] == 'CIDLOOKUP') ? 'selected="selected"' : ''; ?>>Lookup Lead In System</option>
                                                                                    <option value="CIDLOOKUPRL" <?php echo (!empty($LeadData[0]) && $LeadData[0] == 'CIDLOOKUPRL') ? 'selected="selected"' : ''; ?>>Lookup Lead In List</option>
                                                                                    <option value="CIDLOOKUPRC" <?php echo (!empty($LeadData[0]) && $LeadData[0] == 'CIDLOOKUPRC') ? 'selected="selected"' : ''; ?>>Lookup Lead In Campaign</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group INGROUP-Part InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'INGROUP') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Lead Lookup List</label>
                                                                                <input type="text" name="INGROUP_Lead_list" class="form-control" value="<?php echo @$LeadData[2]; ?>"/>
                                                                            </div>
                                                                            <div class="form-group INGROUP-Part InboundIVR-Menu-Hide" style="display:<?php echo (!empty($dataCheck['option_route']) && $dataCheck['option_route'] == 'INGROUP') ? 'block' : 'none'; ?>;">
                                                                                <label for="web_form_address">Lead Lookup Campaign</label>

                                                                                <select class="form-control" name="INGROUP_Lead_campaign">
                                                                                    <option value="">Select Option</option>
        <?php
        foreach ($CampaignList as $listCampaign) {
            ?>
                                                                                        <option value="<?php echo $listCampaign['campaign_id']; ?>" <?php echo (!empty($LeadData[3]) && $LeadData[3] == $listCampaign['campaign_id']) ? 'selected="selected"' : ''; ?>>
                                                                                        <?php echo $listCampaign['campaign_id'] . ' - ' . $listCampaign['campaign_name']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-toggle <?php echo ($dataCheck['status'] == "Y") ? 'active' : ''; ?> StatusCallMenuOption" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                                    <div class="handle"></div>
                                                                                </button>
                                                                                <input type="hidden" name="status" value="<?php echo $dataCheck['status']; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END CONTENT -->

                </div></div>
        </section>
    </div>

    <!--Call Disposition START-->
    <div class="modal center-modal fade" id="Audio-Modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" name="" action="" autocomplete="OFF" id="FormuploadMusic" enctype="multipart/form-data">
                    <div class="box ">
                        <div class="box-header with-border bg-success">
                            <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-headphones"></i></a> Audio File Upload</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="CampaignName">Name of Audio(<span class="text-success">No Space Allowed</span>):</label>
                                <input type="text" class="form-control" id="audio_name" name="audio_name" placeholder="Enter Audio Name" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="fileMusic">Name of Audio:</label>
                                <input type="file" class="form-control" id="fileMusic" name="file" required=""/>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" id="" class="btn btn-success btn-sm pull-right">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Call Dispostion END-->
    <input type="hidden" name="" id="GroupFilterID" value="<?php echo $_GET['group_id']; ?>"/>
    <script>
        $(document).ready(function () {
            $('.menu_option_form').on('change paste', 'input, select, textarea', function () {
                var ParentID = $(this).parent().parent().attr('id');
                $('.MenuOptionFormSubmit_' + ParentID).click();
            });
        });

        $('.StatusCallMenuOption').click(function () {
            if (!$(this).hasClass('active')) {
                $(this).parent().find('input').val('Y');
            } else {
                $(this).parent().find('input').val('N');
            }
            var ParentID = $(this).parent().parent().attr('id');
            $('.MenuOptionFormSubmit_' + ParentID).click();
        });

        $(document).ready(function () {
            $('#all_inbound_group_settings').on('change paste', 'input, select, textarea', function () {
                $('#all_inbound_group_settings_submit').click();
            });
        });

        $(document).on('submit', '#all_inbound_group_settings', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $(this)[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('ivr/ajax') ?>?action=SaveIVR',
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                success: function (data) {
                    var Result = JSON.parse(data);
                    $.toast({
                        heading: 'Inbound IVR Setting',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });

        });


        $('.IVR-Time-Check').click(function () {
            if (!$(this).hasClass('active')) {
                $(this).parent().find('input').val(1);
            } else {
                $(this).parent().find('input').val(0);
            }
            $('#all_inbound_group_settings_submit').click();
        });

        $('.FileUpload').click(function () {
            $('#Audio-Modal').modal('show');
        });

        $(document).on('submit', '#FormuploadMusic', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $('#FormuploadMusic')[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('groups/ajax') ?>?action=AudioUpload',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    var Result = JSON.parse(data);
                    $.toast({
                        heading: 'Inbound IVR Settings',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#Audio-Modal').modal('hide');
                    $('#menu_invalid_prompt,#menu_prompt,#menu_timeout_prompt').append("<option value='" + Result.data + "'>" + Result.data + "</option>");

                }
            });

        });

        $(document).on('submit', '.menu_option_form', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $(this)[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('ivr/ajax') ?>?action=SaveIVROption',
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                success: function (data) {
    //                    console.log(data);
                    var Result = JSON.parse(data);
                    $.toast({
                        heading: 'Inbound IVR Setting',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });

        });

        $('[rel="popover"]').popover();


        $('.InboundIVR-Menu').change(function () {
            $(this).parent().parent().parent().find('.InboundIVR-Menu-Hide').hide();
            var value = $(this).val();
            $(this).parent().parent().parent().find('.' + value).show();
            if (value == 'INGROUP') {
                $(this).parent().parent().parent().find('.INGROUP-Part').show();
            } else {
                $(this).parent().parent().parent().find('.INGROUP-Part').hide();
            }
        });

    </script>
<?php } ?>
