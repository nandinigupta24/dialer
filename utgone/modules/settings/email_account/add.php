<?php
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
                        <div class="panel-title"> <span class="fa fa-plus"></span>Create NEW INBOUND EMAIL ACCOUNT</div>
                    </div>
                    <div class="panel-body pn">

                        <form method="POST"  accept-charset="UTF-8" id="CreateForm" autocomplete="off">

                            <div class="pad">

                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Email Account ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="20" type="text" placeholder="" id="email_account_id" name="email_account_id" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="100" type="text" placeholder="" id="email_account_name" name="email_account_name" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="email_account_description" id="email_account_description" rows="5" maxlength="255" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Email Account Protocol</label>
                                    <div class="col-sm-10">
                                        <select id="protocol" name="protocol" class="form-control" required="">
                                            <option value="IMAP">IMAP</option>
                                            <option value="POP3">POP3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Auth Mode for POP3 protocol only</label>
                                    <div class="col-sm-10">
                                        <select id="pop3_auth_mode" name="pop3_auth_mode" class="form-control" required="">
                                            <option value="BEST">BEST</option>
                                            <option value="PASS">PASS</option>
                                            <option value="APOP">APOP</option>
                                            <option value="CRAM-MD5">CRAM-MD5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Reply-to Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_replyto_address" name="email_replyto_address" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Server</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_account_server" name="email_account_server" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account User</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="email_account_user" name="email_account_user" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Email Account Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="password" placeholder="" id="email_account_pass" name="email_account_pass" required=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Email Frequency Check Rate</label>
                                    <div class="col-sm-10">
                                        <select id="email_frequency_check_mins" name="email_frequency_check_mins" class="form-control">
                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                <option value="<?php echo ($i * 5); ?>"><?php echo ($i * 5); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">In Group ID</label>
                                    <div class="col-sm-10">
                                        <select id="group_id" name="group_id" class="form-control">
                                            <option value="">Select Group</option>
                                            <?php foreach ($InboundGroup as $group) { ?>
                                                <option value="<?php echo $group['group_id']; ?>"><?php echo $group['group_id'] . ' - ' . $group['group_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">Default List ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="default_list_id" name="default_list_id"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dialplan_number" class="col-sm-2 col-form-label">In Group List ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" maxlength="" type="text" placeholder="" id="list_id" name="list_id" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">In Group Campaign ID</label>
                                    <div class="col-sm-10">
                                        <select id="campaign_id" name="campaign_id" class="form-control" required="">
                                            <option value="">Select Campaign</option>
                                            <?php foreach ($CampaignListing as $listing) { ?>
                                                <option value="<?php echo $listing['campaign_id']; ?>"><?php echo $listing['campaign_id'] . ' - ' . $listing['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">User Group</label>
                                    <div class="col-sm-10">

                                        <select id="user_group" name="user_group" class="form-control field-validate" required="">
                                            <option value="---ALL---">ALL</option>
                                            <?php foreach ($UserGroup as $group) { ?>
                                                <option value="<?php echo $group['user_group']; ?>"><?php echo $group['user_group'] . ' - ' . $group['group_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Active</label>
                                    <div class="col-sm-10">
                                        <select id="active" name="active" class="form-control">
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <button  class="btn btn-default btn-sm" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-success btn-app pull-right" type="submit">Create</button>
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
                    Your Email Account has been successfully created.
                </div>

                <p>Email Account ID:- <span class="ColumnID"></span></p>
                <p>Email Account Name:- <span class="ColumnName"></span></p>

                <p><b>If you want to go on detail page ,please click on Email Account Detail Page.</b></p>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Email Account Detail Page</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '#CreateForm', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var form = $('#CreateForm')[0];

        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('settings/ajax') ?>?action=InsertEmailAccounts',
            data: data,
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            cache: false,
            success: function (data) {
                var Result = JSON.parse(data);
               
                if (Result.success === 1) {
                     $('#modal-success').modal('show');
                     $('.ColumnID').html(Result.data.EmailAccountID);
                     $('.ColumnName').html(Result.data.EmailAccountName);
                     $('.ColumnDetailPage').attr('href','?action=edit&editID='+Result.data.EmailAccountID);
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