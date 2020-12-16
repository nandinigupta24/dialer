<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"> <i class="fa fa-cog"></i> Advance Settings</span>
    </div>
    <div class="panel-body pn">

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
<!--            <div class="row">
                <div class="col-lg-11 col-md-11" style="margin-right: 0px;padding-right: 0px;">
                    <select class="form-control manage-field-select" data-name="safe_harbor_audio" style="width: 100%;" data-id="<?php echo $CampaignDetail['campaign_id']; ?>">
                        <option value="">Select option</option>
                        <option value="buzz">BUZZ</option>
                        <?php
                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                            while (false !== ($entry = readdir($handle))) {

                                if ($entry != "." && $entry != "..") {
                                    ?>
                                    <option value="<?php echo $entry; ?>" <?php echo ($CampaignDetail['park_file_name'] == $entry) ? 'selected' : ''; ?>><?php echo $entry; ?></option>

                                    <?php
                                }
                            }

                            closedir($handle);
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1" style="margin-left: 0px; padding-left: 7px; border: 1px solid #ccc;max-width:6.1%; text-align: center; background: #ddd;">
                    <a href="#" class="audio-upload" data-title="Upload new Music On hold file" data-name="hold_music" style="color: #55ad81;font-size:20px;">
                        <i class="fa fa-cloud-upload" style="margin-top:5px;"></i>
                    </a>
                </div>
            </div>-->
<div class="input-group">
    <select class="form-control manage-field-select" data-name="safe_harbor_audio" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="safe_harbor_audio">
                        <option value="">Select option</option>
                        <option value="buzz">BUZZ</option>
                                                                         <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($CampaignDetail['park_file_name'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                            }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select>
                                                                    <span class="input-group-addon"><a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> </span> </div>
        </div>

        <div class="form-group DropAction div_IN_GROUP" style="display:<?php echo ($CampaignDetail['drop_action'] == 'IN_GROUP') ? 'block' : 'none'; ?>;">
            <label>Drop Inbound Group:</label>
            <?php
            $XFERgroups = array();
            if ($CampaignDetail['drop_inbound_group'] != '') {
                $xfergrp = preg_replace("/ -$/", "", $CampaignDetail['drop_inbound_group']);
                $XFERgroups = explode(" ", $xfergrp);
            }
            $XFERgrops = $database->select('vicidial_inbound_groups', ['group_id', 'group_name']);
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
                <div class="col-md-12" style="margin-right: 0px;padding-right: 0px;">
                    <?php
                    $VoicemailIVR = $database->query("SELECT voicemail_id,fullname,email,extension from phones where active='Y' ORDER BY voicemail_id ASC")->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <select class="form-control manage-field-select" style="width: 100%;" data-name="voicemail_ext" data-id="<?php echo $CampaignDetail['campaign_id']; ?>">
                        <option value="">Select option</option>
                        <?php foreach ($VoicemailIVR as $voicemail) { ?>
                            <option value="<?php echo $voicemail['voicemail_id']; ?>"><?php echo $voicemail['voicemail_id'] . ' - ' . $voicemail['fullname'] . ' - ' . $voicemail['email'] . ' - ' . $voicemail['extnesion']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).on('change', '#drop_action', function () {
        var value = $(this).val();
        $('.DropAction').hide();
        $('.div_' + value).show();
    });

</script>
