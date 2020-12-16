<?php
if (!checkRole('campaigns', 'edit')) {
    no_permission();
} else {
    $CampaignID = $_GET['campaign_id'];
    $CampaignDetail = $database->get('vicidial_campaigns', '*', ['campaign_id' => $CampaignID]);
    $CountQuery = "select COUNT('*') AS online,SUM(CASE WHEN status = 'INCALL' THEN 1 ELSE 0 END) AS talking,SUM(CASE WHEN status = 'READY' THEN 1 ELSE 0 END) AS waiting,SUM(CASE WHEN status = 'CLOSER' THEN 1 ELSE 0 END) AS wrap,SUM(CASE WHEN status = 'PAUSED' THEN 1 ELSE 0 END) AS pause from vicidial_live_agents where campaign_id = " . $CampaignID;
    $liveCount = $database->query($CountQuery)->fetchAll(PDO::FETCH_ASSOC);

    /* Today Latest Sales */
    $closer_campaigns = $CampaignDetail['closer_campaigns'];
    $CloserCampaignsSearch = "'".str_replace(" ","','",trim(rtrim($closer_campaigns,'-')))."'";

    $database->select('vicidial_campaign_statuses', '*');

    $start = $end = date('Y-m-d');
//    $start = $end = '2020-02-25';
    $CampaignArray = [];

    /* Statics */

$ListListings = $database->select('vicidial_lists','list_id',['campaign_id'=>$CampaignID]);

//$rateSql = "select a.list_id as list_id,sum(a.Calls) as Calls,sum(a.Connects) as Connects,ROUND(Connects/Calls*100,2) as ConnectRate,sum(a.DMCs) as DMCs,ROUND(DMCs/Connects*100,2) as DMCRate,
//sum(a.Sales) as Sales,ROUND(Sales/DMCs*100,2) as ConversionRate,sum(Completed) as Completed,sum(ManDials) as ManDials,sum(Drops) as Drops,ROUND((Drops/Calls)*100,2) as DROP_Percentage,
//sum(a.A) as A,ROUND((a.A/a.Calls)*100,2) as A_Percentage,sum(a.Not_Answer) as Not_Answer,ROUND((Not_Answer/Calls)*100,2) as NA_Percentage
//from
//(select VC.list_id,
//sum(case when VC.status is not null and (VC.comments NOT IN ('CHAT','EMAIL') OR VC.comments IS NULL) then 1 else 0 end) as Calls,
//sum(case when VC.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
//sum(case when VC.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
//sum(case when VC.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
//sum(case when VC.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
//sum(case when VC.comments='MANUAL' then 1 else 0 end) as ManDials,
//sum(case when VC.status='DROP' then 1 else 0 end) as Drops,
//sum(case when VC.status='A' then 1 else 0 end) as A,
//sum(case when VC.status='NA' then 1 else 0 end) as Not_Answer
//from vicidial_closer_log VC
//WHERE (VC.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23')
//#AND VC.user != 'VDAD'
//group by VC.list_id
//union
//select VL.list_id,
//sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
//sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
//sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
//sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
//sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
//sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
//sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
//sum(case when VL.status='A' then 1 else 0 end) as A,
//sum(case when VL.status='NA' then 1 else 0 end) as Not_Answer
//from vicidial_log VL
//WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23')
//#AND VL.user != 'VDAD'
//group by VL.list_id) a
//where a.list_id IN ('".implode("','",$ListListings)."')";

$rateSql = "select sum(a.Calls) as Calls,sum(a.Connects) as Connects,ROUND(sum(a.Connects)/sum(a.Calls)*100,2) as ConnectRate,sum(a.DMCs) as DMCs,ROUND(sum(a.DMCs)/sum(a.Connects)*100,2) as DMCRate,
sum(a.Sales) as Sales,ROUND(sum(a.Sales)/sum(a.DMCs)*100,2) as ConversionRate,sum(Completed) as Completed,sum(ManDials) as ManDials,sum(Drops) as Drops,ROUND((sum(a.Drops)/sum(a.Connects))*100,2) as DROP_Percentage,

sum(a.A) as A,ROUND((sum(a.A)/sum(a.Calls))*100,2) as A_Percentage,sum(a.Not_Answer) as Not_Answer,ROUND((sum(a.Not_Answer)/sum(a.Calls))*100,2) as NA_Percentage
from
(select
IFNULL(sum(case when VC.status is not null and (VC.comments NOT IN ('CHAT','EMAIL') OR VC.comments IS NULL) then 1 else 0 end),0) as Calls,

IFNULL(sum(case when VC.status in (select status from vicidial_campaign_statuses where human_answered = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where human_answered = 'Y') then 1 else 0 end),0) as Connects,
IFNULL(sum(case when VC.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where customer_contact = 'Y') then 1 else 0 end),0) as DMCs,
IFNULL(sum(case when VC.status in (select status from vicidial_campaign_statuses where Sale = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where sale = 'Y') then 1 else 0 end),0) as Sales,
IFNULL(sum(case when VC.status in (select status from vicidial_campaign_statuses where completed = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where completed = 'Y') then 1 else 0 end),0) as Completed,
IFNULL(sum(case when VC.comments='MANUAL' then 1 else 0 end),0) as ManDials,
IFNULL(sum(case when VC.status='DROP' then 1 else 0 end),0) as Drops,
IFNULL(sum(case when VC.status='A' then 1 else 0 end),0) as A,
IFNULL(sum(case when VC.status='NA' then 1 else 0 end),0) as Not_Answer
from vicidial_closer_log VC
WHERE (VC.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23' AND VC.campaign_id IN (".$CloserCampaignsSearch."))
union
select
sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y' AND campaign_id = '".$CampaignID."' UNION select status from vicidial_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A,
sum(case when VL.status='NA' then 1 else 0 end) as Not_Answer
from vicidial_log VL
WHERE VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23' AND VL.campaign_id = '".$CampaignID."') a";

    $statistics = $database->query($rateSql)->fetchAll(PDO::FETCH_ASSOC);

//<<<<<<< HEAD
$statistics[0]['DROP_Percentage'] = get_campaigns_DROP_RATE($database, $CampaignID);
//=======
//>>>>>>> 6ecee07d15e5cbddf4ae8acbd591604f1cac0b25
    $campaignStatus = $database->query("SELECT * FROM `vicidial_campaign_statuses` WHERE (campaign_id is NULL OR campaign_id = '".$CampaignID."') AND Status_Type is NOT NULL")->fetchAll(PDO::FETCH_ASSOC);

//    $AllStatus = $database->query("SELECT * FROM `vicidial_campaign_statuses` WHERE (campaign_id is NULL OR campaign_id = '".$CampaignID."') AND Status_Type is NOT NULL ORDER BY status ASC")->fetchAll(PDO::FETCH_ASSOC);
    $AllStatus = $database->query("SELECT
status,status_name,campaign_id,Status_Type
FROM
vicidial_campaign_statuses
WHERE
(campaign_id is NULL AND Status_Type is NULL)
OR
(campaign_id is NULL AND Status_Type is NOT NULL)
OR
(campaign_id = ".$CampaignID." AND Status_Type is NOT NULL) ORDER BY status ASC")->fetchAll(PDO::FETCH_ASSOC);
    $AllStatus1 = $database->query("SELECT * FROM `vicidial_campaign_statuses` WHERE (campaign_id is NULL OR campaign_id = '".$CampaignID."') AND Status_Type is NOT NULL ORDER BY status ASC")->fetchAll(PDO::FETCH_ASSOC);
//    $AllStatus1[] = ['status'=>'NEW','status_name'=>'New Lead'];

//    $VicidialStatus = $database->select('vicidial_statuses',['status','status_name']);
//
//    foreach($VicidialStatus as $statusVicidial){
//        $AllStatus[] = $statusVicidial;
//    }

    $leadRecyle = $database->select('vicidial_lead_recycle', '*', ['campaign_id' => $CampaignID]);
    $pause_codes = $database->select('vicidial_pause_codes', '*', ['campaign_id' => $CampaignID]);

    /*Today Latest Sales*/
    $querySale = "SELECT VU.full_name,VL.phone_number,VAL.event_time,VL.comments,VAL.lead_id,VL.entry_date FROM vicidial_agent_log VAL
JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id
JOIN vicidial_users VU ON VU.user = VAL.user
WHERE
VAL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND
VAL.campaign_id = '".$CampaignID."' AND
VAL.lead_id is NOT NULL AND
VAL.status IN (SELECT status FROM vicidial_campaign_statuses WHERE sale='Y')";

    $TodaySale = $database->query($querySale)->fetchAll(PDO::FETCH_ASSOC);
    if($_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $UserGroup = $database->select('vicidial_user_groups',['user_group','group_name'],['ORDER'=>['user_group'=>'ASC']]);
    }else{
        $UserGroup = $database->select('vicidial_user_groups',['user_group','group_name'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER'=>['user_group'=>'ASC']]);
    }
    ?>
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
    <div class="content-wrapper" style="min-height: 319.907px;">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <?php
        $talking = ($liveCount[0]['talking']) ? $liveCount[0]['talking'] : 0;
        $waiting = ($liveCount[0]['waiting']) ? $liveCount[0]['waiting'] : 0;
        $pause = ($liveCount[0]['pause']) ? $liveCount[0]['pause'] : 0;
        $wrap = ($liveCount[0]['wrap']) ? $liveCount[0]['wrap'] : 0;

        $online = $talking + $waiting + $pause + $wrap;
        ?>
        <section class="content">

            <div class="row">
                <div class="col-xl-1 col-md-6 col-12"></div>
                <div class="col-xl-2 col-md-6 col-12">
                    <div class="box box-body">
                        <h6 class="text-uppercase">Online</h6>
                        <div class="flexbox mt-2">
                            <span class="fa fa-user-plus text-danger font-size-40"></span>
                            <span class=" font-size-30"><?php echo $online; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xl-2 col-md-6 col-12">
                    <div class="box box-body">
                        <h6 class="text-uppercase">Talking</h6>
                        <div class="flexbox mt-2">
                            <span class="fa fa-phone text-info font-size-40"></span>
                            <span class=" font-size-30"><?php echo $talking; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-xl-2 col-md-6 col-12">
                    <div class="box box-body">
                        <h6 class="text-uppercase">Waiting</h6>
                        <div class="flexbox mt-2">
                            <span class="fa fa-clock-o font-size-40 text-primary"></span>
                            <span class=" font-size-30"><?php echo $waiting; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xl-2 col-md-6 col-12">
                    <div class="box box-body">
                        <h6 class="text-uppercase">Paused</h6>
                        <div class="flexbox mt-2">
                            <span class="fa fa-pause font-size-40 text-success"></span>
                            <span class=" font-size-30"><?php echo $pause; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xl-2 col-md-6 col-12">
                    <div class="box box-body">
                        <h6 class="text-uppercase">Wrap</h6>
                        <div class="flexbox mt-2">
                            <span class="fa fa-edit font-size-40 text-success"></span>
                            <span class=" font-size-30"><?php echo $wrap; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xl-1 col-md-6 col-12"></div>

            </div>

            <div class="row">
                <div class="col-12">

                    <div class="panel">
                        <!-- /.box-header -->

                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-book"></i></a> Campaign : <strong><?php echo $CampaignDetail['campaign_name']; ?></strong></span>
                            <!-- nav tab-->

                                <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#tabDashboard" role="tab" aria-selected="true" title="Summary Dashboard"><span class="fa fa-dashboard"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabSetting" role="tab" aria-selected="false" title="Setting"><span class="fa fa-gears"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabPauseCode" data-pop="popover" title="Pause Code" data-content="Manage the pause code for this campaign" role="tab" data-original-title="Pause Code" aria-selected="false"><span class="fa fa-pause"></span></a> </li>
                                    <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabOutNum" role="tab" aria-selected="false" title="Outbound Number"><span class="fa fa-mobile"></span></a> </li>-->
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabCampStatus" data-pop="popover" title="Status" data-content="Manage the Status for this campaign" role="tab" data-original-title="Campaign Status" aria-selected="false"><span class="fa fa-tag"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabRcRule" data-pop="popover" title="Recycle Rule" data-content="Manage the recycle rule for this campaign" role="tab" aria-selected="false" data-original-title="Recycle Rules"><span class="fa fa-clock-o"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tagDB" role="tab" aria-selected="false"><span class="fa fa-database"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tagSurvey" role="tab" aria-selected="false" title="Survey"><span class="fa fa-bar-chart"></span></a> </li>

                                </ul>

                        </div>

                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="tabDashboard" role="tabpanel">
                                    <?php require 'manage/dashboard.php'; ?>
                                </div>
                                <div class="tab-pane" id="tabSetting" role="tabpanel">
                                    <?php require 'manage/setting.php'; ?>
                                </div>
                                <div class="tab-pane" id="tabRcRule" role="tabpanel">
                                    <?php require 'manage/rule.php'; ?>
                                </div>
                                <div class="tab-pane" id="tabCampStatus" role="tabpanel">
                                    <?php require 'manage/status.php'; ?>
                                </div>
                                <!--<div class="tab-pane" id="tabOutNum" role="tabpanel">-->
                                    <?php // require 'manage/outbound.php'; ?>
                                <!--</div>-->
                                <div class="tab-pane" id="tabPauseCode" role="tabpanel">
                                    <?php require 'manage/pause.php'; ?>
                                </div>
                                <div class="tab-pane" id="tagDB" role="tabpanel">
                                    <?php require 'manage/db.php'; ?>
                                </div>
                               <div class="tab-pane" id="tagSurvey" role="tabpanel">
                                    <?php require 'manage/survey.php'; ?>
                                </div>
                                <!-- nav tab-->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div></section>
        <!-- /.content -->
    </div>
    <div class="modal center-modal fade" id="RecycleRule-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-center"><i class="fa fa-headphones"></i> Recycle Rule</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" name="" action="" autocomplete="OFF" id="RecycleRuleForm">
                                <input type="hidden" name="campaign" value="<?php echo $CampaignDetail['campaign_id']; ?>"/>
                                <div class="box ">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="CampaignName">Status</label>
                                            <select class="form-control" name="status" required="">
                                                <option value="">Select Option</option>
                                                <?php foreach ($AllStatus as $cst) { ?>
                                                    <option value="<?php echo $cst['status']; ?>"><?php echo $cst['status'].' - '.$cst['status_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="fileMusic">Time Delay</label>
                                            <input type="text" class="form-control" id="attempt_delay" name="attempt_delay" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label for="fileMusic">Max Attempts</label>
                                            <div class="slidecontainer">
                                                <input type="range" min="1" max="10" step="1"  value=""
                                                       class="range-slider rangeSlide RcR-rangeSlider" name="attempt_maximum" value="1"/>
                                            </div>
                                            <span  id="sapn-attempt_maximum">1</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="fileMusic">Active</label>
                                            <button type="button" class="btn btn-toggle RecycleRuleStatus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                            <input type="hidden" name="active" value="N" id="RecycleRuleStatus"/>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                            <div class="col-sm-6">
                                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" id="" class="btn btn-success btn-sm pull-right">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--            <div class="modal-footer modal-footer-uniform">
                                  <button type="button" class="btn btn-success btn-app float-right" data-dismiss="modal">Close</button>
                            </div>-->
            </div>
        </div>
    </div>

<div class="modal center-modal fade" id="modal-audio" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"><a  href="#" class="box-icon"><i class="fa fa-headphones"></i></a> Audio File Upload</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="" action="" autocomplete="OFF" id="FormuploadMusic_OLD" enctype="multipart/form-data">
                        <input type="hidden" name="music-file-selected" value="" id="AlreadyMusicFileSelected"/>
                        <div class="box ">
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
                                <div class="row bt-1 border-primary" style="padding-top: 12px;">
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
<!--                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
                </div>-->
            </div>
        </div>
    </div>

<!--Modal-->
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

                <input type="text" class="form-control" placeholder="Search Status Here...." id="Search-Status"/>

                <div class="media-list media-list-hover media-list-divided" style="max-height: calc(100vh - 200px);overflow-y: auto; margin-top:20px;">
                    <?php
                    $existArray = [];
                    foreach($AllStatus as $statusALL){
                         if(in_array($statusALL['status'], $existArray)){
                            continue;
                        }
                        $existArray[] = $statusALL['status'];
                        ?>
                    <?php if(in_array($statusALL['status'],$DialStatus)){?>
                    <a class="media media-single StatusListingModal bg-warning" href="#" style="font-weight: 600;" data-name="<?php echo $statusALL['status'].' - '.$statusALL['status_name'];?>" data-value="<?php echo $statusALL['status'];?>">
                          <span class="title font-size-16"><?php echo $statusALL['status'].' - '.$statusALL['status_name'];?></span>
                    </a>
                    <?php }else{?>
                    <a class="media media-single StatusListingModal" href="#" style="font-weight: 600;" data-name="<?php echo $statusALL['status'].' - '.$statusALL['status_name'];?>" data-value="<?php echo $statusALL['status'];?>">
                          <span class="title font-size-16"><?php echo $statusALL['status'].' - '.$statusALL['status_name'];?></span>
                    </a>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-reset ClearAllSearch">Clear All</button>
                  <button type="button" class="btn btn-bold btn-pure btn-success float-right StatusListSave">Save changes</button>
            </div>
          </div>
    </div>
</div>

<div class="modal modal-right fade" id="InboundRight-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Inbound Group Listings</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
            </div>
              <div class="modal-body" >

                <input type="text" class="form-control SearchListings" placeholder="Search Inbound Group Here...."/>

                <div class="media-list media-list-hover media-list-divided" style="max-height: calc(100vh - 200px);overflow-y: auto; margin-top:20px;">
                     <?php foreach ($InboundGroup as $groups) { ?>
                    <?php if(in_array($groups['group_id'], $InboundXFERgroups)){?>
                    <a class="media media-single SearchListing-Value bg-warning" href="#" style="font-weight: 600;" data-name="<?php echo $groups['group_id'].' - '.$groups['group_name']; ?>" data-value="<?php echo $groups['group_id']; ?>">
                          <span class="title font-size-16"><?php echo $groups['group_id'].' - '.$groups['group_name']; ?></span>
                    </a>
                    <?php }else{?>
                    <a class="media media-single SearchListing-Value" href="#" style="font-weight: 600;" data-name="<?php echo $groups['group_id'].' - '.$groups['group_name']; ?>" data-value="<?php echo $groups['group_id']; ?>">
                          <span class="title font-size-16"><?php echo $groups['group_id'].' - '.$groups['group_name']; ?></span>
                    </a>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-reset ClearAllSearch-IG">Clear All</button>
                  <button type="button" class="btn btn-bold btn-pure btn-success float-right Save-IG">Save changes</button>
            </div>
          </div>
    </div>
</div>

<div class="modal modal-right fade" id="InboundRight-Modal-IG" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Inbound Group Listings</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
            </div>
              <div class="modal-body" >
                  <?php
                  $XFERgroups = array();
                if ($CampaignDetail['xfer_groups'] != '') {
                    $xfergrp = preg_replace("/ -$/", "", $CampaignDetail['xfer_groups']);
                    $XFERgroups = explode(" ", $xfergrp);
                }
        ?>
                <input type="text" class="form-control SearchListings-TG" placeholder="Search Inbound Group Here...."/>

                <div class="media-list media-list-hover media-list-divided" style="max-height: calc(100vh - 200px);overflow-y: auto; margin-top:20px;">
                     <?php foreach ($InboundGroups as $groups) { ?>
                    <?php if(in_array($groups['group_id'], $XFERgroups)){?>
                    <a class="media media-single SearchListing-Value-TG bg-warning" href="#" style="font-weight: 600;" data-name="<?php echo $groups['group_id'].' - '.$groups['group_name']; ?>" data-value="<?php echo $groups['group_id']; ?>">
                          <span class="title font-size-16"><?php echo $groups['group_id'].' - '.$groups['group_name']; ?></span>
                    </a>
                    <?php }else{?>
                    <a class="media media-single SearchListing-Value-TG" href="#" style="font-weight: 600;" data-name="<?php echo $groups['group_id'].' - '.$groups['group_name']; ?>" data-value="<?php echo $groups['group_id']; ?>">
                          <span class="title font-size-16"><?php echo $groups['group_id'].' - '.$groups['group_name']; ?></span>
                    </a>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-reset ClearAllSearch-TG">Clear All</button>
                  <button type="button" class="btn btn-bold btn-pure btn-success float-right Save-TG">Save changes</button>
            </div>
          </div>
    </div>
</div>


<div class="modal modal-right fade" id="AutoALTDialing-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Status Listings</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
            </div>
              <div class="modal-body" >

                <input type="text" class="form-control Search-AutoALTDialing" placeholder="Search Status Here...."/>

                <div class="media-list media-list-hover media-list-divided" style="max-height: calc(100vh - 200px);overflow-y: auto; margin-top:20px;">
                    <?php

                    foreach($AllStatus1 as $statusALL){


                        ?>
                    <?php if(in_array($statusALL['status'],$Arr_autost)){?>
                    <a class="media media-single Value-AutoALTDialing bg-warning" href="#" style="font-weight: 600;" data-name="<?php echo $statusALL['status'].' - '.$statusALL['status_name'];?>" data-value="<?php echo $statusALL['status'];?>">
                          <span class="title font-size-16"><?php echo $statusALL['status'].' - '.$statusALL['status_name'];?></span>
                    </a>
                    <?php }else{?>
                    <a class="media media-single Value-AutoALTDialing" href="#" style="font-weight: 600;" data-name="<?php echo $statusALL['status'].' - '.$statusALL['status_name'];?>" data-value="<?php echo $statusALL['status'];?>">
                          <span class="title font-size-16"><?php echo $statusALL['status'].' - '.$statusALL['status_name'];?></span>
                    </a>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-reset ClearAllSearch-AutoALTDialing">Clear All</button>
                  <button type="button" class="btn btn-bold btn-pure btn-success float-right Save-AutoALTDialing">Save changes</button>
            </div>
          </div>
    </div>
</div>
<!--Modal-->

<!--AUDIO UPLOAD START-->
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
<!--AUDIO UPLOAD END-->

    <script>

        /*Inbound Group*/

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
        });



        $(document).on('click','.Save-AutoALTDialing',function(){
             var values = [];

            $('.Value-AutoALTDialing').each(function(){
                if($(this).hasClass('bg-warning')){
                    values.push($(this).data('value'));
                }
            });

            var id = '<?php echo $CampaignDetail['campaign_id']; ?>';
                var name = 'auto_alt_dial_statuses';
                var val = values;


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'select'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#AutoALTDialing-Modal').modal('hide');
                    TweenMax.staggerFrom(".AutoALTDialingListings", .5, {top:100, opacity:0, delay:1, ease:Back.easeOut}, 0.1);
                    $.toast({
                        heading: 'Campaign Auto Dial Status Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });





        /*SEARCH FORM*/
        $(".SearchListings").on("keyup", function () {
            if (this.value.length > 0) {
              $(".SearchListing-Value").hide().filter(function () {
                return $(this).data('name').toLowerCase().indexOf($(".SearchListings").val().toLowerCase()) != -1;
              }).show();
            }
            else {
              $(".SearchListing-Value").show();
            }
        });


        $('.ClearAllSearch-IG').click(function(){
            $('.SearchListing-Value').removeClass('bg-warning');
            $('#Inbound-Group-Listing').html('');
            $.toast({
                    heading: 'Campaign Inbound Group Setting',
                    text: 'All Inbound Group has been unselect',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    showHideTransition: 'plain',
                });
        });


        $('.SearchListing-Value').click(function(){
            var TextValue = $(this).find('span').text();
            if(!$(this).hasClass('bg-warning')){
                $(this).addClass('bg-warning');
                $('#Inbound-Group-Listing').append('<span class="badge badge-lg badge-primary InboundGroupListings" style="margin:5px;" data-text="'+TextValue+'">'+TextValue+'</span>')
            }else{
                $(this).removeClass('bg-warning');
                $('#Inbound-Group-Listing span[data-text="'+TextValue+'"]').remove();
            }
        });



        $(document).on('click','.Save-IG',function(){
             var values = [];

            $('.SearchListing-Value').each(function(){
                if($(this).hasClass('bg-warning')){
                    values.push($(this).data('value'));
                }
            });

            var id = '<?php echo $CampaignDetail['campaign_id']; ?>';
                var name = 'closer_campaigns';
                var val = values;


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'select'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#InboundRight-Modal').modal('hide');
                    TweenMax.staggerFrom(".InboundGroupListings", .5, {top:100, opacity:0, delay:1, ease:Back.easeOut}, 0.1);
                    $.toast({
                        heading: 'Campaign Inbound Group Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        /*INBOUND GROUP END*/







        /*Transfer Group*/

        /*SEARCH FORM*/
        $(".SearchListings-TG").on("keyup", function () {
            if (this.value.length > 0) {
              $(".SearchListing-Value-TG").hide().filter(function () {
                return $(this).data('name').toLowerCase().indexOf($(".SearchListings-TG").val().toLowerCase()) != -1;
              }).show();
            }
            else {
              $(".SearchListing-Value-TG").show();
            }
        });


        $('.ClearAllSearch-TG').click(function(){
            $('.SearchListing-Value-TG').removeClass('bg-warning');
            $('#Transfer-Group-Listing').html('');
            $.toast({
                    heading: 'Campaign Transfer Group Setting',
                    text: 'All Transfer Group has been unselect',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    showHideTransition: 'plain',
                });
        });


        $('.SearchListing-Value-TG').click(function(){
            var TextValue = $(this).find('span').text();
            if(!$(this).hasClass('bg-warning')){
                $(this).addClass('bg-warning');
                $('#Transfer-Group-Listing').append('<span class="badge badge-lg badge-primary TransferGroupListings" style="margin:5px;" data-text="'+TextValue+'">'+TextValue+'</span>')
            }else{
                $(this).removeClass('bg-warning');
                $('#Transfer-Group-Listing span[data-text="'+TextValue+'"]').remove();
            }
        });



        $(document).on('click','.Save-TG',function(){
             var values = [];

            $('.SearchListing-Value-TG').each(function(){
                if($(this).hasClass('bg-warning')){
                    values.push($(this).data('value'));
                }
            });

            var id = '<?php echo $CampaignDetail['campaign_id']; ?>';
                var name = 'xfer_groups';
                var val = values;


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'select'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#InboundRight-Modal').modal('hide');
                    TweenMax.staggerFrom(".TransferGroupListings", .5, {top:100, opacity:0, delay:1, ease:Back.easeOut}, 0.1);
                    $.toast({
                        heading: 'Campaign Tansfer Group Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        /*Transfer GROUP END*/













        $(document).ready(function () {

            $("#Search-Status").on("keyup", function () {
            if (this.value.length > 0) {
              $(".StatusListingModal").hide().filter(function () {
                return $(this).data('name').toLowerCase().indexOf($("#Search-Status").val().toLowerCase()) != -1;
              }).show();
            }
            else {
              $(".StatusListingModal").show();
            }
            });

        });

        $('.ClearAllSearch').click(function(){
            $('.StatusListingModal').removeClass('bg-warning');
            $('#Call-Status-listing').html('');
            $.toast({
                    heading: 'Campaign Status Setting',
                    text: 'All status has been unselect',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    showHideTransition: 'plain',
                });
        });


        $(document).on('input', '.rangeSlide', function () {
            var val = $(this).val();
            $('#sapn-attempt_maximum').text(val);
            $('#span-hopper_level').text(val);
        });


        $(document).on('click','.StatusListSave',function(){
             var values = [];
//             var valu = $('.StatusListingModal').find('.active').attr('data-value');

            $('.StatusListingModal').each(function(){
                if($(this).hasClass('bg-warning')){
                    values.push($(this).data('value'));
                }
            });

            var id = '<?php echo $CampaignDetail['campaign_id']; ?>';
                var name = 'dial_statuses';
                var val = values;


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'select'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#modal-right').modal('hide');
                    TweenMax.staggerFrom(".DialStatusListings", .5, {top:100, opacity:0, delay:1, ease:Back.easeOut}, 0.1);
                    $.toast({
                        heading: 'Campaign Status Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });
//        $(document).on('input', '.SliderRange', function () {
//            var val = $(this).val();
//            alert(val);
//            $('#sapn-attempt_maximum').text(val);
//            $('#span-hopper_level').text(val);
//        });

        $(document).on('input', '.rangeSlideCall', function () {
            var val = $(this).val();
            $(this).parent().parent().parent().find('span').html(val);
        });
        $(function () {
            "use strict";
            //Initialize Select2 Elements
            $('.select2').select2();

            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token
                }
            });

            $('#dashboard-table').DataTable({
                dom: 'Bfrtip',
                ordering: true,
                paging: true,
                lengthChange: false,
                searching: false,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

        $(document).on('focusout', '.manage-field-text', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'text'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('focusout', '.manage-field-text-change', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'text'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });


        $(document).on('change', '.manage-field-select', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var val = $(this).val();

            if (name == 'dial_method') {
                if (val == 'INBOUND_MAN' || val == 'MANUAL') {
                    $('.Only-Agents').hide();
                } else {
                    $('.Only-Agents').show();
                }
            }


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'select'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('click', '.manage-field-switch', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            $('#start_stop_recording_btn_msg').hide();
            $('#campaign_recording_btn_msg').hide();

            if(name=='campaign_recording') {
              if($('#start_stop_recording_btn').hasClass('active')) {
                $('#campaign_recording_btn').removeClass('active');
                $('#campaign_recording_btn_msg').show();
                return false;
              }
            }
            if(name=='start_stop_recording') {
              if($('#campaign_recording_btn').hasClass('active')) {
                $('#start_stop_recording_btn').removeClass('active');
                $('#start_stop_recording_btn_msg').show();
                return false;
              }
            }

            if ($(this).hasClass('active')) {
                if (name == 'web_form_target') {
                    val = '_blank';
                } else if (name == 'get_call_launch') {
                    val = 'WEBFORM';
                } else if (name == 'get_call_launch1') {
                    val = 'SCRIPT';
                    var name = 'get_call_launch';
                } else if (name == 'inbound_queue_no_dial') {
                    val = 'ALL_SERVERS';
                } else if (name == 'view_calls_in_queue') {
                    val = 'ALL';
                } else if (name == 'enable_xfer_presets') {
                    val = 'ENABLED';
                } else if (name == 'campaign_vdad_exten') {
                    val = '8369';
                } else if (name == 'campaign_recording') {
                    val = 'ALLFORCE';
                } else if (name == 'auto_alt_dial') {
                    val = 'ALT_ONLY'
                } else if (name == 'agent_dial_owner_only') {
                    val = 'USER_BLANK'
                } else if (name == 'scheduled_callbacks') {
                    val = 'Y';
                    $('.CallBackSection').show();
                }else if(name == 'start_stop_recording'){
                    var name = 'campaign_recording';
                    val = 'ONDEMAND';
                }else if(name == 'list_order_mix'){
                     val = 'SQL';
                }else if(name == 'allow_mail_expire_on_pause_code'){
                    val = 'Y';
                    $('.allow_mail_expire_on_pause_code').show();
                } else if(name == 'tags'){
                  val = '1';
                } else if(name == 'call_timer'){
                  val = '1';
                } else {
                    val = 'Y';
                }

            } else {

                if (name == 'web_form_target') {
                    val = '';
                } else if (name == 'get_call_launch') {
                    val = 'NONE';
                } else if (name == 'get_call_launch1') {
                    val = 'NONE';
                    var name = 'get_call_launch';
                } else if (name == 'inbound_queue_no_dial') {
                    val = 'DISABLED'
                } else if (name == 'view_calls_in_queue') {
                    val = 'NONE'
                } else if (name == 'enable_xfer_presets') {
                    val = 'DISABLED'
                } else if (name == 'campaign_vdad_exten') {
                    val = '8368'
                } else if (name == 'campaign_recording') {
                    val = 'NEVER'
                } else if (name == 'three_way_dial_prefix') {
                    val = ''
                } else if (name == 'auto_alt_dial') {
                    val = 'NONE'
                } else if (name == 'agent_dial_owner_only') {
                    val = 'NONE'
                } else if (name == 'scheduled_callbacks') {
                    val = 'N';
                    $('.CallBackSection').hide();
                }else if(name == 'start_stop_recording'){
                    var name = 'campaign_recording';
                    val = 'NEVER';
                }else if(name == 'list_order_mix'){
                     val = 'DISABLED';
                }else if(name == 'allow_mail_expire_on_pause_code'){
                    val = 'N';
                    $('.allow_mail_expire_on_pause_code').hide();
                } else if(name == 'tags'){
                  val = '0';
                } else if(name == 'call_timer'){
                  val = '0';
                } else {
                    val = 'N';
                }
            }
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=field_update',
                data: {id: id, name: name, val: val, type: 'switch'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTGONE',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        var dialog = "";
        $(document).on('click', '.addRecycleRule', function (e) {
            var title = $(this).attr('data-title');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('uploadmusic/ajax') ?>',
                data: {},
                success: function (resp) {
                    dialog = $.dialog({
                        title: title,
                        content: resp,
                        // type: 'blue',
                        animation: 'scale',
                        columnClass: 'small',
                        closeAnimation: 'scale',
                        backgroundDismiss: true,
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

                    if(Result.success === 1){
                    $.toast({
                        heading: 'Campaign Settings',
                        text: Result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#Audio-Modal').modal('hide');
                     $('#safe_harbor_audio,#am_message_exten').append("<option value='"+Result.data+"'>"+Result.data+"</option>");
                     }else{
                         $.toast({
                        heading: 'Campaign Settings',
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
                         $('#park_file_name').append("<option value='"+Result.data[0]+"'>"+Result.data[0]+"</option>");
                         $('#safe_harbor_audio,#am_message_exten').append("<option value='"+Result.data[1]+"'>"+Result.data[1]+"</option>");
                        $.toast({
                            heading: 'Campaign Settings',
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
                            heading: 'Campaign Settings',
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


        $(document).on('submit', '#RecycleRuleForm', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=RecycleRule&rule=add',
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                    $('#RecycleRule-Modal').modal('hide');
                    $('.RecycleRuleDiv').append(result.data);
                }
            });

        });


        $(".CampaignCID").focusout(function () {
            var out_num_dial_prefix = $('.out_num_dial_prefix').val();
            var val = $(this).val();
            var cid = $(this).data('cid');
            var NewVal = out_num_dial_prefix + val;
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=CampaignCID',
                data: {cid: cid, NewVal: NewVal},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });
        $(".out_num_dial_prefix").change(function () {
            var out_num_dial_prefix = $(this).val();
            var val = $('.CampaignCID').val();
            var cid = $('.CampaignCID').data('cid');
            var NewVal = out_num_dial_prefix + val;
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=CampaignCID',
                data: {cid: cid, NewVal: NewVal},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });



        $(document).ready(function () {
            $(document).on('change', '.campaign-Rcrule-field', function () {
                var FieldName = $(this).data('name');
                var FieldID = $(this).data('id');
                var FieldValue = $(this).val();
                $('#span-attempt_maximum_'+FieldID).html(FieldValue);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax') ?>?case=RecycleRule&rule=update',
                    data: {FieldName: FieldName, FieldID: FieldID, FieldValue: FieldValue},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            showHideTransition: 'plain',
                        });
                    }
                });
            });


            $(document).on('click', '.btn-switch-RcR', function () {
                if ($(this).hasClass('active')) {
                    var FieldValue = 'Y';
                } else {
                    var FieldValue = 'N';
                }
                var FieldName = $(this).data('name');
                var FieldID = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax') ?>?case=RecycleRule&rule=update',
                    data: {FieldName: FieldName, FieldID: FieldID, FieldValue: FieldValue},
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == 'error') {
                            $.toast({
                                heading: 'Campaign Recycle Rule Setting',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 2000,
                                showHideTransition: 'plain',
                            });
                        } else {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 2000,
                                showHideTransition: 'plain',
                            });
                        }
                    }
                });

            });
        });



        var dialog = "";
        $(document).on('click', '#addRecycleRule', function (e) {
            var title = $(this).attr('data-title');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('recycle/ajax') ?>',
                data: {},
                success: function (resp) {
                    dialog = $.dialog({
                        title: title,
                        content: resp,
                        // type: 'blue',
                        animation: 'scale',
                        columnClass: 'small',
                        closeAnimation: 'scale',
                        backgroundDismiss: true,
                    });
                }
            });
        });// popup



        $(document).on('click', '.RecycleRuleStatus', function () {
            if ($(this).hasClass('active')) {
                $('#RecycleRuleStatus').val('Y');
            } else {
                $('#RecycleRuleStatus').val('N');
            }
        });

        $(document).on('click', '.audio-upload', function () {
            $('#modal-audio').modal('show');
            $('#AlreadyMusicFileSelected').val($(this).data('music'))
        });


        $('.StatusListingModal').click(function(){
            var TextValue = $(this).find('span').text();
            if(!$(this).hasClass('bg-warning')){
                $(this).addClass('bg-warning');
                $('#Call-Status-listing').append('<span class="badge badge-lg badge-primary DialStatusListings" style="margin:5px;" data-text="'+TextValue+'">'+TextValue+'</span>')
            }else{
                $(this).removeClass('bg-warning');
                $('#Call-Status-listing span[data-text="'+TextValue+'"]').remove();
            }
        });
    </script>
<!--    <link rel="stylesheet" href="../../../assets/vendor_plugins/bootstrap-slider/slider.css">
    <script src="../../../assets/vendor_plugins/bootstrap-slider/bootstrap-slider.js"></script>

	<script>
	  $(function () {
		/* BOOTSTRAP SLIDER */
		$('.slider').slider()
	  })
	</script>-->
)
<?php } ?>
