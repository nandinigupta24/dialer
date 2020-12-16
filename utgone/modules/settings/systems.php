<?php
if (!checkRole('admin_settings', 'edit')) {
    no_permission();
} else {
$array = [];
$array[] = 'Default Local GMT';
$array[] = 'Sounds Web Server';
$array[] = 'Sounds Web Directory';
$array[] = 'Active Voicemail Server';
$array[] = 'Allow Emails';
$array[] = 'Allow Chats';
$array[] = 'Chat Timeout in seconds';
$array[] = 'Chat URL';
$array[] = 'Webphone URL';

if(!empty($_POST) && $_POST){
    $data  = $database->update('system_settings',$_POST);
    if(!empty($data->rowCount()) && $data->rowCount() > 0){
        $Success = 1;
    }
}
$data = $database->get('system_settings',['default_local_gmt','sounds_web_server','sounds_web_directory','active_voicemail_server','allow_emails','allow_chats','chat_timeout','chat_url','webphone_url','qc_features_active','auto_dial_limit','sounds_central_control_active']);

$array['default_local_gmt'] =  [12.75,12.00,11.00,10.00,9.50,9.00,8.00,7.00,6.50,6.00,5.75,5.50,5.00,4.50,4.00,3.50,3.00,2.00,1.00,0.00,-1.00,-2.00,-3.00,-3.50,-4.00,-5.00,-6.00,-7.00,-8.00,-9.00,-10.00,-11.00,-12.00];
$ServerListings = $database->select('servers',['server_ip','server_description','external_server_ip'],['ORDER'=>['server_ip'=>'ASC']]);
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
                                    <label for="extension_number" class="col-sm-2 col-form-label">Default Local GMT</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="default_local_gmt" id="default_local_gmt">
                                            <?php
                                            foreach($array['default_local_gmt'] as $default_local_gmt){
                                            ?>
                                            <option value="<?php echo $default_local_gmt;?>" <?php echo ($data['default_local_gmt'] == $default_local_gmt) ? 'selected="selected"' : '';?>><?php echo $default_local_gmt;?></option>
                                            <?php
                                            }
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Sounds Web Server</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="sounds_web_server" id="sounds_web_server" class="form-control" value="<?php echo $data['sounds_web_server'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Sounds Web Directory</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="sounds_web_directory" id="sounds_web_directory" class="form-control" value="<?php echo $data['sounds_web_directory'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Active Voicemail Server</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="active_voicemail_server" id="active_voicemail_server">
                                            <?php
                                            foreach($ServerListings as $listings){
                                            ?>
                                            <option value="<?php echo $listings['server_ip'];?>" <?php echo ($data['active_voicemail_server'] == $listings['server_ip']) ? 'selected="selected"' : '';?>><?php echo $listings['server_ip'].' - '.$listings['server_description'];?></option>
                                            <?php
                                            }
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Allow Emails</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="allow_emails" id="allow_emails">
                                            <option value="1" <?php echo ($data['allow_emails'] == 1) ? 'selected="selected"' : '';?>>1</option>
                                            <option value="0" <?php echo ($data['allow_emails'] == 0) ? 'selected="selected"' : '';?>>0</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Allow Chats</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="allow_chats" id="allow_chats">
                                            <option value="1" <?php echo ($data['allow_chats'] == 1) ? 'selected="selected"' : '';?>>1</option>
                                            <option value="0" <?php echo ($data['allow_chats'] == 0) ? 'selected="selected"' : '';?>>0</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Chat Timeout in seconds</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="chat_timeout" id="chat_timeout" class="form-control" value="<?php echo $data['chat_timeout'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Chat URL</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="chat_url" id="chat_url" class="form-control" value="<?php echo $data['chat_url'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Webphone URL</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="webphone_url" id="webphone_url" class="form-control" value="<?php echo $data['webphone_url'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">QC Features Active</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="qc_features_active" id="qc_features_active">
                                            <option value="1" <?php echo ($data['qc_features_active'] == 1) ? 'selected="selected"' : '';?>>1</option>
                                            <option value="0" <?php echo ($data['qc_features_active'] == 0) ? 'selected="selected"' : '';?>>0</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="auto_dial_limit" class="col-sm-2 col-form-label">Auto Dial Limit</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="auto_dial_limit" id="auto_dial_limit" class="form-control" value="<?php echo $data['auto_dial_limit'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Central Sound Control Active</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="sounds_central_control_active" id="sounds_central_control_active">
                                            <option value="1" <?php echo ($data['sounds_central_control_active'] == 1) ? 'selected="selected"' : '';?>>1</option>
                                            <option value="0" <?php echo ($data['sounds_central_control_active'] == 0) ? 'selected="selected"' : '';?>>0</option>
                                        </select>
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
