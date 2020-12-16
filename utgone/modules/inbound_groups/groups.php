<?php if(!checkRole('inbound_groups', 'view')){ no_permission(); } else {?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
              <div class="panel-title"> <span class="fa fa-book"></span>All Inbound Groups</div>
                <ul class="nav panel-tabs">
                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                </ul>
            </div>
                    </div>
                    <?php
                    if($_SESSION['CurrentLogin']['user_group'] != 'ADMIN'){
                        $data = $database->select('vicidial_inbound_groups', ['group_id', 'group_name', 'group_color', 'active','user_group','group_handling'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
                    }else{
                         $data = $database->select('vicidial_inbound_groups', ['group_id', 'group_name', 'group_color', 'active','user_group','group_handling']);
                    }
                    ?>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped">
                                <thead class="bg-success">
                                    <tr>
                                        <th>Group ID</th>
                                        <th>Group Name</th>
                                        <th>User Group</th>
                                        <th>Group Handling</th>
                                        <th data-orderable="false">Group Colour</th>
                                        <th data-orderable="false">Active</th>
                                        <th data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $value){
                                        if ($value['active'] == 'Y') {
                                            $didactive = 'active';
                                        } else {
                                            $didactive = '';
                                        }

                                        if($value['group_color'] == '#ffffff'){
                                            $textColor = '#000000';
                                        }else{
                                            $textColor = '#ffffff';
                                        }
                                        ?>
                                    <tr>
                                        <td><?php echo $value['group_id'];?></td>
                                        <td><?php echo $value['group_name'];?></td>
                                        <td><?php echo $value['user_group'];?></td>
                                        <td>
                                            <?php  
                                            switch($value['group_handling']){
                                                case 'PHONE':
                                                    echo '<span class="label label-success"><i class="fa fa-phone-square"></i> Phone</span>';
                                                    break;
                                                case 'CHAT':
                                                    echo '<span class="label label-primary"><i class="mdi mdi-comment"></i> Chat</span>';
                                                    break;
                                                case 'EMAIL':
                                                    echo '<span class="label label-info"><i class="fa fa-envelope"></i> Email</span>';
                                                    break;
                                                default:
                                                    
                                            }
                                            ;?>
                                        </td>
                                        <td style="width:15%;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $value['group_color'];?>" style="background-color:<?php echo $value['group_color'];?>;color:<?php echo $textColor;?>;text-indent:30px;" data-id="<?php echo $value['group_id'];?>"  data-field="group_color" readonly=""/>
                                            </div>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-toggle BTN-Switch <?php echo $didactive;?>" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="<?php echo $value['group_id'];?>"  data-field="active">
					<div class="handle"></div>
                                  </button></td>
                                        <td>
                                            <a href="<?php echo base_url('inbound_groups/group_edit')?>?group_id=<?php echo $value['group_id'];?>" class="btn btn-app btn-success"><i class="fa fa-arrow-right" title="Edit Settings"></i></a>
                                            <?php if (checkRole('inbound_groups', 'delete')) { ?>
                                            <button type="button" class="btn btn-app btn-danger RemoveInboundGroup" data-id="<?php echo $value['group_id'];?>"><i class="fa fa-times" title="Remove"></i></button>
                                            <?php } ?> 
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script>
    
$(function () {
        "use strict";
    var dt = $('#table-list-campaigns').DataTable();
    })


 $(document).on('click', '.BTN-Switch', function () {
        var RecordID = $(this).data("id");
        var RecordFIELD = $(this).data("field");

        if ($(this).hasClass('active')) {
            var value = 'Y';
        } else {
            var value = 'N';
        }

        $.ajax({
            type: "POST",
            url: '<?php echo base_url('groups/ajax')?>?action=Update',
            data: {RecordID: RecordID, RecordField: RecordFIELD, RecordValue: value}, // serializes the form's elements.
            success: function (data) {
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Welcome To UTG Dialer',
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

 $(document).on('focusout', '.ColorUpdate', function () {
        var RecordID = $(this).data("id");
        var RecordFIELD = $(this).data("field");
        var value = $(this).val();

        $.ajax({
            type: "POST",
            url: '<?php echo base_url('groups/ajax')?>?action=Update',
            data: {RecordID: RecordID, RecordField: RecordFIELD, RecordValue: value}, // serializes the form's elements.
            success: function (data) {
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Welcome To UTG Dialer',
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

 $(document).on('click', '.RemoveInboundGroup', function () {
        var GroupID = $(this).data('id');
        var data = {GroupID: GroupID};
        var RemoveGroup = $(this);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this team!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                $.ajax({
            type: 'POST',
            url: '<?php echo base_url('groups/ajax')?>?action=Remove',
            data: data, // serializes the form's elements.
            success: function (data)
            {
//                alert(data);
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
                    RemoveGroup.parent().parent().remove();
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
                swal("Cancelled", "This user is safe :)", "error");
            }
        });
    });
</script>


<!--admin_development.php?ADD=538-->
<?php } ?>
