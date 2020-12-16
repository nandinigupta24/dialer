<?php if (!checkRole('settings', 'create')) {
    no_permission();
} else { ?>
    <style>
        .error_background{ border-color: red; } .error { color: red; margin-left: 5px; } label.error { display: inline; } .hidden-row{ display:none; } .range-slider { -webkit-appearance: none; width: 100%; height: 8px; border-radius: 5px; background: #d3d3d3; outline: none; opacity: 0.7; -webkit-transition: .2s; transition: opacity .2s; } .range-slider:hover { opacity: 1; } .range-slider::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; } th{ font-size: 13px !important; font-weight: 700 !important; } .range-slider::-moz-range-thumb { width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!--    <section class="content-header">
            <h1>
                Create Phone
            </h1>
            <p>Create from this page</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('phones') ?>">Phones</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6">
                    <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Create Phone</div>
                        </div>
                        <div class="panel-body">
                                   
                                    <form method="POST"  accept-charset="UTF-8" id="createNewPhone" autocomplete="off" novalidate="novalidate">
                                        
                                        <div class="pad">

                                            <div class="form-group">
                                                <label for="extension_number" class="col-form-label">Extension Number</label>
                                                <!--<div class="col-sm-10">-->
                                                    <input class="form-control" maxlength="10" type="text" placeholder="Max 10 Characters" id="extension_number" name="extension_number">
                                                <!--</div>-->
                                            </div>
<!--                                            <div class="form-group row">
                                                <label for="dialplan_number" class="col-sm-2 col-form-label">Dialplan Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" maxlength="10" type="text" placeholder="Max 10 Characters" id="dialplan_number" name="dialplan_number">
                                                </div>
                                            </div>-->
                                            <!---------------------------------------------------------->
<!--                                            <div class="form-group row">
                                                <label for="voicemail_number" class="col-sm-2 col-form-label">Voicemail Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control"  maxlength="30"  type="text" placeholder="Max 30 Characters" id="voicemail_number" name="voicemail_number">
                                                </div>
                                            </div>-->

<!--                                            <div class="form-group row">
                                                <label for="outbound_caller_id" class="col-sm-2 col-form-label">Outbound Caller ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" maxlength="30" type="text" placeholder="Max 30 Characters" id="outbound_caller_id" name="outbound_caller_id">
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="server" class="col-form-label">Server</label>
                                                <!--<div class="col-sm-10">-->
                                                    <select id="server" name="server" class="form-control"></select>
                                                <!--</div>-->



                                            </div>
<!--                                            <div class="form-group">
                                                <label for="agent_login" class="col-form-label">Agent Login</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" maxlength="15" type="text" placeholder="Max 15 Characters" id="agent_login" name="agent_login">
                                                </d iv>
                                            </div>-->
<!--                                            <div class="form-group">
                                                <label for="agent_password" class="col-form-label">Agent Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" maxlength="10" type="text" placeholder="Max 10 Characters" id="agent_password" name="agent_password">
                                                </div>
                                            </div>-->
<!--                                            <div class="form-group">
                                                <label for="registration_password" class="col-form-label">Registration Password</label>
                                                <div class="col-sm-10">
                                                    <input maxlength="20" class="form-control" type="text" placeholder="Max 20 Characters" id="registration_password" name="registration_password">
                                                </div>
                                            </div>-->
                                            
                                            <div class="form-group">
                                                <label for="protocol" class="col-form-label">Protocol</label>
                                                <!--<div class="col-sm-10">-->
                                                    <select id="protocol" name="protocol" class="form-control">
                                                        <option value="">Select </option>
                                                        <option value="SIP">SIP</option>
                                                        <option value="Zap">Zap</option>
                                                        <option value="IAX2">IAX2</option>
                                                        <option value="EXTERNAL">EXTERNAL</option>
                                                        <option value="DAHDI">DAHDI</option>
                                                    </select>
                                                <!--</div>-->
                                            </div>
<?php if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                            <div class="form-group">
                                                <label for="extension_number" class="col-form-label">User Group</label>
                                                <!--<div class="col-sm-10">-->
                                                        <?php $UserGroup = $database->select('vicidial_user_groups', ['user_group', 'group_name'],['ORDER'=>['user_group'=>'ASC']]); ?>
                                                    <select id="user_group" name="user_group" class="form-control field-validate" required="">
                                                        <option value="---ALL---">ALL</option>
                                                        <?php foreach ($UserGroup as $group) { ?>
                                                            <option value="<?php echo $group['user_group']; ?>"><?php echo $group['user_group'].' - '.$group['group_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <!--</div>-->
                                            </div>
<?php }else{?>
<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>" />
<?php }?>
<div class="form-group">
                                                <label for="active" class="col-form-label">Active</label>
                                                <!--<div class="col-sm-10">-->
                                                    <select id="active" name="active" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                <!--</div>-->
                                            </div>
                                        </div>
                                        <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                            <div class="col-sm-6">
                                                <a onclick="reset()"class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="ajax-disable btn  btn-success m10" onclick="validateAndSubmit()" style="float:right;" href="#">Create</a>
                                            </div>
                                        </div>
                                    </form>
                                    <!--<a class="ajax-disable btn  btn-success m10" onclick="$('#create_team').trigger('submit');" style="float:right;" href="#">Create</a>-->

                               
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
                        Your phone has been successfully created.
                    </div>

                    <p>Phone Extension:- <span class="ColumnExtension"></span></p>
                    <p>Phone Login:- <span class="ColumnLogin"></span></p>
                    <p>Phone Password:- <span class="ColumnPass"></span></p>

                    <p><b>If you want to go on detail page ,please click on Phone Detail Page.</b></p>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                    <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Phone Detail Page</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: '<?php echo base_url('settings/ajax') ?>?action=getServers',
                //data: postData, // serializes the form's elements.
                success: function (response) {
                    var result = JSON.parse(response);
                    $("#server").append(result.data);
                }
            });
        })
        function reset() {
            $("#createNewPhone").trigger('reset');
        }
        function validateAndSubmit() {
            var extension_number = $('#extension_number').val();
//            var dialplan_number = $('#dialplan_number').val();
//            var voicemail_number = $('#voicemail_number').val();
    //     var outbound_caller_id = $('#outbound_caller_id').val();
            var server = $('#server option:selected').val();
//            var agent_login = $('#agent_login').val();
//            var agent_password = $('#agent_password').val();
//            var registration_password = $('#registration_password').val();
            var active = $('#active option:selected').val();
            var protocol = $('#protocol option:selected').val();


            var error = 0;
            $(".error").remove();
            $('#extension_number').removeClass('error_background');
//            $('#dialplan_number').removeClass('error_background');
//            $('#voicemail_number').removeClass('error_background');
    //    $('#outbound_caller_id').removeClass('error_background');
            $('#server').removeClass('error_background');
//            $('#agent_login').removeClass('error_background');
//            $('#agent_password').removeClass('error_background');
//            $('#registration_password').removeClass('error_background');
            $('#active').removeClass('error_background');
            $('#protocol').removeClass('error_background');

            if (extension_number.length < 1) {
                error = error + parseInt(1);
                $('#extension_number').addClass('error_background');
                $('#extension_number').after('<span class="error">This field is required</span>');
            }

//            if (dialplan_number.length < 1) {
//                error = error + parseInt(1);
//                $('#dialplan_number').addClass('error_background');
//                $('#dialplan_number').after('<span class="error">This field is required</span>');
//            }
//            if (voicemail_number.length < 1) {
//                error = error + parseInt(1);
//                $('#voicemail_number').addClass('error_background');
//                $('#voicemail_number').after('<span class="error">This field is required</span>');
//            }

    //    if (outbound_caller_id.length < 1) {
    //      error = error+ parseInt(1);
    //      $('#outbound_caller_id').addClass('error_background');
    //      $('#outbound_caller_id').after('<span class="error">This field is required</span>');
    //    }


//            if (agent_login.length < 1) {
//                error = error + parseInt(1);
//                $('#agent_login').addClass('error_background');
//                $('#agent_login').after('<span class="error">This field is required</span>');
//            }
//
//            if (agent_password.length < 1) {
//                error = error + parseInt(1);
//                $('#agent_password').addClass('error_background');
//                $('#agent_password').after('<span class="error">This field is required</span>');
//            }

//            if (registration_password.length < 1) {
//                error = error + parseInt(1);
//                $('#registration_password').addClass('error_background');
//                $('#registration_password').after('<span class="error">This field is required</span>');
//            }

            if (server == '') {
                error = error + parseInt(1);
                $('#server').addClass('error_background');
                $('#server').after('<span class="error">This field is required</span>');
            }
            if (protocol == '') {
                error = error + parseInt(1);
                $('#protocol').addClass('error_background');
                $('#protocol').after('<span class="error">This field is required</span>');
            }

            if (active == '') {
                error = error + parseInt(1);
                $('#active').addClass('error_background');
                $('#active').after('<span class="error">This field is required</span>');
            }

            if (error == 0) {
                var FormNewCallOne = $('#createNewPhone').serialize();
                var postData = FormNewCallOne;
                //alert('form submit');
                //console.log('postData',postData);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('settings/ajax') ?>?action=AddNewPhone',
                    data: postData, // serializes the form's elements.
                    success: function (data) {
                        
                        //console.log('data',data);
                        var result = JSON.parse(data);
                        var msgAlert = '';
                        if(result.success === 1){
                            msgAlert = 'success';
                            $("#createNewPhone").trigger('reset');

                            $('#modal-success').modal('show');

                            $('.ColumnExtension').html(result.data.ColumnExtension);
                            $('.ColumnLogin').html(result.data.ColumnLogin);
                            $('.ColumnPass').html(result.data.ColumnPass);

                            $('.ColumnDetailPage').attr('href', 'phone_edit?extension=' + result.data.ColumnExtension);
                        }else{
                            msgAlert = 'error';
                        } 
                            
                        
                        $.toast({
                            heading: 'Phone Setting',
                            //text: 'Your phone has been created successfully.!',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: msgAlert,
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                });

            }

        }
    </script>
<?php } ?>
