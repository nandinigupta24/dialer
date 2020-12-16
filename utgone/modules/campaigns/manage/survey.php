<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-info"></i> Survey information</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="CampaignName">Survey First Audio File</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_first_audio_file"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_first_audio_file"
                   name="survey_first_audio_file"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_first_audio_file']; ?>"/>
        </div>

        <div class="form-group">
            <label for="CampaignDesc">Survey DTMF Digits</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_dtmf_digits"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_dtmf_digits"
                   name="survey_dtmf_digits"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_dtmf_digits']; ?>"/>
        </div>

        <div class="form-group">
            <label for="CampaignDesc">Survey Not Interested Digit</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_ni_digit"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_ni_digit"
                   name="survey_ni_digit"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_ni_digit']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Wait Seconds</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_wait_sec"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_wait_sec"
                   name="survey_wait_sec"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_wait_sec']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Opt-in Audio File</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_opt_in_audio_file"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_opt_in_audio_file"
                   name="survey_opt_in_audio_file"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_opt_in_audio_file']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Not Interested Audio File</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_ni_audio_file"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_ni_audio_file"
                   name="survey_ni_audio_file"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_ni_audio_file']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Method</label>
            <select class="form-control manage-field-text2" data-name="survey_method"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="survey_method"
                    name="survey_method">
                <option value="AGENT_XFER" <?php echo ($CampaignDetail['survey_method'] == 'AGENT_XFER') ? 'SELECTED="SELECTED"' : ''; ?>>AGENT_XFER</option>
                <option value="VOICEMAIL" <?php echo ($CampaignDetail['survey_method'] == 'VOICEMAIL') ? 'SELECTED="SELECTED"' : ''; ?>>VOICEMAIL</option>
                <option value="VMAIL_NO_INST" <?php echo ($CampaignDetail['survey_method'] == 'VMAIL_NO_INST') ? 'SELECTED="SELECTED"' : ''; ?>>VMAIL_NO_INST</option>
                <option value="EXTENSION" <?php echo ($CampaignDetail['survey_method'] == 'EXTENSION') ? 'SELECTED="SELECTED"' : ''; ?>>EXTENSION</option>
                <option value="HANGUP" <?php echo ($CampaignDetail['survey_method'] == 'HANGUP') ? 'SELECTED="SELECTED"' : ''; ?>>HANGUP</option>
                <option value="CAMPREC_60_WAV" <?php echo ($CampaignDetail['survey_method'] == 'CAMPREC_60_WAV') ? 'SELECTED="SELECTED"' : ''; ?>>CAMPREC_60_WAV</option>
                <option value="CALLMENU" <?php echo ($CampaignDetail['survey_method'] == 'CALLMENU') ? 'SELECTED="SELECTED"' : ''; ?>>CALLMENU</option>
            </select>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey No-Response Action</label>
            <select class="form-control manage-field-text2" data-name="survey_no_response_action"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="survey_no_response_action"
                    name="survey_no_response_action">
                <option value="OPTIN" <?php echo ($CampaignDetail['survey_no_response_action'] == 'OPTIN') ? 'SELECTED="SELECTED"' : ''; ?>>OPTIN</option>
                <option value="OPTOUT" <?php echo ($CampaignDetail['survey_no_response_action'] == 'OPTOUT') ? 'SELECTED="SELECTED"' : ''; ?>>OPTOUT</option>
                <option value="DROP" <?php echo ($CampaignDetail['survey_no_response_action'] == 'DROP') ? 'SELECTED="SELECTED"' : ''; ?>>DROP</option>
            </select>
        </div>

        <?php $AllStatus1 = $database->select('vicidial_statuses', '*', ['ORDER' => ['status']]); ?>
        <?php $AllStatus13 = $database->select('vicidial_campaign_statuses', '*', ['campaign_id' => $CampaignDetail['campaign_id']]); ?>
        <div class="form-group">
            <label for="CampaignDesc">Survey Not Interested Status</label>
            <select class="form-control manage-field-text2" data-name="survey_ni_status"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="survey_ni_status"
                    name="survey_ni_status" >
                        <?php foreach ($AllStatus1 as $statusCampaign) { ?>
                    <option value="<?php echo $statusCampaign['status']; ?>" <?php echo ($CampaignDetail['survey_ni_status'] == $statusCampaign['status']) ? 'SELECTED="SELCTED"' : '' ?>><?php echo $statusCampaign['status_name']; ?></option>
                <?php } ?>
                        <?php foreach ($AllStatus13 as $statusCampaign) { ?>
                    <option value="<?php echo $statusCampaign['status']; ?>" <?php echo ($CampaignDetail['survey_ni_status'] == $statusCampaign['status']) ? 'SELECTED="SELCTED"' : '' ?>><?php echo $statusCampaign['status_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <!--Third Digit-->
        <div class="form-group">
            <label for="CampaignDesc">Survey Third Digit</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_third_digit"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_third_digit"
                   name="survey_third_digit"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_third_digit']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Third Audio File</label>

            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_third_audio_file"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_third_audio_file"
                   name="survey_third_audio_file"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_third_audio_file']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Third Status</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_third_status"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_third_status"
                   name="survey_third_status"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_third_status']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Third Extension</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_third_exten"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_third_exten"
                   name="survey_third_exten"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_third_exten']; ?>"/>
        </div>

        <!--Fourth Digit-->
        <div class="form-group">
            <label for="CampaignDesc">Survey Fourth Digit</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_third_digit"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_third_digit"
                   name="survey_third_digit"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_third_digit']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Fourth Audio File</label>

            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_fourth_audio_file"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_fourth_audio_file"
                   name="survey_fourth_audio_file"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_fourth_audio_file']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Fourth Status</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_fourth_status"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_fourth_status"
                   name="survey_fourth_status"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_fourth_status']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Fourth Extension</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_fourth_exten"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_fourth_exten"
                   name="survey_fourth_exten"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_fourth_exten']; ?>"/>
        </div>

        <div class="form-group">
            <label for="CampaignDesc">Survey Response Digit Map</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_response_digit_map"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_response_digit_map"
                   name="survey_response_digit_map"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_response_digit_map']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Xfer Extension</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_xfer_exten"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_xfer_exten"
                   name="survey_xfer_exten"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_xfer_exten']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Survey Campaign Recording Directory</label>
            <input type="text" class="form-control manage-field-text1"
                   data-name="survey_camp_record_dir"
                   data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                   id="survey_camp_record_dir"
                   name="survey_camp_record_dir"
                   placeholder=""
                   value="<?php echo $CampaignDetail['survey_camp_record_dir']; ?>"/>
        </div>
        <div class="form-group">
            <label for="CampaignDesc">Voicemail</label>

            <?php
            $data1 = $database->select('vicidial_voicemail', '*', ['active' => 'Y']);
            $data2 = $database->select('phones', '*', ['active' => 'Y']);
            ?>
            <select class="form-control manage-field-text2" data-name="voicemail_ext"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="voicemail_ext"
                    name="voicemail_ext" >
                        <?php foreach ($data1 as $value) { ?>
                    <option value="<?php echo $value['voicemail_id']; ?>" <?php echo ($CampaignDetail['voicemail_ext'] == $value['voicemail_id']) ? 'selected="selected"' : 'selected' ?>><?php echo $value['voicemail_id'] . ' - ' . $value['fullname'] . ' - ' . $value['email']; ?></option>
                <?php } ?>
                <?php foreach ($data2 as $value) { ?>
                    <option value="<?php echo $value['voicemail_id']; ?>" <?php echo ($CampaignDetail['voicemail_ext'] == $value['voicemail_id']) ? 'selected="selected"' : 'selected' ?>><?php echo $value['voicemail_id'] . ' - ' . $value['fullname'] . ' - ' . $value['email']; ?></option>
                <?php } ?>
            </select>

        </div>
        <?php $data12 = $database->select('vicidial_call_menu', '*'); ?>
        <div class="form-group">
            <label for="CampaignDesc">Survey Call Menu</label>
            <select class="form-control manage-field-text2" data-name="survey_menu_id"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="survey_menu_id"
                    name="survey_menu_id" >
                        <?php foreach ($data12 as $value) { ?>
                    <option value="<?php echo $value['menu_id']; ?>" <?php echo ($CampaignDetail['survey_menu_id'] == $value['menu_id']) ? 'selected="selected"' : 'selected' ?> ><?php echo $value['menu_id'] . ' - ' . $value['menu_name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="CampaignDesc">Survey Recording:</label>
            <select class="form-control manage-field-text2" data-name="survey_recording"
                    data-id="<?php echo $CampaignDetail['campaign_id']; ?>"
                    id="survey_recording"
                    name="survey_recording" >
                <option value="Y" <?php echo ($CampaignDetail['survey_recording'] == 'Y') ? 'selected="selected"' : ''; ?>>Y</option>
                <option value="N" <?php echo ($CampaignDetail['survey_recording'] == 'N') ? 'selected="selected"' : ''; ?>>N</option>
                <option value="Y_WITH_AMD" <?php echo ($CampaignDetail['survey_recording'] == 'Y_WITH_AMD') ? 'selected="selected"' : ''; ?>>Y_WITH_AMD</option>
            </select>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.manage-field-text2').change(function () {
            var ColumnName = $(this).data('name');
            var ColumnID = $(this).data('id');
            var ColumnValue = $(this).val();

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax?action=SurveyUpdate') ?>',
                data: {ColumnID: ColumnID, ColumnName: ColumnName, ColumnValue: ColumnValue},
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Campaign Survey Setting',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            showHideTransition: 'plain',
                        });
                    } else {
                        $.toast({
                            heading: 'Campaign Survey Setting',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 2000,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        });

        $('.manage-field-text1').focusout(function () {
            var ColumnName = $(this).data('name');
            var ColumnID = $(this).data('id');
            var ColumnValue = $(this).val();

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax?action=SurveyUpdate') ?>',
                data: {ColumnID: ColumnID, ColumnName: ColumnName, ColumnValue: ColumnValue},
                success: function (data) {
                  console.log(data);
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Campaign Survey Setting',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            showHideTransition: 'plain',
                        });
                    } else {
                        $.toast({
                            heading: 'Campaign Survey Setting',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 2000,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        });
    });

</script>
