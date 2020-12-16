<?php
if (!checkRole('admin_settings', 'view')) {
    no_permission();
} else {
    $Licensings = $DBUTG->select('licensings', '*');

    $LicensingModule = $DBUTG->select('licensing_modules', '*', ['status' => 'active']);

    $ModuleArray = [];
    foreach ($LicensingModule as $module) {
        $ModuleArray[$module['id']] = $module['module_title'];
    }
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-id-card"></span>Licensings</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <li><a href="" data-toggle="modal" data-target="#modal-right"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Modules</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($Licensings as $license) {
                                            switch ($license['status']) {
                                                case 'active':
                                                    $LabelClass = 'label-success';
                                                    break;
                                                case 'inactive':
                                                    $LabelClass = 'label-danger';
                                                    break;
                                                default:
                                                    $LabelClass = 'label-primary';
                                            }
                                            $Modules = unserialize($license['modules']);
                                            ?>
                                            <tr>
                                                <td><?php echo $license['title']; ?></td>
                                                <td><?php echo nl2br($license['description']); ?></td>
                                                <td>
                                                    <?php if (!empty($Modules) && $Modules) { ?>
                                                        <?php foreach ($Modules as $module) { ?>
                                                            <span class="label label-info"><?php echo $ModuleArray[$module]; ?></span>&nbsp;
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <span class="label label-danger">Not Modules Defined</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <span class="label <?php echo $LabelClass; ?>">
                                                        <?php echo strtoupper($license['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $license['created_at']; ?></td>
                                                <td>
                                                    <!--<a href="javascript:void(0);" class="btn btn-success PricingPlan-EDIT" title="Edit Pricing Plan" data-id="<?php echo $listings['id']; ?>" data-title="<?php echo $listings['title']; ?>" data-duration="<?php echo $listings['duration']; ?>" data-type="<?php echo $listings['type']; ?>" data-price="<?php echo $listings['price']; ?>" data-status="<?php echo $listings['status']; ?>" data-agent="<?php echo $listings['agent']; ?>"><i class="fa fa-arrow-right"></i></a>-->
                                                    <a href="javascript:void(0);" class="btn btn-success License-EDIT" title="Edit Licensings" data-id="<?php echo $license['id']; ?>"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
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
    <form class="" method="post" action="<?php echo base_url('licensing/ajax') ?>?action=Insert" id="LicenseInsert">
        <input type="hidden" name="id" value="" id="LicenseID"/>
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title FormTitle">Add License</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">License Title</label>
                            <input type="text" name="title" id="LicenseTitle" class="form-control" placeholder="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">License Description</label>
                            <textarea class="form-control" name="description" id="LicenseDescription" rows="4" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">License Module</label>
                            <select id="LicenseModule" class="form-control select2" multiple="multiple" data-placeholder="Select a Module" name="modules[]" required="" style="width:100%;">
                                <?php foreach ($LicensingModule as $module) { ?>
                                    <option value="<?php echo $module['id']; ?>"><?php echo $module['module_title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Status</label>
                            <select id="LicenseStatus" class="form-control" name="status" required="">
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
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
        $(function () {
            "use strict";
            $('#table-list-campaigns').DataTable();
        })



        $("#LicenseInsert").submit(function (e) {

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
                            heading: 'License Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#modal-right').modal('hide');
                        $('#LicenseInsert')[0].reset();
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                        
                    } else {
                        $.toast({
                            heading: 'License Settings',
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

        $(document).ready(function () {
            $('.License-EDIT').click(function () {
                var ID = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('licensing/ajax') ?>?action=GetDetail",
                    data: {ID: ID}, // serializes the form's elements.
                    success: function (data) {
                        var Result = JSON.parse(data);
                        $('.FormTitle').text('Edit License');
                        $('#modal-right').modal('show');
                        $('#LicenseID').val(Result.data.id);
                        $('#LicenseTitle').val(Result.data.title);
                        $('#LicenseDescription').val(Result.data.description);
                        $('#LicenseStatus').val(Result.data.status);
                        $('.select2').select2().val(Result.data.modules).trigger('change');
                    }
                })
            });
        });

    </script>
<?php } ?>
