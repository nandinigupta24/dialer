<?php
$CampaignID = $_GET['campaign_id'];
$campaignCID = $database->query("SELECT * FROM `vicidial_campaign_cid_areacodes` WHERE campaign_id = '".$CampaignID."'")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
      <div class="panel pn">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-clock-o"></i> Area Code</span>
                <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                    <li class="nav-item">
                        <a href="javascript:void(0);" id="addCampaigncid" data-title="Add Campaign Status" class="text-success" style="padding:15px;">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" id="addCampaignbulkcid" data-title="Add Campaign Bulk" class="text-success" style="padding:15px;">
                            <i class="fa fa-upload"></i>
                        </a>
                    </li>
                </ul>
        </div>
        <div class="panel-body pn">
          <div class="table-responsive">
            <table id="table-list-campaigns" class="table table-bordered">
              <thead class="bg-success">
                  <tr>
                      <th>S. No</th>
                      <th>Area Code</th>
                      <th>CID Number</th>
                      <th>Description</th>
                      <th>Active</th>
                      <th>Calls</th>
                      <!--<th>Double Status</th>-->
<!--                                <th class="text-center" style="width:37px;"></th>-->
                      <th class="text-center" style="width:37px;">Action</th>
                  </tr>
              </thead>

              <tbody class="areaListSection">
                <?php
                 $i = 0;
                 if(count($campaignCID)) {
                 foreach ($campaignCID as $cid) {
                   $i++;
                ?>

                    <tr id="ar-<?php echo $cid['id']; ?>">
                        <th><?php echo $i; ?></th>
                        <td><?php echo $cid['areacode']; ?></td>
                        <td><?php echo $cid['outbound_cid']; ?></td>
                        <td><?php echo $cid['cid_description'];?></td>
                        <td><?php echo $cid['active'] ?></td>
                        <td><?php echo $cid['call_count_today'];?></td>
                        <td>
                          <a href="javascript:void(0)" class="btn btn-app btn-success editAreacode" data-id="<?php echo $cid['id'] ?>"><i class="fa fa-arrow-right"></i></a>
                          <a href="javascript:void(0)" class="btn btn-app btn-danger deleteAreacode" data-id="<?php echo $cid['id'] ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                <?php } } else { ?>
                  <tr>
                    <td colspan="5">No Records Found</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCampaigncidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel">Add Campaign Area Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" name="" action="" id="CampaigncidModal" autocomplete="off">
          <div class="modal-body">
              <div class="form-group">
               <label for="areacode">Areacode:</label>
               <input type="text" class="form-control" id="areacode" name="areacode" placeholder="Enter Areacode" required="">
               <input type="hidden" id="area_id" name="areaid">
               <input type="hidden" id="campaign_id" name="campaign_id" value="<?php echo $CampaignID ?>" required="">
             </div>
            <div class="form-group">
              <label for="outbound_cid">Outbound CID:</label>
              <input type="text" class="form-control" id="outbound_cid" name="outbound_cid" placeholder="Enter Outbound CID" required="">
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
            </div>
          </div>
          <div class="modal-footer" style="width: 100%">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCampaignbulkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel">Add Campaign Area Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" name="" action="" id="CampaigncidBulkModal" enctype="multipart/form-data" autocomplete="off">
          <div class="modal-body">
              <div class="form-group">
               <label for="areacode">Upload CSV:</label>
               <input type="file" name="campaign_area_bulk" class="form-control" required="">
               <input type="hidden" id="campaign_id" name="campaign_id" value="<?php echo $CampaignID ?>" required="">
             </div>
          </div>
             <div class="modal-footer" style="width: 100%">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary float-right">Save</button>
             </div>
        </form>
        </div>
      </div>
    </div>

</div>

<script>
  $('#addCampaigncid').click(function() {
    $('#area_id').val('');
    $('#areacode').val('');
    $('#outbound_cid').val('');
    $('#description').val('');
    $('#addCampaigncidModal').modal('show');
  });

  $('#addCampaignbulkcid').click(function() {
    $('#addCampaignbulkModal').modal('show');
  });

  $(document).on('submit', '#CampaigncidModal', function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      //console.log(formData);
      //exit;
      $.ajax({
          type: "POST",
          url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignACCID&rule=ADD',
          data: formData,
          success: function (data) {
              var result = JSON.parse(data);
              $.toast({
                  heading: 'Campaign Areacode',
                  text: 'Successfully Added!!',
                  position: 'top-right',
                  loaderBg: '#ff6849',
                  icon: 'success',
                  hideAfter: 3500,
                  stack: 6
              });
              $('#addCampaigncidModal').modal('hide');
              location.reload();
              /* var i = 0;
              var myvar = '<tr id="ar-'+result.data.id+'">'+
              '                                    <td>'+(i+1)+'</td>'+
              '                                    <td>'+result.data.areacode+'</td>'+
              '                                    <td>'+result.data.outbound_cid+'</td>'+
              '                                    <td>'+result.data.cid_description+'</td>'+
              '                                    <td>'+result.data.active+'</td>'+
              '                                    <td>'+result.data.call_count_today+'</td>'+
              '                                    <td>'+
              '                                    <a href="javascript:void(0)" class="btn btn-app btn-success editAreacode" data-id="'+result.data.id+'"><i class="fa fa-arrow-right"></i></a>'+
              '                                    <a href="javascript:void(0)" class="btn btn-app btn-danger deleteAreacode" data-id="'+result.data.id+'"><i class="fa fa-times"></i></a>'+
              '                                    </td>'+
              '                                </tr>';


                              $('.areaListSection').append(myvar); */
          }
        });
      });

      $(document).on('click', '.deleteAreacode', function () {
          var id = $(this).data('id');
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this campaign areacode!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel please!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function (isConfirm) {
              if (isConfirm) {

                  $.ajax({
                    type: "GET",
                    url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignACCID&rule=Delete&id='+id,
                      success: function (data) {
                          $('#ar-' + id).remove();
                          swal("Deleted!", "Your campaign arecde has been deleted.", "success");
                      }
                  });

              } else {
                  swal("Cancelled", "Your campaign areacode is safe :)", "error");
              }
          });
      });

      $('.editAreacode').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignACCID&rule=List&id='+id,
            success: function (data) {
                var result = JSON.parse(data);
                $('#area_id').val(result.data.id);
                $('#areacode').val(result.data.areacode);
                $('#outbound_cid').val(result.data.outbound_cid);
                $('#description').val(result.data.cid_description);

                $('#addCampaigncidModal').modal('show');
            }
          });
      });

      $(document).on('submit', '#CampaigncidBulkModal', function (e) {
          e.preventDefault();
          $.ajax({
              type: "POST",
              url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignACCID&rule=BulkAdd',
              data:new FormData(this),
               contentType:false,          // The content type used when sending data to the server.
               cache:false,                // To unable request pages to be cached
               processData:false,
              success: function (data) {
                  var result = JSON.parse(data);
                  $.toast({
                      heading: 'Campaign Areacode',
                      text: 'Successfully Added!!',
                      position: 'top-right',
                      loaderBg: '#ff6849',
                      icon: 'success',
                      hideAfter: 3500,
                      stack: 6
                  });
                  $('#addCampaignbulkModal').modal('hide');
                  location.reload();
              }
            });
          });
</script>
