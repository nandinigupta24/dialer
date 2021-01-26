<?php if (!checkRole('users', 'edit')) {
    no_permission();
} else { ?>
    <?php
    if (!empty($_GET['user']) && $_GET['user']) {
        $user = $_GET['user'];
        $Field = ['role_id','api_only_user','vdc_agent_api_access', 'view_reports', 'admin_interface_enable', 'allowed_teams_access', 'user_id', 'user', 'full_name', 'pass', 'active', 'user_level', 'phone_login', 'user_group', 'agent_choose_ingroups', 'scheduled_callbacks', 'agentcall_manual', 'closer_default_blended', 'agent_choose_blended', 'agentonly_callbacks', 'custom_one', 'vicidial_recording', 'closer_campaigns', 'auto_enable', 'api_token', 'api_ip_list', 'api_start_date', 'api_end_date'];

        $UserData = $database->get('vicidial_users', $Field, ['user_id' => $user]);

//    $InboundLog = $database->select('vicidial_closer_log','*',['AND'=>['call_date[>=]'=>date('Y-m-d').' 00:00:00','call_date[<=]'=>date('Y-m-d').' 23:59:59','user'=>$UserData['user']]]);
//    $OutboundLog = $database->select('vicidial_log','*',['AND'=>['call_date[>=]'=>date('Y-m-d').' 00:00:00','call_date[<=]'=>date('Y-m-d').' 23:59:59','user'=>$UserData['user']]]);
        $LogCall = $database->select('vicidial_agent_log', '*', ['AND' => ['event_time[>=]' => date('Y-m-d') . ' 00:00:00', 'event_time[<=]' => date('Y-m-d') . ' 23:59:59', 'user' => $UserData['user'], 'lead_id[!]' => NULL, 'status[!]' => NULL]]);
        if ($UserData['user_group'] == 'ADMIN') {
            $InboundGroups = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['active' => 'Y']);
        } else {
            $InboundGroups = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['AND' => ['user_group' => $UserData['user_group'], 'active' => 'Y']]);
        }

        $query = "Select Calls, Agent_Calls, Connects, ROUND(Connects/Agent_Calls*100,2) as ConnectRate, DMCs, ROUND(DMCs/Connects*100,2) as DMCRate,`Sales`,
 ROUND(`Sales`/DMCs*100,2) as ConversionRate,ROUND(((`Sales`/Agent_Calls)*100),2) as ConversionRateSale
 from
 (select
 sum(case when ol.status is not null then 1 else 0 end) as Calls,
 sum(case when ol.status is not null and ol.user != 'VDAD' then 1 else 0 end) as Agent_Calls,
 sum(case when ol.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when ol.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when ol.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as `Sales`
 from vicidial_agent_log ol
 where ol.event_time BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59' AND ol.user =" . $UserData['user'] . "
 ) a";

        $data = $database->query($query)->fetchAll();
        $data = $data ? $data[0] : false;
        if (empty($data)) {
            $data['ConnectRate'] = 0;
            $data['DMCRate'] = 0;
            $data['ConversionRate'] = 0;
            $data['ConversionRateSale'] = 0;
            $data['ConversionRateSale'] = 0;
            $data['Agent_Calls'] = 0;
            $data['Connects'] = 0;
            $data['DMCs'] = 0;
            $data['Sales'] = 0;
        }

        $PhoneData = $database->select('phones', ['extension']);
//   pr($_SESSION['CurrentLogin']);
//   exit;
        if ($_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
            $UserGroupData = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
            $AccessRole = $DBUTG->select('roles', '*', ['status' => 'active']);
        } else {
            $UserGroupData = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC'], 'user_group' => $_SESSION['CurrentLogin']['user_group']]);

            $AccessRole = $DBUTG->select('roles', '*', ['status' => 'active']);
        }
    }
