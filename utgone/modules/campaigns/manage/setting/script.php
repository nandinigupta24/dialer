<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-code"></i> Script Settings </span>
    </div>
    <div class="panel-body pn">
        <div class="form-group">
            <label>Script override</label>
            <select class="form-control select2 manage-field-select" data-name="campaign_script"  data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option value="" <?php echo ($CampaignDetail['campaign_script'] == '') ? 'selected' : ''; ?>>NONE</option>
                <option value="CALLNOTES" <?php echo ($CampaignDetail['campaign_script'] == 'CALLNOTES') ? 'selected' : ''; ?>>CALLNOTES - Call Notes and Appointment Setting</option>
            </select>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-sm btn-toggle <?php echo ($CampaignDetail['get_call_launch'] == 'SCRIPT') ? 'active' : ''; ?>  manage-field-switch" data-name="get_call_launch1" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="openonCall_connect_btn" data-input="get_call_launch" data-toggle="button" aria-pressed="true" autocomplete="off">
                <div class="handle"></div>
            </button>
            <label for="openonCall_connect">Open on Call Connect(<span class="text-success">Auto pop this script when call connect</span>)</label>
        </div>
    </div>
</div>
