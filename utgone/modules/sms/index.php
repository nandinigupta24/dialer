<?php
if (!checkRole('sms', 'view')) {
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
                                <div class="panel-title"> <span class="fa fa-file-text"></span> Template</div>
                                <?php if (checkRole('sms', 'create')) : ?>
                                    <ul class="nav panel-tabs">
                                        <li><a  href="javascript:void(0)"  onclick="addItem();" class="popup-with-form"><i class="fa fa-plus" title="Add"></i></a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Log ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Message</th>
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
<div class="modal modal-right fade" id="modal-right" tabindex="-1">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<p>Your content comes here</p>
					  </div>
					  <div class="modal-footer modal-footer-uniform">
						<button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
					  </div>
					</div>
				  </div>
				</div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title"><i class="fa fa-envelope"></i> SMS template</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" accept-charset="UTF-8" id="template_form" autocomplete="off" novalidate="novalidate">
                        <input type="hidden" name="id" value="" id="item_id">
                        <div class="pad">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Name" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Description" id="description" name="description" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message" class="col-sm-3 col-form-label">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="template_active_btn" class="col-sm-3 col-form-label">Active</label>
                                <div class="col-sm-9">
                                    <button type="button" id="template_active_BTN" data-input="template_active" class="btn btn-sm btn-toggle btn-switch" data-toggle="button" aria-pressed="true" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                    <input type="hidden" name="active" id="template_active" value="N">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-app" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success pull-right btn-app" onclick="$('#template_form').submit()" >Save</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script>
                        $(function () {
                            "use strict";
                            tableList();
                        });
                        var tableList = function () {
                            var dt = $('#table-list-campaigns').DataTable({
                                destroy: true,
                                "bprocessing": true,
                                "bserverSide": true,

                                "aaSorting": [[1, 'asc']],
                                "ajax": {
                                    "url": '<?php echo base_url('sms/ajax') ?>?action=GetTemplate',
                                    "type": "POST",
                                },

                                "columns": [
                                    {"data": "id"},
                                    {"data": "name"},
                                    {"data": "description"},
                                    {"data": "message"},
                                    {"data": "active"},
                                    {"data": "Action"},
                                ],

                            });
                        }

                        $(document).ready(function(){
                            $('#template_active_btn').click(function(){
                                if($(this).hasClass('active')){
                                    $('#template_active').val('N');
                                }else{
                                    $('#template_active').val('Y');
                                } 
                            }); 
                        });

                        $("#template_form").validate({

                            submitHandler: function (form) {
                                //$('#template_active').val($('#template_active_btn').attr('aria-pressed'));
                                $.post('<?php echo base_url('sms/ajax') ?>?action=SaveTemplate', $(form).serialize(), function (response) {
//                                    alert(response);
//                                    exit;
                                    $.toast({
                                        heading: 'Saved',
                                        text: 'SMS template has been successfully added!!',
                                        position: 'top-right',
                                        loaderBg: '#ff6849',
                                        icon: 'success',
                                        hideAfter: 3500,
                                        showHideTransition: 'plain',
                                    });
                                    $('#myModal').modal('hide');
                                    $('#item_id').val(0);
                                    tableList();
                                    // setTimeout(function(){
                                    //    // window.location.reload();
                                    // },3500);
                                });
                                return false;
                            }
                        });

                        var editItem = function (item_id, copy) {
                            $.post('<?php echo base_url('sms/ajax') ?>?action=GetTemplateById&id=' + item_id, {}, function (response) {
                                var resp = JSON.parse(response);
                                $('#item_id').val(item_id);
                                if (copy == 1) {
                                    $('#item_id').val(0);
                                }
                                $('#name').val(resp.name);
                                $('#description').val(resp.description);
                                $('#message').val(resp.message);
                                $('#template_active').val(resp.active);
                                $('#template_active_BTN').addClass((resp.active == 'Y') ? 'active' : '');
                                $('#myModal').modal('show');
                            });
                        }
                        var addItem = function () {
                            $('#myModal input, #myModal textarea').val('');
                            $('#item_id').val(0);
                            $('#myModal').modal('show');
                        }
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
                                    $.post('<?php echo base_url('sms/ajax') ?>?action=deleteTemplateById&id=' + item_id, {}, function (resp) {
                                        swal("Deleted!", "Your sms template been deleted.", "success");
                                        tableList();
                                    });
                                } else {
                                    swal("Cancelled", "Your sms data is safe :)", "error");
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
                                url: '<?php echo base_url('sms/ajax') ?>?action=SaveTemplate&id=' + item_id,
                                data: {active: active, id: item_id},
                                success: function (data) {
                                    var result = JSON.parse(data);
                                    $.toast({
                                        heading: 'Updated',
                                        text: result[0],
                                        position: 'top-right',
                                        loaderBg: '#ff6849',
                                        icon: 'success',
                                        hideAfter: 3500,
                                        showHideTransition: 'plain',
                                    });
                                }
                            });
                        };
                        
                        $(document).on('click','.btn-switch',function(){
                            var value = 'N';
                            if($(this).hasClass('active')){
                                value = 'Y';
                            }
                            $(this).parent().find('input').val(value);
                        })
    </script>
<?php } ?>
