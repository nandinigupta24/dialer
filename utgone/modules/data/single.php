<?php if(!checkRole('data', 'create')){ no_permission(); } else {?>

 <?php
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $CampaignList = $database->select('vicidial_campaigns',['campaign_id']);
        }else{
            $CampaignList = $database->select('vicidial_campaigns',['campaign_id'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }
//        $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=> array_column($CampaignList,'campaign_id')],'ORDER'=>['list_id'=>'ASC']]);
        $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=> $_SESSION['CurrentLogin']['CampaignID']],'ORDER'=>['list_id'=>'ASC']]);
        ?>
<div class="content-wrapper" style="min-height: 336.8px;">
<!--    <section class="content-header">
        <h1>
            Load Single Record
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('data')?>">Data</a></li>
            <li class="breadcrumb-item active">Load Single Record</li>
        </ol>
    </section>-->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="box ">
                    <div class="box-header with-border custom-box-tab ">
                        <h3 class="box-title"><a href="javascript:void(0);" class="box-icon"><i class="fa fa-plus"></i></a> Add A new Lead</h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" name="" action="<?php echo base_url('data/ajax')?>?rule=GetLeadInsert">
                            <div class="pad">
                                <div class="form-group row">
                                    <label for="campaign_id" class="col-sm-3 col-form-label">List ID</label>
                                    <div class="col-sm-9">
                                        <select class="form-control list_id select2" name="list_id" required="">
                                            <option value="">Select List</option>
                                            <?php foreach ($ListListings as $listing) { ?>
                                                <option value="<?php echo $listing['list_id']; ?>" <?php echo (@$_SESSION['LeadPostData']['list_id'] == $listing['list_id']) ? 'selected=selected' : '';?>><?php echo $listing['list_id'] . ' - ' . $listing['list_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Vendor Lead Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="vendor_lead_code" name="vendor_lead_code" value="<?php echo @$_SESSION['LeadPostData']['vendor_lead_code'];?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Phone Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="phone_code" name="phone_code" value="<?php echo @$_SESSION['LeadPostData']['phone_code'];?>"/>
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <!----------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_description" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control " type="text" placeholder="" id="" name="phone_number" value="<?php echo @$_SESSION['LeadPostData']['phone_number'];?>" required="" />
                                        <!--<input class="form-control " type="text" placeholder="" id="" name="phone_number" value="<?php echo @$_SESSION['LeadPostData']['phone_number'];?>" required="" data-validation="custom" data-validation-regexp="^[0][1-9]\d{9}$|^[1-9]\d{9}$"/>-->
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="title" value="<?php echo @$_SESSION['LeadPostData']['title'];?>"/>
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="first_name" value="<?php echo @$_SESSION['LeadPostData']['first_name'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Middle Initial</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="middle_initial" value="<?php echo @$_SESSION['LeadPostData']['middle_initial'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="last_name" value="<?php echo @$_SESSION['LeadPostData']['last_name'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Address1</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="address1" value="<?php echo @$_SESSION['LeadPostData']['address1'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Address2</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="address2" value="<?php echo @$_SESSION['LeadPostData']['address2'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Address3</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="address3" value="<?php echo @$_SESSION['LeadPostData']['address3'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="city" value="<?php echo @$_SESSION['LeadPostData']['city'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="state" value="<?php echo @$_SESSION['LeadPostData']['state'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Province</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="province" value="<?php echo @$_SESSION['LeadPostData']['province'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Postal Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="postal_code" value="<?php echo @$_SESSION['LeadPostData']['postal_code'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Country Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="country_code" value="<?php echo @$_SESSION['LeadPostData']['country_code'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="gender" value="<?php echo @$_SESSION['LeadPostData']['gender'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Date Of Birth</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="date_of_birth" value="<?php echo @$_SESSION['LeadPostData']['date_of_birth'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Alt Phone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="alt_phone" value="<?php echo @$_SESSION['LeadPostData']['alt_phone'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="email" value="<?php echo @$_SESSION['LeadPostData']['email'];?>"/>
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">Security Phrase</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="" id="" name="security_phrase" value="<?php echo @$_SESSION['LeadPostData']['security_phrase'];?>" />
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <!----------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="campaign_description" class="col-sm-3 col-form-label">Comments</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="comments"><?php echo @$_SESSION['LeadPostData']['comments'];?></textarea>
                                    </div>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="CustomFields">

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
            <div class="col-md-6">

                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'fail'){?>
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Validation Alert!</h4>
                    <?php echo $_SESSION['VendorLeadCodeValidation'];?>
                </div>
                <?php }?>
                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'){?>
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Successfully Alert!</h4>
                Lead has been successfully submitted.<br>
                Lead ID is <?php echo $_GET['lead_id'];?>
                </div>
                <?php }?>

                <?php if(isset($_GET['lead_id']) && !empty($_GET['lead_id'])){
                    $LeadID = $_GET['lead_id'];
                    $LeadDetail = $database->get('vicidial_list',['title','first_name','middle_initial','last_name','address1','address2','address3','city','state','phone_number','email','list_id','vendor_lead_code'],['lead_id'=>$LeadID]);

                     $CustomFields = $database->get('custom_fields',['custom_1','custom_2','custom_3','custom_4','custom_5','custom_6','custom_7','custom_8','custom_9','custom_10'],['list_id'=>$LeadDetail['list_id']]);
//                     $CustomFields = $database->get('custom_fields',['custom_1','custom_2','custom_3','custom_4','custom_5','custom_6','custom_7','custom_8','custom_9','custom_10'],['list_id'=>40121]);
                     $CustomFieldsData = $database->get('custom_fields_data',['custom_1','custom_2','custom_3','custom_4','custom_5','custom_6','custom_7','custom_8','custom_9','custom_10'],['AND'=>['list_id'=>$LeadDetail['list_id'],'lead_id'=>$LeadID]]);


                     ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-success">
                            <th>Field Name</th>
                            <th>Field Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($LeadDetail as $key=>$val){?>
                        <tr>
                            <th><?php echo ucwords(str_replace('_',' ',$key));?></th>
                            <td><?php echo $val;?></td>
                        </tr>
                        <?php }?>

                        <tr>
                            <th colspan="2">Custom Fields</th>
                        </tr>
                        <?php foreach($CustomFields as $key=>$val){
                            if(!empty($val)){
                            ?>
                         <tr>
                            <th><?php echo ucwords(str_replace('_',' ',$val));?></th>
                            <td><?php echo $CustomFieldsData[$key];?></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>

                <?php }?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate({
        lang: 'en',
        submitHandler: function(form) {
        console.log(form);
        return false;
    }
    });

    $(document).on('change', '.list_id', function () {
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('data/ajax')?>?rule=GetCustomField',
            data: {ListID:value},
            success: function (data)
            {
                var result = JSON.parse(data);
                if(result.success == 1){
                    $.each(result.data,function(key,value){
                        $('.CustomFields').append('<div class="form-group row">'+
                                        '<label for="campaign_description" class="col-sm-3 col-form-label">'+value+'</label>'+
                                        '<div class="col-sm-9">'+
                                            ' <input class="form-control" type="text" placeholder="" id="" name="'+key+'" value=""/>'+
                                        '</div>'+
                                    '</div>');

                    });
                }else{
                 $('.CustomFields').html('');
                }
            }
        });
    });






     var ListValue = $('.list_id').val();
    if(!empty(ListValue)){
        $.ajax({
                type: "POST",
                url: '<?php echo base_url('data/ajax')?>?rule=GetCustomField',
                data: {ListID:value},
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if(result.success == 1){
                        $.each(result.data,function(key,value){
                            $('.CustomFields').append('<div class="form-group row">'+
                                            '<label for="campaign_description" class="col-sm-3 col-form-label">'+value+'</label>'+
                                            '<div class="col-sm-9">'+
                                                ' <input class="form-control" type="text" placeholder="" id="" name="'+key+'" value=""/>'+
                                            '</div>'+
                                        '</div>');

                        });
                    }else{
                     $('.CustomFields').html('');
                    }
                }
            });
    }
</script>
<?php } ?>
