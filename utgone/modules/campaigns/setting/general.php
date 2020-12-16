<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-info"></i></a> | General information</h3>   
    </div>
    <div class="box-body">
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
    </div>
</div>   