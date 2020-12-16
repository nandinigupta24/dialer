<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"> <i class="fa fa-arrow-up"></i>  Outbound Settings </span>
    </div>
    <div class="panel-body pn">
        <?php
        $XFERgroups = array();
        if ($CampaignDetail['xfer_groups'] != '') {
            $xfergrp = preg_replace("/ -$/", "", $CampaignDetail['xfer_groups']);
            $XFERgroups = explode(" ", $xfergrp);
        }

         if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $InboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['active'=>'Y']);
        }else{
            $InboundGroups = $database->select('vicidial_inbound_groups',['group_id','group_name'],['AND'=>['active'=>'Y','user_group'=>$_SESSION['CurrentLogin']['user_group']]]);
        }
        ?>
        <div class="form-group">
            <label>Allowed Transfer Group</label>
<!--            <select class="form-control select2 manage-field-select" data-has="multi-select" id="xfer_groups" data-name="xfer_groups"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;" multiple>
                <?php foreach ($InboundGroups as $groups) { ?>
                    <option value="<?php echo $groups['group_id']; ?>"  <?php echo in_array($groups['group_id'], $XFERgroups) ? 'selected' : ''; ?>><?php echo $groups['group_name']; ?></option>
                <?php } ?>
            </select>
            -->
            <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#InboundRight-Modal-IG" style="margin-bottom:5px;" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i>
              </button>

            <div class="" id="Transfer-Group-Listing">
                 <?php foreach ($InboundGroups as $groups) { ?>
                    <?php if(in_array($groups['group_id'], $XFERgroups)){?>
                <span class="badge badge-lg badge-primary TransferGroupListings" style="margin:5px;" data-text="<?php echo $groups['group_id'].' - '.$groups['group_name']; ?>"><?php echo $groups['group_id'].' - '.$groups['group_name']; ?></span>
                    <?php }?>
                <?php } ?>
            </div>
        </div>


        <div class="form-group">
            <label>Campaign CLI Mode</label>
            <select  class="form-control manage-field-select"  data-name="use_custom_cid" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option value="Y" <?php echo ($CampaignDetail['use_custom_cid'] == 'Y') ? 'selected' : ''; ?>>Security Phrase</option>
                <option value="N" <?php echo ($CampaignDetail['use_custom_cid'] == 'N') ? 'selected' : ''; ?>>Outbound CLI Field</option>
                <option value="AUTO" <?php echo ($CampaignDetail['use_custom_cid'] == 'AUTO') ? 'selected' : ''; ?>>Auto Set</option>
                <option value="LIST" <?php echo ($CampaignDetail['use_custom_cid'] == 'LIST') ? 'selected' : ''; ?>>Auto Set By List</option>
                <option value="USER_CUSTOM_1" <?php echo ($CampaignDetail['use_custom_cid'] == 'USER_CUSTOM_1') ? 'selected' : ''; ?>>Set By Agent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dial_prefix">Outbound CLI</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['campaign_cid']; ?>" id="campaign_cid"  data-name="campaign_cid" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Outbound CLI">
        </div>

        <div class="form-group">
            <label for="dial_prefix">Dial Prefix:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['dial_prefix']; ?>" id="dial_prefix"  data-name="dial_prefix" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Dial Prefix">
        </div>
        <div class="form-group">
            <label for="dial_prefix">Manual Dial Prefix:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['manual_dial_prefix']; ?>" id="manual_dial_prefix"  data-name="manual_dial_prefix" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Manual Dial Prefix">
        </div>

        <div class="form-group">
            <label for="manual_dial_list_id">Maunual Dial List:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['manual_dial_list_id']; ?>" id="manual_dial_list_id" data-name="manual_dial_list_id" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="Maunual Dial List">
        </div>

        <div class="form-group">
            <label for="manual_dial_list_id">Omit Phone Code:</label>
            <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['omit_phone_code'] == 'Y') ? 'active' : ''; ?>" data-name="omit_phone_code"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  data-val="<?php echo $CampaignDetail['omit_phone_code']; ?>" data-y="Y" data-n="N"  id="omit_phone_code_btn" data-input="omit_phone_code" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>

                </div>
        </div>


    </div>
</div>
