<?php if(!checkRole('email', 'create')){ no_permission(); } else {?>
<?php
$routineData = false;
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $routineData = $DBEmail->query('SELECT * FROM routines WHERE id = '.$_GET['id'].' limit 1')->fetch(PDO::FETCH_ASSOC);
}elseif(isset($_GET['copy']) && is_numeric($_GET['copy'])) {
    $routineData = $DBEmail->query('SELECT * FROM routines WHERE id = '.$_GET['copy'].' limit 1')->fetch(PDO::FETCH_ASSOC);
    unset($routineData['id']);
    $DBEmail->insert('routines', $routineData);
    $routineData['id'] = $DBEmail->id();
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1> Email Routine Form</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('email/routines')?>">Email Routines</a></li>
            <li class="breadcrumb-item active">Create Routine</li>
        </ol>
    </section>-->
    <!-- Main content -->
<section class="content">
    <form method="POST" action="#" accept-charset="UTF-8" id="template_form" autocomplete="off" novalidate="novalidate">
        <input type="hidden" name="id" value="<?php echo $routineData ? $routineData['id'] : ''?>">
    <div class="row">
        <div class="col-lg-6 col-12">
            <!-- Basic Forms -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-info"></i> Basic Information</span>
                </div>
                <!-- /.box-header -->
                <div class="panel-body pn">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                class="fa fa-user"></i></span><input type="text"
                                            class="form-control" placeholder="Name" name="name" value="<?php echo $routineData ? $routineData['name'] : ''?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                class="fa fa-pencil"></i></span><input type="text"
                                            class="form-control" placeholder="Description" name="description" value="<?php echo $routineData ? $routineData['description'] : ''?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Routine
                                    Type</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                class="fa fa-gear"></i></span>
                                            <select required class="form-control" name="routine_type">
                                                <option >Select</option>
                                                <option value="Post Call" <?php echo $routineData && $routineData['routine_type'] == 'Post Call' ? 'selected' : ''?>>Post Call</option>
                                                <option value="Campaign" <?php echo $routineData && $routineData['routine_type'] == 'Campaign' ? 'selected' : ''?>>Campaign</option>
                                              </select>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-lg-6 col-12">
            <!-- Basic Forms -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-calendar"></i> Date/Time</span>
                </div>
                <!-- /.box-header -->
                <div class="panel-body pn">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-play"></i></span>
                                                <input class="form-control" type="date" id="" name="start_date" value="<?php echo $routineData['start_date'] ? $routineData['start_date'] : date('Y-m-d')?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-stop"></i></span>
                                            <input class="form-control" type="date" id="" name="end_date" value="<?php echo $routineData['end_date'] ? $routineData['end_date'] : date('Y-m-d')?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Start Time</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-play"></i>
                                        </span>
                                        <input class="form-control" type="time" id="" name="start_time" value="<?php echo $routineData['start_time'] ? $routineData['start_time'] : ''?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">End Time</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-stop"></i>
                                        </span>
                                        <input class="form-control" type="time" id="" name="end_time" value="<?php echo $routineData['end_time'] ? $routineData['end_time'] : ''?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Inc Weekends</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-gear"></i>
                                        </span>
                                        <select class="form-control" name="weekends">
                                            <option value="0" <?php echo $routineData && $routineData['weekends']==0 ? 'selected': ''?>>No</option>
                                            <option value="1" <?php echo $routineData && $routineData['weekends']==1 ? 'selected' : ''?>>Yes</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-12">
            <!-- Basic Forms -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-envelope"></i> Client Email Prefrences</span>
                </div>
                <!-- /.box-header -->
                <div class="panel-body pn">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Email To Client</label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-sm btn-toggle btn-success rule_send_to_client <?php echo $routineData && $routineData['rule_send_to_client']=='off' ? '' : 'active'?>"
                                        data-toggle="button" aria-pressed="<?php echo $routineData && $routineData['rule_send_to_client']=='on'?>" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                    <input type="hidden" name="rule_send_to_client" value="<?php echo $routineData ? $routineData['rule_send_to_client'] : 'on'?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Subject</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="" name="client_rule_subject" value="<?php echo $routineData['client_rule_subject'] ? $routineData['client_rule_subject'] : ''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Sender</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="" name="sentFrom" value="<?php echo $routineData['sentFrom'] ? $routineData['sentFrom'] : ''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-sm-2 col-form-label">Template</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                                <?php $templates = $DBEmail->select('templates',['id','name','active']); ?>
                                        <select class="form-control" name="template" required="">
                                                    <option value="">Select</option>
                                                    <?php foreach($templates as $template): ?>
                                                        <option value="<?php echo $template['id']?>" <?php echo $routineData && $routineData['template']==$template['id'] ? 'selected' : ''?>><?php echo $template['name']?></option>
                                                    <?php endforeach;?>
                                              </select>
                                          </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-lg-6 col-12">
            <!-- Basic Forms -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-envelope"></i> Data Selection Prefrences</span>
                </div>
                <!-- /.box-header -->
                <div class="panel-body pn">
                    <div class="row">
                        <div class="col-12">
<!--                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Email To
                                    Manager</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-sm btn-toggle btn-success rule_send_to_managers <?php echo $routineData && $routineData['rule_send_to_managers']=='off' ? '' : 'active'?>"
                                        data-toggle="button" aria-pressed="<?php echo $routineData && $routineData['rule_send_to_managers']=='on'?>" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                    <input type="hidden" name="rule_send_to_managers" value="<?php echo $routineData ? $routineData['rule_send_to_managers'] : 'on'?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email
                                    Address</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><input class="form-control" type="text"
                                            value="2011-08-19" id="example-date-input" name="rule_emails" value="<?php echo $routineData ? $routineData['rule_emails'] : ''?>"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email
                                    Sender</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><input class="form-control" type="text"
                                             id="example-time-input" name="customSentFrom" value="<?php echo $routineData ? $routineData['customSentFrom'] : ''?>"></div>
                                </div>
                            </div>
                            <h4 class="box-title">Data Selection Prefrences</h4>-->
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-sm-2 col-form-label">Statuses</label>
                                <div class="col-sm-10">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                class="fa fa-gear"></i></span>

                                                <?php $statues = $database->distinct()->select('vicidial_list', 'status');?>
                                                <select class="form-control select2" multiple name="statuses[]">
                                                    <option value="">Select</option>
                                                <?php foreach($statues as $st) : ?>
                                                    <option value="<?php echo $st;?>" <?php echo $routineData && in_array($st, unserialize($routineData['statuses'])) ? 'selected' : ''?>><?php echo $st;?></option>
                                                <?php endforeach;?>
                                                  </select>
                                              </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-sm-2 col-form-label">Lists</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                                <?php $lists = $database->select('vicidial_lists', ['list_id', 'list_name','active'],  ['active'=>'Y']);?>
                                                <select class="form-control select2" multiple name="lists[]">
                                                <option value="">Select</option>
                                                <?php foreach($lists as $list): ?>
                                                    <option value="<?php echo $list['list_id'];?>" <?php echo $routineData && in_array($list['list_id'], unserialize($routineData['lists'])) ? 'selected' : ''?>><?php echo $list['list_id'];?></option>
                                                <?php endforeach;?>
                                                  </select>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Inbound Groups</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                                <?php $lists = $database->select('vicidial_inbound_groups', ['group_id', 'group_name','active'],  ['active'=>'Y']);?>
                                                <select class="form-control select2" multiple name="inboundgroups[]">
                                                <option value="">Select</option>
                                                <?php foreach($lists as $list): ?>
                                                    <option value="<?php echo $list['group_id'];?>" <?php echo $routineData && in_array($list['group_id'], unserialize($routineData['inboundgroups'])) ? 'selected' : ''?>><?php echo $list['group_id'];?></option>
                                                <?php endforeach;?>
                                                  </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Age of lead (Days)</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="tex" class="form-control" placeholder="" name="age_lead" value="<?php echo $routineData ? $routineData['age_lead'] : ''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Count</label>
                                <div class="col-sm-5">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                                <select required class="form-control" name="email_count_type">
                                                    <option value=">" <?php echo $routineData && $routineData['email_count_type']=='>' ? 'selected' : ''?>>Greater than</option>
                                                    <option value="<" <?php echo $routineData && $routineData['email_count_type']=='<' ? 'selected' : ''?>>Less than</option>
                                                    <option value=">=" <?php echo $routineData && $routineData['email_count_type']=='>=' ? 'selected' : ''?>>Greater that equal to</option>
                                                    <option value="<=" <?php echo $routineData && $routineData['email_count_type']=='<=' ? 'selected' : ''?>>Less than equal to</option>
                                                    <option value="=" <?php echo $routineData && $routineData['email_count_type']=='=' ? 'selected' : ''?>>Equal to</option>
                                                    <option value="!=" <?php echo $routineData && $routineData['email_count_type']=='!=' ? 'selected' : ''?>>Not Equal to</option>
                                                 </select>
                                         </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                        <input required type="number" class="form-control" placeholder="" name="email_count" min="0" value="<?php echo $routineData ? $routineData['email_count'] : ''?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Call Count</label>
                                <div class="col-sm-5">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                        <select required class="form-control" name="call_count_type">
                                                    <option value=">" <?php echo $routineData && $routineData['call_count_type']=='>' ? 'selected' : ''?>>Greater than</option>
                                                    <option value="<" <?php echo $routineData && $routineData['call_count_type']=='<' ? 'selected' : ''?>>Less than</option>
                                                    <option value=">=" <?php echo $routineData && $routineData['call_count_type']=='>=' ? 'selected' : ''?>>Greater that equal to</option>
                                                    <option value="<=" <?php echo $routineData && $routineData['call_count_type']=='<=' ? 'selected' : ''?>>Less than equal to</option>
                                                    <option value="=" <?php echo $routineData && $routineData['call_count_type']=='=' ? 'selected' : ''?>>Equal to</option>
                                                    <option value="!=" <?php echo $routineData && $routineData['call_count_type']=='!=' ? 'selected' : ''?>>Not Equal to</option>
                                                 </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                        <input required type="number" class="form-control" placeholder="" name="call_count"  min="0" value="<?php echo $routineData ? $routineData['call_count'] : ''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Messages Per Minute</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="" name="messages_per_minute" value="<?php echo $routineData ? $routineData['messages_per_minute'] : ''?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-default">Test Data Selection</button> -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-lg-12 col-12" style="background:#ccc; padding:10px"><a href="<?php echo base_url('email/routines')?>" class="btn btn-default pull-left">Cancel</a> <button type="submit" class="btn btn-success pull-right">Save</button></div>
    </div>
</form>
</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script>
$("#template_form").validate({
 submitHandler: function(form) {

     $.post('<?php echo base_url('email/ajax')?>?action=SaveEmailRoutine', $(form).serialize(), function(response){
         $.toast({
             heading: 'Saved',
             text: 'SMS Routine has been successfully added!!',
             position: 'top-right',
             loaderBg: '#ff6849',
             icon: 'success',
             hideAfter: 3500,
             showHideTransition: 'plain',
         });
         $('#myModal').modal('hide');
         setTimeout(function(){
            window.location.href= '<?php echo base_url('email/routines')?>';
         },3500);
     });
   return false;
 }
});

$('.rule_send_to_client').on('click', function(){
    var elm = $('input[name="rule_send_to_client"]');
    if(elm.val()=='on') {
        elm.val('off');
    }
    else if(elm.val()=='off') {
        elm.val('on');
    }
});
$('.rule_send_to_managers').on('click', function(){
    var elm = $('input[name="rule_send_to_managers"]');
    if(elm.val()=='on') {
        elm.val('off');
    }
    else if(elm.val()=='off') {
        elm.val('on');
    }
});

</script>
<?php } ?>
