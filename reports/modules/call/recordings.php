<?php
$SQLString = [];
if (!empty($_GET['start']) && !empty($_GET['end'])) {
    $SQLString[] = "VAL.event_time BETWEEN '" . date('Y-m-d', strtotime($_GET['start'])) . " 00:00:00' AND '" . date('Y-m-d', strtotime($_GET['end'])) . " 23:59:59'";
} else {
//        $SQLString .= "VAL.event_time BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'";
}



if (!empty($_GET['campaign'])) {
    $SQLString[] = "VAL.campaign_id = '" . $_GET['campaign'] . "'";
}else{
    // $SQLString[] = "VAL.campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."')";

}

if (!empty($_GET['lists'])) {
    $SQLString[] = "VL.list_id = '" . $_GET['lists'] . "'";
}

if (!empty($_GET['agent'])) {
    $SQLString[] = "VAL.user = '" . $_GET['agent'] . "'";
}

if (!empty($_GET['status'])) {
    $SQLString[] = "VAL.status = '" . $_GET['status'] . "'";
}

if (!empty($_GET['phone'])) {
    $SQLString[] = "VL.phone_number= '" . $_GET['phone'] . "'";
}

if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
    $user_group = "AND VAL.user_group= '" . $_SESSION['CurrentLogin']['user_group'] . "'";
} else {
	$user_group = '';
}

if (count($SQLString) > 0) {
    $SQLString = implode(' AND ', $SQLString);
//    $query = "SELECT VAL.user,VAL.lead_id,VAL.campaign_id,VAL.event_time,VAL.status, VL.list_id,VL.phone_number,RL.filename,RL.location,RL.length_in_sec  FROM vicidial_agent_log VAL  JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id left JOIN recording_log RL ON VAL.dispo_epoch=RL.end_epoch and VAL.lead_id= RL.lead_id WHERE " . $SQLString." ".$user_group." limit 200";
    $query = "SELECT CONCAT(VU.full_name,'(',VAL.user,')') as user,VAL.lead_id,VAL.campaign_id,VAL.event_time,VAL.status, VL.list_id,VL.phone_number,RL.filename,RL.recording_id,RL.location,RL.length_in_sec,RC.comments  FROM vicidial_agent_log VAL  JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id left JOIN recording_log RL ON VAL.dispo_epoch=RL.end_epoch and VAL.lead_id= RL.lead_id LEFT JOIN UTG.call_recording_comment RC ON RC.recording_id = RL.recording_id JOIN vicidial_users VU ON VAL.user = VU.user WHERE " . $SQLString." ".$user_group." limit 200";
//    echo $query;
//    exit;
    $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
} else {
    $data = [];
}

