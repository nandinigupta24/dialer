<?php if(!checkRole('inbound_groups', 'edit')){ no_permission(); } else {?>
<?php
$did = $_GET['did'];
$didInformation = $database->get('vicidial_inbound_dids','*',['did_id'=>$did]);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--   <section class="content-header">
        <h1>
            Inbound Number

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('inbound_groups')?>">Inbound Number</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="panel">
                    <!-- /.box-header -->

                        <!-- Nav tabs -->
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-book"></i> Inbound Number: <?php echo $didInformation['did_pattern'];?></span>

                            <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#tabdashboard" role="tab" aria-selected="true" title="Dashboard"><span class="fa fa-dashboard"></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabSetting" role="tab" aria-selected="true" title="Setting"><span class="fa fa-gears"></span></a> </li>
                            </ul>
						</div>
                        <!-- Tab panes -->
						<div class="panel-body pn">
                        <div class="tab-content tabcontent-border">
                            <!--                            <div class="tab-pane" id="tabDashboard" role="tabpanel">
                                                            <div class="pad">

                                                            </div>                             </div>-->
                            <div class="tab-pane " id="tabSetting" role="tabpanel">
                                <style type="text/css">
                                    .setting-tabs>li {
                                        margin-bottom: 0px !important;
                                        margin-right: 0px !important;
                                        border: 1px solid #ddd;
                                    }
                                    .nav-tabs-custom>.nav-tabs>li a.active {
                                        border-bottom: none;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-6">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                    <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                                        <li class="nav-item"><a class="nav-link active show" href="#2tabInfo" data-toggle="tab" data-pop="popover" title="General Information" data-content="Gereral ingormation releated to this campaign" data-original-title="General information" ><i class="fa fa-info"></i></a></li>
                                                        <li class="nav-item"><a href="#2tabQueStrategy" data-toggle="tab" data-pop="popover" title="Inbound Routing and Recording Settings" data-content="Queue Settings i.e. queue order, queue size." data-original-title="Inbound Routing and Recording" class="nav-link"><i class="fa fa-arrow-right pr5"></i></a></li>
                                                        <li class="nav-item"><a href="#3tabroutesetting" data-toggle="tab" data-pop="popover" title="Ingroup Route Settings" data-content="Queue Settings i.e. queue order, queue size." data-original-title="Ingroup Route Setting" class="nav-link"><i class="fa fa-sign-in pr5"></i></a></li>
                                                    </ul>
                                            </div>
                                            <div class="panel-body pn">
                                            <div class="tab-content">
                                                <!--INFO -->
                                                <div class="tab-pane active show" id="2tabInfo">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-info"></i> General Information</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="extension">Inbound Number</label>
                                                                <input id="extension_number" name="did_pattern" type="text" class="form-control manage-field-input" value="<?php echo $didInformation['did_pattern'];?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="dialplan_number">Inbound Description</label>
                                                                <input id="dialplan_number" name="did_description" type="text" class="form-control manage-field-input"  value="<?php echo $didInformation['did_description'];?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-md-12" for="campaign_active_btn">Active:</label>
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-sm btn-toggle  manage-field-switch <?php echo ($didInformation['did_active'] == 'Y') ? 'active' : '';?>" data-toggle="button" aria-pressed="false" autocomplete="off" value="<?php echo $didInformation['did_active'];?>" data-name="did_active">
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div   >
                                                </div>

                                                <div class="tab-pane" id="2tabQueStrategy">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-key"></i> Inbound Routing and Recording</span>
                                                        </div>

                                                        <div class="box-body">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-md-12" for="campaign_active_btn">Record Call:</label>
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-sm btn-toggle  manage-field-switch <?php echo ($didInformation['record_call'] == 'Y') ? 'active':'';?>" data-toggle="button" aria-pressed="false" autocomplete="off" value="<?php echo $didInformation['record_call'];?>" data-name="record_call">
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">Route Number To</label>
                                                                <select id="server" name="did_route" class="form-control manage-field-select">
                                                                    <option value="">Select Option</option>
                                                                    <option value="AGENT" <?php echo ($didInformation['did_route'] == 'AGENT') ? 'selected="selected"':'' ;?>>AGENT</option>
                                                                    <option value="EXTEN" <?php echo ($didInformation['did_route'] == 'EXTEN') ? 'selected="selected"':'' ;?>>EXTEN</option>
                                                                    <option value="VOICEMAIL" <?php echo ($didInformation['did_route'] == 'VOICEMAIL') ? 'selected="selected"':'' ;?>>VOICEMAIL</option>
                                                                    <option value="PHONE" <?php echo ($didInformation['did_route'] == 'PHONE') ? 'selected="selected"':'' ;?>>PHONE</option>
                                                                    <option value="IN_GROUP" <?php echo ($didInformation['did_route'] == 'IN_GROUP') ? 'selected="selected"':'' ;?>>IN_GROUP</option>
                                                                    <option value="CALLMENU" <?php echo ($didInformation['did_route'] == 'CALLMENU') ? 'selected="selected"':'' ;?>>CALLMENU</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">Call Menu</label>
                                                                <select id="server" name="menu_id" class="form-control manage-field-select">
                                                                    <option value="">Select Option</option>
                                                                    <option value="default---agent" <?php echo ($didInformation['menu_id'] == 'default---agent') ? 'selected="selected"':'' ;?>>default---agent - agent phones restricted to only internal extensions - sip-silence</option>
                                                                    <option value="defaultlog" <?php echo ($didInformation['menu_id'] == 'defaultlog') ? 'selected="selected"':'' ;?>>defaultlog - logging of all outbound calls from agent phones - sip-silence</option>
                                                                    <option value="IVR" <?php echo ($didInformation['menu_id'] == 'IVR') ? 'selected="selected"':'' ;?>>IVR - FeedBack-IVR - inbound_ring2-1604574708</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">User Unavailable Action</label>
                                                                <select id="server" name="user_unavailable_action" class="form-control manage-field-select">
                                                                    <option value="EXTEN" <?php echo ($didInformation['user_unavailable_action'] == 'EXTEN') ? 'selected="selected"':'' ;?>>EXTEN</option>
                                                                    <option value="VOICEMAIL" <?php echo ($didInformation['user_unavailable_action'] == 'VOICEMAIL') ? 'selected="selected"':'' ;?>>VOICEMAIL</option>
                                                                    <option value="VMAIL_NO_INST" <?php echo ($didInformation['user_unavailable_action'] == 'VMAIL_NO_INST') ? 'selected="selected"':'' ;?>>VMAIL_NO_INST</option>
                                                                    <option value="PHONE" <?php echo ($didInformation['user_unavailable_action'] == 'PHONE') ? 'selected="selected"':'' ;?>>PHONE</option>
                                                                    <option value="IN_GROUP" <?php echo ($didInformation['user_unavailable_action'] == 'IN_GROUP') ? 'selected="selected"':'' ;?>>IN_GROUP</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">User Agent</label>
                                                                <input type="text" name="user" class="form-control manage-field-input" value="<?php echo $didInformation['user']; ?>">
                                                            </div>
<!--                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-md-12" for="campaign_active_btn">Re-Route Based On Status:</label>
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-sm btn-toggle  manage-field-switch active" data-toggle="button" aria-pressed="false" autocomplete="off" value="Y" data-name="active">
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>-->

                                                        </div>
                                                    </div>                 </div>

                                                <div class="tab-pane" id="3tabroutesetting">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-key"></i> Ingroup Settings</span>
                                                        </div>
                                                        <div class="panel-body pn">

                                                          <div class="form-group">
                                                              <label for="server_ip">User Route Settings In-Group</label>
                                                              <?php
                                                              $userGroups = $database->select('vicidial_user_groups',['allowed_campaigns','allowed_reports','admin_viewable_groups','admin_viewable_call_times','qc_allowed_campaigns','qc_allowed_inbound_groups'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                              foreach($userGroups as $usergroup) {
                                                                $LOGadmin_viewable_groups =		$usergroup['admin_viewable_groups'];
                                                              }
                                                              $LOGadmin_viewable_groupsSQL='';
                                                              if ( (!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
                                                              	{
                                                              	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
                                                              	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                                                $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                                                              	$whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                                                              	}
                                                                $InboundGroups = $database->query("SELECT group_id,group_name from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id")->fetchAll(PDO::FETCH_ASSOC);
                                                               ?>

                                                              <select name="user_route_settings_ingroup" class="form-control manage-field-select">
                                                                  <option value="">Select Option</option>
                                                                  <?php foreach($InboundGroups as $group){?>
                                                                  <option value="<?php echo $group['group_id'];?>" <?php echo ($didInformation['user_route_settings_ingroup'] == $group['group_id']) ? 'selected="selected"':'' ;?>><?php echo $group['group_name'];?></option>
                                                                  <?php }?>
                                                              </select>
                                                          </div>

                                                            <div class="form-group">
                                                                <label for="server_ip">Ingroup</label>
                                                                <?php
                                                            /* if($_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                                                                $InboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                            }else{
                                                                 $InboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],[]);
                                                            } */
                                                            $InboundGroups = $database->query("SELECT group_id,group_name from vicidial_inbound_groups WHERE group_id NOT IN('AGENTDIRECT') $LOGadmin_viewable_groupsSQL order by group_id")->fetchAll(PDO::FETCH_ASSOC);
                                                                 ?>

                                                                <select name="group_id" class="form-control manage-field-select">
                                                                    <option value="">Select Option</option>
                                                                    <?php foreach($InboundGroups as $group){?>
                                                                    <option value="<?php echo $group['group_id'];?>" <?php echo ($didInformation['group_id'] == $group['group_id']) ? 'selected="selected"':'' ;?>><?php echo $group['group_name'];?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">Lead Lookup Method</label>
                                                                <select name="call_handle_method" class="form-control manage-field-select">
                                                                    <option value=""></option>
                                                                    <option value="CID" <?php echo ($didInformation['call_handle_method'] == 'CID') ? 'selected="selected"':'' ;?>>Create New Lead</option>
                                                                    <option value="CIDLOOKUP" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUP') ? 'selected="selected"':'' ;?>>Lookup Lead In System</option>
                                                                    <option value="CIDLOOKUPRL" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUPRL') ? 'selected="selected"':'' ;?>>Lookup Lead In List</option>
                                                                    <option value="CIDLOOKUPRC" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUPRC') ? 'selected="selected"':'' ;?>>Lookup Lead In Campaign</option>
                                                                    <option value="CIDLOOKUPALT" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUPALT') ? 'selected="selected"':'' ;?>>Lookup Lead In System Inc Alt Number</option>
                                                                    <option value="CIDLOOKUPRLALT" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUPRLALT') ? 'selected="selected"':'' ;?>>Lookup Lead In List Inc Alt Number</option>
                                                                    <option value="CIDLOOKUPRCALT" <?php echo ($didInformation['call_handle_method'] == 'CIDLOOKUPRCALT') ? 'selected="selected"':'' ;?>>Lookup Lead In Campaign Inc Alt Number</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="extension">Lead Lookup: List</label>
                                                                <input  name="list_id" type="number" class="form-control manage-field-input" min="1" max="99999999" value="<?php echo $didInformation['list_id'];?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="server_ip">Lead Lookup: Campaign</label>
                                                                <?php

                                                                    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                       $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['ORDER'=>['campaign_id'=>'ASC']]);
                                                                    }else{
                                                                        $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['ORDER'=>['campaign_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                                                                    }
                                                                ?>

                                                                <select name="campaign_id" class="form-control manage-field-select">
                                                                    <option value="">Select Option</option>
                                                                    <?php foreach($CampaignListings as $campaign){?>
                                                                    <option value="<?php echo $campaign['campaign_id'];?>" <?php echo ($didInformation['campaign_id'] == $campaign['campaign_id']) ? 'selected="selected"':'' ;?>><?php echo $campaign['campaign_id'].' - '.$campaign['campaign_name'];?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </div>


                                                        </div>
                                                    </div>                 </div>

                                            </div>
                                            </div>
                                        </div>
                                        <!--- BOX tab inner-contant -- Call startgy-->

                                    </div>



                                </div>
                            </div>

                            <div class="tab-pane active" id="tabdashboard" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="panel" id="live_agents_panel" style="display:none;">
                                            <div class="panel-heading"> <span class="panel-title"><i class="fa fa-book"></i> Live Agents</span>
                                                <ul class="nav panel-tabs">
                                                    <li><a class="ajax-disable" href="#" onclick="$('#live_agents_panel').fadeOut();" title="Close Window"><span class="fa fa-times"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="panel-body" id="agentsingroup">

                                            </div>
                                        </div>
                                        <h4 class="text-uppercase mbn"> <strong>Inbound Route - Visual overflow for <?php echo $didInformation['did_pattern'];?></strong></h4>
                                        <hr/>
                                        <span id="today_sales_table">
                                            <div class="alert alert-success col-lg-12" role="alert"><center>Inbound Number: <?php echo $didInformation['did_pattern'];?></center></div>
                                            <div class="alert alert-default" role="alert" style="margin-bottom: 0px;"><center><i class="fa fa-long-arrow-down fa-3x"></i></center></div>
                                            <div class="alert alert-info" role="alert"><center>Inbound Group: <?php echo $didInformation['group_id'];?></center></div>
                                            <!--<div class="alert alert-default" role="alert" style="margin-bottom: 0px;"><center><i class="fa fa-long-arrow-down fa-3x"></i></center></div>-->
<!--                                            <div class="row">
                                                <div class="alert alert-warning col-sm-6" role="alert"><center>Drop Action: CALLMENU - 3051<br></center></div>
                                                <div class="alert alert-danger col-sm-6" role="alert"><center>After Hours Action: CALLMENU - 12345<br></center></div>
                                            </div>-->
                                        </span>

                                    </div>

                                </div>
                                <style type="text/css">
                                    .setting-tabs>li {
                                        margin-bottom: 0px !important;
                                        margin-right: 0px !important;
                                        border: 1px solid #ddd;
                                    }
                                    .nav-tabs-custom>.nav-tabs>li a.active {
                                        border-bottom: none;
                                    }
                                </style>

                            </div
                        </div>
                    </div>
                    <style type="text/css">
                        .custom-file-input{
                            display:none;
                        }
                    </style>                            </div>
                <!-- nav tab-->
            </div>
        </div>
</div>
</section>
</div>


<script>
var FieldID = '<?php echo $_GET['did'];?>';
function AjaxPost(FieldID,FieldColumn,FieldValue){
    $.ajax({
                type: "POST",
                url: '<?php echo base_url('inbound_groups/ajax')?>?action=UpdateDetail',
                data: {FieldID:FieldID,FieldColumn:FieldColumn,FieldValue:FieldValue},
                success: function(data)
                {

                    var result = JSON.parse(data);
                    if(result.success === 1){
                        $.toast({
                            heading: 'Inbound Number Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }else{
                        $.toast({
                            heading: 'Inbound Number Settings',
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
$(document).on('click','.manage-field-switch',function(){
    var ColumnName = $(this).data('name');
    if($(this).hasClass('active')){
        var value = 'Y';
    }else{
        var value = 'N';
    }
    AjaxPost(FieldID,ColumnName,value);
});

$(document).on('change','.manage-field-select',function(){
    var ColumnName = $(this).attr('name');
    var value = $(this).val();
    AjaxPost(FieldID,ColumnName,value);
});

$(document).on('change','.manage-field-input',function(){
    var ColumnName = $(this).attr('name');
    var value = $(this).val();
    AjaxPost(FieldID,ColumnName,value);
});
</script>
<?php } ?>
