<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
        <style>
            .jconfirm-content-pane no-scroll{
                height: 100% !important;
            }
        </style>
        <div class="panel pn">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-clock-o"></i> Campaign Status</span>
                    <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                        <li class="nav-item"> 
                            <a href="javascript:void(0);" id="addCampaignStatusBtn" data-id="<?php echo $CampaignID; ?>" data-title="Add Campaign Status" class="text-success" style="padding:15px;">
                                <i class="fa fa-plus"></i>
                            </a> 
                        </li>
                    </ul>
            </div>
            <div class="panel-body pn">
                <div class="table-responsive">
                    <table id="table-list-campaigns" class="table table-bordered">
                        <thead class="bg-success">
                            <tr>
                                <th>Status ID</th>
                                <th>Status Description</th>
                                <th>Status Type</th>
                                <th>Selectable</th>
                                <th>Connect</th>
                                <th>DMC</th>
                                <th>Sale</th>
                                <th>NI</th>
                                <th>CallBack</th>
                                <th>Completed</th>
                                <th>Un-workable</th>
                                <th>DNC</th>
                                <!--<th>Double Status</th>-->
<!--                                <th class="text-center" style="width:37px;"></th>-->
                                <th class="text-center" style="width:37px;">Action</th>
                            </tr>
                        </thead>

                        <tbody class="StatusListSection">

                            <?php foreach ($campaignStatus as $st) { 
                                if(!empty($st['campaign_id'])){
                                ?>
                                <tr id="st-<?php echo $st['id']; ?>">
                                    <th><input type="text" name="" class="form-control" value="<?php echo $st['status']; ?>" readonly> </th>
                                    <th>
                                        <input type="text" name="" class="form-control campaign-status-field" data-name="status_name" value="<?php echo $st['status_name']; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>">
                                    </th>
                                    <th>
                                        <select class="form-control campaign-status-field" data-name="Status_Type" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>">
                                            <option value="Positive" <?php echo ($st['Status_Type'] == 'Positive') ? 'selected' : ''; ?>>POSITIVE</option>
                                            <option value="Negative" <?php echo ($st['Status_Type'] == 'Negative') ? 'selected' : ''; ?>>NEGATIVE</option>
                                            <option value="Neutral" <?php echo ($st['Status_Type'] == 'Neutral') ? 'selected' : ''; ?>>NEUTRAL</option>
                                            <option value="Unconcluded" <?php echo ($st['Status_Type'] == 'Unconcluded') ? 'selected' : ''; ?>>Unconcluded</option>
                                        </select>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['selectable'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="selectable" data-val="<?php echo $st['selectable']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['human_answered'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="human_answered" data-val="<?php echo $st['human_answered']; ?>"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['customer_contact'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="customer_contact"  data-val="<?php echo $st['customer_contact']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>

                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['sale'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="sale" data-val="<?php echo $st['sale']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['not_interested'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="not_interested" data-val="<?php echo $st['not_interested']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>

                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['scheduled_callback'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="scheduled_callback" data-val="<?php echo $st['scheduled_callback']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch  <?php echo ($st['completed'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="completed" data-val="<?php echo $st['completed']; ?>"data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>

                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['unworkable'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="unworkable"  data-val="<?php echo $st['unworkable']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-toggle camst-switch   <?php echo ($st['dnc'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $st['id']; ?>" data-cid="<?php echo $st['campaign_id']; ?>" data-name="dnc"  data-val="<?php echo $st['dnc']; ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </th>

    <!--                                    <th>

                                        </th>-->

        <!--                                    <th>
                                                <div class="btn-group" role="group" >
                                                    <button type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-sm btn-primary "><i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </th>-->
                                    <th>
                                        <div class="btn-group" role="group" >
                                            <button type="button" class="btn btn-sm btn-danger btn-app CampaignStatusDelete" data-status="<?php echo $st['status_name']; ?>" data-id="<?php echo $st['id']; ?>"><i class="fa fa-times"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            <?php }else{ ?>
                                
                                <tr id="st-<?php echo $st['id']; ?>">
                                    <th><?php echo $st['status']; ?></th>
                                    <td><?php echo $st['status_name']; ?></td>
                                    <td><?php echo $st['Status_Type']; ?></td>
                                    <td><?php echo $st['selectable'] ?></td>
                                    <td><?php echo $st['human_answered'];?></td>
                                    <td><?php echo $st['customer_contact'];?></td>
                                    <td><?php echo $st['sale'];?></td>
                                    <td><?php echo $st['not_interested']; ?></td>
                                    <td><?php echo $st['scheduled_callback']; ?></td>
                                    <td><?php echo $st['completed'];?></td>
                                    <td><?php echo $st['unworkable']; ?></td>
                                    <td><?php echo $st['dnc']; ?></td>
                                    <td>- - -</td>
                                </tr>
                                
                                
                                
                            <?php } } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '#addCampaignStatusBtn', function (e) {
        e.preventDefault();
        var title = $(this).attr('data-title');
        var id = $(this).attr('data-id');

        $.get('<?php echo base_url('status/ajax') ?>?id=' + id, function (resp) {
            dialog = $.dialog({
                title: title,
                content: resp,
                // type: 'blue',
                animation: 'scale',
                columnClass: 'small',
                closeAnimation: 'scale',
                backgroundDismiss: true,
            });
        });
    });

    function get_selected_StatusType(CurrentStatus,Status){
        if(CurrentStatus == Status){
           return 'selected="selected"';
        }
        return '';
    }
    
    $(document).on('submit', '#addCampaignStatus', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignStatus&rule=ADD',
            data: formData,
            success: function (data) {
                var result = JSON.parse(data);
                $.toast({
                    heading: 'Campaign Status Setting',
                    text: 'Successfully Added!!',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                });
                $('.jconfirm-open').remove();
                
var myvar = '<tr id="st-'+result.data.id+'">'+
'                                    <th><input type="text" name="" class="form-control" value="'+result.data.status+'" readonly> </th>'+
'                                    <th>'+
'                                        <input type="text" name="" class="form-control campaign-status-field" data-name="status_name" value="'+result.data.status_name+'" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'">'+
'                                    </th>'+
'                                    <th>'+
'                                        <select class="form-control campaign-status-field" data-name="Status_Type" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'">'+
'                                            <option value="Positive" '+get_selected_StatusType(result.data.Status_Type,'Positive')+'>POSITIVE</option>'+
'                                            <option value="Negative" '+get_selected_StatusType(result.data.Status_Type,'Negative')+'>NEGATIVE</option>'+
'                                            <option value="Neutral" '+get_selected_StatusType(result.data.Status_Type,'Neutral')+'>NEUTRAL</option>'+
'                                            <option value="Unconcluded" '+get_selected_StatusType(result.data.Status_Type,'Unconcluded')+'>Unconcluded</option>'+
'                                        </select>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="selectable" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="human_answered" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="customer_contact" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
''+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="sale" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="not_interested" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
''+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="scheduled_callback" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="completed" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
''+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="unworkable" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <button type="button" class="btn btn-sm btn-toggle camst-switch" data-id="'+result.data.id+'" data-cid="'+result.data.campaign_id+'" data-name="dnc" data-toggle="button" aria-pressed="true" autocomplete="off">'+
'                                            <div class="handle"></div>'+
'                                        </button>'+
'                                    </th>'+
'                                    <th>'+
'                                        <div class="btn-group" role="group" >'+
'                                            <button type="button" class="btn btn-sm btn-danger btn-app CampaignStatusDelete" data-status="'+result.data.status_name+'" data-id="'+result.data.id+'"><i class="fa fa-times"></i></button>'+
'                                        </div>'+
'                                    </th>'+
'                                </tr>';
	

                $('.StatusListSection').append(myvar);
                
            }
        });

    });

    $(document).on('click', '.CampaignStatusDelete', function () {
        var status = $(this).data('status');
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this campaign status!",
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
                    url: '<?php echo base_url('campaigns/ajax'); ?>?case=CampaignStatus&rule=DELETE',
                    data: {id: id},
                    success: function (data) {
                        $('#st-' + id).remove();
                        swal("Deleted!", "Your campaign status has been deleted.", "success");
                    }
                });

            } else {
                swal("Cancelled", "Your campaign status is safe :)", "error");
            }
        });
    });

    $(document).on('change', '.campaign-status-field', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var cid = $(this).attr('data-cid');
        var val = $(this).val();
        var column = $(this).attr('data-name');
        var postData = {id: id, cid: cid, val: val, column: column};
        //  console.log(postData);
        $.post('<?php echo base_url('campaigns/ajax'); ?>?case=CampaignStatus&rule=UPDATE', postData, function (resp) {

            var st = $.trim(resp.status);
            $.toast({
                heading: 'Campaign Status Setting',
                text: resp.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: st,
                hideAfter: 3500,
                stack: 6
            });
            // console.clear();
        }, 'json');
    });



    $(document).on('click', '.camst-switch', function (e) {
        var id = $(this).attr('data-id');
        var cid = $(this).attr('data-cid');
        var val = $(this).attr('data-val');
        var column = $(this).attr('data-name');
        if ($(this).hasClass('active')) {
            val = "Y";
        } else {
            val = "N";
        }
        var postData = {id: id, cid: cid, val: val, column: column};
        $.post("<?php echo base_url('campaigns/ajax'); ?>?case=CampaignStatus&rule=UPDATE", postData, function (resp) {
            var st = $.trim(resp.status);
            $.toast({
                heading: 'Campaign Status Setting',
                text: resp.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: st,
                hideAfter: 3500,
                stack: 6
            });
        }, 'json');
    });

</script>
