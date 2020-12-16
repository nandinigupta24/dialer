<?php
if (!checkRole('settings', 'edit')) {
    no_permission();
} else {
    ?>
    <style>
        .jconfirm-box{
            padding: 0px 0px !important;
            border-radius:0px !important;
        }
        .jconfirm-title-c{
            text-align: center  !important;
            background: #323030e0  !important;
            padding: 9px 15px  !important;
            color: #b8b2b2  !important;
        }
        .jconfirm-content-pane{
            padding: 10px 10px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage Audio File Logs</div>
                                <ul class="nav panel-tabs">
                                    <li> <a href="#Audio-Modal" data-toggle="modal"><i class="fa fa-cloud-upload text-success"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>FileName</th>
                                            <th>Uploaded By</th>
                                            <th>Uploaded Date</th>
                                            <th>IP Address</th>
                                            <th>play</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    
    <div class="modal fade" id="Audio-Modal">
        <div class="modal-dialog">
            <form method="post" name="" action="" autocomplete="OFF" id="FormuploadMusic" enctype="multipart/form-data">
          <div class="modal-content">
              <div class="modal-header bg-success justify-content-center">
                  <h4 class="modal-title"><i class="fa fa-headphones"></i> Audio File Upload</h4>
              </div>
              <div class="modal-body">
                   <div class="form-group">
                        <label for="CampaignName">Name of Audio(<span class="text-success">No Space Allowed</span>):</label>
                        <input type="text" class="form-control" id="audio_name" name="audio_name" placeholder="Enter Audio Name" required=""/>
                    </div>

                    <div class="form-group">
                        <label for="fileMusic">Name of Audio:</label>
                        <input type="file" class="form-control" id="fileMusic" name="file" required=""/>
                    </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success float-right">Upload</button>
                     <button type="reset" class="btn btn-default float-right">Reset</button>
              </div>
          </div>
            </form>
        </div>
    </div>
    
    
     
    <script>

        var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetAudioLog',
                "type": "POST",
            },

            "columns": [
                {"data": "event_code"},
                {"data": "full_name"},
                {"data": "event_date"},
                {"data": "ip_address"},
                {"data": "play"},
                {"data": "Action"},
            ],

        });

        $(document).on('submit', '#FormuploadMusic', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $('#FormuploadMusic')[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=AudioUpload',
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                success: function (data) {
                    var Result = JSON.parse(data);
                    if(Result.success === 1){
                        $('#Audio-Modal').modal('hide');
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var MsgType = 'success';
                    }else{
                        var MsgType = 'error';
                    }
                    $.toast({
                            heading: 'AUDIO Setting',
                            text: Result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: MsgType,
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                }
            });
        });



        $(document).on('click', '.Remove-Audio', function () {
            var AdminLogID = $(this).attr('admin-log-id');
            var AdminLogFileID = $(this).attr('FileName');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this AUDIO!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('settings/ajax') ?>?action=AudioDelete',
                        data: {AdminLogID: AdminLogID,AdminLogFileID:AdminLogFileID},
                        success: function (data) {

                            var Result = JSON.parse(data);
                            $.toast({
                                heading: 'AUDIO Setting',
                                text: Result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                           $('#table-list-campaigns').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });

        });
    </script>
<?php } ?>
