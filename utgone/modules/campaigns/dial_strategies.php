<?php if(!checkRole('campaigns', 'view')){ no_permission(); } else { ?>
<?php
// $CampaignListings = $database->select('vicidial_campaigns','*',['active'=>'Y']);
$ListData = $database->select('vicidial_lists',['list_id','list_name'],['AND'=>['campaign_id'=>$CampaignID,'active'=>'Y']]); 
$arrayList = [];
foreach($ListData as $key=>$ListValue){
    $arrayList[$key]['value'] = $ListValue['list_id'];
    $arrayList[$key]['text'] = $ListValue['list_id'];
}
$ListArray = json_encode($arrayList);


// for select campaign start
$data = $database->get('vicidial_users', '*', ['user' => $_SESSION['Login']['user']]);
$data = $database->get('vicidial_user_groups', '*', ['user_group' => $data['user_group']]);
$LOGallowed_campaigns = $data['allowed_campaigns'];
$Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
//$SQL = "SELECT * FROM vicidial_campaigns where  campaign_id IN ('" . implode("','", $Campaign) . "')";

if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $SQL = "SELECT * FROM vicidial_campaigns ORDER BY campaign_id ASC";
}else{
//    $SQL = "SELECT * FROM vicidial_campaigns WHERE user_group = '".$_SESSION['CurrentLogin']['user_group']."' ORDER BY campaign_id ASC";
    $SQL = "SELECT * FROM vicidial_campaigns WHERE campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') ORDER BY campaign_id ASC";
}
$Rowresult = $database->query($SQL)->fetchAll();
// for select campaign end
?>
<div class="content-wrapper" style="min-height: 1500.44px;">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
    <div class="col-3">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-calculator"></i> Dialling Rules</span>
            </div>
            <div class="panel-body pn">
                <div class="form-group">
			<div class="input-group">
                            <div class="input-group-addon">
                                  <i class="fa fa-filter"></i>
                            </div>
                            <select class="form-control select2" id="LeftRuleCampaign">
                                <option value="">Select Campaign</option>
                                <?php foreach($Rowresult as $campaign){?>
                                <option value="<?php echo $campaign['campaign_id'];?>"><?php echo $campaign['campaign_id'].' - '.$campaign['campaign_name'];?></option>
                                <?php }?>
                            </select>
                        </div>
                </div>
                <div class="box-body p-0">
                    <div class="media-list media-list-hover media-list-divided RuleListDiv">

                    </div>
                </div>
                <div class="box-footer p-0" id="RuleActionDiv" style="display:block;">
                    <div align="center"style="margin-top:10px;">
                        <a class="btn btn-app btn-danger" href="javascript:void(0);" title="Remove Rule" id="RemoveRule" data-id="" data-name=""><i class="fa fa-close"></i> </a>
                        <a class="btn btn-app btn-info" href="javascript:void(0);" title="Copy Rule" id="CopyRule" data-id="" data-name=""><i class="fa fa-paste"></i> </a>
                        <a class="btn btn-app btn-success" href="javascript:void(0);" title="New Rule" id="CreateRule"><i class="fa fa-file"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-list-alt"></i> Dialler Menu</span>
            </div>
            <div class="panel-body pn">
                <p>Records in Queue: <span class="QueueRecord">0</span></p>
                <p>Campaign Dialling: <span class="DialedRecord">0</span></p>
                <p>User Online: 9</p>

                <!--<p align="center"><a class="btn btn-app btn-success" href="#"><i class="fa fa-list-ol"></i> </a> <a class="btn btn-app btn-warning" href="#"><i class="fa fa-refresh"></i> </a> </a> <a class="btn btn-app btn-info" href="#"><i class="fa fa-retweet"></i> </a></p>-->

            </div>
        </div>

    </div>
    <div class="col-6">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-database"></i> <strong>Query : <span id="middle-span-rule-name"></span></strong></span>
                <!--<a class="pull-right" id="ViewSQL" href="javascript:void(0);" title="View SQL"><i class="fa fa-chevron-left"></i> <i class="fa fa-chevron-right"></i></a>-->
                <!--<a class="pull-right" id="InputSQL" href="javascript:void(0);" title="Input SQL" data-toggle="modal" data-target="#modal-query-input"><i class="fa fa-database"></i></a>-->
            </div>
            <div class="panel-body pn" style="min-height:250px;">
                <!-- /.box-body -->
                <div id="chat-contact" class="media-list media-list-hover media-list-divided middleQueryContent" style="display:none">

                </div>
                <div id="chat-contact1">
                        <textarea class="form-control" name="" id="SQL-Condition" rows="10">
                            
                        </textarea>
                    </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-sliders"></i> Active Campaign Managment For: <strong class="CampaignName"></strong></span>
            </div>
            <div class="panel-body">
                <!-- /.box-body -->
<!--                <ul class="nav nav-tabs justify-content-end" role="tablist">

                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab"><span><i class="ion-android-create"></i></span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab"><span><i class="ion-trophy"></i></span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8" role="tab"><span><i class="ion-android-call"></i></span></a> </li>
                </ul>-->
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="home8" role="tabpanel">
                        <div class="pad">


                            <div class="table-responsive">
                                <table width="100%">
                                    <tr>
                                        <td valign="top">
                                            <div class="media-list media-list-hover media-list-divided RuleDivPercentage">

                                            </div>
                                        </td>
                                        <td><div class="small-box bg-secondary"><div class="inner"><h3 class="ActiveListCount">0</h3> <p>Active Lists</p></div><div class="icon"><i class="fa fa-shopping-bag"></i> </div></div>
                                            <div class="small-box bg-secondary"><div class="inner"><h3>100</h3> <p>Toatal Percentage</p></div><div class="icon"><i class="fa fa-percent"></i> </div></div></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
