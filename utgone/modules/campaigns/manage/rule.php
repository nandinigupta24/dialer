<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
        <div class="panel pn">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-clock-o"></i> Recycle Rules</span>
                <!-- nav tab-->
                <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                    <li class="nav-item"> 
                        <a href="javascript:void(0);" class="text-primary" data-title="ADD Recycle Rule" data-toggle="modal" data-target="#RecycleRule-Modal" style="padding:15px;">
                            <i class="fa fa-plus"></i>
                        </a> 
                    </li>
                </ul>
            </div>
            <div class="panel-body pn">
<!--                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                         data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                         data-slider-selection="before" data-slider-tooltip="show" data-slider-id="danger">-->
                
                <div class="table-responsive">
                    <?php
                    $StatusList = $database->select('vicidial_campaign_statuses', ['status', 'status_name'], ['campaign_id' => $CampaignDetail['campaign_id']]);
                    ?>
                    <table class="table table-striped table-hover">
                        <thead class="bg-success">
                            <tr>
                                <th>Status</th>
                                <th>Time Delay (s)</th>
                                <th>Max Attempts</th>
                                <th>Active</th>
                                <th class="text-center" style="width:37px;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="RecycleRuleDiv">

                            <?php foreach ($leadRecyle as $each) { ?>
                                <tr id="TR-RCR-<?php echo $each['recycle_id']; ?>">
                                    <th>
                                        <select class="form-control campaign-Rcrule-field" data-name="status" data-id="<?php echo $each['recycle_id']; ?>">
                                            <option value="">Select Option</option>
                                            <?php foreach ($StatusList as $cst) { ?>
                                                <option value="<?php echo $cst['status']; ?>" <?php echo ($each['status'] == $cst['status']) ? 'selected' : '' ?>><?php echo $cst['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </th>
                                    <th>
                                        <input type="text" data-name="attempt_delay" class="form-control campaign-Rcrule-field" value="<?php echo $each['attempt_delay']; ?>" data-id="<?php echo $each['recycle_id']; ?>" >
                                    </th>
                                    <th>
                                        <div class="slidecontainer">  
                                            <input type="range" min="1" max="10" step="1"  value="<?php echo $each['attempt_maximum']; ?>" class="range-slider campaign-Rcrule-field rangeSlide RcR-rangeSlider" data-id="<?php echo $each['recycle_id']; ?>" id="attempt_maximum<?php echo $each['recycle_id']; ?>" data-name="attempt_maximum" >  
                                        </div>
                                        <span  id="span-attempt_maximum_<?php echo $each['recycle_id']; ?>"><?php echo $each['attempt_maximum']; ?></span>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle btn-switch-RcR <?php echo ($each['active'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $each['active']; ?>" data-id="<?php echo $each['recycle_id']; ?>" data-name="active"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <div class="btn-group" role="group" ><button type="button" class="btn btn-sm btn-danger delete-campaign-RCR" data-id="<?php echo $each['recycle_id']; ?>"><i class="fa fa-times"></i></button></div>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div> 
<!--<link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_plugins/bootstrap-slider/slider.css">
<script src="<?php echo publicAssest();?>assets/vendor_plugins/bootstrap-slider/bootstrap-slider.js"></script>
<script>
      $(function () {
            /* BOOTSTRAP SLIDER */
            $('.slider').slider()
      })
      
     
</script>-->
        
<script>
    $(document).on('click', '.delete-campaign-RCR', function () {
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this recycle rule!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('campaigns/ajax') ?>?case=RecycleRule&rule=remove',
                    data: {id: id},
                    success: function (data) {
                        $('#TR-RCR-' + id).remove();
                        swal("Deleted!", "Your recycle rule has been deleted.", "success");
                    }
                });

            } else {
                swal("Cancelled", "Your recycle rule is safe :)", "error");
            }
        });
    });
</script>