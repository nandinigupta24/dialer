<?php if(!checkRole('teams', 'edit')){ no_permission(); } else {?>
    <?php $user_group = $_GET['user_group']; $LOGadmin_viewable_groupsSQL = '';?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<!--  <section class="content-header">
    <h1 class="m-n font-thin h3 text-black">Team Details</h1>
    <small class="text-muted">Manage teams from this page</small>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('teams')?>">Team Details</a></li>
      <li class="breadcrumb-item active">Modify</li>
    </ol>
  </section>-->
  <!-- Main content -->
  <section class="content">
    <?php
    $stmt="SELECT user_group,group_name,allowed_campaigns,qc_allowed_campaigns,qc_allowed_inbound_groups,group_shifts,forced_timeclock_login,shift_enforcement,agent_status_viewable_groups,agent_status_view_time,agent_call_log_view,agent_xfer_consultative,agent_xfer_dial_override,agent_xfer_vm_transfer,agent_xfer_blind_transfer,agent_xfer_dial_with_customer,agent_xfer_park_customer_dial,agent_fullscreen,allowed_reports,webphone_url_override,webphone_systemkey_override,webphone_dialpad_override,admin_viewable_groups,admin_viewable_call_times,status,chat_ID from vicidial_user_groups where user_group='$user_group' $LOGadmin_viewable_groupsSQL;";
    $rslt=mysql_to_mysqli($stmt, $link);
    $row=mysqli_fetch_row($rslt);
    $user_group =           $row[0];
    $group_name =           $row[1];
    $allowed_campaigns=    $row[2];
    $GROUP_shifts =           $row[5];
    $forced_timeclock_login =     $row[6];
    $shift_enforcement =        $row[7];
    $VGROUP_vgroups =         $row[8];
    $agent_status_view_time =     $row[9];
    $agent_call_log_view =        $row[10];
    $agent_xfer_consultative =      $row[11];
    $agent_xfer_dial_override =     $row[12];
    $agent_xfer_vm_transfer =     $row[13];
    $agent_xfer_blind_transfer =    $row[14];
    $agent_xfer_dial_with_customer =  $row[15];
    $agent_xfer_park_customer_dial =  $row[16];
    $agent_fullscreen =         $row[17];
    $allowed_reports =          $row[18];
    $webphone_url_override =      $row[19];
    $webphone_systemkey_override =    $row[20];
    $webphone_dialpad_override =    $row[21];
    $admin_viewable_groups =      $row[22];
    $admin_viewable_call_times =    $row[23];
    $status =    $row[24];
    $ChatID =    $row[25];

    $LOGallowed_campaignsSQL='';
    $campLOGallowed_campaignsSQL='';
    $whereLOGallowed_campaignsSQL='';

    if ( (!preg_match('/\-ALL/i', $allowed_campaigns)) )
    	{
    	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$allowed_campaigns);
    	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
    	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
    	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
    	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
    	}

      $admin_viewable_groupsALL=0;
      $LOGadmin_viewable_groupsSQL='';
      $whereLOGadmin_viewable_groupsSQL='';
      $valLOGadmin_viewable_groupsSQL='';
      $vmLOGadmin_viewable_groupsSQL='';
      if ( (!preg_match('/\-\-ALL\-\-/i',$admin_viewable_groups)) and (strlen($admin_viewable_groups) > 3) )
      	{
      	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$admin_viewable_groups);
      	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
      	$LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
      	$whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
      	$valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
      	$vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
      	}
      else
      	{$admin_viewable_groupsALL=1;}

    $CampaignListing = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['ORDER'=>['campaign_name'=>'ASC']]);
    $allowed_campaigns = array_filter(explode(' ',$allowed_campaigns));
    $selected = (in_array('-ALL-CAMPAIGNS-',$allowed_campaigns)) ? 'selected="selected"' : '';
    $PricingPlans = $DBUTG->select('pricing_plans','*',['status'=>'active']);
    $EmailAddress = $DBUTG->get('team_email_addresses','email_address',['user_group'=>$user_group]);
    $Licensing = $DBUTG->select('licensings',['id','title'],['status'=>'active']);
    $LicensingID = $DBUTG->get('user_licensings','licensing_id',['user_group'=>$user_group,'ORDER'=>['id'=>'DESC']]);

    ?>
    <!-- PAGE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading"> <span class="panel-title"><i class="fa fa-user"></i> Team: <?php echo $user_group; ?></span>
