<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-cog"></i></a>Advance Settings</h3>   
    </div>
    <div class="box-body">

        <div class="form-group">
            <label>Drop Action</label>
            <select class="form-control manage-field-select" data-name="drop_action" id="drop_action" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  style="width: 100%;"> 
                <option value="AUDIO" <?php echo ($CampaignDetail['drop_action'] == 'AUDIO') ? 'selected' : ''; ?>>AUDIO</option>
                <option value="HANGUP" <?php echo ($CampaignDetail['drop_action'] == 'HANGUP') ? 'selected' : ''; ?>>HANGUP</option>
                <option value="IN_GROUP" <?php echo ($CampaignDetail['drop_action'] == 'IN_GROUP') ? 'selected' : ''; ?>>IN_GROUP</option>
                <option value="CALLMENU" <?php echo ($CampaignDetail['drop_action'] == 'CALLMENU') ? 'selected' : ''; ?>>CALLMENU</option>
                <option value="VOICEMAIL" <?php echo ($CampaignDetail['drop_action'] == 'VOICEMAIL') ? 'selected' : ''; ?>>IVR</option>
            </select> 
        </div>
        <div class="form-group DropAction div_AUDIO" style="display:<?php echo ($CampaignDetail['drop_action'] == 'AUDIO') ? 'block' : 'none'; ?>;"> 
            <label>Drop Audio:</label>
            <div class="row">
                <div class="col-lg-11 col-md-11" style="margin-right: 0px;padding-right: 0px;">
                    <select class="form-control" style="width: 100%;">
                        <option value="">Select option</option>
                        <?php
                                
                                
                                if ($handle = opendir('/srv/www/htdocs/cwgMolaHD6f0pKsgu8Q3rUke304OnFmC/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
?>
                                             <option value="<?php echo $entry;?>" <?php echo ($CampaignDetail['park_file_name'] == $entry) ? 'selected' : ''; ?>><?php echo $entry;?></option>
           
  <?php 
            }
    }

    closedir($handle);
}
?>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1" style="margin-left: 0px; padding-left: 7px; border: 1px solid #ccc;max-width:6.1%; text-align: center; background: #ddd;">
                    <a href="#" class="audio-upload" data-title="Upload new Music On hold file" data-name="hold_music" style="color: #55ad81;font-size:20px;"><i class="fa fa-cloud-upload"></i></a> 
                </div>
            </div>
        </div>

        <div class="form-group DropAction div_IN_GROUP" style="display:<?php echo ($CampaignDetail['drop_action'] == 'IN_GROUP') ? 'block' : 'none'; ?>;"> 
            <label>Drop Inbound Group:</label>
            <?php
            $XFERgroups = array();
            if ($CampaignDetail['drop_inbound_group'] != '') {
                $xfergrp = preg_replace("/ -$/", "", $CampaignDetail['drop_inbound_group']);
                $XFERgroups = explode(" ", $xfergrp);
            }
            $XFERgrops = $database->select('vicidial_inbound_groups',['group_id','group_name']);
            
            ?>
            <select class="form-control select2 manage-field" data-has="multi-select" id="drop_inbound_group" data-name="drop_inbound_group"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;" multiple>
                <?php foreach ($XFERgrops as $groups) { ?>
                    <option value="<?php echo $groups['group_id']; ?>" <?php echo in_array($groups['group_id'], $XFERgroups) ? 'selected' : ''; ?>><?php echo $groups['group_name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group DropAction div_VOICEMAIL" style="display:<?php echo ($CampaignDetail['drop_action'] == 'VOICEMAIL') ? 'block' : 'none'; ?>;"> 
            <label>Select IVR:</label>
            <div class="row">
                <div class="col-lg-11 col-md-11" style="margin-right: 0px;padding-right: 0px;">
                    <select class="form-control" style="width: 100%;">
                        <option value="">Select option</option>
                         <?php
                                
                                
                                if ($handle = opendir('/srv/www/htdocs/cwgMolaHD6f0pKsgu8Q3rUke304OnFmC/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
?>
                                             <option value="<?php echo $entry;?>" <?php echo ($CampaignDetail['park_file_name'] == $entry) ? 'selected' : ''; ?>><?php echo $entry;?></option>
           
  <?php 
            }
    }

    closedir($handle);
}
?>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1" style="margin-left: 0px; padding-left: 7px; border: 1px solid #ccc;max-width:6.1%; text-align: center; background: #ddd;">
                    <a href="#" class="audio-upload" data-title="Upload new Music On hold file" data-name="hold_music" style="color: #55ad81;font-size:20px;"><i class="fa fa-cloud-upload"></i></a> 
                </div>
            </div>
        </div>
    </div>

</div>

<script>
$(document).on('change','#drop_action',function(){
   var value = $(this).val();
   $('.DropAction').hide();
   $('.div_'+value).show();
});    
    
</script>