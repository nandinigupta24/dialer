<?php
if (!checkRole('email', 'view')) {
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
                                <div class="panel-title"> <span class="fa fa-book"></span>Email Templates</div>
                                <ul class="nav panel-tabs">
                                    <li><a href="<?php echo base_url('email/create') ?>"><i class="fa fa-plus" title="Refersh"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Active</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>



                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!--                    <div class="box-footer">
                                                Footer
                                            </div>-->
                        <!-- /.box-footer-->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--							<div class="modal-header">
                                                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                        </div>-->
                <div class="modal-body TemplateBody">

                </div>
                <!--							<div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                                                        </div>-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" name="" action="<?php echo base_url('email/ajax') ?>?action=copy" id="ListCopyForm">
                <input type="hidden" name="clone_list_id" id="clone_list_id" value=""/>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Email Template Clone</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Template Name:</label>
                            <input type="text" class="form-control" name="clone_name" placeholder="" required=""/>
                        </div>  
                        <div class="form-group">
                            <label for="example_input_full_name">Template Description:</label>
                            <input type="text" class="form-control" name="clone_description" placeholder="" required=""/>
                        </div>  
                        <div class="form-group">
                            <label for="campaign_active_btn" class="col-form-label">Active</label>
                            <button type="button" class="btn btn-sm btn-toggle SwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <input type="hidden" name="active" value="false">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect">Clone Template</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        var tableList = function () {
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('email/ajax') ?>?action=GetEmail',
                    "type": "POST",
                },

                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "description"},
                    {"data": "active"},
                    {"data": "Action"},
                ],

            });
        }
        $(function () {
            "use strict";
            tableList();
        })

        var deleteItem = function (item_id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this sms template!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.post('<?php echo base_url('email/ajax') ?>?action=deleteTemplateById&id=' + item_id, {}, function (resp) {
                        swal("Deleted!", "Your email template been deleted.", "success");
                        tableList();
                    });
                } else {
                    swal("Cancelled", "Your email data is safe :)", "error");
                }
            });
        }

        var changeItemStatus = function (elem) {
            var item_id = $(elem).attr("data-id");
            var active = '';
            if ($(elem).hasClass('active')) {
                active = 'N';
            } else {
                active = 'Y';
            }
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('email/ajax') ?>?action=update&id=' + item_id,
                data: {active: active, id: item_id},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Email Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        };



        $(document).on('click', '.TemplateView', function () {
            var item_id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('email/ajax') ?>?action=GetTemplateView',
                data: {id: item_id},
                success: function (data) {
                    var Result = JSON.parse(data);
                    $('.bs-example-modal-lg').modal('show');
                    $('.TemplateBody').html(Result.data);
                }
            });
        });

        $(document).on('click', '.TemplateCopy', function () {
            var item_id = $(this).data('id');
            $('#clone_list_id').val(item_id);
            $('#myModal').modal('show');
        });


        $("#ListCopyForm").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#myModal').modal('hide');
                        tableList();
                    } else {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
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

        $(document).on('click', '.SwitchBTN', function () {
            if ($(this).hasClass('active')) {
                $(this).parent().find('input[name="active"]').val('Y');
            } else {
                $(this).parent().find('input[name="active"]').val('N');
            }
        });
    </script>
<?php } ?>