<!--                    <div class="tab-pane pad" id="profile8" role="tabpanel"><div class="table-responsive">

                        </div></div>
                    <div class="tab-pane pad" id="messages8" role="tabpanel"><div class="table-responsive">

                        </div></div>-->
                </div>

            </div>
        </div>

    </div>

    <div class="col-3">

        <form action="<?php echo base_url('campaigns/ajax')?>?case=EditRule" method="post" name="" id="EditRuleForm" autocomplete="off">
            <input type="hidden" name="list_id" value="" id="RightListID"/>
            <input type="hidden" name="campaign_id" value="" id="RightCampaignID"/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-cog"></i> Settings</span>
                </div>
                <div class="panel-body pn">
                    <div class="form-group">
                        <label>Rule Name</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input type="text" class="form-control" placeholder=""  name="rule_name" id="RightRuleName"/>
                        </div></div>

                    <div class="form-group">
                        <label>Dial Percentage</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-percent"></i>
                            </div>

                            <select class="form-control" name="percentage" id="RightRulePercentage">
                                <?php for ($i = 1; $i <= 100; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Active</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <select class="form-control" name="active" id="RightRuleActive">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Queue Priority (Highest 50)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list-ol"></i>
                            </div>
                            <select class="form-control" name="queue_priority" id="RightRuleQueuePriority">
                                <?php for ($i = 1; $i <= 100; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div></div>


                    <label>Drop In Time</label>
                    <div class="bootstrap-timepicker">
                        <!-- /.form group -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control timepicker" name="drop_in" id="RightRuleDropIN"/>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>

                    <label>Drop Out Time</label>
                    <div class="bootstrap-timepicker">
                        <!-- /.form group -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control timepicker" name="drop_out" id="RightRuleDropOUT"/>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>

                    <div class="form-group">
                        <label>Expiry Date</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right RightRuleExpiryDate" id="datepicker" name="expiry_date"/>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>List Reset</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <select class="form-control" name="reset_list" id="RightRuleResetList">
                                <option value="N">N</option>
                                <option value="Y">Y</option>
                            </select>
                        </div>
                    </div>

                    <p align="center">
                        <button class="btn btn-app btn-secondary" type="button" id="ResetRule" title="Reset Rule"><i class="fa fa-eraser"></i> </button>
                        <button class="btn btn-app btn-info" type="submit" title="Save Rule"><i class="fa fa-save"></i> </button>
                        <button class="btn btn-app btn-success TestRule" data-id='' type="button" title="Test Rule"><i class="fa fa-check"></i> </button>
                    </p>

                </div>
            </div>
        </form>
    </div>
</div>

    </section>
    <!-- /.content -->
  </div>


<style>
    .comment_line{
        background-color: #ccc;
    }
</style>



<div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Rule</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('campaigns/ajax')?>?case=CreateRule" id="CreateRuleForm">
                <input type="hidden" name="campaign" value="<?php echo $CampaignID; ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Rule Name</label>
                        <input type="text" class="form-control" name="rule_name" value="" required=""/>
                    </div>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-bold btn-pure btn-secondry" >Reset</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal center-modal fade" id="modal-copy" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Copy Rule</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('campaigns/ajax')?>?case=CopyRule" id="CopyRuleForm">
                <input type="hidden" name="campaign" value="<?php echo $CampaignID; ?>"/>
                <input type="hidden" name="list_id" value="" id="CopyListID"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Rule Name</label>
                        <input type="text" class="form-control" name="rule_name" value="" required=""/>
                    </div>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-bold btn-pure btn-secondry" >Reset</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal center-modal fade" id="modal-query" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title">Raw SQL Query</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:18px;">

            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal center-modal fade" id="modal-query-test" tabindex="-1">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-blue">
              <h5 class="modal-title">SQL Test Rule</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
          <div class="modal-body" style="font-size:18px;">
                
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
            </div>
      </div>
</div>
</div>
<div class="modal center-modal fade" id="modal-query-input" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title">SQL Query Input</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:18px;">
                <textarea class="form-control" name="query" rows="6" placeholder="Enter Your Query" id="SaveQueryInput"></textarea>        
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-success pull-right" id="SaveQuery">Save</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="" id="active_list_id" value=""/>
<input type="hidden" name="" id="source_id" value=""/>

<input type="hidden" name="" id="list_id_value" value=""/>

<link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
<script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>

<script>

$(document).ready(function(){
   $('#SaveQuery').click(function(){
      var value = $('#SaveQueryInput').val();
      if(value != ''){
          $.ajax({
            type: "POST",
            url: 'https://cogentomni.usethegeeks.com/db/test.php',
            data: {query:value}, // serializes the form's elements.
            success: function (data) {
                alert(data);
            }
        });
      }
   }); 
});


    $(document).on('click','#CreateRule',function(){
        var CampaignSelection = $('#LeftRuleCampaign').val();
        if(CampaignSelection){
            $('#modal-center').find('input[name=campaign]').val(CampaignSelection);
            $('#modal-center').modal('show');
        }else{
            swal({
                title: "Auto Close Alert",
                text: "Please select campaign",
                timer: 2000,
                showConfirmButton: true
            });
        }
    });


    $("#CreateRuleForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                var result = JSON.parse(data);
                if(result.success == 1){
                    swal("Good job!", "You have successfully created a new rule", "success");
                }
                $('#modal-center').modal('hide');
            }
        });
    });

    $("#EditRuleForm").submit(function (e) {

        var total = 0;
        $('.rule-li-list').each(function () {
            var p = $(this).attr('data-per');
            total = parseInt(total) + parseInt(p);
        });
        var newper = $('#RightRulePercentage').val();
        var tt = (parseInt(total) + parseInt(newper));


        e.preventDefault(); // avoid to execute the actual submit of the form.

        if(!$('#RightRuleName').val()){
            swal({
                title: "Auto Close Alert",
                text: "Please select rule",
                timer: 2000,
                showConfirmButton: true
            });
            return false;
        }
        if (tt > 100) {
            alert('Total Ratio can not cross limit 100');
        } else {
            var form = $(this);
            var url = form.attr('action');
            /*Add Condition Code*/
            var Obj = [];
            $('.list-datapool').each(function () {
                item = {};
                var x = $(this).attr('data-id');
                var data_first = $(this).children('li').find('#data-first-' + x).attr('data-value');
                var datapool_where = $(this).children('li').find('#datapool-where-' + x).attr('data-value');
                var datapool_condition = $(this).children('li').find('#datapool-condition-' + x).attr('data-value');
                var datapool_value1 = $(this).children('li').find('#datapool-value1-' + x).attr('data-value');
                var data_second = $(this).children('li').find('#data-second-' + x).attr('data-value');
                var datapool_value2 = $(this).children('li').find('#datapool-value2-' + x).attr('data-value');
                item['initial'] = (data_first) ? data_first : "";
                item['column_name'] = (datapool_where) ? datapool_where : "";
                item['operator'] = (datapool_condition) ? datapool_condition : "";
                item['value1'] = (datapool_value1) ? datapool_value1 : "";
                item['opt_btw'] = (data_second) ? data_second : "";
                item['value2'] = (datapool_value2) ? datapool_value2 : "";
                if ($(this).hasClass('comment_line')) {
                    item['desc'] = 'comment';
                } else {
                    item['desc'] = '';
                }
                Obj.push(item);
            });
            /*END Condition Code*/
            var FormRightPanel = $(this).serializeObject();
            var formData = {
                QueryData: Obj,
                ListData: FormRightPanel,
                SQLCondition:$('#SQL-Condition').val()
            };
            $.ajax({
                type: "POST",
                url: url,
                data: formData, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.success === 1){
                        $.toast({
                             heading: 'Welcome To UTG Dialer',
                             text: 'Your rule has been updated!!',
                             position: 'top-right',
                             loaderBg: '#ff6849',
                             icon: 'success',
                             hideAfter: 3500,
                             showHideTransition: 'plain',
                         });
                         var ListID = formData.ListData.list_id;
                         var Percentage = formData.ListData.percentage;
                         var QueuePriority = formData.ListData.queue_priority;
                         var RuleName = formData.ListData.rule_name;
                         var SectionID = $('.section-'+ListID);
                         SectionID.find('.name-section').html(RuleName);
                         SectionID.find('.priority-section').html(QueuePriority+'%');
                         SectionID.find('.percentage-section').html(Percentage+'%');
                    }else{
                        $.toast({
                             heading: 'Welcome To UTG Dialer',
                             text: 'Something gonna wrong!!',
                             position: 'top-right',
                             loaderBg: '#ff6849',
                             icon: 'error',
                             hideAfter: 3500,
                             showHideTransition: 'plain',
                         });
                    }
                }
            });
        }
    });

    $("#CopyRuleForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                var result = JSON.parse(data);
                var ListData = result.data;
                $('.RuleListDiv').append('<div class="media media-single">' +
                        '<div class="media-body">' +
                        '<h6><a href="javascript:void(0);" class="rule-li-list" data-c="' + ListData.campaign + '" id="rulelistId-' + ListData.list_id + '" data-per="' + ListData.percentage + '" data-name="' + ListData.list_name + '" data-id="' + ListData.list_id + '">' + ListData.list_name + ' - ' + ListData.percentage + '%</a></h6>' +
                        '</div>' +
                        '</div>');
                $('#modal-copy').modal('hide');
            }
        });
    });


    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    var dialogBox = '';

    $(document).on('click', '.rule-li-list', function (e) {
        $('.rule-li-list').removeClass('active');
        $(this).addClass('active');
        var cid = $(this).attr('data-c');
        var t = 0;
        $('.li-rule-' + cid).each(function () {
            var p = $(this).attr('data-p');
            t = parseInt(t) + parseInt(p);
        });

//        $('.panel-middle-body').loading({message: 'Please wait..', theme: 'dark'});
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var per = $(this).attr('data-per');
        $('#RemoveRule,#CopyRule').attr('data-id', id);
        $('#RemoveRule,#CopyRule').attr('data-name', name);
        $('.TestRule').attr('data-id', id);
        $.get("<?php echo base_url('campaigns/ajax')?>?case=hopper-getRuleDetails&listId=" + id, function (resp) {
            var resultResponse = resp;
            if (resultResponse.success == 1) {
                $('#middle-span-rule-name').html(name);
                $('#ViewSQL').attr('data-id', id);
                var result = resultResponse.data;
                getDetailQuery(result.list_id);

                $("#RightRuleName").val(result.list_name);
                $("#RightRulePercentage").val(result.percentage);
                $("#RightRuleActive").val(result.status);
                $("#RightRuleQueuePriority").val(result.queue_priority);
                $("#RightRuleDropIN").val(result.drop_in);
                $("#RightRuleDropOUT").val(result.drop_out);
                $(".RightRuleExpiryDate").val(result.expiry_date);
                $("#RightListID").val(result.list_id);
                $("#RightCampaignID").val(cid);
                $(".panel-right").find('#RightTotal').val(t);
                $('#SQL-Condition').val(result.sql_condition)
//                $('.panel-middle-body').loading('stop');
            }
        }, 'json');
    });

    function getDetailQuery(listId) {
        $.get("<?php echo base_url('campaigns/ajax')?>?case=hopper-getRuleQuery&listId=" + listId, function (resp) {
            $('.middleQueryContent').html('');
            $('.middleQueryContent').html(resp);
        });
    }

    /*GET Rule*/
    $(document).on('change','#LeftRuleCampaign',function(){
       var CampaignID = $(this).val();
       var CampaignName = $('#LeftRuleCampaign option:selected').text();
       $('.CampaignName').html(CampaignName);
       $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax')?>?case=GetRule',
                data: {campaign: CampaignID},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('.RuleListDiv').html('');
                    $('.RuleDivPercentage').html('');
                    var ActiveCount = 0;
                    $.each(result.data.ListDetail,function(key,value){
                        if(value.active == 'Y'){
                            ActiveCount++;
                        }
                        $('.RuleListDiv').append('<a class="media media-single rule-li-list section-'+value.list_id+'" href="javascript:void(0);" data-c="'+CampaignID+'" id="rulelistId-'+value.list_id+'" data-per="'+value.percentage+'" data-name="'+value.list_name+'" data-id="'+value.list_id+'">'
                                +'<span class="title name-section">'+value.list_name+'</span>'
                                +'<span class="badge badge-pill badge-primary percentage-section">'+value.percentage+'%</span>'
                                +'<span class="badge badge-pill badge-warning priority-section">'+value.queue_priority+'%</span>'
                            +'</a>');
                            var text = "";
                            for (i = 1; i <= 100; i++) {
                                if(i == value.percentage){
                                    text += '<option value="'+i+'" selected="selected">'+i+'%</option>';
                                }else{
                                    text += '<option value="'+i+'">'+i+'%</option>';
                                }
                            }
                            $('.RuleDivPercentage').append('<a class="media media-single" href="javascript:void(0);">'
					  +'<span class="title">'+value.list_name+'</span>'
					  +'<div class="form-group mr-10" style="width: 20%; float: left;">'
                                                            +'<div class="input-group">'
                                                                +'<select class="form-control select2 rule-percentage" name="" data-id="'+value.list_id+'" data-campaign="'+CampaignID+'">'
                                                                   +text
                                                                    +'</select>'
                                                            +'</div>'
                                                        +'</div>'
					+'</a>');


                    })
                    $('.ActiveListCount').html(ActiveCount);
                    $('#RuleActionDiv').show();
                    
                    $('#active_list_id').val(result.data.ListListing);
                    $('#source_id').val(result.data.SourceListing);
                }
            });


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax')?>?case=GetRuleData',
                data: {campaign: CampaignID},
                success: function (data) {
                    var result = JSON.parse(data);
                    $('.QueueRecord').html(result.data.Queue);
                    $('.DialedRecord').html(result.data.Dialed);
                }
            });
    });
    
    /*GET Rule**/




    /*Add New Condition Click*/
    $(document).on('click', '#AddnewRule', function (e) {
        var length = $('.panel-middle-datapool').find('.list-datapool').length;
        var html = '';
        html += '<ul class="list-inline list-datapool" id="ul-datapool' + length + '" data-id="' + length + '">';
        if (length > 0) {
            html += '<li><span class="data-first" id="data-first-' + length + '" data-key="' + length + '" data-value="and" > and </span></li>';
        }
//        html += '<li>'
//                + '<span class="editable editable-click datapool-where" '
//                + 'data-type="select" data-value=""  data-title="" id="datapool-where-' + length + '" data-name="datapool-where-' + length + '"'
//                + 'data-key="' + length + '" data-url="" >'
//                + 'Data Pool</span>'
//                + '</li>'
//                + '<li>'
//                + '<span class="editable editable-click datapool-condition"'
//                + 'data-type="select" id="datapool-condition-' + length + '" data-name="datapool-condition" '
//                + 'data-key="' + length + '" data-value="" data-url="" data-title="">'
//                + 'Data Pool</span>'
//                + '</li>'
//                + '<li>'
//
//                + '<span class="editable editable-click datapool-value1" '
//                + 'data-type="text" id="datapool-value1-' + length + '" data-name="datapool-value1-' + length + '" '
//                + 'data-key="' + length + '" data-url="" data-value=""  data-title="">'
//                + 'value</span>'
//                + '</li>'
//                + '<li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>'
//                + '<li class="RemovePoolRule"><i class="fa fa-times"><i></li>'
//                + '</ul>';
html += '<li>'
                + '<span class="editable editable-click datapool-where" '
                + 'data-type="select" data-value=""  data-title="" id="datapool-where-' + length + '" data-name="datapool-where-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'Data Pool</span>'
                + '</li>'
                + '<li>'
                + '<span class="editable editable-click datapool-condition"'
                + 'data-type="select" id="datapool-condition-' + length + '" data-name="datapool-condition" '
                + 'data-key="' + length + '" data-value="" data-url="" data-title="">'
                + 'Data Pool</span>'
                + '</li>'
                + '<li class="value_key">'
                + '<span class="editable editable-click datapool-value1" '
                + 'data-type="text" id="datapool-value1-' + length + '" data-name="datapool-value1-' + length + '" '
                + 'data-key="' + length + '" data-url="" data-value=""  data-title="">'
                + 'value</span>'
                + '</li>'
                + '<li class="list_id_key" style="visibility:hidden;">'
                + '<span class="editable editable-click datapool-where123" '
                + 'data-type="select" data-value=""  data-title="" id="datapool-where123-' + length + '" data-name="datapool-where123-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'Select List</span>'
                + '</li>'
                + '<li class="source_id_key" style="visibility:hidden;">'
                + '<span class="editable editable-click datapool-whereSourceID" '
                + 'data-type="select" data-value=""  data-title="" id="datapool-where123-' + length + '" data-name="datapool-where123-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'Select Source</span>'
                + '</li>'
                + '<li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>'    
                + '<li class="RemovePoolRule"><i class="fa fa-times"><i></li>'    
                + '</ul>';
        $('.panel-middle-datapool').append(html);
        $.fn.editable.defaults.mode = 'inline';
        $('.datapool-where').editable({
            placeholder: 'Select DataPool',
            value: 'lead_id',
            showbuttons: false,
            source: [
                {value: 'lead_id', text: 'lead id'},
                {value: 'entry_date', text: 'entry date'},
                {value: 'modify_date', text: 'modify date'},
                {value: 'status', text: 'status'},
                {value: 'user', text: 'user'},
                {value: 'vendor_lead_code', text: 'vendor lead code'},
                {value: 'source_id', text: 'source id'},
                {value: 'list_id', text: 'list id'},
                {value: 'gmt_offset_now', text: 'gmt offset now'},
                {value: 'called_since_last_reset', text: 'called since last reset'},
                {value: 'phone_code', text: 'phone code'},
                {value: 'phone_number', text: 'phone number'},
                {value: 'title', text: 'title'},
                {value: 'first_name', text: 'first name'},
                {value: 'middle_initial', text: 'middle initial'},
                {value: 'last_name', text: 'last name'},
                {value: 'address1', text: 'address1'},
                {value: 'address2', text: 'address2'},
                {value: 'address3', text: 'address3'},
                {value: 'city', text: 'city'},
                {value: 'state', text: 'state'},
                {value: 'province', text: 'province'},
                {value: 'postal_code', text: 'postal code'},
                {value: 'country_code', text: 'country code'},
                {value: 'gender', text: 'gender'},
                {value: 'date_of_birth', text: 'date of birth'},
                {value: 'alt_phone', text: 'alt phone'},
                {value: 'email', text: 'email'},
                {value: 'security_phrase', text: 'security phrase'},
                {value: 'comments', text: 'comments'},
                {value: 'called_count', text: 'called count'},
                {value: 'last_local_call_time', text: 'last local call time'},
                {value: 'rank', text: 'rank'},
                {value: 'owner', text: 'owner'},
                {value: 'entry_list_id', text: 'entry list id'},
                {value: 'best_time_to_call', text: 'best time to call'},
                {value: 'sms_count', text: 'sms count'}
            ],
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
//                if (newValue == 'list_id') {
//                    $('#ul-datapool' + k).find('.datapool-value1').addClass('placeAjax');
//                }
                if(newValue == 'list_id'){
                    $(this).parent().parent().find('.list_id_key').css('visibility','visible');
                 }
                if(newValue == 'source_id'){
                    var ParentDiv = $(this);
//                      $(this).parent().parent().remove();
                    if(!$("#list_id_value").val().length == 0){
                        var ListIDs = $("#list_id_value").val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('campaigns/ajax')?>?case=GetSource',
                            data: {'ListID':ListIDs},
                            success: function (data) {
                                var Result = JSON.parse(data);
                                $('#source_id').val(Result.data);
                                ParentDiv.parent().parent().remove();
                                AddRuleUpdate();
//                               $(this).parent().parent().find('.datapool-whereSourceID').editable({source:Result.data});
                            }
                        });
                        
                    }
                    $(this).parent().parent().find('.source_id_key').css('visibility','visible');
                   
                 }
            }
        });
        
        $('.datapool-whereSourceID').editable({
            placeholder: 'Select Value',     
            value: 'list_id',
            showbuttons: false,
            source:$('#source_id').val(), 
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                var OldValue = $(this).parent().parent().find('.datapool-value1').html();
                if(OldValue == 'value'){
                     $(this).parent().parent().find('.datapool-value1').html(newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',newValue);
                }else{
                     $(this).parent().parent().find('.datapool-value1').html(OldValue+','+newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',OldValue+','+newValue);
                }
               
                 
//                $(this).attr('data-value', newValue);
            }
        })
        
        $('.datapool-where123').editable({
            placeholder: 'Select Value',
            value: 'list_id',
            showbuttons: false,
            source:$('#active_list_id').val(), 
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                var OldValue = $(this).parent().parent().find('.datapool-value1').html();
                if(OldValue == 'value'){
                    $(this).parent().parent().find('.datapool-value1').html(newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',newValue);
                     $(this).parent().parent().find('.datapool-where123').html('Select List');
                    $('#list_id_value').val(newValue);
                }else{
                    $(this).parent().parent().find('.datapool-value1').html(OldValue+','+newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',OldValue+','+newValue);
                    $(this).parent().parent().find('.datapool-where123').html('Select List');
                    $('#list_id_value').val(OldValue+','+newValue);
                }
            }
        });
        $('.datapool-condition').editable({
            showbuttons: false,
            placeholder: 'Select Where',
            source: [
                {value: '=', text: 'is equal to'},
                {value: 'BETWEEN', text: 'is between'},
                {value: '<', text: 'is less then'},
                {value: '<=', text: 'is less then or equal to'},
                {value: '>', text: 'is greater then'},
                {value: 'IN', text: 'is in list'},
                {value: '!=', text: 'is not eual to'},
                {value: 'NOT BETWEEN', text: 'is not between'},
                {value: 'NOT IN', text: 'is not in list'},
                {value: 'NOT NULL', text: 'is not null'},
            ],
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
                if (newValue == 'BETWEEN' || newValue == 'NOT BETWEEN') {
                    $('#ul-datapool' + k).find('.CommentPoolRule').before(
                            '<li  class="li-value-2' + k + '"><span class="data-second" data-key="' + k + '" id="data-second-' + k + '" data-value="AND" > and </span></li>'
                            + '<li class="li-value-2' + k + '">'

                            + '<span data-key="' + k + '" class="editable editable-click datapool-value2" '
                            + 'data-type="text" id="datapool-value2-' + k + '" data-name="datapool-value2-' + k + '" '
                            + 'data-key="' + k + '" data-url="" data-value="" data-title="">'
                            + 'value</span>'
                            + '</li>');
                    $('.datapool-value2').editable({
                        showbuttons: false,
                        success: function (response, newValue) {
                            var k = $(this).editable().data('key');
                            $(this).attr('data-value', newValue);
                        }
                    });
                    $('.datapool-value2').on('shown', function (e, editable) {
                        //console.log("out-editable",editable);
                        $(document).on('change', editable, function () {
                            //console.log("in-editable",editable);
                            var new_value = editable.input.$input[0].value;
                            //console.log("element", editable.$element[0].attributes[2].value);
                            var span = editable.$element[0].attributes[2].value;
                            $('#' + span).text(new_value);
                            $('#' + span).attr('data-value', new_value);
                        });
                    });
                } else {
                    $('.li-value-2' + k).remove();
                }
            }
        });
        $('.datapool-value1').editable({
            showbuttons: false,
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
            },
            //  change:function(response, editable){
            //   console.log(editable);
            // }
        });


        $('.datapool-value1').on('shown', function (e, editable) {
            //console.log("out-editable",editable);
            $(document).on('change', editable, function () {
                //console.log("in-editable",editable);
                var new_value = editable.input.$input[0].value;
                //console.log("element", editable.$element[0].attributes[2].value);
                var span = editable.$element[0].attributes[2].value;
                $('#' + span).text(new_value);
                $('#' + span).attr('data-value', new_value);
            });
        });


    });



   function AddRuleUpdate(){
        var length = $('.panel-middle-datapool').find('.list-datapool').length;
        var html = '';
        html += '<ul class="list-inline list-datapool" id="ul-datapool' + length + '" data-id="' + length + '">';
        if (length > 0) {
            html += '<li><span class="data-first" id="data-first-' + length + '" data-key="' + length + '" data-value="and" > and </span></li>';
        }
//        html += '<li>'
//                + '<span class="editable editable-click datapool-where" '
//                + 'data-type="select" data-value=""  data-title="" id="datapool-where-' + length + '" data-name="datapool-where-' + length + '"'
//                + 'data-key="' + length + '" data-url="" >'
//                + 'Data Pool</span>'
//                + '</li>'
//                + '<li>'
//                + '<span class="editable editable-click datapool-condition"'
//                + 'data-type="select" id="datapool-condition-' + length + '" data-name="datapool-condition" '
//                + 'data-key="' + length + '" data-value="" data-url="" data-title="">'
//                + 'Data Pool</span>'
//                + '</li>'
//                + '<li>'
//
//                + '<span class="editable editable-click datapool-value1" '
//                + 'data-type="text" id="datapool-value1-' + length + '" data-name="datapool-value1-' + length + '" '
//                + 'data-key="' + length + '" data-url="" data-value=""  data-title="">'
//                + 'value</span>'
//                + '</li>'
//                + '<li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>'
//                + '<li class="RemovePoolRule"><i class="fa fa-times"><i></li>'
//                + '</ul>';
html += '<li>'
                + '<span class="editable editable-click datapool-where" '
                + 'data-type="select" data-value="source_id"  data-title="" id="datapool-where-' + length + '" data-name="datapool-where-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'source_id</span>'
                + '</li>'
                + '<li>'
                + '<span class="editable editable-click datapool-condition"'
                + 'data-type="select" id="datapool-condition-' + length + '" data-name="datapool-condition" '
                + 'data-key="' + length + '" data-value="" data-url="" data-title="">'
                + 'Data Pool</span>'
                + '</li>'
                + '<li class="value_key">'
                + '<span class="editable editable-click datapool-value1" '
                + 'data-type="text" id="datapool-value1-' + length + '" data-name="datapool-value1-' + length + '" '
                + 'data-key="' + length + '" data-url="" data-value=""  data-title="">'
                + 'value</span>'
                + '</li>'
                + '<li class="list_id_key" style="visibility:hidden;">'
                + '<span class="editable editable-click datapool-where123" '
                + 'data-type="select" data-value=""  data-title="" id="datapool-where123-' + length + '" data-name="datapool-where123-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'Select List</span>'
                + '</li>'
                + '<li class="source_id_key" style="visibility:visible;">'
                + '<span class="editable editable-click datapool-whereSourceID" '
                + 'data-type="select" data-value=""  data-title="" id="datapool-where123-' + length + '" data-name="datapool-where123-' + length + '"'
                + 'data-key="' + length + '" data-url="" >'
                + 'Select Source</span>'
                + '</li>'
                + '<li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>'    
                + '<li class="RemovePoolRule"><i class="fa fa-times"><i></li>'    
                + '</ul>';
        $('.panel-middle-datapool').append(html);
        $.fn.editable.defaults.mode = 'inline';
        $('.datapool-where').editable({
            placeholder: 'Select DataPool',
            defaultValue: 'source_id',
            showbuttons: false,
            source: [
                {value: 'lead_id', text: 'lead id'},
                {value: 'entry_date', text: 'entry date'},
                {value: 'modify_date', text: 'modify date'},
                {value: 'status', text: 'status'},
                {value: 'user', text: 'user'},
                {value: 'vendor_lead_code', text: 'vendor lead code'},
                {value: 'source_id', text: 'source id'},
                {value: 'list_id', text: 'list id'},
                {value: 'gmt_offset_now', text: 'gmt offset now'},
                {value: 'called_since_last_reset', text: 'called since last reset'},
                {value: 'phone_code', text: 'phone code'},
                {value: 'phone_number', text: 'phone number'},
                {value: 'title', text: 'title'},
                {value: 'first_name', text: 'first name'},
                {value: 'middle_initial', text: 'middle initial'},
                {value: 'last_name', text: 'last name'},
                {value: 'address1', text: 'address1'},
                {value: 'address2', text: 'address2'},
                {value: 'address3', text: 'address3'},
                {value: 'city', text: 'city'},
                {value: 'state', text: 'state'},
                {value: 'province', text: 'province'},
                {value: 'postal_code', text: 'postal code'},
                {value: 'country_code', text: 'country code'},
                {value: 'gender', text: 'gender'},
                {value: 'date_of_birth', text: 'date of birth'},
                {value: 'alt_phone', text: 'alt phone'},
                {value: 'email', text: 'email'},
                {value: 'security_phrase', text: 'security phrase'},
                {value: 'comments', text: 'comments'},
                {value: 'called_count', text: 'called count'},
                {value: 'last_local_call_time', text: 'last local call time'},
                {value: 'rank', text: 'rank'},
                {value: 'owner', text: 'owner'},
                {value: 'entry_list_id', text: 'entry list id'},
                {value: 'best_time_to_call', text: 'best time to call'},
                {value: 'sms_count', text: 'sms count'}
            ],
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
//                if (newValue == 'list_id') {
//                    $('#ul-datapool' + k).find('.datapool-value1').addClass('placeAjax');
//                }
                if(newValue == 'list_id'){
                    $(this).parent().parent().find('.list_id_key').css('visibility','visible');
                 }
                if(newValue == 'source_id'){
                    if(!$("#list_id_value").val().length == 0){
                        var ListIDs = $("#list_id_value").val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('campaigns/ajax')?>?case=GetSource',
                            data: {'ListID':ListIDs},
                            success: function (data) {
                                var Result = JSON.parse(data);
                                $('#source_id').val(Result.data);
//                               $(this).parent().parent().find('.datapool-whereSourceID').editable({source:Result.data});
                            }
                        });
                        
                    }
                    $(this).parent().parent().find('.source_id_key').css('visibility','visible');
                   
                 }
            }
        });
        
        $('.datapool-whereSourceID').editable({
            placeholder: 'Select Value',     
            value: 'list_id',
            showbuttons: false,
            source:$('#source_id').val(), 
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                var OldValue = $(this).parent().parent().find('.datapool-value1').html();
                if(OldValue == 'value'){
                     $(this).parent().parent().find('.datapool-value1').html(newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',newValue);
                }else{
                     $(this).parent().parent().find('.datapool-value1').html(OldValue+','+newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',OldValue+','+newValue);
                }
               
                 
//                $(this).attr('data-value', newValue);
            }
        })
        
        $('.datapool-where123').editable({
            placeholder: 'Select Value',
            value: 'list_id',
            showbuttons: false,
            source:$('#active_list_id').val(), 
            success: function (response, newValue) {
                
                var k = $(this).editable().data('key');
                var OldValue = $(this).parent().parent().find('.datapool-value1').html();
                if(OldValue == 'value'){
                    $(this).parent().parent().find('.datapool-value1').html(newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',newValue);
                    $('#list_id_value').val(newValue);
                }else{
                    $(this).parent().parent().find('.datapool-value1').html(OldValue+','+newValue);
                    $(this).parent().parent().find('.datapool-value1').attr('data-value',OldValue+','+newValue);
                    $('#list_id_value').val(OldValue+','+newValue);
                }
               
                 
//                $(this).attr('data-value', newValue);
            }
        });
        $('.datapool-condition').editable({
            showbuttons: false,
            placeholder: 'Select Where',
            source: [
                {value: '=', text: 'is equal to'},
                {value: 'BETWEEN', text: 'is between'},
                {value: '<', text: 'is less then'},
                {value: '<=', text: 'is less then or equal to'},
                {value: '>', text: 'is greater then'},
                {value: 'IN', text: 'is in list'},
                {value: '!=', text: 'is not eual to'},
                {value: 'NOT BETWEEN', text: 'is not between'},
                {value: 'NOT IN', text: 'is not in list'},
                {value: 'NOT NULL', text: 'is not null'},
            ],
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
                if (newValue == 'BETWEEN' || newValue == 'NOT BETWEEN') {
                    $('#ul-datapool' + k).find('.CommentPoolRule').before(
                            '<li  class="li-value-2' + k + '"><span class="data-second" data-key="' + k + '" id="data-second-' + k + '" data-value="AND" > and </span></li>'
                            + '<li class="li-value-2' + k + '">'

                            + '<span data-key="' + k + '" class="editable editable-click datapool-value2" '
                            + 'data-type="text" id="datapool-value2-' + k + '" data-name="datapool-value2-' + k + '" '
                            + 'data-key="' + k + '" data-url="" data-value="" data-title="">'
                            + 'value</span>'
                            + '</li>');
                    $('.datapool-value2').editable({
                        showbuttons: false,
                        success: function (response, newValue) {
                            var k = $(this).editable().data('key');
                            $(this).attr('data-value', newValue);
                        }
                    });
                    $('.datapool-value2').on('shown', function (e, editable) {
                        //console.log("out-editable",editable);
                        $(document).on('change', editable, function () {
                            //console.log("in-editable",editable);
                            var new_value = editable.input.$input[0].value;
                            //console.log("element", editable.$element[0].attributes[2].value);
                            var span = editable.$element[0].attributes[2].value;
                            $('#' + span).text(new_value);
                            $('#' + span).attr('data-value', new_value);
                        });
                    });
                } else {
                    $('.li-value-2' + k).remove();
                }
            }
        });
        $('.datapool-value1').editable({
            showbuttons: false,
            success: function (response, newValue) {
                var k = $(this).editable().data('key');
                $(this).attr('data-value', newValue);
            },
            //  change:function(response, editable){
            //   console.log(editable);
            // }
        });


        $('.datapool-value1').on('shown', function (e, editable) {
            //console.log("out-editable",editable);
            $(document).on('change', editable, function () {
                //console.log("in-editable",editable);
                var new_value = editable.input.$input[0].value;
                //console.log("element", editable.$element[0].attributes[2].value);
                var span = editable.$element[0].attributes[2].value;
                $('#' + span).text(new_value);
                $('#' + span).attr('data-value', new_value);
            });
        });


    }

    $(document).on('click', '#ViewSQL', function (e) {
        var listID = $(this).attr('data-id');
        if (listID > 0 && listID != '') {
            var Obj = [];
            $('.list-datapool').each(function () {
                if ($(this).hasClass('comment_line')) {

                } else {

                    item = {};
                    var x = $(this).attr('data-id');
                    //data-first datapool-where datapool-condition datapool-value1  data-second datapool-value2
                    var data_first = $(this).children('li').find('#data-first-' + x).attr('data-value');
                    var datapool_where = $(this).children('li').find('#datapool-where-' + x).attr('data-value');
                    var datapool_condition = $(this).children('li').find('#datapool-condition-' + x).attr('data-value');
                    var datapool_value1 = $(this).children('li').find('#datapool-value1-' + x).attr('data-value');
                    var data_second = $(this).children('li').find('#data-second-' + x).attr('data-value');
                    var datapool_value2 = $(this).children('li').find('#datapool-value2-' + x).attr('data-value');
                    item['initial'] = (data_first) ? data_first : "";
                    item['column_name'] = (datapool_where) ? datapool_where : "";
                    item['operator'] = (datapool_condition) ? datapool_condition : "";
                    item['value1'] = (datapool_value1) ? datapool_value1 : "";
                    item['opt_btw'] = (data_second) ? data_second : "";
                    item['value2'] = (datapool_value2) ? datapool_value2 : "";
                    Obj.push(item);
                }
            });
            var FormRightPanel = $('form#FormRightPanel').serializeObject();
            var formData = {
                queryData: Obj,
                otherData: FormRightPanel,
            };


            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax')?>?case=ViewRule',
                data: formData, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#modal-query').modal('show');
                    $('#modal-query').find('.modal-body').html(result.data);
                    //               var result = JSON.parse(data);
                    //               $('#modal-center').modal('hide');
                }
            });
