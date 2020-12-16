<?php
if (!checkRole('data', 'view')) {
    no_permission();
} else {
    
   if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group[!]'=>'ADMIN','ORDER'=>['user'=>'ASC']]);
         $InboundGroupListings = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_name'=>'ASC']]);
    }else{
//        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
//        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group'],'ORDER'=>['user'=>'ASC']]);
//        $InboundGroupListings = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_name'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
        $AgentListings = $database->select('vicidial_users',['user','full_name'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER'=>['user'=>'ASC']]);
        $InboundGroupListings = $database->select('vicidial_inbound_groups',['group_id','group_name'],['ORDER'=>['group_name'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
    }
    
    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name','campaign_id'], ['ORDER' => ['list_id' => 'ASC'],'campaign_id'=>array_column($CampaignListings,'campaign_id')]);
    
    $StatusListings = $database->query("SELECT distinct(status),status_name FROM vicidial_campaign_statuses WHERE (campaign_id IN ('".implode("','",array_column($CampaignListings,'campaign_id'))."')) OR (campaign_id is NULL AND Status_Type is NOT NULL) ORDER BY status")->fetchAll(PDO::FETCH_ASSOC);
   
    
    ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row Create-Rule" style="display:none;">
                <div class="col-md-6">
                    <form method="POST" action="" id="CreateDataRule">
                        <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>
                        <div class="box">
                            <div class="box-header with-border">
                                <ul class="nav nav-tabs pull-right" role="tablist" style="margin-top:-4px;margin-right: -20px;">
					<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home8" role="tab" aria-selected="true"><span><i class="fa fa-file"></i></span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab" aria-selected="false"><span><i class="fa fa-user-plus"></i></span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8" role="tab" aria-selected="false"><span><i class="fa fa-users"></i></span></a> </li>
				</ul>
                                <h4 class="box-title">Add A New Status Email Rule</h4>
                                
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="tab-content tabcontent-border">
					<div class="tab-pane active show" id="home8" role="tabpanel">
						<div class="pad">
							<h5>Status Email Settings</h5>
                                                         <hr/>
                                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">Rule Active</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="status" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rule Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="rule_name" required=""/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">List /Campaign</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle UseCampaign" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="list_campaign" value="list"/>
                                            </div>
                                        </div>
                                        <div class="form-group row UseCampaign-Y" style="display:none;">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Campaign</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="campaign_id" style="width:100%;" id="RuleCampaign">
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
                                                <select class="form-control select2" name="list_id[]" style="width:100%;" id="RuleList" multiple="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($ListListings as $listings) { ?>
                                                        <option value="<?php echo $listings['list_id']; ?>" data-campaign="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['list_id'] . ' - ' . $listings['list_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Inbound Group</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="inbound_group" style="width:100%">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($InboundGroupListings as $listing) { ?>
                                                        <option value="<?php echo $listing['group_id']; ?>"><?php echo $listing['group_id'] . ' - ' . $listing['group_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                
                                <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Rule Statuses</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="statuses[]" style="width:100%" multiple="">
                                                    <option value="">Select Option</option>
                                                    <?php foreach ($StatusListings as $listing) { ?>
                                                        <option value="<?php echo $listing['status']; ?>"><?php echo $listing['status'] . ' - ' . $listing['status_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                
                                <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label">Called Count</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="called_count" value="" class="form-control"/>
                                            </div>
                                        </div>
							</div>
                                            <div class="box-footer">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>
					</div>
                                    <div class="tab-pane pad" id="profile8" role="tabpanel">
                                        <h5>Manager Email Settings</h5>
                                <hr/>
                                <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">Send Email To Manager</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="email_to_manager" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Addresses</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="manager_email_addresses"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Sender</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="manager_email_sender"/>
                                            </div>
                                        </div>
                                        
<!--                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">Add Recording to Email</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="recording_to_email" value="N"/>
                                            </div>
                                        </div>-->
                                        
                                    </div>
                                    <div class="tab-pane pad" id="messages8" role="tabpanel">
                                        
                                        <h5>Client Email Settings</h5>
                                <hr/>
                                <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-4 col-form-label">Send Email To Client</label>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="email_to_client" value="N"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="client_email_addresses"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Subject</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="client_email_subject"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Content</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control textarea" name="client_email_content">
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email Sender</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="" id="" name="client_email_sender"/>
                                            </div>
                                        </div>
                                    </div>
				</div>
                                
                                
                            </div>
                           
<!--                            <div class="box-footer">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>-->
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
                                    <li><a href="javascript:void(0);" class="text-success CreateRule" title="Create Rule"><i class="fa fa-plus"></i></a></li>
                                    <li><a href="javascript:void(0);" class="text-success" title="Refresh Page" onclick="window.location.reload();"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <?php $data = $DBUTG->select('status_email_settings','*',['user_group'=>$_SESSION['CurrentLogin']['user_group']]);?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered" id="ListData">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>Rule Name</th>
                                                <th>Campaign</th>
                                                <th>Statuses</th>
                                                <th>Emails</th>
                                                <th>Recording</th>
                                                <th data-orderable="false">Active</th>
                                                <th data-orderable="false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($data as $value){?>
                                           <tr>
                                                <td><?php echo $value['rule_name'];?></td>
                                                <td><?php echo $value['campaign_id'];?></td>
                                                <td><?php echo $value['statuses'];?></td>
                                                <td><?php echo $value['email_to_manager'];?></td>
                                                <td><?php echo $value['recording_to_email'];?></td>
                                                <td><?php echo $value['status'];?></td>
                                                <td data-orderable="false"><a href="javascript:void(0);" class="btn btn-danger Remove" data-rule-id="<?php echo $value['id'];?>"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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
<!--<script src="<?php echo publicAssest();?>assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>-->
<!--<script>
    //Add text editor
    $(function () {
    "use strict";
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	
  });
  </script>-->
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
    var url = '<?php echo base_url('data/ajax')?>?rule=CreateStatusEmailRule';

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
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
           url: '<?php echo base_url('data/ajax')?>?rule=RemoveStatusEmailRule',
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
    </script>
<?php } ?>
