<?php if (!checkRole('settings', 'create')) {
    no_permission();
} else { ?>
    <style>
        .error_background{ border-color: red; } .error { color: red; margin-left: 5px; } label.error { display: inline; } .hidden-row{ display:none; } .range-slider { -webkit-appearance: none; width: 100%; height: 8px; border-radius: 5px; background: #d3d3d3; outline: none; opacity: 0.7; -webkit-transition: .2s; transition: opacity .2s; } .range-slider:hover { opacity: 1; } .range-slider::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; } th{ font-size: 13px !important; font-weight: 700 !important; } .range-slider::-moz-range-thumb { width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; }
    </style>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel " id="AllFormsTab">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Add A New Call Time</div>
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">
                                    <form id="createNewCall" class="cmxform" action="<?php // echo $PHP_SELF ?>"  method="POST">
                                        <?php
                                        if ($_SESSION['CurrentLogin']['user_group'] != 'ADMIN') {
                                            ?>
                                            <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group']; ?>"/>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <!--<div class="col-sm-1"></div>-->
                                            <div class="col-sm-1"></div>
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Call Time ID</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" maxlength="10" placeholder="Max 10 Characters" id="call_time_id" name="call_time_id">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <!--<div class="col-sm-1"></div>-->
                                            <div class="col-sm-1"></div>
                                            <label for="call_time_name" class="col-sm-2 col-form-label">Call Time Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 30 Characters" maxlength="30" id="call_time_name" name="call_time_name">
                                            </div>
                                        </div>



                                    </form>
                                    <a class="ajax-disable btn  btn-success m10" onclick="validateAndSubmit()" style="float:right;" href="#">Create</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>

            </div>

        </section>
        <!-- /.content -->

    </div>
    <!--Modal For Success Insertion-->
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
                Your call time has been successfully created.
              </div>
              
                <p>Call Time ID:- <span class="ColumnID"></span></p>
                <p>Call Time Name:- <span class="ColumnName"></span></p>
                
                <p><b>If you want to go on detail page ,please click on Call Time Detail Page.</b></p>
          </div>
          <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Call Time Detail Page</a>
          </div>
        </div>
    </div>
</div>
    <script>

        function validateAndSubmit() {
            var call_time_id = $('#call_time_id').val();
            var call_time_name = $('#call_time_name').val();
            var error = 0;
            $(".error").remove();
            $('#call_time_id').removeClass('error_background');
            $('#call_time_name').removeClass('error_background');

            if (call_time_id.length < 1) {
                error = error + parseInt(1);
                $('#call_time_id').addClass('error_background');
                $('#call_time_id').after('<span class="error">This field is required</span>');
            }
            if (call_time_name.length < 1) {
                error = error + parseInt(1);
                $('#call_time_name').addClass('error_background');
                $('#call_time_name').after('<span class="error">This field is required</span>');
            }

            if (error == 0) {
                var FormNewCallOne = $('#createNewCall').serialize();
                var postData = FormNewCallOne;
                //console.log('postData',postData);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('settings/ajax') ?>?action=AddCallTime',
                    data: postData, // serializes the form's elements.
                    success: function (data) {
                        var result = JSON.parse(data);
                        $("#createNewCall").trigger('reset');
//                        $('#create_team')[0].reset();
                        $('#modal-success').modal('show');

                        $('.ColumnID').html(result.data.ColumnID);
                        $('.ColumnName').html(result.data.ColumnName);

                       $('.ColumnDetailPage').attr('href','call_time_edit?call_time_id='+result.data.ColumnID);
                        $.toast({
                            heading: 'Call Time',
                            text: 'New call time has been successfully added!!',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });

                    }
                });

            }


        }
    </script>
<?php } ?>