<!--          <ul class="nav panel-tabs">
            <li class="active"><a href="#tab1" onclick="$('#bottom_tools').show();" class="setting_icon" data-content="Quickly see what is happening with this team." rel="popover" data-placement="top" data-original-title="Team Dashboard" data-trigger="hover" data-toggle="tab"><i class="fa fa-dashboard"></i></a></li>
          </ul>-->
        </div>
        <div class="panel-body pn">
          <div class="tab-content border-none pn">
            <div id="tab1" class="tab-pane active p15">
              <div class="row">
                <div class="col-lg-8">
                    <form method="post" id="UserGroupEdit">
                        <input type="hidden" name="" value=""/>
                    <!--<h4 class="text-uppercase mbn"> Team Settings</h4>-->
                    <!--<h6 class="mb15"> Settings For Team :  <?php // echo $group_name; ?></h6>-->
                    <div class="panel-body">
                      <div class="form-group">
                        <label for="user_group">Team</label>
                        <input id="user_group" name="user_group" type="text" class="form-control" value="<?php echo $user_group; ?>" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="group_name">Team Description</label>
                        <input id="group_name" name="group_name" type="text" class="form-control" value="<?php echo $group_name; ?>">
                      </div>
                      <div class="form-group">
                        <label for="allowed_campaigns">Campaign Access</label>
                        <select id="allowed_campaigns" name="allowed_campaigns[]" class="form-control select2" multiple="multiple" style="width:100%;">
                            <option value="-ALL-CAMPAIGNS-" <?php echo $selected;?>>ALL CAMPAIGNS</option>
                            <?php

                            foreach($CampaignListing as $listingCampaign){
                                $selected = (in_array($listingCampaign['campaign_id'],$allowed_campaigns)) ? 'selected="selected"' : '';
                                echo '<option value="'.$listingCampaign['campaign_id'].'" '.$selected.'>'.$listingCampaign['campaign_id'].'-'.$listingCampaign['campaign_name'].'</option>';
                            }
                            ?>
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="group_name">Team Email Address</label>
                        <input id="email_address" name="email_address" type="email" class="form-control" value="<?php echo $EmailAddress;?>" required="" placeholder="Enter Team Email Address..."/>
                    </div>
                        <div class="form-group">
                        <label for="user_group">Chat ID</label>
                        <input id="" name="chat_ID" type="text" class="form-control" value="<?php echo $ChatID; ?>" >
                      </div>
                    <div class="form-group">
                        <label for="group_name" class="control-label">Licensing</label>
                            <select class="form-control" name="licensing" required="">
                                <option value="">Select License</option>
                                <?php foreach($Licensing as $val){?>
                                <option value="<?php echo $val['id'];?>" <?php echo ($LicensingID == $val['id']) ? 'selected="selected"' : '';?>><?php echo $val['title'];?></option>
                                <?php }?>
                            </select>
                    </div>
                        <div class="form-group create_team_required">
                                            <label for="group_name" class="control-label">Status</label>
                                                <button type="button" class="btn btn-toggle GroupStatus <?php echo ($status == 'Y') ? 'active' : '';?>"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="status" value="<?php echo $status;?>"/>
                                        </div>
                        <div class="form-group">
                          <label for="group_name" class="control-label">Agent Status Viewable Groups</label>
                          <select class="form-control select2" name="agent_status_viewable_groups[]" multiple>
                          <?php if($admin_viewable_groupsALL > 0) { ?>
                            <?php if (preg_match('/\-\-ALL\-GROUPS\-\-/', $VGROUP_vgroups)) {$selected1 = 'selected';} else {$selected1 = '';} ?>
                            <option value="--ALL-GROUPS--" <?php echo $selected1 ?>><span class="bold">ALL-GROUPS</span> - All user groups in the system</option>
                            <?php if (preg_match('/\-\-CAMPAIGN\-AGENTS\-\-/', $VGROUP_vgroups)) {$selected2 = 'selected';} else {$selected2 = '';} ?>
                            <option value="--CAMPAIGN-AGENTS--" <?php echo $selected2 ?>><span class="bold">CAMPAIGN-AGENTS</span> - All users logged into the same campaign as the agent</option>
                            <?php if (preg_match('/\-\-NOT\-LOGGED\-IN\-AGENTS\-\-/', $VGROUP_vgroups)) {$selected3 = 'selected';} else {$selected3 = '';} ?>
                            <option value="--NOT-LOGGED-IN-AGENTS--" <?php echo $selected3 ?>>NOT-LOGGED-IN-AGENTS</span> - All users in the system, even not logged-in users</option>
                          <?php } ?>
                          <?php $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                    			$rslt=mysql_to_mysqli($stmt, $link);
                    			$view_groups_to_print = mysqli_num_rows($rslt);
                    			$o=0;
                          while ($view_groups_to_print > $o)
                    				{
                    				$rowx=mysqli_fetch_row($rslt);
                    				$vgroups_id_value = $rowx[0];
                    				$vgroups_name_value = $rowx[1];
                            $p=0;
                    				while ($p<1000)
                    					{
                    					if (preg_match("/$vgroups_id_value/", $VGROUP_vgroups))
                    						{
                    						$selected = 'selected';
                              } else {
                                $selected = '';
                              }
                    					$p++;
                    					}
                          ?>
                          <!--  <div class="form-group">
                            <input type="checkbox" name="agent_status_viewable_groups[]" value="<?php echo $vgroups_id_value ?>" <?php echo $checked ?>> <span class="bold"><?php echo $vgroups_id_value; ?></span> - <?php echo $vgroups_name_value ?>
                          </div>  -->
                            <option value="<?php echo $vgroups_id_value ?>" <?php echo $selected ?>><span class="bold"><?php echo $vgroups_id_value; ?></span> - <?php echo $vgroups_name_value ?></option>
                          <?php $o++;
                  				} ?>
                          </select>
                          </div>
                        <hr/>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                            <button class="btn btn-danger" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-lg-4">
                    <?php
                    $query = "SELECT VLA.status,count(*) as total FROM vicidial_live_agents VLA JOIN vicidial_users VU ON VLA.user=VU.user WHERE VU.user_group = '".$user_group."' GROUP BY VLA.status";
                    $UserStatus = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);


                    $ArrayCount = [];
                    foreach($UserStatus as $val){
                        $ArrayCount[$val['status']] = $val['total'];
                    }

                    ?>
