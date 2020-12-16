<?php
if (!checkRole('sms', 'edit')) {
    no_permission();
} else {
    ?>
    <?php
    
    
    if(!empty($_POST) && $_POST){
        $DBSMS->update('accounts',$_POST);
        
    }
    $data = $DBSMS->get('accounts', '*');
    ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"> <i class="fa fa-user-circle-o"></i>Account</span>
                        </div>
                        <div class="panel-body pn">
                            <form class="form-horizontal" role="form" id="edit_form" autocomplete="off" method="post">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                                <div class="row">
                                    <div class="col-sm-6 pr15">
                                        <h5 class="text-muted"> Main Account Credentials </h5>
                                        <hr class="short">
                                        <div class="form-group">
                                            <label for="username" class="col-lg-3 control-label">Account SID</label>
                                            <div class="col-lg-8">
                                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                                                    <input type="text" name="sid" class="form-control" autocomplete="off" placeholder="" value="<?php echo $data['sid']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-lg-3 control-label">Auth Token</label>
                                            <div class="col-lg-8">
                                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                                                    <input type="text" name="token" class="form-control" autocomplete="off" placeholder="Password" value="<?php echo $data['token']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="ref" class="col-lg-3 control-label">Phone Number</label>
                                            <div class="col-lg-8">
                                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-barcode"></i> </span>
                                                    <input type="text" name="phone_number" class="form-control" autocomplete="off" placeholder="" value="<?php echo $data['phone_number']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-lg-3 control-label"></label>
                                            <div class="col-lg-8">
                                                <button class="btn btn-success" type="submit">Update</button>
                                                <!--<button class="btn btn-success" type="button">Cancel</button>-->
                                                <!--<button class="btn btn-success" type="button">Reset</button>-->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 pr35">

                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
//        $("#template_form").validate({
//            submitHandler: function (form) {
//                $.post('<?php echo base_url('sms/ajax') ?>?action=SaveSMSRoutine', $(form).serialize(), function (response) {
//
//                    $.toast({
//                        heading: 'Saved',
//                        text: 'SMS Routine has been successfully added!!',
//                        position: 'top-right',
//                        loaderBg: '#ff6849',
//                        icon: 'success',
//                        hideAfter: 3500,
//                        showHideTransition: 'plain',
//                    });
//                    $('#myModal').modal('hide');
//                    setTimeout(function () {
//                        window.location.href = '<?php echo base_url('sms/routines') ?>';
//                    }, 3500);
//                });
//                return false;
//            }
//        });

    </script>
<?php } ?>
