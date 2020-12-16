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
                                <div class="panel-title"> <span class="fa fa-list-alt"></span>Agent Levels</div>
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

                                            <th>Level</th>
                                            <th>Points</th>
                                            <th>Description</th>
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

    <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=InsertLevel" id="LevelInsert">
        <div class="modal modal-right fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Levels</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Level Selection</label>
                            <select class="form-control" name="level" id="LEVEL-SELECTION" required="">
                                <option value="">Select Levels</option>
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>">Level <?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Level Points</label>
                            <input type="text" class="form-control" name="points" id="LEVEL_POINTS" value="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Level Description</label>
                            <input type="text" class="form-control" name="description" id="LEVEL_DESCRIPTION" value="" required=""/>
                        </div>
                        <?php if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                            <div class="form-group">
                                <label for="example_input_full_name">User Group</label>
                                <select class="form-control" name="user_group" id="LEVEL-USERGROUP" required="">
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
                            <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group']; ?>" id="LEVEL-USERGROUP"/>
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

    <form class="" method="post" action="<?php echo base_url('stats/ajax') ?>?action=EditLevel" id="LevelEdit">
        <div class="modal modal-right fade" id="modal-left-edit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Edit Level</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="LEVEL-ID-EDIT" value=""/>
                        <div class="form-group">
                            <label for="example_input_full_name">Level Selection</label>
                            <select class="form-control" name="level" id="LEVEL-SELECTION-EDIT" required="">
                                <option value="">Select Levels</option>
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>">Level <?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Level Points</label>
                            <input type="text" class="form-control" name="points" id="LEVEL-POINTS-EDIT" value="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Level Description</label>
                            <input type="text" class="form-control" name="description" id="LEVEL-DESCRIPTION-EDIT" value="" required=""/>
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
                    "url": '<?php echo base_url('stats/ajax') ?>?action=GetLevel',
                    "type": "POST",
                },

                "columns": [
                    {"data": "level",
                        "render": function (data, type, row, meta) {
                            return 'LEVEL - ' + row.level;
                        }
                    },
                    {"data": "points"},
                    {"data": "description"},
                    {"data": "user_group"},
                    {"data": "created_at"},
                    {"data": "action",
                        "render": function (data, type, row, meta) {
                             <?php if (checkRole('leaderboard', 'edit') && checkRole('leaderboard', 'delete')) { ?>
                                 return '<a href="javascript:void(0);" class="btn btn-success btn-app LEVEL-Action" action="edit" LevelID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app LEVEL-Action" action="delete" LevelID="' + row.id + '" ><i class="fa fa-times"></i></a>';    
                             <?php }elseif(checkRole('leaderboard', 'edit')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-success btn-app LEVEL-Action" action="edit" LevelID="' + row.id + '" ><i class="fa fa-arrow-right"></i></a>';
                             <?php }elseif(checkRole('leaderboard', 'delete')){?>
                                 return '<a href="javascript:void(0);" class="btn btn-danger btn-app LEVEL-Action" action="delete" LevelID="' + row.id + '" ><i class="fa fa-times"></i></a>';
                             <?php }else{?>
                                 return '<span class="label label-danger">Permission Not Allowed</span>';
                             <?php }?>
                        }
                    }
                ],

            });
        })


        // this is the id of the form
        $("#LevelInsert").submit(function (e) {
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
                        $('#LevelInsert')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                        var icon = 'error';
                    }
                    $.toast({
                        heading: 'Level Settings',
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
        
        $("#LevelEdit").submit(function (e) {
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
                        $('#LevelEdit')[0].reset();
                        $('#table-list-campaigns').DataTable().ajax.reload();
                        var icon = 'success';
                    } else {
                        var icon = 'error';
                    }
                    $.toast({
                        heading: 'Level Settings',
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
        
        $(document).on('click', '.LEVEL-Action', function () {
            var action = $(this).attr('action');
            var LevelID = $(this).attr('levelid');
            if (action == 'delete') {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Level!",
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
                            url: '<?php echo base_url('stats/ajax') ?>?action=RemoveLevel',
                            data: {LevelID: LevelID},
                            success: function (data) {
                                var result = JSON.parse(data);
                                $.toast({
                                    heading: 'Level Settings',
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
                    url: '<?php echo base_url('stats/ajax') ?>?action=LevelDetail',
                    data: {LevelID: LevelID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#LEVEL-ID-EDIT').val(result.data.id);
                        $('#LEVEL-SELECTION-EDIT').val(result.data.level);
                        $('#LEVEL-POINTS-EDIT').val(result.data.points);
                        $('#LEVEL-DESCRIPTION-EDIT').val(result.data.description);
                        $('#modal-left-edit').modal('show');
                    }
                });

            } else {

            }
        });

    </script>
<?php } ?>
