<?php
if (!checkRole('settings', 'edit')) {
    no_permission();
} else {
    $templates = $database->select('vicidial_conf_templates', '*');
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <input id="rev_dailplan_number" type="hidden" value ="<?php echo $_REQUEST['extension'] ?>">
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="panel">
                        <!-- /.box-header -->

                        <!-- Nav tabs -->
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-book"></i> Phone : <span class="phone_number cam-name"></span></span>
                            <ul class="nav nav-tabs justify-content-end pull-right">
                                <li class="nav-item"><a class="nav-link show active" href="#2tabInfo" data-toggle="tab" data-pop="popover" title="Manage campaign general information" data-content="Manage campaign general information" data-original-title="General information"><i class="fa fa-info"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#2tabQueStrategy" data-toggle="tab" data-pop="popover" title="Queue Settings i.e. queue order, queue size" data-content="Queue Settings i.e. queue order, queue size." data-original-title="Username and Password Settings"><i class="fa fa-key"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#3tabQueStrategy" data-toggle="tab" data-pop="popover" title="Webphone" data-content="Webphone." data-original-title="Webphone"><i class="fa fa-tty"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body pn">
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane" id="tabDashboard" role="tabpanel">
                                    <div class="pad">

                                    </div>                             </div>
                                <div class="tab-pane active show" id="tabSetting" role="tabpanel">
                                    <style type="text/css">
                                        .setting-tabs>li {
                                            margin-bottom: 0px !important;
                                            margin-right: 0px !important;
                                            border: 1px solid #ddd;
                                        }
                                        .nav-tabs-custom>.nav-tabs>li a.active {
                                            border-bottom: none;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="tab-content">
                                                <!--INFO -->
                                                <div class="tab-pane active" id="2tabInfo">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-info"></i> General information</span>
                                                        </div>
                                                        <div class="panel-body pn">
                                                            <div class="form-group">
                                                                <label for="extension">Extension Number</label>
                                                                <input id="extension_number" name="extension" type="number" class="form-control manage-field-text" min="1" max="99999999" value="9898">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="dialplan_number">Dialplan Number</label>
                                                                <input id="dialplan_number" name="dialplan_number" type="number" class="form-control manage-field-text" min="1" max="99999999" value="9898">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="voicemail_id">Voicemail Number</label>
                                                                <input id="voicemail_number" name="voicemail_id" type="number" class="form-control manage-field-text" min="1" max="99999999" value="9898">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="outbound_cid">Outbound Caller ID</label>
                                                                <input id="outbound_caller_id" name="outbound_cid" type="number" class="form-control manage-field-text" min="1" max="99999999999999999999" value="9898">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">Server</label>
                                                                <select id="server" name="server_ip" class="form-control manage-field-text"></select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="server_ip">User Group</label>
                                                                <?php if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                                            $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['ORDER'=>['user_group'=>'ASC']]);
                                                                        }else{
                                                                            $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['user_group'=>'ASC']]);
                                                                         }
                                                                ?>
                                                                <select id="user_group" name="user_group" class="form-control manage-field-text">
                                                                    <!--<option value="---ALL---">ALL</option>-->
                                                                    <?php foreach ($UserGroup as $group) { ?>
                                                                        <option value="<?php echo $group['user_group']; ?>"><?php echo $group['user_group'].' - '.$group['group_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-md-12" for="campaign_active_btn">Active:</label>
                                                                    <div class="col-md-12" id="active">
                                                                        <button type="button" class="btn btn-sm btn-toggle  manage-field-switch active" data-toggle="button" aria-pressed="false" autocomplete="off" value="Y" data-name="active">
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="2tabQueStrategy">

                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-key"></i> Username and Password Settings</span>
                                                        </div>
                                                        <div class="panel-body pn">
                                                            <div class="form-group">
                                                                <label for="agent_login" class="control-label">Agent Login</label>
                                                                    <input id="agent_login" name="login" type="text" class="form-control manage-field-text" maxlength="15" value="9898">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pass" class="control-label">Agent Password</label>
                                                                    <input id="agent_password" name="pass" type="text" class="form-control manage-field-text" maxlength="10" value="9898">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="conf_secret" class="control-label">Registration Password</label>
                                                                    <input id="registration_password" name="conf_secret" type="text" class="form-control manage-field-text" maxlength="20" value="9898">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fullname" class="control-label">Full Name</label>
                                                                    <input id="fullname" name="fullname" type="text" class="form-control manage-field-text" maxlength="50" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="control-label">Email</label>
                                                                    <input id="email" name="email" type="text" class="form-control manage-field-text" maxlength="50" value="">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="3tabQueStrategy">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <span class="panel-title"><i class="fa fa-tty"></i> Webphone</span>
                                                        </div>

                                                        <div class="panel-body pn">
                                                            <div class="form-group">
                                                                <label for="agent_login" class="control-label">Webphone</label>
                                                                    <select id="is_webphone" name="is_webphone" class="form-control manage-field-select">
                                                                        <option value="N">No</option>
                                                                        <option value="Y">Yes</option>
                                                                        <option value="Y_API_LAUNCH">Api Launch</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="agent_login" class="control-label">Webphone Auto Answere</label>
                                                                    <select id="webphone_auto_answer" name="webphone_auto_answer" class="form-control manage-field-select">
                                                                        <option value="Y">Yes</option>
                                                                        <option value="N">No</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="agent_login" class="control-label">Webphone Temp</label>
                                                                    <select id="template_id" name="template_id" class="form-control manage-field-select">
                                                                        <option value="--NONE--">--NONE--</option>
                                                                        <?php foreach ($templates as $template): ?>
                                                                            <option value="<?php echo $template['template_id']; ?>"><?php echo $template['template_id']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <style type="text/css">
                            .custom-file-input{
                                display:none;
                            }
                        </style>                            </div>
                    <!-- nav tab-->
                </div>
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    </div></section>
    <!-- /.content -->
    </div>
    <script>


        $(document).on('focusout', '.manage-field-text', function (e) {
            var rev_dailplan_number = $('#rev_dailplan_number').val();
            e.preventDefault();
            var id = rev_dailplan_number
            var name = $(this).attr('name');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=field_update_phone',
                data: {id: id, name: name, val: val, type: 'text'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('change', '.manage-field-select', function (e) {
            var rev_dailplan_number = $('#rev_dailplan_number').val();
            e.preventDefault();
            var id = rev_dailplan_number
            var name = $(this).attr('name');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=field_update_phone',
                data: {id: id, name: name, val: val, type: 'text'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });


        $(document).on('click', '.manage-field-switch', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            if ($(this).hasClass('active')) {
                val = 'Y';

            } else {

                val = 'N';

            }

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=field_update_phone',
                data: {id: id, name: name, val: val, type: 'switch'},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        showHideTransition: 'plain',
                    });
                }
            });
        });


        $(document).ready(function () {
            var rev_dailplan_number = $('#rev_dailplan_number').val();
            $.ajax({
                type: "GET",
                url: '<?php echo base_url('settings/ajax') ?>?action=getServers',
                success: function (response) {
                    var result = JSON.parse(response);
                    $("#server").append(result.data);
                }
            });

            $.ajax({
                type: "GET",
                url: '<?php echo base_url('settings/ajax') ?>?action=GetPhone&extension=' + rev_dailplan_number,
                success: function (response) {
                    var result = JSON.parse(response);
                    var data = result.data[0];
    //                    console.log('data==>',data);
                    $('span.phone_number').html(data.login);
                    $('div#active').html(data.active);
                    $('input#extension_number').val(data.extension);
                    $('input#dialplan_number').val(data.dialplan_number);
                    $('input#voicemail_number').val(data.voicemail_id);
                    $('input#outbound_caller_id').val(data.outbound_cid);
                    $('select#server').val(data.server_ip);
                    $('input#agent_login').val(data.login);
                    $('input#agent_password').val(data.pass);
                    $('input#registration_password').val(data.conf_secret);
                    $('input#fullname').val(data.fullname);
                    $('input#email').val(data.email);
                    $('select#is_webphone').val(data.is_webphone);
                    $('select#webphone_auto_answer').val(data.webphone_auto_answer);
                    $('select#template_id').val(data.template_id);
                    $('#user_group').val(data.user_group);
//                    console.log('Result by dailplain_number', result)
                }
            });
        })

    </script>
<?php } ?>