<!--                  <h4 class="text-uppercase mbn"> Team's Presence </h4>
                  <h6 class="mb15"> Summary of team <?php echo $user_group; ?>'s online presence.</h6>
                  <div class="col-lg-6 visible-lg pl5">
                    <p class="fs12 text-muted"> <span class="glyphicons glyphicons-headset mr10 text-blue2"></span> <span id="online_txt"><?php echo array_sum($ArrayCount);?></span> Online</p>
                  </div>
                  <div class="col-lg-6 visible-lg pl5">
                    <p class="fs12 text-muted"> <span class="glyphicons glyphicons-phone mr10 text-orange2"></span> <span id="talk_txt"><?php echo (!empty($ArrayCount['INCALL'])) ? $ArrayCount['INCALL'] : 0;?></span> Talking</p>
                  </div>
                  <div class="col-lg-6 visible-lg pl5">
                    <p class="fs12 text-muted"> <span class="glyphicons glyphicons-pause mr10 text-purple2"></span> <span id="pause_text"><?php echo (!empty($ArrayCount['PAUSED'])) ? $ArrayCount['PAUSED'] : 0;?></span> Paused</p>
                  </div>
                  <div class="col-lg-6 visible-lg pl5">
                    <p class="fs12 text-muted"> <span class="glyphicons glyphicons-clock mr10 text-green2"></span> <span id="waiting_text"><?php echo (!empty($ArrayCount['READY'])) ? $ArrayCount['READY'] : 0;?></span> Waiting For Call</p>
                  </div>-->
                  <div class="panel">
                      <div class="panel-heading">
                          <span class="panel-title"><i class="fa fa-users"></i> Team's Presence</span>
                      </div>
                      <div class="panel-body pn">
                          <div class="row">
                              <div class="col-md-6">
                                <div class="box box-body text-center bg-info">
                                    <div class="font-size-40 font-weight-200"><?php echo array_sum($ArrayCount);?></div>
                                    <div><strong>Online</strong></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="box box-body text-center bg-success">
                                    <div class="font-size-40 font-weight-200"><?php echo (!empty($ArrayCount['INCALL'])) ? $ArrayCount['INCALL'] : 0;?></div>
                                    <div><strong>Talking</strong></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="box box-body text-center bg-warning">
                                    <div class="font-size-40 font-weight-200"><?php echo (!empty($ArrayCount['PAUSED'])) ? $ArrayCount['PAUSED'] : 0;?></div>
                                    <div><strong>Paused</strong></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="box box-body text-center bg-primary">
                                    <div class="font-size-40 font-weight-200"><?php echo (!empty($ArrayCount['READY'])) ? $ArrayCount['READY'] : 0;?></div>
                                    <div><strong>Waiting</strong></div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

