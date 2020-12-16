<?php
if (!checkRole('inbound_groups', 'create')) {
    no_permission();
} else {
    ?>
    <div class ="content-wrapper" >
        <section class="content">
            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 400px;">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Add A New Inbound Group</div>
                            <!--                            <ul class="nav panel-tabs">
                                                            <li class="active"><a class="ajax-disable" id="team1btn" href="#team1" data-toggle="tab"><span class="fa fa-pencil text-blue2"></span></a></li>
                                                        </ul>-->
                        </div> 
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">

                                <div id="team1" class="tab-pane active p15 form-horizontal">
                                    <!--                                    <h5 class="mb5">Inbound Group Details</h5>
                                                                        <hr class="m5 mb20">-->
                                    <form id="create_inbound_group" action="<?php echo base_url('inbound_groups/ajax') ?>?action=Insertgroup"  method="POST">
                                       
                                        <div class="form-group create_team_required">
                                            <label for="group_id" class="col-lg-4 control-label">Group ID</label>
                                            <div class="col-lg-12">
                                                <input id="group_id" name="group_id" type="text" maxlength="11" class="form-control" placeholder="Max 11 Numbers" required="">
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_name" class="col-lg-4 control-label">Group Name</label>
                                            <div class="col-lg-12">
                                                <input id="group_name" name="group_name" type="text" maxlength="30" class="form-control" placeholder="Max 30 characters" required="">
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_color" class="col-lg-4 control-label">Group Color</label>
                                            <div class="col-lg-12">
                                                <input id="group_color" name="group_color" type="color" class="form-control" value="#000000"/>
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_color" class="col-lg-4 control-label">Group Handling</label>
                                            <div class="col-lg-12">
                                                 <select class="form-control" name="group_handling"  required="">
                                                     <?php if(!empty($_SESSION['CurrentLogin']['License']['PHONE']) && $_SESSION['CurrentLogin']['License']['PHONE'] == 'Active'  || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                                     <option value="PHONE">PHONE</option>
                                                     <?php }?>
                                                     <?php if(!empty($_SESSION['CurrentLogin']['License']['EMAIL']) && $_SESSION['CurrentLogin']['License']['EMAIL'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                                     <option value="EMAIL">EMAIL</option>
                                                     <?php }?>
                                                     <?php if(!empty($_SESSION['CurrentLogin']['License']['CHAT']) && $_SESSION['CurrentLogin']['License']['CHAT'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                                     <option value="CHAT">CHAT</option>
                                                     <?php }?>
                                                 </select>
                                            </div>
                                        </div>
                                        <?php //  if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {?>
                                        <div class="form-group create_team_required">
                                            <label for="group_color" class="col-lg-4 control-label">Select Team</label>
                                            <div class="col-lg-12">
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
                                        </div>
                                        <?php // }else{?>
                                        <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>-->
                                        <?php // }?>
                                        <div class="form-group create_team_required">
                                            <label for="active" class="col-lg-4 col-form-label">Group Active</label>
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-sm btn-toggle SwitchUserBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="active" value="N">
                                            </div>
                                        </div>
                                        <hr/>
                                        <button class="btn btn-success btn-app" type="submit">Create</button>
                                        <button class="btn btn-default btn-app" type="reset">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-visible formtabs">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Clone An Inbound Group</div>
                            <!--                            <ul class="nav panel-tabs">
                                                            <li class="active"><a class="ajax-disable" id="team1btn" href="#team1" data-toggle="tab"><span class="fa fa-pencil text-blue2"></span></a></li>
                                                        </ul>-->
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">

                                <div id="team1" class="tab-pane active p15 form-horizontal">
                                    <!--                                    <h5 class="mb5">Clone Inbound Group Details</h5>
                                                                        <hr class="m5 mb20">-->
                                    <form method="post" id="CopyGroupID">

                                        <div class="form-group clone_group_required">
                                            <label for="copy_group_id" class="col-lg-4 control-label">Group ID</label>
                                            <div class="col-lg-12">
                                                <input id="copy_group_id" name="group_id" type="text" maxlength="11" class="form-control" placeholder="Max 11 Numbers" required="">
                                            </div>
                                        </div>
                                        <div class="form-group clone_group_required">
                                            <label for="copy_group_name" class="col-lg-4 control-label">Group Name</label>
                                            <div class="col-lg-12">
                                                <input id="copy_group_name" name="group_name" type="text" maxlength="30" class="form-control" placeholder="Max 30 characters" required="">
                                            </div>
                                        </div>
                                        <div class="form-group clone_group_required">
                                            <label for="copy_group_color" class="col-lg-4 control-label">Group Color</label>
                                            <div class="col-lg-12">
                                                <input id="copy_group_color" name="group_color" type="color" class="form-control" value="#000000"/>
                                            </div>
                                        </div>
                                        <div class="form-group clone_group_required">
                                            <label for="copy_copy_clone" class="col-lg-4 control-label">Clone Group</label>
                                            <div class="col-lg-12">
                                                <?php
                                                if ($_SESSION['CurrentLogin']['user_group'] != 'ADMIN') {
                                                    $InboundGroupListing = $database->select('vicidial_inbound_groups', '*', ['AND' => ['active' => 'Y', 'user_group' => $_SESSION['CurrentLogin']['user_group']]]);
                                                } else {
                                                    $InboundGroupListing = $database->select('vicidial_inbound_groups', '*', ['active' => 'Y']);
                                                }
                                                ?>
                                                <select id="copy_copy_clone" name="copy_clone" class="form-control select2" style="width:100%">
                                                    <option value="">Select Inbound Group</option>
                                                    <?php foreach ($InboundGroupListing as $listingInboundGroup) { ?>
                                                        <option value="<?php echo $listingInboundGroup['group_id']; ?>"><?php echo $listingInboundGroup['group_id'] . ' - ' . $listingInboundGroup['group_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group clone_campaign_required">
                                            <label for="active" class="col-lg-4 control-label">Group Active</label>
                                            <div class="col-sm-12">
                                                <br>
                                                <button type="button" class="btn btn-sm btn-toggle SwitchUserBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="active" value="N">
                                            </div>
                                        </div>
                                        <hr/>
                                        <button class="btn btn-success btn-app" type="submit">Copy</button>
                                        <button class="btn btn-default btn-app" type="reset">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div></section></div>
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
                        Your inbound group has been successfully created.
                    </div>

                    <p>Inbound Group ID:- <span class="ColumnID"></span></p>
                    <p>Inbound Group Name:- <span class="ColumnName"></span></p>

                    <p><b>If you want to go on detail page ,please click on Inbound Group Detail Page.</b></p>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                    <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Inbound Group Detail Page</a>
                </div>
            </div>
        </div>
    </div>
    <script>

        $("#create_inbound_group").on('submit', function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Inbound Group',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#create_inbound_group')[0].reset();
                        $('#modal-success').modal('show');

                        $('.ColumnID').html(result.data.ColumnID);
                        $('.ColumnName').html(result.data.ColumnName);

                        $('.ColumnDetailPage').attr('href', 'group_edit?group_id=' + result.data.ColumnID);
                    } else {
                        $.toast({
                            heading: 'Inbound Group',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        });

        $("#CopyGroupID").on('submit', function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('inbound_groups/ajax') ?>?action=CloneInboundGroup',
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Inbound Group',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#CopyGroupID')[0].reset();
                        $('#modal-success').modal('show');

                        $('.ColumnID').html(result.data.ColumnID);
                        $('.ColumnName').html(result.data.ColumnName);

                        $('.ColumnDetailPage').attr('href', 'group_edit?group_id=' + result.data.ColumnID);
                    } else {
                        $.toast({
                            heading: 'Inbound Group',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        });


        $(document).on('click', '.SwitchUserBTN', function () {
            if ($(this).hasClass('active')) {
                var value = 'Y';
            } else {
                var value = 'N';
            }
            $(this).parent().find('input').val(value);
        });
    </script>
<?php } ?>
