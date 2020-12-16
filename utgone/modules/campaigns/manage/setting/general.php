<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-info"></i> General information</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="CampaignName">Campaign Name:</label>
            <input type="text" class="form-control manage-field-text" data-name="campaign_name" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="CampaignName" name="CampaignName" placeholder="Enter Campaign Name" value="<?php echo $CampaignDetail['campaign_name']; ?>">
        </div>

        <div class="form-group">
            <label for="CampaignDesc">Campaign Description:</label>
            <input type="text" class="form-control manage-field-text" data-name="campaign_description" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="CampaignDesc" name="CampaignDesc" placeholder="Campaign Description" value="<?php echo $CampaignDetail['campaign_description']; ?>">
        </div>

        <div class="form-group">
            <label>Campaign Call times</label>
            <select class="form-control manage-field-select"  data-name="local_call_time" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="local_call_time" id="local_call_time">
                <option value="">Select Option</option>
                <option value="12pm-5pm" <?php echo ($CampaignDetail['local_call_time'] == '12pm-5pm') ? 'selected' : ''; ?>>12pm-5pm - default 12pm to 5pm calling</option>
                <option value="12pm-9pm" <?php echo ($CampaignDetail['local_call_time'] == '12pm-9pm') ? 'selected' : ''; ?>>12pm-9pm - default 12pm to 9pm calling</option>
                <option value="24hours" <?php echo ($CampaignDetail['local_call_time'] == '24hours') ? 'selected' : ''; ?>>24hours - default 24 hours calling</option>
                <option value="5pm-9pm" <?php echo ($CampaignDetail['local_call_time'] == '5pm-9pm') ? 'selected' : ''; ?>>5pm-9pm - default 5pm to 9pm calling</option>
                <option value="9am-5pm" <?php echo ($CampaignDetail['local_call_time'] == '9am-5pm') ? 'selected' : ''; ?>>9am-5pm - default 9am to 5pm calling</option>
                <option value="9am-9pm" <?php echo ($CampaignDetail['local_call_time'] == '9ampm-9pm') ? 'selected' : ''; ?>>9am-9pm - default 9am to 9pm calling</option>

            </select>
        </div>
<?php // if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                <div class="form-group">
                                    <label for="user_group" class="">Team</label>
                                        <select id="user_group" name="user_group" class="form-control manage-field-select" data-name="user_group" data-id="<?php echo $CampaignDetail['campaign_id']; ?>">
                                            <option value="">Select Team</option>
                                            <?php foreach($UserGroup as $group){?>
                                            <option value="<?php echo $group['user_group'];?>" <?php echo ($CampaignDetail['user_group'] == $group['user_group']) ? 'selected="selected"' : '';?>><?php echo $group['user_group'].' - '.$group['group_name'];?></option>
                                            <?php }?>
                                        </select>
                                </div>
                                <?php // }else{?>
                                <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>-->
                                <?php // }?>
        <div class="form-group">
            <div class="row">
                <label class="col-md-12"  for="campaign_active_btn">Active:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['active'] == 'Y') ? 'active' : ''; ?>" data-toggle="button" aria-pressed="false" autocomplete="off" value="Y" data-id="<?php echo $CampaignID; ?>" data-name="active">
                        <div class="handle"></div>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Minimum Hopper Level</label>
            <select class="form-control manage-field-select"  data-name="hopper_level" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="hopper_level" id="hopper_level">
                <option value="">Select Option</option>
                <option value="1" <?php echo ($CampaignDetail['hopper_level'] == '1') ? 'selected' : ''; ?>>1</option>
                <option value="5" <?php echo ($CampaignDetail['hopper_level'] == '5') ? 'selected' : ''; ?>>5</option>
                <option value="10" <?php echo ($CampaignDetail['hopper_level'] == '10') ? 'selected' : ''; ?>>10</option>
                <option value="20" <?php echo ($CampaignDetail['hopper_level'] == '20') ? 'selected' : ''; ?>>20</option>
                <option value="50" <?php echo ($CampaignDetail['hopper_level'] == '50') ? 'selected' : ''; ?>>50</option>
                <option value="100" <?php echo ($CampaignDetail['hopper_level'] == '100') ? 'selected' : ''; ?>>100</option>
                <option value="200" <?php echo ($CampaignDetail['hopper_level'] == '200') ? 'selected' : ''; ?>>200</option>
                <option value="500" <?php echo ($CampaignDetail['hopper_level'] == '500') ? 'selected' : ''; ?>>500</option>
                <option value="700" <?php echo ($CampaignDetail['hopper_level'] == '700') ? 'selected' : ''; ?>>700</option>
                <option value="1000" <?php echo ($CampaignDetail['hopper_level'] == '1000') ? 'selected' : ''; ?>>1000</option>
                <option value="2000" <?php echo ($CampaignDetail['hopper_level'] == '2000') ? 'selected' : ''; ?>>2000</option>
                <option value="3000" <?php echo ($CampaignDetail['hopper_level'] == '3000') ? 'selected' : ''; ?>>3000</option>
                <option value="4000" <?php echo ($CampaignDetail['hopper_level'] == '4000') ? 'selected' : ''; ?>>4000</option>
                <option value="5000" <?php echo ($CampaignDetail['hopper_level'] == '5000') ? 'selected' : ''; ?>>5000</option>
            </select>
        </div>
    </div>
</div>