//pr($UserData);
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!--    <section class="content-header">
            <h1>User</h1>
            <small></small>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('users') ?>">User</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>

        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <span class="panel-title"> <i class="fa fa-user"></i>User : <?php echo $UserData['full_name']; ?> - <?php echo $UserData['user']; ?></span>
                                <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active " data-toggle="tab" href="#dashboard" role="tab"><i class="fa fa-dashboard"></i></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#gears" role="tab"><i class="fa fa-gears"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="tab-content border-none pn">
                                <div id="dashboard" class="tab-pane p15 active">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="text-uppercase mbn"> Today's Activity</h4>
                                            <h6 class="mb15"> Summary of activity made today. </h6>
                                            <div class="table-responsive mr-10">
                                                <table class="table table-bordered table-striped" id="activity-today">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th>Lead</th>
                                                            <th>Campaign</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
    <?php foreach ($LogCall as $log) { ?>
                                                            <tr>
                                                                <td><?php echo $log['lead_id']; ?></td>
                                                                <td><?php echo $log['campaign_id']; ?></td>
                                                                <td><?php echo $log['event_time']; ?></td>
                                                                <td><span class="badge badge-info badge-lg"><?php echo $log['status']; ?></span></td>
                                                                <td><a href="<?php echo base_url('users/leads') ?>?lead_id=<?php echo $log['lead_id']; ?>" class="btn btn-success btn-app"><i class="fa fa-arrow-right"></i></a></td>
                                                            </tr>
    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 visible-lg pl5">
                                            <h4 class="text-uppercase mbn"> Today's Statistics </h4>
                                            <h6 class="mb15"> Summary of <?php echo $UserData['full_name']; ?>'s performance.</h6>
                                            <div class="small mb5"> Connect Rate <small id="cr_text">(<?php echo $data['ConnectRate']; ?>%)</small></div>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-green bg-green" role="progressbar" aria-valuenow="<?php echo $data['ConnectRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['ConnectRate']; ?>%;"></div>
                                            </div>
                                            <div class="small mb5"> DMC Rate <small id="dmc_text">(<?php echo $data['DMCRate']; ?>%)</small></div>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-orange bg-orange" id="dmc_div" role="progressbar" aria-valuenow="<?php echo $data['DMCRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['DMCRate']; ?>%;"></div>
                                            </div>
                                            <div class="small mb5"> Positive Outcomes<small id="sc1_text">(<?php echo $data['Sales']; ?>%)</small></div>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-teal bg-success" id="sc1_text" role="progressbar" aria-valuenow="<?php echo $data['Sales']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['Sales']; ?>%"></div>
                                            </div>
                                            <div class="small mb5"> Positive Conversion <small id="sc_text">(<?php echo $data['ConversionRate']; ?>%)</small></div>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-teal bg-success" id="sc_div" role="progressbar" aria-valuenow="<?php echo $data['ConversionRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['ConversionRate']; ?>%;"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p class="fs12 text-muted"> <span class="fa fa-headphones text-success"></span> <span id="calls_text"><?php echo $data['Agent_Calls']; ?></span> Calls</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="fs12 text-muted"> <span class="fa fa-expand text-primary"></span> <span id="conr_text"><?php echo $data['Connects']; ?></span> Connects</p>
                                                </div>
                                                <div class="col-lg-3 ">
                                                    <p class="fs12 text-muted"> <span class="fa fa- user text-warning"></span> <span id="dmcs_text"><?php echo $data['DMCs']; ?></span> DMC's</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="fs12 text-muted"> <span class="fa fa-gbp mr10 text-success"></span> <span id="sale_text"><?php echo $data['Sales']; ?></span> Sales</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="gears" class="tab-pane p15 form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box">
                                                <div class="with-border">
                                                    <div class="panel-heading">
                                                        <div class="panel-title"> <span class="fa fa-info"></span>Basic Information</div>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="user">Username</label>
                                                        <input id="user" name="user" type="text" class="form-control" value="<?php echo $UserData['user']; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="full_name">Full Name</label>
                                                        <input id="full_name" name="full_name" type="text" class="form-control InputUserSetting" value="<?php echo $UserData['full_name']; ?>" data-id="<?php echo $UserData['user_id']; ?>" data-field="full_name">
                                                    </div>
                                                    <div class="form-group">
                                                      <?php if($_SESSION['CurrentLogin']['user_level'] == '8' || $_SESSION['CurrentLogin']['user_level'] == '9') { $class_name = 'InputUserSetting'; } else { $class_name = ''; } ?>
                                                        <label for="pass">Password  <a href="javascript:void(0);" class="btn btn-xs btn-success" onclick="myFunction()">Show Password</a></label>
                                                        <input id="myInput" name="pass" type="password" class="form-control <?php echo $class_name ?>" value="<?php echo $UserData['pass']; ?>" data-id="<?php echo $UserData['user_id']; ?>" data-field="pass">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="phone_login">Auto Phone ID</label>
                                                        <select name="phone_login" class="form-control SelectUserSetting" data-id="<?php echo $UserData['user_id']; ?>" data-field="phone_login">
                                                            <option value="">No Phone</option>
                                                            <?php foreach ($PhoneData as $phone) { ?>
                                                                <option value="<?php echo $phone['extension']; ?>" <?php echo ($UserData['phone_login'] == $phone['extension']) ? 'selected="selected"' : ''; ?>><?php echo $phone['extension']; ?></option>
    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php if($_SESSION['CurrentLogin']['user_id'] != $_GET['user']) { ?>
                                                    <div class="form-group">
                                                        <label for="user_level" class="">User Level</label>
                                                            <select id="user_level" name="user_level" class="form-control SelectUserSetting" data-id="<?php echo $UserData['user_id']; ?>" data-field="user_level">
                                                                <option value="">Select Level</option>
                                                                <option value="8" <?php echo ($UserData['user_level'] == 8) ? 'selected="selected"' : ''; ?>>Admin</option>
                                                                <option value="7" <?php echo ($UserData['user_level'] == 7) ? 'selected="selected"' : ''; ?>>Team Managers</option>
                                                                <option value="1" <?php echo ($UserData['user_level'] == 1) ? 'selected="selected"' : ''; ?>>Agent</option>
                                                            </select>
                                                    </div>
                                                  <?php } ?>


                                                    <?php  if($UserData['user_level'] != 1){?>
                                                    <div class="form-group TM-access">
                                                        <label for="user_level">Admin Access</label>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['admin_interface_enable'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="<?php echo $UserData['user_id']; ?>" data-value="" data-field="admin_interface_enable">
                                                                <div class="handle"></div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group TM-access">
                                                        <label for="user_level">Report Access</label>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['view_reports'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="<?php echo $UserData['user_id']; ?>" data-value="" data-field="view_reports">
                                                                <div class="handle"></div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php }?>

<!--                                                    <div class="form-group row UserRole" >
                                                            <label for="user_group" class="col-lg-3 col-sm-3 col-form-label ">Role</label>
                                                            <div class="col-sm-9">
                                                                <select id="role_id" name="role_id" class="form-control" >
                                                                    <option value="">Select Role</option>
                                                                    <?php foreach($RoleListings as $role){?>
                                                                    <option value="<?php echo $role['id'];?>"><?php echo $role['title'];?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </div>
                                                        </div>-->
                                                    <div class="form-group">
                                                        <label for="active">Active</label>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['active'] == 'Y') ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="<?php echo $UserData['user_id']; ?>" data-value="" data-field="active">
                                                                <div class="handle"></div>
                                                            </button>
                                                        </div>
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="user_level">Auto Phone Enabled</label>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['auto_enable'] == 'Y') ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="<?php echo $UserData['user_id']; ?>" data-value="" data-field="auto_enable">
                                                                <div class="handle"></div>
                                                            </button>
                                                        </div>
                                                    </div>
    <?php if ($_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                                                        <div class="form-group">
                                                            <label for="user_group">Access Role <a href="javascript:void(0);" class="btn btn-default btn-xs" title="Manage Roles"><i class="fa fa-lock text-purple2"></i></a></label>
                                                            <select id="role_id" name="role_id" class="form-control SelectUserSetting" data-id="<?php echo $UserData['user_id']; ?>" data-field="role_id">
                                                                <option>NONE</option>
                                                                <?php foreach ($AccessRole as $role) { ?>
                                                                    <option value="<?php echo $role['id']; ?>" <?php echo ($UserData['role_id'] == $role['id']) ? 'selected="selected"' : ''; ?>><?php echo $role['title']; ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div>
    <?php } ?>
                                                    <div class="form-group">
                                                        <label for="user_group">Team</label>
                                                        <select name="user_group" class="form-control SelectUserSetting" data-id="<?php echo $UserData['user_id']; ?>" data-field="user_group">
                                                            <option value="">Select Team</option>
                                                            <?php foreach ($UserGroupData as $group) { ?>
                                                                <option value="<?php echo $group['user_group']; ?>" <?php echo ($UserData['user_group'] == $group['user_group']) ? 'selected="selected"' : ''; ?>><?php echo $group['user_group'] . ' - ' . $group['group_name']; ?></option>
    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        $AllowedTeamAccess = array_filter(explode(' ', $UserData['allowed_teams_access']));
                                                        ?>
                                                        <label for="allowed_teams_access">Access Other Teams</label>
                                                        <select data-id="<?php echo $UserData['user_id']; ?>" data-field="allowed_teams_access" id="allowed_teams_access" name="allowed_teams_access" class="form-control select2 SelectUserSetting" multiple="multiple" style="width:100%;">
                                                            <option value="">Select Team</option>
                                                            <?php foreach ($UserGroupData as $group) { ?>
                                                                <option value="<?php echo $group['user_group']; ?>" <?php echo (in_array($group['user_group'], $AllowedTeamAccess)) ? 'selected="selected"' : ''; ?>><?php echo $group['group_name']; ?></option>
    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box">
                                                <div class="with-border">
                                                    <div class="panel-heading">
                                                        <div class="panel-title"> <span class="fa fa-cog"></span>User Settings</div>
                                                        <ul class="nav nav-tabs panel-tabs" role="tablist">
                                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#agentscreen" role="tab" title="User Screen Settings"><i class="fa fa-desktop"></i></a> </li>
                                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#inboundscreen" role="tab" title="User Allowed Inbound Groups"><i class="fa fa-arrow-down"></i></a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body pn">
                                                    <div class="tab-content border-none p20">
                                                        <div id="agentscreen" class="tab-pane active">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Choose Own Groups</label>
                                                                        <div class="col-sm-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['agent_choose_ingroups'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agent_choose_ingroups" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>

                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Allowed To Choose Blended</label>
                                                                        <div class="col-sm-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['agent_choose_blended'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agent_choose_blended" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="scheduled_callbacks" class="col-lg-4">Allowed To Set Callbacks</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['scheduled_callbacks'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="scheduled_callbacks" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>

                                                                        <label for="agentonly_callbacks" class="col-lg-4">Allowed To Set Personal Callbacks</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['agentonly_callbacks'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agentonly_callbacks" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="agentcall_manual" class="col-lg-4">Allowed To Manual Dial</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['agentcall_manual'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agentcall_manual" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>

                                                                        <label for="vicidial_recording" class="col-lg-4">Record Agent Calls</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['vicidial_recording'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="vicidial_recording" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="closer_default_blended" class="col-lg-4">Auto Select Outbound Dialling Checkbox</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['closer_default_blended'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="closer_default_blended" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>

                                                                        <label for="closer_default_blended" class="col-lg-2">Custom 1</label>
                                                                        <div class="col-lg-4">
                                                                          <input id="custom_one" name="custom_one" type="text" class="form-control InputUserSetting" value="<?php echo $UserData['custom_one']; ?>" data-id="<?php echo $UserData['user_id']; ?>" data-field="custom_one">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="closer_default_blended" class="col-lg-4">Agent API Access</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['vdc_agent_api_access'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="vdc_agent_api_access" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>

                                                                        <label for="closer_default_blended" class="col-lg-4">API Only User</label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo ($UserData['api_only_user'] == 1) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="api_only_user" data-id="<?php echo $UserData['user_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row vdc_agent_api_access <?php echo $UserData['vdc_agent_api_access'] ? '' : 'hide'?>">

                                                                        <label for="api_token" class="col-lg-4">Agent API Access Token</label>
                                                                        <div class="col-lg-7">
                                                                            <input id="api_token" name="api_token" type="text" class="form-control" readonly value="<?php echo $UserData['api_token'];?>">
                                                                        </div>
                                                                        <div class="col-lg-1 p-0">
                                                                          <button type="button" class="btn btn-light" name="button" onclick="copyApiToken()"><i class="fa fa-copy"></i></button>
                                                                        </div>
                                                                      </div>
                                                                      <div class="form-group row vdc_agent_api_access <?php echo $UserData['vdc_agent_api_access'] ? '' : 'hide'?>">

                                                                        <label for="api_ip_list" class="col-lg-4">Agent API Access IP's</label>
                                                                        <div class="col-lg-8">
                                                                            <input id="api_ip_list" name="api_ip_list" type="text" class="form-control SelectUserSetting" value="<?php echo $UserData['api_ip_list'];?>" data-field="api_ip_list" data-id="<?php echo $UserData['user_id']; ?>">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row vdc_agent_api_access <?php echo $UserData['vdc_agent_api_access'] ? '' : 'hide'?>">
                                                                      <label for="api_start_date" class="col-lg-4">Agent API Access Start</label>
                                                                      <div class="col-lg-4">
                                                                          <input id="api_start_date" name="api_start_date" type="date" class="form-control SelectUserSetting"  value="<?php echo $UserData['api_start_date'];?>" data-field="api_start_date" data-id="<?php echo $UserData['user_id']; ?>">
                                                                      </div>
                                                                      </div>
                                                                      <div class="form-group row vdc_agent_api_access <?php echo $UserData['vdc_agent_api_access'] ? '' : 'hide'?>">
                                                                      <label for="api_end_date" class="col-lg-4">Agent API Access End</label>
                                                                      <div class="col-lg-4">
                                                                          <input id="api_end_date" name="api_end_date" type="date" class="form-control SelectUserSetting" value="<?php echo $UserData['api_end_date'];?>"  data-field="api_end_date" data-id="<?php echo $UserData['user_id']; ?>">
                                                                      </div>
                                                                      </div>


                                                                </div>

                                                            </div>




                                                        </div>


                                                        <div id="inboundscreen" class="tab-pane">
                                                            Allowed Inbound Groups
                                                            <hr>
                                                            <?php
                                                            $CampaignCloser = array_filter(explode(' ', str_replace(' -', '', $UserData['closer_campaigns'])));
                                                            foreach (array_chunk($InboundGroups, 2) as $ground) {
                                                                ?>
                                                                <div class="form-group row">
        <?php foreach ($ground as $inbound) { ?>
                                                                        <label for="<?php echo $inbound['user_group']; ?>" class="col-lg-4"><?php echo $inbound['group_id'] . ' - ' . $inbound['group_name']; ?></label>
                                                                        <div class="col-lg-2">
                                                                            <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting <?php echo (in_array($inbound['group_id'], $CampaignCloser)) ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="closer_campaigns" data-id="<?php echo $UserData['user_id']; ?>" data-value="<?php echo $inbound['group_id']; ?>">
                                                                                <div class="handle"></div>
                                                                            </button>
                                                                        </div>
                                                                <?php } ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            <!--                    <div class="box-footer">
                                                    Footer
                                                </div>-->
                            <!-- /.box-footer-->
                        </div>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-comment"></span>Send User A Message</div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-8 col-sm-9 prn">
                                    <input type="text" id="AgentMsg" class="form-control" placeholder="Type Here...">
                                </div>
                                <div class="col-xs-4 col-sm-3">
                                    <button type="button" id="MsgBtn" class="btn btn-default  btn-block">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" name="userID" id="userID" value="<?php echo $user; ?>"/>
    <script>
        $('#activity-today').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]});


        function AjaxMethod(Method, URL, data) {
            $.ajax({
                type: Method,
                url: URL,
                data: data, // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    } else {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        }

        $(document).on('click', '.SwitchUserSetting', function () {
            if ($(this).hasClass('active')) {
                var value = 1;
            } else {
                var value = 0;
            }


            var UserID = $(this).data('id');
            var field = $(this).data('field');
            if (field == 'closer_campaigns') {
                var val = $(this).data('value');
            } else if (field == 'active') {
                var val = "N";
                if (value == 1) {
                    var val = "Y";
                }
            } else if (field == 'user_level') {
                var val = 1;
                if (value == 1) {
                    var val = 9;
                }
            } else if (field == 'auto_enable') {
                var val = 'N';
                if (value == 1) {
                    var val = 'Y';
                }
            } else if (field == 'admin_interface_enable') {
                val = value;
            } else if (field == 'view_reports') {
                val = value;
            }else{
                val = value;
            }


            var data = {field: field, value: val, userID: UserID};
            AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
            if(field=='vdc_agent_api_access' && value==0){ 
              $('.'+field).addClass('hide');
              data = {field: 'api_token', value: '', userID: UserID};
              AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
              data = {field: 'api_ip_list', value: '', userID: UserID};
              AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
              data = {field: 'api_start_date', value: '', userID: UserID};
              AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
              data = {field: 'api_end_date', value: '', userID: UserID};
              AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
            }else if(field=='vdc_agent_api_access' && value==1) {
               $('.'+field).removeClass('hide');
               $.ajax({
                      type: "GET",
                      url: '<?php echo base_url('users/ajax')?>?rule=token',
                      success: function(data)
                      {
                          data = $.trim(data);
                           $('#api_token').val(data);
                           data = {field: 'api_token', value: data, userID: UserID};
                           AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
                      }
              });
            }
        });


        $(document).on('change', '.SelectUserSetting', function () {
            var value = $(this).val();
            var UserID = $(this).data('id');
            var field = $(this).data('field');
            var data = {field: field, value: value, userID: UserID};
            AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
        });

        $(document).on('focusout', '.InputUserSetting', function () {
            var value = $(this).val();
            var UserID = $(this).data('id');
            var field = $(this).data('field');
            var data = {field: field, value: value, userID: UserID};
            AjaxMethod('POST', '<?php echo base_url('users/ajax') ?>?rule=update', data);
        });


        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        $(document).on('click', '#MsgBtn', function () {
            var message = $('#AgentMsg').val();
            var UserID = $('#userID').val();
            if (message) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('users/ajax') ?>?rule=SendMessage',
                    data: {UserID: UserID, message: message}, // serializes the form's elements.
                    success: function (data)
                    {
                        var result = JSON.parse(data);
                        if (result.success === 1) {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'info',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                        } else {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                        }
                    }
                });
            }
        })

        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


        var copyApiToken = function(){
            var copyText = document.getElementById("api_token");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand("copy");
            $.toast({
                heading: 'Copied!',
                text: '',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 1500,
                showHideTransition: 'plain',
            });
        }

    </script>
<?php } ?>
