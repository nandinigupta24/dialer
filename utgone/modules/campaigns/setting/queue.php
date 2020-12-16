<div class="box ">
    <div class="box-header with-border ">
        <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-list-ol"></i></a> Queue Staregy</h3>   
    </div>

    <div class="box-body">      
        <div class="form-group">
            <label for="hopper_level">Minimum Leads To Queue:</label>
            <div class="row">
                <div class="col-md-11">
                    <div class="slidecontainer ">  
                        <input type="range" min="0" max="2000" step="1"  value="<?php echo $CampaignDetail['hopper_level']; ?>" class="range-slider rangeSlide manage-field-select" data-name="hopper_level" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="hopper_level" name="hopper_level" > 
                    </div>  
                </div>
                <div class="col-md-1"> <span id="span-hopper_level"><?php echo $CampaignDetail['hopper_level']; ?></span></div> 
            </div>
        </div>


        <div class="form-group">
            <label>Queue Order:</label>
            <select class="form-control manage-field-select" data-name="lead_order" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" style="width: 100%;">
                <option <?php echo ($CampaignDetail['lead_order'] == 'UP COUNT') ? 'selected' : ''; ?>>UP COUNT</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'DOWN COUNT') ? 'selected' : ''; ?>> DOWN COUNT</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'UP DOB') ? 'selected' : ''; ?>>UP DOB</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'DOWN DOB') ? 'selected' : ''; ?>> DOWN DOB</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'RANDOM') ? 'selected' : ''; ?>>RANDOM</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'UP SECURITY PHRASE') ? 'selected' : ''; ?>>UP SECURITY PHRASE</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'DOWN SECURITY PHRASE') ? 'selected' : ''; ?>>DOWN SECURITY PHRASE</option>
                <option <?php echo ($CampaignDetail['lead_order'] == 'DOWN LAST CALL TIME') ? 'selected' : ''; ?>> DOWN LAST CALL TIME</option>  
            </select>  
        </div>

        <div class="form-group">
            <label for="call_count_limit">Call Count Limit (<span class="text-success">Set 0 for no limit</span>):</label>
            <input type="email" class="form-control manage-field-text" data-name="call_count_limit" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  name="call_count_limit" value="<?php echo $CampaignDetail['call_count_limit']; ?>" placeholder="Enter Call Count Limit">
        </div>

        <div class="form-group">
            <div class="row"> 
                <label class="col-md-12" for="use_auto_hopper_btn">Auto Queue Level:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['use_auto_hopper'] == 'Y') ? 'active' : ''; ?>"  data-name="use_auto_hopper" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['use_auto_hopper']; ?>" data-y="Y" data-n="N" data-toggle="button" aria-pressed="true" autocomplete="off">
                     <div class="handle"></div>
                    </button> 
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row" >
                <label class="col-md-12" for="auto_trim_hopper_btn">Auto Trim Queue Leads:</label>  
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch <?php echo ($CampaignDetail['auto_trim_hopper'] == 'Y') ? 'active' : ''; ?>"  id="auto_trim_hopper_btn" data-input="auto_trim_hopper" data-toggle="button" data-val="<?php echo $CampaignDetail['auto_trim_hopper']; ?>" data-y="Y" data-n="N" aria-pressed="true" autocomplete="off" data-name="auto_trim_hopper" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" name="auto_trim_hopper">
                        <div class="handle"></div>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div> 