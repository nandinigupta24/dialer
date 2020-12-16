<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-code-fork"></i></a> Web Form Setting </h3>   
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="web_form_address">Web Selection:</label>
            <input type="text" class="form-control  manage-field-text" value="<?php echo $CampaignDetail['web_form_address']; ?>" data-name="web_form_address" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="web_form_address" placeholder=" Web form address">
        </div> 

        <div class="form-group">
            <label for="web_form_address_two">Second Web Selection:</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['web_form_address_two']; ?>" data-name="web_form_address_two" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  name="web_form_address_two" placeholder=" second Web form address">
        </div> 

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="open_window_btn">Open in new window:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch" data-name="web_form_target" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="web_form_target_btn" data-val="<?php echo $CampaignDetail['web_form_target']; ?>" data-y="Y" data-n="" data-input="web_form_target" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div> 
                    </button>
                    
                </div>
            </div>  
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-12" for="open_window_btn">Open on call connect:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch"  id="open_call_coonect_btn" data-name="get_call_launch" data-input="open_call_coonect"data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <input type="hidden" name="open_call_coonect" id="open_call_coonect" value="0">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="start_call_url">Start of Call URL Trigger: </label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['start_call_url']; ?>" data-name="start_call_url" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  name="start_call_url" placeholder="Start of Call URL Trigger"> 
        </div>

        <div class="form-group">
            <label for="dispo_call_url">End of Call URL Trigger :</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['dispo_call_url']; ?>" data-name="dispo_call_url" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  name="dispo_call_url" placeholder=" End of Call URL Trigger ">
        </div>

        <div class="form-group">
            <label for="xfer_call_url">Transfer Call URL :</label>
            <input type="text" class="form-control manage-field-text" value="<?php echo $CampaignDetail['na_call_url']; ?>" data-name="na_call_url" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="xfer_call_url" name="na_call_url" placeholder="Transfer Call URL">
        </div>

    </div>
</div> 