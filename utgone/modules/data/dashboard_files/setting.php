<div class="panel">
    <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-cogs"></i> General Information</span>
        <ul class="nav panel-tabs">
            <li><a href="#"><i class="fa fa-question-circle text-purple2"></i></a></li>
        </ul>
    </div>
    <div class="panel-body" style="padding:30px;">
        <form id="list_settings_form" name="" method="post" >
            <input type="hidden" name="list_id" value="<?php echo $ListID;?>" />
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="list_name">List Name</label>
                        <input id="list_name" name="list_name" type="text" class="form-control" value="<?php echo $ListInformation['list_name'];?>" />
                    </div>
                    <div class="form-group">
                        <label for="list_description">List Description</label>
                        <input id="list_description" name="list_description" type="text" class="form-control" value="<?php echo $ListInformation['list_description'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <input id="expiration_date" name="expiration_date" type="date" class="form-control" value="<?php echo $ListInformation['expiration_date'];?>" />
                    </div>
                    <div class="form-group">
                        <label for="campaign_cid_override">CID Override</label>
                        <input id="campaign_cid_override" name="campaign_cid_override" type="text" class="form-control" value="<?php echo $ListInformation['campaign_cid_override'];?>" />
                    </div>
                    <div class="form-group">
                        <label for="reset_time">Reset Times</label>
                        <input id="reset_time" name="reset_time" type="text" class="form-control" value="<?php echo $ListInformation['reset_time'];?>" />
                    </div>
                    <div class="form-group">
                        <label for="active">Active</label> <br/>
                        <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo ($ListInformation['active'] == 'Y') ? 'active' : '';?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <input type="hidden" name="active" value="<?php echo $ListInformation['active'];?>" />
                    </div>
                </div>
                
                <div class="col-md-5">

                    <div class="form-group">
                        <label for="campaign_id">Campaign</label>
                        <select id="campaign_id" name="campaign_id" class="form-control">
                            <option>NONE</option>
                            <?php foreach($CampaignListings as $campaign){?>
                            <option value="<?php echo $campaign['campaign_id'];?>" <?php echo ($ListInformation['campaign_id'] == $campaign['campaign_id']) ? 'selected="selected"' : '';?>><?php echo $campaign['campaign_id'].' -'.$campaign['campaign_name'];?></option>
                            <?php }?>
                        </select>
                    </div>
<!--                    <div class="form-group">
                        <label for="agent_script_override">Script Override</label>
                        <select id="agent_script_override" name="agent_script_override" class="form-control">
                            <option value="">NONE</option>
                            <?php foreach($CampaignListings as $campaign){?>
                            <option value="<?php echo $campaign['campaign_id'];?>"><?php echo $campaign['campaign_name'];?></option>
                            <?php }?>                          
                        </select>
                    </div>-->
                    <div class="form-group">
                        <label for="web_form_address">Webform Override</label>
                        <input id="web_form_address" name="web_form_address" type="text" class="form-control" value="<?php echo $ListInformation['web_form_address'];?>" placeholder="Webform URL"/>
                    </div>

                    <span id="ama_box">
                        <div class="form-group">
                            <label for="am_message_exten_override">Answering Machine Audio Override</label>
                            <div class="input-group">
                                <select id="am_message_exten_override" name="am_message_exten_override" onchange="update_list(this);" class="form-control">
                                    <option value=""></option>
                                <?php
                                
                                
                                if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
?>
                                             <option value="<?php echo $entry;?>" <?php echo ($ListInformation['am_message_exten_override'] == $entry) ? 'selected' : ''; ?>><?php echo $entry;?></option>
           
  <?php 
            }
    }

    closedir($handle);
}
?>    
                                </select>
                                <span class="input-group-addon">
                                    <a href="javascript:void(0);" class="audio-upload"  data-title="Upload a New Answeing Machine Audio File">
                                        <i class="fa fa-cloud-upload text-purple2"></i>
                                    </a> 
                                </span> 
                        </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <label for="last_reset_date" class="col-lg-12">Last Reset Time</label>

                        <input id="last_reset_date" name="last_reset_date" type="text" class="form-control" value="<?php echo $ListInformation['last_reset_date'];?>" placeholder="Last Reset Time" disabled="">

                    </div>
                    <div class="form-group">
                        <label for="reset_list">Reset List</label><br/>
                        <button type="button" class="btn btn-sm btn-toggle SwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <input type="hidden" name="reset_list" value="<?php echo $ListInformation['reset_list'];?>"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).on('click','.SwitchBTN',function(){
   if($(this).hasClass('active')){
       $(this).parent().find('input').val('Y');
   }else{
       $(this).parent().find('input').val('N');
   } 
});    
</script>