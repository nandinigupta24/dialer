<?php if(!checkRole('campaigns', 'create')){ no_permission(); } else {?>
<style>
    .hidden-row{
        display:none;
    }
    .range-slider {
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .range-slider:hover {
        opacity: 1;
    }

    .range-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #2196F3;
        cursor: pointer;
    }
    th{
        font-size: 13px !important;
        font-weight: 700 !important;
    }

    .range-slider::-moz-range-thumb {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #2196F3;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1>
            Campaign
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('campaigns')?>">Campaign</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-plus"></i> Add A new campaign</span>
                        <!-- nav tab-->
                        <ul class="box-controls  pull-right nav nav-tabs justify-content-end AddCampaignTab" role="tablist">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#faPhone" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="fa fa-phone"></i></span> <span class="hidden-xs-down"><i class="fa fa-phone"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#faList" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-list-ol"></i></span> <span class="hidden-xs-down"><i class="fa fa-list-ol"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#faPencil" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-pencil"></i></span> <span class="hidden-xs-down"><i class="fa fa-pencil"></i></span></a> </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active show" id="faPencil" role="tabpanel">
                                <h4 class="page-header">Campaign Details</h4>
                                <form method="POST" action="#" accept-charset="UTF-8" id="createCampaignStepOne" autocomplete="off" novalidate="novalidate">

                                    <div class="pad">

                                        <div class="form-group row">
                                            <label for="campaign_id" class="col-sm-3 col-form-label">ID</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="i.e 1000" id="campaign_id" name="campaign_id">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="campaign_name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 40 Characters" id="campaign_name" name="campaign_name">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campaign_description" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 40 Characters" id="campaign_description" name="campaign_description">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                        
                                        <!---------------------------------------------------------->
                                        
                                        <div class="form-group row">
                                            <label for="campaign_description" class="col-sm-3 col-form-label">Team</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="user_group" required="">
                                                    <option value="">---Select Option--</option>
                                                <?php 
                                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                                
                                                ?>
                                                     <option value="---ALL---">---ALL---</option>
                                                     
                                                    <?php 
                                                }else{
                                                $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER' => ['user_group' => 'ASC']]);
                                                }
                                                foreach ($UserGroupListings as $listings) {
                                                    ?>
                                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                                <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <?php // }else{?>
                                        
                                        <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>-->
                                        <?php // }?>
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campaign_active_btn" class="col-sm-3 col-form-label">Active</label>
                                            <div class="col-sm-9">
                                                <button type="button" id="campaign_active_btn" data-input="campaign_active" class="btn btn-sm btn-toggle btn-switch" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="campaign_active" id="campaign_active" value="0">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campaign_webform_btn" class="col-sm-3 col-form-label">Use A webform</label>
                                            <div class="col-sm-9">
                                                <button type="button" id="campaign_webform_btn" data-input="campaign_webform" data-has="1" data-field="web_form_address,web_form_address_two" class="btn btn-sm btn-toggle btn-switch" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="campaign_webform" id="campaign_webform" value="0">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                        <div class="form-group row hidden-row" id="web_form_address-row">
                                            <label for="web_form_address" class="col-sm-3 col-form-label">Web form selection</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Webform URL" id="web_form_address" name="web_form_address">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                        <div class="form-group row hidden-row" id="web_form_address_two-row">
                                            <label for="web_form_address_two" class="col-sm-3 col-form-label">Second webform selection</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Webform URL" id="web_form_address_two" name="web_form_address_two">
                                            </div>
                                        </div> 
                                        <!---------------------------------------------------------->


                                        <div class="form-group row">
                                            <label for="campaign_webform_btn" class="col-sm-3 col-form-label">Open in new window</label>
                                            <div class="col-sm-9">
                                                <button type="button" id="open_new_window_btn" data-input="open_new_window" class="btn btn-sm btn-toggle btn-switch" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="open_new_window" id="open_new_window" value="0">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campaign_blanded_btn" class="col-sm-3 col-form-label">Blanded Campaign</label>
                                            <div class="col-sm-9">
                                                <button type="button" id="campaign_blanded_btn" data-input="campaign_blanded" class="btn btn-sm btn-toggle btn-switch" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="campaign_blanded" id="campaign_blanded" value="0">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                    </div>
                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6">
                                                <!-- <button type="button" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button> -->
                                        </div>
                                        <div class="col-sm-6"> 
                                            <button type="submit" id="btn-formStepOne" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                            <div class="tab-pane pad" id="faList" role="tabpanel">
                                <h4 class="page-header">Pre load Details</h4>
                                <form method="POST" action="#" accept-charset="UTF-8" id="createCampaignStepTwo" autocomplete="off">

                                    <div class="pad">

                                        <div class="form-group row">
                                            <label for="max_leads_to_queue" class="col-sm-4 col-form-label">Maximum Leads To Queue</label>
                                            <div class="col-sm-7">
                                                <div class="slidecontainer">  
                                                    <input type="range" min="0" max="500" step="1" value="100" class="range-slider rangeSlide" name="max_leads_to_queue" id="max_leads_to_queue"> 
                                                </div> 

                                            </div>
                                            <div class="col-sm-1">
                                                <span id="span-max_leads_to_queue">100</span> 
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="auto_queue_level_btn" class="col-sm-4 col-form-label">Auto Queue Level</label>
                                            <div class="col-sm-8">
                                                <button type="button" id="auto_queue_level_btn" data-input="auto_queue_level" class="btn btn-sm btn-toggle NewSwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="auto_queue_level" id="auto_queue_level" value="N">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="auto_trim_queue_leads_btn" class="col-sm-4 col-form-label">Auto Trim Queue Leads</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle NewSwitchBTN" id="auto_trim_queue_leads_btn" data-input="auto_trim_queue_leads" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="auto_trim_queue_leads" id="auto_trim_queue_leads" value="N">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="queue_randomize_btn" class="col-sm-4 col-form-label">Queue Randomize</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle NewSwitchBTN" id="queue_randomize_btn" data-input="queue_randomize" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="queue_randomize" id="queue_randomize" value="N">
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                    </div>

                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6">
                                            <button type="button" data-active="faPencil" data-inactive1="faList" data-inactive2="faPhone" class="btn btn-default btn-sm btn-back"><i class="fa fa-arrow-left"></i></button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i></button>
                                        </div>   
                                    </div>
                                </form>  
                            </div>
                            <div class="tab-pane pad" id="faPhone" role="tabpanel">
                                <h4 class="page-header">Campaign Details</h4>
                                <form method="POST" action="#" accept-charset="UTF-8" id="createCampaignStepThree" autocomplete="off">


                                    <div class="pad">

                                        <div class="form-group row">
                                            <label for="dial_method" class="col-sm-3 col-form-label">Dialing Method</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="dial_method" id="dial_method">
                                                    <?php 
                                                $DialMethodList = ["RATIO" => 'Auto Dial', "INBOUND_MAN" => 'Inbound', 'MANUAL' => 'Manual Dial', 'ADAPT_TAPERED' => 'Predictive Dial'];
                                                foreach($DialMethodList as $k=>$v){
                                                ?>
                                                <option value="<?php echo $k;?>" ><?php echo $v;?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="dialing_statuses" class="col-sm-3 col-form-label">Dialing Statuses</label>
                                            <div class="col-sm-9">
                                                <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#modal-right" style="margin-bottom:5px;" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i>
              </button>
            <div class="" id="AutoALTDialing-Listing">
                
            </div>
                                                <input type="hidden" name="dialing_statuses[]" id="dialing_statuses" value=""/>
                                                    <?php
                                                        $CampaignStatus = $database->select('vicidial_campaign_statuses',['status','status_name'],['AND'=>['status[!]'=>'','campaign_id'=>NULL],'ORDER'=>['status_name'=>'ASC']]);
                                                        ?>
                                                
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="dial_speed" class="col-sm-3 col-form-label">Dial Speed</label> 
                                            <div class="col-sm-6">
                                                <div class="slidecontainer">  
                                                    <input type="range" min="0" max="500" step="1" value="5" class="range-slider rangeSlide" id="dial_speed" name="dial_speed"> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-3" style="font-weight: 600;color: #000;"><span id="span-dial_speed">2</span> lead per agent</div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="dial_timeout" class="col-sm-3 col-form-label">Dial Timeout</label>
                                            <div class="col-sm-6">
                                                <div class="slidecontainer">  
                                                    <input type="range" min="0" max="60" step="1" value="5" class="range-slider rangeSlide" name="dial_timeout" id="dial_timeout"> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-3" style="font-weight: 600;color: #000;"><span id="span-dial_timeout">15</span> seconds</div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row"> 
                                            <label for="drop_timeout" class="col-sm-3 col-form-label">Drop Timeout</label>
                                            <div class="col-sm-6">
                                                <div class="slidecontainer">  
                                                    <input type="range" min="0" max="5" step="1" value="5" class="range-slider rangeSlide" id="drop_timeout" name="drop_timeout"> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-3" style="font-weight: 600;color: #000;"><span id="span-drop_timeout">15</span> seconds</div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="outbond_number" class="col-sm-3 col-form-label">Outbond Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Number displayed to number" id="outbond_number" name="outbond_number">
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="enable_amd_btn" class="col-sm-4 col-form-label">Enable AMD</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle btn-switch SwitchBTNUpdate" id="enable_amd_btn" data-input="enable_amd_btn" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="enable_amd" id="enable_amd" value="8368">
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="record_calls_btn" class="col-sm-4 col-form-label">Record Calls</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTNREcordCall" id="record_calls_btn" data-input="record_calls" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="campaign_recording" id="campaign_recording" value="NEVER">
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <!-- <div class="form-group row">
                                          <label for="record_3rd_leg_calls_btn" class="col-sm-4 col-form-label">Record 3rd Leg Calls</label>
                                          <div class="col-sm-8">
                                                 <button type="button" class="btn btn-sm btn-toggle btn-switch" id="record_3rd_leg_calls_btn" data-input="record_3rd_leg_calls"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                           </button>
                                           <input type="hidden" name="record_3rd_leg_calls" id="record_3rd_leg_calls" value="0">
                                          </div>
                                        </div>
                                        -->
                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="BlandedCam" class="col-sm-4 col-form-label">Alt Number Dial</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTNNumberDial" id="alt_number_dial_btn" data-input="alt_number_dial" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="alt_number_dial" id="alt_number_dial" value="N">
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="BlandedCam" class="col-sm-4 col-form-label">Allow Callbacks</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle btn-switch SwitchBTNCallbacks" id="allow_callbacks_btn" data-input="allow_callbacks_btn" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="scheduled_callbacks" id="scheduled_callbacks" value="N">
                                            </div>
                                        </div>  

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="BlandedCam" class="col-sm-4 col-form-label">Pause Codes</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-sm btn-toggle btn-switch SwitchBTNPauseCode" id="pause_code" data-input="pause_code_btn" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="agent_pause_codes_active" id="agent_pause_codes_active" value="N">
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->
                                    </div>

                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6">
                                            <button type="button" data-inactive1="faPhone" data-active="faList" data-inactive2="faPencil" class="btn btn-default btn-sm btn-back"><i class="fa fa-arrow-left"></i></button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>  
                            </div>
                        </div>
                        <!-- nav tab-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->      
            </div>

            <div class="col-12 col-lg-6 col-md-6">
                <?php
                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ["ORDER" => ['campaign_id' => 'ASC'],'campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
                }else{
                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ["ORDER" => ['campaign_id' => 'ASC']]);
                }
                ?>
                <div class="row">
                    <!-- Clone campign-->
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title"> <i class="fa fa-copy"></i></a> Clone A Campaign </span>
                                <!-- nav tab-->
                            </div>
                            <div class="panel-body" id="CopyCamDiv">
                                <form method="post" action="" id="CopyCampaign">
                                    <div class="pad ">
                                        <div class="form-group row">
                                            <label for="campId" class="col-sm-3 col-form-label">ID</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="i.e 1000" id="campId" name="campId" required=""/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="campName" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 40 character" id="campName" name="campName" required=""/>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campDesc" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 40 character" id="campDesc" name="campDesc" />
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campIdCopy" class="col-sm-3 col-form-label">Clone Campaign</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="campIdCopy" required="">
                                                    <option value="">Select Campaign</option>
                                                    <?php foreach ($CampaignListings as $campaigns) { ?>
                                                        <option value="<?php echo $campaigns['campaign_id']; ?>"><?php echo $campaigns['campaign_id'].' - '.$campaigns['campaign_name']; ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                    </div>
                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6"><button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> &nbsp;Reset</button></div>
                                        <div class="col-sm-6"><button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-copy"></i> &nbsp;Clone</button></div>
                                    </div>
                                </form>  
                            </div>
                        </div>  
                    </div>
                    <!---clon camign-->

                </div>

            </div>
        </div>
        <!-- Default box -->
     
    </section>
    <!-- /.content -->
</div>

<div class="modal center-modal fade" id="modal-success" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success Message</h5>
<!--                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>-->
          </div>
          <div class="modal-body">
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your campaign has been successfully created.
              </div>
              
                <p>Campaign ID :- <span class="CampaignID"></span></p>
                <p>Campaign Name :- <span class="CampaignName"></span></p>
                
                <p><b>If you want to go on detail page ,please click on Campaign Detail Page.</b></p>
          </div>
          <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app CampaignDetailPage" href="">Campaign Detail Page</a>
          </div>
        </div>
    </div>
</div>

<div class="modal modal-right fade" id="modal-right" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Status Listings</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
            </div>
              <div class="modal-body" >
                  <?php
                  $AllStatus = $database->select('vicidial_campaign_statuses',['status','status_name'],['AND'=>['Status_Type[!]'=>'','campaign_id'=>NULL],'ORDER'=>['status_name'=>'ASC']]);
                  $AllStatus[12]['status'] = 'NEW';  
                  $AllStatus[12]['status_name'] = 'NEW LEAD';  
                  ?>
                <input type="text" class="form-control Search-AutoALTDialing" placeholder="Search Status Here...."/>
          
                <div class="media-list media-list-hover media-list-divided" style="max-height: calc(100vh - 200px);overflow-y: auto; margin-top:20px;">
                    <?php foreach($AllStatus as $statusALL){?>
                    <a class="media media-single Value-AutoALTDialing" href="#" style="font-weight: 600;" data-name="<?php echo $statusALL['status'].' - '.$statusALL['status_name'];?>" data-value="<?php echo $statusALL['status'];?>">
                          <span class="title font-size-16"><?php echo $statusALL['status'].' - '.$statusALL['status_name'];?></span>
                    </a>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-reset ClearAllSearch-AutoALTDialing">Clear All</button>
                  <!--<button type="button" class="btn btn-bold btn-pure btn-success float-right Save-AutoALTDialing">Save changes</button>-->
            </div>
          </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>

<script>
    /*SEARCH FORM*/
        $(".Search-AutoALTDialing").on("keyup", function () {
            if (this.value.length > 0) {   
              $(".Value-AutoALTDialing").hide().filter(function () {
                return $(this).data('name').toLowerCase().indexOf($(".Search-AutoALTDialing").val().toLowerCase()) != -1;
              }).show(); 
            }  
            else { 
              $(".Value-AutoALTDialing").show();
            }
        }); 
        
        
        $('.ClearAllSearch-AutoALTDialing').click(function(){
            $('.Value-AutoALTDialing').removeClass('bg-warning');
            $('#AutoALTDialing-Listing').html('');
            
            $.toast({
                    heading: 'Campaign Auto Dial Status Setting',
                    text: 'All Status has been unselect',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    showHideTransition: 'plain',
                });
        });
        
        
        $('.Value-AutoALTDialing').click(function(){
            var TextValue = $(this).find('span').text();
            if(!$(this).hasClass('bg-warning')){
                $(this).addClass('bg-warning');
                $('#AutoALTDialing-Listing').append('<span class="badge badge-lg badge-primary AutoALTDialingListings" style="margin:5px;" data-text="'+TextValue+'">'+TextValue+'</span>')
            }else{
                $(this).removeClass('bg-warning');
                $('#AutoALTDialing-Listing span[data-text="'+TextValue+'"]').remove();
            }
            
            
            var values = [];
             
            $('.Value-AutoALTDialing').each(function(){
                if($(this).hasClass('bg-warning')){
                    values.push($(this).data('value')); 
                }
            });
            
            $('#dialing_statuses').val(values);
            
        });
    
    $(function () {
        "use strict";
        $(document).ready(function () {
            $("#createCampaignStepOne").validate({
                ignore: [],
                rules: {
                    'campaign_id': {
                        required: true,
                    },
                    'campaign_name': {
                        required: true,
                    },

                },
                messages: {

                    'campaign_id': {
                        required: "Campaign id is required!",
                    },
                    'campaign_name': {
                        required: "Campaign name is required!",
                    },
                }
            });

            $("#CopyCampaign").validate({

                ignore: [],
                rules: {
                    'campId': {
                        required: true,
                    },
                    'campName': {
                        required: true,
                        maxlength: 40
                    },
                    'campDesc': {
                        required: true,
                        maxlength: 40
                    },
                    'campIdCopy': {
                        required: true,
                    },

                },
                messages: {

                    'campId': {
                        required: "Campaign id is required!",
                    },
                    'campName': {
                        required: "Campaign name is required!",
                        maxlength: "Maximum 40 character allowed!"
                    },
                    'campDesc': {
                        required: "Description is required!",
                        maxlength: "Maximum 40 character allowed!"
                    },
                    'campIdCopy': {
                        required: "Choose to copy campaign",
                    },
                }
            });
        });




        $(document).on('submit', '#createCampaignStepOne', function (e) {
            e.preventDefault();
            var FormStepOne = $('#createCampaignStepOne').serialize();
            $('#faPencil').removeClass('active');
            $('[href*="faPencil"]').removeClass('active');
            $('#faList').addClass('active');
            $('[href*="faList"]').addClass('active');
            $('#faPhone').removeClass('active');
            $('[href*="faPhone"]').removeClass('active');

        });

        $(document).on('submit', '#createCampaignStepTwo', function (e) {
            e.preventDefault();
            var FormStepTwo = $('#createCampaignStepTwo').serialize();
            $('#faPencil').removeClass('active');
            $('[href*="faPencil"]').removeClass('active');
            $('#faList').removeClass('active');
            $('[href*="faList"]').removeClass('active');
            $('#faPhone').addClass('active');
            $('[href*="faPhone"]').addClass('active');
        });

        $(document).on('submit', '#createCampaignStepThree', function (e) {
            e.preventDefault();
            var FormStepOne = $('#createCampaignStepOne').serialize();
            var FormStepTwo = $('#createCampaignStepTwo').serialize();
            var FormStepThree = $('#createCampaignStepThree').serialize();

            var postData = FormStepOne + "&" + FormStepTwo + "&" + FormStepThree;
            var CampaignID = $('#campaign_id').val();
            var CampaignName = $('#campaign_name').val();
            if(CampaignID && CampaignName){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax')?>?action=AddCampaign',
                    data: postData, // serializes the form's elements.
                    success: function (data) {
                       
                        var result = JSON.parse(data);
                        if(result.success === 1){
                            
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: 'Campaign has been successfully added!!',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
//                        setTimeout(function(){ window.location.reload(); }, 1500);

                     $('#createCampaignStepOne')[0].reset();
                     $('#createCampaignStepTwo')[0].reset();
                     $('#createCampaignStepThree')[0].reset();
                     $('#modal-success').modal('show');
                     
                     $('.CampaignID').html(result.data.CampaignID);
                     $('.CampaignName').html(result.data.CampaignName);
                     
                    $('.CampaignDetailPage').attr('href','edit?campaign_id='+result.data.CampaignID);
                     $('.AddCampaignTab a[href="#faPencil"]').trigger('click');
                 }else{
                    $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: 'Campaign ID already exist!!',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        }); 
        }
                    }
                });
            }else{
                $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: 'Campaign ID & Campaign Name is Mandatory!!',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('.AddCampaignTab a[href="#faPencil"]').trigger('click');
                        $('#btn-formStepOne').click();
            }

        });
//        
        $(document).on('click', '.btn-back', function (e) {
            var curr = $(this).attr('data-active');
            var inactive1 = $(this).attr('data-inactive1');
            var inactive2 = $(this).attr('data-inactive2');


            $('#' + curr).addClass('active');
            $('[href*="' + curr + '"]').addClass('active');

            $('#' + inactive1).removeClass('active');
            $('[href*="' + inactive1 + '"]').removeClass('active');

            $('#' + inactive2).removeClass('active');
            $('[href*="' + inactive2 + '"]').removeClass('active');

        });
//		
//
        $(document).on('click', '.btn-switch', function (e) {
            var input = $(this).attr('data-input');
            var val = 0;
            if ($(this).hasClass('active')) {
                val = "1"
            }
            $('#' + input).val(val);
            var attr = $(this).attr('data-field');
            if (typeof attr !== typeof undefined && attr !== false) {
                var fields = $(this).attr('data-field');
                var Arr = fields.split(',');
                $.each(Arr, function (index, value) {
                    if (val == 1) {
                        $('#' + value + '-row').removeClass('hidden-row');
                    } else {
                        $('#' + value + '-row').addClass('hidden-row');
                    }

                });
            }
        });
// 
        $(document).on('input', '.rangeSlide', function () {
            var elem = $(this).attr('id');
            var val = $(this).val();
            $('#span-' + elem).text(val);

        });

// Copy campaign
        $(document).on('submit', '#CopyCampaign', function (e) {
            e.preventDefault();

            var form = $(this);
            var url = '<?php echo base_url('campaigns/ajax')?>?action=CopyCampaign';
   
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data){
                    var result = JSON.parse(data);
                    if(result.success === 1){
                       $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    }); 
                     $('#CopyCampaign')[0].reset();
                     $('#modal-success').modal('show');
                     $('.CampaignID').html(result.data.CampaignID);
                     $('.CampaignName').html(result.data.CampaignName);
                     $('.CampaignDetailPage').attr('href','edit?campaign_id='+result.data.CampaignID);
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
        });

    });// Function end   
    
    
    
    
    
    $(document).ready(function(){
    $('.NewSwitchBTN').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('Y');
            }else{
                $(this).parent().find('input').val('N');
            }
        });
        
        $('.SwitchBTNUpdate').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('8369');
            }else{
                $(this).parent().find('input').val('8368');
            }
        });
        
        $('.SwitchBTNCallbacks').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('Y');
            }else{
                $(this).parent().find('input').val('N');
            }
        });
        
        $('.SwitchBTNREcordCall').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('ALLFORCE');
            }else{
                $(this).parent().find('input').val('NEVER');
            }
        });
        
        $('.SwitchBTNNumberDial').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('Y');
            }else{
                $(this).parent().find('input').val('N');
            }
        });
        
        $('.SwitchBTNPauseCode').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('input').val('Y');
            }else{
                $(this).parent().find('input').val('N');
            }
        });

    });
</script>
<?php } ?>
