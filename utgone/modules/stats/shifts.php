<?php
if (!checkRole('leaderboard', 'view')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-list-alt"></span>Campaigns Shifts</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <?php if (checkRole('leaderboard', 'create')) { ?>
                                        <li><a href="" data-toggle="modal" data-target="#modal-left"><i class="fa fa-plus" title="Add Shift"></i></a></li>
                                     <?php }?>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Campaign</th>
                                            <th>Agent</th>
                                            <th>Description</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>User Group</th>
                                            <th>Created AT</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=InsertShift" id="ShiftInsert">
        <div class="modal modal-right fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Campaign Shifts</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Campaign Selection</label>
                            <select class="form-control" name="campaign" id="SHIFT-CAMPAIGN" required="">
                                <option value="">Select Campaign</option>
                                <?php
                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER' => ['campaign_id' => 'ASC']]);
                                }else{
                                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
                                }
                               
                                foreach ($CampaignListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['campaign_id'] . ' - ' . $listings['campaign_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Agent Selection</label>
                            <select class="form-control select2" name="agent[]" id="SHIFT-AGENT" multiple="" required="" style="width:100%;">
                                <!--<option value="">Select Agent</option>-->
                                <?php
                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                                    $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER' => ['user' => 'ASC']]);
                                }else{
                                    $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['ORDER' => ['user' => 'ASC']]);
                                }
                               
                                foreach ($UserListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user']; ?>"><?php echo $listings['user'] . ' - ' . $listings['full_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Shift Description</label>
                            <textarea class="form-control" name="shift_description" id="SHIFT-DESCRIPTION" required=""></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="example_input_full_name">Shift Start Time</label>
                            <input class="form-control" type="time" placeholder="" id="SHIFT-START-TIME" name="shift_start_time" required="true"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="example_input_full_name">Shift End Time</label>
                            <input class="form-control" type="time" placeholder="" id="SHIFT-END-TIME" name="shift_end_time" required="true"/>
                        </div>
                        <?php if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                        <div class="form-group">
                            <label for="example_input_full_name">User Group</label>
                            <select class="form-control" name="user_group" id="SHIFT-USERGROUP" required="">
                                <option value="---ALL---">---ALL---</option>
                                <?php
                                $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                foreach ($UserGroupListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php }else{?>
                        <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>
                        <?php }?>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



 <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=EditShift" id="ShiftEdit">
        <div class="modal modal-right fade" id="modal-left-edit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Edit Campaign Shifts</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="SHIFT-ID-EDIT" value=""/>
                        <div class="form-group">
                            <label for="example_input_full_name">Campaign Selection</label>
                            <select class="form-control" name="campaign" id="SHIFT-CAMPAIGN-EDIT" required="">
                                <option value="">Select Campaign</option>
                                <?php
                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER' => ['campaign_id' => 'ASC']]);
                                }else{
                                    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
                                }
                               
                                foreach ($CampaignListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['campaign_id'] . ' - ' . $listings['campaign_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Agent Selection</label>
                            <select class="form-control" name="agent" id="SHIFT-AGENT-EDIT" required="">
                                <option value="">Select Agent</option>
                                <?php
                                if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                                    $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER' => ['user' => 'ASC']]);
                                }else{
                                    $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['ORDER' => ['user' => 'ASC']]);
                                }
                               
                                foreach ($UserListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user']; ?>"><?php echo $listings['user'] . ' - ' . $listings['full_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Shift Description</label>
                            <textarea class="form-control" name="shift_description" id="SHIFT-DESCRIPTION-EDIT" required=""></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="example_input_full_name">Shift Start Time</label>
                            <input class="form-control" type="time" placeholder="" id="SHIFT-START-TIME-EDIT" name="shift_start_time" required="true"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="example_input_full_name">Shift End Time</label>
                            <input class="form-control" type="time" placeholder="" id="SHIFT-END-TIME-EDIT" name="shift_end_time" required="true"/>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <input type="hidden" name="" value="<?php echo $string; ?>" id="TemplateString"/>
    <script>
        function nl2br_Jquery(str, is_xhtml) {
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }
        $(function () {
            "use strict";
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('stats/ajax') ?>?action=GetShift',
                    "type": "POST",
                },

                "columns": [
                    {"data": "campaign"},
                    {"data": "user"},
                    {"data": "description"},
                    {"data": "start_time"},
                    {"data": "end_time"},
                    {"data": "user_group"},
                    {"data": "created_at"},
                    {"data": "action",
                        "render": function (data, type, row, meta) {
                            <?php if (checkRole('leaderboard', 'edit') && checkRole('leaderboard', 'delete')) { ?>
                            return '<a href="javascript:void(0);" class="btn btn-success btn-app SHIFT-Action" action="edit" ShiftID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app SHIFT-Action" action="delete" ShiftID="' + row.id + '" ><i class="fa fa-times"></i></a>';
                            <?php }elseif(checkRole('leaderboard', 'edit')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-success btn-app SHIFT-Action" action="edit" ShiftID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a>';
                             <?php }elseif(checkRole('leaderboard', 'delete')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-danger btn-app SHIFT-Action" action="delete" ShiftID="' + row.id + '" ><i class="fa fa-times"></i></a>';
                             <?php }else{?>
                                 return '<span class="label label-danger">Permission Not Allowed</span>';
                             <?php }?>
                        }
                    }
                ],

            });
        })


        // this is the id of the form
        $("#ShiftInsert").submit(function (e) {
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
                    if (result.success === 1) {
                        
                        $('#modal-left').modal('hide');
                        $('#ShiftInsert')[0].reset();
                        $("#SHIFT-AGENT").val("").trigger('change');
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                       var icon = 'error';
                    }
                     $.toast({
                            heading: 'Shift Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: icon,
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                }
            });
        });

        
        $("#ShiftEdit").submit(function (e) {
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
                    if (result.success === 1) {
                        
                        $('#modal-left-edit').modal('hide');
                        $('#ShiftEdit')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                       var icon = 'error';
                    }
                     $.toast({
                            heading: 'Shift Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: icon,
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                }
            });
        });
        
        $(document).on('click', '.SHIFT-Action', function () {
            var action = $(this).attr('action');
            var ShiftID = $(this).attr('shiftid');
            if (action == 'delete') {
                
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Shift!",
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
                    type: 'post',
                    url: '<?php echo base_url('stats/ajax') ?>?action=RemoveShift',
                    data: {ShiftID: ShiftID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'Shift Settings',
                            text: result.message,
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
                
            } else if (action == 'edit') {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('stats/ajax') ?>?action=ShiftDetail',
                    data: {ShiftID: ShiftID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#SHIFT-ID-EDIT').val(result.data.id);
                        $('#SHIFT-CAMPAIGN-EDIT').val(result.data.campaign);
                        $('#SHIFT-AGENT-EDIT').val(result.data.user);
                        $('#SHIFT-DESCRIPTION-EDIT').val(result.data.description);
                        $('#SHIFT-START-TIME-EDIT').val(result.data.start_time);
                        $('#SHIFT-END-TIME-EDIT').val(result.data.end_time);
                        $('#modal-left-edit').modal('show');
                    }
                });

            } else {

            }
        });





        $('#TEMPLATE-DOMAIN').change(function () {
            var value = $(this).val();
            var str = $('#TemplateString').val();
            var res = str.replace("{{DOMAIN}}", value);
            var res = res.replace("{{DOMAIN}}", value);
            $('#TEMPLATE-CONTENT').val(res);
        });
    </script>
<?php } ?>
