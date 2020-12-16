<?php
if (checkRole('inbound_groups', 'view') || checkRole('inbound_groups', 'create')) {
    
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
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage Voicemail</div>
                                <ul class="nav panel-tabs">
                                    <?php if (checkRole('inbound_groups', 'create')): ?>
                                    <li> <a href="#Audio-Modal" data-toggle="modal"><i class="fa fa-plus text-success"></i></a></li>
                                    <?php endif; ?>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>VOICEMAIL ID</th>
                                            <th>Name</th>
                                            <th>Active</th>
                                            <th>New Message</th>
                                            <th>Old Messsage</th>
                                            <th>Team</th>
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
            <form method="post" name="" action="" autocomplete="OFF" id="VoiceMailSave">
                <input type="hidden" name="action" value="" id="action_perform"/>
                <div class="modal-content">
                    <div class="modal-header bg-success justify-content-center">
                        <h4 class="modal-title"><i class="fa fa-headphones"></i> Add Voicemail</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="CampaignName">Voicemail ID</label>
                            <input type="text" class="form-control" id="voicemail_id" name="voicemail_id" placeholder="Enter Voicemail ID" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="fileMusic">Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="fileMusic">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="fileMusic">Pass</label>
                            <input type="text" class="form-control" id="pass" name="pass" required=""/>
                        </div>
                        <?php // if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                            <div class="form-group">
                                <label for="campaign_description">Team</label>
                                <select class="form-control" name="user_group"  required="">
                                                    <option value="">--Select Option--</option>
                                                    <?php if ($_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { 
                                                        
                                                        $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                                    
?>
                                                        <option value="---ALL---">---ALL---</option>
                                                    <?php }else{
                                                            $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER' => ['user_group' => 'ASC']]);
                                                    }
                                        foreach ($UserGroupListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                    <?php } ?>

                            </select>
                               
                            </div>
                        <?php // } else { ?>

                        <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group']; ?>" id="user_group"/>-->
                        <?php // } ?>
                        <div class="form-group">
                            <label for="fileMusic">Active</label>
                            <button type="button" class="btn btn-toggle VoiceMailActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <input type="hidden" name="active" value="" id="active"/>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                        <button type="reset" class="btn btn-default float-right">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>

        $(document).ready(function () {
            $('.VoiceMailActive').click(function () {
                if (!$(this).hasClass('active')) {
                    $('#active').val('Y');
                } else {
                    $('#active').val('N');
                }

            });
        });
<?php if (checkRole('inbound_groups', 'view')): ?>
        var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetVoiceMail',
                "type": "POST",
            },

            "columns": [
                {"data": "voicemail_id"},
                {"data": "fullname"},
                {"data": "active"},
                {"data": "messages"},
                {"data": "old_messages"},
                {"data": "user_group"},
                {"data": "Action",
                    "render": function (data, type, row, meta) {
                        <?php if (checkRole('inbound_groups', 'edit') && checkRole('inbound_groups', 'delete')){ ?>
                        return '<a href="javascript:void(0);" class="btn btn-success btn-app VoiceMail" action="edit" voicemail_id="' + row.voicemail_id + '"><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app VoiceMail" action="remove" voicemail_id="' + row.voicemail_id + '"><i class="fa fa-times"></i></a>';
                        <?php }elseif(checkRole('inbound_groups', 'edit')){ ?>
                            return '<a href="javascript:void(0);" class="btn btn-success btn-app VoiceMail" action="edit" voicemail_id="' + row.voicemail_id + '"><i class="fa fa-arrow-right"></i></a>';
                        <?php }elseif(checkRole('inbound_groups', 'delete')){?>
                            return '<a href="javascript:void(0);" class="btn btn-danger btn-app VoiceMail" action="remove" voicemail_id="' + row.voicemail_id + '"><i class="fa fa-times"></i></a>';
                        <?php }else{?>
                            return '---';
                        <?php }?>
                    }
                },
            ],

        });
<?php endif;?>
        $(document).on('submit', '#VoiceMailSave', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $('#VoiceMailSave')[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('settings/ajax') ?>?action=SaveVoicemail',
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                success: function (data) {
                   
                    var Result = JSON.parse(data);
                    if (Result.success === 1) {
                        $('#Audio-Modal').modal('hide');
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        $('#VoiceMailSave')[0].reset();
                        $('#action_perform').val('');
                        $('#voicemail_id').attr('readonly',false);
                        var MsgType = 'success';
                    } else {
                        var MsgType = 'error';
                    }
                    $.toast({
                        heading: 'Voicemail Setting',
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



        $(document).on('click', '.VoiceMail', function () {
            var voicemail_id = $(this).attr('voicemail_id');
            var action = $(this).attr('action');
            if (action == 'edit') {
                $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('settings/ajax') ?>?action=DetailVoicemail',
                            data: {VoicemailID: voicemail_id},
                            success: function (data) {
                                var Result = JSON.parse(data);
                                $('#action_perform').val('edit');
                                $('#voicemail_id').val(Result.data['voicemail_id']);
                                $('#voicemail_id').attr('readonly',true);
                                $('#fullname').val(Result.data['voicemail_id']);
                                $('#fullname').val(Result.data['fullname']);
                                $('#email').val(Result.data['email']);
                                $('#pass').val(Result.data['pass']);
                                $('#user_group').val(Result.data['user_group']);
                                if(Result.data['active'] == 'Y'){
                                    $('.VoiceMailActive').addClass('active');
                                    $('#active').val('Y');
                                }else{
                                    $('#active').val('N');
                                }
                                $('#Audio-Modal').modal('show');
                            }
                        });
            } else {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Voicemail!",
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
                            url: '<?php echo base_url('settings/ajax') ?>?action=DeleteVoicemail',
                            data: {VoicemailID: voicemail_id},
                            success: function (data) {

                                var Result = JSON.parse(data);
                                $.toast({
                                    heading: 'Voicemail Setting',
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
            }


        });
    </script>
<?php }else{ 
no_permission();
 }?>