//            $.post("hopper-viewSQL.php", formData, function (ContentResp) {
//                dialogBox = $.dialog({
//                    title: 'View Raw SQL Query',
//                    content: ContentResp,
//                    type: 'blue',
//                    animation: 'scale',
//                    columnClass: 'small',
//                    closeAnimation: 'scale',
//                    backgroundDismiss: true,
//                });
//            })
        } else {
            alert("No rule selected");
        }
    })


//    $(document).on('click', '.RuleEnable', function (e) {
//        var val = '';
//        var id = $(this).attr('data-id');
//        if ($(this).prop("checked") == true) {
//            val = "1";
//        } else if ($(this).prop("checked") == false) {
//            val = "0";
//        }
//        // $('.panel-middle-body').loading({message: 'Please wait..', theme: 'dark'});
//        $.get("hopper-upDateRuleStatus.php?id=" + id + "&val=" + val, function (response) {
//
//        });
//    });
//
//    $(document).on('change', '#LeftCampaignFilter', function (e) {
//        var val = $(this).val();
//        $.get("hopper-getRuleByCampaign.php?campaignId=" + val, function (resp) {
//            $('#listRules').html('');
//            $('#listRules').html(resp);
//        })
//    });

//    $(document).on('input', '.speedChange', function () {
//        var id = $(this).attr('data-id');
//        var val = $(this).val();
//        $.get("ajax_campaignupdate.php?col=auto_dial_level&campaignId=" + id + "&val=" + val, function (resp) {
//            var status = $.trim(resp.status);
//            if (status == "success") {
//                var span = $('#span-' + id).text(resp.data);
//            }
//
//        }, 'json');
//
//    })



    $(document).on('click', '#RemoveRule', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        if (id) {
            var r = confirm("Are you sure you want to remove " + name + " ?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax')?>?case=RemoveRule',
                    data: {ListId: id},
                    success: function (data) {
//                        alert(data);
                        $('#rulelistId-' + id).remove();
                    }
                });
            }
        } else {
            alert('Please select rule!!');
        }
    });


    $(document).on('click', '#CopyRule', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#CopyListID').val(id);
        if (id) {
            var r = confirm("Are you sure you want to copy rule " + name + " ?");
            if (r == true) {
                $('#modal-copy').modal('show');
            }
        } else {
            alert('Please select rule!!');
        }
    });


    $(document).on('click', '.SaveRuleQuery', function () {
        var Obj = [];
        $('.list-datapool').each(function () {
            item = {};
            var x = $(this).attr('data-id');
            //data-first datapool-where datapool-condition datapool-value1  data-second datapool-value2
            var data_first = $(this).children('li').find('#data-first-' + x).attr('data-value');
            var datapool_where = $(this).children('li').find('#datapool-where-' + x).attr('data-value');
            var datapool_condition = $(this).children('li').find('#datapool-condition-' + x).attr('data-value');
            var datapool_value1 = $(this).children('li').find('#datapool-value1-' + x).attr('data-value');
            var data_second = $(this).children('li').find('#data-second-' + x).attr('data-value');
            var datapool_value2 = $(this).children('li').find('#datapool-value2-' + x).attr('data-value');
            item['initial'] = (data_first) ? data_first : "";
            item['column_name'] = (datapool_where) ? datapool_where : "";
            item['operator'] = (datapool_condition) ? datapool_condition : "";
            item['value1'] = (datapool_value1) ? datapool_value1 : "";
            item['opt_btw'] = (data_second) ? data_second : "";
            item['value2'] = (datapool_value2) ? datapool_value2 : "";
            Obj.push(item);
        });
        console.log(Obj);
    });

    $(document).on('click', '.RemovePoolRule', function () {
        $(this).parent().remove();
    });

    $(document).on('click', '.CommentPoolRule', function () {
        if ($(this).parent().hasClass('comment_line')) {
            $(this).parent().removeClass('comment_line');
        } else {
            $(this).parent().addClass('comment_line');
        }
    });

    


    $(document).on('click','#ResetRule',function(){
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this rule!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, reset it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                $('.panel-middle-datapool').html('');
                swal("Reset!", "Your rule has been reset.", "success");
            } else {
                swal("Cancelled", "Your rule is safe :)", "error");
            }
        });
    });


    $(document).on('change','.rule-percentage',function(){
    var value = $(this).val();
    var id = $(this).data('id');
    var campaign = $(this).data('campaign');
    var RulePercentage = $(this);


    swal({
            title: "Are you sure?",
            text: "You want to update this rule percentage!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                        type: "POST",
                        url:'<?php echo base_url('campaigns/ajax')?>?case=UpdatePercentage',
                        data: {ListId:id,val:value,campaign:campaign},
                        success: function(data){
                            var result = JSON.parse(data);
                        if(result.success == 1){
                            $('.section-'+id).find('.percentage-section').html(value+'%');
                            swal("Updated!", result.message, "success");
                            }else if(result.success == 0){
                                swal("No Update!", result.message, "success");
                                RulePercentage.prop('selectedIndex',result.data);
                        }
                        }
                    });
            } else {
                swal("Cancelled", "Your rule percentage is safe :)", "error");
            }
        });

    });