<!--                  <div class="col-lg-12 visible-lg pl5">
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Team Alerts:</strong> You current have no alerts for this team. </div>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <span id="bottom_tools">
    <div class="row">
    <div class="col-md-8">
      <div class="panel panel-visible formtabs" id="AllFormsTab">
        <div class="panel-heading">
          <div class="panel-title"> <span class="fa fa-user"></span>Users In This Team</div>
          <ul class="nav panel-tabs">
            <li><a class="ajax-disable" title="Refresh Agents" href="#" onclick="agents();"><span class="fa fa-refresh text-blue2"></span></a></li>
            <li><a class="ajax-disable" title="Create Agents" data-toggle="modal" data-target="#modal-agent-selection"><span class="fa fa-plus text-blue2"></span></a></li>
          </ul>
        </div>
        <div class="panel-body pbn">
            <table class="table table-bordered table-striped" id="TeamTable">
                <thead class="bg-success">
                  <tr>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Access Role</th>
                      <th>Current Status</th>
                      <th>Current Campaign</th>
                      <th>Action</th>
                  </tr>
              </thead>
          <tbody>
            <?php
            $active_confs = 0;
            $stmt="SELECT user,full_name,user_level,active,user_id from vicidial_users where user_group='$user_group' $LOGadmin_viewable_groupsSQL;";
            $rsltx=mysql_to_mysqli($stmt, $link);
            $users_to_print = mysqli_num_rows($rsltx);

              $o=0;
              while ($users_to_print > $o)
              {
              $rowx=mysqli_fetch_row($rsltx);
              $Campaign = $database->get('vicidial_live_agents',['campaign_id'],['user'=>$rowx[0]]);
              $o++;
              if (preg_match('/1$|3$|5$|7$|9$/i', $o))
              {$bgcolor='bgcolor="#f9f9f9"';}
              else
              {$bgcolor='bgcolor="#fff"';}
              echo "<tr >\n";
                echo "<td><a href=\"$PHP_SELF?ADD=3&user=$rowx[0]\">$rowx[0]</a></td>\n";
                echo "<td class='sorting_1'>$rowx[1]</td>\n";
                echo "<td>$rowx[2]</td>\n";
                echo "<td>$rowx[3]</td>\n";
                echo "<td>".$Campaign['campaign_id']."</td>\n";
                // echo "<td><span class='label btn-danger'>logged off</span></td>";
                 echo "<td><a href='".base_url('users/edit').'?user=' . $rowx[4]."' class='btn  btn-app btn-success'><i class='fa fa-arrow-right'></i></a></td>\n";
              echo "</tr>\n";
              }
              ?>

              </tbody></table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-overflow chat-panel">
                <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-money"></i> Pricing Plan Upgrade</span>
                <ul class="nav panel-tabs">
                    <li>
                        <a class="" title="See History" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <span class="fa fa-list-alt text-blue2" style="font-size: 14px;"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer pn">
                <form class="" method="post" action="<?php echo base_url('pricing/ajax') ?>?action=UpdatePlan" id="PricingUpdate">
                    <input type="hidden" name="user_group" value="<?php echo $_GET['user_group'];?>"/>
                    <div class="row">
                      <div class="col-xs-7 col-sm-8 prn">
                        <select class="form-control" name="pricing_plan_id" required="">
                              <option value="">---Select Option---</option>
                               <?php  foreach($PricingPlans as $plans){?>
                              <option value="<?php echo $plans['id'];?>"><?php echo $plans['title'].' - '.$plans['duration'].' '.$plans['type'];?></option>
                              <?php }?>
                        </select>
                      </div>
                      <div class="col-xs-5 col-sm-4">
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                      </div>
                    </div>
                 </form>
            </div>
          </div>
            <div class="panel panel-overflow chat-panel">
              <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-comment"></i> Send Team A Message</span>
            </div>
            <div class="panel-footer pn">
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
      </span>
      <!-- END CONTENT -->
    </section>
  </div>
