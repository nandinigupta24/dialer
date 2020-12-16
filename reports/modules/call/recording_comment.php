<?php

if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
    $user_group = "AND VAL.user_group= '" . $_SESSION['CurrentLogin']['user_group'] . "'";
} else {
	$user_group = '';
}

$current_date = date('Y-m-d');
$query = "SELECT CONCAT(VU.full_name,'(',VAL.user,')') as user,VAL.lead_id,VAL.campaign_id,VAL.event_time,VAL.status, VL.list_id,VL.phone_number,RL.filename,RL.recording_id,RL.location,RL.length_in_sec,RC.comments,RC.updated_at FROM UTG.call_recording_comment RC INNER JOIN recording_log RL ON RL.recording_id = RC.recording_id INNER JOIN vicidial_agent_log VAL ON VAL.dispo_epoch=RL.end_epoch and VAL.lead_id = RL.lead_id INNER JOIN vicidial_list VL ON VAL.lead_id = VL.lead_id JOIN vicidial_users VU ON VAL.user = VU.user WHERE DATE(updated_at) = CURDATE() ".$user_group." ORDER BY RC.updated_at asc";
$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

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
                            <div class="panel-title"> <span class="fa fa-book"></span>Call Recording Comments</div>
                            <ul class="nav panel-tabs">
                                <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                <li> <a type="button" id="daterange-btn">
                                        <span>
                                            <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;Date Range Picker
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Agent</th>
                                        <th width="20%">Details</th>
                                        <th>Phone Number</th>
                                        <th>File Name</th>
                                        <th width="40%">Comments</th>
                                        <th>Date</th>
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
                                            <td>
                                              <p><label class="font-weight-bold">Lead Id: </label>
                                              <?php echo $recording['lead_id']; ?></p>
                                              <p><label class="font-weight-bold">Status: </label>
                                              <?php echo $recording['status']; ?></p>
                                              <p><label class="font-weight-bold">Call Date: </label>
                                              <?php echo $recording['event_time']; ?></p>
                                              <p><label class="font-weight-bold">Campaign: </label>
                                              <?php echo $recording['campaign_id']; ?></p>
                                              <p><label class="font-weight-bold">List ID: </label>
                                              <?php echo $recording['list_id']; ?></p>
                                              <p><label class="font-weight-bold">Call Length: </label>
                                              <?php echo $recording['length_in_sec']; ?></p>
                                            </td>
                                            <td><?php echo $recording['phone_number']; ?></td>
                                            <td>
                                                <p><a href="<?php echo $LiveURLRecording; ?>" class="btn btn-primary" title="Download Recording"><i class="fa fa-download"></i></a></p>
                                                <p><button type="button" class="btn btn-success PlayAudio" title="Listen Recording" data-href="<?php echo $LiveURLRecording; ?>" data-name="<?php echo $recording['filename']; ?>"><i class="fa fa-headphones"></i></button></p>
                                                <!-- <p><audio controls>
                                                  <source src="<?php echo $LiveURLRecording; ?>" type="audio/ogg">
                                                    Your browser does not support the audio element.
                                                  </audio> </p> -->
                                            </td>
                                            <td class="text-justify"><?php echo $recording['comments']; ?></td>
                                            <td><?php echo $recording['updated_at']; ?></td>
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

                    <div id="InboundCallBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" style="margin: 0 auto;top: 25%;">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center" style="background-color:#4eb598 !important;color:#fff !important;">
                                    <h4 class="modal-title" id="myModalLabel">Call Recording</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="stopAudio()">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                      <div class="AudioPlay" style="top: 118;right: 300;"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-info waves-effect btn-app float-left" onClick="stopAudio()">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


</div>


<script>
    $(function () {
        "use strict";
    })
    $('#table-list-campaigns').DataTable({
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "order": [[ 5, 'desc' ]]
    });

	$(document).on('click', '.clear_data', function () {
		$('input[name=start]')[0].value = 0;
		$('input[name=end]')[0].value = 0;
		$("#status").val('');
		$("#agent").val('');
		$("#campaign").val('');
		$("#lists").val('');
		$('input[name=phone]').val('');
	});

  $('#daterange-btn').daterangepicker(
          {
              ranges: {
                  'Today': [moment(), moment()],
                  'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                  'This Month': [moment().startOf('month'), moment().endOf('month')],
                  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment(),
              endDate: moment()
          },
          function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              var start = start.format('YYYY-MM-DD');
              var end = end.format('YYYY-MM-DD');
              var dt = $('#table-list-campaigns').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 5, 'desc' ]],
                  destroy: true,
                  "bprocessing": true,
                  "bserverSide": true,
                  "pageLength": 25,
                  "ajax": {
                      "url": '<?php echo base_url('call/ajax'); ?>?case=showComment&start=' + start + '&end=' + end,
                      "type": "POST",
                  },

                  "columns": [
                      {"data": "user"},
                      {"mRender": function (data, type, row) {
                              return '<p><label class="font-weight-bold">Lead Id: </label>'+row.lead_id+'</p>'+
                              '<p><label class="font-weight-bold">Status: </label>'+row.status+'</p>'+
                              '<p><label class="font-weight-bold">Call Date: </label>'+row.event_time+'</p>'+
                              '<p><label class="font-weight-bold">Campaign: </label>'+row.campaign_id+'</p>'+
                              '<p><label class="font-weight-bold">List ID: </label>'+row.list_id+'</p>'+
                              '<p><label class="font-weight-bold">Call Length: </label>'+row.length_in_sec+'</p>';
                      }},
                      {"data": "phone_number"},
                      {"mRender": function (data, type, row) {
                        var file_location = row.location.split('/archive/');
                        var file_url = '<?php echo $baseURL.'archive/'?>'+file_location[1];
                              return '<p><a href="'+file_url+'" class="btn btn-primary" title="Download Recording"><i class="fa fa-download"></i></a></p>'+
                              '<p><button type="button" class="btn btn-success PlayAudio" title="Listen Recording" data-href="'+file_url+'"><i class="fa fa-headphones"></i></button></p>';
                      }},
                      {"mRender": function (data, type, row) {
                        return "<p class='text-justify'>"+row.comments+"</p>";
                      }},
                      {"data": "updated_at"},
                  ]

              });
            }
          );

          $(document).on('click', '.PlayAudio', function () {
            $('.AudioPlay').show();
            $('.AudioPlayText').show();
            var AudioURL = $(this).data('href');
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

</script>
