<?php if(!checkRole('inbound_groups', 'edit')){ no_permission(); } else {?>
<?php
$GroupData = $database->get('vicidial_inbound_groups','*',['group_id'=>$_GET['group_id']]);

$OnlineAgent = $database->count('vicidial_live_agents',['closer_campaigns[~]'=>$_GET['group_id']]);
$totalCall = $database->count('vicidial_closer_log',['AND'=>['campaign_id'=>$_GET['group_id'],'call_date[>=]'=>date('Y-m-d').' 00:00:00','call_date[<=]'=>date('Y-m-d').' 23:59:59']]);
$totalCallDrop = $database->count('vicidial_closer_log',['AND'=>['campaign_id'=>$_GET['group_id'],'call_date[>=]'=>date('Y-m-d').' 00:00:00','call_date[<=]'=>date('Y-m-d').' 23:59:59'],'status'=>'DROP']);
$totalCallOutOfHours = $database->count('vicidial_closer_log',['AND'=>['campaign_id'=>$_GET['group_id'],'call_date[>=]'=>date('Y-m-d').' 00:00:00','call_date[<=]'=>date('Y-m-d').' 23:59:59'],'status'=>'AFTHRS']);

if(!empty($_SESSSION['CurrentLogin']['user_group']) && $_SESSSION['CurrentLogin']['user_group'] != 'ADMIN'){
    

$VicidialInboundGroupAgents = $database->select('vicidial_inbound_group_agents',['user'],['group_id'=>$_GET['group_id']]);
if(!empty($VicidialInboundGroupAgents) && count($VicidialInboundGroupAgents)){
    $UserKey = array_column($VicidialInboundGroupAgents,'user');
    $InboundGroupUser = $database->select('vicidial_users',['user'],['AND'=>['user_group'=>$GroupData['user_group'],'user[!=]'=>$UserKey]]);
}else{
    $InboundGroupUser = $database->select('vicidial_users',['user'],['AND'=>['user_group'=>$GroupData['user_group']]]);
}

if(!empty($InboundGroupUser) && count($InboundGroupUser) > 0){
$GroupID = $_GET['group_id'];
$GroupRank = 0;
$GroupWeight = 0;
$CallsToday = 0;
$GroupWebVars = '';
$GroupGrade = 1;
$GroupType = 'C';

$InboundGroupUser = array_map(function($arr) use ($GroupID,$GroupRank,$GroupWeight,$CallsToday,$GroupWebVars,$GroupGrade,$GroupType){
    return $arr + ['group_id' => $GroupID,'group_rank'=>$GroupRank,'group_weight'=>$GroupWeight,'calls_today'=>$CallsToday,'group_web_vars'=>$GroupWebVars,'group_grade'=>$GroupGrade,'group_type'=>$GroupType];
}, $InboundGroupUser);
$database->insert('vicidial_inbound_group_agents',$InboundGroupUser);
}
//}
}

?>

<style>
                        .slidecontainer {
                            width: 100%;
                        }

                        .slider {
                            -webkit-appearance: none;
                            width: 100%;
                            height: 10px;
                            border-radius: 5px;
                            background: #d3d3d3;
                            outline: none;
                            opacity: 0.7;
                            -webkit-transition: .2s;
                            transition: opacity .2s;
                        }

                        .slider:hover {
                            opacity: 1;
                        }

                        .slider::-webkit-slider-thumb {
                            -webkit-appearance: none;
                            appearance: none;
                            width: 25px;
                            height: 25px;
                            border-radius: 50%;
                            background: #50b79b;
                            cursor: pointer;
                        }

                        .slider::-moz-range-thumb {
                            width: 25px;
                            height: 25px;
                            border-radius: 50%;
                            background: #50b79b;
                            cursor: pointer;
                        }
                    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class ="row">

            <div class="col-xl-3 col-md-6 col-6">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <h3 class="text-grey"><?php echo (!empty($OnlineAgent) && $OnlineAgent) ? $OnlineAgent : 0; ?></h3>

                        <p>Agent Logged In</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users text-grey"></i>
                    </div>
         <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-6">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <h3 class="text-orange"><?php echo (!empty($totalCallDrop) && $totalCallDrop) ? $totalCallDrop : 0; ?></h3>

                        <p>Dropped Call</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-circle-down text-orange"></i>
                    </div>
                    <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-6">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <h3 class="text-green"><?php echo (!empty($totalCall) && $totalCall) ? $totalCall : 0; ?></h3>

                        <p>Total Calls</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-phone text-green"></i>
                    </div>
                    <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-6">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <h3 class="text-blue"><?php echo $totalCallOutOfHours;?></h3>

                        <p>Out Of Hours</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-clock-o text-blue"></i>
                    </div>
                    <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"> <span class="panel-title"><i class="fa fa-book"></i> Inbound Group: <?php echo $GroupData['group_id'] . ' - ' . $GroupData['group_name']; ?></span>
                        <ul class="nav nav-tabs justify-content-end pull-right">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#tab1" role="tab" aria-selected="true" data-content="Inbound Group Dashboard" rel="popover" data-placement="top" data-original-title="Dashboard" data-trigger="hover"><i class="fa fa-dashboard"></i></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-selected="true" data-content="Inbound Group Setting" rel="popover" data-placement="top" data-original-title="Setting" data-trigger="hover"><i class="fa fa-gears"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body pn">
                        <div class="tab-content border-none pn">
                            <div id="tab1" class="tab-pane active p15">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="text-uppercase mbn" > Inbound Route </h4>
                                        <!--<h6 class="mb15"> Visual overflow for 02SIMBRAND. </h6>-->
                                        <span id="today_sales_table">
                                            <?php 
                                            $DIDdata = $database->select('vicidial_inbound_dids',['did_pattern'],['group_id'=>$GroupData['group_id']]);
                                            if(!empty($DIDdata) && count($DIDdata)){
                                                $NumberAssigned = '';
                                                foreach($DIDdata as $dataList){
                                                    $NumberAssigned .= $dataList['did_pattern'].', ';
                                                }
                                            }else{
                                                $NumberAssigned = 'No Inbound Number Assigned';
                                            }
                                            ?>
                                            <div class="alert alert-success col-lg-12" role="alert"><center>Inbound Number: <?php echo $NumberAssigned;?></center></div>
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
                            <div id="tab2" class="tab-pane p15 form-horizontal">

                                <div class="panel">
                                    <div class="panel-heading">
                                    <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                        <li class="nav-item"><a href="#gen_tab" data-toggle="tab" class="nav-link active show" data-content="General Inbound Group Settings" rel="popover" data-placement="top" data-original-title="General Settings" data-trigger="hover"><i class="fa fa-info pr5"></i></a></li>
                                        <li class="nav-item"><a href="#queue_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Drop Settings" rel="popover" data-placement="top" data-original-title="Drop Settings" data-trigger="hover"><i class="fa fa-arrow-down pr5"></i></a></li>
                                        <li class="nav-item"><a href="#time_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Time Settings" rel="popover" data-placement="top" data-original-title="Time Settings" data-trigger="hover"><i class="fa fa-clock-o pr5"></i></a></li>
                                        <li class="nav-item"><a href="#noagent_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group No Agent Settings" rel="popover" data-placement="top" data-original-title="No Agent Settings" data-trigger="hover"><i class="fa fa-user-times pr5"></i></a></li>
                                        <li class="nav-item"><a href="#audio_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group No Audio Settings" rel="popover" data-placement="top" data-original-title="Audio Settings" data-trigger="hover"><i class="fa fa-volume-up pr5"></i></a></li>
                                        <li class="nav-item"><a href="#rank_tab" data-toggle="tab" class="nav-link" data-content="Inbound Group Ranking" rel="popover" data-placement="top" data-original-title="Rank Setting" data-trigger="hover"><i class="fa fa-long-arrow-down pr5"></i></a></li>
                                    </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                    <form id="all_inbound_group_settings">
                                        <div class="tab-content">
                                            <div id="gen_tab" class="tab-pane active" >
                                                <div class="panel pn">
                                                    <div class="panel-heading"> 
                                                        <span class="panel-title"> <i class="fa fa-info"></i> General Settings </span>
                                                    </div>
                                                    <div class="panel-body pn">
                                                        <div class="form-group">
                                                            <label for="group_id">Group ID</label>
                                                            <input id="group_id" name="group_id" type="text" class="form-control" value="<?php echo $GroupData['group_id']; ?>" readonly="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="group_name">Group Name</label>
                                                            <input id="group_name" name="group_name" type="text" class="form-control" value="<?php echo $GroupData['group_name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="next_agent_call">Group Next Call Agent</label>
                                                            <select id="next_agent_call" name="next_agent_call" class="form-control">
                                                                <option value="">NONE</option>
                                                                <option value="random" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'Random') ? 'selected="selected"' : ''; ?>>Random</option>
                                                                <option value="fewest_calls" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'fewest_calls') ? 'selected="selected"' : ''; ?>>Fewest Calls</option>
                                                                <option value="fewest_calls_campaign" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'fewest_calls_campaign') ? 'selected="selected"' : ''; ?>>Fewest Calls Campaign</option>
                                                                <option value="longest_wait_time" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'longest_wait_time') ? 'selected="selected"' : ''; ?>>Longest Wait Time</option>
                                                                <option value="highest_converting" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'highest_converting') ? 'selected="selected"' : ''; ?>>Highest Converting</option>
                                                                <option value="lowest_converting" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'lowest_converting') ? 'selected="selected"' : ''; ?>>Lowest Converting</option>
                                                                <option value="inbound_group_rank" <?php echo (!empty($GroupData['next_agent_call']) && $GroupData['next_agent_call'] == 'inbound_group_rank') ? 'selected="selected"' : ''; ?>>Agent Rank</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="queue_priority">Group Priority</label>
                                                            
                                                            <div class="slidecontainer">
                                                                <input type="range" min="0" max="50" value="<?php echo $GroupData['queue_priority']; ?>" name="queue_priority" id="queue_priority"  class="slider">
                                                            </div>
                                                            <div class="text-center p-15">
                                                            <span class="badge badge-lg badge-success" id="queue_priority_tag" style="font-weight:bold;"><?php echo $GroupData['queue_priority']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="group_color">Group Colour</label>
                                                            <input id="group_color" name="group_color" type="color" class="form-control" value="<?php echo $GroupData['group_color']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="web_form_address">Group Webform</label>
                                                            <div>
                                                                <input id="web_form_address" name="web_form_address" type="text" class="form-control" value="<?php echo $GroupData['web_form_address']; ?>" placeholder="Webform URL">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <?php
                                                            if(!empty($_SESSION['CurrentLogin']['userf_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['ORDER'=>['campaign_id'=>'ASC']]);
                                                            }else{
                                                                $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['ORDER'=>['campaign_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                            }
                                                            
                                                            ?>
                                                            <label for="ingroup_script">Group Script</label>
                                                            <select id="ingroup_script" name="ingroup_script" class="form-control">
                                                                <option value="">NONE</option>
                                                                <?php foreach($CampaignListings as $CListings){?>
                                                                <option value="<?php echo $CListings['campaign_id'];?>"><?php echo $CListings['campaign_id'].' - '.$CListings['campaign_name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="ingroup_recording_override" class="col-lg-5 col-sm-5 col-form-label">Record Calls To This Group</label>
                                                            <div class="col-sm-7">
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo (!empty($GroupData['ingroup_recording_override']) && $GroupData['ingroup_recording_override'] == 'ALLFORCE') ? 'active' : ''; ?>" data-name="ingroup_recording_override" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                    <div class="handle"></div>
                                                                </button>
                                                                <input type="hidden" name="ingroup_recording_override" value="<?php echo $GroupData['ingroup_recording_override']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="ignore_list_script_override" class="col-lg-5 col-sm-5 col-form-label">Ignore List Script</label>
                                                            <div class="col-sm-7">
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo (!empty($GroupData['ignore_list_script_override']) && $GroupData['ignore_list_script_override'] == 'Y') ? 'active' : ''; ?>" data-name="ignore_list_script_override" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                    <div class="handle"></div>
                                                                </button>
                                                                <input type="hidden" name="ignore_list_script_override" value="<?php echo $GroupData['ignore_list_script_override']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="active" class="col-lg-5 col-sm-5 col-form-label">Active</label>
                                                            <div class="col-sm-7">
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo (!empty($GroupData['active']) && $GroupData['active'] == 'Y') ? 'active' : ''; ?>" data-name="active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                    <div class="handle"></div>
                                                                </button>
                                                                <input type="hidden" name="active" value="<?php echo $GroupData['active']; ?>">
                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                            
                                            <div id="queue_tab" class="tab-pane">
                                                <div class="panel pn">
                                                    <div class="panel-heading"> 
                                                        <span class="panel-title"> <i class="fa fa-arrow-down"></i> Inbound Group Drop Settings</span>
                                                    </div>
                                                    <div class="panel-body pn">
                                                        <div class="form-group">
                                                            <label for="drop_call_seconds">Drop Call Seconds</label>
                                                            <input id="drop_call_seconds" name="drop_call_seconds" type="number" min="0" max="9999" class="form-control" value="<?php echo $GroupData['drop_call_seconds']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="drop_action">Drop Action</label>
                                                            <select id="drop_action" name="drop_action" class="form-control">
                                                                <option value="">NONE</option>
                                                                <option value="HANGUP" <?php echo ($GroupData['drop_action'] == 'HANGUP') ? 'selected="selected"' : ''; ?>>Hangup</option>
                                                                <option value="VOICEMAIL" <?php echo ($GroupData['drop_action'] == 'VOICEMAIL') ? 'selected="selected"' : ''; ?>>Voicemail</option>
                                                                <option value="IN_GROUP" <?php echo ($GroupData['drop_action'] == 'IN_GROUP') ? 'selected="selected"' : ''; ?>>Inbound Group</option>
                                                                <option value="CALLMENU" <?php echo ($GroupData['drop_action'] == 'CALLMENU') ? 'selected="selected"' : ''; ?>>IVR</option>
                                                                <option value="MESSAGE" <?php echo ($GroupData['drop_action'] == 'MESSAGE') ? 'selected="selected"' : ''; ?>>Extension</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="drop_exten">Drop Extension</label>
                                                            <input id="drop_exten" name="drop_exten" type="text" class="form-control" value="<?php echo $GroupData['drop_exten']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="voicemail_ext">Drop Voicemail</label>
                                                            <select id="voicemail_ext" name="voicemail_ext" class="form-control">
                                                                <option value="">NONE</option>
                                                                <?php 
                                                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                    $VoiceMail = $database->select('vicidial_voicemail','*',['ORDER'=>['voicemail_id'=>'ASC']]);
                                                                }else{
                                                                    $VoiceMail = $database->select('vicidial_voicemail','*',['ORDER'=>['voicemail_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                                }
                                                                ?>
                                                                    <?php foreach($VoiceMail as $MailVoice){?>
                                                                        <option value="<?php echo $MailVoice['voicemail_id'];?>" <?php echo (!empty($GroupData['voicemail_ext']) && $GroupData['voicemail_ext'] == $MailVoice['voicemail_id']) ? 'selected="selected"' : '';?>><?php echo $MailVoice['voicemail_id'].' - '.$MailVoice['fullname'];?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>

                                                        <?php
                                                        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                            $VicidialInboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_id'=>'ASC']]);
                                                        }else{
                                                            $VicidialInboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['group_id'=>'ASC']]);
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="drop_inbound_group">Drop Inbound Group</label>
                                                            <select id="drop_inbound_group" name="drop_inbound_group" class="form-control">
                                                                <option value="">NONE</option>
                                                                <?php foreach($VicidialInboundGroups as $group){?>
                                                                <option value="<?php echo $group['group_id'];?>" <?php echo ($group['group_id'] == $GroupData['drop_inbound_group']) ? 'selected="selected"' : '';?>><?php echo $group['group_id'].' - '.$group['group_name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                        <?php
                                                        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                             $DropIVR = $database->select('vicidial_call_menu',['menu_id','menu_name','menu_prompt','menu_timeout'],['ORDER'=>['menu_id'=>'ASC']]);
                                                        }else{
                                                             $DropIVR = $database->select('vicidial_call_menu',['menu_id','menu_name','menu_prompt','menu_timeout'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['menu_id'=>'ASC']]);
                                                        }
                                                               
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="drop_callmenu">Drop IVR</label>
                                                            <select id="drop_callmenu" name="drop_callmenu" class="form-control">
                                                                <option value="">NONE</option>
                                                                <?php foreach($DropIVR as $ivr){?>
                                                                <option value="<?php echo $ivr['menu_id'];?>" <?php echo ($ivr['menu_id'] == $GroupData['drop_callmenu']) ? 'selected="selected"' : '';?>><?php echo $ivr['menu_id'].' - '.$ivr['menu_name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            
                                            <div id="time_tab" class="tab-pane">
                                                <div class="panel pn">
                                                    <div class="panel-heading"> 
							<span class="panel-title"> <i class="fa fa-list-ol"></i> Inbound Group Time Settings</span>
                                                    </div>
                                                    <div class="panel-body pn">
                                                        <div class="form-group">
                                                            <label for="call_time_id">Group Call Times</label>
                                                            <?php
                                                            if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                $GroupCallTimes = $database->select('vicidial_call_times',['call_time_id','call_time_name'],['ORDER'=>['call_time_id'=>'ASC']]);
                                                            }else{
                                                                $GroupCallTimes = $database->select('vicidial_call_times',['call_time_id','call_time_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['call_time_id'=>'ASC']]);
                                                            }
                                                            ?>
                                                            <select id="call_time_id" name="call_time_id" class="form-control">
                                                                <option value="">NONE</option>
                                                                 <?php
                                                                 foreach($GroupCallTimes as $CallTimes){?>
                                                                <option value="<?php echo $CallTimes['call_time_id'];?>" <?php echo ($CallTimes['call_time_id'] == $GroupData['call_time_id']) ? 'selected="selected"' : '';?>><?php echo $CallTimes['call_time_id'].' - '.$CallTimes['call_time_name'];?></option>
                                                                 <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="after_hours_action">After Hours Action</label>
                                                            <select id="after_hours_action" name="after_hours_action" class="form-control">
                                                                <option value="">NONE</option>
<!--                                                                <option value="MESSAGE">Play Message</option>
                                                                <option value="HANGUP">Hangup</option>
                                                                <option value="EXTENSION">Extension</option>
                                                                <option value="VOICEMAIL">Voicemail</option>
                                                                <option value="IN_GROUP">Inbound Group</option>
                                                                <option value="CALLMENU" selected="">IVR</option>-->
                                                                <option value="HANGUP" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'HANGUP') ? 'selected="selected"' : '';?>>HANGUP</option>
                                                                <option value="MESSAGE" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'MESSAGE') ? 'selected="selected"' : '';?>>MESSAGE</option>
                                                                <option value="EXTENSION" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'EXTENSION') ? 'selected="selected"' : '';?>>EXTENSION</option>
                                                                <option value="VOICEMAIL" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'VOICEMAIL') ? 'selected="selected"' : '';?>>VOICEMAIL</option>
                                                                <option value="VMAIL_NO_INST" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'VMAIL_NO_INST') ? 'selected="selected"' : '';?>>VMAIL_NO_INST</option>
                                                                <option value="IN_GROUP" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'IN_GROUP') ? 'selected="selected"' : '';?>>IN_GROUP</option>
                                                                <option value="CALLMENU" <?php echo (!empty($GroupData['after_hours_action']) && $GroupData['after_hours_action'] == 'CALLMENU') ? 'selected="selected"' : '';?>>CALLMENU</option>
                                                            </select>
                                                        </div>
                                                        <span id="inm_box"><div class="form-group">
                                                                <label for="after_hours_message_filename">After Hours Audio</label>
                                                                <div class="input-group">
                                                                    <select id="after_hours_message_filename" name="after_hours_message_filename" class="form-control">
                                                                         <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($GroupData['after_hours_message_filename'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                            }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select>
                                                                    <span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div>

                                                            </div>
                                                        </span>
                                                        <div class="form-group">
                                                            <label for="after_hours_exten">After Hours Extension</label>
                                                            <input id="after_hours_exten" name="after_hours_exten" type="text" class="form-control" value="<?php echo $GroupData['after_hours_exten'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="after_hours_voicemail">After Hours Voicemail</label>
                                                            <select id="after_hours_voicemail" name="after_hours_voicemail" class="form-control">
                                                                <option value="">NONE</option> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                             <?php
                                                                  if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){  
                                                                    $VicidialInboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_id'=>'ASC']]);
                                                                  }else{
                                                                    $VicidialInboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                                  }
                                                                ?>
                                                            <label for="afterhours_xfer_group">After Hours Inbound Group</label>
                                                            <select id="afterhours_xfer_group" name="afterhours_xfer_group" class="form-control">
                                                                <option value="">NONE</option>
                                                                 <?php foreach($VicidialInboundGroups as $group){?>
                                                                <option value="<?php echo $group['group_id'];?>" <?php echo ($group['group_id'] == $GroupData['afterhours_xfer_group']) ? 'selected="selected"' : '';?>><?php echo $group['group_id'].' - '.$group['group_name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="after_hours_callmenu">After Hours IVR</label>
                                                            <select id="after_hours_callmenu" name="after_hours_callmenu" class="form-control">
                                                                <option value="">NONE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            
                                            <div id="noagent_tab" class="tab-pane">
                                                <div class="panel pn">
                                                    <div class="panel-heading">
							<span class="panel-title"> <i class="fa fa-list-ol"></i> Inbound Group Agent Queue Settings</span>
                                                    </div>
                                                    <div class="panel-body pn">

                                                        <div class="form-group row">
                                                            <label for="no_agent_no_queue" class="col-lg-4 col-sm-4 col-form-label">No Agent No Queue</label>
                                                            <div class="col-sm-9">
                                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo ($GroupData['no_agent_no_queue'] == 'Y') ? 'active':'';?>" data-name="no_agent_no_queue" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                    <div class="handle"></div>
                                                                </button>
                                                                <input type="hidden" name="no_agent_no_queue" value="<?php echo $GroupData['no_agent_no_queue'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_agent_action">No Agent No Queue Action</label>
                                                            <select id="no_agent_action" name="no_agent_action" class="form-control">
                                                                <option value="">NONE</option>
                                                                <option value="CALLMENU" <?php echo ($GroupData['no_agent_action'] == 'CALLMENU') ? 'selected="selected"' : '';?>>CALLMENU</option>
                                                                <option value="INGROUP" <?php echo ($GroupData['no_agent_action'] == 'INGROUP') ? 'selected="selected"' : '';?>>INGROUP</option>
                                                                <option value="DID" <?php echo ($GroupData['no_agent_action'] == 'DID') ? 'selected="selected"' : '';?>>DID</option>
                                                                <option value="MESSAGE" <?php echo ($GroupData['no_agent_action'] == 'MESSAGE') ? 'selected="selected"' : '';?>>MESSAGE</option>
                                                                <option value="EXTENSION" <?php echo ($GroupData['no_agent_action'] == 'EXTENSION') ? 'selected="selected"' : '';?>>EXTENSION</option>
                                                                <option value="VOICEMAIL" <?php echo ($GroupData['no_agent_action'] == 'VOICEMAIL') ? 'selected="selected"' : '';?>>VOICEMAIL</option>
                                                                <option value="VMAIL_NO_INST" <?php echo ($GroupData['no_agent_action'] == 'VMAIL_NO_INST') ? 'selected="selected"' : '';?>>VMAIL_NO_INST</option>
                                                            </select>
                                                        </div>
                                                        <div id="value_placement">
                                                            <div class="form-group">
                                                                <label for="no_agent_action_value" id="no_agent_action_value_label">No Agent Audio Message</label>
                                                                <div class="input-group">
                                                                    <select id="no_agent_action_value" name="no_agent_action_value" class="form-control">
                                                                        <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                             $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($GroupData['no_agent_action_value'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                            }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select>
                                                                    <span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a New No Agent Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div></div>
                                                        </div>
                                                        <input id="hidden_ingroup_collation" value="1" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="audio_tab" class="tab-pane">
                                                <div class="panel pn">
                                                    <div class="panel-heading"> 
                                                        <span class="panel-title"> <i class="fa fa-list-ol"></i>Inbound Group Audio Settings</span>
                                                    </div>
                                                    <div class="panel-body pn">
                                                        <span id="wmes_box"><div class="form-group"><label for="welcome_message_filename" id="no_agent_action_value_label">Welcome Message</label><div class="input-group">

                                                                    <select id="welcome_message_filename" name="welcome_message_filename" class="form-control">
                                                                         <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            if(strpos($entry, '.wav') !== false){
                                                                                                                $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($GroupData['welcome_message_filename'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                        } }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                       </select>
                                                                    <span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div></div>
                                                        </span>
                                                        <div class="form-group">
                                                            <label for="play_welcome_message">Inbound Group MOH Prompt Message</label>
                                                            <select id="play_welcome_message" name="play_welcome_message" class="form-control">
                                                                <option value="">Select Option</option>
                                                                <option value="ALWAYS" <?php echo ($GroupData['play_welcome_message'] == 'ALWAYS') ? 'selected=selected' : '';?>>ALWAYS</option>
                                                                <option value="NEVER" <?php echo ($GroupData['play_welcome_message'] == 'NEVER') ? 'selected=selected' : '';?>>NEVER</option>
                                                                <option value="IF_WAIT_ONLY" <?php echo ($GroupData['play_welcome_message'] == 'IF_WAIT_ONLY') ? 'selected=selected' : '';?>>IF_WAIT_ONLY</option>
                                                                <option value="YES_UNLESS_NODELAY" <?php echo ($GroupData['play_welcome_message'] == 'YES_UNLESS_NODELAY') ? 'selected=selected' : '';?>>YES_UNLESS_NODELAY</option>
                                                            </select>
                                                        </div>
                                                        <?php
                                                        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                            $MOHMusic = $database->select('vicidial_music_on_hold',['moh_id']);
                                                        }else{
                                                            $MOHMusic = $database->select('vicidial_music_on_hold',['moh_id'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                        }
                                                        
                                                        ?>
                                                        <span id="hm_box">
                                                            <div class="form-group">
                                                                <label for="moh_context">Hold Music</label>
                                                                <div class="input-group">
                                                                    <select id="moh_context" name="moh_context" class="form-control">
                                                                        <option value="">No Hold Music</option>
                                                                        <?php foreach($MOHMusic as $MusicMOH){?>
                                                                        <option value="<?php echo $MusicMOH['moh_id'];?>" <?php echo ($GroupData['moh_context'] == $MusicMOH['moh_id']) ? 'selected="selected"' : '';?>><?php echo $MusicMOH['moh_id'];?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                    <span class="input-group-addon"><a href="#Audio-Modal-MOH" data-toggle="modal" title="Upload a Hold Prompt"><i class="fa fa-cloud-upload text-purple2"></i></a> </span>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span id="ohpf_box"><div class="form-group">
                                                                <label for="onhold_prompt_filename">Hold Prompt Message</label>
                                                                <div class="input-group">
                                                                    <select id="onhold_prompt_filename" name="onhold_prompt_filename" class="form-control">
                                                                        <option>None</option>
                                                                            <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            if(strpos($entry, '.wav') !== false){
                                                                                                                $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                            <option value="<?php echo $fileName;?>" <?php echo ($GroupData['onhold_prompt_filename'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                        } }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select><span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a Hold Prompt"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div></div>
                                                        </span>
                                                        <div class="form-group">
                                                            <label for="prompt_interval">Inbound Group MOH Prompt Interval</label>
                                                            <input id="prompt_interval" name="prompt_interval" type="number" min="0" max="99999" class="form-control" value="<?php echo $GroupData['prompt_interval'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="onhold_prompt_seconds">Inbound Group MOH Prompt Message Length</label>
                                                            <input id="onhold_prompt_seconds" name="onhold_prompt_seconds" type="number" min="0" max="99999" class="form-control" value="<?php echo $GroupData['onhold_prompt_seconds'];?>">
                                                        </div>
                                                        <span id="aaf_box"><div class="form-group">
                                                                <label for="agent_alert_exten">Inbound Group Agent Alert Filename</label>
                                                                <div class="input-group">
                                                                    <select id="agent_alert_exten" name="agent_alert_exten" class="form-control">
                                                                        <option>None</option>
                                                                     <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($GroupData['agent_alert_exten'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                            }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select><span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a Hold Prompt"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div></div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="rank_tab" class="tab-pane">
                                                <div class="panel pn">
                                                    <div class="panel-heading"> 
							<span class="panel-title"> <i class="fa fa-list-ol"></i> Inbound Group Agent Rank </span>
                                                    </div>
                                                    <div class="panel-body pn">
                                                        <?php
                                                          if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                    $UserListings = $database->select('vicidial_inbound_group_agents',['user','group_rank'],['ORDER'=>['user'=>'ASC'],'group_id'=>$_GET['group_id']]);
                                                                }else{
                                                                    $UserListings = $database->select('vicidial_inbound_group_agents',['user','group_rank'],['ORDER'=>['user'=>'ASC'],'group_id'=>$_GET['group_id']]);
                                                                }
                                                                
                                                                ?>
                                                        <table class="table table-bordered table-compact" style="text-align:center;" id="datatable-userrank">
                                                            <thead class="bg-success">
                                                                <tr>
                                                                    <th style="text-align: center;">Username</th>
                                                                    <th style="text-align: center;">Full Name</th>
                                                                    <th style="text-align: center;">User Group</th>
                                                                    <th style="text-align: center;">Rank</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                
                                                                
                                                                
                                                              
                                                                foreach($UserListings as $ListingUser){
                                                                    $UserDetail = $database->get('vicidial_users',['full_name','user_group'],['user'=>$ListingUser['user']]);
                                                                    ?>

                                                                <tr data-user="<?php echo $ListingUser['user'];?>">
                                                                    <td><?php echo $ListingUser['user'];?></td>
                                                                    <td><?php echo $UserDetail['full_name'];?></td>
                                                                    <td><?php echo $UserDetail['user_group'];?></td>
                                                                    <td>
                                                                        <select class="form-control RankUpdate" name="">
                                                                            <?php for($i=9;$i>=-9;$i--){?>
                                                                            <option value="<?php echo $i;?>" <?php echo ($ListingUser['group_rank'] == $i) ? 'selected="selected"': '';?>><?php echo $i;?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                                </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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


<div class="modal center-modal fade" id="Audio-Modal-MOH" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" name="" action="" autocomplete="OFF" id="FormuploadHoldMusic" enctype="multipart/form-data">
    <div class="box ">
        <div class="box-header with-border bg-success">
            <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-headphones"></i></a> Music On Hold File Upload</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="CampaignName">Music On Hold ID(<span class="text-success">No Space Allowed</span>):</label>
                <input type="text" class="form-control" id="audio_name" name="audio_name" placeholder="Enter Music Hold ID" required=""/>
            </div>

            <div class="form-group">
                <label for="fileMusic">Choose Audio:</label>
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
<input type="hidden" name="" id="GroupFilterID" value="<?php echo $_GET['group_id'];?>"/>
<script>
$(document).ready(function(){
    $('#all_inbound_group_settings').on('change paste', 'input, select, textarea', function(){
        var FieldName = $(this).attr('name');
        if(FieldName){

        var FieldValue = $(this).val();
        var FieldID = $('#GroupFilterID').val();
        if(FieldName == 'queue_priority'){
            $('#queue_priority_tag').html(FieldValue);
        }
        $.ajax({
           type: "POST",
           url: '<?php echo base_url('groups/ajax')?>?action=UpdateGroup',
           data: {FieldName:FieldName,FieldValue:FieldValue,FieldID:FieldID},
           success: function(data)
           {
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Inbound Group Setting',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    showHideTransition: 'plain',
                });
           }
         });
     }
    });

});

$(document).on('click', '.SwitchBTN', function(){
        if($(this).hasClass('active')){
            var valueNew = 'Y';
        }else{
            var valueNew = 'N';
        }
        var FieldName = $(this).data('name');
        var FieldValue = valueNew;
        var FieldID = $('#GroupFilterID').val();

        if(FieldName == "ingroup_recording_override"){
            if(valueNew == 'Y'){
                 var FieldValue = 'ALLFORCE';
            }else{
                 var FieldValue = 'DISABLED';
            }
        }
        $.ajax({
           type: "POST",
           url: '<?php echo base_url('groups/ajax')?>?action=UpdateGroup',
           data: {FieldName:FieldName,FieldValue:FieldValue,FieldID:FieldID},
           success: function(data)
           {
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Inbound Group Setting',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    showHideTransition: 'plain',
                });
           }
         });
    });

 $(document).on('change','.RankUpdate',function(){
    var FieldValue = $(this).val();
    var FieldID = $(this).parent().parent().data('user');
    var GroupID = $('#GroupFilterID').val();
     $.ajax({
           type: "POST",
           url: '<?php echo base_url('groups/ajax')?>?action=UpdateRank',
           data: {GroupID:GroupID,FieldValue:FieldValue,FieldID:FieldID},
           success: function(data)
           {
//               alert(data);
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Inbound Group Setting',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    showHideTransition: 'plain',
                });
           }
         });
 });




 $(document).on('submit','#FormuploadMusic', function(e) {
            e.preventDefault();
             var formData = $(this).serialize();
             var form = $('#FormuploadMusic')[0];

    var data = new FormData(form);
             $.ajax({
                type: "POST",
                url: '<?php echo base_url('groups/ajax')?>?action=AudioUpload',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function (data){
                    var Result = JSON.parse(data);
                    $.toast({
                        heading: 'Inbound Group Setting',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#Audio-Modal').modal('hide');
                     $('#after_hours_message_filename,#no_agent_action_value,#welcome_message_filename,#onhold_prompt_filename,#agent_alert_exten').append("<option value='"+Result.data+"'>"+Result.data+"</option>");
                    
                }
            });

        });
        
        
 $(document).on('submit','#FormuploadHoldMusic', function(e) {
            e.preventDefault();
             var formData = $(this).serialize();
             var form = $('#FormuploadHoldMusic')[0];

    var data = new FormData(form);
             $.ajax({
                type: "POST",
                url: '<?php echo base_url('groups/ajax')?>?action=HoldMusic',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function (data){
                    var Result = JSON.parse(data);
                    if(Result.success == 1){
                        $('#FormuploadHoldMusic')[0].reset();
                         $('#moh_context').append("<option value='"+Result.data[0]+"'>"+Result.data[0]+"</option>");
                         $('#after_hours_message_filename,#no_agent_action_value,#welcome_message_filename,#onhold_prompt_filename,#agent_alert_exten').append("<option value='"+Result.data[1]+"'>"+Result.data[1]+"</option>");
                        $.toast({
                            heading: 'Inbound Group Setting',
                            text: Result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    $('#Audio-Modal-MOH').modal('hide');
                    }else{
                        $.toast({
                            heading: 'Inbound Group Setting',
                            text: Result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                    
                }
            });

        });

</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tab"]').popover();
});
</script>
<?php } ?>
