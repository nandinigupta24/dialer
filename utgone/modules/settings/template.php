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
                                <div class="panel-title"> <span class="fa fa-list-alt"></span>CONF TEMPLATE LISTINGS</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <?php if (checkRole('admin_settings', 'create')) { ?>
                                    <li><a href="" data-toggle="modal" data-target="#modal-left"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                    <?php } ?>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>Template ID</th>
                                            <th>Template Name</th>
                                            <th>Template Contents</th>
                                            <th>Admin Group</th>
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
    <form class="" method="post" action="<?php echo base_url('settings/ajax') ?>?action=InsertTemplate" id="SmtpRule">
        <div class="modal modal-left fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add CONF Template</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="" id="TEMPLATE-ACTION"/>
                        <div class="form-group">
                            <label for="example_input_full_name">Template ID</label>
                            <input class="form-control" type="text" placeholder="" id="TEMPLATE-ID" name="template_id" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Template Name</label>
                            <input class="form-control" type="text" placeholder="" id="TEMPLATE-NAME" name="template_name" required="true"/>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Domain Name</label>
                            <input class="form-control" type="text" placeholder="" id="TEMPLATE-DOMAIN" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Template Contents</label>
                            <?php $string = "type=friend
host=dynamic
encryption=yes
icesupport=yes
directmedia=no
transport=wss
dtlsenable=yes
dtlsverify=no
dtlscertfile=/etc/certbot/live/{{DOMAIN}}/cert.pem
dtlsprivatekey=/etc/certbot/live/{{DOMAIN}}/privkey.pem
dtlssetup=actpass
rtcp_mux=yes                            "; ?>
                            <textarea class="form-control" name="template_contents" id="TEMPLATE-CONTENT" required="" rows="6" readonly="">
                                <?php echo str_replace('{{DOMAIN}}', 'DOMAIN NAME', $string); ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">User Group</label>
                            <select class="form-control" name="user_group" id="TEMPLATE-USERGROUP" required="">
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
                    "url": '<?php echo base_url('settings/ajax') ?>?action=GetTemplates',
                    "type": "POST",
                },

                "columns": [
                    {"data": "template_id"},
                    {"data": "template_name"},
                    {"data": "template_contents",
                        "render": function (data, type, row, meta) {
                            return nl2br_Jquery(row.template_contents);
                        }
                    },
                    {"data": "user_group"},
                    {"data": "Action"
                    },
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
                        $('#TEMPLATE-ACTION').val('');
                        $('#TEMPLATE-CONTENT').val('');

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


        $(document).on('click', '.CONF-Template-Action', function () {
            var action = $(this).attr('action');
            var TemplateID = $(this).attr('templateid');
            if (action == 'delete') {
                
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this CONF Template!",
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
                    url: '<?php echo base_url('settings/ajax') ?>?action=RemoveTemplates',
                    data: {TemplateID: TemplateID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'CONF Template Settings',
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
                    url: '<?php echo base_url('settings/ajax') ?>?action=DetailTemplates',
                    data: {TemplateID: TemplateID},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#TEMPLATE-ACTION').val('edit');
                        $('#TEMPLATE-ID').val(result.data.template_id);
                        $('#TEMPLATE-ID').attr('readonly',true);
                        $('#TEMPLATE-NAME').val(result.data.template_name);
                        $('#TEMPLATE-CONTENT').val(result.data.template_contents);
                        $('#TEMPLATE-USERGROUP').val(result.data.user_group);
                        $('#modal-left').modal('show');
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
