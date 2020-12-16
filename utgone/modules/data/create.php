<?php if(!checkRole('data', 'create')){ no_permission(); } else {?>
<div class="content-wrapper" style="min-height: 375.8px;">
<!--    <section class="content-header">
        <h1>
            Data List Create
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('data')?>">Data</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </section>-->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
               
                <div class="box ">
                    <div class="box-header with-border custom-box-tab ">
                        <h4 class="box-title"><a href="javascript:void(0);" class="box-icon"><i class="fa fa-plus"></i></a> Add A new Data List</h4>
                        <!-- nav tab-->
<!--                        <ul class="box-controls  pull-right nav nav-tabs justify-content-end" role="tablist">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#faPhone" role="tab"><span class="hidden-sm-up"><i class="fa fa-phone"></i></span> <span class="hidden-xs-down"><i class="fa fa-phone"></i></span></a> </li>
                        </ul>-->
                    </div>
                    <div class="box-body">

                        <form method="post" name="" action="<?php echo base_url('data/ajax')?>?rule=add" id="ListForm">
        <!--                    <input type="hidden" name="_token" value="9DkQzPCUj4a1dYjXAA3vzejVg41zdnSYIOLrWouM">-->
                            <div class="pad">
                                <div class="form-group row">
                                    <label for="campaign_id" class="col-sm-3 col-form-label">ID</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Max 14 Numbers" id="list_id" name="list_id" required="">
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Max 30 Characters" id="list_name" name="list_name" required="">
                                    </div>
                                </div>
                                <!---------------------------------------------------------->

                                <div class="form-group row">
                                    <label for="campaign_description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Max 40 Characters" id="list_description" name="list_description" required="">
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campIdCopy" class="col-sm-3 col-form-label">Campaign ID</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="campaign_id" id="campaign_id" required="" style="width:100%;">
                                            <option value="">Select Campaign</option>
                                            <?php
                                            if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER'=>['campaign_id'=>'ASC']]);
                                            }else{
                                                $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER'=>['campaign_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
//                                                $campaign = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER'=>['campaign_id'=>'ASC'],'campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
                                            }
                                            
                                            foreach ($campaign as $value) {
                                                ?>
                                                <option value="<?php echo $value['campaign_id']; ?>"><?php echo $value['campaign_id'].' - '.$value['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!---------------------------------------------------------->

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-3 col-form-label">Active</label>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-sm btn-toggle SwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                        <input type="hidden" name="active" id="" value="N">
                                    </div>
                                </div>

                            </div>
                            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i> Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <div class="row">
                    <!-- Clone campign-->
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="box ">
                            <div class="box-header with-border custom-box-tab ">
                                <h4 class="box-title"><a href="javascript:void(0);" class="box-icon"><i class="fa fa-copy"></i></a> Clone A Data List</h4>
                                <!-- nav tab-->
                            </div>
                            <div class="box-body" id="CopyCamDiv">
                                <form method="post" name="" action="<?php echo base_url('data/ajax')?>?rule=copy" id="ListCopyForm">
                                    <div class="pad ">

                                        <div class="form-group row">
                                            <label for="campId" class="col-sm-3 col-form-label">ID</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 14 Numbers 1000" name="list_id" required=""/>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campName" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 30 character" name="list_name" required=""/>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campDesc" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Max 40 character" name="list_description" required=""/>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->

                                        <div class="form-group row">
                                            <label for="campIdCopy" class="col-sm-3 col-form-label">Clone Data List</label>
                                            <div class="col-sm-9">
                                                <?php
                                                    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                        $CampaignList = $database->select('vicidial_campaigns',['campaign_id']);
                                                    }else{
                                                        $CampaignList = $database->select('vicidial_campaigns',['campaign_id'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
                                                    }
//                                                    $DataList = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=> array_column($CampaignList,'campaign_id')],'ORDER'=>['list_id'=>'ASC']]);
                                                    $DataList = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=> $_SESSION['CurrentLogin']['CampaignID']],'ORDER'=>['list_id'=>'ASC']]);
                                                    ?>
                                                <select class="form-control select2" name="clone_list_id" id="" required="" style="width:100%;">
                                                    <option value="">Select Lists</option>
                                                    <?php
                                                    foreach ($DataList as $value) {
                                                        ?>
                                                        <option value="<?php echo $value['list_id']; ?>"><?php echo $value['list_id'].' - '.$value['list_name']; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="campaign_active_btn" class="col-sm-3 col-form-label">Active</label>
                                            <div class="col-sm-9">
                                                <button type="button" class="btn btn-sm btn-toggle SwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="active" value="N">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6"><button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button></div>
                                        <div class="col-sm-6"><button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-copy"></i> Clone</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!---clon camign-->

                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

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
                Your list has been successfully created.
              </div>
              
                <p>List ID :- <span class="ListID"></span></p>
                <p>List Name :- <span class="ListName"></span></p>
                
                <p><b>If you want to go on detail page ,please click on List Detail Page.</b></p>
          </div>
          <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app ListDetailPage" href="">List Detail Page</a>
          </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.SwitchBTN', function () {
        if ($(this).hasClass('active')) {
            $(this).parent().find('input[name="active"]').val('Y');
        } else {
            $(this).parent().find('input[name="active"]').val('N');
        }
    });

    

    $("#ListForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        var ListID = $('#list_id').val();
        /**/
         var regEx = /^[-+]?[1-9]\d*$/;
         var validEmail = regEx.test(ListID);
         if (!validEmail) {
            $('#list_id').parent().parent().addClass('error');
            return FALSE;
         }
        /**/
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data){
                var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                     $('#ListForm')[0].reset();
                     $('#modal-success').modal('show');
                     $('.ListID').html(result.data.ListID);
                     $('.ListName').html(result.data.ListName);
                     $('.ListDetailPage').attr('href','edit?list_id='+result.data.ListID);
                }else{
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
    $("#ListCopyForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data){
                var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                     $('#ListCopyForm')[0].reset();
                     $('#modal-success').modal('show');
                     $('.ListID').html(result.data.ListID);
                     $('.ListName').html(result.data.ListName);
                     $('.ListDetailPage').attr('href','edit?list_id='+result.data.ListID);
                }else{
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