<input type="hidden" name="userID" value="<?php echo $user_group; ?>" id="userID"/>

<?php
$AgentList = $database->select('vicidial_users','*',['AND'=>['active'=>'Y','user_group[!]'=>'ADMIN']]);
//$AgentList = $database->query("SELECT VU.user,VU.full_name FROM vicidial_users VU JOIN vicidial_user_groups VUG ON VU.user_group = VUG.user_group")->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="modal center-modal fade" id="modal-agent-selection" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
                  <h5 class="modal-title">Agent Selection</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
              <form method="post" action="" id="AgentSelection">
                  <input type="hidden" name="AgentSelection_user_group" value="<?php echo $user_group;?>"/>
            <div class="modal-body">
                <div class="form-group">
                    <select class="form-control select2" name="agent[]" style="width:100%;" multiple="">
                        <option value="">Select Agent</option>
                        <?php
                        foreach($AgentList as $listAgent){?>
                        <option value="<?php echo $listAgent['user'];?>" <?php echo ($listAgent['user_group'] == $user_group) ? 'selected="selected"' : '';?>><?php echo $listAgent['user'].' - '.$listAgent['full_name'];?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
            </div>
              </form>
          </div>
    </div>
  </div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-history"></i> Pricing Plan History</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <?php $UserPricing = $DBUTG->select('user_pricings','*',['user_group'=>$_GET['user_group']]); ?>
                           <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Plan Title</th>
                                            <th>Duration</th>
                                            <th>Pricing</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($UserPricing as $listings){
                                            $PricingPlan = $DBUTG->get('pricing_plans','*',['id'=>$listings['pricing_plan_id']]);
                                            switch($listings['status']){
                                                case 'NEW':
                                                 $LabelClass = 'label-primary';
                                                    break;
                                                case 'RUN':
                                                 $LabelClass = 'label-success';
                                                    break;
                                                case 'END':
                                                 $LabelClass = 'label-danger';
                                                    break;
                                                default:
                                                $LabelClass = 'label-info';
                                            }
                                            ?>
                                        <tr>
                                            <td><?php echo $PricingPlan['title'];?></td>
                                            <td><?php echo $PricingPlan['duration'].' '.$PricingPlan['type'];?></td>
                                            <td><?php echo $PricingPlan['price'];?></td>
                                            <td><?php echo $listings['start'];?></td>
                                            <td><?php echo $listings['end'];?></td>

                                            <td><span class="label <?php echo $LabelClass;?>"><?php echo $listings['status'];?></span></td>
                                            <td><?php echo $listings['created_at'];?></td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>



                            </div>
                    </div>
<!--                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>-->
            </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$('#TeamTable').DataTable();
$('#table-list-campaigns').DataTable();
$(document).on('click','#MsgBtn',function(){
    var message = $('#AgentMsg').val();
    $('#AgentMsg').val('');
    var UserID = $('#userID').val();
    if(message){
       $.ajax({
           type:'POST',
           url: '<?php echo base_url('teams/ajax')?>?rule=SendMessage',
           data: {UserID:UserID,message:message}, // serializes the form's elements.
           success: function(data)
           {
               var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }else{
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


$('#UserGroupEdit').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: '<?php echo base_url('teams/ajax') ?>?rule=update',
        data: $('form').serialize(),
        success: function (data) {
          var result = JSON.parse(data);
            if (result.success === 1) {
                $.toast({
                    heading: 'Team Setting',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    showHideTransition: 'plain',
                });

            } else {
                $.toast({
                    heading: 'Team Setting',
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
});
$('#AgentSelection').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: '<?php echo base_url('teams/ajax') ?>?rule=AgentSelection',
        data: $('form').serialize(),
        success: function (data) {
          var result = JSON.parse(data);
            if (result.success === 1) {
                $.toast({
                    heading: 'Team Agent Setting',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    showHideTransition: 'plain',
                });
                setTimeout(function(){
                location.reload();
                }, 2000);
            } else {
                $.toast({
                    heading: 'Team Setting',
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
});


$("#PricingUpdate").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Pricing Plan Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        setTimeout(function(){ window.location.reload(); }, 2000);
                    } else {
                        $.toast({
                            heading: 'SMTP Settings',
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
        });
$(document).on('click','.GroupStatus',function(){
            var value = 'N';
            if($(this).hasClass('active')){
                value = 'Y';
            }
            $(this).parent().find('input').val(value);
        });
</script>
<?php } ?>
