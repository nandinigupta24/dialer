<?php if(!checkRole('users', 'edit')){ no_permission(); } else {?>
<?php
$RoleListing = $DBUTG->select('roles', ['id', 'title', 'description'],['status'=>'active']);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Listings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>User Role Permissions</div>
                            <ul class="nav panel-tabs">
                                <li data-toggle="modal" data-target="#role-create"><a href="javascript:void(0);" title="Create Role"><i class="fa fa-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header with-border bg-success">
                                        <h4 class="box-title">Role Listings</h4>
                                    </div>
                                    <div class="box-body px-0 pt-0 pb-30">
                                        <div class="media-list media-list-hover media-list-divided" id="role-listings">
                                            <?php foreach ($RoleListing as $listing) {
                                                $RoleUsers = $database->count('vicidial_users',['role_id'=>$listing['id']]);
                                                ?>
                                                <a class="media media-single" href="javascript:void(0);" data-id="<?php echo $listing['id']; ?>" id="role-<?php echo $listing['id']; ?>">
                                                    <span class="title font-size-16 text-fade" title="<?php echo $listing['description']; ?>"><?php echo $listing['title']; ?></span>
                                                    <span class="badge badge-lg badge-secondary"><?php echo $RoleUsers;?></span>
                                                    <span class="badge badge-lg badge-info RoleUser" title="Role User"><i class="fa fa-user"></i></span>
                                                    <span class="badge badge-lg badge-primary RoleSetting" title="Role Setting"><i class="fa fa-cog fa-spin"></i></span>
                                                    <?php if(checkRole('users', 'edit')) :?>
                                                    <span class="badge badge-lg badge-danger RoleRemove" title="Remove Role"><i class="fa fa-times"></i></span>
                                                <?php endif;?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="section-show">

                            </div>
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

<div class="modal center-modal fade" id="role-create" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title"><i class="fa fa-lock"></i> New Role</h5>
            </div>
            <div class="modal-body">
                <h6 class="mt-15 mb-5">Title</h6>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name='title' value="" placeholder="Role Title" id="RoleTitleInput"/>
                </div>
                <h6 class="mt-15 mb-5">Description</h6>
                <div class="input-group">
                    <textarea class="form-control" name="" id="RoleDescriptionInput" placeholder="Role Description" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-bold btn-pure btn-primary float-right RoleSave">Save changes</button>
            </div>
        </div>
    </div>
</div>


<link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
<script>

    $(document).on('click', '.RoleSave', function () {
        var role_title = $('#RoleTitleInput').val();
        var role_description = $('#RoleDescriptionInput').val();
        if (role_title) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('users/ajax')?>?rule=user_role_create',
                data: {role_title: role_title, role_description: role_description}, // serializes the form's elements.
                success: function (data)
                {
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
                        $('#role-create').modal('hide');
                        $('#role-listings').append(result.data);
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
        } else {
            alert('BYE');
        }
    });


    $(document).on('click', '.RoleRemove', function () {
        var role_id = $(this).parent().data('id');
        var data = {role_id: role_id};
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this role!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('users/ajax')?>?rule=user_role_delete',
                    data: data, // serializes the form's elements.
                    success: function (data)
                    {
                        var result = JSON.parse(data);
                        if (result.success === 1) {
                            $('#role-' + role_id).remove();
                            swal("Deleted!", "This Role has been deleted.", "success");
                        } else {
                            swal("Deleted!", result.message, "success");
                        }
                    }
                });
            } else {
                swal("Cancelled", "This Role is safe :)", "error");
            }
        });
    });

    $(document).on('click', '.RoleSetting', function () {
        var role_id = $(this).parent().data('id');
//        $(this).parent().parent().addClass('bg-pale-dark');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('users/ajax')?>?rule=user_role_setting',
            data: {role_id: role_id},
            success: function (data)
            {
                var result = JSON.parse(data);
                $('#section-show').html(result.data);
            }
        });
    });

    $(document).on('click', '.RoleUser', function () {
        var role_id = $(this).parent().data('id');
//        $(this).parent().parent().addClass('bg-pale-dark');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('users/ajax')?>?rule=user_role_user',
            data: {role_id: role_id},
            success: function (data)
            {
                var result = JSON.parse(data);
                $('#section-show').html(result.data);
            }
        });
    });

    $(document).on('click', '.SwitchAccessBTN', function () {
        var module_id = $(this).data('module');
        var operation = $(this).data('operation');
        var role_id = $(this).parent().parent().attr('role-id');
        if ($(this).hasClass('active')) {
            var value = 'Y';
        } else {
            var value = 'N';
        }
        var data = {module_id: module_id, operation: operation, role_id: role_id, value: value};
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('users/ajax')?>?rule=user_role_permission',
            data: data,
            success: function (data)
            {
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
                    $('#role-create').modal('hide');
                    $('#role-listings').append(result.data);
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





</script>
<?php } ?>
