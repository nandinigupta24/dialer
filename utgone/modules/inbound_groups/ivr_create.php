<?php
if (!checkRole('inbound_groups', 'create')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Add A New IVR</div>
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">
                                <div id="team1" class="tab-pane active p15 form-horizontal">
                                    <!--<h5 class="mb5">Team Details</h5>-->
                                    <hr class="m5 mb20">
                                    <form id="create_inbound_ivr" class="cmxform" method="post" action="<?php echo base_url('inbound_groups/ajax') ?>?action=InsertIVR">
                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Inbound IVR ID</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Max 11 Characters" id="call_time_id" name="menu_id" required=""/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Inbound Number Description</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Max 10 Characters" id="call_time_id" name="menu_name" required=""/>
                                            </div>
                                        </div>
                                        <?php // if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Team Selection</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="user_group"  required="">
                                                    <option value="">--Select Option--</option>
                                                    <?php if ($_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { 
                                                        
                                                        $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                                    
?>
                                                        <option value="---ALL---">---ALL---</option>
                                                    <?php }else{
                                                            $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER' => ['user_group' => 'ASC']]);
                                                    }
                                        foreach ($UserGroupListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                    <?php } ?>

                            </select>
                                            </div>
                                        </div>
                                        <?php // }else{?>
                                        <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>">-->
                                        <?php // }?>
                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                        <button class="btn btn-success m10" type="submit">Create</button>
                                        <button class="btn btn-default m10" type="reset">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </section>
    </div>



<!--Modal For Success Insertion-->
    <div class="modal center-modal fade" id="modal-success" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success Message</h5>
                    <!--                <button type="button" class="close" data-dismiss="modal">
                                      <span aria-hidden="true">&times;</span>
                                    </button>-->
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Your IVR has been successfully created.
                    </div>

                    <p>Menu ID:- <span class="ColumnID"></span></p>
                    <p>Menu Name:- <span class="ColumnName"></span></p>

                    <p><b>If you want to go on detail page ,please click on IVR Detail Page.</b></p>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                    <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">IVR Detail Page</a>
                </div>
            </div>
        </div>
    </div>
<script>
    
    $("#create_inbound_ivr").on('submit', function (e) {
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
                            heading: 'IVR',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#create_inbound_ivr')[0].reset();
                        $('#modal-success').modal('show');

                        $('.ColumnID').html(result.data.ColumnID);
                        $('.ColumnName').html(result.data.ColumnName);

                        $('.ColumnDetailPage').attr('href', 'group_edit?group_id=' + result.data.ColumnID);
                    } else {
                        $.toast({
                            heading: 'IVR',
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
