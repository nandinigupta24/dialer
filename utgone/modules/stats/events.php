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
                                <div class="panel-title"> <span class="fa fa-list-alt"></span>Agent Events</div>
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

                                            <th>Event</th>
                                            <th>Points</th>
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

    <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=InsertEvent" id="EventInsert">
        <div class="modal modal-right fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Events</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Event Selection</label>
                            <select class="form-control" name="event" id="EVENT-SELECTION" required="">
                                <option value="">Select Events</option>
                                <option value="on_sale">On Sale</option>
                                <option value="on_time_login">On Time Login</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Event Points</label>
                            <input type="text" class="form-control" name="points" id="EVENT-POINTS" value="" required=""/>
                        </div>
                        <?php if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                            <div class="form-group">
                                <label for="example_input_full_name">User Group</label>
                                <select class="form-control" name="user_group" id="EVENT-USERGROUP" required="">
                                    <option value="---ALL---">---ALL---</option>
                                    <?php
                                    $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                    foreach ($UserGroupListings as $listings) {
                                        ?>
                                        <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group']; ?>" id="EVENT-USERGROUP"/>
                        <?php } ?>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=EditEvent" id="EventEdit">
        <div class="modal modal-right fade" id="modal-left-edit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Edit Events</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="EVENT-ID-EDIT" value=""/>
                        <div class="form-group">
                            <label for="example_input_full_name">Event Selection</label>
                            <select class="form-control" name="event" id="EVENT-SELECTION-EDIT" required="">
                                <option value="">Select Event</option>
                                <option value="on_sale">On Sale</option>
                                <option value="on_time_login">On Time Login</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Event Points</label>
                            <input type="text" class="form-control" name="points" id="EVENT-POINTS-EDIT" value="" required=""/>
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
                "ajax": {
                    "url": '<?php echo base_url('stats/ajax') ?>?action=GetEvent',
                    "type": "POST",
                },

                "columns": [
                    {"data": "event",
                        "render": function (data, type, row, meta) {
                            var str = row.event;
                            str = str.replace("_", " ").replace("_", " ").replace("_", " ");
                            str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                                return letter.toUpperCase();
                            });
                            return str;
                        }
                    },
                    {"data": "points"},
                    {"data": "user_group"},
                    {"data": "created_at"},
                    {"data": "action",
                        "render": function (data, type, row, meta) {
                            <?php if (checkRole('leaderboard', 'edit') && checkRole('leaderboard', 'delete')) { ?>
                            return '<a href="javascript:void(0);" class="btn btn-success btn-app EVENT-Action" action="edit" EventID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app EVENT-Action" action="delete" EventID="' + row.id + '" ><i class="fa fa-times"></i></a>';
                             <?php }elseif(checkRole('leaderboard', 'edit')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-success btn-app EVENT-Action" action="edit" EventID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a>';
                             <?php }elseif(checkRole('leaderboard', 'delete')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-danger btn-app EVENT-Action" action="delete" EventID="' + row.id + '" ><i class="fa fa-times"></i></a>';
                             <?php }else{?>
                                 return '<span class="label label-danger">Permission Not Allowed</span>';
                             <?php }?>
                        }
                    }
                ],

            });
        })


        // this is the id of the form
        $("#EventInsert").submit(function (e) {
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
                        $('#EventInsert')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                        var icon = 'error';
                    }
                    $.toast({
                        heading: 'Event Settings',
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

        $("#EventEdit").submit(function (e) {
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
                        $('#EventEdit')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                        var icon = 'error';
                    }
                    $.toast({
                        heading: 'Event Settings',
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

        $(document).on('click', '.EVENT-Action', function () {
            var action = $(this).attr('action');
            var EventID = $(this).attr('eventid');
            if (action == 'delete') {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Event!",
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
                            url: '<?php echo base_url('stats/ajax') ?>?action=RemoveEvent',
                            data: {EventID: EventID},
                            success: function (data) {
                                var result = JSON.parse(data);
                                $.toast({
                                    heading: 'Event Settings',
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
                    url: '<?php echo base_url('stats/ajax') ?>?action=EventDetail',
                    data: {EventID: EventID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#EVENT-ID-EDIT').val(result.data.id);
                        $('#EVENT-SELECTION-EDIT').val(result.data.event);
                        $('#EVENT-POINTS-EDIT').val(result.data.points);
                        $('#modal-left-edit').modal('show');
                    }
                });

            } else {

            }
        });

    </script>
<?php } ?>
