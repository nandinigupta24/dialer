<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-exchange"></i> Transfer Settings</span>
        <!--<h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-exchange"></i></a> Transfer Settings</h3>-->
            <ul class="nav nav-tabs justify-content-end pull-right">
                <li class="nav-item">
                    <a class="" href="javascript:void(0);" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" id="addPreSetsBtn" style="padding:10px;">
                        <i class="fa fa-plus text-success"></i></a>
                </li>
            </ul>
    </div>
    <div class="panel-body pn">

        <div class="form-group">
            <div class="row">
                <label  class="col-md-12" for="enable_xfer_presets_btn">Enable Transfer Presets:</label>
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-toggle manage-field-switch  <?php echo ($CampaignDetail['enable_xfer_presets'] == 'ENABLED') ? 'active' : ''; ?>" data-name="enable_xfer_presets" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" data-val="<?php echo $CampaignDetail['enable_xfer_presets']; ?>" data-y="ENABLED" data-n="DISABLED"  id="enable_xfer_presets_btn" data-input="enable_xfer_presets" data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                    <!--<input type="hidden" class="manage-field" data-name="enable_xfer_presets" data-id="<?php #echo $CampaignDetail['campaign_id']; ?>" id="enable_xfer_presets"  value="<?php #echo $CampaignDetail['enable_xfer_presets']; ?>">-->
                </div>
            </div>
        </div>

        <!-- box inner transfer setting-->
        <div class="panel pn">
            <div class="panel-heading">
                <span class="panel-title"> <i class="fa fa-exchange"></i> Transfer Presets</span>
            </div>

            <div class="panel-body pn">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Hide Preset Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="presetsBody">
                                        <?php
                                        $xfer_presets =  $database->select('vicidial_xfer_presets','*',['campaign_id'=>$CampaignID]);
                                        $p = 0;
                                        if (sizeof($xfer_presets) > 0) {
                                            foreach ($xfer_presets as $preset) {
                                                ?>


                                                <tr id="tr-<?php echo $p; ?>" class="xfer-presets xfer-<?php echo $CampaignDetail['campaign_id']; ?>">
                                                    <td>
                                                        <div class="form-group" style="margin-bottom:0px;">
                                                            <input type="text" class="form-control xfer-field xfer-name"  data-index="<?php echo $p; ?>" id="xfer-name-<?php echo $p; ?>" data-id="<?php echo $preset['preset_number']; ?>" value="<?php echo $preset['preset_name']; ?>" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group" style="margin-bottom:0px;">
                                                            <input type="text" class="form-control xfer-field xfer-number" data-index="<?php echo $p; ?>" id="xfer-number-<?php echo $p; ?>" data-id="<?php echo $preset['preset_number']; ?>" value="<?php echo $preset['preset_number']; ?>" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" placeholder="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-toggle xfer-switch <?php echo ($preset['preset_hide_number'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $preset['preset_number']; ?>" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" data-index="<?php echo $p;?>"  id="preset_hide_number-<?php echo $p ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-app btn-xs btn-success xfer-save" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $preset['preset_number']; ?>"   id="xfer-delete-<?php echo $p; ?>"><i class="fa fa-check"></i></button>
                                                        <button type="button" class="btn btn-app btn-xs btn-danger xfer-delete" data-campaign="<?php echo $CampaignDetail['campaign_id']; ?>" data-id="<?php echo $preset['preset_number']; ?>"   id="xfer-delete-<?php echo $p; ?>"><i class="fa fa-times"></i></button>
                                                    </td>

                                                </tr>
                                                <?php $p++; ?>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- col md 12 -->

                    </div><!-- Row main --Transfer Presists -->
                </div><!-- pad --Transfer Presists -->
            </div><!-- innner box body  Transfer Presists-->
        </div><!-- box --Transfer Presists-->
        <!-- box inner transfer setting-->
    </div>
</div>

<script>
    $(document).on('click', '#addPreSetsBtn', function (e) {
       e.preventDefault();
         var campaignId = $(this).attr('data-campaign');
         var clone ='<tr id="tr-1" class="xfer-presets xfer-'+campaignId+'">'
				    +'<td>'
		              +'<div class="form-group" style="margin-bottom:0px;">'
		                +'<input type="text" class="form-control xfer-field xfer-name" data-campaign="'+campaignId+'" placeholder="Enter Name" >'
		              +'</div>'
		            +'</td>'
					+'<td>'
		               +'<div class="form-group" style="margin-bottom:0px;">'
		                +'<input type="text" class="form-control xfer-field xfer-number " data-campaign="'+campaignId+'" placeholder="Enter Number">'
		             +' </div>'
		            +'</td>'
				    +'<td>'
		              +'<button type="button" class="btn btn-sm btn-toggle xfer-switch"  data-campaign="'+campaignId+'" data-toggle="button" aria-pressed="true" autocomplete="off">'
						+'<div class="handle"></div>'
					  +' </button>'
					 +'</td>'
                    +' <td> '
                      +'<button type="button" class="btn btn-app btn-xs btn-success xfer-add"   data-campaign="'+campaignId+'"><i class="fa fa-check"></i></button>'
                      +'<button type="button" class="btn btn-app btn-xs btn-danger xfer-delete"   data-campaign="'+campaignId+'"><i class="fa fa-times"></i></button>'
                    +' </td>'
				 +'</tr>';

        $('#presetsBody').append(clone);
//        preserReset();
    });


    $(document).on('click', '.xfer-add', function (e) {
         var ParentSection = $(this).parent().parent();
         var name = ParentSection.find('.xfer-name').val();
         var number = ParentSection.find('.xfer-number').val();
         var campaign = $(this).attr('data-campaign');
         if(ParentSection.find('.xfer-switch').hasClass('active')){
         ActiveValue = 'Y';
         }else{
         ActiveValue = 'N';
         }
         if(name && number){
         	var xferData = {campaign:campaign,name:name,number:number,active:ActiveValue};
         	$.ajax({
                type: "POST",
                url: 'ajax/campaign.php?case=TransferPresets',
                data: xferData, // serializes the form's elements.
                success: function (data){
//                    alert(data);
var result = JSON.parse(data);
                    var result = JSON.parse(data);
                       $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
         }else{
            alert('Please add some values');
         }
     });


     $(document).on('click','.xfer-delete',function(){
         var campaign = $(this).data('campaign');
         var id = $(this).data('id');
         if(campaign && id){
             $.ajax({
                type: "POST",
                url: 'ajax/campaign.php?case=TransferPresets&rule=delete',
                data: {campaign:campaign,id:id}, // serializes the form's elements.
                success: function (data){
                    var result = JSON.parse(data);
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
            });
          }
         $(this).parent().parent().remove();
     });

     $(document).on('click','.xfer-save',function(){
         var ParentSection = $(this).parent().parent();
         var name = ParentSection.find('.xfer-name').val();
         var number = ParentSection.find('.xfer-number').val();
         var campaign = $(this).data('campaign');
         var id = $(this).data('id');
         if(ParentSection.find('.xfer-switch').hasClass('active')){
         ActiveValue = 'Y';
         }else{
         ActiveValue = 'N';
         }
         if(name && number){
         	var xferData = {campaign:campaign,name:name,number:number,active:ActiveValue,id:id};
         	$.ajax({
                type: "POST",
                url: 'ajax/campaign.php?case=TransferPresets&rule=edit',
                data: xferData, // serializes the form's elements.
                success: function (data){
//                    alert(data);
                    var result = JSON.parse(data);
                       $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
         }else{
            alert('Please add some values');
         }
     });



</script>
