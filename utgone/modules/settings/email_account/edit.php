<?php
if(!empty($_GET['editID'])){
    $data = $database->get('vicidial_email_accounts','*',['email_account_id'=>$_GET['editID']]);
}
$UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
$CampaignListing = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
$InboundGroup = $database->select('vicidial_inbound_groups', ['group_id', 'group_name'], ['ORDER' => ['group_id' => 'ASC']]);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-edit"></span>Edit INBOUND EMAIL ACCOUNT</div>
                       
                    </div>
                    <div class="panel-body pn">

                        <form method="POST"  accept-charset="UTF-8" id="CreateForm" autocomplete="off">

                            <div class="pad">

                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Email Account ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="20" type="text" placeholder="" id="email_account_id" name="email_account_id" value="<?php echo $data['email_account_id'];?>" required="" readonly=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="100" type="text" placeholder="" id="email_account_name" name="email_account_name" value="<?php echo $data['email_account_name'];?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="email_account_description" id="email_account_description" rows="5" maxlength="255" required=""><?php echo $data['email_account_description'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Email Account Protocol</label>
                                    <div class="col-sm-10">
                                        <select id="protocol" name="protocol" class="form-control" required="" value="<?php echo $data['protocol'];?>">
                                            <option value="IMAP" <?php echo ($data['protocol'] == 'IMAP') ? 'selected="selected"' : '';?>>IMAP</option>
                                            <option value="POP3" <?php echo ($data['protocol'] == 'POP3') ? 'selected="selected"' : '';?>>POP3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Auth Mode for POP3 protocol only</label>
                                    <div class="col-sm-10">
                                        <select id="pop3_auth_mode" name="pop3_auth_mode" class="form-control" value="<?php echo $data['pop3_auth_mode'];?>" required="">
                                            <option value="BEST" <?php echo ($data['pop3_auth_mode'] == 'BEST') ? 'selected="selected"' : '';?>>BEST</option>
                                            <option value="PASS" <?php echo ($data['pop3_auth_mode'] == 'PASS') ? 'selected="selected"' : '';?>>PASS</option>
                                            <option value="APOP" <?php echo ($data['pop3_auth_mode'] == 'APOP') ? 'selected="selected"' : '';?>>APOP</option>
                                            <option value="CRAM-MD5" <?php echo ($data['pop3_auth_mode'] == 'CRAM-MD5') ? 'selected="selected"' : '';?>>CRAM-MD5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Reply-to Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_replyto_address" name="email_replyto_address" value="<?php echo $data['email_replyto_address'];?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Server</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_account_server" name="email_account_server" value="<?php echo $data['email_account_server'];?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account User</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_account_user" name="email_account_user" value="<?php echo $data['email_account_user'];?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="password" placeholder="" id="email_account_pass" name="email_account_pass" value="<?php echo $data['email_account_pass'];?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Email Frequency Check Rate</label>
                                    <div class="col-sm-10">
                                        <select id="email_frequency_check_mins" name="email_frequency_check_mins" class="form-control" value="<?php echo $data['email_frequency_check_mins'];?>">
                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                <option value="<?php echo ($i * 5); ?>" <?php echo ($data['email_frequency_check_mins'] == ($i * 5)) ? 'selected="selected"' : '';?>><?php echo ($i * 5); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">In Group ID</label>
                                    <div class="col-sm-10">
                                        <select id="group_id" name="group_id" class="form-control" value="<?php echo $data['group_id'];?>">
                                            <option value="">Select Group</option>
                                            <?php foreach ($InboundGroup as $group) { ?>
                                                <option value="<?php echo $group['group_id']; ?>" <?php echo ($data['group_id'] == $group['group_id']) ? 'selected="selected"' : '';?>><?php echo $group['group_id'] . ' - ' . $group['group_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Default List ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="default_list_id" name="default_list_id" value="<?php echo $data['default_list_id'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">In Group List ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="list_id" name="list_id" value="<?php echo $data['list_id'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">In Group Campaign ID</label>
                                    <div class="col-sm-10">
                                        <select id="campaign_id" name="campaign_id" class="form-control" required="" value="<?php echo $data['campaign_id'];?>">
                                            <option value="">Select Campaign</option>
                                            <?php foreach ($CampaignListing as $listing) { ?>
                                                <option value="<?php echo $listing['campaign_id']; ?>" <?php echo ($data['campaign_id'] == $listing['campaign_id']) ? 'selected="selected"' : '';?>><?php echo $listing['campaign_id'] . ' - ' . $listing['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">User Group</label>
                                    <div class="col-sm-10">

                                        <select id="user_group" name="user_group" class="form-control" required="" value="<?php echo $data['user_group'];?>">
                                            <option value="---ALL---">ALL</option>
                                            <?php foreach ($UserGroup as $group) { ?>
                                                <option value="<?php echo $group['user_group']; ?>" <?php echo ($data['user_group'] == $group['user_group']) ? 'selected="selected"' : '';?>><?php echo $group['user_group'] . ' - ' . $group['group_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Active</label>
                                    <div class="col-sm-10">
                                        <select id="active" name="active" class="form-control" value="<?php echo $data['active'];?>">
                                            <option value="Y" <?php echo ($data['active'] == 'Y') ? 'selected="selected"' : '';?>>Y</option>
                                            <option value="N" <?php echo ($data['active'] == 'N') ? 'selected="selected"' : '';?>>N</option>
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
    $(document).on('submit', '#CreateForm', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var form = $('#CreateForm')[0];

        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('settings/ajax') ?>?action=UpdateEmailAccounts&editID=<?php echo $_GET['editID'];?>',
            data: data,
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            cache: false,
            success: function (data) {
                var Result = JSON.parse(data);
               
                if (Result.success === 1) {
                    var MsgType = 'success';
                } else {
                    var MsgType = 'error';
                }
                $.toast({
                    heading: 'Email Account Setting',
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
</script>