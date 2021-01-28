<?php
if (!checkRole('admin_settings', 'edit')) {
    no_permission();
} else {

if(!empty($_POST) && $_POST){
    /* $data  = $DBUTG->update('agent_page_setting',$_POST);
    if(!empty($data->rowCount()) && $data->rowCount() > 0){
        $Success = 1;
    } */

    $agent_data_count = $DBUTG->count('agent_page_setting');

    if($agent_data_count) {
      $data = $DBUTG->update('agent_page_setting',$_POST);
    } else {
      $data = $DBUTG->insert('agent_page_setting',$_POST);
    }
}

$agent_data = $DBUTG->get('agent_page_setting',['comment_on_call_recording','agent_screen']);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-file"></span>Agent Screen Settings</div>

                    </div>
                    <div class="panel-body pn">

                        <form method="POST" accept-charset="UTF-8" autocomplete="off">

                            <div class="pad">
                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Comment to the Call Recording</label>
                                    <div class="col-sm-4">
                                      <button type="button" class="btn btn-sm btn-toggle manage-agent <?php echo ($agent_data['comment_on_call_recording'] == 'Y') ? 'active' : ''; ?>" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="comment_on_call_recording">
                                          <div class="handle"></div>
                                      </button>
                                      <input type="hidden" name="comment_on_call_recording" value="<?php echo $agent_data['comment_on_call_recording'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="extension_number" class="col-sm-2 col-form-label">Agent screen design</label>
                                    <div class="col-sm-4">
                                      <select class="form-control manage-agent-select" name="agent_screen" id="agent_screen">
                                          <option value="">-- Select screen --</option>
                                          <option value="screen1" <?php echo ($agent_data['agent_screen'] == 'screen1') ? 'selected="selected"' : '';?>>Screen 1 (Default)</option>
                                          <option value="screen2" <?php echo ($agent_data['agent_screen'] == 'screen2') ? 'selected="selected"' : '';?>>Screen 2</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <button  class="btn btn-default btn-sm" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-success btn-app pull-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>

    </section>
    <!-- /.content -->

</div>

<script>

$(document).on('click','.manage-agent',function(){
   if($(this).hasClass('active')){
     var value = 'Y' ;
   }else{
     var value = 'N';
   }

   var FieldName = $(this).data('field');
   $(this).parent().find('input[name="'+FieldName+'"]').val(value);
});

</script>
<?php } ?>
