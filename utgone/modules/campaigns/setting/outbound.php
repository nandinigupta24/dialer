<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-arrow-up"></i></a> Outbound Settings</h3>
    </div>
    <div class="box-body">
        <?php
        $XFERgroups = array();
        if ($CampaignDetail['xfer_groups'] != '') {
            $xfergrp = preg_replace("/ -$/", "", $CampaignDetail['xfer_groups']);
            $XFERgroups = explode(" ", $xfergrp);
        }
        $InboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['active'=>'Y']);

        ?>
        <div class="form-group">
            <label>Allowed Transfer Group</label>
            <select class="form-control select2 manage-field-select" data-has="multi-select" id="xfer_groups" data-name="xfer_groups"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;" multiple>
                <?php foreach ($InboundGroups as $groups) { ?>
                    <option value="<?php echo $groups['group_id']; ?>"  <?php echo in_array($groups['group_id'], $XFERgroups) ? 'selected' : ''; ?>><?php echo $groups['group_name']; ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <label>Campaign CLI Mode</label>
            <select  class="form-control manage-field-select"  data-name="use_custom_cid" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option value="Y" <?php echo ($CampaignDetail['use_custom_cid'] == 'Y') ? 'selected' : ''; ?>>Security Phrase</option>
                <option value="N" <?php echo ($CampaignDetail['use_custom_cid'] == 'N') ? 'selected' : ''; ?>>Outbound CLI Field</option>
                <option value="AUTO" <?php echo ($CampaignDetail['use_custom_cid'] == 'AUTO') ? 'selected' : ''; ?>>Auto Set</option>
                <option value="LIST" <?php echo ($CampaignDetail['use_custom_cid'] == 'LIST') ? 'selected' : ''; ?>>Auto Set By List</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dial_prefix">Dial Prefix:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['dial_prefix']; ?>" id="dial_prefix"  data-name="dial_prefix" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Dial Prefix">
        </div>

        <div class="form-group">
            <label for="manual_dial_list_id">Maunual Dial List:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['manual_dial_list_id']; ?>" id="manual_dial_list_id" data-name="manual_dial_list_id" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Maunual Dial List">
        </div>
    </div>
</div>