$(document).on('click', '.TestRule', function (e) {
        var listID = $(this).attr('data-id');
        if (listID > 0 && listID != '') {
            var Obj = [];
            $('.list-datapool').each(function () {
                if($(this).hasClass('comment_line')){
                    
                }else{
                    
                    item = {};
                    var x = $(this).attr('data-id');
                    //data-first datapool-where datapool-condition datapool-value1  data-second datapool-value2
                    var data_first = $(this).children('li').find('#data-first-' + x).attr('data-value');
                    var datapool_where = $(this).children('li').find('#datapool-where-' + x).attr('data-value');
                    var datapool_condition = $(this).children('li').find('#datapool-condition-' + x).attr('data-value');
                    var datapool_value1 = $(this).children('li').find('#datapool-value1-' + x).attr('data-value');
                    var data_second = $(this).children('li').find('#data-second-' + x).attr('data-value');
                    var datapool_value2 = $(this).children('li').find('#datapool-value2-' + x).attr('data-value');
                    item['initial'] = (data_first) ? data_first : "";
                    item['column_name'] = (datapool_where) ? datapool_where : "";
                    item['operator'] = (datapool_condition) ? datapool_condition : "";
                    item['value1'] = (datapool_value1) ? datapool_value1 : "";
                    item['opt_btw'] = (data_second) ? data_second : "";
                    item['value2'] = (datapool_value2) ? datapool_value2 : "";
                    Obj.push(item);
                }
            });
            var FormRightPanel = $('form#FormRightPanel').serializeObject();
            var formData = {
                queryData: Obj,
                otherData: FormRightPanel,
                SQLCondition:$('#SQL-Condition').val()
            };
           
            
            $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax')?>?case=TestRule',
                    data: formData, // serializes the form's elements.
                    success: function(data){
                       var result = JSON.parse(data);
                        $('#modal-query-test').modal('show');
                        $('#modal-query-test').find('.modal-body').html(result.data);
                    }
                  });
        } else {
            alert("No rule selected");
        }
    })
    
    
    
   setInterval(function(){ 
       $('.datapool-where123').text('Select List');
        $('.datapool-whereSourceID').text('Select Source');
    }, 1000);
    
</script>
<?php } ?>
