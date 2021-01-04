<?php
if (!checkRole('admin_settings', 'edit')) {
    no_permission();
} else {

if(!empty($_POST) && $_POST){
    $data  = $DBUTG->update('sendgrid_settings',$_POST);
    if(!empty($data->rowCount()) && $data->rowCount() > 0){
        $Success = 1;
    }
}
$data = $DBUTG->get('sendgrid_settings', '*');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-desktop"></span>System Settings</div>

                    </div>
                    <div class="panel-body pn">

                        <form method="POST" accept-charset="UTF-8" autocomplete="off">

                            <div class="pad">

                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Api Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="api_name" id="api_name" class="form-control" value="<?php echo $data['api_name'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Api Password</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="api_password" id="api_password" class="form-control" value="<?php echo $data['api_password'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Api Key</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="api_key" id="api_key" class="form-control" value="<?php echo $data['api_key'];?>"/>
                                    </div>
                                </div>


                            </div>
                            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <button  class="btn btn-default btn-sm" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-success btn-app pull-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>

    </section>
    <!-- /.content -->

</div>

<script>

    <?php
    if(!empty($Success) && $Success == 1){?>
        $.toast({
                        heading: 'System Settings',
                        text: 'Successfully Updated',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
    <?php }?>
//    $(document).on('submit', '#CreateForm', function (e) {
//        e.preventDefault();
//        var formData = $(this).serialize();
//        var form = $('#CreateForm')[0];
//
//        var data = new FormData(form);
//        $.ajax({
//            type: "POST",
//            url: '<?php echo base_url('settings/ajax') ?>?action=UpdateEmailAccounts&editID=<?php echo $_GET['editID'];?>',
//            data: data,
//            enctype: 'multipart/form-data',
//            processData: false, // Important!
//            contentType: false,
//            cache: false,
//            success: function (data) {
//                var Result = JSON.parse(data);
//
//                if (Result.success === 1) {
//                    var MsgType = 'success';
//                } else {
//                    var MsgType = 'error';
//                }
//                $.toast({
//                    heading: 'Email Account Setting',
//                    text: Result.message,
//                    position: 'top-right',
//                    loaderBg: '#ff6849',
//                    icon: MsgType,
//                    hideAfter: 3500,
//                    showHideTransition: 'plain',
//                });
//            }
//        });
//    });
</script>
<?php } ?>
