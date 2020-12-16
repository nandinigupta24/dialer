<?php
if (!checkRole('data', 'view')) {
    no_permission();
} else {
    
    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group[!]'=>'ADMIN','ORDER'=>['user'=>'ASC']]);
    }else{
//        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
//        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['user'=>'ASC']]);
        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER'=>['user'=>'ASC']]);
    }
    
    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name','campaign_id'], ['ORDER' => ['list_id' => 'ASC'],'campaign_id'=>array_column($CampaignListings,'campaign_id')]);
    
    $StatusListings = $database->query("SELECT distinct(status),status_name FROM vicidial_campaign_statuses WHERE (campaign_id IN ('".implode("','",array_column($CampaignListings,'campaign_id'))."')) OR (campaign_id is NULL AND Status_Type is NOT NULL) ORDER BY status")->fetchAll(PDO::FETCH_ASSOC);
   
    
    $GroupListings = $database->select('vicidial_user_groups',['user_group','group_name'],['user_group[!]'=>'ADMIN','ORDER'=>['user_group'=>'ASC']]);
    
    
    ?>
   
    <div class="content-wrapper"> 
        <!-- Main content -->
        <section class="content">
            <div class="row Create-Rule" style="display:none;">
                <div class="col-md-12">
                    <form method="POST" action="" id="CreateDataRule" >
                        <div class="box">
                            <?php // pr($_SESSION);?>
                            <div class="box-header with-border">
                                <h4 class="box-title">Add A New Data Rule</h4>
                                <button class="btn btn-danger pull-right CreateRule" type="button" style="margin-top:-3px;">Close New Rule</button>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <h5>Rules For Leads To Move</h5>
                                <hr/>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rule Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="rule_name" required=""/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Statuses</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="rule_statuses[]"  multiple="" style="width:100%" required="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($StatusListings as $listing) { ?>
                                                        <option value="<?php echo $listing['status']; ?>"><?php echo $listing['status'] . ' - ' . $listing['status_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rule Called Count</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" name="rule_called_count"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">Select Lists By Campaign?</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle UseCampaign" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="list_by_campaign" value="list"/>
                                            </div>
                                        </div>
                                        <div class="form-group row UseCampaign-Y" style="display:none;">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Campaign</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="rule_campaign_id[]" style="width:100%;" id="RuleCampaign" multiple="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($CampaignListings as $listings) { ?>
                                                        <option value="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['campaign_id'] . ' - ' . $listings['campaign_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row UseCampaign-N">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule List</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="rule_list_id[]" style="width:100%;" id="RuleList" multiple="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($ListListings as $listings) { ?>
                                                        <option value="<?php echo $listings['list_id']; ?>" data-campaign="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['list_id'] . ' - ' . $listings['list_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Timeout DB Field</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="rule_timeout_field" required="">
                                                    <option value="">Select Option</option>
                                                    <option value="last_local_call_time">Date The Status Was Modified</option>
                                                    <option value="entry_date">Date The Lead Entered The List</option>
                                                </select>
                                            </div>
                                        </div>  
<!--                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Timeout Period</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="timeout_period">
                                                    <option value="">Select Option</option>
                                                    <option value="MINUTE">Minute</option>
                                                    <option value="HOUR">Hour</option>
                                                    <option value="DAY">Day</option>
                                                </select>
                                            </div>
                                        </div>-->
<!--                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Timeout Operator</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="timeout_operator">
                                                    <option value="">Select Option</option>
                                                    <option value=">">Greater Than</option>
                                                    <option value="=">Equal To</option>
                                                    <option value=">=">Greater Than or Equal To</option>
                                                </select>
                                            </div>
                                        </div>-->
<!--                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Timeout Value</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" name="timeout_value" id=''/>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Start Time</label>
                                            <div class="col-sm-4">
                                                <input class="form-control datepicker" type="text" value="" name="StartDate"/>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="bootstrap-timepicker">
                                                    <input class="form-control timepicker" type="text" value="" name="StartTime"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">End Time</label>
                                            <div class="col-sm-4">
                                                <input class="form-control datepicker" type="text" value="" name="EndDate"/>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="bootstrap-timepicker">
                                                    <input class="form-control timepicker" type="text" value="" name="EndTime"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Ignore Agent Groups</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-toggle IgnoreGroups" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="ignore_agent_groups" value="N"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row IgnoreGroups-Y">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Agent Group</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="rule_agent_groups" style="width:100%;">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($GroupListings as $listings) { ?>
                                                        <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                                <input type="hidden" name="rule_agent_groups" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>
                                        <?php }?>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Users</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="rule_users" style="width:100%;">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($AgentListings as $listings) { ?>
                                                        <option value="<?php echo $listings['user']; ?>"><?php echo $listings['user'] . ' - ' . $listings['full_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Actions</h5>
                                <hr/>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-right">Rule List Assignment</label>
                                            <div class="col-sm-7">
                                                <select class="form-control select2" name="rule_list_assignment" style="width:100%;" required="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($ListListings as $listings) { ?>
                                                        <option value="<?php echo $listings['list_id']; ?>"><?php echo $listings['list_id'] . ' - ' . $listings['list_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
<!--                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-right">Rule List Distribution</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" value="" name="rule_list_distribution"/>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Duplicate Lead</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_duplicate_lead" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Set Status To New</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_set_status_to_new" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Reset Called Count</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_reset_called_count" value="N"/>
                                            </div>
                                        </div>
<!--                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Reset Assigned CLI</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_reset_assigned_cli" value="N"/>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Copy Custom Fields</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_copy_custom_fields" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label text-right">Rule Active</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="rule_active" value="N"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                           
                            <div class="box-footer">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box ">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book text-success"></span>All Rules<span class="cam-name"></span></div>
                                <ul class="nav panel-tabs">
                                    <?php if (checkRole('data', 'create')) { ?>
                                    <li><a href="javascript:void(0);" class="text-success CreateRule" title="Create Rule"><i class="fa fa-plus"></i></a></li>
                                    <?php } ?>
                                    <li><a href="javascript:void(0);" class="text-success" title="Refresh Page" onclick="window.location.reload();"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $data = $DBUTG->select('data_rules', '*',['rule_agent_groups'=>$_SESSION['CurrentLogin']['user_group']]);
                                    ?>
                                    <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="ListData">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>Rule Name</th>
                                                <th>Statuses</th>
                                                <th>Use Campaign?</th>
                                                <th>Campaign</th>
                                                <th>Lists</th>
<!--                                                <th>Timeout DB Field</th>
                                                <th>Timeout Period</th>
                                                <th>Timeout Value</th>-->
                                                <th>Ignore Groups?</th>
                                                <th>Groups</th>
                                                <th>Users</th>
                                                <th>Lists</th>
                                                <th>Distribution</th>
                                                <th>Active</th>
                                                <th data-orderable="false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $value) { ?>
                                                <tr>
                                                    <td><?php echo $value['rule_name']; ?></td>
                                                    <td><?php echo $value['rule_statuses']; ?></td>
                                                    <td><?php echo $value['list_by_campaign']; ?></td>
                                                    <td><?php echo $value['rule_campaign_id']; ?></td>
                                                    <td><?php echo $value['rule_list_id']; ?></td>
<!--                                                    <td><?php echo $value['rule_timeout_field']; ?></td>
                                                    <td><?php echo $value['timeout_period']; ?></td>
                                                    <td><?php echo $value['timeout_value']; ?></td>-->
                                                    <td><?php echo $value['ignore_agent_groups']; ?></td>
                                                    <td><?php echo $value['rule_agent_groups']; ?></td>
                                                    <td><?php echo $value['rule_users']; ?></td>
                                                    <td><?php echo $value['rule_list_assignment']; ?></td>
                                                    <td><?php echo $value['rule_list_distribution']; ?></td>
                                                    <td><?php echo $value['rule_active']; ?></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-danger Remove" data-rule-id="<?php echo $value['id'];?>"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        $('#ListData').DataTable();

        $(document).ready(function () {
            $('.CreateRule').click(function () {
                $('.Create-Rule').toggle();
            });


            $('.RuleActive').click(function () {
                if (!$(this).hasClass('active')) {
                    var value = 'Y'
                } else {
                    var value = 'N'
                }
                $(this).parent().find('input').val(value);
            });

            $('.UseCampaign').click(function () {
                if (!$(this).hasClass('active')) {
                    var value = 'campaign'
                    $('.UseCampaign-Y').show();
                    $('.UseCampaign-N').hide();
                } else {
                    var value = 'list'
                    $('.UseCampaign-Y').hide();
                    $('.UseCampaign-N').show();
                }
                $(this).parent().find('input').val(value);
            });

            $('.IgnoreGroups').click(function () {
                if (!$(this).hasClass('active')) {
                    var value = 'Y'
                    $('.IgnoreGroups-Y').hide();
                } else {
                    var value = 'N'
                    $('.IgnoreGroups-Y').show();
                }
                $(this).parent().find('input').val(value);
            });
        });
        
        function filterSelectOptions(selectElement, attributeName, attributeValue) {
    if (selectElement.data("currentFilter") != attributeValue) {
        selectElement.data("currentFilter", attributeValue);
        var originalHTML = selectElement.data("originalHTML");
        if (originalHTML)
            selectElement.html(originalHTML)
        else {
            var clone = selectElement.clone();
            clone.children("option[selected]").removeAttr("selected");
            selectElement.data("originalHTML", clone.html());
        }
        if (attributeValue) {
            selectElement.children("option:not([" + attributeName + "='" + attributeValue + "'],:not([" + attributeName + "]))").remove();
        }
    }
}
   
   $("#RuleCampaign").change( function() {
    filterSelectOptions($("#RuleList"), "data-campaign", $(this).val());
    });
    
    
    
    
    
    $("#CreateDataRule").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = '<?php echo base_url('data/ajax')?>?rule=CreateDataRule';

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
//               alert(data);
//               console.log(data);
//               return false;
               var result = JSON.parse(data);
               
               if(result.success == 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#CreateDataRule')[0].reset();
                    $('.Create-Rule').toggle();
                    setTimeout(function(){ 
                    window.location.reload();
                    }, 2000);
               }else if(result.success == 0){
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

$(document).ready(function(){
   $('.Remove').click(function(){
       var value = $(this).attr('data-rule-id');
       $.ajax({
           type: "POST",
           url: '<?php echo base_url('data/ajax')?>?rule=RemoveDataRule',
           data: {rule_id:value}, // serializes the form's elements.
           success: function(data)
           {
              var result = JSON.parse(data);
               
               if(result.success == 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    setTimeout(function(){ 
                    window.location.reload();
                    }, 2000);
               }else if(result.success == 0){
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
});

$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement:1, format: 'MM/DD/YYYY h:mm A' });

$('.datepicker').datepicker({
      autoclose: true,
      dateFormat: 'yy-mm-dd'
});
    
$('.timepicker').timepicker({
  showInputs: false
});
    </script>
<?php } ?>
