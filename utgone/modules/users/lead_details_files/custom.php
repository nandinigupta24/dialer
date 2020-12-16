<div class="panel">
    <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-cogs"></i> Custom Lead Details</span>
        <ul class="nav panel-tabs">
            <li><a href="#"><i class="fa fa-question-circle text-purple2"></i></a></li>
        </ul>
    </div>
    <div class="panel-body" style="padding:30px;">
        <form method="post" id="FormCustom">
            <?php
            $CustomFields = $database->get('custom_fields', '*', ['list_id' => $LeadInformation['list_id']]);
            unset($CustomFields['list_id']);
            $CustomFielsData = $database->get('custom_fields_data', '*', ['AND'=>['list_id' => $LeadInformation['list_id'],'lead_id'=>$leadID]]);
            ?>
            <input type="hidden" name="lead_id" value="<?php echo $CustomFielsData['lead_id'];?>"/>
            <input type="hidden" name="list_id" value="<?php echo $CustomFielsData['list_id'];?>"/>
            <div class="col-md-6">
                <?php
                foreach ($CustomFields as $fieldName => $FieldValue) {
                    if (!empty($CustomFielsData[$fieldName])) {
                        ?>
                        <div class="form-group">
                            <label for="AboutCust1a"><?php echo $FieldValue; ?></label>
                            <input id="custom_1" name="<?php echo $fieldName; ?>" type="text" class="form-control FormCustomInput" value="<?php echo $CustomFielsData[$fieldName]; ?>"/>
                        </div>
                    <?php }else{
                        if(!empty($FieldValue)){
                        ?>
                
                <div class="form-group">
                            <label for="AboutCust1a"><?php echo $FieldValue; ?></label>
                            <input id="custom_1" name="<?php echo $fieldName; ?>" type="text" class="form-control FormCustomInput" value=""/>
                        </div>
                
                <?php }  } }
                ?>         
            </div>
        </form>
    </div>

</div>

<script>
    $(document).on('focusout', '.FormCustomInput', function () {
        var formValue = $('#FormCustom').serialize();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('users/ajax')?></php>?rule=leadCustomUpdate',
            data: formValue, // serializes the form's elements.
            success: function (data)
            {
                var result = JSON.parse(data);
                if (result.success === 1) {
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                } else {
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            }
        });
    });
</script>
