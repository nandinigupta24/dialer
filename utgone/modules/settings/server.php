<?php
if (!checkRole('admin_settings', 'edit')) {
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
                                <div class="panel-title"> <span class="fa fa-server"></span>SERVER LISTINGS</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <li><a href="" data-toggle="modal" data-target="#modal-left" class="Add-SMTP-Account"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Server ID</th>
                                            <th>Server Description</th>
                                            <th>Server IP</th>
                                            <th>Active</th>
                                            <th>Version</th>
                                            <th>Max Calls Per Second</th>
                                            <th>Asterisk Server</th>
                                            <th>Agent Login Server</th>
                                            <th>Action</th>
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
    <form class="" method="post" action="<?php echo base_url('settings/ajax') ?>?action=InsertServers" id="SmtpRule">
        <div class="modal modal-left fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Server</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: calc(100vh - 70px);overflow-y: auto;">
                        <input type="hidden" name="action" value="" id="SERVER-ACTION"/>
                        <div class="form-group">
                            <label for="example_input_full_name">Server ID</label>
                            <input class="form-control" type="text" placeholder="" id="SERVER-ID" name="server_id" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Server Description</label>
                            <input class="form-control" type="text" placeholder="" id="SERVER-DESCRIPTION" name="server_description" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">SERVER IP Address</label>
                            <input class="form-control" type="text" placeholder="" name="server_ip" id="SERVER-IP" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Version</label>
                            <input class="form-control" type="text" placeholder="" name="asterisk_version" id="SERVER-AV" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Max Trunks</label>
                            <input class="form-control" type="text" placeholder="" name="max_vicidial_trunks" id="SERVER-MT" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">External Server IP</label>
                            <input class="form-control" type="text" placeholder="" name="external_server_ip" id="SERVER-EX" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Recording Limit</label>
                            <input class="form-control" type="text" placeholder="" name="vicidial_recording_limit" id="SERVER-LIMIT" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Max Calls per Second</label>
                            <input class="form-control" type="text" placeholder="" name="outbound_calls_per_second" id="SERVER-OCPS" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Web Socket URL</label>
                            <input class="form-control" type="text" placeholder="" name="web_socket_url" id="SERVER-WSU" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">User Group</label>
                            <select class="form-control" name="user_group" id="SERVER-USERGROUP" required="">
                                <option value="---ALL---">---ALL---</option>
                                <?php
                                $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                foreach ($UserGroupListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
    <?php } ?>

                            </select>
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
                    "url": '<?php echo base_url('settings/ajax') ?>?action=GetServers',
                    "type": "POST",
                },

                "columns": [
                    {"data": "server_id"},
                    {"data": "server_description"},
                    {"data": "server_ip"},
                    {"data": "active",
                        "render": function (data, type, row, meta) {
                            var selected = (row.active == 'Y') ? 'active' : '';
                            return '<button type="button" class="btn btn-toggle SERVER-ACTIVE '+selected+'" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="'+row.server_id+'" data-column="active"><div class="handle"></div></button>';
                        }
                        },
                    {"data": "asterisk_version"},
                    {"data": "outbound_calls_per_second"},
                    {"data": "active_asterisk_server",
                        "render": function (data, type, row, meta) {
                            var selected = (row.active_asterisk_server == 'Y') ? 'active' : '';
                            return '<button type="button" class="btn btn-toggle SERVER-ACTIVE '+selected+'" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="'+row.server_id+'" data-column="active_asterisk_server"><div class="handle"></div></button>';
                        }
                        },
                        {"data": "active_agent_login_server",
                        "render": function (data, type, row, meta) {
                            var selected = (row.active_agent_login_server == 'Y') ? 'active' : '';
                            return '<button type="button" class="btn btn-toggle SERVER-ACTIVE '+selected+'" data-toggle="button" aria-pressed="true" autocomplete="off" data-id="'+row.server_id+'" data-column="active_agent_login_server"><div class="handle"></div></button>';
                        }
                        },
                    {"data": "action",
                        "render": function (data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn btn-success btn-app SERVER-Action" action="edit" ServerID="' + row.server_id + '" ><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app SERVER-Action" action="delete" ServerID="' + row.server_id + '" ><i class="fa fa-times"></i></a>'
                        }
                    }
                ],

            });
        })


        // this is the id of the form
        $("#SmtpRule").submit(function (e) {
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
                        $.toast({
                            heading: 'CONF Template Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#modal-left').modal('hide');
                        $('#SmtpRule')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        $('#SERVER-ACTION').val('');

                    } else {
                        $.toast({
                            heading: 'CONF Template Settings',
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


        $(document).on('click', '.SERVER-Action', function () {
            var action = $(this).attr('action');
            var ServerID = $(this).attr('serverid');
            if (action == 'delete') {

                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this SERVER!",
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
                    url: '<?php echo base_url('settings/ajax') ?>?action=RemoveServers',
                    data: {ServerID: ServerID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'SERVER Settings',
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
                    url: '<?php echo base_url('settings/ajax') ?>?action=DetailServers',
                    data: {ServerID: ServerID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#SERVER-ACTION').val('edit');
                        $('#SERVER-ID').val(result.data.server_id);
                        $('#SERVER-ID').attr('readonly',true);
                        $('#SERVER-DESCRIPTION').val(result.data.server_description);
                        $('#SERVER-IP').val(result.data.server_ip);
                        $('#SERVER-AV').val(result.data.asterisk_version);
                        $('#SERVER-MT').val(result.data.max_vicidial_trunks);
                        $('#SERVER-EX').val(result.data.external_server_ip);
                        $('#SERVER-LIMIT').val(result.data.vicidial_recording_limit);
                        $('#SERVER-OCPS').val(result.data.outbound_calls_per_second);
                        $('#SERVER-WSU').val(result.data.web_socket_url);
                        $('#SERVER-USERGROUP').val(result.data.user_group);
                        $('#modal-left').modal('show');
                    }
                });

            } else {

            }
        });


        $('.Add-SMTP-Account').click(function(){
            $('#SmtpRule')[0].reset();
            $('#SERVER-ACTION').val('');
            $('#SERVER-ID').attr('readonly',false);
            });

            $(document).on('click','.SERVER-ACTIVE',function(){
                if($(this).hasClass('active')){
                    var value = 'Y';
                }else{
                    var value = 'N';
                }
                var ServerID = $(this).data('id');
                var ServerColumn = $(this).data('column');
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('settings/ajax') ?>?action=UpdateServers',
                    data: {ServerID: ServerID,value:value,ServerColumn:ServerColumn},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'SERVER Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                });
            });
    </script>
<?php } ?>