$agent_data = $DBUTG->get('agent_page_setting',['id','inbound_call_drop','comment_on_call_recording','agent_screen']);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Call Recordings.</div>
                            <ul class="nav panel-tabs">
                                <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                <li><a href="" data-toggle="modal" data-target="#ArchiveRuleModel" title="Report Setting"><i class="fa fa-cogs text-blue3"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Agent</th>
                                        <th>Lead ID</th>
                                        <th>Status</th>
                                        <th>Call Date</th>
                                        <th>Campaign</th>
                                        <th>Call Length (s)</th>
                                        <th>Phone Number</th>
                                        <th>List ID</th>
                                        <th>File Name</th>
                                        <th class="text-center"  data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $recording) {
                                        if(empty($recording['status'])){
                                           continue;
                                        }
                                        if(empty($recording['filename'])){
                                           continue;
                                        }

                                        $data = explode('/archive/',$recording['location']);

                                        $LiveURLRecording = $baseURL.'archive/'.$data[1];
                                        ?>
                                        <tr>
                                            <td><?php echo $recording['user']; ?></td>
                                            <td><?php echo $recording['lead_id']; ?></td>
                                            <td><?php echo $recording['status']; ?></td>
                                            <td><?php echo $recording['event_time']; ?></td>
                                            <td><?php echo $recording['campaign_id']; ?></td>
                                            <td><?php echo $recording['length_in_sec']; ?></td>
                                            <td><?php echo $recording['phone_number']; ?></td>
                                            <td><?php echo $recording['list_id']; ?></td>
                                            <td><?php echo $recording['filename']; ?></td>
                                            <td>
                                                <a href="<?php echo $LiveURLRecording; ?>" class="btn btn-primary" title="Download Recording"><i class="fa fa-download"></i></a>
                                                <button type="button" class="btn btn-success PlayAudio" title="Listen Recording" data-href="<?php echo $LiveURLRecording; ?>" data-name="<?php echo $recording['filename']; ?>" data-show="<?php echo $agent_data['comment_on_call_recording'] ?>" data-id="<?php echo $recording['lead_id']; ?>" data-recording="<?php echo $recording['recording_id']; ?>" data-comment = "<?php echo $recording['comments'] ?>"><i class="fa fa-headphones"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>



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


    <div class="modal fade" id="ArchiveRuleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Report Settings</h4>
                </div>
                <form id="report_setting" class="" method="get" action="">
                    <!--<input type="hidden" name="ADD" value="5016"/>-->
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="date" placeholder="Start Date" max="<?php echo date('Y-m-d'); ?>" name="start" value="<?php echo $_GET['start']; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="date" placeholder="End Date" max="<?php echo date('Y-m-d'); ?>" name="end" value="<?php echo $_GET['end']; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                    $query = "SELECT status,status_name FROM vicidial_campaign_statuses WHERE (campaign_id is NULL OR campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."')) AND status != ''";
                                    $StatusListings = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-tag"></i> </span>
                                        <select class="form-control" name="status" id="status">
                                            <option value="">All Statuses</option>
                                            <?php foreach ($StatusListings as $ListingStatus) { ?>
                                                <option value="<?php echo $ListingStatus['status']; ?>" <?php echo (isset($_GET['status']) && $_GET['status'] == $ListingStatus['status']) ? 'selected="selected"' : ''; ?>><?php echo $ListingStatus['status'] . ' - ' . $ListingStatus['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Agent</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                        <?php
                                        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                            $AgentListings = $database->select('vicidial_users', ['user', 'full_name']);
                                        }else{
                                            $AgentListings = $database->select('vicidial_users', ['user', 'full_name'], ['user_group' => $_SESSION['CurrentLogin']['user_group']]);
                                        }

                                        ?>
                                        <select class="form-control" name="agent" id="agent">
                                            <option value="">All Agents</option>
                                            <?php foreach ($AgentListings as $ListingAgent) { ?>
                                                <option value="<?php echo $ListingAgent['user']; ?>" <?php echo (isset($_GET['agent']) && $_GET['agent'] == $ListingAgent['user']) ? 'selected="selected"' : ''; ?>><?php echo $ListingAgent['user'] . ' - ' . $ListingAgent['full_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Campaign</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-book"></i> </span>
                                        <?php
                                         if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                             $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['active' => 'Y']);
                                         }else{
                                             $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['AND'=>['active' => 'Y','user_group'=>$_SESSION['CurrentLogin']['user_group']]]);
                                         }

                                        ?>
                                        <select class="form-control" name="campaign" id="campaign">
                                            <option value="">All Campaigns</option>
                                            <?php foreach ($CampaignListings as $ListingCampaign) { ?>
                                                <option value="<?php echo $ListingCampaign['campaign_id']; ?>" <?php echo (isset($_GET['campaign']) && $_GET['campaign'] == $ListingCampaign['campaign_id']) ? 'selected="selected"' : ''; ?>><?php echo $ListingCampaign['campaign_id'] . ' - ' . $ListingCampaign['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>List</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-list"></i> </span>
                                        <?php
                                        $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'], ['AND'=>['active' => 'Y','campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]]);
                                        ?>
                                        <select class="form-control" name="lists" id="lists">
                                            <option value="">All Lists</option>
                                            <?php foreach ($ListListings as $ListingList) { ?>
                                                <option value="<?php echo $ListingList['list_id']; ?>" <?php echo (isset($_GET['lists']) && $_GET['lists'] == $ListingList['list_id']) ? 'selected="selected"' : ''; ?>><?php echo $ListingList['list_id'] . ' - ' . $ListingList['list_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pr15">
                                <div class="form-group well">
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="text"  placeholder="Phone Number" name="phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>"/>
                                    </div>
                                    <span><h6>Does not work with other search criteria, pulls all recordings for this number</h6></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >View Recording</button>
                        <button type="button" class="btn btn-success clear_data" >Clear Search</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <div id="InboundCallBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="margin: 0 auto;top: 25%;">
            <input type="hidden" name="lead_id" id="lead_id">
            <input type="hidden" name="recording_id" id="recording_id">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color:#4eb598 !important;color:#fff !important;">
                    <h4 class="modal-title" id="myModalLabel">Call Recording</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="stopAudio()">×</button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                      <div class="AudioPlay" style="top: 118;right: 300;display:none;"></div>
                      <div class="AudioPlayText" style="display:none;background:#26c6da;color: #fff; border-radius: 3px; padding: 7px;">You are currently playing <b id="filename-text"></b></div>
                    </div>
                    <div class="input-group show_class" style="margin-top: 20px;">
                        <span class="input-group-addon bg-secondary"><i class="fa fa-comment"></i></span>
                        <textarea id="admin_comment" name="admin_comment" class="form-control" value="" placeholder="Comments"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect btn-app float-right show_class submit_comment">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-info waves-effect btn-app float-left" onClick="stopAudio()">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    $(function () {
        "use strict";
    })

    $('#table-list-campaigns').DataTable({"order": [[ 3, 'desc' ]]});

    $(document).on('click', '.PlayAudio', function () {
      $('.AudioPlay').show();
      $('.AudioPlayText').show();
      var AudioURL = $(this).data('href');
      var lead_id = $(this).data('id');
      var recording_id = $(this).data('recording');
      var data_show = $(this).data('show');
      if(data_show == 'Y') {
        $('.show_class').css({"display": "flex"});
      } else {
        $('.show_class').css({"display": "none"});
      }
      $('#lead_id').val(lead_id);
      $('#recording_id').val(recording_id);
      $('#admin_comment').val($(this).data('comment'));
      $('#filename-text').text($(this).data('name'));
      $('#InboundCallBoxModal').modal('show');
      $('.AudioPlay').html('<audio controls autoplay>' +
              '<source src="' + AudioURL + '" type="audio/mpeg">' +
              'Your browser does not support the audio element.' +
              '</audio>');
    });

    function stopAudio()
    {
      $('.AudioPlay').html('');
    }

	$(document).on('click', '.clear_data', function () {
		$('input[name=start]')[0].value = 0;
		$('input[name=end]')[0].value = 0;
		$("#status").val('');
		$("#agent").val('');
		$("#campaign").val('');
		$("#lists").val('');
		$('input[name=phone]').val('');
	});

  $(document).on('click', '.submit_comment', function() {
    var lead_id = $('#lead_id').val();
    var recording_id = $('#recording_id').val();
    var admin_comment = $('#admin_comment').val();
    if(admin_comment == '') {
      $.toast({
          heading: 'Call Recording comment',
          text: 'Comment field should not blank',
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'success',
          hideAfter: 2000,
          showHideTransition: 'plain',
      });
    } else {
      $.ajax({
          type: "POST",
          url: '<?php echo base_url('call/ajax') ?>?case=saveComment',
          data: {lead_id: lead_id, recording_id: recording_id, admin_comment: admin_comment},
          success: function (data) {
              location.reload();
          }
      });
    }
  });

</script>
