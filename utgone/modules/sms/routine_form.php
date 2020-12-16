<?php if(!checkRole('sms', 'create')){ no_permission(); } else {?>
<?php
$routineData = false;
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $routineData = $DBSMS->query('SELECT * FROM routines WHERE id = '.$_GET['id'].' limit 1')->fetch(PDO::FETCH_ASSOC);
}elseif(isset($_GET['copy']) && is_numeric($_GET['copy'])) {
    $routineData = $DBSMS->query('SELECT * FROM routines WHERE id = '.$_GET['copy'].' limit 1')->fetch(PDO::FETCH_ASSOC);
    unset($routineData['id']);
    $DBSMS->insert('routines', $routineData);
    $routineData['id'] = $DBSMS->id();
}
?>
<div class="content-wrapper">
    <section class="content">
 <form method="POST" action="#" accept-charset="UTF-8" id="template_form" autocomplete="off" novalidate="novalidate">
     <input type="hidden" name="id" value="<?php echo $routineData ? $routineData['id'] : ''?>">
          <div class="row">
            <div class="col-lg-7 col-12">
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
    						  <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
    						  <div class="col-sm-10">
    							<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input required type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $routineData ? $routineData['name'] : ''?>"></div>
    						  </div>
    						</div>
    						<div class="form-group row">
    						  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
    						 <div class="col-sm-10">
    							<div class="input-group"><span class="input-group-addon"><i class="fa fa-pencil"></i></span><input required type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $routineData ? $routineData['description'] : ''?>"></div>
    						  </div>
    						</div>
    						<div class="form-group row">
    						  <label for="example-text-input" class="col-sm-2 col-form-label">Routine Type</label>
    						  <div class="col-sm-10">
    							<div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                <select required class="form-control" name="routine_type">
                                    <option value="">Select</option>
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
                  <!-- Basic Forms -->
                    <div class="panel">
                      <div class="panel-heading">
                          <span class="panel-title"><i class="fa fa-calendar"></i> Date/Time</span>
                      </div>
                      <!-- /.box-header -->
                      <div class="panel-body pn">
                        <div class="row">
                          <div class="col-7">
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Start Date</label>
                                <div class="col-sm-8">
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-play"></i></span><input required class="form-control" type="date" value="<?php echo $routineData ? $routineData['start_date'] : date('Y-m-d')?>" id="example-date-input" name="start_date"></div>
                                </div>
                              </div>
                          </div>
                            <div class="col-5">
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Start Time</label>
                               <div class="col-sm-8">
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-play"></i></span><input required class="form-control" type="time" value="<?php echo $routineData ? $routineData['start_time'] : date('H:i:s')?>" id="example-time-input" name="start_time" value="<?php echo $routineData ? $routineData['start_time'] : ''?>"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-7">
                                
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">End Date</label>
                               <div class="col-sm-8">
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-stop"></i></span><input required class="form-control" type="date" value="<?php echo $routineData ? $routineData['end_date'] : date('Y-m-d')?>" id="example-date-input" name="end_date"></div>
                                </div>
                              </div>
                            </div>
                            
                                <div class="col-5">
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">End Time</label>
                               <div class="col-sm-8">
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-stop"></i></span><input required class="form-control" type="time" value="<?php echo $routineData ? $routineData['end_time'] : date('H:i:s')?>" id="example-time-input" name="end_time"></div>
                                </div>
                              </div>
                                
                                <?php /*
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Inc Weekends</label>
                                <div class="col-sm-10">
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span><select required class="form-control" name="weekends">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                      </select>
                                  </div>
                                </div>
                              </div>
                                */ ?>

                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.box -->
                    <!-- Basic Forms -->
                      <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-paper-plane"></i> Sending Preferences</span>
                        </div>
                        <!-- /.box-header -->
                        <div class="panel-body pn">
                          <div class="row">
                           
                                <?php /*
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Messages Per Minute</label>
                                  <div class="col-sm-10">
                                    <div class="input-group"><input required type="number" class="form-control" placeholder="" name="messages_per_minute"></div>
                                  </div>
                                </div>
                                 */ ?>
                                 <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Sender</label>
                                 <div class="col-sm-10">
                                    <div class="input-group"><input required type="text" class="form-control" placeholder="Sent From" name="sentFrom" value="<?php echo $routineData ? $routineData['sentFrom'] : ''?>"></div>
                                  </div>
                                </div>
                                 </div>
                                <div class="col-md-7">
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Template</label>
                                  <div class="col-sm-10">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                        <?php $templates = $DBSMS->select('templates',['id','name','description','message','active']); ?>
                                        <select required class="form-control" name="template">
                                            <option value="">select</option>
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
            <div class="col-lg-5 col-12">
                <!-- Basic Forms -->
                  <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"> <i class="fa fa-database"></i> Data Select Preferences</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body pn">
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Statuses</label>
                          <div class="col-sm-10">
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
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
                      <label for="example-text-input" class="col-sm-2 col-form-label">Lists</label>
                      <div class="col-sm-10">
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                            <?php $lists = $database->select('vicidial_lists', ['list_id', 'list_name','active'],  ['active'=>'Y']);
                            ?>
                            <select class="form-control select2" multiple name="lists[]">
                            <option value="0">Select</option>
                            <?php foreach($lists as $list): ?>
                                <option value="<?php echo $list['list_id'];?>" <?php echo $routineData && in_array($list['list_id'], unserialize($routineData['lists'])) ? 'selected' : ''?>><?php echo $list['list_id'];?></option>
                            <?php endforeach;?>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Time Field</label>
                  <div class="col-sm-10">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                        <select class="form-control" name="time_field">
                        <option>Select</option>
                            <option value="entry_date" <?php echo $routineData && $routineData['time_field']=='entry_date' ? 'selected' : ''?>>Entry Date</option>
                            <option value="modify_date" <?php echo $routineData && $routineData['time_field']=='modify_date' ? 'selected' : ''?>>Modify Date</option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Age of lead (Days)</label>
                  <div class="col-sm-10">
                    <div class="input-group"><input required type="number" class="form-control" placeholder="" name="age_lead" min="0" value="<?php echo $routineData ? $routineData['age_lead'] : ''?>"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Age of lead operator</label>
                  <div class="col-sm-10">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                     <select required class="form-control" name="age_lead_operator">
                        <option value=">" <?php echo $routineData && $routineData['age_lead_operator']=='>' ? 'selected' : ''?>>Greater than</option>
                        <option value="<" <?php echo $routineData && $routineData['age_lead_operator']=='<' ? 'selected' : ''?>>Less than</option>
                        <option value=">=" <?php echo $routineData && $routineData['age_lead_operator']=='>=' ? 'selected' : ''?>>Greater that equal to</option>
                        <option value="<=" <?php echo $routineData && $routineData['age_lead_operator']=='<=' ? 'selected' : ''?>>Less than equal to</option>
                        <option value="=" <?php echo $routineData && $routineData['age_lead_operator']=='=' ? 'selected' : ''?>>Equal to</option>
                        <option value="!=" <?php echo $routineData && $routineData['age_lead_operator']=='!=' ? 'selected' : ''?>>Not Equal to</option>
                      </select>
                  </div>
                  </div>
                </div>
                <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">SMS Count</label>
                          <div class="col-sm-5">
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                <select required class="form-control" name="sms_count_type">
                                    <option value=">" <?php echo $routineData && $routineData['sms_count_type']=='>' ? 'selected' : ''?>>Greater than</option>
                                    <option value="<" <?php echo $routineData && $routineData['sms_count_type']=='<' ? 'selected' : ''?>>Less than</option>
                                    <option value=">=" <?php echo $routineData && $routineData['sms_count_type']=='>=' ? 'selected' : ''?>>Greater that equal to</option>
                                    <option value="<=" <?php echo $routineData && $routineData['sms_count_type']=='<=' ? 'selected' : ''?>>Less than equal to</option>
                                    <option value="=" <?php echo $routineData && $routineData['sms_count_type']=='=' ? 'selected' : ''?>>Equal to</option>
                                    <option value="!=" <?php echo $routineData && $routineData['sms_count_type']=='!=' ? 'selected' : ''?>>Not Equal to</option>
                                 </select></div>
                          </div>
                          <div class="col-sm-5">
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                    <input required type="number" class="form-control" placeholder="" name="sms_count" min="0" value="<?php echo $routineData ? $routineData['sms_count'] : ''?>">
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
                                         </select></div>
                                  </div>
                                  <div class="col-sm-5">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-gear"></i></span>
                                            <input required type="number" class="form-control" placeholder="" name="call_count"  min="0" value="<?php echo $routineData ? $routineData['call_count'] : ''?>">
                                    </div>
                                  </div>
                                </div>
                            <div class="form-group row">
                                <label for="template_active_btn" class="col-sm-3 col-form-label">Active</label>
                                <div class="col-sm-9">
                                    <button type="button" id="template_active_btn" data-input="template_active" class="btn btn-sm btn-toggle btn-switch <?php echo $routineData && $routineData['active']=='Y' ? 'active' : ''?>" data-toggle="button" aria-pressed="<?php echo $routineData ? $routineData['active'] : 'N'?>" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                    <input type="hidden" name="active" id="template_active" value="<?php echo $routineData ? $routineData['active'] : 'N'?>">
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
    		<div class="col-lg-12 col-12" style="padding:10px">
                <a href="<?php echo base_url('sms/routines')?>" class="btn btn-default pull-left">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button></div>
    	  </div>

</section>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script>
    $(document).ready(function(){
       $('#template_active_btn').click(function(){
          if($(this).hasClass('active')){
              $('#template_active').val('N');
          }else{
              $('#template_active').val('Y');
          } 
       }); 
    });
    
$("#template_form").validate({
 submitHandler: function(form) {
//     var activevalue = $('#template_active_btn').attr('aria-pressed');
//     var activetemplate = (activevalue == true) ? 'Y' : 'N';
//     $('#template_active').val(activetemplate);
     $.post('<?php echo base_url('sms/ajax')?>?action=SaveSMSRoutine', $(form).serialize(), function(response){
        
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
            window.location.href= '<?php echo base_url('sms/routines')?>';
         },3500);
     });
   return false;
 }
});

</script>
<?php } ?>
